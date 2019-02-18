$(function() {

  $("#programa").change(function() {

    var programa = $('#programa').find(':selected').val();
    var comboProgramaEsp = '';
    $('#divProgramaEsp').html('');

    $.ajax({
      url: "/obtenProgramaEsp",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        comboProgramaEsp = '<select class="form-control" id="programaEsp" name="programaEsp">'+
              '<option value="0">Programa Específico...</option>';

        $.each(response, function(index, value){
          var cadena = value['claveprogramaesp'] + ' - ' + value['descprogramaesp'];
          comboProgramaEsp += '<option value="'+value['idprogramaesp']+'">'+ cadena +'</option>';
        });
        comboProgramaEsp += '</select>';
        $('#divProgramaEsp').append(comboProgramaEsp);

    });

  });

});
