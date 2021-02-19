-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2021 a las 16:50:55
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE mant_db;
USE mant_db;
--
-- Base de datos: `mant_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos`
--

CREATE TABLE `activos` (
  `IDActivo` int(11) NOT NULL,
  `nombreActivo` varchar(50) NOT NULL,
  `descripcionActivo` varchar(100) NOT NULL,
  `frecMantActivo` int(11) NOT NULL,
  `IDHabilidad` int(11) NOT NULL,
  `mantenimiento` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`IDActivo`, `nombreActivo`, `descripcionActivo`, `frecMantActivo`, `IDHabilidad`, `mantenimiento`) VALUES
(1, 'Escaleras eléctricas', 'Escaleras bloque 2', 15, 1, b'0'),
(2, 'Ascensor', 'Ascensor primer bloque', 30, 4, b'1'),
(3, 'Lavamanos', 'Lavamanos baño de hombres, primer piso', 50, 3, b'1'),
(4, 'Barandas', 'Barandas segun piso bloque lateral', 5, 2, b'1'),
(5, 'Luces', 'aaa', 13, 2, b'0'),
(6, 'Ascensor 2', 'ascensor', 10, 4, b'1'),
(7, 'Lavamanos', 'Lavamanos', 10, 4, b'1'),
(8, 'Escaleras eléctricas', 'Escaleras segundo piso', 20, 4, b'1'),
(11, 'Tubo de agua', 'Tubo de agua del primer piso bloque 2C', 60, 3, b'1'),
(12, 'Sala de electricidad', 'Sala de electricidad ubicada en el sotano 1', 25, 4, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activos_tecnicos`
--

CREATE TABLE `activos_tecnicos` (
  `ID` int(11) NOT NULL,
  `IDActivo` int(11) NOT NULL,
  `IDTecnico` int(11) NOT NULL,
  `FechaUltMantenimiento` date NOT NULL,
  `retraso` bit(1) DEFAULT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Observaciones` varchar(255) NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `IDHabilidad` int(11) NOT NULL,
  `descripcionHabilidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`IDHabilidad`, `descripcionHabilidad`) VALUES
(1, 'Mecanica básica'),
(2, 'Soldadura'),
(3, 'Plomería'),
(4, 'Manejo eléctrico'),
(5, 'Manejo electrónico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `IDTecnico` int(11) NOT NULL,
  `nombreTecnico` varchar(50) NOT NULL,
  `correoTecnico` varchar(100) NOT NULL,
  `pwdTecnico` varchar(250) NOT NULL,
  `permisos` bit(1) DEFAULT NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`IDTecnico`, `nombreTecnico`, `correoTecnico`, `pwdTecnico`,b`1`) VALUES
(1, 'Fredy Alejandro Mendoza Lopez', 'ifredomendoza@gmail.com', '$2y$10$vaK/RBaI7u/VHQn30.ox..2R5B0T1jjbzr5PDFoC2//JrLBXMCgCG',b`0`),
(2, 'Javier Eduardo Rodriguez', 'javiereduardo2742@gmail.com', '$2y$10$Pjtow/ifnKYRhhBHLOd8TOeIcry3NQCHcBGIxB7KFf/Dyr6fjWPSO',b`0`),
(3, 'Andres Mendoza', 'andres@gmail.com', '$2y$10$p7BJdhgT7jIcBLBuAlJkkeW6egJp2nDC17O6isBCIxHRJo.JEIKjS',b`0`),
(4, 'Orlando Moncada', 'orlando@gmail.com', '$2y$10$TF5v.4QAOYW8dRuWq4qaqu5jA1gmDzbEkkVcftdHKJ0Zsl.nwh70u',b`0`),
(5, 'David Norato', 'david@gmail.com', '$2y$10$4e71cbgtlbuf2UzeUvbCb.bjBAYlr.lKUwZfmGueKyRcs.P70OJae',b`0`),
(6, 'Fredy Alejandro Mendoza Lopez', 'ifredomendoz22a@gmail.com', '$2y$10$PYLgsvYDuyGVwJbalEUt2ed2ppAFKKTAVcWuos3GhxZN4V5xfpT0K',b`0`);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos_habilidad`
--

CREATE TABLE `tecnicos_habilidad` (
  `ID` int(11) NOT NULL,
  `IDTecnico` int(11) NOT NULL,
  `IDHabilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnicos_habilidad`
--

INSERT INTO `tecnicos_habilidad` (`ID`, `IDTecnico`, `IDHabilidad`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 3, 3),
(4, 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`IDActivo`),
  ADD KEY `FK_ACTIVO_HABILIDAD` (`IDHabilidad`);

--
-- Indices de la tabla `activos_tecnicos`
--
ALTER TABLE `activos_tecnicos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ACTIVO_TECNICO` (`IDActivo`),
  ADD KEY `FK_TECNICO_ACTIVO` (`IDTecnico`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`IDHabilidad`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`IDTecnico`);

--
-- Indices de la tabla `tecnicos_habilidad`
--
ALTER TABLE `tecnicos_habilidad`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_TECNICO_HABILIDAD` (`IDTecnico`),
  ADD KEY `FK_HABILIDAD_TECNICO` (`IDHabilidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activos`
--
ALTER TABLE `activos`
  MODIFY `IDActivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `activos_tecnicos`
--
ALTER TABLE `activos_tecnicos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `IDHabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `IDTecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tecnicos_habilidad`
--
ALTER TABLE `tecnicos_habilidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `FK_ACTIVO_HABILIDAD` FOREIGN KEY (`IDHabilidad`) REFERENCES `habilidades` (`IDHabilidad`);

--
-- Filtros para la tabla `activos_tecnicos`
--
ALTER TABLE `activos_tecnicos`
  ADD CONSTRAINT `FK_ACTIVO_TECNICO` FOREIGN KEY (`IDActivo`) REFERENCES `activos` (`IDActivo`),
  ADD CONSTRAINT `FK_TECNICO_ACTIVO` FOREIGN KEY (`IDTecnico`) REFERENCES `tecnicos` (`IDTecnico`);

--
-- Filtros para la tabla `tecnicos_habilidad`
--
ALTER TABLE `tecnicos_habilidad`
  ADD CONSTRAINT `FK_HABILIDAD_TECNICO` FOREIGN KEY (`IDHabilidad`) REFERENCES `habilidades` (`IDHabilidad`),
  ADD CONSTRAINT `FK_TECNICO_HABILIDAD` FOREIGN KEY (`IDTecnico`) REFERENCES `tecnicos` (`IDTecnico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
