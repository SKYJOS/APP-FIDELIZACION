<?php 
include '../autoload.php'; 
$session = new Session();
$assets = new Assets();
$html   = new Html();
$assets ->principal('ATENTO');
$assets ->sweetalert();
?>

<?php 
  
  //include'vista/acceso/agregar.php';
  ?>
<?php $html->header(); ?>
<div class="row">
  <div class="col-md-12">
     <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
    </div>
  </div>  

    <div class="ima">
      <center>   <img src="../img/atento1.png" width="250px" class="img-responsive" alt=""></center> 
    </div>
    
  
    <div class="main">
      <p>Consideraciones de la clave: Mínimo 8 caracteres entre números y letras</p>
     <form  action="../controlador/acceso/actualizar.php"  method="post">
        
        <input type="text" name="usuariolg"  placeholder="Usuario" minlength="8" required >
       
        <input type="password" name="passlg"  placeholder="Contraseña" required>
        
        
        <input type="submit" id="btn-ingresar" class="botonlg"  value="Entrar" >


     </form>
    
    </div>
    <input type="hidden" id="path" value="<?php echo PATH; ?>">






    
  

<?php $html -> footer(); ?>
</div>