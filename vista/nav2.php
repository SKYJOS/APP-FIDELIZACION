<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">REGISTRO DE CLIENTES</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
   
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH ?>vista/registro_fideliza.php">Clientes</a></li>  
            <li ><a href="<?php echo PATH ?>vista/estado_venta_fidelizacion.php">Estado de Venta</a></li>   
            <li class="two"><a href="<?php echo PATH ?>vista/fidelizacion.php">Fidelización</a></li>
            <li class="two"><a href="<?php echo PATH ?>vista/usuario.php">Mantenimiento de usuarios</a></li>

        
              

    
          </ul>
        </li>
      </ul>
      <script>
function validar(f){
f.enviar.value="Por favor, espere";
f.enviar.disabled=true;
f.usuario.value=(f.usuario.value=="")?"Anónimo":f. usuario.value;
return true}
</script>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="glyphicon glyphicon-user text-success"></i> <?php //echo $_SESSION[KEY.USUARIO]//echo $_POST['usuariolg']; ?> </a></li>
            

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH ?>controlador/logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>