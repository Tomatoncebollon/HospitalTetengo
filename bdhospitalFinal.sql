-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2017 a las 23:03:20
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdhospital`
create database `bdhospital`;
use `bdhospital`;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencion`
--

CREATE TABLE `atencion` (
  `numero` int(10) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `rut_paciente` varchar(11) NOT NULL,
  `rut_medico` varchar(11) NOT NULL,
  `estado` int(10) NOT NULL,
  `hora` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atencion`
--

INSERT INTO `atencion` (`numero`, `fecha`, `rut_paciente`, `rut_medico`, `estado`, `hora`) VALUES
(1, '12/10/91', '17819265-5', '18819265-5', 2, '1900');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `user_Name` varchar(20) NOT NULL,
  `contraseña` varchar(128) NOT NULL,
  `perfil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`user_Name`, `contraseña`, `perfil`) VALUES
('admin', 'ADZkcQN9/PkPgui3wFCOZB1j3OuiMbTBDHuDefWeI+Y=', 'Administrador'),
('paciente', 'OOHX0LJUrbPmgTHGSnFSsCSxZRFI1jyN5LMmQqlbdTw=', 'Paciente'),
('secretaria', 'Rn+iSu3EW5VJiVqgCq918NjHCJrUwOPi/xzW02tVt9o=', 'Secretaria'),
('director', 'c1niLk8VKoCeS1xK5ac6imwZyIoeAnPoYmTmeC7UnPM=', 'Director');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `rut` varchar(12) NOT NULL,
  `nombre_comp` varchar(50) NOT NULL,
  `fecha_contrata` varchar(10) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `valor_consul` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`rut`, `nombre_comp`, `fecha_contrata`, `especialidad`, `valor_consul`) VALUES
('18819265-5', 'Simon Morales', '12/10/91', 'Inform?tico', 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `rut` varchar(12) NOT NULL,
  `nombre_comp` varchar(50) NOT NULL,
  `fecha_nacimiento` varchar(10) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `celular` int(9) NOT NULL,
  `fijo` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`rut`, `nombre_comp`, `fecha_nacimiento`, `sexo`, `direccion`, `celular`, `fijo`) VALUES
('19.152.503-5', 'gabriela suricato robles', '1995-12-17', 'Femenino', '3F9yFtXQ5QYY6I+LARYgQLpusZyyDGl4igcktIH9mXhOzHFJrj', 98553551, 0),
('19329814-1', 'Alexander Blanco Opazo', '1997-06-20', 'Masculino', 'N8qgxk49utI5vzRs59FWnQE4ViHtPJjzK9IBoQukTzU=', 123456879, 32156425);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `rut_paciente` (`rut_paciente`),
  ADD KEY `rut_medico` (`rut_medico`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`rut`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atencion`
--
ALTER TABLE `atencion`
  MODIFY `numero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencion`
--
ALTER TABLE `atencion`
  ADD CONSTRAINT `atencion_ibfk_1` FOREIGN KEY (`rut_medico`) REFERENCES `medicos` (`rut`),
  ADD CONSTRAINT `atencion_ibfk_2` FOREIGN KEY (`rut_paciente`) REFERENCES `paciente` (`rut`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
