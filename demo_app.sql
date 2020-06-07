SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for applications
-- ----------------------------
DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` smallint(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') CHARACTER SET utf8 NOT NULL DEFAULT 'Pending',
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `role` enum('Admin','Employee') CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_by` int(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`email`) USING BTREE,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'admin@test.com', '$2y$10$29xN6tOQbL42Ksuu5wClFe9iKT4EBinuzyGZfrC.w.jRIdAGqUUM2', 'Admin', 'Giannis', 'Toutoulis', 1, '2020-06-06 14:02:56', 1, '2020-06-07 06:35:20');
INSERT INTO `users` VALUES (2, 'peter@test.com', '$2y$10$POW8Rrp8Nd.YAHlHLzQwf.VLLlVki2RaNcqtkgIYxxzntVHMpVpgK', 'Employee', 'Peter', 'Sanchez', 1, '2020-06-06 14:12:35', 1, '2020-06-06 14:12:35');
INSERT INTO `users` VALUES (3, 'nick@test.com', '$2y$10$Pu5Rfw4ETUWuyzbEkysyIeSGlYVjDxNT1QyQhshx2a3ZzECVqzTGO', 'Employee', 'Nick', 'Liolos', 1, '2020-06-06 16:07:22', 1, '2020-06-06 19:18:41');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
