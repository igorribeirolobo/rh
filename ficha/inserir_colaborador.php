<?php
session_start();
require_once("connect.php");
$Nome = $_POST['nome'];
$Data = $_POST['data'];
$Setor = $_POST['setor'];
$sql = "INSERT INTO tbl_colaborador(Nome,Data_Admissao,tbl_Usuario_id_Usuario,tbl_setor_idSetor) VALUES ('".$Nome."','".$Data."',".$_SESSION['ID'].",".$Setor.")";
if(mysqli_query($conn,$sql) == TRUE)
{
echo "<script> alert('Colaborador cadastrado com sucesso!');</script>";
echo "<meta http-equiv='refresh' content='0; url=cad_colaborador.php'>";
}
else
{
  echo "<script> alert('Erro ao cadastrar colaborador!');</script>";
echo "<meta http-equiv='refresh' content='0; url=cad_colaborador.php'>";  
}
?>