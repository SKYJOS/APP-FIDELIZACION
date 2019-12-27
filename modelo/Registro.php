<?php 

class Registro
{

function lista_asesor()
{

try {
	
//$conexion   =  new Conexion();
$bd         =  Conexion::get_conexion();
$query      =  "SELECT id,dni FROM  tb_registro";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}
//3 vistas


}
 
function consulta($id,$campo){

try {
//$query      =  "SELECT u.id,u.nombres,u.apellidos,u.cod_area,a.descripcion as area,u.fecha FROM  usuario as u inner join area as a on u.cod_area=a.codigo where u.id=:id";
	
//$conexion   =  new Conexion();

//INSERT INTO `tb_registro` (`id`, `dni`, `producto`, `tipo_documento`, `documento`, `cliente`, `monto_oferta`, `tel_registrado`, `tel_referencia`, `servicio`, `observaciones`, `fecha_ingreso`) VALUES

$bd         =  Conexion::get_conexion();
$query      =  "SELECT r.dni,p.producto as Producto,r.documento,r.monto_oferta,r.tel_registrado,r.tel_referencia,s.servicio as Servicio,r.observaciones,r.fecha_ingreso FROM  tb_registro as r inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id  where r.id=:id";
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
$query      =  "SELECT r.id,r.dni,p.producto as Producto,r.documento,r.monto_oferta,r.tel_registrado,s.servicio as Servicio FROM  tb_registro as r inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id where r.estado  IS NULL";

$statement  =  $bd->prepare($query);

$statement->execute();
$result     =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();

}
//3 vistas


}


function agregar($dni,$producto,$documento,$monto_oferta,$tel_registrado,$tel_referencia,$servicio,$observaciones)
{

  try {
//$query      =  "SELECT c.cod_reclamo,c.documento,c.producto,c.num_cuenta,t.tipo,c.reclama,c.fecha_creacion FROM  tb_campania as c inner join tb_tipo as t on c.tipo=t.cod_tipo where c.id=:id";
  	
	//$conexion   =  new Conexion();
	$bd         =  Conexion::get_conexion();
	$query      =  "INSERT INTO tb_registro(dni,producto,documento,monto_oferta,tel_registrado,tel_referencia,servicio,observaciones) values (:dni,:producto,:documento,:monto_oferta,:tel_registrado,:tel_referencia,:servicio,:observaciones)";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':dni',$dni);
	$statement->bindParam(':producto',$producto);
	
	$statement->bindParam(':documento',$documento);

	$statement->bindParam(':monto_oferta',$monto_oferta);
	$statement->bindParam(':tel_registrado',$tel_registrado);
	$statement->bindParam(':tel_referencia',$tel_referencia);
	$statement->bindParam(':servicio',$servicio);
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


function actualizar($id,$cod_reclamo,$documento,$producto,$num_cuenta,$tipo,$reclama)
{  

	try {
		
	//$conexion   =  new Conexion();
	$bd         =  Conexion::get_conexion();
	$query      =  "UPDATE tb_campania SET cod_reclamo=:cod_reclamo,documento=:documento,producto=:producto,num_cuenta=:num_cuenta,tipo=:tipo,reclama=:reclama  WHERE id=:id";
	$statement  =  $bd->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':cod_reclamo',$cod_reclamo);
	$statement->bindParam(':documento',$documento);
	$statement->bindParam(':producto',$producto);
	$statement->bindParam(':num_cuenta',$num_cuenta);
	$statement->bindParam(':tipo',$tipo);
	$statement->bindParam(':reclama',$reclama);
	
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