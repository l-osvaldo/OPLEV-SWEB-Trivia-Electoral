<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2020</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
</head>
<body>

<style>
     table {
      border-collapse: collapse;width: 100%
    }

    th, td {
      font-size: 13px;padding: 10px 0 10px 5px;
    }    
    .gris{background: #ccc;font-weight: bold;}
</style>



  @foreach ($actividades as $key => $actividad)  


  <table border="0" align="center" width="100%">
    <tr style="border:none !important;background:#fff; height:75px;">
      <th colspan="6">
      ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2020 
      </th>
    </tr>
  </table>


  <table border="1" style="border-collapse: collapse;">
    <tr style="border: 1px solid black;">
      <td rowspan="3" style="border: 1px solid black;text-align: center;font-size: 13px;padding: 10px 0 10px 5px;" width="8%"><img class="logo" src="{{ public_path('images/logoople.png') }}" width="100"></td>
      <td style="border: 1px solid black;text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;" width="8%">Programa</td>      
      <td style="border: 1px solid black;font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$actividad->descprograma}}</td>
      <td style="border: 1px solid black;text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;"  width="10%">Unidad Responsable<br><span>{{$actividad->name}}</span></td>
    </tr>
    <tr style="border: 1px solid black;">
      <td width="8%" style="border: 1px solid black;text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Programa Específico</td>
      <td style="border: 1px solid black;font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$actividad->descprogramaesp}}</td>
      <td width="10%" style="border: 1px solid black;text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Periodo Trimestral<br><span>{{$trimestre}}</span></td>
    </tr>
    <tr style="border: 1px solid black;">
      <td width="8%" style="border: 1px solid black;text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Objetivo</td>
      <td colspan="2" width="60%" style="border: 1px solid black;font-size: 13px;padding: 10px 0 10px 5px;">{{$actividad->objprogramaesp}}</td>
    </tr>
  </table>



  <table class="table" border="1" align="center" cellpadding="5px" style="margin-top: -1px;">

  <tr class="gris" style="text-align: center;">
    <td style="border: 1px solid black;" rowspan="3">No.</td>
    <td style="border: 1px solid black;" rowspan="3" width="28%">ACTIVIDAD</td>
    <td style="border: 1px solid black;" colspan="2">META ANUAL</td>
    <td style="border: 1px solid black;" rowspan="3">PERIODO <br>CALENDARIZADO</td>
    <td style="border: 1px solid black;" colspan="3">AVANCE TRIMESTRAL</td>
    <td style="border: 1px solid black;" colspan="4">AVANCE ACUMULADO</td>
    <td style="border: 1px solid black;" rowspan="3" width="10%">OBSERVACIONES</td>
  </tr>
  <tr class="gris">
    <td rowspan="2" style="border: 1px solid black;text-align: center;">UNIDAD DE<br>MEDIDA</td>
    <td style="border: 1px solid black;" rowspan="2">CANTIDAD</td>
    <td style="border: 1px solid black;" rowspan="2">PROGRAMADO</td>
    <td style="border: 1px solid black;" rowspan="2">REALIZADO</td>
    <td style="border: 1px solid black;" rowspan="2">VARIACION %</td>
    <td style="border: 1px solid black;" rowspan="2">PROGRAMADO</td>
    <td style="border: 1px solid black;" rowspan="2">REALIZADO</td>
    <td colspan="2" style="border: 1px solid black;text-align: center;">VARIACION</td>
  </tr>
  <tr class="gris">
    <td width="5%" style="text-align: center;border: 1px solid black;">CANTIDAD</td>
    <td width="5%" style="text-align: center;border: 1px solid black;">%</td>
  </tr>

  </table>



<table class="table" border="1" style="border-collapse: collapse;width:100%;{{$key == (count($actividades)-1) ? '' : 'page-break-after: always;' }}">

    

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


         $programado = intval($hijo[4])+intval($hijo[5])+intval($hijo[6]);
         $realizado = intval($hijo[18])+intval($hijo[19])+intval($hijo[20]);
         $resta = $realizado - $programado;

         $resta != 0 && $programado != 0 ? $variacion = ($resta * 100) / $programado : $variacion = 0;

        @endphp
   
      



        @if($kpp == 11 || $kpp == 26)     
        </table>  



        <table style="width:100%;{{$key == (count($actividades)-1) ? '' : 'page-break-after: always;' }}">  
             <tr>
                <td style="text-align: center;width:1%;">{{$hijo[0]}}</td>
                <td style="width:11%;">{{$hijo[1]}}</td>
                <td style="text-align: center;width: 3%;">{{$hijo[2]}}</td>
                <td style="text-align: center;width: 2.71%;">{{intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12])+intval($hijo[13])+intval($hijo[14])+intval($hijo[15])}}</td>
                <td style="text-align: center;width: 3%;">{{$hijo[16]}} - {{$hijo[17]}}</td>

                <td style="text-align: center;width: 2.71%;">{{$programado}}</td>

                <td style="text-align: center;width: 3.2%;">{{$realizado}}</td>
                <td style="text-align: center;width: 3%;">
                {{number_format($variacion, 2, '.', ',')}}
                </td>


                <td style="text-align: center;width: 2.71%;">{{intval($hijo[4])+intval($hijo[5])+intval($hijo[6])}}</td>

                <td style="text-align: center;width: 3.2%;">{{intval($hijo[18])+intval($hijo[19])+intval($hijo[20])+intval($hijo[21])+intval($hijo[22])+intval($hijo[23])+intval($hijo[24])+intval($hijo[25])+intval($hijo[26])+intval($hijo[27])+intval($hijo[28])+intval($hijo[29])}}</td>
                <td style="text-align: center;width: 3%;">{{$resta}}</td>

                <td style="text-align: center;width: 3.199%;">---</td>
                

            </tr>   
        @else
            <tr>
                <td style="text-align: center;width:1%;">{{$hijo[0]}}</td>
                <td style="width:11%;">{{$hijo[1]}}</td>
                <td style="text-align: center;width: 3%;">{{$hijo[2]}}</td>
                <td style="text-align: center;width: 2.71%;">{{intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12])+intval($hijo[13])+intval($hijo[14])+intval($hijo[15])}}</td>
                <td style="text-align: center;width: 3%;">{{$hijo[16]}} - {{$hijo[17]}}</td>

                <td style="text-align: center;width: 2.71%;">{{$programado}}</td>

                <td style="text-align: center;width: 3.2%;">{{$realizado}}</td>
                 <td style="text-align: center;width: 3%;">
                {{number_format($variacion, 2, '.', ',')}}
                </td>

                <td style="text-align: center;width: 2.71%;">{{intval($hijo[4])+intval($hijo[5])+intval($hijo[6])}}</td>

                <td style="text-align: center;width: 3.2%;">{{intval($hijo[18])+intval($hijo[19])+intval($hijo[20])}}</td>
                <td style="text-align: center;width: 3%;">{{$resta}}</td>

                <td style="text-align: center;width: 2.77%;">---</td>

            </tr>         
        @endif



 @endforeach

 


 <tr>
            <td colspan="13" class="gris">
              LAS FIRMAS AL CALCE AMPARAN LA TOTALIDAD DEL PRESENTE DOCUMENTO
            </td>
          </tr>

          <tr style="height: 150px;">
            <td colspan="6">
              ELABORÓ<br>MTRA. PATRICIA PÉREZ HERNÁNDEZ<br>TITULAR DE LA UNIDAD TÉCNICA DE PLANEACIÓN
            </td>
            <td colspan="7">
              Vo. Bo.<br>MTRO. HUGO ENRIQUE CASTRO BERNABE<br>SECRETARIO EJECUTIVO
            </td>
          </tr>


 </table>
  @endforeach


</body>
</html>






