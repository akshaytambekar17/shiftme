
<div id="page-wrapper" class="gray-bg dashbard-1" ng-controller="editshifting">
    <div class="content-main" ng-init="GetShiftingDetail(<?= $id ?>)">
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
                $shift = $shift[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form action="<?= site_url() ?>admin/shiftingServices-update/<?= $id ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                              
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea id="short_desc" name="short_desc" class="mceEditor" cols="85" rows="10" value="<?= setValue(set_value('short_desc'), $shift->short_desc);?>"><?php echo $shift->short_desc; ?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('short_desc'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label>Long Description</label>
                                            <textarea id="long_desc" name="long_desc" class="mceEditor" value="<?= setValue(set_value('long_desc'), $shift->long_desc);?>" cols="85" rows="10"><?php echo $shift->long_desc; ?></textarea>
                                        
                                            <span class="help-block"><?php echo form_error('long_desc'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <label>Image</label>
                                    <input type="file" name="image" accept="image/*" class="file-loading file disable" value="{{shiftingdetail.image}}" image="shiftingdetail.image">
<!--                                    <img id="blah" ng-src="{{shiftingdetail.image}}" style="height: 200px;width: 300" class="img-responsive img-thumbnail" />-->
                                                    
                                    <span class="help-block"><?php echo form_error('image'); ?></span>
                                </div>
                                
                                <!--OBJECTIVES-->
                                <div class="form-group">
                                    <label>Objectives
                                        <i class="fa fa-plus-circle text-success" ng-click="shiftingdetail.objectives.push({})" style="cursor:pointer;font-size:16px;"></i> 
                                        <i class="fa fa-minus-circle text-danger " ng-click="shiftingdetail.objectives.splice($index, 1)" style="cursor:pointer;font-size:16px;"></i>
                                          
                                    </label>
                                    <div class="group">
                                         
                                        <div class="row" ng-repeat="dt in shiftingdetail.objectives">
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
</script>
