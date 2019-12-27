<?php
	//Incluimos librería y archivo de conexión
	include('librerias/PHPEXCEL/PHPExcel.php');
    include('librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
	require 'conexion.php';
	
	//Consulta
	$sql = "SELECT p.producto as Producto,count(*) as Cantidad,e.estado as Estado,f.monto_total as Monto_Total,f.observaciones as Observaciones,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id group by Producto";
	$resultado = $mysqli->query($sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('img/atento.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("ATENTO")->setDescription("Reporte");
	
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
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:B4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:B6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE CLIENTES');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:B3');
	
	$sql = "SELECT p.producto as Producto,count(*) as Cantidad,e.estado as Estado,f.monto_total as Monto_Total,f.observaciones as Observaciones,r.documento as Documento,r.monto_oferta as Monto_Ofertado,r.tel_registrado as Tel_Registrado,r.tel_referencia as Tel_Referencia,s.servicio as Servicio,r.observaciones as Observacion,r.fecha_ingreso as Fecha_Ingreso FROM  tb_fidelizacion as f inner join tb_registro as r on f.cod_registro=r.id inner join tb_estado as e on f.estado=e.id inner join tb_servicio as s on r.servicio=s.id inner join tb_producto as p  on r.producto=p.id group by Producto";

	


	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'PRODUCTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'CANTIDAD');
	/*$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'ESTADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'MONTO TOTAL');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'OBSERVACIONES');	

	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'DOCUMENTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'MONTO OFERTADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'TELEFONO REGISTRADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('I6', 'TELEFONO REFERENCIA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('J6', 'SERVICIO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(60);
	$objPHPExcel->getActiveSheet()->setCellValue('K6', 'OBSERVACIONES');
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('L6', 'FECHA DE INGRESO');*/

	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $resultado->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['Producto']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['Cantidad']);
	/*	$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['Estado']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['Monto_Total']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['Observaciones']);	
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['Documento']);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['Monto_Ofertado']);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['Tel_Registrado']);
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['Tel_Referencia']);
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila, $rows['Servicio']);
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila, $rows['Observacion']);
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, $rows['Fecha_Ingreso']);*/
	
		//$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila, '=J'.$fila.'*K'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:B".$fila);
	
	$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Clientes!$B$7:$B$'.$fila);
	//$values2 = new PHPExcel_Chart_DataSeriesValues('Number', 'Clientes!$k$7:$k$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Clientes!$A$7:$A$'.$fila);
	
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
	$title->setCaption('Reporte de Registro del Cliente Fidelizados por Productos');
	
	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('A'.$filaGrafica);
	$filaFinal = $filaGrafica + 20;
	$chart->setBottomRightPosition('H'.$filaFinal);
	$chart->setTitle($title);
	
	// adicionar o gráfico à folha
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte_Estado.xls"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
?>