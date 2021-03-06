
<?php

?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <?php
        
        
        $menu = $menu[0];
        ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/Menus-update/<?= $id ?>" method="POST">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" id="cname" class="form-control" value="<?= setValue(set_value('name'), $menu->name); ?>"oninput="validateAlpha();"  placeholder="Name"/>
                                            <span class="help-block"><?php echo form_error('name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Url</label>
                                            <input type="text" name="url" id="cname" class="form-control" value="<?= setValue(set_value('url'), $menu->url); ?>" oninput="validateAlpha();"  placeholder="Menu Url" />
                                            <span class="help-block"><?php echo form_error('url'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">

                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type="text" name="icon" id="cname" class="form-control" value="<?= setValue(set_value('icon'), $menu->icon); ?>" placeholder="Icon" />
                                            <span class="help-block"><?php echo form_error('icon'); ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Parent Menu</label><?php
                                            $ge = array(0 => "Parent");
                                            if ($parent) {
                                                foreach ($parent as $g) {
                                                    $ge[$g->id] = $g->name;
                                                }
                                            }
                                            echo form_dropdown('parent_id', $ge, setValue(set_value('parent_id'), $menu->parent_id), 'class="form-control" placeholder="Select Parent"');
                                            ?>
                                            <span class="help-block"><?php echo form_error('parent_id'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo form_dropdown('status', array('Active' => "Active", 'Deactive' => "Deactive"), setValue(set_value('status'), $menu->status), 'class="form-control" placeholder="Select Status"'); ?>
                                            <span class="help-block"><?php echo form_error('status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/Menus"><button type="button" class="btn default">Cancel</button></a>
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
    function validateAlpha() {
        var textInput = document.getElementById("cname").value;
        textInput = textInput.replace(/[^A-Za-z ]/g, "");
        document.getElementById("cname").value = textInput;
    }
</script>