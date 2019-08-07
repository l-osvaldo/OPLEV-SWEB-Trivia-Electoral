@extends('layouts.app')

@section('content')


  <!--section class="content-header">
    <h3>
      <small>Programa Operativo Anual 2019</small>
    </h3>
  </section-->

  <div class="col-md-12">  
  <section class="content">
  	<div class="container">


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


  	<!-- Espacio de Trabajo -->
		<form method="get" action="{{ route('programa.create') }}" class="col-md-12 col-12">
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
		  </div-->



		  <div class="row" style="padding-top: 3%;">
		  	<div class="col-md-12 form-row" style="margin: 1em 0 1em 0;padding: 1em 0;background: #eceff1;padding:1%;box-shadow: 0 2px 4px rgba(0,0,0,.15);">
			<div class="col-md-12">
				<label>Seleccione el mes de trabajo:</label>
			    <div class="form-group">                
			      <select class="form-control" id="idmesreportar" name="idmesreportar">
			       	<option value="0">Mes...</option>      
			       	@foreach( $meses as $mes )
	            	<option value="{{$mes->idmes}}">{{$mes->mes}}</option>
	            	@endforeach            		                  		
			      </select>		              			
			    </div>		              		
			    	<button type="submit" class="btn btn-primary" id="btnveractividades" name="btnveractividades">Ver actividades&nbsp;&nbsp;<i class="fa fa-caret-square-o-right"></i></button>
			    
			</div>
			</div>
		  </div>
		</form>

	</div>
  </section>
</div>



@endsection