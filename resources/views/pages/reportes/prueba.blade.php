@extends('layouts.app')

@section('content')


  <section class="content-header">
    <h3>
      <small>Prueba</small>
    </h3>
  </section>

  <section>
  	<br>
  	<!-- Espacio de Trabajo -->

<form method="post" action="" enctype="multipart/form-data" class="col-md-12 col-12">
  {{ csrf_field() }}


  <div class="row">
    <div class="col-6 col-lg-6 col-md-6">
      <div class="box">
        <div class="row">
          <div class="col-12">
            <div class="ribbon-wrapper ribbon-rosa">
              <div class="ribbon ribbon-primary">
                
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    página de prueba    
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

  </section>



@endsection