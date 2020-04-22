////////////////////////////////////////////MENSAJES DE VALIDACION POR CADA FORM, ASIGNADO A UN ID DEL ELEMENTO

/*let messagesErrVjs = {

      data-type=text:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
        number: 'No se permiten números en el campo {{INPUTNAME}}.',
        match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=textNumber:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        type: 'Ingrese solo números para el campo {{INPUTNAME}}.',
        number: 'No se permiten letras en el campo {{INPUTNAME}}.',
        match: 'No se permite texto o caracteres especiales dentro del campo {{INPUTNAME}}.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=number:{
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
       data-type=password:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        matchLowercase: 'El campo {{INPUTNAME}} debe contener una letra minúscula.',
        matchUppercase: 'El campo {{INPUTNAME}} debe contener una letra mayúscula.',
        matchNumber: 'El campo {{INPUTNAME}} debe contener un número.',
        minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
        maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
      },
       data-type=confirm:{
        required: 'El campo {{INPUTNAME}} es requerido.',
        match: 'El campo {{INPUTNAME}} no coincide.'
      },
       data-type=textarea:{
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
      'email-check':{
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
      'fileEXCEL':{
        required: 'El campo {{INPUTNAME}} es requerido.',
        numberFile: 'Solo se permite un archivo.',
        typeFile: 'no es un un archivo Excel.',
        sizeFile: 'excede el peso permitido.'
      } 
  }


};

