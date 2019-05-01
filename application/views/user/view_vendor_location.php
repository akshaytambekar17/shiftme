<style>
 .navbar-inverse .navbar-nav > li > a { color:#fff;}
 </style>
<!--<div class="mg-page-title parallax" style=" background-image: url(<?=USERASSETS?>images/banner.png);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Contact Us</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>
    </div>
</div>-->

<!--Testimonials-->
<div class="mg-page section-md-50 mt-10-per">
    <div class="container">
        <?php if ($this->session->flashdata('Message')) { ?>
            <div class = "alert alert-success alert-dismissable">
                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times</button>
                <?php echo $this->session->flashdata('Message'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('Error')) { ?>
            <div class = "alert alert-danger alert-dismissable">
                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
                <?php echo $this->session->flashdata('Error'); ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="pull-right">
                    <a href="<?= site_url()?>myaccount" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="area-title wow fadeIn">
                            <h3>Location Details for Order number <?= $order_details['order_no']?></h3>
                        </div>
                    </div>
                </div>
                <div class="clearfix col-md-12 contactform">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Pickup Point :</b></h4>
                            <p><?= $order_details['starting_location']?></p>
                        </div>
                        <div class="col-md-6">
                            <h4><b>Drop Point :</b></h4>
                            <p><?= $order_details['delivery_location']?></p>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-6">
                            <p><b>Start : </b><?= $location_details['pickup_point_km']?> km</p>
                            <p><b>Pickup Point Image</b></p>
                            <img src="<?= base_url()?>assets/upload/location/<?= $location_details['pickup_point_image']?>" width="100px" height="100px">
                        
                        </div>
                        <div class="col-md-6">
                            <p><b>End : </b><?= $location_details['drop_point_km']?> km</p>
                            <p><b>Drop Point Image</b></p>
                            <img src="<?= base_url()?>assets/upload/location/<?= $location_details['drop_point_image']?>" width="100px" height="100px">
                        </div>
                    </div>    
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h4><b>Total Amount : </b><?= $location_details['total_amount']?></h4>
                        </div>
                    </div>    

                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--end Testimonials-->
<script>
    function validateAlpha(e) {
        //updated by neeta
        var textInput = e.value;
        //var textInput = document.getElementById("cname").value;
        textInput = textInput.replace(/[^A-Za-z ]/g, "");
        e.value = textInput;
        //end
    }
    function validateNumber(e) {
        //updated by neeta
        var textInput = e.value;
        textInput = textInput.replace(/[^0-9]/g, "");
        e.value = textInput;

        //end
    }
    function valid() {
        var flag = true;
        
        if ($('#full_name').val() == "") {
            $('#full_name').css('border-color', '#ef4040');
            flag = false;
        }else{
            $('#full_name').css('border-color', '');
        }
        if ($('#contact').val()== "") {
            $('#contact').css('border-color', '#ef4040');
            flag = false;
        }else{
            if (validateMobileNumber($('#contact').val())) {
                $('#contact').css('border-color', '');
                $('#contactError').text('');
            }else{
                $('#contact').css('border-color', '#ef4040');
                $('#contactError').text('Contact No. Must Be 10 Digits');
                flag = false;
            }
        }
        if ($('#email').val()== "") {
            $('#email').css('border-color', '#ef4040');
            flag = false;
        }else{
            if(validateEmail($('#email').val())){
                $('#email').css('border-color', '');
                $('#emailError').text('');
            }else{
                $('#email').css('border-color', '#ef4040');
                $('#emailError').text('Invalid E-mail');
                flag = false;
            }
        }
        if ($('#subject').val()== "") {
            $('#subject').css('border-color', '#ef4040');
            flag = false;
        }else{
            $('#subject').css('border-color', '');
        }
        if ($('#message').val()== "") {
            $('#message').css('border-color', '#ef4040');
            
            flag = false;
        }else{
            $('#message').css('border-color', '');
        }
        return flag;
    }
    $(document).ready(function() {
        $('.form-control').focus(function() {
//        $("textarea").css();
            var $parent = $(this).parent();
            $parent.removeClass('text-danger');
            $('span.text-danger', $parent).fadeOut();
            $('#contact').css('border-color', 'rgb(206,212,215)');
        });
    });
</script>
<?php include_once("analyticstracking.php") ?>