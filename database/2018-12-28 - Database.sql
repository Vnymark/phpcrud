CREATE DATABASE IF NOT EXISTS `varbi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci;
USE `varbi`;

CREATE TABLE `profiles` (
  `id` int(255) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;


ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `profiles`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;