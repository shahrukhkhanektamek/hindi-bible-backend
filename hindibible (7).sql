-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hindibible`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `status` int(1) NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `font_size` varchar(100) DEFAULT NULL,
  `font_color` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `font_size`, `font_color`, `description`, `image`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(19, 'Bible Study', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:53:14', '2025-04-14 17:53:14', NULL, 'bible-study', 0, 1),
(20, 'Books', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:53:36', '2025-04-14 17:53:36', NULL, 'books', 0, 1),
(21, 'Videos', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:53:53', '2025-04-14 17:53:53', NULL, 'videos', 0, 1),
(22, 'Audios', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:53:58', '2025-04-14 17:53:58', NULL, 'audios', 0, 1),
(23, 'Literature', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:54:04', '2025-04-14 17:54:04', NULL, 'literature', 0, 1),
(24, 'Zaruri Suchna', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:54:11', '2025-04-14 17:54:11', NULL, 'zaruri-suchna', 0, 1),
(25, 'TGC Photos', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:54:19', '2025-04-14 17:54:19', NULL, 'tgc-photos', 0, 1),
(26, 'Children Bible', '15.5', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:54:25', '2025-04-14 17:54:40', NULL, 'children-bible', 0, 1),
(27, 'Devotion', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:54:57', '2025-04-14 17:54:57', NULL, 'devotion', 0, 1),
(28, 'Teen Bible', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:55:03', '2025-04-14 17:55:03', NULL, 'teen-bible', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_contact`
--

CREATE TABLE `enquiry_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` int(1) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `url` text NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `enquiry_contact`
--

INSERT INTO `enquiry_contact` (`id`, `name`, `phone`, `message`, `status`, `email`, `subject`, `url`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(2834, 'ffasfsa', 'faf23562', ' gdsag sdg s', 1, 'fafasfas', 'fsdagasd', 'https://deltahome.store/smart/contact', NULL, '2025-02-06 15:57:35', '2025-02-06 15:57:35', NULL, NULL, 0),
(2835, 'kjhjkh', 'j78678', 'jhjkh', 1, 'fhgf', '4hgh', 'https://deltahome.store/smart/contact', NULL, '2025-02-06 16:13:38', '2025-02-06 16:13:38', NULL, NULL, 0),
(2836, 'Jimmy', '9049454815', 'hi', 1, 'nabilansari688@gmail.com', 'showing 503 service error', 'https://deltahome.store/smart/contact', NULL, '2025-02-06 18:20:30', '2025-02-06 18:20:30', NULL, NULL, 0),
(2837, 'Shahrukh', '1122334455', 'Demo Message', 0, 'Shahrukh@gmail.com', 'Test Subject', '', NULL, NULL, NULL, NULL, NULL, 0),
(2838, 'Shahrukh', '1122334455', 'Demo Message', 1, 'Shahrukh@gmail.com', 'Test Subject', '', NULL, '2025-07-12 12:51:40', '2025-07-12 12:51:40', NULL, NULL, 0),
(2839, 'Shahrukh', '1122334455', 'Demo Message', 1, 'Shahrukh@gmail.com', 'Test Subject', '', NULL, '2025-07-12 12:51:50', '2025-07-12 12:51:50', NULL, NULL, 0),
(2840, 'Test', '316787', 'S bx', 1, 'Em', 'Gzbs', '', NULL, '2025-07-12 13:23:00', '2025-07-12 13:23:00', NULL, NULL, 0),
(2841, 'Test', '316787', 'S bx', 1, 'Em', 'Gzbs', '', NULL, '2025-07-12 13:24:22', '2025-07-12 13:24:22', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expression_image`
--

CREATE TABLE `expression_image` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expression_image`
--

INSERT INTO `expression_image` (`id`, `image`, `status`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(1, '2025-04-24-6809f8707f48b.webp', 1, 6, '2025-04-24 14:08:08', '2025-04-24 14:08:08', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `intro_video`
--

CREATE TABLE `intro_video` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=upload,2=vimeo link,3=youtube',
  `video` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `intro_video`
--

INSERT INTO `intro_video` (`id`, `name`, `type`, `video`, `description`, `image`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(1, 'Bible Study', 3, 'aQgafWDqzZo', NULL, '2025-04-23-6808f2d3da5d1.webp', 6, '2025-04-14 17:53:14', '2025-04-23 19:31:55', NULL, 'bible-study', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1=admin,2=user,3=vender',
  `ip_address` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `device_id` text DEFAULT NULL,
  `device_detail` text DEFAULT NULL,
  `firebase_token` text DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `password` varchar(501) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `role`, `ip_address`, `date`, `time`, `device_id`, `device_detail`, `firebase_token`, `access_token`, `device`, `status`, `password`) VALUES
(1, '67466', 2, '192.168.1.61', '2025-07-16', '19:41:15', 'e6af26cd9ff55fc0', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKT2FYZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVXV2ROVkdzMlRrUkZOazFVVldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEtiRTV0Um0xTmFscHFXa1JzYlZwcVZURmFiVTEzU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(2, '67466', 2, '192.168.1.61', '2025-07-16', '19:57:46', 'e6af26cd9ff55fc0', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKT2FYZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVXV2ROVkdzMlRsUmpOazVFV1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEtiRTV0Um0xTmFscHFXa1JzYlZwcVZURmFiVTEzU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(3, '67467', 2, '192.168.1.61', '2025-07-16', '21:04:18', 'e6af26cd9ff55fc0', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKT2VYZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVXV2ROYWtVMlRVUlJOazFVWjJsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEtiRTV0Um0xTmFscHFXa1JzYlZwcVZURmFiVTEzU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(4, '67468', 2, '192.168.1.61', '2025-07-16', '21:22:15', 'e6af26cd9ff55fc0', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFEzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVXV2ROYWtVMlRXcEpOazFVVldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEtiRTV0Um0xTmFscHFXa1JzYlZwcVZURmFiVTEzU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(5, '67468', 2, '192.168.1.61', '2025-07-16', '21:33:12', 'e6af26cd9ff55fc0', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFEzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVXV2ROYWtVMlRYcE5OazFVU1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEtiRTV0Um0xTmFscHFXa1JzYlZwcVZURmFiVTEzU1c0d1BRPT0=', NULL, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(6, '6', 1, '::1', '2025-07-17', '12:25:01', '', NULL, NULL, '', NULL, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(7, '67469', 2, '192.168.29.39', '2025-07-17', '12:35:31', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkVrMlRYcFZOazE2UldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(8, '67469', 2, '192.168.29.11', '2025-07-17', '12:38:47', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkVrMlRYcG5OazVFWTJsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(9, '67469', 2, '192.168.29.11', '2025-07-17', '12:45:32', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkVrMlRrUlZOazE2U1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(10, '67469', 2, '192.168.29.11', '2025-07-17', '13:01:42', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUkZOazVFU1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(11, '67469', 2, '192.168.29.11', '2025-07-17', '13:02:05', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUkpOazFFVldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(12, '67469', 2, '192.168.29.11', '2025-07-17', '13:02:22', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUkpOazFxU1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(13, '67469', 2, '192.168.29.11', '2025-07-17', '13:03:02', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUk5OazFFU1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(14, '67469', 2, '192.168.29.11', '2025-07-17', '13:03:25', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUk5OazFxVldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(15, '67469', 2, '192.168.29.11', '2025-07-17', '13:03:29', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUk5OazFxYTJsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(16, '67469', 2, '192.168.29.11', '2025-07-17', '13:04:49', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRVUlJOazVFYTJsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(17, '67469', 2, '192.168.29.39', '2025-07-17', '13:19:01', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRWUnJOazFFUldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(18, '67469', 2, '192.168.29.39', '2025-07-17', '13:19:31', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRWUnJOazE2UldsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(19, '67469', 2, '192.168.29.39', '2025-07-17', '13:50:14', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6299999952316284,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRsUkJOazFVVVdsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(20, '67469', 2, '192.168.29.39', '2025-07-17', '13:54:10', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6200000047683716,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRsUlJOazFVUVdsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(21, '67469', 2, '192.168.29.39', '2025-07-17', '13:54:39', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6200000047683716,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkUwMlRsUlJOazE2YTJsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(22, '67469', 2, '192.168.29.39', '2025-07-17', '14:01:52', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6100000143051147,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVZMmROVkZFMlRVUkZOazVVU1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 0, 'e10adc3949ba59abbe56e057f20f883e'),
(23, '6', 1, '::1', '2025-07-17', '17:04:37', '', NULL, NULL, '', NULL, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(24, '67468', 2, '192.168.29.39', '2025-07-19', '11:59:53', '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.7099999785423279,\"isEmulator\":false,\"isTablet\":false}', NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFEzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVhMmROVkVVMlRsUnJOazVVVFdsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(25, '67469', 2, '192.168.29.11', '2025-07-19', '12:04:02', '4e3bbb4f9d221239', NULL, NULL, 'WlhsS01XTXlWbmxZTW14clNXcHZNazU2VVRKUFUzZHBZMGRHZW1NelpIWmpiVkZwVDJsS2JFMVVRbWhhUjAxNlQxUlJOVmx0UlRGUFYwWnBXVzFWTVU1dFZYZE9WR1J0VFdwQ2JVOUVaM3BhVTBselNXMVNhR1JIVm1aa1IyeDBXbE5KTmtscVNYZE5hbFYwVFVSamRFMVVhMmROVkVrMlRVUlJOazFFU1dsTVEwcDVZako0YkVscWIzbE1RMHByV2xoYWNGa3lWbVpoVjFGcFQybEpNRnBVVG1sWmJVa3dXbXBzYTAxcVNYaE5hazAxU1c0d1BRPT0=', NULL, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(26, '6', 1, '::1', '2025-07-19', '13:06:39', '', NULL, NULL, '', NULL, 1, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `full_description` longblob DEFAULT NULL,
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `full_description`, `image`, `video`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(19, '1. News', '<p>afsaf</p>', 0x3c703e6673613c2f703e, '2025-07-12-687218f42fcda.webp', 'aQgafWDqzZo', 6, '2025-04-24 16:37:07', '2025-07-12 13:44:23', NULL, 'master-pro-1', 0, 1),
(20, '2. News', '<p>afsaf</p>', NULL, '2025-07-12-687218f42fcda.webp', 'aQgafWDqzZo', 6, '2025-04-24 16:37:07', '2025-07-12 13:44:23', NULL, 'master-pro-1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `amount` float NOT NULL,
  `gst` float NOT NULL,
  `final_amount` double NOT NULL DEFAULT 0,
  `add_date_time` datetime DEFAULT NULL,
  `payment_date_time` datetime DEFAULT NULL,
  `payment_by` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `status` int(1) NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `cost` float NOT NULL DEFAULT 0,
  `gst` float NOT NULL DEFAULT 0,
  `payable_price` float NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `cost`, `gst`, `payable_price`, `slug`, `status`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `is_delete`) VALUES
(1, 300, 54, 354, 'grow-wave-1', 1, 6, NULL, '2025-07-17 13:43:58', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_setting`
--

CREATE TABLE `payment_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `image` text DEFAULT NULL,
  `status` int(1) NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_setting`
--

INSERT INTO `payment_setting` (`id`, `name`, `data`, `image`, `status`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(2, 'Payumoney', '{\"key\":\"U6uKsk\",\"salt\":\"GvqdjRF5iUf0aop3M0QZJU2Bht1TFBx3\",\"prefix\":\"payumoney\"}', '2025-07-17-6878edcc9ea41.webp', 1, 6, '2024-07-31 12:34:33', '2025-07-17 18:04:20', NULL, NULL, 0),
(3, 'PhonePe', '{\"key\":\"M22JXHNPTEKAW\",\"salt\":\"62120129-b5a2-48b5-a42f-a9fa99c83127\",\"prefix\":\"phonepe\"}', '2025-07-17-6878edf036cf7.webp', 1, 6, '2024-07-31 12:54:39', '2025-07-17 18:04:56', NULL, NULL, 0),
(4, 'Razorpay', '{\"key\":\"rzp_test_ljvfMmdyjV0adI\",\"salt\":\"D8bWwGs5AACu5ebLMZnL6bXO\",\"prefix\":\"razorpay\"}', '2025-07-17-6878edf8d0e50.webp', 1, 6, '2024-07-31 12:54:39', '2025-07-17 18:05:04', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `sub_category_id` int(11) NOT NULL DEFAULT 0,
  `sub_sub_category_id` int(11) NOT NULL DEFAULT 0,
  `sub_sub_sub_category_id` int(11) NOT NULL DEFAULT 0,
  `post_type` int(2) NOT NULL COMMENT '1=video,2=audio,3=image,4=PDF,5=artical',
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `full_description` longblob DEFAULT NULL,
  `image` text DEFAULT NULL,
  `video_type` int(1) NOT NULL,
  `video` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `sub_sub_sub_category_id`, `post_type`, `name`, `description`, `full_description`, `image`, `video_type`, `video`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(19, 19, 19, 19, 19, 1, 'Master Pro', '<p>afsaf</p>', 0x3c703e6673613c2f703e, '2025-04-24-680a1b5b30dbc.webp', 3, 'aQgafWDqzZo', 6, '2025-04-24 16:37:07', '2025-04-24 19:45:13', NULL, 'master-pro', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `data`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(1, 'gst', '{\"gst\":\"18\",\"tds\":\"0\"}', 6, NULL, '2024-06-06 10:46:21', NULL, NULL, 0, 0),
(2, 'main', '{\"email\":\"hindibiblestudy.com@gmail.com\",\"mobile\":\"917838989070\",\"facebook\":\"#\",\"twitter\":\"#\",\"whatsapp\":\"#\",\"youtube\":\"#\",\"address\":\"#\",\"instagram\":\"#\",\"telegram\":\"#\",\"linkedin\":\"#\",\"top_bar_hide_show\":\"0\",\"instructor_form_link\":\"#\",\"min_deposit\":\"100\",\"withdrawal_amount\":\"10\",\"upi\":\"8285392948@ybl\",\"bank_name\":\"PNB\",\"account_holder\":\"Shahrukh\",\"account_number\":\"46546456\",\"ifsc\":\"IFSCCC\",\"branch\":\"Nangloi\",\"bic_code\":\"5454\"}', 6, NULL, '2025-07-12 12:10:28', NULL, NULL, 0, 0),
(3, 'material', '{\"promotion_material\":\"https:\\/\\/drive.google.com\\/drive\\/folders\\/1V3tL6SQX0G7qeoghil5bgeQhSxx7_gp6\",\"traning_material\":\"https:\\/\\/www.youtube.com\\/playlist?list=PL_1ljMAEWabhRKejFk5OFhFArdKDMTwB8\",\"main_banner\":\"2024-07-13-66922ae19392b.png\",\"promotion_banner\":\"2024-06-25-667ab30433072.png\",\"material_banner\":\"2024-06-25-667ab30436633.png\"}', 6, NULL, '2024-07-13 12:51:05', NULL, NULL, 0, 0),
(4, 'payoutpin', '{\"pin\":\"1234\"}', 6, NULL, '2024-06-20 21:07:20', NULL, NULL, 0, 0),
(5, 'dashboard', '{\"main_banner\":\"2024-07-12-669160c69ada5.png\",\"promotion_banner\":\"2024-06-12-6669ca304b8ef.png\",\"material_banner\":\"2024-06-12-6669ca304bdd0.png\"}', 6, NULL, '2024-07-12 22:28:46', NULL, NULL, 0, 0),
(6, 'emails', '{\"registration_email\":\"demo@gmail.com\"}', 6, NULL, '2025-01-28 21:31:27', NULL, NULL, 0, 0),
(7, 'webinar', '{\"webinar_banner\":\"2024-12-15-675ecf24b941e.webp\"}', 6, NULL, '2024-12-15 18:14:21', NULL, NULL, 0, 0),
(8, 'certificate', '{\"certificate_banner\":\"2024-10-02-66fd54feee54d.webp\"}', 6, NULL, '2024-10-02 19:43:19', NULL, NULL, 0, 0),
(9, 'target', '{\"target_banner\":\"2024-09-09-66df03422ea06.webp\"}', 6, NULL, '2024-09-09 19:46:34', NULL, NULL, 0, 0),
(10, 'offer', '{\"offer_banner\":\"2024-07-13-66919d87992c4.png\"}', 6, NULL, '2024-07-13 02:47:59', NULL, NULL, 0, 0),
(11, 'welcome', '{\"welcome_banner\":\"WqfrZgscQqM\"}', 6, NULL, '2024-07-29 18:46:49', NULL, NULL, 0, 0),
(12, 'link_generator', '{\"link_generator_banner\":\"2024-07-11-668fcfa8958b4.png\"}', 6, NULL, '2024-07-11 17:57:20', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `p_id` bigint(20) NOT NULL,
  `page_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `slug`, `table_name`, `p_id`, `page_name`) VALUES
(2, 'grow-wave', 'package', 193128, NULL),
(15, '7-simple-ways-to-keep-your-kids-toys-from-taking-over-your-home', 'blog', 26, 'blog-detail.blade.php'),
(16, 'product-1', 'product', 193128, 'product-detail.blade.php'),
(20, 'fgsd', 'category', 1, 'category-detail.blade.php'),
(21, 'rqwrwq', 'category', 2, 'category-detail.blade.php'),
(22, 'rqwrwq-1', 'category', 3, 'category-detail.blade.php'),
(23, 'asfsa', 'category', 4, 'category-detail.blade.php'),
(24, 'asfsa-1', 'category', 5, 'category-detail.blade.php'),
(25, 'asfsa-2', 'category', 6, 'category-detail.blade.php'),
(26, 'fafsafa', 'category', 7, 'category-detail.blade.php'),
(27, 'fasfsa', 'category', 8, 'category-detail.blade.php'),
(28, 'fsafsa', 'category', 9, 'category-detail.blade.php'),
(29, 'fgh', 'category', 10, 'category-detail.blade.php'),
(30, 'fgh-1', 'category', 11, 'category-detail.blade.php'),
(31, 'fasfsa-1', 'category', 12, 'category-detail.blade.php'),
(32, 'fasfas', 'category', 13, 'category-detail.blade.php'),
(33, 'fasfas-1', 'category', 14, 'category-detail.blade.php'),
(34, 'asfsa-3', 'category', 15, 'category-detail.blade.php'),
(35, 'fasfsa-2', 'category', 16, 'category-detail.blade.php'),
(36, 'safa', 'category', 17, 'category-detail.blade.php'),
(38, 'category-1', 'category', 18, 'category-detail.blade.php'),
(41, 'sub-category-1', 'sub_category', 18, 'sub-category-detail.blade.php'),
(42, 'sub-category-1-1', 'sub_sub_category', 18, 'sub-sub-category-detail.blade.php'),
(44, 'sub-category-1-1-1', 'sub_sub_sub_category', 18, 'sub-sub-sub-category-detail.blade.php'),
(46, 'sub-category-1-1-1-1', 'post', 18, 'post-detail.blade.php'),
(47, 'bible-study', 'category', 19, 'category-detail.blade.php'),
(48, 'books', 'category', 20, 'category-detail.blade.php'),
(49, 'videos', 'category', 21, 'category-detail.blade.php'),
(50, 'audios', 'category', 22, 'category-detail.blade.php'),
(51, 'literature', 'category', 23, 'category-detail.blade.php'),
(52, 'zaruri-suchna', 'category', 24, 'category-detail.blade.php'),
(53, 'tgc-photos', 'category', 25, 'category-detail.blade.php'),
(55, 'children-bible', 'category', 26, 'category-detail.blade.php'),
(56, 'devotion', 'category', 27, 'category-detail.blade.php'),
(57, 'teen-bible', 'category', 28, 'category-detail.blade.php'),
(58, 'bible-books', 'sub_category', 19, 'sub-category-detail.blade.php'),
(59, 'bible-subjects', 'sub_category', 20, 'sub-category-detail.blade.php'),
(60, 'audio-bible', 'sub_category', 21, 'sub-category-detail.blade.php'),
(61, 'bible-drama', 'sub_category', 22, 'sub-category-detail.blade.php'),
(62, 'old-testament', 'sub_sub_category', 19, 'sub-sub-category-detail.blade.php'),
(63, 'new-testament', 'sub_sub_category', 20, 'sub-sub-category-detail.blade.php'),
(64, 'genesis', 'sub_sub_sub_category', 19, 'sub-sub-sub-category-detail.blade.php'),
(68, 'master-pro', 'post', 19, 'post-detail.blade.php'),
(70, 'master-pro-1', 'news', 19, 'news-detail.blade.php'),
(72, 'payumoney', 'blog_category', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `font_size` varchar(100) DEFAULT NULL,
  `font_color` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `font_size`, `font_color`, `description`, `image`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(19, 19, 'Bible Books', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 17:59:55', '2025-04-14 17:59:55', NULL, 'bible-books', 0, 1),
(20, 19, 'Bible Subjects', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 18:00:21', '2025-04-14 18:00:21', NULL, 'bible-subjects', 0, 1),
(21, 19, 'Audio Bible', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 18:00:51', '2025-04-14 18:00:51', NULL, 'audio-bible', 0, 1),
(22, 19, 'Bible Drama', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-14 18:01:06', '2025-04-14 18:01:06', NULL, 'bible-drama', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_category`
--

CREATE TABLE `sub_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `sub_category_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `font_size` varchar(100) DEFAULT NULL,
  `font_color` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_sub_category`
--

INSERT INTO `sub_sub_category` (`id`, `category_id`, `sub_category_id`, `name`, `font_size`, `font_color`, `description`, `image`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(19, 19, 19, 'Old Testament', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-24 15:44:44', '2025-04-24 15:44:44', NULL, 'old-testament', 0, 1),
(20, 19, 19, 'New Testament', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-24 15:45:02', '2025-04-24 15:45:02', NULL, 'new-testament', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_sub_category`
--

CREATE TABLE `sub_sub_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `sub_category_id` int(11) NOT NULL DEFAULT 0,
  `sub_sub_category_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `font_size` varchar(100) DEFAULT NULL,
  `font_color` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_sub_sub_category`
--

INSERT INTO `sub_sub_sub_category` (`id`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `name`, `font_size`, `font_color`, `description`, `image`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`, `status`) VALUES
(19, 19, 19, 19, 'Genesis', '15', '#000000', NULL, 'default.jpg', 6, '2025-04-24 15:45:38', '2025-04-24 15:45:38', NULL, 'genesis', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `screenshot` text DEFAULT NULL,
  `status` int(1) NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_id`, `ticket_id`, `subject`, `message`, `screenshot`, `status`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(1, 6, 17404136226, 'afas', 'fsa', 'default.jpg', 1, 6, '2025-02-24 21:43:42', '2025-02-24 22:01:16', NULL, NULL, 0),
(2, 6, 17418678316, 'Test', 'Demo Message!', NULL, 0, 6, '2025-03-13 17:40:31', '2025-03-13 17:40:31', NULL, NULL, 0),
(3, 6, 17418678476, 'Test', 'Demo Message!', NULL, 0, 6, '2025-03-13 17:40:47', '2025-03-13 17:40:47', NULL, NULL, 0),
(4, 6, 17418687906, 'sfasf', 'safass', NULL, 0, 6, '2025-03-13 17:56:30', '2025-03-13 17:56:30', NULL, NULL, 0),
(5, 6, 17418688206, 'fasf', 'wetwe', NULL, 0, 6, '2025-03-13 17:57:00', '2025-03-13 17:57:00', NULL, NULL, 0),
(6, 6, 17418688986, 'fafas', 'fafsafsa', NULL, 0, 6, '2025-03-13 17:58:18', '2025-03-13 17:58:18', NULL, NULL, 0),
(7, 6, 17418689336, 'afasf', 'fasfsa', NULL, 0, 6, '2025-03-13 17:58:53', '2025-03-13 17:58:53', NULL, NULL, 0),
(8, 6, 17418689416, 'gsdg', 'sdgsd', NULL, 0, 6, '2025-03-13 17:59:01', '2025-03-13 17:59:01', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thankyou_message`
--

CREATE TABLE `thankyou_message` (
  `id` int(11) NOT NULL,
  `date` varchar(5) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `thankyou_message`
--

INSERT INTO `thankyou_message` (`id`, `date`, `description`, `image`, `status`, `add_by`, `add_date_time`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(4, '01', '', '5d5e048eeb0e0.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(5, '02', '', '5d5e039d1712d.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(6, '03', '', '5d5e03ae1a6f4.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(7, '04', '', '5d5e03be989f5.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(8, '05', '', '5d5e03cbe601e.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(9, '06', '', '5d5e04b9c8fd9.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(10, '07', '', '5d5e04c7dab59.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(11, '08', '', '5d5e04dd52d87.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(12, '09', '', '5d5e04ed16717.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(13, '10', '', '5d5e050189106.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(14, '11', '', '5d5e050ea6ca6.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(15, '12', '', '5d5e051d3831e.png', 1, NULL, NULL, NULL, NULL, NULL, 0),
(16, '13', '', '5d5e052c95db5.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(17, '14', '', '5d5e053a90b1f.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(18, '15', '', '5d5e0549e3370.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(19, '16', '', '5d5e0558db8c6.gif', 1, NULL, NULL, NULL, NULL, NULL, 0),
(20, '17', '', '5d5e05699cd12.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(21, '18', '', '5d5e0577b43cd.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(22, '19', '', '5d5e058824d7a.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(23, '20', 'Thank for your valuable contribution. This will help us run our ministry efficiently for the furtherance of the gospel', '5d5e059908de2.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(24, '21', '', '5d5e064ba1629.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(25, '22', '', '5d5e0687a7ab9.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(26, '23', '', '5d5e06986de7b.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(27, '24', '', '5d5e06a8a7f17.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(28, '25', '', '5d5e06bb112ad.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(29, '26', '', '5d5e06d2126b3.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(30, '27', '', '5d5e07305120d.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(31, '28', '', '5d5e074dc8b38.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(32, '29', '', '5d5e075fcea86.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0),
(33, '30', '', '5d5e0774ecf8b.png', 1, NULL, NULL, NULL, NULL, NULL, 0),
(34, '31', '', '5d5e07835d40e.jpg', 1, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT 0,
  `product_name` varchar(150) DEFAULT NULL,
  `type` int(1) NOT NULL COMMENT '1=credit,2=debit',
  `p_type` int(11) NOT NULL COMMENT '1=package,2=video,3=contribution',
  `payment_type` int(1) NOT NULL COMMENT '1=india,2=international',
  `payment_by` varchar(100) DEFAULT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction_id` varchar(100) NOT NULL COMMENT '1=new account',
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `final_amount` int(11) NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` int(1) NOT NULL,
  `add_date_time` datetime NOT NULL,
  `payment_date_time` datetime NOT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `p_id`, `product_name`, `type`, `p_type`, `payment_type`, `payment_by`, `order_id`, `transaction_id`, `user_id`, `amount`, `gst`, `final_amount`, `detail`, `status`, `add_date_time`, `payment_date_time`, `add_by`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(5, 1, NULL, 1, 1, 1, 'razorpay', 175275454867469, 'pay_Qu8oVkc3u6qep9', 67469, 354, 54, 300, NULL, 1, '2025-07-17 17:45:48', '2025-07-17 18:27:04', NULL, '2025-07-17 17:45:48', NULL, NULL, 0),
(7, 1, NULL, 1, 1, 1, NULL, 175275753367469, '', 67469, 354, 54, 300, NULL, 0, '2025-07-17 18:35:33', '0000-00-00 00:00:00', NULL, '2025-07-17 18:35:33', NULL, NULL, 0),
(25, 1, NULL, 1, 1, 1, 'razorpay', 175292236267468, 'pay_QutrO3t5LEKigF', 67468, 354, 54, 300, NULL, 1, '2025-07-19 16:22:42', '2025-07-19 16:23:56', NULL, '2025-07-19 16:22:42', NULL, NULL, 0),
(26, 1, NULL, 1, 1, 1, 'razorpay', 175292314667468, 'pay_Quu4vXdN4BqmBV', 67468, 354, 54, 300, NULL, 1, '2025-07-19 16:35:46', '2025-07-19 16:36:44', NULL, '2025-07-19 16:35:46', NULL, NULL, 0),
(30, 1, NULL, 1, 1, 1, 'razorpay', 175292331767468, 'pay_Quu9tzOKIf89Xb', 67468, 354, 54, 300, NULL, 1, '2025-07-19 16:38:37', '2025-07-19 16:41:27', NULL, '2025-07-19 16:38:37', NULL, NULL, 0),
(32, 1, NULL, 1, 1, 1, 'razorpay', 175292371567468, 'pay_QuuEfqstUFNzIQ', 67468, 300, 54, 354, NULL, 1, '2025-07-19 16:45:15', '2025-07-19 16:45:59', NULL, '2025-07-19 16:45:15', NULL, NULL, 0),
(33, 1, NULL, 1, 1, 1, 'razorpay', 175292387567468, 'pay_QuuHZBmujh6xoK', 67468, 300, 54, 354, NULL, 1, '2025-07-19 16:47:55', '2025-07-19 16:48:41', NULL, '2025-07-19 16:47:55', NULL, NULL, 0),
(34, 1, NULL, 1, 1, 1, 'razorpay', 175292412667468, 'pay_QuuNsPBDhWUqZd', 67468, 300, 54, 354, NULL, 1, '2025-07-19 16:52:06', '2025-07-19 16:54:40', NULL, '2025-07-19 16:52:06', NULL, NULL, 0),
(36, 1, NULL, 1, 1, 1, NULL, 175292439767468, '', 67468, 300, 54, 354, NULL, 0, '2025-07-19 16:56:37', '0000-00-00 00:00:00', NULL, '2025-07-19 16:56:37', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `device_id` text DEFAULT NULL,
  `free_trial` int(1) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT '''''',
  `phone` varchar(50) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `remember_token` text NOT NULL,
  `free_trial_start_date_time` datetime DEFAULT NULL,
  `free_trial_end_date_time` datetime DEFAULT NULL,
  `add_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `activate_date_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(1) DEFAULT 0,
  `gender` int(2) DEFAULT NULL,
  `is_paid` int(1) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `device_id`, `free_trial`, `name`, `email`, `phone`, `username`, `password`, `remember_token`, `free_trial_start_date_time`, `free_trial_end_date_time`, `add_date_time`, `activate_date_time`, `status`, `role`, `gender`, `is_paid`, `image`, `address`, `country`, `state`, `city`, `add_by`, `update_date_time`, `update_history`, `slug`, `is_delete`) VALUES
(6, 6, NULL, NULL, 'Shahrukh', 'admin@gmail.com', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', '', '2025-07-16 21:06:15', NULL, '2020-08-30 15:56:58', '2025-03-05 15:56:04', 1, 1, 1, 1, '2024-12-09-6755ef0b79c80.jpg', 'dmeo', 99, '25', 'Delhi', 6, '2025-01-26 21:13:50', NULL, NULL, 0),
(67468, 7, 'e6af26cd9ff55fc0', 1, 'shahrukh', 'test@gmail.com', '8285392948', 'test', 'e10adc3949ba59abbe56e057f20f883e', '', '2025-07-14 21:22:15', '2025-07-15 21:22:15', '2025-07-16 21:22:15', NULL, 1, 2, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(67469, 8, '4e3bbb4f9d221239', NULL, 'Azmal', 'azmal@gmail.com', '1234567890', 'azmal', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, NULL, '2025-07-17 12:35:31', NULL, 1, 2, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_temp`
--

CREATE TABLE `users_temp` (
  `id` int(11) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1=admin,2=user,3=vender',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `otp` int(11) NOT NULL,
  `device_id` text NOT NULL,
  `type` int(4) NOT NULL,
  `exp_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_package`
--

CREATE TABLE `user_package` (
  `id` int(11) NOT NULL,
  `transaction_table_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `type` int(1) NOT NULL COMMENT '1=package,2=video,3=contribution',
  `package_name` varchar(150) NOT NULL,
  `package_id` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `start_date_time` datetime DEFAULT NULL,
  `end_date_time` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_package`
--

INSERT INTO `user_package` (`id`, `transaction_table_id`, `user_id`, `type`, `package_name`, `package_id`, `date_time`, `start_date_time`, `end_date_time`, `status`) VALUES
(1, 26, 67468, 1, 'Package', '1', '2025-07-19 11:06:44', '2025-07-19 16:36:44', '2026-07-19 16:36:44', 1),
(2, 30, 67468, 1, 'Package', '1', '2025-07-19 11:11:27', '2025-07-19 16:41:27', '2026-07-19 16:41:27', 1),
(3, 32, 67468, 1, 'Package', '1', '2025-07-19 11:15:59', '2025-07-19 16:45:59', '2026-07-19 16:45:59', 1),
(4, 33, 67468, 1, 'Package', '1', '2025-07-19 11:18:41', '2025-07-19 16:48:41', '2026-07-19 16:48:41', 1),
(5, 34, 67468, 1, 'Package', '1', '2025-07-19 11:24:40', '2025-07-19 16:54:40', '2026-07-19 16:54:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visiters`
--

CREATE TABLE `visiters` (
  `id` int(11) NOT NULL,
  `device_id` text DEFAULT NULL,
  `device_detail` text DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visiters`
--

INSERT INTO `visiters` (`id`, `device_id`, `device_detail`, `add_date_time`) VALUES
(11, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 18:54:14'),
(12, '454654654', NULL, '2025-07-16 18:56:16'),
(13, 'e6af26cd9ff55fc0', NULL, '2025-07-16 18:56:25'),
(14, 'e6af26cd9ff55fc0', NULL, '2025-07-16 19:05:21'),
(15, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 19:06:09'),
(16, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 19:31:21'),
(17, 'e6af26cd9ff55fc0', NULL, '2025-07-16 19:41:43'),
(18, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 19:42:23'),
(19, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 19:43:02'),
(20, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 19:54:16'),
(21, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 19:58:30'),
(22, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 20:46:26'),
(23, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 20:46:46'),
(24, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:07:26'),
(25, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:08:06'),
(26, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:08:31'),
(27, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:08:41'),
(28, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:09:55'),
(29, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:10:14'),
(30, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:12:33'),
(31, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:13:53'),
(32, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:17:35'),
(33, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:17:40'),
(34, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:18:23'),
(35, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:18:46'),
(36, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:24:03'),
(37, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:24:27'),
(38, 'e6af26cd9ff55fc0', '{\"deviceId\":\"goldfish_x86_64\",\"brand\":\"google\",\"model\":\"sdk_gphone64_x86_64\",\"systemName\":\"Android\",\"systemVersion\":\"14\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"sdk_gphone64_x86_64\",\"uniqueId\":\"e6af26cd9ff55fc0\",\"manufacturer\":\"Google\",\"ipAddress\":\"unknown\",\"batteryLevel\":1,\"isEmulator\":true,\"isTablet\":false}', '2025-07-16 21:26:34'),
(39, 'e6af26cd9ff55fc0', NULL, '2025-07-16 21:26:48'),
(40, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.7400000095367432,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 12:34:38'),
(41, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.7400000095367432,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 12:36:08'),
(42, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:17:15'),
(43, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:18:03'),
(44, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:18:28'),
(45, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:18:48'),
(46, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:18:50'),
(47, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:39:19'),
(48, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:44:38'),
(49, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:44:58'),
(50, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:46:54'),
(51, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:48:17'),
(52, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:48:27'),
(53, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:48:34'),
(54, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6299999952316284,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:49:17'),
(55, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6299999952316284,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:49:58'),
(56, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6299999952316284,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:52:01'),
(57, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6299999952316284,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:53:48'),
(58, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6299999952316284,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:53:52'),
(59, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6200000047683716,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 13:54:31'),
(60, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:58:06'),
(61, 'e6af26cd9ff55fc0', NULL, '2025-07-17 13:58:29'),
(62, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6100000143051147,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 14:01:15'),
(63, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6100000143051147,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 14:02:58'),
(64, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6100000143051147,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 14:03:07'),
(65, 'e6af26cd9ff55fc0', NULL, '2025-07-17 14:03:27'),
(66, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6000000238418579,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 14:16:46'),
(67, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.44999998807907104,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 15:44:57'),
(68, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.36000001430511475,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 16:18:55'),
(69, 'e6af26cd9ff55fc0', NULL, '2025-07-17 16:19:16'),
(70, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.36000001430511475,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 16:19:51'),
(71, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.3499999940395355,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 16:21:42'),
(72, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.3400000035762787,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 16:26:44'),
(73, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.33000001311302185,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 16:29:53'),
(74, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.33000001311302185,\"isEmulator\":false,\"isTablet\":false}', '2025-07-17 16:30:26'),
(75, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.7200000286102295,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 11:56:21'),
(76, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.7099999785423279,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 11:57:22'),
(77, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.7099999785423279,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:00:55'),
(78, 'e6af26cd9ff55fc0', NULL, '2025-07-19 12:01:57'),
(79, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.699999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:05:07'),
(80, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.699999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:05:13'),
(81, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.699999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:05:38'),
(82, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.699999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:05:43'),
(83, 'e6af26cd9ff55fc0', NULL, '2025-07-19 12:05:56'),
(84, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.699999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:06:19'),
(85, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.699999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:08:07'),
(86, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:16:12'),
(87, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6800000071525574,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:21:03'),
(88, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6700000166893005,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:28:09'),
(89, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6600000262260437,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:36:39'),
(90, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6600000262260437,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:37:24'),
(91, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6600000262260437,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:37:42'),
(92, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.6499999761581421,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 12:42:48'),
(93, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.28999999165534973,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 15:58:28'),
(94, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.25999999046325684,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:17:04'),
(95, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.25999999046325684,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:19:00'),
(96, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.25999999046325684,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:19:13'),
(97, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.25,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:19:36'),
(98, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.2199999988079071,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:38:32'),
(99, 'e6af26cd9ff55fc0', NULL, '2025-07-19 16:49:15'),
(100, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.1899999976158142,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:50:22'),
(101, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.1899999976158142,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:51:05'),
(102, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.1899999976158142,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:51:23'),
(103, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.18000000715255737,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:54:43'),
(104, 'e6af26cd9ff55fc0', NULL, '2025-07-19 16:55:26'),
(105, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.18000000715255737,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:56:09'),
(106, '4e3bbb4f9d221239', '{\"deviceId\":\"trinket\",\"brand\":\"Xiaomi\",\"model\":\"Mi A3\",\"systemName\":\"Android\",\"systemVersion\":\"11\",\"buildNumber\":\"1\",\"bundleId\":\"com.hindibiblestudy\",\"appVersion\":\"1.0\",\"readableVersion\":\"1.0.1\",\"deviceName\":\"Mi A3\",\"uniqueId\":\"4e3bbb4f9d221239\",\"manufacturer\":\"Xiaomi\",\"ipAddress\":\"unknown\",\"batteryLevel\":0.18000000715255737,\"isEmulator\":false,\"isTablet\":false}', '2025-07-19 16:56:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_contact`
--
ALTER TABLE `enquiry_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expression_image`
--
ALTER TABLE `expression_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro_video`
--
ALTER TABLE `intro_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_setting`
--
ALTER TABLE `payment_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_sub_category`
--
ALTER TABLE `sub_sub_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thankyou_message`
--
ALTER TABLE `thankyou_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_temp`
--
ALTER TABLE `users_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_package`
--
ALTER TABLE `user_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visiters`
--
ALTER TABLE `visiters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `enquiry_contact`
--
ALTER TABLE `enquiry_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2842;

--
-- AUTO_INCREMENT for table `expression_image`
--
ALTER TABLE `expression_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `intro_video`
--
ALTER TABLE `intro_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193165;

--
-- AUTO_INCREMENT for table `payment_setting`
--
ALTER TABLE `payment_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_sub_sub_category`
--
ALTER TABLE `sub_sub_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thankyou_message`
--
ALTER TABLE `thankyou_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67470;

--
-- AUTO_INCREMENT for table `users_temp`
--
ALTER TABLE `users_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_package`
--
ALTER TABLE `user_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visiters`
--
ALTER TABLE `visiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
