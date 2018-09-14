
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
                 $labour = $labour[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                              
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="description" name="description" class="mceEditor" cols="85" rows="10" value="<?= setValue(set_value('description'), $labour->description);?>"><?php echo $labour->description; ?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('description'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="">
                                    <label>Image</label>
<!--                                    <input type="file" name="image" accept="image/*" class="file-loading file disable" value="" image="<?php echo $labour->image; ?>">-->
                                    <img id="blah" src="<?php echo $labour->image; ?>" style="height: 200px;width: 300" class="img-responsive img-thumbnail" />
                                                    
                                    <span class="help-block"><?php echo form_error('image'); ?></span>
                                </div>
                                
                                
                                
                            </div>
                            <div class="modal-footer">
                                <a href="<?php print base_url(); ?>admin/labourServices"><button type="button" class="btn default">Cancel</button></a>
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
