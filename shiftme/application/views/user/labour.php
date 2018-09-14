<?php
$service = $services[0];
//echo "<pre>";
//print_r($service);
//echo "</pre>";
//die();
?>
<style>
 .navbar-inverse .navbar-nav > li > a { color:#fff;}
 </style>
<div class="mg-page-title parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Labour Services</h2>
            </div>
        </div>
    </div>
</div>
 <!--Testimonials-->
<div class="mg-page mg-labour">
    <div class="container">
        <div class="row">
            <div class="col-md-7 service-contain" style="padding: 0 15px">
                <h2 class="mg-sec-left-title" style="font-weight: 600;color: #71747b;">LABOUR SERVICE</h2>
                <p><?php echo $service->description?></p>
            </div>
            <div class="col-md-5 hidden-lg hidden-md">
               <form class="clearfix " style="margin-bottom: 30px;">
                    <img src="<?php echo $service->image?>" class="img-responsive">
                </form>
            </div>
        </div>
    </div>  
</div>

<?php include_once("analyticstracking.php") ?>
<!--end Testimonials-->
