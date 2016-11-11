<?php

$db = new Conexion_laravel_mysql();

$fecha_buscada = !empty($_GET["fecha"])?$_GET["fecha"]:"";
if ($fecha_buscada) {

  $sql2 =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST(:fecha_buscada AS DATE) AND CAST(SYSDATE() as DATE)');
  $sql2->bindParam(":fecha_buscada",$fecha_buscada);
  $sql2->execute();
  $result = $sql2->fetch(PDO::FETCH_ASSOC);
  echo intval($result["compra"]);

  

}else {

  $sql1=$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso');
  $sql1->execute();
  $result = $sql1->fetch(PDO::FETCH_ASSOC);
  echo intval($result["compra"]);

}




?>
