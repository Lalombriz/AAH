-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2021 a las 04:06:26
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anestesiologos`
--

CREATE TABLE `anestesiologos` (
  `nombre_completo` varchar(50) NOT NULL,
  `cedula_p` int(11) NOT NULL,
  `estudios` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE `enfermeros` (
  `nombre_completo` varchar(50) NOT NULL,
  `cedula_p` int(11) NOT NULL,
  `estudios` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enfermeros`
--

INSERT INTO `enfermeros` (`nombre_completo`, `cedula_p`, `estudios`, `usuario`, `contrasena`) VALUES
('eduardo gutierrez', 123456, 'UABC', 'sistemas@uneme.gob.m', '$2y$10$AtrdxAwYM8DfS'),
('ana elena', 159159, 'TEC', 'sistemas@uneme.gob.m', '$2y$10$DEb3ogoSgGXOo'),
('ana elena', 123456, 'UABC', 'sistemas@uneme.gob.m', '$2y$10$msvi3F89jbZV3'),
('ana elena', 123456, 'UABC', 'sistemas@uneme.gob.m', '$2y$10$ABCxUBJ2XxweJ'),
('ana elena', 123456, 'UABC', 'sistemas@uneme.gob.m', '$2y$10$EjyfcqaJYLRdo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_alta`
--

CREATE TABLE `hoja_alta` (
  `nombre` varchar(300) NOT NULL,
  `edad` varchar(300) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_alta` date NOT NULL,
  `diagnostico_ingreso` varchar(300) NOT NULL,
  `condicion_egreso` varchar(300) NOT NULL,
  `resumen_hospitalizacion` varchar(300) NOT NULL,
  `procedimiento_terapeutico_efectuado` varchar(300) NOT NULL,
  `recomendaciones` varchar(1000) NOT NULL,
  `no_hoja` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_consumo`
--

CREATE TABLE `hoja_consumo` (
  `nombre` varchar(300) NOT NULL,
  `diagnostico_preoperatorio` varchar(300) NOT NULL,
  `medico_cirujano` varchar(300) NOT NULL,
  `enfermera_quirurgica` varchar(300) NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_inicio_cirugia` time NOT NULL,
  `edad` varchar(300) NOT NULL,
  `cirugia_practicada` varchar(300) NOT NULL,
  `ayudante` varchar(300) NOT NULL,
  `enfermera_circulante` varchar(300) NOT NULL,
  `tipo_anestesia` varchar(300) NOT NULL,
  `hora_termino_cirugia` varchar(300) NOT NULL,
  `no_cama` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `hora_egreso` time NOT NULL,
  `quirofano` varchar(300) NOT NULL,
  `no_hoja` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_indicaciones_seguridad`
--

CREATE TABLE `hoja_indicaciones_seguridad` (
  `nombre` varchar(300) NOT NULL,
  `procedimiento_quirurgico` varchar(300) NOT NULL,
  `cirujano` varchar(300) NOT NULL,
  `enfermera_circulante` varchar(300) NOT NULL,
  `enfermera_quirurgica` varchar(300) NOT NULL,
  `paciente_diabetico` varchar(300) NOT NULL,
  `infecciones_previas` varchar(300) NOT NULL,
  `aplicacion_antibiotico` varchar(300) NOT NULL,
  `nombre_antibiotico` varchar(300) NOT NULL,
  `antisepsia` varchar(300) NOT NULL,
  `inicio_cirugia` time NOT NULL,
  `fecha` date NOT NULL,
  `edad` varchar(300) NOT NULL,
  `sexo` varchar(300) NOT NULL,
  `hora_aplicacion_antibiotico` time NOT NULL,
  `hora_antisepsia` time NOT NULL,
  `termina_cirugia` time NOT NULL,
  `no_hoja` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_medica_postoperatoria`
--

CREATE TABLE `hoja_medica_postoperatoria` (
  `fecha` date NOT NULL,
  `no_exp` int(30) NOT NULL,
  `paciente` varchar(300) NOT NULL,
  `edad` varchar(300) NOT NULL,
  `sexo` varchar(300) NOT NULL,
  `diagnostico_preoperatorio` varchar(300) NOT NULL,
  `diagnostico_postoperatorio` varchar(300) NOT NULL,
  `cirujano` varchar(300) NOT NULL,
  `descripcion_cirugia` varchar(1000) NOT NULL,
  `QX` varchar(300) NOT NULL,
  `anestesiologo` varchar(300) NOT NULL,
  `tipo_anestesia` varchar(300) NOT NULL,
  `ayudante1` varchar(300) NOT NULL,
  `instrumentista` varchar(300) NOT NULL,
  `circulante` varchar(300) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `no_hoja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `nombre_completo` varchar(50) NOT NULL,
  `cedula_p` int(11) NOT NULL,
  `estudios` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_enfermeria_transoperatorio`
--

CREATE TABLE `nota_enfermeria_transoperatorio` (
  `reporte_enfermeria` varchar(600) NOT NULL,
  `medicamentos` varchar(300) NOT NULL,
  `soluciones` varchar(300) NOT NULL,
  `diuresis` varchar(300) NOT NULL,
  `sangrado` varchar(300) NOT NULL,
  `gasas` varchar(300) NOT NULL,
  `compresas` varchar(300) NOT NULL,
  `otros` varchar(300) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_indicaciones_medicas`
--

CREATE TABLE `nota_indicaciones_medicas` (
  `nombre` varchar(300) NOT NULL,
  `no_exp` int(30) NOT NULL,
  `edad` varchar(300) NOT NULL,
  `servicio` varchar(300) NOT NULL,
  `cama` varchar(300) NOT NULL,
  `fecha` datetime NOT NULL,
  `indicaciones` varchar(600) NOT NULL,
  `sexo` varchar(300) NOT NULL,
  `no_indicacion` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_preoperatoria`
--

CREATE TABLE `nota_preoperatoria` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `diagnostico` varchar(300) NOT NULL,
  `plan_terapeutico` varchar(600) NOT NULL,
  `pronostico` varchar(600) NOT NULL,
  `cirugia_programada` int(11) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_preparacion`
--

CREATE TABLE `nota_preparacion` (
  `temp` varchar(10) NOT NULL,
  `fc` varchar(10) NOT NULL,
  `fr` varchar(10) NOT NULL,
  `t/a` varchar(10) NOT NULL,
  `dxtx` varchar(10) NOT NULL,
  `solucion` varchar(300) NOT NULL,
  `ayuno` varchar(10) NOT NULL,
  `cx` varchar(10) NOT NULL,
  `alergias` varchar(300) NOT NULL,
  `toxico` varchar(300) NOT NULL,
  `transf` varchar(300) NOT NULL,
  `enfermedad_cronica` varchar(300) NOT NULL,
  `protesis` varchar(300) NOT NULL,
  `medicamento` varchar(300) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_quirofano`
--

CREATE TABLE `nota_quirofano` (
  `cirujano` varchar(300) NOT NULL,
  `anestesiologo` varchar(300) NOT NULL,
  `diagnostico` varchar(300) NOT NULL,
  `enfermera_qca` varchar(300) NOT NULL,
  `hora_ingreso` time NOT NULL,
  `inicio` datetime NOT NULL,
  `termina` datetime NOT NULL,
  `egresa` datetime NOT NULL,
  `ayudante` varchar(300) NOT NULL,
  `tipo_anestesia` varchar(300) NOT NULL,
  `cx_realizada` varchar(300) NOT NULL,
  `circulante` varchar(300) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_recuperacion`
--

CREATE TABLE `nota_recuperacion` (
  `hora` time NOT NULL,
  `ta` varchar(300) NOT NULL,
  `fr` varchar(300) NOT NULL,
  `fc` varchar(300) NOT NULL,
  `T` varchar(300) NOT NULL,
  `SAT,02` varchar(300) NOT NULL,
  `medicamentos` varchar(300) NOT NULL,
  `reporte_recuperacion` varchar(600) NOT NULL,
  `sangrado` varchar(300) NOT NULL,
  `diuresis` varchar(300) NOT NULL,
  `emesis` varchar(300) NOT NULL,
  `no_exp` int(30) NOT NULL,
  `no_nota` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_recuperacion_inmediata`
--

CREATE TABLE `nota_recuperacion_inmediata` (
  `hora` time NOT NULL,
  `t/a` varchar(300) NOT NULL,
  `fr` varchar(300) NOT NULL,
  `fc` varchar(300) NOT NULL,
  `T` varchar(300) NOT NULL,
  `SAT,02` varchar(300) NOT NULL,
  `medicamentos` varchar(300) NOT NULL,
  `reporte_enfermeria` varchar(600) NOT NULL,
  `sangrado` varchar(300) NOT NULL,
  `diuresis` varchar(300) NOT NULL,
  `emesis` varchar(300) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_traslado`
--

CREATE TABLE `nota_traslado` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `procedimiento_programado` varchar(600) NOT NULL,
  `nombre_paciente` varchar(300) NOT NULL,
  `sexo` varchar(300) NOT NULL,
  `edad` varchar(300) NOT NULL,
  `unidad_receptora` varchar(300) NOT NULL,
  `unidad_envia` varchar(300) NOT NULL,
  `resumen_clinico` varchar(300) NOT NULL,
  `no_traslado` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `num_paciente` int(11) NOT NULL,
  `exp_procedencia` int(11) NOT NULL,
  `nombre_p` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_p` varchar(100) NOT NULL,
  `telefono_p` varchar(11) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `procedencia` varchar(10) NOT NULL,
  `num_afiliacion` int(11) NOT NULL,
  `nombre_a` varchar(50) NOT NULL,
  `parentesco` varchar(20) NOT NULL,
  `telefono_a` varchar(11) NOT NULL,
  `direccion_a` varchar(100) NOT NULL,
  `medico_esp` varchar(50) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `anestesiologo` varchar(50) NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `procedimiento` varchar(30) NOT NULL,
  `status` int(10) NOT NULL,
  `motivo_cancelacion` varchar(300) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`num_paciente`, `exp_procedencia`, `nombre_p`, `fecha_nacimiento`, `direccion_p`, `telefono_p`, `poblacion`, `estado`, `edad`, `sexo`, `procedencia`, `num_afiliacion`, `nombre_a`, `parentesco`, `telefono_a`, `direccion_a`, `medico_esp`, `especialidad`, `anestesiologo`, `diagnostico`, `procedimiento`, `status`, `motivo_cancelacion`) VALUES
(10, 10, 'Eduardo Marcelo Gutierrez Soto', '2021-04-05', 'Chicomostoc 891, colonia aztlan, Rosarityo baja california', '661-110-411', 'Rosarito', 'Baja California', 25, 'Masculino', 'PRIVADO', 1234657, 'Guillermo Eugenio Gutierrez Soto', 'Hernamo', '664-336-323', 'Chicomostoc 891, Aztlan Rosarito Baja California', 'Altamirano Gonzalez', 'Cirujano', 'Gutierrez Gonzalez', 'operacion', 'Riñon', 0, 'hklasdoaksdn'),
(11, 11, 'Feng', '2021-04-12', 'sadfsfd', '12232343', 'sdfsdf', 'sfsf', 12, 'Femenino', 'INSABI', 123456, 'adass', 'sdadfghg', '123456', 'gfhgffg', '12345', 'csfsdds', 'safsdfsd', 'sadfsdfsd', 'asfsdgfg', 0, '0'),
(12, 12, 'Edgar', '2021-04-25', 'tijuana', '33333333', 'Tijuana', 'Baja California', 12, 'Masculino', 'INSABI', 231241, 'Gustavo', 'Hernano', '3333333', 'Calle 2da', 'Dr. Juan Antonio', 'Oftamologo', 'Dr. RIvera', 'Operacion de Cornea', 'Cirugia', 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE `recepcion` (
  `exp_procedencia` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recepcion`
--

INSERT INTO `recepcion` (`exp_procedencia`, `fecha`) VALUES
(10, '2021-04-13'),
(11, '2021-04-16'),
(12, '2021-05-04');

--
-- Disparadores `recepcion`
--
DELIMITER $$
CREATE TRIGGER `nuevo_recepcion` BEFORE INSERT ON `recepcion` FOR EACH ROW begin
	set new.fecha = current_date();
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `escuela_estudios` varchar(50) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `cedula` int(15) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`, `nombre_completo`, `escuela_estudios`, `especialidad`, `tipo`, `cedula`, `ID`) VALUES
('hong', '81dc9bdb52d04dc20036dbd8313ed055', 'Haolin', 'UABC', 'INGENIERO', 'Administrativo', 1234567, 2),
('enola', '81dc9bdb52d04dc20036dbd8313ed055', 'Enola Carely', 'uabc', 'Ingeniera', 'Enfermero', 999999, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`num_paciente`),
  ADD KEY `exp_procedencia` (`exp_procedencia`);

--
-- Indices de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  ADD PRIMARY KEY (`exp_procedencia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `num_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  MODIFY `exp_procedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`exp_procedencia`) REFERENCES `recepcion` (`exp_procedencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
