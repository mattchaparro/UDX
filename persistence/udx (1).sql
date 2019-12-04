-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2019 a las 03:10:20
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `udx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
  `idAdministrator` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`idAdministrator`, `name`, `lastName`, `email`, `password`, `picture`, `phone`, `mobile`, `state`) VALUES
(1, 'administrator', 'administrator', 'admin@udistrital.edu.co', '25d55ad283aa400af464c76d713c07ad', NULL, '123', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idAsignatura` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idAsignatura`, `nombre`) VALUES
(2, 'Ecuaciones Diferenciales'),
(5, 'Calculo Diferencial'),
(6, 'Calculo Integral'),
(7, 'Calculo Multivariado'),
(8, 'Proyecto de Grado Tecnológico'),
(9, 'Aplicaciones para Internet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturaprograma`
--

CREATE TABLE `asignaturaprograma` (
  `idAsignaturaPrograma` int(11) NOT NULL,
  `programaAcademico_idProgramaAcademico` int(11) NOT NULL,
  `asignatura_idAsignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causal`
--

CREATE TABLE `causal` (
  `idCausal` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `token` varchar(45) DEFAULT NULL,
  `state` tinyint(4) NOT NULL,
  `programaAcademico_idProgramaAcademico` int(11) NOT NULL,
  `rango_idRango` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `codigo`, `nombre`, `apellido`, `correo`, `clave`, `fecha_registro`, `fecha_actualizacion`, `foto`, `telefono`, `puntaje`, `token`, `state`, `programaAcademico_idProgramaAcademico`, `rango_idRango`) VALUES
(11, '20171578102', 'Julian Mateo', 'Chaparro Flautero', 'jmchaparrof@correo.udistrital.edu.co', '25f9e794323b453885f5181f1b624d0b', '2019-11-05', '2019-11-19', 'imagenes/1573582871.jpg', '3195244852', 10, 'ba9a2c4fd381d767294655556a59e6c5', 1, 1, 1),
(12, '20171578018', 'William', 'Espitia', 'wjespitia@correo.udistrital.edu.co', '25d55ad283aa400af464c76d713c07ad', '2019-11-05', '2019-11-05', '', '', 10, 'ad4100daf5823d96176e3cf6ca2b0dfb', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `idEtiqueta` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`idEtiqueta`, `nombre`) VALUES
(1, 'programacion'),
(2, 'java'),
(3, 'android'),
(4, 'c++'),
(5, 'calculo'),
(6, 'intregales'),
(7, 'php'),
(8, 'phyton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `idFacultad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idFacultad`, `nombre`) VALUES
(1, 'Tecnológica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logadministrator`
--

CREATE TABLE `logadministrator` (
  `idLogAdministrator` int(11) NOT NULL,
  `action` varchar(45) NOT NULL,
  `information` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip` varchar(45) NOT NULL,
  `os` varchar(45) NOT NULL,
  `browser` varchar(45) NOT NULL,
  `administrator_idAdministrator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logadministrator`
--

INSERT INTO `logadministrator` (`idLogAdministrator`, `action`, `information`, `date`, `time`, `ip`, `os`, `browser`, `administrator_idAdministrator`) VALUES
(1, 'Log In', '', '2019-11-04', '13:34:58', '::1', 'WINNT', 'Chrome', 1),
(2, 'Log In', '', '2019-11-04', '13:46:49', '::1', 'WINNT', 'Chrome', 1),
(3, 'Create Facultad', 'Nombre: Tecnológica', '2019-11-04', '13:49:15', '::1', 'WINNT', 'Chrome', 1),
(4, 'Create Programa Academico', 'Nombre: Tecnología en Sistematización de Datos;; Facultad: Tecnológica', '2019-11-04', '13:49:43', '::1', 'WINNT', 'Chrome', 1),
(5, 'Log In', '', '2019-11-05', '10:42:56', '::1', 'WINNT', 'Chrome', 1),
(6, 'Log In', '', '2019-11-05', '14:35:56', '::1', 'WINNT', 'Chrome', 1),
(7, 'Log In', '', '2019-11-05', '16:58:41', '::1', 'WINNT', 'Chrome', 1),
(8, 'Log In', '', '2019-11-07', '10:20:39', '::1', 'WINNT', 'Chrome', 1),
(9, 'Log In', '', '2019-11-07', '10:23:46', '::1', 'WINNT', 'Chrome', 1),
(10, 'Log In', '', '2019-11-07', '10:46:30', '::1', 'WINNT', 'Chrome', 1),
(11, 'Log In', '', '2019-11-09', '11:59:20', '::1', 'WINNT', 'Chrome', 1),
(12, 'Log In', '', '2019-11-12', '18:54:10', '::1', 'WINNT', 'Chrome', 1),
(13, 'Log In', '', '2019-11-12', '18:55:06', '::1', 'WINNT', 'Chrome', 1),
(14, 'Log In', '', '2019-11-12', '18:56:16', '::1', 'WINNT', 'Chrome', 1),
(15, 'Log In', '', '2019-11-13', '12:34:09', '::1', 'WINNT', 'Chrome', 1),
(16, 'Log In', '', '2019-11-19', '19:32:54', '::1', 'WINNT', 'Chrome', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logestudiante`
--

CREATE TABLE `logestudiante` (
  `idLogEstudiante` int(11) NOT NULL,
  `action` varchar(45) NOT NULL,
  `information` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip` varchar(45) NOT NULL,
  `os` varchar(45) NOT NULL,
  `browser` varchar(45) NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logestudiante`
--

INSERT INTO `logestudiante` (`idLogEstudiante`, `action`, `information`, `date`, `time`, `ip`, `os`, `browser`, `estudiante_idEstudiante`) VALUES
(4, 'Log In', '', '2019-11-05', '10:45:58', '::1', 'WINNT', 'Chrome', 11),
(5, 'Log In', '', '2019-11-05', '11:01:33', '::1', 'WINNT', 'Chrome', 11),
(6, 'Log In', '', '2019-11-05', '11:09:05', '::1', 'WINNT', 'Chrome', 11),
(7, 'Log In', '', '2019-11-05', '13:43:36', '::1', 'WINNT', 'Chrome', 11),
(8, 'Log In', '', '2019-11-05', '14:16:53', '::1', 'WINNT', 'Chrome', 11),
(9, 'Log In', '', '2019-11-05', '14:19:53', '::1', 'WINNT', 'Chrome', 11),
(10, 'Log In', '', '2019-11-05', '14:28:55', '::1', 'WINNT', 'Chrome', 11),
(11, 'Log In', '', '2019-11-05', '14:33:05', '::1', 'WINNT', 'Chrome', 11),
(12, 'Log In', '', '2019-11-05', '16:08:52', '::1', 'WINNT', 'Chrome', 11),
(13, 'Log In', '', '2019-11-05', '16:25:49', '::1', 'WINNT', 'Chrome', 11),
(14, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:32:38', '::1', 'WINNT', 'Chrome', 11),
(15, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:33:01', '::1', 'WINNT', 'Chrome', 11),
(16, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:35:21', '::1', 'WINNT', 'Chrome', 11),
(17, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:37:15', '::1', 'WINNT', 'Chrome', 11),
(18, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:37:20', '::1', 'WINNT', 'Chrome', 11),
(19, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:38:10', '::1', 'WINNT', 'Chrome', 11),
(20, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:38:32', '::1', 'WINNT', 'Chrome', 11),
(21, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:38:42', '::1', 'WINNT', 'Chrome', 11),
(22, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:40:22', '::1', 'WINNT', 'Chrome', 11),
(23, 'Edit Profile Estudiante', 'Codigo: 20171578102;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: jmchaparrof@correo.udistrital.edu.co;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: 10;; Token: ba9a2c4fd381d767294655556a59e6c5;; State: 1;; Programa Academico: Tecnología en Sistematización de Datos;; Rango: Principiante', '2019-11-05', '16:40:36', '::1', 'WINNT', 'Chrome', 11),
(24, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '16:56:23', '::1', 'WINNT', 'Chrome', 11),
(25, 'Log In', '', '2019-11-05', '17:08:15', '::1', 'WINNT', 'Chrome', 11),
(26, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '17:08:33', '::1', 'WINNT', 'Chrome', 11),
(27, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '17:09:17', '::1', 'WINNT', 'Chrome', 11),
(28, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '17:12:39', '::1', 'WINNT', 'Chrome', 11),
(29, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '17:12:45', '::1', 'WINNT', 'Chrome', 11),
(30, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '17:12:50', '::1', 'WINNT', 'Chrome', 11),
(31, 'Edit Profile Estudiante', 'Codigo: ;; Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Correo: ;; Fecha_registro: 2019-11-05;; Fecha_actualizacion: 2019-11-05;; Telefono: 3195244852;; Puntaje: ;; Token: ;; State: ;; Programa Academico: ;; Rango: ', '2019-11-05', '17:12:57', '::1', 'WINNT', 'Chrome', 11),
(32, 'Log In', '', '2019-11-05', '20:24:44', '::1', 'WINNT', 'Chrome', 11),
(33, 'Change Password Estudiante', '', '2019-11-05', '20:33:12', '::1', 'WINNT', 'Chrome', 11),
(34, 'Log In', '', '2019-11-05', '20:33:20', '::1', 'WINNT', 'Chrome', 11),
(35, 'Log In', '', '2019-11-05', '20:36:07', '::1', 'WINNT', 'Chrome', 11),
(36, 'Log In', '', '2019-11-07', '10:50:38', '::1', 'WINNT', 'Chrome', 11),
(37, 'Log In', '', '2019-11-07', '20:21:21', '::1', 'WINNT', 'Chrome', 11),
(38, 'Log In', '', '2019-11-09', '09:30:59', '::1', 'WINNT', 'Chrome', 11),
(39, 'Log In', '', '2019-11-09', '10:13:20', '::1', 'WINNT', 'Chrome', 11),
(40, 'Log In', '', '2019-11-09', '11:55:24', '::1', 'WINNT', 'Chrome', 11),
(41, 'Log In', '', '2019-11-09', '11:59:57', '::1', 'WINNT', 'Chrome', 11),
(42, 'Log In', '', '2019-11-09', '12:38:03', '::1', 'WINNT', 'Chrome', 11),
(43, 'Log In', '', '2019-11-09', '13:24:17', '::1', 'WINNT', 'Chrome', 11),
(44, 'Log In', '', '2019-11-09', '15:12:32', '::1', 'WINNT', 'Chrome', 11),
(45, 'Log In', '', '2019-11-09', '15:21:17', '::1', 'WINNT', 'Chrome', 11),
(46, 'Log In', '', '2019-11-09', '15:38:33', '::1', 'WINNT', 'Chrome', 11),
(47, 'Log In', '', '2019-11-09', '16:07:44', '::1', 'WINNT', 'Chrome', 11),
(48, 'Log In', '', '2019-11-09', '16:39:09', '::1', 'WINNT', 'Chrome', 11),
(49, 'Log In', '', '2019-11-09', '16:47:09', '::1', 'WINNT', 'Chrome', 11),
(50, 'Log In', '', '2019-11-09', '16:51:12', '::1', 'WINNT', 'Chrome', 11),
(51, 'Log In', '', '2019-11-09', '16:52:15', '::1', 'WINNT', 'Chrome', 11),
(52, 'Log In', '', '2019-11-09', '17:27:11', '::1', 'WINNT', 'Chrome', 11),
(53, 'Log In', '', '2019-11-09', '17:28:08', '::1', 'WINNT', 'Chrome', 11),
(54, 'Log In', '', '2019-11-10', '08:50:33', '::1', 'WINNT', 'Chrome', 11),
(55, 'Edit Profile Estudiante', 'Nombre: Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:15:11', '::1', 'WINNT', 'Chrome', 11),
(56, 'Edit Profile Estudiante', 'Nombre: Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:15:42', '::1', 'WINNT', 'Chrome', 11),
(57, 'Edit Profile Estudiante', 'Nombre: Julián Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:17:42', '::1', 'WINNT', 'Chrome', 11),
(58, 'Edit Profile Estudiante', 'Nombre: Julián Mateo Alo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:18:19', '::1', 'WINNT', 'Chrome', 11),
(59, 'Edit Profile Estudiante', 'Nombre: Julián Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:19:08', '::1', 'WINNT', 'Chrome', 11),
(60, 'Edit Profile Estudiante', 'Nombre: Julián Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:19:11', '::1', 'WINNT', 'Chrome', 11),
(61, 'Edit Profile Estudiante', 'Nombre: Julián Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-11', '15:19:22', '::1', 'WINNT', 'Chrome', 11),
(62, 'Log In', '', '2019-11-11', '18:25:27', '::1', 'WINNT', 'Chrome', 11),
(63, 'Log In', '', '2019-11-11', '18:45:11', '::1', 'WINNT', 'Chrome', 11),
(64, 'Edit Profile Estudiante', 'Nombre: Julián Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-12', '13:21:11', '::1', 'WINNT', 'Chrome', 11),
(65, 'Log In', '', '2019-11-12', '18:19:57', '::1', 'WINNT', 'Chrome', 11),
(66, 'Log In', '', '2019-11-12', '18:50:56', '::1', 'WINNT', 'Chrome', 11),
(67, 'Log In', '', '2019-11-12', '18:52:55', '::1', 'WINNT', 'Chrome', 11),
(68, 'Log In', '', '2019-11-12', '18:53:49', '::1', 'WINNT', 'Chrome', 11),
(69, 'Log In', '', '2019-11-12', '18:54:56', '::1', 'WINNT', 'Chrome', 11),
(70, 'Log In', '', '2019-11-12', '19:00:59', '::1', 'WINNT', 'Chrome', 11),
(71, 'Log In', '', '2019-11-12', '20:44:19', '::1', 'WINNT', 'Chrome', 11),
(72, 'Log In', '', '2019-11-12', '21:08:30', '::1', 'WINNT', 'Chrome', 11),
(73, 'Log In', '', '2019-11-12', '21:18:16', '::1', 'WINNT', 'Chrome', 11),
(74, 'Log In', '', '2019-11-13', '10:55:39', '::1', 'WINNT', 'Chrome', 11),
(75, 'Log In', '', '2019-11-13', '11:04:01', '::1', 'WINNT', 'Chrome', 11),
(76, 'Log In', '', '2019-11-13', '12:33:20', '::1', 'WINNT', 'Chrome', 11),
(77, 'Log In', '', '2019-11-13', '12:34:25', '::1', 'WINNT', 'Chrome', 11),
(78, 'Log In', '', '2019-11-19', '09:56:58', '::1', 'WINNT', 'Chrome', 11),
(79, 'Log In', '', '2019-11-19', '10:07:45', '::1', 'WINNT', 'Chrome', 11),
(80, 'Log In', '', '2019-11-19', '15:51:17', '::1', 'WINNT', 'Chrome', 11),
(81, 'Edit Profile Estudiante', 'Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-19', '16:09:34', '::1', 'WINNT', 'Chrome', 11),
(82, 'Edit Profile Estudiante', 'Nombre: Julian Mateo;; Apellido: Chaparro Flautero;; Telefono: 3195244852', '2019-11-19', '16:09:38', '::1', 'WINNT', 'Chrome', 11),
(83, 'Log In', '', '2019-11-19', '19:06:46', '::1', 'WINNT', 'Chrome', 11),
(84, 'Log In', '', '2019-11-20', '08:38:49', '::1', 'WINNT', 'Chrome', 11);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `preguntas`
--
CREATE TABLE `preguntas` (
`idPublicacion` int(11)
,`titulo` varchar(120)
,`descripcion` text
,`anexo` varchar(45)
,`fecha` date
,`votoPositivo` int(11)
,`votoNegativo` int(11)
,`idRespuesta` int(11)
,`estudiante_idEstudiante` int(11)
,`asignatura_idAsignatura` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaacademico`
--

CREATE TABLE `programaacademico` (
  `idProgramaAcademico` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `facultad_idFacultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programaacademico`
--

INSERT INTO `programaacademico` (`idProgramaAcademico`, `nombre`, `facultad_idFacultad`) VALUES
(1, 'Tecnología en Sistematización de Datos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `idPublicacion` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descripcion` text NOT NULL,
  `anexo` varchar(45) DEFAULT NULL,
  `fecha` date NOT NULL,
  `votoPositivo` int(11) DEFAULT NULL,
  `votoNegativo` int(11) DEFAULT NULL,
  `idRespuesta` int(11) DEFAULT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  `asignatura_idAsignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`idPublicacion`, `titulo`, `descripcion`, `anexo`, `fecha`, `votoPositivo`, `votoNegativo`, `idRespuesta`, `estudiante_idEstudiante`, `asignatura_idAsignatura`) VALUES
(11, '¿Cómo crear un CRUD en MySQL con PHP?', '<p>Tengo un proyecto de bases de datos donde necesito crear un aplicativo que me permita realizar insercion, modificacion, eliminación y consulta de datos sobre una empresa</p>', 'imagenes/1573584142.jpg', '2019-11-11', 12, 3, 0, 11, 5),
(14, '¿Cómo resolver una ecuacion diferencial de segundo orden?', '<p>Necesito resolver una ecuacion diferencial de segundo orden por el metodo de variacion de parametros.&nbsp;</p>', '', '2019-11-11', 0, 0, 0, 11, 2),
(16, '¿Cómo resolver una integral por partes?', '<p>Necesito resolver la siguiente integral por el metodo de integración por partes.&nbsp;</p><p><br></p>', 'imagenes/1573584142.jpg', '2019-11-12', 0, 0, 0, 11, 7),
(17, '¿Cómo resolver una derivada parcial?', 'Necesito resolver una derivada parcial pero no entiendo bien cual es la diferencia que existe entre una derivada normal y esste tipo de derivadas. Adjunto el ejercicio.', 'imagenes/1573585059.png', '2019-11-12', 0, 0, 0, 11, 6),
(18, '¿Como diseñar una pagina web?', '<p>Deseo saber que aplicaciones me recomiendan para el maquetado de una pagina web</p>', 'imagenes/1573611766.png', '2019-11-12', 0, 0, 0, 11, 2),
(19, '¿Cómo generar una conexión a un dispositivo biométrico desde PHP?', '<p>Debo realizar una conexión e implementación de un sensor DigitalPersona 4500 con PHP&nbsp;</p>', '', '2019-11-13', 0, 0, 0, 11, 8),
(20, 'Prueba de pregunta', '<p>asdfgdfkgjdlgkaass</p>', '', '2019-11-13', 0, 0, 0, 11, 9),
(21, '¿Qué es una ecuacion diferencial?', 'Deseo saber qué es una ecuación diferencial', 'imagenes/1574191122.jpg', '2019-11-19', 0, 0, 0, 11, 5),
(22, '¿Prueba de etiquetas?', '<p>Debe seleccionar al menos una etiqueta</p>', '', '2019-11-19', 0, 0, 0, 11, 5),
(23, '', 'Para crear un CRUD se necesita tener conocimientos en:\r\nlkaaS\r\nASDA\r\nSDA\r\nSD\r\nASD\r\nASD', '', '2019-11-19', 0, 0, 11, 11, 5),
(24, '¿Como usar un Propover?', '<p>Estuve leyendo y encontré una funcionalidad que me permite hacer uso de propovers&nbsp;</p>', '', '2019-11-19', 0, 0, 0, 11, 6),
(25, 'Intento de validaciones', '<p>Jajajajaajxddddd</p>', '', '2019-11-20', 0, 0, 0, 11, 8),
(26, '', 'Prueba de respueta jeje xd', '', '2019-11-20', 0, 0, 20, 11, 9),
(27, '', 'Como hacer una consulta bien en 5 minutos por Miguel Molina', '', '2019-11-20', 0, 0, 25, 11, 8),
(28, 'Lista de tareas pendientes', '<p>1.&nbsp; Crear tabla en la BD&nbsp;<b>VotosEstudiante </b>donde exista el <b>ID Estudiante&nbsp;</b>&nbsp;y <b>ID Publicación.&nbsp;&nbsp;</b><br>2. Crear la clase y el DAO<br>3. Permitir que vote<br>4. Arreglar anexos (modificar condicionales)&nbsp;<br>5. Poner miniatura de las imagenes para que se desplieguen en un modal cuando se hace clic.<br>6. Poner foto miniatura del perfil al lado del nombre.<br>7. <b>Validaciones </b>(Responder pregunta, crear etiqueta)<br>8. Modificar el botón de notificaciones<br>9. Arreglar "<b>Mi Perfil" </b>para que la imagen ocupe col-12 y quitar los bordes.<br>10. Mostrar la asignatura en la publicacion.<br>11. Arreglar el formulario de contacto del home<br>12. Poner al profe de ultimas.<br>13. Colocar el nombre completo de la universidad donde se mencione<br>14. Colocar las fotos de nosotros.<br>15. <b>IMPORTANTE </b>Paginación.<br>16. Realizar el div de <b>mis preguntas y mi respuestas<br></b>17. Crear el acceso a <b>Crear Etiqueta</b><br>18. Poner un popover para cuando la asignatura no esté sugerir que envien un correo.<br>19. Poner un popover para indicar como realizar la pregunta.<br>20. Verificar el correo de contacto no se esta enviando.<br>21. <b>Filtar preguntas </b>por asignatura<br>22. Llorar.<br><br></p>', '', '2019-11-20', 0, 0, 0, 11, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacionetiqueta`
--

CREATE TABLE `publicacionetiqueta` (
  `idPublicacionEtiqueta` int(11) NOT NULL,
  `publicacion_idPublicacion` int(11) NOT NULL,
  `etiqueta_idEtiqueta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacionetiqueta`
--

INSERT INTO `publicacionetiqueta` (`idPublicacionEtiqueta`, `publicacion_idPublicacion`, `etiqueta_idEtiqueta`) VALUES
(10, 11, 1),
(11, 11, 2),
(14, 14, 4),
(15, 14, 1),
(18, 16, 5),
(19, 16, 6),
(20, 17, 5),
(21, 18, 1),
(22, 19, 1),
(23, 20, 1),
(24, 20, 2),
(25, 20, 2),
(26, 21, 2),
(27, 22, 1),
(28, 24, 1),
(29, 25, 7),
(30, 25, 1),
(31, 25, 2),
(32, 25, 4),
(33, 25, 5),
(34, 28, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango`
--

CREATE TABLE `rango` (
  `idRango` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `valorMinimo` int(11) NOT NULL,
  `valorMaximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rango`
--

INSERT INTO `rango` (`idRango`, `nombre`, `descripcion`, `valorMinimo`, `valorMaximo`) VALUES
(1, 'Principiante', 'Estás iniciando tu camino. Puedes ser mejor.', 10, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportepublicacion`
--

CREATE TABLE `reportepublicacion` (
  `idReportePublicacion` int(11) NOT NULL,
  `fechaReporte` varchar(45) NOT NULL,
  `estudiante_idEstudiante` int(11) NOT NULL,
  `publicacion_idPublicacion` int(11) NOT NULL,
  `causal_idCausal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `respuestas`
--
CREATE TABLE `respuestas` (
`idPublicacion` int(11)
,`titulo` varchar(120)
,`descripcion` text
,`anexo` varchar(45)
,`fecha` date
,`votoPositivo` int(11)
,`votoNegativo` int(11)
,`idRespuesta` int(11)
,`estudiante_idEstudiante` int(11)
,`asignatura_idAsignatura` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `preguntas`
--
DROP TABLE IF EXISTS `preguntas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preguntas`  AS  select `publicacion`.`idPublicacion` AS `idPublicacion`,`publicacion`.`titulo` AS `titulo`,`publicacion`.`descripcion` AS `descripcion`,`publicacion`.`anexo` AS `anexo`,`publicacion`.`fecha` AS `fecha`,`publicacion`.`votoPositivo` AS `votoPositivo`,`publicacion`.`votoNegativo` AS `votoNegativo`,`publicacion`.`idRespuesta` AS `idRespuesta`,`publicacion`.`estudiante_idEstudiante` AS `estudiante_idEstudiante`,`publicacion`.`asignatura_idAsignatura` AS `asignatura_idAsignatura` from `publicacion` where (`publicacion`.`idRespuesta` = 0) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `respuestas`
--
DROP TABLE IF EXISTS `respuestas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `respuestas`  AS  select `publicacion`.`idPublicacion` AS `idPublicacion`,`publicacion`.`titulo` AS `titulo`,`publicacion`.`descripcion` AS `descripcion`,`publicacion`.`anexo` AS `anexo`,`publicacion`.`fecha` AS `fecha`,`publicacion`.`votoPositivo` AS `votoPositivo`,`publicacion`.`votoNegativo` AS `votoNegativo`,`publicacion`.`idRespuesta` AS `idRespuesta`,`publicacion`.`estudiante_idEstudiante` AS `estudiante_idEstudiante`,`publicacion`.`asignatura_idAsignatura` AS `asignatura_idAsignatura` from `publicacion` where (`publicacion`.`idRespuesta` <> 0) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdministrator`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idAsignatura`);

--
-- Indices de la tabla `asignaturaprograma`
--
ALTER TABLE `asignaturaprograma`
  ADD PRIMARY KEY (`idAsignaturaPrograma`),
  ADD KEY `programaAcademico_idProgramaAcademico` (`programaAcademico_idProgramaAcademico`),
  ADD KEY `asignatura_idAsignatura` (`asignatura_idAsignatura`);

--
-- Indices de la tabla `causal`
--
ALTER TABLE `causal`
  ADD PRIMARY KEY (`idCausal`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `programaAcademico_idProgramaAcademico` (`programaAcademico_idProgramaAcademico`),
  ADD KEY `rango_idRango` (`rango_idRango`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`idEtiqueta`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`idFacultad`);

--
-- Indices de la tabla `logadministrator`
--
ALTER TABLE `logadministrator`
  ADD PRIMARY KEY (`idLogAdministrator`),
  ADD KEY `administrator_idAdministrator` (`administrator_idAdministrator`);

--
-- Indices de la tabla `logestudiante`
--
ALTER TABLE `logestudiante`
  ADD PRIMARY KEY (`idLogEstudiante`),
  ADD KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`);

--
-- Indices de la tabla `programaacademico`
--
ALTER TABLE `programaacademico`
  ADD PRIMARY KEY (`idProgramaAcademico`),
  ADD KEY `facultad_idFacultad` (`facultad_idFacultad`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`idPublicacion`),
  ADD KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  ADD KEY `asignatura_idAsignatura` (`asignatura_idAsignatura`);

--
-- Indices de la tabla `publicacionetiqueta`
--
ALTER TABLE `publicacionetiqueta`
  ADD PRIMARY KEY (`idPublicacionEtiqueta`),
  ADD KEY `publicacion_idPublicacion` (`publicacion_idPublicacion`),
  ADD KEY `etiqueta_idEtiqueta` (`etiqueta_idEtiqueta`);

--
-- Indices de la tabla `rango`
--
ALTER TABLE `rango`
  ADD PRIMARY KEY (`idRango`);

--
-- Indices de la tabla `reportepublicacion`
--
ALTER TABLE `reportepublicacion`
  ADD PRIMARY KEY (`idReportePublicacion`),
  ADD KEY `estudiante_idEstudiante` (`estudiante_idEstudiante`),
  ADD KEY `publicacion_idPublicacion` (`publicacion_idPublicacion`),
  ADD KEY `causal_idCausal` (`causal_idCausal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrator`
--
ALTER TABLE `administrator`
  MODIFY `idAdministrator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `asignaturaprograma`
--
ALTER TABLE `asignaturaprograma`
  MODIFY `idAsignaturaPrograma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `causal`
--
ALTER TABLE `causal`
  MODIFY `idCausal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `idEtiqueta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `idFacultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `logadministrator`
--
ALTER TABLE `logadministrator`
  MODIFY `idLogAdministrator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `logestudiante`
--
ALTER TABLE `logestudiante`
  MODIFY `idLogEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `programaacademico`
--
ALTER TABLE `programaacademico`
  MODIFY `idProgramaAcademico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `idPublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `publicacionetiqueta`
--
ALTER TABLE `publicacionetiqueta`
  MODIFY `idPublicacionEtiqueta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `rango`
--
ALTER TABLE `rango`
  MODIFY `idRango` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reportepublicacion`
--
ALTER TABLE `reportepublicacion`
  MODIFY `idReportePublicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaturaprograma`
--
ALTER TABLE `asignaturaprograma`
  ADD CONSTRAINT `asignaturaprograma_ibfk_1` FOREIGN KEY (`programaAcademico_idProgramaAcademico`) REFERENCES `programaacademico` (`idProgramaAcademico`),
  ADD CONSTRAINT `asignaturaprograma_ibfk_2` FOREIGN KEY (`asignatura_idAsignatura`) REFERENCES `asignatura` (`idAsignatura`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`programaAcademico_idProgramaAcademico`) REFERENCES `programaacademico` (`idProgramaAcademico`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`rango_idRango`) REFERENCES `rango` (`idRango`);

--
-- Filtros para la tabla `logadministrator`
--
ALTER TABLE `logadministrator`
  ADD CONSTRAINT `logadministrator_ibfk_1` FOREIGN KEY (`administrator_idAdministrator`) REFERENCES `administrator` (`idAdministrator`);

--
-- Filtros para la tabla `logestudiante`
--
ALTER TABLE `logestudiante`
  ADD CONSTRAINT `logestudiante_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `programaacademico`
--
ALTER TABLE `programaacademico`
  ADD CONSTRAINT `programaacademico_ibfk_1` FOREIGN KEY (`facultad_idFacultad`) REFERENCES `facultad` (`idFacultad`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`asignatura_idAsignatura`) REFERENCES `asignatura` (`idAsignatura`);

--
-- Filtros para la tabla `publicacionetiqueta`
--
ALTER TABLE `publicacionetiqueta`
  ADD CONSTRAINT `publicacionetiqueta_ibfk_1` FOREIGN KEY (`publicacion_idPublicacion`) REFERENCES `publicacion` (`idPublicacion`),
  ADD CONSTRAINT `publicacionetiqueta_ibfk_2` FOREIGN KEY (`etiqueta_idEtiqueta`) REFERENCES `etiqueta` (`idEtiqueta`);

--
-- Filtros para la tabla `reportepublicacion`
--
ALTER TABLE `reportepublicacion`
  ADD CONSTRAINT `reportepublicacion_ibfk_1` FOREIGN KEY (`estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `reportepublicacion_ibfk_2` FOREIGN KEY (`publicacion_idPublicacion`) REFERENCES `publicacion` (`idPublicacion`),
  ADD CONSTRAINT `reportepublicacion_ibfk_3` FOREIGN KEY (`causal_idCausal`) REFERENCES `causal` (`idCausal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
