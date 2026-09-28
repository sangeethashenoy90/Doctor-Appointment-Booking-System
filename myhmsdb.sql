-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2020 at 02:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*Database: `myhmsdb`*/


CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');


CREATE TABLE `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- `id` is the primary key used for delete/edit operations.
-- `email` and `username` are the fields actually used to log in / identify a
-- doctor, so they are the ones enforced as unique -- not name, spec, or fees.
CREATE TABLE `doctb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `doctb` (`id`, `username`, `password`, `email`, `spec`, `docFees`) VALUES
(1, 'Dinesh', 'dinesh123', 'dinesh@gmail.com', 'Gynecologist', 700),
(2, 'Kishan', 'kishan123', 'kishan@gmail.com', 'Pediatrician', 300),
(3, 'Rohith', 'rohith123', 'rohith@gmail.com', 'Neurologist', 500),
(4, 'Suresh', 'suresh123', 'suresh@gmail.com', 'Cardiologist', 900),
(5, 'Arthika', 'arthika123', 'arthika@gmail.com', 'Gynecologist', 700),
(6, 'Isha', 'isha123', 'isha@gmail.com', 'Cardiologist', 900),
(7, 'Ritu', 'ritu123', 'ritu@gmail.com', 'Neurologist', 500),
(8, 'Shruthi', 'shruthi123', 'shruthi@gmail.com', 'Pediatrician', 300);



CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `doctb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_doctb_email` (`email`),
  ADD UNIQUE KEY `uniq_doctb_username` (`username`);


ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `uniq_patreg_email` (`email`);


ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `doctb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `patreg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
COMMIT;
