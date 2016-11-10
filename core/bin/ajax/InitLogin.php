<?php

$db = new Conexion();

if (!empty($_POST['user']) and !empty($_POST['pass']))
{


$user =  ($_POST['user']);
$pass = Encrypt($_POST['pass']);

$sql =$db->__construct()->prepare('SELECT id FROM users WHERE (user =:user or email=:user) AND pass=:pass LIMIT 1;');
$sql ->bindParam(':user', $user);
$sql ->bindParam(':pass', $pass);
$sql->execute();

$result = $sql->fetch(PDO::FETCH_ASSOC);

if ($result){

  if($_POST['sesion']=="true"){
   setcookie("mypage_log",$result["id"],time()+(60*60*24));

    } else{
       //setcookie("mypage_log","",time()+0);

         $_SESSION['app_id'] = $result["id"];

    }

 echo 1;

}else{

    echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>Oh Demn :v!</strong> <a href='#' class='alert-link'>Credenciales incorrectas.
</div>";

}
   $db = null;
 }else{
    echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>&times;</button>
  <strong>Oh Shet t_t!</strong> <a href='#' class='alert-link'>Debe Llenar los datos.
</div>";

    $db = null;
}


?>
