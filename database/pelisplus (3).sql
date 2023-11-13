-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 20:04:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelisplus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id_director` int(11) NOT NULL,
  `Director` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Edad` int(2) NOT NULL,
  `Premios` int(3) NOT NULL,
  `MayorExito` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id_director`, `Director`, `Apellido`, `Edad`, `Premios`, `MayorExito`) VALUES
(1, 'Andy', 'Muschetti', 34, 0, 0),
(2, 'Peter', 'Jackson', 55, 0, 0),
(3, 'Ari', 'Aster', 45, 0, 0),
(4, 'Darren', 'Aranofsky', 55, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` text NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `Clasificacion_edad` int(2) NOT NULL,
  `Director` varchar(30) NOT NULL,
  `id_director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`ID`, `Nombre`, `Descripcion`, `Genero`, `Clasificacion_edad`, `Director`, `id_director`) VALUES
(4, 'It2', 'Terror', 'Pelicula', 18, 'Andy Muschietti', 1),
(12, 'Alien', 'Esta es una peli de aliens', 'Ciencia ficcion', 18, '0', 2),
(13, 'Requiem for a dream', 'Buena peli', 'Suspenso', 18, '0', 4),
(14, 'La ballena', 'Muy Buena peli', 'Drama', 18, 'Darren Aranofsky', 4),
(15, 'Midssomar', 'Esta es una movie de terror', 'Terror', 18, 'Ari Aster', 3),
(16, 'Noe', 'Esta es una movie biblica', 'Ciencia Ficcion', 18, 'Darren Aranofsky', 4),
(17, 'Noe', 'Esta es una movie biblica', 'Ciencia Ficcion', 18, 'Darren Aranofsky', 4),
(18, 'Noe', 'Esta es una movie biblica', 'Ciencia Ficcion', 18, 'Darren Aranofsky', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `clave` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `clave`) VALUES
(1, 'webadmin', '$2y$10$BTxgYHFq4.K/mBUX1c2Eduv9TGA248DiAI9/amTnm/MoZoq10CkzC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id_director`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_director` (`id_director`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id_director`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
