<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CÉDULA DE INDICADORES 2019</title>


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


      .colinfo
      {
        text-align: justify; 
        padding: 4px 4px;  
        border-bottom: .5px solid;
      }


      .info
      {
        border: .5px solid;
        font-size: 12px;
        text-align: center;
      }

      .infoobserva
      {
        border: .5px solid;
        font-size: 12px;
        margin-left: 10px;
      }

      table tr.rubro{ background: #bfbfbf; border:1px solid #46453f; }
      table tr.rubro td{ text-align: center;  font-weight:900; height: 30px; font-size: 10px; border:1px solid #46453f;}

      table {border-collapse:collapse; table-layout:fixed;  width:100%; }

      .tablamargen
      {
        margin-top: 15px !important;
      }

    table td.textologo {text-align: center;  font-weight: 400; height: 65px; background: #ffffff url({{ asset('images/logoople.jpg') }}) no-repeat left top; width: 980px; font-size: 14px;}


      table td.texto {font-weight: normal !important;  text-align: center;  font-weight: 400; height: 65px; background: #ffffff; width: 1000px; font-size: 14px;}

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
        <td class="textologo tablamargen">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Cédula de Indicadores Aplicados <br> Indicadores y Metas del Programa Operativo Anual 2019 </td>
      </tr>
    </table>

    <table>
      <tr class="rubro">
        <td width="20%">Área Responsable</td>
        <td class="texto">{{ $indicadores['nombrearea'] }}</td>
      </tr>
    </table>

    <table>
      <tr class="rubro">
        <td>Avance de Indicadores</td>        
      </tr>
    </table>

    <table>
      <tr class="rubro">
        <td width="20%" rowspan="2">Programa Presupuestario</td>        
        <td class="texto">01. Desarrollo y Fortalecimiento Institucional</td>        
        <td class="texto">02. Proceso Electoral</td>        
        <td class="texto">03. Cartera de Proyectos</td>
        <td class="texto">04. Prerrogativas y Partidos Políticos</td>
      </tr>
      <tr class="rubro">        
        <td class="texto">{{ $indicadores['prog1'] }}</td>        
        <td class="texto">{{ $indicadores['prog2'] }}</td>        
        <td class="texto">{{ $indicadores['prog3'] }}</td>
        <td class="texto">{{ $indicadores['prog4'] }}</td>
      </tr>

    </table>

    <table>
      <tr class="rubro">
        <td width="20%">Objetivo del Indicador</td>        
        <td class="texto">{{ $indicadores['objetivoindicador'] }}</td>        
      </tr>
    </table>

    <table>
      <tr class="rubro">
        <td width="20%">Periodo de Cumplimiento</td>        
        <td class="texto">{{ $indicadores['abreviaturaperiodocump'] }}</td>        
        <td width="20%" class="rubro">Periodo de Evaluación</td>        
        <td class="texto">{{ $indicadores['mes'] }}</td>
      </tr>
    </table>

    <table>
      <tr class="rubro">
        <td>Clave del Indicador</td>        
        <td>Nombre del Indicador</td>
        <td>Frecuencia</td>
        <td>Variables</td>
        <td>Meta</td>
        <td>Realizado vs Programado</td>
        <td>Resultado</td>
        <td>Variación</td>
      </tr>       
    </table>

    <table>
      <tr>
        <td class="info" rowspan="2"  height="70"></td>        
        <td class="info" rowspan="2">{{ $indicadores['nombreindicador'] }}</td>
        <td class="info" rowspan="2">{{ $indicadores['frecuencia'] }}</td>
        <td class="info">{{ $indicadores['variable1'] }}</td>
        <td class="info" rowspan="2">{{ $indicadores['meta'] }}</td>
        <td class="info">{{ $indicadores['realizado'] }}</td>
        <td class="info" rowspan="2">{{ $indicadores['resultado'] }} %</td>
        <td class="info" rowspan="2">{{ $indicadores['variacion'] }} %</td>
      </tr>      
      <tr>        
        <td class="info">{{ $indicadores['variable2'] }}</td>        
        <td class="info">{{ $indicadores['meta'] }}</td>
      </tr>          
    </table>

    <table>
      <tr class="rubro">
        <td>Observaciones</td>
      </tr>
    </table>

    <table>
      <tr>        
        <td class="infoobserva" height="100">{{ $indicadores['observaciones'] }}<</td>
      </tr>          
    </table>

    <table>
      <tr class="rubro">
        <td>Responsable de la Información</td>
      </tr>
    </table>

    <table>
      <tr class="rubro">
        <td>Nombre, cargo y firma del Titular de la Unidad Responsable</td>
      </tr>
    </table>

    <table>
      <tr>        
        <td class="info" height="80"><br>{{ $indicadores['nombretitular'] }}<br>{{ $indicadores['cargo'] }}</td>
      </tr>          
    </table>


  </body>
</html>
