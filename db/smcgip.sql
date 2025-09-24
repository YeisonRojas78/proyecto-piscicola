-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2025 a las 16:40:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smcgip`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `id_alerta` int(11) NOT NULL,
  `estanques_id` int(11) UNSIGNED NOT NULL,
  `parametros_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_alerta` varchar(30) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alertas`
--

INSERT INTO `alertas` (`id_alerta`, `estanques_id`, `parametros_id`, `fecha`, `tipo_alerta`, `descripcion`, `estado`) VALUES
(1, 14, 1, '2025-07-01 16:33:59', 'temperatura alta', 'la temperatura del estanque esta demasiado alta ', 'activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentaciones`
--

CREATE TABLE `alimentaciones` (
  `id_alimento` int(11) NOT NULL,
  `peces_id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `tipo_alimento` varchar(30) NOT NULL,
  `cantidad_alimento` varchar(20) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `createat` datetime DEFAULT NULL,
  `usercreate` varchar(45) DEFAULT NULL,
  `updateat` datetime DEFAULT NULL,
  `userupdate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentaciones`
--

INSERT INTO `alimentaciones` (`id_alimento`, `peces_id`, `fecha_hora`, `tipo_alimento`, `cantidad_alimento`, `observaciones`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 1, '2025-06-06 04:46:01', 'engorde', '10', 'los peces se encueentran en un peso ideal', '2025-06-06 04:46:01', '', '2025-06-06 04:46:01', ''),
(2, 1, '2025-06-12 22:47:00', 'engorde', '12', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 4, '2025-06-12 22:47:00', 'engorde', '12', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 1, '2025-06-06 22:48:00', 'engorde', '12', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 5, '2025-06-06 07:36:00', 'engorde', '13', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 4, '2025-06-06 07:37:00', 'pre-inicio', '85', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 2, '2025-06-06 07:39:00', 'pre-inicio', '78', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 1, '2025-06-06 07:40:00', 'engorde', '12', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 4, '2025-06-06 14:42:26', 'engorde', '10', 'los peces se encueentran en un peso ideal', '2025-06-06 14:42:26', '', '2025-06-06 14:42:26', ''),
(10, 1, '2025-06-06 07:43:00', 'engorde', '12', 'los peces se encueentran en un peso ideal', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(12, 11, '2025-06-13 09:24:00', 'engorde', '12', 'undefined', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(13, 13, '2025-07-01 07:51:00', 'engorde', '15', 'undefined', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(14, 12, '2025-07-01 11:30:00', 'pre-inicio', '12', 'undefined', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 15, '2025-07-08 11:02:00', 'engorde', '12', 'undefined', '2025-07-08 11:02:20', '123', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crecimiento_peces`
--

CREATE TABLE `crecimiento_peces` (
  `id_crecimiento` int(11) NOT NULL,
  `peces_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `peso` float NOT NULL,
  `longitud` float NOT NULL,
  `observaciones` mediumtext NOT NULL,
  `createat` datetime NOT NULL,
  `usercreate` varchar(45) NOT NULL,
  `updateat` datetime NOT NULL,
  `userupdate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `crecimiento_peces`
--

INSERT INTO `crecimiento_peces` (`id_crecimiento`, `peces_id`, `fecha`, `peso`, `longitud`, `observaciones`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 1, '2025-06-06 06:19:30', 3.4, 30, 'los peces estan en un buen estado de salud', '2025-06-06 06:19:30', '', '2025-06-06 06:19:30', ''),
(3, 9, '2025-06-05 00:00:00', 2, 55, 'los peces se encuentran muy bien de peso y longitud', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 11, '2025-06-13 00:00:00', 2, 30, 'los peces estan en un buen estado de salud', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 11, '2025-06-13 09:24:00', 3, 45, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 13, '2025-07-01 07:33:00', 12, 25, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 15, '2025-07-08 11:01:00', 1.2, 28, '', '2025-07-08 11:01:50', '123', '0000-00-00 00:00:00', ''),
(10, 11, '2025-07-11 08:12:00', 12, 30, '', '2025-07-11 08:12:13', '123', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanques`
--

CREATE TABLE `estanques` (
  `id_estanque` int(11) UNSIGNED NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `createat` datetime DEFAULT NULL,
  `usercreate` varchar(45) DEFAULT NULL,
  `updateat` datetime DEFAULT NULL,
  `userupdate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estanques`
--

INSERT INTO `estanques` (`id_estanque`, `usuarios_id`, `nombre`, `ubicacion`, `capacidad`, `estado`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 5, 'estanque1', 'el zulia', 100, 'INACTIVO', '2025-05-13 14:23:39', '', '2025-05-13 14:23:39', ''),
(2, 9, 'estanque2', 'chinacota', 150, 'ACTIVO', '2025-05-19 15:24:59', '', '2025-05-19 15:24:59', ''),
(3, 1, 'estanque3', 'cucuta', 12, 'ACTIVO', '2025-05-20 17:41:06', '', '2025-05-20 17:41:06', ''),
(5, 1, 'estanque5', 'cucutilla', 100, 'ACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 1, 'estanque6', 'tibú', 180, 'ACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 2, 'estanque7', 'zulia', 120, 'ACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 1, 'estanque8', 'zulia', 52, 'INACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 1, 'estanque9', 'venezuela', 45, 'INACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(11, 3, 'estanque11', 'zulia', 120, 'INACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(12, 1, 'estanque12', 'zulia', 150, 'INACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(13, 4, 'estanque13', 'zulia', 500, 'ACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(14, 9, 'estanque 1', 'zulia', 200, 'ACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(16, 9, 'estanque 16', 'tibu', 150, 'ACTIVO', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(17, 4, 'estanque17', 'tibu', 120, 'ACTIVO', '2025-07-08 11:00:07', '123', '0000-00-00 00:00:00', ''),
(31, 5, 'estanque 173', 'dsd', 120, 'ACTIVO', '2025-07-11 08:43:25', '123', '2025-07-11 08:49:05', '123'),
(32, 5, 'estanque 173', 'dsd', 120, 'ACTIVO', '2025-07-11 08:44:58', '123', '2025-07-11 08:49:05', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_agua`
--

CREATE TABLE `parametros_agua` (
  `id_parametro` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `temperatura` decimal(4,2) DEFAULT NULL,
  `ph` decimal(4,2) DEFAULT NULL,
  `oxigeno` decimal(4,2) DEFAULT NULL,
  `sensor_temperatura` varchar(20) NOT NULL,
  `sensor_ph` varchar(20) NOT NULL,
  `sensor_oxigeno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parametros_agua`
--

INSERT INTO `parametros_agua` (`id_parametro`, `fecha`, `temperatura`, `ph`, `oxigeno`, `sensor_temperatura`, `sensor_ph`, `sensor_oxigeno`) VALUES
(1, '2025-05-13 14:30:25', 28.00, 7.10, 4.30, '456', '123', '321'),
(2, '2025-05-13 18:05:57', 32.00, 10.00, 0.50, '456', '123', '321'),
(3, '2025-05-19 15:28:45', 26.00, 5.00, 4.20, '741', '963', '852'),
(4, '2025-07-01 17:50:27', 28.00, 10.00, 4.30, '98987', '951846', '951847'),
(5, '0000-00-00 00:00:00', 12.00, 5.00, 3.00, '456', '123', '321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peces`
--

CREATE TABLE `peces` (
  `id_peces` int(11) NOT NULL,
  `estanques_id` int(11) UNSIGNED NOT NULL,
  `especie` varchar(50) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `peso_promedio` float NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `estado` varchar(20) NOT NULL,
  `createat` datetime NOT NULL,
  `usercreate` varchar(45) NOT NULL,
  `updateat` datetime NOT NULL,
  `userupdate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peces`
--

INSERT INTO `peces` (`id_peces`, `estanques_id`, `especie`, `cantidad`, `peso_promedio`, `fecha_ingreso`, `estado`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 1, 'ffhgdfb', '150', 1.2, '2025-05-21 18:19:28', 'cosecha', '2025-05-21 18:19:28', '', '2025-05-21 18:19:28', ''),
(2, 1, 'trucha', '120', 1.2, '2025-06-05 00:00:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 1, 'trucha', '120', 1.2, '2025-06-05 00:00:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 2, 'blanquillo', '230', 1.6, '2025-06-05 00:00:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 2, 'blanquillo', '230', 1.6, '2025-06-05 00:00:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 1, 'blanquillo', '2', 2, '2025-06-05 00:00:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 3, 'mojarra', '300', 0.9, '2025-06-05 15:43:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(11, 12, 'blanquillo', '300', 1.5, '2025-06-13 09:00:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(12, 14, 'trucha', '200', 1.5, '2025-07-01 06:56:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(13, 14, 'blanquillo', '200', 1, '2025-07-01 07:21:00', 'Crecimiento', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 17, 'trucha', '200', 0.8, '2025-07-08 11:01:00', 'Crecimiento', '2025-07-08 11:01:14', '123', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores`
--

CREATE TABLE `sensores` (
  `id_sensor` int(11) NOT NULL,
  `estanques_id` int(11) UNSIGNED NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `numero_serie` varchar(100) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'activo',
  `fecha_instalacion` datetime NOT NULL,
  `createat` datetime NOT NULL,
  `usercreate` varchar(45) NOT NULL,
  `updateat` datetime NOT NULL,
  `userupdate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sensores`
--

INSERT INTO `sensores` (`id_sensor`, `estanques_id`, `tipo`, `modelo`, `numero_serie`, `estado`, `fecha_instalacion`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 1, 'ph', 'modelo 1', '123', 'activo', '2025-05-13 14:26:59', '2025-05-13 14:26:59', '', '2025-05-13 14:26:59', ''),
(2, 1, 'oxigeno', 'modelo 2', '321', 'activo', '2025-05-13 14:26:59', '2025-05-13 14:26:59', '', '2025-05-13 14:26:59', ''),
(3, 1, 'temperatura', 'modelo 3', '456', 'activo', '2025-05-13 14:26:59', '2025-05-13 14:26:59', '', '2025-05-13 14:26:59', ''),
(4, 2, 'oxigeno', 'model3', '852', 'activo', '2025-05-19 15:26:05', '2025-05-19 15:26:05', '', '2025-05-19 15:26:05', ''),
(5, 2, 'temperatura ', 'model2', '741', 'activo', '2025-05-19 15:26:05', '2025-05-19 15:26:05', '', '2025-05-19 15:26:05', ''),
(6, 2, 'ph', 'model1', '963', 'activo', '2025-05-19 15:26:05', '2025-05-19 15:26:05', '', '2025-05-19 15:26:05', ''),
(7, 3, 'TEMPERATURA', '98987', '98987', 'ACTIVO', '2025-06-06 00:52:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 3, 'PH', '98986', '98986', 'ACTIVO', '2025-06-06 00:53:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 14, 'TEMPERATURA', '951623', '951623', 'ACTIVO', '2025-07-01 09:09:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(10, 14, 'PH', '951847', '951847', 'ACTIVO', '2025-07-01 09:09:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(11, 14, 'OXIGENO', '951846', '951846', 'ACTIVO', '2025-07-01 09:10:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 17, 'TEMPERATURA', '099897', '099897', 'ACTIVO', '2025-07-08 11:03:00', '2025-07-08 11:03:05', '123', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `createat` datetime NOT NULL,
  `usercreate` varchar(45) NOT NULL,
  `updateat` datetime NOT NULL,
  `userupdate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `nombre`, `correo`, `identificacion`, `usuario`, `contrasena`, `estado`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 1, 'yeison', 'yeison@gmail.com', 123456789, '123456789', '2RMRMkHw6v5twujMd9248OkechVa76mAUWRBG5OkbDmKyD6JqeTKe', 1, '2025-05-13 14:22:38', '', '2025-05-13 14:22:38', ''),
(2, 1, 'stick', 'stick@gmail.com', 1094044692, '1094044692', '2RMRMkHw6v5twujMd9248OkechVa76mAUWRBG5OkbDmKyD6JqeTKe', 1, '2025-05-19 15:23:40', '', '2025-05-19 15:23:40', ''),
(3, 2, 'juliette', 'juliette@gmail.com', 12345, '12345', '2RMRMkHw6v5twujMd9248OkechVa76mAUWRBG5OkbDmKyD6JqeTKe', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 2, 'sebastian conde', 'sebas@gmail.com', 1126904904, '1126904904', '2RMRMkHw6v5twujMd9248OkechVa76mAUWRBG5OkbDmKyD6JqeTKe', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 2, 'cesar bolado', 'cesar@gmail.com', 987654321, '987654321', '2RMRMkHw6v5twujMd9248OkechVa76mAUWRBG5OkbDmKyD6JqeTKe', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 2, 'joiner', 'joiner@gmail.com', 159263, '159263', '123', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(12, 1, 'marcela', 'marce@gmail.com', 741852, '741852', '$2y$10$.zdMBXrgM/FU0xgbRbmuMODQibWriDStrKxD4kcVpNjxv2RQYHmbO', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(14, 1, 'juliette', 'juliette1@gmail.com', 987654, '987654', '123', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 1, 'admin', 'admin@gmail.com', 123, '123', '$2y$10$2RMRMkHw6v5twujMd9248OkechVa76mAUWRBG5OkbDmKyD6JqeTKe', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(16, 2, 'Angel Jaimes', 'angel@gmail.com', 7654, '7654', '$2y$10$Fj9eNnWVT7qmjxmTcDi6Uu6Q.sRcA3hBwzs.macN7wj.th7RIZLD.', 1, '2025-07-08 11:04:34', '123', '0000-00-00 00:00:00', ''),
(17, 2, 'jose', 'jose@gmail.com', 15948, '15948', '$2y$10$3zyBi2av56KHACPKGeY7S.zRvW0T.Hve99mxEkjmkZtcoMAJmH2A2', 1, '2025-07-09 09:01:31', '123', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL DEFAULT 1,
  `peces_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad_peces` varchar(20) NOT NULL,
  `peso_venta` float NOT NULL,
  `precio_venta` float NOT NULL,
  `nombre_comprador` varchar(100) NOT NULL,
  `identificacion_comprador` int(11) NOT NULL,
  `createat` datetime NOT NULL,
  `usercreate` varchar(45) NOT NULL,
  `updateat` datetime NOT NULL,
  `userupdate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `usuarios_id`, `peces_id`, `fecha`, `cantidad_peces`, `peso_venta`, `precio_venta`, `nombre_comprador`, `identificacion_comprador`, `createat`, `usercreate`, `updateat`, `userupdate`) VALUES
(1, 1, 1, '2025-05-21 18:20:04', '23', 34, 54332, 'yeison daniel', 123456, '2025-05-21 18:20:04', '', '2025-05-21 18:20:04', ''),
(6, 1, 5, '0000-00-00 00:00:00', '45', 18, 10000, 'angel', 78451, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 1, 5, '0000-00-00 00:00:00', '78', 78, 70000, 'angel', 1090296880, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 1, 4, '0000-00-00 00:00:00', '45', 12, 12222, 'stick', 875421, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(10, 1, 8, '2025-06-09 07:06:00', '78', 78, 454545, 'angel', 78451, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(11, 1, 3, '2025-06-13 07:52:00', '12', 50, 120000, 'angel', 1090296880, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(13, 1, 3, '2025-06-17 10:28:00', '18', 18, 150000, 'marcela riaño', 1090296880, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(14, 1, 13, '2025-07-01 09:02:00', '25', 16, 100000, 'marcela riaño', 1090296880, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 1, 13, '2025-07-01 11:28:00', '14', 32, 140000, 'angel', 875421, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(17, 1, 3, '2025-07-08 10:29:00', '12', 12, 12, 'marcela riaño', 123, '2025-07-08 10:29:50', '123', '0000-00-00 00:00:00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `fk_alertas_estanques1_idx` (`estanques_id`),
  ADD KEY `fk_alertas_parametros_agua1_idx` (`parametros_id`);

--
-- Indices de la tabla `alimentaciones`
--
ALTER TABLE `alimentaciones`
  ADD PRIMARY KEY (`id_alimento`),
  ADD KEY `fk_alimentaciones_peces1_idx` (`peces_id`);

--
-- Indices de la tabla `crecimiento_peces`
--
ALTER TABLE `crecimiento_peces`
  ADD PRIMARY KEY (`id_crecimiento`),
  ADD KEY `fk_crecimiento_peces_idx` (`peces_id`);

--
-- Indices de la tabla `estanques`
--
ALTER TABLE `estanques`
  ADD PRIMARY KEY (`id_estanque`),
  ADD KEY `fk_estanques_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `parametros_agua`
--
ALTER TABLE `parametros_agua`
  ADD PRIMARY KEY (`id_parametro`),
  ADD KEY `sensor_temperatura` (`sensor_temperatura`),
  ADD KEY `sensor_ph` (`sensor_ph`),
  ADD KEY `sensor_oxigeno` (`sensor_oxigeno`);

--
-- Indices de la tabla `peces`
--
ALTER TABLE `peces`
  ADD PRIMARY KEY (`id_peces`),
  ADD KEY `fk_peces_estanques1_idx` (`estanques_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD PRIMARY KEY (`id_sensor`),
  ADD UNIQUE KEY `numero_serie` (`numero_serie`),
  ADD KEY `fk_sensores_estanques1_idx` (`estanques_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_ventas_usuarios_idx` (`usuarios_id`),
  ADD KEY `fk_ventas_peces1_idx` (`peces_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id_alerta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alimentaciones`
--
ALTER TABLE `alimentaciones`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `crecimiento_peces`
--
ALTER TABLE `crecimiento_peces`
  MODIFY `id_crecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estanques`
--
ALTER TABLE `estanques`
  MODIFY `id_estanque` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `parametros_agua`
--
ALTER TABLE `parametros_agua`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `peces`
--
ALTER TABLE `peces`
  MODIFY `id_peces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `sensores`
--
ALTER TABLE `sensores`
  MODIFY `id_sensor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `fk_alertas_estanques1` FOREIGN KEY (`estanques_id`) REFERENCES `estanques` (`id_estanque`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alertas_parametros_agua1` FOREIGN KEY (`parametros_id`) REFERENCES `parametros_agua` (`id_parametro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alimentaciones`
--
ALTER TABLE `alimentaciones`
  ADD CONSTRAINT `fk_alimentaciones_peces1` FOREIGN KEY (`peces_id`) REFERENCES `peces` (`id_peces`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `crecimiento_peces`
--
ALTER TABLE `crecimiento_peces`
  ADD CONSTRAINT `fk_crecimiento_peces` FOREIGN KEY (`peces_id`) REFERENCES `peces` (`id_peces`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estanques`
--
ALTER TABLE `estanques`
  ADD CONSTRAINT `fk_estanques_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parametros_agua`
--
ALTER TABLE `parametros_agua`
  ADD CONSTRAINT `parametros_agua_ibfk_1` FOREIGN KEY (`sensor_temperatura`) REFERENCES `sensores` (`numero_serie`),
  ADD CONSTRAINT `parametros_agua_ibfk_2` FOREIGN KEY (`sensor_ph`) REFERENCES `sensores` (`numero_serie`),
  ADD CONSTRAINT `parametros_agua_ibfk_3` FOREIGN KEY (`sensor_oxigeno`) REFERENCES `sensores` (`numero_serie`);

--
-- Filtros para la tabla `peces`
--
ALTER TABLE `peces`
  ADD CONSTRAINT `fk_peces_estanques1` FOREIGN KEY (`estanques_id`) REFERENCES `estanques` (`id_estanque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD CONSTRAINT `fk_sensores_estanques1` FOREIGN KEY (`estanques_id`) REFERENCES `estanques` (`id_estanque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`cod_rol`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_peces1` FOREIGN KEY (`peces_id`) REFERENCES `peces` (`id_peces`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ventas_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
