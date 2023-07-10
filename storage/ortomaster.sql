-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2023 at 10:38 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ortomaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `diagnosis` json DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitudinal_arch_left` double(8,2) DEFAULT NULL,
  `longitudinal_arch_right` double(8,2) DEFAULT NULL,
  `transverse_arch` double(8,2) DEFAULT NULL,
  `pronator_type` text COLLATE utf8mb4_unicode_ci,
  `pronator_left` double(8,2) DEFAULT NULL,
  `pronator_right` double(8,2) DEFAULT NULL,
  `bus` tinytext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shoes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `branch_id`, `diagnosis`, `photo`, `longitudinal_arch_left`, `longitudinal_arch_right`, `transverse_arch`, `pronator_type`, `pronator_left`, `pronator_right`, `bus`, `created_at`, `updated_at`, `shoes`) VALUES
(3, 2, 1, 1, '[\"статическое плоскостопие 2ст\"]', 'BCvF4MYqMkfYsEgr1Qd3n4WxdsVX1q-metabmFtZQ==-.jpg', 1.80, 1.80, 3.00, NULL, NULL, NULL, NULL, '2023-06-05 07:05:48', '2023-06-05 07:05:48', NULL),
(4, 3, 1, 1, '[\"на момента осмотра стопа соответствует возрасту\"]', 'm8uuGoeqwkrnvR0THqO3W6os646VeD-metabmFtZQ==-.jpg', 1.80, 1.80, 2.00, NULL, NULL, NULL, NULL, '2023-06-05 07:17:47', '2023-06-05 07:17:47', NULL),
(5, 5, 1, 1, '[\"Полая стопа\"]', 'FXLIwvbABOJVrfTm1QRONAD6pUxpSe-metabmFtZQ==-.jpg', 1.00, 1.20, 5.00, NULL, NULL, NULL, NULL, '2023-06-05 07:36:30', '2023-06-05 07:36:30', NULL),
(6, 2, 1, 1, '[\"статическое плоскостопие 2ст\"]', NULL, 1.80, 1.80, 3.00, NULL, NULL, NULL, NULL, '2023-06-05 07:45:14', '2023-06-05 07:45:14', NULL),
(7, 6, 1, 1, '[]', 'ck5dHKkzIecumwstGhF9QROzQOOEQA-metabmFtZQ==-.jpg', 2.00, 2.00, NULL, NULL, NULL, NULL, NULL, '2023-06-05 07:52:39', '2023-06-05 07:52:39', NULL),
(8, 7, 1, 1, '[]', 'AS6bx5HvvA9dOlH92Epx1NszdPllaS-metabmFtZQ==-.jpg', 1.80, 1.80, 3.00, NULL, NULL, NULL, NULL, '2023-06-06 04:13:03', '2023-06-06 04:13:03', NULL),
(9, 2, 1, 1, '[\"Врожденный вывих бедра неуточненный\"]', 'dtXEZR8FpX6RGdHaqjrEGyB9L12zsh-metabmFtZQ==-.jpg', 1.10, 1.20, 2.00, 'Подпяточник для компенсации укорочения конечности', 1.00, 1.00, 'S', '2023-06-23 10:22:25', '2023-06-23 10:22:25', 'кеды'),
(13, 2, 1, 1, '[\"Врожденный вывих бедра неуточненный\"]', 'kI60YYbPeb5oF9jBU6WZbpmUz87oDN-metabmFtZQ==-.jpg', 1.10, 1.10, 3.00, 'Подпяточник для компенсации укорочения конечности', 1.00, 1.00, 'S', '2023-06-25 19:31:39', '2023-06-25 19:32:08', 'кеды'),
(16, 10, 8, 7, '[]', 'K6W7XXbXNqSOlhS1nmHBFpEa9pW5ys-metabmFtZQ==-.jpg', 2.00, 2.00, 1.00, NULL, NULL, NULL, NULL, '2023-06-27 10:13:16', '2023-06-27 10:13:16', NULL),
(17, 11, 1, 1, '[\"здоров\"]', 'oG7DRKNO1IvXFOSx3z7Ke7zJ208xqI-metabmFtZQ==-.jpg', 1.40, 1.40, 2.00, NULL, NULL, NULL, NULL, '2023-06-29 05:50:17', '2023-06-29 05:50:17', NULL),
(18, 10, 1, 1, '[\"Врожденный вывих бедра неуточненный\", \"Врожденный вывих бедра двусторонний\"]', 'sCjUqrnjwVnvXZEi8dgX0wgTDIImME-metabmFtZQ==-.jpg', 1.80, 1.70, 3.00, 'Подпяточник для компенсации укорочения конечности', 3.00, 3.00, 'S', '2023-06-29 05:56:19', '2023-06-29 05:56:19', NULL),
(19, 12, 1, 1, '[\"плосковальгусная постановка стоп\"]', 'QGGfnfugwO3O7aq8MGViRdxV2hUIVS-metabmFtZQ==-.jpg', 0.80, 0.80, NULL, NULL, NULL, NULL, NULL, '2023-06-29 06:03:06', '2023-06-29 06:03:06', NULL),
(20, 13, 1, 1, '[\"плосковальгусная постановка стоп\"]', '8tL9PyZgkjOy9GMTfy17CIVDvF5c3k-metabmFtZQ==-.jpg', 1.40, 1.40, NULL, NULL, NULL, NULL, NULL, '2023-06-29 06:10:17', '2023-06-29 06:10:17', 'высота берца8см'),
(21, 14, 1, 1, '[\"продольное плоскостопие3ст\"]', 'FEDQIB5cyCgf2XEwEiTpJNs64msj6k-metabmFtZQ==-.jpg', 1.80, 1.80, 2.00, NULL, NULL, NULL, 'S', '2023-06-29 06:18:23', '2023-06-29 06:18:23', NULL),
(22, 15, 1, 1, '[\"продольное плоскостопие1-2ст\"]', 'KRaRpZeuefxsCDL4BSL8mywYTsA3XF-metabmFtZQ==-.jpg', 1.70, 1.70, NULL, NULL, NULL, NULL, NULL, '2023-06-29 07:17:53', '2023-06-29 07:17:53', NULL),
(23, 16, 1, 1, '[\"на момент осмотра стопа соответствует возрасту\"]', '22T5ibBV8cZNx3bV8pq3FOCM5BuGz7-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-29 07:23:41', '2023-06-29 07:23:41', 'профилактическая'),
(24, 17, 1, 1, '[\"Продольное плоскостопие 3 ст\"]', 'nSup6ovV0UL05HkfZsgUyOHi0yWrhu-metabmFtZQ==-.jpg', 1.80, 1.80, 2.00, NULL, NULL, NULL, NULL, '2023-06-29 07:42:21', '2023-06-29 07:42:21', NULL),
(25, 18, 1, 1, '[\"На момент осмотра стопа соответсвует возрасту\"]', 'ptcJ21gMHUFlch71cApJBeB0HjdQlg-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-29 08:55:07', '2023-06-29 08:55:07', NULL),
(26, 19, 1, 1, '[\"вальгусная постановка стопы\"]', 'Nz887BvlQUG16sARjd3ZnEy48ktuXp-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, NULL, '2023-06-29 09:01:33', '2023-06-29 09:01:33', NULL),
(27, 20, 1, 1, '[\"вальгусная постановка стопы\"]', 'Twx9v3KX24Cb3QrajwjY6U5bLVX455-metabmFtZQ==-.jpg', 1.20, 1.20, NULL, NULL, NULL, NULL, NULL, '2023-06-29 09:04:58', '2023-06-29 09:04:58', 'ортопедическая обувь 8 см'),
(28, 21, 1, 1, '[\"продольное плоскостопие 1 ст\"]', 'eoqBUNbv8OnqNN2Lb4sUl8EYuuEdWL-metabmFtZQ==-.jpg', 1.80, 1.80, NULL, NULL, NULL, NULL, NULL, '2023-06-29 09:31:12', '2023-06-29 09:31:12', NULL),
(29, 22, 1, 1, '[\"ДЦП\"]', 'AYJJeoGCZ8bfy0UXXi9YHquOD83vzq-metabmFtZQ==-.jpg', 1.20, 1.20, NULL, NULL, NULL, NULL, NULL, '2023-06-29 09:35:55', '2023-06-29 09:35:55', 'ортопедиечская обувь 8 см'),
(30, 23, 1, 1, '[\"Остеохондропатия коленного сустава\"]', 'wAdvmUT6mpLz3PnGS4iuLGQlL08ga0-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-29 09:42:53', '2023-06-29 09:42:53', NULL),
(31, 24, 1, 1, '[\"приобретенная косолапость\"]', 'fhqlNQqa6zvKKx92lKjQg10bbVt7LR-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-29 09:55:40', '2023-06-29 09:55:40', 'для косолапости'),
(32, 25, 1, 1, '[\"на момент осмотра стопа соответствует возрасту\"]', '6hyzghDRMyToMwxOlbOz2ksv4Uhbzv-metabmFtZQ==-.jpg', 1.90, 1.90, 3.00, NULL, NULL, NULL, NULL, '2023-06-29 10:29:47', '2023-06-29 10:29:47', NULL),
(33, 25, 1, 1, '[]', 'tkqOp8hpgtauLUCJOoF5VUj6HPW6il-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2023-06-29 10:37:27', '2023-06-29 10:37:54', 'лолот'),
(34, 26, 1, 1, '[\"скалиоз грудного отдела позвоночника, 1 ст\"]', 'Ir39Y3C8Vi5C9QeKyOagNUGmnY8hTM-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, NULL, '2023-06-29 10:49:34', '2023-06-29 10:49:34', NULL),
(35, 27, 1, 1, '[\"сколиоз грудного отдела позв продольно поперечное плоскостопие2ст\"]', '5M2nFykNTm3R5sc7Cm0uGLp57DsOzq-metabmFtZQ==-.jpg', 2.20, 2.20, 1.00, NULL, NULL, NULL, NULL, '2023-06-30 04:27:10', '2023-06-30 04:27:10', NULL),
(36, 28, 1, 1, '[\"продольно поперечное плоскостопие1ст\"]', 'MghnA6QdqkSAxp0UbcvJSnN0GnemfP-metabmFtZQ==-.jpg', 2.30, 2.30, 2.00, NULL, NULL, NULL, NULL, '2023-06-30 04:32:45', '2023-06-30 04:32:45', NULL),
(37, 29, 1, 1, '[\"состояние после операций левой нижн конечн\"]', 'OqKGAKC9t8mY14muuj1V0x6Uv5r2KC-metabmFtZQ==-.jpg', 1.60, 1.60, 2.00, NULL, NULL, NULL, NULL, '2023-06-30 04:44:54', '2023-06-30 04:44:54', NULL),
(38, 30, 1, 1, '[\"поперечное плоскостопие1ст\"]', 'PduHHazR0t3OZMtKabLIYmvfR0k5rV-metabmFtZQ==-.jpg', 1.60, 1.60, 3.00, NULL, NULL, NULL, NULL, '2023-06-30 04:54:04', '2023-06-30 04:54:04', NULL),
(39, 31, 1, 1, '[\"продольное плоскостопие\"]', 'KO51dy9mQYvFEEDyyjznZ5mpOI3zja-metabmFtZQ==-.jpg', 1.80, 1.80, 3.00, NULL, NULL, NULL, NULL, '2023-06-30 05:00:48', '2023-06-30 05:00:48', NULL),
(40, 32, 1, 1, '[\"статическое плоскостопие1ст\"]', 'pHUvkwXnFVythZIRlVT65Zc0NYcg6Z-metabmFtZQ==-.jpg', 2.20, 2.20, 3.00, NULL, NULL, NULL, NULL, '2023-06-30 05:05:31', '2023-06-30 05:05:31', NULL),
(41, 34, 1, 1, '[]', 'cKA5dMoy4lynmEl9du8hdyB6bS8sJY-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 05:48:49', '2023-06-30 05:48:49', NULL),
(42, 35, 1, 1, '[\"плосковальгусная постановка стоп\"]', 'jqqjRnQg0BXis58t9d0zLd42HGjhh1-metabmFtZQ==-.jpg', 1.40, 1.40, NULL, NULL, NULL, NULL, NULL, '2023-06-30 06:11:29', '2023-06-30 06:11:29', 'ортопедическая обувь 8см'),
(43, 36, 1, 1, '[\"на момент осмотра стопа соответствует возрасту\"]', 'wbNTAsHJ07w0AOhn4pbG38kkkTkPA8-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 06:14:45', '2023-06-30 06:14:45', NULL),
(44, 37, 1, 1, '[\"плосковальгусная постановка стоп с положительной динамикой\"]', 'jJteodcfGycNC6wogbOtlxP3KrKdLH-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 06:24:58', '2023-06-30 06:24:58', 'носит с января'),
(45, 38, 1, 1, '[\"плосковальгусная постановка стоп сколиоз грудного отдела позв\"]', 'ILEYCYXebZvFkRSXE1JczsSSy6QuRY-metabmFtZQ==-.jpg', 2.00, 2.00, 1.00, NULL, NULL, NULL, NULL, '2023-06-30 06:35:20', '2023-06-30 06:35:20', NULL),
(46, 39, 1, 1, '[\"продольно поперечное плоскостопие2ст\"]', 'oJJPN7cgWHUhgd5cXZv0E0ac3oV27v-metabmFtZQ==-.jpg', 2.00, 2.00, 3.00, NULL, NULL, NULL, 'M', '2023-06-30 06:48:56', '2023-06-30 06:48:56', NULL),
(47, 40, 1, 1, '[\" на момент осмотра стопа соответствует возрасту\"]', '2I2kIOAHMjRJqLEAxIAckcRLZ2HKnt-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 06:55:45', '2023-06-30 06:55:45', NULL),
(48, 41, 1, 1, '[\" на  момент осмотра стопа соответствует возрасту\"]', 't6WanZtvqB6xfEdfEohlox344qYCD9-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 07:02:07', '2023-06-30 07:02:07', NULL),
(49, 42, 1, 1, '[\"деформация грудной клетки\"]', 'WQA2l8Ca3S2pkGFCwT3IMTUIu5YkSm-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 07:04:48', '2023-06-30 07:04:48', NULL),
(50, 43, 1, 1, '[\"поперечное плоскостопие начальной степени\"]', 'uX47drsR0rWhDhU9JMdMrJyG8Q9zIT-metabmFtZQ==-.jpg', 1.80, 1.80, 3.00, NULL, NULL, NULL, NULL, '2023-06-30 07:16:43', '2023-06-30 07:16:43', NULL),
(51, 44, 1, 1, '[\"нарушение осанки\"]', 'q9iS2RsmSTbU9vqgZrhAmkn6X9c6Oy-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 07:25:42', '2023-06-30 07:25:42', NULL),
(52, 45, 10, 1, '[\"Врожденный вывих бедра неуточненный\", \"ололо\"]', 'vMrBTBQPRvRjLzVrjkvG2Mg9o4rdNk-metabmFtZQ==-.jpg', 1.20, 2.20, 0.60, 'Подпяточник для компенсации укорочения конечности', 0.70, 0.50, 'M', '2023-06-30 07:41:51', '2023-06-30 07:41:51', 'ортопедическая'),
(53, 46, 1, 1, '[]', 'LB8nVzNEH5SugY2DYeLtHUfOEO3FZ1-metabmFtZQ==-.jpg', 2.00, 2.00, 0.40, NULL, NULL, NULL, NULL, '2023-06-30 08:33:12', '2023-06-30 08:33:12', NULL),
(54, 48, 1, 1, '[\"плосковальгусная постановка стопы\"]', 'NEia5n1lzJgOpFK5N1IHuRxvt7Ps4N-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-30 09:23:06', '2023-06-30 09:23:06', 'профилактическая обувь'),
(55, 49, 1, 1, '[\"сахарный диабет 2 типа\"]', 'PYnaw4PdLB7CPqji0NqzOg4An7xZo2-metabmFtZQ==-.jpg', 1.80, 1.80, NULL, NULL, NULL, NULL, NULL, '2023-06-30 09:45:31', '2023-06-30 09:45:31', 'стандартная'),
(56, 50, 1, 1, '[\"продольное плоскостопие 1 ст\\nпоперечное плоскостопие 1 ст\"]', 'cRmfedbpVGg6ddeL5wzZYNkwJDWIdh-metabmFtZQ==-.jpg', 1.80, 1.80, 0.50, NULL, NULL, NULL, NULL, '2023-06-30 10:02:18', '2023-06-30 10:02:18', NULL),
(57, 52, 1, 1, '[\"плосковальгусная постановка стоп\"]', 'IClXuW1XVf2pr2lHkgB3vsT74DnnsO-metabmFtZQ==-.jpg', 1.40, 1.40, 0.30, NULL, NULL, NULL, NULL, '2023-07-01 05:52:44', '2023-07-01 05:52:44', 'ортопедическая обувь 8см'),
(58, 53, 1, 1, '[\"продольное плоскостопие2ст с вальгусной постановкой стопы сколиоз\"]', '9OefeAWANBmUTZMF68eqwrtX254Ni3-metabmFtZQ==-.jpg', 1.90, 1.90, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:01:35', '2023-07-01 06:01:35', NULL),
(59, 54, 1, 1, '[\"плосковальгусная постановка стоп 2ст\"]', 'idH6OfP8MGBuV7vFn2oBCTFVhomfWg-metabmFtZQ==-.jpg', 1.60, 1.60, 0.30, NULL, NULL, NULL, NULL, '2023-07-01 06:08:59', '2023-07-01 06:08:59', 'ортопедическая обувь 8см\\1,6\\ 0,3'),
(60, 55, 1, 1, '[\"плосковальгусная постановка стоп3ст\"]', 'R3nPBSTEedaoXzh0hnfIz7d3ymDiEU-metabmFtZQ==-.jpg', 1.70, 1.70, 0.30, NULL, NULL, NULL, NULL, '2023-07-01 06:15:00', '2023-07-01 06:15:00', NULL),
(61, 56, 1, 1, '[\"статическое плоскостопие\"]', 'bdP4shB4Khnul4pB0I6ZfgpkzGA2xJ-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 06:35:13', '2023-07-01 06:35:13', NULL),
(62, 57, 1, 1, '[\"дтбс\"]', 'W7iwxCSxPWWFYpDaqz1ChA9Pk0BDj8-metabmFtZQ==-.jpg', 1.00, 1.00, NULL, NULL, NULL, NULL, NULL, '2023-07-01 06:40:42', '2023-07-01 06:40:42', 'обувь профилактическая\\ортопед'),
(63, 58, 1, 1, '[\"продольное плоскостопие 2 ст\"]', 'qsjpQFuarCtUBgy6tyvjSvhVndQE4e-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 06:51:02', '2023-07-01 06:51:02', NULL),
(64, 59, 1, 1, '[\"продольно поперечное плоскостопие 1-2 степени\"]', 'fAhIl5yEvESDJw4GwmUNknwjDjVhCY-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 07:04:45', '2023-07-01 07:04:45', NULL),
(65, 60, 1, 1, '[\"Продольно поперечное плоскостопие 2-3 степени\"]', 'pKwUnef7cFnfLk0o139R86iKwf2mDB-metabmFtZQ==-.jpg', 1.80, 1.80, NULL, NULL, NULL, NULL, 'M', '2023-07-01 07:14:21', '2023-07-01 07:14:21', NULL),
(66, 61, 1, 1, '[\"Продольное плоскостопие 2 степени\"]', 'KHt45lejQz77dbtqlpdvtqB16TAgB9-metabmFtZQ==-.jpg', 2.20, 2.20, 0.70, NULL, NULL, NULL, NULL, '2023-07-01 07:22:58', '2023-07-01 07:22:58', NULL),
(67, 62, 1, 1, '[\"Нарушение осанки\"]', 'pb9zzHBudKF2FiJSwQFWDwNYPZm7up-metabmFtZQ==-.jpg', 1.80, 1.80, 0.40, NULL, NULL, NULL, NULL, '2023-07-01 07:36:49', '2023-07-01 07:36:49', NULL),
(68, 63, 1, 1, '[\"Продольное плоскостопие 1 степени\"]', '00yAMhrCyEfTwIkMPDhPf0nL1H7msR-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 07:42:19', '2023-07-01 07:42:19', NULL),
(69, 64, 1, 1, '[\"Поперечное плоскостостопие  2 степени\"]', '1vJQ0ZFqZVVPMq6dJ8N0k7ZXbu4n1g-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, 'M', '2023-07-01 07:58:33', '2023-07-01 07:58:33', NULL),
(70, 65, 1, 1, '[\"Продольное плоскостопие 2 степени\"]', 'OGe6oj6twjy1c9R80PrtTFJgUCiSA1-metabmFtZQ==-.jpg', 2.00, 2.00, 0.50, NULL, NULL, NULL, NULL, '2023-07-01 08:33:24', '2023-07-01 08:33:24', NULL),
(71, 66, 1, 1, '[\"продольно-поперечное плоскостопие 1-2 степени\"]', 'z27Q4ogajGZ9edQmyv3pwI69GPnDQf-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 08:39:58', '2023-07-01 08:39:58', NULL),
(72, 67, 1, 1, '[\"На момент осмотра стопа соответствует возрасту\"]', 'y6QmcGX3Kp7kwds5RTSBePFpY7pRg5-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 08:57:00', '2023-07-01 08:57:00', NULL),
(73, 68, 1, 1, '[\"Поперечное плоскостопие\"]', 'vPmvlU1MyMwIBI670MmGhi9g5HiLIl-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 09:05:07', '2023-07-01 09:05:07', NULL),
(74, 69, 1, 1, '[\"продольное плоскостопие 1-2 ст\"]', 'GkwCl58Vc1Vvrqr5Vd8q9bW5cFgwAd-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 09:35:13', '2023-07-01 09:35:13', NULL),
(75, 70, 1, 1, '[\"продольно поперечное плоскостопие 2 степени с вальгусной постановкой стопы\"]', 'Y75deh6Z6YKLZ4XpsBA0NxfNPkAafn-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 09:57:01', '2023-07-01 09:57:01', NULL),
(76, 71, 1, 1, '[\"Продольно поперечное плоскостопие 2-3 стпепени\"]', '6W3tTsc7qdcfWWxWDgosaK1KxGEenL-metabmFtZQ==-.jpg', 2.00, 2.00, 0.40, NULL, NULL, NULL, NULL, '2023-07-01 10:03:37', '2023-07-01 10:03:37', NULL),
(77, 71, 1, 1, '[\"Продольно поперечное плоскостопие 2-3 степени\"]', 'BBzQOnz0meFpKWihqHxK5GUCGqQMY9-metabmFtZQ==-.jpg', 2.00, 2.00, 0.40, NULL, NULL, NULL, 'S', '2023-07-01 10:04:52', '2023-07-01 10:04:52', NULL),
(78, 72, 1, 1, '[\"Продольное поперечное плоскостопие 1 ст\"]', 'apC8IgRN5rNwvzhYxeQYlSOX0RocSe-metabmFtZQ==-.jpg', 2.00, 2.00, 0.40, NULL, NULL, NULL, NULL, '2023-07-01 10:09:34', '2023-07-01 10:09:34', NULL),
(79, 73, 1, 1, '[\"Продольное плоскостопие 1 степени\"]', '5vQ6gft8EqLqFSG38WxuvbWDv3R6KT-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 10:16:58', '2023-07-01 10:16:58', NULL),
(80, 74, 1, 1, '[\"Продольное поперечное плоскостопие 1-2 степени\\nПяточная шпора\"]', 'QjQcIyegPCwZbrQeE3JACqYxAvfXQI-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-01 10:54:37', '2023-07-01 10:54:37', NULL),
(81, 75, 1, 1, '[\"на момент осмотра стопа соответствует возрасту\"]', '3TeRirJJjZQ2KPWfKoQXCnOuBeYsGW-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-03 04:03:32', '2023-07-03 04:03:32', NULL),
(82, 76, 1, 1, '[\"вальгусная постановка стоп\"]', 'U9PtDD4OIAVKB8Oq4suVUcnRLLSFD1-metabmFtZQ==-.jpg', 1.90, 1.90, 0.30, NULL, NULL, NULL, NULL, '2023-07-03 04:09:49', '2023-07-03 04:09:49', NULL),
(83, 77, 1, 1, '[\"статическое плоскостопие1ст поперечное плоскостопие\"]', 'XCoSVHLSM14EEWyLIHdGQVm7BkCnMC-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 04:16:05', '2023-07-03 04:16:05', NULL),
(84, 78, 1, 1, '[\"продольное плоскостопие1ст\"]', 'tcaYmFxOh77MiyyEJJdEZxP8zrO8C2-metabmFtZQ==-.jpg', 2.00, 2.00, 0.70, NULL, NULL, NULL, NULL, '2023-07-03 04:23:29', '2023-07-03 04:23:29', NULL),
(85, 79, 1, 1, '[\"Продольное плоскостопие 3 ст с вальгусной постановкой стопы\"]', 'N9vik5N1RgV7KYIFaq6xg7dfm6ZJ7O-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 04:35:52', '2023-07-03 04:35:52', NULL),
(86, 80, 1, 1, '[\"остеобластохондродисплазия\"]', 's3FhdiGTiRwTwOyARiQnHu9wcFR5KN-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 04:58:52', '2023-07-03 04:58:52', NULL),
(87, 81, 1, 1, '[\"Поперечное плоскостопие 3 ст\"]', 'px7fkLMDxkZmpFguotHNwPN9Ck44R5-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, 'M', '2023-07-03 05:38:22', '2023-07-03 05:38:22', NULL),
(88, 82, 1, 1, '[\"Плосковальгусная постановка стопы 3 ст. сколиоз \"]', '5fYinsXYUM7XX40WuvrTWgjzPF3OgT-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 05:51:10', '2023-07-03 05:51:10', NULL),
(89, 83, 1, 1, '[\"плосковальгусная постановка стопы 1 ст\"]', '3Fmjj8XRiQL0vvemgJIoZj0YSS44U5-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 05:56:43', '2023-07-03 05:56:43', NULL),
(90, 84, 1, 1, '[\" продольно-поперечное плоскостопие\"]', 'foj56p5lglkY97A7SFxC7SbJXCywsM-metabmFtZQ==-.jpg', 1.80, 1.80, 0.50, NULL, NULL, NULL, NULL, '2023-07-03 06:04:40', '2023-07-03 06:04:40', NULL),
(91, 85, 1, 1, '[\"поперечное плоскостопие 1 ст с вальгусной постановкой стопы\"]', 'C7vua28cYmRFyXSS5Tcfkj65rtByzu-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 06:14:14', '2023-07-03 06:14:14', NULL),
(92, 86, 1, 1, '[\"Продольное плоскостопие с вальгусной постановкой стопы 2 ст\"]', 'awjwL55auPwVoLUOEsjNnR2NfIdgch-metabmFtZQ==-.jpg', 2.40, 2.40, 0.70, NULL, NULL, NULL, NULL, '2023-07-03 06:21:58', '2023-07-03 06:21:58', NULL),
(95, 88, 1, 1, '[\"плоско вальгусная поставка стопы\"]', 'lXAgjNmiu4uXlqES6Q9S2ONQcPlfsr-metabmFtZQ==-.jpg', 1.00, 1.00, NULL, NULL, NULL, NULL, NULL, '2023-07-03 06:39:56', '2023-07-03 06:39:56', '8см ортопедическая обувь'),
(96, 89, 1, 1, '[\"продольно поперечное плоскостопие 3 ст с вальгусной постановкой стопы\"]', 'puRFHcfbK5ElvLt33D7kypW6fR8gGn-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, 'S', '2023-07-03 06:50:16', '2023-07-03 06:50:16', NULL),
(97, 90, 1, 1, '[\"вальгусная постановка стопы 2 ст\"]', 'h87QFK3jH5LnbxFUchl7gIfVhtTqoI-metabmFtZQ==-.jpg', 2.00, 2.00, 0.40, NULL, NULL, NULL, NULL, '2023-07-03 07:00:22', '2023-07-03 07:00:22', NULL),
(98, 91, 1, 1, '[\"поперечное плоскостопие с вальгусной постановкой стопы\"]', 'cDnAoWyUdx8uKKVsLL60RScQOGG4kC-metabmFtZQ==-.jpg', 2.20, 2.20, 0.50, NULL, NULL, NULL, NULL, '2023-07-03 07:07:10', '2023-07-03 07:07:10', NULL),
(99, 92, 1, 1, '[\"на момент осмотра стопа соответствует возрасту\"]', 'blNYVMPoCUJ9HgXMswsM1WhRyhTSG3-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-03 07:15:03', '2023-07-03 07:15:03', 'профилактическая'),
(100, 93, 1, 1, '[\"вальгусная постановка стоп2ст\"]', 'aNbDyiPYd9hGEx4d0jf19CsMR339HA-metabmFtZQ==-.jpg', 2.10, 2.10, 0.30, NULL, NULL, NULL, NULL, '2023-07-03 07:23:00', '2023-07-03 07:23:00', NULL),
(101, 94, 1, 1, '[\"ДЦП\"]', 'yKm2mSo1uhRBvcuC4Q4aOu0NdUGjXZ-metabmFtZQ==-.jpg', 1.40, 1.40, NULL, NULL, NULL, NULL, NULL, '2023-07-03 07:29:44', '2023-07-03 07:29:44', 'ортопедическая обувь 2 й берец'),
(102, 95, 1, 1, '[\"вальгусная постановка стопы справа\"]', 'pyrqGV6DCmjAwviuTO0v0egfHUO6YE-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 07:40:24', '2023-07-03 07:40:24', NULL),
(103, 96, 1, 1, '[\"вальгусная постановка стоп\"]', 'j0cxhvCMzcjI5WZGNVGaFbAWNNoJuN-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-03 08:25:16', '2023-07-03 08:25:16', NULL),
(104, 97, 1, 1, '[\"вальгусная постановка стоп2ст\"]', 'dn13HxpdlWi49rDaFxRgM4w0AKYe16-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-03 08:26:49', '2023-07-03 08:26:49', NULL),
(105, 98, 1, 1, '[\"Поперечное плоскостопие  1 степени\"]', 'HCLfMA2Es5DN3MTBkbLPPSpNCq70Qs-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2023-07-03 08:32:30', '2023-07-03 08:32:30', NULL),
(106, 99, 1, 1, '[\"плосковальгусная постановка стопы\"]', 'pVblC2pLqTDzubrpjcCZMbGYM5AaUD-metabmFtZQ==-.jpg', 1.00, 1.00, NULL, NULL, NULL, NULL, NULL, '2023-07-03 09:06:02', '2023-07-03 09:06:02', 'ортопедимческая обувь 8 см'),
(107, 100, 1, 1, '[\"плоско вальгусная постановка стопы 1 ст\"]', 'ffKxcsagaTzlnCIzesXMXHewPcw7bc-metabmFtZQ==-.jpg', 2.50, 2.50, 0.70, NULL, NULL, NULL, NULL, '2023-07-03 09:15:10', '2023-07-03 09:15:10', NULL),
(108, 101, 1, 1, '[\"плоско-вальусная постановка стопы 1-2 ст\"]', 'dxGMm93bLguz6AyRrlJ6lq0MX6GlbV-metabmFtZQ==-.jpg', 2.40, 2.40, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 09:20:10', '2023-07-03 09:20:10', NULL),
(109, 102, 1, 1, '[\"вальгусная постановка стопы, сколиоз\"]', 'cvOavIDqa1KJJee066im5eVX7Snskh-metabmFtZQ==-.jpg', 2.10, 2.10, 0.40, NULL, NULL, NULL, NULL, '2023-07-03 09:27:15', '2023-07-03 09:27:15', NULL),
(110, 103, 1, 1, '[\"вальгусная постановка стопы \"]', 'HgH1qqDaFx4WpSQeI0fbpBaFlazqYt-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, NULL, '2023-07-03 10:00:51', '2023-07-03 10:00:51', NULL),
(111, 104, 1, 1, '[\"На момент осмотра стопа соответствует возрасту\"]', 'Hd22d8BiPW8OaMbIEGWtDK9CiUGL10-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-03 10:05:44', '2023-07-03 10:05:44', 'Для косолапости'),
(112, 105, 1, 1, '[\"статическое плоскостопие 2 ст\"]', 'FpBj3UppnAppn9Plol7wSW5pgc0BMO-metabmFtZQ==-.jpg', 2.00, 2.00, 0.70, NULL, NULL, NULL, NULL, '2023-07-03 10:24:05', '2023-07-03 10:24:05', NULL),
(113, 106, 1, 1, '[\"На момент осмотра стопа соответствует возрасту\"]', 'SMOmabMwxkMjs4Hzh00Akk11FMNlsv-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-03 10:32:24', '2023-07-03 10:32:24', NULL),
(114, 107, 1, 1, '[\"поперечное плоскостопие \"]', 'XpSQApRZiwgrMRkkj8mukDWHCQoMCA-metabmFtZQ==-.jpg', 2.00, 2.00, 0.70, NULL, NULL, NULL, NULL, '2023-07-03 10:47:18', '2023-07-03 10:47:18', NULL),
(115, 108, 1, 1, '[\"продольное плоскостопие \"]', 'qiaJp06iPeJXzNUbJOLUKIq5Ii8Rx7-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, NULL, '2023-07-03 10:54:46', '2023-07-03 10:54:46', NULL),
(116, 109, 1, 1, '[\"Посттравматическая вальгусная постановка стопы слева\"]', 'XXyzI2iwdMrsbb4rGeHCrosox0J47P-metabmFtZQ==-.jpg', 1.40, 1.40, NULL, NULL, NULL, NULL, NULL, '2023-07-03 11:04:31', '2023-07-03 11:04:31', NULL),
(117, 111, 1, 1, '[\"укорочение левой ноги 3 см,\"]', 'X6pnhmskteAOIqsqiQSS5eoHOR3j8E-metabmFtZQ==-.jpg', 1.80, 1.80, 0.50, NULL, NULL, NULL, NULL, '2023-07-04 04:15:47', '2023-07-04 04:15:47', NULL),
(118, 112, 1, 1, '[\"Пяточная шпора слева\"]', 'Fv5otkYD4RFXBaIp3fWNnj8ExhZB3s-metabmFtZQ==-.jpg', 1.80, 1.80, 0.50, NULL, NULL, NULL, NULL, '2023-07-04 04:25:03', '2023-07-04 04:25:03', NULL),
(119, 113, 1, 1, '[\"продольное плоскостопие. Артроз коленного сустава слева\"]', 'e62cFXysWShOwX0uYzQGsHXXz6XMsn-metabmFtZQ==-.jpg', 1.60, 1.60, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 04:50:10', '2023-07-04 04:50:10', NULL),
(120, 114, 1, 1, '[\"Плоско вальгусая постановка стопы 2 ст\"]', 'S5iAVYcJ6RNgoVWS2QeXM6gExbkM1P-metabmFtZQ==-.jpg', 2.00, 2.00, 0.50, NULL, NULL, NULL, NULL, '2023-07-04 05:00:46', '2023-07-04 05:00:46', NULL),
(121, 115, 1, 1, '[\"продольное плоскостопие 3 ст с вальгусной постановкой стопы\"]', '8bjkjiEBgXPXULtcZYvJYT2sTOVEhZ-metabmFtZQ==-.jpg', 1.70, 1.70, 0.40, NULL, NULL, NULL, NULL, '2023-07-04 05:11:02', '2023-07-04 05:11:02', NULL),
(122, 116, 1, 1, '[\"вальгусная постановка стопы\"]', 'pAq71yLtF0usRJaqK5yx60xKWBgGgq-metabmFtZQ==-.jpg', 1.00, 1.00, NULL, NULL, NULL, NULL, NULL, '2023-07-04 05:15:21', '2023-07-04 05:15:21', 'ортопедическая обувь 8 см'),
(123, 117, 1, 1, '[\"продольное плоскостопие 1 ст с вальгусной постановкой стопы слева \"]', 'ADWBR5Psf0jC0IxkunAoIz1BaBfQiC-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 05:31:58', '2023-07-04 05:31:58', NULL),
(124, 118, 1, 1, '[\"вальгусная постановка стопы\"]', 'zVkgoTmQcTtc0BLGb6KYPRMGDR9Q6e-metabmFtZQ==-.jpg', 0.90, 0.90, NULL, NULL, NULL, NULL, NULL, '2023-07-04 05:41:12', '2023-07-04 05:41:12', 'ортопедическая обувь 8 см'),
(125, 119, 1, 1, '[\"плоско вальгусная постановка стопы\"]', '2WU3D2lvG2BitijRXtff5TRy9fkqYf-metabmFtZQ==-.jpg', 1.20, 1.20, NULL, NULL, NULL, NULL, NULL, '2023-07-04 05:48:36', '2023-07-04 05:48:36', NULL),
(126, 120, 1, 1, '[\"продольно поперечное плоскостопие 1 ст с вальгусной постановкой стопы\"]', '7d0tWNspRVt2se4CPSom109JOPYcJw-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 06:02:07', '2023-07-04 06:02:07', NULL),
(127, 121, 1, 1, '[\"продольно поперечное плоскостопие с вальгусной постановкой стопы\"]', 'U4gDvmHknkUc5OOzk3gVHxOOgVZ8LC-metabmFtZQ==-.jpg', 1.80, 1.80, 0.50, NULL, NULL, NULL, NULL, '2023-07-04 06:20:48', '2023-07-04 06:20:48', NULL),
(128, 122, 1, 1, '[\"продольное плоскостопие 2 ст с вальгусной постановкой стопы\"]', '6g8vvAMB3SniCpyQXXQiZOxsdbeIEF-metabmFtZQ==-.jpg', 2.40, 2.40, 0.70, NULL, NULL, NULL, NULL, '2023-07-04 06:43:46', '2023-07-04 06:43:46', NULL),
(129, 123, 1, 1, '[\"продольное плоскостопие 2 ст\"]', 'DFW7lOhpnyoequtfPZXupEDT7H5jPq-metabmFtZQ==-.jpg', 2.40, 2.40, 0.70, NULL, NULL, NULL, NULL, '2023-07-04 07:01:02', '2023-07-04 07:01:02', NULL),
(130, 124, 1, 1, '[\"вальгусная постановка стопы\"]', 'HLImZ6VWtDuiRUJhVzGkXLrW7ytbjr-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-04 07:07:14', '2023-07-04 07:07:14', 'ортопедическая обувь 8 см'),
(131, 125, 1, 1, '[\"Плоско вальгусная постановка стопы 2 ст\"]', 'AgUhwUbzwyQ7kTHRodnUG7Y5XIO5Ho-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 07:44:25', '2023-07-04 07:44:25', NULL),
(132, 126, 1, 1, '[\"плоско вальгусная постановка стопы 1 ст\"]', 'oFCd09jIQvoDAPR9AZfHqHiFrwHLdm-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 07:53:41', '2023-07-04 07:53:41', NULL),
(133, 127, 1, 1, '[\"Продольное плоскостопие 1 ст \"]', 'jKyXWlawPD3jtf0gWTMwQLzo6jLzRe-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 08:06:48', '2023-07-04 08:06:48', NULL),
(134, 129, 1, 1, '[\"вальгусная постановка стопы\"]', '1POl4OMcL9t8ssX23Zig5LHDEsZEDw-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-04 09:54:54', '2023-07-04 09:56:16', 'Ортопедическая обувь 8 см'),
(135, 130, 1, 1, '[\"На момент осмотра стопа соответствует возрасту\"]', 'TuPPErxm5WmpOHmeD9Sv05xxTxJM6t-metabmFtZQ==-.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-04 10:03:51', '2023-07-04 10:03:51', NULL),
(136, 131, 1, 1, '[\"продольное плоскостопие, сколиоз \"]', '1wSSEM0fcv3nMvsslLNIk4Lu3KGjYW-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 10:14:32', '2023-07-04 10:14:32', NULL),
(137, 132, 1, 1, '[\"поперечное плоскостопие 2 ст\"]', 'jy8oqAEP93BzBdW9HovE8bV7BP0UYX-metabmFtZQ==-.jpg', 1.80, 1.80, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 10:25:52', '2023-07-04 10:25:52', NULL),
(138, 133, 1, 1, '[\"Продольное плоскостопие 1 ст\"]', '7mvkHaVBCXFJpAX436FMzLZkbstliK-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 10:48:48', '2023-07-04 10:48:48', NULL),
(139, 134, 1, 1, '[\"продольное плоскостопие 2 ст\"]', '1d8NfbFhcYQZrkq7acZ81UtreupJhC-metabmFtZQ==-.jpg', 2.40, 2.40, 0.70, NULL, NULL, NULL, NULL, '2023-07-04 11:00:18', '2023-07-04 11:00:18', NULL),
(140, 135, 1, 1, '[\"вальгусная постановка стопы\"]', 'L5jkxevlJjuG4nUEwkoqqUUrY7soCr-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, NULL, '2023-07-04 11:12:25', '2023-07-04 11:12:25', NULL),
(141, 136, 1, 1, '[\"плоско-вальгусная постановка стопы 1-2 ст\"]', '0eepoLK686pJtEIXxWI6HwJ60h0nq5-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 11:37:18', '2023-07-04 11:37:18', NULL),
(142, 137, 1, 1, '[\"Варусная стопа\"]', '1XhXWGxADz4mc0E75OSDuayLP29bnJ-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-04 11:46:51', '2023-07-04 11:46:51', NULL),
(143, 138, 1, 1, '[\"Поперечное плоскостопие 2-3 ст с вальгусной постановкой стопы\"]', '9Yr7WkxWalv1KSxakQEVICZKY6XRad-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, 'S', '2023-07-05 04:38:53', '2023-07-05 04:38:53', NULL),
(144, 139, 1, 1, '[\"продольно-поперечное плоскостопие 1 ст с вальгусной постановкой стопы\"]', 'ihWGgSTfkvchEFXHpUlMzDgwJ84JOq-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-05 05:05:18', '2023-07-05 05:05:18', NULL),
(145, 140, 1, 1, '[\"продольное плоскостопие 1 ст\"]', '3ArwealKlqTVxR2Wfa6nCt19MtOvWC-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-05 05:18:33', '2023-07-05 05:18:33', NULL),
(146, 141, 1, 1, '[\"продольно-поперечное плоскостопие 1-2 ст\"]', 'xikfjxCCXHRdA8fIKD1C6ioG3zLQsW-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, 'M', '2023-07-05 05:35:52', '2023-07-05 05:35:52', NULL),
(147, 142, 1, 1, '[\"ДЦП. плоско вальгусная  постановка стопы 3 ст\"]', 'Uc999FGHaskRYHTyeHjwye3LNS88cD-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-05 05:50:28', '2023-07-05 05:50:28', NULL),
(148, 143, 1, 1, '[\"статическое плоскостопие 1 ст\"]', 'j6DlP9k0Z5sdN6BIwU3ypZZKICcA7l-metabmFtZQ==-.jpg', 2.30, 2.30, 0.60, NULL, NULL, NULL, NULL, '2023-07-05 06:08:50', '2023-07-05 06:08:50', NULL),
(149, 144, 1, 1, '[\"плоско вальгусная постановка стопы 2 ст\"]', 'QNRhx3tQj5Aa7VAg22S9CwgtezftQ9-metabmFtZQ==-.jpg', 2.30, 2.30, 0.60, NULL, NULL, NULL, NULL, '2023-07-05 06:50:30', '2023-07-05 06:50:30', NULL),
(150, 145, 1, 1, '[\"продольно поперечное плоскостопие 2 ст с вальгусной постановкой стопы\"]', '7xfTK5Q0m3v50SkSCwrYwsBDPyfjLU-metabmFtZQ==-.jpg', 1.80, 1.80, 0.50, NULL, NULL, NULL, NULL, '2023-07-05 07:22:34', '2023-07-05 07:22:34', NULL),
(151, 146, 1, 1, '[\"продольное плоскостопие 1-2 ст\"]', 'kmOte9i9eWiyXLeQ2za9KfWOFitqLc-metabmFtZQ==-.jpg', 2.40, 2.40, 0.60, NULL, NULL, NULL, NULL, '2023-07-05 08:53:24', '2023-07-05 08:53:24', NULL),
(152, 147, 1, 1, '[\"вальгусная постановка стопы\"]', 'U85mvQWi2jGYlWSBtYNLTVCJfxKqZ3-metabmFtZQ==-.jpg', 1.10, 1.10, NULL, NULL, NULL, NULL, NULL, '2023-07-05 08:59:46', '2023-07-05 08:59:46', 'Ортопедическая обувь 8 см'),
(153, 148, 1, 1, '[\"плоско вальгусная постановка стопы\"]', 'vziRSU7yUSzQrLXqPjZRZeaqtCeM5p-metabmFtZQ==-.jpg', 1.90, 1.90, 0.50, NULL, NULL, NULL, NULL, '2023-07-05 09:18:35', '2023-07-05 09:18:35', NULL),
(154, 149, 1, 1, '[\"плоско вальгусная постановка стопы  1-2\"]', 'cbxAvt2eXYVC02cWbs30ffzmVDfNGE-metabmFtZQ==-.jpg', 2.00, 2.00, 0.50, NULL, NULL, NULL, NULL, '2023-07-05 09:31:27', '2023-07-05 09:31:27', NULL),
(155, 150, 1, 1, '[\"плоско вальгусная постановка стопы 3 ст\"]', '0b5qwJlNZQgYCQDgJD2ERaeKEsunAm-metabmFtZQ==-.jpg', 2.20, 2.20, 0.70, NULL, NULL, NULL, NULL, '2023-07-05 09:40:22', '2023-07-05 09:40:22', NULL),
(156, 151, 1, 1, '[]', '4Off89IFnSRBw6NSgug2VeHnZpAT8s-metabmFtZQ==-.jpg', 1.80, 1.80, NULL, NULL, NULL, NULL, NULL, '2023-07-05 09:50:49', '2023-07-05 09:50:49', 'ортопедическая обувь 12 см'),
(157, 152, 1, 1, '[\"плоско вальгусная постановка стопы 2-3 ст\"]', 'SgmZgx1GxQstllyQFxmrzxKC5jqwBb-metabmFtZQ==-.jpg', 1.70, 1.70, NULL, NULL, NULL, NULL, NULL, '2023-07-05 10:02:06', '2023-07-05 10:02:06', 'ортопедическая обувь 10-12 см'),
(158, 153, 1, 1, '[\"продольное плоскостопие 1 ст . пяточная шпора с двух сторон\"]', '8LFTsjlCxiUaZpL0tHz3jCNDILa00Y-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-05 10:17:09', '2023-07-05 10:17:09', NULL),
(159, 154, 1, 1, '[\"плоско-вальгусная постановка стопы 1-2 ст\"]', 'SIa4qTWluiaWcWOC0VUHknvp39xrYb-metabmFtZQ==-.jpg', 2.20, 2.20, 0.70, NULL, NULL, NULL, NULL, '2023-07-05 10:33:23', '2023-07-05 10:33:23', NULL),
(160, 155, 1, 1, '[\"продольное плоскостопие 3 ст с вальгусной постановкой стопы\"]', '2tHOrvZDwji84hKhcSNv2RnhYwO6iG-metabmFtZQ==-.jpg', 2.30, 2.30, 0.70, NULL, NULL, NULL, NULL, '2023-07-05 10:42:58', '2023-07-05 10:42:58', NULL),
(161, 156, 1, 1, '[\"продольно поперечное плоскостопие 2 ст\"]', 'Dl4SwAxpSynNI53jVcoFo295w1RyCZ-metabmFtZQ==-.jpg', 2.00, 2.00, 0.50, NULL, NULL, NULL, 'S', '2023-07-05 11:04:02', '2023-07-05 11:04:02', NULL),
(162, 157, 1, 1, '[\"плоско-вальгусная постановка стопы 1-2 ст\"]', 'YHNxfKhJyFNQ2VcoANM1FB9JQ770Jt-metabmFtZQ==-.jpg', 1.60, 1.60, NULL, NULL, NULL, NULL, NULL, '2023-07-05 11:10:24', '2023-07-05 11:10:24', NULL),
(163, 158, 1, 1, '[\"Продольное плоскостопие 3 ст . с вальгусная постановкой стопы\"]', 'ZgjLrdd6xy6UqsBK2iG4t6Z0eM9iGF-metabmFtZQ==-.jpg', 2.20, 2.20, 0.70, NULL, NULL, NULL, NULL, '2023-07-05 11:24:38', '2023-07-05 11:24:38', NULL),
(164, 159, 1, 1, '[\"продольное плоскостопие 2 ст с вальгусной постановкой стопы\"]', 'w5iR8AtZJFcO6VwIxM0u6XyAz39sxd-metabmFtZQ==-.jpg', 2.20, 2.20, 0.70, NULL, NULL, NULL, NULL, '2023-07-05 11:42:15', '2023-07-05 11:42:15', NULL),
(165, 160, 1, 1, '[\"продольное плоскостопие 1-2 ст\"]', 'D6woiWUayJXavGKzj16IAM1K72XdA1-metabmFtZQ==-.jpg', 2.10, 2.10, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 04:14:38', '2023-07-07 04:14:38', NULL),
(166, 161, 1, 1, '[\"вальгусная постановка стопы \"]', 'uP8K8NbFLEL2rhlDRFZCOMzm8xTqGY-metabmFtZQ==-.jpg', 1.40, 1.40, NULL, NULL, NULL, NULL, NULL, '2023-07-07 04:59:27', '2023-07-07 04:59:27', NULL),
(167, 162, 1, 1, '[\"плоско вальгусная постановка стопы 1 ст\"]', 'uXkeAgOQr2Eb90vePrbMhK9tTndSxc-metabmFtZQ==-.jpg', 2.10, 2.10, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 05:10:21', '2023-07-07 05:10:21', NULL),
(168, 163, 1, 1, '[\"плоско вальгусная постановка стопы 1-2 ст\"]', 'iJMfuo6OKKIsTkzKfpsJ6s9rFI87nR-metabmFtZQ==-.jpg', 2.30, 2.30, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 05:23:33', '2023-07-07 05:23:33', NULL),
(169, 164, 1, 1, '[\"продольно поперечное плоскостопие с вальгусной постановкой стопы\"]', 'p2psPotgNHeP8puXsHtQ33ulGhTIgx-metabmFtZQ==-.jpg', 1.70, 1.70, 0.40, NULL, NULL, NULL, NULL, '2023-07-07 05:36:54', '2023-07-07 05:36:54', NULL),
(170, 165, 1, 1, '[\"плоско-вальгусная постановка стопы 2-3\"]', 'j6FKajJbL38Hr9wGyO2Xjol3FCe0FL-metabmFtZQ==-.jpg', 2.30, 2.30, 0.70, NULL, NULL, NULL, NULL, '2023-07-07 05:46:54', '2023-07-07 05:46:54', NULL),
(171, 166, 1, 1, '[\"продольное плоскостопие 1-2 ст с вальгусной постановкой стопы\"]', 'UGkKNmc9ctAzfG3l8kaNW14Eywy8SD-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 05:58:18', '2023-07-07 05:58:18', NULL),
(172, 167, 1, 1, '[\"продольно поперечное плоскостопие \"]', 'SfyCkzcPvyT0EYnqVbugLmmfa1WPdE-metabmFtZQ==-.jpg', 2.10, 2.10, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 06:10:43', '2023-07-07 06:10:43', NULL),
(173, 168, 1, 1, '[\"ДЦП\"]', 'HNAv2iZBMkROM5wHM6nMzMahvjigfB-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-07 06:23:51', '2023-07-07 06:23:51', 'Ортопедическая обувь 10-12 см'),
(174, 169, 1, 1, '[\"продольно поперечное плоскостопие 2 ст. пяточная шпора\"]', '7CDy4wruaVzOPsBXLjpj61dy8t4q5e-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 06:45:31', '2023-07-07 06:45:31', NULL),
(175, 170, 1, 1, '[\"ДЦП. вальгусная постановка стопы\"]', '24yCJA8GkUAEtOdYpPIYaGSRP8pQ4o-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-07 06:53:21', '2023-07-07 06:53:21', 'Ортопедическая обувь 8 см'),
(176, 171, 1, 1, '[\"продольное плоскостопие 1-2 ст\"]', 'BDVb41uyVTeOTcGZyE5GRTcNNcAuof-metabmFtZQ==-.jpg', 1.70, 1.70, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 07:13:53', '2023-07-07 07:13:53', NULL),
(177, 172, 1, 1, '[\"продольное плоскостопие 1-2 ст\"]', 'kXT7uSBrYoglH6V2i9YvU3TzXwLXFT-metabmFtZQ==-.jpg', 2.00, 2.00, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 07:30:42', '2023-07-07 07:30:42', NULL),
(178, 173, 1, 1, '[\"Плоско-вальгусная постановка стопы 1-2 ст\"]', 'mT2vd02LchRzUMPK14XLLLbNsaYGnd-metabmFtZQ==-.jpg', 2.40, 2.40, 0.70, NULL, NULL, NULL, NULL, '2023-07-07 08:49:05', '2023-07-07 08:49:05', NULL),
(179, 174, 1, 1, '[\"продольное плоскостопие 1-2 ст\"]', '51tm2v4cPRA0mn3AhVDLk7sphwRdPT-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 09:15:08', '2023-07-07 09:15:08', NULL),
(180, 175, 1, 1, '[\"плоско вальгусная постановка стопы 1-2 ст\"]', 'nhHD7d63d4BknRjfliPvZ6y0hKZVa5-metabmFtZQ==-.jpg', 2.00, 2.00, 0.50, NULL, NULL, NULL, NULL, '2023-07-07 10:01:08', '2023-07-07 10:01:08', NULL),
(181, 176, 1, 1, '[\"плоско-вальгусная постановка стопы 1-2 ст\"]', 'MtcjxyJvpa8tN0kWl82XZOn2KQeXya-metabmFtZQ==-.jpg', 2.30, 2.30, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 10:10:58', '2023-07-07 10:10:58', NULL),
(182, 177, 1, 1, '[\"плоско-вальгусная постановка стопы 1-2 ст\"]', 'dn7KpnFCGHmwO6mjhzWS3NHRVy5P6b-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 10:24:36', '2023-07-07 10:24:36', NULL),
(183, 178, 1, 1, '[\"плоско-вальгусная постановка стопы 1-2 ст\"]', '1ANeWycm3y0lsisAKKcfNehXi6Rfd1-metabmFtZQ==-.jpg', 1.90, 1.90, 0.60, NULL, NULL, NULL, NULL, '2023-07-07 10:37:15', '2023-07-07 10:37:15', NULL),
(184, 179, 1, 1, '[\"плоско-вальгусная постановка стопы 2-3 ст\"]', 'NUFcXS4RqIwmkA0elifbdZLNQDzfUy-metabmFtZQ==-.jpg', 2.40, 2.40, 0.70, NULL, NULL, NULL, NULL, '2023-07-07 10:51:49', '2023-07-07 10:51:49', NULL),
(185, 180, 1, 1, '[\"Продольно поперечное плоскостопие 2-3 ст с вальгусной постановкой стопы\"]', 'yv15WL3QKGs1AW2S7G5FrxfhV5u6zE-metabmFtZQ==-.jpg', 2.40, 2.40, 0.60, NULL, NULL, NULL, 'M', '2023-07-09 07:50:47', '2023-07-09 07:50:47', NULL),
(186, 181, 1, 1, '[\"продольное плоскостопие с вальгусной постановкой стопы \"]', 'X8jI34DjHnp1COHVd8NjcJRWY2q2Xq-metabmFtZQ==-.jpg', 2.20, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-09 08:05:35', '2023-07-09 08:05:35', NULL),
(187, 182, 1, 1, '[\"Варусные деформации (приобретённые)\"]', 'onn986SO3kM3c2OAW9WCZhorxU0Eaf-metabmFtZQ==-.jpg', 2.40, 2.40, 0.60, NULL, NULL, NULL, NULL, '2023-07-09 08:19:08', '2023-07-09 08:19:08', NULL),
(188, 183, 1, 1, '[\"вальгусная постановка стопы\"]', 'VnIzj4SuIZ6lKk0Bg38a1Chja7tZkS-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-09 08:24:49', '2023-07-09 08:24:49', 'ортопедическая обувь 8 см'),
(189, 184, 1, 1, '[\"Нарушение статики 1-2 ст\"]', 'EunddwBuRaUGVwoNqY7CnPxbVeXnKe-metabmFtZQ==-.jpg', 2.30, 2.30, 0.70, NULL, NULL, NULL, NULL, '2023-07-09 08:40:56', '2023-07-09 08:40:56', NULL),
(190, 185, 1, 1, '[\"поперечное плоскостопие 1-2 ст с вальгусной постановкой стопы\"]', 'l9PwboowFy1ApZdoRyPDc3UAcgLHB9-metabmFtZQ==-.jpg', 2.30, 2.20, 0.60, NULL, NULL, NULL, NULL, '2023-07-09 08:54:24', '2023-07-09 08:54:24', NULL),
(191, 186, 1, 1, '[\"вальгусная постановка стопы\"]', 'en9MGU7Gs9oXI18mD16JFBd810Fshp-metabmFtZQ==-.jpg', 1.50, 1.50, NULL, NULL, NULL, NULL, NULL, '2023-07-09 09:05:34', '2023-07-09 09:05:34', NULL),
(192, 187, 1, 1, '[\"вальгусная постановка стопы \"]', 'cMTwTtpItie4ztIRV9LZzvx44HzWEv-metabmFtZQ==-.jpg', 1.30, 1.30, NULL, NULL, NULL, NULL, NULL, '2023-07-09 09:41:21', '2023-07-09 09:41:21', NULL),
(193, 188, 1, 1, '[\"продольное плоскостопие 1-2 ст с вальгусной постановкой стопы\"]', 'sDC7Bg8VOLTwR4dTGTaBCY2Vq5MicN-metabmFtZQ==-.jpg', 2.40, 2.40, 0.60, NULL, NULL, NULL, NULL, '2023-07-09 10:15:49', '2023-07-09 10:15:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `created_at`, `updated_at`, `address`) VALUES
(1, '2023-06-02 10:45:22', '2023-06-02 10:45:22', 'Байтик Баатыра'),
(7, '2023-06-25 20:33:40', '2023-06-25 20:33:40', 'Суеркулова'),
(8, '2023-07-03 03:54:25', '2023-07-03 03:54:25', 'Г. Ош ул. Исхака Разакова 59а');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `text`) VALUES
(1, 'Врожденный вывих бедра односторонний'),
(2, 'Врожденный вывих бедра двусторонний'),
(3, 'Врожденный вывих бедра неуточненный'),
(4, 'Врожденный подвывих бедра односторонний'),
(5, 'Врожденный подвывих бедра двусторонний'),
(6, 'Врожденный подвывих бедра неуточненный'),
(7, 'Неустойчивое бедро, предрасположенность к вывиху бедра, предрасположенность к подвывиху бедра'),
(8, 'Другие врожденные деформации бедра], врожденная дисплазия вертлужной впадины'),
(9, 'Варусные деформации (приобретённые)'),
(10, 'Конско-варусная косолапость'),
(11, 'Пяточно-варусная косолапость'),
(12, 'Варусная стопа'),
(13, 'Другие врожденные варусные деформации стопы (варусная деформация большого пальца стопы врожденная)'),
(14, 'Пяточно-вальгусная косолапость'),
(15, 'Врожденная плоская стопа'),
(16, 'Плоская стопа (приобретённая)'),
(17, 'Другие врожденные вальгусные деформации стопы'),
(18, 'Полая стопа'),
(19, 'Другие врожденные деформации стопы (косолапость)'),
(20, 'Врожденная деформация стопы неуточненная'),
(21, 'статическое плоскостопие'),
(23, 'продольное плоскостопие'),
(25, 'Продольное плоскостопие 1 степени'),
(26, 'Продольное плоскостопие 2 степени'),
(27, 'Продольное плоскостопие 3 степени'),
(28, 'Поперечное плоскостопие  1 степени'),
(29, 'Поперечное плоскостостопие  2 степени'),
(30, 'Поперечное плоскостопие 3 степени'),
(31, 'Продольно-поперечное плоскостопие 1 степени'),
(32, 'Продольно-поперечное плоскостопие 2 степени'),
(33, 'Продольно- поперечное плоскостопие 3 степени');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `description`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Мухамедалиева Наргиза Насырхановна', NULL, 1, '2023-06-02 10:45:34', '2023-06-27 09:53:42'),
(7, 'Сатаров Умид Абдугапарович', NULL, 7, '2023-06-25 12:56:33', '2023-06-27 09:54:07'),
(8, 'Никонов Эрстан Кенчибекович', NULL, 7, '2023-06-27 09:52:02', '2023-06-27 09:52:02'),
(9, 'Юлдошев Абдумалик Холбутаевич', NULL, 1, '2023-06-27 09:53:10', '2023-06-27 09:53:10'),
(10, 'Тест Тестович', NULL, 1, '2023-06-30 07:33:15', '2023-06-30 07:33:15'),
(11, 'Садырбеков Дастан ', NULL, 8, '2023-07-03 04:02:27', '2023-07-03 04:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2023_04_15_153607_create_patients_table', 1),
(27, '2023_05_02_112505_create_doctors_table', 1),
(28, '2023_05_02_112506_create_branches_table', 1),
(29, '2023_05_02_112524_create_appointments_table', 1),
(31, '2023_05_29_151357_create_diagnoses_table', 1),
(32, '2023_05_13_134243_create_permission_tables', 2),
(33, '2023_06_23_095323_add_shoes_to_appointments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `appointments_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone`, `birthdate`, `appointments_id`, `created_at`, `updated_at`) VALUES
(2, 'хоробрых вадим сергеевич', '220026445', '1985-11-22', NULL, '2023-06-05 07:02:12', '2023-06-05 07:02:12'),
(3, 'алмазбекова адэля алмазбековна', NULL, '2000-12-26', NULL, '2023-06-05 07:10:42', '2023-06-05 07:19:27'),
(4, 'мухамедалиева наргиза насырхановна', NULL, NULL, NULL, '2023-06-05 07:26:34', '2023-06-05 07:26:34'),
(5, 'юсупханова диера', NULL, NULL, NULL, '2023-06-05 07:34:48', '2023-06-05 07:34:48'),
(6, 'пелина софия', NULL, '2011-11-22', NULL, '2023-06-05 07:47:53', '2023-06-05 07:55:16'),
(7, 'марибов максат', '0508103105', '2004-10-10', NULL, '2023-06-06 04:09:43', '2023-06-06 04:09:43'),
(8, 'Иванов Алексей', '999 123 6456', '1982-06-09', NULL, '2023-06-25 14:13:20', '2023-06-25 14:13:20'),
(9, 'Иванов Иван Алекссевич', '6785432', '1990-06-22', NULL, '2023-06-25 19:22:39', '2023-06-25 19:22:39'),
(10, 'Иван Иван Иванович', '567788', '1990-04-13', NULL, '2023-06-25 19:37:30', '2023-06-25 19:46:11'),
(11, 'сулейманов альберт', NULL, NULL, NULL, '2023-06-29 05:48:24', '2023-06-29 05:48:24'),
(12, 'сагындыкова к', NULL, '2021-04-04', NULL, '2023-06-29 05:59:40', '2023-06-29 05:59:40'),
(13, 'суванов амир', NULL, '2020-08-21', NULL, '2023-06-29 06:07:14', '2023-06-29 06:07:14'),
(14, 'кубанычбек к о', NULL, '1998-05-29', NULL, '2023-06-29 06:13:57', '2023-06-29 06:13:57'),
(15, 'рустамова сезим 15', NULL, '2023-08-24', NULL, '2023-06-29 07:14:25', '2023-06-29 07:14:25'),
(16, 'рустамова камила 16', NULL, '2021-11-02', NULL, '2023-06-29 07:20:44', '2023-06-29 07:20:44'),
(17, 'Мухамедалиева наргиза', NULL, '1976-02-08', NULL, '2023-06-29 07:41:03', '2023-06-29 07:41:03'),
(18, 'Байгазиев Рамиль 17', NULL, '2014-04-14', NULL, '2023-06-29 08:53:23', '2023-06-29 08:53:23'),
(19, 'байгазиев али 18', NULL, '2016-06-10', NULL, '2023-06-29 08:59:29', '2023-06-29 08:59:29'),
(20, 'байгазиева раида 19', NULL, '2020-06-30', NULL, '2023-06-29 09:02:38', '2023-06-29 09:12:28'),
(21, 'Ахмедова Адеми 20', NULL, '2017-07-10', NULL, '2023-06-29 09:26:20', '2023-06-29 09:26:20'),
(22, 'Есеналиева Амели 21', NULL, '2021-07-25', NULL, '2023-06-29 09:32:55', '2023-06-29 09:45:54'),
(23, 'Шаршиева Эркаим 22', NULL, '2016-01-07', NULL, '2023-06-29 09:40:00', '2023-06-29 09:46:01'),
(24, 'Нурбеков дастан 23', NULL, '2021-07-14', NULL, '2023-06-29 09:53:42', '2023-06-29 09:57:21'),
(25, 'Абитова Заура 24', NULL, '1988-02-05', NULL, '2023-06-29 10:24:58', '2023-06-29 10:24:58'),
(26, 'Мусаев Алихан', NULL, '2015-12-27', NULL, '2023-06-29 10:44:15', '2023-06-29 10:44:15'),
(27, 'усеналиева зуура', NULL, '2010-03-18', NULL, '2023-06-30 04:22:12', '2023-06-30 04:22:12'),
(28, 'усеналиева батма 2', NULL, '2010-03-18', NULL, '2023-06-30 04:29:11', '2023-06-30 04:29:11'),
(29, 'алынбекова 3', NULL, '2007-06-13', NULL, '2023-06-30 04:42:43', '2023-06-30 04:42:43'),
(30, 'сапарбаева ч 4', NULL, '1966-10-31', NULL, '2023-06-30 04:49:26', '2023-06-30 04:49:26'),
(31, 'аскарова 5', NULL, '1980-06-17', NULL, '2023-06-30 04:57:29', '2023-06-30 04:57:29'),
(32, 'курманова 6', NULL, '2001-05-09', NULL, '2023-06-30 05:01:48', '2023-06-30 05:01:48'),
(33, 'жакшылокова ч 7', NULL, '2023-01-07', NULL, '2023-06-30 05:44:07', '2023-06-30 05:44:07'),
(34, 'жакшылокова ч 7', NULL, '2010-01-07', NULL, '2023-06-30 05:44:54', '2023-06-30 05:44:54'),
(35, 'наджипов али 8', NULL, '2020-03-19', NULL, '2023-06-30 06:07:04', '2023-06-30 06:07:04'),
(36, 'наджипов нупислам 9', NULL, NULL, NULL, '2023-06-30 06:12:28', '2023-06-30 06:12:28'),
(37, 'халилов эльдар 10', NULL, NULL, NULL, '2023-06-30 06:19:21', '2023-06-30 06:19:21'),
(38, 'наджипова ж 11', NULL, '2011-10-23', NULL, '2023-06-30 06:33:18', '2023-06-30 06:33:18'),
(39, 'турсунбекова а 12', NULL, '2009-10-29', NULL, '2023-06-30 06:44:50', '2023-06-30 06:44:50'),
(40, 'мусабекова арузат 13', NULL, NULL, NULL, '2023-06-30 06:52:37', '2023-06-30 06:52:37'),
(41, 'сыргакова а 14 ', NULL, '2020-05-11', NULL, '2023-06-30 06:59:58', '2023-06-30 06:59:58'),
(42, ' 15 сыргакова а', NULL, '2017-08-17', NULL, '2023-06-30 07:02:59', '2023-06-30 07:02:59'),
(43, '16 самибаева ', NULL, '1979-03-02', NULL, '2023-06-30 07:07:35', '2023-06-30 07:07:35'),
(44, ' 17 аскарбекова а', NULL, '2018-04-04', NULL, '2023-06-30 07:19:09', '2023-06-30 07:19:09'),
(45, 'Тестовый Пациент', '5568736233', '1990-04-12', NULL, '2023-06-30 07:37:36', '2023-06-30 07:37:36'),
(46, ' 18 таалайбек а', NULL, '2021-10-21', NULL, '2023-06-30 08:27:00', '2023-06-30 08:27:00'),
(47, 'Иван иванов', NULL, '2004-02-08', NULL, '2023-06-30 09:04:24', '2023-06-30 09:04:24'),
(48, '19 качкынбеков билим', NULL, '2021-04-24', NULL, '2023-06-30 09:21:02', '2023-06-30 09:21:02'),
(49, 'Шимов Мансур 20', NULL, '1979-01-23', NULL, '2023-06-30 09:31:05', '2023-06-30 09:31:05'),
(50, '21  нургазы кызы майрам', NULL, '2003-03-03', NULL, '2023-06-30 09:57:00', '2023-06-30 09:57:00'),
(51, '  22 мухамедалиев о', NULL, NULL, NULL, '2023-06-30 10:54:44', '2023-06-30 10:54:44'),
(52, '1 изабеков ', NULL, '2021-01-10', NULL, '2023-07-01 05:49:50', '2023-07-01 05:49:50'),
(53, '2 омурбеков р', NULL, '2016-04-08', NULL, '2023-07-01 05:56:06', '2023-07-01 05:56:06'),
(54, '3 калмурзаев', NULL, '2017-09-07', NULL, '2023-07-01 06:05:25', '2023-07-01 06:05:25'),
(55, '4 изабекова а', NULL, '2018-12-12', NULL, '2023-07-01 06:11:24', '2023-07-01 06:11:24'),
(56, '5 ельчугин', NULL, '1992-03-16', NULL, '2023-07-01 06:30:36', '2023-07-01 06:30:36'),
(57, '6 эсенгельдиева а', NULL, '2022-04-20', NULL, '2023-07-01 06:38:28', '2023-07-01 06:38:28'),
(58, '7 Кубанычбеков бахтьяр', NULL, '1999-12-14', NULL, '2023-07-01 06:45:37', '2023-07-01 06:45:37'),
(59, '8 Мелисова чинара', NULL, '1998-11-20', NULL, '2023-07-01 06:58:36', '2023-07-01 06:58:36'),
(60, 'Чатакова Алтын 9', NULL, '1971-04-10', NULL, '2023-07-01 07:07:32', '2023-07-01 07:16:26'),
(61, 'Клевцов Сергей 10', NULL, '2005-03-11', NULL, '2023-07-01 07:17:09', '2023-07-01 07:17:09'),
(62, 'Жолдошев алиаскар 11', NULL, '2012-12-12', NULL, '2023-07-01 07:31:42', '2023-07-01 07:43:08'),
(63, 'Жолдошева Лира 12', NULL, '1982-02-02', NULL, '2023-07-01 07:37:35', '2023-07-01 07:43:17'),
(64, '13  омурбаева', NULL, '1988-08-13', NULL, '2023-07-01 07:53:55', '2023-07-01 07:53:55'),
(65, 'Талайбеков амир 14', NULL, '2012-04-04', NULL, '2023-07-01 08:28:53', '2023-07-01 08:40:53'),
(66, 'кенжебаева 15', NULL, '1988-11-15', NULL, '2023-07-01 08:34:51', '2023-07-01 08:41:01'),
(67, ' 16 Калбаев', NULL, '1993-03-25', NULL, '2023-07-01 08:51:43', '2023-07-01 08:51:43'),
(68, 'Маслова Людмила 17', NULL, '1946-08-20', NULL, '2023-07-01 09:00:32', '2023-07-01 09:00:32'),
(69, 'Темирбеков 18', NULL, '2001-01-16', NULL, '2023-07-01 09:30:32', '2023-07-01 09:36:11'),
(70, 'негизова самира 19', NULL, '2010-02-08', NULL, '2023-07-01 09:50:39', '2023-07-01 10:10:32'),
(71, 'Негоизова Томерис 20', NULL, '2015-01-07', NULL, '2023-07-01 09:58:00', '2023-07-01 10:17:49'),
(72, 'Негизова сабина 21', NULL, '2011-11-21', NULL, '2023-07-01 10:05:54', '2023-07-01 10:17:58'),
(73, 'Акималиева Жамиля 22', NULL, '1987-02-27', NULL, '2023-07-01 10:11:42', '2023-07-01 10:11:42'),
(74, 'Токтосунова 24', NULL, '1970-10-24', NULL, '2023-07-01 10:41:55', '2023-07-01 10:56:44'),
(75, 'конурбаева с 1', NULL, '2016-04-05', NULL, '2023-07-03 03:59:59', '2023-07-03 04:37:39'),
(76, 'конурбаева нураим 2', NULL, '2012-10-11', NULL, '2023-07-03 04:04:49', '2023-07-03 04:37:27'),
(77, 'опумбаева 3', NULL, '1985-05-17', NULL, '2023-07-03 04:10:46', '2023-07-03 04:37:19'),
(78, 'конурбаев 4', NULL, '1982-05-22', NULL, '2023-07-03 04:18:06', '2023-07-03 04:37:08'),
(79, 'Талантбеков 5', NULL, '2006-12-02', NULL, '2023-07-03 04:29:48', '2023-07-03 04:29:48'),
(80, 'Возз  6', NULL, '2002-01-12', NULL, '2023-07-03 04:49:30', '2023-07-03 04:49:30'),
(81, 'Маматкулова 7', NULL, '1960-09-12', NULL, '2023-07-03 05:26:59', '2023-07-03 05:26:59'),
(82, 'гашимов 8', NULL, '2009-08-27', NULL, '2023-07-03 05:43:33', '2023-07-03 05:43:33'),
(83, 'Гашимова Таснима 9', NULL, '2008-03-13', NULL, '2023-07-03 05:52:17', '2023-07-03 05:58:20'),
(84, 'Махамаджанова 10', NULL, '2015-07-02', NULL, '2023-07-03 05:59:34', '2023-07-03 07:30:58'),
(85, 'Солкуева 11', NULL, '2010-06-25', NULL, '2023-07-03 06:09:19', '2023-07-03 06:09:19'),
(86, 'Батиков Петр 12', NULL, '2007-08-08', NULL, '2023-07-03 06:18:10', '2023-07-03 06:18:10'),
(88, 'Аюпова 14', NULL, '2020-07-13', NULL, '2023-07-03 06:34:40', '2023-07-03 07:32:11'),
(89, 'Лабадзе 15', NULL, '2016-04-09', NULL, '2023-07-03 06:43:14', '2023-07-03 07:32:24'),
(90, 'абылов 16', NULL, '2016-03-26', NULL, '2023-07-03 06:56:07', '2023-07-03 07:32:38'),
(91, 'Жылкелдиева 17', NULL, '2010-09-30', NULL, '2023-07-03 07:02:52', '2023-07-03 07:32:53'),
(92, 'чагарбаева 18', NULL, '2022-01-10', NULL, '2023-07-03 07:11:23', '2023-07-03 07:33:04'),
(93, 'саадат арсен 19', NULL, '2014-08-23', NULL, '2023-07-03 07:19:27', '2023-07-03 07:33:18'),
(94, 'Муратбеков 20', NULL, '2021-06-07', NULL, '2023-07-03 07:28:04', '2023-07-03 07:33:32'),
(95, 'Иргебаева 21', NULL, '2006-07-21', NULL, '2023-07-03 07:34:08', '2023-07-03 07:41:40'),
(96, 'кемелова', NULL, '2019-01-10', NULL, '2023-07-03 08:24:53', '2023-07-03 08:24:53'),
(97, 'бекболотов', NULL, '2018-12-04', NULL, '2023-07-03 08:26:21', '2023-07-03 08:26:21'),
(98, 'абдыбеков 13', NULL, '2023-07-13', NULL, '2023-07-03 08:31:41', '2023-07-03 08:31:41'),
(99, 'Саматбеков 24', NULL, '2020-09-09', NULL, '2023-07-03 09:02:50', '2023-07-03 09:02:50'),
(100, 'Калчороев 25', NULL, '1994-10-13', NULL, '2023-07-03 09:08:56', '2023-07-03 10:02:20'),
(101, 'Алмазова 26', NULL, '2002-05-03', NULL, '2023-07-03 09:15:59', '2023-07-03 10:02:31'),
(102, 'Медетбеков 27', NULL, '2013-02-15', NULL, '2023-07-03 09:22:12', '2023-07-03 10:02:41'),
(103, 'Демир 28', NULL, '2019-04-05', NULL, '2023-07-03 09:57:47', '2023-07-03 10:02:52'),
(104, 'казакбекова 29', NULL, '2021-06-29', NULL, '2023-07-03 10:04:07', '2023-07-03 10:33:19'),
(105, 'Данияров 30', NULL, '1965-11-13', NULL, '2023-07-03 10:16:44', '2023-07-03 10:33:29'),
(106, 'Мунжурова Дария 31', NULL, '2004-04-01', NULL, '2023-07-03 10:27:12', '2023-07-03 10:33:37'),
(107, 'Бегалиева М А 32', NULL, '1955-06-21', NULL, '2023-07-03 10:42:37', '2023-07-03 10:49:45'),
(108, 'Кыдыров', NULL, '2019-03-19', NULL, '2023-07-03 10:51:14', '2023-07-03 10:51:14'),
(109, 'Жабдарбеков', NULL, '2020-09-18', NULL, '2023-07-03 11:01:07', '2023-07-03 11:01:07'),
(110, 'Сулейманов Альберт', '500505019', '1990-09-05', NULL, '2023-07-04 03:50:45', '2023-07-04 03:50:45'),
(111, 'Асаналиев', NULL, '1944-04-04', NULL, '2023-07-04 04:04:16', '2023-07-04 04:04:16'),
(112, 'Сулайманова Батма', NULL, '1950-01-25', NULL, '2023-07-04 04:19:09', '2023-07-04 04:19:09'),
(113, 'Сапаралиев', NULL, '1957-06-30', NULL, '2023-07-04 04:27:53', '2023-07-04 04:27:53'),
(114, 'Орозмаматов Эмиль', NULL, '2009-06-09', NULL, '2023-07-04 04:53:29', '2023-07-04 04:53:29'),
(115, 'Орозмаматов Эльхан ', NULL, '2016-03-03', NULL, '2023-07-04 05:02:52', '2023-07-04 05:02:52'),
(116, 'Эламан', NULL, '2020-07-22', NULL, '2023-07-04 05:12:48', '2023-07-04 05:12:48'),
(117, 'Талайбекова', NULL, '2005-06-12', NULL, '2023-07-04 05:23:33', '2023-07-04 05:23:33'),
(118, 'Талайбекова Айназик', NULL, '2020-03-01', NULL, '2023-07-04 05:36:02', '2023-07-04 05:36:02'),
(119, 'Талайбекова арузат', NULL, '2018-07-30', NULL, '2023-07-04 05:42:08', '2023-07-04 05:42:08'),
(120, 'Макамбеталиева', NULL, '2009-03-17', NULL, '2023-07-04 05:53:20', '2023-07-04 05:53:20'),
(121, 'Кравец', NULL, '2013-12-24', NULL, '2023-07-04 06:13:54', '2023-07-04 06:13:54'),
(122, 'Урустамов', NULL, '2006-12-27', NULL, '2023-07-04 06:33:44', '2023-07-04 06:33:44'),
(123, 'Улан Эмир', NULL, '2008-12-23', NULL, '2023-07-04 06:54:37', '2023-07-04 06:54:37'),
(124, 'Улан Эрика', NULL, '2020-06-13', NULL, '2023-07-04 07:02:40', '2023-07-04 07:02:40'),
(125, 'Уметова Алия', NULL, '2009-06-06', NULL, '2023-07-04 07:35:51', '2023-07-04 07:35:51'),
(126, 'Уметова эдина', NULL, '1996-04-30', NULL, '2023-07-04 07:47:11', '2023-07-04 07:47:11'),
(127, 'Асамбекова айкен ', NULL, '1993-06-15', NULL, '2023-07-04 07:55:35', '2023-07-04 07:55:35'),
(129, 'Сабыркулов Атай', NULL, '2019-07-10', NULL, '2023-07-04 09:47:06', '2023-07-04 09:47:06'),
(130, 'Сабыркулова Дария', NULL, '2021-07-09', NULL, '2023-07-04 10:01:51', '2023-07-04 10:01:51'),
(131, 'Азимова Гульжан', NULL, '1988-12-18', NULL, '2023-07-04 10:06:22', '2023-07-04 10:06:22'),
(132, 'Данилочкина Наталья', NULL, '1955-09-12', NULL, '2023-07-04 10:18:05', '2023-07-04 10:18:05'),
(133, 'Воронин Андрей', NULL, '1994-08-14', NULL, '2023-07-04 10:36:48', '2023-07-04 10:36:48'),
(134, 'Ногойбаев Абай', NULL, '2003-02-13', NULL, '2023-07-04 10:52:07', '2023-07-04 10:52:07'),
(135, 'Асылбекова Айдай', NULL, '2017-04-06', NULL, '2023-07-04 11:04:25', '2023-07-04 11:04:25'),
(136, 'Калдыбаев азрет', NULL, '2007-09-14', NULL, '2023-07-04 11:28:01', '2023-07-04 11:28:01'),
(137, 'Калдыбаева Адина', NULL, '2002-01-19', NULL, '2023-07-04 11:38:52', '2023-07-04 11:38:52'),
(138, 'Джумабаева  1', NULL, '1970-12-21', NULL, '2023-07-05 04:22:12', '2023-07-05 04:22:12'),
(139, 'Акмаматова Адинай 2', NULL, '1999-02-12', NULL, '2023-07-05 04:54:40', '2023-07-05 04:54:40'),
(140, 'Абдивалиева Тахмина 3', NULL, '1977-09-14', NULL, '2023-07-05 05:06:50', '2023-07-05 05:06:50'),
(141, 'Сатиев 4', NULL, '1979-05-29', NULL, '2023-07-05 05:22:01', '2023-07-05 05:22:01'),
(142, 'Кадырбеков алихан 5', NULL, '2017-03-30', NULL, '2023-07-05 05:39:26', '2023-07-05 05:39:26'),
(143, 'Ниязбаева 6', NULL, '2004-08-20', NULL, '2023-07-05 05:59:49', '2023-07-05 05:59:49'),
(144, 'Насридинов 7', NULL, '2008-09-15', NULL, '2023-07-05 06:42:12', '2023-07-05 06:42:12'),
(145, 'Токтогазиев 8', NULL, '2014-08-21', NULL, '2023-07-05 07:04:42', '2023-07-05 07:04:42'),
(146, 'Маматакунов 9', NULL, NULL, NULL, '2023-07-05 08:40:33', '2023-07-05 08:40:33'),
(147, 'Болотбекова 10', NULL, '2021-01-29', NULL, '2023-07-05 08:55:43', '2023-07-05 08:55:43'),
(148, 'Юсупов Муслим 11', NULL, '2011-07-05', NULL, '2023-07-05 09:07:18', '2023-07-05 09:07:18'),
(149, 'Юсупова Марьям 12', NULL, '2012-10-25', NULL, '2023-07-05 09:20:11', '2023-07-05 09:20:11'),
(150, 'Сейдниязов 13', NULL, '1999-04-03', NULL, '2023-07-05 09:32:40', '2023-07-05 09:32:40'),
(151, 'Мельниченко Николетта 14', NULL, '2016-03-23', NULL, '2023-07-05 09:43:47', '2023-07-05 09:43:47'),
(152, 'Мельниченко  Савелий 15', NULL, '2018-09-12', NULL, '2023-07-05 09:53:14', '2023-07-05 09:53:14'),
(153, 'Акибаева замирбек 16', NULL, '1988-09-12', NULL, '2023-07-05 10:06:42', '2023-07-05 10:06:42'),
(154, 'Темирбеков эльхан 17', NULL, '2001-10-19', NULL, '2023-07-05 10:25:00', '2023-07-05 10:25:00'),
(155, 'Бообеков Баястан 18', NULL, '2007-07-20', NULL, '2023-07-05 10:34:56', '2023-07-05 10:34:56'),
(156, 'Узенова Феруза 19', NULL, '2012-12-29', NULL, '2023-07-05 10:54:11', '2023-07-05 10:54:11'),
(157, 'Узенов Арлен 20', NULL, '2018-09-07', NULL, '2023-07-05 11:05:25', '2023-07-05 11:05:25'),
(158, 'Темирбеков Ислам  21', NULL, '1994-01-08', NULL, '2023-07-05 11:13:36', '2023-07-05 11:13:36'),
(159, 'урустамов сабир 22', NULL, '2005-11-05', NULL, '2023-07-05 11:33:58', '2023-07-05 11:33:58'),
(160, 'Торокулова 1', NULL, '1969-03-05', NULL, '2023-07-07 04:06:13', '2023-07-07 04:06:13'),
(161, 'Гриценко 2', NULL, '2020-02-09', NULL, '2023-07-07 04:50:36', '2023-07-07 04:50:36'),
(162, 'Бугеря 3', NULL, '1991-06-03', NULL, '2023-07-07 05:02:40', '2023-07-07 05:02:40'),
(163, 'Мокенова 4', NULL, '2009-06-12', NULL, '2023-07-07 05:12:28', '2023-07-07 05:12:28'),
(164, 'пухова 5', NULL, '2017-07-23', NULL, '2023-07-07 05:25:31', '2023-07-07 05:25:31'),
(165, 'Пухов Никита 6', NULL, '2006-05-04', NULL, '2023-07-07 05:38:15', '2023-07-07 05:38:15'),
(166, 'Пухова Елена 7', NULL, '1985-08-29', NULL, '2023-07-07 05:48:02', '2023-07-07 05:48:02'),
(167, 'аскарбекова 8', NULL, '1994-07-20', NULL, '2023-07-07 06:01:56', '2023-07-07 06:01:56'),
(168, 'кадыпкулова 9', NULL, '2019-03-27', NULL, '2023-07-07 06:20:31', '2023-07-07 06:20:31'),
(169, 'Тюкебаева 10', NULL, '1970-08-23', NULL, '2023-07-07 06:36:39', '2023-07-07 06:36:39'),
(170, 'Табылдыева Раяна 11', NULL, '2021-07-01', NULL, '2023-07-07 06:49:44', '2023-07-07 06:54:21'),
(171, 'Мамутов 12', NULL, '1985-06-09', NULL, '2023-07-07 07:00:21', '2023-07-07 07:00:21'),
(172, 'Идигова Аминат 13', NULL, '1996-05-30', NULL, '2023-07-07 07:22:46', '2023-07-07 07:31:46'),
(173, 'Кадыркулов керимбек 14', NULL, '2004-12-02', NULL, '2023-07-07 08:39:22', '2023-07-07 08:39:22'),
(174, 'Домашева 15', NULL, '2005-06-08', NULL, '2023-07-07 09:06:52', '2023-07-07 09:06:52'),
(175, 'абдижамбылов 16', NULL, '2013-04-04', NULL, '2023-07-07 09:51:05', '2023-07-07 09:51:05'),
(176, 'Маматцаев Элзат 17', NULL, '1988-02-28', NULL, '2023-07-07 10:02:54', '2023-07-07 10:02:54'),
(177, 'Туганбаева Санира 18', NULL, '2011-08-02', NULL, '2023-07-07 10:14:22', '2023-07-07 10:14:22'),
(178, 'Керимбаева 19', NULL, '1965-11-22', NULL, '2023-07-07 10:28:48', '2023-07-07 10:28:48'),
(179, 'Сулейманов Санжар 20', NULL, '2007-09-09', NULL, '2023-07-07 10:41:34', '2023-07-07 10:41:34'),
(180, 'Саргатанова 1', NULL, '1988-11-19', NULL, '2023-07-09 07:39:50', '2023-07-09 07:39:50'),
(181, 'Субанкулов Ильгиз 2', NULL, '2012-12-06', NULL, '2023-07-09 07:54:38', '2023-07-09 07:54:38'),
(182, 'субанкулов чынгыз 3', NULL, '2010-11-09', NULL, '2023-07-09 08:08:39', '2023-07-09 08:08:39'),
(183, 'Садырбекова 4', NULL, '2020-09-09', NULL, '2023-07-09 08:21:01', '2023-07-09 08:21:01'),
(184, 'Турсунбеков 5', NULL, '1983-05-04', NULL, '2023-07-09 08:31:55', '2023-07-09 08:31:55'),
(185, 'Харьковей 6', NULL, '1953-03-31', NULL, '2023-07-09 08:46:06', '2023-07-09 08:46:06'),
(186, 'Изат Али 7', NULL, '2019-11-17', NULL, '2023-07-09 08:58:35', '2023-07-09 08:58:35'),
(187, 'Талайбекова  8', NULL, '2020-07-20', NULL, '2023-07-09 09:32:46', '2023-07-09 09:32:57'),
(188, 'арстанбеков 9', NULL, '1987-01-28', NULL, '2023-07-09 10:06:29', '2023-07-09 10:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(2, 'view_any_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(3, 'create_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(4, 'update_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(5, 'restore_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(6, 'restore_any_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(7, 'replicate_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(8, 'reorder_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(9, 'delete_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(10, 'delete_any_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(11, 'force_delete_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(12, 'force_delete_any_appointment', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(13, 'view_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(14, 'view_any_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(15, 'create_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(16, 'update_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(17, 'restore_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(18, 'restore_any_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(19, 'replicate_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(20, 'reorder_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(21, 'delete_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(22, 'delete_any_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(23, 'force_delete_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(24, 'force_delete_any_branch', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(25, 'view_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(26, 'view_any_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(27, 'create_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(28, 'update_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(29, 'restore_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(30, 'restore_any_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(31, 'replicate_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(32, 'reorder_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(33, 'delete_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(34, 'delete_any_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(35, 'force_delete_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(36, 'force_delete_any_diagnosis', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(37, 'view_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(38, 'view_any_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(39, 'create_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(40, 'update_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(41, 'restore_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(42, 'restore_any_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(43, 'replicate_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(44, 'reorder_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(45, 'delete_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(46, 'delete_any_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(47, 'force_delete_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(48, 'force_delete_any_doctor', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(49, 'view_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(50, 'view_any_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(51, 'create_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(52, 'update_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(53, 'restore_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(54, 'restore_any_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(55, 'replicate_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(56, 'reorder_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(57, 'delete_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(58, 'delete_any_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(59, 'force_delete_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(60, 'force_delete_any_patient', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(61, 'view_shield::role', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(62, 'view_any_shield::role', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(63, 'create_shield::role', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(64, 'update_shield::role', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(65, 'delete_shield::role', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(66, 'delete_any_shield::role', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(67, 'view_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(68, 'view_any_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(69, 'create_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(70, 'update_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(71, 'restore_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(72, 'restore_any_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(73, 'replicate_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(74, 'reorder_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(75, 'delete_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(76, 'delete_any_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(77, 'force_delete_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05'),
(78, 'force_delete_any_user', 'web', '2023-06-02 10:41:05', '2023-06-02 10:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'суперадмин', 'web', '2023-06-02 10:41:04', '2023-06-02 10:41:04'),
(2, 'врач', 'web', '2023-06-02 10:41:05', '2023-06-02 10:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','doctor','admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `doctor_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'albert', 'albert@mail.com', 'user', NULL, '$2y$10$xZcWhEWE3r5Euh7nlUkLOOxlQ8m1OILMMbxbLUVp4X0GrPDEHNYA.', NULL, 'DjWVQrYkr9s9jHFeETLMpCv7c71t2qxNprOGdPTq6xywjIWFdKLk5PM5jKIK', '2023-06-02 10:40:28', '2023-06-02 10:40:28'),
(2, 'Наргиза Насырхановна', 'nargiza@mail.com', 'user', NULL, '$2y$10$faP4HsB2QjAOkoHdBrOt3OuxXAHoGCluwiITeR0C4aBKBTGlhTw/G', 1, 'kKbTU8kzyUXW9jcOVMlaZWx28haMvwoSatYCmVe4YdtfCToOuSYDyu2cuCok', '2023-06-02 10:46:30', '2023-06-02 10:46:30'),
(3, 'Сатаров Умид', 'umid@ortomaster.kg', 'user', NULL, '$2y$10$proymXzHejioogc9O1hOP.kE.UKxETe/qBsIV68Ni.0usiqD5IWPG', 7, 'RZRePVTczS60B2GtiwKOHUITtnrWmj1RS0R2BY63TqZoQtnswhZ64Obi6J8f', '2023-06-25 13:00:37', '2023-06-25 13:00:37'),
(5, 'Тестовый Врач', 'test@test.com', 'user', NULL, '$2y$10$N8o1y29tI1aAGyQ7pvxeAOClZlsNdL7VPNbOWt2Yb9lhFWpcMwwzq', 10, 'vveCAY930F49A18ocE1py5D7FjmYKtcSUafpXcrhxd8jYoF76J50fmhgjctX', '2023-06-30 07:36:27', '2023-06-30 07:40:35'),
(6, 'Садырбеков Дастан ', 'dastan@ortomaster.kg', 'user', NULL, '$2y$10$76kvGEy1SWzhx0QSmZrp3OqKC3hy7IIDziYN2s1FYxI0/VLVtTuyO', 11, NULL, '2023-07-04 05:05:49', '2023-07-04 05:05:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_appointments_id_foreign` (`appointments_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_doctor_id_foreign` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_appointments_id_foreign` FOREIGN KEY (`appointments_id`) REFERENCES `appointments` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
