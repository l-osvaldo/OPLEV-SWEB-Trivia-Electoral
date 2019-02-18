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


  <div class="row">
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
  </div>



  <div class="row">

    <div class="col-5 col-lg-5 col-md-5">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                1. Seleccione un Programa
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <select class="form-control" id="programa" name="programa">
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
    </div>

    <div class="col-7 col-lg-7 col-md-7">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                2. Seleccione un Programa Específico
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
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-lg-12 col-md-12">
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
    </div>
  </div>

  <div class="row">

    <div class="col-8 col-lg-8 col-md-8">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                3. Seleccione una Actividad
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
    </div>

    <div class="col-2 col-lg-2 col-md-2">
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
    </div>

    <div class="col-2 col-lg-2 col-md-2">
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
    </div>
  </div>

  <div class="row">

    <div class="col-12 col-lg-12 col-md-12">
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
                          <th>Meses</th>
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
                          <th>Inicio</th>
                          <th>Termino</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Programado</td>
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
                        <tr>
                          <td>Realizado</td>
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

                  <span class="fraserealizado">Realizado en este Mes:</span>
                  <div class="form-group">                  
                    <input type="text" class="form-control" placeholder="">
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Descripción de la Actividad
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control" rows="4" placeholder="Actividad ..."></textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Soporte
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control" rows="4" placeholder="Soporte de la actividad ..."></textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Observaciones
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  <textarea class="form-control" rows="4" placeholder="Observaciones ..."></textarea>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
