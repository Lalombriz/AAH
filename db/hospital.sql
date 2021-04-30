-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2021 a las 00:44:14
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

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
  `procedimiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`num_paciente`, `exp_procedencia`, `nombre_p`, `fecha_nacimiento`, `direccion_p`, `telefono_p`, `poblacion`, `estado`, `edad`, `sexo`, `procedencia`, `num_afiliacion`, `nombre_a`, `parentesco`, `telefono_a`, `direccion_a`, `medico_esp`, `especialidad`, `anestesiologo`, `diagnostico`, `procedimiento`) VALUES
(10, 10, 'Eduardo Marcelo Gutierrez Soto', '2021-04-05', 'Chicomostoc 891, colonia aztlan, Rosarityo baja california', '661-110-411', 'Rosarito', 'Baja California', 25, 'Masculino', 'PRIVADO', 1234657, 'Guillermo Eugenio Gutierrez Soto', 'Hernamo', '664-336-323', 'Chicomostoc 891, Aztlan Rosarito Baja California', 'Altamirano Gonzalez', 'Cirujano', 'Gutierrez Gonzalez', 'operacion', 'Riñon');

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
(10, '2021-04-13');

--
-- Disparadores `recepcion`
--
DELIMITER !!
CREATE TRIGGER `nuevo_recepcion` BEFORE INSERT ON `recepcion` FOR EACH ROW begin
	set new.fecha = current_date();
  declare num_a int;
  select num_afiliacion into num_a from paciente where num_afiliacion=new.num_afiliacion;
  if(num_a = new.num_afiliacion) then
    signal sqlstate '45000'
    set message_text = 'Error. Numero de afiliacion ya registrada.'
  end if;
end;!!
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
  MODIFY `num_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recepcion`
--
ALTER TABLE `recepcion`
  MODIFY `exp_procedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
