$(document).on("click", ".eliminarReporte", function(e){
  e.preventDefault();
  var filename = $(this).data("nombre");
  console.log(filename);
  Swal.fire({
    title: "Eliminar Reporte",
    text: "¿Desea continuar?",
    type: "warning",
    showCancelButton: true,
    reverseButtons: true,
    confirmButtonText:
    '<i class="far fa-check-circle"></i>  Aceptar',
    confirmButtonAriaLabel: 'Aceptar',
    cancelButtonText:
      '<i class="far fa-times-circle"></i>  Cancelar',
    cancelButtonAriaLabel: 'Cancelar'
  }).then((result) => {
    console.log(result)
    if (result.value) {
    } else {
      Swal.fire("Error", "Por favor inténtelo más tarde", "error");
    }
  });
});