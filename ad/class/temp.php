<?php
require_once('query.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of temp
 *
 * @author lobo.igor
 */
class temp extends query{

   
    
    public function enviar($id)
    { 
       $title = $this->selecaocondicao("tbl_ad_tipo_questao", "idtbl_tipo_questao", "= ".$id);
       while($tit = mysqli_fetch_assoc($title))
       {   $pergunta = $tit['Descricao'];
           $questao = $this->selecaocondicao("tbl_ad_questao", "tbl_ad_tipo_questao_idtbl_tipo_questao", " = ".$tit['idtbl_tipo_questao']);
           while($quest = mysqli_fetch_assoc($questao))
           {   $pergunta = $pergunta."<br />".$quest['Descricao'];
               $resposta = $this->selecaocondicao("tbl_ad_resposta", "tbl_questao_idtbl_questao", " = 0 OR tbl_questao_idtbl_questao = ".$quest['idtbl_ad_questao']);
               
               while($resp = mysqli_fetch_assoc($resposta))
               {
                   return $pergunta = $pergunta."<br />".$resp['Descricao'];
               }
           }
       }
        
      
        
 
    }
    
    
    
    
}
