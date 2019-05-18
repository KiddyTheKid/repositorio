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
