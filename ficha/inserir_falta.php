<?php
require_once("connect.php");
$q = $_GET['id'];
if($q != null)
{
$sql = "INSERT INTO tbl_atestado(Data,Dias,Relato,tbl_Ficha_id_Ficha) VALUES ('".$_POST['Data_falta']."',".$_POST['Dias_Falta'].",'".$_POST['relato_falta']."',".$q.")";
mysqli_query($conn,$sql);
echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
}
else
{
    echo "<script>alert('Favor selecionar um colaborador e prescionar OK!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
}
?>