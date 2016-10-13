<?php
require_once('connect.php');
$Nome = $_POST['nome'];
$Login = $_POST['login'];
$Tipo = $_POST['tipo'];
$Senha = md5('hisc@123');
$sql = 'INSERT INTO tbl_usuario(Nome,Login,Senha,Tipo) VALUES ("'.$Nome.'","'.$Login.'","'.$Senha.'","'.$Tipo.'")';
if(mysqli_query($conn,$sql)== TRUE)
{
    if($Tipo == 'A')
    {
        $libera = "SELECT * FROM tbl_setor";
        $usuario = "SELECT * FROM tbl_usuario WHERE Nome = '".$Nome."' AND Login='".$Login."' AND Senha = '".$Senha."'";
        $mostra = mysqli_query($conn,$usuario);
        $result = mysqli_query($conn,$libera);
         while($usu = mysqli_fetch_assoc($mostra))
            {
             $id_usuario = $usu['id_Usuario'];
         }
        while($row = mysqli_fetch_assoc($result))
        {
            
                $sql = "INSERT INTO tbl_libera(Setor_idSetor,tbl_Usuario_id_Usuario) VALUES (".$row['idSetor'].",".$id_usuario.")";
                mysqli_query($conn,$sql);
            
        }
    }
    echo "<script> alert('Usuario cadastrado com sucesso!');</script>";
echo "<meta http-equiv='refresh' content='0; url=cad_usuario.php'>";
}
else
{   echo "<script> alert('Erro usuario nao cadastrado!')</script>";
    echo "<meta http-equiv='refresh' content='0; url=cad_usuario.php'>";
}
?>