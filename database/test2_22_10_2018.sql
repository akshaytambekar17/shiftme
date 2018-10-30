-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 10:01 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `trans_aboutus`
--

CREATE TABLE `trans_aboutus` (
  `about_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `about_details` text NOT NULL,
  `easy_booking` text NOT NULL,
  `low_cost_shifting` text NOT NULL,
  `door_to_door` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_aboutus`
--

INSERT INTO `trans_aboutus` (`about_id`, `title`, `about_details`, `easy_booking`, `low_cost_shifting`, `door_to_door`, `status`) VALUES
(1, 'COMPANY AT A GLANCE', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Shiftme is a one of its kind which seeks to build customer-centric services and dedicated to provide best of services to its cutomers. We offer customized logistics solutions for individuals and enterprises to suit their requirements. We have different sized vehicles from Tata ace, Piaggio Ape, Pick-up, Tata 407, Mahindra Champion, Eicher&nbsp; 14 feet, 17 feet and 19 feet trucks and many more as per the requirements of our customers with a standardized and economical pricing. Our customers do not need to haggle for the rates with the drivers anymore.</p>\r\n<p>Shiftme offer specialized Packing services to make your shifting as easy and hassle-free as possible. We have well trained and experienced professionals for packing and moving the valuables for both individuals and corporate.</p>\r\n<p>Shiftme is always looking for ways to improve our ability to meet the needs of our individual and corporate customers. We have specialized equipments and a team of dedicated professionals who are committed to excellence in customer service. Our motto is to satisfy our customers through our work.</p>', '<p>Booking your order is on your finger tips. Just click on <strong>Shiftme.in</strong>&nbsp;or give us a call on <strong>+91 96896-22000</strong>.</p>', '<p>No more wastage of Time &amp; money. We are providing packing and shifting services at the customized rates as per your requirements.</p>', '<p>Now you don&rsquo;t need to go anywhere, we are just a click/call away. We will be at your doorstep with our professionals to provide best services.</p>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_admin_menu`
--

CREATE TABLE `trans_admin_menu` (
  `id` int(11) NOT NULL COMMENT 'Admin menus',
  `name` varchar(255) DEFAULT NULL COMMENT 'menuname',
  `url` text COMMENT 'menu url',
  `icon` varchar(100) DEFAULT NULL COMMENT 'menu icon',
  `parent_id` int(11) DEFAULT NULL COMMENT 'menu parent id',
  `create_date` datetime DEFAULT NULL COMMENT 'create date',
  `created_by` int(11) DEFAULT NULL COMMENT 'created by',
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'time stamp',
  `status` enum('Active','Deactive') DEFAULT NULL COMMENT 'status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_admin_menu`
--

INSERT INTO `trans_admin_menu` (`id`, `name`, `url`, `icon`, `parent_id`, `create_date`, `created_by`, `modify_date`, `status`) VALUES
(2, 'Settings', 'admin/', 'fa fa-cog', 0, '2016-09-05 04:59:16', 1, '2016-12-15 08:48:59', 'Active'),
(3, 'Services', 'admin/services', 'fa fa-thumb-tack', 2, '2016-12-15 02:18:48', 1, '2016-12-15 08:48:48', 'Active'),
(5, 'Shifting', 'admin/shiftingServices', 'fa fa-truck', 0, '2016-12-16 10:14:19', 1, '2016-12-16 05:19:41', 'Active'),
(8, 'Labour', 'admin/labourServices', 'fa fa-male', 0, '2016-12-16 02:39:27', 1, '2016-12-16 09:10:08', 'Active'),
(9, 'Vehicle Services', 'admin/vehicleServices', 'fa fa-truck', 0, '2016-12-16 03:10:33', 1, '2016-12-20 04:37:02', 'Active'),
(10, 'Enquiry', 'admin/enquiry', 'fa fa-thumb-tack', 2, '2016-12-17 12:48:34', 1, '2016-12-17 07:18:34', 'Active'),
(11, 'Testimonials', 'admin/testimonials', 'fa fa-thumb-tack', 0, '2016-12-19 12:49:48', 1, '2016-12-19 07:19:48', 'Active'),
(12, 'User Emails', 'admin/contactus', 'fa fa-thumb-tack', 0, '2016-12-19 04:55:06', 1, '2016-12-19 11:25:06', 'Active'),
(13, 'About Us', 'admin/about-us', 'fa fa-history', 0, '2016-12-19 10:21:48', 1, '2018-01-24 08:12:37', 'Active'),
(14, 'Slider Images', 'admin/slider-images', 'fa fa-picture-o', 0, '2016-12-19 02:20:26', 1, '2016-12-19 14:50:26', 'Active'),
(15, 'Our Staff', 'admin/staff', 'fa fa-user', 0, '2016-12-19 05:36:35', 1, '2016-12-19 13:18:28', 'Active'),
(16, 'Shifting Quote', 'admin/quote', 'fa fa-truck', 0, '2016-12-20 12:25:25', 1, '2016-12-20 06:55:25', 'Active'),
(17, 'Our Clients', 'admin/clients', 'fa fa-users', 0, '2016-12-20 03:01:44', 1, '2016-12-20 09:31:44', 'Active'),
(18, 'Footer Content', 'admin/footer-content', 'fa fa-foursquare', 2, '2016-12-20 05:19:57', 1, '2016-12-20 11:49:57', 'Active'),
(19, 'Term and condition', 'admin/terms', 'fa fa-check-square-o', 2, '2016-12-21 04:28:53', 1, '2016-12-21 10:58:53', 'Active'),
(20, 'FAQ', 'admin/faq', 'fa fa-question-circle', 2, '2016-12-21 06:20:11', 1, '2016-12-21 12:50:11', 'Active'),
(21, 'Privacy Policy', 'admin/policy', 'fa fa-file-text', 2, '2016-12-21 06:21:18', 1, '2016-12-21 12:51:18', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_admin_user`
--

CREATE TABLE `trans_admin_user` (
  `id` int(11) NOT NULL COMMENT 'Admin user id',
  `f_name` text COMMENT 'Admin user first name',
  `l_name` text COMMENT 'Admin user last name',
  `username` text COMMENT 'admin username',
  `email` varchar(200) DEFAULT NULL COMMENT 'Admin user emailid',
  `password` varchar(255) NOT NULL,
  `usertype` enum('super_admin','admin','user') DEFAULT NULL COMMENT 'admin user by usertype super_admin=0,admin=1,user=2',
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Admin user modify date',
  `group_id` int(11) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `remember_code` varchar(40) NOT NULL,
  `forgotten_password_code` varchar(40) NOT NULL,
  `forgotten_password_time` int(11) NOT NULL,
  `activation_code` varchar(40) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_login` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` enum('Active','Deactive') DEFAULT NULL COMMENT 'Admin status by active and deactive',
  `create_date` int(11) DEFAULT NULL COMMENT 'Admin user by create date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_admin_user`
--

INSERT INTO `trans_admin_user` (`id`, `f_name`, `l_name`, `username`, `email`, `password`, `usertype`, `modify_date`, `group_id`, `salt`, `remember_code`, `forgotten_password_code`, `forgotten_password_time`, `activation_code`, `active`, `last_login`, `image`, `status`, `create_date`) VALUES
(1, 'Admin', 'istrator', 'administrator', 'admin@admin.com', '$2y$08$hCgwGjYgLNINuw4uEZFbpOZuGh59uPI0ra0yN8IQuJCqcVZGpkfSK', 'admin', '2018-02-22 06:11:48', 0, '', 'i7H5Q.MLduFTYZ4pT0S0Q.', '2TPWtPwaqjI28UQ2Cvdnnu5cbd6f14962e3e6f25', 1481889066, '', 1, 1519279908, 'user.png', 'Active', NULL),
(2, 'Admin', 'istrator', 'administrator', 'admin@admin.com', '$2y$08$dwP0gPhuvCtFf5mqM11/YOqkqCeHAC6eH.8SuVJQquoVoYN9n2irO', 'admin', '2018-10-21 18:11:05', 0, '', '28pXsgED0rziV2UwkFIh6O', '2TPWtPwaqjI28UQ2Cvdnnu5cbd6f14962e3e6f25', 1481889066, '', 1, 1540145465, 'user.png', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_clients`
--

CREATE TABLE `trans_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `Logo` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_clients`
--

INSERT INTO `trans_clients` (`id`, `name`, `Logo`, `status`) VALUES
(8, 'State Bank Of India', 'SBI.jpg', 'Active'),
(9, 'Inkling', 'part-logo-55.png', 'Active'),
(10, 'ParTec', 'part-logo-55.png', 'Active'),
(11, 'Travel Company', 'part-logo-54.png', 'Active'),
(12, 'Corox', 'part-logo-56.png', 'Active'),
(13, 'Climix', 'part-logo-53.png', 'Active'),
(14, 'NLM', 'part-logo-52.png', 'Active'),
(15, 'MTX', 'part-logo-51.png', 'Active'),
(16, 'State Bank Of India', 'S_B.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_contactus`
--

CREATE TABLE `trans_contactus` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(800) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_contactus`
--

INSERT INTO `trans_contactus` (`id`, `full_name`, `contact`, `email`, `subject`, `message`, `created_date`) VALUES
(7, 'JHJKH', '8789787978', 'ab1811854@gmail.com', 'IYIOUIO', 'UOIUOIUOIU', '2017-01-17 15:30:30'),
(74, 'shraddha shisode', '7722080442', 'shraddhashisode@gmail.com', 'regarding labour charges', 'Please tell me labour charges rate as per area and location.', '2017-02-16 16:50:49'),
(75, 'Nishant Jhade', '7767909462', 'nishant.jhade@gmail.com', 'Shift Good to new apartment', 'I want to shift goods to my new apartment \r\nSource - Megapolis Hinjewadi Phase 3\r\nDestination :  KUL Ecoloch - Nande-Balewadi Road, Mahalunge\r\nlist of goods \r\nFridge 165 ltr,Wooden double bed (can be dismantle) , 1X3 feet height TV table (can be dismantle)\r\n\r\nPlease provide me quote or send anyone to home to get all details or give me call at 7767909462\r\n\r\nRegards\r\nNishant', '2017-02-17 21:29:29'),
(76, 'Rohit', '8149895743', 'rohitjain.mit@gmail.com', 'want to shift within Pune', 'want to shift from wakad to Punawale...\r\nplease provide quotation.\r\nI called on given number but its not rechable. pls contact me.', '2017-02-23 18:30:46'),
(77, 'Amit Jaiswal', '9823570702', 'amitjaiswal091@gmail.com', 'Pack and shift', 'Wardrobe, washing machine, marble mandir, suitcases, a cylinder', '2017-03-17 15:36:07'),
(78, 'Prashant K', '9004427596', 'prashantkusundal@gmail.com', 'House Shifting within Pune', 'Please let me know charges for local shifting ', '2017-03-25 09:41:43'),
(79, 'Nikhil Digrase', '7276970448', 'nikhildigrase@gmail.com', '1st April:: Vehivle Service Required', 'Hi,\r\nI would like to avail vehicle service on 1st April around 5:30pm from Gini Viviana Balewadi to Astonia Balewadi.\r\nTried to call on the given number however there was no response.\r\n\r\nPlease let me know the charges and availability for the same.\r\n\r\nThanks,\r\nNikhil DIgrase', '2017-03-30 21:07:33'),
(81, 'jeevan', '9922995337', 'jeevan.kulkarni1@gmail.com', 'quotation', 'Dear Team,\r\nI am planning to shift to old sangvi from megapolis hinjewadi in coming week.\r\n\r\nwhat will be the total cost of packing shifting and unloading.\r\nTATA 407 may be best suited to me.', '2017-04-23 23:17:41'),
(82, 'Sharansh Tripathi', '8600990513', 'saransh.trip@gmail.com', 'Megapolis Phase 3 to Punawale', 'I want to shift my sofa (3 + 3) L - shaped from Megapolis PHASE 3 to Shriyans society Punawale.  I want to do it today before 16:00 PM, Please Contact me regarding this. Thanks', '2017-04-30 11:32:25'),
(83, 'Akshay Chandwani', '7879306125', 'akshaychandwani992@gmail.com', 'Plz call', 'Your number is off, not rechable.', '2017-05-11 13:59:03'),
(84, 'Akshay Chandwani', '7879306125', 'akshaychandwani992@gmail.com', 'Plz call', 'Your number is off, not rechable.', '2017-05-11 13:59:04'),
(85, 'Mrinal Menon', '9923411456', 'mrinalon99@gmail.com', 'Need a Quote', 'Hi Team,\r\n\r\nI need a quote regarding packing and shifting.. so do let me know your charges', '2017-06-08 13:24:02'),
(86, 'Aniruddh', '9552003654', 'anisatpute@gmail.com', 'Shifting within Pune on 23-07-2017', 'Hi,\r\nI would like to shift from Punawale to Hinjewadi on 23-07-2017. Pls call me .\r\n\r\nRegards,', '2017-07-21 21:46:26'),
(87, 'Shruti', '8087488103', 'siddhruti@gmail.com', 'Shift charges and details', 'Hi..tried to reach you on call +91 96896 22000. But nobody answered.Please could you call me as I need info on shifting service.thanks', '2017-08-09 10:23:58'),
(89, 'MAYANK RATNANI', '9960001233', 'mayankratnani0123@gmail.com', 'SHIFTING', 'CONTACT', '2017-11-21 22:31:31'),
(102, 'Arvind Singh', '9930410401', 'arvindsingh955@gmail.com', 'Shifting', 'I want to shift my stuffs from vadgaon budruk to baner Supriya calssic on this weekend. Kindly contact me on 9930410401', '2018-02-28 17:02:33'),
(105, 'Dattaraj ', '9657700770', 'parab.dattaraj@gmail.com', 'Home appliances shifting ', 'Pl call', '2018-04-19 15:17:48'),
(108, 'Garnet', '', 'Mailbanger@email.com', 'Want access to millions of homeowners with credit score and much more?', 'Hello\r\n\r\nDo you want to market your product or service to over 150 million homeowners and residential leads with detailed info like credit score?\r\n\r\nThis package contains millions of instant potential customers.\r\n\r\nThe ultimate marketing packaging for businesses targeting homeowners/residential leads, acquire these files once (with sortable categories and use unlimited\r\nwith free updates for 1 year\r\n\r\nhttp://www.mailbanger.com/new-2018-usa-148-million-homeowners-package', '2018-06-24 10:42:28'),
(109, 'Amazon', '', 'seven.sales@amazon.com', 'Share you Flash deal 30-40% from Amazon today', 'Dear customer,\r\nToday, we share you discount links and coupons from Amazon,\r\nEnjoy the worldcup 2018, amazon offers flash deals save 30% - 40% of items in the day.\r\n\r\nVisit the link:\r\n\r\nhttps://www.amazon.com/gp/goldbox/?&tag=myweb090e-20&coupon=30%&flashdeal=24h\r\n\r\nWish you happy shopping\r\nBest regards', '2018-06-26 07:04:35'),
(110, 'Test name ', '1234567890', 'admin@gmail.com', 'Email Support', 'Test ', '2018-07-05 13:31:16'),
(115, 'Gurushant Birajdar', '9860327114', 'gurushant.birajdar@gmail.com', 'Shifting from Baner to Balewadi', 'Hello,\r\n\r\nI want to shift my household goods from Hill View Residency, Baner road to Perfect10, Balewadi. In heavy items I only have a fridge, Washing Machine, TV and a steel table. Apart from these items there are 2 small tables, Kitchen goods and cloths. mattresses. \r\n\r\nCould you please provide your quotation for the same?', '2018-07-18 12:18:01'),
(116, 'PhillipVorry', 'taavatuva1998@p', 'taavatuva1998@plusgmail.ru', '?????????', '??????????? \r\n \r\n<a href=http://penobeton.portalsnab.ru>????????????</a>', '2018-07-18 23:13:41'),
(117, 'Wendellsaf', 'chieloseworth20', 'chieloseworth2003@plusgmail.ru', '???????????', '???????????? \r\n \r\n<a href=http://?????.????????-???.???>?????????</a>', '2018-07-18 23:13:41'),
(118, 'LemuelQuers', 'gipercachen2008', 'gipercachen2008@plusgmail.ru', '?????????', '???????????? \r\n \r\n<a href=http://????????.????????-???.???>??????????????</a>', '2018-07-18 23:13:41'),
(119, 'Donaldmouth', 'ermabubo1998@pl', 'ermabubo1998@plusgmail.ru', '??????????????', '??????????? \r\n \r\n<a href=http://?????.????????-???.???>??????????????</a>', '2018-07-18 23:13:41'),
(120, 'AaronSax', 'lebackreto1983@', 'lebackreto1983@plusgmail.ru', '?????????', '??????????? \r\n \r\n<a href=http://?????.????????-???.???>????????????</a>', '2018-07-18 23:13:41'),
(121, 'Oscarrox', 'unacbato1990@pl', 'unacbato1990@plusgmail.ru', '????????????', '???????????? \r\n \r\n<a href=http://penobeton-smolensk.portalsnab.ru>????????????</a>', '2018-07-18 23:13:43'),
(122, 'EdwardAppet', 'momanwidthrip20', 'momanwidthrip2002@plusgmail.ru', '?????????', '????????? \r\n \r\n<a href=http://gazobeton-smolensk.portalsnab.ru>????????</a>', '2018-07-19 00:46:16'),
(123, 'SheltonSef', 'alefpontherp198', 'alefpontherp1983@plusgmail.ru', '??????????????', '???????????? \r\n \r\n<a href=http://?????.????????-???.???>???????????</a>', '2018-07-19 00:54:13'),
(124, 'Steveicort', 'sigsabuzzri1972', 'sigsabuzzri1972@plusgmail.ru', '????????????', '???????????? \r\n \r\n<a href=http://????????.????????-???.???>????????????</a>', '2018-07-19 00:54:13'),
(125, 'Cliftoncox', 'credajnutti1987', 'credajnutti1987@plusgmail.ru', '????????????', '?????????????? \r\n \r\n<a href=http://gazobeton-tver.portalsnab.ru>???????????</a>', '2018-07-19 00:54:14'),
(126, 'pavinginfak', 'stroy@plusgmail', 'stroy@plusgmail.ru', '????????? ? ?????? ?????????', ' \r\nhttp://rsk-nn.ru - ?????????? ?????? ?2   - ????????? ?? ????? http://rsk-nn.ru - rsk-nn.ru', '2018-07-31 15:17:31'),
(127, 'Jamesmoupe', 'elcia_8@op.pl', 'elcia_8@op.pl', 'Music Downloads  Privatte FTP Server', 'Hello. \r\n \r\nDownloads music club Dj\'s, mp3 private server. \r\nhttps://0daymusic.org/ \r\n \r\nPrivate FTP Music/Albums/mp3 1990-2018: \r\nPlan A: 20 EUR - 200GB - 30 Days \r\nPlan B: 45 EUR - 600GB - 90 Days \r\nPlan C: 80 EUR - 1500GB - 180 Days \r\n \r\nBest Regards, \r\nRobert', '2018-08-07 22:12:41'),
(128, 'Maginfak', 'sergei-soyuz-ma', 'sergei-soyuz-magov-rossii@mail.ru', '???? ????? ??????', '??????????? ???? ?? ?????? ? ??????-??????????? https://soyuz-magov-rossii.com - ???? ????? ?????? - ????????? ??????? ?? ????? https://soyuz-magov-rossii.com - soyuz-magov-rossii.com', '2018-08-10 08:24:54'),
(129, 'AAssulsehiethy', 'setheithei@best', 'setheithei@bestmailonline.com', 'Your Orient To Blood Exigencies Numbers', ' Torsion bras de quelqu\'un  est comment  robuste  votre sang pousse contre les parois de vos arteres lorsque votre coeur  determination  pompe le sang. Arteres sont les tubes qui transportent prendre  offre sang loin de votre coeur. Chaque  set  votre  manque de sensibilite bat, il pompe le sang  par de  vos arteres a la  prendre facilement  de votre corps. \r\nhttps://www.cialispascherfr24.com/generique-du-cialis-en-france/ ', '2018-08-17 07:14:03'),
(130, 'Maginfak', 'sergei-soyuz-ma', 'sergei-soyuz-magov-rossii@mail.ru', '???? ????? ??????', '??????????? ???? ?? ?????? ? ??????-??????????? https://soyuz-magov-rossii.com - ???? ????? ?????? - ????????? ??????? ?? ????? https://soyuz-magov-rossii.com - soyuz-magov-rossii.com', '2018-08-23 06:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `trans_enquiry`
--

CREATE TABLE `trans_enquiry` (
  `id` bigint(11) NOT NULL,
  `quotation_id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_read` int(2) NOT NULL,
  `is_delete` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_enquiry`
--

INSERT INTO `trans_enquiry` (`id`, `quotation_id`, `user_id`, `is_read`, `is_delete`, `created_at`, `updated_at`) VALUES
(2, 8, 225, 0, 0, '2018-10-21 19:03:33', '2018-10-21 19:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `trans_faq`
--

CREATE TABLE `trans_faq` (
  `faq_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `image` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_faq`
--

INSERT INTO `trans_faq` (`faq_id`, `description`, `image`, `created_date`) VALUES
(1, '<p><strong>Q. What are the services offered by ShiftMe?</strong></p>\r\n<p><strong>ShiftMe&nbsp;</strong>offer Packing/shifting, Labour and vehicles service for individual as well as enterprises to suit their requirements. We have different sized vehicles from Tata ace, Piaggio Ape, Pick-up, Tata 407, Mahindra Champion, Eicher 14 feet, 17 feet and 19 feet trucks and many more as per the requirements. You can book vehicle, packing/shifting services for Current as well as Advance Bookings up to 1 month . For current bookings, just click on \'Book Now\' button &amp; your booking is confirmed, the Reference Number is displayed. In case of advance booking, the confirmation is given right away and details are sent 1 day before the shifting time.</p>\r\n<p><strong>Q. What are the timings for the Vehicles Service?</strong></p>\r\n<p>Vehicles Services are available round the clock.</p>\r\n<p><strong>Q. How do I book a Vehicles Service?</strong></p>\r\n<p>You can book vehicle service either by calling Phone or by visiting Website &rdquo;&nbsp;<strong>shiftme.in</strong>&rdquo;</p>\r\n<p><strong>Q. Is there any charge for booking on the phone / web?</strong></p>\r\n<p>No, we don&rsquo;t charge for booking on phone or through website. No Convenience charge will be applicable.</p>\r\n<p><strong>Q. What is the fare that I will be charged?</strong></p>\r\n<p>We charge base fare of particular vehicle which is fixed along with on the actual distance travelled in kilometers, the actual waiting time in minutes.</p>\r\n<p><strong>Q. Will I be charged for waiting time also?</strong></p>\r\n<p>Yes, but only after certain period of time.</p>\r\n<p><strong>Q. Do I have to pay toll charge when I use vehicle service?</strong></p>\r\n<p>Yes, you have to pay \'Toll charge\'- at the actual. However, in case you have booked a vehicle &amp; it is crossing the toll post while coming to your address, then you need not pay the toll charges.</p>\r\n<p><strong>Q. How do I pay after the completion of services?</strong></p>\r\n<p>Shiftme.in accepts both Cash and Cashless payments i.e. you can pay via Cash, as well as via paytm Mobile Wallet.</p>\r\n<p><strong>Q. Will I get a printed receipt for the amount paid?</strong></p>\r\n<p>Of course you will. You just need to register your email id with us, and at the end of service you will receive the receipt with all details without having to follow up for the same.</p>\r\n<p><strong>Q. Can I cancel a booking made?</strong></p>\r\n<p>Our system of handling bookings is automated and once your booking is confirmed by our Customer Service Center, a vehicle is assigned to report to you. We do understand that sometimes, plans change and you may need to cancel a booking. Please tell us as soon as you reasonably can - that you would like to cancel a booking so that we can avoid a vehicle reporting to you, when you don\'t need it.</p>\r\n<p><strong>Q. What is it that cannot be loaded on to the vehicle?</strong></p>\r\n<p>Some possessions like pets, Liquids/Oils, inflammable items and flowers pots will not be allowed to be loaded on the vehicle.</p>\r\n<p><strong>Q. Why we should choose Shiftme.in?</strong></p>\r\n<p>Shiftme.in provide specialized services at best possible price with Quality Packing Material well trained labour and <span>customized vehicles service.&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p><span><strong>About Our Website</strong></span></p>\r\n<p><strong>Q. Do I need to register at your website to avail the services?</strong></p>\r\n<p>No. You can use our service without the need to register as a one-time user. You just need to provide your details at the time of booking and for packing service you need to register on our website using mobile number. This can help you login and book any service. Please do not forget to change your password when you log in for the first time.</p>\r\n<p><strong>Q. I am a registered user and have forgotten my password!</strong></p>\r\n<p>If you have forgotten your password, please click on "Forget password" link. Enter your user id (i.e. your mobile number) then click on &ldquo;Reset The Password&rdquo; and you will receive your password on registered mobile number.</p>', 'http://shiftme.in/shiftme/assets/upload/faq/FAQ.png', '2018-07-03 12:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `trans_footer_content`
--

CREATE TABLE `trans_footer_content` (
  `footer_id` int(11) NOT NULL,
  `contact_us` longtext NOT NULL,
  `instagram` longtext NOT NULL,
  `site` longtext NOT NULL,
  `social_media` longtext NOT NULL,
  `fb_link` longtext NOT NULL,
  `twitter_link` longtext NOT NULL,
  `google_link` longtext NOT NULL,
  `pinterest_link` longtext NOT NULL,
  `rss_link` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_footer_content`
--

INSERT INTO `trans_footer_content` (`footer_id`, `contact_us`, `instagram`, `site`, `social_media`, `fb_link`, `twitter_link`, `google_link`, `pinterest_link`, `rss_link`, `created_date`) VALUES
(1, '<address><strong>Shiftme</strong></address><address>Bavdhan, Pune - 411021.</address><address>+91 96896-22000</address><address>&nbsp;</address><address>Baner, Pune - 411007</address><address>+91 96896-22000</address><address>&nbsp;</address><address>\r\n<p><span style="font-size: medium; font-family: arial,helvetica,sans-serif;"><strong><a href="mailto:%20info@Transport.com">info@shiftme.in</a></strong></span></p>\r\n</address>', '<p>Inbecilloque elegans errorem concedo coniuncta arare dicant etsi electram minimum.</p>', '<p style="margin-bottom: 5px !important;"><a href="../../">Home</a></p>\r\n<p style="margin-bottom: 5px !important;"><a href="../../aboutus">About Us</a></p>\r\n<p style="margin-bottom: 5px !important;"><a href="../../shifting">Shifting And Packing</a></p>\r\n<p style="margin-bottom: 5px !important;"><a href="../../labour">Labour</a></p>\r\n<p style="margin-bottom: 5px !important;"><a href="../../cost">Price</a></p>\r\n<p style="margin-bottom: 5px !important;"><a href="../../contactus">Contact Us</a></p>', '<p>Tibi alienus possimus nomini legendus pariatur, logikh assidua philosophis expectat occultarum accedit suscipit interrogari difficilius reddidisti.</p>', 'https://www.facebook.com/shiftme/?pnref=story.unseen-section', 'https://twitter.com/ShiftMe007', 'http://www.google.com', 'https://www.instagram.com/shiftme.in/?hl=en', 'http://www.google.com', '2018-07-05 12:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `trans_group`
--

CREATE TABLE `trans_group` (
  `id` int(12) NOT NULL COMMENT 'Group id',
  `name` varchar(50) DEFAULT NULL COMMENT 'Gropu name',
  `user_id` int(50) DEFAULT NULL COMMENT 'Group user id',
  `create_by` int(10) DEFAULT NULL COMMENT 'Group create by',
  `Group_member` text COMMENT 'group member array',
  `description` varchar(100) NOT NULL,
  `status` enum('Active','Deactive') DEFAULT NULL COMMENT 'group status',
  `category_id` varchar(50) DEFAULT NULL COMMENT 'group category id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_group`
--

INSERT INTO `trans_group` (`id`, `name`, `user_id`, `create_by`, `Group_member`, `description`, `status`, `category_id`) VALUES
(1, 'admin', 1, 1, 'admin', '', 'Active', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trans_home_slider`
--

CREATE TABLE `trans_home_slider` (
  `id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `images` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_home_slider`
--

INSERT INTO `trans_home_slider` (`id`, `Description`, `images`, `status`) VALUES
(5, 'CLICK KARO SHIFT KARO', 'slide_3.jpg', 'Active'),
(6, 'BEST SHIFTING SERVICE', 'truck-12.jpg', 'Active'),
(7, 'Click Karo Shift Karo', 'truck-2.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_invoice`
--

CREATE TABLE `trans_invoice` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `is_read` int(2) NOT NULL,
  `is_delete` int(2) NOT NULL,
  `is_sent` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trans_labour`
--

CREATE TABLE `trans_labour` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_labour`
--

INSERT INTO `trans_labour` (`id`, `description`, `image`, `status`) VALUES
(3, '<p>The workforce that we have is reliable, trustworthy, skilled and expert in their areas as they undergo rigorous selection process.</p>\r\n<p>ShiftMe takes full responsibility of their work as we understand the value of our business and our customers. Our workforce has required technique to smoothly finish the task of packing and loading items in the truck with full safety as they are well aware of the importance of our work.</p>\r\n<p>Loading involves stacking up of your carefully packed valuable goods into the transportation vehicle to protect them against any damage and dents. Once the goods arrive at their new respective destinations our expert workers unload them carefully. Proper unloading prevents damages of goods. Then they also perform the process of unpacking and re-arranging goods with utmost care and attention. Shifting has never been that easy before.</p>', 'http://shiftme.in/shiftme/assets/upload/labour/work_man_two.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_menu_alloc`
--

CREATE TABLE `trans_menu_alloc` (
  `id` int(11) NOT NULL COMMENT 'menu alloc id',
  `admin_id` int(11) DEFAULT NULL COMMENT 'menu alloc admin id',
  `menu_ids` text COMMENT 'menu alloc menu ids',
  `create_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL COMMENT 'created by',
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Deactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_menu_alloc`
--

INSERT INTO `trans_menu_alloc` (`id`, `admin_id`, `menu_ids`, `create_date`, `created_by`, `modify_date`, `status`) VALUES
(4, 1, '{"0":"Settings:2","2":"Track Users:14"}', NULL, NULL, '2016-10-15 09:11:35', NULL);

-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Table structure for table `trans_our_stuff`
--

CREATE TABLE `trans_our_stuff` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `designation` varchar(500) NOT NULL,
  `about` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_our_stuff`
--

INSERT INTO `trans_our_stuff` (`id`, `name`, `designation`, `about`, `facebook`, `twitter`, `linkedin`, `image`, `status`) VALUES
(5, 'Robin Madell', 'Developer ', '<p>Try these job-search and interview tips that can help make looking for work less overwheling.</p>', '', '', '', '2.jpg', 'Active'),
(7, 'Marcelle Yeager', 'Production Head ', '<p>Knowing where to draw the line on over-apologizing</p>', 'www.facebook.com/MarcelleYeager90 ', 'www.twitter.com/marcelle.yeager', 'www.linkedin.com/marcelle.yeager085 ', '1.jpg', 'Active'),
(8, 'Jhone  AD', 'Senior Recruiter ', '<p>Robots, telecommuting and improved online recruiting will be on the rise in 2017.</p>', 'www.facebook.com/hannahmorgan84', 'www.twitter.com/hannah.morgan', ' www.linkedin.com/hannah.morgan.114', '3.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_privacy_policy`
--

CREATE TABLE `trans_privacy_policy` (
  `policy_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `image` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_privacy_policy`
--

INSERT INTO `trans_privacy_policy` (`policy_id`, `description`, `image`, `created_date`) VALUES
(1, '<p><em>We value the trust you place in shiftme.in &nbsp;Please read this Privacy Policy, which tells you what information we collect from users of the ShiftMe.in , how we use that information, and with whom we may share it. Your privacy matters to ShiftMe.in (the &ldquo;Company&rdquo;, &ldquo;we&rdquo;, &ldquo;our&rdquo;, or &ldquo;us&rdquo;). This Privacy Policy explains how we collect, process, use, share and protect information about you. It also tells you how you can access and update your information and make certain choices about how your information is used.</em></p>\r\n<p><em>The Privacy Policy covers both &ldquo;online&rdquo; whether via personal computers, mobile devices or otherwise) and &ldquo;offline&rdquo; (e.g., collection of data through mailings, telephone, or in person) activities owned, operated, provided, or made available by the Company. Our &ldquo;online&rdquo; and &ldquo;offline&rdquo; activities, in relation to facilitation of vehicles booking services through a network of third party drivers and vehicles operators, are collectively referenced as the&nbsp;&ldquo;Services&rdquo;. &nbsp;This Privacy Policy also applies to you the end user are referred to as "you", "your" or &ldquo;user&rdquo;.</em></p>\r\n<p><strong>BY ACCEPTING THE CUSTOMER TERMS AND CONDITIONS, YOU AGREE TO THETERMS OF THIS PRIVACY POLICY</strong>. Please review the following carefully so that you understandour privacy practices. If you do not agree to this Privacy Policy, do not accept the Customer&nbsp;Terms and Conditions or use our Services.</p>\r\n<p>If you have questions about this Privacy Policy, please contact us through email address provided on our website.</p>\r\n<p><span><strong>WHAT TYPE OF INFORMATION DO WE COLLECT?</strong></span></p>\r\n<p><strong>INFORMATION YOU PROVIDE TO US</strong></p>\r\n<p>We may ask you to provide us with certain Protected Information. We may collect this information through various means and in various places through the Services, including account registration forms, contact us forms, or when you otherwise interact with us. When you sign up to use the Services, you create a user profile. We shall ask you to provide only such Protected Information which is for lawful purpose connected with our Services and necessary to be collected by us for such purpose.</p>\r\n<p>The current data fields that might be requested for are:</p>\r\n<p>o Email</p>\r\n<p>o Password</p>\r\n<p>o Name</p>\r\n<p>o Address</p>\r\n<p>o Mobile phone Number</p>\r\n<p>o Zip Code</p>\r\n<p>o &bull; Like many websites, we use "cookies" to enhance your experience and gather information about visitors and visits to our websites. If you do not want information to be collected through the use of cookies, your browser allows you to deny or accept the use of cookies. Cookies can be disabled or controlled by setting a preference within your web browser or on your Device.</p>\r\n<p><span><strong>Use of information we gather</strong></span></p>\r\n<ul>\r\n<li>Our primary goal in collecting your information is to provide you with an enhanced experience when using the Services. We use your information to closely monitor which Services are used most, to determine which features we need to focus on improving to provide you a better service.</li>\r\n<li>Based upon the Protected Information you provide us when registering for an account, we will send you a welcoming email to verify your username and password.</li>\r\n</ul>\r\n<ul>\r\n<li>To send you e-mails, e-newsletters, personalized offers via direct messaging or other communications about our services, , special offers or other information to the email address which you have provided if you have subscribed to receive this information.</li>\r\n<li>From time to time we may contact you by email or phone. We may use the information to customize the website according to your interests.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><span><strong>SECURITY</strong></span></li>\r\n</ul>\r\n<p>The Protected Information and Usage Information we collect is securely stored within our databases. Due to the existing regulatory environment we cannot guarantee the security of our databases, nor can we guarantee that information you supply won\'t be intercepted while being transmitted to us over the Internet or wireless communication, and any information you transmit to the Company you do at your own risk. . Under certain circumstances, third parties may unlawfully intercept or access transmissions or members may abuse or misuse your information that they collect from our Websites. Therefore, we do not promise, and you should not expect, that your personally identifiable information or private communications would always remain private.We recommend that you not disclose your password to anyone.</p>\r\n<p><span><strong>Cookies</strong></span></p>\r\n<p>We use data collection devices such as "cookies" on certain pages of our Websites. "Cookies" are small files sited on your hard drive that assist us in providing customized services whenever you visit the shiftMe.in . We also offer certain features that are only available through the use of a "cookie". Cookies can also help us provide information, which is targeted to your interests. Cookies may be used whether you register with us or not.</p>\r\n<p><span><strong>Our use of your information</strong></span></p>\r\n<p>. Your contact information is used to contact you when necessary.</p>\r\n<p>To provide tips or guidance on how to use our website, inform you of new features on our website, or provide other information that may be of interest to you;</p>\r\n<ul>\r\n<li>&nbsp;To personalize your site experience and to allow us to deliver the type of content and product offerings in which you are most interested.</li>\r\n<li>&nbsp;To allow us to better service you in responding to your customer service requests.</li>\r\n<li>&nbsp;To quickly process your booking.</li>\r\n<li>&nbsp;To send your emails for updates on your booking.</li>\r\n</ul>\r\n<p>If at any time the User would like to unsubscribe from receiving future emails, they may do so by contacting us via our Site.</p>\r\n<p>We do not store in cookies any passwords or any information that personally identifies you.</p>\r\n<p><strong>DISCLAIMER</strong></p>\r\n<p>We cannot ensure that all of your private communications and other personal information will never be disclosed in ways not otherwise described in this Privacy Policy. Therefore, although we are committed to protecting your privacy, we do not promise, and you should not expect, that your personal information will always remain private. As a user of the website, you understand and agree that you assume all responsibility and risk for your use of the website. . We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others\' rights, property, or safety.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong>THIRD PARTY LINKS ON WEBSITE</strong></p>\r\n<p>The Website may include hyperlinks to other web sites or content or resources. We have no control over any websites, which are provided by companies or persons other than us. You acknowledge and agree that we are not responsible for the availability of any such third party sites, and do not endorse any advertising, products or other materials on or available from such websites. You acknowledge and agree that we are not liable for any loss or damage which may be incurred by you as a result of the availability of those third party sites. These third-party service providers and third-party Sites have their own privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Always review the Third Party website&rsquo;s privacy policy as it relates to safeguarding your personal information. We use third-party advertising companies to serve ads when you visit the Website.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p><strong>2. NOTIFICATION OF MODIFICATIONS AND CHANGES</strong></p>\r\n<p>We reserve the right to change the Terms and Privacy Policy from time to time as seen fit, without any intimation, and continued use of the site will signify your acceptance of any amendment to these terms. You are therefore advised to frequently check the Terms of Service on a regular basis. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>\r\n<p>&nbsp;</p>\r\n<p><span><strong>Contact Us</strong></span></p>\r\n<p>By using our site you signify to our Terms and Conditions section establishing the use, disclaimers, and limitations of liability governing the use of our website. If you have any questions about this privacy policy or your personal information, please contact us <strong>s<span style="color: #000000;"><span style="color: #000000;">hiftme.in</span></span></strong></p>', 'http://localhost/transport/assets/upload/policy/footer-man.png', '2017-01-23 07:39:08');

-- --------------------------------------------------------

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
-- Dumping data for table `trans_product_list`
--

INSERT INTO `trans_product_list` (`id`, `name`, `weight`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Air Conditioner', 0, 500, '2018-10-19 08:00:55', '2018-10-19 08:00:55'),
(3, 'Computer Table', 500, 200, '2018-10-19 08:01:12', '2018-10-19 08:01:12'),
(4, 'Electric Kettles', 0, 100, '2018-10-19 08:01:31', '2018-10-19 08:01:31'),
(5, 'Microwave Oven', 0, 350, '2018-10-19 08:01:50', '2018-10-19 08:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `trans_qoute`
--

CREATE TABLE `trans_qoute` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `from_loc` text NOT NULL,
  `to_loc` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `shifting_date` varchar(30) NOT NULL,
  `packer` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `vehicle_shifting` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_qoute`
--

INSERT INTO `trans_qoute` (`id`, `uid`, `name`, `surname`, `email`, `from_loc`, `to_loc`, `phone`, `shifting_date`, `packer`, `storage`, `vehicle_shifting`, `created_date`, `status`) VALUES
(3, 1, 'Pavan', 'Gajakosh', 'pavan@linosys.net', 'San Francisco, CA, United States', 'Seattle, WA, United States', '8888622043', '01/25/2017', 0, 1, 0, '2017-01-05 16:24:51', 'Active'),
(6, 0, 'Ajay', 'B', 'ab1811854@gmail.com', 'Khadakwasla Dam, Pune, Maharashtra, India', 'Jambhulkar Chowk, Wanwadi, Pune, Maharashtra, India', '1234567890', '01/17/2017', 1, 1, 1, '2017-01-17 11:01:17', 'Active'),
(7, 7, 'abc', 'abc', 'abc@ymail.com', 'MANJARI', 'Deccan Gymkhana, Pune, Maharashtra, India', '1112223336', '01/24/2017', 0, 0, 0, '2017-01-17 11:42:57', 'Active'),
(9, 5, ' Java ', 'asad', 'asd@gmail.com', 'Pune, Maharashtra, India', 'Mumbai, Maharashtra, India', '1234654878', '01/21/2017', 0, 0, 0, '2017-01-21 10:12:53', 'Active'),
(10, 5, 'asd', 'asdasd', 'a@a.com', 'Pune, Maharashtra, India', 'Mumbai, Maharashtra, India', '2323443243', '01/21/2017', 0, 0, 0, '2017-01-21 10:15:17', 'Active'),
(11, 9, 'Nirja', 'H', 'NirjaH56@gmail.com', 'Loni Kalbhor, Maharashtra, India', 'Shivajinagar, Pune, Maharashtra, India', '8390120138', '01/23/2017', 1, 1, 0, '2017-01-21 15:47:32', 'Active'),
(12, 14, 'abc', 'def', 'tyu@hotmail.in', 'Kondhwa, Pune, Maharashtra, India', 'Sanaswadi, Maharashtra, India', '4545545454', '01/25/2017', 0, 0, 0, '2017-01-23 12:14:42', 'Active'),
(13, 0, 'vikram', 'ap', 'lance_681@rocketmail.com', 'Pimple Nilakh, Pimpri-Chinchwad, Maharashtra, India', 'Pimple Nilakh, Pimpri-Chinchwad, Maharashtra, India', '9021665300', '01/31/2017', 0, 0, 0, '2017-01-29 10:56:57', 'Active'),
(14, 0, 'Kishan', 'P', 'kishanpurohit@hotmail.com', 'Sun Grandeur, Patil Nagar, Sunarwadi, Maharashtra, India', 'Supreme Headquarters, Yash Orchid Private Road, Pune, Maharashtra, India', '9920060669', '02/04/2017', 1, 1, 1, '2017-02-01 23:00:44', 'Active'),
(15, 0, 'Vishnudas', 'Kulkarni', 'vishnutekale13@gmail.com', 'Megh Malhar & Raga,A Project By Lohia Jain-Zurange, Bavdhan, Pune, Maharashtra, India', 'Nyati Equatorial Phase -2, Bavdhan, Pune, Maharashtra, India', '9552533434', '02/19/2017', 1, 0, 0, '2017-02-02 14:04:24', 'Active'),
(16, 0, 'Rituraj ', 'Singh', 'rajrsingh23@gmail.com', 'Bahadurgarh ', 'Varanasi ', '9812382248', '04/09/2017', 1, 0, 1, '2017-02-23 18:03:28', 'Active'),
(17, 0, 'Chetan', 'Patil', 'chetan.patil.212@gmail.com', 'Elite-27, Pimpri-Chinchwad, Maharashtra, India', 'Splendour, Megapolis, MIDC Phase III Main Road, Phase 3, Pimpri-Chinchwad, Maharashtra, India', '8446388144', '02/28/2017', 0, 0, 0, '2017-02-27 19:00:39', 'Active'),
(18, 0, 'Vinay', 'Moharir', 'vinaymoharir@yahoo.com', 'Roseland Residency, Pimpri-Chinchwad, Maharashtra, India', 'Roseland Residency, Pimpri-Chinchwad, Maharashtra, India', '7028926655', '03/25/2017', 1, 0, 0, '2017-03-14 17:12:37', 'Active'),
(19, 0, 'Jyoti', 'Deolekar', '09.jyoti@gmail.com', 'Balewadi, Pune, Maharashtra, India', 'Nashik, Maharashtra, India', '8975586024', '04/15/2017', 1, 1, 1, '2017-03-18 20:08:38', 'Active'),
(20, 0, '', '', '', '', '', '', '', 0, 0, 0, '2017-03-20 11:03:37', 'Active'),
(21, 0, 'Sandeep', 'Bari', 'sandeep.bari@gmail.com', 'Kale Padal, Pune, Maharashtra, India', 'Punawale, Maharashtra, India', '9168388588', '04/01/2017', 1, 0, 0, '2017-03-20 11:03:39', 'Active'),
(22, 0, 'Pranjal', 'Bhattacharya', 'pranjal.v.bhattacharya@gmail.com', 'Kothrud, Pune, Maharashtra, India', 'Bavdhan, Pune, Maharashtra, India', '9766384281', '04/01/2017', 0, 0, 0, '2017-03-21 11:28:23', 'Active'),
(23, 0, 'Viswanathan ', 'Arunachalam', 'gavishwa@gmail.com', 'Bavdhan, Pune, Maharashtra, India', 'Kalyani Nagar, Pune, Maharashtra, India', '7028481668', '04/01/2017', 1, 0, 0, '2017-03-21 11:28:24', 'Active'),
(24, 0, 'Mithun', 'Chakraborty', 'mithun.belda@gmail.com', 'Royal Court, Thergaon, Pimpri-Chinchwad, Maharashtra, India', 'Sai Aashirwad, Sus Road, Baner, Pune, Maharashtra, India', '8411811200', '04/01/2017', 1, 1, 0, '2017-03-22 10:53:19', 'Active'),
(25, 27, 'Owais', 'Siddiqui', 'siddiqui.owais888@gmail.com', 'Tanya Apartment, Vishnu Dev Nagar, Pimpri-Chinchwad, Maharashtra, India', 'Megapolis Sunway, Phase 3, Pune, Maharashtra, India', '9987770669', '03/25/2017', 1, 0, 0, '2017-03-24 12:51:51', 'Active'),
(26, 0, 'Kamlesh', 'Gallani', 'kamlesh.gallani@outlook.com', 'Malpani Greens Society, Kaspate Wasti, Pimpri-Chinchwad, Maharashtra, India', 'Victory Towers-Sainik City, Mundhwa, Pune, Maharashtra, India', '9049712233', '04/01/2017', 1, 1, 0, '2017-03-30 12:35:06', 'Active'),
(27, 0, 'Rahul ', 'Roy', 'rahul.roy2@wns.com', 'Pune, Maharashtra, India', 'Nashik, Maharashtra, India', '8551017333', '04/30/2017', 1, 0, 0, '2017-04-03 11:36:24', 'Active'),
(28, 0, 'Navin ', 'Agarwal', 'navinagarwal1@gmail.comc', 'Dreams Aakruti, Pune, Maharashtra, India', 'Astonia Classic, Kondhwa-Undri-Saswad Road, Undri, Pune, Maharashtra, India', '9762746201', '05/01/2017', 1, 0, 0, '2017-04-10 12:21:44', 'Active'),
(30, 0, 'Poonam', 'Agrawal', 'Agrawalpoonam26@gmail.com', 'A-703,daffodils,Margarpatta city,pune', 'A-703,Marvel Cetrine,Kharadi,pune', '9764003068', '04/16/2017', 0, 0, 0, '2017-04-15 22:59:45', 'Active'),
(31, 0, '', '', '', '', '', '', '', 0, 0, 0, '2017-04-17 11:04:25', 'Active'),
(32, 0, 'Sachin ', 'Jain', 'jainsachin28@gmail.com', 'Sollanaa Society, Pimpri-Chinchwad, Maharashtra, India', 'Shriyans Punawale, Rasikwadi, Pimpri-Chinchwad, Maharashtra, India', '9225206018', '04/29/2017', 0, 0, 0, '2017-04-17 11:04:27', 'Active'),
(33, 0, 'Niraj', 'Dharme', 'nirajdharme@rediffmailcom', 'J B Nagar, Mumbai, Maharashtra, India', 'Rahatani, Pimpri-Chinchwad, Maharashtra, India', '9819090897', '04/22/2017', 0, 0, 0, '2017-04-21 15:12:58', 'Active'),
(34, 36, 'Sarika', 'H', 'ssupriya7171@gmail.com', 'Kothrud, Pune, Maharashtra, India', 'Shewalwadi, Pune, Maharashtra, India', '9876543210', '04/23/2017', 1, 0, 0, '2017-04-21 17:41:37', 'Active'),
(35, 0, 'Harshad', 'Bajpai', 'hhdbjp@gmail.com', 'Dange chowk', 'Vishal nagar', '8308110358', '22/', 0, 0, 0, '2017-04-21 18:27:53', 'Active'),
(36, 0, 'Suhas', 'Tarihalkar', 's.tarihalkar@gmail.com', 'Wadgaon Sheri, Pune, Maharashtra, India', 'Ravet, Pimpri-Chinchwad, Maharashtra, India', '9922940544', '04/29/2017', 1, 0, 0, '2017-04-23 18:00:48', 'Active'),
(37, 0, 'Arun', 'Shinde', 'shinde.arun89@gmail.com', 'S N 1, plot no 31, Sr. No. 88/4,, Gujrat Colony, Kothrud, Pune, Maharashtra 411038', 'Flamingo Empire Wing-B, Sagar Co-Operative Housing Society, Pune, Maharashtra, India', '8149060493', '05/01/2017', 1, 1, 0, '2017-04-24 16:59:26', 'Active'),
(38, 0, 'Tarun', 'Chhipa', 'chhipa.tarun@gmail.com', 'Kunal Icon Co-operative Housing Society, Pune, Maharashtra, India', 'Lotus Multispeciality Hospital, Pune, Maharashtra, India', '7798045780', '04/29/2017', 1, 0, 0, '2017-04-25 14:50:57', 'Active'),
(39, 0, '', '', '', '', '', '', '', 0, 0, 0, '2017-05-09 15:34:10', 'Active'),
(40, 0, 'Bhushan ', 'Lakhe', 'bhushan.lakhe02@gmail.com', 'Nisarg City 2 - A Block, Vishnu Dev Nagar, Pimpri-Chinchwad, Maharashtra, India', 'Vardhaman Township, Sasane Nagar, Pune, Maharashtra, India', '8446003372', '05/13/2017', 1, 0, 0, '2017-05-09 15:34:11', 'Active'),
(41, 46, 'Rahul', 'Vishwakarma', 'rahulvishwakarma.04@gmail.com', 'Life Republic. Sector R - 6, Pimpri-Chinchwad, Maharashtra, India', 'Konark Meadows C.H.S, BAIF Road, Savannah, Pune, Maharashtra, India', '8888168786', '05/13/2017', 0, 0, 1, '2017-05-10 09:53:42', 'Active'),
(42, 0, '', '', '', '', '', '', '', 0, 0, 0, '2017-05-11 12:15:10', 'Active'),
(43, 0, 'Arpit ', 'Jain', 'arpitjain2601@gmail.com', 'Vishal Nagar, Pimpri-Chinchwad, Maharashtra, India', 'Rahatani, Pimpri-Chinchwad, Maharashtra, India', '8983410790', '05/15/2017', 1, 1, 1, '2017-05-11 12:15:11', 'Active'),
(44, 0, 'Maneesh', 'Sharma', 'maneeshmani@rediffmail.com', 'Apostrophe, Datta Mandir Road, Shankar Kalat Nagar, Pimpri-Chinchwad, Maharashtra, India', 'Apostrophe, Datta Mandir Road, Shankar Kalat Nagar, Pimpri-Chinchwad, Maharashtra, India', '8600444043', '05/28/2017', 1, 0, 1, '2017-05-23 01:18:01', 'Active'),
(45, 0, 'vaibhav', 'shetiye', 'vaibhav.shetiye07@gmail.com', 'Sinhgad Academy Of Engineering, Pune, Maharashtra, India', 'Akurdi Railway Station, Gurudwara Road, Akurdi, Pimpri-Chinchwad, Maharashtra, India', '8087175255', '28/05/2017', 0, 0, 0, '2017-05-28 09:00:46', 'Active'),
(46, 51, 'Chandra mohan', 'K', 'raju.chandru82@gmail.com', 'Saarrthi Sovereign, Pune, Hinjewadi Rajiv Gandhi Infotech Park, Pimpri-Chinchwad, Maharashtra, India', 'Life republic, Marunji Road, Hinjewadi Rajiv Gandhi Infotech Park, Pimpri-Chinchwad, Maharashtra, India', '7030744779', '06/02/2017', 1, 1, 0, '2017-05-29 09:41:07', 'Active'),
(47, 0, 'Vinay Agrawal', 'Agrawal', 'vinay.mittal15@gmail.com', 'Ganga Panama, Pimple Nilakh-Baner Bridge Road, Kranti Nagar, Pimpri-Chinchwad, Maharashtra, India', 'Essentia, Shivar Garden Road, Rahatani, Pimpri-Chinchwad, Maharashtra, India', '8600391687', '06/03/2017', 0, 0, 0, '2017-06-01 14:46:36', 'Active'),
(48, 0, 'Manan', 'Thaker', 'manan_thaker1990@yahoo.com', 'Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Wakad, Pimpri-Chinchwad, Maharashtra, India', '7507859986', '06/10/2017', 1, 0, 0, '2017-06-05 14:13:17', 'Active'),
(49, 0, '', '', '', '', '', '', '', 0, 0, 0, '2017-06-05 14:13:18', 'Active'),
(50, 0, 'Mrinal ', 'Menon', 'mrinalon99@gmail.com', 'Wanowrie, Pune, Maharashtra, India', 'Naren Hills, Mohammed Wadi, Pune, Maharashtra, India', '9923411456', '07/01/2017', 1, 0, 0, '2017-06-08 08:50:12', 'Active'),
(52, 0, 'Abhishek', 'Vyas', 'abhishekbpl@yahoo.co.in', 'Lok Milan CHS, Chandivali Farm Road, LOK Milan Colony, Mumbai, Maharashtra, India', 'Megapolis Sunway, Phase 3, Pune, Maharashtra, India', '9960720398', '07/01/2017', 0, 0, 0, '2017-06-18 16:04:24', 'Active'),
(53, 0, 'Rahul', 'K', 'rahul_kaswa@yahoo.co.in', 'Kharadi, Pune, Maharashtra, India', 'Magarpatta City, Pune, Maharashtra, India', '9423715877', '06/21/2017', 0, 0, 0, '2017-06-19 20:38:32', 'Active'),
(54, 0, 'Divya', 'Vyas', 'divadd1508@gmail.com', 'Chandivali Farm Road, LOK Milan Colony, Mumbai, Maharashtra, India', 'Megapolis Sunway, Phase 3, Pune, Maharashtra, India', '9004447833', '07/01/2017', 0, 0, 0, '2017-06-27 11:21:12', 'Active'),
(55, 0, 'sanjay', 'hajgude', 'sanjayhajgude@yahoo.co.in', 'Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'Alandi Police Station, Alandi, Maharashtra, India', '8390626758', '07/10/2017', 0, 0, 0, '2017-06-27 20:01:46', 'Active'),
(56, 0, 'Ashish ', 'Santlani', 'ashish.santlani@gmail.com', 'Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'Pimple Gurav, Pimpri-Chinchwad, Maharashtra, India', '9028522695', '07/09/2017', 1, 1, 1, '2017-06-27 22:13:21', 'Active'),
(57, 0, 'SRIKANTH KAMALE', 'KAMALE', 'srikanth.sonu@gmail.com', 'Dharmavaram, Andhra Pradesh, India', 'Akurdi, Pimpri-Chinchwad, Maharashtra, India', '9172578180', '07/01/2017', 1, 0, 0, '2017-06-30 19:47:37', 'Active'),
(58, 0, 'Nishtha', 'Mihani', 'nishthamihani396@gmail.com', 'Pimple Nilakh, Pimpri-Chinchwad, Maharashtra, India', 'Dhanori, Pune, Maharashtra, India', '7875692557', '12/01/2017', 1, 1, 0, '2017-07-04 17:43:03', 'Active'),
(59, 0, '', '', '', '', '', '', '', 0, 0, 0, '2017-07-12 16:43:59', 'Active'),
(60, 0, 'Deviprasad', 'Patro', 'devi.engg@gmail.com', 'The Village, Kothari Tingre, The Village, Lohegaon, Pune, Maharashtra, India', 'Goodwill Orchids, Madhav Nagar, Pune, Maharashtra, India', '8806043777', '08/04/2017', 1, 0, 0, '2017-07-12 16:44:00', 'Active'),
(61, 0, 'Jagnoor', 'Maan', 'jagnoor_m@yahoo.com', 'Dreams Elina, Handewadi Road, Hadapsar, Pune, Maharashtra, India', 'Hermes Heritage Phase 2, Shastrinagar, Pune, Maharashtra, India', '9663422111', '10/15/2017', 1, 0, 0, '2017-10-09 10:48:19', 'Active'),
(62, 0, 'Ajay ', 'Patidar', 'ajaypatidar199@gmail.com', 'Nirmiti IKon, Baner - Balewadi Road, Balewadi Gaon, Pune, Maharashtra, India', 'Shriyans Punawale, Rasikwadi, Pimpri-Chinchwad, Maharashtra, India', '9540023009', '10/28/2017', 1, 1, 0, '2017-10-25 12:03:24', 'Active'),
(63, 0, 'TUSHAR', 'MAHAJAN', 'tushar.mahajan88@gmail.com', 'Kothrud, Pune, Maharashtra, India', 'Bhosari, Pimpri-Chinchwad, Maharashtra, India', '8793224899', '01/08/2018', 0, 0, 0, '2017-11-06 18:14:28', 'Active'),
(64, 0, 'Sudeep', 'Pimpale ', 'sudeep.alex@gmail.com', 'Ganraj Mangal Karyalay Bust Stop, Virbhadra Nagar Road, Veerbhadra Nagar, Pune, Maharashtra, India', 'Bella Casa, Sus, Pune, Maharashtra, India', '7798982678', '11/30/2017', 1, 0, 0, '2017-11-15 10:13:15', 'Active'),
(65, 87, 'aney', 'malik', 'aneymalik@rediffmail.com', 'Nyay Khand I, Ghaziabad, Uttar Pradesh, India', 'Sector 106, Gurugram, Haryana, India', '9212154183', '12/08/2017', 1, 0, 0, '2017-11-25 09:59:47', 'Active'),
(66, 0, 'Sarfaraz', 'Usmani', 'sarfarazusmani@gmail.com', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', '8446607600', '12/04/2017', 0, 0, 0, '2017-12-02 15:06:32', 'Active'),
(67, 0, 'Bijendra ', 'Thakur ', 'bijendrathakur3@gmail.com', 'Pashan Sutarwadi Link Road, Pashan, Pune, Maharashtra, India', 'Tushar Park, Dhanori Road, Madhav Nagar, Pune, Maharashtra, India', '9822192945', '12/15/2017', 1, 1, 0, '2017-12-06 05:32:49', 'Active'),
(68, 0, 'Rahul', 'Kumar', 'rahul271420@gmail.com', 'Sagar Pur, New Delhi, Delhi, India', 'Sector 1 Avantika, Rohini, Delhi, India', '7250197029', '01/31/2018', 0, 0, 0, '2018-01-29 21:26:26', 'Active'),
(69, 0, 'Shiv', 'Kumar', 'djrhythmofficial@gmail.com', 'IRIS Society, Balewadi High Street, Laxman Nagar, Pune, Maharashtra, India', 'Chaitanya Platinum, Balewadi Gaon, Pune, Maharashtra, India', '8999489623', '02/01/2018', 0, 0, 0, '2018-02-01 07:51:43', 'Active'),
(70, 0, 'Pratap', 'Mali', 'prtp.raje@gmail.com', 'Morwadi Chowk, Pimpri Colony, Pimpri-Chinchwad, Maharashtra', 'Premlok Park, Chinchwad, Pimpri-Chinchwad, Maharashtra, India', '8329523731', '03/01/2018', 0, 0, 0, '2018-02-24 12:16:32', 'Active'),
(71, 0, 'Prathamesh', 'Palkar', 'prathameshpalkar@gmail.com', 'Hadapsar, Pune, Maharashtra, India', 'CASA RIO CRICKET GROUND, Nilje Gaon, Maharashtra, India', '8828417551', '03/15/2018', 1, 0, 1, '2018-03-09 07:02:50', 'Active'),
(72, 0, 'Shamshad khan', 'Khan', 'sham.khantime@gmail.com', 'Mundhwa', 'Pisoli', '8793399463', '18/03/2018', 1, 0, 0, '2018-03-11 22:35:52', 'Active'),
(73, 0, 'Anshul', 'Bhasin', 'anshulbhasin@ymail.com', 'Pune, Maharashtra 411036, India', 'Jabalpur, Madhya Pradesh 482001, India', '8806219966', '03/24/2018', 0, 0, 0, '2018-03-16 14:35:44', 'Active'),
(74, 0, 'Asish', 'Mishra', 'asish677@gmail.com', 'Ganga Osian Meadows, Sector No. 28, Thergaon, Pimpri-Chinchwad, Maharashtra, India', 'Megapolis Sparklet, Sparklet Internal Road, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', '8380056781', '03/31/2018', 1, 1, 0, '2018-03-20 13:27:04', 'Active'),
(75, 0, 'Amey', 'Ghaisas', 'amey.ghaisas@yahoo.com', 'Dombivli, Maharashtra, India', 'Sangvi, Pimpri-Chinchwad, Maharashtra, India', '8097873877', '04/07/2018', 0, 0, 1, '2018-03-21 19:16:30', 'Active'),
(76, 0, 'Pankaj', 'Khandelwal', 'pankajshahra@gmail.com', 'Shivtirth Nagar, Rahatani Phata Pune', 'Purple Bloom, Dighi Pune', '7045358001', '03/31/2018', 0, 0, 0, '2018-03-23 08:51:00', 'Active'),
(77, 0, 'Vishnu', 'Singh', 's.vishnupratap2@gmail.com', 'Megapolis Sunway Internal Road, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'Tingre Nagar, Pune, Maharashtra, India', '9888375745', '03/30/2018', 0, 0, 0, '2018-03-25 14:15:06', 'Active'),
(78, 0, 'Vishwanath', 'Biradar', 'vishwanath.biradar@gmail.com', 'Morwadi, Pimpri Colony, Pimpri-Chinchwad, Maharashtra, India', 'Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', '9096884731', '04/07/2018', 1, 0, 0, '2018-03-31 15:51:55', 'Active'),
(79, 0, 'Rajeev', 'Jha', 'rajeevjha220@gmail.com', 'Bareilly, Uttar Pradesh, India', 'Khurda Road Jn, Khurdha, Odisha, India', '7011594676', '04/25/2018', 0, 0, 0, '2018-04-03 07:39:47', 'Active'),
(80, 0, 'MANVENDRA ', 'SINGH', 'MANAV.NMIMS@GMAIL.COM', 'Nabha, Punjab, India', 'Dewas, Madhya Pradesh, India', '9717177553', '05/20/2018', 1, 0, 0, '2018-04-09 22:22:18', 'Active'),
(81, 0, 'chandrasen', 'patil', 'chandrasen.patil@gmail.com', 'Venezia, Pashan Highway Side Road, Baner, Pune, Maharashtra, India', 'Mohan Nagar Co-Op Society, Pune, Maharashtra, India', '9765988400', '04/28/2018', 1, 0, 0, '2018-04-11 19:05:08', 'Active'),
(82, 0, 'Aashish', 'Tripathi', 'aashish.tripathi@sjmsom.in', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Pimple Nilakh, Pimpri-Chinchwad, Maharashtra, India', '9130057835', '04/28/2018', 1, 0, 1, '2018-04-24 10:37:35', 'Active'),
(83, 0, '', '', '', '', '', '', '', 0, 0, 0, '2018-04-24 14:09:57', 'Active'),
(84, 0, 'Balaji', 'G', 'balu.gantasala@gmail.com', 'Chennai, Tamil Nadu, India', 'Palamaner, Andhra Pradesh, India', '9840327845', '04/28/2018', 1, 0, 0, '2018-04-24 14:09:59', 'Active'),
(85, 0, 'Ruchika Surve', 'Surve', 'rvsurve@gmail.com', 'Devi Orchid, Bhau Patil Road, Classicism Society, Shanta Niketan, Bopodi, Pune, Maharashtra, India', 'Water\'s Edge, New DP Road, Brahmavrind Housing Society, Ingawale Nagar, Pimple Nilakh, Pimpri-Chinchwad, Maharashtra, India', '9975787009', '05/10/2018', 1, 0, 0, '2018-05-05 08:00:11', 'Active'),
(86, 0, 'chaitali patel', 'patel', 'chaitalibs@hotmail.com', 'Nirman Exotica, Ram Nagar, Bavdhan, Pune, Maharashtra, India', 'Rohan Seher, Fantasia Studios Lane, Samarth Colony, Baner, Pune, Maharashtra, India', '8378980211', '06/01/2018', 1, 1, 0, '2018-05-05 19:10:42', 'Active'),
(87, 0, 'Tarun Kumar', 'Kumar', 'tkietec@gmail.com', 'Hadapsar, Pune, Maharashtra, India', 'Gokul Nagar, Dhanori, Pune, Maharashtra, India', '8447372495', '05/21/2018', 0, 0, 0, '2018-05-14 16:38:23', 'Active'),
(88, 0, 'khushish', 'singla', 'khushish22@gmail.com', 'Baner, Pune, Maharashtra, India', 'Dhanori, Pune, Maharashtra, India', '8888888888', '05/26/2018', 1, 0, 1, '2018-05-22 16:16:19', 'Active'),
(89, 0, '', '', '', '', '', '', '', 0, 0, 0, '2018-05-24 16:35:41', 'Active'),
(90, 0, '', '', '', '', '', '', '', 0, 0, 0, '2018-05-24 16:35:41', 'Active'),
(91, 0, '', '', '', '', '', '', '', 0, 0, 0, '2018-05-24 16:35:41', 'Active'),
(92, 0, 'Sharvari', 'Kurundkar', 'kurundkarsharvari@gmail.com', 'Ruby Park, Park Street, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Vantage by Rucha, Internal Rd, Balewadi Gaon, Baner, Pune, Maharashtra, India', '8550969955', '05/26/2018', 0, 0, 0, '2018-05-24 16:35:41', 'Active'),
(93, 0, 'Himanshu', 'Rajotia', 'hrajotia@gmail.com', 'Sanjay Selenite, Baner Road, Ward No. 8, Someshwarwadi, Pashan, Pune, Maharashtra, India', 'Shanti Terrace Society, Vidya Valley School Road, Pimpri Gaon, Sus, Pune, Maharashtra, India', '9096802423', '05/27/2018', 0, 0, 0, '2018-05-27 08:54:05', 'Active'),
(94, 0, 'Rashmi', 'Joshi', 'rashmi.joshi@rotary.org', 'Wadgaon Sheri, Pune, Maharashtra, India', 'Ahmednagar, Maharashtra, India', '9011015831', '06/09/2018', 0, 0, 0, '2018-06-07 10:29:44', 'Active'),
(95, 0, '', '', '', '', '', '', '', 0, 0, 0, '2018-06-19 14:17:41', 'Active'),
(96, 0, 'Vedprakash', 'Hirwani', 'vedprakash_hirwani@persistent.co.in', 'Karve Nagar, Pune, Maharashtra, India', 'Megapolis Splendour CHS Ltd., Splendour Society, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', '9820089113', '06/23/2018', 0, 0, 0, '2018-06-19 14:17:41', 'Active'),
(97, 0, 'Nikhil', 'Kulkarni', 'getgoin@gmail.com', 'Viman Nagar, Pune, Maharashtra, India', 'Nanded City, Nanded Fata, Pandurang Industrial Area, Nanded, Pune, Maharashtra', '8600053333', '07/01/2018', 1, 0, 0, '2018-07-01 14:37:50', 'Active'),
(98, 0, 'roshan', 'borkar', 'roshanb232@gmail.com', 'Balwantpuram Samrajya, Shivtirthanagar, Matoba Nagar, Kothrud, Pune, Maharashtra, India', 'Nari Road, Bank Colony, Nagpur, Maharashtra, India', '9960435801', '07/10/2018', 0, 0, 1, '2018-07-03 22:57:09', 'Active'),
(99, 0, 'Akhlaque', 'Khan', 'a2k76@yahoo.com', 'Sparklet Megapolis, Sparklet Internal Road, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'Splendour Society, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', '9970063627', '07/11/2018', 1, 0, 0, '2018-07-10 22:01:31', 'Active'),
(100, 0, 'Gauri ', 'Sorap', 'gaurimali87@gmail.com', 'Dhankawadi, Raut Bag Society, Pratibha Nagar, Dhankawadi, Pune, Maharashtra, India', 'Dabholkarwadi Society C Wing, Dhabholkar Wadi, Bhoiwada, Parel, Mumbai, Maharashtra, India', '9920369697', '15/07/2018', 1, 0, 0, '2018-07-13 07:16:30', 'Active'),
(101, 0, 'Gurushant', 'Birajdar', 'gurushant.birajdar@gmail.com', 'Hill View Residency, Baner Road, Riviresa Society, Baner, Pune, Maharashtra, India', 'Perfect 10, Balewadi, Pune, Maharashtra, India', '9860327114', '07/27/2018', 1, 1, 0, '2018-07-13 20:44:04', 'Active'),
(102, 0, 'manisha', 'a', 'amanisha0000@gmail.com', 'Katraj, Pune, Maharashtra, India', 'Warje Malwadi, Pune, Maharashtra, India', '9403321717', '07/21/2018', 1, 0, 1, '2018-07-20 12:09:37', 'Active'),
(103, 0, 'Samarth Kumbhar', 'Kumbhar', 'kumbharsamarth24@gmail.com', 'Osmanabad, Maharashtra, India', 'Pune, Maharashtra, India', '8805974912', '08/11/2018', 0, 0, 0, '2018-07-20 16:28:56', 'Active'),
(104, 0, 'Manish', 'A', 'amanisha0000@gmail.com', 'Mundhwa, Pune, Maharashtra, India', 'Wagholi, Pune, Maharashtra, India', '9403321717', '07/23/2018', 1, 0, 1, '2018-07-22 10:49:42', 'Active'),
(105, 0, 'Pratik', 'Ranka', 'pratik.ranka@veomelifestyle.com', 'Golibar Maidan, Pune, Maharashtra', 'Salisbury Park, Gultekdi, Pune, Maharashtra, India', '9922967768', '08/07/2018', 0, 0, 0, '2018-08-06 15:17:13', 'Active'),
(106, 0, 'Ashish', 'Soni', 'ashishsonip25@gmail.com', 'Spring Meadows Society, Mumbai Pune Bypass Road, Ambegaon BK, Pune, Maharashtra, India', 'Tukai Darshan, Pune, Maharashtra, India', '9782326252', '08/22/2018', 0, 0, 0, '2018-08-22 15:09:51', 'Active'),
(107, 214, 'Shinto C', 'C', 'shintosc571@gmail.com', 'Whitefield', 'EuroKids, Akshaya Nagar 2nd Block, Dr Ambedkar Nagar, Ramamurthy Nagar, Bengaluru, Karnataka, India', '8553352462', '08/30/2018', 0, 0, 0, '2018-08-28 10:19:29', 'Active'),
(108, 0, 'Akshay', 'Jadhav', 'aceakshayjadhav@gmail.com', 'Shriyans Punawale, Rasikwadi, Jambhe, Pune, Maharashtra, India', 'Mangal Bhairav, Nanded City Sinhgad Road, Ghule Patil Nagar, Pandurang Industrial Area, Nanded, Pune, Maharashtra, India', '8275037225', '08/31/2018', 1, 1, 0, '2018-08-29 23:33:20', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_quotation`
--

CREATE TABLE `trans_quotation` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `quotation_no` varchar(255) NOT NULL,
  `starting_location` varchar(255) NOT NULL,
  `starting_address` text NOT NULL,
  `starting_landmark` varchar(255) NOT NULL,
  `starting_pincode` int(6) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_landmark` varchar(255) NOT NULL,
  `delivery_pincode` int(6) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `labour` int(11) NOT NULL,
  `packer` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `vehicle_shifting` int(11) NOT NULL,
  `shifting_date` datetime NOT NULL,
  `pricing_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_delete` int(6) NOT NULL,
  `is_read` int(6) NOT NULL,
  `is_send_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_quotation`
--

INSERT INTO `trans_quotation` (`id`, `user_id`, `fullname`, `email_id`, `mobile_no`, `quotation_no`, `starting_location`, `starting_address`, `starting_landmark`, `starting_pincode`, `delivery_location`, `delivery_address`, `delivery_landmark`, `delivery_pincode`, `vehicle_id`, `labour`, `packer`, `storage`, `vehicle_shifting`, `shifting_date`, `pricing_id`, `created_at`, `updated_at`, `is_delete`, `is_read`, `is_send_user`) VALUES
(1, 0, 'Akshay', 'akshay@gmail.com', 2147483647, '', '', '<p>Sanghavi</p>', 'Sanghavi', 411061, '', '<p>Kohrud</p>', 'Kohrud', 411036, 12, 0, 1, 1, 1, '2018-10-18 23:09:24', 0, '2018-10-18 23:09:24', '2018-10-18 23:09:24', 0, 0, 0),
(5, 225, 'mum', 'akshay@gmail.com', 7709975028, '', '', 'Pune, Maharashtra, India', '', 0, '', 'Mumbai, Maharashtra, India', '', 0, 9, 0, 1, 1, 0, '2018-10-20 00:00:00', 0, '2018-10-20 10:17:43', '2018-10-20 10:17:43', 0, 0, 0),
(6, 225, 'testing', 'test@test.com', 9874563210, '', 'Pune, Maharashtra, India', 'Pune, Maharashtra, India', '', 0, 'Mumbai, Maharashtra, India', 'Mumbai, Maharashtra, India', '', 0, 13, 0, 0, 0, 0, '2018-10-27 00:00:00', 0, '2018-10-20 18:13:30', '2018-10-20 18:13:30', 0, 0, 0),
(8, 225, 'testing', 'test@test.com', 9874563210, 'QUOTE008', 'Pune International Airport Area, Lohgaon, Pune, Maharashtra, India', '<p>Pune</p>', 'Pune', 411060, 'Mumbai, Maharashtra, India', '<p>Mumbai</p>', 'Mumbai', 400203, 2, 0, 1, 1, 0, '2018-10-22 00:00:00', 0, '2018-10-21 19:03:32', '2018-10-22 00:59:41', 0, 0, 1),
(9, 224, 'aks', 'aks@gmail.com', 7894561223, 'QUOTE009', 'Kolhapur', '<p>Kolhapur</p>', 'Kolhapur', 411036, 'Pune', '<p>Pune</p>', 'Pune', 411069, 11, 0, 0, 0, 0, '2018-10-22 00:00:00', 0, '2018-10-22 01:09:33', '2018-10-22 01:09:33', 0, 0, 1),
(10, 225, 'Testing', 'test2@gmail.com', 7889652390, 'QUOTE0010', 'Nashik', '<p>Nashik</p>', 'Nashik', 402360, 'Pune', '<p>Pune</p>', 'Pune', 411036, 10, 0, 0, 1, 1, '2018-10-22 00:00:00', 0, '2018-10-22 01:17:57', '2018-10-22 01:21:07', 0, 0, 1);

-- --------------------------------------------------------

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
-- Dumping data for table `trans_quotation_has_product`
--

INSERT INTO `trans_quotation_has_product` (`id`, `quotation_id`, `product_id`, `quantity`, `created_at`) VALUES
(2, 5, 5, 1, '2018-10-20 10:17:43'),
(3, 5, 4, 3, '2018-10-20 10:17:43'),
(4, 5, 3, 1, '2018-10-20 10:17:43'),
(5, 6, 5, 2, '2018-10-20 18:13:30'),
(6, 6, 4, 4, '2018-10-20 18:13:30'),
(7, 6, 3, 4, '2018-10-20 18:13:30'),
(14, 8, 5, 2, '2018-10-22 00:59:41'),
(15, 8, 4, 3, '2018-10-22 00:59:41'),
(16, 9, 5, 1, '2018-10-22 01:09:33'),
(17, 9, 2, 0, '2018-10-22 01:09:34'),
(21, 10, 5, 1, '2018-10-22 01:21:08'),
(22, 10, 3, 0, '2018-10-22 01:21:08'),
(23, 10, 2, 0, '2018-10-22 01:21:08');

-- --------------------------------------------------------

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
-- Dumping data for table `trans_quotation_pricing`
--

INSERT INTO `trans_quotation_pricing` (`id`, `quotation_id`, `products_total_amount`, `distance_amount`, `vehicle_amount`, `discount`, `total_amount`) VALUES
(3, 8, 200.00, 200.00, 100.00, 100, 400.00),
(4, 9, 100.00, 200.00, 200.00, 0, 200.00),
(6, 10, 500.00, 200.00, 200.00, 0, 900.00);

-- --------------------------------------------------------

--
-- Table structure for table `trans_services`
--

CREATE TABLE `trans_services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_services`
--

INSERT INTO `trans_services` (`id`, `name`, `description`, `status`) VALUES
(2, 'Shifting', 'Shifting Services', 'Active'),
(4, 'Vehicles', 'Vehicles Services', 'Active'),
(6, 'Labour', 'Labour Services', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_shifting`
--

CREATE TABLE `trans_shifting` (
  `id` int(11) NOT NULL,
  `long_desc` text NOT NULL,
  `short_desc` varchar(300) NOT NULL,
  `image` text NOT NULL,
  `objectives` text NOT NULL COMMENT 'json array',
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_shifting`
--

INSERT INTO `trans_shifting` (`id`, `long_desc`, `short_desc`, `image`, `objectives`, `status`) VALUES
(3, '<p>We offer specialized services to make your Shifting as easy and hassle-free as possible. We provide door-to-door local and domestic Shifting solutions for both individuals and corporate.</p>\r\n<p><strong>Whether</strong> local or domestic, Shifting is often a stressful step. Moving whole house from one place to another can be very hectic, and messy. But we will help you by providing you the service that you need. You can sit back and relax, and let us take the pain.</p>\r\n<p class="wow fadeInDown">&nbsp;</p>', '<p>The best part of a successful Shift is flawless logistics during the Shifting process. The following steps are taken to ensure that you are satisfied with your Shifting:</p>', 'http://www.linosys.info/proj/transport/assets/upload/shifting/services-13-450x304.jpg', '[{"obj":"Packing your personal belongings using specialized materials for shifting.","icon":"fa fa-gift"},{"obj":"Loading your belongings in a vehicles or container with utmost precaution.","icon":"fa fa-car"},{"obj":"Transporting the goods by road.","icon":"fa fa-pause"},{"obj":"Unpacking upon arrival.","icon":"fa fa-download"},{"obj":"Reassemble of your belongings in your new home if you require","icon":"fa fa-building-o "},{"obj":"Estimating the volume of your shipment so that you receive an accurate quotation.","icon":"fa fa-truck"}]', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_terms_condition`
--

CREATE TABLE `trans_terms_condition` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_terms_condition`
--

INSERT INTO `trans_terms_condition` (`id`, `description`, `images`) VALUES
(1, '<p><strong>The Terms and Conditions of shiftme.in are to be read carefully before using or obtaining any products, services or content through our websites.</strong></p>\r\n<p><strong>Shiftme hold the sole right to modify the Terms &amp; conditions without prior permission from you or informing you. We may also at any time, change or impose fees for certain services.</strong></p>\r\n<ul>\r\n<li>ShiftMe made clear to the customers that the Company does not own any vehicle, nor does it directly or indirectly employ any drivers for the vehicles registered with it for logistics purpose. Vehicle and drivers are supplied by third parties and the Company disclaims any and all liability in respect of the drivers and the Vehicle alike.</li>\r\n<li>The Company have right to use the customer contact information for its own marketing purposes.</li>\r\n<li>The Company may send regular SMS updates to the mobile numbers registered with it.</li>\r\n<li>The courts of Pune, India shall have the sole and exclusive jurisdiction in respect of any matters arising from the use of the Services offered by Company or the agreement or arrangement between Company and the Customer.</li>\r\n<li>ShiftMe shall not be liable to you for any damages, claims or costs whatsoever including any consequential, indirect, incidental damages or any loss of profit or damages to your phone, laptop, PC as a result of installation or execution of the application/website even if ShiftMe or its representative has been advised of the possibility of such loss, damage or claim.</li>\r\n<li>ShiftMe shall not be liable for any loss or damages, including any injury which you may suffer as a result of transportation in a Participating Vehicles hired through the Services.</li>\r\n</ul>', 'Profile1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trans_testimonials`
--

CREATE TABLE `trans_testimonials` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_testimonials`
--

INSERT INTO `trans_testimonials` (`id`, `text`, `status`) VALUES
(8, '<p>Experience with ShiftMe.in was really great. Booked online and they provided me suitable vehicle and labour as well. The team is very professional and helpful. I must recommend Shiftme.in if you are moving your home.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Shashikant Paliwal (TCS)</p>', 'Active'),
(9, '<p>Highly reccomended. Loved the service of ShiftMe.in. They are the real guru when it comes to shift your home. I called them once and they did everything wisely and very safely.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nilesh Hemnani (Tech.Mahindra)</p>', 'Active'),
(10, '<p><span><span>I have booked a tata ace for transferring some stuff of my<span class="text_exposed_show"> home. Happy to say that the tempo was on time and behavior of tempo driver is also good.. I really liked the service and sure to book the same service next time ..</span></span></span></p>\r\n<address><span><span><span class="text_exposed_show">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Neha Shrivastav (Allstate Solutions Private Ltd.)<br /></span></span></span></address>', 'Active'),
(11, '<p>Easy to book. Vehicle was provided on time and the service was good. Simply Great!</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vikash Patil (State Bank Of India)</p>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `trans_users_groups`
--

CREATE TABLE `trans_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans_users_groups`
--

INSERT INTO `trans_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trans_user_inquery`
--

CREATE TABLE `trans_user_inquery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `fullname` text NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `total_amount` varchar(20) NOT NULL,
  `pickuppoint` varchar(500) NOT NULL,
  `pickupAddress` text NOT NULL,
  `pickupLandmark` text NOT NULL,
  `pickupPincode` varchar(20) NOT NULL,
  `dropPoint` varchar(500) NOT NULL,
  `dropAddress` text NOT NULL,
  `dropPincode` varchar(20) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `labour` varchar(10) NOT NULL,
  `packers` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `BookingDate` varchar(20) NOT NULL,
  `inquery_datetime` datetime NOT NULL,
  `total_distance` varchar(20) NOT NULL,
  `status` enum('In Process','Pending','Completed','Cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_user_inquery`
--

INSERT INTO `trans_user_inquery` (`id`, `user_id`, `order_id`, `fullname`, `mobileno`, `email`, `total_amount`, `pickuppoint`, `pickupAddress`, `pickupLandmark`, `pickupPincode`, `dropPoint`, `dropAddress`, `dropPincode`, `vehicle_id`, `labour`, `packers`, `storage`, `vehicle`, `BookingDate`, `inquery_datetime`, `total_distance`, `status`) VALUES
(1, 5, 'ORD000001', 'asda', '1234567899', 'a@a.com', '401', 'Pune, Maharashtra, India', 'as', 'as', '411011', 'Pune Airport, Pune, Maharashtra, India', 'as', '411032', 2, '1', 0, 0, 0, '01/19/2017', '2017-01-17 11:17:45', '8.5', 'In Process'),
(7, 5, 'ORD000007', 'asda', '1234567899', 'rajiv.01sn@gmail.com', '2039', 'Pune, Maharashtra, India', 'as', 'as', '411011', 'Mumbai, Maharashtra, India', 'as', '400070', 2, '0', 0, 0, 0, '01/21/2017', '2017-01-21 10:05:02', '145', 'In Process'),
(8, 5, 'ORD000008', 'asdasdasd', '1234567899', 'asd@gmail.com', '2039', 'Pune, Maharashtra, India', 'asasd', 'asd', '411011', 'Mumbai, Maharashtra, India', 'asdasd', '400070', 2, '1', 0, 0, 0, '01/27/2017', '2017-01-21 10:08:34', '145', 'In Process'),
(9, 5, 'ORD000009', 'rajiv', '1234567899', 'rajiv.01sn@gmail.com', '2524', 'Pune, Maharashtra, India', 'pune', 'hadappsare', '411011', 'Mumbai, Maharashtra, India', 'mumbai', '400070', 8, '1', 0, 1, 0, '01/21/2017', '2017-01-21 10:16:52', '145', 'In Process'),
(10, 11, 'ORD000010', 'Niharika kshirsagar', '8805551181', 'jagoo.gm@gmail.com', '488', 'Panch Howd Mandal, Pune, Maharashtra, India', 'Kashi apartment, chruch road near panch houd mandal', 'Panch houd chruch', '411042', 'Poonam Garden Housing Society, Swami Vivekanand Road, Bibvewadi, Pune, Maharashtra, India', 'Poonam garden housing soceity near VIT college', '411037', 9, '0', 0, 0, 0, '01/23/2017', '2017-01-21 19:41:30', '2.5999999999999996', 'In Process'),
(11, 11, 'ORD000011', 'Niharika kshirsagar', '8805551181', 'jagoo.gm@gmail.com', '488', 'Panch Howd Mandal, Pune, Maharashtra, India', 'Kashi apartment near panch howd church', 'Panch houd mandal', '411042', 'Poonam Garden Housing Society, Swami Vivekanand Road, Bibvewadi, Pune, Maharashtra, India', 'Poonam garden housing society', '411037', 9, '2', 1, 0, 0, '01/23/2017', '2017-01-21 19:45:42', '2.5999999999999996', 'In Process'),
(12, 5, 'ORD000012', 'asda', '1234567899', 'asd@gmail.com', '2524', 'Pune, Maharashtra, India', 'hadapsar', 'pune highway', '411011', 'Mumbai, Maharashtra, India', 'mumbai', '400070', 8, '0', 0, 0, 0, '01/23/2017', '2017-01-23 12:11:43', '145', 'In Process'),
(15, 16, 'ORD000015', 'Babie zothanmawii', '8007071525', 'zoe.babe01@gmail.com', '599', 'Wanowrie, Pune, Maharashtra, India', 'Ananda bikes bldg. .near Oxford comforts', 'Oxford comforts', '411040', 'Kondhwa, Pune, Maharashtra, India', 'Kure apartment, opposite konark puram', '411048', 10, '0', 0, 0, 0, '02/04/2017', '2017-01-29 00:05:06', '0', 'Completed'),
(17, 24, 'ORD000017', 'Kuldeep', '9886273167', 'thakurs1990@gmail.com', '359', 'Kharadi, Pune, Maharashtra, India', 'Gera Emerald', 'EON It Park', '411014', 'Bhagyashree, Amanora Park Town, Pune, Maharashtra, India', 'Ela Vascon Malwadi road near Bhagyashree', '411028', 2, '0', 0, 0, 0, '03/02/2017', '2017-03-02 15:52:04', '5.0', 'In Process'),
(18, 25, 'ORD000018', 'deepak', '9930121252', 'deepak1821@gmail.com', '385', 'Mirchandani Palms, Pimpri-Chinchwad, Maharashtra, India', 'mirchandani palms', '411017', '411027', 'Sai Dreams, Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'sai dreams', '411027', 8, '0', 0, 0, 0, '03/27/2017', '2017-03-23 10:56:32', '2.4', 'In Process'),
(19, 29, 'ORD000019', 'Nikhil Digrase', '7276970448', 'nikhildigrase@gmail.com', '599', 'Gini Viviana, Madhuban Society Road, Balewadi, Pune, Maharashtra, India', 'C502, Gini VIviana', 'MITCON College Balewadi', '', 'Astonia, Balewadi, Pune, Maharashtra, India', 'G-603, Astonia, Behind Sapphire Park', '', 10, '0', 0, 0, 0, '04/01/2017', '2017-03-30 21:01:42', '0.9', 'In Process'),
(20, 30, 'ORD000020', 'bhawneet', '8888853997', 'bhawneetsngh@gmail.com', '499', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'near shivar garden pashan pune', 'near shivar gardens', '411027', 'Pashan, Pune, Maharashtra, India', 'backside audi showroom', '411008', 8, '0', 0, 0, 0, '04/01/2017', '2017-04-01 10:15:20', '10.0', 'In Process'),
(21, 31, 'ORD000021', 'Anushka Sh2', '7744834340', 'anu_shirodkar@yahoo.co.in', '497.5', 'Shivar Garden, Pimple Saudagar, Chinchwad, Maharashtra, India', 'Niranjan colony ', 'Behind element 5 Building ', '411019', 'Pashan-Sus Road, Pashan, Pune, Maharashtra, India', 'Kiran songar society ', '411021', 8, '0', 0, 0, 0, '04/01/2017', '2017-04-01 10:35:43', '9.9', 'In Process'),
(22, 32, 'ORD000022', 'Sailaxmi ', '9952969934', 'sailaxmiramesh@yahoo.co.in', '', 'Koregaon Park, Pune, Maharashtra, India', 'Flat No. 15, 3rd floor, Sukhwani Classic, South Main Road (Off Lane 5), ', 'Above Yes Bank Atm ', '411001', 'Aircastle, Hinjawadi, Maharashtra, India', 'E, 603,', '411033', 2, '0', 0, 0, 0, '04/05/2017', '2017-04-05 12:58:50', '', 'In Process'),
(23, 33, 'ORD000023', 'Harshad bajpai', '8308110358', 'hhdbjp@gmail.com', '421', 'Royal mirage Society, Hinjawadi, Pune, Maharashtra, India', 'Flat B 1104', 'Near Atlanta society', '411057', 'Nandanvan Society, Pimple Nilakh, Pimpri-Chinchwad, Maharashtra, India', 'B-2 ', '411027', 8, '0', 0, 0, 0, '04/15/2017', '2017-04-07 20:50:20', '4.8', 'In Process'),
(24, 34, 'ORD000024', 'Abhishek khanna', '7350852574', 'abhishekmkhanna@yahoo.com', '', 'Gurudwara Road, Akurdi, Pimpri-Chinchwad, Maharashtra, India', 'F-2 agree apartment, behind moni Baba ashram, akurdi gurudwara', 'Akurdi railway station', '411044', 'Shriyans Punawale, Rasikwadi, Pimpri-Chinchwad, Maharashtra, India', 'B-101 shriyans, Malwadi punawale', '411033', 10, '0', 0, 0, 0, '04/09/2017', '2017-04-09 09:39:49', '', 'In Process'),
(25, 34, 'ORD000025', 'Abhishek khanna', '7350852574', 'abhishekmkhanna@yahoo.com', '719', 'Akurdi Railway Station, Nigdi, Pimpri-Chinchwad, Maharashtra, India', 'F-2 agree apartment, behind moni Baba ashram, akurdi gurudwara', 'Akurdi railway station', '411044', 'Shriyans Punawale, Rasikwadi, Pimpri-Chinchwad, Maharashtra, India', 'B-101 shriyans, Malwadi punawale', '411033', 10, '4', 1, 1, 0, '04/09/2017', '2017-04-09 09:43:26', '7.8', 'In Process'),
(26, 36, 'ORD000026', 'aaa', '1111111111', 'ab@12.gh', '9199', 'Lonavala, Maharashtra, India', 'kkjkj', 'jkjk', '423105', 'Sangamner, Maharashtra, India', 'kkjkj', '413203', 12, '0', 0, 0, 0, '04/22/2017', '2017-04-21 18:06:43', '270', 'In Process'),
(27, 36, 'ORD000027', 'hjhjhhjhjh', '0121212121', 'ab@12.gh', '469', 'Tokyo Station, Chiyoda, Tokyo, Japan', 'jhjhjk', 'jhjhjh', '100-0005', 'Tokyo Station, Chiyoda, Tokyo, Japan', 'jjhjhjh', '100-0005', 9, '0', 0, 0, 0, '04/21/2017', '2017-04-21 18:13:35', '1 m', 'In Process'),
(28, 37, 'ORD000028', 'Pramod Vyas', '7972370285', 'pramodvyas4391@gmail.com', '327.8', 'Magarpatta City, Pune, Maharashtra, India', 'G 201, Sylvania Society', 'NA', '411028', 'Sundar Sankul Society Road, Dnyandeep Society, Pune, Maharashtra, India', 'B3, Dyandeep Society, Survey No 151/11', '411028', 2, '0', 0, 0, 0, '04/22/2017', '2017-04-21 21:35:30', '2.4', 'Completed'),
(29, 38, 'ORD000029', 'Rakesh Deshmukh', '9987429550', 'rakesh.deshmukh81@gmail.com', '1181', 'Gyan Ganga, Nakhate Vasti, Pimpri-Chinchwad, Maharashtra, India', 'Gyan Ganga, Nakhate Vasti, Pimpri-Chanchwad, Maharashtra, India', 'Tambe School', '411027', 'Shriyans Punawale, Rasikwadi, Pimpri-Chinchwad, Maharashtra, India', 'Shriyans Punawale, Rasikwadi, Pimpri-Chinchwad, Maharashtra', '411033', 11, '3', 1, 0, 0, '04/30/2017', '2017-04-23 08:37:11', '9.4', 'Completed'),
(30, 39, 'ORD000030', 'Abhishek Dubey', '8888833124', 'abhishek0001dubey@gmail.com', '1191.5', 'Dreams Aakruti, Pune, Maharashtra, India', 'dreams aakruti, kalepedal, hadapsar, pune', 'near railway gate', '411028', 'Sai Sankul Apartment, Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'sai sankul apartment, rahatni, pimpri-chinchwad, maharashtra', '411017', 10, '0', 0, 0, 0, '04/30/2017', '2017-04-23 21:11:57', '23.7', 'Completed'),
(31, 40, 'ORD000031', 'GARVIT JAIN', '8975327097', 'garvit2204@gmail.com', '479', 'Sakal Nagar, Pune, Maharashtra, India', 'raunak apartments sakal nagar', 'bremen chok', '411007', 'Bremen Chowk Bus Stand, Vidyapeeth Road, Pune University, Pune, Maharashtra, India', 'bremen chok', '411007', 8, '0', 0, 0, 0, '04/30/2017', '2017-04-29 21:28:38', '4.0', 'In Process'),
(32, 42, 'ORD000032', 'Raja Bhowmick', '9674289654', 'bhowmikraja@gmaiil.com', '547', 'Sparklet Megapolis, Sparklet Internal Road, Phase 3, Pimpri-Chinchwad, Maharashtra, India', 'A3 503 Megapolis Sparklet', 'Megapolis', '411057', 'Pristine Prolife, Pimpri-Chinchwad, Maharashtra, India', 'D 301, Pristine Prolife Phase I', '411057', 8, '0', 0, 0, 0, '05/01/2017', '2017-04-30 21:54:58', '7.4', 'Completed'),
(33, 43, 'ORD000033', 'sumit saini', '9960610560', 'swiftsumitsaini@gmail.com', '432.2', 'Baner, Pune, Maharashtra, India', 'Twin Nest Apartments Ward No. 8, Someshwarwadi, Pashan Pune, Maharashtra 411045', 'Near hotel rajwada', '411045', 'Akurdi Railway Station, Nigdi, Pimpri-Chinchwad, Maharashtra, India', 'Walhekar Wadi, Chinchwad, Datta Nagar Rd, Sector No. 30, Nigdi, Pimpri-Chinchwad, Maharashtra 411033', '411044', 2, '0', 0, 0, 0, '05/03/2017', '2017-05-03 17:27:38', '11.1', 'Cancel'),
(34, 45, 'ORD000034', 'Rahul Agrawal', '9028112208', 'rahul_2k71@yahoo.co.in', '805', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Flat no 302 silver royal rajveer Palace phase 2 kunal icon road pimple saudagar pune', 'Maharashtra', '411027', 'Manik Baug, Anand Nagar, Pune, Maharashtra, India', 'Flat no 103 neelkanth apartment near ioc petrol pump ', '411051', 8, '2', 1, 0, 0, '05/07/2017', '2017-05-07 10:16:37', '20.3', 'Completed'),
(35, 45, 'ORD000035', 'Rahul Agrawal', '9028112208', 'rahul_2k71@yahoo.co.in', '805', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Flat no 302 silver royal rajveer Palace phase 2 kunal icon road pimple saudagar pune', 'Maharashtra', '411027', 'Manik Baug, Anand Nagar, Pune, Maharashtra, India', 'Flat no 103 neelkanth apartment near ioc petrol pump ', '411051', 8, '0', 1, 0, 0, '05/07/2017', '2017-05-07 10:22:11', '20.3', 'Completed'),
(36, 48, 'ORD000036', 'rishi', '9552521729', 'rishiraaz@gmail.com', '1180', 'wisteria bhumkar cowk', 'WISTERIA APPARTMENTS, NEAR NEW POONA BAKERY, WAKAD', 'Maharashtra', '411033', 'vanalika lavale', 'vanalika ', '412115', 10, '0', 0, 0, 0, '05/20/2017', '2017-05-11 22:28:52', '17.7', 'In Process'),
(37, 49, 'ORD000037', 'Gautam Khetan', '9011095421', 'gautam_khetan@yahoo.com', '664', 'Kaspate Vasti, Pimpri-Chinchwad, Maharashtra, India', 'A-602, Florencia', 'Opp PCMC school', '411057', 'Punawale, Pimpri-Chinchwad, Maharashtra, India', 'Shriyans, B-107', '411033', 9, '0', 0, 0, 0, '05/23/2017', '2017-05-22 18:13:26', '8.6', 'Completed'),
(38, 50, 'ORD000038', 'Sanjay Khetan', '9903391501', 'in.sanjay@gmail.com', '1217.5', 'Kalpataru Serenity, Shiv Malhar Colony, Pune, Maharashtra, India', 'Kalpataru Serenity, Flat No 6A 405, Manjari Road, Mahadeo Nagar, Hadapsar', 'Navratan karyala', '412307', 'Astonia Classic, Kondhwa-Undri-Saswad Road, Undri, Pune, Maharashtra, India', 'Astonia Classic', '412308', 11, '0', 0, 0, 0, '06/16/2017', '2017-05-28 18:05:06', '9.1', 'In Process'),
(39, 51, 'ORD000039', 'Chandra Mohan K', '7030744779', 'raju.chandru82@gmail.com', '327.8', 'Saarrthi Sovereign, Pune, Hinjewadi Rajiv Gandhi Infotech Park, Pimpri-Chinchwad, Maharashtra, India', 'Flat # C2- 804, ', 'Near Punjabi Rasoi hotel', '411057', 'Life republic, Marunji Road, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'Flat # R4 D 404', '411057', 2, '0', 0, 0, 0, '06/02/2017', '2017-05-29 09:34:01', '2.4', 'In Process'),
(40, 52, 'ORD000040', 'Anup kumar sahoo', '8981077774', 'sahoo.anupkumar@gmail.com', '428.6', 'Dwarka Queen\'s Park, Rahatani Road, Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'D2- 601', 'Nr Rainbow plaza', '411027', 'Megapolis Sangria Society, Phase 3, Pune, Maharashtra, India', 'B 1206', '411057', 2, '0', 0, 0, 0, '05/31/2017', '2017-05-31 00:12:28', '10.8', 'In Process'),
(41, 54, 'ORD000041', 'Yogesh Sherekar', '8792319202', 'sherekaryp@gmail.com', '817', 'Verve Residency, Wakad, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'D401', 'Bhumkar square', '411057', 'Puranik\'s Aldea Espanola, Pune, Maharashtra, India', 'A501', '411045', 10, '0', 0, 0, 0, '03/060/2017', '2017-06-02 07:22:45', '5.6', 'In Process'),
(42, 54, 'ORD000042', 'Yogesh Sherekar', '8792319202', 'sherekaryp@gmail.com', '1323', 'Verve Residency, Wakad, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'D401', 'Bhumkar square', '411057', 'Puranik\'s Aldea Espanola, Pune, Maharashtra, India', 'D501', '411045', 12, '0', 1, 0, 0, '03/06/2017', '2017-06-02 08:14:06', '5.6', 'Completed'),
(43, 55, 'ORD000043', 'Ajay Kumar', '8551921056', 'kajay1312@gmail.com', '527', 'Army Institute of Technology, Pune, Maharashtra, India', 'Army Institute of Technology, Pune, Maharashtra, India', 'Dighi Hills Alandi Road', '411015', 'Crosswinds, Baner, Pune, Baner Road, Lalit Estate, Pune, Maharashtra, India', 'Crosswinds, Baner, Pune, Baner Road, Lalit Estate, Pune, Maharashtra, India', '411045', 2, '0', 0, 0, 0, '06/03/2017', '2017-06-03 12:20:45', '19', 'Completed'),
(44, 59, 'ORD000044', 'aman ', '7250000017', 'sinha8283@gmail.com', '403.4', 'Eva, Bavdhan, Pune, Maharashtra, India', 'a201 eva Anshul bavdhan', 'timberic furniture', '411021', 'Vinayak Residency, Enzigma Lane, Baner, Pune, Maharashtra, India', 'vinayak residency baner pune', '411045', 2, '0', 0, 0, 0, '06/23/2017', '2017-06-23 10:41:52', '8.7', 'Completed'),
(45, 60, 'ORD000045', 'RAHUL MEHRA', '8109793009', 'mehra.rahul980@gmail.com', '324.2', 'Sadguru Colony Number 3, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'C 201,SWAMI SAMARTH RESIDENCE', 'NEAR PRATHAM WINES', '411057', 'Reflections Apartments, Kalewadi Main Road, Wakad, Maharashtra, India', 'A402', '411033', 2, '0', 0, 0, 0, '06/29/2017', '2017-06-27 14:06:00', '2.1', 'Completed'),
(46, 62, 'ORD000046', 'Prashant Funde', '8149193169', 'prashantfunde91@gmail.com', '397.4', 'Dattawadi, Pune, Maharashtra, India', 'anant aparment  tapobhumi society', 'mhasoba chowk', '411030', 'Bavdhan, Pune, Maharashtra, India', 'vanashri B , Lane no 4', '411021', 2, '0', 0, 0, 0, '07/01/2017', '2017-07-01 13:16:29', '8.2', 'Completed'),
(47, 64, 'ORD000047', 'sanket lodha', '9028335011', 'sanket5793@gmail.com', '3119', 'Kalwa, Thane, Maharashtra, India', 'kharegao naka, anand vihar society', 'kharegao railway crossing', '400605', 'Kalpataru Estate Phase-1, Damodar Jagtap Path, Pimple Gurav, Pimpri-Chinchwad, Maharashtra, India', 'pimple gurav', '411027', 8, '0', 0, 0, 0, '07/04/2017', '2017-07-03 08:45:45', '136', 'In Process'),
(48, 64, 'ORD000048', 'sanket lodha', '9028335011', 'sanket5793@gmail.com', '3849', 'Kalwa, Thane, Maharashtra, India', 'anand vihar chs, kharegao naka', 'kharegao railway station', '400605', 'Kalpataru Estate Phase-1, Damodar Jagtap Path, Pimple Gurav, Pimpri-Chinchwad, Maharashtra, India', '2b phase 1', '411027', 9, '2', 0, 0, 0, '07/04/2017', '2017-07-03 09:17:13', '136', 'In Process'),
(49, 66, 'ORD000049', 'Akshay umate', '8983590123', 'akshay.umate@outlook.com', '', 'Kondhawe-Dhawade, Maharashtra, India', 'Urban gram', 'Urban gram', '411023', 'Bavdhan, Pune, Maharashtra, India', 'Nyati', '411021', 10, '0', 0, 0, 0, '07/29/2017', '2017-07-25 20:48:51', '', 'In Process'),
(50, 67, 'ORD000050', 'Vivek Bugale', '7588970804', 'vivekbugale@gmail.com', '', 'Baner, Pune, Maharashtra, India', '4A,Panchratna Society,Next to Bitwise,Opposite to Chaat bazzar', 'Near food court', '411045', 'Parihar Chowk, ITI Road, Shirine Garden, Pune, Maharashtra, India', 'Disha,near VIP showroom', '411007', 8, '0', 0, 0, 0, '07/27/2017', '2017-07-26 21:37:17', '', 'Completed'),
(51, 70, 'ORD000051', 'Tausif', '7875697464', 'tausif.nit@gmail.com', '453', 'Kapil Malhar, Baner Road, Baner, Pune, Maharashtra, India', 'T5-1201', 'Near K-Factory Restaurant', '411045', 'Albacitta, Pune, Maharashtra, India', '703', '411045', 8, '0', 0, 0, 0, '07/28/2017', '2017-07-28 15:40:28', '2.7', 'In Process'),
(52, 71, 'ORD000052', 'Rahul Roy', '8551017333', 'royrahul1975@gmail.com', '6979', 'Bavdhan, Pune, Maharashtra, India', 'Bavdhan', 'LMD Chowk', '411021', 'Nasik Road, Nashik, Maharashtra, India', 'nasik road', '422006', 10, '0', 0, 0, 0, '09/01/2017', '2017-08-10 14:45:21', '211', 'In Process'),
(53, 71, 'ORD000053', 'Rahul', '8551017333', 'royrahul1975@gmail.com', '8284', 'Bavdhan, Pune, Maharashtra, India', 'riddhi siddhi', 'LMD chowk', '411021', 'Nasik Road, Nashik, Maharashtra, India', 'matoshri nagar', '422006', 11, '4', 1, 0, 0, '09/01/2017', '2017-08-10 14:51:15', '211', 'In Process'),
(54, 72, 'ORD000054', 'Aadarsh Pandey ', '8305869268', 'aadarsh107@gmail.com', '570.2', 'Wakad Chowk, Shankar Kalat Nagar, Pimpri-Chinchwad, Maharashtra, India', 'D 902 zenone society wakad', 'Maharashtra', '411057', 'Kharadi, Pune, Maharashtra, India', 'A 2 Accolade society kharadi infront of premier in hotel kharadi', '411014', 2, '0', 0, 0, 0, '08/12/2017', '2017-08-12 12:54:07', '22.6', 'In Process'),
(55, 69, 'ORD000055', 'ASHISH SHELKE', '8087642492', 'ashishshelke988@gmail.com', '587', 'Bavdhan, Pune, Maharashtra, India', 'VANASHREE APARTMENT', 'NEAR MAHARASHTRA BANK', '411021', 'Nanded City, Nanded, Pune, Maharashtra, India', '701 A18 MANGAL BHAIRAV', '411041', 8, '0', 0, 0, 0, '08/23/2017', '2017-08-23 11:06:32', '9.4', 'Completed'),
(56, 77, 'ORD000056', 'Deepa Mali', '8605715510', 'deeps.quity@gmail.com', '390.2', 'Cassiopeia Classic, Baner Hill Trail, Baner, Pune, Maharashtra, India', 'Cassopiea Classic, Next to Supreme Amadore, Pan card club road, Baner, Pune', 'Pune', '411021', 'Westend Village B Building, Bhusari Colony, Pune, Maharashtra, India', 'Westend Village B Building, near Royal Enfield showroom, Kothrud, Pune', '411038', 2, '1', 0, 0, 0, '10/02/2017', '2017-10-01 18:19:56', '7.6', 'Completed'),
(57, 77, 'ORD000057', 'Deepa Mali', '8605715510', 'deepamali667@gmail.com', '390.2', 'Cassiopeia Classic, Baner Hill Trail, Baner, Pune, Maharashtra, India', 'Cassopiea classic, next to Supreme Amadore, pan card club road, Baner, Pune.', 'Next to Supreme Amadore', '411021', 'Westend Village B Building, Bhusari Colony, Pune, Maharashtra, India', 'Westend Village, Building B, next to Royal Enfield showroom, Kothrud, Pune.', '411038', 2, '0', 0, 0, 0, '10/02/2017', '2017-10-02 08:27:52', '7.6', 'Cancel'),
(58, 82, 'ORD000058', 'Siddhartha Chowdhury', '9038043198', 'siddhartha.chowdhury92@gmail.com', '343.4', 'Saundarya Garden, Pune, Maharashtra, India', 'Parlhad Niwas, Near Hotel Madhuban', 'Hotel Madhuban', '411057', 'Royal Mirage Society, Hinjawadi, Pune, Maharashtra, India', 'Royal Mirage Soceity', '411057', 2, '0', 0, 0, 0, '10/29/2017', '2017-10-29 09:22:12', '3.7', 'Completed'),
(59, 87, 'ORD000059', 'aney malik', '9212154183', 'aneymalik@rediffmail.com', '2983', 'Nyay Khand I, Ghaziabad, Uttar Pradesh, India', 'Gaur Green Vista , C 1104 , Indirapurum', 'Near MORE ', '201014', 'Sector 106, Gurugram, Haryana, India', 'Chintels Paradiso , T D 604 , Sector 106 Gurugram', '122006', 12, '0', 0, 0, 0, '12/09/2017', '2017-11-25 09:42:03', '47.1', 'Completed'),
(60, 89, 'ORD000060', 'Yashaswi mandle', '7972099131', 'yashwasimandle48@gmail.com', '615', 'Yashwin Society, Sus, Pune, Maharashtra, India', 'C 1103 yashwin society', 'Near teerth tower', '411045', 'Kasba Peth, Pune, Maharashtra, India', 'Ravivar peth', '411011', 8, '0', 0, 0, 0, '11/28/2017', '2017-11-28 12:03:22', '10.8', 'Completed'),
(61, 89, 'ORD000061', 'Yashaswi mandle', '7972099131', 'yashaswimandle48@gmail.com', '629', 'Yashwin Society, Sus, Pune, Maharashtra, India', 'C 1103 yashwin society', 'Near teerth tower', '411045', 'Ravivar Peth, Pune, Maharashtra, India', 'Ravivar peth', '411002', 8, '1', 0, 0, 1, '11/28/2017', '2017-11-28 12:05:54', '11.5', 'Completed'),
(62, 96, 'ORD000062', 'Shiv Kumar', '8999489623', 'djrhythmofficial@gmail.com', '299', 'IRIS Society, Balewadi High Street, Laxman Nagar, Pune, Maharashtra, India', 'IRIS Society, Balewadi High Street, laxman Nagar, Pune Maharashtra', 'Cummins india', '411045', 'Chaitanya Platinum, Balewadi Gaon, Pune, Maharashtra, India', 'Chaitanya Platinum, Balewadi Gaon, Pune, Maharashtra', '411045', 2, '1', 0, 0, 0, '02/01/2018', '2018-02-01 07:58:57', '0.8', 'Completed'),
(63, 99, 'ORD000063', 'Prafulla Birla', '7350341214', 'prafulla.birla60@gmail.com', '337.4', 'Amar Heights, Wamanrao G More Road, Chikhalwadi, Bopodi, Pune, Maharashtra, India', 'Amar Heights, Wamanrai G More Road, Chikhalwadi, Bopodi, Pune, Maharashtra, India', 'Near Ambedkar Chowk', '', 'B U Bhandari Hillside Phase II, Baner Road, Baner, Pune, Maharashtra, India', 'B U Bhandari Hillside Phase II, Baner Road, Baner, Pune, Maharashtra, India', '', 2, '0', 0, 0, 0, '03/16/2018', '2018-03-16 03:36:44', '6.2', 'Completed'),
(64, 101, 'ORD000064', 'Amaresh Rai', '8217819238', 'amareshrai09@gmail.com', '351.8', 'Bella Casa, Sus, Pune, Maharashtra, India', '#401, Bella casa, Sus road', 'Near NEA pure homes', '411045', 'Kumar Shantiniketan, Pashan, Pune, Maharashtra, India', 'C1101, Kumar Shantiniketan', '411021', 2, '0', 0, 0, 0, '03/22/2018', '2018-03-19 22:42:21', '4.4', 'In Process'),
(65, 102, 'ORD000065', 'Pankaj Khandelwal', '7045358001', 'pankajshahra@gmail.com', '413', 'Shivtirth Nagar Society, Sector No. 34, Thergaon, Pimpri-Chinchwad, Maharashtra, India', 'Flat No. C1-4,', 'Near Kunal Hotel', '', 'Purple Bloom, Maule Nagar, Dighi, Pimpri-Chinchwad, Maharashtra, India', 'D-1102', '', 2, '0', 0, 0, 0, '03/31/2018', '2018-03-23 23:09:18', '9.5', 'In Process'),
(66, 104, 'ORD000066', 'Anirban Chakraborty', '8293976285', 'anirbanc338@gmail.com', '976', 'Megapolis Splendour CHS Ltd., Splendour Society, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'A18-303', 'Megapolis, Hinjewad Phase III', '411057', 'Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'Rahatni', '', 10, '2', 0, 0, 0, '03/31/2018', '2018-03-29 13:21:14', '10.9', 'In Process'),
(67, 105, 'ORD000067', 'bhabani dash', '8553070460', 'bhabaniii_dash@yahoo.com', '874', 'Marathahalli, Bengaluru, Karnataka, India', '101,sadguru fortuna, 2nd cross ,hemanth nagar ,kalaandir', 'kalamandir ', '560037', 'K.R Puram, Bengaluru, Karnataka, India', '21,13th street sri vinayaka nagar , devasandra, kr puram ,bangalore-560036', '', 10, '0', 0, 0, 0, '03/31/2018', '2018-03-29 22:18:42', '7.5', 'Cancel'),
(68, 105, 'ORD000068', 'bhabani dash', '8553070460', 'bhabaniii_dash@yahoo.com', '874', 'Marathahalli, Bengaluru, Karnataka, India', '101 ,sadgura fortuna, 2nd cross , hemanth nagar , marathahalli', 'kalamandir', '', 'Devasandra Extension, Krishnarajapura, Bengaluru, Karnataka, India', '13th street,devasandra , kr puram, bangalore', '560036', 10, '2', 0, 0, 0, '03/31/2018', '2018-03-29 22:23:03', '7.5', 'Cancel'),
(69, 109, 'ORD000069', 'Amey Ghaisas', '8097873877', 'amey.ghaisas@yahoo.com', '4859', 'Dombivli, Maharashtra, India', '001, Suprasad Apt, Khandkar Lane, Tilaknagar', 'near tilak nagar high school', '421201', 'Sangvi, Pimpri-Chinchwad, Maharashtra, India', '201, Swami Samarth Apt, Lane no 2, Madhuban Soc, Sangvi, Pune', '', 8, '0', 0, 0, 0, '04/07/2018', '2018-04-06 19:37:51', '223', 'In Process'),
(70, 111, 'ORD000070', 'Hari Prasad K', '8754514765', 'khariprasad16@gmail.com', '416.6', 'Atlanta Apartments, Hinjawadi Flyover, Hinjawadi Village, Wakad, Pune, Maharashtra, India', 'A4-301, Atlanta Apartments, Hinjawadi, Pune- 411057', 'Near Saundarya Garden', '', 'Splendour, Megapolis, Splendour Society, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'A3-304, Splendour Megapolis, Hinjawadi phase 3, Pune -411057', '', 2, '0', 0, 0, 0, '04/14/2018', '2018-04-13 19:32:39', '9.8', 'In Process'),
(71, 112, 'ORD000071', 'Hemant Dhamanaskar', '9773528974', 'hemantdhamanaskar@gmail.com', '415', 'Swan mill sewari ', '', '', '', 'Building No 15, Abhyudaya Nagar Road, Kala Chowky, Abhyudaya Nagar, Parel, Mumbai, Maharashtra, India', '', '400033', 8, '3', 0, 0, 0, '04/17/2018', '2018-04-16 22:41:36', '0.8', 'In Process'),
(72, 114, 'ORD000072', 'Ankur Sharma', '8407999950', 'ankur.sharma2305@gmail.com', '769', 'SNBP International School, CID Colony, Rahatani, Pimpri-Chinchwad, Pune, Maharashtra, India', 'Greenland society, Near SNBP school, kokane chowk', 'SNBP school', '411027', 'Riddhi Siddhi Heights, Chatrapati Chowk Road, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'A601 Riddhi Siddhi heights,wakad', '411057', 10, '0', 0, 0, 0, '04/26/2018', '2018-04-26 07:42:06', '4.0', 'In Process'),
(73, 115, 'ORD000073', 'shankar', '8851222766', 'SHANKARJSINGH@GMAIL.COM', '841', 'Greater Kailash I, New Delhi, Delhi, India', 'zamrudpur, greater kailash one, new delhi', 'Oppl L. S. R. College', '', 'Khanpur, New Delhi, Delhi, India', 'D-218, Krishna Park, Khanpur, new delhi', '110062', 10, '0', 0, 0, 0, '04/28/2018', '2018-04-27 12:52:58', '6.4', 'In Process'),
(74, 115, 'ORD000074', 'shankar', '8851222766', 'SHANKARJSINGH@GMAIL.COM', '841', 'Greater Kailash I, New Delhi, Delhi, India', 'zamrudpur, greater kailash part one, new delhi', 'Opp. L. S. R. College', '110048', 'Khanpur, New Delhi, Delhi, India', 'D-218, Krishna Park, khanpur, devli road, new delhi', '110062', 10, '2', 0, 0, 0, '04/28/2018', '2018-04-27 12:55:28', '6.4', 'In Process'),
(75, 116, 'ORD000075', 'Shahvez Khan', '9999963258', 'shahvezk1@gmail.com', '361.4', 'Akshar Elementa, Tathawade, Pimpri-Chinchwad, Maharashtra, India', 'C1 205', 'Bhunkar Chowk', '', 'Prem Mairah Residency, Phase 1, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pune, Maharashtra, India', 'Flat 123', '411057', 2, '2', 0, 0, 0, '04/28/2018', '2018-04-28 15:44:17', '5.2', 'Completed'),
(76, 117, 'ORD000076', 'Gaurav', '8625819408', 'gaurav.1289@gmail.com', '649', 'Atria Society, Munjaba Vasti, Dhanori, Pune, Maharashtra, India', 'B2-310', 'Near Tingre Nagar', '', 'SAI TEJ, Dhanori - Tingre Nagar Road, Sai Dham Society, Laxmi Nagar, Dhanori, Pune, Maharashtra, India', 'Behind Bharat Dhaba', '', 10, '2', 0, 0, 0, '04/29/2018', '2018-04-28 17:20:20', '1.3', 'Cancel'),
(77, 118, 'ORD000077', 'Sandeep ', '7027001914', 'sandeepdubey15@gmail.com', '357.8', 'Mundka, New Delhi, Delhi, India', 'Mundka delhi', 'Near metro station ', '110041', 'Laxmi park nangloi delhi', 'Near nihal vihar nangloi', '110041', 2, '0', 0, 0, 0, '04/29/2018', '2018-04-28 20:20:32', '4.9', 'Cancel'),
(78, 120, 'ORD000078', 'Dhiraj Sethia', '9923796323', 'dhiraj.sethia@gmail.com', '745', 'Kunal Icon Co-operative Housing Society, Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'C6 302', 'Maharashtra', '411027', 'Topaz Park Road, Park Street, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Q202 Topaz Park', '411057', 10, '0', 0, 0, 0, '04/30/2018', '2018-04-30 09:47:48', '3.2', 'In Process'),
(79, 121, 'ORD000079', 'Santhosh Ballikonda', '8800226834', 'santhoshmlaa@gmail.com', '512.6', 'Prathamesh Park, Baner, Pune, Maharashtra, India', 'Flat 5, Guaravi Apartments, prathamesh Park Rd. Balewadi, baner', 'Prathamesh park', '411045', 'Magarpatta City, Hadapsar, Pune, Maharashtra, India', 'Trillium ', '411028', 2, '0', 0, 0, 0, '04/30/2018', '2018-04-30 10:22:33', '17.8', 'Completed'),
(80, 122, 'ORD000080', 'Priyadarshi', '9458704483', 'rai.priyadarshi31@gmail.com', '851', 'Pristine Prolife, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', '', '', '', 'Amanora Trendy Homes Tower 33, Amanora Park Town, Hadapsar, Pune, Maharashtra, India', '', '', 8, '0', 0, 0, 0, '05/01/2018', '2018-05-01 14:37:04', '22.6', 'Completed'),
(81, 123, 'ORD000081', 'Varun Saxena ', '7397811353', 'varun.iet@gmail.com', '', 'Nisarg Kiran Society, Nakhate Vasti, Baderaj Colony, Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'B 203', 'Mitcon ', '', '7 Avenues Apartments, Patil Nagar, Balewadi, Pune, Maharashtra, India', 'Flat c 202', '', 0, '0', 0, 0, 0, '05/01/2018', '2018-05-01 14:43:49', '', 'In Process'),
(82, 124, 'ORD000082', 'Pratik', '8087913243', 'magicianparad@gmail.com', '475', 'Sunshine Park Society, Balewadi Road, Laxmi Nagar, Balewadi Gaon, Baner, Pune, Maharashtra, India', 'C-105,', 'Jupiter Hospital', '', 'Rutuparna Society, Baner, Pune, Maharashtra, India', 'B-704', '', 8, '0', 0, 0, 0, '05/02/2018', '2018-05-02 14:32:51', '3.8', 'Completed'),
(83, 121, 'ORD000083', 'Santhosh Ballikonda', '8800226834', 'santhoshmlaa@gmail.com', '', 'Jasminium, Magarpatta City, Hadapsar, Pune, Maharashtra, India', 'Jasminium ', 'Magarpatta city', '', 'Skywards Nirvana, Greenfield Road, Amanora Park Town, Hadapsar, Pune, Maharashtra, India', '902', '', 8, '0', 0, 0, 0, '05/03/2018', '2018-05-03 18:37:36', '', 'Completed'),
(84, 127, 'ORD000084', 'Shambhavee', '9552750362', 'shambhvi48@gmail.com', '305', 'Veerbhadra Nagar, Baner, Pune, Maharashtra, India', 'Siddhant Residency, Veerbhadra Nagar , Lane 4. Baner', 'Opposite Yuthika Society ', '411045', 'Albacitta, Baner, Pune, Maharashtra, India', 'Albacitta, B 301, Pan Card Club Road, Veerbhadra Nagar Baner', '', 2, '0', 0, 0, 0, '05/12/2018', '2018-05-11 10:13:09', '0.5', 'In Process'),
(85, 130, 'ORD000085', 'Vishal Jogani', '7506707130', 'vchamp2130@gmail.com', '411', 'Vijayanta Co Operative Housing Society Limited, Manohar Satam Road, Nehru Nagar, Kurla East, Mumbai, Maharashtra, India', 'Vijayanta co operative soceity', 'Near kedarnath school', '400024', 'V Care Hospital & Intensive Care Unit, Nehru Nagar, Kurla, Mumbai, Maharashtra, India', 'V care hospital kurla', '560032', 8, '0', 0, 0, 0, '05/20/2018', '2018-05-20 13:12:36', '0.6', 'In Process'),
(86, 133, 'ORD000086', 'sridhar', '8698891827', 'sridharsrcm07@yahoo.in', '868', 'Abhimanshri Society Road Number 3, Abhimanshree Society, Pashan, Pune, Maharashtra, India', 'Abhimanshri Society Road Number 3, Abhimanshree Society, Pashan, Pune, Maharashtra, India', 'near volkswagen b.u.bhandari pashan road', '', 'Puraniks Aldea Espanola, Mahalunge, Pune, Maharashtra, India', 'Puraniks Aldea Espanola, Mahalunge, Pune, Maharashtra, India', '411045', 10, '0', 0, 0, 0, '05/27/2018', '2018-05-26 14:20:41', '7.3', 'In Process'),
(87, 135, 'ORD000087', 'JUHI Shrivastava ', '9819695082', 'simplyjuhi@gmail.com', '', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'B wing, poorva residency, pimple saudagar ', 'Lotus Hospital ', '', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Kunal icon ,pimple saudagar ', '', 2, '0', 0, 0, 0, '05/27/2018', '2018-05-27 14:29:35', '', 'In Process'),
(88, 135, 'ORD000088', 'juhi Shrivastava', '9819695082', 'simplyjuhi@gmail.com', '311', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'B wing, Poorva residency ', 'Lotus Hospital ', '', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Kunal icon, pimple saudagar ', '', 2, '1', 1, 0, 0, '05/27/2018', '2018-05-27 14:31:00', '1 m', 'In Process'),
(89, 136, 'ORD000089', 'Yash urade', '8308008124', 'yashurade20@icloud.com', '', 'Dahanukar Colony, Kothrud, Pune, Maharashtra, India', 'Flat no 10 sandip housing society lane no 2', 'Opposite to venky’s', '', 'Lokmanya Colony, Kothrud, Pune, Maharashtra, India', '11 lakmi krupa society ', '', 0, '0', 0, 0, 0, '05/28/2018', '2018-05-28 09:41:27', '', 'In Process'),
(90, 136, 'ORD000090', 'Yash Urade', '8308008214', 'yashurade20@icloud.com', '449', 'Dahanukar Colony, Kothrud, Pune, Maharashtra, India', 'flat no 10 sandip housing society.  Lane no 2', 'Near venky’s', '411058', 'Lokmanya Colony, Kothrud, Pune, Maharashtra, India', 'Flat no 11 laxmi krupa apt ', '411038', 8, '2', 1, 1, 0, '05/28/2018', '2018-05-28 09:46:16', '2.5', 'In Process'),
(91, 138, 'ORD000091', 'Akash Deep Singhal', '7738983120', 'akigupta131@gmail.com', '', 'Balkrishna lawns, Koregaon Park Annexe, Mundhwa, Pune, Maharashtra, India', 'Bungalow no. 4, Shri Krishna Society, Vadban Road', 'Near Balkrishna Lawns', '', 'Bella Casa, Sus, Pune, Maharashtra, India', '1206, Tower K', '', 0, '0', 0, 0, 0, '05/29/2018', '2018-05-29 13:09:34', '', 'In Process'),
(92, 139, 'ORD000092', 'Rahul Jain', '9893253099', 'rahuljain8910@gmail.com', '831', 'Magarpatta City, Hadapsar, Pune, Maharashtra, India', '', '', '', 'Sus Gaon, Sus, Pune, Maharashtra', '', '', 8, '2', 0, 0, 0, '05/30/2018', '2018-05-30 14:20:38', '21.6', 'In Process'),
(93, 140, 'ORD000093', 'Ashlesh Dahake ', '7709304280', 'dahakeashlesh@gmail.com', '679', 'Nanded, Maharashtra, India', 'Vishnupuri ', 'SGGSIE&T ', '431603', 'Delhi, India', 'BIC Noida', '110013', 10, '0', 0, 0, 0, '06/09/2018', '2018-05-31 21:19:34', '1,409', 'In Process'),
(94, 140, 'ORD000094', 'Ashlesh Dahake ', '7709304280', 'dahakeashlesh@gmail.com', '679', 'Nanded, Maharashtra, India', 'Vishnupuri ', 'SGGSIE&T ', '', 'Delhi, India', 'BIC GREATER NOIDA', '', 10, '0', 0, 0, 0, '06/09/2018', '2018-05-31 21:21:29', '1,409', 'In Process'),
(95, 141, 'ORD000095', 'Deepshikha Yadav', '7378612564', 'simiyadav78@gmail.com', '517', 'Pristine Prolife, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'I-105 pristine prolife Phase 1, Wakad', 'Sayaji Hotel', '411057', 'Blue Ridge - Paranjpe Schemes, Phase 1, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'Tower 21 Blue Ridge', '411057', 8, '0', 0, 0, 0, '06/01/2018', '2018-06-01 00:55:33', '5.9', 'In Process'),
(96, 141, 'ORD000096', 'Deepshikha Yadav', '7378612564', 'simiyadav78@gmail.com', '517', 'Pristine Prolife, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Pristine Prolife', 'Sayaji Hotel', '', 'Blue Ridge - Paranjpe Schemes, Phase 1, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'Tower 21 Blue Ridge', '411057', 8, '2', 0, 0, 0, '06/01/2018', '2018-06-01 00:56:53', '5.9', 'In Process'),
(97, 142, 'ORD000097', 'AVS Kishore', '9666613484', 'kk.abburi@gmail.com', '489', 'Gandhi Arcade, Borabanda - Allapur Road, Pramila Enclave, Kalyan Nagar, Moti Nagar, Hyderabad, Telangana, India', '8-3-167/K/79. G3', 'Motinagar ', '500018', 'CGR International School, Ayyappa Society, Mega Hills, Madhapur, Hyderabad, Telangana, India', 'VERakki Tech Services', '500081', 8, '0', 0, 0, 0, '06/01/2018', '2018-06-01 08:28:55', '4.5', 'In Process'),
(98, 144, 'ORD000098', 'Ankita Gajbhiye', '8411990444', 'ankita.gajbhiye31@gmail.com', '582.2', 'Magarpatta City, Hadapsar, Pune, Maharashtra, India', '', '', '', 'Casa Imperia - C Wing, Bhujbal Vasti, Wakad, Pimpri-Chinchwad, Maharashtra, India', '', '', 2, '0', 0, 0, 0, '06/03/2018', '2018-06-02 14:57:55', '23.6', 'In Process'),
(99, 145, 'ORD000099', 'Mohammed Sharook', '9551133773', 'sharook1996@gmail.com', '0', 'Padale Paradise, Mahalunge, Pune, Maharashtra, India', 'Padale Paradise, Mahalunge, Pune, Maharashtra', 'Behind Teerth Technospace', '', 'bharat forge, Mundhwa Industrial Area, Mundhwa, Pune, Maharashtra, India', 'bharat forge, Mundhwa Industrial Area, Mundhwa, Pune, Maharashtra, India', '', 0, '0', 0, 0, 0, '06/02/2018', '2018-06-02 18:52:30', '15.399999999999999', 'In Process'),
(100, 146, 'ORD000100', 'ANSHU KUMAR', '8378003767', 'Anshukchaudhary@gmail.com', '491', 'Mahipalpur, New Delhi, Delhi, India', 'A168 room no 32 desu gali mahipalpur', 'Near avishkar institute', '', 'Jyoti Park, Sector 7, Gurugram, Haryana, India', '654/28, gali no 13, jyoti park, sector 7, gurgaon', '', 2, '0', 0, 0, 0, '06/04/2018', '2018-06-04 01:01:23', '16', 'In Process'),
(101, 146, 'ORD000101', 'ANSHU KUMAR', '8378003767', 'Anshukchaudhary@gmail.com', '719', 'Mahipalpur, New Delhi, Delhi, India', 'A168 room no 32 desu gali mahipalpur', 'Avishkar institute', '110037', 'Jyoti Park, Sector 7, Gurugram, Haryana, India', '654/28 gali no 13', '122001', 8, '0', 1, 0, 0, '06/04/2018', '2018-06-04 01:05:12', '16', 'In Process'),
(102, 147, 'ORD000102', 'Tushar ', '8077433261', 'tusharsingh51@gmail.com', '591', 'New Ashok Nagar, New Delhi, Delhi, India', 'A140, gali no 16, block A ', 'Near Pal opticals', '110096', 'Govindpuri, New Delhi, Delhi, India', 'Gali no. 6, Govindpuri ', '110091', 8, '0', 0, 0, 0, '06/06/2018', '2018-06-06 12:45:43', '9.6', 'In Process'),
(103, 148, 'ORD000103', 'rushikesh dawakhar', '9503895621', 'rushimced@gmail.com', '3339', 'Manjari Budruk, Pune, Maharashtra, India', 'gopalpatti,ghule park,manjari', 'near marathi shala', '412307', 'Kopar Khairane, Gaothan, Sector 19, Kopar Khairane, Navi Mumbai, Maharashtra', 'koparkhirane ,navi mumbai', '400709', 8, '0', 0, 0, 0, '06/07/2018', '2018-06-07 10:45:43', '147', 'In Process'),
(104, 148, 'ORD000104', 'rushikesh ', '9503895621', 'rushimced@gmail.com', '3339', 'Manjari Budruk, Pune, Maharashtra, India', 'ghule park,gopalpatti,manjari', 'near marathi shala', '412307', 'Kopar Khairane, Navi Mumbai, Maharashtra, India', 'koparkhairane station', '400709', 8, '0', 0, 0, 0, '06/07/2018', '2018-06-07 10:50:08', '147', 'In Process'),
(105, 149, 'ORD000105', 'JAYA TRIPATHI', '7028899972', 'jayatripathi1468@gmail.com', '405.8', 'Baner, Pune, Maharashtra, India', 'Sai silicon G201', 'Cummins India office ', '', 'Kothrud, Pune, Maharashtra, India', 'FLAT 202 SHAIKH BUILDNG KOTHRUD NEAR NENE HOSPITAL', '', 2, '0', 0, 0, 0, '06/10/2018', '2018-06-10 16:38:23', '8.9', 'In Process'),
(106, 150, 'ORD000106', 'Mayank ', '8146043900', '8146043@gmail.com', '546.2', 'Greater Kailash Enclave II, Greater Kailash, New Delhi, Delhi, India', 'C-7 first floor greater kailash enclave 2', 'Near savitri cinema ', '', 'Gyan Khand 2, Indirapuram, Ghaziabad, Uttar Pradesh, India', 'Plot number 109 Ground floor 3', '201014', 2, '0', 0, 0, 0, '06/11/2018', '2018-06-11 06:05:14', '20.6', 'In Process'),
(107, 151, 'ORD000107', 'Ajit kumar ', '9741990123', 'akinfolica@gmail.com', '0', 'Exotica Dreamville, Gaur City 2, Greater Noida, Uttar Pradesh, India', 'Exotica dreamville tower 11 flat no 1306', 'Palm olympia ', '201009', 'Sector 56A, Faridabad, Haryana, India', 'Faridabad sector 56 A,  ', '121004', 0, '0', 0, 0, 0, '06/11/2018', '2018-06-11 09:28:04', '42.2', 'In Process'),
(108, 152, 'ORD000108', 'Leena', '9944639501', 'leenaranjini49@gmail.com', '3287', 'Samayapuram, Tamil Nadu, India', 'Trichy srm hospital', 'Chennai trichy highway', '621112', 'Chengalpattu, Tamil Nadu, India', 'New colony', '603001', 2, '0', 0, 0, 0, '06/13/2018', '2018-06-11 14:31:32', '249', 'In Process'),
(109, 153, 'ORD000109', 'Rishabh jain', '9860628225', 'rishabhjain017@gmail.com', '', 'Ganga Heritage Society, North Main Road, Ganga Fortune Society, Meera Nagar, Koregaon Park, Pune, Maharashtra, India', 'Flat no6', 'Opposite cello showroom', '', 'Rohan Seher Lane, Samarth Colony, Baner, Pune, Maharashtra, India', 'Rohan seher', '', 0, '0', 0, 0, 0, '06/11/2018', '2018-06-11 16:38:04', '', 'In Process'),
(110, 153, 'ORD000110', 'Rishabh', '9860628225', 'rishabhjain017@gmail.com', '', 'Ganga Heritage Society, North Main Road, Ganga Fortune Society, Meera Nagar, Koregaon Park, Pune, Maharashtra, India', 'Ganga heritage', 'Oppo celio', '', 'Rohan Seher Lane, Samarth Colony, Baner, Pune, Maharashtra, India', 'Rohan seher', '', 0, '0', 0, 0, 0, '06/12/2018', '2018-06-12 10:15:14', '', 'In Process'),
(111, 155, 'ORD000111', 'Shouvik Ghosh', '9748991713', 'ghoshshouvik88@gmail.com', '617', 'Life Republic Township, Pune, Maharashtra, India', 'R4/C/301. Life Repiblic Township. Pune', 'Kolte Patil', '', 'Sunflower Building, Baner Road, Baner, Pune, Maharashtra, India', 'Opposite to Dutta Mandir. Prime rose building. Next to Sunflower building.', '411045', 8, '1', 0, 0, 0, '06/17/2018', '2018-06-16 14:07:25', '10.9', 'In Process'),
(112, 155, 'ORD000112', 'Shouvik Ghosh', '9748991713', 'ghoshshouvik88@gmail.com', '', 'Life Republic Township, Pune, Maharashtra, India', 'R4/C/301. Life Repiblic Township. Pune', 'Kolte Patil', '410506', 'Shivranjan Towers, Ward No. 8, Someshwarwadi, Pashan, Pune, Maharashtra, India', 'B2/1003, Shiv Ranjan Tower.', '411008', 8, '0', 0, 0, 0, '06/17/2018', '2018-06-17 13:50:29', '', 'In Process'),
(113, 158, 'ORD000113', 'Aakash Kumar', '9731790626', 'aakash.kumar.ak@gmail.com', '756.5', 'Smondo 3.0, Neotown Road, Neotown, Electronic City, Bengaluru, Karnataka, India', 'D1101, Smondo 3, neotown, Electronics City Phase 1 Bangalore 560100', 'Neotown', '', 'Shreyas Health Centre, Nrupathunga Nagar, JP Nagar 7th Phase, JP Nagar, Kothnur, Karnataka, India', 'House No. 5, #7/8, Sri Kuladevatha Krupa', '', 9, '0', 0, 0, 0, '06/23/2018', '2018-06-21 14:28:16', '12.3', 'In Process'),
(114, 159, 'ORD000114', 'anoop', '9900479406', 'anunee2003@yahoo.co.in', '5574', 'Thrissur, Kerala, India', 'swathy residency,chembukavu', 'aswini junction,KERALA', '', 'Kannur, Kerala, India', 'chala', '670001', 9, '0', 0, 0, 0, '06/30/2018', '2018-06-22 21:39:50', '205', 'In Process'),
(115, 161, 'ORD000115', 'Ritanshu Singh', '7507898332', 'Ritanshu.singh10@gmail.com', '587', 'Gokhalenagar, Pune, Maharashtra, India', '3/21-Madhav, near shiv sena office', 'Shiv sena office', '', 'Akash Ganga D Wing, CID Colony, Rahatani, Pimpri-Chinchwad, Maharashtra, India', 'D-703, Akash ganga society', '', 8, '0', 0, 0, 0, '06/24/2018', '2018-06-24 13:50:02', '9.4', 'In Process'),
(116, 163, 'ORD000116', 'Rushikesh', '9860570116', 'aakankshajain08@yahoo.com', '301.4', 'Niljyoti, Niljyoti Society, Gokhalenagar, Pune, Maharashtra, India', '9, Shinde Vasti, Niljyoti Society, Gokhalenagar, Pune, Maharashtra 411016', 'Niljyoti society', '411016', 'Gokhalenagar, Pune, Maharashtra, India', 'Behind kamat mess, jethiram bhima shelar road', '', 2, '0', 0, 0, 0, '06/25/2018', '2018-06-25 16:05:28', '0.2', 'In Process'),
(117, 163, 'ORD000117', 'Aakanksha', '7744898637', 'aakankshajain08@yahoo.com', '301.4', 'Niljyoti Society, Gokhalenagar, Pune, Maharashtra, India', '9, Shinde Vasti, Niljyoti Society, Gokhalenagar, Pune, Maharashtra 411016', 'Niljyoti society', '', 'Gokhalenagar, Pune, Maharashtra, India', 'Behind kamat mess, jethiram bhima shelar road.', '411016', 2, '2', 0, 0, 0, '06/25/2018', '2018-06-25 16:09:29', '0.2', 'In Process'),
(118, 165, 'ORD000118', 'Yashodip Bhavsar', '7709423942', 'yashodip02@gmail.com', '451', 'Uritnagar', 'Flat No 1, Shivkrupa Building, Uritnagar Warje', 'Behind Wanjale Complex, Near Hotel Saundarya', '', 'Popular Nagar, Giridhar Nagar, Warje, Pune, Maharashtra, India', 'Flat No 2, 2nd Floor, Matoshri House, Behind Hotel Darja, Near Pooja Snack Center, Popular Nagar Warje', '411058', 8, '0', 0, 0, 0, '06/26/2018', '2018-06-26 10:47:10', '2.6', 'In Process'),
(119, 166, 'ORD000119', 'Rutuja', '7507339829', '24rutujasuryawanshi@gmail.com', '493', 'Lake Pleasant, Adi Shankaracharya Marg, Phase 2, MHADA Colony 20, Powai, Mumbai, Maharashtra, India', '304 lake Pleasant', 'Powai lake', '', 'Sun Heights, HMPL Surya Nagar, Vikhroli West, Mumbai, Maharashtra, India', '504-Sun heights', '400083', 8, '0', 0, 0, 0, '06/27/2018', '2018-06-27 12:38:47', '4.7', 'In Process'),
(120, 168, 'ORD000120', 'Prabhakaran Thamaraikannan', '9168656975', 'karan1301@gmail.com', '1321', 'Ram Society, Yerawada, Pune, Maharashtra, India', '', '', '', 'Barlota Nagar, Mamurdi, Dehu Road, Maharashtra, India', '', '412101', 10, '2', 0, 0, 0, '06/30/2018', '2018-06-27 15:01:35', '22.4', 'In Process'),
(121, 169, 'ORD000121', 'Tania Liz Mathews', '7709322344', 'tanializ2709@gmail.com', '461', 'Ved Vihar Society, Mumbai Pune Bypass Road, Bhusari Colony, Kothrud, Pune, Maharashtra, India', 'flat no 607,building no 7,', 'ved bhavan', '411038', 'Runwal Savera, Ram Nagar, Bavdhan, Pune, Maharashtra, India', 'flat no 4', '411021', 8, '1', 0, 0, 0, '06/30/2018', '2018-06-28 20:27:07', '3.1', 'In Process'),
(122, 170, 'ORD000122', 'Apurav wagh', '9096602958', 'apurav.wagh@gmail.com', '1087.4', 'Ghanashyam Hostel., Wadgaon Budruk, Dhayari Phata, Pune, Maharashtra, India', '', '', '411041', 'Playtor Ranjangaon, Maharashtra, India', '', '412210', 2, '0', 0, 0, 0, '07/01/2018', '2018-06-30 08:18:32', '65.7', 'In Process'),
(123, 171, 'ORD000123', 'Anushree rao', '8087029099', 'anurao7000@gmail.com', '504.20000000000005', 'Kharadi, Pune, Maharashtra, India', 'A1-803, Beryl apartments', 'Fountain road', '411014', 'Baner, Pune, Maharashtra, India', '201 Supriya classic', '411045', 2, '0', 0, 0, 0, '06/30/2018', '2018-06-30 10:10:27', '17.1', 'In Process'),
(124, 171, 'ORD000124', 'Anushree rao', '8087029099', 'anurao7000@gmail.com', '504.20000000000005', 'Kharadi, Pune, Maharashtra, India', 'A1-803, beryl', 'Fountain road', '', 'Baner, Pune, Maharashtra, India', '201 Supriya classic', '', 2, '1', 0, 0, 0, '06/30/2018', '2018-06-30 10:13:45', '17.1', 'In Process'),
(125, 172, 'ORD000125', 'Ninad Chandoskar', '9920996647', 'ninad.chandoskar@gmail.com', '299', 'Green Thumb Society, Balewadi Phata, Baner, Pune, Maharashtra, India', 'A-107', 'Opp. Sam\'s Terminal', '', 'Oakwood Hills CHSL, Baner, Pune, Maharashtra, India', 'A-703', '', 2, '2', 1, 0, 0, '07/01/2018', '2018-06-30 19:10:44', '', 'In Process'),
(126, 173, 'ORD000126', 'Aditya Sharma', '7015382936', 'aditya6116@gmail.com', '366.2', 'Bhumkar Bridge, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Flat No. 202, Aristo Flats', 'Near CCD', '411057', 'Yuthika, Shreenath Society, Veerbhadra Nagar, Baner, Pune, Maharashtra, India', 'Flat No. 301, ', '411045', 2, '0', 0, 0, 0, '07/01/2018', '2018-07-01 01:13:24', '5.6', 'In Process'),
(127, 173, 'ORD000127', 'Aditya Sharma', '7015382936', 'aditya6116@gmail.com', '366.2', 'Bhumkar Bridge, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Flat no. 202, Ariato Flats', 'Near CCD', '411057', 'Yuthika, Shreenath Society, Veerbhadra Nagar, Baner, Pune, Maharashtra, India', 'Flat No. 301', '411045', 2, '0', 0, 0, 0, '07/01/2018', '2018-07-01 09:24:31', '5.6', 'In Process'),
(128, 176, 'ORD000128', 'Sumit', '9632525454', 'mac.sumit@gmail.com', '871', 'Suman Chowk, Block F, Chhatarpur Extension, Chhattarpur, New Delhi, Delhi', 'A71, suman chowk, Chhatarpur Extension delhi', 'Suman chowk', '110074', 'Tikona Park, Munirka, New Delhi, Delhi, India', '221A, munirka', '110067', 10, '0', 0, 0, 0, '07/02/2018', '2018-07-02 08:47:13', '7.4', 'In Process'),
(129, 178, 'ORD000129', 'Vivekanand khot', '9921272899', 'khot.vivekanand@gmail.com', '931', 'Fortune 108, Akemi Business School Road, Tathawade, Pimpri-Chinchwad, Maharashtra, India', '', '', '', 'Utsav Homes, Patil Nagar, Bavdhan, Sunarwadi, Maharashtra, India', '', '411021', 10, '1', 0, 0, 0, '07/03/2018', '2018-07-03 13:49:49', '9.4', 'In Process'),
(130, 177, 'ORD000130', 'Test', '7083671009', 'mazenagar@gmail.com', '5059', 'Releasemyad Media Pvt. Ltd., Budhwar Peth Road, Budhwar Peth, Pune, Maharashtra, India', 'sinhgad road', 'pune', '', 'Mumbai, Maharashtra, India', 'mumbai', '', 10, '2', 0, 0, 0, '07/05/2018', '2018-07-03 18:09:44', '147', 'Completed'),
(131, 180, 'ORD000131', 'Sameer Chakraborthy', '9764259674', 'sameer.chakraborthy@gmail.com', '579.8', 'Aundh, Pune, Maharashtra, India', 'C-2, Surobhi Enclave, Nagras Road, Aundh', 'India', '411007', 'Sinhagad Road, Khadakwasla Village, Khadakwasla, Pune, Maharashtra, India', 'Nanded Phata', '411024', 2, '0', 0, 0, 0, '07/06/2018', '2018-07-06 11:56:41', '23.4', 'In Process'),
(132, 183, 'ORD000132', 'Vineet kamboj', '9867176309', 'ar.vineetkamboj@live.com', '589', 'Sylvania, Magarpatta City, Hadapsar, Pune, Maharashtra, India', 'Sylvania', 'Seasons mall', '411028', 'Khese Park, Lohgaon, Pune, Maharashtra, India', 'Lane number 16', '', 8, '0', 0, 0, 0, '07/12/2018', '2018-07-12 19:37:39', '9.5', 'In Process'),
(133, 184, 'ORD000133', 'Rahul Kumar', '7607822024', 'rrahulkkumar95@gmail.com', '', 'Begumpur, New Delhi, Delhi, India', 'A 22, 2nd floor, beside mosque, near shiv mandir', 'Delhi', '', 'Subhash Nagar, New Delhi, Delhi, India', 'J-72B, nearby sheetla mata mandir', '', 2, '0', 0, 0, 0, '07/16/2018', '2018-07-16 19:48:16', '', 'In Process'),
(134, 184, 'ORD000134', 'Rahul Kumar', '7607822024', 'rrahulkkumar95@gmail.com', '509', 'Begumpur, New Delhi, Delhi, India', 'A 22, nearby mosque, near shiv mandir', 'Delhi', '', 'Subhash Nagar, New Delhi, Delhi, India', 'J-72B, near sheetla mata mandir', '', 2, '0', 0, 0, 0, '07/17/2018', '2018-07-16 19:51:14', '17.5', 'In Process'),
(135, 186, 'ORD000135', 'Devika Raj Shivhare ', '8888253929', 'devikashivhare96@gmail.com', '375.8', 'Laxmi Deep, Wakad Flyover, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'B-103 laxmi deep society, Wakad ', 'Wakad Hinjewadi Flyover ', '411057', 'Kapil Malhar Bungalow Road, Baner, Pune, Maharashtra, India', 'T-2 Kapil Malhar ', '411045', 2, '0', 0, 0, 0, '07/19/2018', '2018-07-19 14:49:54', '6.4', 'In Process'),
(136, 186, 'ORD000136', 'Devika Raj Shivhare ', '8888253929', 'devikashivhare96@gmail.com', '372.2', 'Laxmi Deep, Wakad Flyover, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'B-103 Laxmideep Society, Wakad ', 'Wakad Flyover ', '411057', 'Kapil Malhar, Baner Road, Baner, Pune, Maharashtra, India', 'T2 , 801 Kapil Malhar ', '', 2, '1', 0, 0, 0, '07/19/2018', '2018-07-19 14:52:47', '6.1', 'In Process'),
(137, 187, 'ORD000137', 'Harshvardhan Singh', '8010649185', 'asawat.harsh@gmail.com', '743', 'Sukhrali, Sector 17, Gurugram, Haryana, India', 'Gurunanak PG for Girls, Mata wali gali sukhrali', 'Near Purana Kunwa', '', 'Sector 44, Noida, Uttar Pradesh, India', 'Opposite Shiv Mandir sector 44', '', 2, '0', 0, 0, 0, '07/20/2018', '2018-07-19 17:31:21', '37', 'In Process'),
(138, 187, 'ORD000138', 'Harshvardhan', '8010649185', 'asawat.harsh@gmail.com', '743', 'Sukhrali, Sector 17, Gurugram, Haryana, India', 'Gurunanak PG for Girls, Mata wali gali ', 'Near Purana Kunwa', '', 'Sector 44, Noida, Uttar Pradesh, India', 'Shiv Mandir', '', 2, '0', 0, 0, 0, '07/20/2018', '2018-07-19 17:32:58', '37', 'In Process');
INSERT INTO `trans_user_inquery` (`id`, `user_id`, `order_id`, `fullname`, `mobileno`, `email`, `total_amount`, `pickuppoint`, `pickupAddress`, `pickupLandmark`, `pickupPincode`, `dropPoint`, `dropAddress`, `dropPincode`, `vehicle_id`, `labour`, `packers`, `storage`, `vehicle`, `BookingDate`, `inquery_datetime`, `total_distance`, `status`) VALUES
(139, 188, 'ORD000139', 'aniket', '9975498154', 'aniketchakole@live.com', '679', 'Bavdhan, Pune, Maharashtra, India', 'E wing shindenagar', 'Near marath mandir', '', 'Bavdhan, Pune, Maharashtra, India', 'Ganga legend', '411021', 10, '0', 0, 0, 0, '07/29/2018', '2018-07-20 10:06:39', '1 m', 'In Process'),
(140, 189, 'ORD000140', 'Jason raj', '9637369481', 'jasonraj1997@gmail.com', '471', 'Balewadi Phata, Baner, Pune, Maharashtra, India', 'Arti residence', 'Raasta cafe balewadi phata', '411045', 'Bella Casa, Sus, Pune, Maharashtra, India', 'Ball casa society', '411045', 8, '2', 0, 0, 0, '07/22/2018', '2018-07-22 05:09:42', '3.6', 'In Process'),
(141, 190, 'ORD000141', 'Tahir shaikh', '7738088824', 'tahirshaikh12@gmail.com', '', 'gandhi market ', 'T/59 BMC Chawl room no 34 near little angels high school opposite gandhi market sion west ', 'near little angels high school', '', 'dharavi 60 feet road ', 'dharavi 60 feet road sadha bhar buliding ', '', 0, '0', 0, 0, 0, '07/22/2018', '2018-07-22 11:38:13', '', 'In Process'),
(142, 190, 'ORD000142', 'tahir shaikh', '7738088824', 'tahirshaikh12@gmail.com', '948', 'Gandhi Market, Sion Hospital Colony, Sion, Mumbai, Maharashtra', 'T/59 BMC chawl room no 34 near little angels high school opposite gandhi market sion west ', 'near little angels high school', '', 'dharavi', 'dharavi 60 feet road ', '400017', 11, '3', 0, 0, 0, '07/22/2018', '2018-07-22 11:42:16', '1.4', 'In Process'),
(143, 191, 'ORD000143', 'Deeksha Nema', '9130081463', 'dn031193@gmail.com', '441', 'Sundar Sankul Society Road, North Hadapsar, Hadapsar, Pune, Maharashtra, India', 'E-304, Sundar Sankul', 'Near Noble Hospital', '411028', 'Roystonea, Royastonea Society, Magarpatta City, Hadapsar, Pune, Maharashtra, India', 'J 1004', '411028', 8, '0', 0, 0, 0, '07/26/2018', '2018-07-26 09:12:14', '2.1', 'In Process'),
(144, 194, 'ORD000144', 'Deepak tyagi', '9167516374', 'tyagideepak2512@gmail.com', '751', 'Ganga Village, Udyog Nagar, Hadapsar, Autadwadi Handewadi, Maharashtra, India', 'A3 ganga village', 'Ganga Village ', '411028', 'Nirmal Township, Sasane Nagar, Hadapsar, Pune, Maharashtra, India', 'Nirmal township', '411028', 10, '0', 0, 0, 0, '07/27/2018', '2018-07-26 23:24:57', '3.4', 'In Process'),
(145, 197, 'ORD000145', 'Tejaswi Macharla', '9908223907', 'tejaswimacharla7@gmail.com', '408.2', 'Shiv Sai Amul Gents & Ladies PG, Nav Jeevan Society, Sainath Nagar, Vadgaon Sheri, Pune, Maharashtra, India', 'Sri Swami Samarth Complex. Raghoba Patil Nagar lane 3.', 'Near Sainath Nagar chowk', '411014', 'Manjri Greens, Solapur Road, Manjri Greens Society, Manjri Bk, Pune, Maharashtra, India', 'Manjri greens society ', '', 2, '0', 0, 0, 0, '07/29/2018', '2018-07-28 21:13:25', '9.1', 'In Process'),
(146, 199, 'ORD000146', 'dhananjay ', '7447835863', 'kdhananjayns@gmail.com', '519.8', '3/24/1289/12, Walhekar Wadi Rd, Laxminagar, Matoshree Nagar, Sector No. 32, Nigdi, Pimpri-Chinchwad, Maharashtra 411033, India', '3/24/1289/12, Walhekar Wadi Rd, Laxminagar, Matoshree Nagar, Sector No. 32, Nigdi, Pimpri-Chinchwad, Maharashtra 411033', 'vasus balaji pure veg ', '411033', '9, Paud Rd, Bhagya Chintamani Nagar, Guruganesh Nagar, Kothrud, Pune, Maharashtra 411058, India', '9, Paud Rd, Bhagya Chintamani Nagar, Guruganesh Nagar, Kothrud, Pune, Maharashtra 411058', '411058', 2, '0', 0, 0, 0, '07/29/2018', '2018-07-29 13:27:42', '18.4', 'In Process'),
(147, 200, 'ORD000147', 'Murali Krishna Reddy Lakkireddy', '9168277083', 'lakki369@gmail.com', '1725', 'Ganga Cypress Society, Tathawade, Dattwadi, Maharashtra, India', 'Flat No 601, A Block', 'Near Ashwini International School', '411033', 'Fortune East Society, Thite Nagar, Chandan Nagar, Pune, Maharashtra, India', 'Flat No S3, C4 Block', '411014', 11, '0', 0, 0, 0, '08/01/2018', '2018-07-31 11:58:12', '23.6', 'In Process'),
(148, 201, 'ORD000148', 'Manikanta sai', '9087205889', 'saladimanikantasai@gmail.com', '910', 'Blue Ridge - Paranjpe Schemes, Phase 1, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pimpri-Chinchwad, Maharashtra, India', 'T7-401, BLUE RIDGE', 'Above green mart', '', 'Megapolis Sangria Towers, Phase 3, Hinjewadi Rajiv Gandhi Infotech Park, Hinjawadi, Pune, Maharashtra, India', 'Megapolis sangria, D1604', '', 10, '0', 0, 0, 0, '08/01/2018', '2018-07-31 22:33:28', '8.7', 'In Process'),
(149, 202, 'ORD000149', 'Rajat Singh', '8756438944', 'iamrjts24@gmail.com', '987', 'St Stephen’s Hospital Health Care Facility, DLF Phase 3, Sector 24, Gurugram, Haryana, India', 'S-56/1,Dlf phase 3', 'St Stephens hospital', '122010', 'Jain Mandir, Madhuban Road, Block B, Nirman Vihar, Preet Vihar, New Delhi, Delhi, India', 'Jain mandir', '110092', 8, '0', 0, 0, 0, '08/06/2018', '2018-08-06 01:54:09', '29.4', 'In Process'),
(150, 63, 'ORD000150', 'SunilShukla', '7018804440', 'snlshukla80@gmail.com', '', 'Cosmos, Magarpatta City, Hadapsar, Pune, Maharashtra, India', 'G-904', 'Near DC', '', 'Sonigara kesar society', 'D-606', '', 0, '0', 0, 0, 0, '08/15/2018', '2018-08-15 10:27:09', '', 'In Process'),
(151, 204, 'ORD000151', 'ram Kamble', '9654236512', 'aspirevisiondrive5@gmail.com', '6044', 'pune', 'Pune Katraj', 'icici bank katraj', '411011', 'mumbai', 'icici bank new mumbai', '400086', 11, '2', 1, 1, 1, '08/18/2018', '2018-08-18 17:35:46', '147', 'In Process'),
(152, 205, 'ORD000152', 'Sidhant Chatterjee', '7317010502', 'sidhant.c@outlook.com', '479', 'Kumar Paradise B1, BG Shirke Road, Kirtane Baugh, Magarpatta City, Hadapsar, Pune, Maharashtra, India', 'Kumar Paradise - B1 Main Gate', 'Near Gold Gym, Magarpatta City. ', '411028', 'Bloom Residency, Kapil Tranquil Greens Road, Aundh, Pune, Maharashtra, India', 'Bloom Residency, Baner', '411045', 2, '0', 0, 0, 0, '08/21/2018', '2018-08-21 02:47:06', '15', 'In Process'),
(153, 206, 'ORD000153', 'vipin rai', '9739422273', 'vipin4486@gmail.com', '1025', 'SURVEY NO: - 110/11/2, BANERMAHALUNGE ROAD, NEAR D-MART BANER, Baner, Pune, Maharashtra 411045', 'SURVEY NO: - 110/11/2, BANERMAHALUNGE ROAD, NEAR D-MART BANER, Baner, Pune, Maharashtra 411045', 'near Syngenta building baner', '411045', 'Yashwin Society, Sus, Pune, Maharashtra, India', 'Yashwin Society, Sus, Pune, Maharashtra, India', '411045', 11, '0', 0, 0, 0, '08/30/2018', '2018-08-22 14:30:00', '3.6', 'In Process'),
(154, 208, 'ORD000154', 'Pushpendra kushwaha ', '7774074178', 'pushpendrakush21@gmail.com', '', 'Aundh, Pune, Maharashtra, India', 'Flat no 6, Wing B, Castle world, tejaswani society Lane 2, Aundh ', 'Medipoint hospital ', '', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'RH 79, Sai Nisarg Park, Pimple Saudagar ', '', 0, '0', 0, 0, 0, '09/01/2018', '2018-08-24 01:22:42', '', 'In Process'),
(155, 211, 'ORD000155', 'Pankaj', '9834699351', 'pankajadubey@yahoo.co.in', '410.6', 'Concord Pushpak, Kutwal Colony, Lohgaon, Pune, Maharashtra, India', 'concord pushpak Porwal Road', 'Porwal Road', '', 'Sangamvadi, Pune, Maharashtra, India', 'sangamvadi parking 2', '', 2, '0', 1, 0, 0, '08/30/2018', '2018-08-27 13:59:15', '9.3', 'In Process'),
(156, 212, 'ORD000156', 'Geetika Bhatnagar', '9986940937', 'geetika2795@gmail.com', '694', 'Wakad, Pimpri-Chinchwad, Maharashtra, India', 'eros meadows', 'near chirayu hospital', '', 'Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'f-5/2, subhshree woods', '', 10, '2', 0, 0, 0, '09/01/2018', '2018-08-27 14:56:55', '4.5', 'In Process'),
(157, 214, 'ORD000157', 'Shinto C', '8553352462', 'shintosc571@gmail.com', '675', 'Sobha Habitech, Bangalore, Channasandra Main Road, Ambedkar Nagar, Whitefield, Bengaluru, Karnataka, India', 'Bangalore', 'KARNATAKA', '', 'EuroKids, Akshaya Nagar 2nd Block, Dr Ambedkar Nagar, Ramamurthy Nagar, Bengaluru, Karnataka, India', 'Bangalore', '', 8, '0', 0, 0, 0, '08/30/2018', '2018-08-28 10:18:20', '13.8', 'In Process'),
(158, 214, 'ORD000158', 'Shinto C', '8553352462', 'shintosc571@gmail.com', '675', 'Sobha Habitech, Bangalore, Channasandra Main Road, Ambedkar Nagar, Whitefield, Bengaluru, Karnataka, India', 'Jipin J', 'KARNATAKA', '', 'EuroKids, Akshaya Nagar 2nd Block, Dr Ambedkar Nagar, Ramamurthy Nagar, Bengaluru, Karnataka, India', 'Shinto', '', 8, '0', 0, 0, 0, '08/30/2018', '2018-08-28 10:22:21', '13.8', 'In Process'),
(159, 215, 'ORD000159', 'Arshad Ibrahim Bagwan', '8605112314', 'arshaddba108@gmail.com', '1306', 'Pachpir Chowk, Vijay Nagar, Kalewadi, Pimpri-Chinchwad, Maharashtra', 'Ramzan Attar,Building No-3,Panchnath Colony,Kokane Nagar,Kalewadi', 'K.G.N Manzil,Near Inorbis School,Manjari Road,Mundhwa', '', 'Keshav Nagar, Mundhwa, Pune, Maharashtra, India', 'Keshav Nagar, Mundhwa, Pune, Maharashtra, India', '', 10, '0', 0, 0, 0, '09/01/2018', '2018-08-29 00:13:42', '21.9', 'In Process'),
(160, 218, 'ORD000160', 'Manish Rahangdale', '8097739196', 'manishr12@gmail.com', '419', 'Shiv colony, Thergaon, Pimpri-Chinchwad, Maharashtra, India', 'Shivalay Heights, Shiv COlony, Datta Mandir Road, Thergoan', 'Wakad police Station', '', 'Shiv colony, Thergaon, Pimpri-Chinchwad, Maharashtra, India', 'Waves, Near Pashankar Witbhatti, Thergoan, Pune', '', 8, '0', 0, 0, 0, '09/01/2018', '2018-09-01 03:01:46', '1 m', 'In Process'),
(161, 219, 'ORD000161', 'Purushottam Yede', '8800545159', 'purushottamyede@gmail.com', '652', 'Raviraj Greenaria, BG Shirke Road, Shinde Vasti, Hadapsar, Pune, Maharashtra, India', 'flat no 308', 'Magarpatta', '', 'Sun Sapphire, Shinde Vasti, Hadapsar, Pune, Maharashtra, India', 'flat no 803', '', 10, '0', 0, 0, 0, '09/13/2018', '2018-09-04 16:40:41', '0.1', 'In Process'),
(162, 220, 'ORD000162', 'Pankaj Dutt Sandlesh', '9968292213', 'mspankajsharma@gmail.com', '889', 'Sumadhura Shikharam, Seegehalli Road, Seegehalli, Krishnarajapura, Karnataka, India', '', '', '', 'AECS Layout, Marathahalli, Bengaluru, Karnataka, India', '', '', 10, '2', 0, 0, 0, '09/08/2018', '2018-09-05 00:09:47', '8', 'In Process'),
(163, 220, 'ORD000163', 'Pankaj Dutt Sandlesh', '9968292213', 'mspankajsharma@gmail.com', '889', 'Sumadhura Shikharam, Seegehalli Road, Seegehalli, Krishnarajapura, Karnataka, India', 'E 504 sumadhura shikhram Apartments', 'Near Alpine Viva Apartments', '', 'AECS Layout, Marathahalli, Bengaluru, Karnataka, India', 'Flat no. 404, 5th Floor above narayana multispeciality hospital', '', 10, '2', 0, 0, 0, '09/08/2018', '2018-09-05 00:16:16', '8', 'In Process'),
(164, 221, 'ORD000164', 'Utkarsh Patil', '7020115493', 'utkarshpatil33@gmail.com', '', '52 Greenwoods, Pashan - Sus Road, Mohan Nagar Co-Op Society, Baner, Pune, Maharashtra, India', 'B-1104, 11th Floor, B-Building, 52 Greenwoods Society', 'Pashan-Sus Road, Behind Audi Showroom', '', 'Bird’s County, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'Flat No.301, Bird’s County, Munjoba Nagar 2, Bhumkar Chowk Road', '', 0, '0', 0, 0, 0, '09/08/2018', '2018-09-08 12:17:14', '', 'In Process'),
(165, 222, 'ORD000165', 'Yash Srivastava', '7007987367', 'yashsrivastava47@gmail.com', '', 'Dahanukar Colony, Dahanukar Colony, Kothrud, Pune, Maharashtra', 'Flat No. 3, Blue bell apartments, lane no. 7, Dhanukar Colony, kothrud', 'Cummins Company', '', 'Labhade Garden, Vasant Kamal Vihar, Warje, Pune, Maharashtra, India', 'Flat 303, wing A, Labhade garden, warje', '', 0, '0', 0, 0, 0, '09/09/2018', '2018-09-09 12:07:48', '', 'In Process'),
(166, 223, 'ORD000166', 'Siddhant Mukherjee', '9004739395', 'siddhant1715@gmail.com', '', 'Skyline at Wakad, Shankar Kalat Nagar, Wakad, Pimpri-Chinchwad, Maharashtra, India', 'D703', 'More Store', '', 'Somani Residency, Kate Wasti, Punawale, Pune, Maharashtra, India', 'A801', '', 0, '0', 0, 0, 0, '09/13/2018', '2018-09-09 17:57:37', '', 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `trans_user_login`
--

CREATE TABLE `trans_user_login` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `remember` tinyint(1) DEFAULT NULL,
  `street` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `city` varchar(150) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_user_login`
--

INSERT INTO `trans_user_login` (`user_id`, `email`, `mobileno`, `password`, `remember`, `street`, `landmark`, `city`, `pincode`, `state`, `country`, `image`, `status`, `create_date`, `updated_at`) VALUES
(3, 'dinesh@gmail.com', '9898988889', '7f9b9b86d253875664c014d90ca907e5', 1, '', '', '', '', '', '', NULL, 0, '2017-01-13 19:18:10', '2018-10-14 23:25:55'),
(4, '', '7722031760', 'fcfd7840d9adf3adfad3e12829348b66', 1, '', '', '', '', '', '', NULL, 0, '2017-01-14 16:18:15', '2018-10-14 23:25:55'),
(5, 'asd@gmail.com', '1234567899', '74773cdf6cc1d19323c5c98f64857fb4', 1, '', '', '', '', '', '', NULL, 0, '2017-01-17 11:00:37', '2018-10-14 23:25:55'),
(6, 'zxc@gmail.com', '1234567891', '3cb4897592deadc2b49deaa060554470', 1, '', '', '', '', '', '', NULL, 0, '2017-01-17 11:28:33', '2018-10-14 23:25:55'),
(7, 'abc@ymail.com', '1112323236', '5c236480c433777081e8afee546a5437', 1, 'kjkjkjk', 'jkjkjk', 'Pune', '4110045', 'Maharastra', 'India', NULL, 0, '2017-01-17 11:37:11', '2018-10-14 23:25:55'),
(8, 'amingogroup@gmail.com', '9919088786', '012247315e98f11c9a85bd9efa12f11c', 1, '', '', '', '', '', '', NULL, 0, '2017-01-18 22:21:10', '2018-10-14 23:25:55'),
(9, 'NirjaH56@gmail.com', '8390120183', 'fb26547048974b727e5ccbb127a3fec9', 1, '', '', '', '', '', '', NULL, 0, '2017-01-21 15:00:00', '2018-10-14 23:25:55'),
(10, 'rajkale@gmail.com', '8421618746', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-01-21 16:00:00', '2018-10-14 23:25:55'),
(11, 'kshirsagars21@gmail.com', '8805551181', '0830e957c474dd8cb6da2008578eead2', 1, '', '', '', '', '', '', NULL, 0, '2017-01-21 19:00:00', '2018-10-14 23:25:55'),
(12, 'sin2sagar83@gmail.com', '7506913142', 'f100f0b4f8c9e81c2add77919811cf7e', 1, '', '', '', '', '', '', NULL, 0, '2017-01-22 10:00:00', '2018-10-14 23:25:55'),
(14, 'tyu@hotmail.in', '4544455454', '95f2fce946be8d40bc94b1925e88b531', 1, 'kjkjkjjkjkj', 'bnbnbnbn', 'Pune', '411028', 'Maharastra', 'India', NULL, 0, '2017-01-23 12:00:00', '2018-10-14 23:25:55'),
(15, 'b2dashingdew1111@gmail.com', '7972906806', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-01-23 13:00:00', '2018-10-14 23:25:55'),
(16, 'zoe.babe01@gmail.com', '8007071525', '72beb891da85a13eb1683dc52e75a086', 1, '', '', '', '', '', '', NULL, 0, '2017-01-29 00:00:00', '2018-10-14 23:25:55'),
(17, 'poi@gmail.com', '1212121121', 'b38c9dd9fc33d1b26d805532a7386bf5', 1, '', '', '', '', '', '', NULL, 0, '2017-02-04 15:00:00', '2018-10-14 23:25:55'),
(19, 'ajitgund21@gmail.com', '9405405894', '8f0458e20dd7d46b01f907364948d406', 1, '', '', '', '', '', '', NULL, 0, '2017-02-15 18:00:00', '2018-10-14 23:25:55'),
(20, 'rahulparikh.msu@gmail.com', '7030222883', 'b52931aea509f899536e5a6603f8d08c', 1, '', '', '', '', '', '', NULL, 0, '2017-02-19 11:00:00', '2018-10-14 23:25:55'),
(21, 'rohitjain.mit@gmail.com', '8149895743', 'cfbbc949ad4ac9f3e78c44d0389769e3', 1, '', '', '', '', '', '', NULL, 0, '2017-02-23 18:00:00', '2018-10-14 23:25:55'),
(23, 'qwe.rty@ymail.com', '9689043877', 'c3e2f03f816a12f7a4b66d939f16ce8c', 1, '', '', '', '', '', '', NULL, 0, '2017-02-24 12:00:00', '2018-10-14 23:25:55'),
(24, 'thakurs1990@gmail.com', '9886273167', '31accafd2ce7fb23240e6b4aab11857c', 1, '', '', '', '', '', '', NULL, 0, '2017-03-02 15:00:00', '2018-10-14 23:25:55'),
(25, 'deepak1821@gmail.com', '9930121252', 'c8ef4d36849d1609bce61391cdfaaa70', 1, '', '', '', '', '', '', NULL, 0, '2017-03-23 10:00:00', '2018-10-14 23:25:55'),
(26, 'patilshekhar662@gmail.com', '9767340192', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-03-23 15:00:00', '2018-10-14 23:25:55'),
(27, 'siddiqui.owais888@gmail.com', '9987770669', '4e63c64aa923ff1e9c68b294b58d0900', 1, '', '', '', '', '', '', NULL, 0, '2017-03-24 12:00:00', '2018-10-14 23:25:55'),
(28, 'ssupriya7171@gmail.com', '8605379495', '8529c8bd1fac978499b3db1c51c4e08b', 1, '', '', '', '', '', '', NULL, 0, '2017-03-25 15:00:00', '2018-10-14 23:25:55'),
(29, 'nikhildigrase@gmail.com', '7276970448', 'f10372ca0d13a1f30e80bd904d1f0522', 1, '', '', '', '', '', '', NULL, 0, '2017-03-30 20:00:00', '2018-10-14 23:25:55'),
(30, 'bhawneetsngh@gmail.com', '8888853997', '563befa8c035100f994b49ded19818cf', 1, '', '', '', '', '', '', NULL, 0, '2017-04-01 10:00:00', '2018-10-14 23:25:55'),
(31, 'anu_shirodkar@yahoo.co.in', '7744834340', 'e3a552abb797d4f76d53211cc9fccf96', 1, '', '', '', '', '', '', NULL, 0, '2017-04-01 10:00:00', '2018-10-14 23:25:55'),
(32, 'sailaxmiramesh@yahoo.co.in', '9952969934', 'dd495736c9cbcbbdd0e5a7d81f7203b3', 1, '', '', '', '', '', '', NULL, 0, '2017-04-05 12:00:00', '2018-10-14 23:25:55'),
(33, 'hhdbjp@gmail.com', '8308110358', '34a25f7be5acb0fd944084fb16d699b7', 1, '', '', '', '', '', '', NULL, 0, '2017-04-07 20:00:00', '2018-10-14 23:25:55'),
(34, 'abhishekmkhanna@yahoo.com', '7350852574', '5d020e7be88f332b8addc70c0515356d', 1, '', '', '', '', '', '', NULL, 0, '2017-04-09 09:00:00', '2018-10-14 23:25:55'),
(35, 'suhasbadgujar619@gmail.com', '9730067209', '4161f410ef1c7b45e6ee76b4ae4b9bc7', 1, '', '', '', '', '', '', NULL, 0, '2017-04-21 13:00:00', '2018-10-14 23:25:55'),
(36, 'ab@12.gh', '1111111111', '77f58cce04ab67068634b54b3c572bfb', 1, '', '', '', '', '', '', NULL, 0, '2017-04-21 15:00:00', '2018-10-14 23:25:55'),
(37, 'pramodvyas4391@gmail.com', '7972370285', '13fbbebef1dd005678f2d432560f8206', 1, '', '', '', '', '', '', NULL, 0, '2017-04-21 21:00:00', '2018-10-14 23:25:55'),
(38, 'rakesh.deshmukh81@gmail.com', '9987429550', 'ab067d43548e183099f138d04543e4ad', 1, '', '', '', '', '', '', NULL, 0, '2017-04-23 08:00:00', '2018-10-14 23:25:55'),
(39, 'abhishek0001dubey@gmail.com', '8888833124', 'ce62bd9dada12486b3657ee30b8bd079', 1, '', '', '', '', '', '', NULL, 0, '2017-04-23 21:00:00', '2018-10-14 23:25:55'),
(40, 'garvit2204@gmail.com', '8975327097', '7d3513618f9ce6ebb6956fe48c0ecb7a', 1, '', '', '', '', '', '', NULL, 0, '2017-04-29 21:00:00', '2018-10-14 23:25:55'),
(41, 'tushart.4u@gmail.com', '9975431274', 'c32ffe742490940a08bcda4abedb24f2', 1, '', '', '', '', '', '', NULL, 0, '2017-04-30 08:00:00', '2018-10-14 23:25:55'),
(42, 'bhowmikraja@gmaiil.com', '9674289654', '4bf51ccab161477d3e7331837c0f009a', 1, '', '', '', '', '', '', NULL, 0, '2017-04-30 21:00:00', '2018-10-14 23:25:55'),
(43, 'swiftsumitsaini@gmail.com', '9960610560', 'd4d19d6f1f30131921f8e25a3caaf3ef', 1, '', '', '', '', '', '', NULL, 0, '2017-05-03 17:00:00', '2018-10-14 23:25:55'),
(44, 'yashagrawal9922@yahoo.com', '9011199922', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-05-06 14:00:00', '2018-10-14 23:25:55'),
(45, 'rahul_2k71@yahoo.co.in', '9028112208', 'af0e39b0d09a7e5c54c287892e0f7787', 1, '', '', '', '', '', '', NULL, 0, '2017-05-07 10:00:00', '2018-10-14 23:25:55'),
(46, 'rahulvishwakarma.04@gmail.com', '8888168786', '5c4b21749505a4310bf7dcaa45337f38', 1, '', '', '', '', '', '', NULL, 0, '2017-05-10 09:00:00', '2018-10-14 23:25:55'),
(47, 'arpitjain2601@gmail.com', '8983410790', 'dac50110d58b13e671e98a19ba69606c', 1, '', '', '', '', '', '', NULL, 0, '2017-05-10 14:00:00', '2018-10-14 23:25:55'),
(48, 'rishiraaz@gmail.com', '9552521729', '34080a998eb17becf1e30015463bdef6', 1, '', '', '', '', '', '', NULL, 0, '2017-05-11 20:00:00', '2018-10-14 23:25:55'),
(49, 'gautam_khetan@yahoo.com', '9011095421', 'aa9ba7f43c1f40972957dd36f38533d6', 1, '', '', '', '', '', '', NULL, 0, '2017-05-22 18:00:00', '2018-10-14 23:25:55'),
(50, 'in.sanjay@gmail.com', '9903391501', '22550fdd3839160fa10cf5a8744f3f5c', 1, '', '', '', '', '', '', NULL, 0, '2017-05-28 18:00:00', '2018-10-14 23:25:55'),
(51, 'raju.chandru82@gmail.com', '7030744779', 'd064b91ccb20a10767c71ed8a8923b49', 1, '', '', '', '', '', '', NULL, 0, '2017-05-29 09:00:00', '2018-10-14 23:25:55'),
(52, 'sahoo.anupkumar@gmail.com', '8981077774', '6fac073e11fc2712179b84cd185a1785', 1, '', '', '', '', '', '', NULL, 0, '2017-05-31 00:00:00', '2018-10-14 23:25:55'),
(53, 'richaoctober94@gmail.com', '7218785213', '48b5584cb96206f862ac5f07691e58c5', 1, '', '', '', '', '', '', NULL, 0, '2017-06-01 10:00:00', '2018-10-14 23:25:55'),
(54, 'sherekaryp@gmail.com', '8792319202', '0a15928a26e6f0c25f0f8372c536a848', 1, '', '', '', '', '', '', NULL, 0, '2017-06-02 07:00:00', '2018-10-14 23:25:55'),
(55, 'kajay1312@gmail.com', '085519 210', 'a33f5d25a66d539d7927a5e2fa96e07a', 1, '', '', '', '', '', '', NULL, 0, '2017-06-03 12:00:00', '2018-10-14 23:25:55'),
(56, 'bondreyogesh24@gmail.com', '9960617985', '86086d3bf82b31504fa6c81b53af7b40', 1, '', '', '', '', '', '', NULL, 0, '2017-06-06 11:00:00', '2018-10-14 23:25:55'),
(57, 'nimisha.agrawal29@gmail.com', '8860313694', 'de0db3a90ee1393ac0d3cb3e6638c0d1', 1, '', '', '', '', '', '', NULL, 0, '2017-06-07 15:00:00', '2018-10-14 23:25:55'),
(58, 'paliwalucknow@gmail.com', '9765928593', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-06-13 10:00:00', '2018-10-14 23:25:55'),
(59, 'sinha8283@gmail.com', '7250000017', '0bf8c674c1cb6b4ba6df2157fa35d20a', 1, '', '', '', '', '', '', NULL, 0, '2017-06-23 10:00:00', '2018-10-14 23:25:55'),
(60, 'mehra.rahul980@gmail.com', '8109793009', 'b4c0d1758999d82c48b97e55867f0ddc', 1, '', '', '', '', '', '', NULL, 0, '2017-06-27 14:00:00', '2018-10-14 23:25:55'),
(61, 'siddhartha.chowdhury92@gmail.com', '9637111356', 'c72b5dc8f08b183393c50169129aa62e', 1, '', '', '', '', '', '', NULL, 0, '2017-06-27 17:00:00', '2018-10-14 23:25:55'),
(62, 'prashantfunde91@gmail.com', '9421818719', '8b4057d638290bae55e20598e39b713f', 1, '', '', '', '', '', '', NULL, 0, '2017-07-01 12:00:00', '2018-10-14 23:25:55'),
(63, 'snlshukla80@gmail.com', '7018804440', '7ada67957b4dd80e920c8538c999ed42', 1, '', '', '', '', '', '', NULL, 0, '2017-07-02 10:00:00', '2018-10-14 23:25:55'),
(64, 'sanket5793@gmail.com', '9028335011', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-07-03 08:00:00', '2018-10-14 23:25:55'),
(65, 'shrinivas_kalekar123@yahoo.co.in', '8390692069', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-07-16 12:00:00', '2018-10-14 23:25:55'),
(66, 'akshay.umate@outlook.com', '8983590123', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-07-25 20:00:00', '2018-10-14 23:25:55'),
(67, 'vivekbugale@gmail.com', '7588970804', '8bd0523af31289b433954e2d1bc34e7e', 1, '', '', '', '', '', '', NULL, 0, '2017-07-26 21:00:00', '2018-10-14 23:25:55'),
(68, 'ashishshelke989@gmail.com', '8087642492', '783fd135f46bd4841de50195232ddf8f', 1, '', '', '', '', '', '', NULL, 0, '2017-07-27 18:00:00', '2018-10-14 23:25:55'),
(69, 'ashishshelke988@gmail.com', '9421088959', '783fd135f46bd4841de50195232ddf8f', 1, '', '', '', '', '', '', NULL, 0, '2017-07-27 18:00:00', '2018-10-14 23:25:55'),
(70, 'tausif.nit@gmail.com', '7875697464', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-07-28 15:00:00', '2018-10-14 23:25:55'),
(71, 'royrahul1975@gmail.com', '8551017333', '6099dd6a101680e560657960781407d9', 1, '', '', '', '', '', '', NULL, 0, '2017-08-10 14:00:00', '2018-10-14 23:25:55'),
(72, 'aadarsh107@gmail.com', '8305869268', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-08-12 12:00:00', '2018-10-14 23:25:55'),
(73, 'sukhwindernarang@yahoo.com', '9823419733', 'ae67d3f604b3d2e972f37fbe269ebe4a', 1, '', '', '', '', '', '', NULL, 0, '2017-08-17 00:00:00', '2018-10-14 23:25:55'),
(74, 'sanket.shah123@gmail.com', '9766594758', '07fc9b370d126c5901a3541e787f4175', 1, '', '', '', '', '', '', NULL, 0, '2017-09-01 10:00:00', '2018-10-14 23:25:55'),
(75, 'raosneha1996@gmail.com', '9033035007', 'e17a318b53623ba747f63b52d0cebb8b', 1, '', '', '', '', '', '', NULL, 0, '2017-09-02 19:00:00', '2018-10-14 23:25:55'),
(76, 'rajiv.deccan@gmail.com', '9094899342', '5d4434186cdedc5fafaa7812ad77bcde', 1, '', '', '', '', '', '', NULL, 0, '2017-09-30 19:00:00', '2018-10-14 23:25:55'),
(77, 'deeps.quity@gmail.com', '8605715510', 'a99bddc6fc69f9b519d77db12e0e3a5f', 1, '', '', '', '', '', '', NULL, 0, '2017-10-01 18:00:00', '2018-10-14 23:25:55'),
(78, 'sssonal29@gmail.com', '8698983222', '6b5dc06b842b9f2e02ccf36757edfec9', 1, '', '', '', '', '', '', NULL, 0, '2017-10-02 10:00:00', '2018-10-14 23:25:55'),
(79, 'vinodverma88941@gmail.com', '8894154660', 'e08cac8321d186e7e5b69427191cae73', 1, '', '', '', '', '', '', NULL, 0, '2017-10-08 12:00:00', '2018-10-14 23:25:55'),
(80, 'jagnoor_m@yahoo.com', '9663422111', '22c7db011df503eb646c683ae5c636b5', 1, '', '', '', '', '', '', NULL, 0, '2017-10-09 10:00:00', '2018-10-14 23:25:55'),
(81, 'njaved.ansari@gmail.com', '7720077616', '360327825037f82f4808cbcda1cfe766', 1, '', '', '', '', '', '', NULL, 0, '2017-10-24 22:00:00', '2018-10-14 23:25:55'),
(82, 'siddhartha.chowdhury87@gmail.com', '9038043198', 'c72b5dc8f08b183393c50169129aa62e', 1, '', '', '', '', '', '', NULL, 0, '2017-10-29 09:00:00', '2018-10-14 23:25:55'),
(83, 'tushar.mahajan88@gmail.com', '8793224899', 'd93e205244b58cbecf937c84d9aaf531', 1, '', '', '', '', '', '', NULL, 0, '2017-11-06 18:00:00', '2018-10-14 23:25:55'),
(84, 'sameer.bhosale40@gmail.com', '9513344010', '1f0526d8abce68962ab5c1111e03e321', 1, '', '', '', '', '', '', NULL, 0, '2017-11-11 08:00:00', '2018-10-14 23:25:55'),
(85, 'bcn@live.in', '9987897644', '0655b0747811a1a903243267d1f723e5', 1, '', '', '', '', '', '', NULL, 0, '2017-11-14 10:00:00', '2018-10-14 23:25:55'),
(86, 'pradeeps263@gmail.com', '8447739333', 'eeb9d5dc1602edd76d22605e469b591d', 1, '', '', '', '', '', '', NULL, 0, '2017-11-21 07:00:00', '2018-10-14 23:25:55'),
(87, 'aneymalik@rediffmail.com', '9212154183', '3a035db88a553d850a3cef6290f858f9', 1, '', '', '', '', '', '', NULL, 0, '2017-11-25 09:00:00', '2018-10-14 23:25:55'),
(88, 'sujayapandey11@gmail.com', '7030144944', '80970ab83ac33bc252c039057781cbfe', 1, '', '', '', '', '', '', NULL, 0, '2017-11-27 11:00:00', '2018-10-14 23:25:55'),
(89, 'yashaswimandle48@gmail.com', '7972099131', '5474258a5f6ec0cba2b6a8a66c526627', 1, '', '', '', '', '', '', NULL, 0, '2017-11-28 12:00:00', '2018-10-14 23:25:55'),
(90, 'abc@gmail.com', '9881148927', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2017-11-29 12:00:00', '2018-10-14 23:25:55'),
(91, 'sourabhgupta.2112@gmail.com', '8007774893', '22a669ea252195c3cc17c5deee2d2cc8', 1, '', '', '', '', '', '', NULL, 0, '2018-01-08 07:00:00', '2018-10-14 23:25:55'),
(92, 'anishalphonse@gmail.com', '8281270399', '47e5b452d6eb2a4221eec37d968df37a', 1, '', '', '', '', '', '', NULL, 0, '2018-01-14 13:00:00', '2018-10-14 23:25:55'),
(93, 'vikas.soni7@gmail.com', '7875480488', '8527721fb8ee8bddbc4cecd363d6d996', 1, '', '', '', '', '', '', NULL, 0, '2018-01-25 11:00:00', '2018-10-14 23:25:55'),
(94, 'amcybercool@gmail.com', '7008037087', 'a00a94469770e1159504af919882ff0f', 1, '', '', '', '', '', '', NULL, 0, '2018-01-27 11:00:00', '2018-10-14 23:25:55'),
(95, 'rahul8cb@gmail.com', '9130087520', '149ed5b921f20109eabe9a369baa222e', 1, '', '', '', '', '', '', NULL, 0, '2018-01-28 13:00:00', '2018-10-14 23:25:55'),
(96, 'djrhythmofficial@gmail.com', '8999489623', '7183bde86c4f753ef1f4a42c0d5ac38d', 1, '', '', '', '', '', '', NULL, 0, '2018-02-01 07:00:00', '2018-10-14 23:25:55'),
(97, 'aman.mathur31@gmail.com', '9766235330', '34a25f7be5acb0fd944084fb16d699b7', 1, '', '', '', '', '', '', NULL, 0, '2018-03-08 10:00:00', '2018-10-14 23:25:55'),
(98, 'knehaagarwal@gmail.com', '7219211016', '4de76d45b86538494f1db30a1070dc26', 1, '', '', '', '', '', '', NULL, 0, '2018-03-10 11:00:00', '2018-10-14 23:25:55'),
(99, 'prafulla.birla60@gmail.com', '7350341214', '16a1176937212319d18733e248090f2b', 1, '', '', '', '', '', '', NULL, 0, '2018-03-16 03:00:00', '2018-10-14 23:25:55'),
(100, 'burguteganesh@gmail.com', '9665043551', '31c060c28b3b46491db93eadfd50a68c', 1, '', '', '', '', '', '', NULL, 0, '2018-03-17 22:00:00', '2018-10-14 23:25:55'),
(101, 'amareshrai09@gmail.com', '8217819238', '0a531772c09f6026ebdadb4874a7b65a', 1, '', '', '', '', '', '', NULL, 0, '2018-03-19 22:00:00', '2018-10-14 23:25:55'),
(102, 'pankajshahra@gmail.com', '7045358001', '08d4e99a6c6c973742e01787bfa4f8b1', 1, '', '', '', '', '', '', NULL, 0, '2018-03-23 23:00:00', '2018-10-14 23:25:55'),
(103, 'prapratik24891@gmail.com', '9975689500', 'a487f778e916de136495e1e3df3e48d2', 1, '', '', '', '', '', '', NULL, 0, '2018-03-26 10:00:00', '2018-10-14 23:25:55'),
(104, 'anirbanc338@gmail.com', '8293976285', '6a6538ace744d6589ba2aefddadb9a84', 1, '', '', '', '', '', '', NULL, 0, '2018-03-29 13:00:00', '2018-10-14 23:25:55'),
(105, 'bhabaniii_dash@yahoo.com', '8553070460', 'b599f266a52737caf82098da2c3d0194', 1, '', '', '', '', '', '', NULL, 0, '2018-03-29 22:00:00', '2018-10-14 23:25:55'),
(106, 'anupsharma4507@gmail.com', '8796732636', '44e47ddf8031b8ad824ca961593fbbef', 1, '', '', '', '', '', '', NULL, 0, '2018-03-31 18:00:00', '2018-10-14 23:25:55'),
(107, 'skpawade247@gmail.com', '8437396702', '3c397881ab2bc22a1e762c396792d170', 1, '', '', '', '', '', '', NULL, 0, '2018-04-05 15:00:00', '2018-10-14 23:25:55'),
(108, 'gopalpoddar25@gmail.com', '9650286983', '6bea3faa957a8899dd98d296d9ad9215', 1, '', '', '', '', '', '', NULL, 0, '2018-04-06 12:00:00', '2018-10-14 23:25:55'),
(109, 'amey.ghaisas@yahoo.com', '8097873877', '7cbb5f8d18497a8b400c1e9d9bf4cb66', 1, '', '', '', '', '', '', NULL, 0, '2018-04-06 19:00:00', '2018-10-14 23:25:55'),
(110, 'pgupta1795@gmail.com', '8291819765', '200e7b62ef4b2d1fca9c7a539472a5c6', 1, '', '', '', '', '', '', NULL, 0, '2018-04-07 12:00:00', '2018-10-14 23:25:55'),
(111, 'khariprasad16@gmail.com', '8754514765', '6502fc78bd3df4f802409ec8d057cbdb', 1, '', '', '', '', '', '', NULL, 0, '2018-04-13 19:00:00', '2018-10-14 23:25:55'),
(112, 'hemantdhamanaskar@gmail.com', '9773528974', '1bcb75ca00c9c5c83a65bd2d4bba8231', 1, '', '', '', '', '', '', NULL, 0, '2018-04-16 22:00:00', '2018-10-14 23:25:55'),
(113, 'shubham.agar09@gmail.com', '9205212397', '1509554b42dd44d52e4f104d1afa0363', 1, '', '', '', '', '', '', NULL, 0, '2018-04-17 21:00:00', '2018-10-14 23:25:55'),
(114, 'ankur.sharma2305@gmail.com', '8407999950', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-04-26 07:00:00', '2018-10-14 23:25:55'),
(115, 'SHANKARJSINGH@GMAIL.COM', '8851222766', '16a1176937212319d18733e248090f2b', 1, '', '', '', '', '', '', NULL, 0, '2018-04-27 12:00:00', '2018-10-14 23:25:55'),
(116, 'shahvezk1@gmail.com', '9999963258', '4c4b7fc0279e50f60afa20d0bc639cef', 1, '', '', '', '', '', '', NULL, 0, '2018-04-28 15:00:00', '2018-10-14 23:25:55'),
(117, 'gaurav.1289@gmail.com', '8625819408', '442016aab2ca16a885f5d21cf0fe04fe', 1, '', '', '', '', '', '', NULL, 0, '2018-04-28 17:00:00', '2018-10-14 23:25:55'),
(118, 'sandeepdubey15@gmail.com', '7027001914', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-04-28 20:00:00', '2018-10-14 23:25:55'),
(119, 'himanshukaranje@gmail.com', '9763648366', '18bc503b6fb644b47c78d70366e85892', 1, '', '', '', '', '', '', NULL, 0, '2018-04-29 16:00:00', '2018-10-14 23:25:55'),
(120, 'dhiraj.sethia@gmail.com', '9923796323', 'b93fd115d11e9c1591eb2e3fe7af7436', 1, '', '', '', '', '', '', NULL, 0, '2018-04-30 09:00:00', '2018-10-14 23:25:55'),
(121, 'santhoshmlaa@gmail.com', '8800226834', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-04-30 10:00:00', '2018-10-14 23:25:55'),
(122, 'rai.priyadarshi31@gmail.com', '9458704483', '716b3ce3611b570e388d35693a587c15', 1, '', '', '', '', '', '', NULL, 0, '2018-05-01 14:00:00', '2018-10-14 23:25:55'),
(123, 'varun.iet@gmail.com', '7397811353', '0a3cd65ac3f092ae63f111b66d53502e', 1, '', '', '', '', '', '', NULL, 0, '2018-05-01 14:00:00', '2018-10-14 23:25:55'),
(124, 'magicianparad@gmail.com', '8087913243', 'ab1e9bac1fdff4b4c84f62e13bf86858', 1, '', '', '', '', '', '', NULL, 0, '2018-05-02 14:00:00', '2018-10-14 23:25:55'),
(125, 'akkijosy@gmail.com', '9867793750', '41526818264e06b6c2d90b87c1deafcf', 1, '', '', '', '', '', '', NULL, 0, '2018-05-04 11:00:00', '2018-10-14 23:25:55'),
(126, 'surjeet.singh601@gmail.com', '9552643367', '17b33277b1896e82ea24b5f8a358d5d0', 1, '', '', '', '', '', '', NULL, 0, '2018-05-04 21:00:00', '2018-10-14 23:25:55'),
(127, 'shambhvi4885@gmail.com', '9552750362', 'b9a231ac4862bc21391ea961e7bec963', 1, '', '', '', '', '', '', NULL, 0, '2018-05-11 10:00:00', '2018-10-14 23:25:55'),
(128, 'pranavkanyal9582@gmail.com', '9582689811', 'dd495736c9cbcbbdd0e5a7d81f7203b3', 1, '', '', '', '', '', '', NULL, 0, '2018-05-15 11:00:00', '2018-10-14 23:25:55'),
(129, 'itsvaibh@gmail.com', '8291819711', 'cab8b5591dbedaa8fb9f89badf98d69e', 1, '', '', '', '', '', '', NULL, 0, '2018-05-16 20:00:00', '2018-10-14 23:25:55'),
(130, 'vchamp2130@gmail.com', '7506707130', '226de06e367fdb6542a9195c6a6afafc', 1, '', '', '', '', '', '', NULL, 0, '2018-05-20 13:00:00', '2018-10-14 23:25:55'),
(131, 'ashwin.gautham@chargedock.in', '9845539088', '290b29aae5ba1c03663a4f2c91f895e0', 1, '', '', '', '', '', '', NULL, 0, '2018-05-21 11:00:00', '2018-10-14 23:25:55'),
(132, 'manishdeshmukh.com@gmail.com', '9325659447', 'bc53a3ea5ecde370948d01db71c40f7a', 1, '', '', '', '', '', '', NULL, 0, '2018-05-22 10:00:00', '2018-10-14 23:25:55'),
(133, 'sridharsrcm07@yahoo.in', '8698891827', '596cc607ba4920c6d828c6e80d350dee', 1, '', '', '', '', '', '', NULL, 0, '2018-05-26 14:00:00', '2018-10-14 23:25:55'),
(134, 'kannanasoori@gmail.com', '8329167186', 'bca2618096ab8d5f44513839039bdab3', 1, '', '', '', '', '', '', NULL, 0, '2018-05-27 09:00:00', '2018-10-14 23:25:55'),
(135, 'simplyjuhi@gmail.com', '9819695082', '964177fbedd97f14b567b737909e343c', 1, '', '', '', '', '', '', NULL, 0, '2018-05-27 14:00:00', '2018-10-14 23:25:55'),
(136, 'yashurade20@icloud.com', '8308008214', 'ffbd70b5f4bfcd7858a2b66419a791bc', 1, '', '', '', '', '', '', NULL, 0, '2018-05-28 09:00:00', '2018-10-14 23:25:55'),
(137, 'ashishkadam@gmail.com', '9372393224', '2b8b718c9dd728cfba9f2ac82568a200', 1, '', '', '', '', '', '', NULL, 0, '2018-05-28 14:00:00', '2018-10-14 23:25:55'),
(138, 'akigupta131@gmail.com', '7738983120', 'df9ff7d5a88c3db38c718e61166b5eff', 1, '', '', '', '', '', '', NULL, 0, '2018-05-29 13:00:00', '2018-10-14 23:25:55'),
(139, 'rahuljain8910@gmail.com', '9893253099', 'ba4502f77c8fb4d3359431b7d8489595', 1, '', '', '', '', '', '', NULL, 0, '2018-05-30 14:00:00', '2018-10-14 23:25:55'),
(140, 'dahakeashlesh@gmail.com', '7709304280', '618701e7cdf30321e48352fa4f003339', 1, '', '', '', '', '', '', NULL, 0, '2018-05-31 21:00:00', '2018-10-14 23:25:55'),
(141, 'simiyadav78@gmail.com', '7378712564', '4c4b7fc0279e50f60afa20d0bc639cef', 1, '', '', '', '', '', '', NULL, 0, '2018-06-01 00:00:00', '2018-10-14 23:25:55'),
(142, 'kk.abburi@gmail.com', '9666613484', '29b3a96a03534f3d83aff9fcafd1da0f', 1, '', '', '', '', '', '', NULL, 0, '2018-06-01 08:00:00', '2018-10-14 23:25:55'),
(143, 'rituyadav3195@gmail.com', '9538858301', 'de713751eccdf74ca6094ccdd6751f56', 1, '', '', '', '', '', '', NULL, 0, '2018-06-02 10:00:00', '2018-10-14 23:25:55'),
(144, 'ankita.gajbhiye31@gmail.com', '8411990444', 'd5e2a317c6e7b54e714878f5a05852a5', 1, '', '', '', '', '', '', NULL, 0, '2018-06-02 14:00:00', '2018-10-14 23:25:55'),
(145, 'thechutneyrebel@gmail.com', '9551133773', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-02 18:00:00', '2018-10-14 23:25:55'),
(146, 'Anshukchaudhary@gmail.com', '8378003767', '44414d72a2d2e406fe28bc7299ac452b', 1, '', '', '', '', '', '', NULL, 0, '2018-06-04 01:00:00', '2018-10-14 23:25:55'),
(147, 'tusharsingh51@gmail.com', '8077433261', 'c399b34dc02a7a6bc47ec0743341d11f', 1, '', '', '', '', '', '', NULL, 0, '2018-06-06 12:00:00', '2018-10-14 23:25:55'),
(148, 'rushimced@gmail.com', '9503895621', '2c29d5290a14e4177f2dd26843921ce0', 1, '', '', '', '', '', '', NULL, 0, '2018-06-07 10:00:00', '2018-10-14 23:25:55'),
(149, 'jayatripathi1468@gmail.com', '7028899972', '3df1a3f86c21298ea5a43b5dd13d6e35', 1, '', '', '', '', '', '', NULL, 0, '2018-06-10 16:00:00', '2018-10-14 23:25:55'),
(150, '8146043@gmail.com', '8146043900', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-11 06:00:00', '2018-10-14 23:25:55'),
(151, 'akinfolica@gmail.com', '9741990123', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-11 09:00:00', '2018-10-14 23:25:55'),
(152, 'leenaranjini49@gmail.com', '9944639501', 'be37eec4ae9bf85550228137469a40fc', 1, '', '', '', '', '', '', NULL, 0, '2018-06-11 14:00:00', '2018-10-14 23:25:55'),
(153, 'rishabhjain017@gmail.com', '9860628225', '727abcdc7afae7d5c17471bde0efa20b', 1, '', '', '', '', '', '', NULL, 0, '2018-06-11 16:00:00', '2018-10-14 23:25:55'),
(154, 'harshita_hj@yahoo.com', '9866344440', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-11 22:00:00', '2018-10-14 23:25:55'),
(155, 'ghoshshouvik88@gmail.com', '9748991713', 'df533305a2ca2c4ade86c1d69522ae29', 1, '', '', '', '', '', '', NULL, 0, '2018-06-16 14:00:00', '2018-10-14 23:25:55'),
(156, 'sonuabj@gmail.com', '8861960848', 'd11ef054be2ddd302a8d7834fe88bad9', 1, '', '', '', '', '', '', NULL, 0, '2018-06-19 11:00:00', '2018-10-14 23:25:55'),
(157, 'kumar01anish@gmail.com', '9689623000', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-19 18:00:00', '2018-10-14 23:25:55'),
(158, 'aakash.kumar.ak@gmail.com', '9731790626', '65c7937e7055275bc6e846963948a901', 1, '', '', '', '', '', '', NULL, 0, '2018-06-21 14:00:00', '2018-10-14 23:25:55'),
(159, 'anunee2003@yahoo.co.in', '9900479406', '2c5ae53edba9368879b50aa54424b563', 1, '', '', '', '', '', '', NULL, 0, '2018-06-22 21:00:00', '2018-10-14 23:25:55'),
(160, 'luckymnu4u@gmail.com', '9591964400', '08f063948b614c872e3757132e14e2d1', 1, '', '', '', '', '', '', NULL, 0, '2018-06-23 11:00:00', '2018-10-14 23:25:55'),
(161, 'Ritanshu.singh10@gmail.com', '7507898332', 'eead59abd4dc7543ca336f963b3b8f3a', 1, '', '', '', '', '', '', NULL, 0, '2018-06-24 13:00:00', '2018-10-14 23:25:55'),
(162, 'kirtiagrawal.13@gmail.com', '8750067080', '11d9d7ed8c6ead844060d3ae89cbbbcd', 1, '', '', '', '', '', '', NULL, 0, '2018-06-24 20:00:00', '2018-10-14 23:25:55'),
(163, 'aakankshajain08@yahoo.com', '9860570116', '9cea026cf9059ca12c2158174689ae14', 1, '', '', '', '', '', '', NULL, 0, '2018-06-25 16:00:00', '2018-10-14 23:25:55'),
(164, 'ranahardik45@gmail.com', '9662111962', '974f327f65de6167f558dc76448901fb', 1, '', '', '', '', '', '', NULL, 0, '2018-06-25 17:00:00', '2018-10-14 23:25:55'),
(165, 'yashodip02@gmail.com', '7709423942', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-26 10:00:00', '2018-10-14 23:25:55'),
(166, '24rutujasuryawanshi@gmail.com', '7507339829', '40bbe62deef69f5b40e1309b79826a0c', 1, '', '', '', '', '', '', NULL, 0, '2018-06-27 12:00:00', '2018-10-14 23:25:55'),
(167, 'aniketchakole@gmail.com', '9860370989', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-27 14:00:00', '2018-10-14 23:25:55'),
(168, 'karan1301@gmail.com', '9168656975', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-06-27 15:00:00', '2018-10-14 23:25:55'),
(169, 'tanializ2709@gmail.com', '7709322344', '15dc7caa02e697927b4a6238bf9aad53', 1, '', '', '', '', '', '', NULL, 0, '2018-06-28 20:00:00', '2018-10-14 23:25:55'),
(170, 'apurav.wagh@gmail.com', '9096602958', 'fd9b53e32210206a05a13c07f6d3941d', 1, '', '', '', '', '', '', NULL, 0, '2018-06-30 08:00:00', '2018-10-14 23:25:55'),
(171, 'anurao7000@gmail.com', '8087029099', '3929a3f5edb92b39ffee0a3eb96a285b', 1, '', '', '', '', '', '', NULL, 0, '2018-06-30 10:00:00', '2018-10-14 23:25:55'),
(172, 'ninad.chandoskar@gmail.com', '9920996647', '4f70123aacfaff93cb0ff5da91bd30ed', 1, '', '', '', '', '', '', NULL, 0, '2018-06-30 19:00:00', '2018-10-14 23:25:55'),
(173, 'aditya6116@gmail.com', '7015382936', 'f3db1663d8130bfd89bf129345899d3b', 1, '', '', '', '', '', '', NULL, 0, '2018-07-01 01:00:00', '2018-10-14 23:25:55'),
(174, 'gaurav.eee90@gmail.com', '9052669437', 'f4cbbaff8766dd0f3135d2e147dd0fcd', 1, '', '', '', '', '', '', NULL, 0, '2018-07-01 08:00:00', '2018-10-14 23:25:55'),
(175, 'kalpavrikshaghansham@gmail.com', '8861661776', '47afab818d47434a69a8ba5c41c35aee', 1, '', '', '', '', '', '', NULL, 0, '2018-07-01 09:00:00', '2018-10-14 23:25:55'),
(176, 'mac.sumit@gmail.com', '9632525454', '6e90011bf0bb1d12cb847a35a55482c6', 1, '', '', '', '', '', '', NULL, 0, '2018-07-02 08:00:00', '2018-10-14 23:25:55'),
(177, 'mazenagar@gmail.com', '7083671009', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-07-03 12:00:00', '2018-10-14 23:25:55'),
(178, 'khot.vivekanand@gmail.com', '9921272899', 'd0fbce405c2679f5eac9a95e802703af', 1, '', '', '', '', '', '', NULL, 0, '2018-07-03 13:00:00', '2018-10-14 23:25:55'),
(179, 'xyg@gmail.com', '8375038379', 'b23e606605691cc97bd246a773d2fa55', 1, '', '', '', '', '', '', NULL, 0, '2018-07-04 21:00:00', '2018-10-14 23:25:55'),
(180, 'sameer.chakraborthy@gmail.com', '9764259674', 'c770896e26661a4b18d4fffba0a40773', 1, '', '', '', '', '', '', NULL, 0, '2018-07-06 11:00:00', '2018-10-14 23:25:55'),
(181, 'kapshu@yahoo.co.in', '7028912108', '84f2ae7ee1e220ea964bc6103dc0f2a4', 1, '', '', '', '', '', '', NULL, 0, '2018-07-08 15:00:00', '2018-10-14 23:25:55'),
(182, 'bhopekunal29@gmail.com', '8830987475', 'd317e21a038b05bf2501b322bc73b014', 1, '', '', '', '', '', '', NULL, 0, '2018-07-12 17:00:00', '2018-10-14 23:25:55'),
(183, 'ar.vineetkamboj@live.com', '9867176309', 'd3d8618dce9c821342bbe85d45955781', 1, '', '', '', '', '', '', NULL, 0, '2018-07-12 19:00:00', '2018-10-14 23:25:55'),
(184, 'rrahulkkumar95@gmail.com', '7607822024', '16a1176937212319d18733e248090f2b', 1, '', '', '', '', '', '', NULL, 0, '2018-07-16 19:00:00', '2018-10-14 23:25:55'),
(185, 'cmayash@gmail.com', '9643898608', '74918af7dfaa69c8e2b9db24d1e7491a', 1, '', '', '', '', '', '', NULL, 0, '2018-07-19 11:00:00', '2018-10-14 23:25:55'),
(186, 'devikashivhare96@gmail.com', '8888253929', 'b9429f2e593f6d24a771773c99eadf1d', 1, '', '', '', '', '', '', NULL, 0, '2018-07-19 14:00:00', '2018-10-14 23:25:55'),
(187, 'asawat.harsh@gmail.com', '8010649185', 'acf4f19e160c31b6b034a232c18b6933', 1, '', '', '', '', '', '', NULL, 0, '2018-07-19 17:00:00', '2018-10-14 23:25:55'),
(188, 'aniketchakole@live.com', '9975498124', 'ef8b2db27e0cd7bfa1fcb629434a32a0', 1, '', '', '', '', '', '', NULL, 0, '2018-07-20 10:00:00', '2018-10-14 23:25:55'),
(189, 'jasonraj1997@gmail.com', '9637369481', '9095e575badd083c3ce1d62f2cdb7b18', 1, '', '', '', '', '', '', NULL, 0, '2018-07-22 05:00:00', '2018-10-14 23:25:55'),
(190, 'tahirshaikh12@gmail.com', '7738088824', 'fa0e198d15bba4d71b254c1bbfc10d5d', 1, '', '', '', '', '', '', NULL, 0, '2018-07-22 11:00:00', '2018-10-14 23:25:55'),
(191, 'dn031193@gmail.com', '9130081463', '6ae8b2092a51c4b8e9ff9a21df8c550d', 1, '', '', '', '', '', '', NULL, 0, '2018-07-25 21:00:00', '2018-10-14 23:25:55'),
(192, 'tyagideepak2512@gmail.com', '9167516374', '4d85363c1ee47baa83da4683c8456d42', 1, '', '', '', '', '', '', NULL, 0, '2018-07-26 23:00:00', '2018-10-14 23:25:55'),
(193, 'bhushangadhave@yahoo.co.in', '9890229172', '7c2d8bd60e126d9945fb3efc21face5a', 1, '', '', '', '', '', '', NULL, 0, '2018-07-26 23:00:00', '2018-10-14 23:25:55'),
(194, 'nishigandha209@gmail.com', '7028995894', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-07-26 23:00:00', '2018-10-14 23:25:55'),
(195, 'saurav2006complex@gmail.com', '9130013996', '4be4aa401d254fae5b56dcac2ed99081', 1, '', '', '', '', '', '', NULL, 0, '2018-07-28 04:00:00', '2018-10-14 23:25:55'),
(196, 'halcyonhimanshu@gmail.com', '7756839275', '78cfe78166bded121a4e0d22741a1ce6', 1, '', '', '', '', '', '', NULL, 0, '2018-07-28 17:00:00', '2018-10-14 23:25:55'),
(197, 'tejaswimacharla7@gmail.com', '9908223907', '7426e3c45e46b703144b51be333303be', 1, '', '', '', '', '', '', NULL, 0, '2018-07-28 21:00:00', '2018-10-14 23:25:55'),
(198, 'vinaychaudhary1504@gmail.com', '8149536898', 'bc2b7084f6d0464fccc8664bba41986e', 1, '', '', '', '', '', '', NULL, 0, '2018-07-29 09:00:00', '2018-10-14 23:25:55'),
(199, 'kdhananjayns@gmail.com', '7447835863', 'd9f8ba59d93a7ff3c1cd183405f48f62', 1, '', '', '', '', '', '', NULL, 0, '2018-07-29 13:00:00', '2018-10-14 23:25:55'),
(200, 'lakki369@gmail.com', '9168277083', '8f60f82f81b966e9277ceb1e07dbe5b3', 1, '', '', '', '', '', '', NULL, 0, '2018-07-31 11:00:00', '2018-10-14 23:25:55'),
(201, 'saladimanikantasai@gmail.com', '9087205889', 'b5a95fbf7599f32016ecd9710774db6b', 1, '', '', '', '', '', '', NULL, 0, '2018-07-31 22:00:00', '2018-10-14 23:25:55'),
(202, 'iamrjts24@gmail.com', '8756438944', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-08-06 01:00:00', '2018-10-14 23:25:55'),
(203, 'natraj227@gmail.com', '9980256847', 'e1e9ea5c6edbb505291dd2025a9c873a', 1, '', '', '', '', '', '', NULL, 0, '2018-08-17 19:00:00', '2018-10-14 23:25:55'),
(204, 'aspirevisiondrive5@gmail.com', '8446423956', 'df4ecd8974cc0077992ae44564bad957', 1, '', '', '', '', '', '', NULL, 0, '2018-08-18 17:00:00', '2018-10-14 23:25:55'),
(205, 'sidhant.c@outlook.com', '7317010502', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-08-21 02:00:00', '2018-10-14 23:25:55'),
(206, 'vipin4486@gmail.com', '9739422273', '187588cee24a195357cb1914731be7b4', 1, '', '', '', '', '', '', NULL, 0, '2018-08-22 14:00:00', '2018-10-14 23:25:55'),
(207, 'ashishsonip25@gmail.com', '9782326252', '95f9b9dbb568f315db33b2ad4e097098', 1, '', '', '', '', '', '', NULL, 0, '2018-08-22 14:00:00', '2018-10-14 23:25:55'),
(208, 'pushpendrakush21@gmail.com', '7774074178', '9781d2517481b9c942069314b44473b4', 1, '', '', '', '', '', '', NULL, 0, '2018-08-24 01:00:00', '2018-10-14 23:25:55'),
(209, 'starf369@yahoo.co.in', '9423448834', 'e5c96769c10675b1b788849b51e21c8b', 1, '', '', '', '', '', '', NULL, 0, '2018-08-24 19:00:00', '2018-10-14 23:25:55'),
(210, 'prassanno.mayank@gmail.com', '9845869818', '151688cef7aca14513579139d1d4a4fb', 1, '', '', '', '', '', '', NULL, 0, '2018-08-26 12:00:00', '2018-10-14 23:25:55'),
(211, 'pankajadubey@yahoo.co.in', '9834699351', '3c397881ab2bc22a1e762c396792d170', 1, '', '', '', '', '', '', NULL, 0, '2018-08-27 13:00:00', '2018-10-14 23:25:55'),
(212, 'geetika2795@gmail.com', '9986940937', '73d8d3f0008e17ffd6b5e961624379cb', 1, '', '', '', '', '', '', NULL, 0, '2018-08-27 14:00:00', '2018-10-14 23:25:55'),
(213, 'saurabhadubey007@gmail.com', '7972175480', '22c2b8603003245dd8c92ae04fe94bc2', 1, '', '', '', '', '', '', NULL, 0, '2018-08-27 22:00:00', '2018-10-14 23:25:55'),
(214, 'shintosc571@gmail.com', '8553352462', 'f9612fea528d2790aba1f8853c6d9c91', 1, '', '', '', '', '', '', NULL, 0, '2018-08-28 10:00:00', '2018-10-14 23:25:55'),
(215, 'arshaddba108@gmail.com', '8605112314', '16a1176937212319d18733e248090f2b', 1, '', '', '', '', '', '', NULL, 0, '2018-08-29 00:00:00', '2018-10-14 23:25:55'),
(216, 'arbaz501021@gmail.com', '8668585144', '08e9994e5ba3f2f4aeba181db62c3786', 1, '', '', '', '', '', '', NULL, 0, '2018-08-30 18:00:00', '2018-10-14 23:25:55'),
(217, 'ershad1983@gmail.com', '8329595037', '63ea1c596421ec9dfca45ac591d77b36', 1, '', '', '', '', '', '', NULL, 0, '2018-08-31 10:00:00', '2018-10-14 23:25:55'),
(218, 'manishr12@gmail.com', '8097739196', 'bc53a3ea5ecde370948d01db71c40f7a', 1, '', '', '', '', '', '', NULL, 0, '2018-09-01 02:00:00', '2018-10-14 23:25:55'),
(219, 'purushottamyede@gmail.com', '8800545159', '6f96059c8de365ee302a80735206fb42', 1, '', '', '', '', '', '', NULL, 0, '2018-09-04 16:00:00', '2018-10-14 23:25:55'),
(220, 'mspankajsharma@gmail.com', '9968292213', 'd837e4c21cc799d67cddbbd85838bc0e', 1, '', '', '', '', '', '', NULL, 0, '2018-09-05 00:00:00', '2018-10-14 23:25:55'),
(221, 'utkarshpatil33@gmail.com', '7020115493', 'cc77e5f9c23da348bf8771fd09fab3ea', 1, '', '', '', '', '', '', NULL, 0, '2018-09-08 12:00:00', '2018-10-14 23:25:55'),
(222, 'yashsrivastava47@gmail.com', '7007987367', 'af25ca6a6e728292e58f0f0792dfe37c', 1, '', '', '', '', '', '', NULL, 0, '2018-09-09 12:00:00', '2018-10-14 23:25:55'),
(223, 'siddhant1715@gmail.com', '9004739395', '08fcc230e48ab4d54ed191b953e4b4d0', 1, '', '', '', '', '', '', NULL, 0, '2018-09-09 17:00:00', '2018-10-14 23:25:55'),
(224, 'aks@gmail.com', '7894561230', '338caf55d1073432b0809d45e6e002fe', 1, '', '', '', '', '', '', NULL, 0, '2018-09-14 22:47:33', '2018-10-14 23:25:55'),
(225, 'akshay@gmail.com', '7709975028', '338caf55d1073432b0809d45e6e002fe', 1, '', '', '', '', '', '', NULL, 0, '2018-10-19 08:03:11', '2018-10-19 08:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `trans_vehicle_services`
--

CREATE TABLE `trans_vehicle_services` (
  `id` int(11) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `base_fare` varchar(100) NOT NULL,
  `free_waiting_minutes` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `transit_charge` varchar(100) NOT NULL,
  `waiting_charge_per_minute` varchar(100) NOT NULL,
  `dimension` varchar(100) NOT NULL,
  `status` enum('Active','Deactive') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_vehicle_services`
--

INSERT INTO `trans_vehicle_services` (`id`, `vehicle_name`, `image`, `base_fare`, `free_waiting_minutes`, `capacity`, `transit_charge`, `waiting_charge_per_minute`, `dimension`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Piaggio Ape', 'http://shiftme.in/shiftme/assets/upload/vehicle/ape.png', '299', '3', '250', '12', '60', '4ft x 3.5ft x 4ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56'),
(8, 'Tata Ace', 'http://shiftme.in/shiftme/assets/upload/vehicle/Tata_Ace.png', '399', '3', '700', '20', '60', '7ft x 4ftx 5.5ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56'),
(9, 'Tata 207', 'http://shiftme.in/shiftme/assets/upload/vehicle/Tata_207.png', '449', '3', '1000', '25', '60', '9.5ft x 4ft x 5.5ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56'),
(10, 'Tata 407', 'http://shiftme.in/shiftme/assets/upload/vehicle/Tata_407.png', '649', '3', '2500', '30', '60', '9.5ft x 5.5ft x 5.5ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56'),
(11, 'Eicher Truck', 'http://shiftme.in/shiftme/assets/upload/vehicle/Eicher_Truck.png', '899', '3', '3000', '35', '60', '14ft x 6ft x 5.5ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56'),
(12, 'Truck LPT', 'http://shiftme.in/shiftme/assets/upload/vehicle/Truck_LPT.png', '1099', '3', '4200', '40', '60', '17ft x 6ft x 6ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56'),
(13, 'Truck LPT 1109', 'http://shiftme.in/shiftme/assets/upload/vehicle/Truck_LPT_1109.png', '1699', '3', '6000', '40', '60', '19ft x 7ft x 6ft', 'Active', '2018-10-14 23:23:27', '2018-10-14 23:23:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_aboutus`
--
ALTER TABLE `trans_aboutus`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `trans_admin_menu`
--
ALTER TABLE `trans_admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_admin_user`
--
ALTER TABLE `trans_admin_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `trans_clients`
--
ALTER TABLE `trans_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_contactus`
--
ALTER TABLE `trans_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_enquiry`
--
ALTER TABLE `trans_enquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_id` (`quotation_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `trans_faq`
--
ALTER TABLE `trans_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `trans_footer_content`
--
ALTER TABLE `trans_footer_content`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `trans_group`
--
ALTER TABLE `trans_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trans_home_slider`
--
ALTER TABLE `trans_home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_invoice`
--
ALTER TABLE `trans_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `trans_labour`
--
ALTER TABLE `trans_labour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_menu_alloc`
--
ALTER TABLE `trans_menu_alloc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_quotation_id` (`quotation_id`);

--
-- Indexes for table `trans_our_stuff`
--
ALTER TABLE `trans_our_stuff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_privacy_policy`
--
ALTER TABLE `trans_privacy_policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `trans_product_list`
--
ALTER TABLE `trans_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_qoute`
--
ALTER TABLE `trans_qoute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_quotation`
--
ALTER TABLE `trans_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_quotation_has_product`
--
ALTER TABLE `trans_quotation_has_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_id` (`quotation_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `trans_quotation_pricing`
--
ALTER TABLE `trans_quotation_pricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quotation_pricing_id` (`quotation_id`) USING BTREE;

--
-- Indexes for table `trans_services`
--
ALTER TABLE `trans_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_shifting`
--
ALTER TABLE `trans_shifting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_terms_condition`
--
ALTER TABLE `trans_terms_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_testimonials`
--
ALTER TABLE `trans_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_users_groups`
--
ALTER TABLE `trans_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_user_inquery`
--
ALTER TABLE `trans_user_inquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans_user_login`
--
ALTER TABLE `trans_user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `trans_vehicle_services`
--
ALTER TABLE `trans_vehicle_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_aboutus`
--
ALTER TABLE `trans_aboutus`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans_admin_menu`
--
ALTER TABLE `trans_admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin menus', AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `trans_admin_user`
--
ALTER TABLE `trans_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin user id', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trans_clients`
--
ALTER TABLE `trans_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `trans_contactus`
--
ALTER TABLE `trans_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `trans_enquiry`
--
ALTER TABLE `trans_enquiry`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trans_faq`
--
ALTER TABLE `trans_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans_footer_content`
--
ALTER TABLE `trans_footer_content`
  MODIFY `footer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans_group`
--
ALTER TABLE `trans_group`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'Group id', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans_home_slider`
--
ALTER TABLE `trans_home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trans_invoice`
--
ALTER TABLE `trans_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_labour`
--
ALTER TABLE `trans_labour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trans_menu_alloc`
--
ALTER TABLE `trans_menu_alloc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'menu alloc id', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trans_our_stuff`
--
ALTER TABLE `trans_our_stuff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `trans_privacy_policy`
--
ALTER TABLE `trans_privacy_policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans_product_list`
--
ALTER TABLE `trans_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trans_qoute`
--
ALTER TABLE `trans_qoute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `trans_quotation`
--
ALTER TABLE `trans_quotation`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `trans_quotation_has_product`
--
ALTER TABLE `trans_quotation_has_product`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `trans_quotation_pricing`
--
ALTER TABLE `trans_quotation_pricing`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trans_services`
--
ALTER TABLE `trans_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trans_shifting`
--
ALTER TABLE `trans_shifting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trans_terms_condition`
--
ALTER TABLE `trans_terms_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trans_testimonials`
--
ALTER TABLE `trans_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trans_users_groups`
--
ALTER TABLE `trans_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trans_user_inquery`
--
ALTER TABLE `trans_user_inquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `trans_user_login`
--
ALTER TABLE `trans_user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
--
-- AUTO_INCREMENT for table `trans_vehicle_services`
--
ALTER TABLE `trans_vehicle_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_enquiry`
--
ALTER TABLE `trans_enquiry`
  ADD CONSTRAINT `trans_enquiry_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `trans_invoice`
--
ALTER TABLE `trans_invoice`
  ADD CONSTRAINT `fk_order_id_invoice` FOREIGN KEY (`order_id`) REFERENCES `trans_order` (`id`);

--
-- Constraints for table `trans_order`
--
ALTER TABLE `trans_order`
  ADD CONSTRAINT `fk_quotation_id_order` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `trans_user_login` (`user_id`);

--
-- Constraints for table `trans_quotation_has_product`
--
ALTER TABLE `trans_quotation_has_product`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `trans_product_list` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_quotation_id` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `trans_quotation_pricing`
--
ALTER TABLE `trans_quotation_pricing`
  ADD CONSTRAINT `trans_quotation_pricing_ibfk_1` FOREIGN KEY (`quotation_id`) REFERENCES `trans_quotation` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
