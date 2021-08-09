var inputsValidar = document.getElementsByClassName('validacion-o');
var btnSubmintAction = document.getElementsByClassName('btn-submit-action');
//var btnSubmintAjax = document.getElementsByClassName('btn-submit-ajax');
/****************************************************************************************************************/
for (var i = 0; i < btnSubmintAction.length; i++) {
    btnSubmintAction[i].addEventListener("click", checkFormAction, false);
}
//for (var i = 0; i < btnSubmintAjax.length; i++) {
//  btnSubmintAjax[i].addEventListener("click", checkFormAjax, false);
//}
function checkFormAction(e) {
    e.preventDefault();
    //console.log(this.getAttribute('data-form'));
    var allVal = document.getElementById(this.getAttribute('data-form')).elements;
    var arrVal = [];
    var inputErrVJS = [];
    for (var i = 0; i < allVal.length; i++) {
        //allVal[i].getAttribute('data-errvjs') ? (arrVal.push(1),forOne(allVal[i])) : arrVal.push(0);
        allVal[i].getAttribute('data-errvjs') ? (arrVal.push(1), inputErrVJS.push(allVal[i])) : arrVal.push(0);
    }
    //console.log(arrVal);
    arrVal.includes(1) ? getErrVJS(inputErrVJS) : formVJS(document.getElementById(this.getAttribute('data-form')));
    //arrVal.includes(1) && document.getElementById(this.getAttribute('data-form')).action ? '' : (alert('valido'),document.getElementById(this.getAttribute('data-form')).submit());
}

function checkFormAjax(idForm) {
    var allVal = idForm;
    //console.log(allVal);
    var arrVal = [];
    var inputErrVJS = [];
    for (var i = 0; i < allVal.length; i++) {
        allVal[i].getAttribute('data-errvjs') ? (arrVal.push(1), inputErrVJS.push(allVal[i])) : arrVal.push(0);
    }
    if (arrVal.includes(1)) {
        getErrVJS(inputErrVJS);
        return false;
    } else {
        return true;
    }
}

function clearInputVJS(ele) {
    //console.log(ele);
    for (var i = 0; i < ele.length; i++) {
        console.log(ele[i])
        if (ele[i].getAttribute('data-type') === 'checkbox' || ele[i].getAttribute('data-type') === 'radio') {
            messagesErrVjs[ele[i].form.getAttribute('id')][ele[i].getAttribute('data-group')].required === undefined ? '' : ele[i].setAttribute('data-errvjs', '1');
        } else {
            //console.log(messagesErrVjs[ele[i].form.getAttribute('id')][ele[i].getAttribute('id')]);
            messagesErrVjs[ele[i].form.getAttribute('id')][ele[i].getAttribute('id')].required && messagesErrVjs[ele[i].form.getAttribute('id')][ele[i].getAttribute('id')].required === undefined ? '' : ele[i].setAttribute('data-errvjs', '1');
        }
        ele[i].classList.remove('is-valid');
        ele[i].value = '';
        ele[i].checked = false;
    }
}

function getErrVJS(ele) {
    for (var i = 0; i < ele.length; i++) {
        var mapObj = {
            INPUTNAME: ele[i].getAttribute('data-inputname'),
            MINLENGTH: ele[i].getAttribute('minLength'),
            MAXLENGTH: ele[i].getAttribute('maxlength'),
            //MAX:       ele[i].getAttribute('step').length,
            //MIN:       ele[i].getAttribute('min').length
        };
        document.getElementById('error-' + ele[i].getAttribute('data-group')) && document.getElementById('error-' + ele[i].getAttribute('data-group')).textContent === '' ? document.getElementById('error-' + ele[i].getAttribute('data-group')).textContent = messagesErrVjs[ele[i].form.getAttribute('id')][ele[i].getAttribute('data-group')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
            return mapObj[match]
        }) : '';
        document.getElementById('error-' + ele[i].getAttribute('id')) && document.getElementById('error-' + ele[i].getAttribute('id')).textContent === '' ? document.getElementById('error-' + ele[i].getAttribute('id')).textContent = messagesErrVjs[ele[i].form.getAttribute('id')][ele[i].getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
            return mapObj[match]
        }) : '';
    }
}

function formVJS(form) {
    //console.log(form.action);
    form.action ? form.submit() : '';
    //arrVal.includes(1) ? '' : (alert('valido'),document.getElementById(this.getAttribute('data-form')).submit());
}
/****************************************************************************************************************/
function iniVJS() {
    for (var i = 0; i < inputsValidar.length; i++) {
        if (inputsValidar[i].getAttribute('data-type') === 'checkbox' || inputsValidar[i].getAttribute('data-type') === 'radio') {
            inputsValidar[i].classList.contains('iniDommVJS') || messagesErrVjs[inputsValidar[i].form.getAttribute('id')][inputsValidar[i].getAttribute('data-group')].required === undefined ? '' : inputsValidar[i].setAttribute('data-errvjs', '1');
            //console.log(messagesErrVjs[inputsValidar[i].form.getAttribute('id')][inputsValidar[i].getAttribute('data-group')].required)
        } else {
            inputsValidar[i].classList.contains('iniDommVJS') || messagesErrVjs[inputsValidar[i].form.getAttribute('id')][inputsValidar[i].getAttribute('id')].required === undefined ? '' : inputsValidar[i].setAttribute('data-errvjs', '1');
            //console.log(messagesErrVjs[inputsValidar[i].form.getAttribute('id')][inputsValidar[i].getAttribute('id')].required)
            inputsValidar[i].addEventListener("keyup", validaInput, false);
            inputsValidar[i].addEventListener("focus", validaInput, false);
        }
        //inputsValidar[i].classList.contains('iniDommVJS') ? '' : inputsValidar[i].setAttribute('data-errvjs','1');
        //inputsValidar[i].getAttribute('data-group') ==='checkbox' || inputsValidar[i].getAttribute('data-type') === 'radio'
        /////////////////////////////////////////////////////////////////////////////////////}
        /*inputsValidar[i].getAttribute('data-type') ==='checkbox' || 
        inputsValidar[i].getAttribute('data-type') === 'radio' 
        ? 
        '' 
        : 
        inputsValidar[i].addEventListener("keyup", validaInput, false) ;

        inputsValidar[i].getAttribute('data-type') ==='checkbox' ||
        inputsValidar[i].getAttribute('data-type') === 'radio' 
        ? 
        '' 
        : 
        inputsValidar[i].addEventListener("focus", validaInput, false) ;*/
        /////////////////////////////////////////////////////////////////////////////////////
        inputsValidar[i].addEventListener("change", validaInput, false);
        inputsValidar[i].addEventListener("keydown", validaInput, false);
        /////////////////////////////////////////////////////////////////////////////////////
        document.getElementById('string-' + inputsValidar[i].getAttribute('id')) && inputsValidar[i].getAttribute('data-type') != 'phone' && inputsValidar[i].getAttribute('data-type') != 'countryPhone' && inputsValidar[i].getAttribute('data-type') != 'interbankKey' && inputsValidar[i].getAttribute('data-type') != 'creditCard' ?
            //inputsValidar[i].getAttribute('data-type') != 'number'  ? 
            document.getElementById('string-' + inputsValidar[i].getAttribute('id')).textContent = inputsValidar[i].getAttribute('maxlength') : maxMinMask(inputsValidar[i]);

        function maxMinMask(mask) {
            mask.getAttribute('data-type') === 'phone' ? document.getElementById('string-' + mask.getAttribute('id')).textContent = '10' : '';
            mask.getAttribute('data-type') === 'countryPhone' ? document.getElementById('string-' + mask.getAttribute('id')).textContent = '12' : '';
            mask.getAttribute('data-type') === 'creditCard' ? document.getElementById('string-' + mask.getAttribute('id')).textContent = '16' : '';
            mask.getAttribute('data-type') === 'interbankKey' ? document.getElementById('string-' + mask.getAttribute('id')).textContent = '18' : '';
            //console.log(mask.getAttribute('step'));
            //mask.getAttribute('data-type') === 'number' ? document.getElementById('string-'+mask.getAttribute('id')).textContent=mask.getAttribute('step').length : ''  ;
        }
    }
}

function validaInput(e) {
    var mapObj = {
        INPUTNAME: this.getAttribute('data-inputname'),
        MINLENGTH: this.getAttribute('minLength'),
        MAXLENGTH: this.getAttribute('maxlength'),
        //MAX:       this.getAttribute('step').length,
        //MIN:       this.getAttribute('min').length
    };
    let validar = new Promise((resolve, reject) => {
        document.getElementById('string-' + this.getAttribute('id')) && this.getAttribute('data-type') != 'phone' && this.getAttribute('data-type') != 'countryPhone' && this.getAttribute('data-type') != 'creditCard' && this.getAttribute('data-type') != 'interbankKey'
            //this.getAttribute('data-type') != 'number'  
            ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') : '';
        ///////////////////////////////////////////////////////////////////////////////////////
        document.getElementById('string-' + this.getAttribute('id')) && this.getAttribute('data-type') === 'phone' ? document.getElementById('string-' + this.getAttribute('id')).textContent = '10' : '';
        document.getElementById('string-' + this.getAttribute('id')) && this.getAttribute('data-type') === 'countryPhone' ? document.getElementById('string-' + this.getAttribute('id')).textContent = '12' : '';
        document.getElementById('string-' + this.getAttribute('id')) && this.getAttribute('data-type') === 'creditCard' ? document.getElementById('string-' + this.getAttribute('id')).textContent = '16' : '';
        document.getElementById('string-' + this.getAttribute('id')) && this.getAttribute('data-type') === 'interbankKey' ? document.getElementById('string-' + this.getAttribute('id')).textContent = '18' : '';
        //document.getElementById('string-'+this.getAttribute('id')) && 
        //this.getAttribute('data-type') === 'number' 
        //? 
        //document.getElementById('string-'+this.getAttribute('id')).textContent=this.getAttribute('step').length 
        //: 
        //'';
        ///////////////////////////////////////////////////////////////////////////////////////
        //this.value
        //? 
        //resolve() 
        //: 
        resolve();
        //reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
        //return mapObj[match]}));
    });
    validar.then((d) => {
        switch (this.getAttribute('data-type')) {
            /*******************************************************/
            case 'basicText':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var type = typeof this.value === 'string' ? true : false;
                var number = isNaN(parseInt(this.value)) ? true : false;
                var match = /^[a-zA-Z]+$/.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!number) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'mediumText':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var type = typeof this.value === 'string' ? true : false;
                var match = /^[a-zA-Z ñáéíóú"]+$/.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'basicNumber':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var type = typeof this.value === 'string' ? true : false;
                var number = isNaN(parseInt(this.value)) ? false : true;
                var match = /^\d+$/.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!number) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'number':
                this.value.length > this.getAttribute('maxlength').length ? this.value = this.value.slice(0, this.getAttribute('maxlength').length) : '';
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var type = typeof this.value === 'string' ? true : false;
                var number = isNaN(parseInt(this.value)) ? false : true;
                var match = this.getAttribute('minlength') < 0 ? /^[-.0-9]+$/.test(this.value) : /^[.0-9]+$/.test(this.value);
                var minLength = this.value.length >= this.getAttribute('minlength').length ? true : false;
                var maxLength = this.value.length <= this.getAttribute('maxlength').length ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength').length - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!number) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].number.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'email':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var match = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                //document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check') && 
                //document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').value === this.value 
                //? 
                //( 
                //  document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.remove('is-invalid'),
                //  document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.add('is-valid'),
                //  document.getElementById('error-'+document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').textContent="",
                //  document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').removeAttribute('data-errvjs')
                //) : ( 
                //  document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.add('is-invalid'),
                //  document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').classList.remove('is-valid'),
                //  document.getElementById('error-'+document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').textContent='El campo '+this.getAttribute('data-inputname')+' no coincide',
                //  document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id')+'-check').setAttribute('data-errvjs','1')
                //);
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'emailConfirm':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var match = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check') && document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').value === this.value ? (document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.remove('is-invalid'), document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.add('is-valid'), document.getElementById('error-' + document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').textContent = "", document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').removeAttribute('data-errvjs')) : (document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.add('is-invalid'), document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.remove('is-valid'), document.getElementById('error-' + document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').textContent = 'El campo ' + this.getAttribute('data-inputname') + ' no coincide', document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').setAttribute('data-errvjs', '1'));
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'advancedPassword':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                //this.setAttribute('maxlength',this.getAttribute('maxlength'));
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) + 1 ? true : false;
                var matchNumber = /\d+/.test(this.value);
                var matchUppercase = /[A-Z]/.test(this.value);
                var matchLowercase = /[a-z]/.test(this.value);
                document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check') && document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').value === this.value ? (document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.remove('is-invalid'), document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.add('is-valid'), document.getElementById('error-' + document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').textContent = "", document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').removeAttribute('data-errvjs')) : (document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.add('is-invalid'), document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.remove('is-valid'), document.getElementById('error-' + document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').textContent = 'El campo ' + this.getAttribute('data-inputname') + ' no coincide', document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').setAttribute('data-errvjs', '1'));
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!matchNumber) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchNumber.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!matchUppercase) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchUppercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!matchLowercase) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchLowercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'mediumPassword':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                //this.setAttribute('maxlength',this.getAttribute('maxlength'));
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) + 1 ? true : false;
                var matchNumber = /\d+/.test(this.value);
                //var matchUppercase = /[A-Z]/.test( this.value );
                var matchLowercase = /[a-z]/.test(this.value);
                document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check') && document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').value === this.value ? (document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.remove('is-invalid'), document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.add('is-valid'), document.getElementById('error-' + document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').textContent = "", document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').removeAttribute('data-errvjs')) : (document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.add('is-invalid'), document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').classList.remove('is-valid'), document.getElementById('error-' + document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').textContent = 'El campo ' + this.getAttribute('data-inputname') + ' no coincide', document.getElementById(document.getElementById(this.getAttribute('id')).getAttribute('id') + '-check').setAttribute('data-errvjs', '1'));
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!matchNumber) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchNumber.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //if(!matchUppercase) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchUppercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {return mapObj[match]}));
                if (!matchLowercase) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].matchLowercase.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'confirm':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var check = this.getAttribute('id').split('-');
                //this.setAttribute('maxlength',document.getElementById(check[0]).getAttribute('maxlength'));
                var match = document.getElementById(check[0]).value === this.value ? true : false;
                document.getElementById('string-' + check[0]) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'advancedText':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var type = typeof this.value === 'string' ? true : false;
                var match = /^[a-zA-Z Ññ,áéíóúÁÉÍÓÚ_-¡!¿?.;:0-9!()#/"]+$/.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'url':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var type = typeof this.value === 'string' ? true : false;
                //var number = isNaN( parseInt( this.value ) ) ? true : false ;
                //var match = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g.test( this.value ) ;
                var match = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gm.test(this.value);
                var minLength = this.value.length >= parseInt(this.getAttribute('minLength'), 10) ? true : false;
                var maxLength = this.value.length <= parseInt(this.getAttribute('maxlength'), 10) ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = this.getAttribute('maxlength') - this.value.length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength && this.getAttribute('minlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength && this.getAttribute('maxlength')) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'phone':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
                document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');
                var type = typeof this.value === 'string' ? true : false;
                var match = /[0-9()-]/.test(this.value);
                var minLength = x[0].length >= 10 ? true : false;
                var maxLength = x[0].length <= 10 ? true : false;
                //console.log(x[0].length);
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = 10 - x[0].length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'countryPhone':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
                //console.log(x);
                document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : '(' + x[1] + ') ' + '(' + x[2] + (x[3] ? ') ' + x[3] : '') + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '');
                var type = typeof this.value === 'string' ? true : false;
                var match = /[0-9()-]/.test(this.value);
                var minLength = x[0].length >= 12 ? true : false;
                var maxLength = x[0].length <= 12 ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = 12 - x[0].length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'creditCard':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})/);
                document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');
                var type = typeof this.value === 'string' ? true : false;
                var match = /[0-9()-]/.test(this.value);
                var minLength = x[0].length >= 16 ? true : false;
                var maxLength = x[0].length <= 16 ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = 16 - x[0].length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //if(!number) throw 'No se permiten letras en el campo '+this.getAttribute('data-inputname');
                if (!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'interbankKey':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                var x = document.getElementById(this.getAttribute('id')).value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,11})(\d{0,1})/);
                document.getElementById(this.getAttribute('id')).value = !x[2] ? x[1] : x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '') + (x[4] ? '-' + x[4] : '');
                var type = typeof this.value === 'string' ? true : false;
                var match = /[0-9()-]/.test(this.value);
                var minLength = x[0].length >= 18 ? true : false;
                var maxLength = x[0].length <= 18 ? true : false;
                document.getElementById('string-' + this.getAttribute('id')) ? document.getElementById('string-' + this.getAttribute('id')).textContent = 18 - x[0].length : '';
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!type) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].type.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //if(!number) throw 'No se permiten letras en el campo '+this.getAttribute('data-inputname');
                if (!minLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].minlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!maxLength) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].maxlength.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'date':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //var match = /[0-9()-]/.test( this.value ) ;
                //if(!match) throw 'Ingresa solo números para el campo '+this.getAttribute('data-inputname');
                return d;
                break;
                /*******************************************************/
            case 'list':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //console.log(this.value);
                //var match = /[0-9()-]/.test( this.value ) ;
                //if(!match) throw 'Ingresa solo números para el campo '+this.getAttribute('data-inputname');
                return d;
                break;
                /*******************************************************/
            case 'switch':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                //console.log(this.value,document.getElementById(this.getAttribute('id')))
                //var gr = document.getElementsByClassName(document.getElementById(this.getAttribute('id')).getAttribute('data-group'));
                //var arrGr = [];
                //for (var i = 0; i < gr.length; i++) {
                //  gr[i].checked == true ? arrGr.push(1):arrGr.push(0);
                //}
                var match = document.getElementById(this.getAttribute('id')).checked == true ? true : false;
                //console.log(match);
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'checkbox':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('data-group')].required != undefined ? true : false;
                //console.log(d);
                var gr = document.getElementsByClassName(document.getElementById(this.getAttribute('id')).getAttribute('data-group'));
                var arrGr = [];
                for (var i = 0; i < gr.length; i++) {
                    gr[i].checked == true ? arrGr.push(1) : arrGr.push(0);
                }
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var match = arrGr.includes(1) ? true : false;
                //console.log(arrGr,match);
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('data-group')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'radio':
                var required = this.value.length === 0 && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('data-group')].required != undefined ? true : false;
                //console.log('hola');
                var gr = document.getElementsByClassName(document.getElementById(this.getAttribute('id')).getAttribute('data-group'));
                var arrGr = [];
                for (var i = 0; i < gr.length; i++) {
                    gr[i].checked == true ? arrGr.push(1) : arrGr.push(0);
                }
                //console.log(arrGr);
                var match = arrGr.includes(1) ? true : false;
                if (required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                if (!match) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('data-group')].match.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                return d;
                break;
                /*******************************************************/
            case 'pdf':
                var required = e.target.files[0] && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                if (!required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var numberFile = e.target.files[0] && e.target.files.length === 1 ? true : false;
                if (!numberFile) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var typeFile = e.target.files[0] && e.target.files[0].type === 'application/pdf' ? true : false;
                if (!typeFile) return Promise.reject(e.target.files[0].name + ' ' + messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var sizeFile = e.target.files[0] && e.target.files[0].size < 2000000 ? true : false;
                //console.log(required,numberFile,typeFile,sizeFile);
                if (!sizeFile) return Promise.reject(e.target.files[0].name + ' ' + messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un PDF');
                //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');
                numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-' + this.getAttribute('id')).textContent = e.target.files[0].name : '';
                return d;
                break;
                /*******************************************************/
            case 'excel':
                //console.log(e.target.files[0]);
                var required = e.target.files[0] && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                if (!required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var numberFile = e.target.files[0] && e.target.files.length === 1 ? true : false;
                if (!numberFile) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var typeFile = e.target.files[0] && e.target.files[0].type === 'application/vnd.ms-excel' || e.target.files[0].type === 'application/xml' || e.target.files[0].type === 'text/csv' || e.target.files[0].type === 'application/excel' || e.target.files[0].type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || e.target.files[0].type === 'application/vnd.ms-excel.sheet.macroEnabled.12' ? true : false;
                if (!typeFile) return Promise.reject(e.target.files[0].name + ' ' + messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var sizeFile = e.target.files[0] && e.target.files[0].size < 2000000 ? true : false;
                if (!sizeFile) return Promise.reject(e.target.files[0].name + ' ' + messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //console.log(typeFile,sizeFile)
                //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un archivo excel');
                //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');
                numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-' + this.getAttribute('id')).textContent = e.target.files[0].name : '';
                return d;
                break;
                /*******************************************************/
            case 'image':
                //console.log(e.target.files[0]);
                var required = e.target.files[0] && messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required != undefined ? true : false;
                if (!required) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].required.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var numberFile = e.target.files[0] && e.target.files.length === 1 ? true : false;
                if (!numberFile) return Promise.reject(messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].numberFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var typeFile = e.target.files[0] && e.target.files[0].type === 'image/jpeg' || e.target.files[0].type === 'image/png' || e.target.files[0].type === 'text/csv' || e.target.files[0].type === 'application/excel' || e.target.files[0].type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || e.target.files[0].type === 'application/vnd.ms-excel.sheet.macroEnabled.12' ? true : false;
                if (!typeFile) return Promise.reject(e.target.files[0].name + ' ' + messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].typeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                var sizeFile = e.target.files[0] && e.target.files[0].size < 2000000 ? true : false;
                if (!sizeFile) return Promise.reject(e.target.files[0].name + ' ' + messagesErrVjs[this.form.getAttribute('id')][this.getAttribute('id')].sizeFile.replace(/\{\{([^}]+)\}\}/g, function(i, match) {
                    return mapObj[match]
                }));
                //console.log(typeFile,sizeFile)
                //if(!typeFile) return Promise.reject('El archivo '+e.target.files[0].name+' no es un archivo excel');
                //if(!sizeFile) return Promise.reject('El archivo '+e.target.files[0].name+' excede el peso permitido');
                numberFile && typeFile && sizeFile ? document.getElementById('fileLabel-' + this.getAttribute('id')).textContent = e.target.files[0].name : '';
                return d;
                break;
                /*******************************************************/
            default:
                return Promise.reject('Error de validacion');
        }
    }).then((d) => {
        //console.log(this);
        this.getAttribute('data-type') === 'checkbox' || this.getAttribute('data-type') === 'radio' ? typeGroup(this) : typeOne(this);
        //console.log(d);
        function typeGroup(elevjs) {
            //console.log(elevjs);
            var group = document.getElementsByClassName(elevjs.getAttribute('data-group'));
            for (var i = 0; i < group.length; i++) {
                //group[i].classList.remove('is-invalid');
                //group[i].classList.add('is-valid');
                document.getElementById('error-' + elevjs.getAttribute('data-group')).textContent = '';
                group[i].removeAttribute('data-errvjs');
                group[i].classList.add('iniDommVJS');
            }
        }

        function typeOne(elevjs) {
            //console.log(elevjs);
            elevjs.classList.remove('is-invalid');
            elevjs.classList.add('is-valid');
            elevjs.classList.add('iniDommVJS');
            document.getElementById('error-' + elevjs.getAttribute('id')).textContent = '';
            elevjs.removeAttribute('data-errvjs');
            //this.parentNode.parentNode.querySelector('.btn').disabled=false;
        }
    }).catch((e) => {
        //var arrErr = ['Campo requerido.','Error de validación']
        //console.log(e);
        this.getAttribute('data-type') === 'checkbox' || this.getAttribute('data-type') === 'radio' ? typeGroupErr(this) : typeOneErr(this);

        function typeGroupErr(elevjs) {
            //console.log(e);
            var group = document.getElementsByClassName(elevjs.getAttribute('data-group'));
            for (var i = 0; i < group.length; i++) {
                document.getElementById('error-' + elevjs.getAttribute('data-group')).textContent = e;
                //group[i].setAttribute('data-errvjs','1');
                //console.log(messagesErrVjs[group[i].form.getAttribute('id')][group[i].getAttribute('data-group')].required);
                messagesErrVjs[group[i].form.getAttribute('id')][group[i].getAttribute('data-group')].required ? group[i].setAttribute('data-errvjs', '1') : '';
                group[i].classList.add('iniDommVJS');
            }
        }

        function typeOneErr(elevjs) {
            //console.log(e);
            elevjs.classList.remove('is-valid');
            elevjs.classList.add('is-invalid');
            elevjs.classList.add('iniDommVJS');
            document.getElementById('error-' + elevjs.getAttribute('id')).textContent = e;
            //elevjs.setAttribute('data-errvjs','1');
            messagesErrVjs[elevjs.form.getAttribute('id')][elevjs.getAttribute('id')].required ? elevjs.setAttribute('data-errvjs', '1') : '';
            //this.parentNode.parentNode.querySelector('.btn').disabled=true;
        }
    });
}
iniVJS();