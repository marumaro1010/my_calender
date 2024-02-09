--
-- 資料表結構 `event_list`
--

CREATE TABLE `event_list` (
  `el_id` bigint NOT NULL,
  `el_content` text NOT NULL,
  `el_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 資料表索引 `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`el_id`);