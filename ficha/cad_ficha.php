<?php session_start(); 
require_once("menu.php");
include("connect.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::. Ficha Funcional .::</title>
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
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

   
      <!-- Left side column. contains the logo and sidebar -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
              <div class="box">
                <div class="box-header">
                    <center><h2 class="box-title">Cadastrar Avaliação Funcional</h2></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad"> 
                    <?php
                      if($_GET['id'] != NULL)
                        {  
                            $h = 'hidden';
                        }
                        else
                        {  
                            $h = 'none';
                        }
                    ?>
                   <form action="sel_colaborador.php" method="get">
                    <center><label>Colaborador.:</label>    <select name='id' class='form-control select2' style="width: 20%; visibility:<?php echo $h;?>">
                        <?php 
                      $sql = "SELECT * FROM tbl_colaborador WHERE tbl_Usuario_id_Usuario = ".$_SESSION['ID'];
                      $result = mysqli_query($conn, $sql);
                        echo "<option value''>Lista de Colaboradores cadastrados!</option>";
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['idColaborador']."'>".$row['Nome']."</option>";
                      }
                    echo "</select><br /><button style='visibility:".$h."' type='submit' class='btn btn-success'>OK</button></center><br />";
                    ?>
                        </form>
                        <form action="inserir_elogio.php?id=<?php echo $_GET['id'];?>" method="post">    
                    <center><h3>Pontos Positivos/Elogios</h3></center>
                  <!-- tools box -->
                   <div class="form-group">
                    <label>Data:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" name="data_positivo" data-inputmask="'alias': 'dd/mm/yyyy'" style="width:12%;">
                    </div><!-- /.input group -->
                  <label>Relato:</label>
                        <textarea class="textarea" name="relato_positivo"  placeholder="Place some text here" style="width: 50%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    <center><button type="submit" class="btn btn-primary" >Adicionar</button></center><br/>
                  </form>
                <div class="box-header">
                    <form action="inserir_adv.php?id=<?php echo $_GET['id'];?>" method="post"> 
                    <center><h3>Oportunidade de Melhoria/Orientações/Advertências</h3></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                  <!-- tools box -->
         <label>Data:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control" name="data_adv" data-inputmask="'alias': 'dd/mm/yyyy'" style="width:12%;">
                    </div><!-- /.input group -->
                          <?php 
                      $sql = "SELECT * FROM tbl_tipoadv";
                      $result = mysqli_query($conn, $sql);
                         echo "<label>Tipo Advertência.:</label><br /><select name='adv' class='form-control select2' style='width: 10%;'>";
                      while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['idl_tipoadv']."'>".$row['Descricao']."</option>";
                      }
                    echo "</select><br />";
                    
                    ?>
                    <label>Relato.:</label>
                    <textarea class="textarea" name="relato_adv"  placeholder="Place some text here" style="width: 50%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br /><br />
                       <center><button type="submit" class="btn btn-primary">Adicionar</button></center><br/>
                    </form>
                        <form action="inserir_falta.php?id=<?php echo $_GET['id'];?>" method="post"> 
                     <div class="box-header">
                    <center><h3>Atestados</h3></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                  <!-- tools box -->
                    <label>Data.: </label><input type="date" name="Data_falta" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" style="width:12%;"/>
                    <label>Nº Dias.: </label><input type="number" name="Dias_Falta" class="form-control" style="width:12%;"/>
                    <label>Relato.:</label>
                    <textarea class="textarea" name="relato_falta"  placeholder="Place some text here" style="width: 50%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><br /><br /><center><button type="submit" class="btn btn-primary">Adicionar</button></center><br/>
                        </form>
                        <form action="inserir_aval.php?id=<?php echo $_GET['id'];?>" method="post"> 
                            <div class="box-header">
                    <center><h3>Avaliação de Desempenho</h3></center><br />
                    <div class="pull-right box-tools">
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                  <!-- tools box -->
                    <label>Data.: </label><input type="date" name="Data_aval" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" style="width:12%;"/><br />
                    <label>Nota.: </label><input type="number" name="nota_aval" class="form-control" style="width:12%;"/>
                    <label>Classificação.:</label>
                     <textarea class="textarea" name="classificacao_aval"  placeholder="Place some text here" style="width: 50%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 
                     <br /><br />  <center><button type="submit" class="btn btn-primary">Adicionar</button></center><br/><hr />
                        </form>
                        <?php
                        if($_SESSION['Tipo'] == "A")
                        {
                            $si= "none";
                        }
                        else
                        {
                            $si="hidden";
                        }
                        ?>
                       <form action="concluir_ficha.php?q=<?php echo $_GET['id'];?>" method="post">  
                           <center><button type="submit" class="btn btn-success" style="visibility:<?php echo $si;?>">Encerrar Ficha Ano</button></center><br/>
                        </form>
        
        <!-- Main content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Sistema desenvolvido pelo setor de TI.</strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
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
