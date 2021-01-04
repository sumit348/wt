-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 12:11 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `divission` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `thana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `username`, `gender`, `email`, `phonenumber`, `dob`, `bloodgroup`, `divission`, `district`, `thana`) VALUES
(1, 'bulbul', 'Bulbul Reddy', 'Male', 'bulbu@gmail.com', '01245798451', '2020-12-24', 'B+', 'Khulna', 'Magura', 'Magura Sadar');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(100) NOT NULL,
  `diseases` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `diseases`) VALUES
(1, 'Autoimmune Diseases.'),
(2, 'Allergies & Asthma.'),
(3, 'Celiac Disease.'),
(4, 'Crohns & Colitis.'),
(5, 'Infectious Diseases.');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `divission_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`, `divission_id`) VALUES
(1, 'Dhaka', 'DHAKA'),
(2, 'Ghazipur', 'DHAKA'),
(3, 'Kishoreganj', 'DHAKA'),
(4, 'Manikganj', 'DHAKA'),
(5, 'Narsingdi', 'DHAKA'),
(6, 'Faridpur', 'DHAKA'),
(7, 'Khulna', 'Khulna'),
(8, 'Kushtia', 'Khulna'),
(9, 'Magura', 'Khulna'),
(10, 'Jhenaidah', 'Khulna'),
(11, 'Bagerhat', 'Khulna'),
(12, 'Satkhira', 'Khulna'),
(13, 'Chittagong', 'Chittagong'),
(14, 'Feni', 'Chittagong'),
(15, 'Rangamati', 'Chittagong'),
(16, 'Noakhali', 'Chittagong'),
(17, 'Bandarban', 'Chittagong'),
(18, 'Khagrachhari', 'Chittagong'),
(19, 'Barguna ', 'Barisal'),
(20, 'Patuakhali', 'Barisal'),
(21, 'Madaripur', 'Barisal'),
(22, 'Bhola', 'Barisal'),
(23, 'Pirojpur', 'Barisal'),
(24, 'Shariatpur', 'Barisal'),
(25, 'Mymensingh ', 'Mymensingh'),
(26, 'Netrokona', 'Mymensingh'),
(27, 'Jamalpur', 'Mymensingh'),
(28, 'Sherpur', 'Mymensingh'),
(29, 'Bogura', 'Rajshahi'),
(30, 'Chapainawabganj', 'Rajshahi'),
(31, 'Joypurhat', 'Rajshahi'),
(32, 'Naogaon', 'Rajshahi'),
(33, 'Dinajpur', 'Rangpur'),
(34, 'Kurigram', 'Rangpur'),
(35, 'Rangpur', 'Rangpur'),
(36, 'Nilphamari', 'Rangpur'),
(37, 'Habiganj', 'Sylhet'),
(38, 'Moulvibazar', 'Sylhet'),
(39, 'Sunamganj', 'Sylhet'),
(40, 'Sylhet', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `divission`
--

CREATE TABLE `divission` (
  `id` int(100) NOT NULL,
  `divission` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divission`
--

INSERT INTO `divission` (`id`, `divission`) VALUES
(1, 'Dhaka'),
(2, 'Khulna'),
(3, 'Chittagong'),
(4, 'Barisal'),
(5, 'Mymensingh'),
(6, 'Rajshahi'),
(7, 'Rangpur'),
(8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `dnotification`
--

CREATE TABLE `dnotification` (
  `id` int(10) NOT NULL,
  `did` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dnotification`
--

INSERT INTO `dnotification` (`id`, `did`, `msg`) VALUES
(9, 'd1', 'Leave application rejected'),
(10, 'd2', 'Leave application rejected'),
(11, 'd1', 'Leave application accepted'),
(12, 'd1', 'Equipment Request Rejected'),
(13, 'd1', 'Equipment Request Accepted'),
(14, 'bulbul', 'Happy New Year -31st 2020 (Holiday) '),
(15, 'd1', 'Equipment Request Accepted'),
(16, 'd1', 'Leave application accepted'),
(17, 'd1', 'Leave application rejected'),
(18, 'n6', 'Equipment Request Rejected'),
(19, 'n6', 'Equipment Request Rejected'),
(20, 'n6', 'Equipment Request Rejected'),
(21, 'n6', 'Equipment Request Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `divission` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `thana` varchar(50) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `bmdcregno` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `userid`, `username`, `gender`, `email`, `phonenumber`, `dob`, `divission`, `district`, `thana`, `specialty`, `degree`, `bmdcregno`, `description`) VALUES
(11, 'd1', 'Hasibul Hasan', 'Male', 'hashibul218@gmail.com', '01747979703', '1997-01-09', 'Khulna', 'Kushtia', 'Doulatpur ', 'Dermatology', 'FCPS', '1234567892', 'bullshit'),
(12, 'd2', 'Sishir', 'Male', 'hashibul218@gmail.com', '01747979703', '1997-01-02', 'Dhaka', 'Kishoreganj', 'Hossainpur ', 'Anesthesiology', 'FCPS', '1234567892', 'i am pro'),
(13, 'd6', 'Priyank Chopra', 'Female', 'mrahmatullah.alamin@gmail.com', '01747979703', '1998-01-02', 'Khulna', 'Bagerhat', 'Batiaghatar', 'Medical genetics', 'FCPS', '1234567892', 'i am a doctor'),
(14, 'd4', 'Sharuk khan', 'Male', 'hashibul218@gmail.com', '01747979703', '1999-12-15', 'Dhaka', 'Kishoreganj', 'Hossainpur ', 'Anesthesiology', 'FCPS', '1234567892', 'i ma \r\n'),
(15, 'd5', 'Amir Khan', 'Male', 'rg.sagor007@gmail.com', '01747979703', '1988-01-02', 'Khulna', 'Magura', 'Magura Sadar', 'Dermatology', 'FCPS', '1234567892', 'i ammmmm'),
(16, 'b1', 'Bulbul', 'Male', 'bulbul@gmail.com', '01745125487', '2003-02-13', 'Dhaka', 'Ghazipur', 'Kaliakair ', 'Allergy', 'FPS', '0124563215', 'cool');

-- --------------------------------------------------------

--
-- Table structure for table `doctorsetschedule`
--

CREATE TABLE `doctorsetschedule` (
  `id` int(100) NOT NULL,
  `did` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorsetschedule`
--

INSERT INTO `doctorsetschedule` (`id`, `did`, `dname`, `cid`, `cname`, `time`, `date`) VALUES
(35, 'd1', 'Hasibul Hasan', '', 'Digital Hospital', '2-3', '2020-12-09'),
(36, 'd1', 'Hasibul Hasan', '', 'Digital Hospital', '2-3', '2020-12-18'),
(37, 'd1', 'Hasibul Hasan', '', 'Digital Hospital', '2-3', '2020-12-18'),
(38, 'd1', 'Hasibul Hasan', '', 'Digital Hospital', '2-3', '2021-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `enotification`
--

CREATE TABLE `enotification` (
  `id` int(10) NOT NULL,
  `did` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enotification`
--

INSERT INTO `enotification` (`id`, `did`, `msg`) VALUES
(1, 'd1', 'Equipment Request Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) NOT NULL,
  `did` varchar(100) NOT NULL,
  `goods` varchar(100) NOT NULL,
  `action` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nequipment`
--

CREATE TABLE `nequipment` (
  `id` int(10) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nnotification`
--

CREATE TABLE `nnotification` (
  `id` int(10) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nnotification`
--

INSERT INTO `nnotification` (`id`, `nid`, `msg`) VALUES
(1, 'bulbul', 'Happy New Year -31st 2020 (Holiday) '),
(2, '', 'Equipment application rejected'),
(3, '', 'Equipment application rejected'),
(4, '', 'Equipment application rejected'),
(5, '', 'Equipment application rejected'),
(6, '', 'Equipment application rejected'),
(7, '', 'Equipment Request Accepted'),
(8, '', 'Equipment Request Accepted'),
(9, '', 'Equipment Request Rejected'),
(10, 'n6', 'Equipment Request Accepted'),
(11, 'n6', 'Leave Application Accepted'),
(12, 'n6', 'Leave Application Rejected'),
(13, 'n6', 'Equipment Request Accepted'),
(14, 'n6', 'Salary Increase Application Rejected'),
(15, 'n6', 'Shift Change Application Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `did` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `notification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `pid`, `did`, `dname`, `cname`, `time`, `date`, `notification`) VALUES
(12, 'p1', 'd1', 'Hasibul Hasan', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(13, 'p1', 'd1', 'Hasibul Hasan', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(14, 'p2', 'd2', 'Sishir', 'Rajsahi Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(15, 'p2', 'd2', 'Sishir', 'Rajsahi Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(16, 'p3', 'd4', 'Sharuk khan', 'Rajsahi Medical', '08pm - 10pm', '2020-05-01', 'You are Rejected'),
(17, 'p4', 'd1', 'Hasibul Hasan', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(18, 'p4', 'd4', 'Sharuk khan', 'Rajsahi Medical', '08pm - 10pm', '2020-05-01', 'You are Rejected'),
(19, 'p5', 'd4', 'Sharuk khan', 'Rajsahi Medical', '08pm - 10pm', '2020-05-01', 'You are appointed'),
(20, 'p1', 'd4', 'Sharuk khan', 'Rajsahi Medical', '08am - 10am', '2020-04-29', 'You are appointed'),
(21, 'p1', 'd1', 'Hasibul Hasan', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(22, 'p1', 'd1', 'Hasibul Hasan', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'You are Rejected'),
(23, 'p1', 'd1', 'Hasibul Hasan', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'You are appointed'),
(24, 'p1', 'd1', 'Hasibul Hasan', 'Digital Hospital', '2-3', '2020-12-09', 'You are appointed'),
(25, 'p1', 'd1', 'Hasibul Hasan', 'Digital Hospital', '2-3', '2020-12-09', 'You are appointed'),
(26, 'p2', 'd1', 'Hasibul Hasan', 'Digital Hospital', '2-3', '2020-12-18', 'You are appointed');

-- --------------------------------------------------------

--
-- Table structure for table `nsalaryrreq`
--

CREATE TABLE `nsalaryrreq` (
  `id` int(10) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nshift`
--

CREATE TABLE `nshift` (
  `id` int(10) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `divission` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `thana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `userid`, `username`, `gender`, `email`, `phonenumber`, `dob`, `bloodgroup`, `divission`, `district`, `thana`) VALUES
(1, 'n1', 'Nishat Nurse', 'Female', 'nush@gmail.com', '01784562154', '2020-12-24', 'O+', 'Khulna', '$Magura', 'Magura Sadar'),
(2, 'n6', 'karim', 'Female', 'karim@gmail.com', '78965432145', '2020-12-08', 'O+', 'Chittagong', 'Rangamati', 'Patenga');

-- --------------------------------------------------------

--
-- Table structure for table `nursevacation`
--

CREATE TABLE `nursevacation` (
  `id` int(10) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patientrecords`
--

CREATE TABLE `patientrecords` (
  `id` int(100) NOT NULL,
  `did` varchar(200) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `cid` varchar(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `symptom` varchar(200) DEFAULT NULL,
  `diseases` varchar(200) NOT NULL,
  `test` varchar(200) NOT NULL,
  `testclinic` varchar(200) DEFAULT NULL,
  `report` varchar(200) NOT NULL,
  `medicines` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientrecords`
--

INSERT INTO `patientrecords` (`id`, `did`, `dname`, `pid`, `pname`, `cid`, `cname`, `time`, `date`, `symptom`, `diseases`, `test`, `testclinic`, `report`, `medicines`) VALUES
(1, 'd1', 'Hasibul Hasan', 'p1', 'dola', 'c1', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'High fever,sick', 'Allergies & Asthma.', 'Urine test', 'Dhanmondi South East Hospital', 'sdfsd', 'napa extra'),
(2, 'd2', 'Sishir', 'p2', 'tithi ghosh', 'c2', 'Rajsahi Medical', '02pm - 05pm', '2020-04-29', 'High fever,sick', 'Celiac Disease.', 'Urine test', 'Al Noor Eye Hospital', 'something', 'napa'),
(3, 'd1', 'Hasibul Hasan', 'p4', 'Dipto Mondol', 'c1', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'asd', 'Allergies & Asthma.', 'Urine test,another test', 'Al Noor Eye Hospital', 'something', 'fulvin'),
(4, 'd4', 'Sharuk khan', 'p5', 'wadud', 'c2', 'Rajsahi Medical', '08pm - 10pm', '2020-05-01', 'High fever,sick', 'Crohns & Colitis.', 'Urine test', 'Dhanmondi South East Hospital', 'sdfsd', 'napa'),
(5, 'd4', 'Sharuk khan', 'p1', 'dola', 'c2', 'Rajsahi Medical', '08am - 10am', '2020-04-29', 'Fever', 'Allergies & Asthma.', 'Urine test', 'Al Noor Eye Hospital', 'something', 'eorjfpierjf'),
(6, 'd1', 'Hasibul Hasan', 'p1', 'dola', 'c1', 'Labyed Medical', '02pm - 05pm', '2020-04-29', 'High fever,sick', 'Crohns & Colitis.', 'Urine test', 'Dhanmondi South East Hospital', 'something', 'fdfdfd'),
(7, 'd1', 'Hasibul Hasan', 'p1', 'dola', '', 'Digital Hospital', '2-3', '2020-12-09', 'jgchfcjggc', 'Celiac Disease.', 'jhvgvhkgjb', 'Ad-Din Hospital', 'jgcfgc', 'fgljkjlk;'),
(8, 'd1', 'Hasibul Hasan', 'p1', 'dola', '', 'Digital Hospital', '2-3', '2020-12-09', 'jgchfcjggc', 'Allergies & Asthma.', 'jhvgvhkgjb', 'Ad-Din Hospital', 'jgcfgc', 'gdfgf');

-- --------------------------------------------------------

--
-- Table structure for table `patientrequest`
--

CREATE TABLE `patientrequest` (
  `id` int(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `did` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `divission` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `thana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientrequest`
--

INSERT INTO `patientrequest` (`id`, `pid`, `pname`, `did`, `dname`, `cid`, `cname`, `time`, `date`, `divission`, `district`, `thana`) VALUES
(3, 'p1', 'dola', 'd1', 'Hasibul Hasan', '', 'Digital Hospital', '2-3', '2020-12-18', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `bloodgroup` varchar(11) NOT NULL,
  `divission` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `userid`, `username`, `gender`, `email`, `phonenumber`, `dob`, `bloodgroup`, `divission`, `district`, `thana`) VALUES
(8, 'p1', 'dola', 'Female', 'afiarahman218@hotmail.com', '01745879654', '1997-02-24', 'O+', 'Khulna', 'Jhenaidah', 'Jhenaidah Sadar'),
(9, 'p2', 'tithi ghosh', 'Female', 'afiarahman218@hotmail.com', '01303187959', '1998-01-02', 'B+', 'Dhaka', 'Kishoreganj', 'Hossainpur '),
(10, 'p3', 'Tania karim', 'Female', 'rg.sagor007@gmail.com', '01745879654', '1998-01-02', 'B-', 'Khulna', 'Satkhira', 'Assasuni'),
(11, 'p4', 'Dipto Mondol', 'Male', 'mrahmatullah.alamin@gmail.com', '01747979703', '1997-01-15', 'A-', 'Dhaka', 'Faridpur', 'Faridpur Sadar'),
(12, 'p5', 'wadud', 'Male', 'afiarahman218@hotmail.com', '01745879654', '1998-01-02', 'A-', 'Khulna', 'Magura', 'Magura Sadar'),
(13, 'p6', 'ridu', 'Male', 'hashibul218@gmail.com', '01747979703', '1999-01-02', 'B+', 'Dhaka', 'Kishoreganj', 'Hossainpur ');

-- --------------------------------------------------------

--
-- Table structure for table `patientwaiting`
--

CREATE TABLE `patientwaiting` (
  `id` int(100) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `did` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `divission` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `thana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientwaiting`
--

INSERT INTO `patientwaiting` (`id`, `pid`, `pname`, `did`, `dname`, `cid`, `cname`, `time`, `date`, `divission`, `district`, `thana`) VALUES
(2, 'p2', 'tithi ghosh', 'd1', 'Hasibul Hasan', '', 'Digital Hospital', '2-3', '2020-12-18', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tempdoctorrequests`
--

CREATE TABLE `tempdoctorrequests` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `divission` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `thana` varchar(50) NOT NULL,
  `specialty` varchar(50) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `bmdcregno` varchar(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempnursereq`
--

CREATE TABLE `tempnursereq` (
  `id` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `bloodgroup` varchar(100) NOT NULL,
  `divission` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `thana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempnusers`
--

CREATE TABLE `tempnusers` (
  `id` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempusers`
--

CREATE TABLE `tempusers` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testclinic`
--

CREATE TABLE `testclinic` (
  `id` int(100) NOT NULL,
  `tcname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testclinic`
--

INSERT INTO `testclinic` (`id`, `tcname`) VALUES
(1, 'Abir General Hospital'),
(2, 'Ad-Din Hospital'),
(3, 'Al Noor Eye Hospital'),
(4, 'Dhanmondi South East Hospital'),
(5, 'Dr. Salahuddin Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `id` int(100) NOT NULL,
  `thana` varchar(100) NOT NULL,
  `district_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`id`, `thana`, `district_id`) VALUES
(1, 'Dhamrai', 'Dhaka'),
(2, 'Kaliakair ', 'Ghazipur'),
(3, 'Hossainpur ', 'Kishoreganj'),
(4, 'Manikganj', 'Manikganj'),
(5, 'Narsingdi Sadar', 'Narsingdi'),
(6, 'Faridpur Sadar', 'Faridpur'),
(7, 'Terakhada', 'Khulna'),
(8, 'Doulatpur ', 'Kushtia'),
(9, 'Magura Sadar', 'Magura'),
(10, 'Jhenaidah Sadar', 'Jhenaidah'),
(11, 'Batiaghatar', 'Bagerhat'),
(12, 'Assasuni', 'Satkhira'),
(21, 'Kotwali ', 'Chittagong'),
(22, 'Patenga', 'Rangamati'),
(23, 'Taltali', 'Barguna '),
(24, 'Kalkini', 'Madaripur'),
(25, 'Durgapur', 'Netrokona'),
(26, 'Sreebardi Upazila', 'Sherpur'),
(27, 'Bholahat Upazila', 'Chapainawabganj'),
(28, 'Atrai Upazila', 'Naogaon'),
(29, 'Rajarhat Upazila', 'Kurigram'),
(30, 'Domar', 'Nilphamari'),
(31, 'Kamalganj', 'Moulvibazar'),
(32, 'Bishwamvarpur', 'Sunamganj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `password`, `status`) VALUES
(32, 'bulbul', '$2y$10$8moQr00INAVm/xKXRm0pi.eFbcCnTAXPM13h.mfrNH80t.Bn80vM.', 1),
(34, 'd1', '$2y$10$vMudv7Ga9iZVw9wrGI99Te0/4SYt7XMVqymCgU1cOCp/nlyLCSDe2', 2),
(36, 'p1', '$2y$10$a6AYjOfKsEZDSMT1rhL5Ze330EPYZ2NeH5gYFCAMYNgFCsgm4XDLe', 3),
(42, 'p2', '$2y$10$YNwS7zHh7zDj8jNsIPXLkOGCYeOs4mDMcJmKUHSLeELRTGvsDwydO', 3),
(43, 'p3', '$2y$10$pKH0S3199Ibj.Ux1/fhXJugtpzLDE1V4ZsfsfUj/QZnMfpMoTJaIO', 3),
(44, 'p4', '$2y$10$fI0ONm3t7wjgcACqcXHriuLzqTiCr4BAMBrj9DHS5vXvBTM3rwLCi', 3),
(45, 'p5', '$2y$10$F68eTmnqtwXM0w9M1g0N.erlE89X.LWKIxUbfM8B19i.DwsXm9hV.', 3),
(46, 'd2', '$2y$10$U3pNxn3AjXVcek/MtxZycedtC7E2RGr9S5pQtLNujiuRueR0TRQ2S', 2),
(47, 'd6', '$2y$10$58UagYKP/2wsDxOPOPO8quNzJfZG9YB3Txxbt8L99WBVFnHAVIhke', 2),
(48, 'd4', '$2y$10$ID.OiRzH7y.8Ebn2otPdhOi56Gv66zAWakEtcSo24Zw.bU2eendEu', 2),
(49, 'd5', '$2y$10$JReWWTKJf3VbD/2ozCJphe/MaaoKFYaTo6Yq5DWFDd5MzI567YI3y', 2),
(50, 'p6', '$2y$10$kP5M40gpZWcZdNrZGonWAeQUeTr16WzWuS.M/wANK.eZk/b/QwFlW', 3),
(51, 'b1', '$2y$10$5A8zrZuf5vCD/rc7rFrw2efKFeDmowG54ABm6mKkRETuydLhqr7kK', 2),
(52, 'n4', '$2y$10$FRRllYD6Y0HTTM7PKYahcOroSXbO4ocgylTCx65Ajj72kzlrtrU3O', 5),
(53, 'n2', '$2y$10$/V5N6YSvVLGXfVySVqR7CuPtFIpU/q/Hr.mfNKXybC2OjOfwPSkAG', 5),
(54, 'n1', '$2y$10$8YBgu8K.F3Dn5wdpVsDt4e65DL27ilsv.4ZowJD36l.DvSNKul2AC', 5),
(55, 'n6', '$2y$10$vGqgM9yXp5Ts3NSBDXoZheIxESO.wNlHnBTkCOcoFKOAMKlOtfnAy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `id` int(10) NOT NULL,
  `did` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `action` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`id`, `did`, `msg`, `action`) VALUES
(3, 'd2', 'i need 365 days leave', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divission`
--
ALTER TABLE `divission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dnotification`
--
ALTER TABLE `dnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `doctorsetschedule`
--
ALTER TABLE `doctorsetschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enotification`
--
ALTER TABLE `enotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nequipment`
--
ALTER TABLE `nequipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nnotification`
--
ALTER TABLE `nnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nsalaryrreq`
--
ALTER TABLE `nsalaryrreq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nshift`
--
ALTER TABLE `nshift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursevacation`
--
ALTER TABLE `nursevacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientrecords`
--
ALTER TABLE `patientrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientrequest`
--
ALTER TABLE `patientrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `patientwaiting`
--
ALTER TABLE `patientwaiting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempdoctorrequests`
--
ALTER TABLE `tempdoctorrequests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `tempnursereq`
--
ALTER TABLE `tempnursereq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempnusers`
--
ALTER TABLE `tempnusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempusers`
--
ALTER TABLE `tempusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `testclinic`
--
ALTER TABLE `testclinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `divission`
--
ALTER TABLE `divission`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dnotification`
--
ALTER TABLE `dnotification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctorsetschedule`
--
ALTER TABLE `doctorsetschedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `enotification`
--
ALTER TABLE `enotification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nequipment`
--
ALTER TABLE `nequipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nnotification`
--
ALTER TABLE `nnotification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `nsalaryrreq`
--
ALTER TABLE `nsalaryrreq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nshift`
--
ALTER TABLE `nshift`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nursevacation`
--
ALTER TABLE `nursevacation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patientrecords`
--
ALTER TABLE `patientrecords`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patientrequest`
--
ALTER TABLE `patientrequest`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patientwaiting`
--
ALTER TABLE `patientwaiting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tempdoctorrequests`
--
ALTER TABLE `tempdoctorrequests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempnursereq`
--
ALTER TABLE `tempnursereq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempnusers`
--
ALTER TABLE `tempnusers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempusers`
--
ALTER TABLE `tempusers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testclinic`
--
ALTER TABLE `testclinic`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
