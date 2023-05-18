-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 04:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `pass`, `phone`, `address`, `username`, `name`) VALUES
(1, '1234', '9966774455', 'kalkaji', 'amit.saha', 'amit');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(100) NOT NULL,
  `name` varchar(32) NOT NULL,
  `family_mem` int(32) NOT NULL,
  `cost` int(100) NOT NULL,
  `package` varchar(32) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(32) DEFAULT 'wait for confirmation',
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` varchar(12) DEFAULT NULL,
  `tour_date` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `name`, `family_mem`, `cost`, `package`, `contact`, `address`, `status`, `customer_id`, `booking_date`, `tour_date`) VALUES
(5, 'Shahid', 4, 8000, 'Gandhi Smiriti', '55667788', 'badarpur', 'confirm', 1, NULL, NULL),
(6, 'amit', 1, 2000, 'Gandhi Smiriti', '44556677', 'malviya nagar', 'confirm', 1, NULL, NULL),
(8, 'ashish', 5, 10000, 'Akshardham Temple', '99556664', 'sangam vihar gali no12 ', 'cancel', 7, NULL, NULL),
(12, 'ashish', 1, 2000, 'Jama Masjid', '99556664', 'sangam vihar', 'wait for confirmation', 7, '11/05/23', '2023-05-13'),
(13, 'ashish', 1, 2000, 'Purana Quila', '99556664', 'sangam vihar', 'wait for confirmation', 7, '11/05/23', '2023-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(100) NOT NULL,
  `name` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `name`, `pass`, `phone`, `address`, `gender`, `email`) VALUES
(1, 'amit', '1234', '999778882', 'saket', 'male', 'amit@gamil.com'),
(3, 'Shahid', '1234', '9667519717', 'Badarpur', 'male', 'mohd47149@gmail.com'),
(6, 'amit', 'mnbv', '9667519718', 'badarpur09', 'male', 'amit08867@gamil.com'),
(7, 'ashish', '1234', '44556688', 'sangam vihar', 'male', 'ashish@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `email` varchar(100) NOT NULL,
  `contact` varchar(32) DEFAULT NULL,
  `feed` varchar(250) DEFAULT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`email`, `contact`, `feed`, `name`) VALUES
('ashish@gmail.com', '', 'this is a cool website', 'ashish'),
('mohan@gmail.com', '9988776655', 'this is nice wbsite', 'mohan'),
('mohd47149@gmail.com', '', 'This is very wonderful website, it provide very good services\r\nEnjoy a lot,\r\nI recommend this website  for travel service\r\nThanks', 'Shahid');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `cost` int(200) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `cost`, `description`) VALUES
(1, 'Akshardham Temple', 1600, 'Akshardham Temple, also known as Swaminarayan Akshardham, is a Hindu temple located in New Delhi, India. The temple was inaugurated in 2005 and is dedicated to Lord Swaminarayan, a Hindu spiritual leader and founder of the Swaminarayan Sampraday.The temple is renowned for its stunning architecture, intricate carvings, and beautiful surroundings. It is a popular tourist destination and attracts millions of visitors every year. However, photography and videography are strictly prohibited inside the temple complex.'),
(2, 'Gandhi Smiriti', 1000, '\r\nGandhi Smriti is a museum located in New Delhi, India, dedicated to Mahatma Gandhi. It is situated in the house where Gandhi spent his last 144 days of life. The museum displays exhibits showcasing the life, philosophy, and teachings of Gandhi, and has a library, an art gallery, and a research center. It is a peaceful and serene place that provides visitors with an insight into the life and work of Gandhi, his principles of non-violence, truth, and simplicity.'),
(3, 'Humayun Tomb', 2000, '\r\nThe Humayun\'s Tomb is a mausoleum located in New Delhi, India, and was commissioned by Humayun\'s wife, Empress Bega Begum, in the 16th century. The tomb is a masterpiece of Mughal architecture and is constructed with red sandstone and white marble, featuring intricate carvings and delicate filigree work. The tomb is surrounded by beautiful gardens, fountains, and water channels, making it a serene and picturesque location. It is a UNESCO World Heritage Site and is considered to be one of the finest examples of Mughal architecture in India.'),
(4, 'Indiagate', 1000, 'India Gate is a war memorial located in New Delhi, India. It was built in memory of the Indian soldiers who died fighting for the British Empire in World War I and the Afghan Wars. The monument is a 42-meter tall structure made of red sandstone and granite and has an archway inscribed with the names of over 13,000 Indian and British soldiers who died in these wars. It is surrounded by lush green lawns and fountains and is illuminated in the evening. It is a popular spot for tourists and locals to visit and pay their respects to the fallen soldiers.'),
(5, 'Jama Masjid', 1500, '\r\nJama Masjid is one of the largest and most iconic mosques in India, located in Old Delhi. It was commissioned by Mughal emperor Shah Jahan in the 17th century and is constructed with red sandstone and white marble. The mosque has three gateways, four towers, and two minarets, and can accommodate over 25,000 worshippers at a time. The mosque features exquisite carvings and intricate designs, and the courtyard is surrounded by a beautiful arcade. It is a popular tourist attraction and a significant place of worship for Muslims.'),
(6, 'Lal Quila', 2000, 'The Red Fort, also known as Lal Qila, is a historic fort located in Old Delhi, India. Commissioned by Mughal emperor Shah Jahan in the 17th century, the fort is constructed with red sandstone and features stunning architectural details, including intricate carvings and delicate filigree work. The fort has several buildings and structures, including the Diwan-i-Am, Diwan-i-Khas, and the iconic Nahr-i-Bihisht, a canal that runs through the fort. The fort is also the site of the annual Independence Day celebrations in India, with the prime minister hoisting the national flag from the fort\'s ramparts.'),
(7, 'Lotus Temple', 800, 'The Lotus Temple, also known as the Bahai House of Worship, is a magnificent temple located in New Delhi, India. It is designed in the shape of a lotus flower and is made of white marble, surrounded by nine reflective pools that create a serene and peaceful atmosphere. The temple is open to people of all religions and faiths, and visitors can meditate or offer prayers in the silence of the main hall. The Lotus Temple is a popular tourist destination and attracts millions of visitors every year for its unique architecture and spiritual atmosphere.'),
(8, 'Purana Quila', 2000, 'Purana Qila, also known as the Old Fort, is a historic fort located in New Delhi, India. The fort is believed to have been built by Mughal emperor Humayun in the 16th century on the site of the ancient city of Indraprastha. The fort is constructed with red sandstone and has three main entrances, each with ornate carvings and beautiful designs. The fort features several structures and buildings, including the Qila-i-Kuhna Mosque and the Sher Mandal, a two-story pavilion that served as Humayun\'s library. The fort is a popular tourist attraction and a significant part of Delhi\'s rich history.'),
(9, 'Qutub Minar', 2500, 'Qutub Minar is a towering minaret located in New Delhi, India, and is considered to be one of the tallest brick minarets in the world. It was commissioned by Qutb-ud-din Aibak, the founder of the Delhi Sultanate, in the 12th century and is constructed with red sandstone and marble. The minaret features intricate carvings and inscriptions, including verses from the Quran. The complex also includes several other structures, including the Quwwat-ul-Islam Mosque and the Iron Pillar, a 7th-century iron pillar that stands as a testament to ancient Indian metallurgy. Qutub Minar is a UNESCO World Heritage Site and a popular tourist destination.'),
(10, 'SafdarJang Tomb', 1000, 'Safdarjung\'s Tomb is a mausoleum located in New Delhi, India, and is considered to be the last monumental tomb garden built in the Mughal style. The tomb was commissioned by Nawab Shuja-ud-Daula, the son of Safdarjung, in the 18th century and is constructed with red and buff sandstone. The tomb features intricate carvings and inscriptions, and the surrounding garden is adorned with fountains and water channels. The tomb is a peaceful and serene location that provides visitors with an insight into the Mughal architectural style and history.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
