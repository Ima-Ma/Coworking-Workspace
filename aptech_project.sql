-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 09:54 AM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `days` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `card_number` int(11) NOT NULL,
  `card_company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `title`, `days`, `price`, `card_number`, `card_company`) VALUES
(38, 'Aleena Alfaro', 'imamamushtaq@gmail.com', 'Franklin', 2, 20000.00, 4242, 'Visa'),
(39, 'John', 'imamamushtaq5@gmail.com', 'Collins Dictionary', 9, 90000.00, 4242, 'Visa'),
(40, 'John', 'imamamushtaq5@gmail.com', 'Colab', 9, 360.00, 4242, 'Visa'),
(41, 'Peyton Wright', 'imamamushtaq@gmail.com', 'AceAdmin ', 1, 57.00, 4242, 'Visa'),
(46, 'Imama Mushtaq ', 'imamamushtaq5@gmail.com', 'Slide Share', 4, 60000.00, 4242, 'Visa'),
(47, 'Ellison Terry', 'ok@gmail.com', 'Slide Share', 5, 75000.00, 4242, 'Visa');

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
(19, 'Gabriela ', 'Shaw', 'imamamushtaq5@gmail.com', '03112033680', 'Is a coworking space worth it?'),
(20, 'Brooks ', 'Sanchez', 'mushtaqueimama@gmail.com', '03112033680', 'What is the minimum commitment I need to make to join Works?'),
(21, 'Emily', ' Yatesv', 'abc@gmail.com', '03112033680', 'How do shared office spaces work?');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `image1`, `image2`, `size`, `description`, `capacity`) VALUES
(1, 'Seminar Hall', 'hall1.jfif', 'seminar2.jfif', '170 square metres', 'Seminar rooms are used for staff training and staff information delivery. Seminar rooms are sometimes also used as \'rooms for hire\' to suitable third parties and will typically need appropriate fixtures and access to amenities.', 'capacity up to 200  person.'),
(3, 'Trade shows', 'Trade shows1.jpg', 'Trade show2.jfif', '200 square metres', 'They\'re designed to attract a broad audience to exhibition halls and large spaces where companies can set up their displays. Fairs also often include entertainment in the form of live performances and shows, food and beverage options, and interactive acti', 'capacity up to 350  person.'),
(4, 'Networking events', 'net1.jfif', 'net2.jpg', '100 square metres', 'they\'re organised gatherings that encourage professionals to meet and engage with one another to build valuable connections. While each event you attend may look different, they all have one common goal, which is to allow attendees to build professional c', 'capacity up to 250  person.'),
(5, 'Board meetings', 'meeting1.jfif', 'meeting2.jpeg', '70 square metres', 'Board meetings are formal gatherings held by the board of directors that aim to discuss major problems, areas of concern, vote on decisions, review performance, consider policy issues, and, in some cases, perform the legal duties of the board.', 'capacity up to 80  person.');

-- --------------------------------------------------------

--
-- Table structure for table `event_contact`
--

CREATE TABLE `event_contact` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_contact`
--

INSERT INTO `event_contact` (`id`, `title`, `name`, `date`, `email`, `message`) VALUES
(1, 'Trade shows', 'Ellison Terry', '2024-08-31', 'imamamushtaq5@gmail.com', 'Hello,\r\n\r\nI am looking to book an event and would appreciate some details about your venue. Could you send me information regarding the booking process, cost per event, and what is included in the package? Additionally, I\'d like to inquire about the cater');

-- --------------------------------------------------------

--
-- Table structure for table `female`
--

CREATE TABLE `female` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `female`
--

INSERT INTO `female` (`id`, `name`, `email`, `pdf`, `age`, `image`, `status`) VALUES
(2, 'Eshaal', 'eshaal@gmail.com', 'female_driver/pdf/Driving_Licence_application.pdf', '20', 'female_driver/image/image1.jpg', 1),
(3, 'Alina', 'alina@gmail.com', 'female_driver/pdf/Driving_Licence_application.pdf', '23', 'female_driver/image/image2.png', 0);

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
(15, 'Ellison Terry', 'imamamushtaq5@gmail.com', '2024-08-17', '03112033680', 'Female', 'cv.docx', 'SYSTEMS LIMITED'),
(16, 'Ollyy', 'imamamushtaq5@gmail.com', '2024-08-08', '03112033680', 'male', 'cv.docx', ' THE DAWOOD GROUP'),
(17, 'Peyton Wright', 'bushrashakeel@gmail.com', '2024-08-09', '03112033680', 'male', 'cv.docx', 'THE DAWOOD GROUP'),
(18, 'John', 'imamamushtaq5@gmail.com', '2024-08-03', '03112033680', 'male', 'cv.docx', 'THE DAWOOD GROUP'),
(19, 'Ellison Terry', 'imamamushtaq5@gmail.com', '2024-08-30', '03112033680', 'male', 'cv.docx', 'OCEANIC TRADING COMPANY'),
(20, 'John', 'imamamushtaq5@gmail.com', '2024-08-21', '03112033680', 'Female', 'cv.docx', 'CODEUP');

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
(5, 'John', 'imamamushtaq5@gmail.com', '03112033680', 'THE DAWOOD GROUP', 'Selected', '2024-08-29', '12 am'),
(6, 'Peyton Wright', 'bushrashakeel@gmail.com', '03112033680', 'THE DAWOOD GROUP', 'Selected', '2024-08-23', '3pm'),
(7, 'Peyton Wright', 'bushrashakeel@gmail.com', '03112033680', 'THE DAWOOD GROUP', 'Selected', '2024-08-23', '12 am'),
(8, 'Ellison Terry', 'imamamushtaq5@gmail.com', '03112033680', 'OCEANIC TRADING COMPANY', 'Selected', '2024-08-31', '12 am'),
(9, 'John', 'imamamushtaq5@gmail.com', '03112033680', 'CODEUP', 'Selected', '2024-09-06', '12 am');

-- --------------------------------------------------------

--
-- Table structure for table `job_report`
--

CREATE TABLE `job_report` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `selection` varchar(255) NOT NULL,
  `inter_date` date NOT NULL,
  `inter_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_report`
--

INSERT INTO `job_report` (`id`, `name`, `email`, `phone`, `selection`, `inter_date`, `inter_time`) VALUES
(4, 'Anaya Beck', 'imamamushtaq5@gmail.com', '03112033680', 'Selected', '2024-08-10', '3pm');

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
(1, 'Imama Mushtaq ', 'imamamushtaq@gmail.com', 'imama'),
(2, 'Bushra Shakeel', 'bushrashakeel@gmail.com', 'bushra'),
(3, 'Asad Ali', 'asadali@gmail.com', 'asad');

-- --------------------------------------------------------

--
-- Table structure for table `male`
--

CREATE TABLE `male` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `male`
--

INSERT INTO `male` (`id`, `name`, `email`, `pdf`, `image`, `age`, `status`) VALUES
(2, 'Aryan', 'aryan@gmail.com', 'male_driver/pdf/Driving_Licence_application.pdf', 'male_driver/image/male1.jpg', '24', 0),
(3, 'Daniyal', 'daniyal@gmail.com', 'male_driver/pdf/Driving_Licence_application.pdf', 'male_driver/image/male2.jfif', '26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_office`
--

CREATE TABLE `meeting_office` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `booked_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting_office`
--

INSERT INTO `meeting_office` (`id`, `title`, `about`, `image`, `price`, `status`, `booked_by`) VALUES
(4, 'Collins Dictionary', 'A buildig or part of a ilding where one or more person are affairs of a private enterprise', '1.jpg', '10000', 1, ''),
(7, 'Slide Share', 'A buildig or part of a ilding where one or more person are affairs of a private enterprise', '3.jpg', '15000', 0, ''),
(8, 'Franklin', 'a building or part of a building where one or more person affairs of a private enterprise', '2.jpg', '10000', 1, 'Aleena Alfaro'),
(10, 'Velvet', 'a building or part of a building where one or more person affairs of a private enterprise', '4.jpg', '20000', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `card_number` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `email`, `dob`, `phone`, `address`, `post_code`, `gender`, `card_number`, `amount`, `status`) VALUES
(14, 'John Kim', 'imamamushtaq5@gmail.com', '1989-04-04', '03112033680', 'Karachi', '234567', 'Male', 4242, '50000', 0),
(15, 'Mya Bradshaw', 'imamamushtaq5@gmail.com', '2024-08-31', '03112033680', 'Karachi', '34542', 'Female', 4242, '50000', 1),
(16, 'Aleena Alfaro', 'imamamushtaq5@gmail.com', '2024-08-31', '03112033680', 'Karachi', '234567', 'Female', 4242, '50000', 1),
(17, 'Kim Dox', 'imamamushtaq5@gmail.com', '2024-08-17', '03112033680', 'Karachi', '74600', 'Female', 4242, '50000', 1),
(18, 'Ellison Terry', 'imamamushtaq5@gmail.com', '2024-08-30', '03112033680', 'karachi', '74600', 'Female', 4242, '50000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(2, 'Nuts and dried fruit.'),
(3, 'Snack mix'),
(4, 'Coffee'),
(5, 'Black Tea'),
(6, ' Tea'),
(7, 'Rice '),
(8, 'Cakes'),
(9, 'Fresh fruit'),
(10, 'Sandwich'),
(11, 'Yogurt'),
(12, 'Dark chocolate'),
(13, 'Popcorn'),
(14, 'Smoothie'),
(15, 'Potato chip');

-- --------------------------------------------------------

--
-- Table structure for table `menu_card`
--

CREATE TABLE `menu_card` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `room_title` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL DEFAULT 'none',
  `card_number` int(11) NOT NULL,
  `card_company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_card`
--

INSERT INTO `menu_card` (`id`, `email`, `room_title`, `menu`, `total_amount`, `message`, `card_number`, `card_company`) VALUES
(1, 'imamamushtaq@gmail.com', 'Franklin', 'Snack mix, Coffee, Black Tea', '13500.00', 'Deliver at room temperature.', 4242, 'Visa'),
(2, 'imamamushtaq@gmail.com', 'Franklin', 'Snack mix, Coffee, Black Tea,  Tea', '4000.00', 'Make sure it\'s well-cooked', 4242, 'Visa'),
(4, 'imamamushtaq@gmail.com', 'AceAdmin ', 'Nuts and dried fruit., Snack mix', '1000.00', 'I have a dairy allergy, please avoid any dairy products.', 4242, 'Visa'),
(5, 'imamamushtaq@gmail.com', 'AceAdmin ', 'Sandwich', '500.00', 'Deliver at room temperature.', 4242, 'Visa'),
(6, 'imamamushtaq@gmail.com', 'Franklin', 'Sandwich', '1000.00', 'No garlic, please.', 4242, 'Visa');

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
(1, 'OCEANIC TRADING COMPANY', '1mushtaqueimama@gmail.com', 'OCEANIC', 1),
(2, 'THE DAWOOD GROUP', '2mushtaqueimama@gmail.com', 'DAWOOD', 1),
(3, 'SYSTEMS LIMITED', '3mushtaqueimama@gmail.com', 'SYSTEMS\r\n', 1),
(4, '10PEARLS', 'mushtaqueimama@gmail.com', '10PEARLS', 0),
(6, 'CODEUP', '4mushtaqueimama@gmail.com', 'CODEUP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `office_space`
--

CREATE TABLE `office_space` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `booked_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_space`
--

INSERT INTO `office_space` (`id`, `title`, `about`, `image`, `price`, `status`, `booked_by`) VALUES
(1, 'Homepro workspace', 'HomePro Workspace; Desk Dynasty; Virtual HQ Ventures; Office Overture; HomeDesk Universe; DwellDesk Ventures', 'office1.jpg', '54,990 ', 0, NULL),
(2, 'Creative Arena', 'Creative Coworking Spaces Name Ideas. Artistic Abode; Visionary Village; Idea Incubator; Design Den; Creative ', 'office2.jpg', '12,000 ', 0, NULL),
(3, 'Colab', 'coLab offers 24 hour access  Coworking Spaces Name Ideas. Artistic Abode; Visionary DwellDesk Ventures', 'office3.jpg', '40,000', 1, 'John'),
(4, 'Coffee nook', ' Break Barn; Repose Refuge; Peaceful Pier; Serenity Stop; Unwind Hub; The Chill Pad; Chillax Corner ', 'office4.jpg', '35,000 ', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ourteam`
--

CREATE TABLE `ourteam` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ourteam`
--

INSERT INTO `ourteam` (`id`, `title`, `description`, `image`, `gender`, `qualification`) VALUES
(1, 'Manager', 'a person responsible for controlling or administering an organization or group of staff.', 'team1.jpg', 'Male', 'bachelors degree'),
(2, 'Room Keeper', 'A person employed by a hotel or similar establishment to clean, maintain and restock the rooms. ', 'team4.jfif', 'Female', 'bachelors /Inter'),
(3, 'Receptionist ', 'a person employed in a hotel to receive guests and deal with their bookings.', 'team3.jfif', 'Female', 'bachelors /Inter'),
(4, 'Supervisor', 'a person who supervises a person or an activity.', 'team6.jpg', 'Male', 'bachelors degree');

-- --------------------------------------------------------

--
-- Table structure for table `ourteam_job`
--

CREATE TABLE `ourteam_job` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ourteam_job`
--

INSERT INTO `ourteam_job` (`id`, `name`, `email`, `start_date`, `phone`, `cv`, `status`) VALUES
(4, 'Ellison Terry', 'imamamushtaq5@gmail.com', '2024-08-16', '03112033680', 'cv.docx', 0),
(5, 'Aleena Alfaro', 'mushtaqueimama@gmail.com', '2024-08-30', '03112033680', 'cv.docx', 0),
(6, 'Anaya Beck', 'imamamushtaq5@gmail.com', '2024-08-28', '03112033680', 'cv.docx', 1),
(7, 'John Kim', 'imamamushtaq5@gmail.com', '2024-08-10', '03112033680', 'cv.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pick_n_drop`
--

CREATE TABLE `pick_n_drop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pick_n_drop`
--

INSERT INTO `pick_n_drop` (`id`, `name`, `image`, `rent`) VALUES
(3, 'Bike', 'bike.jfif', '200'),
(4, 'Luxury Car', 'car.jpg', '800 '),
(5, 'Small Car  (without ac)', 'small car.jpg', '600');

-- --------------------------------------------------------

--
-- Table structure for table `pick_n_drop_record`
--

CREATE TABLE `pick_n_drop_record` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vehicleCategory` int(255) NOT NULL,
  `room_title` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_company` varchar(255) NOT NULL,
  `driver_gender` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pick_n_drop_record`
--

INSERT INTO `pick_n_drop_record` (`id`, `email`, `vehicleCategory`, `room_title`, `rent`, `card_number`, `card_company`, `driver_gender`, `message`) VALUES
(3, 'imamamushtaq5@gmail.com', 3, 'Collins Dictionary', '200', '4242', 'Visa', 'Male', 'none'),
(4, 'imamamushtaq5@gmail.com', 3, 'Colab', '200', '4242', 'Visa', 'Male', 'Can you confirm that the driver is trained in handling emergency situations?'),
(5, 'imamamushtaq@gmail.com', 3, 'AceAdmin ', '200', '4242', 'Visa', 'Female', 'Please sanitize the vehicle before pickup for hygiene purposes.'),
(7, 'imamamushtaq@gmail.com', 3, 'AceAdmin ', '200', '4242', 'Visa', 'Female', 'none'),
(8, 'imamamushtaq@gmail.com', 5, 'AceAdmin ', '600', '4242', 'Visa', 'Male', 'none'),
(10, 'imamamushtaq@gmail.com', 3, 'Franklin', '200', '4242', 'Visa', 'Male', 'I require a pickup at a specific time. Please confirm the timing and any potential delays.'),
(11, 'imamamushtaq@gmail.com', 4, 'Franklin', '800 ', '4242', 'Visa', 'Male', 'I have a pet traveling with me; kindly ensure the vehicle is pet-friendly and clean.');

-- --------------------------------------------------------

--
-- Table structure for table `profile_office`
--

CREATE TABLE `profile_office` (
  `id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `keyword1` varchar(255) NOT NULL,
  `keyword2` varchar(255) NOT NULL,
  `keyword3` varchar(255) NOT NULL,
  `about_office` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_office`
--

INSERT INTO `profile_office` (`id`, `office_name`, `keyword1`, `keyword2`, `keyword3`, `about_office`, `timing`, `location`, `contact`, `links`, `email`) VALUES
(1, 'THE DAWOOD GROUP', 'SEO Expert', 'DEVELOPMENT', 'GRAPHICS', 'The Dawood is a group of companies headquartered in Karachi. It is active in diverse businesses and industries of the Dawood family-business and is owned by Dawood family.', '09:00 am to 11:30 am Monday - Saturday', 'Dawood Centre, M.T. Khan Road, Karachi', '03112033680', 'http://www.instagram.com/TheDawood', 'dawood@gmail.com'),
(2, 'OCEANIC TRADING COMPANY', 'SEO', 'Productive', 'Comfortable', 'Oceanic Trading specialises in supplying a wide range of premium quality seafood products for the Australian and Overseas markets', '24 hours open', ' Suite 3, 69C 24th Commercial St, Phase 2 Ext Defence Housing Authority, Karachi, Karachi City, Sindh 75500', ' 0332 2000298', 'https://www.instagram.com/OCEANIC', 'OCEANIC@gmail.com'),
(3, 'SYSTEMS LIMITED', 'Modern', 'Innovative', 'Stylish', 'Systems Limited, a global SL company, embraces the power of innovation and technology to drive meaningful change for our clients,', '24 hours Open', '9 B, Sumya Building, Mohammad Ali Society Muhammad Ali Chs (Machs), Karachi, 12345', '0305 2243495', 'https://www.instagram.com/SYSTEMS', 'SYSTEMS@gmail.com'),
(4, '10PEARLS', 'Dynamic', 'Innovative', 'Comfortable', '10Pearls | The leading IT, Software, Web, App, and Emerging Technologies Services & Solutions | Enabling & Transforming Digitally Fortune 500 Clients', '8:00am to 8:00pm', ' 9th floor, Parsa Tower, Main Shahrah-e-Faisal Rd, Block 6 P.E.C.H.S., Karachi, Karachi City, Sindh', '(021) 34328447', 'https:/www.instagram.com/10PEARLS', '10PEARLS@gmail.com'),
(5, 'CODEUP', 'Formal', 'Functional', 'Versatile', 'We\'re an award-winning software development company with 150+ developers, QA engineers, and business experts who all work together', '24 hours Open ', '32/03 Shahrah-e-Faisal Rd, Bangalore Town Block A Shabbirabad, Karachi, Karachi City, Sindh 75400', '+1 281-595-8169', 'https:/www.instagram.com/CODEUP', 'CODEUP@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `rate`, `message`) VALUES
(1, 'John', '⭐⭐⭐⭐⭐', 'It is a very professional site and your webmaster did an outstanding job. Wouldn\'t change a thing. Keep up the good work!'),
(2, 'Peter', '⭐⭐⭐⭐⭐', 'Thanks for all your help this past year!'),
(3, 'Elon', '⭐⭐⭐⭐', 'I was completely impressed with their professionalism and customer service.'),
(4, 'Ellison Terry', '⭐⭐⭐⭐⭐', 'Thanks for all your help this past year!');

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
(1, 'Gabriela Shaw', 'gabriela@gmail.com', '12345'),
(2, 'Emily Yates', 'emily@gmal.om', '12345'),
(3, 'Henrik York', 'henrik@gmail.com', '12345'),
(4, 'Samir Riley', 'samir@gmail.com', '12345'),
(5, 'Amora Case', 'amora@gmail.com', '12345'),
(6, 'Brooks Sanchez', 'brooks@gmail.com', '12345'),
(8, 'Nixon Salgado', 'nixon@gmail.com', '12345'),
(9, 'Harold Silva', 'harold@gmail.com', '12345'),
(10, 'Bella Garcia', 'bella@gmail.com', '12345'),
(11, 'Hassan Berg', 'hassan@gmail.com', '12345');

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
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `booked_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `virtual_office`
--

INSERT INTO `virtual_office` (`id`, `title`, `about`, `image`, `price`, `status`, `booked_by`) VALUES
(2, 'Virtual Nook', 'A virtual office is an arrangement that lets business have professional addresses as well asChoose a new business address in a prime location ', 'virtual3.jpg', '20,500', 0, NULL),
(3, 'SmartServe', 'SmartServe can be used by entrepreneurs, freelancers, and small businesses that do not need or cannot afford a traditional office space', 'virtual2.jpg', '40,000', 0, NULL),
(4, 'TaskTrekker', 'A TaskTrekker  is a service that gives you a business address, a place to receive mail, and access to meeting rooms & physical office space', 'virtual4.jpg', '12,000 ', 0, NULL),
(6, 'AceAdmin ', 'AceAdmin  can be used by entrepreneurs, freelancers, and small businesses that do not need or cannot afford a traditional office space', 'virtual5.jpg', '57,990', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_contact`
--
ALTER TABLE `event_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `female`
--
ALTER TABLE `female`
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
-- Indexes for table `job_report`
--
ALTER TABLE `job_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `male`
--
ALTER TABLE `male`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_office`
--
ALTER TABLE `meeting_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_card`
--
ALTER TABLE `menu_card`
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
-- Indexes for table `ourteam`
--
ALTER TABLE `ourteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourteam_job`
--
ALTER TABLE `ourteam_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_n_drop`
--
ALTER TABLE `pick_n_drop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_n_drop_record`
--
ALTER TABLE `pick_n_drop_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicleCategory` (`vehicleCategory`);

--
-- Indexes for table `profile_office`
--
ALTER TABLE `profile_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_contact`
--
ALTER TABLE `event_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `female`
--
ALTER TABLE `female`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_app_report`
--
ALTER TABLE `job_app_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_report`
--
ALTER TABLE `job_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `male`
--
ALTER TABLE `male`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meeting_office`
--
ALTER TABLE `meeting_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_card`
--
ALTER TABLE `menu_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office_req`
--
ALTER TABLE `office_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `office_space`
--
ALTER TABLE `office_space`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ourteam`
--
ALTER TABLE `ourteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ourteam_job`
--
ALTER TABLE `ourteam_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pick_n_drop`
--
ALTER TABLE `pick_n_drop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pick_n_drop_record`
--
ALTER TABLE `pick_n_drop_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile_office`
--
ALTER TABLE `profile_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `virtual_office`
--
ALTER TABLE `virtual_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pick_n_drop_record`
--
ALTER TABLE `pick_n_drop_record`
  ADD CONSTRAINT `pick_n_drop_record_ibfk_1` FOREIGN KEY (`vehicleCategory`) REFERENCES `pick_n_drop` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
