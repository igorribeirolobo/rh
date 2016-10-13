<?php
class banco{
 private $servidor = "localhost";
 private $banco = "funcional";
 private $login = "root";
 private $senha = "05062013";
    
    
    
    public function conectar()
    {
       $conn = mysqli_connect($this->servidor, $this->login, $this->senha, $this->banco);
        if (!$conn) {
   return  die("Connection failed: " . mysqli_connect_error());
     }  
        return $conn;
    }
    
    
   public function comando($conn,$query){
         $result = mysqli_query($conn,$query);
        
        return $result;
     
    }
    
    
    
}
?>