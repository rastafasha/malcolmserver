-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 17-08-2019 a las 23:50:44
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Malcolmweb2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `userId`, `categoryId`, `description`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Sample blog post 1', 1, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img1.jpg', 1, 1, '2018-10-27 04:12:09'),
(2, 'Sample blog post 2', 1, 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img2.jpg', 1, 1, '2018-10-27 06:12:09'),
(3, 'Sample blog post 3', 1, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img3.jpg', 0, 1, '2018-10-27 07:12:09'),
(4, 'Sample blog post 4', 1, 2, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img4.jpg', 0, 1, '2018-10-27 09:12:09'),
(5, 'Sample blog post 5', 1, 7, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img5.jpg', 1, 1, '2018-10-27 10:12:09'),
(6, 'Sample blog post 6', 1, 7, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'img6.jpg', 0, 1, '2018-10-27 12:12:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Grafico'),
(2, 'Webhtml5'),
(3, 'WebApp'),
(4, 'WAP'),
(5, 'Wordpress'),
(6, 'PhpMySql'),
(7, 'Mailmarketing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `lastname`, `email`, `phone`, `message`, `createdAt`) VALUES
(1, 'Malcolm', 'Cordova', 'mercadocreativo@gmail.com', '9999999999', 'This is test message', '2018-10-30 10:14:15'),
(2, 'Malcolm', 'Cordova', 'mercadocreativo@gmail.com', '4241874370', 'prueba', '2019-07-25 22:57:00'),
(3, 'Malcolm', NULL, 'mercadocreativo@gmail.com', '4241874370', 'dfds', '2019-08-17 22:39:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `graficos`
--

CREATE TABLE `graficos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `clasName` text,
  `popup` text,
  `url` text,
  `technology` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `graficos`
--

INSERT INTO `graficos` (`id`, `title`, `userId`, `categoryId`, `description`, `clasName`, `popup`, `url`, `technology`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Maquinarias Bero Logo', 1, 1, '<p>Creación logo Maquinarias Bero</p>', '0', 'grafico', '', '<p>Illustrator</p>', '25461_348845791077_348826256077_4075305_4423218_n.jpg', 1, 1, '2018-10-27 04:12:09'),
(2, 'Carpeta Maquinarias Bero', 1, 0, '<p>Creacion y aplicacion de imagen corporativa a material impreso.</p>', '0', 'papeleria', '', '<p>Illustrator</p>', '25461_348845796077_348826256077_4075306_5350866_n.jpg', 1, 1, '2019-08-16 14:12:46'),
(3, 'Hoja Membrete ', 1, 0, '<p>Hoja Membrete Maquinarias Bero</p>', 'tall', 'papeleria', '', '<p>Illustrator</p>', '25461_348845811077_348826256077_4075307_7079455_n.jpg', 1, 1, '2019-08-16 14:13:29'),
(4, 'otro mas', 1, 0, '<p>wide</p>', 'wide', 'flyer', 'asf', '<p>html5</p>', '25461_348953036077_348826256077_4076472_7365489_n.jpg', 1, 1, '2019-08-16 14:14:27'),
(5, 'Flyer Pizzeria', 1, 0, '<p>Flyer promo</p>', '0', 'flyer', '', '<p>illustrator, Photoshop</p>', '25461_348860941077_348826256077_4075546_2513137_n.jpg', 1, 1, '2019-08-16 19:32:31'),
(6, 'Flyer Pizzeria', 1, 0, '<p>Flyer promo</p>', '0', 'flyer', '', '<p>illustrator, Photoshop</p>', '25461_348860941077_348826256077_4075546_2513137_n1.jpg', 1, 1, '2019-08-16 19:32:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedias`
--

CREATE TABLE `multimedias` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `url` varchar(255) NOT NULL,
  `technology` text,
  `author` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `multimedias`
--

INSERT INTO `multimedias` (`id`, `title`, `userId`, `categoryId`, `description`, `url`, `technology`, `author`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'webuno', 1, 1, 'Come and shave your eyebrows in Vali Skincare & Makeup, straight .', 'https://squareup.com/appointments/buyer/widget/p5oq7n3y1fkw9l/RFSCRQJSQAYNW', 'Angular', NULL, '1_EYEBROWS-WAX1.jpg', 1, 1, '2018-10-27 04:12:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seos`
--

CREATE TABLE `seos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `keywords` text,
  `copyright` varchar(255) NOT NULL,
  `author` text,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seos`
--

INSERT INTO `seos` (`id`, `title`, `userId`, `description`, `keywords`, `copyright`, `author`, `image`, `createdAt`) VALUES
(1, 'Eyebrows wax', 1, 'Come and shave your ', 'Come, and, shave, your', 'eyebrows', NULL, '1_EYEBROWS-WAX1.jpg', '2018-10-27 04:12:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcriptores`
--

CREATE TABLE `subcriptores` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcriptores`
--

INSERT INTO `subcriptores` (`id`, `email`, `createdAt`) VALUES
(1, 'demoang@rsgitech.com', '2018-10-30 10:14:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `token`, `image`, `isActive`, `createdAt`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mercadocreativo', NULL, 'a1aed1a77c0916c43a4a67afe49af265', 'img2.jpg', 1, '2018-10-27 05:25:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videofolios`
--

CREATE TABLE `videofolios` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `popup` text,
  `url` text,
  `technology` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videofolios`
--

INSERT INTO `videofolios` (`id`, `title`, `userId`, `categoryId`, `description`, `popup`, `url`, `technology`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Video1', 1, 1, '<p>Come and shave your eyebrows in Vali Skincare &amp; Makeup, straight .</p>', 'pop2', 'https://www.youtube.com/watch?v=ZWJH7JQCjLM', '<p>After Effects</p>', 'baklawa.jpg', 1, 1, '2018-10-27 04:12:09'),
(2, 'Video 2', 1, 0, '<p>video prueba 2</p>', 'pop3', 'https://www.youtube.com/watch?v=GkbdHyfPxJA', '<p>yotube</p>', 'clean.jpg', 1, 1, '2019-08-16 16:32:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webdesings`
--

CREATE TABLE `webdesings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `description` text,
  `clasName` text,
  `popup` text,
  `url` varchar(255) NOT NULL,
  `technology` text,
  `image` varchar(255) DEFAULT NULL,
  `isFeatured` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `webdesings`
--

INSERT INTO `webdesings` (`id`, `title`, `userId`, `categoryId`, `description`, `clasName`, `popup`, `url`, `technology`, `image`, `isFeatured`, `isActive`, `createdAt`) VALUES
(1, 'Channa', 1, 1, 'Come and shave your eyebrows in Vali Skincare & Makeup, straight .', 'tall', 'pop1', 'https://squareup.com/appointments/buyer/widget/p5oq7n3y1fkw9l/RFSCRQJSQAYNW', 'Angular', 'chana1.jpg', 1, 1, '2018-10-27 04:12:09'),
(2, 'Chana2', 1, 0, '<p>cuadrados</p>', '0', 'pop2', 'https://malcolmcordova.com', '<p>html5, php</p>', 'channa2.jpg', 1, 1, '2019-08-16 14:12:46'),
(3, 'otro', 1, 0, '<p>large</p>', 'large', 'pop3', 'https://malcolmcordova.com', '<p>html5, php</p>', 'bariatrico1.jpg', 1, 1, '2019-08-16 14:13:29'),
(4, 'otro mas', 1, 0, '<p>wide</p>', 'wide', 'pop4', 'https://malcolmcordova.com', '<p>html5</p>', 'colbox.png', 1, 1, '2019-08-16 14:14:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `graficos`
--
ALTER TABLE `graficos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcriptores`
--
ALTER TABLE `subcriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videofolios`
--
ALTER TABLE `videofolios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `webdesings`
--
ALTER TABLE `webdesings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `graficos`
--
ALTER TABLE `graficos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subcriptores`
--
ALTER TABLE `subcriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videofolios`
--
ALTER TABLE `videofolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `webdesings`
--
ALTER TABLE `webdesings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
