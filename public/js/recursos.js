$(function() {

/*************************************************************

  Funcionalidad: Se genera un prefijo con el nombre de la carpeta en donde este almacenada la aplicación
  Parametros: Contenido de elemento
  Respuesta: Define una variable

***************************************************************/

  var _prefix_url;
  $('meta[name="app-prefix"]').attr('content') == 'http://sipseiv2.test' ? _prefix_url='/' : _prefix_url='';

  $('#btnGuardarInfo').hide();

/*************************************************************

  Funcionalidad: No permite el ingreso de caracteres
  Parametros: Evento del elemento
  Respuesta: 

***************************************************************/

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

/*************************************************************

  Funcionalidad: Limpia el contenido del elemento
  Parametros: 
  Respuesta: 

***************************************************************/

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

/*************************************************************

  Funcionalidad: busca los datos relacionados al programa seleccionado
  Parametros: programa
  Respuesta: Crea el listado de los parametros encontrados

***************************************************************/


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

/*************************************************************

  Funcionalidad: Recarga los contenidos de los elemntos y obtiene los parametros requeridos
  Parametros: programa
  Respuesta: Crea el listado de los programas especificos

***************************************************************/

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

/*************************************************************

  Funcionalidad: Obtiene el objetivo del programa especifico 
  Parametros: area, programa, programaEsp
  Respuesta: Coloca en la vista el objetivo del programa especifico

***************************************************************/

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

/*************************************************************

  Funcionalidad: Obtiene el objetivo del programa especifico 
  Parametros: programa, programaEsp
  Respuesta: crea unalista con los valores obtenidos

***************************************************************/

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


/*************************************************************

  Funcionalidad: Obtiene las actividades correspondientes al programa especifico 
  Parametros: programa, programaEsp
  Respuesta: crea unalista con los valores obtenidos

***************************************************************/


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

/*************************************************************

  Funcionalidad: Generación de tabla y textareas de actividad, soporte, observaciones 
  Parametros: idActividad
  Respuesta: crea las vistas con los parametros seleccionados

***************************************************************/


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

/*************************************************************

  Funcionalidad: Generación de tabla y textareas de actividad, soporte, observaciones 
  Parametros: idActividad
  Respuesta: crea las vistas con los parametros seleccionados

***************************************************************/

  //
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
        
/*************************************************************

  Funcionalidad: Realiza un reporte mensual 
  Parametros: mes,mesc,clave,token
  Respuesta: Envia un correo con los datos seleccionados

***************************************************************/

        $("#repEmail").click(function(){
        
            document.getElementById("loader").classList.remove('hidden');
            var mes = this.getAttribute('data-mes');
            var mesc = $('.mesesOn').attr('data-mesc');
            //console.log(mesc);
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
            document.getElementById("errorEmail").innerHTML = 'Ingrese su clave';

            }
        });


/*************************************************************

  Funcionalidad: verifica si hay actividades por finalizar
  Parametros: 
  Respuesta:alerta de verificación

***************************************************************/

        document.getElementById("addAct")?document.getElementById("addAct").addEventListener("click", checkActStatus):'';
        var act = document.getElementById("contActividades");

        function checkActStatus(){
          var na = document.getElementsByClassName('newAct')
          na.length == 0 ? agregaActividad() : swal('Tiene una actividad sin Finalizar', "", "warning");
        }
/*************************************************************

  Funcionalidad: agrega una instacia de actividad
  Parametros: 
  Respuesta: crea un elemento con los parametros predefinidos

***************************************************************/

        function agregaActividad() {

          var rowAct = document.createElement("DIV");
          rowAct.className = "row rowAct newAct";
          rowAct.setAttribute('data-id', '0');

          var item1 = document.createElement("DIV");   // Create a <button> element
          item1.innerHTML = '';
          item1.className = "item1";                 // Insert text
          rowAct.appendChild(item1);  

          var item2 = document.createElement("DIV");
          item2.innerHTML = "";
          item2.className = "item2";                 // Insert text
          item2.addEventListener("keyup", backEnable, false);
          rowAct.appendChild(item2);

          var item3 = document.createElement("DIV");
          item3.innerHTML = "";
          item3.className = "item3";                 // Insert text
          item3.addEventListener("keyup", backEnable, false);
          rowAct.appendChild(item3);

          var item4 = document.createElement("DIV");
          item4.innerHTML = "0";
          item4.className = "item4";                 // Insert text
          rowAct.appendChild(item4);

          var allItemMes = document.createElement("DIV");
          allItemMes.className = "allItemMes"; 

          var meses = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic']; 

          for (var i = 0; i < meses.length; i++) {
            var itemMes1 = document.createElement("DIV");
            itemMes1.innerHTML = "0";
            itemMes1.className = "col-md-1 itemMes";
            itemMes1.setAttribute('data-mes', meses[i]);
            itemMes1.addEventListener("keyup", backEnable, false);
            itemMes1.addEventListener("keyup", validaNumeros, false);

            allItemMes.appendChild(itemMes1)
          }
          

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
          editar.className = "iconBH fa fa-pencil-square-o resetBack";   
          editar.setAttribute('aria-hidden', 'true');
          editar.setAttribute('data-toggle', 'tooltip');
          editar.setAttribute('data-placement', 'right');
          editar.setAttribute('data-insert', '0');
          editar.setAttribute('title', 'Editar');
          editar.setAttribute('data-edit', '0');
          editar.addEventListener("click", editAct, false);

          rowAct.appendChild(editar);


          var back = document.createElement("I");
          back.className = "iconBH fa fa-ban btnBack btnOn";   
          back.setAttribute('aria-hidden', 'true');
          back.setAttribute('data-toggle', 'tooltip');
          back.setAttribute('data-placement', 'right');
          back.setAttribute('title', 'Cancelar edición');
          back.setAttribute('data-ba', '');
          back.setAttribute('data-bu', '');
          back.setAttribute('data-bm', '0,0,0,0,0,0,0,0,0,0,0,0');
          back.style.color='#eceff1';
          back.style.pointerEvents='none';
          back.addEventListener("click", actBack, false);

          rowAct.appendChild(back);

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

          var indi = document.createElement("I");
          indi.className = "iconBH fa fa-info-circle btnOff";   
          indi.setAttribute('aria-hidden', 'true');
          indi.setAttribute('data-toggle', 'tooltip');
          indi.setAttribute('data-placement', 'right');
          indi.setAttribute('title', 'Indicador');
          indi.addEventListener("click", creaIndicador);

          rowAct.appendChild(indi);

          var observa = document.createElement("I");
          observa.className = "iconBH fa fa-eye btnOff";   
          observa.setAttribute('aria-hidden', 'true');
          observa.setAttribute('data-toggle', 'tooltip');
          observa.setAttribute('data-placement', 'right');
          observa.setAttribute('title', 'observaciones');
          observa.addEventListener("click", verObservaciones);

          rowAct.appendChild(observa);

          var del = document.createElement("I");
          del.className = "iconBH fa fa-trash delAct";   
          del.setAttribute('aria-hidden', 'true');
          del.setAttribute('data-toggle', 'tooltip');
          del.setAttribute('data-placement', 'right');
          del.setAttribute('title', 'Eliminar');
          del.addEventListener("click", removeActModal);

          rowAct.appendChild(del);



          act.appendChild(rowAct);
          act.style.backgroundColor='';  
          reCountAct();
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });


          var btnOff = document.getElementsByClassName('btnOff');
          for (var i = 0; i < btnOff.length; i++) {
              btnOff[i].style.pointerEvents = 'none';
              btnOff[i].style.color = '#eceff1';
          }

        }

/*************************************************************

  Funcionalidad: muestra una instancia nueva de indicador
  Parametros: token, id
  Respuesta: muestra la interfaz con los datos seleccionado

***************************************************************/

        function creaIndicador(){
          $('#modalIndicador').modal('show');
          var id = this.parentNode.getAttribute('data-id');

          var mesco = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];
          var mi = mesco.indexOf(this.parentNode.children[5].textContent);
          var mt = mesco.indexOf(this.parentNode.children[6].textContent);
          var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

          var periodo = meses[mi]+' - '+meses[mt]+' 2020';
          //console.log(periodo);
          $.ajax({
             type:'POST',
             url:"getindicador",
             data:{"_token": token,data:id},
             success:function(data){ 
              document.getElementById('identificadorindicador').textContent=data[0].identificadorindicador;
              document.getElementById('nombreindicador').textContent=data[0].nombreindicador;
              document.getElementById('objetivoindicador').textContent=data[0].objetivoindicador;
              document.getElementById('metaindicador').textContent=data[0].metaindicador+'%';
              //document.getElementById('periodocumplimiento').innerHTML=data[0].periodocumplimiento+'<br>'+periodo;
              document.getElementById('periodocumplimiento').textContent=periodo;
              data[0].idprograma1 == '' || data[0].idprograma1 == '0' || data[0].idprograma1 == 0 ? '' : document.getElementById('idprograma'+data[0].idprograma1).textContent='X';
              document.getElementById('definicionindicador').textContent=data[0].definicionindicador;
              data[0].dimensionmedir?document.getElementById('dimensionmedir'+data[0].dimensionmedir).checked = true:'';
              document.getElementById('unidadmedida').textContent=data[0].unidadmedida;
              document.getElementById('metodocalculo').textContent=data[0].metodocalculo;
              document.getElementById('variable1').textContent=data[0].variable1;
              document.getElementById('descripcionvariable1').textContent=data[0].descripcionvariable1;
              document.getElementById('fuentesinfovariable1').innerHTML=data[0].fuentesinfovariable1;
              document.getElementById('variable2').textContent=data[0].variable2;
              document.getElementById('descripcionvariable2').textContent=data[0].descripcionvariable2;
              document.getElementById('fuentesinfovariable2').innerHTML=data[0].fuentesinfovariable2;

              document.getElementById('identificadorindicador').contentEditable = true;
              document.getElementById('definicionindicador').contentEditable = true;

              document.getElementById('nombreindicador').contentEditable = true;
              document.getElementById('objetivoindicador').contentEditable = true;
              document.getElementById('unidadmedida').contentEditable = true;
              document.getElementById('metodocalculo').contentEditable = true;
              document.getElementById('variable1').contentEditable = true;
              document.getElementById('descripcionvariable1').contentEditable = true;
              document.getElementById('fuentesinfovariable1').contentEditable = true;
              document.getElementById('variable2').contentEditable = true;
              document.getElementById('descripcionvariable2').contentEditable = true;
              document.getElementById('fuentesinfovariable2').contentEditable = true;
              document.getElementById('fundamentojuridico').contentEditable = true;
              document.getElementById('lineabasev').contentEditable = true;
              document.getElementById('lineabasea').contentEditable = true;

              document.getElementById('updateIndicador').disabled=false;

              data[0].frecuenciamedicion?document.getElementById('frecuenciamedicion'+data[0].frecuenciamedicion).checked = true:'';
              data[0].frecuenciamedicion == '5' ? (document.getElementById('frecuenciaespecifique').style.display='inline',document.getElementById('frecuenciaespecifique').textContent=data[0].frecuenciaespecifique,document.getElementById('frecuenciaespecifique').contentEditable = true):document.getElementById('frecuenciaespecifique').style.display='none';
              //document.getElementById('frecuenciamedicion'+data[0].frecuenciamedicion).innerHTML='X <br>'+data[0].frecuenciaespecifique;
              console.log(data[0].fundamentojuridico)
              document.getElementById('fundamentojuridico').innerHTML=data[0].fundamentojuridico;
              document.getElementById('lineabasev').textContent=data[0].lineabasev;
              document.getElementById('lineabasea').textContent=data[0].lineabasea;
              //data[0].comportamientoindicador == '' || data[0].comportamientoindicador == '0' || data[0].comportamientoindicador == 0 ? '' : document.getElementById('comportamientoindicador'+data[0].comportamientoindicador).textContent='X';
              //console.log(data[0].comportamientoindicador)
              data[0].comportamientoindicador?document.getElementById('comportamientoindicador'+data[0].comportamientoindicador).checked = true:'';
              //document.getElementById('nombretitular').innerHTML=data[0].nombretitular+'<br>'+data[0].cargo;
              document.getElementById('pdfIndicador').setAttribute('data-id',id);
            }
          });
        }


/*************************************************************

  Funcionalidad: muestra una instancia nueva de indicador para la reprogramacion inicial
  Parametros: token, id
  Respuesta: muestra la interfaz con los datos seleccionado

***************************************************************/

        function creaIndicadorDisable(){
          $('#modalIndicador').modal('show');
          var id = this.parentNode.getAttribute('data-id');

          var mesco = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];
          var mi = mesco.indexOf(this.parentNode.children[5].textContent);
          var mt = mesco.indexOf(this.parentNode.children[6].textContent);
          var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

          var periodo = meses[mi]+' - '+meses[mt]+' 2020';
          //console.log(periodo);
          $.ajax({
             type:'POST',
             url:"getindicador",
             data:{"_token": token,data:id},
             success:function(data){ 
              document.getElementById('identificadorindicador').textContent=data[0].identificadorindicador;
              document.getElementById('nombreindicador').textContent=data[0].nombreindicador;
              document.getElementById('objetivoindicador').textContent=data[0].objetivoindicador;
              document.getElementById('metaindicador').textContent=data[0].metaindicador+'%';
              //document.getElementById('periodocumplimiento').innerHTML=data[0].periodocumplimiento+'<br>'+periodo;
              document.getElementById('periodocumplimiento').textContent=periodo;
              data[0].idprograma1 == '' || data[0].idprograma1 == '0' || data[0].idprograma1 == 0 ? '' : document.getElementById('idprograma'+data[0].idprograma1).textContent='X';
              document.getElementById('definicionindicador').textContent=data[0].definicionindicador;
              data[0].dimensionmedir?document.getElementById('dimensionmedir'+data[0].dimensionmedir).checked = true:'';
              document.getElementById('unidadmedida').textContent=data[0].unidadmedida;
              document.getElementById('metodocalculo').textContent=data[0].metodocalculo;
              document.getElementById('variable1').textContent=data[0].variable1;
              document.getElementById('descripcionvariable1').textContent=data[0].descripcionvariable1;
              document.getElementById('fuentesinfovariable1').innerHTML=data[0].fuentesinfovariable1;
              document.getElementById('variable2').textContent=data[0].variable2;
              document.getElementById('descripcionvariable2').textContent=data[0].descripcionvariable2;
              document.getElementById('fuentesinfovariable2').innerHTML=data[0].fuentesinfovariable2;

              document.getElementById('dimensionmedir1').style.pointerEvents='none';
              document.getElementById('dimensionmedir2').style.pointerEvents='none';
              document.getElementById('dimensionmedir3').style.pointerEvents='none';
              document.getElementById('dimensionmedir4').style.pointerEvents='none';

              document.getElementById('frecuenciamedicion1').style.pointerEvents='none';
              document.getElementById('frecuenciamedicion2').style.pointerEvents='none';
              document.getElementById('frecuenciamedicion3').style.pointerEvents='none';
              document.getElementById('frecuenciamedicion4').style.pointerEvents='none';
              document.getElementById('frecuenciamedicion5').style.pointerEvents='none';

              document.getElementById('comportamientoindicador1').style.pointerEvents='none';
              document.getElementById('comportamientoindicador2').style.pointerEvents='none';
              document.getElementById('comportamientoindicador3').style.pointerEvents='none';
              document.getElementById('comportamientoindicador4').style.pointerEvents='none';

              document.getElementById('updateIndicador').disabled=true;

              data[0].frecuenciamedicion?document.getElementById('frecuenciamedicion'+data[0].frecuenciamedicion).checked = true:'';
              data[0].frecuenciamedicion == '5' ? (document.getElementById('frecuenciaespecifique').style.display='inline',document.getElementById('frecuenciaespecifique').textContent=data[0].frecuenciaespecifique):document.getElementById('frecuenciaespecifique').style.display='none';
              //document.getElementById('frecuenciamedicion'+data[0].frecuenciamedicion).innerHTML='X <br>'+data[0].frecuenciaespecifique;
              document.getElementById('fundamentojuridico').innerHTML=data[0].fundamentojuridico;
              document.getElementById('lineabasev').textContent=data[0].lineabasev;
              document.getElementById('lineabasea').textContent=data[0].lineabasea;
              //data[0].comportamientoindicador == '' || data[0].comportamientoindicador == '0' || data[0].comportamientoindicador == 0 ? '' : document.getElementById('comportamientoindicador'+data[0].comportamientoindicador).textContent='X';
              //console.log(data[0].comportamientoindicador)
              data[0].comportamientoindicador?document.getElementById('comportamientoindicador'+data[0].comportamientoindicador).checked = true:'';
              //document.getElementById('nombretitular').innerHTML=data[0].nombretitular+'<br>'+data[0].cargo;
              document.getElementById('pdfIndicador').setAttribute('data-id',id);
            }
          });
        }

/*************************************************************

  Funcionalidad: limpia los elementos del modal
  Parametros: 
  Respuesta: 

***************************************************************/

        $('#modalIndicador').on('hide.bs.modal', function () {
          document.getElementById('identificadorindicador').textContent='';
              document.getElementById('nombreindicador').textContent='';
              document.getElementById('objetivoindicador').textContent='';
              document.getElementById('metaindicador').textContent='';
              document.getElementById('periodocumplimiento').textContent='';
              document.getElementById('idprograma1').textContent='';
              document.getElementById('idprograma2').textContent='';
              document.getElementById('idprograma3').textContent='';
              document.getElementById('idprograma4').textContent='';
              document.getElementById('definicionindicador').textContent='';
              document.getElementById('dimensionmedir1').checked = false;
              document.getElementById('dimensionmedir2').checked = false;
              document.getElementById('dimensionmedir3').checked = false;
              document.getElementById('dimensionmedir4').checked = false;
              document.getElementById('unidadmedida').textContent='';
              document.getElementById('metodocalculo').textContent='';
              document.getElementById('variable1').textContent='';
              document.getElementById('descripcionvariable1').textContent='';
              document.getElementById('fuentesinfovariable1').textContent='';
              document.getElementById('variable2').textContent='';
              document.getElementById('descripcionvariable2').textContent='';
              document.getElementById('fuentesinfovariable2').textContent='';
              document.getElementById('frecuenciamedicion1').checked = false;
              document.getElementById('frecuenciamedicion2').checked = false;
              document.getElementById('frecuenciamedicion3').checked = false;
              document.getElementById('frecuenciamedicion4').checked = false;
              document.getElementById('frecuenciamedicion5').checked = false;
              document.getElementById('fundamentojuridico').textContent='';
              document.getElementById('frecuenciaespecifique').textContent='';
              document.getElementById('lineabasev').textContent='';
              document.getElementById('lineabasea').textContent='';
              document.getElementById('comportamientoindicador1').checked = false;
              document.getElementById('comportamientoindicador2').checked = false;
              document.getElementById('comportamientoindicador3').checked = false;
              document.getElementById('comportamientoindicador4').checked = false;
              //document.getElementById('nombretitular').innerHTML='';
              document.getElementById('pdfIndicador').setAttribute('data-id','');
        })

/*************************************************************

  Funcionalidad: crea un formulario para su emvio
  Parametros: datos del formulario
  Respuesta: crea un documento pdf con los parametros seleccionados

***************************************************************/

        document.getElementById('pdfIndicador')?document.getElementById('pdfIndicador').addEventListener('click',pdfindicador,false):'';
        function pdfindicador() {
          var id = this.getAttribute('data-id');
          //$.ajax({
          //   type:'POST',
          //   url:"pdfindicador",
          //   data:{"_token": token,data:id},
          //   success:function(data){ 
          //      console.log(data);
          //  }
          //});
          var urlPdf;
          $('meta[name="app-prefix"]').attr('content') == 'http://sipseiv2.test' ? urlPdf='/' : urlPdf='/sipseiv2/';
          const form = document.createElement('form');
          form.method = 'GET';
          form.action = urlPdf+'pdfindicador';
          form.target = '_blank';
          form.style.display='none';

          var ip1 = document.createElement('input');
          ip1.name = '_token';
          ip1.value = token;
          form.appendChild(ip1);

          var ip2 = document.createElement('input');
          ip2.name = 'data';
          ip2.value = id;
          form.appendChild(ip2);
          
          document.body.append(form);
          form.submit();
        }

/*************************************************************

  Funcionalidad: edita una instacia de un indicador
  Parametros: token,id,noin,obin,dime,unme,meca,var1,dev1,fui1,var2,dev2,fui2,frme,fres,fuju,libv,liba,coin
  Respuesta: alerta de datos editados

***************************************************************/

        document.getElementById('updateIndicador')?document.getElementById('updateIndicador').addEventListener('click',upIndicador,false):'';
        function upIndicador() {
          var id = document.getElementById('pdfIndicador').getAttribute('data-id');

          var idin = document.getElementById('identificadorindicador').textContent;
          var dein = document.getElementById('definicionindicador').textContent;

          var noin = document.getElementById('nombreindicador').textContent;
          var obin = document.getElementById('objetivoindicador').textContent;
          var dime;
          document.querySelector('input[name="dimension"]:checked')?dime = document.querySelector('input[name="dimension"]:checked').value:'';
          var unme = document.getElementById('unidadmedida').textContent;
          var meca = document.getElementById('metodocalculo').textContent;
          var var1 = document.getElementById('variable1').textContent;
          var dev1 = document.getElementById('descripcionvariable1').textContent;
          var fui1 = document.getElementById('fuentesinfovariable1').innerHTML;
          var var2 = document.getElementById('variable2').textContent;
          var dev2 = document.getElementById('descripcionvariable2').textContent;
          var fui2 = document.getElementById('fuentesinfovariable2').innerHTML;
          var frme;
          document.querySelector('input[name="frecuencia"]:checked')?frme = document.querySelector('input[name="frecuencia"]:checked').value:'';
          var fres = document.getElementById('frecuenciaespecifique').textContent;
          var fuju = document.getElementById('fundamentojuridico').innerHTML;
          var libv = document.getElementById('lineabasev').textContent;
          var liba = document.getElementById('lineabasea').textContent;
          var coin;
          document.querySelector('input[name="comportamiento"]:checked')?coin = document.querySelector('input[name="comportamiento"]:checked').value:'';
          //console.log(coin);
          $.ajax({
             type:'POST',
             url:"actindicador",
             data:{"_token": token,id:id,idin:idin,dein:dein,noin:noin,obin:obin,dime:dime,unme:unme,meca:meca,var1:var1,dev1:dev1,fui1:fui1,var2:var2,dev2:dev2,fui2:fui2,frme:frme,fres:fres,fuju:fuju,libv:libv,liba:liba,coin:coin},
             success:function(data){ 
                swal({
                title: "Datos actualizados",
                text: "",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Continuar",
                closeOnConfirm: true
              },
              function(isConfirm) {
                if (isConfirm) {
                  $('#modalIndicador').modal('hide');
                  //console.log(data);
                }
              });
            }
          });
        }

/*************************************************************

  Funcionalidad: muestra u oculta el elementos especificar 
  Parametros: 
  Respuesta: 

***************************************************************/

        document.getElementById('frecuenciamedicion1')?document.getElementById('frecuenciamedicion1').addEventListener('click',showIndique,false):'';
        document.getElementById('frecuenciamedicion2')?document.getElementById('frecuenciamedicion2').addEventListener('click',showIndique,false):'';
        document.getElementById('frecuenciamedicion3')?document.getElementById('frecuenciamedicion3').addEventListener('click',showIndique,false):'';
        document.getElementById('frecuenciamedicion4')?document.getElementById('frecuenciamedicion4').addEventListener('click',showIndique,false):'';
        document.getElementById('frecuenciamedicion5')?document.getElementById('frecuenciamedicion5').addEventListener('click',showIndique,false):'';
        function showIndique(){
          document.getElementById('frecuenciamedicion5').checked?(document.getElementById('frecuenciaespecifique').style.display='inline',document.getElementById('frecuenciaespecifique').contentEditable = true):(document.getElementById('frecuenciaespecifique').style.display='none',document.getElementById('frecuenciaespecifique').textContent='');
        }

/*************************************************************

  Funcionalidad: busca las observaciones asociadas a una actividad
  Parametros: token, id
  Respuesta: musetra la intefaz con sus parametros de salida

***************************************************************/

        function verObservaciones(){
          $('#modalOpservaciones').modal('show');
           var id = this.parentNode.getAttribute('data-id');
           var act = this.parentNode.children[0].textContent;
           var cla = document.getElementById('claveProEsp').textContent;
           var uni = document.getElementById('eunidad').textContent;
           //console.log(id);
           document.getElementById('sendObservaciones').setAttribute('data-id', id);
           $.ajax({
             type:'POST',
             url:"getobservacion",
             data:{"_token": token,id:id},
             success:function(data){
              //console.log(data.length)
              var arrayEnable = [];
              var arrObs = [];

              data.length==0 ? 
              document.getElementById('dataHistorial').textContent="Sin observaciones" 
              :
              document.getElementById('dataHistorial').textContent="Historial de observaciones";

              document.getElementById('ModalTitle').innerHTML=uni+" | Actividad: "+act+" | "+cla;
              for (var i = 0; i < data.length; i++) {
                arrayEnable.push(data[i].obs_status);
                var pri = new Date(Date.parse(data[i].obs_date));
                var seg = new Date(Date.parse(data[i].obs_date_dos));
                var tres = new Date(Date.parse(data[i].obs_date_tres));


                var child = document.createElement('div');
                    child.innerHTML = data[i].obs_desc;
                    child.className='col-md-10 contObstext';
                document.getElementById('getObs').appendChild(child); 



                switch (data[i].obs_status) {
                  case '0':
                    var child2 = document.createElement('div');
                    child2.innerHTML = '<i class="iconObsVer fa fa-cogs" style="color:#000;" data-toggle="tooltip" data-placement="top" title="En proceso de concluir, enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+'" aria-hidden="true"></i>';
                    child2.className='col-md-1 contIconObs';
                    child2.style.backgroundColor="#f48fb1";
                    document.getElementById('getObs').appendChild(child2);

                    var child3 = document.createElement('div');
                    child3.innerHTML = '<input type="checkbox" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Concluir" aria-hidden="true" data-id="'+data[i].id+'" class="checkObs edoColor" name="checkObs'+i+'" value="1">';
                    child3.className='col-md-1 contIconObsVal';
                    child3.style.backgroundColor="#e082a2";
                    document.getElementById('getObs').appendChild(child3);
                    break;
                  case '1':
                  var child2 = document.createElement('div');
                    child2.innerHTML = '<i class="iconObsVer fa fa-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Por validar" aria-hidden="true"></i>';
                    child2.className='col-md-1 contIconObs';
                    child2.style.backgroundColor="#f48fb1";
                    document.getElementById('getObs').appendChild(child2);

                  var child3 = document.createElement('div');
                    child3.innerHTML = '<i class="iconObs fa fa-check-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+'" aria-hidden="true"></i>';
                    child3.className='col-md-1 contIconObsVal';
                    child3.style.backgroundColor="#e082a2";
                    document.getElementById('getObs').appendChild(child3);
                    break;
                  case '2':
                    var child2 = document.createElement('div');
                    child2.innerHTML = '<i class="iconObsVer fa fa-check-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+', Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+', Validado: '+tres.getDate()+'-'+(tres.getMonth()+1)+'-'+tres.getFullYear()+'" aria-hidden="true"></i>';
                    child2.className='col-md-1 contIconObs';
                    child2.style.backgroundColor="#afb42b";
                    document.getElementById('getObs').appendChild(child2);

                  var child3 = document.createElement('div');
                    child3.innerHTML = '<i class="iconObs fa fa-check-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+', Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+', Validado: '+tres.getDate()+'-'+(tres.getMonth()+1)+'-'+tres.getFullYear()+'" aria-hidden="true"></i>';
                    child3.className='col-md-1 contIconObsVal';
                    child3.style.backgroundColor="#9e9d24";
                    document.getElementById('getObs').appendChild(child3);
                    break;
                  case '3':
                  var child2 = document.createElement('div');
                  child2.innerHTML = '<i class="iconObsVer fa fa-times-circle-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+', Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+', No Validado: '+tres.getDate()+'-'+(tres.getMonth()+1)+'-'+tres.getFullYear()+'" aria-hidden="true"></i>';
                  child2.className='col-md-1 contIconObs';
                  child2.style.backgroundColor="#ff5252";
                  document.getElementById('getObs').appendChild(child2);

                  var child3 = document.createElement('div');
                  child3.innerHTML = '<i class="iconObs fa fa-check-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+', Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+', No Validado: '+tres.getDate()+'-'+(tres.getMonth()+1)+'-'+tres.getFullYear()+'" aria-hidden="true"></i>';
                  child3.className='col-md-1 contIconObsVal';
                  child3.style.backgroundColor="#ff1744";
                  document.getElementById('getObs').appendChild(child3);

                  arrObs.push(data[i].id);

                    break;
                  case '4':
                  var child2 = document.createElement('div');
                  child2.innerHTML = '<i class="iconObsVer fa fa-times-circle-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+', Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+', No Validado: '+tres.getDate()+'-'+(tres.getMonth()+1)+'-'+tres.getFullYear()+'" aria-hidden="true"></i>';
                  child2.className='col-md-1 contIconObs';
                  child2.style.backgroundColor="#ff5252";
                  document.getElementById('getObs').appendChild(child2);

                  var child3 = document.createElement('div');
                  child3.innerHTML = '<i class="iconObs fa fa-check-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+', Realizado: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+', No Validado: '+tres.getDate()+'-'+(tres.getMonth()+1)+'-'+tres.getFullYear()+'" aria-hidden="true"></i>';
                  child3.className='col-md-1 contIconObsVal';
                  child3.style.backgroundColor="#ff1744";
                  document.getElementById('getObs').appendChild(child3);
                    break;
                  default:
                    alert('Error');
                }



              }

              arrayEnable.includes("0")?document.getElementById('sendObservaciones').disabled=false:document.getElementById('sendObservaciones').disabled=true;
              arrObs.length>0?removeObsErr(arrObs):'';

              $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
              });

            }
          });
        }

/*************************************************************

  Funcionalidad: busca y edita el estatus de las observaciones no validas
  Parametros: token, arrObs
  Respuesta: musetra la intefaz con sus parametros de salida

***************************************************************/

         function removeObsErr(arrObs){
          $.ajax({
             type:'POST',
             url:"deleteobserr",
             data:{"_token": token,arr:arrObs},
             success:function(data){
              //console.log(data)
              var porVer=[];
              document.getElementById('obsDes2').innerHTML="";
              for (var i = 0; i < data.length; i++) {
                //console.log(data[i].obs_status);
                var d = new Date(Date.parse(data[i].obs_date));
                var a1 = document.createElement('a');
                a1.className="dropdown-item texto-negro alerta-texto";

                var d1 = document.createElement('div');
                d1.style.display='inline-block';
                d1.style.float='left';
                data[i].obs_status=='3'?(d1.style.borderBottom='2px solid #dd2c00',porVer.push('1')):'';
                d1.textContent='Act.- '+data[i].numactividad+' | Prog.- '+data[i].obs_clave;
                a1.appendChild(d1);

                var d2 = document.createElement('div');
                d2.style.display='inline-block';
                d2.style.float='right';
                d2.style.background='#EA0D94';
                d2.style.color='#fff';
                d2.style.borderRadius='5px';
                d2.style.padding="1% 2%";
                d2.textContent=d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear();
                a1.appendChild(d2);
                document.getElementById('obsDes2').appendChild(a1);
              }
              //console.log(porVer);
              document.getElementById('campanaAlertfinR').textContent=(porVer.length);
            }
          });
         }

/*************************************************************

  Funcionalidad: Limpia y restablece los valores de inicio de los elementos del modal
  Parametros: 
  Respuesta:

***************************************************************/

        $('#modalOpservaciones').on('hide.bs.modal', function () {
          document.getElementById('sendObservaciones').setAttribute('data-id', '');
          document.getElementById('getObs').innerHTML="";
          document.getElementById('ModalTitle').innerHTML="";
          document.getElementById('dataHistorial').textContent="";
          document.getElementById('sendObservaciones').disabled=true;
        })

/*************************************************************

  Funcionalidad: Envia las observaciones para su registro y establece el estatus de cada boton
  Parametros: id,arrayObs,cla,uni,varColor
  Respuesta: alerta de datos enviados

***************************************************************/

        document.getElementById('sendObservaciones')?document.getElementById('sendObservaciones').addEventListener('click', sendOBS, false):'';

        function sendOBS() {
          var obs = document.getElementsByClassName('checkObs');
          var id = this.getAttribute('data-id');
          var arrayObs = [];
          for (var i = 0; i < obs.length; i++) {
            if (obs[i].checked == true){
              arrayObs.push(obs[i].getAttribute('data-id')+'|'+obs[i].value);
            }
          }

          //////////////////////////////////////////////////////////////////////////////////////
          var aoe = document.getElementsByClassName('edoColor');

          var varColor;
          arrayObs.length==aoe.length?varColor=3:varColor=2;

          if (arrayObs.length>0) {

          $.ajax({
             type:'POST',
             url:"sendidObs",
             data:{"_token": token,id:id,data:arrayObs,color:varColor},
             success:function(data){
              //console.log(data)
              document.getElementById('campanaAlertfin').textContent=(data.length);
              document.getElementById('obsDes1').innerHTML="";
              for (var i = 0; i < data.length; i++) {
                var d = new Date(Date.parse(data[i].obs_date));
                var a1 = document.createElement('a');
                a1.className="dropdown-item texto-negro alerta-texto";

                var d1 = document.createElement('div');
                d1.style.display='inline-block';
                d1.style.float='left';
                d1.textContent='Act.- '+data[i].numactividad+' | Prog.- '+data[i].obs_clave;
                a1.appendChild(d1);

                var d2 = document.createElement('div');
                d2.style.display='inline-block';
                d2.style.float='right';
                d2.style.background='#EA0D94';
                d2.style.color='#fff';
                d2.style.borderRadius='5px';
                d2.style.padding="1% 2%";
                d2.textContent=d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear();
                a1.appendChild(d2);
                document.getElementById('obsDes1').appendChild(a1);
              }

              swal('Actividad eliminada', "", "success");
              swal({
                title: "Datos enviados",
                text: "",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Continuar",
                closeOnConfirm: true
              },
              function(isConfirm) {
                if (isConfirm) {
                  $('#modalOpservaciones').modal('hide');
                  //console.log(data);
                  data == 0 ? (document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#f48fb1',document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000') : '';
                }
              });
            }
          });

        } else {
          swal('Seleccione al menos una observación', "", "warning");
        }

        }


///////////////////////////////////////////////////////////////////////
        var upAct = document.getElementsByClassName('up');
        var dowAct = document.getElementsByClassName('down');
        var backActividad = document.getElementsByClassName('backAct');

        for (var i = 0; i < upAct.length; i++) {
            upAct[i].addEventListener("click", moveUp, false);
        }

        for (var i = 0; i < dowAct.length; i++) {
            dowAct[i].addEventListener("click", moveDown, false);
        }

        for (var i = 0; i < backActividad.length; i++) {
            backActividad[i].addEventListener("keyup", backEnable, false);
        }

/*************************************************************

  Funcionalidad: funcionalidad para subir de posision una actividad
  Parametros: 
  Respuesta:

***************************************************************/
        function moveUp(e) {
          if(e.target.parentNode.previousElementSibling)
            e.target.parentNode.parentNode.insertBefore(e.target.parentNode, e.target.parentNode.previousElementSibling);
          reCountAct();
          insertNum();
        }
/*************************************************************

  Funcionalidad: funcionalidad para bajar de posision una actividad
  Parametros: 
  Respuesta:

***************************************************************/
        function moveDown(e) {
          if(e.target.parentNode.nextElementSibling)
            e.target.parentNode.parentNode.insertBefore(e.target.parentNode.nextElementSibling, e.target.parentNode);
          reCountAct();
          insertNum();
        }

/////////////////////////////////////////////////////////////////////////////
        var delActDoc = document.getElementsByClassName('delAct');

        for (var i = 0; i < delActDoc.length; i++) {
            delActDoc[i].addEventListener("click", removeActModal, false);
        }

        var backAct = document.getElementsByClassName('btnBack');

        for (var i = 0; i < backAct.length; i++) {
            backAct[i].addEventListener("click", actBack, false);
        }


/*************************************************************

  Funcionalidad: Retorna a un estado anterior la informacion de cada actividad
  Parametros: 
  Respuesta:

***************************************************************/
        function actBack() {
          //document.execCommand("undo", false, null);
          var act = this.getAttribute('data-ba'), uni = this.getAttribute('data-bu'), mes = this.getAttribute('data-bm');
          this.parentNode.querySelector('.item2').textContent=act;
          this.parentNode.querySelector('.item3').textContent=uni;
          var mesArr = mes.split(",");
          //console.log(mesArr.length)
          //mesArr.length>0 ? 's' : 's' ;
          for (var i = 0; i < this.parentNode.children[4].children.length; i++) {
            this.parentNode.children[4].children[i].textContent=mesArr[i];
          } 

          this.parentNode.classList.contains("newAct") ? btnBackReset(this) : finActEdit(this);
          this.classList.contains('itemMes') ? this.parentNode.parentNode.querySelector('.resetBack').setAttribute('data-insert','0') : this.parentNode.querySelector('.resetBack').setAttribute('data-insert','0'); 
          //reCountAct();
          //sumTPM();
        }

/*************************************************************

  Funcionalidad: habilita el boton de regresar de cada actividad
  Parametros: t
  Respuesta:

***************************************************************/

        function btnBackReset(t){
          t.style.pointerEvents = "none";
          t.style.color = "#eceff1";
        }

/*************************************************************

  Funcionalidad: Regresa la actividad alos parametros establecidos
  Parametros: t
  Respuesta:

***************************************************************/

        function finActEdit(t) {
          //console.log(act,uni,mes);
            var btnOff = document.getElementsByClassName('btnOff');
                for (var i = 0; i < btnOff.length; i++) {
                    btnOff[i].style.pointerEvents = '';
                    btnOff[i].style.color = '';
                }
            t.parentNode.querySelector('.resetBack').setAttribute("data-edit", '0');
            t.parentNode.style.borderBottom = "#fff solid 1px";
            t.parentNode.querySelector('.resetBack').classList.remove('fa-check');
            t.parentNode.querySelector('.resetBack').classList.add('fa-pencil-square-o');
            t.parentNode.querySelector('.resetBack').classList.add('btnOff');
            t.parentNode.querySelector('.resetBack').style.color = "";
            t.parentNode.querySelector('.resetBack').style.backgroundColor = "";
            t.parentNode.querySelector('.resetBack').setAttribute('data-original-title', 'Editar');
            t.parentNode.querySelector('.delAct').classList.add('btnOff');
            t.parentNode.querySelector('.item2').contentEditable = "false";
            t.parentNode.querySelector('.item2').style.backgroundColor = "";
            t.parentNode.querySelector('.item3').contentEditable = "false";
            t.parentNode.querySelector('.item3').style.backgroundColor = "";
            for (var i = 0; i < t.parentNode.children[4].children.length; i++) {
              t.parentNode.children[4].children[i].contentEditable = "false";
              t.parentNode.children[4].children[i].textContent != 0 ? t.parentNode.children[4].children[i].style.backgroundColor = "#cfd8dc" : t.parentNode.children[4].children[i].style.backgroundColor = "";
            } 

            t.style.pointerEvents = "none";
            t.style.color = "#eceff1";
        }

/*************************************************************

  Funcionalidad: Elimina una actividad
  Parametros: token,idDel,clave
  Respuesta: ingreso de la contraseña para efectuar el borrado

***************************************************************/

        function removeAct() {

          var idDel = this.getAttribute('data-id');
          var clave = document.getElementById("claveEliminar").value;
          $('.tooltip').tooltip('hide');
           if(clave !== null && clave !== '') {

                document.getElementById("errorEmail").classList.add('hidden');
                 $.ajax({
                   type:'POST',
                   url:"deleteactividad",
                   data:{"_token": token,data:idDel,cla:clave},
                   success:function(data){
                    if (data=='1') {
                      $('#modaldelete').modal('hide');
                      document.getElementById('act'+idDel).remove(); 
                      swal('Actividad Eliminada del POA', "", "success");
                      reCountAct();
                      sumTPM();
                      var btnOff = document.getElementsByClassName('btnOff');
                      for (var i = 0; i < btnOff.length; i++) {
                          btnOff[i].style.pointerEvents = '';
                          btnOff[i].style.color = '';
                      }
                      insertNum();
                      clave.value='';
                      }
                      else {
                        swal('Su clave de confirmación no coincide', "", "error");
                        $('#modaldelete').on('hide.bs.modal', function () {
                          document.getElementById("claveEliminar").value="";
                          document.getElementById("errorEmail").classList.add('hidden');
                        })
                      }
                  },
                   error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $('#modaldelete').modal('hide');
                     swal('Error al Eliminar la Actividad', "", "error");
                     //location.reload();
                  }    
                });

            } else {

            document.getElementById("errorEmail").classList.remove('hidden');
            document.getElementById("errorEmail").innerHTML = 'Ingrese su clave';

            }
          
        }

/*************************************************************

  Funcionalidad: restaura los valores predeterminados de los elementos
  Parametros: 
  Respuesta:

***************************************************************/

        $('#modaldelete').on('hide.bs.modal', function () {
          document.getElementById("claveEliminar").value="";
          document.getElementById("errorEmail").classList.add('hidden');
        })

/*************************************************************

  Funcionalidad: obtiene un para metro y lo evelua
  Parametros: idDel
  Respuesta:

***************************************************************/

        function removeActModal() {
          var idDel = this.parentNode.getAttribute('data-id');
          idDel == 0 ? removeActNew(this) : removeActInsert(this);
        }

/*************************************************************

  Funcionalidad: Elimina el elemnto de una actividad si no se ha guardado
  Parametros: d
  Respuesta:

***************************************************************/

        document.getElementById('borraActividad')?document.getElementById('borraActividad').addEventListener('click', removeAct, false):'';

        function removeActInsert(d){
          var id = d.parentNode.getAttribute('data-id');
          document.getElementById('borraActividad').setAttribute('data-id',id);
          //document.getElementById('borraActividad').addEventListener('click', removeAct, false);
          $('#modaldelete').modal('show');
        }


/*************************************************************

  Funcionalidad: Elimina el elemnto de una actividad si no se ha guardado y regresa el estatus inicial de los elementos
  Parametros: p
  Respuesta:

***************************************************************/


        function removeActNew(p) {
          p.parentNode.remove();
          $('.tooltip').tooltip('hide');
          //reCountAct();
          //sumTPM();
                var btnOff = document.getElementsByClassName('btnOff');
                for (var i = 0; i < btnOff.length; i++) {
                    btnOff[i].style.pointerEvents = '';
                    btnOff[i].style.color = '';
                }
          //insertNum();
        }

/*************************************************************

  Funcionalidad: asigna un nuevo numero alas actividades
  Parametros:
  Respuesta:

***************************************************************/

        function reCountAct() {
          var numAct = document.getElementsByClassName('rowAct');
          for (var i = 0; i < numAct.length; i++) {
            numAct[i].querySelector('.item1').innerHTML = i+1;
          }
        }

/*************************************************************

  Funcionalidad: inserta en la base de datos el nuebo numero de cada actividad
  Parametros:
  Respuesta:

***************************************************************/

        function insertNum() {
          var numAct = document.getElementsByClassName('rowAct');
          var arrayNum = [];
          for (var i = 0; i < numAct.length; i++) {
            arrayNum.push(numAct[i].getAttribute('data-id')+'|'+(i+1));
          }
          $.ajax({
             type:'POST',
             url:"cambiarnumero",
             data:{"_token": token,data:arrayNum},
             success:function(data){ 
                //console.log(data);
            }
          });
        }


/*************************************************************

  Funcionalidad: evalua si una actividad fue editada para su tratamiento
  Parametros:
  Respuesta:

***************************************************************/

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
            this.parentNode.querySelector('.delAct').classList.remove('btnOff'),
            //this.parentNode.querySelector('.btnBack').style.pointerEvents="none",
            //this.parentNode.querySelector('.btnBack').style.color="#546e7a",
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
            this.parentNode.querySelector('.delAct').classList.add('btnOff'),
            onBtn(this)
            );

        }

/*************************************************************

  Funcionalidad: Evalua el lementos relacionado a una actividad para su tratamiento
  Parametros:
  Respuesta:

***************************************************************/

        function backEnable(){
            this.parentNode.classList.contains("allItemMes") ? 
            (this.parentNode.parentNode.querySelector('.btnBack').style.pointerEvents='',
            this.parentNode.parentNode.querySelector('.btnBack').style.color='#293338')
            :
            (this.parentNode.querySelector('.btnBack').style.pointerEvents='',
            this.parentNode.querySelector('.btnBack').style.color='#293338');
            
            this.classList.contains('itemMes') ? this.parentNode.parentNode.querySelector('.resetBack').setAttribute('data-insert','1') : this.parentNode.querySelector('.resetBack').setAttribute('data-insert','1');        
        }

/*************************************************************

  Funcionalidad: Escucha si se cambio el programa seleccionado y ejecuta "getPro" es cascada
  Parametros:
  Respuesta:

***************************************************************/

   document.getElementById('ePrograma')?document.getElementById('ePrograma').addEventListener("change", changePro, false):'';  
   
  function changePro(){
    var pro = this.options[this.selectedIndex].value;
    pro == '0' ? document.getElementById('eProgramaEsp').disabled=true : getProEsp(pro);
  }

/*************************************************************

  Funcionalidad: Limpia las listas y busca los programas especificos
  Parametros: pro
  Respuesta: crea los elemntos con los parametros obtenidos

***************************************************************/

  function getProEsp(pro){
    document.getElementById("eProgramaEsp").innerHTML='<option value="0">Seleccione un programa</option>';
    document.getElementById('contActividades').style.backgroundColor='#fff'
    emptyPrograma();
    $.ajax({
       type:'POST',
       url:"sendporgramaesp",
       data:{"_token": token,id:pro},
       success:function(data){
       //console.log(data); 
          data[0].length == 0 ? emptyPrograma() : document.getElementById('eProgramaEsp').disabled=false;
           for (var i = 0; i < data[0].length; i++) {
              //var option = new Option(data[0][i].descprogramaesp, data[0][i].idprogramaesp);
              //document.getElementById("eProgramaEsp").appendChild(option);
              var option = document.createElement("option");
              option.text = data[0][i].descprogramaesp;
              option.value = data[0][i].idprogramaesp;
              option.setAttribute('data-clave',data[0][i].claveprogramaesp);
              option.setAttribute('data-objetivo',data[0][i].objprogramaesp);
              document.getElementById("eProgramaEsp").appendChild(option);
           }
          
      }
    });
  }

/*************************************************************

  Funcionalidad: Reaizar la busqueda de las actividades y las crea
  Parametros: proesp, token
  Respuesta: Crea lalista de opciones con los balores obtenidos

***************************************************************/

  document.getElementById('eProgramaEsp')?document.getElementById('eProgramaEsp').addEventListener("change", changeProEsp, false):''; 

  function changeProEsp(){
    var proesp = this.options[this.selectedIndex].value;
    var clave = this.options[this.selectedIndex].getAttribute('data-clave');
    var objetivo = this.options[this.selectedIndex].getAttribute('data-objetivo');
    document.getElementById('claveProEsp').textContent = clave;
    document.getElementById('objetivoProEsp').textContent = objetivo;
    document.getElementById('objetivoProEsp').setAttribute('title', objetivo);
    //console.log(proesp);
    ///////////////////////////////////////////////////////////////////////////////// ajax de actividades
    $.ajax({
       type:'POST',
       url:"getAct",
       data:{"_token": token,proesp:proesp},
       success:function(data){ 
          document.getElementById('contActividades').innerHTML='';
          data[0].length == 0 ? document.getElementById('contActividades').style.backgroundColor='#fff' : document.getElementById('contActividades').style.backgroundColor='';
          //console.log(data[0]);
          var meses = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];

          for (var j = 0; j < data[0].length; j++) {

                var rowAct = document.createElement("DIV");
                rowAct.className = "row rowAct";
                rowAct.setAttribute('data-id', data[0][j].id)
                rowAct.setAttribute('id', 'act'+data[0][j].id)  

                var item1 = document.createElement("DIV");   // Create a <button> element
                item1.innerHTML = '';
                item1.className = "item1";                 // Insert text
                rowAct.appendChild(item1);  

                var item2 = document.createElement("DIV");
                item2.innerHTML = data[0][j].descactividad;
                item2.className = "item2";                 // Insert text
                item2.addEventListener("keyup", backEnable, false);
                rowAct.appendChild(item2);

                var item3 = document.createElement("DIV");
                item3.innerHTML = data[0][j].unidadmedida;
                item3.className = "item3";                 // Insert text
                item3.addEventListener("keyup", backEnable, false);
                rowAct.appendChild(item3);

                var item4 = document.createElement("DIV");
                item4.className = "item4";                 // Insert text
                rowAct.appendChild(item4);

                var allItemMes = document.createElement("DIV");
                allItemMes.className = "allItemMes"; 

                var me = [];
                var sumNum = [];
                for (var i = 0; i < meses.length; i++) {
                  var itemMes1 = document.createElement("DIV");
                  var mesp = meses[i]+'p';
                  sumNum.push(data[0][j][mesp]);
                  itemMes1.innerHTML = data[0][j][mesp];
                  itemMes1.className = "col-md-1 itemMes";
                  itemMes1.setAttribute('data-mes', meses[i]);
                  itemMes1.addEventListener("keyup", backEnable, false);
                  itemMes1.addEventListener("keypress", validaNumeros, false);
                  data[0][j][mesp] != 0 ? (itemMes1.style.backgroundColor = "#cfd8dc",me.push(meses[i])) : itemMes1.style.backgroundColor = "";

                  allItemMes.appendChild(itemMes1)
                }

                var programado = sumNum.reduce(sumArray);
                item4.innerHTML=programado;
                
                

                rowAct.appendChild(allItemMes); 

                var item5 = document.createElement("DIV");
                item5.innerHTML = "MES";
                item5.className = "item5";                 // Insert text
                rowAct.appendChild(item5);

                var item6 = document.createElement("DIV");
                item6.innerHTML = "MES";
                item6.className = "item6";                 // Insert text
                rowAct.appendChild(item6);

                switch (me.length) {
                  case 0:
                    item5.innerHTML='MES';
                    item6.innerHTML='MES';
                    break;
                  case 1:
                    item5.innerHTML=me[0];
                    item6.innerHTML=me[0];
                    break;
                  default:
                    var totalMes = me.length-1;
                    item5.innerHTML=me[0];
                    item6.innerHTML=me[me.length-1]
                }


/////////////////////////////////////////////////////////////////////////////////////////////////////REPROGRAMACION ESTATUS
                switch (data[0][j].act_tipo_estatus) {
                  case 0:

                var editar = document.createElement("I");
                editar.className = "iconBH fa fa-pencil-square-o resetBack btnOff";   
                editar.setAttribute('aria-hidden', 'true');
                editar.setAttribute('data-toggle', 'tooltip');
                editar.setAttribute('data-placement', 'right');
                editar.setAttribute('data-insert', '0');
                editar.setAttribute('title', 'Editar');
                editar.setAttribute('data-edit', '0');
                editar.style.color='#eceff1';
                editar.style.pointerEvents='none';
                //editar.addEventListener("click", editAct, false);

                rowAct.appendChild(editar);

                var back = document.createElement("I");
                back.className = "iconBH fa fa-ban btnBack btnOn";   
                back.setAttribute('aria-hidden', 'true');
                back.setAttribute('data-toggle', 'tooltip');
                back.setAttribute('data-placement', 'right');
                back.setAttribute('title', 'Cancelar edición');
                back.setAttribute('data-ba', data[0][j].descactividad);
                back.setAttribute('data-bu', data[0][j].unidadmedida);
                back.setAttribute('data-bm', sumNum.join());
                back.style.color='#eceff1';
                back.style.pointerEvents='none';
                //back.addEventListener("click", actBack, false);

                rowAct.appendChild(back);

                var up = document.createElement("I");
                up.className = "iconBH fa fa-arrow-circle-up up btnOff";   
                up.setAttribute('aria-hidden', 'true');
                up.setAttribute('data-toggle', 'tooltip');
                up.setAttribute('data-placement', 'right');
                up.setAttribute('title', 'Subir');
                up.style.color='#eceff1';
                up.style.pointerEvents='none';
                //up.addEventListener("click", moveUp);

                rowAct.appendChild(up);

                var down = document.createElement("I");
                down.className = "iconBH fa fa-arrow-circle-down down btnOff";   
                down.setAttribute('aria-hidden', 'true');
                down.setAttribute('data-toggle', 'tooltip');
                down.setAttribute('data-placement', 'right');
                down.setAttribute('title', 'Bajar');
                down.style.color='#eceff1';
                down.style.pointerEvents='none';
                //down.addEventListener("click", moveDown);

                rowAct.appendChild(down);

                var indi = document.createElement("I");
                indi.className = "iconBH fa fa-info-circle btnOff";   
                indi.setAttribute('aria-hidden', 'true');
                indi.setAttribute('data-toggle', 'tooltip');
                indi.setAttribute('data-placement', 'right');
                indi.setAttribute('title', 'Indicador');
                indi.addEventListener("click", creaIndicadorDisable);

                rowAct.appendChild(indi);

                var observa = document.createElement("I");
                observa.className = "iconBH fa fa-eye btnOff";   
                observa.setAttribute('aria-hidden', 'true');
                observa.setAttribute('data-toggle', 'tooltip');
                observa.setAttribute('data-placement', 'right');
                observa.setAttribute('title', 'observaciones');
                observa.style.color='#eceff1';
                observa.style.pointerEvents='none';
                //observa.addEventListener("click", verObservaciones);

                rowAct.appendChild(observa);

                var del = document.createElement("I");
                del.className = "iconBH fa fa-trash delAct btnOff";   
                del.setAttribute('aria-hidden', 'true');
                del.setAttribute('data-toggle', 'tooltip');
                del.setAttribute('data-placement', 'right');
                del.setAttribute('title', 'Eliminar');
                del.style.color='#eceff1';
                del.style.pointerEvents='none';
                //del.addEventListener("click", removeActModal);

                rowAct.appendChild(del);

                act.appendChild(rowAct);
                act.style.backgroundColor='';

                document.getElementById('addAct').style.pointerEvents = 'none';
                document.getElementById('addAct').style.color = '#cfd8dc';

                ////////////////////////////////////////////////////////////////////////////////////////
                    
                  break;
                  case 1:
                    var editar = document.createElement("I");
                editar.className = "iconBH fa fa-pencil-square-o resetBack btnOff";   
                editar.setAttribute('aria-hidden', 'true');
                editar.setAttribute('data-toggle', 'tooltip');
                editar.setAttribute('data-placement', 'right');
                editar.setAttribute('data-insert', '0');
                editar.setAttribute('title', 'Editar');
                editar.setAttribute('data-edit', '0');
                editar.addEventListener("click", editAct, false);

                rowAct.appendChild(editar);

                var back = document.createElement("I");
                back.className = "iconBH fa fa-ban btnBack btnOn";   
                back.setAttribute('aria-hidden', 'true');
                back.setAttribute('data-toggle', 'tooltip');
                back.setAttribute('data-placement', 'right');
                back.setAttribute('title', 'Cancelar edición');
                back.setAttribute('data-ba', data[0][j].descactividad);
                back.setAttribute('data-bu', data[0][j].unidadmedida);
                back.setAttribute('data-bm', sumNum.join());
                back.style.color='#eceff1';
                back.style.pointerEvents='none';
                back.addEventListener("click", actBack, false);

                rowAct.appendChild(back);

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

                var indi = document.createElement("I");
                indi.className = "iconBH fa fa-info-circle btnOff";   
                indi.setAttribute('aria-hidden', 'true');
                indi.setAttribute('data-toggle', 'tooltip');
                indi.setAttribute('data-placement', 'right');
                indi.setAttribute('title', 'Indicador');
                indi.addEventListener("click", creaIndicador);

                rowAct.appendChild(indi);

                var observa = document.createElement("I");
                observa.className = "iconBH fa fa-eye btnOff";   
                observa.setAttribute('aria-hidden', 'true');
                observa.setAttribute('data-toggle', 'tooltip');
                observa.setAttribute('data-placement', 'right');
                observa.setAttribute('title', 'observaciones');
                switch (data[0][j].act_obs_edit) {
                  case 1:
                    observa.style.backgroundColor='#f48fb1';
                    observa.style.color='#000';
                    break;
                  case 2:
                    observa.style.backgroundColor='#f48fb1';
                    observa.style.color='#000';
                    break;
                  case 3:
                    observa.style.backgroundColor='#f48fb1';
                    observa.style.color='#000';
                    break;
                  case 4:
                    observa.style.backgroundColor='#c0ca33';
                    observa.style.color='#000';
                    break;
                  default:
                   observa.style.backgroundColor='#fff';
                } 
                observa.addEventListener("click", verObservaciones);

                rowAct.appendChild(observa);

                var del = document.createElement("I");
                del.className = "iconBH fa fa-trash delAct btnOff";   
                del.setAttribute('aria-hidden', 'true');
                del.setAttribute('data-toggle', 'tooltip');
                del.setAttribute('data-placement', 'right');
                del.setAttribute('title', 'Eliminar');
                del.addEventListener("click", removeActModal);

                rowAct.appendChild(del);

                act.appendChild(rowAct);
                act.style.backgroundColor='';


                document.getElementById('addAct').style.pointerEvents = '';
                document.getElementById('addAct').style.color = '';

                    break;
                  default:
                   console.log('hola')
                }

              ///////////////////////////////////////////////////////////////////////////////////////FIN REPROGRAMACION

                  

          }

          reCountAct();
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });

          
         sumTPM();
      }
    });

  }

/*************************************************************

  Funcionalidad: Limpia y reestablece los valores de los elemntos
  Parametros:
  Respuesta:

***************************************************************/

  function emptyPrograma(){
    document.getElementById('eProgramaEsp').disabled=true;
    document.getElementById('claveProEsp').textContent = '-- --';
    document.getElementById('objetivoProEsp').textContent = '----';
    document.getElementById('contActividades').innerHTML="";
    sumTPM();
  }

/*************************************************************

  Funcionalidad: Evalua los datos que conforman una actividad nueva, para su aprovacion
  Parametros: t
  Respuesta: alerta de error

***************************************************************/

  function onBtn(t){
         
      var nu = [];
      var me = [];
      for (var i = 0; i < t.parentNode.children[4].children.length; i++) {
        nu.push(Number(t.parentNode.children[4].children[i].textContent));
        isNaN(t.parentNode.children[4].children[i].textContent) || t.parentNode.children[4].children[i].textContent === '0' || t.parentNode.children[4].children[i].textContent === '' ? t.parentNode.children[4].children[i].textContent = "0" : me.push(t.parentNode.children[4].children[i].getAttribute('data-mes'));
      } 
      var programado = nu.reduce(sumArray);
      //console.log(nu);
      //isNaN(programado) ? (t.parentNode.querySelector('.item4').innerHTML='Ingrese solo numeros para la programación mensual',t.parentNode.querySelector('.item4').style.color="red") : (t.parentNode.querySelector('.item4').innerHTML=programado,t.parentNode.querySelector('.item4').style.color="");

      ///////////////////////////////////////////CHECAR PROMESAS Y ADAPTAR
      var actPromesa = new Promise( (resolve, reject) => {
          programado > 0 ? resolve('A') :reject('La Programación Mensual debe tener al menos un mes con un número distinto a 0.');
      })

      actPromesa
          .then( () => {
               return new Promise((resolve, reject) => {
                 t.parentNode.querySelector('.item3').textContent ? resolve() : reject('Ingrese una Unidad de Medida.');
              });
          })
          .then( () => {
              return new Promise((resolve, reject) => {
                t.parentNode.querySelector('.item2').textContent ? resolve() : reject('Ingrese una Descripción de la actividad.');
              });
          })
          .then( () => {
              return new Promise((resolve, reject) => {
                var btnOff = document.getElementsByClassName('btnOff');
                for (var i = 0; i < btnOff.length; i++) {
                    btnOff[i].style.pointerEvents = '';
                    btnOff[i].style.color = '';
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
                t.parentNode.querySelector('.btnBack').style.pointerEvents='none';
                t.parentNode.querySelector('.btnBack').style.color='#eceff1';
                
                
                ///////////////////////////////////////////////////////////////////////
                t.parentNode.classList.remove('newAct');

                ///////////////////////////////////////////////////////////////////////
                //console.log(programado);
                isNaN(programado) ? (t.parentNode.querySelector('.item4').innerHTML='Ingrese solo números para la programación mensual',t.parentNode.querySelector('.item4').style.color="red") : (t.parentNode.querySelector('.item4').innerHTML=programado,t.parentNode.querySelector('.item4').style.color="");
                
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
                ///////////////////////////////////////////////////////////////////////
                t.getAttribute('data-insert') == '1' ? insertactividad(t.parentNode) : t.setAttribute('data-insert','0');
                
                sumTPM();
              });
          })
          .catch( (err) => {
            //console.log(err)
              swal(err, "", "warning");
              //alert(err);
              t.setAttribute("data-edit", '1');
              t.classList.add('fa-check');
              t.classList.remove('fa-pencil-square-o');
              t.classList.remove('btnOff');
              t.style.color = "#fff";
              t.style.backgroundColor = "#EA0D94";
              t.setAttribute('data-original-title', 'Terminar la edición');
              //console.log('hola no');
          });


    }

/*************************************************************

  Funcionalidad: obtiene los datos ingresados para el registro de una actividad
  Parametros: t,token,ida,act,uni,ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic,pro,esp,can,ord,inif,terf,area,per
  Respuesta:

***************************************************************/

    function insertactividad(t){
      var act = t.querySelector('.item2').textContent;
      var uni = t.querySelector('.item3').textContent;
      var ene = t.querySelector('.allItemMes').children[0].textContent;
      var feb = t.querySelector('.allItemMes').children[1].textContent;
      var mar = t.querySelector('.allItemMes').children[2].textContent;
      var abr = t.querySelector('.allItemMes').children[3].textContent;
      var may = t.querySelector('.allItemMes').children[4].textContent;
      var jun = t.querySelector('.allItemMes').children[5].textContent;
      var jul = t.querySelector('.allItemMes').children[6].textContent;
      var ago = t.querySelector('.allItemMes').children[7].textContent;
      var sep = t.querySelector('.allItemMes').children[8].textContent;
      var oct = t.querySelector('.allItemMes').children[9].textContent;
      var nov = t.querySelector('.allItemMes').children[10].textContent;
      var dic = t.querySelector('.allItemMes').children[11].textContent;
      var ida = t.getAttribute('data-id');
      var can = t.querySelector('.item4').textContent;
      var ord = t.querySelector('.item1').textContent;
      var pro = document.getElementById('ePrograma').options[document.getElementById('ePrograma').selectedIndex].value;
      var esp = document.getElementById('eProgramaEsp').options[document.getElementById('eProgramaEsp').selectedIndex].value;
      var ini = t.querySelector('.item5').textContent;
      var ter = t.querySelector('.item6').textContent;
      var inif = ini.toUpperCase();
      var terf = ter.toUpperCase();
      var area = document.getElementById('eunidad').textContent;

      var mesco = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];
      var mi = mesco.indexOf(ini);
      var mt = mesco.indexOf(ter);
      var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
      var per = meses[mi]+' - '+meses[mt]+' 2020';
      //console.log(per);
      $.ajax({
             type:'POST',
             url:"sendactividad",
             data:{
              "_token": token,ida:ida,act:act,uni:uni,ene:ene,feb:feb,mar:mar,abr:abr,may:may,jun:jun,jul:jul,ago:ago,sep:sep,oct:oct,nov:nov,dic:dic,pro:pro,esp:esp,can:can,ord:ord,ini:inif,ter:terf,area:area,per:per},
             success:function(data){ 
              //console.log(data[1]);
                t.setAttribute('data-id',data[0].id);
                t.setAttribute('id','act'+data[0].id);
                t.querySelector('.btnBack').setAttribute('data-ba',data[0].descactividad);
                t.querySelector('.btnBack').setAttribute('data-bu',data[0].unidadmedida);
                t.querySelector('.btnBack').setAttribute('data-bm',data[1].enep+','+data[1].febp+','+data[1].marp+','+data[1].abrp+','+data[1].mayp+','+data[1].junp+','+data[1].julp+','+data[1].agop+','+data[1].sepp+','+data[1].octp+','+data[1].novp+','+data[1].dicp);
                t.children[7].setAttribute('data-insert','0');
            }
          });
    }

/*************************************************************

  Funcionalidad: Suma un array
  Parametros: total, num
  Respuesta:
  
***************************************************************/

        function sumArray(total, num) {
          return total + num;
        }

/*************************************************************

  Funcionalidad: Se habilitan los elementos para la edicion de la actividad
  Parametros: t
  Respuesta:
  
***************************************************************/

        function offBtn(t){
          var btnOff = document.getElementsByClassName('btnOff');
          for (var i = 0; i < btnOff.length; i++) {
              btnOff[i].style.pointerEvents = 'none';
              btnOff[i].style.color = '#eceff1';
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

/*************************************************************

  Funcionalidad: Valida los valores sean solo numeros
  Parametros: contenido del elemento
  Respuesta:
  
***************************************************************/

var numericos = document.getElementsByClassName("numerico");


for (var i = 0; i < numericos.length; i++) {
  numericos[i].addEventListener("keyup", validaNumeros, false);
}

function validaNumeros() {
  //console.log(this.textContent[1]);
  //|| this.textContent[0] == 0
  this.textContent.length > 2 ? this.textContent = this.textContent.substring(0, this.textContent.length - 1):'';
  /^\d*$/.test(this.textContent) ? '' : this.textContent="0";
  //this.textContent ? '' : this.textContent="0";
}

/*************************************************************

  Funcionalidad: suma los valores obtenidos de todas las actividades
  Parametros: 
  Respuesta: Establece los valores apartir de los datos tratados

***************************************************************/

function sumTPM(){
  //console.log('hola sumTPM');
  var tpm = document.getElementsByClassName("item4");
  //console.log(tpm);
  var tpmArr = [];
  for (var i = 0; i < tpm.length; i++) {
    tpmArr.push(Number(tpm[i].textContent));
  } 
  var tpmResult;
  tpm.length == 0 ? tpmResult=tpm.length : tpmResult = tpmArr.reduce(sumArray);
  document.getElementById('resultTPM')?document.getElementById('resultTPM').textContent=tpmResult:'';


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
  document.getElementById('r1M0')?document.getElementById('r1M0').textContent=am0:'';

  allMES.length == 0 ? am1 = allMES.length : am1 = m1.reduce(sumArray);
  document.getElementById('r1M1')?document.getElementById('r1M1').textContent=am1:'';

  allMES.length == 0 ? am2 = allMES.length : am2 = m2.reduce(sumArray);
  document.getElementById('r1M2')?document.getElementById('r1M2').textContent=am2:'';

  allMES.length == 0 ? am3 = allMES.length : am3 = m3.reduce(sumArray);
  document.getElementById('r1M3')?document.getElementById('r1M3').textContent=am3:'';

  allMES.length == 0 ? am4 = allMES.length : am4 = m4.reduce(sumArray);
  document.getElementById('r1M4')?document.getElementById('r1M4').textContent=am4:'';

  allMES.length == 0 ? am5 = allMES.length : am5 = m5.reduce(sumArray);
  document.getElementById('r1M5')?document.getElementById('r1M5').textContent=am5:'';

  allMES.length == 0 ? am6 = allMES.length : am6 = m6.reduce(sumArray);
  document.getElementById('r1M6')?document.getElementById('r1M6').textContent=am6:'';

  allMES.length == 0 ? am7 = allMES.length : am7 = m7.reduce(sumArray);
  document.getElementById('r1M7')?document.getElementById('r1M7').textContent=am7:'';

  allMES.length == 0 ? am8 = allMES.length : am8 = m8.reduce(sumArray);
  document.getElementById('r1M8')?document.getElementById('r1M8').textContent=am8:'';

  allMES.length == 0 ? am9 = allMES.length : am9 = m9.reduce(sumArray);
  document.getElementById('r1M9')?document.getElementById('r1M9').textContent=am9:'';

  allMES.length == 0 ? am10 = allMES.length : am10 = m10.reduce(sumArray);
  document.getElementById('r1M10')?document.getElementById('r1M10').textContent=am10:'';

  allMES.length == 0 ? am11 = allMES.length : am11 = m11.reduce(sumArray);
  document.getElementById('r1M11')?document.getElementById('r1M11').textContent=am11:'';


  //////////////////////////////////////////////////////////////////////
  var m20;
  var m21;
  var m22;
  var m23;
  var m24;
  var m25;
  var m26;
  var m27;
  var m28;
  var m29;
  var m210;
  var m211;
  
  document.getElementById('r1M0')?m20 = Number(document.getElementById('r1M0').textContent):'';
  document.getElementById('r1M1')?m21 = Number(document.getElementById('r1M1').textContent):'';
  document.getElementById('r1M2')?m22 = Number(document.getElementById('r1M2').textContent):'';
  document.getElementById('r1M3')?m23 = Number(document.getElementById('r1M3').textContent):'';
  document.getElementById('r1M4')?m24 = Number(document.getElementById('r1M4').textContent):'';
  document.getElementById('r1M5')?m25 = Number(document.getElementById('r1M5').textContent):'';
  document.getElementById('r1M6')?m26 = Number(document.getElementById('r1M6').textContent):'';
  document.getElementById('r1M7')?m27 = Number(document.getElementById('r1M7').textContent):'';
  document.getElementById('r1M8')?m28 = Number(document.getElementById('r1M8').textContent):'';
  document.getElementById('r1M9')?m29 = Number(document.getElementById('r1M9').textContent):'';
  document.getElementById('r1M10')?m210 = Number(document.getElementById('r1M10').textContent):'';
  document.getElementById('r1M11')?m211 = Number(document.getElementById('r1M11').textContent):'';

  document.getElementById('r2M0')?document.getElementById('r2M0').textContent=am0:'';
  document.getElementById('r2M1')?document.getElementById('r2M1').textContent=m20+m21:'';
  document.getElementById('r2M2')?document.getElementById('r2M2').textContent=m20+m21+m22:'';
  document.getElementById('r2M3')?document.getElementById('r2M3').textContent=m20+m21+m22+m23:'';
  document.getElementById('r2M4')?document.getElementById('r2M4').textContent=m20+m21+m22+m23+m24:'';
  document.getElementById('r2M5')?document.getElementById('r2M5').textContent=m20+m21+m22+m23+m24+m25:'';
  document.getElementById('r2M6')?document.getElementById('r2M6').textContent=m20+m21+m22+m23+m24+m25+m26:'';
  document.getElementById('r2M7')?document.getElementById('r2M7').textContent=m20+m21+m22+m23+m24+m25+m26+m27:'';
  document.getElementById('r2M8')?document.getElementById('r2M8').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28:'';
  document.getElementById('r2M9')?document.getElementById('r2M9').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28+m29:'';
  document.getElementById('r2M10')?document.getElementById('r2M10').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210:'';
  document.getElementById('r2M11')?document.getElementById('r2M11').textContent=m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210+m211:'';

  /////////////////////////////////////////////////////////////////////////
  tpmResult == 0 ? tpmResult = 1 : '';
  document.getElementById('r3M0')?document.getElementById('r3M0').textContent=((am0/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M1')?document.getElementById('r3M1').textContent=((am1/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M2')?document.getElementById('r3M2').textContent=((am2/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M3')?document.getElementById('r3M3').textContent=((am3/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M4')?document.getElementById('r3M4').textContent=((am4/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M5')?document.getElementById('r3M5').textContent=((am5/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M6')?document.getElementById('r3M6').textContent=((am6/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M7')?document.getElementById('r3M7').textContent=((am7/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M8')?document.getElementById('r3M8').textContent=((am8/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M9')?document.getElementById('r3M9').textContent=((am9/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M10')?document.getElementById('r3M10').textContent=((am10/tpmResult)*100).toFixed(2):'';
  document.getElementById('r3M11')?document.getElementById('r3M11').textContent=((am11/tpmResult)*100).toFixed(2):'';

  /////////////////////////////////////////////////////////////////////////
  document.getElementById('r4M0')?document.getElementById('r4M0').textContent=((am0/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M1')?document.getElementById('r4M1').textContent=(((m20+m21)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M2')?document.getElementById('r4M2').textContent=(((m20+m21+m22)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M3')?document.getElementById('r4M3').textContent=(((m20+m21+m22+m23)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M4')?document.getElementById('r4M4').textContent=(((m20+m21+m22+m23+m24)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M5')?document.getElementById('r4M5').textContent=(((m20+m21+m22+m23+m24+m25)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M6')?document.getElementById('r4M6').textContent=(((m20+m21+m22+m23+m24+m25+m26)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M7')?document.getElementById('r4M7').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M8')?document.getElementById('r4M8').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M9')?document.getElementById('r4M9').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28+m29)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M10')?document.getElementById('r4M10').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210)/tpmResult)*100).toFixed(2):'';
  document.getElementById('r4M11')?document.getElementById('r4M11').textContent=(((m20+m21+m22+m23+m24+m25+m26+m27+m28+m29+m210+m211)/tpmResult)*100).toFixed(2):'';

}

sumTPM();

/*************************************************************

  Funcionalidad: crea un formulario para su envio
  Parametros: Datos del formulario
  Respuesta: crea un documento pdf

***************************************************************/

document.getElementById('pdfela')?document.getElementById('pdfela').addEventListener('click',pdfelaboracion,false):'';
function pdfelaboracion() {
  var urlPdf;
  $('meta[name="app-prefix"]').attr('content') == 'http://sipseiv2.test' ? urlPdf='/' : urlPdf='/sipseiv2/';
  const form = document.createElement('form');
  form.method = 'GET';
  form.action = urlPdf+'pdfelaboracion';
  form.target = '_blank';
  form.style.display='none';

  var ip1 = document.createElement('input');
  ip1.name = '_token';
  ip1.value = token;
  form.appendChild(ip1);


  var unidadtit = document.getElementById('eunidad').textContent;
  var pro = document.getElementById('ePrograma').options[document.getElementById('ePrograma').selectedIndex].velue;
  var esp = document.getElementById('eProgramaEsp').options[document.getElementById('eProgramaEsp').selectedIndex].value;

  var protext = document.getElementById('ePrograma').options[document.getElementById('ePrograma').selectedIndex].textContent;
  var esptext = document.getElementById('eProgramaEsp').options[document.getElementById('eProgramaEsp').selectedIndex].textContent;


  var ip2 = document.createElement('input');
  ip2.name = 'programa';
  ip2.value = pro;
  form.appendChild(ip2);

  var ip3 = document.createElement('input');
  ip3.name = 'progesp';
  ip3.value = esp;
  form.appendChild(ip3);

  var ip4 = document.createElement('input');
  ip4.name = 'result';
  ip4.value = document.getElementById('resultTPM').textContent;
  form.appendChild(ip4);

  var ip5 = document.createElement('input');
  ip5.name = 'clave';
  ip5.value = document.getElementById('claveProEsp').textContent;
  form.appendChild(ip5);

  var ip6 = document.createElement('input');
  ip6.name = 'objetivo';
  ip6.value = document.getElementById('objetivoProEsp').textContent;
  form.appendChild(ip6);

  var ip7 = document.createElement('input');
  ip7.name = 'unidadtit';
  ip7.value = unidadtit;
  form.appendChild(ip7);

  var ip8 = document.createElement('input');
  ip8.name = 'protext';
  ip8.value = protext;
  form.appendChild(ip8);

  var ip9 = document.createElement('input');
  ip9.name = 'esptext';
  ip9.value = esptext;
  form.appendChild(ip9);

  for (var i = 0; i < 12; i++) {
    var ipd = document.createElement('input');
    ipd.name = 'r1M'+[i];
    ipd.value = document.getElementById('r1M'+[i]).textContent;
    form.appendChild(ipd);

    var ipd2 = document.createElement('input');
    ipd2.name = 'r2M'+[i];
    ipd2.value = document.getElementById('r2M'+[i]).textContent;
    form.appendChild(ipd2);

    var ipd3 = document.createElement('input');
    ipd3.name = 'r3M'+[i];
    ipd3.value = document.getElementById('r3M'+[i]).textContent;
    form.appendChild(ipd3);

    var ipd4 = document.createElement('input');
    ipd4.name = 'r4M'+[i];
    ipd4.value = document.getElementById('r4M'+[i]).textContent;
    form.appendChild(ipd4);
  }
  
  
  document.body.append(form);
  form.submit();
}



