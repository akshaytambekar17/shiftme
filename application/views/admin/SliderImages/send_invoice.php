

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
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
                    <div class="table-responsive">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('invoice/send-invoice?id='.$invoice_details['invoice_id'])?>" >
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Invoice Number :</b> <?= $invoice_details['invoice_no']?> <br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Order Number :</b> <?= $invoice_details['order_no']?> <br>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Quotation Number :</b> <?= $invoice_details['quotation_no']?> <br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Name :</b> <?= $invoice_details['fullname']?> <br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Mobile Number :</b> <?= $invoice_details['mobile_no']?> <br>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Email :</b> <?= $invoice_details['email_id']?> <br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Total Amount :</b> <?= $invoice_details['total_amount']; ?> <br>
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $invoice_details['invoice_id']?>" name="invoice_id">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" id="submit">Send Invoice</button>
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
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
    });
   
</script>
