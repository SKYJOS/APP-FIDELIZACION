<?php
include('db_con.php');

$stmt=$db_con->prepare('SELECT r.dni as DNI,p.producto as Producto,e.estado as Estado,f.monto_total as Monto_Total,f.observaciones as Observaciones,r.cliente as Cliente,t.documento as Tipo_Documento,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_tipo_documento as t on r.tipo_documento=t.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id');
$stmt->execute();


$columnHeader ='';
$columnHeader = "DNI"."\t"."Producto"."\t"."Estado"."\t"."Monto_Total"."\t"."Observaciones"."\t"."Cliente"."\t"."Tipo_Documento"."\t"."Documento"."\t"."Monto_Ofertado"."\t"."Tel_Registrado"."\t"."Tel_Referencia"."\t"."Servicio"."\t"."Observacion"."\t"."Fecha_Ingreso"."\t";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Reporte Estado de Venta.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

?>
