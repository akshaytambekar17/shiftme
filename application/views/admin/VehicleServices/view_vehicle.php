
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
                $vehicle = $vehicle[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/vehicleServices-update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Vehicle Name</label>
                                            <input  type="text" placeholder="Vehicle Name" class="form-control" id="vehicle_name" value="<?= setValue(set_value('vehicle_name'), $vehicle->vehicle_name);?>" name="vehicle_name" readonly/>
                                            <span class="help-block"><?php echo form_error('vehicle_name'); ?></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="">
                                    <label>Image</label>
<!--                                    <input type="file" name="image" accept="image/*" class="file-loading file disable" value="{{shiftingdetail.image}}" image="shiftingdetail.image">-->
                                    <img id="blah" src="<?php echo  $vehicle->image; ?>" style="height: 200px;width: 300" class="img-responsive img-thumbnail" />
                                                    
                                    <span class="help-block"><?php echo form_error('image'); ?></span>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Base Fare</label>
                                            <input  type="text" placeholder="Base Fare" class="form-control" value="<?= setValue(set_value('base_fare'), $vehicle->base_fare);?>" id="base_fare" name="base_fare" readonly/>
                                            <span class="help-block"><?php echo form_error('base_fare'); ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Free Waiting Minutes</label>
                                            <input  type="text" placeholder="Free Waiting Minutes" class="form-control" id="free_waiting_minutes" value="<?= setValue(set_value('free_waiting_minutes'), $vehicle->free_waiting_minutes);?>" name="free_waiting_minutes" readonly/>
                                            <span class="help-block"><?php echo form_error('free_waiting_minutes'); ?></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Capacity</label>
                                            <input  type="text" placeholder="Capacity" class="form-control" value="<?= setValue(set_value('capacity'), $vehicle->capacity);?>" id="capacity" name="capacity" readonly/>
                                            <span class="help-block"><?php echo form_error('capacity'); ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Transit Charge</label>
                                            <input  type="text" placeholder="Transit Charge" class="form-control" value="<?= setValue(set_value('transit_charge'), $vehicle->transit_charge);?>" id="transit_charge" name="transit_charge" readonly/>
                                            <span class="help-block"><?php echo form_error('transit_charge'); ?></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Waiting Charge Per Minute</label>
                                            <input  type="text" placeholder="Waiting Charge Per Minute" class="form-control" id="waiting_charge_per_minute" value="<?= setValue(set_value('waiting_charge_per_minute'), $vehicle->waiting_charge_per_minute);?>" name="waiting_charge_per_minute" readonly/>
                                            <span class="help-block"><?php echo form_error('waiting_charge_per_minute'); ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Dimension</label>
                                            <input  type="text" placeholder="Dimension" class="form-control" id="dimension" value="<?= setValue(set_value('dimension'), $vehicle->dimension);?>" name="dimension" readonly/>
                                            <span class="help-block"><?php echo form_error('dimension'); ?></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                
                                <a href="<?php print base_url(); ?>admin/vehicleServices"><button type="button" class="btn default">Cancel</button></a>
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
</script>
