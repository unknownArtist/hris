-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2012 at 07:52 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `message` text,
  `tittle` varchar(255) DEFAULT NULL,
  `employee_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`,`employee_ID`),
  KEY `fk_Announcements_employee1_idx` (`employee_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `message`, `tittle`, `employee_ID`) VALUES
(1, '2012-09-03 16:49:35', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'news', 1),
(2, '2012-09-11 15:27:10', 'sssssssssssssssssssssss', 'erewrew', 2),
(3, '2012-09-04 17:35:45', 'rererererererererererere', 'rerewr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployerName` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `OfficeNo` varchar(45) NOT NULL,
  `website` varchar(255) NOT NULL,
  `SSSNumber` int(10) NOT NULL,
  `TaxIdentificationNo` int(10) NOT NULL,
  `Address` text,
  `AlterAddress` text,
  `city` varchar(255) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `zipcode` int(10) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `EmployerName`, `companyName`, `OfficeNo`, `website`, `SSSNumber`, `TaxIdentificationNo`, `Address`, `AlterAddress`, `city`, `Province`, `zipcode`, `country`) VALUES
(1, 'hghgf', 'hgjhgj', 'ghjhg', ',asm,ad', 6, 6, 'hgjgjghj', NULL, 'hjghj', 'hjgj', 6, 'bvnvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `deductionorallowance`
--

CREATE TABLE IF NOT EXISTS `deductionorallowance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `fixRate` int(11) DEFAULT NULL,
  `hourlyRate` int(11) DEFAULT NULL,
  `isDeduction` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departmentmanagers`
--

CREATE TABLE IF NOT EXISTS `departmentmanagers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `employee_ID` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`employee_ID`,`departments_id`),
  KEY `fk_departmentManagers_employee1_idx` (`employee_ID`),
  KEY `fk_departmentManagers_departments1_idx` (`departments_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `departmentmanagers`
--

INSERT INTO `departmentmanagers` (`ID`, `employee_ID`, `departments_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `desc` text,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departments_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `desc`, `company_ID`) VALUES
(1, 'HR', 'bvnvbn', 1),
(2, 'management', NULL, 1),
(3, 'IT', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `nickName` varchar(255) NOT NULL,
  `spouseName` varchar(255) NOT NULL,
  `dateofBirth` date NOT NULL,
  `gender` varchar(45) NOT NULL,
  `startDate` date NOT NULL,
  `address` text NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `basic` decimal(10,0) NOT NULL,
  `hourlyRate` decimal(10,0) NOT NULL,
  `nonTaxableAllowences` decimal(10,0) NOT NULL,
  `taxableAllowances` decimal(10,0) NOT NULL,
  `grossSalary` decimal(10,0) NOT NULL,
  `OT` tinyint(4) NOT NULL,
  `HolidayAPP` tinyint(4) NOT NULL,
  `SSS` tinyint(4) NOT NULL,
  `health` int(11) NOT NULL,
  `excludeFromPayroll` tinyint(4) NOT NULL,
  `nightDiff` tinyint(4) NOT NULL,
  `withholdingTax` tinyint(4) NOT NULL,
  `Pagibig` tinyint(4) NOT NULL,
  `company_ID` int(11) NOT NULL,
  `positions_ID` int(11) NOT NULL,
  `employeetaxstatus_ID` int(11) NOT NULL,
  `epmloyeestatus_ID` int(11) NOT NULL,
  `employeesalarytype_ID` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `teams_ID` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `maritalStatus` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `emergencyContactName` varchar(45) DEFAULT NULL,
  `emergencyContactRelation` varchar(45) DEFAULT NULL,
  `emergencyContactPhone` varchar(45) DEFAULT NULL,
  `emergencyContactMobile` varchar(45) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `shift_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`positions_ID`,`employeetaxstatus_ID`,`epmloyeestatus_ID`,`employeesalarytype_ID`,`departments_id`,`teams_ID`,`users_id`,`shift_id`),
  KEY `employeeID` (`ID`),
  KEY `fk_employee_company_idx` (`company_ID`),
  KEY `fk_employee_positions1_idx` (`positions_ID`),
  KEY `fk_employee_employeetaxstatus1_idx` (`employeetaxstatus_ID`),
  KEY `fk_employee_epmloyeestatus1_idx` (`epmloyeestatus_ID`),
  KEY `fk_employee_employeesalarytype1_idx` (`employeesalarytype_ID`),
  KEY `fk_employee_departments1_idx` (`departments_id`),
  KEY `fk_employee_teams1_idx` (`teams_ID`),
  KEY `fk_employee_users1_idx` (`users_id`),
  KEY `fk_employee_shift1_idx` (`shift_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `firstName`, `middleName`, `LastName`, `nickName`, `spouseName`, `dateofBirth`, `gender`, `startDate`, `address`, `district`, `city`, `basic`, `hourlyRate`, `nonTaxableAllowences`, `taxableAllowances`, `grossSalary`, `OT`, `HolidayAPP`, `SSS`, `health`, `excludeFromPayroll`, `nightDiff`, `withholdingTax`, `Pagibig`, `company_ID`, `positions_ID`, `employeetaxstatus_ID`, `epmloyeestatus_ID`, `employeesalarytype_ID`, `departments_id`, `teams_ID`, `users_id`, `maritalStatus`, `phone`, `mobile`, `emergencyContactName`, `emergencyContactRelation`, `emergencyContactPhone`, `emergencyContactMobile`, `picture`, `shift_id`) VALUES
(1, 'ghgf', '', 'gfhfg', '', '', '0000-00-00', 'gfhgf', '2012-09-04', '', '', '', '11', '11', '11', '0', '11', 111, 11, 11, 11, 11, 11, 11, 11, 1, 2, 1, 1, 1, 1, 1, 1, 'werew', '543535', '546546', 'fgfgfh', 'fhdgf', '4564', '56456', 'fghf', 0),
(2, 'manager', '', 'sfddsfs', '', '', '0000-00-00', 'dfdsgds', '2012-09-06', '', '', '', '11', '11', '11', '0', '11', 11, 11, 11, 11, 11, 11, 11, 11, 1, 2, 1, 1, 1, 1, 1, 2, 'efdsgfds', '43535', '34535', 'gfhgfh', 'gfdgf', '454656', '5556', 'gfghghg', 0),
(3, 'farah', 'sfsdf', 'habib', 'sfdg', '', '2012-10-03', 'Female', '2012-10-03', 'gfdgdf', 'dfgdfg', 'fdgdh', '657657', '900000', '32432', '3453534', '4345564', 0, 0, 1, 1, 1, 1, 1, 1, 1, 3, 4, 3, 3, 2, 1, 9, 'Single', '4545', '4564564', 'dfgd', 'dfhfd', '456456', '45645', '3017-3-quotes-wallpapers-backgrounds.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeleaves`
--

CREATE TABLE IF NOT EXISTS `employeeleaves` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `reason` text NOT NULL,
  `status` int(11) NOT NULL,
  `StatusReason` text NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `leavetypes_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`employee_ID`,`leavetypes_ID`),
  KEY `fk_employeeleaves_employee1_idx` (`employee_ID`),
  KEY `fk_employeeleaves_leavetypes1_idx` (`leavetypes_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `employeeleaves`
--

INSERT INTO `employeeleaves` (`ID`, `from`, `to`, `reason`, `status`, `StatusReason`, `employee_ID`, `leavetypes_ID`) VALUES
(20, '0000-00-00', '0000-00-00', 'hhhhhhhh', 1, '', 1, 5),
(21, '0000-00-00', '0000-00-00', 'hhhhhhhh', 2, '', 1, 5),
(22, '0000-00-00', '0000-00-00', 'hhhhhhhh', 1, '', 1, 5),
(23, '0000-00-00', '0000-00-00', 'hhhhhhhh', 2, '', 1, 3),
(25, '2012-09-11', '2012-09-15', 'sdsfsf', 3, '', 1, 1),
(26, '2012-09-11', '2012-09-15', 'sdsfsf', 3, '', 1, 1),
(27, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(28, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(29, '2012-09-11', '2012-09-15', 'sdsfsf', 1, '', 1, 1),
(30, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(31, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(32, '2012-09-11', '2012-09-15', 'sdsfsf', 1, '', 1, 1),
(33, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(34, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(35, '2012-09-11', '2012-09-15', 'sdsfsf', 3, '', 1, 1),
(36, '2012-09-11', '2012-09-15', 'sdsfsf', 2, '', 1, 1),
(37, '0000-00-00', '0000-00-00', 'gfdhg', 3, '', 1, 3),
(38, '1915-07-09', '2012-09-15', 'hjkjkl', 2, '', 1, 1),
(40, '2012-09-11', '2012-09-14', 'sick leave', 2, '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employeesalarytype`
--

CREATE TABLE IF NOT EXISTS `employeesalarytype` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_employeesalarytype_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `employeesalarytype`
--

INSERT INTO `employeesalarytype` (`ID`, `name`, `desc`, `company_ID`) VALUES
(1, 'Contractual', 'bvnvn', 1),
(2, 'Daily', 'fsdfds', 1),
(3, 'Hourly', 'fsdfds', 1),
(4, 'Monthly', 'fsdfds', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeetaxstatus`
--

CREATE TABLE IF NOT EXISTS `employeetaxstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_employeetaxstatus_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employeetaxstatus`
--

INSERT INTO `employeetaxstatus` (`ID`, `name`, `desc`, `company_ID`) VALUES
(1, 'S', 'bnvnv', 1),
(2, 'S1', '', 1),
(3, 'S2', '', 1),
(4, 'S3', '', 1),
(5, 'S4', '', 1),
(6, 'ME', '', 1),
(7, 'ME1', '', 1),
(8, 'ME2', '', 1),
(9, 'ME3', '', 1),
(10, 'ME4', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emprole`
--

CREATE TABLE IF NOT EXISTS `emprole` (
  `ID` int(11) NOT NULL,
  `company_ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `company_ID` (`company_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emprole`
--

INSERT INTO `emprole` (`ID`, `company_ID`, `name`, `desc`) VALUES
(1, 1, 'Accountant', ''),
(2, 1, 'Company Admin', ''),
(3, 1, 'Employee', ''),
(4, 1, 'HR', ''),
(5, 1, 'Manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `epmloyeestatus`
--

CREATE TABLE IF NOT EXISTS `epmloyeestatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `desc` text NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_epmloyeestatus_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `epmloyeestatus`
--

INSERT INTO `epmloyeestatus` (`ID`, `name`, `desc`, `company_ID`) VALUES
(1, 'Probationary', 'bnbvnv', 1),
(2, 'Regular', '', 1),
(3, 'Officer', '', 1),
(4, 'Freelance', '', 1),
(5, 'Terminated', '', 1),
(6, 'Resigned', '', 1),
(7, 'Contractual', '', 1),
(8, 'Retired', '', 1),
(9, 'End of Contract', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leavetypes`
--

CREATE TABLE IF NOT EXISTS `leavetypes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_leavetypes_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `leavetypes`
--

INSERT INTO `leavetypes` (`ID`, `name`, `desc`, `company_ID`) VALUES
(1, 'Vacation leave', 'bvnvbn', 1),
(2, 'Compassionate leave', 'sdsadc', 1),
(3, 'Maternity leave', '', 1),
(4, 'Probie Leave', 'vbncbnbn', 1),
(5, 'Sick leave', 'ggfhhffhgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loanpayments`
--

CREATE TABLE IF NOT EXISTS `loanpayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `installment` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `loans_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`loans_id`),
  KEY `fk_loanPayments_loans1_idx` (`loans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_ID` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `amountLeft` int(11) DEFAULT NULL,
  `installment` int(11) DEFAULT NULL,
  `markup` int(11) DEFAULT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  `dateApplied` date DEFAULT NULL,
  `dateApproved` date DEFAULT NULL,
  `desc` text,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`employee_ID`),
  KEY `fk_loans_employee1_idx` (`employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE IF NOT EXISTS `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reasons` text,
  `status` varchar(45) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `timeKeeping_id` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`,`timeKeeping_id`,`employee_ID`),
  KEY `fk_overTime_timeKeeping1_idx` (`timeKeeping_id`),
  KEY `fk_overTime_employee1_idx` (`employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `id` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `month` date DEFAULT NULL,
  `payrollPeriod_id` int(11) NOT NULL,
  `basic` int(11) DEFAULT NULL,
  `DeductionOrAllowance_id` int(11) NOT NULL,
  `deductAllounceAmount` int(11) DEFAULT NULL,
  `generatedBy` int(11) DEFAULT NULL,
  `approvedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`employee_ID`,`payrollPeriod_id`,`DeductionOrAllowance_id`),
  KEY `fk_payroll_employee1_idx` (`employee_ID`),
  KEY `fk_payroll_DeductionOrAllowance1_idx` (`DeductionOrAllowance_id`),
  KEY `fk_payroll_payrollPeriod1_idx` (`payrollPeriod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payrollperiod`
--

CREATE TABLE IF NOT EXISTS `payrollperiod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` int(11) DEFAULT NULL,
  `end` int(11) DEFAULT NULL,
  `releaseDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payrollperiod`
--

INSERT INTO `payrollperiod` (`id`, `start`, `end`, `releaseDate`) VALUES
(1, 22, 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_positions_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`ID`, `name`, `desc`, `company_ID`) VALUES
(1, 'BA', 'jhgkgfj', 1),
(2, 'Business Analyst', 'sfdsf', 1),
(3, 'CSR', 'fdgfdgf', 1),
(4, 'HR Trainee', 'jhgkgfj', 1),
(5, 'IT', 'jhgkgfj', 1),
(6, 'Manager', 'jhgkgfj', 1),
(7, 'Operations Officer', 'jhgkgfj', 1),
(8, 'Programmer', 'jhgkgfj', 1),
(9, 'Salesman', 'jhgkgfj', 1),
(10, 'Secretary', 'jhgkgfj', 1),
(11, 'Tambay', 'jhgkgfj', 1),
(12, 'Others', 'jhgkgfj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `postemployment`
--

CREATE TABLE IF NOT EXISTS `postemployment` (
  `id` int(11) NOT NULL,
  `documentName` varchar(255) DEFAULT NULL,
  `uploadDate` datetime DEFAULT NULL,
  `uploadedBy` int(11) DEFAULT NULL,
  `note` text,
  `employee_ID` int(11) NOT NULL,
  `documentPath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`employee_ID`),
  KEY `fk_preEmployment_employee1_idx` (`employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preemployment`
--

CREATE TABLE IF NOT EXISTS `preemployment` (
  `id` int(11) NOT NULL,
  `documentName` varchar(255) DEFAULT NULL,
  `uploadDate` date DEFAULT NULL,
  `uploadedBy` int(11) DEFAULT NULL,
  `note` text,
  `employee_ID` int(11) NOT NULL,
  `documentPath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`employee_ID`),
  KEY `fk_preEmployment_employee1_idx` (`employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `punchalteration`
--

CREATE TABLE IF NOT EXISTS `punchalteration` (
  `id` int(11) NOT NULL,
  `punchIn` datetime DEFAULT NULL,
  `lunchOut` datetime DEFAULT NULL,
  `lunchIn` datetime DEFAULT NULL,
  `punchOut` datetime DEFAULT NULL,
  `reason` text,
  `status` varchar(45) DEFAULT NULL,
  `timeKeeping_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`timeKeeping_id`),
  KEY `fk_punchAlteration_timeKeeping1_idx` (`timeKeeping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `name`, `type`) VALUES
(1, 'rewrfw', 'werw'),
(2, 'rygrtyhrt', 'tyrty'),
(3, 'ewret', 'fdgdfgd');

-- --------------------------------------------------------

--
-- Table structure for table `shifttiming`
--

CREATE TABLE IF NOT EXISTS `shifttiming` (
  `id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `day` varchar(45) DEFAULT NULL,
  `shiftIn` time NOT NULL,
  `shiftOut` time NOT NULL,
  PRIMARY KEY (`id`,`shift_id`),
  KEY `fk_shiftTiming_shift1_idx` (`shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shifttiming`
--

INSERT INTO `shifttiming` (`id`, `shift_id`, `day`, `shiftIn`, `shiftOut`) VALUES
(0, 0, 'wednesday', '08:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teamlead`
--

CREATE TABLE IF NOT EXISTS `teamlead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_ID` int(11) NOT NULL,
  `teams_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`,`employee_ID`,`teams_ID`),
  KEY `fk_teamLead_employee1_idx` (`employee_ID`),
  KEY `fk_teamLead_teams1_idx` (`teams_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_teams_company1_idx` (`company_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`ID`, `name`, `desc`, `company_ID`) VALUES
(1, 'Management', 'gfhgfhgf', 1),
(2, 'Operation', '', 1),
(3, 'Orica', '', 1),
(4, 'Pasig', '', 1),
(5, 'IT', '', 1),
(6, 'Head Office', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping`
--

CREATE TABLE IF NOT EXISTS `timekeeping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `punchIn` datetime DEFAULT NULL,
  `lunchOut` datetime DEFAULT NULL,
  `lunchIn` datetime DEFAULT NULL,
  `punchOut` datetime DEFAULT NULL,
  `employee_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`,`employee_ID`),
  KEY `fk_timeKeeping_employee1_idx` (`employee_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `timekeeping`
--

INSERT INTO `timekeeping` (`id`, `punchIn`, `lunchOut`, `lunchIn`, `punchOut`, `employee_ID`) VALUES
(72, '2012-09-24 00:00:00', '2012-09-24 00:00:00', '2012-09-24 00:00:00', '2012-09-24 00:00:00', 1),
(73, '2012-09-25 00:00:00', '2012-09-25 00:00:00', '2012-09-25 00:00:00', '2012-09-25 00:00:00', 1),
(74, '2012-09-26 00:00:00', '2012-09-26 00:00:00', '2012-09-26 00:00:00', '2012-09-26 00:00:00', 1),
(75, '2012-09-27 00:00:00', '2012-09-27 00:00:00', '2012-09-27 00:00:00', '2012-09-27 00:00:00', 1),
(84, '2012-10-04 07:47:11', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `password`, `role`, `status`) VALUES
(1, 'fara', 'f@gmail.com', 'fara', 'admin', 1),
(2, 'Sehrish', 'sdfsf', 'sehrish', 'admin', 1),
(9, 'fgfghfg', 'habibsehrish@gmail.com', 'fghfgh', '3', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `fk_Announcements_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departmentmanagers`
--
ALTER TABLE `departmentmanagers`
  ADD CONSTRAINT `fk_departmentManagers_departments1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_departmentManagers_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `fk_departments_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_company` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_departments1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_employeesalarytype1` FOREIGN KEY (`employeesalarytype_ID`) REFERENCES `employeesalarytype` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_employeetaxstatus1` FOREIGN KEY (`employeetaxstatus_ID`) REFERENCES `employeetaxstatus` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_epmloyeestatus1` FOREIGN KEY (`epmloyeestatus_ID`) REFERENCES `epmloyeestatus` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_positions1` FOREIGN KEY (`positions_ID`) REFERENCES `positions` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_shift1` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_teams1` FOREIGN KEY (`teams_ID`) REFERENCES `teams` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeeleaves`
--
ALTER TABLE `employeeleaves`
  ADD CONSTRAINT `fk_employeeleaves_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employeeleaves_leavetypes1` FOREIGN KEY (`leavetypes_ID`) REFERENCES `leavetypes` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeesalarytype`
--
ALTER TABLE `employeesalarytype`
  ADD CONSTRAINT `fk_employeesalarytype_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeetaxstatus`
--
ALTER TABLE `employeetaxstatus`
  ADD CONSTRAINT `fk_employeetaxstatus_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emprole`
--
ALTER TABLE `emprole`
  ADD CONSTRAINT `emprole_ibfk_1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`);

--
-- Constraints for table `epmloyeestatus`
--
ALTER TABLE `epmloyeestatus`
  ADD CONSTRAINT `fk_epmloyeestatus_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `leavetypes`
--
ALTER TABLE `leavetypes`
  ADD CONSTRAINT `fk_leavetypes_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loanpayments`
--
ALTER TABLE `loanpayments`
  ADD CONSTRAINT `fk_loanPayments_loans1` FOREIGN KEY (`loans_id`) REFERENCES `loans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `fk_loans_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `overtime`
--
ALTER TABLE `overtime`
  ADD CONSTRAINT `fk_overTime_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_overTime_timeKeeping1` FOREIGN KEY (`timeKeeping_id`) REFERENCES `timekeeping` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `fk_payroll_DeductionOrAllowance1` FOREIGN KEY (`DeductionOrAllowance_id`) REFERENCES `deductionorallowance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payroll_payrollPeriod1` FOREIGN KEY (`payrollPeriod_id`) REFERENCES `payrollperiod` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `fk_positions_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `postemployment`
--
ALTER TABLE `postemployment`
  ADD CONSTRAINT `fk_preEmployment_employee10` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `preemployment`
--
ALTER TABLE `preemployment`
  ADD CONSTRAINT `fk_preEmployment_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `punchalteration`
--
ALTER TABLE `punchalteration`
  ADD CONSTRAINT `fk_punchAlteration_timeKeeping1` FOREIGN KEY (`timeKeeping_id`) REFERENCES `timekeeping` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shifttiming`
--
ALTER TABLE `shifttiming`
  ADD CONSTRAINT `fk_shiftTiming_shift1` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teamlead`
--
ALTER TABLE `teamlead`
  ADD CONSTRAINT `fk_teamLead_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_teamLead_teams1` FOREIGN KEY (`teams_ID`) REFERENCES `teams` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_teams_company1` FOREIGN KEY (`company_ID`) REFERENCES `company` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `timekeeping`
--
ALTER TABLE `timekeeping`
  ADD CONSTRAINT `fk_timeKeeping_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
