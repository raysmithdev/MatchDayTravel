-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2014 at 07:15 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `awayfrom_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `division_id` int(1) NOT NULL,
  `division_name` varchar(30) NOT NULL,
  `teams` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`division_id`, `division_name`, `teams`) VALUES
(2, 'Championship', 24),
(3, 'League One', 24),
(4, 'League Two', 24),
(5, 'Conference', 24),
(1, 'Premier League', 20);

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE IF NOT EXISTS `fixtures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hometeam_id` int(11) NOT NULL,
  `awayteam_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `isactive` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `hometeam_id`, `awayteam_id`, `date`, `date_created`, `isactive`) VALUES
(21, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1'),
(22, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1'),
(23, 16, 1, '2014-09-11 15:00:00', '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE IF NOT EXISTS `journey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `leave_time` time NOT NULL,
  `arrive_time` time NOT NULL,
  `team_id` int(11) NOT NULL,
  `fixture_id` int(11) NOT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `From` varchar(50) DEFAULT NULL,
  `to` varchar(50) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `people` int(1) NOT NULL,
  `totalCost` varchar(10) NOT NULL,
  `returning` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`id`, `user_id`, `postcode`, `address`, `leave_time`, `arrive_time`, `team_id`, `fixture_id`, `desc`, `From`, `to`, `create_date`, `duration`, `distance`, `people`, `totalCost`, `returning`) VALUES
(7, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '00:00:00', '00:00:00', 2, 21, 'dsadsad', 'Bournemouth,Bournemouth', 'Cattell Road,Birmingham', '2014-09-10 17:01:25', 177, 161, 4, '57.08', 1),
(8, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '00:00:00', '00:00:00', 2, 21, 'dsadsad', 'Bournemouth,Bournemouth', 'Cattell Road,Birmingham', '2014-09-10 17:01:30', 177, 161, 4, '57.08', 1),
(9, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '00:00:00', '00:00:00', 2, 21, 'dsadsad', 'Bournemouth,Bournemouth', 'Cattell Road,Birmingham', '2014-09-10 17:04:56', 177, 161, 4, '57.08', 1),
(10, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '00:00:00', '00:00:00', 2, 21, 'dfasfasf', 'Bournemouth,Bournemouth', 'Cattell Road,Birmingham', '2014-09-10 17:05:52', 177, 161, 3, '57.08', 1),
(11, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '00:00:00', '00:00:00', 2, 21, 'dfasfasf', 'Bournemouth,Bournemouth', 'Cattell Road,Birmingham', '2014-09-10 17:05:55', 177, 161, 3, '57.08', 1),
(12, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '06:25:00', '08:55:00', 2, 21, 'dfasfasf', 'Bournemouth,Bournemouth', 'Cattell Road,Birmingham', '2014-09-10 17:10:26', 177, 161, 3, '57.08', 1),
(13, 60, 'B9 4RL', 'St Andrews Stadium, Birmingham', '13:05:00', '13:05:00', 2, 23, 'dsadsadsa', 'Bournemouth,Bournemouth', 'Bolina Road,London', '2014-09-10 17:15:23', 136, 110, 9, '39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `ground_name` varchar(30) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `division` int(1) DEFAULT '1',
  `create_time` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `ground_name`, `address`, `postcode`, `division`, `create_time`, `user_id`) VALUES
(1, 'AFC Bournemouth ', 'Goldsands Stadium', 'Dean Court, Bournemouth, Dorset', 'BH7 7AF', 2, '0000-00-00 00:00:00', NULL),
(2, 'Birmingham City ', 'St Andrews', 'St Andrews Stadium, Birmingham', 'B9 4RL', 2, '0000-00-00 00:00:01', NULL),
(3, 'Blackburn Rovers ', 'Ewood Park', 'Ewood Park, Blackburn, Lancashire', 'BB2 4JF', 2, '0000-00-00 00:00:02', NULL),
(4, 'Blackpool ', 'Bloomfield Road', 'Blackpool, Lancashire', 'FY1 6JJ', 2, '0000-00-00 00:00:03', NULL),
(5, 'Bolton Wanderers ', 'Macron Stadium', 'Burnden Way, Lostock, Bolton', 'BL6 6JW', 2, '0000-00-00 00:00:04', NULL),
(6, 'Brentford ', 'Griffin Park', 'Griffin Park, Braemar Road, Brentford, Middlesex', 'TW8 0NT', 2, '0000-00-00 00:00:05', NULL),
(7, 'Brighton & Hove Albion ', 'American Express Community Sta', 'The American Express Community Stadium, Village Way, Brighton', 'BN1 9BL', 2, '0000-00-00 00:00:06', NULL),
(8, 'Cardiff City ', 'Cardiff City Stadium', 'Leckwith, Cardiff', 'CF11 8AZ', 2, '0000-00-00 00:00:07', NULL),
(9, 'Charlton Athletic ', 'The Valley', 'Floyd Road, Charlton, London', 'SE7 8BL', 2, '0000-00-00 00:00:08', NULL),
(10, 'Derby County ', 'iPRO Stadium', 'iPRO Stadium, Pride Park, Derby', 'DE24 8XL', 2, '0000-00-00 00:00:09', NULL),
(11, 'Fulham ', 'Craven Cottage', 'Craven Cottage, Stevenage Road, London', 'SW6 6HH', 2, '0000-00-00 00:00:10', NULL),
(12, 'Huddersfield Town ', 'John Smiths Stadium', 'The John Smiths Stadium, Stadium Way, Huddersfield', 'HD1 6PX', 2, '0000-00-00 00:00:11', NULL),
(13, 'Ipswich Town ', 'Portman Road', 'Portman Road, Ipswich', 'IP1 2DA', 2, '0000-00-00 00:00:12', NULL),
(14, 'Leeds United ', 'Elland Road', 'Elland Road, Leeds', 'LS11 0ES', 2, '0000-00-00 00:00:13', NULL),
(15, 'Middlesbrough ', 'Riverside Stadium', 'Middlehaven Way, Middlesbrough', 'TS3 6RS', 2, '0000-00-00 00:00:14', NULL),
(16, 'Millwall ', 'The Den', 'Zampa Road, London', 'SE16 3LN', 2, '0000-00-00 00:00:15', NULL),
(17, 'Norwich City ', 'Carrow Road', 'Carrow Road, Norwich', 'NR1 1JE', 2, '0000-00-00 00:00:16', NULL),
(18, 'Nottingham Forest ', 'City Ground', 'Pavilion Road, West Bridgeford, Nottingham', 'NG2 5FJ', 2, '0000-00-00 00:00:17', NULL),
(19, 'Reading ', 'Madejski Stadium', 'Madejski Stadium, Reading, Berkshire', 'RG2 0FL', 2, '0000-00-00 00:00:18', NULL),
(20, 'Rotherham United ', 'New York Stadium', 'New York Way, Rotherham', 'S60 1AH', 2, '0000-00-00 00:00:19', NULL),
(21, 'Sheffield Wednesday ', 'Hillsborough', 'Hillsborough, Sheffield,', 'S6 1SW', 2, '0000-00-00 00:00:20', NULL),
(22, 'Watford ', 'Vicarage Road', 'Vicarage Road, Watford, Hertfordshire', 'WD18 0ER', 2, '0000-00-00 00:00:21', NULL),
(23, 'Wigan Athletic ', 'DW Stadium', 'Newtown, Wigan, Lancashire', 'WN5 0UZ', 2, '0000-00-00 00:00:22', NULL),
(24, 'Wolverhampton Wanderers ', 'Molineux Stadium', 'Waterloo Road, Wolverhampton, West Midlands', 'WV1 4QR', 2, '0000-00-00 00:00:23', NULL),
(25, 'Barnsley ', 'Oakwell', 'Grove Street, Barnsley, South Yorkshire', 'S71 1ET', 3, '0000-00-00 00:00:00', NULL),
(26, 'Bradford City ', 'Coral Windows Stadium', 'Valley Parade, Bradford, West Yorkshire', 'BD8 7DY', 3, '0000-00-00 00:00:01', NULL),
(27, 'Bristol City ', 'Ashton Gate', 'Ashton Road, Bristol', 'BS3 2EJ', 3, '0000-00-00 00:00:02', NULL),
(28, 'Chesterfield ', 'The Proact Stadium', '1866 Sheffield Road, Chesterfield', 'S41 8NZ', 3, '0000-00-00 00:00:03', NULL),
(29, 'Colchester United ', 'Weston Homes Community Stadium', 'United Way, Colchester, Essex', 'CO4 5UP', 3, '0000-00-00 00:00:04', NULL),
(30, 'Coventry City ', 'Ricoh Arena', 'Sky Blue Lodge, Leamington Road, Ryton-on-Dunsmore, Coventry', 'CV6 3FL', 3, '0000-00-00 00:00:05', NULL),
(31, 'Crawley Town ', 'The Checkatrade.com Stadium', 'Winfield Way, Crawley', 'RH11 9RX', 3, '0000-00-00 00:00:06', NULL),
(32, 'Crewe Alexandra ', 'The Alexandra Stadium, Gresty ', 'Gresty Road, Crewe', 'CW2 6EB', 3, '0000-00-00 00:00:07', NULL),
(33, 'Doncaster Rovers ', 'Keepmoat Stadium', 'Stadium Way, Lakeside, Doncaster', 'DN4 5JW', 3, '0000-00-00 00:00:08', NULL),
(34, 'Fleetwood Town ', 'Highbury Stadium', 'Park Avenue, Fleetwood', 'FY7 6TX', 3, '0000-00-00 00:00:09', NULL),
(35, 'Gillingham ', 'MEMS Priestfield Stadium', 'Redfern Avenue, Gillingham, Kent', 'ME8 4QT', 3, '0000-00-00 00:00:10', NULL),
(36, 'Leyton Orient ', 'Matchroom Stadium', 'Brisbane Road, Leyton, London', 'E10 5NF', 3, '0000-00-00 00:00:11', NULL),
(37, 'Milton Keynes Dons ', 'stadiummk', 'Stadium Way, Milton Keynes', 'MK1 1ST', 3, '0000-00-00 00:00:12', NULL),
(38, 'Notts County ', 'Meadow Lane', 'Meadow Lane, Nottingham', 'NG2 3HJ', 3, '0000-00-00 00:00:13', NULL),
(39, 'Oldham Athletic ', 'SportsDirect.com Park', 'Oldham', 'OL1 2PB', 3, '0000-00-00 00:00:14', NULL),
(40, 'Peterborough United ', 'London Road', 'London Road, Peterborough', 'PE2 8AL', 3, '0000-00-00 00:00:15', NULL),
(41, 'Port Vale ', 'Vale Park', 'Hamil Roda, Burslem, Stoke-on-Trent, Staffordshire', 'ST6 1AW', 3, '0000-00-00 00:00:16', NULL),
(42, 'Preston North End ', 'Deepdale', 'Sir Tom Finney Way, Preston, Lancashire', 'PR1 6RU', 3, '0000-00-00 00:00:17', NULL),
(43, 'Rochdale ', 'Spotland Stadium', 'Sandy Lane, Rochdale', 'OL11 5DS', 3, '0000-00-00 00:00:18', NULL),
(44, 'Scunthorpe United ', 'Glanford Park', 'Jack Brownsword Way, Scunthorpe, North Lincolnshire', 'DN15 8TD', 3, '0000-00-00 00:00:19', NULL),
(45, 'Sheffield United ', 'Bramall Lane', 'Bramall Lane, Sheffield', 'S2 4SU', 3, '0000-00-00 00:00:20', NULL),
(46, 'Swindon Town ', 'County Ground', 'County Road, Swindon, Wiltshire', 'SN1 2ED', 3, '0000-00-00 00:00:21', NULL),
(47, 'Walsall ', 'Banks''s Stadium', 'Bescot Crescent, Walsall, West Midlands', 'WS1 4SA', 3, '0000-00-00 00:00:22', NULL),
(48, 'Yeovil Town ', 'Huish Park', 'Lufton Way, Yeovil, Somerset', 'BA22 8YF', 3, '0000-00-00 00:00:23', NULL),
(49, 'Arsenal FC', ' Emirates Stadium', ' Highbury House, 75 Drayton Park, London', 'N5 1BU', 1, '0000-00-00 00:00:00', 0),
(50, 'Aston Villa FC', 'Villa Park', ' Villa Park, Trinity Rd, Birmingham', 'B6 6HE', 1, '0000-00-00 00:00:01', 0),
(51, 'Burnley FC', 'Turf Moor', ' Harry Potts Way, Burnley', 'BB10 4BX', 1, '0000-00-00 00:00:02', 0),
(52, 'Chelsea FC', 'Stamford Bridge', ' Fulham Road, London', 'SW6 1HS', 1, '0000-00-00 00:00:03', 0),
(53, 'Crystal Palace FC', 'Selhurst Park', 'Selhurst Park, London', 'SE25 6PU', 1, '0000-00-00 00:00:04', 0),
(54, 'Everton FC', 'Goodison Park', ' Goodison Road, Liverpool', 'L4 4EL', 1, '0000-00-00 00:00:05', 0),
(55, 'Hull City FC', 'KC Stadium', 'The Circle, Walton St, Hull', 'HU3 6HU', 1, '0000-00-00 00:00:06', 0),
(56, 'Leicester City FC', 'King Power Stadium ', ' Filbert Way, Leicester', 'LE2 7FL', 1, '0000-00-00 00:00:07', 0),
(57, 'Liverpool FC', 'Anfield', ' Anfield Road, Liverpool', 'L4 0TH', 1, '0000-00-00 00:00:08', 0),
(58, 'Manchester City  FC', 'Etihad Stadium ', ' Sportcity, Rowsley St, Manchester', 'M11 3FF', 1, '0000-00-00 00:00:09', 0),
(59, 'Manchester United FC', 'Old Trafford', ' Sir Matt Busby Way, Manchester', 'M16 0RA', 1, '0000-00-00 00:00:10', 0),
(60, 'Newcastle United FC', 'St James'' Park', ' St. James'' Park, Newcastle-upon-Tyne', 'NE1 4ST', 1, '0000-00-00 00:00:11', 0),
(61, 'Queens Park Rangers FC', 'Loftus Road Stadium', 'South Africa Road, London', 'W12 7PA', 1, '0000-00-00 00:00:12', 0),
(62, 'Southampton FC', 'St Mary''s Stadium', 'Britannia Rd, Southampton', 'SO14 5FP', 1, '0000-00-00 00:00:13', 0),
(63, 'Stoke City FC', 'Britannia Stadium', ' Stanley Matthews Way, Stoke On Trent', 'ST4 4EG', 1, '0000-00-00 00:00:14', 0),
(64, 'Sunderland FC', 'Stadium Of Light', 'Stadium Of Light, Sunderland', 'SR5 1SU', 1, '0000-00-00 00:00:15', 0),
(65, 'Swansea City FC', 'Liberty Stadium', ' Morfa, Swansea', 'SA1 2FA', 1, '0000-00-00 00:00:16', 0),
(66, 'Tottenham Hotspur FC', 'White Hart Lane', 'Bill Nicholson Way, 748 High Rd, Tottenham, London', 'N17 0AP', 1, '0000-00-00 00:00:17', 0),
(67, 'West Bromwich Albion FC', ' The Hawthorns', 'Halfords Lane, West Bromwich, West Midlands', 'B71 4LF', 1, '0000-00-00 00:00:18', 0),
(68, 'West Ham United FC', 'Boleyn Ground', 'Green St, Upton Park, London', 'E13 9AZ', 1, '0000-00-00 00:00:19', 0),
(69, 'Accrington Stanley FC', 'Store First Stadium', 'Livingstone Rd, Accrington, Lancashire', 'BB5 5BX', 4, '0000-00-00 00:00:00', 0),
(70, 'AFC Wimbledon FC', 'The Cherry Red Records Stadium', 'Jack Goodchild Way, 422a Kingston Road, Kingston Upon Thames, Surrey', 'KT1 3PB', 4, '0000-00-00 00:00:01', 0),
(71, 'Burton Albion FC', 'Pirelli Stadium', ' Pirelli Stadium, Burton Upon Trent, Staffs', 'DE13 0AR', 4, '0000-00-00 00:00:02', 0),
(72, 'Bury FC', 'JD Stadium', 'Gigg Lane, Bury, Lancashire', 'BL9 9HR', 4, '0000-00-00 00:00:03', 0),
(73, 'Cambridge United FC', 'R Costings Abbey Stadium', 'Newmarket Road, Cambridge', 'CB5 8LN', 4, '0000-00-00 00:00:04', 0),
(74, 'Carlisle United FC', 'Brunton Park', ' Warwick Road, Carlisle', 'CA1 1LL', 4, '0000-00-00 00:00:05', 0),
(75, 'Cheltenham Town FC', 'Abbey Business Stadium', 'Whaddon Road, Cheltenham', 'GL52 5NA', 4, '0000-00-00 00:00:06', 0),
(76, 'Dagenham & Redbridge FC', 'London Borough of Barking and ', ' Dagenham, Essex', 'RM10 7XL', 4, '0000-00-00 00:00:07', 0),
(77, 'Exeter City FC', 'St James'' Park', 'Stadium Way, Exeter, Devon', 'EX4 6PX', 4, '0000-00-00 00:00:08', 0),
(78, 'Hartlepool United FC', 'Victoria Park', ' Clarence Road, Hartlepool', 'TS24 8BZ', 4, '0000-00-00 00:00:09', 0),
(79, 'Luton Town FC', 'Kenilworth Road', ' 1 Maple Road, Luton', 'LU4 8AW', 4, '0000-00-00 00:00:10', 0),
(80, 'Mansfield Town FC', 'One Call Stadium', 'Quarry Lane, Mansfield', 'NG18 5DA', 4, '0000-00-00 00:00:11', 0),
(81, 'Morecambe FC', 'Globe Arena', 'Christie Way, Westgate, Morecambe', 'LA4 4TB', 4, '0000-00-00 00:00:12', 0),
(82, 'Newport County FC', 'Rodney Parade', 'Rodney Parade, Newport, South Wales', 'NP19 0UU', 4, '0000-00-00 00:00:13', 0),
(83, 'Northampton Town FC', 'Sixfields Stadium', 'Sixfields Stadium, Northampton', 'NN5 5QA', 4, '0000-00-00 00:00:14', 0),
(84, 'Oxford United FC', 'Kassam Stadium', 'Grenoble Road, Oxford', 'OX4 4XP', 4, '0000-00-00 00:00:15', 0),
(85, 'Plymouth Argyle FC', 'Home Park', ' Plymouth', 'PL2 3DQ', 4, '0000-00-00 00:00:16', 0),
(86, 'Portsmouth FC', 'Fratton Park', ' Frogmore Road, Portsmouth', 'PO4 8RA', 4, '0000-00-00 00:00:17', 0),
(87, 'Shrewsbury Town FC', 'Greenhous Meadow', ' Oteley Road, Shrewsbury', 'SY2 6ST', 4, '0000-00-00 00:00:18', 0),
(88, 'Southend United FC', 'Roots Hall', 'Victoria Ave, Southend-On-Sea', 'SS2 6NQ', 4, '0000-00-00 00:00:19', 0),
(89, 'Stevenage FC', 'Lamex Stadium', 'Broadhall Way, Stevenage, Herts', 'SG2 8RH', 4, '0000-00-00 00:00:20', 0),
(90, 'Tranmere Rovers  FC', 'Prenton Park', 'Prenton Rd West, Birkenhead', 'CH42 9PY', 4, '0000-00-00 00:00:21', 0),
(91, 'Wycombe Wanderers FC', 'Adams Park', 'Hillbottom Road, High Wycombe', 'HP12 4HJ', 4, '0000-00-00 00:00:22', 0),
(92, 'York City  FC', 'Bootham Crescent', 'Bootham Crescent, York', 'YO30 7AQ', 4, '0000-00-00 00:00:23', 0),
(93, 'AFC Telford United', 'New Bucks Head', 'Watling Street, Wellington, Telford', 'TF1 2TU', 5, '0000-00-00 00:00:00', 0),
(94, 'Aldershot Town', 'The EBB Stadium', 'High St, Aldershot, Hampshire', 'GU11 1TW', 5, '0000-00-00 00:00:01', 0),
(95, 'Alfreton Town', 'Impact Arena', 'North Street, Alfreton, Derbyshire', 'DE55 7FZ', 5, '0000-00-00 00:00:02', 0),
(96, 'Altrincham', 'Moss Lane', 'Moss Lane, Altrincham, Cheshire', 'WA15 8AP', 5, '0000-00-00 00:00:03', 0),
(97, 'Barnet', 'Hive Stadium', 'Camrose Avenue, Edgware', 'HA8 6AG', 5, '0000-00-00 00:00:04', 0),
(98, 'Braintree Town', 'Cressing Road', 'Cressing Road Stadium, Braintree, Essex', 'CM7 3RD', 5, '0000-00-00 00:00:05', 0),
(99, 'Bristol Rovers', 'Memorial Stadium', ' Filton Avenue, Horfield, Bristol', 'BS7 0BF', 5, '0000-00-00 00:00:06', 0),
(100, 'Chester', 'Deva Stadium', 'Bumpers Lane, Chester', 'CH1 4LT', 5, '0000-00-00 00:00:07', 0),
(101, 'Dartford', 'Princes Park', 'Grassbanks, Darenth Rd, Dartford, Kent,', 'DA1 1RT', 5, '0000-00-00 00:00:08', 0),
(102, 'Dover Athletic', 'Crabble Athletic Ground', 'Lewisham Road, River, Dover, Kent', 'CT17 0JB', 5, '0000-00-00 00:00:09', 0),
(103, 'Eastleigh', 'Silverlake Stadium', 'Ten Acres, Stoneham Lane, Eastleigh, Hampshire', 'SO50 9HT', 5, '0000-00-00 00:00:10', 0),
(104, 'Forest Green Rovers', 'The New Lawn', 'Nympsfield Road, Forest Green, Nailsworth', 'GL6 0ET', 5, '0000-00-00 00:00:11', 0),
(105, 'Gateshead', 'Gateshead International Stadiu', 'Neilson Road, Gateshead', 'NE10 0EF', 5, '0000-00-00 00:00:12', 0),
(106, 'Grimsby Town', 'Blundell Park', 'Blundell Park, Cleethorpes', 'DN35 7PY', 5, '0000-00-00 00:00:13', 0),
(107, 'Halifax Town', 'The Shay', 'The Shay, Halifax,', 'HX1 2YS', 5, '0000-00-00 00:00:14', 0),
(108, 'Kidderminster Harriers', 'Aggborough Stadium', 'Hoo Road, Kidderminster,', 'DY10 1NB', 5, '0000-00-00 00:00:15', 0),
(109, 'Lincoln City', 'Sincil Bank Stadium', 'Sincil Bank Stadium, Lincoln,', 'LN5 8LD', 5, '0000-00-00 00:00:16', 0),
(110, 'Macclesfield Town', 'Moss Rose', 'London Road, Macclesfield', ' SK11 7SP', 5, '0000-00-00 00:00:17', 0),
(111, 'Nuneaton Town', 'Liberty Way Stadium', 'Attleborough Fields Industrial Estate, Nuneaton, Warwickshire', ' CV11 6RR', 5, '0000-00-00 00:00:18', 0),
(112, 'Southport', 'Haig Avenue', 'Haig Avenue, Southport', 'PR8 6JZ', 5, '0000-00-00 00:00:19', 0),
(113, 'Torquay United', 'Plainmoor', 'Plainmoor, Torquay, Devon', 'TQ1 3PS', 5, '0000-00-00 00:00:20', 0),
(114, 'Welling United', 'Park View Road', 'Welling, Kent', 'DA16 1SY', 5, '0000-00-00 00:00:21', 0),
(115, 'Woking', 'Kingfield Stadium', 'Kingfield, Woking, Surrey', 'GU22 9AA', 5, '0000-00-00 00:00:22', 0),
(116, 'Wrexham', 'Glyndwr University Racecourse ', 'Mold Road, Wrexham', 'LL11 2AH', 5, '0000-00-00 00:00:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_id` int(11) DEFAULT '2',
  `user_fname` varchar(35) NOT NULL,
  `user_lname` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `user_dob` varchar(35) DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `register_time` datetime NOT NULL,
  `isActive` enum('1','0') NOT NULL DEFAULT '0',
  `team` int(3) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `usertype_id`, `user_fname`, `user_lname`, `password`, `user_dob`, `user_email`, `register_time`, `isActive`, `team`) VALUES
(60, 2, 'Marius', 'Drenea', 'ZG1pMTk5Mg==', '09/02/1992', 'dreneamarius@gmail.com', '2014-08-26 17:18:58', '1', 2),
(66, 2, 'Hayley', 'Hall', 'bWFybmll', 'null', 'hayleyjanelegg@gmail.com', '2014-09-02 16:51:15', '1', 1),
(67, 2, 'Corbin', 'Spicer', 'dHVybnRhYmxl', '02/06/1993', 'corbin68@googlemail.com', '2014-09-02 21:36:25', '1', 1),
(68, 2, 'Gary', 'Spicer', 'MXdpY2tlZA==', '24/10/1966', 'garyspicer66@gmail.com', '2014-09-04 09:16:18', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
