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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('admin/vendor/assign-order?id='.$vendor_details['id'])?>" >
                    <div id="print_div">
                        <!--<modal>-->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5><b>Fullname :</b></h5><?= $vendor_details['fullname']?>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Mobile Number :</b></h5><?= $vendor_details['mobileno']?>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Email :</b></h5><?= $vendor_details['email']?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5><b>Address : </b></h5><?= !empty($vendor_details['address'])?$vendor_details['address']:'NA'?>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Address Proof: </b></h5><?= !empty($vendor_details['address_proof'])?$vendor_details['address_proof']:'NA'?>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Vehicle : </b></h5>
                                        <?php
                                            if(!empty($vendor_details['vehicle_id'])){
                                                $vehicle_details = $this->User->getVehicleById($vendor_details['vehicle_id']); 
                                                echo $vehicle_details['vehicle_name'];
                                            }else{
                                                echo "NA";
                                            }
                                        ?>
                                    
                                </div>
                            </div>
                            <br>
                            <h3>Driver Details</h3><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5><b>Driver Name : </b></h5><?= !empty($vendor_details['driver_name'])?$vendor_details['driver_name']:'NA'?>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Driver License Number : </b></h5><?= !empty($vendor_details['driver_license_no'])?$vendor_details['driver_license_no']:'NA'?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5><b>Driver Contact : </b></h5><?= !empty($vendor_details['driver_contact'])?$vendor_details['driver_contact']:'NA'?>
                                </div>
                                <div class="col-md-4">
                                    <h5><b>Driver Aadhar Number : </b></h5><?= !empty($vendor_details['driver_adhar_no'])?$vendor_details['driver_adhar_no']:'NA'?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Select Order Number</label>
                                    <select name='order_id' class="form-control" id="order_id" >
                                        <option disabled="disabled" selected="selected">Select Order Number</option>
                                        <?php foreach($order_list as $value) {
                                                $disabled = "";
                                                foreach($order_assign_list as $assign_val){
                                                    if($value['order_id'] == $assign_val['order_id']){
                                                        $disabled = 'disabled="disabled"';
                                                    }
                                                }
                                        ?>
                                            <option value="<?= $value['order_id']?>" <?= set_select('order_no',$value['order_id']);?> <?= $disabled?>><?= $value['order_no']?></option> 
                                        <?php } ?>    

                                    </select>
                                    <span class="help-block"><?php echo form_error('order_id'); ?></span>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="<?= $vendor_details['uid']?>">
                            <input type="hidden" name="id" value="<?= $vendor_details['id']?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center> 
                            <button type="submit" class="btn btn-success" id="submit">Assign Order</button>
                        </center>
                    </div>
                    </form>    
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