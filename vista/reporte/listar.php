  <?php 

include '../../autoload.php';
include '../home.php';

 ?> 

  <?php if (count(Reporte::lista_fidelizacion())>0): ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <!-- h3.panel-title{} -->
      <h3 class="panel-title">Reporte de Registro de Fidelización</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="consulta" class="table table-condensed">
          <thead>
            <tr>
            
 

              <th>Producto</th>
              <th>Cantidad</th>
              <th>Estado</th>
            
              <th>Venta</th>
                   
              <th>Servicio</th>
                  
    
            </tr>
          </thead>
          <tbody>
           <?php foreach (Reporte::lista_fidelizacion() as $key => $value): ?>
            <tr>
              
         
              <td><?php echo $value['producto']; ?></td>
              <td><?php echo $value['Cantidad']; ?></td>
              <td><?php echo $value['estado']; ?></td>
            
              <td><?php echo $value['total']; ?></td>         
              <td><?php echo $value['Servicio']; ?></td>           
         
             

            </tr>
           <?php endforeach ?>
            </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <!-- Modal -->  
  <script>
    $(document).ready(function(){
        $('#consulta').DataTable();
    });
  </script>
 <?php else: ?>
  <p class="alert alert-warning">No hay registros disponibles</p>
 <?php endif ?>