<?php
//if(!( isset($_SESSION['app_id']) or isset($_COOKIE['mypage_log']) or $usu[$_SESSION['app_id']] ))
//or ($usu[$_COOKIE['mypage_log']])==""

if(!(isset($_SESSION['app_id']) || isset($_COOKIE['mypage_log'])))
{

header('location: index.php?view='. md5('login').'');
}
else
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sisPersonal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo PUBLIC_DIR ?>js/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR ?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR ?>css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR ?>css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR; ?>css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="<?php echo PUBLIC_DIR; ?>img/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo PUBLIC_DIR; ?>img/favicon.ico">
    <script type="text/javascript" src="<?php echo PUBLIC_DIR ?>app/js/highcharts/highcharts.js"></script>
    <script src="<?php echo PUBLIC_DIR ?>app/js/highcharts/data.js"></script>
    <script src="<?php echo PUBLIC_DIR ?>app/js/highcharts/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="?view=home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>sis</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>sisPersonal</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">
                 <?php
                  try {
                    $log = $usu[isset($_SESSION['app_id']) ? $_SESSION['app_id'] : $_COOKIE['mypage_log']]['user'];
                        if (!$log){
                           throw new Exception();

                        }else{
                          echo  $log;

                        }


                  } catch (Exception $e) {
                  isset($_SESSION['app_id']) ? session_destroy() : setcookie("mypage_log", "", time() - 36000);
                  header('location: index.php?view='. md5('home').'');

                  }
                 ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">

                    <p> Foro :V  <small>geral_366</small> </p> </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div class="pull-right">
                      <a href="?view=<?php echo md5('close')?>"  class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
              <a href="?view=foro">
                <i class="fa fa-th"></i>
                <span>Reportes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?view=Ingresos"><i class="fa fa-circle-o"></i><span>Ingresos</span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>

                </li>

                <li><a href="?view=Ventas"><i class="fa fa-circle-o"></i><span>Ventas</span></a></li>
                  <li><a href="?view=Usuarios"><i class="fa fa-circle-o"></i><span>Usuarios</span></a></li>
                  <li><a href="?view=proveedor"><i class="fa fa-circle-o"></i><span>Usuarios</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Perfil</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?view=cuenta"><i class="fa fa-circle-o"></i>Cuenta</a></li>
                <li><a href="?view=mensajes"><i class="fa fa-circle-o"></i>Mensajes</a></li>
                <li><a href="?view=amigos"><i class="fa fa-circle-o"></i>Amigos</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Archivos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?view=documentos"><i class="fa fa-circle-o"></i><span>Documentos</span>
                    <small class="label pull-right bg-red">PDF</small>
                  </a>

                </li>

                <li><a href="?view=proveedor"><i class="fa fa-circle-o"></i><span>dss</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Temas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i>Pendientes</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Respondidas</a></li>
                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Realizadas</a></li>
              </ul>
            </li>



              <?php
                try {

                  if(($usu[isset($_SESSION['app_id']) ? $_SESSION['app_id'] : $_COOKIE['mypage_log']]['permisos']) == "2"  )
                  {
                      echo "  <li class='treeview'>
                          <a href='#'>
                            <i class='fa fa-folder'></i> <span>Acceso</span>
                            <i class='fa fa-angle-left pull-right'></i>
                          </a>
                            <ul class='treeview-menu'>
                            <li><a href='configuracion/usuario'><i class='fa fa-circle-o'></i> Usuarios</a></li>
                            </ul></li>";

                  }



                } catch (Exception $e) {

                }

               ?>

             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Ventas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                              <div class="contenido_html">
		                          <!--Contenido-->
		                    <?php
                          include(HTML_DIR."blade/index.php"); /*if(isset($_GET['view']) and $_GET['view']=='categoria'){
                                    include(HTML_DIR.'almacen/categoria/index.php');
                            }else{
                                     include(HTML_DIR.'index/main.php');

                                } */ ?>
                           </div>
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">

        </div>
       </footer>


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo PUBLIC_DIR; ?>js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo PUBLIC_DIR ?>js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo PUBLIC_DIR; ?>js/app.min.js"></script>

          <script src="<?php echo PUBLIC_DIR; ?>app/js/login.js"></script>
          <script src="<?php echo PUBLIC_DIR; ?>app/js/sideBar.js"></script>

          <link rel="stylesheet" href="<?php echo PUBLIC_DIR; ?>app/css/bootstrap-datepicker.min.css" />
          <script src="<?php echo PUBLIC_DIR; ?>app/js/bootstrap-datepicker.min.js"></script>
          <script>
          /**
 * Spanish translation for bootstrap-datepicker
 * Bruno Bonamin <bruno.bonamin@gmail.com>
 */
          ;(function($){
          	$.fn.datepicker.dates['es'] = {
          		days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
          		daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
          		daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
          		months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          		monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
          		today: "Hoy",
          		monthsTitle: "Meses",
          		clear: "Borrar",
          		weekStart: 1,
          		format: "yyyy-mm-dd"
          	};
          }(jQuery));
          $( document ).ready(function() {
              $('#fecha').datepicker({
                language:'es'
              });
          });
          </script>

  </body>
</html>
<?php

}
?>
