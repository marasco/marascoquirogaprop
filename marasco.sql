-- phpMyAdmin SQL Dump
-- version 4.5.0-dev
-- http://www.phpmyadmin.net
--
-- Servidor: 192.168.0.193
-- Tiempo de generación: 13-04-2016 a las 13:57:25
-- Versión del servidor: 5.5.34-log
-- Versión de PHP: 5.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `marasco_inmob`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE IF NOT EXISTS `propiedades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descr_corta` tinytext CHARACTER SET latin1 NOT NULL,
  `descr_larga` text CHARACTER SET latin1 NOT NULL,
  `visitas` int(10) unsigned DEFAULT NULL,
  `ingreso` datetime NOT NULL,
  `barrio` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=458 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `titulo`, `descr_corta`, `descr_larga`, `visitas`, `ingreso`, `barrio`) VALUES
(233, 'ItuzaingÃ³ norte: 4 c/estaciÃ³n. Departamento 4 amb.', 'U$S: 110.000.-', 'Departamento 4 amb. Hall con escalera, living comedor amplio c/hogar, 2 dormitorios c/placards, escritorio o tercer dormit., cocina comedor, baÃ±o completo, cuarto guarda Ãºtiles, escalera a segunda planta, terraza de 4x12, quincho c/parrilla, toillette. Excelente ubicaciÃ³n.', 0, '2012-11-23 17:03:46', 'ItuzaingÃ³ norte'),
(257, 'ItuzaingÃ³ norte: Casa 4 amb. s/lote 495m2.', 'U$S: 170.000.-', 'Casa en 2 plantas: PB: Living de recepciÃ³n en desnivel, con comedor integrado, cocina, toilette, lavadero, garage pasante, fondo libre de 11x30m. PA: 3 dormitorios c/placards, baÃ±o completo, terraza. Lote 11x45.- (falta pintura).', 0, '2013-03-25 17:39:20', 'ItuzaingÃ³ norte'),
(360, 'ItuzaingÃ³ Norte: Casa a terminar s/lote 450 m2.', 'U$S: 75.000.-', 'Casa a terminar s/lote 450 m2.  Cocina comedor, 2 dormitorios, baÃ±o. S/lote 10 x 45m. A metros Av. Ratti.', 0, '2014-06-10 12:32:13', 'ItuzaingÃ³ norte'),
(370, 'ItuzaingÃ³ Sur Excelente propiedad 5 ambientes s/lote 440m2.', 'U$S: 195.000 LE.', 'Excelente propiedad 5 ambientes: Living, amplio comedor con hogar, cocina con muebles de algarrobo, 3 dormitorios con placard. 1 dormitorio con baÃ±o en suite, 2Âº baÃ±o completo, toilette.  Jardin al frente y al  fondo con quincho de 7 x 4, parrilla.  Dependencia de servicio con baÃ±o completo, cuarto guarda Ãºtiles. Cochera cubierta. Lote 10x40m. 6 c/estaciÃ³n. Muy buen entorno. Acepta permuta menor valor. ', 0, '2014-07-10 09:29:21', 'ItuzaingÃ³ Sur'),
(279, 'ItuzaingÃ³ norte: Excelente chalet 5 amb. a estrenar.', 'U$S: 180.000.-', 'Excelente chalet 5 amb. a estrenar. PB: Living amplio c/hogar, cocina comedor integrada, 1 dormit., baÃ±o completo c/antebaÃ±o, amplio jardÃ­n, entrada p/varios autos. S/lote 18x43m. PA: 3 dormitorios (2 c/balcÃ³n terraza), baÃ±o completo.', 0, '2013-07-12 16:35:19', 'ItuzaingÃ³ norte'),
(446, 'Castelar norte: Alquilo local 40 m2. sobre avenida', '$ 7.000 p/mes', 'Alquilo local 40 m2. c/entrepiso y baÃ±o. Excelente ubicaciÃ³n sobre Av. Arias a 2 cuadras de Av. Santa Rosa. Apto varios rubros.', 0, '2015-09-16 16:48:06', 'Castelar norte'),
(439, 'MorÃ³n Sur: Vendo o Permuto Departamento 3 amb. c/cochera.', 'U$S: 100,000.-', 'Excelente Departamento 3 amb. c/cochera. 1er. Piso a la calle. Cocina comedor, 2 dormit. c/placard, 2 baÃ±os (1 c/baÃ±era) balcÃ³n al frente. Muy luminoso. Ascensor. Cochera cubierta. Muy buena ubicaciÃ³n. VENDO O PERMUTO MENOR VALOR', 0, '2015-08-05 17:38:46', 'MorÃ³n sur'),
(457, 'Moreno: Alquilo casa 4 amb. Barrio Privado Haras MarÃ­a Eugenia.', '$ 13.000 p/mes', 'Alquilo casa 4 amb. PB: Amplio living comedor, cocina comedor, baÃ±o completo, lavadero cub., cochera p/2 autos, parque, galeria, parrilla. HabitaciÃ³n de servicio con baÃ±o. PA: 2 dormitorios en suite c/placards, baÃ±o completo, altillo. S/lote 20x30m. Con acceso directo desde la autopista del Oeste en el Km. 34 a 150m, en salida Pte. Graham Bell.', 0, '2016-03-31 16:27:44', 'Haras Maria Eugenia'),
(437, 'ItuzaingÃ³ Norte: DÃºplex 2 y 3 amb. Venta de Pozo.', 'U$S: 80.000.-', 'DÃºplex 2 y 3 amb. Venta de Pozo. Cuatro unidades funcionales con patio y cochera, mÃ¡s sector comÃºn de caminos y parquizado. Muy buen entorno.', 0, '2015-07-31 18:08:51', 'ItuzaingÃ³ norte'),
(236, 'ItuzaingÃ³ norte 6 c/estaciÃ³n: Propiedad en 2 plantas s/lote 400m2.', 'U$S: 280.000.-', 'Excelente casa en 2 plantas s/lote 10x40m. PB: Amplio living comedor c/hogar en desnivel, cocina comedor, sala de lavado/planchado, cuarto guarda Ãºtiles y/o escritorio, baÃ±o completo, galerÃ­a, quincho, parrilla, pileta. PA: 4 dormitorios c/placards y balcÃ³n, 2Âº baÃ±o completo.  Excelente ubicaciÃ³n. Acepta permuta.-', 0, '2012-12-07 10:45:26', 'ItuzaingÃ³ norte'),
(156, 'ItuzaingÃ³ norte: Chalet 3 amb. 2 baÃ±os. s/lote 220m2.', 'U$S: 100.000.-', 'ItuzaingÃ³ norte: Chalet s/lote 10 x 22,30. PB: Living com., cocina com. baÃ±o, lavadero cub. jardÃ­n, entrada p/2 autos. PA: 2 dormitorios c/placard, amplio altillo, baÃ±o. Apta crÃ©dido.', 0, '2012-02-22 13:16:49', ''),
(419, 'Vendo o Permuto DÃºplex 3 ambientes en Bariloche por propiedad en ItuzaingÃ³ o Castelar', 'U$S: 100.000.', 'Vendo o Permuto DÃºplex 3 ambientes en Bariloche por propiedad 3 amb. en Castelar o ItuzaingÃ³ Norte. El dÃºplex estÃ¡ en excelente  ubicaciÃ³n. Consta de living comedor, cocina comedor, 2 dormitorios c/placards, baÃ±o completo. Lavadero cub. U$S: 100.000.', 0, '2014-12-17 10:44:31', 'Bariloche'),
(334, 'ItuzaingÃ³ norte: 11 c/estaciÃ³n. Chalet 4 amb. s/lote 300m2.', 'U$S: 155.000.-', 'Chalet 3 amb. s/lote 300m2. Living comedor, cocina comedor 2 dormitorios c/placards, baÃ±o completo, cuarto guarda Ãºtiles, garage, jardÃ­n, parrilla. Lote 10x30. 11 c/estaciÃ³n.- Estado general, muy bueno.', 0, '2014-03-20 12:15:20', 'Ituzaingo norte'),
(65, 'NECESITO CASA O DEPARTAMENTO EN ALQUILER', 'SE OFRECE EXCELENTE GARANTIA', 'NECESITO URGENTE CASAS O DEPARTAMENTOS EN ALQUILER PARA SATISFACER REQUERIMIENTOS DE NUESTROS CLIENTES.', 0, '2011-06-18 10:17:32', 'ItuzaingÃ³'),
(355, 'Castelar Sur: Casa Americana 4 amb. Ideal 2 flias.', 'U$S; 115.000.-', 'Casa Americana 4 amb. Ideal 2 flias. Living comedor c/hogar, cocina com., 3 dormitorios c/placards, baÃ±o completo, lavadero, toilette, garage p/2 autos, jardÃ­n, sobre lote 11 x 40 mts. Al fondo: Departamento amplio con cocina comedor, 1 dormit, baÃ±o completo. Muy buen entorno.', 0, '2014-06-10 08:42:32', 'Castelar Sur'),
(431, 'ItuzaingÃ³ norte: Casa 4 ambientes, 4 c/estaciÃ³n', 'U$S: 130.000', 'Casa 4 amb. Living comedor amplio, cocina comedor, 3 dormitorios c/placards, baÃ±o completo, cuarto guarda Ãºtiles, lavadero cub, patio, terraza, entrada auto. A 4 c/estaciÃ³n. Apta crÃ©dito. ', 0, '2015-04-16 11:19:34', 'ItuzaingÃ³ norte'),
(350, 'ItuzaingÃ³ norte: Excelente propiedad 4 amb. 9 c/estaciÃ³n ', 'U$S: 155.000.-', 'Excelente propiedad: Hall, living, comedor amplio, 3 dormitorios, cocina, desayunador, baÃ±o completo, lavadero, jardÃ­n al frente, patio, quincho de material, cuarto guarda Ãºtiles, parrilla, calefacciÃ³n, aire, acondicionado, garage cub. p/2 autos. s/lote 220 m2. Sup. cub. 140m2. 9 c/estaciÃ³n. Excelente ubicaciÃ³n.', 0, '2014-05-27 09:27:02', 'ItuzaingÃ³ norte'),
(361, 'ItuzaingÃ³ norte 15 c/estaciÃ³n: Casa americana 3 amb. s/lote 220m2.', 'U$S: 115.000.-', 'Casa americana 3 amb. s/lote 10x22m. Living comedor, cocina, 2 dormit. c/placard, baÃ±o completo, lavadero cub., jardÃ­n, quincho de material, parrilla, terraza, cuarto guarda Ãºtiles, entrada p/2 autos. 15 c/estaciÃ³n. Acepto permuta lote en Parque Leloir.', 0, '2014-06-23 12:59:34', 'Villa Ariza'),
(344, 'ItuzaingÃ³ norte: Ideal inversores. Casa 3 c/estaciÃ³n', 'U$S: 380.000.', 'ItuzaingÃ³ norte: Ideal inversores. 3 c/estaciÃ³n:  Excelente propiedad 4 amb. s/lote 17x26m. Apto construcciÃ³n en altura.', 0, '2014-05-08 11:36:36', 'ItuzaingÃ³ norte'),
(270, 'ItuzaingÃ³ Norte: Excelente PH 3 amb. 10 c/estaciÃ³n', 'U$S: 100.000.-', 'Excelente PH 3 amb. Living de recepciÃ³n amplio, cocina, 2 dormitorios c/placards, (uno con vestidor), baÃ±o completo, lavadero, patio, entrada de auto. 10 c/estaciÃ³n. Muy buen entorno.', 0, '2013-04-19 12:46:21', 'ItuzaingÃ³'),
(269, 'ItuzaingÃ³ Norte: Villa Ariza. PH 3 amb. A metros de Av. Santa Rosa ', 'U$S: 85.000.-', 'PH 3 amb. Living, cocina comedor, 2 dormitorios c/placards, baÃ±o completo, lavadero, patio de 3x6m. A metros de A. Santa Rosa y Sarmiento. Excelente zona.', 0, '2013-04-19 11:44:17', 'Villa Ariza'),
(454, 'OPORTUNIDAD!! ItuzaingÃ³ Norte: PH 3 amb. al frente.', 'U$S: 65.000.- ', 'Casa 3 ambientes: Living comedor, cocina, baÃ±o, lavadero, jardin, galpÃ³n, local al frente c/baÃ±o o tercer dormitorio. Entrada auto. Excelente zona.', 0, '2016-03-15 12:19:00', 'ItuzaingÃ³ norte'),
(430, 'ItuzaingÃ³ Norte: Casa americana 4 amb. ideal 2 familias.', 'U$S: 105.000.-', 'ItuzaingÃ³ Norte: Casa americana 4 amb. PB: Living comedor, cocina com., 2 dormit. c/placards, 1 en suite, baÃ±o completo, jardÃ­n, quincho, lavadero cub., garage para 2 autos. PA: 1 dormit. c/placards, cocina y baÃ±o con detalles de terminaciÃ³n. Lote 12x28mts. ideal 2 familias. Muy buen estado.', 0, '2015-04-07 18:41:55', 'ItuzaingÃ³ norte'),
(154, 'ItuzaingÃ³ Norte: Excelente propiedad 5 amb.', 'U$S: 185.000.-', 'Sobre lote 10x40 : Living de recepciÃ³n, comedor, 3 amplios dormitorios c/placard (1 en planta alta), cocina, comedor diario, baÃ±o compl., altillo muy amplio, lavadero, cochera cub. Cuarto oficina, amplio galpÃ³n 50m2 c/entrepiso. Parque, pileta. Superficie cub. 260 m2. Excelente estado.', 0, '2012-02-17 08:31:25', 'ItuzaingÃ³ norte'),
(255, 'ItuzaingÃ³ norte: 10 c/estaciÃ³n: Excelente chalet 3 amb.', 'U$S: 180.000.-', 'Chalet 3 amb. s/lote 10x57m. Living, cocina comedor muy amplio, 2 dormitorios c/placards, baÃ±o completo c/antebaÃ±o, toilette, lavadero cub., cuarto guarda Ãºtiles, garage pasante, jardÃ­n, parrilla. 10 c/estaciÃ³n.', 0, '2013-03-25 12:32:00', 'ItuzaingÃ³ norte'),
(280, 'ItuzaingÃ³ norte: PH al frente 3 amb.', 'U$S: 75.000.- ', 'PH al frente 3 amb. Living, cocina comedor, 2 dormitorios c/placards, baÃ±o completo, lavadero, patio, parrilla, entrada auto, terraza c/losa.', 0, '2013-07-12 17:14:27', 'ItuzaingÃ³ norte'),
(168, 'ItuzaingÃ³ Sur: Chalet 4 amb. s/lote 398m2. 2 c/estaciÃ³n', 'U$S: 220.000.-', 'Chalet s/lote 398m2. 2 c/estaciÃ³n. PB: Living de recepciÃ³n amplio c/hogar, comedor, cocina amplia amueblada, 2 dormit. c/placards, toillete y baÃ±o completo, lavadero, cochera techada, fondo libre c/parrilla y pileta. PA: 1 dormit amplio, baÃ±o completo. Antiguedad; 25 aÃ±os.', 0, '2012-03-20 11:19:41', 'ItuzaingÃ³ Sur'),
(328, 'Excelente casa 4 amb. BÂº Privado. Haras MarÃ­a Eugenia.', 'U$S: 250.000.-', 'Casa 4 amb. PB: Amplio living comedor, cocina comedor, baÃ±o, 1 dormitorio en suite, lavadero, cochera, parque, parrilla, pileta. PA: 2 dormitorios c/placards, baÃ±o completo. Con acceso directo desde la autopista del Oeste en el Km. 34 a 150m, en salida Pte. Graham Bell. Se acepta propiedad en parte de pago.', 0, '2014-01-09 11:07:03', 'Haras MarÃ­a Eugenia'),
(250, 'MorÃ³n norte 4 c/estaciÃ³n: Excelente dÃºplex 3 amb. a estrenar.', 'U$S: 110.000.-', 'Excelente dÃºplex 3 amb. PB: Living comedor, cocina comedor, toilette, lavadero, entrada auto, jardÃ­n, fondo. PA: 2 dormit. c/placard, baÃ±o completo c/baÃ±era. Zona residencial.', 0, '2013-02-15 17:51:40', 'Residencial'),
(266, 'ItuzaingÃ³ Norte: Chalet 6 amb. 7 c/estaciÃ³n', 'U$S: 170.000.-', 'Chalet 6 amb. Living de recepciÃ³n amplio, cocina comedor, baÃ±o completo, lavadero cub. Garage cub., patio. 2da. Planta: 2 dormitorios c/placards, baÃ±o completo, play room amplio c/terraza.3Âº Planta: 2 dormit. c/baulera. S/lote 12x20m. 7 c/estaciÃ³n.', 0, '2013-04-10 11:42:56', 'ItuzaingÃ³ norte'),
(392, 'ItuzaingÃ³ norte: 10 c/estaciÃ³n. 2 chalets s/lote 600m2. Ideal 2 familias.', 'U$S: 250.000.-', 'Chalet al frente: Frente: Living comedor amplio, 2 dormit. c/placards, cocina, baÃ±o, lavadero, quincho, parrilla, garage pasante. Jardin al frente. AtrÃ¡s: Chalet en 2 plantas: Living comedor, 3 dormit. c/placards, cocina comedor amplia, toillette, baÃ±o completo, lavadero, cuarto guarda Ãºtiles, pileta. 10 c/estaciÃ³n. Excelente ubicaciÃ³n. S/lote 12x50. Ideal 2 familias.', 0, '2014-08-23 10:45:27', 'ItuzaingÃ³'),
(311, 'ItuzaingÃ³ Sur: Lote 300mts. 1 c/ Av. Blas Parera.', 'U$S: 50.000.-', 'ItuzaingÃ³ Sur: Lote de terreno 10x30mts. Asfalto, luz, perforaciÃ³n de agua, medianeras. Muy buen entorno. 1 c/ Av. Blas Parera. ', 0, '2013-10-02 16:23:55', 'ItuzaingÃ³ Sur'),
(441, 'ATENCION INVERSOR: Lote 600m2. 150 metros de  estaciÃ³n.', 'U$S: 380.000.-', 'Lote 600m2. 150 metros de  estaciÃ³n. Apto construcciÃ³n en altura y/o locales comerciales.  ', 0, '2015-08-11 16:36:53', 'ItuzaingÃ³ Sur'),
(453, 'Castelar Sur 3 excelentes dÃºplex 4 amb. a estrenar.', 'U$S: 85.000.-', 'DÃºplex a estrenar en 2 plantas: PB: Living com. cocina, toilette, lavadero, patio, entrada auto. PA: 2 dormit. c/placards, balcÃ³n, 1 baÃ±o, cuarto guardaÃºtiles. Todos los servicios. Apto crÃ©dito.', 0, '2016-03-10 16:43:02', 'Castelar Sur'),
(387, 'ItuzaingÃ³ norte: Casa Americana 4 amb. A refaccionar', 'U$S: 85.000.-', 'Casa Americana 4 amb. Living de recepciÃ³n, cocina, comedor diario, 3 dormitorios, baÃ±o completo, jardÃ­n, garage, cuarto guarda Ãºtiles. Muy buen entorno. A refaccionar. s/lote: 10X24m.', 0, '2014-08-14 16:44:18', 'ItuzaingÃ³ norte'),
(455, 'ItuzaingÃ³ Sur: Hermoso Chalet quinta 4 amb.', 'U$S: 150.000.-', 'ClÃ¡sico chalet quinta 4 amb. Living comedor c/hogar, cocina comedor diario, 2 dormitorios c/placard, baÃ±o completo, lavadero cub., amplio jardÃ­n, cuarto guarda Ãºtiles, quincho, parrilla, garage. S/lote 770m2. ', 0, '2016-03-31 10:33:53', 'ItuzaingÃ³ sur');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=458;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
