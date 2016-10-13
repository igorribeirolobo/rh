<?php
session_start();
require_once("connect.php");
$q = 0;
$colaborador = $_GET['id'];
$nota = $_GET['nota'].".";
$classificacao = $_GET['classificacao'];
$data = date("Y");
$date = date("y-m-d");
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
if($q != 0)
{  $nota = explode("%",$nota);
  $sql = "INSERT INTO tbl_desempenho(Data_Avaliacao,Nota,Classificacao,tbl_Ficha_id_Ficha) VALUES ('".$date."',".$nota[0].",'".$classificacao."',".$q.")";
mysqli_query($conn,$sql);  
 echo "<script>alert('Avaliacao concluida com sucesso!');</script>";
 echo "<meta http-equiv='refresh' content='0; url=principal.php'>";
}
?>