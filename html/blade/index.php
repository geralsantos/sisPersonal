<?php

if( isset($_GET["success"]) ){

echo "activado";
//include("html/foro/admin.php");
}else if( isset($_GET["error"]) ){

echo "Error al intentar activarte" ;

}
echo "esto es el principal :V <br><br>";

  $db = new Conexion_laravel_mysql();

  $fecha_buscada = isset($_POST["fecha"]);
  if ($fecha_buscada) {
    echo $fecha_buscada;
    return $fecha_buscada;
  }else {
    echo false;
  }
  /*
   $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%Y") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST(:fecha_buscada AS DATE) AND CAST(SYSDATE() as DATE) GROUP BY d.idingreso');
   $sql->bindParam(":fecha_buscada",$fecha_buscada);
   $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $key) {
     print_r("{ name:'".$key["anio"]."', y:".$key['compra'].", drilldown:'meses'},");   }*/
/*
    $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", DATE_FORMAT(i.fecha_hora, "%M") as "anio" FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora BETWEEN CAST("2012-02-02" AS DATE) AND CAST(SYSDATE() as DATE) GROUP BY d.idingreso');
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    $meses = array ('January','February','March','April','May','June','July','August','September','October','November','December');
    $meses_es = array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
      $es= "";
    foreach ($result as $key) {
       for ($i=0; $i < count($meses) ; $i++) {
         if ($key["anio"] == $meses[$i]) {
        $es = $meses_es[$i];
         }
       }

      print_r("{ name:'".$es."', y:".$key['compra'].", drilldown:'meses'},");

    }*/

  ?>
<input type="text" id="fecha" name="fecha" />
 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

  <script type="text/javascript">
  $(function () {
    Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Ingresos / Ventas'
        },
        subtitle: {
            text: 'Source: sisPersonal.com'
        },
        xAxis: {
            allowDecimals: false,
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
            title: {
                text: 'Ingresos/Ventas (%)'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },
        plotOptions: {
            area: {
              <?php $db = new Conexion_laravel_mysql();?>

                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{

            name: 'Ingresos',
            data: [<?php

              $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "Ingreso" FROM ingreso i,detalle_ingreso d WHERE i.idingreso = d.idingreso GROUP BY (d.idingreso)');

              //$sql = $db->__construct()->prepare("SELECT SUM(d.precio_compra) FROM ingreso i,detalle_ingreso d "+
                    //                              "WHERE i.idingreso = d.idingreso GROUP BY (d.idingreso)"  );
              $sql->execute();
              $result = $sql->fetchAll(PDO::FETCH_ASSOC);
              foreach ($result as $key) {
                ?>
                <?php $encode = (json_encode($key["Ingreso"])); ?>

                <?php print_r(json_decode($encode)); ?>,
                <?php  } ?>


           ]
        }, {
            name: 'Ventas',
            data: [<?php

              $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "Ingreso" FROM ingreso i,detalle_ingreso d WHERE i.idingreso = d.idingreso GROUP BY (d.idingreso)');

              //$sql = $db->__construct()->prepare("SELECT SUM(d.precio_compra) FROM ingreso i,detalle_ingreso d "+
                    //                              "WHERE i.idingreso = d.idingreso GROUP BY (d.idingreso)"  );
              $sql->execute();
              $result = $sql->fetchAll(PDO::FETCH_ASSOC);
              foreach ($result as $key) {
                ?>
                <?php $encode = (json_encode($key["Ingreso"])); ?>

                <?php print_r(json_decode($encode)); ?>,
                <?php  } ?>
               ]
        }]
    });
});

 </script>



 <script type="text/javascript">
 var f = function (ingreso_total,anios,meses) {
  // console.log(meses);
     // Create the chart
     Highcharts.chart('container1', {
         chart: {
             type: 'column'
         },
         title: {
             text: 'Desde el año 2014 hasta el año actual(2016)'
         },
         subtitle: {
             text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
         },
         xAxis: {
             type: 'category'
         },
         yAxis: {
             title: {
                 text: 'Total percent market share'
             }

         },
         legend: {
             enabled: false
         },
         plotOptions: {
             series: {
                 borderWidth: 0,
                 dataLabels: {
                     enabled: true,
                     format: 'S/.{point.y:.1f}'
                 }
             }
         },

         tooltip: {
             headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
             pointFormat: '<span style="color:{point.color}">{point.name}</span>: S/.<b>{point.y:.2f}</b> of total<br/>'
         },

         series: [{
             name: 'Brands',
             colorByPoint: true,
             data: [{
                 name: 'Ingresos',
                 y: ingreso_total,
                 drilldown: 'anios'
             }, {
                 name: 'Ventas',
                 y: 24.03,
                 drilldown: 'ventas'
             } ]
         }],
         drilldown: {
            series: [
            {
              //Filtro en año seleccionado en el datepicker
              id: 'anios',
              name: 'Año',
              data: anios
          },

            //Filtro en Meses del año seleccionado
            meses
            /*id: 'meses',
            name: 'Meses',
            data: meses*/
            /*  name: '2014',
              id: '2014',
              data: [1]*/
          ,
          {
            //Filtro en Meses del año seleccionado
            id: '2015',
            name: 'Meses',
            data: [{ name: 'Enero', y: 1, drilldown: 'Enero' },
            {name:'Febrero',y:2,drilldown:'Febrero'},
            {name:'Marzo',y:3,drilldown:'Marzo'},
            ]

          }
         ]

        }
     });
 };
 $(document).ready(function(){
   var ajax_load_highchart = (function (){

     $.ajax({
       url: 'index.php?view=highchart_bar&fecha=2012-02-02',
       type:'POST',
       beforeSend:function(){

       },
       success:function(response){
           console.log(response);
         var json_parse = JSON.parse(response);
           console.log(json_parse.ingreso_total);
           console.log(json_parse.anios);
            console.log(json_parse.id);
         var stack = $.Callbacks();
           stack.add(f);
           stack.fire(parseInt(json_parse.ingreso_total), json_parse.anios,json_parse.id );

       }

     });
   })();
               $('#fecha').datepicker({
                 language:'es',
                 showWeek: true,
                 firstDay: 1


               }).on('changeDate',function(ev){

                 var d =new Date(Date.parse(ev.date));
                 dateString =(d.getFullYear())+"-"+(d.getMonth()+1)+"-"+ d.getDate();

                $.ajax({
                  url: 'index.php?view=highchart_bar&fecha='+dateString,
                  type:'POST',
                  beforeSend:function(){

                  },
                  success:function(response){
                   //console.log(response);
                   var stack = $.Callbacks();
                    stack.add(f);
                    stack.fire(parseInt(response));
                  }

                });


               });
           });


 </script>
