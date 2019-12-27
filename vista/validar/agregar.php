
<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INGRESO DE ASESORES</h4>
      </div>
      <div class="modal-body">

       <div class="form-group">
              <label>DNI</label>
              <input type="text" name="cod_asesores" id="" class="form-control" onchange="Mayusculas(this)">
       </div>  

       <div class="form-group">
              <label>Contraseña</label>
              <input type="text" name="pass" id="" class="form-control" onchange="Mayusculas(this)">
       </div>
       <div class="form-group">
              <label>Tipo</label>
              <input type="text" name="tipo" id="" class="form-control" onchange="Mayusculas(this)">
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