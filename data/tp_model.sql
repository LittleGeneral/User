/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tp_model

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-12 14:35:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for model_user
-- ----------------------------
DROP TABLE IF EXISTS `model_user`;
CREATE TABLE `model_user` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL COMMENT '注册邮箱',
  `sid` varchar(255) DEFAULT NULL COMMENT 'sessionid',
  `account` int(16) NOT NULL COMMENT '系统分配账号',
  `passwd` varchar(55) NOT NULL COMMENT '密码',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `logintime` int(11) NOT NULL COMMENT '上次登录时间',
  `is_delete` tinyint(1) NOT NULL DEFAULT '1' COMMENT '删除状态',
  `loginip` varchar(36) NOT NULL COMMENT '上次登录IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户表';
