<?php 
session_start();
require_once("connect.php");
$login = $_GET['login']; 
$senha = $_GET['senha']; 
$sql = "UPDATE tbl_usuario SET Login='".$login."', Senha='".$senha."' WHERE id_Usuario = ".$_SESSION['ID'];
            if(mysqli_query($conn,$sql))
            {
            echo "<script>alert('vinculo criado com sucesso!');</script>";
            echo '<meta http-equiv="refresh" content="0; url=http://192.168.0.4/ficha/desempenho/principal.php">'; 
            }
else
{
    echo "erro: ".mysqli_error($conn);
}
?>