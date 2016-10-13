<?php
require_once("connect.php");
$usuario = $_POST['usuario'];
$setor = $_POST['setor'];
$sql = "INSERT INTO tbl_libera(Setor_idSetor,tbl_Usuario_id_Usuario) VALUES (".$setor.",".$usuario.")";

if(mysqli_query($conn,$sql) == TRUE)
{
        echo "<script> alert('Usuario liberado com sucesso!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=lib_usuario.php'>";
}
else
{
        echo "<script> alert('Erro ao liberar usuario!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=lib_usuario.php'>";
}
?>