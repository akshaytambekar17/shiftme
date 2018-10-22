<script src="<?= ADMINASSETS ?>js/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
    p{
        font-weight: normal;
        font-style: normal;
        font-size: 15px;
        color: #999999; 
    }
</style>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb');?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1 ">
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
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Starting Address</h4>
                                    <br>
                                    <b>Location :</b> <?= $quotation['starting_location']?> <br>
                                    <b>Address :</b> <?= $quotation['starting_address']?> <br>
                                    <b>Landmark :</b> <?= $quotation['starting_landmark']?> <br>
                                    <b>Pincode :</b> <?= $quotation['starting_pincode']?> <br>
                                </div>
                                <div class="col-md-6">
                                    <h4>Delivery Address</h4>
                                    <br>
                                    <b>Location :</b> <?= $quotation['delivery_location']?> <br>
                                    <b>Address :</b> <?= $quotation['delivery_address']?> <br>
                                    <b>Landmark :</b> <?= $quotation['delivery_landmark']?> <br>
                                    <b>Pincode :</b> <?= $quotation['delivery_pincode']?> <br>
                                </div>
                            </div>
                            <br><br>
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
                            <br><br>
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
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Total Amount :</b> <?= $quotation['total_amount']; ?> <br>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Do you need a professional packers?           :</b> <?= $quotation['packer'] == 1 ? 'Yes':'No' ?> <br>
                                    <b>Do you need a storage facilities?             :</b> <?= $quotation['storage'] == 1 ? 'Yes':'No' ?> <br>
                                    <b>Do you need a shifting of your vehicle also?  :</b> <?= $quotation['vehicle_shifting'] == 1 ? 'Yes':'No' ?> <br>
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
<script>
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
</script>