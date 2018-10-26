<?php if ($this->session->flashdata('insert_msg')) { ?>
    <script>
        $.notify("<?= $this->session->flashdata('insert_msg') ?>", "success");
    </script>

<?php } ?>
<?php if ($this->session->flashdata('error_msg')) { ?>
    <script>
        $.notify("<?= $this->session->flashdata('error_msg') ?>", "error");
    </script>

<?php } ?>
<?php if ($this->session->flashdata('user_valid')) { ?>
                                        <!--    <script>
                                                alert("User Not Login");
                                            </script>-->

<?php } ?>
<?php if ($this->session->flashdata('contact_us')) { ?>
                                        <!--    <script>
                                                alert("Email Sent Successfully");
                                            </script>-->

<?php } ?>
<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
<style type="text/css">

    @media only screen 
    and (min-device-width : 640px) and (max-width:700px)  {
        .mg-room figcaption h2 {
            margin-top: -30px !important;
        }
        .mg-room.mg-room-col-2:hover figcaption h2, .mg-room.mg-room-col-2:hover figcaption .mg-room-rating{
            margin-top: 0px !important;
        }
    }
p{ font-family: "Goudy Old Style", Garamond, "Big Caslon", "Times New Roman", serif;}
.mystyle{font-family: "Goudy Old Style";
    font-weight: 600;
    line-height: 26.4px;}
    
/* Smartphones (portrait and landscape) ----------- */
@media only screen
and (min-device-width : 320px) 
and (max-device-width : 480px) {
/* Styles */ .red_truck{margin-top: -100px;}
.header .navbar-collapse {
    background-color: #fff;
}
}
 

 
/* iPads (portrait and landscape) ----------- */
@media only screen
and (min-device-width : 768px) 
and (max-device-width : 1024px) { .red_truck{margin-top: -100px;}
/* Styles */
}
@media only screen and (max-width:768px) { .red_truck{margin-top: -100px; }
/* fixes for the iPhone and iPad to show default controls */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px)  {  .red_truck{margin-top: -100px;}
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) 
and (orientation : portrait) {  .red_truck{margin-top: -100px;}
@media only screen 
and (min-device-width : 375px) 
and (max-device-width : 667px) { .red_truck{margin-top: -100px; }
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 568px) { .red_truck{margin-top: -100px; }
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {  }
</style>

<div id="mega-slider" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
   <!-- <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($slider as $s) {
            ?>

            <li data-target="#mega-slider" data-slide-to="<?= $i; ?>" class="<?php
            if ($i == 0) {
                echo 'active';
            }
            ?>"></li>
                <?php
                $i++;
            }
            ?>
    </ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $i = 0;
        foreach ($slider as $s) {
            ?>
            <div class="item <?php
            if ($i == 0) {
                echo 'active';
            }
            ?>">
                <img src="<?= base_url(); ?>upload/slider images/<?= $s['images'] ?>" alt="..." >
                <div class="carousel-caption">
                    <div class="row">
                        <div class="slider-text">
                            <h2><?= $s['Description'] ?></h2>
                        </div>
                       
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>

    </div>

    <div class="well-searchbox hidden-sm hidden-xs">
        <!--<form class="form-horizontal" ng-submit="save()" method="POST" role="form" id="form-horizontal">-->



        <form class="" action="<?= site_url(); ?>quick-quote" method="POST" role="form" id="form-horizontal">

            <div class="well-searchbox-contnts">
                <div class="row">
                    <div class="col-md-12" >
                        
                        <div class="col-md-3" >
                            <div class="input-group ">
                                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                <input type="text" class="form-control" name="pickupPoint" id="pickupPoint" placeholder="Pickup Point">
                            </div>
                        </div>
                        <div class="form-group col-md-3" style="margin: 0px">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                <input type="text" class="form-control" name="dropPoint" id="dropPoint" placeholder="Drop off Point">
                            </div>
                        </div>
                        <div class=" col-md-3" style="margin: 0px">
                            <script>$('.selectpicker').selectpicker({
                                    style: 'btn-info',
                                    size: 4
                                });</script>

                            <select class="fontawesome-select selectpicker" style="color: #4b565b;box-shadow: none;width: 100%;padding: 8px 12px; height: 37px; border-color: #ced4d7; margin-bottom: 10px; border-radius: 4px;" name="vehicle" id="vehicle" ng-data-model="log.vehicle">
                                <option value="" disabled selected class='' style='margin-bottom: -2px;height: 37px'>&#xf0d1; &nbsp; Vehicles</option>
                                <?php foreach ($vehicle as $v) { ?>

                                    <option style='padding: 6px;height: 37px' class='' value="<?php echo $v['id']; ?>">&#xf0d1; &nbsp; <?php echo $v['vehicle_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-3" style="margin: 0px">
                            <button type="submit" class="btn btn-submit btn-block" style="width: 100% !important"   onclick="return inquery_valid()">Check Now</button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!--    <div class="col-md-2 hidden-sm hidden-xs"></div>-->
    <!-- Controls -->
    <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
    </a>
    <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
    </a>
</div>

<div class="mg-book-now green hidden-lg hidden-md">
    <div class="container" data-ng-controller="inquery">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="mg-bn-forms">
                    <form action="<?= site_url(); ?>quick-quote" method="POST" role="form" id="form-inq1">
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                    <input type="text" class="form-control" name="pickupPoint" id="pickupPoint1" placeholder="Pickup Point">
                                </div>
                            </div>
                            <div class="col-md-3 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                    <input type="text" class="form-control"  name="dropPoint" id="dropPoint1" placeholder="Drop off Point">
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12 col-sm-6">
                                <select class="cs-select cs-skin-elastic" name="vehicle" id="vehicle1">
                                    <option value="" disabled selected>Vehicles</option>
                                    <?php foreach ($vehicle as $v) { ?>
                                        <option value="<?php echo $v['id']; ?>">&#xf0d1; &nbsp; <?php echo $v['vehicle_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-xs-12 col-sm-6">
                                <button type="submit" class="btn btn-submit btn-block" style="width:100%" onclick="return inquery_valid1()">Check Now</button>
                            </div>
                        </div>
                        <!--                        <div class="row">
                                                    <p>
                                                        <span class="text-success" id="inqsucess1">
                                                        </span> 
                                                        <span class="text-danger" id="inqerror1">
                                                        </span> </p>
                                                </div>-->

                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>


<!--how it work-->
<div class="how_to">
    <div class="container">
        <div class="row">
            <div class="mg-how-title" >
                <h2 class="mystyle">How It Works</h2>
               <!-- <p>These best Transport chosen by our customers</p>-->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <p>
                    <img src="<?= USERASSETS ?>images/reassembly_icon_1.png" alt="" width="110" height="100" data-retina="true">
                </p>
                <h4>1. Plan your shifting</h4>
                <p>

                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <p>
                    <img src="<?= USERASSETS ?>images/telephone.png" alt="" width="94" height="100" data-retina="true">
                </p>
                <h4>2. Call us or visit</h4>
                <p>
                    shiftme.in
                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <p>
                    <img src="<?= USERASSETS ?>images/worker.png" alt="" width="151" height="100" data-retina="true">
                </p>
                <h4>3. We'll do the rest</h4>
                <p>

                </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <p>
                    <img src="<?= USERASSETS ?>images/relex.png" alt="" width="141" height="100" data-retina="true">
                </p>
                <h4>4. Be Relaxed</h4>
                <p>

                </p>
            </div>
        </div><!-- End row -->
        <h3 class="text-center">SHIFTING HAS NEVER BEEN THAT EASY BEFORE</h3>
        <p class="lead text-center" style="font-weight:500">
            Call Us  96896-22000.
        </p>
    </div>
</div>
<!--end how it work-->

<!--our service-->
<div class="our-service">
    <div class="container">
        <div class="">
            <div class="mg-how-title">
                <h2 class="mystyle" style="color: black"> our specialty</h2>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="wow fadeInLeftBig">     
                        <img src="<?= USERASSETS ?>images/truck.png" alt="image" class="img-responsive">    </div> 
                    <div class="wow fadeInLeftBig red_truck" style="position: absolute;opacity: 1; animation-delay: 1s; animation-duration: 1.5s; animation-iteration-count: 1;">     
                        <img src="<?= USERASSETS ?>images/truck-home2.png" alt="image" class="img-responsive" style="float: right;">    </div> 
                    <div class="wow fadeInLeftBig yellow_truck" style="position: relative;opacity: 1; animation-delay: 2s; animation-duration: 1.5s; animation-iteration-count: 1;" >
                        <img src="<?= USERASSETS ?>images/ape.png" alt="image" class="img-responsive" style="float: left;">    </div> 

                </div>
                <div class="col-md-5">
                    <div class="no-pad-left wow fadeInRight col-md-12 col-sm-6 " style="opacity: 1; animation-delay: 0s; animation-duration: 0.5s; animation-iteration-count: 1;">
                        <div class="feature feature-icon-left">
                            <div class="icon-holder industry-book">
                                <div class="industry-icon"></div>
                            </div>
                            <div class="feature-text">
                                <h6>EASY BOOKING</h6>
                            </div>
                        </div>
                    </div>
                    <div class="no-pad-left wow fadeInRight col-md-12 col-sm-6" style="opacity: 1; animation-delay: 1s; animation-duration: 0.5s; animation-iteration-count: 1;">
                        <div class="feature feature-icon-left">
                            <div class="icon-holder industry-money">
                                <div class="industry-icon"></div>
                            </div>
                            <div class="feature-text">
                                <h6>LOW COST SHIFTING</h6>
                            </div>
                        </div>
                    </div>
                    <div class="no-pad-left wow fadeInRight col-md-12 col-sm-6" style="opacity: 1; animation-delay: 2s; animation-duration: 0.5s; animation-iteration-count: 1;">
                        <div class="feature feature-icon-left">
                            <div class="icon-holder industry-door ">
                                <div class="industry-icon"></div>
                            </div>
                            <div class="feature-text">
                                <h6>DOOR TO DOOR SERVICE</h6>
                            </div>
                        </div>
                    </div>
                    <div class="no-pad-left wow fadeInRight col-md-12 col-sm-6" style="opacity: 1; animation-delay: 2.8s; animation-duration: 0.5s; animation-iteration-count: 1;">
                        <div class="feature feature-icon-left">
                            <div class="icon-holder industry-time ">
                                <div class="industry-icon"></div>
                            </div>
                            <div class="feature-text">
                                <h6>24-HOUR BOOKING</h6>
                            </div>
                        </div>
                    </div>
                    <div class="no-pad-left wow fadeInRight col-md-12 col-sm-6" style="opacity: 1; animation-delay: 3.3s; animation-duration: 0.5s; animation-iteration-count: 1;">
                        <div class="feature feature-icon-left">
                            <div class="icon-holder industry-delivery ">
                                <div class="industry-icon"></div>
                            </div>
                            <div class="feature-text">
                                <h6>ON TIME DELIVERY</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end our service-->

<!--labor and packers-->
<div class="mg-rooms-cols">
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <figure class="mg-room mg-room-col-2">
                <img src="<?= USERASSETS ?>images/post3.jpg" alt="img11" class="img-responsive" style="width: 100% !important">
                <figcaption>
                    <h2>Labour</h2>
                    <div class="mg-room-rating"></div>
                    <!--<div class="mg-room-price">
                        adversantur probatum iudicante indicaverunt repugnantibus.
                    </div>

                    <div class="row mg-room-fecilities">

                    </div>-->
                    <a href="<?= site_url(); ?>labour" class="btn btn-link">Read More<i class="fa fa-angle-double-right"></i></a>
                </figcaption>			
            </figure>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
            <figure class="mg-room mg-room-col-2">
                <img src="<?= USERASSETS ?>images/pppakers.jpg" alt="img11" class="img-responsive" style="width: 100% !important">
                <figcaption>
                    <h2>Professional Packer</h2>
                    <div class="mg-room-rating"></div>
                    <!--<div class="mg-room-price">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                    <p>adversantur probatum iudicante indicaverunt repugnantibus.</p>
                    <div class="row mg-room-fecilities">
                    </div>-->
                    <a href="<?= site_url(); ?>shifting" class="btn btn-link">Read More<i class="fa fa-angle-double-right"></i></a>
                </figcaption>			
            </figure>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12" style="padding-left: 0px; padding-right: 0px;">
            <figure class="mg-room mg-room-col-2">
                <!--<img src="<?= USERASSETS ?>images/super-ace-mint-gallery011.jpg" alt="img11" class="img-responsive" style="width: 100% !important">-->
                <img src="<?= USERASSETS ?>images/ptruck.jpg"  class="img-responsive" style="width: 100% !important">
                <figcaption>
                    <h2>Vehicle</h2>
                    <div class="mg-room-rating"></div>
                    <!--<div class="mg-room-price">
                        We offer customized logistics solutions for individuals and enterprises to suit their requirements
                    </div>
                    <div class="row mg-room-fecilities">
                    </div>-->
                    <a href="<?= site_url(); ?>vehicle" class="btn btn-link">Read More<i class="fa fa-angle-double-right"></i></a>
                </figcaption>			
            </figure>
        </div>
    </div>

</div>
<!--end labor and packers-->

<!--mobile section-->
  <section id="why-wisten" style="background-position: 50% 48px;">
            <div class="container">
                <div class="row">
                 <div class="col-md-1"></div>
                    <div class="col-md-5 col-md-offset-0 col-sm-offset-2">
                        <div class="phone-showcase wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                            <div class="device">
                                <img src="<?= USERASSETS ?>images/mobile-phone.png" alt="">
                            </div>
                        </div><!-- //iPhone Showcase -->
                    </div>
                    <div class="col-md-6 ">
                        <div class="mobile_contant" >
                            <h1 class="mystyle" style="color: #000">
                                Click karo Shift karo
                            </h1>
                            <p>
                            <!--<h4 style="color: #000;font-weight:600">His is dummy testimonial content for testing purpose.</h4>-->
                            
                            <p style=" font-size: 18px;">Shiftme App coming soon.</p>

                            <div class="row">
                             <div class="col-md-6 col-sm-6">
                                <a href="#"><img alt="Get it on Google Play" src="<?= USERASSETS ?>images/goolge_app.png"></a>
                                </div>
                                 <div class="col-md-6 col-sm-6">
                                 <a href="#"><img alt="Get it on App Store" src="<?= USERASSETS ?>images/app-store.png"></a>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--mobile section-->


<?php
//echo '<pre>';
//print_r($test);
//echo '</pre>';
////die();
?>

<!--Testimonials-->
   <div class="mg-about-testimonial " >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mg-sec-title">
                                <h2 class="mystyle">Testimonials</h2>
                                <p>Here is some valuable word from our clients</p>
                            </div>
                            <div id="carousel">        			
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                                                <!--Carousel indicators--> 
                                                <ol class="carousel-indicators" style="bottom: -16px;">
                                                    <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                                                    <?php if (isset($test) && !empty($test)) { ?>
                                                    <?php for ($i = 1; $i < count($test); $i++) { ?>
                                                    <li data-target="#fade-quote-carousel" data-slide-to="<?php echo $i ?>"></li>

                                                    <?php } ?>
                                                    <?php } ?>
                                                </ol>
                                                <!--Carousel items--> 
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="carousel-inner" style="height:170px;">
                                                        <div class="active item">
                                                            <blockquote>
                                                                <?php echo trim($test[0]['text']); ?>
                                                            </blockquote>	
                                                        </div>
                                                        <?php if (isset($test) && !empty($test)) { ?>
                                                        <?php for ($i = 1; $i < count($test); $i++) { ?>
                                                        <div class="item">
                                                            <blockquote>
                                                                <?php echo trim($test[$i]['text']); ?>
                                                            </blockquote>
                                                        </div>
                                                        <?php } ?>
                                                        <?php } ?>
                                                    </div> <!--End Carousel items--> 
                                                </div>
                                                <div class="col-md-1"></div>
                                                <!-- Left and right controls -->
                                                <a class="left carousel-control" href="#fade-quote-carousel" role="button" data-slide="prev" >

                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#fade-quote-carousel" role="button" data-slide="next" >

                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>		
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
    function inquery_valid() {
        var flag = true;
        $('#pickupPoint').css('border-color', '#ced4d7');
        $('#dropPoint').css('border-color', '#ced4d7');
        $('#vehicle').css('border-color', '#ced4d7');
        if ($('#pickupPoint').val() == "") {
            $('#pickupPoint').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#dropPoint').val() == "") {
            $('#dropPoint').css('border-color', '#ef4040');
            flag = false;
        }
//                                    
        if ($('#vehicle').val() == null || $('#vehicle').val() == "") {
            $('#vehicle').css('border-color', '#ef4040');
            flag = false;
        }
        return flag;
    }

    function inquery_valid1() {
        var flag = true;
        if ($('#pickupPoint1').val() == "") {
            $('#pickupPoint1').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#dropPoint1').val() == "") {
            $('#dropPoint1').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#vehicle1').val() == "") {
            $('#vehicle1').css('border-color', '#ef4040');
            flag = false;
        }
        return flag;
    }


</script>
<script>
    $(document).ready(function () {
        alert();
        sessionStorage.clear();
    }
</script>
<?php include_once("analyticstracking.php") ?>