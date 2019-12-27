<?php 

include '../../autoload.php';

$id=($_POST['id']);
$estado=($_POST['estado']);
$observaciones=($_POST['observaciones']);


$usuario=new Fidelizacion();
$valor=$usuario->actualizar($id,$estado,$observaciones);
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
