-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-03-2022 a las 23:42:47
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boat`
--

DROP TABLE IF EXISTS `boat`;
CREATE TABLE IF NOT EXISTS `boat` (
  `boat_id` int(10) NOT NULL AUTO_INCREMENT,
  `boat_name` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `marina` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `type` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `costumer_id` int(10) NOT NULL,
  PRIMARY KEY (`boat_id`),
  KEY `costumer_id` (`costumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



--
-- Estructura de tabla para la tabla `costumer`
--

DROP TABLE IF EXISTS `costumer`;
CREATE TABLE IF NOT EXISTS `costumer` (
  `costumer_id` int(10) NOT NULL AUTO_INCREMENT,
  `costumer_name` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `passport` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `country` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telephone` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`costumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



--
-- Estructura de tabla para la tabla `detail`
--

DROP TABLE IF EXISTS `detail`;
CREATE TABLE IF NOT EXISTS `detail` (
  `detail_id` int(10) NOT NULL AUTO_INCREMENT,
  `worksheet_id` int(10) NOT NULL,
  `material_id` int(10) NOT NULL,
  `material_quantity` int(10) NOT NULL,
  `material price` float NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `id_daily_worksheet` (`worksheet_id`,`material_id`),
  KEY `material_id` (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


--
-- Estructura de tabla para la tabla `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(10) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_comments` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


--
-- Estructura de tabla para la tabla `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `material_id` int(10) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `serial_number` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `material_price` float NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


--
-- Estructura de tabla para la tabla `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_number` int(10) NOT NULL,
  `project_date` date NOT NULL,
  `project_desc` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `project_state` tinyint(1) NOT NULL,
  `project_comments` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `pictures` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `files` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `boat_id` int(10) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `boat_id` (`boat_id`),
  KEY `invoice_id` (`invoice_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'Francisco Javier', 'Monleón Galiana', 'admin@admin.com', '$2y$04$QhLvOvfwVAPqaVj3LI7Vs.qoJR5XmovqVXWELb4kmEsLIobDKExYG', 'admin', NULL),
(2, 'juan', 'doner', 'juan@admin.com', '$2y$04$Mr4GrJHlVTug.7swotwwFuMY9minpcCkB21seyt5ht4gyNJLmL7PO', 'user', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `worksheet`
--

DROP TABLE IF EXISTS `worksheet`;
CREATE TABLE IF NOT EXISTS `worksheet` (
  `worksheet_id` int(10) NOT NULL AUTO_INCREMENT,
  `worksheet_date` date NOT NULL,
  `worksheet_desc` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `efective_time` float NOT NULL,
  `project_id` int(10) NOT NULL,
  PRIMARY KEY (`worksheet_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;





--
-- Filtros para la tabla `boat`
--
ALTER TABLE `boat`
  ADD CONSTRAINT `boat_ibfk_1` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet` (`worksheet_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`boat_id`) REFERENCES `boat` (`boat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `worksheet`
--
ALTER TABLE `worksheet`
  ADD CONSTRAINT `worksheet_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
