<?php 
class Venta_Fidelizada{

	function actualizar_activo($id)
			{  

				try {
					
				//$conexion   =  new Conexion();
				$bd         =  Conexion::get_conexion();
				$query      =  "UPDATE tb_registro SET estado='1' WHERE id=:id";
				$statement  =  $bd->prepare($query);
				$statement->bindParam(':id',$id);
			
			
				
				if ($statement) 
				{ 
				  $statement->execute();
				  return "ok";
				}
				else
				{
				  return "error";
				}



				} catch (Exception $e) {
					
				echo "Error: ".$e->getMessage();

				}

			}




} 
?>