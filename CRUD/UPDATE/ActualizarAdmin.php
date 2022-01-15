
<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
include'../../BD/conexionBD.php'; 
 $alert='';
if (!empty($_POST)) {   
	$dui=$_POST['DUI'];
    $nombre=$_POST['adminNombre'];
    $apellido=$_POST['adminApellido'];
    $sexo=$_POST['sexo'];
    $correo=$_POST['email'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $rol=$_POST['rol'];
        
            if (empty($_POST['contraseña'])) {
               $sql_update = mysqli_query($mysqli,
                "UPDATE administradores SET DUI='$dui', adminNombre='$nombre', adminApellido='$apellido', sexo='$sexo', email='$correo', usuario='$usuario',rol='$rol' 
                WHERE  idAdmin= $dui");
            }else{
               $sql_update = mysqli_query($mysqli,
                "UPDATE administradores SET DUI='$dui', adminNombre='$nombre', adminApellido='$apellido', sexo='$sexo', email='$correo', usuario='$usuario', contraseña='$contraseña', rol='$rol' 
                WHERE  idAdmin= $dui");
            }
            if ($sql_update) {
                 echo '<script language="javascript">alert("Datos  Actualizados Correctamente");window.location.href="../READ/ListaAdmin.php"</script>';
            }else{
                echo"error";
            }
        }
   

         $consulta = "SELECT * FROM rol";
         $consulta2 = $mysqli->query($consulta);



//codigo para mostrar datos en el formulario de actualizar
if (empty($_REQUEST['id'])) {
    header('Location:../../system/');
    mysqli_close($mysqli);
}
$iduser=$_REQUEST['id'];
$sql=mysqli_query($mysqli,"SELECT * FROM administradores  where idAdmin=$iduser");
mysqli_close($mysqli);
$result_sql=mysqli_num_rows($sql);
if ($result_sql==0) {
   header('Location:../READ/ListAdmin.php');
}else{
  
    while ($data=mysqli_fetch_array($sql)) {
        $duir=$data['DUI'];
    	$nombrer=$data['adminNombre'];
    	$apellidor=$data['adminApellido'];
    	$correor=$data['email'];
    	$usuarior=$data['usuario'];
    	$contraseñar=$data['contraseña'];
    }
}
 ?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Nuevo Administrador</title>
	<?php 
	include'../../INCLUDES/link2.php';
	?>
</head>
<body>
	
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
            <div class="full-box nav-lateral-bg show-nav-lateral"></div>
            <div class="full-box nav-lateral-content">
            
            
            
             <img src="../../assets/img/LOGO.png" height="180px" width="300px">

                
                
                
                <div class="full-box nav-lateral-bar"></div>
                <!--- menu -->
            <div class="full-box nav-lateral-bar"></div>
                <nav class="full-box nav-lateral-menu">
                     <ul>
                        
                        <li>
                        <a href="../../system/index.php"><i class="fas fa-home"></i>

                        &nbsp; Inicio</a>
                        </li>
                    
                    <?php 
                    if ($_SESSION['rol'] <2) {
                        ?>
                            <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user"></i>

                            &nbsp; Administrador <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                 <li>
                                 <a href="../CREATE/CrearAdmin.php"><i class="fas fa-plus-circle"></i>

                                  &nbsp; Nuevo Administrador</a>
                                </li>
                                
                                <li>
                                    <a href="../READ/ListaAdmin.php"><i class="fas fa-list-alt"></i>

                                   &nbsp; Lista de Administradores</a>
                                </li>
                            </ul>
                        </li>

                     <?php } ?>
                    

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-book"></i>

                            &nbsp; Libros <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                 <?php 
                        if ($_SESSION['rol'] <2) {
                        ?>
                                <li>
                                    <a href="../CREATE/CrearLibro.php"><i class="fas fa-plus-circle"></i>Agregar Libro</a>
                                </li>

                                  <?php } ?>
                                <li>
                                    <a href="../READ/ListaLibro.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Libros</a>
                                </li>
                            </ul>
                        </li>

                         <?php 
                    if ($_SESSION['rol'] <=2) {
                        ?>

                    <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-book-reader"></i>

                             &nbsp; Lectores <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CREATE/CrearLector.php"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Lector</a>
                                </li>
                                <li>
                                    <a href="../READ/ListaLector.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Lectores</a>
                                </li>
                            </ul>
                        </li>

                       

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-file-upload"></i>

                               &nbsp; Préstamos <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CREATE/CrearPrestamo.php"><i class="fas fa-plus-circle"></i>&nbsp; Nuevo préstamo</a>
                                </li>
                                <li>
                                    <a href="../READ/ListaPrestamo.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de préstamos</a>
                                </li>
                               
                            </ul>
                        </li>

                         <?php } ?>
                       
                        
                        
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-atlas"></i>

                             &nbsp; Categorías <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CREATE/CrearCategoria.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar categoría</a>
                                </li>
                                <li>
                                    <a href="../READ/ListaCategoria.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Categorías</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-university"></i>

                             &nbsp; Editoriales <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CREATE/CrearEditorial.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar editorial</a>
                                </li>
                                <li>
                                    <a href="../READ/ListaEditorial.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Editoriales</a>
                                </li>
                                
                            </ul>
                        </li>

                         <?php 
                    if ($_SESSION['rol'] <2) {
                        ?>
                       
            
                     <li>
                        <a href="../../backupDB/descarga.php"><i class="fas fa-copy"></i>

                        &nbsp; Backup</a>
                        </li>
                        
                         <?php } ?>


                    </ul>
                </nav>
            </div>
            </div>
        </section>





		<!-- Page content -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				
				
				<a href="../../system/salir.php" class="btn-exit">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<!--<i class="fas fa-plus fa-fw"></i>--> &nbsp; Actualizar Administrador
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
				
					<li>
						<a href="../READ/ListaAdmin.php" style="border-color: blue;"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Administradores</a>
					</li>
				</ul>	
			</div>			
			<!-- Content -->
			<div class="container-fluid">
				<form action="" class="form-neon"  method="POST" >
					<fieldset>
						
						<div class="container-fluid">
							<div class="row">
									<div class="form-group">
										
										<input type="hidden" pattern="[0-9-]{1,20}" class="form-control" name="DUI" id="DUI" value="<?php echo $iduser; ?>" required>
										
									</div>
								
								
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="adminNombre" class="bmd-label text-dark">Nombres</label><br>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="adminNombre" id="adminNombre" value="<?php echo $nombrer; ?>" required>
										<div class="invalid-feedback">
                                       *El Campo Nombre es obligatorio
                                    </div>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="adminApellido" class="bmd-label text-dark">Apellidos</label><br>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="adminApellido" id="adminApellido" value="<?php echo $apellidor; ?>" required>
										<div class="invalid-feedback">
                                       *El Campo Apellido es obligatorio
                                    </div>
									</div>
								</div>
                               
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="email" class="bmd-label text-dark">Correo electronico</label><br>
										<input type="email" class="form-control" name="email" id="email" value="<?php echo $correor; ?>">
										<div class="invalid-feedback">
                                       *El Campo Correo electronico es obligatorio
                                    </div>
									</div>
								</div>
								    <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="tipoUs" class="bmd-label text-dark">Sexo</label><br>
                                        <select pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="sexo" id="tipoUs" required>
                                            <option value="" disabled="" selected="">Seleccione Sexo</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        
                                        </select>
                                        <div class="invalid-feedback">
                                        Debe seleccionar el nivel
                                        </div>
                                    </div>
                                </div>
								

								<div class="col-12 col-md-4">
									<div class="form-group">
										<!--------------------------fecha actual --------------->
										<?php 
										date_default_timezone_set('America/El_Salvador');
										 ?>
										<input type="hidden"  name="fechaRegistro" id="fechaRegistro" value="<?php echo date('Y/m/d'); ?>" required>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br><br>
					<fieldset>
						
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario" class="bmd-label text-dark">Nombre de Usuario</label><br>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ,0-9 ]{1,35}" class="form-control" name="usuario" id="usuario" value="<?php echo $usuarior; ?>" required>
										<div class="invalid-feedback">
                                       *El Nombre de usuario es obligatorio
                                    </div>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="contraseña" class="bmd-label text-dark">Contraseña</label><br>
										<input type="password" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ, 0-9]{1,35}" class="form-control" name="contraseña" id="contraseña"  required>
										<div class="invalid-feedback">
                                       *El Campo contraseña es obligatorio
                                    </div>
									</div>
								</div>
                                <div class="col-12 col-md-4">
                                   
                                    <div class="form-group">
                                        <label for="rol" class="bmd-label text-dark">Rol</label><br>
                                        <select  class="form-control" name="rol"  required>
                                           <option value="" disabled="" selected="">Seleccione Rol</option>
                                            <?php

                                            while ($row = $consulta2->fetch_array(MYSQLI_ASSOC)) {

                                                echo "<option value=" . $row['id'] . ">" . $row['descripcion'] . "
                                                </option>";
                                            }

                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        *El Campo categoría es obligatorio
                                        </div>
                                    </div>

                                </div>
								
				

							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn btn-dark"> &nbsp; GUARDAR</button>
					</p>
				</form>
			</div>
		</section>
	</main>
	
		<?php 
	include'../../INCLUDES/js2.php';
	 ?>
	
</body>

</html>