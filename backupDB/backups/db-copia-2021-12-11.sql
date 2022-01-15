

CREATE TABLE `administradores` (
  `idAdmin` int(8) NOT NULL AUTO_INCREMENT,
  `DUI` varchar(10) NOT NULL,
  `adminNombre` varchar(250) NOT NULL,
  `adminApellido` varchar(250) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fechaRegistro` date NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `rol` int(8) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  KEY `rol` (`rol`),
  CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO administradores VALUES("1","1","Roberto","Orellana","Masculino","roberore99@gmail.com","2021-11-04","admin","admin2021","1");





CREATE TABLE `categorias` (
  `idCategoria` int(8) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(250) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `editoriales` (
  `idEditorial` int(8) NOT NULL AUTO_INCREMENT,
  `editorial` varchar(250) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idEditorial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `libros` (
  `idLibro` int(8) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(20) DEFAULT NULL,
  `titulo` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `anioPublicacion` varchar(4) DEFAULT NULL,
  `existencia_total` int(3) NOT NULL,
  `numEjemplares` int(8) NOT NULL,
  `ubicacion` varchar(25) NOT NULL,
  `estado_libro` varchar(15) NOT NULL,
  `idCategoriaLibro` int(8) NOT NULL,
  `idEditorialLibro` int(8) NOT NULL,
  `idAdminLibro` int(8) NOT NULL,
  `archivo` text CHARACTER SET utf32 NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idLibro`),
  KEY `idCategoriaLibro` (`idCategoriaLibro`),
  KEY `idEditorialLibro` (`idEditorialLibro`),
  KEY `idAdminLibro` (`idAdminLibro`),
  CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`idEditorialLibro`) REFERENCES `editoriales` (`idEditorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`idCategoriaLibro`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `prestamos` (
  `idPrestamo` int(8) NOT NULL AUTO_INCREMENT,
  `idLibroPrestamo` int(8) DEFAULT NULL,
  `idUsuarioPrestamo` int(8) DEFAULT NULL,
  `idAdminPrestamo` int(8) DEFAULT NULL,
  `cantidadLibros` int(2) NOT NULL,
  `fechaPrestamo` datetime NOT NULL DEFAULT current_timestamp(),
  `fechaLimite` date NOT NULL,
  `fechaEntrega` datetime NOT NULL DEFAULT current_timestamp(),
  `observaciones` varchar(100) NOT NULL,
  `estadoPrestamo` varchar(15) NOT NULL DEFAULT 'PENDIENTE',
  PRIMARY KEY (`idPrestamo`),
  KEY `idLibroPrestamo` (`idLibroPrestamo`),
  KEY `idUsuarioPrestamo` (`idUsuarioPrestamo`),
  KEY `idAdminPrestamo` (`idAdminPrestamo`),
  CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`idLibroPrestamo`) REFERENCES `libros` (`idLibro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`idUsuarioPrestamo`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `rol` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO rol VALUES("1","Bibliotecario");
INSERT INTO rol VALUES("2","Director");
INSERT INTO rol VALUES("3","Docente");





CREATE TABLE `usuarios` (
  `idUsuario` int(8) NOT NULL AUTO_INCREMENT,
  `tipo_identificacion` varchar(15) NOT NULL,
  `carnet` varchar(13) NOT NULL,
  `nombreUs` varchar(250) NOT NULL,
  `apellidoUs` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `tipoUs` varchar(25) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;




