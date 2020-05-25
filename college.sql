-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 05:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--
CREATE DATABASE IF NOT EXISTS `college` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `college`;

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `advisor_id` smallint(5) NOT NULL,
  `title` enum('Dr','Prof','Mr','Mrs','Ms') COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`advisor_id`, `title`, `fname`, `lname`, `room`, `phone`, `email`) VALUES
(1, 'Dr', 'Craig', 'Randall', 'O-100', '619-387-1015', 'crandall@sdcc.edu'),
(2, 'Prof', 'Elizabeth', 'Highton', 'O-101', '619-387-1016', 'ehighton@sdcc.edu'),
(3, 'Mr', 'Albert', 'Jerome', 'O-102', '619-387-1017', 'ajerome@sdcc.edu'),
(4, 'Mrs', 'Emily', 'Rodriguez', 'O-103', '619-387-1018', 'erodriguez@sdcc.edu'),
(5, 'Dr', 'Hong', 'Liu', 'O-104', '619-387-1019', 'hliu@sdcc.edu'),
(6, 'Prof', 'Sara', 'Savarski', 'O-105', '619-387-1020', 'ssavarshi@sdcc.edu'),
(7, 'Dr', 'Omar', 'Ahned', 'O-106', '619-387-1021', 'oahned@sdcc.edu');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `student_id` smallint(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` char(2) NOT NULL DEFAULT 'CA',
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL DEFAULT 'USA',
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `advisor_id` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`student_id`, `fname`, `lname`, `gender`, `birth_date`, `address`, `city`, `state`, `postal_code`, `country`, `phone`, `email`, `advisor_id`) VALUES
(1, 'Sofia', 'Faverman', 'F', '1959-03-11', '11774 Windcrest Lane', 'San Diego', 'CA', '92128', 'USA', '619-985-0170', 'sofiasd@yahoo.com', NULL),
(2, 'Emma', 'Lee', 'F', '1995-06-14', '123 Main St', 'San Diego', 'CA', '92101', 'USA', '619-222-0123', 'elee@gmail.com', 1),
(3, 'Jacob', 'Borders', 'M', '1985-08-25', '7 Circle Lane', 'Encinitas', 'CA', '92023', 'USA', '858-667-8963', 'jacobtheborder@hotmail.com', 4),
(4, 'Jesus', 'Garcia', 'M', '1990-07-11', '33 Bonita Drive', 'Chula Vista', 'CA', '91909', 'USA', '619-767-5523', NULL, 3),
(5, 'Joel', 'Bill', 'M', '1960-01-01', '88 King St', 'San Diego', 'CA', '92124', 'USA', '619-207-2653', 'jb@bignote.com', 2),
(6, 'Hugh', 'Goldstein', 'M', '1978-06-15', '925 Fairview Park Rd', 'Santee', 'CA', '92071', 'USA', '619-583-8789', 'hgold@momoney.org', NULL),
(7, 'Katie', 'Eckert', 'F', '2000-12-31', '10 Princeton Dr', 'National City', 'CA', '91950', 'USA', '619-585-3267', 'keck@natlcity.com', 3),
(8, 'Marianne', 'Berguin', 'F', '1998-06-19', '180 Cannoneer Ct', 'Pacific Beach', 'CA', '92109', 'USA', '619-297-4255', 'mbg@gmail.com', 7),
(9, 'Shawn', 'Boulward', 'F', '1955-01-02', '5689 Windsor Ave', 'San Diego', 'CA', '92152', 'USA', '619-599-0027', 'sbward@anxiety.com', 2),
(10, 'Jean', 'Zadro', 'F', '1968-03-04', '345 Edgepark Cir', 'Chula Vista', 'CA', '19909', 'USA', '619-591-1157', 'jzardo@irs.gov', 3),
(11, 'Lan', 'Geng', 'M', '1975-05-06', '170 Fincastle Dr', 'Poway', 'CA', '92128', 'USA', '858-236-5665', 'geng_L@nfl.com', NULL),
(12, 'Larry', 'Telfer', 'M', '1983-06-07', '6 Overlook Rd', 'La Jolla', 'CA', '92037', 'USA', '858-233-7511', 'l-tel@notell.biz', NULL),
(13, 'Ashwin', 'Vohra', 'M', '1992-08-09', '120 Devonshire Ct', 'Encinitas', 'CA', '92023', 'USA', '858-324-6599', 'avohra@uptou.org', 4),
(14, 'Cleta', 'McElaney', 'F', '1995-10-11', '3 Wythe St', 'San Diego', 'CA', '92126', 'USA', '619-604-5858', 'c-mc@generous.com', 2),
(15, 'Joyce', 'Siegel', 'F', '1996-12-13', '2678 George Mason Dr', 'Ocean Beach', 'CA', '92107', 'USA', '619-674-2356', 'joyce@siegel.com', 7),
(16, 'Ahjamu', 'Ibtehal', 'M', '1981-02-15', '10 S Washington St', 'La Jolla', 'CA', '92037', 'USA', '858-677-6531', 'aibtehal@mpm.edu', NULL),
(17, 'Ryan', 'Asfar', 'M', '1982-03-16', '678 Grumman Pl', 'Chula Vista', 'CA', '19909', 'USA', '619-671-3344', 'ryan_asfar@biz.biz', 3),
(18, 'Chinonso', 'Austin', 'M', '1985-04-17', '10 Winwood Loop', 'Poway', 'CA', '92128', 'USA', '858-335-3745', 'caustin@caustic.com', NULL),
(19, 'Caitlyn', 'Hardy', 'F', '1986-05-18', '35 Steeple Chase Ln', 'San Diego', 'CA', '92126', 'USA', '619-685-3699', 'hardy_c@pliers.net', 2),
(20, 'Nicole', 'Dutton', 'F', '1989-06-19', '1223 Duke St', 'Bisbee', 'AZ', '80605', 'USA', '619-687-3872', 'ndutton@birdhouse.com', 5),
(21, 'Oscar', 'Prince', 'M', '1991-07-21', '67 Cornwell St', 'El Cajon', 'CA', '92109', 'USA', '619-672-9162', 'prince@royal.com', NULL),
(22, 'Stephan', 'Elraheb', 'M', '1992-07-22', '451 Bonham Circle', 'Prescott', 'AZ', '83504', 'USA', '619-670-5143', 'selraheb@wotsup.com', 5),
(23, 'Dana', 'Larsen', 'F', '1993-07-23', '789 Champlain Cir', 'Encinitas', 'CA', '92023', 'USA', '858-324-6558', 'dl@em.com', 4),
(24, 'Ginetta', 'Gant', 'F', '1995-08-31', '1 Martin Ln', 'Pacific Beach', 'CA', '92109', 'USA', '619-297-8345', 'ggant@gigante.com', 7),
(25, 'Lisa', 'Sharpe', 'F', '1994-08-25', '567 Remington Rd', 'Ocean Beach', 'CA', '92107', 'USA', '619-733-4877', 'lsharpe@notdull.com', 7),
(80, 'Moises', 'Fernandez', 'M', '1992-08-20', '4 Beverly Dr', 'Chula Vista', 'CA', '19909', 'USA', '619-661-8635', 'mfernandez@absinthe.com', 3),
(81, 'Jalpit', 'Matson', 'M', '1953-07-16', '320 Columbia Pike', 'Coronado', 'CA', '92118', 'USA', '619-675-4213', 'jalpit_m@pineapple.org', NULL),
(82, 'Khrystyna', 'Tilson', 'F', '1969-07-11', '15 Avenida de los Zorillos', 'Ensenada', 'BC', '21603', 'MX', '619-585-6321', 'ktilson@nowhere.com', 6),
(83, 'Curtis', 'Dawson', 'M', '1992-07-05', '44 Hughes Ct', 'Poway', 'CA', '92128', 'USA', '858-236-5798', 'dawson@yukon.com', NULL),
(84, 'WenLi', 'Wall', 'F', '1993-03-31', '1678 Masonic View Ave', 'San Diego', 'CA', '92127', 'USA', '619-674-1257', 'wenli@thewall.com', 2),
(85, 'Stephanie', 'Caputo', 'F', '1994-04-01', '26 Fairfax St', 'La Mesa', 'CA', '91941', 'USA', '619-660-2563', 's_caputo@autobuyer.com', NULL),
(86, 'Carlis', 'Thomas', 'F', '1996-05-02', '543 Rosemary Ln', 'Ramona', 'CA', '92065', 'USA', '619-663-7812', 'cthomas@homeward.org', NULL),
(87, 'Carla', 'Reid', 'F', '1998-06-03', '413 S Jefferson St', 'La Jolla', 'CA', '92037', 'USA', '619-677-8396', 'carla_reid@reed.com', NULL),
(88, 'Joseph', 'Stavish', 'M', '2000-07-05', '441 Yoakum Pkwy', 'San Diego', 'CA', '92101', 'USA', '619-624-5896', 'j.stavish@stavish.com', 1),
(89, 'Anna', 'Hernandez', 'F', '2001-08-07', '655 El Pollo del Mar', 'Tijuana', 'BC', '21331', 'MX', '619-675-9218', 'anna_hernandez@icecream.org', 6),
(90, 'Rebekah', 'Alexander', 'F', '1988-10-12', '43 Buttercup Pl', 'Encinitas', 'CA', '92023', 'USA', '619-234-5860', 'ralex@alltime.org', 4),
(91, 'Maria', 'Alvarez', 'F', '1986-09-14', '5876 Seminary Rd', 'Del Mar', 'CA', '92014', 'USA', '858-350-3535', 'malvarez@3keys.com', NULL),
(92, 'Anthony', 'Scott', 'M', '1985-08-16', '65 Duke St', 'Rancho Bernardo', 'CA', '92128', 'USA', '858-312-4026', 'ascott@greatscott.com', NULL),
(93, 'Jennifer', 'Locanda', 'F', '1991-03-10', '543 Mosby St', 'National City', 'CA', '91950', 'USA', '619-585-3670', 'jen@locanda.com', 3),
(94, 'Jaehee', 'Wang', 'M', '1993-04-08', '1508 Clover Hill Rd', 'San Diego', 'CA', '92101', 'USA', '619-624-7753', 'jwang@yahoo.com', 1),
(95, 'Marcel', 'Enescu', 'M', '1991-02-14', '190 Wallwood Dr', 'Ramona', 'CA', '92065', 'USA', '619-663-5068', 'menescu@raphsody.com', NULL),
(96, 'Tony', 'Downey', 'M', '1997-02-10', '13 Magnolia Grove Dr', 'Ocean Beach', 'CA', '92107', 'USA', '619-279-3486', 'tdowney@cerritos.net', 7),
(97, 'Xifeng', 'Lau', 'M', '1999-01-15', '1276 Brocketts Crossing', 'Pine Valley', 'CA', '91962', 'USA', '619-285-3678', 'xlau@zee2.com', NULL),
(98, 'McCall', 'Cheney', 'M', '1958-01-28', '53 Cedar Ridge Dr', 'Del Mar', 'CA', '92104', 'USA', '619-350-6126', 'mccall@sdunderwater.com', NULL),
(99, 'Mihir', 'Subramanian', 'M', '1965-06-30', '670 Parkwood Ct', 'Santee', 'CA', '92071', 'USA', '619-858-7989', 'msubramanian@zerodown.org', NULL),
(100, 'Andrew', 'Lee', 'M', '1998-09-21', '1401 Sly Fox Ln', 'San Diego', 'CA', '92103', 'USA', '619-770-4478', 'alee@blee.com', 1),
(101, 'Prince', 'Flitcroft', 'M', '1989-10-31', '78 Battlefield Dr', 'San Diego', 'CA', '92104', 'USA', '619-775-1562', 'pflitcroft@royal.com', 1),
(102, 'Donald', 'Hanby', 'M', '1990-04-15', '1334 Archwood Way', 'Chula Vista', 'CA', '19909', 'USA', '619-755-6352', 'dhanby@hanby.com', 3),
(103, 'Kirsten', 'Riccardi', 'F', '1995-05-05', '332 Crawford Ct', 'El Cajon', 'CA', '92109', 'USA', '619-631-7217', 'kriccardi@xonote.com', NULL),
(104, 'Atonye', 'Morris', 'F', '1989-06-08', '67 Commerce Ct', 'San Diego', 'CA', '92103', 'USA', '619-334-2565', 'amorris@catchersmitt.com', 1),
(105, 'Cong', 'Nguyen', 'M', '1993-07-12', '160 Spriggs Rd', 'Poway', 'CA', '92128', 'USA', '619-335-6047', 'cnguyen@myhome.com', NULL),
(106, 'Danila', 'Bennett', 'F', '1990-08-16', '908 Bridgehaven Ct', 'Rancho Bernardo', 'CA', '92128', 'USA', '619-355-7899', 'dbennett@tony.com', NULL),
(107, 'Sonia', 'Olson', 'F', '1980-10-20', '19 Salem Rd', 'San Diego', 'CA', '92104', 'USA', '619-223-9532', 'sonia_olson@songbook.org', 1),
(108, 'Michael', 'Stanton', 'M', '1991-12-24', '6732 10th St', 'National City', 'VA', '91950', 'USA', '619-585-0306', 'mstanton@scranton.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `scholarship_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(7,2) UNSIGNED NOT NULL,
  `semester` enum('Fall','Spring') COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`scholarship_id`, `organization`, `amount`, `semester`, `year`) VALUES
('S01', 'Chancellor\'s Scholarship', '800.00', 'Spring', 2016),
('S02', 'Classified Senate Scholarship', '600.00', 'Spring', 2016),
('S03', 'San Diego Business Council Award', '500.00', 'Spring', 2016),
('S04', 'California State Business Council Award', '300.00', 'Fall', 2015),
('S05', 'Honor Society  Award', '500.00', 'Fall', 2015),
('S06', 'Academic Senate Scholorship', '750.00', 'Spring', 2016),
('S07', 'Alfonso Perez Memorial Scholarship', '1000.00', 'Fall', 2015),
('S08', 'Chemical Engineers  Association', '500.00', 'Spring', 2016),
('S09', 'Allen Rogert Memorial Scholarship', '1000.00', 'Fall', 2015),
('S10', 'San Diego County Veterinary Medicine', '500.00', 'Spring', 2016),
('S11', 'Asian Pacific Islander American Studies Scholarshi', '600.00', 'Spring', 2016),
('S12', 'MKL Memorial Scholoarship', '1000.00', 'Spring', 2016),
('S13', 'California Coast Credit Union', '500.00', 'Fall', 2015),
('S14', 'Associated Students Leadership Award', '750.00', 'Fall', 2015),
('S15', 'Board of Trustees Scholarship', '500.00', 'Spring', 2016),
('S16', 'Iranian-American Scholarship', '800.00', 'Fall', 2015),
('S17', 'President\'s Award for Academic Excellence', '750.00', 'Fall', 2015),
('S18', 'Kaiser Permanente Medical Scholarship', '750.00', 'Spring', 2016),
('S19', 'Languages Department Scholarship', '250.00', 'Fall', 2015),
('S20', 'Veterans Award', '500.00', 'Fall', 2015),
('S21', 'San Diego Track Club', '300.00', 'Spring', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships_students`
--

CREATE TABLE `scholarships_students` (
  `id` smallint(5) NOT NULL,
  `scholarship_id` varchar(10) NOT NULL,
  `student_id` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholarships_students`
--

INSERT INTO `scholarships_students` (`id`, `scholarship_id`, `student_id`) VALUES
(1, 'S01', 60),
(2, 'S02', 75),
(3, 'S03', 83),
(4, 'S04', 96),
(5, 'S05', 102),
(6, 'S06', 72),
(7, 'S07', 75),
(8, 'S08', 60),
(9, 'S09', 106),
(10, 'S10', 92),
(11, 'S11', 99),
(12, 'S12', 67),
(13, 'S13', 82),
(14, 'S14', 79),
(15, 'S15', 88),
(16, 'S16', 65),
(17, 'S17', 92),
(18, 'S18', 67),
(19, 'S19', 82),
(20, 'S20', 59),
(21, 'S21', 77);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`advisor_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `advisor_id` (`advisor_id`);

--
-- Indexes for table `scholarships_students`
--
ALTER TABLE `scholarships_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisors`
--
ALTER TABLE `advisors`
  MODIFY `advisor_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `student_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `scholarships_students`
--
ALTER TABLE `scholarships_students`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`advisor_id`) REFERENCES `advisors` (`advisor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
