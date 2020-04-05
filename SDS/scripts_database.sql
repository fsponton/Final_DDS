CREATE DATABASE IF NOT EXISTS systemDigitalStock;

CREATE TABLE usuarios(
id    					int(255) auto_increment not null,
nombre	 				varchar(255) not null,
apellidos	 			varchar(255) not null,
password 				varchar(255) not null,
fecha_alta 	 			date not null,
fecha_actualizacion 	date not null,
activo  				boolean,
tipo                                    varchar(255) not null,
CONSTRAINT pk_usuarios PRIMARY KEY (id)
)ENGINE=InnoDB;

-- usuario admin
INSERT INTO `usuarios` VALUES (NULL, 'CARLOS', 'PEREZ', '123456', CURDATE(), CURDATE(), 1, 'ADMIN');

