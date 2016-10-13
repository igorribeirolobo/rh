<?php session_start();

  define('MPDF_PATH', 'class/mpdf/');
  include(MPDF_PATH.'mpdf.php');
  
$url = urldecode($_REQUEST['url']);


// For $_POST i.e. forms with fields
if (count($_POST)>0) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );
    foreach($_POST AS $name=>$post) {
        $formvars = array($name=>$post." \n");
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $formvars);
    $html = curl_exec($ch);
    curl_close($ch);
}
else if (ini_get('allow_url_fopen')) {
    $html = file_get_contents($url);
}
else {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
    $html = curl_exec($ch);
    curl_close($ch);
}

$mpdf=new mPDF('utf-8');
$mpdf->useSubstitutions = true; // optional - just as an example
$mpdf->SetHeader($url.'||Página {PAGENO}');  // optional - just as an example
$mpdf->CSSselectMedia='mpdf'; // assuming you used this in the document header
$mpdf->setBasePath($url);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML('<p style="text-align: center"><strong>Numero do Pedido:</strong> 6712312MAR2016</p>');
$mpdf->WriteHTML('<p><strong>Nome: </strong>'.$_SESSION['dados'][0].'</p>');
$mpdf->WriteHTML('<p><strong>E-mail: </strong>'.$_SESSION['dados'][1].'</p>');

$mpdf->WriteHTML('<p><strong>Telefone 1: </strong>'.$_SESSION['dados'][2].'</p>');
$mpdf->WriteHTML('<p><strong>Telefone 2: </strong>'.$_SESSION['dados'][3].'</p>');
$mpdf->WriteHTML('<p><strong>Cidade onde mora: </strong>'.$_SESSION['dados'][4].'</p>');
$mpdf->WriteHTML('<p><strong>Dia da viagem: </strong>'.$_SESSION['dados'][5].'</p>');
$mpdf->WriteHTML('<p><strong>Mês da viagem: </strong>'.$_SESSION['dados'][6].'</p>');
$mpdf->WriteHTML('<p><strong>Ano da viagem: </strong>'.$_SESSION['dados'][7].'</p>');
$mpdf->WriteHTML('<p><strong>Data Flexivel: </strong>'.$_SESSION['dados'][8].'</p>');
$mpdf->WriteHTML('<p><strong>Quantidade de Adultos: </strong>'.$_SESSION['dados'][9].'</p>');
$mpdf->WriteHTML('<p><strong>Quantidade de Jovens de 12 a 18 anos: </strong>'.$_SESSION['dados'][10].'</p>');
$mpdf->WriteHTML('<p><strong>Quantidade de Crianças de 2 a 12 anos: </strong>'.$_SESSION['dados'][11].'</p>');
$mpdf->WriteHTML('<p><strong>Quantidade de Bebês de 0 a 2 anos: </strong>'.$_SESSION['dados'][12].'</p>');
$mpdf->WriteHTML('<p><strong>Necessidades específicas: </strong>'.substr_replace($_SESSION['dados'][13], '', -2).'</p>');
$mpdf->WriteHTML('<p><strong>Outras necessidades específicas: </strong>'.$_SESSION['dados'][14].'</p>');
$mpdf->WriteHTML('<p><strong>Orçamento planejado para a viagem: </strong>'.$_SESSION['dados'][15].'</p>');
$mpdf->WriteHTML('<p><strong>Você deseja viajar com excursões ou por conta própria? </strong>'.$_SESSION['dados'][16].'</p>');
$mpdf->WriteHTML('<p><strong>Cidade na qual irá iniciar a viagem </strong>'.$_SESSION['dados'][17].'</p>');
$mpdf->WriteHTML('<p><strong>Cidade na qual irá terminar a viagem </strong>'.$_SESSION['dados'][18].'</p>');
if($_SESSION['dados'][19] == 1){
$mpdf->WriteHTML('<p><strong>Você já definiu seus destinos ou deseja sugestões?  </strong>Sim</p>');    
$mpdf->WriteHTML('<p><strong>Qual é o seu destino? </strong>'.$_SESSION['dados'][20].'</p>');    
$mpdf->WriteHTML('<p><strong>Qual meio de transporte você quer utilizar para chegar ao seu destino? </strong>'.$_SESSION['dados'][21].'</p>');    
$mpdf->WriteHTML('<p><strong>Quantos dias você pretende passar neste destino? </strong>'.$_SESSION['dados'][22].'</p>');    
$mpdf->WriteHTML('<p><strong>Onde você gostaria de se hospedar? </strong>'.$_SESSION['dados'][23].'</p>');    
$mpdf->WriteHTML('<p><strong>Gostaria do serviço de transfer até o local de hospedagem? </strong>'.$_SESSION['dados'][24].'</p>');    
$mpdf->WriteHTML('<p><strong>Deseja alugar um veículo no destino? </strong>'.$_SESSION['dados'][25].'</p>');    
$mpdf->WriteHTML('<p><strong>Deseja realizar passeios orientados por guias no destino? </strong>'.$_SESSION['dados'][26].'</p>');    
}
if($_SESSION['dados'][27] == 1){
    $mpdf->WriteHTML('<p><strong>Destino adicional: </strong></p>');    
    $mpdf->WriteHTML('<p><strong>Qual é o seu destino? </strong>'.$_SESSION['dados'][28].'</p>');    
    $mpdf->WriteHTML('<p><strong>Qual meio de transporte você quer utilizar para chegar ao seu destino? </strong>'.$_SESSION['dados'][29].'</p>');    
    $mpdf->WriteHTML('<p><strong>Quantos dias você pretende passar neste destino? </strong>'.$_SESSION['dados'][30].'</p>');    
    $mpdf->WriteHTML('<p><strong>Onde você gostaria de se hospedar? </strong>'.$_SESSION['dados'][31].'</p>');    
    $mpdf->WriteHTML('<p><strong>Gostaria do serviço de transfer até o local de hospedagem? </strong>'.$_SESSION['dados'][32].'</p>');    
    $mpdf->WriteHTML('<p><strong>Deseja alugar um veículo no destino? </strong>'.$_SESSION['dados'][33].'</p>');    
    $mpdf->WriteHTML('<p><strong>Deseja realizar passeios orientados por guias no destino? </strong>'.$_SESSION['dados'][34].'</p>');    
}
if($_SESSION['dados'][35] == 1){
    $mpdf->WriteHTML('<p><strong>Que tipo de destino você deseja aproveitar? </strong>'.substr_replace($_SESSION['dados'][36], '', -2).'</p>');
    $mpdf->WriteHTML('<p><strong>Você tem alguma preferência de lugares? </strong>'.$_SESSION['dados'][37].'</p>'); 
    $mpdf->WriteHTML('<p><strong>Qual meio de transporte você quer utilizar para chegar ao seu destino? </strong>'.$_SESSION['dados'][38].'</p>'); 
    $mpdf->WriteHTML('<p><strong>Quantos dias você pretende passar neste destino? </strong>'.$_SESSION['dados'][39].'</p>'); 
    $mpdf->WriteHTML('<p><strong>Onde você gostaria de se hospedar? </strong>'.$_SESSION['dados'][40].'</p>'); 
    $mpdf->WriteHTML('<p><strong>Gostaria do serviço de transfer até o local de hospedagem? </strong>'.$_SESSION['dados'][41].'</p>'); 
    $mpdf->WriteHTML('<p><strong>Deseja alugar um veículo no destino? </strong>'.$_SESSION['dados'][42].'</p>'); 
}
$mpdf->WriteHTML('<p><strong>Informações complementares </strong>'.$_SESSION['dados'][43].'</p>'); 
if($_SESSION['dados'][44] == 1){
$mpdf->WriteHTML('<p><strong>Aceito receber sugestões dos parceiros ViaJá Brasil.</strong></p>'); 
}else {
 $mpdf->WriteHTML('<p><strong>Não desejo receber sugestões dos parceiros ViaJá Brasil.</strong></p>'); 
}
$mpdf->Output();
exit;
