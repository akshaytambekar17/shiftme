<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="order_list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Full Name</th>
                                    <th>Email Id</th>
                                    <th>Order Number</th>
                                    <th>Status</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($orders_list)) {
                                    foreach ($orders_list as $key => $value) {
                            ?>
                                        <tr class="gradeX" id="order-<?= $value['order_id'] ?>">
                                            <td class="hidden"><?= $value['order_id']; ?></td>
                                            <td><?= $value['fullname']; ?></td>
                                            <td><?= $value['email_id']; ?></td>
                                            <td><?= $value['order_no']; ?></td>
                                            <td><?= $value['status']; ?></td>
                                            <td><?= $value['total_amount']; ?></td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-primary view-order" data-id="<?= $value['order_id'] ?>" name="view-order">View</a><br>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-order" data-id="<?= $value['order_id'] ?>" data-orderno="<?= $value['order_no']?>" name="delete-order" onclick="orderDelete(this)">Delete</a><br>
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
                    <h5> By clicking on <span>"YES"</span>, Order number <span id="order-no-span"></span> will be deleted permanently. Do you wish to proceed?</h5><br><br>
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
        $('#order_list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#confirm_btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "order/delete",
                data: { 'order_id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Order has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
                    }, 3000);
                }
            });
        });
    });
    function userDelete(ths){
        var id = $(ths).data('id');
        var order_no = $(ths).data('orderno');
        $("#id_modal").val(id);
        $("#order-no-span").text(order_no);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
