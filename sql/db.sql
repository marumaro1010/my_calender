--
-- 資料表結構 `event_list`
--

CREATE TABLE `event_list` (
  `el_id` int(11)  UNSIGNED NOT NULL AUTO_INCREMENT,
  `el_content` text NOT NULL,
  `el_date` date NOT NULL,
  PRIMARY KEY (`el_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
