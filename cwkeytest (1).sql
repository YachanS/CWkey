-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2018 at 09:15 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prix`
--

CREATE TABLE `prix` (
  `id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `dateDeb` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `idCowo` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `name` varchar(30) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `coworking`
--
ALTER TABLE `coworking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `prix`
--
ALTER TABLE `prix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSalle` (`idSalle`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCowo` (`idCowo`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `idUser` (`idUser`);

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
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `prix`
--
ALTER TABLE `prix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Constraints for table `prix`
--
ALTER TABLE `prix`
  ADD CONSTRAINT `prix_ibfk_1` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idCowo`) REFERENCES `coworking` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

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
