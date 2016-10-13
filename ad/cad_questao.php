    <?php include('menu.php');
require_once("class/query.php");
$bd = new query();
if(isset($_POST['btn_cadastrar']))
{   $valores = "'".$_POST['titulo']."','".$_POST['descricao']."',".$_POST['setor'];
  $bd->inserir('tbl_ad_questao', 'titulo,Descricao,tbl_ad_tipo_questao_idtbl_tipo_questao', $valores);
   echo "<script> alert('Questão cadastrada com sucesso!');</script>";
}
?>
         <div class="box-header">
                    <center><h2 class="box-title">Cadastrar Questão</h2></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad"> 
                    <form action="cad_questao.php" method="POST">
                        <center>   <label>Questão.: </label> <input type="text" name="descricao" value=""/>
                          <label>Titulo.: </label> <input type="text" name="titulo" value=""/>
                        <label>Categoria.: </label> <select name="setor">
                            <option value="">Selecione uma categoria</option>
                            <?php
                            
                            $result = $bd->selecao('tbl_ad_tipo_questao');
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='".$row['idtbl_tipo_questao']."'>".$row['Descricao']."</option>";
                            }
                            ?>
                        </select>
                        
                        <br /><button  type='submit' class='btn btn-success' name="btn_cadastrar">Cadastrar</button>
                        </center>
                    </form><br />
                    <table class="table table-bordered">
                        <th><center>Questão</center></th>
                    <th><center>Categoria</center></th>
                        <?php
                        $result = $bd->selecao('tbl_ad_questao');
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td><center>".$row['Descricao']."</center></td>";
                           $categoria =  $bd->selecaocondicao('tbl_ad_tipo_questao','idtbl_tipo_questao',$row['tbl_ad_tipo_questao_idtbl_tipo_questao']);
                            while($tb = mysqli_fetch_assoc($categoria))
                            {
                                echo "<td><center>".$tb['Descricao']."</center></td></tr>";
                            }
                        }
                        ?>
                      
                    </table>
                </div>

<?php include('footer.php');?>