<?php

if( isset($_GET["success"]) ){

echo "activado";
//include("html/foro/admin.php");
}else if( isset($_GET["error"]) ){

echo "Error al intentar activarte" ;

}
echo "esto es el principal :V" ;

 ?>
