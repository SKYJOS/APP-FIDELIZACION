<?php 
#error_reporting(0);
date_default_timezone_set('America/Lima');

#define("PATH", "http://".$_SERVER['SERVER_NAME'].substr(dirname(__FILE__).DIRECTORY_SEPARATOR,strlen($_SERVER['DOCUMENT_ROOT'])));
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
define("PATH","http://localhost/APP-FIDELIZACION/");
define("FOLDER","APP-FIDELIZACION/");
define("RUTA", dirname(__FILE__).DIRECTORY_SEPARATOR);
define("SERVER","localhost");
define("USER", "root");
define("PASS", "");
define("BD", "db_cross");
define("FECHA",'Y-m-d');

$key  = date('Y-m-d').$_SERVER['SERVER_NAME'].FOLDER;
//$id  = session_id();
define("KEY","502ff82f7-APP-FIDELIZACION");
define("ID", "id");
define("COD_ASESORES", "cod_asesores");


 ?>
