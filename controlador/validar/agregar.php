<?php 

include '../../autoload.php';

$cod_asesores=Funciones::validar_xss($_POST['cod_asesores']);
$pass=Funciones::validar_xss($_POST['pass']);
$tipo=Funciones::validar_xss($_POST['tipo']);



/*a
echo $nombres;
echo $apellidos;
*/
//control  mas chif mas 7
// primero instalar lo desde preferences ... key binging..luego pegar:  { "keys": ["ctrl+7"], "command": "toggle_comment", "args": { "block": false } },
//  { "keys": ["ctrl+shift+7"], "command": "toggle_comment", "args": { "block": true } }
//eso es todo....
$registro=new user();
$valor=$registro->agregar($cod_asesores,$pass,$tipo);
//echo $valor;

if ($valor=='ok') {
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Registro Agregado",
    type:"success",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
} else {
	echo '<script>
    swal({
    title: "Error",
    text: "El usuario  no exite en la base de datos",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}


 ?>