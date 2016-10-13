<?php
require_once('connect.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of query
 *
 * @author lobo.igor
 */

class query extends banco{

    public function selecao($tabela)
    {
        $sql = "SELECT * FROM ".$tabela;
        $conn = $this->conectar();
        $result = $this->comando($conn, $sql);
        return $result;
    }

    public function selecaocondicao($tabela,$condicao,$param)
    {
        $sql = "SELECT * FROM ".$tabela." WHERE ".$condicao.$param;
        $conn = $this->conectar();
        $result = $this->comando($conn, $sql);
        //return $sql;
         return $result;
       
    }
    
    public function inserir($tabela,$campos,$valores)
    {
        $sql = "INSERT INTO ".$tabela."(".$campos.") VALUES (".$valores.")";
        $conn = $this->conectar();
        $result = $this->comando($conn, $sql);
        return $sql;
        //return $result;
    }
    public function atualizar($tabela,$campos,$valores,$condicao,$param)
    {
        $sql = "UPDATE ".$tabela." SET ".$campos." = ".$valores." WHERE ".$condicao." = ".$param;
        $conn = $this->conectar();
        $result = $this->comando($conn, $sql);
        return $result;
    }
    public function deletar($tabela,$condicao,$param)
    {
        $sql = "DELETE FROM ".$tabela." WHERE ".$condicao." = ".$param;
        $conn = $this->conectar();
        $result = $this->comando($conn, $sql);
        return $result;
    }
}
?>
