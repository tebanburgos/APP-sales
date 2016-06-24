-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2016 a las 08:29:09
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `imsales_sys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_nombre` varchar(128) NOT NULL,
  `cliente_empresa` varchar(128) NOT NULL,
  `cliente_correo_1` varchar(255) NOT NULL,
  `cliente_correo_2` varchar(255) DEFAULT NULL,
  `cliente_telefono_1` varchar(32) NOT NULL,
  `cliente_telefono_2` varchar(32) DEFAULT NULL,
  `cliente_fecha_creacion` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `usuario_id`, `cliente_nombre`, `cliente_empresa`, `cliente_correo_1`, `cliente_correo_2`, `cliente_telefono_1`, `cliente_telefono_2`, `cliente_fecha_creacion`) VALUES
(120, 7, 'Alberto Salvo ', 'saav', 'ventas@saav.cl', '', '228563510', '', '2016-05-12 12:24:00'),
(121, 7, 'Alberto Salvo ', 'saav ', 'ventas@saav.cl', '', '228563510', '', '2016-05-12 12:27:57'),
(122, 7, 'Katherine Coopman', 'Integral Chile ', 'kcoopman@integralchile.cl', 'vmesias@integralchile.cl', '229023020', '', '2016-05-12 12:44:21'),
(123, 7, 'Roberto Chicahual ', 'travelbus', 'roberto.chicahual@gmail.com', '', '985968885', '', '2016-05-13 16:48:04'),
(124, 7, 'Miguel Ángel León ', 'Mueble Center', 'mleon@mueblecenter.cl', '', '226240412', '', '2016-05-13 16:53:22'),
(125, 6, 'Jenniffer Sanchez Riquelme', 'Hotelera', 'jenniffer@hotelera.cl', '', '9-85445385', '', '2016-05-16 10:29:38'),
(126, 4, 'Pablo Burgos', 'Ecoaqua', 'pburgos@ecoaqua.cl', '', '22 996 2877', '', '2016-05-16 10:41:11'),
(127, 5, 'Daniel Dinamarca ', 'UCCS', 'ddinamarca@uccs.cl', '', '2244 2883 ', '', '2016-05-16 10:44:49'),
(128, 5, 'Pablo Anaya', 'CUNCUMEN', 'panaya@cuncumen.cl', '', '222359206', '', '2016-05-16 10:46:03'),
(129, 6, 'Luis Leiva', 'Grupo Alfa', 'l.leiva@inaseg.cl', '', '2573 7038', '', '2016-05-16 10:47:05'),
(130, 6, 'Jaime Neira Núñez', 'Neo Alerce', 'jaime@apx.cl', '', '9 7769 7125', '', '2016-05-16 10:49:10'),
(131, 5, 'Marcela Mellado', 'Universidad de Chile', 'marellano@dii.uchile.cl', '', '229780568 ', '', '2016-05-16 10:50:09'),
(132, 7, 'Mauricio Bobadilla ', 'Italmacc', 'mbobadilla@italmacc.cl', '', '225574886', '', '2016-05-16 10:51:06'),
(133, 5, 'Fabián Ormeño', 'UNAP', 'formeno@unap.cl', '', '993972628', '', '2016-05-16 10:52:15'),
(134, 7, 'Janette Canale ', 'Biomass', 'jdcanale@gmail.com', '', '227831200', '', '2016-05-16 10:54:42'),
(135, 4, 'Miguel Ramirez', 'Kanay', 'mramirez@kanay.cl', '', '22 745 9380', '', '2016-05-16 10:55:50'),
(136, 7, 'Miguel Ángel León ', 'Mueble Center', 'mleon@mueblecenter.cl', '', '226240412', '', '2016-05-16 10:57:41'),
(137, 7, 'Verónica Ahumada ', 'Montañas de Olmue ', 'info@montanasdeolmue.cl', '', '332441253', '', '2016-05-16 11:00:33'),
(138, 4, 'Paulina Rivas', 'Roller Plus', 'paulina@rollerplus.cl', '', '22 241 8298', '', '2016-05-16 11:01:07'),
(139, 4, 'Marcelo Aguilar', 'Tu Reloj', 'marcelo.a.aguilar@gmail.com', '', '9 4946 3509', '', '2016-05-16 11:04:39'),
(140, 7, 'Miguel Canale', 'Plasticord', 'canale10@gmail.com', '', '227831200', '', '2016-05-16 11:05:21'),
(141, 4, 'Pilar Vega Necochea', 'Arte y enmarcaciones', 'pilarvega@arteyenmarcaciones.cl', '', '9 9870 7319', '', '2016-05-16 11:10:03'),
(142, 7, 'Ivan Quivira', 'Servividrio ', 'info@servividrio.cl', '', '22256924', '', '2016-05-16 11:18:42'),
(143, 5, 'Lilian Cartes', 'UMAYOR', 'lilian.cartes@umayor.cl', '', '22518 9928', '', '2016-05-16 11:18:58'),
(144, 7, 'Orlando Pulgar', 'Clínica IV Centenario', 'orlando@clinicaivcentenario.cl', '', '973324238', '', '2016-05-16 12:13:41'),
(145, 5, 'Cristian Zamorano', 'Cecal Chile ', 'cristianzamorano@cecalchile.cl', '', '226961256', '', '2016-05-16 12:35:33'),
(146, 5, 'Karina Vicencio', 'BUcalis', 'karina.vicencio@bucalis.cl', '', '232024650', '', '2016-05-16 13:27:32'),
(147, 6, 'Angélica Gaedicke', 'Clínica Medik', 'clinicamedik.contacto@gmail.com', '', '989216273', '', '2016-05-17 13:57:08'),
(148, 4, 'Juan Soto', 'Asimprel', 'jsoto@asimprel.cl', '', '25598830', '', '2016-05-17 17:17:52'),
(149, 4, 'Margarita Sierralta', 'Estudio 26', 'm.sierralta@estudio26.cl', '', '2 2204 8619', '9 9333 5052', '2016-05-18 15:31:01'),
(150, 4, 'asdf', 'adfs', 'adfs7@asdf.com', '', '12341234', '', '2016-05-19 19:54:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escritorio`
--

CREATE TABLE IF NOT EXISTS `escritorio` (
  `escritorio_id` int(11) NOT NULL,
  `usuario_id_creador` int(11) NOT NULL,
  `usuario_id_editor` int(11) DEFAULT '0',
  `cliente_id` int(11) NOT NULL,
  `ia_id` int(11) DEFAULT '0',
  `escritorio_fyh_creacion` datetime NOT NULL,
  `escritorio_fyh_actualizado` datetime NOT NULL,
  `escritorio_nombre` varchar(64) NOT NULL,
  `escritorio_empresa` varchar(128) DEFAULT NULL,
  `escritorio_correos` varchar(255) DEFAULT NULL,
  `escritorio_telefonos` varchar(128) NOT NULL,
  `escritorio_archivos_adjuntos` varchar(766) DEFAULT NULL,
  `escritorio_servicios` varchar(255) DEFAULT NULL,
  `escritorio_estado` varchar(128) DEFAULT NULL,
  `escritorio_monto` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escritorio`
--

INSERT INTO `escritorio` (`escritorio_id`, `usuario_id_creador`, `usuario_id_editor`, `cliente_id`, `ia_id`, `escritorio_fyh_creacion`, `escritorio_fyh_actualizado`, `escritorio_nombre`, `escritorio_empresa`, `escritorio_correos`, `escritorio_telefonos`, `escritorio_archivos_adjuntos`, `escritorio_servicios`, `escritorio_estado`, `escritorio_monto`) VALUES
(126, 4, 4, 126, 286, '2016-05-16 10:41:11', '2016-05-16 11:39:52', 'Pablo Burgos', 'Ecoaqua', 'pburgos@ecoaqua.cl', '', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_Google_Adwords_-_Ecoaqua_(1)1.pdf"; target="_blank"> Coti 1 </a>', 'Agencia', 'Cerrado', 3570000),
(146, 5, 5, 146, 298, '2016-05-16 13:27:32', '2016-05-16 18:42:44', 'Karina Vicencio', 'BUcalis', 'karina.vicencio@bucalis.cl', '', 'S/A', 'Branding corporativo', 'Cerrado', 70000),
(142, 7, 7, 142, 266, '2016-05-16 11:18:42', '2016-05-16 11:18:42', 'Ivan Quivira', 'Servividrio ', 'info@servividrio.cl', '22256924', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_ByMail_SERVIVIDRIO.pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Primer contacto', 0),
(148, 4, 4, 148, 317, '2016-05-17 17:17:52', '2016-05-17 17:17:52', 'Juan Soto', 'Asimprel', 'jsoto@asimprel.cl', '25598830', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_web_-_Asimprel.pdf"; target="_blank"> Coti 1 </a>', 'Web contenido', 'Cotización', 395000),
(147, 6, 6, 147, 315, '2016-05-17 13:57:08', '2016-05-17 13:57:08', 'Angélica Gaedicke', 'Clínica Medik', 'clinicamedik.contacto@gmail.com', '989216273', 'S/A', '', 'Primer contacto', 0),
(149, 4, 4, 149, 323, '2016-05-18 15:31:01', '2016-05-18 15:31:01', 'Margarita Sierralta', 'Estudio 26', 'm.sierralta@estudio26.cl', '2 2204 8619, 9 9333 5052', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_Google_Adwords_-_Estudio_26.pdf"; target="_blank"> Coti 1 </a>', 'Adwords', 'Cotización', 1170000),
(127, 5, 3, 127, 280, '2016-05-16 10:44:49', '2016-05-16 11:30:41', 'Daniel Dinamarca ', 'UCCS', 'ddinamarca@uccs.cl', '2244 2883 ', 'S/A', 'Mail Marketing', 'Cerrado', 120000),
(128, 5, 5, 128, 242, '2016-05-16 10:46:03', '2016-05-16 10:46:03', 'Pablo Anaya', 'CUNCUMEN', 'panaya@cuncumen.cl', '222359206', 'S/A', 'Mail Marketing', 'Cerrado', 1050000),
(120, 7, 7, 120, 224, '2016-05-12 12:24:00', '2016-05-12 12:24:00', 'Alberto Salvo ', 'saav', 'ventas@saav.cl', '228563510', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/bymail_SAAV1.pdf"; target="_blank"> Coti 1 </a>', '', '0', 0),
(121, 7, 7, 121, 225, '2016-05-12 12:27:57', '2016-05-12 12:27:57', 'Alberto Salvo ', 'saav ', 'ventas@saav.cl', '228563510', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/bymail_SAAV2.pdf"; target="_blank"> Coti 1 </a><a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/IMACOM_-_Agencia_Digital_2016_(1)_(2)_(1).pdf"; target="_blank"> Coti 2 </a>', 'Mail Marketing', 'Primer contacto', 0),
(122, 7, 7, 122, 227, '2016-05-12 12:44:21', '2016-05-12 12:44:51', 'Katherine Coopman', 'Integral Chile ', 'kcoopman@integralchile.cl, <br> vmesias@integralchile.cl', '', 'S/A', '', 'Cerrado', 100000),
(123, 7, 7, 123, 232, '2016-05-13 16:48:04', '2016-05-16 10:28:33', 'Roberto Chicahual ', 'travelbus', 'roberto.chicahual@gmail.com', '', 'S/A', 'Carro de compra +Web Pay', 'Cotización', 0),
(124, 7, 7, 124, 229, '2016-05-13 16:53:22', '2016-05-13 16:53:22', 'Miguel Ángel León ', 'Mueble Center', 'mleon@mueblecenter.cl', '226240412', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_ByMail_MUEBLE_CENTER.pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Primer contacto', 0),
(125, 6, 6, 125, 233, '2016-05-16 10:29:38', '2016-05-16 10:29:38', 'Jenniffer Sanchez Riquelme', 'Hotelera', 'jenniffer@hotelera.cl', '9-85445385', 'S/A', '', 'Cotización', 100000),
(129, 6, 6, 129, 244, '2016-05-16 10:47:05', '2016-05-16 10:47:05', 'Luis Leiva', 'Grupo Alfa', 'l.leiva@inaseg.cl', '2573 7038', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Intranet_Grupo_Alfa2016.pdf"; target="_blank"> Coti 1 </a>', '', 'Cotización', 1180000),
(130, 6, 6, 130, 314, '2016-05-16 10:49:10', '2016-05-17 13:36:42', 'Jaime Neira Núñez', 'Neo Alerce', 'jaime@apx.cl', '', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Propuesta_Mas_Mail_Neo_Alerce1.pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Cotización', 0),
(133, 5, 5, 133, 252, '2016-05-16 10:52:15', '2016-05-16 10:52:15', 'Fabián Ormeño', 'UNAP', 'formeno@unap.cl', '993972628', 'S/A', 'Mail Marketing', 'Negociación', 3600000),
(131, 5, 5, 131, 246, '2016-05-16 10:50:09', '2016-05-16 10:50:09', 'Marcela Mellado', 'Universidad de Chile', 'marellano@dii.uchile.cl', '229780568 ', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/ORDEN_DE_COMPRA_281_IMACOM.pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Cerrado', 120000),
(132, 7, 3, 132, 278, '2016-05-16 10:51:06', '2016-05-16 11:30:16', 'Mauricio Bobadilla ', 'Italmacc', 'mbobadilla@italmacc.cl', '225574886', 'S/A', 'Mail Marketing', 'Primer contacto', 0),
(134, 7, 7, 134, 253, '2016-05-16 10:54:42', '2016-05-16 10:54:42', 'Janette Canale ', 'Biomass', 'jdcanale@gmail.com', '227831200', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_ByMail_BIOMASS_(1).pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Primer contacto', 0),
(135, 4, 4, 135, 254, '2016-05-16 10:55:50', '2016-05-16 10:55:50', 'Miguel Ramirez', 'Kanay', 'mramirez@kanay.cl', '22 745 9380', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Detalle_financiamiento_-_Kanay.cl_.xls"; target="_blank"> Coti 1 </a>', 'Adwords, Mail Marketing, Web contenido', 'Cotización', 2320000),
(136, 7, 7, 136, 255, '2016-05-16 10:57:41', '2016-05-16 10:57:41', 'Miguel Ángel León ', 'Mueble Center', 'mleon@mueblecenter.cl', '226240412', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_ByMail_MUEBLE_CENTER_(1).pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Primer contacto', 0),
(137, 7, 7, 137, 258, '2016-05-16 11:00:33', '2016-05-16 11:00:33', 'Verónica Ahumada ', 'Montañas de Olmue ', 'info@montanasdeolmue.cl', '332441253', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_ByMail_MONTANAS_DE_OLMUE.pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Primer contacto', 0),
(138, 4, 4, 138, 285, '2016-05-16 11:01:07', '2016-05-16 11:37:40', 'Paulina Rivas', 'Roller Plus', 'paulina@rollerplus.cl', '', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_Agencia_digital_-_Roller_Plus1.pdf"; target="_blank"> Coti 1 </a>', 'SEO, Adwords', 'Cotización', 1000000),
(139, 4, 4, 139, 284, '2016-05-16 11:04:39', '2016-05-16 11:35:52', 'Marcelo Aguilar', 'Tu Reloj', 'marcelo.a.aguilar@gmail.com', '', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_Mail_Marketing_-_Tu_Reloj1.docx"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Cerrado', 480000),
(140, 7, 3, 140, 276, '2016-05-16 11:05:21', '2016-05-16 11:29:32', 'Miguel Canale', 'Plasticord', 'canale10@gmail.com', '227831200', 'S/A', 'Mail Marketing', 'Primer contacto', 0),
(145, 5, 5, 145, 291, '2016-05-16 12:35:33', '2016-05-16 13:25:16', 'Cristian Zamorano', 'Cecal Chile ', 'cristianzamorano@cecalchile.cl', '', 'S/A', 'Mail Marketing', 'Cerrado', 120000),
(141, 4, 4, 141, 318, '2016-05-16 11:10:03', '2016-05-17 18:40:24', 'Pilar Vega Necochea', 'Arte y enmarcaciones', 'pilarvega@arteyenmarcaciones.cl', '', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_Web_-_Arte__enmarcaciones.pdf"; target="_blank"> Coti 1 </a><a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_redes_sociales_-_Arte__enmarcaciones.pdf"; target="_blank"> Coti 2 </a><a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Detalle_trimestral_-_Arte__enmarcaciones.xls"; target="_blank"> Coti 3 </a>', 'Social Media, Web contenido', 'Cotización', 1445000),
(143, 5, 3, 143, 274, '2016-05-16 11:18:58', '2016-05-16 11:28:53', 'Lilian Cartes', 'UMAYOR', 'lilian.cartes@umayor.cl', '22518 9928', 'S/A', 'Mail Marketing', 'Negociación', 200000),
(144, 7, 7, 144, 288, '2016-05-16 12:13:41', '2016-05-16 12:13:41', 'Orlando Pulgar', 'Clínica IV Centenario', 'orlando@clinicaivcentenario.cl', '973324238', '<a href="http://imacomsales.s2.imacom.cl/uploads/cotizaciones/Cotizacion_Mail_Marketing_-_Clinica_IV_Centenario.pdf"; target="_blank"> Coti 1 </a>', 'Mail Marketing', 'Cotización', 0),
(150, 4, 4, 150, 329, '2016-05-19 19:54:00', '2016-05-19 19:56:33', 'asdf', 'adfs', 'adfs7@asdf.com', '', 'S/A', 'Mail Marketing', 'Cotización', 2345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_clientes`
--

CREATE TABLE IF NOT EXISTS `estados_clientes` (
  `estado_cliente_id` int(11) NOT NULL,
  `estado_cliente_nombre` varchar(45) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados_clientes`
--

INSERT INTO `estados_clientes` (`estado_cliente_id`, `estado_cliente_nombre`) VALUES
(1, 'Primer contacto'),
(3, 'Reunión'),
(4, 'Cotización'),
(6, 'Cerrado'),
(7, 'Negociación'),
(8, 'Rechaza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `historial_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `historial_pivote` int(11) DEFAULT NULL,
  `historial_campo` varchar(45) DEFAULT NULL,
  `historial_dato` varchar(1000) DEFAULT NULL,
  `historial_fecha_y_hora` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=293 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`historial_id`, `usuario_id`, `cliente_id`, `historial_pivote`, `historial_campo`, `historial_dato`, `historial_fecha_y_hora`) VALUES
(157, 7, 122, 1, 'Detalles', '4 despachos en $100.000 + IVA', '2016-05-12 12:44:51'),
(168, 7, 123, 1, 'ID del estado del cliente', '4', '2016-05-16 10:28:33'),
(175, 4, 126, 1, 'servicio agencia', '1', '2016-05-16 10:41:25'),
(176, 4, 126, 2, 'servicio adwords', '0', '2016-05-16 10:42:27'),
(179, 5, 127, 1, 'servicio mail marketing', '1', '2016-05-16 10:46:18'),
(186, 7, 132, 1, 'Archivo adjunto 1', 'Cotizacion_ByMail_italmacc_(4).pdf', '2016-05-16 10:51:34'),
(187, 6, 130, 1, 'Archivo adjunto 1', NULL, '2016-05-16 10:51:34'),
(188, 6, 130, 1, 'servicio mail marketing', '1', '2016-05-16 10:51:34'),
(194, 7, 140, 1, 'Archivo adjunto 1', 'coti_Bymail_miguel_canale_(1).pdf', '2016-05-16 11:07:12'),
(199, 5, 143, 1, 'Monto', '200000', '2016-05-16 11:19:37'),
(200, 4, 126, 3, 'Archivo adjunto 1', 'Cotizacion_Google_Adwords_-_Ecoaqua_(1).pdf', '2016-05-16 11:19:37'),
(201, 4, 139, 1, 'Archivo adjunto 1', 'Cotizacion_Mail_Marketing_-_Tu_Reloj.docx', '2016-05-16 11:21:06'),
(202, 4, 138, 1, 'Archivo adjunto 1', 'Cotizacion_Agencia_digital_-_Roller_Plus.pdf', '2016-05-16 11:22:34'),
(205, 3, 139, 2, 'Archivo adjunto 1', NULL, '2016-05-16 11:29:00'),
(206, 3, 140, 2, 'Archivo adjunto 1', NULL, '2016-05-16 11:29:32'),
(207, 3, 138, 2, 'Archivo adjunto 1', NULL, '2016-05-16 11:29:58'),
(208, 3, 132, 2, 'Archivo adjunto 1', NULL, '2016-05-16 11:30:16'),
(209, 3, 126, 4, 'Archivo adjunto 1', NULL, '2016-05-16 11:30:51'),
(218, 4, 139, 3, 'Archivo adjunto 1', 'Cotizacion_Mail_Marketing_-_Tu_Reloj1.docx', '2016-05-16 11:35:52'),
(219, 4, 138, 3, 'Archivo adjunto 1', 'Cotizacion_Agencia_digital_-_Roller_Plus1.pdf', '2016-05-16 11:37:40'),
(220, 4, 126, 5, 'Archivo adjunto 1', 'Cotizacion_Google_Adwords_-_Ecoaqua_(1)1.pdf', '2016-05-16 11:39:52'),
(263, 6, 130, 2, 'Monto', '2560000 ', '2016-05-17 13:34:54'),
(264, 6, 130, 3, 'Monto', '0', '2016-05-17 13:36:20'),
(265, 6, 130, 3, 'servicio mail marketing', '0', '2016-05-17 13:36:20'),
(266, 6, 130, 3, 'ID del estado del cliente', '0', '2016-05-17 13:36:20'),
(267, 6, 130, 4, 'Archivo adjunto 1', 'Propuesta_Mas_Mail_Neo_Alerce1.pdf', '2016-05-17 13:36:42'),
(268, 6, 130, 4, 'Monto', '2560000 ', '2016-05-17 13:36:42'),
(269, 6, 130, 4, 'servicio mail marketing', '1', '2016-05-17 13:36:42'),
(270, 6, 130, 4, 'ID del estado del cliente', '4', '2016-05-17 13:36:42'),
(271, 6, 130, 4, 'Detalles', '', '2016-05-17 13:36:42'),
(274, 4, 141, 1, 'Archivo adjunto 1', 'Cotizacion_Web_-_Arte__enmarcaciones.pdf', '2016-05-17 18:40:24'),
(275, 4, 141, 1, 'Archivo adjunto 2', 'Cotizacion_redes_sociales_-_Arte__enmarcaciones.pdf', '2016-05-17 18:40:24'),
(276, 4, 141, 1, 'Archivo adjunto 3', 'Detalle_trimestral_-_Arte__enmarcaciones.xls', '2016-05-17 18:40:24'),
(277, 4, 141, 1, 'Monto', '1445000', '2016-05-17 18:40:24'),
(278, 4, 141, 1, 'servicio web contenido', '1', '2016-05-17 18:40:24'),
(279, 4, 141, 1, 'Detalles', 'Se le envía una nueva cotización sobre nuestros servicios, esta vez revalorizamos las redes sociales y se mantuvo el precio del sitio web.', '2016-05-17 18:40:24'),
(289, 4, 150, 1, 'Archivo adjunto 1', NULL, '2016-05-19 19:54:12'),
(290, 4, 150, 1, 'Monto', '', '2016-05-19 19:54:12'),
(291, 4, 150, 2, 'Monto', '23423', '2016-05-19 19:56:08'),
(292, 4, 150, 3, 'Monto', '2345', '2016-05-19 19:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_adicional`
--

CREATE TABLE IF NOT EXISTS `informacion_adicional` (
  `ia_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `estado_cliente_id` int(11) NOT NULL,
  `ia_fecha_y_hora` datetime NOT NULL,
  `ia_archivo_adjunto_1` varchar(255) DEFAULT NULL,
  `ia_archivo_adjunto_2` varchar(255) DEFAULT NULL,
  `ia_archivo_adjunto_3` varchar(255) DEFAULT NULL,
  `ia_monto` varchar(25) DEFAULT NULL,
  `ia_seo` tinyint(4) DEFAULT '0',
  `ia_adwords` tinyint(4) DEFAULT '0',
  `ia_sm` tinyint(4) DEFAULT '0',
  `ia_mm` tinyint(4) DEFAULT '0',
  `ia_wc` tinyint(4) DEFAULT '0',
  `ia_cc` tinyint(4) DEFAULT '0',
  `ia_cc_wp` tinyint(4) DEFAULT '0',
  `ia_aplicacion` tinyint(4) DEFAULT '0',
  `ia_agencia` tinyint(4) DEFAULT '0',
  `ia_bc` tinyint(4) DEFAULT '0',
  `ia_audiovisual` tinyint(4) DEFAULT '0',
  `ia_detalles` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=330 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informacion_adicional`
--

INSERT INTO `informacion_adicional` (`ia_id`, `cliente_id`, `usuario_id`, `estado_cliente_id`, `ia_fecha_y_hora`, `ia_archivo_adjunto_1`, `ia_archivo_adjunto_2`, `ia_archivo_adjunto_3`, `ia_monto`, `ia_seo`, `ia_adwords`, `ia_sm`, `ia_mm`, `ia_wc`, `ia_cc`, `ia_cc_wp`, `ia_aplicacion`, `ia_agencia`, `ia_bc`, `ia_audiovisual`, `ia_detalles`) VALUES
(224, 120, 7, 0, '2016-05-12 12:24:00', 'bymail_SAAV1.pdf', NULL, NULL, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(225, 121, 7, 1, '2016-05-12 12:27:57', 'bymail_SAAV2.pdf', 'IMACOM_-_Agencia_Digital_2016_(1)_(2)_(1).pdf', NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(226, 122, 7, 6, '2016-05-12 12:44:21', NULL, NULL, NULL, '100000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4 despachos en $100.000'),
(227, 122, 7, 6, '2016-05-12 12:44:51', NULL, NULL, NULL, '100000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4 despachos en $100.000 + IVA'),
(228, 123, 7, 1, '2016-05-13 16:48:04', NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, ''),
(229, 124, 7, 1, '2016-05-13 16:53:22', 'Cotizacion_ByMail_MUEBLE_CENTER.pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(232, 123, 7, 4, '2016-05-16 10:28:33', NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, ''),
(233, 125, 6, 4, '2016-05-16 10:29:38', NULL, NULL, NULL, '100000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Esperando comprobante de pago'),
(236, 126, 4, 6, '2016-05-16 10:41:11', NULL, NULL, NULL, '3570000', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Se renueva suscripción trimestral'),
(237, 126, 4, 6, '2016-05-16 10:41:25', NULL, NULL, NULL, '3570000', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'Se renueva suscripción trimestral'),
(238, 126, 4, 6, '2016-05-16 10:42:16', NULL, NULL, NULL, '3570000', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'Se renueva suscripción trimestral'),
(239, 126, 4, 6, '2016-05-16 10:42:27', NULL, NULL, NULL, '3570000', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'Se renueva suscripción trimestral'),
(241, 127, 5, 6, '2016-05-16 10:44:49', NULL, NULL, NULL, '120000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '4 Despachos\nValor $ 120.000 + IVA\n'),
(242, 128, 5, 6, '2016-05-16 10:46:03', NULL, NULL, NULL, '1050000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(243, 127, 5, 6, '2016-05-16 10:46:18', NULL, NULL, NULL, '120000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '4 Despachos\nValor $ 120.000 + IVA\n'),
(244, 129, 6, 4, '2016-05-16 10:47:05', 'Intranet_Grupo_Alfa2016.pdf', NULL, NULL, '1180000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(245, 130, 6, 4, '2016-05-16 10:49:10', 'Propuesta_Mas_Mail_Neo_Alerce.pdf', NULL, NULL, '1500000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(246, 131, 5, 6, '2016-05-16 10:50:09', 'ORDEN_DE_COMPRA_281_IMACOM.pdf', NULL, NULL, '120000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '3 Despachos'),
(249, 132, 7, 1, '2016-05-16 10:51:06', NULL, NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'llamar para saber si fue recibido y leído el correo.'),
(250, 132, 7, 1, '2016-05-16 10:51:34', 'Cotizacion_ByMail_italmacc_(4).pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'llamar para saber si fue recibido y leído el correo.'),
(251, 130, 6, 4, '2016-05-16 10:51:34', NULL, NULL, NULL, '1500000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(252, 133, 5, 7, '2016-05-16 10:52:15', NULL, NULL, NULL, '3600000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'En espera de la licitación.'),
(253, 134, 7, 1, '2016-05-16 10:54:42', 'Cotizacion_ByMail_BIOMASS_(1).pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Llamar para saber si fue recibido y leído el correo, para resp. '),
(254, 135, 4, 4, '2016-05-16 10:55:50', 'Detalle_financiamiento_-_Kanay.cl_.xls', NULL, NULL, '2320000', 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 'El cliente llama y se envía una cotización, estamos esperando feedback para una eventual reunión.'),
(255, 136, 7, 1, '2016-05-16 10:57:41', 'Cotizacion_ByMail_MUEBLE_CENTER_(1).pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Llamar para resp. '),
(257, 130, 6, 4, '2016-05-16 10:59:21', NULL, NULL, NULL, '1500000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(258, 137, 7, 1, '2016-05-16 11:00:33', 'Cotizacion_ByMail_MONTANAS_DE_OLMUE.pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'correo enviado y recibido, a la espera de feedback.'),
(259, 138, 4, 4, '2016-05-16 11:01:07', NULL, NULL, NULL, '1000000', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'El cliente renueva suscripción mensual la última semana del mes'),
(261, 139, 4, 6, '2016-05-16 11:04:39', NULL, NULL, NULL, '480000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Cliente antiguo, toma una campaña de despachos para sus nuevos sitios web Tu Reloj y Audiofilo.'),
(262, 140, 7, 1, '2016-05-16 11:05:21', 'coti_Bymail_miguel_canale_(2).pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'a la espera de feedback '),
(263, 140, 7, 1, '2016-05-16 11:07:12', 'coti_Bymail_miguel_canale_(1).pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'a la espera de feedback '),
(264, 141, 4, 4, '2016-05-16 11:10:03', 'Cotizacion_redes_sociales_-_Arte_y_Enmarcaciones_(2).pptx', NULL, NULL, '1920000', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'Potencial cliente solicita cotización para manejo de redes (Facebook e Instagram).'),
(266, 142, 7, 1, '2016-05-16 11:18:42', 'Cotizacion_ByMail_SERVIVIDRIO.pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Llamar !!'),
(267, 143, 5, 7, '2016-05-16 11:18:58', NULL, NULL, NULL, '180000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Espera Oc.'),
(268, 143, 5, 7, '2016-05-16 11:19:37', NULL, NULL, NULL, '200000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Espera Oc.'),
(269, 126, 4, 6, '2016-05-16 11:19:37', 'Cotizacion_Google_Adwords_-_Ecoaqua_(1).pdf', NULL, NULL, '3570000', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'Se renueva suscripción trimestral'),
(270, 143, 5, 7, '2016-05-16 11:20:01', NULL, NULL, NULL, '200000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Espera Oc.'),
(271, 139, 4, 6, '2016-05-16 11:21:06', 'Cotizacion_Mail_Marketing_-_Tu_Reloj.docx', NULL, NULL, '480000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Cliente antiguo, toma una campaña de despachos para sus nuevos sitios web Tu Reloj y Audiofilo.'),
(272, 138, 4, 4, '2016-05-16 11:22:34', 'Cotizacion_Agencia_digital_-_Roller_Plus.pdf', NULL, NULL, '1000000', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'El cliente renueva suscripción mensual la última semana del mes'),
(274, 143, 3, 7, '2016-05-16 11:28:53', NULL, NULL, NULL, '200000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Espera Oc.'),
(275, 139, 3, 6, '2016-05-16 11:29:00', NULL, NULL, NULL, '480000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Cliente antiguo, toma una campaña de despachos para sus nuevos sitios web Tu Reloj y Audiofilo.'),
(276, 140, 3, 1, '2016-05-16 11:29:32', NULL, NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'a la espera de feedback '),
(277, 138, 3, 4, '2016-05-16 11:29:58', NULL, NULL, NULL, '1000000', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'El cliente renueva suscripción mensual la última semana del mes'),
(278, 132, 3, 1, '2016-05-16 11:30:16', NULL, NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'llamar para saber si fue recibido y leído el correo.'),
(279, 130, 3, 4, '2016-05-16 11:30:26', NULL, NULL, NULL, '1500000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(280, 127, 3, 6, '2016-05-16 11:30:41', NULL, NULL, NULL, '120000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '4 Despachos\nValor $ 120.000 + IVA\n'),
(281, 126, 3, 6, '2016-05-16 11:30:51', NULL, NULL, NULL, '3570000', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'Se renueva suscripción trimestral'),
(284, 139, 4, 6, '2016-05-16 11:35:52', 'Cotizacion_Mail_Marketing_-_Tu_Reloj1.docx', NULL, NULL, '480000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'Cliente antiguo, toma una campaña de despachos para sus nuevos sitios web Tu Reloj y Audiofilo.'),
(285, 138, 4, 4, '2016-05-16 11:37:40', 'Cotizacion_Agencia_digital_-_Roller_Plus1.pdf', NULL, NULL, '1000000', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'El cliente renueva suscripción mensual la última semana del mes'),
(286, 126, 4, 6, '2016-05-16 11:39:52', 'Cotizacion_Google_Adwords_-_Ecoaqua_(1)1.pdf', NULL, NULL, '3570000', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 'Se renueva suscripción trimestral'),
(288, 144, 7, 4, '2016-05-16 12:13:41', 'Cotizacion_Mail_Marketing_-_Clinica_IV_Centenario.pdf', NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'a la espera de resp. '),
(289, 145, 5, 6, '2016-05-16 12:35:33', NULL, NULL, NULL, '120000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(291, 145, 5, 6, '2016-05-16 13:25:16', NULL, NULL, NULL, '120000', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(294, 146, 5, 6, '2016-05-16 13:27:32', NULL, NULL, NULL, '70000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'Diseño '),
(298, 146, 5, 6, '2016-05-16 18:42:44', NULL, NULL, NULL, '70000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'Diseño '),
(312, 130, 6, 4, '2016-05-17 13:34:54', NULL, NULL, NULL, '2560000 ', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(313, 130, 6, 0, '2016-05-17 13:36:20', NULL, NULL, NULL, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(314, 130, 6, 4, '2016-05-17 13:36:42', 'Propuesta_Mas_Mail_Neo_Alerce1.pdf', NULL, NULL, '2560000 ', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(315, 147, 6, 1, '2016-05-17 13:57:08', NULL, NULL, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(317, 148, 4, 4, '2016-05-17 17:17:52', 'Cotizacion_web_-_Asimprel.pdf', NULL, NULL, '395000', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 'El potencial cliente envío un formulario de contacto y se le envío cotización por el rediseño del sitio web: http://www.asimprel.cl/'),
(318, 141, 4, 4, '2016-05-17 18:40:24', 'Cotizacion_Web_-_Arte__enmarcaciones.pdf', 'Cotizacion_redes_sociales_-_Arte__enmarcaciones.pdf', 'Detalle_trimestral_-_Arte__enmarcaciones.xls', '1445000', 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 'Se le envía una nueva cotización sobre nuestros servicios, esta vez revalorizamos las redes sociales y se mantuvo el precio del sitio web.'),
(323, 149, 4, 4, '2016-05-18 15:31:01', 'Cotizacion_Google_Adwords_-_Estudio_26.pdf', NULL, NULL, '1170000', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'El cliente llama por una publicidad nuestra que le llego vía mail. Nos menciona que es una pyme y que ha utilizado anteriormente Google Adwords sin mayores resultados.\n\nSe le genera una cotización basica, sugerida y avanzada.'),
(326, 150, 4, 4, '2016-05-19 19:54:00', 'hola1.jpg', NULL, NULL, '123123', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'asdf'),
(327, 150, 4, 4, '2016-05-19 19:54:12', NULL, NULL, NULL, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'asdf'),
(328, 150, 4, 4, '2016-05-19 19:56:08', NULL, NULL, NULL, '23423', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'asdf'),
(329, 150, 4, 4, '2016-05-19 19:56:33', NULL, NULL, NULL, '2345', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 'asdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuarios`
--

CREATE TABLE IF NOT EXISTS `tipos_usuarios` (
  `tipo_usuario_id` int(11) NOT NULL,
  `tipo_usuario_descripcion` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_usuarios`
--

INSERT INTO `tipos_usuarios` (`tipo_usuario_id`, `tipo_usuario_descripcion`) VALUES
(1, 'Soporte'),
(2, 'Gerente'),
(3, 'Ejecutivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(128) NOT NULL,
  `usuario_apellido` varchar(128) NOT NULL,
  `usuario_rut` varchar(15) NOT NULL,
  `usuario_correo` varchar(255) NOT NULL,
  `usuario_password` varchar(123) DEFAULT NULL,
  `usuario_token_recuperar_clave` varchar(40) DEFAULT NULL,
  `tipo_usuario_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_rut`, `usuario_correo`, `usuario_password`, `usuario_token_recuperar_clave`, `tipo_usuario_id`) VALUES
(1, 'Soporte', 'Imacom', '77473010-9', 'soporte@imacom.cl', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 1),
(2, 'Alvaro', 'Matamala', '11111111-K', 'amatamala@imacom.cl', '3f50c6e4d968efb4aac252adb2ccb55c', NULL, 2),
(4, 'Camilo', 'Morales', '18461165-1', 'camilo@imacom.cl', '6732e7dce8aba7a7838fb8fd035acd3d', NULL, 3),
(5, 'Jessica', 'Gallardo', '11111111-K', 'jessica@imacom.cl', '60c63f059c855a1964226a3d4f52759d', NULL, 3),
(6, 'Fabiola', 'Rojas', '11111111-K', 'fabiolarojas@imacom.cl', '93a9d64cbaae537d17d871a206c4398b', NULL, 3),
(3, 'Jose', 'Matamala', '11111111-K', 'jmatamala@imacom.cl', '79a88fd9843aa6f211591997b82ce925', NULL, 2),
(7, 'Ignacia', 'Cortes', '11111111-K', 'ignacia@ventas.imacom.cl', 'b8eacfcfd82f1dd9179d6f9b742a5490', NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `escritorio`
--
ALTER TABLE `escritorio`
  ADD PRIMARY KEY (`escritorio_id`);

--
-- Indices de la tabla `estados_clientes`
--
ALTER TABLE `estados_clientes`
  ADD PRIMARY KEY (`estado_cliente_id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`historial_id`);

--
-- Indices de la tabla `informacion_adicional`
--
ALTER TABLE `informacion_adicional`
  ADD PRIMARY KEY (`ia_id`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`session_id`);

--
-- Indices de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  ADD PRIMARY KEY (`tipo_usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT de la tabla `escritorio`
--
ALTER TABLE `escritorio`
  MODIFY `escritorio_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT de la tabla `estados_clientes`
--
ALTER TABLE `estados_clientes`
  MODIFY `estado_cliente_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `historial_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=293;
--
-- AUTO_INCREMENT de la tabla `informacion_adicional`
--
ALTER TABLE `informacion_adicional`
  MODIFY `ia_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT de la tabla `tipos_usuarios`
--
ALTER TABLE `tipos_usuarios`
  MODIFY `tipo_usuario_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
