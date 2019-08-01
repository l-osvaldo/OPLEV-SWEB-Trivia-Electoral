@extends('layouts.app')

@section('content')

<style type="text/css">
table {
  border-collapse: collapse;
  width: 100%;
  margin: 2em 0;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #fff}

th {
  background-color: #fce4ec;
  color: #000;
}
</style>

        <section class="content" style="padding-top: 2em;">
          <div class="container">

            <h5>Personalizar Busqueda</h5>
            <div class="form-row" style="margin: 1em 0 3em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Área</label>
                <select class="form-control" required>
                  <option value="1">UTSI</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Fecha de inicio</label>
                <input type="date" class="form-control" id="validationDefault04" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Fecha de termino</label>
                <input type="date" class="form-control" id="validationDefault04" required>
              </div>
              <button type="button" class="btn btn-primary" disabled="">Buscar</button>
            </div>


            <h5>Reporte por actividad</h5>
            <table>
              <tr>
                <th>Unidad</th>
                <th>Acronimo</th>
                <th>Programa</th>
                <th>Actividad</th>
                <th>Fecha</th>
              </tr>
               @foreach( $alertas as $alerta )
                  <tr>
                    <td class="tiempo{{ $alerta->ale_tiempo }}">{{$alerta->ale_actividad}}</td>
                    <td>{{$alerta->ale_acronimo}}</td>
                    <td>{{$alerta->ale_id_programa}}</td>
                    <td>{{$alerta->ale_num_actividad}}</td>
                    <td>{{ date('d/m/Y', strtotime($alerta->created_at)) }}</th>
                  </tr>
                @endforeach
            </table>

        </div>
      </section>




@endsection