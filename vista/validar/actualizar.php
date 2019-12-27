<?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new user();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">

 	<div class="form-group" >
 		<label for="">DNI</label>
 		<input type="text" name="cod_asesores" id="" class="form-control" value="<?php echo $usuario->consulta_user($id,'cod_asesores'); ?> " onchange="Mayusculas(this)">
 	</div>	
 	<div class="form-group">
 		<label for="">Contraseña</label>
 		<input type="text" name="pass" id="" class="form-control" value="<?php echo $usuario->consulta_user($id,'pass'); ?>" onchange="Mayusculas(this)">
 	</div>	
  <div class="form-group">
    <label for="">Tipo</label>
    <input type="text" name="tipo" id="" class="form-control" value="<?php echo $usuario->consulta_user($id,'tipo'); ?>" onchange="Mayusculas(this)">
  </div>



 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/validar/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#modal-actualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTable();
          }
      });
  });
</script>
