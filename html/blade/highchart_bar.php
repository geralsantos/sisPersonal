<?php

$db = new Conexion_laravel_mysql();

$fecha_buscada = !empty($_GET["fecha"])?$_GET["fecha"]:"";

if ($fecha_buscada) {

  $meses = array ('January','February','March','April','May','June','July','August','September','October','November','December');
  $meses_es = array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
  $mes_espanol= "";

    /*----------total de ingresos--------------*/
    $sql_ingreso_total =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST(:fecha_buscada AS DATE) AND SYSDATE()');
    $sql_ingreso_total->bindParam(":fecha_buscada",$fecha_buscada);
    $sql_ingreso_total->execute();
    $result_ingreso_total = $sql_ingreso_total->fetch(PDO::FETCH_ASSOC);
    $response["ingreso_total"] = intval($result_ingreso_total["compra"]);
    /*----------total de ingresos--------------*/

    /*----------todos los años de ingresos--------------*/

    $sql_ingreso_anios =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio", DATE_FORMAT(i.fecha_hora,"%M") as "mes"
    FROM ingreso i,detalle_ingreso d
    WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST(:fecha_buscada AS DATE) AND SYSDATE()
    GROUP BY DATE_FORMAT(i.fecha_hora,"%Y")' );
    $sql_ingreso_anios->bindParam(":fecha_buscada",$fecha_buscada);
    $sql_ingreso_anios->execute();
    $result_ingreso_anios = $sql_ingreso_anios->fetchAll(PDO::FETCH_ASSOC);
    $array_ingresos_anios = array();

       foreach ($result_ingreso_anios as $key) {
           $response2["name"] = $key["anio"];
           $response2["y"] = intval($key["compra"]);
           $response2["drilldown"] = $key["anio"];
           array_push($array_ingresos_anios , $response2);

       }
     $response["ingresos_anios"] = ($array_ingresos_anios);

     /*----------todos los años de ingresos--------------*/


     /*----------todos los meses por año--------------*/

     $sql_ingresos_meses =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra",DATE_FORMAT(i.fecha_hora, "%Y") as "anio", DATE_FORMAT(i.fecha_hora,"%M") as "mes",DATE_FORMAT(i.fecha_hora, "%D") as "dia"
     FROM ingreso i,detalle_ingreso d
     WHERE d.idingreso = i.idingreso AND DATE_FORMAT(i.fecha_hora,"%Y") BETWEEN DATE_FORMAT(:fecha_buscada,"%Y") AND DATE_FORMAT(SYSDATE(), "%Y")
     GROUP BY DATE_FORMAT(i.fecha_hora,"%Y,%M")
     ORDER BY DATE_FORMAT(i.fecha_hora,"%M") DESC' );
     $sql_ingresos_meses->bindParam(":fecha_buscada",$fecha_buscada);
     $sql_ingresos_meses->execute();
     $result_ingresos_meses = $sql_ingresos_meses->fetchAll(PDO::FETCH_ASSOC);
     $array_ingresos_meses_por_anio = array();

          foreach ($result_ingreso_anios as $key0)
          {
                  $array_data = array();

                  $response4["id"] = $key0["anio"];
                  $response4["name"] = $key0["anio"];

                 foreach ($result_ingresos_meses as $key1)
                 {
                       if ($key0["anio"]==$key1["anio"])
                       {
                         for ($i=0; $i < count($meses) ; $i++)
                         {
                           if ($key1["mes"] == $meses[$i])
                           {
                           $mes_espanol = $meses_es[$i];
                           }
                         }
                             $response3["name"] = $mes_espanol;
                             $response3["y"] = intval($key1["compra"]);
                             $response3["drilldown"] = ($mes_espanol."_".$key1["anio"]);
                             array_push($array_data, $response3 );
                       }
                  }


                  $response4["data"] = $array_data;
                  array_push($array_ingresos_meses_por_anio, $response4);
                  $response["ingresos_meses_por_anio"] = $array_ingresos_meses_por_anio;
          }

      $sql_ingresos_dias =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra",DATE_FORMAT(i.fecha_hora, "%Y") as "anio", DATE_FORMAT(i.fecha_hora,"%M") as "mes", DATE_FORMAT(i.fecha_hora, "%D") as "dia"
          FROM ingreso i,detalle_ingreso d
          WHERE d.idingreso = i.idingreso AND DATE_FORMAT(i.fecha_hora,"%Y,%M") BETWEEN DATE_FORMAT(:fecha_buscada,"%Y,%M") AND DATE_FORMAT(SYSDATE(), "%Y,%M")
          GROUP BY DATE_FORMAT(i.fecha_hora,"%D")
          ORDER BY DATE_FORMAT(i.fecha_hora,"%M") DESC' );
      $sql_ingresos_dias->bindParam(":fecha_buscada",$fecha_buscada);
      $sql_ingresos_dias->execute();
      $result_ingresos_dias = $sql_ingresos_dias->fetchAll(PDO::FETCH_ASSOC);
      $array_ingresos_dias_por_mes = array();

        foreach ($result_ingresos_meses as $key_mes) {
          $array_data_dias = array();
          for ($i=0; $i < count($meses) ; $i++)
          {
            if ($key_mes["mes"] == $meses[$i])
            {
            $mes_espanol = $meses_es[$i];
            }
          }
          $response5["id"] = ($mes_espanol."_".$key_mes['anio']);
          $response5["name"] = $mes_espanol;

          foreach ($result_ingresos_dias as $key_dia) {
                if ($key_mes["anio"]==$key_dia["anio"] && $key_mes["mes"]==$key_dia["mes"])
                {
                  $response6["name"] = $key_dia["dia"];
                  $response6["y"] = intval($key_dia["compra"]);
                  array_push($array_data_dias, $response6 );
                }
          }
            $response5["data"] = $array_data_dias;
            array_push($array_ingresos_dias_por_mes, $response5);
            $response["ingresos_dias_por_mes"] = $array_ingresos_dias_por_mes;

        }


          /*
            {id:"November_2016",name:"November",data:[{name:"Lunes",y:100},{name:"Miercoles",y:100}]}
          */
      $json_encode = json_encode($response);
      print_r($json_encode);
      /*----------todos los meses por año--------------*/

}else {
 

}




?>
