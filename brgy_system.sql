-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 03:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `control_no` int(11) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_until` datetime NOT NULL,
  `activity_type` varchar(200) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `organizer` varchar(200) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `benefits` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`control_no`, `date_from`, `date_until`, `activity_type`, `event_title`, `description`, `organizer`, `venue`, `benefits`, `amount`, `status`) VALUES
(1, '2021-10-06 14:58:12', '2021-10-06 14:59:12', 'Seminar', 'Quarterly Seminar for Senior Citizens	', 'Proident ullamco excepteur ipsum ex.	', 'John D. Doe	', 'Barangay Onse Covered Court', 'T-Shirt', 'P500', 1),
(2, '2021-10-13 21:18:00', '2021-11-01 21:19:00', 'act type', 'ev title', 'description lorem ipsum', 'organizer', 'venue', 'benfit', 'amount', 1),
(3, '2021-10-10 21:46:00', '2021-10-12 21:46:00', 'Activity Type', 'Event Title', 'Description', 'Org', 'Venue', 'Benef', '6940534', 1),
(4, '2021-11-06 15:27:00', '2021-11-15 15:27:00', 'e', 'test', 'testt', 'testt', 'test', 'test', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pword` varchar(65) NOT NULL,
  `position` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_number`, `name`, `uname`, `pword`, `position`, `contact`) VALUES
(1, '5647', 'Rajon Rondo', 'admin@gmail.com', '$2y$10$2s4q3oYg9WfmLVK0Qa/nvuscG2Md5TUDgkhFGjikqmfYUYWs7S15q', 'admin', '0915412945'),
(4, '7863', 'Jose Maria Edito K. Tirol', 'vidarghieann@gmail.com', '$2y$10$IJl9Xll7YPpcN4aerGojyuwgPabs4sNMHTPURistB.QuYpjQgB3s6', 'Staff', '092025550123');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL,
  `info` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `info`, `date_added`) VALUES
(1, 'benefit', '2021-10-10 19:32:24'),
(2, 'dwadwa', '2021-10-10 21:31:31'),
(3, 'dwadwa', '2021-10-10 21:31:33'),
(4, 'test', '2021-10-10 21:47:20'),
(5, 'testing', '2021-10-10 21:47:24'),
(6, 'hehe', '2021-10-10 21:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `complaint_date` datetime NOT NULL,
  `complaint_statement` varchar(255) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `senior_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `complaint_date`, `complaint_statement`, `complaint_status`, `senior_id`) VALUES
(1, '2021-10-31 16:31:42', 'Ugly', 4, 69765);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `info` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `info`, `date_added`) VALUES
(1, 'discount', '2021-10-10 19:32:32'),
(2, '50% discount sa mcdo', '2021-10-10 21:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int(11) NOT NULL,
  `info` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `info`, `date_added`) VALUES
(1, 'fact', '2021-10-10 19:32:35'),
(2, 'facts', '2021-10-10 21:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `chat_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `user_type` varchar(7) NOT NULL,
  `message` mediumtext NOT NULL,
  `timestamp` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`chat_id`, `to_id`, `from_id`, `user_type`, `message`, `timestamp`, `status`) VALUES
(191, 1232, 1, 'admin', 'Good Day!', '2021-10-25 22:48:03', 1),
(201, 1232, 1, 'admin', 'Good Day!', '2021-11-01 07:34:41', 1),
(202, 1232, 1, 'admin', 'dwadaw', '2021-11-01 07:37:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `image_id` varchar(500) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_until` datetime NOT NULL,
  `content` mediumtext NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `image`, `image_id`, `date_from`, `date_until`, `content`, `status`, `date_added`) VALUES
(1, 'Sluggers snitch 2nd straight softball tourneyk', '2.jpg', '1634109405962176528616687dd4b86c', '2021-10-13 15:16:00', '2021-10-13 15:16:00', '3213assadasdwqwedxadk', 1, '2021-10-13 15:16:45'),
(2, 'aaaaaaaaaa', '2.jpg', '163410973812238362676166892a4dcc8', '2021-10-13 15:22:00', '2021-10-13 15:22:00', 'sasasddaasdasd', 0, '2021-10-13 15:22:18'),
(3, 'Sluggers snitch 2nd straight softball tourney', '1.jpg', '1634352171665669072616a3c2b5513b', '2021-10-23 10:42:00', '2021-10-30 10:42:00', 'dddd', 1, '2021-10-16 10:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `info` mediumtext NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `info`, `date_added`) VALUES
(1, '<p><strong>A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs. ... One of the most important of these is a topic sentence.dddddddd</strong></p>', '2021-10-10 19:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `request_details` varchar(255) NOT NULL,
  `request_status` int(11) NOT NULL,
  `senior_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_date`, `request_type`, `request_details`, `request_status`, `senior_id`) VALUES
(1, '2021-10-31 23:27:59', 'Barangay Clearance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat sem ut arcu eleifend tempus. Nullam feugiat consectetur ipsum, non placerat ipsum scelerisque nec. Phasellus sit amet faucibus enim.', 1, 1232);

-- --------------------------------------------------------

--
-- Table structure for table `seniors`
--

CREATE TABLE `seniors` (
  `SeniorID` varchar(255) NOT NULL,
  `SenLastName` varchar(255) NOT NULL,
  `SenFirstName` varchar(255) NOT NULL,
  `SenMiddleName` varchar(255) NOT NULL,
  `SenStatus` varchar(255) NOT NULL,
  `HomeAdd` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `CivilStatus` varchar(255) NOT NULL,
  `SenLandLineNumber` varchar(255) DEFAULT NULL,
  `SenMobileNumber` varchar(255) DEFAULT NULL,
  `SenEmailAdd` varchar(255) DEFAULT NULL,
  `UserId` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `QRcode` varchar(255) NOT NULL,
  `NameOfGuardian` varchar(255) NOT NULL,
  `GuardianMobileNumber` varchar(255) DEFAULT NULL,
  `GuardianLandlineNumber` varchar(255) NOT NULL,
  `Senior_Citizen` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seniors`
--

INSERT INTO `seniors` (`SeniorID`, `SenLastName`, `SenFirstName`, `SenMiddleName`, `SenStatus`, `HomeAdd`, `Birthdate`, `Gender`, `CivilStatus`, `SenLandLineNumber`, `SenMobileNumber`, `SenEmailAdd`, `UserId`, `UserPassword`, `QRcode`, `NameOfGuardian`, `GuardianMobileNumber`, `GuardianLandlineNumber`, `Senior_Citizen`, `Status`) VALUES
('1232', 'Rondo', 'Rajon', 'Kyrie', '1', 'yellow gate', '2021-10-25', 'Male', 'asdasdd', '1', '123313231312', 'cheezymozzarella@gmail.com', 'asdasd', '12345', 'N/A', 'adasdasd', 'adasdasd', 'adasdasd', 1, 1),
('69765', 'Vidarr', 'Dennis', 'Ezekiel', 'eee', 'asdsdads', '2021-10-24', 'Male', 'Married', '23231321332', '+639605469021', 'cheezymozzarella@gmail.com', 'vidarllander', '12345', 'N/A', 'gaurn', '+639605469021', '1232133333333333333333', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`control_no`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seniors`
--
ALTER TABLE `seniors`
  ADD PRIMARY KEY (`SeniorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `control_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
