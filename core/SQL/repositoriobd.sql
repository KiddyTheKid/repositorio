-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 02:15 PM
-- Server version: 5.6.16
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `autor` varchar(10) DEFAULT NULL,
  `tipo_doc` int(11) DEFAULT NULL,
  `especialidad` int(11) DEFAULT NULL,
  `fecha_subida` datetime DEFAULT NULL,
  `etiquetas` text,
  `metaetiquetas` text,
  `ruta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id`, `tema`, `autor`, `tipo_doc`, `especialidad`, `fecha_subida`, `etiquetas`, `metaetiquetas`, `ruta`) VALUES
(8, 'Repositorio institucional para el Instituto Tecnologico Superior Liceo Cristiano', '0931484620', 1, 1, '2018-01-29 12:16:41', 'Pedro  Acosta  Repositorio  institucional  para  el  Instituto  Tecnologico  Superior  Liceo  Cristiano  repositorio institucional  pagina web  libros  online', 'Pedro  Acosta  Repositorio  institucional  para  el  Instituto  Tecnologico  Superior  Liceo  Cristiano  repositorio institucional  pagina web  libros  online', 'Informatica/Cuaderno/0931484620repositoriobd.sql');

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
(1, '0931484620', 'Pedro', 'Acosta', 'pcost8300@gmail.com', '093148460', 'pp', 'c7f3d7ed304c17d7edff246690931f93', 0);

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
ALTER TABLE `documentos` ADD FULLTEXT KEY `tema` (`tema`,`etiquetas`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
