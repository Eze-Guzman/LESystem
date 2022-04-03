-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2022 a las 22:34:07
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `milfl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `pass` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre_completo`, `dni`, `pass`, `correo`, `rol_id`) VALUES
(1, 'Ezequiel Guzmán', 44413922, '979e3e8f7312599a5863477011fbd6af9d8a357eb7c35fb78fd4c22841f4254c3451e380b529e5e5b635df9387a86121f67876dc2c2e4a3202aa2bdea2cf29ba', 'guzmanezequielm@gmail.com', 1),
(7, 'Luis Conforti', 45870294, 'b5d64bb609067a4a738f3d0ab209392e1dc8f1a0ff150db0254cdfc3a5f8268a30c965b6b58b92c69d980624d7566dc2d889efe52325bbd4bb8a34743723fdea', 'luisconforti04@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `pass` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `curso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `msg_no_leidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre_completo`, `dni`, `pass`, `correo`, `curso`, `rol_id`, `msg_no_leidos`) VALUES
(4, 'Pablo Guzmán', 45654987, '0013e414f9601423f7a6807d038dd144a2403911ac9596abb28b9825e38276b9d75319eaa518aecfab0f583b8d6d53eac521ec1af318e959a5ca772118c0c721', 'pablo123@gmail.com', 6, 3, 1),
(5, 'Ignacio Lopez', 57000000, '01071c88078302d22a6dc9785662e2fbe5c2c8dd4d01693307f82b09e3a8c24a56de5a2136ededa07e88ad17527cadf6ada978ce04649a301ea3f83b2707b8d4', 'memi@gmail.com', 3, 3, 0),
(6, 'Martín Casares', 47000000, '9b55c5db1d9cef25c845a76937226cd435b28162f1e2d8d9209e81d139373f41b606746c544517d438b6582c31395a6fc828e09ab92ece94d767fa4486db91a2', 'mcasares@gmail.com', 1, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruta` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `nombre`, `tipo`, `ruta`, `id_materia`) VALUES
(12, 'Error-EditarArchivo3.png', 'png', 'archivos/Error-EditarArchivo3.png', 1),
(13, 'ACTIVIDAD - fallas y soluciones de PC - 7mo 2da y 7mo 4ta.pdf', 'pdf', 'archivos/ACTIVIDAD - fallas y soluciones de PC - 7mo 2da y 7mo 4ta.pdf', 1),
(15, 'Megalovania.mp3', 'mp3', 'archivos/Megalovania.mp3', 1),
(16, 'formulario_postulacion (1).pdf', 'pdf', 'archivos/formulario_postulacion (1).pdf', 1),
(18, 'Zeki - Muerto por Dentro.mp4', 'mp4', 'archivos/Zeki - Muerto por Dentro.mp4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `curso` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `preceptor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `curso`, `preceptor_id`) VALUES
(1, '1° Año', 1),
(2, '2° Año', 1),
(3, '3° Año', 1),
(4, '4° Año', 2),
(5, '5° Año', 2),
(6, '6° Año', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directivos`
--

CREATE TABLE `directivos` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `pass` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `directivos`
--

INSERT INTO `directivos` (`id`, `nombre_completo`, `dni`, `pass`, `correo`, `rol_id`) VALUES
(6, 'Nestor Guzmán', 22163316, '3e1f0b1b85abd69f7d750c6dbe2f4d10c5902de48033f658c169b88b19b2180c42375feda1bc17b612bb90d2bc48cdf9e6ba45bbcda05ef76ad4f94ad1ffd0ce', 'nestorguzman537@gmail.com', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(70) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `ruta_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `ruta_img`, `curso_id`, `profesor_id`) VALUES
(1, 'Ciencias Naturales', '../../assets/img materias/quimica.png', 1, 1),
(2, 'Ciencias Sociales', '../../assets/img materias/historia.png', 1, 1),
(3, 'Construcción de la ciudadanía', '../../assets/img materias/ciudadania.png', 1, 1),
(4, 'Educación Artística', '../../assets/img materias/arte.png', 1, 1),
(5, 'Educación Física', '../../assets/img materias/ed-fisica.png', 1, 1),
(6, 'Inglés', '../../assets/img materias/ingles.png', 1, 1),
(7, 'Matemática', '../../assets/img materias/matematica.png', 1, 1),
(8, 'Practicas del Lenguaje', '../../assets/img materias/lengua.png', 1, 1),
(9, 'Biología', '../../assets/img materias/biologia.png', 2, 1),
(10, 'Construcción de la ciudadanía', '../../assets/img materias/ciudadania.png', 2, 1),
(11, 'Físico-química', '../../assets/img materias/quimica.png', 2, 1),
(12, 'Geografía', '../../assets/img materias/geografia.png', 2, 1),
(13, 'Historia', '../../assets/img materias/historia.png', 2, 1),
(14, 'Educación Artística', '../../assets/img materias/arte.png', 2, 1),
(15, 'Educación Física', '../../assets/img materias/ed-fisica.png', 2, 1),
(16, 'Inglés', '../../assets/img materias/ingles.png', 2, 1),
(17, 'Matemática', '../../assets/img materias/matematica.png', 2, 1),
(18, 'Prácticas del Lenguaje', '../../assets/img materias/lengua.png', 2, 1),
(19, 'Biología', '../../assets/img materias/biologia.png', 3, 1),
(20, 'Construcción de la ciudadanía', '../../assets/img materias/ciudadania.png', 3, 1),
(21, 'Físico-química', '../../assets/img materias/quimica.png', 3, 1),
(22, 'Geografía', '../../assets/img materias/geografia.png', 3, 1),
(23, 'Historia', '../../assets/img materias/historia.png', 3, 1),
(24, 'Educación Artística', '../../assets/img materias/arte.png', 3, 1),
(25, 'Educación Física', '../../assets/img materias/ed-fisica.png', 3, 1),
(26, 'Inglés', '../../assets/img materias/ingles.png', 3, 1),
(27, 'Matemática', '../../assets/img materias/matematica.png', 3, 1),
(28, 'Prácticas del Lenguaje', '../../assets/img materias/lengua.png', 3, 1),
(29, 'Literatura', '../../assets/img materias/lengua.png', 4, 1),
(30, 'Matemática', '../../assets/img materias/matematica.png', 4, 1),
(31, 'Educación Física', '../../assets/img materias/ed-fisica.png', 4, 1),
(32, 'Inglés', '../../assets/img materias/ingles.png', 4, 1),
(33, 'NTICx', '../../assets/img materias/informatica.png', 4, 1),
(34, 'Salud y Adolescencia', '../../assets/img materias/sado.png', 4, 1),
(35, 'Introducción a la Física', '../../assets/img materias/quimica.png', 4, 1),
(36, 'Historia', '../../assets/img materias/historia.png', 4, 1),
(37, 'Geografía', '../../assets/img materias/geografia.png', 4, 1),
(38, 'Sistemas de Información Contable', '../../assets/img materias/informatica.png', 4, 1),
(39, 'Teoría de las Organizaciones', '../../assets/img materias/gestion.png', 4, 1),
(40, 'Literatura', '../../assets/img materias/lengua.png', 5, 1),
(41, 'Matemática', '../../assets/img materias/matematica.png', 5, 1),
(42, 'Educación Física', '../../assets/img materias/ed-fisica.png', 5, 1),
(43, 'Inglés', '../../assets/img materias/ingles.png', 5, 1),
(44, 'Política y Ciudadanía', '../../assets/img materias/ciudadania.png', 5, 1),
(45, 'Introducción a la química', '../../assets/img materias/quimica.png', 5, 1),
(46, 'Historia', '../../assets/img materias/historia.png', 5, 1),
(47, 'Geografía', '../../assets/img materias/geografia.png', 5, 1),
(48, 'Elementos de micro y macro', '../../assets/img materias/micro-y-macro.png', 5, 1),
(49, 'Derecho', '../../assets/img materias/ciudadania.png', 5, 1),
(50, 'Gestión Organizacional', '../../assets/img materias/gestion.png', 5, 1),
(51, 'Sistemas de Información Contable', '../../assets/img materias/informatica.png', 5, 1),
(52, 'Literatura', '../../assets/img materias/lengua.png', 6, 1),
(53, 'Matemática', '../../assets/img materias/matematica.png', 6, 1),
(54, 'Educación Física', '../../assets/img materias/ed-fisica.png', 6, 1),
(55, 'Inglés', '../../assets/img materias/ingles.png', 6, 1),
(56, 'Trabajo y Ciudadanía', '../../assets/img materias/ciudadania.png', 6, 1),
(57, 'Proyectos Organizacionales', '../../assets/img materias/gestion.png', 6, 1),
(58, 'Economía Política', '../../assets/img materias/micro-y-macro.png', 6, 1),
(59, 'Arte', '../../assets/img materias/arte.png', 6, 1),
(60, 'Filosofía', '../../assets/img materias/ciudadania.png', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias2`
--

CREATE TABLE `materias2` (
  `id` int(70) NOT NULL,
  `nombre` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `ruta_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `curso_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `asunto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `leido` int(11) NOT NULL,
  `estado` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preceptores`
--

CREATE TABLE `preceptores` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `pass` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `preceptores`
--

INSERT INTO `preceptores` (`id`, `nombre_completo`, `dni`, `pass`, `correo`, `rol_id`) VALUES
(1, 'Ariel Manni', 25654987, '3ceedd28d28d0a0f5bce6a54b44f794c15e5a61e6e8e3b194c0c9871814c2fa3cedfb5726c99ef988a5cc7f5369c98151987885775ce5d0f2a3dbd8907840d37', 'arielmanni123@gmail.com', 5),
(2, 'Martín Montagna', 20000000, '1d926020f345c6eb183c99826a219152dd3ca7535e7d374a4cc74bcfddb0281149e08e8d570b6d9d2bd4134abefc5ba8208537b49fdb896a988c3cf4c3dbad3b', 'profmontagna@gmail.com', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `pass` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre_completo`, `dni`, `pass`, `correo`, `rol_id`) VALUES
(1, 'María Serpentini', 26762456, 'b13871b3b4e88269055e1bca9916bd0d14a5cf57198cf5ef9e2d87233f4ce903be5f95c4c76cce11477d046bb084570d81188ef94226030fa9314e6172e555f7', 'serpentinimariaaurelia@gmail.c', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contenido_publicacion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fecha_publicacion` date NOT NULL DEFAULT current_timestamp(),
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicacion`, `nombre_usuario`, `contenido_publicacion`, `fecha_publicacion`, `curso_id`) VALUES
(2, 'Ezequiel Guzmán', 'Hola', '2022-03-11', 1),
(13, 'Luis Conforti', 'Esto es una prueba2', '2022-03-12', 1),
(14, 'Luis Conforti', 'Prueba3', '2022-03-12', 2),
(17, 'Ariel Manni', 'Prueba de preceptor', '2022-03-12', 4),
(22, 'Luis Conforti', 'Prueba de notificaciones', '2022-03-13', 6),
(24, 'Luis Conforti', 'Prueba 1er año', '2022-03-20', 1),
(25, 'Luis Conforti', 'prueba 3ro', '2022-03-20', 3),
(26, 'Luis Conforti', 'A todos los cursos', '2022-03-20', 7),
(31, 'Luis Conforti', 'Prueba todos los cursos', '2022-03-20', 7),
(32, 'Luis Conforti', 'Prueba 3ro', '2022-03-20', 3),
(33, 'Luis Conforti', 'La ten´pes re pelotda lois', '2022-03-26', 7),
(34, 'Luis Conforti', 'Hola', '2022-03-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Estudiante'),
(4, 'Directivo'),
(5, 'Preceptor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `preceptor_id` (`preceptor_id`);

--
-- Indices de la tabla `directivos`
--
ALTER TABLE `directivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesor_id` (`profesor_id`),
  ADD KEY `profesor_id_2` (`profesor_id`),
  ADD KEY `profesor_id_3` (`profesor_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `materias2`
--
ALTER TABLE `materias2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesor_id` (`profesor_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preceptores`
--
ALTER TABLE `preceptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `directivos`
--
ALTER TABLE `directivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `materias2`
--
ALTER TABLE `materias2`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preceptores`
--
ALTER TABLE `preceptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`idrol`);

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`preceptor_id`) REFERENCES `preceptores` (`id`);

--
-- Filtros para la tabla `directivos`
--
ALTER TABLE `directivos`
  ADD CONSTRAINT `directivos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`idrol`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `materias2`
--
ALTER TABLE `materias2`
  ADD CONSTRAINT `profesor_fk` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
