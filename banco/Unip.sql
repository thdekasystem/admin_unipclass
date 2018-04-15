-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2018 at 04:23 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Unip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idLogin` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idLogin`, `login`, `senha`) VALUES
(1, 'unipclassadmin', '9010#2030a');

-- --------------------------------------------------------

--
-- Table structure for table `Cursos`
--

CREATE TABLE `Cursos` (
  `idCursos` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Semestres` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cursos`
--

INSERT INTO `Cursos` (`idCursos`, `Nome`, `Semestres`) VALUES
(4, 'Análise e Desenvolvimento de Sistemas', 4),
(6, 'Administração', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Salas`
--

CREATE TABLE `Salas` (
  `idSalas` int(11) NOT NULL,
  `Nome` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Salas`
--

INSERT INTO `Salas` (`idSalas`, `Nome`) VALUES
(11, 'd30'),
(2, 'D31'),
(8, 'd34'),
(6, 'd44'),
(9, 'f21'),
(7, 'f22'),
(1, 'F23'),
(10, 'f24');

-- --------------------------------------------------------

--
-- Table structure for table `Turmas`
--

CREATE TABLE `Turmas` (
  `idTurmas` int(11) NOT NULL,
  `Cursos_idCursos` int(11) DEFAULT NULL,
  `Salas_idSalas` int(11) DEFAULT NULL,
  `Periodo` varchar(50) DEFAULT NULL,
  `Semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Turmas`
--

INSERT INTO `Turmas` (`idTurmas`, `Cursos_idCursos`, `Salas_idSalas`, `Periodo`, `Semestre`) VALUES
(7, 4, 8, 'matutino', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `Cursos`
--
ALTER TABLE `Cursos`
  ADD PRIMARY KEY (`idCursos`),
  ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Indexes for table `Salas`
--
ALTER TABLE `Salas`
  ADD PRIMARY KEY (`idSalas`),
  ADD UNIQUE KEY `Nome_UNIQUE` (`Nome`);

--
-- Indexes for table `Turmas`
--
ALTER TABLE `Turmas`
  ADD PRIMARY KEY (`idTurmas`) USING BTREE,
  ADD KEY `fk_Turmas_Salas1_idx` (`Salas_idSalas`),
  ADD KEY `fk_Turmas_Cursos_idx` (`Cursos_idCursos`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Cursos`
--
ALTER TABLE `Cursos`
  MODIFY `idCursos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Salas`
--
ALTER TABLE `Salas`
  MODIFY `idSalas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Turmas`
--
ALTER TABLE `Turmas`
  MODIFY `idTurmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Turmas`
--
ALTER TABLE `Turmas`
  ADD CONSTRAINT `fk_Turmas_Cursos` FOREIGN KEY (`Cursos_idCursos`) REFERENCES `Cursos` (`idCursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Turmas_Salas1` FOREIGN KEY (`Salas_idSalas`) REFERENCES `Salas` (`idSalas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
