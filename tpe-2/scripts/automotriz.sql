-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server:3306
-- Generation Time: Nov 23, 2021 at 11:04 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automotriz`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `id_auto` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `anio` varchar(4) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `id_marca` int NOT NULL,
  PRIMARY KEY (`id_auto`),
  KEY `id_marca` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`id_auto`, `modelo`, `anio`, `img`, `id_marca`) VALUES
(5, 'Ford Fiesta Ambiente', '2010', '', 4),
(6, 'Ford Fiesta Ambiente XDi', '2010', '', 4),
(7, 'fiat taurus ', '2019', '', 2),
(8, 'volkswagen polo ', '2011', '', 1),
(12, 'fiat spazio 128', '2001', 'img/auto/617b2dd513aec5.61179938.jpg', 2),
(14, 'Ford mustang 34', '1997', 'img/auto/617b3386673761.47373708.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `puntuacion` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_auto` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_auto` (`id_auto`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`id`, `descripcion`, `puntuacion`, `id_usuario`, `id_auto`) VALUES
(2, 'Desatre total', 4, 1, 5),
(51, 'sfdafsadfdsfsdfsdfa', 2, 6, 5),
(52, 'mediocre', 5, 6, 12),
(53, 'dsfdsf', 3, 6, 5),
(54, 'fsfsdfsfdsf', 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `origen` varchar(18) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`, `origen`) VALUES
(1, 'volkswagen', 'Alemania'),
(2, 'Fiat', 'Italia'),
(3, 'Audi', 'Alemania'),
(4, 'Ford', 'Estados Unidos'),
(5, 'Toyota', 'Japon');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `permisos` char(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `contraseña`, `permisos`) VALUES
(1, 'Axel Luguercio', 'axelluguercio@gmail.com', '$2y$10$45cyCAFM1GO4pd/zs6KlIO0Ejcyo53wGYaOdbKoL/RUeam1SSqWcu', 'U'),
(6, 'admin', 'admin@admin.com', '$2a$12$UF2ae0ILftXZ3UbRWp8fu.TLehujgobNLTbCCSGtdMlgE/51cr3ki', 'A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE;

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `auto` (`id_auto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
