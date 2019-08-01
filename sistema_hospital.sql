/*
 Navicat Premium Data Transfer

 Source Server         : TIC201909
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : sistema_hospital

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 23/07/2019 19:12:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas`  (
  `id_area` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for citas
-- ----------------------------
DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas`  (
  `id_cita` int(255) NOT NULL AUTO_INCREMENT,
  `id_persona` int(255) NULL DEFAULT NULL,
  `fecha_cita` date NULL DEFAULT NULL,
  `hora_cita` time(6) NULL DEFAULT NULL,
  `id_consultorio` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for consultorios
-- ----------------------------
DROP TABLE IF EXISTS `consultorios`;
CREATE TABLE `consultorios`  (
  `id_consultorio` int(255) NOT NULL AUTO_INCREMENT,
  `id_area` int(255) NULL DEFAULT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_consultorio`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for detalle_paciente
-- ----------------------------
DROP TABLE IF EXISTS `detalle_paciente`;
CREATE TABLE `detalle_paciente`  (
  `id_detalle_paciente` int(255) NOT NULL,
  `id_paciente` int(255) NULL DEFAULT NULL,
  `id_medicamento` int(255) NULL DEFAULT NULL,
  `comentario` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_alergia` int(255) NULL DEFAULT NULL,
  `alergia` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_paciente`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for doctores
-- ----------------------------
DROP TABLE IF EXISTS `doctores`;
CREATE TABLE `doctores`  (
  `id_doctor` int(255) NOT NULL AUTO_INCREMENT,
  `id_persona` int(255) NULL DEFAULT NULL,
  `id_especialidad` int(255) NULL DEFAULT NULL,
  `cedula` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_consultorio` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_doctor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for especialidades
-- ----------------------------
DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades`  (
  `id_especialidad` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `cedula` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_especialidad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pacientes
-- ----------------------------
DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes`  (
  `id_paciente` int(255) NOT NULL,
  `id_persona` int(255) NULL DEFAULT NULL,
  `numero_seguro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_sangre` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estatura` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `peso` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_detalle_paciente` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_paciente`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas`  (
  `id_persona` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ap_paterno` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ap_materno` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `sexo` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fecha_nacimiento` date NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tipo_persona` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_sede` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES (1, 'Linares', '', '', '', 'Provileon 301', '(821)-212-12-11', '0000-00-00', '', '', 1, 1, '2019-07-22', '10:28:07.000000', 1);
INSERT INTO `personas` VALUES (2, 'Kevin', 'Uriegas', 'LOpez', 'M', 'La Petaca', '(821)-124-07-81', '1998-11-28', 'kevin.uriegaslo@icloud.com', 'estudiante', NULL, 1, '2019-07-15', '21:29:53.000000', 1);

-- ----------------------------
-- Table structure for sedes
-- ----------------------------
DROP TABLE IF EXISTS `sedes`;
CREATE TABLE `sedes`  (
  `id_sede` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sede`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sedes
-- ----------------------------
INSERT INTO `sedes` VALUES (1, 'Linares', 'Provileon 301', '(821)-212-12-11', 1, '2019-07-22', '10:29:41.000000', 1);
INSERT INTO `sedes` VALUES (2, 'Hualahuises', 'Santa Rosa Hualahuises', '(212)-121-21-21', 1, '2019-07-22', '10:50:28.000000', 1);
INSERT INTO `sedes` VALUES (3, 'Montemorelos', 'Montemorelos NL', '(333)-111-32-32', 1, '2019-07-22', '11:21:01.000000', 1);
INSERT INTO `sedes` VALUES (4, 'Allende', 'Allende NL', '(212)-121-21-33', 1, '2019-07-22', '11:20:21.000000', 1);

-- ----------------------------
-- Table structure for tipo_trabajadores
-- ----------------------------
DROP TABLE IF EXISTS `tipo_trabajadores`;
CREATE TABLE `tipo_trabajadores`  (
  `id_tipo_trabajador` int(255) NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_trabajador`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_trabajadores
-- ----------------------------
INSERT INTO `tipo_trabajadores` VALUES (0, 'Dogtor', 1, '2019-07-22', '20:15:07.000000', '1');

-- ----------------------------
-- Table structure for trabajadores
-- ----------------------------
DROP TABLE IF EXISTS `trabajadores`;
CREATE TABLE `trabajadores`  (
  `id_trabajador` int(255) NOT NULL AUTO_INCREMENT,
  `id_persona` int(255) NULL DEFAULT NULL,
  `id_tipo_trabajador` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_trabajador`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for turnos
-- ----------------------------
DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos`  (
  `id_turno` int(255) NOT NULL AUTO_INCREMENT,
  `turno` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_cita` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_turno`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int(255) NOT NULL,
  `id_persona` int(255) NULL DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pvez` int(255) NULL DEFAULT NULL,
  `id_registro` int(255) NULL DEFAULT NULL,
  `fecha_registro` date NULL DEFAULT NULL,
  `hora_registro` time(6) NULL DEFAULT NULL,
  `activo` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 1, 'sebastianovp', 'edff8ffff3eede1544596e41e5e0ffba', 0, 1, '2019-06-04', '20:57:36.000000', 1);

SET FOREIGN_KEY_CHECKS = 1;
