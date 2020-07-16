@extends('layouts.app')
@section('content')
<!-- Main content -->
<style type="text/css">
  form.link_mimic {display:inline}
  form.link_mimic input {display:inline;padding:0;border-width:0;margin:0;background:none;color:blue}
  form.link_mimic input:hover {text-decoration:underline}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 mt-3">
      <div class="col-sm-6">
        <h1>Sello Digital</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Sello Digital</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <h5 class="card-header">Validador de Reportes</h5>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <form role="form" class="link_mimic">
              <button type="submit" class="btn btn-default float-left eliminarReporte" data-nombre="listausuarios.pdf">Eliminar Reporte</button>
            </form>
            <form role="form" class="link_mimic" method="GET" action="{{ route('generar_sello') }}">
              <button type="submit" class="btn btn-primary o-fondo-1 float-right" id="validarReporte">Validar Reporte</button>
            </form>
          </div>
        </div>
        <div classs="row">
          <div class="col">
            <div class="card-body" id="contenedordocumento">
              <embed src="{{ url('/ver-pdf/listausuarios')}}" style="width:100%; height:1200px;" frameborder="0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script type="text/javascript">
      $(document).on("click", ".eliminarReporte", function(e){
        e.preventDefault();
        var filename = $(this).data("nombre");
        console.log(filename);
        Swal.fire({
          title: "Eliminar Reporte",
          text: "¿Desea continuar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, deseo continuar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          console.log(result)
          if (result.value) {
            $.ajax({
             type:'POST',
             url:'/destroy_document',
             data:{filename:filename},
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success:function(data){
              console.log(data)
              Swal.fire({
                title: 'Gestor de Reportes',
                text: 'El reporte fue eliminado correctamente',
                type: 'success',
              }).then(function(result) {
               if (result.value) {
                location.reload();
              }
            })
            },
            error: function (xhr, ajaxOptions, thrownError) {
              Swal.fire("Error", "Por favor inténtelo más tarde", "error");
            }
          });
          } else {
            Swal.fire("Error", "Se canceló la acción", "error");
          }
        });
      });
    </script>   
    @endsection