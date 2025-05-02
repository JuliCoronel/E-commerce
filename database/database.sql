DROP DATABASE IF EXISTS tienda_master;
CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
image           varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;

INSERT INTO usuarios VALUES(null, 'Admin', 'Admin', 'admin@admin.com', 'Admin', 'admin', null);

CREATE TABLE categorias(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDB;

INSERT INTO categorias VALUES
(null, 'Remeras'),
(null, 'Pantalones'),
(null, 'Shorts'),
(null, 'Buzos'),
(null, 'Zapatillas');

CREATE TABLE productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100, 2) not null,
stock           int(255) not null,
oferta          varchar(2),
fecha           date not null,
imagen          varchar(255),       
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDB;

INSERT INTO productos VALUES (null, 2, 'Pantalon MIA', 'Wide leg tiro bajo', 50000.00, 40, NULL, CURDATE(), NULL);
INSERT INTO productos VALUES (null, 1, 'Camisa India', 'Camisa de rayas de algodón', 10000.00, 10, NULL, CURDATE(), NULL);
INSERT INTO productos VALUES (null, 2, 'Baggy Malena', 'Jean dama baggy celeste tiro medio', 60000.00, 24, NULL, CURDATE(), 'pantalon baggy.jpg');
INSERT INTO productos VALUES (null, 4, 'Buzo Flor 2.0', 'Buzo oversize 100% algodón color camel', 60000.00, 20, NULL, CURDATE(), 'buzo over 2.0.jpg');
INSERT INTO productos VALUES (null, 4, 'Buzo Julieta', 'Buzo Julieta de primavera, NO FRIZADO', 40000.00, 12, NULL, CURDATE(), 'buzo oversize.jpg');
INSERT INTO productos VALUES (null, 5, 'Zapatillas Tiana', 'Zapatillas Air Jordan 4 de muy buena calidad, producto 100% de calidad', 350000.00, 30, NULL, CURDATE(), 'zapatillas3.jpg');
INSERT INTO productos VALUES (null, 5, 'Zapatillas Andy', 'Zapatillas Jordan Air Retro 3, color blanco y rojo de calidad, 100% originales', 400000.00, 20, NULL, CURDATE(), 'zapatillas2.webp');
INSERT INTO productos VALUES (null, 5, 'Zapatillas Layla', 'Zapatillas Air Jordan 1 Low blanco y gris de hermosa calidad, producto 100% original', 230000.00, 15, NULL, CURDATE(), 'zapatillas1.webp');
INSERT INTO productos VALUES (null, 3, 'Short Mica', 'Short de jean azul desflecado, tiro medio y con excelente calidad. Bolsillos funcionales.', 25000.00, 45, NULL, CURDATE(), 'short1.webp');
INSERT INTO productos VALUES (null, 3, 'Short Ana', 'Short de jean celeste con dobladillo, tiro bajo y con bolsillos funcionales. ¡Lo vas a amar!', 30000.00, 30, NULL, CURDATE(), 'short2.webp');
INSERT INTO productos VALUES (null, 3, 'Short de morley', 'Short de tela morley negro. Súper fresco y moderno.', 15000.00, 50, NULL, CURDATE(), 'short3.jpg');
INSERT INTO productos VALUES (null, 3, 'Short Lina', 'Short de jean ajustado, tiro alto, celeste clarito y con dobladillo.', 19000.00, 73, NULL, CURDATE(), 'short4.webp');
INSERT INTO productos VALUES (null, 1, 'Remera Amanda', 'Top blanco de tirantes y ajustada. ¡Hermoso calce!', 13000.00, 35, NULL, CURDATE(), 'remera1.webp');
INSERT INTO productos VALUES (null, 1, 'Remera Mili', 'Top negro de manga corta al cuerpo. ¡Hermosa!', 14000.00, 34, NULL, CURDATE(), 'remera2.jpg');

CREATE TABLE pedidos(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
provincia       varchar(100) not null,
localidad       varchar(100) not null,
direccion       varchar(255) not null,  
coste           float(200, 2) not null,
estado          varchar(20) not null,
fecha           date not null,
hora            time,
CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE lineas_pedidos(
id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_lineas_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_lineas_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDB;

