<?php
session_start();
require_once("connect.php");
$asenha = md5($_POST['asenha']);
$nsenha = $_POST['nsenha'];
$rsenha = $_POST['rsenha'];
if($nsenha != $rsenha)
{
     echo "<script>alert('As senhas não conferem.');</script>";
     echo '<meta http-equiv="refresh" content="0; url=alterar_senha.php">';
}
else
{   $senha = md5($nsenha);
    $sql = "SELECT * FROM tbl_usuario WHERE id_Usuario=".$_SESSION['ID'];
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['Senha']!= $asenha)
        {
          echo "<script>alert('Senha atual não confere.');</script>";
          echo '<meta http-equiv="refresh" content="0; url=alterar_senha.php">'; 
        }
        else
        {
            $sql = "UPDATE tbl_Usuario SET Senha='".$senha."' WHERE id_Usuario=".$_SESSION['ID'];
            mysqli_query($conn,$sql);
            echo "<script>alert('Senha alterada com sucesso!');</script>";
            echo '<meta http-equiv="refresh" content="0; url=principal.php">'; 
        }
    }
}


?>