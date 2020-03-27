var inputsValidar = document.getElementsByClassName('validacion-o');
var btnSubmint = document.getElementsByClassName('btn-submit-o');

inputsValidar.length > 0 ? loadForm() : '' ;

function loadForm(){
  //alert('hey');
}

for (var i = 0; i < btnSubmint.length; i++) {
  btnSubmint[i].addEventListener("click", checkForm, false);
}

for (var i = 0; i < inputsValidar.length; i++) {
  inputsValidar[i].getAttribute('data-type') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'switch' || inputsValidar[i].getAttribute('data-type') === 'radio' ? '' : inputsValidar[i].addEventListener("keyup", validaInput, false) ;

  inputsValidar[i].getAttribute('data-type') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'switch' || inputsValidar[i].getAttribute('data-type') === 'radio' ? '' : inputsValidar[i].addEventListener("focus", validaInput, false) ;

  inputsValidar[i].addEventListener("change", validaInput, false);

  //inputsValidar[i].classList.add('is-warning');

  inputsValidar[i].getAttribute('maxlength') ? 
  document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent=inputsValidar[i].getAttribute('maxlength') 
  : 
  document.getElementById('string-'+inputsValidar[i].getAttribute('id')).style.display='none';
}



function checkForm(){

  var allVal = document.getElementById(this.getAttribute('data-form')).elements;

  var arrVal = [];

  for (var i = 0; i < allVal.length; i++) {
    allVal[i].getAttribute('data-error') === '1' ? arrVal.push(1) : arrVal.push(0);
    allVal[i].getAttribute('data-type') === 'checkbox' || allVal[i].getAttribute('data-type') === 'radio' || allVal[i].getAttribute('data-type') === 'switch' ? formValGroup(allVal[i]) : formValOne(allVal[i]);
  }

  //console.log(arrVal);

  function formValOne(e){
    document.getElementById('error-'+e.getAttribute('id')).textContent="Campo requerido";
  }

  function formValGroup(e){
    document.getElementById('error-'+e.getAttribute('data-group')).textContent="Campo requerido";
  }

  //arrVal.includes(1) ? '' : (alert('valido'),document.getElementById(this.getAttribute('data-form')).submit());
  arrVal.includes(1) ? '' : alert('valido');
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


  let validar = new Promise((resolve, reject) => {
    //console.log(val);
    str.textContent=max;
      val ? resolve([tip,val,max,min,ele,err,str]) : reject(new Error("El campo "+nam+" es requerido"));

  });

  validar
  .then((d) => {

    switch (d[0]) {
      case 'text':

        var type = typeof d[1] === 'string' ? true : false ;
        var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /^[a-zA-Z]+$/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6].textContent=max - d[1].length;
       
        if(!type) throw 'Ingresa solo texto para el campo '+nam;
        if(!number) throw 'No se permiten numeros en el campo '+nam;
        if(!match) throw 'No se permiten numeros o caracteres especiales dentro del campo '+nam;
        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&ma) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;
        
        return d;
        
        break;
      case 'number':

        var type = typeof d[1] === 'string' ? true : false ;
        var number = isNaN( parseInt( d[1] ) ) ? false : true ;
        var match = /^\d+$/.test( d[1] ) ; 
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6].textContent=max - d[1].length;
       
        if(!type) throw 'Ingresa solo numeros para el campo '+nam;
        if(!number) throw 'No se permiten letras en el campo '+nam;
        if(!match) throw 'No se permite texto o caracteres especiales dentro del campo '+nam;
        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&max) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;
        
        return d;
        
        break;
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

        d[6].textContent=max - d[1].length;

        if(!match) throw 'Ingresa un email';

        return d;
        
        break;
      case 'password':
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 )+1 ? true : false ;
        var matchNumero = /\d+/.test( d[1] );
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

        d[6].textContent=max - d[1].length;

        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&max) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;
        if(!matchNumero) throw 'El campo '+nam+' debe contener un numero';
        if(!matchUppercase) throw 'El campo '+nam+' debe contener una letra mayuscula';
        if(!matchLowercase) throw 'El campo '+nam+' debe contener una letra minuscula';

        return d;
        break;
      case 'confirm-value':
  
        var check = ide.split('-');
        var match = document.getElementById(check[0]).value === d[1] ? true : false;

        if(!match) throw 'El campo '+nam+' no coincide';

        return d;
        break;
      case 'textarea':
        
        var type = typeof d[1] === 'string' ? true : false ;
        var match = /^[a-zA-Z ñ,áéíóú.;:0-9!()#"]+$/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6].textContent=max - d[1].length;
       
        if(!type) throw 'Ingresa solo texto para el campo '+nam;
        if(!match) throw 'No se permiten caracteres especiales dentro del campo '+nam;
        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&max) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;

        return d;
        break;
        case 'url':
        
        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6].textContent=max - d[1].length;

        if(!type) throw 'Ingresa solo texto para el campo '+nam;
        if(!match) throw 'Ingrese una url valida';
        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&max) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;

        return d;
        break;
        case 'telephone':
        
        var x = ele.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,2})(\d{0,2})(\d{0,2})/);
        ele.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /[0-9()-]/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6].textContent=max - d[1].length;
       
        if(!type) throw 'Ingresa solo texto para el campo '+nam;
        if(!match) throw 'Ingresa solo numeros para el campo '+nam;
        //if(!number) throw 'No se permiten letras en el campo '+nam;
        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&max) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;

        return d;
        break;
        case 'credit-card':
        
        var x = ele.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})/);
        ele.value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof d[1] === 'string' ? true : false ;
        //var number = isNaN( parseInt( d[1] ) ) ? true : false ;
        var match = /[0-9()-]/.test( d[1] ) ;
        var minLength = d[1].length >= parseInt(d[3], 10) ? true : false ;
        var maxLength = d[1].length <= parseInt( d[2] , 10 ) ? true : false ;

        d[6].textContent=max - d[1].length;
       
        if(!type) throw 'Ingresa solo texto para el campo '+nam;
        if(!match) throw 'Ingresa solo numeros para el campo '+nam;
        //if(!number) throw 'No se permiten letras en el campo '+nam;
        if(!minLength&&min) throw 'El numero minimo de caracteres para el campo '+nam+' es '+min;
        if(!maxLength&&max) throw 'El numero maximo de caracteres para el campo '+nam+' es '+max;

        return d;
        break;
        case 'date':
        

        //var match = /[0-9()-]/.test( d[1] ) ;
        
        //if(!match) throw 'Ingresa solo numeros para el campo '+nam;


        return d;
        break;
        case 'list':
        
        //console.log(d[1]);
        //var match = /[0-9()-]/.test( d[1] ) ;
        
        //if(!match) throw 'Ingresa solo numeros para el campo '+nam;


        return d;
        break;
        case 'switch':
        
        //console.log('hola');
        var gr = document.getElementsByClassName(d[4].getAttribute('data-group'));
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }
        //console.log(arrGr);
        var match = arrGr.includes(1) ? true : false;
        
        if(!match) throw 'Habilete el campo '+nam;


        return d;
        break;
        case 'checkbox':
        
        //console.log('hola');
        var gr = document.getElementsByClassName(d[4].getAttribute('data-group'));
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }
        //console.log(arrGr);
        var match = arrGr.includes(1) ? true : false;
        
        if(!match) throw 'Seleccione al menos una casilla';


        return d;
        break;
        case 'radio':
        
        //console.log('hola');
        var gr = document.getElementsByClassName(d[4].getAttribute('data-group'));
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }
        //console.log(arrGr);
        var match = arrGr.includes(1) ? true : false;
        
        if(!match) throw 'Seleccione al menos una casilla';


        return d;
        break;
        case 'pdf':
        
       
        var num = e.target.files.length === 1 ? true : false ;
        var typ = e.target.files[0].type === 'application/pdf' ? true : false ;
        var siz = e.target.files[0].size < 99698 ? true : false ;
        
        //console.log(e.target.files[0].size,siz);

        if(!num) throw 'Solo se permite un archivo';
        if(!typ) throw 'El archivo '+e.target.files[0].name+' no es un PDF';
        if(!siz) throw 'El archivo '+e.target.files[0].name+' excede el peso permitido';
        num && typ && siz ? document.getElementById('fileLabel-'+ide).textContent=e.target.files[0].name:'';


        return d;
        break;
        case 'ecxel':
        
       
        var num = e.target.files.length === 1 ? true : false ;
        var typ = e.target.files[0].type === 'application/vnd.ms-excel' ||
        e.target.files[0].type === 'application/xml' || 
        e.target.files[0].type === 'text/csv' ||
        e.target.files[0].type === 'application/excel' ||
        e.target.files[0].type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
        e.target.files[0].type === 'application/vnd.ms-excel.sheet.macroEnabled.12' ? true : false ;
        var siz = e.target.files[0].size < 99698 ? true : false ;
        
        //console.log(e.target.files[0].size,siz);

        if(!num) throw 'Solo se permite un archivo';
        if(!typ) throw 'El archivo '+e.target.files[0].name+' no es un archivo ecxel';
        if(!siz) throw 'El archivo '+e.target.files[0].name+' excede el peso permitido';
        num && typ && siz ? document.getElementById('fileLabel-'+ide).textContent=e.target.files[0].name:'';


        return d;
        break;

      default:
        var error = new Error('Error de validacion XXX001.')
        return error;
    }
  })
  .then((d) => {

      d[0] === 'checkbox' || d[0] === 'switch' || d[0] === 'radio' ? typeGroup() : typeOne() ;

      //console.log(d[0]);

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
        console.log('holast');
        //this.parentNode.parentNode.querySelector('.btn').disabled=false;
      }

  })
  .catch((e) => {
    //var arrErr = ['Campo requerido.','Error de validación']
      //console.log(e);

      tip === 'checkbox' || tip === 'switch' || tip === 'radio' ? typeGroupErr() :typeOneErr();

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
        console.log('holase');
        //this.parentNode.parentNode.querySelector('.btn').disabled=true;
      }

  });

}
