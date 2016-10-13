<?php session_start(); 
include("connect.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::. Avaliação Desempenho .::</title>
    <!-- Tell the browser to be responsive to screen width -->
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script type="text/javascript">
      function email(id){
         location.href = '192.168.0.4/ficha/desempenho/principal.php?id='+id; 
      }
      
      </script>
  </head>
  <body class='hold-transition skin-blue sidebar-mini'>
    <div class="wrapper">

   
      <!-- Left side column. contains the logo and sidebar -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
                     <div class="box">
                <div class="box-header with-border">
                    <center><h3 class="box-title"><b>Colaborador</b></h3></center>
                </div><!-- /.box-header -->
                <div class="box-body">
                   <?php  $c = 0;?>
                    <form action="compila.php?id=<?php echo $_GET['id'];?>" method="POST">  
                   <table>
                    <?php 
                    $topico = "SELECT * FROM tbl_topico";
                    $result = mysqli_query($conn,$topico);
                       while($row = mysqli_fetch_array($result))
                        {  echo "<tr bgcolor='#006666'><td><center><p style='color:#fff;'><b>".utf8_encode($row['Descricao'])."</b></p></center></td></tr><tr><td></td></tr>";
                            $quest = "SELECT * FROM tbl_questionario WHERE tbl_topico_id_topico =".$row['id_topico'];
                            $mostra = mysqli_query($conn,$quest);
                            while($show = mysqli_fetch_array($mostra))
                            {   echo "<tr bgcolor='#ccffff'><td style='text:justify'><center><b>".utf8_encode($show['Titulo'])."</b></center></td></tr>";
                                echo "<tr><td style='text:justify'>".utf8_encode($show['Descricao']);
                             $resp = "SELECT * FROM tbl_resposta";
                         $resultado = mysqli_query($conn,$resp);
                         while($linha = mysqli_fetch_array($resultado))
                         {
                             echo "<input type='radio' name='resp".$c."' value='".$linha['Valor']."' />".utf8_encode($linha['Descricao'])."<br />";
                         }  $c++;
                            }
                         
                        }
                        echo "</td></tr><tr><td></td></tr>";
                        
                    ?> 
                        </table>
                        <center><button type="submit" class="btn btn-success btn-lg" id="botao">Concluir</button></center>
                    </form>
                    <center><br /><button onclick="imprimir()" class="btn btn-primary btn-lg" id="botao1">Imprimir</button></center>
                     <script>
    function imprimir() {
    document.getElementById("botao").style.display="none"; 
    document.getElementById("botao1").style.display="none"; 
    document.getElementById("botao3").style.display="none"; 
    window.print();
    
}
    </script>   
                </div><!-- /.box-body -->
              </div><!-- /.box -->
<?php
if(isset($_POST['btn_email']))
{
    echo "<script>alert('".$_POST['colaborador']."')</script>";
}
          if(isset($_POST['btn_link']))
          {
            echo "<script>alert('".$_POST['colaborador']."+1')</script>";  
          }
          if(isset($_POST['btn_pdf']))
          {
              echo "<script>alert('".$_POST['colaborador']."+2')</script>";  
          }
?>
        <!-- Main content -->
      
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong id="botao3">Sistema desenvolvido pelo setor de TI.</strong>
      </footer>

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
