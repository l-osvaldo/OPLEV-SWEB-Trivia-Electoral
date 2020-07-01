////////////////////////////////////////////MENSAJES DE VALIDACION POR CADA FORM, ASIGNADO A UN ID DEL ELEMENTO

/*let messagesErrVjs = {

      data-type=basicText:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      data-type=mediumText:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=basicNumber:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo números para el campo {{INPUTNAME}}.',
        number: 'No se permiten letras en el campo {{INPUTNAME}}.',
        match: 'No se permite texto o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=mediumNumber:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo números para el campo {{INPUTNAME}}.',
        number: 'No se permiten letras en el campo {{INPUTNAME}}.',
        match: 'No se permite texto o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=email:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Ingrese un correo valido para el campo {{INPUTNAME}}.'
      },
       data-type=advancedPassword:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        matchLowercase: 'El campo {{INPUTNAME}} debe contener una letra minúscula.',
        matchUppercase: 'El campo {{INPUTNAME}} debe contener una letra mayúscula.',
        matchNumber: 'El campo {{INPUTNAME}} debe contener un número.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      data-type=mediumPassword:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        matchLowercase: 'El campo {{INPUTNAME}} debe contener una letra minúscula.',
        matchNumber: 'El campo {{INPUTNAME}} debe contener un número.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=confirm:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'El campo {{INPUTNAME}} no coincide.'
      },
       data-type=advancedText:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        match: 'No se permiten caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=url:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingrese una url valida pa el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=phone:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 10.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=countryPhone:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 12.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=creditCard:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 16.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=interbankKey:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 18.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=date:{
        required: 'El campo {{INPUTNAME}} es requerido.'
      },
       data-type=list:{
        required: 'El campo {{INPUTNAME}} es requerido.'
      },
       data-type=switch:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Habilete el campo {{INPUTNAME}}.'
      },
       data-type=checkbox:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
      },
       data-type=radio:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
      },
       data-type=pdf:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un un archivo PDF.',
        sizeFile: 'excede el peso permitido.'
      },
      data-type=image:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un una imagen.',
        sizeFile: 'excede el peso permitido.'
      },
       data-type=excel:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un un archivo Excel.',
        sizeFile: 'excede el peso permitido.'
      } 

}*/

let messagesErrVjs = {

'formejemplo-1':{

      ////////////////////////////////////////////////////////////////////////////formejemplo-1
      'usuario':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'email':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Ingrese un correo valido para el campo {{INPUTNAME}}.'
      },
      'emailOtro':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Ingrese un correo valido para el campo {{INPUTNAME}}.'
      },
      'emailOtro-check':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'El campo {{INPUTNAME}} no coincide.'
      },
      'password':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        matchLowercase: 'El campo {{INPUTNAME}} debe contener una letra minúscula.',
        matchUppercase: 'El campo {{INPUTNAME}} debe contener una letra mayúscula.',
        matchNumber: 'El campo {{INPUTNAME}} debe contener un número.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'password-check':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'El campo {{INPUTNAME}} no coincide.'
      },
      
  }, ////////////////////////////////////////////////////////////////////////////formejemplo-2

  'formejemplo-2':{
    'input_numero':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo números para el campo {{INPUTNAME}}.',
        number: 'No se permiten letras en el campo {{INPUTNAME}}.',
        match: 'No se permite texto o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'observaciones':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        match: 'No se permiten caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'grupoDemo':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
      },
      'grupoRadio':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
      },
      'customSwitch1':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Habilete el campo {{INPUTNAME}}.'
      },
  }, ////////////////////////////////////////////////////////////////////////////formejemplo-3

  'formejemplo-3':{
    'telefono':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 10.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'credit_Card':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 16.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'municipio':{
        required: 'El campo {{INPUTNAME}} es requerido.'
      },
      'inicio_fecha':{
        required: 'El campo {{INPUTNAME}} es requerido.'
      }
  },  ////////////////////////////////////////////////////////////////////////////formejemplo-3

  'formejemplo-4':{
      'facebook':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingrese una url valida pa el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'filePDF':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un un archivo PDF.',
        sizeFile: 'excede el peso permitido.'
      },
      'fileIMG':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un una imagen.',
        sizeFile: 'excede el peso permitido.'
      },
      'fileEXCEL':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un un archivo Excel.',
        sizeFile: 'excede el peso permitido.'
      } 
  },

  'formAjax':{
      'nombre':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'telefono_pais':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 12.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'clabeBanco':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 18.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'inputcreado':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'grupoCreado':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
      },
  },

  'formAjax2':{
      'nombre-e2':{
        //required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'telefono_pais-e2':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 12.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'clabeBanco-e2':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
        match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 18.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'inputcreado-e2':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
      'grupoCreado-e2':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
      },
  }


};


function myFuctionSendAjax(e) {
  e.preventDefault();
  
  if (checkFormAjax(document.getElementById('formAjax'))) {//Si el formulario es valido;
    //aqui tu ajax
    //Regresar los imputs
    clearInputVJS(document.getElementById('formAjax').elements);
  } else {//si el formulario no es valido;
    //lo que tu quieras
  }

}


function creaElemento(){
  document.getElementById('addElemento').innerHTML=
                    '<div class="custom-control custom-checkbox">'+
                      '<input class="custom-control-input validacion-o grupoCreado" type="checkbox" id="customCheckbox12a" data-type="checkbox" data-group="grupoCreado" data-inputname="Elemento creado">'+
                      '<label for="customCheckbox12a" class="custom-control-label">Add 1</label>'+
                    '</div>'+
                    '<div class="custom-control custom-checkbox">'+
                      '<input class="custom-control-input validacion-o grupoCreado" type="checkbox" id="customCheckbox22a" data-type="checkbox" data-group="grupoCreado" data-inputname="Elemento creado">'+
                      '<label for="customCheckbox22a" class="custom-control-label">Add 2</label>'+
                    '</div>'+
                    '<div class="custom-control custom-checkbox">'+
                      '<input class="custom-control-input validacion-o grupoCreado" type="checkbox" id="customCheckbox32a" data-type="checkbox" data-group="grupoCreado" data-inputname="Elemento creado">'+
                      '<label for="customCheckbox32a" class="custom-control-label">Add 3</label>'+
                    '</div>'+
                    '<div class="boxMesNum">'+
                    '<div id="error-grupoCreado" class="errorMessage"></div>'+
                    '</div>';

    document.getElementById('addElemento2').innerHTML=
                    '<label class="col-form-label" for="tipotext">input creado</label>'+
                  '<div class="input-group mb-3">'+
                    '<div class="input-group-prepend">'+
                    '<span class="input-group-text"><i class="fas fa-user"></i></span>'+
                    '</div>'+
                      '<input type="text" id="inputcreado" name="inputcreado" class="form-control validacion-o" placeholder="texto" data-type="basicText" autocomplete="off" maxlength="50" minlength="5" data-inputname="texto">'+
                      '<div class="boxMesNum">'+
                        '<div id="error-inputcreado" class="errorMessage"></div>'+
                        '<div id="string-inputcreado" class="stringNumber">0</div>'+
                      '</div>'+
                  '</div>';

    //Despues de pegar el elemento con la estructura deseada de debe inicializar las validaciones
    iniVJS();
}


function myFuctionSendAjax2(e) {
  e.preventDefault();
  
  if (checkFormAjax(document.getElementById('formAjax2'))) {//Si el formulario es valido;
    //aqui tu ajax
    //Regresar los imputs
    clearInputVJS(document.getElementById('formAjax2').elements);
  } else {//si el formulario no es valido;
    //lo que tu quieras
  }

}


function creaElemento2(){
  document.getElementById('addElemento2-e2').innerHTML=
                    '<div class="custom-control custom-checkbox">'+
                      '<input class="custom-control-input validacion-o grupoCreado-e2" type="checkbox" id="customCheckbox12a" data-type="checkbox" data-group="grupoCreado" data-inputname="Elemento creado">'+
                      '<label for="customCheckbox12a" class="custom-control-label">Add 1</label>'+
                    '</div>'+
                    '<div class="custom-control custom-checkbox">'+
                      '<input class="custom-control-input validacion-o grupoCreado-e2" type="checkbox" id="customCheckbox22a" data-type="checkbox" data-group="grupoCreado" data-inputname="Elemento creado">'+
                      '<label for="customCheckbox22a" class="custom-control-label">Add 2</label>'+
                    '</div>'+
                    '<div class="custom-control custom-checkbox">'+
                      '<input class="custom-control-input validacion-o grupoCreado-e2" type="checkbox" id="customCheckbox32a" data-type="checkbox" data-group="grupoCreado" data-inputname="Elemento creado">'+
                      '<label for="customCheckbox32a" class="custom-control-label">Add 3</label>'+
                    '</div>'+
                    '<div class="boxMesNum">'+
                    '<div id="error-grupoCreado" class="errorMessage"></div>'+
                    '</div>';

    document.getElementById('addElemento-e2').innerHTML=
                    '<label class="col-form-label" for="tipotext">input creado</label>'+
                  '<div class="input-group mb-3">'+
                    '<div class="input-group-prepend">'+
                    '<span class="input-group-text"><i class="fas fa-user"></i></span>'+
                    '</div>'+
                      '<input type="text" id="inputcreado-e2" name="inputcreado-e2" class="form-control validacion-o" placeholder="texto" data-type="basicText" autocomplete="off" maxlength="50" minlength="5" data-inputname="texto">'+
                      '<div class="boxMesNum">'+
                        '<div id="error-inputcreado-e2" class="errorMessage"></div>'+
                        '<div id="string-inputcreado-e2" class="stringNumber">0</div>'+
                      '</div>'+
                  '</div>';

    //Despues de pegar el elemento con la estructura deseada de debe inicializar las validaciones
    iniVJS();
}
