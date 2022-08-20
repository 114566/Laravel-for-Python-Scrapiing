/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : scrap

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 17/07/2022 15:34:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `connection` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `queue` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (7, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (8, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_07_14_193708_create_products_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for scrap_data
-- ----------------------------
DROP TABLE IF EXISTS `scrap_data`;
CREATE TABLE `scrap_data`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `canada` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `america` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `australia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `switzerland` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `newzealand` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `japan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `germany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `france` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `england` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `turkey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scrap_data
-- ----------------------------
INSERT INTO `scrap_data` VALUES (1, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.1015', '19.000', '2022-07-16 12:05:07', '2022-07-16');
INSERT INTO `scrap_data` VALUES (2, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.1015', '19.000', '2022-07-16 13:05:11', '2022-07-16');
INSERT INTO `scrap_data` VALUES (3, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.1015', '19.000', '2022-07-16 14:05:15', '2022-07-16');
INSERT INTO `scrap_data` VALUES (4, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.1015', '19.000', '2022-07-16 15:05:21', '2022-07-16');
INSERT INTO `scrap_data` VALUES (5, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.1015', '19.000', '2022-07-16 16:05:27', '2022-07-16');
INSERT INTO `scrap_data` VALUES (6, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-16 17:05:33', '2022-07-16');
INSERT INTO `scrap_data` VALUES (7, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-16 19:50:57', '2022-07-16');
INSERT INTO `scrap_data` VALUES (8, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-17 00:13:57', '2022-07-17');
INSERT INTO `scrap_data` VALUES (9, '3.091', '2.928', '3.469', '-0.210', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-17 01:14:00', '2022-07-17');
INSERT INTO `scrap_data` VALUES (10, '3.091', '2.928', '3.469', '-0.210', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-17 02:14:04', '2022-07-17');
INSERT INTO `scrap_data` VALUES (11, '3.091', '2.928', '3.469', '-0.210', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-17 03:14:11', '2022-07-17');
INSERT INTO `scrap_data` VALUES (12, '3.091', '2.928', '3.469', '-0.210', '3.707', '0.224', '1.1300', '1.658', '2.0980', '19.000', '2022-07-17 04:14:20', '2022-07-17');
INSERT INTO `scrap_data` VALUES (13, '3.091', '2.928', '3.469', '-0.210', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 05:14:27', '2022-07-17');
INSERT INTO `scrap_data` VALUES (14, '3.091', '2.928', '3.469', '-0.210', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 06:14:35', '2022-07-17');
INSERT INTO `scrap_data` VALUES (15, '3.091', '2.928', '3.469', '-0.200', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 07:14:42', '2022-07-17');
INSERT INTO `scrap_data` VALUES (16, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 08:14:50', '2022-07-17');
INSERT INTO `scrap_data` VALUES (17, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 09:14:56', '2022-07-17');
INSERT INTO `scrap_data` VALUES (18, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 10:15:02', '2022-07-17');
INSERT INTO `scrap_data` VALUES (19, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 11:15:07', '2022-07-17');
INSERT INTO `scrap_data` VALUES (20, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 12:15:16', '2022-07-17');
INSERT INTO `scrap_data` VALUES (21, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 13:15:22', '2022-07-17');
INSERT INTO `scrap_data` VALUES (22, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 14:15:28', '2022-07-17');
INSERT INTO `scrap_data` VALUES (23, '3.091', '2.928', '3.469', '-0.240', '3.707', '0.224', '1.1300', '1.658', '2.1000', '19.000', '2022-07-17 15:15:39', '2022-07-17');

-- ----------------------------
-- Table structure for scrap_table
-- ----------------------------
DROP TABLE IF EXISTS `scrap_table`;
CREATE TABLE `scrap_table`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `canada` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `america` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `australia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `switzerland` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `newzealand` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `japan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `germany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `france` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `england` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `turkey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 400 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of scrap_table
-- ----------------------------
INSERT INTO `scrap_table` VALUES (1, '3.165', '2.967', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:19:45', '2022-07-15');
INSERT INTO `scrap_table` VALUES (2, '3.1671', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:20:48', '2022-07-15');
INSERT INTO `scrap_table` VALUES (3, '3.1672', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:21:00', '2022-07-15');
INSERT INTO `scrap_table` VALUES (4, '3.167', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:21:14', '2022-07-15');
INSERT INTO `scrap_table` VALUES (5, '3.1681', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:21:27', '2022-07-15');
INSERT INTO `scrap_table` VALUES (6, '2', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:21:40', '2022-07-15');
INSERT INTO `scrap_table` VALUES (7, '3.168', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:21:54', '2022-07-15');
INSERT INTO `scrap_table` VALUES (8, '3.1653', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:22:07', '2022-07-15');
INSERT INTO `scrap_table` VALUES (9, '3.1651', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:22:20', '2022-07-15');
INSERT INTO `scrap_table` VALUES (10, '3.165', '2.969', '3.450', '-0.300', '3.700', '0.227', '1.1550', '1.699', '2.0950', '19.000', '2022-07-15 04:22:34', '2022-07-15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
