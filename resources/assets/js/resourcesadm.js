$(function() {


  $('#btnGuardarInfo_admin').hide();
  $('#btnReporteMensual_admin').hide();
  var _prefix_url =  $('meta[name="app-prefix"]').attr('content'); //Se genera un prefijo con el nombre de la carpeta en donde este almacenada la aplicación
    if(_prefix_url != ""){
      _prefix_url = "../"+_prefix_url;
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
    $('#btnReporteMensual_admin').hide();    
    
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
        $('#programareporte').val(programa);
      });

      document.getElementById('programaEsp_admin').setAttribute('data-error', '1');
      document.getElementById('actividades_admin').setAttribute('data-error', '1');
      disabledBTN();
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
    $('#btnReporteMensual_admin').hide();
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
          var reprogramacion = value['reprogramacion'];
          if(reprogramacion == 0)
            comboActividades += "<option value='"+value['autoactividades']+"'>"+ cadena +"</option>";
          else
          {
            if (reprogramacion == 1)
              comboActividades += "<option class='actcambio' value='"+value['autoactividades']+"'>"+ cadena +"</option>";          
            else
            {
              if (reprogramacion == 2)
                comboActividades += "<option class='actnueva' value='"+value['autoactividades']+"'>"+ cadena +"</option>";          
              else
              {
                if ((reprogramacion == 3) || (reprogramacion == 4))
                  comboActividades += "<option class='actborrada' value='"+value['autoactividades']+"'>"+ cadena +"</option>";                
              }
            }
          }
        }); //Each

        $('#actividades_admin').html(comboActividades);
        $('#programaespreporte').val(programaEsp);        
      }); //Done
      document.getElementById('actividades_admin').setAttribute('data-error', '1');
      disabledBTN();
  });


  //Generación de tabla y textareas de actividad, soporte, observaciones
  $("#actividades_admin").change(function()
  {
    $('#btnGuardarInfo_admin').hide();
    $('#btnReporteMensual_admin').hide();

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
        //console.log(realizado[mes]);
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
        $('#btnReporteMensual_admin').show();
      });
    
  }); //Fin de codigo actividades

  $("#mes_admin").change(function()  
  {  
    $('#btnGuardarInfo_admin').hide();
    $('#btnReporteMensual_admin').hide();    
    $('#programa_admin').val('0');    
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
    $('#btnReporteMensual_admin').hide();  

    $('#mesreporte').val($('#mes_admin').find(':selected').val());

    document.getElementById('programa_admin').setAttribute('data-error', '1');
    document.getElementById('programaEsp_admin').setAttribute('data-error', '1');
    document.getElementById('actividades_admin').setAttribute('data-error', '1');
    disabledBTN();
  });

  $("#area_admin").change(function()  
  {  
    $('#btnGuardarInfo_admin').hide();
    $('#btnReporteMensual_admin').hide();    
    $('#programa_admin').val('0');
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
    $('#btnReporteMensual_admin').hide();  

    $('#areareporte').val($('#area_admin').find(':selected').val());

    document.getElementById('programa_admin').setAttribute('data-error', '1');
    document.getElementById('programaEsp_admin').setAttribute('data-error', '1');
    document.getElementById('actividades_admin').setAttribute('data-error', '1');
    disabledBTN();
  });


  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  $("#area_trim").change(function()  
  {  
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    $('#programa_trim').val('0');
    $('#programaEsp_trim').html('');    
    $('#trimestre_trim').val('0');
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();  

    $('#areareporte').val($('#area_trim').find(':selected').val());

    document.getElementById('programa_trim').setAttribute('data-error', '1');
    document.getElementById('trimestre_trim').setAttribute('data-error', '1');
    disabledBTN();
  });

  $("#programa_trim").change(function()
  {    
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
    $('#programaEsp_trim').html('');
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    
    var area = $('#area_trim').find(':selected').val();
    var programa = $('#programa_trim').find(':selected').val();
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
        $('#programaEsp_trim').html(comboProgramaEsp);      
        $('#programareporte').val(programa);
      });
      document.getElementById('programaEsp_trim').setAttribute('data-error', '1');
      disabledBTN();
  });

  $("#programaEsp_trim").change(function()
  {  
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
  });

  $("#trimestre_trim").change(function()
  {  
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
  });


  $("#mes_trim").change(function()  
  {  
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    $('#programa_trim').val('0');    
    $('#programaEsp_trim').html('');    
    $('#trimestre_trim').val('0');
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();  

    $('#mesreporte').val($('#mes_trim').find(':selected').val());
  });


  $.ajaxSetup({      
    headers: { 
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });


  $('.observatrim').editable(_prefix_url+'/admin/guardarObsTrim',
  {     
    type : 'textarea',
    submitdata: { _method: "put" },
    select : true,
    cancel    : 'Cancelar',
    submit    : 'Guardar',
    rows: 4,
    cols: 20,
    onblur    : "ignore",    
    indicator : "<img src='/images/guardar.gif'>",
    tooltip   : "Clic para Modificar"
  });




    document.getElementById("mes_admin").onchange = function(){
      document.getElementById('mesActual').innerHTML = '';
      var mesc = document.getElementsByClassName('mesColor');
      for (var i = 0; i < mesc.length; i++) {
        mesc[i].style.background = "#fff";
        mesc[i].style.color = "#333";
      }
      var x = this.options[this.selectedIndex].text;
      document.getElementById('mesActual').innerHTML = x;
      var mesx = document.getElementsByClassName('mes'+x)[0];
      var mesy = document.getElementsByClassName('mes'+x)[1];

      mesx.style.background = "#546e7a";
      mesx.style.color = "#fff";
      mesy.style.backgroundColor = "#546e7a";
      mesy.style.color = "#fff";
    };


});

 $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

document.getElementById("iconAlert").addEventListener("click", hiddenAlerta);
        function hiddenAlerta () {
            $.ajax({
             type:'POST',
             url:"../clickalertas",
             success:function(data){ 
                //console.log(data);
                document.getElementById('campanaAlert').classList.add("hidden");
            }
          });
        }

        document.getElementById("iconAlertfin").addEventListener("click", hiddenAlertafin);
        function hiddenAlertafin () {
            $.ajax({
             type:'POST',
             url:"../clickalertasfin",
             success:function(data){ 
                //console.log(data);
                document.getElementById('campanaAlertfin').classList.add("hidden");
            }
          });
        }

document.getElementById("buscarMes").addEventListener("click", busquedames);
        function busquedames () {

          document.getElementById("loader").classList.remove('hidden');
          var mes = document.getElementById('mesbusqueda').value;
          var acr = document.getElementById('acronimo').value;
          //console.log(mes,acr);

          $.ajax({
               type:'POST',
               url:"../buscarmes",
               data:{mes:mes,acr:acr},
               success:function(data){ 
                //console.log(data)

                  document.getElementById('resultMes').innerHTML ='';
                  if (data[0].length>0) {

                  document.getElementById('resultMes').innerHTML ='<tr><th>Unidad</th><th>Acronimo</th><th>Programa</th><th>Actividad</th><th>Fecha</th></tr>';

                    for (var i = 0; i < data[0].length; i++) {
                      var x = document.createElement("TR");
                      document.getElementById('resultMes').appendChild(x);
                      //data[0][i].created_at
                      var d = new Date(data[0][i].created_at);
                      x.innerHTML='<td>'+data[0][i].ale_actividad+'</td><td>'+data[0][i].ale_acronimo+'</td><td>---</td><td>---</td><td>'+d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear()+'</th>';
                    }

                  } else {
                     document.getElementById('resultMes').innerHTML ='<tr><th>No se encontraron resultados</th></tr>';
                  }

                  document.getElementById("loader").classList.add('hidden');
              }
          });
          
        }

        document.getElementById("buscarEntre").addEventListener("click", busquedaentre);
        function busquedaentre () {

          document.getElementById("loader").classList.remove('hidden');
          var datep = document.getElementById('datep').value;
          var dates = document.getElementById('dates').value;
          var acr = document.getElementById('acronimoentre').value;
          //console.log(datep,dates,acr);

          $.ajax({
               type:'POST',
               url:"../buscaentre",
               data:{datep:datep,dates:dates,acr:acr},
               success:function(data){ 

                //console.log(data)
                  document.getElementById('resultEntre').innerHTML ='';
                  if (data[0].length>0) {

                  document.getElementById('resultEntre').innerHTML ='<tr><th>Unidad</th><th>Acronimo</th><th>Programa</th><th>Actividad</th><th>Fecha</th></tr>';

                    for (var i = 0; i < data[0].length; i++) {
                      var x = document.createElement("TR");
                      document.getElementById('resultEntre').appendChild(x);
                      var d = new Date(data[0][i].created_at);
                      x.innerHTML='<td class="'+data[0][i].ale_tiempo+'">'+data[0][i].ale_actividad+'</td><td>'+data[0][i].ale_acronimo+'</td><td>'+data[0][i].ale_id_programa+'</td><td>'+data[0][i].ale_num_actividad+'</td><td>'+ d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear() +'</th>';
                    }

                  } else {
                     document.getElementById('resultEntre').innerHTML ='<tr><th>No se encontraron resultados</th></tr>';
                  }

                  document.getElementById("loader").classList.add('hidden');
              }
          });
          
        }

         document.getElementById("datep").addEventListener("change", changedatep);
        function changedatep (){
          var datep = document.getElementById('datep').value;
          document.getElementById('dates').setAttribute("min", datep);
          document.getElementById('dates').disabled = false;
        }
        document.getElementById("dates").addEventListener("change", changedates);
        function changedates(){
          document.getElementById('buscarEntre').disabled = false;
        }