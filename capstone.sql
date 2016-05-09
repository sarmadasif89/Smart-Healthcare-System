-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 04:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE IF NOT EXISTS `billing_details` (
  `billing_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doctor_fees` varchar(100) DEFAULT NULL,
  `medication_charges` varchar(100) DEFAULT NULL,
  `test_charges` varchar(100) DEFAULT NULL,
  `total_due` varchar(100) DEFAULT NULL,
  `total_paid` varchar(100) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `late_payment_charge` varchar(100) DEFAULT NULL,
  `insurance_covered` varchar(100) DEFAULT NULL,
  `total_due_for_patient` varchar(100) DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `last_added_by` int(11) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_by_last_ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`billing_det_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zipcode` varchar(45) DEFAULT NULL,
  `medicalspeciality` varchar(100) DEFAULT NULL,
  `hospital` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `firstName`, `lastName`, `phone`, `email`, `address`, `city`, `state`, `zipcode`, `medicalspeciality`, `hospital`, `type`, `added_time`, `ip`) VALUES
(1, 'Pragnesh', 'Patel', '210-586-2905', 'p@gmail.com', '1035 Southern Artery', 'Quincy', 'MA', '02169', 'Cardiology', 'Valley Care Medical Center', 'Visiting', '2016-05-03 14:05:46', '::1'),
(2, 'Sarmad', 'Asif', '510-396-8400', 's@gmail.com', '1321 Webster Blvd', 'Alameda', 'CA', '94501', 'Radiology', 'Kaiser Permanente', 'Visiting', '2016-05-03 14:05:46', '::1'),
(3, 'Peter', 'Richardson', '510-369-2589', 'prich@gmail.com', '1200 Alamedan Ave', 'San Jose', 'CA', '95136', 'Neurology', 'California Hospital Medical Center', 'Permanent', '2016-05-04 23:24:30', '127.0.0.1'),
(4, 'Mathew', 'Hadden', '970-366-2966', 'mhadden@gmail.com', '297 Kraken St ', 'Houston', 'TX', '77553', 'Gastroenterology', 'Memorial Hermann', 'Permanent', '2016-05-04 23:32:58', '127.0.0.1'),
(5, 'Regina', 'Felangi', '832-296-4444', 'r_felangi@gmail.com', '1 Greenway Plaza', 'Houston', 'TX', '77993', 'General Physician', 'Kaiser Permanente', 'Visiting', '2016-05-04 23:53:08', '127.0.0.1'),
(6, 'Andrew', 'Bosman', '510-696-8749', 'andrew_b@gmail.com', '123 North First St.', 'San Jose', 'CA', '95136', 'Urology', 'Century City Hospital', 'Visiting', '2016-05-06 15:29:01', '127.0.0.1'),
(7, 'Galendar', 'Singh', '123-456-7890', 'galensingh@gmail.com', '125 Kingwood', 'New York City', 'NY', '95268', 'Radiology', 'New York Methodist Hospital', 'Permanent', '2016-05-06 15:30:42', '127.0.0.1'),
(8, 'Bert', 'Macklin', '585-698-7895', 'bmacklin@gmail.com', '2000 The Woods Way ', 'Pawnee', 'IN', '98469', 'Pediatrics', 'Century City Hospital', 'Visiting', '2016-05-06 17:17:34', '127.0.0.1'),
(9, 'Pragnesh', 'Patel', '123456789', 'pp@gmail.com', 'absjd', 'Boston', 'MA', '48596', 'Gastroenterology', 'Kaiser Permanente', 'Visiting', '2016-05-06 18:39:22', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_details`
--

CREATE TABLE IF NOT EXISTS `doctors_details` (
  `doc_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `specialties` varchar(100) DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `last_added_by` int(11) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_by_last_ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`doc_det_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doctors_details`
--

INSERT INTO `doctors_details` (`doc_det_id`, `name`, `specialties`, `added_by`, `last_added_by`, `added_time`, `updated_time`, `updated_by_last_ip`) VALUES
(1, 'Gupta', 'Heart', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `hospital_id` int(10) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospital_id`, `hospital_name`) VALUES
(1, 'Kaiser Permanente'),
(2, 'California Hospital Medical Center'),
(3, 'Valley Care Medical Center'),
(4, 'Century City Hospital'),
(5, 'Kentfield Rehabilitation Hospital'),
(6, 'Memorial Hermann'),
(7, 'AO Fox Memorial Hospital'),
(8, 'UHS Binghamton General Hospital'),
(9, 'New York Methodist Hospital'),
(10, 'St Peters Hospital'),
(11, 'St Marys Hospital'),
(12, 'St Joseph Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `medication_details`
--

CREATE TABLE IF NOT EXISTS `medication_details` (
  `med_det_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `medicines` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `direction` varchar(100) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `current` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`med_det_id`),
  KEY `medication_details_ibfk_1` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `medication_details`
--

INSERT INTO `medication_details` (`med_det_id`, `patient_id`, `medicines`, `date`, `quantity`, `direction`, `added_time`, `ip`, `current`) VALUES
(1, 1, 'Brufen Tablets', '0000-00-00 00:00:00', '2', 'Morning', '2016-05-03 14:59:13', '::1', '0'),
(2, 2, 'Xanax', '0000-00-00 00:00:00', '1', 'Night', '2016-05-03 16:01:19', '::1', '1'),
(4, 1, 'Panadol', '0000-00-00 00:00:00', '2', 'Morning, Evening', '2016-05-06 18:48:18', '127.0.0.1', '1'),
(7, 3, 'Brufen Tablets', '0000-00-00 00:00:00', '1', 'Morning, Evening', '2016-05-07 08:17:20', '127.0.0.1', '0'),
(8, 3, 'Influenza', NULL, '2', 'Morning, Evening, Night', '2016-05-07 08:34:07', '127.0.0.1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patientno` int(45) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `emergencyName` varchar(45) DEFAULT NULL,
  `emergencyPhone` varchar(45) DEFAULT NULL,
  `emergencyRelation` varchar(45) DEFAULT NULL,
  `blood_group` varchar(45) DEFAULT NULL,
  `race` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `marital_status` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `home_phone` varchar(45) DEFAULT NULL,
  `work_phone` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `insuranceProvider` varchar(45) DEFAULT NULL,
  `insuranceType` varchar(45) DEFAULT NULL,
  `insuranceCardNo` varchar(45) DEFAULT NULL,
  `insurancePhone` varchar(45) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `lastvisit_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patientno`, `firstName`, `middleName`, `lastName`, `emergencyName`, `emergencyPhone`, `emergencyRelation`, `blood_group`, `race`, `gender`, `dob`, `marital_status`, `address`, `home_phone`, `work_phone`, `email`, `insuranceProvider`, `insuranceType`, `insuranceCardNo`, `insurancePhone`, `added_time`, `ip`, `lastvisit_id`) VALUES
(1, 123059457, 'Pragnesh', 'G', 'Patel', 'Tania', '000-000-0000', 'Mother', 'A+', 'Asian', 'Male', '1993-1-8', 'Single', '1035 Southern Artery', '500-300-8000', '000-000-0000', 'p@gmail.com', 'ISO', 'PPO', '258800396', '970-800-5500', '2016-05-03 13:43:26', '::1', NULL),
(2, 267168921, 'Pragnesh', 'G', 'Patel', 'Garry', '000-000-0000', 'Friend', 'A+', 'White', 'Female', '1973-8-17', 'Married', '1035 Southern Artery', '130-550-5500', '000-000-0000', 'p@gmail.com', 'NY Insurance', 'PPO', '100289332', '312-300-9586', '2016-05-03 13:43:26', '::1', NULL),
(3, 882168920, 'Brian', 'K', 'Philips', 'Elizabeth Yard', '5103698425', 'Wife', 'A+', 'White', 'Male', '1970-2-30', 'Married', '1035 Northern Artery', '278-589-6969', '278-589-6969', 'brian_p@gmail.com', 'Kaiser Permenante', 'PPO', '258987458', '510-888-9000', '2016-05-06 00:54:15', '127.0.0.1', 13),
(4, 601123456, 'Ken', 'J', 'Adams', 'Bran Adams', '9002149000', 'Brother', 'A+', 'White', 'Male', '1986-11-27', 'Single', '1321 Alamedan St Alameda, CA 94501', '5103968596', '5103968596', 'kenadams@gmail.com', 'United Health Care', 'PPO', '500214988', '510-396-2587', '2016-05-07 14:00:24', '127.0.0.1', NULL),
(5, 679100990, 'Samuel', 'L', 'Jackson', 'Kevin L Jackson', '510-368-4120', 'Son', 'O-', 'Black or African American', 'Male', '1980-5-10', 'Married', '2002 Kings Street, Hollywood, CA 90210', '500-200-2800', '500-200-2800', 'sljackson@hotmail.com', 'United Health Care', 'PPO', '100963125', '220-808-9000', '2016-05-07 18:25:58', '127.0.0.1', NULL),
(6, 828787007, 'Kevin', '', 'Spacey', 'Micheal Kelly', '100-200-3000', 'Personal Assistant', 'AB+', 'White', 'Male', '1959-7-24', 'Single', 'Hollywood Plaza, Beverely Hills CA, 90210', '200-360-7000', '200-360-7000', 'kevinspacey@gmail.com', 'Hollywood Insurance', 'PPO', '1000500', '999-555-2000', '2016-05-07 18:35:01', '127.0.0.1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testsreports`
--

CREATE TABLE IF NOT EXISTS `testsreports` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `test` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `visit_id` int(10) DEFAULT NULL,
  `precautions` varchar(250) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `recent` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `testsreports`
--

INSERT INTO `testsreports` (`id`, `test`, `datetime`, `visit_id`, `precautions`, `doctor_id`, `patient_id`, `recent`) VALUES
(1, 'Blood Test', '2016-05-07 10:46:59', 13, ' 12hr fasting', 8, 3, '1'),
(2, 'Urine Test', '2016-05-07 10:54:59', 13, ' Drink only water', 8, 3, '1'),
(3, 'HB test', '2016-05-07 10:56:40', 13, 'Nothin ', 8, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  `hospital` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `fullname`, `password`, `email`, `active`, `hospital`) VALUES
(6, 'Pragnesh', '202cb962ac59075b964b07152d234b70', 'p@gmail.com', '1', 'Valley Care Medical Center'),
(7, 'Sarmad Asif', '21232f297a57a5a743894a0e4a801fc3', 'sarmadasif89@gmail.com', '1', 'Kaiser Permanente'),
(8, 'Galendar Singh', '21232f297a57a5a743894a0e4a801fc3', 'galendar@gmail.com', '1', 'St Joseph Hospital'),
(10, 'David Miller', '21232f297a57a5a743894a0e4a801fc3', 'david@gmail.com', '1', 'California Hospital Medical Center'),
(17, 'Steve Smith', '21232f297a57a5a743894a0e4a801fc3', 'steve@gmail.com', '1', 'Valley Care Medical Center'),
(18, 'EEEE', '21232f297a57a5a743894a0e4a801fc3', 'eee@gmail.com', '1', 'New York Methodist Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `visit_details`
--

CREATE TABLE IF NOT EXISTS `visit_details` (
  `visit_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `doc_det_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `hospital_name` varchar(100) DEFAULT NULL,
  `hospital_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `visit_reason` varchar(255) DEFAULT NULL,
  `added_by` varchar(100) DEFAULT NULL,
  `last_added_by` int(11) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_by_last_ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`visit_details_id`),
  KEY `patient_id` (`patient_id`),
  KEY `doc_det_id` (`doc_det_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `visit_details`
--

INSERT INTO `visit_details` (`visit_details_id`, `patient_id`, `doc_det_id`, `date`, `hospital_name`, `hospital_address`, `doctor_name`, `visit_reason`, `added_by`, `last_added_by`, `added_time`, `updated_time`, `updated_by_last_ip`) VALUES
(1, 1, 1, '2016-03-24 00:00:00', 'JFK', 'New York', 'Gupta', 'Blood Check Up', NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, '2016-03-10 00:00:00', 'CITY Hospital', 'Downtown Boston', 'Gary Singh', 'Check Up', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visit_reason`
--

CREATE TABLE IF NOT EXISTS `visit_reason` (
  `visit_reason_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) DEFAULT NULL,
  `hospital_id` int(10) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `symptoms` varchar(255) DEFAULT NULL,
  `conditions` varchar(45) DEFAULT NULL,
  `visittype` varchar(150) DEFAULT NULL,
  `precautions_taken_prior_to_visit` varchar(255) DEFAULT NULL,
  `visiting_doctor` varchar(45) DEFAULT NULL,
  `added_time` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`visit_reason_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `visit_reason`
--

INSERT INTO `visit_reason` (`visit_reason_id`, `patient_id`, `hospital_id`, `reason`, `symptoms`, `conditions`, `visittype`, `precautions_taken_prior_to_visit`, `visiting_doctor`, `added_time`, `ip`) VALUES
(1, 1, 1, '  Blood Test', 'None', 'Normal', 'Appointment', 'Fasting  ', 'Dr. Regina Felangi', '2016-05-03 14:25:27', '::1'),
(2, 1, 1, 'General checkup', 'Low bloodpressure, sweating, dehydration', 'Normal', 'Walk-in', ' salt, blood pressure medicine', 'Dr. Regina Felangi', '2016-05-05 06:45:03', '127.0.0.1'),
(3, 1, 1, 'Accident', 'Bleeding, Faintness', 'Immediate Attention', 'Emergency', ' Pain killing injection', 'Dr. Regina Felangi', '2016-05-05 07:08:09', '127.0.0.1'),
(4, 2, 1, 'Accident', 'Deep Wounds', 'Immediate Attention', 'Emergency', 'Pain killer', 'Dr. Regina Felangi', '2016-05-06 13:58:45', '127.0.0.1'),
(5, 2, 9, 'Nausea', 'Nausea', 'Normal', 'Walk-in', 'None', 'Dr. Galendar Singh', '2016-05-06 18:44:50', '127.0.0.1'),
(6, 1, 9, 'Check up', 'None', 'Normal', 'Appointment', 'Nothing', 'Dr. Sarmad Asif', '2016-05-07 05:14:18', '127.0.0.1'),
(7, 3, 9, ' Cough, Flu ', 'Fever', 'Normal', 'Walk-in', 'flu medicines ', 'Dr. Galendar Singh', '2016-05-07 05:30:10', '127.0.0.1'),
(10, 3, 1, ' Nausea, Vomitting ', 'Dizzyness', 'Immediate Attention', 'Walk-in', 'Anti Nauseatic pills ', 'Dr. Regina Felangi', '2016-05-07 08:04:59', '127.0.0.1'),
(11, 3, 1, ' Regular Checkup', 'None', 'Normal', 'Appointment', 'Annual Check ups', 'Dr. Regina Felangi', '2016-05-07 10:22:00', '127.0.0.1'),
(12, 3, 1, ' Annual Checkup', 'None', 'Normal', 'Appointment', 'Annual Check up ', 'Dr. Sarmad Asif', '2016-05-07 10:27:58', '127.0.0.1'),
(13, 3, 1, 'Weekly Check up', 'None', 'Normal', 'Appointment', ' 4 hr fasting', 'Dr. Regina Felangi', '2016-05-07 10:46:21', '127.0.0.1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `medication_details`
--
ALTER TABLE `medication_details`
  ADD CONSTRAINT `medication_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `visit_details`
--
ALTER TABLE `visit_details`
  ADD CONSTRAINT `visit_details_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`),
  ADD CONSTRAINT `visit_details_ibfk_2` FOREIGN KEY (`doc_det_id`) REFERENCES `doctors_details` (`doc_det_id`);

--
-- Constraints for table `visit_reason`
--
ALTER TABLE `visit_reason`
  ADD CONSTRAINT `visit_reason_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
