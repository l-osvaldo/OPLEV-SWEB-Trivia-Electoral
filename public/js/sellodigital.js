

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
    } else {
      Swal.fire("Error", "Por favor inténtelo más tarde", "error");
    }
  });
});