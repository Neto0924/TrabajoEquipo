/*
Navicat MySQL Data Transfer

Source Server         : utltic2019
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : bsistema_farmacia

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2019-07-09 20:43:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for catalogo_medicamento
-- ----------------------------
DROP TABLE IF EXISTS `catalogo_medicamento`;
CREATE TABLE `catalogo_medicamento` (
`id_medicamento`  int(11) NOT NULL ,
`nombre`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`codigo`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tipo_medicamento`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`activo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_medicamento`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of catalogo_medicamento
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for detalle_paciente
-- ----------------------------
DROP TABLE IF EXISTS `detalle_paciente`;
CREATE TABLE `detalle_paciente` (
`id_detalle_paciente`  int(255) NOT NULL ,
`id_paciente`  int(255) NULL DEFAULT NULL ,
`id_medicamento`  int(255) NULL DEFAULT NULL ,
`comentario`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tipo_alergia`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`id_registro`  int(255) NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(255) NULL DEFAULT NULL ,
PRIMARY KEY (`id_detalle_paciente`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of detalle_paciente
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for detalle_receta
-- ----------------------------
DROP TABLE IF EXISTS `detalle_receta`;
CREATE TABLE `detalle_receta` (
`id_detalle`  int(11) NOT NULL ,
`id_receta`  int(11) NULL DEFAULT NULL ,
`id_medicamento`  int(11) NULL DEFAULT NULL ,
`cantidad`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_detalle`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of detalle_receta
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for entradas
-- ----------------------------
DROP TABLE IF EXISTS `entradas`;
CREATE TABLE `entradas` (
`id_entrada`  int(11) NOT NULL ,
`id_medicamento`  int(11) NULL DEFAULT NULL ,
`cantidad`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`proveedor`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_entrada`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of entradas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for farmacias
-- ----------------------------
DROP TABLE IF EXISTS `farmacias`;
CREATE TABLE `farmacias` (
`id_farmacia`  int(11) NOT NULL ,
`numero_farmacia`  int(11) NULL DEFAULT NULL ,
`ubicacion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`encargado`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_farmacia`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of farmacias
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pacientes
-- ----------------------------
DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
`id_paciente`  int(255) NOT NULL ,
`id_persona`  int(255) NULL DEFAULT NULL ,
`numero_seguro`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tipo_sangre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`estatura`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`peso`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`id_detalle_paciente`  int(255) NULL DEFAULT NULL ,
`id_registro`  int(255) NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(255) NULL DEFAULT NULL ,
PRIMARY KEY (`id_paciente`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of pacientes
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
`id_persona`  int(11) NOT NULL ,
`nombre`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`ap_paterno`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`ap_materno`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`sexo`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
`direccion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`telefono`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecha_nacimiento`  date NULL DEFAULT NULL ,
`correo`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`tipo_persona`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`id_registro`  int(255) NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_regitro`  time NULL DEFAULT NULL ,
`activo`  int(255) NULL DEFAULT NULL ,
PRIMARY KEY (`id_persona`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of personas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for recetas
-- ----------------------------
DROP TABLE IF EXISTS `recetas`;
CREATE TABLE `recetas` (
`id_receta`  int(11) NOT NULL ,
`id_paciente`  int(11) NULL DEFAULT NULL ,
`id_doctor`  int(11) NULL DEFAULT NULL ,
`descripcion`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`id_medicamentos`  int(11) NULL DEFAULT NULL ,
`cantidad`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`codigo_receta`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_receta`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of recetas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for salidas
-- ----------------------------
DROP TABLE IF EXISTS `salidas`;
CREATE TABLE `salidas` (
`id_salida`  int(11) NOT NULL ,
`id_medicamento`  int(11) NULL DEFAULT NULL ,
`detalle_salida`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`cantidad`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecha_registro`  date NULL DEFAULT NULL ,
`hora_registro`  time NULL DEFAULT NULL ,
`activo`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id_salida`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci

;

-- ----------------------------
-- Records of salidas
-- ----------------------------
BEGIN;
COMMIT;
