/*************************************************************

  Funcionalidad: Ejecuta los métodos de los componentes de Tempusdominus.
  Parametros: Documento.
  Mas opciones: https://tempusdominus.github.io/bootstrap-4/Usage/

***************************************************************/

$(document).ready(function() {

    // Time and date
    $('.date-time-picker').datetimepicker({
        locale: 'es'
    });

    // Date only
    $('.date-picker').datetimepicker({
        locale: 'es',
        format: 'L'
    });

    // Time only
    $('.time-picker').datetimepicker({
        format: 'LT'
    });
    
    // Linked pickers
    $('.date-picker-end').datetimepicker({
        useCurrent: false
    });
    $(".date-picker-start").on("change.datetimepicker", function (e) {
        $('.date-picker-end').datetimepicker('minDate', e.date);
    });
    $(".date-picker-end").on("change.datetimepicker", function (e) {
        $('.date-picker-start').datetimepicker('maxDate', e.date);
    });

    // Actualizar iconos de FontAwesome 5
    $('.datetimepicker-input').datetimepicker({
        icons: {
            time: 'fas fa-clock',
            date: 'far fa-calendar'
        }
    })
      
});