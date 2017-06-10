-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Iun 2017 la 15:42
-- Versiune server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Anul 1'),
(2, 'Anul 2'),
(3, 'Clasa 12 E');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `semester` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `course`
--

INSERT INTO `course` (`id`, `name`, `year`, `semester`, `type`, `user_id`) VALUES
(2, '0', 'Anul 2 - Licenta', 'Sem 2', 'Course', 12),
(3, 'TSS', 'Anul 3 - Licenta', 'Sem 2', 'Course', 9);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `profile`
--

INSERT INTO `profile` (`id`, `name`) VALUES
(2, 'Informatica-Romana'),
(3, 'Sisteme de operare'),
(4, 'Informatica-Engleza'),
(5, 'Informatica-Engleza'),
(6, 'Matematica-Aplicata');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `secretary`
--

CREATE TABLE `secretary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `secretary`
--

INSERT INTO `secretary` (`id`, `user_id`) VALUES
(1, 1),
(2, 10);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `admission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `student`
--

INSERT INTO `student` (`id`, `user_id`, `profile_id`, `class_id`, `admission_date`) VALUES
(3, 6, 2, 2, '2015-10-19'),
(4, 10, 2, 1, '2001-01-11');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` date NOT NULL,
  `profile_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`) VALUES
(5, 9);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `role_id`) VALUES
(1, 'Secretar', 'Secretar', 'Adelina', 'Diaconescu', 'diaconescu.adelina@yahoo.com', '0745783902', 1),
(4, 'Student1', '5e5545d38a68148a2d5bd5ec9a89e327', 'Kili', 'Ghade', 'khgyj@nu.com', '0745783902', 0),
(5, 'Student2', '213ee683360d88249109c2f92789dbc3', 'Oana', 'Popescu', 'oana.ana@gmail.com', '0743875902', 0),
(6, 'Student3', '8e4947690532bc44a8e41e9fb365b76a', 'Lucian', 'Cerbu', 'luci.lucian@gmail.com', '0752947233', 0),
(9, 'Teacher', 'Teacher', 'Olga', 'Pop', 'oana.ana@gmail.com', '0745783902', 2),
(10, 'adelina', '69e4addfd0d633b6b87e3c487c39117c', 'Ana', 'Bella', 'miricica_dragutza2009@yahoo.com', '09754627247', 1),
(11, 'adelina', '69e4addfd0d633b6b87e3c487c39117c', 'adelina', 'bella', 'miricica_dragutza2009@yahoo.com', '68454564', 0),
(12, 'profesor', 'profesor', 'Daniel', 'Rusu', 'daniel.rusu@yahoo.com', '0744596878', 2),
(13, 'student', 'student', 'Andreea', 'Drancean', 'andreea.drancea95n@e-uvt.ro', '0756987236', 3),
(14, 'Mircea', '$2y$10$HJsg8Q/Dx9CrGsF5eZMW3.BHeHHOsQhc7WYh1YLRxAknnAFerN6WS', 'Mircea', 'Pop', 'pop.mircea@yahoo.com', '+40752945869', 0),
(15, 'admin3', '$2y$10$otD4xz8zIdwav9o22Oo0KOyMKbrqSyZ.EWBgQP9ykP.S02iI1O01C', 'Miruna', 'Ioana', 'miruna.ioana@yahoo.com', '+40736124859', 0),
(16, 'admin4', '$2y$10$hP/f.RSc549Xl6dM.niMb.EQSUgbIMgBJQY9RDP/mqFwnsd6Or7.m', 'Miruna', 'Ioana', 'miruna.ioana@yahoo.com', '+40736124859', 0),
(17, 'student_new', '$2y$10$tj8pPtHw0FZzMk2c3LrkU.twbMPfHWQG33psqVwblJhU3Z.BW0eP.', 'Cosmin', 'Drula', 'dtc.cosmin@yahoo.com', '+40752945869', 3),
(18, 'Ade', '$2y$10$Xw//Im6lOyt61aED/AJeYe.YsrXF0K5mPVZC.K0q6DTXh/tICoana', 'Ade', 'Minu', 'ade.minu@YAHOO.COM', '+40752945869', 2),
(19, 'Ola', '$2y$10$Pk2XG.naVR99LFVRp/ydfefPZaGb5iXkocW3q/I.JeJORF1PXxj.W', 'Ola', 'Ola', 'oladdddd', '+40752945869', 3),
(20, 'didi', '$2y$10$U4e7UX7Yi6F/GwSXYvPxcOB0fZmpTm.0rqwy9qged0jr1wvgtgbIe', 'didid', 'didi', 'ddidjhd', '+40736124859', 3);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Salvarea datelor din tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Secretary'),
(2, 'Teacher'),
(3, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secretary`
--
ALTER TABLE `secretary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `secretary`
--
ALTER TABLE `secretary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
