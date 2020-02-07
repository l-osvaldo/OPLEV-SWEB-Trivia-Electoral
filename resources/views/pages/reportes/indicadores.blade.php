<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CÉDULA DE INDICADORES 2020</title>


    <style type="text/css">

    table {
      border-collapse: collapse;font-size: 14px;
    }

    th, td {
      padding: 3px;text-align: center;padding: 10px 0;border: 1px solid #000;
    }    
    .gris{background: #ccc;font-weight: bold;}


    </style>


  </head>
  <body>

    <!--table>
      <tr>
        <td class="textologo tablamargen">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Cédula de Indicadores Aplicados <br> Indicadores y Metas del Programa Operativo Anual 2019 </td>
      </tr>
    </table-->

    <table style="width: 99.98%;">
      <tr class="rubro">
        <td colspan="1" class="gris">Área Responsable</td>
        <td colspan="7">{{ $indicadores['nombrearea'] }}</td>
      </tr>

      <tr>
        <td colspan="8" class="gris">Avance de Indicadores</td>        
      </tr>
   
      <tr>
        <td rowspan="2" class="gris" width="20%">Programa Presupuestario</td>        
        <td colspan="2" width="20%">01. Desarrollo y Fortalecimiento Institucional</td>        
        <td colspan="2" width="20%">02. Proceso Electoral</td>        
        <td colspan="2" width="20%">03. Cartera de Proyectos</td>
        <td colspan="2" width="20%">04. Prerrogativas y Partidos Políticos</td>
      </tr>
      <tr>        
        <td colspan="2">{{ $indicadores['prog1'] }}</td>        
        <td colspan="2">{{ $indicadores['prog2'] }}</td>        
        <td colspan="2">{{ $indicadores['prog3'] }}</td>
        <td colspan="2">{{ $indicadores['prog4'] }}</td>
      </tr>

    
      <tr>
        <td colspan="1" class="gris">Objetivo del Indicador</td>        
        <td colspan="8">{{ $indicadores['objetivoindicador'] }}</td>        
      </tr>
    
      <tr>
        <td colspan="1" class="gris">Periodo de Cumplimiento</td>        
        <td colspan="3">{{ $indicadores['abreviaturaperiodocump'] }}</td>        
        <td colspan="3" class="gris">Periodo de Evaluación</td>        
        <td colspan="2">{{ $indicadores['mes'] }}</td>
      </tr>
    </table>

    <table style="margin-top: -1px;width: 100%;">
      <tr>
        <td class="gris" width="12.5%">Clave del Indicador</td>        
        <td class="gris" width="12.5%">Nombre del Indicador</td>
        <td class="gris" width="12.5%">Frecuencia</td>
        <td class="gris" width="12.5%">Variables</td>
        <td class="gris" width="12.5%">Meta</td>
        <td class="gris" width="12.5%">Realizado vs Programado</td>
        <td class="gris" width="12.5%">Resultado (%)</td>
        <td class="gris" width="12.5%">Variación (%)</td>
      </tr>       
    
      <tr>
        <td rowspan="2">{{ $indicadores['identificadorindicador'] }}</td>        
        <td rowspan="2">{{ $indicadores['nombreindicador'] }}</td>
        <td rowspan="2">{{ $indicadores['frecuencia'] }}</td>
        <td>{{ $indicadores['variable1'] }}</td>
        <td rowspan="2">{{ $indicadores['meta'] }}</td>
        <td>{{ $indicadores['realizado'] }}</td>
        <td rowspan="2">{{ $indicadores['resultado'] }} </td>
        <td rowspan="2">{{ $indicadores['variacion'] }} </td>
      </tr>      
      <tr>        
        <td>{{ $indicadores['variable2'] }}</td>        
        <td>{{ $indicadores['meta'] }}</td>
      </tr>

      </table>

    <table style="margin-top: -1px;width: 100%;height:auto;">          
   
      <tr>
        <td colspan="8" class="gris">Observaciones</td>
      </tr>
    
      <tr>        
        <td colspan="5" ><div style="overflow:auto; height: 30px; min-height: 30px; height: auto !important;">{{ $indicadores['observaciones'] }}</div></td>
      </tr>          
    
      <tr>
        <td colspan="8" class="gris">Responsable de la Información</td>
      </tr>
    
      <tr>
        <td colspan="8" class="gris">Nombre, cargo y firma del Titular de la Unidad Responsable</td>
      </tr>
    
      <tr>        
        <td colspan="8" style="padding: 20px 0 30px 0;"><br>{{ $indicadores['nombretitular'] }}<br>{{ $indicadores['cargo'] }}</td>
      </tr>          
    </table>


  </body>
</html>
