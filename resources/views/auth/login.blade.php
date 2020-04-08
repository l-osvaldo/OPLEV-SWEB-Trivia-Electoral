@extends('layouts.home')

@section('content')

<header>
  <div class="logo-container">
    <img src="{{ asset('images/logoGenerico.png') }}" class="logo-image" />
  </div>
  <div class="title-container">
    <div class="title-text">
      Nombre del Sistema Informático<br>
      <small>Nombre del área responsable</small>
    </div>
  </div>  
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-5" style="margin: 10% auto 0 auto">
        <div class="card login-form">
          <div class="card-body">
            <h2 class="login-text">
              Iniciar sesión
            </h2>
            
            <form method="POST" action="{{ route('login') }}">
              @csrf                

              <div class="form-group">
                <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" autofocus placeholder="Nombre de usuario">
                @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('username') == 'El username es requerido.' ? "El usuario es requerido." : $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña">
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                  <!--strong>{{ $errors->first('password') }}</strong-->
                  <strong>La contraseña es requerida.</strong>
                  </span>
                @endif
              </div>

              <div class="row">
                <div class="col-12">

                  <p>
                    @isset($aviso)
                      {{ $aviso }}
                    @endisset
                  </p>
                  
                  <button type="submit" class="btn btn-dark btn-block">Ingresar</button>
                </div>
              </div>
            </form>

          </div>
        </div>        
      </div>
    </div>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <div class="footer-left">
      <img src="{{ asset('images/logoople.png') }}" class="footer-logo">
    </div>
    <div class="footer-middle">
      <div class="footer-text">
        Nombre del área responsable<br>
        <small>Compatibilidad óptima con Google Chrome</small>
      </div>
    </div>
  </div>
</footer>

@endsection
