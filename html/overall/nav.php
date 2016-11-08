 
<nav>
  <div class="icon fi-list"></div>
    <header><a href="#">
        <?php
         echo $usu[$_SESSION['app_id']]['usuario'];
        ?>
        </a></header>
    <?php


?>
    <ul>
         <li class="dropdown"> 
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span  class="fa fa-user"></span> Perfil <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Salir</a></li>
               <li class="divider"></li>
            <li> <?php  
                    
               echo '<a href="?view=perfil&id='.$usu[$_SESSION['app_id']]['id'].'">Informacion Usuario</a>';
                ?>
            </li>
            
          </ul>
        </li> 
        <li> <a href="#"> Productos</a></li>
    <li><a href="#">Registro de Lavado</a></li>
         
    <li><a href="#">Observar Procesos</a></li>
    <li><a href="#">Registrar Empleado</a></li>
    <li><a href="#">Registrar Clientes</a></li>
    <li><a href="#">Cerrar Sesion</a></li>
  </ul>
</nav>