@extends('layouts.app')

@section('content')

<section class="content-header pt-5">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Formularios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Formularios</li>
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
                <h3 class="card-title">Formulario ejemplo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="o-form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="o-form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile" class="o-form-label">Adjuntar PDF</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">PDF</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text o-fondo-1" id="">Subir</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Permanecer con la sesión activa</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary o-fondo-1">Enviar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Inputs con distintas alturas y sus clases </h3>
              </div>
              <div class="card-body">
                <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                <br>
                <input class="form-control" type="text" placeholder="Default input">
                <br>
                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Inputs con distintos anchos y sus clases </h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <input type="text" class="form-control" placeholder=".col-3">
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" placeholder=".col-4">
                  </div>
                  <div class="col-5">
                    <input type="text" class="form-control" placeholder=".col-5">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Input addon -->
            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Complementos</h3>
              </div>
              <div class="card-body">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Usuario">
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">.00</span>
                  </div>
                </div>

                <h4 class="o-form-label">Iconos</h4>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email">
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-dollar-sign"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <div class="input-group-text"><i class="fas fa-chart-pie"></i></div>
                  </div>
                </div>

                <h5 class="mt-4 mb-2 o-form-label">Checkbox y radio inputs</h5>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <input type="text" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="radio"></span>
                      </div>
                      <input type="text" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->

                <h5 class="mt-4 mb-2">Botones</h5>

                <p>Largo: </p>

                <div class="input-group input-group-lg mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle o-fondo-1" data-toggle="dropdown">
                      Lista
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="#">Acción</a></li>
                      <li class="dropdown-item"><a href="#">Otra acción</a></li>
                      <li class="dropdown-item"><a href="#">Algo más</a></li>
                      <li class="dropdown-divider"></li>
                      <li class="dropdown-item"><a href="#">Acción separad</a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
                <!-- /input-group -->

                <p>Normal</p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-danger o-fondo-1">Acción</button>
                  </div>
                  <!-- /btn-group -->
                  <input type="text" class="form-control">
                </div>
                <!-- /input-group -->

                <p>Pequeño </p>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat o-fondo-1">Enviar</button>
                  </span>
                </div>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">General</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label class="o-form-label">Text</label>
                        <input type="text" class="form-control" placeholder="Texto">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="o-form-label">Deshabilitar input</label>
                        <input type="text" class="form-control" placeholder="Texto" disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label class="o-form-label">Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Texto"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="o-form-label">Deshabilitar Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Texto" disabled=""></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label o-form-label">Checkbox</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="">
                          <label class="form-check-label o-form-label">Checkbox checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" disabled="">
                          <label class="form-check-label o-form-label">Checkbox disabled</label>
                        </div>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1">
                          <label class="form-check-label o-form-label">Radio</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" checked="">
                          <label class="form-check-label o-form-label">Radio checked</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" disabled="">
                          <label class="form-check-label o-form-label">Radio disabled</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label class="o-form-label">Select</label>
                        <select class="form-control">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="o-form-label">Select Deshabilitado</label>
                        <select class="form-control" disabled="">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label class="o-form-label">Select Multiple</label>
                        <select multiple="" class="form-control">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="o-form-label">Select Multiple Deshabilitado</label>
                        <select multiple="" class="form-control" disabled="">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title">Elementos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                          <label for="customCheckbox1" class="custom-control-label o-form-label">Checkbox</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked="">
                          <label for="customCheckbox2" class="custom-control-label o-form-label">Checkbox checked</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled="">
                          <label for="customCheckbox3" class="custom-control-label o-form-label">Checkbox Deshabilitado</label>
                        </div>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                          <label for="customRadio1" class="custom-control-label o-form-label">Radio</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" checked="">
                          <label for="customRadio2" class="custom-control-label o-form-label">Radio checked</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio3" disabled="">
                          <label for="customRadio3" class="custom-control-label o-form-label">Radio Deshabilitado</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label class="o-form-label">Select</label>
                        <select class="custom-select">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="o-form-label">Select Deshabilitado</label>
                        <select class="custom-select" disabled="">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- Select multiple-->
                      <div class="form-group">
                        <label class="o-form-label">Select Multiple</label>
                        <select multiple="" class="custom-select">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="o-form-label">Select Multiple Deshabilitado</label>
                        <select multiple="" class="custom-select" disabled="">
                          <option>Opción 1</option>
                          <option>Opción 2</option>
                          <option>Opción 3</option>
                          <option>Opción 4</option>
                          <option>Opción 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="customSwitch1">
                      <label class="custom-control-label o-form-label" for="customSwitch1">Interruptor</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3">
                      <label class="custom-control-label o-form-label" for="customSwitch3">Interruptor colores</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" disabled="" id="customSwitch2">
                      <label class="custom-control-label o-form-label" for="customSwitch2">Interruptor Deshabilitado</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="customRange1" class="o-form-label">Rango</label>
                    <input type="range" class="custom-range" id="customRange1">
                  </div>
                  <!--div class="form-group">
                    <label for="customRange1">Rango color</label>
                    <input type="range" class="custom-range custom-range-danger" id="customRange1">
                  </div>
                  <div class="form-group">
                    <label for="customRange1">Rango color</label>
                    <input type="range" class="custom-range custom-range-teal" id="customRange1">
                  </div-->
                  <div class="form-group">
                    <!-- <label for="customFile">Custom File</label> -->

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label o-form-label" for="customFile">PDF</label>
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                        <!-- Horizontal Form -->
            <div class="card card-primary card-outline">
              <div class="card-header o-fondo-5">
                <h3 class="card-title o-form-label">Formulario horizontal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label o-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label o-form-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label o-form-label" for="exampleCheck2">Recordarme</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info o-fondo-1">Continuar</button>
                  <button type="submit" class="btn btn-default float-right">Cancelar</button>
                </div>
                <!-- /.card-footer -->
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