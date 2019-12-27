

<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ESTADO DE VENTA</h4>
			</div>
			<div class="modal-body">
			
              <div class="form-group">
	            <label>Dni del Asesor</label>
	            <select name="id" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$registro=new Registro();
	            	foreach ($registro->lista_asesor() as $key => $value): ?>
	            		<option value="<?php echo $value['id']?>"><?php echo $value['dni']?></option>
	            	<?php endforeach ?>
	            </select>

            </div>

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
				document.getElementById('mensaje').innerHTML = 'Debe ingresar numeros en el Monto Total de la Venta';
				}else{
				document.getElementById('mensaje').innerHTML = '';
				 
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
				<input type="text" name="monto_total" id="total" class="form-control" onchange="validar(this.id);" required>		
            </div>
            <div class="form-group">
			  <label for="comment">Observaciones</label>
			  <textarea name="observaciones" class="form-control" rows="5" id="comment"></textarea>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" onClick="this.disabled=true">Agregar</button>
			</div>
		</div>
	</div>
</div>
</form>