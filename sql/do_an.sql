-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2020 lúc 10:55 AM
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
-- Cơ sở dữ liệu: `do_an`
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
  `avatar` varchar(255) NOT NULL DEFAULT 'img/class1.png',
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `subject`, `code`, `semester`, `room`, `avatar`, `created_date`) VALUES
(1, 'WEB APPLICATION', '12345', '2020-2021', NULL, 'img/class1.png', '2020-11-19'),
(2, 'DATA DTRUCTURE', '12DGHRGEFW', '2019-2020', '12DGHRGEFW', 'img/class1.png', '2020-11-03'),
(4, 'Nhap mon man may tinh', 'dfzdfghj', '2020-2021', 'A705', 'img/class1.png', '2020-11-19'),
(5, 'ENGLISH 3', 'DDSDFGKMM', '2020-2021', 'A123', 'img/class1.png', '2020-11-19'),
(6, 'NHẬP MÔN HỆ ĐIỀU HÀNH', 'SDFGHJKL', '2019-2021', 'C406', 'img/class1.png', '2020-11-20'),
(8, 'Triết học Mac-Lenin', 'sdfghsdhtfyjjkl', '2020-2021', 'C503', 'img/class1.png', '2020-11-04'),
(9, 'Ve chan dung', 'YNBN3h', '2019-2020', 'C120', 'img/class1.png', '2020-11-26'),
(10, 'Ve mat', 'nDKdXq', '2019-2020', '123', '', '2020-11-26'),
(11, 'mac cuoi', 'UzJmje', '2019-2020', 'C120', '', '2020-11-26'),
(12, 'buon ngu', 'xHLFh8', '2019-2020', 'A123', '', '2020-11-26'),
(13, 'BASIC OF MATH', 'b4e0982f1c37', '2019', 'C007', 'img/class1.png', '2020-11-28'),
(14, 'English 2', 'f0f8bb', '2019-2020', 'C120', 'img/class1.png', '2020-11-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_user_role`
--

CREATE TABLE `class_user_role` (
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `class_user_role`
--

INSERT INTO `class_user_role` (`class_id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(8, 1, 1),
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 1),
(1, 41, 2),
(2, 41, 2),
(4, 34, 2),
(5, 34, 2),
(6, 44, 2),
(6, 45, 2),
(8, 39, 2),
(8, 43, 2),
(9, 41, 2),
(10, 51, 2),
(11, 41, 2),
(12, 41, 2),
(13, 41, 2),
(14, 41, 2),
(2, 34, 3),
(2, 39, 3),
(2, 43, 3),
(2, 44, 3),
(2, 45, 3),
(2, 51, 3),
(4, 41, 3),
(5, 39, 3),
(6, 41, 3),
(8, 41, 3),
(10, 41, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `content` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_visibility`
--

CREATE TABLE `comment_visibility` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
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
  `date_created` date NOT NULL,
  `limit_time` date DEFAULT NULL,
  `num_comments` int(11) NOT NULL,
  `num_views` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL
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
(34, 'huy123', '$2y$10$HcchhupddFBhvPcx58AWsOQ4XWYQEJGbHVZO4uyZruTuz5AEC.YdG', 'ngochuy11010@gmail.com', 'Nguyen Le Ngoc HUy', '2020-11-03', '', '11e1e908227f95c108c9a8e23b17d8aae84134dfafc6d9cbcacf2fe1999ca3c67a455bad41be26c0abeed9bc5be551d5e1b2', 1, 'img/avatar.png'),
(39, 'chinhle', '$2y$10$2GupGzkq3iH.S/a7GgCq9uqQ8gPbhGCp7JeCbU1bJYN6vXYR4ZKMi', 'chinhle6030@gmail.com', 'Chinh Le', '2020-11-02', '', '9fbc500d3cddb5e33d338a3ed07918b06045c3f4df6a092afa875fef0be3499060732957a8bb90635dc26df8710231467f3a', 1, 'img/avatar.png'),
(41, 'vivo22', '$2y$10$wS5OY.pZorQPlWwmlAsXe.WD.goHD7ncxz2YUdX2wvBzZb3fsS80i', 'tuongvivo222@gmail.com', 'Vo Tuong Vi', '2020-11-10', '', '5f6e5bf07a589bcb8055f4ba0ffd466ce072f49dadcb8b7f5042142b3823550402409678d854241df0a1107b5976fcd1b67c', 1, 'img/avatar.png'),
(43, 'lanhuong1234', '$2y$10$sYtkakD.vXl3i8CwyHOjIO8u2a5qZVBFGSW8fFPyocPVQOpP9Rvsm', 'langhuongnnguyen@gmail.com', 'Lan Cam Suc', '2020-11-13', '01234744615', '441b413faa6d931631f2d019c8ea90e3a6239bd321b67bd92d7c1e7810db276133ffe9fe26d087b49b8c7db6be1434250455', 1, 'img/avatar.png'),
(44, 'binh1234', '$2y$10$r1EdWuvHlMOEG4QWJquFWOzBvAgkBLw3qq0JY67052UmRD1A9pOfC', 'binhnguyen1234@gmail.com', 'Nguyễn Quốc Bình', '2020-10-31', '0947355907', 'd680d45d9f65f4371204a40373a6b1d8b44097494bb41ee422b99c7f61fe426c5f6eb8a4f4d88d231964054bf4160aa90325', 1, 'img/avatar.png'),
(45, 'tunguyen', '$2y$10$.w7u9NYJUxKzwKlmuGB3UOIrYsBPd4R7lzusNXTRfE2g3aUUBeMDi', 'tunguyen1234@gmail.com', 'Nguyễn Đình Tú', '2020-11-04', '', '5d968d0b6326008bb16df5e4cb117130ece99974c4903a037dd6626164768f35e89790d4202b5464bc89521cedf4713f8463', 1, 'img/avatar.png'),
(51, 'huy2', '$2y$10$3D2wfcnu8cWCvhTL5y02cO1O/t1.4/333vIQTmKll0Dxm8dI9LnyC', 'clone20011001@gmail.com', 'huy2', '2020-11-20', '0947355907', '0b716abe741e0eb6313c6aeb727b322a825ce3dab32c52aa08171850f12f38ff24dd359879cf03b2b81cdb5cce5095c7b6f7', 1, 'img/avatar.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `assignment_user_score`
--
ALTER TABLE `assignment_user_score`
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
  ADD UNIQUE KEY `topic_class_index` (`topic`,`class_id`),
  ADD KEY `posts_fk0` (`user_id`),
  ADD KEY `posts_fk1` (`type`),
  ADD KEY `posts_fk2` (`class_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
