-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2018 at 10:42 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

ALTER TABLE `trans_quotation` ADD `is_delete` INT(6) NOT NULL AFTER `created_at`, ADD `is_read` INT(6) NOT NULL AFTER `is_delete`;

ALTER TABLE `trans_quotation` CHANGE `labour_id` `labour` INT(11) NOT NULL;

ALTER TABLE `trans_quotation` ADD `updated_at` DATETIME NOT NULL AFTER `created_at`;

ALTER TABLE `trans_quotation` ADD `pricing_id` INT(11) NOT NULL AFTER `shifting_date`;

ALTER TABLE `trans_quotation` ADD `starting_location` VARCHAR(255) NOT NULL AFTER `mobile_no`;

ALTER TABLE `trans_quotation` ADD `delivery_location` VARCHAR(255) NOT NULL AFTER `starting_pincode`;   

--
-- Table structure for table `trans_quotation_pricing`
--

CREATE TABLE `trans_quotation_pricing` (
  `id` bigint(11) NOT NULL,
  `quotation_id` bigint(11) NOT NULL,
  `products_total_amount` float(11,2) NOT NULL,
  `distance_amount` float(11,2) NOT NULL,
  `vehicle_amount` float(11,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_amount` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_quotation_pricing`
--
ALTER TABLE `trans_quotation_pricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_pricing_id` (`quotation_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_quotation_pricing`
--
ALTER TABLE `trans_quotation_pricing`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_quotation_pricing`
--
ALTER TABLE `trans_quotation_pricing`
  ADD CONSTRAINT `fk_quotation_id` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE CASCADE;

-- If required
-- ALTER TABLE `trans_quotation_pricing` ADD FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;


--
-- Table structure for table `trans_enquiry`
--

CREATE TABLE `trans_enquiry` (
  `id` bigint(11) NOT NULL,
  `quotation_id` bigint(11) NOT NULL,
  `is_read` int(2) NOT NULL,
  `is_delete` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_enquiry`
--
ALTER TABLE `trans_enquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_id` (`quotation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_enquiry`
--
ALTER TABLE `trans_enquiry`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_enquiry`
--
ALTER TABLE `trans_enquiry`
  ADD CONSTRAINT `fk_quotation_id` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE NO ACTION;


--
-- Table structure for table `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `quotation_id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `status` int(3) NOT NULL COMMENT '1=Pending,2=completed',
  `total_amount` float(11,3) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `is_read` int(2) NOT NULL,
  `is_delete` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_quotation_id` (`quotation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD CONSTRAINT `fk_quotation_id_order` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `trans_user_login` (`user_id`);


--
-- Table structure for table `trans_invoice`
--

CREATE TABLE `trans_invoice` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `is_read` int(2) NOT NULL,
  `is_delete` int(2) NOT NULL,
  `is_sent` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_invoice`
--
ALTER TABLE `trans_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_invoice`
--
ALTER TABLE `trans_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_invoice`
--
ALTER TABLE `trans_invoice`
  ADD CONSTRAINT `fk_order_id_invoice` FOREIGN KEY (`order_id`) REFERENCES `trans_order` (`id`);


--
-- Table structure for table `trans_product_list`
--

CREATE TABLE `trans_product_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_product_list`
--
ALTER TABLE `trans_product_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_product_list`
--
ALTER TABLE `trans_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `trans_vehicle_services` ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `status`

ALTER TABLE `trans_vehicle_services` ADD `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_at`

ALTER TABLE `trans_user_login` ADD `status` INT(2) NOT NULL AFTER `image`; 

ALTER TABLE `trans_user_login` ADD `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `create_date`; 

ALTER TABLE `trans_invoice` ADD `invoice_no` VARCHAR(255) NOT NULL AFTER `order_id`;


--
-- Table structure for table `trans_quotation_has_product`
--

CREATE TABLE `trans_quotation_has_product` (
  `id` bigint(11) NOT NULL,
  `quotation_id` bigint(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_quotation_has_product`
--
ALTER TABLE `trans_quotation_has_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_id` (`quotation_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_quotation_has_product`
--
ALTER TABLE `trans_quotation_has_product`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_quotation_has_product`
--
ALTER TABLE `trans_quotation_has_product`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `trans_product_list` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quotation_id` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


ALTER TABLE `trans_quotation` CHANGE `mobile_no` `mobile_no` BIGINT(12) NOT NULL;

ALTER TABLE `trans_enquiry` ADD `user_id` INT(11) NOT NULL AFTER `quotation_id`, ADD INDEX `fk_user_id` (`user_id`);

ALTER TABLE `trans_invoice` ADD `user_id` INT(11) NOT NULL AFTER `order_id`, ADD INDEX `fk_user_id` (`user_id`);

ALTER TABLE `trans_quotation` ADD `quotation_no` VARCHAR(255) NOT NULL AFTER `mobile_no`;

ALTER TABLE `trans_quotation` ADD `is_send_user` INT(3) NOT NULL AFTER `is_read`;

ALTER TABLE `trans_quotation` ADD `is_order` INT(2) NOT NULL AFTER `is_send_user`;

ALTER TABLE `trans_order` CHANGE `status` `status` INT(3) NOT NULL COMMENT '1=Pending,2=Completed,3=Cancelled';

ALTER TABLE `trans_order` CHANGE `total_amount` `total_amount` FLOAT(11,2) NOT NULL;

ALTER TABLE `trans_quotation` ADD `time_slots_id` INT(5) NOT NULL AFTER `vehicle_shifting`;

--
-- Table structure for table `trans_time_slots`
--

CREATE TABLE `trans_time_slots` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_time_slots`
--

INSERT INTO `trans_time_slots` (`id`, `time`, `created_at`, `updated_at`) VALUES
(1, '9-10', '2018-10-26 11:00:34', '2018-10-26 11:00:34'),
(2, '10-11', '2018-10-26 11:00:34', '2018-10-26 11:00:34'),
(3, '11-12', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(4, '12-13', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(5, '13-14', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(6, '14-15', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(7, '15-16', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(8, '16-17', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(9, '17-18', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(10, '18-19', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(11, '19-20', '2018-10-26 11:01:54', '2018-10-26 11:01:54'),
(12, '20-21', '2018-10-26 11:01:54', '2018-10-26 11:01:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_time_slots`
--
ALTER TABLE `trans_time_slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_time_slots`
--
ALTER TABLE `trans_time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


--
-- Table structure for table `trans_cms_page`
--

CREATE TABLE `trans_cms_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `slider1` varchar(255) NOT NULL,
  `slider2` varchar(255) NOT NULL,
  `slider3` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_cms_page`
--
ALTER TABLE `trans_cms_page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_cms_page`
--
ALTER TABLE `trans_cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- Table structure for table `trans_home_slider`
--

CREATE TABLE `trans_home_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `status` int(3) NOT NULL COMMENT '1=Not Active, 2=Acitve',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_home_slider`
--
ALTER TABLE `trans_home_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_home_slider`
--
ALTER TABLE `trans_home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `trans_cms_page` ADD `status` INT(3) NOT NULL COMMENT '1=Not Active, 2=Active' AFTER `meta_keyword`;

ALTER TABLE `trans_user_login` ADD `fullname` VARCHAR(255) NOT NULL AFTER `user_id`;

ALTER TABLE `trans_user_login` ADD `role` INT(3) NOT NULL COMMENT '1=User, 2=Vendor' AFTER `password`;

--
-- Table structure for table `trans_vendor`
--

CREATE TABLE `trans_vendor` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address proof` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_license_no` varchar(150) NOT NULL,
  `driver_contact` bigint(12) NOT NULL,
  `driver_adhar_no` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_vendor`
--
ALTER TABLE `trans_vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_vendor`
--
ALTER TABLE `trans_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_vendor`
--
ALTER TABLE `trans_vendor`
  ADD CONSTRAINT `fk_uid_id` FOREIGN KEY (`uid`) REFERENCES `trans_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

