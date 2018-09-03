-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2018 a las 20:44:52
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataformate`
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
(16, 4, 'posts/xBN02fUUeZzGwJtINSN9DjpEUd7oeDRZdJGl8qYG.png', '2018-04-16 04:00:50', '2018-04-16 04:00:50'),
(17, 4, 'posts/pehnlVnCGyBAEPbUIN4o6RtYMHwL24Zmu4iE9tdG.png', '2018-04-16 04:00:50', '2018-04-16 04:00:50'),
(18, 4, 'posts/Fbw6TzFwwqolNW506poleets8PPhY1vGi3EZiQuK.png', '2018-04-16 04:01:06', '2018-04-16 04:01:06');

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
  `rol` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'carlos', 'carlosaudiovisual2015@gmail.com', '$2y$12$6XYxhCPDQ2vL36jvRnRdi.aWT2ZIsMnsK3RPwir6jWoJuXTijE.g6', NULL, '2018-03-22 23:33:11', '2018-03-22 23:33:11'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
