
<div class="mg-page-title parallax" style=" background-image: url(<?= USERASSETS ?>images/1-banner-Transports.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>My Account Details</h2>
                <!--                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>-->
            </div>
        </div>
    </div>
</div>

<div class="mg-about-features">
    <div class="container">
        <h2 class="mg-sec-left-title mytitle" style="font-weight: 600;color: #71747b;">My Account</h2>
        <p></p>
        <div class="row" style="min-height:300px;">
            <?php if ($this->session->flashdata('insert_msg')) { ?>
                <div class = "alert alert-success alert-dismissable">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times</button>
                    <?php echo $this->session->flashdata('insert_msg'); ?>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('error_msg')) { ?>
                <div class = "alert alert-danger alert-dismissable">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
                    <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
            <?php } ?>
            <div  class="col-sm-12 col-md-12 col-lg-12">

                <div class="col-xs-12 col-lg-3 col-md-3 col-sm-12">
                    <ul class="nav nav-tabs tabs-left">
                        <li class="active"> <a href="#profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#myorders" data-toggle="tab">My Order</a></li>
                        <li><a href="#myquotation" data-toggle="tab">My Quotation</a></li>
                        <li><a href="#myenquires" data-toggle="tab">My Enquires</a></li>
                        <li><a href="#settings" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-9 col-md-9 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">


                            <form action="<?= site_url() ?>User_controller/update_pro" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Email :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="email" class="form-control" name="email" placeholder="E-mail" id="email" value="<?= $result[0]['email'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Mobile No. :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="text" class="form-control" name="mobileno" placeholder="Mobile No." id="mobileno" value="<?= $result[0]['mobileno'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Street :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="text" class="form-control" name="street" placeholder="Street" id="street" value="<?= $result[0]['street'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Landmark :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="text" class="form-control" name="landmark" placeholder="Landmark" id="landmark" value="<?= $result[0]['landmark'] ?>">
                                    </div>
                                </div>
                                <div class="row">
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
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Pin Code :</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <input type="text" name="pincode" class="form-control" placeholder="Pin Code" id="pincode" value="<?= $result[0]['pincode'] ?>">
                                    </div>
                                </div>
                                <div class="row">
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
                                <div class="row">
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

                                <div class="row" style="text-align: center">
                                    <input type="submit" value="UPDATE" class="btn btn-success" onclick="return valid()">
                                </div>

                            </form>
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
                                                    <th>Pickup Point</th>
                                                    <th>Drop Point</th>
                                                    <th>Vehicle</th>
                                                    <th>Shifting Date</th>
                                                    <th>Status</th>
                                                    <th>Total Amount</th>
                                                    <th>Action</th>
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
                                                        <td><?= $value['starting_location']; ?></td>
                                                        <td><?= $value['delivery_location']; ?></td>
                                                        <td><?php
                                                                $vehicle = $this->user->getVehicleById($value['vehicle_id']);
                                                                echo $vehicle['vehicle_name'];
                                                            ?>
                                                        </td>
                                                        <td><?= $value['shifting_date']; ?></td>
                                                        <td><?= $value['status']; ?></td>
                                                        <td><?= $value['total_amount']; ?></td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-primary view-order" data-id="<?= $value['order_id'] ?>" name="view-order">View</a><br>
                                                            <a href="javascript:void(0)" class="btn btn-danger delete-order" data-id="<?= $value['order_id'] ?>" data-orderno="<?= $value['order_no']?>" name="delete-order" onclick="orderDelete(this)">Delete</a><br>
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
                                                    <th>Created at</th>
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
                                                                <td><?= $value['vehicle_id']; ?></td>
                                                                <td class="center"><?= $value['created_at']; ?></td>
                                                                <td>
                                                                    <a href="javascript:void(0)" class="btn btn-danger view-quotation" data-id="<?= $value['id'] ?>" name="delete_quotation" onclick="quotationDelete(this)">Delete</a><br><br>
                                                                    <a href="<?= base_url()?>quotation/view?id=<?= $value['id']?>" class="btn btn-primary delete-user" data-id="<?= $value['user_id'] ?>" name="view_quotation" >View Quotation</a><br>
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
                                                    <th>Action</th>
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
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-primary view-order" data-id="<?= $value['enquiry_id'] ?>" name="view-order">View</a>
                                                            <a href="javascript:void(0)" class="btn btn-danger delete-order" data-id="<?= $value['enquiry_id'] ?>" name="delete-enquiry" onclick="enquiryDelete(this)">Delete</a><br>
                                                        </td>
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
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Old Password :</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="password" class="form-control" name="old_password" placeholder="Old Password" id="old_password" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>New Password :</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="password" class="form-control" maxlength="8" oninput="validatePassword(this);" name="new_password" placeholder="New Password" id="new_password" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <label>Conform Password :</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="password" class="form-control" maxlength="8" oninput="validatePassword(this);" name="conform_password" placeholder="Conform Password" id="conform_password" >
                                        <p><span id="changepasserror" class=""></span></p>
                                    </div>
                                </div>
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
<script>
    /**
     * Comment
     */
    $('.myquotation-table').dataTable({
        "aaSorting": [[0, "desc"]],
    });
    $('.myenquires-table').dataTable({
        "aaSorting": [[0, "desc"]],
    });
    $('.myorders-table').dataTable({
            "aaSorting": [[0, "desc"]],
        });
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