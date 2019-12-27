<?php 

include '../../autoload.php';
include '../home.php';

 ?>
 <?php if (count(Reporte::lista_asesores())>0): ?>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <!-- h3.panel-title{} -->
      <h3 class="panel-title">Reporte de Pre-Venta</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="consulta" class="table table-condensed">
          <thead>
            <tr>
            
              <th>Producto</th>
              <th>Cantidad</th>            
              <th>Fecha de Registro</th>
            
       
            </tr>
          </thead>
          <tbody>
           <?php foreach (Reporte::lista_asesores() as $key => $value): ?>
            <tr>
              
         
              <td><?php echo $value['producto']; ?></td>
              <td><?php echo $value['Cantidad']; ?></td>                      
              <td><?php echo $value['Fecha']; ?></td>
             

            </tr>
           <?php endforeach ?>
            </tbody>
        </table>
        
      </div>
    </div>
  </div>
<script>
    $(document).ready(function(){
        $('#consulta').DataTable();
    });
</script>
 <?php else: ?>
  <p class="alert alert-warning">No hay registros disponibles</p>
 <?php endif ?>