/*
 Navicat Premium Data Transfer

 Source Server         : db
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : social-network

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 13/01/2021 13:57:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user1_id` int NULL DEFAULT NULL,
  `user2_id` int NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of friends
-- ----------------------------
INSERT INTO `friends` VALUES (8, 6, 4, NULL, NULL);
INSERT INTO `friends` VALUES (9, 5, 4, NULL, NULL);
INSERT INTO `friends` VALUES (10, 4, 7, NULL, NULL);
INSERT INTO `friends` VALUES (11, 4, 8, NULL, NULL);
INSERT INTO `friends` VALUES (12, 4, 9, NULL, NULL);

-- ----------------------------
-- Table structure for friends_requests
-- ----------------------------
DROP TABLE IF EXISTS `friends_requests`;
CREATE TABLE `friends_requests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user1_id` bigint UNSIGNED NULL DEFAULT NULL,
  `user2_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user1_id`(`user1_id`) USING BTREE,
  INDEX `user2_id`(`user2_id`) USING BTREE,
  CONSTRAINT `friends_requests_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `friends_requests_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of friends_requests
-- ----------------------------

-- ----------------------------
-- Table structure for likes
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 142 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of likes
-- ----------------------------
INSERT INTO `likes` VALUES (102, 2, 5);
INSERT INTO `likes` VALUES (103, 1, 5);
INSERT INTO `likes` VALUES (104, 3, 5);
INSERT INTO `likes` VALUES (120, 3, 4);
INSERT INTO `likes` VALUES (127, 12, 6);
INSERT INTO `likes` VALUES (128, 11, 6);
INSERT INTO `likes` VALUES (136, 12, 4);
INSERT INTO `likes` VALUES (141, 15, 4);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2020_12_17_132409_create_user', 1);

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES (11, 'images/photos/5ff4291fcac911_Sfmx-F7kzbnuT-QQmL4dAQ.jpeg', 4);
INSERT INTO `photos` VALUES (12, 'images/photos/5ff4479f0afc722-Beautiful-Photos-of-Mauritius-14.jpg', 4);
INSERT INTO `photos` VALUES (13, 'images/photos/5ff447a7c22aa1_Sfmx-F7kzbnuT-QQmL4dAQ.jpeg', 4);
INSERT INTO `photos` VALUES (14, 'images/photos/5ff56d1f9dac022-Beautiful-Photos-of-Mauritius-14.jpg', 4);
INSERT INTO `photos` VALUES (15, 'images/photos/5ffece67e2bc70-Mauritius-Beachcomber-treux-au-biches-11-1024x683.jpg', 4);

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES (1, 5, 'asnisnfidsnansfinsd', NULL, NULL);
INSERT INTO `statuses` VALUES (2, 5, 'Asdonfonsafno', NULL, NULL);
INSERT INTO `statuses` VALUES (3, 6, 'asfasdf', NULL, NULL);
INSERT INTO `statuses` VALUES (4, 5, 'Status2', NULL, NULL);
INSERT INTO `statuses` VALUES (5, 5, 'Status3', NULL, NULL);
INSERT INTO `statuses` VALUES (6, 5, 'status4', NULL, NULL);
INSERT INTO `statuses` VALUES (11, 4, 'st', NULL, NULL);
INSERT INTO `statuses` VALUES (12, 4, 'sadf', '2021-01-03 12:43:22', NULL);
INSERT INTO `statuses` VALUES (14, 4, 'asdfasdfadsfasdf', '2021-01-06 14:25:02', '2021-01-06 14:25:02');
INSERT INTO `statuses` VALUES (15, 4, 'asdfadfadsf', '2021-01-06 14:28:51', '2021-01-06 14:28:51');
INSERT INTO `statuses` VALUES (16, 4, 'asfsadf', '2021-01-06 14:31:55', '2021-01-06 14:31:55');
INSERT INTO `statuses` VALUES (17, 4, 'asdf', '2021-01-13 10:41:53', '2021-01-13 10:41:53');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/icons/avatar.png',
  `registered` int NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `user_status` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (4, 'Marat', 'Arzumanyan', 'maratundying@gmail.com', '$2y$10$EzvzOnepwVMIJ/VfzRnM/.a2oIKCDV91mdAVMPlzLmpTNXLd2V5sW', 'images/photos/5ffece67e2bc70-Mauritius-Beachcomber-treux-au-biches-11-1024x683.jpg', 1, '2020-12-17 13:44:58', '2021-01-13 10:41:44', '');
INSERT INTO `user` VALUES (5, 'SADFK', 'ASKDF', 'marat@mail.ru', '$2y$10$vIk3nT9BEckFMDKPfajoKuBEouz9eN5sEKGQioi/rpn3hs8wRKaO2', 'images/icons/avatar.png', 1, '2020-12-23 18:24:04', '2020-12-23 18:24:04', NULL);
INSERT INTO `user` VALUES (6, 'Anna', 'Hakobyan', 'maratundying@mail.ru', '$2y$10$/tPPwUe3Zpwj0naNFA.T/.lVOqrsOthI8trVPy6Qm8jSAYGayfj5K', 'images/icons/avatar.png', 1, '2020-12-30 13:31:39', '2020-12-30 13:31:39', NULL);
INSERT INTO `user` VALUES (7, 'mamamamamama', 'mamamamamamamama', 'masdaf@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL);
INSERT INTO `user` VALUES (8, 'qwerwqerni', 'nininini', 'ninininini@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL);
INSERT INTO `user` VALUES (9, 'momomo', 'sadfasf', 'msomom@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL);
INSERT INTO `user` VALUES (10, 'asfasf', 'safdasdfasfsadf', 'marartwsadf@mail.ru', '', 'images/icons/avatar.png', 1, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
