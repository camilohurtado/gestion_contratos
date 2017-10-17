-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2017 a las 22:28:09
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contratos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ciudad`
--

CREATE TABLE `tb_ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre_ciudad` varchar(30) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_ciudad`
--

INSERT INTO `tb_ciudad` (`id_ciudad`, `nombre_ciudad`, `id_pais`) VALUES
(1, 'Bogota', 1),
(2, 'Cali', 1),
(3, 'Quito', 2),
(4, 'Mendoza', 2),
(5, 'La Paz', 3),
(6, 'Puchinai', 3),
(7, 'cusco', 4),
(8, 'arequipa', 4),
(9, 'Caracas', 5),
(10, 'carabobo', 5),
(11, 'Buenos aires', 6),
(12, 'Laplata', 6),
(13, 'Barsilia', 7),
(14, 'Rio de janeiro', 7),
(15, 'Santiago', 8),
(16, 'Valparaiso', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(30) NOT NULL,
  `nit_empresa` varchar(30) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `sector_empresa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nombre_empresa`, `nit_empresa`, `id_ciudad`, `sector_empresa`) VALUES
(1, 'ETM', '111111111-7', 2, 'Textil'),
(2, 'Google', '222222222', 2, 'Tenologico'),
(3, 'X3', '809999008-7', 11, 'Textiles'),
(4, 'W3', '345566787-0', 1, 'Tecnologico'),
(5, 'Z', '1323232323-8', 1, 'Agricola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pais`
--

CREATE TABLE `tb_pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_pais`
--

INSERT INTO `tb_pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'Colombia'),
(2, 'Ecuador'),
(3, 'Bolibia'),
(4, 'Peru'),
(5, 'Venezuela'),
(6, 'Argentina'),
(7, 'Brazil'),
(8, 'Chile'),
(9, 'Japon'),
(11, 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedor`
--

CREATE TABLE `tb_proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(130) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `sector` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sucursal`
--

CREATE TABLE `tb_sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(30) NOT NULL,
  `direccion_sucursal` varchar(30) NOT NULL,
  `telefono_sucursal` varchar(30) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_sucursal`
--

INSERT INTO `tb_sucursal` (`id_sucursal`, `nombre_sucursal`, `direccion_sucursal`, `telefono_sucursal`, `id_empresa`) VALUES
(1, 'Calima', 'Calle 13', '55555555', 1),
(2, 'San fernando', 'Calle 11', '7777777', 2),
(3, 'Norte', 'Calle 1', '7777777', 1),
(4, '', '', '', 2),
(5, 'San nicolas', 'Calle 11', '7654321', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Visitante'),
(3, 'Gestor'),
(4, 'Empleado'),
(5, 'Jefe'),
(6, 'Sucursales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `correo`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `id_tipo`) VALUES
(1, 'lito', '$2y$10$pxniaHV0c85lpSVmrMu.t.urspSCHe4hQuJuaTPPruankgpErxRk.', 'lito', 'etovar1989@gmail.com', '2017-10-11 14:47:17', 1, '8d4f830001469a9996943bbcc4f7f7f0', '', 0, 1),
(2, 'm', '$2y$10$pxniaHV0c85lpSVmrMu.t.urspSCHe4hQuJuaTPPruankgpErxRk.', 'mm', 'm@momo.co', '2017-10-11 13:28:43', 1, '', '', 0, 2),
(3, 'm', '123', 'mm', 'm@momo.co', NULL, 1, '', NULL, 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `tb_pais`
--
ALTER TABLE `tb_pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `tb_proveedor`
--
ALTER TABLE `tb_proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tb_sucursal`
--
ALTER TABLE `tb_sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_pais`
--
ALTER TABLE `tb_pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tb_proveedor`
--
ALTER TABLE `tb_proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_sucursal`
--
ALTER TABLE `tb_sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_ciudad`
--
ALTER TABLE `tb_ciudad`
  ADD CONSTRAINT `tb_ciudad_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `tb_pais` (`id_pais`);

--
-- Filtros para la tabla `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD CONSTRAINT `tb_empresa_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `tb_ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `tb_sucursal`
--
ALTER TABLE `tb_sucursal`
  ADD CONSTRAINT `tb_sucursal_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
