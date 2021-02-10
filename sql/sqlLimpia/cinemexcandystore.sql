-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2020 a las 04:36:45
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinemexcandystore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogue`
--

CREATE TABLE `catalogue` (
  `id` int(5) NOT NULL,
  `code` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `maxStock` int(5) NOT NULL,
  `minStock` int(5) NOT NULL,
  `categoryID` int(3) NOT NULL,
  `containerID` int(3) NOT NULL,
  `dateExpiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `code` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `code`, `description`) VALUES
(1, 'Pre', 'Predecedero'),
(2, 'NoPre', 'No predecedero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `containers`
--

CREATE TABLE `containers` (
  `id` int(5) NOT NULL,
  `class` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `containers`
--

INSERT INTO `containers` (`id`, `class`, `description`) VALUES
(1, 'Cost', 'Costal'),
(2, 'Botl', 'Botella'),
(3, 'Caja', 'Caja'),
(4, 'Gal', 'Galon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inputs`
--

CREATE TABLE `inputs` (
  `id` int(5) NOT NULL,
  `inputDate` date NOT NULL,
  `cuantity` int(5) NOT NULL,
  `catalogueID` int(3) NOT NULL,
  `userID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `outputs`
--

CREATE TABLE `outputs` (
  `id` int(5) NOT NULL,
  `outputDate` date NOT NULL,
  `cuantity` int(5) NOT NULL,
  `catalogueID` int(3) NOT NULL,
  `userID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `typeusers`
--

CREATE TABLE `typeusers` (
  `id` int(5) NOT NULL,
  `class` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `typeusers`
--

INSERT INTO `typeusers` (`id`, `class`, `description`) VALUES
(1, 'Admr', 'Administrador'),
(2, 'Gte', 'Gerente'),
(3, 'Emp', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `motherLastName` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `typeID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `motherLastName`, `password`, `typeID`) VALUES
(1, 'Cesar', 'Candia', 'Chazari', 'password', 1),
(2, 'Hector', 'Bando', 'Jimenez', 'password', 1),
(3, 'Gustavo', 'Solar', 'Gaona', 'password', 2),
(4, 'Eder', 'Getsemani', 'Diaz', 'password', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `containerID` (`containerID`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogueID` (`catalogueID`),
  ADD KEY `userID` (`userID`);

--
-- Indices de la tabla `outputs`
--
ALTER TABLE `outputs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogueID` (`catalogueID`),
  ADD KEY `userID` (`userID`);

--
-- Indices de la tabla `typeusers`
--
ALTER TABLE `typeusers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeID` (`typeID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `containers`
--
ALTER TABLE `containers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `outputs`
--
ALTER TABLE `outputs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `typeusers`
--
ALTER TABLE `typeusers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogue`
--
ALTER TABLE `catalogue`
  ADD CONSTRAINT `catalogue_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `catalogue_ibfk_2` FOREIGN KEY (`containerID`) REFERENCES `containers` (`id`);

--
-- Filtros para la tabla `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_ibfk_1` FOREIGN KEY (`catalogueID`) REFERENCES `catalogue` (`id`),
  ADD CONSTRAINT `inputs_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `outputs`
--
ALTER TABLE `outputs`
  ADD CONSTRAINT `outputs_ibfk_1` FOREIGN KEY (`catalogueID`) REFERENCES `catalogue` (`id`),
  ADD CONSTRAINT `outputs_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `typeusers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
