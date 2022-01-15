<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
include'../../BD/conexionBD.php'; 

if (!empty($_POST)) {
    $libro=$_POST['libro'];
    $usuario=$_POST['usuario'];
    $admin=$_SESSION['idAdmin'];
    $cantidadL=$_POST['cantidadL'];
    $fechaLimite=$_POST['fechaLimite'];
    $observaciones=$_POST['observaciones'];
    $existencial=$_POST['numEjemplar'];

   if ($cantidadL>$existencial) {
          echo '<script language="javascript">alert("no hay existencias");window.location.href="../READ/ListaPrestamo.php"</script>';
            
   }else{

    $query_insert=mysqli_query($mysqli,"INSERT INTO prestamos
            (idLibroPrestamo,idUsuarioPrestamo,idAdminPrestamo,cantidadLibros,fechaLimite, fechaEntrega,observaciones)
            VALUES('$libro','$usuario','$admin','$cantidadL', '$fechaLimite', '', '$observaciones')");
            if ($query_insert) {
                 echo '<script language="javascript">alert("Prestamo  Creado Correctamente");window.location.href="../READ/ListaPrestamo.php"</script>';
                
            }else{
                 echo '<script language="javascript">alert("Error");window.location.href="CrearPrestamo.php"</script>';
            }
        }
        

    }

    if(empty($_GET['id'])){
        header('Location:../../system/index.php');
    }
    $iduser=$_GET['id'];
$sql=mysqli_query($mysqli,"SELECT * FROM libros  where idLibro=$iduser");
$opcion='';
while ($data=mysqli_fetch_array($sql)) {
        $ubicacion=$data['ubicacion'];
        $iduser=$data['idLibro'];
        $titulo=$data['titulo'];
        if ($iduser == $_GET['id']) {
            $opcion='<option selected value="'.$iduser.'" select>'.$titulo.$ubicacion.'</option>';
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


        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                
                
                <a href="../../system/salir.php" class="btn-exit">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <!--<i class="fas fa-plus fa-fw"></i>--> &nbsp; Formulario de Registro de Prestamos
                </h3>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                   
                    <li>
                        <a href="../READ/ListaPrestamo.php" style="border-color: blue;"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Prestamos</a>
                    </li>
                </ul>
            </div>

            <form action="../SEARCH/BuscarLibro.php">
                <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="numEjemplares" class="bmd-label text-dark">Buscar Libro Disponibles</label><br>
                    <input  type="text"  class="form-control" name="busqueda">
                    <div class="invalid-feedback">
                        *El Campo Numero de ejemplares es obligatorio
                    </div>
                </div>
            </div>
            </form>
            <!--CONTENT-->
            <div class="container-fluid">
                <form action="" class="form-neon needs-validation" method="POST">
                    <fieldset>
                       
                        <div class="container-fluid">
                            <div class="row">

                                <div class="form-group">
                                        
                                      
                                        
                                    </div>
                                  <div class="col-12 col-md-4">
                                    <?php
                                   
                                    $consulta = "SELECT * FROM libros WHERE numEjemplares>=1";
                                    $consulta2 = $mysqli->query($consulta);

                                   

                                    ?>
                                    <div class="form-group">
                                        <label for="idCategoriaLibro" class="bmd-label text-dark">Libro a Prestar</label><br>
                                        <select  class="form-control" name="libro" id="idCategoriaLibro" required>
                                           <?php echo $option; ?>
                                            <?php

                                            while ($row = $consulta2->fetch_array(MYSQLI_ASSOC)) {

                                                $exis=$row['numEjemplares'];
                                                echo "<option value=" . $row['idLibro'] . ">" . $row['titulo'] . "
                                                </option>";


                                            }

                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        *El Campo categoría es obligatorio
                                    </div>
                                    </div>

                                </div>
                                 <div class="col-12 col-md-4">
                                    <?php
                                   
                                    $consulta = "SELECT * FROM usuarios WHERE estatus=1";
                                    $consulta2 = $mysqli->query($consulta);

                                    ?>
                                    <div class="form-group">
                                        <label for="idCategoriaLibro" class="bmd-label text-dark">Lector que solicita Prestamo</label><br>
                                        <select  class="form-control" name="usuario" id="idCategoriaLibro" required>
                                           <option value="" disabled="" selected="">Seleccione Lector</option>
                                            <?php

                                            while ($row = $consulta2->fetch_array(MYSQLI_ASSOC)) {

                                                echo "<option value=" . $row['idUsuario'] . ">" . $row['nombreUs'] . "
                                                </option>";
                                            }

                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        *El Campo categoría es obligatorio
                                    </div>
                                    </div>

                                     

                                </div>
                                 <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="fechaLimite" class="bmd-label text-dark">Cantidad de libros a prestar</label><br>
                                    <input  type="number"  pattern="[0-9]{1,9}" class="form-control" name="cantidadL" id="cantidadL"  required="">
                                    <div class="invalid-feedback">
                                        *El Campo es obligatorio
                                    </div>
                                </div>
                          
                            </div>

                             <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="ubicacion" class="bmd-label text-dark">Ubicacion del Libro</label><br>
                                        <input type="text"  class="form-control" name="ubicacion" id="numEjemplares" placeholder="<?php echo $ubicacion; ?>" readonly>
                                        <div class="invalid-feedback">
                                        *El Campo ubicacion es obligatorio
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="fechaLimite" class="bmd-label text-dark">Fecha limite para devolución</label><br>
                                    <input type="date" class="form-control" name="fechaLimite" id="fechaLimite" required>
                                    <div class="invalid-feedback">
                                        *El Campo es obligatorio
                                    </div>
                                </div>
                            </div>
                                 <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="observaciones" class="bmd-label text-dark">Observaciones</label><br>
                                            <textarea class="form-control" rows="1" name="observaciones"> </textarea>
                                        <div class="invalid-feedback">
                                        *El Campo Numero de observaciones es obligatorio
                                    </div>
                                    </div>
                                </div>

                                <input type="hidden" pattern="[0-9-]{1,20}" class="form-control" name="numEjemplar" id="numEjemplares" value="<?php echo $exis; ?>" required>
                    
                            </div>
                    </fieldset>
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