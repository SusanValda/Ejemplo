-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-11-2014 a las 15:31:12
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `academia_clases`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `codalumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `ci` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`codalumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`codalumno`, `nombre`, `apellidos`, `ci`, `direccion`) VALUES
(1, 'juan', 'agreda', '4568762', 'miraflores'),
(2, 'mario', 'perez', '6789543', 'Av.Arce '),
(5, 'Marcelo', 'Ticona', '867656', 'obrajes c/2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `codalumno` int(50) NOT NULL,
  `codcursos` varchar(50) NOT NULL,
  `nota` varchar(50) NOT NULL,
  UNIQUE KEY `fk_codalumno` (`codalumno`),
  UNIQUE KEY `fk_codcursos` (`codcursos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`codalumno`, `codcursos`, `nota`) VALUES
(1, '3001', '71'),
(2, '3002', '51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `codcursos` int(50) NOT NULL,
  `fecha_inicio` varchar(50) NOT NULL,
  `fecha_fin` varchar(50) NOT NULL,
  `coddt` int(50) NOT NULL,
  `cod_curso` int(50) NOT NULL,
  PRIMARY KEY (`codcursos`),
  UNIQUE KEY `fk_coddt` (`coddt`),
  UNIQUE KEY `fk_cod_curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codcursos`, `fecha_inicio`, `fecha_fin`, `coddt`, `cod_curso`) VALUES
(3001, '10/01/2015', '01/02/2015', 2001, 1001),
(3002, '01/12/2014', '10/01/215', 2002, 1002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `coddt` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `ci` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  PRIMARY KEY (`coddt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`coddt`, `nombre`, `apellidos`, `ci`, `telefono`) VALUES
(2001, 'Pedro', 'Ramos Arteaga', '78173182', '245638'),
(2002, 'Gabriela', 'Alvarez', '83717317', '2228210');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_curso`
--

CREATE TABLE IF NOT EXISTS `tipo_curso` (
  `cod_curso` int(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `duracion` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `costo` float NOT NULL,
  PRIMARY KEY (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_curso`
--

INSERT INTO `tipo_curso` (`cod_curso`, `titulo`, `duracion`, `horario`, `costo`) VALUES
(1001, 'programacion', '2 meses', 'lun - vier 9:00 a 11:00am', 200),
(1002, 'Diseño paginas web', '1 mes', 'lun - vier 10:00 a 11:00 am', 150);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
