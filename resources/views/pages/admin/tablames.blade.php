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
                <th>Área</th>
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
                    <td class="tdTabla" id="ENEROCG"></td>
                    <td class="tdTabla" id="FEBREROCG"></td>
                    <td class="tdTabla" id="MARZOCG"></td>
                    <td class="tdTabla" id="ABRILCG"></th>
                    <td class="tdTabla" id="MAYOCG"></td>
                    <td class="tdTabla" id="JUNIOCG"></td>
                    <td class="tdTabla" id="JULIOCG"></td>
                    <td class="tdTabla" id="AGOSTOCG"></th>
                    <td class="tdTabla" id="SEPTIEMBRECG"></td>
                    <td class="tdTabla" id="OCTUBRECG"></td>
                    <td class="tdTabla" id="NOVIEMBRECG"></td>
                    <td class="tdTabla" id="DICIEMBRECG"></th>
                  </tr>
                  <tr>
                    <td>Secretaria Ejecutiva</td>
                    <td class="tdTabla" id="ENEROSE"></td>
                    <td class="tdTabla" id="FEBREROSE"></td>
                    <td class="tdTabla" id="MARZOSE"></td>
                    <td class="tdTabla" id="ABRILSE"></th>
                    <td class="tdTabla" id="MAYOSE"></td>
                    <td class="tdTabla" id="JUNIOSE"></td>
                    <td class="tdTabla" id="JULIOSE"></td>
                    <td class="tdTabla" id="AGOSTOSE"></th>
                    <td class="tdTabla" id="SEPTIEMBRESE"></td>
                    <td class="tdTabla" id="OCTUBRESE"></td>
                    <td class="tdTabla" id="NOVIEMBRESE"></td>
                    <td class="tdTabla" id="DICIEMBRESE"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva Prerrogativas y Partidos Políticos</td>
                    <td class="tdTabla" id="ENERODEPPP"></td>
                    <td class="tdTabla" id="FEBRERODEPPP"></td>
                    <td class="tdTabla" id="MARZODEPPP"></td>
                    <td class="tdTabla" id="ABRILDEPPP"></th>
                    <td class="tdTabla" id="MAYODEPPP"></td>
                    <td class="tdTabla" id="JUNIODEPPP"></td>
                    <td class="tdTabla" id="JULIODEPPP"></td>
                    <td class="tdTabla" id="AGOSTODEPPP"></th>
                    <td class="tdTabla" id="SEPTIEMBREDEPPP"></td>
                    <td class="tdTabla" id="OCTUBREDEPPP"></td>
                    <td class="tdTabla" id="NOVIEMBREDEPPP"></td>
                    <td class="tdTabla" id="DICIEMBREDEPPP"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Organización Electoral</td>
                    <td class="tdTabla" id="ENERODEODE"></td>
                    <td class="tdTabla" id="FEBRERODEODE"></td>
                    <td class="tdTabla" id="MARZODEODE"></td>
                    <td class="tdTabla" id="ABRILDEODE"></th>
                    <td class="tdTabla" id="MAYODEODE"></td>
                    <td class="tdTabla" id="JUNIODEODE"></td>
                    <td class="tdTabla" id="JULIODEODE"></td>
                    <td class="tdTabla" id="AGOSTODEODE"></th>
                    <td class="tdTabla" id="SEPTIEMBREDEODE"></td>
                    <td class="tdTabla" id="OCTUBREDEODE"></td>
                    <td class="tdTabla" id="NOVIEMBREDEODE"></td>
                    <td class="tdTabla" id="DICIEMBREDEODE"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Capacitación Electoral y Educación Cívica</td>
                    <td class="tdTabla" id="ENERODECEYEC"></td>
                    <td class="tdTabla" id="FEBRERODECEYEC"></td>
                    <td class="tdTabla" id="MARZODECEYEC"></td>
                    <td class="tdTabla" id="ABRILDECEYEC"></th>
                    <td class="tdTabla" id="MAYODECEYEC"></td>
                    <td class="tdTabla" id="JUNIODECEYEC"></td>
                    <td class="tdTabla" id="JULIODECEYEC"></td>
                    <td class="tdTabla" id="AGOSTODECEYEC"></th>
                    <td class="tdTabla" id="SEPTIEMBREDECEYEC"></td>
                    <td class="tdTabla" id="OCTUBREDECEYEC"></td>
                    <td class="tdTabla" id="NOVIEMBREDECEYEC"></td>
                    <td class="tdTabla" id="DICIEMBREDECEYEC"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Administración</td>
                    <td class="tdTabla" id="ENERODEA"></td>
                    <td class="tdTabla" id="FEBRERODEA"></td>
                    <td class="tdTabla" id="MARZODEA"></td>
                    <td class="tdTabla" id="ABRILDEA"></th>
                    <td class="tdTabla" id="MAYODEA"></td>
                    <td class="tdTabla" id="JUNIODEA"></td>
                    <td class="tdTabla" id="JULIODEA"></td>
                    <td class="tdTabla" id="AGOSTODEA"></th>
                    <td class="tdTabla" id="SEPTIEMBREDEA"></td>
                    <td class="tdTabla" id="OCTUBREDEA"></td>
                    <td class="tdTabla" id="NOVIEMBREDEA"></td>
                    <td class="tdTabla" id="DICIEMBREDEA"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Asuntos Jurídicos</td>
                    <td class="tdTabla" id="ENERODEAJ"></td>
                    <td class="tdTabla" id="FEBRERODEAJ"></td>
                    <td class="tdTabla" id="MARZODEAJ"></td>
                    <td class="tdTabla" id="ABRILDEAJ"></th>
                    <td class="tdTabla" id="MAYODEAJ"></td>
                    <td class="tdTabla" id="JUNIODEAJ"></td>
                    <td class="tdTabla" id="JULIODEAJ"></td>
                    <td class="tdTabla" id="AGOSTODEAJ"></th>
                    <td class="tdTabla" id="SEPTIEMBREDEAJ"></td>
                    <td class="tdTabla" id="OCTUBREDEAJ"></td>
                    <td class="tdTabla" id="NOVIEMBREDEAJ"></td>
                    <td class="tdTabla" id="DICIEMBREDEAJ"></th>
                  </tr>
                  <tr>
                    <td>Unidad de Fiscalización</td>
                    <td class="tdTabla" id="ENEROUF"></td>
                    <td class="tdTabla" id="FEBREROUF"></td>
                    <td class="tdTabla" id="MARZOUF"></td>
                    <td class="tdTabla" id="ABRILUF"></th>
                    <td class="tdTabla" id="MAYOUF"></td>
                    <td class="tdTabla" id="JUNIOUF"></td>
                    <td class="tdTabla" id="JULIOUF"></td>
                    <td class="tdTabla" id="AGOSTOUF"></th>
                    <td class="tdTabla" id="SEPTIEMBREUF"></td>
                    <td class="tdTabla" id="OCTUBREUF"></td>
                    <td class="tdTabla" id="NOVIEMBREUF"></td>
                    <td class="tdTabla" id="DICIEMBREUF"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Comunicación Social</td>
                    <td class="tdTabla" id="ENEROUTCS"></td>
                    <td class="tdTabla" id="FEBREROUTCS"></td>
                    <td class="tdTabla" id="MARZOUTCS"></td>
                    <td class="tdTabla" id="ABRILUTCS"></th>
                    <td class="tdTabla" id="MAYOUTCS"></td>
                    <td class="tdTabla" id="JUNIOUTCS"></td>
                    <td class="tdTabla" id="JULIOUTCS"></td>
                    <td class="tdTabla" id="AGOSTOUTCS"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTCS"></td>
                    <td class="tdTabla" id="OCTUBREUTCS"></td>
                    <td class="tdTabla" id="NOVIEMBREUTCS"></td>
                    <td class="tdTabla" id="DICIEMBREUTCS"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica del Centro de Formación y Desarrollo</td>
                    <td class="tdTabla" id="ENEROUTCFD"></td>
                    <td class="tdTabla" id="FEBREROUTCFD"></td>
                    <td class="tdTabla" id="MARZOUTCFD"></td>
                    <td class="tdTabla" id="ABRILUTCFD"></th>
                    <td class="tdTabla" id="MAYOUTCFD"></td>
                    <td class="tdTabla" id="JUNIOUTCFD"></td>
                    <td class="tdTabla" id="JULIOUTCFD"></td>
                    <td class="tdTabla" id="AGOSTOUTCFD"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTCFD"></td>
                    <td class="tdTabla" id="OCTUBREUTCFD"></td>
                    <td class="tdTabla" id="NOVIEMBREUTCFD"></td>
                    <td class="tdTabla" id="DICIEMBREUTCFD"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Servicios Informáticos</td>
                    <td class="tdTabla" id="ENEROUTSI"></td>
                    <td class="tdTabla" id="FEBREROUTSI"></td>
                    <td class="tdTabla" id="MARZOUTSI"></td>
                    <td class="tdTabla" id="ABRILUTSI"></th>
                    <td class="tdTabla" id="MAYOUTSI"></td>
                    <td class="tdTabla" id="JUNIOUTSI"></td>
                    <td class="tdTabla" id="JULIOUTSI"></td>
                    <td class="tdTabla" id="AGOSTOUTSI"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTSI"></td>
                    <td class="tdTabla" id="OCTUBREUTSI"></td>
                    <td class="tdTabla" id="NOVIEMBREUTSI"></td>
                    <td class="tdTabla" id="DICIEMBREUTSI"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Planeación</td>
                    <td class="tdTabla" id="ENEROUTP"></td>
                    <td class="tdTabla" id="FEBREROUTP"></td>
                    <td class="tdTabla" id="MARZOUTP"></td>
                    <td class="tdTabla" id="ABRILUTP"></th>
                    <td class="tdTabla" id="MAYOUTP"></td>
                    <td class="tdTabla" id="JUNIOUTP"></td>
                    <td class="tdTabla" id="JULIOUTP"></td>
                    <td class="tdTabla" id="AGOSTOUTP"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTP"></td>
                    <td class="tdTabla" id="OCTUBREUTP"></td>
                    <td class="tdTabla" id="NOVIEMBREUTP"></td>
                    <td class="tdTabla" id="DICIEMBREUTP"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Oficialía Electoral</td>
                    <td class="tdTabla" id="ENEROUTOE"></td>
                    <td class="tdTabla" id="FEBREROUTOE"></td>
                    <td class="tdTabla" id="MARZOUTOE"></td>
                    <td class="tdTabla" id="ABRILUTOE"></th>
                    <td class="tdTabla" id="MAYOUTOE"></td>
                    <td class="tdTabla" id="JUNIOUTOE"></td>
                    <td class="tdTabla" id="JULIOUTOE"></td>
                    <td class="tdTabla" id="AGOSTOUTOE"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTOE"></td>
                    <td class="tdTabla" id="OCTUBREUTOE"></td>
                    <td class="tdTabla" id="NOVIEMBREUTOE"></td>
                    <td class="tdTabla" id="DICIEMBREUTOE"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Secretariado</td>
                    <td class="tdTabla" id="ENEROUTS"></td>
                    <td class="tdTabla" id="FEBREROUTS"></td>
                    <td class="tdTabla" id="MARZOUTS"></td>
                    <td class="tdTabla" id="ABRILUTS"></th>
                    <td class="tdTabla" id="MAYOUTS"></td>
                    <td class="tdTabla" id="JUNIOUTS"></td>
                    <td class="tdTabla" id="JULIOUTS"></td>
                    <td class="tdTabla" id="AGOSTOUTS"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTS"></td>
                    <td class="tdTabla" id="OCTUBREUTS"></td>
                    <td class="tdTabla" id="NOVIEMBREUTS"></td>
                    <td class="tdTabla" id="DICIEMBREUTS"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Vinculación con Órganos Desconcentrados y Organizaciones de la Sociedad Civil</td>
                    <td class="tdTabla" id="ENEROUTVODES"></td>
                    <td class="tdTabla" id="FEBREROUTVODES"></td>
                    <td class="tdTabla" id="MARZOUTVODES"></td>
                    <td class="tdTabla" id="ABRILUTVODES"></th>
                    <td class="tdTabla" id="MAYOUTVODES"></td>
                    <td class="tdTabla" id="JUNIOUTVODES"></td>
                    <td class="tdTabla" id="JULIOUTVODES"></td>
                    <td class="tdTabla" id="AGOSTOUTVODES"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTVODES"></td>
                    <td class="tdTabla" id="OCTUBREUTVODES"></td>
                    <td class="tdTabla" id="NOVIEMBREUTVODES"></td>
                    <td class="tdTabla" id="DICIEMBREUTVODES"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Igualdad de Género e Inclusión</td>
                    <td class="tdTabla" id="ENEROUTIGI"></td>
                    <td class="tdTabla" id="FEBREROUTIGI"></td>
                    <td class="tdTabla" id="MARZOUTIGI"></td>
                    <td class="tdTabla" id="ABRILUTIGI"></th>
                    <td class="tdTabla" id="MAYOUTIGI"></td>
                    <td class="tdTabla" id="JUNIOUTIGI"></td>
                    <td class="tdTabla" id="JULIOUTIGI"></td>
                    <td class="tdTabla" id="AGOSTOUTIGI"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTIGI"></td>
                    <td class="tdTabla" id="OCTUBREUTIGI"></td>
                    <td class="tdTabla" id="NOVIEMBREUTIGI"></td>
                    <td class="tdTabla" id="DICIEMBREUTIGI"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Transparencia</td>
                    <td class="tdTabla" id="ENEROUTT"></td>
                    <td class="tdTabla" id="FEBREROUTT"></td>
                    <td class="tdTabla" id="MARZOUTT"></td>
                    <td class="tdTabla" id="ABRILUTT"></th>
                    <td class="tdTabla" id="MAYOUTT"></td>
                    <td class="tdTabla" id="JUNIOUTT"></td>
                    <td class="tdTabla" id="JULIOUTT"></td>
                    <td class="tdTabla" id="AGOSTOUTT"></th>
                    <td class="tdTabla" id="SEPTIEMBREUTT"></td>
                    <td class="tdTabla" id="OCTUBREUTT"></td>
                    <td class="tdTabla" id="NOVIEMBREUTT"></td>
                    <td class="tdTabla" id="DICIEMBREUTT"></th>
                  </tr>
                  <tr>
                    <td>Órgano Interno de Control</td>
                    <td class="tdTabla" id="ENEROCONTRALORIA"></td>
                    <td class="tdTabla" id="FEBREROCONTRALORIA"></td>
                    <td class="tdTabla" id="MARZOCONTRALORIA"></td>
                    <td class="tdTabla" id="ABRILCONTRALORIA"></th>
                    <td class="tdTabla" id="MAYOCONTRALORIA"></td>
                    <td class="tdTabla" id="JUNIOCONTRALORIA"></td>
                    <td class="tdTabla" id="JULIOCONTRALORIA"></td>
                    <td class="tdTabla" id="AGOSTOCONTRALORIA"></th>
                    <td class="tdTabla" id="SEPTIEMBRECONTRALORIA"></td>
                    <td class="tdTabla" id="OCTUBRECONTRALORIA"></td>
                    <td class="tdTabla" id="NOVIEMBRECONTRALORIA"></td>
                    <td class="tdTabla" id="DICIEMBRECONTRALORIA"></th>
                  </tr>
            </table>
            <script type="text/javascript">
            @foreach( $rfijo as $rfijos )
                  
                    var demos = '{{strtoupper($rfijos->ale_mes)}}{{strtoupper($rfijos->ale_acronimo)}}';
                    document.getElementById(demos).innerHTML='<i class="fa fa-check iconCheck"></i>';
                  
            @endforeach
            </script>
            <!--hr>
            <a href="/bitacora">Acciones por actividad</a-->


        </div>
      </section>




@endsection