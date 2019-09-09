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






    <!--div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-dark">Perfil de Trabajo - {{ Auth::user()->name }}</h3>
          </div>
        </div>
      </div>
    </div-->




<form method="post" action="{{ $action }}" enctype="multipart/form-data">
  {{ csrf_field() }}


<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">


       <div class="col-md-4" style="margin-bottom: 1em;">
            <label>1. Seleccione un Mes</label>
            <select class="form-control" id="mes_admin" name="mes_admin">
            <option value="0">Mes...</option>      
            @foreach( $meses as $mes )
              <option value="{{$mes->idmes}}">{{$mes->mes}}</option>
            @endforeach                        
          </select>
        </div>

        <div class="col-md-4" style="margin-bottom: 1em;">
            <label>2. Seleccione un Área</label>
            <select class="form-control" id="area_admin" name="area_admin" >
              <option value="0">Área...</option>
              @foreach( $areas as $area )
              <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
              @endforeach
            </select>
        </div>

        <div class="col-md-4" style="margin-bottom: 1em;">
          <label>3. Seleccione un Programa</label>
            <select class="form-control" id="programa_admin" name="programa_admin" >
               <option value="0">Programa...</option>
               @foreach( $programas as $programa )
                 <option value="{{$programa->idprograma}}">{{$programa->claveprograma}} - {{$programa->descprograma}}</option>
                @endforeach
             </select>
        </div>

        <div class="col-md-12" style="margin-bottom: 1em;">
          <label>4. Seleccione un Programa Específico</label>
            <select class="form-control" id="programaEsp_admin" name="programaEsp_admin">
                <option value="0">Programa Específico...</option>
            </select>
          </div>


          <div class="col-md-12" style="margin-bottom: 1em;">
          Objetivo: <strong id="objetivo_admin" name="objetivo_admin" class="textoPrincipal"></strong>
          </div>

          <div class="col-md-12" style="margin-bottom: 1em;">
        <label>5. Seleccione una Actividad</label>
          <select class="form-control" id="actividades_admin" name="actividades_admin"></select>
        </div>

         <div class="col-md-12" style="margin-bottom: 1em;">
          Unidad de Medida: <strong id="unidadmedida_admin" name="unidadmedida_admin" class="contenido contcentrado textoPrincipal"></strong><br>
          Cantidad Anual:  <strong id="cantidadanual_admin" name="cantidadanual_admin" class="contenido contcentrado textoPrincipal"></strong>
        </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
    <div class="col-md-12" style="margin-bottom: 1em;">
      <label>Análisis Mensual</label>
      <table class='table table-bordered' style="background: #fff;">
                      <thead>
                        <tr style="background: #fce4ec;">
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
                          <td><span id="enep_admin"></span></td>
                          <td><span id="febp_admin"></span></td>
                          <td><span id="marp_admin"></span></td>
                          <td><span id="abrp_admin"></span></td>
                          <td><span id="mayp_admin"></span></td>
                          <td><span id="junp_admin"></span></td>
                          <td><span id="julp_admin"></span></td>
                          <td><span id="agop_admin"></span></td>
                          <td><span id="sepp_admin"></span></td>
                          <td><span id="octp_admin"></span></td>
                          <td><span id="novp_admin"></span></td>
                          <td><span id="dicp_admin"></span></td>
                          <td><span id="inicio_admin"></span></td>
                          <td><span id="termino_admin"></span></td>
                        </tr>
                        <tr class="contenidotabla">
                          <td class="tittabla">Realizado</td>
                          <td><span id="ener_admin"></span></td>
                          <td><span id="febr_admin"></span></td>
                          <td><span id="marr_admin"></span></td>
                          <td><span id="abrr_admin"></span></td>
                          <td><span id="mayr_admin"></span></td>
                          <td><span id="junr_admin"></span></td>
                          <td><span id="julr_admin"></span></td>
                          <td><span id="agor_admin"></span></td>
                          <td><span id="sepr_admin"></span></td>
                          <td><span id="octr_admin"></span></td>
                          <td><span id="novr_admin"></span></td>
                          <td><span id="dicr_admin"></span></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>

                  <label>Realizado en el Mes Seleccionado:</label>
                  
                    @if(Auth::user()->hasRole('admin'))                         
                        <input type="text" class="form-control cantidadrealizada" id="realizadomes_admin" name="realizadomes_admin" placeholder="" maxlength="3">
                    @else
                        <input disabled type="text" class="form-control cantidadrealizada" id="realizadomes_admin" name="realizadomes_admin" placeholder="" maxlength="3">
                    @endif
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
<div class="col-md-12" style="margin-bottom: 1em;">
  <label>Descripción de la Actividad</label>       
    @if(Auth::user()->hasRole('admin')) 
      <textarea class="form-control textuppercase" rows="4" id="descactividad_admin" name="descactividad_admin" placeholder=""></textarea>
    @else
      <textarea disabled class="form-control textuppercase" rows="4" id="descactividad_admin" name="descactividad_admin" placeholder=""></textarea>  
    @endif
</div>
</div>
</div>      
<div class="row">
<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
<div class="col-md-12" style="margin-bottom: 1em;">
  <label>Soporte</label>   
      @if(Auth::user()->hasRole('admin')) 
        <textarea class="form-control textuppercase" rows="4" id="soporte_admin" name="soporte_admin" placeholder=""></textarea>
      @else
        <textarea disabled class="form-control textuppercase" rows="4" id="soporte_admin" name="soporte_admin" placeholder=""></textarea>
      @endif
</div>
</div>
</div>      
<div class="row">
<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
<div class="col-md-12" style="margin-bottom: 1em;">
  <label>Observaciones</label>
      @if(Auth::user()->hasRole('admin')) 
        <textarea class="form-control textuppercase" id="observaciones_admin" name="observaciones_admin" rows="4" placeholder=""></textarea>
      @else
        <textarea disabled class="form-control textuppercase" id="observaciones_admin" name="observaciones_admin" rows="4" placeholder=""></textarea>
      @endif
</div>
</div>
</div>



<div class="row">
<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;padding:1%;">
<div class="col-md-6" style="margin-bottom: 1em;">
      @if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif      
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      @if(Auth::user()->hasRole('admin')) 
      <button type="submit" class="btn btn-primary" id="btnGuardarInfo_admin" name="btnGuardarInfo_admin">Guardar Informaci&oacute;n</button>      
      @endif      
      @if(Auth::user()->hasRole('admin')) 
      <a class="btn btn-secondary" href="{{ route('programa.index') }}">Cancelar</a>
      @endif  
</form>
</div>

<div class="col-md-6" style="margin-bottom: 1em;">
<form method="post" action="{{ route('reportes.poa') }}" enctype="multipart/form-data" target="_blank">
    {{ csrf_field() }}
     <input type="hidden" id="areareporte" name="areareporte" value="">
    <input type="hidden" id="mesreporte" name="mesreporte" value="">
    <input type="hidden" id="programareporte" name="programareporte" value="">
    <input type="hidden" id="programaespreporte" name="programaespreporte" value="">    
    @if(Auth::user()->hasRole('admin'))   
    <button type="submit" class="btn btn-purple" id="btnReporteMensual_admin" name="btnReporteMensual_admin">Reporte Mensual&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>      
    @endif
  </form> 
</div>


</div>
</div>


    <!--div class="row">

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">1. Seleccione un Mes</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <select class="form-control" id="mes_admin" name="mes_admin">
                      <option value="0">Mes...</option>      
                      @foreach( $meses as $mes )
                        <option value="{{$mes->idmes}}">{{$mes->mes}}</option>
                      @endforeach                        
                    </select>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">2. Seleccione un Área</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <select class="form-control" id="area_admin" name="area_admin" >
                      <option value="0">Área...</option>
                      @foreach( $areas as $area )
                        <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">3. Seleccione un Programa</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <select class="form-control" id="programa_admin" name="programa_admin" >
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

  </div-->


    <!--div class="row">

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">4. Seleccione un Programa Específico</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <select class="form-control" id="programaEsp_admin" name="programaEsp_admin">
                      <option value="0">Programa Específico...</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">5. Seleccione una Actividad</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <select class="form-control" id="actividades_admin" name="actividades_admin">
                    </select>
                  </div>
                </div>
              </div>
            </div>
        </div>
  </div-->


      <!--div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Objetivo</h5>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <p id="objetivo_admin" name="objetivo_admin" class="contenido"></p>
                  </div>
                </div>

              </div>

            </div>
        </div>

        <div class="col-md-2">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Unidad de Medida</h5>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   <p id="unidadmedida_admin" name="unidadmedida_admin" class="contenido contcentrado"></p>
                  </div>

                </div>

              </div>

            </div>
        </div>

        <div class="col-md-2">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Cantidad anual</h5>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <p id="cantidadanual_admin" name="cantidadanual_admin" class="contenido contcentrado"></p>
                  </div>

                </div>

              </div>

            </div>
        </div>

    </div-->


    <!--div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Análisis Mensual</h5>
              </div>
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
                          <td><span id="enep_admin"></span></td>
                          <td><span id="febp_admin"></span></td>
                          <td><span id="marp_admin"></span></td>
                          <td><span id="abrp_admin"></span></td>
                          <td><span id="mayp_admin"></span></td>
                          <td><span id="junp_admin"></span></td>
                          <td><span id="julp_admin"></span></td>
                          <td><span id="agop_admin"></span></td>
                          <td><span id="sepp_admin"></span></td>
                          <td><span id="octp_admin"></span></td>
                          <td><span id="novp_admin"></span></td>
                          <td><span id="dicp_admin"></span></td>
                          <td><span id="inicio_admin"></span></td>
                          <td><span id="termino_admin"></span></td>
                        </tr>
                        <tr class="contenidotabla">
                          <td class="tittabla">Realizado</td>
                          <td><span id="ener_admin"></span></td>
                          <td><span id="febr_admin"></span></td>
                          <td><span id="marr_admin"></span></td>
                          <td><span id="abrr_admin"></span></td>
                          <td><span id="mayr_admin"></span></td>
                          <td><span id="junr_admin"></span></td>
                          <td><span id="julr_admin"></span></td>
                          <td><span id="agor_admin"></span></td>
                          <td><span id="sepr_admin"></span></td>
                          <td><span id="octr_admin"></span></td>
                          <td><span id="novr_admin"></span></td>
                          <td><span id="dicr_admin"></span></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-3 textoPrincipal">
                    Realizado en el Mes Seleccionado:
                  </div>
                  <div class="col-9">
                    @if(Auth::user()->hasRole('admin'))                         
                        <input type="text" class="form-control cantidadrealizada" id="realizadomes_admin" name="realizadomes_admin" placeholder="" maxlength="3">
                    @else
                        <input disabled type="text" class="form-control cantidadrealizada" id="realizadomes_admin" name="realizadomes_admin" placeholder="" maxlength="3">
                    @endif</div>
                </div>
              </div>
            </div>
        </div>

    </div-->



    <!--div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Descripción de la Actividad</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   @if(Auth::user()->hasRole('admin')) 
                    <textarea class="form-control textuppercase" rows="4" id="descactividad_admin" name="descactividad_admin" placeholder=""></textarea>
                  @else
                    <textarea disabled class="form-control textuppercase" rows="4" id="descactividad_admin" name="descactividad_admin" placeholder=""></textarea>
                  @endif
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>



    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Soporte</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   @if(Auth::user()->hasRole('admin')) 
                      <textarea class="form-control textuppercase" rows="4" id="soporte_admin" name="soporte_admin" placeholder=""></textarea>
                    @else
                      <textarea disabled class="form-control textuppercase" rows="4" id="soporte_admin" name="soporte_admin" placeholder=""></textarea>
                    @endif
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>



    <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title textoPrincipal">Observaciones</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                   @if(Auth::user()->hasRole('admin')) 
                      <textarea class="form-control textuppercase" id="observaciones_admin" name="observaciones_admin" rows="4" placeholder=""></textarea>
                    @else
                      <textarea disabled class="form-control textuppercase" id="observaciones_admin" name="observaciones_admin" rows="4" placeholder=""></textarea>
                    @endif
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div-->


    <!--div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                      @if ( ! empty( $put ) )
                        <input type="hidden" name="_method" value="PUT">
                      @endif      
                      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
                      @if(Auth::user()->hasRole('admin')) 
                        <button type="submit" class="btn btn-block btn-dark" id="btnGuardarInfo_admin" name="btnGuardarInfo_admin">Guardar Informaci&oacute;n</button>      
                      @endif      
                    </div>
                    <div class="col-md-6">
                      @if(Auth::user()->hasRole('admin')) 
                      <a class="btn btn-block btn-danger" href="{{ route('programa.index') }}">Cancelar</a>
                      @endif  
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

  </form-->



      <!--div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                          <form method="post" action="{{ route('reportes.poa') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" id="areareporte" name="areareporte" value="">
                            <input type="hidden" id="mesreporte" name="mesreporte" value="">
                            <input type="hidden" id="programareporte" name="programareporte" value="">
                            <input type="hidden" id="programaespreporte" name="programaespreporte" value="">    
                            @if(Auth::user()->hasRole('admin'))   
                            <button type="submit" class="btn btn-block btn-purple" id="btnReporteMensual_admin" name="btnReporteMensual_admin">Reporte Mensual&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>      
                            @endif

                      </form> 
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div-->




  <!--div class="row">
    <div class="col-3 col-lg-3 col-md-3">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper">
              <div class="ribbon ribbon-primary ribbon-perfil">                
                <h4>Perfil de Trabajo</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-4 col-lg-4 col-md-4">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa ribbon-area">
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
  </div-->


  <!--div class="row">

    <div class="col-4 col-lg-4 col-md-4">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">1.</span> Seleccione un Mes
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divActividad">
                    <select class="form-control" id="mes_admin" name="mes_admin">
                      <option value="0">Mes...</option>      
                      @foreach( $meses as $mes )
                        <option value="{{$mes->idmes}}">{{$mes->mes}}</option>
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


    <div class="col-4 col-lg-4 col-md-4">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">2.</span> Seleccione un Área
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <select class="form-control" id="area_admin" name="area_admin" >
                      <option value="0">Área...</option>
                      @foreach( $areas as $area )
                        <option value="{{$area->idarea}}">{{$area->nombrearea}}</option>
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


    <div class="col-4 col-lg-4 col-md-4">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">3.</span> Seleccione un Programa
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <select class="form-control" id="programa_admin" name="programa_admin" >
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


  </div-->

  <!--div class="row">


    <div class="col-4 col-lg-4 col-md-4">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">4.</span> Seleccione un Programa Específico
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divProgramaEsp">
                    <select class="form-control" id="programaEsp_admin" name="programaEsp_admin">
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

    <div class="col-8 col-lg-8 col-md-8">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos">5.</span> Seleccione una Actividad
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group" id="divActividad">
                    <select class="form-control" id="actividades_admin" name="actividades_admin">
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div-->




  <!--div class="row">
    <div class="col-8 col-lg-8 col-md-8">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                Objetivo / 
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <p id="objetivo_admin" name="objetivo_admin" class="contenido"></p>
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
                    <p id="unidadmedida_admin" name="unidadmedida_admin" class="contenido contcentrado"></p>
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
                    <p id="cantidadanual_admin" name="cantidadanual_admin" class="contenido contcentrado"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div-->



  <!--div class="row">

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
                          <td><span id="enep_admin"></span></td>
                          <td><span id="febp_admin"></span></td>
                          <td><span id="marp_admin"></span></td>
                          <td><span id="abrp_admin"></span></td>
                          <td><span id="mayp_admin"></span></td>
                          <td><span id="junp_admin"></span></td>
                          <td><span id="julp_admin"></span></td>
                          <td><span id="agop_admin"></span></td>
                          <td><span id="sepp_admin"></span></td>
                          <td><span id="octp_admin"></span></td>
                          <td><span id="novp_admin"></span></td>
                          <td><span id="dicp_admin"></span></td>
                          <td><span id="inicio_admin"></span></td>
                          <td><span id="termino_admin"></span></td>
                        </tr>
                        <tr class="contenidotabla">
                          <td class="tittabla">Realizado</td>
                          <td><span id="ener_admin"></span></td>
                          <td><span id="febr_admin"></span></td>
                          <td><span id="marr_admin"></span></td>
                          <td><span id="abrr_admin"></span></td>
                          <td><span id="mayr_admin"></span></td>
                          <td><span id="junr_admin"></span></td>
                          <td><span id="julr_admin"></span></td>
                          <td><span id="agor_admin"></span></td>
                          <td><span id="sepr_admin"></span></td>
                          <td><span id="octr_admin"></span></td>
                          <td><span id="novr_admin"></span></td>
                          <td><span id="dicr_admin"></span></td>
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
                    <span class="fraserealizado"><span class="numpasos">4.</span> Realizado en el Mes Seleccionado: </span><span class="titareames">  </span>
                  </div>
                  <div class="col-3">
                    <div class="form-group">                  
                      @if(Auth::user()->hasRole('admin'))                         
                        <input type="text" class="form-control cantidadrealizada" id="realizadomes_admin" name="realizadomes_admin" placeholder="" maxlength="3">
                      @else
                        <input disabled type="text" class="form-control cantidadrealizada" id="realizadomes_admin" name="realizadomes_admin" placeholder="" maxlength="3">
                      @endif
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->

  <!--div class="row">
    <div class="col-12 col-lg-12 col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-blanco">
              <div class="ribbon ribbon-primary">
                <span class="numpasos"></span> Descripción de la Actividad
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                  @if(Auth::user()->hasRole('admin')) 
                    <textarea class="form-control textuppercase" rows="4" id="descactividad_admin" name="descactividad_admin" placeholder=""></textarea>
                  @else
                    <textarea disabled class="form-control textuppercase" rows="4" id="descactividad_admin" name="descactividad_admin" placeholder=""></textarea>
                  @endif
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
                <span class="numpasos"></span> Soporte
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    @if(Auth::user()->hasRole('admin')) 
                      <textarea class="form-control textuppercase" rows="4" id="soporte_admin" name="soporte_admin" placeholder=""></textarea>
                    @else
                      <textarea disabled class="form-control textuppercase" rows="4" id="soporte_admin" name="soporte_admin" placeholder=""></textarea>
                    @endif
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
                <span class="numpasos"></span> Observaciones
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    @if(Auth::user()->hasRole('admin')) 
                      <textarea class="form-control textuppercase" id="observaciones_admin" name="observaciones_admin" rows="4" placeholder=""></textarea>
                    @else
                      <textarea disabled class="form-control textuppercase" id="observaciones_admin" name="observaciones_admin" rows="4" placeholder=""></textarea>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->

  <!--div class="row">
    <div class="col-md-3 col-3">
      @if ( ! empty( $put ) )
        <input type="hidden" name="_method" value="PUT">
      @endif      
      <input type="hidden" name="redirect" value="{{ route('programa.index') }}">
      @if(Auth::user()->hasRole('admin')) 
        <button type="submit" class="btn btn-block btn-dark" id="btnGuardarInfo_admin" name="btnGuardarInfo_admin">Guardar Informaci&oacute;n</button>      
        <div class="clearfix">&nbsp;</div>
      @endif      
    </div>
    <div class="col-md-3 col-3">
      @if(Auth::user()->hasRole('admin')) 
      <a class="btn btn-block btn-danger" href="{{ route('programa.index') }}">Cancelar</a>
      <div class="clearfix">&nbsp;</div>
      @endif      
    </div>

  </div>

</form-->

<!--form method="post" action="{{ route('reportes.poa') }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
  {{ csrf_field() }}

  <div class="row">
    <div class="col-md-3 col-3">  
      <input type="hidden" id="areareporte" name="areareporte" value="">
      <input type="hidden" id="mesreporte" name="mesreporte" value="">
      <input type="hidden" id="programareporte" name="programareporte" value="">
      <input type="hidden" id="programaespreporte" name="programaespreporte" value="">    
      @if(Auth::user()->hasRole('admin'))   
      <button type="submit" class="btn btn-block btn-purple" id="btnReporteMensual_admin" name="btnReporteMensual_admin">Reporte Mensual&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>      
      <div class="clearfix">&nbsp;</div>
      @endif
    </div>
  </div>

</form-->  