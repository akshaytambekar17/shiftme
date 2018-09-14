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
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url();?>admin/slider-update/<?= $id?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Image Title</label>
                                    <input type="text" class="form-control" id="description" value="<?= $result[0]['Description']?>"  placeholder="Image Description" oninput="validateAlpha(this);" name="description" >
                                    <span class="error"><?php echo form_error('description'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Image</label><br>
                                    <img src="<?= base_url();?>upload/slider images/<?= $result[0]['images']?>" width="200">
                                    <input type="file" name="image" accept="image/*" class="file-loading file disable">
                                    <span class="error"><?php echo form_error('description'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"  class="form-control">
                                        <option value="" selected>Select Status</option>
                                        <option value="Active" <?= $result[0]['status']=="Active"? 'selected':''  ?>>Active</option>
                                        <option value="Deactive" <?= $result[0]['status']=="Deactive"? 'selected':''  ?>>Deactive</option>
                                    </select>
                                    <span class="error"><?php echo form_error('description'); ?></span>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/services"><button type="button" class="btn default">Cancel</button></a>
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
