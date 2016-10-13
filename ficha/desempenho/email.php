<?php
require_once("connect.php");
$sql = "SELECT * FROM tbl_colaborador WHERE idColaborador=".$_GET['id'];
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
    $colaborador = $row['Nome'];
}
$to      = $_GET['email'];
$subject = 'Avaliação de Desempenho';
$message = '<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>Olá acesse o link para realizar a avaliação de Desempenho do colaborador: '.$colaborador.' link:'.$_GET['link']." Obrigado!</p>
</body>
</html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: iguim37@hotmail.com' . "\r\n";
mail($to, $subject, $message,$headers);

    echo "<script>alert('Email enviado com sucesso!');</script>";

?>