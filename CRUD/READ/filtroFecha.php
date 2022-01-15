<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../system/salir.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista de Editoriales</title>

   <?php include'../../INCLUDES/link2.php'; ?>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <style>
  h4{
      padding: 0px !important;
      color: crimson;
      margin-bottom: 35px;
  }
  </style>
  
</head>


</head>


<body>
    <!-- Main container -->
    <main class="full-box main-container">
        <!-- Nav lateral -->
       
        <section class="full-box nav-lateral">
           
            <div class="full-box nav-lateral-content">
            
            
            
                 <img src="../../assets/img/LOGO.png" height="180px" width="300px">

                
                
                
                
                <!--- menu -->
           
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
                                    <a href="ListaAdmin.php"><i class="fas fa-list-alt"></i>

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
                                    <a href="ListaLibro.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Libros</a>
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
                                    <a href="ListaLector.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Lectores</a>
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
                                    <a href="ListaPrestamo.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de préstamos</a>
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
                                    <a href="ListaCategoria.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Categorías</a>
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
                                    <a href="ListaEditorial.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Editoriales</a>
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
            
        </section>

        <section  class="full-box page-content">
                 <nav class="full-box navbar-info">
               
                
                <a href="../../system/salir.php" class="btn-exit">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
        
            <!-- Page header -->
           <div class="full-box page-header">
                <h3 class="text-left">
                     &nbsp; Reportes de préstamos por fechas
                </h3>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="../CREATE/CrearPrestamo.php" style="border-color: blue;"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Préstamo</a>
                    </li>
                   
                </ul>   
            </div>
            <!--CONTENT-->
             <div class="container-fluid">
                <form action="../../fpdf/fechaFiltro.php" class="filtro-a" method="post">
        <div class="container">
            <div class="row">
                 <div class="col-xs-12 col-md-5">
                    <div class="form-group">
                         <label for="" class="bmd-label text-dark">Fecha Inicio</label><br><br>
                            <input name="inicio"  type="date" class="form-control">
                    </div>
                </div>

                  <div class="col-xs-12 col-md-5">
                    <div class="form-group">
                         <label for="" class="bmd-label text-dark">Fecha Fin</label><br><br>
                            <input name="fin"  type="date" class="form-control">
                    </div>
                </div>

               <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="tipoUs" class="bmd-label text-dark">Estado de prestamo</label><br><br>
                                        <select pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="estado" id="estado" required>
                                            <option value="" disabled="" selected="">Seleccione Estado</option>
                                            <option value="Devuelto">Devueltos</option>
                                            <option value="Pendiente">Pendientes</option>
                                            <option value="Todos">Todos</option>
                                            
                                          
                                        </select>
                                        <div class="invalid-feedback">
                                        Debe seleccionar el nivel
                                        </div>
                                    </div>
                                </div>


            </div>
                 <button type="submit" class="btn btn-raised btn btn-dark" > &nbsp; Generar Reporte</button>
        </div>

        </form>
       
            </div>
       
               
            
        </section>
        </main>
            
    	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
    <?php include '../../INCLUDES/js2.php'; ?>

</body>
</html>