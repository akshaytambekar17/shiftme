<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>

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
                <div class="content-top-1">
                    <div class="pull-right">
                        <a href="<?= base_url()?>invoice/create" class="btn btn-success" style="margin-bottom:-44px;margin-left: 11px;"><i class="fa fa-plus" aria-hidden="true"></i> Create Inovice</a>
                    </div>
                    <div class="table-responsive m-top90">
                        <table class="table table-striped table-bordered table-hover dataTables-example" id="invoice_list">
                            <thead>
                                <tr>
                                    <th class="hidden">Id</th>
                                    <th>Full Name</th>
                                    <th>Email Id</th>
                                    <th>Invoice number</th>
                                    <th>Order number</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($invoice_list)) {
                                    foreach ($invoice_list as $key => $value) {
                            ?>
                                        <tr class="gradeX" id="order-<?= $value['invoice_id'] ?>">
                                            <td class="hidden"><?= $value['invoice_id']; ?></td>
                                            <td><?= $value['fullname']; ?></td>
                                            <td><?= $value['email_id']; ?></td>
                                            <td><?= $value['invoice_no']; ?></td>
                                            <td><?= $value['order_no']; ?></td>
                                            <td><?= $value['total_amount']; ?></td>
                                            <td>
                                                <a href="<?= site_url('invoice/send-invoice?id='.$value['invoice_id'])?>" class="btn btn-success view-invoice" data-id="<?= $value['invoice_id'] ?>" name="view-invoice" title="Send"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-danger delete-invoice" data-id="<?= $value['invoice_id'] ?>" data-invoiceno="<?= $value['invoice_no']?>" name="delete-invoice" onclick="invoiceDelete(this)" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a><br>
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
                    <h5> By clicking on <span>"YES"</span>, Invoice number <span id="invoice-no-span"></span> will be deleted permanently. Do you wish to proceed?</h5><br><br>
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
        $('#invoice_list').dataTable({
            "aaSorting": [[0, "desc"]],
        });
        $("#confirm_btn").on('click',function(){
            var id=$("#id_modal").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "invoice/delete",
                data: { 'order_id' : id },
                success: function(result){
                    $('#deleteConfirmationModal').modal('hide');
                    if(result){
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                        $('.content-top-1').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Invoice has been deleted successfully...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
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
    function invoiceDelete(ths){
        var id = $(ths).data('id');
        var invoice_no = $(ths).data('invoiceno');
        $("#id_modal").val(id);
        $("#invoice-no-span").text(invoice_no);
        $('#deleteConfirmationModal').modal('show');
    }
</script>
