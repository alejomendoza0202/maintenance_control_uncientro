-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2021 a las 01:38:54
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `mantenimiento` bit(1) NOT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `sigMantenimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activos`
--

INSERT INTO `activos` (`IDActivo`, `nombreActivo`, `descripcionActivo`, `frecMantActivo`, `IDHabilidad`, `mantenimiento`, `fechaRegistro`, `sigMantenimiento`) VALUES
(18, 'Ascensor', 'Ascensor del primer bloque', 20, 4, b'1', '2021-02-23', '2021-03-14'),
(19, 'Lavamanos', 'Lavamanos del baño de hombres del primer piso, bloque 2', 60, 3, b'1', '2021-02-23', '2021-04-23'),
(20, 'Escaleras eléctricas', 'Escaleras eléctricas del piso 2. Tercer bloque.', 15, 4, b'1', '2021-02-23', '2021-03-09'),
(21, 'Ascensor', 'Ascensor del segundo bloque', 20, 4, b'1', '2021-02-23', '2021-03-14'),
(22, 'Aire acondicionado', 'Aire acondicionado del local 312-A', 90, 5, b'1', '2021-02-23', '2021-05-23'),
(23, 'Área de alto voltaje', 'Área de alto voltaje del primer sótano.', 25, 4, b'1', '2021-02-23', '2021-03-19'),
(24, 'Aire acondicionado', 'Aire acondicionado del local 311', 90, 5, b'1', '2021-02-23', '2021-05-23'),
(25, 'Aire acondicionado', 'Aire acondicionado del local 201', 90, 5, b'1', '2021-02-23', '2021-05-23'),
(26, 'Nevera', 'Nevera del área administrativa.', 60, 5, b'1', '2021-02-23', '2021-03-01'),
(27, 'Lavamanos', 'Lavamanos A del baño de mujeres del primer piso bloque 2.', 60, 3, b'1', '2021-02-23', '2021-04-23'),
(28, 'Lavamanos', 'Lavamanos B del baño de mujeres del primer piso bloque B.', 60, 3, b'1', '2021-02-23', '2021-02-25'),
(29, 'Inodoro', 'Inodoro C del baño de hombres, primero piso segundo bloque.', 90, 3, b'1', '2021-02-23', '2021-05-23'),
(30, 'Camión', 'Camión de desplazamiento de computadores. Placas ARQ-203.', 30, 1, b'1', '2021-02-23', '2021-03-25'),
(31, 'Moto', 'Moto de desplazamiento de bebidas. Placas OHQ-25C, BOXER negra.', 30, 1, b'1', '2021-02-23', '2021-03-25');

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
  `Observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activos_tecnicos`
--

INSERT INTO `activos_tecnicos` (`ID`, `IDActivo`, `IDTecnico`, `FechaUltMantenimiento`, `retraso`, `Observaciones`) VALUES
(32, 18, 12, '2021-02-11', b'0', 'Se realizó satisfactoriamente'),
(33, 20, 12, '2021-02-22', b'1', 'Se realizó'),
(34, 18, 12, '2021-02-22', b'0', 'Se realizó satisfactoriamente.'),
(35, 21, 12, '2021-02-22', b'0', 'Todo ok. Se necesita un nuevo litro de aceite para la próxima.'),
(36, 23, 12, '2021-02-22', b'0', 'Todo bien. No se encontró ningún inconveniente en la sala.'),
(37, 20, 12, '2021-02-20', b'0', 'Se hizo el cambio del sistema de cuerdas.'),
(38, 21, 12, '2021-02-19', b'1', ''),
(39, 18, 12, '2021-02-19', b'0', 'Se realizó días antes a petición del jefe.'),
(40, 22, 13, '2021-02-15', b'0', 'Se hizo el cambio de filtro.'),
(41, 24, 13, '2021-02-18', b'1', 'Se hizo el respectivo mantenimiento.'),
(42, 25, 13, '2021-02-22', b'0', 'Se realizó correctamente.'),
(43, 26, 13, '2021-02-18', b'0', 'Se hizo el cambio de bomba.'),
(44, 28, 11, '2021-02-15', b'1', 'Se realizó con exito, se hizo cambio de empaque.'),
(45, 19, 11, '2021-02-17', b'0', 'Se realizó con éxito, se hizo cambio de empaque.'),
(46, 27, 11, '2021-02-17', b'0', 'Se realizó satisfactoriamente. Se tuvo que cambiar el tubo principal.'),
(47, 29, 11, '2021-02-17', b'1', 'Se hizo cambio de bizcocho del baño, estaba partido.'),
(48, 28, 11, '2021-02-16', b'0', 'Se realizó sin problemas.'),
(49, 19, 11, '2021-02-16', b'1', 'Todo ok.'),
(50, 27, 11, '2021-02-16', b'0', 'Todo correcto.'),
(51, 30, 9, '2021-02-16', b'0', 'Se hizo cambio de aceite. Se realizó sincronización del motor.'),
(52, 31, 9, '2021-02-16', b'0', 'Se despinchó. Se hizo cambio de llanta delantera y se agregó líquido de frenos.'),
(53, 26, 13, '2021-02-22', b'0', 'Bien'),
(54, 30, 9, '2021-02-23', b'1', 'Se realizó'),
(55, 31, 9, '2021-02-23', b'0', 'Se hizo correctamente');

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
  `permisos` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`IDTecnico`, `nombreTecnico`, `correoTecnico`, `pwdTecnico`, `permisos`) VALUES
(8, 'Fredy Alejandro Mendoza Lopez', 'ifredomendoza@gmail.com', '$2y$10$H/9eub1/gfUu4qcBqYDLrO3NNH7saTiG9ZJGwt9LZebKCnI3W8num', b'1'),
(9, 'Santiago Castro Duitama', 'sduitama@gmail.com', '$2y$10$8qUXo.dKgzOJxGGbqLuCUu7TUhNMZ7YBIk7hlcH97g4UBY6.28Loe', b'0'),
(10, 'David Santiago Morales Norato', 'd.s.norato@gmail.com', '$2y$10$pyKhlxi2hlznt.Md2mrPVuzZxUMgvm8e5nTLn0Dg9Z1OR6.dzWt4m', b'0'),
(11, 'Orlando Alberto Moncada', 'dianorly@gmail.com', '$2y$10$GEgs63gvTzXgmzDtD9RaLu08uv9GLbIHaYeewz7n0qu.e6Av/UzRq', b'0'),
(12, 'Jenny Marcela Santamaría Rincón', 'jennysantamaria06@gmail.com', '$2y$10$uwvORFO71AopG3bIJs590efmbDA6IAZV6rrbByeQan3Z3DI2pUjmO', b'0'),
(13, 'Nelson Alexis Cáceres Carreño', 'nelsonelsonalexiscacerzcarreo37@gmail.com', '$2y$10$YNUlRlN4bpSNiUh97bVmdORYjK6Ww.is26nJ8jhjeELG0//XSEt.S', b'0'),
(14, 'Christian Eduardo Ruiz', 'christianruiz@gmail.com', '$2y$10$IAhqJiuM1vRniVbVBl7MPeP9W44Kht3/oRheJ2Ynz2VsmPfI.UZZq', b'0');

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
(6, 8, 1),
(7, 9, 1),
(8, 10, 2),
(9, 11, 3),
(10, 12, 4),
(11, 13, 5),
(12, 14, 4);

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
  MODIFY `IDActivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `activos_tecnicos`
--
ALTER TABLE `activos_tecnicos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `IDHabilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `IDTecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tecnicos_habilidad`
--
ALTER TABLE `tecnicos_habilidad`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
