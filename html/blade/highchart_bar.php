<?php

$db = new Conexion_laravel_mysql();

$fecha_buscada =isset($_POST["fecha"]);

if ($fecha_buscada) {
  echo $fecha_buscada;
}else {
  echo $fecha_buscada;
}
$sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST("2012-02-02" AS DATE) AND CAST(SYSDATE() as DATE)');
//$sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST("2012-02-02" AS DATE) AND CAST(SYSDATE() as DATE)');
// $sql->bindParam(":fecha_buscada",$fecha_buscada);
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $key) {
   $encode = (json_encode($key["compra"]));
   print_r(json_decode($encode));

 }
 ?>
