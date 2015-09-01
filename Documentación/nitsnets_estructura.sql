-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2015 a las 23:14:09
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nitsnets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_idiomas`
--

CREATE TABLE IF NOT EXISTS `categorias_idiomas` (
  `fk_categorias` smallint(5) unsigned NOT NULL,
  `fk_idiomas` tinyint(3) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
  `id` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_idiomas`
--

CREATE TABLE IF NOT EXISTS `colores_idiomas` (
  `fk_colores` smallint(5) unsigned NOT NULL,
  `fk_idiomas` tinyint(3) unsigned NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE IF NOT EXISTS `idiomas` (
  `id` tinyint(3) unsigned NOT NULL,
  `codigo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bandera` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listar_categorias`
--
CREATE TABLE IF NOT EXISTS `listar_categorias` (
`id` smallint(5) unsigned
,`nombre` varchar(100)
,`codigo` varchar(2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listar_colores`
--
CREATE TABLE IF NOT EXISTS `listar_colores` (
`id` smallint(5) unsigned
,`nombre` varchar(50)
,`codigo` varchar(2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listar_productos`
--
CREATE TABLE IF NOT EXISTS `listar_productos` (
`id_categoria` smallint(5) unsigned
,`id` int(10) unsigned
,`precio` float unsigned
,`nombre` varchar(100)
,`descripcion` text
,`codigo` varchar(2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listar_productos_colores`
--
CREATE TABLE IF NOT EXISTS `listar_productos_colores` (
`id` int(10) unsigned
,`id_colores` smallint(5) unsigned
,`color` varchar(50)
,`codigo` varchar(2)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) unsigned NOT NULL,
  `fk_categorias` smallint(5) unsigned NOT NULL,
  `precio` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_colores`
--

CREATE TABLE IF NOT EXISTS `productos_colores` (
  `fk_productos` int(10) unsigned NOT NULL,
  `fk_colores` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_idiomas`
--

CREATE TABLE IF NOT EXISTS `productos_idiomas` (
  `fk_productos` int(10) unsigned NOT NULL,
  `fk_idiomas` tinyint(3) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura para la vista `listar_categorias`
--
DROP TABLE IF EXISTS `listar_categorias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_categorias` AS (select `c`.`id` AS `id`,`ci`.`nombre` AS `nombre`,`i`.`codigo` AS `codigo` from ((`categorias` `c` join `categorias_idiomas` `ci` on((`c`.`id` = `ci`.`fk_categorias`))) join `idiomas` `i` on((`ci`.`fk_idiomas` = `i`.`id`))));

-- --------------------------------------------------------

--
-- Estructura para la vista `listar_colores`
--
DROP TABLE IF EXISTS `listar_colores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_colores` AS (select `c`.`id` AS `id`,`ci`.`nombre` AS `nombre`,`i`.`codigo` AS `codigo` from ((`colores` `c` join `colores_idiomas` `ci` on((`c`.`id` = `ci`.`fk_colores`))) join `idiomas` `i` on((`ci`.`fk_idiomas` = `i`.`id`))));

-- --------------------------------------------------------

--
-- Estructura para la vista `listar_productos`
--
DROP TABLE IF EXISTS `listar_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_productos` AS (select `c`.`id` AS `id_categoria`,`p`.`id` AS `id`,`p`.`precio` AS `precio`,`pi`.`nombre` AS `nombre`,`pi`.`descripcion` AS `descripcion`,`i`.`codigo` AS `codigo` from (((`productos` `p` join `categorias` `c` on((`p`.`fk_categorias` = `c`.`id`))) join `productos_idiomas` `pi` on((`p`.`id` = `pi`.`fk_productos`))) join `idiomas` `i` on((`pi`.`fk_idiomas` = `i`.`id`))));

-- --------------------------------------------------------

--
-- Estructura para la vista `listar_productos_colores`
--
DROP TABLE IF EXISTS `listar_productos_colores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listar_productos_colores` AS (select `p`.`id` AS `id`,`c`.`id` AS `id_colores`,`ci`.`nombre` AS `color`,`i`.`codigo` AS `codigo` from ((((`productos` `p` join `productos_colores` `pc` on((`p`.`id` = `pc`.`fk_productos`))) join `colores` `c` on((`pc`.`fk_colores` = `c`.`id`))) join `colores_idiomas` `ci` on((`c`.`id` = `ci`.`fk_colores`))) join `idiomas` `i` on((`ci`.`fk_idiomas` = `i`.`id`))));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_idiomas`
--
ALTER TABLE `categorias_idiomas`
  ADD KEY `fk_categorias` (`fk_categorias`),
  ADD KEY `fk_idiomas` (`fk_idiomas`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores_idiomas`
--
ALTER TABLE `colores_idiomas`
  ADD KEY `fk_colores` (`fk_colores`),
  ADD KEY `fk_idiomas` (`fk_idiomas`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorias` (`fk_categorias`);

--
-- Indices de la tabla `productos_colores`
--
ALTER TABLE `productos_colores`
  ADD KEY `fk_productos` (`fk_productos`),
  ADD KEY `fk_colores` (`fk_colores`);

--
-- Indices de la tabla `productos_idiomas`
--
ALTER TABLE `productos_idiomas`
  ADD KEY `fk_idiomas` (`fk_idiomas`),
  ADD KEY `fk_productos` (`fk_productos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias_idiomas`
--
ALTER TABLE `categorias_idiomas`
  ADD CONSTRAINT `categorias_idiomas_ibfk_1` FOREIGN KEY (`fk_categorias`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categorias_idiomas_ibfk_2` FOREIGN KEY (`fk_idiomas`) REFERENCES `idiomas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `colores_idiomas`
--
ALTER TABLE `colores_idiomas`
  ADD CONSTRAINT `colores_idiomas_ibfk_1` FOREIGN KEY (`fk_colores`) REFERENCES `colores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `colores_idiomas_ibfk_2` FOREIGN KEY (`fk_idiomas`) REFERENCES `idiomas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fk_categorias`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_colores`
--
ALTER TABLE `productos_colores`
  ADD CONSTRAINT `productos_colores_ibfk_1` FOREIGN KEY (`fk_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_colores_ibfk_2` FOREIGN KEY (`fk_colores`) REFERENCES `colores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_idiomas`
--
ALTER TABLE `productos_idiomas`
  ADD CONSTRAINT `productos_idiomas_ibfk_1` FOREIGN KEY (`fk_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_idiomas_ibfk_2` FOREIGN KEY (`fk_idiomas`) REFERENCES `idiomas` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
