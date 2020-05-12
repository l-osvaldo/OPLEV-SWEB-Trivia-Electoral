@extends('layouts.app')
@section('content')
<section class="content-header pt-5">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Fechas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Fechas</li>
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
                        <h3 class="card-title">Selección de Fechas</h3>
                    </div> <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="evento_fecha_hora">Fecha y Hora</label>
                                        <input type="text" id="evento_fecha_hora" name="fecha_hora"
                                            class="form-control datetimepicker-input date-time-picker"
                                            placeholder="DD/MM/AAAA" data-type="text" autocomplete="off"
                                            data-toggle="datetimepicker" data-target="#evento_fecha_hora"
                                            data-inputname="evento_fecha_hora"
                                            value="{{ old('fecha', $evento->fecha ?? null) }}">
                                        <div class="boxMesNum">
                                            <div id="error-evento_fecha_hora" class="errorMessage">
                                                {{ $errors->first('fecha_hora') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="evento_fecha">Sólo fecha</label>
                                        <input type="text" id="evento_fecha" name="fecha"
                                            class="form-control datetimepicker-input date-picker"
                                            placeholder="DD/MM/AAAA" data-type="text" autocomplete="off"
                                            data-toggle="datetimepicker" data-target="#evento_fecha"
                                            data-inputname="evento_fecha"
                                            value="{{ old('fecha', $evento->fecha ?? null) }}">
                                        <div class="boxMesNum">
                                            <div id="error-evento_fecha" class="errorMessage">
                                                {{ $errors->first('fecha') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="evento_fecha_hora_rango_inicio">Rango de
                                            Fecha y Hora</label>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="evento_fecha_hora_rango_inicio" name="fecha_inicio"
                                                    class="form-control datetimepicker-input date-time-picker-start"
                                                    placeholder="DD/MM/AAAA HH:MM" data-type="text" autocomplete="off"
                                                    data-toggle="datetimepicker"
                                                    data-target="#evento_fecha_hora_rango_inicio"
                                                    data-inputname="evento_fecha_hora_rango_inicio"
                                                    value="{{ old('fecha_hora_inicio', $evento->fecha_inicio ?? null) }}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="evento_fecha_hora_rango_fin" name="fecha_fin"
                                                    class="form-control datetimepicker-input date-time-picker-end"
                                                    placeholder="DD/MM/AAAA HH:MM" data-type="text" autocomplete="off"
                                                    data-toggle="datetimepicker" data-target="#evento_fecha_hora_rango_fin"
                                                    data-inputname="evento_fecha_hora_rango_fin"
                                                    value="{{ old('fecha_hora_fin', $evento->fecha_fin ?? null) }}">
                                            </div>
                                        </div>
                                        <div class="boxMesNum">
                                            <div id="error-evento_fecha_rango" class="errorMessage">
                                                {{ $errors->first('fecha_inicio') }}
                                                {{ $errors->first('fecha_fin') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="evento_fecha_rango_inicio">Rango de
                                            Fechas</label>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="evento_fecha_rango_inicio" name="fecha_inicio"
                                                    class="form-control datetimepicker-input date-picker-start"
                                                    placeholder="DD/MM/AAAA" data-type="text" autocomplete="off"
                                                    data-toggle="datetimepicker"
                                                    data-target="#evento_fecha_rango_inicio"
                                                    data-inputname="evento_fecha_rango_inicio"
                                                    value="{{ old('fecha_inicio', $evento->fecha_inicio ?? null) }}">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <input type="text" id="evento_fecha_rango_fin" name="fecha_fin"
                                                    class="form-control datetimepicker-input date-picker-end"
                                                    placeholder="DD/MM/AAAA" data-type="text" autocomplete="off"
                                                    data-toggle="datetimepicker" data-target="#evento_fecha_rango_fin"
                                                    data-inputname="evento_fecha_rango_fin"
                                                    value="{{ old('fecha_fin', $evento->fecha_fin ?? null) }}">
                                            </div>
                                        </div>
                                        <div class="boxMesNum">
                                            <div id="error-evento_fecha_rango" class="errorMessage">
                                                {{ $errors->first('fecha_inicio') }}
                                                {{ $errors->first('fecha_fin') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </form>
                </div><!-- /.card -->
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="card card-primary card-outline">
                    <div class="card-header o-fondo-5">
                        <h3 class="card-title">Selección de Hora</h3>
                    </div><!-- /.card-header -->
                    <form role="form">
                        <div class="card-body">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="evento_hora">Sólo Hora</label>
                                    <input type="text" id="evento_hora" name="hora"
                                        class="form-control datetimepicker-input time-picker" placeholder="HH:MM A"
                                        data-type="text" autocomplete="off" data-toggle="datetimepicker"
                                        data-target="#evento_hora" data-inputname="evento_hora"
                                        value="{{ old('hora', $evento->hora ?? null) }}">
                                    <div class="boxMesNum">
                                        <div id="error-evento_hora" class="errorMessage">
                                            {{ $errors->first('hora') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </form>
                </div><!-- /.card -->
            </div>
            <!--/.col (right) -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
