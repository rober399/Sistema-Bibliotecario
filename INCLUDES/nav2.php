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
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Administrador <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="Create-admin.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Administrador</a>
								</li>
								<li>
									<a href="listaAdmin.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Administradores</a>
								</li>
							</ul>
						</li>
					

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-book"></i> &nbsp; Libros <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agregarLibro.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Libro</a>
								</li>
								<li>
									<a href="listaLibro.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Libros</a>
								</li>
							</ul>
						</li>

                    <li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Lectores <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agregarLector.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Lector</a>
								</li>
								<li>
									<a href="listaLector.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Lectores</a>
								</li>
							</ul>
						</li>
						

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-book-open"></i> &nbsp; Préstamos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agregarPrestamo.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo préstamo</a>
								</li>
								<li>
									<a href="listaPrestamo.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de préstamos</a>
								</li>
								<li>
									<a href="prestaamosPendientes.php"><i class="fab fa-leanpub"></i> &nbsp; Préstamos pendientes</a>
								</li>
								
								
								<li>
									<a href="prestamoPorFecha.php"><i class="far fa-calendar-alt"></i> &nbsp; Préstamos por fecha</a>
								</li>
								
								
							</ul>
						</li>
						
						
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-bookmark fa-fw"></i> &nbsp; Categorías <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agregarCategoria.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar categoría</a>
								</li>
								<li>
									<a href="listaCategoria.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Categorías</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-store-alt fa-fw"></i> &nbsp; Editoriales <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agregarEditorial.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar editorial</a>
								</li>
								<li>
									<a href="listaEditorial.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Editoriales</a>
								</li>
								
							</ul>
						</li>
						
			
						
						
						


					</ul>
				</nav>
			</div>