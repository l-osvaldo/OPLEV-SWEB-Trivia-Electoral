function registrarPregunta(e) {
    e.preventDefault();
    if (checkFormAjax(document.getElementById('formePregunta'))) { //Si el formulario es valido;
        Swal.fire({
            title: "Crear Pregunta",
            text: "¿Desea continuar?",
            type: "warning",
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: '<i class="far fa-check-circle"></i>  Aceptar',
            confirmButtonAriaLabel: 'Aceptar',
            cancelButtonText: '<i class="far fa-times-circle"></i>  Cancelar',
            cancelButtonAriaLabel: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                if (result.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var pregunta = document.getElementById('preguntaNueva').value;
                    var opc_a = document.getElementById('opcion_a_nueva').value;
                    var opc_b = document.getElementById('opcion_b_nueva').value;
                    var opc_c = document.getElementById('opcion_c_nueva').value;
                    var opc_d = document.getElementById('opcion_d_nueva').value;
                    var respuesta = document.getElementById('respuestaNueva').value;
                    $.ajax({
                        type: 'POST',
                        url: "registrarPregunta",
                        data: {
                            _token: CSRF_TOKEN,
                            pregunta: pregunta,
                            opcion_a: opc_a,
                            opcion_b: opc_b,
                            opcion_c: opc_c,
                            opcion_d: opc_d,
                            respuesta: respuesta
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            location.reload();
                            $(document).Toasts('create', {
                                class: 'bg-maroon',
                                title: 'Crear nueva pregunta',
                                subtitle: 'Regristro',
                                body: 'Se registro la pregunta en el sistema con exito',
                                autohide: true,
                                delay: 7000,
                            })
                        }
                    });
                } else {
                    e.dismiss;
                }
            }
        }, function(dismiss) {
            return false;
        });
    }
}