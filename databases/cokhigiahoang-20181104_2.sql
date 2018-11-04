-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 03:53 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cokhigiahoang`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Một người bình luận WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2018-10-24 03:30:44', '2018-10-24 03:30:44', 'Xin chào, đây là một bình luận\nĐể bắt đầu với quản trị bình luận, chỉnh sửa hoặc xóa bình luận, vui lòng truy cập vào khu vực Bình luận trong trang quản trị.\nAvatar của người bình luận sử dụng <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://cokhigiahoang.local', 'yes'),
(2, 'home', 'http://cokhigiahoang.local', 'yes'),
(3, 'blogname', 'Cokhigiahoang', 'yes'),
(4, 'blogdescription', 'Một trang web mới sử dụng WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'cqthanh.zx@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'd/m/Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'j F, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:184:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:12:\"van-thang/?$\";s:29:\"index.php?post_type=van-thang\";s:42:\"van-thang/feed/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?post_type=van-thang&feed=$matches[1]\";s:37:\"van-thang/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?post_type=van-thang&feed=$matches[1]\";s:29:\"van-thang/page/([0-9]{1,})/?$\";s:47:\"index.php?post_type=van-thang&paged=$matches[1]\";s:16:\"gian-giao-nem/?$\";s:33:\"index.php?post_type=gian-giao-nem\";s:46:\"gian-giao-nem/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_type=gian-giao-nem&feed=$matches[1]\";s:41:\"gian-giao-nem/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_type=gian-giao-nem&feed=$matches[1]\";s:33:\"gian-giao-nem/page/([0-9]{1,})/?$\";s:51:\"index.php?post_type=gian-giao-nem&paged=$matches[1]\";s:42:\"wp-types-group/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:52:\"wp-types-group/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:72:\"wp-types-group/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:67:\"wp-types-group/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:67:\"wp-types-group/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:48:\"wp-types-group/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:31:\"wp-types-group/([^/]+)/embed/?$\";s:47:\"index.php?wp-types-group=$matches[1]&embed=true\";s:35:\"wp-types-group/([^/]+)/trackback/?$\";s:41:\"index.php?wp-types-group=$matches[1]&tb=1\";s:43:\"wp-types-group/([^/]+)/page/?([0-9]{1,})/?$\";s:54:\"index.php?wp-types-group=$matches[1]&paged=$matches[2]\";s:50:\"wp-types-group/([^/]+)/comment-page-([0-9]{1,})/?$\";s:54:\"index.php?wp-types-group=$matches[1]&cpage=$matches[2]\";s:39:\"wp-types-group/([^/]+)(?:/([0-9]+))?/?$\";s:53:\"index.php?wp-types-group=$matches[1]&page=$matches[2]\";s:31:\"wp-types-group/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\"wp-types-group/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:61:\"wp-types-group/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"wp-types-group/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"wp-types-group/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\"wp-types-group/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:47:\"wp-types-user-group/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"wp-types-user-group/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"wp-types-user-group/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"wp-types-user-group/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"wp-types-user-group/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"wp-types-user-group/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:36:\"wp-types-user-group/([^/]+)/embed/?$\";s:52:\"index.php?wp-types-user-group=$matches[1]&embed=true\";s:40:\"wp-types-user-group/([^/]+)/trackback/?$\";s:46:\"index.php?wp-types-user-group=$matches[1]&tb=1\";s:48:\"wp-types-user-group/([^/]+)/page/?([0-9]{1,})/?$\";s:59:\"index.php?wp-types-user-group=$matches[1]&paged=$matches[2]\";s:55:\"wp-types-user-group/([^/]+)/comment-page-([0-9]{1,})/?$\";s:59:\"index.php?wp-types-user-group=$matches[1]&cpage=$matches[2]\";s:44:\"wp-types-user-group/([^/]+)(?:/([0-9]+))?/?$\";s:58:\"index.php?wp-types-user-group=$matches[1]&page=$matches[2]\";s:36:\"wp-types-user-group/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"wp-types-user-group/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\"wp-types-user-group/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"wp-types-user-group/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"wp-types-user-group/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"wp-types-user-group/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:47:\"wp-types-term-group/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"wp-types-term-group/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"wp-types-term-group/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"wp-types-term-group/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"wp-types-term-group/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"wp-types-term-group/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:36:\"wp-types-term-group/([^/]+)/embed/?$\";s:52:\"index.php?wp-types-term-group=$matches[1]&embed=true\";s:40:\"wp-types-term-group/([^/]+)/trackback/?$\";s:46:\"index.php?wp-types-term-group=$matches[1]&tb=1\";s:48:\"wp-types-term-group/([^/]+)/page/?([0-9]{1,})/?$\";s:59:\"index.php?wp-types-term-group=$matches[1]&paged=$matches[2]\";s:55:\"wp-types-term-group/([^/]+)/comment-page-([0-9]{1,})/?$\";s:59:\"index.php?wp-types-term-group=$matches[1]&cpage=$matches[2]\";s:44:\"wp-types-term-group/([^/]+)(?:/([0-9]+))?/?$\";s:58:\"index.php?wp-types-term-group=$matches[1]&page=$matches[2]\";s:36:\"wp-types-term-group/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"wp-types-term-group/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\"wp-types-term-group/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"wp-types-term-group/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"wp-types-term-group/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"wp-types-term-group/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:37:\"van-thang/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:47:\"van-thang/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:67:\"van-thang/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"van-thang/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"van-thang/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:43:\"van-thang/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:26:\"van-thang/([^/]+)/embed/?$\";s:42:\"index.php?van-thang=$matches[1]&embed=true\";s:30:\"van-thang/([^/]+)/trackback/?$\";s:36:\"index.php?van-thang=$matches[1]&tb=1\";s:50:\"van-thang/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:48:\"index.php?van-thang=$matches[1]&feed=$matches[2]\";s:45:\"van-thang/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:48:\"index.php?van-thang=$matches[1]&feed=$matches[2]\";s:38:\"van-thang/([^/]+)/page/?([0-9]{1,})/?$\";s:49:\"index.php?van-thang=$matches[1]&paged=$matches[2]\";s:45:\"van-thang/([^/]+)/comment-page-([0-9]{1,})/?$\";s:49:\"index.php?van-thang=$matches[1]&cpage=$matches[2]\";s:34:\"van-thang/([^/]+)(?:/([0-9]+))?/?$\";s:48:\"index.php?van-thang=$matches[1]&page=$matches[2]\";s:26:\"van-thang/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:36:\"van-thang/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:56:\"van-thang/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:51:\"van-thang/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:51:\"van-thang/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:32:\"van-thang/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:41:\"gian-giao-nem/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:51:\"gian-giao-nem/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:71:\"gian-giao-nem/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:66:\"gian-giao-nem/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:66:\"gian-giao-nem/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:47:\"gian-giao-nem/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:30:\"gian-giao-nem/([^/]+)/embed/?$\";s:46:\"index.php?gian-giao-nem=$matches[1]&embed=true\";s:34:\"gian-giao-nem/([^/]+)/trackback/?$\";s:40:\"index.php?gian-giao-nem=$matches[1]&tb=1\";s:54:\"gian-giao-nem/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?gian-giao-nem=$matches[1]&feed=$matches[2]\";s:49:\"gian-giao-nem/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?gian-giao-nem=$matches[1]&feed=$matches[2]\";s:42:\"gian-giao-nem/([^/]+)/page/?([0-9]{1,})/?$\";s:53:\"index.php?gian-giao-nem=$matches[1]&paged=$matches[2]\";s:49:\"gian-giao-nem/([^/]+)/comment-page-([0-9]{1,})/?$\";s:53:\"index.php?gian-giao-nem=$matches[1]&cpage=$matches[2]\";s:38:\"gian-giao-nem/([^/]+)(?:/([0-9]+))?/?$\";s:52:\"index.php?gian-giao-nem=$matches[1]&page=$matches[2]\";s:30:\"gian-giao-nem/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:40:\"gian-giao-nem/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:60:\"gian-giao-nem/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:55:\"gian-giao-nem/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:55:\"gian-giao-nem/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:36:\"gian-giao-nem/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:3:{i:0;s:33:\"classic-editor/classic-editor.php\";i:1;s:25:\"relevanssi/relevanssi.php\";i:2;s:14:\"types/wpcf.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'cokhihoanggia', 'yes'),
(41, 'stylesheet', 'cokhihoanggia', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:0:{}', 'yes'),
(80, 'widget_rss', 'a:0:{}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', 'Asia/Ho_Chi_Minh', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '0', 'yes'),
(93, 'initial_db_version', '38590', 'yes'),
(94, 'wp_user_roles', 'a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:138:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;s:11:\"edit_blocks\";b:1;s:18:\"edit_others_blocks\";b:1;s:14:\"publish_blocks\";b:1;s:19:\"read_private_blocks\";b:1;s:11:\"read_blocks\";b:1;s:13:\"delete_blocks\";b:1;s:21:\"delete_private_blocks\";b:1;s:23:\"delete_published_blocks\";b:1;s:20:\"delete_others_blocks\";b:1;s:19:\"edit_private_blocks\";b:1;s:21:\"edit_published_blocks\";b:1;s:13:\"create_blocks\";b:1;s:26:\"wpcf_custom_post_type_view\";b:1;s:26:\"wpcf_custom_post_type_edit\";b:1;s:33:\"wpcf_custom_post_type_edit_others\";b:1;s:25:\"wpcf_custom_taxonomy_view\";b:1;s:25:\"wpcf_custom_taxonomy_edit\";b:1;s:32:\"wpcf_custom_taxonomy_edit_others\";b:1;s:22:\"wpcf_custom_field_view\";b:1;s:22:\"wpcf_custom_field_edit\";b:1;s:29:\"wpcf_custom_field_edit_others\";b:1;s:25:\"wpcf_user_meta_field_view\";b:1;s:25:\"wpcf_user_meta_field_edit\";b:1;s:32:\"wpcf_user_meta_field_edit_others\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:46:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:11:\"edit_blocks\";b:1;s:18:\"edit_others_blocks\";b:1;s:14:\"publish_blocks\";b:1;s:19:\"read_private_blocks\";b:1;s:11:\"read_blocks\";b:1;s:13:\"delete_blocks\";b:1;s:21:\"delete_private_blocks\";b:1;s:23:\"delete_published_blocks\";b:1;s:20:\"delete_others_blocks\";b:1;s:19:\"edit_private_blocks\";b:1;s:21:\"edit_published_blocks\";b:1;s:13:\"create_blocks\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:17:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:11:\"edit_blocks\";b:1;s:14:\"publish_blocks\";b:1;s:11:\"read_blocks\";b:1;s:13:\"delete_blocks\";b:1;s:23:\"delete_published_blocks\";b:1;s:21:\"edit_published_blocks\";b:1;s:13:\"create_blocks\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:6:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:11:\"read_blocks\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:8:\"customer\";a:2:{s:4:\"name\";s:8:\"Customer\";s:12:\"capabilities\";a:1:{s:4:\"read\";b:1;}}s:12:\"shop_manager\";a:2:{s:4:\"name\";s:12:\"Shop manager\";s:12:\"capabilities\";a:93:{s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:4:\"read\";b:1;s:18:\"read_private_pages\";b:1;s:18:\"read_private_posts\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_posts\";b:1;s:10:\"edit_pages\";b:1;s:20:\"edit_published_posts\";b:1;s:20:\"edit_published_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"edit_private_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:17:\"edit_others_pages\";b:1;s:13:\"publish_posts\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_posts\";b:1;s:12:\"delete_pages\";b:1;s:20:\"delete_private_pages\";b:1;s:20:\"delete_private_posts\";b:1;s:22:\"delete_published_pages\";b:1;s:22:\"delete_published_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:19:\"delete_others_pages\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:17:\"moderate_comments\";b:1;s:12:\"upload_files\";b:1;s:6:\"export\";b:1;s:6:\"import\";b:1;s:10:\"list_users\";b:1;s:18:\"edit_theme_options\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'WPLANG', 'vi', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:2:{s:19:\"wp_inactive_widgets\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:13:\"array_version\";i:3;}', 'yes'),
(103, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(104, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'cron', 'a:5:{i:1541345446;a:4:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1541388685;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1541418155;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1543933442;a:1:{s:25:\"otgs_send_components_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:0:{}}}}s:7:\"version\";i:2;}', 'yes'),
(113, 'theme_mods_twentyseventeen', 'a:3:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1540378910;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}s:18:\"nav_menu_locations\";a:0:{}}', 'yes'),
(128, 'can_compress_scripts', '1', 'no'),
(141, 'new_admin_email', 'cqthanh.zx@gmail.com', 'yes'),
(157, 'current_theme', 'Processing', 'yes'),
(158, 'theme_mods_cokhihoanggia', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1540378906;s:4:\"data\";a:1:{s:19:\"wp_inactive_widgets\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(159, 'theme_switched', '', 'yes'),
(162, 'theme_mods_twentyfifteen', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1540379414;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(164, '_transient_twentyfifteen_categories', '1', 'yes'),
(175, 'recently_activated', 'a:3:{s:23:\"gutenberg/gutenberg.php\";i:1541341579;s:27:\"woocommerce/woocommerce.php\";i:1541228785;s:69:\"woo-gutenberg-products-block/woocommerce-gutenberg-products-block.php\";i:1541228777;}', 'yes'),
(178, 'woocommerce_store_address', '29/22B, Trần Thái Tông, Phường 15, Quận Tân Bình', 'yes'),
(179, 'woocommerce_store_address_2', '', 'yes'),
(180, 'woocommerce_store_city', 'Tp. Hồ Chí Minh', 'yes'),
(181, 'woocommerce_default_country', 'VN:*', 'yes'),
(182, 'woocommerce_store_postcode', '700000', 'yes'),
(183, 'woocommerce_allowed_countries', 'all', 'yes'),
(184, 'woocommerce_all_except_countries', '', 'yes'),
(185, 'woocommerce_specific_allowed_countries', '', 'yes'),
(186, 'woocommerce_ship_to_countries', '', 'yes'),
(187, 'woocommerce_specific_ship_to_countries', '', 'yes'),
(188, 'woocommerce_default_customer_address', 'geolocation', 'yes'),
(189, 'woocommerce_calc_taxes', 'no', 'yes'),
(190, 'woocommerce_enable_coupons', 'yes', 'yes'),
(191, 'woocommerce_calc_discounts_sequentially', 'no', 'no'),
(192, 'woocommerce_currency', 'VND', 'yes'),
(193, 'woocommerce_currency_pos', 'left', 'yes'),
(194, 'woocommerce_price_thousand_sep', ',', 'yes'),
(195, 'woocommerce_price_decimal_sep', '.', 'yes'),
(196, 'woocommerce_price_num_decimals', '2', 'yes'),
(197, 'woocommerce_shop_page_id', '43', 'yes'),
(198, 'woocommerce_cart_redirect_after_add', 'no', 'yes'),
(199, 'woocommerce_enable_ajax_add_to_cart', 'yes', 'yes'),
(200, 'woocommerce_placeholder_image', '', 'yes'),
(201, 'woocommerce_weight_unit', 'kg', 'yes'),
(202, 'woocommerce_dimension_unit', 'cm', 'yes'),
(203, 'woocommerce_enable_reviews', 'yes', 'yes'),
(204, 'woocommerce_review_rating_verification_label', 'yes', 'no'),
(205, 'woocommerce_review_rating_verification_required', 'no', 'no'),
(206, 'woocommerce_enable_review_rating', 'yes', 'yes'),
(207, 'woocommerce_review_rating_required', 'yes', 'no'),
(208, 'woocommerce_manage_stock', 'yes', 'yes'),
(209, 'woocommerce_hold_stock_minutes', '60', 'no'),
(210, 'woocommerce_notify_low_stock', 'yes', 'no'),
(211, 'woocommerce_notify_no_stock', 'yes', 'no'),
(212, 'woocommerce_stock_email_recipient', 'cqthanh.zx@gmail.com', 'no'),
(213, 'woocommerce_notify_low_stock_amount', '2', 'no'),
(214, 'woocommerce_notify_no_stock_amount', '0', 'yes'),
(215, 'woocommerce_hide_out_of_stock_items', 'no', 'yes'),
(216, 'woocommerce_stock_format', '', 'yes'),
(217, 'woocommerce_file_download_method', 'force', 'no'),
(218, 'woocommerce_downloads_require_login', 'no', 'no'),
(219, 'woocommerce_downloads_grant_access_after_payment', 'yes', 'no'),
(220, 'woocommerce_prices_include_tax', 'no', 'yes'),
(221, 'woocommerce_tax_based_on', 'shipping', 'yes'),
(222, 'woocommerce_shipping_tax_class', 'inherit', 'yes'),
(223, 'woocommerce_tax_round_at_subtotal', 'no', 'yes'),
(224, 'woocommerce_tax_classes', 'Reduced rate\r\nZero rate', 'yes'),
(225, 'woocommerce_tax_display_shop', 'excl', 'yes'),
(226, 'woocommerce_tax_display_cart', 'excl', 'yes'),
(227, 'woocommerce_price_display_suffix', '', 'yes'),
(228, 'woocommerce_tax_total_display', 'itemized', 'no'),
(229, 'woocommerce_enable_shipping_calc', 'yes', 'no'),
(230, 'woocommerce_shipping_cost_requires_address', 'no', 'yes'),
(231, 'woocommerce_ship_to_destination', 'billing', 'no'),
(232, 'woocommerce_shipping_debug_mode', 'no', 'yes'),
(233, 'woocommerce_enable_guest_checkout', 'yes', 'no'),
(234, 'woocommerce_enable_checkout_login_reminder', 'no', 'no'),
(235, 'woocommerce_enable_signup_and_login_from_checkout', 'no', 'no'),
(236, 'woocommerce_enable_myaccount_registration', 'no', 'no'),
(237, 'woocommerce_registration_generate_username', 'yes', 'no'),
(238, 'woocommerce_registration_generate_password', 'yes', 'no'),
(239, 'woocommerce_erasure_request_removes_order_data', 'no', 'no'),
(240, 'woocommerce_erasure_request_removes_download_data', 'no', 'no'),
(241, 'woocommerce_registration_privacy_policy_text', 'Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our [privacy_policy].', 'yes'),
(242, 'woocommerce_checkout_privacy_policy_text', 'Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our [privacy_policy].', 'yes'),
(243, 'woocommerce_delete_inactive_accounts', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(244, 'woocommerce_trash_pending_orders', '', 'no'),
(245, 'woocommerce_trash_failed_orders', '', 'no'),
(246, 'woocommerce_trash_cancelled_orders', '', 'no'),
(247, 'woocommerce_anonymize_completed_orders', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(248, 'woocommerce_email_from_name', 'Cokhigiahoang', 'no'),
(249, 'woocommerce_email_from_address', 'cqthanh.zx@gmail.com', 'no'),
(250, 'woocommerce_email_header_image', '', 'no'),
(251, 'woocommerce_email_footer_text', '{site_title}<br/>Powered by <a href=\"https://woocommerce.com/\">WooCommerce</a>', 'no'),
(252, 'woocommerce_email_base_color', '#96588a', 'no'),
(253, 'woocommerce_email_background_color', '#f7f7f7', 'no'),
(254, 'woocommerce_email_body_background_color', '#ffffff', 'no'),
(255, 'woocommerce_email_text_color', '#3c3c3c', 'no'),
(256, 'woocommerce_cart_page_id', '6', 'yes'),
(257, 'woocommerce_checkout_page_id', '7', 'yes'),
(258, 'woocommerce_myaccount_page_id', '8', 'yes'),
(259, 'woocommerce_terms_page_id', '45', 'no'),
(260, 'woocommerce_force_ssl_checkout', 'no', 'yes'),
(261, 'woocommerce_unforce_ssl_checkout', 'no', 'yes'),
(262, 'woocommerce_checkout_pay_endpoint', 'order-pay', 'yes'),
(263, 'woocommerce_checkout_order_received_endpoint', 'order-received', 'yes'),
(264, 'woocommerce_myaccount_add_payment_method_endpoint', 'add-payment-method', 'yes'),
(265, 'woocommerce_myaccount_delete_payment_method_endpoint', 'delete-payment-method', 'yes'),
(266, 'woocommerce_myaccount_set_default_payment_method_endpoint', 'set-default-payment-method', 'yes'),
(267, 'woocommerce_myaccount_orders_endpoint', 'orders', 'yes'),
(268, 'woocommerce_myaccount_view_order_endpoint', 'view-order', 'yes'),
(269, 'woocommerce_myaccount_downloads_endpoint', 'downloads', 'yes'),
(270, 'woocommerce_myaccount_edit_account_endpoint', 'edit-account', 'yes'),
(271, 'woocommerce_myaccount_edit_address_endpoint', 'edit-address', 'yes'),
(272, 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods', 'yes'),
(273, 'woocommerce_myaccount_lost_password_endpoint', 'lost-password', 'yes'),
(274, 'woocommerce_logout_endpoint', 'customer-logout', 'yes'),
(275, 'woocommerce_api_enabled', 'no', 'yes'),
(276, 'woocommerce_single_image_width', '600', 'yes'),
(277, 'woocommerce_thumbnail_image_width', '300', 'yes'),
(278, 'woocommerce_checkout_highlight_required_fields', 'yes', 'yes'),
(279, 'woocommerce_demo_store', 'no', 'no'),
(280, 'woocommerce_permalinks', 'a:5:{s:12:\"product_base\";s:23:\"/products/%product_cat%\";s:13:\"category_base\";s:16:\"product-category\";s:8:\"tag_base\";s:11:\"product-tag\";s:14:\"attribute_base\";s:0:\"\";s:22:\"use_verbose_page_rules\";b:1;}', 'yes'),
(281, 'current_theme_supports_woocommerce', 'no', 'yes'),
(282, 'woocommerce_queue_flush_rewrite_rules', 'no', 'yes'),
(283, '_transient_wc_attribute_taxonomies', 'a:0:{}', 'yes'),
(285, 'default_product_cat', '15', 'yes'),
(288, 'woocommerce_version', '3.5.0', 'yes'),
(289, 'woocommerce_db_version', '3.5.0', 'yes'),
(290, 'woocommerce_admin_notices', 'a:1:{i:0;s:20:\"no_secure_connection\";}', 'yes'),
(291, '_transient_woocommerce_webhook_ids', 'a:0:{}', 'yes'),
(292, 'widget_woocommerce_widget_cart', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(293, 'widget_woocommerce_layered_nav_filters', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(294, 'widget_woocommerce_layered_nav', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(295, 'widget_woocommerce_price_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(296, 'widget_woocommerce_product_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(297, 'widget_woocommerce_product_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(298, 'widget_woocommerce_product_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(299, 'widget_woocommerce_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(300, 'widget_woocommerce_recently_viewed_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(301, 'widget_woocommerce_top_rated_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(302, 'widget_woocommerce_recent_reviews', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(303, 'widget_woocommerce_rating_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(307, '_transient_as_comment_count', 'O:8:\"stdClass\":7:{s:8:\"approved\";s:1:\"1\";s:14:\"total_comments\";i:1;s:3:\"all\";i:1;s:9:\"moderated\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(308, 'woocommerce_meta_box_errors', 'a:0:{}', 'yes'),
(314, 'woocommerce_product_type', 'physical', 'yes'),
(315, 'woocommerce_sell_in_person', '1', 'yes'),
(316, 'woocommerce_allow_tracking', 'yes', 'yes'),
(318, 'woocommerce_tracker_last_send', '1541228720', 'yes'),
(320, 'woocommerce_cheque_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(321, 'woocommerce_bacs_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(322, 'woocommerce_cod_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(323, '_transient_shipping-transient-version', '1540381215', 'yes'),
(337, '_transient_product_query-transient-version', '1540719803', 'yes'),
(351, 'woocommerce_tracker_ua', 'a:1:{i:0;s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36\";}', 'yes'),
(374, '_transient_product-transient-version', '1540718357', 'yes'),
(385, 'product_cat_children', 'a:0:{}', 'yes'),
(436, '_transient_timeout_wc_shipping_method_count_1_1540381215', '1543294656', 'no'),
(437, '_transient_wc_shipping_method_count_1_1540381215', '2', 'no'),
(526, '_transient_wc_count_comments', 'O:8:\"stdClass\":7:{s:14:\"total_comments\";i:1;s:3:\"all\";i:1;s:8:\"approved\";s:1:\"1\";s:9:\"moderated\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(546, '_transient_timeout_wc_shipping_method_count_0_1540381215', '1543310706', 'no'),
(547, '_transient_wc_shipping_method_count_0_1540381215', '2', 'no'),
(561, '_transient_timeout_wc_low_stock_count', '1543311181', 'no'),
(562, '_transient_wc_low_stock_count', '0', 'no'),
(563, '_transient_timeout_wc_outofstock_count', '1543311181', 'no'),
(564, '_transient_wc_outofstock_count', '0', 'no'),
(603, '_transient_timeout_external_ip_address_127.0.0.1', '1541833520', 'no'),
(604, '_transient_external_ip_address_127.0.0.1', '2001:ee0:53c9:6e00:51f1:1c9f:c53c:287d', 'no'),
(620, '_site_transient_timeout_browser_90ff8ae6231a43c42b418e1765751722', '1541833531', 'no'),
(621, '_site_transient_browser_90ff8ae6231a43c42b418e1765751722', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"70.0.3538.77\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(646, '_transient_timeout_plugin_slugs', '1541427983', 'no'),
(647, '_transient_plugin_slugs', 'a:11:{i:0;s:19:\"akismet/akismet.php\";i:1;s:33:\"classic-editor/classic-editor.php\";i:2;s:23:\"gutenberg/gutenberg.php\";i:3;s:9:\"hello.php\";i:4;s:41:\"better-wp-security/better-wp-security.php\";i:5;s:37:\"mailchimp-for-wp/mailchimp-for-wp.php\";i:6;s:25:\"relevanssi/relevanssi.php\";i:7;s:59:\"ultimate-social-media-icons/ultimate_social_media_icons.php\";i:8;s:14:\"types/wpcf.php\";i:9;s:29:\"wp-mail-smtp/wp_mail_smtp.php\";i:10;s:24:\"wordpress-seo/wp-seo.php\";}', 'no'),
(655, '_site_transient_timeout_theme_roots', '1541343227', 'no'),
(656, '_site_transient_theme_roots', 'a:4:{s:13:\"cokhihoanggia\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(657, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:62:\"https://downloads.wordpress.org/release/vi/wordpress-4.9.8.zip\";s:6:\"locale\";s:2:\"vi\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:62:\"https://downloads.wordpress.org/release/vi/wordpress-4.9.8.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.9.8\";s:7:\"version\";s:5:\"4.9.8\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1541341431;s:15:\"version_checked\";s:5:\"4.9.8\";s:12:\"translations\";a:0:{}}', 'no'),
(658, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1541341434;s:7:\"checked\";a:11:{s:19:\"akismet/akismet.php\";s:5:\"4.0.8\";s:33:\"classic-editor/classic-editor.php\";s:3:\"0.5\";s:23:\"gutenberg/gutenberg.php\";s:5:\"4.1.1\";s:9:\"hello.php\";s:3:\"1.7\";s:41:\"better-wp-security/better-wp-security.php\";s:5:\"7.2.0\";s:37:\"mailchimp-for-wp/mailchimp-for-wp.php\";s:5:\"4.2.5\";s:25:\"relevanssi/relevanssi.php\";s:7:\"4.1.0.1\";s:59:\"ultimate-social-media-icons/ultimate_social_media_icons.php\";s:5:\"2.0.6\";s:14:\"types/wpcf.php\";s:5:\"2.3.4\";s:29:\"wp-mail-smtp/wp_mail_smtp.php\";s:5:\"1.3.3\";s:24:\"wordpress-seo/wp-seo.php\";s:5:\"9.0.3\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:2:{i:0;a:7:{s:4:\"type\";s:6:\"plugin\";s:4:\"slug\";s:12:\"wp-mail-smtp\";s:8:\"language\";s:2:\"vi\";s:7:\"version\";s:6:\"0.10.1\";s:7:\"updated\";s:19:\"2016-12-05 02:10:49\";s:7:\"package\";s:77:\"https://downloads.wordpress.org/translation/plugin/wp-mail-smtp/0.10.1/vi.zip\";s:10:\"autoupdate\";b:1;}i:1;a:7:{s:4:\"type\";s:6:\"plugin\";s:4:\"slug\";s:13:\"wordpress-seo\";s:8:\"language\";s:2:\"vi\";s:7:\"version\";s:5:\"7.6.1\";s:7:\"updated\";s:19:\"2018-05-24 05:27:35\";s:7:\"package\";s:77:\"https://downloads.wordpress.org/translation/plugin/wordpress-seo/7.6.1/vi.zip\";s:10:\"autoupdate\";b:1;}}s:9:\"no_update\";a:11:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.0.8\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.0.8.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"classic-editor/classic-editor.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/classic-editor\";s:4:\"slug\";s:14:\"classic-editor\";s:6:\"plugin\";s:33:\"classic-editor/classic-editor.php\";s:11:\"new_version\";s:3:\"0.5\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/classic-editor/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/classic-editor.0.5.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-256x256.png?rev=1750045\";s:2:\"1x\";s:67:\"https://ps.w.org/classic-editor/assets/icon-128x128.png?rev=1750045\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/classic-editor/assets/banner-1544x500.png?rev=1750404\";s:2:\"1x\";s:69:\"https://ps.w.org/classic-editor/assets/banner-772x250.png?rev=1751803\";}s:11:\"banners_rtl\";a:0:{}}s:23:\"gutenberg/gutenberg.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:23:\"w.org/plugins/gutenberg\";s:4:\"slug\";s:9:\"gutenberg\";s:6:\"plugin\";s:23:\"gutenberg/gutenberg.php\";s:11:\"new_version\";s:5:\"4.1.1\";s:3:\"url\";s:40:\"https://wordpress.org/plugins/gutenberg/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/gutenberg.4.1.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:62:\"https://ps.w.org/gutenberg/assets/icon-256x256.jpg?rev=1776042\";s:2:\"1x\";s:62:\"https://ps.w.org/gutenberg/assets/icon-128x128.jpg?rev=1776042\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:65:\"https://ps.w.org/gutenberg/assets/banner-1544x500.jpg?rev=1718710\";s:2:\"1x\";s:64:\"https://ps.w.org/gutenberg/assets/banner-772x250.jpg?rev=1718710\";}s:11:\"banners_rtl\";a:0:{}}s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=969907\";s:2:\"1x\";s:63:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=969907\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:65:\"https://ps.w.org/hello-dolly/assets/banner-772x250.png?rev=478342\";}s:11:\"banners_rtl\";a:0:{}}s:41:\"better-wp-security/better-wp-security.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:32:\"w.org/plugins/better-wp-security\";s:4:\"slug\";s:18:\"better-wp-security\";s:6:\"plugin\";s:41:\"better-wp-security/better-wp-security.php\";s:11:\"new_version\";s:5:\"7.2.0\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/better-wp-security/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/better-wp-security.7.2.0.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:70:\"https://ps.w.org/better-wp-security/assets/icon-256x256.jpg?rev=969999\";s:2:\"1x\";s:62:\"https://ps.w.org/better-wp-security/assets/icon.svg?rev=970042\";s:3:\"svg\";s:62:\"https://ps.w.org/better-wp-security/assets/icon.svg?rev=970042\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:72:\"https://ps.w.org/better-wp-security/assets/banner-772x250.png?rev=881897\";}s:11:\"banners_rtl\";a:0:{}}s:37:\"mailchimp-for-wp/mailchimp-for-wp.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:30:\"w.org/plugins/mailchimp-for-wp\";s:4:\"slug\";s:16:\"mailchimp-for-wp\";s:6:\"plugin\";s:37:\"mailchimp-for-wp/mailchimp-for-wp.php\";s:11:\"new_version\";s:5:\"4.2.5\";s:3:\"url\";s:47:\"https://wordpress.org/plugins/mailchimp-for-wp/\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/plugin/mailchimp-for-wp.4.2.5.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:69:\"https://ps.w.org/mailchimp-for-wp/assets/icon-256x256.png?rev=1224577\";s:2:\"1x\";s:69:\"https://ps.w.org/mailchimp-for-wp/assets/icon-128x128.png?rev=1224577\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:71:\"https://ps.w.org/mailchimp-for-wp/assets/banner-772x250.png?rev=1184706\";}s:11:\"banners_rtl\";a:0:{}}s:25:\"relevanssi/relevanssi.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:24:\"w.org/plugins/relevanssi\";s:4:\"slug\";s:10:\"relevanssi\";s:6:\"plugin\";s:25:\"relevanssi/relevanssi.php\";s:11:\"new_version\";s:7:\"4.1.0.1\";s:3:\"url\";s:41:\"https://wordpress.org/plugins/relevanssi/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/relevanssi.4.1.0.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/relevanssi/assets/icon-256x256.png?rev=1737893\";s:2:\"1x\";s:63:\"https://ps.w.org/relevanssi/assets/icon-128x128.png?rev=1737893\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:66:\"https://ps.w.org/relevanssi/assets/banner-1544x500.jpg?rev=1647178\";s:2:\"1x\";s:65:\"https://ps.w.org/relevanssi/assets/banner-772x250.jpg?rev=1647180\";}s:11:\"banners_rtl\";a:0:{}}s:59:\"ultimate-social-media-icons/ultimate_social_media_icons.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:41:\"w.org/plugins/ultimate-social-media-icons\";s:4:\"slug\";s:27:\"ultimate-social-media-icons\";s:6:\"plugin\";s:59:\"ultimate-social-media-icons/ultimate_social_media_icons.php\";s:11:\"new_version\";s:5:\"2.0.6\";s:3:\"url\";s:58:\"https://wordpress.org/plugins/ultimate-social-media-icons/\";s:7:\"package\";s:76:\"https://downloads.wordpress.org/plugin/ultimate-social-media-icons.2.0.6.zip\";s:5:\"icons\";a:1:{s:2:\"1x\";s:80:\"https://ps.w.org/ultimate-social-media-icons/assets/icon-128x128.png?rev=1598977\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:82:\"https://ps.w.org/ultimate-social-media-icons/assets/banner-772x250.png?rev=1032920\";}s:11:\"banners_rtl\";a:0:{}}s:14:\"types/wpcf.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:19:\"w.org/plugins/types\";s:4:\"slug\";s:5:\"types\";s:6:\"plugin\";s:14:\"types/wpcf.php\";s:11:\"new_version\";s:5:\"2.3.4\";s:3:\"url\";s:36:\"https://wordpress.org/plugins/types/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/types.2.3.4.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:58:\"https://ps.w.org/types/assets/icon-256x256.png?rev=1625832\";s:2:\"1x\";s:50:\"https://ps.w.org/types/assets/icon.svg?rev=1009056\";s:3:\"svg\";s:50:\"https://ps.w.org/types/assets/icon.svg?rev=1009056\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:61:\"https://ps.w.org/types/assets/banner-1544x500.png?rev=1681816\";s:2:\"1x\";s:60:\"https://ps.w.org/types/assets/banner-772x250.png?rev=1681816\";}s:11:\"banners_rtl\";a:0:{}}s:29:\"wp-mail-smtp/wp_mail_smtp.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:26:\"w.org/plugins/wp-mail-smtp\";s:4:\"slug\";s:12:\"wp-mail-smtp\";s:6:\"plugin\";s:29:\"wp-mail-smtp/wp_mail_smtp.php\";s:11:\"new_version\";s:5:\"1.3.3\";s:3:\"url\";s:43:\"https://wordpress.org/plugins/wp-mail-smtp/\";s:7:\"package\";s:55:\"https://downloads.wordpress.org/plugin/wp-mail-smtp.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:65:\"https://ps.w.org/wp-mail-smtp/assets/icon-256x256.png?rev=1755440\";s:2:\"1x\";s:65:\"https://ps.w.org/wp-mail-smtp/assets/icon-128x128.png?rev=1755440\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:68:\"https://ps.w.org/wp-mail-smtp/assets/banner-1544x500.png?rev=1900656\";s:2:\"1x\";s:67:\"https://ps.w.org/wp-mail-smtp/assets/banner-772x250.png?rev=1900656\";}s:11:\"banners_rtl\";a:0:{}}s:24:\"wordpress-seo/wp-seo.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:27:\"w.org/plugins/wordpress-seo\";s:4:\"slug\";s:13:\"wordpress-seo\";s:6:\"plugin\";s:24:\"wordpress-seo/wp-seo.php\";s:11:\"new_version\";s:5:\"9.0.3\";s:3:\"url\";s:44:\"https://wordpress.org/plugins/wordpress-seo/\";s:7:\"package\";s:62:\"https://downloads.wordpress.org/plugin/wordpress-seo.9.0.3.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:66:\"https://ps.w.org/wordpress-seo/assets/icon-256x256.png?rev=1834347\";s:2:\"1x\";s:58:\"https://ps.w.org/wordpress-seo/assets/icon.svg?rev=1946641\";s:3:\"svg\";s:58:\"https://ps.w.org/wordpress-seo/assets/icon.svg?rev=1946641\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:69:\"https://ps.w.org/wordpress-seo/assets/banner-1544x500.png?rev=1843435\";s:2:\"1x\";s:68:\"https://ps.w.org/wordpress-seo/assets/banner-772x250.png?rev=1843435\";}s:11:\"banners_rtl\";a:2:{s:2:\"2x\";s:73:\"https://ps.w.org/wordpress-seo/assets/banner-1544x500-rtl.png?rev=1843435\";s:2:\"1x\";s:72:\"https://ps.w.org/wordpress-seo/assets/banner-772x250-rtl.png?rev=1843435\";}}}}', 'no'),
(659, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1541341432;s:7:\"checked\";a:4:{s:13:\"cokhihoanggia\";s:3:\"1.0\";s:13:\"twentyfifteen\";s:3:\"2.0\";s:15:\"twentyseventeen\";s:3:\"1.7\";s:13:\"twentysixteen\";s:3:\"1.5\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(662, 'WPCF_VERSION', '2.3.4', 'no'),
(663, 'wpcf-version', '2.3.4', 'yes'),
(664, 'wp_installer_settings', 'eJxNzEEKhDAMRuG75ASmRoQ/hwlxzKIgY2k6K/Huupz1+3iOGVeCC6hHO7OOs9dIUseE604UAR2ew/6z/druI0greBGehUWKvpsVZK2HsU32OcK/ryTdwHo/b5wi9A==', 'yes'),
(665, 'toolset_executed_upgrade_commands', 'a:3:{i:0;s:55:\"Toolset_Upgrade_Command_Delete_Obsolete_Upgrade_Options\";i:1;s:57:\"Toolset_Upgrade_Command_M2M_V1_Database_Structure_Upgrade\";i:2;s:57:\"Toolset_Upgrade_Command_M2M_V2_Database_Structure_Upgrade\";}', 'no'),
(666, 'toolset_data_structure_version', '3', 'yes'),
(667, 'wpcf-messages', 'a:1:{i:1;a:0:{}}', 'yes'),
(668, 'wpcf_users_options', '1', 'yes'),
(669, 'wpcf-custom-taxonomies', 'a:2:{s:8:\"category\";a:25:{s:4:\"name\";s:8:\"category\";s:5:\"label\";s:13:\"Chuyên mục\";s:6:\"labels\";a:23:{s:4:\"name\";s:13:\"Chuyên mục\";s:13:\"singular_name\";s:13:\"Chuyên mục\";s:12:\"search_items\";s:25:\"Tìm kiếm chuyên mục\";s:13:\"popular_items\";N;s:9:\"all_items\";s:24:\"Tất cả chuyên mục\";s:11:\"parent_item\";s:26:\"Chuyên mục hiện tại\";s:17:\"parent_item_colon\";s:27:\"Chuyên mục hiện tại:\";s:9:\"edit_item\";s:27:\"Chỉnh sửa chuyên mục\";s:9:\"view_item\";s:17:\"Xem chuyên mục\";s:11:\"update_item\";s:21:\"Lưu các thay đổi\";s:12:\"add_new_item\";s:19:\"Thêm chuyên mục\";s:13:\"new_item_name\";s:21:\"Tên danh mục mới\";s:26:\"separate_items_with_commas\";N;s:19:\"add_or_remove_items\";N;s:21:\"choose_from_most_used\";N;s:9:\"not_found\";s:30:\"Không tìm thấy mục nào.\";s:8:\"no_terms\";s:24:\"Không có chuyên mục\";s:21:\"items_list_navigation\";s:41:\"Điều hướng danh sách chuyên mục\";s:10:\"items_list\";s:24:\"Danh sách chuyên mục\";s:9:\"most_used\";s:20:\"Dùng nhiều nhất\";s:13:\"back_to_items\";s:31:\"&larr; Quay lại Chuyên mục\";s:9:\"menu_name\";s:13:\"Chuyên mục\";s:14:\"name_admin_bar\";s:8:\"category\";}s:11:\"description\";s:0:\"\";s:6:\"public\";b:1;s:18:\"publicly_queryable\";b:1;s:12:\"hierarchical\";b:1;s:7:\"show_ui\";b:1;s:12:\"show_in_menu\";b:1;s:17:\"show_in_nav_menus\";b:1;s:13:\"show_tagcloud\";b:1;s:18:\"show_in_quick_edit\";b:1;s:17:\"show_admin_column\";b:1;s:11:\"meta_box_cb\";s:24:\"post_categories_meta_box\";s:11:\"object_type\";a:1:{i:0;s:4:\"post\";}s:3:\"cap\";a:4:{s:12:\"manage_terms\";s:17:\"manage_categories\";s:10:\"edit_terms\";s:15:\"edit_categories\";s:12:\"delete_terms\";s:17:\"delete_categories\";s:12:\"assign_terms\";s:17:\"assign_categories\";}s:7:\"rewrite\";a:4:{s:10:\"with_front\";b:1;s:12:\"hierarchical\";b:1;s:7:\"ep_mask\";i:512;s:4:\"slug\";s:8:\"category\";}s:9:\"query_var\";s:13:\"category_name\";s:21:\"update_count_callback\";s:0:\"\";s:12:\"show_in_rest\";b:1;s:9:\"rest_base\";s:10:\"categories\";s:21:\"rest_controller_class\";s:24:\"WP_REST_Terms_Controller\";s:8:\"_builtin\";b:1;s:4:\"slug\";s:8:\"category\";s:8:\"supports\";a:1:{s:4:\"post\";i:1;}}s:8:\"post_tag\";a:25:{s:4:\"name\";s:8:\"post_tag\";s:5:\"label\";s:5:\"Thẻ\";s:6:\"labels\";a:23:{s:4:\"name\";s:5:\"Thẻ\";s:13:\"singular_name\";s:5:\"Thẻ\";s:12:\"search_items\";s:10:\"Tìm Thẻ\";s:13:\"popular_items\";s:18:\"Thẻ phổ biến\";s:9:\"all_items\";s:16:\"Tất cả thẻ\";s:11:\"parent_item\";N;s:17:\"parent_item_colon\";N;s:9:\"edit_item\";s:11:\"Sửa thẻ\";s:9:\"view_item\";s:9:\"Xem thẻ\";s:11:\"update_item\";s:18:\"Cập nhật thẻ\";s:12:\"add_new_item\";s:11:\"Thêm thẻ\";s:13:\"new_item_name\";s:15:\"Thêm tag mới\";s:26:\"separate_items_with_commas\";s:47:\"Phân cách các thẻ bằng dấu phẩy (,).\";s:19:\"add_or_remove_items\";s:16:\"Thêm/Xóa thẻ\";s:21:\"choose_from_most_used\";s:55:\"Chọn từ những thẻ được dùng nhiều nhất\";s:9:\"not_found\";s:43:\"Không tìm thấy thẻ đánh dấu nào.\";s:8:\"no_terms\";s:21:\"Không có thẻ nào\";s:21:\"items_list_navigation\";s:37:\"Điều hướng danh sách thẻ tag\";s:10:\"items_list\";s:14:\"Danh sách tag\";s:9:\"most_used\";s:20:\"Dùng nhiều nhất\";s:13:\"back_to_items\";s:23:\"&larr; Quay lại Thẻ\";s:9:\"menu_name\";s:5:\"Thẻ\";s:14:\"name_admin_bar\";s:8:\"post_tag\";}s:11:\"description\";s:0:\"\";s:6:\"public\";b:1;s:18:\"publicly_queryable\";b:1;s:12:\"hierarchical\";b:0;s:7:\"show_ui\";b:1;s:12:\"show_in_menu\";b:1;s:17:\"show_in_nav_menus\";b:1;s:13:\"show_tagcloud\";b:1;s:18:\"show_in_quick_edit\";b:1;s:17:\"show_admin_column\";b:1;s:11:\"meta_box_cb\";s:18:\"post_tags_meta_box\";s:11:\"object_type\";a:1:{i:0;s:4:\"post\";}s:3:\"cap\";a:4:{s:12:\"manage_terms\";s:16:\"manage_post_tags\";s:10:\"edit_terms\";s:14:\"edit_post_tags\";s:12:\"delete_terms\";s:16:\"delete_post_tags\";s:12:\"assign_terms\";s:16:\"assign_post_tags\";}s:7:\"rewrite\";a:4:{s:10:\"with_front\";b:1;s:12:\"hierarchical\";b:0;s:7:\"ep_mask\";i:1024;s:4:\"slug\";s:3:\"tag\";}s:9:\"query_var\";s:3:\"tag\";s:21:\"update_count_callback\";s:0:\"\";s:12:\"show_in_rest\";b:1;s:9:\"rest_base\";s:4:\"tags\";s:21:\"rest_controller_class\";s:24:\"WP_REST_Terms_Controller\";s:8:\"_builtin\";b:1;s:4:\"slug\";s:8:\"post_tag\";s:8:\"supports\";a:1:{s:4:\"post\";i:1;}}}', 'yes'),
(670, 'relevanssi_admin_search', 'off', 'yes'),
(671, 'relevanssi_bg_col', '#ffaf75', 'yes'),
(672, 'relevanssi_cat', '0', 'yes'),
(673, 'relevanssi_class', 'relevanssi-query-term', 'yes'),
(674, 'relevanssi_comment_boost', '0.75', 'yes'),
(675, 'relevanssi_content_boost', '1', 'yes'),
(676, 'relevanssi_css', 'text-decoration: underline; text-color: #ff0000', 'yes'),
(677, 'relevanssi_db_version', '5', 'yes'),
(678, 'relevanssi_default_orderby', 'relevance', 'yes'),
(679, 'relevanssi_disable_or_fallback', 'off', 'yes'),
(680, 'relevanssi_exact_match_bonus', 'on', 'yes'),
(681, 'relevanssi_excat', '0', 'yes'),
(682, 'relevanssi_excerpt_allowable_tags', '', 'yes'),
(683, 'relevanssi_excerpt_custom_fields', 'off', 'yes'),
(684, 'relevanssi_excerpt_length', '30', 'yes'),
(685, 'relevanssi_excerpt_type', 'words', 'yes'),
(686, 'relevanssi_excerpts', 'on', 'yes'),
(687, 'relevanssi_exclude_posts', '', 'yes'),
(688, 'relevanssi_expand_shortcodes', 'on', 'yes'),
(689, 'relevanssi_extag', '0', 'yes'),
(690, 'relevanssi_fuzzy', 'sometimes', 'yes'),
(691, 'relevanssi_highlight', 'strong', 'yes'),
(692, 'relevanssi_highlight_comments', 'off', 'yes'),
(693, 'relevanssi_highlight_docs', 'off', 'yes'),
(694, 'relevanssi_hilite_title', '', 'yes'),
(695, 'relevanssi_implicit_operator', 'OR', 'yes'),
(696, 'relevanssi_index_author', '', 'yes'),
(697, 'relevanssi_index_comments', 'none', 'yes'),
(698, 'relevanssi_index_excerpt', 'off', 'yes'),
(699, 'relevanssi_index_fields', '', 'yes'),
(700, 'relevanssi_index_limit', '500', 'yes'),
(701, 'relevanssi_index_post_types', 'a:2:{i:0;s:4:\"post\";i:1;s:4:\"page\";}', 'yes'),
(702, 'relevanssi_index_taxonomies_list', 'a:0:{}', 'yes'),
(703, 'relevanssi_indexed', '', 'yes'),
(704, 'relevanssi_log_queries', 'off', 'yes'),
(705, 'relevanssi_log_queries_with_ip', 'off', 'yes'),
(706, 'relevanssi_min_word_length', '3', 'yes'),
(707, 'relevanssi_omit_from_logs', '', 'yes'),
(708, 'relevanssi_polylang_all_languages', 'off', 'yes'),
(709, 'relevanssi_punctuation', 'a:3:{s:6:\"quotes\";s:7:\"replace\";s:7:\"hyphens\";s:7:\"replace\";s:10:\"ampersands\";s:7:\"replace\";}', 'yes'),
(710, 'relevanssi_respect_exclude', 'on', 'yes'),
(711, 'relevanssi_show_matches', '', 'yes'),
(712, 'relevanssi_show_matches_text', '(Search hits: %body% in body, %title% in title, %categories% in categories, %tags% in tags, %taxonomies% in other taxonomies, %comments% in comments. Score: %score%)', 'yes'),
(713, 'relevanssi_synonyms', '', 'yes'),
(714, 'relevanssi_throttle', 'on', 'yes'),
(715, 'relevanssi_throttle_limit', '500', 'yes'),
(716, 'relevanssi_title_boost', '5', 'yes'),
(717, 'relevanssi_txt_col', '#ff0000', 'yes'),
(718, 'relevanssi_word_boundaries', 'on', 'yes'),
(719, 'relevanssi_wpml_only_current', 'on', 'yes'),
(720, 'wpcf-custom-types', 'a:2:{s:9:\"van-thang\";a:24:{s:4:\"icon\";s:4:\"cart\";s:6:\"labels\";a:13:{s:4:\"name\";s:23:\"Quản lý vận thăng\";s:13:\"singular_name\";s:12:\"Vận thăng\";s:7:\"add_new\";s:11:\"Thêm mới\";s:12:\"add_new_item\";s:14:\"Thêm %s mới\";s:9:\"edit_item\";s:8:\"Sửa %s\";s:8:\"new_item\";s:8:\"Mới %s\";s:9:\"view_item\";s:6:\"Xem %s\";s:12:\"search_items\";s:14:\"Tìm kiếm %s\";s:9:\"not_found\";s:21:\"Không tìm thấy %s\";s:18:\"not_found_in_trash\";s:39:\"Không tìm thấy %s trong Thùng rác\";s:17:\"parent_item_colon\";s:15:\"Câu lệnh cha\";s:9:\"all_items\";s:21:\"Tất cả các mục\";s:16:\"enter_title_here\";s:29:\"Nhập tiêu đề vào đây\";}s:4:\"slug\";s:9:\"van-thang\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:6:\"public\";s:13:\"menu_position\";s:32:\"5--wpcf-add-menu-after--edit.php\";s:8:\"supports\";a:5:{s:5:\"title\";s:1:\"1\";s:6:\"editor\";s:1:\"1\";s:9:\"revisions\";s:1:\"1\";s:6:\"author\";s:1:\"1\";s:9:\"thumbnail\";s:1:\"1\";}s:7:\"rewrite\";a:6:{s:7:\"enabled\";s:1:\"1\";s:6:\"custom\";s:6:\"normal\";s:4:\"slug\";s:0:\"\";s:10:\"with_front\";s:1:\"1\";s:5:\"feeds\";s:1:\"1\";s:5:\"pages\";s:1:\"1\";}s:11:\"has_archive\";s:1:\"1\";s:16:\"has_archive_slug\";s:0:\"\";s:12:\"show_in_menu\";s:1:\"1\";s:17:\"show_in_menu_page\";s:0:\"\";s:7:\"show_ui\";s:1:\"1\";s:18:\"publicly_queryable\";s:1:\"1\";s:10:\"can_export\";s:1:\"1\";s:17:\"show_in_nav_menus\";s:1:\"1\";s:17:\"query_var_enabled\";s:1:\"1\";s:9:\"query_var\";s:0:\"\";s:16:\"permalink_epmask\";s:12:\"EP_PERMALINK\";s:9:\"rest_base\";s:0:\"\";s:14:\"wpcf-post-type\";N;s:8:\"_builtin\";b:0;s:18:\"_toolset_edit_last\";i:1541341507;s:15:\"_wpcf_author_id\";i:1;}s:13:\"gian-giao-nem\";a:24:{s:8:\"_builtin\";b:0;s:18:\"_toolset_edit_last\";i:1541341551;s:15:\"_wpcf_author_id\";i:1;s:14:\"wpcf-post-type\";s:13:\"gian-giao-nem\";s:4:\"icon\";s:4:\"cart\";s:6:\"labels\";a:13:{s:4:\"name\";s:22:\"Quản lý giàn giáo\";s:13:\"singular_name\";s:16:\"Giàn giáo nêm\";s:7:\"add_new\";s:11:\"Thêm mới\";s:12:\"add_new_item\";s:14:\"Thêm %s mới\";s:9:\"edit_item\";s:8:\"Sửa %s\";s:8:\"new_item\";s:8:\"Mới %s\";s:9:\"view_item\";s:6:\"Xem %s\";s:12:\"search_items\";s:14:\"Tìm kiếm %s\";s:9:\"not_found\";s:21:\"Không tìm thấy %s\";s:18:\"not_found_in_trash\";s:39:\"Không tìm thấy %s trong Thùng rác\";s:17:\"parent_item_colon\";s:15:\"Câu lệnh cha\";s:9:\"all_items\";s:21:\"Tất cả các mục\";s:16:\"enter_title_here\";s:29:\"Nhập tiêu đề vào đây\";}s:4:\"slug\";s:13:\"gian-giao-nem\";s:11:\"description\";s:0:\"\";s:6:\"public\";s:6:\"public\";s:13:\"menu_position\";s:52:\"5--wpcf-add-menu-after--edit.php?post_type=van-thang\";s:8:\"supports\";a:6:{s:5:\"title\";s:1:\"1\";s:6:\"editor\";s:1:\"1\";s:9:\"revisions\";s:1:\"1\";s:6:\"author\";s:1:\"1\";s:7:\"excerpt\";s:1:\"1\";s:9:\"thumbnail\";s:1:\"1\";}s:7:\"rewrite\";a:6:{s:7:\"enabled\";s:1:\"1\";s:6:\"custom\";s:6:\"normal\";s:4:\"slug\";s:0:\"\";s:10:\"with_front\";s:1:\"1\";s:5:\"feeds\";s:1:\"1\";s:5:\"pages\";s:1:\"1\";}s:11:\"has_archive\";s:1:\"1\";s:16:\"has_archive_slug\";s:0:\"\";s:12:\"show_in_menu\";s:1:\"1\";s:17:\"show_in_menu_page\";s:0:\"\";s:7:\"show_ui\";s:1:\"1\";s:18:\"publicly_queryable\";s:1:\"1\";s:10:\"can_export\";s:1:\"1\";s:17:\"show_in_nav_menus\";s:1:\"1\";s:17:\"query_var_enabled\";s:1:\"1\";s:9:\"query_var\";s:0:\"\";s:16:\"permalink_epmask\";s:12:\"EP_PERMALINK\";s:9:\"rest_base\";s:0:\"\";}}', 'yes'),
(721, 'wpcf_post_relationship', 'a:0:{}', 'yes'),
(722, '_transient_timeout_oembed_bc2903c0cdcc090bc93b982e9a34f0ba', '1541427964', 'no'),
(723, '_transient_oembed_bc2903c0cdcc090bc93b982e9a34f0ba', 'O:8:\"stdClass\":21:{s:4:\"type\";s:5:\"video\";s:7:\"version\";s:3:\"1.0\";s:13:\"provider_name\";s:5:\"Vimeo\";s:12:\"provider_url\";s:18:\"https://vimeo.com/\";s:5:\"title\";s:12:\"The Mountain\";s:11:\"author_name\";s:15:\"TSO Photography\";s:10:\"author_url\";s:24:\"https://vimeo.com/terjes\";s:7:\"is_plus\";s:1:\"0\";s:12:\"account_type\";s:5:\"basic\";s:4:\"html\";s:184:\"<iframe src=\"https://player.vimeo.com/video/22439234?app_id=122963\" width=\"600\" height=\"338\" frameborder=\"0\" title=\"The Mountain\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>\";s:5:\"width\";i:600;s:6:\"height\";i:338;s:8:\"duration\";i:189;s:11:\"description\";s:1978:\"Follow on:\nhttps://facebook.com/TSOphotography for more photos, videos and updates. \n\nThis was filmed between 4th and 11th April 2011. I had the pleasure of visiting El Teide.\nSpain´s highest mountain  @(3718m) is one of the best places in the world to photograph the stars and is also the location of Teide Observatories, considered to be one of the world´s best observatories. \n\nThe goal was to capture the beautiful Milky Way galaxy along with one of the most amazing mountains I know El Teide. I have to say this was one of the most exhausting trips I have done. There was a lot of hiking at high altitudes and probably less than 10 hours of sleep in total for the whole week. Having been here 10-11 times before I had a long list of must-see locations I wanted to capture for this movie, but I am still not 100% used to carrying around so much gear required for time-lapse movies.\n \nA large sandstorm hit the Sahara Desert on the 9th April (http://bit.ly/g3tsDW) and at approx 3am in the night the sandstorm hit me, making  it nearly impossible to see the sky with my own eyes.\n\nInterestingly enough my camera was set for a 5 hour sequence of the milky way during this time and I was sure my whole scene was ruined. To my surprise, my camera had managed to capture the sandstorm which was backlit by Grand Canary Island making it look like golden clouds. The Milky Way was shining through the clouds, making the stars sparkle in an interesting way. So if you ever wondered how the Milky Way would look through a Sahara sandstorm, look at 00:32.\n\nAvailable in Digital Cinema 4k.\n\nFollow Facebook: http://www.facebook.com/TSOPhotography\nFollow Twitter:\nhttp://twitter.com/TSOPhotography\nFollow Google+:\nhttps://plus.google.com/107543460658107759808\n\nPress/licensing/projects contact: tsophotography@gmail.com\n\n\nMusic by my friend: Ludovico Einaudi - \"Nuvole bianche\" with permission. \nPlease support the artist here:\nhttp://itunes.apple.com/us/album/una-mattina/id217799399\";s:13:\"thumbnail_url\";s:50:\"https://i.vimeocdn.com/video/145026168_295x166.jpg\";s:15:\"thumbnail_width\";i:295;s:16:\"thumbnail_height\";i:166;s:30:\"thumbnail_url_with_play_button\";s:168:\"https://i.vimeocdn.com/filter/overlay?src0=https%3A%2F%2Fi.vimeocdn.com%2Fvideo%2F145026168_295x166.jpg&src1=http%3A%2F%2Ff.vimeocdn.com%2Fp%2Fimages%2Fcrawler_play.png\";s:11:\"upload_date\";s:19:\"2011-04-15 08:35:35\";s:8:\"video_id\";i:22439234;s:3:\"uri\";s:16:\"/videos/22439234\";}', 'no'),
(724, 'classic-editor-replace', 'replace', 'yes'),
(725, 'relevanssi_doc_count', '0', 'yes'),
(726, 'wpcf-fields', 'a:9:{s:18:\"hinh-thuc-san-pham\";a:8:{s:2:\"id\";s:18:\"hinh-thuc-san-pham\";s:4:\"slug\";s:18:\"hinh-thuc-san-pham\";s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:25:\"Hình thức sản phẩm\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:6:{s:7:\"options\";a:3:{s:59:\"wpcf-fields-radio-option-1deb89a6e1cd0db46ba12abf28ff0e7e-1\";a:3:{s:5:\"title\";s:4:\"Bán\";s:5:\"value\";s:1:\"1\";s:13:\"display_value\";s:1:\"1\";}s:7:\"default\";s:59:\"wpcf-fields-radio-option-1deb89a6e1cd0db46ba12abf28ff0e7e-1\";s:59:\"wpcf-fields-radio-option-71d3cd50c903cdc910a16531aa911c20-1\";a:3:{s:5:\"title\";s:9:\"Cho thuê\";s:5:\"value\";s:1:\"2\";s:13:\"display_value\";s:1:\"2\";}}s:7:\"display\";s:2:\"db\";s:8:\"validate\";a:1:{s:8:\"required\";a:3:{s:6:\"active\";s:1:\"1\";s:5:\"value\";s:4:\"true\";s:7:\"message\";s:32:\"Trường này là bắt buộc.\";}}s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:11:\"radio-24526\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:23:\"wpcf-hinh-thuc-san-pham\";s:9:\"meta_type\";s:8:\"postmeta\";}s:14:\"loai-van-thang\";a:8:{s:2:\"id\";s:14:\"loai-van-thang\";s:4:\"slug\";s:14:\"loai-van-thang\";s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:19:\"Loại vận thăng\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:8:{s:13:\"slug-pre-save\";s:14:\"loai-van-thang\";s:7:\"options\";a:3:{s:59:\"wpcf-fields-radio-option-1e06f3590515477498cf54968862441b-1\";a:3:{s:5:\"title\";s:18:\"Vận thăng hàng\";s:5:\"value\";s:1:\"1\";s:13:\"display_value\";s:1:\"1\";}s:7:\"default\";s:59:\"wpcf-fields-radio-option-1e06f3590515477498cf54968862441b-1\";s:59:\"wpcf-fields-radio-option-1036f6f458380e3ec21da15b42ffb355-1\";a:3:{s:5:\"title\";s:19:\"Vận thăng lồng\";s:5:\"value\";s:1:\"2\";s:13:\"display_value\";s:1:\"2\";}}s:7:\"display\";s:2:\"db\";s:8:\"validate\";a:1:{s:8:\"required\";a:3:{s:6:\"active\";s:1:\"1\";s:5:\"value\";s:4:\"true\";s:7:\"message\";s:32:\"Trường này là bắt buộc.\";}}s:10:\"custom_use\";s:0:\"\";s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:14:\"loai-van-thang\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:19:\"wpcf-loai-van-thang\";s:9:\"meta_type\";s:8:\"postmeta\";}s:25:\"khoi-luong-van-thang-hang\";a:8:{s:2:\"id\";s:25:\"khoi-luong-van-thang-hang\";s:4:\"slug\";s:25:\"khoi-luong-van-thang-hang\";s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:34:\"Khối lượng vận thăng hàng\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:6:{s:7:\"options\";a:3:{s:59:\"wpcf-fields-radio-option-8bbda7fa8f55f32faa1a3504e3d5fff7-1\";a:3:{s:5:\"title\";s:6:\"500 kg\";s:5:\"value\";s:1:\"1\";s:13:\"display_value\";s:1:\"1\";}s:7:\"default\";s:59:\"wpcf-fields-radio-option-8bbda7fa8f55f32faa1a3504e3d5fff7-1\";s:59:\"wpcf-fields-radio-option-4e37846626452316f21e82494c11c5fd-1\";a:3:{s:5:\"title\";s:7:\"1000 kg\";s:5:\"value\";s:1:\"2\";s:13:\"display_value\";s:1:\"2\";}}s:7:\"display\";s:2:\"db\";s:8:\"validate\";a:1:{s:8:\"required\";a:3:{s:6:\"active\";s:1:\"1\";s:5:\"value\";s:4:\"true\";s:7:\"message\";s:32:\"Trường này là bắt buộc.\";}}s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:10:\"radio-5835\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:30:\"wpcf-khoi-luong-van-thang-hang\";s:9:\"meta_type\";s:8:\"postmeta\";}s:7:\"so-long\";a:8:{s:2:\"id\";s:7:\"so-long\";s:4:\"slug\";s:7:\"so-long\";s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:11:\"Số lồng\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:8:{s:13:\"slug-pre-save\";s:7:\"so-long\";s:7:\"options\";a:3:{s:59:\"wpcf-fields-radio-option-ebf8f48b22f8ebd014c99fa428bb883b-1\";a:3:{s:5:\"title\";s:8:\"1 lồng\";s:5:\"value\";s:1:\"1\";s:13:\"display_value\";s:1:\"1\";}s:7:\"default\";s:59:\"wpcf-fields-radio-option-ebf8f48b22f8ebd014c99fa428bb883b-1\";s:59:\"wpcf-fields-radio-option-9f07760324650eaf99b8604ddf9a70ed-1\";a:3:{s:5:\"title\";s:8:\"2 lồng\";s:5:\"value\";s:1:\"2\";s:13:\"display_value\";s:1:\"2\";}}s:7:\"display\";s:2:\"db\";s:8:\"validate\";a:1:{s:8:\"required\";a:3:{s:6:\"active\";s:1:\"1\";s:5:\"value\";s:4:\"true\";s:7:\"message\";s:32:\"Trường này là bắt buộc.\";}}s:10:\"custom_use\";s:0:\"\";s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:7:\"so-long\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:12:\"wpcf-so-long\";s:9:\"meta_type\";s:8:\"postmeta\";}s:15:\"khoi-luong-long\";a:8:{s:2:\"id\";s:15:\"khoi-luong-long\";s:4:\"slug\";s:15:\"khoi-luong-long\";s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:22:\"Khối lượng lồng\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:6:{s:7:\"options\";a:3:{s:59:\"wpcf-fields-radio-option-1e944f0ec91ed56aa5e26bd75659b966-1\";a:3:{s:5:\"title\";s:7:\"1 tấn\";s:5:\"value\";s:1:\"1\";s:13:\"display_value\";s:1:\"1\";}s:7:\"default\";s:59:\"wpcf-fields-radio-option-1e944f0ec91ed56aa5e26bd75659b966-1\";s:59:\"wpcf-fields-radio-option-ba70e4d5f467f8bcd606deced2156829-1\";a:3:{s:5:\"title\";s:7:\"2 tấn\";s:5:\"value\";s:1:\"2\";s:13:\"display_value\";s:1:\"2\";}}s:7:\"display\";s:2:\"db\";s:8:\"validate\";a:1:{s:8:\"required\";a:3:{s:6:\"active\";s:1:\"1\";s:5:\"value\";s:4:\"true\";s:7:\"message\";s:32:\"Trường này là bắt buộc.\";}}s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:10:\"radio-8269\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:20:\"wpcf-khoi-luong-long\";s:9:\"meta_type\";s:8:\"postmeta\";}s:8:\"bien-tan\";a:8:{s:2:\"id\";s:8:\"bien-tan\";s:4:\"slug\";s:8:\"bien-tan\";s:4:\"type\";s:5:\"radio\";s:4:\"name\";s:12:\"Biến tần\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:8:{s:13:\"slug-pre-save\";s:8:\"bien-tan\";s:7:\"options\";a:3:{s:59:\"wpcf-fields-radio-option-cbf2fff47bc7394cf70a2af163bb07a2-1\";a:3:{s:5:\"title\";s:12:\"Biến tần\";s:5:\"value\";s:1:\"1\";s:13:\"display_value\";s:1:\"1\";}s:7:\"default\";s:59:\"wpcf-fields-radio-option-cbf2fff47bc7394cf70a2af163bb07a2-1\";s:59:\"wpcf-fields-radio-option-9e5f2bbb13486cc8124ae9740efe69a0-1\";a:3:{s:5:\"title\";s:19:\"Không biến tần\";s:5:\"value\";s:1:\"2\";s:13:\"display_value\";s:1:\"2\";}}s:7:\"display\";s:2:\"db\";s:8:\"validate\";a:1:{s:8:\"required\";a:3:{s:6:\"active\";s:1:\"1\";s:5:\"value\";s:4:\"true\";s:7:\"message\";s:32:\"Trường này là bắt buộc.\";}}s:10:\"custom_use\";s:0:\"\";s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:8:\"bien-tan\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:13:\"wpcf-bien-tan\";s:9:\"meta_type\";s:8:\"postmeta\";}s:6:\"vi-tri\";a:8:{s:2:\"id\";s:6:\"vi-tri\";s:4:\"slug\";s:6:\"vi-tri\";s:4:\"type\";s:9:\"textfield\";s:4:\"name\";s:9:\"Vị trí\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:8:{s:13:\"slug-pre-save\";s:6:\"vi-tri\";s:11:\"placeholder\";s:16:\"Nhập vị trí\";s:18:\"user_default_value\";s:0:\"\";s:10:\"repetitive\";s:1:\"0\";s:10:\"custom_use\";s:0:\"\";s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:6:\"vi-tri\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:11:\"wpcf-vi-tri\";s:9:\"meta_type\";s:8:\"postmeta\";}s:8:\"so-luong\";a:8:{s:2:\"id\";s:8:\"so-luong\";s:4:\"slug\";s:8:\"so-luong\";s:4:\"type\";s:7:\"numeric\";s:4:\"name\";s:13:\"Số lượng\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:9:{s:13:\"slug-pre-save\";s:8:\"so-luong\";s:11:\"placeholder\";s:32:\"Nhập số lượng giàn giáo\";s:18:\"user_default_value\";s:0:\"\";s:10:\"repetitive\";s:1:\"0\";s:8:\"validate\";a:1:{s:6:\"number\";a:2:{s:6:\"active\";s:1:\"1\";s:7:\"message\";s:41:\"Vui lòng nhập dữ liệu bằng số.\";}}s:10:\"custom_use\";s:0:\"\";s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:8:\"so-luong\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:13:\"wpcf-so-luong\";s:9:\"meta_type\";s:8:\"postmeta\";}s:19:\"thoi-gian-giao-hang\";a:8:{s:2:\"id\";s:19:\"thoi-gian-giao-hang\";s:4:\"slug\";s:19:\"thoi-gian-giao-hang\";s:4:\"type\";s:9:\"textfield\";s:4:\"name\";s:22:\"Thời gian giao hàng\";s:11:\"description\";s:0:\"\";s:4:\"data\";a:8:{s:13:\"slug-pre-save\";s:19:\"thoi-gian-giao-hang\";s:11:\"placeholder\";s:29:\"Nhập thời gian giao hàng\";s:18:\"user_default_value\";s:0:\"\";s:10:\"repetitive\";s:1:\"0\";s:10:\"custom_use\";s:0:\"\";s:19:\"conditional_display\";a:0:{}s:10:\"submit-key\";s:19:\"thoi-gian-giao-hang\";s:16:\"disabled_by_type\";i:0;}s:8:\"meta_key\";s:24:\"wpcf-thoi-gian-giao-hang\";s:9:\"meta_type\";s:8:\"postmeta\";}}', 'yes'),
(728, '_wpcf_promo_tabs', 'a:2:{s:8:\"selected\";i:1;s:4:\"time\";i:1541342151;}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(6, 10, '_wc_review_count', '0'),
(7, 10, '_wc_rating_count', 'a:0:{}'),
(8, 10, '_wc_average_rating', '0'),
(9, 10, '_edit_last', '1'),
(10, 10, '_edit_lock', '1540701855:1'),
(11, 11, '_wp_attached_file', '2018/10/bulong.jpg'),
(12, 11, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:600;s:6:\"height\";i:600;s:4:\"file\";s:18:\"2018/10/bulong.jpg\";s:5:\"sizes\";a:8:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:18:\"bulong-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:18:\"bulong-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:18:\"bulong-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:18:\"bulong-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:18:\"bulong-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:18:\"bulong-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:18:\"bulong-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:18:\"bulong-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(13, 10, '_sku', ''),
(14, 10, '_regular_price', ''),
(15, 10, '_sale_price', ''),
(16, 10, '_sale_price_dates_from', ''),
(17, 10, '_sale_price_dates_to', ''),
(18, 10, 'total_sales', '0'),
(19, 10, '_tax_status', 'taxable'),
(20, 10, '_tax_class', ''),
(21, 10, '_manage_stock', 'no'),
(22, 10, '_backorders', 'no'),
(23, 10, '_low_stock_amount', ''),
(24, 10, '_sold_individually', 'no'),
(25, 10, '_weight', ''),
(26, 10, '_length', ''),
(27, 10, '_width', ''),
(28, 10, '_height', ''),
(29, 10, '_upsell_ids', 'a:0:{}'),
(30, 10, '_crosssell_ids', 'a:0:{}'),
(31, 10, '_purchase_note', ''),
(32, 10, '_default_attributes', 'a:0:{}'),
(33, 10, '_virtual', 'no'),
(34, 10, '_downloadable', 'no'),
(35, 10, '_product_image_gallery', ''),
(36, 10, '_download_limit', '-1'),
(37, 10, '_download_expiry', '-1'),
(38, 10, '_stock', NULL),
(39, 10, '_stock_status', 'instock'),
(40, 10, '_product_version', '3.5.0'),
(41, 10, '_price', ''),
(42, 12, '_edit_last', '1'),
(43, 12, '_edit_lock', '1540701747:1'),
(44, 10, '_thumbnail_id', '11'),
(45, 5, '_edit_lock', '1540701872:1'),
(46, 14, '_edit_last', '1'),
(47, 14, '_edit_lock', '1540712848:1'),
(48, 16, '_edit_last', '1'),
(49, 16, '_edit_lock', '1540712693:1'),
(50, 18, '_edit_last', '1'),
(51, 18, '_edit_lock', '1540712291:1'),
(52, 20, '_edit_last', '1'),
(53, 20, '_edit_lock', '1540712298:1'),
(54, 22, '_edit_last', '1'),
(55, 22, '_edit_lock', '1540712476:1'),
(56, 14, '_wp_trash_meta_status', 'publish'),
(57, 14, '_wp_trash_meta_time', '1540713185'),
(58, 14, '_wp_desired_post_slug', 'product'),
(59, 3, '_edit_lock', '1540713059:1'),
(63, 28, '_wc_review_count', '0'),
(64, 28, '_wc_rating_count', 'a:0:{}'),
(65, 28, '_wc_average_rating', '0'),
(66, 28, '_edit_last', '1'),
(67, 28, '_edit_lock', '1540717466:1'),
(68, 29, '_wp_attached_file', '2018/10/gian-giao-nem-2.jpg'),
(69, 29, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1508;s:6:\"height\";i:904;s:4:\"file\";s:27:\"2018/10/gian-giao-nem-2.jpg\";s:5:\"sizes\";a:10:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-300x180.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:180;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-768x460.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:460;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:28:\"gian-giao-nem-2-1024x614.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:614;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:27:\"gian-giao-nem-2-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-600x360.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:360;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-600x360.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:360;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:27:\"gian-giao-nem-2-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}'),
(70, 30, '_wp_attached_file', '2018/10/gian-giao-ringlock.jpg'),
(71, 30, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:600;s:6:\"height\";i:393;s:4:\"file\";s:30:\"2018/10/gian-giao-ringlock.jpg\";s:5:\"sizes\";a:8:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-300x197.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:197;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:30:\"gian-giao-ringlock-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-600x393.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:393;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-600x393.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:393;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:30:\"gian-giao-ringlock-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(72, 28, '_thumbnail_id', '30'),
(73, 28, '_sku', ''),
(74, 28, '_regular_price', ''),
(75, 28, '_sale_price', ''),
(76, 28, '_sale_price_dates_from', ''),
(77, 28, '_sale_price_dates_to', ''),
(78, 28, 'total_sales', '0'),
(79, 28, '_tax_status', 'taxable'),
(80, 28, '_tax_class', ''),
(81, 28, '_manage_stock', 'no'),
(82, 28, '_backorders', 'no'),
(83, 28, '_low_stock_amount', ''),
(84, 28, '_sold_individually', 'no'),
(85, 28, '_weight', ''),
(86, 28, '_length', ''),
(87, 28, '_width', ''),
(88, 28, '_height', ''),
(89, 28, '_upsell_ids', 'a:0:{}'),
(90, 28, '_crosssell_ids', 'a:0:{}'),
(91, 28, '_purchase_note', ''),
(92, 28, '_default_attributes', 'a:0:{}'),
(93, 28, '_virtual', 'no'),
(94, 28, '_downloadable', 'no'),
(95, 28, '_product_image_gallery', ''),
(96, 28, '_download_limit', '-1'),
(97, 28, '_download_expiry', '-1'),
(98, 28, '_stock', NULL),
(99, 28, '_stock_status', 'instock'),
(100, 28, '_product_version', '3.5.0'),
(101, 28, '_price', ''),
(102, 31, '_wc_review_count', '0'),
(103, 31, '_wc_rating_count', 'a:0:{}'),
(104, 31, '_wc_average_rating', '0'),
(105, 32, '_wp_attached_file', '2018/10/bas-chong-ringlock.jpg'),
(106, 32, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:588;s:6:\"height\";i:571;s:4:\"file\";s:30:\"2018/10/bas-chong-ringlock.jpg\";s:5:\"sizes\";a:6:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:30:\"bas-chong-ringlock-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:30:\"bas-chong-ringlock-300x291.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:291;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:30:\"bas-chong-ringlock-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:30:\"bas-chong-ringlock-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:30:\"bas-chong-ringlock-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:30:\"bas-chong-ringlock-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(107, 31, '_edit_last', '1'),
(108, 31, '_thumbnail_id', '32'),
(109, 31, '_sku', ''),
(110, 31, '_regular_price', ''),
(111, 31, '_sale_price', ''),
(112, 31, '_sale_price_dates_from', ''),
(113, 31, '_sale_price_dates_to', ''),
(114, 31, 'total_sales', '0'),
(115, 31, '_tax_status', 'taxable'),
(116, 31, '_tax_class', ''),
(117, 31, '_manage_stock', 'no'),
(118, 31, '_backorders', 'no'),
(119, 31, '_low_stock_amount', ''),
(120, 31, '_sold_individually', 'no'),
(121, 31, '_weight', ''),
(122, 31, '_length', ''),
(123, 31, '_width', ''),
(124, 31, '_height', ''),
(125, 31, '_upsell_ids', 'a:0:{}'),
(126, 31, '_crosssell_ids', 'a:0:{}'),
(127, 31, '_purchase_note', ''),
(128, 31, '_default_attributes', 'a:0:{}'),
(129, 31, '_virtual', 'no'),
(130, 31, '_downloadable', 'no'),
(131, 31, '_product_image_gallery', ''),
(132, 31, '_download_limit', '-1'),
(133, 31, '_download_expiry', '-1'),
(134, 31, '_stock', NULL),
(135, 31, '_stock_status', 'instock'),
(136, 31, '_product_version', '3.5.0'),
(137, 31, '_price', ''),
(138, 31, '_edit_lock', '1540717580:1'),
(139, 33, '_wc_review_count', '0'),
(140, 33, '_wc_rating_count', 'a:0:{}'),
(141, 33, '_wc_average_rating', '0'),
(142, 34, '_wp_attached_file', '2018/10/gondola-ZLP-630-2.jpg'),
(143, 34, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:700;s:6:\"height\";i:600;s:4:\"file\";s:29:\"2018/10/gondola-ZLP-630-2.jpg\";s:5:\"sizes\";a:8:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-300x257.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:257;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-600x514.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:514;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-600x514.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:514;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:29:\"gondola-ZLP-630-2-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(144, 33, '_edit_last', '1'),
(145, 33, '_edit_lock', '1540717776:1'),
(146, 33, '_thumbnail_id', '34'),
(147, 33, '_sku', ''),
(148, 33, '_regular_price', ''),
(149, 33, '_sale_price', ''),
(150, 33, '_sale_price_dates_from', ''),
(151, 33, '_sale_price_dates_to', ''),
(152, 33, 'total_sales', '0'),
(153, 33, '_tax_status', 'taxable'),
(154, 33, '_tax_class', ''),
(155, 33, '_manage_stock', 'no'),
(156, 33, '_backorders', 'no'),
(157, 33, '_low_stock_amount', ''),
(158, 33, '_sold_individually', 'no'),
(159, 33, '_weight', ''),
(160, 33, '_length', ''),
(161, 33, '_width', ''),
(162, 33, '_height', ''),
(163, 33, '_upsell_ids', 'a:0:{}'),
(164, 33, '_crosssell_ids', 'a:0:{}'),
(165, 33, '_purchase_note', ''),
(166, 33, '_default_attributes', 'a:0:{}'),
(167, 33, '_virtual', 'no'),
(168, 33, '_downloadable', 'no'),
(169, 33, '_product_image_gallery', ''),
(170, 33, '_download_limit', '-1'),
(171, 33, '_download_expiry', '-1'),
(172, 33, '_stock', NULL),
(173, 33, '_stock_status', 'instock'),
(174, 33, '_product_version', '3.5.0'),
(175, 33, '_price', ''),
(176, 35, '_wc_review_count', '0'),
(177, 35, '_wc_rating_count', 'a:0:{}'),
(178, 35, '_wc_average_rating', '0'),
(179, 36, '_wp_attached_file', '2018/10/cac-thanh-phan-chinh-VTH.jpg'),
(180, 36, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:900;s:6:\"height\";i:517;s:4:\"file\";s:36:\"2018/10/cac-thanh-phan-chinh-VTH.jpg\";s:5:\"sizes\";a:9:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-300x172.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:172;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-768x441.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:441;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-600x345.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:345;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-600x345.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:345;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:36:\"cac-thanh-phan-chinh-VTH-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(181, 37, '_wp_attached_file', '2018/10/thong-so-ky-thuat-van-thang-hang.jpg'),
(182, 37, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:900;s:6:\"height\";i:693;s:4:\"file\";s:44:\"2018/10/thong-so-ky-thuat-van-thang-hang.jpg\";s:5:\"sizes\";a:9:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-300x231.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:231;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-768x591.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:591;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-600x462.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:462;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-600x462.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:462;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:44:\"thong-so-ky-thuat-van-thang-hang-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(183, 38, '_wp_attached_file', '2018/10/van-thang-hang-500k-gia-hoang.jpg'),
(184, 38, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:600;s:6:\"height\";i:600;s:4:\"file\";s:41:\"2018/10/van-thang-hang-500k-gia-hoang.jpg\";s:5:\"sizes\";a:8:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:41:\"van-thang-hang-500k-gia-hoang-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(185, 35, '_edit_last', '1'),
(186, 35, '_edit_lock', '1540718111:1'),
(187, 35, '_thumbnail_id', '38'),
(188, 35, '_sku', ''),
(189, 35, '_regular_price', ''),
(190, 35, '_sale_price', ''),
(191, 35, '_sale_price_dates_from', ''),
(192, 35, '_sale_price_dates_to', ''),
(193, 35, 'total_sales', '0'),
(194, 35, '_tax_status', 'taxable'),
(195, 35, '_tax_class', ''),
(196, 35, '_manage_stock', 'no'),
(197, 35, '_backorders', 'no'),
(198, 35, '_low_stock_amount', ''),
(199, 35, '_sold_individually', 'no'),
(200, 35, '_weight', ''),
(201, 35, '_length', ''),
(202, 35, '_width', ''),
(203, 35, '_height', ''),
(204, 35, '_upsell_ids', 'a:0:{}'),
(205, 35, '_crosssell_ids', 'a:0:{}'),
(206, 35, '_purchase_note', ''),
(207, 35, '_default_attributes', 'a:0:{}'),
(208, 35, '_virtual', 'no'),
(209, 35, '_downloadable', 'no'),
(210, 35, '_product_image_gallery', ''),
(211, 35, '_download_limit', '-1'),
(212, 35, '_download_expiry', '-1'),
(213, 35, '_stock', NULL),
(214, 35, '_stock_status', 'instock'),
(215, 35, '_product_version', '3.5.0'),
(216, 35, '_price', ''),
(217, 39, '_wc_review_count', '0'),
(218, 39, '_wc_rating_count', 'a:0:{}'),
(219, 39, '_wc_average_rating', '0'),
(220, 39, '_edit_last', '1'),
(221, 39, '_edit_lock', '1540718221:1'),
(222, 40, '_wp_attached_file', '2018/10/thang-nang.jpg'),
(223, 40, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:600;s:6:\"height\";i:600;s:4:\"file\";s:22:\"2018/10/thang-nang.jpg\";s:5:\"sizes\";a:8:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"thang-nang-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"thang-nang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"woocommerce_thumbnail\";a:5:{s:4:\"file\";s:22:\"thang-nang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";s:9:\"uncropped\";b:1;}s:18:\"woocommerce_single\";a:4:{s:4:\"file\";s:22:\"thang-nang-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:29:\"woocommerce_gallery_thumbnail\";a:4:{s:4:\"file\";s:22:\"thang-nang-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"shop_catalog\";a:4:{s:4:\"file\";s:22:\"thang-nang-300x300.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:11:\"shop_single\";a:4:{s:4:\"file\";s:22:\"thang-nang-600x600.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:600;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"shop_thumbnail\";a:4:{s:4:\"file\";s:22:\"thang-nang-100x100.jpg\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(224, 39, '_thumbnail_id', '40'),
(225, 39, '_sku', ''),
(226, 39, '_regular_price', ''),
(227, 39, '_sale_price', ''),
(228, 39, '_sale_price_dates_from', ''),
(229, 39, '_sale_price_dates_to', ''),
(230, 39, 'total_sales', '0'),
(231, 39, '_tax_status', 'taxable'),
(232, 39, '_tax_class', ''),
(233, 39, '_manage_stock', 'no'),
(234, 39, '_backorders', 'no'),
(235, 39, '_low_stock_amount', ''),
(236, 39, '_sold_individually', 'no'),
(237, 39, '_weight', ''),
(238, 39, '_length', ''),
(239, 39, '_width', ''),
(240, 39, '_height', ''),
(241, 39, '_upsell_ids', 'a:0:{}'),
(242, 39, '_crosssell_ids', 'a:0:{}'),
(243, 39, '_purchase_note', ''),
(244, 39, '_default_attributes', 'a:0:{}'),
(245, 39, '_virtual', 'no'),
(246, 39, '_downloadable', 'no'),
(247, 39, '_product_image_gallery', ''),
(248, 39, '_download_limit', '-1'),
(249, 39, '_download_expiry', '-1'),
(250, 39, '_stock', NULL),
(251, 39, '_stock_status', 'instock'),
(252, 39, '_product_version', '3.5.0'),
(253, 39, '_price', ''),
(254, 43, '_edit_last', '1'),
(255, 43, '_edit_lock', '1540718749:1'),
(256, 45, '_edit_last', '1'),
(257, 45, '_edit_lock', '1540719086:1'),
(269, 1, '_edit_lock', '1540719728:1'),
(271, 55, '_edit_lock', '1541228715:1'),
(275, 59, '_edit_lock', '1541228700:1'),
(276, 60, '_edit_lock', '1541341431:1'),
(277, 61, '_wp_types_group_fields', ',hinh-thuc-san-pham,'),
(278, 61, '_wp_types_group_post_types', 'all'),
(279, 61, '_wp_types_group_templates', 'all'),
(280, 61, '_wp_types_group_terms', 'all'),
(281, 62, '_wp_types_group_fields', ',loai-van-thang,'),
(282, 62, '_wp_types_group_post_types', ',,van-thang,'),
(283, 62, '_wp_types_group_templates', ',,'),
(284, 62, '_wp_types_group_terms', 'all'),
(285, 63, '_wp_types_group_fields', ',khoi-luong-van-thang-hang,'),
(286, 63, '_wp_types_group_post_types', 'all'),
(287, 63, '_wp_types_group_templates', 'all'),
(288, 63, '_wp_types_group_terms', 'all'),
(289, 64, '_wp_types_group_fields', ',so-long,'),
(290, 64, '_wp_types_group_post_types', ',,van-thang,'),
(291, 64, '_wp_types_group_templates', ',,'),
(292, 64, '_wp_types_group_terms', 'all'),
(293, 65, '_wp_types_group_fields', ',khoi-luong-long,'),
(294, 65, '_wp_types_group_post_types', 'all'),
(295, 65, '_wp_types_group_templates', 'all'),
(296, 65, '_wp_types_group_terms', 'all'),
(297, 66, '_wp_types_group_fields', ',bien-tan,'),
(298, 66, '_wp_types_group_post_types', ',,van-thang,'),
(299, 66, '_wp_types_group_templates', ',,'),
(300, 66, '_wp_types_group_terms', 'all'),
(301, 63, '_wpcf_conditional_display', 'a:4:{s:8:\"relation\";s:3:\"AND\";s:10:\"conditions\";a:1:{s:44:\"condition_631c3dd202c803d67e8dfed6431c0812-1\";a:6:{s:5:\"field\";s:14:\"loai-van-thang\";s:9:\"operation\";s:1:\"=\";s:5:\"value\";s:1:\"1\";s:5:\"month\";s:2:\"11\";s:4:\"date\";s:2:\"04\";s:4:\"year\";s:4:\"2018\";}}s:6:\"custom\";s:0:\"\";s:10:\"custom_use\";s:1:\"0\";}'),
(302, 65, '_wpcf_conditional_display', 'a:4:{s:8:\"relation\";s:3:\"AND\";s:10:\"conditions\";a:1:{s:44:\"condition_efccfa1c04ec45db34053b77f6f867d2-1\";a:6:{s:5:\"field\";s:14:\"loai-van-thang\";s:9:\"operation\";s:1:\"=\";s:5:\"value\";s:1:\"2\";s:5:\"month\";s:2:\"11\";s:4:\"date\";s:2:\"04\";s:4:\"year\";s:4:\"2018\";}}s:6:\"custom\";s:0:\"\";s:10:\"custom_use\";s:1:\"0\";}'),
(303, 66, '_wpcf_conditional_display', 'a:4:{s:8:\"relation\";s:3:\"AND\";s:10:\"conditions\";a:1:{s:44:\"condition_997328a75334ff8ffe038cb3b670204d-1\";a:6:{s:5:\"field\";s:14:\"loai-van-thang\";s:9:\"operation\";s:1:\"=\";s:5:\"value\";s:1:\"2\";s:5:\"month\";s:2:\"11\";s:4:\"date\";s:2:\"04\";s:4:\"year\";s:4:\"2018\";}}s:6:\"custom\";s:0:\"\";s:10:\"custom_use\";s:1:\"0\";}'),
(304, 66, '_toolset_edit_last', '1541342329'),
(305, 66, '_wp_types_group_filters_association', 'any'),
(306, 62, '_toolset_edit_last', '1541342359'),
(307, 62, '_wp_types_group_filters_association', 'any'),
(308, 64, '_wpcf_conditional_display', 'a:4:{s:8:\"relation\";s:3:\"AND\";s:10:\"conditions\";a:1:{s:44:\"condition_82111b276c6fd9705f3696a530e70234-1\";a:6:{s:5:\"field\";s:14:\"loai-van-thang\";s:9:\"operation\";s:1:\"=\";s:5:\"value\";s:1:\"2\";s:5:\"month\";s:2:\"11\";s:4:\"date\";s:2:\"04\";s:4:\"year\";s:4:\"2018\";}}s:6:\"custom\";s:0:\"\";s:10:\"custom_use\";s:1:\"0\";}'),
(309, 64, '_toolset_edit_last', '1541342381'),
(310, 64, '_wp_types_group_filters_association', 'any'),
(311, 69, '_wp_types_group_fields', ',vi-tri,so-luong,thoi-gian-giao-hang,'),
(312, 69, '_wp_types_group_post_types', ',,gian-giao-nem,'),
(313, 69, '_wp_types_group_templates', ',,'),
(314, 69, '_wp_types_group_terms', 'all'),
(316, 69, '_toolset_edit_last', '1541342939'),
(317, 69, '_wp_types_group_filters_association', 'any'),
(318, 69, '_wp_old_slug', 'thong-tin-gian-giao-nem-ban');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2018-10-24 03:30:44', '2018-10-24 03:30:44', 'Chúc mừng đến với WordPress. Đây là bài viết đầu tiên của bạn. Hãy chỉnh sửa hay xóa bài viết này, và bắt đầu viết blog!', 'Chào tất cả mọi người!', '', 'publish', 'open', 'open', '', 'chao-moi-nguoi', '', '', '2018-10-24 03:30:44', '2018-10-24 03:30:44', '', 0, 'http://cokhigiahoang.local/?p=1', 0, 'post', '', 1),
(2, 1, '2018-10-24 03:30:44', '2018-10-24 03:30:44', 'Đây là một trang mẫu. Nó khác với một bài blog bởi vì nó sẽ là một trang tĩnh và sẽ được thêm vào thanh menu của trang web của bạn (trong hầu hết theme). Mọi người thường bắt đầu bằng một trang Giới thiệu để giới thiệu bản thân đến người dùng tiềm năng. Bạn có thể viết như sau:\n\n<blockquote>Xin chào! Tôi là người giao thư bằng xe đạp vào ban ngày, một diễn viên đầy tham vọng vào ban đêm, và đây là trang web của tôi. Tôi sống ở Los Angeles, có một chú cho tuyệt vời tên là Jack, và tôi thích uống cocktail.</blockquote>\n\n...hay như thế này:\n\n<blockquote>Công ty XYZ Doohickey được thành lập vào năm 1971, và đã cung cấp đồ dùng chất lượng cho công chúng kể từ đó. Nằm ở thành phố Gotham, XYZ tạo việc làm cho hơn 2.000 người và làm tất cả những điều tuyệt vời cho cộng đồng Gotham.</blockquote>\n\nLà người dùng WordPress mới, bạn nên truy cập <a href=\"http://cokhigiahoang.local/wp-admin/\">trang quản trị</a> để xóa trang này và tạo các trang mới cho nội dung của bạn. Chúc vui vẻ!', 'Trang Mẫu', '', 'publish', 'closed', 'open', '', 'Trang mẫu', '', '', '2018-10-24 03:30:44', '2018-10-24 03:30:44', '', 0, 'http://cokhigiahoang.local/?page_id=2', 0, 'page', '', 0),
(3, 1, '2018-10-24 03:30:44', '2018-10-24 03:30:44', '<h2>Chúng tôi là ai</h2><p>Địa chỉ website là: http://cokhigiahoang.local.</p><h2>Thông tin cá nhân nào bị thu thập và tại sao thu thập</h2><h3>Bình luận</h3><p>Khi khách truy cập để lại bình luận trên trang web, chúng tôi thu thập dữ liệu được hiển thị trong biểu mẫu bình luận và cũng là địa chỉ IP của người truy cập và chuỗi user agent của người dùng trình duyệt để giúp phát hiện spam</p><p>Một chuỗi ẩn danh được tạo từ địa chỉ email của bạn (còn được gọi là hash) có thể được cung cấp cho dịch vụ Gravatar để xem bạn có đang sử dụng nó hay không. Chính sách bảo mật của dịch vụ Gravatar có tại đây: https://automattic.com/privacy/. Sau khi chấp nhận bình luận của bạn, ảnh tiểu sử của bạn được hiển thị công khai trong ngữ cảnh bình luận của bạn.</p><h3>Thư viện</h3><p>Nếu bạn tải hình ảnh lên trang web, bạn nên tránh tải lên hình ảnh có dữ liệu vị trí được nhúng (EXIF GPS) đi kèm. Khách truy cập vào trang web có thể tải xuống và giải nén bất kỳ dữ liệu vị trí nào từ hình ảnh trên trang web.</p><h3>Thông tin liên hệ</h3><h3>Cookies</h3><p>Nếu bạn viết bình luận trong website, bạn có thể cung cấp cần nhập tên, email địa chỉ website trong cookie. Các thông tin này nhằm giúp bạn không cần nhập thông tin nhiều lần khi viết bình luận khác. Cookie này sẽ được lưu giữ trong một năm.</p><p>Nếu bạn có tài khoản và đăng nhập và website, chúng tôi sẽ thiết lập một cookie tạm thời để xác định nếu trình duyệt cho phép sử dụng cookie. Cookie này không bao gồm thông tin cá nhân và sẽ được gỡ bỏ khi bạn đóng trình duyệt.</p><p>Khi bạn đăng nhập, chúng tôi sẽ thiết lập một vài cookie để lưu thông tin đăng nhập và lựa chọn hiển thị. Thông tin đăng nhập gần nhất lưu trong hai ngày, và lựa chọn hiển thị gần nhất lưu trong một năm. Nếu bạn chọn &quot;Nhớ tôi&quot;, thông tin đăng nhập sẽ được lưu trong hai tuần. Nếu bạn thoát tài khoản, thông tin cookie đăng nhập sẽ bị xoá.</p><p>Nếu bạn sửa hoặc công bố bài viết, một bản cookie bổ sung sẽ được lưu trong trình duyệt. Cookie này không chứa thông tin cá nhân và chỉ đơn giản bao gồm ID của bài viết bạn đã sửa. Nó tự động hết hạn sau 1 ngày.</p><h3>Nội dung nhúng từ website khác</h3><p>Các bài viết trên trang web này có thể bao gồm nội dung được nhúng (ví dụ: video, hình ảnh, bài viết, v.v.). Nội dung được nhúng từ các trang web khác hoạt động theo cùng một cách chính xác như khi khách truy cập đã truy cập trang web khác.</p><p>Những website này có thể thu thập dữ liệu về bạn, sử dụng cookie, nhúng các trình theo dõi của bên thứ ba và giám sát tương tác của bạn với nội dung được nhúng đó, bao gồm theo dõi tương tác của bạn với nội dung được nhúng nếu bạn có tài khoản và đã đăng nhập vào trang web đó.</p><h3>Phân tích</h3><h2>Chúng tôi chia sẻ dữ liệu của bạn với ai</h2><h2>Dữ liệu của bạn tồn tại bao lâu</h2><p>Nếu bạn để lại bình luận, bình luận và siêu dữ liệu của nó sẽ được giữ lại vô thời hạn. Điều này là để chúng tôi có thể tự động nhận ra và chấp nhận bất kỳ bình luận nào thay vì giữ chúng trong khu vực đợi kiểm duyệt.</p><p>Đối với người dùng đăng ký trên trang web của chúng tôi (nếu có), chúng tôi cũng lưu trữ thông tin cá nhân mà họ cung cấp trong hồ sơ người dùng của họ. Tất cả người dùng có thể xem, chỉnh sửa hoặc xóa thông tin cá nhân của họ bất kỳ lúc nào (ngoại trừ họ không thể thay đổi tên người dùng của họ). Quản trị viên trang web cũng có thể xem và chỉnh sửa thông tin đó.</p><h2>Các quyền nào của bạn với dữ liệu của mình</h2><p>Nếu bạn có tài khoản trên trang web này hoặc đã để lại nhận xét, bạn có thể yêu cầu nhận tệp xuất dữ liệu cá nhân mà chúng tôi lưu giữ về bạn, bao gồm mọi dữ liệu bạn đã cung cấp cho chúng tôi. Bạn cũng có thể yêu cầu chúng tôi xóa mọi dữ liệu cá nhân mà chúng tôi lưu giữ về bạn. Điều này không bao gồm bất kỳ dữ liệu nào chúng tôi có nghĩa vụ giữ cho các mục đích hành chính, pháp lý hoặc bảo mật.</p><h2>Các dữ liệu của bạn được gửi tới đâu</h2><p>Các bình luận của khách (không phải là thành viên) có thể được kiểm tra thông qua dịch vụ tự động phát hiện spam.</p><h2>Thông tin liên hệ của bạn</h2><h2>Thông tin bổ sung</h2><h3>Cách chúng tôi bảo vệ dữ liệu của bạn</h3><h3>Các quá trình tiết lộ dữ liệu mà chúng tôi thực hiện</h3><h3>Những bên thứ ba chúng tôi nhận dữ liệu từ đó</h3><h3>Việc quyết định và/hoặc thu thập thông tin tự động mà chúng tôi áp dụng với dữ liệu người dùng</h3><h3>Các yêu cầu công bố thông tin được quản lý</h3>', 'Chính sách bảo mật', '', 'draft', 'closed', 'open', '', 'chinh-sach-bao-mat', '', '', '2018-10-24 03:30:44', '2018-10-24 03:30:44', '', 0, 'http://cokhigiahoang.local/?page_id=3', 0, 'page', '', 0),
(5, 1, '2018-10-24 18:39:07', '2018-10-24 11:39:07', '', 'Shop', '', 'publish', 'closed', 'closed', '', 'shop', '', '', '2018-10-24 18:39:07', '2018-10-24 11:39:07', '', 0, 'http://cokhigiahoang.local/shop/', 0, 'page', '', 0),
(6, 1, '2018-10-24 18:39:07', '2018-10-24 11:39:07', '[woocommerce_cart]', 'Cart', '', 'publish', 'closed', 'closed', '', 'cart', '', '', '2018-10-24 18:39:07', '2018-10-24 11:39:07', '', 0, 'http://cokhigiahoang.local/cart/', 0, 'page', '', 0),
(7, 1, '2018-10-24 18:39:07', '2018-10-24 11:39:07', '[woocommerce_checkout]', 'Checkout', '', 'publish', 'closed', 'closed', '', 'checkout', '', '', '2018-10-24 18:39:07', '2018-10-24 11:39:07', '', 0, 'http://cokhigiahoang.local/checkout/', 0, 'page', '', 0),
(8, 1, '2018-10-24 18:39:07', '2018-10-24 11:39:07', '[woocommerce_my_account]', 'My account', '', 'publish', 'closed', 'closed', '', 'my-account', '', '', '2018-10-24 18:39:07', '2018-10-24 11:39:07', '', 0, 'http://cokhigiahoang.local/my-account/', 0, 'page', '', 0),
(10, 1, '2018-10-25 23:46:37', '2018-10-25 16:46:37', 'Bạn đang cần mua phụ tùng bulon <a title=\"vận thăng giá rẻ\" href=\"http://www.cokhigiahoang.com/tin-tuc/cho-thue-van-thang-gia-re-tai-tphcm-33\">vận thăng</a> giá rẻ đáp ứng tiêu chuẩn cho vận thăng, hãy liên hệ với GH. Nơi cung cấp đa dạng các loại phụ kiện vận thăng và các thiết bị nâng hạ khác. Chúng tôi thường cung cấp bulon M24 x 240, cường độ 8.8.\r\n\r\n<img class=\"alignnone size-medium wp-image-11\" src=\"http://cokhigiahoang.local/wp-content/uploads/2018/10/bulong-300x300.jpg\" alt=\"\" width=\"300\" height=\"300\" />\r\n<div>Công ty XD Cơ Khí Gia Hoàng</div>\r\n<div>Địa chỉ: 100/3/24 Lê Thị Hà, Hóc Môn, TPHCM</div>\r\n<div>Hotline: 0903 975 117</div>\r\n<div>Email: tranlai.giahoang@gmail.com</div>\r\n<div>Web: www.cokhigiahoang.com</div>\r\n<div>Fanpage: www.facebook.com/banchothuevanthanggiangiao</div>', 'Bulon vận thăng', '', 'publish', 'open', 'closed', '', 'bulon-van-thang', '', '', '2018-10-28 11:45:18', '2018-10-28 04:45:18', '', 0, 'http://cokhigiahoang.local/?post_type=product&#038;p=10', 0, 'product', '', 0),
(11, 1, '2018-10-25 23:44:43', '2018-10-25 16:44:43', '', 'bulong', '', 'inherit', 'open', 'closed', '', 'bulong', '', '', '2018-10-25 23:44:43', '2018-10-25 16:44:43', '', 10, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/bulong.jpg', 0, 'attachment', 'image/jpeg', 0),
(12, 1, '2018-10-28 11:42:25', '2018-10-28 04:42:25', '', 'Products', '', 'publish', 'closed', 'closed', '', 'products', '', '', '2018-10-28 11:42:25', '2018-10-28 04:42:25', '', 0, 'http://cokhigiahoang.local/?page_id=12', 0, 'page', '', 0),
(13, 1, '2018-10-28 11:42:25', '2018-10-28 04:42:25', '', 'Products', '', 'inherit', 'closed', 'closed', '', '12-revision-v1', '', '', '2018-10-28 11:42:25', '2018-10-28 04:42:25', '', 12, 'http://cokhigiahoang.local/12-revision-v1/', 0, 'revision', '', 0),
(14, 1, '2018-10-28 11:47:07', '2018-10-28 04:47:07', '', 'Product', '', 'trash', 'closed', 'closed', '', 'product__trashed', '', '', '2018-10-28 14:53:05', '2018-10-28 07:53:05', '', 0, 'http://cokhigiahoang.local/?page_id=14', 0, 'page', '', 0),
(15, 1, '2018-10-28 11:47:07', '2018-10-28 04:47:07', '', 'Product', '', 'inherit', 'closed', 'closed', '', '14-revision-v1', '', '', '2018-10-28 11:47:07', '2018-10-28 04:47:07', '', 14, 'http://cokhigiahoang.local/14-revision-v1/', 0, 'revision', '', 0),
(16, 1, '2018-10-28 14:38:43', '2018-10-28 07:38:43', 'wwwwwwwwww', 'About', '', 'publish', 'closed', 'closed', '', 'about', '', '', '2018-10-28 14:43:54', '2018-10-28 07:43:54', '', 0, 'http://cokhigiahoang.local/?page_id=16', 0, 'page', '', 0),
(17, 1, '2018-10-28 14:38:43', '2018-10-28 07:38:43', '', 'About', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2018-10-28 14:38:43', '2018-10-28 07:38:43', '', 16, 'http://cokhigiahoang.local/16-revision-v1/', 0, 'revision', '', 0),
(18, 1, '2018-10-28 14:38:54', '2018-10-28 07:38:54', '', 'Contact', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2018-10-28 14:38:54', '2018-10-28 07:38:54', '', 0, 'http://cokhigiahoang.local/?page_id=18', 0, 'page', '', 0),
(19, 1, '2018-10-28 14:38:54', '2018-10-28 07:38:54', '', 'Contact', '', 'inherit', 'closed', 'closed', '', '18-revision-v1', '', '', '2018-10-28 14:38:54', '2018-10-28 07:38:54', '', 18, 'http://cokhigiahoang.local/18-revision-v1/', 0, 'revision', '', 0),
(20, 1, '2018-10-28 14:40:40', '2018-10-28 07:40:40', '', 'Service', '', 'publish', 'closed', 'closed', '', 'service', '', '', '2018-10-28 14:40:40', '2018-10-28 07:40:40', '', 0, 'http://cokhigiahoang.local/?page_id=20', 0, 'page', '', 0),
(21, 1, '2018-10-28 14:40:40', '2018-10-28 07:40:40', '', 'Service', '', 'inherit', 'closed', 'closed', '', '20-revision-v1', '', '', '2018-10-28 14:40:40', '2018-10-28 07:40:40', '', 20, 'http://cokhigiahoang.local/20-revision-v1/', 0, 'revision', '', 0),
(22, 1, '2018-10-28 14:40:48', '2018-10-28 07:40:48', '', 'Services', '', 'publish', 'closed', 'closed', '', 'services', '', '', '2018-10-28 14:43:19', '2018-10-28 07:43:19', '', 0, 'http://cokhigiahoang.local/?page_id=22', 0, 'page', '', 0),
(23, 1, '2018-10-28 14:40:48', '2018-10-28 07:40:48', '', 'Services', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2018-10-28 14:40:48', '2018-10-28 07:40:48', '', 22, 'http://cokhigiahoang.local/22-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2018-10-28 14:43:06', '2018-10-28 07:43:06', 'www', 'Services', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2018-10-28 14:43:06', '2018-10-28 07:43:06', '', 22, 'http://cokhigiahoang.local/22-revision-v1/', 0, 'revision', '', 0),
(25, 1, '2018-10-28 14:43:19', '2018-10-28 07:43:19', '', 'Services', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2018-10-28 14:43:19', '2018-10-28 07:43:19', '', 22, 'http://cokhigiahoang.local/22-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2018-10-28 14:43:54', '2018-10-28 07:43:54', 'wwwwwwwwww', 'About', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2018-10-28 14:43:54', '2018-10-28 07:43:54', '', 16, 'http://cokhigiahoang.local/16-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2018-10-28 16:06:36', '2018-10-28 09:06:36', 'Công ty Gia Hoàng là một trong những đơn vị sản xuất giàn giáo nêm giá rẻ tại TPHCM đáp ứng số lượng lớn. Với kinh nghiệm 15 năm trong hoạt động tham gia sản xuất kinh doanh, GH đã ngày một vững mạnh, là đối tác của nhiều công trình lớn tại TPHCM và nhiều tỉnh thành khác.\r\n\r\n&nbsp;\r\n\r\n<img class=\"alignnone size-medium wp-image-29\" src=\"http://cokhigiahoang.local/wp-content/uploads/2018/10/gian-giao-nem-2-300x180.jpg\" alt=\"\" width=\"300\" height=\"180\" />\r\n<div><em>Gia Hoàng cung cấp giàn giáo nêm Số Lượng Lớn</em></div>\r\nHiện nay chúng tôi có lượng lớn giàn giáo nêm có sẵn trong kho có thể đáp ứng ngay lập tức nhu cầu mua hoặc thuê của nhà thầu. Mọi chi tiết liên hệ thông tin như bên dưới:\r\n\r\n<em>Công ty XD Cơ Khí Gia Hoàng\r\nĐịa chỉ: 100/3/24 Lê Thị Hà, Hóc Môn, TPHCM\r\nHotline: 0903 975 117\r\nFanpage: www.facebook.com/banchothuevanthanggiangiao\r\n</em>\r\n<strong>Những thông tin chi tiết về đặc tính kỹ thuật giàn giáo nêm\r\n</strong>\r\nGiàn giáo nêm còn gọi là giàn giáo hoa thị có các thành phần cấu tạo như sau\r\n\r\n+ <strong>Cây chống đứng </strong>có chiều cao từ 1m -1,5m - 2m - 2,5m, ống thép D49\r\n+ <strong>Giằng ngang </strong>: co kích thước 0,5m - 1,0m - 1,2m - 1,5m, ống thép D42\r\n+ <strong>Chống đà, Chống đà biên, chống consol</strong>: 1,2m.\r\n\r\nGiàn giáo nêm có nhiều ưu điểm vượt trội so với giàn giáo khung tăng hiệu quả thi công và tiết kiệm được chi phí và công sức. Với giàn giáo nêm, nhà thầu có thể giảm 50% - 60% thời gian lắp ráp và tháo gỡ. Giảm 50% chi phí vận chuyển và lưu kho. Giáo nêm chịu tải lớn, độ an toàn cao.\r\n\r\nQuý nhà thầu cần giàn giáo nêm giá rẻ, số lượng lớn, lượng hàng ổn định \"Cần là có\" thì liên hệ ngay với P.KD vật tư Gia Hoàng nhé. Chúng tôi cam kết sản phẩm chất lượng, giá thành cạnh tranh, dịch vụ hậu cần chu đáo.\r\n<div>\r\n<div><em>Nguồn: Marketing GH</em></div>\r\n</div>', 'Giàn giáo nêm', '', 'publish', 'open', 'closed', '', 'gian-giao-nem', '', '', '2018-10-28 16:06:36', '2018-10-28 09:06:36', '', 0, 'http://cokhigiahoang.local/?post_type=product&#038;p=28', 0, 'product', '', 0),
(29, 1, '2018-10-28 16:05:53', '2018-10-28 09:05:53', '', 'gian-giao-nem-2', '', 'inherit', 'open', 'closed', '', 'gian-giao-nem-2', '', '', '2018-10-28 16:05:53', '2018-10-28 09:05:53', '', 28, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/gian-giao-nem-2.jpg', 0, 'attachment', 'image/jpeg', 0),
(30, 1, '2018-10-28 16:06:28', '2018-10-28 09:06:28', '', 'gian-giao-ringlock', '', 'inherit', 'open', 'closed', '', 'gian-giao-ringlock', '', '', '2018-10-28 16:06:28', '2018-10-28 09:06:28', '', 28, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/gian-giao-ringlock.jpg', 0, 'attachment', 'image/jpeg', 0),
(31, 1, '2018-10-28 16:07:54', '2018-10-28 09:07:54', 'Phụ kiện hệ giàn giáo Ringlock\r\n\r\n<img class=\"alignnone size-medium wp-image-32\" src=\"http://cokhigiahoang.local/wp-content/uploads/2018/10/bas-chong-ringlock-300x291.jpg\" alt=\"\" width=\"300\" height=\"291\" />\r\n\r\nBas chống 0.49kg/cái', 'Bas chống', '', 'publish', 'open', 'closed', '', 'bas-chong', '', '', '2018-10-28 16:08:41', '2018-10-28 09:08:41', '', 0, 'http://cokhigiahoang.local/?post_type=product&#038;p=31', 0, 'product', '', 0),
(32, 1, '2018-10-28 16:07:30', '2018-10-28 09:07:30', '', 'bas-chong-ringlock', '', 'inherit', 'open', 'closed', '', 'bas-chong-ringlock', '', '', '2018-10-28 16:07:30', '2018-10-28 09:07:30', '', 31, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/bas-chong-ringlock.jpg', 0, 'attachment', 'image/jpeg', 0),
(33, 1, '2018-10-28 16:11:22', '2018-10-28 09:11:22', '<img class=\"alignnone size-medium wp-image-34\" src=\"http://cokhigiahoang.local/wp-content/uploads/2018/10/gondola-ZLP-630-2-300x257.jpg\" alt=\"\" width=\"300\" height=\"257\" />\r\n\r\nKiểu sàn treo (Model): <strong>ZLP800</strong>\r\nTải trọng tối đa (kg): 800\r\nTốc độ nâng (m/phút): 8-10\r\nKích thước (L * W * H) m: 7500 * 720 * 1300\r\nMotor: 1.8 KW * 2\r\nNguồn điện: 3P – 380V/50Hz\r\nHàng mới 100%', 'Sàn treo Gondola ZLP800', '', 'publish', 'open', 'closed', '', 'san-treo-gondola-zlp800', '', '', '2018-10-28 16:11:23', '2018-10-28 09:11:23', '', 0, 'http://cokhigiahoang.local/?post_type=product&#038;p=33', 0, 'product', '', 0),
(34, 1, '2018-10-28 16:10:24', '2018-10-28 09:10:24', '', 'gondola ZLP 630 - 2', '', 'inherit', 'open', 'closed', '', 'gondola-zlp-630-2', '', '', '2018-10-28 16:10:24', '2018-10-28 09:10:24', '', 33, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/gondola-ZLP-630-2.jpg', 0, 'attachment', 'image/jpeg', 0),
(35, 1, '2018-10-28 16:17:25', '2018-10-28 09:17:25', 'Vận thăng nâng hàng được sử dụng để nâng hàng, chuyển  hàng và dở hàng ở các công trình xây dựng và sửa chữa rất phù hợp với chiều cao từ 10m đến 70m.\r\n\r\n<img class=\"alignnone size-medium wp-image-36\" src=\"http://cokhigiahoang.local/wp-content/uploads/2018/10/cac-thanh-phan-chinh-VTH-300x172.jpg\" alt=\"\" width=\"300\" height=\"172\" /> <img class=\"alignnone size-medium wp-image-37\" src=\"http://cokhigiahoang.local/wp-content/uploads/2018/10/thong-so-ky-thuat-van-thang-hang-300x231.jpg\" alt=\"\" width=\"300\" height=\"231\" />\r\n\r\n<strong> Nguyên lý hoạt động:</strong>\r\n\r\nVận thăng được điều khiển bằng hộp nút bấm. Mơ-tơ tời kéo bàn nâng mang hàng thông qua hệ thống: Dây cáp thép, tang cuộn cáp và các Buli dẫn hướng cáp.\r\n\r\nỞ đỉnh và đáy của khung thân vận thăng (giá) có trang bị các công tắc hành trình để ngắt động cơ đến các vị trí cần thiết.\r\n\r\nCơ cấu an toàn: ngoài phanh của tời điện đảo chiều, trên bàn nâng (giá trượt) còn bộ hãm bảo hiểm để dừng và giữ bàn nâng trên khung thân vận thăng (giá) khi đứt cáp, mất phanh thắng điện...', 'Vận thăng nâng hàng 500/1000 Kg', '', 'publish', 'open', 'closed', '', 'van-thang-nang-hang-500-1000-kg', '', '', '2018-10-28 16:17:25', '2018-10-28 09:17:25', '', 0, 'http://cokhigiahoang.local/?post_type=product&#038;p=35', 0, 'product', '', 0),
(36, 1, '2018-10-28 16:12:38', '2018-10-28 09:12:38', '', 'cac-thanh-phan-chinh-VTH', '', 'inherit', 'open', 'closed', '', 'cac-thanh-phan-chinh-vth', '', '', '2018-10-28 16:12:38', '2018-10-28 09:12:38', '', 35, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/cac-thanh-phan-chinh-VTH.jpg', 0, 'attachment', 'image/jpeg', 0),
(37, 1, '2018-10-28 16:12:39', '2018-10-28 09:12:39', '', 'thong-so-ky-thuat-van-thang-hang', '', 'inherit', 'open', 'closed', '', 'thong-so-ky-thuat-van-thang-hang', '', '', '2018-10-28 16:12:39', '2018-10-28 09:12:39', '', 35, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/thong-so-ky-thuat-van-thang-hang.jpg', 0, 'attachment', 'image/jpeg', 0),
(38, 1, '2018-10-28 16:12:57', '2018-10-28 09:12:57', '', 'van-thang-hang-500k-gia-hoang', '', 'inherit', 'open', 'closed', '', 'van-thang-hang-500k-gia-hoang', '', '', '2018-10-28 16:12:57', '2018-10-28 09:12:57', '', 35, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/van-thang-hang-500k-gia-hoang.jpg', 0, 'attachment', 'image/jpeg', 0),
(39, 1, '2018-10-28 16:19:17', '2018-10-28 09:19:17', '', 'Thang nâng hàng', '', 'publish', 'open', 'closed', '', 'thang-nang-hang', '', '', '2018-10-28 16:19:17', '2018-10-28 09:19:17', '', 0, 'http://cokhigiahoang.local/?post_type=product&#038;p=39', 0, 'product', '', 0),
(40, 1, '2018-10-28 16:19:07', '2018-10-28 09:19:07', '', 'thang nang', '', 'inherit', 'open', 'closed', '', 'thang-nang', '', '', '2018-10-28 16:19:07', '2018-10-28 09:19:07', '', 39, 'http://cokhigiahoang.local/wp-content/uploads/2018/10/thang-nang.jpg', 0, 'attachment', 'image/jpeg', 0),
(43, 1, '2018-10-28 16:26:12', '2018-10-28 09:26:12', '', 'Product', '', 'publish', 'closed', 'closed', '', 'product', '', '', '2018-10-28 16:26:12', '2018-10-28 09:26:12', '', 0, 'http://cokhigiahoang.local/?page_id=43', 0, 'page', '', 0),
(44, 1, '2018-10-28 16:26:12', '2018-10-28 09:26:12', '', 'Product', '', 'inherit', 'closed', 'closed', '', '43-revision-v1', '', '', '2018-10-28 16:26:12', '2018-10-28 09:26:12', '', 43, 'http://cokhigiahoang.local/43-revision-v1/', 0, 'revision', '', 0),
(45, 1, '2018-10-28 16:32:03', '2018-10-28 09:32:03', '', 'Terms and conditions', '', 'publish', 'closed', 'closed', '', 'terms-and-conditions', '', '', '2018-10-28 16:32:03', '2018-10-28 09:32:03', '', 0, 'http://cokhigiahoang.local/?page_id=45', 0, 'page', '', 0),
(46, 1, '2018-10-28 16:32:03', '2018-10-28 09:32:03', '', 'Terms and conditions', '', 'inherit', 'closed', 'closed', '', '45-revision-v1', '', '', '2018-10-28 16:32:03', '2018-10-28 09:32:03', '', 45, 'http://cokhigiahoang.local/45-revision-v1/', 0, 'revision', '', 0),
(53, 1, '2018-10-28 16:44:21', '2018-10-28 09:44:21', '<p>Chúc mừng đến với WordPress. Đây là bài viết đầu tiên của bạn. Hãy chỉnh sửa hay xóa bài viết này, và bắt đầu viết blog!</p>\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'Chào tất cả mọi người!', '', 'inherit', 'closed', 'closed', '', '1-autosave-v1', '', '', '2018-10-28 16:44:21', '2018-10-28 09:44:21', '', 1, 'http://cokhigiahoang.local/1-autosave-v1/', 0, 'revision', '', 0),
(55, 1, '2018-10-28 16:46:13', '2018-10-28 09:46:13', '<!-- wp:paragraph -->\n<p>This is first new post since this site was created!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:gallery -->\n<ul class=\"wp-block-gallery columns-0 is-cropped\"></ul>\n<!-- /wp:gallery -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'Hello world', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2018-10-28 16:46:13', '2018-10-28 09:46:13', '', 0, 'http://cokhigiahoang.local/?p=55', 0, 'post', '', 0),
(56, 1, '2018-10-28 16:46:13', '2018-10-28 09:46:13', '<!-- wp:paragraph -->\n<p>This is first new post since this site was created!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:gallery -->\n<ul class=\"wp-block-gallery columns-0 is-cropped\"></ul>\n<!-- /wp:gallery -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'Hello world', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2018-10-28 16:46:13', '2018-10-28 09:46:13', '', 55, 'http://cokhigiahoang.local/55-revision-v1/', 0, 'revision', '', 0),
(58, 1, '2018-11-03 14:05:31', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2018-11-03 14:05:31', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?p=58', 0, 'post', '', 0),
(59, 1, '2018-11-03 14:07:05', '0000-00-00 00:00:00', '', 'Lưu bản nháp tự động', '', 'auto-draft', 'open', 'open', '', '', '', '', '2018-11-03 14:07:05', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?p=59', 0, 'post', '', 0),
(60, 1, '2018-11-04 21:26:01', '0000-00-00 00:00:00', '', 'Lưu bản nháp tự động', '', 'auto-draft', 'open', 'open', '', '', '', '', '2018-11-04 21:26:01', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?p=60', 0, 'post', '', 0),
(61, 1, '2018-11-04 21:27:41', '2018-11-04 14:27:41', '', 'Chọn hình thức sản phẩm', '', 'publish', 'closed', 'closed', '', 'chon-hinh-thuc-san-pham', '', '', '2018-11-04 21:27:41', '2018-11-04 14:27:41', '', 0, 'http://cokhigiahoang.local/wp-types-group/chon-hinh-thuc-san-pham/', 0, 'wp-types-group', '', 0),
(62, 1, '2018-11-04 21:28:57', '2018-11-04 14:28:57', '', 'Chọn loại vận thăng', '', 'publish', 'closed', 'closed', '', 'chon-loai-van-thang', '', '', '2018-11-04 21:39:19', '2018-11-04 14:39:19', '', 0, 'http://cokhigiahoang.local/wp-types-group/chon-loai-van-thang/', 0, 'wp-types-group', '', 0),
(63, 1, '2018-11-04 21:30:05', '2018-11-04 14:30:05', '', 'Chọn khối lượng của vận thăng hàng', '', 'publish', 'closed', 'closed', '', 'chon-khoi-luong-cua-van-thang-hang', '', '', '2018-11-04 21:30:05', '2018-11-04 14:30:05', '', 0, 'http://cokhigiahoang.local/wp-types-group/chon-khoi-luong-cua-van-thang-hang/', 0, 'wp-types-group', '', 0),
(64, 1, '2018-11-04 21:31:05', '2018-11-04 14:31:05', '', 'Chọn số lồng', '', 'publish', 'closed', 'closed', '', 'chon-so-long', '', '', '2018-11-04 21:39:41', '2018-11-04 14:39:41', '', 0, 'http://cokhigiahoang.local/wp-types-group/chon-so-long/', 0, 'wp-types-group', '', 0),
(65, 1, '2018-11-04 21:33:04', '2018-11-04 14:33:04', '', 'Chọn khối lượng lồng', '', 'publish', 'closed', 'closed', '', 'chon-khoi-luong-long', '', '', '2018-11-04 21:33:04', '2018-11-04 14:33:04', '', 0, 'http://cokhigiahoang.local/wp-types-group/chon-khoi-luong-long/', 0, 'wp-types-group', '', 0),
(66, 1, '2018-11-04 21:35:44', '2018-11-04 14:35:44', '', 'Chọn loại biến tần', '', 'publish', 'closed', 'closed', '', 'chon-loai-bien-tan', '', '', '2018-11-04 21:38:49', '2018-11-04 14:38:49', '', 0, 'http://cokhigiahoang.local/wp-types-group/chon-loai-bien-tan/', 0, 'wp-types-group', '', 0),
(67, 1, '2018-11-04 21:40:26', '0000-00-00 00:00:00', '', 'Lưu bản nháp tự động', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-11-04 21:40:26', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?post_type=van-thang&p=67', 0, 'van-thang', '', 0),
(68, 1, '2018-11-04 21:42:03', '0000-00-00 00:00:00', '', 'Lưu bản nháp tự động', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-11-04 21:42:03', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?post_type=van-thang&p=68', 0, 'van-thang', '', 0),
(69, 1, '2018-11-04 21:46:46', '2018-11-04 14:46:46', '', 'Thông tin giàn giáo nêm', '', 'publish', 'closed', 'closed', '', 'thong-tin-gian-giao-nem', '', '', '2018-11-04 21:48:59', '2018-11-04 14:48:59', '', 0, 'http://cokhigiahoang.local/wp-types-group/thong-tin-gian-giao-nem-ban/', 0, 'wp-types-group', '', 0),
(70, 1, '2018-11-04 21:47:30', '0000-00-00 00:00:00', '', 'Lưu bản nháp tự động', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-11-04 21:47:30', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?post_type=van-thang&p=70', 0, 'van-thang', '', 0),
(71, 1, '2018-11-04 21:49:06', '0000-00-00 00:00:00', '', 'Lưu bản nháp tự động', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2018-11-04 21:49:06', '0000-00-00 00:00:00', '', 0, 'http://cokhigiahoang.local/?post_type=gian-giao-nem&p=71', 0, 'gian-giao-nem', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_relevanssi`
--

CREATE TABLE `wp_relevanssi` (
  `doc` bigint(20) NOT NULL DEFAULT '0',
  `term` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `term_reverse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `content` mediumint(9) NOT NULL DEFAULT '0',
  `title` mediumint(9) NOT NULL DEFAULT '0',
  `comment` mediumint(9) NOT NULL DEFAULT '0',
  `tag` mediumint(9) NOT NULL DEFAULT '0',
  `link` mediumint(9) NOT NULL DEFAULT '0',
  `author` mediumint(9) NOT NULL DEFAULT '0',
  `category` mediumint(9) NOT NULL DEFAULT '0',
  `excerpt` mediumint(9) NOT NULL DEFAULT '0',
  `taxonomy` mediumint(9) NOT NULL DEFAULT '0',
  `customfield` mediumint(9) NOT NULL DEFAULT '0',
  `mysqlcolumn` mediumint(9) NOT NULL DEFAULT '0',
  `taxonomy_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `customfield_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mysqlcolumn_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(210) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `item` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_relevanssi_log`
--

CREATE TABLE `wp_relevanssi_log` (
  `id` bigint(9) NOT NULL,
  `query` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` mediumint(9) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `ip` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_relevanssi_stopwords`
--

CREATE TABLE `wp_relevanssi_stopwords` (
  `stopword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_termmeta`
--

INSERT INTO `wp_termmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 15, 'product_count_product_cat', '0'),
(2, 16, 'order', '0'),
(3, 17, 'order', '0'),
(4, 18, 'order', '0'),
(5, 19, 'order', '0'),
(6, 20, 'order', '0'),
(7, 21, 'order', '0'),
(8, 16, 'product_count_product_cat', '1'),
(9, 19, 'product_count_product_cat', '2'),
(10, 21, 'product_count_product_cat', '1'),
(11, 18, 'product_count_product_cat', '1'),
(12, 20, 'product_count_product_cat', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Chưa được phân loại', 'khong-phan-loai', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'exclude-from-search', 'exclude-from-search', 0),
(7, 'exclude-from-catalog', 'exclude-from-catalog', 0),
(8, 'featured', 'featured', 0),
(9, 'outofstock', 'outofstock', 0),
(10, 'rated-1', 'rated-1', 0),
(11, 'rated-2', 'rated-2', 0),
(12, 'rated-3', 'rated-3', 0),
(13, 'rated-4', 'rated-4', 0),
(14, 'rated-5', 'rated-5', 0),
(15, 'Uncategorized', 'uncategorized', 0),
(16, 'Phụ tùng vận thăng cẩu tháp', 'phu-tung-van-thang-cau-thap', 0),
(17, 'Vận thăng lồng', 'van-thang-long', 0),
(18, 'Vận thăng hàng', 'van-thang-hang', 0),
(19, 'Giàn giáo xây dựng', 'gian-giao-xay-dung', 0),
(20, 'Thiết bị nâng hạ khác', 'thiet-bi-nang-ha-khac', 0),
(21, 'Sàn treo - gondola', 'san-treo-gondola', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(10, 2, 0),
(10, 16, 0),
(28, 2, 0),
(28, 19, 0),
(31, 2, 0),
(31, 19, 0),
(33, 2, 0),
(33, 21, 0),
(35, 2, 0),
(35, 18, 0),
(39, 2, 0),
(39, 20, 0),
(55, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 2),
(2, 2, 'product_type', '', 0, 6),
(3, 3, 'product_type', '', 0, 0),
(4, 4, 'product_type', '', 0, 0),
(5, 5, 'product_type', '', 0, 0),
(6, 6, 'product_visibility', '', 0, 0),
(7, 7, 'product_visibility', '', 0, 0),
(8, 8, 'product_visibility', '', 0, 0),
(9, 9, 'product_visibility', '', 0, 0),
(10, 10, 'product_visibility', '', 0, 0),
(11, 11, 'product_visibility', '', 0, 0),
(12, 12, 'product_visibility', '', 0, 0),
(13, 13, 'product_visibility', '', 0, 0),
(14, 14, 'product_visibility', '', 0, 0),
(15, 15, 'product_cat', '', 0, 0),
(16, 16, 'product_cat', '', 0, 1),
(17, 17, 'product_cat', '', 0, 0),
(18, 18, 'product_cat', '', 0, 1),
(19, 19, 'product_cat', '', 0, 2),
(20, 20, 'product_cat', '', 0, 1),
(21, 21, 'product_cat', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_toolset_post_guid_id`
--

CREATE TABLE `wp_toolset_post_guid_id` (
  `guid` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:13:{s:13:\"administrator\";b:1;s:26:\"wpcf_custom_post_type_view\";b:1;s:26:\"wpcf_custom_post_type_edit\";b:1;s:33:\"wpcf_custom_post_type_edit_others\";b:1;s:25:\"wpcf_custom_taxonomy_view\";b:1;s:25:\"wpcf_custom_taxonomy_edit\";b:1;s:32:\"wpcf_custom_taxonomy_edit_others\";b:1;s:22:\"wpcf_custom_field_view\";b:1;s:22:\"wpcf_custom_field_edit\";b:1;s:29:\"wpcf_custom_field_edit_others\";b:1;s:25:\"wpcf_user_meta_field_view\";b:1;s:25:\"wpcf_user_meta_field_edit\";b:1;s:32:\"wpcf_user_meta_field_edit_others\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'wp496_privacy'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:3:{s:64:\"c892ecabf66c2b08551e36749d3da927fbd1ebaa66aaf7e3718ae6f61346d715\";a:4:{s:10:\"expiration\";i:1541561485;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36\";s:5:\"login\";i:1540351885;}s:64:\"b71d8a4a25bbf782aeff3ce8c3c6208a69161babef66b9c1376fedb86b9489bc\";a:4:{s:10:\"expiration\";i:1541401526;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36\";s:5:\"login\";i:1541228726;}s:64:\"0600dba4b44b96e355c51305ff86ae0583c181a49b84ca7c45bf9e7bb08b800d\";a:4:{s:10:\"expiration\";i:1541514229;s:2:\"ip\";s:9:\"127.0.0.1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36\";s:5:\"login\";i:1541341429;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '58'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:9:\"127.0.0.0\";}'),
(19, 1, 'wc_last_active', '1541203200'),
(20, 1, '_woocommerce_persistent_cart_1', 'a:1:{s:4:\"cart\";a:0:{}}'),
(22, 1, 'wp_user-settings', 'libraryContent=browse'),
(23, 1, 'wp_user-settings-time', '1540485994'),
(26, 1, 'closedpostboxes_toolset_page_wpcf-edit-type', 'a:2:{i:0;s:12:\"types_labels\";i:1;s:13:\"types_options\";}'),
(27, 1, 'meta-box-order_van-thang', 'a:3:{s:4:\"side\";s:22:\"submitdiv,postimagediv\";s:6:\"normal\";s:215:\"wpcf-group-chon-hinh-thuc-san-pham,wpcf-group-chon-loai-van-thang,wpcf-group-chon-so-long,wpcf-group-chon-khoi-luong-long,wpcf-group-chon-khoi-luong-cua-van-thang-hang,slugdiv,wpcf-group-chon-loai-bien-tan,authordiv\";s:8:\"advanced\";s:0:\"\";}'),
(28, 1, 'screen_layout_van-thang', '2'),
(29, 1, 'meta-box-order_gian-giao-nem', 'a:3:{s:4:\"side\";s:22:\"submitdiv,postimagediv\";s:6:\"normal\";s:177:\"wpcf-group-chon-hinh-thuc-san-pham,wpcf-group-thong-tin-gian-giao-nem,wpcf-group-chon-khoi-luong-long,wpcf-group-chon-khoi-luong-cua-van-thang-hang,postexcerpt,slugdiv,authordiv\";s:8:\"advanced\";s:0:\"\";}'),
(30, 1, 'screen_layout_gian-giao-nem', '2');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BpsJ23FPCkVL/jgi4tZmwZ2d4GcmWw1', 'admin', 'cqthanh.zx@gmail.com', '', '2018-10-24 03:30:43', '', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10)),
  ADD KEY `woo_idx_comment_type` (`comment_type`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_relevanssi`
--
ALTER TABLE `wp_relevanssi`
  ADD UNIQUE KEY `doctermitem` (`doc`,`term`,`item`),
  ADD KEY `terms` (`term`(20)),
  ADD KEY `relevanssi_term_reverse_idx` (`term_reverse`(10)),
  ADD KEY `docs` (`doc`),
  ADD KEY `typeitem` (`type`(190),`item`);

--
-- Indexes for table `wp_relevanssi_log`
--
ALTER TABLE `wp_relevanssi_log`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `query` (`query`(190));

--
-- Indexes for table `wp_relevanssi_stopwords`
--
ALTER TABLE `wp_relevanssi_stopwords`
  ADD UNIQUE KEY `stopword` (`stopword`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_toolset_post_guid_id`
--
ALTER TABLE `wp_toolset_post_guid_id`
  ADD UNIQUE KEY `post_id` (`post_id`),
  ADD KEY `guid` (`guid`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=729;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `wp_relevanssi_log`
--
ALTER TABLE `wp_relevanssi_log`
  MODIFY `id` bigint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
