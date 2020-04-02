var token = $('meta[name="csrf-token"]').attr('content');
var notificationsWrapper   = $('.dropdown-notifications');
var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('i[data-count]');
var notificationsCount     = parseInt(notificationsCountElem.data('count'));
var notifications          = notificationsWrapper.find('div.test');
if (notificationsCount <= 0) {
  notificationsWrapper.hide();
}
var key = "{{ env('PUSHER_APP_KEY') }}";
var pusher = new Pusher(key, {
  authEndpoint: '/sicli/'+'/authchannel',
  auth: {
    headers: {
      'X-CSRF-Token': $("[name='csrf-token']").attr('content')
    }
  },
  cluster: 'us2',
  forceTLS: true
});

Pusher.logToConsole = true;

var privateChannel = pusher.subscribe('private-notify');
privateChannel.bind('notificacion', function(data) {
  $.each(data, function(i, item) {
   var usuario = item.usuario;
   var mensaje = item.mensaje;
   var ruta = item.ruta;
   var a = item.a;
   var ape = item.ape;
   $.ajax({
     type:'POST',
     url:'/sicli'+"/notifyservice",
     header: {"X-CSRF-Token": token},
     data:{usuario:usuario, mensaje:mensaje, ruta:ruta, a:a, ape:ape},
     success:function(data){
      if (data.success.a != '{{Auth::user()->id}}'){
       if (data.success.ape == '{{Auth::user()->id_area}}'){
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
        <div class="dropdown-divider"></div>
        <a href="{{ config('app.url')}}/`+data.success.ruta+`" class="dropdown-item">
        <img src="{{ asset('images/`+data.success.ruta+`.png')}}" class="img-circle" alt="50x50" style="width: 50px; height: 50px;"><strong style="padding-left:5px;">`+data.success.usuario+`</strong>
        <br>
        <span>`+data.success.mensaje+`</span>
        <span class="float-right text-muted text-sm">`+data.success.dt+`</span>
        </a>
        `;
        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
      }
    }
  }
});
 });
});
</script>
