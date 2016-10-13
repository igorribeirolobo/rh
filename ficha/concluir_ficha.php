<?php
require_once("connect.php");
$sql = "UPDATE tbl_ficha SET status = 'C' WHERE id_ficha =".$_GET['q'];
mysqli_query($conn,$sql);
echo "<script> alert('Ficha concluida com sucesso!')</script><meta http-equiv='refresh' content='0; url=cad_ficha.php'>";

?>