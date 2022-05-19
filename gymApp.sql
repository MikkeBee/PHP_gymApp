-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: 19.05.2022 klo 06:44
-- Palvelimen versio: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymApp`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `ArmDay`
--

CREATE TABLE `ArmDay` (
  `id` int NOT NULL,
  `Exercise` text NOT NULL,
  `Reps` text NOT NULL,
  `Weight` text NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `ArmDay`
--

INSERT INTO `ArmDay` (`id`, `Exercise`, `Reps`, `Weight`, `Notes`) VALUES
(1, 'Biceps', '3x4', '20', 'moar'),
(5, 'Triceps', '3x4', '30', 'moar!'),
(6, 'Shoulder press', '4x4', '55', 'lightweight baby!'),
(14, 'Bench press', '4x4', '80', '');

-- --------------------------------------------------------

--
-- Rakenne taululle `gymprogramme`
--

CREATE TABLE `gymprogramme` (
  `id` int NOT NULL,
  `Exercise` text NOT NULL,
  `Reps` text NOT NULL,
  `Weight` text NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `LegDay`
--

CREATE TABLE `LegDay` (
  `id` int NOT NULL,
  `Exercise` text,
  `Reps` text,
  `Weight` text,
  `Notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `LegDay`
--

INSERT INTO `LegDay` (`id`, `Exercise`, `Reps`, `Weight`, `Notes`) VALUES
(1, 'Back squat', '4x4', '130', ''),
(2, 'Single leg squat', '4x4', '40', ''),
(3, 'Deadlift', '4x4', '180', ''),
(4, 'Donkey kick', '4x4', 'fiiliksen mukaan', ''),
(5, 'RDL', '4x4', '80', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ArmDay`
--
ALTER TABLE `ArmDay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymprogramme`
--
ALTER TABLE `gymprogramme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LegDay`
--
ALTER TABLE `LegDay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ArmDay`
--
ALTER TABLE `ArmDay`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gymprogramme`
--
ALTER TABLE `gymprogramme`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `LegDay`
--
ALTER TABLE `LegDay`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
