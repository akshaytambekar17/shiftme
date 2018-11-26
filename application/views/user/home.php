<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<style>
    .submit-btn{
        background: #5d6b82 none repeat scroll 0 0;
        border: 0 none;
        border-radius: 3px;
        color: #fff;
        font-weight: 600;
        letter-spacing: 2px;
        padding: 5px 87px;
        text-transform: uppercase;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }
    .slider-form{
            background-color: rgba(243, 156, 18, 0.81);
            padding: 22px 16px;
            position: absolute;
            top: 96%;
            left: 7%;
            z-index: 10;
    }
    @media (max-width:480px){
         .slider-form{
             margin-bottom:-16px;
             position: relative;
            top: -2%;
            left: 0%;
         }
    }
</style>
    <!--Enquiry form start-->
    <div class="container slider-form">
        <div class="row">
            <form class="form-group">
                <div class="col-md-3">
                    <input type="text" placeholder="Pick Point" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="text" placeholder="Drop Point" class="form-control">
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option>Select Vehicle</option>
                    </select>
                </div>
                <div class="col-md-3 form-group">
                    <button class="submit-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!--Enquiry form end-->
    
    <!--ABOUT AREA-->
    <section class="about-area gray-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Welcome to Shiftme </h2>
                        <p>The best part of a successful Shift is flawless logistics during the Shifting process. The following steps are taken to ensure that you are satisfied with your Shifting </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="about-left-content-area wow fadeIn">
                        <img src="<?= base_url()?>assets/themenew/img/about/truck.gif" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                    <div class="about-content-area wow fadeIn">
                        <div class="about-content">
                            <h2>Shiftme offer specialized Packing services to make your shifting as easy and hassle-free as possible.</h2>
                            <p>Shiftme is always looking for ways to improve our ability to meet the needs of our individual and corporate customers. We have specialized equipments and a team of dedicated professionals who are committed to excellence in customer service. Our motto is to satisfy our customers through our work.</p>
                            <a href="<?= base_url()?>services">read more <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT AREA END-->

    <!--SERVICE AREA-->
    <section class="service-area-three section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Our Service</h2>
                        <p>The best part of a successful Shift is flawless logistics during the Shifting process. The following steps are taken to ensure that you are satisfied with your Shifting</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay=".2s">
                        <div class="service-icon-three"><i class="fa fa-dropbox"></i></div>
                        <h4>EASY BOOKING</h4>
                        <p>Booking your order is on your finger tips. Just click on Shiftme.in or give us a call on +91 96896-22000.</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-icon-three"><i class="fa fa-dropbox"></i></div>
                        <h4>LOW COST SHIFTING</h4>
                        <p>No more wastage of Time & money. We are providing packing and shifting services at the customized rates as per your requirements.</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-service-three wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-icon-three"><i class="fa fa-dropbox"></i></div>
                        <h4>DOOR TO DOOR SERVICE</h4>
                        <p>Now you don’t need to go anywhere, we are just a click/call away. We will be at your doorstep with our professionals to provide best services.</p>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!--SERVICE AREA END-->
    
    <!--PROMO AREA-->
    <section class="promo-area">
        <div class="promo-bottom-area section-padding">
            <div class="promo-botton-area-bg" data-stellar-background-ratio="0.6"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12 text-center">
                        <div class="promo-bottom-content wow fadeIn">
                            <h2>WE OFFER QUICK & POWERFUL SOLUTION</h2>
                            <a href="<?= base_url()?>quote" class="read-more">Get a quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PROMO AREA END-->

    <!--BLOG AREA-->
    <section class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>OUR TEAM</h2>
                        <p>Our team aim is to provide you best service</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-image">
                            <img src="<?= base_url()?>assets/themenew/img/blog/2.jpg" alt="">
                        </div>
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><i class=""></i></a></div>
                            <h3><a href="single-blog.html">Robin Madell</a></h3>
                            <p>Try these job-search and interview tips that can help make looking for work less overwheling.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-image">
                            <img src="<?= base_url()?>assets/themenew/img/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><i class=""></i></a></div>
                            <h3><a href="single-blog.html">Marcelle Yeager</a></h3>
                            <p>Knowing where to draw the line on over-apologizing and provide you best solution.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-image">
                            <img src="<?= base_url()?>assets/themenew/img/blog/3.jpg" alt="">
                        </div>
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><i class=""></i></a></div>
                            <h3><a href="single-blog.html">Jhone AD</a></h3>
                            <p>Robots, telecommuting and improved online recruiting will be on the rise in 2017.</p>
                            <a href="single-blog.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->
    
    <!--SERVICE AREA-->
    <section class="service-area-two section-padding gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Vehicles For You</h2>
                        <p>Available Shifting Vehicles For You</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="service-content wow fadeIn">
                        <h2>we offer quick & powerful logistics solution</h2>
                        <p>Now you don’t need to go anywhere, we are just a click/call away. We will be at your doorstep with our professionals to provide best services.</p>
                        <a href="<?= base_url()?>vehicles" class="read-more" style="width: 200px">Get More Vehicles</a>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="service-two-content wow fadeIn">
                        <div class="row no-margin">
                            <?php foreach(array_slice($vehicle_list,0,6) as $value){ ?>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                    <div class="single-service-two border">
                                        <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                        <h4><?= $value['vehicle_name']?></h4>
                                        <p>Capacity :<?= $value['capacity']?> kg<br>Size(LxBxH) : <?= $value['dimension']?></p>
                                    </div>
                                </div>
                            <?php } ?>
<!--                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                <div class="single-service-two border-top border-bottom border-right">
                                    <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                    <h4>PICKUP 8FT OPEN</h4>
                                     <p>Capacity :1000 kg<br>Size(LxBxH) : 8ft x 4.5ft x 5.5ft</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                <div class="single-service-two border-left border-right border-bottom">
                                    <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                    <h4>PORTER HIRE</h4>
                                    <p>Capacity :750 kg<br>Size(LxBxH) : 7ft x 4.5ft x 5.5ft</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                <div class="single-service-two border-right border-bottom">
                                    <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                    <h4>TATA ACE OPEN</h4>
                                     <p>Capacity :750 kg<br>Size(LxBxH) : 7ft x 4.5ft x 5.5ft</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                <div class="single-service-two border-left border-right border-bottom">
                                    <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                    <h4>TATA 407</h4>
                                     <p>Capacity :2500 kg<br>Size(LxBxH) : 9ft x 5.5ft x 6ft</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                <div class="single-service-two border-right border-bottom">
                                    <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                    <h4>PICKUP 8FT</h4>
                                    <p>Capacity :1000 kg<br>Size(LxBxH) : 8ft x 4.5ft x 5.5ft</p>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SERVICE AREA END-->
    
    <!--SERVICE AREA-->
    <section class="service-area">
        <div class="service-bottom-area section-padding">
            <div class="service-bottom-area-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-6 col-lg-offset-6 col-sm-12 col-xs-12">
                        <div class="service-list wow fadeIn">
                            <div class="area-title text-center wow fadeIn">
                                <h2>How It Works</h2>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon">
                                            <i class="fa fa-dropbox"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>1. Plan your shifting</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon"><i class="fa fa-dropbox"></i></div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>2. Call us or visit</h4>
                                    <p>shiftme.in</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon"><i class="fa fa-dropbox"></i></div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>3. We'll do the rest</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon"><i class="fa fa-dropbox"></i></div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>4. Be Relaxed</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SERVICE AREA END-->
    
    <!--TESTMONIAL AREA -->
    <section class="testmonial-area gray-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>what client’s say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <div class="client-photo-list wow fadeIn">
                        <div class="client_photo">
                            <div class="item">
                                <img src="<?= base_url()?>assets/themenew/img/testmonial/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?= base_url()?>assets/themenew/img/testmonial/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?= base_url()?>assets/themenew/img/testmonial/3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?= base_url()?>assets/themenew/img/testmonial/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="<?= base_url()?>assets/themenew/img/testmonial/2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="client_nav">
                        <span class="fa fa-angle-left testi_prev"></span>
                        <span class="fa fa-angle-right testi_next"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
                    <div class="client-details-content wow fadeIn">
                        <div class="client_details">
                            <div class="item">
                                <q>I have booked a tata ace for transferring some stuff of my home. Happy to say that the tempo was on time and behavior of tempo driver is also good.. I really liked the service and sure to book the same service next time . </q>
                                <h3>Neha Shrivastav </h3>
                                <p>Allstate Solutions Private Ltd</p>
                            </div>
                            <div class="item">
                                <q>Easy to book. Vehicle was provided on time and the service was good. Simply Great! </q>
                                <h3>Vikash Patil</h3>
                                <p>State Bank Of India</p>
                            </div>
                            <div class="item">
                                <q>Highly reccomended. Loved the service of ShiftMe.in. They are the real guru when it comes to shift your home. I called them once and they did everything wisely and very safely. </q>
                                <h3>Nilesh Hemnani</h3>
                                <p>Tech.Mahindra</p>
                            </div>
                            <div class="item">
                                <q>Experience with ShiftMe.in was really great. Booked online and they provided me suitable vehicle and labour as well. The team is very professional and helpful. I must recommend Shiftme.in if you are moving your home. </q>
                                <h3>Shashikant Paliwal </h3>
                                <p>TCS</p>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--TESTMONIAL AREA END -->
    
    