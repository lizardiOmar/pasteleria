CREATE SCHEMA `PASTELERIA_BD` ;

CREATE TABLE Tipos_de_usuario (
    ID int NOT NULL AUTO_INCREMENT,
    Nombre varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE USUARIOS (
	ID INT NOT NULL AUTO_INCREMENT,
	nombres VARCHAR(90) NOT NULL,
	apellidos VARCHAR(90) NOT NULL,
	edad INT NOT NULL,
	correo VARCHAR(90) UNIQUE NOT NULL,
	clave VARCHAR(10) NOT NULL,
	tipo INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (tipo) REFERENCES tipos_de_usuario(ID));

CREATE TABLE DIRECCIONES (
	ID INT NOT NULL AUTO_INCREMENT,
	estado VARCHAR(90) NOT NULL,
	municipio VARCHAR(90) NOT NULL,
	colonia VARCHAR(90) NOT NULL,
	calle VARCHAR(10) NOT NULL,
    numero VARCHAR(10) NOT NULL,
	PRIMARY KEY (`ID`));
	
CREATE TABLE USUARIOS_DIRECCIONES (
	ID INT NOT NULL AUTO_INCREMENT,
	ID_Usuario INT NOT NULL,
    ID_Direccion INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (ID_Usuario) REFERENCES usuarios(ID),
    FOREIGN KEY (ID_Direccion) REFERENCES direcciones(ID));

CREATE TABLE Tipos_de_pedido (
    ID int NOT NULL AUTO_INCREMENT,
    Nombre varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE Estados_de_pedido (
    ID int NOT NULL AUTO_INCREMENT,
    Estado varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE PEDIDOS (
	ID INT NOT NULL AUTO_INCREMENT,
	total DOUBLE NOT NULL,
	descuento DOUBLE NOT NULL,
	subtotal DOUBLE NOT NULL,
	tipo INT NOT NULL,
    estado INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (tipo) REFERENCES tipos_de_pedido(ID),
    FOREIGN KEY (estado) REFERENCES estados_de_pedido(ID));
	
CREATE TABLE USUARIOS_PEDIDOS (
	ID INT NOT NULL AUTO_INCREMENT,
	ID_Usuario INT NOT NULL,
    ID_Pedido INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (ID_Usuario) REFERENCES usuarios(ID),
    FOREIGN KEY (ID_Pedido) REFERENCES pedidos(ID));

CREATE TABLE Tipos_de_producto (
    ID int NOT NULL AUTO_INCREMENT,
    Nombre varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE PRODUCTOS (
	ID INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(90) NOT NULL,
    descripcion VARCHAR(90) NOT NULL,
	precio DOUBLE NOT NULL,
	cantidad INTEGER NOT NULL,
	cantidad_minima INTEGER NOT NULL,
	tipo INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (tipo) REFERENCES tipos_de_producto(ID));
	
CREATE TABLE PEDIDOS_PRODUCTOS (
	ID INT NOT NULL AUTO_INCREMENT,
	ID_Producto INT NOT NULL,
    ID_Pedido INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (ID_Producto) REFERENCES productos(ID),
    FOREIGN KEY (ID_Pedido) REFERENCES pedidos(ID));

CREATE TABLE INGREDIENTES (
	ID INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(90) NOT NULL,
    descripcion VARCHAR(90) NOT NULL,
	cantidad VARCHAR(90) NOT NULL,
	PRIMARY KEY (`ID`));

CREATE TABLE Proveedores (
    ID int NOT NULL AUTO_INCREMENT,
    telefono varchar(255) NOT NULL,
    nombre varchar(255) NOT NULL,
    ID_Ingrediente INTEGER NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (ID_Ingrediente) REFERENCES ingredientes(ID)
);

CREATE TABLE PRODUCTOS_INGREDIENTES (
	ID INT NOT NULL AUTO_INCREMENT,
	ID_Producto INT NOT NULL,
    ID_Ingrediente INT NOT NULL,
	PRIMARY KEY (`ID`),
	FOREIGN KEY (ID_Producto) REFERENCES productos(ID),
    FOREIGN KEY (ID_Ingrediente) REFERENCES ingredientes(ID));
CREATE TABLE Sucursales (
    IdSucursal int NOT NULL AUTO_INCREMENT,
    Nombre varchar(90) NOT NULL,
    Telefono varchar(20) NOT NULL,
    Ciudad varchar(255) NOT NULL,
    Colonia varchar(255) NOT NULL,
    Calle varchar(255) NOT NULL,
    Numero varchar(255) NOT NULL,
    Correo varchar(50) NOT NULL,
    HoraApertura varchar(10) Not null,
    HoraCierre varchar(10) not null,
    PRIMARY KEY (IdSucursal)
);
CREATE TABLE 'ci_sessions' (
 'id' varchar(128) NOT NULL,
 'ip_address' varchar(45) NOT NULL,
 'timestamp' int(10) unsigned DEFAULT 0 NOT NULL,
 'data' blob NOT NULL,
 KEY 'ci_sessions_timestamp' ('timestamp')
);
