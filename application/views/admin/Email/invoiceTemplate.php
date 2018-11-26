<style type="text/css">
    p{
        font-weight: normal;
        font-style: normal;
        font-size: 15px;
        color: #999999; 
    }
    .modal-title {
        margin: 0;
        line-height: 1.42857143;
    }
    h2, .h2 {
        font-size: 30px;
    }
    h3, .h3 {
        font-size: 24px;
    }
    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
    }
    .center {
        text-align: center;
    }
    .modal-body {
        position: relative;
        padding: 15px;
    }
    .modal-body {
        position: relative;
        padding: 15px;
    }
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
    .col-md-12 {
        width: 100%;
    }
    .col-md-6 {
        width: 50%;
    }    
    .col-md-4 {
        width: 33.33333333%;
    }
    .modal-footer {
        text-align: right;
    }
</style>
<div class="container">
    <div class="col-md-12" style="width: 100%;">
        <div id="print_div">
            <div class="modal-body center" style="text-align: center;  position: relative; padding: 0px;">
                 <h2 class="modal-title">Invoice</h2>
            </div>
            <hr>
                <!--<modal>-->
            <div class="modal-body" style="position: relative; padding: 0px;">
                <div class="row" style="">
                    <div class="col-md-12" style="width: 100%;">
                        <h3>ShiftMe</h3>
                        <b>Address :</b> Bavdhan, Pune-411021 <br>
                        <b>Mobile Number :</b> (+91)9689 622 000 <br>
                        <b>Email :</b> shiftme.in@gmail.com <br>
                    </div>
                </div>
                <hr>
                <br>
                <div class="row" style="position: relative; width: 100%;">
                    <div class="col-md-6 " style="position: relative; width: 50%;">
                        <b>Name :</b> <?= $invoice_details['fullname']?> <br>
                        <b>Mobile Number :</b> <?= $invoice_details['mobile_no']?> <br>
                        <b>Email :</b> <?= $invoice_details['email_id']?> <br>
                    </div>
                </div>
                <br>
                <div class="row" style="position: relative; width: 100%; ">
                    <div class="col-md-6 " style="position: relative; width: 50%;">
                        <b>Order Number :</b> <?= $invoice_details['order_no']?> <br>
                    </div>
                    <div class="col-md-6 " style="position: relative; width: 50%;">
                        <b>Quotation Number :</b> <?= $invoice_details['quotation_no']?> <br>
                    </div>
                </div>
                <br>
                <div class="row" style="position: relative; width: 100%; ">
                    <div class="col-md-6 " style="position: relative; width: 50%;">
                        <h4>Starting Address</h4>
                        <b>Location :</b> <?= $invoice_details['starting_location']?> <br>
                        <b>Address :</b> <?= $invoice_details['starting_address']?> <br>
                        <b>Landmark :</b> <?= $invoice_details['starting_landmark']?> <br>
                        <b>Pincode :</b> <?= $invoice_details['starting_pincode']?> <br>
                    </div>
                    <div class="col-md-6 " style="position: relative; width: 50%;">
                        <h4>Delivery Address</h4>
                        <b>Location :</b> <?= $invoice_details['delivery_location']?> <br>
                        <b>Address :</b> <?= $invoice_details['delivery_address']?> <br>
                        <b>Landmark :</b> <?= $invoice_details['delivery_landmark']?> <br>
                        <b>Pincode :</b> <?= $invoice_details['delivery_pincode']?> <br>
                    </div>
                </div>
                <br>
                <div class="row" style="width: 100%;">
                    <div class="col-md-6 " style="width: 50%;">
                        <?php 
                            $vehicle = $this->Admin_model->getVehicleServicesById($invoice_details['vehicle_id']);
                        ?>
                        <b>Vehicle :</b> <?= $vehicle['vehicle_name']?> <br>
                    </div>
                    <div class="col-md-6 " style="width: 50%;">
                        <b>Shifting Date :</b> <?= date('Y-m-d',strtotime($invoice_details['shifting_date']))?> <br>
                    </div>
                </div>
                <br>
                <label><h4>Check Product List</h4></label>
                <div class="row" style="width: 100%;">
                    <div class="col-md-12" style="width: 100%;">
                        <?php if(!empty($product_list) && count($product_list)>0){
                                foreach($product_list as $value){
                                    if(!empty($invoice_details_product_data) && count($invoice_details_product_data) >0 ){
                                        foreach($invoice_details_product_data as $value_product){ 
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
                <div class="row" style="width: 100%;">
                    <div class="col-md-6 " style="width: 50%;">
                        <b>Total Amount :</b> <?= $invoice_details['total_amount']; ?> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>

        