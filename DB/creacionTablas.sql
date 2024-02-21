-- Creacion de las tablas y su respectiva normalizacion

-- Tabla Clientes
CREATE TABLE Clientes (
    ClienteID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    Telefono VARCHAR(20),
    Email VARCHAR(100)
);

-- Tabla Citas
CREATE TABLE Citas (
    CitaID INT PRIMARY KEY AUTO_INCREMENT,
    FechaHora DATETIME,
    ClienteID INT,
    Estado ENUM('pendiente', 'confirmada', 'completada', 'cancelada'),
    Notas VARCHAR(255),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ClienteID)
);

-- Tabla Servicios
CREATE TABLE Servicios (
    ServicioID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100),
    DuracionEstimada INT,
    Precio DECIMAL(10,2),
    Descripcion VARCHAR(255)
);

-- Tabla Estilistas
CREATE TABLE Estilistas (
    EstilistaID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    Especialidades VARCHAR(255),
    HorarioTrabajo VARCHAR(255),
    Contacto VARCHAR(100)
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
    Condiciones VARCHAR(255)
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

-- Tabla AccesoUsuario
CREATE TABLE AccesoUsuario (
	AccesoUsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    TipoPermiso VARCHAR(255)
);

-- Tabla Usuarios
CREATE TABLE Usuarios (
    UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    Email VARCHAR(255),
    Pass_word VARCHAR(255),
    AccesoUsuarioID INT SET DEFAULT 1,
    NombreCompleto VARCHAR(255),
    FOREIGN KEY (AccesoUsuarioID) REFERENCES AccesoUsuario(AccesoUsuarioID)
);