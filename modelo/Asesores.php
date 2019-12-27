<?php 


class  Asesores
{


		function lista()
			{
				
			try {
				
			$conexion   = Conexion::get_conexion();
			$query      =  "SELECT  * FROM tb_asesores";
			$statement  =  $conexion->prepare($query);
			$statement->execute();
			$result  =  $statement->fetchAll();
			return $result;
			} catch (Exception $e) {
				echo "Error:".$e->getMessage();
			}
			}



			function agregar($codigo,$asesor)
			{
				
			try {
				
			$conexion   = Conexion::get_conexion();
			$query      =  "INSERT INTO tb_asesores(dni,asesores)VALUES(:dni,:asesores)";
			$statement  =  $conexion->prepare($query);
			$statement->bindParam(':dni',$dni);
			$statement->bindParam(':asesores',$asesores);

			if ($statement) {
			$statement->execute();
			return "ok";

			} 
			else
			{
			return "error";
			}




			} catch (Exception $e) {
				echo "Error:".$e->getMessage();
			}
			}

		function actualizar($cod_asesores,$pass)
		{  

			try {
				
			//$conexion   =  new Conexion();
			$bd         =  Conexion::get_conexion();
			$query      =  "UPDATE tb_usuario SET pass=:pass  WHERE cod_asesores=:cod_asesores";
			$statement  =  $bd->prepare($query);
			$statement->bindParam(':cod_asesores',$cod_asesores);
			$statement->bindParam(':pass',$pass);
		
			
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