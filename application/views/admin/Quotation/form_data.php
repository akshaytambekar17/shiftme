

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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('quotation/add'); ?>" >
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Fullname</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo set_value('fullname'); ?>"oninput="validateAlpha(this);"  placeholder="Fullname"/>
                                            <span class="help-block"><?php echo form_error('fullname'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Email</label>
                                            <input type="email" name="email_id" id="email_id" class="form-control" value="<?php echo set_value('email_id'); ?>" placeholder="Email" />
                                            <span class="help-block"><?php echo form_error('email_id'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">  
                                        <div class="form-group col-md-11">
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="<?php echo set_value('mobile_no'); ?>" placeholder="Mobile Number" />
                                            <span class="help-block"><?php echo form_error('mobile_no'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-7">
                                            <label>Starting Address</label>
                                            <textarea rows="4" name="starting_address" id="starting_address"><?php echo set_value('starting_address'); ?></textarea>
                                            <span class="help-block"><?php echo form_error('starting_address'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Land Mark</label>
                                                <input type="text" name="starting_landmark" id="starting_landmark" class="form-control" value="<?php echo set_value('starting_landmark'); ?>" placeholder="Land mark" />
                                                <span class="help-block"><?php echo form_error('starting_landmark'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Pincode</label>
                                                <input type="text" name="starting_pincode" id="starting_pincode" class="form-control" value="<?php echo set_value('starting_pincode'); ?>" placeholder="Pincode" />
                                                <span class="help-block"><?php echo form_error('starting_pincode'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-7">
                                            <label>Delivery Address</label>
                                            <textarea rows="4" name="delivery_address" id="delivery_address"><?php echo set_value('delivery_address'); ?></textarea>
                                            <span class="help-block"><?php echo form_error('delivery_address'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Land Mark</label>
                                                <input type="text" name="delivery_landmark" id="delivery_landmark" class="form-control" value="<?php echo set_value('delivery_landmark'); ?>" placeholder="Land mark" />
                                                <span class="help-block"><?php echo form_error('delivery_landmark'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6" col-md-11>
                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <input type="text" name="delivery_pincode" id="delivery_pincode" class="form-control" value="<?php echo set_value('delivery_pincode'); ?>" placeholder="Pincode" />
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
                                                <?php foreach ($vehicle_services_list as $value) { ?>
                                                    <option value="<?= $value['id']?>"><?= $value['vehicle_name']?></option> 
                                                <?php }?>
                                            </select>
                                            <span class="help-block"><?php echo form_error('vehicle_id'); ?></span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="packer" id="packer" >Do you need a professional packers?</label>
                                            </div>
                                            <span class="help-block"><?php echo form_error('packer'); ?></span>
                                        </div>
                                        <div class="form-group col-md-11">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="storage" id="storage" >Do you need a storage facilities?</label>
                                            </div>
                                            <span class="help-block"><?php echo form_error('storage'); ?></span>
                                        </div>
                                        <div class="form-group col-md-11">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1" name="vehicle_shifting" id="vehicle_shifting" >Do you need a shifting of your vehicle also?</label>
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
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="<?php echo base_url(); ?>quotation"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
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