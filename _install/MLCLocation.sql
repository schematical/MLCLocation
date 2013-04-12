/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : util

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2013-03-30 11:24:24
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `MLCLocation`
-- ----------------------------
DROP TABLE IF EXISTS `MLCLocation`;
CREATE TABLE `MLCLocation` (
  `idLocation` int(11) NOT NULL AUTO_INCREMENT,
  `shortDesc` varchar(128) DEFAULT NULL,
  `address1` varchar(128) DEFAULT NULL,
  `address2` varchar(128) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `zip` varchar(16) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `idAccount` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLocation`),
  KEY `FK_Location_idAccount` (`idAccount`),
  CONSTRAINT `FK_Location_idAccount` FOREIGN KEY (`idAccount`) REFERENCES `AuthAccount` (`idAccount`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of MLCLocation
-- ----------------------------
