<?php
function comprobar_nombre_usuario($nombre_usuario){
   if (ereg("^[a-zA-Z0-9\-_]{3,20}$", $nombre_usuario)) {

      return true;
   } else {

      return false;
   }
}
 ?>
