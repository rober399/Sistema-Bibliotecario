<?php 
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../');
}

?>
<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
					
					 <li>
                        <a href="index.php"><i class="fas fa-home"></i>

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
                                 <a href="../CRUD/CREATE/CrearAdmin.php"><i class="fas fa-plus-circle"></i>

                                  &nbsp; Nuevo Administrador</a>
                                </li>
                                
                                <li>
                                    <a href="../CRUD/READ/ListaAdmin.php"><i class="fas fa-list-alt"></i>

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
                                    <a href="../CRUD/CREATE/CrearLibro.php"><i class="fas fa-plus-circle"></i>Agregar Libro</a>
                                </li>
                                <?php } ?>
                    
                                <li>
                                    <a href="../CRUD/READ/ListaLibro.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Libros</a>
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
                                    <a href="../CRUD/CREATE/CrearLector.php"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Lector</a>
                                </li>
                                <li>
                                    <a href="../CRUD/READ/ListaLector.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Lectores</a>
                                </li>
                            </ul>
                        </li>
                         
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-file-upload"></i>

                               &nbsp; Pr??stamos <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CRUD/CREATE/CrearPrestamo.php"><i class="fas fa-plus-circle"></i>&nbsp; Nuevo pr??stamo</a>
                                </li>
                                <li>
                                    <a href="../CRUD/READ/ListaPrestamo.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de pr??stamos</a>
                                </li>
                               
                            </ul>
                        </li>
                         <?php } ?>
                        
                        
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-atlas"></i>

                             &nbsp; Categor??as <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CRUD/CREATE/CrearCategoria.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar categor??a</a>
                                </li>
                                <li>
                                    <a href="../CRUD/READ/ListaCategoria.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Categor??as</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-university"></i>

                             &nbsp; Editoriales <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../CRUD/CREATE/CrearEditorial.php"><i class="fas fa-plus-circle"></i> &nbsp; Agregar editorial</a>
                                </li>
                                <li>
                                    <a href="../CRUD/READ/ListaEditorial.php"><i class="fas fa-list-alt"></i> &nbsp; Lista de Editoriales</a>
                                </li>
                                
                            </ul>
                        </li>

                        <?php 
                    if ($_SESSION['rol'] <2) {
                        ?>
                        


                     <li>
                        <a href="../backupDB/descarga.php"><i class="fas fa-copy"></i>

                        &nbsp; Backup</a>
                        </li>
						
						  <?php } ?>
                        
			
						
						
						


					</ul>
				</nav>
			</div>