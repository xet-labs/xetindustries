DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
  `uid` VARCHAR(50) NOT NULL UNIQUE,
  `name` VARCHAR(50) NOT NULL,
  `name_l` VARCHAR(80),
  `email` VARCHAR(50) NOT NULL UNIQUE,
  `pass` VARCHAR(255) NOT NULL,
  `role` ENUM('admin', 'dev', 'user') DEFAULT 'user',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` DATETIME DEFAULT NULL,
  `status` ENUM('active', 'inactive', 'suspended', 'deleted') DEFAULT 'active',
  `profile_picture` VARCHAR(255) DEFAULT NULL,
  `address` TEXT DEFAULT NULL,
  `phone_number` VARCHAR(20) DEFAULT NULL,
  `dob` DATE DEFAULT NULL,
  `config` JSON DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
