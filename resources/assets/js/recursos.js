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
          na.length == 0 ? agregaActividad() : swal('Tiene una actividad sin Finalizar', "", "warning");
        }


        function agregaActividad() {

          var rowAct = document.createElement("DIV");
          rowAct.className = "row rowAct newAct";
          rowAct.setAttribute('data-id', '0') 

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

          var del = document.createElement("I");
          del.className = "iconBH fa fa-trash delAct";   
          del.setAttribute('aria-hidden', 'true');
          del.setAttribute('data-toggle', 'tooltip');
          del.setAttribute('data-placement', 'right');
          del.setAttribute('title', 'Eliminar');
          del.addEventListener("click", removeAct);

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
        //////////////////////////////////////////////////////////////////////
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

        function moveUp(e) {
          if(e.target.parentNode.previousElementSibling)
            e.target.parentNode.parentNode.insertBefore(e.target.parentNode, e.target.parentNode.previousElementSibling);
          reCountAct();
          insertNum();
        }
        function moveDown(e) {
          if(e.target.parentNode.nextElementSibling)
            e.target.parentNode.parentNode.insertBefore(e.target.parentNode.nextElementSibling, e.target.parentNode);
          reCountAct();
          insertNum();
        }

        //////////////////////////////////////////////////////////////////////
        var delActDoc = document.getElementsByClassName('delAct');

        for (var i = 0; i < delActDoc.length; i++) {
            delActDoc[i].addEventListener("click", removeAct, false);
        }

        var backAct = document.getElementsByClassName('btnBack');

        for (var i = 0; i < backAct.length; i++) {
            backAct[i].addEventListener("click", actBack, false);
        }

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
          sumTPM();
        }

        function btnBackReset(t){
          t.style.pointerEvents = "none";
          t.style.color = "#eceff1";
        }

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

        function removeAct() {

          var idDel = this.parentNode.getAttribute('data-id');
          this.parentNode.remove();
          $('.tooltip').tooltip('hide');

          $.ajax({
             type:'POST',
             url:"deleteactividad",
             data:{"_token": token,data:idDel},
             success:function(data){ 
                reCountAct();
                sumTPM();
                var btnOff = document.getElementsByClassName('btnOff');
                for (var i = 0; i < btnOff.length; i++) {
                    btnOff[i].style.pointerEvents = '';
                    btnOff[i].style.color = '';
                }
                insertNum();
            }
          });
          
        }
        //////////////////////////////////////////////////////////////////////
        function reCountAct() {
          var numAct = document.getElementsByClassName('rowAct');
          for (var i = 0; i < numAct.length; i++) {
            numAct[i].querySelector('.item1').innerHTML = i+1;
          }
        }
        //////////////////////////////////////////////////////////////////////
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

        function backEnable(){
            this.parentNode.classList.contains("allItemMes") ? 
            (this.parentNode.parentNode.querySelector('.btnBack').style.pointerEvents='',
            this.parentNode.parentNode.querySelector('.btnBack').style.color='#546e7a')
            :
            (this.parentNode.querySelector('.btnBack').style.pointerEvents='',
            this.parentNode.querySelector('.btnBack').style.color='#546e7a');
            
            this.classList.contains('itemMes') ? this.parentNode.parentNode.querySelector('.resetBack').setAttribute('data-insert','1') : this.parentNode.querySelector('.resetBack').setAttribute('data-insert','1');        
        }

   document.getElementById('ePrograma').addEventListener("change", changePro, false);  
   
  function changePro(){
    var pro = this.options[this.selectedIndex].value;
    pro == '0' ? document.getElementById('eProgramaEsp').disabled=true : getProEsp(pro);
  }

  function getProEsp(pro){
    document.getElementById("eProgramaEsp").innerHTML='<option value="0">Seleccione un programa</option>';
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

  document.getElementById('eProgramaEsp').addEventListener("change", changeProEsp, false); 

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
            itemMes1.addEventListener("keyup", validaNumeros, false);
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

          var del = document.createElement("I");
          del.className = "iconBH fa fa-trash delAct";   
          del.setAttribute('aria-hidden', 'true');
          del.setAttribute('data-toggle', 'tooltip');
          del.setAttribute('data-placement', 'right');
          del.setAttribute('title', 'Eliminar');
          del.addEventListener("click", removeAct);

          rowAct.appendChild(del);

          act.appendChild(rowAct);
          act.style.backgroundColor='';  

          }

          reCountAct();
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });

          document.getElementById('addAct').style.pointerEvents = '';
          document.getElementById('addAct').style.color = '';
         sumTPM();
      }
    });

  }

  function emptyPrograma(){
    document.getElementById('eProgramaEsp').disabled=true;
    document.getElementById('claveProEsp').textContent = '-- --';
    document.getElementById('objetivoProEsp').textContent = '----';
    document.getElementById('contActividades').innerHTML="";
    sumTPM();
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
          programado > 0 ? resolve('A') :reject('La Programación Mensual deve tener almenos un mes con un numero distinto a 0.');
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
                t.getAttribute('data-insert') == '1' ? insertactividad(t.parentNode) : t.setAttribute('data-insert','0');
                ;
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
          });


    }

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

      $.ajax({
             type:'POST',
             url:"sendactividad",
             data:{
              "_token": token,ida:ida,act:act,uni:uni,ene:ene,feb:feb,mar:mar,abr:abr,may:may,jun:jun,jul:jul,ago:ago,sep:sep,oct:oct,nov:nov,dic:dic,pro:pro,esp:esp,can:can,ord:ord,ini:inif,ter:terf},
             success:function(data){ 
                t.setAttribute('data-id',data[0].id);
                t.children[7].setAttribute('data-insert','0');
            }
          });
    }

        function sumArray(total, num) {
          return total + num;
        }

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
  //console.log(tpm);
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
  tpmResult == 0 ? tpmResult = 1 : '';
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

//////////////////////////////////////////////////////////////////////
document.getElementById('pdfela').addEventListener('click',pdfelaboracion,false);
function pdfelaboracion() {
  const form = document.createElement('form');
  form.method = 'POST';
  form.action = 'http://sipseiv2.test/pdfelaboracion';
  form.target = '_blank';
  form.style.display='none';

  var ip1 = document.createElement('input');
  ip1.name = '_token';
  ip1.value = token;
  form.appendChild(ip1);

  var pro = document.getElementById('ePrograma').options[document.getElementById('ePrograma').selectedIndex].value;
  var esp = document.getElementById('eProgramaEsp').options[document.getElementById('eProgramaEsp').selectedIndex].value;


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



