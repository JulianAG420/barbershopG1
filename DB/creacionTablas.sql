-- Creacion de las tablas y su respectiva normalizacion 
-- FORMATO BRINDADO POR PHPMYADMIN PARA QUE LO COPIE Y PEGUE DE UNA MANERA MAS SENCILLA

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 06:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemabarberia`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesousuario`
--

CREATE TABLE `accesousuario` (
  `AccesoUsuarioID` int(11) NOT NULL,
  `TipoPermiso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesousuario`
--

INSERT INTO `accesousuario` (`AccesoUsuarioID`, `TipoPermiso`) VALUES
(1, 'cliente'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `NombreCategoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `NombreCategoria`) VALUES
(1, 'Cabello'),
(2, 'Barba'),
(3, 'Aseo Personal');

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `CitaID` int(11) NOT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`CitaID`, `ClienteID`, `Fecha`, `Hora`) VALUES
(1, NULL, '2024-03-29', '16:35:00'),
(2, NULL, NULL, NULL),
(3, NULL, NULL, NULL),
(4, NULL, '2024-03-29', '16:35:00'),
(5, NULL, '2024-03-29', '16:38:00'),
(6, NULL, '2024-03-29', '16:41:00'),
(7, NULL, '2024-03-29', '16:41:00'),
(8, NULL, '2024-03-29', '16:42:00'),
(9, NULL, NULL, NULL),
(20, 6, '2024-04-01', '13:38:00'),
(21, 6, '2024-04-01', '14:40:00'),
(22, 6, '2024-04-01', '13:41:00'),
(23, 6, '2024-04-01', '13:41:00'),
(24, 6, '2024-04-01', '13:46:00'),
(25, 6, '2024-04-01', '13:46:00'),
(26, 6, '2024-04-01', '13:46:00'),
(27, 6, '2024-04-03', '14:54:00'),
(28, 6, '2024-04-01', '14:04:00'),
(29, 6, '2024-04-01', '14:04:00'),
(30, 6, '2024-04-02', '15:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `citasservicios`
--

CREATE TABLE `citasservicios` (
  `ID` int(11) NOT NULL,
  `ServicioID` int(11) DEFAULT NULL,
  `CitaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citasservicios`
--

INSERT INTO `citasservicios` (`ID`, `ServicioID`, `CitaID`) VALUES
(3, 1, 24),
(4, 1, 25),
(5, 1, 26),
(6, 2, 26),
(7, 1, 27),
(8, 2, 27),
(9, 1, 28),
(10, 2, 28),
(11, 1, 29),
(12, 2, 29),
(13, 1, 30),
(14, 2, 30),
(15, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Pass_word` varchar(100) DEFAULT NULL,
  `AccesoUsuarioID` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Pass_word`, `AccesoUsuarioID`) VALUES
(6, 'Christopher', 'Diaz', '70425071', 'test@gmail.com', '$2y$10$XSchkI0YeApW7756d60NFOubHUChc9DbEJ0/3V7ujmDpL0/1jWlgC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comentariosvaloraciones`
--

CREATE TABLE `comentariosvaloraciones` (
  `ComentarioID` int(11) NOT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `EstilistaID` int(11) DEFAULT NULL,
  `Calificacion` int(11) DEFAULT NULL,
  `Comentario` varchar(255) DEFAULT NULL,
  `Titulo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentariosvaloraciones`
--

INSERT INTO `comentariosvaloraciones` (`ComentarioID`, `ClienteID`, `Fecha`, `EstilistaID`, `Calificacion`, `Comentario`, `Titulo`) VALUES
(1, 6, '2024-03-20', 1, 5, 'El servicio fue espectacular!', 'Gracias!');

-- --------------------------------------------------------

--
-- Table structure for table `estilistas`
--

CREATE TABLE `estilistas` (
  `EstilistaID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Especialidades` varchar(255) DEFAULT NULL,
  `HorarioTrabajo` varchar(255) DEFAULT NULL,
  `Contacto` varchar(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estilistas`
--

INSERT INTO `estilistas` (`EstilistaID`, `Nombre`, `Apellido`, `Especialidades`, `HorarioTrabajo`, `Contacto`, `imagen`) VALUES
(1, 'Javier', 'Martinez', 'Barberia General', '8am-5pm', 'jmartinez@barberia.com', 'estilista1.png'),
(2, 'Amanda', 'Perez', 'Tintes', '10am-7pm', 'aperez@barberia.com', 'estilista2.png'),
(3, 'Kristel', 'Solano', 'Tratamientos Capilares', '9am-6pm', 'ksolano@barberia.com', 'estilista3.png'),
(4, 'Franklin', 'Bermudez', 'Barberia General', '11am-8pm', 'fbermudez@barberia.com', 'estilista4.png'),
(5, 'Gerardo', 'Jimenez', 'Barberia General y Cosmetica', '11am-8pm', 'gjimenez@barberia.com', 'estilista5.png');

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `ProductoID` int(11) NOT NULL,
  `CantidadStock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`ProductoID`, `CantidadStock`) VALUES
(1, 10),
(2, 5),
(3, 15),
(4, 20),
(5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL,
  `CategoriaID` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `PrecioVenta` decimal(10,2) DEFAULT NULL,
  `Proveedor` varchar(100) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`ProductoID`, `CategoriaID`, `Nombre`, `Descripcion`, `PrecioVenta`, `Proveedor`, `Imagen`) VALUES
(1, 1, 'Gel', 'Maxima fijacion', 5000.00, 'Desconocido', 'gel.jpg'),
(2, 3, 'Peine', 'Apto para cualquier tipo de peinado', 4500.00, 'Desconocido', 'PEINE.jpg'),
(3, 2, 'After Shave', 'Perfecto para hidratar la piel luego de resurar', 3000.00, 'Desconocido', 'AFTER SHAVE.jpg'),
(4, 2, 'Espuma para Rasurar', 'Ideal para realizar un rasurado sin irritar la peil', 4000.00, 'Desconocido', 'espuma.jpg'),
(5, 3, 'Navaja', 'Cuenta con un corte fino y navaja agradable para la piel del rostro', 10000.00, 'Desconocido', 'navaja.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promociones`
--

CREATE TABLE `promociones` (
  `PromocionID` int(11) NOT NULL,
  `NombrePromocion` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFin` date DEFAULT NULL,
  `Descuento` decimal(5,2) DEFAULT NULL,
  `Condiciones` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promociones`
--

INSERT INTO `promociones` (`PromocionID`, `NombrePromocion`, `Descripcion`, `FechaInicio`, `FechaFin`, `Descuento`, `Condiciones`, `Imagen`) VALUES
(1, 'Espuma Nivea', 'Espuma de afeitar Nivea men para todo tipo de piel', '2024-01-01', '2024-02-01', 10.00, 'Promocion aplica al pagar con tarjeta amex black', 'img/espuma.jpg'),
(2, 'Navaja de afeitar', 'Navaja de afeitar de marca generica', '2024-01-01', '2024-02-01', 20.00, 'Promocion aplica al llevar 2 o mas articulos', 'img/navaja.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `ServicioID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`ServicioID`, `Nombre`, `Precio`) VALUES
(1, 'Corte de cabello', 4000.00),
(2, 'Corte de cabello y barba', 7000.00),
(3, 'Tinte de cabello', 6000.00),
(4, 'Lavado de cabello', 5000.00),
(5, 'Tratamiento capilar', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Pass_word` varchar(255) DEFAULT NULL,
  `AccesoUsuarioID` int(11) DEFAULT 2,
  `NombreCompleto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Email`, `Pass_word`, `AccesoUsuarioID`, `NombreCompleto`) VALUES
(1, 'christophercd960@gmail.com', '$2y$10$ze/csLCOFsTrO1uS9Vop3eoKsQeSZtZvUW4W/8aikFOWOpTNdtaxW', 2, 'Christopher C Diaz'),
(2, 'edwinromero1515@gmail.com', '$2y$10$8goEjm2pgnH51fLQ/.bccObqFokJ6MKQ3L5u2IXsfwvoRkyFX8TQe', 2, 'Edwin Romero'),
(3, 'julsag29@gmail.com', '$2y$10$ZA./RzXeWpmRdYdF58vMd.UWXQ8AnyQPZjhLdzHjY3/kJ.PxSwqgS', 2, 'Julian Aguirre'),
(4, 'robertoiribarren020@gmail.com', '$2y$10$Tha2McEPv.i30L6XpqSYTu2wzhhD3zrY.1saFq/M3JNyZAzel2uYu', 2, 'Roberto Iribarren');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `VentaID` int(11) NOT NULL,
  `FechaHoraVenta` datetime DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `TotalVenta` decimal(10,2) DEFAULT NULL,
  `MetodoPago` varchar(50) DEFAULT '',
  `EstilistaID` int(11) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`VentaID`, `FechaHoraVenta`, `ClienteID`, `TotalVenta`, `MetodoPago`, `EstilistaID`, `Descripcion`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesousuario`
--
ALTER TABLE `accesousuario`
  ADD PRIMARY KEY (`AccesoUsuarioID`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitaID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indexes for table `citasservicios`
--
ALTER TABLE `citasservicios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CitaID` (`CitaID`),
  ADD KEY `ServicioID` (`ServicioID`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD KEY `AccesoUsuarioID` (`AccesoUsuarioID`);

--
-- Indexes for table `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD PRIMARY KEY (`ComentarioID`),
  ADD KEY `ClienteID` (`ClienteID`),
  ADD KEY `EstilistaID` (`EstilistaID`);

--
-- Indexes for table `estilistas`
--
ALTER TABLE `estilistas`
  ADD PRIMARY KEY (`EstilistaID`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ProductoID`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`),
  ADD KEY `CategoriaID` (`CategoriaID`);

--
-- Indexes for table `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`PromocionID`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ServicioID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD KEY `AccesoUsuarioID` (`AccesoUsuarioID`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`VentaID`),
  ADD KEY `ClienteID` (`ClienteID`),
  ADD KEY `EstilistaID` (`EstilistaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesousuario`
--
ALTER TABLE `accesousuario`
  MODIFY `AccesoUsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `CitaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `citasservicios`
--
ALTER TABLE `citasservicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  MODIFY `ComentarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estilistas`
--
ALTER TABLE `estilistas`
  MODIFY `EstilistaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promociones`
--
ALTER TABLE `promociones`
  MODIFY `PromocionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ServicioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `VentaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);

--
-- Constraints for table `citasservicios`
--
ALTER TABLE `citasservicios`
  ADD CONSTRAINT `citasservicios_ibfk_1` FOREIGN KEY (`CitaID`) REFERENCES `citas` (`CitaID`),
  ADD CONSTRAINT `citasservicios_ibfk_2` FOREIGN KEY (`ServicioID`) REFERENCES `servicios` (`ServicioID`);

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`AccesoUsuarioID`) REFERENCES `accesousuario` (`AccesoUsuarioID`);

--
-- Constraints for table `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD CONSTRAINT `comentariosvaloraciones_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `comentariosvaloraciones_ibfk_2` FOREIGN KEY (`EstilistaID`) REFERENCES `estilistas` (`EstilistaID`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`AccesoUsuarioID`) REFERENCES `accesousuario` (`AccesoUsuarioID`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`EstilistaID`) REFERENCES `estilistas` (`EstilistaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
