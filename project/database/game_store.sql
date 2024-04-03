-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 03, 2024 at 06:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin One', 'admin1@example.com', 'adminpassword1'),
(2, 'Admin Two', 'admin2@example.com', 'adminpassword2'),
(3, 'Admin Three', 'admin3@example.com', 'adminpassword3');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `classe` enum('game','post') NOT NULL,
  `publish_date` datetime NOT NULL,
  `content` varchar(2500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `classe`, `publish_date`, `content`, `user_id`, `target_id`) VALUES
(1, 'game', '2023-01-07 09:45:00', 'Great game! Really enjoyed playing it.', 1, 1),
(2, 'game', '2023-02-20 11:30:00', 'This game has amazing graphics.', 2, 2),
(3, 'game', '2023-03-30 14:20:00', 'Interesting post. Thanks for sharing!', 3, 3),
(4, 'post', '2023-04-12 16:50:00', 'I agree with your points in this post.', 4, 4),
(5, 'game', '2023-05-25 10:15:00', 'Can\'t wait for the next update of this game!', 5, 5),
(6, 'game', '2023-06-30 12:40:00', 'Well written post. Looking forward to more.', 6, 6),
(7, 'game', '2023-07-20 13:55:00', 'One of the best games I\'ve played recently.', 7, 7),
(8, 'game', '2023-08-10 15:10:00', 'This post gave me some new insights. Thanks!', 8, 8),
(9, 'game', '2023-09-05 17:30:00', 'Addictive gameplay. Spent hours playing it.', 9, 9),
(10, 'game', '2023-10-28 09:25:00', 'I found this post really informative. Good job!', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `publish_date` date NOT NULL,
  `description` varchar(2500) NOT NULL,
  `studio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `price`, `category`, `publish_date`, `description`, `studio_id`) VALUES
(1, 'Game of Thrones', 29.99, 'Action', '2023-01-15', 'Description for Game One', 1),
(2, 'Legend of Zelda', 19.99, 'Adventure', '2022-12-10', 'Description for Game Two', 2),
(3, 'Final Fantasy', 39.99, 'RPG', '2023-05-20', 'Description for Game Three', 3),
(4, 'Civilization VI', 49.99, 'Strategy', '2023-08-30', 'Description for Game Four', 4),
(5, 'Tetris', 9.99, 'Puzzle', '2023-03-05', 'Description for Game Five', 5),
(6, 'The Sims', 59.99, 'Simulation', '2023-10-12', 'Description for Game Six', 6),
(7, 'FIFA 23', 34.99, 'Sports', '2023-07-18', 'Description for Game Seven', 7),
(8, 'Need for Speed', 24.99, 'Racing', '2023-11-25', 'Description for Game Eight', 8),
(9, 'Street Fighter', 14.99, 'Fighting', '2022-11-02', 'Description for Game Nine', 9),
(10, 'Resident Evil', 69.99, 'Horror', '2023-12-31', 'Description for Game Ten', 10);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `classe` enum('user','game','post','studio') NOT NULL,
  `image` blob NOT NULL,
  `target_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `user_id` int(11) NOT NULL,
  `game_idgame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`user_id`, `game_idgame`) VALUES
(1, 2),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `imogie` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `post_text` varchar(2500) NOT NULL,
  `post_date` datetime NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_text`, `post_date`, `admin_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.', '2023-01-05 10:30:00', 1),
(2, 'Suspendisse feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.', '2023-02-15 15:45:00', 2),
(3, 'Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris.', '2023-03-25 08:20:00', 3),
(4, 'Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.', '2023-04-10 12:10:00', 2),
(5, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero.', '2023-05-20 17:00:00', 3),
(6, 'Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor.', '2023-06-30 09:55:00', 1),
(7, 'Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', '2023-07-15 14:25:00', 2),
(8, 'Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam.', '2023-08-05 11:40:00', 1),
(9, 'In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.', '2023-09-10 13:20:00', 2),
(10, 'Nullam varius. Sed non nisi. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.', '2023-10-22 16:15:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id`, `name`, `description`) VALUES
(1, 'Mega Games Inc.', 'A leading developer and publisher of video games'),
(2, 'Tiny Titans', 'Independent game studio known for innovative titles'),
(3, 'Cloud Studios', 'Cloud-based gaming platform and developer'),
(4, 'Retro Revolution', 'Specializes in remakes and reimaginings of classic games'),
(5, 'Arcade All-Stars', 'Focuses on classic arcade-style games'),
(6, 'Narrative Forge', 'Creates story-driven narrative adventure games'),
(7, 'Puzzle Pixies', 'Develops innovative and challenging puzzle games'),
(8, 'Sports Sim Studios', 'Leader in realistic sports simulation games'),
(9, 'Fantasy Forge', 'Specializes in fantasy RPG and strategy games'),
(10, 'Action Blasters', 'Known for fast-paced action and shooter games');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth_day` date NOT NULL,
  `walet_id` int(11) NOT NULL,
  `type_user` varchar(45) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `birth_day`, `walet_id`, `type_user`) VALUES
(1, 'John Doe', 'john@example.com', 'password1', '1990-05-15', 1, 'user'),
(2, 'Alice Smith', 'alice@example.com', 'password2', '1985-08-20', 2, 'user'),
(3, 'Bob Johnson', 'bob@example.com', 'password3', '1995-02-10', 3, 'user'),
(4, 'Emily Brown', 'emily@example.com', 'password4', '1988-11-25', 4, 'user'),
(5, 'Michael Davis', 'michael@example.com', 'password5', '1992-07-30', 5, 'user'),
(6, 'Jennifer Wilson', 'jennifer@example.com', 'password6', '1987-04-18', 6, 'user'),
(7, 'David Martinez', 'david@example.com', 'password7', '1998-09-05', 7, 'user'),
(8, 'Jessica Taylor', 'jessica@example.com', 'password8', '1983-12-12', 8, 'user'),
(9, 'Matthew Anderson', 'matthew@example.com', 'password9', '1993-06-28', 9, 'user'),
(10, 'Samantha Thomas', 'samantha@example.com', 'password10', '1991-03-22', 10, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `walet`
--

CREATE TABLE `walet` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `walet`
--

INSERT INTO `walet` (`id`, `amount`) VALUES
(1, 100),
(2, 50),
(3, 200),
(4, 75),
(5, 150),
(6, 300),
(7, 25),
(8, 80),
(9, 120),
(10, 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`user_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_game_studio1` (`studio_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`user_id`,`game_idgame`),
  ADD KEY `fk_user_has_game_game1` (`game_idgame`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `fk_likes_post1` (`post_id`),
  ADD KEY `fk_likes_user1` (`user_iduser`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_admin` (`admin_id`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walet`
--
ALTER TABLE `walet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_game_studio1` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `fk_user_has_game_game1` FOREIGN KEY (`game_idgame`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_game_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_post1` FOREIGN KEY (`post_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_likes_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_post_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_walet1` FOREIGN KEY (`walet_id`) REFERENCES `walet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
