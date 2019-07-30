@extends('layouts.home')

@section('content')
  <!--div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">
      <div class="col-lg-8 col-md-11 col-12">
        <div class="row align-items-center justify-content-md-center h-p100" data-overlay-light="9">
          <div class="col-lg-5 col-md-6 col-12">
            <div class="p-40 text-center content-bottom">
              <img src="{{ asset('images/logoople.png') }}" class="logologin">
            </div>
          </div>
          <div class="col-lg-7 col-md-6 col-12">
            <div class="p-20 content-bottom">
              <div class="content-top-agile">
                <h2><strong>S</strong>istema <strong>I</strong>ntegral de <strong>P</strong>laneación, <strong>S</strong>eguimiento y <strong>E</strong>valuación <strong>I</strong>nstitucional</h2>
                <br /><br />
                <h3>Bienvenido(a)</h3>
                
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf                
               
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Nombre de Usuario">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark border-dark"><i class="ti-user"></i></span>
                    </div>
                    @if ($errors->has('username'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>


                <div class="form-group">
                  <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-dark border-dark"><i class="ti-lock"></i></span>
                    </div>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="row">

                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-dark btn-block margin-top-10">Entrar</button>
                  </div>

                  </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div-->

  <div class="container-fluid">

  <div class="row topBar">
    <div class="col-sm-12 col-md-2 topLeftBar">
      <div class="subTopL"><img src="{{ asset('images/logosipsei.png') }}" height="10%" /> <!--span class="titulo-sistema">DOCUMENTAL</span--></div>
    </div>
    <div class="col-sm-12 col-md-10 topRightBar">
      <div class="subTopR">Sistema Integral de Planeación, Seguimiento y Evaluación Institucional<br><span class="subTit">Organismo Público Local Electoral del Estado de Veracruz</span></div>
    </div>
  </div>

  <div class="row contentLogin">

    <div class="col-10 col-md-3 contentForm">
      <h3 class="htext">Bienvenido(a)</h3>

      <form method="POST" action="{{ route('login') }}">
        @csrf                

        <div class="form-group">
          <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Nombre de Usuario">
          @if ($errors->has('username'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
          </span>
          @endif
        </div>


        <div class="form-group">
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Contraseña">
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
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
            <button type="submit" class="btn btn-dark btn-block btnLogin">Entrar</button>
          </div>
        </div>

      </form>

    </div>

  </div>


  <div class="row bottomBar">
    <div class="col-sm-12 col-md-4 imgContent">
      <img src="{{ asset('images/logoople.png') }}" class="imgLogin">
    </div>
    <div class="col-sm-12 col-md-4 text-center footerText">
      Sistema Integral de Planeación, Seguimiento y Evaluación Institucional<br>Organismo Público Local Electoral del Estado de Veracruz
    </div>
    <div class="col-sm-12 col-md-4">

    </div>
  </div>
</div>

@endsection
