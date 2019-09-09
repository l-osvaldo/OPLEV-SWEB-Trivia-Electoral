<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2019</title>
  <style>
     table {
      border-collapse: collapse;width: 100%
    }

    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 3px;text-align: center;font-size: 13px;
    }    
    .gris{background: #e3e3e3;}

  </style>
</head>
<body>

  <!--table class="tituloople">
    <tr>      
      <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 </td>
    </tr>
  </table-->



  <table class="table" border="1" align="center" cellpadding="5px">
    <tr>
      <td colspan="2" class="gris">Programa</td>      
      <td colspan="7"> {{$trimestral[0]['descprograma']}} </td>
      <td colspan="4" class="gris">Unidad Responsable<br><span>{{ $trimestral[0]['nombrearea'] }}</span></td>
    </tr>

    <tr>
      
      <td colspan="2" class="gris">Programa Específico</td>
      <td colspan="7">{{ $trimestral[0]['descprogramaesp'] }}</td>
      <td colspan="4" class="gris">Periodo Trimestral<br><span>{{ $trimestral[0]['periodotrimestral'] }}</span></td>
    </tr>
    <tr>
      <td colspan="2" class="gris">Objetivo</td>
      <td colspan="11">{{ $trimestral[0]['objprogramaesp'] }}</td>
    </tr>

  <tr class="gris">
    <td rowspan="3">No.</td>
    <td rowspan="3">ACTIVIDAD</td>
    <td colspan="2">META ANUAL</td>
    <td rowspan="3">PERIODO <br>CALENDARIZADO</td>
    <td colspan="3">AVANCE TRIMESTRAL</td>
    <td colspan="4">AVANCE ACUMULADO</td>
    <td rowspan="3">OBSERVACIONES</td>
  </tr>
  <tr class="gris">
    <td rowspan="2">UNIDAD DE<br>MEDIDA</td>
    <td rowspan="2">CANTIDAD</td>
    <td rowspan="2">PROGRAMADO</td>
    <td rowspan="2">REALIZADO</td>
    <td rowspan="2">VARIACION %</td>
    <td rowspan="2">PROGRAMADO</td>
    <td rowspan="2">REALIZADO</td>
    <td colspan="2">VARIACION</td>
  </tr>
  <tr class="gris">
    <td>CANTIDAD</td>
    <td>%</td>
  </tr>

        @foreach ($trimestral as $indexKey => $trim)      
          <tr>        
            <td>{{$indexKey+1}}</td>
            <td>{{ $trim->descactividad }}</td>   
            <td>{{ $trim->unidadmedida }}</td>   
            <td>{{ $trim->cantidadanual }}</td>   
            <td>{{ $trim->inicio }} - {{ $trim->termino }} </td>   
            <td>{{ $trim->avtprogramado }}</td>   
            <td>{{ $trim->avtrealizado }}</td>   
            <td>{{ $trim->avtvariacion }}</td>   
            <td>{{ $trim->avaprogramado }}</td>   
            <td>{{ $trim->avarealizado }}</td>   
            <td>{{ $trim->avacantidad }}</td>   
            <td>{{ $trim->avaporcentaje }}</td>
            <td>{{ $trim->observatrim }}</td>              
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
