/*
 Navicat Premium Data Transfer

 Source Server         : 123
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : mys

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 06/11/2023 20:41:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book_info
-- ----------------------------
DROP TABLE IF EXISTS `book_info`;
CREATE TABLE `book_info`  (
  `book_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `publish` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ISBN` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `introduction` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `price` decimal(10, 2) NOT NULL,
  `pubdate` date NULL DEFAULT NULL,
  `class_id` int(11) NULL DEFAULT NULL,
  `pressmark` int(11) NULL DEFAULT NULL,
  `number` smallint(6) NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50000012 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_info
-- ----------------------------
INSERT INTO `book_info` VALUES (10000004, '空虚时代', '吉尔·波利维茨基', '万卷出版公司', '9787505414709', '步入后现代社会以后，集体主义的宏大叙事逐渐被个人主义所解构。伴随着私有化不断扩大、消费主义不断深入，全新的自由意识形态与传统道德观念发生对撞。在推倒权威与规制之后，个性化的思潮却以享乐文化取代了义务，以“欲望机器”取代了英雄主义的历史。我们对伟大的理想、遥远的未来失去兴趣，只活在当下，只关注自我，心灵不可避免地落入虚无之中。法国著名社会学家、哲学家吉尔·利波维茨基试图从混乱复杂的现象中，澄清现代社会个体精神、文化、生活、未来面临的诸多问题，为“我们终将去往何方”找到答案。全书从自恋、冷漠、诱惑、空虚、幽默、暴力等一系列元素入手，结合阶级、性别、代际等不同层面的理论研究，勾勒出了以多元化和个性化为演化脉络的当今制度与文化全景。', 15.00, '2007-04-03', 7, 2, 13);
INSERT INTO `book_info` VALUES (10000005, '方法的力量', '任仲然', '中央编译出版社', '9787539943893', '本书共50章，内容包括：方法的奥秘，奇妙的力量；方法论发展史上的五座里程碑；文化力+工具力+技术技能力=方法力；得“鱼”不如得“渔”；中国辩证法：老子、庄子、孙子的真知灼见等。', 74.80, '2011-05-05', 7, 2, 12);
INSERT INTO `book_info` VALUES (10000006, '协举方法论', '梁映敏', '光明日报出版社', '9787508647357', '本书分四章，内容包括：导论；哲学改革与方法论创新；协举方法论的历史基础；协举方法论的基本内容；协举方法论的实践价值。', 68.00, '2014-11-01', 11, 3, 132);
INSERT INTO `book_info` VALUES (10000007, '工作的本质', '远藤功 ', ',中国科学技术出版社', '9787801656087', '本书的主要内容包括：终极思考法、“创意交流”的秘诀、用6种思维方法超越“逻辑思考”、“条理清晰的逻辑”的组装方法、推荐“骨太逻辑”的“本质思考”、“动态剧本”的制作方法、能够应对变化的“剧本平台”的秘诀、调动人的秘诀、打动人的秘诀、如何加深关系、顶级顾问的“听力”、“说话方式”、“行动方式”、比起“用耳朵听”，“用心听”的方法、热情通过行动来表现、活用大脑的思想和习惯、作为专业人士的自觉性和思想准备、发表幻灯片制作术、“语言的结晶化”比起“记录”更能留在“记忆”中、专业人士实践的“报纸·读书术”+“时间术”阅读日经新闻的诀窍，即使很忙也要每月读15本、笔记术也全部公开、笔记分为两本，在笔记上写上“思考的覆盖物”等。', 358.20, '2009-04-06', 11, 3, 11);
INSERT INTO `book_info` VALUES (10000010, '社会科学方法论', '马克思·韦伯', '商务印书馆', '9787111126768', '本书分以下三部分：社会科学认识和社会政策认识的“客观性”、文化科学逻辑领域的批判性研究、社会学与经济学的“价值阙如”的意义，探讨了社会科学领域中的诸多论题。', 88.00, '2003-08-05', 6, 5, 12);
INSERT INTO `book_info` VALUES (50000004, '华夏人文概览', '章必功 ', '高等教育出版社', '9787020125265', '本书以“人文文化”立论, 编撰时“史”、“论”结合, 将数千年来我国哲学、史学、文学、宗教、伦理、艺术、美学、社会思潮及制度变革等领域的重要精神成果熔于一炉, 从中总结传统价值之大要, 概略了解华夏人文传统。', 99.80, '2017-04-01', 9, 13, 1);
INSERT INTO `book_info` VALUES (50000005, '社会科学论稿', '杨庆存 ', '人民出版社', '9787550265608', '本书对国家社科基金项目的宗旨、目标和要求进行了全面系统、深入细致的具体阐释，以大量的生动案例和深切的工作体会，说明了组织申报国家社科基金项目在选题、论证和开展研究等方面必须注意的诸多问题。', 60.00, '2016-01-01', 9, 13, 12);
INSERT INTO `book_info` VALUES (50000007, '人文基础', '向怀林', '重庆大学出版社', '9787530216859', '本书内容包括：哲学、历史、文学、艺术、传统与习俗五个部分，对人文知识进行常识性、基础性介述，体例分为通论、文献、实践三个部分。', 39.50, '2017-06-01', 9, 13, 1);
INSERT INTO `book_info` VALUES (50000008, '公共管理研究方法', '梁莹 ', '武汉大学出版社', '9787513325745', '本书阐释了分析、解决现实公共管理问题过程中的方法论及不同研究方法的具体运用等内容，并辅以相关研究实例。', 35.00, '2017-05-01', 9, 12, 1);
INSERT INTO `book_info` VALUES (50000009, '中国科举考试制度', '张希清', '中国书籍出版社', '9787807023777', '科举考试是中国历目前一种十分重要的选拔官员的制度。它创始于隋而确立于唐，完备于宋，而延续至元、明、清，前后经历了一千三百年之久。科举考试制度在相当程度上体现了公平竞争、择优录用的原则，历代统治者通过科举考试，也的确选拔了不少治国安民的有用之才；同时，科举考试制度又成为套在广大士人脖子上的一具枷锁，既锢思想，又摧残人才，这在清朝后期尤为突出。关于中国的科举考试制度，有许多宝贵的经验教训值得认真加以总结。以古为鉴，可以察今。本书将主要对中国的科举考试制度本身作一些概括性的介绍，以期引起大家进一步研究的兴趣，进而从中获得应有的教益。', 26.00, '2007-01-01', 9, 12, 1);
INSERT INTO `book_info` VALUES (50000010, '闯关东人', '曹保明 ', '中国文史出版社', '9787501162734', '本书主要记录东北历史上有名的“闯关东”的文化现象。书稿用生动有趣的文字，翔实地记载了当年从中原地区到达东北的中原移民的整体迁徙活动过程的各种困惑与苦难，特别是这种大规模迁移过程中所形成的各种民俗艺术特征，既是一种历史的记录，也是一次重要的人类文化交流。在字里行间，作者把这种文化现象进行了认真地梳理，对人类在与自然、历史和文化的互动当中如何形成的这种文化类型进行了探索、思考和归集。', 12.00, '2003-01-01', 9, 16, 0);
INSERT INTO `book_info` VALUES (50000011, '大国领导力', '阎学通', '中信出版集团', '9787550252585', '作者从中国历史和哲学中汲取深刻的见解，继续对国际关系领域的传统学术理论提出挑战--领导力才是大国崛起和衰落的共同原因，运作制度的人--即政府--才是超越“制度”对国家更为重要的因素。作者认为，改革能力应该成为领导力的核心。这里的改革，既包括所有社会领域的改革，也包括对制度的改革。各种层面和领域改革都具有促进国家崛起的作用。同时，作者也强调，作为领导力核心的改革能力仅适用于推动社会发生有建设性变化的变革，而非涵盖任意方向的变化，尤其需要排除的是会造成社会发展倒退，甚至是带来破坏性的变化。因为从大国实力相对性的角度来看，自我破坏就意味着竞争对手实力的提升。', 42.00, '2015-06-01', 9, 18, 1);

-- ----------------------------
-- Table structure for card
-- ----------------------------
DROP TABLE IF EXISTS `card`;
CREATE TABLE `card`  (
  `id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of card
-- ----------------------------
INSERT INTO `card` VALUES ('124', 'lfy', '', 'admin');

-- ----------------------------
-- Table structure for class_info
-- ----------------------------
DROP TABLE IF EXISTS `class_info`;
CREATE TABLE `class_info`  (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`class_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of class_info
-- ----------------------------
INSERT INTO `class_info` VALUES (1, '马克思主义');
INSERT INTO `class_info` VALUES (2, '哲学');
INSERT INTO `class_info` VALUES (3, '社会科学总论');
INSERT INTO `class_info` VALUES (4, '政治法律');
INSERT INTO `class_info` VALUES (5, '军事');
INSERT INTO `class_info` VALUES (6, '经济');
INSERT INTO `class_info` VALUES (7, '文化');
INSERT INTO `class_info` VALUES (8, '语言');
INSERT INTO `class_info` VALUES (9, '文学');
INSERT INTO `class_info` VALUES (10, '艺术');
INSERT INTO `class_info` VALUES (11, '历史地理');
INSERT INTO `class_info` VALUES (12, '自然科学总论');
INSERT INTO `class_info` VALUES (13, ' 数理科学和化学');
INSERT INTO `class_info` VALUES (14, '天文学、地球科学');
INSERT INTO `class_info` VALUES (15, '生物科学');
INSERT INTO `class_info` VALUES (16, '医药、卫生');
INSERT INTO `class_info` VALUES (17, '农业科学');
INSERT INTO `class_info` VALUES (18, '工业技术');
INSERT INTO `class_info` VALUES (19, '交通运输');
INSERT INTO `class_info` VALUES (20, '航空、航天');
INSERT INTO `class_info` VALUES (21, '环境科学');
INSERT INTO `class_info` VALUES (22, '综合');

-- ----------------------------
-- Table structure for list
-- ----------------------------
DROP TABLE IF EXISTS `list`;
CREATE TABLE `list`  (
  `list` bigint(255) NOT NULL AUTO_INCREMENT,
  `book_id` bigint(20) NOT NULL,
  `id` int(20) NOT NULL,
  `date` date NULL DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`list`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 100211 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of list
-- ----------------------------
INSERT INTO `list` VALUES (100201, 10000001, 116, '2023-10-19', '1');
INSERT INTO `list` VALUES (100202, 50000004, 116, '2023-10-05', '10');
INSERT INTO `list` VALUES (100203, 50000004, 116, '2023-10-02', '31');
INSERT INTO `list` VALUES (100204, 50000008, 116, '2023-06-01', '50');
INSERT INTO `list` VALUES (100205, 10000003, 116, '2023-10-10', '15');
INSERT INTO `list` VALUES (100206, 50000011, 123, '2023-10-05', '13');
INSERT INTO `list` VALUES (100207, 50000011, 123, '2023-10-11', '312');
INSERT INTO `list` VALUES (100208, 50000011, 123, '2023-10-19', '123');
INSERT INTO `list` VALUES (100209, 10000006, 123, '2023-10-19', '12');
INSERT INTO `list` VALUES (100210, 50000012, 123, '2023-10-18', '123');

-- ----------------------------
-- Table structure for user_card
-- ----------------------------
DROP TABLE IF EXISTS `user_card`;
CREATE TABLE `user_card`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `card_state` tinyint(255) NULL DEFAULT NULL,
  `permission` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_card
-- ----------------------------
INSERT INTO `user_card` VALUES (116, 'zwc', '116', 0, 'user');
INSERT INTO `user_card` VALUES (123, 'xjl', '123', 1, 'user');
INSERT INTO `user_card` VALUES (12344, 'lfyyy', '123', 1, 'user');
INSERT INTO `user_card` VALUES (3123123, 'lfyyyyyy', '123', 0, 'user');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES (116, 'zwc', 'man', '312313', '3231@qq.com', '12331312');
INSERT INTO `user_info` VALUES (1234, '柳飞扬', 'woman', '123123', '2048683154@qq.com', '15984288761');
INSERT INTO `user_info` VALUES (12344, 'lfyyy', 'mam', '321323213', '3213213@qq.com', '3213213');
INSERT INTO `user_info` VALUES (3123123, 'lfyyyyyy', 'mam', '3123213', '3213123123@qq.com', '3213123');

SET FOREIGN_KEY_CHECKS = 1;
