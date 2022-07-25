-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-07-2022 a las 22:17:11
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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `boat`
--

INSERT INTO `boat` (`boat_id`, `boat_name`, `marina`, `type`, `costumer_id`) VALUES
(70, 'THOR', 'muelle deportivo', 'trimaran', 136),
(71, 'Phantasme', 'muelle deportivo', 'velero', 137),
(72, 'Patrice', 'Mogan', 'Velero', 138),
(73, 'Inicio', 'Muelle deportivo', 'velero', 139),
(74, 'Zaphire', 'Muelle deportivo', 'Catamaran', 140),
(75, 'Niamy', 'Lanzarote', 'Velero', 141),
(76, 'Rijosos', 'Pasito Blanco', 'Motor', 142),
(77, 'Alpine', 'Muelle deportivo', 'Velero', 143),
(78, 'Furia', 'mogan', 'velero', 144),
(79, 'Shiva', 'Mogan', 'Velero', 145);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `section_id` int(10) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `section_id` (`section_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `section_id`) VALUES
(1, 'instalacion', 1),
(2, 'punta huecas', 2),
(7, 'Rosca métrica', 6),
(9, 'rosca chapa', 6),
(12, 'withwor', 6),
(13, 'regulador', 7),
(15, 'cable rojo 4mm2 ', 8),
(17, 'tapafugas', 7),
(18, 'cable negro 6mm2', 8),
(20, 'Electrónica', 9),
(24, 'Arranque', 9),
(25, 'Instalación', 9);

-- --------------------------------------------------------

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
  `email` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`costumer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `costumer`
--

INSERT INTO `costumer` (`costumer_id`, `costumer_name`, `address`, `passport`, `country`, `telephone`, `email`) VALUES
(136, 'thomas thomasson', 'Calle destroy', '65987654654e', 'noruega', '987654321', 'thomas@thomas.com'),
(137, 'Philip Gaston', 'Rue Clarise 23 paris', '65465sd6546s', 'Francia', '+33 654987', 'philip@hotmail.com'),
(138, 'pedro Arumas', '32 Red road ', '6546464d', 'USA', '+1 6546 654', ''),
(139, 'luigy forte', 'calle ruiz', '6546546f', 'Italia', '+32 6546 5464 ', ''),
(140, 'Giancarlo Federico', 'Rue 45 cd342354', '987654987df', 'Suiza', '654987546', 'gian@tomo.com'),
(141, 'teo gonzalez', 'sucasa 34', '9865468e', 'España', '987654321', ''),
(142, 'Marina Estrella', 'Puerto deportivo el Masnou', '65465466r', 'España', '654654654', 'estrella@marina.com'),
(143, 'Damian Herrero', 'Calle derecha 2 CP 324322', '987654321f', 'Argentina', '987654321', 'damian@hot.com'),
(144, 'alfonso peñon', 'calle piedra 23 cp 35094', '64656565d', 'españa', '+6546546546', 'alfonso@hotmail.com'),
(145, 'Federico Gimenez', 'Calle las calendulas 12 CP 35024 Las Palmas de gran canaria', '654987654r', 'España', '+34 987654312', 'federico@hotmail.com');

-- --------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(10) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_comments` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `project_id` int(10) NOT NULL,
  `timestamp_invoice` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_number`
--

DROP TABLE IF EXISTS `invoice_number`;
CREATE TABLE IF NOT EXISTS `invoice_number` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `project_date` date NOT NULL,
  `project_desc` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `project_state` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `project_comments` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `pictures` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `files` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `boat_id` int(10) NOT NULL,
  `timestamp_project` timestamp(6) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `boat_id` (`boat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`project_id`, `project_number`, `project_date`, `project_desc`, `project_state`, `project_comments`, `pictures`, `files`, `boat_id`, `timestamp_project`) VALUES
(6, '22-05-010', '2022-06-01', 'nevera no funciona.', 'w', 'nevera en garantia', '', '', 70, '2022-06-25 02:08:02.000000'),
(8, '22-06-002', '2022-06-04', 'Comprobar instalacion electrica', 'f', 'llamar antes', '', '', 73, '2022-06-01 22:44:26.000000'),
(9, '22-06-003', '2022-06-01', 'cambiar helice de proa', 's', 'ninguna', '', '', 73, '2022-06-28 22:53:48.000000'),
(10, '22-06-004', '2022-06-01', 'Cambio de baterias de gel por baterias de litio', 'f', 'hacer fotos de la instalacion', '', '', 74, '2022-06-04 22:55:27.000000'),
(11, '22-06-006', '2022-05-30', 'nevera no funciona.', 'f', 'nevera en garantia', '', '', 74, '2022-06-05 00:29:00.000000'),
(12, '22-06-022', '2022-06-03', 'acabar barco', 'f', 'ninguna', '', '', 75, '2022-06-05 01:27:39.000000'),
(13, '22-06-028', '2022-06-02', 'El barco da corriente cuando se toca cualquier parte metalica del casco', 'f', 'ninguna', '', '', 76, '2022-06-07 21:58:44.000000'),
(14, '22-06-031', '2022-06-13', 'presupuesto', 's', 'ninguna', '', '', 76, '2022-06-18 01:03:32.000000'),
(15, '22-06-032', '2022-06-13', 'nevera no funciona.', 's', 'llamar antes', '', '', 77, '2022-06-12 21:44:41.000000'),
(16, '22-06-034', '2022-06-03', 'cambiar helice de popa', 's', 'ninguna', '', '', 72, '2022-06-23 22:36:18.000000'),
(19, '22-06-048', '2022-06-27', 'Comprobar instalacion electrica', 'w', ' ', '', '', 72, '2022-06-25 00:55:38.000000'),
(21, '22-07-013', '2022-07-04', 'Cambiar baterias de servicio', 'w', 'Barco azul dos palos', '', '', 79, '2022-06-30 23:39:12.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(10) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`section_id`, `section_name`) VALUES
(6, 'Tornilleria'),
(7, 'Frio'),
(8, 'energía solar'),
(9, 'cables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategory_id` int(10) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(200) COLLATE ucs2_spanish_ci NOT NULL,
  `subcategory_stock` int(10) NOT NULL,
  `subcategory_price` float NOT NULL,
  `serial_number` varchar(70) COLLATE ucs2_spanish_ci DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`subcategory_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

-- --------------------------------------------------------

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
  `worksheet_desc` longtext COLLATE latin1_spanish_ci NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `efective_time` float DEFAULT '0',
  `project_id` int(10) NOT NULL,
  `time_worksheet` timestamp(6) NOT NULL,
  PRIMARY KEY (`worksheet_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `worksheet`
--

INSERT INTO `worksheet` (`worksheet_id`, `worksheet_date`, `worksheet_desc`, `start_time`, `finish_time`, `efective_time`, `project_id`, `time_worksheet`) VALUES
(1, '2022-06-06', 'fsadf', '11:00:00', '12:30:00', 1.5, 10, '2022-06-06 00:31:20.000000'),
(2, '2022-06-06', 'asf', '10:30:00', '11:30:00', 1, 10, '2022-06-06 00:31:50.000000'),
(3, '2022-06-03', 'sadfsd', '10:30:00', '11:30:00', 1, 12, '2022-06-06 00:36:21.000000'),
(11, '2022-06-15', 'fdghf', '09:30:00', '10:30:00', 1, 12, '2022-06-06 22:11:01.000000'),
(12, '2022-06-01', 'dfh', '08:30:00', '09:30:00', 1, 8, '2022-06-06 22:15:42.000000'),
(13, '2022-06-07', '  dghfdsghfdjhn', '11:00:00', '13:00:00', 2, 10, '2022-06-24 22:18:45.000000'),
(14, '2022-06-02', 'sdfghsdfgdsgdfhds', '08:30:00', '10:30:00', 2, 10, '2022-06-06 23:48:02.000000'),
(15, '2022-05-31', 'dfhfdjhf', '09:00:00', '10:00:00', 1, 10, '2022-06-06 23:49:41.000000'),
(17, '2022-06-02', 'El barco da calambre cuando alguien toca algún metal. Se comprueban todas las masas del barco, por si se pudiese encontrar alguna derivacion. Despues se buscan derivaciones en sala de maquinas y cuadro electrico en camarote de proa-estribor. Comprobar cable de conexion a torreta.\r\n', '10:00:00', '18:30:00', 8.5, 13, '2022-06-07 22:19:30.000000'),
(18, '2022-06-03', 'Comprobar cuadro electrico y posibles derivaciones. Se desmonta la principal toma de corriente del barco y se encuentra una humedad que provocaba una derivacion.\r\nTambien se encuentra, el conector que enchufa en el barco que esta mal hecho, presumiblemente desde el principio. Se limpia la humedad, y se conecta bien el enchufe, y se deja funcionando todo.', '10:00:00', '15:30:00', 5.5, 13, '2022-06-07 22:21:22.000000'),
(19, '2022-06-13', ' Hacer presupuesto', '09:00:00', '10:00:00', 1, 14, '2022-06-18 01:03:12.000000'),
(22, '2022-06-13', 'comprobar funcionamiento, falta gas, rellenar y comprobar.', '09:00:00', '12:00:00', 3, 15, '2022-06-12 21:46:08.000000'),
(35, '2022-07-06', 'sadfsadf', '13:30:00', '15:00:00', 6, 16, '2022-06-26 01:20:10.000000'),
(36, '2022-07-01', ' barco grande', '08:00:00', '12:00:00', 1.5, 16, '2022-06-28 23:29:55.000000'),
(39, '2022-07-01', 'sdgfvdfg', '10:00:00', '15:00:00', 4, 16, '2022-06-26 01:34:46.000000'),
(40, '2022-06-27', '  otro trabajo nuevo', '11:00:00', '19:00:00', 7, 16, '2022-06-28 23:27:46.000000'),
(64, '2022-06-22', 'dfsdfsdfsd', '08:00:00', '14:30:00', 6.5, 9, '2022-06-26 18:07:08.000000'),
(65, '2022-06-23', 'asdfsadfsdf', '09:30:00', '13:00:00', 2, 9, '2022-06-26 18:08:01.000000'),
(77, '2022-06-11', '    hacer instalacion electrica motor', '11:00:00', '14:30:00', 3, 9, '2022-06-28 23:02:21.000000'),
(78, '2022-06-13', '  wefwsed', '08:30:00', '12:30:00', 4, 9, '2022-06-28 23:07:39.000000'),
(79, '2022-06-15', '  enviar algo mas', '08:30:00', '11:30:00', 3, 9, '2022-06-28 23:19:45.000000'),
(81, '2022-06-15', '   nuevo trabajo', '12:30:00', '14:30:00', 2, 9, '2022-06-28 23:24:24.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_number`
--

DROP TABLE IF EXISTS `work_number`;
CREATE TABLE IF NOT EXISTS `work_number` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `work_number` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boat`
--
ALTER TABLE `boat`
  ADD CONSTRAINT `boat_ibfk_1` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`costumer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet` (`worksheet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`boat_id`) REFERENCES `boat` (`boat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `worksheet`
--
ALTER TABLE `worksheet`
  ADD CONSTRAINT `worksheet_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
DROP EVENT `resetwork`$$
CREATE DEFINER=`javier`@`localhost` EVENT `resetwork` ON SCHEDULE EVERY 1 DAY STARTS '2022-06-01 00:00:00' ON COMPLETION PRESERVE ENABLE DO truncate table work_number$$

DROP EVENT `resetinvoice`$$
CREATE DEFINER=`javier`@`localhost` EVENT `resetinvoice` ON SCHEDULE EVERY 1 MONTH STARTS '2022-06-01 00:00:00' ON COMPLETION PRESERVE ENABLE DO truncate table invoice_number$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
