@extends('layouts.app')

@section('content')


  <section class="content-header">
    <h3>
      <small>Actividades Adicionales</small>
    </h3>
  </section>

  <section>
  	<br>


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
		<form method="get" action="{{ route('adicionales.create') }}" class="col-md-12 col-12">
		  {{ csrf_field() }}


		  <div class="row">
		    <div class="col-4 col-lg-4 col-md-4">
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
									<div class="ribbon-wrapper ribbon-blanco">
										<div class="ribbon ribbon-primary">
											Seleccione el mes de trabajo:
										</div>
										<div class="row">
	            				<div class="col-5">
			            			<div class="form-group">                
			              			<select class="form-control" id="idmesreportar" name="idmesreportar">
			                			<option value="0">Mes...</option>      
			                			@foreach( $meses as $mes )
	                    				<option value="{{$mes->idmes}}">{{$mes->mes}}</option>
	                  				@endforeach            		                  		
			              			</select>		              			
			              		</div>		              		
			              	</div>
			              	<div class="col-5">
			              		<button type="submit" class="btn btn-block btn-dark" id="btnveractividades" name="btnveractividades">Capturar Act. Adicional&nbsp;&nbsp;<i class="fa fa-caret-square-o-right"></i></button>
	      								<div class="clearfix">&nbsp;</div>
			              	</div>
			              </div>
									</div>
								</div>
							</div>						
		      </div>	      
		    </div>
		  </div>
		</form>

  </section>



@endsection