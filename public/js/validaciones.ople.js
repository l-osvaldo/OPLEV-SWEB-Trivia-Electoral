
let messages = {
  text:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
    number: 'No se permiten números en el campo {{INPUTNAME}}.',
    match: 'No se permiten números o caracteres especiales dentro del campo {{INPUTNAME}}.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  number:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    type: 'Ingrese solo números para el campo {{INPUTNAME}}.',
    number: 'No se permiten letras en el campo {{INPUTNAME}}.',
    match: 'No se permite texto o caracteres especiales dentro del campo {{INPUTNAME}}.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  email:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    match: 'Ingrese un correo valido para el campo {{INPUTNAME}}.'
  },
  password:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    matchLowercase: 'El campo {{INPUTNAME}} debe contener una letra minúscula.',
    matchUppercase: 'El campo {{INPUTNAME}} debe contener una letra mayúscula.',
    matchNumber: 'El campo {{INPUTNAME}} debe contener un número.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  confirm:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    match: 'El campo {{INPUTNAME}} no coincide.'
  },
  textarea:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    type: 'Ingrese solo texto para el campo {{INPUTNAME}}.',
    match: 'No se permiten caracteres especiales dentro del campo {{INPUTNAME}}.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  url:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
    match: 'Ingrese una url valida pa el campo {{INPUTNAME}}.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es {{MINLENGTH}}.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  telephone:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
    match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 10.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  creditCard:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    type: 'Ingresa solo texto para el campo {{INPUTNAME}}.',
    match: 'Ingresa solo números para el campo {{INPUTNAME}}.',
    minlength: 'El número mínimo de caracteres para el campo {{INPUTNAME}} es 16.',
    maxlength: 'El número máximo de caracteres para el campo {{INPUTNAME}} es {{MAXLENGTH}}.'
  },
  date:{
    required: 'El campo {{INPUTNAME}} es requerido.'
  },
  list:{
    required: 'El campo {{INPUTNAME}} es requerido.'
  },
  switch:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    match: 'Habilete el campo {{INPUTNAME}}.'
  },
  checkbox:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
  },
  radio:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    match: 'Seleccione al menos una opción para {{INPUTNAME}}.'
  },
  pdf:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    numberFile: 'Solo se permite un archivo.',
    typeFile: 'no es un un archivo PDF.',
    sizeFile: 'excede el peso permitido.'
  },
  excel:{
    required: 'El campo {{INPUTNAME}} es requerido.',
    numberFile: 'Solo se permite un archivo.',
    typeFile: 'no es un un archivo Excel.',
    sizeFile: 'excede el peso permitido.'
  } 
};


var inputsValidar = document.getElementsByClassName('validacion-o');
var btnSubmint = document.getElementsByClassName('btn-submit-o');

/****************************************************************************************************************/

for (var i = 0; i < btnSubmint.length; i++) {
  btnSubmint[i].addEventListener("click", checkForm, false);
}

function checkForm(){

  var allVal = document.getElementById(this.getAttribute('data-form')).elements;

  var arrVal = [];

  for (var i = 0; i < allVal.length; i++) {

    allVal[i].getAttribute('data-error') ? (arrVal.push(1),forOne(allVal[i])) : arrVal.push(0);

  }

  //console.log(arrVal);

  function forOne(e){

    var mapObj = { 
            INPUTNAME: e.getAttribute('data-inputname'), 
            MINLENGTH: e.getAttribute('minLength'), 
            MAXLENGTH: e.getAttribute('maxlength') 
        }; 

    document.getElementById('error-'+e.getAttribute('data-group')) && 
    document.getElementById('error-'+e.getAttribute('data-group')).textContent === '' ? 
    document.getElementById('error-'+e.getAttribute('data-group')).textContent=messages[e.getAttribute('data-type')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}) : '';

    document.getElementById('error-'+e.getAttribute('id')) && 
    document.getElementById('error-'+e.getAttribute('id')).textContent === '' ? document.getElementById('error-'+e.getAttribute('id')).textContent= messages[e.getAttribute('data-type')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}) : '';
  }

  arrVal.includes(1) ? '' : (alert('valido'),document.getElementById(this.getAttribute('data-form')).submit());

}

/****************************************************************************************************************/

for (var i = 0; i < inputsValidar.length; i++) {
  inputsValidar[i].setAttribute('data-error','1');

  inputsValidar[i].getAttribute('data-type') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'radio' ? '' : inputsValidar[i].addEventListener("keyup", validaInput, false) ;

  inputsValidar[i].getAttribute('data-type') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'radio' ? '' : inputsValidar[i].addEventListener("focus", validaInput, false) ;

  inputsValidar[i].addEventListener("change", validaInput, false);

  document.getElementById('string-'+inputsValidar[i].getAttribute('id')) && inputsValidar[i].getAttribute('data-type') != 'telephone' && inputsValidar[i].getAttribute('data-type') != 'creditCard'  ? 
  document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent=inputsValidar[i].getAttribute('maxlength') 
  : 
  maxMinMask(inputsValidar[i]);

  function maxMinMask(mask){
    mask.getAttribute('data-type') === 'telephone' ? document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent='10' : '';
    mask.getAttribute('data-type') === 'creditCard' ? document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent='16' : '';
  }
}


function validaInput(e) {

  
  var val=this.value;
  var tip=this.getAttribute('data-type');
  var max=this.getAttribute('maxlength');
  var min=this.getAttribute('minLength');
  var ide=this.getAttribute('id');
  var ele=document.getElementById(ide);
  var err=document.getElementById('error-'+ide);
  var str=document.getElementById('string-'+ide);
  var nam=this.getAttribute('data-inputname');

  var mapObj = { 
            INPUTNAME: nam, 
            MINLENGTH: min, 
            MAXLENGTH: max 
        }; 

  let validar = new Promise((resolve, reject) => {
    
    str && tip != 'telephone' && tip != 'creditCard' ? str.textContent=max : '';
      val ? resolve([tip,val,max,min,ele,err,str]) : reject(messages[tip].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

  });

  validar
  .then((d) => {
    switch (d[0]) {
      /*******************************************************/
      case 'text':
        var type = typeof d[1] === 'string' ? true : false ;
        var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /^[a-zA-Z]+$/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;

       
        if(!type)           return Promise.reject(messages[tip].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!number)         return Promise.reject(messages[tip].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&min) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&max) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));


        return d;
        
        break;
      /*******************************************************/
      case 'number':

        var type = typeof d[1] === 'string' ? true : false ;
        var number = isNaN( parseInt( d[1] ) ) ? false : true ;
        var match = /^\d+$/.test( d[1] ) ; 
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;
       
        if(!type)           return Promise.reject(messages[tip].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!number)         return Promise.reject(messages[tip].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&min) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&max) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));
        
        return d;
        
        break;
      /*******************************************************/
      case 'email':

        var match = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;
        document.getElementById(ele.getAttribute('id')+'-check') && document.getElementById(ele.getAttribute('id')+'-check').value === d[1] ? 
        ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent="",
          document.getElementById(ele.getAttribute('id')+'-check').removeAttribute('data-error')
        ) : ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent='El campo '+nam+' no coincide',
          document.getElementById(ele.getAttribute('id')+'-check').setAttribute('data-error','1')
        );

        d[6] ? d[6].textContent=max - d[1].length : '' ;

        if(!match) return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        
        break;
      /*******************************************************/
      case 'password':
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 )+1 ? true : false ;
        var matchNumber = /\d+/.test( d[1] );
        var matchUppercase = /[A-Z]/.test( d[1] );
        var matchLowercase = /[a-z]/.test( d[1] );

        document.getElementById(ele.getAttribute('id')+'-check') && document.getElementById(ele.getAttribute('id')+'-check').value === d[1] ? 
        ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent="",
          document.getElementById(ele.getAttribute('id')+'-check').removeAttribute('data-error')
        ) : ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent='El campo '+nam+' no coincide',
          document.getElementById(ele.getAttribute('id')+'-check').setAttribute('data-error','1')
        );

        d[6] ? d[6].textContent=max - d[1].length : '' ;

        if(!minLength&&min) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&max) return Promise.reject(messages[tip].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!matchNumber)    return Promise.reject(messages[tip].matchNumber.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!matchUppercase) return Promise.reject(messages[tip].matchUppercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!matchLowercase) return Promise.reject(messages[tip].matchLowercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'confirm':

        var check = ide.split('-');
        var match = document.getElementById(check[0]).value === d[1] ? true : false;

        if(!match) return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'textarea':
        
        var type = typeof d[1] === 'string' ? true : false ;
        var match = /^[a-zA-Z ñ,áéíóú.;:0-9!()#"]+$/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;
       
        if(!type) return Promise.reject(messages[tip].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match) return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&min) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&max) return Promise.reject(messages[tip].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'url':
        
        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;

        if(!type)             return Promise.reject(messages[tip].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)            return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength && min) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength && max) return Promise.reject(messages[tip].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'telephone':
        
        var x = ele.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
        ele.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof d[1] === 'string' ? true : false ;
        
        var match = /[0-9()-]/.test( d[1] ) ;

        var minLength = x[0].length >= 10 ? true : false ;
        var maxLength = x[0].length <= 10 ? true : false ;

        d[6] ? d[6].textContent = 10 - x[0].length : '' ;
       
        if(!type)           return Promise.reject(messages[tip].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength) return Promise.reject(messages[tip].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'creditCard':
        
        var x = ele.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})/);
        ele.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof d[1] === 'string' ? true : false ;
        
        var match = /[0-9()-]/.test( d[1] ) ;
        var minLength = x[0].length >= 16 ? true : false ;
        var maxLength = x[0].length <= 16 ? true : false ;

        d[6] ? d[6].textContent= 16 - x[0].length : '' ;
       
        if(!type)           return Promise.reject(messages[tip].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));
        //if(!number) throw 'No se permiten letras en el campo '+nam;
        if(!minLength) return Promise.reject(messages[tip].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength) return Promise.reject(messages[tip].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'date':
        

        //var match = /[0-9()-]/.test( d[1] ) ;
        
        //if(!match) throw 'Ingresa solo números para el campo '+nam;


        return d;
        break;
      /*******************************************************/
      case 'list':
        
        //console.log(d[1]);
        //var match = /[0-9()-]/.test( d[1] ) ;
        
        //if(!match) throw 'Ingresa solo números para el campo '+nam;


        return d;
        break;
      /*******************************************************/
      case 'switch':
        
      //console.log(d[1],d[4])

        //var gr = document.getElementsByClassName(d[4].getAttribute('data-group'));
        //var arrGr = [];
        //for (var i = 0; i < gr.length; i++) {
        //  gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        //}

        var match = d[4].checked == true ? true : false;

        //console.log(match);
        
        if(!match) return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'checkbox':
        
        //console.log(d);

        var gr = document.getElementsByClassName(d[4].getAttribute('data-group'));
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }

        var match = arrGr.includes(1) ? true : false;
        
        if(!match) return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));


        return d;
        break;
      /*******************************************************/
      case 'radio':
        
        //console.log('hola');
        var gr = document.getElementsByClassName(d[4].getAttribute('data-group'));
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }
        //console.log(arrGr);
        var match = arrGr.includes(1) ? true : false;
        
        if(!match) return Promise.reject(messages[tip].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'pdf':
  
        var numberFile = e.target.files.length === 1 ? true : false ;
        var typeFile = e.target.files[0].type === 'application/pdf' ? true : false ;
        var sizeFile = e.target.files[0].size < 99698 ? true : false ;

        if(!numberFile) return Promise.reject(messages[tip].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!typeFile) return Promise.reject(e.target.files[0].name+' '+messages[tip].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!sizeFile) return Promise.reject(e.target.files[0].name+' '+messages[tip].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un PDF');
        //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');

        numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-'+ide).textContent=e.target.files[0].name:'';

        return d;
        break;
      /*******************************************************/
      case 'excel':
        
        var numberFile = e.target.files.length === 1 ? true : false ;
        var typeFile = e.target.files[0].type === 'application/vnd.ms-excel' ||
        e.target.files[0].type === 'application/xml' || 
        e.target.files[0].type === 'text/csv' ||
        e.target.files[0].type === 'application/excel' ||
        e.target.files[0].type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
        e.target.files[0].type === 'application/vnd.ms-excel.sheet.macroEnabled.12' ? true : false ;
        var sizeFile = e.target.files[0].size < 99698 ? true : false ;
        
        if(!numberFile) return Promise.reject(messages[tip].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!typeFile) return Promise.reject(e.target.files[0].name+' '+messages[tip].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!sizeFile) return Promise.reject(e.target.files[0].name+' '+messages[tip].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un archivo excel');
        //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');

        numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-'+ide).textContent=e.target.files[0].name:'';

        return d;
        break;
       /*******************************************************/
      default:
        return Promise.reject('Error de validacion XXX001.');
    }
  })
  .then((d) => {

      d[0] === 'checkbox' || d[0] === 'radio' ? typeGroup() : typeOne() ;

      //console.log(d);

      function typeGroup(){
        var group = document.getElementsByClassName(d[4].getAttribute('data-group'));
        for (var i = 0; i < group.length; i++) {
          //group[i].classList.remove('is-invalid');
          //group[i].classList.add('is-valid');
          document.getElementById('error-'+ele.getAttribute('data-group')).textContent='';
          group[i].removeAttribute('data-error');
        }
      }

      function typeOne(){
        d[4].classList.remove('is-invalid');
        d[4].classList.add('is-valid');
        d[5].textContent='';
        d[4].removeAttribute('data-error');
        //this.parentNode.parentNode.querySelector('.btn').disabled=false;
      }

  })
  .catch((e) => {
    //var arrErr = ['Campo requerido.','Error de validación']
      //console.log(e);

      tip === 'checkbox' || tip === 'radio' ? typeGroupErr() :typeOneErr();

      function typeGroupErr(){
        var group = document.getElementsByClassName(ele.getAttribute('data-group'));
        for (var i = 0; i < group.length; i++) {
          document.getElementById('error-'+ele.getAttribute('data-group')).textContent=e;
          group[i].setAttribute('data-error','1');
        }
      }

      function typeOneErr(){
        ele.classList.remove('is-valid');
        ele.classList.add('is-invalid');
        err.textContent=e;
        ele.setAttribute('data-error','1');
        //this.parentNode.parentNode.querySelector('.btn').disabled=true;
      }

  });

}