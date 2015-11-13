-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2014 at 09:44 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prajwal_globaljob`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `name`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application_pool`
--

CREATE TABLE IF NOT EXISTS `tbl_application_pool` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `jobseeker_id` int(11) NOT NULL,
  `application_shortlist` tinyint(1) NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_application_pool`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) NOT NULL,
  `company_logo` varchar(250) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `company_alias` varchar(250) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `ownership_id` int(11) NOT NULL,
  `company_head_id` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_logo`, `industry_id`, `company_alias`, `contact_id`, `size_id`, `ownership_id`, `company_head_id`) VALUES
(1, 'Basnet Co-orporation ', '1254123', 1, 'Basnet_corporation', 1, 1, 1, 1),
(2, 'Rokledge Corporation', '4562315', 2, 'Rokledge_Corporation', 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_company_contact` (
  `company_contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `company_contact_first_name` varchar(100) NOT NULL,
  `comapny_contact_middle_name` varchar(100) NOT NULL,
  `comapny_contact_last_name` varchar(100) NOT NULL,
  `company_contact_sex` varchar(10) NOT NULL,
  `comapany_location_id` int(11) NOT NULL,
  `company_country` int(11) NOT NULL,
  `company_phone_one` varchar(30) NOT NULL,
  `company_phone_two` varchar(30) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_url` varchar(100) NOT NULL,
  PRIMARY KEY (`company_contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_company_contact`
--

INSERT INTO `tbl_company_contact` (`company_contact_id`, `company_id`, `company_contact_first_name`, `comapny_contact_middle_name`, `comapny_contact_last_name`, `company_contact_sex`, `comapany_location_id`, `company_country`, `company_phone_one`, `company_phone_two`, `company_email`, `company_url`) VALUES
(1, 1, 'Prithivi ', 'Jung', 'Rana', 'Male', 1, 1, '9874563210', '0123456789', 'abc@gmail.com', 'www.corporation.xom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_head`
--

CREATE TABLE IF NOT EXISTS `tbl_company_head` (
  `company_head_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_head_first_name` varchar(100) NOT NULL,
  `company_head_middle_name` varchar(100) NOT NULL,
  `company_head_last_name` varchar(100) NOT NULL,
  `company_head_sex` varchar(50) NOT NULL,
  PRIMARY KEY (`company_head_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_company_head`
--

INSERT INTO `tbl_company_head` (`company_head_id`, `company_head_first_name`, `company_head_middle_name`, `company_head_last_name`, `company_head_sex`) VALUES
(1, 'Hari', 'Bdr', 'Karki', 'Male'),
(2, 'Pooja', '', 'Thapa', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_size`
--

CREATE TABLE IF NOT EXISTS `tbl_company_size` (
  `company_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_size_range` varchar(50) NOT NULL,
  PRIMARY KEY (`company_size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_company_size`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE IF NOT EXISTS `tbl_designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(200) NOT NULL,
  `designation_comments` varchar(250) NOT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation_name`, `designation_comments`) VALUES
(1, 'Manager', 'General Manager'),
(2, 'Assistant Mangaer', 'Asistant'),
(3, 'test', 'Test'),
(4, 'Mananger', 'Administration'),
(5, 'Programmer', 'windows Programmer'),
(6, 'Programmer', 'windows Programmer'),
(7, 'Programmer', 'windows Programmer'),
(8, 'Engineer', 'Electronics'),
(9, 'Engineer', 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_function`
--

CREATE TABLE IF NOT EXISTS `tbl_function` (
  `function_id` int(11) NOT NULL AUTO_INCREMENT,
  `function_name` varchar(200) NOT NULL,
  PRIMARY KEY (`function_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_function`
--

INSERT INTO `tbl_function` (`function_id`, `function_name`) VALUES
(1, 'IT'),
(2, 'Administration'),
(3, 'test'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_industry`
--

CREATE TABLE IF NOT EXISTS `tbl_industry` (
  `industry_id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_name` varchar(200) NOT NULL,
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_industry`
--

INSERT INTO `tbl_industry` (`industry_id`, `industry_name`) VALUES
(1, 'Service'),
(2, 'Administration');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE IF NOT EXISTS `tbl_job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(250) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  `job_salary_exact_amount` int(11) NOT NULL,
  `salary_range_id` varchar(250) NOT NULL,
  `job_service_type` int(11) NOT NULL COMMENT 'it is same as the type of job posting into portal. such as, hot job, corporate job',
  `job_openings` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `job_requirement_id` int(11) NOT NULL,
  `job_working_type` int(11) NOT NULL COMMENT 'this is type of working shift like fulltime or part time etc',
  `job_level_id` int(11) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker`
--

CREATE TABLE IF NOT EXISTS `tbl_jobseeker` (
  `jobseeker_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobseeker_alias` varchar(200) NOT NULL,
  `jobseeker_first_name` varchar(100) NOT NULL,
  `jobseeker_middle_name` varchar(100) NOT NULL,
  `jobseeker_last_name` varchar(100) NOT NULL,
  `jobseeker_user_name` varchar(100) NOT NULL,
  `jobseeker_password` varchar(100) NOT NULL,
  `jobseeker_contact_number` varchar(50) NOT NULL,
  `jobseeker_email` varchar(100) NOT NULL,
  `jobseeker_address` varchar(100) NOT NULL,
  `jobseeker_nationality` varchar(50) NOT NULL,
  `jobseeker_dob` date NOT NULL,
  `jobseeker_marital_status` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`jobseeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_jobseeker`
--

INSERT INTO `tbl_jobseeker` (`jobseeker_id`, `jobseeker_alias`, `jobseeker_first_name`, `jobseeker_middle_name`, `jobseeker_last_name`, `jobseeker_user_name`, `jobseeker_password`, `jobseeker_contact_number`, `jobseeker_email`, `jobseeker_address`, `jobseeker_nationality`, `jobseeker_dob`, `jobseeker_marital_status`, `image`) VALUES
(1, 'Jobseeker', 'Shyam', 'Jung', 'Basnet', 'shyamseeker', '123456789', '9874563210', 'abcdef@gmail.com', 'chabahil', 'Nepali', '1991-03-09', 'single', 'one');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker_academic`
--

CREATE TABLE IF NOT EXISTS `tbl_jobseeker_academic` (
  `jobseeker_academic_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobseeker_id` int(11) NOT NULL,
  `jobseeker_level_of_degree` varchar(50) NOT NULL,
  `jobseeker_degree_name` varchar(50) NOT NULL,
  `jobseeker_graduation_year` varchar(50) NOT NULL,
  `jobseeker_college_name` varchar(200) NOT NULL,
  `jobseeker_university_name` varchar(200) NOT NULL,
  `jobseeker_score` varchar(50) NOT NULL,
  PRIMARY KEY (`jobseeker_academic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_jobseeker_academic`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker_training`
--

CREATE TABLE IF NOT EXISTS `tbl_jobseeker_training` (
  `jobseeker_training_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobseeker_id` varchar(50) NOT NULL,
  `jobseeker_training_year` varchar(250) NOT NULL,
  `jobseeker_training_description` int(11) NOT NULL,
  `jobseeker_training_purpose` int(11) NOT NULL,
  PRIMARY KEY (`jobseeker_training_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_jobseeker_training`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseeker_working_preferrence`
--

CREATE TABLE IF NOT EXISTS `tbl_jobseeker_working_preferrence` (
  `preferrence_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobseeker_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `salar_range_id` int(11) NOT NULL,
  `job_location_id` int(11) NOT NULL,
  PRIMARY KEY (`preferrence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_jobseeker_working_preferrence`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseekser_experience`
--

CREATE TABLE IF NOT EXISTS `tbl_jobseekser_experience` (
  `jobseeker_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `jobseeker_id` int(11) NOT NULL,
  `jobseeker_experience_period` int(11) NOT NULL,
  `jobseeker_experience_designation` varchar(250) NOT NULL,
  `jobseeker_experience_description` varchar(250) NOT NULL,
  PRIMARY KEY (`jobseeker_experience_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_jobseekser_experience`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_level`
--

CREATE TABLE IF NOT EXISTS `tbl_job_level` (
  `job_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_level_name` varchar(50) NOT NULL,
  PRIMARY KEY (`job_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_job_level`
--

INSERT INTO `tbl_job_level` (`job_level_id`, `job_level_name`) VALUES
(2, 'Mid Level'),
(3, 'Senior Level'),
(4, 'Top Level');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_requirement`
--

CREATE TABLE IF NOT EXISTS `tbl_job_requirement` (
  `job_requirement_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_requirement_education_level` varchar(250) NOT NULL,
  `job_requirement_education_description` text NOT NULL,
  `job_requirement_specification` text NOT NULL,
  `job_requirement_specia_requirement` text NOT NULL,
  `job_requirement_organization_description` text NOT NULL,
  `job_requirement_age_bar` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  PRIMARY KEY (`job_requirement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job_requirement`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

CREATE TABLE IF NOT EXISTS `tbl_job_type` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_job_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_benifits`
--

CREATE TABLE IF NOT EXISTS `tbl_master_benifits` (
  `benifit_id` int(11) NOT NULL AUTO_INCREMENT,
  `benifit_name` varchar(100) NOT NULL,
  PRIMARY KEY (`benifit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_master_benifits`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_ownership`
--

CREATE TABLE IF NOT EXISTS `tbl_ownership` (
  `ownership_id` int(11) NOT NULL AUTO_INCREMENT,
  `ownership_name` varchar(100) NOT NULL,
  PRIMARY KEY (`ownership_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_ownership`
--

INSERT INTO `tbl_ownership` (`ownership_id`, `ownership_name`) VALUES
(1, 'Private'),
(2, 'Government');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_type`
--

CREATE TABLE IF NOT EXISTS `tbl_service_type` (
  `service_type` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL COMMENT 'It reflects the nature of jobs such as hot job, regular jobs, corporate jobs etc',
  PRIMARY KEY (`service_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_service_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_sex`
--

CREATE TABLE IF NOT EXISTS `tbl_sex` (
  `sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `sex_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_sex`
--

