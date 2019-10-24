-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2019 a las 23:14:42
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_integrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria`
--

CREATE TABLE `asesoria` (
  `consecutivo` int(10) NOT NULL,
  `programa_cod_programa` varchar(10) NOT NULL,
  `semestre` varchar(10) NOT NULL,
  `proyecto` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id_asesor` varchar(10) DEFAULT NULL,
  `usuario_asesor_principal` varchar(10) NOT NULL,
  `grupo_cod_grupo` int(10) NOT NULL,
  `horaInicio` varchar(10) DEFAULT NULL,
  `horaFin` varchar(10) DEFAULT NULL,
  `objetivoAsesoria` varchar(255) DEFAULT NULL,
  `recomendaciones` varchar(255) DEFAULT NULL,
  `actividadesPendietes` varchar(255) DEFAULT NULL,
  `fecha_proxima_reunion` date DEFAULT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesoria`
--

INSERT INTO `asesoria` (`consecutivo`, `programa_cod_programa`, `semestre`, `proyecto`, `fecha`, `usuario_id_asesor`, `usuario_asesor_principal`, `grupo_cod_grupo`, `horaInicio`, `horaFin`, `objetivoAsesoria`, `recomendaciones`, `actividadesPendietes`, `fecha_proxima_reunion`, `estado`) VALUES
(1, '1', '5', 'Titulo', '2019-05-01', '2002', '1004', 1, '12:00', '01:00', 'hola', 'hola', 'hola', '2019-05-08', 'guardado'),
(2, '1', '5', 'Titulo', '2019-05-08', '1004', '1004', 1, '12:00', '01:00', '1', '2', '3', '2019-05-30', 'guardado'),
(7, '1', '5', 'Titulo', '2019-05-01', '1004', '1004', 1, '12:00', '01:00', 'easd', 'das', 'saweawe', '2019-05-08', 'guardado'),
(11, '1', '5', 'Titulo', '2019-05-10', '2002', '1004', 1, '12:00', '01:00', 'OBJETIVOS DE LA ASESORIA', 'RECOMENDACIONES', 'ACTIVIDADES PENDIENTE PRÓXIMA REUNIÓN', '2019-05-15', 'Aceptado'),
(14, '1', '5', 'Titulo', '2019-05-09', '1004', '1004', 1, '', '', '', 'asdasd', '', '0000-00-00', 'guardado'),
(15, '1', '5', 'Titulo', '2019-05-01', '1004', '1004', 1, '08:23', '15:45', 'sadsa', 'dasdas', '', '2019-05-08', 'guardado'),
(17, '1', '5', 'Titulo', '2019-05-01', '1004', '1004', 1, '12:00', '01:00', 'cano', 'cano', 'cano', '2019-05-08', 'Pendiente'),
(18, '1', '5', 'Titulo', '2019-05-01', '2002', '1004', 1, '12:00', '01:00', 'tania', 'tania', 'taniatania', '2019-05-08', 'guardado'),
(21, '1', '5', 'Titulo', '2019-05-01', '2002', '1004', 1, '12:00', '01:00', 'ensayo', 'sad', 'asdasd', '2019-05-17', 'Pendiente'),
(22, '1', '5', 'Titulo', '2019-05-01', '1004', '1004', 1, '12:00', '01:00', 'sad', 'sad', 'sad', '2019-05-08', 'guardado'),
(23, '1', '5', 'Titulo', '2019-05-15', '1004', '2002', 1, '08:23', '15:45', 'objetivos', 'recomendaciones', 'actividades', '2019-05-09', 'Pendiente'),
(24, '1', '5', 'Titulo', '2019-05-17', '2002', '2002', 1, '08:23', '15:45', 'prueba 2', 'prueba2', 'prueba 2', '2019-05-16', 'guardado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_entregas`
--

CREATE TABLE `calificacion_entregas` (
  `cod_cal` int(10) NOT NULL,
  `estudiante_cod_estudiante` varchar(15) NOT NULL,
  `docente_id_asesor` varchar(10) NOT NULL,
  `N_primerEntrega` decimal(2,1) DEFAULT NULL,
  `N_finalEntrega` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion_entregas`
--

INSERT INTO `calificacion_entregas` (`cod_cal`, `estudiante_cod_estudiante`, `docente_id_asesor`, `N_primerEntrega`, `N_finalEntrega`) VALUES
(9, '5001', '2002', '3.5', '4.1'),
(11, '5003', '2002', '2.8', '3.9'),
(12, '5002', '2002', '3.9', '3.5'),
(13, '5005', '2002', '3.5', '3.9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_sus`
--

CREATE TABLE `calificacion_sus` (
  `cod_cals` varchar(10) NOT NULL,
  `estudiante_cod_estudiante` varchar(15) NOT NULL,
  `staff_id_staff` varchar(10) NOT NULL,
  `id_jurado` varchar(10) NOT NULL,
  `N_sustentacion` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion_sus`
--

INSERT INTO `calificacion_sus` (`cod_cals`, `estudiante_cod_estudiante`, `staff_id_staff`, `id_jurado`, `N_sustentacion`) VALUES
('0', '0', '0', '0000', '0.0'),
('5001', '5001', '1', '1002', '3.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregafinal`
--

CREATE TABLE `entregafinal` (
  `id_entregaFin` varchar(10) NOT NULL,
  `archivoDocumento` varchar(100) NOT NULL,
  `usuario_id_asesor` varchar(10) NOT NULL,
  `grupo_cod_grupo` int(10) NOT NULL,
  `id_fecha_plazo` varchar(5) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregafinal`
--

INSERT INTO `entregafinal` (`id_entregaFin`, `archivoDocumento`, `usuario_id_asesor`, `grupo_cod_grupo`, `id_fecha_plazo`, `fecha_entrega`) VALUES
('1', 'src/segunda_entrega/hola2.pdf', '2002', 1, '00002', '2019-05-04'),
('3', 'src/segunda_entrega/hola1.pdf', '1004', 3, '00002', '2019-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID` varchar(15) NOT NULL,
  `primer_nombre` varchar(45) NOT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `primer_apellido` varchar(45) NOT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `sexo` int(1) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `semestre_cod_semestre` varchar(10) NOT NULL,
  `sede_cod_sede` varchar(10) NOT NULL,
  `programa_cod_programa` varchar(10) NOT NULL,
  `cod_grupo_semestre` varchar(10) NOT NULL,
  `jornada_cod_jornada` varchar(10) NOT NULL,
  `periodo_cod_periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `email`, `telefono`, `semestre_cod_semestre`, `sede_cod_sede`, `programa_cod_programa`, `cod_grupo_semestre`, `jornada_cod_jornada`, `periodo_cod_periodo`) VALUES
('0', 'sin asignar', 'sin asignar', '', NULL, 0, 'noborrar@gmail.com', '', '1', '1', '1', '1', '1', '2018-1'),
('5001', 'andres ', 'felipe', 'posada', 'españa', 1, 'danielcraft236@hotmail.com', '3238893442', '5', '2', '1', '5', '1', '2019-1'),
('5002', 'andres ', 'david', 'mutis', 'muños', 1, 'joonaathaan123@gmail.com', '3453423423', '5', '2', '1', '5', '1', '2019-1'),
('5003', 'diana', 'valentina', 'ordoñez', NULL, 2, 'valentina@gmail.com', '3323344344', '5', '2', '1', '5', '1', '2019-1'),
('5004', 'juan', 'pablo ', 'galeano', NULL, 1, 'galeano@gmail.com', '3234323434', '5', '2', '1', '5', '1', '2019-1'),
('5005', 'felipe', NULL, 'delgado', 'delgado', 1, 'delgado@gmail.com', '3435345332', '7', '2', '1', '4', '1', '2019-1'),
('5006', 'juan', 'david', 'uribe', NULL, 1, 'uribe@gmail.com', '3453234356', '4', '2', '1', '4', '1', '2019-1'),
('70900841', 'Alfred', 'Alfred', 'Johnson', 'Johnson', 0, 'jackdaniel23605@gmail.com', '3235291452', '4', '1', '1', '3', '1', '2018-1'),
('94431794', 'Alfred', 'Alfred', 'Johnson', 'Johnson', 0, 'danielcraft236@hotmail.com', '3235291452', '10', '2', '2', '2', '1', '2019-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id_facultad` varchar(10) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `nombre`) VALUES
('1', 'Ingenierias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_entregas`
--

CREATE TABLE `fecha_entregas` (
  `id_fecha` varchar(5) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fecha_entregas`
--

INSERT INTO `fecha_entregas` (`id_fecha`, `fecha`, `descripcion`) VALUES
('00001', '2019-05-23', 'primera entrega'),
('00002', '2019-05-15', 'entrega final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `ID_Form` varchar(10) NOT NULL,
  `nombre_formulario` varchar(255) NOT NULL,
  `ArchivoFormulario` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ID_Form`, `nombre_formulario`, `ArchivoFormulario`, `descripcion`) VALUES
('123', 'Plantilla de proyecto', '93314-plantilla-de-proyecto-integrador-primera-entrega-estudiante.xlsx', 'plantilla de poyecto integrador'),
('3', 'sustentacion tercer semestre', '7a196-sustentacion-tercer-semestre.xlsx', 'tercer semestre'),
('333', 'prueba', '2a28c-proyecto-integrador-1.xlsx', 'formulario prueba'),
('4', 'sustentacion cuarto semestre', '36f6e-sustentacion-cuarto-semestre.xlsx', 'cuarto semestre'),
('5', 'sustentacion quinto semestre', 'dac75-sustentacion-quinto-semestre.xlsx', 'quinto semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `cod_grupo` int(10) NOT NULL,
  `proyecto_id_proyecto` varchar(10) NOT NULL,
  `semestre_id` varchar(10) NOT NULL,
  `jornada` varchar(20) NOT NULL,
  `programa_id` varchar(10) NOT NULL,
  `comentarios` text NOT NULL,
  `usuario_id_asesor` varchar(10) NOT NULL,
  `cant` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `comprobar_password` varchar(255) NOT NULL,
  `periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`cod_grupo`, `proyecto_id_proyecto`, `semestre_id`, `jornada`, `programa_id`, `comentarios`, `usuario_id_asesor`, `cant`, `password`, `comprobar_password`, `periodo`) VALUES
(1, '1', '5', 'Mañana', '1', '<p>\n	<label class=\"col-sm-3 control-label\" style=\"margin: 0px; padding: 7px 15px 0px; box-sizing: border-box; display: inline-block; max-width: 25%; font-weight: 700; position: relative; width: 279.5px; min-height: 1px; flex: 0 0 25%; float: left; text-align: right;\">Comentarios</label></p>\n<div class=\"col-sm-9\" style=\"margin: 0px; padding: 0px 15px; box-sizing: border-box; position: relative; width: 838.5px; min-height: 1px; flex: 0 0 75%; max-width: 75%; float: left;\">\n	&nbsp;</div>\n', '2002', 3, '$2y$10$zCCj6TSvnofSnl882b0itu0dWgBSxlIK04qwxfenJKhtPgffEjkHa', '$2y$10$zCCj6TSvnofSnl882b0itu0dWgBSxlIK04qwxfenJKhtPgffEjkHa', '2019-1'),
(2, '1', '2', 'Mañana', '1', '<p>\n	<span font-size:=\"\" font-weight:=\"\" helvetica=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Comentarios</span></p>\n', '2002', 3, '$2y$10$4rIKYFGtXVqXz0xx5.cWYejnYaMUwcPOd.ax7fFHe9ihJSSy/Trq2', '$2y$10$4rIKYFGtXVqXz0xx5.cWYejnYaMUwcPOd.ax7fFHe9ihJSSy/Trq2', '2019-1'),
(3, '1', '1', 'Mañana', '1', '<p>\n	<span font-size:=\"\" font-weight:=\"\" helvetica=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Comentarios</span></p>\n', '1004', 2, '$2y$10$WOB88lEt7gNFdTiMWa/Ig.qfyLEfTvuhotgYdAZ3V4rMNuN/yWqQ2', '$2y$10$KA6tUU12SLro3OMuFzkED.lzU1D/H3sEUBEMYULMo.dpMPeJZLTTW', '2019-1'),
(4, '1', '1', 'Noche', '2', '', '1004', 2, '$2y$10$Soq3eH7xLL8EX.JticuPU.fBw0ZehRPZEdse7v90Z8vvwyThLW.Wi', '$2y$10$Soq3eH7xLL8EX.JticuPU.fBw0ZehRPZEdse7v90Z8vvwyThLW.Wi', '2019-1'),
(5, '1', '2', 'Mañana', '1', '<p>\n	da</p>\n', '2002', 3, '$2y$10$bHln.f2GnpVKk6HtozEuau3C.QPDO7.xWDEDjL/EbKz5K.2eEO37W', '$2y$10$bHln.f2GnpVKk6HtozEuau3C.QPDO7.xWDEDjL/EbKz5K.2eEO37W', '2019-1'),
(759, '0759', '3', 'diurna', '2', '', '0000', 3, '$2y$10$VwL2zKl3MVrYsMBbzNPSAu1JfpGtZEjaZEcf4LyzeWZuHbf6cOI/y', '$2y$10$VwL2zKl3MVrYsMBbzNPSAu1JfpGtZEjaZEcf4LyzeWZuHbf6cOI/y', '2019-1'),
(9711, '9711', '2', 'nocturna', '2', 'comentario', '0000', 3, '$2y$10$UMIUZSbb2GIlhJpbWcmHbeLLljZ7ba7XdBAO4cTZxHv7OQSvUmjxG', '$2y$10$UMIUZSbb2GIlhJpbWcmHbeLLljZ7ba7XdBAO4cTZxHv7OQSvUmjxG', '2019-1'),
(6879600, '6879600', '3', 'diurna', '1', 'comentarios', '1001', 3, '$2y$10$RdV6g07SUhaISD2VjFVvhu5yDc0XTdCTuXSkWdFz2Rgq78AGBkMjG', '$2y$10$RdV6g07SUhaISD2VjFVvhu5yDc0XTdCTuXSkWdFz2Rgq78AGBkMjG', '2019-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_semestre`
--

CREATE TABLE `grupo_semestre` (
  `cod_semestre` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_semestre`
--

INSERT INTO `grupo_semestre` (`cod_semestre`, `descripcion`) VALUES
('1', 'S141'),
('2', 'S241'),
('3', 'S341'),
('4', 'S441'),
('5', 'S541'),
('6', 'S641'),
('7', 'S741'),
('8', 'S841'),
('9', 'S941');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_pi`
--

CREATE TABLE `integrantes_pi` (
  `cod_inscripcion` int(10) NOT NULL,
  `estudiante_ID` varchar(15) NOT NULL,
  `grupo_cod_grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `integrantes_pi`
--

INSERT INTO `integrantes_pi` (`cod_inscripcion`, `estudiante_ID`, `grupo_cod_grupo`) VALUES
(1, '5003', 1),
(2, '5001', 1),
(22, '5002', 1),
(37, '5004', 6879600),
(52, '94431794', 759),
(53, '5005', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `cod_jornada` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`cod_jornada`, `descripcion`) VALUES
('1', 'Diurna'),
('2', 'Noturna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_proyecto`
--

CREATE TABLE `nota_proyecto` (
  `cod_nota_proyecto` int(10) NOT NULL,
  `cod_porcentaje` varchar(10) NOT NULL,
  `cod_nota_entregas` int(10) NOT NULL,
  `cod_nota_sus` varchar(10) NOT NULL,
  `cod_estudiante` varchar(10) NOT NULL,
  `nota_final` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota_proyecto`
--

INSERT INTO `nota_proyecto` (`cod_nota_proyecto`, `cod_porcentaje`, `cod_nota_entregas`, `cod_nota_sus`, `cod_estudiante`, `nota_final`) VALUES
(19, '1', 9, '0', '5001', '3.6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `cod_periodo` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`cod_periodo`, `descripcion`) VALUES
('2018-1', 'Periodo academico 2018 primer  semestre\r\n'),
('2018-2', 'Periodo academico 2018 segundo semestre\r\n'),
('2019-1', 'Periodo academico 2019 primer semestre'),
('2019-2', 'Periodo academico 2019 segundo semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentaje_calificacion`
--

CREATE TABLE `porcentaje_calificacion` (
  `cod_porcentaje` varchar(10) NOT NULL,
  `primer_entrega` decimal(3,1) NOT NULL,
  `entrega_final` decimal(3,1) NOT NULL,
  `sustentacion` decimal(3,1) NOT NULL,
  `cod_semestre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `porcentaje_calificacion`
--

INSERT INTO `porcentaje_calificacion` (`cod_porcentaje`, `primer_entrega`, `entrega_final`, `sustentacion`, `cod_semestre`) VALUES
('1', '20.0', '20.0', '60.0', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `primerentrega`
--

CREATE TABLE `primerentrega` (
  `id_entrega` varchar(10) NOT NULL,
  `archivoDocumento` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usuario_id_asesor` varchar(10) NOT NULL,
  `grupo_cod_grupo` int(10) NOT NULL,
  `id_fecha_plazo` varchar(5) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `primerentrega`
--

INSERT INTO `primerentrega` (`id_entrega`, `archivoDocumento`, `usuario_id_asesor`, `grupo_cod_grupo`, `id_fecha_plazo`, `fecha_entrega`) VALUES
('1', 'src/primer_entrega/primer_entrega-11.pdf', '2002', 1, '00001', '2019-05-02'),
('3', 'src/primer_entrega/hola6.pdf', '1004', 3, '00001', '2019-05-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `cod_programa` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `facultad_cod_facultad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`cod_programa`, `nombre`, `facultad_cod_facultad`) VALUES
('1', 'Ingenieria de sistemas', '1'),
('2', 'Tecnología en sistemas de información', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promedio_sus`
--

CREATE TABLE `promedio_sus` (
  `id_estudiante` varchar(10) NOT NULL,
  `promedio` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promedio_sus`
--

INSERT INTO `promedio_sus` (`id_estudiante`, `promedio`) VALUES
('0', '0.0'),
('5001', '3.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` varchar(10) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `requerimientos` text NOT NULL,
  `objetivos` text NOT NULL,
  `actores` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `titulo`, `descripcion`, `requerimientos`, `objetivos`, `actores`) VALUES
('0061', 'daniel23', '', '', '', ''),
('0111', 'prueba', '', '', '', ''),
('0759', 'daniel23', '', '', '', ''),
('1', 'Titulo', '<p>\n	<span font-size:=\"\" font-weight:=\"\" helvetica=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Descripcion</span></p>\n', '<p>\n	<span font-size:=\"\" font-weight:=\"\" helvetica=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Requerimientos</span></p>\n', '<p>\n	<span font-size:=\"\" font-weight:=\"\" helvetica=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Objetivos</span></p>\n', '<p>\n	<span font-size:=\"\" font-weight:=\"\" helvetica=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Actoress</span></p>\n'),
('3186', 'daniel23', '', '', '', ''),
('3770', 'daniel23', '', '', '', ''),
('4803', 'daniel23', '', '', '', ''),
('5083', '1', '', '', '', ''),
('5980', 'daniel23', '', '', '', ''),
('6879600', 'gestion', '', '', '', ''),
('7110', 'daniel23', '', '', '', ''),
('7761', 'prueba', '', '', '', ''),
('8402', '1', '', '', '', ''),
('8970', 'prueba', '', '', '', ''),
('9000', 'grupo', '', '', '', ''),
('9711', 'prueba', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `cod_sede` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`cod_sede`, `nombre`, `direccion`) VALUES
('1', 'Sede Norte', 'Avenida 6N'),
('2', 'Sede Sur', 'Cl. 25 #12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `cod_semestre` varchar(10) NOT NULL,
  `nombre` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`cod_semestre`, `nombre`) VALUES
('1', 1),
('10', 10),
('2', 2),
('3', 3),
('4', 4),
('5', 5),
('6', 6),
('7', 7),
('8', 8),
('9', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `staff_jurado`
--

CREATE TABLE `staff_jurado` (
  `id_staff` varchar(10) NOT NULL,
  `usuario_id_jurado1` varchar(15) NOT NULL,
  `usuario_id_jurado2` varchar(15) DEFAULT NULL,
  `usuario_id_jurado3` varchar(15) DEFAULT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `staff_jurado`
--

INSERT INTO `staff_jurado` (`id_staff`, `usuario_id_jurado1`, `usuario_id_jurado2`, `usuario_id_jurado3`, `estado`) VALUES
('0', '0000', '0000', '0000', 'no borrar'),
('1', '1004', '1001', '1002', 'Habilitado'),
('2', '1002', '1004', '2002', 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sustentacion`
--

CREATE TABLE `sustentacion` (
  `id_sustentacion` varchar(10) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lugar` varchar(45) NOT NULL,
  `grupo_cod_grupo` int(10) NOT NULL,
  `staff_id_staff` varchar(10) NOT NULL,
  `form_id_form` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sustentacion`
--

INSERT INTO `sustentacion` (`id_sustentacion`, `fecha_hora`, `lugar`, `grupo_cod_grupo`, `staff_id_staff`, `form_id_form`) VALUES
('1', '2019-05-19 03:27:04', 'Candelaria', 1, '1', '5'),
('2', '2019-09-03 13:15:16', 'Cali', 2, '2', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `cod_tipo` varchar(10) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`cod_tipo`, `titulo`) VALUES
('0', 'Sin asignar'),
('1', 'Admin'),
('2', 'Jurado'),
('3', 'Asesor'),
('4', 'Jurado - Asesor'),
('5', 'Grupo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `id_token` varchar(10) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`id_token`, `token`, `fecha`) VALUES
('', 'U7aVmTlfTi9ZUFF5yqEL', '2019-09-20 19:30:54'),
('1', '5Sd4mQF2L0W9g5AruU5N', '2019-09-20 19:34:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `primer_nombre` varchar(45) NOT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `primer_apellido` varchar(45) NOT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `comprobar_password` varchar(255) NOT NULL,
  `programa_cod_programa` varchar(10) NOT NULL,
  `tipo_cod_tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `email`, `telefono`, `username`, `password`, `comprobar_password`, `programa_cod_programa`, `tipo_cod_tipo`) VALUES
('0000', 'sin asignar', 'sin asignar', '', NULL, '', '', '', '', '', '', '0'),
('1001', 'jonathan', 'arley', 'rodriguez', 'pacheco', 'danielcraft236@hotmail.com', '3215584001', 'jonathan', '$2y$10$HJl6ksGiIi/6ViBt/sNQR.WbjghnnDc8iYGjhABN8Ajehxrjd1QB.', '$2y$10$HJl6ksGiIi/6ViBt/sNQR.WbjghnnDc8iYGjhABN8Ajehxrjd1QB.', '1', '2'),
('1002', 'carlos', 'daniel', 'salas', 'dias', 'salas@gmail.com', '3334356432', 'salas', '$2y$10$110J83UmNO.XTZEWqaHQoewjDGaI9qqix6i1CeTPAXCzJ74VrCZ06', '$2y$10$110J83UmNO.XTZEWqaHQoewjDGaI9qqix6i1CeTPAXCzJ74VrCZ06', '1', '4'),
('1004', 'jhon', NULL, 'cano', NULL, 'anoc@gmail.com', '3123234546', 'cano', '$2y$10$cdSWl9njLmTFyll43yBiZeqU5qX/cr66bIIJye2waUVt9juMcfTHW', '$2y$10$cdSWl9njLmTFyll43yBiZeqU5qX/cr66bIIJye2waUVt9juMcfTHW', '1', '3'),
('1005', 'Andres', 'David', 'Mutis', NULL, 'mutis236@gmail.com', '3235291452', 'mutis', '$2y$10$AlKTUwYgAW9tQI0dQftVvOpS0yg82koOrpUrw4kjEgLl003mJt1Je', '$2y$10$AlKTUwYgAW9tQI0dQftVvOpS0yg82koOrpUrw4kjEgLl003mJt1Je', '1', '1'),
('2002', 'tania', NULL, 'mora', NULL, 'tania@gmail.com', '3123234546', 'tania', '$2y$10$IGUrP0Ykem5BzW4VsdOxne9Twy6Q9KHIm.y125w6cNBHZebt8LmDe', '$2y$10$IGUrP0Ykem5BzW4VsdOxne9Twy6Q9KHIm.y125w6cNBHZebt8LmDe', '1', '4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD PRIMARY KEY (`consecutivo`),
  ADD KEY `asesoria_asesor_fk` (`usuario_id_asesor`),
  ADD KEY `asesoria_grupo_fk` (`grupo_cod_grupo`);

--
-- Indices de la tabla `calificacion_entregas`
--
ALTER TABLE `calificacion_entregas`
  ADD PRIMARY KEY (`cod_cal`),
  ADD KEY `calfi1_estudiante` (`estudiante_cod_estudiante`),
  ADD KEY `calfi1_asesor` (`docente_id_asesor`);

--
-- Indices de la tabla `calificacion_sus`
--
ALTER TABLE `calificacion_sus`
  ADD PRIMARY KEY (`cod_cals`,`id_jurado`),
  ADD KEY `calfis_estudiante` (`estudiante_cod_estudiante`),
  ADD KEY `calfis_staff` (`staff_id_staff`),
  ADD KEY `id_jurado` (`id_jurado`);

--
-- Indices de la tabla `entregafinal`
--
ALTER TABLE `entregafinal`
  ADD PRIMARY KEY (`id_entregaFin`),
  ADD KEY `entregafinal_asesor_fk` (`usuario_id_asesor`),
  ADD KEY `entregafinal_grupo_fk` (`grupo_cod_grupo`),
  ADD KEY `id_fecha_plazo` (`id_fecha_plazo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `estudiante_semestre_fk` (`semestre_cod_semestre`),
  ADD KEY `estudiante_sede_fk` (`sede_cod_sede`),
  ADD KEY `estudiante_programa_fk` (`programa_cod_programa`),
  ADD KEY `cod_grupo_semestre` (`cod_grupo_semestre`),
  ADD KEY `jornada_cod_jornada` (`jornada_cod_jornada`),
  ADD KEY `periodo_cod_periodo` (`periodo_cod_periodo`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id_facultad`);

--
-- Indices de la tabla `fecha_entregas`
--
ALTER TABLE `fecha_entregas`
  ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`ID_Form`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`cod_grupo`),
  ADD KEY `grupo_proyecto_fk` (`proyecto_id_proyecto`),
  ADD KEY `grupo_asesor_fk` (`usuario_id_asesor`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `grupo_semestre`
--
ALTER TABLE `grupo_semestre`
  ADD PRIMARY KEY (`cod_semestre`);

--
-- Indices de la tabla `integrantes_pi`
--
ALTER TABLE `integrantes_pi`
  ADD PRIMARY KEY (`cod_inscripcion`),
  ADD KEY `inscripciones_estudiante_fk` (`estudiante_ID`),
  ADD KEY `inscripciones_grupo_fk` (`grupo_cod_grupo`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`cod_jornada`);

--
-- Indices de la tabla `nota_proyecto`
--
ALTER TABLE `nota_proyecto`
  ADD PRIMARY KEY (`cod_nota_proyecto`),
  ADD KEY `cod_nota_entregas` (`cod_nota_entregas`),
  ADD KEY `cod_nota_sus` (`cod_nota_sus`),
  ADD KEY `cod_porcentaje` (`cod_porcentaje`),
  ADD KEY `cod_estudiante` (`cod_estudiante`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`cod_periodo`);

--
-- Indices de la tabla `porcentaje_calificacion`
--
ALTER TABLE `porcentaje_calificacion`
  ADD PRIMARY KEY (`cod_porcentaje`),
  ADD KEY `cod_semestre` (`cod_semestre`);

--
-- Indices de la tabla `primerentrega`
--
ALTER TABLE `primerentrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `primerentrega_asesor_fk` (`usuario_id_asesor`),
  ADD KEY `primerentrega_grupo_fk` (`grupo_cod_grupo`),
  ADD KEY `id_fecha_plazo` (`id_fecha_plazo`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`cod_programa`),
  ADD KEY `programa_facultad_fk` (`facultad_cod_facultad`);

--
-- Indices de la tabla `promedio_sus`
--
ALTER TABLE `promedio_sus`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`cod_sede`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`cod_semestre`);

--
-- Indices de la tabla `staff_jurado`
--
ALTER TABLE `staff_jurado`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `usuario_id_jurado1` (`usuario_id_jurado1`),
  ADD KEY `usuario_id_jurado2` (`usuario_id_jurado2`),
  ADD KEY `usuario_id_jurado3` (`usuario_id_jurado3`);

--
-- Indices de la tabla `sustentacion`
--
ALTER TABLE `sustentacion`
  ADD PRIMARY KEY (`id_sustentacion`),
  ADD KEY `sustentacion_grupo_fk` (`grupo_cod_grupo`),
  ADD KEY `sustentacion_staff_fk` (`staff_id_staff`),
  ADD KEY `sustentacion_form_fk` (`form_id_form`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_programa_fk` (`programa_cod_programa`),
  ADD KEY `tipo_cod_tipo` (`tipo_cod_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  MODIFY `consecutivo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `calificacion_entregas`
--
ALTER TABLE `calificacion_entregas`
  MODIFY `cod_cal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `integrantes_pi`
--
ALTER TABLE `integrantes_pi`
  MODIFY `cod_inscripcion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `nota_proyecto`
--
ALTER TABLE `nota_proyecto`
  MODIFY `cod_nota_proyecto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD CONSTRAINT `asesoria_asesor_fk` FOREIGN KEY (`usuario_id_asesor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `asesoria_grupo_fk` FOREIGN KEY (`grupo_cod_grupo`) REFERENCES `grupo` (`cod_grupo`);

--
-- Filtros para la tabla `calificacion_entregas`
--
ALTER TABLE `calificacion_entregas`
  ADD CONSTRAINT `calfi1_asesor` FOREIGN KEY (`docente_id_asesor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calfi1_estudiante` FOREIGN KEY (`estudiante_cod_estudiante`) REFERENCES `estudiante` (`ID`);

--
-- Filtros para la tabla `calificacion_sus`
--
ALTER TABLE `calificacion_sus`
  ADD CONSTRAINT `calfis_estudiante` FOREIGN KEY (`estudiante_cod_estudiante`) REFERENCES `estudiante` (`ID`),
  ADD CONSTRAINT `calfis_staff` FOREIGN KEY (`staff_id_staff`) REFERENCES `staff_jurado` (`id_staff`),
  ADD CONSTRAINT `calificacion_sus_ibfk_1` FOREIGN KEY (`id_jurado`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `entregafinal`
--
ALTER TABLE `entregafinal`
  ADD CONSTRAINT `entregafinal_asesor_fk` FOREIGN KEY (`usuario_id_asesor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `entregafinal_grupo_fk` FOREIGN KEY (`grupo_cod_grupo`) REFERENCES `grupo` (`cod_grupo`),
  ADD CONSTRAINT `entregafinal_ibfk_1` FOREIGN KEY (`id_fecha_plazo`) REFERENCES `fecha_entregas` (`id_fecha`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`semestre_cod_semestre`) REFERENCES `semestre` (`cod_semestre`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`cod_grupo_semestre`) REFERENCES `grupo_semestre` (`cod_semestre`),
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`sede_cod_sede`) REFERENCES `sede` (`cod_sede`),
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`jornada_cod_jornada`) REFERENCES `jornada` (`cod_jornada`),
  ADD CONSTRAINT `estudiante_ibfk_5` FOREIGN KEY (`periodo_cod_periodo`) REFERENCES `periodo` (`cod_periodo`),
  ADD CONSTRAINT `estudiante_ibfk_6` FOREIGN KEY (`programa_cod_programa`) REFERENCES `programa` (`cod_programa`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_asesor_fk` FOREIGN KEY (`usuario_id_asesor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`periodo`) REFERENCES `periodo` (`cod_periodo`),
  ADD CONSTRAINT `grupo_proyecto_fk` FOREIGN KEY (`proyecto_id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `integrantes_pi`
--
ALTER TABLE `integrantes_pi`
  ADD CONSTRAINT `inscripciones_estudiante_fk` FOREIGN KEY (`estudiante_ID`) REFERENCES `estudiante` (`ID`),
  ADD CONSTRAINT `inscripciones_grupo_fk` FOREIGN KEY (`grupo_cod_grupo`) REFERENCES `grupo` (`cod_grupo`);

--
-- Filtros para la tabla `nota_proyecto`
--
ALTER TABLE `nota_proyecto`
  ADD CONSTRAINT `nota_proyecto_ibfk_3` FOREIGN KEY (`cod_porcentaje`) REFERENCES `porcentaje_calificacion` (`cod_porcentaje`),
  ADD CONSTRAINT `nota_proyecto_ibfk_4` FOREIGN KEY (`cod_nota_sus`) REFERENCES `promedio_sus` (`id_estudiante`),
  ADD CONSTRAINT `nota_proyecto_ibfk_5` FOREIGN KEY (`cod_nota_entregas`) REFERENCES `calificacion_entregas` (`cod_cal`),
  ADD CONSTRAINT `nota_proyecto_ibfk_6` FOREIGN KEY (`cod_estudiante`) REFERENCES `estudiante` (`ID`);

--
-- Filtros para la tabla `porcentaje_calificacion`
--
ALTER TABLE `porcentaje_calificacion`
  ADD CONSTRAINT `porcentaje_calificacion_ibfk_1` FOREIGN KEY (`cod_semestre`) REFERENCES `semestre` (`cod_semestre`);

--
-- Filtros para la tabla `primerentrega`
--
ALTER TABLE `primerentrega`
  ADD CONSTRAINT `primerentrega_asesor_fk` FOREIGN KEY (`usuario_id_asesor`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `primerentrega_grupo_fk` FOREIGN KEY (`grupo_cod_grupo`) REFERENCES `grupo` (`cod_grupo`),
  ADD CONSTRAINT `primerentrega_ibfk_1` FOREIGN KEY (`id_fecha_plazo`) REFERENCES `fecha_entregas` (`id_fecha`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `programa_facultad_fk` FOREIGN KEY (`facultad_cod_facultad`) REFERENCES `facultad` (`id_facultad`);

--
-- Filtros para la tabla `promedio_sus`
--
ALTER TABLE `promedio_sus`
  ADD CONSTRAINT `promedio_sus_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `calificacion_sus` (`estudiante_cod_estudiante`);

--
-- Filtros para la tabla `staff_jurado`
--
ALTER TABLE `staff_jurado`
  ADD CONSTRAINT `staff_jurado_ibfk_1` FOREIGN KEY (`usuario_id_jurado1`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `staff_jurado_ibfk_2` FOREIGN KEY (`usuario_id_jurado2`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `staff_jurado_ibfk_3` FOREIGN KEY (`usuario_id_jurado3`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `sustentacion`
--
ALTER TABLE `sustentacion`
  ADD CONSTRAINT `sustentacion_form_fk` FOREIGN KEY (`form_id_form`) REFERENCES `formulario` (`ID_Form`),
  ADD CONSTRAINT `sustentacion_grupo_fk` FOREIGN KEY (`grupo_cod_grupo`) REFERENCES `grupo` (`cod_grupo`),
  ADD CONSTRAINT `sustentacion_staff_fk` FOREIGN KEY (`staff_id_staff`) REFERENCES `staff_jurado` (`id_staff`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_cod_tipo`) REFERENCES `tipo` (`cod_tipo`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `eliminar_token` ON SCHEDULE EVERY 1 SECOND STARTS '2019-04-30 16:49:46' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM token WHERE UNIX_TIMESTAMP(`fecha`) < (UNIX_TIMESTAMP()-24*3600)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
