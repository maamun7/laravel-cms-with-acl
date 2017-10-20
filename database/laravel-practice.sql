-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2016 at 05:31 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel-practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(10) unsigned NOT NULL,
  `article_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_name`, `description`, `article_category_id`, `featured_image`, `image_path`, `meta_keyword`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Hello', '', 2, '', '', '', '', 1, 0, 0, '2015-09-16 04:14:15', '2015-09-16 04:14:15'),
(2, 'Web development', '<p><img alt="" src="/backend/article_picture/images/akmatro.png" style="height:87px; width:241px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Web development</p>\r\n', 3, '', '', '', '', 1, 1, 1, '2015-09-16 05:43:45', '2015-09-29 04:09:35'),
(4, 'Image Test', '<p><img alt="" src="/backend/article_picture/images/modern-farmer-belal-ahmed-imran.jpg" style="height:546px; width:625px" /></p>', 3, '', '', '', '', 1, 1, 1, '2015-09-29 01:36:00', '2015-09-29 04:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE IF NOT EXISTS `article_categories` (
`id` int(10) unsigned NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `category_name`, `short_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Menu', 'Menu data', 1, 1, 0, '2015-09-16 02:54:02', '2015-09-16 02:54:02'),
(3, 'Testing', 'Testing', 1, 1, 0, '2015-09-16 04:22:19', '2015-09-16 04:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL,
  `discount_price` decimal(15,4) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course_duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_new` tinyint(4) NOT NULL,
  `total_lecture` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` int(255) DEFAULT NULL,
  `meta_keyword` int(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `price`, `discount_price`, `cover_image`, `image_path`, `folder_name`, `course_duration`, `sort_order`, `is_new`, `total_lecture`, `status`, `meta_title`, `meta_description`, `meta_keyword`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Advance PHP', '200.0000', '0.0000', 'advance_phps_1450335882_index.jpg', 'E:\\XAMPP\\htdocs\\laravel\\public\\uploads/images/course_picture/', 'advance_php', '100 hrs', 1, 0, 5, 1, 'Test1', 0, 0, 1, 1, '2015-12-15 04:19:31', '2015-12-23 05:00:23'),
(2, 'MS Office', '0.0000', '0.0000', 'advance_ms_office-1450174880-image.png', 'E:\\XAMPP\\htdocs\\laravel\\public\\uploads/images/course_picture/', 'ms_office', '50 hours', 1, 0, 5, 1, NULL, NULL, NULL, 1, 1, '2015-12-15 04:21:20', '2015-12-15 04:52:25'),
(3, 'Advance C++', '0.0000', '0.0000', 'advance_c_1450334145_index.jpg', 'E:\\XAMPP\\htdocs\\laravel\\public\\uploads/images/course_picture/', 'advance_c++', '3333', 0, 0, 3, 1, NULL, NULL, NULL, 1, 1, '2015-12-15 05:38:53', '2015-12-17 00:35:45'),
(6, 'Advance C#', '100.0000', '0.0000', 'advance_c_1450334283_image2.png', 'E:\\XAMPP\\htdocs\\laravel\\public\\uploads/images/course_picture/', 'advance_c#', '3333', 1, 0, 3, 1, 'Test', 0, 0, 1, 0, '2015-12-17 00:38:03', '2015-12-17 00:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
`id` int(10) unsigned NOT NULL,
  `lecture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video_resolution` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `lecture_name`, `cover_image`, `image_path`, `video_file`, `video_file_path`, `video_duration`, `video_size`, `video_resolution`, `course_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Lecture_1', 'lecture_1-1451116029-akmatro.png', 'E:\\XAMPP\\htdocs\\laravel\\public\\uploads/images/lecture_picture/', '', '', '', '', '', 1, 1, 1, 0, '2015-12-26 01:47:09', '2015-12-26 01:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  `menu_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `meta_keyword` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `alias`, `menu_type`, `parent_id`, `ordering`, `link`, `content_type`, `content_id`, `menu_icon`, `published`, `meta_keyword`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Our Projects', 'our_projects', 'top_menu', 0, 4, 'content', 'Single Article', 2, '', 1, '', '', 1, 1, 1, '2015-09-17 04:51:25', '2015-10-06 22:54:51', NULL),
(2, 'Ajke granade', 'ajke_granade', 'top_menu', 0, 0, 'category', 'Article Category', 3, '', 1, '', '', 1, 1, 0, '2015-09-17 04:52:22', '2015-10-06 22:54:51', NULL),
(4, 'Level 2', 'level_2', 'top_menu', 1, 1, '#', 'External Link', NULL, '', 1, '', '', 1, 1, 1, '2015-09-17 11:55:07', '2015-10-06 22:54:53', NULL),
(5, 'Level 2.0', 'level_3', 'top_menu', 2, 3, '#', 'External Link', NULL, '', 1, '', '', 1, 1, 1, '2015-09-17 11:56:01', '2015-10-06 22:54:53', NULL),
(6, 'Level 2.1', 'level_2.1', 'top_menu', 2, 2, '#', 'External Link', NULL, '', 1, '', '', 1, 1, 0, '2015-09-17 11:57:39', '2015-10-06 22:54:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_15_165459_create_products_table', 1),
('2015_08_21_082626_create_permission_groups_table', 1),
('2015_08_21_083306_create_permissions_table', 1),
('2015_08_21_083657_create_roles_table', 1),
('2015_08_21_084047_RolePermission', 1),
('2015_08_21_084102_RoleUser', 1),
('2015_09_14_055517_create_menus_table', 1),
('2015_09_16_055241_create_article_categories_table', 1),
('2015_09_16_061325_create_articles_table', 1),
('2015_11_28_065707_VideoUpload', 2),
('2015_12_02_055233_create_courses_table', 3),
('2015_12_07_112416_create_lecture_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission_group_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `permission_group_id`, `status`, `created_by`, `edited_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'add_permission_group', 'Add Permission Group', 1, 1, 1, 0, '2015-10-06 22:52:14', '2015-10-06 22:52:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE IF NOT EXISTS `permission_groups` (
`id` int(10) unsigned NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `group_name`, `status`, `created_by`, `edited_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Permission Group', 1, 1, 0, '2015-10-06 22:51:46', '2015-10-06 22:51:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_by`, `edited_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Editor', 1, 1, 1, '2015-10-06 22:51:17', '2015-10-06 22:53:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE IF NOT EXISTS `role_permissions` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 1, ',add_permission_group,', '2015-10-06 22:51:17', '2015-10-06 22:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_system_user` tinyint(4) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `first_name`, `last_name`, `mobile`, `is_system_user`, `user_type`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mamun Ahmed', 'admin@admin.com', '$2y$10$BkxPwgqL.L78ar5tVvf9a.hqdcHvOHtTllqGPYum3gpZ8Q2d8/R7e', 'Mamun', 'Ahmed', '01916544520', 1, 1, 1, 1, 0, '2gFs1LLuYYXjfcBvAjEtVpJbftF3flJwIi328kGvpf8UuwZX7MWOW0t1kTni', '2015-09-15 18:00:00', '2015-11-05 00:55:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_uploads`
--

CREATE TABLE IF NOT EXISTS `video_uploads` (
`id` int(11) NOT NULL,
  `lecture_title` varchar(255) NOT NULL,
  `video_file_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video_uploads`
--

INSERT INTO `video_uploads` (`id`, `lecture_title`, `video_file_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Lecture 1', '1448952212-76ecbe7f6d59862e5e6e90e606363497.mp4', '2015-12-01 00:43:32', '2015-12-01 00:43:32', 1),
(2, 'Lecture 2', '1448961442-Baba James [Low, 360p].mp4', '2015-12-01 03:17:22', '2015-12-01 03:17:22', 1),
(3, 'bhnmbvmhbhn', '1448972297-Baba James [Low, 360p].mp4', '2015-12-01 06:18:17', '2015-12-01 06:18:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `role_permissions_role_id_unique` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_uploads`
--
ALTER TABLE `video_uploads`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `video_uploads`
--
ALTER TABLE `video_uploads`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
