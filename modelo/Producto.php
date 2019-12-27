<?php 
class Producto{

function lista()
{

try {
	
//$conexion   =  new Conexion();
$bd         =  Conexion::get_conexion();
$query      =  "SELECT * from tb_producto";
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