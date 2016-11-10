<?php

  require ('core/core.php');


$view = isset($_GET['view']) ? $_GET['view'] : 'login';

 //$view =  md5('home') ? 'home' :  $_GET['view'];
if ($view ==  md5('home')) $view='home';
if ($view ==  md5('login')) $view='login';
if ($view ==  md5('close')) $view='close';


if  ( $view and file_exists('core/controllers/'.$view.'Controller.php')){
    include ('core/controllers/'.$view.'Controller.php');

}else{

    include ('core/controllers/errorController.php');
}

?>
