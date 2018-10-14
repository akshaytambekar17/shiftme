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
                        <form action="<?= site_url();?>admin/staff-update/<?= $id?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" value="<?php echo $result[0]['name'] ?>"  placeholder="Name" oninput="validateAlpha(this);" name="Name" >
                                    <span class="error"><?php echo form_error('description'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="designation" value="<?php echo $result[0]['designation'] ?>"  placeholder="Designation" oninput="validateAlpha(this);" name="designation" >
                                    <span class="error"><?php echo form_error('designation'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>About</label>
                                    <textarea id="text" name="about" class="mceEditor" cols="85" rows="10" value=""> <?php echo $result[0]['about'] ?></textarea>
                                    <span class="error"><?php echo form_error('about'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Facebook Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                    <input type="text" class="form-control" id="fblink" value="<?php echo $result[0]['facebook'] ?>"  placeholder="Facebook Link" name="fblink" >
                                    <span class="error"><?php echo form_error('fblink'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Twitter Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                    <input type="text" class="form-control" id="twitterlink" value="<?php echo $result[0]['twitter'] ?>"  placeholder="Twitter Link"  name="twitterlink" >
                                    <span class="error"><?php echo form_error('twitterlink'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Linkedin Link</label><span style="font-family: times-new-romen; font-size: medium; color: red; float: right;"> Note : Use "http://" at the start of URL </span>
                                    <input type="text" class="form-control" id="linkedinlink" value="<?php echo $result[0]['linkedin'] ?>"  placeholder="Llinkedin Link" name="linkedinlink" >
                                    <span class="error"><?php echo form_error('linkedinlink'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" accept="image/*" class="file-loading file disable">
                                    <span class="error"><?php echo form_error('description'); ?></span>
                                    <p style="font-family: times-new-romen; font-size: medium; color: red; float: right;">Note : Photo Size Should be : 360px X 360px </p>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"  class="form-control">
                                        <option value="" selected>Select Status</option>
                                        <option value="Active" <?= $result[0]['status']=="Active"? 'selected':'' ?>>Active</option>
                                        <option value="Deactive" <?= $result[0]['status']=="Deactive"? 'selected':'' ?>>Deactive</option>
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
