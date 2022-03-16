DROP DATABASE IF EXISTS tustennis;
CREATE DATABASE IF NOT EXISTS tustennis DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE tustennis;

GRANT ALL PRIVILEGES ON tustennis.* TO 'usuariotustennis'@'localhost' IDENTIFIED BY 'usuariotustennispassword';


CREATE TABLE roles (
    estatus_rol TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_rol INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(40) NOT NULL
)ENGINE=InnoDB;

INSERT INTO roles (estatus_rol, id_rol, rol) VALUES
('2', 784, 'Superadmin'),
('2', 444, 'Operador');

CREATE TABLE usuarios (
    estatus_usuario TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_usuario INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    ap_paterno_usuario VARCHAR(50) NOT NULL,
    ap_materno_usuario VARCHAR(50) NOT NULL,
    sexo_usuario TINYINT(1) NOT NULL COMMENT '0-> Femenino, 1-> Masculino',
    imagen_usuario VARCHAR(100)  NULL,
    email_usuario VARCHAR(100) NOT NULL,
    password_usuario VARCHAR(64) NOT NULL,
    id_rol INT(3) NOT NULL,
    FOREIGN KEY(id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

INSERT INTO usuarios (estatus_usuario, id_usuario, nombre_usuario, ap_paterno_usuario, ap_materno_usuario,
sexo_usuario, imagen_usuario, email_usuario, password_usuario, id_rol) 
VALUES
('2', NULL, 'Juan Pablo', 'Gutierres', 'Ramirez',1,NULL,'juan-pablo@live.com',SHA2('abc123',0),784),
('2', NULL, 'Cris', 'Mendoza', 'Rivas',1,NULL,'cris-mendoza@live.com',SHA2('abc123',0),444);

 select * from usuarios where password_usuario='juan-pablo@live.com' and password_usuario = sha2('abc123',0);