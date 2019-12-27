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



function agregar($dni,$asesores)
{
	
try {
	
$conexion   = Conexion::get_conexion();
$query      =  "INSERT INTO tb_asesores(dni,asesores)VALUES(:dni,:asesores)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':dni',$dni);
$statement->bindParam(':asesores',$asesores);

if ($statement) {
$statement->execute();
//$a=PATH/vista/reporte.php;

return header("Location:../vista/usuario.php");

} 
else
{
	
return header("Location:../vista/usuario.php");
}




} catch (Exception $e) {
	echo header("Location:../vista/usuario.php");
}
}









}





 ?>