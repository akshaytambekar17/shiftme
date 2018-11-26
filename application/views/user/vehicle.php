<?php ?>
<style>
 .navbar-inverse .navbar-nav > li > a { color:#fff;}
 </style>
<!--<div class="mg-page-title parallax" style="background-image: url(<?= USERASSETS?>images/slide1.jpg); background-position-y: -350%;">-->

<!--    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                <div class="area-title text-center wow fadeIn">
                    <h2>Our Service</h2>
                    <p>The best part of a successful Shift is flawless logistics during the Shifting process. The following steps are taken to ensure that you are satisfied with your Shifting</p>
                </div>
            </div>
        </div>
    </div>-->
<!--</div>-->
<!--Our services-->
<section>
<!--    <div class="mg-best-vehicle section-md-50">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Vehicle Service</h2>
                        <p class="wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">We offer customized logistics solutions for individuals and enterprises to suit their
                                requirements. We have different sized vehicles from Tata ace, Piaggio Ape, Pick-up, Tata 407, Mahindra Champion, Eicher 14 feet, 17 feet and 19 feet trucks and many more as per the
                                requirements of our customers with a standardized and economical pricing. Our customers do not need to haggle for the rates with the drivers anymore.
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <div class="container section-md-50">
        <div class="row">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>Price Chart</h2>
                    </div>
                </div>
            </div>
<!--            <div class="mg-sec-title">
                <h2 style="font-weight: 600;color: #71747b;">Price Chart</h2>
            </div>-->
            <div class="col-md-12">
                <div class="mg-tab-top-nav">
                    <ul class="nav nav-tabs nav-justified" role="tablist">

                        <li role="presentation" class="active"><a href="#0" aria-controls="piaggio" role="tab" data-toggle="tab"><?php echo $services[0]->vehicle_name; ?></a></li>
                        <?php if (isset($services) && count($services) > 0) { ?>
                            <?php for ($i = 1; $i < count($services); $i++) { ?>
                                <li role="presentation"><a href="#<?= $i?>" aria-controls="<?= $i?>" role="tab" data-toggle="tab"><?php echo $services[$i]->vehicle_name; ?> </a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="0">

                            <div class="col-md-2"></div>
                            <div class="col-md-8"> <img src="<?=USERASSETS?>images/price.png" class="img-responsive "></div>
                            <div class="col-md-2"></div>
                            <div class="table table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center !important;">Parameters</th>
                                            <th style="text-align: center !important;">Charges</th>
                                            <th style="text-align: center !important;">Parameters</th>
                                            <th style="text-align: center !important;">Charges</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th width="30%">Base Fare</th>
                                            <td width="20%">Rs. <?php echo $services[0]->base_fare; ?> </td>
                                            <td width="30%">Per Km Charge</td>
                                            <td width="20%">Rs. <?php echo $services[0]->transit_charge; ?> /Km</td>
                                        </tr>
                                        <tr>
                                            <th>Free Waiting Minutes</th>
                                            <td>Free For <?php echo $services[0]->waiting_charge_per_minute; ?> Mins</td>
                                            <td>Waiting Charge per minute</td>
                                            <td>Rs. <?php echo $services[0]->free_waiting_minutes; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Capacity</th>
                                            <td><?php echo $services[0]->capacity; ?>KG</td>
                                            <td>Dimension</td>
                                            <td><?php echo $services[0]->dimension; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-md-12" style="padding-top: 20px; padding-bottom: 0px;" align="center"><i>Note:</i> Toll and Taxes are extra.</div>
                            </div>
                        </div>
                        <?php if (isset($services) && count($services) > 0) { ?>
                            <?php for ($i = 1; $i < count($services); $i++) { ?>
                                <div role="tabpanel" class="tab-pane fade" id="<?= $i?>">

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8"> <img src="<?=USERASSETS?>images/price.png" class="img-responsive"></div>
                                    <div class="col-md-2"></div>
                                    <div class="table table-responsive">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center !important;">Parameters</th>
                                                    <th style="text-align: center !important;">Charges</th>
                                                    <th style="text-align: center !important;">Parameters</th>
                                                    <th style="text-align: center !important;">Charges</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th width="30%">Base Fare</th>
                                                    <td width="20%">Rs. <?php echo $services[$i]->base_fare; ?>  </td>
                                                    <td width="30%">Per Km Charge</td>
                                                    <td width="20%">Rs. <?php echo $services[$i]->transit_charge; ?> /Km</td>
                                                </tr>
                                                <tr>
                                                    <th>Free Waiting Minutes</th>
                                                    <td>Free For <?php echo $services[$i]->waiting_charge_per_minute; ?> Mins</td>
                                                    <td>Waiting Charge per minute</td>
                                                    <td>Rs. <?php echo $services[$i]->free_waiting_minutes; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Capacity</th>
                                                    <td><?php echo $services[$i]->capacity; ?> KG</td>
                                                    <td>Dimension</td>
                                                    <td><?php echo $services[$i]->dimension; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="col-md-12" style="padding-top: 20px; padding-bottom: 0px;" align="center"><i>Note:</i> Toll and Taxes are extra.</div>
                                    </div>

                                </div>
                            <?php } ?>
                        <?php } ?>

                    </div>
                    <div class="col-md-12" style="padding: 20px;" align="center"><a class="btn btn-danger" data-toggle="modal" data-target="#inquery">Enquiry</a></div>
                </div>

            </div>

        </div>
    </div>
</section>



<!--End Our services-->



<!--login  Modal -->       
<div class="modal fade" id="inquery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; z-index: 999;" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="panel panel-primary" style="margin-bottom: 0">
                <div class="panel-body" style="padding: 0 15px 0 15px">
                    <div class="row">

                        <div class="col-xs-12 login-box">
                            <button type="button" class="close" style="margin-top: 5px" data-dismiss="modal" aria-label="Close">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            <div class="login">
                                <div class="mt-tab-top-nav" >

                                    <div class="tab-content" style="padding-bottom: 0" >
                                        <div role="tabpanel" class="tab-pane fade active in" id="home12">
                                            <form action="<?= site_url();?>quick-quote"  method="post" role="form" >
                                                <div class="row" >
                                                    <div class="col-md-3">
                                                        <label>Pickup Point</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group ">
                                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                                            <input type="text" class="form-control" name="pickupPoint" id="pickupPoint" placeholder="Pickup Point" ng-data-model="log.pickupPoint">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-md-3">
                                                        <label>Drop Point</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                                            <input type="text" class="form-control" name="dropPoint" id="dropPoint" placeholder="Drop off Point" ng-data-model="log.dropPoint">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 15px;">
                                                    <div class="col-md-3">
                                                        <label>Vehicle</label>
                                                    </div>
                                                    <script>$('.selectpicker').selectpicker({
                                                            style: 'btn-info',
                                                            size: 4
                                                        });</script>
                                                    <div class="col-md-9">
                                                        <select class="fontawesome-select selectpicker" style="color: #4b565b;box-shadow: none;width: 100%;padding: 8px 12px; height: 37px; border-color: #ced4d7; margin-bottom: 10px; border-radius: 1px;" name="vehicle" id="vehicle" ng-data-model="log.vehicle">
                                                            <option value="" disabled selected class='' style='margin-bottom: -2px;height: 37px'>&#xf0d1; &nbsp; Vehicles</option>
                                                            <?php foreach ($vehicle as $v) { ?>
                                                                <option style='padding: 6px;height: 37px' class='' value="<?php echo $v['id']; ?>">&#xf0d1; &nbsp; <?php echo $v['vehicle_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <input type="submit" name="submit" id="login-submit" tabindex="4" onclick="return inquery_valid()"  class="btn btn-primary" value="Check Now">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
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
<!--end login  Modal -->

<style>
    #pickupPoint1{position: absolute;
                  z-index: 999999;}
</style>
<script>
    function inquery_valid() {
        
        $('#pickupPoint').css('border-color', '#ced4d7');
        $('#dropPoint').css('border-color', '#ced4d7');
        $('#vehicle').css('border-color', '#ced4d7');
        var flag = true;
        if ($('#pickupPoint').val() == "") {
            $('#pickupPoint').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#dropPoint').val() == "") {
            $('#dropPoint').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#vehicle').val() == "" || $('#vehicle').val() == null) {
            $('#vehicle').css('border-color', '#ef4040');
            flag = false;
        }
        return flag;
    }
</script>
<?php include_once("analyticstracking.php") ?>