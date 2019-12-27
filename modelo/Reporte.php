<?php 

class Reporte
{
 


		function lista_asesores()
		{

		try {
			
		//$conexion   =  new Conexion();
		$bd         =  Conexion::get_conexion();
		$query      =  "SELECT p.producto,count(r.id) as Cantidad,r.fecha_ingreso as Fecha FROM tb_registro as r inner join tb_producto as p  on r.producto=p.id  GROUP BY p.producto";

		$statement  =  $bd->prepare($query);

		$statement->execute();
		$result     =  $statement->fetchAll();
		return $result;


		} catch (Exception $e) {
			
		  echo "Error: ".$e->getMessage();

		}
		//3 vistas


		}

		function lista_fidelizacion()
		{

		try {
			
		//$conexion   =  new Conexion();
		$bd         =  Conexion::get_conexion();
		$query      =  "SELECT p.producto,count(*) as Cantidad,e.estado,SUM(f.monto_total) as total,s.servicio as Servicio FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join 
tb_producto as p  on r.producto=p.id where e.estado='VENTA CERRADA' group by Producto";

		$statement  =  $bd->prepare($query);

		$statement->execute();
		$result     =  $statement->fetchAll();
		return $result;


		} catch (Exception $e) {
			
		  echo "Error: ".$e->getMessage();

		}
		//3 vistas


		}



}

 ?>