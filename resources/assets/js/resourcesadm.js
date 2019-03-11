$(function() {


  $('#btnGuardarInfo_admin').hide();

  var _prefix_url =  $('meta[name="app-prefix"]').attr('content'); //Se genera un prefijo con el nombre de la carpeta en donde este almacenada la aplicación
    if(_prefix_url != ""){
      _prefix_url = "/"+_prefix_url;
    }


  $("input#realizadomes_admin").keydown(function (e)
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

  function limpiaTablaAnalisis_admin()
  {
    $('#enep_admin').html('');
    $('#febp_admin').html('');
    $('#marp_admin').html('');
    $('#abrp_admin').html('');
    $('#mayp_admin').html('');
    $('#junp_admin').html('');
    $('#julp_admin').html('');
    $('#agop_admin').html('');
    $('#sepp_admin').html('');
    $('#octp_admin').html('');
    $('#novp_admin').html('');
    $('#dicp_admin').html('');
    $('#inicio_admin').html('');
    $('#termino_admin').html('');

    $('#ener_admin').html('');
    $('#febr_admin').html('');
    $('#marr_admin').html('');
    $('#abrr_admin').html('');
    $('#mayr_admin').html('');
    $('#junr_admin').html('');
    $('#julr_admin').html('');
    $('#agor_admin').html('');
    $('#sepr_admin').html('');
    $('#octr_admin').html('');
    $('#novr_admin').html('');
    $('#dicr_admin').html('');
  }


  $("#programa_admin").change(function()
  {    
    $('#programaEsp_admin').html('');    
    $('#objetivo_admin').html('');
    $('#actividades_admin').html('');     
    $('#unidadmedida_admin').html('');
    $('#cantidadanual_admin').html('');
    limpiaTablaAnalisis_admin();
    $('#realizadomes_admin').val(0);
    $('#descactividad_admin').html('');
    $('#soporte_admin').html('');
    $('#observaciones_admin').html('');
    $('#btnGuardarInfo_admin').hide();
    
    var area = $('#area_admin').find(':selected').val();
    var programa = $('#programa_admin').find(':selected').val();
    var comboProgramaEsp = '';


    $.ajax({
      url: _prefix_url+"/admin/obtenProgramaEsp",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {area: area, programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboProgramaEsp = "<option value='0'>Programa Específico...</option>";
        $.each(response, function(index, value){
          var cadena = value['claveprogramaesp'] + " - " + value['descprogramaesp'];
          comboProgramaEsp += "<option value='"+value['idprogramaesp']+"'>"+ cadena +"</option>";
        });
        $('#programaEsp_admin').html(comboProgramaEsp);        
      });

  });

  function obtenObjetivos(area, programa, programaEsp) {
    //Obtener objetivo de la actividad
    $.ajax({
     url: _prefix_url+"/admin/obtenObjetivoAct",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {area: area, programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#objetivo_admin').html(response[0]['objprogramaesp']);
    });
  }

  $("#programaEsp_admin").change(function() 
  {
    $('#objetivo_admin').html('');
    $('#actividades_admin').html('');     
    $('#unidadmedida_admin').html('');
    $('#cantidadanual_admin').html('');   
    limpiaTablaAnalisis_admin();
    $('#realizadomes_admin').val(0);
    $('#descactividad_admin').html('');
    $('#soporte_admin').html('');
    $('#observaciones_admin').html('');
    $('#btnGuardarInfo_admin').hide();
    var area = $('#area_admin').find(':selected').val();
    var programa = $('#programa_admin').find(':selected').val();
    var programaEsp = $('#programaEsp_admin').find(':selected').val();
    var comboActividades = '';
    obtenObjetivos(area, programa, programaEsp);

    //Obtener actividades
    $.ajax({
     url: _prefix_url+"/admin/obtenActividades",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {area: area, programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboActividades = "<option value='0'>Seleccione la actividad</option>";

        $.each(response, function(index, value) {
          var cadena = value['numactividad'] + " - " + value['descactividad'];
          comboActividades += "<option value='"+value['autoactividades']+"'>"+ cadena +"</option>";
        }); //Each

        $('#actividades_admin').html(comboActividades);
      }); //Done
  });


  //Generación de tabla y textareas de actividad, soporte, observaciones
  $("#actividades_admin").change(function()
  {
    $('#btnGuardarInfo_admin').hide();
    $('#unidadmedida_admin').html('');
    $('#cantidadanual_admin').html('');   
    limpiaTablaAnalisis_admin();
    $('#realizadomes_admin').val(0);
    $('#descactividad_admin').html('');
    $('#soporte_admin').html('');
    $('#observaciones_admin').html('');

    var area = $('#area_admin').find(':selected').val();
    var mes = $('#mes_admin').find(':selected').val();    
    var idActividad = $('#actividades_admin').find(':selected').val();
    var programa = $('#programa_admin').find(':selected').val();
    var programaEsp = $('#programaEsp_admin').find(':selected').val();


    obtenObjetivos(area, programa, programaEsp);
    //Obtener porcentajes programado
    $.ajax({
     url: _prefix_url+"/admin/obtenPorcProgramado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#enep_admin').html(response[0]['enep']);
        $('#febp_admin').html(response[0]['febp']);
        $('#marp_admin').html(response[0]['marp']);
        $('#abrp_admin').html(response[0]['abrp']);
        $('#mayp_admin').html(response[0]['mayp']);
        $('#junp_admin').html(response[0]['junp']);
        $('#julp_admin').html(response[0]['julp']);
        $('#agop_admin').html(response[0]['agop']);
        $('#sepp_admin').html(response[0]['sepp']);
        $('#octp_admin').html(response[0]['octp']);
        $('#novp_admin').html(response[0]['novp']);
        $('#dicp_admin').html(response[0]['dicp']);
        $('#inicio_admin').html(response[0]['inicio']);
        $('#termino_admin').html(response[0]['termino']);

        $('#unidadmedida_admin').html(response[0]['unidadmedida']);
        $('#cantidadanual_admin').html(response[0]['cantidadanual']);
      });

      //Obtener porcentaje realizado
    $.ajax({
     url: _prefix_url+"/admin/obtenPorcRealizado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#ener_admin').html(response[0]['ener']);
        $('#febr_admin').html(response[0]['febr']);
        $('#marr_admin').html(response[0]['marr']);
        $('#abrr_admin').html(response[0]['abrr']);
        $('#mayr_admin').html(response[0]['mayr']);
        $('#junr_admin').html(response[0]['junr']);
        $('#julr_admin').html(response[0]['julr']);
        $('#agor_admin').html(response[0]['agor']);
        $('#sepr_admin').html(response[0]['sepr']);
        $('#octr_admin').html(response[0]['octr']);
        $('#novr_admin').html(response[0]['novr']);
        $('#dicr_admin').html(response[0]['dicr']);

        var realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];
        console.log(realizado[mes]);
        var pos = realizado[mes];

        $('#realizadomes_admin').val(response[0][pos]);
      });

    //Obtener textareas de actividad, soporte, observaciones
    $.ajax({
     url: _prefix_url+"/admin/obtenDetallesActi",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad, mes: mes},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {

        //console.log(response);
        $('#descactividad_admin').html(response[0]['descripcion']);
        $('#soporte_admin').html(response[0]['soporte']);
        $('#observaciones_admin').html(response[0]['observaciones']);
        $('#btnGuardarInfo_admin').show();
      });

    
  }); //Fin de codigo actividades



});

