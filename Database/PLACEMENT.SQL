SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE IF NOT EXISTS `hlogin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  `Branch` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hlogin`
--

INSERT INTO `hlogin` (`Id`, `Name`, `Username`, `Password`, `Email`, `Question`, `Answer`, `Branch`) VALUES
(1, 'Nagaraj P', 'Nagaraj', '123456', 'fastnag@gmail.com', 'What is your fav spot?', 'Bangalore', 'ISE');

-- --------------------------------------------------------

--
-- Table structure for table `plogin`
--

CREATE TABLE IF NOT EXISTS `plogin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `plogin`
--

INSERT INTO `plogin` (`Id`, `Name`, `Username`, `Password`, `Email`, `Question`, `Answer`) VALUES
(1, 'Rohini', 'rohini', 'rohini', 'rh@gmail.com', 'What is your fav spot?', 'mangalore');

-- --------------------------------------------------------

--
-- Table structure for table `prilogin`
--

CREATE TABLE IF NOT EXISTS `prilogin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prilogin`
--

INSERT INTO `prilogin` (`Id`, `Name`, `Username`, `Password`, `Email`, `Question`, `Answer`) VALUES
(1, 'Suresh', 'suresh', '123456', 'suresh@gmail.com', 'What is your fav spot?', 'madikeri');

-- --------------------------------------------------------

--
-- Table structure for table `slogin`
--

CREATE TABLE IF NOT EXISTS `slogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `USN` varchar(10) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USN` (`USN`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `slogin`
--

INSERT INTO `slogin` (`id`, `Name`, `USN`, `PASSWORD`, `Email`, `Question`, `Answer`) VALUES
(1, 'veda', '1cg13is401', '123', 'veda', 'What is your fav spot?', 'circket'),
(2, 'Veda', '1cg12is096', 'veda', 'v@gmil.com', 'what is your fav spot?', 'mysore'),
(3, 'rama', '1cg12cs001', 'rama', 'rama@gmail.com', 'What is your fav dish?', 'chicken'),
(4, 'Vishruth Harithsa', '1cg12is094', 'CUTESTAR22', 'har', 'What is your nickname?', ''),
(5, 'Armstrong', '1cg12is000', 'asdfg', 'armstrong@neil.com', 'What is your fav spot?', 'New York'),
(8, 'Harry', '1cg12is007', 'asdfg', 'asdfg@gmail.com', 'What is your fav spot?', 'Manali'),
(9, '', '', '', '', '', ''),
(10, 'Harithsa', '1cg12is009', 'qwerty', 'harithsa@aol.com', 'What is your nickname?', 'Gunda'),
(11, 'Vishruth Harithsa', '1cg12is011', 'qwerty', 'astroman225@gmail.com', 'What is your fav spot?', 'Manali');
