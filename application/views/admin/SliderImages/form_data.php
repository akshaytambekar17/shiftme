

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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= empty($slider_details['id'])?site_url('slider/add'):site_url('slider/update?id='.$slider_details['id'])?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" id="title" value="<?= !empty($slider_details['title'])?$slider_details['title']:set_value('title');?>">
                                            <span class="help-block"><?php echo form_error('title'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control" id="description" value="<?= !empty($slider_details['description'])?$slider_details['description']:set_value('description');?>">
                                            <span class="help-block"><?php echo form_error('description'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Image</label>
                                            <input type="file" name="images" id="images">
                                            <?php if(!empty($slider_details['images'])){ ?>
                                                <img src="<?= site_url()?>assets/images/<?= $slider_details['images']?>" width="50px" height="50px">
                                                <input type="hidden" value="<?= $slider_details['images']?>" name="images_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('images'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select Status</label>
                                            <select name='status'  class="form-control">
                                                <option disabled="disabled" selected="selected">Select Status</option>
                                                <option value="1" <?= !empty($slider_details['status'])?($slider_details['status']==1)?'selected="selected"':'':set_select('status',1);?> >Not Active</option> 
                                                <option value="2" <?= !empty($slider_details['status'])?($slider_details['status']==2)?'selected="selected"':'':set_select('status',2);?> >Active</option> 
                                            </select>
                                            <span class="help-block"><?php echo form_error('status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($slider_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $slider_details['id']?>">
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Save</button>
                                <a href="<?php echo base_url(); ?>slider"><button type="button" class="btn btn-warning">Cancel</button></a>
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