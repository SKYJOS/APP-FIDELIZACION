
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
	            <label>Producto</label>
	            <select name="area" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Area();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['cod_tipo']?>"><?php echo $value['descripcion']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>	

            <div class="form-group">
	            <label>Tipo de Documento</label>

	            <label class="radio-inline"><input type="radio" name="optradio">DNI</label>
				<label class="radio-inline"><input type="radio" name="optradio">CE</label>
				<input type="text" name="documento" id="" class="form-control" onchange="Mayusculas(this)">
				<?php echo $_SESSION['cod_asesores']; ?>
            </div>

            <div class="form-group">
	            <label>Nombre Completo del Cliente</label>
	            <input type="text" name="documento" id="" class="form-control" onchange="Mayusculas(this)">
            </div>	
            <div class="form-group">
	            <label>Monto de Oferta</label>
	            <input type="text" name="producto" id="" class="form-control" onchange="Mayusculas(this)">
            </div>
            <div class="form-group">
	            <label>Teléfono Registrado</label>
	            <input type="text" name="num_cuenta" id="" class="form-control" onchange="Mayusculas(this)">
            </div>
            <div class="form-group">
	            <label>Teléfono de Referencia</label>
	            <input type="text" name="num_cuenta" id="" class="form-control" onchange="Mayusculas(this)">
            </div>
            <div class="form-group">
	            <label>Servicio</label>
	            <select name="area" id="" class="form-control" required>
	            	<option value="">[Seleccionar]</option>
	            	<?php 
					$area=new Area();
	            	foreach ($area->lista() as $key => $value): ?>
	            		<option value="<?php echo $value['cod_tipo']?>"><?php echo $value['descripcion']?></option>
	            	<?php endforeach ?>
	            </select>
            </div>	
            <div class="form-group">
			  <label for="comment">Observaciones</label>
			  <textarea class="form-control" rows="5" id="comment"></textarea>
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