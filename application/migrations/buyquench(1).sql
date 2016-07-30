-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2016 at 08:59 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buyquench`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `offer_url` text NOT NULL,
  `offer_btn` varchar(255) NOT NULL,
  `win_tag` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `offer_url`, `offer_btn`, `win_tag`, `image`, `quiz_id`) VALUES
(1, 'Words of Affirmation', 'Actions don’t always speak louder than words. If this is your love language, unsolicited compliments mean the world to you. Hearing the words, “I love you,” are important—hearing the reasons behind that love sends your spirits skyward. Insults can leave you shattered and are not easily forgotten. You thrive on hearing kind and encouraging words that build you up.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat1', '5ll_icon-affirmation1.png', 1),
(2, 'Quality Time', 'In Quality Time, nothing says “I love you” like full, undivided attention. Being there for this type of person is critical, but really being there—with the TV off, fork and knife down, and all chores and tasks on standby—makes you feel truly special and loved. Distractions, postponed activities, or the failure to listen can be especially hurtful. Whether itʼs spending uninterrupted time talking with someone else or doing activities\ntogether, you deepen your connection with others through sharing time.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat2', '5ll_icon-quality1.png', 1),
(3, 'Receiving Gifts', 'Don’t mistake this love language for materialism; the receiver of gifts thrives on the love, thoughtfulness, and effort behind the gift. If you speak this language, the perfect gift or gesture shows that you are known, you are cared for, and you are prized above whatever was sacrificed to bring the gift to you. A missed birthday or a hasty, thoughtless gift would be disastrous—so would the absence of everyday gestures. Gifts are heartfelt symbols to you of someone else’s love and affection for you.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat3', '5ll_icon-gifts1.png', 1),
(4, 'Acts of Service', 'Can helping with homework really be an expression of love? Absolutely! Anything you do to ease the burden of responsibilities weighing on an “Acts of Service” person will speak volumes. The words he or she most wants to hear: “Let me do that for you.” Laziness, broken commitments, and making more work for them tell speakers of this language their feelings don’t matter. When others serve you out of love (and not obligation), you feel truly valued and loved.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat4', '5ll_icon-service1.png', 1),
(5, 'Physical Touch', 'A person whose primary language is Physical Touch is, not surprisingly, very touchy. Hugs, pats on the back, and thoughtful touches on the arm—they can all be ways to show excitement, concern, care, and love. Physical presence and accessibility are crucial, while neglect or abuse can be unforgivable and destructive. Appropriate and timely touches communicate warmth, safety, and love to you.', 'http://buyquench.com/cart/checkout?id=1http://peoriawebdevelopment.com/salesquestion/cart/checkout?id=1', 'Buy Now!', 'Win Cat5', '5ll_icon-touch1.png', 1),
(7, 'Quality Time', 'this is the description to the category', '', '', '', '5ll_icon-quality2.png', 0),
(9, 'test category 1', 'This is a test', '', '', '', 'April 16, 2014 80923 PM MST.jpg', 0),
(10, 'Programming With API''s', 'This is when you need to have 2 systems talk to each other.', '#', 'You Need A Discover Session!', '', 'tumblr_static_api500.png', 2),
(11, 'Words of Affirmation', 'Actions don’t always speak louder than words. If this is your love language, unsolicited compliments mean the world to you. Hearing the words, “I love you,” are important—hearing the reasons behind that love sends your spirits skyward. Insults can leave you shattered and are not easily forgotten. You thrive on hearing kind and encouraging words that build you up.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat1', '5ll_icon-affirmation4.png', 3),
(12, 'Quality Time', 'In Quality Time, nothing says “I love you” like full, undivided attention. Being there for this type of person is critical, but really being there—with the TV off, fork and knife down, and all chores and tasks on standby—makes you feel truly special and loved. Distractions, postponed activities, or the failure to listen can be especially hurtful. Whether itʼs spending uninterrupted time talking with someone else or doing activities\ntogether, you deepen your connection with others through sharing time.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat2', '5ll_icon-quality3.png', 3),
(13, 'Receiving Gifts', 'Don’t mistake this love language for materialism; the receiver of gifts thrives on the love, thoughtfulness, and effort behind the gift. If you speak this language, the perfect gift or gesture shows that you are known, you are cared for, and you are prized above whatever was sacrificed to bring the gift to you. A missed birthday or a hasty, thoughtless gift would be disastrous—so would the absence of everyday gestures. Gifts are heartfelt symbols to you of someone else’s love and affection for you.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat3', '5ll_icon-gifts2.png', 3),
(14, 'Acts of Service', 'Can helping with homework really be an expression of love? Absolutely! Anything you do to ease the burden of responsibilities weighing on an “Acts of Service” person will speak volumes. The words he or she most wants to hear: “Let me do that for you.” Laziness, broken commitments, and making more work for them tell speakers of this language their feelings don’t matter. When others serve you out of love (and not obligation), you feel truly valued and loved.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat4', '5ll_icon-service3.png', 3),
(15, 'Physical Touch', 'A person whose primary language is Physical Touch is, not surprisingly, very touchy. Hugs, pats on the back, and thoughtful touches on the arm—they can all be ways to show excitement, concern, care, and love. Physical presence and accessibility are crucial, while neglect or abuse can be unforgivable and destructive. Appropriate and timely touches communicate warmth, safety, and love to you.', 'http://buyquench/cart/checkout?id=1', 'Buy Now!', 'Win Cat5', '5ll_icon-touch2.png', 3),
(16, 'Programming With API''s', 'This is when you need to have 2 systems talk to each other.', '#', 'You Need A Discover Session!', '', '5ll_icon-affirmation5.png', 4),
(17, 'Crowd funding project', '', '', '', '', '', 5),
(18, 'Startup', '', '', '', '', '', 5),
(19, 'Very Small Business', '', '', '', '', '', 5),
(20, 'Established Business', '', '', '', '', '', 5),
(21, 'Quiz', 'Quiz', '#', '', 'Quiz', '', 6),
(22, 'asdf', 'asdf', 'asdf', 'asdff', '', '', 7),
(23, 'ASDFASD', 'ASDF', 'ASDF', 'ASDF', 'SDF', '', 7),
(24, 'Retail', 'I run a retail shop', '', 'Im ready to juice my retail shop', 'customer', '', 8),
(25, 'asdfas', 'asdfasd', '', '', '', '', 9),
(26, 'asd', 'asd', '', '', '', '', 9),
(27, 'asdas', 'asdasd', '', '', '', '', 9),
(28, 'Selling Products', '', '', '', '', 'selling_products1.png', 10),
(29, 'Business Coaching', '', '', 'Start Coaching', '', 'coaching.png', 10),
(30, 'Service Feedback', '', '', 'Capture Feedback', '', 'feedback.png', 10),
(31, 'Target Visitors and Users', '', '', 'Start Now', '', 'targeting_clients.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4ecd6f2f45530c17b470c7315014241c', '96.38.185.155', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13F6', 1469565905, 'a:2:{s:9:"user_data";s:0:"";s:13:"cart_contents";a:28:{s:21:"order_insurable_value";i:0;s:12:"order_weight";i:0;s:14:"group_discount";i:0;s:15:"coupon_discount";i:0;s:23:"taxable_coupon_discount";i:0;s:17:"gift_card_balance";i:0;s:18:"gift_card_discount";i:0;s:9:"downloads";a:0:{}s:13:"cart_subtotal";i:0;s:22:"cp_discounted_subtotal";i:0;s:13:"taxable_total";i:0;s:10:"cart_total";i:0;s:11:"total_items";i:0;s:14:"shipping_total";i:0;s:3:"tax";i:0;s:5:"items";a:0:{}s:8:"customer";b:0;s:6:"coupon";b:0;s:4:"lead";a:3:{s:7:"lead_id";s:1:"1";s:9:"FirstName";s:5:"Craig";s:5:"Email";s:19:"Jacobson1@gmail.com";}s:14:"custom_charges";a:0:{}s:8:"shipping";a:3:{s:6:"method";b:0;s:5:"price";b:0;s:4:"code";b:0;}s:7:"gc_list";a:0:{}s:11:"coupon_list";a:0:{}s:15:"applied_coupons";a:0:{}s:21:"whole_order_discounts";a:0:{}s:20:"free_shipping_coupon";b:0;s:17:"requires_shipping";b:0;s:7:"payment";a:0:{}}}'),
('7bd2ef4e503013a92b12933d21fd978a', '208.54.4.179', 'Mozilla/5.0 (Linux; Android 5.0; SM-N900T Build/LRX21V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobil', 1469565266, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `quiz_id`) VALUES
(1, 'client1', 'client1@gmail.com', 0),
(3, 'Travis', 'tgarner@envisionyourwebsite.com', 0),
(4, 'james', 'james@aol.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `code`, `desc`, `type`, `amount`, `start_date`, `end_date`, `status`) VALUES
(1, 'coupon1', 'festivel1', 'coupon1 description', 'fixed', 10, '2014-04-18 00:00:00', '2014-04-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_actions`
--

CREATE TABLE IF NOT EXISTS `form_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `num_per_page` int(11) NOT NULL,
  `passed_by` varchar(255) NOT NULL,
  `animation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `form_actions`
--

INSERT INTO `form_actions` (`id`, `quiz_id`, `num_per_page`, `passed_by`, `animation`) VALUES
(1, 1, 1, 'Questions answered correctly', 'bounceInDown,bounceOutDown'),
(3, 2, 1, 'Questions answered correctly', 'bounceIn,bounceOut'),
(4, 4, 1, 'Catagory chosen', 'bounceIn,bounceOut'),
(5, 5, 1, 'Catagory chosen', 'bounceIn,bounceOut'),
(6, 6, 1, 'Questions answered correctly', 'bounceIn,bounceOut'),
(7, 2, 1, 'Questions answered correctly', 'bounceIn,bounceOut'),
(8, 3, 1, 'Questions answered correctly', 'bounceIn,bounceOut'),
(9, 4, 1, 'Questions answered correctly', 'bounceIn,bounceOut'),
(10, 7, 1, 'Catagory chosen', 'bounceIn,bounceOut'),
(11, 9, 2, 'Questions answered correctly', 'bounceIn,bounceOut'),
(12, 10, 1, 'Catagory chosen', 'fadeInDownBig,fadeOutDownBig');

-- --------------------------------------------------------

--
-- Table structure for table `lead_form`
--

CREATE TABLE IF NOT EXISTS `lead_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_form_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `lead_form`
--

INSERT INTO `lead_form` (`id`, `web_form_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lead_form_lookup`
--

CREATE TABLE IF NOT EXISTS `lead_form_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `field` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `lead_form_lookup`
--

INSERT INTO `lead_form_lookup` (`id`, `lead_id`, `field`, `value`) VALUES
(1, 56, 'FirstName', ''),
(2, 56, 'Email', ''),
(3, 57, 'FirstName', 'asdfsdf'),
(4, 57, 'Email', 'test@test.com'),
(5, 58, 'FirstName', 'ghfhgfjhgf'),
(6, 58, 'Email', '32fhgfhf@gmail.com'),
(7, 59, 'FirstName', 'ytvjhgvjh'),
(8, 59, 'Email', 'fdhgdgf@gmail.com'),
(9, 60, 'FirstName', ''),
(10, 60, 'Email', ''),
(11, 61, 'FirstName', 'jvjcjcjc b c'),
(12, 61, 'Email', 'tgarner@envisio'),
(13, 62, 'FirstName', 'jvjcjcjc b c'),
(14, 62, 'Email', 'tgarner@envisio'),
(15, 63, 'FirstName', 'ytuytu'),
(16, 63, 'Email', 'jhgjhfj@gmail.com'),
(17, 64, 'FirstName', 'Craig'),
(18, 64, 'Email', 'Jacobson1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `url` text NOT NULL,
  `date_created` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `desc`, `url`, `date_created`, `active`, `group`) VALUES
(1, 1, 'Lead #56 Received from ', '', 'admin/leads/leads_list', '2016-05-06 11:22:12', 0, 'lead'),
(2, 1, 'Lead #56 Received from ', '', 'admin/leads/leads_list', '2016-05-06 11:22:12', 0, 'lead'),
(3, 1, 'Lead #56 Received from ', '', 'admin/leads/leads_list', '2016-05-06 11:22:12', 0, 'lead'),
(4, 1, 'Lead #57 Received from ', '', 'admin/leads/leads_list', '2016-05-06 11:22:20', 0, 'lead'),
(5, 1, 'Lead #57 Received from ', '', 'admin/leads/leads_list', '2016-05-06 11:22:20', 0, 'lead'),
(6, 1, 'Lead #57 Received from test@test.com', '', 'admin/leads/leads_list', '2016-05-06 11:22:20', 0, 'lead'),
(7, 1, 'Lead #58 Received from ', '', 'admin/leads/leads_list', '2016-06-12 05:29:34', 1, 'lead'),
(8, 1, 'Lead #58 Received from ', '', 'admin/leads/leads_list', '2016-06-12 05:29:34', 1, 'lead'),
(9, 1, 'Lead #58 Received from 32fhgfhf@gmail.com', '', 'admin/leads/leads_list', '2016-06-12 05:29:34', 1, 'lead'),
(10, 1, 'Lead #59 Received from ', '', 'admin/leads/leads_list', '2016-06-23 06:33:16', 1, 'lead'),
(11, 1, 'Lead #59 Received from ', '', 'admin/leads/leads_list', '2016-06-23 06:33:16', 1, 'lead'),
(12, 1, 'Lead #59 Received from fdhgdgf@gmail.com', '', 'admin/leads/leads_list', '2016-06-23 06:33:16', 1, 'lead'),
(13, 1, 'Lead #60 Received from ', '', 'admin/leads/leads_list', '2016-07-25 01:49:37', 1, 'lead'),
(14, 1, 'Lead #60 Received from ', '', 'admin/leads/leads_list', '2016-07-25 01:49:37', 1, 'lead'),
(15, 1, 'Lead #60 Received from ', '', 'admin/leads/leads_list', '2016-07-25 01:49:37', 1, 'lead'),
(16, 1, 'Lead #61 Received from ', '', 'admin/leads/leads_list', '2016-07-25 05:45:00', 1, 'lead'),
(17, 1, 'Lead #61 Received from ', '', 'admin/leads/leads_list', '2016-07-25 05:45:00', 1, 'lead'),
(18, 1, 'Lead #61 Received from tgarner@envisio', '', 'admin/leads/leads_list', '2016-07-25 05:45:00', 1, 'lead'),
(19, 1, 'Lead #62 Received from ', '', 'admin/leads/leads_list', '2016-07-25 05:45:00', 1, 'lead'),
(20, 1, 'Lead #62 Received from ', '', 'admin/leads/leads_list', '2016-07-25 05:45:00', 1, 'lead'),
(21, 1, 'Lead #62 Received from tgarner@envisio', '', 'admin/leads/leads_list', '2016-07-25 05:45:00', 1, 'lead'),
(22, 1, 'Lead #63 Received from ', '', 'admin/leads/leads_list', '2016-07-25 09:11:21', 1, 'lead'),
(23, 1, 'Lead #63 Received from ', '', 'admin/leads/leads_list', '2016-07-25 09:11:21', 1, 'lead'),
(24, 1, 'Lead #63 Received from jhgjhfj@gmail.com', '', 'admin/leads/leads_list', '2016-07-25 09:11:21', 1, 'lead'),
(25, 1, 'Lead #64 Received from ', '', 'admin/leads/leads_list', '2016-07-26 08:45:41', 1, 'lead'),
(26, 1, 'Lead #64 Received from ', '', 'admin/leads/leads_list', '2016-07-26 08:45:41', 1, 'lead'),
(27, 1, 'Lead #64 Received from Jacobson1@gmail.com', '', 'admin/leads/leads_list', '2016-07-26 08:45:41', 1, 'lead');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ordered_on` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `email`, `coupon_discount`, `subtotal`, `total`, `ordered_on`, `status`) VALUES
(1, 1, 'travis@mytiein.com', 0, 0, 39, '2014-04-15 21:43:38', 'Complete'),
(2, 2, 'tgarner@envisionyourwebsite.com', 0, 0, 29, '2014-04-16 19:54:07', 'Complete'),
(3, 7, 'travis2@mytiein.com', 0, 0, 39, '2014-04-16 21:57:40', 'Complete'),
(4, 8, 'travis3@mytiein.com', 0, 0, 39, '2014-04-17 13:02:26', 'Complete'),
(9, 15, 'craig@openspacesmarketing.com', 0, 0, 49, '2014-06-05 19:30:20', 'Complete'),
(10, 21, 'eschoultz@verizon.net', 0, 0, 49, '2016-03-25 12:30:25', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE IF NOT EXISTS `order_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` double NOT NULL,
  `form` text NOT NULL,
  `tag_category` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `merchant` text NOT NULL,
  `thank_url` text NOT NULL,
  `header_image` varchar(255) NOT NULL,
  `footer_image` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order_form`
--

INSERT INTO `order_form` (`id`, `user_id`, `name`, `desc`, `price`, `form`, `tag_category`, `tags`, `merchant`, `thank_url`, `header_image`, `footer_image`, `active`) VALUES
(1, 1, 'Order Form1', 'Order Form1', 0, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="First Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" placeholder="Last Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" placeholder="Company Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress1">Address-Line 1</label>\n  <div class="controls">\n    <input id="StreetAddress1" name="StreetAddress1" placeholder="Address-Line 1" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="City">City</label>\n  <div class="controls">\n    <input id="City" name="City" placeholder="City" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="State">State</label>\n  <div class="controls">\n    <input id="State" name="State" placeholder="State" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" placeholder="Zip Code" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Country">Country</label>\n  <div class="controls">\n    <input id="Country" name="Country" placeholder="Country" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" placeholder="Phone Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email AddressAddress" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number"><em>*</em> Credit Cart Number<p>The 16 digits on the front of your Credit card.</p></label>\n  <div class="controls">\n    <input id="card_number" name="card_number" placeholder="Cart Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month"><em>*</em>Expiration Date<p>The date your creadit card expires. Find this on the front of your credit card.</p></label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" placeholder="MM" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc"><em>*</em>Security code <span>(or ''CVC'' or ''CVV'')</span><p>The last 3 digits displayed on the back of your credit card.</p><small></small></label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" placeholder="CCV Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', '', '', '', '', '', '', 0),
(2, 1, 'Order Form2', 'Order Form2', 0, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="First Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" placeholder="Last Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" placeholder="Company Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress1">Address-Line 1</label>\n  <div class="controls">\n    <input id="StreetAddress1" name="StreetAddress1" placeholder="Address-Line 1" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="City">City</label>\n  <div class="controls">\n    <input id="City" name="City" placeholder="City" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="State">State</label>\n  <div class="controls">\n    <input id="State" name="State" placeholder="State" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" placeholder="Zip Code" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Country">Country</label>\n  <div class="controls">\n    <input id="Country" name="Country" placeholder="Country" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" placeholder="Phone Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email AddressAddress" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number"><em>*</em> Credit Cart Number<p>The 16 digits on the front of your Credit card.</p></label>\n  <div class="controls">\n    <input id="card_number" name="card_number" placeholder="Cart Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month"><em>*</em>Expiration Date<p>The date your creadit card expires. Find this on the front of your credit card.</p></label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" placeholder="MM" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc"><em>*</em>Security code <span>(or ''CVC'' or ''CVV'')</span><p>The last 3 digits displayed on the back of your credit card.</p><small></small></label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" placeholder="CCV Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', '', '', '', '', '', '', 0),
(3, 1, 'Test Order Form', 'Test Order Form description', 0, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="First Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" placeholder="Last Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" placeholder="Company Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress1">Address-Line 1</label>\n  <div class="controls">\n    <input id="StreetAddress1" name="StreetAddress1" placeholder="Address-Line 1" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="City">City</label>\n  <div class="controls">\n    <input id="City" name="City" placeholder="City" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="State">State</label>\n  <div class="controls">\n    <input id="State" name="State" placeholder="State" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" placeholder="Zip Code" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Country">Country</label>\n  <div class="controls">\n    <input id="Country" name="Country" placeholder="Country" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" placeholder="Phone Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email AddressAddress" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number"><em>*</em> Credit Cart Number<p>The 16 digits on the front of your Credit card.</p></label>\n  <div class="controls">\n    <input id="card_number" name="card_number" placeholder="Cart Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month"><em>*</em>Expiration Date<p>The date your creadit card expires. Find this on the front of your credit card.</p></label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" placeholder="MM" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc"><em>*</em>Security code <span>(or ''CVC'' or ''CVV'')</span><p>The last 3 digits displayed on the back of your credit card.</p><small></small></label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" placeholder="CCV Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', '', '', '', '', '', '', 0),
(4, 1, 'This is a new order form', 'order for to Awesome Page', 50, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" type="text" placeholder="First Name" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" type="text" placeholder="Last Name" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" type="text" placeholder="Company Name" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress1">Address-Line 1</label>\n  <div class="controls">\n    <input id="StreetAddress1" name="StreetAddress1" type="text" placeholder="Address-Line 1" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="City">City</label>\n  <div class="controls">\n    <input id="City" name="City" type="text" placeholder="City" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="State">State</label>\n  <div class="controls">\n    <input id="State" name="State" type="text" placeholder="State" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" type="text" placeholder="Zip Code" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Country">Country</label>\n  <div class="controls">\n    <input id="Country" name="Country" type="text" placeholder="Country" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" type="text" placeholder="Phone Number" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" type="text" placeholder="Email AddressAddress" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number"><em>*</em> Credit Cart Number<p>The 16 digits on the front of your Credit card.</p></label>\n  <div class="controls">\n    <input id="card_number" name="card_number" type="text" placeholder="Cart Number" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month"><em>*</em>Expiration Date<p>The date your creadit card expires. Find this on the front of your credit card.</p></label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" type="text" placeholder="MM" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" type="text" placeholder="YYYY" class="form-control">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc"><em>*</em>Security code <span>(or ''CVC'' or ''CVV'')</span><p>The last 3 digits displayed on the back of your credit card.</p><small></small></label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" type="text" placeholder="CCV Number" class="form-control">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', '', '', '{"stripe_name":"Test Account","stripe_secret_key":"sk_test_xrdFN1lBZiHAa4eKSTD59Zve","stripe_publishable_key":"pk_test_mZ60y9RzaZate6IbTPCMMLW8","currency":"doller","test_mode":"test","paymethod":"stripe"}', 'http://peoriawebdevelopment.com/salesquestion/cart/thankyou?Email={contact.Email}FirstName={contact.FirstName}LastName={contact.LastName}Howlonghaveyoubeeninbusiness={contact.Howlonghaveyoubeeninbusiness}', 'Screen Shot 2014-06-09 at 9.54.08 AM.png', 'footer_orderform.png', 0),
(5, 1, '', '', 0, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="First Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" placeholder="Last Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" placeholder="Company Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress1">Address-Line 1</label>\n  <div class="controls">\n    <input id="StreetAddress1" name="StreetAddress1" placeholder="Address-Line 1" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress2">Address-Line 2</label>\n  <div class="controls">\n    <input id="StreetAddress2" name="StreetAddress2" placeholder="Address-Line 2" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="City">City</label>\n  <div class="controls">\n    <input id="City" name="City" placeholder="City" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="State">State</label>\n  <div class="controls">\n    <input id="State" name="State" placeholder="State" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" placeholder="Zip Code" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Country">Country</label>\n  <div class="controls">\n    <input id="Country" name="Country" placeholder="Country" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" placeholder="Phone Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email AddressAddress" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Select Basic -->\n<div class="control-group">\n  <label fieldtype="Select Basic" class="control-label_no" for="cardType">Credit Card Type</label>\n  <div class="controls">\n    <select id="cardType" name="cardType" class="form-control">\n      <option value=",">American Express</option>\n      <option value=",">MasterCard</option>\n      <option value=",">Visa</option>\n    </select>\n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number">Cart Number</label>\n  <div class="controls">\n    <input id="card_number" name="card_number" placeholder="Cart Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc">CCV Number</label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" placeholder="CCV Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month">Expiration Month</label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" placeholder="MM" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="form-control" type="text">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', 'undefined', '', '', '', '', '', 0),
(6, 1, 'Selling Products Online', '3 Months unlimited access for free! Gain access to capturing leads, making sales and discovering more about your prospects or clients.', 15, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>You will not be charged anything by entering your information.</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="First Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" placeholder="Last Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" placeholder="Company Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" placeholder="Zip Code" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" placeholder="Phone Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Enter Email" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Select Basic -->\n<div class="control-group">\n  <label fieldtype="Select Basic" class="control-label_no" for="cardType">Credit Card Type</label>\n  <div class="controls">\n    <select id="cardType" name="cardType" class="form-control">\n      <option value=",">American Express</option>\n      <option value=",">MasterCard</option>\n      <option value=",">Visa</option>\n    </select>\n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number">Credit Card</label>\n  <div class="controls">\n    <input id="card_number" name="card_number" placeholder="Enter your 16 digits" class="form-control" required="" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc">CCV Number</label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" placeholder="Located on the back of your card" class="form-control" required="" type="text">\n    \n  </div>\n</div>\n\n<!-- Select Basic -->\n<div class="control-group">\n  <label fieldtype="Select Basic" class="control-label_no" for="FirstName">Expiration Month</label>\n  <div class="controls">\n    <select id="FirstName" name="FirstName" class="form-control">\n      <option value=",">01</option>\n      <option value="0,0">02</option>\n      <option value="0,0">03</option>\n      <option value="0,0">04</option>\n      <option value="0,0">05</option>\n    </select>\n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month">Expiration Month</label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" placeholder="MM ex 12" class="form-control" required="" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="form-control" required="" type="text">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', 'undefined', 'Customer Tags --> Customer', '{"stripe_name":"Stripe","stripe_secret_key":"pub_g576587657867657834","stripe_publishable_key":"pub_8769876987698769876","currency":"doller","test_mode":"test","paymethod":"stripe"}', '', 'selling_products2.png', '', 0),
(7, 1, '', '', 0, '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">First Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="First Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="LastName">Last Name</label>\n  <div class="controls">\n    <input id="LastName" name="LastName" placeholder="Last Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Company">Company Name</label>\n  <div class="controls">\n    <input id="Company" name="Company" placeholder="Company Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress1">Address-Line 1</label>\n  <div class="controls">\n    <input id="StreetAddress1" name="StreetAddress1" placeholder="Address-Line 1" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="StreetAddress2">Address-Line 2</label>\n  <div class="controls">\n    <input id="StreetAddress2" name="StreetAddress2" placeholder="Address-Line 2" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="City">City</label>\n  <div class="controls">\n    <input id="City" name="City" placeholder="City" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="State">State</label>\n  <div class="controls">\n    <input id="State" name="State" placeholder="State" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="PostalCode">Zip Code</label>\n  <div class="controls">\n    <input id="PostalCode" name="PostalCode" placeholder="Zip Code" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Country">Country</label>\n  <div class="controls">\n    <input id="Country" name="Country" placeholder="Country" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Phone1">Phone Number</label>\n  <div class="controls">\n    <input id="Phone1" name="Phone1" placeholder="Phone Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email Address</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email AddressAddress" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Select Basic -->\n<div class="control-group">\n  <label fieldtype="Select Basic" class="control-label_no" for="cardType">Credit Card Type</label>\n  <div class="controls">\n    <select id="cardType" name="cardType" class="form-control">\n      <option value=",">American Express</option>\n      <option value=",">MasterCard</option>\n      <option value=",">Visa</option>\n    </select>\n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_number">Cart Number</label>\n  <div class="controls">\n    <input id="card_number" name="card_number" placeholder="Cart Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_cvc">CCV Number</label>\n  <div class="controls">\n    <input id="card_cvc" name="card_cvc" placeholder="CCV Number" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_month">Expiration Month</label>\n  <div class="controls">\n    <input id="card_expiry_month" name="card_expiry_month" placeholder="MM" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="card_expiry_year">Expiration Year</label>\n  <div class="controls">\n    <input id="card_expiry_year" name="card_expiry_year" placeholder="YYYY" class="form-control" type="text">\n    \n  </div>\n</div>\n\n</fieldset>\n</form>\n', 'undefined', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE IF NOT EXISTS `pricing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `featured` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `name`, `price`, `duration`, `desc`, `featured`) VALUES
(1, 'Basic', 29, 'month', 'Quiz YES\nLead Form NO\nOrder Form NO\nSecurity YES\nSupport YES', 0),
(2, 'Standard', 39, 'month', 'Quiz YES\nLead Form YES\nOrder Form NO\nSecurity YES\nSupport YES', 1),
(3, 'Advanced', 49, 'month', 'Quiz YES\nLead Form YES\nOrder Form YES\nSecurity YES\nSupport YES', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `user_id`, `first_name`, `last_name`, `email`, `cat_id`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `phone`, `company`, `created_date`, `amount`, `status`) VALUES
(1, 0, 'testusername', 'testlastname', 'testuser@testuser.com', 1, 'add1', '', 'city', 'state', 'zip', 'country', 'phone', 'testcompany', '2014-05-29 03:58:00', 50, 'paid'),
(2, 0, 'testuser2', 'testuser2', 'testuser2@gmail.com', 1, 'add', '', 'city', 'state', 'zip', 'country', '9976659085', 'company', '2014-05-29 04:05:18', 50, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` text NOT NULL,
  `options` text NOT NULL,
  `answer` tinyint(4) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `node_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questions`, `options`, `answer`, `cat_id`, `node_id`) VALUES
(1, 'Preference', 'I like to receive notes of affirmation,I like to be hugged.', 1, 1, '3'),
(2, 'Preference', 'I like to spend one-to-one time with a person who is special to me,I feel loved when someone gives practical help to me', 1, 1, '3'),
(3, 'Preference', 'I like it when people give me gifts,I like leisurely visits with friends and loved ones', 1, 1, '3'),
(4, 'Preference', 'I feel loved when people do things to help me.,I feel loved when people touch me.', 1, 1, '3'),
(5, 'Preference', 'I feel loved when someone I love or admire puts his or her arm around me.,I feel loved when I receive a gift from someone I love or admire.', 1, 1, '3'),
(6, 'Preference6', 'I would love to get a funny email from my husband,I wish my husband would hug me more', 1, 1, '2'),
(7, 'Preference', 'I like to be alone with my husband,I wish sometime my husband would take my car to be washed, or do some other act of service without being asked', 1, 1, '2'),
(8, 'Preference', 'I would love for my husband to bring me a special gift, no occasion needed,I enjoy long trips with my husband.', 1, 1, '2'),
(9, 'Preference9', 'Ques9 Option1,Ques9 Option2', 1, 1, '2'),
(10, 'Preference', 'I would like my husband to put his arm around me sometimes when we are in public,I wish my husband would bring me gifts when he travels', 1, 1, '2'),
(11, 'Preference', 'Give me a hug!,You are terrific!', 1, 1, '5'),
(12, 'Preference12', 'Let''s go to a movie,Give me a high-five!', 1, 1, '5'),
(13, 'New quiz with user wise', 'New quiz with user wise,New quiz with user wise', 1, 1, '6'),
(14, 'New quiz with user wise', 'New quiz with user wise,New quiz with user wise', 1, 1, '6'),
(15, 'Do you have a CRM?', 'Yes,No', 1, 10, '7'),
(16, 'test', 'testing,testingw', 1, 10, '8'),
(17, '', ',', 1, 10, '0'),
(18, 'Preference1', 'I like to spend one-to-one time with a person who is special to me,I feel loved when someone gives practical help to me', 1, 11, '10'),
(19, 'Preference2', 'I like it when people give me gifts,I like leisurely visits with friends and loved ones', 2, 11, '10'),
(20, 'Preference3', 'I like to receive notes of affirmation,I like to be hugged.', 1, 11, '11'),
(21, 'Preference4', 'I feel loved when people do things to help me.,I feel loved when people touch me.', 1, 11, '11'),
(22, 'Preference5', 'Let''s go to a movie,Give me a high-five!', 2, 11, '13'),
(23, 'Preference6', 'Give me a hug!,You are terrific!', 1, 12, '14'),
(24, 'Do you have a CRM?', 'Yes,No', 1, 16, '15'),
(25, 'test', 'yes,no', 1, 16, '16'),
(26, 'ques1', 'ans1,ans1', 1, 21, '17'),
(27, 'asD', 'asd,aSD', 1, 22, '0'),
(28, '', ',', 1, 22, '0'),
(29, 'AsdasD', 'asd,asD', 1, 22, '0'),
(30, 'ASDFASF', 'ASDF,ASFD', 1, 22, '19'),
(31, 'ASDF', 'ASDFAS,ASDF', 1, 23, '19'),
(32, 'ASDFA', 'ASDFASDF,ASDFA', 1, 22, '0'),
(33, 'SFDFFFFFF', 'FFFF,FF', 1, 22, '19'),
(34, 'aasdfasdfasdf asdfasdf asdfasd fasdfa', 'adfsadf,asdfasdfas', 1, 27, '23'),
(35, '', ',', 1, 25, '0'),
(36, '', ',', 1, 25, '0'),
(37, '', ',', 1, 25, '0'),
(38, '', ',', 1, 25, '0'),
(39, '', ',', 1, 25, '0'),
(40, 'asdfasdf', 'asdfasd,asdfasd', 1, 26, '30'),
(41, 'hjgjhfhgkj', 'gkjhgkh,jghkjhgjh', 1, 25, '31'),
(42, 'Tell me what is missing in your business', 'I need more revenue to build the business,I have the revenue just looking how to double it', 1, 29, '33'),
(43, 'Do you enjoy your job?', 'Yes,No', 1, 29, '36'),
(44, 'Select the best answer', 'I gain more leads from my website,I receive more business from personal relationships', 1, 31, '34');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `url` text NOT NULL,
  `res_top` text NOT NULL,
  `res_bot` text NOT NULL,
  `shared_text` text NOT NULL,
  `webform_id` text NOT NULL,
  `theme` varchar(255) NOT NULL,
  `webform_pos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `user_id`, `name`, `desc`, `url`, `res_top`, `res_bot`, `shared_text`, `webform_id`, `theme`, `webform_pos`) VALUES
(1, 1, 'DISCOVER YOUR LOVE LANGUAGE', 'The Love Language Profile for Singles will give you a thorough analysis of your emotional', '0', '', '', 'Share your love.', '1', 'lavender', 'question7'),
(2, 1, 'Demo Buy Quench', 'By telling us what you need to can cut to the chase and focus on a solution.', '2e9da94bf08a3536e2c82e67472db0b3e', 'Thank you for taking the time to demo BuyQuench. Before you leave us, don''t forget to click on one of the social media icons. This way you can experience how prospects can become a great viral lead source.', '', 'I just discovered something incredible! You can see it here for yourself ', 'undefined', 'lavender', 'undefined'),
(3, 15, 'DISCOVER YOUR LOVE LANGUAGE', 'The Love Language Profile for Singles will give you a thorough analysis of your emotional', '3e0823d6cd15c024d9befd2fea4259dcb', '', '', 'Share your love.', 'undefined', 'lavender', 'undefined'),
(4, 15, 'Quiz2', 'Quiz2', '4f4f7d984681e43d79dc99e96eaa23f9f', 'Quiz2', 'Quiz2', 'Quiz2', 'undefined', 'lavender', 'undefined'),
(5, 15, 'Open Spaces Marketing Qualification Quiz', 'Open Spaces Marketing Qualification Quiz', '', 'Top of results page', 'Bottom of results page', 'Share text here', '', '', ''),
(6, 1, 'Quiz', 'Quiz', '69a72e93b0e2337bd850f74874c1c3445', 'Quiz', 'Quiz', 'Quiz', 'undefined', 'lavender', 'undefined'),
(7, 1, 'asdf', 'asdf', '7b94d74129c628bebaa195eb638c9d2ce', 'asdf', 'sadf', 'asf', '1', 'lavender', 'node1'),
(8, 2, 'Quench Demo', 'This is a live demo. What better way then to show you first hand how the system works.', '', 'Thank you for taking the time to go through our live demo.', 'This is the bottom content area', 'I just finished a demo @  ', '', '', ''),
(9, 1, 'casdc', 'asdfasdf', '9b055648c5aedebda4b408fec2136013d', 'asdf', 'asdf', 'asdfasd', '1', 'gray', 'node1'),
(10, 1, 'Demo Buy Quench', '', '100c484214fbae0aae7983e0ab517efdfb', 'Thank you for taking the time to demo BuyQuench. Before you leave us, don''t forget to click on one of the social media icons. This way you can experience how prospects can become a great viral lead source.', '', 'I just discovered something incredible for my business. Give it a try and see for yourself! ', '1', 'gray', 'question3');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `title`, `quiz_id`, `parent_id`) VALUES
(1, 'Choose your option', '', 1, 0),
(2, '[["Child"],["Age 9-12","Teen","Age above 30","Age above 40"]]', '', 1, 0),
(7, '[["married"],["Have Children","Not have Children"]]', '', 0, 0),
(8, '[["Not married"]]', '', 0, 0),
(22, 'Choose your marital status', '', 1, 0),
(23, 'Select your children Age', '', 1, 0),
(24, 'Have you ever had API development done for you before?', '', 2, 0),
(25, 'Choose your option?', '', 3, 0),
(26, 'Choose your marital status?', '', 3, 0),
(27, 'Choose your children Age?', '', 3, 0),
(28, 'Have you ever had API development done for you before?', '', 4, 0),
(29, '', '', 5, 0),
(30, 'Quiz', '', 6, 0),
(31, 'ASDFASDF', '', 7, 0),
(32, 'fdfsdf', '', 9, 0),
(33, 'asdfasdfa', '', 9, 0),
(34, 'asdfasd', '', 9, 0),
(35, 'asdfasd', '', 9, 0),
(36, 'Do you run a business?', '', 10, 0),
(37, 'Do you have employees?', '', 10, 0),
(38, 'Are you researching for a business you  work for?', '', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags_lookup`
--

CREATE TABLE IF NOT EXISTS `tags_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tags_lookup`
--

INSERT INTO `tags_lookup` (`id`, `name`, `parent_id`, `tag_id`) VALUES
(1, 'Myself', 0, 1),
(2, 'Married', 1, 22),
(3, 'Not Married', 1, 22),
(4, 'Child', 0, 1),
(5, 'Above 10', 4, 23),
(6, 'Below 10', 4, 23),
(7, 'Yes', 0, 24),
(8, 'No', 0, 24),
(9, 'Myself', 0, 25),
(10, 'Married', 9, 26),
(11, 'Not Married', 9, 26),
(12, 'Child', 0, 25),
(13, 'Above 10', 12, 27),
(14, 'Below 10', 12, 27),
(15, 'Yes', 0, 28),
(16, 'No', 0, 28),
(17, 'Quiz', 0, 30),
(18, 'Quiz', 0, 30),
(32, 'Yes ', 0, 36),
(33, 'Yes', 32, 37),
(34, 'No', 32, 37),
(35, 'No', 0, 36),
(36, 'Yes', 35, 38),
(37, 'No', 35, 38);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `verify_link` varchar(255) NOT NULL,
  `api_key` text NOT NULL,
  `is_app_name` varchar(255) NOT NULL,
  `is_app_key` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `active`, `verify_link`, `api_key`, `is_app_name`, `is_app_key`, `is_admin`, `plan`, `discount`, `amount`, `company_name`, `address_line1`, `address_line2`, `city`, `state`, `zip_code`, `country`) VALUES
(1, 'travis', 'travis', 'travis@buyquench.com', '78779798', '7d5430dd0eeededd6edfa5eb13fcad44', 0, '743926c07a6da5bba3896c5450fae699', '12345678910111213141516', 'http://mm255.infusionsoft.com', '438061cc62e327735c47cc8d7218ee50', 1, 3, 0, 0, '', '', '', '', '', '', ''),
(15, 'craig', 'openspacesmarketing', 'craig@openspacesmarketing.com', '9944767577', '95cc2a61b99c85827a1119091c3ffd1e', 1, '2717791ce5a7dd24ed1872d79df90c36', '12345678910111213141516', 'http://hi105.infusionsoft.com', '8555e8633f9ed2610cbc3399b56bbc968d9415da64678d4550ac48111a24fe88', 0, 3, 0, 49, '', '', '', '', '', '', ''),
(21, 'Elizabeth', 'Schoultz', 'eschoultz@verizon.net', '9175797921', '7d5430dd0eeededd6edfa5eb13fcad44', 0, '', '', 'http://zp204.infusionsoft.com', '260eb0d2489d52727788fe51e2d015b2', 0, 3, 0, 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_form`
--

CREATE TABLE IF NOT EXISTS `web_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `form` text NOT NULL,
  `tag_category` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `web_form`
--

INSERT INTO `web_form` (`id`, `user_id`, `name`, `desc`, `form`, `tag_category`, `tags`, `icon`, `active`) VALUES
(1, 1, 'Web form', 'Web form description', '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Button -->\n<div class="control-group tags_button">\n  <label fieldtype="Single Button" class="control-label_no" for="button"></label>\n  <div class="controls">\n    <button id="button" name="button" class="btn btn-primary" value="Submit">Submit</button>\n  </div>\n</div>\n\n</fieldset>\n</form>\n', '', '', 'icon11.png', 0),
(2, 1, 'rewr', 'rewr', '<form class="form-horizontal">\n<fieldset>\n\n<!-- Form Name -->\n<legend>Form Name</legend>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="FirstName">Name</label>\n  <div class="controls">\n    <input id="FirstName" name="FirstName" placeholder="Name" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Text input-->\n<div class="control-group">\n  <label fieldtype="Text input" class="control-label_no" for="Email">Email</label>\n  <div class="controls">\n    <input id="Email" name="Email" placeholder="Email" class="form-control" type="text">\n    \n  </div>\n</div>\n\n<!-- Button -->\n<div class="control-group tags_button">\n  <label fieldtype="Single Button" class="control-label_no" for="button"></label>\n  <div class="controls">\n    <button id="button" name="button" class="btn btn-primary" value="Submit">Submit</button>\n  </div>\n</div>\n\n</fieldset>\n</form>\n', '', 'Networking Next Day Followup', 'icon1.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
