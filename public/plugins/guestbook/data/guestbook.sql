SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cmf_plugin_sy_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `gw_plugin_sy_guestbook`;
CREATE TABLE `gw_plugin_sy_guestbook` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '留言ID号',
  `name` varchar(50) DEFAULT NULL COMMENT '留言者姓名',
  `tel` varchar(15) DEFAULT NULL COMMENT '留言者电话',
  `email` varchar(50) DEFAULT NULL COMMENT '留言者邮箱',
  `qq` varchar(15) DEFAULT NULL COMMENT '留言者QQ号',
  `weixin` varchar(15) DEFAULT NULL COMMENT '留言者微信号',
  `subject` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `message` text COMMENT '留言信息',
  `isread` tinyint(2) DEFAULT '1' COMMENT '是否查看过',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cmf_plugin_sy_guestbook
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
