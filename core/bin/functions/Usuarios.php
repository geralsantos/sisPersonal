<?php


function usuarios(){
     $db = new Conexion();
  /* for ($i=0; $i <= 300; $i++) {
        $user = "user$i";
       $pass=Encrypt("123");
       $email="user$i@hotmail.com";
       $sql = $db->__construct()->prepare("INSERT INTO users VALUES(default,:user,:pass,:email,0,1,'','','',0,'');");
       //$sql = $db->__construct()->prepare("DELETE FROM users WHERE user != 'prinick' and user != 'UserTest'");
        $sql->bindParam(":user",$user);
       $sql->bindParam(":pass",$pass);
       $sql->bindParam(":email",$email);
       $sql->execute();

   }*/
      /*INSERT INTO users VALUES(default,'user01','123','user@hotmail.com',0,1,'','','',0,'');*/
     try{


    $sql = $db->__construct()->prepare("select * from users");

         $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        $keys = array_keys($result);
        if ($result){
        foreach ($result as $row) {

          foreach ($keys as $key)
          $usuarios[$row['id']] = array(
            'id' =>  $row['id'],
            'usuario' => $row['user'],
             'contrasena'=> $row['pass'],
                 'email'=> $row['email'],
                'estado' => $row['permisos'],
                'tipo'=> $row['activo']

            );
        }

             }

        else{
             $bd = null;
          $usuarios = false;
         }

    }catch(Exception $ex){
           $bd = null;
    echo 'Failed: ';

    }
      $bd = null;

    return $usuarios;


                     }

?>
