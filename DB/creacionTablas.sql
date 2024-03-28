-- Creacion de las tablas y su respectiva normalizacion

-- Tabla AccesoUsuario
CREATE TABLE AccesoUsuario (
	AccesoUsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    TipoPermiso VARCHAR(255)
);
-- Tabla Clientes
CREATE TABLE Clientes (
    ClienteID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    Telefono VARCHAR(20),
    Email VARCHAR(100),
    AccesoUsuarioID INT SET DEFAULT 1,
    Pass_word VARCHAR(100),
    FOREIGN KEY (AccesoUsuarioID) REFERENCES AccesoUsuario(AccesoUsuarioID)
);

-- Tabla Citas
CREATE TABLE Citas (
    CitaID INT PRIMARY KEY AUTO_INCREMENT,
    ClienteID INT,
    Fecha DATE,
    Hora TIME,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
);

-- Tabla Servicios
CREATE TABLE `servicios` (
  `ServicioID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ServicioID`)
);

-- Tabla Central CitasServicios
CREATE TABLE `citasservicios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ServicioID` int(11) DEFAULT NULL,
  `CitaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CitaID` (`CitaID`),
  KEY `ServicioID` (`ServicioID`),
  CONSTRAINT `citasservicios_ibfk_1` FOREIGN KEY (`CitaID`) REFERENCES `citas` (`CitaID`),
  CONSTRAINT `citasservicios_ibfk_2` FOREIGN KEY (`ServicioID`) REFERENCES `servicios` (`ServicioID`)
);
-- Tabla Estilistas
CREATE TABLE Estilistas (
    EstilistaID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    Especialidades VARCHAR(255),
    HorarioTrabajo VARCHAR(255),
    Contacto VARCHAR(100),
    Imagen VARCHAR(255)
);

-- Tabla Categorias
CREATE TABLE Categorias (
    CategoriaID INT PRIMARY KEY AUTO_INCREMENT,
    NombreCategoria VARCHAR(100)
);

-- Tabla Productos
CREATE TABLE Productos (
    ProductoID INT PRIMARY KEY AUTO_INCREMENT,
    CategoriaID INT,
    Nombre VARCHAR(100),
    Descripcion VARCHAR(255),
    PrecioVenta DECIMAL(10,2),
    CantidadInventario INT,
    Proveedor VARCHAR(100),
    Imagen VARCHAR(255),
    FOREIGN KEY (CategoriaID) REFERENCES Categorias (CategoriaID)
);

-- Tabla Ventas
CREATE TABLE Ventas (
    VentaID INT PRIMARY KEY AUTO_INCREMENT,
    FechaHoraVenta DATETIME,
    ClienteID INT,
    TotalVenta DECIMAL(10,2),
    MetodoPago VARCHAR(50),
    EstilistaID INT,
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID),
    FOREIGN KEY (EstilistaID) REFERENCES Estilistas(EstilistaID)
);

-- Tabla Inventario
CREATE TABLE Inventario (
    ProductoID INT PRIMARY KEY,
    CantidadStock INT,
    FOREIGN KEY (ProductoID) REFERENCES Productos(ProductoID)
);

-- Tabla Promociones
CREATE TABLE Promociones (
    PromocionID INT PRIMARY KEY AUTO_INCREMENT,
    NombrePromocion VARCHAR(100),
    Descripcion VARCHAR(255),
    FechaInicio DATE,
    FechaFin DATE,
    Descuento DECIMAL(5,2),
    Condiciones VARCHAR(255),
    Imagen VARCHAR(255)
);

-- Tabla ComentariosValoraciones
CREATE TABLE ComentariosValoraciones (
    ComentarioID INT PRIMARY KEY AUTO_INCREMENT,
    ClienteID INT,
    FechaHoraComentario DATETIME,
    EstilistaID INT,
    Calificacion INT,
    Comentario VARCHAR(255),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID),
    FOREIGN KEY (EstilistaID) REFERENCES Estilistas(EstilistaID)
);

-- Tabla Usuarios
CREATE TABLE Usuarios (
    UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(255),
    Pass_word VARCHAR(255),
    AccesoUsuarioID INT SET DEFAULT 2,
    NombreCompleto VARCHAR(255),
    FOREIGN KEY (AccesoUsuarioID) REFERENCES AccesoUsuario(AccesoUsuarioID)
);