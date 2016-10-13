<?php
require_once 'connect.php';
$setor = $_POST['setor'];
$sql = "INSERT INTO tbl_setor(Descricao) VALUES ('".$setor."')";
mysqli_query($conn,$sql);

?>