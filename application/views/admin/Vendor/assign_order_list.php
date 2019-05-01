<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
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
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="assign_order_list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Fullname</th>
                                    <th>Order Number</th>
                                    <th>Quotation Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($assign_order_list)) {
                                    foreach ($assign_order_list as $key => $value) {
                                        $order_details = $this->OrderModel->getOrderByIdWithQuotation($value['order_id']);
                            ?>
                                        <tr class="gradeX" id="vendor-<?= $value['id'] ?>">
                                            <td class="hidden"><?= $value['id']; ?></td>
                                            <td><?= $value['fullname']; ?></td>
                                            <td><?= $order_details['order_no']; ?></td>
                                            <td><?= $order_details['quotation_no']; ?></td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-order" data-id="<?= $value['id'] ?>" data-orderno="<?= $order_details['order_no']?>" name="delete-order" onclick="orderAssignDelete(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <?php
                                                    $location_details = $this->VendorOrderLocation->getLocationByUserIdOrderId($value['user_id'],$value['order_id']);
                                                    if(!empty($location_details)){
                                                ?>
                                                    <a href="<?= base_url()?>admin/vendor/edit-location?order_id=<?= $value['order_id'] ?>&user_id=<?= $value['user_id'] ?>" class="btn btn-success view-order" data-order_id="<?= $value['order_id'] ?>" name="location-details" title="Edit Location Details"><i class="fa fa-map-marker" aria-hidden="true"></i></a><br>
                                                <?php } ?>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            ?>
                            </tbody>            
                        </table>
                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="modal fade delete-popup" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h5> By clicking on <span>"YES"</span>, Order number <span id="order-no-span"></span> that assign will be canceled. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" >Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script>
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
        $('#assign_order_list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#confirm_btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "admin/vendor/assign-order-delete",
                data: { 'id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Order has been canceled successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }else{
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                        $('.alert').fadeIn().delay(3000).fadeOut(function () {
                            $(this).remove();
                        });
                    }
                    setTimeout(function(){ 
                        location.reload();
                    }, 2000);
                }
            });
        });
    });
    function orderAssignDelete(ths){
        var id = $(ths).data('id');
        var order_no = $(ths).data('orderno');
        $("#id_modal").val(id);
        $("#order-no-span").text(order_no);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
