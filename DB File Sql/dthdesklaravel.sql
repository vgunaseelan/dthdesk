-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 05:27 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dthdesklaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_code` int(11) DEFAULT NULL,
  `quantity` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_price` int(11) NOT NULL,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `products_id`, `product_name`, `product_price`, `product_code`, `quantity`, `update_price`, `weight`, `dimensions`, `stock`, `user_email`, `session_id`) VALUES
(23, 70, 'xstream 6D', 1000, NULL, '1', 1000, '0.325 kg', '50 *70 cm', '1', 'webmail.com', 'wTsaVEw9MqnexWup0CLomQCGv67cspCwMlRE6lIV'),
(26, 72, 'Airtel Connection', 5000, 12345, '2', 5000, '0.858kg', '15 * 15 cm', '3', 'webmail.com', 'wTsaVEw9MqnexWup0CLomQCGv67cspCwMlRE6lIV');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(51, 45, 'Airtel Dth SD', NULL, 1, NULL, '2019-10-12 07:00:01', '2019-10-12 07:00:01'),
(45, 0, 'Airtel Brands', NULL, 1, NULL, '2019-10-12 06:53:27', '2019-10-12 06:53:27'),
(46, 45, 'Airtel', NULL, 0, NULL, '2019-10-12 06:53:41', '2019-10-12 07:42:22'),
(48, 45, 'Airtel Dth HD', NULL, 1, NULL, '2019-10-12 06:55:16', '2019-10-12 07:00:09'),
(50, 45, 'Airtel Xstream', NULL, 1, NULL, '2019-10-12 06:56:07', '2019-10-12 06:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'IN', 'India', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_enquire`
--

CREATE TABLE `customer_enquire` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_pincode` int(11) NOT NULL,
  `cus_message` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_enquire`
--

INSERT INTO `customer_enquire` (`cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_pincode`, `cus_message`, `updated_at`) VALUES
(3, 'gunaseelan', 'gunaseelan97@gmail.com', '7200787807', 643546, 'hi body isi isodfjo dfkljdlk', '2019-10-22 05:33:31'),
(4, 'gopi', 'dfldkj@gklgj.com', '9739470938', 394899, 'kdjgkfjg lkjfglkfjl fljkglkfjgkl fkljglkfg fklgf g', '2019-10-22 05:33:31'),
(5, 'Babu', 'babu1997@gmail.com', '9023909009', 343523, 'hi dear', '2019-10-22 05:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `pincode`, `mobile`, `payment_method`, `created_date`) VALUES
(4, 5, 'gunaseelan97@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 12152, '7200787807', 'pod', '2019-10-21 09:42:37'),
(5, 10, 'gunaseelan12@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 632107, '7200787807', 'pod', '2019-10-22 07:05:38'),
(6, 10, 'gunaseelan12@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 632107, '7200787807', 'pod', '2019-10-22 12:12:22'),
(7, 10, 'gunaseelan12@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 632107, '7200787807', 'pod', '2019-10-22 12:14:45'),
(8, 10, 'gunaseelan12@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 632107, '7200787807', 'pod', '2019-10-23 05:55:25'),
(9, 10, 'gunaseelan12@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 632107, '7200787807', 'pod', '2019-11-16 13:13:58'),
(10, 5, 'gunaseelan97@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 12152, '7200787807', 'pod', '2019-11-18 07:07:57'),
(11, 5, 'gunaseelan97@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 12152, '7200787807', 'pod', '2019-11-18 08:12:45'),
(12, 5, 'gunaseelan97@gmail.com', 'gunaseelan', '2/55', 'vellore', 'tamilnadu', 12152, '7200787807', 'pod', '2019-11-18 08:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `language_channels`
--

CREATE TABLE `language_channels` (
  `lang_id` int(11) NOT NULL,
  `channel_title` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_channels`
--

INSERT INTO `language_channels` (`lang_id`, `channel_title`, `created_at`, `updated_at`) VALUES
(1, 'Tamil', '2019-11-09 16:57:09', '2019-11-12 12:56:48'),
(2, 'Sports', '2019-11-09 16:59:32', '2019-11-12 12:57:09'),
(4, 'karanataka', '2019-11-09 17:02:03', '2019-11-09 17:02:03'),
(5, 'Telugu', '2019-11-11 11:43:37', '2019-11-11 11:43:37'),
(6, 'Kids Channels', '2019-11-11 11:43:37', '2019-11-11 11:43:37'),
(7, 'Hindi News', '2019-11-11 11:43:37', '2019-11-11 11:43:37'),
(8, 'Life Style', '2019-11-11 11:43:37', '2019-11-11 11:43:37'),
(9, 'Music', '2019-11-11 11:44:03', '2019-11-11 11:44:03'),
(12, 'Hindi Entertainment', '2019-11-12 12:57:41', '2019-11-12 12:57:41'),
(13, 'Malayalam', '2019-11-18 10:13:55', '2019-11-18 11:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `language_pack`
--

CREATE TABLE `language_pack` (
  `lang_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `lang_name` varchar(100) NOT NULL,
  `lang_image` text NOT NULL,
  `lang_month` text NOT NULL,
  `lang_channels` text NOT NULL,
  `lang_old_price` double NOT NULL,
  `lang_new_price` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_10_20_040609_create_categories_table', 3),
(9, '2018_10_24_075802_create_products_table', 4),
(10, '2018_11_08_024109_create_product_att_table', 5),
(11, '2018_11_20_055123_create_tblgallery_table', 6),
(12, '2018_11_26_070031_create_cart_table', 7),
(13, '2018_11_28_072535_create_coupons_table', 8),
(15, '2018_12_01_042342_create_countries_table', 10),
(19, '2018_12_03_043804_add_more_fields_to_users_table', 14),
(17, '2018_12_03_093548_create_delivery_address_table', 12),
(18, '2018_12_05_024718_create_orders_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `users_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `customer_id`, `users_email`, `product_image`, `product_name`, `product_price`, `product_qty`, `subtotal`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(11, 5, 12, 'gunaseelan97@gmail.com', '1570866259-airtel-xstream-best-plan.jpg', 'Airtel Xstream Best Plan', 3999.00, 1, 3999.00, 0.00, '0', '0', 'success', 'pod', '2019-11-18 08:21:29', '2019-11-18 08:21:29'),
(12, 5, 12, 'gunaseelan97@gmail.com', '1570866114-airtel-digital-1-month-my-kids-sd.jpg', 'Airtel Digital 1 Month My Kids SD', 1685.00, 1, 1685.00, 0.00, '0', '0', 'success', 'pod', '2019-11-18 08:21:29', '2019-11-18 08:21:29'),
(9, 10, 8, 'gunaseelan12@gmail.com', '1570866259-airtel-xstream-best-plan.jpg', 'Airtel Xstream Best Plan', 3999.00, 1, 3999.00, 0.00, '0', '0', 'success', 'pod', '2019-10-23 05:55:25', '2019-10-23 05:55:25'),
(8, 10, 7, 'gunaseelan12@gmail.com', '1570865826-airtel-digital-1-month-new-mega-sd.jpg', 'Airtel Digital 1 Month New Mega SD', 1880.00, 1, 1880.00, 0.00, '0', '0', 'success', 'pod', '2019-10-22 12:14:45', '2019-10-22 12:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders_package`
--

CREATE TABLE `orders_package` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `product_image` text NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `shipping_charges` double NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_package`
--

INSERT INTO `orders_package` (`id`, `users_id`, `customer_id`, `users_email`, `product_image`, `product_name`, `product_price`, `shipping_charges`, `order_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(6, 10, 6, 'gunaseelan12@gmail.com', '1571142012-tamil-hd-pack.jpg', 'Tamil HD pack', 1399, 0, 'success', 'pod', '2019-10-22 12:12:22', '2019-10-22 12:12:22'),
(7, 10, 7, 'gunaseelan12@gmail.com', '1571379019-karnataka-value-lite-pack-hd.jpg', 'Karnataka Value Lite Pack HD', 1659, 0, 'success', 'pod', '2019-10-22 12:14:45', '2019-10-22 12:14:45'),
(8, 10, 7, 'gunaseelan12@gmail.com', '1571379739-hindi-value-lite-pack-hd.jpg', 'Hindi Value Lite Pack HD', 2349, 0, 'success', 'pod', '2019-10-22 12:14:45', '2019-10-22 12:14:45'),
(9, 10, 7, 'gunaseelan12@gmail.com', '1571379877-telugumy-family-pack-hd.jpg', 'TeluguMy Family Pack HD', 4559, 0, 'success', 'pod', '2019-10-22 12:14:45', '2019-10-22 12:14:45'),
(11, 5, 11, 'gunaseelan97@gmail.com', '1571142012-tamil-hd-pack.jpg', 'Tamil HD pack', 1399, 0, 'success', 'pod', '2019-11-18 08:12:45', '2019-11-18 08:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` int(11) NOT NULL,
  `pack_name` varchar(150) NOT NULL,
  `pack_image` text NOT NULL,
  `pack_description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`p_id`, `pack_name`, `pack_image`, `pack_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Tamil', '1571198808-tamil.jpg', NULL, 0, '2019-10-15 06:00:29', '2019-10-16 04:06:48'),
(5, 'Telugu', '1571198795-telugu.jpg', NULL, 0, '2019-10-15 12:09:35', '2019-10-16 04:06:36'),
(6, 'Hindi', '1571198779-hindi.jpg', NULL, 0, '2019-10-15 12:09:55', '2019-10-16 04:06:19'),
(7, 'Malayalam', '1571198765-malayam.jpg', NULL, 0, '2019-10-15 12:10:08', '2019-10-16 04:06:05'),
(8, 'Kanada', '1571198753-kanada.jpg', NULL, 0, '2019-10-15 12:31:26', '2019-11-12 06:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `pack_channels`
--

CREATE TABLE `pack_channels` (
  `ch_id` int(11) NOT NULL,
  `sub_pack_id` int(11) NOT NULL,
  `ch_lang_name` varchar(100) NOT NULL,
  `ch_image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pack_channels`
--

INSERT INTO `pack_channels` (`ch_id`, `sub_pack_id`, `ch_lang_name`, `ch_image`, `status`, `created_at`, `updated_at`) VALUES
(34, 9, '5', '1574052301.5.Zee-Cinemalu-HD.gif', 0, NULL, NULL),
(36, 9, '8', '1574053906.8.sony-espn-hd.gif|1574053906.8.sony-six-hd.gif|1574053906.8.SONY-TEN1-HD.gif|1574053906.8.SONY-TEN2-HD.gif|1574053906.8.SONY-TEN3-HD.gif|1574053906.8.star-sports2-hd.gif|1574053906.8.star-sports-first.jpg', 0, NULL, '2019-11-18 05:11:46'),
(37, 9, '1', '1574058552.1.murasu.gif|1574058552.1.polimer.gif|1574058552.1.sethigal.gif|1574058552.1.sirippoli.gif', 0, NULL, '2019-11-18 06:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` double(8,2) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `p_name`, `p_code`, `description`, `old_price`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 48, 'Airtel Hd Box', NULL, 'Experience the magic of digital entertainment with the universal remote,\r\n superior MPEG4 DVB S2 picture &amp; sound, unique interactive services \r\nand much more...This unique offer of Airtel brings to you- Mega HD Pack \r\nFree one month pack with HD access for complete entertainment of entire \r\nfamily with over 250 channels to choose from 50 + HD Channels Lifestyle,\r\n infotainment, news or music - with Airtel Digital TV you\'ll never run \r\nout of choices as it comes with 50 + HD channels across various genres \r\nto suit your entertainment needs. 1080i Picture Resolution &amp; Digital\r\n Surround Sound With Airtel Digital TV, you can experience crystal-clear\r\n picture clarity and great audio, thanks to its 1080i picture resolution\r\n and 2.1 Surround Sound. Unlimited Recording Never worry about missing \r\nout your favourite episode. With the Airtel Digital TV, you can record \r\nall that you want and watch it later. All you have to do is set a prime \r\ntime by simply plugging in your pen drive to record and watch at any \r\ntime you wish. With its Event Based Recording feature, you can record \r\nfavourite shows or simply use the Time Based Recording feature to set a \r\nspecific time to start recording.The price shown for the Product is \r\ntowards the Activation Vouchers and installation . Set Top Box, Remote \r\nand incidental equipments shall at all times remain the property of BTL.<br>', 1950.00, 1449.00, '1570864569-airtel-hd-box.png', '2019-10-12 07:16:09', '2019-10-12 07:16:09'),
(4, 48, 'Airtel DTH HD Best Offer Online', NULL, '<h2>High Definition (HD)</h2>\r\nOne of the best quality set top boxes to come out in recent times is the&nbsp; Airtel Dth\r\n HD Connection. It features a good amount of HD and SD channels which is\r\n sure to leave you speechless. The quality of the picture is top notch \r\nand the product can withstand heavy usage making it a great buy. The&nbsp; Airtel Dth\r\n new connection offers 1 year onsite warranty (on set top box) and the \r\nset top box comes with Free Installation as well. When you buy Airtel \r\ndth new connection, you can be sure that you will be able to get a good \r\ndeal of usage out of it since it can withstand harsh weather of every \r\nkind. The&nbsp; Airtel Dth\r\n is completely water and dust proof and offers great signal no matter in\r\n which location you are. Airtel DTH TV will also let you record and view\r\n all your favorite shows. The&nbsp; Airtel Dth\r\n set top box is equipped with an HDMI connection ensuring that you are \r\nable to connect it to any kind of HD TV. Best Picture clarity with the \r\nhighest resolution of 1920 x 1080 makes it the best DTH connection in \r\nIndia. The box is also equipped with a Dolby Digital Surround Sound, \r\noffering you excellent sound quality. It is no doubt the best DTH \r\nconnection in India. Compare &amp; Buy&nbsp;<span> Airtel Dth plans.</span><br><br><br><br><br><br>', NULL, 1699.00, '1570865188-airtel-dth-hd-best-offer-online.jpg', '2019-10-12 07:26:28', '2019-10-12 07:30:06'),
(7, 48, 'Airtel HD Connection with Super Fast', NULL, '<h2>High Definition (HD)</h2>\r\nOne of the best quality set top boxes to come out in recent times is the Airtel DTH\r\n HD Connection. It features a good amount of HD and SD channels which is\r\n sure to leave you speechless. The quality of the picture is top notch \r\nand the product can withstand heavy usage making it a great buy. The Airtel DTH\r\n new connection offers 1 year onsite warranty (on set top box) and the \r\nset top box comes with Free Installation as well. When you buy Airtel \r\ndth new connection, you can be sure that you will be able to get a good \r\ndeal of usage out of it since it can withstand harsh weather of every \r\nkind. The <span>Airtel DTH\r\n is completely water and dust proof and offers great signal no matter in\r\n which location you are. Airtel DTH TV will also let you record and view\r\n all your favorite shows. The </span>Airtel DTH\r\n set top box is equipped with an HDMI connection ensuring that you are \r\nable to connect it to any kind of HD TV. Best Picture clarity with the \r\nhighest resolution of 1920 x 1080 makes it the best DTH connection in \r\nIndia. The box is also equipped with a Dolby Digital Surround Sound, \r\noffering you excellent sound quality. It is no doubt the best DTH \r\nconnection in India. Compare &amp; Buy Airtel DTH plans.<br><br><br><br><br><br>', NULL, 1499.00, '1570865474-airtel-hd-connection-with-super-fast.jpg', '2019-10-12 07:31:14', '2019-10-12 07:31:14'),
(5, 48, 'Airtel DTH HD Connection', NULL, '<h2>High Definition (HD)</h2>\r\nOne of the best quality set top boxes to come out in recent times is the&nbsp; Airtel Dth\r\n HD Connection. It features a good amount of HD and SD channels which is\r\n sure to leave you speechless. The quality of the picture is top notch \r\nand the product can withstand heavy usage making it a great buy. The&nbsp; Airtel Dth\r\n new connection offers 1 year onsite warranty (on set top box) and the \r\nset top box comes with Free Installation as well. When you buy Airtel \r\ndth new connection, you can be sure that you will be able to get a good \r\ndeal of usage out of it since it can withstand harsh weather of every \r\nkind. The&nbsp; Airtel Dth\r\n is completely water and dust proof and offers great signal no matter in\r\n which location you are. Airtel DTH TV will also let you record and view\r\n all your favorite shows. The&nbsp; Airtel Dth\r\n set top box is equipped with an HDMI connection ensuring that you are \r\nable to connect it to any kind of HD TV. Best Picture clarity with the \r\nhighest resolution of 1920 x 1080 makes it the best DTH connection in \r\nIndia. The box is also equipped with a Dolby Digital Surround Sound, \r\noffering you excellent sound quality. It is no doubt the best DTH \r\nconnection in India. Compare &amp; Buy&nbsp;<span> Airtel Dth plans.</span><br><br><br><br><br><br>', NULL, 1499.00, '1570865228-airtel-dth-hd-connection.jpg', '2019-10-12 07:27:08', '2019-10-12 07:29:54'),
(6, 48, 'Airtel HD Connection with 6 months Pack in', NULL, '<h2>High Definition (HD)</h2>\r\nOne of the best quality set top boxes to come out in recent times is the&nbsp;\r\n Airtel Dth HD Connection. It features a good amount of HD and SD channels which is\r\n sure to leave you speechless. The quality of the picture is top notch \r\nand the product can withstand heavy usage making it a great buy. The&nbsp; Airtel Dth\r\n new connection offers 1 year onsite warranty (on set top box) and the \r\nset top box comes with Free Installation as well. When you buy Airtel \r\ndth new connection, you can be sure that you will be able to get a good \r\ndeal of usage out of it since it can withstand harsh weather of every \r\nkind. The&nbsp; Airtel Dth\r\n is completely water and dust proof and offers great signal no matter in\r\n which location you are. Airtel DTH TV will also let you record and view\r\n all your favorite shows. The&nbsp; Airtel Dth\r\n set top box is equipped with an HDMI connection ensuring that you are \r\nable to connect it to any kind of HD TV. Best Picture clarity with the \r\nhighest resolution of 1920 x 1080 makes it the best DTH connection in \r\nIndia. The box is also equipped with a Dolby Digital Surround Sound, \r\noffering you excellent sound quality. It is no doubt the best DTH \r\nconnection in India. Compare &amp; Buy&nbsp;<span> Airtel Dth plans.</span> <br><br><br><br><br>', NULL, 2999.00, '1570865369-airtel-hd-connection-with-6-months-pack-in.jpg', '2019-10-12 07:29:29', '2019-10-12 07:29:29'),
(8, 48, 'Airtel HD Connection with 6 months Pack in', NULL, 'One of the best quality set top boxes to come out in recent times is the Airtel DTH HD Connection. It features a good amount of HD and SD channels which is sure to leave you speechless. The quality of the picture is top notch and the product can withstand heavy usage making it a great buy. The Airtel DTH new connection offers 1 year onsite warranty (on set top box) and the set top box comes with Free Installation as well. When you buy Airtel dth new connection, you can be sure that you will be able to get a good deal of usage out of it since it can withstand harsh weather of every kind. The Airtel DTH is completely water and dust proof and offers great signal no matter in which location you are. Airtel DTH TV will also let you record and view all your favorite shows. The Airtel DTH set top box is equipped with an HDMI connection ensuring that you are able to connect it to any kind of HD TV. Best Picture clarity with the highest resolution of 1920 x 1080 makes it the best DTH connection in India. The box is also equipped with a Dolby Digital Surround Sound, offering you excellent sound quality. It is no doubt the best DTH connection in India. Compare &amp; Buy Airtel DTH plans.<br><br>', NULL, 2999.00, '1570865638-airtel-hd-connection-with-6-months-pack-in.jpg', '2019-10-12 07:33:58', '2019-10-12 07:33:58'),
(9, 51, 'DTH SD New Connection Airtel with', NULL, 'At DTHCompare, you have the liberty to choose and buy DTH Connection online with various Airtel DTH Offers and plans. Forget the poor performance of local cable network and bring home Airtel DTH Set Top Box. The program guide gives you all the information that you require regarding what is available with the Airtel DTH package. With this Airtel DTH set top box, you can view only those programs that you want anytime. With a wide range of features and functionalities, Airtel DTH makes for a completely user-friendly system. Now you can order this compact entertainment package with a 12-month warranty at your fingertips. Airtel DTH comes with a universal remote, so you don’t have to manage two separate remotes for managing your TV and Airtel DTH Set Top Box. We also have various offers on Airtel DTH channel packages. Compare and Buy DTH Connection Online. <br><br>', NULL, 2599.00, '1570865763-dth-sd-new-connection-airtel-with.jpg', '2019-10-12 07:36:03', '2019-10-12 07:36:03'),
(10, 51, 'Airtel Digital 1 Month New Mega SD', NULL, '<h2>Standard Definition (SD)</h2>\r\nForget the\r\n poor performance of local cable network and bring home Airtel Digital \r\nTV Set Top Box. The program guide gives you all the information that you\r\n require regarding what is available with this package. With this set \r\ntop box, you can view only those programs that you want anytime. With a \r\nwide range of features and functionalities, it makes for a completely \r\nuser-friendly system. Now you can order this Airtel Digital New Mega SD \r\nwith a 12-month warranty at your fingertips. Also, it comes with a \r\nuniversal remote, so you don’t have to manage two separate remotes for \r\nmanaging your TV and Set Top Box.<br>', 2000.00, 1880.00, '1570865826-airtel-digital-1-month-new-mega-sd.jpg', '2019-10-12 07:37:06', '2019-10-12 07:37:06'),
(11, 51, 'Airtel Digital 1 Month New Mega SD', NULL, '<h2>Standard Definition (SD)</h2>\r\nCompare \r\nAirtel Digital TV Connection online in India and forget the poor \r\nperformance of local cable network and bring home Airtel Digital TV Set \r\nTop Box. The program guide gives you all the information that you \r\nrequire regarding what is available with this package. With this set top\r\n box, you can view only those programs that you want anytime. With a \r\nwide range of features and functionalities, it makes for a completely \r\nuser-friendly system. Now you can order this Airtel Digital New SD \r\nConnection with a 12-month warranty at your fingertips. Also, it comes \r\nwith a universal remote, so you don’t have to mange two separate remotes\r\n for managing your TV and Set Top Box.<br>', 2000.00, 1880.00, '1570865868-airtel-digital-1-month-new-mega-sd.jpg', '2019-10-12 07:37:48', '2019-10-12 07:37:48'),
(12, 51, 'Airtel Digital 1 Month My Sports SD', NULL, '<h2>Standard Definition (SD)</h2>\r\nWith \r\nexciting offers on Airtel digital TV New Connection Price, forget the \r\npoor performance of local cable network and bring home Airtel Digital TV\r\n Set Top Box. The program guide gives you all the information that you \r\nrequire regarding what is available with this package. Compare Airtel \r\nDTH HD connection online in India. With this set top box, you can view \r\nonly those programs that you want anytime. With a wide range of features\r\n and functionalities, it makes for a completely user-friendly system. \r\nNow you can order this Airtel Digital My Sports SD with a 12-month \r\nwarranty at your fingertips. Also, it comes with a universal remote, so \r\nyou don’t have to manage two separate remotes for managing your TV and \r\nSet Top Box.<br>', 1990.00, 1770.00, '1570865907-airtel-digital-1-month-my-sports-sd.jpg', '2019-10-12 07:38:27', '2019-10-12 07:38:27'),
(13, 51, 'Airtel Digital 1 Month My Family Pack SD', NULL, '<h2>Standard Definition (SD)</h2>\r\nGet great \r\ndeals and offers on Airtel digital TV New Connection Price to forget the\r\n poor performance of local cable network and bring home Airtel Digital \r\nTV Set Top Box. The program guide gives you all the information that you\r\n require regarding what is available with this package. With this set \r\ntop box, you can view only those programs that you want anytime. Compare\r\n a wide range of features and functionalities, it makes for a completely\r\n user-friendly system. Now you can order this Airtel Digital My Family \r\nSD Pack with a 12-month warranty at your fingertips. Also, it comes with\r\n a universal remote, so you don’t have to manage two separate remotes \r\nfor managing your TV and Set Top Box.<br>', 2000.00, 1800.00, '1570865982-airtel-digital-1-month-my-family-pack-sd.jpg', '2019-10-12 07:39:42', '2019-10-12 07:39:42'),
(14, 51, 'Airtel Digital 1 Month My Kids SD', NULL, '<h2>Standard Definition (SD)</h2>\r\nCompare \r\nPrice of Airtel Dish TV and get best Airtel DTH HD connection online, \r\nforget the poor performance of local cable network and bring home Airtel\r\n Digital TV Set Top Box. The program guide gives you all the information\r\n that you require regarding what is available with this package. With \r\nthis set-top box, you can view only those programs that you want \r\nanytime. With a wide range of features and functionalities, it makes for\r\n a completely user-friendly system. Now you can order this Airtel \r\nDigital My Kids SD with a 12-month warranty at your fingertips. Also, it\r\n comes with a universal remote, so you don’t have to manage two separate\r\n remotes for managing your TV and Set Top Box.<br>', 1850.00, 1685.00, '1570866114-airtel-digital-1-month-my-kids-sd.jpg', '2019-10-12 07:41:54', '2019-10-12 07:41:54'),
(15, 50, 'Airtel Xstream Best Plan', NULL, '1 Month Dabang HD free <br><div>\r\n+ Airtel TV content free for 1 year costing Rs 1200</div><div><br></div><div>2nd Month onwards 3 options available for customer.<br>\r\n# customer can continue with same Mega HD plan with Rs710 monthly rental<br>\r\n# Customer can switch to any other plan<br>\r\n# Customer can have his own plan.</div><br>', 4500.00, 3999.00, '1570866259-airtel-xstream-best-plan.jpg', '2019-10-12 07:44:19', '2019-10-12 07:44:19'),
(16, 50, 'Xstream Box', NULL, '<span><b>Airtel</b> introduced <b>Xstream Box</b>\r\n as a one device to get access to your streaming as well as DTH content.\r\n It runs Android Pie and offers access to apps via the Play Store. The \r\ndevice comes with 2GB RAM, 8GB eMMC storage and supports external \r\nstorage up to 128GB via microSD card slot.</span><br>', 3850.00, 3639.00, '1570866490-xstream-box.png', '2019-10-12 07:48:11', '2019-10-15 05:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_att`
--

CREATE TABLE `product_att` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_att`
--

INSERT INTO `product_att` (`id`, `products_id`, `weight`, `dimensions`, `stock`, `created_at`, `updated_at`) VALUES
(4, 71, '0.058kg', '13 * 12 cm', 2, '2019-09-26 07:43:52', '2019-09-26 07:43:52'),
(2, 70, '0.325 kg', '50 *70 cm', 1, '2019-09-26 05:21:40', '2019-09-26 05:21:40'),
(3, 69, '0.325 kg', '50 *70 cm', 2, '2019-09-26 05:22:08', '2019-09-26 05:22:08'),
(5, 72, '0.858kg', '15 * 15 cm', 3, '2019-09-26 07:57:26', '2019-10-03 01:23:15'),
(6, 1, NULL, NULL, 10, '2019-10-12 07:04:36', '2019-10-12 07:04:36'),
(7, 2, NULL, NULL, 10, '2019-10-12 07:16:47', '2019-10-12 07:16:47'),
(8, 3, NULL, NULL, 10, '2019-10-12 07:22:58', '2019-10-12 07:22:58'),
(9, 16, NULL, NULL, 10, '2019-10-12 07:49:47', '2019-10-12 07:49:47'),
(10, 15, NULL, NULL, 10, '2019-10-12 07:49:53', '2019-10-12 07:49:53'),
(11, 14, NULL, NULL, 10, '2019-10-12 07:50:02', '2019-10-12 07:50:02'),
(12, 13, NULL, NULL, 10, '2019-10-12 07:50:09', '2019-10-12 07:50:09'),
(13, 12, NULL, NULL, 10, '2019-10-12 07:50:20', '2019-10-12 07:50:20'),
(14, 11, NULL, NULL, 10, '2019-10-12 07:50:29', '2019-10-12 07:50:29'),
(15, 10, NULL, NULL, 10, '2019-10-12 07:50:36', '2019-10-12 07:50:36'),
(16, 9, NULL, NULL, 10, '2019-10-12 07:50:47', '2019-10-12 07:50:47'),
(17, 8, NULL, NULL, 10, '2019-10-12 07:50:56', '2019-10-12 07:50:56'),
(18, 7, NULL, NULL, 10, '2019-10-12 07:51:02', '2019-10-12 07:51:02'),
(19, 6, NULL, NULL, 10, '2019-10-12 07:51:10', '2019-10-12 07:51:10'),
(20, 5, NULL, NULL, 10, '2019-10-12 07:51:20', '2019-10-12 07:51:20'),
(21, 4, NULL, NULL, 10, '2019-10-12 07:51:27', '2019-10-12 07:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `sub_email`, `updated_at`) VALUES
(3, 'vgunaseelan97@gmail.com', '2019-10-22 05:42:54'),
(4, 'babu@gmail.com', '2019-10-22 05:43:10'),
(5, 'gunaseelan97@gmail.com', '2019-10-24 04:32:05'),
(6, 'guna@gmail.com', '2019-10-24 10:06:22'),
(7, 'guna22@gmail.com', '2019-10-24 10:06:36'),
(8, 'gunaseelan@gmail.com', '2019-11-18 07:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_packages`
--

CREATE TABLE `sub_packages` (
  `sub_id` int(11) NOT NULL,
  `packages_id` int(11) NOT NULL,
  `sub_pack_name` varchar(100) NOT NULL,
  `sub_pack_image` text NOT NULL,
  `per_month` varchar(100) NOT NULL,
  `sub_pack_description` text NOT NULL,
  `old_price` double DEFAULT NULL,
  `new_price` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_packages`
--

INSERT INTO `sub_packages` (`sub_id`, `packages_id`, `sub_pack_name`, `sub_pack_image`, `per_month`, `sub_pack_description`, `old_price`, `new_price`, `status`, `created_at`, `updated_at`) VALUES
(9, 4, 'Tamil HD pack', '1571142012-tamil-hd-pack.jpg', '267 per month', '105 channels & services + FTA', 2244, 1399, 0, '2019-10-15 12:16:48', '2019-10-15 12:20:12'),
(11, 5, 'Telugu HD Mega pack ', '1571142668-teluguhd-pack.jpg', '267 per month', '115 channels & services + FTA', 2250, 1500, 0, '2019-10-15 12:31:08', '2019-10-16 04:07:20'),
(12, 8, 'Karnataka Pack HD Value', '1571142725-karnataka-pack-hd.jpg', '267 per month', '105 channels & services + FTA', 2500, 3000, 0, '2019-10-15 12:32:05', '2019-10-16 04:07:13'),
(13, 7, 'Malayalam SD pack', '1571142012-tamil-hd-pack.jpg', '150 per month', '150 channels & 3 month free', NULL, 2000, 0, '2019-10-17 06:26:14', '2019-10-17 06:26:14'),
(14, 8, 'Karnataka Value Lite Pack HD', '1571379019-karnataka-value-lite-pack-hd.jpg', '360 per month', '99 channels & services + FTA', 2160, 1659, 0, '2019-10-18 06:10:19', '2019-10-18 06:10:19'),
(15, 8, 'Karnataka Value Sports Pack HD', '1571379057-karnataka-value-sports-pack-hd.jpg', '441 per month', '118 channels & services + FTA', 2241, 1789, 0, '2019-10-18 06:10:57', '2019-10-18 06:10:57'),
(16, 8, 'Karnataka My Family Pack HD', '1571379135-karnataka-my-family-pack-hd.jpg', '580 per month', '129 channels & services + FTA', 2380, 1879, 0, '2019-10-18 06:12:15', '2019-10-18 06:12:15'),
(17, 8, 'Karnataka Mega Pack HD', '1571379326-karnataka-mega-pack-hd.jpg', '150 per month', '138 channels & services + FTA', 2487, 1986, 0, '2019-10-18 06:15:26', '2019-10-18 06:15:26'),
(18, 7, 'mayalam HD pack value', '1571379533-mayalam-hd-pack-value.jpg', '150 per month', '98 channels & services + FTA', 2549, 1589, 0, '2019-10-18 06:18:53', '2019-10-18 06:18:53'),
(19, 7, 'Malayam Value Lite Pack HD', '1571379570-malayam-value-lite-pack-hd.jpg', '200 per month', '150 channels & services + FTA', 2250, 2000, 0, '2019-10-18 06:19:30', '2019-10-18 06:19:30'),
(20, 7, 'Malayalam My Family Pack HD', '1571379639-malayalam-my-family-pack-hd.jpg', '441 per month', '105 channels & services + FTA', 3559, 2999, 0, '2019-10-18 06:20:39', '2019-10-18 06:20:39'),
(21, 7, 'Malayalam Mega Pack HD', '1571379676-malayalam-mega-pack-hd.jpg', '345 per month', '120 channels & services + FTA', 3590, 3349, 0, '2019-10-18 06:21:16', '2019-10-18 06:21:16'),
(22, 6, 'Hindi Value Lite Pack HD', '1571379739-hindi-value-lite-pack-hd.jpg', '150 per month', '98 channels & services + FTA', 2499, 2349, 0, '2019-10-18 06:22:19', '2019-10-18 06:22:19'),
(23, 6, 'Hindi Value Sports Pack HD', '1571379782-hindi-value-sports-pack-hd.jpg', '441 per month', '120 channels & services + FTA', 3559, 2590, 0, '2019-10-18 06:23:02', '2019-10-18 06:23:02'),
(24, 5, 'Telugu Value Lite Pack HD', '1571379822-telugu-value-lite-pack-hd.jpg', '150 per month', '98 channels & services + FTA', 2359, 1259, 0, '2019-10-18 06:23:42', '2019-10-18 06:23:42'),
(25, 5, 'TeluguValue Sports Pack HD', '1571379851-teluguvalue-sports-pack-hd.jpg', '441 per month', '198 channels & services + FTA', 4549, 4000, 0, '2019-10-18 06:24:12', '2019-10-18 06:24:12'),
(26, 5, 'TeluguMy Family Pack HD', '1571379877-telugumy-family-pack-hd.jpg', '360 per month', '200 channels & services + FTA', 5000, 4559, 0, '2019-10-18 06:24:37', '2019-10-18 06:24:37'),
(27, 4, 'Tamil My Family Pack HD', '1571379994-tamil-my-family-pack-hd.jpg', '150 per month', '108 channels & services + FTA', 3559, 3350, 0, '2019-10-18 06:26:34', '2019-10-18 06:26:34'),
(28, 4, 'Tamil Value Lite Pack HD', '1571380019-tamil-value-lite-pack-hd.jpg', '441 per month', '198 channels & services + FTA', 4550, 4200, 0, '2019-10-18 06:26:59', '2019-10-18 06:26:59'),
(29, 4, 'TamilMy Family Pack HD', '1571380039-tamilmy-family-pack-hd.jpg', '360 per month', '198 channels &amp; services + FTA', 3500, 3000, 0, '2019-10-18 06:27:19', '2019-10-22 12:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `products_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 27, '7664271544063472.jpg', '2018-12-05 19:31:12', '2018-12-05 19:31:12'),
(9, 27, '6768551544063472.jpg', '2018-12-05 19:31:13', '2018-12-05 19:31:13'),
(10, 27, '4131281544063473.jpg', '2018-12-05 19:31:13', '2018-12-05 19:31:13'),
(11, 28, '6720891544063734.jpg', '2018-12-05 19:35:34', '2018-12-05 19:35:34'),
(12, 28, '4686631544063734.jpg', '2018-12-05 19:35:34', '2018-12-05 19:35:34'),
(13, 28, '5960611544063759.jpeg', '2018-12-05 19:35:59', '2018-12-05 19:35:59'),
(14, 29, '5146071544063935.JPG', '2018-12-05 19:38:55', '2018-12-05 19:38:55'),
(15, 29, '762811544063935.jpg', '2018-12-05 19:38:55', '2018-12-05 19:38:55'),
(16, 29, '3716041544063935.jpg', '2018-12-05 19:38:56', '2018-12-05 19:38:56'),
(17, 30, '6832831544064156.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(18, 30, '1655391544064157.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(19, 30, '4693601544064157.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(20, 31, '9233341544064441.jpg', '2018-12-05 19:47:21', '2018-12-05 19:47:21'),
(21, 31, '8167501544064441.jpg', '2018-12-05 19:47:22', '2018-12-05 19:47:22'),
(22, 31, '3887071544064442.jpg', '2018-12-05 19:47:22', '2018-12-05 19:47:22'),
(23, 32, '3998691544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(24, 32, '1159141544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(25, 32, '2035101544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(26, 33, '2128501544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(27, 33, '5649911544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(28, 33, '3704141544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(29, 34, '3899431544065346.JPG', '2018-12-05 20:02:26', '2018-12-05 20:02:26'),
(30, 34, '119131544065346.jpg', '2018-12-05 20:02:27', '2018-12-05 20:02:27'),
(31, 34, '6905491544065347.jpg', '2018-12-05 20:02:27', '2018-12-05 20:02:27'),
(32, 35, '981591544065510.jpeg', '2018-12-05 20:05:10', '2018-12-05 20:05:10'),
(33, 35, '5320811544065510.jpg', '2018-12-05 20:05:11', '2018-12-05 20:05:11'),
(34, 35, '1153181544065511.jpg', '2018-12-05 20:05:11', '2018-12-05 20:05:11'),
(35, 36, '9198911569389295.jpg', '2019-09-24 23:58:16', '2019-09-24 23:58:16'),
(36, 36, '2838871569389302.png', '2019-09-24 23:58:24', '2019-09-24 23:58:24'),
(37, 50, '7456611569421202.jpg', '2019-09-25 08:50:02', '2019-09-25 08:50:02'),
(38, 50, '8131331569421389.jpg', '2019-09-25 08:53:09', '2019-09-25 08:53:09'),
(39, 50, '7865451569421394.png', '2019-09-25 08:53:15', '2019-09-25 08:53:15'),
(40, 63, '6195051569482217.png', '2019-09-26 01:46:58', '2019-09-26 01:46:58'),
(41, 63, '4397721569482223.png', '2019-09-26 01:47:03', '2019-09-26 01:47:03'),
(42, 15, '6384341571380632.jpg', '2019-10-18 06:37:12', '2019-10-18 06:37:12'),
(43, 15, '6365171571380637.jpg', '2019-10-18 06:37:18', '2019-10-18 06:37:18'),
(44, 15, '1522511571380644.jpg', '2019-10-18 06:37:25', '2019-10-18 06:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`, `address`, `city`, `state`, `country`, `pincode`, `mobile`) VALUES
(11, 'babu', 'babu12@gmail.com', NULL, '$2y$10$3tbhwHWgMiw2O/F4QemnIeL/tLX5VCHZrFX5alVseULZKTccWiEyO', NULL, NULL, '2019-10-22 11:32:00', '2019-10-22 11:32:00', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'gunaseelan', 'gunaseelan12@gmail.com', NULL, '$2y$10$KCH1WgDbXYlQ.f1WXLsaFOOEsiXJ1cb1rjZeOzeanLjiwSm3zhFz.', NULL, '2jOTqivd0e1TI23anyVSLyTO4mFtSWfpKQtVCilL0R6dwgmJCzdyX4RFXZXY', '2019-10-08 23:45:33', '2019-10-09 00:05:58', '2/55', 'vellore', 'tamilnadu', 'India', '632107', '7200787807'),
(5, 'gunaseelan', 'gunaseelan97@gmail.com', NULL, '$2y$10$JAruIOrXaMsiQogS2txW5uC.INcxMBti1yIyldudx7GuS8U3TAeDm', 1, 'PSu1eqKZeYXFSAue6kU6ktpvwDnFy3mDucs5TpfZMrxQkcdg518FsvJHotGu', '2019-09-24 23:40:33', '2019-10-12 06:21:25', '2/55', 'vellore', 'tamilnadu', 'Austria', '12152', '7200787807');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_enquire`
--
ALTER TABLE `customer_enquire`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_channels`
--
ALTER TABLE `language_channels`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `language_pack`
--
ALTER TABLE `language_pack`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_package`
--
ALTER TABLE `orders_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pack_channels`
--
ALTER TABLE `pack_channels`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_att`
--
ALTER TABLE `product_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `sub_email` (`sub_email`);

--
-- Indexes for table `sub_packages`
--
ALTER TABLE `sub_packages`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_enquire`
--
ALTER TABLE `customer_enquire`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `language_channels`
--
ALTER TABLE `language_channels`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `language_pack`
--
ALTER TABLE `language_pack`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_package`
--
ALTER TABLE `orders_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pack_channels`
--
ALTER TABLE `pack_channels`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_att`
--
ALTER TABLE `product_att`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_packages`
--
ALTER TABLE `sub_packages`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `language_pack`
--
ALTER TABLE `language_pack`
  ADD CONSTRAINT `language_pack_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `packages` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
