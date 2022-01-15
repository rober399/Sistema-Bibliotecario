<?php 
require'BD/conexionBD.php';
$correo=$_POST['correo'];
$query=mysqli_query($mysqli, "SELECT adminNombre, email FROM administradores WHERE email='$correo'" );
 $resultado=mysqli_num_rows($query);
    if ($resultado>0) {
        while ($data= mysqli_fetch_array($query)) { ?>

            <!DOCTYPE html>
<html lang="es">
<head>
    <title>Restablecer Contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
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

    <br>
    <center>
   

    <a href="index.php"  class="btn btn-primary"  style="background-color:blue; border-color:blue; color:white; "> &nbsp;&nbsp; Atras</a>
    </center>

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

    <center>
        <div class="login-content">
        
            
            <p>
                <style>
                
  body {
  background-color: lightgrey;
  color: white;
}       </style>

    <center>
       
            
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div >
                    ¡Hola! <?php echo $data['adminNombre']; ?>.
                </div>
                    <img src="assets/img/recuperar.jfif" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                    
                </div>
                
           
        
    </center>
   
            
                <form autocomplete="off" action="ActualizarC.php" method="post">
                     <center>
        
                   
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
                            <div class="group-material">
                                 <label class="text-center" style="width: 100%;">Ingresa tu nueva contraseña</label>
                                <input type="password"  name="contraseña" required="" class="material-control tooltips-general text-center" placeholder="Ingresa tu nueva contraseña" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escribe tu nueva contraseña" style="margin: 30px;">
                                
                               
                            </div> 
                             <div class="group-material">
                                 <label class="text-center" style="width: 100%;">Confirmar nueva contraseña</label>
                                <input type="password"  name="confirmar" required="" class="material-control tooltips-general text-center" placeholder="Confirmar nueva contraseña" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escribe tu nueva contraseña" style="margin: 30px;">
                                
                               
                            </div> 
                            <button type="submit" class="btn btn-primary"  style="background-color:blue; border-color:blue; color:white; "> &nbsp;&nbsp; Actualizar </button>
                       </div>
                   
                    
       </center>
                </form>
               
           
      
            </center>
        <?php } ?>
<?php  
    }else{
        echo '<script language="javascript">alert("Error Correo no localizado");window.location.href="RecuperarC.php"</script>';
    }
 ?>
