<?php 

include '../../autoload.php';


$cod_asesores=intval($_POST['usuariolg']);
$pass=$_POST['passlg'];

$usuario=new Asesores();
$valor=$usuario->actualizar($cod_asesores,$pass);
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
<script> 
location='../../index.php' 
</script>