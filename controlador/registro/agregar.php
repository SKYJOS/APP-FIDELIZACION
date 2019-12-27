<?php 

include '../../autoload.php';
$dni=Funciones::validar_xss($_POST['dni']);
$producto=Funciones::validar_xss($_POST['producto']);

$documento=Funciones::validar_xss($_POST['documento']);

$monto_oferta=Funciones::validar_xss($_POST['monto_oferta']);
$tel_registrado=Funciones::validar_xss($_POST['tel_registrado']);
$tel_referencia=Funciones::validar_xss($_POST['tel_referencia']);
$servicio=Funciones::validar_xss($_POST['servicio']);
$observaciones=Funciones::validar_xss($_POST['observaciones']);

//$tipo_moneda_val = number_format($tipo_moneda, 2,",",".");
//$tipo_moneda_val = number_format($tipo_moneda,2);
//$tipo_moneda_val= money_format('%i', $tipo_moneda) . "\n";
/*a
echo $nombres;
echo $apellidos;
*/
//control  mas chif mas 7
// primero instalar lo desde preferences ... key binging..luego pegar:  { "keys": ["ctrl+7"], "command": "toggle_comment", "args": { "block": false } },
//  { "keys": ["ctrl+shift+7"], "command": "toggle_comment", "args": { "block": true } }
//eso es todo....
$registro=new Registro();
$valor=$registro->agregar($dni,$producto,$documento,$monto_oferta,$tel_registrado,$tel_referencia,$servicio,$observaciones);
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
    text: "Consulte al area de soporte",
    type:"error",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
}


 ?>