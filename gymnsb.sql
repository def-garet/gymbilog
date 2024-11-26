-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 12:35 PM
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
-- Database: `gymnsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `message`, `date`) VALUES
(7, 'We regret to inform you that our gym will be temporarily closed for the upcoming holyweek, starting March 26 to March 31, in observance of the occasion. We apologize for any inconvenience this may cause and look forward to serving you again when we reopen', '2024-03-25'),
(8, 'The reopening schedule for our gym facilities is currently under review and will be announced soon. Kindly stay tuned for updates.', '2024-05-03'),
(9, 'The renovation process is currently underway. The expected completion date is not yet specified, so please stay tuned for further updates.', '2024-06-24'),
(10, 'Stay tuned for the latest update from the admin.', '2024-07-15'),
(12, 'GUSTO KO NA MAGTULOG!!!', '2024-03-25'),
(14, 'Nag taas na si pearl gaiz', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `amount`, `quantity`, `vendor`, `description`, `address`, `contact`, `date`) VALUES
(3, 'Ovicx A2S Foldable Treadmill', 20280, 4, 'TOBYS', 'Fulfill those running goals at home with the OVICX A2S. Featuring a 4-Position Elastomer Shock Absorption System, impact on the ankles, knees, hips and more is decreased, while also minimizing noise so you can push harder with each step. 6 built-in workou', 'TOBYS Official Store', '09196462341', '2023-03-07'),
(4, 'Primus Vertical Chest Press Machine', 60000, 3, 'TOTAL SPORTS PH', 'Functional equipment for working out the pectoralis muscles. The user can effectively train chest and arms by pushing the handle grips forward.', 'Iloilo City', '09893578129', '2024-03-19'),
(5, 'Selectorized Adjustable Dumbbells', 20000, 20, 'Stark Fitness', 'The Selectorized Adjustable Dumbbells are a versatile and space-saving strength training option, offering a wide range of weight adjustments for different fitness levels.', '747 Nicanor Padilla Street San Miguel, Manila, Philippines ', '09875552100', '2023-03-29'),
(6, 'Trax Strength Weight Gym Bench', 12999, 4, 'Trax', 'The Trax Strength Weight Gym Bench is a versatile and durable bench for weight training, with adjustable back pad, squat rack, leg developer, high-density foam padding, and heavy-duty steel frame for up to 130kg user weight.', '4th Floor, #18 K. Plaza Bldg., Kamuning Rd., Q.C.', '09874581991', '2023-04-05'),
(7, 'Trax Recumbent Stationary Bike', 21999, 5, 'Trax', 'Trax Recumbent Bike for low-impact, comfortable, personalized cardio exercise for users of all ages.', '4th Floor, #18 K. Plaza Bldg., Kamuning Rd., Q.C.', '09852045452', '2023-04-03'),
(10, 'Air Rowing Machine', 72060, 10, '‎Row Warrior', 'Air Rowing Machine | Foldable Gym-Quality Row Machine | 10- Damper Levels Cardio Machine for Full-Body Workout | Rowing Machine for Home Use with LED-Monitor | Rower Machine for Home Gym', 'Row Warrior', '09741258554', '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dor` date NOT NULL,
  `services` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `paid_date` date NOT NULL,
  `p_year` int(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `attendance_count` int(255) NOT NULL,
  `ini_weight` int(255) NOT NULL DEFAULT 0,
  `curr_weight` int(255) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(255) NOT NULL,
  `curr_bodytype` varchar(255) NOT NULL,
  `progress_date` date NOT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `dor`, `services`, `amount`, `paid_date`, `p_year`, `plan`, `address`, `contact`, `status`, `attendance_count`, `ini_weight`, `curr_weight`, `ini_bodytype`, `curr_bodytype`, `progress_date`, `reminder`) VALUES
(6, 'Harry Potter', 'harry', 'harry123', 'Male', '2020-12-25', 'Fitness', 55, '2024-04-02', 2020, '1', 'Jaro, Iloilo City', '09854587854', 'Active', 4, 54, 62, 'Slim', 'Buffed', '2024-03-22', 0),
(8, 'Charles Dimagiba', 'charles', 'chay345', 'Male', '2020-02-02', 'Fitness', 200, '2023-05-02', 2020, '3', 'Pavia, Iloilo', '09145768531', 'Active', 14, 92, 85, 'Fat', 'Bulked', '2023-04-22', 1),
(11, 'Daniel Machon', 'dan', 'dankey90', 'Male', '2021-01-25', 'Cardio', 300, '2023-03-31', 2020, '3', 'Lapaz, Iloilo City', '09753575222', 'Active', 9, 0, 0, '', '', '2023-12-31', 0),
(14, 'Manuel Lopez', 'manny', 'mannypew23', 'Male', '2021-06-10', 'Fitness', 250, '2023-05-22', 2020, '12', 'Brgy. Hughes, Iloilo City', '09157888001', 'Active', 13, 59, 63, 'Slim', 'Slim', '2024-03-23', 0),
(16, 'Mary Reyes', 'Mary', 'marimar12', 'Female', '2021-05-11', 'Fitness', 320, '2024-03-25', 2021, '1', '4 Demo Lane', '741111110', 'Expired', 26, 50, 61, 'Slim', 'Slim', '2024-03-11', 0),
(17, 'Karen Myers', 'karen', 'keren90', 'Female', '2021-05-22', 'Cardio', 120, '2023-05-31', 2020, '3', 'Calaparan, Iloilo', '09744100254', 'Active', 12, 0, 0, '', '', '2024-03-12', 0),
(18, 'Jean Santos', 'jeanie', 'jean234', 'Female', '2020-04-04', 'Fitness', 550, '2023-06-11', 2021, '1', '86 Hilltop Street', '09785444541', 'Active', 11, 0, 0, '', '', '2024-03-01', 0),
(19, 'George Martinez', 'george', 'georgi89e', 'Male', '2019-04-02', 'Fitness', 550, '2023-06-11', 2021, '1', 'Calumpang, Iloilo City', '09258987850', 'Active', 22, 0, 0, '', '', '2024-03-23', 1),
(20, 'Francisca Garcia', 'cheska', 'cisca90', 'Female', '2020-03-21', 'Fitness', 550, '2023-06-11', 2021, '1', '24 Cody Ridge Road', '09854789652', 'Active', 18, 0, 0, '', '', '0000-00-00', 0),
(21, 'Tristan Reyes', 'tristan', 'tannie90', 'Male', '2020-04-02', 'Cardio', 120, '2023-06-01', 2021, '3', 'Lapuz, Iloilo City', '09984568520', 'Active', 11, 0, 0, '', '', '0000-00-00', 0),
(22, 'Vincent Ramos', 'vince', 'cente56', 'Male', '2020-04-01', 'Fitness', 550, '2023-04-05', 2020, '3', 'Mohon, Iloilo City', '09529997500', 'Active', 7, 0, 0, '', '', '0000-00-00', 0),
(23, 'Keith Martin Espinosa', 'martin', 'mart890', 'Male', '2020-04-02', 'Cardio', 120, '2022-06-02', 2021, '3', 'Jaro, Iloilo City', '7895456250', 'Active', 24, 51, 68, 'Slim', 'Muscular', '2024-03-02', 0),
(24, 'Leonardo Ocampo', 'leon', 'leo9021', 'Male', '2020-02-02', 'Sauna', 420, '2022-05-31', 2022, '12', 'Brgy. Zamora, Iloilo City', '09012545580', 'Active', 1, 0, 0, '', '', '0000-00-00', 0),
(25, 'Rayven Ledesma', 'rayray', 'rayven2qer', 'Male', '2022-02-19', 'Cardio', 120, '2024-03-25', 2022, '1', 'Oton, Iloilo City', '09785450002', 'Active', 2, 0, 0, '', '', '0000-00-00', 0),
(26, 'Marianne Cruz', 'maryan', 'marikes45', 'Female', '2020-05-18', 'Sauna', 420, '2022-06-01', 2022, '12', 'Brgy. Sta. Cruz, Iloilo City', '09995554444', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(27, 'Denev Ramirez', 'denev', 'dene9023', 'Male', '2022-12-12', 'Cardio', 400, '2022-05-30', 2022, '1', 'Rizal, Iloilo City', '09354578554', 'Active', 1, 0, 0, '', '', '0000-00-00', 0),
(29, 'Isabela Cruz', 'isang', 'isaduwa3', 'Female', '2022-06-02', 'Fitness', 330, '2022-06-02', 0, '6', 'Villa, Iloilo', '09896587458', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(31, 'Shio Bantot', 'shiopao', '123', 'Male', '2024-03-25', 'Fitness', 900, '2024-03-25', 2024, '3', 'Ambot', '01231', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(32, 'Rei Canlas', 'reicanlas', '123', 'Female', '2024-03-25', 'Fitness', 3000, '2024-03-25', 2024, '1', 'sa puso niya', '09123123', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(33, 'Shio Bantot', 'user1234', '1234', 'Male', '2024-04-02', 'Cardio', 21600, '2024-04-02', 0, '180', 'Secret,baka puntahan mo', '0912344345', 'Active', 0, 0, 0, 'Slim', 'Bulk', '2024-04-02', 0),
(37, 'Anne Pearl', 'Pearl PorEleBen', 'qwerty123', 'Female', '2024-04-02', 'Cardio', 120, '2024-04-02', 55, '1', 'janlangsaFoodHub', '123123123123', 'Pending', 0, 15, 45, 'Slim', 'Bulk', '2024-04-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `charge`) VALUES
(1, 'Fitness', '100'),
(2, 'Sauna', '120'),
(3, 'Cardio', '100');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `name`, `message`, `status`, `date`, `user_id`) VALUES
(12, 'staff', 'ehe', 'unread', '0202-04-16 22:39:59', 0),
(13, 'staff', 'qweqs', 'unread', '2020-04-16 22:40:49', 0),
(14, 'staff', 'fefeiwru', 'unread', '2020-04-16 22:41:59', 0),
(15, 'staff', 'pvfov', 'unread', '2020-04-16 22:42:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(55) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`user_id`, `username`, `password`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`, `profile_picture`) VALUES
(1, 'staff', 'pearl123', 'pearl@mail.com', 'staff', 'Ambot', 'Cashier', 'Female', 2147483647, 'img/profile/20241126-12-34-09.png');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task_status`, `task_desc`, `user_id`) VALUES
(20, 'In Progress', 'Test Completed', 14),
(21, 'Pending', 'Mastering Crunches', 6),
(22, 'In Progress', 'Standing Workouts For Flat Abs', 6),
(23, 'In Progress', 'Triceps Buildup - 3 set', 14),
(24, 'Pending', 'Decline dumbbell bench press', 6),
(30, 'Pending', 'matulog ko', 29),
(31, 'Pending', 'Plank 2 minutes', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
