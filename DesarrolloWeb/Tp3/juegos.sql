CREATE DATABASE retrogame;


CREATE TABLE `juegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `plataforma` varchar(255) NOT NULL,
  `año` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `idioma` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;
--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`nombre`, `empresa`, `plataforma`, `año`, `categoria`, `idioma`, `estado`, `precio`, `id`) VALUES('Final Fantasy VII', 'Square Enix', 'Playstation', 1997, 'RPG', 'ingles', 'Buen estado', 10000, 1);
INSERT INTO `juegos` (`nombre`, `empresa`, `plataforma`, `año`, `categoria`, `idioma`, `estado`, `precio`, `id`) VALUES('Mega Man', 'Capcom', 'NES', 1987, 'Plataformas', 'Ingles', 'Buen estado', 2000, 2);
INSERT INTO `juegos` (`nombre`, `empresa`, `plataforma`, `año`, `categoria`, `idioma`, `estado`, `precio`, `id`) VALUES('Crash Bandicoot', 'Naughty Dog', 'PlayStation', 1996, 'Plataformas', 'Español', 'Mint', 3500, 3);
INSERT INTO `juegos` (`nombre`, `empresa`, `plataforma`, `año`, `categoria`, `idioma`, `estado`, `precio`, `id`) VALUES('Mortal Kombat', 'Midway', 'SNES', 1992, 'Lucha', 'Ingles', 'Mint', 3500, 4);
INSERT INTO `juegos` (`nombre`, `empresa`, `plataforma`, `año`, `categoria`, `idioma`, `estado`, `precio`, `id`) VALUES('Donkey Kong', 'Nintendo', 'Arcade', 1981, 'Arcade', 'Ingles', 'Con Detalles', 35000, 5);


