<?php
require_once('ad/class/connect.php');
class valida extends banco{
    protected $Nome;
    protected $Tipo;
    protected $ID;
    public function Login($login,$senha)
    {
        $senha = md5($senha);
        $sql = "SELECT * FROM tbl_usuario WHERE Login='" . $login . "' AND Senha='" . $senha . "'";
        $conn = $this->conectar();
        $result = $this->comando($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $this->Nome= $row['Nome'];
                $this->Tipo = $row['Tipo'];
                $this->ID = $row['id_Usuario'];
               return $this->secao();
            }
            
        }
         return '<meta charset="UTF-8"><script>alert("Usuário ou senha incorretos!");</script><meta http-equiv="refresh" content="0; url=index.php">';
    }
    
    public function secao()
    {        session_start();
         $_SESSION['Nome'] = $this->Nome;
         $_SESSION['Tipo'] = $this->Tipo;
         $_SESSION['ID'] = $this->ID;
         return '<meta http-equiv="refresh" content="0; url=principal.php">';
    }
}
?>
