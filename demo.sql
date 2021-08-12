/*
 Navicat Premium Data Transfer

 Source Server         : 本机
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : demo

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 12/08/2021 14:50:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES (1, 'one');
INSERT INTO `permission` VALUES (2, 'two');
INSERT INTO `permission` VALUES (3, 'three');
INSERT INTO `permission` VALUES (4, 'four');
INSERT INTO `permission` VALUES (5, 'five');
INSERT INTO `permission` VALUES (6, 'six');
INSERT INTO `permission` VALUES (7, 'serve');
INSERT INTO `permission` VALUES (8, 'eight');
INSERT INTO `permission` VALUES (9, 'supper');
INSERT INTO `permission` VALUES (10, 'test');
INSERT INTO `permission` VALUES (11, 'demo');
INSERT INTO `permission` VALUES (12, 'home');
INSERT INTO `permission` VALUES (13, 'yanshi');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'guali');
INSERT INTO `role` VALUES (2, 'admin');
INSERT INTO `role` VALUES (3, 'guest');
INSERT INTO `role` VALUES (4, 'vip');
INSERT INTO `role` VALUES (5, 'wang');
INSERT INTO `role` VALUES (6, 'january');
INSERT INTO `role` VALUES (7, 'febuary');
INSERT INTO `role` VALUES (8, 'march');
INSERT INTO `role` VALUES (9, 'april');
INSERT INTO `role` VALUES (10, 'may');
INSERT INTO `role` VALUES (11, 'july');
INSERT INTO `role` VALUES (12, 'august');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission`  (
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES (11, 6);
INSERT INTO `role_permission` VALUES (2, 3);
INSERT INTO `role_permission` VALUES (8, 1);
INSERT INTO `role_permission` VALUES (8, 2);
INSERT INTO `role_permission` VALUES (9, 7);
INSERT INTO `role_permission` VALUES (3, 7);
INSERT INTO `role_permission` VALUES (2, 2);
INSERT INTO `role_permission` VALUES (11, 8);
INSERT INTO `role_permission` VALUES (10, 7);
INSERT INTO `role_permission` VALUES (10, 9);
INSERT INTO `role_permission` VALUES (1, 2);
INSERT INTO `role_permission` VALUES (1, 1);
INSERT INTO `role_permission` VALUES (2, 4);
INSERT INTO `role_permission` VALUES (4, 6);
INSERT INTO `role_permission` VALUES (4, 7);
INSERT INTO `role_permission` VALUES (9, 8);
INSERT INTO `role_permission` VALUES (10, 12);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'xiaobai');
INSERT INTO `user` VALUES (2, 'wang');
INSERT INTO `user` VALUES (3, 'liyang');
INSERT INTO `user` VALUES (4, 'tutula');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `uid` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (2, 7);
INSERT INTO `user_role` VALUES (2, 4);
INSERT INTO `user_role` VALUES (3, 6);
INSERT INTO `user_role` VALUES (3, 2);
INSERT INTO `user_role` VALUES (1, 12);
INSERT INTO `user_role` VALUES (1, 4);
INSERT INTO `user_role` VALUES (3, 12);
INSERT INTO `user_role` VALUES (2, 3);
INSERT INTO `user_role` VALUES (3, 1);
INSERT INTO `user_role` VALUES (2, 8);
INSERT INTO `user_role` VALUES (1, 3);
INSERT INTO `user_role` VALUES (1, 2);
INSERT INTO `user_role` VALUES (1, 1);
INSERT INTO `user_role` VALUES (1, 11);
INSERT INTO `user_role` VALUES (1, 10);
INSERT INTO `user_role` VALUES (1, 9);
INSERT INTO `user_role` VALUES (1, 8);
INSERT INTO `user_role` VALUES (1, 7);
INSERT INTO `user_role` VALUES (1, 6);
INSERT INTO `user_role` VALUES (1, 5);

SET FOREIGN_KEY_CHECKS = 1;
