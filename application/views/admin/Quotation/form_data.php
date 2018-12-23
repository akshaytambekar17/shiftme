

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= !empty($quotation_data['id'])?site_url('quotation/update?id='.$quotation_data['id']):site_url('quotation/add'); ?>" >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Fullname</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo !empty($quotation_data['fullname'])?$quotation_data['fullname']:set_value('fullname'); ?>"oninput="validateAlpha(this);"  placeholder="Fullname"/>
                                            <span class="help-block"><?php echo form_error('fullname'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Email</label>
                                            <input type="email" name="email_id" id="email_id" class="form-control" value="<?php echo !empty($quotation_data['email_id'])?$quotation_data['email_id']:set_value('email_id'); ?>" placeholder="Email" />
                                            <span class="help-block"><?php echo form_error('email_id'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">  
                                        <div class="form-group col-md-11">
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo !empty($quotation_data['mobile_no'])?$quotation_data['mobile_no']:set_value('mobile_no'); ?>" placeholder="Mobile Number" />
                                            <span class="help-block"><?php echo form_error('mobile_no'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select User</label>
                                            <select name='user_id'  class="form-control">
                                                <option disabled="disabled" selected="selected">Select User</option>
                                                <?php foreach ($user_list as $value) { 
                                                        if($quotation_data['user_id'] == $value['user_id']){
                                                            $selected='selected="selected"';
                                                        }else{
                                                            $selected='';
                                                        }
                                                ?>
                                                    <option value="<?= $value['user_id']?>" <?= !empty($quotation_data['user_id'])?$selected:set_select('user_id',$value['user_id'],TRUE);?> ><?= $value['email']?></option> 
                                                <?php }?>
                                            </select>
                                            <span class="help-block"><?php echo form_error('user_id'); ?></span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="subject">From</label>
                                        <div class="input-group col-md-6">
                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                            <input type="text" class="form-control" name="starting_location" id="from_loc" value="<?php echo !empty($quotation_data['starting_location'])?$quotation_data['starting_location']:set_value('starting_location'); ?>" >
                                        </div>
                                        <span class="help-block"><?php echo form_error('starting_location'); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-7">
                                            <label>Starting Address</label>
                                            <textarea rows="4" name="starting_address" id="starting_address"><?php echo !empty($quotation_data['starting_address'])?$quotation_data['starting_address']:set_value('starting_address'); ?></textarea>
                                            <span class="help-block"><?php echo form_error('starting_address'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Land Mark</label>
                                                <input type="text" name="starting_landmark" id="starting_landmark" class="form-control" value="<?php echo !empty($quotation_data['starting_landmark'])?$quotation_data['starting_landmark']:set_value('starting_landmark'); ?>" placeholder="Land mark" />
                                                <span class="help-block"><?php echo form_error('starting_landmark'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Pincode</label>
                                                <input type="text" name="starting_pincode" id="starting_pincode" class="form-control" value="<?php echo !empty($quotation_data['starting_pincode'])?$quotation_data['starting_pincode']:set_value('starting_pincode'); ?>" placeholder="Pincode" />
                                                <span class="help-block"><?php echo form_error('starting_pincode'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="subject">To</label>
                                        <div class="input-group col-md-6">
                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                            <input type="text" class="form-control" name="delivery_location" id="from_loc" value="<?php echo !empty($quotation_data['delivery_location'])?$quotation_data['delivery_location']:set_value('delivery_location'); ?>" >
                                        </div>
                                        <span class="help-block"><?php echo form_error('delivery_location'); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-7">
                                            <label>Delivery Address</label>
                                            <textarea rows="4" name="delivery_address" id="delivery_address"><?php echo !empty($quotation_data['delivery_address'])?$quotation_data['delivery_address']:set_value('delivery_address'); ?></textarea>
                                            <span class="help-block"><?php echo form_error('delivery_address'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Land Mark</label>
                                                <input type="text" name="delivery_landmark" id="delivery_landmark" class="form-control" value="<?php echo !empty($quotation_data['delivery_landmark'])?$quotation_data['delivery_landmark']:set_value('delivery_landmark'); ?>" placeholder="Land mark" />
                                                <span class="help-block"><?php echo form_error('delivery_landmark'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6" col-md-11>
                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <input type="text" name="delivery_pincode" id="delivery_pincode" class="form-control" value="<?php echo !empty($quotation_data['delivery_pincode'])?$quotation_data['delivery_pincode']:set_value('delivery_pincode'); ?>" placeholder="Pincode" />
                                                <span class="help-block"><?php echo form_error('delivery_pincode'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Vehicle Service</label>
                                            <select name='vehicle_id'  class="form-control">
                                                <option disabled="disabled" selected="selected">Select Vehicle</option>
                                                <?php foreach ($vehicle_services_list as $value) { 
                                                        if($quotation_data['vehicle_id'] == $value['id']){
                                                            $selected='selected="selected"';
                                                        }else{
                                                            $selected='';
                                                        }
                                                ?>
                                                    <option value="<?= $value['id']?>" <?= !empty($quotation_data['vehicle_id'])?$selected:set_select('vehicle_id',$value['id'],TRUE)?> ><?= $value['vehicle_name']?></option> 
                                                <?php }?>
                                            </select>
                                            <span class="help-block"><?php echo form_error('vehicle_id'); ?></span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="subject">Shifting Date</label>
                                        <div class="input-group date mg-check-in ">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input type="text" class="form-control datepicker" id="shifting_date" name="shifting_date"  value="<?php echo !empty($quotation_data['shifting_date'])?date('m/d/Y',strtotime($quotation_data['shifting_date'])):set_value('shifting_date'); ?>" required >
                                        </div>
                                        <span class="help-block"><?php echo form_error('shifting_date'); ?></span>
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
                                                $checked = '';
                                                $quantity = '';
                                                if(!empty($quotation_product_data) && count($quotation_product_data) >0 ){
                                                    foreach($quotation_product_data as $value_product){ 
                                                        if($value['id'] == $value_product['product_id']){
                                                            $checked = 'checked'; 
                                                            $quantity = $value_product['quantity'];
                                                        }
                                                    }
                                                }
                                                   
                                    ?>
                                            <div class="col-md-4">
                                                <div class="form-group col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value="<?= $value['id']?>" name="ProductListName[]" id="product-list-<?= $count?>" <?= $checked?>><?= $value['name']?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">

            <!--                                            <button class="btn" onclick="quantitybtn(this)" id="plus-<?= $count?>" >+</button>-->
                                                    <input type="text" name="ProductListQuantity[]" value = "<?= $quantity?>" id="product-list-qty-<?= $count?>" class="product-list-qty form-control" placeholder="Qty" oninput="numberValidation(this)" data-count='<?= $count?>'>
                                                    <span id="qty-span-<?= $count?>"></span>
            <!--                                            <button class="btn" onclick="quantitybtn(this)" id="minus-<?= $count?>" >-</button>-->

                                                </div>
                                            </div>
                                    <?php } }?>
                                    <br>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Product List Amount</label>
                                            <input type="text" name="products_total_amount" id="products_total_amount" class="form-control" value="<?php echo !empty($quotation_data['products_total_amount'])?$quotation_data['products_total_amount']:set_value('products_total_amount'); ?>" placeholder="Product List Amount" />
                                            <span class="help-block"><?php echo form_error('products_total_amount'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Distance Amount</label>
                                            <input type="text" name="distance_amount" id="distance_amount" class="form-control" value="<?php echo !empty($quotation_data['distance_amount'])?$quotation_data['distance_amount']:set_value('distance_amount'); ?>" placeholder="Distance Amount" />
                                            <span class="help-block"><?php echo form_error('distance_amount'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Vehicle Amount</label>
                                            <input type="text" name="vehicle_amount" id="vehicle_amount" class="form-control" value="<?php echo !empty($quotation_data['vehicle_amount'])?$quotation_data['vehicle_amount']:set_value('vehicle_amount'); ?>" placeholder="Vehcile Amount" />
                                            <span class="help-block"><?php echo form_error('vehicle_amount'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Discount</label>
                                            <input type="text" name="discount" id="discount" class="form-control" value="<?php echo !empty($quotation_data['discount'])?$quotation_data['discount']:set_value('discount'); ?>" placeholder="Discount" />
                                            <span class="help-block"><?php echo form_error('discount'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Total Amount</label>
                                            <input type="text" name="total_amount" id="total_amount" class="form-control" value="<?php echo !empty($quotation_data['total_amount'])?$quotation_data['total_amount']:set_value('total_amount'); ?>" placeholder="Total Amount" />
                                            <span class="help-block"><?php echo form_error('total_amount'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="packer" id="packer" <?= !empty($quotation_data['packer'])?($quotation_data['packer']==1)?"checked":"":'';?> >Do you need a professional packers?</label>
                                            </div>
                                            <span class="help-block"><?php echo form_error('packer'); ?></span>
                                        </div>
                                        <div class="form-group col-md-11">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="storage" id="storage" <?= !empty($quotation_data['packer'])?($quotation_data['storage']==1)?"checked":"":'';?> >Do you need a storage facilities?</label>
                                            </div>
                                            <span class="help-block"><?php echo form_error('storage'); ?></span>
                                        </div>
                                        <div class="form-group col-md-11">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="vehicle_shifting" id="vehicle_shifting" <?= !empty($quotation_data['packer'])?($quotation_data['vehicle_shifting']==1)?"checked":"":'';?> >Do you need a shifting of your vehicle also?</label>
                                            </div>
                                            <span class="help-block"><?php echo form_error('vehicle_shifting'); ?></span>
                                        </div>
                                    </div>
<!--                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Company Description</label>
                                            <textarea id="company_desc" name="company_desc" class="form-control" placeholder="Company Description"></textarea>
                                            <span class="help-block"><?php echo form_error('company_desc'); ?></span>
                                        </div>
                                    </div>-->
                                            
                                </div>
                                <?php if($quotation_data['is_send_user'] == 0){ ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Send Quotation to user</label>
                                                <select name='is_send_user'  class="form-control">
                                                    <option disabled="disabled" selected="selected">Select Option</option>
                                                    <option value="1" <?= set_select('is_send_user',1) ?> >Yes</option> 
                                                    <option value="0" <?= set_select('is_send_user',0) ?> >No</option> 
                                                </select>
                                                <span class="help-block"><?php echo form_error('is_send_user'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url(); ?>quotation"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                            <?php if(!empty($quotation_data['id'])){ ?>
                                <input type="hidden" value="<?= $quotation_data['id']?>" name="id">
                            <?php } ?>
                        </form>

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<script src="<?= USERASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script>
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
    function validateAlpha(e) {
        //updated by neeta
        var textInput = e.value;
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
    $(document).ready(function () {
        //if compalsory fields of recuiter is blank
    
       if($("#group_id").val() == '2')
       {
          $(".recruiter").css("display","block");
             $('#group_id option[value="2"]').attr("selected", "selected")
       }
       
        $( "#group_id" ).change(function() {
            if($("#group_id option:selected").val()=='2')  //if recruiter
            {
                $(".recruiter").css("display","block");
            }else{
                $(".recruiter").css("display","none");
                $("#website").val('');
                $("#location").selectedIndex = -1;
                $("#no_of_employee").selectedIndex = -1;
            }
        });
    });
   
</script>