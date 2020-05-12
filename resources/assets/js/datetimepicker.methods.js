/*************************************************************

  Funcionalidad: Ejecuta los métodos de los componentes de Tempusdominus.
  Parametros: Documento.
  Mas opciones: https://tempusdominus.github.io/bootstrap-4/Usage/

***************************************************************/

$(document).ready(function () {

    // Fecha y Hora
    $('.date-time-picker').datetimepicker({
        locale: 'es',
        icons: {
            time: 'fas fa-clock'
        }
    })

    // Sólo Fecha
    $('.date-picker').datetimepicker({
        locale: 'es',
        format: 'L'
    })

    // Sólo Hora
    $('.time-picker').datetimepicker({
        format: 'LT'
    })

    // Rango de Fecha con Hora
    $('.date-time-picker-start').datetimepicker({
        locale: 'es',
        icons: {
            time: 'fas fa-clock'
        }
    });
    $('.date-time-picker-end').datetimepicker({
        useCurrent: false,
        locale: 'es',
        icons: {
            time: 'fas fa-clock'
        }
    })
    $(".date-time-picker-start").on("change.datetimepicker", function (e) {
        $('.date-time-picker-end').datetimepicker('minDate', e.date);
    })
    $(".date-time-picker-end").on("change.datetimepicker", function (e) {
        $('.date-time-picker-start').datetimepicker('maxDate', e.date);
    })

    // Rango de sólo Fecha
    $('.date-picker-start').datetimepicker({
        locale: 'es',
        format: 'L'
    });
    $('.date-picker-end').datetimepicker({
        useCurrent: false,
        locale: 'es',
        format: 'L',
    })
    $(".date-picker-start").on("change.datetimepicker", function (e) {
        $('.date-picker-end').datetimepicker('minDate', e.date);
    })
    $(".date-picker-end").on("change.datetimepicker", function (e) {
        $('.date-picker-start').datetimepicker('maxDate', e.date);
    })

});
