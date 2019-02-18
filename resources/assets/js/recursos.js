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

});

