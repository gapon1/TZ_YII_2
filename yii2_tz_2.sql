/*
 Navicat Premium Data Transfer

 Source Server         : test
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : yii2_tz_2

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 17/06/2019 20:27:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES (1, 'pc', 'description for pc');
INSERT INTO `category` VALUES (2, 'notebook', 'description for notebook');
INSERT INTO `category` VALUES (3, 'watch', 'description for wotch');
INSERT INTO `category` VALUES (4, 'Phone', 'Description for phone category');
INSERT INTO `category` VALUES (5, 'sdf', 'sdf');
COMMIT;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
BEGIN;
INSERT INTO `migration` VALUES ('m000000_000000_base', 1560611234);
INSERT INTO `migration` VALUES ('m190520_162259_create_category_table', 1560611235);
INSERT INTO `migration` VALUES ('m190520_162356_create_product_table', 1560611235);
INSERT INTO `migration` VALUES ('m190615_150604_create_review_table', 1560611236);
COMMIT;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inx-category-cat_id` (`cat_id`),
  CONSTRAINT `fk-category-cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES (1, 1, 'macbook', 'Screen 13.3 \"IPS (2560x1600) Retina, glossy / Intel Core i5 (2.3 - 3.6 GHz) / RAM 8 GB / SSD 128 GB / Intel Iris Plus Graphics 640 / without ML / Wi-Fi / Bluetooth', '0e91a23aed0788246ae3b85bdce77a01.png', 2200);
INSERT INTO `product` VALUES (2, 2, 'iMAC', 'Screen 21.5 \"IPS (1920x1080) LED / Intel Core i5 (2.3 - 3.6 GHz) / RAM 8 GB / HDD 1 TB / Intel Iris Plus Graphics 640 / without OD / ', 'c28704d78cbbe7fa45797f31bdb37d6e.png', 6999);
INSERT INTO `product` VALUES (3, 2, 'macbook air', 'Brief characteristics: Screen 13.3 \"(1440x900) WXGA + LED / Intel Core i5 (1.8 - 2.9 GHz) / RAM 8 GB / SSD 128 GB / Intel HD Graphics 6000 / W / O / Wi-Fi / Bluetooth', '5433df8c4c5263f807934cd893a6d7dd.png', 1100);
INSERT INTO `product` VALUES (4, 3, 'apple watch', 'Introducing Apple Watch Series 4. Watches with a completely new design and new technologies. They help to lead an even more active lifestyle, better monitor health and stay in touch.', 'b251d556a4dc4b931ecdfa76f08e709d.png', 599);
INSERT INTO `product` VALUES (5, 4, 'Iphone', 'Description for iphone', '', 996);
COMMIT;

-- ----------------------------
-- Table structure for review
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inx-product-product_id` (`product_id`),
  CONSTRAINT `fk-product-product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of review
-- ----------------------------
BEGIN;
INSERT INTO `review` VALUES (1, 1, '2019-06-05', 'test1', 'test@gmail.com', 'Sori for the star is not tea pressed equipment comes off on the PC in the price of 7-14 to UAH can be less');
INSERT INTO `review` VALUES (2, 2, '2019-06-11', 'test2', 'test2@gmail.com', '1 Disadvantage Great price for a weak nightstand 2 Disadvantage there is no way to replace the vidyuhi RAM disk and SSD on ios or Windows as convenient for everything');
INSERT INTO `review` VALUES (3, 5, '2019-06-18', 'test3', 'test3@gmail.com', 'housand 18-25, well, clave with a mouse, and then govri. + Everything, do not forget that the brand does not come from the air, I\'m not a fan of apple.');
INSERT INTO `review` VALUES (4, 4, '2019-06-14', 'test4', 'test2@gmail.com', 'Apple Watch Series 4 GPS + Cellular 40mm Space Gray Aluminum Case with Black Sport Band (MTUG2)\nLeave feedback');
INSERT INTO `review` VALUES (5, 2, '2019-06-12', 'test5', 'test5@gmail.com', 'MacBook Air works without recharging for up to 12 hours - this means that all day you');
INSERT INTO `review` VALUES (6, 3, '2019-06-17', 'test6', 'test@gmail.com', 'Review MacBook Air works without recharging for up to 12 hours - this means that all day you ');
INSERT INTO `review` VALUES (7, 1, '2019-06-17', 'vitalii hapon', 'JanetRSchmid@dayrep.comtuktk', 'MacBook Air works without recharging for up to 12 hours - this means that all day you 99');
INSERT INTO `review` VALUES (8, 3, '2019-06-17', 'test 7', 'JanetRSchmid@dayrep.comtuktk', 'Test 7review Review MacBook Air works without recharging for up to 12 hours - this means that all day you ');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
