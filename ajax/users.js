var carpeta="usuario";

function loadTable(){
    var parametros = {"action":"ajax"};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vista/'+carpeta+'/listar.php',//ruta donde se encuentra lo que se va a cargar
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("");
      },
      success:function(data){//aqui se colocara lo que deseamos optener
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
        
      }
    })
  }
//falta modificar a partir de aqui
$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();//agrega todo en una sola variable
$.ajax({
  type: "POST",
  url: "../controlador/"+carpeta+"/actualizar.php",
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando..");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  $("#agregar")[0].reset();  //resetear inputs
  $('#modal-agregar').modal('hide');  // ocultar modal
  loadTable();
  }
});
event.preventDefault();
});

$('#modal-eliminar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })

//../modelo/Importar_excel_estado.php
$( "#eliminar" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "../modelo/Importar_excel_estado.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#modal-eliminar').modal('hide');
          loadTable();
          }
      });
      event.preventDefault();
    });

