

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>

	<?php 
	include'../INCLUDES/link.php';
	 ?>


</head>
<body>
	
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				
					
					
					
					<img src="../assets/img/LOGO.png" height="180px" width="300px">
					
			
				<?php 
include '../INCLUDES/nav.php';
				 ?>
		</section>

		<!-- Page content -->
		<section class="full-box page-content">

                
                     
                    <!--
                    <img src="./assets/img/logo.jpg" class="img-fluid" alt="Avatar">
                    
                    -->
                    
              
                    <!--Imprime el nombre del administrador-->
               
                  
               
			<nav class="full-box navbar-info">
				
				   
                    
				<!--Boton ce cerrar sesion-->
				<a href="salir.php" class="btn-exit-system">
					<i class="fas fa-power-off"></i><strong class="text-center">
                       
                    </strong>
                </a>
			</nav>
				

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<!--<i class="fab fa-dashcube fa-fw"></i> --> &nbsp;<center> BIENVENIDOS A BIBLIOTECA DEL CENTRO ESCOLAR SAN ISIDRO</center>
				
				</h3>
                <center><img src="../assets/img/led.jpg" class="img-fluid" alt="Avatar"></center>
				<p class="text-justify">
					
				</p>
			</div>
			
			
			</section>
	</main>
	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="../js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="../js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="../js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="../js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="../js/main.js" ></script>
</body>
</html>