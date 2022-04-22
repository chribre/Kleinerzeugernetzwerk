-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 01:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kleinerzeugernetzwerk`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `token_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`token_id`, `user_id`, `token`, `created_time`) VALUES
(1, 16, 'AW03330105fca53fce97d87.49003284', '2020-12-04 15:21:32'),
(2, 16, 'AW03330105fca731fb5e856.97079431', '2020-12-04 17:34:23'),
(3, 16, 'AW03330105fcddb665bb8d9.90991896', '2020-12-07 07:36:06'),
(4, 16, 'AW03330105fcde8ba7deb20.27684961', '2020-12-07 08:32:58'),
(5, 16, 'AW03330105fce30cce97672.39648414', '2020-12-07 13:40:28'),
(6, 16, 'AW03330105fce4598a9aa41.65503189', '2020-12-07 15:09:12'),
(7, 16, 'AW03330105fcf30795e4762.52068078', '2020-12-08 07:51:21'),
(8, 16, 'AW03330105fd07dddc26a63.14003957', '2020-12-09 07:33:49'),
(9, 16, 'AW03330105fd08515ab4367.44310302', '2020-12-09 08:04:37'),
(10, 16, 'AW03330105fd09c31bac596.47292057', '2020-12-09 09:43:13'),
(11, 16, 'AW03330105fd2229d184e37.03329091', '2020-12-10 13:29:01'),
(12, 16, 'AW03330105fd37a10be2968.31721229', '2020-12-11 13:54:24'),
(13, 16, 'AW03330105fd4c926b55135.63044160', '2020-12-12 13:44:06'),
(14, 16, 'AW03330105fd4ff0c579cb7.40426128', '2020-12-12 17:34:04'),
(15, 16, 'AW03330105fd714d99aeb66.43884836', '2020-12-14 07:31:37'),
(16, 16, 'AW03330105fd7660bb84e68.59733998', '2020-12-14 13:18:03'),
(17, 16, 'AW03330105fd770f257f8a3.21193271', '2020-12-14 14:04:34'),
(18, 16, 'AW03330105fd775bdd26231.39235455', '2020-12-14 14:25:01'),
(19, 16, 'AW03330105fd9bc93d843a8.43535785', '2020-12-16 07:51:47'),
(21, 16, 'AW03330105fda1d03792459.65584962', '2020-12-16 14:43:15'),
(22, 16, 'AW03330105fdb56a3c31c20.24636917', '2020-12-17 13:01:23'),
(23, 16, 'AW03330105fdcad8240a0a0.54598902', '2020-12-18 13:24:18'),
(24, 16, 'AW03330105fddd5b2ec9d49.93435085', '2020-12-19 10:28:02'),
(25, 16, 'AW03330105fe056c527ed85.47332443', '2020-12-21 08:03:17'),
(26, 16, 'AW03330105fe0a5b6216ce1.60350281', '2020-12-21 13:40:06'),
(27, 16, 'AW03330105fe1b77d8f3892.65600463', '2020-12-22 09:08:13'),
(28, 16, 'AW03330105fe34ed43b1181.04079260', '2020-12-23 14:06:12'),
(29, 16, 'AW03330105fe35c5988b675.29594547', '2020-12-23 15:03:53'),
(30, 16, 'AW03330105fe9b948379179.73281716', '2020-12-28 10:54:00'),
(32, 16, 'AW03330105feb59b43634f1.03097853', '2020-12-29 16:30:44'),
(33, 16, 'AW03330105fed9ca80e4ef4.33584048', '2020-12-31 09:40:56'),
(36, 16, 'AW03330105ff06c4b3a7e72.76117348', '2021-01-02 12:51:23'),
(37, 16, 'AW03330105ff2d0d2012499.26691127', '2021-01-04 08:24:50'),
(38, 16, 'AW03330105ff42838c5de27.34204032', '2021-01-05 08:50:00'),
(39, 16, 'AW03330105ff483262684c7.75321198', '2021-01-05 15:17:58'),
(41, 16, 'AW03330105ff5bd0cc5b504.22825734', '2021-01-06 13:37:16'),
(42, 16, 'AW03330105ff714b1a74ae7.30617096', '2021-01-07 14:03:29'),
(43, 16, 'AW03330105ff83c0557e5d0.41936380', '2021-01-08 11:03:33'),
(44, 16, 'AW03330105ff98471103c55.06674635', '2021-01-09 10:24:49'),
(45, 16, 'AW03330105ffc0f1246e390.08545740', '2021-01-11 08:40:50'),
(48, 16, 'AW03330105ffd85c193f829.02032596', '2021-01-12 11:19:29'),
(49, 16, 'AW0333010600325aa1ba202.51485435', '2021-01-16 17:43:06'),
(50, 16, 'AW03330106005997ba3e0e3.80234296', '2021-01-18 14:21:47'),
(51, 16, 'AW03330106006ed92722fa1.69174825', '2021-01-19 14:32:50'),
(52, 16, 'AW03330106007faf647d739.69866651', '2021-01-20 09:42:14'),
(53, 16, 'AW0333010600ae31a2f7b49.99547157', '2021-01-22 14:37:14'),
(54, 16, 'AW0333010601abf1ee26ee6.88166678', '2021-02-03 15:19:58'),
(56, 16, 'AW0333010602117db84c407.40917277', '2021-02-08 10:52:11'),
(57, 16, 'AW0333010602166fe207aa1.32789634', '2021-02-08 16:29:50'),
(58, 16, 'AW0333010602548bc9c5c01.24245038', '2021-02-11 15:09:48'),
(60, 16, 'AW03330106026ac168de0c4.10265219', '2021-02-12 16:25:58'),
(61, 46, 'AW0333010602be086e18559.34402751', '2021-02-16 15:11:03'),
(62, 46, 'AW0333010602be0d0dc3f19.24344352', '2021-02-16 15:12:16'),
(63, 46, 'AW0333010602be1e383f7e6.59997523', '2021-02-16 15:16:51'),
(64, 46, 'AW0333010602be216a8b626.65343832', '2021-02-16 15:17:42'),
(65, 46, 'AW0333010602be2178a0ab2.89233252', '2021-02-16 15:17:43'),
(66, 46, 'AW0333010602be21abba394.49074993', '2021-02-16 15:17:46'),
(67, 46, 'AW0333010602be22bbac7f1.30667115', '2021-02-16 15:18:03'),
(70, 46, 'AW0333010602be8f4988916.19486170', '2021-02-16 15:47:00'),
(72, 46, 'AW0333010602be9867f0828.44611282', '2021-02-16 15:49:26'),
(73, 46, 'AW0333010602bf071c68001.80993787', '2021-02-16 16:18:57'),
(74, 46, 'AW0333010602bf082b475b4.52114262', '2021-02-16 16:19:14'),
(75, 46, 'AW0333010602bf083c4d776.20478565', '2021-02-16 16:19:15'),
(76, 46, 'AW0333010602bf084b45cd8.47060705', '2021-02-16 16:19:16'),
(77, 46, 'AW0333010602bf085978897.11799063', '2021-02-16 16:19:17'),
(78, 46, 'AW0333010602bf087225101.06295151', '2021-02-16 16:19:19'),
(79, 46, 'AW0333010602bf09daffbf4.85860037', '2021-02-16 16:19:41'),
(80, 46, 'AW0333010602bf0a41d9586.84754428', '2021-02-16 16:19:48'),
(83, 46, 'AW0333010602bf554aa0d82.83559021', '2021-02-16 16:39:48'),
(89, 46, 'AW0333010602c01dfe39e10.97236177', '2021-02-16 17:33:19'),
(90, 46, 'AW0333010602d25399ab633.98991090', '2021-02-17 14:16:25'),
(91, 46, 'AW0333010602d254eb33fc0.27802259', '2021-02-17 14:16:46'),
(92, 46, 'AW0333010602d255e1b7000.27173007', '2021-02-17 14:17:02'),
(93, 46, 'AW0333010602d37a0acf1c9.74544888', '2021-02-17 15:34:56'),
(94, 46, 'AW0333010602d37a8bb5007.22908752', '2021-02-17 15:35:04'),
(95, 46, 'AW0333010602d37b789d1a7.07774347', '2021-02-17 15:35:19'),
(96, 16, 'AW0333010602e72e914df44.74065577', '2021-02-18 14:00:09'),
(97, 47, 'AW0333010602e78ee2ec195.00007040', '2021-02-18 14:25:50'),
(98, 16, 'AW0333010602e951fd5d650.98720877', '2021-02-18 16:26:07'),
(99, 16, 'AW0333010602e954d0dec32.89125822', '2021-02-18 16:26:53'),
(100, 16, 'AW03330106033a619c29143.76416258', '2021-02-22 12:39:53'),
(101, 16, 'AW0333010603ca7b20cb440.99492883', '2021-03-01 08:37:06'),
(102, 16, 'AW0333010603cb6b9351a35.63444566', '2021-03-01 09:41:13'),
(103, 16, 'DESKTOP-K1GQ9RH60437964eefcc0.82977263', '2021-03-06 12:45:24'),
(104, 16, 'AW033301060460a0b840aa7.22438129', '2021-03-08 11:27:07'),
(105, 16, 'AW033301060461a2fa3aa49.55906955', '2021-03-08 12:35:59'),
(106, 16, 'AW0333010604f2ca7528010.40973882', '2021-03-15 09:45:11'),
(107, 16, 'AW033301060533d75221ed5.51353841', '2021-03-18 11:45:57'),
(108, 48, 'AW0333010605c956a652670.74651197', '2021-03-25 13:51:38'),
(109, 16, 'AW0333010605c99153ad346.24690297', '2021-03-25 14:07:17'),
(110, 16, 'AW033301060741c651dd2b8.17667225', '2021-04-12 10:09:41'),
(111, 16, 'AW033301060742551564d20.26017887', '2021-04-12 10:47:45'),
(112, 16, 'AW03330106074265f0bda86.18683061', '2021-04-12 10:52:15'),
(113, 16, 'AW03330106074269a40a3a7.74859690', '2021-04-12 10:53:14'),
(114, 16, 'AW0333010607427cedefb19.57929809', '2021-04-12 10:58:22'),
(115, 16, 'AW033301060742808cd77e8.51450634', '2021-04-12 10:59:20'),
(116, 16, 'AW0333010607428207ecf92.70445717', '2021-04-12 10:59:44'),
(117, 16, 'AW033301060742900d510b9.18977540', '2021-04-12 11:03:28'),
(118, 16, 'AW033301060744931e11d40.53830069', '2021-04-12 13:20:49'),
(119, 16, 'AW033301060744a030fcc79.54095542', '2021-04-12 13:24:19'),
(120, 16, 'AW033301060744ddba26f86.79645090', '2021-04-12 13:40:43'),
(121, 16, 'AW03330106076a58b339956.56306955', '2021-04-14 08:19:23'),
(122, 16, 'AW03330106076d752501a70.93171268', '2021-04-14 11:51:46'),
(123, 16, 'AW0333010608be2343fb6f8.30943861', '2021-04-30 10:55:48'),
(124, 58, 'AW033301060a787543d0f61.83935749', '2021-05-21 10:11:32'),
(125, 16, 'AW033301060a78d9a0b8305.73485657', '2021-05-21 10:38:18'),
(126, 16, 'AW033301060ae74867fc1b1.99854004', '2021-05-26 16:17:10'),
(127, 16, 'AW033301060ae7616e59284.13086019', '2021-05-26 16:23:50'),
(128, 61, 'AW033301060b600cface9b9.04286502', '2021-06-01 09:41:35'),
(129, 16, 'AW033301060c1faedc0e972.57029843', '2021-06-10 11:43:41'),
(130, 71, 'AW033301060d08335342b13.13754379', '2021-06-21 12:16:53'),
(131, 16, 'AW033301060d45e3bd6f251.93739816', '2021-06-24 10:28:11'),
(132, 16, 'AW033301060f948babf01d7.99505650', '2021-07-22 10:30:18'),
(133, 16, 'AW0333010611a80e74c1f36.34899074', '2021-08-16 15:14:47'),
(134, 16, 'AW0333010611a80ecaf6cb3.29345562', '2021-08-16 15:14:52'),
(135, 16, 'AW0333010611a80f42bb5a1.07197405', '2021-08-16 15:15:00'),
(136, 16, 'AW0333010611a811a036bc1.33234954', '2021-08-16 15:15:38'),
(137, 16, 'AW0333010611a81239b0cb6.94192925', '2021-08-16 15:15:47'),
(138, 16, 'AW0333010611a8138c91f91.72191000', '2021-08-16 15:16:08'),
(139, 16, 'AW0333010611a814473b4f6.96990251', '2021-08-16 15:16:20'),
(140, 16, 'AW0333010611a81612da0a8.92538808', '2021-08-16 15:16:49'),
(141, 16, 'AW0333010611a816f3dae03.73263921', '2021-08-16 15:17:03'),
(142, 16, 'AW0333010611a817015dab1.78810091', '2021-08-16 15:17:04'),
(143, 16, 'AW0333010611a817731f4a0.78973415', '2021-08-16 15:17:11'),
(144, 16, 'AW0333010611a819b728696.08764018', '2021-08-16 15:17:47'),
(145, 16, 'AW0333010611d1006718681.89149457', '2021-08-18 13:49:58'),
(146, 16, 'AW0333010611d11e6773e73.35147919', '2021-08-18 13:57:58'),
(147, 16, 'AW0333010611d152a3ce285.74364925', '2021-08-18 14:11:54'),
(148, 16, 'AW0333010611d1587f291b5.70169171', '2021-08-18 14:13:27'),
(149, 16, 'AW0333010611d15930056c0.27672577', '2021-08-18 14:13:39'),
(150, 16, 'AW0333010611d1615443f92.83426901', '2021-08-18 14:15:49'),
(151, 16, 'AW0333010611d1634a11582.12520255', '2021-08-18 14:16:20'),
(152, 16, 'AW0333010611d163f693c31.61068096', '2021-08-18 14:16:31'),
(153, 16, 'AW0333010611d16c19f2a06.35485469', '2021-08-18 14:18:41'),
(154, 16, 'AW0333010611d1727a855d1.22340929', '2021-08-18 14:20:23'),
(155, 16, 'AW0333010611d17403a0089.57958914', '2021-08-18 14:20:48'),
(156, 16, 'AW0333010611d17cf66a5c6.19714890', '2021-08-18 14:23:11'),
(157, 92, 'AW0333010611e69ba026ec9.64768179', '2021-08-19 14:24:58'),
(158, 92, 'AW0333010611e69c38137f4.36838254', '2021-08-19 14:25:07'),
(159, 92, 'AW0333010611e69cb83f763.28689538', '2021-08-19 14:25:15'),
(160, 92, 'AW0333010611e69d42d5ea0.84085285', '2021-08-19 14:25:24'),
(161, 92, 'AW0333010611e6a1566c803.71359231', '2021-08-19 14:26:29'),
(162, 92, 'AW0333010611f9c4fb29e98.37851881', '2021-08-20 12:13:03'),
(163, 92, 'AW0333010611f9fa1b3b629.20940267', '2021-08-20 12:27:13'),
(164, 16, 'AW0333010611facc2e5ea96.99180141', '2021-08-20 13:23:14'),
(165, 16, 'AW0333010611fad2fd02605.22331910', '2021-08-20 13:25:03'),
(166, 92, 'AW0333010611fad51251f06.65089202', '2021-08-20 13:25:37'),
(167, 16, 'AW0333010611fad5ea9bed5.99480321', '2021-08-20 13:25:50'),
(168, 92, 'AW0333010611fb708b198e0.54069325', '2021-08-20 14:07:04'),
(169, 16, 'AW0333010611fb76b5cb322.52567531', '2021-08-20 14:08:43'),
(170, 16, 'AW0333010611fbae216c0d3.18970932', '2021-08-20 14:23:30'),
(171, 16, 'AW033301061239b288b9c25.64551676', '2021-08-23 12:57:12'),
(172, 92, 'AW033301061239b5d186160.97511717', '2021-08-23 12:58:05'),
(173, 16, 'AW033301061239d1fe9c0a6.80603869', '2021-08-23 13:05:35'),
(174, 92, 'AW033301061239d9b637f18.90733110', '2021-08-23 13:07:39'),
(175, 92, 'AW03330106123a0a9f1bfd9.83674618', '2021-08-23 13:20:41'),
(176, 16, 'AW03330106123a0cc9c2604.98895664', '2021-08-23 13:21:16'),
(177, 92, 'AW03330106123a158b5e555.25433222', '2021-08-23 13:23:36'),
(178, 92, 'AW03330106123a17c32c575.10286374', '2021-08-23 13:24:12'),
(179, 92, 'AW03330106123a18d8f9900.82480529', '2021-08-23 13:24:29'),
(180, 92, 'AW03330106123a4217200a4.46195500', '2021-08-23 13:35:29'),
(181, 92, 'AW03330106124bf5b517512.98875392', '2021-08-24 09:43:55'),
(182, 92, 'AW03330106124bfab4f2055.15999348', '2021-08-24 09:45:15'),
(183, 16, 'AW03330106124c1675fe094.94583208', '2021-08-24 09:52:39'),
(184, 92, 'AW03330106125f1d964d5a3.93710077', '2021-08-25 07:31:37'),
(185, 92, 'AW03330106125f244d1f574.06593754', '2021-08-25 07:33:24'),
(186, 92, 'AW03330106125f24ad61f05.21053457', '2021-08-25 07:33:30'),
(187, 92, 'AW03330106125f26f24c754.36035785', '2021-08-25 07:34:07'),
(188, 92, 'AW03330106125f281913f75.62665703', '2021-08-25 07:34:25'),
(189, 92, 'AW03330106125f28a376554.63361420', '2021-08-25 07:34:34'),
(190, 92, 'AW03330106125f2db9dc5b1.79628945', '2021-08-25 07:35:55'),
(191, 92, 'AW03330106125f329f06102.34621937', '2021-08-25 07:37:13'),
(192, 92, 'AW03330106125f35ba31598.72302881', '2021-08-25 07:38:03'),
(193, 16, 'AW0333010612639926a9963.81608500', '2021-08-25 12:37:38'),
(194, 16, 'AW0333010612639af8e8535.11836832', '2021-08-25 12:38:07'),
(195, 16, 'AW0333010612652693ec439.27965268', '2021-08-25 14:23:37'),
(196, 92, 'AW03330106126527904b4f4.78082277', '2021-08-25 14:23:53'),
(197, 92, 'AW0333010612778b40b4505.28502572', '2021-08-26 11:19:16'),
(198, 92, 'AW0333010612778c9b4bfa7.95326963', '2021-08-26 11:19:37'),
(199, 92, 'AW03330106127793ce383e6.71621558', '2021-08-26 11:21:32'),
(200, 92, 'AW03330106128b26dacc7d9.03377338', '2021-08-27 09:37:49'),
(201, 16, 'AW03330106128c6ac5124e0.32308902', '2021-08-27 11:04:12'),
(202, 92, 'AW0333010612ca7217e8966.28053790', '2021-08-30 09:38:41'),
(203, 16, 'AW0333010612df7a1ec4472.67482457', '2021-08-31 09:34:25'),
(204, 92, 'AW0333010612dfc3510c7e1.93995325', '2021-08-31 09:53:57'),
(205, 16, 'AW0333010612e416e716667.36351879', '2021-08-31 14:49:18'),
(206, 16, 'AW0333010614608a5787140.62739864', '2021-09-18 15:41:25'),
(207, 16, 'AW03330106149eb00320de0.19701039', '2021-09-21 14:24:00'),
(208, 92, 'AW033301061547b81235db2.42987431', '2021-09-29 14:43:13'),
(209, 16, 'AW033301061547bc46fb603.06663043', '2021-09-29 14:44:20'),
(210, 93, 'AW033301061547c0aa2ba76.97227252', '2021-09-29 14:45:30'),
(211, 95, 'AW033301061547ded61da11.33461097', '2021-09-29 14:53:33'),
(212, 95, 'AW033301061547e4bbdb1d1.64825035', '2021-09-29 14:55:07'),
(213, 95, 'AW03330106154808ba70222.69580163', '2021-09-29 15:04:43'),
(214, 95, 'AW03330106154818d637304.61718158', '2021-09-29 15:09:01'),
(215, 95, 'AW033301061548402538ba1.44988102', '2021-09-29 15:19:30'),
(216, 95, 'AW0333010615584809f3984.39178904', '2021-09-30 09:33:52'),
(217, 95, 'AW0333010615eb0df0fd2b6.67807521', '2021-10-07 08:33:35'),
(218, 95, 'AW0333010615eb55d42f1f2.98489045', '2021-10-07 08:52:45'),
(219, 95, 'AW03330106183ca5f245b29.84781033', '2021-11-04 11:56:15'),
(220, 95, 'AW0333010618e4a98b92b66.95964477', '2021-11-12 11:06:00'),
(221, 95, 'AW03330106196669b24abc2.46074183', '2021-11-18 14:43:39'),
(222, 95, 'AW0333010619672515f65b9.41694968', '2021-11-18 15:33:37'),
(223, 95, 'AW03330106196726c710f39.07526056', '2021-11-18 15:34:04'),
(224, 95, 'AW03330106196729e317219.51683408', '2021-11-18 15:34:54'),
(225, 95, 'AW0333010619675e8cf9aa3.07740834', '2021-11-18 15:48:56'),
(226, 95, 'AW033301061dc441823a9a3.82108608', '2022-01-10 14:35:04'),
(227, 95, 'AW03330106204da562eb413.84692525', '2022-02-10 09:26:46'),
(228, 16, 'AW03330106204e1e5cf7ac8.88271888', '2022-02-10 09:59:01'),
(229, 96, 'AW033301062457c9ac96282.01272391', '2022-03-31 10:04:10'),
(230, 96, 'AW03330106245a38a0ba1c8.91902470', '2022-03-31 12:50:18'),
(231, 96, 'AW03330106245a42f7817f0.80256836', '2022-03-31 12:53:03'),
(232, 96, 'AW03330106245a5d30cc845.41337091', '2022-03-31 13:00:03'),
(233, 96, 'AW03330106245a6128a6907.99116453', '2022-03-31 13:01:06'),
(234, 96, 'AW03330106245a68622c187.74513980', '2022-03-31 13:03:02'),
(235, 96, 'AW03330106245a757d0f067.41992369', '2022-03-31 13:06:31'),
(236, 96, 'AW03330106245a79e9c0275.67545475', '2022-03-31 13:07:42'),
(237, 96, 'AW03330106245a8898696f5.12466376', '2022-03-31 13:11:37'),
(238, 96, 'AW03330106245a91e444bd8.51410999', '2022-03-31 13:14:06'),
(239, 16, 'AW03330106245a9f7606985.25152943', '2022-03-31 13:17:43'),
(240, 95, 'AW0333010624ed22fc2bfb2.15216482', '2022-04-07 11:59:43'),
(241, 95, 'AW03330106257e8d8540061.51762950', '2022-04-14 09:26:48'),
(242, 95, 'AW03330106257e8dc97e576.11562373', '2022-04-14 09:26:52'),
(243, 95, 'AW03330106257e8e57e01c5.37446225', '2022-04-14 09:27:01'),
(244, 95, 'AW03330106257e903d48a54.66334446', '2022-04-14 09:27:31'),
(245, 95, 'AW03330106257e941adcc09.83049299', '2022-04-14 09:28:33'),
(246, 95, 'AW03330106257e94db3ad52.20541107', '2022-04-14 09:28:45'),
(247, 95, 'AW03330106257e95b4c25d0.83264304', '2022-04-14 09:28:59'),
(248, 95, 'AW03330106257e95db08683.84588946', '2022-04-14 09:29:01'),
(249, 95, 'AW03330106257e9835a75f7.23805660', '2022-04-14 09:29:39'),
(250, 95, 'AW03330106257eeb105b995.96551693', '2022-04-14 09:51:45'),
(251, 16, 'AW03330106257ef2d7b8512.39940986', '2022-04-14 09:53:49'),
(252, 95, 'AW03330106257f2a68349e6.72130122', '2022-04-14 10:08:38'),
(253, 16, 'AW03330106257f2adcf55c2.86484613', '2022-04-14 10:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `chat_user_credentials`
--

CREATE TABLE `chat_user_credentials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_user_id` text NOT NULL,
  `chat_user_name` text NOT NULL,
  `chat_user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_user_credentials`
--

INSERT INTO `chat_user_credentials` (`id`, `user_id`, `chat_user_id`, `chat_user_name`, `chat_user_password`) VALUES
(1, 92, 'nJQfYBqJYr28zSxt5', 'fredythekkekkaragmail.com0013', 'RmNqbkc1WHZyTEttVVRVaEZvRTg0UT09'),
(2, 95, 'apzciRBvKGy9hLKFC', 'john2gmail.com', 'RmNqbkc1WHZyTEttVVRVaEZvRTg0UT09');

-- --------------------------------------------------------

--
-- Table structure for table `farm_land`
--

CREATE TABLE `farm_land` (
  `farm_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `farm_name` varchar(50) NOT NULL,
  `farm_desc` text DEFAULT NULL,
  `farm_address` text NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `house_number` varchar(25) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `farm_location` point NOT NULL,
  `farm_area` double DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farm_land`
--

INSERT INTO `farm_land` (`farm_id`, `producer_id`, `farm_name`, `farm_desc`, `farm_address`, `street`, `house_number`, `city`, `zip`, `farm_location`, `farm_area`, `created_date`) VALUES
(2, 16, 'Test Point', 'test farm land', 'Brodaer Straße 2, Neubrandenburg, 17033', NULL, NULL, NULL, NULL, 0x000000000101000000456458c51bc74a40bfdd488f957e2a40, 0, '2020-12-11 17:23:45'),
(3, 16, 'New Farm', 'Test Description of famr land', 'Dükerweg undefined, Neubrandenburg, 17033', NULL, NULL, NULL, NULL, 0x00000000010100000000000000000000000000000000000000, 0, '2020-12-12 13:47:09'),
(4, 16, 'Test Point 3', 'new test location', 'Brodaer Straße 4, Neubrandenburg, 17033', NULL, NULL, NULL, NULL, 0x000000000101000000ced60b4ff9c64a401aea6635137e2a40, 0, '2020-12-16 09:22:04'),
(5, 16, 'Marketplatz', 'A market, or marketplace, is a location where people regularly gather for the purchase and sale of provisions, livestock, and other goods.[1] In different parts of the world, a market place may be described as a souk (from the Arabic), bazaar (from the Persian), a fixed mercado (Spanish), or itinerant tianguis (Mexico), or palengke (Philippines). Some markets operate daily and are said to be permanent markets while others are held once a week or on less frequent specified days such as festival days and are said to be periodic markets. The form that a market adopts depends on its locality\'s population, culture, ambient and geographic conditions. The term market covers many types of trading, as market squares, market halls and food halls, and their different varieties. Due to this, marketplaces can be situated both outdoors and indoors.', 'Dorfstraße Ost 13, undefined, 16307', NULL, NULL, NULL, NULL, 0x0000000001010000002c69ad0130a44a406affff7fa0d12c40, 0, '2020-12-17 13:13:16'),
(6, 16, 'Test Point', 'this is my new production point', 'Gartenstraße 5a, Neubrandenburg, 17033', NULL, NULL, NULL, NULL, 0x000000000101000000ae4ee359d8c64a40a900006038892a40, 0, '2020-12-19 11:08:34'),
(10, 16, 'new test', '', 'Binsenwerder 3, Neubrandenburg, 17033', NULL, NULL, NULL, NULL, 0x000000000101000000cc19d264fac64a400e0100a03e7f2a40, 0, '2020-12-19 11:19:41'),
(12, 16, 'new test 3', '', 'Binsenwerder 1, Neubrandenburg, 17033', NULL, NULL, NULL, NULL, 0x000000000101000000338da266ecc64a406e0000c02d7f2a40, 0, '2020-12-19 11:28:54'),
(14, 16, 'Monmouthshire', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Binsenwerder 2, Neubrandenburg, 17033', 'Sonnenkamp', '4A', 'Neubrandenburg', '17036', 0x000000000101000000e2d7ff0be4c64a40cdffffdf1c7f2a40, 0, '2020-12-19 11:29:54'),
(15, 16, 'Salisbury', 'Salisbury Farm has been premium supplier of fresh fruit for the office  and healthy  vegetable boxes for the home since 2014  . But we are more than just a normal delivery service: Since 2014 we have been working with a lot of energy and a lot of fun on the idea of ​​promoting healthy eating at work or at home. Let us freshen you up and read our story here!', 'Binsenwerder 2, Neubrandenburg, 17033', 'Dr. Brückner Weg', '5', 'Neubrandenburg', '17033', 0x00000000010100000097d559b1dbc64a40e8ffff5f337f2a40, 0, '2020-12-19 11:33:22'),
(18, 16, 'Virginia Water', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Binsenwerder, 4-6, Neubrandenburg - 17033', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x0000000001010000004a0091d1ecc64a40010000a03e7f2a40, 0, '2021-02-26 14:07:04'),
(20, 16, 'Test Point 568', 'test point', 'Am Oberbach, 14, Neubrandenburg - 17033', 'Am Oberbach', '14', 'Neubrandenburg', '17033', 0x000000000101000000ac0cfb6cf6c64a40af15106e32802a40, 0, '2021-03-15 14:16:52'),
(21, 16, 'Test Point 321', 'test', 'Schwedenstraße, 9, Neubrandenburg - 17033', 'Schwedenstraße', '9', 'Neubrandenburg', '17033', 0x000000000101000000df4216c87ac64a40876c5f0077852a40, 0, '2021-03-15 14:55:29'),
(22, 16, 'test 0000002', 'test', 'John-Schehr-Straße, 36, Neubrandenburg - 17033', 'John-Schehr-Straße', '36', 'Neubrandenburg', '17033', 0x000000000101000000e10edd97f2c54a40e01adcb7c58a2a40, 0, '2021-03-15 16:13:09'),
(28, 16, 'Test Point ttt', 'test', 'Mühlendamm, 1, Neubrandenburg - 17033', 'Mühlendamm', '1', 'Neubrandenburg', '17033', 0x000000000101000000d1b9910fa7c64a408e57dbadd88f2a40, 0, '2021-04-11 11:32:48'),
(29, 16, 'Test Point ttt', 'test', 'Mühlendamm, 1, Neubrandenburg - 17033', 'Mühlendamm', '1', 'Neubrandenburg', '17033', 0x000000000101000000d1b9910fa7c64a408e57dbadd88f2a40, 0, '2021-04-11 11:33:05'),
(30, 16, 'Test Point', 'test', 'Binsenwerder, 4-6, Neubrandenburg - 17033', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x000000000101000000a8977384e7c64a40bcd25fd9927f2a40, 0, '2021-04-11 11:34:00'),
(31, 16, 'Test Point', 'test', 'Binsenwerder, 4-6, Neubrandenburg - 17033', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x000000000101000000a8977384e7c64a40bcd25fd9927f2a40, 0, '2021-04-11 11:34:35'),
(32, 16, 'Test Point 666', 'test', 'Binsenwerder, 2, Neubrandenburg - 17033', 'Binsenwerder', '2', 'Neubrandenburg', '17033', 0x000000000101000000bace876db4c64a40f12d8a7a437f2a40, 0, '2021-04-11 11:40:14'),
(33, 16, 'Test Point 890', 'test', 'Binsenwerder, 1, Neubrandenburg - 17033', 'Binsenwerder', '1', 'Neubrandenburg', '17033', 0x000000000101000000dc5e65ebf3c64a40cf673a251c7f2a40, 0, '2021-04-11 11:45:16'),
(34, 16, 'test 1', 'test', 'Friedrich-Engels-Ring, undefined, Neubrandenburg - 17033', 'Friedrich-Engels-Ring', 'undefined', 'Neubrandenburg', '17033', 0x0000000001010000009b4ee359d8c64a405d83f193dd842a40, 0, '2021-04-13 08:54:10'),
(35, 16, 'new test', 'test', 'Friedrich-Engels-Ring, 48, Neubrandenburg - 17033', 'Friedrich-Engels-Ring', '48', 'Neubrandenburg', '17033', 0x000000000101000000629dd280d2c64a4086aeaa9028842a40, 0, '2021-06-10 11:44:00'),
(36, 16, 'new test 4', 'test', 'Ausbau, 5, Angermünde - 16278', 'Ausbau', '5', 'Angermünde', '16278', 0x0000000001010000002613624a747e4a40bd6ce63bd50e2c40, 0, '2021-06-10 11:44:53'),
(37, 16, 'new test 4', 'test', 'Ausbau, 5, Angermünde - 16278', 'Ausbau', '5', 'Angermünde', '16278', 0x0000000001010000002613624a747e4a40bd6ce63bd50e2c40, 0, '2021-06-10 11:44:53'),
(38, 16, 'new test 4', 'test', 'Ausbau, 5, Angermünde - 16278', 'Ausbau', '5', 'Angermünde', '16278', 0x0000000001010000002613624a747e4a40bd6ce63bd50e2c40, 0, '2021-06-10 11:44:53'),
(39, 16, 'test 1585', 'test', 'Binsenwerder, 4-6, Neubrandenburg - 17033', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x0000000001010000002940addedfc64a400942b624487f2a40, 0, '2021-06-10 11:56:07'),
(40, 16, 'test 8569', 'test', 'Große Wollweberstraße, 6, Neubrandenburg - 17033', 'Große Wollweberstraße', '6', 'Neubrandenburg', '17033', 0x0000000001010000001e9e77da1cc74a40c06d422d5b842a40, 0, '2021-06-10 11:57:31'),
(41, 92, 'test 1', 'test', 'Binsenwerder, 2, Neubrandenburg - 17033', 'Binsenwerder', '2', 'Neubrandenburg', '17033', 0x00000000010100000086d559b1dbc64a40d7d8258be87e2a40, 0, '2021-08-31 14:50:33'),
(42, 95, 'test 1', 'test', 'Binsenwerder, 2, undefined - 17033', 'Binsenwerder', '2', 'undefined', '17033', 0x000000000101000000189c5139e8c64a401298bd271b7f2a40, 0, '2021-11-12 10:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_sellers`
--

CREATE TABLE `favourite_sellers` (
  `fav_seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `is_favourite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite_sellers`
--

INSERT INTO `favourite_sellers` (`fav_seller_id`, `user_id`, `seller_id`, `is_favourite`) VALUES
(1, 16, 27, 1),
(2, 16, 26, 0),
(3, 16, 25, 1),
(4, 16, 23, 0),
(5, 16, 24, 0),
(6, 16, 14, 1),
(7, 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feature_type`
--

CREATE TABLE `feature_type` (
  `feature_type_id` int(11) NOT NULL,
  `feature_name` varchar(60) NOT NULL,
  `feature_description` text DEFAULT NULL,
  `image_path` varchar(150) DEFAULT NULL,
  `image_name` varchar(70) NOT NULL,
  `is_professional_feature` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_type`
--

INSERT INTO `feature_type` (`feature_type_id`, `feature_name`, `feature_description`, `image_path`, `image_name`, `is_professional_feature`) VALUES
(1, 'Bio EU', 'EU bio label', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/eu_bio.png', 'eu_bio.png', 0),
(2, 'Vegan', 'Vegan', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/vegan.webp', 'vegan.webp', 0),
(3, 'Vegetarian', 'Vegetarian', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/vegetarisch.png', 'vegetarisch.png', 0),
(4, 'Non-vegetarian', 'Non-vegetarian', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/nonveg.jpg', 'nonveg.jpg', 0),
(8, 'Lactose Free', 'This product is lactose free', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/lactose-free.jpg', 'lactose-free.jpg', 1),
(9, 'Bio', 'This product complies with organic guidelines', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/bio_non_certified.jpg', 'bio_non_certified.jpg', 1),
(10, 'Bio DE', 'The German state organic seal', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/bio_de.png', 'bio_de.png', 1),
(11, 'Gluten Free', 'This product doesn\'t contain gluten', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/gluten_free.jpg', 'gluten_free.jpg', 0),
(12, 'Naturland', 'Certified farmers and processing companies produce organic food according to the Naturland guidelines', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/naturland.png', 'naturland.png', 1),
(13, 'No Flavouring', 'No Flavouring', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/no-artifical-flavors.png', 'no-artifical-flavors.png', 0),
(14, 'No Coloring', 'No Coloring', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/no_artificial_color.png', 'no_artificial_color.png', 0),
(15, 'No Preservatives', 'No Preservatives', 'http://localhost/kleinerzeugernetzwerk_uploads/features_features/no_preservatives.jpg', 'no_preservatives.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_type` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `image_path` text DEFAULT NULL,
  `entity_id` int(11) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_type`, `image_name`, `image_path`, `entity_id`, `createdDate`) VALUES
(1, 1, '74c2578b-b260-4255-8802-0233b32e98b9.jpg', NULL, 48, '2020-12-18 13:30:20'),
(2, 1, 'deb9dec0-f9f8-4b67-989b-0fca88ee3686.jpg', NULL, 51, '2020-12-18 13:30:20'),
(3, 1, '9ec1b169-88cd-4f72-9978-4474321c4bab.jpg', NULL, 51, '2020-12-18 13:30:20'),
(4, 1, 'c2c94e80-a9bf-4dd9-899b-57548d4105c4.png', NULL, 51, '2020-12-18 13:30:20'),
(5, 1, '80bde851-861a-46c5-aef8-308dfe6132ae.png', NULL, 52, '2020-12-18 13:30:20'),
(6, 1, '62c9cee8-3962-4505-9b75-eae382944325.jpg', NULL, 52, '2020-12-18 13:30:20'),
(7, 1, '8f609f40-586b-4e06-a1c6-a093e08166d2.jpg', NULL, 52, '2020-12-18 13:30:20'),
(8, 1, '49d2c7a0-3747-4a93-bafe-f640295736cf.png', NULL, 52, '2020-12-18 13:30:20'),
(9, 1, 'ee61f568-3c31-487c-83de-5f0e1ed84838.jpeg', NULL, 53, '2020-12-18 16:35:31'),
(10, 1, 'ad3f9450-b78a-4590-801d-2dd6975e34cc.jpg', NULL, 53, '2020-12-18 16:35:31'),
(11, 1, '039905d4-0540-40e8-ae04-7c2715e6d0be.jpg', NULL, 54, '2020-12-18 16:36:03'),
(12, 1, '09da3fb0-ceeb-4877-9f71-bbe4bebf2e35.jpg', NULL, 54, '2020-12-18 16:36:03'),
(13, 1, '2871f1f4-562f-4d22-8e3c-3d2a01d2541a.jpg', NULL, 55, '2020-12-18 16:37:19'),
(14, 1, '565c2415-d608-4dc8-9a75-2944f6497e85.jpg', NULL, 55, '2020-12-18 16:37:19'),
(15, 1, '97bd3c16-c751-4905-9596-7947a2613fb9.jpg', NULL, 55, '2020-12-18 16:37:19'),
(16, 1, '16d13cfe-2372-4937-ba70-d6633ed6f26c.jpg', NULL, 55, '2020-12-18 16:37:19'),
(17, 1, 'a9a7add0-4cd1-4687-97e7-65742cad324f.jpeg', NULL, 55, '2020-12-18 16:37:19'),
(18, 1, '33a90f5d-4c4c-4440-bb3b-2100f2c3769a.jpg', NULL, 55, '2020-12-18 16:37:19'),
(19, 1, 'c344dbcc-889a-4c91-9d02-1bc642cd21fd.jpg', NULL, 56, '2020-12-18 16:37:57'),
(20, 2, '9bfdb0a1-9165-4ecf-af0b-7e9e1b0d3d8c.jpg', NULL, 16, '2020-12-19 11:35:49'),
(21, 2, '85214677-95d0-4ae8-a8b1-2efb9695d7ea.jpg', NULL, 16, '2020-12-19 11:35:49'),
(22, 1, 'f5e92244-67ea-452c-ba6d-25fb06df98fe.jpg', NULL, 57, '2020-12-19 13:11:16'),
(23, 1, '9cbd6a72-c208-43d8-ad70-b3fefc3ff3fa.jpg', NULL, 57, '2020-12-19 13:11:16'),
(24, 1, 'edb178d1-9600-447b-961b-85af4f6adb7c.jpg', NULL, 57, '2020-12-19 13:11:16'),
(25, 1, '6de80b31-9b6b-4330-b4d1-597fe8c1adeb.jpg', NULL, 58, '2020-12-28 14:07:14'),
(26, 1, '7ac3c92c-6a4c-42b2-b105-a490ed31e50e.jpg', NULL, 58, '2020-12-28 14:07:14'),
(27, 2, '606f2e3991c27', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/', 144, '2021-04-08 16:24:52'),
(28, 2, '606f2e3991c27', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/', 144, '2021-04-08 16:24:52'),
(29, 2, '606f2e3991c27', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/', 144, '2021-04-08 16:24:52'),
(30, 2, '606f2f2cdedd1', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f2f2cdedd1', 146, '2021-04-08 16:28:41'),
(31, 2, '606f2f2cdedd1', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f2f2cdedd1', 146, '2021-04-08 16:28:41'),
(32, 2, '606f2f2cdedd1', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f2f2cdedd1', 146, '2021-04-08 16:28:41'),
(33, 2, '606f31358d514jpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f31358d514jpg', 147, '2021-04-08 16:37:25'),
(34, 2, '606f314591112jpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f314591112jpg', 147, '2021-04-08 16:37:25'),
(35, 2, '606f3145911edjpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f3145911edjpg', 147, '2021-04-08 16:37:25'),
(36, 2, '606f31459145bjpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f31459145bjpg', 147, '2021-04-08 16:37:25'),
(37, 2, '606f316b02599.jpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f316b02599.jpg', 148, '2021-04-08 16:38:13'),
(38, 2, '606f3171ea0eb.jpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f3171ea0eb.jpg', 148, '2021-04-08 16:38:13'),
(39, 2, '606f31748083a.jpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f31748083a.jpg', 148, '2021-04-08 16:38:13'),
(40, 2, '606f317480844.jpg', 'C:/xampp/htdocs/kleinerzeugernetzwerk_uploads/product_img/606f317480844.jpg', 148, '2021-04-08 16:38:13'),
(41, 2, '60705af7d193f.jpg', '60705af7d193f.jpg', 150, '2021-04-09 13:47:35'),
(42, 2, '60705af7d1947.png', '60705af7d1947.png', 150, '2021-04-09 13:47:36'),
(49, 2, '60708bd439621.png', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/60708bd439621.png', 151, '2021-04-09 17:15:33'),
(50, 2, '60708bd439629.png', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/60708bd439629.png', 151, '2021-04-09 17:15:33'),
(51, 2, '60708bd43962d.png', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/60708bd43962d.png', 151, '2021-04-09 17:15:33'),
(54, 2, '607153d162a28.png', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/607153d162a28.png', 152, '2021-04-10 07:29:21'),
(55, 2, '607153d162a30.png', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/607153d162a30.png', 152, '2021-04-10 07:29:21'),
(56, 2, '607153d162a34.png', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/607153d162a34.png', 152, '2021-04-10 07:29:21'),
(64, 4, '6071d2e66bb7a.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6071d2e66bb7a.jpg', 39, '2021-04-10 16:31:39'),
(67, 4, '6071d4896caa2.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6071d4896caa2.jpg', 39, '2021-04-10 16:38:33'),
(80, 4, '6071db5ac22d1.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6071db5ac22d1.PNG', 47, '2021-04-10 17:07:40'),
(81, 4, '6071db5ac22da.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6071db5ac22da.PNG', 47, '2021-04-10 17:07:40'),
(82, 4, '6071db5ac22df.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6071db5ac22df.PNG', 47, '2021-04-10 17:07:40'),
(83, 2, '6072bb6e78cf6.JPG', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/6072bb6e78cf6.JPG', 153, '2021-04-11 09:03:09'),
(84, 2, '6072bb6e78cfd.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/6072bb6e78cfd.PNG', 153, '2021-04-11 09:03:09'),
(85, 2, '6072bb6e78d01.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/product_img/6072bb6e78d01.PNG', 153, '2021-04-11 09:03:09'),
(96, 3, '6072de60314b2.JPG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072de60314b2.JPG', 28, '2021-04-11 11:32:52'),
(97, 3, '6072de60314ca.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072de60314ca.PNG', 28, '2021-04-11 11:32:52'),
(98, 3, '6072de60314d0.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072de60314d0.PNG', 28, '2021-04-11 11:32:52'),
(99, 3, '6072de71be21c.JPG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072de71be21c.JPG', 29, '2021-04-11 11:33:09'),
(100, 3, '6072de71be224.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072de71be224.PNG', 29, '2021-04-11 11:33:09'),
(101, 3, '6072de71be228.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072de71be228.PNG', 29, '2021-04-11 11:33:09'),
(102, 3, '6072dea87d1c0.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072dea87d1c0.PNG', 30, '2021-04-11 11:34:07'),
(103, 3, '6072dea87d1c7.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072dea87d1c7.PNG', 30, '2021-04-11 11:34:07'),
(104, 3, '6072decb66278.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072decb66278.PNG', 31, '2021-04-11 11:34:37'),
(105, 3, '6072decb66280.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072decb66280.PNG', 31, '2021-04-11 11:34:37'),
(106, 3, '6072e01eedef1.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072e01eedef1.PNG', 32, '2021-04-11 11:40:17'),
(107, 3, '6072e01eedef8.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072e01eedef8.PNG', 32, '2021-04-11 11:40:17'),
(108, 3, '6072e01eedefb.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072e01eedefb.PNG', 32, '2021-04-11 11:40:17'),
(109, 3, '6072e14cb42d7.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072e14cb42d7.PNG', 33, '2021-04-11 11:45:20'),
(110, 3, '6072e14cb42de.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072e14cb42de.PNG', 33, '2021-04-11 11:45:20'),
(111, 3, '6072e14cb42e2.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6072e14cb42e2.PNG', 33, '2021-04-11 11:45:20'),
(112, 1, '60740b6324f9a.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/60740b6324f9a.PNG', 54, '2021-04-12 08:57:37'),
(113, 1, '60740e972afc6.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/60740e972afc6.PNG', 55, '2021-04-12 09:11:15'),
(114, 1, '607415847dfa8.PNG', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/607415847dfa8.PNG', 56, '2021-04-12 09:40:23'),
(126, 1, '607448d3c70bf.jpeg', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/607448d3c70bf.jpeg', 16, '2021-04-12 13:19:18'),
(127, 3, '6076d8548dc61.jfif', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076d8548dc61.jfif', 34, '2021-04-13 08:54:10'),
(128, 3, '6076d8548dc7b.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076d8548dc7b.jpg', 34, '2021-04-13 08:54:10'),
(130, 4, '60755c4389653.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/60755c4389653.jpg', 34, '2021-04-13 08:54:27'),
(131, 2, '6076d76fee92f.jpg', 'http://ec2-18-184-142-200.eu-central-1.compute.amazonaws.com/kleinerzeugernetzwerk_uploads/product_img/6076d76fee92f.jpg', 154, '2021-04-14 08:21:58'),
(132, 2, '6076d76fee938.png', 'http://ec2-18-184-142-200.eu-central-1.compute.amazonaws.com/kleinerzeugernetzwerk_uploads/product_img/6076d76fee938.png', 154, '2021-04-14 08:21:58'),
(134, 4, '6076a66606b14.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6076a66606b14.jpg', 48, '2021-04-14 08:23:02'),
(135, 4, '6076a66606b2f.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6076a66606b2f.jpg', 48, '2021-04-14 08:23:02'),
(136, 4, '6076a66606b33.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/seller_img/6076a66606b33.jpg', 48, '2021-04-14 08:23:02'),
(146, 4, '6076a9b0eaf03.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076a9b0eaf03.jpg', 34, '2021-04-14 08:37:07'),
(147, 4, '6076a9b0eaf1c.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076a9b0eaf1c.jpg', 34, '2021-04-14 08:37:07'),
(148, 4, '6076a9b0eaf22.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076a9b0eaf22.jpg', 34, '2021-04-14 08:37:07'),
(149, 4, '6076a9bcb6600.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076a9bcb6600.jpg', 34, '2021-04-14 08:38:05'),
(150, 4, '6076a9bcb660e.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076a9bcb660e.jpg', 34, '2021-04-14 08:38:05'),
(151, 4, '6076a9bcb6612.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076a9bcb6612.jpg', 34, '2021-04-14 08:38:05'),
(152, 4, '6076aa034e859.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076aa034e859.jpg', 34, '2021-04-14 08:38:40'),
(153, 4, '6076aa4b68fcf.png', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076aa4b68fcf.png', 34, '2021-04-14 08:39:59'),
(154, 4, '6076aa4b68fd6.png', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076aa4b68fd6.png', 34, '2021-04-14 08:39:59'),
(156, 4, '6076abbc27a54.png', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076abbc27a54.png', 1, '2021-04-14 08:45:49'),
(191, 3, '6076d8548dc80.jfif', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076d8548dc80.jfif', 34, '2021-04-14 11:56:04'),
(192, 3, '6076d8548dc95.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/production_point_img/6076d8548dc95.jpg', 34, '2021-04-14 11:56:04'),
(193, 1, '60a7870267973.jfif', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/60a7870267973.jfif', 58, '2021-05-21 10:11:01'),
(194, 1, '60a7892d62523.jpg', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/60a7892d62523.jpg', 59, '2021-05-21 10:19:40'),
(195, 1, '60b600ab54720.jpeg', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/60b600ab54720.jpeg', 61, '2021-06-01 09:40:59'),
(196, 1, '60d0831337227.jfif', 'http://localhost/kleinerzeugernetzwerk_uploads/profile_img/60d0831337227.jfif', 71, '2021-06-21 12:16:38'),
(197, 5, '60f14f37ed899.png', 'http://localhost/kleinerzeugernetzwerk_uploads/news_feeds/60f14f37ed899.png', 11, '2021-07-16 09:20:34'),
(198, 5, '60f15047ee1fe.png', 'http://localhost/kleinerzeugernetzwerk_uploads/news_feeds/60f15047ee1fe.png', 12, '2021-07-16 09:24:59'),
(199, 5, '60f15090b96e8.png', 'http://localhost/kleinerzeugernetzwerk_uploads/news_feeds/60f15090b96e8.png', 13, '2021-07-16 09:25:40'),
(200, 5, '60ffe2ee6f9fb.jfif', 'http://localhost/kleinerzeugernetzwerk_uploads/news_feeds/60ffe2ee6f9fb.jfif', 17, '2021-07-27 10:39:43'),
(201, 5, '60ffeab964f66.jpeg', 'http://localhost/kleinerzeugernetzwerk_uploads/news_feeds/60ffeab964f66.jpeg', 16, '2021-07-27 10:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `image_types`
--

CREATE TABLE `image_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_types`
--

INSERT INTO `image_types` (`type_id`, `type_name`) VALUES
(1, 'profile'),
(2, 'product'),
(3, 'production point'),
(4, 'selling point');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE `news_feed` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `article` text NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`id`, `title`, `article`, `author_first_name`, `author_last_name`, `user_id`, `created_date`) VALUES
(2, 'This summer could change our understanding of extreme heat', 'The heat wave that scorched the Pacific Northwestern United States in late June rewrote the record books in ways that were both shocking and difficult to comprehend. Scientists are unsure how best to explain the temperatures, so extreme compared with what meteorologists expect to see in that typically cool, wet region of the world.\r\n\r\nIn Seattle, Washington, temperatures hit 108 degrees Fahrenheit, 9 degrees hotter than it’s ever been in steamy Tampa, Florida. Portland, Oregon’s 116°F eclipsed Dallas, Texas’s heat record by 3 degrees. Hundreds of miles north of Portland, the British Columbia village of Lytton set a new temperature record for Canada—a Death Valley-like 121 degrees. The next day, the town was engulfed and largely destroyed by a wildfire.\r\n\r\nIt’s possible the Pacific Northwest simply experienced a very unlucky combination of weather and climate change. But in recent days, some researchers have begun to consider an alternative explanation: Perhaps climate change has set in motion new, as yet poorly understood, processes that are making heat waves that once seemed statistically impossible far more likely.\r\n\r\nMore work needs to be done to determine if that hypothesis is correct and if so, what the underlying mechanisms are. But if climate feedbacks beyond the warming of the atmosphere have loaded the meteorological dice in favor of events like the Pacific Northwest heat wave, the consequences for human life could be profound, considering that extreme heat is one of the deadliest forms of extreme weather.\r\n\r\nIn British Columbia, officials reported nearly 500 “sudden and unexpected deaths” around the time of the heat wave. On Friday, the U.S. Centers for Disease Control reported that from June 25-30, hospitals in the Northwest saw nearly 3,000 heat-related visits.\r\n\r\nThat’s why the scientists who proposed this idea are racing to find answers.', 'test', 'test', 16, '2021-07-21 10:33:54'),
(3, 'Climate change goals and oil production are clashing in the U.S.', 'On his first day in office, President Joe Biden rejoined the Paris Agreement, temporarily banned all new oil and gas leases on federal land, and canceled permits for the controversial Keystone XL pipeline. In April, the president held a virtual climate conference in which he went even further than the Paris climate commitments, pledging that the world’s second largest economy would cut greenhouse gas emissions in half by 2030, relative to 2005, and reach net-zero carbon emissions by 2050.\r\n\r\n“The signs are unmistakable, the science is undeniable, and the cost of inaction keeps mounting,” Biden told world leaders on Earth Day. “The countries that take decisive actions now will be the ones that reap the clean-energy benefits of the boom that’s coming.”\r\n\r\nThen a funny thing happened on the way to decarbonization. Shortly after Biden’s bold climate announcement, his administration approved ConocoPhillips’ massive new Willow project in the National Petroleum Reserve-Alaska (NPR-A), which the oil giant estimates at its peak will pump up to 160,000 barrels of oil a day out of some 250 wells, producing nearly 600 million barrels of oil over the next 30 years. Secretary of the Interior Deb Haaland had strongly opposed the project while a member of Congress just last year.\r\n\r\nThough it killed the Keystone XL pipeline, in April Biden’s administration argued in court against shutting down the controversial Dakota Access pipeline that carries a half-million barrels of oil a day between South Dakota and Illinois. That pipeline is also opposed by the Standing Rock Sioux tribe, which sees it as a threat to its water supply and sacred sites. Shortly thereafter, Biden’s Justice Department defended more than 400 oil and gas leases on public land in Wyoming issued in late 2020 by the Trump administration, even though environmental groups had successfully sued to stop the leases in a lower court because of the potential impact on sage grouse and other wildlife. A federal judge eventually blocked the leases in June.', 'test', 'test', 16, '2021-07-21 10:34:34'),
(4, 'Experts fear Germany’s deadly floods are a glimpse into climate future', 'Germany and Belgium, as well as parts of the Netherlands and Luxembourg, are grappling with devastating floods from intense rainfall over the past several days. More than 125 were confirmed dead as of Friday.\r\n\r\nWhile scientists are still piecing together how climate change might have influenced this one weather event, they say it shows key characteristics of how storms will be impacted by climate change: higher amounts of rainfall falling for longer.\r\n\r\nThe rainfall set new records over the Rhine River Basin in Germany, where most of the flooding occurred. Streets became navigable only by boat, homes were inundated, sinkholes opened up, and part of a castle was swept away.\r\n\r\n“It’s not so surprising because the increase of extreme events is something we’ve seen in climate model projections,” says Dieter Gerten, a climatologist at the Potsdam Institute for Climate Impact Research. Yet despite the projections, Gerten says he was still shocked by the size and intensity of the floods. His hometown of Oberkail is in a flooded portion of Germany.\r\n\r\nAs rescue teams moved in to help affected citizens, European leaders used the floods to reinforce their message that action needs to be taken to curb and adapt to climate change.\r\n\r\n“This event shows that even rich countries like Germany are not safe from very severe climate impacts,” says Kai Kornhuber, a climate physicist at Columbia University.\r\n\r\nHow a warmed world influences extreme rainfall\r\nA slow-moving low-pressure system has been dumping rain over western Europe since early this week, according to AccuWeather. Parts of Germany saw more rain in a day than they would typically see in the entire month. The same system led to floods in London on Monday; it is now heading to southern Europe.', 'tes', 'tst', 16, '2021-07-21 10:34:58'),
(5, 'Nearly half of Americans say climate change has become a bigger threat', 'The increase in sea levels, extreme weather, and wildfires, some of it the result of climate change, has made nearly nearly half of Americans feel more threatened by the changing climate, a poll finds.\r\n\r\nAlso, for more than a third of Americans, that confluence of events is influencing decisions on where to live.\r\n\r\nThose are the results of a National Geographic and Morning Consult poll of 2,200 American adults taken July 1-3.\r\n\r\n\r\nHas the increase in sea levels, extreme weather and wildfires, some of it the result of climate change, influenced your decision on where to live*?\r\n\r\n32%\r\n\r\nNo, not at all\r\n\r\n32\r\n\r\nNo, not really\r\n\r\n21\r\n\r\nYes, somewhat\r\n\r\n14\r\n\r\nYes, definitely\r\n\r\nHave increases in extreme weather and related events, such as droughts, wildfires, and hurricanes, influenced your view on climate change?\r\n\r\nGreater\r\n\r\nthreat now\r\n\r\n48%\r\n\r\n32\r\n\r\nSame threat as before\r\n\r\n14\r\n\r\nLesser threat now\r\n\r\n6\r\n\r\nDon’t know/no opinion\r\n\r\n*Due to rounding, categories do not add up to 100%.\r\n\r\nDiana Marques, NGM Staff\r\n\r\nSource: National Geographic and Morning Consult Poll\r\n\r\nThe responses dovetail with those of readers to similar questions amid the West’s record-breaking heat and drought—and potent early-season wildfires. “We have been considering moving and areas that will suffer the least amount of weather disasters is the deciding factor,” Californian Andrea Venn says. “I had never considered moving to Wisconsin in my life and now that may be a choice. We have always loved living in California but I know the future here will be difficult.”\r\n\r\nSmoke from the 68 large fires burning through 12 states, identified late Wednesday by the National Interagency Fire Center, is compromising air quality nearby, clouding skies, and producing eerily fiery sunrises and sunsets for tens of millions of Americans.\r\n\r\n\r\nA majority of the youngest and the oldest groups of Americans polled (51 percent of those 18-34 years old and 52 percent of those 65 or over) say the extreme conditions have made them think climate change has become a bigger threat. Overall, 48 percent of Americans agree, and 32 percent say it is the same level it has always been.\r\n\r\nAcross regions, respondents in the Northeast (39 percent) and West (42 percent) are most likely to say that recent weather events have influenced their decision on where to live. However, this may be driven by those who live in urban areas (52 percent), who were among the most likely to say that it has had an influence on their decision.\r\n\r\nBlack (44 percent) and Hispanic (51 percent) respondents are more likely than white (33 percent) respondents to say the extreme weather events have influenced them to consider moving.\r\n\r\nThe overall poll has a 2 percent margin of error.', 'tes', 'tst', 16, '2021-07-21 10:35:18'),
(6, 'Will dams spoil one of Europe’s last wild rivers?', 'TEPELENA, ALBANIAEmerging from a nearby mountain gorge, the Vjosa River radiates across the vast gravel expanse below this historic, hill-set town. Its fast-flowing, turquoise waters weave a whimsical web of channels and streams. This is a river that runs where it wants.\r\n\r\nIt is also what many rivers in central Europe once looked like long ago, before they were polluted, dammed, and fragmented over the last two centuries. Today, more rivers in Europe have been altered and obstructed by man-made barriers than on any other continent. The Vjosa, which flows unimpeded through southern Albania to the Adriatic Sea, is one of the last major European rivers that still runs wild. That makes it the flagship for conservation efforts to protect smaller free-flowing rivers throughout the Balkans, which also remain relatively intact. \r\n\r\nYet the Vjosa, its tributaries, and other Balkan rivers face new threats to their natural flows as officials in the region, which encompasses up to a dozen southeastern European countries, consider proposals to build more than 3,400 new hydropower plants there. Critics warn that such developments could have devastating ecological consequences for one of Europe’s most biodiverse regions. In addition to more than a dozen new dams planned for the Vjosa River’s main tributaries, oil exploration is ongoing upstream in the Vjosa River Basin and the Albanian government has approved plans for a new airport in the bird-rich Vjosa delta.\r\n\r\n “The Vjosa is the pivotal battle for the protection of free-flowing rivers in the Balkans and beyond,” says Ulrich Eichelmann, the CEO of Vienna, Austria-based Riverwatch, one of several conservation groups that a few years ago came together in a coalition called Save the Blue Heart of Europe.', 'tes', 'tst', 16, '2021-07-21 10:35:47'),
(7, 'Miami condo collapse highlights urgent need to adapt to rising seas', 'The collapse of the condominium building in Surfside, Florida, may force what some say is a long overdue conversation about the hard realities of climate change that will transform one of the nation’s most vulnerable regions.\r\n\r\nTo be sure, no evidence has emerged so far to connect climate change to the middle-of-the-night collapse of the Champlain Towers on June 24, which buried residents in the rubble. Sea level has risen eight inches in South Florida since 1981, when the 12-story condo was built—not enough to be responsible for its collapse, says Hal Wanless, a University of Miami geologist and South Florida’s preeminent voice on sea-level rise.\r\n\r\nThe investigation so far is more focused on a confluence of events—including delays by the homeowners association in carrying out recommended repairs—and an environmental danger that’s been known for more than a century: the corrosive effects of salt water on coastal construction.\r\n\r\nPhotos of corroded rebar and rotted concrete in the condo basement have recently been released. A 2018 report of an engineering inspection of the building, posted on the City of Surfside’s website, documented “abundant cracking and spalling in various degrees” in concrete columns. Spalling is a term used to describe concrete degraded by crumbling or cracks.\r\n\r\nBut if the present building codes and the inspections they require failed to prevent this failure, how will residents of the oceanfront high-rises that dot the coast be protected in the coming decades—when at least two feet of sea-level rise could dramatically eat away the beaches where towers now stand, increase the magnitude of storm surges, and spread salt-water intrusion further inland, worsening its corrosive effects?\r\n\r\nWith the accelerated melting of ice sheets in Antarctica and Greenland in the next decade, Wanless thinks two feet of sea-level rise could occur sooner than current projections. NOAA’s intermediate high for 2070 is 40 inches.\r\n\r\n', 'tes', 'tst', 16, '2021-07-21 10:36:10'),
(8, 'What is a heat dome? Pacific Northwest swelters in record temperatures.', 'In a swath that stretches across the Pacific Northwest, 13 million people are sweltering under an extreme heat wave that has shattered records in Portland and Seattle, boosting temperatures in both cities well above 100 degrees Fahrenheit over the weekend and into this week. \r\n\r\nA “heat dome” trapping the heat wave over the region has sent many without home air conditioning to emergency shelters to keep safe from the intense heat, which can be deadly. The heat is expected to persist into mid-week.\r\n\r\nWashington state\'s King County, which includes Seattle, recently released a heat map showing less affluent neighborhoods, where tree cover is low, experience the dangerous effects of heat more acutely than their more affluent counterparts. As climate change makes extreme heat waves more likely in the future, it’s a dangerous health risk cities must contend with.\r\n\r\nDan Douthit, the public information officer for the Portland Bureau of Emergency Management, says: “As a city we’re actively concerned about [climate change].” In addition to heat, he says they also face climate change in the form of wildfires, which last year briefly made Portland the city with the world’s worst air quality. \r\n\r\nWhat is a heat dome?\r\nA heat dome is effectively what it sounds like—an area of high pressure that parks over a region like a lid on a pot, trapping heat. Research from the National Oceanic and Atmospheric Administration (NOAA) shows they are more likely to form during La Niña years like 2021, when waters are cool in the eastern Pacific and warm in the western Pacific. That temperature difference creates winds that blow dense, tropical, western air eastward. Eventually that warm air gets trapped in the jet stream—a current of air spinning counterclockwise around the globe—and ends up on the U.S. West Coast.\r\n\r\n“When you get high pressure over the West, it keeps that warm air over the West,” says Andrea Bair, the climate services program manager for the National Weather Service’s western region.\r\n\r\n\r\n“A heat dome is basically that trapping dome. The heat event itself is the heat wave, lasting several consecutive days and nights that are well above normal,” she notes, adding that the heat dome helps sustain the heat wave.\r\n\r\nBair says it’s common for areas of high pressure to sit over the West during both winter and summer months, but “It is unusual to have heat events this early.” \r\n\r\nA few weeks ago, a heat dome created extremely hot conditions for the Southwest, breaking temperature records. It reached 123°F in Palm Springs and Las Vegas saw a record high of 114°F.\r\n\r\n“It’s the same high-pressure pattern we’ve had parked over the West; it just kind of moves north and south or east and west. It moves and strengthens and weakens,” says Bair.\r\n\r\nThis heat wave over the Northwest is expected to taper off over the coming days, but, “then as we get toward the Fourth of July, right now models are indicating another spell of heat wave,” says Bair.', 'tes', 'tst', 16, '2021-07-21 10:36:34'),
(9, 'Why ‘tiny forests’ are popping up in big cities', 'It’s a warm June afternoon, and in a thicket of elm and willow trees, a magpie chatters. A beetle crawls over a leaf. The forest, next to an 18-story building and a train line, is about the size of a nearby basketball court; before it was planted in 2018, the area was a parking lot.\r\n\r\nThe Muziekplein forest is one of seven such ultra-small forests in the Dutch city of Utrecht, and 144 across the Netherlands. By the end of this year, according to IVN Nature Education, the organization leading the country’s initiative, there will be 200.\r\n\r\nIn Europe, India, and other countries, communities are creating small-footprint, native forests as hyperlocal responses to large-scale environmental challenges. The forests attract biodiversity, including insects and new plant species, data released in April shows. And while even proponents say they won’t solve climate change by themselves, research shows these small patches of nature can contribute to carbon sequestration and help cities adapt to rising temperatures.\r\n\r\nSince the first forest was planted in the Netherlands in 2015, the concept has become popular among both municipalities and private landowners. Daan Bleichrodt, who launched IVN’s Tiny Forest initiative with the goal of making nature more accessible to children, said he thinks they are popular because people are becoming more aware of major environmental challenges.\r\n\r\n“We basically made a mess of the world and a lot of people want to do something, but they don\'t know: ‘What can I do?’” he said. The forests can be built in under a year. “It\'s a very practical way to do something positive in light of climate change and loss of biodiversity.”\r\n\r\nThe Miyawaki Method\r\nThe small-footprint projects are based on the work of Japanese botanist Akira Miyawaki, who, beginning in the 1970s, pioneered a method of planting young indigenous species close together to quickly regenerate forests on degraded land. Miyawaki, who extensively studied and catalogued the vegetation of Japan, surveyed forests near potential Tiny Forest sites for a mixture of their main species. “The planting should center on the primary trees of the location, and following the laws of the natural forest,” he wrote in a 2006 essay upon accepting the Blue Planet award.\r\n\r\n\r\nCompeting for light, the saplings grow quickly, explained Miyawaki’s collaborator Kazue Fujiwara. According to Fujiwara, the method can work anywhere, even in plots as small as one meter wide, though she said a minimum of three meters is easier to plant a mix of species. “Where people want natural forest for protecting life, people can use the Miyawaki method.”\r\n\r\nThe method was popularized by Shubhendu Sharma, who learned about Miyawaki’s forest creation technique when, in 2009, the botanist created a forest at the Toyota factory in India where Sharma worked as an engineer.\r\n\r\nInspired by the forest’s rapid growth, Sharma started a company to create similar forests, researching the method and trying it in his own backyard. He described his work in a 2014 TED Talk, and released his version of the instructions so anyone could learn how to create their own small native forest.\r\n\r\nSince then, the idea has gained popularity worldwide. Sharma’s company, Afforestt, has helped plant forests in 44 cities. Organizations are planting similar forests in Belgium, France, and the United Kingdom. Cities in Asia are embracing Miyawaki-style urban forests, with politicians in Pakistan and India outlining ambitions to plant many more In February, Pakistani Prime Minister Imran Khan announced plans for 50 Miyawaki forests in Lahore, and in Chennai, India, officials set a target to plant 1,000.', 'tes', 'tst', 16, '2021-07-21 10:37:02'),
(10, 'Savor the diverse flavors of Texas\r\nExperience the natural bounty and cultural diversity of Texas on a mouth-watering culinary tour of the state.', 'The evolving story of Texas is told through its food. Inventive and locally sourced, Texas cuisine is a delectable explosion of flavors embodying the state’s diverse cultural mix and rich Western heritage. Sample uniquely Texan fusion fare across the state at places like Houston’s Vietnamese-Cajun Crawfish + Noodles and Austin’s Asian-inspired smokehouse, Loro, the culinary collaboration of James Beard Award-winning chefs Tyson Cole of Uchi and Aaron Franklin of Franklin Barbecue. \r\n\r\nSimilar partnerships between restaurants and local farmers, ranchers, and other Texas-based producers bring a bounty of fresh, seasonal ingredients to restaurants and mobile kitchens, such as Valentina’s Tex Mex BBQ of the red-hot Austin food truck scene. Here’s a quick taste of the diverse menu you can dig into on a mouth-watering tour of Texas cuisine.\r\n\r\nLiberty Bar, San Antonio\r\nLiberty Bar is unmistakably San Antonian. The quirky restaurant’s King William Historic District location has deep-rooted connections to the Alamo (the district formerly included farmland belonging to the mission). The cotton candy-pink Liberty Bar building, which dates back to 1883, once housed the Saint Scholastica Convent, whose Benedictine Sisters first came to Texas in 1919. And standard restaurant fare, such as grilled chicken and pepperoni pizza, get a flavorful San Antonio makeover thanks to locally sourced ingredients like cage-free meats, spiced and peppery achiote (annatto seeds), chile morita (smoked jalapeño) sauce, and roasted garlic.\r\n\r\n\r\nGeneral manager Craig Goldschmidt mixes a specialty cocktail and owner Dwight Hobart pours tea at Liberty Bar, a Southtown San Antonio restaurant and bar housed in a former convent.\r\n\r\nAdding to the local charm are the homemade breads, pastries, and pastas, and comfortably worn wood chairs, tables, and floors—all of which evoke the feeling of home. Reserve one of the tables for weekend brunch (Saturdays and Sundays, 11 a.m. to 2 p.m.) to try their distinctive twist on French toast: Liberty Bar Pain Perdu. The decadent dish of gooey goodness begins with a house-made sourdough potato boule that’s soaked in custard batter for 48 hours before toasting on the griddle.\r\n\r\n\r\n\r\nComfortably worn wood tables, eclectic furnishings, and the aroma of fresh-baked breads evoke a welcoming, homey vibe at San Antonio’s Liberty Bar.\r\n\r\nXin Chao, Houston\r\nNo wonder Houston’s culinary scene is a smorgasbord of globally inspired tastes: more than 145 different languages are spoken in the city, which perennially ranks among the nation’s most diverse. The concentration of cultures is reflected in the area’s more than 10,000 restaurants, whose numbers include inventive cultural mashups like Xin Chao. The Texas-meets-modern Vietnamese restaurant (the name means “hello” in Vietnamese) was founded by two Houston culinary stars: Christine Ha, the first-ever blind contestant to win MasterChef, and Saigon House award-winning chef Tony Nguyen.', 'estt', 'stst', 16, '2021-07-21 10:39:12'),
(11, 'These are the world’s most beautiful museums', 'When Frank Lloyd Wright’s swirling, curling concrete Guggenheim Museum opened in New York City in 1959, naysayers disparaged it as “Wright’s Washing Machine” and claimed it looked like a giant sweet roll. The museum was, wrote one New York Times critic, “a war between architecture and painting in which both come out badly maimed.” \r\n\r\nWright’s now-iconic, nautilus-like curl was the first of many modern museums designed to captivate (and lure in) visitors with their exteriors as well as their collections. “In the past, museums were made to recall Greek temples and structures like the Pantheon in Rome,” says Patricio del Real, a professor of architecture and history at Harvard University. But these structures could be austere, intimidating, and overtly Eurocentric, so, says Del Real, “As society became more pluralistic, people began to demand different representations, and museum forms and imagery had to change.” \r\n\r\nThat meant goodbye Roman columns, hello revolutionary elements like the laser-cut aluminum lattices on architect David Adjaye’s National Museum of African American History and Culture in Washington, D.C. or a planetarium formed from a floating sphere at the just-opened Shanghai Astronomical Museum. At the latter, architect Thomas J. Wong says he envisioned “giving the building the real astronomical motion of the earth orbiting the sun, which means walking through the museum is almost a teaching tool.” \r\n\r\nMany experts attribute this 21st-century building boom of striking showplaces to the “Bilbao effect,” as in the Guggenheim Museum Bilbao. When it opened in 1997, the museum put the northern Spanish city on the contemporary art map via Frank Gehry’s voluptuous glass curves and gleaming facade. \r\n\r\nPlanners and curators realized a flashy, design-forward museum could transform a city’s skyline—and its tourist appeal—the way the Eiffel Tower or the Empire State Building did generations before. “People want a sense that visiting a museum can be exciting and memorable,” says Wong. “A beautiful exterior helps convey that.” Come for the selfie-taking op outside, stay for the paintings or artifacts inside. \r\n\r\n\r\nNewer museums with astounding architecture are boosted by technological innovations including 3D modeling and parametric construction (key to the United Arab Emirates’ fiberglass-and-steel, lopsided hula hoop-esque Museum of the Future) and ever-stronger, ever-more refined materials and tools (laser-guided saws, tissue-thin exterior fiberglass). At the V&A Dundee, Japanese architect Kenzo Kuma used an innovative, river-sluicing dam and planks of precisely cast concrete to create a ship-like showplace on the Scottish city’s waterfront. \r\n\r\n“What these architects have in common is this need to mobilize tourists by creating an iconic building,” says Del Real. “They are aiming for spaces the city can feel proud of and embrace.” These 14 museums are worth seeing for both their exterior design and the treasures and knowledge within.', 'test', 'test', 16, '2021-07-21 10:37:57'),
(12, 'Why is this totem pole traveling across America?', 'Indigenous people along North America’s Pacific Northwest coast have been carving and erecting totem poles for hundreds of years. But the poles—long used to commemorate ancestry, relay cultural values, or tell stories—rarely go on road trips. \r\n\r\nThat’s what happening this summer, as a 25-foot-long, 4,900-pound length of cedar travels from Washington State to Washington, D.C., aboard a jumbo tractor-trailer. Created by the Lummi people, who live near Bellingham, Washington, the richly decorated pole is meant to raise awareness about Indigenous issues and the need to protect sacred sites. \r\n\r\nThe two-week tour, dubbed the Red Road to D.C., will stop at endangered Indigenous sites including the Bears Ears National Monument in Utah and the Standing Rock Reservation in the Dakotas. The totem pole will arrive in D.C. on July 29 and will be displayed in front of the Smithsonian Institution’s National Museum of the American Indian (NMAI) for two days; organizers hope to attract the attention of President Joseph Biden and find a permanent home for it in the nation’s capital.\r\n\r\nAlong the way, a team of about a dozen volunteers traveling with the pole will facilitate education sessions, blessings, and other outreach activities. “The pole is an active use of art,” says Jewell Se Sealth James, a Lummi master carver who helped to create it. “Not only do people come out to see it, we travel to them. It’s not to just entertain but to make you aware.”\r\n\r\nTotem pole diplomacy like this is a relatively new phenomenon: the Lummi House of Tears Carvers, of which James the co-founder, has only been making poles and taking them on tour for about 30 years. The group brought a pole to New York City just after the September 11, 2001, terrorist attacks as a sign of mourning and solidarity. But totem poles, and the symbolism and cultural richness they represent, have impressed people, both Indigenous and not, for generations. Here’s why.', 'test', 'test', 16, '2021-07-21 10:38:23'),
(13, 'These 12 stunning bridges are engineering marvels', 'Road trippers this summer may discover that epic bridges are also a journey in themselves—a chance to spot bottlenose dolphins and peregrine falcons, an opportunity to see a destination from a new, bird’s-eye perspective.\r\n\r\nAs a child growing up on the Eastern Shore of Maryland, crossing a big bridge meant entering a portal to a new world. The majestic, dual-span Chesapeake Bay Bridge and the 23-mile-long Chesapeake Bay Bridge Tunnel were our two main routes off of the rural shore toward “real cities” and airports with more than two gates. \r\n\r\nBridges all around the world, from West Virginia’s New River Gorge to Peru’s Q’eswachaka give every traveler an opportunity to connect and explore. In fact, this year, the Q’eswachaka quite literally brought communities together to rebuild a time-honored bridge that had collapsed from pandemic-caused neglect.\r\n\r\nWhether you’re a thrill seeker or a nature lover, we’ve got a bridge for you. Here are 12 spans we just can’t get over.\r\n\r\nInca Rope Bridge: Apurimac River, Peru\r\nWoven bridge\r\nEach year the Q\'eswachaka is untied and woven anew by local bridge builders.\r\nPHOTOGRAPH BY WIGBERT RÖTH, GETTY IMAGES\r\n\r\nFor 500 years, a hand-woven suspension bridge has spanned 92 feet across the Apurimac canyon. Called Q’eswachaka, the bridge is rebuilt every year in a ritual where locals untie the existing bridge and weave a new one out of local ishu grass. The ancient bridge-building ceremony is then celebrated with traditional song and dance.\r\n\r\nThe annual reweaving was canceled in 2020, due to the pandemic, causing the bridge—one of the last surviving Inca rope bridges—to collapse from disrepair. But community members were able to gather once more in June 2021 to rebuild the bridge that has connected communities divided by the Apurimac river for centuries.\r\n\r\nJet-setting north of the equator? Spot puffins and sharks from Ireland’s 100-foot-high Carrick-a-Rede Rope Bridge—first constructed by salmon fishermen in 1755. If that’s not high enough, take a drive across France’s Millau Viaduct or China’s record-setting Beipanjiang Bridge—a whopping 1,854 feet above the Beipan River.\r\n\r\nDie Rakotzbrücke: Kromlau Park, Kromlau, Germany\r\n\r\n\r\n0:12\r\n\r\nThe Rakotzbrücke is a “devil’s bridge,” a type of ancient European bridge so precarious that locals believe the devil built them, in exchange for a person’s soul.\r\n\r\nCommissioned by Friedrich Hermann Rötschke in 1860, Rakotzbrücke’s perfect parabola and basalt spires make it a legendary “devil’s bridge.” According to Rakotzbrücke’s myth, the builder crossed the finished bridge, sacrificing himself in exchange for the devil’s help. A great time to visit is during the spring rhododendron bloom; for great views board the Muskau Forest Railway.\r\n\r\nDevil’s bridges are a thing. You can visit others in Switzerland, Bulgaria, Italy, Wales, France, England, Spain, and Arizona.\r\n\r\nLiving Root Bridge: Nongriat, India\r\nthe Ritymmen bridge in Meghalaya, India\r\nThe name gives it all away: The Living Root Bridge is made from grounded tree roots, which prevent the bridge from being washed away by floods.\r\nPHOTOGRAPH BY ALEX TREADWAY, NAT GEO IMAGE COLLECTION\r\nNongriat, India, is one of the world’s wettest places—a jungle of waterfalls, beehives, and betel nut trees. For hundreds of years local Khasi have dealt with seasonal river surges by weaving living footbridges out of Indian rubber tree roots. Umshiang, a double-decker (soon to be triple-decker) root bridge is expected to survive several hundred years and can support the weight of 50 people at once.\r\n\r\n', 'test', 'test', 16, '2021-07-21 10:38:39'),
(16, 'New summer could change our understanding of extreme heat', 'New Heat wave that scorched the Pacific Northwestern United States in late June rewrote the record books in ways that were both shocking and difficult to comprehend. Scientists are unsure how best to explain the temperatures, so extreme compared with what meteorologists expect to see in that typically cool, wet region of the world.\n\nIn Seattle, Washington, temperatures hit 108 degrees Fahrenheit, 9 degrees hotter than it’s ever been in steamy Tampa, Florida. Portland, Oregon’s 116°F eclipsed Dallas, Texas’s heat record by 3 degrees. Hundreds of miles north of Portland, the British Columbia village of Lytton set a new temperature record for Canada—a Death Valley-like 121 degrees. The next day, the town was engulfed and largely destroyed by a wildfire.\n\nIt’s possible the Pacific Northwest simply experienced a very unlucky combination of weather and climate change. But in recent days, some researchers have begun to consider an alternative explanation: Perhaps climate change has set in motion new, as yet poorly understood, processes that are making heat waves that once seemed statistically impossible far more likely.\n\nMore work needs to be done to determine if that hypothesis is correct and if so, what the underlying mechanisms are. But if climate feedbacks beyond the warming of the atmosphere have loaded the meteorological dice in favor of events like the Pacific Northwest heat wave, the consequences for human life could be profound, considering that extreme heat is one of the deadliest forms of extreme weather.\n\nIn British Columbia, officials reported nearly 500 “sudden and unexpected deaths” around the time of the heat wave. On Friday, the U.S. Centers for Disease Control reported that from June 25-30, hospitals in the Northwest saw nearly 3,000 heat-related visits.\n\nThat’s why the scientists who proposed this idea are racing to find answers.', 'Arjun', 'Das', 16, '2021-07-27 11:15:09'),
(17, 'This summer could change our understanding of extreme heat', 'The heat wave that scorched the Pacific Northwestern United States in late June rewrote the record books in ways that were both shocking and difficult to comprehend. Scientists are unsure how best to explain the temperatures, so extreme compared with what meteorologists expect to see in that typically cool, wet region of the world.\n\nIn Seattle, Washington, temperatures hit 108 degrees Fahrenheit, 9 degrees hotter than it’s ever been in steamy Tampa, Florida. Portland, Oregon’s 116°F eclipsed Dallas, Texas’s heat record by 3 degrees. Hundreds of miles north of Portland, the British Columbia village of Lytton set a new temperature record for Canada—a Death Valley-like 121 degrees. The next day, the town was engulfed and largely destroyed by a wildfire.\n\nIt’s possible the Pacific Northwest simply experienced a very unlucky combination of weather and climate change. But in recent days, some researchers have begun to consider an alternative explanation: Perhaps climate change has set in motion new, as yet poorly understood, processes that are making heat waves that once seemed statistically impossible far more likely.\n\nMore work needs to be done to determine if that hypothesis is correct and if so, what the underlying mechanisms are. But if climate feedbacks beyond the warming of the atmosphere have loaded the meteorological dice in favor of events like the Pacific Northwest heat wave, the consequences for human life could be profound, considering that extreme heat is one of the deadliest forms of extreme weather.\n\nIn British Columbia, officials reported nearly 500 “sudden and unexpected deaths” around the time of the heat wave. On Friday, the U.S. Centers for Disease Control reported that from June 25-30, hospitals in the Northwest saw nearly 3,000 heat-related visits.\n\nThat’s why the scientists who proposed this idea are racing to find answers.', 'test', 'test', 16, '2021-07-27 10:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_category` int(11) NOT NULL,
  `production_location` int(11) NOT NULL,
  `is_processed_product` tinyint(1) NOT NULL,
  `is_available` tinyint(1) NOT NULL,
  `price_per_unit` float NOT NULL,
  `quantity_of_price` float NOT NULL,
  `unit` int(11) NOT NULL,
  `product_rating` float DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `producer_id`, `product_name`, `product_description`, `product_category`, `production_location`, `is_processed_product`, `is_available`, `price_per_unit`, `quantity_of_price`, `unit`, `product_rating`, `created_date`) VALUES
(114, 16, 'Carrots', 'Bio Carrot, orange long shaped carrot with vitamins A, especially beneficial for eye shights.\r\nAn organic farming product, certified by BIO', 2, 18, 1, 1, 2.5, 2, 1, 0, '2021-03-23 11:09:58'),
(116, 16, 'test 5', 'test', 2, 18, 1, 1, 14, 10, 3, 0, '2021-03-23 11:14:20'),
(117, 16, 'test 6', 'tets', 3, 18, 1, 1, 12, 3, 2, 0, '2021-03-23 11:17:45'),
(118, 16, '\"Gala\" Apples', 'Fresh Organic Apples – 1kg bag Various varieties from all over the world where the best are in season, & of course locally to us when available ~ Class 2\r\n\r\n', 5, 20, 1, 1, 4.69, 2, 1, 0, '2021-03-23 11:23:59'),
(119, 16, 'Avocado Hass ~ Organic', 'Fresh Organic Avocado Hass ~ Grown in Peru~ Class 1', 5, 22, 1, 1, 2.99, 10, 1, 0, '2021-03-23 11:25:23'),
(121, 16, 'Carrots', 'Bio Carrot, orange long shaped carrot with vitamins A, especially beneficial for eye shights.\r\nAn organic farming product, certified by BIO Hellas, Inspection and Certification Body for organic products.', 1, 15, 1, 1, 2.5, 1, 1, 0, '2021-03-24 14:03:28'),
(122, 16, 'test 14', 'test', 2, 20, 1, 1, 11, 4, 2, 0, '2021-03-24 14:05:26'),
(123, 16, 'test 15', 'test', 1, 20, 1, 1, 455, 2, 1, 0, '2021-03-24 14:27:56'),
(124, 16, 'Salad Box', 'An organic salad box for all seasons. An example box contains: Avocado / Watercress / Tomatoes on the Vine / Cucumber / Lettuce / Onions Spring / Radish / Salad Pack / Celery / Ramero Pepper / Potatoes.', 2, 21, 1, 1, 10.99, 3, 1, 0, '2021-03-24 14:37:19'),
(129, 16, 'test', 'test', 2, 21, 1, 1, 45, 15, 2, 0, '2021-04-07 09:23:42'),
(130, 16, 'TEST', 'test', 3, 18, 1, 1, 11, 2, 2, 0, '2021-04-07 10:20:08'),
(131, 16, 'test', 'test', 2, 21, 1, 1, 11, 4, 3, 0, '2021-04-07 11:05:23'),
(132, 16, 'test', 'test', 4, 21, 1, 1, 11, 4, 4, 0, '2021-04-07 11:08:37'),
(133, 16, 'test', 'test', 3, 18, 1, 1, 11, 4, 3, 0, '2021-04-07 11:12:35'),
(134, 16, 'test', 'test', 2, 15, 1, 1, 11, 4, 2, 0, '2021-04-08 12:19:22'),
(135, 16, 'test', 'test', 2, 15, 1, 1, 11, 4, 2, 0, '2021-04-08 12:20:38'),
(136, 16, 'test image', 'image', 4, 20, 1, 1, 11, 2, 2, 0, '2021-04-08 15:56:29'),
(137, 16, 'image 2', 'image', 2, 15, 1, 1, 151, 4, 2, 0, '2021-04-08 16:01:44'),
(138, 16, 'image 3', 'img', 2, 20, 1, 1, 151, 2, 2, 0, '2021-04-08 16:04:18'),
(139, 16, 'image 3', 'img', 2, 20, 1, 1, 11, 4, 2, 0, '2021-04-08 16:08:03'),
(140, 16, 'image 4', 'img', 2, 20, 1, 1, 11, 4, 2, 0, '2021-04-08 16:11:52'),
(141, 16, 'image 5', 'test', 2, 18, 1, 1, 151, 4, 3, 0, '2021-04-08 16:13:14'),
(142, 16, 'image 6', 'test', 3, 20, 1, 1, 11, 2, 2, 0, '2021-04-08 16:17:04'),
(143, 16, 'image 7', 'test', 2, 15, 1, 1, 151, 2, 2, 0, '2021-04-08 16:20:32'),
(144, 16, 'image 8', 'test', 2, 21, 1, 1, 11, 4, 2, 0, '2021-04-08 16:24:25'),
(145, 16, 'image 8', 'tets', 3, 20, 1, 1, 11, 2, 2, 0, '2021-04-08 16:27:15'),
(146, 16, 'image 10', 'test', 2, 21, 1, 1, 11, 2, 1, 0, '2021-04-08 16:28:28'),
(147, 16, 'image 11', 'tsts', 2, 21, 1, 1, 11, 2, 1, 0, '2021-04-08 16:37:25'),
(148, 16, 'image 12', 'test', 4, 20, 1, 1, 11, 4, 2, 0, '2021-04-08 16:38:12'),
(149, 16, 'image 13', 'test', 3, 15, 1, 1, 151, 4, 3, 0, '2021-04-08 16:39:17'),
(150, 16, 'image 20', 'test', 3, 15, 1, 1, 11, 4, 2, 0, '2021-04-09 13:47:35'),
(151, 16, 'image 21', 'test', 3, 20, 1, 1, 11, 2, 2, 0, '2021-04-09 13:52:13'),
(152, 16, 'test 2585', 'test', 2, 18, 1, 1, 11, 1, 2, 0, '2021-04-10 07:29:21'),
(153, 16, 'image 21', 'test', 5, 20, 1, 1, 11, 1, 2, 0, '2021-04-11 09:03:08'),
(154, 16, 'test 1000', 'test', 2, 32, 1, 1, 11, 0, 2, 0, '2021-04-14 08:21:58'),
(155, 95, 'test product', 'test desc', 2, 42, 1, 1, 1.56, 1, 1, 0, '2021-11-18 16:05:19'),
(156, 95, 'test  5', 'test', 2, 42, 1, 1, 11, 1, 1, 0, '2021-11-18 16:23:25'),
(157, 95, 'test pro 3', 'test', 2, 42, 1, 1, 3, 1, 2, 0, '2021-11-18 16:25:44'),
(158, 95, 'image 21', 'tet', 2, 42, 1, 1, 151, 2, 2, 0, '2021-11-18 16:26:57'),
(159, 95, 'test', 'test', 2, 42, 1, 1, 151, 1, 1, 0, '2021-11-18 16:32:44'),
(160, 95, 'test', 'test', 2, 42, 1, 1, 151, 1, 2, 0, '2021-11-18 16:34:41'),
(161, 95, 'test', 'test 3', 1, 42, 1, 1, 6, 6, 1, 0, '2021-11-19 14:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `category_name_de` varchar(100) NOT NULL,
  `category_description` text DEFAULT NULL,
  `image_name` text NOT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `category_name_de`, `category_description`, `image_name`, `image_path`) VALUES
(1, 'Vegetable', 'Gemüse', 'Vegetable', 'vegetables.png', ''),
(2, 'Vegetable Product', 'Gemüseerzeugnisse', 'Vegetable Product', 'vegetable_product.png', ''),
(3, 'Mushrooms', 'Pilze', 'Mushrooms', 'mushrooms.png', ''),
(4, 'Herbs, Tea and Spices', 'Kräuter, Tee und Gewürze', 'Herbs, Tea and Spices', 'herbs_spices.png', ''),
(5, 'Fruit', 'Obst', 'Fruit', 'fruit.png', ''),
(6, 'Fruit Products', 'Obsterzeugnisse', 'Fruit Products', 'fruit_products.png', ''),
(7, 'Nuts', 'Nüsse', 'Nuts', 'nuts.png', ''),
(8, 'Honey', 'Honig', 'honey', 'honey.png', ''),
(9, 'Juice and Beverages', 'Saft und Getränke', 'juice and beverages', 'beverages.png', ''),
(10, 'Corn', 'Getreide', 'corn', 'corn.png', ''),
(11, 'Potatoes & Root Crops', 'Kartoffeln & Hackfrüchte', 'Potatoes & Root Crops', 'potatoes.png', ''),
(12, 'Bread and Baked Products', 'Brot und Backwaren', 'Bread and Baked Products', 'baked_products.png', ''),
(13, 'Sweets', 'Süßwaren', 'sweets', 'sweets.png', ''),
(14, 'Confectionery Products', 'Konditorprodukte', 'confectionery products', 'confectionery_products.png', ''),
(15, 'Milk, Cheese & Other Dairy Products', 'Milch, Käse & andere Molkereiprodukte', 'milk, cheese & other dairy products', 'milk.png', ''),
(16, 'Eggs', 'Eier', 'eggs', 'eggs.png', ''),
(17, 'Meat and Sausage Products', 'Fleisch- und Wurstwaren', 'meat and sausage products', 'meat.png', ''),
(18, 'Fish, Shellfish & Seafood', 'Fisch, Krebse und Meeresfrüchte', 'fish, shellfish & seafood', 'fish.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE `product_feature` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `feature_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_feature`
--

INSERT INTO `product_feature` (`id`, `product_id`, `feature_type`) VALUES
(176, 114, 1),
(177, 114, 2),
(178, 114, 3),
(189, 116, 1),
(190, 116, 2),
(191, 116, 4),
(192, 116, 8),
(193, 116, 12),
(194, 116, 13),
(195, 117, 1),
(196, 117, 2),
(197, 117, 3),
(198, 117, 4),
(199, 117, 8),
(200, 117, 9),
(201, 117, 10),
(207, 118, 9),
(208, 119, 1),
(215, 119, 13),
(219, 121, 1),
(220, 121, 2),
(221, 121, 3),
(222, 122, 2),
(223, 122, 4),
(224, 122, 9),
(225, 122, 13),
(226, 123, 1),
(227, 123, 3),
(228, 123, 4),
(229, 123, 9),
(230, 123, 10),
(231, 123, 11),
(232, 123, 13),
(233, 124, 1),
(234, 124, 3),
(235, 124, 9),
(236, 124, 13),
(237, 124, 14),
(254, 129, 1),
(255, 129, 3),
(256, 129, 4),
(257, 129, 8),
(258, 129, 9),
(259, 129, 10),
(260, 129, 11),
(261, 129, 12),
(262, 129, 13),
(263, 129, 14),
(264, 129, 15),
(265, 130, 2),
(266, 131, 1),
(267, 132, 2),
(268, 133, 3),
(269, 136, 1),
(270, 137, 4),
(271, 138, 2),
(272, 139, 2),
(273, 140, 2),
(274, 141, 2),
(275, 142, 2),
(276, 143, 3),
(277, 144, 3),
(278, 145, 2),
(279, 146, 2),
(280, 147, 1),
(281, 148, 2),
(282, 149, 2),
(283, 150, 2),
(284, 151, 3),
(285, 152, 2),
(286, 153, 2),
(287, 154, 2),
(288, 155, 3),
(289, 156, 2),
(290, 157, 2),
(291, 158, 2),
(292, 159, 1),
(293, 160, 2),
(294, 161, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_sellers`
--

CREATE TABLE `product_sellers` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sellers`
--

INSERT INTO `product_sellers` (`id`, `product_id`, `seller_id`) VALUES
(1, 118, 1),
(3, 119, 1),
(5, 121, 1),
(31, 124, 3),
(32, 124, 1),
(46, 123, 28),
(47, 123, 24),
(48, 129, 12),
(49, 129, 11),
(50, 130, 1),
(51, 131, 1),
(52, 132, 1),
(53, 133, 1),
(56, 136, 1),
(57, 137, 1),
(58, 138, 1),
(59, 139, 1),
(64, 144, 1),
(66, 146, 1),
(67, 147, 1),
(68, 148, 1),
(70, 150, 1),
(71, 151, 1),
(72, 152, 1),
(73, 153, 3),
(74, 154, 1),
(75, 155, 5),
(76, 156, 5),
(77, 157, 5),
(78, 158, 5),
(79, 159, 5),
(80, 160, 5),
(81, 161, 50);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `seller_name` varchar(120) NOT NULL,
  `seller_description` text NOT NULL,
  `street` varchar(50) NOT NULL,
  `building_number` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `seller_location` point NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_website` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `is_mon_available` tinyint(1) NOT NULL,
  `mon_open_time` time NOT NULL,
  `mon_close_time` time NOT NULL,
  `is_tue_available` tinyint(1) NOT NULL,
  `tue_open_time` time NOT NULL,
  `tue_close_time` time NOT NULL,
  `is_wed_available` tinyint(1) NOT NULL,
  `wed_open_time` time NOT NULL,
  `wed_close_time` time NOT NULL,
  `is_thu_available` tinyint(1) NOT NULL,
  `thu_open_time` time NOT NULL,
  `thu_close_time` time NOT NULL,
  `is_fri_available` tinyint(1) NOT NULL,
  `fri_open_time` time NOT NULL,
  `fri_close_time` time NOT NULL,
  `is_sat_available` tinyint(1) NOT NULL,
  `sat_open_time` time NOT NULL,
  `sat_close_time` time NOT NULL,
  `is_sun_available` tinyint(1) NOT NULL,
  `sun_open_time` time NOT NULL,
  `sun_close_time` year(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `producer_id`, `seller_name`, `seller_description`, `street`, `building_number`, `city`, `zip`, `seller_location`, `seller_email`, `seller_website`, `mobile`, `phone`, `is_blocked`, `is_mon_available`, `mon_open_time`, `mon_close_time`, `is_tue_available`, `tue_open_time`, `tue_close_time`, `is_wed_available`, `wed_open_time`, `wed_close_time`, `is_thu_available`, `thu_open_time`, `thu_close_time`, `is_fri_available`, `fri_open_time`, `fri_close_time`, `is_sat_available`, `sat_open_time`, `sat_close_time`, `is_sun_available`, `sun_open_time`, `sun_close_time`, `created_date`) VALUES
(1, 16, 'Bio Store NB', 'Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation, and narration. In practice it would be difficult to write literature that drew on just one of the four basic modes.', 'Josef-Alterdinger-Straße', '25', 'Neubrandenburg', '17033', 0x0000000001010000003cb85adacbc74a4041205244a76d2a40, 'biostore@testmail.com', 'http://www.biostore.co.in', '017630123456', '01255123456', 0, 0, '08:30:00', '10:30:00', 0, '10:00:00', '11:30:00', 0, '12:30:00', '12:30:00', 0, '08:00:00', '09:30:00', 0, '08:30:00', '08:30:00', 0, '08:33:00', '08:30:00', 0, '08:30:00', 2008, '2021-03-11 15:34:26'),
(3, 16, 'New Point', 'test', 'Goethestraße', '2', 'Neubrandenburg', '17033', 0x00000000010100000049d4a822e6c64a40467b95492c822a40, 'New Point', 'www.test.com', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '10:00:00', '11:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:13:50'),
(5, 16, 'point 3', 'test', 'Große Wollweberstraße', '34', 'Neubrandenburg', '17033', 0x000000000101000000c077676c17c74a40d548eb51c4822a40, 'point 3', 'www.test.com', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:21:00'),
(6, 16, 'New Point 254', 'test', '2.Werderstraße', '5', 'Neubrandenburg', '17033', 0x000000000101000000ae931c8d07c74a4061fdba25a5812a40, 'New Point 254', 'www.test.com', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:23:34'),
(7, 16, 'New Point 023', 'test', 'Weidenweg', '8', 'Neubrandenburg', '17033', 0x00000000010100000053e6a1a4a6c64a40615c0de63a892a40, 'New Point 023', 'www.test.com', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:52:09'),
(8, 16, 'fr', 'tes', 'Mühlenstraße', '9a', 'undefined', '17039', 0x0000000001010000008c7cf98c41c64a40e609fe1f4d562a40, 'fr', '', '', '', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:58:07'),
(9, 16, 'New Point 789', 'test', 'Am Oberbach', '14', 'Neubrandenburg', '17033', 0x0000000001010000004a0091d1ecc64a401d54b392f37f2a40, 'New Point 789', 'www.test.com', '1234567890', '0000012345', 0, 1, '08:30:00', '08:30:00', 1, '10:00:00', '11:30:00', 1, '15:00:00', '17:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:59:02'),
(10, 16, 'New Point 3', '', 'Binsenwerder', '2', 'Neubrandenburg', '17033', 0x0000000001010000003da503c8ddc64a4060941bfeb37e2a40, 'New Point 3', '', '', '', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 14:59:38'),
(11, 16, 'Bio Store NB r', 'test', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x0000000001010000006bf29b49e0c64a400cb6d5b1777f2a40, 'Bio Store NB r', '', '', '', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:00:29'),
(12, 16, 'bestf', 'test', 'Brodaer Straße', 'WH 2', 'Neubrandenburg', '17033', 0x000000000101000000df26d2c4d8c64a4012706bf77a7e2a40, 'bestf', '', '1234567890', '', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:02:06'),
(13, 16, 'bestf', 'test', 'Brodaer Straße', 'WH 2', 'Neubrandenburg', '17033', 0x000000000101000000df26d2c4d8c64a4012706bf77a7e2a40, 'bestf', '', '1234567890', '0000012345', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:02:20'),
(14, 16, 'bestf', 'test', 'Brodaer Straße', 'WH 2', 'Neubrandenburg', '17033', 0x000000000101000000df26d2c4d8c64a4012706bf77a7e2a40, 'bestf', '', '1234567890', '0000012345', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:02:28'),
(15, 16, 'bestf', 'test', 'Brodaer Straße', 'WH 2', 'Neubrandenburg', '17033', 0x000000000101000000df26d2c4d8c64a4012706bf77a7e2a40, 'bestf', 'www.test.com', '1234567890', '0000012345', 0, 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:02:38'),
(16, 16, 'New Point', 'test', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x00000000010100000049d4a822e6c64a4076c54a1c9f7f2a40, 'New Point', '', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:03:13'),
(17, 16, 'New Point', 'test', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x00000000010100000049d4a822e6c64a4076c54a1c9f7f2a40, 'New Point', '', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', 0000, '2021-03-15 15:03:33'),
(18, 16, 'New Point', 'test', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x00000000010100000049d4a822e6c64a4076c54a1c9f7f2a40, 'New Point', 'test', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', 0000, '2021-03-15 15:04:48'),
(19, 16, 'New Point 7', 'test', 'Große Wollweberstraße', '47', 'Neubrandenburg', '17033', 0x00000000010100000017a68be40ac74a406ea9f468e0822a40, 'New Point 7', '', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '10:00:00', '11:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:05:27'),
(20, 16, 'New Point 7', 'test', 'Große Wollweberstraße', '47', 'Neubrandenburg', '17033', 0x00000000010100000017a68be40ac74a406ea9f468e0822a40, 'New Point 7', '', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '10:00:00', '11:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:05:49'),
(21, 16, 'New Point 7', 'test', 'Große Wollweberstraße', '47', 'Neubrandenburg', '17033', 0x000000000101000000531b41cf0bc74a4003b00111e2822a40, 'New Point 7', 'test', '1234567890', '0000012345', 0, 0, '06:30:00', '08:30:00', 0, '10:00:00', '11:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:06:14'),
(22, 16, 'New Point 98', 'test', 'Otto-Vitense-Weg', 'undefined', 'Neubrandenburg', '17033', 0x0000000001010000005c731babb0c64a40ab28e8d49c842a40, 'New Point 98', 'www.test.com', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:23:53'),
(23, 16, 'New Point 100', 'test', 'Schulstraße', '3 a', 'Neubrandenburg', '17033', 0x00000000010100000029faac3504c74a40ebdf4baa02852a40, 'New Point 100', 'www.biostore.co.in', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:31:42'),
(24, 16, 'New Point', 'test', 'Zanderstraße', '10', 'Neubrandenburg', '17033', 0x0000000001010000005c731babb0c64a4010e7662167792a40, 'New Point', 'www.test.com', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:43:27'),
(25, 16, 'New Point 7890', 'test', 'Am Blumenborn', '11', 'Neubrandenburg', '17033', 0x000000000101000000b011652a73c54a401ba965576c892a40, 'New Point 7890', 'www.test.com test', '1234567890', '0000012345', 0, 0, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:57:04'),
(26, 16, 'test 8', 'test', 'Dümperstraße', '1', 'Neubrandenburg', '17033', 0x0000000001010000005c16b8e11cc74a40b238526cbb832a40, 'test 8', 'www.test.com', '1234567890', '0000012345', 0, 0, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 15:57:44'),
(27, 16, 'test 5tr', 'test test', 'Otto-Vitense-Weg', 'undefined', 'Neubrandenburg', '17033', 0x00000000010100000068fe224da3c64a4043e16492a8842a40, 'test 5tr', 'www.biostore.co.in', '1234567890', '0000012345', 0, 1, '06:30:00', '08:30:00', 1, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-15 16:08:01'),
(28, 16, 'test zz', 'test', 'Binsenwerder', '4-6', 'Neubrandenburg', '17033', 0x0000000001010000006bf29b49e0c64a402886dc00797f2a40, 'test zz', 'www.test.com', '000000000000', '00000000000000', 0, 1, '06:30:00', '09:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-03-24 09:12:23'),
(29, 16, 'image 1', 'test', 'Brodaer Straße', '2', 'Neubrandenburg', '17033', 0x000000000101000000d3097afa2dc74a40b3382d3ec57e2a40, 'image 1', 'www.test.com', '017630142345', '017630142345', 0, 1, '07:00:00', '19:00:00', 1, '07:00:00', '19:00:00', 1, '07:00:00', '19:00:00', 1, '07:00:00', '19:00:00', 1, '07:00:00', '19:00:00', 1, '07:00:00', '19:00:00', 1, '07:00:00', 2019, '2021-04-10 08:26:55'),
(30, 16, 'New Point 0012', 'test', 'Brodaer Straße', '2', 'Neubrandenburg', '17033', 0x0000000001010000003c9b1e660dc74a402a7a7df9be7c2a40, 'New Point 0012', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 1, '00:00:00', '00:00:00', 1, '15:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', '00:00:00', 1, '00:00:00', 0000, '2021-04-10 09:10:24'),
(31, 16, 'New Point', 'test', 'Brodaer Straße', '11', 'Neubrandenburg', '17033', 0x000000000101000000c6ab5356f4c64a400df2522808812a40, 'New Point', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-04-10 09:18:44'),
(32, 16, 'test 56', 'test', 'Brodaer Straße', '38', 'Neubrandenburg', '17033', 0x000000000101000000bb5f864822c74a4063234ea11b822a40, 'test 56', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-04-10 09:19:42'),
(33, 16, 'New Point', 'test', 'Brodaer Straße', '6', 'Neubrandenburg', '17033', 0x00000000010100000009d1af9ad9c64a40a8ef3f4dc7812a40, 'New Point', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-04-10 09:22:46'),
(39, 16, 'New Point ghg', 'test', 'Brodaer Straße', '10', 'Neubrandenburg', '17033', 0x000000000101000000f264f86208c74a40b6842be0bd802a40, 'New Point ghg', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 1, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-04-10 16:31:34'),
(47, 16, 'New Point 1212121', 'test', 'Brodaer Straße', '11', 'Neubrandenburg', '17033', 0x0000000001010000001d2ffa4feac64a40b01ef42135812a40, 'New Point 1212121', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-04-10 17:07:39'),
(48, 16, 'test 1000', 'test', 'Schillerstraße', '2', 'Neubrandenburg', '17033', 0x000000000101000000bcfaf48902c74a40471574eccc812a40, 'test 1000', 'www.test.com', '017630142345', '017630142345', 0, 1, '06:30:00', '08:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-04-14 08:23:02'),
(49, 92, 'New Point', 'test', 'Brodaer Straße', '4', 'Neubrandenburg', '17033', 0x0000000001010000003da503c8ddc64a40daf678de897f2a40, 'New Point', 'www.test.com', '017630142345', '017630142345', 0, 1, '00:30:00', '01:30:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-08-31 14:50:17'),
(50, 95, 'test 2', 'test', 'Am Kaufhof-Süd', '3', 'Neubrandenburg', '17033', 0x0000000001010000001f0eb7e809c64a407678be558d882a40, 'test 2', 'www.biostore.co.intest', '99662626262', '12452452452452', 0, 1, '00:00:00', '14:10:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', '00:00:00', 0, '00:00:00', 0000, '2021-11-18 16:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_abbr` varchar(10) NOT NULL,
  `unit_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_abbr`, `unit_name`) VALUES
(1, 'kg', 'kilogram'),
(2, 'gm', 'gram'),
(3, 'ltr', 'litre'),
(4, 'mL', 'milliliter'),
(5, 'pc.', 'piece');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `salutations` varchar(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `street` varchar(50) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `user_type` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_professional` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores user information';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `salutations`, `first_name`, `middle_name`, `last_name`, `dob`, `street`, `house_number`, `zip`, `city`, `country`, `phone`, `email`, `mobile`, `user_type`, `is_active`, `is_blocked`, `created_date`, `profile_image_name`, `description`, `is_professional`) VALUES
(1, 'Mr', 'Fredy', NULL, 'Davis', '1993-11-02', 'Brodaer Starsse', '4', '17003', 'Neubrandenburg', 'Germany', '', 'fredy@gmail.com', '17630142345', 1, 1, 0, '2020-11-14 18:00:41', NULL, NULL, 0),
(2, 'Mr.', '123', '32443', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'jhv', 'jhv', 1, 1, 0, '2020-11-15 11:29:54', NULL, NULL, 0),
(3, 'Mr.', '12e', '32443', 'fghfg', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'jhv', 'jhv', 1, 1, 0, '2020-11-15 11:30:35', NULL, NULL, 0),
(4, 'Mr.', 'First name', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, 1, 0, '2020-11-15 15:27:19', NULL, NULL, 0),
(5, 'Mr.', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 1, 1, 0, '2020-11-15 16:35:25', NULL, NULL, 0),
(6, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 21:50:55', NULL, NULL, 0),
(7, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 21:51:18', NULL, NULL, 0),
(8, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 21:51:40', NULL, NULL, 0),
(9, 'Mr.', '12e', 'ghnfgfgh', '453', '0000-00-00', 'hgh', 'hv', 'hjvhj', 'vjhv', 'jhv', 'jhv', 'fredythekkekkara@gmail.com', 'jhv', 1, 1, 0, '2020-11-15 22:39:41', NULL, NULL, 0),
(10, 'Mr.', 'Fredy', 'Davis', 'Thekkekkara', '0000-00-00', 'Brodaer Strasse', '4', '17033', 'NB', 'De', '9846194609', 'fredythekkekkara@gmail.com123', '17063142345', 1, 1, 0, '2020-11-16 08:10:49', NULL, NULL, 0),
(11, 'Mr.', '123', '32443', '453', '0000-00-00', 'hgh', 'hv', '17033', 'Kochi', 'India', '9846194609', 'fredy123@gmail.com', '17063142345', 1, 1, 0, '2020-11-18 10:56:10', NULL, NULL, 0),
(14, 'Mr.', 'Fredy', 'Davis', 'Thekkekkara', '0000-00-00', 'Brodaer Strasse', 'Helo', '17033', 'Neubrandenburg', 'Germany', '9846194609', 'FREDZ@GMAIL.COM', '17063142345', 1, 1, 0, '2020-11-18 11:17:58', NULL, NULL, 0),
(15, 'Mr.', 'qq', 'q', 'qq', '0000-00-00', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 'q', 1, 1, 0, '2020-11-18 11:18:36', NULL, NULL, 0),
(16, '', 'John', NULL, 'Doe', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', '17033', '+4917630142215', 'salisbury@sa_nb.com', '', 1, 1, 0, '2020-11-18 11:20:18', NULL, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 0),
(17, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer StraÃŸe', '4', '17033', 'Neubrandenburg', 'DE', '453453453', 'test', '123454678', 1, 1, 0, '2020-11-27 14:23:58', NULL, NULL, 0),
(18, 'Mr.', 'zz', 'zz', 'zzz', '0000-00-00', 'zzzz', '98645', '5661', 'Neubrandenburg', 'a', '1234567890', 'zzz', '12345896556', 1, 1, 0, '2020-11-27 18:16:32', NULL, NULL, 0),
(19, 'Mr.', 'test', 'fdfg', 'dfgdfg', '0000-00-00', 'a', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com1', '12345896556', 1, 1, 0, '2020-12-01 09:24:27', NULL, NULL, 0),
(20, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com123', '12345896556', 1, 1, 0, '2020-12-01 09:28:15', NULL, NULL, 0),
(21, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc123', '12345896556', 1, 1, 0, '2020-12-01 09:30:12', NULL, NULL, 0),
(22, 'Mr.', 'test', 'test', 'dfgdfg', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com1234', '12345896556', 1, 1, 0, '2020-12-01 09:37:06', NULL, NULL, 0),
(23, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'a', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com1111', '12345896556', 1, 1, 0, '2020-12-01 09:41:17', NULL, NULL, 0),
(24, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.com12345', '12345896556', 1, 1, 0, '2020-12-01 09:44:58', NULL, NULL, 0),
(25, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '3515648684', 'abc@abc.co.in', '12345896556', 1, 1, 0, '2020-12-01 09:49:43', NULL, NULL, 0),
(26, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.comqwertz', '12345896556', 1, 1, 0, '2020-12-01 09:51:22', NULL, NULL, 0),
(27, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', 'Neubrandenburg', 'DE', '1234567890', 'abc@abc.comyyy', '12345896556', 1, 1, 0, '2020-12-01 09:52:49', NULL, NULL, 0),
(28, 'Mr.', 'test', 'ghng', 'nfgn', '0000-00-00', 'fgn', 'fgn', 'sfgn', 'sfgn', 'sfg', 'sdfb', 'asdfghjklö', 'sfb', 1, 1, 0, '2020-12-01 09:54:36', NULL, NULL, 0),
(29, 'Mr.', 'sxasx', 'asxas', 'xasxasx', '0000-00-00', 'asxax', 'asxasx', 'asxasx', 'asxas', 'xasxasx', 'asxasx', 'axaxaxax', 'asxasx', 1, 1, 0, '2020-12-01 09:57:55', NULL, NULL, 0),
(30, 'Mr.', 'saxax', 'asxaxa', 'sxasx', '0000-00-00', 'asxasx', 'asxasx', 'asxasx', 'asxasx', 'asxasx', 'asxax', 'asxasx', 'asxasx', 1, 1, 0, '2020-12-01 10:04:35', NULL, NULL, 0),
(31, 'Mr.', 'asdf', 'asdd', 'asdasd', '0000-00-00', 'asdas', 'asdasd', 'asdasd', 'asdasd', 'asda', 'asdasd', 'asdasdasd', 'asdas', 1, 1, 0, '2020-12-01 10:06:06', NULL, NULL, 0),
(32, 'Mr.', 'bbbgbf', 'gbfgbfgb', 'fgbfbg', '0000-00-00', 'fgbfb', 'fgbfgb', 'fgbfgb', 'fgbfbg', 'fgbf', 'bfgbfgb', 'ffffffffffff', 'fgbfbgfgbfg', 1, 1, 0, '2020-12-01 10:29:20', '5fc61b0078c5d3.94614348.jpg', NULL, 0),
(33, 'Mr.', 'Tom', 'Vian', 'Fernando', '0000-00-00', 'Dorfstraße Ost', '4', '16307', '13', 'DE', '8965236589', 'tom@vian.com', '7845125858', 1, 1, 0, '2021-01-02 10:27:37', '', NULL, 0),
(34, 'Mr.', 'test', 'test', 'test', '0000-00-00', 'Brodaer Straße', '56', '17033', '4', 'DE', '1234567890', 'hhh@gmail.com', '12345896556', 1, 1, 0, '2021-02-03 14:15:00', '', NULL, 0),
(35, '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 0, 0, 0, '2021-02-12 16:06:42', '', NULL, 0),
(36, '', 'Fredy', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '2', '17033', 'NB', 'DE', '1234567890', 'fredythekkekkara@gmail.com12345', '12345896556', 0, 0, 0, '2021-02-15 11:57:10', '', NULL, 0),
(37, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg20036', '', 0, 0, 0, '2021-02-16 12:39:08', '', NULL, 0),
(38, '', 'Fredy', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg200361', '', 0, 0, 0, '2021-02-16 13:00:29', '', NULL, 0),
(39, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg200360', '12345896556', 0, 0, 0, '2021-02-16 13:17:40', '', NULL, 0),
(40, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'tst', '', 0, 0, 0, '2021-02-16 13:21:56', '', NULL, 0),
(41, '', '', '', '', '0000-00-00', '', '', '', '', '', '', 'lg2003600', '', 0, 0, 0, '2021-02-16 13:28:11', '', NULL, 0),
(42, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg2003601', '', 0, 0, 0, '2021-02-16 15:01:41', '', NULL, 0),
(43, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg2003602', '', 0, 0, 0, '2021-02-16 15:03:56', '', NULL, 0),
(44, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg2003603', '', 0, 0, 0, '2021-02-16 15:06:21', '', NULL, 0),
(45, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg2003604', '', 0, 0, 0, '2021-02-16 15:07:45', '', NULL, 0),
(46, '', 'Fredz', '', 'thekkekkara', '0000-00-00', 'Brodaer Straße', '', '17033', '2', '', '', 'lg2003605', '', 0, 0, 0, '2021-02-16 15:08:44', '', NULL, 0),
(47, '', 'Fredz', NULL, 'thekkekkara', '0000-00-00', 'Brodaer Straße', '4', '17033', '2', 'DE', '1234567890', 'testm', '12345896556', 0, 0, 0, '2021-02-18 14:25:26', '', 'testJennifer Campbell serves in a management position at Campbell Grain & Livestock.  Some days she is at the top of the corporate ladder making high-powered decisions about which child\'s turn it is feed the calves and what she is fixing for supper. Most days, however, are spent barely hanging on to the bottom rung with one hand while multi-tasking with the other. She is on call 24/7 for parts, rides, hog duty, cattle duty, running equipment, meal preparation and just about any other issue that arises.\r\n\r\nShe willingly admits that her house is never clean and jumps at any opportunity to help on the farm, which includes not only driving equipment but also pressure washing hog barns, all in the name of getting out of housework.  Her dream is to have a home she can pressure wash to keep clean.  She also spends an inordinate amount of time on social media sharing the ins and outs of life on the farm.', 0),
(48, '', 'Fredy', NULL, 'davis', '0000-00-00', 'Brodaer Straße', '2', '17033', 'Neubrandenburg', 'Germany', '017630142345', 'test61', '017630142345', 0, 0, 0, '2021-03-25 13:51:19', '', 'test', 0),
(49, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'testfredy', '', 0, 0, 0, '2021-04-11 16:51:21', '', 'test', 0),
(50, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com001', '', 0, 0, 0, '2021-04-12 08:13:29', '', 'test', 0),
(51, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com002', '', 0, 0, 0, '2021-04-12 08:17:52', '', 'test', 0),
(52, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com003', '', 0, 0, 0, '2021-04-12 08:46:35', '', 'test', 0),
(53, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com004', '', 0, 0, 0, '2021-04-12 08:55:43', '', 'test', 0),
(54, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com005', '', 0, 0, 0, '2021-04-12 08:57:28', '', 'test', 0),
(55, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com006', '', 0, 0, 0, '2021-04-12 09:10:59', '', 'test', 0),
(56, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com007', '', 0, 0, 0, '2021-04-12 09:40:22', '', 'test', 0),
(57, '', 'Brian', NULL, 'Gavin', '0000-00-00', 'Brodaer Straße', '6', '17036', '17036', 'Neubrandenburg', '9846194609', 'brian@test.com', '', 0, 0, 0, '2021-05-21 10:02:31', '', 'Having been a host farmer for three seasons, we’ve seen firsthand the difference this internship makes in beginning farmers and host farms alike.  As a farmer it is difficult to weigh the benefits of hosting young farmers.  Fresh energy and enthusiasm bring more to the farm than helping hands; they bring a fresh perspective and inquisitiveness that helps you look at your farm and your farming system through new eyes each season.  There is no educational model I know of that is more effective at growing farmers than the one Rogue Farm Corps has developed.', 0),
(58, '', 'Brian', NULL, 'Gavin', '0000-00-00', 'Brodaer Straße', '6', '17036', '17036', 'Neubrandenburg', '9846194609', 'brian1@test.com', '', 0, 0, 0, '2021-05-21 10:10:18', '', 'Having been a host farmer for three seasons, we’ve seen firsthand the difference this internship makes in beginning farmers and host farms alike.  As a farmer it is difficult to weigh the benefits of hosting young farmers.  Fresh energy and enthusiasm bring more to the farm than helping hands; they bring a fresh perspective and inquisitiveness that helps you look at your farm and your farming system through new eyes each season.  There is no educational model I know of that is more effective at growing farmers than the one Rogue Farm Corps has developed.', 0),
(59, '', 'test', NULL, 'name', '0000-00-00', 'Brodaer Straße', '4-6', '17033', '17033', '2', '9846194609', 'testa@test.com', '', 0, 0, 0, '2021-05-21 10:19:32', '', 'test', 0),
(60, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredy2580', '', 0, 0, 0, '2021-06-01 09:39:34', '', 'test', 0),
(61, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredy2581', '', 0, 0, 0, '2021-06-01 09:40:59', '', 'test', 0),
(62, '', 'Test', NULL, 'name', '0000-00-00', 'test treet', '1', '17033', '17033', 'neubrandenburg', '123456', 'testname', '', 0, 0, 0, '2021-06-21 11:00:40', '', 'test story', 0),
(63, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fred', '', 0, 0, 0, '2021-06-21 11:11:50', '', 'test', 0),
(64, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'ffftest', '', 0, 0, 0, '2021-06-21 11:11:57', '', 'test', 0),
(65, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'mmmmmm', '', 0, 0, 0, '2021-06-21 11:12:51', '', 'test', 0),
(66, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'mmmmmml', '', 0, 0, 0, '2021-06-21 11:13:40', '', 'test', 0),
(67, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'mmmmmmlr', '', 0, 0, 0, '2021-06-21 11:14:55', '', 'test', 0),
(68, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'mmmmmmlrt', '', 0, 0, 0, '2021-06-21 11:16:27', '', 'test', 0),
(69, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'mmmmmmlrts', '', 0, 0, 0, '2021-06-21 11:22:50', '', 'test', 0),
(70, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'mmmmmmlrtst', '', 0, 0, 0, '2021-06-21 11:23:41', '', 'test', 0),
(71, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße, 4', 'test', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredyaaa', '', 0, 0, 0, '2021-06-21 12:16:37', '', 'test', 0),
(72, '', 'testtt', NULL, 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '212121', 'test@125484.comcom', '', 0, 0, 0, '2021-08-16 13:57:41', '', 'test', 0),
(73, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredy@gggmmmm.com', '', 0, 0, 0, '2021-08-16 14:13:00', '', 'test', 0),
(74, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'Fredy@testemail.com', '', 0, 0, 0, '2021-08-16 15:00:55', '', 'test', 0),
(75, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'testemaillll', '', 0, 0, 0, '2021-08-16 15:01:43', '', 'test', 0),
(76, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'Fredfdfdf', '', 0, 0, 0, '2021-08-16 15:02:28', '', 'test', 0),
(77, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com558545', '', 0, 0, 0, '2021-08-18 14:41:09', '', 'test', 0),
(78, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.comhhsh', '', 0, 0, 0, '2021-08-18 15:03:25', '', 'test', 0),
(79, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.combxcbcvb', '', 0, 0, 0, '2021-08-18 15:04:20', '', 'test', 0),
(80, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.comefef', '', 0, 0, 0, '2021-08-18 15:58:49', '', 'test', 0),
(81, '', 'test', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.comcxc', '', 0, 0, 0, '2021-08-18 15:59:36', '', 'test', 0),
(82, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.comghf', '', 0, 0, 0, '2021-08-18 16:04:08', '', 'test', 0),
(83, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.comdvddv', '', 0, 0, 0, '2021-08-18 16:05:15', '', 'test', 0),
(84, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com45545', '', 0, 0, 0, '2021-08-18 16:09:42', '', 'test', 0),
(85, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail54545tz.com', '', 0, 0, 0, '2021-08-19 09:02:52', '', 'test', 0),
(86, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.cobbvm', '', 0, 0, 0, '2021-08-19 09:03:48', '', 'test', 0),
(87, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com008', '', 0, 0, 0, '2021-08-19 14:16:14', '', 'test', 0),
(88, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com009', '', 0, 0, 0, '2021-08-19 14:16:54', '', 'test', 0),
(89, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com0010', '', 0, 0, 0, '2021-08-19 14:18:20', '', 'test', 0),
(90, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com0011', '', 0, 0, 0, '2021-08-19 14:20:26', '', 'test', 0),
(91, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com0012', '', 0, 0, 0, '2021-08-19 14:22:20', '', 'test', 0),
(92, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'fredythekkekkara@gmail.com0013', '', 0, 0, 0, '2021-08-19 14:23:34', '', 'test', 0),
(93, '', 'john', NULL, 'lynn', '0000-00-00', 'Brodaer Straße', '4', '17036', '17036', 'Neubrandenburg', '09846194609', 'john@gmail.com', '', 0, 0, 0, '2021-09-29 14:45:21', '', 'test', 0),
(94, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'john1@gmail.com', '', 0, 0, 0, '2021-09-29 14:51:49', '', 'test', 0),
(95, '', 'Fredy', NULL, 'Davis', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', 'Neubrandenburg', '017630142345', 'john2@gmail.com', '', 0, 0, 0, '2021-09-29 14:53:26', '', 'test', 0),
(96, '', 'pro', NULL, 'test', '0000-00-00', 'Brodaer Straße', '4', '17033', '17033', '17033', '017630142345', 'pro@gmail.com', '', 0, 0, 0, '2022-03-31 10:03:54', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_credential`
--

CREATE TABLE `user_credential` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `password_reset_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='table to save user name and password of each users';

--
-- Dumping data for table `user_credential`
--

INSERT INTO `user_credential` (`id`, `user_id`, `user_name`, `password`, `password_reset_token`) VALUES
(1, 14, 'FREDZ@GMAIL.COM', 'TEST123', NULL),
(2, 15, 'q', 'q', NULL),
(3, 16, 'salisbury@sa_nb.com', '$2y$10$2whQxFHJKJSL6sYSbA/FhOOAischlsIkUjggj2NhqKfH4y4NKo1tm', 'AW033301060cf60df8695a4.13129413'),
(4, 17, 'test', '$2y$10$MK/dZDDQ3/4jdQEX4JNPPuUg5d0WumEJ0./dRoWO4o/eNc7NA42EK', NULL),
(5, 18, 'zzz', 'zzz', NULL),
(6, 19, 'abc@abc.com1', 'abc', NULL),
(7, 20, 'abc@abc.com123', '123', NULL),
(8, 21, 'abc@abc123', '123', NULL),
(9, 22, 'abc@abc.com1234', '1234', NULL),
(10, 23, 'abc@abc.com1111', 'qwert', NULL),
(11, 24, 'abc@abc.com12345', 'qwert', NULL),
(12, 25, 'abc@abc.co.in', 'abc', NULL),
(13, 26, 'abc@abc.comqwertz', 'qwertz', NULL),
(14, 27, 'abc@abc.comyyy', 'yyy', NULL),
(15, 28, 'asdfghjklö', 'asd', NULL),
(16, 29, 'axaxaxax', 'axa', NULL),
(17, 30, 'asxasx', 'asd', NULL),
(18, 31, 'asdasdasd', 'asdasd', NULL),
(19, 32, 'ffffffffffff', 'fff', NULL),
(20, 33, 'tom@vian.com', '$2y$10$4mdsUtITOrWTQ1DneT4zguKTu4thXg11XS3xvR3Jjy.jOIdCP6LQS', NULL),
(21, 34, 'hhh@gmail.com', 'hhh', NULL),
(22, 35, '', '$2y$10$ULc9dmI6c/rlyqC.B0', NULL),
(23, 36, 'fredythekkekkara@gmail.co', '$2y$10$qIN1cLT9wJ.LF2/MQP', NULL),
(24, 37, 'lg20036', '$2y$10$COBzGI3TnheLlQ5Ec4', NULL),
(25, 38, 'lg200361', '$2y$10$jsAwnG/z0qlsDkPJe.', NULL),
(26, 39, 'lg200360', '$2y$10$R8vmXaClSVyH60ryqHaJA.Ix3VscEzwIH8QJioaexkJYhNPHNEfka', NULL),
(27, 40, 'tst', '$2y$10$a2faXXOYWSZHZug78KC/guGXeL0DjocRi2xzIRRlKATx5Si7aqwQi', NULL),
(28, 41, 'lg2003600', '$2y$10$h.A23UljsYPs51ijxS6cAecyZPiRxQFyNr.6u6I6i8.d7a492Fvxe', NULL),
(29, 42, 'lg2003601', '$2y$10$SYVbAxAMB9tv1VDLQ4NK3uIaguCueOQDKfPeuD247vkwRwjUFEuqK', NULL),
(30, 43, 'lg2003602', '$2y$10$Md72pLl1TQS4OPBAvd/T2ugNgWtypiB/ldIHChwyaEX6quVtcyfhy', NULL),
(31, 44, 'lg2003603', '$2y$10$3MmIhnVii2pedWi2QTVX3.bS7pM2r98Oc/W0aWNrMdHm9q.wOwQZe', NULL),
(32, 45, 'lg2003604', '$2y$10$VCV0O/VyRT5H7cfFR/aUruw7rmGE1OzxhNmuriUoo3JMIfImuX2v2', NULL),
(33, 46, 'lg2003605', '$2y$10$2whQxFHJKJSL6sYSbA/FhOOAischlsIkUjggj2NhqKfH4y4NKo1tm', NULL),
(34, 47, 'testm', '$2y$10$A9ae.Vqjgsckang6uSQRj.D0nqY9s2puDGtn3GoGR3CbDgAev4R1m', NULL),
(35, 48, 'test61', '$2y$10$DWS.kAuDE0Ge.eahkTKuUedh85Gv2PQZHJoSQ5yLxCZdoxaP0oQk.', NULL),
(36, 49, 'testfredy', '$2y$10$tQ868kl5A98d/5zqfalrse0.GU10.Rn2pHisMnhz6UL8uyyLVaCZ.', NULL),
(37, 50, 'fredythekkekkara@gmail.co', '$2y$10$AhMurSp6p5ibpi0XhZ0F5u7/neHtw5qEZ16ZpJwYFoXfFjFcMJ7LO', NULL),
(38, 51, 'fredythekkekkara@gmail.co', '$2y$10$C2kdTywEEHqH97uwFbEa7eJat9ElcIRoP8iCVtp.UKm71eBJ90Cci', NULL),
(39, 52, 'fredythekkekkara@gmail.com003', '$2y$10$LyZ811rC9X2Zst.631cS4OD.KZZxN7gvjEwd72J52Ol1gg8yn.bVm', NULL),
(40, 53, 'fredythekkekkara@gmail.com004', '$2y$10$/KWtc6exhAMKN3jo2OjpFu3d26deYFnx..i3tDKb9xV9AgbD3dp4m', NULL),
(41, 54, 'fredythekkekkara@gmail.com005', '$2y$10$qb7vHjE.q.7nweJXHwrb2.c6CnlU8o6hbzDeVcCKd1e5SjqRjL3C2', NULL),
(42, 55, 'fredythekkekkara@gmail.com006', '$2y$10$3UGAr5pIR/w90vvv8gOGR.22HzpVNrdTxKliRhTG24zMD2R.A7NF6', NULL),
(43, 56, 'fredythekkekkara@gmail.com007', '$2y$10$IsHZ7e6tnYUHxVosP5t1i.i.D5waZDhkwcBP5UcMmAri6HJTAV9te', NULL),
(44, 57, 'brian@test.com', '$2y$10$kbPW.xFsj/NnBrtrWfkNY.m2GX1qGybFRLN3OnycSOJLNEeN5w16q', NULL),
(45, 58, 'brian1@test.com', '$2y$10$abDR6pDADg0I.7Ok4XLuuOeAxXKlfROSXhTCdvRMtIw0g5l4IpZqu', NULL),
(46, 59, 'testa@test.com', '$2y$10$2IRm7tZQG5d1NmCElUyFZuTLNB2uFat5GXew2ugWfaR7PNKxCx.x2', NULL),
(47, 60, 'fredy2580', '$2y$10$Q0eJIFZ/Eq4KZq1QMLX5lO6Hj36PlLGx4f5WWC4kblgJUVUsI2Xvy', NULL),
(48, 61, 'fredy2581', '$2y$10$lJfKQ6M/rDhzDb4kkmavyOWcao/uEALVFDStY5MJMjNBwwVrCmsZa', NULL),
(49, 62, 'testname', '$2y$10$L8HohEmpc4qPiRPzze93.OvenSyytJNq45QG0/nTpAZrL1bWPbmWW', NULL),
(50, 63, 'fred', '$2y$10$2cyF26y4i06ik3lphCbPk.lNSK3iCxJZ/2M4pt9wcIuH2ynd21BCS', NULL),
(51, 64, 'ffftest', '$2y$10$3d8eUkFO94W60eKIo2TqAuSNV7lgGWY/TduwXM5NUgFrBD7eYqkWe', NULL),
(52, 65, 'mmmmmm', '$2y$10$/yvcjovfSsJhOcSqZQSXm.Ebz7aXbkfYMfeHoHe7L2we7YlzOLVw2', NULL),
(53, 66, 'mmmmmml', '$2y$10$Wkl2JmvGRI1kD53L0p9JOe.PlIWu/DJWSG2AkFfR.xNHAaXGxJW5a', NULL),
(54, 67, 'mmmmmmlr', '$2y$10$eMcOwC0TykJLkSbxSEHNEuQvuPZZFldOyEo3IH9hXNq.0RRcDWHSW', NULL),
(55, 68, 'mmmmmmlrt', '$2y$10$VW7o90CXxBu8NsXf6JmzFOQM3cquX5hGiO5A79ArWmo72pNpeiPtW', NULL),
(56, 69, 'mmmmmmlrts', '$2y$10$Kz0icnXRv908cTJsTKi0VO4p0TpF8sRjbtrBRTJpYVpD7PIpjvyJ6', NULL),
(57, 70, 'mmmmmmlrtst', '$2y$10$wJzJ5y4ppVd4N9zKo6fWeeklXeyp9iS88DgugrMB8IOY9HYWB/O3K', NULL),
(58, 71, 'fredyaaa', '$2y$10$92MnSwoBAC.ESoCgu1bed.tk9t0vdPKUTUE/NB0Lf2NWu0X6CqUT2', NULL),
(59, 72, 'test@125484.comcom', '$2y$10$7jMbb8TQU9S9jeSvDu1Ru.6bNVnEEgxh0oe2.KEFAu6dIF3ZG2uv2', NULL),
(60, 73, 'fredy@gggmmmm.com', '$2y$10$KYnX2EzjbehxMHwUJJh6YeuPrHsMxW2mq95wBD6bbQcQjOBH0aFH6', NULL),
(61, 74, 'Fredy@testemail.com', '$2y$10$I1tAWR9SX.LsMe31.6bP2.unqSaLS6LLdIeva9DW1FDbp1iElNT4C', NULL),
(62, 75, 'testemaillll', '$2y$10$ko98ND6R1K5qu7ldT6obq.IBjq88PokmJDrI0/ZDmMQIZeWHuJ53.', NULL),
(63, 76, 'Fredfdfdf', '$2y$10$dvyFpl8TfX3CjTlPgCwfwed7y.NaIdvXo4mKVqDX7cvVbZyJVBmPC', NULL),
(64, 77, 'fredythekkekkara@gmail.com558545', '$2y$10$.bR/83.MK8ywMpqmAHVpwe6yQAUitk6oipUZ7SB.3ZL3/XMHWFRqy', NULL),
(65, 78, 'fredythekkekkara@gmail.comhhsh', '$2y$10$.ndVjzl5SO14yLP4/p7Y7.eiLMxn230aXcEujSS9qCNUGSwGaqDzu', NULL),
(66, 79, 'fredythekkekkara@gmail.combxcbcvb', '$2y$10$agPmzd1JBO5b92tsL7ddUerHb8X4TojTmZFLbjROT53Deyy.exw.y', NULL),
(67, 80, 'fredythekkekkara@gmail.comefef', '$2y$10$yv2exbdoHuOO21mx6HIvc.s.hRyDuk.Z1gl4NaeLsq4mRHZN9zS5u', NULL),
(68, 81, 'fredythekkekkara@gmail.comcxc', '$2y$10$fUNzKuoC/XaBg6N3KJj6quGF91XCFtsH8NyenXYstCm.2l.0Zdzxq', NULL),
(69, 82, 'fredythekkekkara@gmail.comghf', '$2y$10$i0KrH9uY2lQblzfk.hZEOe2Xqw069O2rgWp2G6RVXOMRssDRWDG7y', NULL),
(70, 83, 'fredythekkekkara@gmail.comdvddv', '$2y$10$/IAEu5Cg80FxRkR5AwSJieC1aaBGPp0YS8pIMd5CuittZObhVAn76', NULL),
(71, 84, 'fredythekkekkara@gmail.com45545', '$2y$10$eu2OpjIjfaxzz/I5.dLNXe0F4YOy6taSElTApO8A9eC6wFqIoAi7K', NULL),
(72, 85, 'fredythekkekkara@gmail54545tz.com', '$2y$10$JGEEKHa8dLLBAx64tGbM..mNWJ.ovSsphuY6cj47aW/1GPKqbUFlW', NULL),
(73, 86, 'fredythekkekkara@gmail.cobbvm', '$2y$10$iBothJZ0jbDyBJKe4GESneoqmh7o.EdyDT/.9RYMJhWOPjik3/Nsu', NULL),
(74, 87, 'fredythekkekkara@gmail.com008', '$2y$10$jI9WRFxyu99XJx6nYMpiH.ppQgy80KLsBe6o1syFpEMpCeKRrCFhW', NULL),
(75, 88, 'fredythekkekkara@gmail.com009', '$2y$10$ZLfaUFa3x6TFaZyZb/V5fOc3Cb0aiOg0tmAMKXL.LNAaZwr5Z.ikC', NULL),
(76, 89, 'fredythekkekkara@gmail.com0010', '$2y$10$Lvw/JuDFgBtdrrE3Wzcp.u7bmihObQK2myEay3NXJQoCu7h5hh366', NULL),
(77, 90, 'fredythekkekkara@gmail.com0011', '$2y$10$iUyIjk.jbJQF5KgyWLiT6.NfgZ0VDy3oLi/7SigOfKt9rLEZZyM1i', NULL),
(78, 91, 'fredythekkekkara@gmail.com0012', '$2y$10$M7K.M4mtX81noUPQU.HQEe3BgXdOeITmUGFv9FqPAN5kn2LdLnHHm', NULL),
(79, 92, 'fredythekkekkara@gmail.com0013', '$2y$10$c0zUsI7YVYvw5aNraUtskORT8AAEM6FuLFcg0Ge.2/RvSTd58bFFu', NULL),
(80, 93, 'john@gmail.com', '$2y$10$mupIzibKnGpCGza6NOEZ4eH954AHz.wCpKfEOmiyCEDnj//CZ8myC', NULL),
(81, 94, 'john1@gmail.com', '$2y$10$Np2lIwCre6yoLliBDueJReuVzDFw50nJRov1Ol7OjqlII/khuREjS', NULL),
(82, 95, 'john2@gmail.com', '$2y$10$rqeO9/dnfV6l5fIA//jjFuFv6CQdpx8OdDjnvaG2JyqzXxiUJyY2W', NULL),
(83, 96, 'pro@gmail.com', '$2y$10$6pITxUV0Gpr6gw6Zqrojq.s1gPIEiIJVxsMmRrUTQjbk4ldbePHCC', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `chat_user_credentials`
--
ALTER TABLE `chat_user_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD PRIMARY KEY (`farm_id`),
  ADD KEY `user_to_farm_land` (`producer_id`);
ALTER TABLE `farm_land` ADD FULLTEXT KEY `farm_name` (`farm_name`,`farm_desc`,`street`,`house_number`,`city`,`zip`);

--
-- Indexes for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  ADD PRIMARY KEY (`fav_seller_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `seller_fk` (`seller_id`);

--
-- Indexes for table `feature_type`
--
ALTER TABLE `feature_type`
  ADD PRIMARY KEY (`feature_type_id`);
ALTER TABLE `feature_type` ADD FULLTEXT KEY `feature_name` (`feature_name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `image_types`
--
ALTER TABLE `image_types`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feed_user_fk` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_fk` (`product_category`),
  ADD KEY `product_location_fk` (`production_location`);
ALTER TABLE `products` ADD FULLTEXT KEY `product_name` (`product_name`,`product_description`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);
ALTER TABLE `product_category` ADD FULLTEXT KEY `category_name` (`category_name`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk` (`product_id`),
  ADD KEY `product_feature_type_fk` (`feature_type`);

--
-- Indexes for table `product_sellers`
--
ALTER TABLE `product_sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_seller_product_fk` (`product_id`),
  ADD KEY `product_seller_seller_fk` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `user_to_seller` (`producer_id`);
ALTER TABLE `sellers` ADD FULLTEXT KEY `seller_name` (`seller_name`,`seller_description`,`seller_email`,`street`,`building_number`,`city`,`zip`);
ALTER TABLE `sellers` ADD FULLTEXT KEY `seller_name_2` (`seller_name`,`seller_description`,`seller_email`,`seller_website`,`street`,`building_number`,`city`,`zip`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);
ALTER TABLE `user` ADD FULLTEXT KEY `first_name` (`first_name`,`last_name`,`street`,`house_number`,`city`,`zip`,`email`,`description`);
ALTER TABLE `user` ADD FULLTEXT KEY `first_name_2` (`first_name`,`last_name`,`street`,`house_number`,`city`,`zip`,`email`,`description`);
ALTER TABLE `user` ADD FULLTEXT KEY `first_name_3` (`first_name`,`last_name`,`description`,`street`,`house_number`,`city`,`zip`);

--
-- Indexes for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_token`
--
ALTER TABLE `access_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `chat_user_credentials`
--
ALTER TABLE `chat_user_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farm_land`
--
ALTER TABLE `farm_land`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  MODIFY `fav_seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feature_type`
--
ALTER TABLE `feature_type`
  MODIFY `feature_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `news_feed`
--
ALTER TABLE `news_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_feature`
--
ALTER TABLE `product_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `product_sellers`
--
ALTER TABLE `product_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user_credential`
--
ALTER TABLE `user_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farm_land`
--
ALTER TABLE `farm_land`
  ADD CONSTRAINT `user_to_farm_land` FOREIGN KEY (`producer_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `favourite_sellers`
--
ALTER TABLE `favourite_sellers`
  ADD CONSTRAINT `seller_fk` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD CONSTRAINT `feed_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`product_category`) REFERENCES `product_category` (`category_id`),
  ADD CONSTRAINT `product_location_fk` FOREIGN KEY (`production_location`) REFERENCES `farm_land` (`farm_id`);

--
-- Constraints for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD CONSTRAINT `product_feature_type_fk` FOREIGN KEY (`feature_type`) REFERENCES `feature_type` (`feature_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sellers`
--
ALTER TABLE `product_sellers`
  ADD CONSTRAINT `product_seller_product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_seller_seller_fk` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `user_to_seller` FOREIGN KEY (`producer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_credential`
--
ALTER TABLE `user_credential`
  ADD CONSTRAINT `user_credential_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
