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
$('#modalNuevaPregunta').on('hidden.bs.modal', function(e) {
    document.getElementById('preguntaNueva').value = '';
    document.getElementById('opcion_a_nueva').value = '';
    document.getElementById('opcion_b_nueva').value = '';
    document.getElementById('opcion_c_nueva').value = '';
    document.getElementById('opcion_d_nueva').value = '';
    document.getElementById('respuestaNueva').value = '';
    //
    document.getElementById("preguntaNueva").classList.remove("is-invalid");
    document.getElementById("opcion_a_nueva").classList.remove("is-invalid");
    document.getElementById("opcion_b_nueva").classList.remove("is-invalid");
    document.getElementById("opcion_c_nueva").classList.remove("is-invalid");
    document.getElementById("opcion_d_nueva").classList.remove("is-invalid");
    document.getElementById("respuestaNueva").classList.remove("is-invalid");
    //
    document.getElementById("preguntaNueva").classList.remove("is-valid");
    document.getElementById("opcion_a_nueva").classList.remove("is-valid");
    document.getElementById("opcion_b_nueva").classList.remove("is-valid");
    document.getElementById("opcion_c_nueva").classList.remove("is-valid");
    document.getElementById("opcion_d_nueva").classList.remove("is-valid");
    document.getElementById("respuestaNueva").classList.remove("is-valid");
    //
    document.getElementById("preguntaNueva").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_a_nueva").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_b_nueva").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_c_nueva").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_d_nueva").setAttribute('data-errvjs', 1);
    document.getElementById("respuestaNueva").setAttribute('data-errvjs', 1);
    //
    document.getElementById('error-preguntaNueva').innerHTML = '';
    document.getElementById('error-opcion_a_nueva').innerHTML = '';
    document.getElementById('error-opcion_b_nueva').innerHTML = '';
    document.getElementById('error-opcion_c_nueva').innerHTML = '';
    document.getElementById('error-opcion_d_nueva').innerHTML = '';
    document.getElementById('error-respuestaNueva').innerHTML = '';
    //
    document.getElementById('string-preguntaNueva').innerHTML = '50';
    document.getElementById('string-opcion_a_nueva').innerHTML = '50';
    document.getElementById('string-opcion_b_nueva').innerHTML = '50';
    document.getElementById('string-opcion_c_nueva').innerHTML = '50';
    document.getElementById('string-opcion_d_nueva').innerHTML = '50';
});
$('#modalEditarPregunta').on('show.bs.modal', function(event) {
    var data = $(event.relatedTarget);
    var id = data.data('id');
    var pregunta = data.data('pregunta');
    var opc_a = data.data('opca');
    var opc_b = data.data('opcb');
    var opc_c = data.data('opcc');
    var opc_d = data.data('opcd');
    var respuesta = data.data('respuesta');
    //
    document.getElementById('editPreguntaId').value = id;
    document.getElementById('preguntaEditar').value = pregunta;
    document.getElementById('opcion_a_editar').value = opc_a;
    document.getElementById('opcion_b_editar').value = opc_b;
    document.getElementById('opcion_c_editar').value = opc_c;
    document.getElementById('opcion_d_editar').value = opc_d;
    document.getElementById('respuestaEditar').value = respuesta;
    //
    document.getElementById('preguntaEditar').classList.add("is-valid");
    document.getElementById('opcion_a_editar').classList.add("is-valid");
    document.getElementById('opcion_b_editar').classList.add("is-valid");
    document.getElementById("opcion_c_editar").classList.add("is-valid");
    document.getElementById("opcion_d_editar").classList.add("is-valid");
    document.getElementById("respuestaEditar").classList.add("is-valid");
    //
    document.getElementById('string-preguntaEditar').innerHTML = 50 - pregunta.length;
    document.getElementById('string-opcion_a_editar').innerHTML = 50 - opc_a.length;
    document.getElementById('string-opcion_b_editar').innerHTML = 50 - opc_b.length;
    document.getElementById('string-opcion_c_editar').innerHTML = 50 - opc_c.length;
    document.getElementById('string-opcion_d_editar').innerHTML = 50 - opc_d.length;
    //
    document.getElementById('preguntaEditar').removeAttribute("data-errvjs");
    document.getElementById('opcion_a_editar').removeAttribute("data-errvjs");
    document.getElementById('opcion_b_editar').removeAttribute("data-errvjs");
    document.getElementById('opcion_c_editar').removeAttribute("data-errvjs");
    document.getElementById('opcion_d_editar').removeAttribute("data-errvjs");
    document.getElementById('respuestaEditar').removeAttribute("data-errvjs");
});

function editarPregunta(e) {
    e.preventDefault();
    if (checkFormAjax(document.getElementById('formePreguntaEditar'))) { //Si el formulario es valido;
        Swal.fire({
            title: "Editar Pregunta",
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
                    var id = document.getElementById('editPreguntaId').value;
                    var pregunta = document.getElementById('preguntaEditar').value;
                    var opc_a = document.getElementById('opcion_a_editar').value;
                    var opc_b = document.getElementById('opcion_b_editar').value;
                    var opc_c = document.getElementById('opcion_c_editar').value;
                    var opc_d = document.getElementById('opcion_d_editar').value;
                    var respuesta = document.getElementById('respuestaEditar').value;
                    $.ajax({
                        type: 'POST',
                        url: "editarPregunta",
                        data: {
                            _token: CSRF_TOKEN,
                            id: id,
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
                                title: 'Editar pregunta',
                                subtitle: 'Editar',
                                body: 'Se ha editado la pregunta en el sistema con exito',
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
$('#modalEditarPregunta').on('hidden.bs.modal', function(e) {
    document.getElementById('preguntaEditar').value = '';
    document.getElementById('opcion_a_editar').value = '';
    document.getElementById('opcion_b_editar').value = '';
    document.getElementById('opcion_c_editar').value = '';
    document.getElementById('opcion_d_editar').value = '';
    document.getElementById('respuestaEditar').value = '';
    //
    document.getElementById("preguntaEditar").classList.remove("is-invalid");
    document.getElementById("opcion_a_editar").classList.remove("is-invalid");
    document.getElementById("opcion_b_editar").classList.remove("is-invalid");
    document.getElementById("opcion_c_editar").classList.remove("is-invalid");
    document.getElementById("opcion_d_editar").classList.remove("is-invalid");
    document.getElementById("respuestaEditar").classList.remove("is-invalid");
    //
    document.getElementById("preguntaEditar").classList.remove("is-valid");
    document.getElementById("opcion_a_editar").classList.remove("is-valid");
    document.getElementById("opcion_b_editar").classList.remove("is-valid");
    document.getElementById("opcion_c_editar").classList.remove("is-valid");
    document.getElementById("opcion_d_editar").classList.remove("is-valid");
    document.getElementById("respuestaEditar").classList.remove("is-valid");
    //
    document.getElementById("preguntaEditar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_a_editar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_b_editar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_c_editar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_d_editar").setAttribute('data-errvjs', 1);
    document.getElementById("respuestaEditar").setAttribute('data-errvjs', 1);
    //
    document.getElementById('error-preguntaEditar').innerHTML = '';
    document.getElementById('error-opcion_a_editar').innerHTML = '';
    document.getElementById('error-opcion_b_editar').innerHTML = '';
    document.getElementById('error-opcion_c_editar').innerHTML = '';
    document.getElementById('error-opcion_d_editar').innerHTML = '';
    document.getElementById('error-respuestaEditar').innerHTML = '';
    //
    document.getElementById('string-preguntaEditar').innerHTML = '50';
    document.getElementById('string-opcion_a_editar').innerHTML = '50';
    document.getElementById('string-opcion_b_editar').innerHTML = '50';
    document.getElementById('string-opcion_c_editar').innerHTML = '50';
    document.getElementById('string-opcion_d_editar').innerHTML = '50';
});
$(document).on("click", ".deletePregunta", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    Swal.fire({
        title: "Eliminar Pregunta",
        text: "¿Desea continuar?",
        type: "warning",
        showCancelButton: true,
        reverseButtons: true,
        confirmButtonText: '<i class="far fa-check-circle"></i>  Aceptar',
        confirmButtonAriaLabel: 'Aceptar',
        cancelButtonText: '<i class="far fa-times-circle"></i>  Cancelar',
        cancelButtonAriaLabel: 'Cancelar'
    }).then(function(e) {
        if (e.value) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "eliminarPregunta",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        location.reload();
                        $(document).Toasts('create', {
                            class: 'bg-maroon',
                            title: 'Eliminar Pregunta',
                            subtitle: 'Eliminar',
                            body: 'Se ha eliminado la pregunta en el sistema con exito',
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
    })
});