-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Oca 2022, 21:34:31
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `its`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`AdminID`, `Username`, `Password`) VALUES
(1, 'mbuse.cakar', '1245');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `itemborrowing`
--

CREATE TABLE `itemborrowing` (
  `iBorrowingID` int(11) NOT NULL,
  `itemRequestID` int(11) NOT NULL,
  `ApprovalDate` date NOT NULL DEFAULT current_timestamp(),
  `ReturnDate` date NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `itemborrowing`
--

INSERT INTO `itemborrowing` (`iBorrowingID`, `itemRequestID`, `ApprovalDate`, `ReturnDate`, `Description`) VALUES
(1, 3, '2022-01-08', '2022-01-11', ''),
(2, 2, '2022-01-06', '2022-01-09', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `itemrequest`
--

CREATE TABLE `itemrequest` (
  `ItemRequestID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `RequestDate` datetime NOT NULL DEFAULT current_timestamp(),
  `DesiredDate` date NOT NULL,
  `Response` tinyint(1) DEFAULT NULL,
  `Description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `itemrequest`
--

INSERT INTO `itemrequest` (`ItemRequestID`, `UserID`, `ProductID`, `RequestDate`, `DesiredDate`, `Response`, `Description`) VALUES
(1, 1, 1, '2021-12-23 17:31:42', '2021-12-30', 0, NULL),
(2, 14, 3, '2022-01-08 20:33:31', '2022-01-09', NULL, NULL),
(3, 1, 2, '2022-01-08 20:34:34', '2022-01-08', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `items`
--

CREATE TABLE `items` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Brand` varchar(32) NOT NULL,
  `Model` varchar(32) NOT NULL,
  `Category` varchar(32) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `items`
--

INSERT INTO `items` (`ProductID`, `Name`, `Brand`, `Model`, `Category`, `Quantity`, `StatusID`, `Description`) VALUES
(1, 'Camera', 'Creative', 'E-112', 'Photo & Camera', 1, 2, NULL),
(2, 'Drone', 'DJI', 'MINI-SE', 'Drones', 1, 2, NULL),
(3, 'Computer', 'MSI', 'GF63 thin 8SC', 'Computers', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roomborrowing`
--

CREATE TABLE `roomborrowing` (
  `rBorrowingID` int(11) NOT NULL,
  `RoomRequestID` int(11) NOT NULL,
  `ApprovalDate` date NOT NULL DEFAULT current_timestamp(),
  `ReturnDate` date NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roomrequest`
--

CREATE TABLE `roomrequest` (
  `RoomRequestID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `RequestDate` datetime NOT NULL DEFAULT current_timestamp(),
  `DesiredDate` date NOT NULL,
  `Response` tinyint(1) DEFAULT NULL,
  `Description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `roomrequest`
--

INSERT INTO `roomrequest` (`RoomRequestID`, `UserID`, `RoomID`, `RequestDate`, `DesiredDate`, `Response`, `Description`) VALUES
(1, 1, 1, '2021-12-23 17:31:25', '2021-12-31', 0, NULL),
(2, 14, 2, '2022-01-08 20:34:04', '2022-01-09', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(11) NOT NULL,
  `RoomNumber` varchar(16) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomNumber`, `StatusID`, `Description`) VALUES
(1, 'YA-1', 2, NULL),
(2, 'YA-2', 2, NULL),
(3, 'M001', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `status`
--

INSERT INTO `status` (`StatusID`, `Name`) VALUES
(1, 'Defective'),
(2, 'Unattached'),
(3, 'Taken');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(32) NOT NULL,
  `LastName` varchar(32) NOT NULL,
  `PhoneNumber` bigint(11) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `StudentNumber` int(9) NOT NULL,
  `Faculty` varchar(32) NOT NULL,
  `Department` varchar(32) NOT NULL,
  `Approvad` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Password`, `StudentNumber`, `Faculty`, `Department`, `Approvad`) VALUES
(1, 'arda burak', 'cakar', 5432927172, 'aburak.cakar@std.hku.edu.tr', 'Brk1245245.', 18150, 'Engineering', 'Computer Engineering', NULL),
(12, 'ayse', 'cakmak', 5434334343, 'aysecakmak00@gmail.com', 'Se1245245.', 18151, 'Engineering', 'Computer Engineering', NULL),
(14, 'isik ', 'isik', 5435926172, 'isiksude@gmail.com', 'isik1245245.', 18152, 'Medicine', 'Medicine', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Tablo için indeksler `itemborrowing`
--
ALTER TABLE `itemborrowing`
  ADD PRIMARY KEY (`iBorrowingID`),
  ADD KEY `itemborrowingitemrequest` (`itemRequestID`);

--
-- Tablo için indeksler `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD PRIMARY KEY (`ItemRequestID`),
  ADD KEY `itemrequestusers` (`UserID`),
  ADD KEY `itemrequestitems` (`ProductID`);

--
-- Tablo için indeksler `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `statusitem` (`StatusID`);

--
-- Tablo için indeksler `roomborrowing`
--
ALTER TABLE `roomborrowing`
  ADD PRIMARY KEY (`rBorrowingID`),
  ADD KEY `roomborrowing-roomrequest` (`RoomRequestID`);

--
-- Tablo için indeksler `roomrequest`
--
ALTER TABLE `roomrequest`
  ADD PRIMARY KEY (`RoomRequestID`),
  ADD KEY `roomrequestusers` (`UserID`),
  ADD KEY `roomrequestrooms` (`RoomID`);

--
-- Tablo için indeksler `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `statusroom` (`StatusID`);

--
-- Tablo için indeksler `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `itemborrowing`
--
ALTER TABLE `itemborrowing`
  MODIFY `iBorrowingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `ItemRequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `items`
--
ALTER TABLE `items`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `roomborrowing`
--
ALTER TABLE `roomborrowing`
  MODIFY `rBorrowingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `roomrequest`
--
ALTER TABLE `roomrequest`
  MODIFY `RoomRequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `status`
--
ALTER TABLE `status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `itemborrowing`
--
ALTER TABLE `itemborrowing`
  ADD CONSTRAINT `itemborrowingitemrequest` FOREIGN KEY (`itemRequestID`) REFERENCES `itemrequest` (`ItemRequestID`);

--
-- Tablo kısıtlamaları `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD CONSTRAINT `itemrequestitems` FOREIGN KEY (`ProductID`) REFERENCES `items` (`ProductID`),
  ADD CONSTRAINT `itemrequestusers` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Tablo kısıtlamaları `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `statusitem` FOREIGN KEY (`StatusID`) REFERENCES `status` (`StatusID`);

--
-- Tablo kısıtlamaları `roomborrowing`
--
ALTER TABLE `roomborrowing`
  ADD CONSTRAINT `roomborrowing-roomrequest` FOREIGN KEY (`RoomRequestID`) REFERENCES `roomrequest` (`RoomRequestID`);

--
-- Tablo kısıtlamaları `roomrequest`
--
ALTER TABLE `roomrequest`
  ADD CONSTRAINT `roomrequestrooms` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`RoomID`),
  ADD CONSTRAINT `roomrequestusers` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Tablo kısıtlamaları `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `statusroom` FOREIGN KEY (`StatusID`) REFERENCES `status` (`StatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
