-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-09-2018 a las 09:20:31
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataformate_aplicacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2018_03_22_022544_create_posts_table', 1),
(21, '2018_03_22_022637_create_municipios_table', 1),
(22, '2018_04_03_005048_create_photos_table', 1),
(23, '2018_04_15_234152_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 1, 'App\\User'),
(2, 1, 'App\\User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Acacias', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(2, 'Barranca-de-Upia', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(3, 'Cabuyaro', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(4, 'Castilla-La-Nueva', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(5, 'Cubarral', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(6, 'Cumaral', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(7, 'El-Calvario', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(8, 'El-Castillo', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(9, 'El-Dorado', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(10, 'Fuente-de-Oro', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(11, 'Granada', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(12, 'Guamal', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(13, 'La-Macarena', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(14, 'La-Uribe', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(15, 'Lejanias', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(16, 'Mapiripan', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(17, 'Mesetas', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(18, 'Puerto-Concordia', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(19, 'Puerto-Gaitan', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(20, 'Puerto-Lleras', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(21, 'Puerto-Lopez', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(22, 'Puerto-Rico', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(23, 'Restrepo', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(24, 'San-Carlos-de-Guaroa', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(25, 'San-Juan-de-Arama', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(26, 'San-Juanito', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(27, 'San-Martin', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(28, 'Vista-Hermosa', '2018-04-03 10:00:00', '2018-04-04 10:00:00'),
(29, 'Villavicencio', '2018-04-03 10:00:00', '2018-04-04 10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `photos`
--

INSERT INTO `photos` (`id`, `post_id`, `url`, `created_at`, `updated_at`) VALUES
(15, 4, 'posts/zejgS1JYych9gWHg4AMOvSt0hg6JZ3E4LWUmy34G.png', '2018-04-16 04:00:50', '2018-04-16 04:00:50'),
(17, 1, 'posts/pehnlVnCGyBAEPbUIN4o6RtYMHwL24Zmu4iE9tdG.png', '2018-04-16 04:00:50', '2018-04-16 04:00:50'),
(18, 2, 'posts/Fbw6TzFwwqolNW506poleets8PPhY1vGi3EZiQuK.png', '2018-04-16 04:01:06', '2018-04-16 04:01:06'),
(19, 3, 'posts/1RlM2EfHrh8kMEAswcggrZasatUHwBBpoFPtoXQi.png', '2018-08-25 04:01:06', '2018-08-25 04:01:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngrupo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resumen` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `municipio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_contacto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objetivos` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_representante` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_representante2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_representante` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_representante2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_contacto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decreto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolucion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `ngrupo`, `url`, `resumen`, `representante`, `body`, `municipio_id`, `created_at`, `updated_at`, `rol_contacto`, `objetivos`, `contacto`, `representante2`, `correo_representante`, `correo_representante2`, `telefono_representante`, `telefono_representante2`, `nombre_contacto`, `correo_contacto`, `telefono_contacto`, `acta`, `decreto`, `resolucion`) VALUES
(1, 'Asopromet', 'asopromet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis massa sed elementum tempus egestas sed sed risus.', 'junito', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 29, '2018-06-07 18:29:36', '2018-06-07 20:49:54', NULL, NULL, NULL, 'representante2', 'correo representante ', 'correo representante 2', '11111111111111111', '22222222222222222', NULL, NULL, NULL, '', '', ''),
(2, 'ariari', 'ariari', 'ctvbjn', 'nn', '<p>uivbjbnknjkhvxctvbinlk</p>', 9, '2018-06-09 04:02:18', '2018-06-09 04:02:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(3, 'nuevo grupo', 'nuevo-grupo', 'resumen de la organización', 'Nombre del representante 1', NULL, 1, '2018-08-17 15:50:55', '2018-08-24 14:09:54', 'rol de la organización', 'objetivos de la organización', NULL, 'Nombre del representante 2', 'juan.rey.reina@unillanos.edu.co', 'juan.rey.reina@unillanos.edu.co', '111111111111', '22222222222222', 'Nombre de contacto', 'juan.rey.reina@unillanos.edu.co', '3333333333333', '', '', ''),
(4, 'nombre del grupo', 'nombre-del-grupo', 'resumen', 'representante', NULL, 6, '2018-08-22 00:42:52', '2018-08-22 00:44:19', 'rol', 'objetivo', NULL, 'representante', 'email', 'email', 'teléfono', 'teléfono', 'contacto', 'email', 'teléfono', '', '', ''),
(5, 'consejo estudiantil', 'consejo-estudiantil', 'Resumen de la organización', 'Juan David Rey Reina', 'body body body body body body body body body body body body body body body body ', 15, '2018-08-23 13:34:12', '2018-08-23 13:36:23', 'Rol de la organización', 'Objetivos de la organización', 'contacto contacto contacto ', 'Camilo', 'juan.rey.reina@unillanos.edu.co', 'caimilo@asdfa.com', '3108172191', '2131231231', 'Nombre de contacto', 'correodecontacto@ejemplo.com', '1111111111', 'acta', 'decreto', 'resolución'),
(6, 'warriors  en Lejanías', 'nombre-del-grupo-en-lejanias', 'Resumen de la organización Resumen de la organización', 'Nombre del representante', NULL, 15, '2018-08-23 13:37:55', '2018-08-23 13:41:06', 'Rol de la organización Rol de la organización', 'Objetivos de la organización Objetivos de la organización', NULL, 'Nombre del representante', 'ejemplo', 'Correo del representante', '123123123', '21341234', 'Nombre de contacto', 'Correo de contacto', '213412312', '', '', ''),
(7, 'nuevo grupo de Acacías', 'nuevo-grupo-de-acacias', 'Resumen de la organización Resumen de la organización Resumen de la organización', NULL, NULL, 1, '2018-08-24 14:10:50', '2018-08-24 14:15:02', 'Rol de la organización Rol de la organización Rol de la organización', 'FORTALECIMIENTO DE LA CULTURA DIGITAL Y APROPIACIÓN ACTIVA DE LAS TIC. EMPRESARIOS DIGITALES Y USO DE CANALES DIGITALES PARA GENERAR COMPETITIVIDAD Y DESARROLLO. TRABAJO EN EQUIPO Y PARTICIPACIÓN ACTIVA EN LA VEEDURÍA DE LAS ACCIONES DE LA ADMINISTRACIÓN. POTENCIAR LAS HABILIDADES TIC DE LOS JÓVENES CASTELLANOS A TRAVÉS DE CAPACITACIONES Y TALLERES.', NULL, NULL, NULL, NULL, NULL, NULL, 'Nombre del representante de la organización X', 'ajsdflasfd@lsadfjas.com', '000000000000', '', '', ''),
(9, 'dfasdfasdf', 'dfasdfasdf', NULL, NULL, NULL, NULL, '2018-08-24 16:34:55', '2018-08-24 16:34:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', ''),
(10, 'CONSEJO ESTUDIANTIL COLEGIO ADVENTISTA', 'CONSEJOESTUDIANTILCOLEGIOADVENTISTA', NULL, 'Dayana valentina Navarro', NULL, 11, '2018-08-23 13:37:00', '2018-08-24 20:53:11', 'PERSONERO INSTITUCIONAL', 'ORGANIZAR EL PROCESO DEMOCRÁTICO DE ELECCIÓN DE LOS REPRESENTANTES ANTE LA ADMINISTRACIÓN INSTITUCIONAL. DESPERTAR EN LOS ESTUDIANTES EL SENTIDO PATRIO FOMENTANDO EL RESPETO Y LOS ACTOS CIVICOS. PROMOVER ACTIVIDADES DONDE LOS ESTUDIANTES PUEDAN EXPRESAR SUS OPINIONES Y SENTIR SOBRE EL COLEGIO Y LA SOCIEDAD.', NULL, 'Bryan Manuel Urrea Sanchez', 'valentinanavarro_13@gmail.com', NULL, '3133246009', NULL, 'JUAN CAMILO ARDILA CAMARGO', 'ARDILACAMILO.2000@GMAIL.COM', '3177383045', '', '', ''),
(11, 'FUNJUDES', 'FUNJUDES', NULL, 'Dayana valentina Navarro ', NULL, 11, '2018-08-23 13:37:00', '2018-08-23 13:41:00', 'FISCAL', 'ORGANIZAR A LOS Y LAS JOVENES EN PROCESOS DE PARTICIPACIÓN CIUDADANA', NULL, 'Bryan Manuel Urrea Sanchez', 'valentinanavarro_13@gmail.com', '', '3133246009', '', 'JHON JAIRO VELASQUEZ GUZMAN', 'FUNJUDES@GMAIL.COM', '3138929081', '', '', ''),
(12, 'INSTITUCION EDUCATIVA BRISAS DE IRIQUE', 'INSTITUCIONEDUCATIVABRISASDEIRIQUE', NULL, 'Dayana valentina Navarro ', NULL, 11, '2018-08-23 13:37:00', '2018-08-23 13:41:00', 'PRESIDENTA ESTUDIANTIL', 'MOTIVAR A OS ESTUDIANTES EN LOS PROCESOS QUE PROMUEVE LA INSTITUCIÓN. CREAR UN AMBIENTE SANO ENTRE LOS ESTUDIANTES A TRAVES DE INTEGRACIONES DEPORTIVAS. GENERAR CONCIENCIA AMBIENTAL A TRAVES DE PROYECTOS COMO COMPARENDOS AMBIENTALES Y ECO GUERREROS IRIQUE', NULL, 'Bryan Manuel Urrea Sanchez', 'valentinanavarro_13@gmail.com', '', '3133246009', '', 'PAULA GARZON PARADA', 'YOPAULA55@GMAIL.COM', '3156446436', '', '', ''),
(13, 'CONSEJO DE ESTUDIANTES I.E CAMILO TORRES SEDE BACHILLERATO', 'CONSEJODEESTUDIANTESI.ECAMILOTORRESSEDEBACHILLERATO', NULL, 'Dayana valentina Navarro ', NULL, 11, '2018-08-23 13:37:00', '2018-08-23 13:41:00', 'PERSONERA', 'PROMOVER EL CUMPLIMIENTO DE LOS DERECHOS Y DEBERES DE LOS ESTUDIANTES PROPONDER POR EL BIENESTAR SOCIAL. SER EL PUENTE COMUNICACIÓN CON EL CONSEJO DIRECTIVO. RESALTAR Y ESTIMULAR LOS LIDERES CAMILISTAS COMO PRESIDENTE. GOBERNADORES Y ALCALDES DENTRO DEL GOBIERNO ESCOLAR', NULL, 'Bryan Manuel Urrea Sanchez', 'valentinanavarro_13@gmail.com', '', '3133246009', '', 'LAURA DAYANNA CASTAÑEDA PARRA', 'CASTANEDADAYANNA3@GMAIL.COM', '3132931599', '', '', ''),
(14, 'INSITUTO AGRICOLA LA HOLANDA', 'INSITUTOAGRICOLALAHOLANDA', NULL, 'Dayana valentina Navarro ', NULL, 11, '2018-08-23 13:37:00', '2018-08-23 13:41:00', 'PERSONERO  ', 'FORMAR JOVENES CON CAPACIDAD DE LIDERAZGO.  FORMAR CIUDADANOS CAPACES DE VIVIR EN SOCIAEDAD. FOMENTAR EN LOS ESTUDIANTES LA SANA Y PACIFICA CONVIVENCIA.', NULL, 'Bryan Manuel Urrea Sanchez', 'valentinanavarro_13@gmail.com', '', '3133246009', '', 'NICOLAS ARICAPA VELEZ', 'ARICAPAS13@GMAIL.COM', '3155901644', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2018-04-16 04:52:03', '2018-04-16 04:52:03'),
(2, 'Writter', 'web', '2018-04-16 05:00:00', '2018-04-16 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'carlos', 'carlosaudiovisual2015@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '2018-03-22 23:33:11', '2018-03-22 23:33:11'),
(2, 'camilo', 'camilo@gmail.com', '$2y$10$sE2GoaS8fm4gbxsFn3NpqezGf8b1UovoR00gvNPQD7lSVYr1DIDoW', NULL, '2018-03-22 23:33:11', '2018-03-22 23:33:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
