-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2023 a las 17:33:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pacientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `ID` int(11) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellidos` text NOT NULL,
  `Cedula` varchar(8) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Correo` varchar(70) NOT NULL,
  `Fecha_consulta` date NOT NULL,
  `Motivo_consulta` varchar(250) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `AntecedentesPer` varchar(250) NOT NULL,
  `AntecedentesFam` varchar(250) NOT NULL,
  `NroHijos` int(2) NOT NULL,
  `TratamientoProc` varchar(500) NOT NULL,
  `FechaProc` date NOT NULL,
  `ProxCita` date NOT NULL,
  `FechaAlta` date NOT NULL,
  `Observaciones` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`ID`, `Nombres`, `Apellidos`, `Cedula`, `Telefono`, `Correo`, `Fecha_consulta`, `Motivo_consulta`, `Direccion`, `AntecedentesPer`, `AntecedentesFam`, `NroHijos`, `TratamientoProc`, `FechaProc`, `ProxCita`, `FechaAlta`, `Observaciones`) VALUES
(0, '', '', '', '', '', '0000-00-00', '', '', '', '', 0, '', '0000-00-00', '0000-00-00', '0000-00-00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
