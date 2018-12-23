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
        padding: 5px 37px;
        text-transform: uppercase;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }
    .slider-form{
            background-color:#7fbf15ed;
            padding: 22px 16px;
            position: absolute;
            top: 86%;
            left: 7%;
            z-index: 10;
    }
    .get-more{
        margin-top:10%;
        margin-left:10%;
    }
    .promo-botton-area-bg-other {
        background: rgba(0, 0, 0, 0) url(../../../assets/themenew/img/promo/app_bg.jpg) no-repeat scroll center center / cover;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
    }
    .promo-botton-area-bg-other::after {
        background: #ffffffde none repeat scroll 0 0;
        content: "";
        height: 100%;
        left: 0;
        opacity: 0.9;
        position: absolute;
        top: 0;
        width: 100%;
    }
    .solution-icon img{
        height:6%;
        width:15%;
    }
    .solution-icon p{
        margin-top:3%;
    }
    .solution-icon{
        text-align:center;
        color:#fff;
        margin-top:5%;
    }
    .solution-icon-area{
        padding:0% 0%;
    }
    .we-offer-area{
        padding-left:5%;
    }
    .we-offer-list img{
        height:6%;
        width:13%;
    }
    /*.we-offer-list li{
        list-style-type:url(../../../assets/themenew/img/service/N truck.png);
    }*/
    @media (max-width:480px){
         .slider-form{
             margin-bottom:-16px;
             position: relative;
            top: -2%;
            left: 0%;
         }
    }
    .partner-solution-icon{
        overflow:hidden;
    }
    .partner-solution-icon img{
        height:20%;
        width:60%;
    }
    .c-align{
	text-align:center;    
    }
    .partner-solution-icon img:hover{
       opacity:0.5;
        
    }
</style>
<!--<header class="top-area" id="home"  style="margin-top: 5%;">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>-->
        
        <!--HOME SLIDER AREA-->
        <?php 
//            if(!empty($slider)){ 
//        ?>
<!--            <div class="welcome-slider-area">
                <div class="welcome-single-slide slider-bg-one">
                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="welcome-text text-center">
                                    //<?php //if(empty($slider_details)){ ?>
                                        <h1 style="background-color: rgba(0,0,0,0.3);padding:0px 5%;">CLICK KARO SHIFT KARO</h1>
                                        <p style="background-color: rgba(0,0,0,0.3);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    //<?php //}else{ ?>    
                                            <h1>//<?= $slider_heading?></h1>
                                            <p>//<?= $slider_description?></p>   
                                    //<?php //} ?>    
                                    <div class="home-button">
                                        <a href="//<?= base_url()?>services">Our Service</a>
                                        <a href="//<?= base_url()?>quote">Get A Quote</a>
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
                                    <h1 style="background-color: rgba(0,0,0,0.3);padding:0px 5%;">BEST SHIFTING SERVICE</h1>
                                    <p style="background-color: rgba(0,0,0,0.3);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="home-button">
                                        <a href="//<?= base_url()?>services">Our Service</a>
                                        <a href="//<?= base_url()?>quote">Get A Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        <?php //} ?>
        <!--END HOME SLIDER AREA-->
<!--    </header>-->
    <!--Enquiry form start-->
    <div class="container slider-form">
        <div class="row">
            <form class="form-group" method="post" name="quick_quote" id="quick-quote">
                <div class="col-md-3">
                    <div class="input-group ">
                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                        <input type="text" class="form-control" name="pickupPoint" id="pickupPoint" placeholder="Pickup Point">
                    </div>
                    <span class="has-error error-pick-point"></span>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                        <input type="text" class="form-control" name="dropPoint" id="dropPoint" placeholder="Drop Point">
                    </div>
                    <span class="has-error error-drop-point"></span>
                </div>
<!--                <div class="col-md-2">
                    <input type="text" placeholder="Mobile No" class="form-control">
                </div>
                <div class="col-md-2">
                    <input type="text" placeholder="Name" class="form-control">
                </div>-->
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control select2" name="select_options" id="select-requirement">
                            <option disabled selected>Select Requirement</option>
                            <option value="vehicles">Vehicles Only</option>
                            <option value="movers" >Movers & Packers</option>
                            <option value="business">Business</option>
                        </select>
                        <span class="has-error error-requirement"></span>
                    </div>
                    <div class="form-group" id="div-vehicles">
                        <select class="form-control select2" name="vehicle_id" id="select-vehicles">
                            <option disabled selected>Select Vehicles</option>
                            <?php foreach($vehicle_list as $value){ ?>
                            <option value="<?= $value['id']?>"><?= $value['vehicle_name']?></option>
                            <?php } ?>    
                        </select>
                        <span class="has-error error-vehicles"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="submit-btn" id="submit" type="submit">Submit</button>
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
                    <div class="area-title text-center wow fadeIn section-padding">
                        <h2>Welcome to Shiftme </h2>
                        <p>The best part of a successful Shift is flawless logistics during the Shifting process. The following steps are taken to ensure that you are satisfied with your Shifting </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Vehicles For You</h2>
                        <p>Available Shifting Vehicles For You</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="service-content wow fadeIn">
                        <h2>we offer quick & powerful logistics solution</h2>
                        <p>Now you don’t need to go anywhere, we are just a click/call away. We will be at your doorstep with our professionals to provide best services.</p>
                        <a href="<?= base_url()?>vehicles" class="read-more" style="width: 200px">Get More Vehicles</a>
                        
                    </div>
                </div>-->
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="service-two-content wow fadeIn">
                        <div class="row no-margin">
                            <?php foreach(array_slice($vehicle_list,0,6) as $value){ $model_id='vehicle'.$value['id'];?>
                                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding" data-target="#<?= $model_id ?>" data-toggle="modal">
                                    <div class="single-service-two border">
                                        <div class="service-icon-two"><i class="fa fa-truck"></i></div>
                                        <h4><?= $value['vehicle_name']?></h4>
                                        <!--<p>Capacity :<?= $value['capacity']?> kg<br>Size(LxBxH) : <?= $value['dimension']?></p>-->
                                    </div>
                                </div>
                                <div class="modal fade" id="<?= $model_id ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><?= $value['vehicle_name']?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="<?= $value['image']?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4><?= $value['vehicle_name']?></h4>
                                                            <p>Capacity :<?= $value['capacity']?> kg<br>Size(LxBxH) : <?= $value['dimension']?></p>
                                                            <p>Charges:	Rs. <?= $value['transit_charge']?> Per km</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                                <div class="get-more">
                                    <a href="<?= base_url()?>vehicles" class="read-more" style="width: 200px">Get More Vehicles</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT AREA END-->
    
    <!--PROMO AREA-->
    <section class="promo-area">
        <div class="promo-bottom-area section-padding">
            <div class="promo-botton-area-bg-other" data-stellar-background-ratio="0.6"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="about-left-content-area wow fadeIn">
                            <img src="<?= base_url()?>assets/themenew/img/about/mobile-phone.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                        <div class="about-content-area wow fadeIn">
                            <div class="area-title about-content">
                                <h2 class="area-title" style="color:#3c4a62;">Click Karo Shift Karo</h2>
                                <p style="color:#3c4a62;">Shiftme is always looking for ways to improve our ability to meet the needs of our individual and corporate customers. We have specialized equipments and a team of dedicated professionals who are committed to excellence in customer service. Our motto is to satisfy our customers through our work.</p>
                                <h5 style="color:#3c4a62;">ShiftMe App Coming Soon</h5>
                                <a href="#"><img alt="Get it on Google Play" src="<?= base_url()?>assets/themenew/img/about/goolge_app.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PROMO AREA END-->
    
    <!--ABOUT AREA-->
    <section class="about-area gray-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="about-left-content-area wow fadeIn">
                        <img src="<?= base_url()?>assets/themenew/img/about/truck.gif" alt="">
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                    <div class="about-content-area wow fadeIn">
                        <div class="area-title about-content">
                            <h2>What We Offer</h2>
                            <p>Shiftme is always looking for ways to improve our ability to meet the needs of our individual and corporate customers. We have specialized equipments and a team of dedicated professionals who are committed to excellence in customer service. Our motto is to satisfy our customers through our work.</p>
                            <!--<a href="<?= base_url()?>services">read more <i class="fa fa-angle-right"></i></a>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                    <div class="we-offer-area">
                        <ul class="we-offer-list">
                            <li><img src="<?= base_url()?>assets/themenew/img/service/online-reservation.png" alt="">&nbsp;&nbsp;EASY BOOKING</li><br>
                            <li><img src="<?= base_url()?>assets/themenew/img/service/truck(2).png" alt="">&nbsp;&nbsp;ON TIME DELIVERY</li><br>
                            <li><img src="<?= base_url()?>assets/themenew/img/service/cost.png" alt="">&nbsp;&nbsp;LOW COST SHIFTING</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                    <div class="we-offer-area">
                        <ul class="we-offer-list">
                            <li><img src="<?= base_url()?>assets/themenew/img/service/search.png" alt="">&nbsp;&nbsp;DOOR TO DOOR SERVICE</li><br>
                            <li><img src="<?= base_url()?>assets/themenew/img/service/info.png" alt="">&nbsp;&nbsp;24-HOUR BOOKING</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT AREA END-->

    <!--PROMO AREA-->
    <section class="promo-area">
        <div class="promo-bottom-area section-padding">
            <div class="promo-botton-area-bg" data-stellar-background-ratio="0.6"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12 text-center">
                        <div class="area-title promo-bottom-content wow fadeIn">
                            <h2>SOLUTION FOR INDUSTRIES</h2>
                        </div>
                    </div>
                </div>
                <div class="row solution-icon-area">
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N truck.png" alt="">
                            <p>Relocation</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N armchair.png" alt="">
                            <p>Furniture, Electronics, Any Household items</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N factory.png" alt="">
                            <p>Industrial Goods</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N grocery.png" alt="">
                            <p>Groceries, Vegetables, Fruits, Any perishable items</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N remove-item-from-cart.png" alt="">
                            <p>Ecommerce Items</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N master-of-ceremonies.png" alt="">
                            <p>Event Management Supplies</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N crane1.png" alt="">
                            <p>Construction Material</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 no-padding">
                        <div class="solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/service/N truck 1.png" alt="">
                            <p>Simply Any Transportation</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12 text-center">
                        <div class="promo-bottom-content wow fadeIn">
                            <a href="<?= base_url()?>quote" class="read-more">Get a quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PROMO AREA END-->
    
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
    <!--PROMO AREA-->
    <section class="promo-area">
        <div class="promo-bottom-area section-padding">
            <div class="partner-promo-botton-area-bg" data-stellar-background-ratio="0.6"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12 text-center">
                        <div class="area-title promo-bottom-content wow fadeIn">
                            <h2>Our Partners</h2>
                        </div>
                    </div>
                </div>
                <div class="row solution-icon-area">
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12 no-padding c-align">
                        <div class="partner-solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/client/SBI.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12 no-padding c-align">
                        <div class="partner-solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/client/S_B.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12 no-padding c-align">
                        <div class="partner-solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/client/SBI.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12 no-padding c-align">
                        <div class="partner-solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/client/S_B.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12 no-padding c-align">
                        <div class="partner-solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/client/S_B.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12 no-padding c-align">
                        <div class="partner-solution-icon">
                            <img src="<?= base_url()?>assets/themenew/img/client/S_B.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PROMO AREA END-->
      
<script src="<?= base_url()?>assets/themenew/js/vendor/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#select-requirement").on('change',function(){
            var requirement = $(this).val();
            if(requirement == 'vehicles'){
                $("#div-vehicles").show();
            }else{
                $("#div-vehicles").hide();
            }
        });        
        //$("#submit").on('click',function(){
        $('#quick-quote').submit(function () {
            var valid = quotationForm();
            if(valid){
                var requirement = $("#select-requirement").val();
                var pick_point = $("#pickupPoint").val();
                var drop_point = $("#dropPoint").val();
                if(requirement == 'movers'){
                    var formAction = "<?= base_url()?>quote"+'?pickupPoint='+pick_point+'&dropPoint='+drop_point;
                }else if(requirement == 'vehicles'){
                    var vehicle = $("#select-vehicles").val();
                    var formAction = "<?= base_url()?>quick-quote"+'?pickupPoint='+pick_point+'&dropPoint='+drop_point+'&vehicle_id='+vehicle;
                }else{
                    var formAction = "<?= base_url()?>contactus";
                }
                //set form action
                $('#quick-quote').attr('action', formAction);
            }else{
                return false;
            }
            
        });        
        function quotationForm(){
            var pick_point = $("#pickupPoint").val();
            var drop_point = $("#dropPoint").val();
            var requirement = $("#select-requirement").val();
            flag = true;
            if(pick_point == ''){
                $('.error-pick-point').text("Please enter the Pickup Loaction");
                flag = false;
            }else{
                $('.error-pick-point').text("");
            }
            if(drop_point == ''){
                $('.error-drop-point').text("Please enter the Drop Loaction");
                flag = false;
            }else{
                $('.error-drop-point').text("");
            }
            if(requirement == '' || requirement == null){
                $('.error-requirement').text("Please Select Requirement");
                flag = false;
            }else{
                if(requirement == 'vehicles'){
                    if($("#select-vehicles").val() == '' || $("#select-vehicles").val() == null){
                        $('.error-requirement').text("");
                        $('.error-vehicles').text("Please Select Vehicles");
                        flag = false;
                    }else{
                        $('.error-requirement').text("");
                        $('.error-vehicles').text("");
                    }
                }else{
                    $('.error-requirement').text("");
                    $('.error-vehicles').text("");
                }
            }
            return flag;
        }
    });
</script>    