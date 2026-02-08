-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2026 a las 23:20:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `fecha_subida` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id_libro` int(255) NOT NULL,
  `carrera_inf` varchar(255) NOT NULL,
  `carrera_mar` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `semestre` varchar(255) NOT NULL,
  `carrera_otros` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id_libro`, `carrera_inf`, `carrera_mar`, `materia`, `semestre`, `carrera_otros`) VALUES
(1, 'informatica', 'no', 'calculo-numerico', 'VI', 'no'),
(3, 'informatica', 'no', 'algebra-lineal', 'IV', 'no'),
(4, 'informatica', 'no', 'analisis-forense', 'V', 'no'),
(9, 'informatica', 'maritima', 'calculo-2', 'IV', 'no'),
(10, 'no', 'maritima', 'laboratorio-fisica-1', 'VII', 'no'),
(12, 'informatica', 'no', 'metodologia-investigacion-2', 'VII', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_usuario` int(255) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `portada` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha_subida` datetime DEFAULT current_timestamp(),
  `autor` varchar(255) NOT NULL,
  `visible` tinyint(1) DEFAULT 1,
  `descripcion` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `id_usuario`, `titulo`, `portada`, `archivo`, `fecha_subida`, `autor`, `visible`, `descripcion`) VALUES
(1, 19, 'Libro editado123', '1735435616_f8ec2a18970202e0dec9.jpg', 'pensum_informatica.pdf', '2024-12-28 00:34:45', 'Gheison Barrios', 1, ''),
(3, 20, 'El quijote', '1735361512_2e36a2b2c7c080b81afd.jpg', 'pensum_informatica.pdf', '2024-12-28 00:51:52', 'Avril Ledezma', 1, ''),
(4, 19, 'Xampp', '1735362574_27a0391f5fb404c58193.png', 'pensum_informatica.pdf', '2024-12-28 01:09:34', 'Gheison Barrios', 1, ''),
(9, 19, 'GOTt', '1735428870_3cbecb294f1a69b751e2.png', 'Operaciones3.pdf', '2024-12-28 19:34:30', 'Gheison Barrios', 1, ''),
(10, 19, 'Matitim', '1735443918_2552eecf227091f7fbe0.jpeg', 'pensum_informatica.pdf', '2024-12-28 23:45:18', 'Gheison Barrios', 1, ''),
(12, 26, 'Electroo', '1735461186_ee9c3bfe3a47b3e2993b.png', 'Instalaciones.pdf', '2024-12-29 04:33:06', 'Stuard Hernandez', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_usuario` int(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `code` int(6) DEFAULT NULL,
  `rango` varchar(50) DEFAULT 'estudiante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_usuario`, `nombre`, `apellido`, `correo`, `contraseña`, `code`, `rango`) VALUES
(19, 'Gheison', 'Barrios', 'gheisonbarrios@yahoo.com', '$2y$10$VNG06LPZVh5yWyJsXi0JSu1FUPirFBh.q0BmcgIcJM0KlPb0uipr.', 138062, 'estudiante'),
(20, 'Avril', 'Ledezma', 'livestuard08@hotmail.com', '$2y$10$Y4TIADcV0HaVrPBeDlhC4O6wJAfT3lVgqUmQoRdOB.oJihEk9cWwG', 153164, 'estudiante'),
(21, 'Avril', 'Barrios', 'taguao@gmail.com', '$2y$10$5cIbiAuMUeE8m6So2S1T3.ZAi7T9/oueRXUbM9bSriFYHAt1XRoUq', 138062, 'estudiante'),
(26, 'Stuard', 'Hernandez', 'prueba@gmail.com', '$2y$10$S.yGkEzjNxXV6pnf5G5pKu6rSUJZASmBR6aRNWosl4bJrKJW0SsQG', 138062, 'estudiante'),
(32, 'noanoa', 'mendoza', 'noanoa@gmail.com', '$2y$10$Lshw584nah3M2E22zYd.penQX1mE3IwEv3U0FOE1YKOluWwPLP3Ji', 123402, 'profesor'),
(33, 'Jonathan', 'Alarconsito', 'asdsad@gmail.com', '$2y$10$siDnlya.r6CmtB2xmDj20O4vSf5AzRBkfPC2BR5HKYlLVl91IgMiy', NULL, 'estudiante'),
(34, 'Jose', 'Jose', 'josejose123@gmail.com', '$2y$10$8iTJTlESTUO0aFMdKr0Ixe9emW6/4Kvc0aZ9Ssy8Vpoq1xX7JkFfq', NULL, 'estudiante'),
(35, 'Nigeria', 'Wayne', 'nigeriaene@gmail.com', '$2y$10$fDggabEd1XBd47cq8j5SJOIvR3DzMcvsA1.FzhGFNURHQfFTRXMQq', 123404, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-02-08-072049', 'App\\Database\\Migrations\\AddRangoToLogin', 'default', 'App', 1770535284, 1),
(2, '2026-02-08-072809', 'App\\Database\\Migrations\\MakeCodeNullableInLogin', 'default', 'App', 1770535710, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_com_user` (`id_usuario`),
  ADD KEY `fk_com_libro` (`id_libro`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_usuario`,`id_libro`),
  ADD KEY `fk_fav_libro` (`id_libro`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `fk_1` (`id_usuario`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id_libro` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_com_libro` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_com_user` FOREIGN KEY (`id_usuario`) REFERENCES `login` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `fk_fav_libro` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_fav_user` FOREIGN KEY (`id_usuario`) REFERENCES `login` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`id_usuario`) REFERENCES `login` (`id_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
