/*
Navicat MySQL Data Transfer

Source Server         : aa
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : mcake

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-09-06 00:01:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mcake_goods
-- ----------------------------
DROP TABLE IF EXISTS `mcake_goods`;
CREATE TABLE `mcake_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `en_gname` varchar(255) NOT NULL COMMENT '商品的英文名称',
  `cn_gname` varchar(255) NOT NULL COMMENT '商品的英文名称',
  `type` varchar(32) NOT NULL COMMENT '商品类别名称',
  `descr` varchar(255) NOT NULL COMMENT '蛋糕简介',
  `price` varchar(255) NOT NULL COMMENT '价格',
  `picname` varchar(255) NOT NULL COMMENT '图片',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '商品状态 0:无 1:新品  2:人气 3:金牌 4:售馨',
  `size` varchar(255) NOT NULL COMMENT '蛋糕的尺寸',
  `state` varchar(255) NOT NULL COMMENT '特别说明',
  `clicknum` int(11) NOT NULL COMMENT '点击 次数',
  `addtime` varchar(32) NOT NULL COMMENT '添加时间',
  `taste` varchar(32) NOT NULL COMMENT '口感',
  `feeling` varchar(255) NOT NULL COMMENT '口味',
  `basefeel` varchar(32) NOT NULL COMMENT '口味基底',
  `sour` tinyint(11) NOT NULL COMMENT '酸味',
  `sweet` tinyint(11) NOT NULL COMMENT '甜味',
  `weight` varchar(128) NOT NULL COMMENT '蛋糕磅数',
  `material_name` varchar(255) NOT NULL COMMENT '原材料名称',
  `explain` varchar(255) DEFAULT NULL COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mcake_goods
-- ----------------------------
INSERT INTO `mcake_goods` VALUES ('1', 'Carré Blanc', '简', '慕斯', 'La célèbre pâte feuilletée, les myrtilles bien sélectionnées, la génoise au fromage fondante,Voilà notre Carré Blanc pour les horoscopes de la vierge. C’est la perfection !\r\n\r\n法国国宝级拿破仑酥皮、精心挑选的野生蓝莓、口感绝佳的轻乳芝士，献给极致挑剔的处女座。外表极致简洁，内心醇厚酥脆。必须美味，必须完美！', '218,318,', '55e942891ab3f.jpg,55e942891ab3f.jpg,55e942891ab3f.jpg,', '0', ' 适合2-3人食用 SIZE:16cm*10cm*5.5cm  需提前5小时预定, 适合4-7人食用 SIZE:23cm*14cm*5.5cm  需提前5小时预定,,', 'dsfsd', '0', '20150904150444', '酥脆浓郁 ', '奶油/水果/芝士', 'Mousse', '0', '1', '1,2', '0-法国奶油,0-法国黄油,17-甄选草莓,17-世界甄选蓝莓,2-比利时白巧克力,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('2', 'Le MOJITO', 'Mojito 柠•漾', '水果', 'Une mousse au citron vert légèrement aromatisée au rhum blanc, une gélée verte de menthe, le Mojito vous présente une harmonie entre l’acidité et la fraîcheur.\r\n\r\nMojito 柠•漾，柔滑慕斯内蕴Q弹酒冻，绝妙配比带来口感的平衡，不太浓烈也不过于寡淡，青柠独特的酸甜带出白朗姆酒的微醺之意。', '218,318,', '55e943e97de29.jpg,55e943e981b32.jpg,55e943e981b32.jpg,', '0', ' 适合2-3人食用 SIZE:15cm*4.5cm  需提前5小时预定, 适合4-7人食用 SIZE:18cm*5.0cm  需提前5小时预定, 适合8-12人食用 SIZE:22cm*5.0cm  需提前24小时预定,', '0', '0', '20150904151036', '入口即化 ', '水果/巧克力', 'Mousse ', '0', '2', '1,2,3', '0-法国奶油,1-新西兰黄油,0-法国果茸,2-比利时白巧克力,3-马来西亚薄荷糖浆,17-世界甄选青柠檬,4-波多黎各朗姆酒,17-甄选薄荷叶,', null);
INSERT INTO `mcake_goods` VALUES ('3', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('4', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('5', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('6', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('7', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('8', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('9', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('10', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('11', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('12', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('13', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('14', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('15', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('16', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('17', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '1', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('18', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '1', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('19', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '1', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('20', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('21', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('22', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('23', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('24', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('25', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '0', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('26', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '4', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('27', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '1', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('28', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '2', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
INSERT INTO `mcake_goods` VALUES ('29', 'Nos jours heureux', '悦时光', '芝士', 'Choisir une après-midi, dégustez notre mousses différentes, chaque saveur apporte un sens unique Un petit part, se placée immédiatement à Paris.\r\n\r\n一段午后，品尝一下慕斯的绵柔细腻，每一款都带来一份特有的意境 小小一块“悦时光”，悦享巴黎的最美时光\r\n', '218,318,', '55e94728f0537.jpg,55e9472900000.jpg,55e9472903d09.jpg,', '3', ' 适合2-3人食用 SIZE:6*3.5*6个  需提前5小时预定, 适合4-7人食用 SIZE:6*3.5*12个  需提前5小时预定,,', '1磅含原味3个，抹茶、玫瑰、可可味各1个；2磅含原味6个，抹茶、玫瑰、可可味各2个； ', '0', '20150904152428', '入口即化 ', '芝士', 'Cheese', '0', '1', '1,2', '0-法国奶油,0-法国可可粉,1-新西兰黄油,5-韩国幼砂糖,17-臻选抹茶粉,6-云南玫瑰汁,0-法国番石榴糖浆,0-法国荔枝酒,1-新西兰奶油奶酪,', null);
