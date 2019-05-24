-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2019 a las 08:51:40
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adeudos`
--

CREATE TABLE `adeudos` (
  `idadeudo` int(10) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `descripcionadeudo` varchar(200) NOT NULL,
  `fechaadeudo` date NOT NULL,
  `fechareposicion` date NOT NULL,
  `idlibro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adeudos`
--

INSERT INTO `adeudos` (`idadeudo`, `matricula`, `descripcionadeudo`, `fechaadeudo`, `fechareposicion`, `idlibro`) VALUES
(1, '0115010003', 'entrega en destiempo', '2019-05-06', '2019-05-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idautor` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idautor`, `nombre`, `apellido`) VALUES
(1, 'Anita', 'Mooorjani'),
(2, 'Juan', 'Rulfo'),
(3, 'Carlos Cuauhtemoc', 'Sanchez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores_libro`
--

CREATE TABLE `autores_libro` (
  `idlibro` int(10) NOT NULL,
  `idautor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autores_libro`
--

INSERT INTO `autores_libro` (`idlibro`, `idautor`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`matricula`, `nombre`, `apellido`, `password`) VALUES
('0115010001', 'Isabel', 'Gomez', 'isabel12345'),
('0115010002', 'Juana', 'Perez', 'juana12345'),
('0115010003', 'Pedro', 'Felipe', 'pedro12345'),
('0115010005', 'Adrian', 'Sarniento', 'adrian12345'),
('0115010015', 'Luis', 'Gonzales', 'luis12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idlibro` int(10) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `ISBN` varchar(200) NOT NULL,
  `numeroejemplar` int(10) NOT NULL,
  `paginas` int(10) NOT NULL,
  `editorial` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idlibro`, `titulo`, `ISBN`, `numeroejemplar`, `paginas`, `editorial`) VALUES
(1, 'Morir para ser yo', ' 8484454924', 5, 235, 'GAIA EDICIONES'),
(2, 'y si esto ya es el cielo', ' 9878454924', 2, 145, 'GAIA EDICIONES'),
(3, 'Pedro páramo', '1234454934', 8, 201, 'RM'),
(4, 'El Llano en llamas', '1245677222', 2, 123, 'RM'),
(5, 'los ojos de mi princesa', '9923445934', 3, 512, 'salamanca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idprestamo` int(10) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `fechaprestamo` date NOT NULL,
  `fechalimite` date NOT NULL,
  `fechadevolucion` date NOT NULL,
  `idlibro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idprestamo`, `matricula`, `fechaprestamo`, `fechalimite`, `fechadevolucion`, `idlibro`) VALUES
(1, '0115010005', '2019-05-24', '2019-05-27', '0000-00-00', 1),
(2, '0115010015', '2019-05-24', '2019-05-27', '0000-00-00', 5),
(3, '0115010003', '2019-05-24', '2019-05-27', '0000-00-00', 1),
(4, '0115010005', '2019-05-24', '2019-05-27', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(10) NOT NULL,
  `nombrerol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`) VALUES
(1, 'biblio'),
(2, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `tiporol` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellido`, `tiporol`, `email`, `password`) VALUES
(1, 'marya', 'gomez', 2, 'marysa31g@gmail.com', 'marysa31g'),
(2, 'biblioteca', 'Nova', 1, 'biblio@gmail.com', 'bibiblioteca'),
(3, 'Luis', 'Mtz', 1, 'admin@mail.com', '1234'),
(4, 'user 1', 'test', 2, 'user@mail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adeudos`
--
ALTER TABLE `adeudos`
  ADD PRIMARY KEY (`idadeudo`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `idlibro` (`idlibro`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idautor`);

--
-- Indices de la tabla `autores_libro`
--
ALTER TABLE `autores_libro`
  ADD KEY `idlibro` (`idlibro`),
  ADD KEY `idautor` (`idautor`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idlibro`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idprestamo`),
  ADD KEY `idprestamo` (`idprestamo`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `idlibro` (`idlibro`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idprestamo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
