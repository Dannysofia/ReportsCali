-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 06:44:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reportscali`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `Id_barrio` int(11) NOT NULL,
  `Bar_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`Id_barrio`, `Bar_nombre`) VALUES
(1, 'San fernando'),
(2, 'Terron'),
(3, 'Siloe'),
(4, 'La alameda'),
(5, 'Puerto resistencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_secretario`
--

CREATE TABLE `codigos_secretario` (
  `Id_codigo` int(11) NOT NULL,
  `Codigo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codigos_secretario`
--

INSERT INTO `codigos_secretario` (`Id_codigo`, `Codigo`) VALUES
(1, 'SMO3890'),
(2, 'MRO5050'),
(3, 'JGO6789'),
(4, 'RPS456'),
(5, 'ART2565'),
(6, 'LCL098'),
(12, 'VALV847');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `Id_comentario` int(11) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `Contenido` varchar(45) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_reporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`Id_comentario`, `fecha`, `Contenido`, `Id_usuario`, `Id_reporte`) VALUES
(1, '2023-08-15', 'Muchas gracias', 3, 3),
(2, '2023-08-15', 'Trabajo satisfactorio ', 5, 2),
(3, '2023-08-15', 'Quedo mal', 3, 1),
(4, '2023-08-15', 'Hola', 3, 4),
(5, '2023-08-15', 'Muy bonito', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `Id_estado` int(11) NOT NULL,
  `Est_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`Id_estado`, `Est_nombre`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `Id_imagenes` int(11) NOT NULL,
  `Nombre_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`Id_imagenes`, `Nombre_img`) VALUES
(1, 'descarga.jpg'),
(2, ''),
(3, ''),
(4, 'Diagrama Biblioteca.png'),
(5, 'puente.png'),
(6, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `Id_notificacion` int(11) NOT NULL,
  `Fecha_notificacion` date NOT NULL,
  `Contenido` varchar(45) NOT NULL,
  `Id_reporte` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`Id_notificacion`, `Fecha_notificacion`, `Contenido`, `Id_reporte`, `Id_usuario`) VALUES
(1, '2023-09-18', 'Estado reporte', 1, 3),
(2, '2023-09-18', 'Finalizacion', 2, 5),
(3, '2023-09-18', 'El reporte esta en estado inconcluso', 3, 3),
(4, '2023-09-18', 'Notificacion2', 4, 5),
(5, '2023-09-18', 'Notificacion3', 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_mantenimiento`
--

CREATE TABLE `ordenes_mantenimiento` (
  `Id_ordenes_mantenimiento` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Fecha_creacion` date NOT NULL,
  `Fecha_terminacion` date NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_prioridad` int(11) NOT NULL,
  `Id_estado` int(11) NOT NULL,
  `Id_imagen` varchar(100) NOT NULL,
  `Supervisor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes_mantenimiento`
--

INSERT INTO `ordenes_mantenimiento` (`Id_ordenes_mantenimiento`, `Descripcion`, `Fecha_creacion`, `Fecha_terminacion`, `Id_usuario`, `Id_prioridad`, `Id_estado`, `Id_imagen`, `Supervisor`) VALUES
(1, 'test', '2023-11-19', '0000-00-00', 1, 3, 3, '4', 'testt'),
(2, 'eerr', '2023-11-19', '0000-00-00', 1, 2, 2, '6', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

CREATE TABLE `prioridades` (
  `Id_prioridades` int(11) NOT NULL,
  `Pri_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`Id_prioridades`, `Pri_nombre`) VALUES
(1, 'Critica'),
(2, 'Alta'),
(3, 'Media'),
(4, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `Id_reportes` int(11) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Tamano` int(11) NOT NULL,
  `Id_unidad` int(11) NOT NULL,
  `Id_imagen` int(11) DEFAULT NULL,
  `Id_video` int(11) DEFAULT NULL,
  `Id_estado` int(11) NOT NULL,
  `Id_prioridad` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Id_tipos_danos` int(11) NOT NULL,
  `Id_ubicacion` int(11) NOT NULL,
  `Id_barrio` int(11) NOT NULL,
  `Id_orden_mantenimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`Id_reportes`, `Direccion`, `fecha_reporte`, `Descripcion`, `Tamano`, `Id_unidad`, `Id_imagen`, `Id_video`, `Id_estado`, `Id_prioridad`, `Id_usuario`, `Id_tipos_danos`, `Id_ubicacion`, `Id_barrio`, `Id_orden_mantenimiento`) VALUES
(1, 'Calle 5', '2023-11-19', 'test', 2, 1, 1, 2, 3, 0, 1, 5, 1, 1, 1),
(2, 'Calle 9A-32', '2023-11-19', 'Hueco mortal en la Via', 3, 3, 5, 3, 3, 0, 1, 4, 2, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id_rol` int(11) NOT NULL,
  `Rol_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_rol`, `Rol_nombre`) VALUES
(1, 'Secretario'),
(2, 'Ciudadano'),
(3, 'Administrador'),
(4, 'Gestor vial'),
(5, 'Auditor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_danos`
--

CREATE TABLE `tipos_danos` (
  `Id_tipos_danos` int(11) NOT NULL,
  `Tip_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_danos`
--

INSERT INTO `tipos_danos` (`Id_tipos_danos`, `Tip_nombre`) VALUES
(1, 'Huecos'),
(2, 'Baches'),
(3, 'Hundimientos'),
(4, 'Grietas'),
(5, 'Piel de cocodrilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `Id_ubicacion` int(11) NOT NULL,
  `Latitud` varchar(45) NOT NULL,
  `Longitud` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`Id_ubicacion`, `Latitud`, `Longitud`) VALUES
(1, '3.423657', '-76.558179'),
(2, '3.420701', '-76.560099');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `Id_Unidad` int(11) NOT NULL,
  `Uni_nombre` varchar(45) NOT NULL,
  `Abreviatura` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades_medida`
--

INSERT INTO `unidades_medida` (`Id_Unidad`, `Uni_nombre`, `Abreviatura`) VALUES
(1, 'Metros', 'm'),
(2, 'Centimetros', 'cm'),
(3, 'Hectometros', 'hm'),
(4, 'decametros', 'dm'),
(5, 'Kilometros', 'km');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Usu_nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Correo_electronico` varchar(100) NOT NULL,
  `Contrasena` varchar(45) NOT NULL,
  `Id_codigo` int(11) DEFAULT NULL,
  `Id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `Usu_nombre`, `Apellido`, `Correo_electronico`, `Contrasena`, `Id_codigo`, `Id_rol`) VALUES
(1, 'Santiago', 'Morales', 'Smora@gmail.com', '1234', 1, 1),
(2, 'Mariana', 'Rodriguez', 'Mariana@gmail.com', '5642', 2, 1),
(3, 'Juan', 'Perez', 'Juanperez456@gmail.com', '7890', 0, 2),
(4, 'Julian', 'Gonzales', 'Juli@gmail.com', '5678', 3, 1),
(5, 'David', 'Calderon', 'david890@gmail.com\r\n', '6754', 0, 3),
(22, 'Lucia ', 'Lopez', 'Lucialopez@gmail.com', 'Lucia12345', 6, 1),
(24, 'Sofia', 'Chavez', 'Sofia@gmail.com', 'Sofia10987', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `Id_videos` int(11) NOT NULL,
  `Nombre_vid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`Id_videos`, `Nombre_vid`) VALUES
(1, 'Algoritmo Dijkstra.gif'),
(2, 'gif2.gif'),
(3, 'gif.gif');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`Id_barrio`);

--
-- Indices de la tabla `codigos_secretario`
--
ALTER TABLE `codigos_secretario`
  ADD PRIMARY KEY (`Id_codigo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`Id_comentario`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`Id_estado`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`Id_imagenes`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`Id_notificacion`);

--
-- Indices de la tabla `ordenes_mantenimiento`
--
ALTER TABLE `ordenes_mantenimiento`
  ADD PRIMARY KEY (`Id_ordenes_mantenimiento`);

--
-- Indices de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  ADD PRIMARY KEY (`Id_prioridades`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`Id_reportes`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_rol`);

--
-- Indices de la tabla `tipos_danos`
--
ALTER TABLE `tipos_danos`
  ADD PRIMARY KEY (`Id_tipos_danos`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`Id_ubicacion`);

--
-- Indices de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`Id_Unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`Id_videos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `Id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `codigos_secretario`
--
ALTER TABLE `codigos_secretario`
  MODIFY `Id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `Id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `Id_imagenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `Id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ordenes_mantenimiento`
--
ALTER TABLE `ordenes_mantenimiento`
  MODIFY `Id_ordenes_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  MODIFY `Id_prioridades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `Id_reportes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_danos`
--
ALTER TABLE `tipos_danos`
  MODIFY `Id_tipos_danos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `Id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `Id_Unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `Id_videos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`Id_rol`) REFERENCES `usuarios` (`Id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
