<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2019</title>
  <style>
     table {
      border-collapse: collapse;width: 100%
    }

    table, th, td {
      border: 1px solid #000;
    }
    th, td {
      padding: 3px;font-size: 13px;padding: 10px 0 10px 5px;
    }    
    .gris{background: #ccc;font-weight: bold;}

  </style>
</head>
<body>

  <!--table class="tituloople">
    <tr>      
      <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 </td>
    </tr>
  </table-->



  <table class="table" border="1">
    <tr>
      <td rowspan="3" style="text-align: center;" width="8%"></td>
      <td class="gris" width="8%">Programa</td>      
      <td width="35%"> {{$trimestral[0]['descprograma']}} </td>
      <td class="gris" style="text-align: center;" width="10%">Unidad Responsable<br><span>{{ $trimestral[0]['nombrearea'] }}</span></td>
    </tr>

    <tr>
      
      <td width="8%" class="gris">Programa Específico</td>
      <td width="35%">{{ $trimestral[0]['descprogramaesp'] }}</td>
      <td width="10%" class="gris" style="text-align: center;">Periodo Trimestral<br><span>{{ $trimestral[0]['periodotrimestral'] }}</span></td>
    </tr>
    <tr>
      <td width="8%" class="gris">Objetivo</td>
      <td colspan="2" width="60%">{{ $trimestral[0]['objprogramaesp'] }}</td>
    </tr>
  </table>
  <table class="table" border="1" align="center" cellpadding="5px" style="margin-top: -1px;">

  <tr class="gris" style="text-align: center;">
    <td rowspan="3">No.</td>
    <td rowspan="3" width="28%">ACTIVIDAD</td>
    <td colspan="2">META ANUAL</td>
    <td rowspan="3">PERIODO <br>CALENDARIZADO</td>
    <td colspan="3">AVANCE TRIMESTRAL</td>
    <td colspan="4">AVANCE ACUMULADO</td>
    <td rowspan="3" width="10%">OBSERVACIONES</td>
  </tr>
  <tr class="gris">
    <td rowspan="2" style="text-align: center;">UNIDAD DE<br>MEDIDA</td>
    <td rowspan="2">CANTIDAD</td>
    <td rowspan="2">PROGRAMADO</td>
    <td rowspan="2">REALIZADO</td>
    <td rowspan="2">VARIACION %</td>
    <td rowspan="2">PROGRAMADO</td>
    <td rowspan="2">REALIZADO</td>
    <td colspan="2" style="text-align: center;">VARIACION</td>
  </tr>
  <tr class="gris">
    <td width="5%" style="text-align: center;">CANTIDAD</td>
    <td width="5%" style="text-align: center;">%</td>
  </tr>

        @foreach ($trimestral as $indexKey => $trim)      
          <tr>        
            <td style="text-align: center;">{{$indexKey+1}}</td>
            <td style="text-align: justify;padding:3px;">{{ $trim->descactividad }}</td>   
            <td style="text-align: center;">{{ $trim->unidadmedida }}</td>   
            <td style="text-align: center;">{{ $trim->cantidadanual }}</td>   
            <td style="text-align: center;">{{ $trim->inicio }} - {{ $trim->termino }} </td>   
            <td style="text-align: center;">{{ $trim->avtprogramado }}</td>   
            <td style="text-align: center;">{{ $trim->avtrealizado }}</td>   
            <td style="text-align: center;">{{ $trim->avtvariacion }}</td>   
            <td style="text-align: center;">{{ $trim->avaprogramado }}</td>   
            <td style="text-align: center;">{{ $trim->avarealizado }}</td>   
            <td style="text-align: center;">{{ $trim->avacantidad }}</td>   
            <td style="text-align: center;">{{ $trim->avaporcentaje }}</td>
            <td style="text-align: left;">{{ $trim->observatrim }}</td>              
          </tr>
        @endforeach


      @if (($trim->idarea==3) && ($trim->idprograma==4))

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
       
      @endif



      @if ( ($trim->idarea==18) && ($trim->idprograma==1) && ($trim->idprogramaesp==54) )        
           
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

      @endif

       </table>





</body>
</html>
