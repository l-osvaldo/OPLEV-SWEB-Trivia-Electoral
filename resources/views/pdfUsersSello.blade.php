<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lista de Usuarios - PDF</title>
</head>
<body>
<div class="container">
	<table class="table table-bordered">
		<thead>
			<th>Nombre</th>
			<th>Usuario</th>
		</thead>
		<tbody>
			@foreach ($users as $key => $value)
			<tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->username }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div style="page-break-after:always;"></div>
  <div style="width:100%">
    <!--Inicio del sello digital-->
    <div><h1>SELLO DIGITAL GENERADO POR EL OPLE</h1></div>
    <div style="text-align: left;"><strong>REVISADO POR: </strong>NOMBRE DEL ENCARGADO</div>
    <div style="text-align: left;"><strong>FECHA Y HORA DE EMISIÓN: </strong> {{ $dataHora }}</div>
    <div style="text-align: left;"><strong>IDENTIFICADOR ÚNICO DEL EMISOR: </strong> {{ $identificador }}</div>
    <div style="text-align: left; overflow: hidden;text-overflow: ellipsis;"><strong>SELLO DIGITAL DEL ÁREA: </strong> {{ $selloDigital }}</div>
    <div style="text-align: left;"><strong>FOLIO INTERNO: </strong>{{$rest1.'-'.$rest2.'-'.$rest3.'-'.$rest4.'-'.$rest5}}</div>
    <div colspan="2" style="text-align: left;"><strong>Haz clic en el siguiente link para revisar la integridad de este documento: </strong><br><span style="color: blue;">http://dashboardclon.test/verificador</span></div>
  </div>
</body>
</html>
