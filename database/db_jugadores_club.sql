-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2023 a las 22:55:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_jugadores/club`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `id_club` int(11) NOT NULL,
  `Nombre_club` varchar(45) NOT NULL,
  `Fundacion` date NOT NULL,
  `Titulos_nacionales` int(11) DEFAULT NULL,
  `Titulos_internacionales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`id_club`, `Nombre_club`, `Fundacion`, `Titulos_nacionales`, `Titulos_internacionales`) VALUES
(1, 'Inter de Miami', '2018-01-29', 1, NULL),
(2, 'Aston Villa', '1874-03-01', 14, 2),
(3, 'River Plate', '1901-05-25', 52, 12),
(4, 'Villareal', '1923-03-10', 1, 1),
(5, 'Atletico Madrid', '1903-05-02', 23, 9),
(6, 'Sevilla', '1890-01-20', 7, 8),
(7, 'Lyon', '1899-08-03', 46, 2),
(8, 'Manchester United', '1910-02-19', 71, 6),
(9, 'Benfica', '1904-02-28', 81, 2),
(10, 'Tottenham', '1882-09-05', 21, 2),
(11, 'Real Betis', '1907-09-12', 10, NULL),
(12, 'Leverkusen', '1904-07-01', 3, 1),
(13, 'Brighton', '1901-10-10', 9, NULL),
(14, 'Juventus', '1897-11-01', 51, 11),
(15, 'Manchester City', '1880-11-23', 38, 2),
(16, 'Inter de Milan', '1908-03-09', 35, 9),
(17, 'Roma', '1927-07-13', 15, 5),
(18, 'Atlanta United', '2017-03-05', 3, NULL),
(19, 'Chelsea', '1905-03-10', 37, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Posicion` varchar(45) NOT NULL,
  `Cantidad_de_goles` int(11) DEFAULT NULL,
  `id_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `Nombre`, `Edad`, `Posicion`, `Cantidad_de_goles`, `id_club`) VALUES
(1, 'Lionel Messi', 36, 'Delantero', 819, 1),
(2, 'Emiliano Martinez', 31, 'Arquero', NULL, 2),
(3, 'Franco Armani', 36, 'Arquero', NULL, 3),
(4, 'Geronimo Rulli', 30, 'Arquero', NULL, 4),
(5, 'Nahuel Molina', 24, 'Defensor', 18, 5),
(6, 'Gonzalo Montiel', 25, 'Defensor', 8, 6),
(7, 'Marcos Acuña', 31, 'Defensor', 40, 6),
(8, 'Nicolas Tagliafico', 30, 'Defensor', 20, 7),
(9, 'Lisandro Martinez', 24, 'Defensor', 11, 8),
(10, 'Nicolas Otamendi', 34, 'Defensor', 4, 9),
(11, 'Cristian Romero', 24, 'Defensor', 2, 10),
(12, 'German Pezzela', 31, 'Defensor', 17, 11),
(13, 'Juan Foyth', 24, 'Defensor', 5, 4),
(14, 'Rodrigo De Paul', 28, 'Mediocampista', 51, 5),
(15, 'Alejandro Gomez', 34, 'Delantero', 120, 6),
(16, 'Guido Rodriguez', 28, 'Mediocampista', 31, 11),
(17, 'Exequiel Palacios', 24, 'Mediocampista', 20, 12),
(18, 'Alexis Mac Allister', 23, 'Mediocampista', 35, 13),
(19, 'Leandro Paredes', 28, 'Mediocampista', 30, 14),
(20, 'Angel Correa', 27, 'Mediocampista', 68, 5),
(21, 'Julian Alvarez', 22, 'Delantero', 84, 15),
(22, 'Lautaro Martinez', 25, 'Delantero', 118, 16),
(23, 'Angel Di Maria', 34, 'Delantero', 189, 9),
(24, 'Paulo Dybala', 29, 'Delantero', 176, 17),
(25, 'Thiago Almada', 21, 'Delantero', 42, 18),
(26, 'Enzo Fernandez', 21, 'Mediocampista', 21, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id_club`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Club` (`id_club`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `club`
--
ALTER TABLE `club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `club` (`id_club`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
