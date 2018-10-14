<div id="page-wrapper" class="gray-bg dashbard-1"  ng-controller="shifting">
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
                        <form action="<?= site_url('admin/shiftingServices-save'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea id="short_desc" name="short_desc" class="mceEditor" cols="85" rows="10"></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('short_desc'); ?></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Long Description</label>
                                            <textarea id="long_desc" name="long_desc" class="mceEditor" cols="85" rows="10"></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('long_desc'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" accept="image/*" class="file-loading file disable">
                                    <span class="help-block"><?php echo form_error('image'); ?></span>
                                </div>
                                <!--OBJECTIVES-->
                                <div class="form-group">
                                    <label>Objectives
                                        <i class="fa fa-plus-circle text-success" ng-click="services.objective.push({})" style="cursor:pointer;font-size:16px;"></i> 
                                        <i class="fa fa-minus-circle text-danger " ng-click="services.objective.splice($index, 1)" style="cursor:pointer;font-size:16px;"></i>
                                          
                                    </label>
                                    <div class="group">
                                          
                                        <div class="row" ng-repeat="dt in services.objective">
                                            <div class="col-sm-6">
                                                <label>Icon</label>
                                                <input  type="text" class="form-control" id="obj_icon" name="obj_icon[]"  ng-model="dt.icon" required/>
                                            </div>
                                            <div class="col-sm-6" >
                                                <label>Objective</label>
                                                <input  type="text" placeholder="objective" class="form-control" id="objective" name="objective[]"  ng-model="dt.obj" required/>
                                            </div>
                                        </div>
                                        <span class="bar"></span>
                                    </div>

                                </div>
                                <!--END OBJECTIVES-->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a href="<?php print base_url(); ?>admin/shiftingServices"><button type="button" class="btn default">Cancel</button></a>
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
