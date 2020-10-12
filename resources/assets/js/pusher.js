var token = $('meta[name="csrf-token"]').attr('content');
var pusherKey = $('meta[name="pusher-key"]').attr('content');
var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('i[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('div.test');
// if (notificationsCount <= 0) {
//     notificationsWrapper.hide();
// }
var key = pusherKey;
var pusher = new Pusher(key, {
    authEndpoint: '/authchannel',
    auth: {
        headers: {
            'X-CSRF-Token': $("[name='csrf-token']").attr('content')
        }
    },
    cluster: 'us2',
    forceTLS: true
});
Pusher.logToConsole = true;
var privateChannel = pusher.subscribe('private-example');
// privateChannel.bind('example', function(data) {
//     $.each(data, function(i, item) {
//         var mensaje = item.mensaje;
//         console.log(mensaje);
//         $.ajax({
//             type: 'POST',
//             url: '/notifyservice',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: {
//                 mensaje: mensaje
//             },
//             success: function(data) {
//                 var existingNotifications = notifications.html();
//                 var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
//                 var newNotificationHtml = `
//         <div class="dropdown-divider"></div>
//         <a href="#" class="dropdown-item">
//         <i class="fas fa-user-astronaut"></i><strong style="padding-left:5px;">Usuario de Ejemplo</strong>
//         <br>
//         <span>` + data.success.men + `</span>
//         <span class="float-right text-muted text-sm">Hace 1 segundo</span>
//         </a>
//         `;
//                 notifications.html(newNotificationHtml + existingNotifications);
//                 notificationsCount += 1;
//                 notificationsCountElem.attr('data-count', notificationsCount);
//                 notificationsWrapper.find('.notif-count').text(notificationsCount);
//                 notificationsWrapper.show();
//             }
//         });
//     });
// });
privateChannel.bind('example', function(data) {
    var datanot = JSON.parse(data.notify);
    console.log(decrypt_notify('trivia2020Notify', datanot.fecha));
    //console.log(decrypt_notify('tupasswordaqui',datanot.xxx02));
    //console.log(decrypt_notify('tupasswordaqui',datanot.xxx03));
    var oldNotify = document.getElementById('alertIcon').textContent;
    var totalNotify = oldNotify ? parseInt(oldNotify) + 1 : 1;
    document.getElementById('alertIcon').textContent = totalNotify;
    document.getElementById('alertIcon2').textContent = totalNotify;
    document.getElementById("marcoCountNotificaciones").style.display = 'block';
    let col = document.createElement('div');
    var contenido = '<a class="dropdown-item" style="padding: .1em !important;background:#efefef;">';
    contenido += '<div class="media" style="margin: 0.5em 0;">';
    contenido += '<div style="position: relative;text-align: center;" class="col-md-3">';
    contenido += '<img src="{{ asset("images/logoople.png") }}" width="50" height="50" style="border-radius: 90px;border: solid 1px #DCDCDC;">'
    //contenido +=                      decrypt_notify('trivia2020Notify', datanot.mensaje);
    contenido += '</div>';
    contenido += '<div class="media-body">';
    contenido += '<b class="dropdown-item-title" style="font-size: 13px !important;">';
    contenido += decrypt_notify('trivia2020Notify', datanot.mensaje);
    contenido += '</b>' + '<p style="font-size: 12px !important;" class="text-sm">';
    contenido += decrypt_notify('trivia2020Notify', datanot.email);
    contenido += '</p>' + '<p style="font-size: 10px !important;" class="text-sm text-muted">';
    contenido += decrypt_notify('trivia2020Notify', datanot.nombre);
    contenido += '</p>' + '<p style="font-size: 10px !important;" class="text-sm text-muted">';
    contenido += decrypt_notify('trivia2020Notify', datanot.fecha);
    contenido += '</p>' + '</div>' + '</div>' + '</a>';
    col.innerHTML = contenido;
    document.getElementById('addNotify').insertBefore(col, document.getElementById('addNotify').childNodes[0]);
    //document.getElementById('countNotifys').setAttribute('data-type', 'XPOERTZ#&');
    $(document).Toasts('create', {
        class: 'bg-maroon',
        title: '¡ALERTA!',
        position: 'bottomRight',
        subtitle: decrypt_notify('trivia2020Notify', datanot.mensaje),
        body: decrypt_notify('trivia2020Notify', datanot.email),
        autohide: true,
        delay: 7000,
    })
});

function decrypt_notify(passphrase, encrypted_json_string) {
    var obj_json = JSON.parse(encrypted_json_string);
    var encrypted = obj_json.ciphertext;
    var salt = CryptoJS.enc.Hex.parse(obj_json.salt);
    var iv = CryptoJS.enc.Hex.parse(obj_json.iv);
    var key = CryptoJS.PBKDF2(passphrase, salt, {
        hasher: CryptoJS.algo.SHA512,
        keySize: 64 / 8,
        iterations: 999
    });
    var decrypted = CryptoJS.AES.decrypt(encrypted, key, {
        iv: iv
    });
    return decrypted.toString(CryptoJS.enc.Utf8);
}
let pagina = 2;
var banderaNotificacioes = true;
$(document).ready(function() {
    $('#addNotify').scroll(function() {
        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight && banderaNotificacioes) {
            banderaNotificacioes = false;
            //document.getElementBy("spinnerDiv").style.display = 'block';
            let col = document.createElement('div');
            var contenido = '<div style="padding: .1em !important;background:#efefef !important;text-align: center;" align="center" id="spinnerDiv' + pagina + '" class="classNotificacionSpinner">';
            contenido += '<div class="spinner-border text-primary" role="status">';
            contenido += '<span class="sr-only">Loading...</span>';
            contenido += '</div>';
            contenido += '</div>';
            col.innerHTML = contenido;
            document.getElementById('addNotify').appendChild(col);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/scrollNotificaciones?page=" + pagina,
                type: 'GET',
                // data: {
                //     page: pagina
                // },
                dataType: 'html',
                success: function(data) {
                    //console.log(data);
                    //document.getElementById('addNotify').appendChild(data);
                    document.getElementById("spinnerDiv" + pagina).style.display = 'none';
                    document.getElementById("addNotify").innerHTML += data;
                    pagina++;
                    banderaNotificacioes = true;
                }
            })
        }
    });
});

function limpiarNotificaciones() {
    document.getElementById('alertIcon').textContent = 0;
    document.getElementById("marcoCountNotificaciones").style.display = 'none';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "updateStatusNotificaciones",
        type: 'GET',
        success: function(data) {
            //console.log(data);
        }
    })
}