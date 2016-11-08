<?php

function categorias(){

    try{
         $db = new Conexion();

        $sql = $db->__construct()->prepare('select*from categoria limit 2');
        $sql->execute();

        $result =$sql->fetchAll(PDO::FETCH_ASSOC);


        $db= null;


    }catch(Exception $e){
    $db=null;
      echo 'failed function categorias(): '+$e.getMessage();

    }

   return $result;


}

?>
