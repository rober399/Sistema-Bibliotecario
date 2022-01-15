<?php 
require_once 'BD/conexionBD.php';
$alert='';
session_start();
if (!empty($_SESSION['active'])) {
  header('location:system/index.php');
}else{
if(!empty($_POST)){
$usuario=mysqli_real_escape_string($mysqli, $_POST['usuario']);
$contraseña=mysqli_real_escape_string($mysqli, $_POST['contraseña']);
$query=mysqli_query($mysqli, "SELECT * FROM administradores WHERE usuario='$usuario' AND contraseña='$contraseña'" );
mysqli_close($mysqli);
$resultado=mysqli_num_rows($query);
if ($resultado>0) {
  $data=mysqli_fetch_array($query);
  $_SESSION['active']= true;
  $_SESSION['idAdmin']=$data['idAdmin'];
  $_SESSION['usuario']=$data['usuario'];
  $_SESSION['rol']=$data['rol'];
  header('location:system/index.php');
}else//la consulta no coincide con los datos ingresados por el usuario
{
  echo '<script language="javascript">alert("Contraseña Incorrecta")</script>';
  session_destroy();
} 
}
}

?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file -->
	<script src="js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<style>
  
img{
  border-radius: 12px;
}
  
 body{
    background:url(assets/img/2.jpg) no-repeat; 
    background-size:100% 100%;
  }

.log{
  height: 400px;
  width:250px;
  padding: 50px;
}

</style>

	<div class="login-container">
		
		<div class="login-content">
		
			
			<p>
				<style>
				
  body {
  background-color: lightgrey;
  color: white;
}		</style>
				<h1 class="text-center">Inicia sesión</h1>
			</p>
			<form action="" method="POST">
				<div class="form-group">
					<label for="usuario" class="text-light" ><i class="fas fa-user-secret"></i> &nbsp; Administrador</label>
					<br>

					<input type="text" class="form-control" style="background-color: white; text-align: center;" id="usuario" name="usuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35">
				</div>
				<div class="form-group">
					<label for="contraseña" class="text-light"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
                     <br>

					<input type="password" class="form-control" style="background-color: white; text-align: center;" id="contraseña" name="contraseña" maxlength="200">

					<i class="fas fa-eye" id="boton" style="padding-left: 265px;"></i>

					<script type="text/javascript">
            var boton  = document.getElementById('boton');
            var input  = document.getElementById('contraseña');

            boton.addEventListener('click', mostrarContraseña);

            function mostrarContraseña(){
              if (input.type == "password") {
                input.type = "text";
                setTimeout("ocultar()", 2000);
              }else {
                input.type = "password";
              }
            }
            function ocultar(){
              input.type = "password";
            }


          </script>
					
<br>

				</div>
				<button class="btn-login text-center" style="background-color:blue; 
				border-color:blue; 
				color:white">ENTRAR</button>
				 <div class="form-group text-center forgotten-password">
              <div><a href="RecuperarC.php" class="password" style="color: white;">¿No recuerda su contraseña?</a></div>
            </div>
				
				
			</form>
		</div>
	</div>

	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="js/jquery-3.4.1.min.js" ></script>

	<!-- popper -->
	<script src="js/popper.min.js" ></script>

	<!-- Bootstrap V4.3 -->
	<script src="js/bootstrap.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

	<script src="js/main.js" ></script>
</body>
</html>