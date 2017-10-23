/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50633
 Source Host           : localhost
 Source Database       : laravel-base

 Target Server Type    : MySQL
 Target Server Version : 50633
 File Encoding         : utf-8

 Date: 10/23/2017 13:42:02 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(256) DEFAULT NULL,
  `account_name` varchar(256) DEFAULT NULL,
  `account_nick_name` varchar(256) DEFAULT NULL,
  `account_real_name` varchar(256) DEFAULT NULL,
  `account_email` varchar(256) DEFAULT NULL,
  `account_tel` varchar(64) DEFAULT NULL,
  `account_sex` int(11) DEFAULT NULL,
  `account_address` varchar(256) DEFAULT NULL,
  `account_intro` text,
  `account_status` int(11) DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL COMMENT '1管理员，2会员',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(256) DEFAULT NULL,
  `account_last_login` datetime DEFAULT NULL,
  `account_last_ip` varchar(256) DEFAULT NULL,
  `account_image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `account`
-- ----------------------------
BEGIN;
INSERT INTO `account` VALUES ('1', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'super_admin', null, '超级管理员', '345293340@qq.com', '15135161111', '1', null, null, '1', '1', '2017-02-08 11:11:11', '1', '2017-06-15 09:03:27', null, null, '2017-06-15 09:03:27', '127.0.0.1', null), ('2', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'admin', '小三', '管理员1', 'admin@163.com1', '151351622221', '2', null, null, null, '1', '2017-04-07 03:27:24', null, '2017-10-10 08:50:39', null, 'xOs2iDd6OOaD67Ehyn877FH22ZUl7m0FI3mL639aLdgYq4kZtBBg4cmOwLns', '2017-10-10 08:50:39', '127.0.0.1', 'http://pic.58pic.com/58pic/14/27/45/71r58PICmDM_1024.jpg'), ('3', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'zhangsan', null, '张三', 'zhangsan@163.com', '15135163333', '2', null, null, null, '2', null, null, null, null, null, null, null, null), ('4', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'lisi', null, '李四', 'lisi@163.com', '15135164444', '2', null, null, null, '2', null, null, null, null, null, null, null, null), ('5', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'wangwu', null, '王五', 'wangwu@163.com', '15135165555', '0', null, null, null, '2', null, null, null, null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `ad`
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `code` varchar(64) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ad`
-- ----------------------------
BEGIN;
INSERT INTO `ad` VALUES ('1', '首页轮播图片', 'ad_index_slider', '1', null, null, null, null), ('2', '111111', '11', '1', '2017-09-14 11:38:54', '2017-09-14 11:38:54', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `ad_item`
-- ----------------------------
DROP TABLE IF EXISTS `ad_item`;
CREATE TABLE `ad_item` (
  `ad_item_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ad_item_title` varchar(256) DEFAULT NULL,
  `ad_item_path` varchar(256) DEFAULT NULL,
  `ad_item_href` varchar(256) DEFAULT NULL,
  `ad_item_type` varchar(64) DEFAULT NULL,
  `ad_item_desc` text,
  `ad_item_sort` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ad_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `ad_item`
-- ----------------------------
BEGIN;
INSERT INTO `ad_item` VALUES ('1', '1', '/assets/front/images/ad1.jpg', 'introduction.html', 'image', null, null, '1', null, null, null, null), ('2', '2', '/assets/front/images/ad2.jpg', null, 'image', null, null, '1', null, null, null, null), ('3', '3', '/assets/front/images/ad3.jpg', null, 'image', null, null, '1', null, null, null, null), ('4', '4', '/assets/front/images/ad4.jpg', null, 'image', null, null, '1', null, null, null, null), ('5', '22', '/upload/image/201707/10/20170710161258575.jpg', '22', null, '2', '2', '3', '2017-07-10 16:19:12', '2017-07-10 16:13:02', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `sub_title` varchar(256) DEFAULT NULL,
  `summary` text,
  `content` text,
  `logo` varchar(256) DEFAULT NULL,
  `keyword` varchar(256) DEFAULT NULL,
  `tags` varchar(256) DEFAULT NULL,
  `source` varchar(256) DEFAULT NULL,
  `type` int(4) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `visibility` varchar(64) DEFAULT 'PUBLIC',
  `allow_comment` int(4) DEFAULT '1',
  `is_top` int(4) DEFAULT '0',
  `hit_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `close_time` datetime DEFAULT NULL,
  `publish_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `cms_article`
-- ----------------------------
BEGIN;
INSERT INTO `cms_article` VALUES ('1', '1', '阿斯达舒服撒发顺丰固定收入供热', '111', '111', '<p>1111111</p>', null, null, null, null, '1', 'PUBLISHED', 'PUBLIC', '0', '1', '0', '0', null, '2017-04-08 11:30:05', '2017-04-08 07:18:37', null, '2017-07-10 13:49:46', null), ('2', '6', '测试文章001', '222', '22', '<p>11111111</p>', null, null, null, null, null, 'PUBLISHED', 'PUBLIC', '1', '0', '0', '0', null, '2017-07-10 14:36:54', '2017-07-10 14:29:46', null, '2017-07-10 14:36:54', null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_catalog`
-- ----------------------------
DROP TABLE IF EXISTS `cms_catalog`;
CREATE TABLE `cms_catalog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `code` varchar(64) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_leaf` int(4) DEFAULT NULL,
  `template_index` varchar(256) DEFAULT NULL,
  `template_list` varchar(256) DEFAULT NULL,
  `template_detail` varchar(256) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `cms_catalog`
-- ----------------------------
BEGIN;
INSERT INTO `cms_catalog` VALUES ('1', null, '分类2', 'cat2', '1', '1', null, '0', '1', null, null, null, '2017-04-07 11:26:15', '2017-07-10 14:14:31', null, null), ('2', null, '分类4', 'cat4', '3', '1', null, '0', '1', null, null, null, '2017-04-07 11:27:49', '2017-07-10 14:15:03', null, null), ('3', null, '分类1', 'cat1', '0', '1', null, '0', '0', null, null, null, '2017-05-02 09:17:41', '2017-07-10 14:16:21', null, null), ('5', null, '分类3', 'cat3', '2', '1', null, '0', '1', null, null, null, '2017-07-10 14:09:12', '2017-07-10 14:14:47', null, null), ('6', null, '分类1-1', 'cat1-1', '1', '1', null, '3', '1', null, null, null, '2017-07-10 14:16:21', '2017-07-10 14:16:21', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_comment`
-- ----------------------------
DROP TABLE IF EXISTS `cms_comment`;
CREATE TABLE `cms_comment` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `article_id` bigint(20) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `visibility` int(4) DEFAULT '1',
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `cms_comment`
-- ----------------------------
BEGIN;
INSERT INTO `cms_comment` VALUES ('1', '0', '1', '1', '1', '11111111', null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cms_tag`;
CREATE TABLE `cms_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `article_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `friend_link`
-- ----------------------------
DROP TABLE IF EXISTS `friend_link`;
CREATE TABLE `friend_link` (
  `link_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_title` varchar(256) DEFAULT NULL,
  `link_image` varchar(256) DEFAULT NULL,
  `link_href` varchar(256) DEFAULT NULL,
  `link_desc` varchar(256) DEFAULT NULL,
  `link_sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `friend_link`
-- ----------------------------
BEGIN;
INSERT INTO `friend_link` VALUES ('1', '111', '/upload/image/201705/26/20170526152251332.png', '11', '11', '1', '2017-05-26 15:22:53', '2017-05-26 15:22:53'), ('2', '11', '/upload/image/201707/11/20170711062417423.jpg', '1', '11', '1', '2017-07-11 06:24:19', '2017-07-11 06:24:31');
COMMIT;

-- ----------------------------
--  Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_text` varchar(64) DEFAULT NULL,
  `menu_url` varchar(256) DEFAULT NULL,
  `menu_css` varchar(64) DEFAULT NULL,
  `menu_sort` int(11) DEFAULT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `menu_leaf` int(11) DEFAULT NULL,
  `menu_desc` varchar(256) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `menu`
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES ('1', '管理面板', '/admin', 'fa fa-home', '1', '0', '1', null, '2017-05-25 14:31:29', '2017-04-07 07:54:30', null, null), ('4', '会员管理', '/admin/account', 'fa fa-user', '4', '0', '1', '用户管理', '2017-07-04 15:10:22', '2017-05-25 14:21:44', null, null), ('6', '内容管理', '', 'fa fa-send', '6', '0', '0', null, '2017-07-07 11:47:26', '2017-05-25 14:30:31', null, null), ('7', '权限管理', null, 'fa fa-key', '7', '0', '0', null, '2017-05-25 14:21:44', '2017-05-25 14:21:44', null, null), ('8', '系统配置', '', 'fa fa-cog', '8', '0', '0', null, '2017-05-25 14:21:44', '2017-05-25 14:02:32', null, null), ('62', '文章管理', '/admin/cms/article', '', '5', '6', '1', null, '2017-04-07 07:58:20', '2017-04-07 07:58:20', null, null), ('63', '文章分类', '/admin/cms/catalog', '', '6', '6', '1', null, '2017-04-07 07:57:47', '2017-04-07 07:57:47', null, null), ('64', '文章评论', '/admin/cms/comment', '', '7', '6', '1', null, '2017-04-07 07:58:53', '2017-04-07 07:58:53', null, null), ('70', '菜单管理', '/admin/menu', '', '1', '7', '1', null, '2017-05-25 14:05:14', '2017-05-25 14:05:14', null, null), ('71', '角色管理', '/admin/role', '', '2', '7', '1', null, '2017-05-25 14:06:37', '2017-05-25 14:06:37', null, null), ('72', '角色成员管理', '/admin/roleMember', '', '3', '7', '1', null, '2017-05-25 14:08:36', '2017-05-25 14:08:36', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1'), ('3', '2016_06_01_000001_create_oauth_auth_codes_table', '1'), ('4', '2016_06_01_000002_create_oauth_access_tokens_table', '1'), ('5', '2016_06_01_000003_create_oauth_refresh_tokens_table', '1'), ('6', '2016_06_01_000004_create_oauth_clients_table', '1'), ('7', '2016_06_01_000005_create_oauth_personal_access_clients_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `oauth_access_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_access_tokens` VALUES ('1249b8a7f873a8047c486c1a38c01caf165ffb796be194f19591493877d8b38de40aa6669ebf6498', '2', '2', null, '[]', '0', '2017-05-26 08:18:19', '2017-05-26 08:18:19', '2017-06-10 08:18:19'), ('197556685c5538e68536e3e3be78a786d4000590a702310e6c6a4f3e986d1e77883e55c897420ae7', '2', '2', null, '[]', '0', '2017-05-26 08:57:18', '2017-05-26 08:57:18', '2017-06-10 08:57:18'), ('2411696125a0b09bd66741aeeef0d15ac83c5fdd0d19ec07c4b8c7754d746e6897d6cad398d3257d', '2', '2', null, '[]', '0', '2017-07-17 02:16:50', '2017-07-17 02:16:50', '2017-08-01 02:16:50'), ('28dba3f2b4ab1a97130ce8f425c7cd9d32d3845b407a0cd28bd393fdec2e198248a94de31551c701', '2', '2', null, '[]', '0', '2017-05-26 08:28:04', '2017-05-26 08:28:04', '2017-06-10 08:28:04'), ('2d5cad40793aa64fee5353506ea42a735e7d9666ada9e32ed1cda97a079c9d9d2e5cde54766afde6', '2', '2', null, '[]', '0', '2017-05-26 08:25:08', '2017-05-26 08:25:08', '2017-06-10 08:25:08'), ('2e695cb992d686805008e118a62e1099b45b5fbb432ef62f38c00aa021d1381ec2a250a00110c71a', '2', '2', null, '[]', '0', '2017-06-30 08:16:33', '2017-06-30 08:16:33', '2017-07-15 08:16:33'), ('4325df6f9fdb2065810fc3b217e2ae878077bf55f5e34cd29404d83e6f77177b4b196616e99b7375', '2', '2', null, '[]', '0', '2017-06-30 08:19:18', '2017-06-30 08:19:18', '2017-07-15 08:19:18'), ('4c6757b98862bc93717d6b8a08c8c1ea2d794bafa4bbed5cd2a9fbb8c37752c3dcdb24aad89bc900', '2', '2', null, '[]', '0', '2017-05-26 08:05:08', '2017-05-26 08:05:08', '2017-06-10 08:05:08'), ('528e8a70fdd47c9f6626f67a8a03b0ebda08e3f8f689923f7925ec2dd7561ed7672603085b662b63', '2', '2', null, '[]', '0', '2017-06-30 02:15:35', '2017-06-30 02:15:35', '2017-07-15 02:15:35'), ('55e1da78b0834a46c920547ea643a78bb79fb337b0e4bc766cb1ab6ec0fb6cd48b9250ffa0a98374', '2', '2', null, '[]', '0', '2017-06-30 02:15:42', '2017-06-30 02:15:42', '2017-07-15 02:15:42'), ('78fdbf8a42c2dd407fe0bc0a9ce537cbce4c98ebae4f86bdd2ddb71f230a99bfa91b0960e0affc8f', '2', '2', null, '[]', '0', '2017-05-26 08:11:08', '2017-05-26 08:11:08', '2017-06-10 08:11:08'), ('7ff8ad0a26a12d4566c32191cc127716a1427425f8d204eb305bc7321b508daf975ebd8d9bc98d22', '2', '2', null, '[]', '0', '2017-05-26 08:15:58', '2017-05-26 08:15:58', '2017-06-10 08:15:58'), ('84f37734032a05106507a769ba7e0413584953acd9ec05c285b738580056af41f851cd53c8a09d64', '2', '2', null, '[]', '0', '2017-05-26 08:05:44', '2017-05-26 08:05:44', '2017-06-10 08:05:44'), ('977e2eb250ea0a64766d00eaf3f00c8fc0411ff63b4b1a5dbe485a609463ba948aabcb4c0bfb5b6b', '2', '2', null, '[]', '0', '2017-05-26 08:04:54', '2017-05-26 08:04:54', '2017-06-10 08:04:54'), ('b3b17354708c2011b9f4248e48ff16afd2e3a88c545e914982bb349167c48ed676e1adef3990de25', '2', '2', null, '[]', '0', '2017-05-26 08:27:04', '2017-05-26 08:27:04', '2017-06-10 08:27:04'), ('c2c197cb24ad566bdde0a0dbc50c0d2ea2a685f13c9d2014396e8720994e9dd51b2e29225b13109a', '2', '2', null, '[]', '0', '2017-06-30 02:42:41', '2017-06-30 02:42:41', '2017-07-15 02:42:41'), ('c3de4afb4f3e25a648ce9f9be704e3e4b5418274c6c0d4d4fdb276de6fa8f7fd3255a4df79607567', '2', '2', null, '[]', '0', '2017-05-26 08:06:11', '2017-05-26 08:06:11', '2017-06-10 08:06:11'), ('c7e6c554cb6a0da75e09593ea40e45e4ccc677b19df58cb1674e0e5b990e998a384444d6a2bcc2f0', '2', '2', null, '[]', '0', '2017-05-26 08:07:44', '2017-05-26 08:07:44', '2017-06-10 08:07:44'), ('cbf9d9318a9f5e9da6217d593e0e13ae801d8a06461e2b6aa6f11217e723a1c84e13082a40498186', '1', '2', null, '[\"*\"]', '0', '2017-04-11 07:24:00', '2017-04-11 07:24:00', '2017-04-26 07:24:00'), ('d72dafb97745260cf62b971773570a482caf685c3e79fb027994f32b455e72fab183df20d1e47764', '2', '2', null, '[]', '0', '2017-05-26 07:54:06', '2017-05-26 07:54:06', '2017-06-10 07:54:06'), ('d83beeedb900c57135e75bdd0533bc3cb14f9163560c697b484f818fc2b0b81b359fbb9a520be812', '2', '2', null, '[]', '0', '2017-06-30 02:36:21', '2017-06-30 02:36:21', '2017-07-15 02:36:21'), ('dc86856ec339f227ea1640194a73b69e3579ec29f20383674cf14eabd9015bd2952b60f1588afc2e', '1', '2', null, '[\"*\"]', '0', '2017-04-11 07:20:29', '2017-04-11 07:20:29', '2017-04-26 07:20:29'), ('e057b4f8c4b3f817d4f1282d1d1c78c0eca58d47d951b526186c1e201b15e66c3b75e3850af3c09d', '2', '2', null, '[]', '0', '2017-05-26 08:30:02', '2017-05-26 08:30:02', '2017-06-10 08:30:02'), ('f44a2002140dd90367577473b767e1dd700960367281c87f6b95c169174e614a7bc39dd67e8c4ade', '2', '2', null, '[]', '0', '2017-05-26 08:47:30', '2017-05-26 08:47:30', '2017-06-10 08:47:30');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_auth_codes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `oauth_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `oauth_clients`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_clients` VALUES ('1', null, 'Metronic Personal Access Client', 'AvvJuVpEcTVohUtWkPxnOmOOBz0B2bofWB7jz45S', 'http://localhost', '1', '0', '0', '2017-04-07 02:23:47', '2017-04-07 02:23:47'), ('2', null, 'Metronic Password Grant Client', 'x6KNV0voCgAQSQMIuUizUFu3UiALFPvyYsoFlihL', 'http://localhost', '0', '1', '0', '2017-04-07 02:23:47', '2017-04-07 02:23:47');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_personal_access_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `oauth_personal_access_clients`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2017-04-07 02:23:47', '2017-04-07 02:23:47');
COMMIT;

-- ----------------------------
--  Table structure for `oauth_refresh_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `oauth_refresh_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_refresh_tokens` VALUES ('', '', '0', null), ('2cff5b6f4bd12303acf50ec5e94da05fa88caefe75a8d0b86d7ca64449862b361ab5d83ec30e3210', '2d5cad40793aa64fee5353506ea42a735e7d9666ada9e32ed1cda97a079c9d9d2e5cde54766afde6', '0', '2017-06-25 08:25:08'), ('36239d815f4c7ebac35b0f96391134b781f5f3b91516c62b79bc8bab57596ab8d89e744413adbe8d', '1249b8a7f873a8047c486c1a38c01caf165ffb796be194f19591493877d8b38de40aa6669ebf6498', '0', '2017-06-25 08:18:19'), ('485b12bec6b07fe66ef036b382afbbd371a6664903f074a2c5ed90c4e9db405fac37ec5c112e95fa', '28dba3f2b4ab1a97130ce8f425c7cd9d32d3845b407a0cd28bd393fdec2e198248a94de31551c701', '0', '2017-06-25 08:28:04'), ('4e9656c3995bb04cca6fda76ddbb64618b5c09ed9c2a145844164e0fa2ecd22236ad43a2b0d37271', 'd72dafb97745260cf62b971773570a482caf685c3e79fb027994f32b455e72fab183df20d1e47764', '0', '2017-06-25 07:54:06'), ('5453364a9f72810104e13f7091e363cfb3f43885d1ed0c86f5e6f58f96b11fa1fbb8e9aed9cc148c', '2e695cb992d686805008e118a62e1099b45b5fbb432ef62f38c00aa021d1381ec2a250a00110c71a', '0', '2017-07-30 08:16:33'), ('60e3351e5592f068cf655c2c55ffb9a56141298140c11bce983ab5d9e7778deed61b357c2aece67b', 'c7e6c554cb6a0da75e09593ea40e45e4ccc677b19df58cb1674e0e5b990e998a384444d6a2bcc2f0', '0', '2017-06-25 08:07:44'), ('7edd941454ae92604eb832a24a58916feb0b6e44793bd5279d10f3869cc67d6e996f276553f9562d', 'e057b4f8c4b3f817d4f1282d1d1c78c0eca58d47d951b526186c1e201b15e66c3b75e3850af3c09d', '0', '2017-06-25 08:30:02'), ('8a6c7f0ec0758c3c49d2b38c4af79766658554431a2df0285f7f353e7a042d93b23be652f98e9450', '4325df6f9fdb2065810fc3b217e2ae878077bf55f5e34cd29404d83e6f77177b4b196616e99b7375', '0', '2017-07-30 08:19:18'), ('90189847a71e6581bc6af9018e86bdb5ee40edca3e9823b384a17200e1c500e1496429905df46ab8', '977e2eb250ea0a64766d00eaf3f00c8fc0411ff63b4b1a5dbe485a609463ba948aabcb4c0bfb5b6b', '0', '2017-06-25 08:04:54'), ('93b930b16b8f2b98b458f593e5ad404a7e0362a07507feaea759a428d2dfaf3728cd0a47554203d7', '78fdbf8a42c2dd407fe0bc0a9ce537cbce4c98ebae4f86bdd2ddb71f230a99bfa91b0960e0affc8f', '0', '2017-06-25 08:11:08'), ('992fee9c743ce15f9badc98e4c68495cc36f854056cc343000b9ff486397106c7aea5f885268611e', 'f44a2002140dd90367577473b767e1dd700960367281c87f6b95c169174e614a7bc39dd67e8c4ade', '0', '2017-06-25 08:47:30'), ('a4f0ae53eba336868db944f0e125e000e308c28cad610286d79fe9c1828939886e952f494410354b', '55e1da78b0834a46c920547ea643a78bb79fb337b0e4bc766cb1ab6ec0fb6cd48b9250ffa0a98374', '0', '2017-07-30 02:15:42'), ('b9b1f7c9800fdc9311c311a12415e886a593cc03e16ef3d47ce10f235ed77f52f8c4e50269c69e1f', '197556685c5538e68536e3e3be78a786d4000590a702310e6c6a4f3e986d1e77883e55c897420ae7', '0', '2017-06-25 08:57:18'), ('c0b8bfbc62c5bc7fe36c2693f691dfc466d72f18bea6c0f8d0e4c65d38512a626757eb5526602895', '2411696125a0b09bd66741aeeef0d15ac83c5fdd0d19ec07c4b8c7754d746e6897d6cad398d3257d', '0', '2017-08-16 02:16:50'), ('c2cb888d7d936a298c0a5af4518bf84beed1d86e58b5b89eb2148321c2401427056b536a0350af5b', 'dc86856ec339f227ea1640194a73b69e3579ec29f20383674cf14eabd9015bd2952b60f1588afc2e', '0', '2017-05-11 07:20:29'), ('c947102f957f1d5a68dfab282ceac3f39fb6017116b80eda2da2279c71fcfb83799902a39db92c34', '7ff8ad0a26a12d4566c32191cc127716a1427425f8d204eb305bc7321b508daf975ebd8d9bc98d22', '0', '2017-06-25 08:15:58'), ('c94e66c3cc579146f7141d1c47a5c8afa410ba86dbff00a1f33896821583734323d0e3a338acda0b', 'c2c197cb24ad566bdde0a0dbc50c0d2ea2a685f13c9d2014396e8720994e9dd51b2e29225b13109a', '0', '2017-07-30 02:42:41'), ('cb235a371c1894a240a7554bd67a1b1c52d551baaa09dc2c7d4d05b4256b7cddda558495fdc55467', '4c6757b98862bc93717d6b8a08c8c1ea2d794bafa4bbed5cd2a9fbb8c37752c3dcdb24aad89bc900', '0', '2017-06-25 08:05:08'), ('cc9cead1bfe97907f6f0674df117c3607723535f070aa7b7c8093c19e1d5a24ccd2e0c666f3aab2e', 'cbf9d9318a9f5e9da6217d593e0e13ae801d8a06461e2b6aa6f11217e723a1c84e13082a40498186', '0', '2017-05-11 07:24:00'), ('cec87139500b507d1553588c4345e8d432d1c91cad141364cd3a0d4d27958ffa5db9c29944362031', 'd83beeedb900c57135e75bdd0533bc3cb14f9163560c697b484f818fc2b0b81b359fbb9a520be812', '0', '2017-07-30 02:36:21'), ('cf309ebe58462d57b439018e5a4576d23f4dcf5054940a0c6a4567435ed8a55a4a571fa75de80a7d', 'b3b17354708c2011b9f4248e48ff16afd2e3a88c545e914982bb349167c48ed676e1adef3990de25', '0', '2017-06-25 08:27:04'), ('d9633185220365d7244c5fd3c288d35d7e1b0216ebbde9572a3db9cc1619537782e12db34afc7ccc', '528e8a70fdd47c9f6626f67a8a03b0ebda08e3f8f689923f7925ec2dd7561ed7672603085b662b63', '0', '2017-07-30 02:15:35'), ('ead5f87cc6da675ed0b998328e3cb9e22f7b83990036c696eb0ff59743be9073f6990bf0f43b1132', 'c3de4afb4f3e25a648ce9f9be704e3e4b5418274c6c0d4d4fdb276de6fa8f7fd3255a4df79607567', '0', '2017-06-25 08:06:11'), ('f903140247eb75e3a2147fc69198c04a9636e990275c17276e2d36efebc72947943699f258980e38', '84f37734032a05106507a769ba7e0413584953acd9ec05c285b738580056af41f851cd53c8a09d64', '0', '2017-06-25 08:05:44');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `s_role`
-- ----------------------------
DROP TABLE IF EXISTS `s_role`;
CREATE TABLE `s_role` (
  `s_role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `s_role_name` varchar(128) DEFAULT NULL,
  `s_role_desc` varchar(256) DEFAULT NULL,
  `s_role_sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `s_role`
-- ----------------------------
BEGIN;
INSERT INTO `s_role` VALUES ('1', '超级管理员', '超级管理员', '1', '2017-03-30 05:59:32', '2017-03-30 05:59:32', null, null), ('2', '管理员', '管理员', '2', '2017-03-30 05:59:49', '2017-03-30 05:59:49', null, null), ('4', '商品录入员', null, '3', '2017-07-09 09:32:21', '2017-07-09 09:32:21', null, null), ('5', '订单管理员', null, '4', '2017-07-09 09:34:04', '2017-07-09 09:34:04', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `s_role_member`
-- ----------------------------
DROP TABLE IF EXISTS `s_role_member`;
CREATE TABLE `s_role_member` (
  `s_role_id` int(11) unsigned NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_role_id`,`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `s_role_member`
-- ----------------------------
BEGIN;
INSERT INTO `s_role_member` VALUES ('1', '1', '2017-03-30 12:23:42', '2017-03-30 12:23:42', null, null), ('2', '1', null, null, null, null), ('2', '2', null, null, null, null), ('4', '1', '2017-07-09 09:41:09', '2017-07-09 09:41:09', null, null), ('4', '2', '2017-07-09 09:41:09', '2017-07-09 09:41:09', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `s_role_menu`
-- ----------------------------
DROP TABLE IF EXISTS `s_role_menu`;
CREATE TABLE `s_role_menu` (
  `s_role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_role_id`,`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `s_role_menu`
-- ----------------------------
BEGIN;
INSERT INTO `s_role_menu` VALUES ('1', '1', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '2', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '3', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '4', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '5', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '6', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '7', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('2', '1', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '4', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '6', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '7', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '62', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '63', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '64', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '70', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '71', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null), ('2', '72', '2017-10-20 08:01:14', '2017-10-20 08:01:14', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT COMMENT='laravel 默认用户表，暂时无用';

SET FOREIGN_KEY_CHECKS = 1;
