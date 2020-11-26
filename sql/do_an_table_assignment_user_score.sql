
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `assignment_user_score`
--

CREATE TABLE `assignment_user_score` (
  `assignment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
