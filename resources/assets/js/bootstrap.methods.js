/*************************************************************

  Funcionalidad: Ejecuta los métodos de los componentes de Bootstrap.
  Parametros: Documento.

***************************************************************/

$(document).ready(function() {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $('.carousel').carousel({
        interval: 2000
    })
});