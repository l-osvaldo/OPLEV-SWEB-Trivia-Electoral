@extends('layouts.app')

@section('content')


  <section class="content-header">
    <h3>
      <small>Programa Operativo Anual 2019</small>
    </h3>
  </section>

  <section>
  	<br>
  	<!-- Espacio de Trabajo -->
		<form method="get" action="{{ route('programa.create') }}" class="col-md-12 col-12">
		  {{ csrf_field() }}
		  <div class="row">
		    <div class="col-6 col-lg-6 col-md-6">

		      <div class="box">

						  <div class="row">
								<div class="col-12">
									<div class="ribbon-wrapper ribbon-blanco">
										<div class="ribbon ribbon-primary">
											Seleccione el mes a reportar
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
			              		<button type="submit" class="btn btn-block btn-dark">Ver actividades&nbsp;&nbsp;<i class="fa fa-caret-square-o-right"></i></button>
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