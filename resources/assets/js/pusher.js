var token = $('meta[name="csrf-token"]').attr('content');
var pusherKey = $('meta[name="pusher-key"]').attr('content');
var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('i[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('div.test');
if (notificationsCount <= 0) {
    notificationsWrapper.hide();
}
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
privateChannel.bind('example', function (data) {
    $.each(data, function (i, item) {
        var mensaje = item.mensaje;
        console.log(mensaje);
        $.ajax({
            type: 'POST',
            url: '/notifyservice',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                mensaje: mensaje
            },
            success: function (data) {
                var existingNotifications = notifications.html();
                var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
                var newNotificationHtml = `
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
        <i class="fas fa-user-astronaut"></i><strong style="padding-left:5px;">Usuario de Ejemplo</strong>
        <br>
        <span>` + data.success.men + `</span>
        <span class="float-right text-muted text-sm">Hace 1 segundo</span>
        </a>
        `;
                notifications.html(newNotificationHtml + existingNotifications);
                notificationsCount += 1;
                notificationsCountElem.attr('data-count', notificationsCount);
                notificationsWrapper.find('.notif-count').text(notificationsCount);
                notificationsWrapper.show();
            }
        });
    });
});
