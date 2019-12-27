<?php 

class Assets
{



function principal($titulo)
{

echo '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>'.$titulo.'</title>
<!-- metas -->
<meta http-equiv="refresh" content="1200">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<!--AGREGADO-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
<link rel="stylesheet" href="../flatly/bootstrap.min.css">
<link rel="stylesheet" href="../flatly/font.css">

<link rel="stylesheet" href="flatly/bootstrap.min.css">
<link rel="stylesheet" href="flatly/font.css">

<link rel="stylesheet" href="../../flatly/bootstrap.min.css">
<link rel="stylesheet" href="../../flatly/font.css">


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap.min.js"></script>



<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="../css/style.css">


<script>

function Mayusculas(field) {
field.value         = field.value.toUpperCase();

}
</script>
';


}

function datatables()
{
echo '<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>';
}


function sweetalert()
{
echo '  
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
}

function selectize()
{
echo '<link rel="stylesheet" href="http://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="http://selectize.github.io/selectize.js/js/selectize.js"></script>';
}


function jqueryiu()
{
	echo '<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
}








}








 ?>