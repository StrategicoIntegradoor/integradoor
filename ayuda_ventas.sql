-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2022 a las 20:53:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupoasi_cotizautos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda_ventas`
--

CREATE TABLE `ayuda_ventas` (
  `id` int(11) NOT NULL,
  `aseguradora` varchar(45) CHARACTER SET utf8 NOT NULL,
  `linea_de_atencion` varchar(10) CHARACTER SET utf8 NOT NULL,
  `link_clausulado` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `path_sarlaft` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `path_sarlaft2` varchar(100) DEFAULT NULL,
  `centro_de_inspeccion` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `continuidad` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `formas_de_pago` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `tips_de_expedicion` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `intermediario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ayuda_ventas`
--

INSERT INTO `ayuda_ventas` (`id`, `aseguradora`, `linea_de_atencion`, `link_clausulado`, `path_sarlaft`, `path_sarlaft2`, `centro_de_inspeccion`, `continuidad`, `formas_de_pago`, `tips_de_expedicion`, `intermediario_id`) VALUES
(1, 'Allianz', '#265', 'https://github.com/', '1_Allianz_Sarlaft.pdf', '1_Allianz_Sarlaft2.pdf', 'Automatas-Colserautos', '', '', '', NULL),
(2, 'Solidaria', '#789', NULL, NULL, NULL, 'Automas', 'Modelos hasta 7 años para particulares', '', '', NULL),
(3, 'AXA', '#247', NULL, NULL, NULL, 'Automas', 'Modelos hasta 7 años para particulares', '', '', NULL),
(4, 'Bolivar', '#322', NULL, NULL, NULL, 'Automas', 'Test continuidad-Test continuidad 9', 'Efectivo-Cheque-Financiación directa con bolivar cuota inicial 15%-Debito automático-PSE o tarjeta de débito', '', NULL),
(5, 'Equidad', '#324', NULL, NULL, NULL, 'Automas', 'Modelos hasta 8 años para particulares-Documentos: póliza vigente, Sarlaft, cédula y Tarjeta de prop', NULL, NULL, NULL),
(6, 'HDI', '	#204', NULL, NULL, NULL, 'Automas', 'Modelos hasta 8 años para particulares-Documentos: póliza vigente, Sarlaft, cédula y Tarjeta de prop', NULL, NULL, NULL),
(7, 'Liberty', '#224', NULL, NULL, NULL, 'Automas', 'Modelos hasta 8 años para particulares-Documentos: póliza vigente, Sarlaft, cédula y Tarjeta de prop', NULL, NULL, NULL),
(8, 'Mapfre', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Mundial', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Previsora', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'SBS', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Estado', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Sura', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Zurich', '#624', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ayuda_ventas`
--
ALTER TABLE `ayuda_ventas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
