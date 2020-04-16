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
                      <input type="text" id="tipotext" name="usuario" class="form-control validacion-o" placeholder="Ingreses su nombre de Usuario" data-type="text" autocomplete="off" maxlength="15" minlength="5" data-inputname="Usuario">
                      <div class="boxMesNum">
                      <div id="error-tipotext" class="errorMessage"></div>
                      <div id="string-tipotext" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Correo Electrónico</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                      <input type="email" id="tipoemail" name="email" class="form-control validacion-o" placeholder="Ingrese su Correo Electrónico" data-type="email" autocomplete="off" maxlength="50" data-inputname="Correo Electrónico">
                      <div class="boxMesNum">
                      <div id="error-tipoemail" class="errorMessage"></div>
                      <div id="string-tipoemail" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Confirmar Correo Electrónico</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                      <input type="email" id="tipoemail-check" name="email" class="form-control validacion-o" placeholder="Confirmar Correo Electrónico" data-type="confirm" autocomplete="off" data-inputname="Correo Electrónico">
                      <div class="boxMesNum">
                      <div id="error-tipoemail-check" class="errorMessage"></div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Contraseña</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                      <input type="password" id="password" name="password" class="form-control validacion-o" placeholder="Ingrese su Contraseña" data-type="password" autocomplete="off" maxlength="8" minlength="6" data-inputname="Contraseña">
                      <div class="boxMesNum">
                      <div id="error-password" class="errorMessage"></div>
                      <div id="string-password" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Confirmar Contraseña</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                      <input type="password"  id="password-check" name="passwordconfirme" class="form-control validacion-o" placeholder="Contraseña" data-type="confirm" autocomplete="off" data-inputname="Contraseña">
                      <div class="boxMesNum">
                      <div id="error-password-check" class="errorMessage"></div>
                      </div>
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
                      <input type="text" id="tiponumber" name="numero" class="form-control validacion-o" placeholder="Edad" data-type="number" autocomplete="off" maxlength="10" minlength="5" data-inputname="Número">
                      <div class="boxMesNum">
                      <div id="error-tiponumber" class="errorMessage"></div>
                      <div id="string-tiponumber" class="stringNumber">0</div>
                      </div>
                  </div>

                  

                  <label class="col-form-label" for="inputSuccess">Observaciones</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-eye"></i></span>
                    </div>
                      <textarea id="tipotextarea" name="username" class="form-control validacion-o" placeholder="Mensaje" data-type="textarea" autocomplete="off" maxlength="100" minlength="20" data-inputname="Observaciones"></textarea>
                      <div class="boxMesNum">
                      <div id="error-tipotextarea" class="errorMessage"></div>
                      <div id="string-tipotextarea" class="stringNumber">0</div>
                      </div>
                  </div>

                   <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox1" data-type="checkbox" data-group="grupoDemo" data-inputname="Rubro">
                      <label for="customCheckbox1" class="custom-control-label">Rubro 1</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox2" data-type="checkbox" data-group="grupoDemo" data-inputname="Rubro">
                      <label for="customCheckbox2" class="custom-control-label">Rubro 2</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox3" data-type="checkbox" data-group="grupoDemo" data-inputname="Rubro">
                      <label for="customCheckbox3" class="custom-control-label">Rubro 3</label>
                    </div>
                    <div class="boxMesNum">
                    <div id="error-grupoDemo" class="errorMessage"></div>
                    </div>
                    <!----------------------------------------------------------------->
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input validacion-o grupoRadio" type="radio" id="customRadio1" data-group="grupoRadio" data-type="radio" name="customRadio" data-inputname="Rubro">
                      <label for="customRadio1" class="custom-control-label">Rubro 1</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input validacion-o grupoRadio" type="radio" id="customRadio2" data-group="grupoRadio" data-type="radio" name="customRadio" data-inputname="Rubro">
                      <label for="customRadio2" class="custom-control-label">Rubro 2</label>
                    </div>
                    <!------------------------------------------------------------------->
                    <div class="boxMesNum">
                    <div id="error-grupoRadio" class="errorMessage"></div>
                    </div>
                    <!------------------------------------------------------------------->
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input validacion-o" id="customSwitch1" placeholder="notificaciones" data-type="switch" data-inputname="Notificaciones">
                      <label class="custom-control-label" for="customSwitch1" style="color: #000 !important;">Desea recibir notificaciones</label>
                      <div class="boxMesNum">
                      <div id="error-customSwitch1" class="errorMessage"></div>
                      </div>
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
                      <input type="tel" id="tipotel" name="username" class="form-control validacion-o" placeholder="Teléfono" data-type="telephone" autocomplete="off" data-inputname="Teléfono">
                      <div class="boxMesNum">
                      <div id="error-tipotel" class="errorMessage"></div>
                      <div id="string-tipotel" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Número de Cuenta</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                    </div>
                      <input type="text" id="card" name="credit-card" class="form-control validacion-o" placeholder="Número de cuenta" data-type="creditCard" autocomplete="off" data-inputname="Cuenta">
                      <div class="boxMesNum">
                      <div id="error-card" class="errorMessage"></div>
                      <div id="string-card" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Fecha de Nacimiento</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                      <input type="date" id="fecha" name="fache" class="form-control validacion-o" placeholder="Fecha" data-type="date" autocomplete="off" data-inputname="Fecha de Nacimiento">
                      <div class="boxMesNum">
                      <div id="error-fecha" class="errorMessage"></div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Municipio</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                      <select id="lista" name="fache" class="form-control validacion-o" placeholder="lista" data-type="list" autocomplete="off" data-inputname="Municipio">
                        <option disabled selected value>Selecciona un municipio</option>
                        <option value="1">Xalapa</option>
                        <option value="2">Veracruz</option>
                      </select>
                      <div class="boxMesNum">
                      <div id="error-lista" class="errorMessage"></div>
                      </div>
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
                      <input type="url" id="tipourl" name="username" class="form-control validacion-o" placeholder="Url" data-type="url" autocomplete="off" data-inputname="Url">
                      <div class="boxMesNum">
                      <div id="error-tipourl" class="errorMessage"></div>
                      </div>
                  </div>

                <div class="form-group">
                    <label for="customFile">Adjuntar PDF</label>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input validacion-o" id="filePDF" data-type="pdf" placeholder="Archivo PDF" data-inputname="PDF">
                      <label id="fileLabel-filePDF" class="custom-file-label" for="customFile"></label>
                      <div class="boxMesNum">
                      <div id="error-filePDF" class="errorMessage"></div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="customFile">Adjuntar EXCEL</label>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input validacion-o" id="fileEXCEL" data-type="excel" placeholder="Archivo Excel" data-inputname="Excel">
                      <label id="fileLabel-fileEXCEL" class="custom-file-label" for="customFile"></label>
                      <div class="boxMesNum">
                      <div id="error-fileEXCEL" class="errorMessage"></div>
                      </div>
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