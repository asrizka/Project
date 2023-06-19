-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 11:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(39, 5, 8, 'ROG Flow Z13 FLOWZ13 GZ301ZE LC175W', 28300000, 1, 'ROGFlowZ13FLOWZ13GZ301ZELC175W11.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(3, 0, 'admin', '1@gmail.com', '1111111111', 'hi there!'),
(4, 5, 'adasdasdasda', 'asdasdasdadsad@sfs', '123123131312', 'asdadasdadasd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(9, 5, 'admin', '3123123', 'user1@gmail.com', 'credit card', 'flat no. sdfsadfa, afadsfasdf, asdfasdf, asdfasf, 1111', 'ROG FLow X16 GV601RW-M5110X (37990000 x 1) - ', 37990000, '2022-08-04', 'completed'),
(10, 5, 'ADAAS', '1313', 'user1@gmail.com', 'cash on delivery', 'flat no. 131, 312312, 1231, 1231, 1111', 'ROG Strix G15 G513 G513RS-HQ032X (32000000 x 2) - ', 64000000, '2022-08-04', 'completed'),
(11, 5, 'Q123', '12312', 'user1@gmail.com', 'cash on delivery', 'flat no. WQEQW, QWEQWE, WQE, QWE, 1111', 'ROG Strix G15 G513 G513RS-HQ032X (32000000 x 1) - ', 32000000, '2022-08-04', 'pending'),
(12, 5, 'dadas', '1312312313', '12313@asdf', 'paypal', 'flat no. 213, 123, 13, 123, 123131', 'ROG Strix G15 G513 G513RS-HQ032X (32000000 x 1) - ', 32000000, '2022-08-04', 'pending'),
(13, 5, 'asri', '12', 'as@ri', 'COD (Cash of Delivery)', 'flat no. ad, ads, ads, das, 123', 'ROG Flow Z13 FLOWZ13 GZ301ZE LC175W (28300000 x 1) - ', 28300, '2022-08-04', 'pending'),
(14, 5, 'testtt', '9787', 'dagda@adg', 'COD (Cash of Delivery)', 'flat no. 54, hgh, hgh, hgh, 6565', 'ROG Strix G17 G713 G713IC-HG035R (21.000.000,00 x 1) - ', 21000, '2022-08-04', 'pending'),
(15, 5, 'haii', '78', 'hai@ai', 'COD (Cash of Delivery)', 'flat no. hdajadh, adbb, dajh, asjdh, 1212', 'ROG Zephyrus S17 GX703 GX703HS-KF004R (47.000.000,00 x 3) - ', 141000000, '2022-08-04', 'pending'),
(16, 5, 'pengguna', '989', 'jadhdah1@dssa', 'ATM', 'flat no. adhgdah, dsahahds, dahsgdgh, dahg, dsahg', 'ROG Zephyrus Duo 16 GX650 GX650RX-LB011X (59.000.000,00 x 5) - ', 295000000, '2022-08-04', 'pending'),
(17, 5, 'asddsa', '321', '12313@asdf', 'OVO', 'flat no. 123, sdaads, 13, 123, 123131', 'ROG Strix G17 G713 G713IC-HG035R (21.000.000,00 x 1) - ', 21000000, '2022-08-04', 'pending'),
(18, 5, 'asddsa', '321', '12313@asdf', 'OVO', 'flat no. 123, sdaads, 13, 123, 123131', 'ROG Strix G17 G713 G713IC-HG035R (21.000.000,00 x 1) - ', 21000000, '2022-08-04', 'pending'),
(19, 5, 'adsdsaasdds', '213', '12313@asdf', 'ATM', 'flat no. 123, dasdsa, 13, 123, 123131', 'ROG Strix G15 G513 G513RS-HQ032X (32.000.000,00 x 1) - ', 32000000, '2022-08-04', 'pending'),
(20, 5, 'dadasdaaddssad', '1312312313', '12313@asdf', 'COD (Cash of Delivery)', 'flat no. 123, adsds, 13, 123, 123131', 'ROG Strix G15 G513 G513RS-HQ032X (32.000.000,00 x 1) - ', 32000000, '2022-08-04', 'pending'),
(21, 5, 'dadassdadsdsad', '1312312313', '12313@asdf', 'Gopay', 'flat no. 123, asdds, 13, 123, 123131', 'ROG Strix G15 G513 G513RS-HQ032X (32.000.000,00 x 1) - ', 32000000, '2022-08-04', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `graphic_card` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `display` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `processor`, `graphic_card`, `ram`, `display`, `storage`, `image_01`, `image_02`, `image_03`) VALUES
(8, 'ROG Flow Z13 FLOWZ13 GZ301ZE LC175W', 'Intel® Core™ i9-12900H (24M Cache, up to 5.0GHz, 14 cores) | GeForce RTX™ 3050 Ti 4GB GDDR6 | 13.4 inch (3840x2400) Touch Screen 60Hz | 8x2 LPDDR5 On Board | 1TB NVMe M.2 SSD', 28300000, 'Intel® Core™ i9-12900H', 'GeForce RTX™ 3050 Ti', '16GB', '13.4 inch (3840x2400)', '1TB SSD', 'ROGFlowZ13FLOWZ13GZ301ZELC175W11.png', 'ROGFlowZ13FLOWZ13GZ301ZELC175W2.png', 'ROGFlowZ13FLOWZ13GZ301ZELC175W13.png'),
(9, 'ROG Strix G15 G513 G513RS-HQ032X', 'AMD Ryzen™ 9 6900H (8core/16thread, 20MB cache, up to 4.9GHz) | NVIDIA® GeForce RTX™ 3080 8GB GDDR6 | 15.6-inch (2560x1440) Response time 3ms, 165Hz | 16GB DDR5-4800 SO-DIMM x 2 | 1TB NVMe™ M.2 SSD', 32000000, 'AMD Ryzen™ 9 6900HX', 'GeForce RTX™ 3080', '32GB', '15.6-inch (2560x1440)', '1TB SSD', '1ROGStrixG152022G513.png', '2ROGStrixG152022G513.png', '3ROGStrixG152022G513.png'),
(10, 'ROG FLow X16 GV601RW-M5110X', 'AMD Ryzen™ 9 6900HS\r\n(8 core/16 thread, 16MB cache, up to 4.9GHz) | NVIDIA® GeForce RTX™ 3070 Ti 8GB GDDR6 | ROG Nebula HDR Display\r\n16-inch (2560x1600) 165Hz | 32GB DDR5-4800 SO-DIMM x 2 | 2TB NVMe™ M.2 ', 37990000, 'AMD Ryzen™ 9 6900HS', 'GeForce RTX™ 3070 Ti', '64GB', '16-inch (2560 x 1600)', '2TB SDD', 'ROGFLowX16GV601RWM5110X1.png', 'ROGFLowX16GV601RWM5110X2.png', 'ROGFLowX16GV601RWM5110X3.png'),
(12, 'ROG Flow Z13 FLOW-Z13-GZ301ZA-LD016W', '12th Gen Intel® Core™ i5-12500H (12cores,18M Cache, up to 4.5 GHz) | 13.4-inch (1920x1200) Touch Screen 120 Hz | 8x2 LPDDR5 | 512GB NVMe™ M.2 ', 20800000, 'Intel® Core™ i5-12500H', 'Intel® Iris Xᵉ Graphics', '16GB', '13.4-inch (1920x1200)', '512GB SSD', '4ROGFlowZ13FLOWZ13GZ301ZALD016W1.png', '4ROGFlowZ13FLOWZ13GZ301ZALD016W2.png', '4ROGFlowZ13FLOWZ13GZ301ZALD016W3.png'),
(13, 'ROG Flow X13 GV301QH-K5243R', 'AMD Ryzen™ 9 5980HS (8core/16thread, 20MB cache, up to 4.8 GHz) | 13.4-inch (3840x2400) sRGB:116% Touch Screen 60 Hz | 16GB*2 LPDDR4X on board | 1TB NVMe M.2 SSD', 36300000, 'AMD Ryzen™ 9 5980HS', 'GeForce GTX™ 1650', '32GB', '13.4 Inch (3840x2400)', '1TB SSD', 'ROGFlowX13GV301QHK5243R1.png', 'ROGFlowX13GV301QHK5243R2.png', 'ROGFlowX13GV301QHK5243R3.png'),
(14, 'ROG Flow X16 GV601 GV601RM-M5120X', 'AMD Ryzen™ 9 6900HS (8core/16thread, 16MB cache, up to 4.9GHz) | NVIDIA® GeForce RTX™ 3060 6GB GDDR6 | 16-inch (2560x1600) Touch Screen 165Hz | RAM 64GB DDR5-4800 | 2TB NVMe M.2 SSD', 59400000, 'AMD Ryzen™ 9 6900HS', 'GeForce RTX™ 3060', '64GB', '16-inch (2560x1600)', '2TB SDD', 'ROGFlowX162022GV601GV601RM-M5120X1.png', 'ROGFlowX162022GV601GV601RM-M5120X2.png', 'ROGFlowX162022GV601GV601RM-M5120X3.png'),
(15, 'ROG Strix SCAR 15 G533ZS-HF041X', 'Intel® Core™ i9-12900H 2.5GHz up to 5.0GHz (24M Cache, 14 cores) | NVIDIA® GeForce RTX™ 3080 8GB GDDR6 | 15.6-inch (1920x1080)  sRGB 100% 300Hz | RAM 32GB DDR5-4800 SO-DIMM x 2 | 2TB NVMe M.2 SSD', 37000000, 'Intel® Core™ i9-12900H', 'GeForce RTX™ 3080', '64GB ', '15.6-inch (1920x1080)', '2TB SDD', '1ROGStrixSCAR15.png', '2ROGStrixSCAR15.png', '3ROGStrixSCAR15.png'),
(16, 'ROG Strix SCAR 17 SE G733 G733CX-LL021X', 'Intel® Core™ i9-12950HX 2.3GHz up to 5.0GHz (30M Cache, 16cores) | NVIDIA® GeForce RTX™ 3080 Ti 16GB GDDR6 | 17.3-inch (2560x1440) 240Hz | RAM 32GB DDR5-4800 SO-DIMM x 2 | 2TB + 2TB NVMe M.2 (RAID0)', 52000000, 'Intel® Core™ i9-12950HX', 'GeForce RTX™ 3080 Ti', '64GB', '17.3-inch (2560x1440)', '4TB SSD', '1ROGStrixSCAR17.png', '2ROGStrixSCAR17.png', '3ROGStrixSCAR17.png'),
(17, 'ROG Flow X13 GV301R-ELI120W', 'AMD Ryzen™ 9 6900HS (8core/16thread, 16MB cache, up to 4.9 GHz) | NVIDIA® GeForce RTX™ 3050 4GB GDDR6 | 13.4-inch (3840 x 2400) sRGB:116% Touch Screen 60Hz | 16GB*2 LPDDR5 on board | 1TB NVMe M.2', 25200000, 'AMD Ryzen™ 9 6900HS', 'GeForce RTX™ 3050', '32GB', '13.4-inch (3840 x 2400)', '1TB SSD', 'ROGFlowX13GV301RELI120W1.png', 'ROGFlowX13GV301RELI120W2.png', 'ROGFlowX13GV301RELI120W3.png'),
(20, 'ROG Strix G17 Advantage Edition G713 G713QY-K4007R', 'AMD Ryzen™ 9 5900HX (8core/16thread, 20MB cache, up to 4.6GHz) | AMD® Radeon™ RX 6800M\r\n12GB GDDR6 | 17.3-inch (2560x1440) Respon Time 3ms, 165Hz | 8GB DDR4-3200 SO-DIMM x 2 | 1TB NVMe™ M.2 SSD', 38600000, 'AMD Ryzen™ 9 5900HX', 'AMD® Radeon™ RX 6800M', '16GB', '17.3-inch (2560x1440)', '1TB SSD', 'advantage1.png', 'advantage2.png', 'advantage3.png'),
(21, 'ROG Strix G17 G713 G713IC-HG035R', 'AMD Ryzen™ 7 4800H (8core/16thread, 12MB Cache, 4.2 GHz) | NVIDIA® GeForce RTX™ 3050 4GB GDDR6 | 17.3 inch (1920x1080) sRGB 100% Respon Time 3ms, 300Hz | 16GB DDR4-3200 SO-DIMM x 2 | 1TB NVMe™ M.2 SSD', 21000000, 'AMD Ryzen™ 7 4800H', 'GeForce RTX™ 3050', '32GB', '17.3 inch (1920 x 1080)', '1TB SSD', '5ROGStrixG17G711.png', '5ROGStrixG17G712.png', '5ROGStrixG17G713.png'),
(22, 'ROG Strix SCAR 17 G733 G733QM-K4048R', 'AMD Ryzen™ 9 5900HX (8core/16thread, 20MB cache, up to 4.6 GHz) | NVIDIA® GeForce RTX™ 3060 6GB GDDR6 | 17.3 inch (2560x1440) anti-glare 165Hz | 32GB DDR4-3200 SO-DIMM x 2 | 1TB + 1TB NVMe™ M.2 (RAID0) SSD', 40000000, 'AMD Ryzen™ 9 5900HX', 'GeForce RTX™ 3060', '64GB', '17.3 inch (2560x1440)', '2TB SSD', '5ROGStrixG17G711.png', '5ROGStrixG17G712.png', '5ROGStrixG17G713.png'),
(23, 'Zephyrus M16 GU603Z-XK8044W', 'Intel® Core™ i9-12900H 2.5GHz up to 5.0GHz (24M Cache, 14 cores) | NVIDIA® GeForce RTX™ 3080 Ti 16GB GDDR6 | 16 inch (2560x1600) 165Hz with 3ms Respons Time | 16GB DDR5 on board\r\n16GB DDR5-4800 SO-DIMM | 2TB NVMe™ M.2 SSD', 55000000, 'Intel® Core™ i9-12900H', 'GeForce RTX™ 3080 Ti', '32GB', '16 inch (2560x1600)', '2TB SSD', '1ZephyrusM16GU603ZXK8044W.png', '2ZephyrusM16GU603ZXK8044W.png', '3ZephyrusM16GU603ZXK8044W.png'),
(24, 'ROG Zephyrus Duo 16 GX650 GX650RX-LB011X', 'AMD Ryzen™ 9 6900HX (8core/16thread, 20MB cache, up to 4.9 GHz) | NVIDIA® GeForce RTX™ 3080 Ti 16GB GDDR6 | 16 inch (3840x2400) anti-glare, Refresh rate : 120Hz / 240Hz, Respon time : 3ms. Additional Display : 3840 x 1100(4K) | 32GB DDR5-4800 SO-DIMM x 2 | 2TB + 2TB NVMe™ M.2 SSD (RAID 0)', 59000000, 'AMD Ryzen™ 9 6900HX', 'GeForce RTX™ 3080 Ti', '64GB', '16 inch (3840x2400)', '4TB', '1Duo162022GX650.png', '2Duo162022GX650.png', '3Duo162022GX650.png'),
(25, 'ROG Zephyrus G15 GA503 GA503RW-LN087W', 'AMD Ryzen™ 9 6900HS (8core/16thread, 16MB cache, up to 4.9 GHz) | NVIDIA® GeForce RTX™ 3070 Ti 8GB GDDR6 | 15.6-inch (2560x1440) anti-glare, Refresh Rate 240Hz, Respon Time : 3ms | 16GB DDR5 on board + 16GB DDR5-4800 SO-DIMM | 1TB NVMe™ M.2 SSD', 36600000, 'AMD Ryzen™ 9 6900HS', 'GeForce RTX™ 3070 Ti', '32GB', '15.6 inch (2560x1440)', '1TB', '1ROGZephyrusG152022GA503GA503RWLN087W.png', '2ROGZephyrusG152022GA503GA503RWLN087W.png', '3ROGZephyrusG152022GA503GA503RWLN087W.png'),
(26, 'ROG Zephyrus G14 GA402 GA402RJ-L8106W', 'AMD Ryzen™ 9 6900HS (8core/16thread, 16MB cache, up to 4.9 GHz) | AMD Radeon™ RX 6700S 8GB GDDR6 | 14 inch (2560x1600) Refresh Rate:\r\n120Hz, Response Time:3ms | 8GB DDR5 on board\r\n+ 8GB DDR5-4800 SO-DIMM | 1TB NVMe™ M.2 SSD', 35600000, 'AMD Ryzen™ 9 6900HS', 'AMD Radeon™ RX 6700S', '16GB', '14 inch (2560x1600)', '1TB', '1ROGZephyrusG142022GA402GA402RJL8106W.png', '2ROGZephyrusG142022GA402GA402RJL8106W.png', '3ROGZephyrusG142022GA402GA402RJL8106W.png'),
(27, 'ROG Zephyrus S17 GX703 GX703HS-KF004R', 'Intel® Core™ i9-11900H Processor 2.5 GHz up to 4.9GHz (24M Cache, 8 Cores) | NVIDIA® GeForce RTX™ 3080 16GB GDDR6 | 17.3 inch (3840 x 2160) Anti-glare with 3ms Respons time, 165Hz | 16GB DDR4 on board\r\n16GB DDR4-3200 SO-DIMM | \r\n1TB + 1TB + 1TB NVMe™ M.2 SSD (RAID0)', 47000000, 'Intel® Core™ i9-11900H', 'GeForce RTX™ 3080', '32GB', '17.3 inch (3840x2160)', '3TB SSD', '1ROGZephyrusS17GX703GX703HSKF004R.png', '2ROGZephyrusS17GX703GX703HSKF004R.png', '3ROGZephyrusS17GX703GX703HSKF004R.png'),
(28, 'ROG Zephyrus M16 GU603 GU603HR-K8004R', 'Intel® Core™ i9-11900H 2.5 GHz up to 4.9GHz (24M Cache, 8 Cores) | NVIDIA® GeForce RTX™ 3070 8GB GDDR6 | 16 inch (2560x1600) Refresh Rate:\r\n165Hz\r\nResponse Time:\r\n3ms | 16GB DDR4 on board + \r\n16GB DDR4-3200 SO-DIMM | 2TBNVMe™ M.2 SSD', 43600000, 'Intel® Core™ i9-11900H', 'GeForce RTX™ 3070', '32GB', '16 inch (2560x1600)', '2TB', '1ROGZephyrusS17GX703GX703HSKF004R.png', '2ROGZephyrusS17GX703GX703HSKF004R.png', '3ROGZephyrusS17GX703GX703HSKF004R.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(5, 'user1', 'user1@gmail.com', '011c945f30ce2cbafc452f39840f025693339c42');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
