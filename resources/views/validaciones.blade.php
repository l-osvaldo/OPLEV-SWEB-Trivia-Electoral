@extends('layouts.app')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mt-3">
          <div class="col-sm-6">
            <h1>Validación</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validación</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->


            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Registro</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formejemplo-1" method="post" action="/ejemplovalidacion">
                {{ csrf_field() }}
                <div class="card-body">

                  <label class="col-form-label" for="tipotext">Usuario</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="text" id="tipotext" name="usuario" class="form-control validacion-o" placeholder="Usuario" data-type="text" data-error="1" autocomplete="off" maxlength="15" minlength="5">
                      
                      <div id="error-tipotext" class="error"></div>
                      <div id="string-tipotext" class="string">0</div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Correo Electrónico</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="email" id="tipoemail" name="email" class="form-control validacion-o" placeholder="Correo Electrónico" data-type="email" data-error="1" autocomplete="off" maxlength="50">
                      <div id="error-tipoemail" class="error"></div>
                      <div id="string-tipoemail" class="string">0</div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Confirmar Correo Electrónico</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="email" id="tipoemail-check" name="email" class="form-control validacion-o" placeholder="Confirmar Correo Electrónico" data-type="confirm-value" data-error="1" autocomplete="off">
                      <div id="error-tipoemail-check" class="error"></div>
                      <!--div id="string-tipoemail-check" class="string">0</div-->
                  </div>

                  <label class="col-form-label" for="inputSuccess">Contraseña</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="password" id="password" name="password" class="form-control validacion-o" placeholder="Contraseña" data-type="password" data-error="1" autocomplete="off" maxlength="8" minlength="6">
                      <div id="error-password" class="error"></div>
                      <div id="string-password" class="string">0</div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Confirmar Contraseña</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="password"  id="password-check" name="passwordconfirme" class="form-control validacion-o" placeholder="Contraseña" data-type="confirm-value" data-error="1" autocomplete="off">
                      <div id="error-password-check" class="error"></div>
                      <!--div id="string-password-check" class="string">0</div-->
                  </div>


               </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="btn btn-primary btn-submit-o o-fondo-1" data-form="formejemplo-1">Enviar</div>
                </div>
              </form>
            </div>
            <!-- /.card -->







            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Completar Registro</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formejemplo-2" method="post" action="/ejemplovalidacion">
                {{ csrf_field() }}
                <div class="card-body">


                  <label class="col-form-label" for="inputSuccess">Ingrese un número</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="text" id="tiponumber" name="numero" class="form-control validacion-o" placeholder="Edad" data-type="number" data-error="1" autocomplete="off" maxlength="10" minlength="5">
                      <div id="error-tiponumber" class="error"></div>
                      <div id="string-tiponumber" class="string">0</div>
                  </div>

                  

                  <label class="col-form-label" for="inputSuccess">Observaciones</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-eye"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <textarea id="tipotextarea" name="username" class="form-control validacion-o" placeholder="Mensaje" data-type="textarea" data-error="1" autocomplete="off" maxlength="100" minlength="20"></textarea>
                      <div id="error-tipotextarea" class="error"></div>
                      <div id="string-tipotextarea" class="string">0</div>
                  </div>

                   <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox1" data-type="checkbox" data-group="grupoDemo" placeholder="Color" data-error="1">
                      <label for="customCheckbox1" class="custom-control-label">Rubro 1</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox2" data-type="checkbox" data-group="grupoDemo" placeholder="Color" data-error="1">
                      <label for="customCheckbox2" class="custom-control-label">Rubro 2</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox3" data-type="checkbox" data-group="grupoDemo" placeholder="Color" data-error="1">
                      <label for="customCheckbox3" class="custom-control-label">Rubro 3</label>
                    </div>

                    <div id="error-grupoDemo" class="error"></div>
                    <!----------------------------------------------------------------->
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input validacion-o grupoRadio" type="radio" id="customRadio1" data-group="grupoRadio" data-type="radio" placeholder="radio1" name="customRadio" data-error="1">
                      <label for="customRadio1" class="custom-control-label">Rubro 1</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input validacion-o grupoRadio" type="radio" id="customRadio2" data-group="grupoRadio" data-type="radio" placeholder="radio2" name="customRadio" data-error="1">
                      <label for="customRadio2" class="custom-control-label">Rubro 2</label>
                    </div>
                    <!------------------------------------------------------------------->
                    <div id="error-grupoRadio" class="error"></div>
                    <!------------------------------------------------------------------->
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input validacion-o" id="customSwitch1" placeholder="notificaciones" data-type="switch" data-error="1">
                      <label class="custom-control-label" for="customSwitch1">Desea recibir notificaciones</label>

                      <div id="error-customSwitch1" class="error"></div>
                    </div>
                  </div>





                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="btn btn-primary btn-submit-o o-fondo-1" data-form="formejemplo-2">Enviar</div>
                </div>
              </form>
            </div>
            <!-- /.card -->















            <!-- /.card -->
          </div>




          <div class="col-md-6">
            <!-- general form elements -->


            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Datos Generales</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formejemplo-3" method="post" action="/ejemplovalidacion">
                {{ csrf_field() }}
                <div class="card-body">




                  <label class="col-form-label" for="inputSuccess">Número de Teléfono</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="tel" id="tipotel" name="username" class="form-control validacion-o" placeholder="Teléfono" data-type="telephone" data-error="1" autocomplete="off" maxlength="15" minlength="15">
                      <div id="error-tipotel" class="error"></div>
                      <div id="string-tipotel" class="string">0</div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Número de Cuenta</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="text" id="card" name="credit-card" class="form-control validacion-o" placeholder="Número de cuenta" data-type="credit-card" data-error="1" autocomplete="off" maxlength="19" minlength="19">
                      <div id="error-card" class="error"></div>
                      <div id="string-card" class="string">0</div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Fecha de Nacimiento</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="date" id="fecha" name="fache" class="form-control validacion-o" placeholder="Fecha" data-type="date" data-error="1" autocomplete="off">
                      <div id="error-fecha" class="error"></div>
                      <!--div id="string-fecha" class="string">0</div-->
                  </div>

                  <label class="col-form-label" for="inputSuccess">Municipio</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <select id="lista" name="fache" class="form-control validacion-o" placeholder="lista" data-type="list" data-error="1" autocomplete="off">
                        <option disabled selected value>Selecciona un municipio</option>
                        <option value="1">Xalapa</option>
                        <option value="2">Veracruz</option>
                      </select>
                      <div id="error-lista" class="error"></div>
                      <!--div id="string-lista" class="string">0</div-->
                  </div>




            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="btn btn-primary btn-submit-o o-fondo-1" data-form="formejemplo-3">Enviar</div>
                </div>
              </form>
            </div>
            <!-- /.card -->



            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Recursos externo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formejemplo-4" method="post" action="/ejemplovalidacion">
                {{ csrf_field() }}
                <div class="card-body">






              <label class="col-form-label" for="inputSuccess">Url</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
                      <input type="url" id="tipourl" name="username" class="form-control validacion-o" placeholder="Url" data-type="url" data-error="1" autocomplete="off">
                      <div id="error-tipourl" class="error"></div>
                      <!--div id="string-tipourl" class="string">0</div-->
                  </div>

                <div class="form-group">
                    <label for="customFile">Adjuntar PDF</label>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input validacion-o" id="filePDF" data-type="pdf" placeholder="Archivo PDF" data-error="1">
                      <label id="fileLabel-filePDF" class="custom-file-label" for="customFile"></label>
                      <div id="error-filePDF" class="error"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="customFile">Adjuntar EXCEL</label>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input validacion-o" id="fileEXCEL" data-type="excel" placeholder="Archivo Excel" data-error="1">
                      <label id="fileLabel-fileEXCEL" class="custom-file-label" for="customFile"></label>
                      <div id="error-fileEXCEL" class="error"></div>
                    </div>
                  </div>

                 


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="btn btn-primary btn-submit-o o-fondo-1" data-form="formejemplo-4">Enviar</div>
                </div>
              </form>
            </div>
            <!-- /.card -->
            

            <!-- /.card -->
          </div>




          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection