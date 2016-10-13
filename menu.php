<?php  session_start(); 
include("header.php");
if($_SESSION['Tipo'] != 'A')
{
    $hi = "none";
   
}
else
{
    $hi = "block";
   
}
if($_SESSION['Tipo'] != 'G' && $_SESSION['Tipo'] != 'A')
{
    $ge = "none";
}
 else {
    $ge = "block";
 }
if($_SESSION['ID'] == null)
{
     echo '<meta http-equiv="refresh" content="0; url=index.php">';
}

?>  
<head>
<meta charset="UTF-8">
</head>
   <header class="main-header">
        <!-- Logo -->
        <a href="principal.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>F</b>icha</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Ficha</b> Funcional</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
           
              <!-- Notifications: style can be found in dropdown.less -->
       
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo "Bem-vindo ".$_SESSION['Nome'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="logo.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['Nome'];?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="sair.php" class="btn btn-default btn-flat">Sair</a>
                    </div>
                      <div class="pull-left">
                      <a href="alterar_senha.php" class="btn btn-default btn-flat">Alterar Senha</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
      
            </ul>
          </div>
        </nav>
      </header>