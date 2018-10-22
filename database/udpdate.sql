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