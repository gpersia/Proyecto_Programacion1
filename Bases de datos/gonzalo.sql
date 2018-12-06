-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2018 a las 17:39:12
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fecha_acceso` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `response_time` float NOT NULL,
  `endpoint` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `username`, `fecha_acceso`, `response_time`, `endpoint`, `created`) VALUES
(2, 'GonzaloCRUD', '2018-12-06 16:24:57.809671', 0.0173, 'localhost/Proyecto%20final/api/vehiculo/CRUD.php/GET', '2018-12-06 16:24:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `id` int(255) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `dni` int(9) DEFAULT NULL,
  `FK_vehiculo` int(255) NOT NULL,
  `FK_transporte` int(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`id`, `nombre`, `apellido`, `email`, `dni`, `FK_vehiculo`, `FK_transporte`, `created`, `updated`) VALUES
(34, 'Gonzalo', 'Tempra', 'gonzalotempra96@hotmail.com', 39850155, 1, 3, '2018-12-06 14:02:03', '2018-12-06 14:02:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relaciones`
--

CREATE TABLE `relaciones` (
  `FK_vehiculos` int(255) NOT NULL,
  `FK_transporte` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id` int(255) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `pais_procedencia` varchar(30) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id`, `nombre`, `pais_procedencia`, `created`, `updated`) VALUES
(1, 'Uber', 'USA', '2018-11-30 22:01:23', '2018-11-30 22:01:23'),
(2, 'Taxi', 'Argentina', '2018-11-30 22:02:48', '2018-11-30 22:02:48'),
(3, 'Remis', 'Argentina', '2018-11-30 22:03:04', '2018-11-30 22:03:04'),
(4, 'Cabify', 'España', '2018-11-30 22:03:17', '2018-11-30 22:03:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(2048) NOT NULL,
  `fechaAcceso` varchar(25) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fechaAcceso`, `created`) VALUES
(31, 'Gonzalo', '12345', NULL, '2018-12-05 23:28:10'),
(32, 'GonzaloCRUD', '$2y$10$0aGA7l97qf..XTMaWcAwCevtmM82q58jHPsn9O7xUDkiP5LkzXiZy', NULL, '2018-12-06 12:22:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(255) NOT NULL,
  `marca` varchar(12) DEFAULT NULL,
  `modelo` varchar(12) DEFAULT NULL,
  `anho_fabricacion` int(6) DEFAULT NULL,
  `patente` varchar(12) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `marca`, `modelo`, `anho_fabricacion`, `patente`, `created`, `update`) VALUES
(1, 'peugeot', '206', 2012, 'aa888aa', '2018-12-03 14:34:41', '2018-12-05 20:17:12'),
(4, 'fiat', 'uno', 2007, 'JUT221', '2018-12-05 13:11:58', '2018-12-05 13:12:42'),
(5, 'nissan', 'tida', 2009, 'KDT684', '2018-12-05 13:12:30', '2018-12-05 13:12:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `FK_vehiculos` (`FK_vehiculo`),
  ADD KEY `FK_transporte` (`FK_transporte`);

--
-- Indices de la tabla `relaciones`
--
ALTER TABLE `relaciones`
  ADD PRIMARY KEY (`FK_vehiculos`,`FK_transporte`),
  ADD KEY `FK_T` (`FK_transporte`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patente` (`patente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD CONSTRAINT `FK_transporte` FOREIGN KEY (`FK_transporte`) REFERENCES `transporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_vehiculos` FOREIGN KEY (`FK_vehiculo`) REFERENCES `vehiculo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relaciones`
--
ALTER TABLE `relaciones`
  ADD CONSTRAINT `FK_T` FOREIGN KEY (`FK_transporte`) REFERENCES `transporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_V` FOREIGN KEY (`FK_vehiculos`) REFERENCES `vehiculo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
