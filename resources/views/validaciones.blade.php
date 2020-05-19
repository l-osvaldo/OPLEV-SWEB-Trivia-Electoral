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
                      <input type="text" id="usuario" name="usuario" class="form-control validacion-o" placeholder="Ingreses su nombre de Usuario" data-type="basicText" autocomplete="off" maxlength="15" minlength="5" data-inputname="Usuario">
                      <div class="boxMesNum">
                      <div id="error-usuario" class="errorMessage"></div>
                      <div id="string-usuario" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Correo Electrónico</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                      <input type="email" id="email" name="email" class="form-control validacion-o" placeholder="Ingrese su Correo Electrónico" data-type="email" autocomplete="off" maxlength="50" data-inputname="Correo Electrónico">
                      <div class="boxMesNum">
                      <div id="error-email" class="errorMessage"></div>
                      <div id="string-email" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Confirmar Correo Electrónico</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-envelope"></i></span>
                    </div>
                      <input type="email" id="email-check" name="email" class="form-control validacion-o" placeholder="Confirmar Correo Electrónico" data-type="confirm" autocomplete="off" maxlength="50" data-inputname="Correo Electrónico">
                      <div class="boxMesNum">
                      <div id="error-email-check" class="errorMessage"></div>
                      <div id="string-email-check" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Contraseña</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                      <input type="password" id="password" name="password" class="form-control validacion-o" placeholder="Ingrese su Contraseña" data-type="advancedPassword" autocomplete="off" maxlength="8" minlength="6" data-inputname="Contraseña">
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
                      <input type="password"  id="password-check" name="passwordconfirme" class="form-control validacion-o" placeholder="Contraseña" data-type="confirm" autocomplete="off" maxlength="8" minlength="6" data-inputname="Contraseña">
                      <div class="boxMesNum">
                      <div id="error-password-check" class="errorMessage"></div>
                      <div id="string-password-check" class="stringNumber">0</div>
                      </div>
                  </div>

               </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-submit-action o-fondo-1" data-form="formejemplo-1">Enviar</button>
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
                    <input type="text" id="input_numero" name="input_numero" class="form-control validacion-o" placeholder="Edad" data-type="basicNumber" autocomplete="off" maxlength="10" minlength="5" data-inputname="Número">
                    <div class="boxMesNum">
                      <div id="error-input_numero" class="errorMessage"></div>
                      <div id="string-input_numero" class="stringNumber">0</div>
                    </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Observaciones</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-eye"></i></span>
                    </div>
                      <textarea id="observaciones" name="observaciones" class="form-control validacion-o" placeholder="Mensaje" data-type="advancedText" autocomplete="off" maxlength="100" minlength="20" data-inputname="Observaciones"></textarea>
                      <div class="boxMesNum">
                      <div id="error-observaciones" class="errorMessage"></div>
                      <div id="string-observaciones" class="stringNumber">0</div>
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
                    <div class="boxMesNum">
                    <div id="error-grupoRadio" class="errorMessage"></div>
                    </div>
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
                  <button type="submit" class="btn btn-primary btn-submit-action o-fondo-1" data-form="formejemplo-2">Enviar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Envio Ajax</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formAjax">
                <div class="card-body">

                  <label class="col-form-label" for="tipotext">Nombre completo</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                      <input type="text" id="nombre" name="nombre" class="form-control validacion-o" placeholder="Ingreses su nombre" data-type="mediumText" autocomplete="off" maxlength="30" minlength="5" data-inputname="Nombre">
                      <div class="boxMesNum">
                      <div id="error-nombre" class="errorMessage"></div>
                      <div id="string-nombre" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Teléfono con lada pais</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                      <input type="tel" id="telefono_pais" name="telefono_pais" class="form-control validacion-o" placeholder="Teléfono" data-type="countryPhone" autocomplete="off" data-inputname="Teléfono" maxlength="20">
                      <div class="boxMesNum">
                      <div id="error-telefono_pais" class="errorMessage"></div>
                      <div id="string-telefono_pais" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Cleabe Interbancaria</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min,-->
                      <input type="text" id="clabeBanco" name="clabeBanco" class="form-control validacion-o" placeholder="Número de cuenta" data-type="interbankKey" autocomplete="off" data-inputname="Cuenta" maxlength="21">
                      <div class="boxMesNum">
                      <div id="error-clabeBanco" class="errorMessage"></div>
                      <div id="string-clabeBanco" class="stringNumber">0</div>
                      </div>
                  </div>

                  <div class="form-group" id="addElemento"></div>

                  <div class="form-group" id="addElemento2"></div>

                  <hr>

                  <div onclick="creaElemento()" style="cursor: pointer;">Crear elemento</div>

               </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary o-fondo-1" onclick="myFuctionSendAjax(event)">Enviar</button>
                </div>
              </form>
            </div>
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
                      <input type="tel" id="telefono" name="telefono" class="form-control validacion-o" placeholder="Teléfono" data-type="phone" autocomplete="off" data-inputname="Teléfono">
                      <div class="boxMesNum">
                      <div id="error-telefono" class="errorMessage"></div>
                      <div id="string-telefono" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Número de Cuenta</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                    </div>
                      <input type="text" id="credit_Card" name="credit_Card" class="form-control validacion-o" placeholder="Número de cuenta" data-type="creditCard" autocomplete="off" data-inputname="Cuenta">
                      <div class="boxMesNum">
                      <div id="error-credit_Card" class="errorMessage"></div>
                      <div id="string-credit_Card" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Fecha de Nacimiento</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                      <input type="date" id="inicio_fecha" name="inicio_fecha" class="form-control validacion-o" placeholder="Fecha" data-type="date" autocomplete="off" data-inputname="Fecha de Nacimiento">
                      <div class="boxMesNum">
                      <div id="error-inicio_fecha" class="errorMessage"></div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Municipio</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                    </div>
                      <select id="municipio" name="fache" class="form-control validacion-o" placeholder="lista" data-type="list" autocomplete="off" data-inputname="Municipio">
                        <option disabled selected value>Selecciona un municipio</option>
                        <option value="1">Xalapa</option>
                        <option value="2">Veracruz</option>
                      </select>
                      <div class="boxMesNum">
                      <div id="error-municipio" class="errorMessage"></div>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-submit-action o-fondo-1" data-form="formejemplo-3">Enviar</button>
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
                      <input type="url" id="facebook" name="username" class="form-control validacion-o" placeholder="Url" data-type="url" autocomplete="off" data-inputname="Url">
                      <div class="boxMesNum">
                      <div id="error-facebook" class="errorMessage"></div>
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
                  <button type="submit" class="btn btn-primary btn-submit-action o-fondo-1" data-form="formejemplo-4">Enviar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Envio ajax ejemplo 2</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formAjax2">
                <div class="card-body">

                  <label class="col-form-label" for="tipotext">Nombre completo</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                      <input type="text" id="nombre-e2" name="nombre-e2" class="form-control validacion-o" placeholder="Ingreses su nombre" data-type="mediumText" autocomplete="off" maxlength="30" minlength="5" data-inputname="Nombre">
                      <div class="boxMesNum">
                      <div id="error-nombre-e2" class="errorMessage"></div>
                      <div id="string-nombre-e2" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Teléfono con lada pais</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                      <input type="tel" id="telefono_pais-e2" name="telefono_pais-e2" class="form-control validacion-o" placeholder="Teléfono" data-type="countryPhone" autocomplete="off" data-inputname="Teléfono" maxlength="20">
                      <div class="boxMesNum">
                      <div id="error-telefono_pais-e2" class="errorMessage"></div>
                      <div id="string-telefono_pais-e2" class="stringNumber">0</div>
                      </div>
                  </div>

                  <label class="col-form-label" for="inputSuccess">Cleabe Interbancaria</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min,-->
                      <input type="text" id="clabeBanco-e2" name="clabeBanco-e2" class="form-control validacion-o" placeholder="Número de cuenta" data-type="interbankKey" autocomplete="off" data-inputname="Cuenta" maxlength="21">
                      <div class="boxMesNum">
                      <div id="error-clabeBanco-e2" class="errorMessage"></div>
                      <div id="string-clabeBanco-e2" class="stringNumber">0</div>
                      </div>
                  </div>

                  <div class="form-group" id="addElemento-e2"></div>

                  <div class="form-group" id="addElemento2-e2"></div>

                  <hr>

                  <div onclick="creaElemento2()" style="cursor: pointer;">Crear elemento ejemplo 2</div>

               </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary o-fondo-1" onclick="myFuctionSendAjax2(event)">Enviar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection