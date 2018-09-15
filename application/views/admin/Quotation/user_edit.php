
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <?php
        $user = $user[0];
        ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">
<!--                        <form action="<?= site_url() ?>admin/User-update/<?= $id ?>" method="POST">-->
                        <?php
                            $attrib = array('data-toggle' => 'validator', 'role' => 'form');
                            echo form_open_multipart("admin/User-update/" . $id, $attrib)
                        ?> 
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="f_name" id="f_name" class="form-control" value="<?=  setValue(set_value('first_name'), $user->f_name); ?>" oninput="validateAlpha(this);"  placeholder="First Name"/>
                                            <span class="help-block"><?php echo form_error('f_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="l_name" id="l_name" class="form-control" value="<?=  setValue(set_value('l_name'), $user->l_name); ?>" oninput="validateAlpha(this);"  placeholder="Last Name" />
                                            <span class="help-block"><?php echo form_error('l_name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?=  setValue(set_value('email'), $user->email); ?>" placeholder="Email" />
                                            <span class="help-block"><?php echo form_error('email'); ?></span>
                                        </div>
                                    </div>
                                    
                                </div>    
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" value="<?=  setValue(set_value('password'), $user->password); ?>" placeholder="Password" />
                                            <span class="help-block"><?php echo form_error('password'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Re type Password</label>
                                            <input type="password" name="repassword" id="repassword" class="form-control" value="" placeholder="Re Type Password" />
                                            <span class="help-block"><?php echo form_error('repassword'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    
                                    <div class="form-group col-md-6" ng-init="group_id =<?= $user->group_id ?>">
                                        <div class="form-group">
                                            <label>Group</label><?php
                                            $gr = array();
                                            if ($groups) {
                                                foreach ($groups as $g) {
                                                    $gr[$g->id] = $g->name;
                                                }
                                            }
                                            echo form_dropdown('group_id', $gr, setValue(set_value('group_id'), $user->group_id), 'id="group_id" class="form-control" placeholder="Select Group" ng-model="group_id"');
                                            ?>
                                            <span class="help-block"><?php echo form_error('group_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                               
                                <div class="row">
                                    
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Is Active</label>
                                            <?php echo form_dropdown('active', array('1' => "Yes", '0' => "No"), setValue(set_value('active'), $user->active), 'class="form-control" placeholder="Is Active"'); ?>
                                            <span class="help-block"><?php echo form_error('active'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/dashboard"><button type="button" class="btn default">Cancel</button></a>
                            </div>
<!--                        </form>-->

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<script src="<?= USERASSETS ?>js/jquery.min.js" type="text/javascript"></script>
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
    $(document).ready(function () {
        
       
    });
   
</script>