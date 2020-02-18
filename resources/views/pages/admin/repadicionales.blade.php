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
              <div class="col-md-8 mb-8">
                <label for="validationCustom02">Área</label>
                <select id="unidadAdicional" class="form-control">
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

              <div class="col-md-4 mb-4">
                <label for="validationCustom02">Mes</label>
                <select id="mesAdicionales" class="form-control">
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre/option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
              </div>
              
              <button  id="buscaAdicionales" type="button" class="btn btn-primary">Buscar</button>
            </div>


            <h5>Reporte Adicionales<span id="nameUni"></span></h5>
            <hr>
            <table id="resultAdicionales"></table>


            <form method="get" action="{{ route('reportes.adicionales') }}" target="_blank">
              {{ csrf_field() }}
              <input type="hidden" id="datauni" name="datauni" value="">
              <input type="hidden" id="idmesreportar" name="idmesreportar" value="">                      
              <button id="pdfAdicionalesGral" type="submit" class="btn btn-primary hidden" data-uni="0" data-mes="0" >Generar PDF</button>
            </form>

        </div>
      </section>




@endsection