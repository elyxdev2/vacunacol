CREATE TABLE `usuarios` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `identificacion` varchar(12) NOT NULL,
  `correo` varchar(320) NOT NULL,
  `contrasena` varchar(320) NOT NULL,
  `genero` char NOT NULL,
  `foto` varchar(100)
);

CREATE TABLE `vacunas` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` integer NOT NULL,
  `fecha` date NOT NULL,
  `nombre_vacuna` varchar(30) NOT NULL,
  `dosis_necesarias` integer NOT NULL,
  `dosis_aplicadas` integer NOT NULL,
  `entidad_oficial` bool NOT NULL,
  `lugar` text NOT NULL,
  `descripcion` text
);

ALTER TABLE `vacunas` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
