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

            <h5>Personalizar Búsqueda</h5>
            <div class="form-row" style="margin: 1em 0 3em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
              <div class="col-md-12 mb-3">
                <label for="validationCustom02">Área</label>
                <select id="idAreaObs" class="form-control" required>
                  <option value="1">Consejo General</option>
                  <option value="2">Secretaria Ejecutiva</option>
                  <option value="3">Dirección Ejecutiva Prerrogativas y Partidos Políticos</option>
                  <option value="4">Dirección Ejecutiva de Organización Electoral</option>
                  <option value="5">Dirección Ejecutiva de Capacitación Electoral y Educación Cívica</option>
                  <option value="6">Dirección Ejecutiva de Administración</option>
                  <option value="7">Dirección Ejecutiva de Asuntos Jurídicos</option>
                  <option value="8">Unidad de Fiscalización</option>
                  <option value="9">Unidad Técnica de Comunicación Social</option>
                  <option value="10">Unidad Técnica del Centro de Formación y Desarrollo</option>
                  <option value="11">Unidad Técnica de Servicios Informáticos</option>
                  <option value="12">Unidad Técnica de Planeación</option>
                  <option value="13">Unidad Técnica de Oficialía Electoral</option>
                  <option value="14">Unidad Técnica de Secretariado</option>
                  <option value="15">Unidad Técnica de Vinculación con Órganos Desconcentrados y Organizaciones de la Sociedad Civil</option>
                  <option value="16">Unidad Técnica de Igualdad de Género e Inclusión</option>
                  <option value="17">Unidad Técnica de Transparencia</option>
                  <option value="18">Órgano Interno de Control</option>
                </select>
              </div>

              <button  id="buscarOBS" type="button" class="btn btn-primary">Buscar</button>
            </div>


            <h5>Reporte de observaciones</h5>
            <hr>
            <table id="resultObs">
              <tr>
                <th>Fecha</th>
                <th>Area</th>
                <th>Clave</th>
                <th>Observación</th>
                <th style="text-align: center;">Atendido</th>
                <th style="text-align: center;">Validado</th>
              </tr>
               @foreach( $obss as $obs )
                  <tr>
                    <td>{{$obs->obs_date}}</td>
                    <td>{{$obs->usu_acronimo}}</td>
                    <td>{{$obs->obs_clave}} Act.- {{$obs->numactividad}}</td>
                    <td style="width: 55%">{{$obs->obs_desc}}</td>
                    
                      @switch($obs->obs_status)
                          @case('0')
                              <td style="text-align: center; color: #e082a2;font-size: 23px;">
                                <i class="fa fa-cogs" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Por atender"></i>
                              </th>
                              <td style="text-align: center; color: #e082a2;font-size: 23px;">
                                <i class="fa fa-paper-plane" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Enviado"></i>
                              </td>
                              @break
                          @case('1')
                              <td style="text-align: center; color: #ffa000;font-size: 23px;">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: {{$obs->obs_date_dos}}"></i>
                              </th>
                              <td style="text-align: center; color: #ffa000;font-size: 23px;">
                                <i class="fa fa-square-o" aria-hidden="true" style="cursor: pointer;" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Por validar"></i>
                              </td>
                              @break
                          @case('2')
                              <td style="text-align: center; color: #9e9d24;font-size: 23px;">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: {{$obs->obs_date_dos}}"></i>
                              </th>
                              <td style="text-align: center; color: #9e9d24;font-size: 23px;">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Validado: {{$obs->obs_date_tres}}"></i>
                              </td>
                              @break
                          @case('3')
                              <td style="text-align: center; color: #9e9d24;font-size: 23px;">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: {{$obs->obs_date_dos}}"></i>
                              </th>
                              <td style="text-align: center; color: #ff1744;font-size: 23px;">
                                <i class="fa fa-times-circle" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="No validada: {{$obs->obs_date_tres}}"></i>
                              </td>
                              @break
                          @case('4')
                              <td style="text-align: center; color: #9e9d24;font-size: 23px;">
                                <i class="fa fa-check-square-o" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: {{$obs->obs_date_dos}}"></i>
                              </th>
                              <td style="text-align: center; color: #ff1744;font-size: 23px;">
                                <i class="fa fa-times-circle" aria-hidden="true" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="No validada: {{$obs->obs_date_tres}}"></i>
                              </td>
                              @break
                          @default
                              <td></td><td></th>
                      @endswitch
                   
                  </tr>
                @endforeach
            </table>

        </div>
      </section>




@endsection