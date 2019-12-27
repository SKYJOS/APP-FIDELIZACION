<?php 

include '../../autoload.php';

$id=intval($_POST['id']);
$cod_asesores=intval($_POST['cod_asesores']);
$pass=intval($_POST['pass']);
$tipo=intval($_POST['tipo']);

$usuario=new user();
$valor=$usuario->actualizar($id,$cod_asesores,$pass,$tipo);
//echo $valor;
if ($valor=='ok') {


	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Registro Actualizado",
    type:"success",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
} else {
	echo '<script>
    swal({
    title: "Error",
    text: "Consulte al área de soporte",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}

 ?>
