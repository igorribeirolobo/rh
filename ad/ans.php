<?php include('menu.php');    ?>
<div class="box-body pad" style="display:<?php echo $quest; ?>"> 
    <table class="table table-bordered">
        <?php
      
        $tipo = $bd->selecaocondicao('tbl_ad_tipo_questao', 'idtbl_tipo_questao', '!= 0 AND tbl_setor_idSetor = 0 OR tbl_setor_idSetor = ' . $_GET['set']);
        while ($row = mysqli_fetch_assoc($tipo)) {
            echo'<tr><td><h3 class="box-title"><center>' . $row['Descricao'] . '</center></h3></td>';
            $questao = $bd->selecaocondicao("tbl_ad_questao", "tbl_ad_tipo_questao_idtbl_tipo_questao", "=" . $row['idtbl_tipo_questao']);
            while ($ans = mysqli_fetch_assoc($questao)) {
                echo "<tr><td><b>" . $ans['Descricao'] . "</b></td></tr>";
                $resposta = $bd->selecaocondicao("tbl_ad_resposta", "tbl_questao_idtbl_questao", "= 0 OR tbl_questao_idtbl_questao = " . $ans['idtbl_ad_questao']);
                while ($resp = mysqli_fetch_assoc($resposta)) {
                    echo "<tr><td><input type='radio' name='".$ans['idtbl_ad_questao']."' value='".$resp['Valor']."'>" . $resp['Descricao'] . "</td></tr>";
                }
            }

            echo "</tr>";
        }
        ?>
    </table>
</div>







<?php include('footer.php');?>