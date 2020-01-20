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







  @foreach ($actividades as $key => $actividad)  



  <table style="width:100%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
  <tr style="background: #ccc;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <th style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="5">PROGRAMA OPERATIVO ANUAL 2020</th>
  </tr>
  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td rowspan="3" style="padding: 3px;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;"><img src="" alt="OPLE" width="100px"></td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;width:29%;" colspan="2">Programa General:</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">Ejercicio 2020</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">Unidad Responsable:<br><strong>{{$actividad->name}}</strong></td>
  </tr>
  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Clave: <strong>{{$actividad->claveprogramaesp}}</strong></td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;"><strong>{{$actividad->descprograma}}</strong></td>
  </tr>

  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="2"><strong>{{$actividad->descprogramaesp}}</strong></td>
    <td style="text-align: left;border: 1px solid black;font-size: small;border-collapse: collapse;padding:0 0 0 5px;" colspan="4">Objetivo: <strong>{{$actividad->objprogramaesp}}</strong></td>
  </tr>
  <tr style="border:1px solid #fff;border-bottom:1px solid #000;height:10px;">
    <td style="border:1px solid #fff;border-bottom:1px solid #000;" colspan="5"></td>
  </tr>
</table>

<table style="width:100%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
  <tr style="background: #ccc;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse">

    <td style="width:2%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">No.</td>
    <td style="width:30%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">Actividad</td>

    <td style="width:16%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="3">Meta</td>

    <td style="width:30%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="12">Programación mensual</td>

    <td style="width:4%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="12">Fecha</td>
    
  </tr>
  <tr style="background: #eeeeee;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse">
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; with:6%;">Unidad de<br> medida</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; with:10%;" colspan="2">Cantidad<br> anual</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Ene</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Feb</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Mar</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Abr</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">May</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Jun</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Jul</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Ago</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Sep</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Oct</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Nov</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Dic</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; width:2%" >Inicio</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; width:2%" >Termino</td>
  </tr>
</table>


<table style="width:100%;page-break-after: always;">

    @foreach(explode('/°°/', $actividad->act) as $key1 => $info) 
        {{ $info }}<br>
    @endforeach

      <tr>
        <td style="text-align: center;width:2.3%;"></td>
        <td style="width:35.7%;"></td>
        <td style="text-align: center;width: 10.1%;"></td>
        <td style="text-align: center;width: 4%;"></td>
        <td style="text-align: center;width: 2.71%;"></td>
        <td style="text-align: center;width: 3.2%;"></td>
        <td style="text-align: center;width: 3%;"></td>
        <td style="text-align: center;width: 2.97%;"></td>
        <td style="text-align: center;width: 2.72%;"></td>
        <td style="text-align: center;width: 3.298%;"></td>
        <td style="text-align: center;width: 2.71%;"></td>
        <td style="text-align: center;width: 2.49%;"></td>
        <td style="text-align: center;width: 3.099%;"></td>
        <td style="text-align: center;width: 3.22%;"></td>
        <td style="text-align: center;width: 2.87%;"></td>
        <td style="text-align: center;width: 3.199%;"></td>
        <td style="text-align: center;width: 2.77%;"></td>
        <td style="text-align: center;width: 3.19%;"></td>
        <td style="text-align: center;"></td>
      </tr>

 <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Total programado mensual</td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Total programado acumulado mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Porcentaje mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td></td>
    <td></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Porcentaje acumulado mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td style="text-align: center;font-size:9px;"></td>
    <td></td>
    <td></td>
  </tr>
</table>
  @endforeach


  
 





</body>
</html>






