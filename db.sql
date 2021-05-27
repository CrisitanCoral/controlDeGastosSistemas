CREATE DATABASE GESTOR_FACTURAS;


USE GESTOR_FACTURAS;


CREATE TABLE USUARIOS ( 
ID_USUARIO INT NOT NULL AUTO_INCREMENT,
NOMBRE_USUARIO VARCHAR(20) NOT NULL,
APELLIDO_USUARIO VARCHAR(20) NOT NULL,
CORREO_USUARIO VARCHAR(50) NOT NULL, 
CLAVE_USUARIO VARCHAR(20) NOT NULL, 
FECHA_CREACION DATE NOT NULL, 
CONSTRAINT PK_USUARIO PRIMARY KEY (ID_USUARIO) 
);


CREATE TABLE PROVEEDORES ( 
NIT_PROVEEDOR INT NOT NULL, 
NOMBRE_PROVEEDOR VARCHAR(20) NOT NULL,
TELEFONO_PROVEEDOR VARCHAR(20) NOT NULL,
DIRECCION_PROVEEDOR VARCHAR(20),
CORREO_PROVEEDOR VARCHAR(20) NOT NULL,
FECHA_CREACION DATE NOT NULL,
CONSTRAINT PK_PROVEEDORES PRIMARY KEY (NIT_PROVEEDOR) 
);


CREATE TABLE FACTURAS (
ID_FACTURA INT NOT_NULL AUTO_INCREMENT,
NUMERO_FACTURA INT NOT NULL,
NIT_PROVEEDOR INT NOT NULL,
FECHA_EMISION DATE NOT NULL,
FECHA_VENCE DATE NOT NULL,
CONCEPTO VARCHAR(200) NOT NULL,
VALOR INT(20) NOT NULL,
FECHA_ACTUALIZACION DATE,
ESTADO_FACTURA VARCHAR(20),
CONSTRAINT PK_FACTURAS PRIMARY KEY (ID_FACTURA)
);


CREATE TABLE HISTORICO_FACTURAS (
ID_FACTURA INT NOT NULL AUTO_INCREMENT,
NUMERO_FACTURA INT NOT NULL,
NIT_PROVEEDOR INT NOT NULL,
FECHA_EMISION DATE NOT NULL,
FECHA_VENCE DATE NOT NULL,
CONCEPTO VARCHAR(200) NOT NULL,
VALOR INT(20) NOT NULL,
FECHA_ACTUALIZACION DATE,
ESTADO_FACTURA VARCHAR(20),
CONSTRAINT PK_FACTURAS PRIMARY KEY (ID_FACTURA)
);
