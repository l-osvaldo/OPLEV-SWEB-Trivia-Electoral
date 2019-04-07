<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2019</title>

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
