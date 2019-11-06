<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2020</title>
  
</head>
<body>
<style type="text/css">
table, th, td {
  border: 1px solid black;font-size: small;border-collapse: collapse;
}
</style>


<table style="width:100%;">
  <!--tr style="background: #ccc;text-align: center;">
    <td rowspan="2" style="width: 2%;" >No.</td>
    <td rowspan="2" style="width: 30%;">Actividad</td>
    <td colspan="3" style="width: 16%;">Meta</td>
    <td colspan="12" style="width: 30%;">Programación mensual</td>
    <td colspan="12" style="width: 4%;">Fecha</td>
  </tr>
  <tr style="background: #eeeeee;text-align: center;">
    <td>Unidad de medida</td>
    <td colspan="2">Cantidad anual</td>
    <td>Ene</td>
    <td>Feb</td>
    <td>Mar</td>
    <td>Abr</td>
    <td>May</td>
    <td>Jun</td>
    <td>Jul</td>
    <td>Ago</td>
    <td>Sep</td>
    <td>Oct</td>
    <td>Nov</td>
    <td>Dic</td>
    <td>Inicio</td>
    <td>Termino</td>
  </tr>
  <tr>
    <td style="text-align: center;width:2.3%;">1</td>
    <td style="width:35.7%;">Elaborar un estudio retrospectivo sobre el financiamiento público ministrado a los partidos políticos en el periodo comprendido de 2013 a 2018; y coordinar un evento para su presentación.Elaborar un estudio retrospectivo sobre el financiamiento público ministrado a los partidos políticos en el periodo comprendido de 2013 a 2018; y coordinar un evento para su presentación.</td>
    <td style="text-align: center;width: 10.1%;">Documento</td>
    <td style="text-align: center;width: 4%;">Programado</td>
    <td style="text-align: center;width: 2.71%;">12</td>
    <td style="text-align: center;width: 3.2%;">1</td>
    <td style="text-align: center;width: 3%;">1</td>
    <td style="text-align: center;width: 2.97%;">1</td>
    <td style="text-align: center;width: 2.72%;">1</td>
    <td style="text-align: center;width: 3.298%;">1</td>
    <td style="text-align: center;width: 2.71%;">1</td>
    <td style="text-align: center;width: 2.49%;">1</td>
    <td style="text-align: center;width: 3.099%;">1</td>
    <td style="text-align: center;width: 3.22%;">1</td>
    <td style="text-align: center;width: 2.87%;">1</td>
    <td style="text-align: center;width: 3.199%;">1</td>
    <td style="text-align: center;width: 2.77%;">1</td>
    <td style="text-align: center;width: 3.19%;">Ene</td>
    <td style="text-align: center;">Dic</td>
  </tr-->

  @foreach ($actividades as $actividad)      
      <tr>
        <td style="text-align: center;width:2.3%;">{{$actividad->numactividad}}</td>
        <td style="width:35.7%;">{{$actividad->descactividad}}</td>
        <td style="text-align: center;width: 10.1%;">{{$actividad->unidadmedida}}</td>
        <td style="text-align: center;width: 4%;">Programado</td>
        <td style="text-align: center;width: 2.71%;">{{$actividad->enep+$actividad->febp+$actividad->marp+$actividad->abrp+$actividad->mayp+$actividad->junp+$actividad->julp+$actividad->agop+$actividad->sepp+$actividad->octp+$actividad->novp+$actividad->dicp}}</td>
        <td style="text-align: center;width: 3.2%;">{{$actividad->enep}}</td>
        <td style="text-align: center;width: 3%;">{{$actividad->febp}}</td>
        <td style="text-align: center;width: 2.97%;">{{$actividad->marp}}</td>
        <td style="text-align: center;width: 2.72%;">{{$actividad->abrp}}</td>
        <td style="text-align: center;width: 3.298%;">{{$actividad->mayp}}</td>
        <td style="text-align: center;width: 2.71%;">{{$actividad->junp}}</td>
        <td style="text-align: center;width: 2.49%;">{{$actividad->julp}}</td>
        <td style="text-align: center;width: 3.099%;">{{$actividad->agop}}</td>
        <td style="text-align: center;width: 3.22%;">{{$actividad->sepp}}</td>
        <td style="text-align: center;width: 2.87%;">{{$actividad->octp}}</td>
        <td style="text-align: center;width: 3.199%;">{{$actividad->novp}}</td>
        <td style="text-align: center;width: 2.77%;">{{$actividad->dicp}}</td>
        <td style="text-align: center;width: 3.19%;">{{$actividad->inicio}}</td>
        <td style="text-align: center;">{{$actividad->termino}}</td>
      </tr>
  @endforeach


  
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Total programado mensual</td>
    <td style="text-align: center;font-size:9px;">{{$result}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M0}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M1}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M2}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M3}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M4}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M5}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M6}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M7}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M8}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M9}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M10}}</td>
    <td style="text-align: center;font-size:9px;">{{$r1M11}}</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Total programado acumulado mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;">{{$r2M0}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M1}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M2}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M3}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M4}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M5}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M6}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M7}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M8}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M9}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M10}}</td>
    <td style="text-align: center;font-size:9px;">{{$r2M11}}</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Porcentaje mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;">{{$r3M0}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M1}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M2}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M3}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M4}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M5}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M6}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M7}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M8}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M9}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M10}}</td>
    <td style="text-align: center;font-size:9px;">{{$r3M11}}</td>
    <td></td>
    <td></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Porcentaje acumulado mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;">{{$r4M0}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M1}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M2}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M3}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M4}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M5}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M6}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M7}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M8}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M9}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M10}}</td>
    <td style="text-align: center;font-size:9px;">{{$r4M11}}</td>
    <td></td>
    <td></td>
  </tr>
</table>





</body>
</html>






