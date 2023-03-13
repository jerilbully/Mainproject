-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 06:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(1, 'Food Fest', 'Food Fest', '2023-02-10 09:06:00', '2023-02-11 16:06:00.000000'),
(2, 'sports day', 'sports', '2023-02-15 13:44:00', '2023-02-17 11:44:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tab_reg`
--

CREATE TABLE `tab_reg` (
  `stud_id` int(100) NOT NULL,
  `log_id` int(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `sadd` varchar(100) NOT NULL,
  `sdob` date NOT NULL,
  `sphoneno` varchar(13) NOT NULL,
  `semail` varchar(100) NOT NULL,
  `scourse` int(100) NOT NULL,
  `tenth_cer` varchar(100) NOT NULL,
  `twelth_cer` varchar(100) NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `twelth` int(100) NOT NULL,
  `tenth` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `sstay` varchar(100) NOT NULL,
  `spass` varchar(10) NOT NULL,
  `sstage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_reg`
--

INSERT INTO `tab_reg` (`stud_id`, `log_id`, `sname`, `sadd`, `sdob`, `sphoneno`, `semail`, `scourse`, `tenth_cer`, `twelth_cer`, `profile_img`, `twelth`, `tenth`, `total`, `sstay`, `spass`, `sstage`) VALUES
(53, 110, 'Jubin M', 'Jathanthara', '2007-10-29', '8549687515', 'jubin@gmail.com', 0, 'tabledesign.pdf', 'tabledesign.pdf', 'tabledesign.pdf', 78, 85, 163, 'Dayscholar', 'ca8a8999c7', '0'),
(54, 111, 'Rincy Reji', 'Pathanamthitta', '2003-09-02', '7856784512', 'rincyreji@gmail.com', 0, 'tabledesign.pdf', 'tabledesign.pdf', 'tabledesign.pdf', 56, 58, 114, 'Dayscholar', 'd423e0a818', '0'),
(55, 112, 'Alen Toms', 'Pallakad', '2001-02-15', '4646464654', 'alentoms@gmail.com', 0, 'tabledesign.pdf', 'tabledesign.pdf', 'tabledesign.pdf', 87, 78, 165, 'Dayscholar', 'd449265ec1', '0'),
(56, 115, 'Sonu Mariam', 'mundakayam', '2002-07-01', '7899545666', 'paulinsabu@gmail.com', 0, 'jerilkjollyfinal (1) (1).pdf', 'jerilkjollyfinal (1) (1).pdf', 'jerilkjollyfinal (1) (1).pdf', 69, 56, 125, 'Dayscholar', 'ad72ce7e16', '0'),
(57, 117, 'Jefine Jospeh', 'Kozhikode', '2007-11-21', '7884455487', 'jefinejoseph@gmail.com', 0, 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 78, 69, 147, 'Dayscholar', 'a96c7c370a', '0'),
(58, 124, 'Jithin Raj', 'Balaraapuram', '2007-12-26', '8978145698', 'jithinraj@gmail.com', 0, 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 89, 85, 174, 'Dayscholar', 'cdbcc1ba44', '0'),
(59, 125, 'Alan Joseph', 'Kottayam', '2007-11-13', '9188040215', 'alanjoseph@gmail.com', 0, 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 74, 69, 143, 'Dayscholar', '4943dfa6df', '0'),
(60, 126, 'Leo Joseph', 'Erumeli', '2002-05-01', '9898998987', 'leo@gmail.com', 0, 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 80, 71, 151, 'Dayscholar', 'd320f48934', '0'),
(61, 127, 'Sreeja Vijyakumar', 'Manimala', '2007-12-30', '7878465484', 'sreeja@gmail.com', 0, 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 78, 78, 156, 'Dayscholar', 'e1c989b612', '0'),
(62, 128, 'Ashish Sam', 'allapuzha', '2007-12-31', '5454545454', 'ashish@gmail.com', 0, 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf', 45, 89, 134, 'Dayscholar', '6abc9eba85', '0'),
(63, 129, 'Jomon', 'Jovilla', '2008-01-01', '9635282736', 'jo@jojo.jojo', 0, '20220903_041311_0000.png', '20220903_042227_0000.png', '131a1f56649953.59b74a3038a64.jpg', 43, 23, 66, 'Dayscholar', 'c667cffd58', '0'),
(64, 130, 'Joey Mathew', 'Adoor', '2007-12-31', '4464655648', 'joey@gmail.com', 0, '20220903_042227_0000.png', '20220903_041311_0000.png', '20220517164732_IMG_7119_054525.JPG', 89, 48, 137, 'Dayscholar', '43b59adb2c', '0'),
(65, 131, 'Tonsia Thomas', 'Changanaserii', '2007-12-31', '1236548966', 'tonsia@gmail.com', 0, '20220903_041311_0000.png', '20220903_041311_0000.png', '20220517164806_IMG_7122_054242.JPG', 69, 89, 158, 'Dayscholar', '7e3590d68d', '0'),
(67, 133, 'Albin Andrewswww', 'B-63,Kaduvankal House,Sreenagar,Venchavode,Sreekariyam P.O,TVM', '2007-12-31', '9947059704', 'josephsubn2000@gmail.com', 0, 'Registered_Managers (17).xls', 'Registered_Managers (16).xls', 'Registered_Managers (17).xls', 56, 85, 141, 'Dayscholar', '8dd43ae063', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asignans`
--

CREATE TABLE `tbl_asignans` (
  `ansid` int(100) NOT NULL,
  `assignid` int(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment`
--

CREATE TABLE `tbl_assignment` (
  `assig_id` int(100) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `teacher_id` int(100) NOT NULL,
  `fromtime` datetime(6) NOT NULL,
  `totime` datetime(6) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assignment`
--

INSERT INTO `tbl_assignment` (`assig_id`, `subject_id`, `title`, `question`, `teacher_id`, `fromtime`, `totime`, `status`) VALUES
(3, 3, '     Assigment 1', '131a1f56649953.59b74a3038a64.jpg', 100, '2023-03-02 09:49:00.000000', '2023-03-03 09:49:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phoneno` int(20) NOT NULL,
  `email` char(20) NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `name`, `phoneno`, `email`, `status`, `date`) VALUES
(55, 'Smith Steven', 2147483647, 'smith@gmail.com', 'Present', '2023-02-09'),
(56, 'Ajay Mathew', 2147483647, 'ajay@gmail.com', 'Present', '2023-02-09'),
(57, 'BIFFIN', 2147483647, 'jeril@gmail.com', 'Present', '2023-02-09'),
(58, 'gloriya', 2147483647, 'gloriya@gmail.com', 'Present', '2023-02-09'),
(59, 'DONA', 2147483647, 'dona@gmail.com', 'Present', '2023-02-09'),
(86, 'Smith Steven', 2147483647, 'smith@gmail.com', 'Present', '2023-02-12'),
(87, 'Ajay Mathew', 2147483647, 'ajay@gmail.com', 'Present', '2023-02-12'),
(88, 'BIFFIN', 2147483647, 'jeril@gmail.com', 'Present', '2023-02-12'),
(89, 'gloriya', 2147483647, 'gloriya@gmail.com', 'Present', '2023-02-12'),
(90, 'DONA', 2147483647, 'dona@gmail.com', 'Present', '2023-02-12'),
(91, 'Smith Steven', 2147483647, 'smith@gmail.com', 'Present', '2023-02-13'),
(92, 'Ajay Mathew', 2147483647, 'ajay@gmail.com', 'Absent', '2023-02-13'),
(93, 'BIFFIN', 2147483647, 'jeril@gmail.com', 'Present', '2023-02-13'),
(94, 'gloriya', 2147483647, 'gloriya@gmail.com', 'Present', '2023-02-13'),
(95, 'DONA', 2147483647, 'dona@gmail.com', 'Present', '2023-02-13'),
(96, 'Smith Steven', 2147483647, 'smith@gmail.com', 'Absent', '2023-02-15'),
(97, 'Ajay Mathew', 2147483647, 'ajay@gmail.com', 'Present', '2023-02-15'),
(98, 'BIFFIN', 2147483647, 'jeril@gmail.com', 'Present', '2023-02-15'),
(99, 'gloriya', 2147483647, 'gloriya@gmail.com', 'Present', '2023-02-15'),
(100, 'DONA', 2147483647, 'dona@gmail.com', 'Present', '2023-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `batch_id` int(100) NOT NULL,
  `batch_name` varchar(100) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_name`, `course_id`) VALUES
(1, 'INT MCA 2022-27', 1),
(2, 'INT MCA 2021-26', 1),
(3, 'INT MCA 2020-25', 1),
(4, 'INT MCA 2019-24', 1),
(5, 'INT MCA 2018-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classteacher`
--

CREATE TABLE `tbl_classteacher` (
  `ctid` int(100) NOT NULL,
  `tid` int(100) NOT NULL,
  `batch_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_classteacher`
--

INSERT INTO `tbl_classteacher` (`ctid`, `tid`, `batch_id`) VALUES
(1, 39, 5),
(2, 40, 4),
(3, 44, 3),
(4, 42, 2),
(5, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(100) NOT NULL,
  `cousrename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `cousrename`) VALUES
(1, 'Integerated MCA(5yrs)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `subteach` varchar(100) NOT NULL,
  `leavereason` varchar(100) NOT NULL,
  `lstatus` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`leave_id`, `username`, `fromdate`, `todate`, `subteach`, `leavereason`, `lstatus`, `role`) VALUES
(7, 'BIFFIN', '2022-10-11', '2022-10-20', 'Ajay Mathew', 'funeral', 'Rejected', 'teacher'),
(8, 'DONA', '2023-02-15', '2023-02-17', 'BIFFIN', 'Sick', 'Rejected', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `log_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `sstatus` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`log_id`, `username`, `password`, `role`, `code`, `sstatus`) VALUES
(66, 'HOD', 'bb06e9b392c269d9a9d658a1e2030724', 'hod', '', 0),
(99, 'Pauline Paul', 'a01610228fe998f515a72dd730294d87', 'teacher', '', 0),
(100, 'Ajay Mathew', 'a01610228fe998f515a72dd730294d87', 'teacher', '', 0),
(101, 'Ankitha Philip', 'a01610228fe998f515a72dd730294d87', 'teacher', '', 0),
(110, 'Jubin M', 'ca8a8999c7e11de778f77412437a92f1', 'student', '45f63d637447654ef180ee44583c514a', 0),
(111, 'Rincy Reji', 'd423e0a8183254d2ef0d9d063af3543c', 'student', '2df59ef364aa78e09964a22a53997246', 0),
(112, 'Alen Toms', 'd449265ec1ae246afccf70ed090a7092', 'student', 'b6efe222a3d3a1773b9d80c43ae46b27', 0),
(113, 'Geya Merin ', 'a01610228fe998f515a72dd730294d87', 'teacher', '', 0),
(114, 'Milan RJ', 'a01610228fe998f515a72dd730294d87', 'teacher', '', 0),
(115, 'Sonu Mariam', 'ad72ce7e16df39bbb06707cf7f2f0c82', 'student', 'dda50f4e72cb294ff8f05ea2e6522906', 0),
(116, 'Rekha Shaji', 'a01610228fe998f515a72dd730294d87', 'teacher', '', 0),
(117, 'Jefine Jospeh', 'a96c7c370a7faf43c3b3e7fe11e93ec3', 'student', 'b4140d447ed4712cc6c1f09781b9abd8', 0),
(124, 'Jithin Raj', 'cdbcc1ba442556bc4475c7992ae04a5a', 'student', 'ed048142a4af259e095d590c81e80ef8', 0),
(125, 'Alan Joseph', '4943dfa6df527a422b27b967a4eed98a', 'student', 'e4ec5bfca40cde2dc59ed222b62b2a25', 0),
(126, 'Leo Joseph', 'd320f48934e4e42b7097eb63a29fa244', 'student', '09570eeb40efcfc7abe9291bdaf5f959', 0),
(127, 'Sreeja Vijyakumar', 'e1c989b6120a2911e3556f1219a03c78', 'student', '5576b4a0b82bd30a0853adfabaf13441', 0),
(128, 'Ashish Sam', '6abc9eba853ea08dd0e97810f68194e7', 'student', '2ecc021a496aaf8869318219187344d6', 0),
(129, 'Jomon', 'c667cffd582b73c282e10bc30c52faa6', 'student', '8886e710916d73c7af56bb2e56780393', 0),
(130, 'Joey Mathew', '43b59adb2c8bd858e3c8f5687217fba8', 'student', 'b12fae64b26bac691292243f67a49f55', 0),
(131, 'Tonsia Thomas', '7e3590d68dd10bec6acf72dadcb1f674', 'student', '9dc06f78fb6810e599580f5d79e7864a', 0),
(133, 'Albin Andrewswww', '8dd43ae0638e1ce2690e2e3cfa653923', 'student', '03bc3b15475df6484f55f651568bbf05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `tid` int(100) NOT NULL,
  `log_id` int(100) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `tadd` varchar(100) NOT NULL,
  `tphoneno` varchar(13) NOT NULL,
  `tdoj` date NOT NULL,
  `temail` varchar(100) NOT NULL,
  `tqual` varchar(100) NOT NULL,
  `tpass` varchar(100) NOT NULL,
  `tstatus` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`tid`, `log_id`, `tname`, `tadd`, `tphoneno`, `tdoj`, `temail`, `tqual`, `tpass`, `tstatus`) VALUES
(39, 99, 'Pauline Paul', 'Kanjirapally', '9562467044', '2022-09-14', 'paulinepaul@gmail.com', 'PHD', 'a01610228fe998f515a72dd730294d87', 0),
(40, 100, 'Ajay Mathew', 'Changmasserii', '8304803281', '2022-11-30', 'ajaymathew@gmail.com', 'MCA', 'a01610228fe998f515a72dd730294d87', 0),
(41, 101, 'Ankitha Philip', 'Vazhuur', '9875698884', '2016-02-02', 'ankhita@gmail.com', 'MCA', 'a01610228fe998f515a72dd730294d87', 0),
(42, 113, 'Geya Merin ', 'Pampadii', '4596874445', '1999-02-11', 'geyamerin@gmail.com', 'MCA', 'a01610228fe998f515a72dd730294d87', 0),
(43, 114, 'Milan RJ', 'Attingal', '7878178711', '2000-05-28', 'milanrj@gmail.com', 'MCA', 'a01610228fe998f515a72dd730294d87', 0),
(44, 116, 'Rekha Shaji', 'Sreekariyam', '9687845212', '2023-01-24', 'rekhashaji@gmail.com', 'B-TECH', 'a01610228fe998f515a72dd730294d87', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `stud_id` int(100) NOT NULL,
  `log_id` int(100) NOT NULL,
  `batch_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`stud_id`, `log_id`, `batch_id`) VALUES
(3, 110, 1),
(4, 111, 2),
(5, 112, 3),
(7, 115, 4),
(10, 117, 5),
(12, 124, 1),
(14, 126, 1),
(15, 125, 1),
(154, 129, 1),
(169, 133, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `sub_id` int(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `batch_id` int(100) NOT NULL,
  `sem` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`sub_id`, `sub_name`, `batch_id`, `sem`) VALUES
(1, 'Maths', 1, 1),
(2, 'English', 2, 3),
(3, 'HTML', 3, 5),
(4, 'Web Programming', 4, 7),
(5, 'Python Programming', 5, 9),
(7, 'C++', 1, 1),
(8, 'Operating System', 3, 5),
(9, 'Big Data', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjteacher`
--

CREATE TABLE `tbl_subjteacher` (
  `subtid` int(100) NOT NULL,
  `subid` int(100) NOT NULL,
  `teacherid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subjteacher`
--

INSERT INTO `tbl_subjteacher` (`subtid`, `subid`, `teacherid`) VALUES
(1, 1, 39),
(2, 3, 40),
(3, 2, 41),
(4, 4, 42),
(5, 5, 43),
(6, 9, 44);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `fname`, `name`) VALUES
(0, '20230215090905_jerilkjollyfinal (1).pdf', 'jerilkjollyfinal (1).pdf'),
(0, '20230215091335_CV (1).pdf', 'CV (1).pdf'),
(0, '20230215091345_python cheat sheer.jfif', 'python cheat sheer.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_reg`
--
ALTER TABLE `tab_reg`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `fk_logid` (`log_id`);

--
-- Indexes for table `tbl_asignans`
--
ALTER TABLE `tbl_asignans`
  ADD PRIMARY KEY (`ansid`),
  ADD KEY `fk_assign` (`assignid`);

--
-- Indexes for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD PRIMARY KEY (`assig_id`),
  ADD KEY `fk_teacher` (`teacher_id`),
  ADD KEY `fk_sub` (`subject_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `fk_course` (`course_id`);

--
-- Indexes for table `tbl_classteacher`
--
ALTER TABLE `tbl_classteacher`
  ADD PRIMARY KEY (`ctid`),
  ADD UNIQUE KEY `tid` (`tid`),
  ADD UNIQUE KEY `batch_id` (`batch_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `tname` (`tname`),
  ADD KEY `fk_log` (`log_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `log_id` (`log_id`),
  ADD KEY `fk_battch` (`batch_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `fk_batch2` (`batch_id`);

--
-- Indexes for table `tbl_subjteacher`
--
ALTER TABLE `tbl_subjteacher`
  ADD PRIMARY KEY (`subtid`),
  ADD KEY `fk_teach` (`teacherid`),
  ADD KEY `fk` (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_reg`
--
ALTER TABLE `tab_reg`
  MODIFY `stud_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_asignans`
--
ALTER TABLE `tbl_asignans`
  MODIFY `ansid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  MODIFY `assig_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `batch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_classteacher`
--
ALTER TABLE `tbl_classteacher`
  MODIFY `ctid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `tid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `stud_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `sub_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_subjteacher`
--
ALTER TABLE `tbl_subjteacher`
  MODIFY `subtid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tab_reg`
--
ALTER TABLE `tab_reg`
  ADD CONSTRAINT `fk_logid` FOREIGN KEY (`log_id`) REFERENCES `tbl_login` (`log_id`);

--
-- Constraints for table `tbl_asignans`
--
ALTER TABLE `tbl_asignans`
  ADD CONSTRAINT `fk_assign` FOREIGN KEY (`assignid`) REFERENCES `tbl_assignment` (`assig_id`);

--
-- Constraints for table `tbl_assignment`
--
ALTER TABLE `tbl_assignment`
  ADD CONSTRAINT `fk_sub` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subject` (`sub_id`),
  ADD CONSTRAINT `fk_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_staff` (`log_id`);

--
-- Constraints for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`);

--
-- Constraints for table `tbl_classteacher`
--
ALTER TABLE `tbl_classteacher`
  ADD CONSTRAINT `fk_batch` FOREIGN KEY (`batch_id`) REFERENCES `tbl_batch` (`batch_id`),
  ADD CONSTRAINT `fk_tid` FOREIGN KEY (`tid`) REFERENCES `tbl_staff` (`tid`);

--
-- Constraints for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `fk_log` FOREIGN KEY (`log_id`) REFERENCES `tbl_login` (`log_id`);

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `fk_battch` FOREIGN KEY (`batch_id`) REFERENCES `tbl_batch` (`batch_id`),
  ADD CONSTRAINT `fk_logg` FOREIGN KEY (`log_id`) REFERENCES `tab_reg` (`log_id`);

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `fk_batch2` FOREIGN KEY (`batch_id`) REFERENCES `tbl_batch` (`batch_id`);

--
-- Constraints for table `tbl_subjteacher`
--
ALTER TABLE `tbl_subjteacher`
  ADD CONSTRAINT `fk` FOREIGN KEY (`subid`) REFERENCES `tbl_subject` (`sub_id`),
  ADD CONSTRAINT `fk_teach` FOREIGN KEY (`teacherid`) REFERENCES `tbl_staff` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
