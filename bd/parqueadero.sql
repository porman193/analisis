-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 16:55:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueadero`
--
CREATE DATABASE IF NOT EXISTS `parqueadero` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parqueadero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `telefono`, `correo`, `user`) VALUES
(11, 'Julian', 'Gonzalez', 5465565, 'cliente1@gmail.com', 'cl1'),
(983493, 'Horacio', 'Zamora', 97834237, 'hrzamora@gmail.com', 'cl2');

--
-- Disparadores `cliente`
--
DELIMITER $$
CREATE TRIGGER `crear_cuenta_despues_insertar_cliente` AFTER INSERT ON `cliente` FOR EACH ROW BEGIN
    INSERT INTO fondos (id_cliente) VALUES (NEW.id_cliente);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` varchar(20) NOT NULL,
  `id_registro` varchar(20) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `id_plaza` varchar(10) NOT NULL,
  `fecha_facturacion` date NOT NULL,
  `fecha_cancelacion` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_registro` (`id_registro`),
  KEY `id_cliente` (`id_cliente`),
  KEY `placa` (`placa`),
  KEY `id_plaza` (`id_plaza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondos`
--

CREATE TABLE IF NOT EXISTS `fondos` (
  `nro_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `saldo` double NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`nro_cuenta`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fondos`
--

INSERT INTO `fondos` (`nro_cuenta`, `saldo`, `id_cliente`) VALUES
(1, 155002, 11),
(3, 0, 983493);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE IF NOT EXISTS `metodos_pago` (
  `nro_tarjeta` bigint(20) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `titular` varchar(50) NOT NULL,
  `cvv` int(11) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`nro_tarjeta`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`nro_tarjeta`, `tipo`, `titular`, `cvv`, `fecha_vencimiento`, `id_cliente`) VALUES
(496589832, 'Visa', 'Julian Gonzalez', 721, '2024-08-28', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normatividad`
--

CREATE TABLE IF NOT EXISTS `normatividad` (
  `id_norma` varchar(10) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_norma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `normatividad`
--

INSERT INTO `normatividad` (`id_norma`, `descripcion`) VALUES
('nrm001', 'Todos los usuarios del parqueadero deben mostrar un comportamiento respetuoso y cortés hacia el personal, así como hacia otros conductores y peatones. Queda estrictamente prohibido el uso de lenguaje ofensivo, gestos agresivos o cualquier forma de comportamiento que pueda perturbar la armonía en el parqueadero. La falta de respeto puede resultar en advertencias y, en casos graves, en la prohibición de uso del servicio.'),
('nrm002', 'Es responsabilidad de cada usuario realizar el pago correspondiente por el tiempo de estacionamiento de manera oportuna. Se establece un período de gracia para realizar el pago después de la salida del parqueadero. Los retrasos en el pago estarán sujetos a cargos adicionales. La acumulación de deudas puede resultar en la restricción del acceso al parqueadero.'),
('nrm003', 'Cada usuario está asignado a un espacio específico en el parqueadero. Se espera que los conductores estacionen sus vehículos dentro de los límites de su espacio asignado y sigan las indicaciones del personal de parqueadero. El incumplimiento reiterado de esta norma puede resultar en la reubicación del usuario a un área designada.'),
('nrm004', 'La seguridad de los vehículos es de suma importancia. Los usuarios deben asegurarse de que sus vehículos estén debidamente cerrados y seguros antes de abandonar el parqueadero. La administración no asume ninguna responsabilidad por robos, daños o pérdidas de objetos de valor dentro de los vehículos.'),
('nrm005', 'La velocidad máxima permitida dentro del área del parqueadero es de 10 km/h. Esta norma se implementa para garantizar la seguridad de todos los usuarios y peatones. Los conductores que excedan este límite pueden ser sancionados, incluyendo la suspensión temporal del servicio.'),
('nrm006', 'Queda estrictamente prohibida la realización de actividades comerciales, como la venta de productos o servicios, dentro de las instalaciones del parqueadero sin la autorización previa de la administración. La violación de esta norma puede resultar en la expulsión del parqueadero.'),
('nrm007', 'Se insta a los usuarios a adoptar prácticas amigables con el medio ambiente. Esto incluye apagar los motores de los vehículos mientras están estacionados y desechar adecuadamente los desechos. Se pueden aplicar multas por violaciones a la normativa ambiental.'),
('nrm008', 'Las instalaciones destinadas a personas con discapacidad están reservadas exclusivamente para aquellos que cuentan con los permisos correspondientes. El uso indebido de estas instalaciones puede resultar en sanciones y multas.'),
('nrm009', 'Los usuarios no tienen permitido realizar modificaciones no autorizadas en las instalaciones del parqueadero, incluyendo la pintura de señales en el suelo o la instalación de cualquier tipo de dispositivo sin la aprobación de la administración.'),
('nrm010', 'Todos los usuarios deben cumplir con la señalización vial dentro del parqueadero. Esto incluye seguir las indicaciones de flechas, respetar los límites de velocidad, y observar las señales de alto y ceda el paso. La ignorancia de la señalización no exime de responsabilidad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operario`
--

CREATE TABLE IF NOT EXISTS `operario` (
  `id_operario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_operario`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operario`
--

INSERT INTO `operario` (`id_operario`, `nombre`, `apellido`, `telefono`, `correo`, `user`) VALUES
(1010, 'Ger', 'Opas', 546546, 'operario1@gmail.com', 'op1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazas`
--

CREATE TABLE IF NOT EXISTS `plazas` (
  `id_plaza` varchar(10) NOT NULL,
  `piso` int(11) NOT NULL,
  `tarifa` double NOT NULL,
  PRIMARY KEY (`id_plaza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plazas`
--

INSERT INTO `plazas` (`id_plaza`, `piso`, `tarifa`) VALUES
('A01', 1, 30000),
('A02', 1, 30000),
('A03', 1, 30000),
('A04', 1, 30000),
('A05', 1, 30000),
('A06', 1, 30000),
('A07', 1, 30000),
('A08', 1, 30000),
('A09', 1, 30000),
('A10', 1, 30000),
('B01', 2, 20000),
('B02', 2, 20000),
('B03', 2, 20000),
('B04', 2, 20000),
('B05', 2, 20000),
('B06', 2, 20000),
('B07', 2, 20000),
('B08', 2, 20000),
('B09', 2, 20000),
('B10', 2, 20000),
('C01', 3, 10000),
('C02', 3, 10000),
('C03', 3, 10000),
('C04', 3, 10000),
('C05', 3, 10000),
('C06', 3, 10000),
('C07', 3, 10000),
('C08', 3, 10000),
('C09', 3, 10000),
('C10', 3, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` varchar(20) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_operario` int(11) NOT NULL,
  `id_plaza` varchar(10) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `placa` (`placa`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_operario` (`id_operario`),
  KEY `id_plaza` (`id_plaza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user`, `pass`, `tipo`) VALUES
('cl1', 'cl1', 'cliente'),
('cl2', 'cl2', 'cliente'),
('op1', 'op1', 'operario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `placa` varchar(10) NOT NULL,
  `modelo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`placa`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estructura de tabla para la tabla `registro_salidas`
--
CREATE TABLE IF NOT EXISTS `registro_salidas` (
  `id_registro_salida` varchar(20) NOT NULL,
  `id_registro` varchar(20) NOT NULL,
  `fecha_salida` date NOT NULL,
  `monto_pago` double NOT NULL,
  PRIMARY KEY (`id_registro_salida`),
  KEY `id_registro` (`id_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`user`) REFERENCES `usuario` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`placa`) REFERENCES `vehiculo` (`placa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_ibfk_4` FOREIGN KEY (`id_plaza`) REFERENCES `plazas` (`id_plaza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fondos`
--
ALTER TABLE `fondos`
  ADD CONSTRAINT `fondos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD CONSTRAINT `metodos_pago_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `operario`
--
ALTER TABLE `operario`
  ADD CONSTRAINT `operario_ibfk_1` FOREIGN KEY (`user`) REFERENCES `usuario` (`user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`placa`) REFERENCES `vehiculo` (`placa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`id_operario`) REFERENCES `operario` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `registro_ibfk_4` FOREIGN KEY (`id_plaza`) REFERENCES `plazas` (`id_plaza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

--
-- Filtros para la tabla `registro_salidas`
--
ALTER TABLE `registro_salidas`
  ADD CONSTRAINT `registro_salidas_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
