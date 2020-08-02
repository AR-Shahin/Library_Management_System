-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 07:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_image` varchar(200) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_quantity` int(10) NOT NULL,
  `book_avilable` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `librian_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author`, `book_quantity`, `book_avilable`, `date`, `librian_name`) VALUES
(29, 'The King of Drugs', '4017book1.jpg', 'Jhon', 10, 10, '2020-07-29 16:41:42', 'ars'),
(30, 'The Design Hustile', '5615book3.jpg', 'Jhon Doe', 10, 10, '2020-07-29 14:19:44', 'ars'),
(31, 'Red Planet', '980book5.jpg', 'Jhon Doe', 10, 10, '2020-07-29 14:19:51', 'ars'),
(32, 'English Grammar', '6654book6.jpg', 'Jhon Doe', 10, 9, '2020-07-30 15:32:48', 'ars'),
(33, 'Book Title Here', '4910book4.jpg', 'Jhon Doe', 10, 9, '2020-07-30 15:35:29', 'ars'),
(34, 'Mental English', '563book7.jpg', 'Jhon Doe', 10, 10, '2020-07-28 14:59:17', 'ars'),
(35, 'Coding Kids', '4788book14.jpg', 'Jhon Doe', 10, 10, '2020-07-30 15:40:01', 'ars'),
(37, 'Html and CSS', '3923book12.jpg', 'Anisur Rahman Shahin', 10, 10, '2020-07-29 16:41:49', 'ars'),
(38, 'Codding and Questions', '7415book10.jpg', 'Robert Kin', 10, 10, '2020-07-29 14:19:59', 'ars'),
(39, 'Happy Secure', '7010book11.jpg', 'Shahriar Manjur', 10, 10, '2020-07-28 14:33:24', 'asik mia'),
(40, 'Java Developers', '8713book13.gif', 'Ben Rosum', 10, 10, '2020-07-29 14:20:03', 'asik mia'),
(41, 'Magic Knowledge', '158photo-book-1318702__340.webp', 'Hatim Tai', 20, 20, '2020-07-29 16:18:52', 'ars'),
(43, '7 Secret of Health ', '6191book18.jpg', 'Martin', 10, 10, '2020-07-30 15:31:03', 'ars'),
(44, 'Physics', '6755book19.jpg', 'Ishrat shila', 10, 10, '2020-07-31 04:26:37', 'ars'),
(45, 'Blood Warrior', '6657book20.jpg', 'Henrik Maikel', 10, 8, '2020-07-30 15:40:05', 'ars');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` int(5) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `book_id` int(5) NOT NULL,
  `lib_name` varchar(50) DEFAULT NULL,
  `isssue_date` varchar(25) NOT NULL,
  `return_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `libraian`
--

CREATE TABLE `libraian` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(150) DEFAULT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraian`
--

INSERT INTO `libraian` (`id`, `name`, `email`, `username`, `tag`, `password`, `phone`, `date`, `image`, `city`) VALUES
(1, 'Anisur Rahman', 'anisur@gmail.com', 'ars', 'Libraian', '123456', '+8801754100439', '2020-07-25 13:24:38', 'IMG_20180802_182848_175.jpg', 'Dhaka'),
(2, 'Asik mia', 'asik@gmail.com', 'asik mia', 'Libraian', '123456', '+8801994429569', '2020-07-26 06:19:21', 'asik.jpg', 'Pabna');

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE `request_book` (
  `id` int(5) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `batch` tinyint(5) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `blood_grp` varchar(5) NOT NULL,
  `gpa` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `username`, `email`, `uid`, `batch`, `pass`, `phone`, `address`, `image`, `status`, `date`, `blood_grp`, `gpa`) VALUES
(17, 'Anisur Rahman Shahin', 'shahin', 'mdshahinmije96@gmail.com', '2018200000018', 50, '123456', '+8801754100439', 'Cumilla', '463shahin.png', 1, '2020-07-25 17:16:30', 'A+', '3.86'),
(18, 'Abdullah Jisan', 'jisan', 'jisan@gmail.com', '2018200000014', 50, '123456', '+8801754100439', 'KIsorgonj,Dhaka', '7573jisan.jpg', 1, '2020-07-26 03:47:56', 'B+', '3.45'),
(19, 'Asik Newaz', 'sabbir', 'sabbir@gmail.com', '2018200000016', 50, '123456', '01994439594', 'mohakhali,dhaka', '4613sabbir.jpg', 1, '2020-07-29 06:16:25', 'A+', '3.65'),
(20, 'Sabbir Hasan', 'omor', 'omor@gmail.com', '2018200000011', 50, '123456', '01994439594', 'mohakhali,dhaka', '6828omor.jpg', 1, '2020-07-30 15:34:27', '', ''),
(21, 'Zihad Bin Jahangir', 'zihad', 'zihad@gmail.com', '20182000000015', 50, '123456', '01994439594', 'mohakhali,dhaka', '9173zihad.jpg', 0, '2020-07-30 15:41:10', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraian`
--
ALTER TABLE `libraian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `request_book`
--
ALTER TABLE `request_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`,`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `libraian`
--
ALTER TABLE `libraian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request_book`
--
ALTER TABLE `request_book`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
