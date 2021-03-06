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
    destacado INT(1) NOT NULL,
    fecha DATE NOT NULL
)ENGINE=InnoDB;

INSERT INTO `calzados` (`id_calzado`, `marca`, `modelo`, `color`, `talla`, `genero`, `descripcion`, `precio`, `imagen_calzado`, `destacado`, `fecha`) VALUES
(1, 1, 'Superstar', 'Cloud White / Core Black / Gold Metallic', '23-26', 1, 'No lo pienses. Ponte tu mejor atuendo. Esta noche brillar??s. Los tenis adidas Superstar han sido un s??mbolo de expresi??n personal durante 50 a??os. Este par contin??a con la tradici??n con llamativos detalles dorados. L??celos con estilo y deja que tu personalidad brille.', 1999.5, 'T1.jpg', 1, '2022-04-07'),
(2, 1, 'U_Path X', 'Core Black / Cloud White / Screaming Pink', '23-26', 1, 'La vida pasa volando. Nadie lo puede negar y estos tenis adidas son los compa??eros perfectos para seguirte el ritmo. La suela de caucho resiste al desgaste y el exterior en malla y piel llena de comodidad tu d??a a d??a ajetreado. ??Y en los momentos de descanso? Pues, se sienten igual de suaves y c??modos.', 1840.2, 'T2.jpg', 0, '2022-04-07'),
(3, 1, 'Atl', 'Azul - Blanco', '24-28', 0, 'Huaraches de alta tecnolog??a con moda prehisp??nica.', 1250.5, 'huaraches-azules.jpg', 0 ,'2022-04-07'),
(4, 1, 'Forum Bold', 'Off White / True Pink / Core Black', '23-26', 1, '??Banqueta o pasarela? Ambas. ??Extra??os o bailarines profesionales? Tambi??n ambos. Domina tu look y haz de las calles tu patio trasero con estos tenis adidas Forum. Inspirados en la actitud de los 80, llevan tu look diario a otro nivel con su suela tipo plataforma y un exterior ??nico que evoca los comienzos de estilo vogue. No lo pienses. Haz tu mejor pose.', 2999, 'T3.jpg', 0, '2022-04-07'),
(5, 1, 'Sonkei', 'Cloud White / Core Black / Bliss Purple', '22-25', 1, 'Estos tenis ofrecen un estilo deportivo y a la vez urbano que querr??s llevar a todas partes. Con su est??tica divertida y dise??o circular de arco infinito, los adidas Sonkei son tus nuevos tenis favoritos. P??ntelos con un conjunto de pants y sudadera adidas o con un jean de cintura alta y viaja de regreso a los 80 con estilo.', 1399, 'T4.jpg', 0, '2022-04-07'),
(6, 1, 'Nmd_R1', 'Core Black / Core Black / Gold Metallic', '22-25', 1, 'Cuando recibes un mensaje de texto con una invitaci??n para salir a la calle no necesitas mucho convencimiento. Ni siquiera tienes que conocer los detalles. Sin importar el lugar o la actividad, siempre te anotas y estos tenis adidas NMD_R1 te acompa??an a cada paso del camino con sus detalles metalizados para que nunca pases desapercibido.', 2999, 'T5.jpg', 0, '2022-04-07'),
(7, 2, 'Cell Vive Clean Running', 'Elektro Peach', '22-26', 1, 'PUMA org??nicamente inspirado acciones lenguaje de dise??o 10CELL su ADN a la c??lula de los zapatos corrientes Vive Limpio de las mujeres. de esta pieza precio accesible trae esta esculpido, c??lula-como la estructura de esta pieza el rendimiento post-moderna al pueblo.', 1799, 'T6.jpg', 0, '2022-04-07'),
(12, 2, 'Running Resolve', 'High Risk Red-Puma Black', '25-30', 0, 'Abrir nuevos caminos en el concepto zapatilla de running con nuestra determinaci??n de los zapatos corrientes, equipadas con lo ??ltimo en tecnolog??a de atletismo incluyendo CMEVA moldeada por compresi??n para un liso, paso acolchado y una suela de goma para el rebote final.', 1299, 'T10.jpg', 0, '2022-04-07'),
(13, 2, 'Cruise Rider Silk Road', 'Green-Aquamarine', '22-26-5', 1, 'Inspirados en la belleza de los famosos Silk Road, estos tenis incluyen combinaciones de colores que crean un look muy original. La entresuela IMEVA te brinda liviandad y comodidad para que tus pies sean los m??s felices', 1999, 'T7.jpg', 0, '2022-04-07'),
(14, 2, 'Electron Street Metallic ', 'Puma Black-Rose Gold', '22-26.5', 1, 'Estos tenis llamativos est??n inspirados en el mundo de la tecnolog??a visual y son excelentes tanto en t??rminos de estilo como de comodidad. Cuentan con elementos de marca audaces y paneles superiores contrastantes, que le dan un toque de estilo urbano a tu look. Tienen un dise??o tecnol??gico en el tal??n que se combina con la plantilla SoftFoam+ de PUMA para amortiguar cada paso que das durante el d??a.\r\n', 1799, 'T8.jpg', 0, '2022-04-07'),
(15, 2, 'RS-Curve Glow L', 'Plein Air-Puma White-Peach', '22-26.5', 1, 'Ingrese a un mundo nuevo y brillante con el futurista RS-Curve Glow, una adici??n espec??fica para mujeres a la ic??nica familia RS. La parte superior de tela presenta detalles met??licos y llamativos estampados ondulados para una apariencia llamativa.\r\n', 2599, 'T9.jpg', 0, '2022-04-07'),
(16, 2, 'Rs-X Mix', 'Black-CASTLEROCK-Yell. Alert', '25-30', 0, 'Equ??pate con lo mejor de ambos mundos gracias a nuestros tenis RS-X Mix, una incorporaci??n a nuestra familia RS-X. Este dise??o toma todas las innovaciones textiles de m??s ??xito de las cuatro ??ltimas temporadas y sube su volumen, todo para crear una experiencia moderna, c??moda y atrevida que encantar?? a los amantes de la moda urbana.\r\n', 2599, 'T11.jpg', 0, '2022-04-07'),
(17, 2, 'Electron Street', 'Quarry-Puma White-Gum', '22.5-30', 0, 'Creadas para la calle, las Electron Street presentan un impresionante estilo viztech donde destaca un complemento de tal??n con tecnolog??a visible que absorbe los impactos para caminar c??modamente. Corre r??pida y c??modamente por las calles gracias al exterior de punto transpirable, paneles sint??ticos para una mayor sujeci??n y un el??stico en el tal??n con la marca. La plantilla SoftFoam+ ofrece una amortiguaci??n superior y comodidad ??ptima a cada paso.\r\n', 1799, 'T12.jpg', 0, '2022-04-07'),
(18, 1, 'NmdD_R1', 'Core Black / Core Black / Core Black', '25-29.5', 0, 'Entra en acci??n con los llamativos estampados inspirados en videojuegos de los tenis NMD_R1. Sus inconfundibles inserciones en la mediasuela te mantienen en lo m??s alto del juego. Siente el legado n??mada de los NMD al canalizar la amortiguaci??n con retorno de energ??a y mu??vete en un mundo de nuevas posibilidades. Rinde tributo al pasado mientras miras hacia el futuro con unos tenis que se ven y se sienten bien.\r\n', 2999, 'T13.jpg', 0, '2022-04-07'),
(19, 1, 'Harden Stepback 2', 'Yellow / Crew Yellow / Royal Blue', '25.5-28', 0, 'Un poco de color no est?? dem??s cuando est??s encestando sin parar. Creados para el estilo de juego distintivo de James Harden, estos tenis de b??squet adidas tienen una mediasuela Bounce flexible que brinda la amortiguaci??n que necesitas para atacar el aro rival. Los detalles en color de contraste en el exterior te hacen notar en cada rinc??n de la cancha.\r\n', 1999, 'T14.jpg', 0, '2022-04-07'),
(20, 3, 'Air Max Infinity', 'White', '22', 1, 'Estos zapatos casuales combinan una parte de material sint??tico para una gran comodidad y durabilidad, adem??s de tener cordones que se ajustan a tu medida. Su principal atractivo es su unidad Max Air en el tal??n que se encarga de dar amortiguaci??n en cada una de tus pisadas y su suela de goma a??ade agarre seguro.\r\n', 1999, 'T15.jpg', 0, '2022-04-07'),
(21, 3, 'Air Max VG-R', 'White', '25-29', 0, 'Camina suave y c??modamente con los Tenis Nike Air Max VG-R para hombres. Podr??s combinarlos con muchas cosas, ya que son perfectos para tu porte casual regular.\r\n', 1999, 'T16.jpg', 0, '2022-04-07'),
(22, 3, 'SuperRep Go', 'Gray', '22-27', 1, 'El calzado deportivo Nike de dama tiene la frescura ideal para tu pie mientras te mueves con intensidad por su confecci??n de malla en la parte superior, la amortiguaci??n en cada salto, paso y sentadillas brinda la comodidad con espuma en la parte interna y el arco hacia el exterior con suela de goma m??s resistente en ??reas de tracci??n.\r\n', 2099, 'T17.jpg', 0, '2022-04-07'),
(23, 3, 'Air Zoom Winflo 7', 'Red', '28.5', 0, 'Los Tenis Nike Air Zoom Winflo 7 quedan perfecto contigo que buscas calzado de calidad, que sean ligeros y c??modos, adem??s de lucir incre??bles gracias a su dise??o.\r\n', 2099, 'T18.jpg', 0, '2022-04-07'),
(24, 4, 'Nano X1', 'Negro', '26-19', 0, 'Los Tenis Reebok Nano X1 de hombres est??n listos para ejercicios de mayor intensidad como escaladoras de monta??a, saltar al caj??n para mayor impulso, levantar pesas para fortalecer tus m??sculos y empezar a rodar la llanta en d??as de Crossfit incrementando tu rendimiento deportivo.', 2699, 'T19.jpg', 0, '2022-04-07'),
(25, 4, 'Nano X', 'Gray', '22.5-23', 1, 'Los Tenis Reebok Nano X para Mujeres te permitir??n la comodidad para esos entrenamientos intensos y que sientes un apoyo nulo, este par te acompa??a desde el principio de tu calentamiento hasta el ultimo burpee, tienen la amortiguaci??n ligera para cada salto en tu rutina complicada.', 2699, 'T20.jpg', 0, '2022-04-07'),
(26, 4, 'Royal Complete Clean 2.0', 'White', '25-28', 0, 'Camina suave y c??modamente con los Tenis Reebok Royal Complete Clean 2.0 Unisex. Te ofrecen un gran estilo a tus pies y esto los hacen sencillos de poder combinar con muchas cosas que gustes ponerte.', 999, 'T21.jpg', 0, '2022-04-07'),
(27, 4, 'Freestyle Motion Lo', 'Arena', '22.5-25.5', 1, 'Este calzado deportivo es ideal para que luzcas en cada entrenamiento, su ligereza te brinda un rendimiento ??ptimo para seguir con gran parte de tus ejercicios, en la parte superior cuenta con un tejido de malla para una mayor transpirabilidad para el pie y con la flexibilidad para los movimientos de m??s agilidad.', 1899, 'T22.jpg', 0, '2022-04-07'),
(28, 3, 'Cosmic Unity Amalgam', 'Black', '25-28', 0, 'Este calzado en color negro y verde tiene una construcci??n de un m??nimo de 20% materiales reciclados. Mantienen as?? la transpiribilidad y tambi??n los hacen m??s ligeros. Cuentan con unas agujetas y leng??eta, que son sencillas de ajustar.', 3399, 'T23.jpg', 0, '2022-04-07'),
(29, 3, ' Air Zoom Terra Kiger 7', 'Green', '25-30', 0, 'Los Tenis Nike Air Zoom Terra Kiger 7 son para trail running especiales para terrenos rocosos, el dise??o es ligero y veloz para mantener un ritmo alto en tus entrenamientos. La parte superior est?? hecha de material de malla y dan una ventilaci??n adicional, el sistema Dynamic Fit se ajusta c??modamente alrededor del mediopi??.', 2699, 'T24.jpg', 0, '2022-04-07'),
(30, 5, 'Classic Slip-On Bandana Yellow', 'Yellow', '25-28', 0, 'Siente la comodidad y suavidad que VANS te ofrece en cada paso con los Tenis Vans Classic Slip-On Bandana Yellow para hombres. Estupendos y perfectos para cualquier d??a de la semana que gustes pon??rtelos.', 1999, 'T25.jpg', 0, '2022-04-07'),
(31, 5, 'Old Skool Shale Green', 'Green', '25.5-28', 0, 'Los Tenis Vans Old Skool Shale Green para hombres son perfectos para cualquier d??a de la semana. Son estupendos para tu porte casual regular y podr??s combinarlos con cualquier cosa que gustes ponerte.', 1199, 'T26.jpg', 0, '2022-04-07'),
(32, 5, 'Style 36 Bandana True Blue', 'Blue', '26-30', 0, 'Siente la suavidad y comodidad que VANS te ofrece con los Tenis Vans Style 36 Bandana True Blue para hombres. Estupendos para tu porte casual regular.', 1299, 'T27.jpg', 0, '2022-04-07'),
(33, 5, 'Old Skool Ditsy Floral', 'Multicolor', '24.5-25.5', 1, 'Con un tono primaveral es que llegan los Tenis Vans Old Skool Ditsy Floral. Estupendos para tu porte casual regular y combinar con cualquier cosa que gustes.', 1299, 'T28.jpg', 0, '2022-04-07'),
(34, 5, 'Ultrarange Rapidweld', 'Pick', '22.5-26', 1, 'Los tenis Vans Ultrarange Rapidweld para mujeres mezclan el estilo deportivo y moderno para usar en tu d??a, adem??s de usar en cualquier ocasi??n, ya que aportan un dise??o vers??til y muy c??modo.', 1799, 'T29.jpg', 0, '2022-04-07'),
(35, 5, 'Checkerboard Classic Slip.On', 'Multicolor', '24.5', 1, 'Los Tenis Vans Checkerboard Classic Slip.On unisex son un calzado cl??sico y de los m??s famosos de Vans. Sin duda, deben formar parte de tu colecci??n y usar en tus looks diarios.', 999, 'T30.jpg', 0, '2022-04-07');


CREATE TABLE ofertas (
    estatus_ofertas TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_oferta INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descuento DECIMAL(10,2) NOT NULL,
    fin_oferta DATE NOT NULL,
    id_calzado INT(11) NOT NULL,
    FOREIGN KEY(id_calzado) REFERENCES calzados (id_calzado) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;