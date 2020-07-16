<!DOCTYPE html>
<html>
<head>
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
</body>
</html>
