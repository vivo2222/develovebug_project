
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
  `avatar` varchar(255) DEFAULT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `subject`, `code`, `semester`, `room`, `avatar`, `created_date`) VALUES
(1, 'WEB APPLICATION', '12345', '2020-2021', 'F502', 'img/class1.png', '2020-11-19'),
(2, 'DATA DTRUCTURE', '12DGHRGEFW', '2019-2020', 'A403', 'img/class1.png', '2020-11-03'),
(4, 'Mang may tinh', 'dfzdfghj', '2020-2021', 'A705', 'img/class1.png', '2020-11-19'),
(5, 'ENGLISH 3', 'DDSDFGKMM', '2020-2021', 'A123', 'img/class1.png', '2020-11-19');
