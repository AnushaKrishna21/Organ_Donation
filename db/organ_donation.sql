-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 10:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organ_donation`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_donors` ()  NO SQL
SELECT * FROM donor$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `phno` decimal(10,0) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `btype` varchar(4) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `organ` varchar(10) NOT NULL,
  `fm_name` varchar(100) NOT NULL,
  `fm_phno` decimal(10,0) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `dname`, `phno`, `email`, `address`, `btype`, `gender`, `organ`, `fm_name`, `fm_phno`, `status`) VALUES
(1, 'naveen', '1234567890', 'naveen123', 'davanagere', 'O+', 'Male', 'eye', 'Anusuya', '9874563210', 'donated'),
(3, 'Sharan', '1020304050', 'sharan123', 'HB halli', 'AB+', 'Male', 'kidney', 'rudresh', '9080706050', 'donated'),
(4, 'Santhu', '789456123', 'santhu123', 'Shagle', 'A-', 'Male', 'liver', 'Ranganath', '9874563219', 'donated'),
(5, 'Pummy', '1122334455', 'pummy123', 'davanagere', 'A-', 'Male', 'eye', 'Devaraj', '9988774455', 'donated'),
(6, 'Shivu', '9192939495', 'shiv123', 'belagavi', 'B+', 'Male', 'kidney', 'chandrappa', '7172737475', 'donated'),
(7, 'Pramoda', '1020304051', 'pramod123@mail.com', 'Haveri', 'A-', 'Male', 'liver', 'Rudrappa', '9181716151', NULL),
(9, 'Vaibhav', '7181914151', 'vaibhav123@mail.com', 'Banglore', 'AB+', 'Male', 'eye', 'Saroja', '8090704050', NULL);

--
-- Triggers `donor`
--
DELIMITER $$
CREATE TRIGGER `donated_trig` AFTER UPDATE ON `donor` FOR EACH ROW BEGIN
    DECLARE tb1 VARCHAR(10);
    DECLARE id1 INT;
    DECLARE orgid VARCHAR(10);
	SELECT organ,id INTO tb1,id1 FROM donor WHERE id = NEW.id;
    IF(tb1='eye')
    THEN
    SET orgid = NEW.organ+NEW.id;
	INSERT INTO eye VALUES(null,orgid,NEW.id,NEW.btype,NOW(),null);
    END IF;
    IF(tb1='liver')
    THEN
    SET orgid = NEW.organ+NEW.id;
	INSERT INTO liver VALUES(null,orgid,NEW.id,NEW.btype,NOW(),null);
    END IF;
    IF(tb1='kidney')
    THEN
    SET orgid = NEW.organ+NEW.id;
	INSERT INTO kidney VALUES(null,orgid,NEW.id,NEW.btype,NOW(),null);
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `eye`
--

CREATE TABLE `eye` (
  `id` int(11) NOT NULL,
  `o_id` varchar(20) NOT NULL,
  `d_id` int(11) NOT NULL,
  `btype` varchar(4) NOT NULL,
  `recv_time` datetime NOT NULL,
  `t_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eye`
--

INSERT INTO `eye` (`id`, `o_id`, `d_id`, `btype`, `recv_time`, `t_id`) VALUES
(6, '1', 1, 'O+', '2018-11-21 14:35:05', NULL),
(7, '5', 5, 'A-', '2018-11-21 14:38:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(100) NOT NULL,
  `h_address` text NOT NULL,
  `h_phno` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`h_id`, `h_name`, `h_address`, `h_phno`) VALUES
(1, 'chigtery hospital', 'Davanagere', '80963212'),
(2, 'High tech hospital', 'Davanagere', '80123456'),
(3, 'City central hospital', 'Davanagere', '80987456'),
(4, 'Vishnavi hospital', 'Chitradurga', '80654321');

-- --------------------------------------------------------

--
-- Table structure for table `kidney`
--

CREATE TABLE `kidney` (
  `id` int(11) NOT NULL,
  `o_id` varchar(20) NOT NULL,
  `d_id` int(11) NOT NULL,
  `btype` varchar(4) NOT NULL,
  `recv_time` datetime NOT NULL,
  `t_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kidney`
--

INSERT INTO `kidney` (`id`, `o_id`, `d_id`, `btype`, `recv_time`, `t_id`) VALUES
(4, '3', 3, 'AB+', '2018-11-21 14:36:37', NULL),
(5, '6', 6, 'B+', '2018-11-21 14:38:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `liver`
--

CREATE TABLE `liver` (
  `id` int(11) NOT NULL,
  `o_id` varchar(20) NOT NULL,
  `d_id` int(11) NOT NULL,
  `btype` varchar(4) NOT NULL,
  `recv_time` datetime NOT NULL,
  `t_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liver`
--

INSERT INTO `liver` (`id`, `o_id`, `d_id`, `btype`, `recv_time`, `t_id`) VALUES
(7, '4', 4, 'A-', '2018-11-21 14:37:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `organ` varchar(10) NOT NULL,
  `btype` varchar(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phno` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `organ`, `btype`, `name`, `phno`) VALUES
(1, 'eye', 'B+', 'Arun', '8979495969'),
(3, 'liver', 'AB', 'suresh', '3216549870'),
(5, 'kidney', 'O+', 'Dhananjay', '3216549870');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `amount` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `h_id`, `d_id`, `amount`) VALUES
(15, 1, 1, 300000),
(16, 2, 3, 100000),
(17, 3, 4, 25000),
(18, 3, 5, 12000),
(19, 2, 6, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `eye`
--
ALTER TABLE `eye`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `o_id` (`o_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `kidney`
--
ALTER TABLE `kidney`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `o_id` (`o_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `liver`
--
ALTER TABLE `liver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `o_id` (`o_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `d_id` (`d_id`),
  ADD KEY `h_id` (`h_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eye`
--
ALTER TABLE `eye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kidney`
--
ALTER TABLE `kidney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `liver`
--
ALTER TABLE `liver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eye`
--
ALTER TABLE `eye`
  ADD CONSTRAINT `eye_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `donor` (`id`);

--
-- Constraints for table `kidney`
--
ALTER TABLE `kidney`
  ADD CONSTRAINT `kidney_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `donor` (`id`);

--
-- Constraints for table `liver`
--
ALTER TABLE `liver`
  ADD CONSTRAINT `liver_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `donor` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `hospitals` (`h_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
