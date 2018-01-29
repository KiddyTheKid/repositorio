-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2018 at 05:32 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
  `id` int(10) UNSIGNED NOT NULL,
  `tema` text,
  `autor` varchar(10) NOT NULL,
  `tipo_doc` int(11) NOT NULL,
  `especialidad` int(11) NOT NULL,
  `fecha_subida` datetime NOT NULL,
  `etiquetas` varchar(500) NOT NULL,
  `metaetiquetas` varchar(500) NOT NULL,
  `ruta` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id`, `tema`, `autor`, `tipo_doc`, `especialidad`, `fecha_subida`, `etiquetas`, `metaetiquetas`, `ruta`) VALUES
(1, 'Respaldo de la base de datos', '0931484620', 1, 1, '2018-01-27 23:08:17', 'Base de datos, sql, respaldo', 'Pedro Acosta Respaldo de la base de datos Base de datos sql respaldo', '/opt/lampp/htdocs/repoFiles/2018-Jan-Sun050817.sql'),
(2, 'pepe libros', '0931484620', 1, 1, '2018-01-27 23:22:37', 'Mega, libros', 'Pedro Acosta pepe libros Mega libros', '/opt/lampp/htdocs/repoFiles/2018-Jan-Sun052237.png');

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
  ADD PRIMARY KEY (`id`);
ALTER TABLE `documentos` ADD FULLTEXT KEY `idx` (`tema`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
