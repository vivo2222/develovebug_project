
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
(1, 41, 2),
(2, 41, 2),
(4, 34, 2),
(4, 41, 3),
(5, 39, 3),
(5, 34, 2),
(1, 1, 1),
(2, 1, 1),
(5, 1, 1),
(4, 1, 1);
