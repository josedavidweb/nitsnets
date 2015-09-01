-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2015 a las 23:14:48
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nitsnets`
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`) VALUES
(1),
(2),
(3),
(4),
(5);

--
-- Volcado de datos para la tabla `categorias_idiomas`
--

INSERT INTO `categorias_idiomas` (`fk_categorias`, `fk_idiomas`, `nombre`) VALUES
(1, 1, 'Calzado'),
(1, 2, 'Footwear'),
(1, 4, 'Schuhwerk'),
(2, 1, 'Abrigos'),
(2, 2, 'Coats'),
(2, 4, 'Mäntel'),
(3, 1, 'Camisetas'),
(3, 2, 'Shirts'),
(3, 4, 'T-Shirts'),
(4, 1, 'Pantalones'),
(4, 2, 'Jeans'),
(4, 4, ''),
(5, 1, 'Sombreros'),
(5, 2, 'Hat'),
(5, 4, 'Hut');

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('033fb2fbd419992823cfa60089e8c4b4f12f8ee8', '::1', 1441041419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034313137363b),
('06558982ddeb0c8aba07062c4e56d2780a110047', '::1', 1441045545, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034353239313b),
('08d964c933db50e5169e1742bea7982ac84ab3ab', '::1', 1440960690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936303339303b),
('0c2ee57e2f55c5a07f6fd1eae0d55fc3320430c4', '::1', 1440964619, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936343630363b63616d706f5f6f626c696761746f72696f7c733a363a224e6f6d627265223b5f5f63695f766172737c613a313a7b733a31373a2263616d706f5f6f626c696761746f72696f223b733a333a226f6c64223b7d),
('0ebcea8201bbd4138498d776fd3d40685db4cd66', '::1', 1440950643, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935303334373b),
('0ee8b40435d1278021cc6110e7fc4c23624c0d9c', '::1', 1440958494, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935383232353b),
('0f89faae044974a56906794f76b1953ab1fc145c', '::1', 1440953381, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935333239353b),
('1064273b2c10f77322e3944a746bd0a3eb6a70b9', '::1', 1440949134, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303934383930303b),
('1268bdafe77b1213a753bb0945d8d931a96fa70e', '::1', 1440965706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936353434323b),
('128b214010135b18586276449fe67a6748d8020f', '::1', 1440958157, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935373839363b),
('15174c370166d52e9407c5d25a61bed819a64078', '::1', 1440965901, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936353830353b),
('173ddf2ed8abd4e7184cd00daf231f317fdd5aa6', '::1', 1440962998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936323730363b),
('182a16eb9cee4c1070d997faa7713dc77f79e78f', '::1', 1441043304, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034333030343b),
('1ab138f3c0c5398e13faae27aacb5c71350606d2', '::1', 1440951092, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935313036363b),
('21174e8c8e56a271621292a098583d5a7760898b', '::1', 1440955411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935353136333b),
('213763a801d465615de85de1b8018b5ae3006dab', '::1', 1440959626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935393432303b),
('22851e00423a36890f54b8bc9d9f9a1877754c85', '::1', 1441045814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034353730373b),
('32a533fe6e172dedab7dd42c150afdeefe1e0ec7', '::1', 1440948484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303934383437363b),
('396cd821399934c9d9a3d548e72d2bb44d2eb7d5', '::1', 1440961249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936313035323b),
('3abdb05d96c17406ab010d8ce164f8182d4a71ba', '::1', 1440948119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303934373835363b),
('3f2484839a3bf1db4165403a2673b9229f22866a', '::1', 1440952906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935323930363b),
('40d106d3b49c3af88a4fea997f6fe528177ea193', '::1', 1440963193, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936333133303b),
('418c2a5c755668af5683a9f821e2281eafdccc3f', '::1', 1440963938, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936333739363b63616d706f5f6f626c696761746f72696f7c733a363a2250726563696f223b5f5f63695f766172737c613a313a7b733a31373a2263616d706f5f6f626c696761746f72696f223b733a333a226e6577223b7d),
('4b657e1cf3176353b019c6e794bd162173a0e37a', '::1', 1440950945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935303637393b),
('4c4068ed9f97e9281d1b24503828abcd5e204bbc', '::1', 1441043712, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034333438353b),
('4e12f57886b912813273b57a524739d7bfa0826c', '::1', 1441042289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034313938393b),
('503117930f0b9b5f8fef674427b54c725afa117f', '::1', 1440962196, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936323033303b),
('5a9b77c844613d82eb0a757969bb16e8a49b6960', '::1', 1440959326, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935393038393b),
('5f9f3799f875aac05b266050e433dc1813afce7d', '::1', 1441042949, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034323638303b),
('605cf27c7485d1eb99b760fbe77760db62643444', '::1', 1440954981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935343737373b),
('69d2f5e6f9ef666beb20ccae7756504c605b42e3', '::1', 1441044631, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034343633313b),
('6b4d4290ef66e1dcf3e3fb6ba218f754ca52fcf4', '::1', 1440963552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936333437313b),
('6b8215276c7d01e1302e51f1f46c8731247ed76c', '::1', 1440965398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936353133313b),
('6bbba9449dbda536cd95288e683cf7b058f50bf6', '::1', 1440947794, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303934373530303b726573756c7461646f7c623a313b5f5f63695f766172737c613a313a7b733a393a22726573756c7461646f223b733a333a226f6c64223b7d),
('6cd8854f16af50dc9b591020ad516d6b43af2c40', '::1', 1441044566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034343335393b),
('7235ceef5d7c61b7b351b6fd505673fd7e69ecd7', '::1', 1441045236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034343937353b),
('82bc3c456bb98c7706aa86eb30edc3a9ed177f65', '::1', 1441042575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034323331313b),
('86c4afc83067b478d6724e71c2483a8d84ef5b76', '::1', 1440960794, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936303734393b),
('87603a2ce7f7ab34d621c6037adf74935b109cc8', '::1', 1440967282, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936363938363b),
('885fc5ece8e14c304aeb46aa6222ae8b42875f88', '::1', 1440955964, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935353839373b),
('92f7ddad54f16955cfebd49719bc68de659e9b8d', '::1', 1440952847, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935323535333b),
('9450eaad7237bf56552311d33c4d6dc94668b177', '::1', 1440950176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303934393837393b),
('a154e404b956cf0c985a8b40d28dc2edd1df3cf7', '::1', 1440948401, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303934383136303b),
('a187b9eeec1afe8679f70125d6199929a2a37940', '::1', 1441044336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034343034343b),
('a38a25bbf0b7e76536a603395227fa2756f0480f', '::1', 1440961707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936313633343b),
('a9e12d30d7c186984c54b84a5fddc111961cfdf1', '::1', 1440959829, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935393739303b),
('b7ae20a4c41e3c860de52083e018ff1593e99f04', '::1', 1440964372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936343132343b),
('b9520301b4163092ee12c7992590090b03599cde', '::1', 1441043448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034333331363b726573756c7461646f7c623a313b5f5f63695f766172737c613a313a7b733a393a22726573756c7461646f223b733a333a226f6c64223b7d),
('ba42659c602f76598f8fd07a3ab246947821f7eb', '::1', 1440952469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935323139323b),
('bd4314ab9165aad2d913a49adaedf3ed95b70bc4', '::1', 1440951990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935313838333b),
('be9911edc4beceff233920d6cf0e77e2df0e62f3', '::1', 1440957522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935373237323b),
('c47768e6a6af7f740b880d7989a080bda486b9e6', '::1', 1440967570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303936373331363b),
('cb4f08e284084801bb67a31ebb6896548969b628', '::1', 1440954597, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935343239383b63616d706f5f6f626c696761746f72696f7c733a363a224e6f6d627265223b5f5f63695f766172737c613a313a7b733a31373a2263616d706f5f6f626c696761746f72696f223b733a333a226e6577223b7d),
('cdab333d691798bf9cdfa0c09110e5ae033b239f', '::1', 1440953992, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935333838353b),
('d8979fe8b6693f106276d6da2c8551c872880632', '::1', 1440957727, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935373539353b),
('daa84a51048aba42de87f6e02f3291b881f98b50', '::1', 1440958619, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935383533323b),
('dd6a06c53593797beb2a4ab9f2bb170663750027', '::1', 1441041748, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034313632343b),
('fed82834c3e297e13b094a6a51fa59554d455989', '::1', 1440957263, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434303935363936393b),
('fff37a258f8ec3ea617eda7ff5f8282c7d5e8bef', '::1', 1441044967, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434313034343636373b);

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`) VALUES
(1),
(2),
(4),
(6),
(7);

--
-- Volcado de datos para la tabla `colores_idiomas`
--

INSERT INTO `colores_idiomas` (`fk_colores`, `fk_idiomas`, `nombre`) VALUES
(1, 1, 'Negro'),
(1, 2, 'Black'),
(1, 4, 'Schwarz'),
(2, 1, 'Rojo'),
(2, 2, 'Red'),
(2, 4, 'Rot'),
(4, 1, 'Amarillo'),
(4, 2, 'Yellow'),
(4, 4, 'Gelb'),
(6, 1, 'Azul'),
(6, 2, ''),
(6, 4, ''),
(7, 1, 'Violeta'),
(7, 2, 'Purple'),
(7, 4, 'Violett');

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `codigo`, `nombre`, `bandera`) VALUES
(1, 'es', 'Español', 'espanya.png'),
(2, 'en', 'Inglés', 'united-kingdom.png'),
(4, 'de', 'Alemán', 'germany.png');

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `fk_categorias`, `precio`) VALUES
(1, 1, 58.99),
(2, 3, 10.12),
(4, 5, 12.5),
(6, 1, 69.9),
(7, 1, 64.95);

--
-- Volcado de datos para la tabla `productos_colores`
--

INSERT INTO `productos_colores` (`fk_productos`, `fk_colores`) VALUES
(1, 1),
(1, 2),
(4, 4),
(4, 6),
(2, 2),
(6, 6),
(6, 1),
(7, 4),
(7, 2),
(7, 7);

--
-- Volcado de datos para la tabla `productos_idiomas`
--

INSERT INTO `productos_idiomas` (`fk_productos`, `fk_idiomas`, `nombre`, `descripcion`) VALUES
(1, 1, 'Zapatillas Running REEBOK Hombre', 'REEBOK presenta en exclusiva estas zapatillas de running para runners exigentes. Se trata de un modelo en color negro con detalles en naranja y verde en la suela y las costuras. Un calzado deportivo, ideal para entrenamientos y pruebas de velocidad.'),
(1, 2, 'REEBOK Running shoes man', 'REEBOK exclusively presents this running shoe for demanding runners. It is a model in black with orange and green on the bottom and seams. A sports footwear, ideal for training and speed tests.'),
(1, 4, 'REEBOK Laufschuhe Mann', 'REEBOK präsentiert exklusiv diesen Laufschuh für anspruchsvolle Läufer. Es ist ein Modell in schwarz mit orange und grün auf der Unterseite und Nähte. Ein Sportschuhe, ideal für Training und Geschwindigkeitstests.'),
(2, 1, 'Camiseta normal', 'Normal'),
(2, 2, 'Normale Hemden', 'Normale'),
(2, 4, 'Normal shirts', 'Normal'),
(4, 1, 'Sombrero de paja', 'Precioso sombrero de paja para el campo'),
(4, 2, 'Straw hat', 'Beautiful straw hat for the field'),
(4, 4, 'Strohhut', 'Schöner Strohhut für den Bereich'),
(6, 1, 'Zapato marinero', 'Zapatos Marinero Cuero Blanco Ejercito Alemán Original Tallas EU 43.5 Nuevos'),
(6, 2, 'Sailor shoe', 'Sailor Leather Shoes White US Army German Original Size 43.5 New'),
(6, 4, 'Segelschuh', 'Sailor Leder-Schuhe Weiß US Armee Deutsch Original Größe 43,5 New'),
(7, 1, 'Botas de montaña', 'Botas de montaña Salewa Alp Trainer Mid Gore-Tex Azul el exterior de Suede completo, revestimiento Gore-Tex®, suela exterior técnica de Salewa y protección de goma exterior'),
(7, 2, 'Mountain boots', 'Hiking boots Salewa Alp Trainer Mid Gore-Tex Blue Suede completely outside, Gore-Tex® lining, outsole Salewa technique and outer rubber protection'),
(7, 4, 'Wanderstiefel', 'Wanderschuhe Salewa Alp Trainer Mid Gore-Tex Blue Suede vollständig außerhalb, Gore-Tex® Innenfutter, Laufsohle Salewa Technik und äußeren Gummischutz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
