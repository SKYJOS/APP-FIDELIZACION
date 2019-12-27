<?php 

include '../../autoload.php';

$cod_registro=Funciones::validar_xss($_POST['id']);
$estado=Funciones::validar_xss($_POST['estado']);
$monto_total=Funciones::validar_xss($_POST['monto_total']);
$observaciones=Funciones::validar_xss($_POST['observaciones']);


/*a
echo $nombres;
echo $apellidos;
*/
//control  mas chif mas 7
// primero instalar lo desde preferences ... key binging..luego pegar:  { "keys": ["ctrl+7"], "command": "toggle_comment", "args": { "block": false } },
//  { "keys": ["ctrl+shift+7"], "command": "toggle_comment", "args": { "block": true } }
//eso es todo....
$fidelizacion=new Fidelizacion();
$valor=$fidelizacion->agregar($cod_registro,$estado,$monto_total,$observaciones);
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
    text: "Consulte al área de soporte",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}


 ?>