-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-03-2013 a las 13:56:38
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `accounttic`
--

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dani Benítez', 1, '2013-03-19 00:00:00', '2013-03-19 00:00:00');

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'José María', 'info@tropicanmascotas.com', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `name`, `CIF`, `address`, `phone`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'Tropican Mascotas', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id`, `job`, `deadline`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'Web Tropican Mascotas', '2013-04-01 00:00:00', 1, '2013-03-19 00:00:00', '2013-03-19 00:00:00');

--
-- Volcado de datos para la tabla `laravel_migrations`
--

INSERT INTO `laravel_migrations` (`bundle`, `name`, `batch`) VALUES
('application', '2013_03_19_102323_create_clients_table', 1),
('application', '2013_03_19_102402_create_users_table', 1),
('application', '2013_03_19_102757_create_payments_table', 1),
('application', '2013_03_19_102827_create_payment_methods_table', 1),
('application', '2013_03_19_102842_create_accounts_table', 1),
('application', '2013_03_19_102935_create_jobs_table', 1),
('application', '2013_03_19_103017_create_companies_table', 1);

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `concept`, `amount`, `is_paid`, `payment_date`, `job_id`, `payment_method_id`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'Primer pago web', 500, 0, '2013-03-19 00:00:00', 1, 1, 1, '2013-03-19 00:00:00', '0000-00-00 00:00:00');

--
-- Volcado de datos para la tabla `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Directo', '2013-03-19 00:00:00', '0000-00-00 00:00:00');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 'Dani Benítez', 'dabntz@fourattic.com', '123456', 1, '2013-03-19 00:00:00', '2013-03-19 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
