-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2016 a las 08:19:43
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

create database crud_users;
use crud_users;
-- id
-- `license_number` varchar(17) NOT NULL,
--   `brand` varchar(100) NOT NULL,
--   `model` varchar(100) NOT NULL,
--   `car_plate` varchar(7) NOT NULL,
--   `km` int NOT NULL,
--   `category` varchar(100) NOT NULL,
--   `type` varchar(100) NOT NULL,
--   `comments` varchar(1000) NOT NULL,
--   `discharge_date` varchar(10) NOT NULL,
--   `color` varchar(1000) NOT NULL,
--   `extras` varchar(1000) NOT NULL,
--   `car_image` varchar(1000) NOT NULL,
--   `price` longtext NOT NULL,
--   `doors` int NOT NULL,
--   `city` varchar(100) NOT NULL,
--   `lat` varchar(1000) NOT NULL,
--   `lng` varchar(1000) NOT NULL

CREATE TABLE IF NOT EXISTS `coches` (
  `id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `license_number` varchar(17) COLLATE utf8_spanish_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `model` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `car_plate` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `km` int  COLLATE utf8_spanish_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `comments` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `discharge_date` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `extras` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `car_image` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `price` longtext COLLATE utf8_spanish_ci NOT NULL,
  `doors` int COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lat` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `lng` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `coches` (`id`, `license_number`, `brand`, `model`, `car_plate`, `km`, `category`, `type`, `comments`, `discharge_date`, `color`, `extras`, `car_image`, `price`, `doors`, `city`, `lat`, `lng`) VALUES
(72, '1W2D50JIL04J3L5K1', 'BMW', 'I4', '4567DAB', 0, 'KM0', 'ET', 'Coche nuevo y automático', '15/04/2019', 'Red', 'Navegador', 'bmw_i4.jpg', '50000€', 4, 'Ontinyent', '38.8232769', '-0.600155'),
(73, '2OUD50JIL04J3L5G6', 'CP', 'Formentor', '7645JDH', 10000, 'RT', 'GS', 'Coche nuevo y automático', '26/07/2019', 'Mate_Blue', 'Navegador', 'cupra_formentor.jpg', '32000€', 5, 'Barcelona', '41.378517020872096', '2.12054921251206'),
(74, '8P9D50JIL04J3L1H7', 'FRD', 'Mustang', '6547LGM', 2000, 'SM', 'ET', 'Coche nuevo y automático', '30/03/2019', 'Blue', 'Navegador', 'ford_mustang.jpg', '39000€', 5, 'Valencia', '39.4697065', '-0.3763353'),
(75, '44GD50JIL04J3LH58', 'MCD', 'GLC Coupé', '9745DFM', 0, 'SM', 'OT', 'Coche nuevo y automático', '26/07/2019', 'Mate_Grey', 'Navegador', 'mercedes_glc_coupe.jpg', '60000€', 5, 'Barcelona', '41.37422519654638', '2.175717061578382'),
(76, '3J4750JIL04J3LKP4', 'AUD', 'A6', '2641FKL', 50000, 'RT', 'HB', 'Coche nuevo y automático', '20/06/2017', 'White', 'Navegador', 'audi_q5_hibrido.jpg', '28000€', 4, 'Madrid', '40.4167047', '-3.7035825'),
(77, '6k41L9JIL04J3LKP4', 'TS', 'Roadster', '4621LPL', 0, 'KM0', 'ET', 'Coche nuevo y automático', '22/02/2022', 'Red', 'Navegador', 'audi_q5_hibrido.jpg', '100000€', 4, 'Granada', '40.4167047', '-3.7035825');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
