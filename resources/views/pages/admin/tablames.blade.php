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
.tdTabla{border-left: 1px solid #eceff1;}
</style>

        <section class="content" style="padding-top: 2em;">
          <div class="container">

            <!--h5>Personalizar Busqueda</h5>
            <div class="form-row" style="margin: 1em 0 3em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">

              <div class="col-md-6 mb-3">
                <label for="validationCustom02">Área</label>
                <select id="acronimo" class="form-control" required>
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

              <div class="col-md-6 mb-3">
                <label for="validationCustom01">Mes</label>
                <select id="mesbusqueda" class="form-control" required>
                  <option value="ENE">ENERO</option>
                  <option value="FEB">FEBRERO</option>
                  <option value="MAR">MARZO</option>
                  <option value="ABR">ABRIL</option>
                  <option value="MAY">MAYO</option>
                  <option value="JUN">JUNIO</option>
                  <option value="JUL">JULIO</option>
                  <option value="AGO">AGOSTO</option>
                  <option value="SEP">SEPTIEMBRE</option>
                  <option value="OCT">OCTUBRE</option>
                  <option value="NOV">NOVIEMBRE</option>
                  <option value="DIC">DICIEMBRE</option>
                </select>
              </div>


              <button id="buscarMes" type="button" class="btn btn-primary">Buscar</button>
              <button id="buscarEntre" type="button" class="btn btn-primary hidden">Buscar</button>
            </div>


            <h5>Reporte termino mes</h5>
            <table id="resultMes">
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
                    <td>{{ date('d/m/Y', strtotime($alertafin->ale_date)) }}</th>
                  </tr>
                @endforeach
            </table>


            <hr-->

            <h5>Notificación mensual</h5>
            <table>
              <tr>
                <th>Unidad</th>
                <th>Ene</th>
                <th>Feb</th>
                <th>Mar</th>
                <th>Abr</th>
                <th>May</th>
                <th>Jun</th>
                <th>Jul</th>
                <th>Ago</th>
                <th>Sep</th>
                <th>Oct</th>
                <th>Nov</th>
                <th>Dic</th>
              </tr>
                  <tr>
                    <td>Consejo General</td>
                    <td class="tdTabla" id="eneCG"></td>
                    <td class="tdTabla" id="febCG"></td>
                    <td class="tdTabla" id="marCG"></td>
                    <td class="tdTabla" id="abrCG"></th>
                    <td class="tdTabla" id="mayCG"></td>
                    <td class="tdTabla" id="junCG"></td>
                    <td class="tdTabla" id="julCG"></td>
                    <td class="tdTabla" id="agoCG"></th>
                    <td class="tdTabla" id="sepCG"></td>
                    <td class="tdTabla" id="octCG"></td>
                    <td class="tdTabla" id="novCG"></td>
                    <td class="tdTabla" id="dicCG"></th>
                  </tr>
                  <tr>
                    <td>Secretaria Ejecutiva</td>
                    <td class="tdTabla" id="eneSE"></td>
                    <td class="tdTabla" id="febSE"></td>
                    <td class="tdTabla" id="marSE"></td>
                    <td class="tdTabla" id="abrSE"></th>
                    <td class="tdTabla" id="maySE"></td>
                    <td class="tdTabla" id="junSE"></td>
                    <td class="tdTabla" id="julSE"></td>
                    <td class="tdTabla" id="agoSE"></th>
                    <td class="tdTabla" id="sepSE"></td>
                    <td class="tdTabla" id="octSE"></td>
                    <td class="tdTabla" id="novSE"></td>
                    <td class="tdTabla" id="dicSE"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva Prerrogativas y Partidos Políticos</td>
                    <td class="tdTabla" id="eneDEPPP"></td>
                    <td class="tdTabla" id="febDEPPP"></td>
                    <td class="tdTabla" id="marDEPPP"></td>
                    <td class="tdTabla" id="abrDEPPP"></th>
                    <td class="tdTabla" id="mayDEPPP"></td>
                    <td class="tdTabla" id="junDEPPP"></td>
                    <td class="tdTabla" id="julDEPPP"></td>
                    <td class="tdTabla" id="agoDEPPP"></th>
                    <td class="tdTabla" id="sepDEPPP"></td>
                    <td class="tdTabla" id="octDEPPP"></td>
                    <td class="tdTabla" id="novDEPPP"></td>
                    <td class="tdTabla" id="dicDEPPP"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Organización Electoral</td>
                    <td class="tdTabla" id="eneDEODE"></td>
                    <td class="tdTabla" id="febDEODE"></td>
                    <td class="tdTabla" id="marDEODE"></td>
                    <td class="tdTabla" id="abrDEODE"></th>
                    <td class="tdTabla" id="mayDEODE"></td>
                    <td class="tdTabla" id="junDEODE"></td>
                    <td class="tdTabla" id="julDEODE"></td>
                    <td class="tdTabla" id="agoDEODE"></th>
                    <td class="tdTabla" id="sepDEODE"></td>
                    <td class="tdTabla" id="octDEODE"></td>
                    <td class="tdTabla" id="novDEODE"></td>
                    <td class="tdTabla" id="dicDEODE"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Capacitación Electoral y Educación Cívica</td>
                    <td class="tdTabla" id="eneDECEYEC"></td>
                    <td class="tdTabla" id="febDECEYEC"></td>
                    <td class="tdTabla" id="marDECEYEC"></td>
                    <td class="tdTabla" id="abrDECEYEC"></th>
                    <td class="tdTabla" id="mayDECEYEC"></td>
                    <td class="tdTabla" id="junDECEYEC"></td>
                    <td class="tdTabla" id="julDECEYEC"></td>
                    <td class="tdTabla" id="agoDECEYEC"></th>
                    <td class="tdTabla" id="sepDECEYEC"></td>
                    <td class="tdTabla" id="octDECEYEC"></td>
                    <td class="tdTabla" id="novDECEYEC"></td>
                    <td class="tdTabla" id="dicDECEYEC"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Administración</td>
                    <td class="tdTabla" id="eneDEA"></td>
                    <td class="tdTabla" id="febDEA"></td>
                    <td class="tdTabla" id="marDEA"></td>
                    <td class="tdTabla" id="abrDEA"></th>
                    <td class="tdTabla" id="mayDEA"></td>
                    <td class="tdTabla" id="junDEA"></td>
                    <td class="tdTabla" id="julDEA"></td>
                    <td class="tdTabla" id="agoDEA"></th>
                    <td class="tdTabla" id="sepDEA"></td>
                    <td class="tdTabla" id="octDEA"></td>
                    <td class="tdTabla" id="novDEA"></td>
                    <td class="tdTabla" id="dicDEA"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Asuntos Jurídicos</td>
                    <td class="tdTabla" id="eneDEAJ"></td>
                    <td class="tdTabla" id="febDEAJ"></td>
                    <td class="tdTabla" id="marDEAJ"></td>
                    <td class="tdTabla" id="abrDEAJ"></th>
                    <td class="tdTabla" id="mayDEAJ"></td>
                    <td class="tdTabla" id="junDEAJ"></td>
                    <td class="tdTabla" id="julDEAJ"></td>
                    <td class="tdTabla" id="agoDEAJ"></th>
                    <td class="tdTabla" id="sepDEAJ"></td>
                    <td class="tdTabla" id="octDEAJ"></td>
                    <td class="tdTabla" id="novDEAJ"></td>
                    <td class="tdTabla" id="dicDEAJ"></th>
                  </tr>
                  <tr>
                    <td>Unidad de Fiscalización</td>
                    <td class="tdTabla" id="eneUF"></td>
                    <td class="tdTabla" id="febUF"></td>
                    <td class="tdTabla" id="marUF"></td>
                    <td class="tdTabla" id="abrUF"></th>
                    <td class="tdTabla" id="mayUF"></td>
                    <td class="tdTabla" id="junUF"></td>
                    <td class="tdTabla" id="julUF"></td>
                    <td class="tdTabla" id="agoUF"></th>
                    <td class="tdTabla" id="sepUF"></td>
                    <td class="tdTabla" id="octUF"></td>
                    <td class="tdTabla" id="novUF"></td>
                    <td class="tdTabla" id="dicUF"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Comunicación Social</td>
                    <td class="tdTabla" id="eneUTCS"></td>
                    <td class="tdTabla" id="febUTCS"></td>
                    <td class="tdTabla" id="marUTCS"></td>
                    <td class="tdTabla" id="abrUTCS"></th>
                    <td class="tdTabla" id="mayUTCS"></td>
                    <td class="tdTabla" id="junUTCS"></td>
                    <td class="tdTabla" id="julUTCS"></td>
                    <td class="tdTabla" id="agoUTCS"></th>
                    <td class="tdTabla" id="sepUTCS"></td>
                    <td class="tdTabla" id="octUTCS"></td>
                    <td class="tdTabla" id="novUTCS"></td>
                    <td class="tdTabla" id="dicUTCS"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica del Centro de Formación y Desarrollo</td>
                    <td class="tdTabla" id="eneUTCFD"></td>
                    <td class="tdTabla" id="febUTCFD"></td>
                    <td class="tdTabla" id="marUTCFD"></td>
                    <td class="tdTabla" id="abrUTCFD"></th>
                    <td class="tdTabla" id="mayUTCFD"></td>
                    <td class="tdTabla" id="junUTCFD"></td>
                    <td class="tdTabla" id="julUTCFD"></td>
                    <td class="tdTabla" id="agoUTCFD"></th>
                    <td class="tdTabla" id="sepUTCFD"></td>
                    <td class="tdTabla" id="octUTCFD"></td>
                    <td class="tdTabla" id="novUTCFD"></td>
                    <td class="tdTabla" id="dicUTCFD"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Servicios Informáticos</td>
                    <td class="tdTabla" id="eneUTSI"></td>
                    <td class="tdTabla" id="febUTSI"></td>
                    <td class="tdTabla" id="marUTSI"></td>
                    <td class="tdTabla" id="abrUTSI"></th>
                    <td class="tdTabla" id="mayUTSI"></td>
                    <td class="tdTabla" id="junUTSI"></td>
                    <td class="tdTabla" id="julUTSI"></td>
                    <td class="tdTabla" id="agoUTSI"></th>
                    <td class="tdTabla" id="sepUTSI"></td>
                    <td class="tdTabla" id="octUTSI"></td>
                    <td class="tdTabla" id="novUTSI"></td>
                    <td class="tdTabla" id="dicUTSI"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Planeación</td>
                    <td class="tdTabla" id="eneUTP"></td>
                    <td class="tdTabla" id="febUTP"></td>
                    <td class="tdTabla" id="marUTP"></td>
                    <td class="tdTabla" id="abrUTP"></th>
                    <td class="tdTabla" id="mayUTP"></td>
                    <td class="tdTabla" id="junUTP"></td>
                    <td class="tdTabla" id="julUTP"></td>
                    <td class="tdTabla" id="agoUTP"></th>
                    <td class="tdTabla" id="sepUTP"></td>
                    <td class="tdTabla" id="octUTP"></td>
                    <td class="tdTabla" id="novUTP"></td>
                    <td class="tdTabla" id="dicUTP"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Oficialía Electoral</td>
                    <td class="tdTabla" id="eneUTOE"></td>
                    <td class="tdTabla" id="febUTOE"></td>
                    <td class="tdTabla" id="marUTOE"></td>
                    <td class="tdTabla" id="abrUTOE"></th>
                    <td class="tdTabla" id="mayUTOE"></td>
                    <td class="tdTabla" id="junUTOE"></td>
                    <td class="tdTabla" id="julUTOE"></td>
                    <td class="tdTabla" id="agoUTOE"></th>
                    <td class="tdTabla" id="sepUTOE"></td>
                    <td class="tdTabla" id="octUTOE"></td>
                    <td class="tdTabla" id="novUTOE"></td>
                    <td class="tdTabla" id="dicUTOE"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Secretariado</td>
                    <td class="tdTabla" id="eneUTS"></td>
                    <td class="tdTabla" id="febUTS"></td>
                    <td class="tdTabla" id="marUTS"></td>
                    <td class="tdTabla" id="abrUTS"></th>
                    <td class="tdTabla" id="mayUTS"></td>
                    <td class="tdTabla" id="junUTS"></td>
                    <td class="tdTabla" id="julUTS"></td>
                    <td class="tdTabla" id="agoUTS"></th>
                    <td class="tdTabla" id="sepUTS"></td>
                    <td class="tdTabla" id="octUTS"></td>
                    <td class="tdTabla" id="novUTS"></td>
                    <td class="tdTabla" id="dicUTS"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Vinculación con Órganos Desconcentrados y Organizaciones de la Sociedad Civil</td>
                    <td class="tdTabla" id="eneUTVODES"></td>
                    <td class="tdTabla" id="febUTVODES"></td>
                    <td class="tdTabla" id="marUTVODES"></td>
                    <td class="tdTabla" id="abrUTVODES"></th>
                    <td class="tdTabla" id="mayUTVODES"></td>
                    <td class="tdTabla" id="junUTVODES"></td>
                    <td class="tdTabla" id="julUTVODES"></td>
                    <td class="tdTabla" id="agoUTVODES"></th>
                    <td class="tdTabla" id="sepUTVODES"></td>
                    <td class="tdTabla" id="octUTVODES"></td>
                    <td class="tdTabla" id="novUTVODES"></td>
                    <td class="tdTabla" id="dicUTVODES"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Igualdad de Género e Inclusión</td>
                    <td class="tdTabla" id="eneUTIGI"></td>
                    <td class="tdTabla" id="febUTIGI"></td>
                    <td class="tdTabla" id="marUTIGI"></td>
                    <td class="tdTabla" id="abrUTIGI"></th>
                    <td class="tdTabla" id="mayUTIGI"></td>
                    <td class="tdTabla" id="junUTIGI"></td>
                    <td class="tdTabla" id="julUTIGI"></td>
                    <td class="tdTabla" id="agoUTIGI"></th>
                    <td class="tdTabla" id="sepUTIGI"></td>
                    <td class="tdTabla" id="octUTIGI"></td>
                    <td class="tdTabla" id="novUTIGI"></td>
                    <td class="tdTabla" id="dicUTIGI"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Transparencia</td>
                    <td class="tdTabla" id="eneUTT"></td>
                    <td class="tdTabla" id="febUTT"></td>
                    <td class="tdTabla" id="marUTT"></td>
                    <td class="tdTabla" id="abrUTT"></th>
                    <td class="tdTabla" id="mayUTT"></td>
                    <td class="tdTabla" id="junUTT"></td>
                    <td class="tdTabla" id="julUTT"></td>
                    <td class="tdTabla" id="agoUTT"></th>
                    <td class="tdTabla" id="sepUTT"></td>
                    <td class="tdTabla" id="octUTT"></td>
                    <td class="tdTabla" id="novUTT"></td>
                    <td class="tdTabla" id="dicUTT"></th>
                  </tr>
                  <tr>
                    <td>Órgano Interno de Control</td>
                    <td class="tdTabla" id="eneCONTRALORIA"></td>
                    <td class="tdTabla" id="febCONTRALORIA"></td>
                    <td class="tdTabla" id="marCONTRALORIA"></td>
                    <td class="tdTabla" id="abrCONTRALORIA"></th>
                    <td class="tdTabla" id="mayCONTRALORIA"></td>
                    <td class="tdTabla" id="junCONTRALORIA"></td>
                    <td class="tdTabla" id="julCONTRALORIA"></td>
                    <td class="tdTabla" id="agoCONTRALORIA"></th>
                    <td class="tdTabla" id="sepCONTRALORIA"></td>
                    <td class="tdTabla" id="octCONTRALORIA"></td>
                    <td class="tdTabla" id="novCONTRALORIA"></td>
                    <td class="tdTabla" id="dicCONTRALORIA"></th>
                  </tr>
            </table>
            <script type="text/javascript">
            @foreach( $rfijo as $rfijos )
                  
                    var demos = '{{$rfijos->ale_mes}}{{$rfijos->ale_acronimo}}';
                    document.getElementById(demos).innerHTML='<i class="fa fa-check iconCheck"></i>';
                  
            @endforeach
            </script>
            <!--hr>
            <a href="/bitacora">Acciones por actividad</a-->


        </div>
      </section>




@endsection