

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <?php if($message = $this ->session->flashdata('Message')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?> 
            <?php if($message = $this ->session->flashdata('Error')){?>
                <div class="col-md-12 ">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?=$message ?>
                    </div>
                </div>
            <?php }?>
            <div class="col-md-12">
                <div class="content-top-1 ">
                    
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= empty($cms_details['id'])?site_url('cms-page/add'):site_url('cms-page/update?id='.$cms_details['id'])?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" id="title" value="<?= !empty($cms_details['title'])?$cms_details['title']:set_value('title');?>">
                                            <span class="help-block"><?php echo form_error('title'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Description</label>
                                            <textarea rows="4" name="description" id="description"><?php echo !empty($cms_details['description'])?$cms_details['description']:set_value('description'); ?></textarea>
                                            <span class="help-block"><?php echo form_error('description'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Main Image</label>
                                            <input type="file" name="main_image" id="main_image">
                                            <?php if(!empty($cms_details['main_image'])){ ?>
                                                <img src="<?= site_url()?>assets/cms-images/<?= $cms_details['main_image']?>" width="50px" height="50px">
                                                <input type="hidden" value="<?= $cms_details['main_image']?>" name="main_image_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('main_image'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Slider1</label>
                                            <input type="file" name="slider1" id="slider1">
                                            <?php if(!empty($cms_details['slider1'])){ ?>
                                                <img src="<?= site_url()?>assets/cms-images/<?= $cms_details['slider1']?>" width="50px" height="50px">
                                                <input type="hidden" value="<?= $cms_details['slider1']?>" name="slider1_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('slider1'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Slider2</label>
                                            <input type="file" name="slider2" id="slider2">
                                            <?php if(!empty($cms_details['slider2'])){ ?>
                                                <img src="<?= site_url()?>assets/cms-images/<?= $cms_details['slider2']?>" width="50px" height="50px">
                                                <input type="hidden" value="<?= $cms_details['slider2']?>" name="slider2_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('slider2'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-md-11">
                                            <label>Slider3</label>
                                            <input type="file" name="slider3" id="slider1">
                                            <?php if(!empty($cms_details['slider3'])){ ?>
                                                <img src="<?= site_url()?>assets/cms-images/<?= $cms_details['slider3']?>" width="50px" height="50px">
                                                <input type="hidden" value="<?= $cms_details['slider3']?>" name="slider3_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('slider3'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control" id="meta_title" value="<?= !empty($cms_details['meta_title'])?$cms_details['meta_title']:set_value('meta_title');?>">
                                            <span class="help-block"><?php echo form_error('meta_title'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Meta Description</label>
                                            <input type="text" name="meta_description" class="form-control" id="meta_description" value="<?= !empty($cms_details['meta_description'])?$cms_details['meta_description']:set_value('meta_description');?>">
                                            <span class="help-block"><?php echo form_error('meta_description'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Meta Keywords</label>
                                            <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" value="<?= !empty($cms_details['meta_keyword'])?$cms_details['meta_description']:set_value('meta_keyword');?>">
                                            <span class="help-block"><?php echo form_error('meta_keyword'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select Status</label>
                                            <select name='status'  class="form-control">
                                                <option disabled="disabled" selected="selected">Select Status</option>
                                                <option value="1" <?= !empty($cms_details['status'])?($cms_details['status']==1)?'selected="selected"':'':set_select('status',1);?> >Not Active</option> 
                                                <option value="2" <?= !empty($cms_details['status'])?($cms_details['status']==2)?'selected="selected"':'':set_select('status',2);?> >Active</option> 
                                            </select>
                                            <span class="help-block"><?php echo form_error('status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($cms_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $cms_details['id']?>">
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Save</button>
                                <a href="<?php echo base_url(); ?>cms-page"><button type="button" class="btn btn-warning">Cancel</button></a>
                            </div>
                        </form>

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<script src="<?= USERASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<script>
    
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
//        $("#order_id").change(function() {
//            var order_id = $("#order_id").val();
//            $.ajax({
//                type: "POST",
//                url: "<?php echo base_url(); ?>" + "invoice/order-details",
//                data: { 'id' : order_id },
//                success: function(result){
//                    $('#submit').attr('disabled',false);
//                    $("#order-details").html(result);
//                    
//                }
//            });
//        });
    });
   
</script>