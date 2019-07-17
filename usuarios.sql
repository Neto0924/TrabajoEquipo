/*
Navicat MySQL Data Transfer

Source Server         : DAW-9
Source Server Version : 50715
Source Host           : localhost:3306
Source Database       : utltic2019

Target Server Type    : MYSQL
Target Server Version : 50715
File Encoding         : 65001

Date: 2019-07-15 20:25:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` text,
  `contra` text,
  `id_persona` int(11) DEFAULT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `pvez` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'paperez', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '0', '2019-06-19', '01:55:03', '1');
INSERT INTO `usuarios` VALUES ('7', 'maria', '827ccb0eea8a706c4c34a16891f84e7b', '10', '1', '0', '2019-05-09', '16:28:27', '1');
INSERT INTO `usuarios` VALUES ('8', 'saeed', '827ccb0eea8a706c4c34a16891f84e7b', '11', '1', '0', '2019-05-09', '16:28:29', '1');
INSERT INTO `usuarios` VALUES ('17', 'netoherrera', 'e10adc3949ba59abbe56e057f20f883e', '13', '1', '0', '2019-06-19', '15:24:44', '1');
