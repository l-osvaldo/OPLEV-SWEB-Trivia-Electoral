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
$('#modalNuevaPregunta').on('show.bs.modal', function(event) {
    var etiquetas = ["Etiqueta1", "Etiqueta2", "Etiqueta3", "Etiqueta4", "Etiqueta5", "Etiqueta6", "h", "o"];
    var htmlEtiquetas = '';
    var bandera = true;
    for (var i = 0; i < etiquetas.length; i++) {
        //console.log(etiquetas[i]);
        bandera = true;
        if (i == 0 || i == 4 || i == 8) {
            htmlEtiquetas += '<div class="row">';
        }
        htmlEtiquetas += '<div class="col-sm-3">';
        htmlEtiquetas += '<div class="custom-control custom-checkbox">';
        htmlEtiquetas += '<input class="custom-control-input validacion-o grupoCreado" type="checkbox" id="customCheckbox' + (i + 1) + '" data-type="checkbox" data-group="grupoCreado" data-inputname="etiquetas">';
        htmlEtiquetas += '<label for="customCheckbox' + (i + 1) + '" class="custom-control-label">' + etiquetas[i] + '</label>';
        htmlEtiquetas += '</div>';
        htmlEtiquetas += '</div>';
        if (i == 3 || i == 7 || i == 11) {
            htmlEtiquetas += '</div>';
            bandera = false;
        }
    }
    if (bandera) {
        htmlEtiquetas += '</div>';
    }
    htmlEtiquetas += '<div class="boxMesNum">';
    htmlEtiquetas += '<div id="error-grupoCreado" class="errorMessage"></div';
    htmlEtiquetas += '</div>';
    // console.log(htmlEtiquetas);
    document.getElementById('etiquetas').innerHTML = htmlEtiquetas;
});
$('#modalEditarPregunta').on('show.bs.modal', function(event) {
    var data = $(event.relatedTarget);
    var id = data.data('id');
    var pregunta = data.data('pregunta');
    var opc_a = data.data('opca');
    var opc_b = data.data('opcb');
    var opc_c = data.data('opcc');
    var complemento = data.data('complemento');
    var respuesta = data.data('respuesta');
    var etiquetas = ["Etiqueta1", "Etiqueta2", "Etiqueta3", "Etiqueta4", "Etiqueta5", "Etiqueta6"];
    console.log(respuesta);
    //
    document.getElementById('editPreguntaId').value = id;
    document.getElementById('preguntaEditar').value = pregunta;
    document.getElementById('opcion_a_editar').value = opc_a;
    document.getElementById('opcion_b_editar').value = opc_b;
    document.getElementById('opcion_c_editar').value = opc_c;
    document.getElementById('complemento_error_editar').value = complemento;
    document.getElementById('respuestaEditar').value = respuesta;
    //
    document.getElementById('preguntaEditar').classList.add("is-valid");
    document.getElementById('opcion_a_editar').classList.add("is-valid");
    document.getElementById('opcion_b_editar').classList.add("is-valid");
    document.getElementById("opcion_c_editar").classList.add("is-valid");
    document.getElementById("complemento_error_editar").classList.add("is-valid");
    document.getElementById("respuestaEditar").classList.add("is-valid");
    //
    document.getElementById('string-preguntaEditar').innerHTML = 500 - pregunta.length;
    document.getElementById('string-opcion_a_editar').innerHTML = 300 - opc_a.length;
    document.getElementById('string-opcion_b_editar').innerHTML = 300 - opc_b.length;
    document.getElementById('string-opcion_c_editar').innerHTML = 300 - opc_c.length;
    document.getElementById('string-complemento_error_editar').innerHTML = 250 - complemento.length;
    //
    document.getElementById('preguntaEditar').removeAttribute("data-errvjs");
    document.getElementById('opcion_a_editar').removeAttribute("data-errvjs");
    document.getElementById('opcion_b_editar').removeAttribute("data-errvjs");
    document.getElementById('opcion_c_editar').removeAttribute("data-errvjs");
    document.getElementById('complemento_error_editar').removeAttribute("data-errvjs");
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
                    var complemento = document.getElementById('complemento_error_editar').value;
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
                            complemento: complemento,
                            respuesta: respuesta
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            location.reload();
                            //document.getElementById('btnActualizarBancoPreguntas').disabled = false;
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
    document.getElementById('complemento_error_editar').value = '';
    document.getElementById('respuestaEditar').value = '';
    //
    document.getElementById("preguntaEditar").classList.remove("is-invalid");
    document.getElementById("opcion_a_editar").classList.remove("is-invalid");
    document.getElementById("opcion_b_editar").classList.remove("is-invalid");
    document.getElementById("opcion_c_editar").classList.remove("is-invalid");
    document.getElementById("complemento_error_editar").classList.remove("is-invalid");
    document.getElementById("respuestaEditar").classList.remove("is-invalid");
    //
    document.getElementById("preguntaEditar").classList.remove("is-valid");
    document.getElementById("opcion_a_editar").classList.remove("is-valid");
    document.getElementById("opcion_b_editar").classList.remove("is-valid");
    document.getElementById("opcion_c_editar").classList.remove("is-valid");
    document.getElementById("complemento_error_editar").classList.remove("is-valid");
    document.getElementById("respuestaEditar").classList.remove("is-valid");
    //
    document.getElementById("preguntaEditar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_a_editar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_b_editar").setAttribute('data-errvjs', 1);
    document.getElementById("opcion_c_editar").setAttribute('data-errvjs', 1);
    document.getElementById("complemento_error_editar").setAttribute('data-errvjs', 1);
    document.getElementById("respuestaEditar").setAttribute('data-errvjs', 1);
    //
    document.getElementById('error-preguntaEditar').innerHTML = '';
    document.getElementById('error-opcion_a_editar').innerHTML = '';
    document.getElementById('error-opcion_b_editar').innerHTML = '';
    document.getElementById('error-opcion_c_editar').innerHTML = '';
    document.getElementById('error-complemento_error_editar').innerHTML = '';
    document.getElementById('error-respuestaEditar').innerHTML = '';
    //
    document.getElementById('string-preguntaEditar').innerHTML = '50';
    document.getElementById('string-opcion_a_editar').innerHTML = '50';
    document.getElementById('string-opcion_b_editar').innerHTML = '50';
    document.getElementById('string-opcion_c_editar').innerHTML = '50';
    document.getElementById('string-complemento_error_editar').innerHTML = '50';
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
$('.estatusBtn').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var status = $(this).attr("data-status");
    var title = status === '1' ? 'Deshabilitar' : 'Habilitar';
    var body = status === '1' ? 'deshabilito' : 'habilito';
    //console.log('status');
    Swal.fire({
        title: title + " Pregunta",
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
                    url: "HabilitarDeshabilitarPregunta",
                    data: {
                        _token: CSRF_TOKEN,
                        status: status,
                        id: id
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        location.reload();
                        $(document).Toasts('create', {
                            class: 'bg-maroon',
                            title: title + 'Pregunta',
                            subtitle: title,
                            body: 'Se ' + body + ' la pregunta con exito',
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

function actualizarBaseDeDatosApp() {
    Swal.fire({
        title: "Se actualizará el banco de preguntas en la aplicación móvil, por favor asegúrese de haber terminado con la edición de las preguntas",
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
                $.ajax({
                    type: 'POST',
                    url: "actualizarBaseDeDatosApp",
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        location.reload();
                        $(document).Toasts('create', {
                            class: 'bg-maroon',
                            title: 'Preguntas',
                            subtitle: 'Actualización',
                            body: 'Se actualizó el bando de preguntas con exito.',
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