<!-- <?php  
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
include'../../BD/conexionBD.php'; 

if (!empty($_POST)) {
    $isbn=$_POST['isbn'];
    $titulo=$_POST['titulo'];
    $autor=$_POST['autor'];
    $publicacion=$_POST['anioPublicacion'];
    $ejemplares=$_POST['numEjemplares'];
    $ubicacion=$_POST['ubicacion'];
    $estado=$_POST['estado'];
    $categoria=$_POST['idCategoriaLibro'];
    $editorial=$_POST['idEditorialLibro'];
    $usuario=$_SESSION['idAdmin'];
    //subir pfd
    $pdf_name=$_FILES['pdf']['name'];
    $pdf_tmp=$_FILES['pdf']['tmp_name'];
    $route= "../../file/pdf/".$pdf_name;
    move_uploaded_file($pdf_tmp,$route);
    
    $query=mysqli_query($mysqli, "SELECT * FROM libros WHERE  titulo='$titulo'");
        $resultado=mysqli_fetch_array($query);
        if ($resultado>0) {
            echo '<script language="javascript">alert("Titulo ya existe");window.location.href="CrearLibro.php"</script>';
        }else{
            $query_insert=mysqli_query($mysqli,"INSERT INTO libros
            (isbn,titulo,autor,anioPublicacion,existencia_total,numEjemplares,ubicacion,estado_libro,idCategoriaLibro,idEditorialLibro,idAdminLibro,archivo)
            VALUES('$isbn','$titulo','$autor','$publicacion','$ejemplares','$ejemplares','$ubicacion','$estado','$categoria','$editorial','$usuario','$route')");
            if ($query_insert) {
                 echo '<script language="javascript">alert("Libro  Creado Correctamente");window.location.href="../READ/ListaLibro.php"</script>';
            }else{
                 echo '<script language="javascript">alert("Error");window.location.href="CrearLibro.php"</script>';
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
                    <!--<i class="fas fa-plus fa-fw"></i>--> &nbsp; Formulario de Registro de Libros
                </h3>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                   
                    <li>
                        <a href="../READ/ListaLibro.php" style="border-color: blue;"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Libros</a>
                    </li>
                </ul>
            </div>
            <!--CONTENT-->
            <div class="container-fluid">
                <form autocomplete="off"  method="post" action="" enctype="multipart/form-data">
                    <fieldset>
                        
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="isbn" class="bmd-label text-dark">ISBN</label><br>
                                        <input required type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="isbn" placeholder="Digite ISBN del Libro" id="isbn" >
                                        
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="titulo" class="bmd-label text-dark">Titulo</label><br>
                                        <input required type="text" class="form-control" name="titulo" placeholder="Digite Titulo del Libro" id="titulo" >
                                        <div class="invalid-feedback">
                                       *El Campo Titulo es obligatorio
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="autor" class="bmd-label text-dark">Autor</label><br>
                                        <input required type="text" class="form-control" name="autor" placeholder="Digite Autor del Libro" id="autor" >
                                        <div class="invalid-feedback">
                                        *El Campo Autor es obligatorio
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">    
                                        <label for="anioPublicacion" class="bmd-label text-dark">Año de publicación</label><br>
                                        <input required type="text" pattern="[0-9-]{1,9}" class="form-control" name="anioPublicacion" placeholder="Digite Año"id="anioPublicacion" >
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="numEjemplares" class="bmd-label text-dark">Número de ejemplares disponibles</label><br>
                                        <input required type="text" pattern="[0-9-]{1,9}" class="form-control" name="numEjemplares" placeholder="Digite Número de Ejemplares" id="numEjemplares">
                                        <div class="invalid-feedback">
                                        *El Campo Numero de ejemplares es obligatorio
                                    </div>
                                    </div>
                                </div>
                               

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="ubicacion" class="bmd-label text-dark">Ubicación del Libro</label><br>
                                        <input required type="text"  class="form-control" name="ubicacion" id="numEjemplares" placeholder="Estante/Repisa">
                                        <div class="invalid-feedback">
                                        *El Campo ubicacion es obligatorio
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="numEjemplares" class="bmd-label text-dark">Seleccione Estado del Libro</label><br>
                                        <select pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="estado" required>
                                            <option value="" disabled="" selected="">Seleccione Estado del Libro</option>
                                            <option value="Fisico">FISICO</option>
                                            <option value="PDF">PDF</option>
                                            <option value="Fisico-PDF">FISICO-PDF</option>
                                        </select>
                                        <div class="invalid-feedback">
                                       *Este Campo es obligatorio
                                    </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 col-md-4">
                                    <?php
                                   
                                    $consulta = "SELECT * FROM categorias WHERE estatus=1";
                                    $consulta2 = $mysqli->query($consulta);

                                    ?>
                                    <div class="form-group">
                                        <label for="idCategoriaLibro" class="bmd-label text-dark">Categoría</label><br>
                                        <select  class="form-control" name="idCategoriaLibro" id="idCategoriaLibro" required>
                                           <option value="" disabled="" selected="">Seleccione Categoria</option>
                                            <?php

                                            while ($row = $consulta2->fetch_array(MYSQLI_ASSOC)) {

                                                echo "<option value=" . $row['idCategoria'] . ">" . $row['categoria'] . "
                                                </option>";
                                            }

                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        *El Campo categoría es obligatorio
                                    </div>
                                    </div>

                                </div>
                                <br>
                                <div class="col-12 col-md-4">
                                    <?php
                                
                                    $consulta = "SELECT * FROM editoriales WHERE estatus=1";
                                    $consulta2 = $mysqli->query($consulta);

                                    ?>
                                    <div class="form-group">
                                        <label for="idEditorialLibro" class="bmd-label text-dark">Editorial</label><br>
                                        <select type="num" class="form-control" name="idEditorialLibro" id="idEditorialLibro" required>
                                            <option value="" disabled="" selected="">Seleccione Editorial</option>
                                            <?php

                                            while ($row = $consulta2->fetch_array(MYSQLI_ASSOC)) {

                                                echo "<option value=" . $row['idEditorial'] . ">" . $row['editorial'] . "
                                                </option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                        *El Campo Editorial es obligatorio
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="pfd" class="bmd-label text-dark">Seleccione Pdf</label><br><br>
                                        <input type="file" class="form-control" name="pdf">
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


    <!--=============================================
	=            Include JavaScript files           =
	==============================================-->
   <?php include'../../INCLUDES/js2.php'; ?>
</body>

</html>