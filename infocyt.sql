-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2018 a las 07:35:22
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infocyt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_conocimiento`
--

CREATE TABLE `area_conocimiento` (
  `id_area_conocimiento` int(11) NOT NULL,
  `nombre_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave_area` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `area_conocimiento`
--

INSERT INTO `area_conocimiento` (`id_area_conocimiento`, `nombre_area`, `clave_area`) VALUES
(1, 'Agricultura, silvicultura, piscicultura y otras', 'AGR'),
(2, 'Biotecnología', 'BTG'),
(3, 'Ciencias Físicas', 'FIS'),
(4, 'Ciencias Ambientales y de la Tierra', 'GEO'),
(5, 'Ciencias Biológicas', 'BIO'),
(6, 'Ciencias de la Educación', 'EDU'),
(7, 'Ciencias de la salud', 'SLD'),
(8, 'Ciencias Químicas', 'QUM'),
(9, 'Economía', 'ECN'),
(10, 'Historia', 'HIS'),
(11, 'Idiomas y literatura', 'LNG'),
(12, 'Ingeniería Civil y Arquitectura', 'INC'),
(13, 'Ingeniería Eléctrica y Electrónica', 'INE'),
(14, 'Matemáticas y Ciencias de la Computación', 'MAT'),
(15, 'Medicina Básica', 'MED'),
(16, 'Medicina Clínica', 'CLI'),
(17, 'Medicina Veterinaria', 'VET'),
(18, 'Psicología', 'PSI'),
(19, 'Otras Ciencias Ingenieriles', 'INO'),
(20, 'Otras Ciencias Sociales', 'SOC'),
(21, 'Otras Humanidades', 'HMN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campo_conocimiento`
--

CREATE TABLE `campo_conocimiento` (
  `id_conocimiento` int(11) NOT NULL,
  `descr_conocimiento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campo_conocimiento`
--

INSERT INTO `campo_conocimiento` (`id_conocimiento`, `descr_conocimiento`) VALUES
(1, 'NO DEFINIDA'),
(2, 'ANTROPOLOGIA'),
(3, 'ARTES Y LETRAS'),
(4, 'ASTRONOMIA Y ASTROFISICA'),
(5, 'CIENCIAS AGRONOMICAS Y VETERINARIAS'),
(6, 'CIENCIAS DE LA TECNOLOGIA'),
(7, 'CIENCIAS DE LA TIERRA Y EL COSMOS'),
(8, 'CIENCIAS DE LA VIDA'),
(9, 'CIENCIAS ECONOMICAS'),
(10, 'CIENCIAS JURIDICAS Y DERECHO'),
(11, 'CIENCIAS POLITICAS'),
(12, 'DEMOGRAFIA'),
(13, 'ETICA'),
(14, 'FILOSOFIA'),
(15, 'FISICA'),
(16, 'GEOGRAFIA'),
(17, 'HISTORIA'),
(18, 'LINGUISTICA'),
(19, 'LOGICA'),
(20, 'MATEMATICAS'),
(21, 'MEDICINA Y PATOLOGIA HUMANA'),
(22, 'PEDAGOGIA'),
(23, 'PSICOLOGIA'),
(24, 'QUIMICA'),
(25, 'SOCIOLOGIA'),
(26, 'NO ESPECIFICADO'),
(27, 'CIENCIAS DE LA SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_economica`
--

CREATE TABLE `clase_economica` (
  `id_clase` int(11) NOT NULL,
  `rama_id` int(11) NOT NULL,
  `descr_clase` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase_economica`
--

INSERT INTO `clase_economica` (`id_clase`, `rama_id`, `descr_clase`) VALUES
(1, 1, 'NO DEFINIDA'),
(2, 1, 'CULTIVO DE SOYA'),
(3, 1, 'CULTIVO DE CARTAMO'),
(4, 1, 'CULTIVO DE GIRASOL'),
(5, 1, 'CULTIVO ANUAL DE OTRAS SEMILLAS OLEAGINOSAS'),
(6, 1, 'CULTIVO DE FRIJOL GRANO'),
(7, 1, 'CULTIVO DE GARBANZO GRANO'),
(8, 1, 'CULTIVO DE OTRAS LEGUMBRES'),
(9, 1, 'CULTIVO DE TRIGO'),
(10, 1, 'CULTIVO DE MAIZ GRANO'),
(11, 1, 'CULTIVO DE MAIZ FORRAJERO'),
(12, 1, 'CULTIVO DE ARROZ'),
(13, 1, 'CULTIVO DE SORGO GRANO'),
(14, 1, 'CULTIVO DE AVENA GRANO'),
(15, 1, 'CULTIVO DE CEBADA GRANO'),
(16, 1, 'CULTIVO DE SORGO FORRAJERO'),
(17, 1, 'CULTIVO DE AVENA FORRAJERA'),
(18, 1, 'CULTIVO DE OTROS CEREALES'),
(19, 2, 'CULTIVO DE JITOMATE O TOMATE ROJO'),
(20, 2, 'CULTIVO DE CHILE'),
(21, 2, 'CULTIVO DE CEBOLLA'),
(22, 2, 'CULTIVO DE MELON O SANDIA'),
(23, 2, 'CULTIVO DE TOMATE VERDE'),
(24, 2, 'CULTIVO DE PAPA'),
(25, 2, 'CULTIVO DE CALABACITA'),
(26, 2, 'CULTIVO DE OTRAS HORTALIZAS Y SEMILLAS DE HORTALIZAS'),
(27, 3, 'CULTIVO DE NARANJA'),
(28, 3, 'CULTIVO DE LIMON'),
(29, 3, 'CULTIVO DE OTROS CITRICOS'),
(30, 3, 'CULTIVO DE CAFE'),
(31, 3, 'CULTIVO DE PLATANO'),
(32, 3, 'CULTIVO DE MANGO'),
(33, 3, 'CULTIVO DE AGUACATE'),
(34, 3, 'CULTIVO DE UVA'),
(35, 3, 'CULTIVO DE MANZANA'),
(36, 3, 'CULTIVO DE CACAO'),
(37, 3, 'CULTIVO DE OTROS FRUTALES NO CITRICOS Y DE NUECES'),
(38, 4, 'CULTIVO DE PRODUCTOS ALIMENTICIOS EN INVERNADEROS'),
(39, 4, 'FLORICULTURA A CIELO ABIERTO'),
(40, 4, 'FLORICULTURA EN INVERNADERO'),
(41, 4, 'CULTIVO DE ARBOLES DE CICLO PRODUCTIVO DE 10 ANOS O MENOS'),
(42, 4, 'OTROS CULTIVOS EN INVERNADEROS Y VIVEROS'),
(43, 5, 'CULTIVO DE TABACO'),
(44, 5, 'CULTIVO DE ALGODON'),
(45, 5, 'CULTIVO DE CANA DE AZUCAR'),
(46, 5, 'CULTIVO DE ALFALFA'),
(47, 5, 'CULTIVO DE PASTOS Y ZACATES'),
(48, 5, 'CULTIVO DE COCO'),
(49, 5, 'CULTIVO DE CACAHUATE'),
(50, 5, 'CULTIVO DE AGAVE ALCOHOLERO'),
(51, 5, 'OTROS CULTIVOS'),
(52, 6, 'EXPLOTACION DE BOVINOS PARA CARNE'),
(53, 6, 'EXPLOTACION DE BOVINOS PARA LECHE'),
(54, 6, 'EXPLOTACION DE BOVINOS SIN ESPECIALIZACION'),
(55, 7, 'EXPLOTACION DE PORCINOS EN GRANJA'),
(56, 7, 'EXPLOTACION DE PORCINOS EN TRASPATIO'),
(57, 8, 'EXPLOTACION DE GALLINAS PONEDORAS DE HUEVO FERTIL'),
(58, 8, 'EXPLOTACION DE GALLINAS PONEDORAS DE HUEVO PARA PLATO'),
(59, 8, 'EXPLOTACION DE POLLOS PARA CARNE'),
(60, 8, 'EXPLOTACION DE GUAJOLOTES O PAVOS'),
(61, 8, 'PRODUCCION DE AVES DE CORRAL EN INCUBADORA'),
(62, 8, 'EXPLOTACION DE OTRAS AVES PRODUCTORAS DE CARNE Y HUEVO'),
(63, 9, 'EXPLOTACION DE OVINOS'),
(64, 9, 'EXPLOTACION CONJUNTA DE OVINOS CON CAPRINOS'),
(65, 9, 'EXPLOTACION DE CAPRINOS'),
(66, 10, 'CAMARONICULTURA'),
(67, 10, 'ACUICULTURA ANIMAL EXCEPTO CAMARONICULTURA'),
(68, 11, 'APICULTURA'),
(69, 11, 'EXPLOTACION DE EQUIDOS'),
(70, 11, 'CUNICULTURA Y EXPLOTACION DE ANIMALES DE PIEL CON PELAJE FINO'),
(71, 11, 'EXPLOTACION DE OTROS ANIMALES'),
(72, 12, 'SILVICULTURA'),
(73, 13, 'VIVEROS FORESTALES'),
(74, 13, 'RECOLECCION DE PRODUCTOS FORESTALES'),
(75, 14, 'TALA DE ARBOLES'),
(76, 15, 'PESCA DE CAMARON'),
(77, 15, 'PESCA DE TUNIDOS'),
(78, 15, 'PESCA DE SARDINA Y ANCHOVETA'),
(79, 15, 'PESCA DE OTRAS ESPECIES'),
(80, 16, 'CAZA Y CAPTURA'),
(81, 17, 'SERVICIOS DE FUMIGACION AGRICOLA'),
(82, 17, 'DESPEPITE DE ALGODON'),
(83, 17, 'BENEFICIO DE PRODUCTOS AGRICOLAS'),
(84, 17, 'OTROS SERVICIOS RELACIONADOS CON LA AGRICULTURA'),
(85, 18, 'SERVICIOS RELACIONADOS CON LA GANADERIA'),
(86, 19, 'SERVICIOS RELACIONADOS CON EL APROVECHAMIENTO FORESTAL'),
(87, 20, 'EXTRACCION DE PETROLEO Y GAS'),
(88, 21, 'MINERIA DE CARBON MINERAL'),
(89, 22, 'MINERIA DE HIERRO'),
(90, 22, 'MINERIA DE ORO'),
(91, 22, 'MINERIA DE PLATA'),
(92, 22, 'MINERIA DE COBRE Y NIQUEL'),
(93, 22, 'MINERIA DE PLOMO Y ZINC'),
(94, 22, 'MINERIA DE MANGANESO'),
(95, 22, 'MINERIA DE MERCURIO Y ANTIMONIO'),
(96, 22, 'MINERIA DE URANIO Y MINERALES RADIACTIVOS'),
(97, 22, 'MINERIA DE OTROS MINERALES METALICOS'),
(98, 23, 'MINERIA DE PIEDRA DE CAL'),
(99, 23, 'MINERIA DE MARMOL'),
(100, 23, 'MINERIA DE OTRAS PIEDRAS DIMENSIONADAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamentos` int(11) NOT NULL,
  `descr_departamentos` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dependencia_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamentos`, `descr_departamentos`, `dependencia_id`) VALUES
(1, 'DEPARTAMENTO DE FISICO-QUIMICA', 23),
(2, 'DEPARTAMENTO DE QUIMICA ORGANICA', 23),
(3, 'LABORATORIO DE SINTESIS ORGANICA Y FITOQUIMICA', 23),
(4, 'DEPARTAMENTO DE MICROBIOLOGIA', 23),
(5, 'INSTITUTO DE CIENCIAS', 23),
(6, 'DEPARTAMENTO DE QUIMICA INORGANICA', 23),
(7, 'DEPARTAMENTO DE INMUNOLOGIA', 1972),
(8, 'DEPARTAMENTO DE MICROBIOLOGIA Y PARASITOLOGIA, AGENTES BIOLOGICOS', 1972),
(9, 'DEPARTAMENTO DE INVESTIGACION DE CIENCIAS AGRICOLAS', 2146),
(10, 'CENTRO DE INVESTIGACIONES EN CIENCIAS QUIMICAS', 2146),
(11, 'DEPARTAMENTO DE INVESTIGACION EN ZEOLITA', 2146),
(12, 'CENTRO DE INVESTIGACIONES EN CIENCIAS FISIOLOGICAS', 2146),
(13, 'CENTRO DE INVESTIGACIONES EN CIENCIAS MICROBIOLOGICAS', 2146),
(14, 'CENTRO DE INVESTIGACIONES EN DISPOSITIVOS SEMICONDUCTORES', 2146),
(15, 'DEPARTAMENTO DE INVESTIGACIONES ARQUITECTONICAS Y URBANISTICAS', 2146),
(16, 'DEPARTAMENTO DE MATEMATICAS', 2146),
(17, 'DEPARTAMENTO DE MICROELECTRONICA', 2146),
(18, 'DEPARTAMENTO DE FISICA', 2146),
(19, 'CENTRO DE QUIMICA', 2146),
(20, 'AREA DE CIENCIAS DEL LENGUAJE', 2305),
(21, 'AREA DE CULTURA Y SOCIEDADES', 2305),
(22, 'AREA DE EST. PARA LA CONSERVACION Y DIFUSION DEL PATRIMONIO', 2305),
(23, 'AREA DE ESTUDIOS LATINOAMERICANOS', 2305),
(24, 'AREA DE ESTUDIOS REGIONALES', 2305),
(25, 'AREA DE HISTORIA', 2305),
(26, 'AREA DE SOCIEDAD Y CULTURA', 2305),
(27, 'AREA DE SOCIOLOGIA Y CIENCIA POLITICA', 2305),
(28, 'AREA DE DINAMICA NO-LINEAL Y CAOS', 2453),
(29, 'AREA DE ELECTRONICA CUANTICA', 2453),
(30, 'AREA DE FISICA ATOMICA Y MOLECULAR', 2453),
(31, 'AREA DE PARTICULAS ELEMENTALES', 2453),
(32, 'AREA DE PROP ELECTRONICAS Y DE TRANSPORTE EN SEMICONDUCTORES', 2453),
(33, 'AREA DE PROPIEDADES OPTICAS Y ELECTRONICA DE SUPERFICIES', 2453),
(34, 'AREA DE SUPERCONDUCTIVIDAD', 2453),
(35, 'AREA DE PROPIEDADES ESTRUCTURALES DE MATERIALES', 2453),
(36, 'POSGRADO EN MATEMATICAS', 2834),
(37, 'COLEGIO DE FISICA', 2834),
(38, 'POSGRADO EN OPTOELECTRONICA', 2834),
(39, 'COLEGIO DE COMPUTACION', 2834),
(40, 'MAESTRIA EN MATEMATICAS', 2834),
(41, 'AREA DE PARTICULAS ELEMENTALES', 2834),
(42, 'CENTRO DE INVESTIGACIONES JURIDICO POLITICAS', 2944),
(43, 'AREA DE PSICOLOGIA SOCIAL', 3047),
(44, 'DIVISION DE POSGRADO', 364),
(45, 'COLEGIO DE ANTROPOLOGIA SOCIAL', 364),
(46, 'CENTRO DE CIENCIAS POLITICAS', 364),
(47, 'COLEGIO DE HISTORIA', 364),
(48, 'COLEGIO DE FILOSOFIA', 364),
(49, 'CENTRO DE INVESTIGACION EN INGENIERIA QUIMICA', 3359),
(50, 'DEPARTAMENTO DE MATEMATICAS', 3359),
(51, 'DIVISION DE ESTUDIOS DE POSTGRADO', 108),
(52, 'DEPARTAMENTO DE INVESTIGACION', 4411),
(53, 'BIOTERIO CLAUDE BERNARD', 4444),
(54, 'CENTRO DE ESTUDIOS UNIVERSITARIOS', 4444),
(55, 'SECRETARIA DE INVESTIGACION Y ESTUDIOS DE POSGRADO', 4562),
(56, 'DEPARTAMENTO DE ACUICULTURA', 898),
(57, 'DEPARTAMENTO DE GEOFISICA APLICADA', 8),
(58, 'DEPARTAMENTO DE GEOLOGIA', 8),
(59, 'DEPARTAMENTO DE SISMOLOGIA', 8),
(60, 'DEPARTAMENTO DE ELECTRONICA Y TELECOMUNICACIONES', 898),
(61, 'DEPARTAMENTO DE OPTICA', 898),
(62, 'DEPARATAMENTO DE CIENCIAS DE LA COMPUTACION', 898),
(63, 'DEPARTAMENTO DE ACUICULTURA', 1261),
(64, 'DEPARTAMENTO DE ECOLOGIA', 1261),
(65, 'DEPARTAMENTO DE OCEANOGRAFIA FISICA', 1261),
(66, 'DEPARTAMENTO DE BIOTECNOLOGIA', 2717),
(67, 'DEPARTAMENTO DE MICROBIOLOGIA EXPERIMENTAL', 2717),
(68, 'DEPARTAMENTO DE BIOLOGIA DE LA CONSERVACION', 2717),
(69, 'DEPTO DE RECURSOS NATURALES', 1261),
(70, 'LABORATORIO DE GENETICA MOLECULAR', 23),
(71, 'DEPARTAMENTO DE BIOQUIMICA', 2146),
(72, 'DEPARTAMENTO DE BIOTECNOLOGIA', 2146),
(73, 'DEPARTAMENTO DE FISIOLOGIA Y BIOQUIMICA', 2146),
(74, 'DEPARTAMENTO DE RECURSOS NATURALES', 2146),
(75, 'DIVISION DE BIOLOGIA VEGETAL', 897),
(76, 'DEPARTAMENTO DE POLIMEROS', 2717),
(77, 'DEPARTAMENTO DE CIENCIA DE LOS ALIMENTOS', 8),
(78, 'DEPARTAMENTO DE NUTRICION', 898),
(79, 'DEPTO. DE TECNOLOGIA DE ALIMENTOS DE ORIGEN ANIMAL', 1261),
(80, 'FISIOLOGIA Y TECNOLOGIA POSCOSECHA DE FRUTAS Y HORTALIZAS', 1546),
(81, 'DEPTO. DE MANEJO AMBIENTAL', 23),
(82, 'DEPARTAMENTO DE PATOLOGIA', 23),
(83, 'DEPTO. DE TECNOLOGIA DE ALIMENTOS DE ORIGEN VEGETAL', 2305),
(84, 'DEPARTAMENTO DE DESARROLLO HUMANO Y BIENESTAR SOCIAL', 2834),
(85, 'DEPARTAMENTO DE ECONOMIA REGIONAL E INTEGRACION INTERNACIONAL', 2834),
(86, 'DEPARTAMENTO DE ESTUDIOS SOCIALES  DEL SISTEMA ALIMENTARIO', 2834),
(87, 'DEPTO. DE MATERIALES CERAMICOS', 8),
(88, 'DEPTO. DE METALURGIA', 8),
(89, 'DEPTO. DE POLIMEROS', 8),
(90, 'DEPTO. DE CORROSION', 1261),
(91, 'DEPTO. DE ECOLOGIA Y MEDIO AMBIENTE', 1261),
(92, 'DEPARTAMENTO DE MICROSCOPIA ELECTRONICA', 2146),
(93, 'DEPARTAMENTO DE CATALISIS', 2944),
(94, 'DEPTO. DE BIOPOLIMEROS', 1546),
(95, 'DEPTO. DE QUIMICA DE POLIMEROS', 1546),
(96, 'DEPARTAMENTO DE INVESTIGACION Y DESARROLLO', 23),
(97, 'DEPTO. DE PROCESADO DE PLASTICOS', 23),
(98, 'DEPARTAMENTO DE POLIMEROS', 1972),
(99, 'GERENCIA DE FISICOQUIMICA DE POLIOMEROS', 2146),
(100, 'DEPARTAMENTO DE QUIMICA ORGANICA', 2305);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL,
  `descr_dependencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dependencias`, `descr_dependencia`, `institucion_id`) VALUES
(1, 'CENTRO DE INVESTIGACIONES MICROBIOLOGICAS', 7),
(2, 'DIRECCION DE INVESTIGACION Y DESARROLLO', 9),
(3, 'DIRECCION ACADEMICA', 11),
(4, 'UNIDAD HERMOSILLO', 13),
(5, 'CENTRO DE INGENIERIA Y DESARROLLO INDUSTRIAL', 15),
(6, 'DIVISION DE CIENCIAS DE LA TIERRA', 16),
(7, 'UNIDAD DE BIOLOGIA EXPERIMENTAL', 17),
(8, 'DIRECCION DE CIENCIAS DE LOS ALIMENTOS', 18),
(9, 'DIVISION DE CARACTERIZACION DE MATERIALES', 19),
(10, 'GERENCIA DE INGENIERIA DE PROCESOS QUIMICOS', 20),
(11, 'UNIDAD DISTRITO FEDERAL', 21),
(12, 'DIVISION DE ECONOMIA', 22),
(13, 'DIRECCION DE ESTUDIOS DEL CARIBE', 24),
(14, 'AREA CIENCIAS DE LA COMPUTACION', 26),
(15, 'AREA DE INVESTIGACION', 27),
(16, 'SUBDIRECCION ACADEMICA', 29),
(17, 'DEPARTAMENTO DE INGENIERIA ELECTRONICA', 30),
(18, 'DIVISION DE BIOTECNOLOGIA', 31),
(19, 'UNIDAD RETABLO (MATRIZ)', 32),
(20, 'DIVISION DE BIOLOGIA EXPERIMENTAL', 33),
(21, 'CAMPUS PUEBLA', 34),
(22, 'AREA DE METROLOGIA ELECTRICA', 40),
(23, 'DIRECCION GENERAL', 42),
(24, 'DIRECCION GENERAL', 43),
(25, 'UNIDAD DE FORMACION ACADEMICA POSGRADUAL', 44),
(26, 'AREA DE INVESTIGACION', 52),
(27, 'CENTRO DE ESTUDIOS DEMOGRAFICOS Y DE DESARROLLO URBANO', 53),
(28, 'CENTRO DE ESTUDIOS SOCIOESPACIALES Y POLITICAS PUBLICAS', 54),
(29, 'CENTRO DE ESTUDIOS ANTROPOLOGICOS', 55),
(30, 'PROGRAMA MEXICO-ESTADOS UNIDOS', 57),
(31, 'COORDINACION DE INVESTIGACION', 58),
(32, 'UNIDAD REGIONAL NOGALES', 59),
(33, 'UNIDAD SAN CRISTOBAL DE LAS CASAS', 60),
(34, 'UNIDAD CIUDAD DEL CARMEN, CAMPECHE', 65),
(35, 'CENTRO NACIONAL DE INVESTIGACION Y DESARROLLO Y TECNOLOGICO', 69),
(36, 'ESCUELA NACIONAL DE ANTROPOLOGIA E HISTORIA UNIDAD CHIHUAHUA', 74),
(37, 'FACULTAD DE PSICOLOGIA', 77),
(38, 'COORDINACION DE INVESTIGACION', 80),
(39, 'CENTRO DE INVESTIGACION SISMICA', 81),
(40, 'CAMPO EXPERIMENTAL BAJIO', 82),
(41, 'PROYECTO ECONOMIA Y SALUD', 83),
(42, 'CID CENTRO DE INVESTIGACION Y DESARROLLO TECNOLOGICO, S.A. DE C.V.', 85),
(43, 'UNIDAD DE INVESTIGACION', 88),
(44, 'HOSPITAL GENERAL DE MEXICO', 90),
(45, 'DIVISION DE ASISTENCIA MEDICA', 92),
(46, 'CAMPO EXPERIMENTAL COSTA DE ENSENADA', 95),
(47, 'CENTRO REGIONAL DEL BAJIO', 96),
(48, 'DIVISION DE INVESTIGACION EN NEUROCIENCIAS', 97),
(49, 'UNIDAD DURANGO', 98),
(50, 'COORDINACION DE TECNOLOGIA HIDROLOGICA', 100),
(51, 'COORDINACION DEL PROGRAMA DE BIOTECNOLOGIA DEL PETROLEO', 101),
(52, 'COORDINACION DE EQUIPAMIENTO', 102),
(53, 'DIRECCION DE ESTUDIOS HISTORICOS', 103),
(54, 'COORDINACION DE OPTICA', 104),
(55, 'DIVISION DE INVESTIGACION BASICA', 105),
(56, 'DEPARTAMENTO DE BIOQUIMICA', 106),
(57, 'DEPARTAMENTO DE BIOLOGIA MOLECULAR', 107),
(58, 'DIRECCION DE INVESTIGACION', 108),
(59, 'GERENCIA DE CIENCIAS AMBIENTALES Y GENETICA', 110),
(60, 'SUBDIRECCION GENERAL DE INVESTIGACION', 111),
(61, 'UNIDAD DE INVESTIGACION', 112),
(62, 'SUBDIRECCION DE INVESTIGACION', 113),
(63, 'DIRECCION GENERAL DE INVESTIGACION PESQUERA DEL ATLANTICO', 114),
(64, 'INSTITUTO NACIONAL DE VIROLOGIA', 116),
(65, 'CENTRO  INTERDISCIPLINARIO DE ESTUDIOS SOBRE  MEDIO AMBIENTE Y DESARROLLO', 117),
(66, 'CAMPUS-CIUDAD DE MEXICO', 118),
(67, 'DIVISION ACADEMICA DE ACTUARIA ESTADISTICA Y MATEMATICAS', 124),
(68, 'DEPARTAMENTO DE CIENCIAS BASICAS', 125),
(69, 'DEPARTAMENTO DE CIENCIAS BASICAS', 126),
(70, 'DEPARTAMENTO DE INGENIERIA BIOQUIMICA', 129),
(71, 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS', 130),
(72, 'DEPARTAMENTO DE CIENCIAS BASICAS', 131),
(73, 'DEPTO. DE BIOLOGIA', 133),
(74, 'DEPARTAMENTO DE INGENIERIA QUIMICA-BIOQUIMICA', 135),
(75, 'DEPARTAMENTO DE CIENCIAS ADMINISTRATIVAS', 136),
(76, 'DEPARTAMENTO DE CIENCIAS BASICAS', 137),
(77, 'DIVISION DE ESTUDIOS DE POSGRADO E INVESTIGACION', 138),
(78, 'DEPARTAMENTO DE CIENCIAS BASICAS', 139),
(79, 'DEPARTAMENTO DE CIENCIAS BASICAS', 140),
(80, 'DIVISION DE INGENIERIAS Y CIENCIAS BIOLOGICAS', 141),
(81, 'AREA DE INGENIERIA BIOQUIMICA EN ALIMENTOS', 143),
(82, 'ACADEMIA DE CIENCIAS ECONOMICAS Y ADMINISTRATIVAS', 145),
(83, 'DEPARTAMENTO DE QUIMICA Y BIOQUIMICA', 146),
(84, 'DEPARTAMENTO DE CIENCIAS BASICAS', 148),
(85, 'COORDINACION DE INVESTIGACION', 153),
(86, 'DIVISION DE SISTEMAS DE CONTROL', 155),
(87, 'DIRECCION GENERAL EN CIENCIA Y TECNOLOGIA', 162),
(88, 'DIRECCION GENERAL', 163),
(89, 'LANIA, A.C.', 165),
(90, 'SECRETARIA', 176),
(91, 'SECRETARIA', 177),
(92, 'SECRETARIA DEL ESTADO DE QUINTANA ROO', 178),
(93, 'DIVISION DE INVESTIGACION BASICA', 179),
(94, 'DIRECCION ACADEMICA', 186),
(95, 'CENTRO DE ALTA DIRECCION EN INGENIERIA Y TECNOLOGIA', 189),
(96, 'UNIDAD SALTILLO', 190),
(97, 'BIBLIOTECA FRAY FRANCISCO DE BURGOA', 191),
(98, 'CENTRO DE CIENCIAS BASICAS', 192),
(99, 'AREA INTERDISCIPLINARIA DE CIENCIAS AGROPECUARIAS', 193),
(100, 'AREA INTERDISCIPLINARIA DE CIENCIAS AGROPECUARIAS', 194);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigido_sector`
--

CREATE TABLE `dirigido_sector` (
  `id_dirigido_sector` int(11) NOT NULL,
  `nombre_dirigido` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dirigido_sector`
--

INSERT INTO `dirigido_sector` (`id_dirigido_sector`, `nombre_dirigido`) VALUES
(1, 'No definido'),
(2, 'Estudiantes'),
(3, 'Empresarios'),
(4, 'Funcionarios'),
(5, 'Público en General'),
(6, 'Sector Acádemico'),
(7, 'Sector Privado'),
(8, 'Sector Público'),
(9, 'Sector Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `descr_disciplina` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `conocimiento_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `descr_disciplina`, `conocimiento_id`) VALUES
(74, 'GEODESIA', 7),
(73, 'GEOQUIMICA', 7),
(72, 'CLIMATOLOGIA', 7),
(71, 'CIENCIAS ATMOSFERICAS', 7),
(70, 'OTRAS ESPECIALIDADES EN MATERIA DE BIOLOGIA', 8),
(69, 'EVOLUCION', 8),
(68, 'VIROLOGIA', 8),
(67, 'SIMBIOSIS', 8),
(66, 'RADIOBIOLOGIA', 8),
(65, 'BOTANICA', 8),
(64, 'PALEONTOLOGIA', 8),
(63, 'BIOLOGIA MOLECULAR', 8),
(62, 'MICROBIOLOGIA', 8),
(61, 'ENTOMOLOGIA GENERAL', 8),
(60, 'INMUNOLOGIA', 8),
(59, 'FISIOLOGIA HUMANA', 8),
(58, 'BIOLOGIA HUMANA', 8),
(57, 'GENETICA', 8),
(56, 'ETOLOGIA', 8),
(55, 'BIOLOGIA CELULAR', 8),
(54, 'BIOFISICA', 8),
(53, 'BIOMETRIA', 8),
(52, 'BIOMATEMATICA', 8),
(51, 'BIOQUIMICA', 8),
(50, 'ANTROPOLOGIA FISICA', 8),
(49, 'BIOLOGIA ANIMAL Y ZOOLOGIA', 8),
(48, 'OTRAS ESPECIALIDADES EN MATERIA DE QUIMICA', 24),
(47, 'QUIMICA FISICA', 24),
(46, 'QUIMICA ORGANICA', 24),
(45, 'QUIMICA NUCLEAR', 24),
(44, 'QUIMICA DE LAS MACROMOLECULAS', 24),
(43, 'QUIMICA INORGANICA', 24),
(42, 'BIOQUIMICA', 24),
(41, 'QUIMICA ANALITICA', 24),
(40, 'OTRAS ESPECIALIDADES EN MATERIA DE FISICA', 15),
(39, 'FISICA DEL ESPACIO', 15),
(38, 'UNIDADES Y CONSTANTES FISICA', 15),
(37, 'TERMODINAMICA', 15),
(36, 'FISICA TEORICA', 15),
(35, 'FISICA DEL ESTADO SOLIDO', 15),
(34, 'FISICOQUIMICA', 15),
(33, 'OPTICA', 15),
(32, 'FISICA DE LAS PARTICULAS NUCLEARES', 15),
(31, 'FISICA NUCLEAR', 15),
(30, 'FISICA MOLECULAR', 15),
(29, 'MECANICA', 15),
(28, 'FISICA DE FLUIDOS', 15),
(27, 'ELECTRONICA', 15),
(26, 'ELECTROMAGNETISMO', 15),
(25, 'ACUSTICA', 15),
(24, 'OTRAS ESPECIALIDADES EN MATERIA DE ASTRONOMIA', 4),
(23, 'SISTEMA SOLAR', 4),
(22, 'RADIOASTRONOMIA', 4),
(21, 'PLANETOLOGIA', 4),
(20, 'ASTRONOMIA OPTICA', 4),
(19, 'ESPACIOS Y MATERIA INTERPLANETARIOS', 4),
(18, 'COSMOLOGIA Y COSMOGONIA', 4),
(17, 'OTRAS ESPECIALIDADES EN MATERIA DE MATEMATICAS', 20),
(16, 'TOPOLOGIA', 20),
(15, 'ESTADISTICA', 20),
(14, 'CALCULO DE PROBABILIDADES', 20),
(13, 'INVESTIGACION OPERATIVA', 20),
(12, 'ANALISIS NUMERICO', 20),
(11, 'TEORIA DE LOS NUMEROS', 20),
(10, 'GEOMETRIA', 20),
(9, 'INFORMATICA MATEMATICA', 20),
(8, 'ANALISIS Y ANALISIS FUNCIONAL', 20),
(7, 'ALGEBRA', 20),
(6, 'OTRAS ESPECIALIDADES RELATIVAS A LA LOGICA', 19),
(5, 'METODOLOGIA', 19),
(4, 'LOGICA INDUCTIVA', 19),
(3, 'LOGICA GENERAL', 19),
(2, 'LOGICA DEDUCTIVA', 19),
(1, 'APLICACIONES DE LA LOGICA', 19),
(75, 'GEOGRAFIA', 7),
(76, 'GEOLOGIA', 7),
(77, 'GEOFISICA', 7),
(78, 'HIDROLOGIA', 7),
(79, 'METEOROLOGIA', 7),
(80, 'OCEANOGRAFIA', 7),
(81, 'CIENCIAS DEL SUELO', 7),
(82, 'CIENCIAS DEL COSMOS', 7),
(83, 'OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS DE LA TIERRA DEL COSMOS Y DEL MEDIO AMBIENTE', 7),
(84, 'QUIMICA AGRONOMICA', 5),
(85, 'INGENIERIA RURAL', 5),
(86, 'AGRONOMIA', 5),
(87, 'CIENCIAS VETERINARIAS', 5),
(88, 'PECES Y ANIMALES SALVAJES', 5),
(89, 'SILVICULTURA', 5),
(90, 'HORTICULTURA', 5),
(91, 'FITOPATOLOGIA', 5),
(92, 'HIGIENE VETERINARIA Y SALUD PUBLICA', 5),
(93, 'OTRAS ESPECIALIDADES EN MATERIA DE CIENCIAS AGRONOMICAS Y VETERINARIAS', 5),
(94, 'MEDICINA CLINICA', 21),
(95, 'EPIDEMIOLOGIA', 21),
(96, 'MEDICINA FORENSE', 21),
(97, 'MEDICINA DEL TRABAJO', 21),
(98, 'MEDICINA INTERNA', 21),
(99, 'NUTRICION', 21),
(100, 'PATOLOGIA', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleadoras`
--

CREATE TABLE `empleadoras` (
  `id_empleadoras` int(11) NOT NULL,
  `nom_empleador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleadoras`
--

INSERT INTO `empleadoras` (`id_empleadoras`, `nom_empleador`) VALUES
(1, 'Actividad Profesional'),
(2, 'Empresa'),
(3, 'Institución'),
(4, 'No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_est` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_est`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Coahuila de Zaragoza'),
(6, 'Colima'),
(7, 'Chiapas'),
(8, 'Chihuahua'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán de Ocampo'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz de Ignacio de la Llave'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id_civil` int(11) NOT NULL,
  `nombre_civil` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id_civil`, `nombre_civil`) VALUES
(1, 'Casado(a)'),
(2, 'Divorciado(a)'),
(3, 'Soltero(a)'),
(4, 'Unión Libre'),
(5, 'Viudo(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_articulo`
--

CREATE TABLE `estatus_articulo` (
  `id_estatus_articulos` int(11) NOT NULL,
  `nombre_estatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estatus_articulo`
--

INSERT INTO `estatus_articulo` (`id_estatus_articulos`, `nombre_estatus`) VALUES
(1, 'Aceptado con Arbitraje'),
(2, 'Divulgación'),
(3, 'Memorias de congresos'),
(4, 'No definido'),
(5, 'Publicado con Arbitraje'),
(6, 'Publicado sin Arbitraje'),
(7, 'Revistas Arbitradas'),
(8, 'Revistas Indexadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_grado`
--

CREATE TABLE `estatus_grado` (
  `id_est_grado` int(11) NOT NULL,
  `descr_est_grado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estatus_grado`
--

INSERT INTO `estatus_grado` (`id_est_grado`, `descr_est_grado`) VALUES
(1, 'No definido'),
(2, 'Obtención'),
(3, 'Proceso'),
(4, 'Terminado'),
(5, 'Truncado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre_gen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre_gen`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `descr_grado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `descr_grado`) VALUES
(1, 'DIPLOMADO'),
(2, 'MAESTRIA'),
(3, 'DOCTORADO'),
(4, 'POSDOCTORADO'),
(5, 'ESPECIALIDAD'),
(6, 'LICENCIATURA'),
(7, 'NO DEFINIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguaje`
--

CREATE TABLE `lenguaje` (
  `id_lenguaje` int(11) NOT NULL,
  `nombre_leng` varchar(255) NOT NULL,
  `descr_corta` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) NOT NULL,
  `requiere_renovacion` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lenguaje`
--

INSERT INTO `lenguaje` (`id_lenguaje`, `nombre_leng`, `descr_corta`, `categoria`, `requiere_renovacion`) VALUES
(1, 'Chino (Cantonese)', 'Chino', 'LNG', 0),
(2, 'Afrikaans', 'Afrikaans', 'LNG', 0),
(3, 'Amharic', 'Amharic', 'LNG', 0),
(4, 'Arabic', 'Arabic', 'LNG', 0),
(5, 'American Sign Language', 'Sign', 'LNG', 0),
(6, 'Bahasa (Indonesian)', 'Bahasa', 'LNG', 0),
(7, 'Bengali', 'Bengali', 'LNG', 0),
(8, 'Burmese', 'Burmese', 'LNG', 0),
(9, 'Chinese (Cantonese)', 'Chinese', 'LNG', 0),
(10, 'Chinese (Other)', 'Chinese', 'LNG', 0),
(11, 'Chinese (Mandarin)', 'Chinese', 'LNG', 0),
(12, 'Chinese (Shanghai)', 'Chinese', 'LNG', 0),
(13, 'Czech', 'Czech', 'LNG', 0),
(14, 'Danish', 'Danish', 'LNG', 0),
(15, 'Dutch', 'Dutch', 'LNG', 0),
(16, 'English', 'English', 'LNG', 0),
(17, 'Farsi (Persian)', 'Farsi', 'LNG', 0),
(18, 'Flemish', 'Flemish', 'LNG', 0),
(19, 'French', 'French', 'LNG', 0),
(20, 'Finish', 'Finish', 'LNG', 0),
(21, 'German', 'German', 'LNG', 0),
(22, 'Greek', 'Greek', 'LNG', 0),
(23, 'Hebrew', 'Hebrew', 'LNG', 0),
(24, 'Hindi', 'Hindi', 'LNG', 0),
(25, 'Hungarian', 'Hungarian', 'LNG', 0),
(26, 'Indian (Kannada)', 'Indian', 'LNG', 0),
(27, 'Indian (Hindi)', 'Indian', 'LNG', 0),
(28, 'Indian (Konkani)', 'Indian', 'LNG', 0),
(29, 'Italian', 'Italian', 'LNG', 0),
(30, 'Japanese', 'Japanese', 'LNG', 0),
(31, 'Kiswahili', 'Kiswahili', 'LNG', 0),
(32, 'Korean', 'Korean', 'LNG', 0),
(33, 'Latvian', 'Latvian', 'LNG', 0),
(34, 'Lithuanian', 'Lithuanian', 'LNG', 0),
(35, 'Laotian', 'Laotian', 'LNG', 0),
(36, 'Latin', 'Latin', 'LNG', 0),
(37, 'Malay', 'Malay', 'LNG', 0),
(38, 'Maya', 'Maya', 'LNG', 0),
(39, 'Nahuatl', 'Nahuatl', 'LNG', 0),
(40, 'Norwegian', 'Norwegian', 'LNG', 0),
(41, 'Polish', 'Polish', 'LNG', 0),
(42, 'Portuguese', 'Portuguese', 'LNG', 0),
(43, 'Rumanian', 'Rumanian', 'LNG', 0),
(44, 'Russian', 'Russian', 'LNG', 0),
(45, 'Swahili', 'Swahili', 'LNG', 0),
(46, 'Spanish', 'Spanish', 'LNG', 0),
(47, 'Serbo-Croatian', 'Srbo-Croat', 'LNG', 0),
(48, 'Swedish', 'Swedish', 'LNG', 0),
(49, 'Tagalog (Philippines)', 'Tagalog', 'LNG', 0),
(50, 'Telugu', 'Telugu', 'LNG', 0),
(51, 'Thai', 'Thai', 'LNG', 0),
(52, 'Tamil (India)', 'Tamil', 'LNG', 0),
(53, 'Tamil (Ceylon)', 'Tamil', 'LNG', 0),
(54, 'Turkish', 'Turkish', 'LNG', 0),
(55, 'Twi (Ghana)', 'Twi', 'LNG', 0),
(56, 'Ukrainian', 'Ukrainian', 'LNG', 0),
(57, 'Urdu (Pakistan)', 'Urdu', 'LNG', 0),
(58, 'Vietnamese', 'Vietnamese', 'LNG', 0),
(59, 'Welsh', 'Welsh', 'LNG', 0),
(60, 'Zapoteco', 'Zapoteco', 'LNG', 0),
(61, 'Bulgaro', 'Bulgaro', 'LNG', 0),
(62, 'Armenio', 'Armenio', 'LNG', 0),
(63, 'Punjabi', 'Punjabi', 'LNG', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_mun` varchar(255) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_mun`, `estado_id`) VALUES
(1, 'Aguascalientes', 1),
(2, 'Asientos', 1),
(3, 'Calvillo', 1),
(4, 'Cosío', 1),
(5, 'Jesús María', 1),
(6, 'Pabellón de Arteaga', 1),
(7, 'Rincón de Romos', 1),
(8, 'San José de Gracia', 1),
(9, 'Tepezalá', 1),
(10, 'El Llano', 1),
(11, 'San Francisco de los Romo', 1),
(12, 'Ensenada', 2),
(13, 'Mexicali', 2),
(14, 'Tecate', 2),
(15, 'Tijuana', 2),
(16, 'Playas de Rosarito', 2),
(17, 'Comondú', 3),
(18, 'Mulegé', 3),
(19, 'La Paz', 3),
(20, 'Los Cabos', 3),
(21, 'Loreto', 3),
(22, 'Calkiní', 4),
(23, 'Campeche', 4),
(24, 'Carmen', 4),
(25, 'Champotón', 4),
(26, 'Hecelchakán', 4),
(27, 'Hopelchén', 4),
(28, 'Palizada', 4),
(29, 'Tenabo', 4),
(30, 'Escárcega', 4),
(31, 'Calakmul', 4),
(32, 'Candelaria', 4),
(33, 'Abasolo', 5),
(34, 'Acuña', 5),
(35, 'Allende', 5),
(36, 'Arteaga', 5),
(37, 'Candela', 5),
(38, 'Castaños', 5),
(39, 'Cuatro Ciénegas', 5),
(40, 'Escobedo', 5),
(41, 'Francisco I. Madero', 5),
(42, 'Frontera', 5),
(43, 'General Cepeda', 5),
(44, 'Guerrero', 5),
(45, 'Hidalgo', 5),
(46, 'Jiménez', 5),
(47, 'Juárez', 5),
(48, 'Lamadrid', 5),
(49, 'Matamoros', 5),
(50, 'Monclova', 5),
(51, 'Morelos', 5),
(52, 'Múzquiz', 5),
(53, 'Nadadores', 5),
(54, 'Nava', 5),
(55, 'Ocampo', 5),
(56, 'Parras', 5),
(57, 'Piedras Negras', 5),
(58, 'Progreso', 5),
(59, 'Ramos Arizpe', 5),
(60, 'Sabinas', 5),
(61, 'Sacramento', 5),
(62, 'Saltillo', 5),
(63, 'San Buenaventura', 5),
(64, 'San Juan de Sabinas', 5),
(65, 'San Pedro', 5),
(66, 'Sierra Mojada', 5),
(67, 'Torreón', 5),
(68, 'Viesca', 5),
(69, 'Villa Unión', 5),
(70, 'Zaragoza', 5),
(71, 'Armería', 6),
(72, 'Colima', 6),
(73, 'Comala', 6),
(74, 'Coquimatlán', 6),
(75, 'Cuauhtémoc', 6),
(76, 'Ixtlahuacán', 6),
(77, 'Manzanillo', 6),
(78, 'Minatitlán', 6),
(79, 'Tecomán', 6),
(80, 'Villa de Álvarez', 6),
(81, 'Acacoyagua', 7),
(82, 'Acala', 7),
(83, 'Acapetahua', 7),
(84, 'Altamirano', 7),
(85, 'Amatán', 7),
(86, 'Amatenango de la Frontera', 7),
(87, 'Amatenango del Valle', 7),
(88, 'Angel Albino Corzo', 7),
(89, 'Arriaga', 7),
(90, 'Bejucal de Ocampo', 7),
(91, 'Bella Vista', 7),
(92, 'Berriozábal', 7),
(93, 'Bochil', 7),
(94, 'El Bosque', 7),
(95, 'Cacahoatán', 7),
(96, 'Catazajá', 7),
(97, 'Cintalapa', 7),
(98, 'Coapilla', 7),
(99, 'Comitán de Domínguez', 7),
(100, 'La Concordia', 7),
(101, 'Copainalá', 7),
(102, 'Chalchihuitán', 7),
(103, 'Chamula', 7),
(104, 'Chanal', 7),
(105, 'Chapultenango', 7),
(106, 'Chenalhó', 7),
(107, 'Chiapa de Corzo', 7),
(108, 'Chiapilla', 7),
(109, 'Chicoasén', 7),
(110, 'Chicomuselo', 7),
(111, 'Chilón', 7),
(112, 'Escuintla', 7),
(113, 'Francisco León', 7),
(114, 'Frontera Comalapa', 7),
(115, 'Frontera Hidalgo', 7),
(116, 'La Grandeza', 7),
(117, 'Huehuetán', 7),
(118, 'Huixtán', 7),
(119, 'Huitiupán', 7),
(120, 'Huixtla', 7),
(121, 'La Independencia', 7),
(122, 'Ixhuatán', 7),
(123, 'Ixtacomitán', 7),
(124, 'Ixtapa', 7),
(125, 'Ixtapangajoya', 7),
(126, 'Jiquipilas', 7),
(127, 'Jitotol', 7),
(128, 'Juárez', 7),
(129, 'Larráinzar', 7),
(130, 'La Libertad', 7),
(131, 'Mapastepec', 7),
(132, 'Las Margaritas', 7),
(133, 'Mazapa de Madero', 7),
(134, 'Mazatán', 7),
(135, 'Metapa', 7),
(136, 'Mitontic', 7),
(137, 'Motozintla', 7),
(138, 'Nicolás Ruíz', 7),
(139, 'Ocosingo', 7),
(140, 'Ocotepec', 7),
(141, 'Ocozocoautla de Espinosa', 7),
(142, 'Ostuacán', 7),
(143, 'Osumacinta', 7),
(144, 'Oxchuc', 7),
(145, 'Palenque', 7),
(146, 'Pantelhó', 7),
(147, 'Pantepec', 7),
(148, 'Pichucalco', 7),
(149, 'Pijijiapan', 7),
(150, 'El Porvenir', 7),
(151, 'Villa Comaltitlán', 7),
(152, 'Pueblo Nuevo Solistahuacán', 7),
(153, 'Rayón', 7),
(154, 'Reforma', 7),
(155, 'Las Rosas', 7),
(156, 'Sabanilla', 7),
(157, 'Salto de Agua', 7),
(158, 'San Cristóbal de las Casas', 7),
(159, 'San Fernando', 7),
(160, 'Siltepec', 7),
(161, 'Simojovel', 7),
(162, 'Sitalá', 7),
(163, 'Socoltenango', 7),
(164, 'Solosuchiapa', 7),
(165, 'Soyaló', 7),
(166, 'Suchiapa', 7),
(167, 'Suchiate', 7),
(168, 'Sunuapa', 7),
(169, 'Tapachula', 7),
(170, 'Tapalapa', 7),
(171, 'Tapilula', 7),
(172, 'Tecpatán', 7),
(173, 'Tenejapa', 7),
(174, 'Teopisca', 7),
(175, 'Tila', 7),
(176, 'Tonalá', 7),
(177, 'Totolapa', 7),
(178, 'La Trinitaria', 7),
(179, 'Tumbalá', 7),
(180, 'Tuxtla Gutiérrez', 7),
(181, 'Tuxtla Chico', 7),
(182, 'Tuzantán', 7),
(183, 'Tzimol', 7),
(184, 'Unión Juárez', 7),
(185, 'Venustiano Carranza', 7),
(186, 'Villa Corzo', 7),
(187, 'Villaflores', 7),
(188, 'Yajalón', 7),
(189, 'San Lucas', 7),
(190, 'Zinacantán', 7),
(191, 'San Juan Cancuc', 7),
(192, 'Aldama', 7),
(193, 'Benemérito de las Américas', 7),
(194, 'Maravilla Tenejapa', 7),
(195, 'Marqués de Comillas', 7),
(196, 'Montecristo de Guerrero', 7),
(197, 'San Andrés Duraznal', 7),
(198, 'Santiago el Pinar', 7),
(199, 'Ahumada', 8),
(200, 'Aldama', 8),
(201, 'Allende', 8),
(202, 'Aquiles Serdán', 8),
(203, 'Ascensión', 8),
(204, 'Bachíniva', 8),
(205, 'Balleza', 8),
(206, 'Batopilas', 8),
(207, 'Bocoyna', 8),
(208, 'Buenaventura', 8),
(209, 'Camargo', 8),
(210, 'Carichí', 8),
(211, 'Casas Grandes', 8),
(212, 'Coronado', 8),
(213, 'Coyame del Sotol', 8),
(214, 'La Cruz', 8),
(215, 'Cuauhtémoc', 8),
(216, 'Cusihuiriachi', 8),
(217, 'Chihuahua', 8),
(218, 'Chínipas', 8),
(219, 'Delicias', 8),
(220, 'Dr. Belisario Domínguez', 8),
(221, 'Galeana', 8),
(222, 'Santa Isabel', 8),
(223, 'Gómez Farías', 8),
(224, 'Gran Morelos', 8),
(225, 'Guachochi', 8),
(226, 'Guadalupe', 8),
(227, 'Guadalupe y Calvo', 8),
(228, 'Guazapares', 8),
(229, 'Guerrero', 8),
(230, 'Hidalgo del Parral', 8),
(231, 'Huejotitán', 8),
(232, 'Ignacio Zaragoza', 8),
(233, 'Janos', 8),
(234, 'Jiménez', 8),
(235, 'Juárez', 8),
(236, 'Julimes', 8),
(237, 'López', 8),
(238, 'Madera', 8),
(239, 'Maguarichi', 8),
(240, 'Manuel Benavides', 8),
(241, 'Matachí', 8),
(242, 'Matamoros', 8),
(243, 'Meoqui', 8),
(244, 'Morelos', 8),
(245, 'Moris', 8),
(246, 'Namiquipa', 8),
(247, 'Nonoava', 8),
(248, 'Nuevo Casas Grandes', 8),
(249, 'Ocampo', 8),
(250, 'Ojinaga', 8),
(251, 'Praxedis G. Guerrero', 8),
(252, 'Riva Palacio', 8),
(253, 'Rosales', 8),
(254, 'Rosario', 8),
(255, 'San Francisco de Borja', 8),
(256, 'San Francisco de Conchos', 8),
(257, 'San Francisco del Oro', 8),
(258, 'Santa Bárbara', 8),
(259, 'Satevó', 8),
(260, 'Saucillo', 8),
(261, 'Temósachic', 8),
(262, 'El Tule', 8),
(263, 'Urique', 8),
(264, 'Uruachi', 8),
(265, 'Valle de Zaragoza', 8),
(266, 'Azcapotzalco', 9),
(267, 'Coyoacán', 9),
(268, 'Cuajimalpa de Morelos', 9),
(269, 'Gustavo A. Madero', 9),
(270, 'Iztacalco', 9),
(271, 'Iztapalapa', 9),
(272, 'La Magdalena Contreras', 9),
(273, 'Milpa Alta', 9),
(274, 'Álvaro Obregón', 9),
(275, 'Tláhuac', 9),
(276, 'Tlalpan', 9),
(277, 'Xochimilco', 9),
(278, 'Benito Juárez', 9),
(279, 'Cuauhtémoc', 9),
(280, 'Miguel Hidalgo', 9),
(281, 'Venustiano Carranza', 9),
(282, 'Canatlán', 10),
(283, 'Canelas', 10),
(284, 'Coneto de Comonfort', 10),
(285, 'Cuencamé', 10),
(286, 'Durango', 10),
(287, 'General Simón Bolívar', 10),
(288, 'Gómez Palacio', 10),
(289, 'Guadalupe Victoria', 10),
(290, 'Guanaceví', 10),
(291, 'Hidalgo', 10),
(292, 'Indé', 10),
(293, 'Mapimí', 10),
(294, 'Mezquital', 10),
(295, 'Nazas', 10),
(296, 'Nombre de Dios', 10),
(297, 'Ocampo', 10),
(298, 'El Oro', 10),
(299, 'Otáez', 10),
(300, 'Pánuco de Coronado', 10),
(301, 'Peñón Blanco', 10),
(302, 'Poanas', 10),
(303, 'Pueblo Nuevo', 10),
(304, 'Rodeo', 10),
(305, 'San Bernardo', 10),
(306, 'San Dimas', 10),
(307, 'San Juan de Guadalupe', 10),
(308, 'San Juan del Río', 10),
(309, 'San Luis del Cordero', 10),
(310, 'San Pedro del Gallo', 10),
(311, 'Santa Clara', 10),
(312, 'Santiago Papasquiaro', 10),
(313, 'Súchil', 10),
(314, 'Tamazula', 10),
(315, 'Tepehuanes', 10),
(316, 'Tlahualilo', 10),
(317, 'Topia', 10),
(318, 'Vicente Guerrero', 10),
(319, 'Nuevo Ideal', 10),
(320, 'Abasolo', 11),
(321, 'Acámbaro', 11),
(322, 'San Miguel de Allende', 11),
(324, 'Apaseo el Alto', 11),
(325, 'Apaseo el Grande', 11),
(326, 'Atarjea', 11),
(327, 'Celaya', 11),
(328, 'Manuel Doblado', 11),
(329, 'Comonfort', 11),
(330, 'Coroneo', 11),
(331, 'Cortazar', 11),
(332, 'Cuerámaro', 11),
(333, 'Doctor Mora', 11),
(334, 'Dolores Hidalgo Cuna de la Independencia Nacional', 11),
(335, 'Guanajuato', 11),
(336, 'Huanímaro', 11),
(337, 'Irapuato', 11),
(338, 'Jaral del Progreso', 11),
(339, 'Jerécuaro', 11),
(340, 'León', 11),
(341, 'Moroleón', 11),
(342, 'Ocampo', 11),
(343, 'Pénjamo', 11),
(344, 'Pueblo Nuevo', 11),
(345, 'Purísima del Rincón', 11),
(346, 'Romita', 11),
(347, 'Salamanca', 11),
(348, 'Salvatierra', 11),
(349, 'San Diego de la Unión', 11),
(350, 'San Felipe', 11),
(351, 'San Francisco del Rincón', 11),
(352, 'San José Iturbide', 11),
(353, 'San Luis de la Paz', 11),
(354, 'Santa Catarina', 11),
(355, 'Santa Cruz de Juventino Rosas', 11),
(356, 'Santiago Maravatío', 11),
(357, 'Silao de la Victoria', 11),
(358, 'Tarandacuao', 11),
(359, 'Tarimoro', 11),
(360, 'Tierra Blanca', 11),
(361, 'Uriangato', 11),
(362, 'Valle de Santiago', 11),
(363, 'Victoria', 11),
(364, 'Villagrán', 11),
(365, 'Xichú', 11),
(366, 'Yuriria', 11),
(367, 'Acapulco de Juárez', 12),
(368, 'Ahuacuotzingo', 12),
(369, 'Ajuchitlán del Progreso', 12),
(370, 'Alcozauca de Guerrero', 12),
(371, 'Alpoyeca', 12),
(372, 'Apaxtla', 12),
(373, 'Arcelia', 12),
(374, 'Atenango del Río', 12),
(375, 'Atlamajalcingo del Monte', 12),
(376, 'Atlixtac', 12),
(377, 'Atoyac de Álvarez', 12),
(378, 'Ayutla de los Libres', 12),
(379, 'Azoyú', 12),
(380, 'Benito Juárez', 12),
(381, 'Buenavista de Cuéllar', 12),
(382, 'Coahuayutla de José María Izazaga', 12),
(383, 'Cocula', 12),
(384, 'Copala', 12),
(385, 'Copalillo', 12),
(386, 'Copanatoyac', 12),
(387, 'Coyuca de Benítez', 12),
(388, 'Coyuca de Catalán', 12),
(389, 'Cuajinicuilapa', 12),
(390, 'Cualác', 12),
(391, 'Cuautepec', 12),
(392, 'Cuetzala del Progreso', 12),
(393, 'Cutzamala de Pinzón', 12),
(394, 'Chilapa de Álvarez', 12),
(395, 'Chilpancingo de los Bravo', 12),
(396, 'Florencio Villarreal', 12),
(397, 'General Canuto A. Neri', 12),
(398, 'General Heliodoro Castillo', 12),
(399, 'Huamuxtitlán', 12),
(400, 'Huitzuco de los Figueroa', 12),
(401, 'Iguala de la Independencia', 12),
(402, 'Igualapa', 12),
(403, 'Ixcateopan de Cuauhtémoc', 12),
(404, 'Zihuatanejo de Azueta', 12),
(405, 'Juan R. Escudero', 12),
(406, 'Leonardo Bravo', 12),
(407, 'Malinaltepec', 12),
(408, 'Mártir de Cuilapan', 12),
(409, 'Metlatónoc', 12),
(410, 'Mochitlán', 12),
(411, 'Olinalá', 12),
(412, 'Ometepec', 12),
(413, 'Pedro Ascencio Alquisiras', 12),
(414, 'Petatlán', 12),
(415, 'Pilcaya', 12),
(416, 'Pungarabato', 12),
(417, 'Quechultenango', 12),
(418, 'San Luis Acatlán', 12),
(419, 'San Marcos', 12),
(420, 'San Miguel Totolapan', 12),
(421, 'Taxco de Alarcón', 12),
(422, 'Tecoanapa', 12),
(424, 'Técpan de Galeana', 12),
(425, 'Teloloapan', 12),
(426, 'Tepecoacuilco de Trujano', 12),
(427, 'Tetipac', 12),
(428, 'Tixtla de Guerrero', 12),
(429, 'Tlacoachistlahuaca', 12),
(430, 'Tlacoapa', 12),
(431, 'Tlalchapa', 12),
(432, 'Tlalixtaquilla de Maldonado', 12),
(433, 'Tlapa de Comonfort', 12),
(434, 'Tlapehuala', 12),
(435, 'La Unión de Isidoro Montes de Oca', 12),
(436, 'Xalpatláhuac', 12),
(437, 'Xochihuehuetlán', 12),
(438, 'Xochistlahuaca', 12),
(439, 'Zapotitlán Tablas', 12),
(440, 'Zirándaro', 12),
(441, 'Zitlala', 12),
(442, 'Eduardo Neri', 12),
(443, 'Acatepec', 12),
(444, 'Marquelia', 12),
(445, 'Cochoapa el Grande', 12),
(446, 'José Joaquín de Herrera', 12),
(447, 'Juchitán', 12),
(448, 'Iliatenco', 12),
(449, 'Acatlán', 13),
(450, 'Acaxochitlán', 13),
(451, 'Actopan', 13),
(452, 'Agua Blanca de Iturbide', 13),
(453, 'Ajacuba', 13),
(454, 'Alfajayucan', 13),
(455, 'Almoloya', 13),
(456, 'Apan', 13),
(457, 'El Arenal', 13),
(458, 'Atitalaquia', 13),
(459, 'Atlapexco', 13),
(460, 'Atotonilco el Grande', 13),
(461, 'Atotonilco de Tula', 13),
(462, 'Calnali', 13),
(463, 'Cardonal', 13),
(464, 'Cuautepec de Hinojosa', 13),
(465, 'Chapantongo', 13),
(466, 'Chapulhuacán', 13),
(467, 'Chilcuautla', 13),
(468, 'Eloxochitlán', 13),
(469, 'Emiliano Zapata', 13),
(470, 'Epazoyucan', 13),
(471, 'Francisco I. Madero', 13),
(472, 'Huasca de Ocampo', 13),
(473, 'Huautla', 13),
(474, 'Huazalingo', 13),
(475, 'Huehuetla', 13),
(476, 'Huejutla de Reyes', 13),
(477, 'Huichapan', 13),
(478, 'Ixmiquilpan', 13),
(479, 'Jacala de Ledezma', 13),
(480, 'Jaltocán', 13),
(481, 'Juárez Hidalgo', 13),
(482, 'Lolotla', 13),
(483, 'Metepec', 13),
(484, 'San Agustín Metzquititlán', 13),
(485, 'Metztitlán', 13),
(486, 'Mineral del Chico', 13),
(487, 'Mineral del Monte', 13),
(488, 'La Misión', 13),
(489, 'Mixquiahuala de Juárez', 13),
(490, 'Molango de Escamilla', 13),
(491, 'Nicolás Flores', 13),
(492, 'Nopala de Villagrán', 13),
(493, 'Omitlán de Juárez', 13),
(494, 'San Felipe Orizatlán', 13),
(495, 'Pacula', 13),
(496, 'Pachuca de Soto', 13),
(497, 'Pisaflores', 13),
(498, 'Progreso de Obregón', 13),
(499, 'Mineral de la Reforma', 13),
(500, 'San Agustín Tlaxiaca', 13),
(501, 'San Bartolo Tutotepec', 13),
(502, 'San Salvador', 13),
(503, 'Santiago de Anaya', 13),
(504, 'Santiago Tulantepec de Lugo Guerrero', 13),
(505, 'Singuilucan', 13),
(506, 'Tasquillo', 13),
(507, 'Tecozautla', 13),
(508, 'Tenango de Doria', 13),
(509, 'Tepeapulco', 13),
(510, 'Tepehuacán de Guerrero', 13),
(511, 'Tepeji del Río de Ocampo', 13),
(512, 'Tepetitlán', 13),
(513, 'Tetepango', 13),
(514, 'Villa de Tezontepec', 13),
(515, 'Tezontepec de Aldama', 13),
(516, 'Tianguistengo', 13),
(517, 'Tizayuca', 13),
(518, 'Tlahuelilpan', 13),
(519, 'Tlahuiltepa', 13),
(520, 'Tlanalapa', 13),
(521, 'Tlanchinol', 13),
(522, 'Tlaxcoapan', 13),
(523, 'Tolcayuca', 13),
(524, 'Tula de Allende', 13),
(525, 'Tulancingo de Bravo', 13),
(526, 'Xochiatipan', 13),
(527, 'Xochicoatlán', 13),
(528, 'Yahualica', 13),
(529, 'Zacualtipán de Ángeles', 13),
(530, 'Zapotlán de Juárez', 13),
(531, 'Zempoala', 13),
(532, 'Zimapán', 13),
(533, 'Acatic', 14),
(534, 'Acatlán de Juárez', 14),
(535, 'Ahualulco de Mercado', 14),
(536, 'Amacueca', 14),
(537, 'Amatitán', 14),
(538, 'Ameca', 14),
(539, 'San Juanito de Escobedo', 14),
(540, 'Arandas', 14),
(541, 'El Arenal', 14),
(542, 'Atemajac de Brizuela', 14),
(543, 'Atengo', 14),
(544, 'Atenguillo', 14),
(545, 'Atotonilco el Alto', 14),
(546, 'Atoyac', 14),
(547, 'Autlán de Navarro', 14),
(548, 'Ayotlán', 14),
(549, 'Ayutla', 14),
(550, 'La Barca', 14),
(551, 'Bolaños', 14),
(552, 'Cabo Corrientes', 14),
(553, 'Casimiro Castillo', 14),
(554, 'Cihuatlán', 14),
(555, 'Zapotlán el Grande', 14),
(556, 'Cocula', 14),
(557, 'Colotlán', 14),
(558, 'Concepción de Buenos Aires', 14),
(559, 'Cuautitlán de García Barragán', 14),
(560, 'Cuautla', 14),
(561, 'Cuquío', 14),
(562, 'Chapala', 14),
(563, 'Chimaltitán', 14),
(564, 'Chiquilistlán', 14),
(565, 'Degollado', 14),
(566, 'Ejutla', 14),
(567, 'Encarnación de Díaz', 14),
(568, 'Etzatlán', 14),
(569, 'El Grullo', 14),
(570, 'Guachinango', 14),
(571, 'Guadalajara', 14),
(572, 'Hostotipaquillo', 14),
(573, 'Huejúcar', 14),
(574, 'Huejuquilla el Alto', 14),
(575, 'La Huerta', 14),
(576, 'Ixtlahuacán de los Membrillos', 14),
(577, 'Ixtlahuacán del Río', 14),
(578, 'Jalostotitlán', 14),
(579, 'Jamay', 14),
(580, 'Jesús María', 14),
(581, 'Jilotlán de los Dolores', 14),
(582, 'Jocotepec', 14),
(583, 'Juanacatlán', 14),
(584, 'Juchitlán', 14),
(585, 'Lagos de Moreno', 14),
(586, 'El Limón', 14),
(587, 'Magdalena', 14),
(588, 'Santa María del Oro', 14),
(589, 'La Manzanilla de la Paz', 14),
(590, 'Mascota', 14),
(591, 'Mazamitla', 14),
(592, 'Mexticacán', 14),
(593, 'Mezquitic', 14),
(594, 'Mixtlán', 14),
(595, 'Ocotlán', 14),
(596, 'Ojuelos de Jalisco', 14),
(597, 'Pihuamo', 14),
(598, 'Poncitlán', 14),
(599, 'Puerto Vallarta', 14),
(600, 'Villa Purificación', 14),
(601, 'Quitupan', 14),
(602, 'El Salto', 14),
(603, 'San Cristóbal de la Barranca', 14),
(604, 'San Diego de Alejandría', 14),
(605, 'San Juan de los Lagos', 14),
(606, 'San Julián', 14),
(607, 'San Marcos', 14),
(608, 'San Martín de Bolaños', 14),
(609, 'San Martín Hidalgo', 14),
(610, 'San Miguel el Alto', 14),
(611, 'Gómez Farías', 14),
(612, 'San Sebastián del Oeste', 14),
(613, 'Santa María de los Ángeles', 14),
(614, 'Sayula', 14),
(615, 'Tala', 14),
(616, 'Talpa de Allende', 14),
(617, 'Tamazula de Gordiano', 14),
(618, 'Tapalpa', 14),
(619, 'Tecalitlán', 14),
(620, 'Tecolotlán', 14),
(621, 'Techaluta de Montenegro', 14),
(622, 'Tenamaxtlán', 14),
(623, 'Teocaltiche', 14),
(624, 'Teocuitatlán de Corona', 14),
(625, 'Tepatitlán de Morelos', 14),
(626, 'Tequila', 14),
(627, 'Teuchitlán', 14),
(628, 'Tizapán el Alto', 14),
(629, 'Tlajomulco de Zúñiga', 14),
(630, 'San Pedro Tlaquepaque', 14),
(631, 'Tolimán', 14),
(632, 'Tomatlán', 14),
(633, 'Tonalá', 14),
(634, 'Tonaya', 14),
(635, 'Tonila', 14),
(636, 'Totatiche', 14),
(637, 'Tototlán', 14),
(638, 'Tuxcacuesco', 14),
(639, 'Tuxcueca', 14),
(640, 'Tuxpan', 14),
(641, 'Unión de San Antonio', 14),
(642, 'Unión de Tula', 14),
(643, 'Valle de Guadalupe', 14),
(647, 'Villa Corona', 14),
(648, 'Villa Guerrero', 14),
(649, 'Villa Hidalgo', 14),
(650, 'Cañadas de Obregón', 14),
(651, 'Yahualica de González Gallo', 14),
(652, 'Zacoalco de Torres', 14),
(653, 'Zapopan', 14),
(654, 'Zapotiltic', 14),
(655, 'Zapotitlán de Vadillo', 14),
(656, 'Zapotlán del Rey', 14),
(657, 'Zapotlanejo', 14),
(658, 'San Ignacio Cerro Gordo', 14),
(659, 'Acolman', 15),
(660, 'Aculco', 15),
(661, 'Almoloya de Alquisiras', 15),
(662, 'Almoloya de Juárez', 15),
(663, 'Almoloya del Río', 15),
(664, 'Amanalco', 15),
(665, 'Amatepec', 15),
(666, 'Amecameca', 15),
(667, 'Apaxco', 15),
(668, 'Atenco', 15),
(669, 'Atizapán', 15),
(670, 'Atizapán de Zaragoza', 15),
(671, 'Atlacomulco', 15),
(673, 'Atlautla', 15),
(674, 'Axapusco', 15),
(675, 'Ayapango', 15),
(676, 'Calimaya', 15),
(677, 'Capulhuac', 15),
(678, 'Coacalco de Berriozábal', 15),
(679, 'Coatepec Harinas', 15),
(680, 'Cocotitlán', 15),
(681, 'Coyotepec', 15),
(682, 'Cuautitlán', 15),
(683, 'Chalco', 15),
(684, 'Chapa de Mota', 15),
(685, 'Chapultepec', 15),
(686, 'Chiautla', 15),
(687, 'Chicoloapan', 15),
(688, 'Chiconcuac', 15),
(689, 'Chimalhuacán', 15),
(690, 'Donato Guerra', 15),
(691, 'Ecatepec de Morelos', 15),
(692, 'Ecatzingo', 15),
(693, 'Huehuetoca', 15),
(694, 'Hueypoxtla', 15),
(695, 'Huixquilucan', 15),
(696, 'Isidro Fabela', 15),
(697, 'Ixtapaluca', 15),
(698, 'Ixtapan de la Sal', 15),
(699, 'Ixtapan del Oro', 15),
(700, 'Ixtlahuaca', 15),
(701, 'Xalatlaco', 15),
(702, 'Jaltenco', 15),
(703, 'Jilotepec', 15),
(704, 'Jilotzingo', 15),
(705, 'Jiquipilco', 15),
(706, 'Jocotitlán', 15),
(707, 'Joquicingo', 15),
(708, 'Juchitepec', 15),
(709, 'Lerma', 15),
(710, 'Malinalco', 15),
(711, 'Melchor Ocampo', 15),
(712, 'Metepec', 15),
(713, 'Mexicaltzingo', 15),
(714, 'Morelos', 15),
(715, 'Naucalpan de Juárez', 15),
(716, 'Nezahualcóyotl', 15),
(717, 'Nextlalpan', 15),
(718, 'Nicolás Romero', 15),
(719, 'Nopaltepec', 15),
(720, 'Ocoyoacac', 15),
(721, 'Ocuilan', 15),
(722, 'El Oro', 15),
(723, 'Otumba', 15),
(724, 'Otzoloapan', 15),
(725, 'Otzolotepec', 15),
(726, 'Ozumba', 15),
(727, 'Papalotla', 15),
(728, 'La Paz', 15),
(729, 'Polotitlán', 15),
(730, 'Rayón', 15),
(731, 'San Antonio la Isla', 15),
(732, 'San Felipe del Progreso', 15),
(733, 'San Martín de las Pirámides', 15),
(734, 'San Mateo Atenco', 15),
(735, 'San Simón de Guerrero', 15),
(736, 'Santo Tomás', 15),
(737, 'Soyaniquilpan de Juárez', 15),
(738, 'Sultepec', 15),
(739, 'Tecámac', 15),
(740, 'Tejupilco', 15),
(741, 'Temamatla', 15),
(742, 'Temascalapa', 15),
(743, 'Temascalcingo', 15),
(744, 'Temascaltepec', 15),
(745, 'Temoaya', 15),
(746, 'Tenancingo', 15),
(747, 'Tenango del Aire', 15),
(748, 'Tenango del Valle', 15),
(749, 'Teotihuacán', 15),
(750, 'Tepetlaoxtoc', 15),
(751, 'Tepetlixpa', 15),
(752, 'Tepotzotlán', 15),
(753, 'Tequixquiac', 15),
(754, 'Texcaltitlán', 15),
(755, 'Texcalyacac', 15),
(756, 'Texcoco', 15),
(757, 'Tezoyuca', 15),
(758, 'Tianguistenco', 15),
(759, 'Timilpan', 15),
(760, 'Tlalmanalco', 15),
(761, 'Tlalnepantla de Baz', 15),
(762, 'Tlatlaya', 15),
(763, 'Toluca', 15),
(764, 'Tonatico', 15),
(765, 'Tultepec', 15),
(766, 'Tultitlán', 15),
(767, 'Valle de Bravo', 15),
(768, 'Villa de Allende', 15),
(769, 'Villa del Carbón', 15),
(770, 'Villa Guerrero', 15),
(771, 'Villa Victoria', 15),
(772, 'Xonacatlán', 15),
(773, 'Zacazonapan', 15),
(774, 'Zacualpan', 15),
(775, 'Zinacantepec', 15),
(776, 'Zumpahuacán', 15),
(777, 'Zumpango', 15),
(778, 'Cuautitlán Izcalli', 15),
(779, 'Valle de Chalco Solidaridad', 15),
(780, 'Luvianos', 15),
(781, 'San José del Rincón', 15),
(782, 'Tonanitla', 15),
(783, 'Acuitzio', 16),
(784, 'Aguililla', 16),
(785, 'Álvaro Obregón', 16),
(786, 'Angamacutiro', 16),
(787, 'Angangueo', 16),
(788, 'Apatzingán', 16),
(789, 'Aporo', 16),
(790, 'Aquila', 16),
(791, 'Ario', 16),
(792, 'Arteaga', 16),
(793, 'Briseñas', 16),
(794, 'Buenavista', 16),
(795, 'Carácuaro', 16),
(796, 'Coahuayana', 16),
(797, 'Coalcomán de Vázquez Pallares', 16),
(798, 'Coeneo', 16),
(799, 'Contepec', 16),
(800, 'Copándaro', 16),
(801, 'Cotija', 16),
(802, 'Cuitzeo', 16),
(803, 'Charapan', 16),
(804, 'Charo', 16),
(805, 'Chavinda', 16),
(806, 'Cherán', 16),
(807, 'Chilchota', 16),
(808, 'Chinicuila', 16),
(809, 'Chucándiro', 16),
(810, 'Churintzio', 16),
(811, 'Churumuco', 16),
(812, 'Ecuandureo', 16),
(813, 'Epitacio Huerta', 16),
(814, 'Erongarícuaro', 16),
(815, 'Gabriel Zamora', 16),
(816, 'Hidalgo', 16),
(817, 'La Huacana', 16),
(818, 'Huandacareo', 16),
(819, 'Huaniqueo', 16),
(820, 'Huetamo', 16),
(821, 'Huiramba', 16),
(822, 'Indaparapeo', 16),
(823, 'Irimbo', 16),
(824, 'Ixtlán', 16),
(825, 'Jacona', 16),
(826, 'Jiménez', 16),
(827, 'Jiquilpan', 16),
(828, 'Juárez', 16),
(829, 'Jungapeo', 16),
(830, 'Lagunillas', 16),
(831, 'Madero', 16),
(832, 'Maravatío', 16),
(833, 'Marcos Castellanos', 16),
(834, 'Lázaro Cárdenas', 16),
(835, 'Morelia', 16),
(836, 'Morelos', 16),
(837, 'Múgica', 16),
(838, 'Nahuatzen', 16),
(839, 'Nocupétaro', 16),
(840, 'Nuevo Parangaricutiro', 16),
(841, 'Nuevo Urecho', 16),
(842, 'Numarán', 16),
(843, 'Ocampo', 16),
(844, 'Pajacuarán', 16),
(845, 'Panindícuaro', 16),
(846, 'Parácuaro', 16),
(847, 'Paracho', 16),
(848, 'Pátzcuaro', 16),
(849, 'Penjamillo', 16),
(850, 'Peribán', 16),
(851, 'La Piedad', 16),
(852, 'Purépero', 16),
(853, 'Puruándiro', 16),
(854, 'Queréndaro', 16),
(855, 'Quiroga', 16),
(856, 'Cojumatlán de Régules', 16),
(857, 'Los Reyes', 16),
(858, 'Sahuayo', 16),
(859, 'San Lucas', 16),
(860, 'Santa Ana Maya', 16),
(861, 'Salvador Escalante', 16),
(862, 'Senguio', 16),
(863, 'Susupuato', 16),
(864, 'Tacámbaro', 16),
(865, 'Tancítaro', 16),
(866, 'Tangamandapio', 16),
(867, 'Tangancícuaro', 16),
(868, 'Tanhuato', 16),
(869, 'Taretan', 16),
(870, 'Tarímbaro', 16),
(871, 'Tepalcatepec', 16),
(872, 'Tingambato', 16),
(873, 'Tingüindín', 16),
(874, 'Tiquicheo de Nicolás Romero', 16),
(875, 'Tlalpujahua', 16),
(876, 'Tlazazalca', 16),
(877, 'Tocumbo', 16),
(878, 'Tumbiscatío', 16),
(879, 'Turicato', 16),
(880, 'Tuxpan', 16),
(881, 'Tuzantla', 16),
(882, 'Tzintzuntzan', 16),
(883, 'Tzitzio', 16),
(884, 'Uruapan', 16),
(885, 'Venustiano Carranza', 16),
(886, 'Villamar', 16),
(887, 'Vista Hermosa', 16),
(888, 'Yurécuaro', 16),
(889, 'Zacapu', 16),
(890, 'Zamora', 16),
(891, 'Zináparo', 16),
(892, 'Zinapécuaro', 16),
(893, 'Ziracuaretiro', 16),
(894, 'Zitácuaro', 16),
(895, 'José Sixto Verduzco', 16),
(896, 'Amacuzac', 17),
(897, 'Atlatlahucan', 17),
(898, 'Axochiapan', 17),
(899, 'Ayala', 17),
(900, 'Coatlán del Río', 17),
(901, 'Cuautla', 17),
(902, 'Cuernavaca', 17),
(903, 'Emiliano Zapata', 17),
(904, 'Huitzilac', 17),
(905, 'Jantetelco', 17),
(906, 'Jiutepec', 17),
(907, 'Jojutla', 17),
(908, 'Jonacatepec', 17),
(909, 'Mazatepec', 17),
(910, 'Miacatlán', 17),
(911, 'Ocuituco', 17),
(912, 'Puente de Ixtla', 17),
(913, 'Temixco', 17),
(914, 'Tepalcingo', 17),
(915, 'Tepoztlán', 17),
(916, 'Tetecala', 17),
(917, 'Tetela del Volcán', 17),
(918, 'Tlalnepantla', 17),
(919, 'Tlaltizapán de Zapata', 17),
(920, 'Tlaquiltenango', 17),
(921, 'Tlayacapan', 17),
(922, 'Totolapan', 17),
(923, 'Xochitepec', 17),
(924, 'Yautepec', 17),
(925, 'Yecapixtla', 17),
(926, 'Zacatepec', 17),
(927, 'Zacualpan de Amilpas', 17),
(928, 'Temoac', 17),
(929, 'Acaponeta', 18),
(930, 'Ahuacatlán', 18),
(931, 'Amatlán de Cañas', 18),
(932, 'Compostela', 18),
(933, 'Huajicori', 18),
(934, 'Ixtlán del Río', 18),
(935, 'Jala', 18),
(936, 'Xalisco', 18),
(937, 'Del Nayar', 18),
(938, 'Rosamorada', 18),
(939, 'Ruíz', 18),
(940, 'San Blas', 18),
(941, 'San Pedro Lagunillas', 18),
(942, 'Santa María del Oro', 18),
(943, 'Santiago Ixcuintla', 18),
(944, 'Tecuala', 18),
(945, 'Tepic', 18),
(946, 'Tuxpan', 18),
(947, 'La Yesca', 18),
(948, 'Bahía de Banderas', 18),
(949, 'Abasolo', 19),
(950, 'Agualeguas', 19),
(951, 'Los Aldamas', 19),
(952, 'Allende', 19),
(953, 'Anáhuac', 19),
(954, 'Apodaca', 19),
(955, 'Aramberri', 19),
(956, 'Bustamante', 19),
(957, 'Cadereyta Jiménez', 19),
(958, 'El Carmen', 19),
(959, 'Cerralvo', 19),
(960, 'Ciénega de Flores', 19),
(961, 'China', 19),
(962, 'Doctor Arroyo', 19),
(963, 'Doctor Coss', 19),
(964, 'Doctor González', 19),
(965, 'Galeana', 19),
(966, 'García', 19),
(967, 'San Pedro Garza García', 19),
(968, 'General Bravo', 19),
(969, 'General Escobedo', 19),
(970, 'General Terán', 19),
(971, 'General Treviño', 19),
(972, 'General Zaragoza', 19),
(973, 'General Zuazua', 19),
(974, 'Guadalupe', 19),
(975, 'Los Herreras', 19),
(976, 'Higueras', 19),
(977, 'Hualahuises', 19),
(978, 'Iturbide', 19),
(979, 'Juárez', 19),
(980, 'Lampazos de Naranjo', 19),
(981, 'Linares', 19),
(982, 'Marín', 19),
(983, 'Melchor Ocampo', 19),
(984, 'Mier y Noriega', 19),
(985, 'Mina', 19),
(986, 'Montemorelos', 19),
(987, 'Monterrey', 19),
(988, 'Parás', 19),
(989, 'Pesquería', 19),
(990, 'Los Ramones', 19),
(991, 'Rayones', 19),
(992, 'Sabinas Hidalgo', 19),
(993, 'Salinas Victoria', 19),
(994, 'San Nicolás de los Garza', 19),
(995, 'Hidalgo', 19),
(996, 'Santa Catarina', 19),
(997, 'Santiago', 19),
(998, 'Vallecillo', 19),
(999, 'Villaldama', 19),
(1000, 'Abejones', 20),
(1001, 'Acatlán de Pérez Figueroa', 20),
(1002, 'Asunción Cacalotepec', 20),
(1003, 'Asunción Cuyotepeji', 20),
(1004, 'Asunción Ixtaltepec', 20),
(1005, 'Asunción Nochixtlán', 20),
(1006, 'Asunción Ocotlán', 20),
(1007, 'Asunción Tlacolulita', 20),
(1008, 'Ayotzintepec', 20),
(1009, 'El Barrio de la Soledad', 20),
(1010, 'Calihualá', 20),
(1011, 'Candelaria Loxicha', 20),
(1012, 'Ciénega de Zimatlán', 20),
(1013, 'Ciudad Ixtepec', 20),
(1014, 'Coatecas Altas', 20),
(1015, 'Coicoyán de las Flores', 20),
(1016, 'La Compañía', 20),
(1017, 'Concepción Buenavista', 20),
(1018, 'Concepción Pápalo', 20),
(1019, 'Constancia del Rosario', 20),
(1020, 'Cosolapa', 20),
(1021, 'Cosoltepec', 20),
(1022, 'Cuilápam de Guerrero', 20),
(1023, 'Cuyamecalco Villa de Zaragoza', 20),
(1024, 'Chahuites', 20),
(1025, 'Chalcatongo de Hidalgo', 20),
(1026, 'Chiquihuitlán de Benito Juárez', 20),
(1027, 'Heroica Ciudad de Ejutla de Crespo', 20),
(1028, 'Eloxochitlán de Flores Magón', 20),
(1029, 'El Espinal', 20),
(1030, 'Tamazulápam del Espíritu Santo', 20),
(1031, 'Fresnillo de Trujano', 20),
(1032, 'Guadalupe Etla', 20),
(1033, 'Guadalupe de Ramírez', 20),
(1034, 'Guelatao de Juárez', 20),
(1035, 'Guevea de Humboldt', 20),
(1036, 'Mesones Hidalgo', 20),
(1037, 'Villa Hidalgo', 20),
(1038, 'Heroica Ciudad de Huajuapan de León', 20),
(1039, 'Huautepec', 20),
(1040, 'Huautla de Jiménez', 20),
(1041, 'Ixtlán de Juárez', 20),
(1042, 'Heroica Ciudad de Juchitán de Zaragoza', 20),
(1043, 'Loma Bonita', 20),
(1044, 'Magdalena Apasco', 20),
(1045, 'Magdalena Jaltepec', 20),
(1046, 'Santa Magdalena Jicotlán', 20),
(1047, 'Magdalena Mixtepec', 20),
(1048, 'Magdalena Ocotlán', 20),
(1049, 'Magdalena Peñasco', 20),
(1050, 'Magdalena Teitipac', 20),
(1051, 'Magdalena Tequisistlán', 20),
(1052, 'Magdalena Tlacotepec', 20),
(1053, 'Magdalena Zahuatlán', 20),
(1054, 'Mariscala de Juárez', 20),
(1055, 'Mártires de Tacubaya', 20),
(1056, 'Matías Romero Avendaño', 20),
(1057, 'Mazatlán Villa de Flores', 20),
(1058, 'Miahuatlán de Porfirio Díaz', 20),
(1059, 'Mixistlán de la Reforma', 20),
(1060, 'Monjas', 20),
(1061, 'Natividad', 20),
(1062, 'Nazareno Etla', 20),
(1063, 'Nejapa de Madero', 20),
(1064, 'Ixpantepec Nieves', 20),
(1065, 'Santiago Niltepec', 20),
(1066, 'Oaxaca de Juárez', 20),
(1067, 'Ocotlán de Morelos', 20),
(1068, 'La Pe', 20),
(1069, 'Pinotepa de Don Luis', 20),
(1070, 'Pluma Hidalgo', 20),
(1071, 'San José del Progreso', 20),
(1072, 'Putla Villa de Guerrero', 20),
(1073, 'Santa Catarina Quioquitani', 20),
(1074, 'Reforma de Pineda', 20),
(1075, 'La Reforma', 20),
(1076, 'Reyes Etla', 20),
(1077, 'Rojas de Cuauhtémoc', 20),
(1078, 'Salina Cruz', 20),
(1079, 'San Agustín Amatengo', 20),
(1080, 'San Agustín Atenango', 20),
(1081, 'San Agustín Chayuco', 20),
(1082, 'San Agustín de las Juntas', 20),
(1083, 'San Agustín Etla', 20),
(1084, 'San Agustín Loxicha', 20),
(1085, 'San Agustín Tlacotepec', 20),
(1086, 'San Agustín Yatareni', 20),
(1087, 'San Andrés Cabecera Nueva', 20),
(1088, 'San Andrés Dinicuiti', 20),
(1089, 'San Andrés Huaxpaltepec', 20),
(1090, 'San Andrés Huayápam', 20),
(1091, 'San Andrés Ixtlahuaca', 20),
(1092, 'San Andrés Lagunas', 20),
(1093, 'San Andrés Nuxiño', 20),
(1094, 'San Andrés Paxtlán', 20),
(1095, 'San Andrés Sinaxtla', 20),
(1096, 'San Andrés Solaga', 20),
(1097, 'San Andrés Teotilálpam', 20),
(1098, 'San Andrés Tepetlapa', 20),
(1099, 'San Andrés Yaá', 20),
(1100, 'San Andrés Zabache', 20),
(1101, 'San Andrés Zautla', 20),
(1102, 'San Antonino Castillo Velasco', 20),
(1103, 'San Antonino el Alto', 20),
(1104, 'San Antonino Monte Verde', 20),
(1105, 'San Antonio Acutla', 20),
(1106, 'San Antonio de la Cal', 20),
(1107, 'San Antonio Huitepec', 20),
(1108, 'San Antonio Nanahuatípam', 20),
(1109, 'San Antonio Sinicahua', 20),
(1110, 'San Antonio Tepetlapa', 20),
(1111, 'San Baltazar Chichicápam', 20),
(1112, 'San Baltazar Loxicha', 20),
(1113, 'San Baltazar Yatzachi el Bajo', 20),
(1114, 'San Bartolo Coyotepec', 20),
(1115, 'San Bartolomé Ayautla', 20),
(1116, 'San Bartolomé Loxicha', 20),
(1117, 'San Bartolomé Quialana', 20),
(1118, 'San Bartolomé Yucuañe', 20),
(1119, 'San Bartolomé Zoogocho', 20),
(1120, 'San Bartolo Soyaltepec', 20),
(1121, 'San Bartolo Yautepec', 20),
(1122, 'San Bernardo Mixtepec', 20),
(1123, 'San Blas Atempa', 20),
(1124, 'San Carlos Yautepec', 20),
(1125, 'San Cristóbal Amatlán', 20),
(1126, 'San Cristóbal Amoltepec', 20),
(1127, 'San Cristóbal Lachirioag', 20),
(1128, 'San Cristóbal Suchixtlahuaca', 20),
(1129, 'San Dionisio del Mar', 20),
(1130, 'San Dionisio Ocotepec', 20),
(1131, 'San Dionisio Ocotlán', 20),
(1132, 'San Esteban Atatlahuca', 20),
(1133, 'San Felipe Jalapa de Díaz', 20),
(1134, 'San Felipe Tejalápam', 20),
(1135, 'San Felipe Usila', 20),
(1136, 'San Francisco Cahuacuá', 20),
(1137, 'San Francisco Cajonos', 20),
(1138, 'San Francisco Chapulapa', 20),
(1139, 'San Francisco Chindúa', 20),
(1140, 'San Francisco del Mar', 20),
(1141, 'San Francisco Huehuetlán', 20),
(1142, 'San Francisco Ixhuatán', 20),
(1143, 'San Francisco Jaltepetongo', 20),
(1144, 'San Francisco Lachigoló', 20),
(1145, 'San Francisco Logueche', 20),
(1146, 'San Francisco Nuxaño', 20),
(1147, 'San Francisco Ozolotepec', 20),
(1148, 'San Francisco Sola', 20),
(1149, 'San Francisco Telixtlahuaca', 20),
(1150, 'San Francisco Teopan', 20),
(1151, 'San Francisco Tlapancingo', 20),
(1152, 'San Gabriel Mixtepec', 20),
(1153, 'San Ildefonso Amatlán', 20),
(1154, 'San Ildefonso Sola', 20),
(1155, 'San Ildefonso Villa Alta', 20),
(1156, 'San Jacinto Amilpas', 20),
(1157, 'San Jacinto Tlacotepec', 20),
(1158, 'San Jerónimo Coatlán', 20),
(1159, 'San Jerónimo Silacayoapilla', 20),
(1160, 'San Jerónimo Sosola', 20),
(1161, 'San Jerónimo Taviche', 20),
(1162, 'San Jerónimo Tecóatl', 20),
(1163, 'San Jorge Nuchita', 20),
(1164, 'San José Ayuquila', 20),
(1165, 'San José Chiltepec', 20),
(1166, 'San José del Peñasco', 20),
(1167, 'San José Estancia Grande', 20),
(1168, 'San José Independencia', 20),
(1169, 'San José Lachiguiri', 20),
(1170, 'San José Tenango', 20),
(1171, 'San Juan Achiutla', 20),
(1172, 'San Juan Atepec', 20),
(1173, 'Ánimas Trujano', 20),
(1174, 'San Juan Bautista Atatlahuca', 20),
(1175, 'San Juan Bautista Coixtlahuaca', 20),
(1176, 'San Juan Bautista Cuicatlán', 20),
(1177, 'San Juan Bautista Guelache', 20),
(1178, 'San Juan Bautista Jayacatlán', 20),
(1179, 'San Juan Bautista Lo de Soto', 20),
(1180, 'San Juan Bautista Suchitepec', 20),
(1181, 'San Juan Bautista Tlacoatzintepec', 20),
(1182, 'San Juan Bautista Tlachichilco', 20),
(1183, 'San Juan Bautista Tuxtepec', 20),
(1184, 'San Juan Cacahuatepec', 20),
(1185, 'San Juan Cieneguilla', 20),
(1186, 'San Juan Coatzóspam', 20),
(1187, 'San Juan Colorado', 20),
(1188, 'San Juan Comaltepec', 20),
(1189, 'San Juan Cotzocón', 20),
(1190, 'San Juan Chicomezúchil', 20),
(1191, 'San Juan Chilateca', 20),
(1192, 'San Juan del Estado', 20),
(1193, 'San Juan del Río', 20),
(1194, 'San Juan Diuxi', 20),
(1195, 'San Juan Evangelista Analco', 20),
(1196, 'San Juan Guelavía', 20),
(1197, 'San Juan Guichicovi', 20),
(1198, 'San Juan Ihualtepec', 20),
(1199, 'San Juan Juquila Mixes', 20),
(1200, 'San Juan Juquila Vijanos', 20),
(1201, 'San Juan Lachao', 20),
(1202, 'San Juan Lachigalla', 20),
(1203, 'San Juan Lajarcia', 20),
(1204, 'San Juan Lalana', 20),
(1205, 'San Juan de los Cués', 20),
(1206, 'San Juan Mazatlán', 20),
(1207, 'San Juan Mixtepec', 20),
(1208, 'San Juan Mixtepec', 20),
(1209, 'San Juan Ñumí', 20),
(1210, 'San Juan Ozolotepec', 20),
(1211, 'San Juan Petlapa', 20),
(1212, 'San Juan Quiahije', 20),
(1213, 'San Juan Quiotepec', 20),
(1214, 'San Juan Sayultepec', 20),
(1215, 'San Juan Tabaá', 20),
(1216, 'San Juan Tamazola', 20),
(1217, 'San Juan Teita', 20),
(1218, 'San Juan Teitipac', 20),
(1219, 'San Juan Tepeuxila', 20),
(1220, 'San Juan Teposcolula', 20),
(1221, 'San Juan Yaeé', 20),
(1222, 'San Juan Yatzona', 20),
(1223, 'San Juan Yucuita', 20),
(1224, 'San Lorenzo', 20),
(1225, 'San Lorenzo Albarradas', 20),
(1226, 'San Lorenzo Cacaotepec', 20),
(1227, 'San Lorenzo Cuaunecuiltitla', 20),
(1228, 'San Lorenzo Texmelúcan', 20),
(1229, 'San Lorenzo Victoria', 20),
(1230, 'San Lucas Camotlán', 20),
(1231, 'San Lucas Ojitlán', 20),
(1232, 'San Lucas Quiaviní', 20),
(1233, 'San Lucas Zoquiápam', 20),
(1234, 'San Luis Amatlán', 20),
(1235, 'San Marcial Ozolotepec', 20),
(1236, 'San Marcos Arteaga', 20),
(1237, 'San Martín de los Cansecos', 20),
(1238, 'San Martín Huamelúlpam', 20),
(1239, 'San Martín Itunyoso', 20),
(1240, 'San Martín Lachilá', 20),
(1241, 'San Martín Peras', 20),
(1242, 'San Martín Tilcajete', 20),
(1243, 'San Martín Toxpalan', 20),
(1244, 'San Martín Zacatepec', 20),
(1245, 'San Mateo Cajonos', 20),
(1246, 'Capulálpam de Méndez', 20),
(1247, 'San Mateo del Mar', 20),
(1248, 'San Mateo Yoloxochitlán', 20),
(1249, 'San Mateo Etlatongo', 20),
(1250, 'San Mateo Nejápam', 20),
(1251, 'San Mateo Peñasco', 20),
(1252, 'San Mateo Piñas', 20),
(1253, 'San Mateo Río Hondo', 20),
(1254, 'San Mateo Sindihui', 20),
(1255, 'San Mateo Tlapiltepec', 20),
(1256, 'San Melchor Betaza', 20),
(1257, 'San Miguel Achiutla', 20),
(1258, 'San Miguel Ahuehuetitlán', 20),
(1259, 'San Miguel Aloápam', 20),
(1260, 'San Miguel Amatitlán', 20),
(1261, 'San Miguel Amatlán', 20),
(1262, 'San Miguel Coatlán', 20),
(1263, 'San Miguel Chicahua', 20),
(1264, 'San Miguel Chimalapa', 20),
(1265, 'San Miguel del Puerto', 20),
(1266, 'San Miguel del Río', 20),
(1267, 'San Miguel Ejutla', 20),
(1268, 'San Miguel el Grande', 20),
(1269, 'San Miguel Huautla', 20),
(1270, 'San Miguel Mixtepec', 20),
(1271, 'San Miguel Panixtlahuaca', 20),
(1272, 'San Miguel Peras', 20),
(1273, 'San Miguel Piedras', 20),
(1274, 'San Miguel Quetzaltepec', 20),
(1275, 'San Miguel Santa Flor', 20),
(1276, 'Villa Sola de Vega', 20),
(1277, 'San Miguel Soyaltepec', 20),
(1278, 'San Miguel Suchixtepec', 20),
(1279, 'Villa Talea de Castro', 20),
(1280, 'San Miguel Tecomatlán', 20),
(1281, 'San Miguel Tenango', 20),
(1282, 'San Miguel Tequixtepec', 20),
(1283, 'San Miguel Tilquiápam', 20),
(1284, 'San Miguel Tlacamama', 20),
(1285, 'San Miguel Tlacotepec', 20),
(1286, 'San Miguel Tulancingo', 20),
(1287, 'San Miguel Yotao', 20),
(1288, 'San Nicolás', 20),
(1289, 'San Nicolás Hidalgo', 20),
(1290, 'San Pablo Coatlán', 20),
(1291, 'San Pablo Cuatro Venados', 20),
(1292, 'San Pablo Etla', 20),
(1293, 'San Pablo Huitzo', 20),
(1294, 'San Pablo Huixtepec', 20),
(1295, 'San Pablo Macuiltianguis', 20),
(1296, 'San Pablo Tijaltepec', 20),
(1297, 'San Pablo Villa de Mitla', 20),
(1298, 'San Pablo Yaganiza', 20),
(1299, 'San Pedro Amuzgos', 20),
(1300, 'San Pedro Apóstol', 20),
(1301, 'San Pedro Atoyac', 20),
(1302, 'San Pedro Cajonos', 20),
(1304, 'San Pedro Coxcaltepec Cántaros', 20),
(1305, 'San Pedro Comitancillo', 20),
(1306, 'San Pedro el Alto', 20),
(1307, 'San Pedro Huamelula', 20),
(1308, 'San Pedro Huilotepec', 20),
(1309, 'San Pedro Ixcatlán', 20),
(1310, 'San Pedro Ixtlahuaca', 20),
(1311, 'San Pedro Jaltepetongo', 20),
(1312, 'San Pedro Jicayán', 20),
(1313, 'San Pedro Jocotipac', 20),
(1314, 'San Pedro Juchatengo', 20),
(1315, 'San Pedro Mártir', 20),
(1316, 'San Pedro Mártir Quiechapa', 20),
(1317, 'San Pedro Mártir Yucuxaco', 20),
(1318, 'San Pedro Mixtepec', 20),
(1319, 'San Pedro Mixtepec', 20),
(1320, 'San Pedro Molinos', 20),
(1321, 'San Pedro Nopala', 20),
(1322, 'San Pedro Ocopetatillo', 20),
(1323, 'San Pedro Ocotepec', 20),
(1324, 'San Pedro Pochutla', 20),
(1325, 'San Pedro Quiatoni', 20),
(1326, 'San Pedro Sochiápam', 20),
(1327, 'San Pedro Tapanatepec', 20),
(1328, 'San Pedro Taviche', 20),
(1329, 'San Pedro Teozacoalco', 20),
(1330, 'San Pedro Teutila', 20),
(1331, 'San Pedro Tidaá', 20),
(1332, 'San Pedro Topiltepec', 20),
(1333, 'San Pedro Totolápam', 20),
(1334, 'Villa de Tututepec de Melchor Ocampo', 20),
(1335, 'San Pedro Yaneri', 20),
(1336, 'San Pedro Yólox', 20),
(1337, 'San Pedro y San Pablo Ayutla', 20),
(1338, 'Villa de Etla', 20),
(1339, 'San Pedro y San Pablo Teposcolula', 20),
(1340, 'San Pedro y San Pablo Tequixtepec', 20),
(1341, 'San Pedro Yucunama', 20),
(1342, 'San Raymundo Jalpan', 20),
(1343, 'San Sebastián Abasolo', 20),
(1344, 'San Sebastián Coatlán', 20),
(1345, 'San Sebastián Ixcapa', 20),
(1346, 'San Sebastián Nicananduta', 20),
(1347, 'San Sebastián Río Hondo', 20),
(1348, 'San Sebastián Tecomaxtlahuaca', 20),
(1349, 'San Sebastián Teitipac', 20),
(1350, 'San Sebastián Tutla', 20),
(1351, 'San Simón Almolongas', 20),
(1352, 'San Simón Zahuatlán', 20),
(1353, 'Santa Ana', 20),
(1354, 'Santa Ana Ateixtlahuaca', 20),
(1355, 'Santa Ana Cuauhtémoc', 20),
(1356, 'Santa Ana del Valle', 20),
(1357, 'Santa Ana Tavela', 20),
(1358, 'Santa Ana Tlapacoyan', 20),
(1359, 'Santa Ana Yareni', 20),
(1360, 'Santa Ana Zegache', 20),
(1361, 'Santa Catalina Quierí', 20),
(1362, 'Santa Catarina Cuixtla', 20),
(1363, 'Santa Catarina Ixtepeji', 20),
(1364, 'Santa Catarina Juquila', 20),
(1365, 'Santa Catarina Lachatao', 20),
(1366, 'Santa Catarina Loxicha', 20),
(1367, 'Santa Catarina Mechoacán', 20),
(1368, 'Santa Catarina Minas', 20),
(1369, 'Santa Catarina Quiané', 20),
(1370, 'Santa Catarina Tayata', 20),
(1371, 'Santa Catarina Ticuá', 20),
(1372, 'Santa Catarina Yosonotú', 20),
(1373, 'Santa Catarina Zapoquila', 20),
(1374, 'Santa Cruz Acatepec', 20),
(1375, 'Santa Cruz Amilpas', 20),
(1376, 'Santa Cruz de Bravo', 20),
(1377, 'Santa Cruz Itundujia', 20),
(1378, 'Santa Cruz Mixtepec', 20),
(1379, 'Santa Cruz Nundaco', 20),
(1380, 'Santa Cruz Papalutla', 20),
(1381, 'Santa Cruz Tacache de Mina', 20),
(1382, 'Santa Cruz Tacahua', 20),
(1383, 'Santa Cruz Tayata', 20),
(1384, 'Santa Cruz Xitla', 20),
(1385, 'Santa Cruz Xoxocotlán', 20),
(1386, 'Santa Cruz Zenzontepec', 20),
(1387, 'Santa Gertrudis', 20),
(1388, 'Santa Inés del Monte', 20),
(1389, 'Santa Inés Yatzeche', 20),
(1390, 'Santa Lucía del Camino', 20),
(1391, 'Santa Lucía Miahuatlán', 20),
(1392, 'Santa Lucía Monteverde', 20),
(1393, 'Santa Lucía Ocotlán', 20),
(1394, 'Santa María Alotepec', 20),
(1395, 'Santa María Apazco', 20),
(1396, 'Santa María la Asunción', 20),
(1397, 'Heroica Ciudad de Tlaxiaco', 20),
(1398, 'Ayoquezco de Aldama', 20),
(1399, 'Santa María Atzompa', 20),
(1400, 'Santa María Camotlán', 20),
(1401, 'Santa María Colotepec', 20),
(1402, 'Santa María Cortijo', 20),
(1403, 'Santa María Coyotepec', 20),
(1404, 'Santa María Chachoápam', 20),
(1405, 'Villa de Chilapa de Díaz', 20),
(1406, 'Santa María Chilchotla', 20),
(1407, 'Santa María Chimalapa', 20),
(1408, 'Santa María del Rosario', 20),
(1409, 'Santa María del Tule', 20),
(1410, 'Santa María Ecatepec', 20),
(1411, 'Santa María Guelacé', 20),
(1412, 'Santa María Guienagati', 20),
(1413, 'Santa María Huatulco', 20),
(1414, 'Santa María Huazolotitlán', 20),
(1415, 'Santa María Ipalapa', 20),
(1416, 'Santa María Ixcatlán', 20),
(1417, 'Santa María Jacatepec', 20),
(1418, 'Santa María Peñoles', 20),
(1419, 'Santa María Petapa', 20),
(1420, 'Santa María Quiegolani', 20),
(1421, 'Santa María Sola', 20),
(1422, 'Santa María Tataltepec', 20),
(1423, 'Santa María Tecomavaca', 20),
(1424, 'Santa María Temaxcalapa', 20),
(1425, 'Santa María Temaxcaltepec', 20),
(1426, 'Santa María Teopoxco', 20),
(1427, 'Santa María Tepantlali', 20),
(1428, 'Santa María Texcatitlán', 20),
(1429, 'Santa María Tlahuitoltepec', 20),
(1430, 'Santa María Tlalixtac', 20),
(1431, 'Santa María Tonameca', 20),
(1432, 'Santa María Totolapilla', 20),
(1433, 'Santa María Xadani', 20),
(1434, 'Santa María Yalina', 20),
(1435, 'Santa María Yavesía', 20),
(1436, 'Santa María Yolotepec', 20),
(1437, 'Santa María Yosoyúa', 20),
(1438, 'Santa María Yucuhiti', 20),
(1439, 'Santa María Zacatepec', 20),
(1440, 'Santa María Zaniza', 20),
(1441, 'Santa María Zoquitlán', 20),
(1442, 'Santiago Amoltepec', 20),
(1443, 'Santiago Apoala', 20),
(1444, 'Santiago Apóstol', 20),
(1445, 'Santiago Astata', 20),
(1446, 'Santiago Atitlán', 20),
(1447, 'Santiago Ayuquililla', 20),
(1448, 'Santiago Cacaloxtepec', 20),
(1449, 'Santiago Camotlán', 20),
(1450, 'Santiago Comaltepec', 20),
(1451, 'Santiago Chazumba', 20),
(1452, 'Santiago Choápam', 20),
(1453, 'Santiago del Río', 20),
(1454, 'Santiago Huajolotitlán', 20),
(1455, 'Santiago Huauclilla', 20),
(1456, 'Santiago Ihuitlán Plumas', 20),
(1457, 'Santiago Ixcuintepec', 20),
(1458, 'Santiago Ixtayutla', 20),
(1459, 'Santiago Jamiltepec', 20),
(1460, 'Santiago Jocotepec', 20),
(1461, 'Santiago Juxtlahuaca', 20),
(1462, 'Santiago Lachiguiri', 20),
(1463, 'Santiago Lalopa', 20),
(1464, 'Santiago Laollaga', 20),
(1465, 'Santiago Laxopa', 20),
(1466, 'Santiago Llano Grande', 20),
(1467, 'Santiago Matatlán', 20),
(1468, 'Santiago Miltepec', 20),
(1469, 'Santiago Minas', 20),
(1470, 'Santiago Nacaltepec', 20),
(1471, 'Santiago Nejapilla', 20),
(1472, 'Santiago Nundiche', 20),
(1473, 'Santiago Nuyoó', 20),
(1474, 'Santiago Pinotepa Nacional', 20),
(1475, 'Santiago Suchilquitongo', 20),
(1476, 'Santiago Tamazola', 20),
(1477, 'Santiago Tapextla', 20),
(1478, 'Villa Tejúpam de la Unión', 20),
(1479, 'Santiago Tenango', 20),
(1480, 'Santiago Tepetlapa', 20),
(1481, 'Santiago Tetepec', 20),
(1482, 'Santiago Texcalcingo', 20),
(1483, 'Santiago Textitlán', 20),
(1484, 'Santiago Tilantongo', 20),
(1485, 'Santiago Tillo', 20),
(1486, 'Santiago Tlazoyaltepec', 20),
(1487, 'Santiago Xanica', 20),
(1488, 'Santiago Xiacuí', 20),
(1489, 'Santiago Yaitepec', 20),
(1490, 'Santiago Yaveo', 20),
(1491, 'Santiago Yolomécatl', 20),
(1492, 'Santiago Yosondúa', 20),
(1493, 'Santiago Yucuyachi', 20),
(1494, 'Santiago Zacatepec', 20),
(1495, 'Santiago Zoochila', 20),
(1496, 'Nuevo Zoquiápam', 20),
(1497, 'Santo Domingo Ingenio', 20),
(1498, 'Santo Domingo Albarradas', 20),
(1499, 'Santo Domingo Armenta', 20),
(1500, 'Santo Domingo Chihuitán', 20),
(1501, 'Santo Domingo de Morelos', 20),
(1502, 'Santo Domingo Ixcatlán', 20),
(1503, 'Santo Domingo Nuxaá', 20),
(1504, 'Santo Domingo Ozolotepec', 20),
(1505, 'Santo Domingo Petapa', 20),
(1506, 'Santo Domingo Roayaga', 20),
(1507, 'Santo Domingo Tehuantepec', 20),
(1508, 'Santo Domingo Teojomulco', 20),
(1509, 'Santo Domingo Tepuxtepec', 20),
(1510, 'Santo Domingo Tlatayápam', 20),
(1511, 'Santo Domingo Tomaltepec', 20),
(1512, 'Santo Domingo Tonalá', 20),
(1513, 'Santo Domingo Tonaltepec', 20),
(1514, 'Santo Domingo Xagacía', 20),
(1515, 'Santo Domingo Yanhuitlán', 20),
(1516, 'Santo Domingo Yodohino', 20),
(1517, 'Santo Domingo Zanatepec', 20),
(1518, 'Santos Reyes Nopala', 20),
(1519, 'Santos Reyes Pápalo', 20),
(1520, 'Santos Reyes Tepejillo', 20),
(1521, 'Santos Reyes Yucuná', 20),
(1522, 'Santo Tomás Jalieza', 20),
(1523, 'Santo Tomás Mazaltepec', 20),
(1524, 'Santo Tomás Ocotepec', 20),
(1525, 'Santo Tomás Tamazulapan', 20),
(1526, 'San Vicente Coatlán', 20),
(1527, 'San Vicente Lachixío', 20),
(1528, 'San Vicente Nuñú', 20),
(1529, 'Silacayoápam', 20),
(1530, 'Sitio de Xitlapehua', 20),
(1531, 'Soledad Etla', 20),
(1532, 'Villa de Tamazulápam del Progreso', 20),
(1533, 'Tanetze de Zaragoza', 20),
(1534, 'Taniche', 20),
(1535, 'Tataltepec de Valdés', 20),
(1536, 'Teococuilco de Marcos Pérez', 20),
(1537, 'Teotitlán de Flores Magón', 20),
(1538, 'Teotitlán del Valle', 20),
(1539, 'Teotongo', 20),
(1540, 'Tepelmeme Villa de Morelos', 20),
(1541, 'Heroica Villa Tezoatlán de Segura y Luna, Cuna de la Independencia de Oaxaca', 20),
(1542, 'San Jerónimo Tlacochahuaya', 20),
(1543, 'Tlacolula de Matamoros', 20),
(1544, 'Tlacotepec Plumas', 20),
(1545, 'Tlalixtac de Cabrera', 20),
(1546, 'Totontepec Villa de Morelos', 20),
(1547, 'Trinidad Zaachila', 20),
(1548, 'La Trinidad Vista Hermosa', 20),
(1549, 'Unión Hidalgo', 20),
(1550, 'Valerio Trujano', 20),
(1551, 'San Juan Bautista Valle Nacional', 20),
(1552, 'Villa Díaz Ordaz', 20),
(1553, 'Yaxe', 20),
(1554, 'Magdalena Yodocono de Porfirio Díaz', 20),
(1555, 'Yogana', 20),
(1556, 'Yutanduchi de Guerrero', 20),
(1557, 'Villa de Zaachila', 20),
(1558, 'San Mateo Yucutindoo', 20),
(1559, 'Zapotitlán Lagunas', 20),
(1560, 'Zapotitlán Palmas', 20),
(1561, 'Santa Inés de Zaragoza', 20),
(1562, 'Zimatlán de Álvarez', 20),
(1563, 'Acajete', 21),
(1564, 'Acateno', 21),
(1565, 'Acatlán', 21),
(1566, 'Acatzingo', 21),
(1567, 'Acteopan', 21),
(1568, 'Ahuacatlán', 21),
(1569, 'Ahuatlán', 21),
(1570, 'Ahuazotepec', 21),
(1571, 'Ahuehuetitla', 21),
(1572, 'Ajalpan', 21),
(1573, 'Albino Zertuche', 21),
(1574, 'Aljojuca', 21),
(1575, 'Altepexi', 21),
(1576, 'Amixtlán', 21),
(1577, 'Amozoc', 21),
(1578, 'Aquixtla', 21),
(1579, 'Atempan', 21),
(1580, 'Atexcal', 21),
(1581, 'Atlixco', 21),
(1582, 'Atoyatempan', 21),
(1583, 'Atzala', 21),
(1584, 'Atzitzihuacán', 21),
(1585, 'Atzitzintla', 21),
(1586, 'Axutla', 21),
(1587, 'Ayotoxco de Guerrero', 21),
(1588, 'Calpan', 21),
(1589, 'Caltepec', 21),
(1590, 'Camocuautla', 21),
(1591, 'Caxhuacan', 21),
(1592, 'Coatepec', 21),
(1593, 'Coatzingo', 21),
(1594, 'Cohetzala', 21),
(1595, 'Cohuecan', 21),
(1596, 'Coronango', 21),
(1597, 'Coxcatlán', 21),
(1598, 'Coyomeapan', 21),
(1599, 'Coyotepec', 21),
(1600, 'Cuapiaxtla de Madero', 21),
(1601, 'Cuautempan', 21),
(1602, 'Cuautinchán', 21),
(1603, 'Cuautlancingo', 21),
(1604, 'Cuayuca de Andrade', 21),
(1605, 'Cuetzalan del Progreso', 21),
(1606, 'Cuyoaco', 21),
(1607, 'Chalchicomula de Sesma', 21),
(1608, 'Chapulco', 21),
(1609, 'Chiautla', 21),
(1610, 'Chiautzingo', 21),
(1611, 'Chiconcuautla', 21),
(1612, 'Chichiquila', 21),
(1613, 'Chietla', 21),
(1614, 'Chigmecatitlán', 21),
(1615, 'Chignahuapan', 21),
(1616, 'Chignautla', 21),
(1617, 'Chila', 21),
(1618, 'Chila de la Sal', 21),
(1619, 'Honey', 21),
(1620, 'Chilchotla', 21),
(1621, 'Chinantla', 21),
(1622, 'Domingo Arenas', 21),
(1623, 'Eloxochitlán', 21),
(1624, 'Epatlán', 21),
(1625, 'Esperanza', 21),
(1626, 'Francisco Z. Mena', 21),
(1627, 'General Felipe Ángeles', 21),
(1628, 'Guadalupe', 21),
(1629, 'Guadalupe Victoria', 21),
(1630, 'Hermenegildo Galeana', 21),
(1631, 'Huaquechula', 21),
(1632, 'Huatlatlauca', 21),
(1633, 'Huauchinango', 21),
(1634, 'Huehuetla', 21),
(1635, 'Huehuetlán el Chico', 21),
(1636, 'Huejotzingo', 21),
(1637, 'Hueyapan', 21),
(1638, 'Hueytamalco', 21),
(1639, 'Hueytlalpan', 21),
(1640, 'Huitzilan de Serdán', 21),
(1641, 'Huitziltepec', 21),
(1642, 'Atlequizayan', 21),
(1643, 'Ixcamilpa de Guerrero', 21),
(1644, 'Ixcaquixtla', 21),
(1645, 'Ixtacamaxtitlán', 21),
(1646, 'Ixtepec', 21),
(1647, 'Izúcar de Matamoros', 21),
(1648, 'Jalpan', 21),
(1649, 'Jolalpan', 21),
(1650, 'Jonotla', 21),
(1651, 'Jopala', 21),
(1652, 'Juan C. Bonilla', 21),
(1653, 'Juan Galindo', 21),
(1654, 'Juan N. Méndez', 21),
(1655, 'Lafragua', 21),
(1656, 'Libres', 21),
(1657, 'La Magdalena Tlatlauquitepec', 21),
(1658, 'Mazapiltepec de Juárez', 21),
(1659, 'Mixtla', 21),
(1700, 'Molcaxac', 21),
(1701, 'Cañada Morelos', 21),
(1702, 'Naupan', 21),
(1703, 'Nauzontla', 21),
(1704, 'Nealtican', 21),
(1705, 'Nicolás Bravo', 21),
(1706, 'Nopalucan', 21),
(1707, 'Ocotepec', 21),
(1708, 'Ocoyucan', 21),
(1709, 'Olintla', 21),
(1710, 'Oriental', 21),
(1711, 'Pahuatlán', 21),
(1712, 'Palmar de Bravo', 21),
(1713, 'Pantepec', 21),
(1714, 'Petlalcingo', 21),
(1715, 'Piaxtla', 21),
(1716, 'Puebla', 21),
(1717, 'Quecholac', 21),
(1718, 'Quimixtlán', 21),
(1719, 'Rafael Lara Grajales', 21),
(1720, 'Los Reyes de Juárez', 21),
(1721, 'San Andrés Cholula', 21),
(1722, 'San Antonio Cañada', 21),
(1723, 'San Diego la Mesa Tochimiltzingo', 21),
(1724, 'San Felipe Teotlalcingo', 21),
(1725, 'San Felipe Tepatlán', 21),
(1726, 'San Gabriel Chilac', 21),
(1727, 'San Gregorio Atzompa', 21),
(1728, 'San Jerónimo Tecuanipan', 21),
(1729, 'San Jerónimo Xayacatlán', 21),
(1730, 'San José Chiapa', 21),
(1731, 'San José Miahuatlán', 21),
(1732, 'San Juan Atenco', 21),
(1733, 'San Juan Atzompa', 21),
(1734, 'San Martín Texmelucan', 21),
(1735, 'San Martín Totoltepec', 21),
(1736, 'San Matías Tlalancaleca', 21),
(1737, 'San Miguel Ixitlán', 21),
(1738, 'San Miguel Xoxtla', 21),
(1739, 'San Nicolás Buenos Aires', 21),
(1740, 'San Nicolás de los Ranchos', 21),
(1741, 'San Pablo Anicano', 21),
(1742, 'San Pedro Cholula', 21),
(1743, 'San Pedro Yeloixtlahuaca', 21),
(1744, 'San Salvador el Seco', 21),
(1745, 'San Salvador el Verde', 21),
(1746, 'San Salvador Huixcolotla', 21),
(1747, 'San Sebastián Tlacotepec', 21),
(1748, 'Santa Catarina Tlaltempan', 21),
(1749, 'Santa Inés Ahuatempan', 21),
(1750, 'Santa Isabel Cholula', 21),
(1751, 'Santiago Miahuatlán', 21),
(1752, 'Huehuetlán el Grande', 21),
(1753, 'Santo Tomás Hueyotlipan', 21),
(1754, 'Soltepec', 21),
(1755, 'Tecali de Herrera', 21),
(1756, 'Tecamachalco', 21),
(1757, 'Tecomatlán', 21),
(1758, 'Tehuacán', 21),
(1759, 'Tehuitzingo', 21),
(1760, 'Tenampulco', 21),
(1761, 'Teopantlán', 21),
(1762, 'Teotlalco', 21),
(1763, 'Tepanco de López', 21),
(1764, 'Tepango de Rodríguez', 21),
(1765, 'Tepatlaxco de Hidalgo', 21),
(1766, 'Tepeaca', 21),
(1767, 'Tepemaxalco', 21),
(1768, 'Tepeojuma', 21),
(1769, 'Tepetzintla', 21),
(1770, 'Tepexco', 21),
(1771, 'Tepexi de Rodríguez', 21),
(1772, 'Tepeyahualco', 21),
(1773, 'Tepeyahualco de Cuauhtémoc', 21),
(1774, 'Tetela de Ocampo', 21),
(1775, 'Teteles de Avila Castillo', 21),
(1776, 'Teziutlán', 21),
(1777, 'Tianguismanalco', 21),
(1778, 'Tilapa', 21),
(1779, 'Tlacotepec de Benito Juárez', 21),
(1780, 'Tlacuilotepec', 21),
(1781, 'Tlachichuca', 21),
(1782, 'Tlahuapan', 21),
(1783, 'Tlaltenango', 21),
(1784, 'Tlanepantla', 21),
(1785, 'Tlaola', 21),
(1786, 'Tlapacoya', 21),
(1787, 'Tlapanalá', 21),
(1788, 'Tlatlauquitepec', 21),
(1789, 'Tlaxco', 21),
(1790, 'Tochimilco', 21),
(1791, 'Tochtepec', 21),
(1792, 'Totoltepec de Guerrero', 21),
(1793, 'Tulcingo', 21),
(1794, 'Tuzamapan de Galeana', 21),
(1795, 'Tzicatlacoyan', 21),
(1796, 'Venustiano Carranza', 21),
(1797, 'Vicente Guerrero', 21),
(1798, 'Xayacatlán de Bravo', 21),
(1799, 'Xicotepec', 21),
(1800, 'Xicotlán', 21),
(1801, 'Xiutetelco', 21),
(1802, 'Xochiapulco', 21),
(1803, 'Xochiltepec', 21),
(1804, 'Xochitlán de Vicente Suárez', 21),
(1805, 'Xochitlán Todos Santos', 21),
(1806, 'Yaonáhuac', 21),
(1807, 'Yehualtepec', 21),
(1808, 'Zacapala', 21),
(1809, 'Zacapoaxtla', 21),
(1810, 'Zacatlán', 21),
(1811, 'Zapotitlán', 21),
(1812, 'Zapotitlán de Méndez', 21),
(1813, 'Zaragoza', 21),
(1814, 'Zautla', 21),
(1815, 'Zihuateutla', 21),
(1816, 'Zinacatepec', 21),
(1817, 'Zongozotla', 21),
(1818, 'Zoquiapan', 21),
(1819, 'Zoquitlán', 21),
(1820, 'Amealco de Bonfil', 22),
(1821, 'Pinal de Amoles', 22),
(1822, 'Arroyo Seco', 22),
(1823, 'Cadereyta de Montes', 22),
(1824, 'Colón', 22),
(1825, 'Corregidora', 22),
(1826, 'Ezequiel Montes', 22),
(1827, 'Huimilpan', 22),
(1828, 'Jalpan de Serra', 22),
(1829, 'Landa de Matamoros', 22),
(1830, 'El Marqués', 22),
(1831, 'Pedro Escobedo', 22),
(1832, 'Peñamiller', 22),
(1833, 'Querétaro', 22),
(1834, 'San Joaquín', 22),
(1835, 'San Juan del Río', 22),
(1836, 'Tequisquiapan', 22),
(1837, 'Tolimán', 22),
(1838, 'Cozumel', 23),
(1839, 'Felipe Carrillo Puerto', 23),
(1840, 'Isla Mujeres', 23),
(1841, 'Othón P. Blanco', 23),
(1842, 'Benito Juárez', 23),
(1843, 'José María Morelos', 23),
(1844, 'Lázaro Cárdenas', 23),
(1845, 'Solidaridad', 23),
(1846, 'Tulum', 23),
(1847, 'Bacalar', 23),
(1848, 'Ahualulco', 24),
(1849, 'Alaquines', 24),
(1850, 'Aquismón', 24),
(1851, 'Armadillo de los Infante', 24),
(1852, 'Cárdenas', 24),
(1853, 'Catorce', 24),
(1854, 'Cedral', 24),
(1855, 'Cerritos', 24),
(1856, 'Cerro de San Pedro', 24),
(1857, 'Ciudad del Maíz', 24),
(1858, 'Ciudad Fernández', 24),
(1859, 'Tancanhuitz', 24);
INSERT INTO `municipio` (`id_municipio`, `nombre_mun`, `estado_id`) VALUES
(1860, 'Ciudad Valles', 24),
(1861, 'Coxcatlán', 24),
(1862, 'Charcas', 24),
(1863, 'Ebano', 24),
(1864, 'Guadalcázar', 24),
(1865, 'Huehuetlán', 24),
(1866, 'Lagunillas', 24),
(1867, 'Matehuala', 24),
(1868, 'Mexquitic de Carmona', 24),
(1869, 'Moctezuma', 24),
(1870, 'Rayón', 24),
(1871, 'Rioverde', 24),
(1872, 'Salinas', 24),
(1873, 'San Antonio', 24),
(1874, 'San Ciro de Acosta', 24),
(1875, 'San Luis Potosí', 24),
(1876, 'San Martín Chalchicuautla', 24),
(1877, 'San Nicolás Tolentino', 24),
(1878, 'Santa Catarina', 24),
(1879, 'Santa María del Río', 24),
(1880, 'Santo Domingo', 24),
(1882, 'San Vicente Tancuayalab', 24),
(1883, 'Soledad de Graciano Sánchez', 24),
(1884, 'Tamasopo', 24),
(1885, 'Tamazunchale', 24),
(1886, 'Tampacán', 24),
(1887, 'Tampamolón Corona', 24),
(1888, 'Tamuín', 24),
(1889, 'Tanlajás', 24),
(1890, 'Tanquián de Escobedo', 24),
(1891, 'Tierra Nueva', 24),
(1892, 'Vanegas', 24),
(1893, 'Venado', 24),
(1894, 'Villa de Arriaga', 24),
(1895, 'Villa de Guadalupe', 24),
(1896, 'Villa de la Paz', 24),
(1897, 'Villa de Ramos', 24),
(1898, 'Villa de Reyes', 24),
(1899, 'Villa Hidalgo', 24),
(1900, 'Villa Juárez', 24),
(1901, 'Axtla de Terrazas', 24),
(1902, 'Xilitla', 24),
(1903, 'Zaragoza', 24),
(1904, 'Villa de Arista', 24),
(1905, 'Matlapa', 24),
(1906, 'El Naranjo', 24),
(1907, 'Ahome', 25),
(1908, 'Angostura', 25),
(1909, 'Badiraguato', 25),
(1910, 'Concordia', 25),
(1911, 'Cosalá', 25),
(1912, 'Culiacán', 25),
(1913, 'Choix', 25),
(1914, 'Elota', 25),
(1915, 'Escuinapa', 25),
(1916, 'El Fuerte', 25),
(1917, 'Guasave', 25),
(1918, 'Mazatlán', 25),
(1919, 'Mocorito', 25),
(1920, 'Rosario', 25),
(1921, 'Salvador Alvarado', 25),
(1922, 'San Ignacio', 25),
(1923, 'Sinaloa', 25),
(1924, 'Navolato', 25),
(1925, 'Aconchi', 26),
(1926, 'Agua Prieta', 26),
(1927, 'Alamos', 26),
(1928, 'Altar', 26),
(1929, 'Arivechi', 26),
(1930, 'Arizpe', 26),
(1931, 'Atil', 26),
(1932, 'Bacadéhuachi', 26),
(1933, 'Bacanora', 26),
(1934, 'Bacerac', 26),
(1935, 'Bacoachi', 26),
(1936, 'Bácum', 26),
(1937, 'Banámichi', 26),
(1938, 'Baviácora', 26),
(1939, 'Bavispe', 26),
(1940, 'Benjamín Hill', 26),
(1941, 'Caborca', 26),
(1942, 'Cajeme', 26),
(1943, 'Cananea', 26),
(1944, 'Carbó', 26),
(1945, 'La Colorada', 26),
(1946, 'Cucurpe', 26),
(1947, 'Cumpas', 26),
(1948, 'Divisaderos', 26),
(1949, 'Empalme', 26),
(1950, 'Etchojoa', 26),
(1951, 'Fronteras', 26),
(1952, 'Granados', 26),
(1953, 'Guaymas', 26),
(1954, 'Hermosillo', 26),
(1955, 'Huachinera', 26),
(1956, 'Huásabas', 26),
(1957, 'Huatabampo', 26),
(1958, 'Huépac', 26),
(1959, 'Imuris', 26),
(1960, 'Magdalena', 26),
(1961, 'Mazatán', 26),
(1962, 'Moctezuma', 26),
(1963, 'Naco', 26),
(1964, 'Nácori Chico', 26),
(1965, 'Nacozari de García', 26),
(1966, 'Navojoa', 26),
(1967, 'Nogales', 26),
(1968, 'Onavas', 26),
(1969, 'Opodepe', 26),
(1970, 'Oquitoa', 26),
(1971, 'Pitiquito', 26),
(1972, 'Puerto Peñasco', 26),
(1973, 'Quiriego', 26),
(1974, 'Rayón', 26),
(1975, 'Rosario', 26),
(1976, 'Sahuaripa', 26),
(1977, 'San Felipe de Jesús', 26),
(1978, 'San Javier', 26),
(1979, 'San Luis Río Colorado', 26),
(1980, 'San Miguel de Horcasitas', 26),
(1981, 'San Pedro de la Cueva', 26),
(1982, 'Santa Ana', 26),
(1983, 'Santa Cruz', 26),
(1984, 'Sáric', 26),
(1985, 'Soyopa', 26),
(1986, 'Suaqui Grande', 26),
(1987, 'Tepache', 26),
(1988, 'Trincheras', 26),
(1989, 'Tubutama', 26),
(1990, 'Ures', 26),
(1991, 'Villa Hidalgo', 26),
(1992, 'Villa Pesqueira', 26),
(1993, 'Yécora', 26),
(1994, 'General Plutarco Elías Calles', 26),
(1995, 'Benito Juárez', 26),
(1996, 'San Ignacio Río Muerto', 26),
(1997, 'Balancán', 27),
(1998, 'Cárdenas', 27),
(1999, 'Centla', 27),
(2000, 'Centro', 27),
(2001, 'Comalcalco', 27),
(2002, 'Cunduacán', 27),
(2003, 'Emiliano Zapata', 27),
(2004, 'Huimanguillo', 27),
(2005, 'Jalapa', 27),
(2006, 'Jalpa de Méndez', 27),
(2007, 'Jonuta', 27),
(2008, 'Macuspana', 27),
(2009, 'Nacajuca', 27),
(2010, 'Paraíso', 27),
(2011, 'Tacotalpa', 27),
(2012, 'Teapa', 27),
(2013, 'Tenosique', 27),
(2014, 'Abasolo', 28),
(2015, 'Aldama', 28),
(2016, 'Altamira', 28),
(2017, 'Antiguo Morelos', 28),
(2018, 'Burgos', 28),
(2019, 'Bustamante', 28),
(2020, 'Camargo', 28),
(2021, 'Casas', 28),
(2022, 'Ciudad Madero', 28),
(2023, 'Cruillas', 28),
(2024, 'Gómez Farías', 28),
(2025, 'González', 28),
(2026, 'Güémez', 28),
(2027, 'Guerrero', 28),
(2028, 'Gustavo Díaz Ordaz', 28),
(2029, 'Hidalgo', 28),
(2030, 'Jaumave', 28),
(2031, 'Jiménez', 28),
(2032, 'Llera', 28),
(2033, 'Mainero', 28),
(2034, 'El Mante', 28),
(2035, 'Matamoros', 28),
(2036, 'Méndez', 28),
(2037, 'Mier', 28),
(2038, 'Miguel Alemán', 28),
(2039, 'Miquihuana', 28),
(2040, 'Nuevo Laredo', 28),
(2041, 'Nuevo Morelos', 28),
(2042, 'Ocampo', 28),
(2043, 'Padilla', 28),
(2044, 'Palmillas', 28),
(2045, 'Reynosa', 28),
(2046, 'Río Bravo', 28),
(2047, 'San Carlos', 28),
(2048, 'San Fernando', 28),
(2049, 'San Nicolás', 28),
(2050, 'Soto la Marina', 28),
(2051, 'Tampico', 28),
(2052, 'Tula', 28),
(2053, 'Valle Hermoso', 28),
(2054, 'Victoria', 28),
(2055, 'Villagrán', 28),
(2056, 'Xicoténcatl', 28),
(2057, 'Amaxac de Guerrero', 29),
(2059, 'Atlangatepec', 29),
(2060, 'Atltzayanca', 29),
(2061, 'Apizaco', 29),
(2062, 'Calpulalpan', 29),
(2063, 'El Carmen Tequexquitla', 29),
(2064, 'Cuapiaxtla', 29),
(2065, 'Cuaxomulco', 29),
(2066, 'Chiautempan', 29),
(2067, 'Muñoz de Domingo Arenas', 29),
(2068, 'Españita', 29),
(2069, 'Huamantla', 29),
(2070, 'Hueyotlipan', 29),
(2071, 'Ixtacuixtla de Mariano Matamoros', 29),
(2072, 'Ixtenco', 29),
(2073, 'Mazatecochco de José María Morelos', 29),
(2074, 'Contla de Juan Cuamatzi', 29),
(2075, 'Tepetitla de Lardizábal', 29),
(2076, 'Sanctórum de Lázaro Cárdenas', 29),
(2077, 'Nanacamilpa de Mariano Arista', 29),
(2078, 'Acuamanala de Miguel Hidalgo', 29),
(2079, 'Natívitas', 29),
(2080, 'Panotla', 29),
(2081, 'San Pablo del Monte', 29),
(2082, 'Santa Cruz Tlaxcala', 29),
(2083, 'Tenancingo', 29),
(2084, 'Teolocholco', 29),
(2085, 'Tepeyanco', 29),
(2086, 'Terrenate', 29),
(2087, 'Tetla de la Solidaridad', 29),
(2088, 'Tetlatlahuca', 29),
(2089, 'Tlaxcala', 29),
(2090, 'Tlaxco', 29),
(2091, 'Tocatlán', 29),
(2092, 'Totolac', 29),
(2093, 'Ziltlaltépec de Trinidad Sánchez Santos', 29),
(2094, 'Tzompantepec', 29),
(2095, 'Xaloztoc', 29),
(2096, 'Xaltocan', 29),
(2097, 'Papalotla de Xicohténcatl', 29),
(2098, 'Xicohtzinco', 29),
(2099, 'Yauhquemehcan', 29),
(2100, 'Zacatelco', 29),
(2101, 'Benito Juárez', 29),
(2102, 'Emiliano Zapata', 29),
(2103, 'Lázaro Cárdenas', 29),
(2104, 'La Magdalena Tlaltelulco', 29),
(2105, 'San Damián Texóloc', 29),
(2106, 'San Francisco Tetlanohcan', 29),
(2107, 'San Jerónimo Zacualpan', 29),
(2108, 'San José Teacalco', 29),
(2109, 'San Juan Huactzinco', 29),
(2110, 'San Lorenzo Axocomanitla', 29),
(2111, 'San Lucas Tecopilco', 29),
(2112, 'Santa Ana Nopalucan', 29),
(2113, 'Santa Apolonia Teacalco', 29),
(2114, 'Santa Catarina Ayometla', 29),
(2115, 'Santa Cruz Quilehtla', 29),
(2116, 'Santa Isabel Xiloxoxtla', 29),
(2117, 'Acajete', 30),
(2118, 'Acatlán', 30),
(2119, 'Actopan', 30),
(2120, 'Acula', 30),
(2121, 'Acultzingo', 30),
(2122, 'Camarón de Tejeda', 30),
(2123, 'Alpatláhuac', 30),
(2124, 'Alto Lucero de Gutiérrez Barrios', 30),
(2125, 'Altotonga', 30),
(2126, 'Alvarado', 30),
(2127, 'Amatitlán', 30),
(2128, 'Naranjos Amatlán', 30),
(2129, 'Amatlán de los Reyes', 30),
(2130, 'Angel R. Cabada', 30),
(2131, 'La Antigua', 30),
(2132, 'Apazapan', 30),
(2133, 'Aquila', 30),
(2134, 'Astacinga', 30),
(2135, 'Atlahuilco', 30),
(2136, 'Atoyac', 30),
(2137, 'Atzacan', 30),
(2138, 'Atzalan', 30),
(2139, 'Tlaltetela', 30),
(2140, 'Ayahualulco', 30),
(2141, 'Banderilla', 30),
(2142, 'Benito Juárez', 30),
(2143, 'Boca del Río', 30),
(2144, 'Calcahualco', 30),
(2145, 'Camerino Z. Mendoza', 30),
(2146, 'Carrillo Puerto', 30),
(2147, 'Catemaco', 30),
(2148, 'Cazones de Herrera', 30),
(2149, 'Cerro Azul', 30),
(2150, 'Acayucan', 30),
(2151, 'Citlaltépetl', 30),
(2152, 'Coacoatzintla', 30),
(2153, 'Coahuitlán', 30),
(2154, 'Coatepec', 30),
(2155, 'Coatzacoalcos', 30),
(2156, 'Coatzintla', 30),
(2157, 'Coetzala', 30),
(2158, 'Colipa', 30),
(2159, 'Comapa', 30),
(2160, 'Córdoba', 30),
(2161, 'Cosamaloapan de Carpio', 30),
(2162, 'Cosautlán de Carvajal', 30),
(2163, 'Coscomatepec', 30),
(2164, 'Cosoleacaque', 30),
(2165, 'Cotaxtla', 30),
(2166, 'Coxquihui', 30),
(2167, 'Coyutla', 30),
(2168, 'Cuichapa', 30),
(2169, 'Cuitláhuac', 30),
(2170, 'Chacaltianguis', 30),
(2171, 'Chalma', 30),
(2172, 'Chiconamel', 30),
(2173, 'Chiconquiaco', 30),
(2174, 'Chicontepec', 30),
(2175, 'Chinameca', 30),
(2176, 'Chinampa de Gorostiza', 30),
(2177, 'Las Choapas', 30),
(2178, 'Chocamán', 30),
(2179, 'Chontla', 30),
(2180, 'Chumatlán', 30),
(2181, 'Emiliano Zapata', 30),
(2182, 'Espinal', 30),
(2183, 'Filomeno Mata', 30),
(2184, 'Fortín', 30),
(2185, 'Gutiérrez Zamora', 30),
(2186, 'Hidalgotitlán', 30),
(2187, 'Huatusco', 30),
(2188, 'Huayacocotla', 30),
(2189, 'Hueyapan de Ocampo', 30),
(2190, 'Huiloapan de Cuauhtémoc', 30),
(2191, 'Ignacio de la Llave', 30),
(2192, 'Ilamatlán', 30),
(2193, 'Isla', 30),
(2194, 'Ixcatepec', 30),
(2195, 'Ixhuacán de los Reyes', 30),
(2196, 'Ixhuatlán del Café', 30),
(2197, 'Ixhuatlancillo', 30),
(2198, 'Ixhuatlán del Sureste', 30),
(2199, 'Ixhuatlán de Madero', 30),
(2200, 'Ixmatlahuacan', 30),
(2201, 'Ixtaczoquitlán', 30),
(2202, 'Jalacingo', 30),
(2203, 'Xalapa', 30),
(2204, 'Jalcomulco', 30),
(2205, 'Jáltipan', 30),
(2206, 'Jamapa', 30),
(2207, 'Jesús Carranza', 30),
(2208, 'Xico', 30),
(2209, 'Jilotepec', 30),
(2210, 'Juan Rodríguez Clara', 30),
(2211, 'Juchique de Ferrer', 30),
(2212, 'Landero y Coss', 30),
(2213, 'Lerdo de Tejada', 30),
(2214, 'Magdalena', 30),
(2215, 'Maltrata', 30),
(2216, 'Manlio Fabio Altamirano', 30),
(2217, 'Mariano Escobedo', 30),
(2218, 'Martínez de la Torre', 30),
(2219, 'Mecatlán', 30),
(2220, 'Mecayapan', 30),
(2221, 'Medellín de Bravo', 30),
(2222, 'Miahuatlán', 30),
(2223, 'Las Minas', 30),
(2224, 'Minatitlán', 30),
(2225, 'Misantla', 30),
(2226, 'Mixtla de Altamirano', 30),
(2227, 'Moloacán', 30),
(2228, 'Naolinco', 30),
(2229, 'Naranjal', 30),
(2230, 'Nautla', 30),
(2231, 'Nogales', 30),
(2232, 'Oluta', 30),
(2233, 'Omealca', 30),
(2234, 'Orizaba', 30),
(2235, 'Otatitlán', 30),
(2236, 'Oteapan', 30),
(2237, 'Ozuluama de Mascareñas', 30),
(2238, 'Pajapan', 30),
(2239, 'Pánuco', 30),
(2240, 'Papantla', 30),
(2241, 'Paso del Macho', 30),
(2242, 'Paso de Ovejas', 30),
(2243, 'La Perla', 30),
(2244, 'Perote', 30),
(2245, 'Platón Sánchez', 30),
(2246, 'Playa Vicente', 30),
(2247, 'Poza Rica de Hidalgo', 30),
(2248, 'Saltabarranca', 30),
(2249, 'San Andrés Tenejapan', 30),
(2250, 'San Andrés Tuxtla', 30),
(2251, 'San Juan Evangelista', 30),
(2252, 'Santiago Tuxtla', 30),
(2253, 'Sayula de Alemán', 30),
(2254, 'Soconusco', 30),
(2255, 'Sochiapa', 30),
(2256, 'Soledad Atzompa', 30),
(2257, 'Soledad de Doblado', 30),
(2258, 'Soteapan', 30),
(2259, 'Tamalín', 30),
(2260, 'Tamiahua', 30),
(2261, 'Tampico Alto', 30),
(2262, 'Tancoco', 30),
(2263, 'Tantima', 30),
(2264, 'Tantoyuca', 30),
(2265, 'Tatatila', 30),
(2266, 'Castillo de Teayo', 30),
(2267, 'Tecolutla', 30),
(2268, 'Tehuipango', 30),
(2269, 'Álamo Temapache', 30),
(2270, 'Tempoal', 30),
(2271, 'Tenampa', 30),
(2272, 'Tenochtitlán', 30),
(2273, 'Teocelo', 30),
(2274, 'Tepatlaxco', 30),
(2275, 'Tepetlán', 30),
(2276, 'Tepetzintla', 30),
(2277, 'Tequila', 30),
(2278, 'José Azueta', 30),
(2279, 'Texcatepec', 30),
(2280, 'Texhuacán', 30),
(2281, 'Texistepec', 30),
(2282, 'Tezonapa', 30),
(2283, 'Tierra Blanca', 30),
(2284, 'Tihuatlán', 30),
(2285, 'Tlacojalpan', 30),
(2286, 'Tlacolulan', 30),
(2287, 'Tlacotalpan', 30),
(2288, 'Tlacotepec de Mejía', 30),
(2289, 'Tlachichilco', 30),
(2290, 'Tlalixcoyan', 30),
(2291, 'Tlalnelhuayocan', 30),
(2292, 'Tlapacoyan', 30),
(2293, 'Tlaquilpa', 30),
(2294, 'Tlilapan', 30),
(2295, 'Tomatlán', 30),
(2296, 'Tonayán', 30),
(2297, 'Totutla', 30),
(2298, 'Tuxpan', 30),
(2299, 'Tuxtilla', 30),
(2300, 'Ursulo Galván', 30),
(2301, 'Vega de Alatorre', 30),
(2302, 'Veracruz', 30),
(2303, 'Villa Aldama', 30),
(2304, 'Xoxocotla', 30),
(2305, 'Yanga', 30),
(2306, 'Yecuatla', 30),
(2307, 'Zacualpan', 30),
(2308, 'Zaragoza', 30),
(2309, 'Zentla', 30),
(2310, 'Zongolica', 30),
(2311, 'Zontecomatlán de López y Fuentes', 30),
(2312, 'Zozocolco de Hidalgo', 30),
(2313, 'Agua Dulce', 30),
(2314, 'El Higo', 30),
(2315, 'Nanchital de Lázaro Cárdenas del Río', 30),
(2316, 'Tres Valles', 30),
(2317, 'Carlos A. Carrillo', 30),
(2318, 'Tatahuicapan de Juárez', 30),
(2319, 'Uxpanapa', 30),
(2320, 'San Rafael', 30),
(2321, 'Santiago Sochiapan', 30),
(2322, 'Abalá', 31),
(2323, 'Acanceh', 31),
(2324, 'Akil', 31),
(2325, 'Baca', 31),
(2326, 'Bokobá', 31),
(2327, 'Buctzotz', 31),
(2328, 'Cacalchén', 31),
(2329, 'Calotmul', 31),
(2330, 'Cansahcab', 31),
(2331, 'Cantamayec', 31),
(2332, 'Celestún', 31),
(2333, 'Cenotillo', 31),
(2334, 'Conkal', 31),
(2335, 'Cuncunul', 31),
(2336, 'Cuzamá', 31),
(2337, 'Chacsinkín', 31),
(2338, 'Chankom', 31),
(2339, 'Chapab', 31),
(2340, 'Chemax', 31),
(2341, 'Chicxulub Pueblo', 31),
(2342, 'Chichimilá', 31),
(2343, 'Chikindzonot', 31),
(2344, 'Chocholá', 31),
(2345, 'Chumayel', 31),
(2346, 'Dzán', 31),
(2347, 'Dzemul', 31),
(2348, 'Dzidzantún', 31),
(2349, 'Dzilam de Bravo', 31),
(2350, 'Dzilam González', 31),
(2352, 'Dzoncauich', 31),
(2353, 'Espita', 31),
(2354, 'Halachó', 31),
(2355, 'Hocabá', 31),
(2356, 'Hoctún', 31),
(2357, 'Homún', 31),
(2358, 'Huhí', 31),
(2359, 'Hunucmá', 31),
(2360, 'Ixil', 31),
(2361, 'Izamal', 31),
(2362, 'Kanasín', 31),
(2363, 'Kantunil', 31),
(2364, 'Kaua', 31),
(2365, 'Kinchil', 31),
(2366, 'Kopomá', 31),
(2367, 'Mama', 31),
(2368, 'Maní', 31),
(2369, 'Maxcanú', 31),
(2370, 'Mayapán', 31),
(2371, 'Mérida', 31),
(2372, 'Mocochá', 31),
(2373, 'Motul', 31),
(2374, 'Muna', 31),
(2375, 'Muxupip', 31),
(2376, 'Opichén', 31),
(2377, 'Oxkutzcab', 31),
(2378, 'Panabá', 31),
(2379, 'Peto', 31),
(2380, 'Progreso', 31),
(2381, 'Quintana Roo', 31),
(2382, 'Río Lagartos', 31),
(2383, 'Sacalum', 31),
(2384, 'Samahil', 31),
(2385, 'Sanahcat', 31),
(2386, 'San Felipe', 31),
(2387, 'Santa Elena', 31),
(2388, 'Seyé', 31),
(2389, 'Sinanché', 31),
(2390, 'Sotuta', 31),
(2391, 'Sucilá', 31),
(2392, 'Sudzal', 31),
(2393, 'Suma', 31),
(2394, 'Tahdziú', 31),
(2395, 'Tahmek', 31),
(2396, 'Teabo', 31),
(2397, 'Tecoh', 31),
(2398, 'Tekal de Venegas', 31),
(2399, 'Tekantó', 31),
(2400, 'Tekax', 31),
(2401, 'Tekit', 31),
(2402, 'Tekom', 31),
(2404, 'Telchac Puerto', 31),
(2405, 'Temax', 31),
(2406, 'Temozón', 31),
(2407, 'Tepakán', 31),
(2408, 'Tetiz', 31),
(2409, 'Teya', 31),
(2410, 'Ticul', 31),
(2411, 'Timucuy', 31),
(2412, 'Tinum', 31),
(2413, 'Tixcacalcupul', 31),
(2414, 'Tixkokob', 31),
(2415, 'Tixmehuac', 31),
(2416, 'Tixpéhual', 31),
(2417, 'Tizimín', 31),
(2418, 'Tunkás', 31),
(2419, 'Tzucacab', 31),
(2420, 'Uayma', 31),
(2421, 'Ucú', 31),
(2422, 'Umán', 31),
(2423, 'Valladolid', 31),
(2424, 'Xocchel', 31),
(2425, 'Yaxcabá', 31),
(2426, 'Yaxkukul', 31),
(2427, 'Yobaín', 31),
(2428, 'Apozol', 32),
(2429, 'Apulco', 32),
(2430, 'Atolinga', 32),
(2431, 'Benito Juárez', 32),
(2432, 'Calera', 32),
(2433, 'Cañitas de Felipe Pescador', 32),
(2434, 'Concepción del Oro', 32),
(2435, 'Cuauhtémoc', 32),
(2436, 'Chalchihuites', 32),
(2437, 'Fresnillo', 32),
(2438, 'Trinidad García de la Cadena', 32),
(2439, 'Genaro Codina', 32),
(2440, 'General Enrique Estrada', 32),
(2441, 'General Francisco R. Murguía', 32),
(2442, 'El Plateado de Joaquín Amaro', 32),
(2443, 'General Pánfilo Natera', 32),
(2444, 'Guadalupe', 32),
(2445, 'Huanusco', 32),
(2446, 'Jalpa', 32),
(2447, 'Jerez', 32),
(2448, 'Jiménez del Teul', 32),
(2449, 'Juan Aldama', 32),
(2450, 'Juchipila', 32),
(2451, 'Loreto', 32),
(2452, 'Luis Moya', 32),
(2453, 'Mazapil', 32),
(2454, 'Melchor Ocampo', 32),
(2455, 'Mezquital del Oro', 32),
(2456, 'Miguel Auza', 32),
(2457, 'Momax', 32),
(2458, 'Monte Escobedo', 32),
(2459, 'Morelos', 32),
(2460, 'Moyahua de Estrada', 32),
(2461, 'Nochistlán de Mejía', 32),
(2462, 'Noria de Ángeles', 32),
(2463, 'Ojocaliente', 32),
(2464, 'Pánuco', 32),
(2465, 'Pinos', 32),
(2466, 'Río Grande', 32),
(2467, 'Sain Alto', 32),
(2468, 'El Salvador', 32),
(2469, 'Sombrerete', 32),
(2470, 'Susticacán', 32),
(2471, 'Tabasco', 32),
(2472, 'Tepechitlán', 32),
(2473, 'Tepetongo', 32),
(2474, 'Teúl de González Ortega', 32),
(2475, 'Tlaltenango de Sánchez Román', 32),
(2476, 'Valparaíso', 32),
(2477, 'Vetagrande', 32),
(2478, 'Villa de Cos', 32),
(2479, 'Villa García', 32),
(2480, 'Villa González Ortega', 32),
(2481, 'Villa Hidalgo', 32),
(2482, 'Villanueva', 32),
(2483, 'Zacatecas', 32),
(2484, 'Trancoso', 32),
(2485, 'Santa María de la Paz', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `id_nacionalidad` int(11) NOT NULL,
  `nombre_nac` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id_nacionalidad`, `nombre_nac`) VALUES
(161, 'AFGANA'),
(162, 'ALBANESA'),
(163, 'ALEMANA'),
(164, 'ANDORRANA'),
(165, 'ANGOLEÑA'),
(166, 'ANTIGUANA'),
(167, 'SAUDÍ'),
(168, 'ARGELINA'),
(169, 'ARGENTINA'),
(170, 'ARMENIA'),
(171, 'ARUBEÑA'),
(172, 'AUSTRALIANA'),
(173, 'AUSTRIACA'),
(174, 'AZERBAIYANA'),
(175, 'BAHAMEÑA'),
(176, 'BANGLADESÍ'),
(177, 'BARBADENSE'),
(178, 'BAREINÍ'),
(179, 'BELGA'),
(180, 'BELICEÑA'),
(181, 'BENINÉSA'),
(182, 'BIELORRUSA'),
(183, 'BIRMANA'),
(184, 'BOLIVIANA'),
(185, 'BOSNIA'),
(186, 'BOTSUANA'),
(187, 'BRASILEÑA'),
(188, 'BRUNEANA'),
(189, 'BÚLGARA'),
(190, 'BURKINÉS'),
(191, 'BURUNDÉSA'),
(192, 'BUTANÉSA'),
(193, 'CABOVERDIANA'),
(194, 'CAMBOYANA'),
(195, 'CAMERUNESA'),
(196, 'CANADIENSE'),
(197, 'CATARÍ'),
(198, 'CHADIANA'),
(199, 'CHILENA'),
(200, 'CHINA'),
(201, 'CHIPRIOTA'),
(202, 'VATICANA'),
(203, 'COLOMBIANA'),
(204, 'COMORENSE'),
(205, 'NORCOREANA'),
(206, 'SURCOREANA'),
(207, 'MARFILEÑA'),
(208, 'COSTARRICENSE'),
(209, 'CROATA'),
(210, 'CUBANA'),
(211, 'DANÉSA'),
(212, 'DOMINIQUÉS'),
(213, 'ECUATORIANA'),
(214, 'EGIPCIA'),
(215, 'SALVADOREÑA'),
(216, 'EMIRATÍ'),
(217, 'ERITREA'),
(218, 'ESLOVACA'),
(219, 'ESLOVENA'),
(220, 'ESPAÑOLA'),
(221, 'ESTADOUNIDENSE'),
(222, 'ESTONIA'),
(223, 'ETÍOPE'),
(224, 'FILIPINA'),
(225, 'FINLANDÉSA'),
(226, 'FIYIANA'),
(227, 'FRANCÉSA'),
(228, 'GABONÉSA'),
(229, 'GAMBIANA'),
(230, 'GEORGIANA'),
(231, 'GIBRALTAREÑA'),
(232, 'GHANÉSA'),
(233, 'GRANADINA'),
(234, 'GRIEGA'),
(235, 'GROENLANDÉSA'),
(236, 'GUATEMALTECA'),
(237, 'ECUATOGUINEANA'),
(238, 'GUINEANA'),
(239, 'GUINEANA'),
(240, 'GUYANESA'),
(241, 'HAITIANA'),
(242, 'HONDUREÑA'),
(243, 'HÚNGARA'),
(244, 'HINDÚ'),
(245, 'INDONESIA'),
(246, 'IRAQUÍ'),
(247, 'IRANÍ'),
(248, 'IRLANDÉSA'),
(249, 'ISLANDÉSA'),
(250, 'COOKIANA'),
(251, 'MARSHALÉSA'),
(252, 'SALOMONENSE'),
(253, 'ISRAELÍ'),
(254, 'ITALIANA'),
(255, 'JAMAIQUINA'),
(256, 'JAPONÉSA'),
(257, 'JORDANA'),
(258, 'KAZAJA'),
(259, 'KENIATA'),
(260, 'KIRGUISA'),
(261, 'KIRIBATIANA'),
(262, 'KUWAITÍ'),
(263, 'LAOSIANA'),
(264, 'LESOTENSE'),
(265, 'LETÓNA'),
(266, 'LIBANÉSA'),
(267, 'LIBERIANA'),
(268, 'LIBIA'),
(269, 'LIECHTENSTEINIANA'),
(270, 'LITUANA'),
(271, 'LUXEMBURGUÉSA'),
(272, 'MALGACHE'),
(273, 'MALASIA'),
(274, 'MALAUÍ'),
(275, 'MALDIVA'),
(276, 'MALIENSE'),
(277, 'MALTÉSA'),
(278, 'MARROQUÍ'),
(279, 'MARTINIQUÉS'),
(280, 'MAURICIANA'),
(281, 'MAURITANA'),
(282, 'MEXICANA'),
(283, 'MICRONESIA'),
(284, 'MOLDAVA'),
(285, 'MONEGASCA'),
(286, 'MONGOLA'),
(287, 'MONTENEGRINA'),
(288, 'MOZAMBIQUEÑA'),
(289, 'NAMIBIA'),
(290, 'NAURUANA'),
(291, 'NEPALÍ'),
(292, 'NICARAGÜENSE'),
(293, 'NIGERINA'),
(294, 'NIGERIANA'),
(295, 'NORUEGA'),
(296, 'NEOZELANDÉSA'),
(297, 'OMANÍ'),
(298, 'NEERLANDÉSA'),
(299, 'PAKISTANÍ'),
(300, 'PALAUANA'),
(301, 'PALESTINA'),
(302, 'PANAMEÑA'),
(303, 'PAPÚ'),
(304, 'PARAGUAYA'),
(305, 'PERUANA'),
(306, 'POLACA'),
(307, 'PORTUGUÉSA'),
(308, 'PUERTORRIQUEÑA'),
(309, 'BRITÁNICA'),
(310, 'CENTROAFRICANA'),
(311, 'CHECA'),
(312, 'MACEDONIA'),
(313, 'CONGOLEÑA'),
(314, 'CONGOLEÑA'),
(315, 'DOMINICANA'),
(316, 'SUDAFRICANA'),
(317, 'RUANDÉSA'),
(318, 'RUMANA'),
(319, 'RUSA'),
(320, 'SAMOANA'),
(321, 'CRISTOBALEÑA'),
(322, 'SANMARINENSE'),
(323, 'SANVICENTINA'),
(324, 'SANTALUCENSE'),
(325, 'SANTOTOMENSE'),
(326, 'SENEGALÉSA'),
(327, 'SERBIA'),
(328, 'SEYCHELLENSE'),
(329, 'SIERRALEONÉSA'),
(330, 'SINGAPURENSE'),
(331, 'SIRIA'),
(332, 'SOMALÍ'),
(333, 'CEILANÉSA'),
(334, 'SUAZI'),
(335, 'SURSUDANÉSA'),
(336, 'SUDANÉSA'),
(337, 'SUECA'),
(338, 'SUIZA'),
(339, 'SURINAMESA'),
(340, 'TAILANDÉSA'),
(341, 'TANZANA'),
(342, 'TAYIKA'),
(343, 'TIMORENSE'),
(344, 'TOGOLÉSA'),
(345, 'TONGANA'),
(346, 'TRINITENSE'),
(347, 'TUNECINA'),
(348, 'TURCOMANA'),
(349, 'TURCA'),
(350, 'TUVALUANA'),
(351, 'UCRANIANA'),
(352, 'UGANDÉSA'),
(353, 'URUGUAYA'),
(354, 'UZBEKA'),
(355, 'VANUATUENSE'),
(356, 'VENEZOLANA'),
(357, 'VIETNAMITA'),
(358, 'YEMENÍ'),
(359, 'YIBUTIANA'),
(360, 'ZAMBIANA'),
(361, 'ZIMBABUENSE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_niveles` int(11) NOT NULL,
  `nombre_nivel` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_niveles`, `nombre_nivel`) VALUES
(1, 'Alto'),
(2, 'Bajo'),
(3, 'Medio'),
(4, 'No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_academico`
--

CREATE TABLE `nivel_academico` (
  `id_nivel_academico` int(11) NOT NULL,
  `nombre_nivel_academico` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nivel_academico`
--

INSERT INTO `nivel_academico` (`id_nivel_academico`, `nombre_nivel_academico`) VALUES
(1, 'Licenciatura'),
(2, 'Maestría'),
(3, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_paises` int(11) NOT NULL,
  `nombre_pa` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_paises`, `nombre_pa`) VALUES
(1, 'Afganistán'),
(2, 'Islas Gland'),
(3, 'Albania'),
(4, 'Alemania'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antártida'),
(9, 'Antigua y Barbuda'),
(10, 'Antillas Holandesas'),
(11, 'Arabia Saudí'),
(12, 'Argelia'),
(13, 'Argentina'),
(14, 'Armenia'),
(15, 'Aruba'),
(16, 'Australia'),
(17, 'Austria'),
(18, 'Azerbaiyán'),
(19, 'Bahamas'),
(20, 'Bahréin'),
(21, 'Bangladesh'),
(22, 'Barbados'),
(23, 'Bielorrusia'),
(24, 'Bélgica'),
(25, 'Belice'),
(26, 'Benin'),
(27, 'Bermudas'),
(28, 'Bhután'),
(29, 'Bolivia'),
(30, 'Bosnia y Herzegovina'),
(31, 'Botsuana'),
(32, 'Isla Bouvet'),
(33, 'Brasil'),
(34, 'Brunéi'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cabo Verde'),
(39, 'Islas Caimán'),
(40, 'Camboya'),
(41, 'Camerún'),
(42, 'Canadá'),
(43, 'República Centroafricana'),
(44, 'Chad'),
(45, 'República Checa'),
(46, 'Chile'),
(47, 'China'),
(48, 'Chipre'),
(49, 'Isla de Navidad'),
(50, 'Ciudad del Vaticano'),
(51, 'Islas Cocos'),
(52, 'Colombia'),
(53, 'Comoras'),
(54, 'República Democrática del Congo'),
(55, 'Congo'),
(56, 'Islas Cook'),
(57, 'Corea del Norte'),
(58, 'Corea del Sur'),
(59, 'Costa de Marfil'),
(60, 'Costa Rica'),
(61, 'Croacia'),
(62, 'Cuba'),
(63, 'Dinamarca'),
(64, 'Dominica'),
(65, 'República Dominicana'),
(66, 'Ecuador'),
(67, 'Egipto'),
(68, 'El Salvador'),
(69, 'Emiratos Árabes Unidos'),
(70, 'Eritrea'),
(71, 'Eslovaquia'),
(72, 'Eslovenia'),
(73, 'España'),
(74, 'Islas ultramarinas de Estados Unidos'),
(75, 'Estados Unidos'),
(76, 'Estonia'),
(77, 'Etiopía'),
(78, 'Islas Feroe'),
(79, 'Filipinas'),
(80, 'Finlandia'),
(81, 'Fiyi'),
(82, 'Francia'),
(83, 'Gabón'),
(84, 'Gambia'),
(85, 'Georgia'),
(86, 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'Ghana'),
(88, 'Gibraltar'),
(89, 'Granada'),
(90, 'Grecia'),
(91, 'Groenlandia'),
(92, 'Guadalupe'),
(93, 'Guam'),
(94, 'Guatemala'),
(95, 'Guayana Francesa'),
(96, 'Guinea'),
(97, 'Guinea Ecuatorial'),
(98, 'Guinea-Bissau'),
(99, 'Guyana'),
(100, 'Haití'),
(101, 'Islas Heard y McDonald'),
(102, 'Honduras'),
(103, 'Hong Kong'),
(104, 'Hungría'),
(105, 'India'),
(106, 'Indonesia'),
(107, 'Irán'),
(108, 'Iraq'),
(109, 'Irlanda'),
(110, 'Islandia'),
(111, 'Israel'),
(112, 'Italia'),
(113, 'Jamaica'),
(114, 'Japón'),
(115, 'Jordania'),
(116, 'Kazajstán'),
(117, 'Kenia'),
(118, 'Kirguistán'),
(119, 'Kiribati'),
(120, 'Kuwait'),
(121, 'Laos'),
(122, 'Lesotho'),
(123, 'Letonia'),
(124, 'Líbano'),
(125, 'Liberia'),
(126, 'Libia'),
(127, 'Liechtenstein'),
(128, 'Lituania'),
(129, 'Luxemburgo'),
(130, 'Macao'),
(131, 'ARY Macedonia'),
(132, 'Madagascar'),
(133, 'Malasia'),
(134, 'Malawi'),
(135, 'Maldivas'),
(136, 'Malí'),
(137, 'Malta'),
(138, 'Islas Malvinas'),
(139, 'Islas Marianas del Norte'),
(140, 'Marruecos'),
(141, 'Islas Marshall'),
(142, 'Martinica'),
(143, 'Mauricio'),
(144, 'Mauritania'),
(145, 'Mayotte'),
(146, 'México'),
(147, 'Micronesia'),
(148, 'Moldavia'),
(149, 'Mónaco'),
(150, 'Mongolia'),
(151, 'Montserrat'),
(152, 'Mozambique'),
(153, 'Myanmar'),
(154, 'Namibia'),
(155, 'Nauru'),
(156, 'Nepal'),
(157, 'Nicaragua'),
(158, 'Níger'),
(159, 'Nigeria'),
(160, 'Niue'),
(161, 'Isla Norfolk'),
(162, 'Noruega'),
(163, 'Nueva Caledonia'),
(164, 'Nueva Zelanda'),
(165, 'Omán'),
(166, 'Países Bajos'),
(167, 'Pakistán'),
(168, 'Palau'),
(169, 'Palestina'),
(170, 'Panamá'),
(171, 'Papúa Nueva Guinea'),
(172, 'Paraguay'),
(173, 'Perú'),
(174, 'Islas Pitcairn'),
(175, 'Polinesia Francesa'),
(176, 'Polonia'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reino Unido'),
(181, 'Reunión'),
(182, 'Ruanda'),
(183, 'Rumania'),
(184, 'Rusia'),
(185, 'Sahara Occidental'),
(186, 'Islas Salomón'),
(187, 'Samoa'),
(188, 'Samoa Americana'),
(189, 'San Cristóbal y Nevis'),
(190, 'San Marino'),
(191, 'San Pedro y Miquelón'),
(192, 'San Vicente y las Granadinas'),
(193, 'Santa Helena'),
(194, 'Santa Lucía'),
(195, 'Santo Tomé y Príncipe'),
(196, 'Senegal'),
(197, 'Serbia y Montenegro'),
(198, 'Seychelles'),
(199, 'Sierra Leona'),
(200, 'Singapur'),
(201, 'Siria'),
(202, 'Somalia'),
(203, 'Sri Lanka'),
(204, 'Suazilandia'),
(205, 'Sudáfrica'),
(206, 'Sudán'),
(207, 'Suecia'),
(208, 'Suiza'),
(209, 'Surinam'),
(210, 'Svalbard y Jan Mayen'),
(211, 'Tailandia'),
(212, 'Taiwán'),
(213, 'Tanzania'),
(214, 'Tayikistán'),
(215, 'Territorio Británico del Océano Índico'),
(216, 'Territorios Australes Franceses'),
(217, 'Timor Oriental'),
(218, 'Togo'),
(219, 'Tokelau'),
(220, 'Tonga'),
(221, 'Trinidad y Tobago'),
(222, 'Túnez'),
(223, 'Islas Turcas y Caicos'),
(224, 'Turkmenistán'),
(225, 'Turquía'),
(226, 'Tuvalu'),
(227, 'Ucrania'),
(228, 'Uganda'),
(229, 'Uruguay'),
(230, 'Uzbekistán'),
(231, 'Vanuatu'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Islas Vírgenes Británicas'),
(235, 'Islas Vírgenes de los Estados Unidos'),
(236, 'Wallis y Futuna'),
(237, 'Yemen'),
(238, 'Yibuti'),
(239, 'Zambia'),
(240, 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rama_economica`
--

CREATE TABLE `rama_economica` (
  `id_rama` int(11) NOT NULL,
  `descr_rama` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `economico_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rama_economica`
--

INSERT INTO `rama_economica` (`id_rama`, `descr_rama`, `economico_id`) VALUES
(1, 'CULTIVO DE GRANOS Y SEMILLAS OLEAGINOSAS', 2),
(2, 'CULTIVO DE HORTALIZAS', 2),
(3, 'CULTIVO DE FRUTALES Y NUECES', 2),
(4, 'CULTIVO EN INVERNADEROS Y VIVEROS Y FLORICULTURA', 2),
(5, 'OTROS CULTIVOS', 2),
(6, 'EXPLOTACION DE BOVINOS', 2),
(7, 'EXPLOTACION DE PORCINOS', 2),
(8, 'EXPLOTACION AVICOLA', 2),
(9, 'EXPLOTACION DE OVINOS Y CAPRINOS', 2),
(10, 'ACUICULTURA ANIMAL', 2),
(11, 'EXPLOTACION DE OTROS ANIMALES', 2),
(12, 'SILVICULTURA', 2),
(13, 'VIVEROS FORESTALES Y RECOLECCION DE PRODUCTOS FORESTALES', 2),
(14, 'TALA DE ARBOLES', 2),
(15, 'PESCA', 2),
(16, 'CAZA Y CAPTURA', 2),
(17, 'SERVICIOS RELACIONADOS CON LA AGRICULTURA', 2),
(18, 'SERVICIOS RELACIONADOS CON LA GANADERIA', 2),
(19, 'SERVICIOS RELACIONADOS CON EL APROVECHAMIENTO FORESTAL', 2),
(20, 'EXTRACCION DE PETROLEO Y GAS', 3),
(21, 'MINERIA DE CARBON MINERAL', 3),
(22, 'MINERIA DE MINERALES METALICOS', 3),
(23, 'MINERIA DE MINERALES NO METALICOS', 3),
(24, 'SERVICIOS RELACIONADOS CON LA MINERIA', 3),
(25, 'GENERACION TRANSMISION Y SUMINISTRO DE ENERGIA ELECTRICA', 4),
(26, 'CAPTACION TRATAMIENTO Y SUMINISTRO DE AGUA', 4),
(27, 'SUMINISTRO DE GAS POR DUCTOS AL CONSUMIDOR FINAL', 4),
(28, 'EDIFICACION RESIDENCIAL', 5),
(29, 'EDIFICACION NO RESIDENCIAL', 5),
(30, 'CONSTRUCCION DE OBRAS PARA EL ABASTECIMIENTO DE AGUA PETROLEO GAS ELECTRICIDAD Y TELECOMUNICACIONES', 5),
(31, 'DIVISION DE TERRENOS Y CONSTRUCCION DE OBRAS DE URBANIZACION', 5),
(32, 'CONSTRUCCION DE VIAS DE COMUNICACION', 5),
(33, 'OTRAS CONSTRUCCIONES DE INGENIERIA CIVIL U OBRA PESADA', 5),
(34, 'CIMENTACIONES MONTAJE DE ESTRUCTURAS PREFABRICADAS Y TRABAJO EN EXTERIORES', 5),
(35, 'INSTALACIONES Y EQUIPAMIENTO EN CONSTRUCCIONES', 5),
(36, 'TRABAJOS DE ACABADOS EN EDIFICACIONES', 5),
(37, 'OTROS TRABAJOS ESPECIALIZADOS PARA LA CONSTRUCCION', 5),
(38, 'ELABORACION DE ALIMENTOS PARA ANIMALES', 6),
(39, 'MOLIENDA DE GRANOS Y DE SEMILLAS OLEAGINOSAS', 6),
(40, 'ELABORACION DE AZUCAR CHOCOLATES  DULCES Y SIMILARES', 6),
(41, 'CONSERVACION DE FRUTAS VERDURAS Y GUISOS', 6),
(42, 'ELABORACION DE PRODUCTOS LACTEOS', 6),
(43, 'MATANZA EMPACADO Y PROCESAMIENTO DE CARNE DE GANADO Y AVES', 6),
(44, 'PREPARACION Y ENVASADO DE PESCADOS Y MARISCOS', 6),
(45, 'ELABORACION DE PRODUCTOS DE PANADERIA Y TORTILLAS', 6),
(46, 'OTRAS INDUSTRIAS ALIMENTARIAS', 6),
(47, 'INDUSTRIA DE LAS BEBIDAS', 6),
(48, 'INDUSTRIA DEL TABACO', 6),
(49, 'PREPARACION E HILADO DE FIBRAS TEXTILES Y FABRICACION DE HILOS', 6),
(50, 'FABRICACION DE TELAS', 6),
(51, 'ACABADO Y RECUBRIMIENTO DE TEXTILES', 6),
(52, 'CONFECCION DE ALFOMBRAS BLANCOS Y SIMILARES', 6),
(53, 'CONFECCION DE OTROS PRODUCTOS TEXTILES EXCEPTO PRENDAS DE VESTIR', 6),
(54, 'TEJIDO DE PRENDAS DE VESTIR DE PUNTO', 6),
(55, 'CONFECCION DE PRENDAS DE VESTIR', 6),
(56, 'CONFECCION DE ACCESORIOS DE VESTIR', 6),
(57, 'CURTIDO Y ACABADO DE CUERO Y PIEL', 6),
(58, 'FABRICACION DE CALZADO', 6),
(59, 'FABRICACION DE OTROS PRODUCTOS DE CUERO PIEL Y MATERIALES SUCEDANEOS', 6),
(60, 'ASERRADO Y CONSERVACION DE LA MADERA', 6),
(61, 'FABRICACION DE LAMINADOS Y AGLUTINADOS DE MADERA', 6),
(62, 'FABRICACION DE OTROS PRODUCTOS DE MADERA', 6),
(63, 'FABRICACION DE CELULOSA PAPEL CARTON', 6),
(64, 'FABRICACION DE PRODUCTOS DE PAPEL Y CARTON', 6),
(65, 'IMPRESION E INDUSTRIAS CONEXAS', 6),
(66, 'FABRICACION DE PRODUCTOS DERIVADOS DEL PETROLEO Y DEL CARBON', 6),
(67, 'FABRICACION DE PRODUCTOS QUIMICOS BASICOS', 6),
(68, 'FABRICACION DE HULES RESINAS Y FIBRAS QUIMICAS', 6),
(69, 'FABRICACION DE FERTILIZANTES PESTICIDAS Y OTROS AGROQUIMICOS', 6),
(70, 'FABRICACION DE PRODUCTOS FARMACEUTICOS', 6),
(71, 'FABRICACION DE PINTURAS RECUBRIMIENTOS ADHESIVOS Y SELLADORES', 6),
(72, 'FABRICACION DE JABONES LIMPIADORES Y PREPARACIONES DE TOCADOR', 6),
(73, 'FABRICACION DE OTROS PRODUCTOS QUIMICOS', 6),
(74, 'FABRICACION DE PRODUCTOS DE PLASTICO', 6),
(75, 'FABRICACION DE PRODUCTOS DE HULE', 6),
(76, 'FABRICACION DE PRODUCTOS A BASE DE ARCILLAS Y MINERALES REFRACTARIOS', 6),
(77, 'FABRICACION DE VIDRIO Y PRODUCTOS DE VIDRIO', 6),
(78, 'FABRICACION DE CEMENTO Y PRODUCTOS DE CONCRETO', 6),
(79, 'FABRICACION DE CAL YESO Y PRODUCTOS DE YESO', 6),
(80, 'FABRICACION DE OTROS PRODUCTOS A BASE DE MINERALES NO METALICOS', 6),
(81, 'INDUSTRIA BASICA DEL HIERRO Y DEL ACERO', 6),
(82, 'FABRICACION DE PRODUCTOS DE HIERRO Y ACERO DE MATERIAL COMPRADO', 6),
(83, 'INDUSTRIA DEL ALUMINIO', 6),
(84, 'INDUSTRIAS DE METALES NO FERROSOS EXCEPTO ALUMINIO', 6),
(85, 'MOLDEO POR FUNDICION DE PIEZAS METALICAS', 6),
(86, 'FABRICACION DE PRODUCTOS METALICOS FORJADOS Y TROQUELADOS', 6),
(87, 'FABRICACION DE HERRAMIENTAS DE MANO SIN MOTOR Y UTENSILIOS DE COCINA METALICOS', 6),
(88, 'FABRICACION DE ESTRUCTURAS METALICAS Y PRODUCTOS DE HERRERIA', 6),
(89, 'FABRICACION DE CALDERAS TANQUES Y ENVACES METALICOS', 6),
(90, 'FABRICACION DE HERRAJES Y CERRADURAS', 6),
(91, 'FABRICACION DE ALAMBRE PRODUCTOS DE ALAMBRE Y RESORTES', 6),
(92, 'MAQUINADO DE PIEZAS METALICAS Y FABRICACION DE TORNILLOS', 6),
(93, 'RECUBRIMIENTOS Y TERMINADOS METALICOS', 6),
(94, 'FABRICACION DE OTROS PRODUCTOS METALICOS', 6),
(95, 'FABRICACION DE MAQUINARIA Y EQUIPO PARA LAS ACTIVIDADES AGROPECUARIAS PARA LA CONSTRUCCION Y PARA LA', 6),
(96, 'FABRICACION DE MAQUINARIA Y EQUIPO PARA LAS INDUSTRIAS MANUFACTURERAS EXCEPTO LA METALMECANICA', 6),
(97, 'FABRICACION DE MAQUINARIA Y EQUIPO PARA EL COMERCIO Y LOS SERVICIOS', 6),
(98, 'SERVICIOS RELACIONADOS CON EL TRANSPORTE POR CARRETERA', 9),
(99, 'FABRICACION DE SISTEMAS DE AIRE ACONDICIONADO CALEFACCION Y DE REFRIGERACION INDUSTRIAL Y COMERCIAL', 6),
(100, 'FABRICACION DE MAQUINARIA Y EQUIPO PARA LA INDUSTRIA METALMECANICA', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_academica`
--

CREATE TABLE `reg_academica` (
  `id_academica` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_terminacion` date DEFAULT NULL,
  `grado_id` int(11) DEFAULT NULL,
  `descr_grado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `completado` char(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `paises_id` int(11) DEFAULT NULL,
  `estados_id` int(11) DEFAULT NULL,
  `campo_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `subdisciplina_id` int(11) DEFAULT NULL,
  `estatus_id` int(11) DEFAULT NULL,
  `num_cedula` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `institucion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `descripcion_tesis` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_academica`
--

INSERT INTO `reg_academica` (`id_academica`, `usuario_id`, `fecha_terminacion`, `grado_id`, `descr_grado`, `completado`, `paises_id`, `estados_id`, `campo_id`, `disciplina_id`, `subdisciplina_id`, `estatus_id`, `num_cedula`, `sector_id`, `institucion`, `dependencia_id`, `departamento_id`, `descripcion_tesis`, `fecha_captura`) VALUES
(1, 1, '2018-06-07', 4, 'rfrkjfbrmfbjrbfjhrbfjhbrjhfbrjfbjhrbf', 'Si', 4, 3, 20, 7, 26, 4, 'rgrgjrbgjhi4yr7y847y', 3, 'gtighjjtkhgtjkgjtkgjkltjglkt', 23, 4, 'tkjgntkjngkjtngkjntkgjntkjngkjgnkt', '2018-06-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_adscripciones`
--

CREATE TABLE `reg_adscripciones` (
  `id_adscripcion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `entidad_empleadora_id` int(11) NOT NULL,
  `nombre_entidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_puesto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_pais` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_laboral` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `domicilio_laboral` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `paises_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `codigo_postal` bigint(20) DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `sector_estancia_id` int(11) NOT NULL,
  `nombre_institucion` varchar(266) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `fecha_captura` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_adscripciones`
--

INSERT INTO `reg_adscripciones` (`id_adscripcion`, `usuario_id`, `fecha_inicio`, `entidad_empleadora_id`, `nombre_entidad`, `nombre_puesto`, `tel_pais`, `tel_laboral`, `domicilio_laboral`, `paises_id`, `estado_id`, `municipio_id`, `codigo_postal`, `fecha_final`, `sector_estancia_id`, `nombre_institucion`, `dependencia_id`, `departamento_id`, `fecha_captura`) VALUES
(1, 1, '2018-06-01', 1, 'jkhedbfhkejhfkjehfkjehfkjehkjhekj', 'kjhkjhkjhkjhkjhkjhkjhkj', '67657575', '567657657', 'wjhdvjgdjhwvjhwgdjwdgjwhg', 146, 16, 835, 58000, '2018-06-29', 6, 'kjgkjhbkjjlsdjlsjlksjlksjlkjslkdjlskjslkjlk', 3, 0, '2018-06-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_articulos`
--

CREATE TABLE `reg_articulos` (
  `id_articulos` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_pub` date DEFAULT NULL,
  `num_volumen` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_articulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_autor` int(11) DEFAULT NULL,
  `posicion_autor` int(11) DEFAULT NULL,
  `coautor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estatus_articulo_id` int(11) NOT NULL,
  `paises_id` int(11) NOT NULL,
  `rev_publicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `descr_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_articulos`
--

INSERT INTO `reg_articulos` (`id_articulos`, `usuario_id`, `fecha_pub`, `num_volumen`, `titulo_articulo`, `tipo_autor_id`, `autor`, `total_autor`, `posicion_autor`, `coautor`, `estatus_articulo_id`, `paises_id`, `rev_publicacion`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `descr_larga`, `fecha_captura`) VALUES
(1, 1, '2018-07-11', '4', 'kjdbkjdhkjdhk', 2, 'efefefefefef', 4, NULL, 'dfjnjkfkjfhkjfhkfhkjrhkrhkfjhrkfjhrf', 2, 2, 'rkflrlkfjlkrjflkjflkrjlfkjrlkfjlrkfjlr', 19, 4, 17, 'lkrjfjrflkjroifjoirjhforjhofihjrif', '2018-07-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_capitulo`
--

CREATE TABLE `reg_capitulo` (
  `id_capitulos` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_pub` date DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descr_mezclada` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_autor` int(11) NOT NULL,
  `paises_id` int(11) NOT NULL,
  `num_pag` int(11) DEFAULT NULL,
  `num_volumen` int(11) NOT NULL,
  `editores` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `editorial` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `descr_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pal_clave01` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pal_clave02` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_capitulo`
--

INSERT INTO `reg_capitulo` (`id_capitulos`, `usuario_id`, `fecha_pub`, `titulo`, `descr_mezclada`, `tipo_autor_id`, `autor`, `total_autor`, `paises_id`, `num_pag`, `num_volumen`, `editores`, `editorial`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `descr_larga`, `pal_clave01`, `pal_clave02`, `fecha_captura`) VALUES
(1, 1, '2018-07-31', 'grgrgrgrgrrgrgr', 'grgrgrgrgrg', 2, 'rgrgrgrgrgrgrgrg', 4, 1, 1090, 4, 'fvggbgbg,gbgbgbgbgb,gbgbgbgb,gbgbgbgb,gbgbgbg', 'gbgbgbgbgbgbgbgbgbgbggbg', 20, 7, 26, 'gbggbgbgbgbgbmlkgbnkgnbkgnbknkjgnbkgnbknkjgnbgkjnbkjgnbkjgnjbnkgjnbjbngkjbnkjgnbjkgnbkjgnbkjngjkbgnbjkgnbjgnkjgjbnkjgnbkgnbkjngkjbnjgkbnkjgnbkjgnbngkjbnkjgnkjgnbkjgnkjbngkjbnjkgnbkjgnbkjngkbnkgjbnkjgnbkjngkjbnkjgnbkjgnbkjgnbkjngkjbngkjbnkjgnbgkbjngkb', 'tbgbtbtbbttb,tbbtbtbtbtbtb,tbtbtbtbtb,tbtbtbbtb,tbtbtbbt', 'tbgbtbtbbttb,tbbtbtbtbtbtb,tbtbtbtbtb,tbtbtbbtb,tbtbtbbt', '2018-07-05 00:00:00'),
(2, 1, '2018-07-10', 'xfdfdfdfdfdfdfdzfdzfdz', 'cvxcvxvcxv', 2, 'jhvghvhgvhgvhg', 4, 4, 890, 4, 'bcghcgcg', 'jhgfhgvhgfhg', 20, 10, 92, 'vcgcgfdfgcfgc', 'nvcg', 'bvhgvh', '2018-07-05 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_congresos`
--

CREATE TABLE `reg_congresos` (
  `id_congresos` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `anio_publicacion` int(11) NOT NULL,
  `descr_mezcla` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `nombre_organizador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `paises_id` int(11) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_congresos`
--

INSERT INTO `reg_congresos` (`id_congresos`, `usuario_id`, `titulo`, `anio_publicacion`, `descr_mezcla`, `fecha_inicio`, `fecha_final`, `nombre_organizador`, `paises_id`, `fecha_captura`) VALUES
(1, 2, 'LOS VALORES ESTETICOS DE LA FLORA DE MEXICO', 1993, 'PRIMER SIMPOSIO NACIONAL SOBRE PLANTAS NATIVAS DE MEXICO CONPOTENCIAL ORNAMENTAL', '2018-05-31', '2018-06-09', 'UCLA', 6, NULL),
(2, 2, 'rfrfrfrfrfr', 1960, 'rfrfrfrrf', '2018-06-01', '2018-06-06', 'rfrfrfrfrf', 5, '2018-06-12'),
(3, 2, 'etrhthdhrthrthrhrhr', 1961, 'thrrhrrhrhr', '2018-06-07', '2018-05-30', 'rthrhrthtrhtrt', 6, '2018-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_desarrollos_tecnologicos`
--

CREATE TABLE `reg_desarrollos_tecnologicos` (
  `id_desarrollos` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ano_publicacion` date DEFAULT NULL,
  `tipo_autor_id` int(11) DEFAULT NULL,
  `nombre_autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_autor` int(11) DEFAULT NULL,
  `coautores` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `descr_general` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `sector_id` int(11) NOT NULL,
  `nom_institucion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pal_clave` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `paises_id` int(11) NOT NULL,
  `descr_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `economico_id` int(11) NOT NULL,
  `rama_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_desarrollos_tecnologicos`
--

INSERT INTO `reg_desarrollos_tecnologicos` (`id_desarrollos`, `usuario_id`, `titulo`, `ano_publicacion`, `tipo_autor_id`, `nombre_autor`, `total_autor`, `coautores`, `descr_general`, `sector_id`, `nom_institucion`, `pal_clave`, `dependencia_id`, `departamento_id`, `paises_id`, `descr_larga`, `fecha_captura`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `economico_id`, `rama_id`, `clase_id`) VALUES
(1, 1, 'tjkgntkjgnkjtngjtg', '2018-06-06', 2, 'tgtgtgtgtgtg', 5, 'tgtgt', 'gtgtgt', 2, 'tgtgttg', 'tgtg', 2, 0, 2, 'tgtg', '2018-06-19', 20, 8, 50, 2, 16, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_difusion`
--

CREATE TABLE `reg_difusion` (
  `id_difusion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo_difusion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `participacion_id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `dependencia` varchar(255) CHARACTER SET latin1 NOT NULL,
  `facilitadora` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `colaboradores` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `dirigido_id` int(11) NOT NULL,
  `beneficiario` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `extranjero` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `duracion_act` bigint(10) NOT NULL,
  `pal_clave01` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pal_clave02` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pal_clave03` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion_larga` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `material` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_difusion`
--

INSERT INTO `reg_difusion` (`id_difusion`, `usuario_id`, `titulo_difusion`, `participacion_id`, `fecha_inicio`, `dependencia`, `facilitadora`, `colaboradores`, `dirigido_id`, `beneficiario`, `extranjero`, `duracion_act`, `pal_clave01`, `pal_clave02`, `pal_clave03`, `descripcion_larga`, `material`, `fecha_captura`) VALUES
(1, 1, 'djhdjhsjhjshdjhsdjd', 4, '2018-06-06', 'dkksjdkjskdjksdjksjdksd', 'djldjsjdsdlsdjsdj', 'sldjsljsldjsjdlsdl,ljdljljdsdjd,jl,dlsdjddjsdj,ljsdjsldjlsdjlsdjsldjld,lsjdlsdsdjdlsdd', 5, '', 'Si', 6, 'fgffgfgfgf', 'gfgfgfgf', 'fgfgf', 'fgflkgjfgjlkfjgkljfglkjflkjflkgjfkljkljklgj', 'khkjhkjhkj,hhhkhkhhh,hkjhkhkjhkjh,jh,kjhkjhjh,hhhkhkjh', '2018-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_docencia`
--

CREATE TABLE `reg_docencia` (
  `id_docencia` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `entidad_empleadora_id` int(11) NOT NULL,
  `sectores_id` int(11) NOT NULL,
  `institucion_resp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `descr_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `grado_id` int(11) DEFAULT NULL,
  `paises_id` int(11) DEFAULT NULL,
  `programa_aca` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `asignatura` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_docencia`
--

INSERT INTO `reg_docencia` (`id_docencia`, `usuario_id`, `fecha_inicio`, `entidad_empleadora_id`, `sectores_id`, `institucion_resp`, `dependencia_id`, `departamento_id`, `descr_larga`, `fecha_final`, `grado_id`, `paises_id`, `programa_aca`, `asignatura`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `fecha_captura`) VALUES
(1, 1, '2018-07-11', 3, 6, 'UNIVERSIDAD CONTEMPORANEA DE LAS AMERICAS', 14, 0, 'UNIVERSIDAD CONTEMPORANEA DE LAS AMERICAS', '2018-07-11', 6, 146, 'UNIVERSIDAD CONTEMPORANEA DE LAS AMERICAS', 'UNIVERSIDAD CONTEMPORANEA DE LAS AMERICAS', 20, 8, 50, '2018-07-04'),
(2, 1, '2018-07-18', 3, 3, 'EKDJKIEDJKEJDKEJDKJEIKDE', 34, 0, '', '2018-07-17', 6, 7, '', '', 8, 57, 0, '2018-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_experiencia`
--

CREATE TABLE `reg_experiencia` (
  `id_experiencia` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `entidad_id` int(11) NOT NULL,
  `nombre_entidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nom_puesto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `empleador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `paises_id` int(11) NOT NULL,
  `fecha_final` date DEFAULT NULL,
  `descr_experiencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `institucion_resp` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `economico_id` int(11) NOT NULL,
  `rama_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `pal_clave01` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pal_clave02` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pal_clave03` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `sectores_id` int(11) NOT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_experiencia`
--

INSERT INTO `reg_experiencia` (`id_experiencia`, `usuario_id`, `fecha_inicio`, `entidad_id`, `nombre_entidad`, `nom_puesto`, `empleador`, `paises_id`, `fecha_final`, `descr_experiencia`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `institucion_resp`, `dependencia_id`, `departamento_id`, `economico_id`, `rama_id`, `clase_id`, `pal_clave01`, `pal_clave02`, `pal_clave03`, `sectores_id`, `fecha_captura`) VALUES
(1, 1, '2018-07-09', 3, 'UCKA', 'SISTEMAS', 'RODRIGO BUSTOS', 146, '2018-07-31', 'DCNKJDNCKJDNCKDNCKNDKJCNDKJCNKJDNCKJDNCKJDNCKJNDKCJNDJKCNJKDNCJKNDJKCNDKJCNJKDNCKJNDKJNCKJDNCJKDNCKJNKJCNKJDN', 20, 10, 92, 'UCLA', 97, 0, 5, 30, 0, 'DCDCDCDD', 'CDCDCDCDCDC', 'DCDCDCDCDCDC', 2, '2018-07-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_financiamiento`
--

CREATE TABLE `reg_financiamiento` (
  `id_financiamiento` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_apoyo_id` int(11) NOT NULL,
  `tipo_programa_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `palabra_clave_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `palabra_clave_2` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `palabra_clave_3` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_financiamiento`
--

INSERT INTO `reg_financiamiento` (`id_financiamiento`, `usuario_id`, `tipo_apoyo_id`, `tipo_programa_id`, `fecha_inicio`, `fecha_final`, `palabra_clave_1`, `palabra_clave_2`, `palabra_clave_3`, `fecha_captura`) VALUES
(1, 1, 4, 3, '2018-07-20', '2018-07-16', 'ddddd', 'dddddd', 'dddddd', '2018-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_grupos`
--

CREATE TABLE `reg_grupos` (
  `id_grupos` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre_grupo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `es_lider` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `sectores_id` int(11) NOT NULL,
  `institucion_resp` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `nombre_lider` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descr_grupo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `logros` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividades` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `colaboracion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentarios` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_grupos`
--

INSERT INTO `reg_grupos` (`id_grupos`, `usuario_id`, `nombre_grupo`, `es_lider`, `sectores_id`, `institucion_resp`, `dependencia_id`, `departamento_id`, `nombre_lider`, `descr_grupo`, `logros`, `actividades`, `colaboracion`, `comentarios`, `fecha_captura`) VALUES
(1, 1, 'deddedededed', 'SI', 2, 'ededededededeeded', 8, 59, 'edededededed', 'ededededed', 'edededd', 'edededed', 'ededede', 'edededed', '2018-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_idiomas`
--

CREATE TABLE `reg_idiomas` (
  `id_idiomas` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `lenguaje_id` int(11) DEFAULT NULL,
  `idioma_nativo` char(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `traductor` char(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `profesor` char(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel_habla_id` int(11) DEFAULT NULL,
  `nivel_lectura_id` int(11) NOT NULL,
  `nivel_escritura_id` int(11) NOT NULL,
  `fecha_acreditacion` date DEFAULT NULL,
  `titulo_obtenido` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `puntos_idioma` int(11) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_idiomas`
--

INSERT INTO `reg_idiomas` (`id_idiomas`, `usuario_id`, `lenguaje_id`, `idioma_nativo`, `traductor`, `profesor`, `nivel_habla_id`, `nivel_lectura_id`, `nivel_escritura_id`, `fecha_acreditacion`, `titulo_obtenido`, `puntos_idioma`, `fecha_captura`) VALUES
(6, 1, 4, 'Si', 'Si', 'Si', 1, 2, 2, '2018-06-08', 'hvjhfjhfjfj', 89, '2018-06-13'),
(7, 1, 7, '', 'Si', '', 4, 2, 2, '2018-06-15', 'kgkl', 98, '2018-06-13'),
(8, 1, 4, 'Si', 'Si', 'Si', 2, 3, 4, '2018-06-29', 'gyhgggdsg', 56, '2018-06-13'),
(9, 1, 0, '', '', '', 0, 0, 0, '0000-00-00', '', 0, '2018-06-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_investigacion`
--

CREATE TABLE `reg_investigacion` (
  `id_investigacion` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date NOT NULL,
  `entidad_empleadora_id` int(11) DEFAULT NULL,
  `nombre_ent` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descrp_entidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sector_estancia_id` int(11) DEFAULT NULL,
  `institucion_empleadora` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `dependencia_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `descrp_estancia` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_investigacion`
--

INSERT INTO `reg_investigacion` (`id_investigacion`, `usuario_id`, `fecha_inicio`, `fecha_fin`, `entidad_empleadora_id`, `nombre_ent`, `descrp_entidad`, `sector_estancia_id`, `institucion_empleadora`, `dependencia_id`, `departamento_id`, `descrp_estancia`, `fecha_captura`) VALUES
(1, 1, '2018-06-01', '2018-06-30', 3, 'UCLA', 'EDJKEKJDHJEHDKJEHDKJHEKJDHEKJHDKJEHDKJEJKDHKJEHDKJEHDKJEHKDJHEKJDHKJEDHKJEHDKJHEDKHEKJHDKJEHDKJEHDKJHEKJDHKJEHDKJEHDKJHEJKDHKJEHDKJEHDKJHEKJDHEKJDHKJE', 6, '', 2, 0, 'EDJKEKJDHJEHDKJEHDKJHEKJDHEKJHDKJEHDKJEJKDHKJEHDKJEHDKJEHKDJHEKJDHKJEDHKJEHDKJHEDKHEKJHDKJEHDKJEHDKJHEKJDHKJEHDKJEHDKJHEJKDHKJEHDKJEHDKJHEKJDHEKJDHKJEEDJKEKJDHJEHDKJEHDKJHEKJDHEKJHDKJEHDKJEJKDHKJEHDKJEHDKJEHKDJHEKJDHKJEDHKJEHDKJHEDKHEKJHDKJEHDKJEHDKJ', '2018-06-18'),
(2, 1, '2018-06-01', '2018-06-29', 1, '', '', 6, '', 2, 0, '', '2018-06-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_libros`
--

CREATE TABLE `reg_libros` (
  `id_libros` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `isbn` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo_libro` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_pub` date NOT NULL,
  `tipo_libro_id` int(11) NOT NULL,
  `tipo_autor_id` int(5) NOT NULL,
  `autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `total_autor` int(11) NOT NULL,
  `paises_id` int(11) NOT NULL,
  `num_volumen` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_pag` int(11) NOT NULL,
  `editores` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `editorial` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `lenguaje_id` int(11) NOT NULL,
  `descr_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_libros`
--

INSERT INTO `reg_libros` (`id_libros`, `usuario_id`, `isbn`, `titulo_libro`, `fecha_pub`, `tipo_libro_id`, `tipo_autor_id`, `autor`, `total_autor`, `paises_id`, `num_volumen`, `num_pag`, `editores`, `editorial`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `lenguaje_id`, `descr_larga`, `fecha_captura`) VALUES
(2, 1, 'vfvfv998989', 'fvjvnkfvkjfkjvfkjvhkjfv', '2018-07-17', 3, 3, 'kvflkvklfvlkfvlkflvjfkmfkv', 5, 2, '6', 6, 'fv,mfnvnvjkfnkvjnfkjvnfkvnkfjvnkfnvkfnvjfnvkfnkv', 'fvlkvjhkfjvkjvklfjvlkjflkvjfklvjflkvjflkjlkvjlkfjlkv', 20, 9, 77, 3, 'fjkfjvkfjkvjfvkjfkvhjfkjvhkjfhvkjfhkjfhkjhfvkjhfkvjhf', '2018-07-10'),
(3, 1, '', '', '0000-00-00', 0, 2, 'kfjkjfkrjfkrjfkrjfkjrkfjrkfrkfjkrjfkrjfkr', 0, 0, '', 4, '', '', 0, 0, 0, 0, '', '2018-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_patente`
--

CREATE TABLE `reg_patente` (
  `id_patente` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `num_registro` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_patente_id` int(11) NOT NULL,
  `nombre_patente` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descr_patente` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `total_autor` int(11) NOT NULL,
  `coautor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descr_beneficiarios` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `paises_id` int(11) NOT NULL,
  `anio_publicacion` year(4) NOT NULL,
  `economico_id` int(11) NOT NULL,
  `rama_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `descripcion_detallada` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_patente`
--

INSERT INTO `reg_patente` (`id_patente`, `usuario_id`, `num_registro`, `tipo_patente_id`, `nombre_patente`, `descr_patente`, `tipo_autor_id`, `total_autor`, `coautor`, `descr_beneficiarios`, `paises_id`, `anio_publicacion`, `economico_id`, `rama_id`, `clase_id`, `descripcion_detallada`, `fecha_captura`) VALUES
(1, 1, '4f4f4frffrf', 0, 'rfrffr', 'frfrfrrf', 3, 44, 'frfrfrf', 'rfrfrfr', 2, 2010, 3, 21, 88, 'rfrfrfrfrfr', '2018-07-13'),
(2, 1, 'efrfrf5t5tt5', 3, 'ggtgtgt', 'tgtgtg', 2, 6, 'gtggtg', 'gtgtgtgt', 2, 2010, 5, 35, 0, 'frfrfrfrf', '2018-07-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_proyectos`
--

CREATE TABLE `reg_proyectos` (
  `id_proyectos` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `tipo_proyecto_id` int(11) NOT NULL,
  `entidad_empleadora_id` int(11) NOT NULL,
  `nombre_proyecto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `institucion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sector_id` int(11) NOT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `finalidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `economico_id` int(11) NOT NULL,
  `rama_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `descripcion_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_proyectos`
--

INSERT INTO `reg_proyectos` (`id_proyectos`, `usuario_id`, `fecha_inicio`, `fecha_final`, `tipo_proyecto_id`, `entidad_empleadora_id`, `nombre_proyecto`, `institucion`, `sector_id`, `dependencia_id`, `departamento_id`, `finalidad`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `economico_id`, `rama_id`, `clase_id`, `descripcion_larga`, `fecha_captura`) VALUES
(1, 1, '2018-07-09', '2018-07-25', 3, 1, 'efeflekflkefjlkefef', 'kejflkjelkfjelkjflkejflke', 3, 27, 0, 'efefefefefefef', 20, 7, 32, 5, 30, 0, 'efelkjflkejfkljefljelkfe', '2018-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_reconocimientos`
--

CREATE TABLE `reg_reconocimientos` (
  `id_reconocimientos` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `anio_reconocimiento` date NOT NULL,
  `inst_otorga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `paises_id` int(11) DEFAULT NULL,
  `dependencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_reconocimientos`
--

INSERT INTO `reg_reconocimientos` (`id_reconocimientos`, `usuario_id`, `descripcion`, `anio_reconocimiento`, `inst_otorga`, `paises_id`, `dependencia`, `fecha_captura`) VALUES
(1, 1, 'fvfvfvfvfv', '0000-00-00', 'vfvfvfvf', 6, 'vfvfvfvfv', '2018-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_reporte_tecnico`
--

CREATE TABLE `reg_reporte_tecnico` (
  `id_reporte` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo_reporte` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_entidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descr_general` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_pag` int(11) NOT NULL,
  `fecha_reporte` date NOT NULL,
  `autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_autores` int(11) NOT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `descipcion_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_reporte_tecnico`
--

INSERT INTO `reg_reporte_tecnico` (`id_reporte`, `usuario_id`, `titulo_reporte`, `nombre_entidad`, `descr_general`, `num_pag`, `fecha_reporte`, `autor`, `total_autores`, `tipo_autor_id`, `descipcion_larga`, `fecha_captura`) VALUES
(1, 1, 'jkdfhkjdfhkdhfkjdhfkdh', 'djfhkjdfhkjdhfkjdhfkjhdfkjhd', 'dfkdjfhkjdhfkjdhfkjdhfkj', 5, '2018-07-09', 'fgfgjkfgvhhkjhgkjhfkjhfkjvh', 5, 2, 'lkfvnlkjvjkfvjlkfjvkf', '2018-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_resenas`
--

CREATE TABLE `reg_resenas` (
  `id_resena` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_pub` date NOT NULL,
  `tipo_autor_id` int(11) NOT NULL,
  `autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `total_autores` int(11) NOT NULL,
  `paises_id` int(11) NOT NULL,
  `tipo_publicacion_id` int(11) NOT NULL,
  `comentarios` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `pag_inicio` int(11) NOT NULL,
  `pag_final` int(11) NOT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `descripcion_larga` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_resenas`
--

INSERT INTO `reg_resenas` (`id_resena`, `usuario_id`, `titulo`, `fecha_pub`, `tipo_autor_id`, `autor`, `total_autores`, `paises_id`, `tipo_publicacion_id`, `comentarios`, `pag_inicio`, `pag_final`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `descripcion_larga`, `fecha_captura`) VALUES
(1, 1, 'fnjkrkrhkfhrkfhrkjfhkrjhfkjrhf', '2018-07-10', 2, 'rjkhfkjrhfkjrhfkhrkfjhrkfhkrjhf', 4, 4, 4, 'gkjghkrjhgkjrghkrjghkjrghkjrhgkjgr', 0, 4, 20, 8, 50, 'hkgjhrkghkrhgkrhgkhrkghkrgh', '2018-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_rim`
--

CREATE TABLE `reg_rim` (
  `id_rim` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `num_rim` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `status_rim` tinyint(1) NOT NULL,
  `fecha_aprobacion` date NOT NULL,
  `fecha_vigencia` date NOT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_rim`
--

INSERT INTO `reg_rim` (`id_rim`, `usuario_id`, `num_rim`, `status_rim`, `fecha_aprobacion`, `fecha_vigencia`, `fecha_captura`) VALUES
(1, 1, 'AAGA86HLMAT0', 4, '0000-00-00', '0000-00-00', '2018-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_tesis`
--

CREATE TABLE `reg_tesis` (
  `id_tesis` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_final` date NOT NULL,
  `autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `grado_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `paises_id` int(11) NOT NULL,
  `entidad_empleadora_id` int(11) NOT NULL,
  `sectores_id` int(11) NOT NULL,
  `institucion_resp` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `dependencia_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `campos_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `subdisciplina_id` int(11) NOT NULL,
  `conclusion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo_tesis` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_captura` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reg_tesis`
--

INSERT INTO `reg_tesis` (`id_tesis`, `usuario_id`, `fecha_final`, `autor`, `grado_id`, `fecha_inicio`, `paises_id`, `entidad_empleadora_id`, `sectores_id`, `institucion_resp`, `dependencia_id`, `departamento_id`, `campos_id`, `disciplina_id`, `subdisciplina_id`, `conclusion`, `titulo_tesis`, `fecha_captura`) VALUES
(1, 1, '2018-07-19', 'JOEL ALVAREZ', 4, '2018-07-18', 3, 3, 3, 'KEJDKJDKEJDKJEDKJEKDJEKDJE', 0, 96, 20, 7, 26, 'SI', 'kejfkjfkejfkjefkjekfjekfjkejfkejfkejfkejfkejkjekf', '2018-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(5) NOT NULL,
  `nombre_rol` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Super Admin'),
(2, 'Jefe de Departamento'),
(3, 'Investigador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `descr_sector` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sector`, `descr_sector`, `descripcion`) VALUES
(1, 'NO ESPECIFICADO', 'NO ESPECIFICADO'),
(2, 'GOBIERNO FEDERAL CENTRALIZADO', 'INSTITUCIONES DEL SECTOR GOBIERNO FEDERAL CENTRALIZADO'),
(3, 'ENTIDADES PARAESTATALES', 'INSTITUCIONES DEL SECTOR ENTIDADES PARAESTATALES'),
(4, 'GOB. DE LAS ENT. FEDERATIVAS', 'INSTITUCIONES DEL SECTOR GOBIERNO DE LAS ENTIDADES FEDERATIVAS'),
(5, 'INST. DE EDU. SUP. PUBLICAS', 'INSTITUCIONES DEL SECTOR DE EDUCACION SUPERIOR PUBLICAS'),
(6, 'INST. DE EDU. SUP. PRIVADAS', 'INSTITUCIONES DEL SECTOR DE EDUCACION SUPERIOR PRIVADAS'),
(7, 'EMPRESAS PRODUCTIVAS', 'INSTITUCIONES DEL SECTOR PRIVADO DE EMPRESAS PRODUCTIVAS (ADIAT)'),
(8, 'ENTIDADES NO LUCRATIVAS', 'INSTITUCIONES DEL SECTOR DE ENTIDADES NO LUCRATIVAS'),
(9, 'ENTIDADES EXTERNAS', 'INSTITUCIONES DEL SECTOR DE ENTIDADES EXTERNAS'),
(10, 'CONSULTORAS ', 'CONSULTORAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_economico`
--

CREATE TABLE `sector_economico` (
  `id_economico` int(11) NOT NULL,
  `descr_economico` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector_economico`
--

INSERT INTO `sector_economico` (`id_economico`, `descr_economico`) VALUES
(1, 'NO DEFINIDA'),
(2, 'AGRICULTURA GANADERIA APROVECHAMIENTO FORESTAL PESCA Y CAZA'),
(3, 'MINERIA'),
(4, 'ELECTRICIDAD AGUA Y SUMINISTRO DE GAS POR DUCTOS AL CONSUMIDOR FINAL'),
(5, 'CONSTRUCCION'),
(6, 'INDUSTRIAS MANUFACTURERAS'),
(7, 'COMERCIO AL POR MAYOR'),
(8, 'COMERCIO AL POR MENOR'),
(9, 'TRANSPORTES CORREOS Y ALMACENAMIENTO'),
(10, 'INFORMACION EN MEDIOS MASIVOS'),
(11, 'SERVICIOS FINANCIEROS Y DE SEGUROS'),
(12, 'SERVICIOS INMOBILIARIOS Y DE ALQUILER DE BIENES MUEBLES E INTANGIBLES'),
(13, 'SERVICIOS PROFESIONALES CIENTIFICOS Y TECNICOS'),
(14, 'DIRECCION DE CORPORATIVOS Y EMPRESAS'),
(15, 'SERVICIOS DE APOYO A LOS NEGOCIOS Y MANEJO DE DESECHOS Y SERVICIOS DE REMEDIACION'),
(16, 'SERVICIOS EDUCATIVOS'),
(17, 'SERVICIOS DE SALUD Y DE ASISTENCIA SOCIAL'),
(18, 'SERVICIOS DE ESPARCIMIENTO CULTURALES Y DEPORTIVOS Y OTROS SERVICIOS RECREATIVOS'),
(19, 'SERVICIOS DE ALOJAMIENTO TEMPORAL Y DE PREPARACION DE ALIMENTOS Y BEBIDAS'),
(20, 'OTROS SERVICIOS EXCEPTO ACTIVIDADES DEL GOBIERNO'),
(21, 'ACTIVIDADES DEL GOBIERNO Y DE ORGANISMOS INTERNACIONALES Y EXTRATERRITORIALES'),
(22, 'NO DEFINIDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_sni`
--

CREATE TABLE `status_sni` (
  `id_sni` int(11) NOT NULL,
  `nombre_sni` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `opcion_sni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `status_sni`
--

INSERT INTO `status_sni` (`id_sni`, `nombre_sni`, `opcion_sni`) VALUES
(1, 'En trámite', 1),
(2, 'Cándidatos', 1),
(3, 'SNI 1', 1),
(4, 'SNI 2', 1),
(5, 'SNI 3', 1),
(6, 'SNI Emérito', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subdisciplinas`
--

CREATE TABLE `subdisciplinas` (
  `id_subdisciplinas` int(11) NOT NULL,
  `descr_subdisciplinas` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subdisciplinas`
--

INSERT INTO `subdisciplinas` (`id_subdisciplinas`, `descr_subdisciplinas`, `disciplina_id`) VALUES
(1, 'ANALOGIA', 2),
(2, 'ALGEBRA DE BOOLE', 2),
(3, 'LOGICA FORMAL', 2),
(4, 'LENGUAJES FORMALIZADOS', 2),
(5, 'SISTEMAS FORMALES', 2),
(6, 'FUNDAMENTOS DE MATEMATICAS', 2),
(7, 'GENERALIZACION', 2),
(8, 'LOGICA MATEMATICA', 2),
(9, 'LOGICA MODAL', 2),
(10, 'TEORIA DE MODELOS', 2),
(11, 'TEORIA DE PRUEBAS', 2),
(12, 'CALCULO PROPOSICIONAL', 2),
(13, 'FUNCIONES RECURSIVAS', 2),
(14, 'LOGICA SIMBOLICA', 2),
(15, 'TEORIA DE LENGUAJES FORMALES', 2),
(16, 'OTRAS', 2),
(17, 'INDUCCION', 4),
(18, 'INTUICIONISMO', 4),
(19, 'PROBABILIDAD', 4),
(20, 'OTROS', 4),
(21, 'METODO CIENTIFICO', 5),
(22, 'OTRAS', 5),
(23, 'GEOMETRIA ALGEBRAICA', 7),
(24, 'TEORIA AXIOMATICA DE CONJUNTOS', 7),
(25, 'TEORIA DE CATEGORIAS', 7),
(26, 'ALGEBRA DIFERENCIAL', 7),
(27, 'CAMPOS ANILLOS ALGEBRAS', 7),
(28, 'GRUPOS GENERALIDADES', 7),
(29, 'ALGEBRA HOMOLOGICA', 7),
(30, 'RETICULOS', 7),
(31, 'ALGEBRA DE LIE', 7),
(32, 'ALGEBRA LINEAL', 7),
(33, 'TEORIA DE MATRICES', 7),
(34, 'ALGEBRAS NO ASOCIATIVAS', 7),
(35, 'POLINOMIOS', 7),
(36, 'TEORIA DE LA REPRESENTACION', 7),
(37, 'OTRAS', 7),
(38, 'ALGEBRA DE OPERADOR', 8),
(39, 'TEORIA DE LA APROXIMACION', 8),
(40, 'ALGEBRAS Y ESPACIOS BANACH', 8),
(41, 'CALCULO DE VARIACION', 8),
(42, 'ANALISIS COMBINATOR', 8),
(43, 'CONVEXIDAD DESIGUALDADES', 8),
(44, 'ECUACIONES EN DIFERENCIAS', 8),
(45, 'ECUACIONES FUNCIONA', 8),
(46, 'FUNCIONES DE UNA VARIABLE COMPLEJA', 8),
(47, 'FUNCIONES DE VARIABLES REALES', 8),
(48, 'FUNCIONES DE VARIAS VARIABLES COMPLEJAS', 8),
(49, 'ANALISIS GLOBAL', 8),
(50, 'ANALISIS ARMONICO', 8),
(51, 'ESPACIOS DE HILBERT', 8),
(52, 'ECUACIONES INTEGRALES', 8),
(53, 'TRANSFORMACIONES INTEGRALES', 8),
(54, 'MEDIDA INTEGRACION AREA', 8),
(55, 'CALCULO OPERACIONAL', 8),
(56, 'ECUACIONES DIFERENCIALES ORDINARIAS', 8),
(57, 'ECUACIONES DIFERENCIALES PARCIALES', 8),
(58, 'TEORIA DE POTENCIAL', 8),
(59, 'SERIES SUMABILIDAD', 8),
(60, 'FUNCIONES ESPECIALES', 8),
(61, 'FUNCIONES SUBARMONICAS', 8),
(62, 'ESPACIOS LINEALES TOPOLOGICOS', 8),
(63, 'SERIES E INTEGRALES TRIGONOMETRICAS', 8),
(64, 'OTRAS', 8),
(65, 'CONTABILIDAD', 9),
(66, 'LENGUAJES ALGORITMICOS', 9),
(67, 'COMPUTACION ANALOGICA', 9),
(68, 'INTELIGENCIA ARTIFICIAL', 9),
(69, 'SISTEMAS DE PRODUCCION AUTOMATICA', 9),
(70, 'SISTEMAS AUTOMATICOS DE CONTROL DE CALIDAD', 9),
(71, 'MODELIZACION CAUSAL', 9),
(72, 'CODIGOS Y SISTEMAS DE CODIFICACION', 9),
(73, 'DISE?O CON AYUDA DE COMPUTADOR', 9),
(74, 'ENSE?ANZA CON AYUDA DE COMPUTADOR', 9),
(75, 'SOPORTE LOGICO DE COMPUTADORES', 9),
(76, 'BANCOS DE DATOS', 9),
(77, 'COMPUTACION DIGITAL', 9),
(78, 'SISTEMAS DE CONTROL AMBIENTAL', 9),
(79, 'HEURISTICA', 9),
(80, 'COMPUTACION HIBRIDA', 9),
(81, 'INFORMATICA', 9),
(82, 'SISTEMAS DE INFORMACION; DISE?O Y COMPONENTES', 9),
(83, 'CONTROL DE INVENTARIO', 9),
(84, 'SISTEMAS DE CONTROL MEDICO', 9),
(85, 'SISTEMAS DE NAVEGACION DE TELEMETRIA Y ESPACIAL', 9),
(86, 'SISTEMAS DE CONTROL DE PRODUCCION', 9),
(87, 'LENGUAJES DE PROGRAMACION', 9),
(88, 'TEORIA DE LA PROGRAMACION', 9),
(89, 'DISE?O DE SISTEMAS DE SENSORES', 9),
(90, 'SIMULACION', 9),
(91, 'OTROS', 9),
(92, 'GEOMETRIA AFIN', 10),
(93, 'VARIEDADES COMPLEJAS', 10),
(94, 'DOMINIOS CONVEXOS', 10),
(95, 'GEOMETRIA DIFERENCIAL', 10),
(96, 'PROBLEMAS DE EXTREMO', 10),
(97, 'GEOMETRIA EUCLIDIANA', 10),
(98, 'GEOMETRIAS INFINITAS', 10),
(99, 'FUNDAMENTOS', 10),
(100, 'GEOMETRIAS NO EUCLIDIANAS', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_apoyo`
--

CREATE TABLE `tipo_apoyo` (
  `id_tipo_apoyo` int(11) NOT NULL,
  `nombre_apoyo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_apoyo`
--

INSERT INTO `tipo_apoyo` (`id_tipo_apoyo`, `nombre_apoyo`) VALUES
(1, 'No definido'),
(2, 'Desarrollo Tecnológico'),
(3, 'Formación Acádemica'),
(4, 'Proyecto Científico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_autor`
--

CREATE TABLE `tipo_autor` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_autor`
--

INSERT INTO `tipo_autor` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'No definido'),
(2, 'Autor Principal'),
(3, 'Coautor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `id_tipo_libro` int(11) NOT NULL,
  `nombre_libro` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_libro`
--

INSERT INTO `tipo_libro` (`id_tipo_libro`, `nombre_libro`) VALUES
(1, 'No definido'),
(2, 'Compilación'),
(3, 'Editado'),
(4, 'Publicado'),
(5, 'Traducido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_participacion`
--

CREATE TABLE `tipo_participacion` (
  `id_tipo_participacion` int(11) NOT NULL,
  `nombre_participacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_participacion`
--

INSERT INTO `tipo_participacion` (`id_tipo_participacion`, `nombre_participacion`) VALUES
(1, 'No definido'),
(2, 'Conferencias'),
(3, 'Demostraciones'),
(4, 'Ferias Científicas y Tecnológicas'),
(5, 'Ferias Empresariales'),
(6, 'Radio'),
(7, 'Revistas de Divulgación'),
(8, 'Simposium'),
(9, 'Talleres'),
(10, 'Teatro'),
(11, 'Televisón'),
(12, 'Vídeos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_patente`
--

CREATE TABLE `tipo_patente` (
  `id_tipo_patente` int(11) NOT NULL,
  `nombre_tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_patente`
--

INSERT INTO `tipo_patente` (`id_tipo_patente`, `nombre_tipo`) VALUES
(1, 'Mejora'),
(2, 'Adaptacion Tecnologica'),
(3, 'Innovacion'),
(4, 'No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_programa`
--

CREATE TABLE `tipo_programa` (
  `id_tipo_programa` int(11) NOT NULL,
  `nombre_programa` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_programa`
--

INSERT INTO `tipo_programa` (`id_tipo_programa`, `nombre_programa`) VALUES
(1, 'Fondo Sectorial'),
(2, 'Beca'),
(3, 'Estimulo Fiscal'),
(4, 'Catedras'),
(5, 'Estimulo SNI'),
(6, 'Avance'),
(7, 'Catedras Patrimoniales'),
(8, 'Repatriacion/Consolidacion'),
(9, 'Fondo Ciencia Basica'),
(10, 'Fondo Mixto'),
(11, 'No definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE `tipo_proyecto` (
  `id_tipo_proyecto` int(11) NOT NULL,
  `nombre_tipo_proyecto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_proyecto`
--

INSERT INTO `tipo_proyecto` (`id_tipo_proyecto`, `nombre_tipo_proyecto`) VALUES
(1, 'No definido'),
(2, 'Consultoría'),
(3, 'Investigación'),
(4, 'Planes de Negocio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicacion`
--

CREATE TABLE `tipo_publicacion` (
  `id_tipo_publicacion` int(11) NOT NULL,
  `nombre_publicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_publicacion`
--

INSERT INTO `tipo_publicacion` (`id_tipo_publicacion`, `nombre_publicacion`) VALUES
(1, 'No definido'),
(2, 'Sin definir'),
(3, 'Critica'),
(4, 'Informativa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_paterno` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `a_materno` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `curp` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `edad` text COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` int(5) DEFAULT NULL,
  `nacionalidad` int(5) DEFAULT NULL,
  `correo_laboral` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_personal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_lab` text COLLATE utf8_unicode_ci,
  `tel_part` text COLLATE utf8_unicode_ci,
  `tel_cel` text COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  `numero_dom` text COLLATE utf8_unicode_ci NOT NULL,
  `colonia` text COLLATE utf8_unicode_ci,
  `cp` text COLLATE utf8_unicode_ci,
  `pais_id` int(5) DEFAULT NULL,
  `estado_id` int(5) DEFAULT NULL,
  `municipio_id` int(5) DEFAULT NULL,
  `localidad` mediumtext COLLATE utf8_unicode_ci,
  `estado_sni` int(5) DEFAULT NULL,
  `num_rim` text COLLATE utf8_unicode_ci,
  `sexo_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(5) DEFAULT NULL,
  `mailing` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_recovery` int(11) DEFAULT NULL,
  `status_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `a_paterno`, `a_materno`, `rfc`, `curp`, `fecha_nac`, `edad`, `estado_civil`, `nacionalidad`, `correo_laboral`, `correo_personal`, `tel_lab`, `tel_part`, `tel_cel`, `direccion`, `numero_dom`, `colonia`, `cp`, `pais_id`, `estado_id`, `municipio_id`, `localidad`, `estado_sni`, `num_rim`, `sexo_id`, `rol_id`, `mailing`, `username`, `password`, `update_recovery`, `status_id`) VALUES
(1, 'Abraham Joel', 'Álvarez', 'García', 'AAGA860316KD2', 'AAGA860316HMNLRB09', '2018-06-16', '32', 1, 282, 'informatica.cecti@gmail.com', 'softcodec@gmail.com', '3140482', '3156139', '2147483647', 'curtidores de teremendo', '250', 'Eréndira', '58240', 146, 16, 835, 'Morelia', 5, 'AAGA86HLMAT0', 'H', 3, 'NO', 'joel', 'be9b16e50121a086f9e35698d839dd9c3cd7e27b', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_conocimiento`
--
ALTER TABLE `area_conocimiento`
  ADD PRIMARY KEY (`id_area_conocimiento`);

--
-- Indices de la tabla `campo_conocimiento`
--
ALTER TABLE `campo_conocimiento`
  ADD PRIMARY KEY (`id_conocimiento`);

--
-- Indices de la tabla `clase_economica`
--
ALTER TABLE `clase_economica`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamentos`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencias`);

--
-- Indices de la tabla `dirigido_sector`
--
ALTER TABLE `dirigido_sector`
  ADD PRIMARY KEY (`id_dirigido_sector`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Indices de la tabla `empleadoras`
--
ALTER TABLE `empleadoras`
  ADD PRIMARY KEY (`id_empleadoras`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_civil`);

--
-- Indices de la tabla `estatus_articulo`
--
ALTER TABLE `estatus_articulo`
  ADD PRIMARY KEY (`id_estatus_articulos`);

--
-- Indices de la tabla `estatus_grado`
--
ALTER TABLE `estatus_grado`
  ADD PRIMARY KEY (`id_est_grado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `lenguaje`
--
ALTER TABLE `lenguaje`
  ADD PRIMARY KEY (`id_lenguaje`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id_nacionalidad`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_niveles`);

--
-- Indices de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  ADD PRIMARY KEY (`id_nivel_academico`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_paises`);

--
-- Indices de la tabla `rama_economica`
--
ALTER TABLE `rama_economica`
  ADD PRIMARY KEY (`id_rama`);

--
-- Indices de la tabla `reg_academica`
--
ALTER TABLE `reg_academica`
  ADD PRIMARY KEY (`id_academica`);

--
-- Indices de la tabla `reg_adscripciones`
--
ALTER TABLE `reg_adscripciones`
  ADD PRIMARY KEY (`id_adscripcion`);

--
-- Indices de la tabla `reg_articulos`
--
ALTER TABLE `reg_articulos`
  ADD PRIMARY KEY (`id_articulos`);

--
-- Indices de la tabla `reg_capitulo`
--
ALTER TABLE `reg_capitulo`
  ADD PRIMARY KEY (`id_capitulos`);

--
-- Indices de la tabla `reg_congresos`
--
ALTER TABLE `reg_congresos`
  ADD PRIMARY KEY (`id_congresos`);

--
-- Indices de la tabla `reg_desarrollos_tecnologicos`
--
ALTER TABLE `reg_desarrollos_tecnologicos`
  ADD PRIMARY KEY (`id_desarrollos`);

--
-- Indices de la tabla `reg_difusion`
--
ALTER TABLE `reg_difusion`
  ADD PRIMARY KEY (`id_difusion`);

--
-- Indices de la tabla `reg_docencia`
--
ALTER TABLE `reg_docencia`
  ADD PRIMARY KEY (`id_docencia`);

--
-- Indices de la tabla `reg_experiencia`
--
ALTER TABLE `reg_experiencia`
  ADD PRIMARY KEY (`id_experiencia`);

--
-- Indices de la tabla `reg_financiamiento`
--
ALTER TABLE `reg_financiamiento`
  ADD PRIMARY KEY (`id_financiamiento`);

--
-- Indices de la tabla `reg_grupos`
--
ALTER TABLE `reg_grupos`
  ADD PRIMARY KEY (`id_grupos`);

--
-- Indices de la tabla `reg_idiomas`
--
ALTER TABLE `reg_idiomas`
  ADD PRIMARY KEY (`id_idiomas`);

--
-- Indices de la tabla `reg_investigacion`
--
ALTER TABLE `reg_investigacion`
  ADD PRIMARY KEY (`id_investigacion`);

--
-- Indices de la tabla `reg_libros`
--
ALTER TABLE `reg_libros`
  ADD PRIMARY KEY (`id_libros`);

--
-- Indices de la tabla `reg_patente`
--
ALTER TABLE `reg_patente`
  ADD PRIMARY KEY (`id_patente`);

--
-- Indices de la tabla `reg_proyectos`
--
ALTER TABLE `reg_proyectos`
  ADD PRIMARY KEY (`id_proyectos`);

--
-- Indices de la tabla `reg_reconocimientos`
--
ALTER TABLE `reg_reconocimientos`
  ADD PRIMARY KEY (`id_reconocimientos`);

--
-- Indices de la tabla `reg_reporte_tecnico`
--
ALTER TABLE `reg_reporte_tecnico`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `reg_resenas`
--
ALTER TABLE `reg_resenas`
  ADD PRIMARY KEY (`id_resena`);

--
-- Indices de la tabla `reg_rim`
--
ALTER TABLE `reg_rim`
  ADD PRIMARY KEY (`id_rim`);

--
-- Indices de la tabla `reg_tesis`
--
ALTER TABLE `reg_tesis`
  ADD PRIMARY KEY (`id_tesis`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `sector_economico`
--
ALTER TABLE `sector_economico`
  ADD PRIMARY KEY (`id_economico`);

--
-- Indices de la tabla `status_sni`
--
ALTER TABLE `status_sni`
  ADD PRIMARY KEY (`id_sni`);

--
-- Indices de la tabla `subdisciplinas`
--
ALTER TABLE `subdisciplinas`
  ADD PRIMARY KEY (`id_subdisciplinas`);

--
-- Indices de la tabla `tipo_apoyo`
--
ALTER TABLE `tipo_apoyo`
  ADD PRIMARY KEY (`id_tipo_apoyo`);

--
-- Indices de la tabla `tipo_autor`
--
ALTER TABLE `tipo_autor`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  ADD PRIMARY KEY (`id_tipo_libro`);

--
-- Indices de la tabla `tipo_participacion`
--
ALTER TABLE `tipo_participacion`
  ADD PRIMARY KEY (`id_tipo_participacion`);

--
-- Indices de la tabla `tipo_patente`
--
ALTER TABLE `tipo_patente`
  ADD PRIMARY KEY (`id_tipo_patente`);

--
-- Indices de la tabla `tipo_programa`
--
ALTER TABLE `tipo_programa`
  ADD PRIMARY KEY (`id_tipo_programa`);

--
-- Indices de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  ADD PRIMARY KEY (`id_tipo_proyecto`);

--
-- Indices de la tabla `tipo_publicacion`
--
ALTER TABLE `tipo_publicacion`
  ADD PRIMARY KEY (`id_tipo_publicacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_conocimiento`
--
ALTER TABLE `area_conocimiento`
  MODIFY `id_area_conocimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `campo_conocimiento`
--
ALTER TABLE `campo_conocimiento`
  MODIFY `id_conocimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `clase_economica`
--
ALTER TABLE `clase_economica`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `dirigido_sector`
--
ALTER TABLE `dirigido_sector`
  MODIFY `id_dirigido_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `empleadoras`
--
ALTER TABLE `empleadoras`
  MODIFY `id_empleadoras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estatus_articulo`
--
ALTER TABLE `estatus_articulo`
  MODIFY `id_estatus_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estatus_grado`
--
ALTER TABLE `estatus_grado`
  MODIFY `id_est_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lenguaje`
--
ALTER TABLE `lenguaje`
  MODIFY `id_lenguaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2486;

--
-- AUTO_INCREMENT de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  MODIFY `id_nacionalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_niveles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  MODIFY `id_nivel_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_paises` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `rama_economica`
--
ALTER TABLE `rama_economica`
  MODIFY `id_rama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `reg_academica`
--
ALTER TABLE `reg_academica`
  MODIFY `id_academica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_adscripciones`
--
ALTER TABLE `reg_adscripciones`
  MODIFY `id_adscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_articulos`
--
ALTER TABLE `reg_articulos`
  MODIFY `id_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_capitulo`
--
ALTER TABLE `reg_capitulo`
  MODIFY `id_capitulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reg_congresos`
--
ALTER TABLE `reg_congresos`
  MODIFY `id_congresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reg_desarrollos_tecnologicos`
--
ALTER TABLE `reg_desarrollos_tecnologicos`
  MODIFY `id_desarrollos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_difusion`
--
ALTER TABLE `reg_difusion`
  MODIFY `id_difusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_docencia`
--
ALTER TABLE `reg_docencia`
  MODIFY `id_docencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reg_experiencia`
--
ALTER TABLE `reg_experiencia`
  MODIFY `id_experiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_financiamiento`
--
ALTER TABLE `reg_financiamiento`
  MODIFY `id_financiamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_grupos`
--
ALTER TABLE `reg_grupos`
  MODIFY `id_grupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_idiomas`
--
ALTER TABLE `reg_idiomas`
  MODIFY `id_idiomas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reg_investigacion`
--
ALTER TABLE `reg_investigacion`
  MODIFY `id_investigacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reg_libros`
--
ALTER TABLE `reg_libros`
  MODIFY `id_libros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reg_patente`
--
ALTER TABLE `reg_patente`
  MODIFY `id_patente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reg_proyectos`
--
ALTER TABLE `reg_proyectos`
  MODIFY `id_proyectos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_reconocimientos`
--
ALTER TABLE `reg_reconocimientos`
  MODIFY `id_reconocimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_reporte_tecnico`
--
ALTER TABLE `reg_reporte_tecnico`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_resenas`
--
ALTER TABLE `reg_resenas`
  MODIFY `id_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_rim`
--
ALTER TABLE `reg_rim`
  MODIFY `id_rim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reg_tesis`
--
ALTER TABLE `reg_tesis`
  MODIFY `id_tesis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sector_economico`
--
ALTER TABLE `sector_economico`
  MODIFY `id_economico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `status_sni`
--
ALTER TABLE `status_sni`
  MODIFY `id_sni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subdisciplinas`
--
ALTER TABLE `subdisciplinas`
  MODIFY `id_subdisciplinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `tipo_apoyo`
--
ALTER TABLE `tipo_apoyo`
  MODIFY `id_tipo_apoyo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_autor`
--
ALTER TABLE `tipo_autor`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_libro`
--
ALTER TABLE `tipo_libro`
  MODIFY `id_tipo_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_participacion`
--
ALTER TABLE `tipo_participacion`
  MODIFY `id_tipo_participacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_patente`
--
ALTER TABLE `tipo_patente`
  MODIFY `id_tipo_patente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_programa`
--
ALTER TABLE `tipo_programa`
  MODIFY `id_tipo_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  MODIFY `id_tipo_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_publicacion`
--
ALTER TABLE `tipo_publicacion`
  MODIFY `id_tipo_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
