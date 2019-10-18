

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

#addAct{font-size: 1.2em; color: #546e7a;background-color: #fff;padding: 0 .5%;display: inline;border-radius: 5px;border:dashed 1px #ccc;}
#addAct:hover{color: #EA0D94;}

.iconInfo{cursor: pointer;font-size: 1.2em !important; color: #546e7a;background-color: #fff;padding: 0 .5%;display: inline-block;}
.iconInfo:hover{color: #EA0D94;}

.iconBH{cursor: pointer;font-size: 1.2em !important; color: #546e7a;float: left;background-color: #fff; margin-right: .5%;padding: 5px;border-radius: 5px;border:dashed 1px #ccc;margin: 4px 4px 4px 0;}
.iconBH:hover{color: #EA0D94;}

.iconBHD{cursor: pointer;font-size: 1.2em !important; color: #546e7a;background-color: #fff;padding: 5px;border-radius: 5px;border:dashed 1px #ccc;margin: 4px 4px 4px 0;float: left;}
.iconBHD:hover{color: #EA0D94;}

.textCPOA{text-align: center;}
.colPOA2da{float: left;}


.item1{width: 2.5%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;}
.item2{width: 32.7%; border-right: solid 4px #f5f5f5;background: #fff;text-align: left;height: auto;}
.item3{width: 8.5%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;}
.item4{width: 8.5%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;}
.itemMes{float: left;background:#fff;border-right:solid 4px #f5f5f5;height: 100%;}
.itemMesF{float: left;background:#fff;height: 100%;}
.allItemMes{width: 40.7%;border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;position: relative;}
.item5{width: 3.5555555%; border-right: solid 4px #f5f5f5;background: #fff;text-align: center;height: auto;text-transform: uppercase;}
.item6{width: 3.5%; background: #fff;text-align: center;height: auto;line-height: normal;text-transform: uppercase;}
.bhactividad{width: 100%; border-top: solid 4px #f5f5f5;text-align: center;vertical-align: middle;}

.rowAct{height: auto;border-bottom: 1px solid #fff;margin-top: 10px;}

.content-wrapper{display: flex;}
.up{animation-delay: 2s;}
.down{animation-delay: 2s;}

</style>

<div class="col-md-12">
  <!-- Main content -->
  <section class="content" style="padding-top: .5%;">
    <!-- Espacio de Trabajo -->

      <div  id="titPOA" class="col-md-12">PROGRAMA OPERATIVO ANUAL {{ now()->year }}</div>
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
          <small>Clave: <strong>E3 03</strong></small>
        </div>
        <div class="col-md-8 textCPOA" style="background-color: #fff;float: left;height: 45px; line-height: 38px;border-bottom:solid 4px #f5f5f5;">
          <small> <i class="iconInfo fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Seleccione un programa"></i> <strong>Cartera de proyectos</strong></small>
        </div>
        <div class="col-md-12 textCPOA" style="background-color: #fff;float: left;height: 53px; line-height: 53px;border-bottom:solid 4px #f5f5f5;">
          <small><strong>Capacitación permanente</strong></small>
        </div>
      </div>
      <!--COLUMNAS-->
      <div class="colPOA" id="colPOA3">
        <div class="col-md-3 textCPOA" style="background-color: #fff;float: left;height: 72px; line-height: 70px;border-bottom:solid 4px #f5f5f5;border-right:solid 4px #f5f5f5">
          <small>Ejercicio <strong>{{ now()->year }}</strong></small>
        </div>
        <div class="col-md-9 textCPOA" style="background-color: #fff;float: left;height: 72px; line-height: 30px;border-bottom:solid 4px #f5f5f5;">
          <small>Unidad responsable:<br><strong>Unidad Técnica del Centro de Formación y Desarrollo</strong></small>
        </div>
        <div class="col-md-12 textCPOA" style="background-color: #fff;float: left;height: 53px; line-height: 53px;border-bottom:solid 4px #f5f5f5;">
          <small>Objetivo: <strong>Fomentar el desarrollo académico y de profesionalización del personal de Organismo Público Local Electoral del Estado de Veracruz</strong></small>
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
        <div class="iconInfo btnOff" id="addAct" data-toggle="tooltip" data-placement="right" title="Agregar Actividad">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </div>
      </div>
      <div class="colPOA2da" id="colPOA6">
        <div class="col-md-12" style="line-height: 30px;height: 30px;"><small><strong>Meta</strong></small></div>
        <div class="col-md-6" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>Unidad de medida</small></div>
        <div class="col-md-6" style="line-height: 20px;float: left;background:#fafafa; height: 47px;"><small>Cantidad anual programado</small></div>
      </div>
      <div class="colPOA2da" id="colPOA7" style="line-height: 30px;height: 30px;">
        <div class="col-md-12"><small><strong>Programación mensual</strong></small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>ene</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>feb</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>mar</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>abr</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>may</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>jun</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>jul</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>ago</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>sep</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 4px #f5f5f5;"><small>oct</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-right:solid 2px #f5f5f5;"><small>nov</small></div>
        <div class="col-md-1" style="line-height: 47px;float: left;background:#fafafa; height: 47px;border-left:solid 2px #f5f5f5;"><small>dic</small></div>
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


      <div class="col-md-12" id="contActividades" style="float: left;margin-top: 4px;height: auto;">
        <div class="row rowAct insertAct">

          <div class="item1">1</div>
          <div class="item2">Fortalecer las competencias de planeación para un Programa Anual de Trabajo estratégico de las Asociaciones Políticas Estatales. Fomentar el desarrollo académico y de profesionalización del personal de Organismo Público Local Electoral del Estado de Veracruz</div>
          <div class="item3">Informe</div>
          <div class="item4">2</div>
          <div class="allItemMes">
            <div class="col-md-1 itemMes" data-mes="ene">2</div>
            <div class="col-md-1 itemMes" data-mes="feb">2</div>
            <div class="col-md-1 itemMes" data-mes="mar">2</div>
            <div class="col-md-1 itemMes" data-mes="abr">2</div>
            <div class="col-md-1 itemMes" data-mes="may">2</div>
            <div class="col-md-1 itemMes" data-mes="jun">2</div>
            <div class="col-md-1 itemMes" data-mes="jul">2</div>
            <div class="col-md-1 itemMes" data-mes="ago">2</div>
            <div class="col-md-1 itemMes" data-mes="sep">2</div>
            <div class="col-md-1 itemMes" data-mes="oct">2</div>
            <div class="col-md-1 itemMes" data-mes="nov">2</div>
            <div class="col-md-1 itemMesF" data-mes="dic">2</div>
          </div>
          <div class="item5">FEV</div>
          <div class="item6">NOV</div>

          <i class="iconBH fa fa-pencil-square-o btnEdit btnOff" data-edit="0" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Editar"></i>
          <!--i class="iconBH fa fa-check-square-o" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Finalizar edición"></i-->
          <i class="iconBH fa fa-arrow-circle-up up btnOff" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Subir"></i>
          <i class="iconBH fa fa-arrow-circle-down down btnOff" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Bajar"></i>
          <i class="iconBHD fa fa-times delAct btnOff" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Eliminar"></i>


        </div>
      </div>




  </section>
</div>



@endsection