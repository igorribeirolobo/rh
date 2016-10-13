<?php
require_once('connect.php');
$sql = " UPDATE tbl_colaborador SET Data_Demissao = '".date('Y-m-d')."' WHERE idColaborador = ".$_GET['id'];
mysqli_query($conn,$sql);
echo "<script>alert('Colaborador arquivado com sucesso!');</script>";
echo "<meta http-equiv='refresh' content='0; url=visualiza_colaborador.php'>";

?>