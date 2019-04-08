<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2019</title>
  <style>
    *{
      font-family: Arial, Helvetica, sans-serif;
    }

    html
    {
      margin-left: 75px;
      margin-right: : 20px;
      margin-bottom: 10px;
    }

    body{
      font-size: 12px;
    }
    table tr td{
      vertical-align: middle;
    }
    .table{
      width: 95%;
    }
    table{
      border-collapse: collapse;
    }
    h1, h2, h3, h4, p{
      margin: 0px;
      padding: 0px;
    }

    .gray{
      background-color: #bfbfbf;
      font-weight: 900;
      text-align: center;
    }


    header table{
      text-align: center;
      font-size: 10px;
    }

    header table h1{
      font-size: 14px;
    }
    header table h2{
      font-size: 12px;
      font-weight: bolder;
    }

    tr.padding td{
      padding: 10px 0;
    }
    @page {
      margin-top:253px;
      margin-bottom: 60px;
    }
    header {
      position: fixed;
      top: -280px;
      left: 0px;
      right: 0px;
      height: 253px;
    }
    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 50px;
      color: #000000;
      text-align: right;
    }


    .tituloople
    {
      margin-top: 20px;
      margin-left: 33px;
    }

    table td.texto { text-align: center;  font-weight: 400; height: 65px; background: #ffffff; width: 1150px; font-size: 14px;}

    table tr.avances { background: #bfbfbf; border:1px solid #46453f; }
    table tr.avances td{ text-align: center;  font-weight:900; height: 20px; font-size: 10px; border:1px solid #46453f; }      

      .tablacontenido
      {        
        border: .5px solid;
        margin-top:5px;
      }

      .colinfo
      {
        text-align: center;
        padding: 5px 5px;  
        border-bottom: .5px solid;
      }

      .colinfojust
      {
        text-align: justify;
        padding: 5px 5px;  
        border-bottom: .5px solid;
      }

      .datos
      {
        font-size: 11px;
      }

      .titulo
      {
       background: #bfbfbf;
       font-weight: bold;
       text-align: left;
      }

      .titulocenter
      {
       background: #bfbfbf;
       font-weight: bold;
       text-align: center;
      }

      .subtitulo
      {
       font-size: 8px !important; 
      }

      .contenido
      {
       text-align: justify;
      }

      .borde
      {
        border-left: 1.6px solid !important;
      }

      .titfirmas
      {
        text-align: center;
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 85px !important;
      }

      .nombresfirmas
      {
        text-align: center;
        font-size: 13px;
      }

  </style>
</head>
<body>
<header>
  <table class="tituloople">
    <tr>      
      <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 </td>
    </tr>
  </table>



  <table class="table" border="1" align="center" cellpadding="5px">
    <tr>
      <td rowspan="3" width="12%"><img src="{{ public_path('/images/logoople.jpg') }}"></td>
      <td class="titulo" width="12%">Programa</td>      
      <td class="contenido"> {{$trimestral[0]['descprograma']}} </td>
      <td width="15%" class="titulocenter">Unidad Responsable<br><span class="">{{ $trimestral[0]['nombrearea'] }}</span></td>
    </tr>

    <tr class="rubro">
      
      <td class="titulo">Programa Específico</td>
      <td class="contenido">{{ $trimestral[0]['descprogramaesp'] }}</td>
      <td width="15%" class="titulocenter">Periodo Trimestral<br><span class="">{{ $trimestral[0]['periodotrimestral'] }}</span></td>
    </tr>
    <tr class="">
      
      <td class="titulo">Objetivo</td>
      <td class="contenido" colspan="2">{{ $trimestral[0]['objprogramaesp'] }}</td>
    </tr>
  </table>


<table class="table" border="1" align="center">
  <tr class="avances">
    <td rowspan="3" width="2%">No.</td>
    <td rowspan="3" width="29%">ACTIVIDAD</td>
    <td colspan="2" width="12%">META ANUAL</td>
    <td rowspan="3" width="8%" class="borde">PERIODO <br>CALENDARIZADO</td>
    <td colspan="3" width="17%">AVANCE TRIMESTRAL</td>
    <td colspan="4" width="17%">AVANCE ACUMULADO</td>
    <td rowspan="3" width="20%" class="borde">OBSERVACIONES</td>
  </tr>
  <tr class="avances">
    <td rowspan="2" width="6%" class="subtitulo">UNIDAD DE<br>MEDIDA</td>
    <td rowspan="2" width="6%" class="subtitulo">CANTIDAD</td>
    <td rowspan="2" width="6%" class="subtitulo">PROGRAMADO</td>
    <td rowspan="2" width="6%" class="subtitulo">REALIZADO</td>
    <td rowspan="2" width="6%" class="subtitulo">VARIACION %</td>
    <td rowspan="2" width="6%" class="subtitulo">PROGRAMADO</td>
    <td rowspan="2" width="6%" class="subtitulo">REALIZADO</td>
    <td colspan="2" width="6%">VARIACION</td>
  </tr>
  <tr class="avances">
    <td class="subtitulo">CANTIDAD</td>
    <td class="subtitulo">%</td>
  </tr>
</table>


</header>

<footer class="page-number">

</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
  
      <table class="table tablacontenido" align="center" border="1">
        {{$i=1}}
        @foreach ($trimestral as $trim)
          <tr class="datos">
            <td class="colinfo" width="12px">{{$i}}</td>
            <td class="colinfojust" width="308px">{{ $trim->descactividad }}</td>   
            <td class="colinfo" width="49px">{{ $trim->unidadmedida }}</td>   
            <td class="colinfo" width="55px">{{ $trim->cantidadanual }}</td>   
            <td class="colinfo" width="78px">{{ $trim->inicio }} - {{ $trim->termino }} </td>   
            <td class="colinfo" width="53px">{{ $trim->avtprogramado }}</td>   
            <td class="colinfo" width="55px">{{ $trim->avtrealizado }}</td>   
            <td class="colinfo" width="55px">{{ $trim->avtvariacion }}</td>   
            <td class="colinfo" width="56px">{{ $trim->avaprogramado }}</td>   
            <td class="colinfo" width="54px">{{ $trim->avarealizado }}</td>   
            <td class="colinfo" width="35px">{{ $trim->avacantidad }}</td>   
            <td class="colinfo" width="35px">{{ $trim->avaporcentaje }}</td>
            <td class="colinfojust">{{ $trim->observatrim }}</td>              
          </tr>
          {{$i++}}
        @endforeach
      </table>

      @if (($trim->idarea==3) && ($trim->idprograma==4))
        <br><br><br><br>
        <table class="table" align="center" border="0">
          <tr>
            <td colspan="2" class="titfirmas">
              LAS FIRMAS AL CALCE AMPARAN LA TOTALIDAD DEL PRESENTE DOCUMENTO
            </td>
          </tr>

          <tr class="nombresfirmas">
            <td>
              ELABORÓ<br>MTRA. PATRICIA PÉREZ HERNÁNDEZ<br>TITULAR DE LA UNIDAD TÉCNICA DE PLANEACIÓN
            </td>
            <td>
              Vo. Bo.<br>MTRO. HUGO ENRIQUE CASTRO BERNABE<br>SECRETARIO EJECUTIVO
            </td>
          </tr>
        </table>
      @endif



      @if ( ($trim->idarea==18) && ($trim->idprograma==1) && ($trim->idprogramaesp==54) )        
      <br>
        <table class="table" align="center" border="0">          
          <tr>
            <td colspan="2" class="titfirmas">
              LAS FIRMAS AL CALCE AMPARAN LA TOTALIDAD DEL PRESENTE DOCUMENTO
            </td>
          </tr>

          <tr class="nombresfirmas">
            <td>
              ELABORÓ<br>MTRA. PATRICIA PÉREZ HERNÁNDEZ<br>TITULAR DE LA UNIDAD TÉCNICA DE PLANEACIÓN
            </td>
            <td>
              Vo. Bo.<br>MTRO. HUGO ENRIQUE CASTRO BERNABE<br>SECRETARIO EJECUTIVO
            </td>
          </tr>

        </table>
      @endif


</main>



</body>
</html>
