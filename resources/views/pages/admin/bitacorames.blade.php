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
.iconCheck{font-weight: lighter;color: #EA0D94;}
</style>

        <section class="content" style="padding-top: 2em;">
          <div class="container">

            <h5>Personalizar Busqueda</h5>
            <div class="form-row" style="margin: 1em 0 3em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

              <div class="col-md-6 mb-3">
                <label for="validationCustom02">Área</label>
                <select class="form-control" required>
                  <option value="1">UTSI</option>
                  <option value="2">DEA</option>
                  <option value="3">Three</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Mes</label>
                <select class="form-control" required>
                  <option value="1">ENERO</option>
                  <option value="2">FEBRERO</option>
                </select>
              </div>


              <button type="button" class="btn btn-primary" disabled="">Buscar</button>
            </div>


            <h5>Reporte termino mes</h5>
            <table>
              <tr>
                <th>Unidad</th>
                <th>Acronimo</th>
                <th>Programa</th>
                <th>Actividad</th>
                <th>Fecha</th>
              </tr>
                @foreach( $alertasfin as $alertafin )
                  <tr>
                    <td>{{$alertafin->ale_actividad}}</td>
                    <td>{{$alertafin->ale_acronimo}}</td>
                    <td>---</td>
                    <td>---</td>
                    <td>{{ date('d/m/Y', strtotime($alertafin->created_at)) }}</th>
                  </tr>
                @endforeach
            </table>

            <h5>Reporte general</h5>
            <table>
              <tr>
                <th>Unidad</th>
                <th>Enero</th>
                <th>Febrero</th>
                <th>Marzo</th>
                <th>Abril</th>
                <th>Mayo</th>
                <th>Junio</th>
                <th>Julio</th>
                <th>Agosto</th>
                <th>Septiembre</th>
                <th>Octubre</th>
                <th>Nobiembre</th>
                <th>Diciembre</th>
              </tr>
                  <tr>
                    <td>UTSI</td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                  </tr>
                  <tr>
                    <td>DEAJ</td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                  </tr>
                  <tr>
                    <td>SE</td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                  </tr>
                  <tr>
                    <td>UTOE</td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></td>
                    <td><i class="fa fa-check iconCheck" aria-hidden="true"></i></th>
                  </tr>
            </table>


        </div>
      </section>




@endsection