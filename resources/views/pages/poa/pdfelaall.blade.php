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
    <td rowspan="3" style="padding: 3px;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;"><img src="{{ public_path('images/logoople.png') }}" alt="OPLE" width="100px"></td>
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


<table style="width:100%;{{$key == (count($actividades)-1) ? '' : 'page-break-after: always;' }}">

    

    @php
    $padre = explode('!*!', $actividad->act); 
    $sumTotal=0;
    $ene=0;
    $feb=0;
    $mar=0;
    $abr=0;
    $may=0;
    $jun=0;
    $jul=0;
    $ago=0;
    $sep=0;
    $oct=0;
    $nov=0;
    $dic=0;
    @endphp

    @foreach($padre as $kpp => $padres)

        @php
         $hijo = explode('||', $padres);
         $sumTotal += intval($hijo[3]);
         $ene += intval($hijo[4]);
         $feb += intval($hijo[5]);
         $mar += intval($hijo[6]);
         $abr += intval($hijo[7]);
         $may += intval($hijo[8]);
         $jun += intval($hijo[9]);
         $jul += intval($hijo[10]);
         $ago += intval($hijo[11]);
         $sep += intval($hijo[12]);
         $oct += intval($hijo[13]);
         $nov += intval($hijo[14]);
         $dic += intval($hijo[15]);
        @endphp
   
      
        @if($kpp == 11 || $kpp == 26)     
        </table>  


        <table style="width:100%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
  <tr style="background: #ccc;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <th style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="5">PROGRAMA OPERATIVO ANUAL 2020</th>
  </tr>
  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td rowspan="3" style="padding: 3px;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;"><img src="{{ public_path('images/logoople.png') }}" alt="OPLE" width="100px"></td>
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


        <table style="width:100%;{{$key == (count($actividades)-1) ? '' : 'page-break-after: always;' }}">  
             <tr>
                <td style="text-align: center;width:2.3%;">{{$hijo[0]}}</td>
                <td style="width:35.7%;">{{$hijo[1]}}</td><td style="text-align: center;width: 10.1%;">{{$hijo[2]}}</td>
                <td style="text-align: center;width: 4%;">Programado</td>
                <td style="text-align: center;width: 2.71%;">{{intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12])+intval($hijo[13])+intval($hijo[14])+intval($hijo[15])}}</td>
                <td style="text-align: center;width: 3.2%;">{{$hijo[4]}}</td>
                <td style="text-align: center;width: 3%;">{{$hijo[5]}}</td>
                <td style="text-align: center;width: 2.97%;">{{$hijo[6]}}</td>
                <td style="text-align: center;width: 2.72%;">{{$hijo[7]}}</td>
                <td style="text-align: center;width: 3.298%;">{{$hijo[8]}}</td>
                <td style="text-align: center;width: 2.71%;">{{$hijo[9]}}</td>
                <td style="text-align: center;width: 2.49%;">{{$hijo[10]}}</td>
                <td style="text-align: center;width: 3.099%;">{{$hijo[11]}}</td>
                <td style="text-align: center;width: 3.22%;">{{$hijo[12]}}</td>
                <td style="text-align: center;width: 2.87%;">{{$hijo[13]}}</td>
                <td style="text-align: center;width: 3.199%;">{{$hijo[14]}}</td>
                <td style="text-align: center;width: 2.77%;">{{$hijo[15]}}</td>
                <td style="text-align: center;width: 3.19%;">{{$hijo[16]}}</td>
                <td style="text-align: center;">{{$hijo[17]}}</td>
            </tr>   
        @else
            <tr>
                <td style="text-align: center;width:2.3%;">{{$hijo[0]}}</td>
                <td style="width:35.7%;">{{$hijo[1]}}</td><td style="text-align: center;width: 10.1%;">{{$hijo[2]}}</td>
                <td style="text-align: center;width: 4%;">Programado</td>
                <td style="text-align: center;width: 2.71%;">{{intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12])+intval($hijo[13])+intval($hijo[14])+intval($hijo[15])}}</td>
                <td style="text-align: center;width: 3.2%;">{{$hijo[4]}}</td>
                <td style="text-align: center;width: 3%;">{{$hijo[5]}}</td>
                <td style="text-align: center;width: 2.97%;">{{$hijo[6]}}</td>
                <td style="text-align: center;width: 2.72%;">{{$hijo[7]}}</td>
                <td style="text-align: center;width: 3.298%;">{{$hijo[8]}}</td>
                <td style="text-align: center;width: 2.71%;">{{$hijo[9]}}</td>
                <td style="text-align: center;width: 2.49%;">{{$hijo[10]}}</td>
                <td style="text-align: center;width: 3.099%;">{{$hijo[11]}}</td>
                <td style="text-align: center;width: 3.22%;">{{$hijo[12]}}</td>
                <td style="text-align: center;width: 2.87%;">{{$hijo[13]}}</td>
                <td style="text-align: center;width: 3.199%;">{{$hijo[14]}}</td>
                <td style="text-align: center;width: 2.77%;">{{$hijo[15]}}</td>
                <td style="text-align: center;width: 3.19%;">{{$hijo[16]}}</td>
                <td style="text-align: center;">{{$hijo[17]}}</td>
            </tr>         
        @endif



 @endforeach

 @php
    $sumTotal = intval($ene)+intval($feb)+intval($mar)+intval($abr)+intval($may)+intval($jun)+intval($jul)+intval($ago)+intval($sep)+intval($oct)+intval($nov)+intval($dic);
@endphp

 <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Total programado mensual</td>
    <td style="text-align: center;font-size:9px;">{{$sumTotal}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene}}</td>
    <td style="text-align: center;font-size:9px;">{{$feb}}</td>
    <td style="text-align: center;font-size:9px;">{{$mar}}</td>
    <td style="text-align: center;font-size:9px;">{{$abr}}</td>
    <td style="text-align: center;font-size:9px;">{{$may}}</td>
    <td style="text-align: center;font-size:9px;">{{$jun}}</td>
    <td style="text-align: center;font-size:9px;">{{$jul}}</td>
    <td style="text-align: center;font-size:9px;">{{$ago}}</td>
    <td style="text-align: center;font-size:9px;">{{$sep}}</td>
    <td style="text-align: center;font-size:9px;">{{$oct}}</td>
    <td style="text-align: center;font-size:9px;">{{$nov}}</td>
    <td style="text-align: center;font-size:9px;">{{$dic}}</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Total programado acumulado mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;">{{$ene}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun+$jul}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun+$jul+$ago}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep+$oct}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep+$oct+$nov}}</td>
    <td style="text-align: center;font-size:9px;">{{$ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep+$oct+$nov+$dic}}</td>
    <td style="text-align: center;"></td>
    <td style="text-align: center;"></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Porcentaje mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;">{{number_format(($ene/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($feb/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($mar/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($abr/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($may/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($jun/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($jul/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($ago/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($sep/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($oct/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($nov/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format(($dic/$sumTotal)*100, 2, '.', ',')}}</td>
    <td></td>
    <td></td>
  </tr>
  <tr style="font-weight:bolder;">
    <td colspan="4" style="text-align: right;background: #ccc;">Porcentaje acumulado mensual</td>
    <td></td>
    <td style="text-align: center;font-size:9px;">{{number_format(($ene/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun+$jul)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun+$jul+$ago)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep+$oct)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep+$oct+$nov)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td style="text-align: center;font-size:9px;">{{number_format((($ene+$feb+$mar+$abr+$may+$jun+$jul+$ago+$sep+$oct+$nov+$dic)/$sumTotal)*100, 2, '.', ',')}}</td>
    <td></td>
    <td></td>
  </tr>
</table>
  @endforeach


  
 


<script type="text/javascript">
    console.log('hola');
</script>


</body>
</html>






