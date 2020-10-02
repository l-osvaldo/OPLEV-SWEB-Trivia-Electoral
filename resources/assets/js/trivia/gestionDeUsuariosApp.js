$('#modalEditarUsuariosAPP').on('show.bs.modal', function(event) {
    var data = $(event.relatedTarget);
    var id = data.data('id');
    var nombre = data.data('nombre');
    var edad = "" + data.data('edad');
    var genero = data.data('genero');
    var municipio = data.data('municipio');
    console.log(edad);
    //
    document.getElementById('editUsuarioAPPId').value = id;
    document.getElementById('nombreUsuarioAPPEdit').value = nombre;
    document.getElementById('edadUsuarioAPPEdit').value = edad;
    document.getElementById('generoUsuarioAPP').value = genero;
    document.getElementById('municipioUsuarioAPP').value = municipio;
    //
    document.getElementById('nombreUsuarioAPPEdit').classList.add("is-valid");
    document.getElementById('edadUsuarioAPPEdit').classList.add("is-valid");
    document.getElementById('generoUsuarioAPP').classList.add("is-valid");
    document.getElementById("municipioUsuarioAPP").classList.add("is-valid");
    //
    document.getElementById('string-nombreUsuarioAPPEdit').innerHTML = 50 - nombre.length;
    document.getElementById('string-edadUsuarioAPPEdit').innerHTML = 3 - edad.length;
    //
    document.getElementById('nombreUsuarioAPPEdit').removeAttribute("data-errvjs");
    document.getElementById('edadUsuarioAPPEdit').removeAttribute("data-errvjs");
    document.getElementById('generoUsuarioAPP').removeAttribute("data-errvjs");
    document.getElementById('municipioUsuarioAPP').removeAttribute("data-errvjs");
});
$('#modalEditarUsuariosAPP').on('hidden.bs.modal', function(e) {
    document.getElementById('editUsuarioAPPId').value = '';
    document.getElementById('nombreUsuarioAPPEdit').value = '';
    document.getElementById('edadUsuarioAPPEdit').value = '';
    document.getElementById('generoUsuarioAPP').value = '';
    document.getElementById('municipioUsuarioAPP').value = '';
    //
    document.getElementById("nombreUsuarioAPPEdit").classList.remove("is-invalid");
    document.getElementById("edadUsuarioAPPEdit").classList.remove("is-invalid");
    document.getElementById("generoUsuarioAPP").classList.remove("is-invalid");
    document.getElementById("municipioUsuarioAPP").classList.remove("is-invalid");
    //
    document.getElementById("nombreUsuarioAPPEdit").classList.remove("is-valid");
    document.getElementById("edadUsuarioAPPEdit").classList.remove("is-valid");
    document.getElementById("generoUsuarioAPP").classList.remove("is-valid");
    document.getElementById("municipioUsuarioAPP").classList.remove("is-valid");
    //
    document.getElementById("nombreUsuarioAPPEdit").setAttribute('data-errvjs', 1);
    document.getElementById("edadUsuarioAPPEdit").setAttribute('data-errvjs', 1);
    document.getElementById("generoUsuarioAPP").setAttribute('data-errvjs', 1);
    document.getElementById("municipioUsuarioAPP").setAttribute('data-errvjs', 1);
    //
    document.getElementById('error-nombreUsuarioAPPEdit').innerHTML = '';
    document.getElementById('error-edadUsuarioAPPEdit').innerHTML = '';
    document.getElementById('error-generoUsuarioAPP').innerHTML = '';
    document.getElementById('error-municipioUsuarioAPP').innerHTML = '';
    //
    document.getElementById('string-nombreUsuarioAPPEdit').innerHTML = '50';
    document.getElementById('string-edadUsuarioAPPEdit').innerHTML = '3';
});

function editarUsuarioAPP(e) {
    e.preventDefault();
    if (checkFormAjax(document.getElementById('formeUsuariosAPPEditar'))) { //Si el formulario es valido;
        Swal.fire({
            title: "Editar Información del Usuario",
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
                    var id = document.getElementById('editUsuarioAPPId').value;
                    var nombre = document.getElementById('nombreUsuarioAPPEdit').value;
                    var edad = document.getElementById('edadUsuarioAPPEdit').value;
                    var genero = document.getElementById('generoUsuarioAPP').value;
                    var municipio = document.getElementById('municipioUsuarioAPP').value;
                    $.ajax({
                        type: 'POST',
                        url: "EditarInformacionUsuarioAPP",
                        data: {
                            _token: CSRF_TOKEN,
                            id: id,
                            nombre: nombre,
                            edad: edad,
                            genero: genero,
                            municipio: municipio
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            location.reload();
                            $(document).Toasts('create', {
                                class: 'bg-maroon',
                                title: 'Editar Información del Usuario',
                                subtitle: 'Editar',
                                body: 'Se actualizó la información del usuario con exito.',
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
$(document).on("click", ".deleteUsuarioApp", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    Swal.fire({
        title: "Eliminar Usuario",
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
                    url: "eliminarUsuarioApp",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    dataType: 'JSON',
                    success: function(results) {
                        location.reload();
                        $(document).Toasts('create', {
                            class: 'bg-maroon',
                            title: 'Eliminar Usuario',
                            subtitle: 'Eliminar',
                            body: 'Se ha eliminado el usuariodel sistema con exito.',
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
$('.estatusBtnUsuario').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var status = $(this).attr("data-status");
    var title = status === '1' ? 'Deshabilitar' : 'Habilitar';
    var body = status === '1' ? 'deshabilito' : 'habilito';
    //console.log('status');
    Swal.fire({
        title: title + " Usuario",
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
                    url: "HabilitarDeshabilitarUsuario",
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
                            title: title + 'Usuario',
                            subtitle: title,
                            body: 'Se ' + body + ' el usuario con exito',
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
$('#modalEditarUsuariosAPPOEF').on('show.bs.modal', function(event) {
    var data = $(event.relatedTarget);
    var id = data.data('id');
    var nombre = data.data('nombre');
    var edad = "" + data.data('edad');
    var genero = data.data('genero');
    var estado = data.data('estado');
    //console.log(edad);
    //
    document.getElementById('editUsuarioAPPIdOEF').value = id;
    document.getElementById('nombreUsuarioAPPEditOEF').value = nombre;
    document.getElementById('edadUsuarioAPPEditOEF').value = edad;
    document.getElementById('generoUsuarioAPPOEF').value = genero;
    document.getElementById('EstadoUsuarioAPPOEF').value = estado;
    //
    document.getElementById('nombreUsuarioAPPEditOEF').classList.add("is-valid");
    document.getElementById('edadUsuarioAPPEditOEF').classList.add("is-valid");
    document.getElementById('generoUsuarioAPPOEF').classList.add("is-valid");
    document.getElementById("EstadoUsuarioAPPOEF").classList.add("is-valid");
    //
    document.getElementById('string-nombreUsuarioAPPEditOEF').innerHTML = 50 - nombre.length;
    document.getElementById('string-edadUsuarioAPPEditOEF').innerHTML = 3 - edad.length;
    //
    document.getElementById('nombreUsuarioAPPEditOEF').removeAttribute("data-errvjs");
    document.getElementById('edadUsuarioAPPEditOEF').removeAttribute("data-errvjs");
    document.getElementById('generoUsuarioAPPOEF').removeAttribute("data-errvjs");
    document.getElementById('EstadoUsuarioAPPOEF').removeAttribute("data-errvjs");
});
$('#modalEditarUsuariosAPPOEF').on('hidden.bs.modal', function(e) {
    document.getElementById('editUsuarioAPPIdOEF').value = '';
    document.getElementById('nombreUsuarioAPPEditOEF').value = '';
    document.getElementById('edadUsuarioAPPEditOEF').value = '';
    document.getElementById('generoUsuarioAPPOEF').value = '';
    document.getElementById('EstadoUsuarioAPPOEF').value = '';
    //
    document.getElementById("nombreUsuarioAPPEditOEF").classList.remove("is-invalid");
    document.getElementById("edadUsuarioAPPEditOEF").classList.remove("is-invalid");
    document.getElementById("generoUsuarioAPPOEF").classList.remove("is-invalid");
    document.getElementById("EstadoUsuarioAPPOEF").classList.remove("is-invalid");
    //
    document.getElementById("nombreUsuarioAPPEditOEF").classList.remove("is-valid");
    document.getElementById("edadUsuarioAPPEditOEF").classList.remove("is-valid");
    document.getElementById("generoUsuarioAPPOEF").classList.remove("is-valid");
    document.getElementById("EstadoUsuarioAPPOEF").classList.remove("is-valid");
    //
    document.getElementById("nombreUsuarioAPPEditOEF").setAttribute('data-errvjs', 1);
    document.getElementById("edadUsuarioAPPEditOEF").setAttribute('data-errvjs', 1);
    document.getElementById("generoUsuarioAPPOEF").setAttribute('data-errvjs', 1);
    document.getElementById("EstadoUsuarioAPPOEF").setAttribute('data-errvjs', 1);
    //
    document.getElementById('error-nombreUsuarioAPPEditOEF').innerHTML = '';
    document.getElementById('error-edadUsuarioAPPEditOEF').innerHTML = '';
    document.getElementById('error-generoUsuarioAPPOEF').innerHTML = '';
    document.getElementById('error-EstadoUsuarioAPPOEF').innerHTML = '';
    //
    document.getElementById('string-nombreUsuarioAPPEditOEF').innerHTML = '50';
    document.getElementById('string-edadUsuarioAPPEditOEF').innerHTML = '3';
});

function editarUsuarioAPPOEF(e) {
    e.preventDefault();
    if (checkFormAjax(document.getElementById('formeUsuariosAPPEditarOEF'))) { //Si el formulario es valido;
        Swal.fire({
            title: "Editar Información del Usuario",
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
                    var id = document.getElementById('editUsuarioAPPIdOEF').value;
                    var nombre = document.getElementById('nombreUsuarioAPPEditOEF').value;
                    var edad = document.getElementById('edadUsuarioAPPEditOEF').value;
                    var genero = document.getElementById('generoUsuarioAPPOEF').value;
                    var estado = document.getElementById('EstadoUsuarioAPPOEF').value;
                    $.ajax({
                        type: 'POST',
                        url: "EditarInformacionUsuarioAPPOEF",
                        data: {
                            _token: CSRF_TOKEN,
                            id: id,
                            nombre: nombre,
                            edad: edad,
                            genero: genero,
                            estado: estado
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            location.reload();
                            $(document).Toasts('create', {
                                class: 'bg-maroon',
                                title: 'Editar Información del Usuario',
                                subtitle: 'Editar',
                                body: 'Se actualizó la información del usuario con exito.',
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