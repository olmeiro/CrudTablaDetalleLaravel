-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 23:23:54
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_appsena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` varchar(10) NOT NULL,
  `hora_final` varchar(10) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `usuario_id`, `fecha`, `hora_inicio`, `hora_final`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-08-13', '19:00:00', '19:30:00', 'hola agenda', 1, '2020-08-07 14:16:47', '2020-08-07 14:16:47'),
(2, 2, '2020-08-06', '19:00:00', '19:30:00', 'hola agenda', 1, '2020-08-07 14:17:02', '2020-08-07 14:17:02'),
(3, 2, '2020-08-15', '19:00:00', '19:30:00', 'hola agenda', 1, '2020-08-07 14:33:55', '2020-08-07 14:33:55'),
(4, 2, '2020-08-08', '19:00:00', '19:30:00', 'corte de cabello', 1, '2020-08-07 15:44:55', '2020-08-07 15:44:55'),
(5, 2, '2020-08-08', '12:00:00', '12:30:00', 'corte de cabello', 1, '2020-08-07 15:45:10', '2020-08-07 15:45:10'),
(6, 5, '2020-08-27', '23:00:00', '23:30:00', 'peluquiada', 1, '2020-08-07 15:47:00', '2020-08-07 15:47:00'),
(7, 2, '2020-08-28', '22:00:00', '22:30:00', 'hola luisa', 1, '2020-08-12 18:57:26', '2020-08-12 18:57:26'),
(8, 5, '2020-08-29', '13:00:00', '13:30:00', 'hola cita de Olmeiro', 1, '2020-08-12 18:58:05', '2020-08-12 18:58:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre_categoria`) VALUES
(7, 'carnes'),
(8, 'ropas'),
(9, 'juguetes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `id` int(11) NOT NULL,
  `nombre_insumo` varchar(60) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`id`, `nombre_insumo`, `cantidad`, `precio`) VALUES
(1, 'Escoba', 99, 3900),
(2, 'Trapera', 7, 4300),
(3, 'Trapos', 194, 2000),
(4, 'Fab', 6, 1200),
(5, 'Leche', 10, 1100),
(6, 'Solomo', 17, 25000),
(7, 'solomo extranjero', 100, 19000),
(8, 'Punta de anca', 246, 25000),
(9, 'tableado', 147, 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `imagen` varchar(2000) DEFAULT NULL,
  `cantidad` smallint(11) NOT NULL DEFAULT 0,
  `precio` float NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`, `imagen`, `cantidad`, `precio`, `estado`, `categoria_id`, `created_at`, `updated_at`) VALUES
(5, 'Solomito', NULL, 0, 30000, 1, 7, '2020-07-28 01:55:05', '2020-08-13 18:17:38'),
(6, 'Solomo', 'Solomo.1596039962.png', 0, 25000, 1, 7, '2020-07-29 16:26:02', '2020-08-13 18:01:41'),
(7, 'balon', NULL, 0, 98000, 0, 9, '2020-07-30 18:07:03', '2020-07-30 18:07:17'),
(8, 'Sabaleta', NULL, 0, 17000, 1, 7, '2020-08-13 18:44:06', '2020-08-13 18:44:06'),
(9, 'Tocineta', NULL, 0, 18000, 1, 7, '2020-08-13 18:49:37', '2020-08-15 03:56:11'),
(10, 'Posta', 'el mejor.1597345459.jpeg', 0, 19000, 0, 7, '2020-08-13 19:04:19', '2020-08-14 18:18:24'),
(11, 'Super Aseo', NULL, 2, 40000, 1, 7, '2020-08-15 02:24:11', '2020-08-15 02:24:11'),
(12, 'Super Aseo', NULL, 2, 40000, 1, 7, '2020-08-15 02:27:08', '2020-08-15 02:27:08'),
(13, 'Super Aseo', NULL, 2, 40000, 1, 7, '2020-08-15 02:28:38', '2020-08-15 02:28:38'),
(14, 'Calzado niños', NULL, 3, 8300, 1, 8, '2020-08-15 03:58:04', '2020-08-15 03:58:04'),
(15, 'Calzado niños', NULL, 2, 4400, 1, 8, '2020-08-15 04:02:28', '2020-08-15 04:02:28'),
(16, 'Calzado niños', NULL, 2, 12500, 1, 8, '2020-08-15 04:12:48', '2020-08-15 04:12:48'),
(17, 'Deshuese', NULL, 2, 106000, 1, 7, '2020-08-15 05:07:09', '2020-08-15 05:07:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_insumo`
--

CREATE TABLE `producto_insumo` (
  `id` int(11) NOT NULL,
  `insumo_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_insumo`
--

INSERT INTO `producto_insumo` (`id`, `insumo_id`, `producto_id`, `cantidad`) VALUES
(1, 1, 16, 1),
(2, 2, 16, 2),
(3, 3, 17, 3),
(4, 8, 17, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `documento`, `name`, `email`, `email_verified_at`, `password`, `rol_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '1026140758', 'Olmeiro', 'oorozco657@misena.edu.co', NULL, '$2y$10$r5mqpRjMIPkeN/x5Rtek5OpxOZ8z0AaKX6ISkzCgbqWUUx1lcR9qi', 'ADMIN', 'aeW1mWUNPjfUfbNek7hmEzCn65Dq1EmMOpf24swG9kIucnIgX2dwqYHHoy1b', '2020-07-23 02:08:08', '2020-07-30 18:05:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `producto_insumo`
--
ALTER TABLE `producto_insumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `insumo_id` (`insumo_id`),
  ADD KEY `insumo_id_2` (`insumo_id`);

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
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `producto_insumo`
--
ALTER TABLE `producto_insumo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `producto_insumo`
--
ALTER TABLE `producto_insumo`
  ADD CONSTRAINT `producto_insumo_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `producto_insumo_ibfk_2` FOREIGN KEY (`insumo_id`) REFERENCES `insumo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
