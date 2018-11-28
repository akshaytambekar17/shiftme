
<!--<div class="mg-page-title parallax" style=" background-image: url(<?= USERASSETS ?>images/1-banner-Transports.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>My Account Details</h2>
                                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>
    </div>
</div>-->

<div class="mg-about-features section-md-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                <div class="area-title text-center wow fadeIn">
                    <h2>My Account</h2>
                </div>
            </div>
        </div>
<!--        <h2 class="mg-sec-left-title mytitle" style="font-weight: 600;color: #71747b;">My Account</h2>-->
        <p></p>
        <div class="row" style="min-height:300px;" id="alert-msg-show">
            <?php if ($this->session->flashdata('Message')) { ?>
                <div class = "alert alert-success alert-dismissable">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times</button>
                    <?php echo $this->session->flashdata('Message'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('Error')) { ?>
                <div class = "alert alert-danger alert-dismissable">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
                    <?php echo $this->session->flashdata('Error'); ?>
                </div>
            <?php } ?>
            <div  class="col-sm-12 col-md-12 col-lg-12">
                <?php 
                    if(!empty($vendor_details)){
                        if($vendor_details['is_verified'] == 1){
                            $href = true;
                        }else{
                            $href = false;
                        }
                    }else{
                        $href = true;
                    }
                ?>
                <?php if($href == false){ ?>
                    <p class="help-block center">Please complete your profile details before proceeding further.</p>
                    <br>
                <?php } ?>
                <div class="col-xs-12 col-lg-3 col-md-3 col-sm-12">
                    <ul class="nav nav-tabs tabs-left" style="border: 1px solid #ddd;">
                        <li class="active"> <a href="#profile" data-toggle="tab">Profile</a></li>
                        <?php if($user_details['role'] == 1){ ?>
                            <li><a href="<?= $href==true?'#myorders':'javascript:void(0)'?>" data-toggle="tab">My Order</a></li>
                            <li><a href="<?= $href==true?'#myquotation':'javascript:void(0)'?>" data-toggle="tab">My Quotation</a></li>
                            <li><a href="<?= $href==true?'#myenquires':'javascript:void(0)'?>" data-toggle="tab">My Enquires</a></li>
                        <?php }else{ ?>
                            <li><a href="<?= $href==true?'#shifting_information':'javascript:void(0)'?>" data-toggle="tab">Shifting Information</a></li>
                            <li><a href="<?= $href==true?'#myorders_vendor':'javascript:void(0)'?>" data-toggle="tab">My Order</a></li>
                        <?php } ?>
                        <li><a href="#settings" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-9 col-md-9 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">

                            <?php if($user_details['role'] == 1){ ?>
                                <form action="<?= site_url() ?>User_controller/update_pro" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Email :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="email" class="form-control" name="email" placeholder="E-mail" id="email" value="<?= $result[0]['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Mobile No. :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="mobileno" placeholder="Mobile No." id="mobileno" value="<?= $result[0]['mobileno'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Street :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="street" placeholder="Street" id="street" value="<?= $result[0]['street'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Landmark :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="landmark" placeholder="Landmark" id="landmark" value="<?= $result[0]['landmark'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>City :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <select class="form-control" name="city" id="city">
                                                <option value="" selected> Select City </option>
                                                <option value="Pune" <?= $result[0]['city'] == 'Pune' ? 'selected' : '' ?>>Pune</option>
                                                <option value="Mumbai" <?= $result[0]['city'] == 'Mumbai' ? 'selected' : '' ?>>Mumbai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Pin Code :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" name="pincode" class="form-control" placeholder="Pin Code" id="pincode" value="<?= $result[0]['pincode'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>State :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <select class="form-control" name="state" id="state">
                                                <option value="" selected> Select State </option>
                                                <option value="Maharastra" <?= $result[0]['state'] == 'Maharastra' ? 'selected' : '' ?>>Maharashtra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Country :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <select class="form-control" name="country" id="country">
                                                <option value="" selected> Select Country </option>
                                                <option value="India" <?= $result[0]['country'] == 'India' ? 'selected' : '' ?> >India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--                                <div class="row">
                                                                        <div class="col-lg-2 col-md-2">
                                                                            <label>Image :</label>
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8">
                                                                            <input type="file" name="profiephoto" class="form-control" id="profiephoto"> 
                                                                        </div>
                                                                    </div>-->

                                    <div class="form-group row" style="text-align: center">
                                        <input type="submit" value="UPDATE" class="btn btn-success" onclick="return valid()">
                                    </div>

                                </form>
                            <?php }else{ ?>
                                <form action="<?= site_url() ?>myaccount?id=<?= $vendor_details['id']?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Address :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="address" placeholder="Address" id="address" value="<?= !empty($vendor_details['address'])?$vendor_details['address']:set_value('address') ?>" required>
                                            <span class="help-block"><?php echo form_error('address'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Address Proof :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="address_proof" placeholder="Address Proof" id="address_proof" value="<?= !empty($vendor_details['address_proof'])?$vendor_details['address_proof']:set_value('address_proof') ?>" required>
                                            <span class="help-block"><?php echo form_error('address_proof'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Vehicle Model :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <select class="form-control" name="vehicle_id" id="vehicle_id" required>
                                                <option selected disabled> Select Vehicle</option>
                                                <?php foreach ($vehicle_services_list as $value) { 
                                                        if(!empty($vendor_details['vehicle_id'])){
                                                            if($vendor_details['vehicle_id'] == $value['id']){
                                                                $selected = 'selected="selected"';
                                                            }else{
                                                                $selected = '';
                                                            }
                                                        }else{
                                                            $selected = '';
                                                        }
                                                ?>
                                                    <option value="<?= $value['id']?>" <?= !empty($vendor_details['vehicle_id'])?$selected:set_select('vehicle_id',$value['id']); ?> ><?= $value['vehicle_name']?></option> 
                                                <?php }?>
                                                
                                            </select>
                                            <span class="help-block"><?php echo form_error('vehicle_id'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Registration Number :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="registration_no" placeholder="Registration Number" id="registration_no" value="<?= !empty($vendor_details['registration_no'])?$vendor_details['registration_no']:set_value('registration_no') ?>" required>
                                            <span class="help-block"><?php echo form_error('registration_no'); ?></span>
                                        </div>
                                    </div>
                                    <h5>Driver Details</h5>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Driver Name :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="driver_name" placeholder="Driver Name" id="driver_name" value="<?= !empty($vendor_details['driver_name'])?$vendor_details['driver_name']:set_value('driver_name') ?>" required>
                                            <span class="help-block"><?php echo form_error('driver_name'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Driver License No :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="driver_license_no" placeholder="Driver License No" id="driver_license_no" value="<?= !empty($vendor_details['driver_license_no'])?$vendor_details['driver_license_no']:set_value('driver_license_no') ?>" required>
                                            <span class="help-block"><?php echo form_error('driver_license_no'); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Driver Contact Number:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="driver_contact" placeholder="Driver Contact" id="driver_contact" value="<?= !empty($vendor_details['driver_contact'])?$vendor_details['driver_contact']:set_value('driver_contact') ?>" required>
                                            <span class="help-block"><?php echo form_error('driver_contact'); ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 col-md-3">
                                            <label>Driver Aadhar No :</label>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <input type="text" class="form-control" name="driver_adhar_no" placeholder="Driver Aadhar Number" id="driver_adhar_no" value="<?= !empty($vendor_details['driver_adhar_no'])?$vendor_details['driver_adhar_no']:set_value('driver_adhar_no') ?>" required>
                                            <span class="help-block"><?php echo form_error('driver_adhar_no'); ?></span>
                                        </div>
                                    </div>
                                    
                                    <!--                                <div class="row">
                                                                        <div class="col-lg-2 col-md-2">
                                                                            <label>Image :</label>
                                                                        </div>
                                                                        <div class="col-lg-8 col-md-8">
                                                                            <input type="file" name="profiephoto" class="form-control" id="profiephoto"> 
                                                                        </div>
                                                                    </div>-->
                                    <input type="hidden" name="id" value="<?= $vendor_details['id']?>">
                                    <div class="row" style="text-align: center">
                                        <input type="submit" value="Update" class="btn btn-success" name="submit">
                                    </div>

                                </form>
                            <?php }?>
                            
                        </div>
                        <div class="tab-pane" id="myorders">
                           
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered  myorders-table" style="width: 100% !important" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="hidden">Id</th>
                                                    <th>Order Number</th>
                                                    <th>Quotation Number</th>
                                                    <th>Pickup Point</th>
                                                    <th>Drop Point</th>
                                                    <th>Vehicle</th>
                                                    <th>Shifting Date</th>
                                                    <th>Status</th>
                                                    <th>Total Amount</th>
<!--                                                    <th>Action</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if (!empty($orders_list)) {
                                                        foreach($orders_list as $value) { 
                                                ?>
                                                    <tr class="gradeX" id="order-<?= $value['order_id'] ?>">
                                                        <td class="hidden"><?= $value['order_id']; ?></td>
                                                        <td><?= $value['order_no']; ?></td>
                                                        <td><?= $value['quotation_no']; ?></td>
                                                        <td><?= $value['starting_location']; ?></td>
                                                        <td><?= $value['delivery_location']; ?></td>
                                                        <td><?php
                                                                $vehicle = $this->user->getVehicleById($value['vehicle_id']);
                                                                echo $vehicle['vehicle_name'];
                                                            ?>
                                                        </td>
                                                        <td><?= $value['shifting_date']; ?></td>
                                                        <td><?php
                                                                if($value['order_status']==1){
                                                                    echo "Pending";
                                                                }else if($value['order_status']==2){
                                                                    echo "Completed";
                                                                }else{
                                                                    echo "Cancelled";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?= $value['total_amount']; ?></td>
<!--                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-primary view-order" data-id="<?= $value['order_id'] ?>" name="view-order">View</a><br>
                                                            <a href="javascript:void(0)" class="btn btn-danger delete-order" data-id="<?= $value['order_id'] ?>" data-orderno="<?= $value['order_no']?>" name="delete-order" onclick="orderDelete(this)">Delete</a><br>
                                                        </td>-->
                                                    </tr>
                                                <?php 
                                                        } 
                                                    }else{ 
                                                ?>
                                                    <td colspan="8" class="center">No Data available</td>    
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="myquotation">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered dt-responsive example myquotation-table" style="width: 100% !important" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="hidden">Id</th>
                                                    <th>Quotation Number</th>
                                                    <th>Full name</th>
                                                    <th>Email id</th>
                                                    <th>Phone Number</th>
                                                    <th>Starting Address</th>
                                                    <th>Delivery Address</th>
                                                    <th>Vehicle</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($quotation_list)) {
                                                        foreach ($quotation_list as $key => $value) {
                                                ?>
                                                            <tr class="gradeX" id="quotation-<?= $value['id'] ?>">
                                                                <td class="hidden"><?= $value['id']; ?></td>
                                                                <td><?= $value['quotation_no']; ?></td>
                                                                <td><?= $value['fullname']; ?></td>
                                                                <td><?= $value['email_id']; ?></td>
                                                                <td><?= $value['mobile_no']; ?></td>
                                                                <td><?= $value['starting_address']; ?></td>
                                                                <td><?= $value['delivery_address']; ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $vehicle = $this->Admin_model->getVehicleServicesById($value['vehicle_id']);
                                                                        if(!empty($vehicle)){
                                                                            echo $vehicle['vehicle_name'];
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
<!--                                                                    <a href="javascript:void(0)" class="btn btn-danger view-quotation" data-id="<?= $value['id'] ?>" name="delete_quotation" onclick="quotationDelete(this)">Delete</a><br><br>-->
                                                                    <?php if($value['is_order'] != 1){?>
                                                                        <a href="javascript:void(0)" class="btn btn-success make-order" data-quotation_id="<?= $value['id'] ?>" data-quotation_no="<?= $value['quotation_no'] ?>" name="make_order" onclick="makeOrder(this)">Make Order</a><br><br>
                                                                    <?php } ?>    
                                                                    <a href="<?= base_url()?>quote/view?id=<?= $value['id']?>" class="btn btn-primary delete-user" data-id="<?= $value['user_id'] ?>" name="view_quotation" >View Quotation</a><br>
                                                                </td>
                                                            </tr>
                                                <?php
                                                        }
                                                    }else{
                                                ?>
                                                        <td colspan="8" class="center">No Data available</td>    
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="myenquires">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered dt-responsive example myenquires-table" style="width: 100% !important" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="hidden">Id</th>
                                                    <th>Pickup Point</th>
                                                    <th>Drop Point</th>
                                                    <th>Vehicle</th>
                                                    <th>Shifting Date</th>
<!--                                                    <th>Action</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if (!empty($enquiry_list)) {
                                                        foreach($enquiry_list as $value) { 
                                                ?>
                                                    <tr class="gradeX" id="order-<?= $value['enquiry_id'] ?>">
                                                        <td class="hidden"><?= $value['enquiry_id']; ?></td>
                                                        <td><?= $value['starting_location']; ?></td>
                                                        <td><?= $value['delivery_location']; ?></td>
                                                        <td><?php
                                                                $vehicle = $this->user->getVehicleById($value['vehicle_id']);
                                                                echo $vehicle['vehicle_name'];
                                                            ?>
                                                        </td>
                                                        <td><?= $value['shifting_date']; ?></td>
<!--                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-primary view-order" data-id="<?= $value['enquiry_id'] ?>" name="view-order">View</a>
                                                            <a href="javascript:void(0)" class="btn btn-danger delete-order" data-id="<?= $value['enquiry_id'] ?>" name="delete-enquiry" onclick="enquiryDelete(this)">Delete</a><br>
                                                        </td>-->
                                                    </tr>
                                                <?php
                                                        }
                                                    }else{
                                                ?>
                                                        <td colspan="7" class="center">No Data available</td>    
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form action="<?= site_url() ?>User_controller/changePassword" method="POST" id="change_pass">
                                <div class="form-group row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Old Password :</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="password" class="form-control" name="old_password" placeholder="Old Password" id="old_password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>New Password :</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="password" class="form-control" maxlength="8" oninput="validatePassword(this);" name="new_password" placeholder="New Password" id="new_password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Conform Password :</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="password" class="form-control" maxlength="8" oninput="validatePassword(this);" name="conform_password" placeholder="Conform Password" id="conform_password" >
                                        <p><span id="changepasserror" class=""></span></p>
                                    </div>
                                </div>
                                <div class="form-group row" style="text-align: center">
                                    <input type="submit" value="UPDATE" class="btn btn-success" onclick="return valid_chagepass()">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="shifting_information">
                            <form action="<?= site_url() ?>vendor-shifting" method="POST" id="vendor-shifting">
                                <div class="form-group">
                                    <label>Starting Location</label>
                                    <input type="text" class="form-control" name="starting_location" id="from_loc" value="<?= !empty($details['starting_location']) ? $details['starting_location'] :set_value('starting_location'); ?>">
                                    <span class="help-block"><?php echo form_error('starting_location'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>End Location</label>
                                    <input type="text" class="form-control" name="end_location" id="to_loc" value="<?= !empty($details['end_location']) ? $details['end_location'] :set_value('end_location'); ?>">
                                    <span class="help-block"><?php echo form_error('starting_location'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Select Vehicle</label>
                                    <select name='vehicle_id'  class="form-control">
                                        <option disabled="disabled" selected="selected">Select Vehicle</option>
                                        <?php foreach ($vehicle_services_list as $value) { ?>
                                            <option value="<?= $value['id']?>" <?= set_select('vehicle_id',$value['id']); ?> ><?= $value['vehicle_name']?></option> 
                                        <?php }?>
                                    </select>
                                </div>
                                <span class="help-block"><?php echo form_error('vehicle_id'); ?></span>
                                <div class="row" style="text-align: center">
                                    <input type="submit" value="UPDATE" class="btn btn-success" onclick="return valid_chagepass()">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" style="margin-bottom: 0">
                <div class="panel-body" style="padding: 0 15px 0 15px">
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="button" class="close" style="margin-top: 5px" data-dismiss="modal" aria-label="Close">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            <div class="login">
                                <div class="mt-tab-top-nav" >
                                    <div class="tab-content" style="padding-bottom: 0" >
                                        <div role="tabpanel" class="tab-pane fade active in" id="enqiry" data-ng-controller="userlogin">
                                            <form id="login-form" method="post" role="form" >
                                                <h3>Booking Details</h3>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Pickup Point</strong></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="pickuppoint"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Pickup Address</strong></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="pickupAddress"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Pickup Landmark</strong></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="pickupLandmark"></span></br>
                                                </div>

                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Pickup Pincode</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="pickupPincode"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Drop Point</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="dropPoint"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Drop Address</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="dropAddress"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Drop Pincode</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="dropPincode"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Booking Datetime</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="inquery_datetime"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Km</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="inquery_km"></span></br>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4">
                                                    <strong>Price</strong>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 col-md-8">
                                                    <span id="inquery_Price"></span></br>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 0">

                                                    <div class="col-md-2 pull-right">
                                                        <input type="submit" name="login-submit" data-dismiss="modal" id="login-submit" tabindex="4" class="btn btn-sm pull-right" value="Back">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

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
    /**
     * Comment
     */
    $(document).ready(function () {
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
    });
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
                    $('#alert-msg-show').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i>  Your order has been placed successfully. Our support team will contact soon for order confirmation. <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('.alert').fadeIn().delay(3000).fadeOut(function () {
                        $(this).remove();
                    });
                }else{
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    $('#alert-msg-show').parent().before('<div class="alert alert-danger"><i class="fa fa-check-circle"></i>  Someting went wrong. Please try again...! <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('.alert').fadeIn().delay(3000).fadeOut(function () {
                        $(this).remove();
                    });
                }
                setTimeout(function(){ 
                    location.reload();
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
    function showEnquiry(id) {
        var controller = 'User_controller/ShowEnquiry';
        var url = '<?php echo site_url(); ?>';

        data = {'id': id};

        $.ajax({
            'url': url + controller,
            'type': 'POST',
            'dataType': 'html',
            'data': data,
            'success': function (data) {
                var enquiry = jQuery.parseJSON(data);
                $('#pickuppoint').text(enquiry.pickuppoint);
                $('#pickupAddress').text(enquiry.pickupAddress);
                $('#pickupLandmark').text(enquiry.pickupLandmark);
                $('#pickupPincode').text(enquiry.pickupPincode);
                $('#dropPoint').text(enquiry.dropPoint);
                $('#dropAddress').text(enquiry.dropAddress);
                $('#dropPincode').text(enquiry.dropPincode);
                $('#inquery_datetime').text(enquiry.BookingDate);
                $('#inquery_km').text(enquiry.total_distance);
                $('#inquery_Price').text(enquiry.total_amount);
            }
        });
    }
    function valid_chagepass() {
        var flag = true;
        if ($('#old_password').val() == "") {
            $('#old_password').css('border-color', '#ef4040');
            flag = false;
        }

        if ($('#new_password').val() == "") {
            $('#new_password').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#conform_password').val() == "") {
            $('#conform_password').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#conform_password').val() != $('#new_password').val()) {
            $('#new_password').css('border-color', '#ef4040');
            $('#conform_password').css('border-color', '#ef4040');
            flag = false;
        }
        var input = $("#new_password").val();
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}$/;
        if (!input.match(passw))
        {
            $('#new_password').css('border-color', '#ef4040');
            $('#conform_password').css('border-color', '#ef4040');
            $('#changepasserror').text('Password Must be 6 to 8 characters which contain at least one numeric digit, one uppercase and one lowercase letter!');
            $('#changepasserror').addClass('text-danger');
            flag = false;
        }

        if (flag) {
            var controller = 'User_controller/checkpassword';
            var url = '<?php echo site_url(); ?>';

            data = {'oldpass': $('#old_password').val()};
            $.ajax({
                'url': url + controller,
                'type': 'POST',
                'dataType': 'html',
                'data': data,
                'success': function (data) {
                    if (data == 1) {
                        $("#change_pass").submit();
//                                                            flag = true;
                    }
                    else {
                        $('#old_password').css('border-color', '#ef4040');
                        flag = false;
                    }
                }
            });

        }

//                                            flag = false;
        return false;

    }
    function valid() {
        var flag = true;
        if ($('#email').val() == "") {
            $('#email').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#mobileno').val() == "") {
            $('#mobileno').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#street').val() == "") {
            $('#street').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#landmark').val() == "") {
            $('#landmark').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#city').val() == "") {
            $('#city').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#pincode').val() == "") {
            $('#pincode').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#state').val() == "") {
            $('#state').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#country').val() == "") {
            $('#country').css('border-color', '#ef4040');
            flag = false;
        }
        return flag;
    }


</script>
<script>
    function validatePassword(e) {
        //updated by neeta
        var textInput = e.value;
        textInput = textInput.replace(/[^A-Za-z/0-9\-@_.!$%^&*()=+|\ ]/g, "");
        e.value = textInput;

        //end
    }
</script>
<style>

    .tabs-left, .tabs-right {
        border-bottom: none;
        padding-top: 2px;
    }
    .tabs-left {
        border-right: 1px solid #ddd;
    }
    .tabs-right {
        border-left: 1px solid #ddd;
    }
    .tabs-left>li, .tabs-right>li {
        float: none;
        margin-bottom: 2px;
    }
    .tabs-left>li {
        margin-right: -1px;
    }
    .tabs-right>li {
        margin-left: -1px;
    }
    .tabs-left>li.active>a,
    .tabs-left>li.active>a:hover,
    .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
    }

    .tabs-right>li.active>a,
    .tabs-right>li.active>a:hover,
    .tabs-right>li.active>a:focus {
        border-bottom: 1px solid #ddd;
        border-left-color: transparent;
    }
    .tabs-left>li>a {
        border-radius: 4px 0 0 4px;
        margin-right: 0;
        display:block;
    }
    .tabs-right>li>a {
        border-radius: 0 4px 4px 0;
        margin-right: 0;
    }
    .vertical-text {
        margin-top:50px;
        border: none;
        position: relative;
    }
    .vertical-text>li {
        height: 20px;
        width: 120px;
        margin-bottom: 100px;
    }
    .vertical-text>li>a {
        border-bottom: 1px solid #ddd;
        border-right-color: transparent;
        text-align: center;
        border-radius: 4px 4px 0px 0px;
    }
    .vertical-text>li.active>a,
    .vertical-text>li.active>a:hover,
    .vertical-text>li.active>a:focus {
        border-bottom-color: transparent;
        border-right-color: #ddd;
        border-left-color: #ddd;
    }
    .vertical-text.tabs-left {
        left: -50px;
    }
    .vertical-text.tabs-right {
        right: -50px;
    }
    .vertical-text.tabs-right>li {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .vertical-text.tabs-left>li {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }
</style>
<?php include_once("analyticstracking.php") ?>