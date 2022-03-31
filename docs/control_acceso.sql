-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 02:07:42
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_acceso`
--
CREATE DATABASE IF NOT EXISTS `control_acceso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `control_acceso`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_colonos`
--

CREATE TABLE IF NOT EXISTS `sca_colonos` (
  `id_colono` int(11) NOT NULL AUTO_INCREMENT,
  `nom_colono` varchar(200) NOT NULL,
  `ape_colono` varchar(200) NOT NULL,
  `sexo` int(11) NOT NULL,
  `activo_colono` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `fecha_eliminacion` datetime NOT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_colono`),
  KEY `id_direccion` (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_direcciones`
--

CREATE TABLE IF NOT EXISTS `sca_direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(500) NOT NULL,
  `inf_casa` varchar(2000) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `fecha_eliminacion` datetime NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_provedores`
--

CREATE TABLE IF NOT EXISTS `sca_provedores` (
  `id_registropr` int(11) NOT NULL,
  `fecha_pr` date NOT NULL,
  `nombre_pr` varchar(500) NOT NULL,
  `entrada_pr` time NOT NULL,
  `salida_pr` time DEFAULT NULL,
  `empresa_pr` varchar(200) NOT NULL,
  `motivo_pr` varchar(1000) NOT NULL,
  `id_colono` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  KEY `id_colono` (`id_colono`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_registrocolonos`
--

CREATE TABLE IF NOT EXISTS `sca_registrocolonos` (
  `id_registrocl` int(11) NOT NULL,
  `fecha_entradacl` date NOT NULL,
  `fecha_salidacl` date NOT NULL,
  `entrada_cl` time NOT NULL,
  `salida_cl` time NOT NULL,
  `id_colono` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  KEY `id_colono` (`id_colono`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_roles`
--

CREATE TABLE IF NOT EXISTS `sca_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del rol de usuario',
  `nom_rol` varchar(100) NOT NULL COMMENT 'Nombre del rol',
  `activo_rol` int(11) NOT NULL COMMENT 'Indica si el rol esta activo o no (1=Activo, 0=No Activo)',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sca_roles`
--

INSERT INTO `sca_roles` (`id_rol`, `nom_rol`, `activo_rol`) VALUES
(1, 'administrador', 1),
(2, 'seguridad', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_usuarios`
--

CREATE TABLE IF NOT EXISTS `sca_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario',
  `usuario` varchar(150) NOT NULL COMMENT 'Correo del usuario',
  `password` varchar(250) NOT NULL COMMENT 'Contraseña del usuario',
  `nom_usuario` varchar(250) NOT NULL COMMENT 'Nombre(s) del usuario',
  `ape_usuario` varchar(250) NOT NULL COMMENT 'Apellido(s) del usuario',
  `nacimiento_usuario` date NOT NULL COMMENT 'Fecha de nacimiento del usuario',
  `sexo` int(11) NOT NULL COMMENT 'Sexo del usuario (1=Masculino, 0=Femenino)',
  `id_rol` int(11) NOT NULL COMMENT 'Llave foranea de la tabla sca_roles',
  `activo_usuario` int(11) NOT NULL COMMENT 'Permitira saber si el usuario tiene una cuenta activa o no (1=Activo, 0=No activo)',
  `fecha_creacion` datetime DEFAULT NULL COMMENT 'Fecha en que se crea el usuario',
  `fecha_actualizacion` int(11) DEFAULT NULL COMMENT 'Fecha en que se actulizan los datos del usuario.',
  `fecha_eliminado` int(11) DEFAULT NULL COMMENT 'Fecha en que se elimina un usuario',
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sca_usuarios`
--

INSERT INTO `sca_usuarios` (`id_usuario`, `usuario`, `password`, `nom_usuario`, `ape_usuario`, `nacimiento_usuario`, `sexo`, `id_rol`, `activo_usuario`, `fecha_creacion`, `fecha_actualizacion`, `fecha_eliminado`) VALUES
(1, 'admin@gmail.com', '12345678', 'Luis', 'Buenrostro', '1999-09-04', 1, 1, 1, '2022-03-22 20:03:22', NULL, NULL),
(2, 'seguridad@gmail.com', '12345678', 'Fernando', 'Martinez', '1999-09-04', 1, 2, 1, '2022-03-22 20:03:22', NULL, NULL),
(5, 'fernando@gmail.com', '12345678', 'Luis Fernando', 'Buenrostro Martinez', '1999-09-04', 1, 1, 1, '2022-03-27 18:54:05', NULL, NULL),
(6, 'jaqui@gmail.com', '12345678', 'Jaqueline', 'Padron', '1999-09-04', 0, 2, 1, '2022-03-27 19:00:14', NULL, NULL),
(7, 'admin@gmail.com', 'cctv852456', 'Juanito', 'Banana', '2022-03-28', 1, 2, 1, '2022-03-28 09:05:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sca_visitantes`
--

CREATE TABLE IF NOT EXISTS `sca_visitantes` (
  `id_registrovs` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entradavs` date NOT NULL,
  `fecha_salidavs` date NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `id_colono` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_registrovs`),
  KEY `id_colono` (`id_colono`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sca_colonos`
--
ALTER TABLE `sca_colonos`
  ADD CONSTRAINT `sca_colonos_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `sca_direcciones` (`id_direccion`);

--
-- Filtros para la tabla `sca_provedores`
--
ALTER TABLE `sca_provedores`
  ADD CONSTRAINT `sca_provedores_ibfk_1` FOREIGN KEY (`id_colono`) REFERENCES `sca_colonos` (`id_colono`),
  ADD CONSTRAINT `sca_provedores_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `sca_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `sca_registrocolonos`
--
ALTER TABLE `sca_registrocolonos`
  ADD CONSTRAINT `sca_registrocolonos_ibfk_1` FOREIGN KEY (`id_colono`) REFERENCES `sca_colonos` (`id_colono`),
  ADD CONSTRAINT `sca_registrocolonos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `sca_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `sca_usuarios`
--
ALTER TABLE `sca_usuarios`
  ADD CONSTRAINT `sca_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `sca_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sca_visitantes`
--
ALTER TABLE `sca_visitantes`
  ADD CONSTRAINT `sca_visitantes_ibfk_1` FOREIGN KEY (`id_colono`) REFERENCES `sca_colonos` (`id_colono`),
  ADD CONSTRAINT `sca_visitantes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `sca_usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
