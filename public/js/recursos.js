$(function() {

  //var _prefix_url =  $('meta[name="app-prefix"]').attr('content'); //Se genera un prefijo con el nombre de la carpeta en donde este almacenada la aplicación
  //  if(_prefix_url != ""){
  //    _prefix_url = "/"+_prefix_url;
  //  }
  var _prefix_url;
  $('meta[name="app-prefix"]').attr('content') == 'http://sipseiv2.test' ? _prefix_url='/' : _prefix_url='';
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
    $('#programaEspOP').html('');    
    $('#objetivo').html('');
    $('#actividadesOP').html('');     
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

    //console.log(_prefix_url,'1');

    $.ajax({
      url: "../obtenProgramaEspPoa",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        //console.log(response);
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
    $('#programaEsp').html('<option value="0">Programa Específico...</option>');    
    $('#objetivo').html('');
    $('#actividades').html('<option value="0">Seleccione la actividad</option>');     
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

    //console.log(_prefix_url,'2');

    $.ajax({
      url: _prefix_url+"obtenProgramaEspPoa",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        //console.log(response);
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
     url: "../obtenObjetivoAct",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        if (response.length > 0) {
        $('#objetivo').html(response[0]['objprogramaesp']);
        }
    });
  }

  $("#programaEspOP").change(function() 
  {
    $('#objetivo').html('');
    $('#actividadesOP').html('');     
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
    //console.log('holas')

    //Obtener actividades
    $.ajax({
     url: "../obtenActividades",
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
            comboActividades += "<option value='"+value['autoactividades']+'&&&'+value['numactividad']+'&&&'+value['descactividad']+"'>"+ cadena +"</option>";
          else
          {
            if (reprogramacion == 1)
              comboActividades += "<option class='actcambio' value='"+value['autoactividades']+'&&&'+value['numactividad']+'&&&'+value['descactividad']+"'>"+ cadena +"</option>";          
            else
            {
              if (reprogramacion == 2)
                comboActividades += "<option class='actnueva' value='"+value['autoactividades']+'&&&'+value['numactividad']+'&&&'+value['descactividad']+"'>"+ cadena +"</option>";          
              else
              {
                if ((reprogramacion == 3) || (reprogramacion == 4))
                  comboActividades += "<option class='actborrada' value='"+value['autoactividades']+'&&&'+value['numactividad']+'&&&'+value['descactividad']+"'>"+ cadena +"</option>";                
              }
            }
          }
        }); //Each
        //console.log('holas',comboActividades)
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
       //document.getElementById('actividades').setAttribute('data-error', '1');
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
     url: "../obtenPorcProgramado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        //console.log(response)
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
     url: "../obtenPorcRealizado",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        //console.log(response)
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
     url: "../obtenDetallesActi",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {idActividad: idActividad, idMes: idMes},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        //console.log(response)

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
        //$('#descactividad').html(response[0]['descripcion']);
        //$('#soporte').html(response[0]['soporte']);
        //$('#observaciones').html(response[0]['observaciones']);

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
        

        //document.getElementById("repEmail").addEventListener("click", sendMail);
        //function sendMail () {
        $("#repEmail").click(function(){
        
            document.getElementById("loader").classList.remove('hidden');
            var mes = this.getAttribute('data-mes');
            var mesc = $('.mesesOn').attr('data-mesc');
            console.log(mesc);
            var clave = document.getElementById("clave").value;
            if(clave !== null && clave !== '') {

                document.getElementById("errorEmail").classList.add('hidden');
                $.ajax({
                     type:'POST',
                     url:"mailsend",
                     data:{mes:mes,mesc:mesc,clave:clave,"_token": token},
                     success:function(data){ 
                        location.reload();
                    }
                });

            } else {

            document.getElementById("errorEmail").classList.remove('hidden');
            document.getElementById("loader").classList.add('hidden');
            document.getElementById("errorEmail").innerHTML = 'Ingrese su clave!';

            }
        });



        document.getElementById("addAct").addEventListener("click", checkActStatus);
        var act = document.getElementById("contActividades");

        function checkActStatus(){
          var na = document.getElementsByClassName('newAct')
          na.length == 0 ? agregaActividad() : alert('Tiene una actividad sin Finalizar');
        }


        function agregaActividad() {

          var rowAct = document.createElement("DIV");
          rowAct.className = "row rowAct newAct"; 

          var item1 = document.createElement("DIV");   // Create a <button> element
          item1.innerHTML = '';
          item1.className = "item1";                 // Insert text
          rowAct.appendChild(item1);  

          var item2 = document.createElement("DIV");
          item2.innerHTML = "";
          item2.className = "item2";                 // Insert text
          rowAct.appendChild(item2);

          var item3 = document.createElement("DIV");
          item3.innerHTML = "";
          item3.className = "item3";                 // Insert text
          rowAct.appendChild(item3);

          var item4 = document.createElement("DIV");
          item4.innerHTML = "0";
          item4.className = "item4";                 // Insert text
          rowAct.appendChild(item4);

          var allItemMes = document.createElement("DIV");
          allItemMes.className = "allItemMes"; 
          
          var itemMes1 = document.createElement("DIV");
          itemMes1.innerHTML = "0";
          itemMes1.className = "col-md-1 itemMes";
          itemMes1.setAttribute('data-mes', 'ene');
          itemMes1.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes1)

          var itemMes2 = document.createElement("DIV");
          itemMes2.innerHTML = "0";
          itemMes2.className = "col-md-1 itemMes";
          itemMes2.setAttribute('data-mes', 'feb');
          itemMes2.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes2)

          var itemMes3 = document.createElement("DIV");
          itemMes3.innerHTML = "0";
          itemMes3.className = "col-md-1 itemMes";
          itemMes3.setAttribute('data-mes', 'mar');
          itemMes3.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes3)

          var itemMes4 = document.createElement("DIV");
          itemMes4.innerHTML = "0";
          itemMes4.className = "col-md-1 itemMes";
          itemMes4.setAttribute('data-mes', 'abr');
          itemMes4.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes4)

          var itemMes5 = document.createElement("DIV");
          itemMes5.innerHTML = "0";
          itemMes5.className = "col-md-1 itemMes";
          itemMes5.setAttribute('data-mes', 'may');
          itemMes5.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes5)

          var itemMes6 = document.createElement("DIV");
          itemMes6.innerHTML = "0";
          itemMes6.className = "col-md-1 itemMes";
          itemMes6.setAttribute('data-mes', 'jun');
          itemMes6.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes6)

          var itemMes7 = document.createElement("DIV");
          itemMes7.innerHTML = "0";
          itemMes7.className = "col-md-1 itemMes";
          itemMes7.setAttribute('data-mes', 'jul');
          itemMes7.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes7)

          var itemMes8 = document.createElement("DIV");
          itemMes8.innerHTML = "0";
          itemMes8.className = "col-md-1 itemMes";
          itemMes8.setAttribute('data-mes', 'ago');
          itemMes8.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes8)

          var itemMes9 = document.createElement("DIV");
          itemMes9.innerHTML = "0";
          itemMes9.className = "col-md-1 itemMes";
          itemMes9.setAttribute('data-mes', 'sep');
          itemMes9.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes9)

          var itemMes10 = document.createElement("DIV");
          itemMes10.innerHTML = "0";
          itemMes10.className = "col-md-1 itemMes";
          itemMes10.setAttribute('data-mes', 'oct');
          itemMes10.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes10)

          var itemMes11 = document.createElement("DIV");
          itemMes11.innerHTML = "0";
          itemMes11.className = "col-md-1 itemMes";
          itemMes11.setAttribute('data-mes', 'nov');
          itemMes11.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes11)

          var itemMes12 = document.createElement("DIV");
          itemMes12.innerHTML = "0";
          itemMes12.className = "col-md-1 itemMesF";
          itemMes12.setAttribute('data-mes', 'dic');
          itemMes12.addEventListener("keyup", validaNumeros, false);

          allItemMes.appendChild(itemMes12)

          rowAct.appendChild(allItemMes); 



          var item5 = document.createElement("DIV");
          item5.innerHTML = "MES";
          item5.className = "item5";                 // Insert text
          rowAct.appendChild(item5);

          var item6 = document.createElement("DIV");
          item6.innerHTML = "MES";
          item6.className = "item6";                 // Insert text
          rowAct.appendChild(item6);

          var editar = document.createElement("I");
          editar.className = "iconBH fa fa-pencil-square-o btnOff";   
          editar.setAttribute('aria-hidden', 'true');
          editar.setAttribute('data-toggle', 'tooltip');
          editar.setAttribute('data-placement', 'right');
          editar.setAttribute('title', 'Editar');
          editar.setAttribute('data-edit', '0');
          editar.addEventListener("click", editAct, false);

          rowAct.appendChild(editar);

          //var end = document.createElement("I");
          //end.className = "iconBH fa fa-check-square-o";   
          //end.setAttribute('aria-hidden', 'true');
          //end.setAttribute('data-toggle', 'tooltip');
          //end.setAttribute('data-placement', 'right');
          //end.setAttribute('title', 'Finalizar');

          //rowAct.appendChild(end);

          var up = document.createElement("I");
          up.className = "iconBH fa fa-arrow-circle-up up btnOff";   
          up.setAttribute('aria-hidden', 'true');
          up.setAttribute('data-toggle', 'tooltip');
          up.setAttribute('data-placement', 'right');
          up.setAttribute('title', 'Subir');
          up.addEventListener("click", moveUp);

          rowAct.appendChild(up);

          var down = document.createElement("I");
          down.className = "iconBH fa fa-arrow-circle-down down btnOff";   
          down.setAttribute('aria-hidden', 'true');
          down.setAttribute('data-toggle', 'tooltip');
          down.setAttribute('data-placement', 'right');
          down.setAttribute('title', 'Bajar');
          down.addEventListener("click", moveDown);

          rowAct.appendChild(down);

          var del = document.createElement("I");
          del.className = "iconBH fa fa-times delAct btnOff";   
          del.setAttribute('aria-hidden', 'true');
          del.setAttribute('data-toggle', 'tooltip');
          del.setAttribute('data-placement', 'right');
          del.setAttribute('title', 'Eliminar');
          del.addEventListener("click", removeAct);

          rowAct.appendChild(del);



          act.appendChild(rowAct);  
          reCountAct();
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });

        }
        //////////////////////////////////////////////////////////////////////
        var upAct = document.getElementsByClassName('up');
        var dowAct = document.getElementsByClassName('down');

        for (var i = 0; i < upAct.length; i++) {
            upAct[i].addEventListener("click", moveUp, false);
        }

        for (var i = 0; i < dowAct.length; i++) {
            dowAct[i].addEventListener("click", moveDown, false);
        }

        function moveUp(e) {
          if(e.target.parentNode.previousElementSibling)
            e.target.parentNode.parentNode.insertBefore(e.target.parentNode, e.target.parentNode.previousElementSibling);
          reCountAct();
        }
        function moveDown(e) {
          if(e.target.parentNode.nextElementSibling)
            e.target.parentNode.parentNode.insertBefore(e.target.parentNode.nextElementSibling, e.target.parentNode);
          reCountAct();
        }

        //////////////////////////////////////////////////////////////////////
        var delActDoc = document.getElementsByClassName('delAct');

        for (var i = 0; i < delActDoc.length; i++) {
            delActDoc[i].addEventListener("click", removeAct, false);
        }

        function removeAct() {
          this.parentNode.remove();
          reCountAct();
          sumTPM();
        }
        //////////////////////////////////////////////////////////////////////
        function reCountAct() {
          var numAct = document.getElementsByClassName('rowAct');
          for (var i = 0; i < numAct.length; i++) {
            numAct[i].querySelector('.item1').innerHTML = i+1;
          }
        }
        /////////////////////////////////////////////////////////////////////
        var btnEdit = document.getElementsByClassName('btnEdit');
        for (var i = 0; i < btnEdit.length; i++) {
            btnEdit[i].addEventListener("click", editAct, false);
        }

        function editAct(){
          var dataEdit = this.getAttribute('data-edit');
          dataEdit === '0' ?  (
            this.setAttribute("data-edit", '1'),
            this.parentNode.style.borderBottom = "#EA0D94 solid 1px",
            this.classList.add('fa-check'),
            this.classList.remove('fa-pencil-square-o'),
            this.classList.remove('btnOff'),
            this.style.color = "#fff",
            this.style.backgroundColor = "#EA0D94",
            this.setAttribute('data-original-title', 'Terminar la edición'),
            offBtn(this)
            ) : (
            this.setAttribute("data-edit", '0'),
            this.parentNode.style.borderBottom = "#fff solid 1px",
            this.classList.remove('fa-check'),
            this.classList.add('fa-pencil-square-o'),
            this.classList.add('btnOff'),
            this.style.color = "",
            this.style.backgroundColor = "",
            this.setAttribute('data-original-title', 'Editar'),
            onBtn(this)
            );

        }

  function onBtn(t){
          
      var nu = [];
      var me = [];
      for (var i = 0; i < t.parentNode.children[4].children.length; i++) {
        nu.push(Number(t.parentNode.children[4].children[i].textContent));
        isNaN(t.parentNode.children[4].children[i].textContent) || t.parentNode.children[4].children[i].textContent === '0' || t.parentNode.children[4].children[i].textContent === '' ? t.parentNode.children[4].children[i].textContent = "0" : me.push(t.parentNode.children[4].children[i].getAttribute('data-mes'));
      } 
      var programado = nu.reduce(sumArray);
      isNaN(programado) ? (t.parentNode.querySelector('.item4').innerHTML='Ingrese solo numeros para la programación mensual',t.parentNode.querySelector('.item4').style.color="red") : (t.parentNode.querySelector('.item4').innerHTML=programado,t.parentNode.querySelector('.item4').style.color="");
      
      ////////////////////////////////////////////////////////////////////////
      switch (me.length) {
        case 0:
          t.parentNode.querySelector('.item5').innerHTML='MES';
          t.parentNode.querySelector('.item6').innerHTML='MES';
          break;
        case 1:
          t.parentNode.querySelector('.item5').innerHTML=me[0];
          t.parentNode.querySelector('.item6').innerHTML=me[0];
          break;
        default:
          var totalMes = me.length-1;
          t.parentNode.querySelector('.item5').innerHTML=me[0];
          t.parentNode.querySelector('.item6').innerHTML=me[me.length-1]
      }

      ///////////////////////////////////////////CHECAR PROMESAS Y ADAPTAR
      var actPromesa = new Promise( (resolve, reject) => {
          programado > 0 ? resolve('A') :reject(new Error('La Programación Mensual deve tener almenos un mes con un numero distinto a 0.'));
      })

      actPromesa
          .then( () => {
               return new Promise((resolve, reject) => {
                 t.parentNode.querySelector('.item3').textContent ? resolve() : reject(new Error('Ingrese una Unidad de Medida.'));
              });
          })
          .then( () => {
              return new Promise((resolve, reject) => {
                t.parentNode.querySelector('.item2').textContent ? resolve() : reject(new Error('Ingrese una Descripción de la actividad.'));
              });
          })
          .then( () => {
              return new Promise((resolve, reject) => {
                var btnOff = document.getElementsByClassName('btnOff');
                for (var i = 0; i < btnOff.length; i++) {
                    btnOff[i].style.pointerEvents = '';
                }

                t.parentNode.querySelector('.item2').contentEditable = "false";
                t.parentNode.querySelector('.item2').style.backgroundColor = "";
                t.parentNode.querySelector('.item3').contentEditable = "false";
                t.parentNode.querySelector('.item3').style.backgroundColor = "";
                for (var i = 0; i < t.parentNode.children[4].children.length; i++) {
                  t.parentNode.children[4].children[i].contentEditable = "false";
                  t.parentNode.children[4].children[i].textContent != 0 ? t.parentNode.children[4].children[i].style.backgroundColor = "#cfd8dc" : t.parentNode.children[4].children[i].style.backgroundColor = "";
                } 
      
                ///////////////////////////////////////////////////////////////////////
                t.parentNode.classList.remove('newAct');
                sumTPM();
              });
          })
          .catch( (err) => {
              alert(err);
              t.setAttribute("data-edit", '1');
              t.classList.add('fa-check');
              t.classList.remove('fa-pencil-square-o');
              t.classList.remove('btnOff');
              t.style.color = "#fff";
              t.style.backgroundColor = "#EA0D94";
              t.setAttribute('data-original-title', 'Terminar la edición');
          });


    }

        function sumArray(total, num) {
          return total + num;
        }

        function offBtn(t){
          var btnOff = document.getElementsByClassName('btnOff');
          for (var i = 0; i < btnOff.length; i++) {
              btnOff[i].style.pointerEvents = 'none';
          }

          t.parentNode.querySelector('.item2').contentEditable = "true";
          t.parentNode.querySelector('.item2').style.backgroundColor = "#ffebee";
          t.parentNode.querySelector('.item3').contentEditable = "true";
          t.parentNode.querySelector('.item3').style.backgroundColor = "#ffebee";

          for (var i = 0; i < t.parentNode.children[4].children.length; i++) {
            t.parentNode.children[4].children[i].contentEditable = "true";
            t.parentNode.children[4].children[i].style.backgroundColor = "#ffebee";
          }

        }



var numericos = document.getElementsByClassName("numerico");


for (var i = 0; i < numericos.length; i++) {
  numericos[i].addEventListener("keyup", validaNumeros, false);
}

function validaNumeros() {
  //console.log(this.textContent);
  /^\d*$/.test(this.textContent) ? '' : this.textContent="0";
  //this.textContent ? '' : this.textContent="0";
}

function sumTPM(){
  var tpm = document.getElementsByClassName("item4");
  var tpmArr = [];
  for (var i = 0; i < tpm.length; i++) {
    tpmArr.push(Number(tpm[i].textContent));
  } 
  var tpmResult;
  tpm.length == 0 ? tpmResult=tpm.length : tpmResult = tpmArr.reduce(sumArray);
  document.getElementById('resultTPM').textContent=tpmResult;


  ///////////////////////////////////////////////////////////////////////////CHECAR VARIABLES DINAMICAS
  var allMES = document.getElementsByClassName("rowAct");
  var m0 = [], m1 = [], m2 = [], m3 = [], m4 = [], m5 = [], m6 = [], m7 = [], m8 = [], m9 = [], m10 = [], m11 = [];
  var am0, am1, am2, am3, am4, am5, am6, am7, am8, am9, am10, am11;

  for (var i = 0; i < allMES.length; i++) {
    m0.push(Number(allMES[i].children[4].children[0].textContent));
    m1.push(Number(allMES[i].children[4].children[1].textContent));
    m2.push(Number(allMES[i].children[4].children[2].textContent));
    m3.push(Number(allMES[i].children[4].children[3].textContent));
    m4.push(Number(allMES[i].children[4].children[4].textContent));
    m5.push(Number(allMES[i].children[4].children[5].textContent));
    m6.push(Number(allMES[i].children[4].children[6].textContent));
    m7.push(Number(allMES[i].children[4].children[7].textContent));
    m8.push(Number(allMES[i].children[4].children[8].textContent));
    m9.push(Number(allMES[i].children[4].children[9].textContent));
    m10.push(Number(allMES[i].children[4].children[10].textContent));
    m11.push(Number(allMES[i].children[4].children[11].textContent));
  }

  allMES.length == 0 ? am0 = allMES.length : am0 = m0.reduce(sumArray);
  document.getElementById('r1M0').textContent=am0;

  allMES.length == 0 ? am1 = allMES.length : am1 = m1.reduce(sumArray);
  document.getElementById('r1M1').textContent=am1;

  allMES.length == 0 ? am2 = allMES.length : am2 = m2.reduce(sumArray);
  document.getElementById('r1M2').textContent=am2;

  allMES.length == 0 ? am3 = allMES.length : am3 = m3.reduce(sumArray);
  document.getElementById('r1M3').textContent=am3;

  allMES.length == 0 ? am4 = allMES.length : am4 = m4.reduce(sumArray);
  document.getElementById('r1M4').textContent=am4;

  allMES.length == 0 ? am5 = allMES.length : am5 = m5.reduce(sumArray);
  document.getElementById('r1M5').textContent=am5;

  allMES.length == 0 ? am6 = allMES.length : am6 = m6.reduce(sumArray);
  document.getElementById('r1M6').textContent=am6;

  allMES.length == 0 ? am7 = allMES.length : am7 = m7.reduce(sumArray);
  document.getElementById('r1M7').textContent=am7;

  allMES.length == 0 ? am8 = allMES.length : am8 = m8.reduce(sumArray);
  document.getElementById('r1M8').textContent=am8;

  allMES.length == 0 ? am9 = allMES.length : am9 = m9.reduce(sumArray);
  document.getElementById('r1M9').textContent=am9;

  allMES.length == 0 ? am10 = allMES.length : am10 = m10.reduce(sumArray);
  document.getElementById('r1M10').textContent=am10;

  allMES.length == 0 ? am11 = allMES.length : am11 = m11.reduce(sumArray);
  document.getElementById('r1M11').textContent=am11;


  //////////////////////////////////////////////////////////////////////
  
  var m20 = Number(document.getElementById('r1M0').textContent);
  var m21 = Number(document.getElementById('r1M1').textContent);
  var m22 = Number(document.getElementById('r1M2').textContent);
  var m23 = Number(document.getElementById('r1M3').textContent);
  var m24 = Number(document.getElementById('r1M4').textContent);
  var m25 = Number(document.getElementById('r1M5').textContent);
  var m26 = Number(document.getElementById('r1M6').textContent);
  var m27 = Number(document.getElementById('r1M7').textContent);
  var m28 = Number(document.getElementById('r1M8').textContent);
  var m29 = Number(document.getElementById('r1M9').textContent);
  var m210 = Number(document.getElementById('r1M10').textContent);
  var m211 = Number(document.getElementById('r1M11').textContent);

  document.getElementById('r2M0').textContent=am0;
  document.getElementById('r2M1').textContent=m20+m21;
  document.getElementById('r2M2').textContent=m20+m21+m22;
  document.getElementById('r2M3').textContent=m20+m21+m22+m23;
  document.getElementById('r2M4').textContent=m20+m21+m22+m23+m24;
  document.getElementById('r2M5').textContent=m20+m21+m22+m23+m24+m25;
  document.getElementById('r2M6').textContent=m20+m21+m22+m23+m24+m25+m26;
  document.getElementById('r2M7').textContent=m20+m21+m22+m23+m24+m25+m26+m27;
  document.getElementById('r2M8').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28;
  document.getElementById('r2M9').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28+m29;
  document.getElementById('r2M10').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210;
  document.getElementById('r2M11').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210+m211;

  /////////////////////////////////////////////////////////////////////////
  document.getElementById('r3M0').textContent=((am0/tpmResult)*100).toFixed(2);
  document.getElementById('r3M1').textContent=((am1/tpmResult)*100).toFixed(2);
  document.getElementById('r3M2').textContent=((am2/tpmResult)*100).toFixed(2);
  document.getElementById('r3M3').textContent=((am3/tpmResult)*100).toFixed(2);
  document.getElementById('r3M4').textContent=((am4/tpmResult)*100).toFixed(2);
  document.getElementById('r3M5').textContent=((am5/tpmResult)*100).toFixed(2);
  document.getElementById('r3M6').textContent=((am6/tpmResult)*100).toFixed(2);
  document.getElementById('r3M7').textContent=((am7/tpmResult)*100).toFixed(2);
  document.getElementById('r3M8').textContent=((am8/tpmResult)*100).toFixed(2);
  document.getElementById('r3M9').textContent=((am9/tpmResult)*100).toFixed(2);
  document.getElementById('r3M10').textContent=((am10/tpmResult)*100).toFixed(2);
  document.getElementById('r3M11').textContent=((am11/tpmResult)*100).toFixed(2);

  /////////////////////////////////////////////////////////////////////////
  document.getElementById('r4M0').textContent=((am0/tpmResult)*100).toFixed(2);
  document.getElementById('r4M1').textContent=(((m20+m21)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M2').textContent=(((m20+m21+m22)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M3').textContent=(((m20+m21+m22+m23)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M4').textContent=(((m20+m21+m22+m23+m24)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M5').textContent=(((m20+m21+m22+m23+m24+m25)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M6').textContent=(((m20+m21+m22+m23+m24+m25+m26)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M7').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M8').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M9').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28+m29)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M10').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210)/tpmResult)*100).toFixed(2);
  document.getElementById('r4M11').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210+m211)/tpmResult)*100).toFixed(2);

}

sumTPM();




