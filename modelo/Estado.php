<?php 
class Estado{

function lista()
{

try {
	
//$conexion   =  new Conexion();
$bd         =  Conexion::get_conexion();
$query      =  "SELECT id,estado from tb_estado";
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