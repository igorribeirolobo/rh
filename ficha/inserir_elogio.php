<?php
session_start();
require_once("connect.php");
 $q = $_GET['id'];
if($q != NULL)
{
$sql = "INSERT INTO tbl_elogio(Data_Elogio,Relato,tbl_Ficha_id_Ficha) VALUES ('".$_POST['data_positivo']."','".$_POST['relato_positivo']."',".$q.")";
mysqli_query($conn,$sql);
echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
}
else
{
    echo "<script>alert('Favor selecionar um colaborador e prescionar OK!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
}
?>