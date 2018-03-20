-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 02:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenant1`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `userid` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `cnumber` varchar(50) NOT NULL,
  `billid` int(50) NOT NULL,
  `configid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`userid`, `email`, `password`, `companyname`, `address`, `city`, `state`, `zipcode`, `cnumber`, `billid`, `configid`) VALUES
(1, 'tenant1@yahoo.com', 'ca771caf60ab211d827f17a043e13668c225f5b6', 'Corporation', 'St. Magallanes', 'Makati', 'National Capital Region (NCR)', '1234', '09123456789', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `appid` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `bday` date NOT NULL,
  `religion` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cnumber` varchar(50) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`appid`, `email`, `password`, `fname`, `lname`, `mname`, `address`, `city`, `state`, `zipcode`, `nationality`, `bday`, `religion`, `gender`, `status`, `cnumber`, `resume`, `picture`) VALUES
(1, 'amayalelis@yahoo.com', 'f2b14f68eb995facb3a1c35287b778d5bd785511', 'Candy Amaya', 'Lelis', 'de Castro', 'Blk 19 Lt 21 Anahaw 1', 'Silang Cavite', 'Calabarzon', '4118', 'Filipino', '1999-02-02', 'Roman Catholic', 'Female', 'Single', '09771273912', 'resume1.pdf', 'picture1.jpg'),
(2, 'john@yahoo.com', 'f2b14f68eb995facb3a1c35287b778d5bd785511', 'John', 'Cruz', 'Loyd', '12 St. Ave', 'Pasig City', 'National Capital Region (NCR)', '1234', 'Filipino', '1980-01-01', 'Iglesha', 'Male', 'Married', '09123456789', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `appliid` int(20) NOT NULL,
  `appid` int(20) NOT NULL,
  `posid` int(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appliid`, `appid`, `posid`, `status`) VALUES
(1, 1, 1, 'hired'),
(2, 2, 1, 'preselection');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billid` int(20) NOT NULL,
  `subscription` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billid`, `subscription`, `amount`) VALUES
(1, 'trial', 0);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configid` int(20) NOT NULL,
  `websitename` varchar(50) NOT NULL,
  `databasename` varchar(50) NOT NULL,
  `template` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configid`, `websitename`, `databasename`, `template`) VALUES
(1, 'mywebsite', 'tenant1', 'template1');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educid` int(20) NOT NULL,
  `appid` int(20) NOT NULL,
  `level` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `startyear` varchar(50) NOT NULL,
  `endyear` varchar(50) NOT NULL,
  `honor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educid`, `appid`, `level`, `school`, `address`, `startyear`, `endyear`, `honor`) VALUES
(1, 1, 'High School', 'Philippine Christian University', 'Dasmarinas City Cavite', '2011', '2015', '5th Honorable Mention'),
(2, 1, 'Bachelor/College', 'Technological University of the Philippines', 'Ermita Manila', '2015', '2019', 'Dean\'s Lister - 2nd year 2nd semester');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `empid` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `cnumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`empid`, `email`, `password`, `companyname`, `address`, `city`, `state`, `zipcode`, `cnumber`) VALUES
(1, 'infoman@yahoo.com', 'f2b14f68eb995facb3a1c35287b778d5bd785511', 'Information Solution Inc', 'St. 12', 'Quezon City', 'National Capital Region (NCR)', '1234', '09123456789'),
(2, 'itcompany@gmail.com', 'f2b14f68eb995facb3a1c35287b778d5bd785511', 'IT Tech Company', 'St. Villanueva', 'Pasig City', 'National Capital Region (NCR)', '1234', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `expid` int(20) NOT NULL,
  `appid` int(20) NOT NULL,
  `job` varchar(50) NOT NULL,
  `years` int(20) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `intid` int(20) NOT NULL,
  `appliid` int(20) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `posid` int(20) NOT NULL,
  `empid` int(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `jobdesc` varchar(500) NOT NULL,
  `jobreq` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`posid`, `empid`, `position`, `jobdesc`, `jobreq`, `status`) VALUES
(1, 1, 'Web Developer', 'The role is responsible for designing, coding and modifying websites, from layout to function and according to a client\'s specifications. Strive to create visually appealing sites that feature user-friendly design and clear navigation.', 'Regular exposure to business stakeholders and executive management, as well as the authority and scope to apply your expertise to many interesting technical problems.\r\nCandidate must have a strong understanding of UI, cross-browser compatibility, general web functions and standards.\r\nThe position requires constant communication with colleagues.', 'Open'),
(2, 1, 'Front end Developer', 'A front-end web developer is probably what most people think of as a “web developer”. A front-end web developer is responsible for implementing visual elements that users see and interact with in a web application. They are usually supported by back-end web developers, who are responsible for server-side application logic and integration of the work front-end developers do.', 'Develop new user-facing features\r\nBuild reusable code and libraries for future use\r\nEnsure the technical feasibility of UI/UX designs\r\nOptimize application for maximum speed and scalability\r\nAssure that all user input is validated before submitting to back-end\r\nCollaborate with other team members and stakeholders', 'Open'),
(4, 2, 'Backend Developer', 'A back-end web developer is responsible for server-side web application logic and integration of the work front-end web developers do. Back-end developers usually write web services and APIs used by front-end developers and mobile application developers.', 'Integration of user-facing elements developed by a front-end developers with server side logic\r\nBuilding reusable code and libraries for future use\r\nOptimization of the application for maximum speed and scalability\r\nImplementation of security and data protection\r\nDesign and implementation of data storage solutions', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `savedjobs`
--

CREATE TABLE `savedjobs` (
  `saveid` int(20) NOT NULL,
  `appid` int(20) NOT NULL,
  `posid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savedjobs`
--

INSERT INTO `savedjobs` (`saveid`, `appid`, `posid`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skillid` int(20) NOT NULL,
  `appid` int(20) NOT NULL,
  `skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skillid`, `appid`, `skill`) VALUES
(1, 1, 'PHP'),
(2, 1, 'HTML'),
(3, 1, 'CSS'),
(4, 1, 'JAVA'),
(5, 1, 'C Language');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`appliid`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configid`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educid`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`expid`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`intid`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`posid`);

--
-- Indexes for table `savedjobs`
--
ALTER TABLE `savedjobs`
  ADD PRIMARY KEY (`saveid`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skillid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `appid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `appliid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `empid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `expid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `intid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `posid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `savedjobs`
--
ALTER TABLE `savedjobs`
  MODIFY `saveid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skillid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
