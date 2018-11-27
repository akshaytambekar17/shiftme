<body class="home-three">

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
    <header class="top-area" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?= base_url()?>" class="navbar-brand"><img src="<?= base_url()?>assets/themenew/img/logo1.png" alt="logo"></a>
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
                            <ul id="nav" class="nav navbar-nav">
                                <li><a href="<?= base_url()?>">Home</a>
                                    <!--<ul>
                                        <li><a href="index.html">Home Version 1</a></li>
                                        <li><a href="index-2.html">Home Version 2</a></li>
                                        <li><a href="index-3.html">Home Version 3</a></li>
                                        <li><a href="index-4.html">Home Version 4</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="<?= base_url()?>aboutus">About Us</a>
                                    <!--<ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="about-company-profile.html">About Profile</a></li>
                                        <li><a href="about-company-history.html">About History</a></li>
                                        <li><a href="about-company-report.html">About Report</a></li>
                                        <li><a href="about-team.html">About Team</a></li>
                                        <li><a href="about-support.html">About Support</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="<?= base_url()?>services">Service</a>
                                    <!--<ul>
                                        <li><a href="service.html">Service Version 1</a></li>
                                        <li><a href="service-2.html">Service Version 2</a></li>
                                        <li><a href="service-3.html">Service Version 3</a></li>
                                        <li><a href="single-service.html">Service Details</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="<?= base_url()?>vehicles">Price</a>
                                    <!--<ul>
                                        <li><a href="blog.html">Blog Version 1</a></li>
                                        <li><a href="blog-2.html">Blog Version 2</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="<?= base_url()?>contactus">Contact Us</a>
                                    <!--<ul>
                                        <li><a href="contact.html">Contact Version 1</a></li>
                                        <li><a href="contact-2.html">Contact Version 2</a></li>
                                    </ul>-->
                                </li>
                                <?php 
                                    $seesion = $this->session->userdata();
                                    if (empty($seesion['uid'])) { ?>
                                        <li><a href="javascript:void(0)" id="login">Login</a></li>
                                <?php }else{ ?>
                                        <li><a href="<?= base_url()?>contactus">My Account</a>
                                            <ul>
                                                <li class="<?= $title == 'My Account' ? 'active' : '' ?>"><a href="<?= site_url('myaccount') ?>">My Account</a></li>
                                                <li><a href="<?= site_url(); ?>logout" >Sign Out</a></li>
                                            </ul>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>
        <!--HOME SLIDER AREA-->
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
                                        <h1>CLICK KARO SHIFT KARO</h1>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
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
                                    <h1>BEST SHIFTING SERVICE</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
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
        <!--END HOME SLIDER AREA-->
    </header>