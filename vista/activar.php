<?php 

include '../autoload.php';




$usuario=new Alerta();
$valor=$usuario->actualizar_activo();
//echo $valor;
if ($valor=='ok') {

header('Location: '.PATH.'vista/prende_apaga.php');


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


