<?php
require_once("connect.php");
if($_POST['delete'] == '1')
{
    $sql = "DELETE FROM `tbl_elogio` WHERE `idElogio` = ".$_GET['cod'];
}
else
{
$sql = "UPDATE tbl_elogio SET Data_Elogio='".$_POST['data_positivo']."', Relato='".$_POST['relato_positivo']."' WHERE idElogio = ".$_GET['cod'];
}
mysqli_query($conn,$sql);
echo $sql;
echo "<script>alert('Alteracao salva com sucesso!')</script>";
echo "<meta http-equiv='refresh' content='0; url=edit_ficha.php?id=".$_GET['id']."'>";
?>