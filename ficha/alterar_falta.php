<?php
if($_POST['delete'] == '1')
{
    $sql = "DELETE FROM tbl_atestado WHERE id_Atestado = ".$_GET['cod'];
}
else
{
$sql = "UPDATE tbl_atestado SET Data='".$_POST['Data_falta']."', Dias=".$_POST['Dias_Falta'].", Relato='".$_POST['relato_falta']."' WHERE id_Atestado=".$_GET['cod'];
}
mysqli_query($conn,$sql);
echo "<script>alert('Alteracao salva com sucesso!')</script>";
echo "<meta http-equiv='refresh' content='0; url=edit_ficha.php?id=".$_GET['id']."'>";
?>