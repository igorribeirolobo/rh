<?php include('menu.php');
require_once("class/query.php");
$bd = new query();
if(isset($_POST['btn_cadastrar']))
{   $valores = "'".$_POST['descricao']."',".$_POST['setor'];
  $bd->inserir('tbl_ad_tipo_questao', 'Descricao,tbl_setor_idSetor', $valores);
   echo "<script> alert('Categoria cadastrada com sucesso!');</script>";
}
?>
         <div class="box-header">
                    <center><h2 class="box-title">Cadastrar Categoria</h2></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad"> 
                    <form action="cad_categoria.php" method="POST">
                        <center>   <label>Descrição.: </label> <input type="text" name="descricao" value=""/>
                        <label>Setor.: </label> <select name="setor">
                            <?php
                            
                            $result = $bd->selecao('tbl_setor');
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<option value='".$row['idSetor']."'>".$row['Descricao']."</option>";
                            }
                            ?>
                        </select>
                        
                        <br /><button  type='submit' class='btn btn-success' name="btn_cadastrar">Cadastrar</button>
                        </center>
                    </form><br />
                    <table class="table table-bordered">
                        <th><center>Categoria</center></th>
                    <th><center>Setores Liberados</center></th>
                        <?php
                        $result = $bd->selecao('tbl_ad_tipo_questao');
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr><td><center>".$row['Descricao']."</center></td>";
                           $setor =  $bd->selecaocondicao('tbl_setor','idSetor',$row['tbl_setor_idSetor']);
                            while($tb = mysqli_fetch_assoc($setor))
                            {
                                echo "<td><center>".$tb['Descricao']."</center></td></tr>";
                            }
                        }
                        ?>
                      
                    </table>
                </div>

<?php include('footer.php');?>