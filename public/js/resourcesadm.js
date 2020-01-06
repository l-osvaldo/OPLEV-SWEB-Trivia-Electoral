$(function() {


  $('#btnGuardarInfo_admin').hide();
  $('#btnReporteMensual_admin').hide();


/*************************************************************

  Funcionalidad: Se genera un prefijo con el nombre de la carpeta en donde este almacenada la aplicación
  Parametros: Contenido de elemento
  Respuesta: Define una variable

***************************************************************/
  var _prefix_url;
  $('meta[name="app-prefix"]').attr('content') == 'http://sipseiv2.test' ? _prefix_url='/' : _prefix_url='./';

/*************************************************************

  Funcionalidad: No permite el ingreso de caracteres
  Parametros: Evento del elemento
  Respuesta: 

***************************************************************/

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

/*************************************************************

  Funcionalidad: Limpia el contenido del elemento
  Parametros: 
  Respuesta: 

***************************************************************/

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

/*************************************************************

  Funcionalidad: Recarga los contenidos de los elemntos y obtiene los parametros requeridos
  Parametros: area, programa
  Respuesta: Crea el listado de los programas especificos

***************************************************************/

  $("#programa_admin").change(function()
  {    
    $('#programaEsp_admin').html('<option value="0">Programa Específico...</option>');    
    $('#objetivo_admin').html('');
    $('#actividades_admin').html('<option value="0">Seleccione la actividad</option>');     
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

    //console.log(_prefix_url);

    $.ajax({
      url: _prefix_url+"obtenProgramaEspAdmin",
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

      $('#programaEsp_admin').attr('data-error', '1');
      $('#actividades_admin').attr('data-error', '1');
      disabledBTN();
  });

/*************************************************************

  Funcionalidad: Obtiene el objetivos 
  Parametros: area, programa, programaEsp
  Respuesta: Coloca en la vista el objetivo del programa especifico

***************************************************************/

  function obtenObjetivos(area, programa, programaEsp) {
    //Obtener objetivo de la actividad
    $.ajax({
     url: _prefix_url+"admin/obtenObjetivoAct",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: 'GET',
      data: {area: area, programa: programa, programaEsp: programaEsp},
      dataType: 'json',
      contentType: 'application/json'
      }).done(function(response) {
        $('#objetivo_admin').html(response[0]['objprogramaesp']);
    });
  }

/*************************************************************

  Funcionalidad: Obtiene el objetivo del programa especifico 
  Parametros: area, programa, programaEsp
  Respuesta: Coloca en la vista el objetivo del programa especifico

***************************************************************/

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

     //console.log(_prefix_url);
    //Obtener actividades
    $.ajax({
     url: _prefix_url+"admin/obtenActividades",
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
      $('#actividades_admin').attr('data-error', '1');
      disabledBTN();
  });

/*************************************************************

  Funcionalidad: Generación de tabla y textareas de actividad, soporte, observaciones
  Parametros: idActividad: idActividad
  Respuesta: Crea la tabla de actividades por mes

***************************************************************/

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
     url: _prefix_url+"admin/obtenPorcProgramado",
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
     url: _prefix_url+"admin/obtenPorcRealizado",
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
     url: _prefix_url+"admin/obtenDetallesActi",
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

/*************************************************************

  Funcionalidad: Cambia los datos de la lista de opciones
  Parametros: 
  Respuesta: Pone la lista de nuevas opciones

***************************************************************/

  $("#mes_admin").change(function()  
  {  
    $('#btnGuardarInfo_admin').hide();
    $('#btnReporteMensual_admin').hide();    
    $('#programa_admin').val('0');    
    $('#programaEsp_admin').html('<option value="0">Programa Específico...</option>');    
    $('#objetivo_admin').html('');
    $('#actividades_admin').html('<option value="0">Seleccione la actividad</option>');     
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

    $('programa_admin').attr('data-error', '1');
    $('programaEsp_admin').attr('data-error', '1');
    $('actividades_admin').attr('data-error', '1');
    disabledBTN();
  });

/*************************************************************

  Funcionalidad: Cambia los datos de la lista de opciones
  Parametros: 
  Respuesta: Pone la lista de nuevas opciones

***************************************************************/

  $("#area_admin").change(function()  
  {  
    $('#btnGuardarInfo_admin').hide();
    $('#btnReporteMensual_admin').hide();    
    $('#programa_admin').val('0');
    $('#programaEsp_admin').html('<option value="0">Programa Específico...</option>');    
    $('#objetivo_admin').html('');
    $('#actividades_admin').html('<option value="0">Seleccione la actividad</option>');     
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

    $('programa_admin').attr('data-error', '1');
    $('programaEsp_admin').attr('data-error', '1');
    $('actividades_admin').attr('data-error', '1');
    disabledBTN();
  });


  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //
  // ------- _formtrim  ------- //

/*************************************************************

  Funcionalidad: Cambia los datos de la lista de opciones
  Parametros: 
  Respuesta: Pone la lista de nuevas opciones

***************************************************************/
  $("#area_trim").change(function()  
  {  
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    $('#programa_trim').val('0');
    $('#programa_trima').val('0');
    $('#programaEsp_trim').html("<option value='0'>Programa Específico...</option>");    
    $('#trimestre_trim').val('0');
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();  

    $('#areareporte').val($('#area_trim').find(':selected').val());

    $('#programa_trim').attr('data-error', '1');
    $('#programa_trima').attr('data-error', '1');
    $('#trimestre_trim').attr('data-error', '1');
    disabledBTN();
  });

/*************************************************************

  Funcionalidad: Cambia los datos de la lista de opciones
  Parametros: area, programa
  Respuesta: crea un combo de opciones con los balores solicitados

***************************************************************/

  $("#programa_trim").change(function()
  {    
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
    $('#programaEsp_trim').html("<option value='0'>Programa Específico...</option>");
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    var area = $('#area_trim').find(':selected').val();
    var programa = $('#programa_trim').find(':selected').val();
    var comboProgramaEsp = '';
    $.ajax({
      url:  _prefix_url+"obtenProgramaEspAdmin",
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
      $('#programaEsp_trim').attr('data-error', '1');
      disabledBTN();
  });

/*************************************************************

  Funcionalidad: Cambia los datos de la lista de opciones
  Parametros: area, programa
  Respuesta: crea un combo de opciones con los balores solicitados

***************************************************************/

  $("#programa_trima").change(function()
  {    
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
    $('#programaEsp_trim').html("<option value='0'>Programa Específico...</option>");
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    var area = $('#area_trim').find(':selected').val();
    var programa = $('#programa_trima').find(':selected').val();
    var comboProgramaEsp = '';
    $.ajax({
      url:  _prefix_url+"obtenProgramaEspAdmin",
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
      $('#programaEsp_trim').attr('data-error', '1');
      disabledBTN();
  });

/*************************************************************

  Funcionalidad: Limpia y oculta los elementos
  Parametros: 
  Respuesta: 

***************************************************************/

  $("#programaEsp_trim").change(function()
  {  
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
  });

/*************************************************************

  Funcionalidad: Limpia y oculta los elementos
  Parametros: 
  Respuesta: 

***************************************************************/

  $("#trimestre_trim").change(function()
  {  
    $('#tablaresultados').html('');    
    $('#btnReporteTrimestral').hide();    
  });

/*************************************************************

  Funcionalidad: Resetea y oculta los elementos
  Parametros: 
  Respuesta: 

***************************************************************/

  $("#mes_trim").change(function()  
  {  
    $('#btnGuardarInfo_trim').hide();
    $('#btnReporteMensual_trim').hide();    
    $('#programa_trim').val('0'); 
    $('#programa_trima').val('0');    
    $('#programaEsp_trim').html("<option value='0'>Programa Específico...</option>");    
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


/*************************************************************

  Funcionalidad:
  Parametros: 
  Respuesta: 

***************************************************************/


  $('.observatrim').editable(_prefix_url+'admin/guardarObsTrim',
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


/*************************************************************

  Funcionalidad: Obtiene el mes seleccionado y lo remarca en color
  Parametros: 
  Respuesta: 

***************************************************************/

      $("#mes_admin").change(function()  
  {  
      if (document.getElementById('mesActual')) {
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
     }
    });


});



var token = $('meta[name="csrf-token"]').attr('content');

 $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

/*************************************************************

  Funcionalidad: Al obtener el evento click delelemento, envia una peticion para editar los registros en la BD.
  Parametros: token
  Respuesta: Ocultar la campana de alertas

***************************************************************/

document.getElementById("iconAlert").addEventListener("click", hiddenAlerta);
        function hiddenAlerta () {
            $.ajax({
             type:'POST',
             url:"clickalertas",
             data:{"_token": token},
             success:function(data){ 
                //console.log(data);
                document.getElementById('campanaAlert').classList.add("hidden");
            }
          });
        }

/*************************************************************

  Funcionalidad: Al obtener el evento click delelemento, envia una peticion para editar los registros en la BD.
  Parametros: token
  Respuesta: Ocultar la campana de alertas

***************************************************************/

        document.getElementById("iconAlertfin").addEventListener("click", hiddenAlertafin);
        function hiddenAlertafin () {
            $.ajax({
             type:'POST',
             url:"clickalertasfin",
             data:{"_token": token},
             success:function(data){ 
                //console.log(data);
                document.getElementById('campanaAlertfin').classList.add("hidden");
            }
          });
        }

/*************************************************************

  Funcionalidad: Al obtener el evento click delelemento, envia una peticion para editar los registros en la BD.
  Parametros: token
  Respuesta: Ocultar la campana de alertas

***************************************************************/

        document.getElementById("iconAlertObs").addEventListener("click", hiddenAlertafin);
        function hiddenAlertafin () {
            $.ajax({
             type:'POST',
             url:"clickalertasobs",
             data:{"_token": token},
             success:function(data){ 
                //console.log(data);
                //document.getElementById('campanaAlertobs').classList.add("hidden");
            }
          });
        }

/*************************************************************

  Funcionalidad: Embia la peticion para buscar la informacion.
  Parametros: acr, token
  Respuesta: crea la tabla de registros

***************************************************************/


//document.getElementById("buscarMes").addEventListener("click", busquedames);
$("#buscarMes").click(function(){

          document.getElementById("loader").classList.remove('hidden');
          //var mes = document.getElementById('mesbusqueda').value;
          var acr = document.getElementById('acronimo').value;
          //console.log(mes,acr);

          $.ajax({
               type:'POST',
               url:"buscarmes",
               //data:{mes:mes,acr:acr,"_token": token},
               data:{acr:acr,"_token": token},
               success:function(data){ 
                //console.log(data)

                  document.getElementById('resultMes').innerHTML ='';
                  if (data[0].length>0) {

                  document.getElementById('resultMes').innerHTML ='<tr><th>Área</th><th>Mes</th><th>Fecha</th></tr>';

                    for (var i = 0; i < data[0].length; i++) {
                      var x = document.createElement("TR");
                      document.getElementById('resultMes').appendChild(x);
                      //data[0][i].created_at
                      var d = new Date(data[0][i].ale_date);
                      x.innerHTML='<td>'+data[0][i].ale_actividad+'</td><td style="text-transform: uppercase;">'+data[0][i].ale_mes+'</td><td>'+d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear()+'</th>';
                    }

                  } else {
                     document.getElementById('resultMes').innerHTML ='<tr><th>No se encontraron resultados</th></tr>';
                  }

                  document.getElementById("loader").classList.add('hidden');
              }
          });
          
   });

/*************************************************************

  Funcionalidad: Embia la peticion para buscar la informacion por los parametros selelcionados
  Parametros: datep, dates, acr, token
  Respuesta: crea la tabla de registros

***************************************************************/

        //document.getElementById("buscarEntre").addEventListener("click", busquedaentre);
$("#buscarEntre").click(function(){

          document.getElementById("loader").classList.remove('hidden');
          var datep = document.getElementById('datep').value;
          var dates = document.getElementById('dates').value;
          var acr = document.getElementById('acronimoentre').value;
          //console.log(datep,dates,acr);

          $.ajax({
               type:'POST',
               url:"buscaentre",
               data:{datep:datep,dates:dates,acr:acr,"_token": token},
               success:function(data){ 

                //console.log(data)
                  document.getElementById('resultEntre').innerHTML ='';
                  if (data[0].length>0) {

                  document.getElementById('resultEntre').innerHTML ='<tr><th>Área</th><th>Clave del Programa</th><th>Actividad</th><th>Fecha</th></tr>';

                    for (var i =  data[0].length - 1; i >= 0; i--) {
                      var x = document.createElement("TR");
                      document.getElementById('resultEntre').appendChild(x);
                      var d = new Date(data[0][i].ale_date);
                      x.innerHTML='<td class="tiempo'+data[0][i].ale_tiempo+'">'+data[0][i].ale_actividad+'</td><td>'+data[0][i].ale_id_programa+'</td><td style="max-width: 20vw;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">'+data[0][i].ale_num_actividad+'.- '+data[0][i].ale_desc_actividad+'</td><td>'+ d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear() +'</th>';
                    }

                  } else {
                     document.getElementById('resultEntre').innerHTML ='<tr><th>No se encontraron resultados</th></tr>';
                  }

                  document.getElementById("loader").classList.add('hidden');
              }
          });
          
        });

/*************************************************************

  Funcionalidad: cambia los parametros del atributo, deshabilita el elemento
  Parametros: 
  Respuesta: 

***************************************************************/

         //document.getElementById("datep").addEventListener("change", changedatep);
$("#datep").change(function(){
          var datep = document.getElementById('datep').value;
          document.getElementById('dates').setAttribute("min", datep);
          document.getElementById('dates').disabled = false;
        });

/*************************************************************

  Funcionalidad: deshabilita el elemento
  Parametros: 
  Respuesta: 

***************************************************************/

$("#dates").change(function(){
        //document.getElementById("dates").addEventListener("change", changedates);

          document.getElementById('buscarEntre').disabled = false;
        });
   
/*************************************************************

  Funcionalidad: Cambia, prepara los datos para seleccionar los valores correspondientes y habilita o deshabilita dependiendo la seleccion
  Parametros: 
  Respuesta: 

***************************************************************/

document.getElementById('eunidad')?document.getElementById('eunidad').addEventListener("change", changeUnidad, false):'';

  function changeUnidad(){
    var uni = this.options[this.selectedIndex].value;
    document.getElementById('contActividades').innerHTML='';
    document.getElementById('contActividades').style.backgroundColor='#fff';  

    sumTPM();
    uni == '0' ? document.getElementById('ePrograma').disabled=true : (document.getElementById('ePrograma').disabled=false,getProEsp());
  }

/*************************************************************

  Funcionalidad: Habilita o deshabilita el sistema
  Parametros: id
  Respuesta: 

***************************************************************/

document.getElementById('selectOnOff')?document.getElementById('selectOnOff').addEventListener("change", onOffSistema, false):'';

  function onOffSistema(){
    var data = this.options[this.selectedIndex].value;
    console.log(data);
    $.ajax({
       type:'POST',
       url:"onOffsipsei",
       data:{"_token": token,data:data},
       success:function(mns){
        data === '0' ? swal('Sistema Deshabilitado', "", "success"):swal('Sistema Habilitado', "", "success");
      }
    });
  }

/*************************************************************

  Funcionalidad: Cambia, prepara los datos para seleccionar los valores correspondientes y habilita o deshabilita dependiendo la seleccion
  Parametros: 
  Respuesta: 

***************************************************************/

  document.getElementById('ePrograma')?document.getElementById('ePrograma').addEventListener("change", changePro, false):'';  
   
  function changePro(){
    var pro = this.options[this.selectedIndex].value;
    pro == '0' ? document.getElementById('eProgramaEsp').disabled=true : getProEsp();
  }

/*************************************************************

  Funcionalidad: Obtiene los valores seleccionados para reaizar la busqueda de las actividades
  Parametros: pro, uni, token
  Respuesta: Crea lalista de opciones

***************************************************************/

  function getProEsp(pro){
    document.getElementById("eProgramaEsp").innerHTML='<option value="0">Seleccione un programa</option>';
    document.getElementById('contActividades').style.backgroundColor='#fff';
    var uni = document.getElementById('eunidad').options[document.getElementById('eunidad').selectedIndex].value;
    var pro = document.getElementById('ePrograma').options[document.getElementById('ePrograma').selectedIndex].value;
    emptyPrograma();
    $.ajax({
       type:'POST',
       url:"sendporgramaesp",
       data:{"_token": token,id:pro,uni:uni},
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

  Funcionalidad: Obtiene los valores seleccionados para reaizar la busqueda de las actividades
  Parametros: proesp, uni, token
  Respuesta: Crea lalista de las actividades dependiendo los valores de cada una

***************************************************************/

  document.getElementById('eProgramaEsp')?document.getElementById('eProgramaEsp').addEventListener("change", changeProEsp, false):''; 

  function changeProEsp(){
    var proesp = this.options[this.selectedIndex].value;
    var uni = document.getElementById('eunidad').options[document.getElementById('eunidad').selectedIndex].value;
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
       data:{"_token": token,proesp:proesp,uni:uni},
       success:function(data){ 
        //console.log(data);
          document.getElementById('contActividades').innerHTML='';
          data[0].length == 0 ? document.getElementById('contActividades').style.backgroundColor='#fff' : document.getElementById('contActividades').style.backgroundColor='';

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
          //item2.addEventListener("keyup", backEnable, false);
          rowAct.appendChild(item2);

          var item3 = document.createElement("DIV");
          item3.innerHTML = data[0][j].unidadmedida;
          item3.className = "item3";                 // Insert text
          //item3.addEventListener("keyup", backEnable, false);
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
            //itemMes1.addEventListener("keyup", backEnable, false);
            //itemMes1.addEventListener("keyup", validaNumeros, false);
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
          editar.className = "iconBH fa fa-pencil-square-o resetBack btnOn";   
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
          up.className = "iconBH fa fa-arrow-circle-up up btnOn";   
          up.setAttribute('aria-hidden', 'true');
          up.setAttribute('data-toggle', 'tooltip');
          up.setAttribute('data-placement', 'right');
          up.setAttribute('title', 'Subir');
          //up.addEventListener("click", moveUp);
          up.style.color='#eceff1';
          up.style.pointerEvents='none';

          rowAct.appendChild(up);

          var down = document.createElement("I");
          down.className = "iconBH fa fa-arrow-circle-down down btnOn";   
          down.setAttribute('aria-hidden', 'true');
          down.setAttribute('data-toggle', 'tooltip');
          down.setAttribute('data-placement', 'right');
          down.setAttribute('title', 'Bajar');
          down.style.color='#eceff1';
          down.style.pointerEvents='none';
          //down.addEventListener("click", moveDown);

          rowAct.appendChild(down);


          switch (data[0][j].act_tipo_estatus) {
            case 0:

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
            //observa.addEventListener("click", verObservaciones);
            observa.style.color='#eceff1';
            observa.style.pointerEvents='none';
            rowAct.appendChild(observa);
 
              break;
            case 1:

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
              observa.style.backgroundColor='#ffb300';
              observa.style.color='#000';
              break;
            case 3:
              observa.style.backgroundColor='#ffb300';
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

              break;
            default:

          }

          

          var del = document.createElement("I");
          del.className = "iconBH fa fa-trash delAct btnOn";   
          del.setAttribute('aria-hidden', 'true');
          del.setAttribute('data-toggle', 'tooltip');
          del.setAttribute('data-placement', 'right');
          del.setAttribute('title', 'Eliminar');
          del.style.color='#eceff1';
          del.style.pointerEvents='none';
          //del.addEventListener("click", removeActModal);

          rowAct.appendChild(del);

          document.getElementById('contActividades').appendChild(rowAct);
          document.getElementById('contActividades').style.backgroundColor='';  

          }

          reCountAct();
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });

          //document.getElementById('addAct').style.pointerEvents = '';
          //document.getElementById('addAct').style.color = '';
         sumTPM();
      }
    });

  }

/*************************************************************

  Funcionalidad: Limpia los elementos
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

/*************************************************************

  Funcionalidad: suma un arary
  Parametros: total, num
  Respuesta: la suma del array

***************************************************************/

function sumArray(total, num) {
          return total + num;
        }

/*************************************************************

  Funcionalidad: muestra la instancia del indicador seleccionado
  Parametros: token, id
  Respuesta: muestra la interfaz con los datos seleccionados

***************************************************************/

        function creaIndicador(){
          $('#modalIndicador').modal('show');
          var id = this.parentNode.getAttribute('data-id');
          var periodo = this.parentNode.children[5].textContent+' - '+this.parentNode.children[6].textContent+' 2020';
          $.ajax({
             type:'POST',
             url:"getindicador",
             data:{"_token": token,data:id},
             success:function(data){ 
              document.getElementById('identificadorindicador').textContent=data[0].identificadorindicador;
              document.getElementById('nombreindicador').textContent=data[0].nombreindicador;
              document.getElementById('objetivoindicador').textContent=data[0].objetivoindicador;
              document.getElementById('metaindicador').textContent=data[0].metaindicador+'%';
              document.getElementById('periodocumplimiento').textContent=data[0].periodocumplimiento;
              data[0].idprograma1 == '' || data[0].idprograma1 == '0' || data[0].idprograma1 == 0 ? '' : document.getElementById('idprograma'+data[0].idprograma1).textContent='X';
              document.getElementById('definicionindicador').textContent=data[0].definicionindicador;
              data[0].dimensionmedir == '' || data[0].dimensionmedir == '0' || data[0].dimensionmedir == 0 ? '' : document.getElementById('dimensionmedir'+data[0].dimensionmedir).textContent='X';
              document.getElementById('unidadmedida').textContent=data[0].unidadmedida;
              document.getElementById('metodocalculo').textContent=data[0].metodocalculo;
              document.getElementById('variable1').textContent=data[0].variable1;
              document.getElementById('descripcionvariable1').textContent=data[0].descripcionvariable1;
              document.getElementById('fuentesinfovariable1').textContent=data[0].fuentesinfovariable1;
              document.getElementById('variable2').textContent=data[0].variable2;
              document.getElementById('descripcionvariable2').textContent=data[0].descripcionvariable2;
              document.getElementById('fuentesinfovariable2').textContent=data[0].fuentesinfovariable2;
              document.getElementById('frecuenciamedicion'+data[0].frecuenciamedicion).innerHTML='X <br>'+data[0].frecuenciaespecifique;
              document.getElementById('fundamentojuridico').textContent=data[0].fundamentojuridico;
              document.getElementById('lineabasev').textContent=data[0].lineabasev;
              document.getElementById('lineabasea').textContent=data[0].lineabasea;
              data[0].comportamientoindicador == '' || data[0].comportamientoindicador == '0' || data[0].comportamientoindicador == 0 ? '' : document.getElementById('comportamientoindicador'+data[0].comportamientoindicador).textContent='X';
              document.getElementById('nombretitular').innerHTML=data[0].nombretitular+'<br>'+data[0].cargo;
              document.getElementById('pdfIndicador').setAttribute('data-id',id);

              document.getElementById('updateIndicador').disabled=false;
            }
          });
        }

/*************************************************************

  Funcionalidad: muestra la instancia del indicador seleccionado Para la reprogramacion
  Parametros: token, id
  Respuesta: muestra la interfaz con los datos seleccionados

***************************************************************/

        function creaIndicadorDisable(){
          $('#modalIndicador').modal('show');
          var id = this.parentNode.getAttribute('data-id');
          var periodo = this.parentNode.children[5].textContent+' - '+this.parentNode.children[6].textContent+' 2020';
          $.ajax({
             type:'POST',
             url:"getindicador",
             data:{"_token": token,data:id},
             success:function(data){ 
              document.getElementById('identificadorindicador').textContent=data[0].identificadorindicador;
              document.getElementById('nombreindicador').textContent=data[0].nombreindicador;
              document.getElementById('objetivoindicador').textContent=data[0].objetivoindicador;
              document.getElementById('metaindicador').textContent=data[0].metaindicador+'%';
              document.getElementById('periodocumplimiento').textContent=data[0].periodocumplimiento;
              data[0].idprograma1 == '' || data[0].idprograma1 == '0' || data[0].idprograma1 == 0 ? '' : document.getElementById('idprograma'+data[0].idprograma1).textContent='X';
              document.getElementById('definicionindicador').textContent=data[0].definicionindicador;
              data[0].dimensionmedir == '' || data[0].dimensionmedir == '0' || data[0].dimensionmedir == 0 ? '' : document.getElementById('dimensionmedir'+data[0].dimensionmedir).textContent='X';
              document.getElementById('unidadmedida').textContent=data[0].unidadmedida;
              document.getElementById('metodocalculo').textContent=data[0].metodocalculo;
              document.getElementById('variable1').textContent=data[0].variable1;
              document.getElementById('descripcionvariable1').textContent=data[0].descripcionvariable1;
              document.getElementById('fuentesinfovariable1').textContent=data[0].fuentesinfovariable1;
              document.getElementById('variable2').textContent=data[0].variable2;
              document.getElementById('descripcionvariable2').textContent=data[0].descripcionvariable2;
              document.getElementById('fuentesinfovariable2').textContent=data[0].fuentesinfovariable2;
              document.getElementById('frecuenciamedicion'+data[0].frecuenciamedicion).innerHTML='X <br>'+data[0].frecuenciaespecifique;
              document.getElementById('fundamentojuridico').textContent=data[0].fundamentojuridico;
              document.getElementById('lineabasev').textContent=data[0].lineabasev;
              document.getElementById('lineabasea').textContent=data[0].lineabasea;
              data[0].comportamientoindicador == '' || data[0].comportamientoindicador == '0' || data[0].comportamientoindicador == 0 ? '' : document.getElementById('comportamientoindicador'+data[0].comportamientoindicador).textContent='X';
              document.getElementById('nombretitular').innerHTML=data[0].nombretitular+'<br>'+data[0].cargo;
              document.getElementById('pdfIndicador').setAttribute('data-id',id);

              document.getElementById('updateIndicador').disabled=true;
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
              document.getElementById('idprograma1').checked='false';
              document.getElementById('idprograma2').checked='false';
              document.getElementById('idprograma3').checked='false';
              document.getElementById('idprograma4').checked='false';
              document.getElementById('definicionindicador').textContent='';
              document.getElementById('dimensionmedir1').textContent='';
              document.getElementById('dimensionmedir2').textContent='';
              document.getElementById('dimensionmedir3').textContent='';
              document.getElementById('dimensionmedir4').textContent='';
              document.getElementById('unidadmedida').textContent='';
              document.getElementById('metodocalculo').textContent='';
              document.getElementById('variable1').textContent='';
              document.getElementById('descripcionvariable1').textContent='';
              document.getElementById('fuentesinfovariable1').textContent='';
              document.getElementById('variable2').textContent='';
              document.getElementById('descripcionvariable2').textContent='';
              document.getElementById('fuentesinfovariable2').textContent='';
              document.getElementById('frecuenciamedicion1').textContent='';
              document.getElementById('frecuenciamedicion2').textContent='';
              document.getElementById('frecuenciamedicion3').textContent='';
              document.getElementById('frecuenciamedicion4').textContent='';
              document.getElementById('frecuenciamedicion5').textContent='';
              document.getElementById('fundamentojuridico').textContent='';
              document.getElementById('lineabasev').textContent='';
              document.getElementById('lineabasea').textContent='';
              document.getElementById('comportamientoindicador1').textContent='';
              document.getElementById('comportamientoindicador2').textContent='';
              document.getElementById('comportamientoindicador3').textContent='';
              document.getElementById('comportamientoindicador4').textContent='';
              document.getElementById('nombretitular').innerHTML='';
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
          var urlPdf;
          $('meta[name="app-prefix"]').attr('content') == 'http://sipseiv2.test' ? urlPdf='/' : urlPdf='/sipseiv2/';
          const form = document.createElement('form');
          form.method = 'POST';
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

  Funcionalidad: busca las observaciones asociadas a una actividad
  Parametros: token, id
  Respuesta: musetra la intefaz con sus parametros de salida

***************************************************************/

        function verObservaciones(){
          $('#modalOpservaciones').modal('show');
          /////////////////////////////////////////////////////
          addObservaciones();
          /////////////////////////////////////////////////////
           var id = this.parentNode.getAttribute('data-id');
           var act = this.parentNode.children[0].textContent;
           var cla = document.getElementById('claveProEsp').textContent;
           var uni = document.getElementById('eunidad').options[document.getElementById('eunidad').selectedIndex].textContent;
           //console.log(id);
           document.getElementById('sendObservaciones').setAttribute('data-id', id);
           document.getElementById('sendObsVal').setAttribute('data-id', id);
           $.ajax({
             type:'POST',
             url:"getobservacion",
             data:{"_token": token,id:id},
             success:function(data){
              var arrayEnable = [];

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
                    child2.innerHTML = '<i class="iconObsVer fa fa-paper-plane-o edoColor" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Enviado: '+pri.getDate()+'-'+(pri.getMonth()+1)+'-'+pri.getFullYear()+'" aria-hidden="true"></i>';
                    child2.className='col-md-1 contIconObs actDos';
                    child2.style.backgroundColor="#f48fb1";
                    document.getElementById('getObs').appendChild(child2);

                    var child3 = document.createElement('div');
                    child3.innerHTML = '<i class="iconObs fa fa-cogs" data-toggle="tooltip" style="color:#000;" data-placement="top" title="Por atender" aria-hidden="true"></i>';
                    child3.className='col-md-1 contIconObsVal';
                    child3.style.backgroundColor="#e082a2";
                    document.getElementById('getObs').appendChild(child3);
                    break;
                  case '1':
                  var child2 = document.createElement('div');
                    child2.innerHTML = 
                    '<div class="row"><div class="col-md-12" style="text-align:center;background:#f57f17;padding-top:3px;border-radius:3px 3px 0 0;color:#fff;font-zise:10px;">'+
                    '<input type="radio" style="color:#000;cursor:pointer" data-toggle="tooltip" data-placement="top" title="Validar" aria-hidden="true" data-id="'+data[i].id+'" class="checkObsVal edoColor edoColorVal" name="checkObsVal'+i+'" value="2">'+
                    '</div>'+
                    '<div class="col-md-12" style="text-align:center;background:#dd2c00;padding-top:3px;border-radius:0 0 3px 3px;color:#fff;font-zise:10px;">'+
                    '<input type="radio" style="color:#000;cursor:pointer" data-toggle="tooltip" data-placement="bottom" title="No Validar" aria-hidden="true" data-id="'+data[i].id+'" class="checkObsVal" name="checkObsVal'+i+'" value="3">'+
                    '</div></div>';
                    child2.className='col-md-1 contIconObs';
                    child2.style.backgroundColor="#bdbdbd";
                    child2.style.padding="5px";
                  document.getElementById('getObs').appendChild(child2);

                  var child3 = document.createElement('div');
                    child3.innerHTML = '<i class="iconObs fa fa-check-square-o" style="color:#000;" data-toggle="tooltip" data-placement="top" title="Atendido: '+seg.getDate()+'-'+(seg.getMonth()+1)+'-'+seg.getFullYear()+'" aria-hidden="true"></i>';
                    child3.className='col-md-1 contIconObsVal';
                    child3.style.backgroundColor="#ffa000";
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
              arrayEnable.includes("1")?document.getElementById('sendObsVal').disabled=false:document.getElementById('sendObsVal').disabled=true;
              //console.log(arrayEnable);

              $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
              });

            }
          });
        }

/*************************************************************

  Funcionalidad: selecciona los datos a evaluar
  Parametros: token, arrayObs, varColor
  Respuesta: alerta de datos enviados

***************************************************************/

        document.getElementById('sendObsVal')?document.getElementById('sendObsVal').addEventListener('click', sendObsVal, false):'';

        function sendObsVal() {
          var obs = document.getElementsByClassName('checkObsVal');
          var aoe = document.getElementsByClassName('edoColorVal');
          var activa = document.getElementsByClassName('edoColorVal')[0];
          var actdos = document.getElementsByClassName('actDos')[0];

          var id = this.getAttribute('data-id');
          var arrayObs = [];
          for (var i = 0; i < obs.length; i++) {
            if (obs[i].checked){
              arrayObs.push(obs[i].getAttribute('data-id')+'|'+obs[i].value);
            }
          }
          

          var varColor;
          arrayObs.length==aoe.length?varColor=4:varColor=2;
          arrayObs.length==aoe.length&&actdos?varColor=1:'';

          var obsCamp = parseInt(document.getElementById('campanaAlertObsR').textContent);
          isNaN(obsCamp)?obsCamp=0:'';


          if (arrayObs.length>0) {

          $.ajax({
             type:'POST',
             url:"sendidObsVal",
             data:{"_token": token,id:id,data:arrayObs,color:varColor},
             success:function(data){ 
              //swal('Actividad eliminada', "", "success");
              //console.log(data.length)
              document.getElementById('campanaAlertObsR').textContent=(data.length);
              document.getElementById('obsDesA').innerHTML="";
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
                document.getElementById('obsDesA').appendChild(a1);
              }
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
                  switch (varColor) {
                    case 1:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#f48fb1';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000';
                      break;
                    case 2:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#ffb300';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000';
                      break;
                    case 3:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#ffb300';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000';
                      break;
                    case 4:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#c0ca33';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000';
                      break;
                    default:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='';
                  }
                }
              });
            }
          });

        } else {
          swal('Seleccione al menos una observación', "", "warning");
        }

        }

/*************************************************************

  Funcionalidad: limpia los elementos del modal
  Parametros:
  Respuesta:

***************************************************************/

        
        $('#modalOpservaciones').on('hide.bs.modal', function () {
          document.getElementById('sendObservaciones').setAttribute('data-id', '');
          document.getElementById('sendObsVal').setAttribute('data-id', '');
          document.getElementById('contObservaciones').innerHTML="";
          document.getElementById('getObs').innerHTML="";
          document.getElementById('ModalTitle').innerHTML="";
          document.getElementById('dataHistorial').textContent="";
          document.getElementById('sendObsVal').disabled=true;
        })

/*************************************************************

  Funcionalidad: crea y agrega un elemento dinamico
  Parametros: 
  Respuesta: elemnto creado

***************************************************************/

        document.getElementById('addObservaciones')?document.getElementById('addObservaciones').addEventListener('click', addObservaciones, false):'';

        function addObservaciones(){

          var pad = document.createElement("DIV");
          pad.className = "contObse";

          var obs = document.createElement("DIV");
          obs.contentEditable = "true";
          obs.className = "obsTexto col-md-12";

          pad.appendChild(obs);

          var del = document.createElement("I");
          del.className = "iconObs fa fa-trash delAct";   
          del.setAttribute('aria-hidden', 'true');
          del.setAttribute('data-toggle', 'tooltip');
          del.setAttribute('data-placement', 'right');
          del.setAttribute('title', 'Eliminar');
          del.addEventListener("click", removeObs);

          pad.appendChild(del);

        // Insert text
          document.getElementById('contObservaciones').appendChild(pad);
          $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });
        }

/*************************************************************

  Funcionalidad: Elimina el elemento seleccionado
  Parametros: 
  Respuesta:

***************************************************************/

        function removeObs() {
          this.parentNode.remove();
          $('.tooltip').tooltip('hide');
        }


/*************************************************************

  Funcionalidad: agrega un numero consecutivo alos elementos seleccionados
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

  Funcionalidad: Envia las observaciones para su registro y establece el estatus de cada boton
  Parametros: id,arrayObs,cla,uni,varColor
  Respuesta: alerta de datos enviados

***************************************************************/

        document.getElementById('sendObservaciones')?document.getElementById('sendObservaciones').addEventListener('click', sendOBS, false):'';

        function sendOBS() {
          var uni = document.getElementById('eunidad').options[document.getElementById('eunidad').selectedIndex].value;
          var id = this.getAttribute('data-id');
          var obs = document.getElementsByClassName('obsTexto');
          var cla = document.getElementById('claveProEsp').textContent;
          var arrayObs = [];
          for (var i = 0; i < obs.length; i++) {
            obs[i].textContent ? arrayObs.push(obs[i].textContent) : '';
          }
          var varColor;
          var aoe = document.getElementsByClassName('checkObsVal');
          aoe.length>0?varColor=2:varColor=1;
          //console.log(varColor, aoe.length)

          var obsCamp = parseInt(document.getElementById('campanaAlertObs').textContent);
          isNaN(obsCamp)?obsCamp=0:'';

          if (arrayObs.length>0) {

          $.ajax({
             type:'POST',
             url:"sendobservacion",
             data:{"_token": token,id:id,data:arrayObs,cla:cla,uni:uni,color:varColor},
             success:function(data){ 
              //console.log(data);
              document.getElementById('campanaAlertObs').textContent=(data.length);
              document.getElementById('obsDesB').innerHTML="";
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
                document.getElementById('obsDesB').appendChild(a1);
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

                  switch (varColor) {
                    case 2:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#ffb300';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000';
                      break;
                    case 1:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='#f48fb1';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='#000';
                      break;
                    default:
                      document.getElementById('act'+id).querySelector('.fa-eye').style.backgroundColor='';
                      document.getElementById('act'+id).querySelector('.fa-eye').style.color='';
                  }

                }
              });
            }
          });

        } else {
          swal('Agregue al menos una observación', "", "warning");
        }

        }

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
  form.method = 'POST';
  form.action = urlPdf+'pdfelaboracion';
  form.target = '_blank';
  form.style.display='none';

  var ip1 = document.createElement('input');
  ip1.name = '_token';
  ip1.value = token;
  form.appendChild(ip1);

  //var pro = document.getElementById('ePrograma').options[document.getElementById('ePrograma').selectedIndex].value;
  //var esp = document.getElementById('eProgramaEsp').options[document.getElementById('eProgramaEsp').selectedIndex].value;
  var uni = document.getElementById('eunidad').options[document.getElementById('eunidad').selectedIndex].value;

  var unidadtit = document.getElementById('eunidad').options[document.getElementById('eunidad').selectedIndex].textContent;
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

  var ip10 = document.createElement('input');
  ip10.name = 'unidad';
  ip10.value = uni;
  form.appendChild(ip10);

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

/*************************************************************

  Funcionalidad: busca los registros relacionados al id del elemento
  Parametros: toke, idAO
  Respuesta: crea la interfaz de las observaciones y sus caracteristicas

***************************************************************/

  document.getElementById('buscarOBS')?document.getElementById('buscarOBS').addEventListener('click', repObs, false):'';

  function repObs(){
    var idAO = document.getElementById("idAreaObs").value;
    //console.log(idAO)
  
    $.ajax({
       type:'POST',
       url:"getidobs",
       data:{"_token": token,id:idAO,},
       success:function(data){
       document.getElementById('resultObs').innerHTML="";

       var tr1 = document.createElement("TR");

       var fec = document.createElement("th");
       fec.textContent = 'Fecha';
       tr1.appendChild(fec);

       var are = document.createElement("th");
       are.textContent = 'Area';
       tr1.appendChild(are);

       var cla = document.createElement("th");
       cla.textContent = 'Clave';
       tr1.appendChild(cla);

       var obs = document.createElement("th");
       obs.textContent = 'Observación';
       tr1.appendChild(obs);

       var val = document.createElement("th");
       val.textContent = 'Validado';
       val.style.textAlign = "center";
       tr1.appendChild(val);

       var ate = document.createElement("th");
       ate.textContent = 'Atendido';
       ate.style.textAlign = "center";
       tr1.appendChild(ate);

       document.getElementById('resultObs').appendChild(tr1);

       
       //console.log(data[0].length); 

       for (var i = 0; i < data[0].length; i++) {
        var tr = document.createElement("TR");

        var fec = document.createElement("td");
        fec.textContent = data[0][i].obs_date;
        tr.appendChild(fec);

        var are = document.createElement("td");
        are.textContent = data[0][i].usu_acronimo;
        tr.appendChild(are);

        var cla = document.createElement("td");
        cla.textContent = data[0][i].obs_clave;
        tr.appendChild(cla);

        var obs = document.createElement("td");
        obs.textContent = data[0][i].obs_desc;
        obs.style.width="50%";
        tr.appendChild(obs);

        var val = document.createElement("td");
        val.style.textAlign = "center";
        val.style.fontSize  = "23px";
        var ic1 = document.createElement("i");

        var ate = document.createElement("td");
        ate.style.textAlign = "center";
        ate.style.fontSize  = "23px";
        var ic2 = document.createElement("i");

        switch (data[0][i].obs_status) {
          case '0':
            val.innerHTML = '<i class="fa fa-paper-plane" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Enviado"></i>';
            val.style.color = '#e082a2';
            ate.innerHTML = '<i class="fa fa-cogs" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Por atender"></i>';
            ate.style.color = '#e082a2';
            break;
          case '1':
            val.innerHTML = '<i class="fa fa-square-o" aria-hidden="true" style="cursor:pointer;" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Por validar"></i>';
            val.style.color = '#ffa000';
            ate.innerHTML = '<i class="fa fa-check-square-o" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: '+data[0][i].obs_date_dos+'"></i>';
            ate.style.color = '#ffa000';
            break;
          case '2':
            val.innerHTML = '<i class="fa fa-check-square-o" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Validado: '+data[0][i].obs_date_tres+'"></i>';
            val.style.color = '#9e9d24';
            ate.innerHTML = '<i class="fa fa-check-square-o" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: '+data[0][i].obs_date_dos+'"></i>';
            ate.style.color = '#9e9d24';
            break;
          case '3':
            val.innerHTML = '<i class="fa fa-times-circle" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="No validada: '+data[0][i].obs_date_tres+'"></i>';
            val.style.color = '#ff1744';
            ate.innerHTML = '<i class="fa fa-check-square-o" aria-hidden="true" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Atendido: '+data[0][i].obs_date_dos+'"></i>';
            ate.style.color = '#ff1744';
            break;
          default:
            val.innerHTML = '';
            ate.innerHTML = '';
        }

        tr.appendChild(val);
        tr.appendChild(ate);

        document.getElementById('resultObs').appendChild(tr);
       }

       
         $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
          });     

      }
    });
  }