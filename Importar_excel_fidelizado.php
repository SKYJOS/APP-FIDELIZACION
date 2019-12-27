<?php
	//Incluimos librería y archivo de conexión
	include('librerias/PHPEXCEL/PHPExcel.php');
    include('librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
	require 'conexion.php';
	
	//Consulta
$sql = "SELECT r.dni as DNI,p.producto as Producto,e.estado as Estado,f.monto_total as Monto_Total,f.observaciones as Observaciones,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('img/atento.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("ATENTO")->setDescription("Reporte de Clientes");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Clientes");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:L4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:L6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE ASESORES');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	

$sql = "SELECT r.dni as DNI,p.producto as Producto,e.estado as Estado,f.monto_total as Monto_Total,f.observaciones as Observaciones,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id";

	$resultado = $mysqli->query($sql);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'DNI DEL ASESOR');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'PRODUCTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'ESTADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'MONTO TOTAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'OBSERVACIONES');
	

	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'DOCUMENTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'MONTO OFERTADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'TELEFONO REGISTRADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'TELEFONO REFERENCIA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('J6', 'SERVICIO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('K6', 'OBSERVACION');
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('L6', 'FECHA DE INGRESO');

	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		


		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['DNI']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Producto']);	
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Estado']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Monto_Total']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Observaciones']);
		
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Documento']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Monto_Ofertado']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Tel_Registrado']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Tel_Referencia']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['Servicio']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['Observacion']);
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $rows['Fecha_Ingreso']);
	
		//$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, '=J'.$fila.'*K'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:L".$fila);
	
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte_Estado_Asesores.xls"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>