-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 04:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bharatcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `fir_id` bigint(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fir_category` varchar(255) NOT NULL,
  `section` text DEFAULT NULL,
  `date_of_crime` date NOT NULL,
  `time_of_crime` time NOT NULL,
  `fir_content` mediumtext DEFAULT NULL,
  `area_code` int(6) NOT NULL,
  `date_time_of_complaint` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'New',
  `last_modified_by` varchar(255) NOT NULL,
  `last_modified_by_user_role` int(1) NOT NULL DEFAULT 1,
  `last_modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `proof1` longblob DEFAULT NULL,
  `proof2` longblob DEFAULT NULL,
  `proof3` longblob DEFAULT NULL,
  `photosign` longblob NOT NULL,
  `opticalsign` longblob NOT NULL,
  `suspect1_name` varchar(255) DEFAULT NULL,
  `suspect2_name` varchar(255) DEFAULT NULL,
  `suspect1_phone_number` bigint(10) DEFAULT NULL,
  `suspect2_phone_number` bigint(10) DEFAULT NULL,
  `victim1_name` varchar(255) DEFAULT NULL,
  `victim2_name` varchar(255) DEFAULT NULL,
  `victim1_phone_number` bigint(10) DEFAULT NULL,
  `victim2_phone_number` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`fir_id`, `username`, `email`, `fir_category`, `section`, `date_of_crime`, `time_of_crime`, `fir_content`, `area_code`, `date_time_of_complaint`, `status`, `last_modified_by`, `last_modified_by_user_role`, `last_modified_on`, `proof1`, `proof2`, `proof3`, `photosign`, `opticalsign`, `suspect1_name`, `suspect2_name`, `suspect1_phone_number`, `suspect2_phone_number`, `victim1_name`, `victim2_name`, `victim1_phone_number`, `victim2_phone_number`) VALUES
(51, 'Namira Fatima', 'namirafatima28@gmail.com', 'Harassment', NULL, '2020-08-25', '05:08:00', 'i m teasedddddddd...', 500003, '2020-08-14 20:06:18', 'New', 'namirafatima28@gmail.com', 1, '2020-08-14 14:36:18', 0x356633366131363232356334342e6a7067, '', '', 0x356633366131363232356632362e706e67, 0x356633366131363232383763342e706e67, '', '', 0, 0, '', '', 0, 0),
(52, 'Namira Fatima', 'namirafatima28@gmail.com', 'Murder', '-', '2005-02-04', '20:05:00', 'i found a dead body in the garbage bin', 500001, '2020-08-14 20:10:44', 'Inprogress', 'namirafatima28@gmail.com', 1, '2020-08-18 09:57:24', 0x356633366132366336343339362e6a7067, 0x356633366132366336343838372e6a7067, 0x356633366132366336346638302e6a7067, 0x356633366132366336353834662e706e67, 0x356633366132366336383535392e706e67, 'Raju', 'ram', 1234567890, 1234567899, 'leena', 'indu', 8375487222, 1234567819),
(53, 'Namira Fatima', 'namirafatima28@gmail.com', 'Harassment', NULL, '2020-08-03', '00:31:00', 'jhghjjjj', 500004, '2020-08-15 11:33:30', 'New', 'namirafatima28@gmail.com', 1, '2020-08-15 06:03:30', 0x356633373761623236303331332e6a7067, 0x356633373761623236303862652e6a7067, '', 0x356633373761623236306434372e706e67, 0x356633373761623236326532382e706e67, '', '', 0, 0, '', '', 0, 0),
(55, 'Pranay', 'pc2282001@gmail.com', 'Harassment', '15A-12A-11B', '2020-08-04', '17:08:00', 'Kalia bullies me in class saying i m too thin', 500001, '2020-08-15 17:11:27', 'Accept', 'neil@gmail.com', 4, '2020-08-23 14:25:00', 0x356633376339653733333437362e6a7067, 0x356633376339653733333932622e6a7067, '', 0x356633376339653733336463382e706e67, 0x356633376339653733376432652e706e67, 'Kalia', '', 0, 0, 'Pranay', '', 8374831251, 0),
(56, 'Shubham', 'shu@gmail.com', 'Murder', NULL, '2020-08-15', '16:00:00', 'Found a dead body in public garden', 500004, '2020-08-15 17:33:30', 'New', 'shu@gmail.com', 2, '2020-08-15 12:03:30', 0x356633376366313232656139612e6a7067, 0x356633376366313232656531382e6a7067, '', 0x356633376366313232663166332e706e67, 0x356633376366313233313666332e706e67, '', '', 0, 0, 'RamPrasad', '', 7856123974, 0),
(57, 'Namira Fatima', 'namirafatima28@gmail.com', 'Murder', 'Section 302,304,305', '2020-08-04', '19:08:00', 'Saw A dead body near football ground', 500001, '2020-08-15 19:53:04', 'Inprogress', 'shu@gmail.com', 2, '2020-08-18 10:41:42', 0x356633376566633865636337632e6a7067, '', '', 0x356633376566633865643333632e706e67, 0x356633376566633865656365362e706e67, 'Kinghu', '', 0, 0, 'Shapat', '', 7418529630, 0),
(58, 'Shubham', 'shu@gmail.com', 'Theft', 'Section 379A', '2020-08-02', '12:02:00', 'Wallet Stolen in bus', 500004, '2020-08-16 12:43:22', 'New', 'shu@gmail.com', 2, '2020-08-16 07:13:22', 0x356633386463393231656265382e6a7067, 0x356633386463393231663039352e6a7067, '', 0x356633386463393231663363632e706e67, 0x356633386463393232313962302e706e67, 'Raju', '', 0, 0, '', '', 0, 0),
(59, 'Pranay', 'pc2282001@gmail.com', 'Theft', 'Section 379A,378D', '2020-08-18', '12:30:00', 'Helmet Stolen', 500001, '2020-08-18 15:35:40', 'Inprogress', 'shu@gmail.com', 2, '2020-08-18 10:18:36', 0x356633626137663365663736332e6a7067, '', '', 0x356633626137663365666437332e706e67, 0x356633626137663430323264302e706e67, 'Raja Shopkeeper', '', 0, 0, 'Pranay', '', 8374831251, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fir_change_log`
--

CREATE TABLE `fir_change_log` (
  `id` bigint(20) NOT NULL,
  `fir_id` bigint(11) NOT NULL,
  `user_role` int(1) NOT NULL DEFAULT 2,
  `modified_by` varchar(255) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `photosign` longblob NOT NULL,
  `opticalsign` longblob NOT NULL,
  `comments` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir_change_log`
--

INSERT INTO `fir_change_log` (`id`, `fir_id`, `user_role`, `modified_by`, `modified_on`, `status`, `photosign`, `opticalsign`, `comments`) VALUES
(13, 52, 2, 'Shubham', '2020-08-18 09:57:24', 'Inprogress', 0x356633626136303461353438322e706e67, 0x356633626136303461633834392e706e67, ''),
(14, 59, 2, 'Shubham', '2020-08-18 10:08:05', 'Accept', 0x356633626138383532346435382e706e67, 0x356633626138383532386133662e706e67, 'Interrogating Raja'),
(15, 59, 2, '', '2020-08-18 10:11:40', 'Accept', 0x356633626139356334643934382e706e67, 0x356633626139356335336633322e706e67, ''),
(16, 59, 2, 'shu@gmail.com', '2020-08-18 10:12:56', 'Accept', 0x356633626139613861393662622e706e67, 0x356633626139613861623661362e706e67, ''),
(17, 59, 2, 'shu@gmail.com', '2020-08-18 10:14:00', 'Accept', 0x356633626139653862636331392e706e67, 0x356633626139653862656166372e706e67, ''),
(18, 59, 2, 'shu@gmail.com', '2020-08-18 10:18:36', 'Inprogress', 0x356633626161666363666634332e706e67, 0x356633626161666364373738302e706e67, 'Interrogating Raja'),
(19, 57, 2, 'shu@gmail.com', '2020-08-18 10:32:16', 'Reject', 0x356633626165333061653936352e706e67, 0x356633626165333062316362632e706e67, 'no cccc'),
(20, 57, 2, 'shu@gmail.com', '2020-08-18 10:32:16', 'Reject', 0x356633626165333062623133352e706e67, 0x356633626165333062636564632e706e67, 'no cccc'),
(21, 55, 2, 'shu@gmail.com', '2020-08-18 10:40:59', 'Reject', 0x356633626230336263396232322e706e67, 0x356633626230336264313863642e706e67, 'no'),
(22, 57, 2, 'shu@gmail.com', '2020-08-18 10:41:42', 'Inprogress', 0x356633626230363635353834392e706e67, 0x356633626230363635616564372e706e67, 'yessss'),
(25, 55, 3, 'tri@gmail.com', '2020-08-23 14:22:48', 'Reject', 0x356634323739646338343530622e706e67, 0x356634323739646338393239662e706e67, 'bad case.'),
(27, 55, 4, 'neil@gmail.com', '2020-08-23 14:25:00', 'Accept', 0x356634323763336331613761332e706e67, 0x356634323763336331653961362e706e67, 'good case');

-- --------------------------------------------------------

--
-- Table structure for table `fir_status`
--

CREATE TABLE `fir_status` (
  `status` int(1) NOT NULL,
  `status_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir_status`
--

INSERT INTO `fir_status` (`status`, `status_type`) VALUES
(0, 'pending'),
(1, 'closed'),
(2, 'inprogress'),
(3, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phno` bigint(10) DEFAULT NULL,
  `user_role` int(1) NOT NULL DEFAULT 1,
  `area_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `phno`, `user_role`, `area_code`) VALUES
('Namira Fatima', 'namirafatima28@gmail.com', 'Namira123$', 9959058232, 1, 500004),
('Neil', 'neil@gmail.com', 'Neil123$', 9837432519, 4, 500001),
('Pranay', 'pc2282001@gmail.com', 'Pranay123$', 8374831251, 1, 500027),
('Shubham', 'shu@gmail.com', 'Shu123$', 1234567890, 2, 500001),
('Trishul', 'tri@gmail.com', 'Tri123$', 1299883367, 3, 500001);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_role` int(11) NOT NULL,
  `user_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_role`, `user_description`) VALUES
(1, 'citizen'),
(2, 'Superintendent of Police'),
(3, 'Senior superintendent of police'),
(4, 'Station House Officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD UNIQUE KEY `fir_id` (`fir_id`);

--
-- Indexes for table `fir_change_log`
--
ALTER TABLE `fir_change_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fir_status`
--
ALTER TABLE `fir_status`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `fir_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `fir_change_log`
--
ALTER TABLE `fir_change_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
