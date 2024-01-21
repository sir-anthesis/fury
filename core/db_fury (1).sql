-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 05:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fury`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_easy`
--

CREATE TABLE `tb_easy` (
  `easy_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `score` int(50) NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_easy`
--

INSERT INTO `tb_easy` (`easy_id`, `user_id`, `score`, `time`) VALUES
(1, 6, 43, '2024-01-19 21:52:16'),
(5, 6, 0, '2024-01-20 09:49:47'),
(7, 6, 100, '2024-01-20 09:53:41'),
(8, 6, 200, '2024-01-20 09:53:57'),
(9, 6, 86, '2024-01-20 09:58:30'),
(10, 6, 300, '2024-01-20 09:59:50'),
(11, 6, 78, '2024-01-20 10:18:51'),
(12, 6, 800, '2024-01-20 10:19:22'),
(14, 6, 236, '2024-01-20 10:31:46'),
(15, 2, 400, '2024-01-20 12:45:40'),
(16, 6, 176, '2024-01-20 13:13:03'),
(17, 3, 67, '2024-01-20 13:14:12'),
(18, 3, 1103, '2024-01-20 13:24:23'),
(19, 2, 450, '2024-01-20 13:31:29'),
(20, 6, 115, '2024-01-21 18:36:12');

--
-- Triggers `tb_easy`
--
DELIMITER $$
CREATE TRIGGER `tr_afterEasy` AFTER INSERT ON `tb_easy` FOR EACH ROW BEGIN
    DECLARE existing_score INT;

    -- Check if user_id already exists in tb_leaderboard
    SELECT score INTO existing_score
    FROM tb_game
    WHERE user_id = NEW.user_id AND mode = 'easy';

    IF existing_score IS NULL THEN
        -- If user_id doesn't exist, insert a new row
        INSERT INTO tb_game (user_id, mode, score)
        VALUES (NEW.user_id, 'easy', NEW.score);
    ELSE
        -- If user_id exists, update the row if the new score is higher
        IF NEW.score > existing_score THEN
            UPDATE tb_game
            SET score = NEW.score
            WHERE user_id = NEW.user_id AND mode = 'easy';
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_game`
--

CREATE TABLE `tb_game` (
  `game_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_game`
--

INSERT INTO `tb_game` (`game_id`, `user_id`, `username`, `mode`, `score`) VALUES
(1, 6, 'aaa', 'easy', '800'),
(2, 6, 'aaa', 'hard', '76'),
(3, 6, 'aaa', 'medium', '145'),
(4, 2, 'asdas', 'easy', '450'),
(5, 3, 'zzzzzz', 'easy', '1103'),
(6, 7, '', 'medium', '522'),
(7, 7, '', 'hard', '188'),
(8, 8, '', 'hard', '15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hard`
--

CREATE TABLE `tb_hard` (
  `hard_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `score` int(50) NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_hard`
--

INSERT INTO `tb_hard` (`hard_id`, `user_id`, `score`, `time`) VALUES
(1, 6, 40, '2024-01-19 21:53:55'),
(2, 6, 27, '2024-01-20 10:32:01'),
(3, 6, 76, '2024-01-20 10:35:17'),
(5, 7, 188, '2024-01-21 23:33:37'),
(6, 8, 0, '2024-01-21 23:39:50'),
(7, 8, 15, '2024-01-21 23:40:08');

--
-- Triggers `tb_hard`
--
DELIMITER $$
CREATE TRIGGER `tr_afterHard` AFTER INSERT ON `tb_hard` FOR EACH ROW BEGIN
    DECLARE existing_score INT;

    -- Check if user_id already exists in tb_leaderboard
    SELECT score INTO existing_score
    FROM tb_game
    WHERE user_id = NEW.user_id AND mode = 'hard';

    IF existing_score IS NULL THEN
        -- If user_id doesn't exist, insert a new row
        INSERT INTO tb_game (user_id, mode, score)
        VALUES (NEW.user_id, 'hard', NEW.score);
    ELSE
        -- If user_id exists, update the row if the new score is higher
        IF NEW.score > existing_score THEN
            UPDATE tb_game
            SET score = NEW.score
            WHERE user_id = NEW.user_id AND mode = 'hard';
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_medium`
--

CREATE TABLE `tb_medium` (
  `medium_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `score` int(50) NOT NULL,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_medium`
--

INSERT INTO `tb_medium` (`medium_id`, `user_id`, `username`, `score`, `time`) VALUES
(1, 6, '0', 73, '2024-01-19 21:49:44'),
(2, 6, '0', 24, '2024-01-19 21:53:16'),
(3, 6, '0', 67, '2024-01-20 09:07:05'),
(4, 6, 'aaa', 172, '2024-01-20 09:12:32'),
(5, 6, 'aaa', 126, '2024-01-20 10:43:42'),
(6, 6, 'aaa', 145, '2024-01-20 11:57:31'),
(7, 7, '', 0, '2024-01-21 19:02:29'),
(8, 7, '', 0, '2024-01-21 19:02:42'),
(9, 7, '', 0, '2024-01-21 19:02:53'),
(10, 7, '', 0, '2024-01-21 19:03:04'),
(11, 7, '', 106, '2024-01-21 19:03:30'),
(12, 7, '', 522, '2024-01-21 19:04:27');

--
-- Triggers `tb_medium`
--
DELIMITER $$
CREATE TRIGGER `tr_afterMedium` AFTER INSERT ON `tb_medium` FOR EACH ROW BEGIN
    DECLARE existing_score INT;

    -- Check if user_id already exists in tb_leaderboard
    SELECT score INTO existing_score
    FROM tb_game
    WHERE user_id = NEW.user_id AND mode = 'medium';

    IF existing_score IS NULL THEN
        -- If user_id doesn't exist, insert a new row
        INSERT INTO tb_game (user_id, mode, score)
        VALUES (NEW.user_id, 'medium', NEW.score);
    ELSE
        -- If user_id exists, update the row if the new score is higher
        IF NEW.score > existing_score THEN
            UPDATE tb_game
            SET score = NEW.score
            WHERE user_id = NEW.user_id AND mode = 'medium';
        END IF;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `profile_picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `email`, `username`, `password`, `profile_picture`) VALUES
(1, 'anthesis@gmail.com', 'anthesis', 'sadasdasd', 'asset/profile/default.png'),
(2, 'asdass@gmail.com', 'asdas', 'sadasdasd', 'asset/profile/sp1.jpg'),
(3, 'zzzzz@gmail.com', 'zzzzzz', 'sadasdasd', 'asset/profile/default.png'),
(4, 'azalea@gmail.com', 'asdasdsad', 'q213w213', 'asset/profile/default.png'),
(5, 'ihza_bowo@yahoo.com', '21312312', '21321312', 'asset/profile/default.png'),
(6, 'aaaa@a.com', 'aaa', 'aaa', 'asset/profile/default.png'),
(7, 'abcd@gmail.com', 'abcd', 'abcd', 'asset/profile/adjasd.jpg'),
(8, 'kkkk@gmail.com', 'kkkk', 'kkkk', 'asset/profile/default.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_leaderboard`
-- (See below for the actual view)
--
CREATE TABLE `vw_leaderboard` (
`game_id` int(5)
,`username` varchar(20)
,`mode` varchar(50)
,`score` bigint(21)
,`profile_picture` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_leaderboard`
--
DROP TABLE IF EXISTS `vw_leaderboard`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_leaderboard`  AS SELECT `g`.`game_id` AS `game_id`, `u`.`username` AS `username`, `g`.`mode` AS `mode`, cast(`g`.`score` as signed) AS `score`, `u`.`profile_picture` AS `profile_picture` FROM (`tb_game` `g` join `tb_user` `u` on(`g`.`user_id` = `u`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_easy`
--
ALTER TABLE `tb_easy`
  ADD PRIMARY KEY (`easy_id`),
  ADD KEY `tb_easy_ibfk_1` (`user_id`);

--
-- Indexes for table `tb_game`
--
ALTER TABLE `tb_game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_hard`
--
ALTER TABLE `tb_hard`
  ADD PRIMARY KEY (`hard_id`),
  ADD KEY `tb_hard_ibfk_1` (`user_id`);

--
-- Indexes for table `tb_medium`
--
ALTER TABLE `tb_medium`
  ADD PRIMARY KEY (`medium_id`),
  ADD KEY `tb_medium_ibfk_1` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_easy`
--
ALTER TABLE `tb_easy`
  MODIFY `easy_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_game`
--
ALTER TABLE `tb_game`
  MODIFY `game_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_hard`
--
ALTER TABLE `tb_hard`
  MODIFY `hard_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_medium`
--
ALTER TABLE `tb_medium`
  MODIFY `medium_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_easy`
--
ALTER TABLE `tb_easy`
  ADD CONSTRAINT `tb_easy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_game`
--
ALTER TABLE `tb_game`
  ADD CONSTRAINT `tb_game_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_hard`
--
ALTER TABLE `tb_hard`
  ADD CONSTRAINT `tb_hard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_medium`
--
ALTER TABLE `tb_medium`
  ADD CONSTRAINT `tb_medium_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
