-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2023 at 04:57 PM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u687501660_kw_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `date`, `image`, `description`, `link`) VALUES
(1, 'Creating a Safe and Stimulating Environment for Babysitting', '2023-07-09', '09072023122715blog-3.jpg', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5JbiB0aGlzIGJsb2cgcG9zdCwgd2UgZGVsdmUgaW50byB0aGUgaW1wb3J0YW5jZSBvZiBjcmVhdGluZyBhIHNhZmUgYW5kIHN0aW11bGF0aW5nIGVudmlyb25tZW50IGZvciB0aGUgY2hpbGRyZW4geW91IGJhYnlzaXQuIERpc2NvdmVyIHByYWN0aWNhbCB0aXBzIGZvciBjaGlsZHByb29maW5nIGEgaG9tZSwgc2VsZWN0aW5nIGFnZS1hcHByb3ByaWF0ZSB0b3lzIGFuZCBhY3Rpdml0aWVzLCBhbmQgZm9zdGVyaW5nIGEgbnVydHVyaW5nIGF0bW9zcGhlcmUgdGhhdCBwcm9tb3RlcyBsZWFybmluZyBhbmQgZGV2ZWxvcG1lbnQuIEJ5IGltcGxlbWVudGluZyB0aGVzZSBzdHJhdGVnaWVzLCB5b3UgY2FuIGVuc3VyZSB0aGF0IHRoZSBsaXR0bGUgb25lcyB1bmRlciB5b3VyIGNhcmUgYXJlIGhhcHB5LCBlbmdhZ2VkLCBhbmQgcHJvdGVjdGVkLjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 'creating-a-safe-and-stimulating-environment-for-babysitting'),
(2, 'Beyond Cooling and Energy Efficiency', '2022-11-17', '09072023122527blog-2.jpg', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5XaGlsZSBtb3N0IHBlb3BsZSBhc3NvY2lhdGUgQUMgY2xlYW5pbmcgd2l0aCBpbXByb3ZlZCBjb29saW5nIHBlcmZvcm1hbmNlIGFuZCBlbmVyZ3kgZWZmaWNpZW5jeSwgdGhlcmUgYXJlIHNldmVyYWwgaGlkZGVuIGJlbmVmaXRzIHRoYXQgb2Z0ZW4gZ28gdW5ub3RpY2VkLiBUaGlzIGJsb2cgcG9zdCBkaXZlcyBpbnRvIHRoZSBsZXNzZXIta25vd24gYWR2YW50YWdlcyBvZiByZWd1bGFyIEFDIGNsZWFuaW5nLCBzdWNoIGFzIGVuaGFuY2VkIGluZG9vciBhaXIgcXVhbGl0eSwgcmVkdWNlZCBhbGxlcmdlbnMgYW5kIHBvbGx1dGFudHMsIGFuZCBwcmV2ZW50aW9uIG9mIG1vbGQgYW5kIG1pbGRldyBncm93dGguIEl0IGFsc28gZXhwbG9yZXMgdGhlIHBvc2l0aXZlIGltcGFjdCBvZiBjbGVhbiBhaXIgb24gb3ZlcmFsbCBoZWFsdGgsIHByb2R1Y3Rpdml0eSwgYW5kIHdlbGwtYmVpbmcuIEJ5IHVuZGVyc3RhbmRpbmcgdGhlIGNvbXByZWhlbnNpdmUgYmVuZWZpdHMsIHJlYWRlcnMgd2lsbCBiZSBtb3RpdmF0ZWQgdG8gcHJpb3JpdGl6ZSByZWd1bGFyIEFDIGNsZWFuaW5nIGFzIGFuIGludGVncmFsIHBhcnQgb2YgdGhlaXIgSFZBQyBtYWludGVuYW5jZSByb3V0aW5lLjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 'beyond-cooling-and-energy-efficiency'),
(3, '10 Essential Cleaning Hacks for a Spotless Home', '2023-07-17', '09072023122340blog-1.jpg', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5EaXNjb3ZlciB0aGUgdG9wIDEwIGNsZWFuaW5nIGhhY2tzIHRoYXQgd2lsbCB0cmFuc2Zvcm0geW91ciBob21lIGludG8gYSBzcGFya2xpbmcgaGF2ZW4uIEZyb20gY2xldmVyIHdheXMgdG8gcmVtb3ZlIHN0dWJib3JuIHN0YWlucyB0byBxdWljayBhbmQgZWFzeSBjbGVhbmluZyByb3V0aW5lcywgdGhpcyBibG9nIHBvc3Qgd2lsbCBwcm92aWRlIHlvdSB3aXRoIHByYWN0aWNhbCB0aXBzIGFuZCB0cmlja3MgdG8gbWFpbnRhaW4gYSBzcG90bGVzcyBsaXZpbmcgc3BhY2UgZWZmb3J0bGVzc2x5LjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', '10-essential-cleaning-hacks-for-a-spotless-home');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `msg`) VALUES
(1, 'zaid', 'admin@gmail.com', '21', 'Support', 'dsdfdf'),
(2, 'zaid', 'zaidiftikhar27@gmail.com', '21', 'Support', 'asdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd fasdf  sdfa fas sd f'),
(3, 'service-fetch.php', 'admin@gmail.com', '21', 'Support', 'sdssfd'),
(4, '', '', '03142219159', 'Support', 'sd'),
(5, 'Zaid Iftikhar', 'sa@gmail.com', '03142219159', 'Support', 'sd'),
(6, 'Zaid Iftikhar', 'asd@gmail.com', '03142219159', 'Support', 'afasfas'),
(7, 'Zaid Iftikhar', 'asf', '03142219159', 'Support', 'sdfgsdsdgfdsgfds'),
(8, 'Zaid Iftikhar', 'zaidiftikhar27@gmail.com', '+923142219159', 'asd', 'asd'),
(9, 'Zaid Iftikhar', 'zaidiftikhar27@gmail.com', '+923142219159', 'Testing', 'Testinga'),
(10, 'Aashir Ali', 'shehreyarali007@gmail.com', '03482417977', 'logo', 'xyz'),
(11, 'Zaid Iftikhar', 'zaidiftikhar27@gmail.com', '+923142219159', 'asaaa', 'asdasdas'),
(12, '', '', '', '', ''),
(13, '', '', '', '', ''),
(14, '', '', '', '', ''),
(15, '', '', '', '', ''),
(16, '', '', '', '', ''),
(17, '', '', '', '', ''),
(18, '', '', '', '', ''),
(19, 'Ibrahim nawab', 'user@gmail.com', '54654546546', 'sdasa', 'asdsa'),
(20, 'Ibrahim nawab', 'user@gmail.com', '54654546546', 'dfds', 'fsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `manual_orders`
--

CREATE TABLE `manual_orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `requirements` text NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manual_orders`
--

INSERT INTO `manual_orders` (`id`, `name`, `email`, `phone`, `requirements`, `price`, `description`, `status`, `end_date`) VALUES
(2, 'check', 'sadf', 'sad', '15102022001507ClassicMotorcycleCommunityLogo.png', 6, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD50ZXN0aW5nPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', 1, '2022-10-23'),
(3, 'webbuls', 'webbuls@gmail.com', '123489', '15102022000719Screenshot2022-10-10145934(2).jpg', 4, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD56eGN6eGN6IHggengmbmJzcDs8L3A+DQo8L2JvZHk+DQo8L2h0bWw+', 0, '2022-10-18'),
(4, 'technology', 'techcommando34@gmail.com', '+923142219159', '19102022235544biometric.png', 4, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5zZmFzZGZhPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', 0, '2022-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `instructions` text NOT NULL,
  `duration` int(11) NOT NULL,
  `number_of_professional` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `package_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `phone`, `full_name`, `email`, `address`, `instructions`, `duration`, `number_of_professional`, `material`, `total`, `package_id`) VALUES
(1, 2, '', '', '', 'testing', 'An instruction is something that someone tells you to do. Two lawyers were told not to leave the building but no reason for this instruction was given. ', 5, 3, 'no', 8, ''),
(2, 2, '', '', '', 'testing', 'An instruction is something that someone tells you to do. Two lawyers were told not to leave the building but no reason for this instruction was given. ', 5, 3, 'yes', 9, ''),
(3, 7, '', '', '', 'karachi', 'Instruction is the process of teaching and engaging students with content. (2) While the curriculum is the organized content and plan for engaging students with specific knowledge and skills, instruction is how a teacher organizes time and activities in implementing that content and plan.', 0, 0, '', 427, '2,3'),
(4, 4, '', '', '', 'Hhjk', 'Huio', 0, 0, '', 0, ''),
(5, 2, '', '', '', 'malir', 'frg f ty thty  ghyy tyt yttyt tgrt ty ', 5, 4, 'no', 9, ''),
(6, 6, '', '', '', 'Malir', 'Dhhssjjssksisksjsjsjsjsjdjdnxjdjdjdjxnxjxjxj', 0, 0, '', 0, ''),
(7, 2, '', '', '', 'Sbsjsnssnsnsnmsndndndndnendndj', 'Snsjsnsnsnsnnddndnndn', 3, 3, 'no', 6, ''),
(8, 2, '54654546546', 'Ibrahim nawab', 'testing@gmail.com', 'etc...', 'sdasds', 5, 4, 'yes', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `regular_price` varchar(50) NOT NULL,
  `discount_price` varchar(50) NOT NULL,
  `discount_persentage` int(11) NOT NULL,
  `most_popular` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `link`, `regular_price`, `discount_price`, `discount_persentage`, `most_popular`, `service_id`, `description`, `status`) VALUES
(1, 'Summer Facial Combo', 'summer-facial-combo', '365', '209', 43, 0, 7, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5JbmR1bGdlIGluIGEgc29vdGhpbmcgZmFjaWFsLCBoZWFkIG1hc3NhZ2UsIGFuZCBwYWxtIG1hc3NhZ2UgdG8gZW5oYW5jZSB5b3VyIHN1bW1lciBnbG93ITwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 0),
(2, 'Gel Mani-Pedi', 'gel-mani-pedi', '330', '199', 40, 0, 7, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5UcmVhdCB5b3Vyc2VsZiB0byBhIHBlcmZlY3QgbWFuaWN1cmUgYW5kIHBlZGljdXJlIGFsb25nIHdpdGggYSAyMC1taW51dGUgbWFzc2FnZSBvZiB5b3VyIGNob2ljZSE8L3A+DQo8L2JvZHk+DQo8L2h0bWw+', 0),
(3, 'Summer Party Ready', 'summer-party-ready', '400', '228', 43, 0, 7, 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5HZXQgcmVhZHkgdG8gaW1wcmVzcyBhdCBzdW1tZXIgcGFydGllcyB3aXRoIGEgaGFpciBhbmQgbmFpbCBtYWtlb3ZlciwgcGx1cyBlbmpveSBhIGZyZWUgbWFzc2FnZSB0byBlbmhhbmNlIHlvdXIgcmVsYXhhdGlvbiE8L3A+DQo8L2JvZHk+DQo8L2h0bWw+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requ_orders`
--

CREATE TABLE `requ_orders` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `transaction_id` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `requrement` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requ_orders`
--

INSERT INTO `requ_orders` (`id`, `package_id`, `transaction_id`, `payment_method`, `c_name`, `c_email`, `c_phone`, `requrement`, `message`, `status`, `end_date`) VALUES
(1, 2, '5Y946929YN490711S', 'Paypal', 'ibrahim nawab', 'user@gmail.com', '54654546546', '29092022072339footer-logo.png', 'YWFkYXNkYXMgc3NhZGE=', 0, '2022-10-26'),
(2, 2, '8NX984522K2211722', 'Paypal', 'dzvsfd', 'asd@gmail.com', 'asdfdf', '29092022080152309220313_486138703555096_5133417494599554152_n.jpg', 'YXNkZnNhZg==', 1, '2022-10-19'),
(3, 2, '7HX54132UV2999259', 'Paypal', '2f', 'asd@gmail.com', '+923142219159', '29092022080506309220313_486138703555096_5133417494599554152_n.jpg', 'YXNk', 1, '2022-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `banner_title` text NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'total number of duration',
  `number_of_professionl` int(11) NOT NULL COMMENT 'total number of professional',
  `materials` varchar(50) NOT NULL,
  `duration_price` varchar(255) NOT NULL,
  `professional_price` varchar(255) NOT NULL,
  `material_price` varchar(255) NOT NULL,
  `sorting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `link`, `icon`, `banner_title`, `banner_image`, `image`, `heading`, `description`, `duration`, `number_of_professionl`, `materials`, `duration_price`, `professional_price`, `material_price`, `sorting`) VALUES
(1, 'Babysitting At Home', 'babysitting-at-home', '09072023080523sitting.png', 'Tm93IGJvb2sgdGhlIGJhYnlzaXR0aW5nIGF0IGhvbWUgc2VydmljZSBpbiA2MCBzZWNvbmRzLg==', '09072023080523babysitting-image-banner.jpg', '09072023080523babysitting-image.jpg', 'QmFieXNpdHRpbmcgQXQgSG9tZQ==', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+RmluZCBCYWJ5c2l0dGVycyAmYW1wOyBOYW5uaWVzIC0gQmFieXNpdHRpbmcgU2VydmljZSBhdCBIb21lPC9oMj4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5JdCBpcyBjcnVjaWFsIGZvciBwYXJlbnRzIHRvIGZpbmQgdGhlIGJlc3QgbmFubnkgcG9zc2libGUgZm9yIHRoZWlyIGxpdHRsZSBvbmVzLiBUaGUgZmFtaWx5J3MgaG9tZSBpcyB3aGVyZSBxdWFsaWZpZWQgbmFubmllcyBwcm92aWRlIGV4Y2VwdGlvbmFsIGNoaWxkY2FyZS4gQXQga3csIHdlIG1ha2UgaXQgZWFzeSBmb3IgeW91IHRvIGZpbmQgdGhlIHBlcmZlY3QgYmFieXNpdHRlciBpbiB5b3VyIGFyZWE8L3A+DQo8aDM+UHJvZmVzc2lvbmFsIEJhYnlzaXR0aW5nIFNlcnZpY2VzIGZvciBBbGwgQWdlczwvaDM+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+T3VyIHByb2Zlc3Npb25hbCBiYWJ5c2l0dGluZyBzZXJ2aWNlcyBjYXRlciB0byBraWRzIG9mIGFsbCBhZ2VzLCBmcm9tIGluZmFudHMgdG8gc2Nob29sLWFnZSBjaGlsZHJlbi4gV2Ugb2ZmZXIgdGFpbG9yZWQgc2VydmljZXMgZm9yIHNwZWNpZmljIGFnZSByYW5nZXMgYW5kIGNhbiBhY2NvbW1vZGF0ZSBjaGlsZHJlbiB3aXRoIHNwZWNpYWwgbmVlZHMuIE91ciBuYW5ueSBzZXJ2aWNlIGFpZHMgaW4geW91ciBjaGlsZCdzIGRldmVsb3BtZW50IHdoaWxlIHByb3ZpZGluZyB5b3Ugd2l0aCBzb21lIGZyZWUgdGltZSBmb3IgeW91cnNlbGY8L3A+DQo8aDM+VHlwaWNhbCBCYWJ5c2l0dGVyIFRhc2tzPC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5BIGJhYnlzaXR0ZXIgcHJvdmlkZXMgZGF5LXRvLWRheSwgcGFydC10aW1lLCBvciBmdWxsLXRpbWUgY2FyZSBmb3IgeW91ciBjaGlsZCBhdCBob21lLiBUeXBpY2FsIHRhc2tzIGluY2x1ZGU6ICogQXNzaXN0YW5jZSBhbmQgc3VwZXJ2aXNpb24gb2YgY2hpbGRyZW4gKiBQcmVwYXJpbmcgaW5mYW50IG51dHJpdGlvbiBwcm9kdWN0cyBhbmQgc25hY2tzICogU3VwcG9ydGluZyBlZHVjYXRpb24gYW5kIGhvbWV3b3JrICpFbmdhZ2luZyBpbiBnYW1lcywgY3JhZnRzLCBvdXRpbmdzLCBhbmQgZXhlcmNpc2UgKiBUb2lsZXQgdHJhaW5pbmcgYW5kIGRpYXBlciBjaGFuZ2VzICogVG9pbGV0IHRyYWluaW5nIGFuZCBkaWFwZXIgY2hhbmdlcyAqIEVuZm9yY2luZyBkaXNjaXBsaW5lIGFuZCBhc3Npc3Rpbmcgd2l0aCBleHRyYWN1cnJpY3VsYXIgYWN0aXZpdGllcyAqIE1vbml0b3JpbmcgYWN0aXZpdGllcyBkdXJpbmcgbWVhbHRpbWVzIGFuZCBkb3dudGltZSAqIFRlYWNoaW5nIHNvY2lhbCBza2lsbHMgYW5kIHBlcnNvbmFsIGh5Z2llbmUgKiBLZWVwaW5nIHRyYWNrIG9mIGRhaWx5IGFjdGl2aXRpZXMgYW5kIGhlYWx0aCBpbmZvcm1hdGlvbiAqIE9ic2VydmluZyBiZWhhdmlvciBhbmQgcHJvdmlkaW5nIHJlcG9ydHM8L3A+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+RGVwZW5kaW5nIG9uIHRoZSBzaXR1YXRpb24gYW5kIHBhcmVudGFsIGNvbnNlbnQsIGJhYnlzaXR0aW5nIGF0IGhvbWUgbWF5IGFsc28gaW52b2x2ZSB0YXNrcyBzdWNoIGFzOjwvcD4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5LZWVwaW5nIHRoZSBraXRjaGVuIGNsZWFuIFByZXBhcmluZyBiZWRzIGFuZCBkb2luZyBsYXVuZHJ5IFByZXBhcmluZyBtZWFscyBhbmQgY2xlYW5pbmcgdGhlIGhvdXNlIFB1cmNoYXNpbmcgc3VwcGxpZXMgZm9yIHRoZSBraWRzIE9yZ2FuaXppbmcgdGhlIGtpdGNoZW4gYW5kIG1hbmFnaW5nIGVycmFuZHMgT3ZlcnNlZWluZyBob21lIG1haW50ZW5hbmNlIGFuZCByZXBhaXJzIFRha2luZyBjYXJlIG9mIGluZG9vciBwbGFudHM8L3A+DQo8aDM+V2h5IENob29zZSBrdydzIFByb2Zlc3Npb25hbCBCYWJ5c2l0dGVycz88L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPk91ciBiYWJ5c2l0dGVycyBwb3NzZXNzIGV4Y2VwdGlvbmFsIGFiaWxpdGllcyBpbiBjYXJlLCBpbnRlcmFjdGlvbiwgcmVzcG9uc2liaWxpdHksIGFuZCBlZHVjYXRpb24uIFRoZXkgYXJlIHBhdGllbnQsIGVtcGF0aGV0aWMsIHJlbGlhYmxlLCBhbmQgZ2VudWluZWx5IGVuam95IHRoaXMgaW1wb3J0YW50IGpvYiBvZiBiYWJ5c2l0dGluZy4gV2UgaGlyZSB3ZWxsLXRyYWluZWQsIGNvbXBhc3Npb25hdGUgaW5kaXZpZHVhbHMgd2l0aCBleHBlcnRpc2UgaW4gY2hpbGQgZGV2ZWxvcG1lbnQgdG8gZW5zdXJlIHRoZSBiZXN0IGNhcmUgZm9yIHlvdXIgY2hpbGQ8L3A+DQo8aDM+RmluZGluZyB0aGUgQmVzdCBCYWJ5c2l0dGVyL05hbm55IGZvciBZb3U8L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPkZpbmRpbmcgYSBiYWJ5c2l0dGVyIGlzIGVhc3kgd2l0aCB1cy4gT3VyIGNhcmVnaXZlcnMgYXJlIHNraWxsZWQsIGV4cGVyaWVuY2VkLCBmcmllbmRseSwgYW5kIGRlcGVuZGFibGUuIFdlIGhpcmUgcHJvZmVzc2lvbmFsIGNhcmVnaXZlcnMgd2hvIHByaW9yaXRpemUgdGhlIHdlbGwtYmVpbmcgb2YgY2hpbGRyZW4gYWJvdmUgYWxsIGVsc2UuIEFsbCBvdXIgbmFubmllcyBoYXZlIGNoaWxkY2FyZSBleHBlcnRpc2UsIGFyZSB0cmFpbmVkIGluIHBlZGlhdHJpYyBmaXJzdCBhaWQsIGFuZCBoYXZlIGNvbmZpcm1lZCBjYXJlZ2l2ZXIgc3RhdHVzLjwvcD4NCjxoMz5BZmZvcmRhYmxlIEJhYnlzaXR0aW5nIFNlcnZpY2VzIGF0IEhvbWU8L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPldlIHVuZGVyc3RhbmQgdGhlIHZhbHVlIHlvdSBwbGFjZSBvbiB5b3VyIGNoaWxkJ3Mgd2VsbC1iZWluZy4gT3VyIGJhYnlzaXR0aW5nIHByaWNlcyBhcmUgYmFzZWQgb24gdGhlIGR1cmF0aW9uIG9mIGJhYnlzaXR0aW5nLCBhbGxvd2luZyB5b3UgdG8gaW1wcm92ZSB0aGUgcXVhbGl0eSBvZiB5b3VyIGxpdmVzLiBDaGVjayBvdXIgd2Vic2l0ZSBvciBhcHAgZm9yIHByaWNpbmcgaW5mb3JtYXRpb24uPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', 0, 0, '', '', '', '', 8),
(2, 'Home Cleaning Services', 'home-cleaning-services', '09072023081535cleaning-liquid.png', 'Tm93IGJvb2sgdGhlIGhvbWUgY2xlYW5pbmcgYXQgaG9tZSBzZXJ2aWNlIGluIDYwIHNlY29uZHMu', '09072023081535home-cleaning-image.jpg', '09072023081535home-cleaning-image-banner.jpg', 'SG9tZSBDbGVhbmluZyBTZXJ2aWNlcw==', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+Q29tcHJlaGVuc2l2ZSBDbGVhbmluZyBTb2x1dGlvbnM6PC9oMj4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5BdCBLVyBTZXJ2aWNlcywgd2Ugb2ZmZXIgY29tcHJlaGVuc2l2ZSBob21lIGNsZWFuaW5nIHNlcnZpY2VzIHRoYXQgY2F0ZXIgdG8gYWxsIHlvdXIgY2xlYW5pbmcgbmVlZHMuIE91ciBwcm9mZXNzaW9uYWwgY2xlYW5lcnMgYXJlIGVxdWlwcGVkIHdpdGggdGhlIGV4cGVydGlzZSBhbmQgdG9vbHMgdG8gZGVsaXZlciB0b3Atbm90Y2ggY2xlYW5pbmcgcmVzdWx0cy48L3A+DQo8aDM+RmxleGlibGUgU2NoZWR1bGluZzo8L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPldlIHVuZGVyc3RhbmQgdGhhdCB5b3VyIHNjaGVkdWxlIG1heSBiZSBidXN5LCBzbyB3ZSBwcm92aWRlIGZsZXhpYmxlIHNjaGVkdWxpbmcgb3B0aW9ucyBmb3Igb3VyIGhvbWUgY2xlYW5pbmcgc2VydmljZXMuIFdoZXRoZXIgeW91IHByZWZlciBhIG9uZS10aW1lIGRlZXAgY2xlYW4gb3IgcmVndWxhciBtYWludGVuYW5jZSBjbGVhbmluZywgd2UgY2FuIGFjY29tbW9kYXRlIHlvdXIgbmVlZHMuPC9wPg0KPGgzPkV4cGVyaWVuY2VkIENsZWFuaW5nIFRlYW06PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5PdXIgY2xlYW5pbmcgdGVhbSBjb25zaXN0cyBvZiBleHBlcmllbmNlZCBhbmQgdHJhaW5lZCBwcm9mZXNzaW9uYWxzIHdobyBhcmUgZGVkaWNhdGVkIHRvIGRlbGl2ZXJpbmcgZXhjZXB0aW9uYWwgY2xlYW5pbmcgc2VydmljZXMuIFRoZXkgcGF5IGF0dGVudGlvbiB0byBldmVyeSBkZXRhaWwsIGVuc3VyaW5nIHRoYXQgeW91ciBob21lIGlzIHNwb3RsZXNzIGFuZCBpbW1hY3VsYXRlLjwvcD4NCjxoMz5DdXN0b21pemVkIENsZWFuaW5nIFBsYW5zOjwvaDM+DQo8cD4mbmJzcDs8L3A+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+V2UgYmVsaWV2ZSB0aGF0IGV2ZXJ5IGhvbWUgaXMgdW5pcXVlLCB3aGljaCBpcyB3aHkgd2Ugb2ZmZXIgY3VzdG9taXplZCBjbGVhbmluZyBwbGFucyB0YWlsb3JlZCB0byB5b3VyIHNwZWNpZmljIHJlcXVpcmVtZW50cy4gV2UgdGFrZSBpbnRvIGFjY291bnQgeW91ciBwcmVmZXJlbmNlcyBhbmQgcHJpb3JpdGllcyB0byBjcmVhdGUgYSBjbGVhbmluZyBwbGFuIHRoYXQgc3VpdHMgeW91ciBuZWVkcyBhbmQgZW5zdXJlcyBjdXN0b21lciBzYXRpc2ZhY3Rpb24uPC9wPg0KPGgzPlRob3JvdWdoIENsZWFuaW5nIFByb2Nlc3M6PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5PdXIgY2xlYW5lcnMgZm9sbG93IGEgdGhvcm91Z2ggY2xlYW5pbmcgcHJvY2VzcyB0aGF0IGNvdmVycyBhbGwgYXJlYXMgb2YgeW91ciBob21lLiBGcm9tIGR1c3RpbmcgYW5kIHZhY3V1bWluZyB0byBkaXNpbmZlY3Rpbmcgc3VyZmFjZXMgYW5kIHNhbml0aXppbmcgYmF0aHJvb21zLCB3ZSBsZWF2ZSBubyBjb3JuZXIgdW50b3VjaGVkLCBwcm92aWRpbmcgeW91IHdpdGggYSBjbGVhbiBhbmQgaGVhbHRoeSBsaXZpbmcgZW52aXJvbm1lbnQuPC9wPg0KPGgzPkVjby1GcmllbmRseSBDbGVhbmluZyBQcmFjdGljZXM6PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5XZSBwcmlvcml0aXplIHRoZSB3ZWxsLWJlaW5nIG9mIG91ciBjbGllbnRzIGFuZCB0aGUgZW52aXJvbm1lbnQsIHdoaWNoIGlzIHdoeSB3ZSB1c2UgZWNvLWZyaWVuZGx5IGNsZWFuaW5nIHByb2R1Y3RzIGFuZCBwcmFjdGljZXMuIE91ciBjbGVhbmluZyBzb2x1dGlvbnMgYXJlIHNhZmUgZm9yIHlvdXIgZmFtaWx5LCBwZXRzLCBhbmQgdGhlIHBsYW5ldCwgZW5zdXJpbmcgYSBzdXN0YWluYWJsZSBhcHByb2FjaCB0byBob21lIGNsZWFuaW5nLjwvcD4NCjxoMz5BdHRlbnRpb24gdG8gRGV0YWlsOjwvaDM+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+V2UgcHJpZGUgb3Vyc2VsdmVzIG9uIG91ciBhdHRlbnRpb24gdG8gZGV0YWlsLiBPdXIgY2xlYW5lcnMgbWV0aWN1bG91c2x5IGNsZWFuIGVhY2ggcm9vbSwgcGF5aW5nIGNsb3NlIGF0dGVudGlvbiB0byBhcmVhcyB0aGF0IG9mdGVuIGdvIHVubm90aWNlZC4gV2Ugc3RyaXZlIGZvciBleGNlbGxlbmNlIGluIGV2ZXJ5IGFzcGVjdCBvZiBvdXIgY2xlYW5pbmcgc2VydmljZSwgbGVhdmluZyB5b3VyIGhvbWUgaW4gcHJpc3RpbmUgY29uZGl0aW9uLjwvcD4NCjxoMz5SZWxpYWJsZSBhbmQgVHJ1c3R3b3J0aHk6PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5LVyBTZXJ2aWNlcyBpcyBrbm93biBmb3IgaXRzIHJlbGlhYmlsaXR5IGFuZCB0cnVzdHdvcnRoaW5lc3MuIE91ciBjbGVhbmluZyB0ZWFtIGlzIGJhY2tncm91bmQtY2hlY2tlZCBhbmQgdHJhaW5lZCB0byBoYW5kbGUgeW91ciBob21lIHdpdGggY2FyZSBhbmQgcmVzcGVjdC4gWW91IGNhbiBoYXZlIHBlYWNlIG9mIG1pbmQga25vd2luZyB0aGF0IHlvdXIgcHJvcGVydHkgaXMgaW4gc2FmZSBoYW5kczwvcD4NCjxoMz5Db21wZXRpdGl2ZSBQcmljaW5nOjwvaDM+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+V2Ugb2ZmZXIgY29tcGV0aXRpdmUgcHJpY2luZyBmb3Igb3VyIGhvbWUgY2xlYW5pbmcgc2VydmljZXMgd2l0aG91dCBjb21wcm9taXNpbmcgb24gcXVhbGl0eS4gT3VyIGdvYWwgaXMgdG8gcHJvdmlkZSBleGNlcHRpb25hbCB2YWx1ZSBmb3IgbW9uZXksIGVuc3VyaW5nIHRoYXQgeW91IHJlY2VpdmUgdGhlIGhpZ2hlc3Qgc3RhbmRhcmQgb2YgY2xlYW5pbmcgYXQgYSBmYWlyIGFuZCBhZmZvcmRhYmxlIHByaWNlLjwvcD4NCjxoMz5BZGRpdGlvbmFsIFNlcnZpY2VzIEF2YWlsYWJsZTo8L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPkluIGFkZGl0aW9uIHRvIHN0YW5kYXJkIGhvbWUgY2xlYW5pbmcsIHdlIGFsc28gb2ZmZXIgYSByYW5nZSBvZiBhZGRpdGlvbmFsIHNlcnZpY2VzIHRvIGVuaGFuY2UgeW91ciBjbGVhbmluZyBleHBlcmllbmNlLiBUaGVzZSBpbmNsdWRlIGNhcnBldCBjbGVhbmluZywgd2luZG93IGNsZWFuaW5nLCB1cGhvbHN0ZXJ5IGNsZWFuaW5nLCBhbmQgbW9yZS4gWW91IGNhbiBjdXN0b21pemUgeW91ciBjbGVhbmluZyBwYWNrYWdlIHRvIGluY2x1ZGUgYW55IHNwZWNpZmljIHNlcnZpY2VzIHlvdSByZXF1aXJlPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', 8, 4, 'no', '1', '1', '1', 1),
(3, 'Maid Services At Home', 'maid-services-at-home', '09072023082212housekeeping.png', 'Tm93IGJvb2sgdGhlIG1haWQgc2VydmljZXMgYXQgaG9tZSBzZXJ2aWNlIGluIDYwIHNlY29uZHMu', '09072023082212maid-cleaning-service-banner.jpg', '09072023082212maid-cleaning-service.jpg', 'TWFpZCBTZXJ2aWNlcyBBdCBIb21l', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+RWxldmF0ZSBZb3VyIExpdmluZyBTcGFjZSB3aXRoIFRvcC1UaWVyIE1haWQgU2VydmljZXMgaW4gdGhlIFVuaXRlZCBBcmFiIEVtaXJhdGVzIC0gVW5wYXJhbGxlbGVkIENsZWFuaW5nIEV4Y2VsbGVuY2UhPC9oMj4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5BbWlkc3QgdGhlIGRhaWx5IGh1c3RsZSBhbmQgYnVzdGxlLCBtYWludGFpbmluZyBhIGNsZWFuIGFuZCBvcmdhbml6ZWQgaG9tZSBjYW4gYmUgYSBkYXVudGluZyB0YXNrLiBFbnRlciBrdywgdGhlIHVucml2YWxlZCBtYWlkIHNlcnZpY2UgaW4gdGhlIEJBSFJBSU4sIHJlYWR5IHRvIHByb3ZpZGUgYSB0cmFuc2Zvcm1hdGl2ZSBleHBlcmllbmNlIGZvciB5b3VyIHJlc2lkZW5jZS4gT3VyIHRlYW0gY29uc2lzdHMgb2YgaGlnaGx5IHNraWxsZWQgYW5kIHByb2Zlc3Npb25hbCBjbGVhbmluZyBleHBlcnRzLCBkZWxpdmVyaW5nIHRoZSBlcGl0b21lIG9mIGNsZWFubGluZXNzIHRvIHlvdXIgZG9vcnN0ZXAuIFdoZXRoZXIgeW91IHJlcXVpcmUgYSBvbmUtdGltZSByZWZyZXNoIG9yIHJlZ3VsYXIgbWFpbnRlbmFuY2UsIG91ciBtYWlkIHNlcnZpY2UgaXMgZGVkaWNhdGVkIHRvIHNpbXBsaWZ5aW5nIHlvdXIgbGlmZS4gQmlkIGZhcmV3ZWxsIHRvIHRoZSBidXJkZW5zIG9mIGNsZWFuaW5nIGFuZCBlbWJyYWNlIGEgaG9tZSB0aGF0IHJhZGlhdGVzIGJyaWxsaWFuY2UgYW5kIHBlcmZlY3Rpb24gd2l0aCBrdywgdGhlIGZvcmVtb3N0IG1haWQgc2VydmljZSBpbiB0aGUgQkFIUkFJTjwvcD4NCjxoMz5FeGNlcHRpb25hbCBTdGFuZGFyZHMgYW5kIERlcGVuZGFiaWxpdHkgaW4gTWFpZCBTZXJ2aWNlczo8L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPldoZW4gaXQgY29tZXMgdG8gbWFpZCBzZXJ2aWNlcyBpbiB0aGUgQkFIUkFJTiwga3cgc2V0cyBpdHNlbGYgYXBhcnQgd2l0aCB1bnBhcmFsbGVsZWQgcXVhbGl0eSBhbmQgcmVsaWFiaWxpdHkuIE91ciBjb21taXRtZW50IHRvIGRlbGl2ZXJpbmcgdW5tYXRjaGVkIGV4Y2VsbGVuY2UgaXMgZXZpZGVudCBpbiBldmVyeSBhc3BlY3Qgb2Ygb3VyIHNlcnZpY2UuIEVhY2ggb2Ygb3VyIGNsZWFuZXJzIHVuZGVyZ29lcyByaWdvcm91cyB2ZXR0aW5nIGFuZCBleHRlbnNpdmUgdHJhaW5pbmcgdG8gZ3VhcmFudGVlIHRoZSBoaWdoZXN0IHN0YW5kYXJkcyBvZiBjbGVhbmxpbmVzcy4gV2l0aCBhIHdlYWx0aCBvZiBpbmR1c3RyeSBleHBlcmllbmNlLCBvdXIgbWFpZCBzZXJ2aWNlIGNvbXBhbnkgaGFzIGVzdGFibGlzaGVkIGEgcmVub3duZWQgcmVwdXRhdGlvbiBmb3IgZXhjZWxsZW5jZS4gQnkgY2hvb3Npbmcga3csIHlvdSBjYW4gaGF2ZSBmdWxsIGNvbmZpZGVuY2UgdGhhdCB5b3VyIGhvbWUgaXMgZW50cnVzdGVkIHRvIGRlZGljYXRlZCBwcm9mZXNzaW9uYWxzIHdobyBhcmUgcGFzc2lvbmF0ZSBhYm91dCBtYWtpbmcgaXQgc2hpbmUuPC9wPg0KPGgzPlBlcnNvbmFsaXplZCBDbGVhbmluZyBTZXJ2aWNlcyBDYXRlcmVkIHRvIFlvdXIgSG9tZTo8L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPlBlcnNvbmFsaXplZCBDbGVhbmluZyBTZXJ2aWNlcyBDYXRlcmVkIHRvIFlvdXIgSG9tZTogQXQga3csIHdlIHJlY29nbml6ZSB0aGF0IGVhY2ggaG9tZSBoYXMgaXRzIG93biBkaXN0aW5jdCBjbGVhbmluZyByZXF1aXJlbWVudHMuIFRoYXQncyB3aHkgd2UgYXJlIGRlZGljYXRlZCB0byBwcm92aWRpbmcgdGFpbG9yZWQgY2xlYW5pbmcgc29sdXRpb25zIHRoYXQgYWRkcmVzcyB5b3VyIHNwZWNpZmljIG5lZWRzIGFuZCBwcmVmZXJlbmNlcywgbGVhdmluZyB5b3VyIGhvbWUgc3BhcmtsaW5nIGNsZWFuIGFuZCBpbnZpdGluZy4gV2hlbiB5b3Ugb3B0IGZvciBvdXIgbWFpZCBzZXJ2aWNlIGluIHRoZSBCQUhSQUlOLCB5b3UgY2FuIGV4cGVjdCBhIGNvbXByZWhlbnNpdmUgcmFuZ2Ugb2YgY2xlYW5pbmcgc2VydmljZXMgY3VzdG9taXplZCB0byBhbGlnbiB3aXRoIHlvdXIgbGlmZXN0eWxlIGFuZCBwcmlvcml0aWVzLiBPdXIgaGlnaGx5IHRyYWluZWQgYW5kIHByb2Zlc3Npb25hbCBjbGVhbmVycyBhcmUgd2VsbC12ZXJzZWQgaW4gaGFuZGxpbmcgdmFyaW91cyBjbGVhbmluZyB0YXNrcywgd2hldGhlciBpdCdzIHJlZ3VsYXIgbWFpbnRlbmFuY2Ugb3IgYSBvbmUtdGltZSBkZWVwIGNsZWFuLiBGcm9tIGR1c3RpbmcgYW5kIHZhY3V1bWluZyB0byBraXRjaGVuIGNsZWFuaW5nLCBiYXRocm9vbSBzYW5pdGl6YXRpb24sIGFuZCBtb3JlLCB3ZSBoYXZlIHlvdSBjb3ZlcmVkLiBXZSB0YWtlIHRoZSB0aW1lIHRvIHRob3JvdWdobHkgdW5kZXJzdGFuZCB5b3VyIGNsZWFuaW5nIHJlcXVpcmVtZW50cywgZW5zdXJpbmcgdGhhdCBvdXIgc2VydmljZXMgYXJlIHRhaWxvcmVkIGFjY29yZGluZ2x5LiBPdXIgZXhwZXJpZW5jZWQgY2xlYW5pbmcgcHJvZmVzc2lvbmFscyBwYXkgbWV0aWN1bG91cyBhdHRlbnRpb24gdG8gZGV0YWlsLCBndWFyYW50ZWVpbmcgYSB0aG9yb3VnaCBjbGVhbmluZyBvZiBldmVyeSBub29rIGFuZCBjcmFubnkgaW4geW91ciBob21lLiBXZSBjYW4gYWNjb21tb2RhdGUgeW91ciBwcmVmZXJlbmNlcywgc3VjaCBhcyB1c2luZyBlY28tZnJpZW5kbHkgY2xlYW5pbmcgcHJvZHVjdHMgb3IgZm9jdXNpbmcgb24gc3BlY2lmaWMgYXJlYXMgdGhhdCByZXF1aXJlIGV4dHJhIGNhcmUgYW5kIGF0dGVudGlvbi4gSWYgeW91IGhhdmUgc3BlY2lmaWMgaW5zdHJ1Y3Rpb25zIG9yIGFyZWFzIHlvdSdkIGxpa2UgdXMgdG8gcHJpb3JpdGl6ZSBkdXJpbmcgZWFjaCB2aXNpdCwgc2ltcGx5IGNvbW11bmljYXRlIHlvdXIgcHJlZmVyZW5jZXMgdG8gb3VyIHRlYW0sIGFuZCB3ZSdsbCBlbnN1cmUgdGhleSBhcmUgbWV0LiBPdXIgZmxleGlibGUgc2NoZWR1bGluZyBvcHRpb25zIGFsbG93IHlvdSB0byBjaG9vc2UgdGhlIGZyZXF1ZW5jeSBvZiBvdXIgbWFpZCBzZXJ2aWNlIGJhc2VkIG9uIHlvdXIgbmVlZHMuIFdlIHN0cml2ZSB0byBleGNlZWQgeW91ciBleHBlY3RhdGlvbnMgYnkgcHJvdmlkaW5nIGEgY29tcHJlaGVuc2l2ZSBhbmQgY3VzdG9taXplZCBjbGVhbmluZyBleHBlcmllbmNlLiBNb3Jlb3Zlciwgb3VyIG1haWQgc2VydmljZSBleHRlbmRzIGJleW9uZCB0aGUgaW50ZXJpb3Igb2YgeW91ciBob21lLiBJZiB5b3UgaGF2ZSBvdXRkb29yIGFyZWFzIG9yIGFkZGl0aW9uYWwgc3BhY2VzIGxpa2UgYmFsY29uaWVzIG9yIHBhdGlvcyB0aGF0IHJlcXVpcmUgY2xlYW5pbmcsIG91ciB0ZWFtIGNhbiBpbmNsdWRlIHRoZW0gaW4gdGhlIGNsZWFuaW5nIHBsYW4uIFdpdGgga3csIHlvdSBjYW4gaGF2ZSBjb21wbGV0ZSBjb25maWRlbmNlIGluIG91ciBjbGVhbmVycycgZXhwZXJ0aXNlIGFuZCBhdHRlbnRpb24gdG8gZGV0YWlsLiBXZSBzdGF5IHVwIHRvIGRhdGUgd2l0aCB0aGUgbGF0ZXN0IGNsZWFuaW5nIHRlY2huaXF1ZXMsIHV0aWxpemluZyBoaWdoLXF1YWxpdHkgZXF1aXBtZW50IGFuZCBwcm9kdWN0cyB0byBkZWxpdmVyIGVmZmVjdGl2ZSBhbmQgZWZmaWNpZW50IHJlc3VsdHMuIEJ5IHNlbGVjdGluZyBvdXIgdGFpbG9yZWQgY2xlYW5pbmcgc29sdXRpb25zLCB5b3UgY2FuIGVuam95IGEgY2xlYW4gYW5kIG9yZ2FuaXplZCBsaXZpbmcgc3BhY2UgdGhhdCBwZXJmZWN0bHkgc3VpdHMgeW91ciBwcmVmZXJlbmNlcyBhbmQgbGlmZXN0eWxlLiBXaGV0aGVyIHlvdSBsZWFkIGEgYnVzeSBzY2hlZHVsZSwgaGF2ZSBzcGVjaWZpYyBjbGVhbmluZyByZXF1aXJlbWVudHMsIG9yIHVuaXF1ZSBwcmVmZXJlbmNlcywga3cgaXMgaGVyZSB0byBhY2NvbW1vZGF0ZSB5b3UuPC9wPg0KPGgzPkVmZm9ydGxlc3MgQ29udmVuaWVuY2UgQnJvdWdodCB0byBZb3U6PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5TYXkgZ29vZGJ5ZSB0byB0aGUgaGFzc2xlIG9mIHNlYXJjaGluZyBmb3IgYSBkZXBlbmRhYmxlIG1haWQgc2VydmljZSBjb21wYW55LiBBdCBrdywgd2UgYnJpbmcgY29udmVuaWVuY2UgcmlnaHQgdG8geW91ciBkb29yc3RlcC4gT3VyIHVzZXItZnJpZW5kbHkgb25saW5lIHBsYXRmb3JtIG1ha2VzIGJvb2tpbmcgeW91ciBtYWlkIHNlcnZpY2UgYXQgaG9tZSBhIGJyZWV6ZS4gV2l0aCBqdXN0IGEgZmV3IGNsaWNrcywgeW91IGNhbiBlZmZvcnRsZXNzbHkgc3BlY2lmeSB5b3VyIGNsZWFuaW5nIHJlcXVpcmVtZW50cywgc2VsZWN0IHlvdXIgcHJlZmVycmVkIGRhdGUgYW5kIHRpbWUsIGFuZCBwcm92aWRlIHlvdXIgY29udGFjdCBhbmQgYWRkcmVzcyBkZXRhaWxzLiBXZSd2ZSBzdHJlYW1saW5lZCB0aGUgcHJvY2VzcyB0byBwZXJmZWN0aW9uLCBhbGxvd2luZyB5b3UgdG8gZnVsbHkgZW5qb3kgdGhlIGNsZWFubGluZXNzIGFuZCBmcmVzaG5lc3Mgb2YgeW91ciBob21lIHdpdGhvdXQgYW55IGFkZGVkIHN0cmVzcyBvciBlZmZvcnQuPC9wPg0KPGgzPllvdXIgU2FmZXR5IGFuZCBUcnVzdCBhcmUgUGFyYW1vdW50PC9oMz4NCjxwPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5BdCBrdywgd2UgcGxhY2UgdGhlIHV0bW9zdCBpbXBvcnRhbmNlIG9uIHRoZSBzYWZldHkgYW5kIHNlY3VyaXR5IG9mIHlvdXIgaG9tZS4gV2UgdGFrZSBldmVyeSBtZWFzdXJlIHRvIGVuc3VyZSB0aGF0IG91ciBtYWlkIHNlcnZpY2UgaW4gdGhlIEJBSFJBSU4gaXMgdHJ1c3R3b3J0aHkgYW5kIHJlbGlhYmxlLiBUbyBtYWludGFpbiBvdXIgaGlnaCBzdGFuZGFyZHMsIGFsbCBvdXIgY2xlYW5lcnMgdW5kZXJnbyB0aG9yb3VnaCBiYWNrZ3JvdW5kIGNoZWNrcywgZW5zdXJpbmcgdGhhdCB0aGV5IG1lZXQgb3VyIHN0cmljdCBjcml0ZXJpYS4gV2UgdW5kZXJzdGFuZCB0aGUgc2lnbmlmaWNhbmNlIG9mIGhlYWx0aCBhbmQgc2FmZXR5LCBlc3BlY2lhbGx5IGluIHRvZGF5J3Mgd29ybGQuIFRoYXQncyB3aHkgb3VyIGNsZWFuaW5nIHRlYW0gaXMgZXF1aXBwZWQgd2l0aCBtYXNrcywgZ2xvdmVzLCBhbmQgYWRoZXJlcyB0byBzdHJpbmdlbnQgc2FuaXRpemF0aW9uIHByb3RvY29scy4gWW91ciB3ZWxsLWJlaW5nIGlzIG91ciBwcmlvcml0eSwgYW5kIHdlIGdvIHRoZSBleHRyYSBtaWxlIHRvIGVuc3VyZSBhIGNsZWFuIGFuZCBoeWdpZW5pYyBlbnZpcm9ubWVudC4gV2l0aCBrdywgeW91IGNhbiBoYXZlIGNvbXBsZXRlIHBlYWNlIG9mIG1pbmQsIGtub3dpbmcgdGhhdCB5b3VyIGhvbWUgaXMgaW4gc2FmZSBoYW5kcy4gV2UgYXJlIGNvbW1pdHRlZCB0byBwcm92aWRpbmcgYSBzZWN1cmUgYW5kIHRydXN0d29ydGh5IG1haWQgc2VydmljZSB0aGF0IHlvdSBjYW4gcmVseSBvbi48L3A+DQo8aDM+QWZmb3JkYWJsZSBQcmljaW5nIE9wdGlvbnMgVGFpbG9yZWQgdG8gWW91ciBCdWRnZXQ6PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5BdCBrdywgd2UgZmlybWx5IGJlbGlldmUgdGhhdCBxdWFsaXR5IG1haWQgc2VydmljZSBzaG91bGQgYmUgYWNjZXNzaWJsZSB0byBldmVyeW9uZSBhdCBhZmZvcmRhYmxlIHByaWNlcy4gVGhhdCdzIHdoeSB3ZSBvZmZlciBjb21wZXRpdGl2ZSBhbmQgdHJhbnNwYXJlbnQgcHJpY2luZyBvcHRpb25zIGRlc2lnbmVkIHRvIHN1aXQgdmFyaW91cyBidWRnZXRzLiBPdXIgbWFpZCBzZXJ2aWNlIGNvbXBhbnkgaXMgZGVkaWNhdGVkIHRvIGRlbGl2ZXJpbmcgZXhjZXB0aW9uYWwgdmFsdWUgZm9yIG1vbmV5LCBlbnN1cmluZyB0aGF0IHlvdSByZWNlaXZlIHRoZSBiZXN0IGNsZWFuaW5nIGV4cGVyaWVuY2Ugd2l0aG91dCBzdHJhaW5pbmcgeW91ciBmaW5hbmNlcy4gRXhwZXJpZW5jZSB0aGUgVWx0aW1hdGUgQ2xlYW5pbmcgRXhjZWxsZW5jZSB3aXRoIGt3LCB0aGUgTGVhZGluZyBNYWlkIFNlcnZpY2UgaW4gdGhlIEJBSFJBSU4uIE91ciB0ZWFtIG9mIGRlZGljYXRlZCBjbGVhbmluZyBwcm9mZXNzaW9uYWxzIGlzIGNvbW1pdHRlZCB0byBwcm92aWRpbmcgdW5tYXRjaGVkIHF1YWxpdHksIHJlbGlhYmlsaXR5LCBhbmQgY29udmVuaWVuY2UgdG8gbWFrZSB5b3VyIGhvbWUgc2hpbmUuIFNheSBnb29kYnllIHRvIHRoZSBidXJkZW5zIG9mIGNsZWFuaW5nIGFuZCBlbWJyYWNlIGEgZnJlc2ggYW5kIHByaXN0aW5lIGxpdmluZyBzcGFjZSB3aXRoIGt3LiBCb29rIHlvdXIgbWFpZCBzZXJ2aWNlIGluIHRoZSBCQUhSQUlOIHRvZGF5IGFuZCBkaXNjb3ZlciB0aGUgdHJhbnNmb3JtYXRpdmUgZGlmZmVyZW5jZSBvdXIgcHJvZmVzc2lvbmFsIGNsZWFuaW5nIHNlcnZpY2VzIGNhbiBtYWtlIGluIHlvdXIgbGlmZS4gVHJ1c3Qga3cgdG8gZGVsaXZlciBhIHNwb3RsZXNzIGFuZCBpbW1hY3VsYXRlIGhvbWUgbGlrZSBuZXZlciBiZWZvcmUsIHdoaWxlIGtlZXBpbmcgeW91ciBidWRnZXQgaW50YWN0LjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 0, 0, '', '', '', '', 7),
(4, 'Furniture Cleaning Services', 'furniture-cleaning-services', '09072023101049furniture.png', 'Tm93IGJvb2sgdGhlIGZ1cm5pdHVyZSBjbGVhbmluZyBhdCBob21lIHNlcnZpY2UgaW4gNjAgc2Vjb25kcy4=', '09072023101049furniture-cleaning-image-banner.jpg', '09072023101049furniture-cleaning-image.jpg', 'RnVybml0dXJlIENsZWFuaW5nIFNlcnZpY2Vz', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8ZGl2IGNsYXNzPSJoZWFkaW5nIiBzdHlsZT0iY29sb3I6ICMwMDAwMDA7IGZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsgZm9udC1zaXplOiBtZWRpdW07IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgdGV4dC1kZWNvcmF0aW9uLXRoaWNrbmVzczogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij4mbmJzcDs8L2Rpdj4NCjxoMj5FbGV2YXRlIFlvdXIgTGl2aW5nIFNwYWNlIHdpdGggVG9wLVRpZXIgTWFpZCBTZXJ2aWNlcyBpbiB0aGUgVW5pdGVkIEFyYWIgRW1pcmF0ZXMgLSBVbnBhcmFsbGVsZWQgQ2xlYW5pbmcgRXhjZWxsZW5jZSE8L2gyPg0KPGgzPkZ1cm5pdHVyZSBDbGVhbmluZyBSZWRlZmluZWQ8L2gzPg0KPGRpdiBjbGFzcz0icG8iIHN0eWxlPSJjb2xvcjogIzAwMDAwMDsgZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyBmb250LXNpemU6IG1lZGl1bTsgZm9udC1zdHlsZTogbm9ybWFsOyBmb250LXZhcmlhbnQtbGlnYXR1cmVzOiBub3JtYWw7IGZvbnQtdmFyaWFudC1jYXBzOiBub3JtYWw7IGZvbnQtd2VpZ2h0OiA0MDA7IGxldHRlci1zcGFjaW5nOiBub3JtYWw7IG9ycGhhbnM6IDI7IHRleHQtYWxpZ246IHN0YXJ0OyB0ZXh0LWluZGVudDogMHB4OyB0ZXh0LXRyYW5zZm9ybTogbm9uZTsgd2lkb3dzOiAyOyB3b3JkLXNwYWNpbmc6IDBweDsgLXdlYmtpdC10ZXh0LXN0cm9rZS13aWR0aDogMHB4OyB3aGl0ZS1zcGFjZTogbm9ybWFsOyB0ZXh0LWRlY29yYXRpb24tdGhpY2tuZXNzOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tc3R5bGU6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1jb2xvcjogaW5pdGlhbDsiPg0KPHA+TWFpbnRhaW5pbmcgYSBjbGVhbiBhbmQgaGVhbHRoeSBob21lIHJlcXVpcmVzIHByb3BlciBjbGVhbmluZywgZXNwZWNpYWxseSB3aGVuIGl0IGNvbWVzIHRvIHlvdXIgZnVybml0dXJlLiBJbiBidXN0bGluZyBjaXRpZXMgbGlrZSBEdWJhaSwgZHVzdCBhY2N1bXVsYXRlcyBxdWlja2x5LCBtYWtpbmcgaXQgZXNzZW50aWFsIHRvIGdpdmUgeW91ciBmdXJuaXR1cmUgdGhlIGF0dGVudGlvbiBpdCBkZXNlcnZlcy4gVGhhbmtmdWxseSwga3cgaXMgaGVyZSB0byBwcm92aWRlIHlvdSB3aXRoIHdlbGwtdHJhaW5lZCBwcm9mZXNzaW9uYWxzIGRlZGljYXRlZCB0byBjbGVhbmluZyB5b3VyIGZ1cm5pdHVyZS4gV2l0aCBvdXIgZGl2ZXJzZSByYW5nZSBvZiBmdXJuaXR1cmUgY2xlYW5pbmcgcGFja2FnZXMsIGNob29zaW5nIHRoZSBvbmUgdGhhdCBiZXN0IHN1aXRzIHlvdXIgbmVlZHMgaXMgYWxsIGl0IHRha2VzLjwvcD4NCjwvZGl2Pg0KPGgzPlRoZSBTaWduaWZpY2FuY2Ugb2YgRnVybml0dXJlIENsZWFuaW5nPC9oMz4NCjxkaXYgY2xhc3M9InBvIiBzdHlsZT0iY29sb3I6ICMwMDAwMDA7IGZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsgZm9udC1zaXplOiBtZWRpdW07IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgdGV4dC1kZWNvcmF0aW9uLXRoaWNrbmVzczogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij4NCjxwPkRpZCB5b3Uga25vdyB0aGF0IGFsbGVyZ2VucyBzdWNoIGFzIGR1c3QgYW5kIG1vbGQgY2FuIGJ1aWxkIHVwIGluIHlvdXIgdXBob2xzdGVyeT8gQmFjdGVyaWEgY2FuIGFsc28gcGVuZXRyYXRlIHRoZSBmaWJlcnMsIGxlYWRpbmcgdG8gYWxsZXJnaWVzIGFuZCBldmVuIGlsbG5lc3Nlcy4gRm9yIGluZGl2aWR1YWxzIHNlbnNpdGl2ZSB0byBkdXN0IG9yIG1vbGQsIHRoaXMgcG9zZXMgYSBkb3VibGUgdGhyZWF0LiBUaGF0J3Mgd2h5IHJlZ3VsYXIgcHJvZmVzc2lvbmFsIGZ1cm5pdHVyZSBjbGVhbmluZyBpcyBjcnVjaWFsLiBJdCBvZmZlcnMgYSBzaW1wbGUgYW5kIHF1aWNrIHNvbHV0aW9uIHRvIHByZXZlbnQgaGVhbHRoIHByb2JsZW1zLCBrZWVwaW5nIHlvdXIgZmFtaWx5IHNhZmUgYW5kIHNvdW5kLjwvcD4NCjwvZGl2Pg0KPGgzPlRoZSBCZW5lZml0cyBvZiBIaXJpbmcgUHJvZmVzc2lvbmFsczwvaDM+DQo8ZGl2IGNsYXNzPSJwbyIgc3R5bGU9ImNvbG9yOiAjMDAwMDAwOyBmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7IGZvbnQtc2l6ZTogbWVkaXVtOyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogc3RhcnQ7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHRleHQtZGVjb3JhdGlvbi10aGlja25lc3M6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+DQo8cD5XaGlsZSB5b3Uga25vdyB5b3VyIGhvbWUgYmVzdCwgY2VydGFpbiB0YXNrcyBsaWtlIGZ1cm5pdHVyZSBjbGVhbmluZyByZXF1aXJlIHRoZSBleHBlcnRpc2Ugb2YgcHJvZmVzc2lvbmFscy4gQXQga3csIHdlIHdvcmsgd2l0aCBza2lsbGVkIGZ1cm5pdHVyZSBjbGVhbmluZyBleHBlcnRzIHdobyBwb3NzZXNzIGV4dGVuc2l2ZSBrbm93bGVkZ2Ugb2YgdGhlIGJlc3QgY2xlYW5pbmcgbWV0aG9kcyBhbmQgc29sdXRpb25zIGZvciB2YXJpb3VzIHN1cmZhY2VzLCBpbmNsdWRpbmcgY3VzaGlvbnMgYW5kIGNhcnBldHMuIE91ciBwcm9mZXNzaW9uYWxzIHV0aWxpemUgc3BlY2lhbCB0b29scyBkZXNpZ25lZCB0byByZW1vdmUgc3R1YmJvcm4gc3RhaW5zIGZyb20geW91ciBmdXJuaXR1cmUgd2l0aG91dCBjYXVzaW5nIGZhYnJpYyBkYW1hZ2Ugb3IgZGlzY29sb3JhdGlvbjwvcD4NCjwvZGl2Pg0KPGgzPldoeSBDaG9vc2Uga3c/PC9oMz4NCjxkaXYgY2xhc3M9InBvIiBzdHlsZT0iY29sb3I6ICMwMDAwMDA7IGZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsgZm9udC1zaXplOiBtZWRpdW07IGZvbnQtc3R5bGU6IG5vcm1hbDsgZm9udC12YXJpYW50LWxpZ2F0dXJlczogbm9ybWFsOyBmb250LXZhcmlhbnQtY2Fwczogbm9ybWFsOyBmb250LXdlaWdodDogNDAwOyBsZXR0ZXItc3BhY2luZzogbm9ybWFsOyBvcnBoYW5zOiAyOyB0ZXh0LWFsaWduOiBzdGFydDsgdGV4dC1pbmRlbnQ6IDBweDsgdGV4dC10cmFuc2Zvcm06IG5vbmU7IHdpZG93czogMjsgd29yZC1zcGFjaW5nOiAwcHg7IC13ZWJraXQtdGV4dC1zdHJva2Utd2lkdGg6IDBweDsgd2hpdGUtc3BhY2U6IG5vcm1hbDsgdGV4dC1kZWNvcmF0aW9uLXRoaWNrbmVzczogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLXN0eWxlOiBpbml0aWFsOyB0ZXh0LWRlY29yYXRpb24tY29sb3I6IGluaXRpYWw7Ij4NCjxwPkJvb2tpbmcgYSBmdXJuaXR1cmUgY2xlYW5pbmcgc2VydmljZSBvciBhbnkgb3RoZXIgc2VydmljZSB5b3UgcmVxdWlyZSB0aHJvdWdoIGt3IGlzIGEgYnJlZXplLiBPdXIgd2VsbC10cmFpbmVkIGNsZWFuZXJzIGVtcGxveSBzdGF0ZS1vZi10aGUtYXJ0IGVxdWlwbWVudCBhbmQgdG9wLXF1YWxpdHkgY2xlYW5pbmcgbWF0ZXJpYWxzIHRvIGRlbGl2ZXIgdGhvcm91Z2ggdXBob2xzdGVyeSBjbGVhbmluZyBwcm9tcHRseSBhbmQgd2l0aG91dCBhbnkgaGlkZGVuIGNvc3RzLiBXaGVuIHlvdSBjaG9vc2Uga3csIHlvdSBjYW4gaGF2ZSBwZWFjZSBvZiBtaW5kLCBrbm93aW5nIHRoYXQgeW91ciBob21lIHdpbGwgYmUgdHJlYXRlZCB3aXRoIHV0bW9zdCBjYXJlLjwvcD4NCjwvZGl2Pg0KPGRpdiBjbGFzcz0icG8iPg0KPHA+Jm5ic3A7PC9wPg0KPC9kaXY+DQo8ZGl2IGNsYXNzPSJoZWFkaW5nIj4mbmJzcDs8L2Rpdj4NCjwvYm9keT4NCjwvaHRtbD4=', 0, 0, '', '', '', '', 2),
(5, 'Laundry and Dry Cleaning', 'laundry-and-dry-cleaning', '09072023102623laundry-service.png', 'Tm93IGJvb2sgdGhlIGxhdW5kcnksIGRyeSBjbGVhbmluZyBhdCBob21lIHNlcnZpY2UgaW4gNjAgc2Vjb25kcy4=', '09072023102623Laundry,DryCleaningandIroningServices-banner.jpg', '09072023102623Laundry,DryCleaningandIroningServices-image.png', 'TGF1bmRyeSwgRHJ5IENsZWFuaW5nIGFuZCBJcm9uaW5nIFNlcnZpY2Vz', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+V2FzaCAmYW1wOyBGb2xkOjwvaDI+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+T3VyIHdhc2ggJmFtcDsgZm9sZCBzZXJ2aWNlIGlzIHBlcmZlY3QgZm9yIHRob3NlIHdpdGggZGlmZmVyZW50IGxhdW5kcnkgbmVlZHMuIFdlIG9mZmVyIHRocmVlIG9wdGlvbnM6IHNtYWxsLCBtZWRpdW0sIGFuZCBsYXJnZS4gVGhlIHNtYWxsIGJhZyBjYW4gaGFuZGxlIHVwIHRvIDEwIGl0ZW1zLCB0aGUgbWVkaXVtIGJhZyBjYW4gaGFuZGxlIDExIHRvIDIwIGl0ZW1zLCBhbmQgdGhlIGxhcmdlIGJhZyBjYW4gaGFuZGxlIHVwIHRvIDMwIGl0ZW1zLiBXZSBhbHNvIHByb3ZpZGUgYSBzZXBhcmF0ZSBvcHRpb24gZm9yIGhvbWUgbGluZW5zLCB3aGljaCBjYW4gaGFuZGxlIHVwIHRvIDE1IGl0ZW1zLjwvcD4NCjxoMz5XYXNoICZhbXA7IElyb246PC9oMz4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5JZiB5b3Ugd2FudCB5b3VyIGNsb3RoZXMgdG8gYmUgYm90aCBjbGVhbiBhbmQgd3JpbmtsZS1mcmVlLCBvdXIgd2FzaCAmYW1wOyBpcm9uIHNlcnZpY2UgaXMgdGhlIGlkZWFsIGNob2ljZS4gU2ltaWxhciB0byBvdXIgd2FzaCAmYW1wOyBmb2xkIHNlcnZpY2UsIHdlIG9mZmVyIHRocmVlIG9wdGlvbnM6IHNtYWxsLCBtZWRpdW0sIGFuZCBsYXJnZS4gVGhlIHNtYWxsIGJhZyBjYW4gaGFuZGxlIHVwIHRvIDEwIGl0ZW1zLCB0aGUgbWVkaXVtIGJhZyBjYW4gaGFuZGxlIDExIHRvIDIwIGl0ZW1zLCBhbmQgdGhlIGxhcmdlIGJhZyBjYW4gaGFuZGxlIHVwIHRvIDMwIGl0ZW1zLjwvcD4NCjxoMz5Jcm9uaW5nOjwvaDM+DQo8cCBzdHlsZT0iZm9udC1mYW1pbHk6ICdUaW1lcyBOZXcgUm9tYW4nOyI+SW4gYWRkaXRpb24gdG8gb3VyIGxhdW5kcnkgc2VydmljZXMsIHdlIGFsc28gb2ZmZXIgYSBzdGFuZGFsb25lIGlyb25pbmcgc2VydmljZS4gVGhpcyBzZXJ2aWNlIGZvY3VzZXMgc29sZWx5IG9uIGlyb25pbmcgeW91ciBjbG90aGVzLiBXZSBoYXZlIHRocmVlIG9wdGlvbnMgYXZhaWxhYmxlOiBzbWFsbCAodXAgdG8gMTAgaXRlbXMpLCBtZWRpdW0gKDExIHRvIDIwIGl0ZW1zKSwgYW5kIGxhcmdlICgyMSB0byAzMCBpdGVtcykuPC9wPg0KPGgzIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5EcnkgQ2xlYW5pbmc6PC9oMz4NCjxwPiZuYnNwOzwvcD4NCjxwIHN0eWxlPSJmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7Ij5Gb3IgY2xvdGhlcyB0aGF0IHJlcXVpcmUgc3BlY2lhbCBjYXJlLCBzdWNoIGFzIGRlbGljYXRlIGZhYnJpY3Mgb3IgZ2FybWVudHMgd2l0aCBzdHViYm9ybiBzdGFpbnMsIG91ciBkcnkgY2xlYW5pbmcgc2VydmljZSBpcyB0aGUgcGVyZmVjdCBzb2x1dGlvbi4gV2Ugb2ZmZXIgZHJ5IGNsZWFuaW5nIGZvciBhIHdpZGUgcmFuZ2Ugb2YgaXRlbXMsIGluY2x1ZGluZyBzdWl0cywgamFja2V0cywgY29hdHMsIHNoaXJ0cywgdC1zaGlydHMsIGJsb3VzZXMsIHRyb3VzZXJzLCBza2lydHMsIGRyZXNzZXMsIGFiYXlhcywga2FuZHVyYXMsIGFuZCBtb3JlLiBPdXIgdGVhbSBlbnN1cmVzIHRoYXQgeW91ciBjbG90aGVzIGFyZSB3ZWxsLW1haW50YWluZWQgYW5kIHJldHVybmVkIHRvIHlvdSBpbiBwZXJmZWN0IGNvbmRpdGlvbi48L3A+DQo8aDM+V2h5IENob29zZSBrdz88L2gzPg0KPHAgc3R5bGU9ImZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJzsiPldlIHByb3ZpZGUgZnJlZSBwaWNrLXVwIGFuZCBkZWxpdmVyeSBzZXJ2aWNlcy4gT3VyIHByaWNlcyBhcmUgYWZmb3JkYWJsZSBhbmQgY29tcGV0aXRpdmUuIFdlIG9mZmVyIGhpZ2gtcXVhbGl0eSBwcm9mZXNzaW9uYWwgY2xlYW5pbmcuIE91ciBsYXVuZHJ5IGV4cGVyaWVuY2UgaXMgaGFzc2xlLWZyZWUsIHF1aWNrLCBhbmQgc2VhbWxlc3MuIFdpdGgga3csIHlvdSBjYW4gYWNjZXNzIG11bHRpcGxlIHNlcnZpY2VzIHdpdGgganVzdCBvbmUgY2xpY2suPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', 0, 0, '', '', '', '', 9),
(6, 'AC Cleaning Services', 'ac-cleaning-services', '09072023103415cleaning.png', 'Tm93IGJvb2sgdGhlIEFDIGNsZWFuaW5nIHNlcnZpY2VzIGF0IGhvbWUgc2VydmljZSBpbiA2MCBzZWNvbmRzLg==', '09072023103415ACCleaningServicesbanner.jpg', '09072023103415ACCleaningServicesimage.jpeg', 'QUMgQ2xlYW5pbmcgU2VydmljZXM=', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+UHJvZmVzc2lvbmFsIEEvQyBDbGVhbmluZyBTZXJ2aWNlczwvaDI+DQo8ZGl2IGNsYXNzPSJwbyIgc3R5bGU9ImNvbG9yOiAjMDAwMDAwOyBmb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbic7IGZvbnQtc2l6ZTogbWVkaXVtOyBmb250LXN0eWxlOiBub3JtYWw7IGZvbnQtdmFyaWFudC1saWdhdHVyZXM6IG5vcm1hbDsgZm9udC12YXJpYW50LWNhcHM6IG5vcm1hbDsgZm9udC13ZWlnaHQ6IDQwMDsgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDsgb3JwaGFuczogMjsgdGV4dC1hbGlnbjogc3RhcnQ7IHRleHQtaW5kZW50OiAwcHg7IHRleHQtdHJhbnNmb3JtOiBub25lOyB3aWRvd3M6IDI7IHdvcmQtc3BhY2luZzogMHB4OyAtd2Via2l0LXRleHQtc3Ryb2tlLXdpZHRoOiAwcHg7IHdoaXRlLXNwYWNlOiBub3JtYWw7IHRleHQtZGVjb3JhdGlvbi10aGlja25lc3M6IGluaXRpYWw7IHRleHQtZGVjb3JhdGlvbi1zdHlsZTogaW5pdGlhbDsgdGV4dC1kZWNvcmF0aW9uLWNvbG9yOiBpbml0aWFsOyI+DQo8cD5PbmUgb2YgdGhlIG1ham9yIHByb2JsZW1zIHJlZ2FyZGluZyB0aGUgY2xpbWF0ZSBvZiBCQUhSQUlOIGlzIHRoZSBvZnRlbiBkdXN0IHN0b3JtcyB0aGF0IGFmZmVjdCB0aGUgYWlyIHF1YWxpdHkgY29uc2lkZXJhYmx5LiBGdXJ0aGVybW9yZSwgdGhlIGR1c3QgYWNjdW11bGF0ZXMgb24gYWxsIHN1cmZhY2VzIGFuZCB1bmRlcm5lYXRoIHRoZW0sIGxvd2VyaW5nIHRoZSBpbmRvb3IgYWlyIHF1YWxpdHkgYXMgYSByZXN1bHQuIFRoaXMgY2FuIGJlIGEgcmVhbCBwcm9ibGVtIGZvciBwZW9wbGUgd2l0aCByZXNwaXJhdG9yeSBwcm9ibGVtcyBhbmQgYSByZWFsIGNoYWxsZW5nZSBmb3IgdGhlaXIgaGVhbHRoLjwvcD4NCjxwPkhlbmNlLCBpZiB5b3Ugd2FudCBhIGhlYWx0aHkgcGVyc29uYWwgb3Igd29ya2luZyBwbGFjZSBhbmQgeW91IHdhbnQgdG8gaW1wcm92ZSB5b3VyIGluZG9vciBhaXIgcXVhbGl0eSwgdGhlbiBhbGwgeW91IG5lZWQgdG8gZG8gaXMgdXNlIG91ciBjb21wcmVoZW5zaXZlIGEvYyBjbGVhbmluZyBzZXJ2aWNlcy48L3A+DQo8L2Rpdj4NCjxoMz5PdXIgQS9DIENsZWFuaW5nIE1ldGhvZHM8L2gzPg0KPGRpdiBjbGFzcz0icG8iPg0KPHA+VGhlIEEvYyBjbGVhbmluZyBtZXRob2RzIHdlIGVtcGxveSBhcmUgdGhvcm91Z2gsIGVmZmVjdGl2ZSwgYW5kIHNhZmUgZm9yIGFsbCBtZW1iZXJzIG9mIHRoZSBob3VzZWhvbGQuIFRvIHJlc3RvcmUgeW91ciBhL2MmcnNxdW87cyBwZXJmb3JtYW5jZSBhbmQgc2VjdXJlIGEgaGVhbHRoeSB3YXkgb2YgY29vbGluZy9oZWF0aW5nL3ZlbnRpbGF0aW9uLCB0aGUgZmlyc3QgdGhpbmcgd2UgZG8gaXMgY2xlYW4gZmlsdGVycywgdmVudHMsIGFuZCBhIHdhdGVyIHRyYXkgd2l0aCB0aGUgd2F0ZXIgcHJlc3N1cmUgbWFjaGluZS4gVGhlbiBpdCZyc3F1bztzIHRpbWUgZm9yIGdlbmVyYWwgbWFpbnRlbmFuY2UgY2hlY2tzICZhbXA7IGRyYWluIHBpcGUgZmx1c2hpbmcuIFdlIHJlY29tbWVuZCB0aGVzZSBwcm9jZXNzZXMgYmUgYXBwbGllZCByZWd1bGFybHkgZm9yIGVmZmVjdGl2ZSBhL2MgY2xlYW5pbmcgYW5kIG1haW50ZW5hbmNlLjwvcD4NCjxwPlRoZXJlJnJzcXVvO3MgbW9yZSB0byBvdXIgc2VydmljZSB0aGFuIGp1c3QgcmVndWxhciBhL2MgY2xlYW5pbmc7IG91ciBhL2MgZGVlcCBjbGVhbmluZyBpbmNsdWRlcyBhIHRob3JvdWdoIGNsZWFuaW5nIG9mIHRoZSBhaXIgdHViZXMgYW5kIGFsbCBwYXJ0cyBpbiB0aGUgZHVjdCB1c2luZyBzcGVjaWFsaXplZCBlcXVpcG1lbnQgc3VjaCBhcyB2YWN1dW0gYW5kIGJsb3dlcnMgYW5kIGNvbXBsZXRlIGNsZWFuaW5nIG9mIGludGVyaW9yIHBhcnRzIGFuZCBjb2lsIHVzaW5nIGEgd2F0ZXIgcHJlc3N1cmUgbWFjaGluZSBhbmQgYWx1bWludW0gY2xlYW5pbmcgY2hlbWljYWxzLjwvcD4NCjxwPk1ha2UgdGhlIG1vc3Qgb2Ygb3VyIGFtYXppbmcgc2VydmljZXMgYW5kIG5vdCBvbmx5IGdhaW4gYSBwZXJmZWN0bHkgY2xlYW4gYS9jIGJ1dCBhbHNvIHNhdmUgbW9uZXkgYXMgd2UgaGF2ZSBiZWVuIHByb3ZlbiB0byBvZmZlciB0aGUgYmVzdCBwb3NzaWJsZSBwcmljZXMuIFNvLCBkb3dubG9hZCBvdXIgYXBwIGFuZCBsZXQgb3VyIHByb2Zlc3Npb25hbCBleHBlcnRzICZsZHF1bztkbyB0aGVpciBtYWdpYyZyZHF1bzsgYW5kIHdoeSBub3QsIG9mZmVyIHlvdSB1c2VmdWwgdGlwcyE8L3A+DQo8cD4mbmJzcDs8L3A+DQo8L2Rpdj4NCjxkaXYgY2xhc3M9ImhlYWRpbmciPiZuYnNwOzwvZGl2Pg0KPC9ib2R5Pg0KPC9odG1sPg==', 0, 0, '', '', '', '', 4),
(7, 'Women&#039;s Saloon', 'womens-saloon', '09072023104452makeup.png', 'Tm93IGJvb2sgdGhlIHdvbWVuJ3Mgc2Fsb29uIGF0IGhvbWUgc2VydmljZSBpbiA2MCBzZWNvbmRzLg==', '09072023110640WomenSaloonbanner.jpg', '09072023110640WomenSaloonimage.jpg', 'V29tZW4ncyBTYWxvb24=', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD4mbmJzcDs8L3A+DQo8aDI+V29tZW4ncyBTYWxvbjogVW53aW5kIGFuZCBFbmhhbmNlIFlvdXIgQmVhdXR5PC9oMj4NCjxwPkF0IG91ciB3b21lbidzIHNhbG9uLCB3ZSBhcmUgZGVkaWNhdGVkIHRvIHByb3ZpZGluZyBhbiBleGNlcHRpb25hbCBiZWF1dHkgZXhwZXJpZW5jZSB0YWlsb3JlZCBzcGVjaWZpY2FsbHkgZm9yIHdvbWVuLiBTdGVwIGludG8gb3VyIGx1eHVyaW91cyBzcGFjZSwgd2hlcmUgeW91J2xsIGJlIGdyZWV0ZWQgYnkgYSBzZXJlbmUgYW5kIGludml0aW5nIGF0bW9zcGhlcmUgZGVzaWduZWQgdG8gaGVscCB5b3UgcmVsYXggYW5kIHJlanV2ZW5hdGUuIFdpdGggYSB0ZWFtIG9mIHNraWxsZWQgcHJvZmVzc2lvbmFscyBhbmQgYSB3aWRlIHJhbmdlIG9mIHNlcnZpY2VzLCB3ZSBzdHJpdmUgdG8gbWFrZSBldmVyeSB2aXNpdCBhIG1lbW9yYWJsZSBvbmUuPC9wPg0KPGgzPkhhaXIgQ2FyZTo8L2gzPg0KPHA+T3VyIGV4cGVydCBzdHlsaXN0cyBhcmUgdHJhaW5lZCBpbiB0aGUgbGF0ZXN0IHRyZW5kcyBhbmQgdGVjaG5pcXVlcyB0byBnaXZlIHlvdSB0aGUgcGVyZmVjdCBoYWlyc3R5bGUuIFdoZXRoZXIgeW91J3JlIGxvb2tpbmcgZm9yIGEgc2ltcGxlIHRyaW0sIGEgYm9sZCBuZXcgY29sb3IsIG9yIGEgc3R1bm5pbmcgdXBkbyBmb3IgYSBzcGVjaWFsIG9jY2FzaW9uLCB3ZSBoYXZlIHlvdSBjb3ZlcmVkLiBXZSB1c2UgaGlnaC1xdWFsaXR5IHByb2R1Y3RzIHRvIGVuc3VyZSB5b3VyIGhhaXIgcmVjZWl2ZXMgdGhlIG5vdXJpc2htZW50IGl0IGRlc2VydmVzLjwvcD4NCjxoMz5Ta2luY2FyZTo8L2gzPg0KPHA+UGFtcGVyIHlvdXIgc2tpbiB3aXRoIG91ciBjb21wcmVoZW5zaXZlIHJhbmdlIG9mIHNraW5jYXJlIHRyZWF0bWVudHMuIEZyb20gcmVqdXZlbmF0aW5nIGZhY2lhbHMgdG8gZGVlcC1jbGVhbnNpbmcgbWFza3MsIG91ciBlc3RoZXRpY2lhbnMgd2lsbCBhbmFseXplIHlvdXIgc2tpbiB0eXBlIGFuZCBjdXN0b21pemUgYSByZWdpbWVuIHRvIGFkZHJlc3MgeW91ciB1bmlxdWUgbmVlZHMuIEV4cGVyaWVuY2UgdGhlIHVsdGltYXRlIGluIHJlbGF4YXRpb24gYXMgeW91IGluZHVsZ2UgaW4gYSBzb290aGluZyBmYWNpYWwgbWFzc2FnZSBhbmQgZW1lcmdlIHdpdGggYSByYWRpYW50IGdsb3cuPC9wPg0KPGgzPk5haWwgQ2FyZTo8L2gzPg0KPHA+VHJlYXQgeW91cnNlbGYgdG8gYSBtYW5pY3VyZSBhbmQgcGVkaWN1cmUgdGhhdCB3aWxsIGxlYXZlIHlvdXIgbmFpbHMgbG9va2luZyBmbGF3bGVzcy4gT3VyIHRhbGVudGVkIG5haWwgdGVjaG5pY2lhbnMgd2lsbCBwYW1wZXIgeW91ciBoYW5kcyBhbmQgZmVldCwgc2hhcGluZyBhbmQgYnVmZmluZyB5b3VyIG5haWxzIHRvIHBlcmZlY3Rpb24uIENob29zZSBmcm9tIGFuIGFycmF5IG9mIHZpYnJhbnQgbmFpbCBjb2xvcnMgb3Igb3B0IGZvciBlbGVnYW50IG5haWwgYXJ0IHRvIGV4cHJlc3MgeW91ciBwZXJzb25hbCBzdHlsZS48L3A+DQo8aDM+TWFrZXVwOjwvaDM+DQo8cD5XaGV0aGVyIHlvdSdyZSBwcmVwYXJpbmcgZm9yIGEgc3BlY2lhbCBldmVudCBvciBzaW1wbHkgd2FudCB0byBlbmhhbmNlIHlvdXIgbmF0dXJhbCBiZWF1dHksIG91ciBtYWtldXAgYXJ0aXN0cyBhcmUgaGVyZSB0byBoZWxwLiBVc2luZyBwcmVtaXVtIGNvc21ldGljcywgd2UnbGwgY3JlYXRlIGEgbG9vayB0aGF0IGFjY2VudHVhdGVzIHlvdXIgYmVzdCBmZWF0dXJlcyBhbmQgY29tcGxlbWVudHMgeW91ciB1bmlxdWUgc2tpbiB0b25lLiBGcm9tIHNvZnQgYW5kIG5hdHVyYWwgdG8gYm9sZCBhbmQgZ2xhbW9yb3VzLCB3ZSdsbCBtYWtlIHlvdSBmZWVsIGxpa2UgYSBzdGFyLjwvcD4NCjxwPiZuYnNwOzwvcD4NCjxwPlNwYSBUcmVhdG1lbnRzOiBJbmR1bGdlIGluIHB1cmUgYmxpc3Mgd2l0aCBvdXIgc2VsZWN0aW9uIG9mIHNwYSB0cmVhdG1lbnRzLiBGcm9tIHNvb3RoaW5nIG1hc3NhZ2VzIHRoYXQgbWVsdCBhd2F5IHRlbnNpb24gdG8gaW52aWdvcmF0aW5nIGJvZHkgc2NydWJzIHRoYXQgbGVhdmUgeW91ciBza2luIHNpbGt5IHNtb290aCwgb3VyIHNwYSB0aGVyYXBpc3RzIHdpbGwgdHJhbnNwb3J0IHlvdSB0byBhIHN0YXRlIG9mIHV0dGVyIHJlbGF4YXRpb24uIFVud2luZCBpbiBvdXIgdHJhbnF1aWwgc3BhIGVudmlyb25tZW50IGFuZCBsZXQgdGhlIHN0cmVzcyBvZiB0aGUgZGF5IG1lbHQgYXdheS48L3A+DQo8cD4mbmJzcDs8L3A+DQo8cD5BdCBvdXIgd29tZW4ncyBzYWxvbiwgd2UgcHJpb3JpdGl6ZSB5b3VyIGNvbWZvcnQsIHdlbGwtYmVpbmcsIGFuZCBzYXRpc2ZhY3Rpb24gYWJvdmUgYWxsIGVsc2UuIE91ciB0ZWFtIG9mIHByb2Zlc3Npb25hbHMgaXMgcGFzc2lvbmF0ZSBhYm91dCB0aGVpciBjcmFmdCBhbmQgZGVkaWNhdGVkIHRvIHByb3ZpZGluZyB5b3Ugd2l0aCB0aGUgaGlnaGVzdCBsZXZlbCBvZiBzZXJ2aWNlLiBTdGVwIGludG8gb3VyIHNhbmN0dWFyeSBvZiBiZWF1dHkgYW5kIGxldCB1cyBoZWxwIHlvdSBsb29rIGFuZCBmZWVsIHlvdXIgYWJzb2x1dGUgYmVzdC48L3A+DQo8L2JvZHk+DQo8L2h0bWw+', 0, 0, '', '', '', '', 3),
(9, 'Handyman &amp; Maintenance', 'handyman-maintenance', '09072023105208wrench.png', 'Tm93IGJvb2sgdGhlIGhhbmR5bWFuICYgbWFpbnRlbmFuY2UgYXQgaG9tZSBzZXJ2aWNlIGluIDYwIHNlY29uZHMu', '09072023105208HandymanandMaintenanceServicesbanner.jpg', '09072023105208HandymanandMaintenanceServicesimage.jpg', 'SGFuZHltYW4gYW5kIE1haW50ZW5hbmNlIFNlcnZpY2Vz', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8aDI+UHJvZmVzc2lvbmFsIFNvbHV0aW9ucyBmb3IgWW91ciBIb21lIG9yIEJ1c2luZXNzPC9oMj4NCjxwPk91ciBoYW5keW1hbiBhbmQgbWFpbnRlbmFuY2Ugc2VydmljZXMgb2ZmZXIgcHJvZmVzc2lvbmFsIHNvbHV0aW9ucyB0byBtZWV0IGFsbCB5b3VyIHJlcGFpciwgbWFpbnRlbmFuY2UsIGFuZCBpbXByb3ZlbWVudCBuZWVkcy4gV2hldGhlciB5b3UgYXJlIGEgaG9tZW93bmVyIG9yIGEgYnVzaW5lc3Mgb3duZXIsIG91ciBza2lsbGVkIGFuZCBleHBlcmllbmNlZCB0ZWFtIGlzIGhlcmUgdG8gcHJvdmlkZSByZWxpYWJsZSBhbmQgZWZmaWNpZW50IHNlcnZpY2VzIHRvIGtlZXAgeW91ciBwcm9wZXJ0eSBpbiB0b3AgY29uZGl0aW9uLjwvcD4NCjxwPiZuYnNwOzwvcD4NCjxoMz5Db21wcmVoZW5zaXZlIFJlcGFpcnMgYW5kIEluc3RhbGxhdGlvbnM8L2gzPg0KPHA+RnJvbSBtaW5vciByZXBhaXJzIHRvIG1ham9yIHJlbm92YXRpb25zLCBvdXIgaGFuZHltYW4gc2VydmljZXMgY292ZXIgYSB3aWRlIHJhbmdlIG9mIHRhc2tzIHRvIGVuc3VyZSB5b3VyIHByb3BlcnR5IHN0YXlzIGluIGV4Y2VsbGVudCBzaGFwZS4gV2Ugc3BlY2lhbGl6ZSBpbiBoYW5kbGluZyB2YXJpb3VzIHJlcGFpciBwcm9qZWN0cywgc3VjaCBhcyBmaXhpbmcgbGVha3kgZmF1Y2V0cywgcmVwYWlyaW5nIGVsZWN0cmljYWwgb3V0bGV0cywgcGF0Y2hpbmcgZHJ5d2FsbCwgYW5kIG11Y2ggbW9yZS4gQWRkaXRpb25hbGx5LCB3ZSBwcm92aWRlIGV4cGVydCBpbnN0YWxsYXRpb25zIGZvciBhcHBsaWFuY2VzLCBmaXh0dXJlcywgYW5kIGVxdWlwbWVudCwgZW5zdXJpbmcgZXZlcnl0aGluZyBpcyBzZXQgdXAgY29ycmVjdGx5IGFuZCBmdW5jdGlvbmluZyBvcHRpbWFsbHkuPC9wPg0KPHA+Jm5ic3A7PC9wPg0KPGgzPlJvdXRpbmUgTWFpbnRlbmFuY2UgYW5kIEluc3BlY3Rpb25zPC9oMz4NCjxwPlJlZ3VsYXIgbWFpbnRlbmFuY2UgaXMgdml0YWwgZm9yIHByZXZlbnRpbmcgY29zdGx5IHJlcGFpcnMgYW5kIGVuc3VyaW5nIHRoZSBsb25nZXZpdHkgb2YgeW91ciBwcm9wZXJ0eS4gT3VyIG1haW50ZW5hbmNlIHNlcnZpY2VzIGVuY29tcGFzcyBzY2hlZHVsZWQgaW5zcGVjdGlvbnMgYW5kIHVwa2VlcCB0YXNrcyB0byBpZGVudGlmeSBhbnkgcG90ZW50aWFsIGlzc3VlcyBlYXJseSBvbiBhbmQgYWRkcmVzcyB0aGVtIHByb21wdGx5LiBGcm9tIGNoZWNraW5nIEhWQUMgc3lzdGVtcywgcGx1bWJpbmcsIGFuZCBlbGVjdHJpY2FsIHN5c3RlbXMgdG8gbWFpbnRhaW5pbmcgbGFuZHNjYXBpbmcgYW5kIGNsZWFuaW5nIGd1dHRlcnMsIG91ciB0ZWFtIHdpbGwga2VlcCB5b3VyIHByb3BlcnR5IGluIG9wdGltYWwgY29uZGl0aW9uIHllYXItcm91bmQuPC9wPg0KPHA+Jm5ic3A7PC9wPg0KPGgzPlBhaW50aW5nIGFuZCBDYXJwZW50cnkgU2VydmljZXM8L2gzPg0KPHA+RW5oYW5jZSB0aGUgYWVzdGhldGljIGFwcGVhbCBvZiB5b3VyIHNwYWNlIHdpdGggb3VyIHBhaW50aW5nIGFuZCBjYXJwZW50cnkgc2VydmljZXMuIE91ciBza2lsbGVkIGNyYWZ0c21lbiBjYW4gdHJhbnNmb3JtIGFueSByb29tIHdpdGggYSBmcmVzaCBjb2F0IG9mIHBhaW50LCBwcm92aWRpbmcgYSBjbGVhbiBhbmQgdXBkYXRlZCBsb29rLiBBZGRpdGlvbmFsbHksIHdlIG9mZmVyIGN1c3RvbSBjYXJwZW50cnkgc29sdXRpb25zLCBpbmNsdWRpbmcgY2FiaW5ldHJ5LCBzaGVsdmluZywgbW9sZGluZywgYW5kIHRyaW0gd29yaywgdGFpbG9yZWQgdG8geW91ciBzcGVjaWZpYyBuZWVkcyBhbmQgcHJlZmVyZW5jZXMuPC9wPg0KPHA+Jm5ic3A7PC9wPg0KPGgzPkVtZXJnZW5jeSBSZXBhaXJzIGFuZCAyNC83IFN1cHBvcnQ8L2gzPg0KPHA+V2UgdW5kZXJzdGFuZCB0aGF0IGVtZXJnZW5jaWVzIGNhbiBoYXBwZW4gYXQgYW55IHRpbWUsIGFuZCBwcm9tcHQgYWN0aW9uIGlzIGNydWNpYWwgdG8gcHJldmVudCBmdXJ0aGVyIGRhbWFnZS4gVGhhdCdzIHdoeSBvdXIgaGFuZHltYW4gYW5kIG1haW50ZW5hbmNlIHNlcnZpY2VzIHByb3ZpZGUgZW1lcmdlbmN5IHJlcGFpcnMgYW5kIHJvdW5kLXRoZS1jbG9jayBzdXBwb3J0LiBXaGV0aGVyIGl0J3MgYSBidXJzdCBwaXBlLCBhIHBvd2VyIG91dGFnZSwgb3IgYSBzZWN1cml0eSBpc3N1ZSwgb3VyIHRlYW0gaXMgYXZhaWxhYmxlIHRvIGFkZHJlc3MgeW91ciB1cmdlbnQgbmVlZHMsIGVuc3VyaW5nIHlvdXIgc2FmZXR5IGFuZCBtaW5pbWl6aW5nIHBvdGVudGlhbCByaXNrcy48L3A+DQo8cD4mbmJzcDs8L3A+DQo8aDM+UmVsaWFibGUgYW5kIFRydXN0d29ydGh5IFByb2Zlc3Npb25hbHM8L2gzPg0KPHA+V2hlbiB5b3UgY2hvb3NlIG91ciBoYW5keW1hbiBhbmQgbWFpbnRlbmFuY2Ugc2VydmljZXMsIHlvdSBjYW4gZXhwZWN0IHJlbGlhYmlsaXR5LCBwcm9mZXNzaW9uYWxpc20sIGFuZCB0cnVzdHdvcnRoaW5lc3MuIE91ciB0ZWFtIGNvbnNpc3RzIG9mIHNraWxsZWQgdGVjaG5pY2lhbnMgd2hvIGFyZSBleHBlcmllbmNlZCBpbiB0aGVpciByZXNwZWN0aXZlIGZpZWxkcy4gVGhleSBhcmUgY29tbWl0dGVkIHRvIGRlbGl2ZXJpbmcgaGlnaC1xdWFsaXR5IHdvcmttYW5zaGlwLCBhZGhlcmluZyB0byBpbmR1c3RyeSBzdGFuZGFyZHMsIGFuZCBwcm92aWRpbmcgZXhjZXB0aW9uYWwgY3VzdG9tZXIgc2VydmljZS4gWW91IGNhbiByZWx5IG9uIHVzIHRvIGNvbXBsZXRlIHlvdXIgcHJvamVjdHMgZWZmaWNpZW50bHksIHdpdGggYXR0ZW50aW9uIHRvIGRldGFpbCBhbmQgYSBmb2N1cyBvbiBleGNlZWRpbmcgeW91ciBleHBlY3RhdGlvbnMuPC9wPg0KPHA+Jm5ic3A7PC9wPg0KPHA+Q29udGFjdCB1cyB0b2RheSB0byBkaXNjdXNzIHlvdXIgaGFuZHltYW4gYW5kIG1haW50ZW5hbmNlIG5lZWRzLiBPdXIgdGVhbSBpcyByZWFkeSB0byBhc3Npc3QgeW91IGFuZCBlbnN1cmUgeW91ciBwcm9wZXJ0eSByZWNlaXZlcyB0aGUgY2FyZSBpdCBkZXNlcnZlcy48L3A+DQo8L2JvZHk+DQo8L2h0bWw+', 0, 0, '', '', '', '', 5),
(11, 'Software House', 'softwarehouse', '22072023053047software.png', 'U29mdHdhcmUgSG91c2UgU2VydmljZXM=', '22072023053349custom-software-development-min-1536x1057.jpg', '22072023053428custom-software-development-min-1536x1057.jpg', 'U29mdHdhcmUgSG91c2U=', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8ZGl2Pg0KPGRpdj4NCjxkaXY+DQo8ZGl2Pg0KPGRpdj4NCjxkaXY+DQo8cD5JbnRyb2R1Y3Rpb246PC9wPg0KPHA+V2VsY29tZSB0byBrdyBzZXJ2aWNlcyBTb2Z0d2FyZSBIb3VzZSwgd2hlcmUgY3V0dGluZy1lZGdlIHRlY2hub2xvZ3kgbWVldHMgY3JlYXRpdmUgbWluZHMuIEF0IGt3IHNlcnZpY2VzLCB3ZSBzdHJpdmUgdG8gYmUgdGhlIGRyaXZpbmcgZm9yY2UgYmVoaW5kIHlvdXIgYnVzaW5lc3MncyBzdWNjZXNzLCB0cmFuc2Zvcm1pbmcgeW91ciBpZGVhcyBpbnRvIHJlYWxpdHkgdGhyb3VnaCB0YWlsb3JlZCBzb2Z0d2FyZSBzb2x1dGlvbnMuIE91ciB0ZWFtIG9mIHNraWxsZWQgZGV2ZWxvcGVycywgZGVzaWduZXJzLCBhbmQgc3RyYXRlZ2lzdHMgaXMgZGVkaWNhdGVkIHRvIGVtcG93ZXJpbmcgaW5ub3ZhdGlvbnMgdGhhdCBmdWVsIHlvdXIgZ3Jvd3RoLCBzdHJlYW1saW5lIG9wZXJhdGlvbnMsIGFuZCBlbmhhbmNlIGN1c3RvbWVyIGV4cGVyaWVuY2VzLjwvcD4NCjxwPkF0IGt3IHNlcnZpY2VzIFNvZnR3YXJlIEhvdXNlLCBvdXIgdmlzaW9uIGlzIHRvIGNyZWF0ZSBhIHdvcmxkIHdoZXJlIGJ1c2luZXNzZXMgY2FuIHRocml2ZSBieSBoYXJuZXNzaW5nIHRoZSBwb3dlciBvZiB0ZWNobm9sb2d5LiBXZSBhcmUgY29tbWl0dGVkIHRvIGRlbGl2ZXJpbmcgZXhjZXB0aW9uYWwgc29sdXRpb25zIHRoYXQgYWxpZ24gd2l0aCBvdXIgY29yZSB2YWx1ZXM6PC9wPg0KPG9sPg0KPGxpPg0KPHA+SW5ub3ZhdGlvbjogV2UgZW1icmFjZSBlbWVyZ2luZyB0ZWNobm9sb2dpZXMgYW5kIGNvbnRpbnVvdXNseSBwdXNoIHRoZSBib3VuZGFyaWVzIG9mIHdoYXQncyBwb3NzaWJsZSB0byBwcm92aWRlIG91ciBjbGllbnRzIHdpdGggZm9yd2FyZC10aGlua2luZyBzb2x1dGlvbnMuPC9wPg0KPC9saT4NCjxsaT4NCjxwPkNvbGxhYm9yYXRpb246IFdlIGJlbGlldmUgaW4gZm9zdGVyaW5nIHN0cm9uZyBwYXJ0bmVyc2hpcHMgd2l0aCBvdXIgY2xpZW50cywgd29ya2luZyBoYW5kLWluLWhhbmQgdG8gdW5kZXJzdGFuZCB0aGVpciB1bmlxdWUgbmVlZHMgYW5kIGRlbGl2ZXIgdGFpbG9yZWQgc29sdXRpb25zLjwvcD4NCjwvbGk+DQo8bGk+DQo8cD5RdWFsaXR5OiBPdXIgdGVhbSB0YWtlcyBwcmlkZSBpbiBtYWludGFpbmluZyB0aGUgaGlnaGVzdCBzdGFuZGFyZHMgb2YgcXVhbGl0eSBpbiBldmVyeSBwcm9qZWN0IHdlIHVuZGVydGFrZSwgZW5zdXJpbmcgdGhhdCBvdXIgY2xpZW50cyByZWNlaXZlIHJlbGlhYmxlIGFuZCByb2J1c3Qgc29mdHdhcmUuPC9wPg0KPC9saT4NCjwvb2w+DQo8cD5TZWN0aW9uIDI6IE91ciBTZXJ2aWNlczwvcD4NCjxvbD4NCjxsaT4NCjxwPkN1c3RvbSBTb2Z0d2FyZSBEZXZlbG9wbWVudDogT3VyIHRlYW0gc3BlY2lhbGl6ZXMgaW4gY3JhZnRpbmcgYmVzcG9rZSBzb2Z0d2FyZSBzb2x1dGlvbnMgdGhhdCBjYXRlciBzcGVjaWZpY2FsbHkgdG8geW91ciBidXNpbmVzcyByZXF1aXJlbWVudHMuIEZyb20gd2ViIGFwcGxpY2F0aW9ucyB0byBtb2JpbGUgYXBwcyBhbmQgZW50ZXJwcmlzZSBzb2Z0d2FyZSwgd2UndmUgZ290IHlvdSBjb3ZlcmVkLjwvcD4NCjwvbGk+DQo8bGk+DQo8cD5VSS9VWCBEZXNpZ246IFdlIGNyZWF0ZSBpbnR1aXRpdmUgYW5kIHZpc3VhbGx5IGFwcGVhbGluZyB1c2VyIGludGVyZmFjZXMgdGhhdCBlbmhhbmNlIHVzZXIgZXhwZXJpZW5jZXMgYW5kIGRyaXZlIGVuZ2FnZW1lbnQuPC9wPg0KPC9saT4NCjxsaT4NCjxwPkNsb3VkIFNvbHV0aW9uczogRW1icmFjZSB0aGUgZmxleGliaWxpdHkgYW5kIHNjYWxhYmlsaXR5IG9mIGNsb3VkIHRlY2hub2xvZ3kgd2l0aCBvdXIgY2xvdWQtYmFzZWQgc29sdXRpb25zLCBlbnN1cmluZyBzZWFtbGVzcyBhY2Nlc3MgYW5kIGRhdGEgc2VjdXJpdHkuPC9wPg0KPC9saT4NCjxsaT4NCjxwPkFJIGFuZCBNYWNoaW5lIExlYXJuaW5nOiBVbmxvY2sgdGhlIHBvdGVudGlhbCBvZiBhcnRpZmljaWFsIGludGVsbGlnZW5jZSBhbmQgbWFjaGluZSBsZWFybmluZyB0byBnYWluIHZhbHVhYmxlIGluc2lnaHRzLCBhdXRvbWF0ZSBwcm9jZXNzZXMsIGFuZCBkZWxpdmVyIHBlcnNvbmFsaXplZCBleHBlcmllbmNlcy48L3A+DQo8L2xpPg0KPGxpPg0KPHA+U29mdHdhcmUgSW50ZWdyYXRpb246IFN0cmVhbWxpbmUgeW91ciB3b3JrZmxvd3MgYW5kIGltcHJvdmUgZWZmaWNpZW5jeSBieSBzZWFtbGVzc2x5IGludGVncmF0aW5nIG91ciBzb2x1dGlvbnMgd2l0aCB5b3VyIGV4aXN0aW5nIHN5c3RlbXMuPC9wPg0KPC9saT4NCjxsaT4NCjxwPlJlcXVpcmVtZW50IEFuYWx5c2lzOiBXZSBiZWdpbiBlYWNoIHByb2plY3QgYnkgdGhvcm91Z2hseSB1bmRlcnN0YW5kaW5nIHlvdXIgZ29hbHMsIGNoYWxsZW5nZXMsIGFuZCB2aXNpb24uIFRoaXMgYWxsb3dzIHVzIHRvIGNyZWF0ZSBhIGNvbXByZWhlbnNpdmUgcm9hZG1hcCBmb3IgeW91ciBzb2Z0d2FyZSBzb2x1dGlvbi48L3A+DQo8L2xpPg0KPGxpPg0KPHA+QWdpbGUgRGV2ZWxvcG1lbnQ6IE91ciBkZXZlbG9wbWVudCBwcm9jZXNzIGZvbGxvd3MgQWdpbGUgbWV0aG9kb2xvZ2llcywgZW5zdXJpbmcgaXRlcmF0aXZlIHByb2dyZXNzLCBjb250aW51b3VzIGZlZWRiYWNrLCBhbmQgYWRhcHRhYmlsaXR5IHRvIGNoYW5naW5nIHJlcXVpcmVtZW50cy48L3A+DQo8L2xpPg0KPGxpPg0KPHA+UXVhbGl0eSBBc3N1cmFuY2U6IFJpZ29yb3VzIHRlc3RpbmcgYW5kIHF1YWxpdHkgY2hlY2tzIGFyZSBhbiBpbnRlZ3JhbCBwYXJ0IG9mIG91ciBkZXZlbG9wbWVudCBwcm9jZXNzIHRvIGRlbGl2ZXIgYSBidWctZnJlZSBhbmQgcmVsaWFibGUgcHJvZHVjdC48L3A+DQo8L2xpPg0KPGxpPg0KPHA+UG9zdC1MYXVuY2ggU3VwcG9ydDogT3VyIHN1cHBvcnQgZG9lc24ndCBlbmQgd2l0aCB0aGUgbGF1bmNoIG9mIHlvdXIgc29mdHdhcmUuIFdlIHByb3ZpZGUgb25nb2luZyBtYWludGVuYW5jZSBhbmQgc3VwcG9ydCB0byBlbnN1cmUgeW91ciBzb2x1dGlvbiByZW1haW5zIHVwLXRvLWRhdGUgYW5kIGZ1bmN0aW9uYWwuPC9wPg0KPC9saT4NCjwvb2w+DQo8cD5TZWN0aW9uIDQ6IFN1Y2Nlc3MgU3RvcmllczwvcD4NCjxwPldlIHRha2UgcHJpZGUgaW4gb3VyIHBvcnRmb2xpbyBvZiBzdWNjZXNzZnVsIGNvbGxhYm9yYXRpb25zIHdpdGggdmFyaW91cyBidXNpbmVzc2VzIGZyb20gZGl2ZXJzZSBpbmR1c3RyaWVzLiBIZXJlIGFyZSBhIGZldyBleGFtcGxlcyBvZiBob3cgWFlaIFNvZnR3YXJlIEhvdXNlIGhhcyBtYWRlIGEgcG9zaXRpdmUgaW1wYWN0OjwvcD4NCjx1bD4NCjxsaT4NCjxwPkEgcmV0YWlsIGdpYW50IGV4cGVyaWVuY2VkIGEgc2lnbmlmaWNhbnQgYm9vc3QgaW4gb25saW5lIHNhbGVzIGFuZCBjdXN0b21lciByZXRlbnRpb24gYWZ0ZXIgaW1wbGVtZW50aW5nIG91ciBBSS1wb3dlcmVkIHJlY29tbWVuZGF0aW9uIGVuZ2luZS48L3A+DQo8L2xpPg0KPGxpPg0KPHA+QSBoZWFsdGhjYXJlIHN0YXJ0dXAgc3RyZWFtbGluZWQgaXRzIHBhdGllbnQgbWFuYWdlbWVudCBzeXN0ZW0sIHJlc3VsdGluZyBpbiBpbXByb3ZlZCBlZmZpY2llbmN5IGFuZCByZWR1Y2VkIGFkbWluaXN0cmF0aXZlIGJ1cmRlbi48L3A+DQo8L2xpPg0KPGxpPg0KPHA+QW4gZWR1Y2F0aW9uYWwgaW5zdGl0dXRpb24gZW5oYW5jZWQgaXRzIGUtbGVhcm5pbmcgcGxhdGZvcm0sIHByb3ZpZGluZyBhIHNlYW1sZXNzIGxlYXJuaW5nIGV4cGVyaWVuY2UgZm9yIHN0dWRlbnRzIHdvcmxkd2lkZS4gV2hldGhlciB5b3UgYXJlIGEgc3RhcnR1cCBzZWVraW5nIHRvIGRpc3J1cHQgdGhlIG1hcmtldCBvciBhbiBlc3RhYmxpc2hlZCBlbnRlcnByaXNlIGFpbWluZyB0byBvcHRpbWl6ZSBvcGVyYXRpb25zLCBYWVogU29mdHdhcmUgSG91c2UgaXMgaGVyZSB0byBzdXBwb3J0IHlvdXIgam91cm5leSB0byBzdWNjZXNzLiBMZXQncyBqb2luIGZvcmNlcyBhbmQgdW5sb2NrIHRoZSB0cnVlIHBvdGVudGlhbCBvZiB5b3VyIGJ1c2luZXNzIHRocm91Z2ggaW5ub3ZhdGl2ZSBzb2Z0d2FyZSBzb2x1dGlvbnMuIEdldCBpbiB0b3VjaCB3aXRoIHVzIHRvZGF5IGFuZCBsZXQgdGhlIHRyYW5zZm9ybWF0aW9uIGJlZ2luITwvcD4NCjwvbGk+DQo8bGk+d2UgYXJlIHByb3ZpZGluZyBvdGhlciBzZXJ2aWNlcyBhcyB3ZWxsPC9saT4NCjxsaT5XRUIgREVWRUxPUE1FTlQ8L2xpPg0KPGxpPkdSQVBISUMgREVTSUdOPC9saT4NCjxsaT4yRCBBTklNQVRJT048L2xpPg0KPGxpPjNEIEFOSU1BVElPTjwvbGk+DQo8bGk+U09GVFdBUkUgREVWRUxPUE1FTlQ8L2xpPg0KPGxpPkRJR0lUQUwgTUFSS0VUSU5HPC9saT4NCjxsaT5TT0NJQUxNRURJQSBNQVJLRVRJTkc8L2xpPg0KPGxpPkZJTE0gVklERU8gTUFLSU5HIEFORCBBRERJTkc8L2xpPg0KPGxpPldFQlNJVEUgREVTSUdOSU5HPC9saT4NCjxsaT5VSSAvIFVYIERFU0lHTklORzwvbGk+DQo8bGk+TU9CSUxFIEFQUCBERVZFTE9QTUVOVDwvbGk+DQo8L3VsPg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9kaXY+DQo8L2Rpdj4NCjwvZGl2Pg0KPC9ib2R5Pg0KPC9odG1sPg==', 24, 10, '', '500', '503', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `webiste_name` varchar(255) NOT NULL,
  `website_favicon` varchar(255) NOT NULL,
  `website_footer_logo` varchar(255) NOT NULL,
  `website_header_logo` varchar(255) NOT NULL,
  `website_address` text NOT NULL,
  `website_email` varchar(255) NOT NULL,
  `website_phone` varchar(255) NOT NULL,
  `paypal_client_id` text NOT NULL,
  `paypal_secret_id` text NOT NULL,
  `website_short_desc` text NOT NULL,
  `website_long_desc` longtext NOT NULL,
  `website_domain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `webiste_name`, `website_favicon`, `website_footer_logo`, `website_header_logo`, `website_address`, `website_email`, `website_phone`, `paypal_client_id`, `paypal_secret_id`, `website_short_desc`, `website_long_desc`, `website_domain`) VALUES
(1, 'KW Services.W.l.l', 'favicon.png', 'footer-logo.png', 'header-logo.png', 'Flate 51 building 1301 Road 4526 block 345 Al juffair', 'noorkashan1989@gmail.com', '+973 34025600', '', '', 'V2UgaGVscCBhZ2VuY2llcyB0byBkZWZpbmUgdGhlaXIgbmV3IGJ1c2luZXNzIG9iamVjdGl2ZXMgYW5kIHRoZW4gY3JlYXRlIHRoZSByb2FkIG1hcCB0byBnZXQgdGhlbSB0aGVyZSBieSBkZXZpc2luZyBhIGJ1c2luZXNzLiBXZSBoZWxwIGFnZW5jaWVzIHRvIGRlZmluZSB0aGVpciBuZXcgYnVzaW5lc3Mu', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cCBzdHlsZT0iYm94LXNpemluZzogYm9yZGVyLWJveDsgbWFyZ2luLXRvcDogMHB4OyBtYXJnaW4tYm90dG9tOiAxcmVtOyBjb2xvcjogI2ZmZmZmZjsgZm9udC1zaXplOiAxNXB4OyBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmZmZmOyBmb250LWZhbWlseTogJ09wZW4gU2FucycsIHNhbnMtc2VyaWYgIWltcG9ydGFudDsgdGV4dC1hbGlnbjoganVzdGlmeSAhaW1wb3J0YW50OyI+PHNwYW4gc3R5bGU9ImNvbG9yOiAjMDAwMDAwOyI+RGlzY2xhaW1lcjo8L3NwYW4+PC9wPg0KPHAgc3R5bGU9ImJveC1zaXppbmc6IGJvcmRlci1ib3g7IG1hcmdpbi10b3A6IDBweDsgbWFyZ2luLWJvdHRvbTogMXJlbTsgY29sb3I6ICNmZmZmZmY7IGZvbnQtc2l6ZTogMTVweDsgYmFja2dyb3VuZC1jb2xvcjogI2ZmZmZmZjsgZm9udC1mYW1pbHk6ICdPcGVuIFNhbnMnLCBzYW5zLXNlcmlmICFpbXBvcnRhbnQ7IHRleHQtYWxpZ246IGp1c3RpZnkgIWltcG9ydGFudDsiPjxzcGFuIHN0eWxlPSJjb2xvcjogIzAwMDAwMDsiPlRoZSBvbmx5IG93bmVyIG9mIHRoZSBsb2dvLCBwb3J0Zm9saW8sIHBpY3R1cmVzLCBhbmQgbWF0ZXJpYWwgaXMgV2ViYnVsbHMuIFRoZSBjb21wYW55IG5hbWVzLCBicmFuZCBuYW1lcywgYW5kIHRyYWRlbWFya3Mgb2YgdGhpcmQgcGFydGllcyB0aGF0IGFyZSBtZW50aW9uZWQgb24gdGhpcyB3ZWJzaXRlIGJlbG9uZyB0byB0aGVpciByZXNwZWN0aXZlIG93bmVycy4gSW4gYWRkaXRpb24sIGRlc3BpdGUgYmVpbmcgYSBncmFwaGljIGRlc2lnbiBzdHVkaW8sIFdlYmJ1bGxzIGhhcyBubyBjb250cm9sIG92ZXIgdGhlIG91dHNpZGUgY29udGVudCB0aGF0IGlzIHByZXNlbnRlZCBvbiB0aGUgd2Vic2l0ZS4gQXMgYSByZXN1bHQsIGFueSBzaW1pbGFyaXR5IHRvIG90aGVyIGNvbnRlbnQgb24gdGhlIHdlYiBpcyBub3Qgb3VyIGZhdWx0IGVpdGhlci4gVGhlIG5hbWVzLCBkZXNpZ25zLCBmdW5jdGlvbmFsaXR5LCBjb250ZW50LCBhbmQgc3RhdHMvZmFjdHMgaW4gdGhlc2UgcG9ydGZvbGlvcyBhbmQgY2FzZSBzdHVkaWVzIG1heSBub3QgbWF0Y2ggdGhvc2UgaW4gdGhlIGFjdHVhbCBwcm9qZWN0czsgdGhleSBhcmUgcmVhbCBidXQgZXhlbXBsYXJ5IChmb3IgYmV0dGVyIGNvbXByZWhlbnNpb24pLiBUaGlzIGlzIGJlY2F1c2UgV2ViYnVsbHMgaGFzIGEgc3RyaW5nZW50IE5EQSBwb2xpY3kuPC9zcGFuPjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 'secureyourlife.com');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `heading`, `description`, `image`) VALUES
(3, 'Cleanhome success in every projects', 'QSBDbGVhbmluZyBjb21wYW55IHNlcnZpY2VzIHByb3ZpZGUgcHJvZmVzc2lvbmFsIHNlcnZpY2VzLg==', '07072023202622adobestock_106220748.jpeg'),
(4, 'Cleanhome success in every projects', 'QSBDbGVhbmluZyBjb21wYW55IHNlcnZpY2VzIHByb3ZpZGUgcHJvZmVzc2lvbmFsIHNlcnZpY2VzLg==', '070720232018406.jpg'),
(5, 'Cleanhome success in every projects', 'QSBDbGVhbmluZyBjb21wYW55IHNlcnZpY2VzIHByb3ZpZGUgcHJvZmVzc2lvbmFsIHNlcnZpY2VzLg==', '07072023202551Fotolia_137053984_Subscription_Monthly_M.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `fb_link`, `instagram_link`, `twitter_link`, `linkedin_link`, `youtube_link`) VALUES
(1, '', 'https://instagram.com/kashifaraen?igshid=MzNlNGNkZWQ4Mg==', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `designation` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `description`, `designation`, `user_id`) VALUES
(1, '09072023131443JohnSmith.jpg', 'John Smith', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5LVyBTZXJ2aWNlcyBoYXMgYmVlbiBhIGNydWNpYWwgcGFydG5lciBmb3Igb3VyIGNvbXBhbnkncyBkaWdpdGFsIG1hcmtldGluZyBpbml0aWF0aXZlcy4gVGhlaXIgZXhwZXJ0aXNlIGluIHNlYXJjaCBlbmdpbmUgb3B0aW1pemF0aW9uIChTRU8pIGFuZCBwYXktcGVyLWNsaWNrIChQUEMpIGNhbXBhaWducyBoYXMgc2lnbmlmaWNhbnRseSBpbXByb3ZlZCBvdXIgb25saW5lIHZpc2liaWxpdHkgYW5kIGdlbmVyYXRlZCBoaWdoLXF1YWxpdHkgbGVhZHMuIFRoZWlyIHByb2FjdGl2ZSBhcHByb2FjaCwgYXR0ZW50aW9uIHRvIGRldGFpbCwgYW5kIHRpbWVseSBjb21tdW5pY2F0aW9uIGhhdmUgbWFkZSB0aGVtIGFuIGludmFsdWFibGUgYXNzZXQgdG8gb3VyIG1hcmtldGluZyB0ZWFtLjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 'CEO, XYZ Corporation', 0),
(2, '09072023131657SarahJohnson.jpeg', 'Sarah Johnson', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5XZSBoYXZlIGJlZW4gd29ya2luZyB3aXRoIEtXIFNlcnZpY2VzIGZvciB0aGUgcGFzdCB5ZWFyLCBhbmQgdGhlaXIgd2ViIGRlc2lnbiBhbmQgZGV2ZWxvcG1lbnQgc2VydmljZXMgaGF2ZSBleGNlZWRlZCBvdXIgZXhwZWN0YXRpb25zLiBUaGV5IGNyZWF0ZWQgYSBtb2Rlcm4gYW5kIHVzZXItZnJpZW5kbHkgd2Vic2l0ZSB0aGF0IHBlcmZlY3RseSBjYXB0dXJlcyBvdXIgYnJhbmQgaW1hZ2UuIFRoZWlyIHRlYW0ncyBwcm9mZXNzaW9uYWxpc20sIGNyZWF0aXZpdHksIGFuZCBkZWRpY2F0aW9uIHRvIGRlbGl2ZXJpbmcgZXhjZXB0aW9uYWwgcmVzdWx0cyBoYXZlIG1hZGUgdGhlbSBvdXIgZ28tdG8gcGFydG5lciBmb3IgYWxsIG91ciBkaWdpdGFsIG5lZWRzLjwvcD4NCjwvYm9keT4NCjwvaHRtbD4=', 'Marketing Manager, ABC Enterprises', 0),
(3, '09072023131838DavidThompson.jpg', 'David Thompson', 'PCFET0NUWVBFIGh0bWw+DQo8aHRtbD4NCjxoZWFkPg0KPC9oZWFkPg0KPGJvZHk+DQo8cD5LVyBTZXJ2aWNlcyBoYXMgYmVlbiBpbnN0cnVtZW50YWwgaW4gYm9vc3Rpbmcgb3VyIG9ubGluZSBzYWxlcy4gVGhlaXIgZXhwZXJ0aXNlIGluIGUtY29tbWVyY2Ugb3B0aW1pemF0aW9uIGhhcyBoZWxwZWQgdXMgc3RyZWFtbGluZSBvdXIgd2Vic2l0ZSdzIHBlcmZvcm1hbmNlLCBpbXByb3ZlIHVzZXIgZXhwZXJpZW5jZSwgYW5kIGluY3JlYXNlIGNvbnZlcnNpb24gcmF0ZXMuIFRoZWlyIGRhdGEtZHJpdmVuIGFwcHJvYWNoLCBjb3VwbGVkIHdpdGggdGhlaXIgZGVlcCB1bmRlcnN0YW5kaW5nIG9mIHRoZSBpbmR1c3RyeSwgaGFzIHJlc3VsdGVkIGluIHRhbmdpYmxlIGJ1c2luZXNzIGdyb3d0aCBmb3Igb3VyIGNvbXBhbnkuPC9wPg0KPC9ib2R5Pg0KPC9odG1sPg==', 'E-commerce Manager, DEF Retail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`, `role`, `status`) VALUES
(1, 'Ashir', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'default.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `website_seo`
--

CREATE TABLE `website_seo` (
  `id` int(11) NOT NULL,
  `link` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_seo`
--

INSERT INTO `website_seo` (`id`, `link`, `title`, `description`) VALUES
(1, 'index', 'Home', 'VGVzdGluZw=='),
(2, 'contact-us', 'Contact Us', ''),
(3, 'about-us', 'About Us', ''),
(4, 'services', 'Services\r\n', ''),
(5, 'blog', 'Blogs', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_orders`
--
ALTER TABLE `manual_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requ_orders`
--
ALTER TABLE `requ_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_seo`
--
ALTER TABLE `website_seo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manual_orders`
--
ALTER TABLE `manual_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requ_orders`
--
ALTER TABLE `requ_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_seo`
--
ALTER TABLE `website_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
