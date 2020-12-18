-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2020 lúc 06:58 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `develovebug`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assignment_user_score`
--

CREATE TABLE `assignment_user_score` (
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `room` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'img/class1.png',
  `created_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_user_role`
--

CREATE TABLE `class_user_role` (
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `public` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` int(11) NOT NULL,
  `topic` int(11) DEFAULT NULL,
  `limit_score` int(3) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `limit_time` datetime DEFAULT NULL,
  `num_comments` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_types`
--

CREATE TABLE `post_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post_types`
--

INSERT INTO `post_types` (`id`, `name`) VALUES
(2, 'ANOUNMENT'),
(1, 'ASSIGNMENT'),
(3, 'MATERIAL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_visibility`
--

CREATE TABLE `post_visibility` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ADMIN'),
(3, 'STUDENT'),
(2, 'TEACHER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_files`
--

CREATE TABLE `student_files` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `tel` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `avatar` varchar(256) DEFAULT 'img/avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `birth`, `tel`, `token`, `verified`, `avatar`) VALUES
(1, 'admin', '$2y$10$ucR2cxo.9CYwjRlCbGPVt.LBiVMUcnxTaAZ5Ix91n/LraxZBOY.42', 'votuongvi2222002@gmail.com', 'Võ Tường Vi', '2001-02-22', '0917004354', 'b4aac8d6af01d41e128491e55fad93e4ee31c230433d1e506ae41af3915170e5e238833efe834b0fb6e82e74b1d258df0735', 1, 'img/avatar.png'),
(53, 'vivo22', '$2y$10$HKS.IRSwT8c5dlh.iqt39.QVKKlYoo9erqwakWFr3Yo/0Ub1l4iJ.', 'tuongvivo222@gmail.com', 'Võ Tường Vi', '2020-12-11', '0947355907', 'c4e01ce16f89e6b079cfb1fb5d75f1e8d62c9dd87243d6c8741c72678ef4e0650ce7ecb4c1088ae984a93ddede3905d2aeda', 1, 'img/avatar.png'),
(54, 'student1', '$2y$10$MRGO/bkdE2FK4KL60NhMCeIr/LLt3r4uiPrCyIqw0WxeZk0wP8A06', 'studentdevelovebug1@gmail.com', 'Student One', '2009-02-26', '01234744615', 'cb878372c1a4d1510edd810f7cb822ebc170fe2f6cebc8ff16409435977c1513bb62e8fe877a0ae9ccbd7562510c59fc0e12', 1, 'img/avatar.png'),
(55, 'student2', '$2y$10$r9.CkS1Z6Bdv4xqlSq23oezc/s6svJaT/PKqp4uFWT41lbdocozVS', 'studentdevelovebug2@gmail.com', 'Student Two', '2004-06-16', '0947355907', 'eb2ce1f05f4cc6fcbc8dc5d1fe481bbd3071f07784687fd30821c7b225551ec776666eaf826435b22293d1bd4d360a4ef6e2', 1, 'img/avatar.png'),
(56, 'student3', '$2y$10$ju3Kz3ic/EOE0bWbt1lWx.mN.7rKXlzpx3IyMJ9PMsplvPEw5fG2e', 'studentdevelovebug3@gmail.com', 'Student Three', '2013-01-30', '01234744615', 'fa734b62ad3d33ea820111de310017a190656f039c162a8431de779d83576f5385f693aff09fd47ba5eb9963060de5e6f2ce', 1, 'img/avatar.png'),
(57, 'student4', '$2y$10$bU8BE.b4MHidsbYEYHDL7e7Xq8wmzwoadxOr54YuF8ZQ5uH/arsXa', 'studentdevelovebug4@gmail.com', 'Student Four', '2000-02-22', '0947355907', 'e826c809aefffea7d0d4c6b8a75e4b1b8019934e9dcd33219c73ad5df5a988325fcf2b5b26bfa62c8f29696596df8354ae86', 1, 'img/avatar.png'),
(58, 'student5', '$2y$10$JGyOxt12EUFen97BVaZ7mOvZWwmM.MRaMg3f8GDYXpOSHLZ/JzjJ2', 'studentdevelovebug5@gmail.com', 'Student Five', '2002-06-05', '0947355907', '892c6b9e90ed82bdf476236a39df88d1d58a054b57176d5951273ecb6deab9f48b978f02834e6585e1631f4cd92f7137c2ea', 1, 'img/avatar.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `assignment_user_score`
--
ALTER TABLE `assignment_user_score`
  ADD UNIQUE KEY `assignment_id` (`assignment_id`,`user_id`),
  ADD KEY `score_fk0` (`assignment_id`),
  ADD KEY `score_fk1` (`user_id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `class_user_role`
--
ALTER TABLE `class_user_role`
  ADD UNIQUE KEY `user_role` (`class_id`,`user_id`),
  ADD KEY `class_teacher_student_fk1` (`user_id`),
  ADD KEY `class_teacher_student_fk2` (`role_id`),
  ADD KEY `class_id` (`class_id`) USING BTREE;

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date_created` (`date_created`),
  ADD KEY `comments_fk0` (`user_id`),
  ADD KEY `comments_fk1` (`post_id`);

--
-- Chỉ mục cho bảng `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_fk0` (`post_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_fk0` (`user_id`),
  ADD KEY `posts_fk1` (`type`),
  ADD KEY `posts_fk2` (`class_id`),
  ADD KEY `posts_fk3` (`topic`);

--
-- Chỉ mục cho bảng `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `post_visibility`
--
ALTER TABLE `post_visibility`
  ADD KEY `visibility_fk0` (`class_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `student_files`
--
ALTER TABLE `student_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_file_fk0` (`user_id`),
  ADD KEY `std_file_fk1` (`class_id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `date_birth` (`birth`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_types`
--
ALTER TABLE `post_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `student_files`
--
ALTER TABLE `student_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `assignment_user_score`
--
ALTER TABLE `assignment_user_score`
  ADD CONSTRAINT `score_fk0` FOREIGN KEY (`assignment_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `score_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `class_user_role`
--
ALTER TABLE `class_user_role`
  ADD CONSTRAINT `class_teacher_student_fk0` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `class_teacher_student_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `class_teacher_student_fk2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Các ràng buộc cho bảng `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_fk0` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_fk1` FOREIGN KEY (`type`) REFERENCES `post_types` (`id`),
  ADD CONSTRAINT `posts_fk2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `posts_fk3` FOREIGN KEY (`topic`) REFERENCES `topics` (`id`);

--
-- Các ràng buộc cho bảng `post_visibility`
--
ALTER TABLE `post_visibility`
  ADD CONSTRAINT `visibility_fk0` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Các ràng buộc cho bảng `student_files`
--
ALTER TABLE `student_files`
  ADD CONSTRAINT `std_file_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `std_file_fk1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
