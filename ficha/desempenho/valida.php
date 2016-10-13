<?php
session_start();
require_once("connect.php");
if($_GET['login'] != "" && $_GET['senha'] != "")
{
    $login = $_GET['login'];
    $pass = $_GET['senha'];
}
else
{
$login = $_POST['login'];
$pass = md5($_POST['senha']);
}
$sql = "SELECT * FROM tbl_usuario WHERE Login='".$login."' AND Senha='".$pass."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['Nome'] =  $row['Nome'];
        $_SESSION['Tipo'] = $row['Tipo'];
        $_SESSION['ID'] = $row['id_Usuario'];
        if($_POST['senha'] == 'hisc@123')
        {
         echo '<meta charset="UTF-8"><script>alert("ATENÇÃO, sua senha está como padrão, favor altera-la imediatamente!");</script>';   
        }
        echo '<meta http-equiv="refresh" content="0; url=principal.php">';
    }
} else {
    echo '<meta charset="UTF-8"><script>alert("Usuário ou senha incorretos!");</script><meta http-equiv="refresh" content="0; url=index.php">';
}

mysqli_close($conn);

?>