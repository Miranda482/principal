USE `anm_san_juan`;

-- 1. Eliminar y recrear confirmacion_asistencia con fecha por defecto válida
DROP TABLE IF EXISTS `confirmacion_asistencia`;
CREATE TABLE `confirmacion_asistencia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `seccion` VARCHAR(150) NOT NULL,
  `evento` VARCHAR(150) NOT NULL,
  `creado_en` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 2. Eliminar y recrear contactos fijando el tipo de dato de 'mensaje' a TEXT
DROP TABLE IF EXISTS `contactos`;
CREATE TABLE `contactos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) DEFAULT NULL,
  `telefono` VARCHAR(10) DEFAULT NULL,
  `mensaje` TEXT DEFAULT NULL,
  `leido` TINYINT(1) DEFAULT 0,
  `creado_en` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;