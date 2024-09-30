-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 07:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fb_id` int(11) NOT NULL,
  `thesis_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `who_is` int(11) NOT NULL,
  `feedback_file` text NOT NULL,
  `status` text NOT NULL,
  `created_time_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fb_id`, `thesis_id`, `student_id`, `feedback`, `who_is`, `feedback_file`, `status`, `created_time_date`) VALUES
(1, 2, 12, 'All Okay', 2, '', 'Approved', '08-03-2024 06:2919'),
(2, 2, 12, 'Good', 10, '', 'Approved', '08-03-2024 06:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `final_result`
--

CREATE TABLE `final_result` (
  `fr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thesis_id` int(11) NOT NULL,
  `osp` text NOT NULL,
  `iab` text NOT NULL,
  `br` text NOT NULL,
  `rasr` text NOT NULL,
  `sd` text NOT NULL,
  `iac` text NOT NULL,
  `tes` text NOT NULL,
  `ceac` text NOT NULL,
  `rc` text NOT NULL,
  `totalobmark` text NOT NULL,
  `final_grade` text NOT NULL,
  `create_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_result`
--

INSERT INTO `final_result` (`fr_id`, `user_id`, `thesis_id`, `osp`, `iab`, `br`, `rasr`, `sd`, `iac`, `tes`, `ceac`, `rc`, `totalobmark`, `final_grade`, `create_date`) VALUES
(1, 12, 2, '70', '70', '75', '80', '80', '70', '70', '90', '90', '76.5', 'A', '08-03-2024 07:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `p_id` int(11) NOT NULL,
  `programme_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`p_id`, `programme_name`) VALUES
(1, 'Bsc In Computer Science and Engineering'),
(2, 'MSC. F');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_list`
--

CREATE TABLE `thesis_list` (
  `th_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thesis_title` text NOT NULL,
  `thesis_summary` text NOT NULL,
  `thesis_file` text NOT NULL,
  `assignment_satus` text NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `supervisor_status` text NOT NULL,
  `examiner_status` text NOT NULL,
  `coordinator_status` text NOT NULL,
  `create_datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesis_list`
--

INSERT INTO `thesis_list` (`th_id`, `user_id`, `thesis_title`, `thesis_summary`, `thesis_file`, `assignment_satus`, `examiner_id`, `supervisor_status`, `examiner_status`, `coordinator_status`, `create_datetime`) VALUES
(1, 4, 'Test Thesis Submission V2', '  I will test the thesis submission system v2', 'monthly.pdf', 'Submitted', 10, 'Approved', 'Approved', '', '05-03-2024 19:27:01'),
(2, 12, 'This our tesing with new revison', ' Thesis new revison', 'CRM_Implementation_Project_Overview_Clickable_Links (2).pdf', 'Submitted', 10, 'Approved', 'Approved', 'Approved', '08-03-2024 06:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `registration_no` varchar(50) DEFAULT NULL,
  `registration_date` text NOT NULL,
  `res_program` text NOT NULL,
  `assign_suppervisor` text NOT NULL,
  `user_role` text NOT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `name`, `password`, `registration_no`, `registration_date`, `res_program`, `assign_suppervisor`, `user_role`, `email`) VALUES
(1, 'Mr. nazmul', '$2y$10$arKqn2dO7Qz/9nBTA6g4p.C6zOhBYMFJvOo0No6cfGnytP/dkrpxK', '990999', '', '', '', 'Admin', 'example@domain.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `final_result`
--
ALTER TABLE `final_result`
  ADD PRIMARY KEY (`fr_id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `thesis_list`
--
ALTER TABLE `thesis_list`
  ADD PRIMARY KEY (`th_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `registration_no` (`registration_no`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `final_result`
--
ALTER TABLE `final_result`
  MODIFY `fr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thesis_list`
--
ALTER TABLE `thesis_list`
  MODIFY `th_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
