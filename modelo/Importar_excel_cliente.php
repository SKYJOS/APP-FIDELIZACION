<?php
	//Incluimos librería y archivo de conexión
	include('../librerias/PHPEXCEL/PHPExcel.php');
    include('../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
	require 'Conexion.php';
	
	//Consulta
	$sql = "SELECT r.dni as DNI,p.producto as Producto,r.cliente as Cliente,t.documento as Tipo_Documento,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_registro as r inner join tb_tipo_documento as t on r.tipo_documento=t.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('img/logo.png');//Logotipo
	
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
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:K4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:K6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE CLIENTES');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:K3');
	

	$sql = "SELECT r.dni as DNI,p.producto as Producto,r.cliente as Cliente,t.documento as Tipo_Documento,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_registro as r inner join tb_tipo_documento as t on r.tipo_documento=t.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id";

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'DNI');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'PRODUCTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'CLIENTE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'TIPO DE DOCUMENTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'DOCUMENTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'MONTO OFERTADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'TELEFONO REGISTRADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'TELEFONO REFERENCIA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'SERVICIO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('J6', 'OBSERVACION');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('K6', 'FECHA DE INGRESO');
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['DNI']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Producto']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Cliente']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Tipo_Documento']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Documento']);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Monto_Ofertado']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Tel_Registrado']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Tel_Referencia']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Servicio']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['Observacion']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['Fecha_Ingreso']);
	
		//$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, '=J'.$fila.'*K'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:K".$fila);
	
	$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Clientes!$F$7:$F$'.$fila);
	//$values2 = new PHPExcel_Chart_DataSeriesValues('Number', 'Clientes!$k$7:$k$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Clientes!$K$7:$K$'.$fila);
	
	// definir  gráfico
	$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
	PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
	array(0),
	array(),
	array($categories), // rótulos das columnas
	array($values) // valores
	
	);
	$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
	
	// inicializar gráfico
	$layout = new PHPExcel_Chart_Layout();
	$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
	
	// inicializar o gráfico
	$chart = new PHPExcel_Chart('exemplo', null, null, $plotarea);
	
	// definir título do gráfico
	$title = new PHPExcel_Chart_Title(null, $layout);
	$title->setCaption('Reporte de Registro del Cliente por Fecha');
	
	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('B'.$filaGrafica);
	$filaFinal = $filaGrafica + 10;
	$chart->setBottomRightPosition('E'.$filaFinal);
	$chart->setTitle($title);
	
	// adicionar o gráfico à folha
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Productos.xls"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>