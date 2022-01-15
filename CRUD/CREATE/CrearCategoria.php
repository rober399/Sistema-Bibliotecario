<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
include'../../BD/conexionBD.php'; 

if (!empty($_POST)) {
    $categoria=$_POST['categoria'];
    $query=mysqli_query($mysqli, "SELECT * FROM categorias WHERE  categoria='$categoria'");
        $resultado=mysqli_fetch_array($query);
        if ($resultado>0) {
            echo '<script language="javascript">alert("Categoria ya existe");window.location.href="CrearCategoria.php"</script>';
        }else{
            $query_insert=mysqli_query($mysqli,"INSERT INTO categorias (categoria) VALUES ('$categoria')");
            if ($query_insert) {
                 echo '<script language="javascript">alert("Categoria  Creada Correctamente");window.location.href="../READ/ListaCategoria.php"</script>';
            }else{
                 echo '<script language="javascript">alert("Error");window.location.href="CrearCategoria.php"</script>';
            }
        }  
}
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nuevo Categoria</title>
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
                    <!--<i class="fas fa-plus fa-fw"></i>--> &nbsp; Formulario de Registro de Categorias
                </h3>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                   
                    <li>
                        <a href="../READ/ListaCategoria.php" style="border-color: blue;"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Categorias</a>
                    </li>
                </ul>
            </div>
            <!--CONTENT-->
            <div class="container-fluid">
              <form action="" class="form-neon" method="POST">
                    <fieldset>
                       
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-center">
                                    <div class="form-group">
                                        <label for="categoria" class="bmd-label text-dark" >Nombre de la Categoría</label><br>
                                        <input required type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="categoria" placeholder="Digite Nombre de la Categoría"required>

                                        <div class="invalid-feedback">
                                            *El Campo Nombre de la categoría es obligatorio
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </fieldset>
                    <br><br><br>
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
