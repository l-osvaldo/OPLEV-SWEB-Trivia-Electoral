<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>POA 2019</title>


    <style type="text/css">

table td.texto {text-align: center;  font-weight: 400; height: 65px; background: #ffffff url('img/logoople.jpg') no-repeat left top; width: 1000px; font-size: 14px;}
table td.programa {text-align: center;  font-weight:900; height: 30px; background: #bfbfbf;  border:1px solid #46453f; width: 1000px; font-size: 12px;}
table td.obj {text-align: center;  font-weight:bolder; height: 30px;  border:1px solid #46453f; width: 1000px; font-size: 10px;}


table tr.trestitulos{ background: #bfbfbf; border:1px solid #46453f; }

table tr.trestitulos td{ text-align: center;  font-weight:900; height: 30px; font-size: 10px; border:1px solid #46453f;}

table tr.trestitulos2 td{ text-align: center; border:1px solid #46453f; font-weight:900; height: 30px; font-size: 10px;}


table tr.avances { background: #bfbfbf; border:1px solid #46453f; }
table tr.avances td{ text-align: center;  font-weight:900; height: 20px; font-size: 10px; border:1px solid #46453f; }

table tr.avances2 { background: #bfbfbf; border:1px solid #46453f; }
table tr.avances2 td{ text-align: center; height: 20px; font-size: 9px;}




table tr.avances_tri { background: #bfbfbf;  }
table tr.avances_tri td{ text-align: center; height: 20px; font-size: 9px;}


/*  border:1px solid #46453f;  */




table tr.avances_tri2 { background: #bfbfbf;}
table tr.avances_tri2 td{ text-align: center; font-size: 8px;}





table tr.resulttrime td{ text-align: center; font-size: 10px; border:1px solid #bfbfbf;}

table tr.resulttrime td.jus { text-align:justify; font-size: 10px; padding: 5px  5px; }





table tr.vobo td{text-align: center; font-size: 10px;}



table {border-collapse:collapse; table-layout:fixed;  width:100%; }

table td.result{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top;}

table td.result1{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 1cm;}
table td.result2{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 2cm;}
table td.result3{ text-align: center; font-weight:900; font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 2cm;}

table td.resultj{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; }

table td.resultm{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; text-align: justify;}

table td.resultj2{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; }

table td.resultj3{  font-size: 11px; border:1px solid #bfbfbf; padding: 7px  7px; vertical-align:top; width: 12cm; }

.tablacontenido
{
  margin-top: 5px;
  border: .5px solid;
}


.datos
{
  font-size: 11px;
}


.colinfo
{
  text-align: justify; 
  padding: 4px 4px;  
  border-bottom: .5px solid;
}



    </style>




  </head>
  <body>


    <table>
      <tr>
        <td class="texto">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 </td>
      </tr>
    </table>

    <table>
      <tr>
        <td class="programa">
          {{$poa['programa']}}<br>{{$poa['programaesp']}}
        </td>
      </tr>
      <tr>
        <td class="obj">
          Objetivo: 
          {{$poa['objetivo']}}
        </td>
      </tr>
    </table>


    <table width="100%">
      <tr class="trestitulos">
        <td>UNIDAD RESPONSABLE</td>
        <td>FIRMA DEL RESPONSABLE DE UNIDAD</td>
        <td>MES</td>
      </tr>
      <tr class="trestitulos2">
        <td width="45%">{{ $poa['nombrearea'] }}</td>
        <td width="35%"></td>
        <td width="20%">{{ $poa['mes'] }}</td>
      </tr>
    </table>


    <table width="100%">
      <tr class="avances">
        <td width="2%">No. <br> Act.</td> 
        <td colspan="2" width="11%">AVANCE MENSUAL <br> PROG.  &nbsp; &nbsp; &nbsp; &nbsp; REAL.</td> 
        <td width="29%">DESCRIPCIÓN</td> 
        <td width="29%">SOPORTE</td> 
        <td width="15%">OBSERVACIONES</td>
      </tr>
    </table>

    @if (!empty($poa['resultado']))
      <table class="tablacontenido">
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
            <td class="colinfo"  width="29%">{{$r->soporte}}</td>
            <td class="colinfo"width="15%">{{$r->observaciones}}</td>
          </tr>
          {{$i++}}
        @endforeach
      </table>  
    @endif












  </body>
</html>
