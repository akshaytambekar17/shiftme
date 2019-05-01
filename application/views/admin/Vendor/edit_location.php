<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
    p{
        font-weight: normal;
        font-style: normal;
        font-size: 15px;
        color: #999999; 
    }
</style>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb');?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
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
            <div class="col-md-12">
                <div class="content-top-1 ">
                    
                    <form action="<?= site_url()?>admin/vendor/edit-location?order_id=<?= $order_details['order_id']?>&user_id=<?= $vendor_details['user_id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
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
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mg-contact-form-input requared">
                                        <label for="pickup_point_km">Pickup Point (in km)</label>
                                        <input type="text" class="form-control" name="pickup_point_km" id="pickup_point_km" value="<?= !empty($location_details['pickup_point_km']) || $location_details['pickup_point_km'] == 0 ?$location_details['pickup_point_km']:set_value('pickup_point_km')?>" required>
                                    </div>
                                    <span class="help-block has-error"><?php echo form_error('pickup_point_km'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="mg-contact-form-input requared">
                                        <label for="drop_point_km">Drop Point (in km)</label>
                                        <input type="text" class="form-control" name="drop_point_km" id="drop_point_km" value="<?= !empty($location_details['drop_point_km'])?$location_details['drop_point_km']:set_value('drop_point_km')?>" required>
                                    </div>
                                    <span class="help-block has-error"><?php echo form_error('drop_point_km'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mg-contact-form-input requared">
                                        <label for="image">Upload Pickup Point Image</label>
                                        <input type="file" class="form-control" name="pickup_point_image" id="pickup_point_image">
                                        <?php if(!empty($location_details['pickup_point_image'])){ ?>
                                            <br>
                                            <img src="<?= base_url()?>assets/upload/location/<?= $location_details['pickup_point_image']?>" width="100px" height="100px">
                                            <input type="hidden" name="pickup_point_image_hidden" value="<?= $location_details['pickup_point_image']?>">
                                        <?php } ?>    
                                    </div>
                                    <span class="help-block has-error"><?php echo form_error('pickup_point_image'); ?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="mg-contact-form-input requared">
                                        <label for="image">Upload Drop Point Image</label>
                                        <input type="file" class="form-control" name="drop_point_image" id="drop_point_image">
                                        <?php if(!empty($location_details['drop_point_image'])){ ?>
                                            <br>
                                            <img src="<?= base_url()?>assets/upload/location/<?= $location_details['drop_point_image']?>" width="100px" height="100px">
                                            <input type="hidden" name="drop_point_image_hidden" value="<?= $location_details['drop_point_image']?>">
                                        <?php } ?>    
                                    </div>
                                    <span class="help-block has-error"><?php echo form_error('drop_point_image'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mg-contact-form-input requared">
                                        <label for="total_amount">Total Amount</label>
                                        <input type="text" class="form-control" name="total_amount" id="total_amount" value="<?= !empty($location_details['total_amount'])?$location_details['total_amount']:set_value('total_amount')?>" required>
                                    </div>
                                    <span class="help-block has-error"><?php echo form_error('total_amount'); ?></span>
                                </div>
                            </div>
                            
                        </div>
                        <input type="hidden" name="order_id" value="<?= $order_details['order_id']?>">    
                        <input type="hidden" name="user_id" value="<?= $vendor_details['user_id']?>">    
                        <input type="hidden" name="id" value="<?= $location_details['id']?>">    
                        <div class="modal-footer">
                            <div class="col-md-12" style="text-align: center">
                                <input type="submit" class="btn btn-success center" value="Submit" >
                            </div>
                        </div>
                    </form>    
                        <!--</modal>-->
                </div>  
            </div>
        </div>
        <div class="clearfix"> </div>
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