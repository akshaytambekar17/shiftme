
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main" >
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
//                $shift = $shift[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/aboutus-update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                              
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <input type="text" name="title" id='title' class="form-control" value="<?= $result[0]['title']?>">
                                            
                                        
                                            <span class="help-block"><?php echo form_error('title'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Long Description</label>
                                            <textarea id="long_desc" name="long_desc" class="mceEditor" cols="85" rows="10" ><?= $result[0]['about_details']?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('long_desc'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Easy Booking Description</label>
                                            <textarea id="easy_booking" name="easy_booking" class="mceEditor" cols="85" rows="10"><?= $result[0]['easy_booking']?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('easy_booking'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Low Cost Shifting Description</label>
                                            <textarea id="lowCost_booking" name="lowCost_booking" class="mceEditor" cols="85" rows="10"><?= $result[0]['low_cost_shifting']?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('lowCost_booking'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Door to Door Service Description</label>
                                            <textarea id="doorToDoor" name="doorToDoor" class="mceEditor" cols="85" rows="10"><?= $result[0]['door_to_door']?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('doorToDoor'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/about-us"><button type="button" class="btn default">Cancel</button></a>
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
