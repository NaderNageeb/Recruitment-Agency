-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 03:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicants`
--

CREATE TABLE `tblapplicants` (
  `APPLICANTID` int(11) NOT NULL,
  `FNAME` varchar(90) NOT NULL,
  `LNAME` varchar(90) NOT NULL,
  `MNAME` varchar(90) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `SEX` varchar(11) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(255) DEFAULT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `EMAILADDRESS` varchar(90) NOT NULL,
  `CONTACTNO` varchar(90) NOT NULL,
  `DEGREE` varchar(255) NOT NULL,
  `APPLICANTPHOTO` varchar(255) NOT NULL,
  `NATIONALID` varchar(255) NOT NULL,
  `EXPERINCE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapplicants`
--

INSERT INTO `tblapplicants` (`APPLICANTID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `APPLICANTPHOTO`, `NATIONALID`, `EXPERINCE`) VALUES
(2018013, 'mai', 'ali', 'ahmed', 'KH City', 'Female', 'none', '1991-01-01', 'KH Citys', 27, 'mai', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mai@y.com', '5415456', 'Bachelor', 'photos/avatar3.png', '', '2'),
(2018014, 'ahmed', 'amar', 'khalid', 'KH City', 'Male', 'none', '1993-01-16', 'KH City', 25, 'Ahmed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ahmed@y.com', '14655623123123', 'Bachelor', '', '', '5'),
(2018015, 'jamal', 'osman', 'AHMED', 'KH City', 'Male', 'Single', '1992-01-30', 'KH City', 26, 'jamal', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jan@gmail.com', '0234234', 'Bachelor', '', '', '7'),
(2022016, 'sabri', 'ali', 'osama', 'KH', 'Male', 'Single', '1998-03-17', 'kh', 24, 'sabri', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nedo@gmail.com', '889', 'graduate', 'photos/avatar5.png', '', '2'),
(2022018, 'aziiz', 'othman', 'hmad', 'khartoum', 'Male', 'Single', '1998-02-17', 'Kh', 24, 'aziiz', '4216031993dacdb9d857eb2144651cf203125561', 'azoozbrwon51@gmail.com', '0900395039', 'Bachelor', '', '', '1'),
(2022019, 'aziiz', 'othman', 'hmad', 'khartoum', 'Male', 'Single', '1998-02-17', 'Kh', 24, 'aziiz', '4216031993dacdb9d857eb2144651cf203125561', 'azoozbrwon51@gmail.com', '0900395039', 'Bachelor', '', '', '4'),
(2022020, 'ahmed ', 'hassan', 'mohmaed', 'khartoum', 'Male', 'none', '1998-02-17', 'Kh', 24, 'ahmed', '1698c2bea6c8000723d5bb70363a8352d846917e', 'azoozbrwon51@gmail.com', '0900395039', 'Bachelor', '', '', '3'),
(2022021, 'mohamed', 'hassan', 'ahmeed', 'khartoum', 'Male', 'Married', '1995-04-17', 'Kh', 27, 'mohamed', '292959f6c7ab4f8b0761469ac1f11fc73f43b306', 'azoozbrwon51@gmail.com', '0912824432', 'Bachelor', '', '', '5'),
(2022022, 'othman', 'abubker', 'hmad', 'khartoum', 'Male', 'Married', '1985-04-13', 'Kh', 37, 'othman', 'd8f9c3d8279d8f6ff17df6e54928c90ea6d84c69', 'azoozbrwon51@gmail.com', '0912326069', 'Master', '', '', '1'),
(2022023, 'nader', 'mohamed', 'ahmed ', 'khartoum', 'Male', 'Single', '1990-02-17', 'Kh', 32, 'nader', '8c7e3e7149bdc521b324ece88a3bca3c9dfd7389', 'azoozbrwon51@gmail.com', '09999123', 'Bachelor', '', '', '2'),
(2022025, 'osman', 'alio', 'omer', 'bhri', 'Male', 'Single', '1999-03-28', NULL, 23, 'osman', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nedo2299@gmail.com', '656556', 'PhD', '', '', '3'),
(2022027, 'test', 'test', 'test', 'test', 'Female', 'Married', '1994-01-17', NULL, 28, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'nedo2299@gmail.com', '445', 'Bachelor', '', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tblattachmentfile`
--

CREATE TABLE `tblattachmentfile` (
  `ID` int(11) NOT NULL,
  `FILEID` varchar(30) DEFAULT NULL,
  `JOBID` int(11) NOT NULL,
  `FILE_NAME` varchar(90) NOT NULL,
  `FILE_LOCATION` varchar(255) NOT NULL,
  `USERATTACHMENTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblattachmentfile`
--

INSERT INTO `tblattachmentfile` (`ID`, `FILEID`, `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) VALUES
(2, '2147483647', 2, 'Resume', 'photos/27052018124027PLATENO FE95483.docx', 2018013),
(3, '20226912529', 1, 'Resume', 'photos/12042022121247nader C. V 2.pdf', 2022016),
(5, '20226912534', 3, 'Resume', 'photos/15072022102448cv_1.JPG', 2018013),
(6, '20226912535', 3, 'Resume', 'photos/15072022103226cv_1.JPG', 2018013),
(7, '20226912536', 3, 'Resume', 'photos/16072022043406fatiima.docx', 2022018),
(8, '20226912537', 4, 'Resume', 'photos/17072022060958fatiima.docx', 2022020),
(9, '20226912540', 4, 'Resume', 'photos/17072022072624fatiima.docx', 2022021),
(10, '20226912541', 4, 'Resume', 'photos/17072022072924????.docx', 2022022),
(11, '20226912542', 4, 'Resume', 'photos/17072022073134fatiima.docx', 2022022),
(12, '20226912543', 4, 'Resume', 'photos/17072022073314Index.docx', 2022021),
(13, '20226912544', 4, 'Resume', 'photos/17072022073417Index.docx', 2022021),
(14, '20226912545', 1, 'Resume', 'photos/17072022085228fatiima.docx', 2022021),
(15, '20226912547', 1, 'Resume', 'photos/17072022085246????? ?????????.docx', 2022021),
(16, '20226912548', 1, 'Resume', 'photos/17072022101430Index.docx', 2022021),
(17, '20226912549', 1, 'Resume', 'photos/18072022101111Azooz Presentation.docx', 2018014),
(18, '20226912550', 1, 'Resume', 'photos/18072022104645fatiima.docx', 2022021),
(19, '20226912551', 1, 'Resume', 'photos/18072022014608Presentation3.pptx', 2022023),
(20, '20226912552', 1, 'Resume', 'photos/25072022041118aziz.pptx', 2022024),
(21, '20226912553', 6, 'Resume', 'photos/09082022075917erisdb.sql', 2022025),
(22, '20226912554', 1, 'Resume', 'photos/10082022105458erisdb.sql', 2022027);

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 9, 1, 'userid'),
(2, '000', 84, 1, 'employeeid'),
(3, '0', 28, 1, 'APPLICANT'),
(4, '69125', 55, 1, 'FILEID');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORYID` int(11) NOT NULL,
  `CATEGORY` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(10, 'Technology'),
(11, 'Managerial'),
(12, 'Engineer'),
(13, 'IT'),
(14, 'Civil Engineer'),
(15, 'HR'),
(23, 'Sales'),
(24, 'Banking'),
(25, 'Finance'),
(26, 'BPO'),
(27, 'Degital Marketing'),
(28, 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `COMPANYID` int(11) NOT NULL,
  `COMPANYNAME` varchar(90) NOT NULL,
  `COMPANYADDRESS` varchar(90) NOT NULL,
  `COMPANYCONTACTNO` varchar(30) NOT NULL,
  `COMPANYSTATUS` varchar(90) NOT NULL,
  `COMPANYMISSION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`COMPANYID`, `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`, `COMPANYSTATUS`, `COMPANYMISSION`) VALUES
(2, 'Fatma Group', 'Bahri', '+2499000555888', '', 'weqwe'),
(6, 'Palacios Company', 'Omdourman', '+2499000066223', '', ''),
(7, 'IT Company', 'Khartoum', '+2499222233889', '', ''),
(9, 'Morouj Commodities Ltd', 'Sudan/khartoum ', '2269577', '', ''),
(10, 'Zain Sudan', 'Sudan/khartoum', '249) 90001111', '', ''),
(11, 'Nile Petroleum ', 'Sudan/khartoum', '01212333383 ', '', ''),
(12, 'DAL Group', 'Sudan/Bhri', ' +249183216000', '', ''),
(13, 'Bank of Khartoum', 'Sudan/khartoum', '0156661000', '', ''),
(14, 'aziiz group', 'khartoum', '0900395039', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `INCID` int(11) NOT NULL,
  `EMPLOYEEID` varchar(30) NOT NULL,
  `FNAME` varchar(50) NOT NULL,
  `LNAME` varchar(50) NOT NULL,
  `MNAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(90) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(90) NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(30) NOT NULL,
  `CIVILSTATUS` varchar(30) NOT NULL,
  `TELNO` varchar(40) NOT NULL,
  `EMP_EMAILADDRESS` varchar(90) NOT NULL,
  `CELLNO` varchar(30) NOT NULL,
  `POSITION` varchar(50) NOT NULL,
  `WORKSTATS` varchar(90) NOT NULL,
  `EMPPHOTO` varchar(255) NOT NULL,
  `EMPUSERNAME` varchar(90) NOT NULL,
  `EMPPASSWORD` varchar(125) NOT NULL,
  `DATEHIRED` date NOT NULL,
  `COMPANYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`INCID`, `EMPLOYEEID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `SEX`, `CIVILSTATUS`, `TELNO`, `EMP_EMAILADDRESS`, `CELLNO`, `POSITION`, `WORKSTATS`, `EMPPHOTO`, `EMPUSERNAME`, `EMPPASSWORD`, `DATEHIRED`, `COMPANYID`) VALUES
(77, '11111', 'ali', 'hassan', 'osama', 'KH', '1981-03-06', 'kh', 41, 'Male', 'Married', '54', 'nedo@gmail.com', '', 'manager', '', '', '11111', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', '2015-03-05', 3),
(78, '123', 'azaiz', 'Fadul', 'ahmed', 'P.O.Box 2589 00966548312940 Street Prince Mansour Bin Abdulaziz', '2000-02-02', 'kh', 22, 'Male', 'Single', '09999123', 'abubkeralhmad@yahoo.com', '', 'hr', '', '', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2071-02-02', 3),
(79, 'aziiz', 'aziiz', 'hmad', 'othman', 'khartoum', '1998-02-17', 'kh', 24, 'Male', 'Single', '09999123', 'azoozbrwon51@gmail.com', '', 'HR', '', '', 'aziiz', '4216031993dacdb9d857eb2144651cf203125561', '2071-02-02', 14),
(80, 'Bank khatoum', 'ahmed', 'mohamed', 'ahmed', 'khartoum', '1999-02-19', 'kh', 23, 'Male', 'Married', '0900395039', 'azoozbrwon51@gmail.com', '', 'HR', '', '', 'Bank khatoum', 'a4056e6910c6dfd94eb95b910670ced852627cd7', '2071-02-02', 13),
(81, '55555', 'hgfftf', 'jhyufd', 'jhftyu', 'khartoum', '1998-02-17', 'kh', 24, 'Female', 'Married', '09999123', 'azoozbrwon51@gmail.com', '', 'yyu', '', '', '55555', '69df79bef9287d3bcb8f104a408b06de6a108fd8', '2071-02-02', 0),
(82, '12345', 'omer', 'mohmaed', 'ahmed', 'khartoum', '1999-07-07', 'kh', 23, 'Male', 'Single', '555554', 'azoozbrwon51@gmail.com', '', 'HR', '', '', '12345', '8cb2237d0679ca88db6464eac60da96345513964', '2071-02-02', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FEEDBACKID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `REGISTRATIONID` int(11) NOT NULL,
  `FEEDBACK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`FEEDBACKID`, `APPLICANTID`, `REGISTRATIONID`, `FEEDBACK`) VALUES
(2, 2018015, 2, 'came to the company'),
(3, 2022016, 3, ' Thank you for applied for this job'),
(4, 2018013, 5, 'we are interrested'),
(5, 2022018, 7, 'hi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbljob`
--

CREATE TABLE `tbljob` (
  `JOBID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `CATEGORY` varchar(250) NOT NULL,
  `OCCUPATIONTITLE` varchar(90) NOT NULL,
  `REQ_NO_EMPLOYEES` int(11) NOT NULL,
  `SALARIES` double NOT NULL,
  `DURATION_EMPLOYEMENT` varchar(90) NOT NULL,
  `QUALIFICATION_WORKEXPERIENCE` text NOT NULL,
  `JOBDESCRIPTION` text NOT NULL,
  `PREFEREDSEX` varchar(30) NOT NULL,
  `SECTOR_VACANCY` text NOT NULL,
  `JOBSTATUS` varchar(255) DEFAULT 'Open',
  `DATEPOSTED` varchar(255) NOT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `Job_DEGREE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljob`
--

INSERT INTO `tbljob` (`JOBID`, `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`, `end_date`, `Job_DEGREE`) VALUES
(1, 2, 'Sales', 'sales manager ', 1, 130000, 'full time', '3 - 5 years ', 'following up on sales in the organization ', 'Male', 'privet sector ', 'Open', '2022-07-17', '2022-08-17', 'Bachelor'),
(3, 3, 'Managerial', 'IT', 2, 100, 'hhj', 'aerrg', 'aesgdgs', 'Female', 'fsdf', 'Open', '2022-07-07', '2022-07-19', 'Bachelor'),
(5, 13, 'HR', 'Recruiting and Staffing Department ', 1, 150000, 'Full time', ' 3 years', 'interviews.  improve the quality of work.   welcoming new employees and providing them with necessary equipment.', 'Male', 'Private sector', 'Open', '2022-07-17', '2022-08-15', 'Master'),
(6, 11, 'Shipping', 'Supervisor', 1, 80000, 'Full time', 'work under pressure', 'follow up the process of shipping the petroleum products. ', 'Male', 'privet sector', 'Open', '2022-07-17', '2022-08-17', 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobregistration`
--

CREATE TABLE `tbljobregistration` (
  `REGISTRATIONID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `APPLICANT` varchar(90) NOT NULL,
  `REGISTRATIONDATE` date NOT NULL,
  `REMARKS` varchar(255) NOT NULL DEFAULT 'Pending',
  `FILEID` varchar(30) DEFAULT NULL,
  `PENDINGAPPLICATION` tinyint(1) NOT NULL DEFAULT 1,
  `HVIEW` tinyint(1) NOT NULL DEFAULT 1,
  `DATETIMEAPPROVED` datetime NOT NULL,
  `admin_approve` int(11) NOT NULL DEFAULT 0,
  `admin_app_1` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbljobregistration`
--

INSERT INTO `tbljobregistration` (`REGISTRATIONID`, `COMPANYID`, `JOBID`, `APPLICANTID`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`, `HVIEW`, `DATETIMEAPPROVED`, `admin_approve`, `admin_app_1`) VALUES
(17, 2, 1, 2018014, 'ahmed amar', '2022-07-18', 'Pending', '20226912549', 1, 1, '2022-07-18 10:11:00', 0, 1),
(18, 2, 1, 2022021, 'mohamed hassan', '2022-07-18', 'Pending', '20226912550', 1, 1, '2022-07-18 10:46:00', 0, 0),
(20, 2, 1, 2022024, 'mohamed ahmeed', '2022-07-25', 'Pending', '20226912552', 1, 1, '2022-07-25 16:11:00', 0, 0),
(21, 11, 6, 2022025, 'osman alio', '2022-08-09', 'Pending', '20226912553', 1, 1, '2022-08-09 19:59:00', 0, 0),
(22, 2, 1, 2022027, 'test test', '2022-08-10', 'Pending', '20226912554', 1, 1, '2022-08-10 10:54:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PICLOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'Aziz', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/Koala.jpg'),
('029838', 'Aziiz othman al hmad', 'Aziz', 'e79a2a3ace158e657cccb7fce9804529e9aa3d32', 'Administrator', ''),
('12345', 'omer mohmaed', 'mohmaed', '8cb2237d0679ca88db6464eac60da96345513964', 'Employee', ''),
('55555', 'hgfftf jhyufd', 'jhyufd', '69df79bef9287d3bcb8f104a408b06de6a108fd8', 'Employee', ''),
('aziiz', 'aziiz hmad', 'hmad', '4216031993dacdb9d857eb2144651cf203125561', 'Employee', ''),
('Bank khatoum', 'ahmed mohamed', 'mohamed', 'a4056e6910c6dfd94eb95b910670ced852627cd7', 'Employee', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblapplicants`
--
ALTER TABLE `tblapplicants`
  ADD PRIMARY KEY (`APPLICANTID`);

--
-- Indexes for table `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORYID`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`INCID`),
  ADD UNIQUE KEY `EMPLOYEEID` (`EMPLOYEEID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FEEDBACKID`);

--
-- Indexes for table `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JOBID`);

--
-- Indexes for table `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  ADD PRIMARY KEY (`REGISTRATIONID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblapplicants`
--
ALTER TABLE `tblapplicants`
  MODIFY `APPLICANTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022028;

--
-- AUTO_INCREMENT for table `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `INCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FEEDBACKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  MODIFY `REGISTRATIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
