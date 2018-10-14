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
                        <form action="<?= site_url() ?>admin/services-update/<?= $id ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $subjectdata-> id?>"/>
                                    <input type="text" class="form-control" id="name" value="<?= setValue(set_value('name'), $subjectdata->name);?>"  placeholder="Name" oninput="validateAlpha(this);" name="name" >
                                    <span class="error"><?php echo form_error('name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" id="description" value="<?= setValue(set_value('description'), $subjectdata->description);?>" placeholder="Description" name="description">
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
</script>
