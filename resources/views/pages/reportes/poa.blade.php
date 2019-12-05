<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>REPORTE SIPSEI</title>
  <style type="text/css">
    table {
      border-collapse: collapse;font-size: 13px;border:solid 1px #000;
    }
    tr {border-left:solid 1px #000;border-right:solid 1px #000;border-bottom:solid 1px #000;border-top:1px solid #000;}
    th, td {
      padding: 3px;border:none;
    }
    .jusText{text-align: left;/*psition: relative*/}
    br{margin-bottom: 50px;}
  </style>
</head>
<body>


  @if (!empty($poa['resultado']))
      <table border="0" border="collapse" align="center" width="100%">

        @foreach ($poa['resultado'] as $indexKey => $r)
        
          <tr>
            <td width="2%" colspan="1" height="20" valign="top" style="text-align: center;">{{$indexKey+1}}</td>
            <td width="8%" colspan="1" height="20" valign="top" style="text-align: center;">
            @if ($poa['idmes']==1)
              <div style="width: 50%; float: left;text-align: center;">{{$r->enep}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->ener}}</div>
            @endif
            @if ($poa['idmes']==2)
              <div style="width: 50%; float: left;text-align: center;">{{$r->febp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->febr}}</div>
            @endif
            @if ($poa['idmes']==3)
              <div style="width: 50%; float: left;text-align: center;">{{$r->marp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->marr}}</div>
            @endif
            @if ($poa['idmes']==4)
              <div style="width: 50%; float: left;text-align: center;">{{$r->abrp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->abrr}}</div>
            @endif
            @if ($poa['idmes']==5)
              <div style="width: 50%; float: left;text-align: center;">{{$r->mayp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->mayr}}</div>
            @endif
            @if ($poa['idmes']==6)
              <div style="width: 50%; float: left;text-align: center;">{{$r->junp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->junr}}</div>
            @endif
            @if ($poa['idmes']==7)
              <div style="width: 50%; float: left;text-align: center;">{{$r->julp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->julr}}</div>
            @endif
            @if ($poa['idmes']==8)
              <div style="width: 50%; float: left;text-align: center;">{{$r->agop}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->agor}}</div>
            @endif
            @if ($poa['idmes']==9)
              <div style="width: 50%; float: left;text-align: center;">{{$r->sepp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->sepr}}</div>
            @endif
            @if ($poa['idmes']==10)
              <div style="width: 50%; float: left;text-align: center;">{{$r->octp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->octr}}</div>
            @endif
            @if ($poa['idmes']==11)
              <div style="width: 50%; float: left;text-align: center;">{{$r->novp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->novr}}</div>
            @endif
            @if ($poa['idmes']==12)
              <div style="width: 50%; float: left;text-align: center;">{{$r->dicp}}</div><div style="width: 50%; float: right; text-align:center;">{{$r->dicr}}</div>
            @endif
            </td>
            <td width="26%" colspan="2" valign="top" class="jusText">{!!nl2br(str_replace(" ", " &nbsp;", $r->descripcion))!!}</td>
            <td width="20%" colspan="1" valign="top" class="jusText">{!!nl2br($r->soporte)!!}</td>
            <td width="20%" colspan="1" valign="top" class="jusText">{!!nl2br($r->observaciones)!!}</td>
          </tr>
        
        @endforeach
      </table>

  @endif


</body>
</html>
