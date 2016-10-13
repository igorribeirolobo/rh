<?php
session_start();
require_once("connect.php");
$senha = $_POST['senha'];
$rsenha = $_POST['rsenha'];
if($senha != $rsenha)
{
      echo "<script>alert('As senhas não conferem.');</script>";
      echo '<meta http-equiv="refresh" content="0; url=esqueci.php">';
}
else
{   $pass = md5($senha);
    $sql = "UPDATE tbl_usuario SET Senha='".$pass."' WHERE id_Usuario = ".$_SESSION['id'];
    mysqli_query($conn,$sql);
    session_destroy();
       echo "<script>alert('Senha alterada com sucesso!.');</script>";
      echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

?>