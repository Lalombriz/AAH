-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2021 a las 21:44:42
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

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
-- Estructura de tabla para la tabla `fase_1`
--

CREATE TABLE `fase_1` (
  `no_fase` int(11) NOT NULL,
  `num_paciente` int(11) NOT NULL,
  `1_identidad` varchar(11) NOT NULL,
  `1_sitio_quirurgico` varchar(11) NOT NULL,
  `1_procedimiento_quirurgico` varchar(11) NOT NULL,
  `1_consentimiento` varchar(11) NOT NULL,
  `2_si` varchar(11) NOT NULL,
  `2_no_procede` varchar(11) NOT NULL,
  `3_si` varchar(11) NOT NULL,
  `3_no_procede` varchar(11) NOT NULL,
  `4_si` varchar(11) NOT NULL,
  `4_no` varchar(11) NOT NULL,
  `5_si` varchar(11) NOT NULL,
  `5_no` varchar(11) NOT NULL,
  `6_si` varchar(11) NOT NULL,
  `6_no` varchar(11) NOT NULL,
  `7_si` varchar(11) NOT NULL,
  `7_no` varchar(11) NOT NULL,
  `8_si` varchar(11) NOT NULL,
  `8_no` varchar(11) NOT NULL,
  `9_si` varchar(11) NOT NULL,
  `9_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fase_1`
--

INSERT INTO `fase_1` (`no_fase`, `num_paciente`, `1_identidad`, `1_sitio_quirurgico`, `1_procedimiento_quirurgico`, `1_consentimiento`, `2_si`, `2_no_procede`, `3_si`, `3_no_procede`, `4_si`, `4_no`, `5_si`, `5_no`, `6_si`, `6_no`, `7_si`, `7_no`, `8_si`, `8_no`, `9_si`, `9_no`) VALUES
(1, 10, 'X', 'X', 'X', 'X', 'X', '', '', 'X', 'X', '', '', 'X', '', 'X', '', '', 'X', '', '', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase_2`
--

CREATE TABLE `fase_2` (
  `no_fase` int(11) NOT NULL,
  `num_paciente` int(11) NOT NULL,
  `1_cirujano` varchar(30) NOT NULL,
  `1_ayudante` varchar(30) NOT NULL,
  `1_anestesiologo` varchar(30) NOT NULL,
  `1_circulante` varchar(30) NOT NULL,
  `1_otros` varchar(30) NOT NULL,
  `2_paciente_correcto` varchar(30) NOT NULL,
  `2_procedimiento_correcto` varchar(30) NOT NULL,
  `2_sitio_quirurgico_correcto` varchar(30) NOT NULL,
  `2_organo_bilateral` varchar(30) NOT NULL,
  `2_estrctura_multiple` varchar(30) NOT NULL,
  `2_posicion_correcta` varchar(30) NOT NULL,
  `3_si` varchar(30) NOT NULL,
  `3_no` varchar(30) NOT NULL,
  `3_no_procede` varchar(30) NOT NULL,
  `4_pasos_criticos` varchar(30) NOT NULL,
  `4_duracion_operacion` varchar(30) NOT NULL,
  `4_perdida_sangre` varchar(30) NOT NULL,
  `4_riesgo_enfermedad` varchar(30) NOT NULL,
  `4_fecha_metodo` varchar(30) NOT NULL,
  `4_problema_instrumental` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fase_2`
--

INSERT INTO `fase_2` (`no_fase`, `num_paciente`, `1_cirujano`, `1_ayudante`, `1_anestesiologo`, `1_circulante`, `1_otros`, `2_paciente_correcto`, `2_procedimiento_correcto`, `2_sitio_quirurgico_correcto`, `2_organo_bilateral`, `2_estrctura_multiple`, `2_posicion_correcta`, `3_si`, `3_no`, `3_no_procede`, `4_pasos_criticos`, `4_duracion_operacion`, `4_perdida_sangre`, `4_riesgo_enfermedad`, `4_fecha_metodo`, `4_problema_instrumental`) VALUES
(1, 10, 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase_3`
--

CREATE TABLE `fase_3` (
  `num_paciente` varchar(11) NOT NULL,
  `no_fase` int(11) NOT NULL,
  `1_nombre_proc` varchar(11) NOT NULL,
  `1_recuento_instrumento` varchar(11) NOT NULL,
  `1_etiquetado_muestras` varchar(11) NOT NULL,
  `1_problemas_instrumental` varchar(11) NOT NULL,
  `2_aspectos_recuperacion` varchar(11) NOT NULL,
  `2_plan_tratamiento` varchar(30) NOT NULL,
  `2_riesgos_paciente` varchar(30) NOT NULL,
  `3_si` varchar(30) NOT NULL,
  `3_no` varchar(30) NOT NULL,
  `4_si` varchar(30) NOT NULL,
  `4_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fase_3`
--

INSERT INTO `fase_3` (`num_paciente`, `no_fase`, `1_nombre_proc`, `1_recuento_instrumento`, `1_etiquetado_muestras`, `1_problemas_instrumental`, `2_aspectos_recuperacion`, `2_plan_tratamiento`, `2_riesgos_paciente`, `3_si`, `3_no`, `4_si`, `4_no`) VALUES
('10', 1, 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '', 'X', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_alta`
--

CREATE TABLE `hoja_alta` (
  `fecha_alta` date NOT NULL DEFAULT current_timestamp(),
  `condicion_egreso` varchar(300) NOT NULL,
  `resumen_hospitalizacion` varchar(300) NOT NULL,
  `procedimiento_terapeutico_efectuado` varchar(300) NOT NULL,
  `no_hoja` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL,
  `dieteticas` varchar(300) NOT NULL,
  `higienicas` varchar(300) NOT NULL,
  `medicamentos` varchar(300) NOT NULL,
  `emergencia` varchar(300) NOT NULL,
  `consultorio` varchar(300) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `servicio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_alta`
--

INSERT INTO `hoja_alta` (`fecha_alta`, `condicion_egreso`, `resumen_hospitalizacion`, `procedimiento_terapeutico_efectuado`, `no_hoja`, `no_exp`, `dieteticas`, `higienicas`, `medicamentos`, `emergencia`, `consultorio`, `fecha_hora`, `servicio`) VALUES
('2021-09-30', 'BUENAS', 'EVOLUCION SIN COMPLICACIONES', 'HERNIOPLASTIA INGUINAL IZQUIERDA', 1, 10, 'BAJA EN GRASAS', 'BAÑO NORMAL DIARIO, NO LEVANTAR OBJETOS PESADOS POR 1 MES, NO FUMAR POR 1 MES, CAMBIO DE GASAS DIARIAMENTE, APLICARSE HIELO EN REGION INGUINAL Y DE LA CIRUGIA NO DIRECTAMETE', 'KETEROLACO 30 MG IV CADA 8 HORAS', 'SANGRADO Y DOLOR ABUNDANTE', 'CAAPS RUIZ Y 14', '2021-09-30 15:48:52', 'CIRUGIA URGENCIAS RETIRO DE PUNTOS');

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

--
-- Volcado de datos para la tabla `hoja_indicaciones_seguridad`
--

INSERT INTO `hoja_indicaciones_seguridad` (`nombre`, `procedimiento_quirurgico`, `cirujano`, `enfermera_circulante`, `enfermera_quirurgica`, `paciente_diabetico`, `infecciones_previas`, `aplicacion_antibiotico`, `nombre_antibiotico`, `antisepsia`, `inicio_cirugia`, `fecha`, `edad`, `sexo`, `hora_aplicacion_antibiotico`, `hora_antisepsia`, `termina_cirugia`, `no_hoja`, `no_exp`) VALUES
('Eduardo Marcelo Gutierrez Soto', 'Extraccion de Vesicula', 'Edgar', 'Carlos', 'Carla', 'SI', 'Ninguna', '', 'n/a', 'n/a', '14:06:00', '2021-09-30', '25', 'M', '14:05:00', '14:05:00', '14:05:00', 0, 10),
('Eduardo Marcelo Gutierrez Soto', 'Extraccion de Vesicula', 'Edgar', 'Carlos', 'Carla', 'SI', 'Ninguna', '', 'n/a', 'n/a', '14:06:00', '2021-09-30', '25', 'Masculino', '14:05:00', '14:05:00', '14:05:00', 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_medica_postoperatoria`
--

CREATE TABLE `hoja_medica_postoperatoria` (
  `no_hoja` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `no_exp` int(30) NOT NULL,
  `diagnostico_preoperatorio` varchar(300) NOT NULL,
  `diagnostico_postoperatorio` varchar(300) NOT NULL,
  `quirofano` varchar(300) NOT NULL,
  `cirujano` varchar(300) NOT NULL,
  `anestesiologo` varchar(300) NOT NULL,
  `tipo_anestesia` varchar(300) NOT NULL,
  `ayudante1` varchar(300) NOT NULL,
  `instrumentista` varchar(300) NOT NULL,
  `circulante` varchar(300) NOT NULL,
  `descripcion_cirugia` varchar(1000) NOT NULL,
  `QX_si` varchar(300) NOT NULL,
  `QX_no` varchar(300) NOT NULL,
  `comentarios` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_medica_postoperatoria`
--

INSERT INTO `hoja_medica_postoperatoria` (`no_hoja`, `fecha`, `no_exp`, `diagnostico_preoperatorio`, `diagnostico_postoperatorio`, `quirofano`, `cirujano`, `anestesiologo`, `tipo_anestesia`, `ayudante1`, `instrumentista`, `circulante`, `descripcion_cirugia`, `QX_si`, `QX_no`, `comentarios`) VALUES
(1, '2021-10-01', 10, 'cirugia de ojo', 'cirugia de ojo izquierdo', '', '', '', '', '', '', '', 'Se pasa paciente a quirofano, se realiza asepsia y antisepcia, bajo bloqueo espinal, se incide de manera oblicua entre pubis y cresta iliaca anterosuperior, se diseca tejido celular subcutaneo, se identifica saco herniario, se abre aponeurosis anterior en sentido de las fibras, abre cremaster, se diseca saco herniario de elementos del cordon, se identifica defecto herniario de anillo inguinal profundi de 2cm, se reduse saco herniario, se retira lipoma de cordon y quiste testicular de 1cm, se coloca malla de polipropeno fijandose a ligamento de cooper, ligamenro inguinal con puntos continuos con prolene 3-2, a temdpm cpmkimtp cpm ímtps separados y se cierra aponeurosis con vycril de 1. se verifica hemostasia y se cierra TCS con vycril 3-0, piel con nylon 2-0 subdermico', 'X', '', 'HERNIA INGUINAL IZQUIERDA CON SACO HERNIARIO CON CONTENIDO DE EPIPLON, SE COLOCA MALLA CON TECNICA TIPO LICHTENSTEIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_valoracion`
--

CREATE TABLE `hoja_valoracion` (
  `no_hoja` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL,
  `hora_recu` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoja_valoracion`
--

INSERT INTO `hoja_valoracion` (`no_hoja`, `no_exp`, `hora_recu`) VALUES
(1, 10, '12:30:00');

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
  `indicaciones` varchar(600) NOT NULL,
  `no_indicacion` int(30) NOT NULL,
  `no_exp` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_indicaciones_medicas`
--

INSERT INTO `nota_indicaciones_medicas` (`indicaciones`, `no_indicacion`, `no_exp`, `fecha`) VALUES
('1. DIETA LIQUIDA Y PROGRESAR A NORMAL.\n\n2. SOLUCION HARTMAN 500 CC IV CADA 12 HORAS.\n\n3. MEDICAMENTOS\n   OMEPRAZOL 40 MG IV CADA 24 HORAS \n   KETEROLACO 30 MG IV CADA 8 HORAS.\n\n4. MEDIDAS GENERALES\n   SVPT Y CGE\n   VIGILAR SANGRADO HERIDA QX\n   ALTA AL RECUPERAR DE LA ANESTESIA.', 1, 10, '2021-10-04 17:19:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_preoperatoria`
--

CREATE TABLE `nota_preoperatoria` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `diagnostico` varchar(900) NOT NULL,
  `plan_terapeutico` varchar(900) NOT NULL,
  `pronostico` varchar(900) NOT NULL,
  `cirugia_programada` varchar(900) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(30) NOT NULL,
  `usuario` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_preoperatoria`
--

INSERT INTO `nota_preoperatoria` (`fecha`, `hora`, `diagnostico`, `plan_terapeutico`, `pronostico`, `cirugia_programada`, `no_nota`, `no_exp`, `usuario`) VALUES
('2021-09-30', '14:34:53', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\nindustry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and\r\nscrambled it to make a type specimen book. It has survived not only five centuries, but also th', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\nindustry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and\r\nscrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into\r\nelectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of\r\nLetraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like\r\nAldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\r\nindustry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and\r\nscrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into\r\nelectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of\r\nLetraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like\r\nAldus PageMaker including versions of Lorem Ipsum.', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\nindustry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and\nscrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into\nelectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of\nLetraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like\nAldus PageMaker including versions of Lorem Ipsum. ', 1, 10, 'Dr. Juan Ramon Rodriguez Bravo');

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
  `no_exp` int(30) NOT NULL,
  `usuario` varchar(300) NOT NULL,
  `medicamento_2` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_preparacion`
--

INSERT INTO `nota_preparacion` (`temp`, `fc`, `fr`, `t/a`, `dxtx`, `solucion`, `ayuno`, `cx`, `alergias`, `toxico`, `transf`, `enfermedad_cronica`, `protesis`, `medicamento`, `no_nota`, `no_exp`, `usuario`, `medicamento_2`) VALUES
('32.5', '180', '55', '65', '54', 'Solucion intravenosa', 'SI', '15', 'no', 'no', 'no', 'si', 'no', 'ibuprofeno', 1, 10, 'Eduardo Marcelo Gutierrez', 'keterolako');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_quirofano`
--

CREATE TABLE `nota_quirofano` (
  `cirujano` varchar(300) NOT NULL,
  `anestesiologo` varchar(300) NOT NULL,
  `diagnostico` varchar(300) NOT NULL,
  `diuresis1` varchar(300) NOT NULL,
  `diuresis2` varchar(300) NOT NULL,
  `diuresis3` varchar(300) NOT NULL,
  `diuresis4` varchar(300) NOT NULL,
  `enfermera_qca` varchar(300) NOT NULL,
  `gasa_si` varchar(300) NOT NULL,
  `gasa_no` varchar(300) NOT NULL,
  `hora_ingreso` time NOT NULL,
  `inicio` time NOT NULL,
  `med1` varchar(300) NOT NULL,
  `med2` varchar(300) NOT NULL,
  `med3` varchar(300) NOT NULL,
  `med4` varchar(300) NOT NULL,
  `termina` time NOT NULL,
  `egresa` time NOT NULL,
  `ayudante` varchar(300) NOT NULL,
  `tipo_anestesia` varchar(300) NOT NULL,
  `usuario` varchar(300) NOT NULL,
  `cx_realizada` varchar(300) NOT NULL,
  `circulante` varchar(300) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `otros_no` varchar(300) NOT NULL,
  `otros_si` varchar(300) NOT NULL,
  `reporte_enfermeria` varchar(900) NOT NULL,
  `sangrado1` varchar(300) NOT NULL,
  `sangrado2` varchar(300) NOT NULL,
  `sangrado3` varchar(300) NOT NULL,
  `sangrado4` varchar(300) NOT NULL,
  `solucion1` varchar(300) NOT NULL,
  `solucion2` varchar(300) NOT NULL,
  `solucion3` varchar(300) NOT NULL,
  `solucion4` varchar(300) NOT NULL,
  `no_exp` int(30) NOT NULL,
  `compresas_si` varchar(300) NOT NULL,
  `compresas_no` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_quirofano`
--

INSERT INTO `nota_quirofano` (`cirujano`, `anestesiologo`, `diagnostico`, `diuresis1`, `diuresis2`, `diuresis3`, `diuresis4`, `enfermera_qca`, `gasa_si`, `gasa_no`, `hora_ingreso`, `inicio`, `med1`, `med2`, `med3`, `med4`, `termina`, `egresa`, `ayudante`, `tipo_anestesia`, `usuario`, `cx_realizada`, `circulante`, `no_nota`, `otros_no`, `otros_si`, `reporte_enfermeria`, `sangrado1`, `sangrado2`, `sangrado3`, `sangrado4`, `solucion1`, `solucion2`, `solucion3`, `solucion4`, `no_exp`, `compresas_si`, `compresas_no`) VALUES
('Edgar Sandoval', 'Ana Maria Escarraga', 'Trauma', '120', '159', '555', '456', 'Esther Gomez', 'X', '', '11:07:16', '19:07:16', 'ibuprofeno', 'paracetamol', 'keterolaco', 'paracetamol 500', '19:07:16', '19:07:16', 'Oscar Gonzalez', 'Local', 'enfermeria', 'Extraccion de Higado', 'Juan Ramon', 1, 'X', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the\nindustry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and\nscrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into\nelectronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of\nLetraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like\nAldus PageMaker including versions of Lorem Ipsum.', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 10, '', '');

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
  `sangrado1` varchar(300) NOT NULL,
  `diuresis1` varchar(300) NOT NULL,
  `diuresis2` varchar(300) NOT NULL,
  `diuresis3` varchar(300) NOT NULL,
  `emesis1` varchar(300) NOT NULL,
  `emesis2` varchar(300) NOT NULL,
  `emesis3` varchar(300) NOT NULL,
  `fc1` varchar(300) NOT NULL,
  `fc2` varchar(300) NOT NULL,
  `fc3` varchar(300) NOT NULL,
  `fc4` varchar(300) NOT NULL,
  `fc5` varchar(300) NOT NULL,
  `fc6` varchar(300) NOT NULL,
  `fr1` varchar(300) NOT NULL,
  `fr2` varchar(300) NOT NULL,
  `fr3` varchar(300) NOT NULL,
  `fr4` varchar(300) NOT NULL,
  `fr5` varchar(300) NOT NULL,
  `fr6` varchar(300) NOT NULL,
  `hr1` varchar(300) NOT NULL,
  `hr2` varchar(300) NOT NULL,
  `hr3` varchar(300) NOT NULL,
  `hr4` varchar(300) NOT NULL,
  `hr5` varchar(300) NOT NULL,
  `hr6` varchar(300) NOT NULL,
  `med1` varchar(300) NOT NULL,
  `med2` varchar(300) NOT NULL,
  `med3` varchar(300) NOT NULL,
  `med4` varchar(300) NOT NULL,
  `med5` varchar(300) NOT NULL,
  `med6` varchar(300) NOT NULL,
  `emesis` varchar(300) NOT NULL,
  `no_exp` int(30) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `sangrado2` varchar(300) NOT NULL,
  `sangrado3` varchar(300) NOT NULL,
  `sat1` varchar(300) NOT NULL,
  `sat2` varchar(300) NOT NULL,
  `sat3` varchar(300) NOT NULL,
  `sat4` varchar(300) NOT NULL,
  `sat5` varchar(300) NOT NULL,
  `sat6` varchar(300) NOT NULL,
  `t2` varchar(300) NOT NULL,
  `t1` varchar(300) NOT NULL,
  `ta1` varchar(30) NOT NULL,
  `ta2` varchar(30) NOT NULL,
  `ta3` varchar(30) NOT NULL,
  `t3` varchar(30) NOT NULL,
  `ta4` varchar(30) NOT NULL,
  `t4` varchar(30) NOT NULL,
  `ta5` varchar(30) NOT NULL,
  `t5` varchar(30) NOT NULL,
  `ta6` varchar(30) NOT NULL,
  `t6` varchar(30) NOT NULL,
  `usuario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_recuperacion`
--

INSERT INTO `nota_recuperacion` (`hora`, `ta`, `fr`, `fc`, `T`, `SAT,02`, `medicamentos`, `reporte_recuperacion`, `sangrado1`, `diuresis1`, `diuresis2`, `diuresis3`, `emesis1`, `emesis2`, `emesis3`, `fc1`, `fc2`, `fc3`, `fc4`, `fc5`, `fc6`, `fr1`, `fr2`, `fr3`, `fr4`, `fr5`, `fr6`, `hr1`, `hr2`, `hr3`, `hr4`, `hr5`, `hr6`, `med1`, `med2`, `med3`, `med4`, `med5`, `med6`, `emesis`, `no_exp`, `no_nota`, `sangrado2`, `sangrado3`, `sat1`, `sat2`, `sat3`, `sat4`, `sat5`, `sat6`, `t2`, `t1`, `ta1`, `ta2`, `ta3`, `t3`, `ta4`, `t4`, `ta5`, `t5`, `ta6`, `t6`, `usuario`) VALUES
('12:58:00', '115', '52', '32', '25', '22', 'ibuprofeno', 'asdasdasdsadsdfadfgsadfgsdafvdsfavasdvfasidjlvhadilofhvaedoiaofaffhlakdjfhalkdjfhalewrfhlaiefiwuefbpoawiefbaoweifbawoliefbowefibowieufouifqwpeiufpwiefupiweufhpqwifh', 'si', 'si', 'si', 'si', 'si', 'si', 'si', '115', '112', '111', '110', '99', '98', '935', '45', '45', '64', '456', '65', '456', '665', '656', '458', '55', '55', '66', '54', '45', '65', '45', '654', '45', 10, 2, 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', '', '', '', '', '', '', '', '', '', '', '');

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
  `reporte_enfermeria_1` varchar(600) NOT NULL,
  `sangrado1` varchar(300) NOT NULL,
  `sangrado2` varchar(300) NOT NULL,
  `sangrado3` varchar(300) NOT NULL,
  `sat1` varchar(300) NOT NULL,
  `sat2` varchar(300) NOT NULL,
  `sat3` varchar(300) NOT NULL,
  `sat4` varchar(300) NOT NULL,
  `sat5` varchar(300) NOT NULL,
  `sat6` varchar(300) NOT NULL,
  `sangrado` varchar(300) NOT NULL,
  `diuresis` varchar(300) NOT NULL,
  `diuresis1` varchar(300) NOT NULL,
  `diuresis2` varchar(300) NOT NULL,
  `diuresis3` varchar(300) NOT NULL,
  `emesis1` varchar(300) NOT NULL,
  `emesis2` varchar(300) NOT NULL,
  `emesis3` varchar(300) NOT NULL,
  `fc1` varchar(300) NOT NULL,
  `fc2` varchar(300) NOT NULL,
  `fc3` varchar(300) NOT NULL,
  `fc4` varchar(300) NOT NULL,
  `fc5` varchar(300) NOT NULL,
  `fc6` varchar(300) NOT NULL,
  `fr1` varchar(300) NOT NULL,
  `fr2` varchar(300) NOT NULL,
  `fr3` varchar(300) NOT NULL,
  `fr4` varchar(300) NOT NULL,
  `fr5` varchar(300) NOT NULL,
  `fr6` varchar(300) NOT NULL,
  `hr1` varchar(300) NOT NULL,
  `hr2` varchar(300) NOT NULL,
  `hr3` varchar(300) NOT NULL,
  `hr4` varchar(300) NOT NULL,
  `hr5` varchar(300) NOT NULL,
  `hr6` varchar(300) NOT NULL,
  `med1` varchar(300) NOT NULL,
  `med2` varchar(300) NOT NULL,
  `med3` varchar(300) NOT NULL,
  `med4` varchar(300) NOT NULL,
  `med5` varchar(300) NOT NULL,
  `med6` varchar(300) NOT NULL,
  `emesis` varchar(300) NOT NULL,
  `no_nota` int(30) NOT NULL,
  `no_exp` int(11) NOT NULL,
  `ta1` varchar(300) NOT NULL,
  `t1` varchar(30) NOT NULL,
  `ta2` varchar(30) NOT NULL,
  `t2` varchar(30) NOT NULL,
  `ta3` varchar(30) NOT NULL,
  `t3` varchar(30) NOT NULL,
  `ta4` varchar(30) NOT NULL,
  `t4` varchar(30) NOT NULL,
  `ta5` varchar(30) NOT NULL,
  `t5` varchar(30) NOT NULL,
  `ta6` varchar(30) NOT NULL,
  `t6` varchar(30) NOT NULL,
  `usuario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_recuperacion_inmediata`
--

INSERT INTO `nota_recuperacion_inmediata` (`hora`, `t/a`, `fr`, `fc`, `T`, `SAT,02`, `medicamentos`, `reporte_enfermeria_1`, `sangrado1`, `sangrado2`, `sangrado3`, `sat1`, `sat2`, `sat3`, `sat4`, `sat5`, `sat6`, `sangrado`, `diuresis`, `diuresis1`, `diuresis2`, `diuresis3`, `emesis1`, `emesis2`, `emesis3`, `fc1`, `fc2`, `fc3`, `fc4`, `fc5`, `fc6`, `fr1`, `fr2`, `fr3`, `fr4`, `fr5`, `fr6`, `hr1`, `hr2`, `hr3`, `hr4`, `hr5`, `hr6`, `med1`, `med2`, `med3`, `med4`, `med5`, `med6`, `emesis`, `no_nota`, `no_exp`, `ta1`, `t1`, `ta2`, `t2`, `ta3`, `t3`, `ta4`, `t4`, `ta5`, `t5`, `ta6`, `t6`, `usuario`) VALUES
('70:47:27', '535', '5353', '53', '8', '788', '65', 'saaaaaaaaaaaaaaaaaaaaaaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 1, 10, '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_traslado`
--

CREATE TABLE `nota_traslado` (
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `unidad_receptora` varchar(300) NOT NULL,
  `unidad_envia` varchar(300) NOT NULL,
  `resumen_clinico` varchar(900) NOT NULL,
  `no_traslado` int(11) NOT NULL,
  `no_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota_traslado`
--

INSERT INTO `nota_traslado` (`fecha`, `hora`, `unidad_receptora`, `unidad_envia`, `resumen_clinico`, `no_traslado`, `no_exp`) VALUES
('2021-09-01', '10:06:15', 'CAAPS RUIZ Y 14', 'UNIDAD DE ESPECIALIDADES MEDICAS DE BAJA CALIFORNIA, ENSENADA', 'Motivo de envio:\nPACIENTE POSTOPERADA DE COLECISTECTOMIA LAPAROSCOPICA PARKLAND 5, HEMOSTASIA DIFICIL,SE DEJA DRENAJE PENROSE, SE ENVIA PARA RECUPERACION DEL POSTOPERATORIO.\n\nDr. ODON BURGADA ECHEVERRIA\nCED 393834.\n\nDr. Nelson Armando Saavedra Estrada\nCED 10948804\n\nNOMBRE: CHAVEZ NIEBLA MIGDALIA\nSEXO: FEMENINO\nEDAD: 40 AÑOS\n\nPO COLECISTECTOMIA LAPAROSCOPICA\n\nINDICACIONES POSTQUIRURGICAS\n\n1. Ayuno, indicar dieta liquida al recuperarse de anestesia y progresar\n2. Solucion Hartmann 500 ml para 6 horas obturar al termino.\n3. Cefalexona 1gr IV cada 12 horas (0)\n   Keterolaco 30mg IV cada 8 horas\n   Metamizol 1gr IV cada 8horas\n4. CGE y SVPT\n   -Cuidados de herida quirurgica\n   -POsicion semifower\n   -Cuantificar gasto del drenaje cada 8 horas\n5. ALTA MAÑANA DESPUES DEL DESAYUNO\nDr. ODON BURGADA ECHEVERRIA\nC.P. 393834\n\nDr. MANUEL A LOPEZ CORRALES\nCED 10949314\n     \n\n\n\n\n', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `num_paciente` int(11) NOT NULL,
  `exp_procedencia` int(11) NOT NULL,
  `nombre_p` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date NOT NULL DEFAULT current_timestamp(),
  `direccion_p` varchar(100) NOT NULL,
  `telefono_p` varchar(11) NOT NULL,
  `poblacion` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `procedencia` varchar(10) NOT NULL,
  `num_afiliacion` int(11) NOT NULL,
  `nombre_a` varchar(50) NOT NULL,
  `tutor` varchar(300) NOT NULL,
  `parentesco` varchar(20) NOT NULL,
  `telefono_a` varchar(11) NOT NULL,
  `direccion_a` varchar(100) NOT NULL,
  `medico_esp` varchar(50) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `anestesiologo` varchar(50) NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `procedimiento` varchar(300) NOT NULL,
  `status` int(10) NOT NULL,
  `motivo_cancelacion` varchar(300) DEFAULT NULL,
  `CURP` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`num_paciente`, `exp_procedencia`, `nombre_p`, `fecha_nacimiento`, `fecha_ingreso`, `direccion_p`, `telefono_p`, `poblacion`, `estado`, `edad`, `sexo`, `procedencia`, `num_afiliacion`, `nombre_a`, `tutor`, `parentesco`, `telefono_a`, `direccion_a`, `medico_esp`, `especialidad`, `anestesiologo`, `diagnostico`, `procedimiento`, `status`, `motivo_cancelacion`, `CURP`) VALUES
(10, 10, 'Eduardo Marcelo Gutierrez Soto', '1995-06-28', '2021-09-30', 'Chicomostoc 891, colonia aztlan, Rosarityo baja california', '661-110-411', 'Rosarito', 'Baja California', 25, 'Masculino', 'PRIVADO', 1234657, 'Guillermo Eugenio Gutierrez Soto', '', 'Hernamo', '664-336-323', 'Chicomostoc 891, Aztlan Rosarito Baja California', 'Altamirano Gonzalez', 'Cirujano', 'Gutierrez Gonzalez', 'Operacion de Riñon Izq', 'Cirugia', 3, 'hklasdoaksdn', 'GUSE950628HY5'),
(11, 13, 'Gustavo Toribio Flores', '2021-08-30', '2021-09-30', 'Chicomostoc 891, colonia aztlan, Rosarityo baja california', '664-111-101', 'Rosarito', 'Baja California', 30, 'Masculino', 'IMSS', 1, 'Navarro Gerardo', '', 'Hernamo', '664-336-323', 'Zona Centro', 'Altamirano Gonzalez', 'Cirujano', 'Gutierrez Gonzalez', 'Operacion de Cornea', 'Cirugia', 3, NULL, ''),
(10008, 20, 'Juan Ramon Rodriguez Bravo', '1985-06-04', '2021-11-04', 'Chicomostoc 891, colonia aztlan, Rosarityo baja california', '664-490-098', 'Rosarito', 'Baja California', 30, 'Masculino', 'PRIVADO', 1, 'Guillermo Eugenio Gutierrez Soto', '', 'Hernamo', '664-493-012', 'Calle 2da', 'Dr. Juan Antonio', 'Cirujano ', 'safsdfsd', 'Cataratas', 'Extraccion extracapsular de catarata', 0, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos_quirurgico`
--

CREATE TABLE `procedimientos_quirurgico` (
  `id` int(11) NOT NULL,
  `codigo_cirugia` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procedimientos_quirurgico`
--

INSERT INTO `procedimientos_quirurgico` (`id`, `codigo_cirugia`, `descripcion`) VALUES
(1, 'GRD-1', 'AMPUTACION DE MIEMBRO INFERIOR SECUNDARIA A PIE DIABETICO'),
(2, 'GRD-3', 'ARTROPLASTIA DE RODILLA (INCLUYE CIRUGIA ARTROSCOPICA)'),
(3, 'GRD-10', 'REDUCCION QUIRURGICA DE FRACTURA DE CLAVICULA'),
(4, 'GRD-11', 'REDUCCION QUIRURGICA DE FRACTURA DE HUMERO (INCLUYE MATERIAL DE OSTEOSINTESIS)'),
(5, 'GRD-12', 'REDUCCION QUIRURGICA DE FRACTURA DE MANO'),
(6, 'GRD-13', 'REDUCCION QUIRURGICA DE FRACTURA DE TIBIA Y PERONE (INCLUYE MATERIAL DE OSTEOSINTESIS)'),
(7, 'GRD-14', 'REDUCCION QUIRURGICA DE FRACTURA DE TOBILLO Y PIE'),
(8, 'GRD-16', 'REDUCCION QUIRURGICA POR LUXACIONES'),
(9, 'GRD-17', 'REDUCCION QUIRURGICA DE FRACTURA DE CUBITO Y RADIO (INCLUYE MATERIAL DE OSTEOSINTESIS)'),
(10, 'GRD-24', 'AMIGDALECTOMIA CON O SIN ADENOIDECTOMIA'),
(11, 'GRD-25', 'PALATOPLASTIA'),
(12, 'GRD-26', 'REPARACION DE LABIO HENDIDO'),
(13, 'GRD-42', 'FACOEMULSIFICACION Y ASPIRACION DE CATARATA'),
(14, 'GRD-51', 'CIRUGIA DE ACORTAMIENTO MUSCULAR PARA ESTRABISMO'),
(15, 'GRD-52', 'CIRUGIA DE ALARGAMIENTO MUSCULAR PARA ESTRABISMO'),
(16, 'GRD-53', 'EXCISION DE PTERIGION'),
(17, 'GRD-55', 'TRATAMIENTO QUIRURGICO DE CONDILOMAS'),
(18, 'GRD-171', 'APENDICECTOMIA'),
(19, 'GRD-172', 'COLECISTECTOMIA ABIERTA'),
(20, 'GRD-173', 'COLECISTECTOMIA LAPAROSCOPICA'),
(21, 'GRD-175', 'HEMORROIDECTOMIA'),
(22, 'GRD-176', 'HERNIOPLASTIA CRURAL'),
(23, 'GRD-177', 'HERNIOPLASTIA INGUINAL'),
(24, 'GRD-178', 'HERNIOPLASTIA UMBILICAL'),
(25, 'GRD-179', 'HERNIOPLASTIA VENTRAL'),
(26, 'GRD-182', 'LIGADURA DE VARICES ESOFAGICAS'),
(27, 'GRD-185', 'TRATAMIENTO QUIRURGICO DE FISTULA Y FISURA ANAL'),
(28, 'GRD-186', 'TRATAMIENTO QUIRURGICO DE HERNIA HIATAL'),
(29, 'GRD-204', 'SALPINGOCLASIA (METODOS DEFINITIVOS DE PLANIFICACION FAMILIAR)'),
(30, 'GRD-205', 'TRATAMIENTO QUIRURGICO DE QUISTES DE OVARIO'),
(31, 'GRD-206', 'CIRCUNCISION'),
(32, 'GRD-207', 'EXCISION LOCAL O DESTRUCCION DE LESION DE PENE'),
(33, 'GRD-208', 'EXTIRPACION DE AMBOS TESTICULOS EN EL MISMO EPISODIO OPERATORIO'),
(34, 'GRD-209', 'EXTIRPACION DE TESTICULO RESTANTE'),
(35, 'GRD-210', 'ORQUIDOPEXIA'),
(36, 'GRD-215', 'RESECCION TRANSURETRAL DE PROSTATA'),
(37, 'GRD-229', 'CIERRE DE OTRA FISTULA DE URETRA'),
(38, 'GRD-249', 'NEFROSTOMIA PERCUTANEA CON FRAGMENTACION'),
(39, 'GRD-250', 'NEFROSTOMIA PERCUTANEA SIN FRAGMENTACION'),
(40, 'GRD-253', 'OPERACION SUPRAPUBICA DE SUSPENSION (SLING)'),
(41, 'GRD-256', 'OTRA CISTOSTOMIA SUPRAPUBICA'),
(42, 'GRD-257', 'OTRA EXCISION O DESTRUCCION TRANSURETRAL DE LESION O TEJIDO VESICAL'),
(43, 'GRD-258', 'OTRA OPERACION SOBRE URETRA Y TEJIDO PERIURETRAL'),
(44, 'GRD-259', 'OTRA OPERACION SOBRE VEJIGA'),
(45, 'GRD-271', 'REPARACION DE HIPOSPADIAS O EPISPADIAS'),
(46, 'GRD-274', 'SUSPENSION URETRAL RETROPUBICA'),
(47, 'GRD-279', 'URETEROTOMIA'),
(48, 'GRD-280', 'URETROTOMIA'),
(49, 'GRD-282', 'CIRUGIA MENOR DENTRO DE QUIROFANO'),
(50, 'GRD-296', 'DIAGNOSTICO Y TRATAMIENTO DE LA LITIASIS DE VIAS URINARIAS INFERIORES'),
(51, 'GRD-297', 'DIAGNOSTICO Y TRATAMIENTO DE LA LITIASIS RENAL Y URETERAL'),
(52, 'GRD-321', 'EXTIRPACION DE TUMORES BENIGNOS DE TEJIDOS BLANDOS'),
(53, 'GRD-324', 'LAPAROSCOPIA POR ENDOMETRIOSIS'),
(54, 'GRD-325', 'LIPOMAS'),
(55, 'GRD-330', 'SAFENECTOMIA'),
(56, 'GRD-331', 'TRATAMIENTO QUIRURGICO DE FIBROADENOMA MAMARIO'),
(57, 'GRD-333', 'TRATAMIENTO DE QUISTE SINOVIAL'),
(58, 'GRD-339', 'TRATAMIENTO QUIRURGICO DEL ABSCESO RECTAL'),
(59, 'GRD-340', 'TRATAMIENTO QUIRURGICO DEL PIE EQUINO EN NINOS'),
(60, 'OE-24', 'VASECTOMIA (METODOS DEFINITIVOS DE PLANIFICACION FAMILIAR)'),
(61, 'OE-25', 'EXCISION O RESECCION DE LESION O TEJIDO DE LARINGE'),
(62, 'CDT-7', 'URETEROSCOPIA TERAPEUTICA'),
(63, 'CDT-9', 'URETROSCOPIA PERINEAL TERAPEUTICA'),
(64, 'EDT-1', 'PANENDOSCOPIA'),
(65, 'EDT-2', 'COLONOSCOPIA'),
(66, 'EDT-3', 'COLANGIOGRAFIA RETROGRADA ENDOSCOPICA [CRE]'),
(67, 'EDT-4', 'BIOPSIA CERRADA [ENDOSCOPICA] DEL INTESTINO GRUESO'),
(68, 'EDT-6', 'ESOFAGOGASTRODUODENOSCOPIA [EGD] CON BIOPSIA CERRADA'),
(69, 'OE-42', 'TARIFA POR HORA DE USO DE QUIROFANO (INCLUYE: ENFERMERA CIRCULANTE, INSTRUMENTAL QUIRURGICO, USO DE MAQUINA DE ANESTESIA, MONITOR DE SIGNOS VITALES. NO INCLUYE INSUMOS, CONSUMIBLES MEDICOS, NI PERSONAL).'),
(70, '1', 'ESFINTEROTOMIA, EXTRACCION DE LITO, DILATACION, COLOCACION DE ENDOPROTESIS Y BIOPSIA (RELACIONADO CON CPRE)'),
(71, '2', 'PROCEDIMIENTOS MENORES DENTRO DE QUIROFANO SIN INSUMOS'),
(72, '11', 'DILATACION ESOFAGICA HIDRONEUMATICA  1-3 SESIONES'),
(73, '12', 'ESCLEROTERAPIA GASTRICA CON HISTOACRIL'),
(74, '13', 'ESCICION DE VARICOCELE/HIDROCELE DE CORDON ESPERMATICO'),
(75, '14', 'FRACTURA SUPRACONDILEA EN NINOS'),
(76, '15', 'LIBERACION QUIRURGICA DE POLEA DEL  LA MANO (DEDO GATILLO)'),
(77, '16', 'LIBERACION QUIRURGICA DEL NERVIO MEDIANO'),
(78, '17', 'LIBERACION QUIRURGICA DEL PRIMER COMPARTIMENTO DORSAL DEL CARPO (QUERVAIN)'),
(79, '18', 'ACROMIOPLASTIA Y REVISION Y/O CORRECCION DEL MANGO ROTADOR'),
(80, '19', 'USO DE SALA DE PREPACION /RECUPERACION POR PACIENTE (CUIDADOS Y PROCEDIMIENTOS DE ENFERMERIA)'),
(81, 'CG-1', 'Circuncision'),
(82, 'CG-2', 'ColecistectomIa laparoscopica'),
(83, 'CG-3', 'Extirpacion de lesion de piel y tejido celular subcutaneo extraquirofano'),
(84, 'CG-4', 'Extirpacion de lesion de piel y tejido celular subcutaneo en quirofano'),
(85, 'CG-5', 'HidrocelectomIa'),
(86, 'CG-6', 'Reparacion de hernia inguinal con  malla'),
(87, 'CG-7', 'Reparacion de hernia inguinal o umbilical'),
(88, 'CG-8', 'Reparacion laparoscopica de hernia hiatal (NISSEN-LAP)'),
(89, 'CG-9', 'ColangiografIa endoscopica CPRE (incluye fluoroscopia)'),
(90, 'PR-1', 'Extirpacion de hemorroides'),
(91, 'PR-2', 'FisurectomIa anal'),
(92, 'PR-3', 'Condilomatosis'),
(93, 'CP-1', 'Circuncision'),
(94, 'CP-2', 'Extirpacion de quiste tirogloso'),
(95, 'CP-3', 'FrenilectomIa lingual'),
(96, 'CP-4', 'HidrocelectomIa'),
(97, 'CP-5', 'Orquidopexia'),
(98, 'CP-6', 'PiloromiotomIa'),
(99, 'CP-7', 'PrepucioplastIa'),
(100, 'CP-8', 'Reparacion de hernia inguinal o umbilical'),
(101, 'CP-9', 'Reseccion fIstula preauricular'),
(102, 'G-1', 'Extirpacion o biopsia de lesion de mama con anestesia general'),
(103, 'G-2', 'Extirpacion o biopsia de lesion de mama con anestesia local'),
(104, 'G-3', 'LaparoscopIa ginecologica(Histerectomia laparoscopica)'),
(105, 'G-4', 'LaparotomIa ginecologica(histerectomia abierta)'),
(106, 'G-5', 'Legrado uterino'),
(107, 'G-6', 'Salpingoclasia'),
(108, 'G-7', 'Quiste de ovario'),
(109, 'OF-1', 'Correccion de estrabismo'),
(110, 'OF-2', 'Excision de chalazion con microscopio'),
(111, 'OF-3', 'Excision de pterigion con microscopio'),
(112, 'OF-4', 'Extraccion de catarata con facoemulsificador'),
(113, 'OF-5', 'Extraccion extracapsular de catarata'),
(114, 'ON-1', 'CuadrantectomIa'),
(115, 'ON-2', 'MastectomIa simple'),
(116, 'OD-1', 'Extraccion de tercer molar'),
(117, 'OD-2', 'Rehabilitacion oral con anestesia general'),
(118, 'OR-1', 'ArtroscopIa de rodilla'),
(119, 'OR-2', 'Reduccion abierta de fractura de metacarpianos'),
(120, 'OR-3', 'Reduccion abierta de fractura de radio y cUbito, no incluye material osteos.'),
(121, 'OR-4', 'Reduccion abierta de fractura de tobillo y pie, no incluye material osteos.'),
(122, 'OR-5', 'Reduccion abierta de fractura de tibia y perone, no incluye material osteosintesis'),
(123, 'OR-6', 'Reduccion abierta de fractura de humero (no incluye material osteosintesis)'),
(124, 'OR-7', 'Reduccion abierta de fractura femur (no incluye material de osteosintesis'),
(125, 'OR-8', 'Reduccion cerrada de fractura '),
(126, 'OR-9', 'SinovectomIa de muNeca'),
(127, 'OR-10', 'SinovectomIa de rodilla'),
(128, 'OT-1', 'AmigdalectomIa con  o sin adenoidectomIa'),
(129, 'OT-2', 'AmigdalectomIa con implante de tubos de ventilacion en el tImpano'),
(170, 'OT-3', 'CirugIa endoscopica de nariz y senos paranasales'),
(171, 'OT-4', 'Extraccion de cuerpo extrano en oIdo o nariz'),
(172, 'OT-5', 'Implante de tubos de ventilacion'),
(173, 'OT-6', 'LaringoscopIa directa'),
(174, 'OT-7', 'RinoseptoplastIa'),
(175, 'OT-8', 'SeptumplastIa'),
(176, 'OT-9', 'TimpanomastoidectomIa'),
(177, 'RA-1', 'Renta de  brazo en C (no incluy honorarios tEcnico)'),
(178, 'CA-1', 'Implante de marcapaso cardiaco'),
(179, 'EN-1', 'ColonoscopIa'),
(180, 'EN-2', 'PanendoscopIa alta'),
(181, 'UR-1', 'Cateterismo ureteral'),
(182, 'UR-2', 'CistoscopIa'),
(183, 'UR-3', 'Litotripcia endoscopica'),
(184, 'UR-4', 'VasectomIa'),
(185, 'CPL-1', 'BlefaroplastIa con anestesia local'),
(186, 'CPL-2', 'Implantes mamarios'),
(187, 'CPL-3', 'Liposuccion'),
(188, 'CPL-4', 'RinoplastIa'),
(189, 'CPL-5', 'Reparacion de labio y paladar hendido'),
(190, 'CV-1', 'Safenectomia'),
(191, 'NE-1', 'DiscectomIa con implante de cajita'),
(192, 'NE-2', 'DiscectomIa  '),
(193, 'NE-3', 'Artrodesis con tronillos '),
(194, 'NE-4', 'Nucleolisis');

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
(12, '2021-05-04'),
(13, '2021-09-30'),
(14, '2021-09-30'),
(15, '2021-09-30'),
(16, '2021-09-30'),
(17, '2021-09-30'),
(18, '2021-11-04'),
(19, '2021-11-04'),
(20, '2021-11-04');

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
  `ID` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `escuela_estudios` varchar(50) NOT NULL,
  `profesion` varchar(300) NOT NULL,
  `cedula` int(15) NOT NULL,
  `especialidad` varchar(500) NOT NULL,
  `cedula_especialidad` varchar(300) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `nombre_completo`, `contrasena`, `escuela_estudios`, `profesion`, `cedula`, `especialidad`, `cedula_especialidad`, `tipo`) VALUES
(2, 'hong', 'Haolin', '81dc9bdb52d04dc20036dbd8313ed055', 'UABC', 'Ingeniero', 1234567, 'ninguna', 'N/A', 'Administrativo'),
(6, 'enola', 'Enola Carely', '81dc9bdb52d04dc20036dbd8313ed055', 'uabc', 'Ingeniero', 999999, 'ninguna', 'N/A', 'Enfermero'),
(10, 'arlopez', 'Alejandra Rios Lopez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 7895807, 'Anestesiologia', '10922461', 'Anestesiologo'),
(11, 'asigler', 'Alicia Sigler', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 1618155, 'Cirugia Plastica', 'No Disponible', 'Medico'),
(12, 'fhumberto', 'Felipe Humberto Villegas Ramirez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 752685, 'Cirugia General', '3181607', 'Medico'),
(13, 'fguzman', 'Filiberto Guzman Ornelas', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 1772792, 'Medico Cirujano', 'No Disponible', 'Medico'),
(14, 'gantonio', 'Guillermo Antonio Ruiz Espinoza', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4887835, 'Urologo', '8284840', 'Medico'),
(15, 'hvillegas', 'Humberto Villegas Cato', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 9424448, 'Traumatologia', '12357057', 'Medico'),
(16, 'jantonio', 'Jose Antonio Monarrez Cardenas', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 1647083, 'Traumatologia', 'AE-10497', 'Medico'),
(17, 'jaduardo', 'Jose Aduardo Perez Olivio', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 943924, 'Quimico / Estudios en Control Ambiental Bacteriologico', 'No Disponible', 'Medico'),
(18, 'jtaide', 'Jose Taide Galaviz Alvarado', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 1175083, 'Otorrino', '3150755', 'Medico'),
(19, 'kiram', 'Kevin Iram Gallegos', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 8970775, 'Otorrino', '121013102', 'Medico'),
(20, 'mdel', 'Maria del Rosario Rivero Sanchez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 2115263, 'Anestesiologia', '4111346', 'Anestesiologo'),
(21, 'ofabrizo', 'Omar Fabrizo Paltero Natera', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4642433, 'Cirugia General', '7739194', 'Medico'),
(22, 'rjoel', 'Ricardo Joel Rivas Aguilar', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6649635, 'Anestesiologia', '9709121', 'Anestesiologo'),
(23, 'vnoriega', 'Valentin Noriega Leon', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4712694, 'Traumatologia', '09082916', 'Medico'),
(24, 'wernesto', 'Wilber Ernesto Herrera Garcia', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 3355148, 'Cirugia Pediatrica', '4896412', 'Medico'),
(25, 'fortiz', 'Fernando Ortiz Sanchez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 525485, 'Otorrino', '7605145', 'Medico'),
(26, 'cdaniel', 'Carlos Daniel Gomez Calvo', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4914837, 'Cirugia Vascular', '10117640', 'Medico'),
(27, 'celena', 'Claudia Elena Alvarez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 7483609, 'Cirugia General', '10210266', 'Medico'),
(28, 'gperez', 'Guillermo Perez Soto', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 8230274, 'Cirugia General', '11763816', 'Medico'),
(29, 'lmiguel', 'Luis Miguel Santos Meza', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 2563897, 'Cirugia General', '4255128', 'Medico'),
(30, 'jfrancisco', 'Juan Francisco Egozcue Ayala', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4308729, 'Cirugia General', 'No Disponible', 'Medico'),
(31, 'malberto', 'Mario Alberto Monzon Arellano', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 5663797, 'Cirugia General', '7605321', 'Medico'),
(32, 'obrugada', 'Odon Brugada Echeverria', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 393834, 'Cirugia General', '11949619', 'Medico'),
(33, 'aaraujo', 'Abril Araujo', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6098828, 'Oftalmologo', '7423654', 'Medico'),
(34, 'asoto', 'Anel Soto', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 8712003, 'Oftalmologo', '10900373', 'Medico'),
(35, 'gruiz', 'Gabriel Ruiz Garcia', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4685232, 'Oftalmologo', '5288513', 'Medico'),
(36, 'ldaniel', 'Lorenzo Daniel Zuñiga', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4405340, 'Oftalmologo', '6532905', 'Medico'),
(37, 'edoreida', 'Eglys Doreida Luna Gomez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 2214960, 'Otorrino', '3150571', 'Medico'),
(38, 'palfredo', 'Pedro Alfredo Cota', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 5397159, 'Cirugia Plastica', '2826167', 'Medico'),
(39, 'vloeza', 'Victor Loeza Montiel', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6710190, 'Cirugia General', '10994093', 'Medico'),
(40, 'vmario', 'Victor Mario Garcia Davila', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 541582, 'Anestesiologia', '3181679', 'Anestesiologo'),
(41, 'ysanchez', 'Yeteem Sanchez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6325771, 'Anestesiologia', '8646043', 'Anestesiologo'),
(42, 'vorozco', 'Victor Orozco Moreno', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6740363, 'Cirugia General', '9466214', 'Medico'),
(43, 'carturo', 'Cesar Arturo Mendez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6557873, 'Traumatologia', '10841629', 'Medico'),
(44, 'dkempes', 'David Kempes Quiñonez Hernandez', '6537e99af2c2223642df9f70a0b5afca', 'No Disponible', 'Medico General', 5714412, 'Traumatologia', '11575110', 'Medico'),
(45, 'ggalicia', 'Gustavo Galicia Ramirez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4630874, 'Traumatologia', '7187867', 'Medico'),
(46, 'hesteban', 'Heber Esteban Avitia Samano', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6843984, 'Traumatologia', '11195273', 'Medico'),
(47, 'lrodolfo', 'Luis Rodolfo Garcia Mellado', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4409424, 'Traumatologia', '6581668', 'Medico'),
(48, 'rleodegario', 'Roberto Leodegario Magaña', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6958734, 'Traumatologia', '10134466', 'Medico'),
(49, 'alopez', 'Alfredo Lopez Espinoza', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4642319, 'Anestesiologia', '8284308', 'Anestesiologo'),
(50, 'arigoberto', 'Antonio Rigoberto Villegas Ceja', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 9457740, 'Anestesiologia', '10971088', 'Anestesiologo'),
(51, 'cgabriela', 'Claudia Gabriela Pedraza Montiel', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Anestesiologia', 'No Disponible', 'Anestesiologo'),
(52, 'jaisheh', 'Joann Aisheh Cabrera Martinez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 7022666, 'Anestesiologia', '9509404', 'Anestesiologo'),
(53, 'dlili', 'Dacia Lili Flores', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 8923888, 'Anestesiologia', '11702762', 'Anestesiologo'),
(54, 'echavez', 'Efren Chavez Marquez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Anestesiologia', 'No Disponible', 'Anestesiologo'),
(55, 'mbelen', 'Mirla Belen Romo Zuñiga', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4687000, 'Anestesiologia', '8556515', 'Anestesiologo'),
(56, 'sbaez', 'Solangel Baez Inzunza', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 5739682, 'Anestesiologia', '7674600', 'Anestesiologo'),
(57, 'jdavid', 'Jorge David Magaña Rodriguez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 4985342, 'Urologo', '09158687', 'Medico'),
(58, 'eferreira', 'Erika Ferreira Gonzalez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 9181763, 'Anestesiologia Pediatrica', '11886094', 'Anestesiologo'),
(59, 'disabel', 'Diana Isabel Zamora', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 3792791, 'Otorrino', '5907175', 'Medico'),
(60, 'jmanuel', 'Jose Manuel Gonzalez Ruiz', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 6713608, 'Traumatologia', '10237242', 'Medico'),
(61, 'jfemat', 'Jesus Fematt Hernandez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 2378236, 'No Aplica', 'No Aplica', 'Medico'),
(62, 'mantonio', 'Mauricio Antonio Espinoza', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Traumatologia IMSS ', 'No Disponible', 'Medico'),
(63, 'mangel', 'Miguel Angel Alvarez Rubio', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Tecnico Radiologo', 'No Disponible', 'Medico'),
(64, 'aaguilar', 'Alejandra Aguilar Hipolito', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Ginecologia', 'No Disponible', 'Medico'),
(65, 'cfrancisco', 'Carlos Francisco Rodrigue Palacios', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Ginecologia', 'No Disponible', 'Medico'),
(66, 'fmurillo', 'Fernando Murillo Mendez', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Cirugia General', 'No Disponible', 'Medico'),
(67, 'jalberto', 'Juan Alberto Lima', 'e10adc3949ba59abbe56e057f20f883e', 'No Disponible', 'Medico General', 0, 'Cirugia General', 'No Disponible', 'Medico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fase_1`
--
ALTER TABLE `fase_1`
  ADD PRIMARY KEY (`no_fase`);

--
-- Indices de la tabla `fase_2`
--
ALTER TABLE `fase_2`
  ADD PRIMARY KEY (`no_fase`);

--
-- Indices de la tabla `fase_3`
--
ALTER TABLE `fase_3`
  ADD PRIMARY KEY (`no_fase`);

--
-- Indices de la tabla `hoja_alta`
--
ALTER TABLE `hoja_alta`
  ADD PRIMARY KEY (`no_hoja`);

--
-- Indices de la tabla `hoja_medica_postoperatoria`
--
ALTER TABLE `hoja_medica_postoperatoria`
  ADD PRIMARY KEY (`no_hoja`);

--
-- Indices de la tabla `hoja_valoracion`
--
ALTER TABLE `hoja_valoracion`
  ADD PRIMARY KEY (`no_hoja`);

--
-- Indices de la tabla `nota_indicaciones_medicas`
--
ALTER TABLE `nota_indicaciones_medicas`
  ADD PRIMARY KEY (`no_indicacion`);

--
-- Indices de la tabla `nota_preoperatoria`
--
ALTER TABLE `nota_preoperatoria`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indices de la tabla `nota_preparacion`
--
ALTER TABLE `nota_preparacion`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indices de la tabla `nota_quirofano`
--
ALTER TABLE `nota_quirofano`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indices de la tabla `nota_recuperacion`
--
ALTER TABLE `nota_recuperacion`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indices de la tabla `nota_recuperacion_inmediata`
--
ALTER TABLE `nota_recuperacion_inmediata`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indices de la tabla `nota_traslado`
--
ALTER TABLE `nota_traslado`
  ADD PRIMARY KEY (`no_traslado`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`num_paciente`),
  ADD KEY `exp_procedencia` (`exp_procedencia`);

--
-- Indices de la tabla `procedimientos_quirurgico`
--
ALTER TABLE `procedimientos_quirurgico`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `fase_1`
--
ALTER TABLE `fase_1`
  MODIFY `no_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fase_2`
--
ALTER TABLE `fase_2`
  MODIFY `no_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fase_3`
--
ALTER TABLE `fase_3`
  MODIFY `no_fase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hoja_alta`
--
ALTER TABLE `hoja_alta`
  MODIFY `no_hoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hoja_medica_postoperatoria`
--
ALTER TABLE `hoja_medica_postoperatoria`
  MODIFY `no_hoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hoja_valoracion`
--
ALTER TABLE `hoja_valoracion`
  MODIFY `no_hoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nota_indicaciones_medicas`
--
ALTER TABLE `nota_indicaciones_medicas`
  MODIFY `no_indicacion` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nota_preoperatoria`
--
ALTER TABLE `nota_preoperatoria`
  MODIFY `no_nota` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota_preparacion`
--
ALTER TABLE `nota_preparacion`
  MODIFY `no_nota` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `nota_quirofano`
--
ALTER TABLE `nota_quirofano`
  MODIFY `no_nota` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota_recuperacion`
--
ALTER TABLE `nota_recuperacion`
  MODIFY `no_nota` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `nota_recuperacion_inmediata`
--
ALTER TABLE `nota_recuperacion_inmediata`
  MODIFY `no_nota` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota_traslado`
--
ALTER TABLE `nota_traslado`
  MODIFY `no_traslado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `num_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10009;

--
-- AUTO_INCREMENT de la tabla `procedimientos_quirurgico`
--
ALTER TABLE `procedimientos_quirurgico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  MODIFY `exp_procedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
