<?php ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <?php
                if ($this->session->flashdata('message')) {
                    echo flash_message();
                }
                $enquiry = $enquiry[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/enquiry-update/<?= $id ?>" method="POST">
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-sm-6 form-group">
                                        <label>Pickup Point</label>

                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                            <input type="text" class="form-control" value="<?= setValue(set_value('pickuppoint'), $enquiry->pickuppoint)?>" id="pickupPoint" placeholder="Pick Up Point" name="pickuppoint" disabled="">
                                            <span class="help-block"><?php echo form_error('pickuppoint'); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Pickup Address</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" value="<?= setValue(set_value('pickupAddress'), $enquiry->pickupAddress)?>" id="pickupAddress" placeholder="Pick Up Address" name="pickupAddress">
                                            <span class="help-block"><?php echo form_error('pickuppoint'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Pickup Landmark</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" value="<?= setValue(set_value('pickupLandmark'), $enquiry->pickupLandmark)?>" id="pickupLandmark" placeholder="Pick Up Address" name="pickupLandmark">
                                            <span class="help-block"><?php echo form_error('pickuppoint'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Pickup Pincode</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" value="<?= setValue(set_value('pickupPincode'), $enquiry->pickupPincode)?>" id="pickupPincode" placeholder="Pick Up Pincode" name="pickupPincode">
                                            <span class="help-block"><?php echo form_error('pickuppoint'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Drop Point</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                            <input type="text" class="form-control" value="<?= setValue(set_value('dropPoint'), $enquiry->dropPoint)?>" id="dropPoint" placeholder="Dropup Point" name="dropPoint" disabled="">
                                            <span class="help-block"><?php echo form_error('dropPoint'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Drop Address</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" value="<?= setValue(set_value('dropAddress'), $enquiry->dropAddress)?>" id="dropAddress" placeholder="Dropup Address" name="dropAddress">
                                            <span class="help-block"><?php echo form_error('dropPoint'); ?></span>
                                        </div>        
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Drop Pincode</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" value="<?= setValue(set_value('dropPincode'), $enquiry->dropPincode)?>" id="dropPincode" placeholder="Dropup Pincode" name="dropPincode">
                                            <span class="help-block"><?php echo form_error('dropPoint'); ?></span>
                                        </div>        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Vehicle Name</label>
<!--                                        <select class="form-control" name="vehicle_id" id="vehicle_id">
                                            <option value=""> Select Vehicles</option>
                                            <option value="1"></option>
                                            <option value="2">&nbsp; Tata Ace</option>
                                            <option value="3">&nbsp; Tata 207</option>
                                            <option value="4"> &nbsp; Tata 407</option>
                                            <option value="5">&nbsp; Eicher Truck</option>
                                            <option value="6"> &nbsp; Truck LPT</option>
                                            <option value="7">&nbsp; Truck LPT 1109</option>
                                        </select>-->
                                        <?php
                                        $ge = array(0 => "vehicles");
                                        if ($vehicles) {
                                            foreach ($vehicles as $g) {
                                                $ge[$g->id] = $g->vehicle_name;
                                            }
                                        }
                                        echo form_dropdown('vehicle_id', $ge, setValue(set_value('vehicle_id'), $enquiry->vehicle_id), 'class="form-control" placeholder="Select Vehicle"');
                                        ?>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Estimated Distance</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" oninput="validateNumber(this);" readonly value="<?= setValue(set_value('total_distance'), $enquiry->total_distance)?>" id="total_distance" placeholder="Total Distance" name="total_distance">
                                            <span class="help-block"><?php echo form_error('dropPoint'); ?></span>
                                        </div>        
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Total</label>
                                        <div class="input-group">
                                            <!--<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>-->
                                            <input type="text" class="form-control" oninput="validateNumber(this);" readonly value="<?= setValue(set_value('total_amount'), $enquiry->total_amount)?>" id="total_amount" placeholder="Total Amount" name="total_amount">
                                            <span class="help-block"><?php echo form_error('dropPoint'); ?></span>
                                        </div>        
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/enquiry"><button type="button" class="btn default">Cancel</button></a>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
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
</script>
