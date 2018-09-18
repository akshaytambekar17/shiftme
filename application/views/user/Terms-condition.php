<?php
$terms = $result[0];
//echo "<pre>";
//print_r($service);
//echo "</pre>";
//die();
?>
<div class="mg-page-title parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Terms and Conditions</h2>
            </div>
        </div>
    </div>
</div>
 <!--Testimonials-->
<div class="mg-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 service-contain" style="padding: 0 15px">
                <h2 class="mg-sec-left-title" style="font-weight: 600;color: #71747b;">Terms and Conditions</h2>
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

<?php include_once("analyticstracking.php") ?>
<!--end Testimonials-->
