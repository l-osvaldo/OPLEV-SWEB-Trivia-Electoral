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
                <select id="acronimo" class="form-control" required>
                  <option value="CG">CG</option>
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
                  <option value="CONTRALORIA">CONTRALORIA</option>
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
                    <td>{{ date('d/m/Y', strtotime($alertafin->created_at)) }}</th>
                  </tr>
                @endforeach
            </table>


            <hr>

            <h5>Reporte general</h5>
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
                <th>Nob</th>
                <th>Dic</th>
              </tr>
                  <tr>
                    <td>CG</td>
                    <td id="eneCG"></td>
                    <td id="febCG"></td>
                    <td id="marCG"></td>
                    <td id="abrCG"></th>
                    <td id="mayCG"></td>
                    <td id="junCG"></td>
                    <td id="julCG"></td>
                    <td id="agoCG"></th>
                    <td id="sepCG"></td>
                    <td id="octCG"></td>
                    <td id="novCG"></td>
                    <td id="dicCG"></th>
                  </tr>
                  <tr>
                    <td>SE</td>
                    <td id="eneSE"></td>
                    <td id="febSE"></td>
                    <td id="marSE"></td>
                    <td id="abrSE"></th>
                    <td id="maySE"></td>
                    <td id="junSE"></td>
                    <td id="julSE"></td>
                    <td id="agoSE"></th>
                    <td id="sepSE"></td>
                    <td id="octSE"></td>
                    <td id="novSE"></td>
                    <td id="dicSE"></th>
                  </tr>
                  <tr>
                    <td>DEPPP</td>
                    <td id="eneDEPPP"></td>
                    <td id="febDEPPP"></td>
                    <td id="marDEPPP"></td>
                    <td id="abrDEPPP"></th>
                    <td id="mayDEPPP"></td>
                    <td id="junDEPPP"></td>
                    <td id="julDEPPP"></td>
                    <td id="agoDEPPP"></th>
                    <td id="sepDEPPP"></td>
                    <td id="octDEPPP"></td>
                    <td id="novDEPPP"></td>
                    <td id="dicDEPPP"></th>
                  </tr>
                  <tr>
                    <td>DEOE</td>
                    <td id="eneDEODE"></td>
                    <td id="febDEODE"></td>
                    <td id="marDEODE"></td>
                    <td id="abrDEODE"></th>
                    <td id="mayDEODE"></td>
                    <td id="junDEODE"></td>
                    <td id="julDEODE"></td>
                    <td id="agoDEODE"></th>
                    <td id="sepDEODE"></td>
                    <td id="octDEODE"></td>
                    <td id="novDEODE"></td>
                    <td id="dicDEODE"></th>
                  </tr>
                  <tr>
                    <td>DECEYEC</td>
                    <td id="eneDECEYEC"></td>
                    <td id="febDECEYEC"></td>
                    <td id="marDECEYEC"></td>
                    <td id="abrDECEYEC"></th>
                    <td id="mayDECEYEC"></td>
                    <td id="junDECEYEC"></td>
                    <td id="julDECEYEC"></td>
                    <td id="agoDECEYEC"></th>
                    <td id="sepDECEYEC"></td>
                    <td id="octDECEYEC"></td>
                    <td id="novDECEYEC"></td>
                    <td id="dicDECEYEC"></th>
                  </tr>
                  <tr>
                    <td>DEA</td>
                    <td id="eneDEA"></td>
                    <td id="febDEA"></td>
                    <td id="marDEA"></td>
                    <td id="abrDEA"></th>
                    <td id="mayDEA"></td>
                    <td id="junDEA"></td>
                    <td id="julDEA"></td>
                    <td id="agoDEA"></th>
                    <td id="sepDEA"></td>
                    <td id="octDEA"></td>
                    <td id="novDEA"></td>
                    <td id="dicDEA"></th>
                  </tr>
                  <tr>
                    <td>DEAJ</td>
                    <td id="eneDEAJ"></td>
                    <td id="febDEAJ"></td>
                    <td id="marDEAJ"></td>
                    <td id="abrDEAJ"></th>
                    <td id="mayDEAJ"></td>
                    <td id="junDEAJ"></td>
                    <td id="julDEAJ"></td>
                    <td id="agoDEAJ"></th>
                    <td id="sepDEAJ"></td>
                    <td id="octDEAJ"></td>
                    <td id="novDEAJ"></td>
                    <td id="dicDEAJ"></th>
                  </tr>
                  <tr>
                    <td>UF</td>
                    <td id="eneUF"></td>
                    <td id="febUF"></td>
                    <td id="marUF"></td>
                    <td id="abrUF"></th>
                    <td id="mayUF"></td>
                    <td id="junUF"></td>
                    <td id="julUF"></td>
                    <td id="agoUF"></th>
                    <td id="sepUF"></td>
                    <td id="octUF"></td>
                    <td id="novUF"></td>
                    <td id="dicUF"></th>
                  </tr>
                  <tr>
                    <td>UTCS</td>
                    <td id="eneUTCS"></td>
                    <td id="febUTCS"></td>
                    <td id="marUTCS"></td>
                    <td id="abrUTCS"></th>
                    <td id="mayUTCS"></td>
                    <td id="junUTCS"></td>
                    <td id="julUTCS"></td>
                    <td id="agoUTCS"></th>
                    <td id="sepUTCS"></td>
                    <td id="octUTCS"></td>
                    <td id="novUTCS"></td>
                    <td id="dicUTCS"></th>
                  </tr>
                  <tr>
                    <td>UTCFD</td>
                    <td id="eneUTCFD"></td>
                    <td id="febUTCFD"></td>
                    <td id="marUTCFD"></td>
                    <td id="abrUTCFD"></th>
                    <td id="mayUTCFD"></td>
                    <td id="junUTCFD"></td>
                    <td id="julUTCFD"></td>
                    <td id="agoUTCFD"></th>
                    <td id="sepUTCFD"></td>
                    <td id="octUTCFD"></td>
                    <td id="novUTCFD"></td>
                    <td id="dicUTCFD"></th>
                  </tr>
                  <tr>
                    <td>UTSI</td>
                    <td id="eneUTSI"></td>
                    <td id="febUTSI"></td>
                    <td id="marUTSI"></td>
                    <td id="abrUTSI"></th>
                    <td id="mayUTSI"></td>
                    <td id="junUTSI"></td>
                    <td id="julUTSI"></td>
                    <td id="agoUTSI"></th>
                    <td id="sepUTSI"></td>
                    <td id="octUTSI"></td>
                    <td id="novUTSI"></td>
                    <td id="dicUTSI"></th>
                  </tr>
                  <tr>
                    <td>UTP</td>
                    <td id="eneUTP"></td>
                    <td id="febUTP"></td>
                    <td id="marUTP"></td>
                    <td id="abrUTP"></th>
                    <td id="mayUTP"></td>
                    <td id="junUTP"></td>
                    <td id="julUTP"></td>
                    <td id="agoUTP"></th>
                    <td id="sepUTP"></td>
                    <td id="octUTP"></td>
                    <td id="novUTP"></td>
                    <td id="dicUTP"></th>
                  </tr>
                  <tr>
                    <td>UTOE</td>
                    <td id="eneUTOE"></td>
                    <td id="febUTOE"></td>
                    <td id="marUTOE"></td>
                    <td id="abrUTOE"></th>
                    <td id="mayUTOE"></td>
                    <td id="junUTOE"></td>
                    <td id="julUTOE"></td>
                    <td id="agoUTOE"></th>
                    <td id="sepUTOE"></td>
                    <td id="octUTOE"></td>
                    <td id="novUTOE"></td>
                    <td id="dicUTOE"></th>
                  </tr>
                  <tr>
                    <td>UTS</td>
                    <td id="eneUTS"></td>
                    <td id="febUTS"></td>
                    <td id="marUTS"></td>
                    <td id="abrUTS"></th>
                    <td id="mayUTS"></td>
                    <td id="junUTS"></td>
                    <td id="julUTS"></td>
                    <td id="agoUTS"></th>
                    <td id="sepUTS"></td>
                    <td id="octUTS"></td>
                    <td id="novUTS"></td>
                    <td id="dicUTS"></th>
                  </tr>
                  <tr>
                    <td>UTVODES</td>
                    <td id="eneUTVODES"></td>
                    <td id="febUTVODES"></td>
                    <td id="marUTVODES"></td>
                    <td id="abrUTVODES"></th>
                    <td id="mayUTVODES"></td>
                    <td id="junUTVODES"></td>
                    <td id="julUTVODES"></td>
                    <td id="agoUTVODES"></th>
                    <td id="sepUTVODES"></td>
                    <td id="octUTVODES"></td>
                    <td id="novUTVODES"></td>
                    <td id="dicUTVODES"></th>
                  </tr>
                  <tr>
                    <td>UTIGI</td>
                    <td id="eneUTIGI"></td>
                    <td id="febUTIGI"></td>
                    <td id="marUTIGI"></td>
                    <td id="abrUTIGI"></th>
                    <td id="mayUTIGI"></td>
                    <td id="junUTIGI"></td>
                    <td id="julUTIGI"></td>
                    <td id="agoUTIGI"></th>
                    <td id="sepUTIGI"></td>
                    <td id="octUTIGI"></td>
                    <td id="novUTIGI"></td>
                    <td id="dicUTIGI"></th>
                  </tr>
                  <tr>
                    <td>UTT</td>
                    <td id="eneUTT"></td>
                    <td id="febUTT"></td>
                    <td id="marUTT"></td>
                    <td id="abrUTT"></th>
                    <td id="mayUTT"></td>
                    <td id="junUTT"></td>
                    <td id="julUTT"></td>
                    <td id="agoUTT"></th>
                    <td id="sepUTT"></td>
                    <td id="octUTT"></td>
                    <td id="novUTT"></td>
                    <td id="dicUTT"></th>
                  </tr>
                  <tr>
                    <td>CONTRALORIA</td>
                    <td id="eneCONTRALORIA"></td>
                    <td id="febCONTRALORIA"></td>
                    <td id="marCONTRALORIA"></td>
                    <td id="abrCONTRALORIA"></th>
                    <td id="mayCONTRALORIA"></td>
                    <td id="junCONTRALORIA"></td>
                    <td id="julCONTRALORIA"></td>
                    <td id="agoCONTRALORIA"></th>
                    <td id="sepCONTRALORIA"></td>
                    <td id="octCONTRALORIA"></td>
                    <td id="novCONTRALORIA"></td>
                    <td id="dicCONTRALORIA"></th>
                  </tr>
            </table>

            @foreach( $rfijo as $rfijos )
                  <script type="text/javascript">
                    var demos = '{{$rfijos->ale_mes}}{{$rfijos->ale_acronimo}}';
                    document.getElementById(demos).innerHTML='<i class="fa fa-check iconCheck"></i>';
                  </script>
            @endforeach

        </div>
      </section>




@endsection