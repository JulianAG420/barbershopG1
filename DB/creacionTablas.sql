-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2024 a las 06:38:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemabarberia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesousuario`
--

CREATE TABLE `accesousuario` (
  `AccesoUsuarioID` int(11) NOT NULL,
  `TipoPermiso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `accesousuario`
--

INSERT INTO `accesousuario` (`AccesoUsuarioID`, `TipoPermiso`) VALUES
(1, 'cliente'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `NombreCategoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `NombreCategoria`) VALUES
(1, 'Cabello'),
(2, 'Barba'),
(3, 'Aseo Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CitaID` int(11) NOT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
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
-- Estructura de tabla para la tabla `citasservicios`
--

CREATE TABLE `citasservicios` (
  `ID` int(11) NOT NULL,
  `ServicioID` int(11) DEFAULT NULL,
  `CitaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citasservicios`
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
-- Estructura de tabla para la tabla `clientes`
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
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Pass_word`, `AccesoUsuarioID`) VALUES
(6, 'Christopher', 'Diaz', '70425071', 'test@gmail.com', '$2y$10$XSchkI0YeApW7756d60NFOubHUChc9DbEJ0/3V7ujmDpL0/1jWlgC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosvaloraciones`
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
-- Volcado de datos para la tabla `comentariosvaloraciones`
--

INSERT INTO `comentariosvaloraciones` (`ComentarioID`, `ClienteID`, `Fecha`, `EstilistaID`, `Calificacion`, `Comentario`, `Titulo`) VALUES
(1, 6, '2024-03-20', 1, 5, 'El servicio fue espectacular!', 'Gracias!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilistas`
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
-- Volcado de datos para la tabla `estilistas`
--

INSERT INTO `estilistas` (`EstilistaID`, `Nombre`, `Apellido`, `Especialidades`, `HorarioTrabajo`, `Contacto`, `imagen`) VALUES
(1, 'Javier', 'Martinez', 'Barberia General', '8am-5pm', 'jmartinez@barberia.com', 'estilista1.png'),
(2, 'Amanda', 'Perez', 'Tintes', '10am-7pm', 'aperez@barberia.com', 'estilista2.png'),
(3, 'Kristel', 'Solano', 'Tratamientos Capilares', '9am-6pm', 'ksolano@barberia.com', 'estilista3.png'),
(4, 'Franklin', 'Bermudez', 'Barberia General', '11am-8pm', 'fbermudez@barberia.com', 'estilista4.png'),
(5, 'Gerardo', 'Jimenez', 'Barberia General y Cosmetica', '11am-8pm', 'gjimenez@barberia.com', 'estilista5.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ProductoID` int(11) NOT NULL,
  `CantidadStock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`ProductoID`, `CantidadStock`) VALUES
(1, 10),
(2, 5),
(3, 15),
(4, 20),
(5, 8),
(8, 6),
(9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL,
  `CategoriaID` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `PrecioVenta` decimal(10,2) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoID`, `CategoriaID`, `Nombre`, `Descripcion`, `PrecioVenta`, `Imagen`) VALUES
(1, 1, 'Gel', 'Maxima fijacion', 5000.00, 'gel.jpg'),
(2, 3, 'Peine', 'Apto para cualquier tipo de peinado', 4500.00, 'PEINE.jpg'),
(3, 2, 'After Shave', 'Perfecto para hidratar la piel luego de resurar', 3000.00, 'AFTER SHAVE.jpg'),
(4, 2, 'Espuma para Rasurar', 'Ideal para realizar un rasurado sin irritar la peil', 4000.00, 'espuma.jpg'),
(5, 3, 'Navaja', 'Cuenta con un corte fino y navaja agradable para la piel del rostro', 10000.00, 'navaja.jpg'),
(8, 3, 'Rexona', 'Desodorante antitranspirante', 2000.00, 'rexona.jpg'),
(9, 1, 'belcolor', 'Gel para el cabello', 1200.00, 'belcolor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ServicioID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`ServicioID`, `Nombre`, `Precio`) VALUES
(1, 'Corte de cabello', 4000.00),
(2, 'Corte de cabello y barba', 7000.00),
(3, 'Tinte de cabello', 6000.00),
(4, 'Lavado de cabello', 5000.00),
(5, 'Tratamiento capilar', 10000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Pass_word` varchar(255) DEFAULT NULL,
  `AccesoUsuarioID` int(11) DEFAULT 2,
  `NombreCompleto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Email`, `Pass_word`, `AccesoUsuarioID`, `NombreCompleto`) VALUES
(1, 'christophercd960@gmail.com', '$2y$10$ze/csLCOFsTrO1uS9Vop3eoKsQeSZtZvUW4W/8aikFOWOpTNdtaxW', 2, 'Christopher C Diaz'),
(2, 'edwinromero1515@gmail.com', '$2y$10$8goEjm2pgnH51fLQ/.bccObqFokJ6MKQ3L5u2IXsfwvoRkyFX8TQe', 2, 'Edwin Romero'),
(3, 'julsag29@gmail.com', '$2y$10$ZA./RzXeWpmRdYdF58vMd.UWXQ8AnyQPZjhLdzHjY3/kJ.PxSwqgS', 2, 'Julian Aguirre'),
(4, 'robertoiribarren020@gmail.com', '$2y$10$Tha2McEPv.i30L6XpqSYTu2wzhhD3zrY.1saFq/M3JNyZAzel2uYu', 2, 'Roberto Iribarren');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `VentaID` int(11) NOT NULL,
  `FechaHoraVenta` datetime DEFAULT NULL,
  `TotalVenta` decimal(10,2) DEFAULT NULL,
  `MetodoPago` varchar(50) DEFAULT '',
  `Descripcion` varchar(255) DEFAULT 'YES',
  `ClienteID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesousuario`
--
ALTER TABLE `accesousuario`
  ADD PRIMARY KEY (`AccesoUsuarioID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitaID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `citasservicios`
--
ALTER TABLE `citasservicios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CitaID` (`CitaID`),
  ADD KEY `ServicioID` (`ServicioID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD KEY `AccesoUsuarioID` (`AccesoUsuarioID`);

--
-- Indices de la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD PRIMARY KEY (`ComentarioID`),
  ADD KEY `ClienteID` (`ClienteID`),
  ADD KEY `EstilistaID` (`EstilistaID`);

--
-- Indices de la tabla `estilistas`
--
ALTER TABLE `estilistas`
  ADD PRIMARY KEY (`EstilistaID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ProductoID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`),
  ADD KEY `CategoriaID` (`CategoriaID`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ServicioID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`),
  ADD KEY `AccesoUsuarioID` (`AccesoUsuarioID`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`VentaID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesousuario`
--
ALTER TABLE `accesousuario`
  MODIFY `AccesoUsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `CitaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `citasservicios`
--
ALTER TABLE `citasservicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  MODIFY `ComentarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estilistas`
--
ALTER TABLE `estilistas`
  MODIFY `EstilistaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `ServicioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `VentaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);

--
-- Filtros para la tabla `citasservicios`
--
ALTER TABLE `citasservicios`
  ADD CONSTRAINT `citasservicios_ibfk_1` FOREIGN KEY (`CitaID`) REFERENCES `citas` (`CitaID`),
  ADD CONSTRAINT `citasservicios_ibfk_2` FOREIGN KEY (`ServicioID`) REFERENCES `servicios` (`ServicioID`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`AccesoUsuarioID`) REFERENCES `accesousuario` (`AccesoUsuarioID`);

--
-- Filtros para la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD CONSTRAINT `comentariosvaloraciones_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `comentariosvaloraciones_ibfk_2` FOREIGN KEY (`EstilistaID`) REFERENCES `estilistas` (`EstilistaID`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`AccesoUsuarioID`) REFERENCES `accesousuario` (`AccesoUsuarioID`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
