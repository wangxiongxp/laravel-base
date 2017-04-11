/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50633
 Source Host           : localhost
 Source Database       : laravel

 Target Server Type    : MySQL
 Target Server Version : 50633
 File Encoding         : utf-8

 Date: 04/11/2017 16:15:38 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `account_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(256) DEFAULT NULL,
  `account_name` varchar(256) DEFAULT NULL,
  `account_real_name` varchar(256) DEFAULT NULL,
  `account_email` varchar(256) DEFAULT NULL,
  `account_tel` varchar(64) DEFAULT NULL,
  `account_sex` int(11) DEFAULT NULL,
  `account_status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `account`
-- ----------------------------
BEGIN;
INSERT INTO `account` VALUES ('1', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'admin', '管理员', 'admin@163.com', '15135168888', '1', '1', '2017-02-08 11:11:11', '1', '2017-03-30 12:13:22', null, null), ('2', '$2y$10$.UJ12toVQ989of6oK0LSmOHXkBEwb1vUnhSjenKrFxfBNQBEM3Go2', 'wx', null, '345293340@qq.com', null, null, null, '2017-04-07 03:27:24', null, '2017-04-07 03:27:24', null, 'tbYBt9dQjkQPmiUecKrozjvG8NszkB6wqSIckWYuHkcbGR2Qbo4hwBeDzi9K');
COMMIT;

-- ----------------------------
--  Table structure for `cms_article`
-- ----------------------------
DROP TABLE IF EXISTS `cms_article`;
CREATE TABLE `cms_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_article`
-- ----------------------------
BEGIN;
INSERT INTO `cms_article` VALUES ('1', '1', '11', '111', '111', '<p>1111111</p>', null, null, null, null, '1', 'PUBLISHED', 'PUBLIC', '1', '0', '0', '0', null, '2017-04-08 11:30:05', '2017-04-08 07:18:37', null, '2017-04-08 11:30:05', null);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cms_catalog`
-- ----------------------------
BEGIN;
INSERT INTO `cms_catalog` VALUES ('1', null, '111', '111', '1', '111', '0', '1', null, null, null, '2017-04-07 11:26:15', '2017-04-07 11:36:13', null, null), ('2', null, '222', '222', null, '222', '0', '1', null, null, null, '2017-04-07 11:27:49', '2017-04-07 11:27:49', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `cms_comment`
-- ----------------------------
DROP TABLE IF EXISTS `cms_comment`;
CREATE TABLE `cms_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `visibility` int(4) DEFAULT '1',
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_site`
-- ----------------------------
DROP TABLE IF EXISTS `cms_site`;
CREATE TABLE `cms_site` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `code` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `cms_tag`
-- ----------------------------
DROP TABLE IF EXISTS `cms_tag`;
CREATE TABLE `cms_tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `article_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `menu`
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES ('1', '首页', '/admin', 'fa fa-users', '0', '0', '1', null, '2017-04-07 07:54:30', '2017-04-07 07:54:30', null, null), ('2', '用户管理', '/admin/account', 'fa fa-users', '1', '0', '1', '用户管理', '2017-03-31 06:45:10', null, null, null), ('3', '角色管理', '/admin/role', 'fa fa-users', '2', '0', '1', null, '2017-03-30 10:00:18', '2017-03-30 09:33:17', null, null), ('4', '角色成员管理', '/admin/roleMember', 'fa fa-users', '3', '0', '1', null, '2017-04-07 06:06:12', '2017-04-07 06:06:12', null, null), ('5', '群组管理', '/admin/group', 'fa fa-users', '4', '0', '1', null, '2017-04-07 06:08:04', '2017-04-07 06:08:04', null, null), ('6', '群组成员管理', '/admin/groupMember', 'fa fa-users', '5', '0', '1', null, '2017-04-07 06:08:27', '2017-04-07 06:08:27', null, null), ('7', '菜单管理', '/admin/menu', 'fa fa-users', '6', '0', '1', null, '2017-04-07 06:08:43', '2017-04-07 06:08:43', null, null), ('9', '内容管理', '/admin/cms/catalog', 'fa fa-users', '7', '0', '0', null, '2017-04-07 07:58:53', '2017-04-07 07:57:01', null, null), ('10', '栏目管理', '/admin/cms/catalog', 'fa fa-users', '8', '9', '1', null, '2017-04-07 07:57:47', '2017-04-07 07:57:47', null, null), ('11', '文章管理', '/admin/cms/article', 'fa fa-users', '9', '9', '1', null, '2017-04-07 07:58:20', '2017-04-07 07:58:20', null, null), ('12', '评论管理', '/admin/cms/comment', 'fa fa-users', '10', '9', '1', null, '2017-04-07 07:58:53', '2017-04-07 07:58:53', null, null);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `oauth_access_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_access_tokens` VALUES ('cbf9d9318a9f5e9da6217d593e0e13ae801d8a06461e2b6aa6f11217e723a1c84e13082a40498186', '1', '2', null, '[\"*\"]', '0', '2017-04-11 07:24:00', '2017-04-11 07:24:00', '2017-04-26 07:24:00'), ('dc86856ec339f227ea1640194a73b69e3579ec29f20383674cf14eabd9015bd2952b60f1588afc2e', '1', '2', null, '[\"*\"]', '0', '2017-04-11 07:20:29', '2017-04-11 07:20:29', '2017-04-26 07:20:29');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `oauth_refresh_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `oauth_refresh_tokens` VALUES ('', '', '0', null), ('c2cb888d7d936a298c0a5af4518bf84beed1d86e58b5b89eb2148321c2401427056b536a0350af5b', 'dc86856ec339f227ea1640194a73b69e3579ec29f20383674cf14eabd9015bd2952b60f1588afc2e', '0', '2017-05-11 07:20:29'), ('cc9cead1bfe97907f6f0674df117c3607723535f070aa7b7c8093c19e1d5a24ccd2e0c666f3aab2e', 'cbf9d9318a9f5e9da6217d593e0e13ae801d8a06461e2b6aa6f11217e723a1c84e13082a40498186', '0', '2017-05-11 07:24:00');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `s_group`
-- ----------------------------
DROP TABLE IF EXISTS `s_group`;
CREATE TABLE `s_group` (
  `s_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `s_group_name` varchar(128) DEFAULT NULL,
  `s_group_desc` varchar(256) DEFAULT NULL,
  `s_group_type_id` int(11) DEFAULT NULL,
  `s_group_left` int(11) DEFAULT NULL,
  `s_group_right` int(11) DEFAULT NULL,
  `s_group_parent` int(11) DEFAULT NULL,
  `s_group_level` int(11) DEFAULT NULL,
  `s_group_leaf` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_group`
-- ----------------------------
BEGIN;
INSERT INTO `s_group` VALUES ('1', 'xxx公司', 'xxx公司', '1', '1', '12', '0', '1', '0', null, '2017-03-30 12:53:35', null, null), ('8', '3', '3', '1', '2', '3', '1', '2', '1', '2017-03-30 11:32:03', '2017-03-30 12:07:38', null, null), ('10', '财务部', '财务部', '1', '4', '5', '1', '2', '1', '2017-03-30 12:52:57', '2017-03-30 12:52:57', null, null), ('11', '开发部', '开发部', '1', '6', '11', '1', '2', '0', '2017-03-30 12:53:08', '2017-03-30 12:53:35', null, null), ('12', '开发1组', '开发1组', '1', '7', '8', '11', '3', '1', '2017-03-30 12:53:24', '2017-03-30 12:53:24', null, null), ('13', '开发2组', '开发2组', '1', '9', '10', '11', '3', '1', '2017-03-30 12:53:35', '2017-03-30 12:53:35', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `s_group_member`
-- ----------------------------
DROP TABLE IF EXISTS `s_group_member`;
CREATE TABLE `s_group_member` (
  `s_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_group_id`,`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_group_member`
-- ----------------------------
BEGIN;
INSERT INTO `s_group_member` VALUES ('1', '1', '2017-03-30 12:48:31', '2017-03-30 12:48:31', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `s_group_type`
-- ----------------------------
DROP TABLE IF EXISTS `s_group_type`;
CREATE TABLE `s_group_type` (
  `s_group_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `s_group_type_name` varchar(128) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`s_group_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_group_type`
-- ----------------------------
BEGIN;
INSERT INTO `s_group_type` VALUES ('1', '公司', null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `s_member_grant`
-- ----------------------------
DROP TABLE IF EXISTS `s_member_grant`;
CREATE TABLE `s_member_grant` (
  `account_id` int(11) NOT NULL,
  `s_group_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`account_id`,`s_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_member_grant`
-- ----------------------------
BEGIN;
INSERT INTO `s_member_grant` VALUES ('1', '10', '2017-03-31 06:01:49', '2017-03-31 06:01:49', null, null), ('1', '13', '2017-03-31 06:01:49', '2017-03-31 06:01:49', null, null);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_role`
-- ----------------------------
BEGIN;
INSERT INTO `s_role` VALUES ('1', '管理员', '管理员', '1', '2017-03-30 05:59:32', '2017-03-30 05:59:32', null, null), ('2', '业务员', '业务员', '2', '2017-03-30 05:59:49', '2017-03-30 05:59:49', null, null), ('3', '普通用户', '普通用户', '3', '2017-03-30 06:00:20', '2017-03-30 06:00:20', null, null);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_role_member`
-- ----------------------------
BEGIN;
INSERT INTO `s_role_member` VALUES ('1', '1', '2017-03-30 12:23:42', '2017-03-30 12:23:42', null, null), ('2', '1', null, null, null, null), ('3', '1', null, null, null, null);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `s_role_menu`
-- ----------------------------
BEGIN;
INSERT INTO `s_role_menu` VALUES ('1', '1', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '2', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '3', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '4', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '5', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '6', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '7', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '9', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '10', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '11', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null), ('1', '12', '2017-04-07 08:14:02', '2017-04-07 08:14:02', null, null);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
