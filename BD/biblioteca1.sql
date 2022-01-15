-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 20:47:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idAdmin` int(8) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `adminNombre` varchar(250) NOT NULL,
  `adminApellido` varchar(250) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fechaRegistro` date NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `rol` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idAdmin`, `DUI`, `adminNombre`, `adminApellido`, `sexo`, `email`, `fechaRegistro`, `usuario`, `contraseña`, `rol`) VALUES
(1, '1', 'Roberto', 'Orellana', 'Masculino', 'roberore99@gmail.com', '2021-11-04', 'admin', '12345', 1),
(3, '12345', 'Roberto', 'Orellana', 'Masculino', 'roberore@gmail.com', '2021-11-06', 'Roberto', '12345', 1),
(6, '0983341', 'Angel', 'Torres', 'Masculino', 'torres@gmail.com', '2021-11-20', 'Angel', '123456', 3),
(7, '2331', 'Carlos', 'Melendez', 'Masculino', 'melende@gmail.com', '2021-11-25', 'carlos', '1234', 2),
(11, '11', 'prueba', 'prueba', 'Masculino', 'robeeeerore99@gmail.com', '2021-11-25', 'prueba', '1231', 2),
(12, '102341-1', 'rober', 'orellana', 'Masculino', 'robearore99@gmail.com', '2021-11-27', 'rober3', 'admin', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(8) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `categoria`, `estatus`) VALUES
(1, 'Algoritmo', 1),
(2, 'Programacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `idEditorial` int(8) NOT NULL,
  `editorial` varchar(250) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`idEditorial`, `editorial`, `estatus`) VALUES
(5, 'Editorial del Futuro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(8) NOT NULL,
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
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(8) NOT NULL,
  `idLibroPrestamo` int(8) DEFAULT NULL,
  `idUsuarioPrestamo` int(8) DEFAULT NULL,
  `idAdminPrestamo` int(8) DEFAULT NULL,
  `cantidadLibros` int(2) NOT NULL,
  `fechaPrestamo` datetime NOT NULL DEFAULT current_timestamp(),
  `fechaLimite` date NOT NULL,
  `fechaEntrega` datetime NOT NULL DEFAULT current_timestamp(),
  `observaciones` varchar(100) NOT NULL,
  `estadoPrestamo` varchar(15) NOT NULL DEFAULT 'PENDIENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `prestamos`
--
DELIMITER $$
CREATE TRIGGER `aumentar` AFTER UPDATE ON `prestamos` FOR EACH ROW BEGIN
    DECLARE
        id_l INT DEFAULT 0 ; DECLARE exis INT DEFAULT 0 ;
    SET
        id_l = NEW.idLibroPrestamo ;
    SET
        exis = NEW.cantidadLibros ;
    UPDATE
        libros
    SET
        numEjemplares = numEjemplares + exis
    WHERE
        idLibro = id_l ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `disminuir` AFTER INSERT ON `prestamos` FOR EACH ROW BEGIN
    DECLARE
        id_p INT DEFAULT 0; DECLARE ejemp_s INT DEFAULT 0;
    SET
        id_p = NEW.idLibroPrestamo;
    SET
        ejemp_s = NEW.cantidadLibros;
    UPDATE
        libros
    SET
        numEjemplares = numEjemplares - ejemp_s
    WHERE
        idLibro = id_p; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(8) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'Bibliotecario'),
(2, 'Director'),
(3, 'Docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(8) NOT NULL,
  `tipo_identificacion` varchar(15) NOT NULL,
  `carnet` varchar(13) NOT NULL,
  `nombreUs` varchar(250) NOT NULL,
  `apellidoUs` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `tipoUs` varchar(25) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idCategoriaLibro` (`idCategoriaLibro`),
  ADD KEY `idEditorialLibro` (`idEditorialLibro`),
  ADD KEY `idAdminLibro` (`idAdminLibro`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `idLibroPrestamo` (`idLibroPrestamo`),
  ADD KEY `idUsuarioPrestamo` (`idUsuarioPrestamo`),
  ADD KEY `idAdminPrestamo` (`idAdminPrestamo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idAdmin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `idEditorial` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`idEditorialLibro`) REFERENCES `editoriales` (`idEditorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`idCategoriaLibro`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_ibfk_2` FOREIGN KEY (`idLibroPrestamo`) REFERENCES `libros` (`idLibro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamos_ibfk_3` FOREIGN KEY (`idUsuarioPrestamo`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
