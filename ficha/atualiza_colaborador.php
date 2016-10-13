<?php
require_once("connect.php");
$sql ="UPDATE tbl_colaborador SET Nome='".$_POST['nome']."', Data_Admissao='".$_POST['adm']."' WHERE idColaborador=".$_GET['id'];
mysqli_query($conn,$sql);
echo "<script>alert('Colaborador atualizado com sucesso!');</script>";
echo "<meta http-equiv='refresh' content='0; url=visualiza_colaborador.php'>"

?>