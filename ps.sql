/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50641
 Source Host           : localhost:3306
 Source Schema         : ps

 Target Server Type    : MySQL
 Target Server Version : 50641
 File Encoding         : 65001

 Date: 22/05/2019 11:02:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ps_group
-- ----------------------------
DROP TABLE IF EXISTS `ps_group`;
CREATE TABLE `ps_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `pid` int(11) NOT NULL COMMENT '父级id',
  `name` varchar(32) NOT NULL COMMENT '部门名称',
  `manager_user_id` int(11) NOT NULL COMMENT '部门领导id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `ps_group_group_id_uindex` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
-- Table structure for ps_group_node
-- ----------------------------
DROP TABLE IF EXISTS `ps_group_node`;
CREATE TABLE `ps_group_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL COMMENT '权限节点id',
  `group_id` int(11) NOT NULL COMMENT '权限节点授权给组织 组织id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ps_group_node_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='权限节点授权组织表';

-- ----------------------------
-- Table structure for ps_group_user
-- ----------------------------
DROP TABLE IF EXISTS `ps_group_user`;
CREATE TABLE `ps_group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL COMMENT '组织id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ps_group_user_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='组织用户关联表';

-- ----------------------------
-- Table structure for ps_node
-- ----------------------------
DROP TABLE IF EXISTS `ps_node`;
CREATE TABLE `ps_node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '权限名称',
  `path1` varchar(64) DEFAULT NULL COMMENT '权限根路径',
  `path2` varchar(64) DEFAULT NULL COMMENT '权限2级路径',
  `path3` varchar(64) DEFAULT NULL COMMENT '权限3级路径',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 软删除 1正常',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`node_id`),
  UNIQUE KEY `ps_node_node_id_uindex` (`node_id`),
  KEY `ps_node_path1_path2_path3_index` (`path1`,`path2`,`path3`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='权限节点表';

-- ----------------------------
-- Records of ps_node
-- ----------------------------
BEGIN;
INSERT INTO `ps_node` VALUES (1, 'test权限', 'crm', 'user', 'edit', 1, 1558492452, 1558492452);
COMMIT;

-- ----------------------------
-- Table structure for ps_product
-- ----------------------------
DROP TABLE IF EXISTS `ps_product`;
CREATE TABLE `ps_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '产品名称',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `ps_product_product_id_uindex` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Table structure for ps_product_node
-- ----------------------------
DROP TABLE IF EXISTS `ps_product_node`;
CREATE TABLE `ps_product_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL COMMENT '权限节点id',
  `product_id` int(11) DEFAULT NULL COMMENT '产品id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ps_product_node_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品权限关联表';

-- ----------------------------
-- Table structure for ps_role
-- ----------------------------
DROP TABLE IF EXISTS `ps_role`;
CREATE TABLE `ps_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '角色名称',
  `group_id` int(11) DEFAULT NULL COMMENT '角色所属组织id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `ps_role_role_id_uindex` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of ps_role
-- ----------------------------
BEGIN;
INSERT INTO `ps_role` VALUES (1, '超级管理员', 1, 1558487605, 1558487605);
COMMIT;

-- ----------------------------
-- Table structure for ps_role_group
-- ----------------------------
DROP TABLE IF EXISTS `ps_role_group`;
CREATE TABLE `ps_role_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `group_id` int(11) NOT NULL COMMENT '组织id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ps_role_group_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色组织授权表';

-- ----------------------------
-- Table structure for ps_role_node
-- ----------------------------
DROP TABLE IF EXISTS `ps_role_node`;
CREATE TABLE `ps_role_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL COMMENT '角色id',
  `node_id` int(11) DEFAULT NULL COMMENT '权限节点id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ps_role_node_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色和权限节点关联表';

-- ----------------------------
-- Records of ps_role_node
-- ----------------------------
BEGIN;
INSERT INTO `ps_role_node` VALUES (1, 1, 1, 1558492452, 1558492452);
COMMIT;

-- ----------------------------
-- Table structure for ps_role_user
-- ----------------------------
DROP TABLE IF EXISTS `ps_role_user`;
CREATE TABLE `ps_role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ps_role_user_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色用户授权表';

-- ----------------------------
-- Records of ps_role_user
-- ----------------------------
BEGIN;
INSERT INTO `ps_role_user` VALUES (1, 1, 1, 1558487605, 1558487605);
COMMIT;

-- ----------------------------
-- Table structure for ps_user
-- ----------------------------
DROP TABLE IF EXISTS `ps_user`;
CREATE TABLE `ps_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `mobile` varchar(32) NOT NULL COMMENT '手机号',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `group_id` int(11) NOT NULL COMMENT '组织id，关联group表',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `ps_user_user_id_uindex` (`user_id`),
  UNIQUE KEY `ps_user_mobile_uindex` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of ps_user
-- ----------------------------
BEGIN;
INSERT INTO `ps_user` VALUES (1, '18523552185', 1558487605, 1558487605, 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
