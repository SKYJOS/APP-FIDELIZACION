<?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Usuario();


 ?>
 <form id="actualizar" autocomplete="off">
 	<input type="hidden" name="id" value="<?php echo $id;?>">
 	<div class="form-group" >
 		<label for="">Num Reclamo</label>
 		<input type="text" name="cod_reclamo" id="" class="form-control" value="<?php echo $usuario->consulta($id,'cod_reclamo'); ?> " onchange="Mayusculas(this)">
 	</div>	
 	<div class="form-group">
 		<label for="">Documento</label>
 		<input type="text" name="documento" id="" class="form-control" value="<?php echo $usuario->consulta($id,'documento'); ?>" onchange="Mayusculas(this)">
 	</div>	
  <div class="form-group">
    <label for="">Producto</label>
    <input type="text" name="producto" id="" class="form-control" value="<?php echo $usuario->consulta($id,'producto'); ?>" onchange="Mayusculas(this)">
  </div>
  <div class="form-group">
    <label for="">Num.Cuenta</label>
    <input type="text" name="num_cuenta" id="" class="form-control" value="<?php echo $usuario->consulta($id,'num_cuenta'); ?>" onchange="Mayusculas(this)">
  </div>

 	 <div class="form-group">
	            <label>Tipo de Campaña</label>
	            <select name="tipo" id="" class="form-control" required>
	            	
	            	<?php 
					$area=new Area();
	            	foreach ($area->lista() as $key => $value): ?>
	            	<?php if ($value['cod_tipo']!==$usuario->consulta($id,'tipo')): ?>
	            		<option value="<?php echo $value['cod_tipo']?>"><?php echo $value['descripcion']?></option>
	            	<?php endif ?>
	            		
	            	<?php endforeach ?>
	            </select>
    
    </div>
    <div class="form-group">
    <label for="">Reclama</label>
    <input type="text" name="reclama" id="" class="form-control" value="<?php echo $usuario->consulta($id,'reclama'); ?>" onchange="Mayusculas(this)">
  </div>

 <button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/usuario/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargandoddd...");
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