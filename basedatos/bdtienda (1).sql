-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 15:31:47
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdtienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL,
  `descripcion_categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`id`, `nombre_categoria`, `descripcion_categoria`) VALUES
(1, 'Colecciones', NULL),
(2, 'Cartillas y Diccionarios', NULL),
(3, 'Boletines', NULL),
(4, 'Códigos-Régimenes-Estatutos', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `telefono`, `documento`, `created_at`, `updated_at`) VALUES
(29, 'juanito rume', 'schickperez@gmail.com', '3196443053', '80065421', '2024-10-04 17:52:39', '2024-10-04 17:52:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `cantidad_productos` int(100) NOT NULL,
  `valor_producto` decimal(10,2) NOT NULL,
  `estado_entrega` enum('entregado','no entregado') DEFAULT 'no entregado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2024_09_17_171108_create_producto_table', 1),
(2, '2024_09_17_171418_create_categoria_producto_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `referencia` varchar(255) NOT NULL,
  `descripcion_de_producto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `valor_unitario_mes` int(11) DEFAULT NULL,
  `valor_seis_meses` int(11) DEFAULT NULL,
  `valor_doce_meses` int(11) DEFAULT NULL,
  `estado_producto` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`, `referencia`, `descripcion_de_producto`, `id_categoria`, `valor_unitario_mes`, `valor_seis_meses`, `valor_doce_meses`, `estado_producto`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Colección de Jurisprudencia desde 1886 a la fecha', 'Colección de Jurisprudencia Colombiana Digital #2222', 'El contenido con formato en internet lo podrás disfrutar lo mejor de la tecnología para tus investigaciones jurídicas, contables y tributarias con el respaldo del análisis hecho por Colombianos expertos en la legislación del país. Esta colección digital contiene una selección de extractos o textos ampliados de las sentencias de la Corte Constitucional, la Corte Suprema de Justicia y el Consejo de Estado, emitidas desde 1991. Incluye sentencias de unificación.', 2, 20000, 40000, 90000, 'Activo', 'productos/QACR6OT9BQ7QovES7xuP4mmlkvc3PMVXssfNTyke.png', '2023-09-27 05:00:00', '2024-10-15 07:24:03'),
(2, 'Colección de Normatividad Y legislación desde 1886 a la fecha', 'Colección de Jurisprudencia Colombiana Digital #333', 'El contenido con formato en internet lo podrás disfrutar lo mejor de la tecnología para tus investigaciones jurídicas, contables y tributarias con el respaldo del análisis hecho por Colombianos expertos en la legislación del país. Esta colección digital contiene una selección de extractos o textos ampliados de las sentencias de la Corte Constitucional, la Corte Suprema de Justicia y el Consejo de Estado, emitidas desde 1991. Incluye sentencias de unificación.', 1, 26000, 55000, 110000, 'Activo', 'productos/GJ6kCnuUCsjxqRZj1mTGINoAVGrWLzFPbSVFewNF.png', '2023-09-27 05:00:00', '2024-09-26 23:54:28'),
(3, 'Impuestos Minicipales', 'sin referencia', 'El contenido con formato en internet lo podrás disfrutar lo mejor de la tecnología para tus investigaciones jurídicas,', 1, 5000, 25000, 50000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-27 01:21:11'),
(4, 'Minutario (1750 Modelos)', 'Colección de Jurisprudencia Colombiana Digital #555', 'sin descripcion', 1, 10000, 20000, 50000, 'Activo', 'productos/gV78VXQz4bbtYSZkxvCqO4K4Iq9bPSUh1SokytMD.png', '2023-09-27 05:00:00', '2024-09-27 01:32:38'),
(5, 'Proyectos de Ley', '', '0', 1, 70000, 360000, 600000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:32:42'),
(6, 'Diccionario Jurídico', 'sin referencia', 'sin referencia', 2, 0, 0, 38000, 'Activo', 'productos/DtNltfnqLrZNNigMf2g4yt2lcPugRfjrBAevGlNr.png', '2023-09-27 05:00:00', '2024-10-05 01:08:10'),
(7, 'Diccionario Básicos de seguros', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(8, 'Diccionario Financiero', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(9, 'Manual de planeación tributaria', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(10, 'Marco reglamentario', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(11, 'Marco normativo NIIF', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(12, 'Marco explicativo NIF', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(13, 'Manual explicativo Nif', 'modulo de venta nif', 'el producto se vende en pdf', 2, 20000, 60000, 100000, 'Activo', 'productos/bZLsRKgBG71bR4FTBYGI2c1DhUY8K6tFDMF63zWv.png', '2023-09-27 05:00:00', '2024-10-15 07:29:37'),
(14, 'Manual explicativo Nif para pymes', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(15, 'Marco reglamentario (NAI)', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(16, 'Marco Normativo (NAI)', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(17, 'Cartilla Prestaciones Económicas: vejez, invalidez y muerte.', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(18, 'Cartilla Proceso administrativo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(19, 'Cartilla Aspectos Fundamentales del derecho del trabajo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(20, 'Cartila Guía de Seguridad y Salud en el Trabajo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(21, 'Cartilla aportes parafiscales', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(22, 'Cartilla de disposiciones generales para la retencióne en la fuente', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(23, 'IVA y Facturación Notinet', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(24, 'Estados financieros', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(25, 'Impuesto nacional al consumo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(26, 'Cartilla IVA actualizada', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(27, 'Cartilla explicativa impuesto sobre la renta y complementarios', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(28, 'NIIF para PYMES', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(29, 'Manual Explicativo de las Normas Internacionales de Información Financiera NIIF', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(30, 'Manual de planeación tributaria para personas jurídicas responsables del impuesto sobre la renta.', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(31, 'Régimen Simple de Tributación', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(32, 'Estatuto Orgánico del Sistema Fiannciero', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(33, 'Código de Ética del Contador Público', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(34, 'Cartilla Infomación exógena', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(35, 'Sociedades BIC en Colombia', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(36, 'Impuerto de normalización tributaria', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(37, 'Cartilla etapa precontractual', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(38, 'Cartilla sobre el contrato y su ejecución', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(39, 'ABC Accion de tutela', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(40, 'Marco explicativo NIF', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(41, 'Manual explicativo Nif', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(42, 'Manual explicativo Nif para pymes', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(43, 'Marco reglamentario (NAI)', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(44, 'Marco Normativo (NAI)', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(45, 'Cartilla Prestaciones Económicas: vejez, invalidez y muerte.', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(46, 'Cartilla Proceso administrativo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(47, 'Cartilla Aspectos Fundamentales del derecho del trabajo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(48, 'Cartila Guía de Seguridad y Salud en el Trabajo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(49, 'Cartilla aportes parafiscales', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(50, 'Cartilla de disposiciones generales para la retencióne en la fuente', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(51, 'IVA y Facturación Notinet', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(52, 'Estados financieros', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(53, 'Impuesto nacional al consumo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(54, 'Cartilla IVA actualizada', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(55, 'Cartilla explicativa impuesto sobre la renta y complementarios', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(56, 'NIIF para PYMES', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(57, 'Manual Explicativo de las Normas Internacionales de Información Financiera NIIF', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(58, 'Manual de planeación tributaria para personas jurídicas responsables del impuesto sobre la renta.', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(59, 'Régimen Simple de Tributación', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(60, 'Estatuto Orgánico del Sistema Fiannciero', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(61, 'Código de Ética del Contador Público', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(62, 'Cartilla Infomación exógena', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(63, 'Sociedades BIC en Colombia', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(64, 'Impuerto de normalización tributaria', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(65, 'Cartilla etapa precontractual', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(66, 'Cartilla sobre el contrato y su ejecución', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(67, 'MARCO NORMATIVO NICSP', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(68, 'MARCO REGULATORIO NICSP', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(69, 'ABC Accion de tutela', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(70, 'Cartilla Prestaciones Económicas: vejez, invalidez y muerte.', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(71, 'Teoria acto administrarivo', '', '0', 2, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(72, 'Boletines de Actualización en códigos', '', '0', 3, 15000, 70000, 140000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(73, 'Noticias contratación estatal', '', '0', 3, 15000, 70000, 140000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(74, 'Boletin Vigencias de la Normativa', '', '0', 3, 15000, 70000, 140000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(75, 'Notinews', '', '0', 3, 15000, 70000, 140000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(76, 'Edición Diaria de Noticias', '', '0', 3, 15000, 140000, 300000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(77, 'Ediciones Históricas', '', '0', 3, 30000, 140000, 300000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(78, 'CÓDIGO DISCIPLINARIO MILITAR', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(79, 'CÓDIGO DISCIPLINARIO DEL ABOGADO', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(80, 'CÓDIGO DE INFANCIA Y ADOLESCENCIA', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(81, 'CÓDIGO DE EXTINCIÓN DE DOMINIO', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(82, 'CÓDIGO DE ÉTICA Y DISCIPLINARIO DEL CONGRESISTA', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(83, 'ARANCEL DE ADUANAS Nuevo', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(84, 'ESTATUTARIA DE LA ADMINISTRACIÓN DE JUSTICIA EN LA JURISDICCIÓN ESPECIAL PARA LA PAZ', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(85, 'ESTATUTO ANTICORRUPCIÓN', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(86, 'ESTATUTO DE CONCILIACIÓN', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(87, 'ESTATUTO DE LOS MECANISMOS ALTERNATIVOS DE SOLUCIÓN DE CONFLICTOS', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(88, 'ESTATUTO DE PROTECCIÓN AL CONSUMIDOR (NUEVO', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(89, 'ESTATUTO DE NOTARIADO Y REGISTRO', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(90, 'ESTATUTO NACIONAL DE PROTECCIÓN DE LOS ANIMALES', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(91, 'ESTATUTO DISCIPLINARIO POLICIAL', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(92, 'ESTATUTO DEL REGISTRO DEL ESTADO CIVIL DE LAS PERSONAS', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(93, 'ESTATUTO DE SERVICIOS PÚBLICOS ', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(94, 'Arancel De Aduanas', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(95, 'Estatuto Nacional De Transporte', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(96, 'Estatuto Contable', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(97, 'Estatuto Tributario', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(98, 'ESTATUTO GENERAL DE CONTRATACIÓN ADMINISTRACIÓN PÚBLICA', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(99, 'Estatuto Aduanero', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(100, 'Estatuto Cambiario', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(101, 'CÓDIGO NACIONAL DE TRÁNSITO TERRESTRE ANALIZADO', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(102, 'Código Minero', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(103, 'Código de recursos Naturales', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(104, 'Código Penal Militar', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(105, 'Código de Procedimiento Penal', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(106, 'CÓDIGO  DE POLICIA', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(107, 'Código Nacional Electoral', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(108, 'Código Sustantivo del Trabajo', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(109, 'Código Civil', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(110, 'Código de Comercio', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(111, 'Código Agrario', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(112, 'Código de minas', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(113, 'Código Penitenciario Carcelario', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(114, 'Código Procesal del Trabajo y de la Seguridad Social', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(115, 'Código penal', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(116, 'Código de procedimiento Administrativo', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(117, 'Código disciplinario único', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(118, 'Código de lo contencioso adminsitrativo', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(119, 'Constitución Politica de Colombia', '', '0', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-26 18:39:04'),
(120, 'Regimen de seguridad social', 'sin referencia', 'sin descripcion', 4, 0, 0, 38000, 'Activo', NULL, '2023-09-27 05:00:00', '2024-09-27 02:37:45'),
(144, 'prueba1', 'normas 22 de 56', 'en pdf', 4, 40000, 54000, 0, 'Activo', 'productos/1727386809_a10.PNG', '2024-09-27 02:40:09', '2024-09-27 02:40:09'),
(145, 'norma 4000', 'sin referencia', 'sin descripcion', 3, 58000, 0, 400, 'Activo', 'productos/1728074061_a15.PNG', '2024-10-05 01:34:21', '2024-10-05 01:34:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `image_path`, `alt_text`, `created_at`, `updated_at`) VALUES
(13, 'images/sliders/NY9RqbnY9LkVAfQruw6B0jCvURQCNrkwczo3kJsq.gif', NULL, '2024-10-03 02:12:00', '2024-10-03 02:12:00'),
(14, 'images/sliders/Q41qxvZlcjs8Gslw7TnqSN33On1aVUVaDEwpjrTU.png', NULL, '2024-10-03 02:12:58', '2024-10-03 02:12:58'),
(16, 'images/sliders/PB9yo0BotsV8X9Kf571L3UHpe0W28tHQgXqna4R3.jpg', NULL, '2024-10-05 00:37:44', '2024-10-05 00:37:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referencia` (`referencia`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
