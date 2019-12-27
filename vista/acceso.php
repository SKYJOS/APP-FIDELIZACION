<?php 
$assets = new Assets();
$html   = new Html();
$assets ->principal('ATENTO');
$assets ->sweetalert();
?>
<script src="ajax/login.js"></script>
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
      <center>   <img src="img/atento1.png" width="250px" class="img-responsive" alt=""></center> 
    </div>
    
  
    <div class="main">
     <form  action="" id="formLg" >
        
        <input type="text" name="usuariolg"  placeholder="Usuario" required>
        <input type="password" name="passlg"  placeholder="Contraseña" required>
        
        <input type="submit" id="btn-ingresar" class="botonlg"  value="Entrar" >

        <a href="vista/actualizar_acceso.php" style="color:#F5CF00">Cambiar contraseña</a>
     </form>
    
    </div>
    <input type="hidden" id="path" value="<?php echo PATH; ?>">

    
    



    
  

<center><?php $html -> footer(); ?></center>
</div>
