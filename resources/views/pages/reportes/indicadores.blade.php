<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CÉDULA DE INDICADORES 2019</title>


    <style type="text/css">

    table {
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 3px;text-align: center;
    }    
    .gris{background: #e3e3e3;}


    </style>


  </head>
  <body>

    <!--table>
      <tr>
        <td class="textologo tablamargen">ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Cédula de Indicadores Aplicados <br> Indicadores y Metas del Programa Operativo Anual 2019 </td>
      </tr>
    </table-->

    <table>
      <tr class="rubro">
        <td colspan="1" class="gris">Área Responsable</td>
        <td colspan="7">{{ $indicadores['nombrearea'] }}</td>
      </tr>

      <tr>
        <td colspan="8" class="gris">Avance de Indicadores</td>        
      </tr>
   
      <tr>
        <td rowspan="2" class="gris">Programa Presupuestario</td>        
        <td colspan="2">01. Desarrollo y Fortalecimiento Institucional</td>        
        <td colspan="2">02. Proceso Electoral</td>        
        <td colspan="2">03. Cartera de Proyectos</td>
        <td colspan="2">04. Prerrogativas y Partidos Políticos</td>
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
        <td colspan="2">{{ $indicadores['abreviaturaperiodocump'] }}</td>        
        <td colspan="3" class="gris">Periodo de Evaluación</td>        
        <td colspan="2">{{ $indicadores['mes'] }}</td>
      </tr>
    
      <tr>
        <td class="gris">Clave del Indicador</td>        
        <td class="gris">Nombre del Indicador</td>
        <td class="gris">Frecuencia</td>
        <td class="gris">Variables</td>
        <td class="gris">Meta</td>
        <td class="gris">Realizado vs Programado</td>
        <td class="gris">Resultado (%)</td>
        <td class="gris">Variación (%)</td>
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
   
      <tr>
        <td colspan="8" class="gris">Observaciones</td>
      </tr>
    
      <tr>        
        <td colspan="8">{{ $indicadores['observaciones'] }}</td>
      </tr>          
    
      <tr>
        <td colspan="8" class="gris">Responsable de la Información</td>
      </tr>
    
      <tr>
        <td colspan="8" class="gris">Nombre, cargo y firma del Titular de la Unidad Responsable</td>
      </tr>
    
      <tr>        
        <td colspan="8" style="padding: 10px 0 10px 0;"><br>{{ $indicadores['nombretitular'] }}<br>{{ $indicadores['cargo'] }}</td>
      </tr>          
    </table>


  </body>
</html>
