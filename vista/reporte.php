<?php include '../autoload.php'; 
$registro=new Registro();
Assets::principal('Reporte de Ventas');
Assets::datatables();
Assets::sweetalert();
Html::header();

?>	
  

	<?php 

	?>

	<div class="row">
		<div class="col-md-12">
				<?php include'../vista/nav3.php'; ?>

		</div>
	</div>
	
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
					
				</div>
				<div id="mensaje"></div>
				<div id="loader"></div>
				<div id="tabla"></div>				
			</div>
		</div>
	   
	<script src="../ajax/reporte.js"></script>
	<script>loadTable();</script>
	<?php Html::footer(); ?>

