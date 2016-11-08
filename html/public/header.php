<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
 <script src="views/js/jquery-latest.js" ></script>
         <link rel="stylesheet" href="views/css/Bootstrap/bootstrap.min.css" >
         <link rel="stylesheet" href="fonts/font-awesome.css" >
        <script src="views/css/Bootstrap/bootstrap.min.js" type="text/javascript" ></script>
     
    </head> 
    <body>
      <!-- Modal-->
    <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
                <?php   include( HTML_DIR. 'public/center.php'); ?>
      
   
          </div>
        </div>
 
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Full Wash</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><span class="fa fa-home"></span> Inicio</a></li>
        <li><a href="#">Servicios</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mostrar <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">no zoi 100tifiko</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
          <?php
          if(!isset($_SESSION['app_id'])){
              
              
          
          ?>
          
        <li><a href='#' type="button" data-toggle="modal" data-target="#myModal">Inicar Sesion</a>
      
          </li>
         
            <?php
           }else{  ?>
              
               <li><a href="?view=perfil&id=<?php echo $usu[$_SESSION['app_id']]['id']; ?>"> <?php echo strtoupper($usu[$_SESSION['app_id']]['usuario']); ?></a>
          
          
          </li>
             <?php  
          }
            ?>
          
          
          
      </ul>
    </div>
  </div>
</nav>

        
 
