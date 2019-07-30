@if ( $errors->any() )
  <div class="row">
    <div class="col-12">
      <div class="box">
        <ul class="alert alert-danger">
          @foreach ( $errors->all() as $error )
            <p class="media-body pb-1 mb-0 small lh-125">* {{ $error }}</p>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
@endif


<form method="post" action="{{ $action }}" enctype="multipart/form-data" class="col-md-12 col-12">
  {{ csrf_field() }}


  <!--div class="row">
    <div class="col-6 col-lg-6 col-md-6">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa">
              <div class="ribbon ribbon-primary">
                Unidad Responsable
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <span class="titareames">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-6 col-md-6">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa">
              <div class="ribbon ribbon-primary">
                Mes a reportar
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <span class="titareames">{{$mes[0]->mes}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->

<div class="row">
  <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Mes a reportar</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   {{$mes[0]->mes}}
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>
</div>



<div class="row">
    <!--div class="col-5 col-lg-5 col-md-5">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">1.</span> Seleccione un Programa
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <select class="form-control" id="programa" name="programa" data-idmes={{$idmesreportar}}>
                      <option value="0">Programa...</option>
                      @foreach( $programas as $programa )
                        <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->


    <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">1. Seleccione un Programa</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <select class="form-control" id="programa" name="programa" data-idmes={{$idmesreportar}}>
                      <option value="0">Programa...</option>
                      @foreach( $programas as $programa )
                        <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>

    <!--div class="col-7 col-lg-7 col-md-7">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">2.</span> Seleccione un Programa Específico
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divProgramaEsp">
                    <select class="form-control" id="programaEsp" name="programaEsp">
                      <option value="0">Programa Específico...</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->


    <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">2. Seleccione un Programa Específico</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <select class="form-control" id="programaEsp" name="programaEsp">
                      <option value="0">Programa Específico...</option>
                    </select>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>


</div>

  <div class="row">
    <!--div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Objetivo
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <p id="objetivo" class="contenido"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->


    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Objetivo</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p id="objetivo" class="contenido"></p>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>


  </div>

  <div class="row">

    <!--div class="col-8 col-lg-8 col-md-8">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">3.</span> Seleccione una Actividad
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divActividad">
                    <select class="form-control" id="actividades" name="actividades">
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->


    <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">3. Seleccione una Actividad</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <select class="form-control" id="actividades" name="actividades">
                    </select>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>

    <!--div class="col-2 col-lg-2 col-md-2">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Unidad de Medida
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <p id="unidadmedida" class="contenido contcentrado"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->

    <div class="col-md-2">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Unidad de Medida</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p id="unidadmedida" class="contenido contcentrado"></p>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>

    <!--div class="col-2 col-lg-2 col-md-2">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Cantidad Anual
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <p id="cantidadanual" class="contenido contcentrado"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->


    <div class="col-md-2">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Cantidad Anual</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p id="cantidadanual" class="contenido contcentrado"></p>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>


  </div>

  <div class="row">

    <!--div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Análisis Mensual
              </div>
              <div class="row">
                <div class="col-12">

                  <div style="overflow-x:auto;">
                    <table class='table table-striped table-bordered table-hover table-condensed'>
                      <thead>
                        <tr>
                          <th class="tittabla">Meses</th>
                          <th class="tittabla">Ene</th>
                          <th class="tittabla">Feb</th>
                          <th class="tittabla">Mar</th>
                          <th class="tittabla">Abr</th>
                          <th class="tittabla">May</th>
                          <th class="tittabla">Jun</th>
                          <th class="tittabla">Jul</th>
                          <th class="tittabla">Ago</th>
                          <th class="tittabla">Sep</th>
                          <th class="tittabla">Oct</th>
                          <th class="tittabla">Nov</th>
                          <th class="tittabla">Dic</th>
                          <th class="tittabla">Inicio</th>
                          <th class="tittabla">Término</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="contenidotabla">
                          <td class="tittabla">Programado</td>
                          <td><span id="enep"></span></td>
                          <td><span id="febp"></span></td>
                          <td><span id="marp"></span></td>
                          <td><span id="abrp"></span></td>
                          <td><span id="mayp"></span></td>
                          <td><span id="junp"></span></td>
                          <td><span id="julp"></span></td>
                          <td><span id="agop"></span></td>
                          <td><span id="sepp"></span></td>
                          <td><span id="octp"></span></td>
                          <td><span id="novp"></span></td>
                          <td><span id="dicp"></span></td>
                          <td><span id="inicio"></span></td>
                          <td><span id="termino"></span></td>
                        </tr>
                        <tr class="contenidotabla">
                          <td class="tittabla">Realizado</td>
                          <td><span id="ener"></span></td>
                          <td><span id="febr"></span></td>
                          <td><span id="marr"></span></td>
                          <td><span id="abrr"></span></td>
                          <td><span id="mayr"></span></td>
                          <td><span id="junr"></span></td>
                          <td><span id="julr"></span></td>
                          <td><span id="agor"></span></td>
                          <td><span id="sepr"></span></td>
                          <td><span id="octr"></span></td>
                          <td><span id="novr"></span></td>
                          <td><span id="dicr"></span></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col-4">
                    <span class="fraserealizado"><span class="numpasos">4.</span> Realizado en este Mes - </span><span class="titareames">{{$mes[0]->mes}}</span>
                  </div>
                  <div class="col-3">
                    <div class="form-group">                  
                      <input type="text" class="form-control cantidadrealizada" id="realizadomes" name="realizadomes" placeholder="" maxlength="3">
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div-->


    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Análisis Mensual</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <table class='table table-striped table-bordered table-hover table-condensed'>
                      <thead>
                        <tr>
                          <th class="tittabla">Meses</th>
                          <th class="tittabla">Ene</th>
                          <th class="tittabla">Feb</th>
                          <th class="tittabla">Mar</th>
                          <th class="tittabla">Abr</th>
                          <th class="tittabla">May</th>
                          <th class="tittabla">Jun</th>
                          <th class="tittabla">Jul</th>
                          <th class="tittabla">Ago</th>
                          <th class="tittabla">Sep</th>
                          <th class="tittabla">Oct</th>
                          <th class="tittabla">Nov</th>
                          <th class="tittabla">Dic</th>
                          <th class="tittabla">Inicio</th>
                          <th class="tittabla">Término</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="contenidotabla">
                          <td class="tittabla">Programado</td>
                          <td><span id="enep"></span></td>
                          <td><span id="febp"></span></td>
                          <td><span id="marp"></span></td>
                          <td><span id="abrp"></span></td>
                          <td><span id="mayp"></span></td>
                          <td><span id="junp"></span></td>
                          <td><span id="julp"></span></td>
                          <td><span id="agop"></span></td>
                          <td><span id="sepp"></span></td>
                          <td><span id="octp"></span></td>
                          <td><span id="novp"></span></td>
                          <td><span id="dicp"></span></td>
                          <td><span id="inicio"></span></td>
                          <td><span id="termino"></span></td>
                        </tr>
                        <tr class="contenidotabla">
                          <td class="tittabla">Realizado</td>
                          <td><span id="ener"></span></td>
                          <td><span id="febr"></span></td>
                          <td><span id="marr"></span></td>
                          <td><span id="abrr"></span></td>
                          <td><span id="mayr"></span></td>
                          <td><span id="junr"></span></td>
                          <td><span id="julr"></span></td>
                          <td><span id="agor"></span></td>
                          <td><span id="sepr"></span></td>
                          <td><span id="octr"></span></td>
                          <td><span id="novr"></span></td>
                          <td><span id="dicr"></span></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="row">
                      <div class="col-3">
                        <span class="textoPrincipal">4. Realizado en este Mes - {{$mes[0]->mes}}
                      </div>
                      <div class="col-9">
                        <div class="form-group">                  
                          <input type="text" class="form-control cantidadrealizada" id="realizadomes" name="realizadomes" placeholder="" maxlength="3">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>


  </div>

  <div class="row">
    <!--div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">5.</span> Descripción de la Actividad
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control textuppercase" rows="4" id="descactividad" name="descactividad" placeholder=""></textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->


        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">5. Descripción de la Actividad</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <textarea class="form-control textuppercase" rows="4" id="descactividad" name="descactividad" placeholder=""></textarea>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>


  </div>

  <div class="row">
    <!--div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">6.</span> Soporte
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control textuppercase" rows="4" id="soporte" name="soporte" placeholder=""></textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->

     <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">6. Soporte</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <textarea class="form-control textuppercase" rows="4" id="soporte" name="soporte" placeholder=""></textarea>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>
  </div>

  <div class="row">
    <!--div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">7.</span> Observaciones
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control textuppercase" id="observaciones" name="observaciones" rows="4" placeholder=""></textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div-->

    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">7. Observaciones</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <textarea class="form-control textuppercase" id="observaciones" name="observaciones" rows="4" placeholder=""></textarea>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>

  </div>

  <div class="row">
    <!--div class="col-md-3 col-3">
      @if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif
      <input type="hidden" name="idmesreportar" value="{{$idmesreportar}}">
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      <button type="submit" class="btn btn-block btn-dark" id="btnGuardarInfo" name="btnGuardarInfo">Guardar Informaci&oacute;n</button>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="col-md-3 col-3">
      <a class="btn btn-block btn-danger" href="{{ route('programa.index') }}">Cancelar</a>
      <div class="clearfix">&nbsp;</div>
    </div-->


    <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                   @if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif
      <input type="hidden" name="idmesreportar" value="{{$idmesreportar}}">
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      <button type="submit" class="btn btn-block btn-dark" id="btnGuardarInfo" name="btnGuardarInfo">Guardar Informaci&oacute;n</button>
                  </div>
                  <div class="col-md-6">
                     <a class="btn btn-block btn-danger" href="{{ route('programa.index') }}">Cancelar</a>
                  </div>

                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
        </div>


  </div> <!-- del primer .col-md-12 col-12 -->

</form>