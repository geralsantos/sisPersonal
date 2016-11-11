<?php

class Conexion
{
    public function __construct(){
    try {

           $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);

    // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
     echo "Connection failed: " . $e->getMessage();
      }
         return $conn;
      }



 }
/**
 *
 */
class Conexion_laravel_mysql
{

public function __construct()
  {

   try {

     $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME2.";charset=utf8", DB_USER, DB_PASS);
     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
      echo "Conexion fallida: ".$e->getMessage();
   }
      return $conn;
  }

}


?>
