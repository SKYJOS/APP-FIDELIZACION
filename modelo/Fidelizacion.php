<?php 

class Fidelizacion
{
 
function consultas($id,$campo){

try {
//$query      =  "SELECT u.id,u.nombres,u.apellidos,u.cod_area,a.descripcion as area,u.fecha FROM  usuario as u inner join area as a on u.cod_area=a.codigo where u.id=:id";
	
//$conexion   =  new Conexion();

//INSERT INTO `tb_registro` (`id`, `dni`, `producto`, `tipo_documento`, `documento`, `cliente`, `monto_oferta`, `tel_registrado`, `tel_referencia`, `servicio`, `observaciones`, `fecha_ingreso`) VALUES

$bd         =  Conexion::get_conexion();
$query      =  "SELECT f.id,r.dni,p.producto as Producto,f.estado,f.monto_total,f.observaciones as observaciones,r.documento,r.monto_oferta,r.tel_registrado,r.tel_referencia,s.servicio as Servicio,r.fecha_ingreso,f.fecha_registrado FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id where f.id=:id";
$statement  =  $bd->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result     =  $statement->fetch();
return $result[$campo];


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}


}

function consulta_estado($id,$campo){

try {
//$query      =  "SELECT u.id,u.nombres,u.apellidos,u.cod_area,a.descripcion as area,u.fecha FROM  usuario as u inner join area as a on u.cod_area=a.codigo where u.id=:id";
	
//$conexion   =  new Conexion();

//INSERT INTO `tb_registro` (`id`, `dni`, `producto`, `tipo_documento`, `documento`, `cliente`, `monto_oferta`, `tel_registrado`, `tel_referencia`, `servicio`, `observaciones`, `fecha_ingreso`) VALUES

$bd         =  Conexion::get_conexion();
$query      =  "SELECT f.estado,f.monto_total,f.observaciones FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id where r.id=:id";
$statement  =  $bd->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result     =  $statement->fetch();
return $result[$campo];


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}


}

function lista()
{

try {
	
//$conexion   =  new Conexion();
$bd         =  Conexion::get_conexion();
$query      =  "SELECT r.dni,e.estado,f.monto_total,f.observaciones,f.fecha_registrado FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}
//3 vistas


}


function agregar($cod_registro,$estado,$monto_total,$observaciones)
{

  try {
//$query      =  "SELECT c.cod_reclamo,c.documento,c.producto,c.num_cuenta,t.tipo,c.reclama,c.fecha_creacion FROM  tb_campania as c inner join tb_tipo as t on c.tipo=t.cod_tipo where c.id=:id";
  	
	//$conexion   =  new Conexion();
	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_fidelizacion(cod_registro,estado,monto_total,observaciones) values (:cod_registro,:estado,:monto_total,:observaciones)";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':cod_registro',$cod_registro);
	$statement->bindParam(':estado',$estado);
	$statement->bindParam(':monto_total',$monto_total);	
	$statement->bindParam(':observaciones',$observaciones);

	if ($statement) {
		$statement->execute();
		return "ok";
	} else {
		return "error";
	}
	
	
	
	
    
  } catch (Exception $e) {

  	echo "Error .... :-): ".$e->getMessage();
  	
  }


}


function eliminar($id)
{  

try {
	
//$conexion   =  new Conexion();
$bd         =  Conexion::get_conexion();
$query      =  "DELETE FROM tb_campania WHERE id=:id";
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


function actualizar($id,$estado,$observaciones)
{  

	try {
		
	//$conexion   =  new Conexion();
	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_fidelizacion SET estado=:estado,observaciones=:observaciones WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':estado',$estado);
	$statement->bindParam(':observaciones',$observaciones);

	
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