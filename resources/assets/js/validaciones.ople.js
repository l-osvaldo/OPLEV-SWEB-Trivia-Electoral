
var inputsValidar = document.getElementsByClassName('validacion-o');
var btnSubmint = document.getElementsByClassName('btn-submit-o');

/****************************************************************************************************************/

for (var i = 0; i < btnSubmint.length; i++) {
  btnSubmint[i].addEventListener("click", checkForm, false);
}

function checkForm(){

  //console.log(this.form);

  var allVal = document.getElementById(this.getAttribute('data-form')).elements;

  var arrVal = [];

  for (var i = 0; i < allVal.length; i++) {

    allVal[i].getAttribute('data-errvjs') ? (arrVal.push(1),forOne(allVal[i])) : arrVal.push(0);

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
    document.getElementById('error-'+e.getAttribute('data-group')).textContent=messagesErrVjs[e.form.getAttribute('id')][e.getAttribute('data-group')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}) : '';

    document.getElementById('error-'+e.getAttribute('id')) && 
    document.getElementById('error-'+e.getAttribute('id')).textContent === '' ? document.getElementById('error-'+e.getAttribute('id')).textContent= messagesErrVjs[e.form.getAttribute('id')][e.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}) : '';
  }


  arrVal.includes(1) ? '' : (alert('valido'),document.getElementById(this.getAttribute('data-form')).submit());


}

/****************************************************************************************************************/

for (var i = 0; i < inputsValidar.length; i++) {
  inputsValidar[i].setAttribute('data-errvjs','1');

  /////////////////////////////////////////////////////////////////////////////////////}

  inputsValidar[i].getAttribute('data-type') ==='checkbox' || 
  inputsValidar[i].getAttribute('data-type') === 'radio' 
  ? 
  '' 
  : 
  inputsValidar[i].addEventListener("keyup", validaInput, false) ;

  /////////////////////////////////////////////////////////////////////////////////////

  inputsValidar[i].getAttribute('data-type') ==='checkbox' ||
  inputsValidar[i].getAttribute('data-type') === 'radio' 
  ? 
  '' 
  : 
  inputsValidar[i].addEventListener("focus", validaInput, false) ;

  /////////////////////////////////////////////////////////////////////////////////////

  inputsValidar[i].addEventListener("change", validaInput, false);
  inputsValidar[i].addEventListener("keydown", validaInput, false);

  /////////////////////////////////////////////////////////////////////////////////////

  document.getElementById('string-'+inputsValidar[i].getAttribute('id')) && 
  inputsValidar[i].getAttribute('data-type') != 'phone' &&
  inputsValidar[i].getAttribute('data-type') != 'countryPhone' &&
  inputsValidar[i].getAttribute('data-type') != 'interbankKey' && 
  inputsValidar[i].getAttribute('data-type') != 'creditCard'  ? 
  document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent=inputsValidar[i].getAttribute('maxlength') 
  : 
  maxMinMask(inputsValidar[i]);

  function maxMinMask(mask){
    mask.getAttribute('data-type') === 'phone' ? 
    document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent='10' : '';

    mask.getAttribute('data-type') === 'countryPhone' ? 
    document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent='12' : '';

    mask.getAttribute('data-type') === 'creditCard' ? 
    document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent='16' : '';

    mask.getAttribute('data-type') === 'interbankKey' ? 
    document.getElementById('string-'+inputsValidar[i].getAttribute('id')).textContent='18' : '';
  }
}


function validaInput(e) {

  
  //var val=this.value;
  //var tip=this.getAttribute('data-type');
  //var max=this.getAttribute('maxlength');
  //var min=this.getAttribute('minLength');
  //var ide=this.getAttribute('id');
  //var ele=document.getElementById(this.getAttribute('id'));
  //console.log(document.getElementById(ide));
  //var err=document.getElementById('error-'+ide);
  //var str=document.getElementById('string-'+this.getAttribute('id'));
  //var nam=this.getAttribute('data-inputname');

  console.log(this.form.getAttribute('id'));

  var mapObj = { 
            INPUTNAME: this.getAttribute('data-inputname'), 
            MINLENGTH: this.getAttribute('minLength'), 
            MAXLENGTH: this.getAttribute('maxlength') 
        }; 

  let validar = new Promise((resolve, reject) => {
    
    document.getElementById('string-'+this.getAttribute('id')) && 
    this.getAttribute('data-type') != 'phone' && 
    this.getAttribute('data-type') != 'countryPhone' && 
    this.getAttribute('data-type') != 'creditCard' && 
    this.getAttribute('data-type') != 'interbankKey' 
    ? 
    document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') 
    : 
    '';

    //console.log(this.value.length);

    this.value
    ? 
    resolve() 
    : 
    reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

  });

  validar
  .then((d) => {
    switch (this.getAttribute('data-type')) {
      /*******************************************************/
      case 'text':
        var type = typeof this.value === 'string' ? true : false ;
        var number = isNaN( parseInt( this.value ) ) ? true : false ;
        var match = /^[a-zA-Z]+$/.test( this.value ) ;
        var minLength = this.value.length >= parseInt( this.getAttribute('minLength') , 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 ) ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;

       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!number)         return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));


        return d;
        
        break;
      /*******************************************************/
      case 'textNumber':

        var type = typeof this.value === 'string' ? true : false ;
        var number = isNaN( parseInt( this.value ) ) ? false : true ;
        var match = /^\d+$/.test( this.value ) ; 
        var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 ) ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;
       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!number)         return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));
        
        return d;
        
        break;
    /*******************************************************/
      case 'number':

        var type = typeof this.value === 'string' ? true : false ;
        var number = isNaN( parseInt( this.value ) ) ? false : true ;

        var match = this.getAttribute('min') < 0 ? /^-?\d+(\.\d{1,2})?$/.test( this.value ) : /^\d+$/.test( this.value ) ; 
        var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 ) ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;
       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!number)         return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));
        
        return d;
        
        break;
      /*******************************************************/
      case 'email':

        var match = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( this.value ) ;
        var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 ) ? true : false ;

        document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check') && 
        document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').value === this.value 
        ? 
        ( 
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.remove('is-invalid'),
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.add('is-valid'),
          document.getElementById('error-'+document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').textContent="",
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').removeAttribute('data-errvjs')
        ) : ( 
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.add('is-invalid'),
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.remove('is-valid'),
          document.getElementById('error-'+document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').textContent='El campo '+this.getAttribute('data-inputname')+' no coincide',
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').setAttribute('data-errvjs','1')
        );

        document.getElementById('string-'+this.getAttribute('id')) 
        ? 
        document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length 
        : '' ;

        if(!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        
        break;
      /*******************************************************/
      case 'password':
        //this.setAttribute('maxlength',this.getAttribute('maxlength'));
        var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 )+1 ? true : false ;
        var matchNumber = /\d+/.test( this.value );
        var matchUppercase = /[A-Z]/.test( this.value );
        var matchLowercase = /[a-z]/.test( this.value );

        document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check') && document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').value === this.value ? 
        ( 
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.remove('is-invalid'),
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.add('is-valid'),
          document.getElementById('error-'+document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').textContent="",
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').removeAttribute('data-errvjs')
        ) : ( 
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.add('is-invalid'),
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.remove('is-valid'),
          document.getElementById('error-'+document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').textContent='El campo '+this.getAttribute('data-inputname')+' no coincide',
          document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').setAttribute('data-errvjs','1')
        );

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;

        if(!minLength&&this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!matchNumber)    return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchNumber.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!matchUppercase) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchUppercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!matchLowercase) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchLowercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'confirm':

        var check = this.getAttribute('id').split('-');
        //this.setAttribute('maxlength',document.getElementById(check[0]).getAttribute('maxlength'));
        var match = document.getElementById(check[0]).value === this.value ? true : false;

        document.getElementById('string-'+check[0]) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;

        if(!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'textarea':
        
        var type = typeof this.value === 'string' ? true : false ;
        var match = /^[a-zA-Z ñ,áéíóú.;:0-9!()#"]+$/.test( this.value ) ;
        var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 ) ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;
       
        if(!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength&&this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength&&this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'url':
        
        var type = typeof this.value === 'string' ? true : false ;
        //var number = isNaN( parseInt( this.value ) ) ? true : false ;
        //var match = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g.test( this.value ) ;
        var match = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gm.test( this.value ) ;
        var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false ;
        var maxLength = this.value.length <= parseInt( this.getAttribute('maxlength') , 10 ) ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('maxlength') - this.value.length : '' ;

        if(!type)             return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)            return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'phone':
        
        var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
        document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof this.value === 'string' ? true : false ;
        
        var match = /[0-9()-]/.test( this.value ) ;

        var minLength = x[0].length >= 10 ? true : false ;
        var maxLength = x[0].length <= 10 ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent = 10 - x[0].length : '' ;
       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;

    /*******************************************************/
      case 'countryPhone':
        
        var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
        document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : '(' + x[1] + ') ' + '(' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '');

        var type = typeof this.value === 'string' ? true : false ;
        
        var match = /[0-9()-]/.test( this.value ) ;

        var minLength = x[0].length >= 12 ? true : false ;
        var maxLength = x[0].length <= 12 ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent = 12 - x[0].length : '' ;
       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'creditCard':
        
        var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})/);
        document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof this.value === 'string' ? true : false ;
        
        var match = /[0-9()-]/.test( this.value ) ;
        var minLength = x[0].length >= 16 ? true : false ;
        var maxLength = x[0].length <= 16 ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent= 16 - x[0].length : '' ;
       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));
        //if(!number) throw 'No se permiten letras en el campo '+this.getAttribute('data-inputname');
        if(!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;

    /*******************************************************/
      case 'interbankKey':
        
        var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,11})(\d{0,1})/);
        document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');

        var type = typeof this.value === 'string' ? true : false ;
        
        var match = /[0-9()-]/.test( this.value ) ;
        var minLength = x[0].length >= 18 ? true : false ;
        var maxLength = x[0].length <= 18 ? true : false ;

        document.getElementById('string-'+this.getAttribute('id')) ? document.getElementById('string-'+this.getAttribute('id')).textContent= 18 - x[0].length : '' ;
       
        if(!type)           return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!match)          return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));
        //if(!number) throw 'No se permiten letras en el campo '+this.getAttribute('data-inputname');
        if(!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'date':
        

        //var match = /[0-9()-]/.test( this.value ) ;
        
        //if(!match) throw 'Ingresa solo números para el campo '+this.getAttribute('data-inputname');


        return d;
        break;
      /*******************************************************/
      case 'list':
        
        //console.log(this.value);
        //var match = /[0-9()-]/.test( this.value ) ;
        
        //if(!match) throw 'Ingresa solo números para el campo '+this.getAttribute('data-inputname');


        return d;
        break;
      /*******************************************************/
      case 'switch':
        
      //console.log(this.value,document.getElementById(this.getAttribute('id')))

        //var gr = document.getElementsByClassName(document.getElementById(this.getAttribute('id')).getAttribute('data-group'));
        //var arrGr = [];
        //for (var i = 0; i < gr.length; i++) {
        //  gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        //}

        var match = document.getElementById(this.getAttribute('id')).checked == true ? true : false;

        //console.log(match);
        
        if(!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'checkbox':
        
        //console.log(d);

        var gr = document.getElementsByClassName(document.getElementById(this.getAttribute('id')).getAttribute('data-group'));
        
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }



        var match = arrGr.includes(1) ? true : false;

        //console.log(arrGr,match);
        
        if(!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('data-group')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));


        return d;
        break;
      /*******************************************************/
      case 'radio':
        
        //console.log('hola');
        var gr = document.getElementsByClassName(document.getElementById(this.getAttribute('id')).getAttribute('data-group'));
        var arrGr = [];
        for (var i = 0; i < gr.length; i++) {
          gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
        }
        //console.log(arrGr);
        var match = arrGr.includes(1) ? true : false;
        
        if(!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('data-group')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        return d;
        break;
      /*******************************************************/
      case 'pdf':
  
        var numberFile = e.target.files.length === 1 ? true : false ;
        var typeFile = e.target.files[0].type === 'application/pdf' ? true : false ;
        var sizeFile = e.target.files[0].size < 99698 ? true : false ;

        if(!numberFile) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!typeFile) return Promise.reject(e.target.files[0].name+' '+messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!sizeFile) return Promise.reject(e.target.files[0].name+' '+messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un PDF');
        //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');

        numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-'+this.getAttribute('id')).textContent=e.target.files[0].name:'';

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
        
        if(!numberFile) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!typeFile) return Promise.reject(e.target.files[0].name+' '+messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        if(!sizeFile) return Promise.reject(e.target.files[0].name+' '+messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
    return mapObj[match]}));

        //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un archivo excel');
        //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');

        numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-'+this.getAttribute('id')).textContent=e.target.files[0].name:'';

        return d;
        break;
       /*******************************************************/
      default:
        return Promise.reject('Error de validacion XXX001.');
    }
  })
  .then((d) => {

    //console.log(this);

      this.getAttribute('data-type') === 'checkbox' || this.getAttribute('data-type') === 'radio' ? typeGroup(this) : typeOne(this) ;

      //console.log(d);

      function typeGroup(elevjs){
        //console.log(elevjs);
        var group = document.getElementsByClassName(elevjs.getAttribute('data-group'));
        for (var i = 0; i < group.length; i++) {
          //group[i].classList.remove('is-invalid');
          //group[i].classList.add('is-valid');
          document.getElementById('error-'+elevjs.getAttribute('data-group')).textContent='';
          group[i].removeAttribute('data-errvjs');
        }
      }

      function typeOne(elevjs){
        //console.log(elevjs);
        elevjs.classList.remove('is-invalid');
        elevjs.classList.add('is-valid');
        document.getElementById('error-'+elevjs.getAttribute('id')).textContent='';
        elevjs.removeAttribute('data-errvjs');
        //this.parentNode.parentNode.querySelector('.btn').disabled=false;
      }

  })
  .catch((e) => {
    //var arrErr = ['Campo requerido.','Error de validación']
      

      this.getAttribute('data-type') === 'checkbox' || this.getAttribute('data-type') === 'radio' ? typeGroupErr(this) :typeOneErr(this);

      function typeGroupErr(elevjs){
        console.log(e);
        var group = document.getElementsByClassName(elevjs.getAttribute('data-group'));
        for (var i = 0; i < group.length; i++) {
          document.getElementById('error-'+elevjs.getAttribute('data-group')).textContent=e;
          group[i].setAttribute('data-errvjs','1');
        }
      }

      function typeOneErr(elevjs){
        //console.log(elevjs.getAttribute('id'));
        elevjs.classList.remove('is-valid');
        elevjs.classList.add('is-invalid');
        document.getElementById('error-'+elevjs.getAttribute('id')).textContent=e;
        elevjs.setAttribute('data-errvjs','1');
        //this.parentNode.parentNode.querySelector('.btn').disabled=true;
      }

  });

}