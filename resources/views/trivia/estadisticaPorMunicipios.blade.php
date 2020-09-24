@extends('layouts.app')

@section('content')
<section class="content-header pt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">
                            Inicio
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Estadísticas
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Usuarios Registrados</b></p>

                    <h3 class="o-color-primario">{{ $numeroUsuarios }}</h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus o-color-primario "></i>
                </div>
                {{-- <span class="small-box-footer">
                    &nbsp;
                </span> --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Mujeres</b></p>
                    <h3 class="o-color-primario">{{ $mujeres }} - {{ $porcentajeMujeres }}<sup style="font-size: 20px">%</sup></h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-female o-color-primario"></i>
                </div>
                {{-- <span class="small-box-footer">
                    Edad promedio: {{ $promedioMujeres }} años
                </span> --}}
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box card-primary card-outline">
                <div class="inner">
                    <p><b>Hombres</b></p>
                    <h3 class="o-color-primario">{{ $hombres }} - {{ $porcentajeHombres }}<sup style="font-size: 20px">%</sup></h3>                    
                </div>
                <div class="icon">
                    <i class="fas fa-male o-color-primario"></i>
                </div>
                {{-- <span class="small-box-footer">
                    Edad promedio: {{ $promedioHombres }} años
                </span> --}}
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div style="display: none; height: 1em;margin: 5em 0 0 auto" align="right" id="divBtnPDF">
                <button class="btn btn-danger o-fondo-1" type="button" data-target="#modalVisorPDFMunicipios" data-toggle="modal">
                    <i class="fas fa-file-pdf"></i>
                    <b>Generar PDF</b>                    
                </button>
            </div>
        </div>        
    </div>

    <div class="card borde-ople">
        <div class="card-body">
            <div class="row">
            	<div class="col-sm-4">
                  	<!-- select -->
                  	<div class="form-group">
                    	<label class="o-form-label">Seleccione Distrito Electoral:</label>
                    	<select class="form-control" id="selectDistrito">
                      		<option value="0" disabled selected>Seleccione Distrito Electoral</option>
                      		@foreach ($distritos as $distrito)
                      			<option value="{{ $distrito->numdto }}-{{ $distrito->nombrecorto }}">{{ $distrito->numdto }}. {{ $distrito->nombrecorto }}</option>
                      		@endforeach
                    	</select>
                  	</div>
                </div>
            </div>
            <label><b>Distrito: </b></label> <label id="nombreDistrito"></label>
            <table class="table table-striped table-bordered" id="estadisticaMunicipios" style="width:100%">
            	<thead>
            		<tr align="center">
            			<th>
            				Municipio
            			</th>
            			<th>
            				Total de usuarios
            			</th>
            			<th>
            				Porcentaje Distrital
            			</th>
            			<th>
            				Total de Mujeres
            			</th>
            			<th>
            				Porcentaje
            			</th>
            			<th>
            				Total de Hombres
            			</th>
            			<th>
            				Porcentaje
            			</th>
            		</tr>
            	</thead>
            	<tfoot>
            		<tr style="background-color: #DFDFDF;">
            			<td>
            				<b>TOTALES</b>
            			</td>
            			<td align="center">
            				<b id="totalUsuariosTD">0</b>
            			</td>
            			<td align="center">
            				<b id="porcentajeMunicipalTD">0 %</b>
            			</td>
            			<td align="center">
            				<b id="mujeresTotalTD">0</b>
            			</td>
            			<td align="center">
            				<b id="porcentajeMujeresTD">0 %</b>
            			</td>
            			<td align="center">
            				<b id="hombresTotalTD">0</b>
            			</td>
            			<td align="center">
            				<b id="porcentajeHombresTD">0 %</b>
            			</td>
            		</tr>
            	</tfoot>
            </table>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <figure class="highcharts-figure" style="max-width: 1000px !important;">
                    <div id="containerMunicipios" style="width: 1000px"></div>
                    <p class="highcharts-description">
                        
                    </p>
                </figure>
            </div>
        </div>
    </div>      

    <div class="modal fade" id="modalVisorPDFMunicipios" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content card-primary card-outline">
                <div class="modal-header o-fondo-2">
                    <h4 class="modal-title">Estadísticas sobre los usuarios de la aplicación móvil por Municipios</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> <iframe width="100%" height="800" id="VisorPDFMunicipios"></iframe> </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal --> 

</section>

@endsection