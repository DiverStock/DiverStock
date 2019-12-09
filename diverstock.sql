-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 06:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diverstock`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarelementos` (IN `_id_elemento` INT, IN `_nombre_elemen` VARCHAR(60), IN `_descripcion` VARCHAR(100), IN `_stock` INT)  BEGIN 
     UPDATE elementos SET nombre_elemen=_nombre_elemen, descripcion=_descripcion, stock=_stock WHERE id_elemento=_id_elemento;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarpersona` (IN `_numidentifi_persona` INT, IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_correo` VARCHAR(60), IN `_celular` BIGINT, IN `_especialidad` VARCHAR(50), IN `_ficha` INT)  BEGIN 
     UPDATE persona SET nombre=_nombre, apellido=_apellido, correo=_correo, celular=_celular, especialidad=_especialidad, ficha=_ficha WHERE numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarpersonathree` (IN `_numidentifi_persona` INT, IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_correo` VARCHAR(60), IN `_celular` BIGINT, IN `_cargo_de_bienestar` VARCHAR(60))  BEGIN 
     UPDATE persona SET nombre=_nombre, apellido=_apellido, correo=_correo, celular=_celular, cargo_de_bienestar=_cargo_de_bienestar WHERE numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarpersonatwo` (IN `_numidentifi_persona` INT, IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_correo` VARCHAR(60), IN `_celular` BIGINT, IN `_materia_explica` VARCHAR(100))  BEGIN 
     UPDATE persona SET nombre=_nombre, apellido=_apellido, correo=_correo, celular=_celular, materia_explica=_materia_explica WHERE numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarprestamoestado` (IN `_id_prestamo` INT, IN `_estado` CHAR(1))  BEGIN 
UPDATE prestamo SET estado = _estado WHERE id_prestamo = _id_prestamo;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consulapree` (IN `_numidentifi_persona` INT)  BEGIN 
     SELECT * FROM persona where numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultareditpersona` (IN `_numidentifi_persona` INT)  BEGIN 
     SELECT * FROM persona WHERE numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarelementos` (IN `_estado` CHAR(1))  BEGIN 
     SELECT * FROM elementos WHERE estado=_estado;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarelementosid` (IN `_id_elemento` INT)  BEGIN 
     SELECT * FROM elementos WHERE id_elemento=_id_elemento;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarpersonabienestar` (IN `_estado` CHAR(1))  BEGIN 
     SELECT * FROM persona where estado=_estado AND cargo_de_bienestar!='NULL' AND cargo_de_bienestar!='';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarpersonains` (IN `_estado` CHAR(1))  BEGIN 
     SELECT * FROM persona where estado=_estado AND materia_explica!='NULL' AND materia_explica!='';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarpersonapre` (IN `_estado` CHAR(1))  BEGIN 
     SELECT * FROM persona where estado=_estado AND especialidad!='NULL' AND especialidad!='' AND ficha!='NULL' AND ficha!='';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminardetalle` (IN `_id_prestamo` INT)  BEGIN 
     DELETE from detalle_prestamo where id_prestamo=_id_prestamo;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarelementos` (IN `_id_elemento` INT)  BEGIN 
     Update elementos SET estado='I' where id_elemento=_id_elemento;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarpersona` (IN `_numidentifi_persona` INT)  BEGIN 
     Update persona SET estado='I' where numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarusuario` (IN `_numidentifi_persona` INT)  BEGIN 
    DELETE FROM usuario where numidentifi_persona=_numidentifi_persona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertardetalles` (IN `_id_prestamo` INT, IN `_id_elemento` INT, IN `_cantidad` INT)  BEGIN 
     Insert into detalle_prestamo(id_prestamo, id_elemento, cantidad) values(_id_prestamo, _id_elemento, _cantidad); 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarelementos` (IN `_nombre_elemen` VARCHAR(60), IN `_descripcion` VARCHAR(100), IN `_stock` INT)  BEGIN 
     Insert into elementos(nombre_elemen, descripcion, stock) values(_nombre_elemen, _descripcion, _stock); 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarloginusuario` (IN `_nombre` VARCHAR(50), IN `_clave` VARCHAR(60), IN `_numidentifi_persona` INT, IN `_id_rol` INT)  BEGIN 
     Insert into usuario (nombre, clave, numidentifi_persona, id_rol) values(_nombre, _clave, _numidentifi_persona, _id_rol); 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertaropinion` (IN `_calificacion` VARCHAR(100), IN `_id_prestamo` INT)  BEGIN 
     Insert into opinion( calificacion, id_prestamo) values( _calificacion, _id_prestamo); 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarpersona` (IN `_numidentifi_persona` INT, IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_correo` VARCHAR(60), IN `_genero` VARCHAR(10), IN `_estado` CHAR(1), IN `_celular` BIGINT, IN `_fecha_nacimiento` DATE, IN `_especialidad` VARCHAR(50), IN `_ficha` INT, IN `_materia_explica` VARCHAR(100), IN `_cargo_de_bienestar` VARCHAR(60))  BEGIN 
     Insert into persona(numidentifi_persona, nombre, apellido, correo, genero, estado, celular, fecha_nacimiento, especialidad, ficha, materia_explica, cargo_de_bienestar) values(_numidentifi_persona, _nombre, _apellido, _correo, _genero, _estado, _celular, _fecha_nacimiento, _especialidad, _ficha, _materia_explica, _cargo_de_bienestar); 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarprestamo` (IN `_fecha_prestamo` DATE, IN `_hora_prestamo` TIME, IN `_estado` CHAR(1), IN `_numidentifi_persona` INT)  BEGIN 
    Insert into prestamo(fecha_prestamo, hora_prestamo,estado, numidentifi_persona) values(_fecha_prestamo, _hora_prestamo,_estado, _numidentifi_persona); 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `_nombre` VARCHAR(50), IN `_clave` VARCHAR(60))  BEGIN
SELECT * FROM usuario where nombre= _nombre AND clave= _clave;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prologin` (IN `_nombre` VARCHAR(50), IN `_clave` VARCHAR(60))  BEGIN
SELECT * FROM usuario where nombre= _nombre AND clave= _clave;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_prestamo`
--

CREATE TABLE `detalle_prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_prestamo`
--

INSERT INTO `detalle_prestamo` (`id_prestamo`, `id_elemento`, `cantidad`) VALUES
(55, 2, 1),
(59, 2, 1),
(60, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `elementos`
--

CREATE TABLE `elementos` (
  `id_elemento` int(11) NOT NULL,
  `nombre_elemen` varchar(25) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` char(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elementos`
--

INSERT INTO `elementos` (`id_elemento`, `nombre_elemen`, `descripcion`, `stock`, `estado`) VALUES
(2, 'pinpon', 'abolladura', 50, 'A'),
(4, 'rana', 'buen estado', 50, 'A'),
(7, 'ajedrez', 'buen estado', 50, 'A'),
(21, 'parques', 'buen estado', 50, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `idopinion` bigint(20) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `id_prestamo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `numidentifi_persona` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `celular` bigint(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `ficha` int(11) DEFAULT NULL,
  `materia_explica` varchar(100) DEFAULT NULL,
  `cargo_de_bienestar` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`numidentifi_persona`, `nombre`, `apellido`, `correo`, `genero`, `estado`, `celular`, `fecha_nacimiento`, `especialidad`, `ficha`, `materia_explica`, `cargo_de_bienestar`) VALUES
(454647, 'sara valentina', 'figueroa suancha', 'sarita@gmail.com', 'Femenino', 'I', 2123413432, '2012-10-27', 'gritar', 71402, '', ''),
(93488424, 'viviana', 'rodriguez', 'vivi@gmail.com', 'femenino', 'A', 3214567890, '1991-10-08', NULL, NULL, NULL, 'entretenimiento aprendices'),
(1001112492, 'Juan Diego', 'Figueroa Suancha', 'familia5figueroa.15@gmail.com', 'masculino', 'A', 3213004086, '2001-09-20', 'ADSI', 1839469, NULL, NULL),
(1298345678, 'Alex ', 'Zambrano', 'alex@gmail.com', 'masculino', 'A', 3214567890, '2092-10-13', NULL, NULL, 'PHP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `hora_prestamo` time NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `numidentifi_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `fecha_prestamo`, `hora_prestamo`, `estado`, `numidentifi_persona`) VALUES
(55, '2019-12-09', '17:40:11', 'A', 1001112492),
(56, '2019-12-09', '17:46:33', 'P', 1001112492),
(58, '2019-12-09', '17:52:27', 'P', 1001112492),
(59, '2019-12-09', '17:56:48', 'A', 1001112492),
(60, '2019-12-09', '18:01:16', 'A', 1001112492);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Aprendiz'),
(2, 'Instructor'),
(3, 'Instructor Bienestar');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `numidentifi_persona` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nombre`, `clave`, `numidentifi_persona`, `id_rol`) VALUES
('elpecas', '59842', 1001112492, 1),
('alexzambri', '45678', 1298345678, 2),
('vivi', '98760', 93488424, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD KEY `FK_prestamo` (`id_prestamo`),
  ADD KEY `FK_elemento` (`id_elemento`);

--
-- Indexes for table `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id_elemento`);

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`idopinion`),
  ADD KEY `FK_Prestamo_idprestamo` (`id_prestamo`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`numidentifi_persona`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `FK_persona_a` (`numidentifi_persona`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD KEY `FK_persona` (`numidentifi_persona`),
  ADD KEY `FK_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `idopinion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD CONSTRAINT `FK_elemento` FOREIGN KEY (`id_elemento`) REFERENCES `elementos` (`id_elemento`),
  ADD CONSTRAINT `FK_prestamo` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`);

--
-- Constraints for table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `FK_Prestamo_idprestamo` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`);

--
-- Constraints for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `FK_persona_a` FOREIGN KEY (`numidentifi_persona`) REFERENCES `persona` (`numidentifi_persona`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_persona` FOREIGN KEY (`numidentifi_persona`) REFERENCES `persona` (`numidentifi_persona`),
  ADD CONSTRAINT `FK_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
