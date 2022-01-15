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
    <title>Lista de Libros</title>

   <?php include'../../INCLUDES/link2.php'; ?>


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

        <section class="full-box page-content">
            <nav class="full-box navbar-info">
               
                
                <a href="../../system/salir.php" class="btn-exit">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
           <div class="full-box page-header">
                <h3 class="text-left">
                     Lista de Libros
                </h3>
            </div>

            <div class="container-fluid">
                 <?php 
                    if ($_SESSION['rol'] <2) {
                        ?>
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="../CREATE/CrearLibro.php" style="border-color: blue;"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Libro</a>
                    </li>
                    <li>
                        <a href="filtrolibro.php" style="border-color: blue;"><i class="fas fa-plus fa-fw"></i> &nbsp; Generar Reporte de Libros</a>
                    </li>
                   
                </ul>   
                <?php } ?> 
            </div>
            <form action="../SEARCH/BuscarLibro.php">
                <div class="col-12 col-md-12">
                <div class="form-group">
                    <label for="numEjemplares" class="bmd-label text-dark">Buscar Libro</label><br>
                    <input  type="text"  class="form-control" name="busqueda">
                    <div class="invalid-feedback">
                        *El Campo Numero de ejemplares es obligatorio
                    </div>
                </div>
            </div>
            </form>
            <!--CONTENT-->
            <div class="container-fluid">
               <br><br><br>
              
                
                       <table class="table table-striped">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>Id</th>
                                
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Existencias</th>
                                <th>Disponibles</th>
                                <th>Ubicacion</th>
                                <th>Categoria</th>
                                <th>Administrador</th>
                                <th>Estado</th>
                                <th>PDF</th>
                                 <?php 
                    if ($_SESSION['rol'] <2) {
                        ?>
                                <th>Actualizar</th>
                                 <?php } ?>
                        
                            </tr>
                        </thead>
                        <?php 
            //paginador
                  include'../../BD/conexionBD.php';
         $sql_register = mysqli_query($mysqli, "SELECT COUNT(*) as total_registros FROM libros");

            $result_register=mysqli_fetch_array($sql_register);
            $total_registros=$result_register['total_registros'];

            $por_pagina=8;
            if (empty($_GET['pagina'])) 
            {
                $pagina=1;
            }else{
                $pagina=$_GET['pagina'];
            }
            $desde=($pagina-1)*$por_pagina;
            $total_paginas= ceil($total_registros / $por_pagina);


            $query=mysqli_query($mysqli,"SELECT l.idLibro,l.isbn,l.titulo,l.autor,l.anioPublicacion,l.existencia_total,l.numEjemplares,l.ubicacion,l.estado_libro,c.categoria,e.editorial,a.usuario,l.archivo FROM libros l INNER JOIN categorias c ON l.idCategoriaLibro=c.idCategoria INNER JOIN editoriales e ON l.idEditorialLibro=e.idEditorial INNER JOIN administradores a ON l.idAdminLibro=a.idAdmin WHERE l.estatus=1 ORDER BY l.idLibro ASC LIMIT $desde , $por_pagina");
            mysqli_close($mysqli);
            $resultado=mysqli_num_rows($query);
            if($resultado>0){
                while ($data= mysqli_fetch_array($query)) {
                              ?>
                        <tbody>
                        <tr class="text-center"> 
                            <td><?php echo $data['idLibro']; ?></td>
                            <td><?php echo $data['titulo']; ?></td>
                            <td><?php echo $data['autor']; ?></td>
                            <td><?php echo $data['existencia_total']; ?></td>
                            <td><?php echo $data['numEjemplares']; ?></td>
                            <td><?php echo $data['ubicacion']; ?></td>
                            <td><?php echo $data['categoria']; ?></td>
                           
                            <td><?php echo $data['usuario']; ?></td>
                            <?php 
                                if($data['numEjemplares']==0){
                                echo "<td style='color:red;'>No disponible</td>";
                                }else{
                                echo "<td style='color:green;'> Disponible</td>";
                                }

                            ?>

                            <td><?php if($data['archivo']!='../../file/pdf/'){ ?>
                                <a href="<?php echo $data['archivo'] ?>"><i class="fas fa-eye"></i></a>
                            <?php }else{ ?>
                                <i class="fas fa-eye-slash"></i>
                                <?php } ?>
                            </td>
                            <?php 
                    if ($_SESSION['rol'] <2) {
                        ?>

                            <td><a href="../UPDATE/Update-Book.php?id=<?php echo $data['idLibro']; ?>"><i class="fas fa-exchange-alt"></i></a></td>

                        <?php } ?>
                        
                        </tr>
             </tbody>
              <?php
                 }
            }
            ?>
             </table>
              
              </div>
              <div class="container-fluid paginador">
        <ul>
            <?php 
            if ($pagina !=1 AND $total_registros != 0) {
             ?>
            <li><a href="?pagina= <?php echo 1; ?> ">|<</a></li>
            <li><a href="?pagina= <?php echo $pagina-1; ?> "><<</a></li>
            <?php 
        }
            for ($i=1; $i <= $total_paginas; $i++) { 
                if ($i==$pagina) {
                     echo '<li class="pageSelected">'.$i.'</li>';
                }else{
                    echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                }
                
            }
            if ($pagina!=$total_paginas AND $total_registros != 0) {
             ?>
            <li><a href="?pagina= <?php echo $pagina+1; ?>">>></a></li>
            <li><a href="?pagina= <?php echo $total_paginas; ?>">>|</a></li>
            <?php 
        }
             ?>
        </ul>
        </div>
       
               </section>
            </div>
       
    </main>
</section>
            
    	
	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
    <?php include '../../INCLUDES/js2.php'; ?>

</body>
</html>