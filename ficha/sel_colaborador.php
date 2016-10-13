<?php
session_start();
require_once("connect.php");
echo $_GET['Nome'];
$q = "";
$colaborador = $_GET['id'];
$data = date("Y");
$sql = "SELECT * FROM tbl_ficha WHERE Periodo=".$data." AND tbl_Colaborador_idColaborador = ".$colaborador;
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) != 0)
{
   while($row = mysqli_fetch_assoc($result))
{if($row['status'] != "C")
{
    $q = $row['id_Ficha'];
}
 else
 {   if($row['Periodo'] == $data)
 {
     $data += 1;
   echo  "<script> alert('Este colaborador só poderá ter uma nova ficha em ".$data."')</script>";
 }
 }
} 
}
else
{
$sql = "INSERT INTO tbl_ficha(Periodo,tbl_Colaborador_idColaborador,tbl_Usuario_id_Usuario) VALUES (".$data.",".$colaborador.",".$_SESSION['ID'].")";   
mysqli_query($conn,$sql);
$sql = "SELECT * FROM tbl_ficha WHERE Periodo=".$data." AND tbl_Colaborador_idColaborador = ".$colaborador;
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
    $q = $row['id_Ficha'];
}
}
echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
?>