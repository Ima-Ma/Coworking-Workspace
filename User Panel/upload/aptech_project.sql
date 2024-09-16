-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 01:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptech_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `title`, `email`, `check_in`, `check_out`) VALUES
(1, '', 'Slide Share', 'imamamushtaq@gmail.com', '2024-08-07', '2024-08-10'),
(2, '', 'Slide Share', 'imamamushtaq@gmail.com', '2024-08-07', '2024-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `message`) VALUES
(1, 'Ahmad', 'Saif', 'ahmad@gmail.com', '030367890', 'Choose from various plans that suit your needs, whether you need a hot desk, dedicated desk, or private office.'),
(3, 'Hamza', 'tahir', 'hamza@gmail.com', '0334567890', ' Book our fully equipped meeting rooms for your important discussions'),
(6, 'imama', 'mushtaq', 'imamamushtaq5@gmail.com', '03112033680', 'imama msuhatq\nChoose from various plans that suit your needs, whether you need a hot desk, dedicated desk, or private office.');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `office_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`id`, `name`, `email`, `start_date`, `phone`, `gender`, `cv`, `office_name`) VALUES
(1, 'Imama', 'imamamushtaq5@gmail.com', '2024-07-26', '03112033680', 'Female', 'randomized-resume.pdf', 'THE DAWOOD GROUP'),
(2, 'Imama', 'mushtaqueimama@gmail.com', '2024-07-31', '03142287085', 'Female', 'randomized-resume.pdf', 'CODEUP'),
(3, 'Asad', 'asadali@gmail.com', '2024-07-30', '03112033680', 'male', 'B.-Software-Engineer.docx', 'SYSTEMS LIMITED'),
(4, 'Imama', '', '0000-00-00', '', '', '', 'SYSTEMS LIMITED');

-- --------------------------------------------------------

--
-- Table structure for table `job_app_report`
--

CREATE TABLE `job_app_report` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `selection` varchar(255) NOT NULL,
  `inter_date` date NOT NULL,
  `inter_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_app_report`
--

INSERT INTO `job_app_report` (`id`, `name`, `email`, `phone`, `office_name`, `selection`, `inter_date`, `inter_time`) VALUES
(1, 'Imama ', 'imamamushtaq5@gmail.com', '03112033680', 'THE DAWOOD GROUP', 'Selected', '2024-07-22', '12 am'),
(2, 'Asad ', 'asadali@gmail.com', '03112033680', 'SYSTEMS LIMITED', 'Selected', '2024-07-25', '12 am'),
(3, 'Imama ', 'mushtaqueimama@gmail.com', '03142287085', 'CODEUP', 'Selected', '2024-08-10', '3pm');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`) VALUES
(1, 'imama Mushtaq', 'imama@gmail.com', 'imzmz'),
(2, 'Asad Ali', 'asad@gmail.com', '$2y$10$RFLAjQnCQQxTaUnYL/2mZOMDsg3D2mekgIcwEIMk.nxpC4gjRxFMe'),
(3, 'Bushra Shakeel', 'bushra@gmail.com', '$2y$10$85PJ6YyC2mditcsX4bS8BORxTRqwM79DwlMUOmjLyzjUOp.dkLZK2'),
(15, 'ok', 'ok@gmail.com', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_office`
--

CREATE TABLE `meeting_office` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting_office`
--

INSERT INTO `meeting_office` (`id`, `title`, `about`, `image`, `price`) VALUES
(4, 'Collins Dictionary', 'A buildig or part of a ilding where one or more person are affairs of a private enterprise', '1.jpg', '10000'),
(7, 'Slide Share', 'A buildig or part of a ilding where one or more person are affairs of a private enterprise', '3.jpg', '15000'),
(8, 'Franklin', 'a building or part of a building where one or more person affairs of a private enterprise', '2.jpg', '10000'),
(10, 'Velvet', 'a building or part of a building where one or more person affairs of a private enterprise', '4.jpg', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `office_req`
--

CREATE TABLE `office_req` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `office_email` varchar(255) NOT NULL,
  `office_password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_req`
--

INSERT INTO `office_req` (`id`, `username`, `office_email`, `office_password`, `status`) VALUES
(1, 'OCEANIC TRADING COMPANY', 'mushtaqueimama@gmail.com', '$2y$10$0rG9fMSayJ4H.mxkmEtakep5IeGv8.LyLfKBCAyudCRPw/mNdzCrm', 1),
(2, 'THE DAWOOD GROUP', 'mushtaqueimama@gmail.com', '$2y$10$4PtDjLp3g92jZCkDejMGTegd.9UFzbj/zcJWLy/PuJhW8isaPRCYq', 1),
(3, 'SYSTEMS LIMITED', 'mushtaqueimaa@gmail.com', '$2y$10$NwxeE6OFdjzU3TytikJoVOIhQZR9qZ/hTbZrpAAj0t8AQiRO/K7xu\n', 1),
(4, '10PEARLS', 'mushtaqueimama@gmail.com', '$2y$10$mVBtJRGjf.ocD.EDFeReaexoe9RN4kOobqq9hRblRNNN44RvOJ1Iq', 1),
(5, 'CUBIX', 'mushtaqueimama@gmail.com', '$2y$10$RmyM.vDHLkFHAesUNarpCeJEOVmhGZt5X7ef8lQYnkDC/XbrWhaOS', 0),
(29, 'CUBIX', 'mushtaqueimama@gmail.com', 'cubix', 0),
(30, 'CUBIX', 'mushtaqueimama@gmail.com', '$2y$10$4KmomBCDWUJSIhVY0Dkg1.IrzXPb.R86TKQwHrF.3x9y4fqAx33ae', 0),
(31, 'abc', 'asad@gmail.com', 'asad123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `office_space`
--

CREATE TABLE `office_space` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_space`
--

INSERT INTO `office_space` (`id`, `title`, `about`, `image`, `price`) VALUES
(1, 'Homepro workspace', 'HomePro Workspace; Desk Dynasty; Virtual HQ Ventures; Office Overture; HomeDesk Universe; DwellDesk Ventures', 'office1.jpg', 'From PKR 54,990 PER month'),
(2, 'Creative Arena', 'Creative Coworking Spaces Name Ideas. Artistic Abode; Visionary Village; Idea Incubator; Design Den; Creative Collective; Imagination Station. Tech-Focused', 'office2.jpg', 'From PKR 12,000 PER month'),
(3, 'Colab', 'coLab offers 24 hour access, comfortable working environmentCreativity Corner; CoShift Hub; Fusion Workspace; Incubate CoSpace; Community CoWork; Inspire Hub; ShareDesk Space; Nexus CoLab', 'office3.jpg', 'From PKR 40,000 PER month'),
(4, 'Coffee nook', 'Coffee Nook; Comfort Cove; Tranquility Base; Pause Pavilion; Break Barn; Repose Refuge; Peaceful Pier; Serenity Stop; Unwind Hub; The Chill Pad; Chillax Corner ', 'office4.jpg', 'From PKR 35,000 PER month');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `user_email`, `user_password`) VALUES
(1, 'Imama', 'imama@gmail.com', '$2y$10$E4en3QToGcu7KhzpLzHYNeJCA6/puWkPBUQUKzteG3T9psNWLKZmK'),
(2, 'bilal', 'bilal@gmail.com', '$2y$10$q7j3LJgCDo3FGtk16w5D6O.Wzvw8jBBbWcGjY2HXfUnwL8iW7DW..');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `office_name`, `job_title`, `experience`, `about`, `image`) VALUES
(1, 'OCEANIC TRADING COMPANY', 'Customer service', '2 years minimum', 'Oceanic Trading specialises in supplying a wide range of premium quality seafood products for the Australian and Overseas markets', '1.jpg'),
(2, ' THE DAWOOD GROUP', 'Sales Associate', '1 year or fresh ', 'The Dawood is a group of companies headquartered in Karachi. It is active in diverse businesses and industries of the Dawood family-business and is owned by Dawood family.', '2.png'),
(3, 'SYSTEMS LIMITED', 'Network administrator', '2 years minimum', 'Systems Limited is a Pakistani multi-national public technology company, involved in mortgage, apparel, retail and BPO services.', '2.jpg'),
(4, '10PEARLS', 'Office Manager', '5 years ', '10Pearls is recognized as one of the best software company based in Karachi, Pakistan, specializing in digital transformation, development,', '4.jpg'),
(6, 'CODEUP', 'Receptionist', '2 years minimum', 'Codup.co is a software development company that provides custom software development, web development, and e-commerce development', '6.png'),
(7, 'THE DAWOOD GROUP', 'Receptionist', '2 years', 'A receptionist is an employee taking an office or administrative support position. The work is usually performed in a waiting area such as a lobby or front office desk of an organization or business', '2.png'),
(8, 'THE DAWOOD GROUP', 'Account Executive', '1 year or fresh ', 'Account executive is a role in sales, advertising, marketing, and finance involving intimate understanding of a client', '2.png'),
(9, 'THE DAWOOD GROUP', 'Customer service', 'fresh', ' jobs typically involve employees working directly with customers', '2.png'),
(10, '10PEARLS', 'Receptionist', 'fresh', 'Business titles can be from CEO to receptionist and everything in between. But there are some acronyms that can make us confused. ', '4.jpg'),
(11, 'CODEUP', 'Sales Associate', '5 years ', 'A Sales Job Title is a label assigned to professionals responsible for selling products or services to customers.', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_office`
--

CREATE TABLE `virtual_office` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `virtual_office`
--

INSERT INTO `virtual_office` (`id`, `title`, `about`, `image`, `price`) VALUES
(1, 'Business address', 'Choose a new business address in a prime location as part of our virtual office packages. We can also supply you with a local phone number, call handling etc', 'virtual1.jpg', 'From PKR 35,900 PER month'),
(2, 'Virtual Nook', 'A virtual office is an arrangement that lets business have professional addresses as well as', 'virtual3.jpg', 'From PKR 20,500 PER month'),
(3, 'SmartServe', 'SmartServe can be used by entrepreneurs, freelancers, and small businesses that do not need or cannot afford a traditional office space', 'virtual2.jpg', 'From PKR 40,000 PER month'),
(4, 'TaskTrekker', 'A TaskTrekker  is a service that gives you a business address, a place to receive mail, and access to meeting rooms & physical office space', 'virtual4.jpg', 'From PKR 12,000 PER month');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_app_report`
--
ALTER TABLE `job_app_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_office`
--
ALTER TABLE `meeting_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_req`
--
ALTER TABLE `office_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_space`
--
ALTER TABLE `office_space`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `virtual_office`
--
ALTER TABLE `virtual_office`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_app_report`
--
ALTER TABLE `job_app_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `meeting_office`
--
ALTER TABLE `meeting_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `office_req`
--
ALTER TABLE `office_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `office_space`
--
ALTER TABLE `office_space`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `virtual_office`
--
ALTER TABLE `virtual_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
