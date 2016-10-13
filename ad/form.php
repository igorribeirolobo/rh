<?php
session_start();
require_once("class/query.php");
include("menu.php");
$bd = new query();
if ($_GET['id'] != "") {
    $sec = "none";
} else {
    $sec = "block";
}
if ($_GET['id'] == "") {
    $quest = "none";
} else {
    $quest = "block";
}

if (isset($_POST[['proximo']])) {
    $ano = date('Y');
    $resultados = $bd->selecao("tbl_ad_questao");
    while ($questoes = mysqli_fetch_assoc($resultados)) {
        $bd->inserir("tbl_ad_compilacao", "Ano,tbl_ad_resposta_idtbl_resposta,tbl_colaborador_id_colaborador,tbl_ad_questao_idtbl_questao", $ano . "," . $_POST[$questoes['idtbl_ad_questao']] . "," . $_GET['id'] . "," . $questao['idtbl_ad_questao']);
    }
}
?>
<div class="box-header">
    <center><h2 class="box-tittle">Formulario</h2></center><br />
    <div class="pull-right box-tools">
    </div><!-- /. tools -->
</div><!-- /.box-header -->
<div class="box-body pad" style="display:<?php echo $sec; ?>"> 
    <?php
    echo "<table class='table table-bordered'>";
    echo "<th><center>Colaborador</center></th><th></th>";
    $setor = $bd->selecaocondicao('tbl_libera', 'tbl_Usuario_id_Usuario', "= " . $_SESSION['ID']);
    while ($row = mysqli_fetch_assoc($setor)) {
        $result = $bd->selecaocondicao('tbl_colaborador', 'tbl_setor_idSetor', " = " . $row['Setor_idSetor'] . " ORDER BY Nome");
        while ($col = mysqli_fetch_assoc($result)) {
            echo "<tr><td><center>" . $col['Nome'] . "</center></td><td><center><a href='form.php?id=" . $col['idColaborador'] . "&set=" . $col['tbl_setor_idSetor'] . "&start=0' class=' btn btn-app'><i class='fa fa-play'></i>Avaliar</a></center></td></tr>";
        }
    }
    echo "</table>";
    ?>
</div>
<div class="box-body pad" style="display:<?php echo $quest; ?>"> 
    <table class="table table-bordered">
        <?php
        if ($_GET['start'] == 0 && $_GET['start'] != "fim") {
            $começar = $bd->selecaocondicao("tbl_ad_tipo_questao", "idtbl_tipo_questao", "> 0 LIMIT 1");
            while ($começo = mysqli_fetch_assoc($começar)) {
                echo "<center>" . $col['Nome'] . "</center></td><td><center><a href='form.php?id=" . $_GET['id'] . "&set=" . $_GET['set'] . "&start=" . $começo['idtbl_tipo_questao'] . "' class=' btn btn-app'><i class='fa fa-play'></i>Começo</a></center>";
            }
        }
        ?>
</div>
<div class="box-body pad" style="display:<?php echo $quest; ?>"> 
    <table class="table table-bordered">
        <?php
        if ($_GET['start'] != 0) {
            $start = $_GET['start'] + 1;
            echo "<form action='form.php?id=" . $_GET['id'] . "&set=" . $_GET['set'] . "&start=" . $start . "' method='POST'>";
            $result = $bd->selecaocondicao("tbl_ad_tipo_questao", "tbl_setor_idSetor", " = " . $_GET['set'] . " OR tbl_setor_idSetor = 0 AND idtbl_tipo_questao > 0");
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['idtbl_tipo_questao'] == $_GET['start']) {
                    echo "<div id='" . $_GET['start'] . "'><center><h3>" . $row['Descricao'] . "</h3></center>";
                    $questao = $bd->selecaocondicao("tbl_ad_questao", "tbl_ad_tipo_questao_idtbl_tipo_questao", " = " . $row['idtbl_tipo_questao']);
                    while ($quest = mysqli_fetch_assoc($questao)) {
                        echo "<br /><center><b>" . $quest['titulo'] . "</b></center><br /><center>" . $quest['Descricao'] . "</center><br />";
                        $resposta = $bd->selecaocondicao("tbl_ad_resposta", "tbl_questao_idtbl_questao", " = " . $quest['idtbl_ad_questao'] . " OR tbl_questao_idtbl_questao = 0");
                        while ($resp = mysqli_fetch_assoc($resposta)) {
                            echo "<br /><center><input type='radio' name='" . $quest['idtbl_ad_questao'] . "' value='" . $resp['Valor'] . "'/>" . $resp['Descricao'] . "</center>";
                        }
                        echo "<hr />";
                    }

                    if ($row['idtbl_tipo_questao'] < $_GET['start']) {
                        $start = $row['idtbl_tipo_questao'];
                    } else {
                        
                    }
                }
            }
            echo "<center><input type='submit' name='proximo' value='Próximo'/>";
            if ($row['idtbl_tipo_questao'] < $_GET['start']) {
                echo "<center><input type='submit' name='fim' value='Finalizar'/>";
            }
            echo "</form>";
        }
        ?>
    </table>
</div>
<?php include("footer.php"); ?>
