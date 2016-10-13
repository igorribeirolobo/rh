<meta charset="utf-8">
<?php
if (isset($_POST['visualizarEmPDF'])) {
    session_start();
    $form = $_POST['cotacao'];

    if (isset($form['dia-viagem']) && $form['dia-viagem'] != 0) {
        $dia_viagem = $form['dia-viagem'];
    } else {
        ?>
        <script type="text/javascript">
            alert("Por favor, escolha um dia para sua viagem. Se nao tiver certeza, escolha o dia mais proximo e marque o campo Data Flexivel.");
            location.href = "http://vaiviajarbrasil.com.br/cotacao-de-viagens";
        </script>
        <?php
    }
    if (isset($form['mes-viagem']) && $form['mes-viagem'] != "") {
        $mes_viagem = $form['mes-viagem'];
    } else {
        ?>
        <script type="text/javascript">
            alert("Por gentileza escolha o mês da viagem.");
            location.href = "http://vaiviajarbrasil.com.br/cotacao-de-viagens";
        </script>
        <?php
    }
    if (isset($form['ano-viagem']) && $form['ano-viagem'] != 0) {
        $ano_viagem = $form['ano-viagem'];
    } else {
        ?>
        <script type="text/javascript">
            alert("Por gentileza escolha o ano da viagem.");
            location.href = "http://vaiviajarbrasil.com.br/cotacao-de-viagens";
        </script>
        <?php
    }
    if (isset($form['dia-viagem']) && $form['dia-viagem'] != 0) {
        $dia_viagem = $form['dia-viagem'];
    } else {
        $dia_viagem = "Não Informado";
    }

    if (isset($form['flexivel']) && $form['flexivel'] != '') {
        $flexivel = "Sim";
    } else {
        $flexivel = "Não";
    }

    if (isset($form['telefone1']) && $form['telefone1'] != '') {
        $telefone1 = $form['telefone1'];
    } else {
        $telefone1 = "Não Informado.";
    }

    if (isset($form['telefone2']) && $form['telefone2'] != '') {
        $telefone2 = $form['telefone2'];
    } else {
        $telefone2 = "Não Informado.";
    }
    if (isset($form['necessidades_outras']) && $form['necessidades_outras'] != '') {
        $necessidades_outras = $form['necessidades_outras'];
    } else {
        $necessidades_outras = "Não Informado.";
    }

    if (isset($form['necessidade']) && $form['necessidade'] != '') {
        foreach ($form['necessidade'] as $value) {
            $necessidades .= $value . ", ";
        }
    }else{
        $necessidades = "Não informado";
    }
    
    if($form['definir_destino'] == "defini") {
        $defini = 1;
    }else{
        $defini = 0;
    }
    if($form['definir_destino'] == "nao_defini") {
        $naodefini = 1;
    }else{
        $naodefini = 0;
    }
    
    
    if (isset($form['transfer_defini']) && $form['transfer_defini'] != '') {
        $transfer_defini = $form['transfer_defini'];
    } else {
        $transfer_defini = "Não";
    }
    if (isset($form['veiculo_defini']) && $form['veiculo_defini'] != '') {
        $veiculo_defini = $form['veiculo_defini'];
    } else {
        $veiculo_defini = "Não";
    }
    
    if (isset($form['passeiosorientados_defini']) && $form['passeiosorientados_defini'] != '') {
        $passeiosorientados_defini = $form['passeiosorientados_defini'];
    } else {
        $passeiosorientados_defini = "Não";
    }
    
    
    
    
    if($form['definir_mais_um_destino'] == "sim") {
        $definir_maisum = 1;
    }else{
        $definir_maisum = 0;
    }
    
    if (isset($form['qual_destino_defini1']) && $form['qual_destino_defini1'] != '') {
        $qual_destino_defini1 = $form['qual_destino_defini1'];
    } else {
        $qual_destino_defini1 = "Não Informado.";
    }
    
    
    if (isset($form['qual_transporte_defini1']) && $form['qual_transporte_defini1'] != '') {
        $qual_transporte_defini1 = $form['qual_transporte_defini1'];
    } else {
        $qual_transporte_defini1 = "Não Informado.";
    }
    
    if (isset($form['quantos_dias_defini1']) && $form['quantos_dias_defini1'] != '') {
        $quantos_dias_defini1 = $form['quantos_dias_defini1'];
    } else {
        $quantos_dias_defini1 = "Não Informado.";
    }
    
    
    if (isset($form['onde_hospedar_defini1']) && $form['onde_hospedar_defini1'] != '') {
        $onde_hospedar_defini1 = $form['onde_hospedar_defini1'];
    } else {
        $onde_hospedar_defini1 = "Não Informado.";
    }
    
    if (isset($form['transfer_defini1']) && $form['transfer_defini1'] != '') {
        $transfer_defini1 = $form['transfer_defini1'];
    } else {
        $transfer_defini1 = "Não Informado.";
    }
    if (isset($form['veiculo_defini1']) && $form['veiculo_defini1'] != '') {
        $veiculo_defini1 = $form['veiculo_defini1'];
    } else {
        $veiculo_defini1 = "Não Informado.";
    }
    
    if (isset($form['passeiosorientados_defini1']) && $form['passeiosorientados_defini1'] != '') {
        $passeiosorientados_defini1 = $form['passeiosorientados_defini1'];
    } else {
        $passeiosorientados_defini1 = "Não Informado.";
    }
    if (isset($form['informacoes_complementares']) && $form['informacoes_complementares'] != '') {
        $informacoes_complementares = $form['informacoes_complementares'];
    } else {
        $informacoes_complementares = "Não Informado.";
    }
    
    if (isset($form['receber_sugestoes']) && $form['receber_sugestoes'] != '') {
        $receber_sugestoes = 1;
    } else {
        $receber_sugestoes = 0;
    }
    
    if (isset($form['tipo_destino']) && $form['tipo_destino'] != '') {
        foreach ($form['tipo_destino'] as $value) {
            $tipo_destino .= $value . ", ";
        }
    }
    
    $dados = array(
        $form['nome'], //0
        $form['email'], //1
        $telefone1,//2
        $telefone2,//3
        $form['cidadeQueMora'],//4
        $dia_viagem, //5
        $mes_viagem, //6
        $ano_viagem,//7
        $flexivel,//8
        $form['adultos'],//9
        $form['jovens'],//10
        $form['criancas'],//11
        $form['bebes'],//12
        $necessidades,//13
        $necessidades_outras,//14
        $form['orcamento_planejado'], //15
        $form['tipo_excursao'],//16
        $form['cidade_inicio'],//17
        $form['cidade_fim'],//18
        $defini,//19
        $form['qual_destino_defini'],//20
        $form['qual_transporte_defini'],//21
        $form['quantos_dias_defini'],//22
        $form['onde_hospedar_defini'],//23
        $transfer_defini,//24
        $veiculo_defini,//25
        $passeiosorientados_defini,//26
        $definir_maisum,//27
        $qual_destino_defini1, //28
        $qual_transporte_defini1, //29
        $quantos_dias_defini1, //30
        $onde_hospedar_defini1, //31
        $transfer_defini1, //32
        $veiculo_defini1, //33
        $passeiosorientados_defini1, //34
        $naodefini, //35
        $tipo_destino,//36
        $form['preferencia_lugares'],//37
        $form['transporte_nao_defini'],//38
        $form['quantos_dias_nao_defini'],//39
        $form['hospedar_nao_defini'],//40
        $form['transfer_nao_decidi'],//41
        $form['veiculo_nao_decidi'],//42
        $informacoes_complementares,//43
        $$receber_sugestoes,//44
        
    );
    $_SESSION['dados'] = $dados;

    if ($_SESSION['dados'] != '') {
        ?>
        <script type="text/javascript">
            location.href = "gerar-pdf.php?url=http://vaiviajarbrasil.com.br/visualizarpdf.php";
        </script>
        <?php
    }
}
    