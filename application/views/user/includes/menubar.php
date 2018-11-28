<?php $userSession = userSession(); ?>
<body class="home-three">
    <style>
        .social-nav{
            margin-top:-10%;
        }
    </style>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <div class="header-top-area">
        <!--MAINMENU AREA-->
        <div class="mainmenu-area" id="mainmenu-area" style="background-color: #5eb8ab;">
            <div class="mainmenu-area-bg"></div>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?= base_url() ?>" class="navbar-brand"><img src="<?= base_url() ?>assets/themenew/img/logo1.png" alt="logo"></a>
                    </div>
                    <!--<div class="search-and-language-bar pull-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i></a></li>
                            <li class="search-box"><i class="fa fa-search"></i></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
                            <li class="select-language">
                                <select name="#" id="#">
                                <option selected value="End">ENG</option>
                                <option value="ARA">ARA</option>
                                <option value="CHI">CHI</option>
                            </select>
                            </li>
                        </ul>
                        <form action="#" class="search-form">
                            <input type="search" name="search" id="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>-->
                    <div id="main-nav" class="stellarnav">
                        <ul id="nav" class="nav navbar-nav" style="margin-top: 2%;">
                            <!--<li><a href="<?= base_url() ?>">Home</a></li>
                            <li><a href="<?= base_url() ?>aboutus">About Us</a></li>
                            <li><a href="<?= base_url() ?>services">Service</a></li>
                            <li><a href="<?= base_url() ?>vehicles">Price</a></li>-->

                            <?php if (empty($userSession['user_id'])) { ?>
                                <li><a href="javascript:void(0)" id="login">Login</a></li>
                            <?php } else { ?>
                                <li><a href="javascript:void(0)">My Account</a>
                                    <ul>
                                        <li class="<?= $title == 'My Account' ? 'active' : '' ?>"><a href="<?= site_url('myaccount') ?>">My Account</a></li>
                                        <li><a href="<?= site_url(); ?>logout" >Sign Out</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <li><a href="<?= base_url() ?>contactus">Support</a></li>
                            <li><a href="<?= base_url() ?>contactus">Contact Us</a></li>
                            <li>
                                <div class="row" style="margin-top:20%;padding:5%;width:76%;">
                                    <div class="col-md-1" style="margin-right:-20%;margin-top:-20%;font-size: 20px;">
                                        <div style="color:#fff;" class="fa fa-phone-square"></div>
                                    </div>
                                    <div class="col-md-11" style="margin-top:-20%;">
                                        <span style="color:#fff;">522-365-41</span><br>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11" style="margin-top:-5%;">
                                        <span style="color:#fff;font-size:13px;margin-top:5%;">Contact Here</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul  id="nav" class="nav navbar-nav social-nav" style="margin-top: -2%; margin-right: -37%;">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!--END MAINMENU AREA END-->
    </div>
    <header class="top-area" id="home"  style="margin-top: 7%;">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>

        <!--HOME SLIDER AREA-->
        <?php
            if (!empty($slider)) {
        ?>
            <div class="welcome-slider-area">
                <div class="welcome-single-slide slider-bg-one">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="welcome-text text-center">
                                    <?php if (empty($slider_details)) { ?>
                                        <h1 style="background-color: rgba(0,0,0,0.3);">CLICK KARO SHIFT KARO</h1>
                                        <p style="background-color: rgba(0,0,0,0.3);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <?php } else { ?>    
                                        <h1><?= $slider_heading ?></h1>
                                        <p><?= $slider_description ?></p>   
                                    <?php } ?>    
                                    <div class="home-button">
                                        <a href="<?= base_url() ?>services">Our Service</a>
                                        <a href="<?= base_url() ?>quote">Get A Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="welcome-single-slide slider-bg-two">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="welcome-text text-center">
                                    <h1 style="background-color: rgba(0,0,0,0.3);">BEST SHIFTING SERVICE</h1>
                                    <p style="background-color: rgba(0,0,0,0.3);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="home-button">
                                        <a href="<?= base_url() ?>services">Our Service</a>
                                        <a href="<?= base_url() ?>quote">Get A Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--END HOME SLIDER AREA-->
    </header>