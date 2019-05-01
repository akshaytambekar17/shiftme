<?php
$service = $services[0];
$obj = array();
$obj = json_decode($service->objectives);
?>
<!--<div class="mg-page-title parallax">
    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-12">
                <h2>Shifting Services</h2>
            </div>
        </div>
    </div>
</div>-->
<?php if ($this->session->flashdata('insert_msg')) { ?>
    <script>
//        alert('sdf');
        $.notify('<?= $this->session->flashdata("insert_msg")?>', "success");
    </script>

<?php } ?>
<?php if ($this->session->flashdata('error_msg')) { ?>
    <script>
//        alert('aasd');
        $.notify('<?= $this->session->flashdata("error_msg")?>', "error");
    </script>

<?php } ?>
<section class="section-70 section-md-50 ">
<!--    <div class="container text-left">
        <h2 class="mg-sec-left-title div-bottom-5" style="font-weight: 600;color: #71747b;">SHIFTING SERVICES</h2>
        <div class="range range-xs-center offset-top-50">
            <div class="col-xs-12 col-sm-5 text-left"><img src="<?php echo $service->image ?>" width="450" height="304" alt="" class="img-responsive reveal-inline-block"></div>
            <div class="col-xs-12 col-sm-7 offset-top-30 offset-sm-top-0">
                <p class="wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;"><?php echo $service->long_desc; ?></p>

            </div>
        </div>
    </div>-->
    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                <div class="area-title text-center wow fadeIn">
                    <h2>SHIFTING SERVICES</h2>
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
                        <p class="wow fadeInDown service-p" style="visibility: visible; animation-name: fadeInDown;"><?php echo $service->long_desc; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Our services-->
<div class="mg-best-vehicle section-md-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                        <div class="area-title text-center wow fadeIn">
                            <p class="service-p"><?php echo $service->short_desc; ?></p>
                            <h2></h2>
                        </div>
                    </div>
                </div>
                
                <div>
                    <?php foreach ($obj as $val) { ?>
                        <div class="col-md-6 wow fadeInDown" style="visibility: visible; animation-name: fadeInDown; animation-duration: 1s; animation-iteration-count: 1;">
                            <div class="step-shift shift-border-box text-left col-sm-11 col-xs-12">
                                <div class="icon">
                                    <i class="<?php echo $val->icon ?>"></i>
                                </div>
                                <div class="title text-uppercase" style="height: 75px;">
                                    <h4 style="font-size: 18.2px"><?php echo $val->obj ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-md-50"></div>
<!--<div class="row bigrow " style="background: rgba(53, 185, 230, 0.71); padding-bottom:0px;">
    <div class="skew-block"></div>
    <div class="container mid">
        <h2 class="h1 low">The ShiftMe.in selects the most suitable means of transport according to strict criteria based on cost, reliability and the minimization of damage to the environment. These Shifting services are available across India. We provide PAN India solution.</h2>
        <div class="buttonWrapper">
            <a class="button button--large button--transparent" href="<?= site_url();?>quote">Get A Quotation</a>
        </div>
    </div>
    <div id="logo"> </div>
</div>-->

<?php include_once("analyticstracking.php") ?>