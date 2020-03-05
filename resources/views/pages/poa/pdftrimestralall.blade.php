<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2020</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
</head>
<body>

<style>

    th, td {
      font-size: 13px;padding: 10px 0 10px 5px;
    }    
    .gris{background: #ccc;font-weight: bold;}

    table {
      border-collapse: collapse;
    }

    .btable th, .btable td {
      border: 1px solid black;
    }
</style>



  @foreach ($actividades as $key => $actividad)  


  <table border="0" align="center" width="100%">
    <tr style="background:#fff; height:75px;">
      <th colspan="4" style="font-size: 16px;">
      ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2020 
      </th>
    </tr>
  </table>


  <table border="1" class="btable">
    <tr style="">
      <td rowspan="3" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px;" width="8%"><img class="logo" src="{{ public_path('images/logoople.png') }}" width="100"></td>
      <td style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;" width="8%">Programa</td>      
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$actividad->descprograma}}</td>
      <td style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;"  width="10%">Unidad Responsable<br><span>{{$actividad->name}}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Programa Específico</td>
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$actividad->descprogramaesp}}</td>
      <td width="10%" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Periodo Trimestral<br><span>{{$trimestre}}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Objetivo</td>
      <td colspan="2" width="60%" style="font-size: 13px;padding: 10px 0 10px 5px;">{{$actividad->objprogramaesp}}</td>
    </tr>
  </table>



  <table class="table btable" border="1" align="center" cellpadding="5px" style="margin-top: -1px; width:100%;{{$key == (count($actividades)-1) ? '' : 'page-break-after: always;' }}">

  <tr class="gris" style="text-align: center;">
    <td style="" rowspan="3">No.</td>
    <td style="" rowspan="3" width="28%">ACTIVIDAD</td>
    <td style="" colspan="2">META ANUAL</td>
    <td style="" rowspan="3">PERIODO <br>CALENDARIZADO</td>
    <td style="" colspan="3">AVANCE TRIMESTRAL</td>
    <td style="" colspan="4">AVANCE ACUMULADO</td>
    <td style="" rowspan="3" width="10%">OBSERVACIONES</td>
  </tr>
  <tr class="gris">
    <td rowspan="2" style="text-align: center;">UNIDAD DE<br>MEDIDA</td>
    <td style="" rowspan="2">CANTIDAD</td>
    <td style="" rowspan="2">PROGRAMADO</td>
    <td style="" rowspan="2">REALIZADO</td>
    <td style="" rowspan="2">VARIACION %</td>
    <td style="" rowspan="2">PROGRAMADO</td>
    <td style="" rowspan="2">REALIZADO</td>
    <td colspan="2" style="text-align: center;">VARIACION</td>
  </tr>
  <tr class="gris">
    <td width="5%" style="text-align: center;">CANTIDAD</td>
    <td width="5%" style="text-align: center;">%</td>
  </tr>

    @php
    $padre = explode('!*!', $actividad->act); 
    $sumTotal=0;
    @endphp

    @foreach($padre as $kpp => $padres)

        @php
         $hijo = explode('||', $padres);
         $sumTotal += intval($hijo[3]);


         $cantidad = intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12])+intval($hijo[13])+intval($hijo[14])+intval($hijo[15]);

         $periodo = $hijo[16].' - '.$hijo[17];

         $programado = intval($hijo[4])+intval($hijo[5])+intval($hijo[6]);
         $realizado = intval($hijo[18])+intval($hijo[19])+intval($hijo[20]);
         $resta = $realizado - $programado;
         $resta != 0 && $programado != 0 ? $variacion = ($resta * 100) / $programado : $variacion = 0;


         switch ($idtrimestre) {
              case '1':
                  $programadoAc = intval($hijo[4])+intval($hijo[5])+intval($hijo[6]);
                  $realizadoAc = intval($hijo[18])+intval($hijo[19])+intval($hijo[20]);
                  $restaAc = $realizadoAc - $programadoAc;
                  $restaAc != 0 && $programadoAc != 0 ? $variacionAc = ($restaAc * 100) / $programadoAc : $variacionAc = 0;


                  if($hijo[32] == 1){

                    $observacion= $hijo[30];

                    } else {

                    if ($hijo[31]== 1) {
                       $observacion= $hijo[30];
                    } else {

                      if (($programado == $realizado) && ($programado!=0))
                        $observacion= "Meta Cumplida";
                      else if (($programado == 0) && ($programadoAc == 0))
                          $observacion= "Sin Variación";
                      else if ($variacionAc == -100)
                        $observacion= "Meta No Cumplida";
                      else if ( ($variacionAc < 0) && ($variacionAc > -100) )
                              $observacion= "Meta Parcialmente Cumplida";
                      else if ($variacionAc > 0)
                        $observacion = "Meta Rebasada";
                      else 
                        $observacion= "";

                    }

                  }
                  

                  break;
              case '2':
                  $programadoAc = intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9]);
                  $realizadoAc = intval($hijo[18])+intval($hijo[19])+intval($hijo[20])+intval($hijo[21])+intval($hijo[22])+intval($hijo[23]);
                  $restaAc = $realizadoAc - $programadoAc;
                  $restaAc != 0 && $programadoAc != 0 ? $variacionAc = ($restaAc * 100) / $programadoAc : $variacionAc = 0;

                  if($hijo[35] == 1){

                    $observacion= $hijo[33];

                    } else {

                    if ($hijo[34]== 1) {
                       $observacion= $hijo[33];
                    } else {

                      if (($programado == $realizado) && ($programado!=0))
                        $observacion= "Meta Cumplida";
                      else if (($programado == 0) && ($programadoAc == 0))
                          $observacion= "Sin Variación";
                      else if ($variacionAc == -100)
                        $observacion= "Meta No Cumplida";
                      else if ( ($variacionAc < 0) && ($variacionAc > -100) )
                              $observacion= "Meta Parcialmente Cumplida";
                      else if ($variacionAc > 0)
                        $observacion = "Meta Rebasada";
                      else 
                        $observacion= "";

                    }

                  }

                  break;
              case '3':
                  $programadoAc = intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12]);
                  $realizadoAc = intval($hijo[18])+intval($hijo[19])+intval($hijo[20])+intval($hijo[21])+intval($hijo[22])+intval($hijo[23])+intval($hijo[24])+intval($hijo[25])+intval($hijo[26]);
                  $restaAc = $realizadoAc - $programadoAc;
                  $restaAc != 0 && $programadoAc != 0 ? $variacionAc = ($restaAc * 100) / $programadoAc : $variacionAc = 0;

                  if($hijo[38] == 1){

                    $observacion= $hijo[36];

                    } else {

                    if ($hijo[37]== 1) {
                       $observacion= $hijo[36];
                    } else {

                      if (($programado == $realizado) && ($programado!=0))
                        $observacion= "Meta Cumplida";
                      else if (($programado == 0) && ($programadoAc == 0))
                          $observacion= "Sin Variación";
                      else if ($variacionAc == -100)
                        $observacion= "Meta No Cumplida";
                      else if ( ($variacionAc < 0) && ($variacionAc > -100) )
                              $observacion= "Meta Parcialmente Cumplida";
                      else if ($variacionAc > 0)
                        $observacion = "Meta Rebasada";
                      else 
                        $observacion= "";

                    }

                  }

                  break;
              case '4':
                  $programadoAc = intval($hijo[4])+intval($hijo[5])+intval($hijo[6])+intval($hijo[7])+intval($hijo[8])+intval($hijo[9])+intval($hijo[10])+intval($hijo[11])+intval($hijo[12])+intval($hijo[13])+intval($hijo[14])+intval($hijo[15]);
                  $realizadoAc = intval($hijo[18])+intval($hijo[19])+intval($hijo[20])+intval($hijo[21])+intval($hijo[22])+intval($hijo[23])+intval($hijo[24])+intval($hijo[25])+intval($hijo[26])+intval($hijo[27])+intval($hijo[28])+intval($hijo[29]);
                  $restaAc = $realizadoAc - $programadoAc;
                  $restaAc != 0 && $programadoAc != 0 ? $variacionAc = ($restaAc * 100) / $programadoAc : $variacionAc = 0;

                  if($hijo[41] == 1){

                    $observacion= $hijo[39];

                    } else {

                    if ($hijo[40]== 1) {
                       $observacion= $hijo[39];
                    } else {

                      if (($programado == $realizado) && ($programado!=0))
                        $observacion= "Meta Cumplida";
                      else if (($programado == 0) && ($programadoAc == 0))
                          $observacion= "Sin Variación";
                      else if ($variacionAc == -100)
                        $observacion= "Meta No Cumplida";
                      else if ( ($variacionAc < 0) && ($variacionAc > -100) )
                              $observacion= "Meta Parcialmente Cumplida";
                      else if ($variacionAc > 0)
                        $observacion = "Meta Rebasada";
                      else 
                        $observacion= "";

                    }

                  }

                  break;
          }


        @endphp
  

    @if($kpp == 7 || $kpp == 15 || $kpp == 23)    

      </table> <!--cerramos la tabla para realizar el salto-->

      <table border="0" align="center" width="100%">
        <tr style="background:#fff; height:75px;">
          <th colspan="4" style="font-size: 16px;">
          ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2020 
          </th>
        </tr>
      </table>


  <table border="1" class="btable">
    <tr style="">
      <td rowspan="3" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px;" width="8%"><img class="logo" src="{{ public_path('images/logoople.png') }}" width="100"></td>
      <td style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;" width="8%">Programa</td>      
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$actividad->descprograma}}</td>
      <td style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;"  width="10%">Unidad Responsable<br><span>{{$actividad->name}}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Programa Específico</td>
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$actividad->descprogramaesp}}</td>
      <td width="10%" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Periodo Trimestral<br><span>{{$trimestre}}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Objetivo</td>
      <td colspan="2" width="60%" style="font-size: 13px;padding: 10px 0 10px 5px;">{{$actividad->objprogramaesp}}</td>
    </tr>
  </table>



  <table class="table btable" border="1" align="center" cellpadding="5px" style="margin-top: -1px; width:100%;{{$key == (count($actividades)-1) ? '' : 'page-break-after: always;' }}">

  <tr class="gris" style="text-align: center;">
    <td style="" rowspan="3">No.</td>
    <td style="" rowspan="3" width="28%">ACTIVIDAD</td>
    <td style="" colspan="2">META ANUAL</td>
    <td style="" rowspan="3">PERIODO <br>CALENDARIZADO</td>
    <td style="" colspan="3">AVANCE TRIMESTRAL</td>
    <td style="" colspan="4">AVANCE ACUMULADO</td>
    <td style="" rowspan="3" width="10%">OBSERVACIONES</td>
  </tr>
  <tr class="gris">
    <td rowspan="2" style="text-align: center;">UNIDAD DE<br>MEDIDA</td>
    <td style="" rowspan="2">CANTIDAD</td>
    <td style="" rowspan="2">PROGRAMADO</td>
    <td style="" rowspan="2">REALIZADO</td>
    <td style="" rowspan="2">VARIACION %</td>
    <td style="" rowspan="2">PROGRAMADO</td>
    <td style="" rowspan="2">REALIZADO</td>
    <td colspan="2" style="text-align: center;">VARIACION</td>
  </tr>
  <tr class="gris">
    <td width="5%" style="text-align: center;">CANTIDAD</td>
    <td width="5%" style="text-align: center;">%</td>
  </tr>

      
            <tr>
                <td style="text-align: center;">{{$hijo[0]}}</td>
                <td style="">{{$hijo[1]}}</td>
                <td style="text-align: center;">{{$hijo[2]}}</td>
                <td style="text-align: center;">{{$cantidad}}</td>
                <td style="text-align: center;">{{$periodo}}</td>
                <td style="text-align: center;">{{$programado}}</td>
                <td style="text-align: center;">{{$realizado}}</td>
                <td style="text-align: center;">{{number_format($variacion, 2, '.', ',')}}</td>
                <td style="text-align: center;">{{$programadoAc}}</td>
                <td style="text-align: center;">{{$realizadoAc}}</td>
                <td style="text-align: center;">{{$restaAc}}</td>
                <td style="text-align: center;">{{number_format($variacionAc, 2, '.', ',')}}</td>
                <td style="text-align: center;">{{$observacion}}</td>

            </tr>         
   @else
            <tr>
                <td style="text-align: center;">{{$hijo[0]}}</td>
                <td style="">{{$hijo[1]}}</td>
                <td style="text-align: center;">{{$hijo[2]}}</td>
                <td style="text-align: center;">{{$cantidad}}</td>
                <td style="text-align: center;">{{$periodo}}</td>
                <td style="text-align: center;">{{$programado}}</td>
                <td style="text-align: center;">{{$realizado}}</td>
                <td style="text-align: center;">{{number_format($variacion, 2, '.', ',')}}</td>
                <td style="text-align: center;">{{$programadoAc}}</td>
                <td style="text-align: center;">{{$realizadoAc}}</td>
                <td style="text-align: center;">{{$restaAc}}</td>
                <td style="text-align: center;">{{number_format($variacionAc, 2, '.', ',')}}</td>
                <td style="text-align: center;">{{$observacion}}</td>

            </tr>  
    @endif


 @endforeach

<!--imprecion de la tabla para firmas-->

 @if($key == 56 || $key == 81 || $key == 82)

<tr>
  <td colspan="13" borde="0" style="border-right:solid 1px #fff;border-left:solid 1px #fff;">
    
  </td>
</tr>

<tr>
  <td colspan="13" class="gris" style="text-align: center;">
    LAS FIRMAS AL CALCE AMPARAN LA TOTALIDAD DEL PRESENTE DOCUMENTO
  </td>
</tr>

<tr style="height: 150px;">
  <td colspan="6" style="text-align: center;">
    ELABORÓ<br>MTRA. PATRICIA PÉREZ HERNÁNDEZ<br>TITULAR DE LA UNIDAD TÉCNICA DE PLANEACIÓN
  </td>
  <td colspan="7" style="text-align: center;">
    Vo. Bo.<br>MTRO. HUGO ENRIQUE CASTRO BERNABE<br>SECRETARIO EJECUTIVO
  </td>
</tr>


@endif


 </table>






@endforeach


</body>
</html>






