<?php

if( isset($_GET["success"]) ){

echo "activado";
//include("html/foro/admin.php");
}else if( isset($_GET["error"]) ){

echo "Error al intentar activarte" ;

}
echo "esto es el principal :V" ;

  $db = new Conexion_laravel_mysql();

    $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", d.idingreso FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora >= CAST("2014-02-01" AS DATE) ');

    //$sql = $db->__construct()->prepare("SELECT SUM(d.precio_compra) FROM ingreso i,detalle_ingreso d "+
          //                              "WHERE i.idingreso = d.idingreso GROUP BY (d.idingreso)"  );
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);
    foreach ($result as $key) {
     $encode = (json_encode($key));

     print_r(json_decode($encode));
        }

  ?>

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
 //column-drilldown
 $(function () {
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
                 y: <?php

                   $sql =$db->__construct()->prepare('SELECT SUM(d.precio_compra) as "compra", d.idingreso FROM ingreso i,detalle_ingreso d WHERE d.idingreso = i.idingreso AND i.fecha_hora >= CAST("2014-02-01" AS DATE)');

                   //$sql = $db->__construct()->prepare("SELECT SUM(d.precio_compra) FROM ingreso i,detalle_ingreso d "+
                         //                              "WHERE i.idingreso = d.idingreso GROUP BY (d.idingreso)"  );
                   $sql->execute();
                   $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                   foreach ($result as $key) {
                     ?>
                     <?php $encode = (json_encode($key["compra"])); ?>

                     <?php print_r(json_decode($encode)); ?>
                     <?php  } ?>,
                 drilldown: 'Anios'
             }, {
                 name: 'Ventas',
                 y: 24.03,
                 drilldown: 'Chrome'
             } ]
         }],
         drilldown: {
            series: [
              {
                id: 'Anios',
                name: 'Año',
                data: [{
                    name: 'Cats',
                    y: 4,
                    drilldown: 'cats'
                },
                {
                  name:'Dogs',
                  y :3,
                  drilldown:'Dogs'
                }
                ]
            }, {
                name: 'Cats',
                id: 'cats',
                data: [1]
            },
            {
              id: 'Chrome',
              name: 'Animals2',
              data: [{
                  name: 'Cats2',
                  y: 4,
                  drilldown: 'cats2'
              }, ['Dogs', 2],

                  ['Pigs', 1]
              ]
          },
          {
              name: 'Cats2',
              id: 'cats2',
              data: [1]
          }


          ]

        }
     });
 });
 </script>
