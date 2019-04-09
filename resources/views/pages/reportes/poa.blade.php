<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2019</title>
  <style>
    *{
      font-family: Arial, Helvetica, sans-serif;
    }

    body{
      font-size: 12px;
    }
    table tr td{
      vertical-align: middle;
    }
    .table{
      width: 980px;
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
      top: -260px;
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
      margin-top:20px;
    }

    table td.texto {text-align: center;  font-weight: 400; height: 65px; background: #ffffff url('/images/logoople.jpg') no-repeat left top; width: 980px; font-size: 14px;}

    table tr.avances { background: #bfbfbf; border:1px solid #46453f; }
    table tr.avances td{ text-align: center;  font-weight:900; height: 20px; font-size: 10px; border:1px solid #46453f; }      

      .tablacontenido
      {        
        border: .5px solid;
        margin-top:5px;
      }

      .colinfo
      {
        text-align: left; 
        padding: 5px 5px;  
        border-bottom: .5px solid;
      }

      .datos
      {
        font-size: 11px;
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
    <tr class="gray">
      <th colspan="3">
        <h2>{{$poa['programa']}}<br>{{$poa['programaesp']}}</h2>
      </th>
    </tr>
    <tr>
     <td colspan="3">
       Objetivo: {{$poa['objetivo']}}
     </td>
    </tr>
    <tr class="gray padding">
      <td width="400px">UNIDAD RESPONSABLE</td>
      <td width="400px">FIRMA DEL RESPONSABLE</td>
      <td>MES</td>
    </tr>
    <tr class="padding">
      <td>{{ $poa['nombrearea'] }}</td>
      <td></td>
      <td>{{ $poa['mes'] }}</td>
    </tr>
  </table>

    <table class="table" border="1" align="center">
      <tr class="avances">
        <td width="2%">No. <br> ACT.</td> 
        <td colspan="2" width="11%">AVANCE MENSUAL <br> PROG.  &nbsp; &nbsp; &nbsp; &nbsp; REAL.</td> 
        <td width="29%">DESCRIPCIÓN</td> 
        <td width="23%">SOPORTE</td> 
        <td width="22%">OBSERVACIONES</td>
      </tr>
    </table>


</header>

<footer class="page-number">
    <script type="text/php">
      if ( isset($pdf) ) {
        $pdf->page_text(720, 570, "Página: {PAGE_NUM} de {PAGE_COUNT}", null, 6, array(0,0,0));
    }
</script>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
  @if (!empty($poa['resultado']))
      <table class="table tablacontenido" align="center">
        {{$i=1}}
        @foreach ($poa['resultado'] as $r)
        
          <tr class="datos">
            <td class="colinfo" width="2%">{{$i}}</td>
            <td class="colinfo" colspan="2" width="11%">&nbsp; &nbsp; &nbsp; &nbsp;
            @if ($poa['idmes']==1)
              {{$r->enep}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->ener}}
            @endif
            @if ($poa['idmes']==2)
              {{$r->febp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->febr}}
            @endif
            @if ($poa['idmes']==3)
              {{$r->marp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->marr}}
            @endif
            @if ($poa['idmes']==4)
              {{$r->abrp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->abrr}}
            @endif
            @if ($poa['idmes']==5)
              {{$r->mayp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->mayr}}
            @endif
            @if ($poa['idmes']==6)
              {{$r->junp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->junr}}
            @endif
            @if ($poa['idmes']==7)
              {{$r->julp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->julr}}
            @endif
            @if ($poa['idmes']==8)
              {{$r->agop}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->agor}}
            @endif
            @if ($poa['idmes']==9)
              {{$r->sepp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->sepr}}
            @endif
            @if ($poa['idmes']==10)
              {{$r->octp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->octr}}
            @endif
            @if ($poa['idmes']==11)
              {{$r->novp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->novr}}
            @endif
            @if ($poa['idmes']==12)
              {{$r->dicp}}&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$r->dicr}}
            @endif
            </td>
            <td class="colinfo" width="29%">{{$r->descripcion}}</td>
            <td class="colinfo"  width="23%">{{$r->soporte}}</td>
            <td class="colinfo"width="22%">{{$r->observaciones}}</td>
          </tr>
          {{$i++}}
        
        @endforeach
      </table>

  @endif

</main>



</body>
</html>
