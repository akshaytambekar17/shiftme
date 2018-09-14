<?php
$faq = $faq[0];
//echo "<pre>";
//print_r($faq['description']);
//echo "</pre>";
//die();
?>
<div class="mg-page-title parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>FAQ</h2>
            </div>
        </div>
    </div>
</div>
 <!--Testimonials-->
<div class="mg-page ">
    <div class="container">
        <div class="row">
            <div class="col-md-12 service-contain" style="padding: 0 15px">
                <h2 class="mg-sec-left-title" style="font-weight: 600;color: #71747b;">FAQ</h2>
                <p><?php echo $faq['description']?></p>
            </div>
<!--            <div class="col-md-5">
               <form class="clearfix " style="margin-bottom: 30px;">
                    <img src="<?php echo $faq['image']?>" class="img-responsive">
                </form>
            </div>-->
        </div>
    </div>  
</div>

<?php include_once("analyticstracking.php") ?>
<!--end Testimonials-->
