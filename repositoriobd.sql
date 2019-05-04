-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-03-2019 a las 06:18:14
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `repositoriobd`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_documento` (IN `P_TEMA` TEXT, IN `P_ESPECIALIDAD` INT, IN `P_TIPO_DOC` INT, IN `P_FECHA_SUBIDA` DATETIME)  BEGIN
  CASE
    WHEN -- 000
        P_ESPECIALIDAD IS NULL AND
        P_TIPO_DOC IS NULL AND
        P_FECHA_SUBIDA IS NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE);
    WHEN -- 100
        P_ESPECIALIDAD IS NOT NULL AND
        P_TIPO_DOC IS NULL AND
        P_FECHA_SUBIDA IS NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            doc.especialidad = P_ESPECIALIDAD;
    WHEN -- 010
        P_ESPECIALIDAD IS NULL AND
        P_TIPO_DOC IS NOT NULL AND
        P_FECHA_SUBIDA IS NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            doc.tipo_doc = P_TIPO_DOC;
    WHEN -- 001
        P_ESPECIALIDAD IS NULL AND
        P_TIPO_DOC IS NULL AND
        P_FECHA_SUBIDA IS NOT NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            YEAR(doc.fecha_subida) = YEAR(P_FECHA_SUBIDA) AND MONTH(doc.fecha_subida) = MONTH(P_FECHA_SUBIDA);
    WHEN -- 110
        P_ESPECIALIDAD IS NOT NULL AND
        P_TIPO_DOC IS NOT NULL AND
        P_FECHA_SUBIDA IS NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            doc.especialidad = P_ESPECIALIDAD AND doc.tipo_doc = P_TIPO_DOC;
    WHEN -- 111
        P_ESPECIALIDAD IS NOT NULL AND
        P_TIPO_DOC IS NOT NULL AND
        P_FECHA_SUBIDA IS NOT NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            doc.especialidad = P_ESPECIALIDAD AND doc.tipo_doc = P_TIPO_DOC AND
            YEAR(doc.fecha_subida) = YEAR(P_FECHA_SUBIDA) AND MONTH(doc.fecha_subida) = MONTH(P_FECHA_SUBIDA);
    WHEN -- 011
        P_ESPECIALIDAD IS NULL AND
        P_TIPO_DOC IS NOT NULL AND
        P_FECHA_SUBIDA IS NOT NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            doc.tipo_doc = P_TIPO_DOC AND
            YEAR(doc.fecha_subida) = YEAR(P_FECHA_SUBIDA) AND MONTH(doc.fecha_subida) = MONTH(P_FECHA_SUBIDA);
    WHEN -- 101
        P_ESPECIALIDAD IS NOT NULL AND
        P_TIPO_DOC IS NULL AND
        P_FECHA_SUBIDA IS NOT NULL
      THEN
        SELECT CONCAT(aut.nombres, ' ', aut.apellidos), doc.tema, doc.fecha_subida, doc.ruta, tp.descripcion, c.descripcion FROM documentos AS doc
                        INNER JOIN autores AS aut ON doc.autor = aut.cedula
                        INNER JOIN tipos_documentos AS tp ON doc.tipo_doc = tp.id
                        INNER JOIN carreras AS c ON doc.especialidad = c.id
        WHERE MATCH(doc.tema, doc.etiquetas) AGAINST (P_TEMA IN NATURAL LANGUAGE MODE) AND
            doc.especialidad = P_ESPECIALIDAD AND YEAR(doc.fecha_subida) = YEAR(P_FECHA_SUBIDA) AND MONTH(doc.fecha_subida) = MONTH(P_FECHA_SUBIDA);
    END CASE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
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
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `cedula`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`) VALUES
(1, '0931484620', 'Pedro', 'Acosta', 'superautor@gmail.com', '093123123123', 'Mi casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `descripcion`) VALUES
(1, 'Informatica'),
(2, 'Administracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
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
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `tema`, `autor`, `tipo_doc`, `especialidad`, `fecha_subida`, `etiquetas`, `metaetiquetas`, `ruta`) VALUES
(1, 'Pues el tema', '0931484620', 2, 2, '2019-03-21 23:04:06', 'Pedro  Acosta  Pues  el  tema  arboles  ecologia', 'Pedro  Acosta  Pues  el  tema  arboles  ecologia', 'Administracion/Investigacion/0931484620/Discret Propability.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `descripcion`) VALUES
(1, 'Cuaderno'),
(2, 'Investigacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
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
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombres`, `apellidos`, `correo`, `telefono`, `direccion`, `password`, `nivel`) VALUES
(1, '0931484620', 'Pedro', 'Acosta', 'pcost8300@gmail.com', '093148460', 'pp', 'fd76520107ec5ce77e2e83667d80f2ae', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `documentos` ADD FULLTEXT KEY `tema` (`tema`,`etiquetas`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
