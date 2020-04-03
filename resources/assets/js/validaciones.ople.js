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

    allVal[i].getAttribute('data-error') === '1' ? (arrVal.push(1),forOne(allVal[i])) : arrVal.push(0);

  }

  function forOne(e){

    document.getElementById('error-'+e.getAttribute('data-group')) && 
    document.getElementById('error-'+e.getAttribute('data-group')).textContent === '' ? 
    document.getElementById('error-'+e.getAttribute('data-group')).textContent='El campo '+e.getAttribute('placeholder')+' es requerido' : '';

    document.getElementById('error-'+e.getAttribute('id')) && 
    document.getElementById('error-'+e.getAttribute('id')).textContent === '' ? document.getElementById('error-'+e.getAttribute('id')).textContent='El campo '+e.getAttribute('placeholder')+' es requerido' : '';
  }

  arrVal.includes(1) ? '' : (alert('valido'),document.getElementById(this.getAttribute('data-form')).submit());

}

/****************************************************************************************************************/

for (var i = 0; i < inputsValidar.length; i++) {
  inputsValidar[i].getAttribute('data-type') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'radio' ? '' : inputsValidar[i].addEventListener("keyup", validaInput, false) ;

  inputsValidar[i].getAttribute('data-type') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'radio' ? '' : inputsValidar[i].addEventListener("focus", validaInput, false) ;

  inputsValidar[i].addEventListener("change", validaInput, false);

  //inputsValidar[i].classList.add('is-warning');

  document.getElementById('string-'+inputsValidar[i].getAttribute('id')) ? 
  document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent=inputsValidar[i].getAttribute('maxlength') 
  : 
  '';
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
  var nam=this.getAttribute('placeholder');
  //var typePDF = ['pdf'];
  //var typeECXEL = ['xlsx'];

  console.log(this);

  //console.log(val,tip,max,min,ide,ele,err,str,nam)


  let validar = new Promise((resolve, reject) => {
    //console.log(err);
    str ? str.textContent=max : '';
      val ? resolve([tip,val,max,min,ele,err,str]) : reject("El campo "+nam+" es requerido");

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
       
        if(!type)           return Promise.reject('Ingresa solo texto para el campo '+nam);
        if(!number)         return Promise.reject('No se permiten números en el campo '+nam);
        if(!match)          return Promise.reject('No se permiten números o caracteres especiales dentro del campo '+nam);
        if(!minLength&&min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength&&ma)  return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);

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
       
        if(!type)           return Promise.reject('Ingresa solo números para el campo '+nam);
        if(!number)         return Promise.reject('No se permiten letras en el campo '+nam);
        if(!match)          return Promise.reject('No se permite texto o caracteres especiales dentro del campo '+nam);
        if(!minLength&&min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength&&max) return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);
        
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
          document.getElementById(ele.getAttribute('id')+'-check').setAttribute('data-error','0')
        ) : ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent='El campo '+nam+' no coincide',
          document.getElementById(ele.getAttribute('id')+'-check').setAttribute('data-error','1')
        );

        d[6] ? d[6].textContent=max - d[1].length : '' ;

        if(!match) return Promise.reject('Ingrese un correo valido');

        return d;
        
        break;
      /*******************************************************/
      case 'password':
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 )+1 ? true : false ;
        var matchNúmero = /\d+/.test( d[1] );
        var matchUppercase = /[A-Z]/.test( d[1] );
        var matchLowercase = /[a-z]/.test( d[1] );

        document.getElementById(ele.getAttribute('id')+'-check') && document.getElementById(ele.getAttribute('id')+'-check').value === d[1] ? 
        ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent="",
          document.getElementById(ele.getAttribute('id')+'-check').setAttribute('data-error','0')
        ) : ( 
          document.getElementById(ele.getAttribute('id')+'-check').classList.add('is-invalid'),
          document.getElementById(ele.getAttribute('id')+'-check').classList.remove('is-valid'),
          document.getElementById('error-'+ele.getAttribute('id')+'-check').textContent='El campo '+nam+' no coincide',
          document.getElementById(ele.getAttribute('id')+'-check').setAttribute('data-error','1')
        );

        d[6] ? d[6].textContent=max - d[1].length : '' ;

        if(!minLength&&min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength&&max) return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);
        if(!matchNúmero)    return Promise.reject('El campo '+nam+' debe contener un número');
        if(!matchUppercase) return Promise.reject('El campo '+nam+' debe contener una letra mayúscula');
        if(!matchLowercase) return Promise.reject('El campo '+nam+' debe contener una letra minúscula');

        return d;
        break;
      /*******************************************************/
      case 'confirm-value':

        var check = ide.split('-');
        var match = document.getElementById(check[0]).value === d[1] ? true : false;

        if(!match) return Promise.reject('El campo '+nam+' no coincide');

        return d;
        break;
      /*******************************************************/
      case 'textarea':
        
        var type = typeof d[1] === 'string' ? true : false ;
        var match = /^[a-zA-Z ñ,áéíóú.;:0-9!()#"]+$/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;
       
        if(!type)           return Promise.reject('Ingresa solo texto para el campo '+nam);
        if(!match)          return Promise.reject('No se permiten caracteres especiales dentro del campo '+nam);
        if(!minLength&&min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength&&max) return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);

        return d;
        break;
      /*******************************************************/
      case 'url':
        console.log(d);
        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;

        if(!type)           return Promise.reject('Ingresa solo texto para el campo '+nam);
        if(!match)          return Promise.reject('Ingrese una url valida');
        if(!minLength && min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength && max) return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);

        return d;
        break;
      /*******************************************************/
      case 'telephone':
        
        var x = ele.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
        ele.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /[0-9()-]/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;
       
        if(!type)           return Promise.reject('Ingresa solo texto para el campo '+nam);
        if(!match)          return Promise.reject('Ingresa solo números para el campo '+nam);
        //if(!number) throw 'No se permiten letras en el campo '+nam;
        if(!minLength&&min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength&&max) return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);

        return d;
        break;
      /*******************************************************/
      case 'credit-card':
        
        var x = ele.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})/);
        ele.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /[0-9()-]/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6] ? d[6].textContent=max - d[1].length : '' ;
       
        if(!type)           return Promise.reject('Ingresa solo texto para el campo '+nam);
        if(!match)          return Promise.reject('Ingresa solo números para el campo '+nam);
        //if(!number) throw 'No se permiten letras en el campo '+nam;
        if(!minLength&&min) return Promise.reject('El número mínimo de caracteres para el campo '+nam+' es '+min);
        if(!maxLength&&max) return Promise.reject('El número máximo de caracteres para el campo '+nam+' es '+max);

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
        
        if(!match) return Promise.reject('Habilete el campo '+nam);

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
        
        if(!match) return Promise.reject('Seleccione al menos una opción');


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
        
        if(!match) return Promise.reject('Seleccione al menos una opción');

        return d;
        break;
      /*******************************************************/
      case 'pdf':
  
        var num = e.target.files.length === 1 ? true : false ;
        var typ = e.target.files[0].type === 'application/pdf' ? true : false ;
        var siz = e.target.files[0].size < 99698 ? true : false ;

        if(!num) return Promise.reject('Solo se permite un archivo');
        if(!typ) return Promise.reject('El archivo '+e.target.files[0].name+' no es un PDF');
        if(!siz) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');

        num && typ && siz ? document.getElementById('fileLabel-'+ide).textContent=e.target.files[0].name:'';

        return d;
        break;
      /*******************************************************/
      case 'excel':
        
        var num = e.target.files.length === 1 ? true : false ;
        var typ = e.target.files[0].type === 'application/vnd.ms-excel' ||
        e.target.files[0].type === 'application/xml' || 
        e.target.files[0].type === 'text/csv' ||
        e.target.files[0].type === 'application/excel' ||
        e.target.files[0].type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
        e.target.files[0].type === 'application/vnd.ms-excel.sheet.macroEnabled.12' ? true : false ;
        var siz = e.target.files[0].size < 99698 ? true : false ;
        
        if(!num) return Promise.reject('Solo se permite un archivo');
        if(!typ) return Promise.reject('El archivo '+e.target.files[0].name+' no es un archivo excel');
        if(!siz) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');

        num && typ && siz ? document.getElementById('fileLabel-'+ide).textContent=e.target.files[0].name:'';

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
          group[i].setAttribute('data-error','0');
        }
      }

      function typeOne(){
        d[4].classList.remove('is-invalid');
        d[4].classList.add('is-valid');
        d[5].textContent='';
        d[4].setAttribute('data-error','0');
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