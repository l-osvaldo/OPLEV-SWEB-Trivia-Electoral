@extends('layouts.app')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-2">
          <div class="col-sm-6">
            <h1>Encrypted</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Encrypted</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
  <div class="container-fluid">

      <div class="row pb-2">
      <div class="col-md-12 o-area-trabajo py-2">

      <!--div class="col-sm-12 o-texto-color-ople pt-2">
            <i class="fa fa-calendar-check-o"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            <hr>
        </div-->

        <h6 style="white-space: pre-wrap;word-break: break-word;">Valor encriptado:<br>{{$encrypted}}</h6><br>
        <h6 style="white-space: pre-wrap;word-break: break-word;">Nomenclatura: <br>{{$varVista}}</h6><br>

        <form method="post" action="/encrypted">

          {{ csrf_field() }}
          
          <input type="hidden" name="user_id" value="{{$varVista}}">

          <button type="submit" class="btn o-fondo-1">Continuar</button>

        </form>

      </div>
    </div>



  </div>
</section>

@endsection