<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>POA 2019</title>


    <style type="text/css">

      body 
      {
        font-family: Arial, Helvetica, sans-serif;        
      }

      html
      {
        margin: 0;
      }

      header
      {
        position: fixed;
        margin: 8mm 8mm 6mm 10mm;
      }

      .main
      { 
        margin: 53mm 8mm 6mm 10mm;
      }

      .tablacontenido
      {        
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



      table {border-collapse:collapse; table-layout:fixed;  width:100%; }
      table td.texto {text-align: center;  font-weight: 400; height: 65px; background: #ffffff url('img/logoople.jpg') no-repeat left top; width: 1000px; font-size: 14px;}
      table td.programa {text-align: center;  font-weight:900; height: 30px; background: #bfbfbf;  border:1px solid #46453f; width: 1000px; font-size: 12px;}
      table td.obj {text-align: center;  font-weight:bolder; height: 30px;  border:1px solid #46453f; width: 1000px; font-size: 10px;}
      table tr.trestitulos{ background: #bfbfbf; border:1px solid #46453f; }
      table tr.trestitulos td{ text-align: center;  font-weight:900; height: 30px; font-size: 10px; border:1px solid #46453f;}
      table tr.trestitulos2 td{ text-align: center; border:1px solid #46453f; font-weight:900; height: 30px; font-size: 10px;}      
      table tr.avances { background: #bfbfbf; border:1px solid #46453f; }
      table tr.avances td{ text-align: center;  font-weight:900; height: 20px; font-size: 10px; border:1px solid #46453f; }      


    </style>


  </head>
  <body>

  <header>
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

  </header>


  <div class="main">

  </div>


  </body>
</html>
