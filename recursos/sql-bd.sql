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

CREATE TABLE calzados (
    estatus_calzado TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_calzado INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    marca TINYINT(1) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    talla VARCHAR(50) NOT NULL,
    genero TINYINT(1) NOT NULL COMMENT '1-> Dama, 0-> Caballero',
    precio DECIMAL(10,2) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen_calzado varchar(100) NOT NULL,
    destacado INT(1) NOT NULL
)ENGINE=InnoDB;

INSERT INTO `calzados` (`id_calzado`, `marca`, `modelo`, `color`, `talla`, `genero`, `descripcion`, `precio`, `imagen_calzado`, `destacado`) VALUES
(1, 1, 'Superstar', 'Cloud White / Core Black / Gold Metallic', '23-26', 1, 'No lo pienses. Ponte tu mejor atuendo. Esta noche brillarás. Los tenis adidas Superstar han sido un símbolo de expresión personal durante 50 años. Este par continúa con la tradición con llamativos detalles dorados. Lúcelos con estilo y deja que tu personalidad brille.', 1999.5, 'T1.jpg', 1),
(2, 1, 'U_Path X', 'Core Black / Cloud White / Screaming Pink', '23-26', 1, 'La vida pasa volando. Nadie lo puede negar y estos tenis adidas son los compañeros perfectos para seguirte el ritmo. La suela de caucho resiste al desgaste y el exterior en malla y piel llena de comodidad tu día a día ajetreado. ¿Y en los momentos de descanso? Pues, se sienten igual de suaves y cómodos.', 1840.2, 'T2.jpg', 0),
(3, 1, 'Atl', 'Azul - Blanco', '24-28', 0, 'Huaraches de alta tecnología con moda prehispánica.', 1250.5, 'huaraches-azules.jpg', 0),
(4, 1, 'Forum Bold', 'Off White / True Pink / Core Black', '23-26', 1, '¿Banqueta o pasarela? Ambas. ¿Extraños o bailarines profesionales? También ambos. Domina tu look y haz de las calles tu patio trasero con estos tenis adidas Forum. Inspirados en la actitud de los 80, llevan tu look diario a otro nivel con su suela tipo plataforma y un exterior único que evoca los comienzos de estilo vogue. No lo pienses. Haz tu mejor pose.', 2999, 'T3.jpg', 0),
(5, 1, 'Sonkei', 'Cloud White / Core Black / Bliss Purple', '22-25', 1, 'Estos tenis ofrecen un estilo deportivo y a la vez urbano que querrás llevar a todas partes. Con su estética divertida y diseño circular de arco infinito, los adidas Sonkei son tus nuevos tenis favoritos. Póntelos con un conjunto de pants y sudadera adidas o con un jean de cintura alta y viaja de regreso a los 80 con estilo.', 1399, 'T4.jpg', 0),
(6, 1, 'Nmd_R1', 'Core Black / Core Black / Gold Metallic', '22-25', 1, 'Cuando recibes un mensaje de texto con una invitación para salir a la calle no necesitas mucho convencimiento. Ni siquiera tienes que conocer los detalles. Sin importar el lugar o la actividad, siempre te anotas y estos tenis adidas NMD_R1 te acompañan a cada paso del camino con sus detalles metalizados para que nunca pases desapercibido.', 2999, 'T5.jpg', 0),
(7, 2, 'Cell Vive Clean Running', 'Elektro Peach', '22-26', 1, 'PUMA orgánicamente inspirado acciones lenguaje de diseño 10CELL su ADN a la célula de los zapatos corrientes Vive Limpio de las mujeres. de esta pieza precio accesible trae esta esculpido, célula-como la estructura de esta pieza el rendimiento post-moderna al pueblo.', 1799, 'T6.jpg', 0),
(12, 2, 'Running Resolve', 'High Risk Red-Puma Black', '25-30', 0, 'Abrir nuevos caminos en el concepto zapatilla de running con nuestra determinación de los zapatos corrientes, equipadas con lo último en tecnología de atletismo incluyendo CMEVA moldeada por compresión para un liso, paso acolchado y una suela de goma para el rebote final.', 1299, 'T10.jpg', 0),
(13, 2, 'Cruise Rider Silk Road', 'Green-Aquamarine', '22-26-5', 1, 'Inspirados en la belleza de los famosos Silk Road, estos tenis incluyen combinaciones de colores que crean un look muy original. La entresuela IMEVA te brinda liviandad y comodidad para que tus pies sean los más felices', 1999, 'T7.jpg', 0),
(14, 2, 'Electron Street Metallic ', 'Puma Black-Rose Gold', '22-26.5', 1, 'Estos tenis llamativos están inspirados en el mundo de la tecnología visual y son excelentes tanto en términos de estilo como de comodidad. Cuentan con elementos de marca audaces y paneles superiores contrastantes, que le dan un toque de estilo urbano a tu look. Tienen un diseño tecnológico en el talón que se combina con la plantilla SoftFoam+ de PUMA para amortiguar cada paso que das durante el día.\r\n', 1799, 'T8.jpg', 0),
(15, 2, 'RS-Curve Glow L', 'Plein Air-Puma White-Peach', '22-26.5', 1, 'Ingrese a un mundo nuevo y brillante con el futurista RS-Curve Glow, una adición específica para mujeres a la icónica familia RS. La parte superior de tela presenta detalles metálicos y llamativos estampados ondulados para una apariencia llamativa.\r\n', 2599, 'T9.jpg', 0),
(16, 2, 'Rs-X Mix', 'Black-CASTLEROCK-Yell. Alert', '25-30', 0, 'Equípate con lo mejor de ambos mundos gracias a nuestros tenis RS-X Mix, una incorporación a nuestra familia RS-X. Este diseño toma todas las innovaciones textiles de más éxito de las cuatro últimas temporadas y sube su volumen, todo para crear una experiencia moderna, cómoda y atrevida que encantará a los amantes de la moda urbana.\r\n', 2599, 'T11.jpg', 0),
(17, 2, 'Electron Street', 'Quarry-Puma White-Gum', '22.5-30', 0, 'Creadas para la calle, las Electron Street presentan un impresionante estilo viztech donde destaca un complemento de talón con tecnología visible que absorbe los impactos para caminar cómodamente. Corre rápida y cómodamente por las calles gracias al exterior de punto transpirable, paneles sintéticos para una mayor sujeción y un elástico en el talón con la marca. La plantilla SoftFoam+ ofrece una amortiguación superior y comodidad óptima a cada paso.\r\n', 1799, 'T12.jpg', 0),
(18, 1, 'NmdD_R1', 'Core Black / Core Black / Core Black', '25-29.5', 0, 'Entra en acción con los llamativos estampados inspirados en videojuegos de los tenis NMD_R1. Sus inconfundibles inserciones en la mediasuela te mantienen en lo más alto del juego. Siente el legado nómada de los NMD al canalizar la amortiguación con retorno de energía y muévete en un mundo de nuevas posibilidades. Rinde tributo al pasado mientras miras hacia el futuro con unos tenis que se ven y se sienten bien.\r\n', 2999, 'T13.jpg', 0),
(19, 1, 'Harden Stepback 2', 'Yellow / Crew Yellow / Royal Blue', '25.5-28', 0, 'Un poco de color no está demás cuando estás encestando sin parar. Creados para el estilo de juego distintivo de James Harden, estos tenis de básquet adidas tienen una mediasuela Bounce flexible que brinda la amortiguación que necesitas para atacar el aro rival. Los detalles en color de contraste en el exterior te hacen notar en cada rincón de la cancha.\r\n', 1999, 'T14.jpg', 0),
(20, 3, 'Air Max Infinity', 'White', '22', 1, 'Estos zapatos casuales combinan una parte de material sintético para una gran comodidad y durabilidad, además de tener cordones que se ajustan a tu medida. Su principal atractivo es su unidad Max Air en el talón que se encarga de dar amortiguación en cada una de tus pisadas y su suela de goma añade agarre seguro.\r\n', 1999, 'T15.jpg', 0),
(21, 3, 'Air Max VG-R', 'White', '25-29', 0, 'Camina suave y cómodamente con los Tenis Nike Air Max VG-R para hombres. Podrás combinarlos con muchas cosas, ya que son perfectos para tu porte casual regular.\r\n', 1999, 'T16.jpg', 0),
(22, 3, 'SuperRep Go', 'Gray', '22-27', 1, 'El calzado deportivo Nike de dama tiene la frescura ideal para tu pie mientras te mueves con intensidad por su confección de malla en la parte superior, la amortiguación en cada salto, paso y sentadillas brinda la comodidad con espuma en la parte interna y el arco hacia el exterior con suela de goma más resistente en áreas de tracción.\r\n', 2099, 'T17.jpg', 0),
(23, 3, 'Air Zoom Winflo 7', 'Red', '28.5', 0, 'Los Tenis Nike Air Zoom Winflo 7 quedan perfecto contigo que buscas calzado de calidad, que sean ligeros y cómodos, además de lucir increíbles gracias a su diseño.\r\n', 2099, 'T18.jpg', 0),
(24, 4, 'Nano X1', 'Negro', '26-19', 0, 'Los Tenis Reebok Nano X1 de hombres están listos para ejercicios de mayor intensidad como escaladoras de montaña, saltar al cajón para mayor impulso, levantar pesas para fortalecer tus músculos y empezar a rodar la llanta en días de Crossfit incrementando tu rendimiento deportivo.', 2699, 'T19.jpg', 0),
(25, 4, 'Nano X', 'Gray', '22.5-23', 1, 'Los Tenis Reebok Nano X para Mujeres te permitirán la comodidad para esos entrenamientos intensos y que sientes un apoyo nulo, este par te acompaña desde el principio de tu calentamiento hasta el ultimo burpee, tienen la amortiguación ligera para cada salto en tu rutina complicada.', 2699, 'T20.jpg', 0),
(26, 4, 'Royal Complete Clean 2.0', 'White', '25-28', 0, 'Camina suave y cómodamente con los Tenis Reebok Royal Complete Clean 2.0 Unisex. Te ofrecen un gran estilo a tus pies y esto los hacen sencillos de poder combinar con muchas cosas que gustes ponerte.', 999, 'T21.jpg', 0),
(27, 4, 'Freestyle Motion Lo', 'Arena', '22.5-25.5', 1, 'Este calzado deportivo es ideal para que luzcas en cada entrenamiento, su ligereza te brinda un rendimiento óptimo para seguir con gran parte de tus ejercicios, en la parte superior cuenta con un tejido de malla para una mayor transpirabilidad para el pie y con la flexibilidad para los movimientos de más agilidad.', 1899, 'T22.jpg', 0),
(28, 3, 'Cosmic Unity Amalgam', 'Black', '25-28', 0, 'Este calzado en color negro y verde tiene una construcción de un mínimo de 20% materiales reciclados. Mantienen así la transpiribilidad y también los hacen más ligeros. Cuentan con unas agujetas y lengüeta, que son sencillas de ajustar.', 3399, 'T23.jpg', 0),
(29, 3, ' Air Zoom Terra Kiger 7', 'Green', '25-30', 0, 'Los Tenis Nike Air Zoom Terra Kiger 7 son para trail running especiales para terrenos rocosos, el diseño es ligero y veloz para mantener un ritmo alto en tus entrenamientos. La parte superior está hecha de material de malla y dan una ventilación adicional, el sistema Dynamic Fit se ajusta cómodamente alrededor del mediopié.', 2699, 'T24.jpg', 0),
(30, 5, 'Classic Slip-On Bandana Yellow', 'Yellow', '25-28', 0, 'Siente la comodidad y suavidad que VANS te ofrece en cada paso con los Tenis Vans Classic Slip-On Bandana Yellow para hombres. Estupendos y perfectos para cualquier día de la semana que gustes ponértelos.', 1999, 'T25.jpg', 0),
(31, 5, 'Old Skool Shale Green', 'Green', '25.5-28', 0, 'Los Tenis Vans Old Skool Shale Green para hombres son perfectos para cualquier día de la semana. Son estupendos para tu porte casual regular y podrás combinarlos con cualquier cosa que gustes ponerte.', 1199, 'T26.jpg', 0),
(32, 5, 'Style 36 Bandana True Blue', 'Blue', '26-30', 0, 'Siente la suavidad y comodidad que VANS te ofrece con los Tenis Vans Style 36 Bandana True Blue para hombres. Estupendos para tu porte casual regular.', 1299, 'T27.jpg', 0),
(33, 5, 'Old Skool Ditsy Floral', 'Multicolor', '24.5-25.5', 1, 'Con un tono primaveral es que llegan los Tenis Vans Old Skool Ditsy Floral. Estupendos para tu porte casual regular y combinar con cualquier cosa que gustes.', 1299, 'T28.jpg', 0),
(34, 5, 'Ultrarange Rapidweld', 'Pick', '22.5-26', 1, 'Los tenis Vans Ultrarange Rapidweld para mujeres mezclan el estilo deportivo y moderno para usar en tu día, además de usar en cualquier ocasión, ya que aportan un diseño versátil y muy cómodo.', 1799, 'T29.jpg', 0),
(35, 5, 'Checkerboard Classic Slip.On', 'Multicolor', '24.5', 1, 'Los Tenis Vans Checkerboard Classic Slip.On unisex son un calzado clásico y de los más famosos de Vans. Sin duda, deben formar parte de tu colección y usar en tus looks diarios.', 999, 'T30.jpg', 0);


CREATE TABLE ofertas (
    estatus_ofertas TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_oferta INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descuento DECIMAL(10,2) NOT NULL,
    fin_oferta DATE NOT NULL,
    id_calzado INT(11) NOT NULL,
    FOREIGN KEY(id_calzado) REFERENCES calzados (id_calzado) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;