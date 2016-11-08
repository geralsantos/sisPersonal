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
            'user' => $row['user'],
             'pass'=> $row['pass'],
                 'email'=> $row['email'],
                'permisos' => $row['permisos'],
                'activo'=> $row['activo'],
                'keyreg'=> $row['keyreg'],
                'keypass'=> $row['keypass'],
                'new_pass'=> $row['new_pass'],
                'ultima_conexion'=> $row['ultima_conexion'],
                'no_leidos'=> $row['no_leidos']

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
