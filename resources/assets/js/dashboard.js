$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

/*************************************************************

  Funcionalidad: habre el menu dependiendo de la ruta donde se encuentre el sistema
  Parametros: elemento
  Respuesta:

***************************************************************/

window.onload = function() {
  closemenu();
   window.location.pathname=='/loader'?loader():'';
};

function closemenu() {
  var menustree = document.getElementsByClassName('menuClose');
  for (var i = 0; i < menustree.length; i++) {
    menustree[i].classList.remove('menu-open');
    menustree[i].addEventListener("click", cierraMenu, false);
   }
  var pmenu = document.getElementsByClassName('activeOn')[0].parentNode.parentNode.parentNode;
  pmenu.classList.add('menu-open');
  pmenu.classList.add('activeMenu');
  pmenu.querySelector('.nav-treeview').style.display="block";
};

function cierraMenu() {
  this.classList.add('activeMenuClick');
  var menustree = document.getElementsByClassName('menuClose');
  for (var i = 0; i < menustree.length; i++) {
    menustree[i].classList.contains('activeMenu') || menustree[i].classList.contains('activeMenuClick') ? menustree[i].classList.remove('activeMenuClick') : (menustree[i].classList.remove('menu-open'),menustree[i].children[1].style.display="none");
  }
}

function loader() {
    var element = document.getElementById('loader');
    element.classList.remove('o-hidden-loader');
    setTimeout(function(){ element.classList.add('o-hidden-loader'); }, 3000);
}

 