$(function() {

  //var _prefix_url =  $('meta[name="app-prefix"]').attr('content'); //Se genera un prefijo con el nombre de la carpeta en donde este almacenada la aplicación
  //  if(_prefix_url != ""){
  //    _prefix_url = "/"+_prefix_url;
  //  }
  var _prefix_url;
  $('meta[name="app-prefix"]').attr('content') == 'http://sipsei.test' ? _prefix_url='/' : _prefix_url='';
  //var _prefix_url =  '/'; 
  $('#btnGuardarInfo').hide();
  //$('#btnConcentradoPoa').hide();

  $("input#realizadomes").keydown(function (e)
  {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
           // Allow: Ctrl+A, Command+A
          (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
           // Allow: home, end, left, right, down, up
          (e.keyCode >= 35 && e.keyCode <= 40)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
  });

  function limpiaTablaAnalisis()
  {
    $('#enep').html('');
    $('#febp').html('');
    $('#marp').html('');
    $('#abrp').html('');
    $('#mayp').html('');
    $('#junp').html('');
    $('#julp').html('');
    $('#agop').html('');
    $('#sepp').html('');
    $('#octp').html('');
    $('#novp').html('');
    $('#dicp').html('');
    $('#inicio').html('');
    $('#termino').html('');

    $('#ener').html('');
    $('#febr').html('');
    $('#marr').html('');
    $('#abrr').html('');
    $('#mayr').html('');
    $('#junr').html('');
    $('#julr').html('');
    $('#agor').html('');
    $('#sepr').html('');
    $('#octr').html('');
    $('#novr').html('');
    $('#dicr').html('');
  }


$("#programaOP").change(function()
  {
    $('#programaEsp').html('');    
    $('#objetivo').html('');
    $('#actividades').html('');     
    $('#unidadmedida').html('');
    $('#cantidadanual').html('');   
    limpiaTablaAnalisis();
    $('#realizadomes').val(0);
    $('#descactividad').html('');
    $('#soporte').html('');
    $('#observaciones').html('');
    $('#btnGuardarInfo').hide();

    var programa = $('#programaOP').find(':selected').val();
    var comboProgramaEsp = '';

    console.log(_prefix_url,'1');

    $.ajax({
      url: "../obtenProgramaEspPoa",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        console.log(response);
        comboProgramaEsp = "<option value='0'>Programa Específico...</option>";
        $.each(response, function(index, value){
          var cadena = value['claveprogramaesp'] + " - " + value['descprogramaesp'];
          var nomenclatura = value['claveprogramaesp'];
          comboProgramaEsp += '<option value=" '+value['idprogramaesp']+','+nomenclatura+'">'+ cadena +'</option>';
        });
        $('#programaEspOP').html(comboProgramaEsp);
      });

  });



  $("#programa").change(function()
  {
    $('#programaEsp').html('');    
    $('#objetivo').html('');
    $('#actividades').html('');     
    $('#unidadmedida').html('');
    $('#cantidadanual').html('');   
    limpiaTablaAnalisis();
    $('#realizadomes').val(0);
    $('#descactividad').html('');
    $('#soporte').html('');
    $('#observaciones').html('');
    $('#btnGuardarInfo').hide();

    var programa = $('#programa').find(':selected').val();
    var comboProgramaEsp = '';

    console.log(_prefix_url,'2');

    $.ajax({
      url: _prefix_url+"obtenProgramaEspPoa",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        console.log(response);
        comboProgramaEsp = "<option value='0'>Programa Específico...</option>";
        $.each(response, function(index, value){
          var cadena = value['claveprogramaesp'] + " - " + value['descprogramaesp'];
          var nomenclatura = value['claveprogramaesp'];
          comboProgramaEsp += '<option value=" '+value['idprogramaesp']+','+nomenclatura+'">'+ cadena +'</option>';
        });
        $('#programaEsp').html(comboProgramaEsp);
      });

  });

  function obtenObjetivos(programa, programaEsp) {
    //Obtener objetivo de la actividad
    $.ajax({
     url: _prefix_url+"obtenObjetivoAct",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#objetivo').html(response[0]['objprogramaesp']);
    });
  }

  $("#programaEspOP").change(function() 
  {
    $('#objetivo').html('');
    $('#actividades').html('');     
    $('#unidadmedida').html('');
    $('#cantidadanual').html('');   
    limpiaTablaAnalisis();
    $('#realizadomes').val(0);
    $('#descactividad').html('');
    $('#soporte').html('');
    $('#observaciones').html('');
    $('#btnGuardarInfo').hide();




    var programa = $('#programaOP').find(':selected').val();
    var programaEsp = $('#programaEspOP').find(':selected').val();
    var comboActividades = '';

    obtenObjetivos(programa, programaEsp);

    //Obtener actividades
    $.ajax({
     url: _prefix_url+"obtenActividades",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboActividades = "<option value='0'>Seleccione la actividad</option>";
        $.each(response, function(index, value) {
          var cadena = value['numactividad'] + " - " + value['descactividad'];
          var reprogramacion = value['reprogramacion'];
          if(reprogramacion == 0)
            comboActividades += "<option value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";
          else
          {
            if (reprogramacion == 1)
              comboActividades += "<option class='actcambio' value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";          
            else
            {
              if (reprogramacion == 2)
                comboActividades += "<option class='actnueva' value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";          
              else
              {
                if ((reprogramacion == 3) || (reprogramacion == 4))
                  comboActividades += "<option class='actborrada' value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";                
              }
            }
          }
        }); //Each
        $('#actividadesOP').html(comboActividades);
       
        
      }); //Done
       document.getElementById('actividadesOP').setAttribute('data-error', '1');
      disabledBTN();
  });


$("#programaEsp").change(function() 
  {
    $('#objetivo').html('');
    $('#actividades').html('');     
    $('#unidadmedida').html('');
    $('#cantidadanual').html('');   
    limpiaTablaAnalisis();
    $('#realizadomes').val(0);
    $('#descactividad').html('');
    $('#soporte').html('');
    $('#observaciones').html('');
    $('#btnGuardarInfo').hide();




    var programa = $('#programa').find(':selected').val();
    var programaEsp = $('#programaEsp').find(':selected').val();
    var comboActividades = '';

    obtenObjetivos(programa, programaEsp);

    //Obtener actividades
    $.ajax({
     url: _prefix_url+"obtenActividades",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboActividades = "<option value='0'>Seleccione la actividad</option>";
        $.each(response, function(index, value) {
          var cadena = value['numactividad'] + " - " + value['descactividad'];
          var reprogramacion = value['reprogramacion'];
          if(reprogramacion == 0)
            comboActividades += "<option value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";
          else
          {
            if (reprogramacion == 1)
              comboActividades += "<option class='actcambio' value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";          
            else
            {
              if (reprogramacion == 2)
                comboActividades += "<option class='actnueva' value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";          
              else
              {
                if ((reprogramacion == 3) || (reprogramacion == 4))
                  comboActividades += "<option class='actborrada' value='"+value['autoactividades']+','+value['numactividad']+"'>"+ cadena +"</option>";                
              }
            }
          }
        }); //Each
        $('#actividades').html(comboActividades);
       
        
      }); //Done
       document.getElementById('actividades').setAttribute('data-error', '1');
      disabledBTN();
  });

  //Generación de tabla y textareas de actividad, soporte, observaciones
  $("#actividadesOP").change(function()
  {
    $('#btnGuardarInfo').hide();
    //$('#btnConcentradoPoa').hide();
    $('#unidadmedida').html('');
    $('#cantidadanual').html('');   
    limpiaTablaAnalisis();
    $('#realizadomes').val(0);
    $('#descactividad').html('');
    $('#soporte').html('');
    $('#observaciones').html('');

    var idActividad = $('#actividadesOP').find(':selected').val();
    var programa = $('#programaOP').find(':selected').val();
    var programaEsp = $('#programaEspOP').find(':selected').val();
    var idMes = $('#programaOP').data('idmes');

    obtenObjetivos(programa, programaEsp);
    //Obtener porcentajes programado
    $.ajax({
     url: _prefix_url+"obtenPorcProgramado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#enep').html(response[0]['enep']);
        $('#febp').html(response[0]['febp']);
        $('#marp').html(response[0]['marp']);
        $('#abrp').html(response[0]['abrp']);
        $('#mayp').html(response[0]['mayp']);
        $('#junp').html(response[0]['junp']);
        $('#julp').html(response[0]['julp']);
        $('#agop').html(response[0]['agop']);
        $('#sepp').html(response[0]['sepp']);
        $('#octp').html(response[0]['octp']);
        $('#novp').html(response[0]['novp']);
        $('#dicp').html(response[0]['dicp']);
        $('#inicio').html(response[0]['inicio']);
        $('#termino').html(response[0]['termino']);

        $('#unidadmedida').html(response[0]['unidadmedida']);
        $('#cantidadanual').html(response[0]['cantidadanual']);
      });

      //Obtener porcentaje realizado
    $.ajax({
     url: _prefix_url+"obtenPorcRealizado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#ener').html(response[0]['ener']);
        $('#febr').html(response[0]['febr']);
        $('#marr').html(response[0]['marr']);
        $('#abrr').html(response[0]['abrr']);
        $('#mayr').html(response[0]['mayr']);
        $('#junr').html(response[0]['junr']);
        $('#julr').html(response[0]['julr']);
        $('#agor').html(response[0]['agor']);
        $('#sepr').html(response[0]['sepr']);
        $('#octr').html(response[0]['octr']);
        $('#novr').html(response[0]['novr']);
        $('#dicr').html(response[0]['dicr']);

        var realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];
        //console.log(realizado[idMes]);
        var pos = realizado[idMes];

        $('#realizadomes').val(response[0][pos]);
      });


    //Obtener textareas de actividad, soporte, observaciones
    $.ajax({
     url: _prefix_url+"obtenDetallesActi",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad, idMes: idMes},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {

        //console.log(response);
        $('#descactividad').html(response[0]['descripcion']);
        $('#soporte').html(response[0]['soporte']);
        $('#observaciones').html(response[0]['observaciones']);

        $('#btnGuardarInfo').show();
        //$('#btnConcentradoPoa').show();
      });

    
  }); //Fin de codigo actividades
  /////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////

  //Generación de tabla y textareas de actividad, soporte, observaciones
  $("#actividades").change(function()
  {
    $('#btnGuardarInfo').hide();
    //$('#btnConcentradoPoa').hide();
    $('#unidadmedida').html('');
    $('#cantidadanual').html('');   
    limpiaTablaAnalisis();
    $('#realizadomes').val(0);
    $('#descactividad').html('');
    $('#soporte').html('');
    $('#observaciones').html('');

    var idActividad = $('#actividades').find(':selected').val();
    var programa = $('#programa').find(':selected').val();
    var programaEsp = $('#programaEsp').find(':selected').val();
    var idMes = $('#programa').data('idmes');

    obtenObjetivos(programa, programaEsp);
    //Obtener porcentajes programado
    $.ajax({
     url: _prefix_url+"obtenPorcProgramado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#enep').html(response[0]['enep']);
        $('#febp').html(response[0]['febp']);
        $('#marp').html(response[0]['marp']);
        $('#abrp').html(response[0]['abrp']);
        $('#mayp').html(response[0]['mayp']);
        $('#junp').html(response[0]['junp']);
        $('#julp').html(response[0]['julp']);
        $('#agop').html(response[0]['agop']);
        $('#sepp').html(response[0]['sepp']);
        $('#octp').html(response[0]['octp']);
        $('#novp').html(response[0]['novp']);
        $('#dicp').html(response[0]['dicp']);
        $('#inicio').html(response[0]['inicio']);
        $('#termino').html(response[0]['termino']);

        $('#unidadmedida').html(response[0]['unidadmedida']);
        $('#cantidadanual').html(response[0]['cantidadanual']);
      });

      //Obtener porcentaje realizado
    $.ajax({
     url: _prefix_url+"obtenPorcRealizado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#ener').html(response[0]['ener']);
        $('#febr').html(response[0]['febr']);
        $('#marr').html(response[0]['marr']);
        $('#abrr').html(response[0]['abrr']);
        $('#mayr').html(response[0]['mayr']);
        $('#junr').html(response[0]['junr']);
        $('#julr').html(response[0]['julr']);
        $('#agor').html(response[0]['agor']);
        $('#sepr').html(response[0]['sepr']);
        $('#octr').html(response[0]['octr']);
        $('#novr').html(response[0]['novr']);
        $('#dicr').html(response[0]['dicr']);

        var realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];
        //console.log(realizado[idMes]);
        var pos = realizado[idMes];

        $('#realizadomes').val(response[0][pos]);
      });


    //Obtener textareas de actividad, soporte, observaciones
    $.ajax({
     url: _prefix_url+"obtenDetallesActi",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad, idMes: idMes},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {

        //console.log(response);
        $('#descactividad').html(response[0]['descripcion']);
        $('#soporte').html(response[0]['soporte']);
        $('#observaciones').html(response[0]['observaciones']);

        $('#btnGuardarInfo').show();
        //$('#btnConcentradoPoa').show();
      });

    
  }); //Fin de codigo actividades



});



var token = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        

        document.getElementById("repEmail").addEventListener("click", sendMail);
        function sendMail () {
            document.getElementById("loader").classList.remove('hidden');
            var mes = this.getAttribute('data-mes');
            var clave = document.getElementById("clave").value;
            if(clave !== null && clave !== '') {

                document.getElementById("errorEmail").classList.add('hidden');
                $.ajax({
                     type:'POST',
                     url:"mail/send",
                     data:{mes:mes,clave:clave,"_token": token},
                     success:function(data){ 
                        location.reload();
                    }
                });

            } else {

            document.getElementById("errorEmail").classList.remove('hidden');
            document.getElementById("loader").classList.add('hidden');
            document.getElementById("errorEmail").innerHTML = 'Inserte su clave!';

            }
        }