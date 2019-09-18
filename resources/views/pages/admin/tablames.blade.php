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
                    <td class="tdTabla" id="ENECG"></td>
                    <td class="tdTabla" id="FEBCG"></td>
                    <td class="tdTabla" id="MARCG"></td>
                    <td class="tdTabla" id="ABRCG"></th>
                    <td class="tdTabla" id="MAYCG"></td>
                    <td class="tdTabla" id="JUNCG"></td>
                    <td class="tdTabla" id="JULCG"></td>
                    <td class="tdTabla" id="AGOCG"></th>
                    <td class="tdTabla" id="SEPCG"></td>
                    <td class="tdTabla" id="OCTCG"></td>
                    <td class="tdTabla" id="NOVCG"></td>
                    <td class="tdTabla" id="DICCG"></th>
                  </tr>
                  <tr>
                    <td>Secretaria Ejecutiva</td>
                    <td class="tdTabla" id="ENESE"></td>
                    <td class="tdTabla" id="FEBSE"></td>
                    <td class="tdTabla" id="MARSE"></td>
                    <td class="tdTabla" id="ABRSE"></th>
                    <td class="tdTabla" id="MAYSE"></td>
                    <td class="tdTabla" id="JUNSE"></td>
                    <td class="tdTabla" id="JULSE"></td>
                    <td class="tdTabla" id="AGOSE"></th>
                    <td class="tdTabla" id="SEPSE"></td>
                    <td class="tdTabla" id="OCTSE"></td>
                    <td class="tdTabla" id="NOVSE"></td>
                    <td class="tdTabla" id="DICSE"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva Prerrogativas y Partidos Políticos</td>
                    <td class="tdTabla" id="ENEDEPPP"></td>
                    <td class="tdTabla" id="FEBDEPPP"></td>
                    <td class="tdTabla" id="MARDEPPP"></td>
                    <td class="tdTabla" id="ABRDEPPP"></th>
                    <td class="tdTabla" id="MAYDEPPP"></td>
                    <td class="tdTabla" id="JUNDEPPP"></td>
                    <td class="tdTabla" id="JULDEPPP"></td>
                    <td class="tdTabla" id="AGODEPPP"></th>
                    <td class="tdTabla" id="SEPDEPPP"></td>
                    <td class="tdTabla" id="OCTDEPPP"></td>
                    <td class="tdTabla" id="NOVDEPPP"></td>
                    <td class="tdTabla" id="DICDEPPP"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Organización Electoral</td>
                    <td class="tdTabla" id="ENEDEODE"></td>
                    <td class="tdTabla" id="FEBDEODE"></td>
                    <td class="tdTabla" id="MARDEODE"></td>
                    <td class="tdTabla" id="ABRDEODE"></th>
                    <td class="tdTabla" id="MAYDEODE"></td>
                    <td class="tdTabla" id="JUNDEODE"></td>
                    <td class="tdTabla" id="JULDEODE"></td>
                    <td class="tdTabla" id="AGODEODE"></th>
                    <td class="tdTabla" id="SEPDEODE"></td>
                    <td class="tdTabla" id="OCTDEODE"></td>
                    <td class="tdTabla" id="NOVDEODE"></td>
                    <td class="tdTabla" id="DICDEODE"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Capacitación Electoral y Educación Cívica</td>
                    <td class="tdTabla" id="ENEDECEYEC"></td>
                    <td class="tdTabla" id="FEBDECEYEC"></td>
                    <td class="tdTabla" id="MARDECEYEC"></td>
                    <td class="tdTabla" id="ABRDECEYEC"></th>
                    <td class="tdTabla" id="MAYDECEYEC"></td>
                    <td class="tdTabla" id="JUNDECEYEC"></td>
                    <td class="tdTabla" id="JULDECEYEC"></td>
                    <td class="tdTabla" id="AGODECEYEC"></th>
                    <td class="tdTabla" id="SEPDECEYEC"></td>
                    <td class="tdTabla" id="OCTDECEYEC"></td>
                    <td class="tdTabla" id="NOVDECEYEC"></td>
                    <td class="tdTabla" id="DICDECEYEC"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Administración</td>
                    <td class="tdTabla" id="ENEDEA"></td>
                    <td class="tdTabla" id="FEBDEA"></td>
                    <td class="tdTabla" id="MARDEA"></td>
                    <td class="tdTabla" id="ABRDEA"></th>
                    <td class="tdTabla" id="MAYDEA"></td>
                    <td class="tdTabla" id="JUNDEA"></td>
                    <td class="tdTabla" id="JULDEA"></td>
                    <td class="tdTabla" id="AGODEA"></th>
                    <td class="tdTabla" id="SEPDEA"></td>
                    <td class="tdTabla" id="OCTDEA"></td>
                    <td class="tdTabla" id="NOVDEA"></td>
                    <td class="tdTabla" id="DICDEA"></th>
                  </tr>
                  <tr>
                    <td>Dirección Ejecutiva de Asuntos Jurídicos</td>
                    <td class="tdTabla" id="ENEDEAJ"></td>
                    <td class="tdTabla" id="FEBDEAJ"></td>
                    <td class="tdTabla" id="MARDEAJ"></td>
                    <td class="tdTabla" id="ABRDEAJ"></th>
                    <td class="tdTabla" id="MAYDEAJ"></td>
                    <td class="tdTabla" id="JUNDEAJ"></td>
                    <td class="tdTabla" id="JULDEAJ"></td>
                    <td class="tdTabla" id="AGODEAJ"></th>
                    <td class="tdTabla" id="SEPDEAJ"></td>
                    <td class="tdTabla" id="OCTDEAJ"></td>
                    <td class="tdTabla" id="NOVDEAJ"></td>
                    <td class="tdTabla" id="DICDEAJ"></th>
                  </tr>
                  <tr>
                    <td>Unidad de Fiscalización</td>
                    <td class="tdTabla" id="ENEUF"></td>
                    <td class="tdTabla" id="FEBUF"></td>
                    <td class="tdTabla" id="MARUF"></td>
                    <td class="tdTabla" id="ABRUF"></th>
                    <td class="tdTabla" id="MAYUF"></td>
                    <td class="tdTabla" id="JUNUF"></td>
                    <td class="tdTabla" id="JULUF"></td>
                    <td class="tdTabla" id="AGOUF"></th>
                    <td class="tdTabla" id="SEPUF"></td>
                    <td class="tdTabla" id="OCTUF"></td>
                    <td class="tdTabla" id="NOVUF"></td>
                    <td class="tdTabla" id="DICUF"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Comunicación Social</td>
                    <td class="tdTabla" id="ENEUTCS"></td>
                    <td class="tdTabla" id="FEBUTCS"></td>
                    <td class="tdTabla" id="MARUTCS"></td>
                    <td class="tdTabla" id="ABRUTCS"></th>
                    <td class="tdTabla" id="MAYUTCS"></td>
                    <td class="tdTabla" id="JUNUTCS"></td>
                    <td class="tdTabla" id="JULUTCS"></td>
                    <td class="tdTabla" id="AGOUTCS"></th>
                    <td class="tdTabla" id="SEPUTCS"></td>
                    <td class="tdTabla" id="OCTUTCS"></td>
                    <td class="tdTabla" id="NOVUTCS"></td>
                    <td class="tdTabla" id="DICUTCS"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica del Centro de Formación y Desarrollo</td>
                    <td class="tdTabla" id="ENEUTCFD"></td>
                    <td class="tdTabla" id="FEBUTCFD"></td>
                    <td class="tdTabla" id="MARUTCFD"></td>
                    <td class="tdTabla" id="ABRUTCFD"></th>
                    <td class="tdTabla" id="MAYUTCFD"></td>
                    <td class="tdTabla" id="JUNUTCFD"></td>
                    <td class="tdTabla" id="JULUTCFD"></td>
                    <td class="tdTabla" id="AGOUTCFD"></th>
                    <td class="tdTabla" id="SEPUTCFD"></td>
                    <td class="tdTabla" id="OCTUTCFD"></td>
                    <td class="tdTabla" id="NOVUTCFD"></td>
                    <td class="tdTabla" id="DICUTCFD"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Servicios Informáticos</td>
                    <td class="tdTabla" id="ENEUTSI"></td>
                    <td class="tdTabla" id="FEBUTSI"></td>
                    <td class="tdTabla" id="MARUTSI"></td>
                    <td class="tdTabla" id="ABRUTSI"></th>
                    <td class="tdTabla" id="MAYUTSI"></td>
                    <td class="tdTabla" id="JUNUTSI"></td>
                    <td class="tdTabla" id="JULUTSI"></td>
                    <td class="tdTabla" id="AGOUTSI"></th>
                    <td class="tdTabla" id="SEPUTSI"></td>
                    <td class="tdTabla" id="OCTUTSI"></td>
                    <td class="tdTabla" id="NOVUTSI"></td>
                    <td class="tdTabla" id="DICUTSI"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Planeación</td>
                    <td class="tdTabla" id="ENEUTP"></td>
                    <td class="tdTabla" id="FEBUTP"></td>
                    <td class="tdTabla" id="MARUTP"></td>
                    <td class="tdTabla" id="ABRUTP"></th>
                    <td class="tdTabla" id="MAYUTP"></td>
                    <td class="tdTabla" id="JUNUTP"></td>
                    <td class="tdTabla" id="JULUTP"></td>
                    <td class="tdTabla" id="AGOUTP"></th>
                    <td class="tdTabla" id="SEPUTP"></td>
                    <td class="tdTabla" id="OCTUTP"></td>
                    <td class="tdTabla" id="NOVUTP"></td>
                    <td class="tdTabla" id="DICUTP"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Oficialía Electoral</td>
                    <td class="tdTabla" id="ENEUTOE"></td>
                    <td class="tdTabla" id="FEBUTOE"></td>
                    <td class="tdTabla" id="MARUTOE"></td>
                    <td class="tdTabla" id="ABRUTOE"></th>
                    <td class="tdTabla" id="MAYUTOE"></td>
                    <td class="tdTabla" id="JUNUTOE"></td>
                    <td class="tdTabla" id="JULUTOE"></td>
                    <td class="tdTabla" id="AGOUTOE"></th>
                    <td class="tdTabla" id="SEPUTOE"></td>
                    <td class="tdTabla" id="OCTUTOE"></td>
                    <td class="tdTabla" id="NOVUTOE"></td>
                    <td class="tdTabla" id="DICUTOE"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Secretariado</td>
                    <td class="tdTabla" id="ENEUTS"></td>
                    <td class="tdTabla" id="FEBUTS"></td>
                    <td class="tdTabla" id="MARUTS"></td>
                    <td class="tdTabla" id="ABRUTS"></th>
                    <td class="tdTabla" id="MAYUTS"></td>
                    <td class="tdTabla" id="JUNUTS"></td>
                    <td class="tdTabla" id="JULUTS"></td>
                    <td class="tdTabla" id="AGOUTS"></th>
                    <td class="tdTabla" id="SEPUTS"></td>
                    <td class="tdTabla" id="OCTUTS"></td>
                    <td class="tdTabla" id="NOVUTS"></td>
                    <td class="tdTabla" id="DICUTS"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Vinculación con Órganos Desconcentrados y Organizaciones de la Sociedad Civil</td>
                    <td class="tdTabla" id="ENEUTVODES"></td>
                    <td class="tdTabla" id="FEBUTVODES"></td>
                    <td class="tdTabla" id="MARUTVODES"></td>
                    <td class="tdTabla" id="ABRUTVODES"></th>
                    <td class="tdTabla" id="MAYUTVODES"></td>
                    <td class="tdTabla" id="JUNUTVODES"></td>
                    <td class="tdTabla" id="JULUTVODES"></td>
                    <td class="tdTabla" id="AGOUTVODES"></th>
                    <td class="tdTabla" id="SEPUTVODES"></td>
                    <td class="tdTabla" id="OCTUTVODES"></td>
                    <td class="tdTabla" id="NOVUTVODES"></td>
                    <td class="tdTabla" id="DICUTVODES"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Igualdad de Género e Inclusión</td>
                    <td class="tdTabla" id="ENEUTIGI"></td>
                    <td class="tdTabla" id="FEBUTIGI"></td>
                    <td class="tdTabla" id="MARUTIGI"></td>
                    <td class="tdTabla" id="ABRUTIGI"></th>
                    <td class="tdTabla" id="MAYUTIGI"></td>
                    <td class="tdTabla" id="JUNUTIGI"></td>
                    <td class="tdTabla" id="JULUTIGI"></td>
                    <td class="tdTabla" id="AGOUTIGI"></th>
                    <td class="tdTabla" id="SEPUTIGI"></td>
                    <td class="tdTabla" id="OCTUTIGI"></td>
                    <td class="tdTabla" id="NOVUTIGI"></td>
                    <td class="tdTabla" id="DICUTIGI"></th>
                  </tr>
                  <tr>
                    <td>Unidad Técnica de Transparencia</td>
                    <td class="tdTabla" id="ENEUTT"></td>
                    <td class="tdTabla" id="FEBUTT"></td>
                    <td class="tdTabla" id="MARUTT"></td>
                    <td class="tdTabla" id="ABRUTT"></th>
                    <td class="tdTabla" id="MAYUTT"></td>
                    <td class="tdTabla" id="JUNUTT"></td>
                    <td class="tdTabla" id="JULUTT"></td>
                    <td class="tdTabla" id="AGOUTT"></th>
                    <td class="tdTabla" id="SEPUTT"></td>
                    <td class="tdTabla" id="OCTUTT"></td>
                    <td class="tdTabla" id="NOVUTT"></td>
                    <td class="tdTabla" id="DICUTT"></th>
                  </tr>
                  <tr>
                    <td>Órgano Interno de Control</td>
                    <td class="tdTabla" id="ENECONTRALORIA"></td>
                    <td class="tdTabla" id="FEBCONTRALORIA"></td>
                    <td class="tdTabla" id="MARCONTRALORIA"></td>
                    <td class="tdTabla" id="ABRCONTRALORIA"></th>
                    <td class="tdTabla" id="MAYCONTRALORIA"></td>
                    <td class="tdTabla" id="JUNCONTRALORIA"></td>
                    <td class="tdTabla" id="JULCONTRALORIA"></td>
                    <td class="tdTabla" id="AGOCONTRALORIA"></th>
                    <td class="tdTabla" id="SEPCONTRALORIA"></td>
                    <td class="tdTabla" id="OCTCONTRALORIA"></td>
                    <td class="tdTabla" id="NOVCONTRALORIA"></td>
                    <td class="tdTabla" id="DICCONTRALORIA"></th>
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