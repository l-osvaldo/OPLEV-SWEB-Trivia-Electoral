@extends('layouts.app')

@section('content')

<form id="formejemplo" method="post" action="#">
<div class="card-body col-md-8" style="margin: 0 auto;">

	<label class="col-form-label" for="tipotext">TEXTO</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-user"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="text" id="tipotext" name="usuario" class="form-control validacion-o" placeholder="Username" data-type="text" data-error="1" autocomplete="off" maxlength="15" minlength="5">
        <div id="error-tipotext" class="error"></div>
        <div id="string-tipotext" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">NUMERO</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-sort-numeric-up-alt"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="text" id="tiponumber" name="numero" class="form-control validacion-o" placeholder="Edad" data-type="number" data-error="1" autocomplete="off" maxlength="10" minlength="5">
        <div id="error-tiponumber" class="error"></div>
        <div id="string-tiponumber" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">EMAIL</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-envelope"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="email" id="tipoemail" name="email" class="form-control validacion-o" placeholder="Email" data-type="email" data-error="1" autocomplete="off" maxlength="50">
        <div id="error-tipoemail" class="error"></div>
        <div id="string-tipoemail" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">CONFIRMAR EMAIL</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-envelope"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="email" id="tipoemail-check" name="email" class="form-control validacion-o" placeholder="Email" data-type="confirm-value" data-error="1" autocomplete="off">
        <div id="error-tipoemail-check" class="error"></div>
        <div id="string-tipoemail-check" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">PASSWORD</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-key"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="password" id="password" name="password" class="form-control validacion-o" placeholder="Password" data-type="password" data-error="1" autocomplete="off" maxlength="8" minlength="6">
        <div id="error-password" class="error"></div>
        <div id="string-password" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">CONFIRMAR PASSWORD</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-key"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="password"  id="password-check" name="passwordconfirme" class="form-control validacion-o" placeholder="password" data-type="confirm-value" data-error="1" autocomplete="off">
        <div id="error-password-check" class="error"></div>
        <div id="string-password-check" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">TEXTAREA</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="far fa-comment-dots"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <textarea id="tipotextarea" name="username" class="form-control validacion-o" placeholder="Mensaje" data-type="textarea" data-error="1" autocomplete="off" maxlength="100" minlength="20"></textarea>
        <div id="error-tipotextarea" class="error"></div>
        <div id="string-tipotextarea" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">URL</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="url" id="tipourl" name="username" class="form-control validacion-o" placeholder="Url" data-type="url" data-error="1" autocomplete="off">
        <div id="error-tipourl" class="error"></div>
        <div id="string-tipourl" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">TELÉFONO</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-phone"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="tel" id="tipotel" name="username" class="form-control validacion-o" placeholder="Teléfono" data-type="telephone" data-error="1" autocomplete="off" maxlength="15" minlength="15">
        <div id="error-tipotel" class="error"></div>
        <div id="string-tipotel" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">TARJETA DE CREDITO</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="fas fa-credit-card"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="text" id="card" name="credit-card" class="form-control validacion-o" placeholder="Numero tarjeta" data-type="credit-card" data-error="1" autocomplete="off" maxlength="19" minlength="19">
        <div id="error-card" class="error"></div>
        <div id="string-card" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">FECHA</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <input type="date" id="fecha" name="fache" class="form-control validacion-o" placeholder="Fecha" data-type="date" data-error="1" autocomplete="off">
        <div id="error-fecha" class="error"></div>
        <div id="string-fecha" class="string">0</div>
    </div>

    <label class="col-form-label" for="inputSuccess">LISTA</label>
    <div class="input-group mb-3">
    	<div class="input-group-prepend">
        	<span class="input-group-text"><i class="far fa-list-alt"></i></span>
    	</div>
    	<!--Los atributos requeridos para la validacion son: name, data-type, data-max, data-min, data-error="1"-->
        <select id="lista" name="fache" class="form-control validacion-o" placeholder="lista" data-type="list" data-error="1" autocomplete="off">
        	<option disabled selected value>Selecciona una opcón</option>
        	<option value="1">Mexico</option>
        	<option value="2">EU</option>
        </select>
        <div id="error-lista" class="error"></div>
        <div id="string-lista" class="string">0</div>
    </div>

	<div class="form-group">
      <label for="customFile">Valida PDF</label>

      <div class="custom-file">
        <input type="file" class="custom-file-input validacion-o" id="filePDF" data-type="pdf" placeholder="Archivo PDF" data-error="1">
        <label id="fileLabel-filePDF" class="custom-file-label" for="customFile"></label>
        <div id="error-filePDF" class="error"></div>
      	<div id="string-filePDF" class="string">0</div>
      </div>
    </div>

    <div class="form-group">
      <label for="customFile">Valida ECXEL</label>

      <div class="custom-file">
        <input type="file" class="custom-file-input validacion-o" id="fileECXEL" data-type="ecxel" placeholder="Archivo Ecxel" data-error="1">
        <label id="fileLabel-fileECXEL" class="custom-file-label" for="customFile"></label>
        <div id="error-fileECXEL" class="error"></div>
      	<div id="string-fileECXEL" class="string">0</div>
      </div>
    </div>

    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox1" data-type="checkbox" data-group="grupoDemo" placeholder="Color" data-error="1">
        <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox2" data-type="checkbox" data-group="grupoDemo" placeholder="Color" data-error="1">
        <label for="customCheckbox2" class="custom-control-label">Custom Checkbox</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input validacion-o grupoDemo" type="checkbox" id="customCheckbox3" data-type="checkbox" data-group="grupoDemo" placeholder="Color" data-error="1">
        <label for="customCheckbox3" class="custom-control-label">Custom Checkbox</label>
      </div>
      <!----------------------------------------------------------------->
      <div id="error-customCheckbox1" class="error"></div>
      <div id="string-customCheckbox1" class="string">0</div>
      <div id="error-customCheckbox2" class="error"></div>
      <div id="string-customCheckbox2" class="string">0</div>
      <div id="error-customCheckbox3" class="error"></div>
      <div id="string-customCheckbox3" class="string">0</div>

      <div id="error-grupoDemo" class="error"></div>
      <!----------------------------------------------------------------->
    </div>

    <div class="form-group">
      <div class="custom-control custom-radio">
        <input class="custom-control-input validacion-o grupoRadio" type="radio" id="customRadio1" data-group="grupoRadio" data-type="radio" placeholder="radio1" name="customRadio" data-error="1">
        <label for="customRadio1" class="custom-control-label">Custom Radio</label>
      </div>
      <div class="custom-control custom-radio">
        <input class="custom-control-input validacion-o grupoRadio" type="radio" id="customRadio2" data-group="grupoRadio" data-type="radio" placeholder="radio2" name="customRadio" data-error="1">
        <label for="customRadio2" class="custom-control-label">Custom Radio checked</label>
      </div>
      <!------------------------------------------------------------------->

      <div id="error-customRadio1" class="error"></div>
      <div id="string-customRadio1" class="string">0</div>
      <div id="error-customRadio2" class="error"></div>
      <div id="string-customRadio2" class="string">0</div>

      <div id="error-grupoRadio" class="error"></div>
      <!------------------------------------------------------------------->
    </div>

    <div class="form-group">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input validacion-o grupoSwitch" id="customSwitch1" placeholder="switch" data-type="switch" data-error="1" data-group="grupoSwitch">
        <label class="custom-control-label" for="customSwitch1">Toggle this custom switch element</label>

        <div id="error-customSwitch1" class="error"></div>
      <div id="string-customSwitch1" class="string">0</div>

        <div id="error-grupoSwitch" class="error"></div>
      </div>
    </div>


   <div class="btn btn-primary btn-submit-o" data-form="formejemplo">Submit</div>
</div>
</form>

@endsection