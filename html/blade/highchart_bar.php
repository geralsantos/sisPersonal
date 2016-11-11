<?php

$db = new Conexion_laravel_mysql();

$fecha_buscada = !empty($_GET["fecha"])?$_GET["fecha"]:"";
if ($fecha_buscada) {

    $sql2 =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST(:fecha_buscada AS DATE) AND CAST(SYSDATE() as DATE)');
    $sql2->bindParam(":fecha_buscada",$fecha_buscada);
    $sql2->execute();
    $result_ingreso_total = $sql2->fetch(PDO::FETCH_ASSOC);

    $response["ingreso_total"] = intval($result_ingreso_total["compra"]);


    $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio", DATE_FORMAT(i.fecha_hora,"%M") as "mes"
    FROM ingreso i,detalle_ingreso d
    WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST(:fecha_buscada AS DATE) AND CAST(SYSDATE() as DATE)
    GROUP BY DATE_FORMAT(i.fecha_hora,"%Y")' );
    $sql->bindParam(":fecha_buscada",$fecha_buscada);
    $sql->execute();
    $result_anios = $sql->fetchAll(PDO::FETCH_ASSOC);
    $array = array();

       foreach ($result_anios as $key) {
           $response2["name"] = $key["anio"];
           $response2["y"] = intval($key["compra"]);
           //$response2["drilldown"] = $key["anio"];
           $response2["drilldown"] = $key["anio"];
           array_push($array, $response2);

        //  print_r("{ name:'".$key["anio"]."', y:".$key['compra'].", drilldown:'meses'},");
       }
     $response["anios"] = ($array);

     $sql_meses =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra",DATE_FORMAT(i.fecha_hora, "%Y") as "anio", DATE_FORMAT(i.fecha_hora,"%M") as "mes"
     FROM ingreso i,detalle_ingreso d
     WHERE d.idingreso = i.idingreso AND DATE_FORMAT(i.fecha_hora,"%Y") = "2013"
     GROUP BY DATE_FORMAT(i.fecha_hora,"%Y,%M")
     ORDER BY DATE_FORMAT(i.fecha_hora,"%M") DESC' );
     $sql_meses->bindParam(":fecha_buscada",$fecha_buscada);
     $sql_meses->execute();
     $result_meses = $sql_meses->fetchAll(PDO::FETCH_ASSOC);
     $array2 = array();
     $array4 = array();
     foreach ($result_meses as $key) {
        $response4["id"] = $key["anio"];
        $response4["name"] = $key["mes"];

        foreach ($result_meses as $key2) {
          $response3["name"] = $key2["mes"];
          $response3["y"] = intval($key2["compra"]);
          $response3["drilldown"] = $key2["mes"];
          array_push($array2, $response3);

           }

     }
       $response4["data"]= $array2;
       $response["id"] = $response4;
    /* foreach ($result_meses as $key2) {
           $response3["name"] = $key2["mes"];
           $response3["y"] = intval($key2["compra"]);
           $response3["drilldown"] = "dias";
           array_push($array2, $response3);

       }*/
    //  $response["data"] = ($array2);
      $json_encode = ($response);
      print_r(json_encode($json_encode));



          /*$sql_meses =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora,"%M") as "mes"
            FROM ingreso i,detalle_ingreso d
            WHERE d.idingreso = i.idingreso AND DATE_FORMAT(i.fecha_hora,"%Y") =  GROUP BY DATE_FORMAT(i.fecha_hora,"%M") ORDER BY DATE_FORMAT(i.fecha_hora,"%M") DESC' );
            //$sql_meses->bindParam(":fecha_buscada",$fecha_buscada);
            $sql_meses->execute();
            $result_meses = $sql_meses->fetchAll(PDO::FETCH_ASSOC);
            $array2 = array();
             foreach ($result_meses as $key2) {
                  $response3["name"] = $key2["mes"];
                  $response3["y"] = intval($key2["compra"]);
                  $response3["drilldown"] = "dias";
                  array_push($array2, $response3);
                }*/


   //print_r(json_encode($response));

   /*$sql3 =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%M") as "mes" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND DATE_FORMAT(i.fecha_hora,"%Y") = DATE_FORMAT(:fecha_buscada,"%Y") GROUP BY d.idingreso');
   $sql3->bindParam(":fecha_buscada",$fecha_buscada);
   $sql3->execute();
   $result3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
   $array3 = array();
       foreach ($result3 as $key) {
         $response3["name"] = $key["mes"];
         $response3["y"] = intval($key["compra"]);
         $response3["drilldown"] = "dias";
         array_push($array3, $response3);
        //  print_r("{ name:'".$key["anio"]."', y:".$key['compra'].", drilldown:'meses'},");
      }*/


}else {

  $sql1=$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso');
  $sql1->execute();
  $result = $sql1->fetch(PDO::FETCH_ASSOC);
  $response["ingreso_total"] = intval($result["compra"]);
  echo json_encode($response);

}




?>
