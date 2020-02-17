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
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Área</label>
                <select id="acronimoentre" class="form-control" required>
                  <!--option value="CG">CG</option>
                  <option value="SE">SE</option>
                  <option value="DEPPP">DEPPP</option>
                  <option value="DEOE">DEOE</option>
                  <option value="DECEYEC">DECEYEC</option>
                  <option value="DEA">DEA</option>
                  <option value="DEAJ">DEAJ</option>
                  <option value="UF">UF</option>
                  <option value="UTCS">UTCS</option>
                  <option value="UTCFD">UTCFD</option>
                  <option value="UTSI">UTSI</option>
                  <option value="UTP">UTP</option>
                  <option value="UTOE">UTOE</option>
                  <option value="UTS">UTS</option>
                  <option value="UTVODES">UTVODES</option>
                  <option value="UTIGI">UTIGI</option>
                  <option value="UTT">UTT</option>
                  <option value="CONTRALORIA">CONTRALORIA</option-->
                  <option value="CG">Consejo General</option>
                  <option value="SE">Secretaria Ejecutiva</option>
                  <option value="DEPPP">Dirección Ejecutiva Prerrogativas y Partidos Políticos</option>
                  <option value="DEOE">Dirección Ejecutiva de Organización Electoral</option>
                  <option value="DECEYEC">Dirección Ejecutiva de Capacitación Electoral y Educación Cívica</option>
                  <option value="DEA">Dirección Ejecutiva de Administración</option>
                  <option value="DEAJ">Dirección Ejecutiva de Asuntos Jurídicos</option>
                  <option value="UF">Unidad de Fiscalización</option>
                  <option value="UTCS">Unidad Técnica de Comunicación Social</option>
                  <option value="UTCFD">Unidad Técnica del Centro de Formación y Desarrollo</option>
                  <option value="UTSI">Unidad Técnica de Servicios Informáticos</option>
                  <option value="UTP">Unidad Técnica de Planeación</option>
                  <option value="UTOE">Unidad Técnica de Oficialía Electoral</option>
                  <option value="UTS">Unidad Técnica de Secretariado</option>
                  <option value="UTVODES">Unidad Técnica de Vinculación con Órganos Desconcentrados y Organizaciones de la Sociedad Civil</option>
                  <option value="UTIGI">Unidad Técnica de Igualdad de Género e Inclusión</option>
                  <option value="UTT">Unidad Técnica de Transparencia</option>
                  <option value="CONTRALORIA">Órgano Interno de Control</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Fecha de inicio</label>
                <input type="date" class="form-control" id="datep" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Fecha de termino</label>
                <input type="date" class="form-control" id="dates" required disabled="true">
              </div>
              <button  id="buscarEntre" type="button" class="btn btn-primary" disabled="true">Buscar</button>
              <button id="buscarMes" type="button" class="btn btn-primary hidden">Buscar</button>
            </div>


            <h5>Reporte por actividad</h5>
            <hr>
            <table id="resultEntre">
              <tr>
                <th>Área</th>
                <th>Clave del Programa</th>
                <th>Actividad</th>
                <th>Fecha de modificación</th>
              </tr>
              
            </table>

        </div>
      </section>




@endsection