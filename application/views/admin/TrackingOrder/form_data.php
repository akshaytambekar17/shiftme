

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
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= empty($track_order_details['track_id'])?site_url('track-order/add'):site_url('track-order/update?id='.$track_order_details['track_id'])?>" >
                            <div class="modal-body">
                                <br>
                                <?php if(empty($track_order_details['id'])){ ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group col-md-11">
                                                <label>Select Order Number</label>
                                                <select name='order_id' class="form-control" id="order_id" >
                                                    <option disabled="disabled" selected="selected">Select Order Number</option>
                                                    <?php foreach($order_list as $value) {
                                                            $flag = 1;
                                                            if(!empty($track_order_list)){
                                                                foreach($track_order_list as $track_val){
                                                                    if($value['id'] == $track_val['order_id']){
                                                                        $flag = 0;
                                                                    }
                                                                }
                                                            }
                                                            if($flag == 1){
                                                    ?>
                                                        <option value="<?= $value['id']?>" <?= set_select('order_id',$value['id']);?> ><?= $value['order_no']?></option> 
                                                    <?php } } ?>    

                                                </select>
                                                <span class="help-block"><?php echo form_error('order_id'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{ ?>    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11">
                                                    <h3>Order Number</h3>
                                                    <p><?= $track_order_details['order_no']?></p>
                                                </div>    
                                            </div>    
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11">
                                                    <h3>Full name</h3>
                                                    <p><?= $track_order_details['fullname']?></p>
                                                </div>
                                            </div>
                                        </div>
                                <?php }?>    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Tracking Status</label>
                                            <input type="text" name="shipping_status" class="form-control" id="shipping_status" value="<?= !empty($track_order_details['shipping_status'])?$track_order_details['shipping_status']:set_value('shipping_status');?>">
                                            <span class="help-block"><?php echo form_error('shipping_status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($track_order_details['id'])){ ?>
                                <input type="hidden" name="id" value="<?= $track_order_details['track_id']?>">
                                <input type="hidden" name="order_no" value="<?= $track_order_details['order_no']?>">
                                
                            <?php } ?>
                            <div class="modal-footer">
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-success" id="submit"><?= !empty($track_order_details['id'])?'Update':'Save'?></button>
                                    <a href="<?php echo base_url(); ?>track-order"><button type="button" class="btn btn-warning">Cancel</button></a>
                                </div>
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