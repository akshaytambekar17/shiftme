
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
                $test = $test[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/testimonials-update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="text" name="text" class="mceEditor" cols="85" rows="10" value="<?= setValue(set_value('text'), $test->text);?>"><?php echo $test->text; ?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('text'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Image</label>
                                            <input type="file" name="image" id="image">
                                            <?php if( !empty( $test->image ) ){ ?>
                                                <br>
                                                <img src="<?= site_url()?>assets/images/<?= $test->image ?>" width="120px" height="120px">
                                                <input type="hidden" value="<?= $test->image?>" name="image_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('image'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/testimonials"><button type="button" class="btn default">Cancel</button></a>
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
