

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('invoice/create')?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select Order Number</label>
                                            <select name='order_id' class="form-control" id="order_id" >
                                                <option disabled="disabled" selected="selected">Select Order Number</option>
                                                <?php foreach($order_list as $value) {?>
                                                    <option value="<?= $value['order_id']?>" <?= set_select('order_no',$value['order_id']);?> ><?= $value['order_no']?></option> 
                                                <?php } ?>    
                                                
                                            </select>
                                            <span class="help-block"><?php echo form_error('order_id'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="order-details"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Generate Invoice</button>
                                <a href="<?php echo base_url(); ?>invoice"><button type="button" class="btn btn-warning">Cancel</button></a>
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
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
    $(document).ready(function () {
       $('#submit').attr('disabled',true);
        $("#order_id").change(function() {
            var order_id = $("#order_id").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "invoice/order-details",
                data: { 'id' : order_id },
                success: function(result){
                    $('#submit').attr('disabled',false);
                    $("#order-details").html(result);
                    
                }
            });
        });
    });
   
</script>