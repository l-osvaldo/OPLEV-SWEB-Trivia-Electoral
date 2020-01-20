

@extends('layouts.app')

@section('content')

<style type="text/css">
#titPOA{width: 100%; background-color: #f8bbd0; color: #000;text-align: center;padding: .5% 0;float: left;border-bottom:solid 4px #f5f5f5;}
.colPOA{float: left;height: 125px;}
#colPOA1{width: 10%;position: relative;background-color: #fff;border-right: solid 4px #f5f5f5;border-bottom:solid 4px #f5f5f5;}
#colPOA1 img {margin: 0;position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%);}
#colPOA2{width: 25%;}
#colPOA3{width: 65%; border-left: solid 4px #f5f5f5;}

#colPOA4{width: 2.5%; border-right: solid 4px #f5f5f5;background: #cfd8dc;text-align: center;}
#colPOA5{width: 32.7%; border-right: solid 4px #f5f5f5;background: #cfd8dc;text-align: center;}
#colPOA6{width: 17%; border-right: solid 4px #f5f5f5;background: #cfd8dc;text-align: center;}
#colPOA7{width: 40.7%; border-right: solid 4px #f5f5f5;background: #cfd8dc;text-align: center;}
#colPOA8{width: 7.1%; background: #cfd8dc;text-align: center;}

#addAct{font-size: 1.2em; color: #293338;background-color: #fff;padding: 0 .5%;display: inline;border-radius: 5px;border:dashed 1px #ccc;}
#addAct:hover{color: #EA0D94;}

.iconInfo{cursor: pointer;font-size: 1.2em !important; color: #293338;background-color: #fff;padding: 0 .5%;display: inline-block;}
.iconInfo:hover{color: #EA0D94;}

.iconBH{cursor: pointer;font-size: 1.2em !important; color: #293338;float: left;background-color: #fff; margin-right: .5%;padding: 5px;border-radius: 5px;border:dashed 1px #ccc;margin: 4px 4px 4px 0;}
.iconBH:hover{color: #EA0D94;}

.iconOb{cursor: pointer;font-size: 1.2em !important; color: #293338;float: left;background-color: #fff; float: right;cursor: pointer;}
.iconOb:hover{color: #EA0D94;}

.iconBHD{cursor: pointer;font-size: 1.2em !important; color: #293338;background-color: #fff;padding: 5px;border-radius: 5px;border:dashed 1px #ccc;margin: 4px 4px 4px 0;float: left;}
.iconBHD:hover{color: #EA0D94;}

.textCPOA{text-align: center;}
.colPOA2da{float: left;}


.item1{width: 2.5%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;}
.item2{width: 32.7%; border-right: solid 4px #f5f5f5;background: #fff;text-align: left;height: auto;}
.item3{width: 8.5%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;}
.item4{width: 8.5%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;}
.itemMes{float: left;background:#fff;border-right:solid 4px #f5f5f5;height: 100%;}
.allItemMes{width: 40.7%;border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;position: relative;}
.item5{width: 3.5555555%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;text-transform: uppercase;}
.item6{width: 3.5%; background: #fff;text-align: center;height: auto;line-height: normal;text-transform: uppercase;}
.bhactividad{width: 100%; border-top: solid 4px #f5f5f5;text-align: center;vertical-align: middle;}

.rowAct{height: auto;border-bottom: 1px solid #fff;margin-top: 10px;}

.content-wrapper{display: flex;}
.up{animation-delay: 2s;}
.down{animation-delay: 2s;}

.totalUno{width: 43.7%;border-right: solid 4px #f5f5f5;text-align: right;margin-top: 1%;padding-right: .5%;float: left;height: auto;color: #EA0D94;}
.totalDos{width: 8.5%;border-right: solid 4px #f5f5f5;background: #fff;text-align: center;margin-top: 1%;float: left;height: auto;}
.totalesMes{border-right: solid 4px #f5f5f5;text-align: center;float: left;font-size: 14px;background: #fff;}
.allItemTotal{width: 40.7%;text-align: center;height: auto;margin-top: 1%;}
.contTotale{float: left;}
#ePrograma,#eProgramaEsp,#eProgramaA,#eProgramaEspA,#eunidad,#ModalTitle{color:#EA0D94;cursor: pointer;}
.form-control:disabled, .form-control[readonly]{color: #ccc !important;}
.indLabel{background: #cfd8dc;margin-bottom: 1px;border:solid 2px #fff;text-align: center;min-height: 30px; height: 30px;height: auto !important;}
.indEdit{background: #fce4ec;margin-bottom: 1px;text-align: left;min-height: 30px; height: 30px;height: auto !important;border-right: 2px solid #fff;border-left: 2px solid #fff;}
.indEditE{background: #fce4ec;margin-bottom: 1px;text-align: left;min-height: 30px; height: 30px;height: auto !important;}
.indBlanco{background: #eceff1;margin-bottom: 1px;border:solid 2px #fff;text-align: center;min-height: 30px; height: 30px;height: auto !important;}
.indRosa{background: #fce4ec;margin-bottom: 1px;border:solid 2px #fff;text-align: center;min-height: 30px; height: 30px;height: auto !important;}
.obsTexto{border:solid 1px #f8bbd0;margin:3px 0;position: relative;background: #fff;}
#addObservaciones{cursor: pointer;}
.contIconObs{background: #eceff1;margin: 0 0 5px 0;display: flex;align-items: center;justify-content: center;color: #090 !important;}
.contIconObsVal{background: #eceff1;margin: 0 0 5px 0;display: flex;align-items: center;justify-content: center;border-radius: 0 5px 5px 0;}
.iconObs{color: #EA0D94; font-size: 18px;}
.iconObsVer{color: #090; font-size: 18px;}
.contObstext{background-color: #eceff1; margin-bottom:5px; padding: 3px; border-radius: 5px 0 0 5px;}
#contObservaciones{padding: 5px; min-height: 20px; height: 20px; height: auto !important; }
.contObse{margin: 4px 0;background: #eceff1;padding: 5px; border-radius: 5px;}
.checkObs,.checObsVal{cursor: pointer;}
.btnpdfpoa{border:solid 1px #f9f9f9; background: #eceff1;border-radius: 3px; padding: 5px; margin-left: 30px;cursor: pointer;}
.btnpdfpoa:hover{color: #EA0D94;background: #fff;}
.btnpdfpoaI{border:solid 1px #EA0D94; background: #EA0D94;border-radius: 3px; padding: 5px; margin-left: 10px;cursor: pointer;color: #fff;}
.btnpdfpoaI:hover{color: #EA0D94;background: #fff;}
.inputDime{cursor: pointer;}
</style>



  <!-- Main content -->
  <section class="content" style="padding-top: .5%;">
    <!-- Espacio de Trabajo -->

      <div  id="titPOA" class="col-md-12">PROGRAMA OPERATIVO ANUAL 2020 
        <i class="fa fa-file-pdf-o btnpdfpoa" aria-hidden="true" id="pdfela"></i> 

        <!--i class="fa fa-file-pdf-o btnpdfpoa" aria-hidden="true" id="pdfelaAll"></i-->
      </div>
      <!--COLUMNAS-->
      <div class="colPOA" id="colPOA1">
        <img src="{{ asset('images/logoople.png') }}" alt="OPLE" class="ImgLogo" width="80%">
      </div>
      <!--COLUMNAS-->
      <div class="colPOA" id="colPOA2">
        <div class="col-md-12 textCPOA" style="background-color: #fff;float: left;height: 27px; line-height: 17px;border-bottom:solid 4px #f5f5f5;">
          <small>Programa general:</small>
        </div>
        <div class="col-md-4 textCPOA" style="background-color: #fff;float: left;height: 45px; line-height: 38px;border-bottom:solid 4px #f5f5f5;border-right:solid 4px #f5f5f5;">
          <small>Clave: <strong id="claveProEsp">-- --</strong></small>
        </div>
        <div class="col-md-8 textCPOA" style="background-color: #fff;float: left;height: 45px; line-height: 38px;border-bottom:solid 4px #f5f5f5;">
          

          @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
         <select class="form-control" style="border: 0;font-weight: bold;font-size: small;" id="ePrograma" name="eprograma" disabled="">
              <option value="0">Seleccione un programa</option>
              @foreach( $programas as $programa )
              <option value="{{$programa->idprograma}}">{{$programa->descprograma}}</option>
               @endforeach
          </select>
        @else
          <select class="form-control" style="border: 0;font-weight: bold;font-size: small;" id="ePrograma" name="eprograma">
                <option value="0">Seleccione un programa</option>
                @foreach( $programas as $programa )
                <option value="{{$programa->idprograma}}">{{$programa->descprograma}}</option>
                 @endforeach
              </select>
        @endif

            
         

        </div>
        <div class="col-md-12 textCPOA" style="background-color: #fff;float: left;height: 53px; line-height: 53px;border-bottom:solid 4px #f5f5f5;padding-top: 5px;">

          

        @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
         <select class="form-control" style="border: 0;font-weight: bold;font-size: small;" id="eProgramaEsp" name="eprogramaesp" disabled="">
              <option value="0">Seleccione un programa especifico</option>
            </select>
        @else
          <select class="form-control" style="border: 0;font-weight: bold;font-size: small;" id="eProgramaEsp" name="eprogramaesp" disabled="">
              <option value="0">Seleccione un programa especifico</option>
            </select>
        @endif

        </div>
      </div>
      <!--COLUMNAS-->
      <div class="colPOA" id="colPOA3">
        <div class="col-md-3 textCPOA" style="background-color: #fff;float: left;height: 72px; line-height: 70px;border-bottom:solid 4px #f5f5f5;border-right:solid 4px #f5f5f5">
          <small>Ejercicio <strong>2020</strong></small>
        </div>
        <div class="col-md-9 textCPOA" style="background-color: #fff;float: left;height: 72px; line-height: 30px;border-bottom:solid 4px #f5f5f5;">
          <!-- Aside -->


      @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
         <small>Unidad responsable:</small><br>
         <select class="form-control" style="border: 0;font-weight: bold;font-size: small;" id="eunidad" name="eunidad">
                <option value="0">Seleccione una unidad</option>
                @foreach( $unidades as $unidad )
                <option value="{{$unidad->idarea}}">{{$unidad->name}}</option>
                 @endforeach
          </select>
      @else
        <small>Unidad responsable:<br><strong id="eunidad">{{ Auth::user()->name }}</strong></small>
      @endif

          
        </div>
        <div class="col-md-12 textCPOA" style="background-color: #fff;float: left;height: 53px; line-height: 53px;border-bottom:solid 4px #f5f5f5;overflow: hidden;font-size: small;
  text-overflow: ellipsis">
          Objetivo: <strong id="objetivoProEsp" data-toggle="tooltip" data-placement="top">---</strong>
        </div>
      </div>


      <!--COLUMNAS 2DA PARTE-->
      <div class="colPOA2da" id="colPOA4" style="line-height: 77px;height: 77px;">
        <small><strong>No.</strong></small>
      </div>
      <div class="colPOA2da" id="colPOA5" style="line-height: 77px;height: 77px;">
        <small>
          <strong>Actividad</strong> 
        </small>



        @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
           
        @else
          <div class="iconInfo btnOff" id="addAct" data-toggle="tooltip" data-placement="right" title="Agregar Actividad" style="pointer-events: none; color: rgb(236, 239, 241);">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </div>
        @endif


        
      </div>
      <div class="colPOA2da" id="colPOA6">
        <div class="col-md-12" style="line-height: 30px;height: 30px;"><small><strong>Meta</strong></small></div>
        <div class="col-md-6" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Unidad de medida</small></div>
        <div class="col-md-6" style="line-height: 20px;float: left;background:#fafafa; height: 47px;"><small>Cantidad anual programado</small></div>
      </div>
      <div class="colPOA2da" id="colPOA7" style="line-height: 30px;height: 30px;">
        <div class="col-md-12"><small><strong>Programación mensual</strong></small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Ene</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Feb</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Mar</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Abr</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>May</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Jun</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Jul</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Ago</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Sep</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Oct</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 2px #f5f5f5;"><small>Nov</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-left:solid 2px #f5f5f5;"><small>Dic</small></div>
      </div>
      <div class="colPOA2da" id="colPOA8" style="line-height: 30px;height: 30px;">
        <div class="col-md-12"><small><strong>Fecha</strong></small></div>
        <div class="col-md-6" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 2px #f5f5f5;"><small>Inicio</small></div>
        <div class="col-md-6" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-left:solid 2px #f5f5f5;"><small>Término</small></div>
      </div>

      <!--div class="col-md-12" style="float: left;margin-top: 4px;">
        <div class="row">
          <div class="iconInfo" id="addAct" data-toggle="tooltip" data-placement="right" title="Agregar Actividad"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
        </div>
      </div-->


      <div class="col-md-12" id="contActividades" style="float: left;margin-top: 4px;height: auto;min-height: 100px;background-color: #fff;">
        
      </div>

      <div class="col-md-12 contTotale">
      <div class="row">
          <div class="totalUno">Total programado mensual</div>
          <div id="resultTPM" class="totalDos">0</div>
          <div class="allItemTotal">
            <div id="r1M0" class="col-md-1 totalesMes">0</div>
            <div id="r1M1" class="col-md-1 totalesMes">0</div>
            <div id="r1M2" class="col-md-1 totalesMes">0</div>
            <div id="r1M3" class="col-md-1 totalesMes">0</div>
            <div id="r1M4" class="col-md-1 totalesMes">0</div>
            <div id="r1M5" class="col-md-1 totalesMes">0</div>
            <div id="r1M6" class="col-md-1 totalesMes">0</div>
            <div id="r1M7" class="col-md-1 totalesMes">0</div>
            <div id="r1M8" class="col-md-1 totalesMes">0</div>
            <div id="r1M9" class="col-md-1 totalesMes">0</div>
            <div id="r1M10" class="col-md-1 totalesMes">0</div>
            <div id="r1M11" class="col-md-1 totalesMes">0</div>
          </div>
        </div>

        <div class="row">
          <div class="totalUno">Total programado acumulado mensual</div>
          <div class="totalDos"></div>
          <div class="allItemTotal">
            <div id="r2M0" class="col-md-1 totalesMes">0</div>
            <div id="r2M1" class="col-md-1 totalesMes">0</div>
            <div id="r2M2" class="col-md-1 totalesMes">0</div>
            <div id="r2M3" class="col-md-1 totalesMes">0</div>
            <div id="r2M4" class="col-md-1 totalesMes">0</div>
            <div id="r2M5" class="col-md-1 totalesMes">0</div>
            <div id="r2M6" class="col-md-1 totalesMes">0</div>
            <div id="r2M7" class="col-md-1 totalesMes">0</div>
            <div id="r2M8" class="col-md-1 totalesMes">0</div>
            <div id="r2M9" class="col-md-1 totalesMes">0</div>
            <div id="r2M10" class="col-md-1 totalesMes">0</div>
            <div id="r2M11" class="col-md-1 totalesMes">0</div>
          </div>
        </div>

        <div class="row">
          <div class="totalUno">Porcentaje mensual</div>
          <div class="totalDos"></div>
          <div class="allItemTotal">
            <div id="r3M0" class="col-md-1 totalesMes">0</div>
            <div id="r3M1" class="col-md-1 totalesMes">0</div>
            <div id="r3M2" class="col-md-1 totalesMes">0</div>
            <div id="r3M3" class="col-md-1 totalesMes">0</div>
            <div id="r3M4" class="col-md-1 totalesMes">0</div>
            <div id="r3M5" class="col-md-1 totalesMes">0</div>
            <div id="r3M6" class="col-md-1 totalesMes">0</div>
            <div id="r3M7" class="col-md-1 totalesMes">0</div>
            <div id="r3M8" class="col-md-1 totalesMes">0</div>
            <div id="r3M9" class="col-md-1 totalesMes">0</div>
            <div id="r3M10" class="col-md-1 totalesMes">0</div>
            <div id="r3M11" class="col-md-1 totalesMes">0</div>
          </div>
        </div>

        <div class="row">
          <div class="totalUno">Porcentaje acumulado mensual</div>
          <div class="totalDos"></div>
          <div class="allItemTotal">
            <div id="r4M0" class="col-md-1 totalesMes">0</div>
            <div id="r4M1" class="col-md-1 totalesMes">0</div>
            <div id="r4M2" class="col-md-1 totalesMes">0</div>
            <div id="r4M3" class="col-md-1 totalesMes">0</div>
            <div id="r4M4" class="col-md-1 totalesMes">0</div>
            <div id="r4M5" class="col-md-1 totalesMes">0</div>
            <div id="r4M6" class="col-md-1 totalesMes">0</div>
            <div id="r4M7" class="col-md-1 totalesMes">0</div>
            <div id="r4M8" class="col-md-1 totalesMes">0</div>
            <div id="r4M9" class="col-md-1 totalesMes">0</div>
            <div id="r4M10" class="col-md-1 totalesMes">0</div>
            <div id="r4M11" class="col-md-1 totalesMes">0</div>
          </div>
        </div>
      </div>




  </section>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalIndicador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center !important;">
        <h5 class="modal-title" id="exampleModalLongTitle">Cédula Descriptiva de Indicadores 2020</h5> <i class="fa fa-file-pdf-o btnpdfpoaI" aria-hidden="true" id="pdfIndicador" data-id=""></i>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 indLabel">Área responsable:</div>
            <div class="col-md-8 indBlanco" style="text-align: center;">{{ Auth::user()->name }}</div>
          </div>
          <div class="row">
            <div class="col-md-5 indLabel">Identificador de indicador</div>
            <div class="col-md-7 indLabel">Nombre del indicador</div>
          </div>
          <div class="row">
            <div class="col-md-5 indEdit" id="identificadorindicador"></div>
            <div class="col-md-7 indEdit" id="nombreindicador"></div>
          </div>
          <div class="row">
            <div class="col-md-3 indLabel">Objetivo</div>
            <div class="col-md-9 indEdit" id="objetivoindicador"></div>
          </div>
          <div class="row">
            <div class="col-md-6 indLabel">Meta</div>
            <div class="col-md-6 indLabel">Periodo de cumplimiento</div>
          </div>
          <div class="row">
            <div class="col-md-6 indBlanco" id="metaindicador">100%</div>
            <div class="col-md-6 indBlanco" id="periodocumplimiento">Enero - Diciembre 2019</div>
          </div>
          <div class="row">
            <div class="col-md-2 indLabel">Programa Presupuestario</div>
            <div class="col-md-3 indBlanco">01. Desarrollo y Fortalecimiento Institucional</div>
            <div class="col-md-2 indBlanco">02. Proceso Electoral</div>
            <div class="col-md-2 indBlanco">03. Cartera de Proyectos</div>
            <div class="col-md-3 indBlanco">04. Prerrogativas y Partidos Políticos</div>
          </div>
          <div class="row">
            <div class="col-md-2 indLabel"></div>
            <div class="col-md-3 indBlanco" id="idprograma1"></div>
            <div class="col-md-2 indBlanco" id="idprograma2"></div>
            <div class="col-md-2 indBlanco" id="idprograma3"></div>
            <div class="col-md-3 indBlanco" id="idprograma4"></div>
          </div>
          <div class="row">
            <div class="col-md-3 indLabel">Definición</div>
            <div class="col-md-6 indLabel">Dimensión a medir</div>
            <div class="col-md-3 indLabel">Unidad de medida</div>
          </div>
          <div class="row">
            <div class="col-md-3 indEdit" id="definicionindicador">Llevar a cabo las actualizaciones del portal web</div>
            <div class="col-md-6">
              <div class="row">

                  <div class="col-md-3 indBlanco">Eficacia</div>
                  <div class="col-md-3 indBlanco">Eficiencia</div>
                  <div class="col-md-3 indBlanco">Economía</div>
                  <div class="col-md-3 indBlanco">Calidad</div>

                  <div class="col-md-3 indRosa">
                    <input class="inputDime" type="radio" name="dimension" value="1" id="dimensionmedir1">
                  </div>
                  <div class="col-md-3 indRosa">
                    <input class="inputDime" type="radio" name="dimension" value="2" id="dimensionmedir2">
                  </div>
                  <div class="col-md-3 indRosa">
                    <input class="inputDime" type="radio" name="dimension" value="3" id="dimensionmedir3">
                  </div>
                  <div class="col-md-3 indRosa">
                    <input class="inputDime" type="radio" name="dimension" value="4" id="dimensionmedir4">
                  </div>

              </div>
            </div>
            <div class="col-md-3 indEdit" id="unidadmedida"></div>
          </div>

          <div class="row">
            <div class="col-md-12 indLabel">Método de Cálculo</div>
          </div>

          <div class="row">
            <div class="col-md-12 indEdit" id="metodocalculo"></div>
          </div>

           <div class="row">
            <div class="col-md-4 indLabel">Variable</div>
            <div class="col-md-4 indLabel">Descripción de la variable</div>
            <div class="col-md-4 indLabel">Fuentes de Información</div>
          </div>

          <div class="row">
            <div class="col-md-4 indEdit" id="variable1"></div>
            <div class="col-md-4 indEdit" id="descripcionvariable1"></div>
            <div class="col-md-4 indEdit" id="fuentesinfovariable1"></div>
          </div>

          <div class="row">
            <div class="col-md-4 indEdit" id="variable2"></div>
            <div class="col-md-4 indEdit" id="descripcionvariable2"></div>
            <div class="col-md-4 indEdit" id="fuentesinfovariable2"></div>
          </div>

           <div class="row">
            <div class="col-md-12 indLabel">Frecuencia de medición</div>
          </div>

          <div class="row">
            <div class="col-md-2 indBlanco">Mensual</div>
            <div class="col-md-3 indBlanco">Trimestral</div>
            <div class="col-md-2 indBlanco">Semestral</div>
            <div class="col-md-2 indBlanco">Anual</div>
            <div class="col-md-3 indBlanco">Otro (especificar)</div>
          </div>

          <div class="row">
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="frecuencia" value="1" id="frecuenciamedicion1">
            </div>
            <div class="col-md-3 indRosa">
              <input class="inputDime" type="radio" name="frecuencia" value="2" id="frecuenciamedicion2">
            </div>
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="frecuencia" value="3" id="frecuenciamedicion3">
            </div>
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="frecuencia" value="4" id="frecuenciamedicion4">
            </div>
            <div class="col-md-3 indRosa">
              <input class="inputDime" type="radio" name="frecuencia" value="5" id="frecuenciamedicion5">
               <div class="row">
                <div class="indEditE col-md-12" id="frecuenciaespecifique" style="display: none;border-top: 4px solid #fff;"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 indLabel">Fundamento Jurídico</div>
          </div>

          <div class="row">
            <div class="col-md-12 indEdit" id="fundamentojuridico"></div>
          </div>

          <div class="row">
            <div class="col-md-4 indLabel">Línea Base</div>
            <div class="col-md-8 indLabel">Comportamiento del indicador hacia la meta</div>
          </div>
          <div class="row">
            <div class="col-md-2 indBlanco">Valor</div>
            <div class="col-md-2 indBlanco">Año</div>
            <div class="col-md-2 indBlanco">Ascendente</div>
            <div class="col-md-2 indBlanco">Descendente</div>
            <div class="col-md-2 indBlanco">Regular</div>
            <div class="col-md-2 indBlanco">Nominal</div>
          </div>
          <div class="row">
            <div class="col-md-2 indEdit" id="lineabasev"></div>
            <div class="col-md-2 indEdit" id="lineabasea"></div>
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="comportamiento" value="1" id="comportamientoindicador1">
            </div>
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="comportamiento" value="2" id="comportamientoindicador2">
            </div>
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="comportamiento" value="3" id="comportamientoindicador3">
            </div>
            <div class="col-md-2 indRosa">
              <input class="inputDime" type="radio" name="comportamiento" value="4" id="comportamientoindicador4">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 indLabel">Nombre, cargo y firma del titular de la Unidad Responsable</div>
            <div class="col-md-8 indBlanco" id="nombretitular">{{ Auth::user()->titular }}<br>{{ Auth::user()->cargo }}</div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="updateIndicador">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalOpservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #eceff1;">

          <h5 class="modal-title" id="ModalTitle"></h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 

            <h5 id="addObservaciones">Nueva Observación <i class="fa fa-plus-circle" aria-hidden="true"></i></h5>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-12" id="contObservaciones">
                
              </div>
            </div>

            <button type="button" class="btn btn-primary" id="sendObservaciones">Enviar</button>
            <hr>
            <h5 id="dataHistorial"></h5>
            <div class="row" style="margin-bottom: 20px;" id="getObs"></div>

            <button type="button" class="btn btn-primary" id="sendObsVal" disabled>Validar</button>
            @else
            <h5 id="dataHistorial"></h5>
            <div class="row" style="margin-bottom: 20px;" id="getObs"></div>
            <button type="button" class="btn btn-primary" id="sendObservaciones" disabled>Enviar reporte</button>
            @endif


          </div>
        </div>
      </div>
      <div class="modal-footer">

        <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button-->
        
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ingrese su clave de confirmación.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3"><i class="fa fa-key" aria-hidden="true"></i></span>
          </div>
          <input type="password" class="form-control" id="claveEliminar" name="claveEliminar" aria-describedby="basic-addon3" maxlength="6">

        </div>
        <div id="errorEmail" class="hidden" style="color: red;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="borraActividad" data-mes="">Eliminar</button>
      </div>
    </div>
  </div>
</div>


@endsection