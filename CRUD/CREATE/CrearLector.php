<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
include'../../BD/conexionBD.php'; 

if (!empty($_POST)) {
    $tipo=$_POST['tipo'];
    $carnet=$_POST['carnet'];
    $nombreUs=$_POST['nombreUs'];
    $apellidoUs=$_POST['apellidoUs'];
    $sexo=$_POST['sexo'];
    $tipoUs=$_POST['tipoUs'];
    $query=mysqli_query($mysqli, "SELECT * FROM usuarios WHERE  carnet='$carnet'");
        $resultado=mysqli_fetch_array($query);
        if ($resultado>0) {
            echo '<script language="javascript">alert("Usuario ya existe");window.location.href="CrearLector.php"</script>';
        }else{
            $query_insert=mysqli_query($mysqli,"INSERT INTO usuarios
            (tipo_identificacion,carnet,nombreUs,apellidoUs,sexo,tipoUs)
            VALUES('$tipo','$carnet','$nombreUs','$apellidoUs','$sexo','$tipoUs')");
            if ($query_insert) {
                 echo '<script language="javascript">alert("Lector  Creado Correctamente");window.location.href="../READ/ListaLector.php"</script>';
            }else{
                 echo '<script language="javascript">alert("Error");window.location.href="CrearLector.php"</script>';
            }
        }  
}
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nuevo libro</title>
    <?php include'../../INCLUDES/link2.php'; ?>
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

                               &nbsp; Pr??stamos <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="CrearPrestamo.php"><i class="fas fa-plus-circle"></i>&nbsp; Nuevo pr??stamo</a>
                                </li>
                                <li>
                                    <a href="../READ/ListaPrestamo.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de pr??stamos</a>
                                </li>
                               
                            </ul>
                        </li>

                         <?php } ?>
                       
                        
                        
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-atlas"></i>

                             &nbsp; Categor??as <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="CrearCategoria.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar categor??a</a>
                                </li>
                                <li>
                                    <a href="../READ/ListaCategoria.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Categor??as</a>
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

        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                
                
                <a href="../../system/salir.php" class="btn-exit">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <!--<i class="fas fa-plus fa-fw"></i>--> &nbsp; Formulario de Registro de Lectores
                </h3>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                   
                    <li>
                        <a href="../READ/ListaLector.php" style="border-color: blue;"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Lectores</a>
                    </li>
                </ul>
            </div>
            <!--CONTENT-->
            <div class="container-fluid">
              <form action="" class="form-neon needs-validation" method="POST" >
				<fieldset>
					
					<div class="container-fluid">
						<div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sexo" class="bmd-label text-dark">Tipo de identificador</label><br>
                                    <select pattern="[a-zA-Z???????????????????????? ]{1,40}" class="form-control" name="tipo" id="sexo" required>
                                        <option value="" disabled="" selected="">Seleccione Tipo</option>
                                        <option value="Carnet">Carnet</option>
                                        <option value="DUI">DUI</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Debe seleccionar Tipo de identificasion
                                    </div>
                                </div>
                            </div>

							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="nombreUs" class="bmd-label text-dark">N?? de identificaci??n</label><br>
									<input required type="text" pattern="[a-zA-Z???????????????????????? 0-9 ]{1,40}" class="form-control" name="carnet" placeholder="Digite Numero de Identificaci??n" id="nombreUs"  required>
									<div class="invalid-feedback">
										Falta identificador
									</div>
								</div>
							</div>

							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="nombreUs" class="bmd-label text-dark">Nombre</label><br>
									<input required type="text" pattern="[a-zA-Z???????????????????????? ]{1,40}" class="form-control" name="nombreUs" placeholder="Digite Nombre del Lector" id="nombreUs"  required>
									<div class="invalid-feedback">
										Falta el Nombre
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="apellidoUs" class="bmd-label text-dark">Apellido</label><br>
									<input required type="text" pattern="[a-zA-Z???????????????????????? ]{1,40}" class="form-control" name="apellidoUs" placeholder="Digite Apellido del Lector" id="apellidoUs" required>
									<div class="invalid-feedback">
										Falta el Apellido
									</div>
								</div>
							</div>
							
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="sexo" class="bmd-label text-dark">Seleccione Sexo</label><br>
									<select pattern="[a-zA-Z???????????????????????? ]{1,40}" class="form-control" name="sexo" id="sexo" required>
										<option value="" disabled="" selected="">Seleccione Sexo</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
									<div class="invalid-feedback">
										Debe seleccionar el Sexo
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="tipoUs" class="bmd-label text-dark">Sector</label><br>
									<select pattern="[a-zA-Z0-9????????????????????????#- ]{1,150}" class="form-control" name="tipoUs" id="tipoUs" required>
										<option value="" disabled="" selected="">Seleccione Sector</option>
										<option value="Docente">Docente</option>
										<option value="Estudiante">Estudiante</option>
										<option value="Otro">Otro</option>
									</select>
									<div class="invalid-feedback">
									Debe seleccionar el nivel
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" pattern="[a-zA-Z0-9-]{1,27}" class="form-control" name="estatus" id="estatus" maxlength="1" value="0">
					</div>
				</fieldset>
				<br>
				<p class="text-center" style="margin-top: 40px;">
			
					 <button type="submit" class="btn btn-raised btn btn-dark"> &nbsp; GUARDAR</button>
				</p>
			</form>
            </div>
        </section>




    </main>


    <!--=============================================
	=            Include JavaScript files           =
	==============================================-->
   <?php include'../../INCLUDES/js2.php'; ?>
</body>

</html>
