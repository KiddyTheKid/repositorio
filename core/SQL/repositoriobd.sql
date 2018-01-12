-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2018 at 08:10 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repositoriobd`
--

-- --------------------------------------------------------

--
-- Table structure for table `autores`
--

CREATE TABLE `autores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` text,
  `nombres` text,
  `apellidos` text,
  `correo` text,
  `telefono` text,
  `direccion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autores`
--

INSERT INTO `autores` (`id`, `cedula`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`) VALUES
(1, '0931484620', 'Pedro', 'Acosta', 'superautor@gmail.com', '093123123123', 'Mi casa');

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id`, `descripcion`) VALUES
(1, 'Informatica'),
(2, 'Administracion');

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `autor` text,
  `tipo_doc` int(11) DEFAULT NULL,
  `especialidad` int(11) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `etiquetas` varchar(3000) NOT NULL,
  `metaetiquetas` varchar(3000) NOT NULL,
  `tema` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `descripcion`) VALUES
(1, 'Cuaderno'),
(2, 'Investigacion');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` text,
  `nombres` text,
  `apellidos` text,
  `correo` text,
  `telefono` text,
  `direccion` text,
  `password` text,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `password`, `nivel`) VALUES
(1, '0931484620', 'Pedro', 'Acosta', 'pcost8300@gmail.com', '093148460', 'pp', 'fd76520107ec5ce77e2e83667d80f2ae', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
