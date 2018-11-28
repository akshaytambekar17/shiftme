<?php
$policy = $policy[0];
//echo "<pre>";
//print_r($faq['description']);
//echo "</pre>";
//die();
?>
<!--<div class="mg-page-title parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Privacy Policy</h2>
            </div>
        </div>
    </div>
</div>-->
 <!--Testimonials-->
<div class="mg-page section-md-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12 service-contain" style="padding: 0 15px">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                        <div class="area-title text-center wow fadeIn">
                            <h2>Privacy Policy</h2>
                        </div>
                    </div>
                </div>
<!--                <h2 class="mg-sec-left-title" style="font-weight: 600;color: #71747b;">Privacy Policy</h2>-->
                <p><?php echo $policy['description']?></p>
            </div>
<!--            <div class="col-md-5">
               <form class="clearfix " style="margin-bottom: 30px;">
                    <img src="<?php echo $policy['image']?>" class="img-responsive">
                </form>
            </div>-->
        </div>
    </div>  
</div>

<?php include_once("analyticstracking.php") ?>
<!--end Testimonials-->
