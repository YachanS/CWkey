-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2018 at 11:41 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwkeytest`
--

-- --------------------------------------------------------

--
-- Table structure for table `coworking`
--

CREATE TABLE `coworking` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coworking`
--

INSERT INTO `coworking` (`id`, `libelle`) VALUES
(1, 'Niort'),
(2, 'La Rochelle'),
(3, 'Poitiers');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `dateDeb` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `idSalle` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coworking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `libelle`) VALUES
(1, 'Salle de reunion (Grande)'),
(2, 'Salle de reunion (petite)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `register_date` date NOT NULL,
  `rang` int(2) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `register_date`, `rang`, `phone`, `name`) VALUES
(11, 'yachan@hotmail.fr', '$2y$10$OY1fIb2MjvDz1roakDUWbuCqhhkUDaqt3MJ5c0Ub0yHXftdb3ak4G', '2018-05-31', 3, '0644859129', 'yachan');

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifi`
--

INSERT INTO `wifi` (`id`, `libelle`) VALUES
(1, 'KAPTAIN OpenSpace'),
(2, 'KAPTAIN Reunion');

-- --------------------------------------------------------

--
-- Table structure for table `wifi_user`
--

CREATE TABLE `wifi_user` (
  `id` int(11) NOT NULL,
  `id_wifi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coworking` int(11) NOT NULL,
  `mdp` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifi_user`
--

INSERT INTO `wifi_user` (`id`, `id_wifi`, `id_user`, `id_coworking`, `mdp`) VALUES
(16, 1, 11, 2, 'kyxim1sh'),
(17, 2, 11, 2, 'i56nrvhm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coworking`
--
ALTER TABLE `coworking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `id_coworking` (`id_coworking`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wifi`
--
ALTER TABLE `wifi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wifi_user`
--
ALTER TABLE `wifi_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wifi_user_ibfk_1` (`id_user`),
  ADD KEY `id_wifi` (`id_wifi`),
  ADD KEY `id_coworking` (`id_coworking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coworking`
--
ALTER TABLE `coworking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wifi`
--
ALTER TABLE `wifi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wifi_user`
--
ALTER TABLE `wifi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_coworking`) REFERENCES `coworking` (`id`);

--
-- Constraints for table `wifi_user`
--
ALTER TABLE `wifi_user`
  ADD CONSTRAINT `wifi_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wifi_user_ibfk_2` FOREIGN KEY (`id_wifi`) REFERENCES `wifi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wifi_user_ibfk_3` FOREIGN KEY (`id_coworking`) REFERENCES `coworking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
