
<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ASESOR DE LA BANCA</h4>
			</div>
			<div class="modal-body">
			<div class="form-group">
	            <label>DNI DEL ASESOR DE PRIMERA LINEA</label>
				<input type="text" name="dni" maxlength=8 pattern=".{8,}" required title="mínimo 8 caracteres"  id="" class="form-control" onchange="Mayusculas(this)" required >
            </div>


			 <div class="form-group">
	            <label>Producto</label>
	            <select name="producto" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$producto=new Producto();
	            	foreach ($producto->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['id']?>"><?php echo $value['producto']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>	

           
            <div class="form-group">
	            <label>Num. de Documento del Cliente</label>

				<input type="text" name="documento" maxlength=8 pattern=".{8,}" required title="mínimo 8 caracteres" id="" class="form-control" onchange="Mayusculas(this)" required>
            </div>
	
            <script type="text/javascript">
				//<![CDATA[
				function validar(campo){ 
				var elcampo = document.getElementById(campo);   
				if((!validarNumero(elcampo.value))||(elcampo.value == "")){
				elcampo.value = "";
				elcampo.focus();
				document.getElementById('mensaje').innerHTML = 'Debe ingresar numeros';
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
	            <label>Monto de Oferta</label>
	            <input type="text" name="monto_oferta" id="oferta" class="form-control" onchange="decimal(this.id);" required>
            </div>
            <div class="form-group">
	            <label>Teléfono Registrado</label>
	            <input type="text" name="tel_registrado" id="tel_registrado" class="form-control" onchange="validar(this.id);" required>
            </div>
            <div class="form-group">
	            <label>Teléfono de Referencia</label>
	            <input type="text" name="tel_referencia" id="tel_referencia" class="form-control" onchange="validar(this.id);" >
            </div>
            <div class="form-group">
	            <label>Servicio</label>
	            <select name="servicio" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$servicio=new Servicio();
	            	foreach ($servicio->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['id']?>"><?php echo $value['servicio']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>	
            <div class="form-group">
			  <label for="comment">Observaciones</label>
			  <textarea name="observaciones" class="form-control" rows="5" id="comment"></textarea>
			</div>
            
            

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</div>
		</div>
	</div>
</div>
</form>