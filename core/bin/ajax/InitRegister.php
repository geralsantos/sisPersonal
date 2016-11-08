<?php
$db = new Conexion();

 $user = ($_POST['user']);
 $pass = Encrypt($_POST['pass']);

 $email =($_POST['email']);

 $sql = $db->__construct()->prepare("SELECT user FROM users WHERE user = :user or email=:email LIMIT 1;");
 $sql-> bindParam(':user',$user);
 $sql-> bindParam(':email',$email);
 $sql -> execute();

 $result = $sql->fetch(PDO::FETCH_ASSOC);

 //si ha encontrado coincidencias
  if(!comprobar_nombre_usuario($user)){
    $ECHO = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>El nombre de usuario $user no es valido <a href='#' class='alert-link'></a>.</p>   </div>";
  }else{
 if ($result) {

   $usuario = $result['user'];

   if (strtolower($user) == strtolower($usuario)) {
     $ECHO = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>El usuario ya existe<a href='#' class='alert-link'></a>.</p>   </div>";

   }else{
     $ECHO = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>El email ya existe<a href='#' class='alert-link'></a>.</p>   </div>";


   }

 }else{
   $keyreg = md5(time());
   $link = APP_URL . "?view=activar&key=".$keyreg ;

   $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->Charset = "UTF-8";
$mail->Encoding = "quoted-printable";
 $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = PHPMAILER_HOST;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = PHPMAILER_USER;                 // SMTP username
$mail->Password = PHPMAILER_PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

$mail->setFrom(PHPMAILER_USER,'NOMBRE DE LA PAGINA :V');         //Quien manda
$mail->addAddress($email, $user);     // A quien le llega
/*$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');
*/
/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Activacion de tu cuenta';
$mail->Body    = 'Hola ' .$user.' para activar tu cuenta accede al siguiente enlace <a href='.$link.' > click aqui <a>';
$mail->AltBody = 'Hola '. $user.' para activar tu cuenta accede al siguiente enlace <a href='.$link.' > click aqui <a>';
//$mail->SMTPDebug = 1;
if(!$mail->send()) {

    $ECHO = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4><p>". (stristr($mail->ErrorInfo,'mail') ? "El email es incorrecto" : $mail->ErrorInfo )."<a href='#' class='alert-link'></a>.</p>   </div>";

} else {
  //Todo ok se registra y email enviado :v


  $insert = $db->__construct()->prepare("INSERT INTO users VALUES(DEFAULT,:user,:pass,:email,0,0,'$keyreg','','',0,'')");
  $insert->bindParam(':user',$user);
  $insert->bindParam(':pass',$pass);
  $insert->bindParam(':email',$email);
  $insert->execute();

  $sql_2 = $db->__construct()->prepare("SELECT id FROM users WHERE user=:user and pass=:pass ");
  $sql_2->bindParam(':user',$user);
  $sql_2->bindParam(':pass',$pass);
  $sql_2->execute();

  $result2 = $sql_2->fetch(PDO::FETCH_ASSOC);
  $_SESSION['app_id'] = $result2['id'];
  $db = null;
  $ECHO = 1;
}

 }

 }
  $db= null;
  echo $ECHO;


 ?>
