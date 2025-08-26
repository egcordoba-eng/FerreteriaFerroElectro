CREATE DATABASE db_ferroelectro CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_ferroelectro;

CREATE TABLE usuarios(
	id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(30) NOT NULL,
    contrasena VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha_creacion DATETIME NOT NULL DEFAULT NOW(),
    estado TINYINT NOT NULL DEFAULT 1,
    rol VARCHAR(20) NOT NULL,
	CONSTRAINT CHK_usuario_longitud_minima CHECK(CHAR_LENGTH(nombre_usuario)>=4),
	CONSTRAINT CHK_contrasena_longitud_minima CHECK(CHAR_LENGTH(contrasena)>=4)
);
