<?php $userSession = userSession();?>
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
            <div class="mainmenu-area" id="mainmenu-area" style="background-color: #7fbf15;padding: 0px 4px;">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?= base_url()?>home" class="navbar-brand"><img src="<?= base_url()?>assets/themenew/img/logo_white_tag.png" alt="logo" style="height:auto;width:90px;margin-top: 8px;"></a>
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
                            <ul id="nav" class="nav navbar-nav" style="margin-top: 2%;margin-right: -12%;">
                                <!--<li><a href="<?= base_url()?>">Home</a></li>
                                <li><a href="<?= base_url()?>aboutus">About Us</a></li>
                                <li><a href="<?= base_url()?>services">Service</a></li>
                                <li><a href="<?= base_url()?>vehicles">Price</a></li>-->
                                
                                <?php if (empty($userSession['uid'])) { ?>
                                        <li><a href="javascript:void(0)" id="login" style="font-family: Arial, sans-serif;font-weight: 900;"><b><em>Login</em></b></a></li>
                                <?php }else{ ?>
                                        <li><a href="javascript:void(0)"><?= !empty($userSession['fullname'])?$userSession['fullname']:'My Account'?></a>
                                            <ul>
                                                <li class="<?= $title == 'My Account' ? 'active' : '' ?>"><a href="<?= site_url('myaccount') ?>">My Account</a></li>
                                                <li><a href="<?= site_url(); ?>logout" >Sign Out</a></li>
                                            </ul>
                                        </li>
                                <?php } ?>
                                <!--<li><a href="<?= base_url()?>contactus">Support</a></li>
                                <li><a href="<?= base_url()?>contactus">Contact Us</a></li>-->
                                <li><a href="https://www.facebook.com/shiftme/?pnref=story.unseen-section" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/shiftme.in/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://twitter.com/ShiftMe007" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.google.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li>
                                    <div class="row" style="margin-top:20%;padding:5%;width:76%;">
                                        <div class="col-md-1" style="margin-right:-15%;margin-top:-37%;font-size: 20px;">
                                            <div style="color:#fff;" class="fa fa-phone-square"></div>
                                        </div>
                                        <div class="col-md-11" style="margin-top:-38%;margin-left: 10%;">
                                            <a href="tel:9689622000"><span style="color:#fff;font-family: Arial, sans-serif; font-weight: 900;"><b><em>9689622000.</em></b></span><br></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!--<ul  id="nav" class="nav navbar-nav social-nav" style="margin-top: -2%; margin-right: -10%;">
                                <li><a href="https://www.facebook.com/shiftme/?pnref=story.unseen-section" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/shiftme.in/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://twitter.com/ShiftMe007" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.google.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://www.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>-->
                        </div>
                    </div>
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>
        <?php 
            if(!empty($slider)){ 
        ?>
            <div class="welcome-slider-area">
                <div class="welcome-single-slide slider-bg-one">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="welcome-text text-center">
                                    <?php if(empty($slider_details)){ ?>
                                        <h1 style="background-color: rgba(0,0,0,0.3);padding:0px 5%;">CLICK KARO SHIFT KARO</h1>
<!--                                        <p style="background-color: rgba(0,0,0,0.3);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>-->
                                    <?php }else{ ?>    
                                            <h1><?= $slider_heading?></h1>
                                            <p><?= $slider_description?></p>   
                                    <?php } ?>    
                                    <div class="home-button">
                                        <a href="<?= base_url()?>services">Our Service</a>
                                        <a href="<?= base_url()?>quote">Get A Quote</a>
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
                                    <?php if(empty($slider_details)){ ?>
                                        <h1 style="background-color: rgba(0,0,0,0.3);padding:0px 5%;">CLICK KARO SHIFT KARO</h1>
<!--                                        <p style="background-color: rgba(0,0,0,0.3);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>-->
                                    <?php }else{ ?>    
                                            <h1><?= $slider_heading?></h1>
                                            <p><?= $slider_description?></p>   
                                    <?php } ?>    
                                    <div class="home-button">
                                        <a href="<?= base_url()?>services">Our Service</a>
                                        <a href="<?= base_url()?>quote">Get A Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>