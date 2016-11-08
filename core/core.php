<?php
//Session
session_start();
//Constantes de la conexion

define ('DB_HOST','localhost');
define('DB_USER','poma');
define('DB_PASS','123');
define('DB_NAME','dbforo');

//Constantes de la pagina
define("APP_TITLE","Foro nombre");
define('HTML_DIR','html/');
define('VIEWS_DIR','views/');
define('FONTS_DIR','fonts/');
define('PUBLIC_DIR','public/');
//define('APP_URL','http://localhost/sisPersonal/');

//PHPMailer smtp.gmail.com
define('PHPMAILER_HOST','smtp-mail.outlook.com');
//define('PHPMAILER_HOST','smtp-mail.outlook.com');
define('PHPMAILER_USER','geral_366@hotmail.com');
define('PHPMAILER_PASS','Hirenboot149');
define('PHPMAILER_PORT',587);
//587
//Estructura
require ('core/models/ConexionMYSQL.php');
require('core/bin/functions/Encriptar.php');
require('core/bin/functions/Usuarios.php');
require('core/bin/functions/Categorias.php');
require('core/bin/functions/Pagination.php');
require ('vendor/autoload.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/caracteres_especiales.php');

$usu = usuarios();
//$cat = categorias();
$pag = pagination();

?>
