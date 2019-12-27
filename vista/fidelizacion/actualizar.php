<?php 

include '../../autoload.php';
$id=$_GET['id'];
$usuario=new Registro();


 ?>
 <form id="agregar" class="actualizar"  autocomplete="off">


  <input type="hidden" name="id" value="<?php echo $id;?>">
  <div class="form-group" >
    <label for="">Dni del Asesor</label>
    <input type="text" name="cod_reclamo" id="" class="form-control" value="<?php echo $usuario->consulta($id,'dni'); ?> " onchange="Mayusculas(this)" disabled >
  </div>  
  <div class="form-group">
    <label for="">Producto</label>
    <input type="text" name="documento" id="" class="form-control" value="<?php echo $usuario->consulta($id,'Producto'); ?>" onchange="Mayusculas(this)" disabled>
  </div>  
  
  <div class="form-group">
    <label for="">Num. de Documento</label>
    <input type="text" name="num_cuenta" id="" class="form-control" value="<?php echo $usuario->consulta($id,'documento'); ?>" onchange="Mayusculas(this)" disabled>
  </div>
   
  <div class="form-group">
    <label>Monto de Oferta</label>
    <input type="text" name="monto_oferta" id="" class="form-control" value="<?php echo $usuario->consulta($id,'monto_oferta'); ?>" onchange="Mayusculas(this)" disabled>
  </div>  
  <div class="form-group">
    <label>Teléfono Registrado</label>
    <input type="text" name="tel_registrado" id="" class="form-control" value="<?php echo $usuario->consulta($id,'tel_registrado'); ?>" onchange="Mayusculas(this)" disabled>
  </div>  
  <div class="form-group">
    <label>Teléfono de Referencia</label>
    <input type="text" name="tel_referencia" id="" class="form-control" value="<?php echo $usuario->consulta($id,'tel_referencia'); ?>" onchange="Mayusculas(this)" disabled>
  </div>   
  <div class="form-group">
    <label for="">Servicio</label>
    <input type="text" name="servicio" id="" class="form-control" value="<?php echo $usuario->consulta($id,'Servicio'); ?>" onchange="Mayusculas(this)" disabled>
  </div>
  <div class="form-group">
    <label for="">Observaciones</label>  

    <textarea name="observaciones" class="form-control" rows="5"  id="comment" onchange="Mayusculas(this)" disabled>
      <?php echo $usuario->consulta($id,'observaciones'); ?>
    </textarea>

  </div>
  <hr>
  
        <div class="form-group">
              <label>Estado</label>
              <select name="estado" id="" class="form-control" required>
                <option value="">[Seleccionar]</option>
                <?php 
                $estado=new Estado();
                foreach ($estado->lista() as $key => $value): ?>
                  <option value="<?php echo $value['id']?>"><?php echo $value['estado']?></option>
                <?php endforeach ?>
              </select>
            </div>  
            <script type="text/javascript">
              //<![CDATA[
              function validar(campo){ 
              var elcampo = document.getElementById(campo);   
              if((!validarNumero(elcampo.value))||(elcampo.value == "")){
              elcampo.value = "";
              elcampo.focus();
              //document.getElementById('mensaje').innerHTML = 'Debe ingresar numeros en el Monto Total de la Venta';
              }else{
              // document.getElementById('mensaje').innerHTML = '';
               
              // Aqui pones el resto de las condiciones usando comparadores u operadores aritméticos, ya que estás seguro de que trabajas con números 
               
              }
              }
               
              function validarNumero(input){
              return (!isNaN(input)&&parseInt(input)==input)||(!isNaN(input)&&parseFloat(input)==input);
              }
              //]]>
            </script>
          
            <div class="form-group">
              <label>Monto Total</label>
        <input type="text" name="monto_total" id="totales" class="form-control" onchange="validar(this.id);" required>    
            </div>
            <div class="form-group">
        <label for="comment">Observaciones</label>
        <textarea name="observaciones" class="form-control" rows="5" id="comment"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        
        <button type="submit" class="btn btn-primary">Agregar</button> 
 

 
</form>

<script>
    $("#agregar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/fidelizacion/agregar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando");
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
<script>
    $(".actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "activar_venta.php",
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

