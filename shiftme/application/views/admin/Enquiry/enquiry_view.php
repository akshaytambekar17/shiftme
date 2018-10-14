
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
        <!--banner-->	
        <?php $this->load->view('admin/layout/breadcrumb') ?>
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <?php
//                echo '<pre>';
//                print_r($enquiry);
//                echo '</pre>';
//                die();
                $enquiry = $enquiry[0];
                ?>
                <div class="content-top-1 ">
                    <div class="table-responsive">

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name : <?= $enquiry->fullname?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Mobile No : <?= $enquiry->mobileno?></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email : <?= $enquiry->email?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pickup Address : <?= $enquiry->pickupAddress?></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Pickup Landmark : <?= $enquiry->pickupLandmark?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Pickup Point : <?= $enquiry->pickuppoint?></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Zip Code : <?= $enquiry->pickupPincode?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Drop Address : <?= $enquiry->dropAddress?></label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Drop Point : <?= $enquiry->dropPoint?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Zip Code : <?= $enquiry->dropPincode?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Zip Code : <?= $enquiry->dropPincode?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Labour : <?= $enquiry->labour?></label>
                                </div>
                                <?php
                                $this->db->where('id', $enquiry->vehicle_id);
                                $v = $this->db->get('trans_vehicle_services')->row();
                                ?>
                                <div class="form-group col-md-6">
                                    <label>vehicle : <?= $v->vehicle_name ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label> Do you need a professional packers? : <?= $enquiry->packers == '1'? 'YES' : 'No' ?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label> Do you need storage facilities? : <?= $enquiry->storage == '1'? 'YES' : 'No' ?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label> Do you need shifting of your vehicle also? : <?= $enquiry->vehicle == '1'? 'YES' : 'No' ?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label> Booking Date : <?= $enquiry->BookingDate?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label> Booking Distance : <?= $enquiry->total_distance?> </label>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Booking Amount : <?= $enquiry->total_amount?> </label>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <a href="<?php print base_url(); ?>admin/enquiry"><button type="button" class="btn default">Cancel</button></a>
                        </div>

                    </div>  
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<script>
    function validateAlpha(e) {
        //updated by neeta
        var textInput = e.value;
        //var textInput = document.getElementById("cname").value;
        textInput = textInput.replace(/[^A-Za-z ]/g, "");
        e.value = textInput;
        //end
    }
</script>
