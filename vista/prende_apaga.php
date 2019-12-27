<?php include '../autoload.php'; 
$registro=new Registro();
Assets::principal('Prende-Apaga');
Assets::datatables();
Assets::sweetalert();
Html::header();

?>	


	<?php 

	//include'../vista/registro/eliminar.php';
	?>

	<div class="row">
		<div class="col-md-12">
			<?php include'../vista/nav5.php'; ?>
		</div>
	</div>
	<?php //echo $_SESSION['cod_asesores']; ?>
	<div class="row">
	    <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="../img/1.png" alt="">
                      </div>

                      <div class="item">
                        <img src="../img/2.png" alt="">
                      </div>

                      <div class="item">
                        <img src="../img/1.png" alt="">
                      </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
     </div>
	<div class="row">
			<div class="col-md-12">
				<div class="pull-right">
					<?php// echo $_POST['ana']; ?>
				</div>
				<div id="mensaje"></div>
				<div id="loader"></div>
				<div id="tabla"></div>				
			</div>
	</div>


  <form class="navbar-form navbar-left" action="activar.php" >       
  <button data-toggle="modal" href="#eliminar" class="btn btn-info">Activar</button>
  </form>


  <form class="navbar-form navbar-left" action="desactivar.php" >       
 <button data-toggle="modal" href="#eliminar" class="btn btn-info">Desactivar</button>
  </form>

  <?php Html::footer(); ?>
