<?php
//echo 'Versión actual de PHP: ' . phpversion();
 if ( (isset($_SESSION['app_id']) ? $_SESSION['app_id'] : $_COOKIE['mypage_log']) and isset($_GET['key']) ) {
$db = new Conexion();

$keyreg = $_GET['key'];

$id = $usu[isset($_SESSION['app_id']) ? $_SESSION['app_id'] : $_COOKIE['mypage_log']]['id'];

 $sql = $db->__construct()->prepare("SELECT idusuario,keyreg FROM usuario WHERE keyreg=:keyreg AND idusuario=:id");
 $sql->bindParam(":keyreg",$keyreg);
 $sql->bindParam(":id",$id);
 $sql->execute();

 $result = $sql->fetch(PDO::FETCH_ASSOC);
  if ($result) {
   $sql = $db->__construct()->prepare("UPDATE usuario SET keyreg='' , estado='Activo' WHERE keyreg=:keyreg AND idusuario=:id");
   $sql->bindParam(":keyreg",$keyreg);
   $sql->bindParam(":id",$id);
   $sql->execute();

   header("location: ?view=".md5("home")."&success=true");
 }else {

   header("location: ?view=".md5("home")."&error=true");
 }

}else{

    include(HTML_DIR."foro/index.php");
}

 ?>
