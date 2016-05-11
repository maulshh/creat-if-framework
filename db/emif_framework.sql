-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 03:41 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emif_framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `cdn_list`
--

CREATE TABLE `cdn_list` (
  `name` varchar(40) NOT NULL,
  `uri` varchar(300) NOT NULL,
  `type` varchar(10) NOT NULL,
  `package` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cdn_list`
--

INSERT INTO `cdn_list` (`name`, `uri`, `type`, `package`) VALUES
('angularjs', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular.min.js', 'js', 'angular');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `website` varchar(225) DEFAULT NULL,
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `rateable` tinyint(1) NOT NULL DEFAULT '1',
  `rateup` int(11) NOT NULL DEFAULT '0',
  `public` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_id`, `name`, `email`, `no_telp`, `website`, `comment_count`, `rateable`, `rateup`, `public`) VALUES
(62, 34, 'Maulana', 'maulcux@gmail.com', NULL, 'http://codemastery.net', 1, 1, 0, 1),
(63, 62, 'Maulana', 'maulcux@gmail.com', NULL, 'http://codemastery.net', 1, 1, 0, 1),
(65, 63, 'Maulana', 'maulcux@gmail.com', NULL, '', 0, 1, 0, 1),
(88, 34, 'Maulana', 'maulcux@gmail.com', NULL, '', 0, 1, 0, 1),
(113, 38, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1),
(114, 108, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 1, 1, 0, 1),
(115, 108, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1),
(116, 114, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 2, 1, 0, 1),
(117, 116, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1),
(118, 116, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1),
(119, 107, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1),
(125, 45, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1),
(127, 45, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, NULL),
(129, 109, 'Pengkom Ceria', 'pengkom@codemastery.net', NULL, NULL, 1, 1, 0, 1),
(130, 129, 'Pengkom Ceria', 'pengkom@codemastery.net', NULL, NULL, 1, 1, 0, 1),
(131, 130, 'Pengkom Ceria', 'pengkom@codemastery.net', NULL, NULL, 0, 1, 0, 1),
(132, 109, 'Pengkom Ceria', 'pengkom@codemastery.net', NULL, NULL, 0, 1, 0, 1),
(133, 109, 'Maulana', 'maulcux@gmail.com', NULL, NULL, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `position` varchar(15) NOT NULL,
  `module_target` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `role_id`, `position`, `module_target`) VALUES
(28, '-3-2-1-5-', '0.1', 'admin-page'),
(51, '-1-2-3-5-', '0.1', 'side-front'),
(12, '-2-1-3-5-', '1', 'admin-page'),
(8, '-4-3-2-1-5-', '1', 'front-end'),
(49, '-4-', '1', 'side-front'),
(100, '-4-3-2-1-5-', '1', 'site-menu'),
(18, '-4-3-2-1-5-', '2', 'front-end'),
(50, '-1-2-3-5-', '2', 'side-front'),
(101, '-4-3-2-1-5-', '2', 'site-menu'),
(19, '-4-3-2-1-5-', '2-1', 'front-end'),
(20, '-4-3-2-1-5-', '2-2', 'front-end'),
(96, '-4-3-2-1-5-', '2-3', 'front-end'),
(69, '-4-3-2-1-5-', '2-4', 'front-end'),
(13, '-1-2-3-', '3', 'admin-page'),
(21, '-4-3-2-1-5-', '3', 'front-end'),
(102, '-4-3-2-1-5-', '3', 'site-menu'),
(14, '-1-2-3-', '3-1', 'admin-page'),
(46, '-1-2-3-', '3-2', 'admin-page'),
(53, '-1-2-3-', '3-3', 'admin-page'),
(92, '-1-2-3-', '3-4', 'admin-page'),
(93, '-1-2-3-', '3-5', 'admin-page'),
(16, '-2-1-3-5-', '4', 'admin-page'),
(70, '-4-3-2-1-5-', '4', 'front-end'),
(52, '-5-1-2-3-', '4', 'side-front'),
(103, '-4-3-2-1-5-', '4', 'site-menu'),
(47, '-1-2-', '5', 'admin-page'),
(7, '-4-3-2-1-5-', '5', 'front-end'),
(104, '-4-3-2-1-5-', '5', 'site-menu'),
(48, '-1-2-3-', '6', 'admin-page'),
(11, '-4-3-2-1-5-', '6', 'front-end'),
(105, '-4-3-2-1-5-', '6', 'site-menu'),
(31, '-1-', '7', 'admin-page'),
(110, '-4-', '7', 'front-end'),
(120, '-1-2-3-5-', '9', 'front-end'),
(29, '-1-', '9.0', 'admin-page'),
(27, '-1-', '9.01', 'admin-page'),
(10, '-1-', '9.1', 'admin-page'),
(9, '-1-', '9.2', 'admin-page'),
(17, '-1-', '9.3', 'admin-page');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `node_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `uri` varchar(80) NOT NULL,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `note` varchar(225) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`node_id`, `user_id`, `module`, `created`, `modified`, `uri`, `title`, `content`, `note`, `status`) VALUES
(7, 1, 'menu', '2015-04-30 15:56:05', '2015-09-22 13:16:01', 'forum', 'Forum HMIF', 'Forum', '', '1'),
(8, 1, 'menu', '2015-05-01 12:14:19', '2015-12-14 02:58:03', 'home', 'Halaman Utama', 'Beranda', '', '1'),
(9, 1, 'menu', '2015-05-01 12:18:41', '2016-04-03 15:38:17', 'permissions', 'Grant Permissions', 'Permissions', 'key', '1'),
(10, 1, 'menu', '2015-05-01 12:58:17', '2016-04-03 15:38:10', 'menus', 'Kelola Menu', 'Menus', 'bars', '1'),
(11, 1, 'menu', '2015-05-01 14:30:41', '2015-11-15 22:55:32', 'hubungi-kami', 'Hubungi Kami', 'Kontak', '', '1'),
(12, 1, 'menu', '2015-05-01 14:38:58', '2016-04-03 15:34:06', 'dashboard', 'Halaman Awal', 'Dashboard', 'home', '1'),
(13, 1, 'menu', '2015-05-01 15:34:22', '2016-04-03 15:35:55', '#', 'Kelola Posting', 'Posts', 'pencil-square-o', '1'),
(14, 1, 'menu', '2015-05-01 15:35:18', '2015-11-16 15:30:26', 'posts/manage/berita', 'Berita posts', 'Berita', '', '1'),
(16, 1, 'menu', '2015-05-01 22:45:58', '2016-04-03 15:36:09', 'comments', 'manage comments', 'Comments', 'comments', '1'),
(17, 1, 'menu', '2015-05-01 22:58:30', '2016-04-03 15:38:32', 'post_types', 'Jenis post yang ada', 'Post Types', 'flag', '1'),
(18, 1, 'menu', '2015-05-01 23:00:45', '2015-09-22 15:45:23', '#', 'sejarah, arti dan tujuan', 'Tentang HMIF', '', '1'),
(19, 1, 'menu', '2015-05-01 23:01:16', '2015-09-22 13:16:46', 'apa-itu-hmif', 'baca lebih lanjut tentang HMIF', 'Apa itu HMIF?', '', '1'),
(20, 1, 'menu', '2015-05-01 23:01:37', '2015-09-22 13:16:17', 'kami-emif', 'EMIF ada untuk membantu seluruh HMIF', 'Kami adalah EMIF', '', '1'),
(21, 1, 'menu', '2015-05-01 23:02:22', '2015-09-22 13:14:44', 'produk', 'Produk HMIF', 'Produk', '', '1'),
(23, 1, 'post', '2015-05-04 00:15:25', '2015-05-14 02:57:23', 'posts/view/23', 'Hello Word!', '', '', 'published'),
(27, 1, 'menu', '2015-05-09 15:00:41', '2016-04-03 15:37:54', 'sites', 'Manage Site Options', 'Site Options', 'gear', '1'),
(28, 1, 'menu', '2015-05-09 15:05:07', '2015-12-14 03:00:32', '', '', 'MAIN NAVIGATION', '', '1'),
(29, 1, 'menu', '2015-05-09 15:06:51', '2015-11-16 15:31:44', '', '', 'Settings', '', '1'),
(31, 1, 'menu', '2015-05-09 15:31:49', '2016-04-03 15:36:51', 'users', 'manage users', 'Users', 'users', '1'),
(33, 1, 'post', '2015-05-14 01:23:41', '2015-09-22 15:11:01', 'posts/view/33', 'Hmif Study Club Full of People', '<p>In the lorem lipsum var aguer tag as wal afiat</p>\r\n', '', 'published'),
(34, 1, 'post', '2015-05-14 02:42:42', '2015-09-22 14:38:49', 'permalink/campaign', 'Campaign new Regime', '<p>Lorep lispusum asum susum sumsum</p>\r\n', '<strong>21</strong>  Sept, 2015', 'published'),
(35, 1, 'post', '2015-05-14 02:50:48', NULL, 'posts/view/35', 'Test for the new Candidates', '<p>lorem lispumaes sum amet dor molor</p>\r\n', '', 'draft'),
(36, 1, 'post', '2015-05-14 02:51:58', '2015-09-22 15:02:00', 'permalink/hardship-from-developer', 'Hardship from the Developers', '<p>Phasellus lobortis arcu in quam accumsan imperdiet. Ut sed nibh eu lacus consectetur aliquam nec at mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse vulputate, ante in malesuada ullamcorper, leo arcu hendrerit arcu, nec tempor neque leo nec ligula.</p>\r\n', '<strong>12</strong>  Sept, 2015', 'published'),
(37, 1, 'post', '2015-05-14 02:57:23', '2015-09-22 15:02:36', 'permalink/last-man', 'Last Trial for The Last Man Standing', '<p>Proin sapien arcu, feugiat at velit vitae, vestibulum congue est. Praesent dolor est, vehicula a suscipit vitae, placerat non nisl. Fusce sed suscipit tortor. Aenean aliquam eu velit eu euismod. Nulla faucibus tellus ex, sit amet fermentum sem laoreet in. Nulla interdum sapien et metus vulputate, ultricies malesuada tortor ultrices. Cras condimentum nisi purus, ut rhoncus turpis laoreet at. Proin accumsan, sem vel porttitor porta, risus erat pulvinar lectus, porta auctor quam neque et elit. In malesuada massa id mi ornare lobortis.</p>\r\n', '<strong>25</strong>  Sept, 2015', 'published'),
(38, 1, 'post', '2015-05-14 03:17:11', '2015-05-14 03:17:11', 'posts/view/38', 'Mbuh karepmu', '<p>Dota Watafak</p>\r\n', '', 'published'),
(40, 1, 'post', '2015-05-14 11:45:57', '2015-05-14 11:45:58', 'posts/view/40', 'Lorep Lispum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget vehicula sem. Donec vel tincidunt urna. Vestibulum sit amet sapien ut diam rhoncus ornare. Morbi sed pellentesque quam, id fringilla ligula. Pellentesque interdum quam et est gravida, at posuere lorem aliquet. Nunc in augue placerat, convallis nunc et, interdum nisi. Suspendisse molestie diam vitae nisl auctor luctus. In hac habitasse platea dictumst. Fusce vulputate ac massa ut viverra. Suspendisse sit amet ligula ut dolor ultricies facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n\r\n<p>Nullam ac tellus sit amet mauris posuere cursus nec quis turpis. Aenean arcu ante, auctor et viverra id, maximus ac sapien. Nulla at quam ut dui faucibus aliquam in vel ex. Etiam hendrerit purus id massa efficitur, at facilisis eros ornare. Quisque vitae cursus sapien. Vivamus quis rhoncus tortor. Cras finibus ut lectus vitae fringilla. Phasellus porttitor vulputate augue elementum finibus. Mauris sit amet velit est.</p>\r\n\r\n<p>Aliquam erat turpis, efficitur ut semper quis, hendrerit eget nisi. Cras nec magna commodo, semper justo ut, efficitur arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam sit amet risus risus. Aliquam vel tortor ut est lobortis hendrerit a vitae sem. Curabitur cursus enim id mauris consequat aliquam. In a euismod velit, quis molestie turpis. Donec in nibh erat. Donec vulputate felis id facilisis mollis. Pellentesque eleifend, nibh in mollis pretium, tortor nibh condimentum nulla, ut fermentum urna leo ac leo.</p>\r\n\r\n<p>Quisque mollis mauris quis velit consequat volutpat. Aenean tempor diam aliquet, blandit lectus nec, pretium sem. Pellentesque mollis, eros vel convallis consequat, massa felis malesuada ex, eu consectetur felis tellus vitae odio. Morbi congue, lorem quis pharetra molestie, sem arcu commodo nulla, vitae dictum lorem lectus ac ligula. Praesent tempus gravida odio eget sagittis. Quisque auctor nulla condimentum nisi rhoncus lacinia. Suspendisse posuere faucibus sem, eget cursus nisi pretium ac. Aenean eu nibh condimentum, facilisis libero vitae, porttitor justo. Integer elementum mauris tortor, a dignissim sem dignissim vel. Proin ac mauris sagittis, mattis leo eget, dapibus ligula. Phasellus tempus blandit sem, id ornare augue iaculis quis.</p>\r\n\r\n<p>Curabitur et lacus venenatis, interdum mauris sit amet, maximus libero. Ut vehicula vulputate risus, sed congue lacus cursus ut. Nunc vel purus at mauris vulputate volutpat. Proin viverra ex non ipsum pretium dictum. Fusce et ornare erat. Praesent magna turpis, imperdiet vitae finibus quis, placerat ut neque. Sed ornare viverra mi eget faucibus. Etiam a magna odio.</p>\r\n', '', 'published'),
(41, 1, 'post', '2015-05-14 11:46:44', '2015-09-22 15:11:42', 'posts/view/41', 'Lorep Lispum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget vehicula sem. Donec vel tincidunt urna. Vestibulum sit amet sapien ut diam rhoncus ornare. Morbi sed pellentesque quam, id fringilla ligula. Pellentesque interdum quam et est gravida, at posuere lorem aliquet. Nunc in augue placerat, convallis nunc et, interdum nisi. Suspendisse molestie diam vitae nisl auctor luctus. In hac habitasse platea dictumst. Fusce vulputate ac massa ut viverra. Suspendisse sit amet ligula ut dolor ultricies facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n\r\n<p>Nullam ac tellus sit amet mauris posuere cursus nec quis turpis. Aenean arcu ante, auctor et viverra id, maximus ac sapien. Nulla at quam ut dui faucibus aliquam in vel ex. Etiam hendrerit purus id massa efficitur, at facilisis eros ornare. Quisque vitae cursus sapien. Vivamus quis rhoncus tortor. Cras finibus ut lectus vitae fringilla. Phasellus porttitor vulputate augue elementum finibus. Mauris sit amet velit est.</p>\r\n\r\n<p>Aliquam erat turpis, efficitur ut semper quis, hendrerit eget nisi. Cras nec magna commodo, semper justo ut, efficitur arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam sit amet risus risus. Aliquam vel tortor ut est lobortis hendrerit a vitae sem. Curabitur cursus enim id mauris consequat aliquam. In a euismod velit, quis molestie turpis. Donec in nibh erat. Donec vulputate felis id facilisis mollis. Pellentesque eleifend, nibh in mollis pretium, tortor nibh condimentum nulla, ut fermentum urna leo ac leo.</p>\r\n\r\n<p>Quisque mollis mauris quis velit consequat volutpat. Aenean tempor diam aliquet, blandit lectus nec, pretium sem. Pellentesque mollis, eros vel convallis consequat, massa felis malesuada ex, eu consectetur felis tellus vitae odio. Morbi congue, lorem quis pharetra molestie, sem arcu commodo nulla, vitae dictum lorem lectus ac ligula. Praesent tempus gravida odio eget sagittis. Quisque auctor nulla condimentum nisi rhoncus lacinia. Suspendisse posuere faucibus sem, eget cursus nisi pretium ac. Aenean eu nibh condimentum, facilisis libero vitae, porttitor justo. Integer elementum mauris tortor, a dignissim sem dignissim vel. Proin ac mauris sagittis, mattis leo eget, dapibus ligula. Phasellus tempus blandit sem, id ornare augue iaculis quis.</p>\r\n\r\n<p>Curabitur et lacus venenatis, interdum mauris sit amet, maximus libero. Ut vehicula vulputate risus, sed congue lacus cursus ut. Nunc vel purus at mauris vulputate volutpat. Proin viverra ex non ipsum pretium dictum. Fusce et ornare erat. Praesent magna turpis, imperdiet vitae finibus quis, placerat ut neque. Sed ornare viverra mi eget faucibus. Etiam a magna odio.</p>\r\n', '', 'published'),
(45, 1, 'page', '2015-05-17 02:53:05', '2015-11-15 22:58:19', 'hubungi-kami', 'Hubungi Kami', '<p><img alt="we care" src="https://www.switchitupdesigns.com/wp-content/uploads/2011/07/We-care1.png" class="img img-responsive" /></p>\r\n\r\n<p>The HMIF has been inspiring people to care about the planet since 1888. It is one of the largest nonprofit organization and educational institutions in the world. Its interests include the prosperity of students, its teritory, its well-being, and the promotion of environmental and historical conservation.</p>\r\n', 'Kontak', 'published'),
(46, 1, 'menu', '2015-08-14 02:16:57', '2015-11-16 15:30:35', 'posts/manage/agenda', 'Agenda posts', 'Agenda', '', '1'),
(47, 1, 'menu', '2015-08-14 02:26:49', '2016-04-03 15:36:36', 'pages', 'manage pages', 'Pages', 'file', '1'),
(48, 1, 'menu', '2015-08-14 02:29:13', '2016-04-03 15:39:08', 'complaints/manage', 'manage complaint', 'Complaints', 'bullhorn', '1'),
(49, 1, 'menu', '2015-08-22 02:26:58', '2015-08-24 06:02:06', 'login', 'Login', 'icon-locked', '', '1'),
(50, 1, 'menu', '2015-08-22 02:36:01', NULL, 'dashboard', 'Dashboard', 'icon-home', '', '1'),
(51, 1, 'menu', '2015-08-22 02:37:53', '2015-09-02 04:35:23', 'logout', 'Logout', 'icon-locked', '', '1'),
(52, 1, 'menu', '2015-08-22 02:39:54', '2015-09-02 04:35:29', 'users/profile', 'Profile', 'icon-user-2', '', '1'),
(53, 1, 'menu', '2015-08-23 13:49:40', '2015-11-16 15:30:40', 'posts/manage/informasi', 'Informasi posts', 'Informasi', '', '1'),
(55, 1, 'post', '2015-08-23 17:14:29', NULL, 'permalink/percobaan-post', 'Percobaan Post', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Module</th>\r\n			<th>Webmaster</th>\r\n			<th>Administrator</th>\r\n			<th>Authenticated</th>\r\n			<th>Anonymous</th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n		<tr>\r\n			<th>admin-page</th>\r\n			<td>-ajax- | -read- | -</td>\r\n			<td>-read- | -ajax- | -</td>\r\n			<td>-read-ajax- | -</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>front-end</th>\r\n			<td>-read- | -</td>\r\n			<td>-read- | -</td>\r\n			<td>-read- | -</td>\r\n			<td>-read- | -</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>login</th>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-read- | -</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>menu</th>\r\n			<td>-access-all- | -</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>page</th>\r\n			<td>-create-all-read-all-update-all-delete-all- | -access-all- | -</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>permission</th>\r\n			<td>-access-all- | -</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>post</th>\r\n			<td>-create-all-read-all-update-all-delete-all- | -access-all- | -</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>post_type</th>\r\n			<td>-access-all- | -</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>site</th>\r\n			<td>-edit- | -</td>\r\n			<td>-edit- | -</td>\r\n			<td>-</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>user</th>\r\n			<td>-access-all- | -</td>\r\n			<td>-access- | -</td>\r\n			<td>-access- | -</td>\r\n			<td>-</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Framework EMIF</p>\r\n\r\n<p><strong>Copyright &copy; 2015 <a href="http://creat-if.hmif.ub.ac.id">EMIF CREAT-IF</a></strong>&nbsp; All rights reserved.</p>\r\n', '', 'draft'),
(57, 1, 'post', '2015-08-23 17:21:07', '2015-09-22 15:08:25', 'permalink/percobaan-post', 'Percobaan Post', '<p>If specified, search will start this number of characters counted from the beginning of the string. If the value is negative, search will instead start from that many characters from the end of the string, searching backwards.</p>\r\n\r\n<h3>Return Values<a href="http://php.net/manual/en/function.strrpos.php#refsect1-function.strrpos-returnvalues"> &para;</a></h3>\r\n\r\n<p>Returns the position where the needle exists relative to the beginnning of the <code>haystack</code> string (independent of search direction or offset). Also note that string positions start at 0, and not 1.</p>\r\n\r\n<p>Returns <strong><code>FALSE</code></strong> if the needle was not found.</p>\r\n\r\n<p><strong>Warning</strong></p>\r\n\r\n<p>This function may return Boolean <strong><code>FALSE</code></strong>, but may also return a non-Boolean value which evaluates to <strong><code>FALSE</code></strong>. Please read the section on <a href="http://php.net/manual/en/language.types.boolean.php">Booleans</a> for more information. Use <a href="http://php.net/manual/en/language.operators.comparison.php">the === operator</a> for testing the return value of this function.</p>\r\n', '', 'published'),
(59, 1, 'post', '2015-08-27 08:12:11', '2015-10-30 13:31:01', 'permalink/16-rules-of-blog-writing-and-layout', '16 Rules of Blog Writing and Layout. Which Ones Are You Breaking?', '<img alt="rules of blog writing and layout" src="http://www.successfulblogging.com/wp-content/uploads/2015/02/16-Rules-5-1.png" style="height:300px; width:700px" class="img img-responsive"/>\r\n\r\n<h2>Remember newspapers?</h2>\r\n\r\n<p>People used to get them delivered to their door and read them over breakfast. They&rsquo;re big, awkward to hold and they cover your fingers in black printer ink.</p>\r\n\r\n<p>Plus, getting them to your doorstep takes hours so, by the time you read a newspaper, the news isn&rsquo;t all that new. Newspapers are going out of business because their news cannot keep up with the 24/7 news cycle that is so prevalent today.</p>\r\n\r\n<p>Newspapers have their drawbacks but&nbsp;one thing they do right is make sure their stories are easy to read. By that, I mean how they actually format and layout the newspaper and each individual story. Of course, first newspapers hit you with <a href="http://www.successfulblogging.com/be-your-own-blog-title-generator/" target="_blank">a headline</a> that makes you really want to read more.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Something like&nbsp;this headline&nbsp;works wonders:</p>\r\n\r\n<h3><strong>THE KING OF POP IS DEAD!</strong> <strong>How he really died!</strong> <strong>10,000 pills in 6 months</strong></h3>\r\n\r\n<p>Sensational tabloids aside, the content in newspapers is usually good ~ the writing&rsquo;s high quality and they usually get their facts straight.</p>\r\n\r\n<p><strong>But quality content isn&rsquo;t all you expect when you buy a newspaper and it isn&rsquo;t enough for blog writing either.</strong></p>\r\n\r\n<p>All newspapers make sure their content is easy to read by constraining the width of their columns and that&rsquo;s what their readers expect.</p>\r\n\r\n<p>Blog writers need to do the same and format their blog posts so they&rsquo;re easy to read. <strong>L</strong><strong>ong narrow newspaper columns mean your eye can easily jump from the end of one line to the beginning of the next without losing its place</strong>.</p>\r\n\r\n<p>If the column&rsquo;s too wide readers will keep getting lost, unless they enlist their finger to help them keep track. Even if they do that they&rsquo;ll get frustrated and won&rsquo;t enjoy the reading experience.</p>\r\n\r\n<p>This is just one element of traditional media and legibility knowledge that we can use on our blogs or website layout. Newspapers follow set rules for the formatting and lay out their stories to make them easy to read and bloggers need to follow some too. Blog writing and formatting content for the Web is more complex than writing for print because how we read on a computer screen is different to how we read in print and more challenging.</p>\r\n\r\n<h2>Blog Rules are Based on Two Things:</h2>\r\n\r\n<p><strong>People skim read when they read things on-screen</strong></p>\r\n\r\n<p>A website or blog is missing the usual cues that let us know how long an article is. Pick up a book or cast your eye over a newspaper article, and you&rsquo;ll instantly be able to gauge how long it is and how long it will take to read. Online the only way to find that out is to scroll down to the end of the blog post and that&rsquo;s what most people do. While they&rsquo;re at it, they&rsquo;ll also try to scan read the post. A long body of text is scary.</p>\r\n\r\n<p>Even if the <a href="http://www.successfulblogging.com/blog-name-ideas/" target="_blank">headline appeals to them,</a> with no other clues about the content, people will be reluctant to start reading. By helping people scan your blog posts with a good layout and telling them more about what information they&rsquo;ll find in it you can entice them to read the post in full.</p>\r\n\r\n<p><strong>It&rsquo;s harder to read things on-screen than on print</strong></p>\r\n\r\n<p>Screen legibility is improving along with resolution and screen size but there are still some simple rules you need to know to help people read your blog more easily. If you want to make sure people enjoy reading your blog, tell their friends about it and subscribe then you need to make sure the very act of reading your blog is easy.&nbsp;<strong>No matter how great your blog content and blog writing is, if it&rsquo;s not easy to read, people won&rsquo;t enjoy it and won&rsquo;t come back for more.</strong></p>\r\n\r\n<h2>16 Rules of Blog Writing and Layout</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Format every blog post</strong></p>\r\n\r\n<p><a href="http://www.successfulblogging.com/wordpress-beginners-tutorial/" target="_blank">Careful formatting</a> will make your blog posts easier for people to scan. Write your posts with the page layout in mind or edit them to make sure they&rsquo;re well formatted for scan reading.</p>\r\n\r\n<p><strong>2. Constrain column width</strong></p>\r\n\r\n<p>Keep the blog post column width about 80 characters or less (including spaces) and your readers will thank you for it. Check out these before and after screen shots of Under the Mango Tree. I advised Stacyann to update her blog to make it easier to read and changing the column width for the main body of text was one of the first things we sorted out. Wide columns of text are an instant turn off and very hard to read. The difference is incredible and it&rsquo;s such a simple change.</p>\r\n\r\n<p><img alt="Rules of Blog Writing and Blog Post Formatting" src="http://www.successfulblogging.com/wp-content/uploads/2010/09/blog-writing-layout.jpg" style="height:137px; width:518px" /></p>\r\n\r\n<p><strong>3. Use Headers and Sub-headers</strong></p>\r\n\r\n<p>Headers and sub-headers will break up long blog posts, help people scan read your blog and convince them to read the post. Read How to Write Hypnotic Headlines to read more about the importance of headlines and headers for<a href="http://www.successfulblogging.com/blog-writing-magic-series-5-essential-posts/" target="_blank"> blog writing</a>.</p>\r\n\r\n<p><strong>4. Use lists</strong></p>\r\n\r\n<p>Numbered lists or bullet pointed lists help people scan blog posts fast and find the information they&rsquo;re looking for quickly.</p>\r\n\r\n<p><strong>5. Use punctuation</strong></p>\r\n\r\n<p>Use full stops, commas, dashes and colons to break up each paragraph into smaller pieces of information that make sense quickly. No one wants to read the same sentence several times to try to make sense of it. If you&rsquo;re not confident about punctuation keep sentences short. As you practice writing and start to improve you can experiment and lengthen your sentences, chucking in a long one here and there to keep things interesting for readers, and make sure they&rsquo;re really paying attention. Long sentences are fine but check that every sentence makes sense and the meaning is clear.</p>\r\n\r\n<p><strong>6. Short paragraphs</strong></p>\r\n\r\n<p>Because reading is harder online it&rsquo;s best to break text into manageable chunks. Paragraphs should be much shorter online than on paper with two to six sentences per paragraph a good guideline for blog posts.</p>\r\n\r\n<p><strong>7. Font type</strong></p>\r\n\r\n<p>Sans-serif fonts (without the squiggly bits) are generally supposed to be easier to read on-screen, in particular Verdana. Successful Blogging&nbsp;uses the sans-serif font Roboto&nbsp;(without the squiggly bits) which is also designed for easy reading on-screen.</p>\r\n\r\n<p><strong>8. Font size</strong></p>\r\n\r\n<p>Big is better. Teeny tiny writing is hard to read online, even for people with 20/20 vision like me. Make it bigger. Check out some of your favorite blogs, compare the font size they use and decide what works best for your readers. If they&rsquo;re older they might prefer even bigger text than the average blog reader.</p>\r\n\r\n<p><strong>9. Be bold</strong></p>\r\n\r\n<p>Don&rsquo;t overuse bold text or it loses its effectiveness but do <strong>use bold text to make a splash and highlight important sentences</strong> that will catch people&rsquo;s attention and draw them into, or on with, the blog post.&nbsp;</p>\r\n\r\n<p><img alt="Blog writing magic ang blog post formatting" src="http://www.successfulblogging.com/wp-content/uploads/2010/09/car.jpg" style="height:137px; width:518px" /></p>\r\n\r\n<p><strong>10. Drop the italics</strong></p>\r\n\r\n<p>Italics are hard to read in print. Couple that with on-screen reading already being challenging and banish italics from your blog writing. <em>I hate them. If you can avoid italics please do.</em></p>\r\n\r\n<p><strong>11. Capital letters</strong></p>\r\n\r\n<p>Use capitals for proper nouns and at the beginning of sentences but avoid writing all in capitals because it&rsquo;s harder to read. PLUS USING CAPITAL LETTERS CONSTANT IS THE ONLINE EQUIVALENT OF BEING SHOUTED AT. Sorry, just wanted to get the point across.</p>\r\n\r\n<p><strong>12. White space</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href="https://twitter.com/share?text=Readers+need+somewhere+to+rest+the+eye+and+a+good+blog+layout+leaves+plenty+of+blank+space.+&amp;url=http://bit.ly/1K6KfOZ&amp;via=sueannedunlevie" target="_blank">Readers need somewhere to rest the eye and a good blog layout leaves plenty of blank space. Click To Tweet</a> Make sure your blog isn&rsquo;t too busy or distracting and gives readers somewhere to rest their eye from time to time.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>13. Background color</strong></p>\r\n\r\n<p>Most blogs and websites get the contrast between text color and background color right, but make sure your blog background doesn&rsquo;t make the text hard to read. It makes me sad that a white background with black text has become the default for most blogs. Bright yellow text on a black background is easiest to read but that&rsquo;s a confrontational look. Dark text on a light background has a wider appeal but consider using another light color for the background as white gives off a harsh glare. There are plenty of choices which look good and are still easy to read but without the glare of white: try light grey, minty green or pale yellow.</p>\r\n\r\n<p><strong>14. Use images</strong></p>\r\n\r\n<p><a href="http://www.successfulblogging.com/wp-content/uploads/2010/10/blog-clothesline.jpg"><img alt="blog clothesline" src="http://www.successfulblogging.com/wp-content/uploads/2010/10/blog-clothesline-400x137.jpg" style="height:137px; width:400px" /></a></p>\r\n\r\n<p>Good use of images will draw readers in to your blog posts. Sometimes I read a post purely because I like the image. Ideally your images will add to your blog or emphasize your message. Even if they can&rsquo;t do that use them to break up text, draw your reader&rsquo;s eye down the page and reward them for reading and spending time on your blog. Some blogs like <a href="http://www.viperchill.com/" target="_blank">Viperchill</a> turn their headers and sub-headers into images which makes the text look more attractive and helps people scan read.</p>\r\n\r\n<p><strong>15. Be consistent</strong></p>\r\n\r\n<p>You don&rsquo;t know how readers found your blog. You can&rsquo;t be sure if they arrived straight at your latest post, on your about page or via an archived post. You can&rsquo;t know which order people will read your blog in so every post you write needs to tell the same story about you, your message, your blog and your values.</p>\r\n\r\n<p><strong>16. Tell a story</strong></p>\r\n\r\n<p>Speaking of stories, every blog post needs to have a beginning, a middle and an end. Think of it as an introduction, the main information and conclusion if you prefer. Even if you don&rsquo;t give use those sub-headings because, hopefully, you&rsquo;ve come up with hotter ones, do follow the convention to avoid confusing your readers.</p>\r\n\r\n<h2>Blog Writing Rules Wrap Up</h2>\r\n\r\n<p>You&rsquo;ve probably noticed traditional media like newspapers are struggling and the Internet&rsquo;s taking over. It&rsquo;s amazing to think that in less than 10 years you may not be able to buy the L.A. Times or whatever your favorite newspaper is. Instead, you&rsquo;ll download the thing to your iPad in a nanosecond and read it on the go. No dirty fingers, no struggling to read text that runs over a crease and no pages blowing down the street. I love newspapers, and I&rsquo;ll miss them, but I look forward to the day when every blog is formatted and laid out so it&rsquo;s as easy to read as one of those old newspapers. &nbsp;<strong>Have I missed any blog writing and formatting rules?</strong></p>\r\n\r\n<h2>Blog Writing Magic Practice</h2>\r\n\r\n<p>Pick one of your favorite old blog posts and rewrite it or revise the layout for easy reading on the web. Give it a new headline and repost it. Even if the <a href="http://www.successfulblogging.com/where-to-start-a-blog/" target="_blank">blog content </a>is the same, with a snappy new <a href="http://www.successfulblogging.com/marketing-strategies-101/">headline</a>, some calls to action and some smart formatting, it should get more readers than it did the first time round.</p>\r\n\r\n<h3>Here&rsquo;s what to do next&hellip;</h3>\r\n\r\n<p>If you want to get an additional free guide to blog writing, I&rsquo;ve got something special for you.</p>\r\n\r\n<p>It&rsquo;s a book with more blog formatting and writing guidelines so you know the exact steps to take to write great blog posts that turn into more readers and more subscribers.</p>\r\n<!--<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"\r\n            xmlns:dc="http://purl.org/dc/elements/1.1/"\r\n            xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">\r\n        <rdf:Description rdf:about="http://www.successfulblogging.com/16-rules-of-blog-writing-which-ones-are-you-breaking/"\r\n    dc:identifier="http://www.successfulblogging.com/16-rules-of-blog-writing-which-ones-are-you-breaking/"\r\n    dc:title="16 Rules of Blog Writing and Layout. Which Ones Are You Breaking?"\r\n    trackback:ping="http://www.successfulblogging.com/16-rules-of-blog-writing-which-ones-are-you-breaking/trackback/" />\r\n</rdf:RDF>-->', '<strong>25</strong>  Sept, 2015', 'published'),
(60, 1, 'post', '2015-08-28 01:50:27', '2016-04-03 14:15:08', 'permalink/hello-world', 'Hello Word!', '<p>Hello world edited!!</p>\r\n', '', 'draft'),
(62, 1, 'comment', '2015-08-30 05:15:28', '2015-09-01 23:55:59', 'posts/view/34#comment-62', 'Comment pertama', '                Percobaan bismillah    --->alhamdulillah        ', '', 'published'),
(63, 1, 'comment', '2015-08-30 05:26:14', '2015-09-01 23:58:32', 'posts/view/34#comment-63', 'Anaknya comment', '                Anaknya comment pastilah bisa                        ', '', 'published'),
(64, 1, 'comment', '2015-08-30 05:27:42', '2015-08-30 05:27:42', 'posts/view/34#comment-64', 'Anaknya comment', 'percobaan anak comment', '', 'published'),
(65, 1, 'comment', '2015-08-30 06:07:20', '2015-09-02 05:25:38', 'posts/view/34#comment-65', 'Anaknya anaknya comment', '                                Anaknya anaknya comment coba2                  \r\ndiedit sangar bgt', '', 'published'),
(66, 1, 'comment', '2015-08-30 06:07:38', '2015-08-30 06:07:38', 'posts/view/34#comment-66', '', 'wajwkakwkaw', '', 'published'),
(67, 1, 'comment', '2015-09-02 00:07:01', '2015-09-02 00:07:01', 'posts/view/34#comment-67', 'Lorem Lispum', 'lorem dolor dolor sednten', '', 'published'),
(68, 1, 'comment', '2015-09-02 00:33:55', '2015-09-02 00:33:55', 'posts/view/34#comment-68', 'pager itu penting', 'percobaan pager', '', 'published'),
(69, 1, 'menu', '2015-09-02 03:48:26', '2015-09-22 13:16:24', 'sejarah', 'sekilas cerita tentang HMIF', 'Sejarah', '', '1'),
(70, 1, 'menu', '2015-09-02 03:49:48', '2015-09-22 13:51:36', 'ikamif', 'portal alumni Mahasiswa Informatika', 'Alumni', '', '1'),
(71, 1, 'page', '2015-09-02 04:08:08', NULL, 'alumni', 'Alumni', '<p>Ini adalah portal alumni,<br />\r\n<br />\r\nSiapakah alumni&nbsp; HMIF??<br />\r\n<br />\r\nAda posts kah disini??<br />\r\n<br />\r\nLink meuju forum IKAMIF</p>\r\n', 'Alumni', 'published'),
(72, 1, 'page', '2015-09-02 04:09:05', '2015-09-22 13:46:37', 'informasi', 'Informasi', '<p>Ini adalah portal informasi</p>\r\n', 'Informasi', 'published'),
(73, 1, 'page', '2015-09-02 04:11:01', '2015-09-22 13:34:39', 'apa-itu-hmif', 'Apa Itu HMIF', '<p>Himpunan Mahasiswa Informatika Program Teknologi Inforamsi &amp; Ilmu Komputer Universitas Brawijaya (HMIF PTIIK UB) adalah organisasi yang mewadahi, menaungi dan beranggotakan seluruh mahasiswa Informatika PTIIK UB. HMIF bertujuan untuk mewujudkan kedaulatan mahasiswa Informatika, mengembangkan kemampuan keprofesian dan non-keprofesian dan membentuk mahasiswa yang beriman dan bertakwa kepada Tuhan YME, memiliki wawasan yang luas, kecendekiawanan, integritas, kepribadian, kepedulian sosial</p>\r\n\r\n<p>Dibawah naungan HMIF PTIIK UB terdapat dua lembaga pengurus yaitu Eksekutif Mahasiswa Informatika &amp; Badan Perwakilan Mahasiswa Informatika</p>\r\n', 'Apa itu HMIF?', 'published'),
(74, 1, 'page', '2015-09-02 04:12:41', '2015-09-22 13:35:26', 'kami-emif', 'Kami adalah EMIF', '<p>Eksekutif Mahasiswa Informatika adalah lembaga yang memiliki fungsi sebagai badan eksekutif</p>\r\n', 'Kami adalah EMIF', 'published'),
(75, 1, 'page', '2015-09-02 04:13:49', '2016-02-23 02:45:05', 'sejarah', 'Sejarah HMIF', '<p>Sejarah<br />\r\n<br />\r\nsekilas cerita tentang HMIF</p>\r\n\r\n<p>yang menarik kuduan</p>\r\n', 'Sejarah', 'published'),
(76, 1, 'page', '2015-09-02 04:15:59', '2015-11-16 00:38:35', 'berita', 'Berita', '<p>Isinya dalah post2 terbaru mengenai berita2, advokesma, dll</p>\n', 'Berita', 'published'),
(77, 1, 'page', '2015-09-02 04:16:35', '2015-09-10 11:39:32', 'agenda', 'Agenda', '<p>Isinya post2 mengenai event terbaru</p>\r\n', 'Agenda', 'published'),
(78, 1, 'page', '2015-09-02 04:48:23', '2015-11-16 00:01:23', 'not-found', 'Halaman yang anda cari tidak ditemukan!', '<p>Maaf atas ketidaknyamanan yang anda alami, jika berkenan silahkan lapor pada halaman <a href="http://hmif.ub.ac.id/hubungi-kami">hubungi kami</a></p>\n', '', 'published'),
(79, 1, 'page', '2015-09-02 04:57:26', '2015-11-16 00:03:46', 'no-permission', 'Anda tidak memiliki akses untuk halaman tersebut!', '<p>Anda telah mengikuti link yang tidak valid, atau menjalankan prosedur yang tidak sesuai. Hal tersebut adalah kesalahan kami, jika berkenan silahkan kirimkan masukkan anda pada halaman <a href="http://hmif.ub.ac.id/hubungi-kami">hubungi kami</a></p>\n', '', 'published'),
(80, 1, 'comment', '2015-09-02 05:20:03', '2015-09-02 05:20:03', 'posts/view/34#comment-80', 'percobaan', 'nambah jumlah komen', '', 'published'),
(81, 1, 'comment', '2015-09-02 05:26:13', '2015-09-02 05:26:13', 'posts/view/34#comment-81', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(82, 1, 'comment', '2015-09-02 05:26:17', '2015-09-02 05:26:18', 'posts/view/34#comment-82', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(83, 1, 'comment', '2015-09-02 05:26:22', '2015-09-02 05:26:22', 'posts/view/34#comment-83', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(84, 1, 'comment', '2015-09-02 05:26:23', '2015-09-02 05:26:23', 'posts/view/34#comment-84', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(85, 1, 'comment', '2015-09-02 05:26:30', '2015-09-02 05:26:30', 'posts/view/34#comment-85', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(86, 1, 'comment', '2015-09-02 05:26:30', '2015-09-02 05:26:30', 'posts/view/34#comment-86', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(87, 1, 'comment', '2015-09-02 05:26:31', '2015-09-02 05:26:31', 'posts/view/34#comment-87', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(88, 1, 'comment', '2015-09-02 05:30:25', '2015-09-02 05:30:25', 'posts/view/34#comment-88', 'last mod', 'Selanjutnya tinggal menampilkan date created atau last mod', '', 'published'),
(92, 1, 'menu', '2015-09-10 13:28:56', '2015-11-16 15:30:49', 'posts/manage/beasiswa', 'Beasiswa posts', 'Beasiswa', 'Beasiswa', '1'),
(93, 1, 'menu', '2015-09-22 13:29:03', '2015-11-16 15:30:59', 'posts/manage/produk', 'Produk posts', 'Produk', 'Produk', '1'),
(94, 1, 'page', '2015-09-22 13:29:51', NULL, 'produk', 'Produk', '<p>List produk</p>\r\n', 'Produk', 'published'),
(95, 1, 'page', '2015-09-22 13:38:05', NULL, 'bpmif', 'Badan Perwakilan Mahasiswa', '<p>Badan Perwakilan Mahasiswa Informatika adalah lembaga yang memiliki fungsi sebagai badan legislatif</p>\r\n', 'Badan Perwakilan Mahasiswa', 'published'),
(96, 1, 'menu', '2015-09-22 13:39:33', NULL, 'bpmif', 'tentang BPMIF', 'Badan Perwakilan Mahasiswa', '', '1'),
(97, 1, 'page', '2015-09-22 13:47:42', NULL, 'beasiswa', 'Beasiswa', '<p>Isi post mengenai beasiswa dibawah</p>\r\n', 'Beasiswa', 'published'),
(98, 1, 'page', '2015-09-22 13:49:30', '2015-11-03 01:20:43', 'ikamif', 'Alumni', '<p>Coming Soon!</p>\r\n', 'Alumni', 'published'),
(99, 1, 'page', '2015-09-22 13:50:46', '2015-11-03 01:29:02', 'forum', 'Forum HMIF', '<p>Menuju FORUM HMIF, Coming soon!</p>\r\n', 'Forum', 'published'),
(100, 1, 'menu', '2015-09-22 14:21:10', NULL, 'apa-itu-hmif', 'profil HMIF', 'Profil HMIF', '', '1'),
(101, 1, 'menu', '2015-09-22 14:21:44', NULL, 'informasi', 'informasi', 'Informasi', '', '1'),
(102, 1, 'menu', '2015-09-22 14:22:25', '2015-09-22 14:22:33', 'produk', 'Produk HMIF', 'Produk - Produk', '', '1'),
(103, 1, 'menu', '2015-09-22 14:23:09', NULL, 'ikamif', 'portal alumni Mahasiswa Informatika', 'Alumni Informatika', '', '1'),
(104, 1, 'menu', '2015-09-22 14:23:43', NULL, 'forum', 'Forum HMIF', 'Forum Mahasiswa Informatika', '', '1'),
(105, 1, 'menu', '2015-09-22 14:24:17', '2015-11-15 23:03:59', 'hubungi-kami', 'Hubungi Kami', 'Kontak Kami', '', '1'),
(106, 1, 'post', '2015-09-22 15:14:56', '2015-09-22 15:54:23', 'permalink/daftar-ulang-2015', 'Daftar Ulang Semester Ganjil', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo velit ut vulputate molestie. ehem</p>\n', '', 'published'),
(107, 1, 'post', '2015-09-22 15:16:06', NULL, 'permalink/daftar-ulang-genap-2015', 'Daftar Ulang Semester Genap', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo velit ut vulputate molestie.</p>\r\n', '', 'published'),
(108, 1, 'post', '2015-09-22 15:17:52', NULL, 'permalink/beasiswa-artajasa', 'Penawaran Beasiswa PT. Artajasa Tahun 2015', '<p>Sesuatu deh</p>\r\n', '06 September 2015', 'published'),
(109, 1, 'post', '2015-09-22 15:21:10', '2015-09-22 18:16:36', 'permalink/produk-cms', 'Produk pertama CMS', '<p>ini produk cms sangar lah,<br />\r\nversi kemarin bisa didownload di <a href="http://codemastery.net/frame_work.zip">http://codemastery.net/frame_work.zip</a>\r\n<br />untuk database disini versi kemarin bisa didownload <a href="http://codemastery.net/frame_work/emif_framework.sql">disini</a></p>\r\n\r\n<p>untuk info lebih lanjut hubungi maul</p>\r\n', '', 'published'),
(110, 1, 'menu', '2015-09-22 15:43:48', NULL, 'login', 'Masuk kedalam sistem', 'Login', '', '1'),
(111, 1, 'comment', '2015-09-22 17:43:01', NULL, '', '', 'wkwk lek aku yo isok komen', '', 'published'),
(112, 1, 'comment', '2015-09-22 17:47:03', '2015-09-22 17:47:03', 'posts/view/38#comment-112', '', 'jkasdaksjd', '', 'published'),
(113, 1, 'comment', '2015-09-22 17:47:14', '2015-09-22 17:47:14', 'posts/view/38#comment-113', '', 'loh kok mau gak isok zzzz', '', 'published'),
(114, 1, 'comment', '2015-10-07 02:50:29', '2015-10-07 02:50:29', 'permalink/beasiswa-artajasa#comment-114', '', 'sadsda', '', 'published'),
(115, 1, 'comment', '2015-10-07 02:50:33', '2015-10-07 02:50:33', 'permalink/beasiswa-artajasa#comment-115', '', 'sdfsdf', '', 'published'),
(116, 1, 'comment', '2015-10-07 02:50:42', '2015-10-07 02:50:42', 'permalink/beasiswa-artajasa#comment-116', '', 'asda', '', 'published'),
(117, 1, 'comment', '2015-10-07 02:50:50', '2015-10-07 02:50:50', 'permalink/beasiswa-artajasa#comment-117', '', 'asdasd', '', 'published'),
(118, 1, 'comment', '2015-10-07 02:51:07', '2015-10-07 02:51:07', 'permalink/beasiswa-artajasa#comment-118', '', 'sdasd\r\n', '', 'published'),
(119, 1, 'comment', '2015-10-10 03:04:15', '2015-10-10 03:04:15', 'permalink/daftar-ulang-genap-2015#comment-119', '', 'Quee sir amet!', '', 'published'),
(120, 1, 'menu', '2015-10-10 03:07:36', '2015-11-15 23:04:42', 'dashboard', 'dashboard', 'Dashboard', '', '1'),
(121, 1, 'comment', '2015-10-10 03:11:10', '2015-10-10 03:11:10', 'permalink/daftar-ulang-genap-2015#comment-121', '', 'asd', '', 'published'),
(122, 1, 'comment', '2015-10-10 03:12:31', '2015-10-10 03:12:31', 'permalink/daftar-ulang-genap-2015#comment-122', '', '', '', 'published'),
(125, 1, 'comment', '2015-10-10 08:13:51', '2015-10-11 11:33:31', 'contact-us#comment-125', 'coba', 'kapan desain web hmif selesai?', '', 'published'),
(127, 1, 'comment', '2015-10-11 08:12:34', '2015-10-11 08:12:35', 'contact-us#comment-127', 'Hemm sesuatu', 'Apakah ini verifiable?', '', 'unverified'),
(128, 1, 'comment', '2015-10-14 09:59:14', '2015-10-14 09:59:14', 'permalink/daftar-ulang-2015#comment-128', '', 'sfsdf', '', 'published'),
(129, 2, 'comment', '2015-10-30 06:31:34', '2015-10-30 06:31:34', 'permalink/produk-cms#comment-129', '', '2eqweqwe', '', 'published'),
(130, 2, 'comment', '2015-10-30 06:32:14', '2015-10-30 06:32:14', 'permalink/produk-cms#comment-130', '', 'wehfiksjdfh', '', 'published'),
(131, 2, 'comment', '2015-10-30 06:32:23', '2015-10-30 06:32:23', 'permalink/produk-cms#comment-131', '', 'oiajfodsdijd', '', 'published'),
(132, 2, 'comment', '2015-10-30 06:32:35', '2015-10-30 06:32:35', 'permalink/produk-cms#comment-132', '', 'oiwejdosd\r\n', '', 'published'),
(133, 1, 'comment', '2015-11-04 01:07:58', '2015-11-04 01:07:58', 'permalink/produk-cms#comment-133', '', 'qweqwe', '', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `cover` varchar(80) NOT NULL,
  `commentable` tinyint(1) DEFAULT NULL,
  `comment_count` int(11) NOT NULL,
  `view` varchar(50) NOT NULL,
  `post_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `cover`, `commentable`, `comment_count`, `view`, `post_category`) VALUES
(45, '', 1, 4, 'contacts', NULL),
(72, 'assets/images/alumni_cover.png', NULL, 0, 'post_category', 7),
(73, '', NULL, 0, 'default_page', NULL),
(74, 'assets/images/emif_cover.png', NULL, 0, 'default_page', NULL),
(75, '', NULL, 0, 'sejarah', NULL),
(76, '', NULL, 0, 'post_category', 2),
(77, '', NULL, 0, 'post_category', 3),
(78, '', NULL, 0, 'coming_soon', NULL),
(79, '', 1, 0, 'coming_soon', NULL),
(94, '', NULL, 0, 'post_category', 12),
(95, '', NULL, 0, 'default_page', 0),
(97, '', NULL, 0, 'post_category', 11),
(98, 'assets/images/alumni_cover.png', 1, 0, 'coming_soon', 0),
(99, '', 1, 0, 'coming_soon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_type_id` int(11) DEFAULT NULL,
  `subtype` varchar(30) NOT NULL,
  `preview` text NOT NULL,
  `thumbnail` varchar(220) DEFAULT 'http://southasia.oneworld.net/ImageCatalog/no-image-icon/image',
  `cover` varchar(220) DEFAULT NULL,
  `permalink` varchar(80) DEFAULT NULL,
  `visited_last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visited_count` int(11) NOT NULL,
  `commentable` tinyint(1) NOT NULL,
  `comment_count` int(11) NOT NULL,
  `rateup` int(11) NOT NULL,
  `public` smallint(6) NOT NULL,
  `featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_type_id`, `subtype`, `preview`, `thumbnail`, `cover`, `permalink`, `visited_last`, `visited_count`, `commentable`, `comment_count`, `rateup`, `public`, `featured`) VALUES
(33, 2, '', 'In the lorem lipsum var aguer tag as wal afiat', 'http://localhost/frame_work/assets/images/news-4.jpg', 'http://localhost/frame_work/assets/images/news-4.jpg', NULL, '2015-11-15 22:47:36', 49, 0, 0, 0, 1, 1),
(34, 3, '', 'Lorep lispusum asum susum sumsum', 'false', 'false', 'campaign', '2015-11-16 00:49:11', 126, 0, 2, 0, 1, 0),
(35, 3, '', '', NULL, NULL, NULL, '2015-10-07 02:49:35', 1, 1, 0, 0, 1, 0),
(36, 3, '', 'Phasellus lobortis arcu in quam accumsan imperdiet. Ut sed nibh eu lacus consectetur aliquam nec at mauris. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse vulputate, ante in malesuada ullamcorper, leo arcu hendrerit arcu, nec tempor neque leo nec ligula.', '', '', 'hardship-from-developer', '2015-09-22 15:02:00', 4, 0, 0, 0, 1, 0),
(37, 3, '', 'Proin sapien arcu, feugiat at velit vitae, vestibulum congue est. Praesent dolor est, vehicula a suscipit vitae, placerat non nisl. Fusce sed suscipit tortor. Aenean aliquam eu velit eu euismod. Nulla faucibus tellus ex, sit amet fermentum sem laoreet in. Nulla interdum sapien et metus vulputate, ultricies malesuada tortor ultrices. Cras condimentum nisi purus, ut rhoncus turpis laoreet at. Proin accumsan, sem vel porttitor porta, risus erat pulvinar lectus, porta auctor quam neque et elit. In malesuada massa id mi ornare lobortis. ', '', '', 'last-man', '2015-09-22 15:02:37', 2, 0, 0, 0, 1, 0),
(38, 3, '', '', NULL, NULL, NULL, '2015-10-10 08:28:22', 41, 1, 1, 0, 1, 0),
(41, 2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget vehicula sem. Donec vel tincidunt urna. Vestibulum sit amet sapien ut diam rhoncus ornare.', 'http://localhost/frame_work/assets/images/news-2.jpg', 'http://localhost/frame_work/assets/images/news-2.jpg', NULL, '2015-11-15 23:23:09', 20, 0, 0, 0, 1, 1),
(57, 2, '', 'Returns the position where the needle exists relative to the beginnning of the haystack string (independent of search direction or offset). Also note that string positions start at 0, and not 1.', 'http://localhost/frame_work/assets/images/news-1.jpg', 'http://localhost/frame_work/assets/images/news-1.jpg', 'percobaan-post', '2015-10-23 06:45:47', 2, 0, 0, 0, 1, 1),
(59, 3, '', 'But quality content isn’t all you expect when you buy a newspaper and it isn’t enough for blog writing either.\r\nAll newspapers make sure their content is easy to read by constraining the width of their columns and that’s what their readers expect.', 'http://localhost/frame_work/assets/images/posts/', 'http://localhost/frame_work/assets/images/posts/', '16-rules-of-blog-writing-and-layout', '2016-04-03 14:45:06', 186, 0, 0, 0, 1, 1),
(60, 2, '', 'Hello wew..', '[base_url]assets/images/posts/asdasd.jpg', '', 'hello-world', '2016-04-03 14:47:10', 7, 0, 0, 0, 0, 1),
(106, 7, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo velit ut vulputate molestie.', '', '', 'daftar-ulang-2015', '2015-11-17 00:03:49', 8, 1, 0, 0, 1, 1),
(107, 7, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo velit ut vulputate molestie.', '', '', 'daftar-ulang-genap-2015', '2015-10-10 08:11:22', 29, 1, 1, 0, 1, 0),
(108, 11, '', 'sesuatu aja', '', '', 'beasiswa-artajasa', '2015-11-17 00:03:52', 6, 1, 2, 0, 1, 0),
(109, 12, '', 'ini produk cms sangar lah,', '', '', 'produk-cms', '2015-11-16 00:49:17', 199, 1, 3, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_types`
--

CREATE TABLE `post_types` (
  `post_type_id` int(11) NOT NULL,
  `post_type` varchar(30) NOT NULL,
  `content_type` varchar(30) NOT NULL,
  `commentable` tinyint(1) NOT NULL,
  `taggable` tinyint(1) NOT NULL,
  `rateable` tinyint(1) NOT NULL,
  `view` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_types`
--

INSERT INTO `post_types` (`post_type_id`, `post_type`, `content_type`, `commentable`, `taggable`, `rateable`, `view`) VALUES
(2, 'Berita', 'Post and Image', 0, 1, 0, 'default_post'),
(3, 'Agenda', 'Post and Image', 0, 1, 0, 'default_post'),
(7, 'Informasi', 'Post and Image', 1, 1, 0, 'default_post'),
(11, 'Beasiswa', 'Post and Image', 1, 1, 0, 'default_post'),
(12, 'Produk', 'Post and Image', 1, 1, 1, 'default_post');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rate` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Webmaster'),
(2, 'Editor'),
(3, 'Writer'),
(4, 'Anonymous'),
(5, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module` varchar(30) NOT NULL,
  `permission` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`permission_id`, `role_id`, `module`, `permission`) VALUES
(1, 1, 'admin-page', '-read-'),
(3, 1, 'permission', '-access-all-'),
(4, 2, 'admin-page', '-read-'),
(7, 4, 'login', '-read-'),
(8, 1, 'front-end', '-read-'),
(10, 2, 'front-end', '-read-'),
(11, 3, 'front-end', '-read-'),
(12, 4, 'front-end', '-read-'),
(14, 1, 'menu', '-access-all-'),
(15, 1, 'post', '-access-all-'),
(17, 1, 'post_type', '-access-all-'),
(18, 1, 'site', '-edit-'),
(21, 1, 'user', '-access-all-'),
(22, 2, 'user', '-access-'),
(24, 1, 'page', '-access-all-'),
(26, 1, 'page', '-create-all-read-all-update-all-delete-all-'),
(27, 1, 'post', '-create-all-read-all-update-all-delete-all-'),
(28, 1, 'admin-page', '-ajax-'),
(30, 2, 'admin-page', '-ajax-'),
(33, 1, 'comment', '-create-all-read-all-update-all-delete-all-'),
(34, 2, 'comment', '-create-all-read-all-update-all-delete-all-'),
(36, 2, 'page', '--create-all-read-all-update-all-delete-all--'),
(37, 2, 'page', '-access-all-'),
(38, 2, 'post', '-access-all-'),
(39, 2, 'post', '-create-all-read-all-update-all-delete-all-'),
(41, 3, 'comment', '-create-read-update-delete-'),
(42, 4, 'comment', '-read-'),
(43, 3, 'page', '-read-'),
(44, 4, 'page', '-read-'),
(45, 3, 'post', '-read-'),
(46, 4, 'post', '-read-'),
(47, 3, 'user', '-access-'),
(48, 3, 'admin-page', '-read-'),
(49, 3, 'admin-page', '-ajax-'),
(50, 3, 'post', '-create-read-update-delete-'),
(51, 5, 'admin-page', '-read-'),
(52, 5, 'comment', '-create-read-update-delete-'),
(53, 5, 'front-end', '-read-'),
(54, 5, 'post', '-read-'),
(55, 5, 'user', '-access-');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `primary` int(11) NOT NULL DEFAULT '1',
  `site_name` varchar(225) NOT NULL,
  `site_title` varchar(225) NOT NULL,
  `site_url` varchar(225) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `date_format` varchar(20) NOT NULL,
  `rows_per_page` int(11) NOT NULL,
  `template` varchar(45) NOT NULL,
  `admin_template` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`primary`, `site_name`, `site_title`, `site_url`, `site_logo`, `date_format`, `rows_per_page`, `template`, `admin_template`) VALUES
(1, 'Framework HMIF', 'Official Framework HMIF', 'http://hmif.ub.ac.id', 'http://hmif.ub.ac.id/assets/logo.png', 'm-d-Y', 10, 'emif_template', 'top_nav_admin');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `post_id` int(11) NOT NULL,
  `tag` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`post_id`, `tag`) VALUES
(23, 'hello'),
(23, 'word'),
(23, 'world'),
(33, 'nambah'),
(33, 'word'),
(41, 'lorem'),
(41, 'percobaan'),
(41, 'sukses'),
(54, 'lorem'),
(54, 'percobaan'),
(54, 'sukses'),
(57, 'lorem'),
(57, 'percobaan'),
(57, 'sukses'),
(58, 'layout'),
(58, 'percobaan'),
(58, 'rules'),
(59, 'layout'),
(59, 'percobaan'),
(59, 'rules');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(80) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `website` varchar(225) DEFAULT NULL,
  `reputation` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL,
  `uri` varchar(80) NOT NULL,
  `pict` varchar(80) NOT NULL,
  `gravatar` varchar(300) DEFAULT NULL,
  `bio` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `name`, `username`, `pass`, `email`, `no_telp`, `website`, `reputation`, `role_id`, `uri`, `pict`, `gravatar`, `bio`, `status`, `hash`) VALUES
(-1, '2015-10-10 06:57:12', 'Anonymous', 'anonymous', '294de3557d9d00b3d2d8a1e6aab028cf', 'anon@codemastery.net', '08971238788', NULL, -9999, 4, '-', '-', NULL, '', 'non-active', ''),
(1, '2015-04-18 09:09:31', 'Maulana Hey Hey', 'maulcux', 'c50fe8f480de05e96e96682e5a559900', 'maulcux@gmail.com', '', NULL, 0, 1, 'users/profile/maulcux', 'assets/images/users/1.jpg', NULL, '', 'active', ''),
(2, '2015-09-02 06:11:42', 'Pengkom Ceria', 'pengkom', '3416ebd4264688ea76e79997f3378733', 'pengkom@codemastery.net', '', NULL, 0, 2, 'users/profile/pengkom', 'assets/images/users/2.jpg', NULL, '', 'active', ''),
(3, '2015-09-22 15:36:50', 'emif UB', 'emif', 'eb8e00577d6af44104611efdbc775e1b', 'emif@codemaster.net', '', NULL, 0, 2, 'users/profile/emif', 'assets/images/users/3.jpg', NULL, '', 'active', ''),
(4, '2015-10-11 08:20:23', 'maulana', 'maul', 'c50fe8f480de05e96e96682e5a559900', 'me_ula@ymail.com', '', NULL, 0, 3, 'users/profile/maul', 'assets/images/users/4.jpg', NULL, '', 'active', ''),
(5, '2015-11-16 15:32:59', 'infokom baper', 'infokom', 'ddff6661648d7d30476a0f7ce7434042', 'infokom@hmif.ub.ac.id', '', NULL, 0, 2, 'users/profile/infokom', 'assets/images/users/5.jpg', NULL, '', 'active', ''),
(6, '2015-12-14 02:51:41', 'Maulana Muhammad', '125150200111148', 'c50fe8f480de05e96e96682e5a559900', '125150200111148@mail.ub.ac.id', '', NULL, 0, 5, 'users/profile/125150200111148', 'assets/images/users/6.jpg', NULL, '', 'active', 'ee1abc6b5f7c6acb34ad076b05d40815');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cdn_list`
--
ALTER TABLE `cdn_list`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `uri` (`uri`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`position`,`module_target`),
  ADD KEY `node_id` (`role_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `node_id_2` (`menu_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`node_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `post_category` (`post_category`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `permalink` (`permalink`),
  ADD KEY `node_id` (`post_type_id`);

--
-- Indexes for table `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`post_type_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`user_id`,`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`module`,`permission`),
  ADD UNIQUE KEY `permission_id` (`permission_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`primary`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`post_id`,`tag`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
  MODIFY `post_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `nodes` (`node_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `nodes` (`node_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_5` FOREIGN KEY (`menu_id`) REFERENCES `nodes` (`node_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nodes`
--
ALTER TABLE `nodes`
  ADD CONSTRAINT `nodes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `nodes` (`node_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`post_id`) REFERENCES `nodes` (`node_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_6` FOREIGN KEY (`post_type_id`) REFERENCES `post_types` (`post_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
