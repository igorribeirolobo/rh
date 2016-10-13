<?php session_start();
require_once("connect.php");?>
<head>
<meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <style>
table, th, td {
   /**border: none;*/
    border: 1px solid black;
}
        body{
            font-family: arial,sans-serif;
        }
</style>
</head>
<body>
<table style="width:100%">
<tr><td style="width:15%"><img src="../lg.png"/>   </td><td align="center"><b>AVALIAÇÃO DE DESEMPENHO - PONTUAÇÃO</b></td></tr>
</table>
<table style="width:100%">
<tr><td>•   A Avaliação de Desempenho é muito importante para o crescimento do funcionário e da Instituição.  Com este documento o bom desempenho de cada um será realçado e todos terão a chance de corrigir  aquilo que não esteja adequado à realidade e à necessidade do Hospital.</td></tr>
<tr><td>• Para facilitar o cálculo na planilha, ao preencher utilize as numerações abaixo:<br />
<b>1</b> - Não atende padrão<br />
<b>2</b> - Atende padrão com restrição<br />
<b>3</b> - Atende padrão<br />
<b>4</b> - Acima do padrão</td></tr>       
</table>
<table style="width:100%">
    <tr><td><b>Funcionário:</b>
    <?php $sql = "SELECT * FROM tbl_colaborador WHERE idColaborador=".$_GET['id'];
    $result = mysqli_query($conn,$sql); 
        while($row = mysqli_fetch_array($result))
        {$nome = $row['Nome'];
         $adm = $row['Data_Admissao'];
        } 
        echo $nome; ?></td><td><b>Data Admissão:</b> <?php $data = explode("-",$adm); $ndata = $data[2]."/".$data[1]."/".$data[0]; echo $ndata; ?></td></tr>    
</table>
    <table style="width:100%">
     <?php
        $sql = "SELECT * FROM tbl_topico";
        $result = mysqli_query($conn,$sql);
        $c = 0;
        while($row = mysqli_fetch_array($result))
        { $resp = "SELECT * FROM tbl_resposta";
          $show = mysqli_query($conn,$resp);
        echo "<tr bgcolor='#006666'><td><b><p style='color:#fff;'>Ítens da Avaliação  referentes a   <u>".utf8_encode($row['Descricao'])."</u></p></b></td>";
         while($linha = mysqli_fetch_array($show))
         {
            $ponto = explode(":",$linha['Descricao']);
             echo "<td><b><center><p style='color:#fff;'>".utf8_encode($ponto[0])."</p></center></b></td>";
         }
          echo "</tr>";
         $quest = "SELECT * FROM tbl_questionario WHERE tbl_topico_id_topico=".$row['id_topico'];
         $questao = mysqli_query($conn,$quest);
         while($mostra = mysqli_fetch_array($questao))
         {
             $titulo = explode(".",$mostra['Titulo']);
             $resp = "resp".$c;
             echo "<tr><td><b>".$titulo[0]."</b>.".utf8_encode($titulo[1])."</td>";
             $c++;
             $resposta = $_POST[$resp];
           
             if($resposta=="1")
             {
                 $i = $resposta;
                 $soma_i += $resposta;
                 $j=0;
                 $k=0;
                 $l=0;
             }
             else if($resposta == "2")
             {
                 $j = $resposta;
                 $soma_j += $resposta;
                 $i=0;
                 $k=0;
                 $l=0;
             }
             else if($resposta == "3")
             {
                 $k = $resposta;
                 $soma_k += $resposta;
                 $j=0;
                 $i=0;
                 $l=0;
             }
             else if($resposta == "4")
             {
                 $l = $resposta;
                 $soma_l += $resposta;
                 $j=0;
                 $k=0;
                 $i=0;
             }
             else {
                 $i=0;
                 $j=0;
                 $k=0;
                 $l=0;
             }
             if($soma_i == "")
             {
                         $soma_i=0;
       
             }
                if($soma_j == "")
             {
                         $soma_j=0;
       
             }
                if($soma_k == "")
             {
                         $soma_k=0;
       
             }
                if($soma_l == "")
             {
                         $soma_l=0;
       
             }
           echo "<td><center>".$i."</center></td><td><center>".$j."</center></td><td><center>".$k."</center></td><td><center>".$l."</center></td></tr>";
            
         }
         echo "<tr><td><b>PONTUAÇÃO EM RELAÇÃO AO ".utf8_encode($row['Descricao'])."</b></td><td bgcolor='#ccffff'><center><b>".$soma_i."</b></center></td><td bgcolor='#ccffff'><center><b>".$soma_j."</b></center></td><td bgcolor='#ccffff'><center><b>".$soma_k."</b></center></td><td bgcolor='#ccffff'><center><b>".$soma_l."</b></center></tr>";
             $total1 +=$soma_l+$soma_k+$soma_j+$soma_i;
             $total2 +=$soma_l+$soma_k+$soma_j+$soma_i;
             $parcial1 = ($total1*100/100)/48;
             $parcial2 = ($total2*100/100)/44;
         $soma_l=0;
         $soma_k=0;
         $soma_j=0;
         $soma_i=0;
        }
        ?>
    </table>
    <table style="width:100%">
        <tr><td colspan="3"  bgcolor='#006666'><center><b><p style='color:#fff;'>DEFINIÇÃO E PERCENTUAL DA PONTUAÇÃO</p></b></center></td></tr>
        <tr><td><center><b>Pontuação máxima possível (Incluindo indicador de glosa)</b></center></td><td><center>48</center></td><td><center>100%</center></td></tr>
        <tr><td><center><b>Pontuação máxima possível (Não Incluindo indicador de glosa)</b></center></td><td><center>44</center></td><td><center>100%</center></td></tr>
    </table>
    <table style="width:100%">
              <tr><td colspan="3"  bgcolor='#006666'><center><b><p style='color:#fff;'>PONTUAÇÃO EM % DO  FUNCIONÁRIO  AVALIADO</p></b></center></td></tr>
        <tr><td><center><b>Pontuação Obtida  (Incluindo Indicador de glosa)</b></center></td><td bgcolor='#ccffff'><center><?php echo "<b>".$total1."</b>"; ?></center></td><td bgcolor='#ccffff'><center><?php $porcent1=round($parcial1*100).'%'; 
            echo "<b>".$porcent1."</b>";?></center></td></tr>
        <tr><td><center><b>Pontuação Obtida  (Não incluindo Indicador de glosa)</b></center></td><td bgcolor='#ccffff'><center><?php echo "<b>".$total2."</b>";  ?></center></td><td bgcolor='#ccffff'><center><?php $porcent2=round($parcial2*100).'%'; 
            echo "<b>".$porcent2."</b>";?></center></td></tr>
    </table>
    <table style="width:100%">
        <tr><td colspan="3"  bgcolor='#006666'><center><b><p style='color:#fff;'>ESCALA DOS RESULTADOS</p></b></center></td></tr>
        <tr><td style="width:15%"><center><b>Até 50%</b></center></td><td><b><u>NÃO ATENDE AO PADRÃO</u></b>  -   O Colaborador que se enquadrar neste ítem deverá ter sua situação discutida com a Diretoria para planejamento de ações e/ou tomada de decisão em relação a sua continuidade no Hospital.</td></tr>
        <tr><td style="width:15%"><center><b>Entre 51% a 65%</b></center></td><td><b><u>ATENDE AO PADRÃO COM RESTRIÇÕES</u></b> - Apresenta atendimento que oscila entre o padrão e em algumas situações atende com restrições sem atentar ou se preocupar com as normas e rotinas estabelecidas. Deverá ser monitorado por seu Coordenador imediato para que o mesmo passe por processo de melhorias e atinja os próximos níveis. </td></tr>
        <tr><td style="width:15%"><center><b>Entre 66% a 89%</b></center></td><td><b><u>PADRÃO</u></b> - Contribui de forma padrão para sua área, fazendo atendimentos de acordo com as normas e rotinas e está apto a continuar exercendo sua função. </td></tr>
        <tr><td style="width:15%"><center><b>Acima de 90%</b></center></td><td><b><u>ACIMA DO PADRÃO</u></b> -  Contribui muito  para sua área com atendimento acima do padrão  e está apto a continuar exercendo sua função superando as expectativas.</td></tr>
    </table>
    <table style="width:100%;">
        <tr><td colspan="3"  bgcolor='#006666'><center><p style='color:#fff;'><b>PARECER DO GESTOR</b><br />Faça um resumo dos principais pontos da avaliação do funcionário</p></center></td></tr>
        <tr><td style="height:180px;"><textarea name='descricao' style="width:100%; height:100%;"></textarea></td></tr>
    </table>
    <table style="width:100%">
    <th>Data</th><th>Assinatura do Funcionário</th><th>Assinatura Superior Imediato</th>
        <tr><td style="width:20%"><?php $today = date("d/m/y"); echo "<center><b>".$today."</b></center>";?></td><td><br /><br /><hr style="width:45%" /><?php echo "<center><b>".$nome."</b></center>";  ?></td><td><br /><br /><hr style="width:45%" /><?php  echo "<center><b>".$_SESSION['Nome']."</b></center>";?></td></tr>
    </table><br />
    <?php
    $point = 0;
    $classi = "Não verificou";
    if($_POST['resp11'] == 0)
    {
        $point = $porcent2;
    }
    else
    {
        $point = $porcent1;
    }
    if($point <= "50%")
    {
        $classi = "Não atende o padrão";
    }
    else if($point >= "51%" && $point <= "65%")
    {
        $classi = "Atende o padrão com restrição";
    }
    else if($point >= "66%" && $point <= "89%")
    {
        $classi = "Padrão";
    }
    else if($point >= "90%")
    {
        $classi = "Acima do Padrão";
    }
    else
    {
        $classi = "Não verificou";
    }
    ?>
    <center><button onclick="imprimir()" id="botao" class="btn btn-primary btn-lg">Imprimir</button> <a href='concluir.php?id=<?php echo $_GET['id'];?>&nota=<?php echo $point;?>&classificacao=<?php echo $classi; ?>' class="btn btn-success btn-lg" id="botao1">Concluir</a></center>
    
    <script>
    function imprimir() {
    document.getElementById("botao").style.display="none"; 
    document.getElementById("botao1").style.display="none"; 
    window.print();
}
    </script>   
    
</body>