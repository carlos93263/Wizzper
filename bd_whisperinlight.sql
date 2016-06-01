-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2016 a las 10:28:36
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_whisperinlight`
--
CREATE DATABASE IF NOT EXISTS `bd_whisperinlight` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_whisperinlight`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_categories`
--

INSERT INTO `tbl_categories` (`cate_id`, `cate_name`) VALUES
(1, 'Amistad'),
(2, 'Amor'),
(3, 'Dinero'),
(4, 'Estudios'),
(5, 'Familia'),
(6, 'Salud'),
(7, 'Sexualidad'),
(8, 'Trabajo'),
(9, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_commentspublicthems`
--

CREATE TABLE `tbl_commentspublicthems` (
  `cpth_id` int(11) NOT NULL,
  `cpth_textBody` text COLLATE utf8_spanish2_ci,
  `cpth_dateText` date DEFAULT NULL,
  `cpth_timeText` time DEFAULT NULL,
  `cpth_like` varchar(3) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cpth_visible` tinyint(1) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `pthe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_commentspublicthems`
--

INSERT INTO `tbl_commentspublicthems` (`cpth_id`, `cpth_textBody`, `cpth_dateText`, `cpth_timeText`, `cpth_like`, `cpth_visible`, `user_id`, `pthe_id`) VALUES
(1, 'Nunc porta rhoncus arcu ac rutrum. Cras quis ex ultrices, tincidunt turpis quis, sodales massa. Proin non lacus dapibus, mattis eros sit amet, sodales arcu. Maecenas in consectetur tortor, id rhoncus est. Nunc vitae aliquam nisl. Sed sed luctus sapien, eget mollis lectus. Sed enim urna, tincidunt sit amet rhoncus eu, placerat eget nisi. Morbi in odio massa.', '2016-06-01', '10:22:43', NULL, 1, 6, 1),
(2, 'Integer at porttitor tellus. Suspendisse dui erat, tincidunt sit amet consequat vitae, gravida in lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vehicula nisl quis metus viverra venenatis. Aliquam erat volutpat. Integer rhoncus id nunc sed efficitur. Nam eu neque vel nulla tempus lacinia. Aenean at felis nec libero porttitor elementum. Sed ut massa eu orci molestie pretium. Suspendisse nec auctor mauris, ac efficitur sem. Duis purus purus, laoreet eu tellus ac, molestie pellentesque leo. Pellentesque diam ex, gravida in euismod vel, feugiat vel nunc. Suspendisse ornare, nisl vitae euismod fermentum, sapien leo sagittis diam, a pretium metus nibh a neque. Vivamus sed tempus leo. Vivamus fringilla eros placerat tempor pellentesque. Curabitur et sagittis velit.\r\n\r\nFusce malesuada aliquam nulla et semper. Donec semper euismod ante, eu vestibulum dui feugiat sit amet. Vestibulum lorem dolor, bibendum sit amet viverra nec, fermentum ornare magna. Donec nibh sem, pellentesque sit amet risus dignissim, lobortis pharetra mauris. Pellentesque nec urna suscipit, convallis nisl nec, mattis nibh. Duis sit amet arcu pellentesque, convallis leo ut, tempus tellus. Quisque aliquam ante mi, vel ornare nunc egestas eget. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc malesuada dolor lacus, in suscipit mi sollicitudin non.', '2016-06-01', '10:24:32', NULL, 1, 5, 1),
(3, 'Integer at porttitor tellus. Suspendisse dui erat, tincidunt sit amet consequat vitae, gravida in lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vehicula nisl quis metus viverra venenatis. Aliquam erat volutpat. Integer rhoncus id nunc sed efficitur. Nam eu neque vel nulla tempus lacinia. Aenean at felis nec libero porttitor elementum. Sed ut massa eu orci molestie pretium. Suspendisse nec auctor mauris, ac efficitur sem. Duis purus purus, laoreet eu tellus ac, molestie pellentesque leo. Pellentesque diam ex, gravida in euismod vel, feugiat vel nunc. Suspendisse ornare, nisl vitae euismod fermentum, sapien leo sagittis diam, a pretium metus nibh a neque. Vivamus sed tempus leo. Vivamus fringilla eros placerat tempor pellentesque. Curabitur et sagittis velit.\r\n', '2016-06-01', '10:26:03', NULL, 1, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_kindofuser`
--

CREATE TABLE `tbl_kindofuser` (
  `kous_id` int(11) NOT NULL,
  `kous_name` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_kindofuser`
--

INSERT INTO `tbl_kindofuser` (`kous_id`, `kous_name`) VALUES
(1, 'Admin'),
(2, 'Psychologist'),
(3, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_message`
--

CREATE TABLE `tbl_message` (
  `mess_id` int(11) NOT NULL,
  `mess_textBody` text COLLATE utf8_spanish2_ci,
  `mess_dateText` date DEFAULT NULL,
  `mess_timeText` time DEFAULT NULL,
  `mess_read` tinyint(1) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `meus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_message`
--

INSERT INTO `tbl_message` (`mess_id`, `mess_textBody`, `mess_dateText`, `mess_timeText`, `mess_read`, `user_id`, `meus_id`) VALUES
(1, 'cos missatge 1', '2016-04-11', '10:34:09', 1, 5, 1),
(2, 'cos missatge 2', '2016-05-06', '10:34:09', 1, 5, 2),
(3, 'cos missatge 3', '2016-05-11', '10:34:09', 0, 5, 3),
(4, 'cos missatge 4', '2016-05-15', '10:34:09', 1, 5, 4),
(5, 'cos missatge 5', '2016-05-18', '10:34:09', 1, 6, 5),
(6, 'cos missatge 6', '2016-05-21', '10:34:09', 0, 6, 6),
(7, 'cos missatge 7', '2016-06-11', '10:34:09', 1, 6, 7),
(8, 'cos missatge 8', '2016-06-15', '10:34:09', 1, 6, 8),
(9, 'Resposta 1', '2016-05-06', '10:34:09', 1, 6, 1),
(10, 'Resposta 2', '2016-05-11', '10:34:09', 1, 6, 2),
(11, 'Resposta 3', '2016-05-15', '10:34:09', 0, 6, 3),
(12, 'Resposta 4', '2016-05-18', '10:34:09', 1, 6, 4),
(13, 'Resposta 5', '2016-05-21', '10:34:09', 1, 5, 5),
(14, 'Resposta 6', '2016-06-11', '10:34:09', 0, 5, 6),
(15, 'Resposta 7', '2016-06-15', '10:34:09', 1, 5, 7),
(16, 'Resposta 8', '2016-06-16', '10:34:09', 1, 5, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_messuser`
--

CREATE TABLE `tbl_messuser` (
  `meus_id` int(11) NOT NULL,
  `meus_matter` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_id1` int(11) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_messuser`
--

INSERT INTO `tbl_messuser` (`meus_id`, `meus_matter`, `user_id1`, `user_id2`) VALUES
(1, 'Mensaje 1', 5, 6),
(2, 'Mensaje 2', 5, 6),
(3, 'Mensaje 3', 5, 6),
(4, 'Mensaje 4', 5, 6),
(5, 'Mensaje 5', 6, 5),
(6, 'Mensaje 6', 6, 5),
(7, 'Mensaje 7', 6, 5),
(8, 'Mensaje 8', 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_publicthems`
--

CREATE TABLE `tbl_publicthems` (
  `pthe_id` int(11) NOT NULL,
  `pthe_matter` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pthe_textBody` text COLLATE utf8_spanish2_ci,
  `pthe_dateText` date DEFAULT NULL,
  `pthe_timeText` time DEFAULT NULL,
  `pthe_closed` tinyint(1) DEFAULT '0',
  `pthe_ProfesionalArticle` tinyint(1) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_publicthems`
--

INSERT INTO `tbl_publicthems` (`pthe_id`, `pthe_matter`, `pthe_textBody`, `pthe_dateText`, `pthe_timeText`, `pthe_closed`, `pthe_ProfesionalArticle`, `user_id`, `cate_id`) VALUES
(1, 'Mi mejor amigo tiene un problema', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent volutpat tortor at nulla volutpat tristique. Suspendisse condimentum vitae nulla ac consequat. Phasellus justo massa, fringilla ut nibh non, malesuada pharetra neque. Nam dapibus massa quis mauris tincidunt, in consequat lorem imperdiet. Maecenas gravida ac ipsum vel porttitor. Donec egestas, dolor a elementum pretium, nibh eros dapibus quam, et hendrerit purus urna sagittis lorem. Mauris maximus ipsum at nisi aliquet mollis.\r\n\r\nSuspendisse quis felis porttitor, dictum sem ut, feugiat lacus. Morbi in enim at augue tristique feugiat in vel eros. Aliquam porttitor ante quis turpis fringilla, sit amet sodales est rutrum. In hac habitasse platea dictumst. Suspendisse sit amet gravida justo. Integer pretium purus iaculis est dignissim, in faucibus augue ultrices. Ut leo orci, volutpat ac facilisis sit amet, dignissim a odio. Nulla semper arcu dignissim, sollicitudin quam a, cursus nunc. Integer tincidunt sed nisi bibendum mattis. Nulla vestibulum neque urna, et egestas nibh pharetra id. Mauris ut metus ut magna tristique blandit et eu nunc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ultricies convallis justo, id accumsan nulla fringilla eget.', '2016-06-01', '10:21:03', 0, 0, 6, 1),
(2, 'Me gusta mi compañera de piso', 'Integer bibendum condimentum lorem. Aenean gravida semper elit non scelerisque. Sed a mattis eros, ultricies sollicitudin velit. Phasellus in mi eget sapien tincidunt hendrerit et varius mauris. Nulla ut massa vitae magna tincidunt ornare. Donec hendrerit leo ac tortor varius blandit. Fusce faucibus viverra pulvinar. Pellentesque egestas scelerisque lobortis. Curabitur eleifend est nec elit pulvinar pellentesque. Nulla vitae suscipit nulla. Vestibulum sodales laoreet commodo. Morbi id metus id metus facilisis aliquam in quis metus. Proin maximus lorem vel tellus molestie euismod.\r\n\r\n\r\n\r\nNulla eget ex finibus, tristique leo sed, egestas sem. Nullam pretium massa eros, at semper nunc tincidunt pharetra. In facilisis lobortis orci. Nunc mollis est ut elementum cursus. Donec varius, tortor eget fermentum sollicitudin, augue velit congue turpis, in venenatis ligula sem venenatis metus. Duis ultricies enim in risus lacinia congue. In elit nunc, vestibulum tempor semper auctor, ornare quis sem. Maecenas condimentum in lorem in hendrerit. Praesent non quam sit amet metus auctor lobortis vel sed enim.', '2016-06-01', '10:22:23', 0, 0, 6, 2),
(3, 'Estoy en el paro', 'Integer at porttitor tellus. Suspendisse dui erat, tincidunt sit amet consequat vitae, gravida in lacus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras vehicula nisl quis metus viverra venenatis. Aliquam erat volutpat. Integer rhoncus id nunc sed efficitur. Nam eu neque vel nulla tempus lacinia. Aenean at felis nec libero porttitor elementum. Sed ut massa eu orci molestie pretium. Suspendisse nec auctor mauris, ac efficitur sem. Duis purus purus, laoreet eu tellus ac, molestie pellentesque leo. Pellentesque diam ex, gravida in euismod vel, feugiat vel nunc. Suspendisse ornare, nisl vitae euismod fermentum, sapien leo sagittis diam, a pretium metus nibh a neque. Vivamus sed tempus leo. Vivamus fringilla eros placerat tempor pellentesque. Curabitur et sagittis velit.\r\n\r\nFusce malesuada aliquam nulla et semper. Donec semper euismod ante, eu vestibulum dui feugiat sit amet. Vestibulum lorem dolor, bibendum sit amet viverra nec, fermentum ornare magna. Donec nibh sem, pellentesque sit amet risus dignissim, lobortis pharetra mauris. Pellentesque nec urna suscipit, convallis nisl nec, mattis nibh. Duis sit amet arcu pellentesque, convallis leo ut, tempus tellus. Quisque aliquam ante mi, vel ornare nunc egestas eget. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc malesuada dolor lacus, in suscipit mi sollicitudin non.\r\n\r\nNunc porta rhoncus arcu ac rutrum. Cras quis ex ultrices, tincidunt turpis quis, sodales massa. Proin non lacus dapibus, mattis eros sit amet, sodales arcu. Maecenas in consectetur tortor, id rhoncus est. Nunc vitae aliquam nisl. Sed sed luctus sapien, eget mollis lectus. Sed enim urna, tincidunt sit amet rhoncus eu, placerat eget nisi. Morbi in odio massa.', '2016-06-01', '10:23:11', 0, 0, 6, 8),
(4, 'Ser uno mismo', '\r\nMauris nec libero eu nisl sodales blandit eu ut ante. In maximus enim lorem, quis venenatis justo euismod in. Duis vitae dignissim lorem. Quisque pretium nisl quis nisl fringilla posuere. Donec sed nulla lacus. Etiam volutpat a arcu sed hendrerit. Fusce egestas, nulla sed pulvinar sollicitudin, mi enim mattis quam, vel hendrerit tellus turpis in elit. Integer ullamcorper laoreet fringilla. Vestibulum felis quam, congue finibus sodales eu, auctor at libero.\r\n\r\nProin rutrum purus a sagittis eleifend. In magna erat, bibendum ac mi a, iaculis faucibus dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras semper sem eu risus efficitur auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus erat velit, ac scelerisque arcu volutpat sit amet. Aliquam molestie vel risus nec venenatis. Mauris tempor neque vel accumsan sagittis. Vestibulum quis finibus lorem. Duis ut nisl non tortor aliquet volutpat. Proin ullamcorper tempor massa at sodales. Maecenas at tellus eget augue vestibulum rutrum. Pellentesque pellentesque ex ac est commodo sagittis.\r\n\r\nEtiam vel metus eros. Praesent odio ligula, congue vitae posuere a, fringilla nec augue. Duis id fringilla odio. Vivamus tristique laoreet est vel tempor. Nunc malesuada lorem ut lorem convallis sollicitudin. Vivamus consectetur porttitor eros, in lacinia tortor pretium at. Phasellus velit tortor, tincidunt ornare eros in, pretium gravida tortor. Ut venenatis orci et risus pellentesque efficitur. Aenean sagittis dolor ac felis convallis, id egestas dui volutpat. Morbi aliquam nisl ut nunc eleifend faucibus. Duis elit felis, porttitor vitae arcu quis, euismod maximus tellus.', '2016-06-01', '10:23:34', 1, 1, 6, 1),
(5, 'Como se lo explico ?', '\r\nInteger bibendum condimentum lorem. Aenean gravida semper elit non scelerisque. Sed a mattis eros, ultricies sollicitudin velit. Phasellus in mi eget sapien tincidunt hendrerit et varius mauris. Nulla ut massa vitae magna tincidunt ornare. Donec hendrerit leo ac tortor varius blandit. Fusce faucibus viverra pulvinar. Pellentesque egestas scelerisque lobortis. Curabitur eleifend est nec elit pulvinar pellentesque. Nulla vitae suscipit nulla. Vestibulum sodales laoreet commodo. Morbi id metus id metus facilisis aliquam in quis metus. Proin maximus lorem vel tellus molestie euismod.\r\n\r\nNulla eget ex finibus, tristique leo sed, egestas sem. Nullam pretium massa eros, at semper nunc tincidunt pharetra. In facilisis lobortis orci. Nunc mollis est ut elementum cursus. Donec varius, tortor eget fermentum sollicitudin, augue velit congue turpis, in venenatis ligula sem venenatis metus. Duis ultricies enim in risus lacinia congue. In elit nunc, vestibulum tempor semper auctor, ornare quis sem. Maecenas condimentum in lorem in hendrerit. Praesent non quam sit amet metus auctor lobortis vel sed enim.\r\n\r\nSuspendisse massa dui, lobortis quis lacus vel, convallis blandit turpis. Nulla ac leo mollis lacus bibendum pharetra id ut sapien. Morbi odio erat, luctus eu auctor sed, faucibus a mi. Quisque tincidunt eros a cursus pellentesque. Nulla risus tortor, aliquet nec nisl quis, pellentesque venenatis elit. Pellentesque aliquam sem vel ante facilisis consequat. In mi massa, auctor non quam ut, pretium sagittis felis. Sed mauris est, dignissim sed pharetra id, luctus vitae purus. Ut mauris diam, gravida id sapien in, ornare fermentum ipsum.', '2016-06-01', '10:25:20', 0, 0, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_relationship`
--

CREATE TABLE `tbl_relationship` (
  `rela_id` int(11) NOT NULL,
  `rela_type` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_id1` int(11) DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nickname` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `user_name` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_surname` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_dateofbirth` date DEFAULT NULL,
  `user_avatar` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_gender` tinyint(1) DEFAULT NULL,
  `user_response` tinyint(1) DEFAULT '1',
  `user_notification` tinyint(1) DEFAULT '1',
  `kous_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nickname`, `user_email`, `user_password`, `user_name`, `user_surname`, `user_dateofbirth`, `user_avatar`, `user_gender`, `user_response`, `user_notification`, `kous_id`) VALUES
(1, 'melenas', 'sergio.ayala@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Sergio', 'Ayala', '1994-03-14', 'users_avatar.png', 0, 1, 1, 3),
(2, 'gymPower', 'aitor.blesa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Aitor', 'Blesa', '1994-03-14', 'users_avatar.png', 0, 1, 1, 3),
(3, 'xavier', 'xavier.granell@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Xavier', 'Granell', '1994-03-14', 'users_avatar.png', 0, 1, 1, 3),
(4, 'alvaro', 'alvaro.camacho@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Alvaro', 'Camacho', '1994-03-14', 'users_avatar.png', 0, 1, 1, 3),
(5, 'Straviinski', 'carlos.sanchez@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Carlos', 'Sanchez', '1994-03-14', 'users_avatar.png', 0, 1, 1, 1),
(6, 'riko15', 'enric.gorriz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Enric', 'Gorriz', '1994-03-14', 'users_avatar.png', 0, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_valorationcomment`
--

CREATE TABLE `tbl_valorationcomment` (
  `vaco_id` int(11) NOT NULL,
  `vaco_like` int(3) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cpth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_xatfinal`
--

CREATE TABLE `tbl_xatfinal` (
  `xatf_id` int(11) NOT NULL,
  `xatt_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_xattext`
--

CREATE TABLE `tbl_xattext` (
  `xatt_id` int(11) NOT NULL,
  `xatt_text` text COLLATE utf8_spanish2_ci,
  `xatt_dateText` date DEFAULT NULL,
  `xatt_timeText` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_xatuser`
--

CREATE TABLE `tbl_xatuser` (
  `xatu_id` int(11) NOT NULL,
  `xatf_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indices de la tabla `tbl_commentspublicthems`
--
ALTER TABLE `tbl_commentspublicthems`
  ADD PRIMARY KEY (`cpth_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pthe_id` (`pthe_id`);

--
-- Indices de la tabla `tbl_kindofuser`
--
ALTER TABLE `tbl_kindofuser`
  ADD PRIMARY KEY (`kous_id`);

--
-- Indices de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`mess_id`),
  ADD KEY `meus_id` (`meus_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `tbl_messuser`
--
ALTER TABLE `tbl_messuser`
  ADD PRIMARY KEY (`meus_id`),
  ADD KEY `user_id1` (`user_id1`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indices de la tabla `tbl_publicthems`
--
ALTER TABLE `tbl_publicthems`
  ADD PRIMARY KEY (`pthe_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indices de la tabla `tbl_relationship`
--
ALTER TABLE `tbl_relationship`
  ADD PRIMARY KEY (`rela_id`),
  ADD KEY `user_id1` (`user_id1`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `kous_id` (`kous_id`);

--
-- Indices de la tabla `tbl_valorationcomment`
--
ALTER TABLE `tbl_valorationcomment`
  ADD PRIMARY KEY (`vaco_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cpth_id` (`cpth_id`);

--
-- Indices de la tabla `tbl_xatfinal`
--
ALTER TABLE `tbl_xatfinal`
  ADD PRIMARY KEY (`xatf_id`),
  ADD KEY `xatt_id` (`xatt_id`);

--
-- Indices de la tabla `tbl_xattext`
--
ALTER TABLE `tbl_xattext`
  ADD PRIMARY KEY (`xatt_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `tbl_xatuser`
--
ALTER TABLE `tbl_xatuser`
  ADD PRIMARY KEY (`xatu_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `xatf_id` (`xatf_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbl_commentspublicthems`
--
ALTER TABLE `tbl_commentspublicthems`
  MODIFY `cpth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_kindofuser`
--
ALTER TABLE `tbl_kindofuser`
  MODIFY `kous_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tbl_messuser`
--
ALTER TABLE `tbl_messuser`
  MODIFY `meus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tbl_publicthems`
--
ALTER TABLE `tbl_publicthems`
  MODIFY `pthe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_relationship`
--
ALTER TABLE `tbl_relationship`
  MODIFY `rela_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbl_valorationcomment`
--
ALTER TABLE `tbl_valorationcomment`
  MODIFY `vaco_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_xatfinal`
--
ALTER TABLE `tbl_xatfinal`
  MODIFY `xatf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_xattext`
--
ALTER TABLE `tbl_xattext`
  MODIFY `xatt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_xatuser`
--
ALTER TABLE `tbl_xatuser`
  MODIFY `xatu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_commentspublicthems`
--
ALTER TABLE `tbl_commentspublicthems`
  ADD CONSTRAINT `tbl_commentspublicthems_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_commentspublicthems_ibfk_2` FOREIGN KEY (`pthe_id`) REFERENCES `tbl_publicthems` (`pthe_id`);

--
-- Filtros para la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD CONSTRAINT `tbl_message_ibfk_1` FOREIGN KEY (`meus_id`) REFERENCES `tbl_messuser` (`meus_id`),
  ADD CONSTRAINT `tbl_message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Filtros para la tabla `tbl_messuser`
--
ALTER TABLE `tbl_messuser`
  ADD CONSTRAINT `tbl_messuser_ibfk_1` FOREIGN KEY (`user_id1`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_messuser_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `tbl_user` (`user_id`);

--
-- Filtros para la tabla `tbl_publicthems`
--
ALTER TABLE `tbl_publicthems`
  ADD CONSTRAINT `tbl_publicthems_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_publicthems_ibfk_2` FOREIGN KEY (`cate_id`) REFERENCES `tbl_categories` (`cate_id`);

--
-- Filtros para la tabla `tbl_relationship`
--
ALTER TABLE `tbl_relationship`
  ADD CONSTRAINT `tbl_relationship_ibfk_1` FOREIGN KEY (`user_id1`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_relationship_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `tbl_user` (`user_id`);

--
-- Filtros para la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`kous_id`) REFERENCES `tbl_kindofuser` (`kous_id`);

--
-- Filtros para la tabla `tbl_valorationcomment`
--
ALTER TABLE `tbl_valorationcomment`
  ADD CONSTRAINT `tbl_valorationcomment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_valorationcomment_ibfk_2` FOREIGN KEY (`cpth_id`) REFERENCES `tbl_commentspublicthems` (`cpth_id`);

--
-- Filtros para la tabla `tbl_xatfinal`
--
ALTER TABLE `tbl_xatfinal`
  ADD CONSTRAINT `tbl_xatfinal_ibfk_1` FOREIGN KEY (`xatt_id`) REFERENCES `tbl_xattext` (`xatt_id`);

--
-- Filtros para la tabla `tbl_xattext`
--
ALTER TABLE `tbl_xattext`
  ADD CONSTRAINT `tbl_xattext_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Filtros para la tabla `tbl_xatuser`
--
ALTER TABLE `tbl_xatuser`
  ADD CONSTRAINT `tbl_xatuser_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_xatuser_ibfk_2` FOREIGN KEY (`xatf_id`) REFERENCES `tbl_xatfinal` (`xatf_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
