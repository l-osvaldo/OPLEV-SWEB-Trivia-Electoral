@extends('layouts.app')

@section('content')


  <!--section class="content-header">
    <h3>
			Actividades Adicionales. Captura y Reportes
    </h3>
  </section-->

  <div class="col-md-12">
    <!-- Main content -->
<section class="content">

  <div class="container">


		@if ( $errors->any() )
		  <div class="row">
		    <div class="col-12">
		      <div class="box">
		        <!--ul class="alert alert-danger">
		          @foreach ( $errors->all() as $error )
		            <p class="media-body pb-1 mb-0 small lh-125">* {{ $error }}</p>
		          @endforeach
		        </ul-->
		      </div>
		    </div>
		  </div>
		@endif




  	<!-- Espacio de Trabajo -->
		<form method="get" action="{{ route('adicionales.create') }}" class="col-md-12 col-12">
		  {{ csrf_field() }}



		  <div class="row"  style="padding-top: 2%;">


		     
		      	 
			        <h4>Actividades Adicionales. Captura y Reportes</h4>

			        <div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
					<label>Seleccione el mes de captura</label>

	            						           
			        <select class="form-control validar" id="idmesreportar" data-error="1" name="idmesreportar"  style="margin-bottom: 1%;">
			        <option value="0">Mes...</option>      
			        @foreach( $meses as $mes )
	              	<option value="{{$mes->idmes}}">{{$mes->mes}}</option>
	             	@endforeach            		                  		
			        </select>		              			     			              	
			        <button type="submit" class="btn btn-primary EnaBtn" disabled="true" id="btncapturaadicional" name="btncapturaadicional">Capturar Adicional <i class="fa fa-caret-square-o-right"></i></button>
	      								

	      
		    	  	</div>
		  </div>
		</form>



		<!--form method="get" action="{{ route('reportes.adicionales') }}" enctype="multipart/form-data" class="col-md-12 col-12" target="_blank">
		  {{ csrf_field() }}

		<div class="row">
		  	<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
		
			<label>Seleccione el mes del reporte</label>    
			  	<select class="form-control validar2" id="idmesreporteadicional" data-error="1" name="idmesreporteadicional" style="margin-bottom: 1%;">
			   	<option value="0">Mes...</option>      
			   	@foreach( $meses as $mes )
	        	<option value="{{$mes->idmes}}">{{$mes->mes}}</option>
	       		@endforeach            		                  		
			  	</select>	
			  	<button type="submit" class="btn btn-primary EnaBtn2" disabled="true" id="btnreporteadicional" name="btnreporteadicional">Generar Reporte <i class="fa fa-file-pdf-o"></i></button>
				              			
		    </div>		  	
		  </div>
		</form-->




</div>
  </section>
</div>


@endsection