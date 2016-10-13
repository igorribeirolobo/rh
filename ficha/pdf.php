<?php
session_start(); 
include("connect.php");
$sql ="SELECT * FROM tbl_Ficha WHERE id_Ficha =".$_SESSION['tmp_id'];
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{   $ficha = $row['id_Ficha'];
    $colaborador = $row['tbl_Colaborador_idColaborador'];
    $periodo = $row['Periodo'];
}
$sql = "SELECT * FROM tbl_colaborador WHERE idColaborador=".$colaborador;
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{
    $nome = $row['Nome'];
    $data = explode("-",$row['Data_Admissao']);
    $admissao = $data[2]."/".$data[1]."/".$data[0];
}
ob_start();
//<img src="lg.png" width="10%" height="5%" align="left"/>
$html = ob_get_clean();
$html .='<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width:100%;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-41rm{color:#000000;text-align:left;vertical-align:middle;background-color:#f0f0f0;}
.tg .tg-43rm{color:#000000;text-align:left;vertical-align:middle;background-color:#f0f0f0;border:none}
.tg .tg-42rm{color:#000000;text-align:left;vertical-align:top;background-color:#f0f0f0;border:none;}
</style><table class="tg"><tr><td class="tg-42rm"><img src="lg.png" width="10%" height="5%"></td><td class="tg-43rm" colspan="3"><b><p align="center">FICHA FUNCIONAL</p></b></td></tr><tr><td><b>Nome do Funcionário:</b>'.$nome.'</td><td><b>Admissão:</b>'.$admissao.'</td><td colspan="2"><b>Período:</b>'.$periodo.'</td></tr><tr><td class="tg-41rm" colspan="4"><center><b>Pontos Positivos / Elogios</b></center></td></tr><tr><td><center><b>Data</b></center></td><td colspan="3"><center><b>Relato</b></center></td></tr>';
                      $sql = "SELECT * FROM tbl_elogio WHERE tbl_Ficha_id_Ficha = ".$ficha;
                     $result = mysqli_query($conn,$sql);
                      while($row = mysqli_fetch_assoc($result))
                      {   $array = explode("-",$row['Data_Elogio']);
                          $data = $array[2]."/".$array[1]."/".$array[0];
                          $html .= '<tr><td><center>'.$data.'</center></td><td colspan="3"><center>'.$row['Relato'].'</center></td></tr>';
                      }
                  $html .='
                        <tr><td class="tg-41rm" colspan="4"><center><b>Oportunidade de Melhoria/Orientações/Advertências</b></center></td></tr>
                        <tr><td><center><b>Data</b></center></td><td><center><b>Verbal</b></center></td><td><center><b>Escrita</b></center></td><td><center><b>Relato</b></center></td></tr>';
                        $sql = "SELECT * FROM tbl_adv WHERE tbl_Ficha_id_Ficha = ".$ficha;
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $array = explode("-",$row['Data_adv']);
                            $data = $array[2]."/".$array[1]."/".$array[0];
                            if($row['tbl_tipoadv_idl_tipoadv'] == 1)
                            {
                              $html  .='<tr><td><center>'.$data.'</center></td><td><center>X</center></td><td></td><td><center>'.$row['Relato'].'</center></td></tr>'; 
                            }
                            else
                            {
                                $html .='<tr><td><center>'.$data.'</center></td><td></td><td><center>X</center></td><td><center>'.$row['Relato'].'</center></td></tr>'; 
                            }
                                
                        }
                    $html .= '
                        <tr><td class="tg-41rm" colspan="4"><center><b>Atestados / Faltas</b></center></td></tr>
                        <tr><td><center><b>Data</b></center></td><td><center><b>Número de Dias</b></center></td><td colspan="2"><center><b>Relato</b></center></td></tr>';
                        $sql = "SELECT * FROM tbl_atestado WHERE tbl_Ficha_id_Ficha = ".$ficha;
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $array = explode("-",$row['Data']);
                            $data = $array[2]."/".$array[1]."/".$array[0];
                            $html .= '<tr><td><center>'.$data.'</center></td><td><center>'.$row["Dias"].'</center></td><td colspan="2"><center>'.$row["Relato"].'</center></td></tr>';
                        }
                    $html .= '
                        <tr><td class="tg-41rm" colspan="4"><center><b>Avaliação de Desempenho</b></center></td></tr>
                        <tr><td><center><b>Data Avaliação</b></center></td><td><center><b>Nota</b></center></td><td colspan="2"><center><b>Classificação</b></center></td></tr>';
                        $sql = "SELECT * FROM tbl_desempenho WHERE tbl_Ficha_id_Ficha = ".$ficha;
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $array = explode("-",$row['Data_Avaliacao']);
                            $data = $array[2]."/".$array[1]."/".$array[0];
                            $html .= '<tr><td><center>'.$data.'</center></td><td><center>'.$row['Nota'].'%</center></td><td colspan="2"><center>'.$row["Classificacao"].'</center></td></tr>';
                        }
                    $html .= '</table>';
include("mpdf/mpdf.php");

$mpdf = new MPDF('','Legal');
$mpdf->AddPage('L');
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'UTF-8';
$mpdf->WriteHTML($html);
$mpdf->Output($nome,"I");
exit();
?>  