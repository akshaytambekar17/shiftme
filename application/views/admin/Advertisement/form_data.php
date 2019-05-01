

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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= empty($advertisementDetails['id'])?site_url('admin/advertisement/add'):site_url('admin/advertisement/update?id='.$advertisementDetails['id'])?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="<?= !empty( $advertisementDetails['name'] ) ? $advertisementDetails['name'] : set_value('name'); ?>">
                                            <span class="help-block"><?php echo form_error('name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Image</label>
                                            <input type="file" name="advertisement_image" id="advertisement_image">
                                            <?php if( !empty( $advertisementDetails['advertisement_image'] ) ) { ?>
                                                <br>
                                                <img src="<?= site_url()?>assets/advertisement-image/<?= $advertisementDetails['advertisement_image']?>" width="50px" height="50px">
                                                <input type="hidden" value="<?= $advertisementDetails['advertisement_image']?>" name="advertisement_image_hidden">
                                            <?php } ?>
                                            <span class="help-block"><?php echo form_error('advertisement_image'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select Status</label>
                                            <select name='status'  class="form-control">
                                                <option disabled="disabled" selected="selected">Select Status</option>
                                                <option value="1" <?= !empty( $advertisementDetails['status'] ) ? ( 1 == $advertisementDetails['status'] ) ? 'selected="selected"' : '' : set_select('status',1); ?> >Not Active</option> 
                                                <option value="2" <?= !empty( $advertisementDetails['status'] ) ? ( 2 == $advertisementDetails['status'] ) ? 'selected="selected"' : '' : set_select('status',2); ?> >Active</option> 
                                            </select>
                                            <span class="help-block"><?php echo form_error('status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if( !empty( $advertisementDetails['id'] ) ) { ?>
                                <input type="hidden" name="id" value="<?= $advertisementDetails['id']?>">
                            <?php } ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Save</button>
                                <a href="<?php echo base_url(); ?>admin/advertisement"><button type="button" class="btn btn-warning">Cancel</button></a>
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