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
      width: 1024px;
    }
    table{
      border-collapse: collapse;
    }
    h1, h2, h3, h4, p{
      margin: 0px;
      padding: 0px;
    }

    .gray{
      background-color: #B0ADAD;
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

    .page-number:after { content: counter(page); }
    /** Define the margins of your page **/
    /*body
    {
      font-family: Arial, Helvetica, sans-serif;
    }
    @page {
      margin: 100px 25px;
    }

    header {
      position: fixed;
      //top: -60px;
      left: 0px;
      right: 0px;
     height: 230px;
      background-color: #03a9f4;
      color: white;
      text-align: center;
      line-height: 35px;
    }

    footer {
      position: fixed;
      bottom: -60px;
      left: 0px;
      right: 0px;
      height: 50px;

      background-color: #03a9f4;
      color: white;
      text-align: center;
      line-height: 35px;
    }

    main{
      margin-top:150px;
    }

    .bg_gray{
      background: #bfbfbf;  border:1px solid #46453f; font-size: 12px;
      text-align: center;
    }
    .title1{
      font-size: 14px;
      text-align: center;
      height: 65px;
    }
    header h3, header h2{
      margin: 0px;
      padding: 0px;
      font-weight: bold;
    }

    .noborder{
      border: none;
    }*/

  </style>
</head>
<body>
<header>
  <table class="table" border="0" align="center" cellpadding="2px;">
    <tr>
      <td style="height: 10px;"></td>
    </tr>
    <tr>
      <td width="300px" >
        <img src="{{asset('images/logoople.png')}}" alt="" height="65px">
      </td>
      <td>
        <h1>ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019</h1>
      </td>
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
  <table class="table" border="1" align="center" style="border-top: none;">
      <tr>
        <th width="30px">No. Act</th>
        <td style="text-align: center" width="90px">
          <table align="center" width="100%" style="text-align: center" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <th colspan="2"> Avance Mensual</th>
            </tr>
            <tr>
              <th>PROG.</th>
              <th>REAL.</th>
            </tr>
          </table>
        </td>
        <th width="335px">DESCRIPCION</th>
        <th width="335px">SOPORTE</th>
        <th width="194px">OBSERVACIONES</th>
      </tr>
  </table>
</header>

<footer class="page-number">
  Página <script type="text/php"> $PAGE_NUM </script>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
  @if (!empty($poa['resultado']))
    <table class="table" border="1" align="center">
      @foreach ($poa['resultado'] as $i => $r)
        <tr>
          <td width="30px">{{$i+1}}</td>
          <td width="90px">
            <table width="90px" align="center" cellspacing="0" cellpadding="0">
              <tr>
                @if ($poa['idmes']==1)
                  <td align="center" style="text-align:center;">{{$r->enep}}
                  <td align="center" style="text-align:center;">{{$r->ener}}
                @endif
                @if ($poa['idmes']==2)
                  <td align="center" style="text-align:center;">{{$r->febp}}
                  <td align="center" style="text-align:center;">{{$r->febr}}
                @endif
                @if ($poa['idmes']==3)
                  <td align="center" style="text-align:center;">{{$r->marp}}
                  <td align="center" style="text-align:center;">{{$r->marr}}
                @endif
                @if ($poa['idmes']==4)
                  <td align="center" style="text-align:center;">{{$r->abrp}}
                  <td align="center" style="text-align:center;">{{$r->abrr}}
                @endif
                @if ($poa['idmes']==5)
                  <td align="center" style="text-align:center;">{{$r->mayp}}
                  <td align="center" style="text-align:center;">{{$r->mayr}}
                @endif
                @if ($poa['idmes']==6)
                  <td align="center" style="text-align:center;">{{$r->junp}}
                  <td align="center" style="text-align:center;">{{$r->junr}}
                @endif
                @if ($poa['idmes']==7)
                  <td align="center" style="text-align:center;">{{$r->julp}}
                  <td align="center" style="text-align:center;">{{$r->julr}}
                @endif
                @if ($poa['idmes']==8)
                  <td align="center" style="text-align:center;">{{$r->agop}}
                  <td align="center" style="text-align:center;">{{$r->agor}}
                @endif
                @if ($poa['idmes']==9)
                  <td align="center" style="text-align:center;">{{$r->sepp}}
                  <td align="center" style="text-align:center;">{{$r->sepr}}
                @endif
                @if ($poa['idmes']==10)
                  <td align="center" style="text-align:center;">{{$r->octp}}
                  <td align="center" style="text-align:center;">{{$r->octr}}
                @endif
                @if ($poa['idmes']==11)
                  <td align="center" style="text-align:center;">{{$r->novp}}
                  <td align="center" style="text-align:center;">{{$r->novr}}
                @endif
                @if ($poa['idmes']==12)
                  <td align="center" style="text-align:center;">{{$r->dicp}}
                  <td align="center" style="text-align:center;">{{$r->dicr}}
                @endif
              </tr>
            </table>
          </td>
          <td width="335px">{{$r->descripcion}}</td>
          <td width="335px">{{$r->soporte}}</td>
          <td width="194px">{{$r->observaciones}}</td>
        </tr>
      @endforeach
    </table>
  @endif
</main>



</body>
</html>
