<div class="mg-page-title parallax" style=" background-image: url(<?=USERASSETS?>images/office-relocation-compressed-1500x630.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>request a free quote</h2>
                <!--                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>-->
            </div>
        </div>
    </div>
</div>

<section class="section-70 section-md-50 section-bottom-110">
    <div class="container text-left">
        <h2 class="mg-sec-left-title div-bottom-5 text-center" style="font-weight: 600;color: #71747b;">REQUEST A QUICK QUOTE</h2>
        <p class="text-center"><strong>ShiftMe</strong> expert will shortly contact you to assess your needs and provide you with a customized and competitive quote. </p>
        <div class="range range-xs-center offset-top-50">

        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <form action="<?= site_url()?>User_controller/save_Quote" method="POST" class="clearfix col-md-10 contactform">
                    <div class=" requared col-md-6">
                        <label for="full-name">NAME</label>
                        <input type="text" class="form-control" name="name" id="full-name" oninput="validateAlpha(this);">
                    </div>
                    <div class=" col-md-6">
                        <label for="surname">SURNAME</label>
                        <input type="text" class="form-control" name="surname" id="surname" oninput="validateAlpha(this);">
                    </div>

                    <div class="requared  col-md-12">
                        <label for="subject">EMAIL</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>

                    <div class="col-md-6">
                        <label for="subject">From</label>
                        <div class="input-group ">
                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                            <input type="text" class="form-control" name="from_loc" id="from_loc">
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <label for="subject">To</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                            <input type="text" class="form-control" name="to_loc" id="to_loc">
                        </div>

                    </div>
                    
                    <div class=" col-md-6" style="margin-top: 10px">
                        <label for="subject">PHONE NO.</label>
                        <input type="text" class="form-control" name="phone" id="phone" oninput="validateNumber(this);" maxlength="10" required="">
                            <span id="phoneError" class=""></span>
                        <!--<input type="text" class="form-control" name="surname" id="surname" oninput="validateAlpha(this);">-->
                    </div>
<!--                    <div class="col-md-6" style="margin-top: 10px">
                        <label for="subject">PHONE NO.</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="phone" id="phone" oninput="validateNumber(this);" maxlength="10" required="">
                            <span id="phoneError" class=""></span>
                        </div>
                    </div>-->
                    <div class="col-md-6 " style="margin-top: 10px">
                        <label for="subject">SHIFTING DATE</label>
                        <div class="input-group date mg-check-in ">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control" id="shifting_date" name="shifting_date" placeholder="00/00/0000" required="">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row mt50">
                            <div class="col-md-7 que">
                                <p>Do you need a professional packers?  </p>
                            </div>
                            <div class="col-md-5">
                                <label><input type="radio" name="packer" id="radio3" value="1">Yes</label> 
                                <label><input type="radio" name="packer" id="radio4" value="0" checked="">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mt0">
                            <div class="col-md-7 que">
                                <p>Do you need storage facilities? </p>
                            </div>
                            <div class="col-md-5">
                                <label><input type="radio" name="storage" id="radio5" value="1">Yes</label> 
                                <label><input type="radio" name="storage" id="radio6" value="0" checked="">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mt0">
                            <div class="col-md-7 que">
                                <p>Do you need shifting of your vehicle also? </p>
                            </div>
                            <div class="col-md-5">
                                <label><input type="radio" name="vehicle_shifting" id="radio7" value="1">Yes</label> 
                                <label><input type="radio" name="vehicle_shifting" id="radio8" value="0" checked="">No</label>
                            </div>
                        </div>
                    </div>


                    <input type="submit" class="btn btn-dark-main pull-right" onclick="return valid()" value="Send">
                </form>
            </div>
        </div>
    </div>
</section>
<script>
                        function valid() {

                            var flag = true;
                            if ($('#full-name').val() == "") {
                                $('#full-name').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#surname').val() == "") {
                                $('#surname').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#email').val() == "") {
                                $('#email').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#from_loc').val() == "") {
                                $('#from_loc').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#to_loc').val() == "") {
                                $('#to_loc').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#phone').val() == "") {
                                $('#phone').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#shifting_date').val() == "") {
                                $('#shifting_date').css('border-color', '#ef4040');
                                flag = false;
                            }
                            if ($('#phone').val().length != 10 && $('#phone').val() != "") {
                                $('#phone').css('border-color', '#ef4040');
                                $('#phoneError').addClass('text-danger');
                                $('#phoneError').text('Contact No. Must Be 10 Digits');
                                flag = false;
                            }
                            return flag;
                        }

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
                            textInput = textInput.replace(/[^0-9]/g, "");
                            e.value = textInput;
                            //end
                        }
                        $(document).ready(function() {
                            $('.form-control').focus(function() {
                                var $parent = $(this).parent();
                                $parent.removeClass('text-danger');
                                $('span.text-danger', $parent).fadeOut();
                                $('#phone').css('border-color', 'rgb(206,212,215)');
                            });
                        });
</script>
<?php include_once("analyticstracking.php") ?>