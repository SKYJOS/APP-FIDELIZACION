<?php 

include '../../autoload.php';

$id=$_GET['id'];


$usuarios=new Fidelizacion();

 ?>
 <form id="actualizar" autocomplete="off">


  <input type="hidden" name="id" value="<?php echo $id;?>">

   
   

            <div class="form-group">
              <label>Estado</label>
              <select name="estado" id="" class="form-control" required>                
                <?php 
                $estado=new Estado();
                foreach ($estado->lista() as $key => $value): ?>
                <?php if ($value['id']!==$usuarios->consultas($id,'estado')): ?>
                  <option value="<?php echo $value['id']?>"><?php echo $value['estado']?></option>
                <?php endif ?>
                  
                <?php endforeach ?>
              </select>
    
            </div>             
            <div class="form-group">
              <label for="">Observaciones</label>  
              <textarea name="observaciones" class="form-control" rows="5"  id="comment" onchange="Mayusculas(this)" >
               <?php echo $usuarios->consultas($id,'observaciones'); ?>
              </textarea>

             </div>
      </div>
      <button class="btn btn-primary">Actualizar</button>
 

 
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/fidelizacion/actualizar.php",
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

