<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Indicadores Acumulados</title>

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
    .colinfo{text-align: center;}
    .colinfojust{text-align: justify;padding:4px;}

    html {height: 0;}
</style>

</head>
<body>


  <table border="0" align="center" width="100%">
    <tr style="background:#fff; height:75px;">
      <th colspan="4" style="font-size: 16px;">
      ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Reporte de Indicadores Acumulado 
      </th>
    </tr>
  </table>

  <table border="1" class="btable">
    <tr style="">
      <td rowspan="3" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px;" width="8%"><img class="logo" src="{{ public_path('images/logoople.png') }}" width="100"></td>
      <td style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;" width="8%">Programa</td>      
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$InfoCedulaAcum[0]->descprograma}}</td>
      <td style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;"  width="10%">Unidad Responsable<br><span>{{ $InfoCedulaAcum[0]->nombrearea }}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Programa Específico</td>
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{ $InfoCedulaAcum[0]->descprogramaesp }}</td>
      <td width="10%" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Periodo<br><span>{{ $InfoCedulaAcum[0]->periodo }}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Objetivo</td>
      <td colspan="2" width="60%" style="font-size: 13px;padding: 10px 0 10px 5px;">{{ $InfoCedulaAcum[0]->objprogramaesp }}</td>
    </tr>
  </table>


  <table class="table btable" border="1" align="center" cellpadding="5px" style="margin-top: -1px; width:100%;page-break-after: always;">


 <tr class="avances gris" style="font-size: .8em;">
              <th rowspan="3" class="tittabla">No. <br>ACT.</th>
              <th rowspan="3" class="tittabla">NOMBRE DEL INDICADOR</th>
              <th rowspan="3" class="tittabla">CLAVE DEL INDICADOR</th>
              <th colspan="2" class="tittabla">META ANUAL</th>
              <th rowspan="3" class="tittabla">PERIODO <br>CALENDARIZADO</th>
              <th colspan="4" class="tittabla">AVANCE ACUMULADO</th>
              <th rowspan="3" class="tittabla">PORCENTAJE<br>DE AVANCE</th>
              <th rowspan="3" class="tittabla">OBSERVACIONES CON RESPECTO<br>A LA META ANUAL</th>
            </tr>
            <tr class="avances gris" style="font-size: .8em;">
              <th rowspan="2" class="tittabla">UNIDAD DE<br>MEDIDA</th>
              <th rowspan="2" class="tittabla">CANTIDAD</th>
              <th rowspan="2" class="tittabla">PROGRAMADO</th>
              <th rowspan="2" class="tittabla">REALIZADO</th>
              <th colspan="2" class="tittabla">VARIACION</th>
            </tr>
            <tr class="avances gris" style="font-size: .8em;">
              <th class="tittabla">CANTIDAD</th>
              <th class="tittabla">%</th>
            </tr>
       
        @foreach ($InfoCedulaAcum as $key => $cedulaacum)  




  @if ($key == 7 || $key == 15 || $key == 24)
    </table>


    <table border="1" class="btable">
    <tr style="">
      <td rowspan="3" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px;" width="8%"><img class="logo" src="{{ public_path('images/logoople.png') }}" width="100"></td>
      <td style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;" width="8%">Programa</td>      
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{$InfoCedulaAcum[0]->descprograma}}</td>
      <td style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;"  width="10%">Unidad Responsable<br><span>{{ $InfoCedulaAcum[0]->nombrearea }}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Programa Específico</td>
      <td style="font-size: 13px;padding: 10px 0 10px 5px;" width="35%">{{ $InfoCedulaAcum[0]->descprogramaesp }}</td>
      <td width="10%" style="text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Periodo<br><span>{{ $InfoCedulaAcum[0]->periodo }}</span></td>
    </tr>
    <tr style="">
      <td width="8%" style="text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Objetivo</td>
      <td colspan="2" width="60%" style="font-size: 13px;padding: 10px 0 10px 5px;">{{ $InfoCedulaAcum[0]->objprogramaesp }}</td>
    </tr>
  </table>


  <table class="table btable" border="1" align="center" cellpadding="5px" style="margin-top: -1px; width:100%;
  {{$key == count($InfoCedulaAcum)-1 ? '' : 'page-break-after: always;' }}
  ">


 <tr class="avances gris" style="font-size: .8em;">
              <th rowspan="3" class="tittabla">No. <br>ACT.</th>
              <th rowspan="3" class="tittabla">INDICADOR</th>
              <th rowspan="3" class="tittabla">IDENTIFICADOR DEL INDICADOR</th>
              <th colspan="2" class="tittabla">META ANUAL</th>
              <th rowspan="3" class="tittabla">PERIODO <br>CALENDARIZADO</th>
              <th colspan="4" class="tittabla">AVANCE ACUMULADO</th>
              <th rowspan="3" class="tittabla">PORCENTAJE DE AVANCE</th>
              <th rowspan="3" class="tittabla">OBSERVACIONES</th>
            </tr>
            <tr class="avances gris" style="font-size: .8em;">
              <th rowspan="2" class="tittabla">UNIDAD DE<br>MEDIDA</th>
              <th rowspan="2" class="tittabla">CANTIDAD</th>
              <th rowspan="2" class="tittabla">PROGRAMADO</th>
              <th rowspan="2" class="tittabla">REALIZADO</th>
              <th colspan="2" class="tittabla">VARIACION</th>
            </tr>
            <tr class="avances gris" style="font-size: .8em;">
              <th class="tittabla">CANTIDAD</th>
              <th class="tittabla">%</th>
            </tr>


          <tr class="datos">        
            <td class="colinfo" width="12px">{{$key+1}}</td>
            <td class="colinfojust" width="280px">{{ $cedulaacum->nombreindicador }}</td>   
            <td class="colinfo" width="115px">{{ $cedulaacum->identificadorindicador }}</td>   
            <td class="colinfo" width="70px">{{ $cedulaacum->unidadmedida }}</td>   
            <td class="colinfo" width="50px">{{ $cedulaacum->cantidadanual }}</td>   
            <td class="colinfo" width="85px">{{ $cedulaacum->abreviaturaperiodocump }}</td>   
            <td class="colinfo" width="56px">{{ $cedulaacum->avaprogramado }}</td>   
            <td class="colinfo" width="55px">{{ $cedulaacum->avarealizado }}</td>   
            <td class="colinfo" width="39px">{{ $cedulaacum->avacantidad }}</td>   
            <td class="colinfo" width="37px">{{ $cedulaacum->avaporcentaje }}</td>
            <td class="colinfo" width="53px">{{ $cedulaacum->avanceanual }} %</td>
            <td class="colinfojust">{{ $cedulaacum->observaindicador }}</td>              
          </tr>

          @else

          <tr class="datos">        
            <td class="colinfo" width="12px">{{$key+1}}</td>
            <td class="colinfojust" width="280px">{{ $cedulaacum->nombreindicador }}</td>   
            <td class="colinfo" width="115px">{{ $cedulaacum->identificadorindicador }}</td>   
            <td class="colinfo" width="70px">{{ $cedulaacum->unidadmedida }}</td>   
            <td class="colinfo" width="50px">{{ $cedulaacum->cantidadanual }}</td>   
            <td class="colinfo" width="85px">{{ $cedulaacum->abreviaturaperiodocump }}</td>   
            <td class="colinfo" width="56px">{{ $cedulaacum->avaprogramado }}</td>   
            <td class="colinfo" width="55px">{{ $cedulaacum->avarealizado }}</td>   
            <td class="colinfo" width="39px">{{ $cedulaacum->avacantidad }}</td>   
            <td class="colinfo" width="37px">{{ $cedulaacum->avaporcentaje }}</td>
            <td class="colinfo" width="53px">{{ $cedulaacum->avanceanual }} %</td>
            <td class="colinfojust">{{ $cedulaacum->observaindicador }}</td>              
          </tr>

          @endif

           {{$key == count($InfoCedulaAcum)-1 ? '' : '' }}


        @endforeach
      </table>

</body>
</html>






