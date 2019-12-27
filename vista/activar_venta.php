<?php 

include '../autoload.php';

$cod_registro=Funciones::validar_xss($_POST['id']);



$usuario=new Venta_Fidelizada();
$valor=$usuario->actualizar_activo($cod_registro);
//echo $valor;
if ($valor=='ok') {

header('Location: '.PATH.'vista/fidelizacion.php');


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


