-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 05:58 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_fitness`
--

CREATE TABLE `add_fitness` (
  `slno` int(5) NOT NULL,
  `regno` varchar(15) NOT NULL,
  `reg_issue` varchar(20) NOT NULL,
  `fitness_issue` varchar(20) NOT NULL,
  `fitness_expire` varchar(20) NOT NULL,
  `insurance_issue` varchar(20) NOT NULL,
  `insurance_expire` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-07-05 11:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `emergencychat`
--

CREATE TABLE `emergencychat` (
  `slno` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `msg` varchar(767) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `regno` varchar(20) NOT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(10, 'Maruti', '2019-10-07 13:53:32', NULL),
(11, 'Ford', '2019-10-07 14:09:47', NULL),
(12, 'Honda', '2019-10-07 14:09:58', NULL),
(13, 'Hyundai', '2019-10-07 14:10:07', NULL),
(14, 'Mahindra', '2019-10-07 14:10:15', NULL),
(15, 'Tata', '2019-10-07 14:10:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Bod-Uppal, Hyderabad, Telangana', 'gk2.admin@gmail.com', '9533367401');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Anuj Kumar', 'webhostingamigo@gmail.com', '2147483647', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-06-18 10:03:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(11, 'FAQs', 'faqs', '																																								<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">contact above email or phone no for any questions</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(1, 'anuj.lpu1@gmail.com', '2017-06-22 16:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'test@gmail.com', 'Test Test', '2017-06-18 07:44:31', 1),
(2, 'test@gmail.com', '\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilis', '2017-06-18 07:46:05', 1),
(3, 'php@gmail.com', 'Wow its Great ', '2017-07-05 11:08:26', 1),
(4, 'srijithkumar.kt1@gmail.com', 'I had an awesome experience with GK^2.\r\nTheir services are really cool.', '2019-10-05 07:30:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `regno` varchar(100) NOT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `regno`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'Ciaz', 10, 'Coupled with a mild-hybrid tech, the Ciaz petrol returns 21.56kmpl (MT) and 20.28kmpl (AT), while the diesel engine has a milrage at 28.09kmpl. ... Maruti Ciaz features: The Maruti Ciaz gets auto LED headlamps, LED fog lamps, tail lamps with LED inserts on the outside.\r\nMileage (upto): 28.09 kmpl\r\nEngine (upto): 1498 cc\r\nTransmission: Manual/Automatic\r\nBHP: 103.25', 1000, 'Diesel', 2017, 4, 'TS01ED2517', 'Maruti-Suzuki-Ciaz-Exterior-133784.jpg', 'Maruti-Suzuki-Ciaz-Interior-133793.jpg', 'Maruti-Suzuki-Ciaz-Boot-Space-133813.jpg', 'Maruti-Suzuki-Ciaz-Engine-Bay-133817.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 13:56:05', NULL),
(2, 'Baleno', 10, 'Maruti Baleno Review. The Baleno is the 2nd car being sold through Maruti\'s Nexa dealership network, after the S-Cross. ... The Baleno is on offer with two engine options, a 1.3-litre diesel and a 1.2-litre petrol. The petrol is offered with the choice of a manual or an automatic transmission.\r\nMileage (upto): 27.39 kmpl\r\nEngine (upto): 1248 cc\r\nTransmission: Manual/Automatic\r\nService Cost: Rs.3,397/yr', 1000, 'Diesel', 2016, 4, 'TS 07 AB 3636', 'Maruti-Suzuki-Baleno-Right-Front-Three-Quarter-147420.jpg', 'Maruti-Suzuki-Baleno-Dashboard-147413.jpg', 'Maruti-Suzuki-Baleno-Interior-147412.jpg', 'Maruti-Suzuki-Baleno-Boot-Space-154117.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:14:25', NULL),
(3, 'Brezza', 10, 'The Maruti Suzuki Vitara Brezza is currently the bestselling sub-compact SUV in India. Available only with a 1.3-litre diesel engine with both, 5-speed manual and automated manual transmissions, it is an efficient and easy to drive small SUV that also has good driving dynamics when you want to have some fun.\r\nTransmission: Automatic/Manual\r\nEngine (upto): 1248 cc', 800, 'Diesel', 2016, 4, 'HR 26 CU 2499', 'Maruti-Suzuki-Vitara-Brezza-Exterior-95464.jpg', 'Maruti-Suzuki-Vitara-Brezza-Interior-68797.jpg', 'Maruti-Suzuki-Vitara-Brezza-Boot-Space-100257.jpg', 'Maruti-Suzuki-Vitara-Brezza-Engine-Bay-100259.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:17:09', NULL),
(4, 'Swift', 10, 'Maruti Suzuki Swift Features: The Swift is a well-equipped hatchback, particularly in terms of safety. It comes with dual front airbags, anti-lock braking system (ABS) with electronic brakeforce distribution (EBD) and ISOFIX child seat anchors as standard across the range.\r\nMileage (upto): 28.4 kmpl\r\nEngine (upto): 1248 cc\r\nTransmission: Manual/Automatic\r\nService Cost: Rs.4,483/yr', 600, 'Diesel', 2015, 4, 'TS 07 CD 2468', 'Maruti-Suzuki-New-Swift-Exterior-117654.gif', 'Maruti-Suzuki-New-Swift-Interior-117117.jpg', 'Maruti-Suzuki-Swift-Interior-133467.jpg', 'Maruti-Suzuki-Swift-Exterior-128052.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:19:40', NULL),
(5, 'Aspire', 11, 'The Ford Aspire is a feature-packed compact sedan that offers an amazing balance between ride and handling. It gets a new petrol engine that is refined and fuel-efficient, also gets an optional CNG variant.\r\nPrice: Rs. 5.89 Lakhs onwards\r\nFuelType: Petrol, Diesel and CNG\r\nMileage: 16.3 to 26.1 kmpl\r\nEngine: 1194 to 1498 cc', 600, 'Diesel', 2015, 4, 'TS 08 ED 3333', 'ford-aspire-default.jpg-version201907091828.jpg', 'Ford-Aspire-Dashboard-148399.jpg', 'Ford-Aspire-Boot-Space-148401.jpg', 'Ford-Aspire-Engine-Bay-148439.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:23:50', NULL),
(6, 'Ecosport', 11, 'The Ford EcoSport (pronounced ek-ho sport) is a subcompact crossover SUV, originally built in Brazil by Ford Brazil since 2003, at the Camaçari plant. A second generation concept model was launched in 2012, and is also assembled in new factories in India, Thailand, Russia and Romania.', 600, 'Petrol', 2014, 4, 'TS 09 EF 6666', 'Ford-EcoSport-Right-Front-Three-Quarter-159249.jpg', 'Ford-EcoSport-Interior-171492.jpg', 'Ford-EcoSport-Interior-159602.jpg', 'Ford-EcoSport-Rear-Seat-Space-159604.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:26:45', NULL),
(7, 'Figo', 11, 'The fact that the Figo weighs much more than the Maruti doesn\'t help its performance either. ... The Figo also comes with a petrol automatic which a new three cylinder engine from the dragon engine family. It is mated to a 6-speed torque converter and like the old car will come only in the mid spec Titanium variant.', 600, 'Diesel', 2016, 4, 'TS 10 EE 9999', 'Ford-Figo-Right-Front-Three-Quarter-151645.jpg', 'Ford-Figo-Interior-151894.jpg', 'Ford-Figo-Interior-151829.jpg', 'Ford-Figo-Blu-TDCi-166030.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:29:32', NULL),
(8, 'Freestyle', 11, 'Ford Freestyle engine: Based on the upcoming Figo facelift, the Ford Freestyle can be had with two engines - a 1.2-litre petrol (96PS/120Nm) and a 1.5-litre diesel motor (100PS/215Nm). Both engines are mated to a 5-speed manual transmission. ... Between the two, it\'s the petrol engine that feels punchy and smooth.', 800, 'Petrol', 2016, 4, 'TS 09 AB 4545', 'Ford-Freestyle-Right-Front-Three-Quarter-128742.jpg', 'Ford-Freestyle-Dashboard-135526.jpg', 'Ford-Freestyle-Boot-Space-135553.jpg', 'Ford-Freestyle-Engine-Bay-135578.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:32:45', NULL),
(9, 'Jazz', 12, 'Honda Jazz Engine and Mileage: The Honda Jazz 2018 can be had with two engines: a 1.2-litre petrol (90PS/110Nm) and a 1.5-litre diesel (100PS/200Nm) motor. ... The petrol-manual version of the Honda Jazz 2018 returns an ARAI-certified fuel efficiency of 18.2kmpl, whereas the diesel-manual version returns 27.3kmpl.\r\nMileage (upto)?: ?27.3 kmpl	BHP?: ?98.6\r\nEngine (upto)?: ?1498 cc	Transmission?: ?Automatic/Manual', 600, 'Petrol', 2016, 4, 'TS 11 EL 7030', 'Honda-Jazz-Exterior-155808.jpg', 'Honda-Jazz-Interior-131705.jpg', 'Honda-Jazz-Boot-Space-152331.jpg', 'Honda-Jazz-Exterior-152334.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 14:37:32', NULL),
(10, 'Creta', 13, 'The Hyundai Creta is the most feature-loaded compact SUV. It packs a sunroof, powered driver\'s seat, wireless charging and 17-inch wheels, ventilated front seats, AC odour eliminator among others. The 6-speed automatic transmission option is offered with both 1.6-litre petrol and diesel engines.\r\nEngine (upto): 1591 cc\r\nMileage (upto): 22.1 kmpl\r\nTransmission: Manual/Automatic\r\nService Cost: Rs.12,816/yr', 1000, 'Diesel', 2017, 5, 'TS 09 ED 5656', 'Hyundai-Nexo-160188.jpg', 'Hyundai-Creta-Interior-148278.jpg', 'Hyundai-Creta-Interior-148281.jpg', 'Hyundai-Nexo-160187.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 15:23:27', NULL),
(11, 'Grand i10', 13, 'The Grand i10 is powered by a 1.2-liter petrol and a 1.2-liter diesel motor making the force of 83PS/114Nm and 75PS/190Nm respectively. Both the engines come mated to the 5-speed manual transmission with petrol guise featuring the additional convenience of automatic gearbox.\r\nFuel Type: Petrol / Diesel / CNG\r\nTransmission: Manual / Automatic\r\nFuel Capacity: 43 Liters\r\nSeating Capacity: 5', 600, 'Petrol', 2015, 4, 'TS 01 ED 3636', 'Hyundai-Grand-i10-Exterior-167478.jpg', 'Hyundai-Grand-i10-Interior-89953.jpg', 'Hyundai-Grand-i10-Boot-Space-100924.jpg', 'Hyundai-Grand-i10-Engine-Bay-90125.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 15:25:19', NULL),
(12, 'i20', 13, 'The Hyundai i20 is a supermini car and compact suv produced by the South Korean manufacturer Hyundai since 2008. The i20 made its debut at the Paris Motor Show in October 2008, and sits between the i10 and i30. It is a front wheel drive car, and is available in three and five door versions', 600, 'Petrol', 2015, 4, 'TS 14 DD 2580', 'Hyundai-Elite-i20-Right-Front-Three-Quarter-148187.gif', 'Hyundai-Elite-i20-Interior-149573.jpg', 'Hyundai-Elite-i20-Interior-149574.jpg', 'Hyundai-Elite-i20-Rear-view-154137.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 15:27:39', NULL),
(13, 'Verna', 13, 'The base E variant with a petrol engine is priced at Rs 8.08 lakh whereas the corresponding diesel variant costs Rs 9.33 lakh for diesel. ... Hyundai Verna Engine: The Hyundai Verna is available with four engine options: 1.4-litre petrol,1.4-litre diesel, 1.6-litre petrol and 1.6-litre diesel.\r\nMileage (upto): 24.0 kmpl\r\nEngine (upto): 1591 cc\r\nService Cost: Rs.3,762/yr\r\nTransmission: Manual/Automatic', 800, 'Petrol', 2016, 5, 'TS 02 YZ 1234', 'Hyundai-Verna-Badges-110546.jpg', 'Hyundai-Verna-Interior-110557.jpg', 'Hyundai-Verna-Boot-Space-105297.jpg', 'Hyundai-Verna-Interior-110584.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 15:29:48', NULL),
(14, 'E20 Plus', 14, 'The Mahindra e2o, previously Reva NXR, is an urban electric car hatchback manufactured by Mahindra Reva or Reva Electric Vehicles. The e2o is the successor of the REVAi (or G-Wiz as it was known in the UK) and was developed using Reva\'s technology, and has a range of 120 km (75 mi).', 600, 'Petrol', 2018, 4, 'TS 01 AD 2468', 'Mahindra-e2o-Plus-Right-Front-Three-Quarter-84855.jpg', 'Mahindra-e2o-Plus-Dashboard-90026.jpg', 'Mahindra-e2o-Plus-Interior-90031.jpg', 'Mahindra-e2o-Plus-Boot-Space-90032.jpg', '', 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, NULL, 1, '2019-10-07 15:31:40', NULL),
(15, 'KUV 100', 14, 'The KUV stands for a Kool Utility Vehicle. With the KUV100, Mahindra is targeting the urban and dynamic youth. The KUV100 sports stylish dual tone exteriors. The front fascia of the KUV100 features a sleek front grille, a buffed-up bumper and large sweptback headlamps with LED.', 600, 'Diesel', 2016, 4, 'TS 02 BC 8642', 'Mahindra-KUV100-Right-Front-Three-Quarter-64030.jpg', 'Mahindra-KUV100-NXT-Dashboard-138898.jpg', 'Mahindra-KUV100-Boot-Space-64055.jpg', 'Mahindra-KUV100-NXT-Interior-138998.jpg', '', 1, 1, 1, 1, 1, 1, NULL, 1, 1, 1, NULL, NULL, '2019-10-07 15:33:19', NULL),
(16, 'Scorpio', 14, 'Mahindra Scorpio. The Mahindra Scorpio is an SUV manufactured by Mahindra & Mahindra It was the first SUV from the company built for the global market. The Scorpio was conceptualized and designed by the in-house integrated design and manufacturing team of M&M.', 1500, 'Diesel', 2015, 7, 'TS 08 ED 1111', 'Mahindra-Scorpio-Exterior-113863.jpg', 'Mahindra-Scorpio-Dashboard-140334.jpg', 'Mahindra-Scorpio-Interior-140365.jpg', 'Mahindra-Scorpio-Exterior-113066.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2019-10-07 15:35:52', NULL),
(17, 'XUV 500', 14, 'Mahindra has updated the XUV500 for 2018. Now dubbed the \'Plush new XUV500\' it\'s a major change for the car since the facelifted version was launched in ...\r\nPrice?: ?Rs. 12.37 Lakhs onwards	Engine?: ?2179 cc\r\nTransmission?: ?Manual and Automatic	Seating Capacity?: ?7', 1500, 'Diesel', 2015, 7, 'TS 07 ED 8484', 'Mahindra-XUV500-Facelift-Exterior-125537.jpg', 'Mahindra-XUV500-Facelift-Exterior-125573.jpg', 'Mahindra-XUV500-Facelift-Exterior-125543.jpg', 'Mahindra-XUV500-Facelift-Exterior-125572.jpg', '', 1, 1, 1, 1, 1, 1, NULL, NULL, 1, 1, NULL, 1, '2019-10-07 15:38:51', NULL),
(18, 'Hexa', 15, 'Tata Hexa, the premium SUV from the Indian automakers comes as a replacement to the Aria. The SUV has been built with Tata\'s new design language – HorizonNext. ... In terms of dimensions, the Hexa measures 4,764mm in length, 1,895mm in length and 1,780mm in height. The vehicle has a long wheelbase of 2,850mm', 1200, 'Diesel', 2017, 7, 'TS 09 BF 5050', 'Tata-Hexa-Right-Front-Three-Quarter-82315.jpg', 'Tata-Hexa-Dashboard-82348.jpg', 'Tata-Hexa-Interior-82369.jpg', 'Tata-Hexa-Exterior-90261.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 1, '2019-10-07 15:42:13', NULL),
(19, 'Nexon', 15, 'The Tata Nexon is powered by a set of new-age powertrains: a 110PS/170Nm, 1.2-litre turbocharged petrol engine; and a 110PS/260Nm, 1.5-litre turbocharged diesel engine. ... The Nexon is the only car in its segment to offer an AMT with both petrol and diesel powertrains.\r\nFuel Type: Petrol / Diesel\r\nMileage (ARAI) kmpl: 17 Kmpl to 21 Kmpl\r\nEngine Displacement: 1198 CC / 1497 CC\r\nTransmission: Manual / Automatic', 800, 'Diesel', 2018, 4, 'TS 02 ED 1212', 'Tata-Nexon-Exterior-172215.jpg', 'Tata-Nexon-Dashboard-108004.jpg', 'Tata-Nexon-Boot-Space-133411.jpg', 'Tata-Nexon-Interior-104029.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 15:47:49', NULL),
(20, 'Tiago', 15, 'Tata Tiago Engine and Mileage: The Tiago is available with two engine options: a 1.2-litre (85PS/114Nm) petrol engine and a 1.05-litre (70PS/140Nm) diesel motor. The petrol engine has a fuel efficiency of 23.84kmpl, while the diesel engine has a claimed mileage of 27.28kmpl', 600, 'Petrol', 2016, 4, 'MH 01 CP6490', 'Tata-Tiago-Driving-101843.jpg', 'Tata-Tiago-Interior-101829.jpg', 'Tata-Tiago-Driving-101841.jpg', 'Tata-Tiago-Engine-Bay-84020.jpg', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-10-07 15:50:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_fitness`
--
ALTER TABLE `add_fitness`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencychat`
--
ALTER TABLE `emergencychat`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_fitness`
--
ALTER TABLE `add_fitness`
  MODIFY `slno` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergencychat`
--
ALTER TABLE `emergencychat`
  MODIFY `slno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
