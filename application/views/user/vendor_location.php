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
                            <h3>Add Location Details for Order number <?= $order_details['order_no']?></h3>
                        </div>
                    </div>
                </div>
<!--                <h2 class="mg-sec-left-title" style="font-weight: 600;color: #71747b;">Send an E-mail</h2>-->
                <form action="<?= site_url()?>vendor/locations?order_id=<?= $order_details['order_id']?>" method="POST" enctype="multipart/form-data" class="clearfix col-md-12 contactform" >
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
                            <div class="mg-contact-form-input requared">
                                <label for="pickup_point_km">Pickup Point (in km)</label>
                                <input type="text" class="form-control" name="pickup_point_km" id="pickup_point_km" value="<?= set_value('pickup_point_km')?>" required>
                            </div>
                            <span class="help-block has-error"><?php echo form_error('pickup_point_km'); ?></span>
                        </div>
                        <div class="col-md-6">
                            <div class="mg-contact-form-input requared">
                                <label for="drop_point_km">Drop Point (in km)</label>
                                <input type="text" class="form-control" name="drop_point_km" id="drop_point_km" value="<?= set_value('drop_point_km')?>" required>
                            </div>
                            <span class="help-block has-error"><?php echo form_error('drop_point_km'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mg-contact-form-input requared">
                                <label for="image">Upload Pickup Point Image</label>
                                <input type="file" class="form-control" name="pickup_point_image" id="pickup_point_image">
                            </div>
                            <span class="help-block has-error"><?php echo form_error('pickup_point_image'); ?></span>
                        </div>
                        <div class="col-md-6">
                            <div class="mg-contact-form-input requared">
                                <label for="image">Upload Drop Point Image</label>
                                <input type="file" class="form-control" name="drop_point_image" id="drop_point_image">
                            </div>
                            <span class="help-block has-error"><?php echo form_error('drop_point_image'); ?></span>
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="<?= $order_details['order_id']?>">    
                    <input type="hidden" name="order_no" value="<?= $order_details['order_no']?>">    
                    <br>
                    <div class="col-md-12" style="text-align: center">
                        <input type="submit" class="btn btn-success center" value="Submit" >
                    </div>
                    
                </form>
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