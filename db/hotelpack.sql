-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 04:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelpack`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_details`
--

CREATE TABLE `accomodation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `payment_mode_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_category_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `room_price_applied` int(11) DEFAULT NULL,
  `advanced_payment` int(11) DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `check_in_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out_date` varchar(233) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recept_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodation_details`
--

INSERT INTO `accomodation_details` (`id`, `customer_id`, `payment_mode_id`, `room_category_id`, `room_id`, `group_id`, `room_price_applied`, `advanced_payment`, `payment_status`, `check_in_date`, `check_out_date`, `recept_no`, `reserver_id`, `created_at`, `updated_at`) VALUES
(3, 13, 1, 6, 10, NULL, 70000, NULL, 0, '21-12-2020', '22-12-2020', '1938893', NULL, '2020-12-21 02:50:22', '2020-12-21 02:50:22'),
(4, 15, 1, 1, 16, 0, 100000, 100000, 0, '25-12-2020', '26-12-2020', 'RT79012139', 7, '2020-12-24 05:10:32', '2020-12-24 05:10:32'),
(8, 20, 1, 6, 2, 0, 70000, 70000, 0, '29-12-2020', '30-12-2020', 'RT67871464', 12, '2020-12-28 09:35:03', '2020-12-28 09:35:03'),
(9, 21, 1, 6, 10, 0, 60000, 60000, 0, '29-12-2020', '30-12-2020', 'RT98585001', 13, '2020-12-29 12:15:23', '2020-12-29 12:15:23'),
(10, 22, 2, 1, 14, 0, 0, 0, 0, '30-12-2020', '01-01-2021', 'RT49897254', 14, '2020-12-30 08:02:12', '2020-12-30 08:02:12'),
(12, 24, 2, 1, 15, 0, 150000, 150000, 0, '05-01-2021', '06-01-2021', 'RT36350030', 15, '2021-01-05 05:41:23', '2021-01-05 05:41:23'),
(13, 26, 1, 1, 14, NULL, 170000, NULL, 0, '05-01-2021', '06-01-2021', 'RT74659303', NULL, '2021-01-05 06:43:14', '2021-01-05 06:43:14'),
(14, 27, 1, 1, 15, 0, 150000, 150000, 0, '07-01-2021', '08-01-2021', 'RT8792448', 11, '2021-01-05 06:49:49', '2021-01-05 06:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `bars`
--

CREATE TABLE `bars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `bar_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bars`
--

INSERT INTO `bars` (`id`, `bar_name`, `status_id`, `bar_slug`, `created_at`, `updated_at`) VALUES
(1, 'Mikumi Lodge', 1, '3434', '2020-09-26 03:22:46', '2020-09-26 03:22:46'),
(2, 'Beaco Bar One', 1, '435', '2020-09-26 03:23:08', '2020-09-26 03:23:08'),
(5, 'Baaa', 12, '33020', '2021-01-06 04:55:17', '2021-01-06 04:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `bar_assigned_staff`
--

CREATE TABLE `bar_assigned_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bar_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bar_items`
--

CREATE TABLE `bar_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_sale_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bar_items`
--

INSERT INTO `bar_items` (`id`, `item_name`, `item_purchase_price`, `item_sale_price`, `item_quantity`, `item_category_id`, `status_id`, `created_at`, `updated_at`, `item_image`, `item_slug`) VALUES
(8, 'Kilimanjaro Water', '700', '1000', '20', 2, 1, '2020-09-26 05:13:19', '2020-09-26 05:13:19', 'item_image-1601118799.jpg', 'kilimanjaro-water'),
(10, 'Kilimanjaro Mill 500', '430', '500', '210', 1, 1, '2020-09-26 08:10:31', '2020-09-26 08:10:31', 'item_image-1601129431.jpg', 'mil-500'),
(11, 'Pepsi', '320', '500', '203', 2, 1, '2020-09-26 08:13:40', '2020-09-26 08:13:40', 'item_image-1601129620.jpg', 'pepsi'),
(13, 'Pepsi Big 3', '320', '500', '203', 2, 1, '2020-09-26 08:15:29', '2020-09-26 08:15:29', 'item_image-1601129729.jpg', 'pespi-big-3'),
(16, 'Maji ya kilimanjaro ML 300', '2000', '2100', '44', 3, 1, '2020-12-23 05:01:44', '2020-12-23 05:01:44', 'item_image-1608710504.jpg', '25216'),
(18, 'Nazi', '5', '1000', '6', 10, 1, '2021-01-06 08:54:12', '2021-01-06 08:54:12', 'item_image-1609934052.png', '96816'),
(19, 'Cockacola ya kopo', '1000', '1300', '30', 2, 1, '2021-01-19 04:41:07', '2021-01-19 04:41:07', 'item_image-1611042067.jpg', '35368');

-- --------------------------------------------------------

--
-- Table structure for table `bar_item_categories`
--

CREATE TABLE `bar_item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bar_item_categories`
--

INSERT INTO `bar_item_categories` (`id`, `item_category_name`, `cat_slug`, `created_at`, `updated_at`) VALUES
(1, 'Maji', '4546', NULL, NULL),
(2, 'Kinywaji', '5654', NULL, NULL),
(3, 'Enegiezer', '3689', '2020-12-12 07:24:46', '2020-12-12 07:24:46'),
(4, 'Alcohol', '3487', '2020-12-12 07:25:59', '2020-12-12 07:25:59'),
(10, 'Tea', '78657', '2020-12-12 07:33:48', '2020-12-12 07:33:48'),
(15, 'Deoooo', '65424', '2020-12-29 05:06:51', '2020-12-29 05:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `bar_purchasings`
--

CREATE TABLE `bar_purchasings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bar_purchasings`
--

INSERT INTO `bar_purchasings` (`id`, `item_number`, `item_name`, `item_unit`, `unit_price`, `measurement`, `total_value`, `created_at`, `updated_at`) VALUES
(1, 'BEACO/BAR/46032848', 'Kilimanjaro ML 300', '10', '3500', 'caton', '35000', '2020-12-16 06:18:51', '2020-12-16 06:18:51'),
(2, 'BEACO/BAR/66258789', 'Malta Mo', '6', '2000', 'caton', '12000', '2020-12-16 06:19:36', '2020-12-16 06:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conference_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conference_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `conference_name`, `conference_price`, `room_status_id`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Serena Mo', 'Tsh 200,000.00', 'Ocupied', 56652, '2021-01-06 05:48:30', '2021-01-06 05:48:30'),
(3, 'Mohaaaa', '30002000', 'Vacant', 71929, '2021-01-06 06:12:51', '2021-01-06 06:12:51'),
(4, 'Kikwete', '250000', 'Vacant', 30110, '2021-01-06 06:13:04', '2021-01-06 06:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `conference_customers`
--

CREATE TABLE `conference_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtype` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `conference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` int(11) NOT NULL,
  `datein` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug_c` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conference_customers`
--

INSERT INTO `conference_customers` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `gender`, `country`, `idtype`, `payment_id`, `conference_id`, `id_number`, `amount_paid`, `datein`, `dateout`, `created_at`, `updated_at`, `slug_c`, `status`) VALUES
(2, 'Moji', 'Bby', 'b@gm.com', '07654321', 'male', 'Tanzania', 24, 1, 4, '93003099', 250000, '07-01-2021', '09-01-2021', '2021-01-06 07:02:56', '2021-01-06 07:02:56', 6850808, 'Reservation'),
(3, 'John', 'Doe', 'doe@gmail.com', '0765656565', 'male', 'Tanzania', 24, 1, 3, '122222', 29000000, '18-01-2021', '19-01-2021', '2021-01-15 11:39:35', '2021-01-15 11:39:35', 879997, 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `CountryID` int(11) DEFAULT NULL,
  `CountryName` varchar(50) DEFAULT NULL,
  `TwoCharCountryCode` char(2) DEFAULT NULL,
  `ThreeCharCountryCode` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`CountryID`, `CountryName`, `TwoCharCountryCode`, `ThreeCharCountryCode`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Aland Islands', 'AX', 'ALA'),
(3, 'Albania', 'AL', 'ALB'),
(4, 'Algeria', 'DZ', 'DZA'),
(5, 'American Samoa', 'AS', 'ASM'),
(6, 'Andorra', 'AD', 'AND'),
(7, 'Angola', 'AO', 'AGO'),
(8, 'Anguilla', 'AI', 'AIA'),
(9, 'Antarctica', 'AQ', 'ATA'),
(10, 'Antigua and Barbuda', 'AG', 'ATG'),
(11, 'Argentina', 'AR', 'ARG'),
(12, 'Armenia', 'AM', 'ARM'),
(13, 'Aruba', 'AW', 'ABW'),
(14, 'Australia', 'AU', 'AUS'),
(15, 'Austria', 'AT', 'AUT'),
(16, 'Azerbaijan', 'AZ', 'AZE'),
(17, 'Bahamas', 'BS', 'BHS'),
(18, 'Bahrain', 'BH', 'BHR'),
(19, 'Bangladesh', 'BD', 'BGD'),
(20, 'Barbados', 'BB', 'BRB'),
(21, 'Belarus', 'BY', 'BLR'),
(22, 'Belgium', 'BE', 'BEL'),
(23, 'Belize', 'BZ', 'BLZ'),
(24, 'Benin', 'BJ', 'BEN'),
(25, 'Bermuda', 'BM', 'BMU'),
(26, 'Bhutan', 'BT', 'BTN'),
(27, 'Bolivia', 'BO', 'BOL'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES'),
(29, 'Bosnia and Herzegovina', 'BA', 'BIH'),
(30, 'Botswana', 'BW', 'BWA'),
(31, 'Bouvet Island', 'BV', 'BVT'),
(32, 'Brazil', 'BR', 'BRA'),
(33, 'British Indian Ocean Territory', 'IO', 'IOT'),
(34, 'Brunei', 'BN', 'BRN'),
(35, 'Bulgaria', 'BG', 'BGR'),
(36, 'Burkina Faso', 'BF', 'BFA'),
(37, 'Burundi', 'BI', 'BDI'),
(38, 'Cambodia', 'KH', 'KHM'),
(39, 'Cameroon', 'CM', 'CMR'),
(40, 'Canada', 'CA', 'CAN'),
(41, 'Cape Verde', 'CV', 'CPV'),
(42, 'Cayman Islands', 'KY', 'CYM'),
(43, 'Central African Republic', 'CF', 'CAF'),
(44, 'Chad', 'TD', 'TCD'),
(45, 'Chile', 'CL', 'CHL'),
(46, 'China', 'CN', 'CHN'),
(47, 'Christmas Island', 'CX', 'CXR'),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(49, 'Colombia', 'CO', 'COL'),
(50, 'Comoros', 'KM', 'COM'),
(51, 'Congo', 'CG', 'COG'),
(52, 'Cook Islands', 'CK', 'COK'),
(53, 'Costa Rica', 'CR', 'CRI'),
(54, 'Ivory Coast', 'CI', 'CIV'),
(55, 'Croatia', 'HR', 'HRV'),
(56, 'Cuba', 'CU', 'CUB'),
(57, 'Curacao', 'CW', 'CUW'),
(58, 'Cyprus', 'CY', 'CYP'),
(59, 'Czech Republic', 'CZ', 'CZE'),
(60, 'Democratic Republic of the Congo', 'CD', 'COD'),
(61, 'Denmark', 'DK', 'DNK'),
(62, 'Djibouti', 'DJ', 'DJI'),
(63, 'Dominica', 'DM', 'DMA'),
(64, 'Dominican Republic', 'DO', 'DOM'),
(65, 'Ecuador', 'EC', 'ECU'),
(66, 'Egypt', 'EG', 'EGY'),
(67, 'El Salvador', 'SV', 'SLV'),
(68, 'Equatorial Guinea', 'GQ', 'GNQ'),
(69, 'Eritrea', 'ER', 'ERI'),
(70, 'Estonia', 'EE', 'EST'),
(71, 'Ethiopia', 'ET', 'ETH'),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(73, 'Faroe Islands', 'FO', 'FRO'),
(74, 'Fiji', 'FJ', 'FJI'),
(75, 'Finland', 'FI', 'FIN'),
(76, 'France', 'FR', 'FRA'),
(77, 'French Guiana', 'GF', 'GUF'),
(78, 'French Polynesia', 'PF', 'PYF'),
(79, 'French Southern Territories', 'TF', 'ATF'),
(80, 'Gabon', 'GA', 'GAB'),
(81, 'Gambia', 'GM', 'GMB'),
(82, 'Georgia', 'GE', 'GEO'),
(83, 'Germany', 'DE', 'DEU'),
(84, 'Ghana', 'GH', 'GHA'),
(85, 'Gibraltar', 'GI', 'GIB'),
(86, 'Greece', 'GR', 'GRC'),
(87, 'Greenland', 'GL', 'GRL'),
(88, 'Grenada', 'GD', 'GRD'),
(89, 'Guadaloupe', 'GP', 'GLP'),
(90, 'Guam', 'GU', 'GUM'),
(91, 'Guatemala', 'GT', 'GTM'),
(92, 'Guernsey', 'GG', 'GGY'),
(93, 'Guinea', 'GN', 'GIN'),
(94, 'Guinea-Bissau', 'GW', 'GNB'),
(95, 'Guyana', 'GY', 'GUY'),
(96, 'Haiti', 'HT', 'HTI'),
(97, 'Heard Island and McDonald Islands', 'HM', 'HMD'),
(98, 'Honduras', 'HN', 'HND'),
(99, 'Hong Kong', 'HK', 'HKG'),
(100, 'Hungary', 'HU', 'HUN'),
(101, 'Iceland', 'IS', 'ISL'),
(102, 'India', 'IN', 'IND'),
(103, 'Indonesia', 'ID', 'IDN'),
(104, 'Iran', 'IR', 'IRN'),
(105, 'Iraq', 'IQ', 'IRQ'),
(106, 'Ireland', 'IE', 'IRL'),
(107, 'Isle of Man', 'IM', 'IMN'),
(108, 'Israel', 'IL', 'ISR'),
(109, 'Italy', 'IT', 'ITA'),
(110, 'Jamaica', 'JM', 'JAM'),
(111, 'Japan', 'JP', 'JPN'),
(112, 'Jersey', 'JE', 'JEY'),
(113, 'Jordan', 'JO', 'JOR'),
(114, 'Kazakhstan', 'KZ', 'KAZ'),
(115, 'Kenya', 'KE', 'KEN'),
(116, 'Kiribati', 'KI', 'KIR'),
(117, 'Kosovo', 'XK', '---'),
(118, 'Kuwait', 'KW', 'KWT'),
(119, 'Kyrgyzstan', 'KG', 'KGZ'),
(120, 'Laos', 'LA', 'LAO'),
(121, 'Latvia', 'LV', 'LVA'),
(122, 'Lebanon', 'LB', 'LBN'),
(123, 'Lesotho', 'LS', 'LSO'),
(124, 'Liberia', 'LR', 'LBR'),
(125, 'Libya', 'LY', 'LBY'),
(126, 'Liechtenstein', 'LI', 'LIE'),
(127, 'Lithuania', 'LT', 'LTU'),
(128, 'Luxembourg', 'LU', 'LUX'),
(129, 'Macao', 'MO', 'MAC'),
(130, 'Macedonia', 'MK', 'MKD'),
(131, 'Madagascar', 'MG', 'MDG'),
(132, 'Malawi', 'MW', 'MWI'),
(133, 'Malaysia', 'MY', 'MYS'),
(134, 'Maldives', 'MV', 'MDV'),
(135, 'Mali', 'ML', 'MLI'),
(136, 'Malta', 'MT', 'MLT'),
(137, 'Marshall Islands', 'MH', 'MHL'),
(138, 'Martinique', 'MQ', 'MTQ'),
(139, 'Mauritania', 'MR', 'MRT'),
(140, 'Mauritius', 'MU', 'MUS'),
(141, 'Mayotte', 'YT', 'MYT'),
(142, 'Mexico', 'MX', 'MEX'),
(143, 'Micronesia', 'FM', 'FSM'),
(144, 'Moldava', 'MD', 'MDA'),
(145, 'Monaco', 'MC', 'MCO'),
(146, 'Mongolia', 'MN', 'MNG'),
(147, 'Montenegro', 'ME', 'MNE'),
(148, 'Montserrat', 'MS', 'MSR'),
(149, 'Morocco', 'MA', 'MAR'),
(150, 'Mozambique', 'MZ', 'MOZ'),
(151, 'Myanmar (Burma)', 'MM', 'MMR'),
(152, 'Namibia', 'NA', 'NAM'),
(153, 'Nauru', 'NR', 'NRU'),
(154, 'Nepal', 'NP', 'NPL'),
(155, 'Netherlands', 'NL', 'NLD'),
(156, 'New Caledonia', 'NC', 'NCL'),
(157, 'New Zealand', 'NZ', 'NZL'),
(158, 'Nicaragua', 'NI', 'NIC'),
(159, 'Niger', 'NE', 'NER'),
(160, 'Nigeria', 'NG', 'NGA'),
(161, 'Niue', 'NU', 'NIU'),
(162, 'Norfolk Island', 'NF', 'NFK'),
(163, 'North Korea', 'KP', 'PRK'),
(164, 'Northern Mariana Islands', 'MP', 'MNP'),
(165, 'Norway', 'NO', 'NOR'),
(166, 'Oman', 'OM', 'OMN'),
(167, 'Pakistan', 'PK', 'PAK'),
(168, 'Palau', 'PW', 'PLW'),
(169, 'Palestine', 'PS', 'PSE'),
(170, 'Panama', 'PA', 'PAN'),
(171, 'Papua New Guinea', 'PG', 'PNG'),
(172, 'Paraguay', 'PY', 'PRY'),
(173, 'Peru', 'PE', 'PER'),
(174, 'Phillipines', 'PH', 'PHL'),
(175, 'Pitcairn', 'PN', 'PCN'),
(176, 'Poland', 'PL', 'POL'),
(177, 'Portugal', 'PT', 'PRT'),
(178, 'Puerto Rico', 'PR', 'PRI'),
(179, 'Qatar', 'QA', 'QAT'),
(180, 'Reunion', 'RE', 'REU'),
(181, 'Romania', 'RO', 'ROU'),
(182, 'Russia', 'RU', 'RUS'),
(183, 'Rwanda', 'RW', 'RWA'),
(184, 'Saint Barthelemy', 'BL', 'BLM'),
(185, 'Saint Helena', 'SH', 'SHN'),
(186, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(187, 'Saint Lucia', 'LC', 'LCA'),
(188, 'Saint Martin', 'MF', 'MAF'),
(189, 'Saint Pierre and Miquelon', 'PM', 'SPM'),
(190, 'Saint Vincent and the Grenadines', 'VC', 'VCT'),
(191, 'Samoa', 'WS', 'WSM'),
(192, 'San Marino', 'SM', 'SMR'),
(193, 'Sao Tome and Principe', 'ST', 'STP'),
(194, 'Saudi Arabia', 'SA', 'SAU'),
(195, 'Senegal', 'SN', 'SEN'),
(196, 'Serbia', 'RS', 'SRB'),
(197, 'Seychelles', 'SC', 'SYC'),
(198, 'Sierra Leone', 'SL', 'SLE'),
(199, 'Singapore', 'SG', 'SGP'),
(200, 'Sint Maarten', 'SX', 'SXM'),
(201, 'Slovakia', 'SK', 'SVK'),
(202, 'Slovenia', 'SI', 'SVN'),
(203, 'Solomon Islands', 'SB', 'SLB'),
(204, 'Somalia', 'SO', 'SOM'),
(205, 'South Africa', 'ZA', 'ZAF'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
(207, 'South Korea', 'KR', 'KOR'),
(208, 'South Sudan', 'SS', 'SSD'),
(209, 'Spain', 'ES', 'ESP'),
(210, 'Sri Lanka', 'LK', 'LKA'),
(211, 'Sudan', 'SD', 'SDN'),
(212, 'Suriname', 'SR', 'SUR'),
(213, 'Svalbard and Jan Mayen', 'SJ', 'SJM'),
(214, 'Swaziland', 'SZ', 'SWZ'),
(215, 'Sweden', 'SE', 'SWE'),
(216, 'Switzerland', 'CH', 'CHE'),
(217, 'Syria', 'SY', 'SYR'),
(218, 'Taiwan', 'TW', 'TWN'),
(219, 'Tajikistan', 'TJ', 'TJK'),
(220, 'Tanzania', 'TZ', 'TZA'),
(221, 'Thailand', 'TH', 'THA'),
(222, 'Timor-Leste (East Timor)', 'TL', 'TLS'),
(223, 'Togo', 'TG', 'TGO'),
(224, 'Tokelau', 'TK', 'TKL'),
(225, 'Tonga', 'TO', 'TON'),
(226, 'Trinidad and Tobago', 'TT', 'TTO'),
(227, 'Tunisia', 'TN', 'TUN'),
(228, 'Turkey', 'TR', 'TUR'),
(229, 'Turkmenistan', 'TM', 'TKM'),
(230, 'Turks and Caicos Islands', 'TC', 'TCA'),
(231, 'Tuvalu', 'TV', 'TUV'),
(232, 'Uganda', 'UG', 'UGA'),
(233, 'Ukraine', 'UA', 'UKR'),
(234, 'United Arab Emirates', 'AE', 'ARE'),
(235, 'United Kingdom', 'GB', 'GBR'),
(236, 'United States', 'US', 'USA'),
(237, 'United States Minor Outlying Islands', 'UM', 'UMI'),
(238, 'Uruguay', 'UY', 'URY'),
(239, 'Uzbekistan', 'UZ', 'UZB'),
(240, 'Vanuatu', 'VU', 'VUT'),
(241, 'Vatican City', 'VA', 'VAT'),
(242, 'Venezuela', 'VE', 'VEN'),
(243, 'Vietnam', 'VN', 'VNM'),
(244, 'Virgin Islands, British', 'VG', 'VGB'),
(245, 'Virgin Islands, US', 'VI', 'VIR'),
(246, 'Wallis and Futuna', 'WF', 'WLF'),
(247, 'Western Sahara', 'EH', 'ESH'),
(248, 'Yemen', 'YE', 'YEM'),
(249, 'Zambia', 'ZM', 'ZMB'),
(250, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtype` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `phone_number`, `gender`, `country`, `idtype`, `customer_type`, `id_number`, `acc_status`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:33:56', '2020-12-13 03:33:56'),
(2, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:35:30', '2020-12-13 03:35:30'),
(3, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:37:16', '2020-12-13 03:37:16'),
(4, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:40:07', '2020-12-13 03:40:07'),
(5, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:41:12', '2020-12-13 03:41:12'),
(6, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:44:12', '2020-12-13 03:44:12'),
(7, 'John', 'Doe', 'o@gmail.com', '1234', 'female', 'USA', 2, '', 'SW223R', 0, '2020-12-13 03:44:39', '2020-12-13 03:44:39'),
(8, 'd', 'b', 'b@f.com', '0999', 'female', 'UK', 2, '', 'TAS123', 1, '2020-12-15 02:49:20', '2020-12-15 02:49:20'),
(9, 'asbj', 'jjnjskdnkj', 'kjkj@j.ckj.com', '+255673083312', 'female', 'UK', 2, '', 'TAS123', 1, '2020-12-15 04:07:40', '2020-12-15 04:09:39'),
(10, 'asbj', 'jjnjskdnkj', 'kjkj@j.ckj.com', '+255673083312', 'female', 'UK', 2, '', 'TAS123', 1, '2020-12-15 04:08:30', '2020-12-15 04:08:30'),
(11, 'Demo', 'Juma', 'jj@gmail.com', '+255673083312', 'female', 'UK', 2, '', 'TAS123', 1, '2020-12-18 13:23:00', '2020-12-18 13:23:00'),
(12, 'Demo', 'Juma', 'jj@gmail.com', '+255673083312', 'female', 'UK', 2, '', 'TAS123', 1, '2020-12-18 13:25:44', '2020-12-18 13:25:44'),
(13, 'Mohamed', 'Adulkalim', 'mu@gmail.com', '07654321889', 'male', 'Tanzania', 26, 'individual', 'TAE2323', 1, '2020-12-21 02:49:51', '2020-12-21 02:49:51'),
(14, 'Mohamed', 'Adulkalim', 'mu@gmail.com', '07654321889', 'male', 'Tanzania', 26, 'individual', 'TAE2323', 1, '2020-12-21 02:50:22', '2020-12-21 02:50:22'),
(15, 'A', 'S', 's@sdk.com', '000030', 'female', 'Tanzania', 24, 'individual', '3233', 1, '2020-12-23 11:29:20', '2021-01-15 09:30:13'),
(16, 'Demo', 'demo', 'dddd@gmail.com', '0766665666', 'female', 'Tanzania', 24, 'individual', 'TAE3339', 2, '2020-12-29 04:21:07', '2020-12-31 06:21:32'),
(17, 'Demo', 'demo', 'dddd@gmail.com', '0766665666', 'female', 'Tanzania', 24, 'individual', 'TAE3339', 1, '2020-12-29 04:21:54', '2020-12-29 04:21:54'),
(18, 'demo2', 'demo2', 'demo2@gmail.com', '07656565656', 'male', 'Tanzania', 24, 'individual', 'TAE393739', 2, '2020-12-29 04:24:53', '2021-01-01 06:12:43'),
(19, 'Demo', 'Darius', 'darius@gmail.com', '0756672767', 'male', 'Tanzania', 24, 'Individual', 'TAE3728', 0, '2021-01-01 05:58:16', '2021-01-01 05:58:16'),
(20, 'Demo', 'Darius', 'darius@gmail.com', '0756672767', 'male', 'Tanzania', 24, 'Individual', 'TAE3728', 0, '2021-01-01 06:00:15', '2021-01-01 06:00:15'),
(21, 'Demo', 'Darius', 'darius@gmail.com', '0756672767', 'male', 'Tanzania', 24, 'Individual', 'TAE3728', 0, '2021-01-01 06:01:57', '2021-01-01 06:01:57'),
(22, 'jhjh', 'jhjh', 'hkhkj@gg.com', '0765', 'male', 'Afghanistan', 24, 'Individual', '77777', 0, '2021-01-01 06:04:34', '2021-01-01 06:04:34'),
(23, 'Wilium', 'Paul', 'willy@gmail.com', '0693073832', 'male', 'Tanzania', 24, 'individual', '2324432', 1, '2021-01-05 05:07:36', '2021-01-05 05:07:36'),
(24, 'Mohamed', 'Juma', 'moh@gmail.com', '043212112', 'male', 'Tanzania', 24, 'individual', '3333', 1, '2021-01-05 05:09:50', '2021-01-05 05:09:50'),
(25, 'Geofrey', 'Musa', 'g@gmail.com', '076545627', 'male', 'Tanzania', 2, 'individual', '4534d', 1, '2021-01-05 06:35:54', '2021-01-05 06:35:54'),
(26, 'Samata', 'John', 'sam@gmaill.com', '07654321', 'male', 'Tanzania', 2, 'individual', '4444', 2, '2021-01-05 06:43:14', '2021-01-15 09:31:02'),
(27, 'Paul', 'James', 'p@gmail.com', '0887773', 'male', 'Tanzania', 2, 'Individual', '5464', 1, '2021-01-05 06:49:49', '2021-01-19 08:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bills`
--

CREATE TABLE `customer_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `bill_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_bills`
--

INSERT INTO `customer_bills` (`id`, `customer_id`, `bill_from`, `amount`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 13, 'Roundly Service', 30000, 8, '2021-01-05 06:41:17', '2021-01-05 06:41:17'),
(2, 26, 'Roundly Service', 2000, 8, '2021-01-05 06:45:01', '2021-01-05 06:45:01'),
(3, 24, 'Roundly Service', 7000, 8, '2021-01-05 08:23:00', '2021-01-05 08:23:00'),
(4, 24, 'Room Service', 2000, 8, '2021-01-05 08:23:09', '2021-01-05 08:23:09'),
(5, 26, 'Roundly Service', 5000, 8, '2021-01-05 09:52:18', '2021-01-05 09:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `company_name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Tigo', 'info@tigo.com', '0787878787', 'Mbeya', '2020-12-20 03:11:30', '2020-12-20 03:11:30'),
(2, 'Tigo', 'info@tigo.com', '0787878787', 'Mbeya', '2020-12-20 03:13:20', '2020-12-20 03:13:20'),
(3, 'Tigo', 'info@tigo.com', '0787878787', 'Mbeya', '2020-12-20 03:18:22', '2020-12-20 03:18:22'),
(4, 'Tigo', 'info@tigo.com', '0787878787', 'Mbeya', '2020-12-20 03:19:19', '2020-12-20 03:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `dish_categories`
--

CREATE TABLE `dish_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dish_categories`
--

INSERT INTO `dish_categories` (`id`, `food_category_name`, `created_at`, `updated_at`) VALUES
(1, 'Break Fast', '2020-12-11 06:10:23', '2020-12-11 06:10:23'),
(2, 'Lunch', '2020-12-11 06:12:38', '2020-12-11 06:12:38'),
(3, 'Dinner', '2020-12-11 06:12:46', '2020-12-11 06:12:46'),
(4, 'Apetizer', '2020-12-11 06:12:57', '2020-12-11 06:12:57'),
(5, 'Supper', '2020-12-12 09:01:42', '2020-12-12 09:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `dish_menus`
--

CREATE TABLE `dish_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_item_price` double NOT NULL,
  `item_category` bigint(20) UNSIGNED NOT NULL,
  `dish_cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dish_menus`
--

INSERT INTO `dish_menus` (`id`, `food_item_name`, `food_item_price`, `item_category`, `dish_cover`, `created_at`, `updated_at`) VALUES
(2, 'Kuku Rosti', 25000, 3, '1607680926.jpg', '2020-12-11 07:02:06', '2020-12-11 07:02:06'),
(3, 'Choma', 12000, 3, '1607681257.jpg', '2020-12-11 07:07:37', '2020-12-11 07:07:37'),
(4, 'Mandi', 9000, 4, '1607681297.jpg', '2020-12-11 07:08:18', '2020-12-11 07:08:18'),
(5, 'Chai Nzito', 1500, 1, '1607681337.jpg', '2020-12-11 07:08:57', '2020-12-11 07:08:57'),
(7, 'Samaki Choma', 20000, 5, '1607774599.jpg', '2020-12-12 09:03:19', '2020-12-12 09:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`, `created_at`, `updated_at`) VALUES
(1, 'Check in', '2020-09-23 14:27:59', '2020-09-23 14:27:59'),
(2, 'Check Out', '2020-09-23 14:28:12', '2020-09-23 14:28:12'),
(3, 'Reservation', '2020-09-23 14:28:20', '2020-09-23 14:28:20'),
(4, 'Bill', '2020-09-23 14:31:01', '2020-09-23 14:31:01'),
(5, 'Print', '2020-09-23 14:31:13', '2020-09-23 14:31:13'),
(6, 'Report', '2020-09-23 14:31:19', '2020-09-23 14:31:19'),
(7, 'KOT', '2020-09-23 16:33:34', '2020-09-23 16:33:34'),
(8, 'Kuweka vifaa', '2020-09-24 04:05:48', '2020-09-24 04:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `group_accommodations`
--

CREATE TABLE `group_accommodations` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `number_of_guests` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode_id` int(20) NOT NULL,
  `room_price_applied` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_status` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_accommodations`
--

INSERT INTO `group_accommodations` (`id`, `group_id`, `number_of_guests`, `payment_mode_id`, `room_price_applied`, `check_in_date`, `check_out_date`, `group_status`, `created_at`, `updated_at`) VALUES
(1, 1, '7', 1, '800000', '21-12-2020', '24-12-2020', 1, '2020-12-20 03:19:19', '2020-12-20 03:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `group_statuses`
--

CREATE TABLE `group_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_statuses`
--

INSERT INTO `group_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'InActive', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ids`
--

CREATE TABLE `ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ids`
--

INSERT INTO `ids` (`id`, `id_name`, `created_at`, `updated_at`) VALUES
(2, 'Driving Licence', '2020-09-25 03:28:32', '2020-09-25 03:28:32'),
(24, 'National ID', '2020-09-25 06:12:04', '2020-09-25 06:12:04'),
(26, 'Passport', '2020-09-25 07:53:39', '2020-09-25 07:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_number`, `item_name`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'BEACO/ITEM/878', 'Maharagwe', 0, '2020-12-18 04:38:25', '2020-12-18 04:38:25'),
(2, 'BEACO/ITEM/855', 'Viazi', 0, '2020-12-18 04:38:31', '2020-12-18 04:38:31'),
(3, 'BEACO/ITEM/530', 'Bilian Masala', 0, '2020-12-18 04:38:42', '2020-12-18 04:38:42'),
(4, 'BEACO/ITEM/759', 'Mchele Kitumbo', 0, '2020-12-18 04:38:53', '2020-12-18 04:38:53'),
(6, 'BEACO/ITEM/640', 'Samaki Kibuha', 0, '2020-12-18 04:39:58', '2020-12-18 04:39:58'),
(7, 'BEACO/ITEM/880', 'Kuku Wa kienyeji', 0, '2020-12-18 04:40:16', '2020-12-18 04:40:16'),
(8, 'BEACO/ITEM/554', 'Maini', 0, '2020-12-18 04:40:20', '2020-12-18 04:40:20'),
(9, 'BEACO/ITEM/455', 'Dagaa', 0, '2020-12-18 04:40:24', '2020-12-18 04:40:24'),
(10, 'BEACO/ITEM/809', 'Pilipili', 0, '2020-12-18 04:40:29', '2020-12-18 04:40:29'),
(12, 'BEACO/ITEM/69', 'Cockacola ya kopo', 0, '2020-12-18 04:40:55', '2020-12-18 04:40:55'),
(13, 'BEACO/ITEM/938', 'Nazi', 0, '2020-12-18 04:40:59', '2020-12-18 04:40:59'),
(15, 'BEACO/ITEM/557', 'Maji ya kilimanjaro ML 300', 2, '2020-12-18 04:41:27', '2020-12-18 04:41:27'),
(16, 'BEACO/ITEM/237', 'Maembe', 8, '2020-12-21 03:38:16', '2020-12-21 03:38:16'),
(18, 'BEACO/ITEM/20', '1.5 Lt Kilimanjaro', 2, '2020-12-29 04:43:31', '2020-12-29 04:43:31'),
(19, 'BEACO/ITEM/506', '1 Lt Kilimanjaro', 2, '2020-12-29 04:43:52', '2020-12-29 04:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `item_number`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'BEACO/CAT/369', 'Viungo', '2020-12-21 03:24:01', '2020-12-21 03:24:01'),
(2, 'BEACO/CAT/454', 'Enegy', '2020-12-21 03:24:09', '2020-12-21 03:24:09'),
(4, 'BEACO/CAT/787', 'Fish', '2020-12-21 03:24:31', '2020-12-21 03:24:31'),
(5, 'BEACO/CAT/432', 'Beef', '2020-12-21 03:24:48', '2020-12-21 03:24:48'),
(6, 'BEACO/CAT/807', 'Chicken', '2020-12-21 03:24:57', '2020-12-21 03:24:57'),
(8, 'BEACO/CAT/418', 'Others', '2020-12-21 03:25:20', '2020-12-21 03:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `item_issueds`
--

CREATE TABLE `item_issueds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_measurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prepared_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prepared` tinyint(1) NOT NULL DEFAULT 0,
  `prepared_by` int(11) DEFAULT NULL,
  `received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_issueds`
--

INSERT INTO `item_issueds` (`id`, `issue_number`, `item_name`, `item_quantity`, `item_measurement`, `issued_by`, `issued_to`, `issued_comment`, `prepared_no`, `created_at`, `updated_at`, `prepared`, `prepared_by`, `received`, `comment`) VALUES
(1, 'BEACO/ISSUE/8798977', 'Maini', '5', 'kg', '8', 'kitchen', NULL, '834811', '2020-12-18 05:53:39', '2020-12-18 05:53:39', 1, 8, 'No', NULL),
(2, 'BEACO/ISSUE/7870385', 'Maji ya kilimanjaro ML 300', '7', 'caton', '8', 'kitchen', NULL, '834811', '2020-12-18 05:56:02', '2020-12-18 05:56:02', 1, 8, 'No', NULL),
(3, 'BEACO/ISSUE/2304717', 'Maji ya kilimanjaro ML 300', '12', 'caton', '8', 'Kitchen', NULL, '834811', '2020-12-18 05:56:40', '2020-12-18 05:56:40', 1, 8, 'No', NULL),
(4, 'BEACO/ISSUE/9195681', 'Dagaa', '5', 'kg', '8', 'kitchen', 'Dagaa hawa ni wa mwisho boya ww', '834811', '2020-12-18 06:13:22', '2020-12-18 06:13:22', 1, 8, 'No', NULL),
(5, 'BEACO/ISSUE/9514615', 'Bilian Masala', '3', 'pc', '8', 'Kitchen', NULL, '834811', '2020-12-18 06:13:40', '2020-12-18 06:13:40', 1, 8, 'Yes', 'Nimepokea');

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_purchasings`
--

CREATE TABLE `kitchen_purchasings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitchen_purchasings`
--

INSERT INTO `kitchen_purchasings` (`id`, `item_number`, `item_name`, `item_unit`, `measurement`, `created_at`, `updated_at`, `unit_price`, `total_value`) VALUES
(1, 'BEACO/89809622', 'Samaki Kibuha', '20', 'kg', '2020-12-16 05:27:01', '2020-12-16 05:27:01', '3000', 60000),
(2, 'BEACO/53668017', 'Mchele Wa Bilian', '50', 'kg', '2020-12-16 05:30:56', '2020-12-16 05:30:56', '3000', 150000),
(4, 'BEACO/97364209', 'Black Vineger', '50', 'pc', '2020-12-16 07:28:51', '2020-12-16 07:28:51', '2500', 125000);

-- --------------------------------------------------------

--
-- Table structure for table `kot_orders`
--

CREATE TABLE `kot_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qrtxt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `prepared_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kot_orders`
--

INSERT INTO `kot_orders` (`id`, `item_name`, `quantity`, `price`, `table`, `customer`, `qrtxt`, `status`, `prepared_by`, `created_at`, `updated_at`) VALUES
(19, 'Choma', 1, '12000', 'TABLE NO 2', 'Walkin Customer', 'BEACO/U5b1X', 0, 1, '2020-12-14 04:04:27', '2020-12-14 04:04:27'),
(20, 'Chai Nzito', 1, '1500', 'TABLE NO 2', 'Walkin Customer', 'BEACO/U5b1X', 0, 1, '2020-12-13 04:04:27', '2020-12-14 04:04:27'),
(21, 'Samaki Choma', 1, '20000', 'TABLE NO 2', 'Walkin Customer', 'BEACO/U5b1X', 0, 1, '2020-12-11 04:04:27', '2020-12-14 04:04:27'),
(22, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/UnTA9', 0, 1, '2020-12-01 04:06:10', '2020-12-14 04:06:10'),
(23, 'Chai Nzito', 1, '1500', 'TABLE NO 3', 'Walkin Customer', 'BEACO/UnTA9', 0, 1, '2020-11-02 04:06:10', '2020-12-14 04:06:10'),
(24, 'Samaki Choma', 1, '20000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/UnTA9', 0, 1, '2020-12-14 04:06:10', '2020-12-14 04:06:10'),
(25, 'Kuku Rosti', 4, '25000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/yd2pc', 0, 1, '2020-12-14 04:08:46', '2020-12-14 04:08:46'),
(26, 'Samaki Choma', 3, '20000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/yd2pc', 0, 1, '2020-12-14 04:08:46', '2020-12-14 04:08:46'),
(27, 'Tambi Kuku', 1, '15000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/yd2pc', 0, 1, '2020-12-14 04:08:46', '2020-12-14 04:08:46'),
(28, 'Kuku Rosti', 1, '25000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/icQwG', 0, 1, '2020-12-14 07:13:00', '2020-12-14 07:13:00'),
(29, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/icQwG', 0, 1, '2020-12-14 07:13:00', '2020-12-14 07:13:00'),
(30, 'Chai Nzito', 1, '1500', 'TABLE NO 3', 'Walkin Customer', 'BEACO/icQwG', 0, 1, '2020-12-14 07:13:00', '2020-12-14 07:13:00'),
(31, 'Chai Nzito', 1, '1500', 'TABLE NO 2', 'Walkin Customer', 'BEACO/UZVaL', 0, 8, '2020-12-18 13:11:07', '2020-12-18 13:11:07'),
(32, 'Choma', 1, '12000', 'TABLE NO 2', 'Walkin Customer', 'BEACO/UZVaL', 0, 8, '2020-12-18 13:11:07', '2020-12-18 13:11:07'),
(33, 'Tambi Kuku', 1, '15000', 'TABLE NO 2', 'Walkin Customer', 'BEACO/UZVaL', 0, 8, '2020-12-18 13:11:07', '2020-12-18 13:11:07'),
(34, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/xK3wO', 0, 8, '2020-12-21 10:18:01', '2020-12-21 10:18:01'),
(35, 'Mandi', 1, '9000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/xK3wO', 0, 8, '2020-12-21 10:18:01', '2020-12-21 10:18:01'),
(36, 'Chai Nzito', 1, '1500', 'TABLE NO 3', 'Walkin Customer', 'BEACO/xK3wO', 0, 8, '2020-12-21 10:18:01', '2020-12-21 10:18:01'),
(37, 'Kuku Rosti', 1, '25000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/GdIfL', 0, 8, '2020-12-31 06:03:49', '2020-12-31 06:03:49'),
(38, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/GdIfL', 0, 8, '2020-12-31 06:03:49', '2020-12-31 06:03:49'),
(39, 'Mandi', 1, '9000', 'TABLE NO 2', 'Walkin Customer', 'BEACO/5wisj', 0, 8, '2020-12-31 06:31:14', '2020-12-31 06:31:14'),
(40, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/ijeJ9', 0, 1, '2021-01-15 10:31:12', '2021-01-15 10:31:12'),
(41, 'Mandi', 1, '9000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/ijeJ9', 0, 1, '2021-01-15 10:31:12', '2021-01-15 10:31:12'),
(42, 'Samaki Choma', 1, '20000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/ijeJ9', 0, 1, '2021-01-15 10:31:12', '2021-01-15 10:31:12'),
(43, 'Kuku Rosti', 1, '25000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/nFHZY', 0, 1, '2021-01-15 10:35:50', '2021-01-15 10:35:50'),
(44, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/nFHZY', 0, 1, '2021-01-15 10:35:50', '2021-01-15 10:35:50'),
(45, 'Kuku Rosti', 1, '25000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/nFHZY', 0, 1, '2021-01-15 10:52:55', '2021-01-15 10:52:55'),
(46, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/nFHZY', 0, 1, '2021-01-15 10:52:55', '2021-01-15 10:52:55'),
(47, 'Mandi', 1, '9000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/nFHZY', 0, 1, '2021-01-15 10:52:55', '2021-01-15 10:52:55'),
(48, 'Kuku Rosti', 1, '25000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/MMLrj', 0, 1, '2021-01-15 10:53:27', '2021-01-15 10:53:27'),
(49, 'Choma', 1, '12000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/MMLrj', 0, 1, '2021-01-15 10:53:27', '2021-01-15 10:53:27'),
(50, 'Chai Nzito', 1, '1500', 'TABLE NO 3', 'Walkin Customer', 'BEACO/MMLrj', 0, 1, '2021-01-15 10:53:27', '2021-01-15 10:53:27'),
(51, 'Mandi', 1, '9000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/X6hE7', 0, 1, '2021-01-15 10:54:50', '2021-01-15 10:54:50'),
(52, 'Chai Nzito', 1, '1500', 'TABLE NO 3', 'Walkin Customer', 'BEACO/X6hE7', 0, 1, '2021-01-15 10:54:50', '2021-01-15 10:54:50'),
(53, 'Samaki Choma', 1, '20000', 'TABLE NO 3', 'Walkin Customer', 'BEACO/X6hE7', 0, 1, '2021-01-15 10:54:50', '2021-01-15 10:54:50'),
(54, 'Mandi', 1, '9000', 'TABLE NO 4', 'Walkin Customer', 'BEACO/vPyED', 0, 1, '2021-01-19 09:02:44', '2021-01-19 09:02:44'),
(55, 'Chai Nzito', 1, '1500', 'TABLE NO 4', 'Walkin Customer', 'BEACO/vPyED', 0, 1, '2021-01-19 09:02:44', '2021-01-19 09:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `meal_statuses`
--

CREATE TABLE `meal_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meal_statuses`
--

INSERT INTO `meal_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Available', NULL, NULL),
(2, 'Over', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meal_types`
--

CREATE TABLE `meal_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_23_102704_create_permission_tables', 2),
(5, '2020_09_23_102731_create_products_table', 2),
(6, '2020_09_23_153027_create_modules_table', 3),
(7, '2020_09_23_200053_create_features_table', 4),
(8, '2020_09_23_210838_create_module_features_table', 5),
(9, '2020_09_25_090554_create_ids_table', 6),
(10, '2020_09_25_150130_create_customers_table', 7),
(11, '2020_09_25_152100_create_reservers_table', 8),
(12, '2020_09_25_152331_create_room_categories_table', 8),
(13, '2020_09_25_152350_create_room_statuses_table', 9),
(14, '2020_09_25_152352_create_rooms_table', 10),
(15, '2020_09_25_154323_create_bars_table', 10),
(16, '2020_09_25_154618_create_bar_item_categories_table', 10),
(17, '2020_09_25_154820_create_meal_statuses_table', 11),
(18, '2020_09_25_154822_create_bar_items_table', 11),
(19, '2020_09_25_155520_create_bar_assigned_staff_table', 11),
(20, '2020_09_25_160303_create_restaurants_table', 11),
(21, '2020_09_25_160314_create_restaurant_item_categories_table', 12),
(22, '2020_09_25_160315_create_restaurant_items_table', 12),
(23, '2020_09_25_160348_create_meal_types_table', 12),
(24, '2020_09_25_160404_create_restaurant_assign_staff_table', 12),
(26, '2020_09_25_161808_create_payment_modes_table', 12),
(27, '2020_09_25_161809_create_accomodation_details_table', 13),
(28, '2020_09_25_161807_create_customers_table', 14),
(29, '2020_09_25_161810_create_accomodation_details_table', 15),
(30, '2020_12_11_082458_create_tables_table', 16),
(31, '2020_12_11_083906_create_dish_categories_table', 17),
(32, '2020_12_11_093006_create_dish_menus_table', 18),
(33, '2020_12_14_061214_create_kot_orders_table', 19),
(34, '2020_12_14_141149_create_staff_table', 20),
(35, '2020_12_16_080726_create_kitchen_purchasings_table', 21),
(36, '2020_12_16_090830_create_bar_purchasings_table', 22),
(37, '2020_12_16_092225_create_other_purchasings_table', 23),
(38, '2020_12_18_073317_create_items_table', 24),
(39, '2020_12_18_080443_create_item_issueds_table', 25),
(40, '2020_12_18_155104_create_customer_groups_table', 26),
(41, '2020_12_18_161943_create_group_accommodations_table', 26),
(42, '2020_12_19_084159_create_group_statuses_table', 26),
(43, '2020_12_17_144658_create_countries_table', 27),
(44, '2020_12_21_061730_create_item_categories_table', 28),
(45, '2020_12_21_072544_create_restaurant_requests_table', 29),
(46, '2020_12_23_152354_create_rooms_table', 30),
(47, '2020_12_30_140220_create_receive_payments_table', 30),
(48, '2021_01_05_090635_create_customer_bills_table', 30),
(49, '2020_09_25_161503_create_conferences_table', 31),
(50, '2021_01_06_091742_create_conference_bills_table', 32),
(51, '2021_01_15_153033_create_video_images_table', 33),
(52, '2021_01_19_090409_create_restaurant_bills_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 8),
(8, 'App\\User', 9),
(10, 'App\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `created_at`, `updated_at`) VALUES
(2, 'Restaurant', '2020-09-23 13:49:02', '2020-09-23 13:49:02'),
(3, 'Bar', '2020-09-23 16:35:46', '2020-09-23 16:35:46'),
(4, 'Conference', '2020-09-23 16:35:54', '2020-09-23 16:35:54'),
(5, 'Finance', '2020-09-23 16:35:59', '2020-09-23 16:35:59'),
(6, 'Inventory', '2020-09-23 16:36:14', '2020-09-23 16:36:14'),
(10, 'Demo', '2020-09-24 01:43:51', '2020-09-24 01:43:51'),
(11, 'Stoo', '2020-09-24 04:05:31', '2020-09-24 04:05:31'),
(12, 'id', '2020-09-25 03:04:15', '2020-09-25 03:04:15'),
(13, 'Accomodation', '2020-09-25 08:28:11', '2020-09-25 08:28:11'),
(14, 'room_category', '2020-09-25 13:37:16', '2020-09-25 13:37:16'),
(15, 'room_status', '2020-09-25 13:54:52', '2020-09-25 13:54:52'),
(16, 'room', '2020-09-25 14:30:56', '2020-09-25 14:30:56'),
(17, 'bar', '2020-09-26 03:13:43', '2020-09-26 03:13:43'),
(18, 'restaurant-pos', '2020-12-14 12:19:57', '2020-12-14 12:19:57'),
(19, 'Store', '2020-12-14 13:35:24', '2020-12-14 13:35:24'),
(20, 'finance', '2020-12-14 13:39:32', '2020-12-14 13:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `module_features`
--

CREATE TABLE `module_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_features`
--

INSERT INTO `module_features` (`id`, `module_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2020-09-23 15:36:03', '2020-09-23 15:36:03'),
(3, 1, 3, '2020-09-23 15:36:21', '2020-09-23 15:36:21'),
(4, 2, 7, '2020-09-23 16:34:10', '2020-09-23 16:34:10'),
(5, 2, 4, '2020-09-23 16:34:20', '2020-09-23 16:34:20'),
(7, 1, 5, '2020-09-23 16:37:01', '2020-09-23 16:37:01'),
(8, 1, 6, '2020-09-23 16:37:09', '2020-09-23 16:37:09'),
(9, 3, 4, '2020-09-24 01:58:10', '2020-09-24 01:58:10'),
(10, 3, 5, '2020-09-24 01:58:17', '2020-09-24 01:58:17'),
(11, 3, 6, '2020-09-24 01:58:22', '2020-09-24 01:58:22'),
(12, 11, 8, '2020-09-24 04:06:14', '2020-09-24 04:06:14'),
(13, 3, 8, '2020-09-25 08:32:13', '2020-09-25 08:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `other_purchasings`
--

CREATE TABLE `other_purchasings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepared_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prepared` tinyint(1) NOT NULL DEFAULT 0,
  `prepared_by` int(11) NOT NULL DEFAULT 0,
  `received` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_purchasings`
--

INSERT INTO `other_purchasings` (`id`, `item_number`, `item_name`, `item_unit`, `unit_price`, `measurement`, `total_value`, `prepared_no`, `prepared`, `prepared_by`, `received`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'BEACO/OTHER/76763391', 'Sabuni Ya unga', '5', '1000', 'pc', '5000', '958833', 1, 8, 'No', '', '2020-12-16 06:26:27', '2020-12-17 05:20:59'),
(2, 'BEACO/OTHER/60135723', 'Nyanya', '10', '1000', 'kg', '10000', '958833', 1, 8, 'Yes', '', '2020-12-16 09:21:04', '2020-12-16 09:21:04'),
(4, 'BEACO/OTHER/867868', 'Carot', '12', '1000', 'kg', '12000', '958833', 1, 8, 'Yes', 'Nimepokea 12', '2020-12-17 04:45:12', '2020-12-17 04:45:12'),
(5, 'BEACO/OTHER/93312618', 'Mchele', '100', '2000', 'kg', '200000', '958355', 1, 8, 'No', '', '2020-12-17 05:25:47', '2020-12-17 05:25:47'),
(6, 'BEACO/OTHER/77643794', 'Samaki Kibua', '30', '12000', 'kg', '360000', '958355', 1, 8, 'Yes', 'Ziko 15', '2020-12-17 05:26:08', '2020-12-17 05:26:08'),
(7, 'BEACO/OTHER/44170150', 'Maembe', '30', '1000', 'bunch', '30000', '958355', 1, 8, 'No', '', '2020-12-17 05:26:52', '2020-12-17 05:26:52'),
(8, 'BEACO/OTHER/4994989', 'Mayai', '10', '7000', 'other', '70000', '301844', 1, 8, 'No', 'null', '2020-12-17 08:50:48', '2020-12-17 08:50:48'),
(9, 'BEACO/OTHER/51683852', 'Matikiti', '10', '1500', 'kg', '30000', '301844', 1, 8, 'Yes', 'null', '2020-12-17 08:51:09', '2020-12-17 08:51:09'),
(10, 'BEACO/OTHER/57184692', 'Pilipili', '8', '1200', 'kg', '9600', '470766', 1, 8, 'No', 'null', '2020-11-18 04:56:37', '2020-12-18 04:56:37'),
(11, 'BEACO/OTHER/34708650', 'Nazi', '5', '1400', 'bunch', '7000', '470766', 1, 8, 'No', 'null', '2020-11-18 06:01:12', '2020-12-18 06:01:12'),
(12, 'BEACO/OTHER/20421927', 'Maji ya kilimanjaro ML 300', '8', '4493', 'caton', '35944', '362122', 1, 8, 'No', 'null', '2020-12-21 04:07:00', '2020-12-21 04:07:00'),
(13, 'BEACO/OTHER/84130912', 'Cockacola ya kopo', '6', '9000', 'other', '54000', '362122', 1, 8, 'No', 'null', '2020-12-21 04:07:25', '2020-12-21 04:07:25'),
(14, 'BEACO/OTHER/6664221', 'Dagaa', '20', '1000', 'kg', '20000', '22067', 1, 8, 'Yes', 'nimepokea', '2020-12-21 10:27:34', '2020-12-21 10:27:34'),
(15, 'BEACO/OTHER/35164016', 'Viazi', '50', '2000', 'kg', '100000', '22067', 1, 8, 'Yes', 'Nimepokea', '2020-12-21 10:27:50', '2020-12-21 10:27:50'),
(16, 'BEACO/OTHER/4858615', 'Kuku Wa kienyeji', '200', '4000', 'kg', '800000', '22067', 1, 8, 'Yes', 'Nimepokea', '2020-12-21 10:28:08', '2020-12-21 10:28:08'),
(17, 'BEACO/OTHER/42909517', 'Mchele Kitumbo', '0', '3000', 'kg', '180000', '226575', 1, 8, 'Yes', 'received', '2020-12-24 04:02:10', '2020-12-24 04:02:10'),
(19, 'BEACO/OTHER/98980579', 'Samaki Kibuha', '0', '0', 'kg', '0', '329863', 1, 8, 'Yes', 'received', '2021-01-01 06:31:51', '2021-01-01 06:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_mode_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `payment_mode_name`, `payment_mode_status`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '1', NULL, NULL),
(2, 'Card', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(2, 'role-create', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(3, 'role-edit', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(4, 'role-delete', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(5, 'product-list', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(6, 'product-create', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(7, 'product-edit', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(8, 'product-delete', 'web', '2020-09-23 05:32:25', '2020-09-23 05:32:25'),
(13, 'module-list', 'web', NULL, NULL),
(14, 'module-create', 'web', NULL, NULL),
(15, 'module-delete', 'web', NULL, NULL),
(16, 'module-update', 'web', NULL, NULL),
(17, 'feature-list', 'web', NULL, NULL),
(18, 'feature-delete', 'web', NULL, NULL),
(19, 'feature-create', 'web', NULL, NULL),
(20, 'feature-edit', 'web', NULL, NULL),
(22, 'Demo-list', 'web', '2020-09-24 01:43:51', '2020-09-24 01:43:51'),
(23, 'Demo-create', 'web', '2020-09-24 01:43:51', '2020-09-24 01:43:51'),
(24, 'Demo-edit', 'web', '2020-09-24 01:43:51', '2020-09-24 01:43:51'),
(25, 'Demo-delete', 'web', '2020-09-24 01:43:51', '2020-09-24 01:43:51'),
(26, 'Stoo-list', 'web', '2020-09-24 04:05:31', '2020-09-24 04:05:31'),
(27, 'Stoo-create', 'web', '2020-09-24 04:05:31', '2020-09-24 04:05:31'),
(28, 'Stoo-edit', 'web', '2020-09-24 04:05:31', '2020-09-24 04:05:31'),
(29, 'Stoo-delete', 'web', '2020-09-24 04:05:31', '2020-09-24 04:05:31'),
(30, 'id-list', 'web', '2020-09-25 03:04:15', '2020-09-25 03:04:15'),
(31, 'id-create', 'web', '2020-09-25 03:04:15', '2020-09-25 03:04:15'),
(32, 'id-edit', 'web', '2020-09-25 03:04:15', '2020-09-25 03:04:15'),
(33, 'id-delete', 'web', '2020-09-25 03:04:15', '2020-09-25 03:04:15'),
(34, 'Accomodation-list', 'web', '2020-09-25 08:28:11', '2020-09-25 08:28:11'),
(35, 'Accomodation-create', 'web', '2020-09-25 08:28:11', '2020-09-25 08:28:11'),
(36, 'Accomodation-edit', 'web', '2020-09-25 08:28:11', '2020-09-25 08:28:11'),
(37, 'Accomodation-delete', 'web', '2020-09-25 08:28:11', '2020-09-25 08:28:11'),
(38, 'room_category-list', 'web', '2020-09-25 13:37:16', '2020-09-25 13:37:16'),
(39, 'room_category-create', 'web', '2020-09-25 13:37:16', '2020-09-25 13:37:16'),
(40, 'room_category-edit', 'web', '2020-09-25 13:37:16', '2020-09-25 13:37:16'),
(41, 'room_category-delete', 'web', '2020-09-25 13:37:16', '2020-09-25 13:37:16'),
(42, 'room_status-list', 'web', '2020-09-25 13:54:52', '2020-09-25 13:54:52'),
(43, 'room_status-create', 'web', '2020-09-25 13:54:52', '2020-09-25 13:54:52'),
(44, 'room_status-edit', 'web', '2020-09-25 13:54:52', '2020-09-25 13:54:52'),
(45, 'room_status-delete', 'web', '2020-09-25 13:54:52', '2020-09-25 13:54:52'),
(46, 'room-list', 'web', '2020-09-25 14:30:56', '2020-09-25 14:30:56'),
(47, 'room-create', 'web', '2020-09-25 14:30:56', '2020-09-25 14:30:56'),
(48, 'room-edit', 'web', '2020-09-25 14:30:56', '2020-09-25 14:30:56'),
(49, 'room-delete', 'web', '2020-09-25 14:30:56', '2020-09-25 14:30:56'),
(50, 'bar-list', 'web', '2020-09-26 03:13:43', '2020-09-26 03:13:43'),
(51, 'bar-create', 'web', '2020-09-26 03:13:43', '2020-09-26 03:13:43'),
(52, 'bar-edit', 'web', '2020-09-26 03:13:43', '2020-09-26 03:13:43'),
(53, 'bar-delete', 'web', '2020-09-26 03:13:43', '2020-09-26 03:13:43'),
(54, 'restaurant-pos-list', 'web', '2020-12-14 12:19:57', '2020-12-14 12:19:57'),
(55, 'restaurant-pos-create', 'web', '2020-12-14 12:19:57', '2020-12-14 12:19:57'),
(56, 'restaurant-pos-edit', 'web', '2020-12-14 12:19:57', '2020-12-14 12:19:57'),
(57, 'restaurant-pos-delete', 'web', '2020-12-14 12:19:57', '2020-12-14 12:19:57'),
(58, 'Store-list', 'web', '2020-12-14 13:35:24', '2020-12-14 13:35:24'),
(59, 'Store-create', 'web', '2020-12-14 13:35:24', '2020-12-14 13:35:24'),
(60, 'Store-edit', 'web', '2020-12-14 13:35:24', '2020-12-14 13:35:24'),
(61, 'Store-delete', 'web', '2020-12-14 13:35:24', '2020-12-14 13:35:24'),
(62, 'finance-list', 'web', '2020-12-14 13:39:32', '2020-12-14 13:39:32'),
(63, 'finance-create', 'web', '2020-12-14 13:39:32', '2020-12-14 13:39:32'),
(64, 'finance-edit', 'web', '2020-12-14 13:39:32', '2020-12-14 13:39:32'),
(65, 'finance-delete', 'web', '2020-12-14 13:39:32', '2020-12-14 13:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Watch now in HD 1080', 'asdasd', '2020-09-23 13:31:05', '2020-09-23 13:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `receive_payments`
--

CREATE TABLE `receive_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_dept` int(11) NOT NULL,
  `received_amount` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `check_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receive_payments`
--

INSERT INTO `receive_payments` (`id`, `customer_id`, `total_dept`, `received_amount`, `balance`, `check_number`, `received_by`, `created_at`, `updated_at`) VALUES
(1, 26, 172000, 172000, 0, NULL, NULL, '2021-01-05 07:58:47', '2021-01-05 09:59:38'),
(2, 24, 159000, 157000, -2000, NULL, NULL, '2021-01-06 04:20:29', '2021-01-06 07:50:20'),
(3, 27, 150000, NULL, NULL, NULL, NULL, '2021-01-19 04:42:59', '2021-01-19 04:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `reservers`
--

CREATE TABLE `reservers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reserver_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserver_lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserver_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reserver_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservers`
--

INSERT INTO `reservers` (`id`, `reserver_firstname`, `reserver_lastname`, `reserver_phone_number`, `reserver_gender`, `created_at`, `updated_at`) VALUES
(1, 'Juma', 'Paul', '0765432', 'female', '2020-12-13 03:35:30', '2020-12-13 03:35:30'),
(2, 'Juma', 'Paul', '0765432', 'female', '2020-12-13 03:37:16', '2020-12-13 03:37:16'),
(3, 'Juma', 'Paul', '0765432', 'female', '2020-12-13 03:40:07', '2020-12-13 03:40:07'),
(4, 'Juma', 'Paul', '0765432', 'female', '2020-12-13 03:41:12', '2020-12-13 03:41:12'),
(5, 'Juma', 'Paul', '0765432', 'female', '2020-12-13 03:44:12', '2020-12-13 03:44:12'),
(6, 'Juma', 'Paul', '0765432', 'female', '2020-12-13 03:44:39', '2020-12-13 03:44:39'),
(7, 'Juma', 'Musa', '07654323', 'male', '2021-01-01 05:58:16', '2021-01-01 05:58:16'),
(8, 'Juma', 'Musa', '07654323', 'male', '2021-01-01 06:00:15', '2021-01-01 06:00:15'),
(9, 'Juma', 'Musa', '07654323', 'male', '2021-01-01 06:01:57', '2021-01-01 06:01:57'),
(10, 'DDDD', 'SSS', '3333', 'female', '2021-01-01 06:04:34', '2021-01-01 06:04:34'),
(11, 'Mohamed', 'Moghale', '0897767', 'male', '2021-01-05 06:49:49', '2021-01-05 06:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `rest_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `status_id`, `rest_slug`, `created_at`, `updated_at`) VALUES
(1, 'Simba Restraurant', 1, '32432', '2020-10-02 02:36:27', '2020-10-02 02:36:27'),
(2, 'Mikumi Pack', 1, '23432', '2020-10-02 02:39:51', '2020-10-02 02:39:51'),
(3, 'Simba Restraurant Two', 1, '4345', '2020-10-02 02:43:49', '2020-10-02 02:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_assign_staff`
--

CREATE TABLE `restaurant_assign_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restraurant_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_bills`
--

CREATE TABLE `restaurant_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bill_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_bills`
--

INSERT INTO `restaurant_bills` (`id`, `bill_from`, `total`, `room_id`, `status`, `bill_id`, `created_at`, `updated_at`) VALUES
(5, 'Restautant', '38500', '2', '0', 'BEACO/icQwG', '2021-01-19 06:40:02', '2021-01-19 06:40:02'),
(6, 'Restautant', '41000', '16', '0', 'BEACO/ijeJ9', '2021-01-19 06:46:40', '2021-01-19 06:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_items`
--

CREATE TABLE `restaurant_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_item_categories`
--

CREATE TABLE `restaurant_item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_requests`
--

CREATE TABLE `restaurant_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_u_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(255) NOT NULL,
  `requester_id` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_iss` int(11) DEFAULT NULL,
  `quantity_recieved` int(11) DEFAULT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_send` tinyint(1) NOT NULL DEFAULT 0,
  `received` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_requests`
--

INSERT INTO `restaurant_requests` (`id`, `item_u_no`, `item_id`, `requester_id`, `quantity`, `quantity_iss`, `quantity_recieved`, `measurement`, `request_no`, `request_send`, `received`, `comment`, `created_at`, `updated_at`) VALUES
(2, 'RN/67024', 10, 8, 2, 0, 2, 'kg', '612062', 1, 'No', NULL, '2020-12-21 05:06:58', '2020-12-21 05:06:58'),
(6, 'RN/65302', 16, 8, 3, 0, 3, 'kg', '612062', 1, 'No', NULL, '2020-12-21 05:24:12', '2020-12-21 05:24:12'),
(8, 'RN/256', 12, 8, 8, 0, 0, 'caton', '862724', 1, 'No', NULL, '2020-12-21 05:50:12', '2020-12-21 05:50:12'),
(9, 'RN/19218', 15, 8, 5, 0, 0, 'caton', '862724', 1, 'No', NULL, '2020-12-21 05:50:26', '2020-12-21 05:50:26'),
(10, 'RN/52084', 13, 8, 5, NULL, NULL, 'other', '328046', 1, 'No', NULL, '2020-12-21 10:21:49', '2020-12-21 10:21:49'),
(11, 'RN/12070', 8, 8, 10, NULL, NULL, 'kg', '328046', 1, 'No', NULL, '2020-12-21 10:22:05', '2020-12-21 10:22:05'),
(12, 'RN/50028', 9, 8, 10, NULL, NULL, 'kg', '802022', 1, 'No', NULL, '2020-12-21 10:23:00', '2020-12-21 10:23:00'),
(13, 'RN/45466', 7, 8, 4, NULL, NULL, 'kg', '802022', 1, 'No', NULL, '2020-12-21 10:23:12', '2020-12-21 10:23:12'),
(14, 'RN/59557', 2, 8, 10, NULL, NULL, 'kg', '802022', 1, 'No', NULL, '2020-12-21 10:23:28', '2020-12-21 10:23:28'),
(15, 'RN/70272', 13, 8, 1, NULL, 1, 'kg', '482505', 1, 'No', NULL, '2020-12-22 08:35:32', '2020-12-22 08:35:32'),
(16, 'RN/28514', 9, 8, 2, NULL, 1, 'kg', '482505', 1, 'No', NULL, '2020-12-22 08:35:43', '2020-12-22 08:35:43'),
(18, 'RN/18430', 2, 8, 50, NULL, 50, 'kg', '427877', 1, 'No', NULL, '2020-12-24 04:00:25', '2020-12-24 04:00:25'),
(19, 'RN/60943', 4, 8, 60, NULL, 10, 'kg', '791501', 1, 'No', NULL, '2020-12-24 04:03:10', '2020-12-24 04:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-09-23 05:34:41', '2020-09-23 05:34:41'),
(2, 'Reception', 'web', '2020-09-23 05:36:47', '2020-09-23 05:36:47'),
(3, 'Super Admin', 'web', '2020-09-23 08:27:10', '2020-09-23 08:27:10'),
(8, 'Restaurant Waiter', 'web', '2020-12-14 12:48:06', '2020-12-14 12:48:06'),
(9, 'Bar Waiter', 'web', '2020-12-14 12:49:56', '2020-12-14 12:49:56'),
(10, 'Store Manager', 'web', '2020-12-14 13:35:07', '2020-12-14 13:35:07'),
(11, 'Fianance', 'web', '2020-12-14 13:38:58', '2020-12-14 13:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 3),
(40, 1),
(40, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(54, 8),
(55, 1),
(55, 3),
(55, 8),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(65, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_category_id` bigint(20) UNSIGNED NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_number`, `room_category_id`, `room_price`, `room_status_id`, `created_at`, `updated_at`) VALUES
(2, 'Mikumi', '100', 6, 70000, 6, '2020-12-17 05:18:23', '2020-12-29 10:10:38'),
(9, 'Kitulo', '102', 6, 70000, 12, '2020-12-17 05:20:08', '2020-12-17 05:20:08'),
(10, 'Katavi', '104', 6, 60000, 6, '2020-12-17 05:21:19', '2020-12-30 09:17:45'),
(13, 'Mandela', '11', 1, 150000, 12, '2020-12-17 05:22:53', '2020-12-19 03:09:27'),
(14, 'Magufuli', '12', 1, 170000, 12, '2020-12-17 05:23:19', '2021-01-15 09:31:02'),
(15, 'Kikwete', '13', 1, 150000, 6, '2020-12-17 05:23:46', '2021-01-19 08:56:10'),
(16, 'Mwinyi', '14', 1, 150000, 6, '2020-12-17 05:24:16', '2021-01-15 09:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'VVIP', '2020-09-25 10:24:44', '2020-09-25 10:24:44'),
(2, 'Executive', '2020-09-25 10:38:18', '2020-09-25 10:38:18'),
(3, 'Standard', '2020-09-26 05:40:47', '2020-09-26 05:40:47'),
(4, 'Delux', '2020-09-26 05:40:55', '2020-09-26 05:40:55'),
(5, 'King', '2020-09-26 05:58:41', '2020-09-26 05:58:41'),
(6, 'King Size', '2020-12-10 03:55:47', '2020-12-10 03:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `room_statuses`
--

CREATE TABLE `room_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_statuses`
--

INSERT INTO `room_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2020-09-25 11:23:34', '2020-09-25 11:23:34'),
(6, 'Occupied', '2020-12-17 07:51:57', '2020-12-17 07:51:57'),
(9, 'Booked', '2020-12-17 07:57:16', '2020-12-17 07:57:16'),
(10, 'Check out Dirty', '2020-12-17 07:57:44', '2020-12-17 07:57:44'),
(11, 'Out of Order', '2020-12-17 07:57:54', '2020-12-17 07:57:54'),
(12, 'Vacant', '2020-12-17 07:58:04', '2020-12-17 07:58:04'),
(13, 'Inactive', '2020-12-17 08:00:38', '2020-12-17 08:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fullname`, `email`, `phone_number`, `gender`, `password`, `role_id`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 'D', 's@gmail.com', '123456', 'female', '$2y$10$NO0g87McRiIwAjUsIegIb.uhQ6YA5V1uxz98ym208f4XY6DhTy.3O', 10, '2020-12-15 08:29:10', '2020-12-15 08:29:10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_name`, `table_slug`, `created_at`, `updated_at`) VALUES
(1, 'Table No 1', '90943', '2020-12-11 05:29:44', '2020-12-11 05:29:44'),
(2, 'Table No 2', '4545', '2020-12-11 05:29:56', '2020-12-11 05:29:56'),
(3, 'Table No 3', '3434', '2020-12-11 05:31:22', '2020-12-11 05:31:22'),
(4, 'Table No 4', '43534', '2020-12-11 05:31:33', '2020-12-11 05:31:33'),
(5, 'Table No 5', '34534', '2020-12-11 05:31:43', '2020-12-11 05:31:43'),
(6, 'Table No 6', '675', '2020-12-12 09:01:19', '2020-12-12 09:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `CountryID` int(11) DEFAULT NULL,
  `CountryName` varchar(50) DEFAULT NULL,
  `TwoCharCountryCode` char(2) DEFAULT NULL,
  `ThreeCharCountryCode` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Emilian Ngatunga', 'admin@admin.com', NULL, '$2y$10$F2YzBlObQesWN47jdmvGQeojtifbrmcWJflKHrEbdb.7a7uoEatom', NULL, '2020-09-23 05:34:41', '2020-09-23 05:34:41'),
(8, 'Emilian Ngatunga', 'admin1@gmail.com', NULL, '$2y$10$LvEzX9L3/dCS0QEBD0U8beerWjY6LBpqu1QVenmsvpBEOfkzjFpp6', NULL, '2020-12-14 13:00:16', '2020-12-14 13:00:16'),
(9, 'Demo', 'demo@gmail.com', NULL, '$2y$10$uF6yHLFz.umdtLe5FnopU.NYf7WKYW1b1zKfd1nIxkon50Im8kWOG', NULL, '2020-12-14 13:31:34', '2020-12-14 13:31:34'),
(10, 'D', 's@gmail.com', NULL, '$2y$10$jztE/uTouDitPRH9k5/qiewgTbTqrYuLeGjTl.OHVgexzAU/8jcta', NULL, '2020-12-15 08:29:10', '2020-12-15 08:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `video_images`
--

CREATE TABLE `video_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_vid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_images`
--

INSERT INTO `video_images` (`id`, `firstname`, `lastname`, `phone_number`, `gender`, `location`, `category`, `slug_vid`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Musa', 'John', '0765127812', 'male', 'Soweto', 'Birthday', '886020', '0', '2021-01-15 12:49:32', '2021-01-15 12:49:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation_details`
--
ALTER TABLE `accomodation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accomodation_details_customer_id_foreign` (`customer_id`),
  ADD KEY `accomodation_details_room_category_id_foreign` (`room_category_id`),
  ADD KEY `accomodation_details_room_id_foreign` (`room_id`),
  ADD KEY `accomodation_details_reserver_id_foreign` (`reserver_id`);

--
-- Indexes for table `bars`
--
ALTER TABLE `bars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bars_bar_name_unique` (`bar_name`),
  ADD KEY `bars_status_id_foreign` (`status_id`);

--
-- Indexes for table `bar_assigned_staff`
--
ALTER TABLE `bar_assigned_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bar_assigned_staff_bar_id_foreign` (`bar_id`),
  ADD KEY `bar_assigned_staff_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `bar_items`
--
ALTER TABLE `bar_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bar_items_item_name_unique` (`item_name`),
  ADD KEY `bar_items_status_id_foreign` (`status_id`),
  ADD KEY `bar_items_item_category_id_foreign` (`item_category_id`);

--
-- Indexes for table `bar_item_categories`
--
ALTER TABLE `bar_item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bar_purchasings`
--
ALTER TABLE `bar_purchasings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bar_purchasings_item_no_unique` (`item_number`),
  ADD UNIQUE KEY `bar_purchasings_item_name_unique` (`item_name`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conference_customers`
--
ALTER TABLE `conference_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conference_customers_idtype_foreign` (`idtype`),
  ADD KEY `conference_customers_payment_id_foreign` (`payment_id`),
  ADD KEY `conference_customers_conference_id_foreign` (`conference_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_idtype_foreign` (`idtype`);

--
-- Indexes for table `customer_bills`
--
ALTER TABLE `customer_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_bills_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_bills_created_by_foreign` (`created_by`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_categories`
--
ALTER TABLE `dish_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_menus`
--
ALTER TABLE `dish_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_menus_item_category_foreign` (`item_category`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_accommodations`
--
ALTER TABLE `group_accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_statuses`
--
ALTER TABLE `group_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ids`
--
ALTER TABLE `ids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ids_id_name_unique` (`id_name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_item_number_unique` (`item_number`),
  ADD UNIQUE KEY `items_item_name_unique` (`item_name`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_categories_item_number_unique` (`item_number`),
  ADD UNIQUE KEY `item_categories_category_name_unique` (`category_name`);

--
-- Indexes for table `item_issueds`
--
ALTER TABLE `item_issueds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitchen_purchasings`
--
ALTER TABLE `kitchen_purchasings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kitchen_purchasings_item_no_unique` (`item_number`),
  ADD UNIQUE KEY `kitchen_purchasings_item_name_unique` (`item_name`);

--
-- Indexes for table `kot_orders`
--
ALTER TABLE `kot_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_statuses`
--
ALTER TABLE `meal_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_types`
--
ALTER TABLE `meal_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meal_types_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_features`
--
ALTER TABLE `module_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_features_module_id_index` (`module_id`),
  ADD KEY `module_features_feature_id_index` (`feature_id`);

--
-- Indexes for table `other_purchasings`
--
ALTER TABLE `other_purchasings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `other_purchasings_item_number_unique` (`item_number`),
  ADD UNIQUE KEY `other_purchasings_item_name_unique` (`item_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_payments`
--
ALTER TABLE `receive_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receive_payments_customer_id_foreign` (`customer_id`),
  ADD KEY `receive_payments_received_by_foreign` (`received_by`);

--
-- Indexes for table `reservers`
--
ALTER TABLE `reservers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_status_id_foreign` (`status_id`);

--
-- Indexes for table `restaurant_assign_staff`
--
ALTER TABLE `restaurant_assign_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_assign_staff_restraurant_id_foreign` (`restraurant_id`),
  ADD KEY `restaurant_assign_staff_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `restaurant_bills`
--
ALTER TABLE `restaurant_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_items`
--
ALTER TABLE `restaurant_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurant_items_item_name_unique` (`item_name`),
  ADD KEY `restaurant_items_status_id_foreign` (`status_id`),
  ADD KEY `restaurant_items_item_category_id_foreign` (`item_category_id`);

--
-- Indexes for table `restaurant_item_categories`
--
ALTER TABLE `restaurant_item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_requests`
--
ALTER TABLE `restaurant_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_room_category_id_foreign` (`room_category_id`),
  ADD KEY `rooms_room_status_id_foreign` (`room_status_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_categories_category_name_unique` (`category_name`);

--
-- Indexes for table `room_statuses`
--
ALTER TABLE `room_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`),
  ADD KEY `staff_role_id_foreign` (`role_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_images`
--
ALTER TABLE `video_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation_details`
--
ALTER TABLE `accomodation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bars`
--
ALTER TABLE `bars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bar_assigned_staff`
--
ALTER TABLE `bar_assigned_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bar_items`
--
ALTER TABLE `bar_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bar_item_categories`
--
ALTER TABLE `bar_item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bar_purchasings`
--
ALTER TABLE `bar_purchasings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conference_customers`
--
ALTER TABLE `conference_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer_bills`
--
ALTER TABLE `customer_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dish_categories`
--
ALTER TABLE `dish_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dish_menus`
--
ALTER TABLE `dish_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `group_accommodations`
--
ALTER TABLE `group_accommodations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_statuses`
--
ALTER TABLE `group_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ids`
--
ALTER TABLE `ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_issueds`
--
ALTER TABLE `item_issueds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kitchen_purchasings`
--
ALTER TABLE `kitchen_purchasings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kot_orders`
--
ALTER TABLE `kot_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `meal_statuses`
--
ALTER TABLE `meal_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meal_types`
--
ALTER TABLE `meal_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `module_features`
--
ALTER TABLE `module_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `other_purchasings`
--
ALTER TABLE `other_purchasings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receive_payments`
--
ALTER TABLE `receive_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservers`
--
ALTER TABLE `reservers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant_assign_staff`
--
ALTER TABLE `restaurant_assign_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_bills`
--
ALTER TABLE `restaurant_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant_items`
--
ALTER TABLE `restaurant_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_item_categories`
--
ALTER TABLE `restaurant_item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_requests`
--
ALTER TABLE `restaurant_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_statuses`
--
ALTER TABLE `room_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `video_images`
--
ALTER TABLE `video_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodation_details`
--
ALTER TABLE `accomodation_details`
  ADD CONSTRAINT `accomodation_details_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `bars`
--
ALTER TABLE `bars`
  ADD CONSTRAINT `bars_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `room_statuses` (`id`);

--
-- Constraints for table `bar_assigned_staff`
--
ALTER TABLE `bar_assigned_staff`
  ADD CONSTRAINT `bar_assigned_staff_bar_id_foreign` FOREIGN KEY (`bar_id`) REFERENCES `bars` (`id`),
  ADD CONSTRAINT `bar_assigned_staff_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bar_items`
--
ALTER TABLE `bar_items`
  ADD CONSTRAINT `bar_items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `bar_item_categories` (`id`),
  ADD CONSTRAINT `bar_items_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `meal_statuses` (`id`);

--
-- Constraints for table `conference_customers`
--
ALTER TABLE `conference_customers`
  ADD CONSTRAINT `conference_customers_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`),
  ADD CONSTRAINT `conference_customers_idtype_foreign` FOREIGN KEY (`idtype`) REFERENCES `ids` (`id`),
  ADD CONSTRAINT `conference_customers_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_modes` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_idtype_foreign` FOREIGN KEY (`idtype`) REFERENCES `ids` (`id`);

--
-- Constraints for table `customer_bills`
--
ALTER TABLE `customer_bills`
  ADD CONSTRAINT `customer_bills_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `customer_bills_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `dish_menus`
--
ALTER TABLE `dish_menus`
  ADD CONSTRAINT `dish_menus_item_category_foreign` FOREIGN KEY (`item_category`) REFERENCES `dish_categories` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receive_payments`
--
ALTER TABLE `receive_payments`
  ADD CONSTRAINT `receive_payments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `receive_payments_received_by_foreign` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `room_statuses` (`id`);

--
-- Constraints for table `restaurant_assign_staff`
--
ALTER TABLE `restaurant_assign_staff`
  ADD CONSTRAINT `restaurant_assign_staff_restraurant_id_foreign` FOREIGN KEY (`restraurant_id`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `restaurant_assign_staff_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `restaurant_items`
--
ALTER TABLE `restaurant_items`
  ADD CONSTRAINT `restaurant_items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `restaurant_item_categories` (`id`),
  ADD CONSTRAINT `restaurant_items_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `meal_statuses` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_room_category_id_foreign` FOREIGN KEY (`room_category_id`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_room_status_id_foreign` FOREIGN KEY (`room_status_id`) REFERENCES `room_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
