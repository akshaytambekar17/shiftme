<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
    p{
        font-weight: normal;
        font-style: normal;
        font-size: 15px;
        color: #999999; 
    }
</style>
<div class="mg-page-title parallax" style=" background-image: url(<?= USERASSETS ?>images/1-banner-Transports.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>View Quotation Details</h2>
            </div>
        </div>
    </div>
</div>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="container">
        <div class="content-main">
            <!--content-->
            <div class="content-top">
                <div class="col-md-12">
                    <div class="content-top-1 ">
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= base_url()?>myaccount" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;&nbsp;My Account</a>
                            </div>
                        </div>
                        <div id="print_div">
                            <div class="modal-body center">
                                 <h2 class="modal-title">Quotation</h2>
                            </div>
                            <hr>
                                <!--<modal>-->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>ShiftMe</h3><br>
                                        <b>Address :</b> Bavdhan, Pune-411021 <br>
                                        <b>Mobile Number :</b> (+91)9689 622 000 <br>
                                        <b>Email :</b> shiftme.in@gmail.com <br>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Name :</b> <?= $quotation['fullname']?> <br>
                                        <b>Mobile Number :</b> <?= $quotation['mobile_no']?> <br>
                                        <b>Email :</b> <?= $quotation['email_id']?> <br>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Quotation Number :</b> <?= $quotation['quotation_no']?> <br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Starting Address</h4>
                                        <b>Location :</b> <?= $quotation['starting_location']?> <br>
                                        <b>Address :</b> <?= $quotation['starting_address']?> <br>
                                        <b>Landmark :</b> <?= $quotation['starting_landmark']?> <br>
                                        <b>Pincode :</b> <?= $quotation['starting_pincode']?> <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Delivery Address</h4>
                                        <b>Location :</b> <?= $quotation['delivery_location']?> <br>
                                        <b>Address :</b> <?= $quotation['delivery_address']?> <br>
                                        <b>Landmark :</b> <?= $quotation['delivery_landmark']?> <br>
                                        <b>Pincode :</b> <?= $quotation['delivery_pincode']?> <br>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php 
                                            $vehicle = $this->Admin_model->getVehicleServicesById($quotation['vehicle_id']);
                                        ?>
                                        <b>Vehicle :</b> <?= $vehicle['vehicle_name']?> <br>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Shifting Date :</b> <?= date('Y-m-d',strtotime($quotation['shifting_date']))?> <br>
                                    </div>
                                </div>
                                <br>
                                <label>Check Product List</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if(!empty($product_list) && count($product_list)>0){
                                                foreach($product_list as $value){
                                                    if(!empty($quotation_product_data) && count($quotation_product_data) >0 ){
                                                        foreach($quotation_product_data as $value_product){ 
                                                            if($value['id'] == $value_product['product_id']){

                                        ?>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label><?= $value['name']?></label>
                                                                        </div>
                                                                        <div class="form-groug">
                                                                            <label>Qty : <?= $value_product['quantity']?></label>
                                                                        </div>
                                                                    </div>
                                        <?php 
                                                            }
                                                        }
                                                    }
                                                } 
                                            }
                                        ?>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Total Amount :</b> <?= $quotation['total_amount']; ?> <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <center>
                                <?php if($quotation['is_order'] != 1){ ?>
                                    <a href="javascript:void(0)" class="btn btn-success make-order" data-quotation_id="<?= $quotation['id'] ?>" data-quotation_no="<?= $quotation['quotation_no'] ?>" name="make_order" onclick="makeOrder(this)">Make Order</a>
                                <?php } ?>    
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="printContent('print_div')">Print</a>
                            </center>
                        </div>

                            <!--</modal>-->

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="modal fade order-popup" id="orderConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center popup-content">  
                    <h5 style="color:black"> By clicking on <span>"YES"</span>, Your order of Quotation number <span id="order-no-span"></span> will be placed. Do you wish to proceed?</h5><br><br>
                    <input  type="hidden" name="id_modal" id="id_modal" value=""> 
                    <button type="button" id="confirm_btn" class="btn btn-success modal-box-button" onclick="confirmBtn(this)">Yes</button>
                    <button type="button" class="btn btn-danger modal-box-button" data-dismiss="modal"  >No</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
    function confirmBtn(ths){
        var quotation_id=$("#id_modal").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "makeOrder",
            data: { 'quotation_id' : quotation_id },
            success: function(result){
                $('#orderConfirmationModal').modal('hide');
                if(result){
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    $('#print_div').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Your order has been placed successfully. Our support team will contact soon for order confirmation. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('.alert').fadeIn().delay(3000).fadeOut(function () {
                        $(this).remove();
                    });
                }else{
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    $('#print_div').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('.alert').fadeIn().delay(3000).fadeOut(function () {
                        $(this).remove();
                    });
                }
                setTimeout(function(){ 
                    window.location.href = "<?php echo base_url(); ?>" + "myaccount";
                }, 3000);
            }
        });
    }
    function makeOrder(ths){
        var quotation_id = $(ths).data('quotation_id');
        var quotation_no = $(ths).data('quotation_no');
        $("#id_modal").val(quotation_id);
        $("#order-no-span").text(quotation_no);
        $('#orderConfirmationModal').modal('show');
    }
</script>