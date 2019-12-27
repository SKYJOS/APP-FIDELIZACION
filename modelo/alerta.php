<?php 
class Alerta{

	function actualizar_activo()
			{  

				try {
					
				//$conexion   =  new Conexion();
				$bd         =  Conexion::get_conexion();
				$query      =  "UPDATE tb_usuario SET estado='1'  WHERE tipo='0'";
				$statement  =  $bd->prepare($query);
			
			
				
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
	function actualizar_desactivo()
			{  

				try {
					
				//$conexion   =  new Conexion();
				$bd         =  Conexion::get_conexion();
				$query      =  "UPDATE tb_usuario SET estado='0'  WHERE tipo='0'";
				$statement  =  $bd->prepare($query);
		
			
				
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