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

  ?>

  <input type="text" id="fecha" name="fecha" data-date-end-date="0d" />

   <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>




   <script type="text/javascript">
   var f = {
       // Create the chart
     //Highcharts.chart('container1', {
           chart: {
               renderTo: 'container1',
               type: 'column'
           },
           title: {
               text: ''
           },
           subtitle: {
               text: 'Reporte de Ingresos y Ventas según fecha estimada.'
           },
           xAxis: {
               type: 'category'
           },
           yAxis: {
               title: {
                   text: 'Cantidad Total'
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
               pointFormat: '<span style="color:{point.color}">{point.name}</span>: S/.<b>{point.y:.2f}</b> Total<br/>'
           },

           series: [{
               name: 'Principal',
               colorByPoint: true,
               data: [{
                   name: 'Ingresos',
                   y: 0,
                   drilldown: 'Ingresos'
               },{
                   name: 'Ventas',
                   y: 200,
                   drilldown: 'Ventas'
               }]
           }
         ],
           drilldown: {
             series: [/*{
               id: 'Ingresos',
               name: 'Años',
               data: [{name:"2013",y:73,drilldown:"2013"},{name:"2016",y:10,drilldown:"2016"}]
             },{id:"2013",name:"2013",data:[{name:"September",y:62,drilldown:"September"},{name:"November",y:11,drilldown:"November_2013"}]},
                  {id:"2016",name:"2016",data:[{name:"November",y:10,drilldown:"November"}]},
                  {id:"November_2013",name:"November",data:[{name:"Lunes",y:100}]}
               */]
          }
    //   });
  };

   $(document).ready(function(){


     var ajax_load_highchart = (function (date){

       $.ajax({
         url: 'index.php?view=highchart_bar&fecha='+(date?date:"2000-1-1"),
         type:'POST',
         beforeSend:function(){

         },
         success:function(response){
             console.log(response);
             chart = new Highcharts.Chart(f);
           var parse = JSON.parse(response);
           var ingreso_total = parse.ingreso_total;
           var ingreso_anios =parse.ingresos_anios;
           var ingresos_meses_por_anio = parse.ingresos_meses_por_anio;
           var ingresos_dias_por_meses = parse.ingresos_dias_por_mes;
             f.series[0].data[0].y = ingreso_total;
             f.title.text = "Desde el "+(date?date:"2000")+" hasta el año actual(2016)";
             f.drilldown.series.push({
                     id: 'Ingresos',
                     name: 'Año',
                     data: ingreso_anios

              })
              f.drilldown.series.push({
                  id: 'Ventas',
                  name: 'Año',
                  data: []

               })

               chart = new Highcharts.Chart(f);
               for (var i = 0; i < ingresos_meses_por_anio.length; i++) {
                  f.drilldown.series.push(ingresos_meses_por_anio[i]);
               }
               for (var i = 0; i < ingresos_dias_por_meses.length; i++) {
                  f.drilldown.series.push(ingresos_dias_por_meses[i]);
               }

         }

       });
     });
      ajax_load_highchart("");
                 $('#fecha').datepicker({

                 }).on('changeDate',function(ev){

                   var d =new Date(Date.parse(ev.date));
                   dateString =(d.getFullYear())+"-"+(d.getMonth()+1)+"-"+ d.getDate();
                   console.log(dateString);
                   ajax_load_highchart(dateString);

                /*  $.ajax({
                    url: 'index.php?view=highchart_bar&fecha='+dateString,
                    type:'POST',
                    beforeSend:function(){

                    },
                    success:function(response){
                     //console.log(response);
                    ajax_load_highchart(dateString);
                    }

                  });
*/

                });
             });


   </script>
