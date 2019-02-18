$(function() {

  $("#programa").change(function() {

    var programa = $('#programa').find(':selected').val();
    var comboProgramaEsp = '';
    $('#programaEsp').html('');

    $.ajax({
      url: "/obtenProgramaEsp",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboProgramaEsp = "<option value='0'>Programa Específico...</option>";
        $.each(response, function(index, value){
          var cadena = value['claveprogramaesp'] + " - " + value['descprogramaesp'];
          comboProgramaEsp += "<option value='"+value['idprogramaesp']+"'>"+ cadena +"</option>";
        });
        $('#programaEsp').html(comboProgramaEsp);
      });

  });

  $("#programaEsp").change(function() {
    var programa = $('#programa').find(':selected').val();
    var programaEsp = $('#programaEsp').find(':selected').val();
    var comboActividades = '';
    $('#actividades').html('');
    $('#objprogramaesp').html('');

    obtenObjetivos(programa, programaEsp);

    //Obtener actividades
    $.ajax({
      url: "/obtenActividades",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboActividades = "<option value='0'>Seleccione la actividad</option>";

        $.each(response, function(index, value) {
          var cadena = value['numactividad'] + " - " + value['descactividad'];
          comboActividades += "<option value='"+value['autoactividades']+"'>"+ cadena +"</option>";
        }); //Each

        $('#actividades').html(comboActividades);
      }); //Done
  });

  function obtenObjetivos(programa, programaEsp) {
    //Obtener objetivo de la actividad
    $.ajax({
      url: "/obtenObjetivoAct",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#objetivo').append(response[0]['objprogramaesp']);
    });
  }

  //Generación de tabla
  $("#actividades").change(function() {
    console.log("Genera tabla");
    var idActividad = $('#actividades').find(':selected').val();

    //Obtener porcentajes programado
    $.ajax({
      url: "/obtenPorcProgramado",
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
      });
  });

});

