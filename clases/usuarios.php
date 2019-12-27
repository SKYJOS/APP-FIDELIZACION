<?php 


class  Usuarios
{


function lista()
{
	
try {
	
$conexion   = Conexion::get_conexion();
$query      =  "SELECT  * FROM tb_usuario";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;
} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}
}



function agregar($cod_asesores,$pass,$tipo)
{
	
try {
	
$conexion   = Conexion::get_conexion();
$query      =  "INSERT INTO tb_usuario(cod_asesores,pass,tipo)VALUES(:cod_asesores,:pass,:tipo)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':cod_asesores',$cod_asesores);
$statement->bindParam(':pass',$pass);
$statement->bindParam(':tipo',$tipo);

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