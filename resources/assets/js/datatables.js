$(document).ready(function() {
    $('#example').DataTable({
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "fixedHeader": true,
        "sSearch": "Filter Data",
        "dom": "<'row'<'col-sm-2'l><'col-sm-6 text-center'B><'col-sm-4 text-right'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "buttons": [{
            "extend": "excelHtml5",
            "autoFilter": true,
            "sheetName": "Lista de Usuarios"
        }]
    });
});
$(document).ready(function() {
    $('#dataTablePreguntas').DataTable({
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "fixedHeader": true,
        "autoWidth": false,
        "sSearch": "Filter Data",
        "dom": "<'row'<'col-sm-2'l><'col-sm-6 text-center'B><'col-sm-4 text-right'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "buttons": [{
            "extend": "excelHtml5",
            "autoFilter": true,
            "sheetName": "Lista de preguntas"
        }],
        "columnDefs": [{
            "width": '30%',
            "targets": 0
        }],
    });
});