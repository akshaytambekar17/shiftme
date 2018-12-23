<script src="<?= base_url()?>assets/themenew/js/vendor/jquery-1.12.4.min.js"></script>

<!--<div class="mg-page-title parallax" style=" background-image: url(<?= USERASSETS ?>/images/office-relocation-compressed-1500x630.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>request a free quote</h2>
                                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>
    </div>
</div>-->
<style>
    /*Qoute section*/
    #map-section{padding: 40px 0;background: rgba(128, 128, 128, 0.08)}
    .mymap{
        box-shadow: 0 0 8px 1px rgba(0, 0, 0, 0.4);
        background: #fff;
        padding: 15px;
        position: relative;
    }
    .mymap .title{color: #636467;margin-top: 0;font-size: 26px;}
    /*form styles*/
    .wizard {
        margin: 5px auto;
        background: #fff;
    }

    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

/*    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 50%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }*/
.wizard-inner .nav.nav-tabs {
    position: relative;
}

.wizard-inner .nav.nav-tabs::after {
    content: '';
    position: absolute;
    height: 1px;
    width: 100%;
    border: 1px solid #e0e0e0;
    top: 43px;
}

    .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 45px;
        height: 45px;
        line-height: 45px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 20px;
    }
    span.round-tab i{
        color:#555555;
    }
    .wizard li.active span.round-tab {
        background: rgba(0, 96, 167, 0.81);
        color: white;
        border: 2px solid rgba(0, 96, 167, 0.81);

    }
    .wizard li.active span.round-tab i{
        color: #5bc0de;
    }

    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }

    .wizard .nav-tabs > li {
        width: 16%;
    }





    .wizard .nav-tabs > li a {
        width: 45px;
        height: 45px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
    }

    .wizard h3 {
        margin-top: 0;
    }

    #map-section .title p,#map-section .que p{margin-bottom:0}
    #map-section .mg-contact-info p,#map-section label{ 
        color: #848a96;
        font-size: 17px;
        line-height: 25px;
        margin-bottom: 5px; 
        font-weight: 600;
    }
    @media( max-width : 585px ) {

        .wizard {
            width: 90%;
            height: auto !important;
        }
        #map-section .container{padding: 0}
        span.round-tab {
            font-size: 16px;
            width: 40px;
            height: 40px;
            line-height: 40px;
        }

        .wizard .nav-tabs > li a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin: 13px auto;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }
    .estimate{ 
        border: 1px solid rgba(128, 128, 128, 0.41);
        padding: 15px;
        margin-top: 30px;
        background: aliceblue;}
    .msg .modal-header{ border-bottom: 1px solid transparent;} 
    .msg .modal-body{text-align: center;
                     font-size: 18px;
                     color: #58a5de;
                     font-weight: 600;}
    .has-error{
        color:red;
    }
    .has-error-text{
        border-color:red;
    }
</style>
<section id="map-section">
    <div class="container">
        <div class="row mymap">
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
            <div class="col-md-6 ">
                <div id="dvDistance"></div>
                <div class="estimate">
                    <p class="title">Estimate :</p>

                    <div class="">Estimated Distance&nbsp;:&nbsp;<span id='Distancekm'>0 km</span></div>
                    <div class="">Estimated Duration&nbsp;:&nbsp;<span id='Durationtime'></span> (60 mins free after that <i class="fa fa-inr"></i>&nbsp;<?= $selvehical[0]['free_waiting_minutes'] ?>)</div>
                    <div class="">First 3km free can apply for 10 km and more</div>
                    <div class="">Charge Per Km.&nbsp;:&nbsp;<i class="fa fa-inr"></i>&nbsp;<span id='ChargesAfter'><?= $selvehical[0]['transit_charge'] != "" ? $selvehical[0]['transit_charge'] : "0" ?></span></div>
                    <div class="">Base Fare&nbsp;:&nbsp;<i class="fa fa-inr"></i>&nbsp;<span id='base_fare' class="chg_fare"><?= $selvehical[0]['base_fare'] != "" ? $selvehical[0]['base_fare'] : "0" ?></span></div>
                    <div class="">Total&nbsp;:&nbsp;<i class="fa fa-inr"></i>&nbsp;<span id="totalcharge">0</span><span></span></div>

                </div>

                <div id="dvMap" style=" height:646px;width:auto; ">
                </div>
            </div>
            <div class="col-md-6">
                <!--                        <h2 class="mg-sec-left-title">Send an E-mail</h2>-->
                <div class="row">
                    <section>
                        <div class="title" style="padding-top: 5%" id="qouttitle1"> <p>Fill the details </p></div>
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">

                                    <li role="presentation" id="stepone" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                            <span class="round-tab">
                                                1
                                            </span>

                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                            <span class="round-tab">
                                                2
                                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                            <span class="round-tab">
                                                3
                                            </span>
                                        </a>
                                    </li>
<!--                                    <li role="presentation" id="complete_1" class="disabled">-->
                                    <li role="presentation" id="complete_1" class="disabled">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                                            <span class="round-tab">
                                                4
                                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                            <span class="round-tab">
                                                5
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <form role="form" id="myform" method="POST" action="<?= site_url('quick-quote')?>">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <div>
<!--                                            <ul class="mg-contact-info" style="margin: 0">
                                                <li class="row"><i class="fa fa-map-marker col-xs-1"></i><p class="col-xs-9"> Starting Address</p></li>
                                            </ul>-->
                                                <div class="form-group">
                                                    <label>Starting Location</label>
                                                    <input type="text" class="form-control" name="starting_location" id="txtSource" value="<?= !empty($details['pickupPoint']) ? $details['pickupPoint'] :set_value('starting_location'); ?>" readonly>
<!--                                                    <textarea rows="4" name="starting_address" id="starting_address"><?php echo !empty($quotation_data['starting_address'])?$quotation_data['starting_address']:set_value('starting_address'); ?></textarea>-->
                                                    <span class="help-block"><?php echo form_error('starting_location'); ?></span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"  name="starting_address" id="starting_address" placeholder="Address" value="<?= set_value('starting_address');?>">
                                                    <span class="help-block"><?php echo form_error('starting_address'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Land Mark</label>
                                                    <input type="text" name="starting_landmark" id="starting_landmark" class="form-control" value="<?php echo set_value('starting_landmark'); ?>" placeholder="Land mark" />
                                                    <span class="help-block"><?php echo form_error('starting_landmark'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="text" name="starting_pincode" id="starting_pincode" class="form-control" value="<?php echo !empty($details['pickupzip'])?$details['pickupzip']:set_value('starting_pincode'); ?>" placeholder="Pincode" />
                                                    <span class="help-block"><?php echo form_error('starting_pincode'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Delivery Location</label>
                                                    <input type="text" class="form-control" name="delivery_location" id="txtDestination" value="<?= !empty($details['dropPoint']) ? $details['dropPoint'] :set_value('delivery_location'); ?>" readonly>
                                                    <span class="help-block"><?php echo form_error('delivery_location'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"  name="delivery_address" id="delivery_address" placeholder="Address" value="<?= set_value('delivery_address');?>">
                                                    <span class="help-block"><?php echo form_error('delivery_address'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Land Mark</label>
                                                    <input type="text" name="delivery_landmark" id="delivery_landmark" class="form-control" value="<?php echo !empty($quotation_data['delivery_landmark'])?$quotation_data['delivery_landmark']:set_value('delivery_landmark'); ?>" placeholder="Land mark" />
                                                    <span class="help-block"><?php echo form_error('delivery_landmark'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                    <input type="text" name="delivery_pincode" id="delivery_pincode" class="form-control" value="<?php echo !empty($details['dropzip'])?$details['dropzip']:set_value('delivery_pincode'); ?>" placeholder="Pincode" />
                                                    <span class="help-block"><?php echo form_error('delivery_pincode'); ?></span>
                                                </div>
                                            
<!--                                            <div class="mg-contact-form-input requared">
                                                <input type="text" class="form-control"  name="picAddress" id="picAddress" placeholder="Address">
                                            </div>-->

<!--                                            <div class="mg-contact-form-input requared">

                                                <input class="form-control" id="txtSource"  name="pickuppoint" type="text" placeholder="Pune Station..." readonly value="<?php
                                                if (!empty($details)) {
                                                    echo $details['pickupPoint'];
                                                }
                                                ?>">

                                            </div>-->
                                                
<!--                                            <label class="col-md-3"  style="padding-right: 0px ; padding-left: 0px !important;">Landmark</label>
                                            <div class="mg-contact-form-input requared">
                                                <input type="text" class="form-control"  name="picklandmark" id="picklandmark" placeholder="Landmark">
                                            </div>
                                            <div class="mg-contact-form-input" >
                                                <label class="col-md-3"  style="padding-right: 0px ; padding-left: 0px !important;">Pin code</label>
                                                <div class="col-md-5" style="padding-right: 0px ; padding-left: 0px !important;">
                                                    <input class="form-control" name="pickpincode" id="focusedInputs"  type="text" value="<?php
                                                    if (!empty($details)) {
                                                        echo $details['pickupzip'];
                                                    }
                                                    ?>"  >

                                                </div>
                                            </div>-->
                                            
<!--                                            <ul class="mg-contact-info" style="margin-bottom: 0">
                                                <li class="row"><i class="fa fa-map-marker col-xs-1" ></i><p class="col-xs-9"> Delivery Address</p></li>
                                            </ul>
                                            <div class="mg-contact-form-input requared">
                                                <input class="form-control" name="dropAddress"  id="dropAddress" type="text" placeholder="Address" >
                                            </div>
                                            <div class="mg-contact-form-input requared">

                                                <input class="form-control" name="droppoint" id="txtDestination"  type="text" placeholder="Pune Station..." readonly value="<?php
                                                if (!empty($details)) {
                                                    echo $details['dropPoint'];
                                                }
                                                ?>">

                                            </div>
                                            <div class="mg-contact-form-input">
                                                <label class="col-md-3 control-label"  style="padding-right: 0px ; padding-left: 0px !important;">Pin code</label>
                                                <div class="col-md-5"  style="padding-right: 0px ; padding-left: 0px !important;">

                                                    <input class="form-control" name="dropPincode" id="focusedInputs"  type="text" value="<?php
                                                    if (!empty($details)) {
                                                        echo $details['dropzip'];
                                                    }
                                                    ?>" >

                                                </div>
                                            </div>-->
                                        </div>
                                        <ul class="list-inline">
                                            <li><button type="button" class="btn btn-primary next-step" onclick="return validStep1()">Save and continue</button></li>

                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <div>
                                            <div class="panel-body">
                                                <ul class="mg-contact-info" style="margin: 0">
                                                    <li class="row"><i class="fa fa-truck col-xs-1"></i>
                                                        <p class="col-xs-9" style="color:#040506">Select Vehicle</p></li>
                                                </ul>

                                                <select id="Vehiclesdetails"  name="vehicle_id" class="fontawesome-select form-control " onchange="get_vehicle_details()" style="    height: 35px;">
                                                    <option disabled="disabled" selected="selected">Select Vehicle</option>
                                                    <?php foreach ($vehicle as $v) { ?>
                                                        <option value="<?php echo $v['id']; ?>"  <?= $selvehical[0]['id'] == $v['id'] ? 'selected' : '' ?>> <?php echo $v['vehicle_name']; ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="pr-price d1">
                                                    <span >
                                                        <img  src="<?php echo $selvehical[0]['image'] ?>" class="img-responsive" id='vehicle_img'>
                                                    </span>

                                                    <div class="text-center truck_info" >
                                                        <ul style="list-style-type: none;">
                                                            <li style="color:#040506">Base Fare&nbsp;:&nbsp;<i class="fa fa-inr"></i>&nbsp;<span class="chg_fare">300</span></li>
                                                            <li style="color:#040506">Charge Per Km&nbsp;:&nbsp;<i class="fa fa-inr"></i>&nbsp;<span class="chg_km">20</span></li>
                                                            <li style="color:#040506">Waiting Charge&nbsp;:&nbsp;<i class="fa fa-inr"></i>&nbsp;<span class="wait_chg">3</span>/Min</li>
                                                        </ul>
                                                        <!-- <img src="" alt=""/>-->
                                                    </div>
                                                </div>
                                                <span class="help-block"><?php echo form_error('vehicle_id'); ?></span>
                                                <br><br>
                                                <div class="form-group">`
                                                    <label>No. of Labour</label>
                                                        <select id="Labour"  name="labour" class="fontawesome-select form-control cd-select">
                                                            <option disabled="disabled">Select Labour</option>
                                                            <option value="1" selected="selected" >1</option>
                                                            <option value="2" >2</option>
                                                            <option value="3" >3</option>
                                                            <option value="4" >4</option>
                                                            <option value="5" >5</option>
                                                            <option value="6" >6 +</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline">
                                            <li><button type="button" class="btn btn-primary prev-step">Previous</button></li>
                                            <li style="padding-top: 1%;"><button type="button" class="btn btn-primary next-step" onclick="return validStep2()">Save and continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="subject">Check Product List</label>
                                            </div>
                                            <?php if(!empty($product_list) && count($product_list)>0){
                                                    $count = 1;
                                                    foreach($product_list as $value){
                                                        $checked = '';
                                                        $quantity = '';
                                            ?>
                                                    <div class="col-md-12">
                                                        <div class="form-group col-md-8">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" value="<?= $value['id']?>" class="product-list" name="ProductListName[]" id="product-list-<?= $count?>" <?= $checked?> data-count="<?= $count?>" ><?= $value['name']?></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">

                    <!--                                            <button class="btn" onclick="quantitybtn(this)" id="plus-<?= $count?>" >+</button>-->
                                                            <input type="text" name="ProductListQuantity[]" value = "<?= $quantity?>" id="product-list-qty-<?= $count?>" class="product-list-qty form-control" placeholder="Qty" oninput="numberValidation(this)" data-count='<?= $count?>'>
                                                            <span id="qty-span-<?= $count?>"></span>
                    <!--                                            <button class="btn" onclick="quantitybtn(this)" id="minus-<?= $count?>" >-</button>-->

                                                        </div>
                                                    </div>
                                            <?php $count++; } }?>
                                            <br>
                                        </div>
                                        <span id="error-msg"></span>
                                        
                                        <ul class="list-inline">
                                            <li><button type="button" class="btn btn-primary prev-step">Previous</button></li>
                                            <li style="padding-top: 1%;"><button type="button" class="btn btn-primary btn-info-full next-step" onclick="return validStep3()">Save and continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Shifting Amount</label>
                                                    <input type="text" name="total_amount" id="total_amount" class="form-control" value="<?php echo set_value('total_amount'); ?>" readonly />
                                                    <span class="help-block"><?php echo form_error('total_amount'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Shifting Date</label>
                                                    <div class="input-group date mg-check-in  focus">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" class="form-control datepicker" name="shifting_date"  id="bookingdate" placeholder="00/00/0000">
                                                    </div>
                                                </div>
                                                <p>Book at least 90 min prior.</p>
                                                <span class="help-block"><?php echo form_error('shifting_date'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Select Time Slots</label>
                                                    <select id="time_slots_id"  name="time_slots_id" class="fontawesome-select form-control">
                                                        <option disabled="disabled" selected="selected">Select Time Slots</option>
                                                        <?php foreach ($timeslots_list as $time) { ?>
                                                            <option value="<?= $time['id']; ?>"> <?php echo $time['time']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <p>Book at least 90 min prior.</p>
                                                <span class="help-block"><?php echo form_error('time_slots_id'); ?></span>
                                            </div>
                                        </div>
                                        <br>
<!--                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="que">
                                                    <p>Do you need a professional packing?  </p>
                                                </div>
                                                <div class="text-left">
                                                    <label><input type="radio" name="packer" id="radio3" value="1">Yes</label> 
                                                    <label><input type="radio" name="packer" id="radio4" value="0" checked="">no</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="que">
                                                    <p>Do  you need storage facilities? </p>
                                                </div>
                                                <div class="text-left">
                                                    <label><input type="radio" name="storage" id="radio3" value="1">Yes</label> 
                                                    <label><input type="radio" name="storage" id="radio4" value="0" checked="">no</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="que">
                                                    <p>Do you need shifting of your vehicle also? </p>
                                                </div>
                                                <div class="text-left">
                                                    <label><input type="radio" name="vehicle_shifting" id="radio3" value="1">Yes</label> 
                                                    <label><input type="radio" name="vehicle_shifting" id="radio4" value="0" checked="">no</label>
                                                </div>
                                            </div>
                                        </div>-->
                                        <ul class="list-inline">
                                            <li><button type="button" class="btn btn-primary prev-step">Previous</button></li>
                                            <li style="padding-top: 1%;"><button type="button" class="btn btn-primary btn-info-full next-step" onclick="return validStep4()">Save and continue</button></li>
                                        </ul>

                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="complete">
                                        <div class="row" style="padding-left: 20px; padding-right: 20px">
                                            <label>We need your mobile number to confirm the booking</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text"  class="form-control" name="fullname" id="fullname" placeholder="Full Name" value="<?= !empty($userDetails['fullname'])?$userDetails['fullname']: set_value('fullname')?>">
                                                    <span class="help-block"><?php echo form_error('fullname'); ?></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control"  id="mobileNo" name="mobile_no" maxlength="10" type="text" placeholder="Mobile No." oninput="validateNumber(this);" value="<?= !empty($userDetails['mobileno'])?$userDetails['mobileno']:set_value('mobile_no')?>">
                                                    <span class="help-block"><?php echo form_error('mobile_no'); ?></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control"  id="email" name="email_id" type="email" placeholder="Email Address" value="<?= !empty($userDetails['email'])?$userDetails['email']:set_value('email_id')?>">
                                                    <span class="help-block"><?php echo form_error('email_id'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline">
                                            <li><button type="button" class="btn btn-primary prev-step">Previous</button></li>
                                            <li style="padding-top: 1%;">
                                                <input type="submit" value="Get Quotation" class="btn btn-success btn-info-full next-step" onclick="return validStep5()" name="quote" <?= empty($userDetails)?'disabled':''?> >
<!--                                                <button type="submit" name="quote" class="btn btn-primary btn-info-full next-step" onclick="return validStep5()" data-toggle="modal" data-target="#msg">Get Quotation</button>-->
                                            </li>
                                            <li style="padding-top: 1%;">
                                                <input type="submit" value="Make Order" class="btn btn-danger btn-info-full next-step" onclick="return validStep5()" name="quote" <?= empty($userDetails)?'disabled':''?>>
<!--                                                <button type="submit" name="order" class="btn btn-primary btn-info-full next-step" onclick="return validStep5()" data-toggle="modal" data-target="#msg">Make Order</button>-->
                                            </li>
                                        </ul>
                                        <?php if(empty($userDetails)) { ?>
                                            <p style="color:red">Please login to Get Quotation or Make Order</p>
                                        <?php }?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</section>


<script type="text/javascript">


    var source, destination;
    var perkm = "<?= $selvehical[0]['transit_charge'] ?>";
    var bf = "<?= $selvehical[0]['base_fare']?>";
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    function GetRoute() {
        new google.maps.places.SearchBox(document.getElementById('txtSource'));
        new google.maps.places.SearchBox(document.getElementById('txtDestination'));
        directionsDisplay = new google.maps.DirectionsRenderer({'draggable': true});
        var mumbai = new google.maps.LatLng(18.9750, 72.8258);
        var mapOptions = {
            zoom: 7,
            center: mumbai
        };
        map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
        directionsDisplay.setMap(map);
//                    directionsDisplay.setPanel(document.getElementById('dvPanel'));

        //*********DIRECTIONS AND ROUTE**********************//

        var source = document.getElementById("txtSource").value;
        var destination = document.getElementById("txtDestination").value;
        var request = {
            origin: source,
            destination: destination,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });


        //*********DISTANCE AND DURATION**********************//
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
            origins: [source],
            destinations: [destination],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        }, function (response, status) {
            if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {

                var distance = response.rows[0].elements[0].distance.text;
                var duration = response.rows[0].elements[0].duration.text;
                var Distancekm = document.getElementById("Distancekm");
                Distancekm.innerHTML = "";
                Distancekm.innerHTML = distance;
                var Durationtime = document.getElementById("Durationtime");
                Durationtime.innerHTML = "";
                Durationtime.innerHTML = duration;
                if (distance != "") {
                  // p = distance.replace(' km', '');
                   p = distance.replace(' km', '');
//                    if (p <= 3) {
//                        p = 0;
//                    }
                    if (p > 10) {
                        p = p - 3;
                    }
                    if(perkm==""){
                        perkm=0;
                    }
                    if(bf==""){
                        bf=0;
                    }
                    total = (parseFloat(p) * parseFloat(perkm)) + parseFloat(bf);
                    var totalamount = document.getElementById("totalcharge");
                    totalamount.innerHTML = "";
                    totalamount.innerHTML = total;
                    $('#total_amount').val(total);
                    $('#total_distance').val(p);
//                                                                 alert(total);
                }
//                                                            parseFloat(p);

            } else {
                alert("Unable to find the distance via road.");
            }
        });
    }



</script>

<script>
    $(document).ready(function () {
        GetRoute();
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
//        if (sessionStorage.getItem('step1') != null) {
//            obj = JSON.parse(sessionStorage.getItem('step1'));
//            console.log(JSON.parse(sessionStorage.getItem('step1')));
//            $('#picAddress').val(obj.picAddress);
//            $('#txtSource').val(obj.txtSource);
//            $('#pickpincode').val(obj.pickpincode);
//            $('#picklandmark').val(obj.picklandmark);
//            $('#dropAddress').val(obj.dropAddress);
//            $('#txtDestination').val(obj.txtDestination);
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//        }
//        if (sessionStorage.getItem('step2') != null) {
//            obj2 = JSON.parse(sessionStorage.getItem('step2'));
//            $('#Vehiclesdetails').val(obj2.Vehiclesdetails);
//            $('#Labour').val(obj2.Labour);
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//        }
//        if (sessionStorage.getItem('step3') != null) {
//            obj2 = JSON.parse(sessionStorage.getItem('step3'));
//            $('.product-list').val(obj2.product-list);
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//        }
//        if (sessionStorage.getItem('step4') != null) {
//            obj4 = JSON.parse(sessionStorage.getItem('step4'));
//            $('#bookingdate').val(obj4.bookingdate);
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//        }
//        var Uid = '<?php echo $this->session->userdata('uid') ?>';
//        if (sessionStorage.getItem('step5') != null) {
//            obj5 = JSON.parse(sessionStorage.getItem('step5'));
//            $('#fullname').val(obj5.fullname);
//            $('#email').val(obj5.email);
//            $('#mobileNo').val(obj5.mobileNo);
//
//        }
//
//        if (Uid != null && sessionStorage.getItem('step5') != null) {
//    
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//
//            var logoutTimer = setTimeout(function () {
//                sessionStorage.clear();
////                window.location.href = site_url;
//            }, (10 * 60 * 100));
////            }, (2 * 60 * 100));
////            data=sessionStorage.getItem('step5');
////            now = new Date();
////                expiration = new Date(data.timestamp);
////                expiration.setMinutes(expiration.getMinutes() + 2);
//        } 

    });

</script>

<script>



    function get_vehicle_details() {
        var id = $('#Vehiclesdetails').val();
        $.ajax({
            url: site_url + "User_controller/get_vehicleby_id/" + id,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function (data) {
                obj = jQuery.parseJSON(data);

                $('#vehicle_img').attr('src', obj.image);
                $('.chg_fare').text(obj.base_fare);
                $('.chg_km').text(obj.transit_charge);
                $('.wait_chg').text(obj.free_waiting_minutes);
//                $('#ChargesUpto').text(obj.transit_charge);
                $('#ChargesAfter').text(obj.transit_charge);
                distance = $('#Distancekm').text();
//                alert(distance);
                p = distance.replace(' km', '');
                if (p <= 3) {
                    p = 0;
                }
                if (p > 3) {
                    p = p - 3;
                }
//                alert(obj.base_fare);
                total = (parseFloat(p) * parseFloat(obj.transit_charge)) + parseFloat(obj.base_fare);
                var totalamount = document.getElementById("totalcharge");
                totalamount.innerHTML = "";
                totalamount.innerHTML = total;
                $('#total_amount').val(total);
            }
        });


    }
</script>

<script>
    function validateAlpha(e) {
        //updated by neeta
        var textInput = e.value;
        //var textInput = document.getElementById("cname").value;
        textInput = textInput.replace(/[^A-Za-z ]/g, "");
        e.value = textInput;
        //end
    }
    function validateNumber(e) {
        //updated by neeta
        var textInput = e.value;
        textInput = textInput.replace(/[^0-9\.]/g, "");
        e.value = textInput;
        //end
    }
</script>
<script>

    function validStep1() {

        var flag = true;
        if ($('#starting_address').val() == "") {
            $('#starting_address').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#txtSource').val() == "") {
            $('#txtSource').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#starting_pincode').val() == "") {
            $('#starting_pincode').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#starting_landmark').val() == "") {
            $('#starting_landmark').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#delivery_address').val() == "") {
            $('#delivery_address').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#delivery_landmark').val() == "") {
            $('#delivery_landmark').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#delivery_pincode').val() == "") {
            $('#delivery_pincode').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#txtDestination').val() == "") {
            $('#txtDestination').css('border-color', '#ef4040');
            flag = false;
        }
        if (flag) {
            sessionStorage.clear();
            var obj = {}
            obj.picAddress = $('#starting_address').val(),
            obj.txtSource = $('#txtSource').val(),
            obj.pickpincode = $('#starting_pincode').val(),
            obj.picklandmark = $('#starting_landmark').val(),
            obj.dropAddress = $('#deilvery_ddress').val(),
            obj.txtDestination = $('#txtDestination').val(),
            obj.delivery_pincode = $('#delivery_pincode').val(),
            obj.delivery_address = $('#delivery_address').val(),
            obj.delivery_landmark = $('#delivery_landmark').val(),

            sessionStorage.setItem('step1', JSON.stringify(obj));
//            console.log(sessionStorage.getItem('step1'));
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }

        return flag;

    }
    function validStep2() {

        var flag = true;
        if ($('#Vehiclesdetails').val() == "") {
            $('#Vehiclesdetails').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#Labour').val() == "") {
            $('#Labour').css('border-color', '#ef4040');
            flag = false;
        }

        if (flag) {
            var obj2 = {}
            obj2.Vehiclesdetails = $('#Vehiclesdetails').val(),
            obj2.Labour = $('#Labour').val()
            sessionStorage.setItem('step2', JSON.stringify(obj2));
//            console.log(sessionStorage.getItem('step2'));
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }

        return flag;
    }
    function validStep3() {
        var flag = true;
        var flagChecked = false;
        $(".product-list").each(function( index ) {
            var count = $(this).data('count');
            if($("#product-list-"+count).is(":checked")){
                flagChecked = true;
                var qty = $("#product-list-qty-"+count).val();
                if(qty==''){
                    $("#product-list-qty-"+count).addClass('has-error-text');
                    flag = false;
                }else{
                    $("#product-list-qty-"+count).removeClass('has-error-text');
                }
            }else{
                $("#product-list-qty-"+count).val('');
                $("#product-list-qty-"+count).removeClass('has-error-text');
            }
        });
        if(flag == true && flagChecked == true){
            $("#error-msg").text("");
            $("#error-msg").removeClass('has-error');
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
            return true;
        }else{
            $("#error-msg").text("Please select at least one product");
            $("#error-msg").addClass('has-error');
            return false;
        }
    }
    function validStep4() {

        var flag = true;
        if ($('#bookingdate').val() == "") {
            $('#bookingdate').addClass('has-error-text');
            flag = false;
        }else{
            $('#bookingdate').removeClass('has-error-text');;
        }
        if($("#time_slots_id").val() == "" || $("#time_slots_id").val() == null){
            $('#time_slots_id').addClass('has-error-text');
            flag = false;
        }else{
            $('#time_slots_id').removeClass('has-error-text');
        }
        
        if (flag) {
            var obj4 = {}
            obj4.bookingdate = $('#bookingdate').val()

            sessionStorage.setItem('step4', JSON.stringify(obj4));
//            console.log(sessionStorage.getItem('step4'));
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        return flag;
    }
    function validStep5() {

        var flag = true;
        if ($('#fullname').val() == "") {
            $('#fullname').addClass('has-error-text');
            flag = false;
        }else{
            $('#fullname').removeClass('has-error-text');
        }
        if ($('#mobileNo').val() == "") {
            $('#mobileNo').addClass('has-error-text');
            flag = false;
        }else{
            $('#mobileNo').removeClass('has-error-text');
        }
        len = $('#mobileNo').val();
        if (len.length != 10) {
            $('#mobileNo').addClass('has-error-text');
            flag = false;
        }else{
            $('#mobileNo').removeClass('has-error-text');
        }
        if ($('#email').val() == "") {
            $('#email').addClass('has-error-text');
            flag = false;
        }else{
            $('#email').removeClass('has-error-text');
        }
        var obj5 = {}
        obj5.fullname = $('#fullname').val(),
                obj5.mobileNo = $('#mobileNo').val(),
                obj5.email = $('#email').val()

        sessionStorage.setItem('step5', JSON.stringify(obj5));
        if (flag) {
            sessionStorage.clear();
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
        return flag;
    }
//    function validStep3() {
//
//        var flag = true;
//        if (flag) {
//            var $active = $('.wizard .nav-tabs li.active');
//            $active.next().removeClass('disabled');
//            nextTab($active);
//        }
//        return flag;
//    }
</script>
<script>
    $(document).ready(function () {

//Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();
//Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);
            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });
        $(".prev-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });
    });
    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
    $(function () {
        $('.pr-price').hide();
        $('.d1').show();
        $('#select').on("change", function () {
            $('.pr-price').hide();
            $('.d' + $(this).val()).show();
        }).val("1");
    });
</script>
<?php include_once("analyticstracking.php") ?>