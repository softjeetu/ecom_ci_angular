-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 04:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordermanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `name`, `about`) VALUES
(1, 'admin@gmail.com', '1234', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `about`) VALUES
(1, 'Games', 'Games'),
(2, 'Movies', 'Movies'),
(3, 'Electronics', 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `email`, `password`, `name`, `creation_date`, `phone`) VALUES
(1, 'jitednra@gmail.com', '123456', 'Jitendra Kumar', '2014-12-12', '05221234567'),
(2, 'jay@dev.com', '123456', 'jitendra', '2019-12-01', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`) VALUES
(1, 'login', 'login'),
(2, 'account_type', 'account type'),
(3, 'admin', 'admin'),
(4, 'client', 'User'),
(5, 'email', 'email'),
(6, 'password', 'password'),
(7, 'forgot_password ?', 'forgot password ?'),
(8, 'reset_password', 'reset password'),
(12, 'reset', 'reset'),
(13, 'admin_dashboard', 'admin dashboard'),
(14, 'account', 'account'),
(15, 'profile', 'profile'),
(16, 'change_password', 'change password'),
(17, 'logout', 'logout'),
(18, 'panel', 'panel'),
(19, 'dashboard_help', 'dashboard help'),
(20, 'dashboard', 'dashboard'),
(21, 'bed_ward_help', 'bed ward help'),
(22, 'clients', 'Users'),
(23, 'group_details', 'group details'),
(24, 'group', 'group'),
(25, 'client_details', 'User details'),
(26, 'all_clients', 'All Users'),
(27, 'products', 'products'),
(28, 'category_details', 'category details'),
(29, 'category', 'category'),
(30, 'type_details', 'type details'),
(31, 'type', 'type'),
(32, 'product_details', 'product details'),
(33, 'product', 'product'),
(34, 'orders', 'orders'),
(35, 'order_details', 'order details'),
(36, 'all_orders', 'all orders'),
(37, 'invoice_details', 'invoice details'),
(38, 'all_invoices', 'all invoices'),
(39, 'transaction_details', 'transaction details'),
(40, 'transaction', 'transaction'),
(41, 'message_details', 'message details'),
(42, 'message', 'message'),
(43, 'system_settings', 'system settings'),
(44, 'profile_help', 'profile help'),
(45, 'manage_category', 'manage category'),
(46, 'manage_client', 'Manage User'),
(47, 'manage_group', 'manage group'),
(48, 'manage_invoice', 'manage invoice'),
(49, 'manage_message', 'manage message'),
(50, 'manage_order', 'manage order'),
(51, 'manage_product', 'manage product'),
(52, 'manage_transaction', 'manage transaction'),
(53, 'manage_type', 'manage type'),
(54, 'settings', 'settings'),
(55, 'system_name', 'system name'),
(56, 'save', 'save'),
(57, 'system_title', 'system title'),
(58, 'address', 'address'),
(59, 'phone', 'phone'),
(60, 'system_email', 'system email'),
(61, 'settings_updated', 'settings updated'),
(62, 'manage_profile', 'manage profile'),
(63, 'update_profile', 'update profile'),
(64, 'new_password', 'new password'),
(65, 'confirm_new_password', 'confirm new password'),
(66, 'update_password', 'update password'),
(67, 'group_list', 'group list'),
(68, 'add_group', 'add group'),
(69, 'name', 'name'),
(70, 'about', 'about'),
(71, 'options', 'options'),
(72, 'edit', 'edit'),
(73, 'delete', 'delete'),
(74, 'edit_group', 'edit group'),
(75, 'client_list', 'User List'),
(76, 'add_client', 'Add User'),
(77, 'creation_date', 'creation date'),
(78, 'account_balance', 'account balance'),
(79, 'confirm password', 'confirm password'),
(80, 'store', 'store'),
(81, 'select a group', 'select a group'),
(82, 'edit_client', 'Edit User'),
(83, 'category_list', 'category list'),
(84, 'add_category', 'add category'),
(85, 'edit_category', 'edit category'),
(86, 'type_list', 'type list'),
(87, 'add_type', 'add type'),
(88, 'product_list', 'product list'),
(89, 'add_product', 'add product'),
(90, 'available quantity', 'available quantity'),
(91, 'price_per_unit', 'price per unit'),
(92, 'select a category', 'select a category'),
(93, 'select a type', 'select a type'),
(94, 'description', 'description'),
(95, 'intial quantity', 'intial quantity'),
(96, 'quantity_unit', 'quantity unit'),
(97, 'price_per_unit ($)', 'price per unit ($)'),
(98, 'quantity', 'quantity'),
(99, 'price', 'price'),
(100, 'detail', 'detail'),
(101, 'edit_product', 'edit product'),
(102, 'order_list', 'order list'),
(103, 'add_order', 'add order'),
(104, 'order', 'order'),
(105, 'rate', 'rate'),
(106, 'total_price', 'total price'),
(107, 'date', 'date'),
(108, 'status', 'status'),
(109, 'select a Client', 'Select a user'),
(110, 'select a product', 'select a product'),
(111, 'total_price ($)', 'total price ($)'),
(112, 'pending', 'pending'),
(113, 'approved', 'approved'),
(114, 'cancelled', 'cancelled'),
(115, 'select a client', 'select a user'),
(116, 'edit_order', 'edit order'),
(117, 'transaction_list', 'transaction list'),
(118, 'add_transaction', 'add transaction'),
(119, 'summery', 'summery'),
(120, 'amount', 'amount'),
(121, 'view', 'view'),
(122, 'expense', 'expense'),
(123, 'income', 'income'),
(124, 'total income', 'total income'),
(125, 'total expense', 'total expense'),
(126, 'balance', 'balance'),
(127, 'invoice_list', 'invoice list'),
(128, 'add_invoice', 'add invoice'),
(129, 'invoice', 'invoice'),
(130, 'invoice title', 'invoice title'),
(131, 'order details', 'order details'),
(132, 'note', 'note'),
(133, 'view invoice', 'view invoice'),
(134, 'Invoice title', 'Invoice title'),
(136, 'select an approved order', 'select an approved order'),
(137, 'unpaid', 'unpaid'),
(138, 'paid', 'paid'),
(139, 'Invoice title', 'Invoice title'),
(141, 'Invoice title', 'Invoice title'),
(143, 'payment_to', 'payment to'),
(144, 'bill_to', 'bill to'),
(145, 'invoice_title', 'invoice title'),
(146, 'invoice_id', 'invoice id'),
(148, 'edit_invoice', 'edit invoice'),
(154, 'select a client', 'select a user'),
(155, 'Invoice title', 'Invoice title'),
(160, 'Invoice title', 'Invoice title'),
(163, 'edit_transaction', 'edit transaction'),
(164, 'message_list', 'message list'),
(165, 'add_message', 'add message'),
(166, 'sender', 'sender'),
(167, 'receiver', 'receiver'),
(168, 'subject', 'subject'),
(169, 'time', 'time'),
(170, 'you', 'you'),
(171, 'reply', 'reply'),
(172, 'to', 'to'),
(173, 'select a receiver', 'select a receiver'),
(174, 'body', 'body'),
(175, 'sender_type', 'sender type'),
(176, 'receiver_type', 'receiver type'),
(177, 'edit_message', 'edit message'),
(178, 'reply_message', 'reply message'),
(179, 'Invoice title', 'Invoice title'),
(180, 'select a client', 'select a client'),
(181, 'summary', 'summary'),
(182, 'Invoice title', 'Invoice title'),
(183, 'select a client', 'select a client'),
(184, 'client_dashboard', 'client dashboard'),
(185, 'product category', 'product category'),
(186, 'pay', 'pay'),
(187, 'account_updated', 'account updated'),
(188, 'manage_language', 'manage language'),
(189, 'phrase_list', 'phrase list'),
(190, 'add_phrase', 'add phrase'),
(191, 'add_language', 'add language'),
(192, 'language', 'language'),
(193, 'option', 'option'),
(194, 'edit_phrase', 'edit phrase'),
(195, 'phrase', 'phrase'),
(196, 'update_phrase', 'update phrase'),
(210, 'delete_language', 'Delete Language'),
(211, 'login_failed', 'login failed');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `client` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rate` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity_unit` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category`, `name`, `description`, `creation_date`, `quantity`, `quantity_unit`, `price`) VALUES
(1, '3', 'Mouse', 'Optical Mouse wired', '2019-12-18', '0', '1000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Web Programming Test v2'),
(2, 'system_title', 'Web Programming Test v2'),
(3, 'address', 'Dalanwala Deharadun'),
(4, 'phone', '9648734414'),
(6, 'system_email', 'order@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order` longtext COLLATE utf8_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
