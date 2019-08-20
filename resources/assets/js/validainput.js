
//////////////////////////////////////////////////////////////////////////////
var EnaBtn = document.getElementsByClassName('EnaBtn')[0];
var classname = document.getElementsByClassName("validar");

for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('change', validardatos, false);
}

function validardatos() {
  EnaBtn.disabled = true;
  this.value != 0 ? this.setAttribute('data-error', '0') : this.setAttribute('data-error', '1');
  for (var i = 0; i < classname.length; i++) {
    if (classname[i].value === '0' || classname[i].value === '' || classname[i].value === null || classname[i].value === 'undefined') {
      classname[i].setAttribute('data-error', '1')
    }
  }
  disabledBTN();
}
  
function disabledBTN() {
  var valArr = []; 
  for (var i = 0; i < classname.length; i++) {
      valArr.push(classname[i].getAttribute('data-error'));
  }
  valArr.includes('1') ? EnaBtn.disabled = true : EnaBtn.disabled = false;
}
//////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////
var EnaBtn2 = document.getElementsByClassName('EnaBtn2')[0];
var classname2 = document.getElementsByClassName("validar2");

for (var i = 0; i < classname2.length; i++) {
    classname2[i].addEventListener('change', validardatos2, false);
}

function validardatos2() {
  EnaBtn2.disabled = true;
  this.value != 0 ? this.setAttribute('data-error', '0') : this.setAttribute('data-error', '1');
  for (var i = 0; i < classname2.length; i++) {
    if (classname2[i].value === '0' || classname2[i].value === '' || classname2[i].value === null || classname2[i].value === 'undefined') {
      classname2[i].setAttribute('data-error', '1')
    }
  }
  disabledBTN2();
}
  
function disabledBTN2() {
  var valArr2 = []; 
  for (var i = 0; i < classname2.length; i++) {
      valArr2.push(classname2[i].getAttribute('data-error'));
  }
  valArr2.includes('1') ? EnaBtn2.disabled = true : EnaBtn2.disabled = false;
}
//////////////////////////////////////////////////////////////////////////////