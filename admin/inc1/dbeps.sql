-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 مارس 2025 الساعة 22:23
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbeps`
--

-- --------------------------------------------------------

--
-- بنية الجدول `basic`
--

CREATE TABLE `basic` (
  `student_id` int(10) NOT NULL,
  `student_name` varchar(35) NOT NULL,
  `subj1` int(11) NOT NULL,
  `subj2` int(11) NOT NULL,
  `subj3` int(11) NOT NULL,
  `subj4` int(11) NOT NULL,
  `subj5` int(11) NOT NULL,
  `subj6` int(11) NOT NULL,
  `subj7` int(11) NOT NULL,
  `subj8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='هذا جدول الدرجات ومعلومات الطالب';

--
-- إرجاع أو استيراد بيانات الجدول `basic`
--

INSERT INTO `basic` (`student_id`, `student_name`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`, `subj6`, `subj7`, `subj8`) VALUES
(1, 'اثير باقر برغش', 90, 91, 92, 93, 94, 95, 96, 97),
(2, 'حيدر عبدالحسين عبد العباس', 99, 99, 99, 99, 99, 99, 99, 99);

-- --------------------------------------------------------

--
-- بنية الجدول `info1`
--

CREATE TABLE `info1` (
  `id` int(10) NOT NULL,
  `student_username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='هذا جدول معلومات الدخول ';

--
-- إرجاع أو استيراد بيانات الجدول `info1`
--

INSERT INTO `info1` (`id`, `student_username`, `password`) VALUES
(1, 'user', 'pass'),
(2, 'user2', 'pass2'),
(3, 'admin', 'pass3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic`
--
ALTER TABLE `basic`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `info1`
--
ALTER TABLE `info1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic`
--
ALTER TABLE `basic`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info1`
--
ALTER TABLE `info1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
