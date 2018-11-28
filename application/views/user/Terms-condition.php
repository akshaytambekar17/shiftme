<?php
$terms = $result[0];
//echo "<pre>";
//print_r($service);
//echo "</pre>";
//die();
?>
<!--<div class="mg-page-title parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Terms and Conditions</h2>
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
                            <h2>Terms and Conditions</h2>
                        </div>
                    </div>
                </div>
                <p><?php echo $terms->description?></p>
            </div>
<!--            <div class="col-md-5">
               <form class="clearfix " style="margin-bottom: 30px;">
                    <img src="<?= base_url();?>upload/Terms/<?= $terms->images; ?>" class="img-responsive">
                </form>
            </div>-->
        </div>
    </div>  
</div>
 <div class="section-md-50"></div>
<?php include_once("analyticstracking.php") ?>
<!--end Testimonials-->
