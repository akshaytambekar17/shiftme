<!--<div class="mg-page-title parallax" style=" background-image: url(<?=USERASSETS?>images/office-relocation-compressed-1500x630.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>request a free quote</h2>
                                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>
    </div>
</div>-->

<section class="section-70 section-md-50 section-bottom-110">
    <div class="container text-left">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                <div class="area-title text-center wow fadeIn">
                    <h2>REQUEST A QUICK QUOTE</h2>
                </div>
            </div>
        </div>
<!--        <h2 class="mg-sec-left-title div-bottom-5 text-center" style="font-weight: 600;color: #71747b;">REQUEST A QUICK QUOTE</h2>-->
<!--        <p class="text-center"><strong>ShiftMe</strong> expert will shortly contact you to assess your needs and provide you with a customized and competitive quote. </p>-->
        <div class="range range-xs-center offset-top-50"></div>
        <div class="row">
            <?php if($message = $this ->session->flashdata('Message')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?> 
            <?php if($message = $this ->session->flashdata('Error')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?>
            <div class="col-md-12">
                <form action="<?= site_url()?>quote" method="POST" class="clearfix contactform">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo set_value('fullname'); ?>"oninput="validateAlpha(this);"  placeholder="Fullname"/>
                                <span class="help-block"><?php echo form_error('fullname'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email_id" id="email_id" class="form-control" value="<?php echo set_value('email_id'); ?>" placeholder="Email" />
                                <span class="help-block"><?php echo form_error('email_id'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">  
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo set_value('mobile_no'); ?>" placeholder="Mobile Number" />
                                <span class="help-block"><?php echo form_error('mobile_no'); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="subject">From</label>
                            <div class="input-group ">
                                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                <input type="text" class="form-control" name="starting_location" id="from_loc" value="<?php echo set_value('starting_location'); ?>" >
                            </div>
                            <span class="help-block"><?php echo form_error('starting_location'); ?></span>
                        </div>
                        <div class=" col-md-6">
                            <label for="subject">To</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                <input type="text" class="form-control" name="delivery_location" id="to_loc"  value="<?php echo set_value('delivery_location'); ?>">
                            </div>
                            <span class="help-block"><?php echo form_error('delivery_location'); ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 ">
                            <label for="subject">Shifting Date</label>
                            <div class="input-group date mg-check-in ">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control" id="shifting_date" name="shifting_date"  value="<?php echo set_value('shifting_date'); ?>" required >
                            </div>
                            <span class="help-block"><?php echo form_error('shifting_date'); ?></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vehicle Service</label>
                                <select name='vehicle_id'  class="form-control">
                                    <option disabled="disabled" selected="selected">Select Vehicle</option>
                                    <?php foreach ($vehicle_services_list as $value) { ?>
                                        <option value="<?= $value['id']?>" <?= set_select('vehicle_id',$value['id']); ?> ><?= $value['vehicle_name']?></option> 
                                    <?php }?>
                                </select>
                            </div>
                            <span class="help-block"><?php echo form_error('vehicle_id'); ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="subject">Check Product List</label>
                        </div>
                        <?php if(!empty($product_list) && count($product_list)>0){
                                $count = 1;
                                foreach($product_list as $value){ 
                                    
                        ?>
                                <div class="col-md-4">
                                    <div class="form-group col-md-6">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="<?= $value['id']?>" name="ProductListName[]" id="product-list-<?= $count?>" ><?= $value['name']?></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        
<!--                                            <button class="btn" onclick="quantitybtn(this)" id="plus-<?= $count?>" >+</button>-->
                                        <input type="text" name="ProductListQuantity[]" id="product-list-qty-<?= $count?>" class="product-list-qty form-control" placeholder="Qty" oninput="numberValidation(this)" data-count='<?= $count?>'>
                                        <span id="qty-span-<?= $count?>"></span>
<!--                                            <button class="btn" onclick="quantitybtn(this)" id="minus-<?= $count?>" >-</button>-->
                                        
                                    </div>
                                </div>
                        <?php } }?>
                        <br>
                    </div>
                    <span class="help-block"><?php echo form_error('ProductListName[]'); ?></span>
                    
                    <div class="col-md-12">
                        <div class="row mt50">
                            <div class="col-md-7 que">
                                <p>Do you need a professional packers?  </p>
                            </div>
                            <div class="col-md-5">
                                <label><input type="radio" name="packer" id="radio3" value="1">Yes</label> 
                                <label><input type="radio" name="packer" id="radio4" value="0" checked="">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mt0">
                            <div class="col-md-7 que">
                                <p>Do you need storage facilities? </p>
                            </div>
                            <div class="col-md-5">
                                <label><input type="radio" name="storage" id="radio5" value="1">Yes</label> 
                                <label><input type="radio" name="storage" id="radio6" value="0" checked="">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mt0">
                            <div class="col-md-7 que">
                                <p>Do you need shifting of your vehicle also? </p>
                            </div>
                            <div class="col-md-5">
                                <label><input type="radio" name="vehicle_shifting" id="radio7" value="1">Yes</label> 
                                <label><input type="radio" name="vehicle_shifting" id="radio8" value="0" checked="">No</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                            <br>
                            <input type="submit" class="btn btn-success" value="Send" >
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
                        
    function numberValidation(ths) {
        var count = $(ths).data('count');
        if (/\D/g.test(ths.value)){
            // Filter non-digits from input value.
            ths.value = ths.value.replace(/\D/g, '');
            //$("#qty-span-"+count).html("Digits Only").show().fadeOut("slow");
            return false;
        }
    }
    $(document).ready(function() {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
        $('.form-control').focus(function() {
            var $parent = $(this).parent();
            $parent.removeClass('text-danger');
            $('span.text-danger', $parent).fadeOut();
            $('#phone').css('border-color', 'rgb(206,212,215)');
        });
    });
</script>

<?php include_once("analyticstracking.php") ?>