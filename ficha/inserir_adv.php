<?php
require_once("connect.php");
$q = $_GET['id'];
if($q != null)
{
$sql = "INSERT INTO tbl_adv(Data_adv,Relato,tbl_tipoadv_idl_tipoadv,tbl_Ficha_id_Ficha) VALUES ('".$_POST['data_adv']."','".$_POST['relato_adv']."',".$_POST['adv'].",".$q.")";
mysqli_query($conn,$sql);
echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
}
else
{
    echo "<script>alert('Favor selecionar um colaborador e prescionar OK!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=cad_ficha.php?id=".$q."'>";
}
?>