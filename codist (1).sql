-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 01:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codist`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_enrolled_complete_courses` (IN `user_id` INT)  BEGIN 
    	SELECT courses.course_name, courses.course_id, enrolled_courses.date_added AS joining_date FROM enrolled_courses INNER JOIN courses ON enrolled_courses.course_id =courses.course_id WHERE enrolled_courses.user_id = user_id AND enrolled_courses.status = 1;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_enrolled_incomplete_courses` (IN `user_id` INT)  BEGIN 
    	SELECT courses.course_name, courses.course_id, enrolled_courses.date_added AS joining_date FROM enrolled_courses INNER JOIN courses ON enrolled_courses.course_id =courses.course_id WHERE enrolled_courses.user_id = user_id AND enrolled_courses.status = 0;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reply_by_post_id` (IN `post_id` INT)  BEGIN
    	SELECT users.fname, users.lname, replies.reply, replies.date_added FROM replies JOIN users ON replies.user_id = users.user_id WHERE replies.approved = 1 AND replies.post_id = post_id ORDER BY replies.reply_id DESC;
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@mail.com', '1234');

-- --------------------------------------------------------

--
-- Stand-in structure for view `allposts`
-- (See below for the actual view)
--
CREATE TABLE `allposts` (
`user_id` int(11)
,`fname` varchar(255)
,`lname` varchar(255)
,`post_id` int(11)
,`post` varchar(2000)
,`date_added` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `date_added`) VALUES
(1, 'HTML5', '2020-10-20 04:38:49'),
(2, 'CSS3', '2020-10-20 04:41:14'),
(5, 'css', '2020-10-21 10:53:44'),
(6, 'Angular', '2020-10-21 13:02:58'),
(8, 'how to add numbers', '2020-10-23 15:01:53'),
(9, 'aha', '2020-10-25 07:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`enroll_id`, `user_id`, `course_id`, `status`, `date_added`) VALUES
(1, 1, 1, 1, '2020-10-20 07:08:43'),
(2, 1, 2, 1, '2020-10-23 05:08:07'),
(3, 2, 6, 0, '2020-10-23 05:09:04'),
(7, 1, 5, 1, '2020-10-23 11:32:16'),
(13, 1, 8, 1, '2020-10-25 06:16:31'),
(16, 1, 6, 1, '2020-10-25 06:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedback_id`, `user_id`, `feedback`, `seen`, `date_added`) VALUES
(1, 1, 'Nice Work!!', 1, '2020-10-19 06:15:29'),
(2, 1, 'Nice Dude!!!', 1, '2020-10-29 10:26:12'),
(3, 1, 'modal check!!', 1, '2020-10-29 10:30:08'),
(4, 1, 'modal check!!', 1, '2020-10-29 10:31:28'),
(5, 1, 'hekkoooo', 1, '2020-10-29 10:31:55'),
(6, 1, 'hekkoooo', 1, '2020-10-29 10:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post`, `approved`, `date_added`) VALUES
(1, 1, 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl', 1, '2020-10-19 10:08:46'),
(2, 1, 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl', 1, '2020-10-19 14:41:26'),
(4, 2, 'hola!!!!!!!! friends', 1, '2020-10-25 07:07:04'),
(6, 1, 'Post Test', 1, '2020-10-29 10:02:51'),
(8, 1, '&lt;h1&gt;HELLO&lt;/h1&gt;', 1, '2020-10-29 11:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `quiz_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `ans_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `reply` varchar(2000) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `user_id`, `post_id`, `reply`, `approved`, `date_added`) VALUES
(1, 1, 1, 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl', 1, '2020-10-19 15:21:21'),
(2, 1, 1, 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl', 1, '2020-10-19 15:21:21'),
(3, 1, 1, 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl', 1, '2020-10-19 15:21:21'),
(5, 3, 1, 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charl', 1, '2020-10-19 15:21:21'),
(10, 1, 1, 'cooooolllllllllll!!!!!!!!!!!!!', 1, '2020-10-29 09:27:43'),
(11, 1, 1, 'cooooolllllllllll!!!!!!!!!!!!!', 1, '2020-10-29 09:28:42'),
(12, 1, 1, 'cooooolllllllllll!!!!!!!!!!!!!', 1, '2020-10-29 09:28:56'),
(13, 1, 4, 'need to see it.', 1, '2020-10-29 10:00:49'),
(15, 1, 6, 'reply approve test', 1, '2020-10-29 10:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `course_id`, `topic_name`, `description`, `filename`, `note`) VALUES
(1, 1, 'Introduction', '<h1><u>Heading Of Message</u></h1>                       <h4>Subheading</h4>                       <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain                         was born and I will give you a complete account of the system, and expound the actual teachings                         of the great explorer of the truth, the master-builder of human happiness. No one rejects,                         dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know                         how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again                         is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,                         but because occasionally circumstances occur in which toil and pain can procure him some great                         pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,                         except to obtain some advantage from it? But who has any right to find fault with a man who                         chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that                         produces no resultant pleasure? On the other hand, we denounce with righteous indignation and                         dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so                         blinded by desire, that they cannot foresee</p>', 'HTML1_-_Copy.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(2).zip'),
(2, 1, 'Web Page', '<h1><u>Heading Of Message</u></h1>                       <h4>Subheading</h4>                       <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain                         was born and I will give you a complete account of the system, and expound the actual teachings                         of the great explorer of the truth, the master-builder of human happiness. No one rejects,                         dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know                         how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again                         is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,                         but because occasionally circumstances occur in which toil and pain can procure him some great                         pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,                         except to obtain some advantage from it? But who has any right to find fault with a man who                         chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that                         produces no resultant pleasure? On the other hand, we denounce with righteous indignation and                         dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so                         blinded by desire, that they cannot foresee</p>', 'HTML1.MP4', 'note.zip'),
(3, 1, 'Tags', '<h1><u>Heading Of Message</u></h1>                       <h4>Subheading</h4>                       <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain                         was born and I will give you a complete account of the system, and expound the actual teachings                         of the great explorer of the truth, the master-builder of human happiness. No one rejects,                         dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know                         how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again                         is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,                         but because occasionally circumstances occur in which toil and pain can procure him some great                         pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,                         except to obtain some advantage from it? But who has any right to find fault with a man who                         chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that                         produces no resultant pleasure? On the other hand, we denounce with righteous indignation and                         dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so                         blinded by desire, that they cannot foresee</p>', 'HTML1.MP4', 'note.zip'),
(4, 2, 'Introduction', '<h1><u>Heading Of Message</u></h1>                       <h4>Subheading</h4>                       <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain                         was born and I will give you a complete account of the system, and expound the actual teachings                         of the great explorer of the truth, the master-builder of human happiness. No one rejects,                         dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know                         how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again                         is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,                         but because occasionally circumstances occur in which toil and pain can procure him some great                         pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,                         except to obtain some advantage from it? But who has any right to find fault with a man who                         chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that                         produces no resultant pleasure? On the other hand, we denounce with righteous indignation and                         dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so                         blinded by desire, that they cannot foresee</p>', 'HTML1.MP4', 'note.zip'),
(10, 5, 'Introduction hai ye', '<b>HOLAAAAAAAAAAAAA!!!!!!!!!!!!!!!!!!!!!</b>', 'HTML1.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(2).zip'),
(11, 6, 'Introduction hai ye', '<b>WELCOME TO ANGULAR COURSE!!!</b>', 'HTML2.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(1).zip'),
(12, 5, 'topic', 'dkndkfnkdfn', 'HTML1_-_Copy1.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(2)1.zip'),
(13, 5, 'topic name', 'fbfb', 'HTML1_-_Copy2.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(2)2.zip'),
(14, 8, 'adding numbers', '<b>HELLO! We WIll ADD TWO NUMBERS.</b>', 'HTML1_-_Copy.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(1).zip'),
(15, 6, 'TEST AGAIN', 'HELLO', 'HTML41.mp4', 'filedash_laborasyon_com-618.zip'),
(16, 6, 'TEST AGAIN', 'HELLO', 'HTML42.mp4', 'filedash_laborasyon_com-6181.zip'),
(17, 6, 'TEST AGAIN', 'HELLO', 'HTML43.mp4', 'filedash_laborasyon_com-6182.zip'),
(18, 6, 'TEST AGAIN', 'HELLO', 'HTML44.mp4', 'filedash_laborasyon_com-6183.zip'),
(19, 6, 'TEST AGAIN', 'HELLO', 'HTML45.mp4', 'filedash_laborasyon_com-6184.zip'),
(20, 6, 'TEST AGAIN', 'HELLO', 'HTML46.mp4', 'filedash_laborasyon_com-6185.zip'),
(21, 6, 'topic name', 'hola', 'HTML21.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(1)1.zip'),
(22, 6, 'Introduction hai ye', 'tacos is love', 'HTML47.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(1)2.zip'),
(23, 6, 'topic', 'hola', 'HTML1_-_Copy.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(1)3.zip'),
(24, 9, 'Introduction hai ye', 'nnnnnnnn', 'HTML1_-_Copy.mp4', 'bcit-ci-CodeIgniter-3_1_11-0-gb73eb19_(1).zip');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `date_added`) VALUES
(1, 'john', 'ipsum', 'john@mail.com', '1234', '2020-10-18 18:47:45'),
(2, 'amy', 'santiago', 'amy@mail.com', '1234', '2020-10-18 18:48:49'),
(3, 'user', 'user', 'sandeepguptabc@gmail.com', '1234567', '2020-10-22 15:20:09');

-- --------------------------------------------------------

--
-- Structure for view `allposts`
--
DROP TABLE IF EXISTS `allposts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allposts`  AS  select `users`.`user_id` AS `user_id`,`users`.`fname` AS `fname`,`users`.`lname` AS `lname`,`posts`.`post_id` AS `post_id`,`posts`.`post` AS `post`,`posts`.`date_added` AS `date_added` from (`users` join `posts` on(`users`.`user_id` = `posts`.`user_id`)) where `posts`.`approved` = 1 order by `posts`.`post_id` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `enrolled_courses_fk0` (`user_id`),
  ADD KEY `enrolled_courses_fk1` (`course_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedbacks_fk0` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_fk0` (`user_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `quizes_fk0` (`course_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `replies_fk0` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `scores_fk0` (`course_id`),
  ADD KEY `scores_fk1` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `Topics_fk0` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD CONSTRAINT `enrolled_courses_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `enrolled_courses_fk1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `quizes`
--
ALTER TABLE `quizes`
  ADD CONSTRAINT `quizes_fk0` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_fk0` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `scores_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `Topics_fk0` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
