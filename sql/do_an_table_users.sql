
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
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fullname`, `birth`, `tel`, `token`, `verified`) VALUES
(1, 'admin', '$2y$10$ucR2cxo.9CYwjRlCbGPVt.LBiVMUcnxTaAZ5Ix91n/LraxZBOY.42', 'votuongvi2222002@gmail.com', 'Võ Tường Vi', '2001-02-22', '0917004354', 'b4aac8d6af01d41e128491e55fad93e4ee31c230433d1e506ae41af3915170e5e238833efe834b0fb6e82e74b1d258df0735', 1),
(34, 'huy123', '$2y$10$HcchhupddFBhvPcx58AWsOQ4XWYQEJGbHVZO4uyZruTuz5AEC.YdG', 'ngochuy11010@gmail.com', 'Nguyen Le Ngoc HUy', '2020-11-03', '', '11e1e908227f95c108c9a8e23b17d8aae84134dfafc6d9cbcacf2fe1999ca3c67a455bad41be26c0abeed9bc5be551d5e1b2', 1),
(39, 'chinhle', '$2y$10$2GupGzkq3iH.S/a7GgCq9uqQ8gPbhGCp7JeCbU1bJYN6vXYR4ZKMi', 'chinhle6030@gmail.com', 'Chinh Le', '2020-11-02', '', '9fbc500d3cddb5e33d338a3ed07918b06045c3f4df6a092afa875fef0be3499060732957a8bb90635dc26df8710231467f3a', 1),
(41, 'vivo22', '$2y$10$wS5OY.pZorQPlWwmlAsXe.WD.goHD7ncxz2YUdX2wvBzZb3fsS80i', 'tuongvivo222@gmail.com', 'Vo Tuong Vi', '2020-11-10', '', '5f6e5bf07a589bcb8055f4ba0ffd466ce072f49dadcb8b7f5042142b3823550402409678d854241df0a1107b5976fcd1b67c', 1);
