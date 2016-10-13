<?php include('menu.php');
require_once("class/query.php");
$bd = new query();
if(isset($_POST['btn_cadastrar']))
{   $valores = "'".$_POST['descricao']."',".$_POST['valor'].",".$_POST['questao'];
 $bd->inserir('tbl_ad_resposta', 'Descricao,valor,tbl_questao_idtbl_questao', $valores);
   echo "<script> alert('Resposta cadastrada com sucesso!');</script>";
}
?>
         <div class="box-header">
                    <center><h2 class="box-title">Cadastrar Resposta</h2></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad"> 
                    <form action="cad_resposta.php" method="POST">
                        <center>   <label>Resposta.: </label> <input type="text" name="descricao" value=""/>
                            <label>Valor.: </label> <select name="valor">
                                <option value="">Selecione um valor!</option>
                                <?php
                                for($i = 1;$i < 5; $i++)
                                { 
                                    echo "<option value='".$i."'>".$i."</option>";
                                }
                                ?>
                            </select>
                        <label>Categoria.: </label> <select name="questao">
                            <option value="">Selecione uma questão</option>
                            <?php
                            
                            $result = $bd->selecao('tbl_ad_questao');
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='".$row['idtbl_ad_questao']."'>".$row['titulo']."</option>";
                            }
                            ?>
                        </select>
                        
                        <br /><button  type='submit' class='btn btn-success' name="btn_cadastrar">Cadastrar</button>
                        </center>
                    </form><br />
                    <table class="table table-bordered">
                        <th><center>Questão</center></th>
                    <th><center>Resposta</center></th>
                        <?php
                        $result = $bd->selecao('tbl_ad_resposta');
                        while($row = mysqli_fetch_assoc($result))
                        {
                           $categoria =  $bd->selecaocondicao('tbl_ad_questao','idtbl_ad_questao',$row['tbl_questao_idtbl_questao']);
                            while($tb = mysqli_fetch_assoc($categoria))
                            {
                                echo "<tr><td><center>".$tb['Descricao']."</center></td><td><center>".$row['Descricao']."</center></td></tr>";
                            }
                        }
                        ?>
                      
                    </table>
                </div>

<?php include('footer.php');?>