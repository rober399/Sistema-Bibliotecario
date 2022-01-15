
<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
include'../../BD/conexionBD.php'; 

if (!empty($_POST)) {
    $dui=$_POST['DUI'];
    $nombre=$_POST['adminNombre'];
    $apellido=$_POST['adminApellido'];
    $sexo=$_POST['sexo'];
    $correo=$_POST['email'];
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $contraseñac=$_POST['contraseñac'];
    $rol=$_POST['rol'];
	$query=mysqli_query($mysqli, "SELECT * FROM administradores WHERE  usuario='$usuario'");
        $resultado=mysqli_fetch_array($query);
        if ($resultado>0) {
            echo '<script language="javascript">alert("Error Usuario ya existe");window.location.href="CrearAdmin.php"</script>';
        }elseif ($contraseña!=$contraseñac) {
              echo '<script language="javascript">alert("Contraseñas no coinciden");window.location.href="CrearAdmin.php"</script>';
        }
        else{
            $query_insert=mysqli_query($mysqli,"INSERT INTO administradores
            (DUI,adminNombre,adminApellido,sexo,email,usuario,contraseña,rol)
            VALUES('$dui','$nombre','$apellido','$sexo','$correo','$usuario','$contraseña','$rol')");
            if ($query_insert) {
                 echo '<script language="javascript">alert("Usuario Creado Correctamente");window.location.href="../READ/ListaAdmin.php"</script>';
            }else{
                 echo '<script language="javascript">alert("Error");window.location.href="CrearAdmin.php"</script>';
            }
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
                                 <a href="CrearAdmin.php"><i class="fas fa-plus-circle"></i>

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
                                    <a href="CrearLibro.php"><i class="fas fa-plus-circle"></i>Agregar Libro</a>
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
                                    <a href="CrearLector.php"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Lector</a>
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
                                    <a href="CrearPrestamo.php"><i class="fas fa-plus-circle"></i>&nbsp; Nuevo préstamo</a>
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
                                    <a href="CrearCategoria.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar categoría</a>
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
                                    <a href="CrearEditorial.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar editorial</a>
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
                    <i class="fas fa-power-off"></i><strong class="text-center">
                        <?php
                        echo $_SESSION['usuario'];
                        ?>
                    </strong>
                </a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<!--<i class="fas fa-plus fa-fw"></i>--> &nbsp; Formulario de Registro de Administradores
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
				
					<li>
						<a href="../READ/listaAdmin.php" style="border-color: blue;"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Administradores</a>
					</li>
				</ul>	
			</div>			
			<!-- Content -->
			<div class="container-fluid">
				<form action="#" class="form-neon"  method="POST" >
					<fieldset>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="DUI" class="bmd-label text-dark">DUI</label><br>
										<input required type="text" placeholder="Digite DUI" pattern="[0-9-]{1,20}" class="form-control" name="DUI" id="DUI" required>
										<div class="invalid-feedback">
                                       *El Campo DUI es obligatorio
                                    </div>
									</div>
								</div>
								
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="adminNombre" class="bmd-label text-dark">Nombres</label><br>
										<input required type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="adminNombre" placeholder="Digite Nombre" id="adminNombre" required>
										<div class="invalid-feedback">
                                       *El Campo Nombre es obligatorio
                                    </div>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="adminApellido" class="bmd-label  text-dark">Apellidos</label><br>
										<input required type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="adminApellido" placeholder="Digite Apellido "id="adminApellido" required>
										<div class="invalid-feedback">
                                       *El Campo Apellido es obligatorio
                                    </div>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="email" class="bmd-label  text-dark">Correo electronico</label><br>
										<input required type="email" class="form-control" name="email" placeholder="Digite Correo" id="email">
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
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ,0-9 ]{1,35}" class="form-control" name="usuario" placeholder="Digite Usuario" id="usuario" required>
										<div class="invalid-feedback">
                                       *El Nombre de usuario es obligatorio
                                    </div>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="contraseña" class="bmd-label text-dark">Contraseña</label><br>
										<input type="password" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ, 0-9]{1,35}" class="form-control" name="contraseña" placeholder="Digite Contraseña"id="contraseña"  required>
										<div class="invalid-feedback">
                                       *El Campo contraseña es obligatorio
                                    </div>
									</div>
								</div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="contraseñac" class="bmd-label text-dark">Confirmar Contraseña</label><br>
                                        <input type="password" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ, 0-9]{1,35}" class="form-control" name="contraseñac" placeholder="Confirme Contraseña" id="contraseñac"  required>
                                        <div class="invalid-feedback">
                                       *El Campo contraseña es obligatorio
                                    </div>
                                    </div>
                                </div>

								
							<div class="col-12 col-md-4">
                                    <?php
                                   
                                    $consulta = "SELECT * FROM rol";
                                    $consulta2 = $mysqli->query($consulta);

                                    ?>
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
					</fieldset>

							
						
					
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-dark"> &nbsp; GUARDAR</button>
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