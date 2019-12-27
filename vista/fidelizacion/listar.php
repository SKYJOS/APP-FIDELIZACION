<?php 

include '../../autoload.php';
include '../home.php';

 ?>
 <?php if (count(Registro::lista())>0): ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <!-- h3.panel-title{} -->
      <h3 class="panel-title">Lista de Ventas</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table id="consulta" class="table table-condensed">
          <thead>
            <tr>
            
              <th>Id</th>
              <th>Producto</th>          
              <th>Documento</th>          
              <th>Ofertado</th>
              <th>Teléfono</th>            
              <th>Servicio</th>
              <th>Fidelizar</th>            
       
            </tr>
          </thead>
          <tbody>
           <?php foreach (Registro::lista() as $key => $value): ?>
            <tr>
              
              <td><?php echo $value['id']; ?></td>
              <td><?php echo $value['Producto']; ?></td>
             
              <td><?php echo $value['documento']; ?></td>
            
              <td><?php echo $value['monto_oferta']; ?></td>
              <td><?php echo $value['tel_registrado']; ?></td>
           
              <td><?php echo $value['Servicio']; ?></td>
              <td>
                
                <button class="btn btn-primary btn-edit" data-id="<?php echo $value['id'];?>"><i class="glyphicon glyphicon-edit"></i>
                  
                </button>


              </td>

            </tr>
           <?php endforeach ?>
            </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <!-- Modal -->
  <script>
    $(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("../vista/fidelizacion/actualizar.php","id="+id,function(data){
        $("#form-actualizar").html(data);
      });
      $('#modal-actualizar').modal('show');
    });
  </script>
  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Fidelizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-actualizar"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>
    $(document).ready(function(){
        $('#consulta').DataTable();
    });
  </script>
 <?php else: ?>
  <p class="alert alert-warning">No hay registros disponibles</p>
 <?php endif ?>