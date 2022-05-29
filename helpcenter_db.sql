/*
 Navicat Premium Data Transfer

 Source Server         : localDB
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : helpcenter_db

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 29/05/2022 22:55:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_num` int(6) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `icon_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, NULL, 'Order Query', 1, NULL, '20220529062003_62931093b5bf2.svg', '2022-05-29 06:20:20', '2022-05-29 06:20:20');
INSERT INTO `categories` VALUES (2, NULL, 'Product & Stock', 2, NULL, '20220529062037_629310b58a714.svg', '2022-05-29 06:20:45', '2022-05-29 06:20:45');
INSERT INTO `categories` VALUES (3, NULL, 'Delivery', 3, NULL, '20220529062053_629310c5ec5d3.svg', '2022-05-29 06:21:03', '2022-05-29 06:21:03');
INSERT INTO `categories` VALUES (4, NULL, 'Returns & Refunds', 4, NULL, '20220529062128_629310e865944.svg', '2022-05-29 06:21:29', '2022-05-29 06:21:29');
INSERT INTO `categories` VALUES (5, NULL, 'Payments & Promos', 5, NULL, '20220529062138_629310f2b9ff3.svg', '2022-05-29 06:21:49', '2022-05-29 06:21:49');
INSERT INTO `categories` VALUES (6, NULL, 'Technical', 6, NULL, '20220529062206_6293110eb2c3e.svg', '2022-05-29 06:22:07', '2022-05-29 06:22:07');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('admin@example.com', '$2y$10$So1.7neOHt7PRcAVAFaVDu7JQJWzhv/gAQLttJqsu9fxxEZ9kQTPO', '2022-05-29 03:50:15');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `category_id` int(6) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `rank` int(10) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES (1, 1, 'Why are my item[s] delayed?', 'We\'re sorry. There have been some unforeseen delays, which means your order will arrive later than planned. We know this isn\'t ideal. And we know how excited you are about your order – we can’t wait to see how much you love it, too. Which is why we’re working non-stop to get your item[s] to you as quickly as possible.\r\n\r\nThere has been a huge increase in demand for homewares and furniture, which puts a lot of pressure on the makers and artisans who craft our products. And, there are also significant port delays, so our deliveries are taking much longer than usual.\r\n\r\nHow are we improving this? With new distribution centres to speed up dispatches and reduce lead times, so your items are with you sooner. And, we’ve also increased our customer service team, so there’s always someone available to give you support.\r\n\r\nYou can find delivery information for your order in the \'My Account\' section of our website. And you\'ll always see our most up-to-date view of when we expect to dispatch your product – so this may change over the course of your item[s] journey to us.\r\n \r\nIf you haven’t set up an account and password, simply enter the email address used to place the order and use the \'forgotten password?\' option to see this information.\r\n\r\nWe know just how much you want to enjoy your new item[s], which is why we’re always finding fresh ways to grow and improve, so each shopping experience with us is MADE even better than the last', 0, '2022-05-29 06:26:18', '2022-05-29 06:26:18');
INSERT INTO `questions` VALUES (2, 1, 'Can my order be sped up?', 'As we make our products in batches, we can\'t speed orders up. We do sometimes have extra stock, which we mark as \'Express Delivery\' on our site. These pieces are posted within a few days, and a courier will be in touch to confirm an exact delivery date.', -1, '2022-05-29 06:26:46', '2022-05-29 12:46:03');
INSERT INTO `questions` VALUES (3, 1, 'What if my order is incomplete?', '<p>We\'re sorry. There have been some unforeseen delays, which means your order will arrive later than planned. We know this isn\'t ideal. </p><p>And we know how excited you are about your order – we can’t wait to see how much you love it, too. Which is why we’re working non-stop to get your item[s] to you as quickly as possible.\r\n</p><p>\r\nThere has been a huge increase in demand for homewares and furniture, which puts a lot of pressure on the makers and artisans who craft our products. And, there are also significant port delays, so our deliveries are taking much longer than usual.\r\n\r\nHow are we improving this? With new distribution centres to speed up dispatches and reduce lead times, so your items are with you sooner. </p><p>And, we’ve also increased our customer se<b>rvice team, so there’s always someo</b>ne available to give you support.\r\n\r\nYou can find delivery information for your order in the \'My Account\' section of our website. And you\'ll always see our most up-to-date view of when we expect to dispatch your product – so<u> this may change over the </u>course of your item[s] journey to us.\r\n \r\nIf you haven’t set up an account and password, simply enter the email address used to place the order and use the \'forgotten password?\' option to see this information.\r\n\r\nWe know just how much you want to enjoy your new item[s], which is why we’re always finding fresh ways to grow and improve, so each shopping experience with us is MADE even better than the last</p>', 1, '2022-05-29 06:27:12', '2022-05-29 13:43:07');
INSERT INTO `questions` VALUES (4, 2, 'I received the wrong product, what shall I do?', 'Firstly, we\'re sorry you received the wrong product. Please contact us with details of your order and what you\'ve received and we\'ll get it sorted', 1, '2022-05-29 06:27:42', '2022-05-29 12:58:45');
INSERT INTO `questions` VALUES (5, 2, 'Where are MADE.com\'s products manufactured?', 'We travel to various locations to find you the best furniture makers in the world, all of our products are manufacturing by various suppliers in different locations.', 0, '2022-05-29 06:28:10', '2022-05-29 06:28:10');
INSERT INTO `questions` VALUES (6, 3, 'If I order several items, will they be delivered at the same time?', 'As long as all your items are with the same carrier, and the difference in lead times isn\'t too much, grouped delivery will be given as an option at the checkout for you to pick if you would like to do this and have all items delivered together.', 0, '2022-05-29 06:29:09', '2022-05-29 06:29:09');
INSERT INTO `questions` VALUES (7, 1, 'te', '<p>tset</p>', -8, '2022-05-29 12:25:20', '2022-05-29 12:56:36');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@example.com', NULL, '$2y$10$mQKM/K/xsIPR8oM5OEnICu0Yk5iuPZOVRveuUgEZ9vH2GORJiHwP2', NULL, '2022-05-28 12:39:31', '2022-05-28 12:39:31');
INSERT INTO `users` VALUES (2, 'admin', 'admin1@example.com', NULL, '$2y$10$mQKM/K/xsIPR8oM5OEnICu0Yk5iuPZOVRveuUgEZ9vH2GORJiHwP2', NULL, '2022-05-28 12:39:31', '2022-05-28 12:39:31');

SET FOREIGN_KEY_CHECKS = 1;
