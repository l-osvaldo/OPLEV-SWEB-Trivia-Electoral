<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>POA 2020</title>
  
</head>
<body>
<style type="text/css">
table, th, td {
  border: 1px solid black;font-size: small;border-collapse: collapse;font-size: 16px;padding: 5px 0;
}
</style>


<div class="col-md-12">
  <table style="width:1000px;">
  <tr>
    <th colspan="8" style="background-color:#fce4ec; text-align: center;font-size: 20px;">Cédula Descriptiva de Indicadores 2020</th>
  </tr>
  <tr>
    <th colspan="8" style="height: 20px;background-color: #fff;"></th>
  </tr>
  <tr>
    <th colspan="1" style="height: 20px;background-color: #fce4ec;text-align: center;width: 20%;">Unidad responsable</th>
    <th colspan="7" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->area}}</th>
  </tr>
  <tr>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;width: 50%;">Identificador de indicador</th>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Nombre del indicador</th>
  </tr>
  <tr>
    <th colspan="4" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->identificadorindicador}}</th>
    <th colspan="4" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->nombreindicador}}</th>
  </tr>
  <tr>
    <th colspan="3" style="height: 20px;background-color: #fce4ec;text-align: center;">Objetivo</th>
    <th colspan="5" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->objetivoindicador}}</th>
  </tr>
  <tr>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Meta</th>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Periodo de cumplimiento</th>
  </tr>
  <tr>
    <th colspan="4" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->metaindicador}}%</th>
    <th colspan="4" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->periodocumplimiento}}</th>
  </tr>
  <tr>
    <th colspan="3" rowspan="2" style="height: 20px;background-color: #fce4ec;text-align: center;width: 20%;">Programa<br>Presupuestario</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">01. Desarrollo y Fortalecimiento Institucional.</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">02. Proceso Electora</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">03. Cartera de Proyectos</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">04. Prerrogativas y Partidos Políticos</th>
  </tr>
  <tr>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->idprograma1 == 1 ? 'X' : '' }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->idprograma1 == 2 ? 'X' : '' }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->idprograma1 == 3 ? 'X' : '' }}</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->idprograma1 == 4 ? 'X' : '' }}</th>
  </tr>
  <tr>
    <th colspan="3" style="height: 20px;background-color: #fce4ec;text-align: center;width: 30%;">Definición</th>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Dimensión a medir</th>
    <th style="height: 20px;background-color: #fce4ec;text-align: center;">Unidad de medida</th>
  </tr>
   <tr>
    <th colspan="3" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->definicionindicador}}</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">Eficacia {{ $indicadores->dimensionmedir == 1 ? '(X)' : '' }}</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">Eficiencia {{ $indicadores->dimensionmedir == 2 ? '(X)' : '' }}</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">Economía {{ $indicadores->dimensionmedir == 3 ? '(X)' : '' }}</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">Calidad {{ $indicadores->dimensionmedir == 4 ? '(X)' : '' }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->unidadmedida}}</th>
  </tr>
  <tr>
    <th colspan="8" style="background-color:#fce4ec; text-align: center;">Método de Cálculo </th>
  </tr>
  <tr>
    <th colspan="8" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->metodocalculo}}</th>
  </tr>
  <tr>
    <th colspan="3" style="height: 20px;background-color: #fce4ec;text-align: center;">Variable</th>
    <th colspan="3" style="height: 20px;background-color: #fce4ec;text-align: center;">Descripción de la variable</th>
    <th colspan="2" style="height: 20px;background-color: #fce4ec;text-align: center;">Fuentes de Información</th>
  </tr>
  <tr>
    <th colspan="3" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->variable1}}</th>
    <th colspan="3" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->descripcionvariable1}}</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->fuentesinfovariable1}}</th>
  </tr>
  <tr>
    <th colspan="3" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->variable2}}</th>
    <th colspan="3" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->descripcionvariable2}}</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{$indicadores->fuentesinfovariable2}}</th>
  </tr>
  <tr>
    <th colspan="8" style="background-color:#fce4ec; text-align: center;">Frecuencia de medición</th>
  </tr>
  <tr>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">Mensual</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">Trimestral</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">Semestral</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">Anual</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">Otro (especificar)</th>
  </tr>
  <tr>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->frecuenciamedicion == 1 ? 'X' : '' }}</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->frecuenciamedicion == 2 ? 'X' : '' }}</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->frecuenciamedicion == 3 ? 'X' : '' }}</th>
    <th colspan="1" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->frecuenciamedicion == 4 ? 'X' : '' }}</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->frecuenciamedicion == 5 ? $indicadores->frecuenciaespecifique : '' }}</th>
  </tr>
  <tr>
    <th colspan="8" style="background-color:#fce4ec; text-align: center;">Fundamento Jurídico</th>
  </tr>
  <tr>
    <th colspan="8" style="background-color:#fff; text-align: center;">{{ $indicadores->fundamentojuridico }}</th>
  </tr>
  <tr>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Línea Base</th>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Comportamiento del indicador hacia la meta</th>
  </tr>
  <tr>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;width: 10%;">Valor</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">Año</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">Ascendente</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">Descendente</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">Regular</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">Nominal</th>
  </tr>
  <tr>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;width: 10%;">{{ $indicadores->lineabasev }}</th>
    <th colspan="2" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->lineabasea }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->comportamientoindicador == 1 ? 'X' : '' }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->comportamientoindicador == 2 ? 'X' : '' }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->comportamientoindicador == 3 ? 'X' : '' }}</th>
    <th style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->comportamientoindicador == 4 ? 'X' : '' }}</th>
  </tr>
  <tr>
    <th colspan="4" style="height: 20px;background-color: #fce4ec;text-align: center;">Nombre, cargo y firma del titular de la Unidad Responsable</th>
    <th colspan="4" style="height: 20px;background-color: #fff;text-align: center;">{{ $indicadores->nombretitular }}<br>{{ $indicadores->cargo }}</th>
  </tr>
</table>





</body>
</html>






