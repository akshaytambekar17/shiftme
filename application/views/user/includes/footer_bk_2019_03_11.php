
        <footer class="footer">
            <div class="footer-area dark-bg">
                <div class="footer-area-bg"></div>
                <!--<div class="footer-top-area wow fadeIn">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="subscribe-content">
                                    <h2>Weekly Newsletter</h2>
                                    <p>There are many vaiations of passages of lorem ipsum available.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="subscriber-form-area">
                                    <form action="#" class="subsriber-form">
                                        <label for="subscriber-mail"><i class="fa fa-envelope-o"></i></label>
                                        <input type="email" name="subscriber-mail" id="subscriber-mail" placeholder="Enter Your Mail">
                                        <button type="submit">subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="footer-border"> </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="footer-bottom-area wow fadeIn" style="padding-top:3%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="single-footer-widget footer-about">
                                    <h3>Contact Us</h3>
<!--                                    <p>Shiftme Bavdhan, Pune - 411021.</p>-->
                                    <p><?= $footerContent['company_address']?></p>
                                    <ul>
                                        <li><i class="fa fa-phone"></i> <a href="callto:+91 <?= $footerContent['company_phone_number']?>">+91 <?= $footerContent['company_phone_number']?></a></li>
                                        <li><i class="fa fa-map-marker"></i> <a href="mailto: <?= $footerContent['company_email_id']?>"> <?= $footerContent['company_email_id']?></a></li>
<!--                                        <li><i class="fa fa-phone"></i> Pune,Maharashtra,India.</li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="single-footer-widget twitter-widget">
                                    <h3>QUICK LINKS</h3>
                                    <ul>
                                        <li>
                                            <a href="<?= base_url()?>faq" class="tweet-meta">
                                                <div class="twitter-icon"><i class="fa fa-phone"></i></div>
                                                <div class="tweet-detail">
                                                    <p>FAQ</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url()?>policy" class="tweet-meta">
                                                <div class="twitter-icon"><i class="fa fa-phone"></i></div>
                                                <div class="tweet-detail">
                                                    <p>Privacy Policy</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url()?>terms" class="tweet-meta">
                                                <div class="twitter-icon"><i class="fa fa-phone"></i></div>
                                                <div class="tweet-detail">
                                                    <p>Term and Conditions</p>
                                                </div>
                                            </a>
                                        </li>
                                        <?php if(!empty($footerCmsContentList)){ 
                                            
                                                foreach($footerCmsContentList as $value){
                                        ?>
                                                    <li>
                                                        <a href="<?= base_url()?>cms/<?= $value['cms_slug']?>" class="tweet-meta">
                                                            <div class="twitter-icon"><i class="fa fa-phone"></i></div>
                                                            <div class="tweet-detail">
                                                                <p><?= $value['name']?></p>
                                                            </div>
                                                        </a>
                                                    </li>
                                        <?php } } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="single-footer-widget list-widget">
                                    <h3>SITE</h3>
                                    <ul>
                                        <li><a href="<?= base_url()?>">Home</a></li>
                                        <li><a href="<?= base_url()?>aboutus">About Us</a></li>
                                        <li><a href="<?= base_url()?>service">Shifting And Packing</a></li>
<!--                                        <li><a href="#">Labour</a></li>-->
                                        <li><a href="<?= base_url()?>vehicles">Price</a></li>
                                        <li><a href="<?= base_url()?>contactus">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="single-footer-widget instafeed-widget">
                                    <h3>Location</h3>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30266.56777680504!2d73.77840258418182!3d18.514392044716036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bef6ae449e7f%3A0xfda40b3fa351f1d7!2sShiftme.in!5e0!3m2!1sen!2sin!4v1545806845440" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="footer-border"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="footer-copyright wow fadeIn">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<!--                                    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Website <i class="" aria-hidden="true"></i> by <a href="#" target="_blank">Team</a></p>-->
                                    <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="footer-social-bookmark text-right wow fadeIn">
                                    <ul class="social-bookmark">
<!--                                        <li><a href="https://www.facebook.com/shiftme/?pnref=story.unseen-section" target="_blank"><i class="fa fa-facebook"></i></a></li>
	                                <li><a href="https://www.instagram.com/shiftme.in/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>
	                                <li><a href="https://twitter.com/ShiftMe007" target="_blank"><i class="fa fa-twitter"></i></a></li>
	                                <li><a href="https://www.linkedin.com/company/shiftme-in/about/?viewAsMember=true" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	                                <li><a href="https://www.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>-->
                                        <li><a href="<?= $footerContent['company_facebook_link']?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
	                                <li><a href="<?= $footerContent['company_instagram_link']?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
	                                <li><a href="<?= $footerContent['company_twitter_link']?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
	                                <li><a href="<?= $footerContent['company_linkedin_link']?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
	                                <li><a href="<?= $footerContent['company_google_plus_link']?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--FOOER AREA END-->

        </footer>
        <div class="modal fade" id="admodal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="" style="background-color:#47b927;">
	            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  <span aria-hidden="true" color="#fff">&times;</span>
	                </button>
                        <img src="<?= base_url()?>assets/upload/shiftme-banner.jpg">   
	            </div>
	        </div>
	    </div>
	</div>
        <div class="modal fade login" id="loginModal">
            <div class="modal-dialog login animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close h4-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title h4-title center">Login</h4>
                    </div>
                    <div class="modal-body">
                        <div class="error has-text center"></div>
                        <div class="box login-box-content">
                            <div class="content">
<!--                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                    <span>or</span>
                                    <div class="line r"></div>
                                </div>-->
                                
                                <div class="form loginBox">
                                    <form method="post"  accept-charset="UTF-8">
                                        <div class="form-group">
                                            <label><input type="radio" name="role" value="1" checked>User</label>
                                            <label style="margin-left: 60px"><input type="radio" name="role" value="2">Vendor</label>
                                        </div>
                                        <input id="email_login" class="form-control" type="text" placeholder="Email" name="email">
                                        <span class="has-error error-email"></span>
                                        <input id="password_login" class="form-control" type="password" placeholder="Password" name="password">
                                        <span class="has-error error-password"></span>
                                        <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="box registerBox">
                            <div class="content">
                                <div class="form">
                                    <form method="post" action="" id="registration-form" name="registration-form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><input type="radio" name="role" value="1" checked>User</label>
                                            <label style="margin-left: 60px"><input type="radio" name="role" value="2">Vendor</label>
                                        </div>
                                        <input id="fname" class="form-control" type="text" placeholder="First Name" name="fname">
                                        <span class="has-error error-fname"></span>
                                        <input id="lname" class="form-control" type="text" placeholder="Last Name" name="lname">
                                        <span class="has-error error-lname"></span>
                                        <input id="mobileno" class="form-control" type="text" placeholder="Mobile Number" name="mobileno" maxlength="10">
                                        <span class="has-error error-mobileno"></span>
                                        <input id="email_id_registration" class="form-control" type="text" placeholder="Email" name="email">
                                        <span class="has-error error-email-id"></span>
                                        <input id="password_reg" class="form-control" type="password" placeholder="Password" name="password">
                                        <span class="has-error error-password-reg"></span>
                                        <input id="password_confirmation" class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                                        <span class="has-error error-password-confirmation"></span>
                                        <input class="btn btn-default btn-register" type="button" value="Create account" name="registration" onclick="registrationAjax()" id="registration">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                <a href="javascript:void(0)" class="a-link" id="showRegisterForm">create an account</a>
                                ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                            <span>Already have an account?</span>
                            <a href="javascript:void(0)" id="showLoginForm" class="a-link">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="track-order-modal">
	    <div class="modal-dialog">
	        <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close h4-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title h4-title center">Track Order</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                            $userDetails = userSession();
                            if(!empty($userDetails)){
                                $order_list = getOrdersByUserId($userDetails['uid']);
                                
                        ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Select Order Number</label>
                                            <select name='order_id' class="form-control" id="track-order-id" >
                                                <option disabled="disabled" selected="selected">Select Order Number</option>
                                                <?php 
                                                    if(!empty($order_list)){
                                                        foreach($order_list as $value) { 
                                                ?>
                                                    <option value="<?= $value['order_id']?>" <?= set_select('order_id',$value['order_no']);?> ><?= $value['order_no']?></option> 
                                                    <?php } } ?>    
                                            </select>
                                            <span class="help-block has-error error-order-id"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-11">
                                            <label>Tracking Status</label>
                                            <p class="tracking-status"></p>
                                        </div>
                                    </div>
                                </div>
                        
                        <?php }else{ ?>
                        <p class="has-error center">Please <a href="javascript:void(0)" onclick="trackLogin()">login</a> to get tracking details</p>
                        <?php } ?>
                    </div>
                    <?php if(!empty($userDetails)){ ?>
                        <div class="modal-footer">
                            <div class="center">
                                <button type="button" class="btn btn-primary" id="search-track">Track</button>
                            </div>
                        </div>
                    <?php } ?>
	        </div>
	    </div>
	</div>
        <!--====== SCRIPTS JS ======-->
        <script src="<?= base_url()?>assets/themenew/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/vendor/bootstrap.min.js"></script>
        <script src="<?= USERASSETS ?>js/jquery.dataTables.min.js"></script>
        <script src="<?= USERASSETS ?>js/dataTables.bootstrap.min.js"></script>
        <script src="<?= USERASSETS ?>js/dataTables.responsive.min.js"></script>
        <!--====== PLUGINS JS ======-->
        <script src="<?= base_url()?>assets/themenew/js/vendor/jquery.easing.1.3.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/vendor/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/vendor/jquery.appear.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/owl.carousel.min.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/stellar.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/wow.min.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/stellarnav.min.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/contact-form.js"></script>
        <script src="<?= base_url()?>assets/themenew/js/jquery.sticky.js"></script>
        <!--===== ACTIVE JS=====-->
        <script src="<?= base_url()?>assets/themenew/js/main.js"></script>

<!--        <script src="<?php echo ADMINLTE?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo ADMINLTE?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->
    
        <script src="<?php echo ADMINLTE?>bower_components/select2/dist/js/select2.full.min.js"></script>
        <script src="<?php echo ADMINLTE?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
          
        <script>
            var autocomplete2 = new google.maps.places.Autocomplete($("#pickupPoint")[0], {});
            autocomplete2.setComponentRestrictions(
                {'country': ['in']}
            );
            google.maps.event.addListener(autocomplete2, 'place_changed', function() {
                var place = autocomplete2.getPlace();
                console.log(place.address_components);
            });
            
            var autocomplete3 = new google.maps.places.Autocomplete($("#dropPoint")[0], {});
            autocomplete3.setComponentRestrictions(
                {'country': ['in']}
            );
            google.maps.event.addListener(autocomplete3, 'place_changed', function() {
                var place = autocomplete3.getPlace();
                console.log(place.address_components);
            });
//            var autocomplete2 = new google.maps.places.Autocomplete($("#pickupPoint1")[0], {});
//
//            google.maps.event.addListener(autocomplete2, 'place_changed', function() {
//                var place = autocomplete2.getPlace();
//                console.log(place.address_components);
//            });
            
//            var autocomplete3 = new google.maps.places.Autocomplete($("#dropPoint1")[0], {});
//
//            google.maps.event.addListener(autocomplete3, 'place_changed', function() {
//                var place = autocomplete3.getPlace();
//                console.log(place.address_components);
//            });
//            
            var autocomplete4 = new google.maps.places.Autocomplete($("#from_loc")[0], {});
            autocomplete4.setComponentRestrictions(
                {'country': ['in']}
            );
            google.maps.event.addListener(autocomplete4, 'place_changed', function() {
                var place = autocomplete4.getPlace();
                console.log(place.address_components);
            });
            var autocomplete5 = new google.maps.places.Autocomplete($("#to_loc")[0], {});
            autocomplete5.setComponentRestrictions(
                {'country': ['in']}
            );google.maps.event.addListener(autocomplete5, 'place_changed', function() {
                var place = autocomplete5.getPlace();
                console.log(place.address_components);
            });

            $(document).ready(function() {
                $(".alert").delay(5000).slideUp(200, function() {
                    $(this).alert('close');
                });
                if (sessionStorage.getItem('firstVisit') != "1"){
                    sessionStorage.setItem('firstVisit', '1');
                    $('#admodal').modal('show');
                }
                $('.datatable-list').dataTable({
                    "aaSorting": [[0, "desc"]],
                });
                $('.select2').select2();
                $('.datepicker').datepicker({
                    autoclose: true,
                    startDate: new Date()
                });
                $('#div-vehicles').hide();
                $("#track-order-button").on('click',function(){
                    $("#track-order-modal").modal('show');
                });        
                $("#search-track").on('click',function(){
                    var order_id = $("#track-order-id").val();
                    if(order_id == '' || order_id == null){
                        $(".error-order-id").text('Please select order number');
                    }else{
                        $("#search-track").prop("disabled",true);
                        $(".error-order-id").text('');
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>" + "get-track-order",
                            data: { 'order_id' : order_id},
                            success: function(result){
                                $("#search-track").prop("disabled",false);
                                $(".tracking-status").text(result);
                            }
                        });
                    }
                });        
                $("#login").on('click',function(){
                    loginClick();
                });        
                $("#showRegisterForm").on('click',function(){
                    $(".login-box-content").hide();
                    $(".login-footer").hide();
                    $(".h4-title").text('Registration');
                    $(".registerBox").show();
                    $(".register-footer").show();
                });        
                $("#showLoginForm").on('click',function(){
                    $(".registerBox").hide();
                    $(".register-footer").hide();
                    $(".h4-title").text('Login');
                    $(".login-box-content").show();
                    $(".login-footer").show();
                });        
        
                $('.form-control').focus(function() {
                    var $parent = $(this).parent();
                    $parent.removeClass('text-danger');
                    $('span.text-danger', $parent).fadeOut();
                    $('#mobile').css('border-color', 'rgb(206,212,215)');
                });
                $('#remember').focus(function() {
                    var $parent = $(this).parent();
                    $parent.removeClass('text-danger');
                    $('span.text-danger', $parent).fadeOut();
                    $('#passerror').text('');
                    $('#remember').css('border-color', 'rgb(206,212,215)');
                });
            });
            function loginClick(){
                $(".h4-title").text('Login');
                $(".login-box-content").show();
                $(".login-footer").show();
                $(".registerBox").hide();
                $(".register-footer").hide();
                clearLoginField();
                $("#loginModal").modal('show');
            }
            function validatePassword(e) {
                //updated by neeta
                var textInput = e.value;
                textInput = textInput.replace(/[^A-Za-z/0-9\-@_#.!$%^&*()=+|\ ]/g, "");
                e.value = textInput;

                //end
            }
            function loginAjax(){
                var email = $("#email_login").val();
                var password = $("#password_login").val();
                var role = $('input[name=role]:checked').val();
                var validate = validateLoginField();
                if(validate){
                    
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "login",
                        data: { 'email' : email, 'password' : password , 'role': role},
                        success: function(result){
                            console.log(result);
                            if(result){
                                $(".has-text").removeClass('has-error');
                                $(".has-text").addClass('has-success');
                                $(".has-text").text("You have Successfully Login");
                                setTimeout(function(){ 
                                    location.reload();
                                }, 1000);
                            }else{
                                $(".has-text").addClass('has-error');
                                $(".has-text").removeClass('has-success');
                                $(".has-text").text("You have enter wrong Email id or Password.");
                            }
                        }
                    });
                }
            }
            function registrationAjax(){
                var validate = validateRegistrationField();
                if(validate == true){
                    $("#registration").prop("disabled",true);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + "registration",
                        data: jQuery('#registration-form').serializeArray(),
                        dataType:'json',
                        success: function(result){
                            $("#registration").prop("disabled",false);
                            if(result['success'] == true){
                                $(".registerBox").hide();
                                $(".register-footer").hide();
                                $(".h4-title").text('Login');
                                $(".login-box-content").show();
                                $(".login-footer").show();
                                $(".has-text").removeClass('has-error');
                                $(".has-text").addClass('has-success');
                                $(".has-text").text(result['message']);
                                clearRegistrationField();
                            }else{
                                $(".has-text").addClass('has-error');
                                $(".has-text").removeClass('has-success');
                                $(".has-text").text(result['message']);
                            }
                        }
                    });
                }
            }
            function trackLogin(){
                $("#track-order-modal").modal('hide');
                loginClick();
            }
            function validateRegistrationField(){
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var mobileno = $("#mobileno").val();
                var email_id = $("#email_id_registration").val();
                var password_reg = $("#password_reg").val();
                var password_confirmation = $("#password_confirmation").val();
                flag = true;
                if(fname == ''){
                    $('.error-fname').text("Please enter the First name");
                    flag = false;
                }else{
                    $('.error-fname').text("");
                }
                if(fname == ''){
                    $('.error-fname').text("First name cannot be blank");
                    flag = false;
                }else{
                    $('.error-fname').text("");
                }
                if(lname == ''){
                    $('.error-lname').text("Last name cannot be blank");
                    flag = false;
                }else{
                    $('.error-lname').text("");
                }
                if(mobileno == ''){
                    $('.error-mobileno').text("Mobile number cannot be blank");
                    flag = false;
                }else{
                    if(validateMobileNumber(mobileno)){
                        $('.error-mobileno').text("");
                    }else{
                        $('.error-mobileno').text("Mobile number is invalid");
                        flag = false;
                    }
                }
                if(email_id == ''){
                    $('.error-email-id').text("Email id cannot be blank");
                    flag = false;
                }else{
                    if(validateEmail(email_id)){
                        $('.error-email-id').text("");
                    }else{
                        $('.error-email-id').text("Email id not in proper format");
                        flag = false;
                    }
                }
                if(password_reg == ''){
                    $('.error-password-reg').text("Password cannot be blank");
                    flag = false;
                }else{
                    if(password_reg.length <= 5){
                        $('.error-password-reg').text("Password must be greater than 5 letter");
                        flag = false;
                    }else{
                        $('.error-password-reg').text("");
                    }
                }
                if(password_confirmation == ''){
                    $('.error-password-confirmation').text("Confiramtion Password cannot be blank");
                    flag = false;
                }else{
                    if(password_reg == password_confirmation){
                        $('.error-password-confirmation').text("");
                    }else{
                        $('.error-password-confirmation').text("Confirmation Password and Password does not match");
                    }
                }
                return flag;
            }
            function validateLoginField(){
                var email_id = $("#email_login").val();
                var password = $("#password_login").val();
                flag = true;
                if(email_id == ''){
                    $('.error-email').text("Email id cannot be blank");
                    flag = false;
                }else{
                    if(validateEmail(email_id)){
                        $('.error-email').text("");
                    }else{
                        $('.error-email').text("Email id not in proper format");
                        flag = false;
                    }
                }
                if(password == ''){
                    $('.error-password').text("Password cannot be blank");
                    flag = false;
                }else{
                    if(password.length <= 5){
                        $('.error-password').text("Password must be greater than 5 letter");
                        flag = false;
                    }else{
                        $('.error-password').text("");
                    }
                }
                return flag;
            }
            function clearRegistrationField(){
                $("#fname").val("");
                $("#lname").val("");
                $("#mobileno").val("");
                $("#email_id_registration").val("");
                $("#password_reg").val("");
                $("#password_confirmation").val("");
            }
            function clearLoginField(){
                $("#email_login").val("");
                $("#password_login").val("");
            }
            function validateEmail(email) {
                var email_format = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(email_format.test(email)){
                    return true;
                }else{
                    return false;
                }
            }
            function validateMobileNumber(mobileno) {
                var number_format = /^\d{10}$/;
                if(number_format.test(mobileno)){
                    return true;
                }else{
                    return false;
                }
                
            }
            function validatePincode(pincode) {
                var number_format = /^\d{6}$/;
                if(number_format.test(pincode)){
                    return true;
                }else{
                    return false;
                }
                
            }
        </script>
    </body>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/58774f246b90161d870f4e77/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

        <!--Start of Tawk.to Script-->
       <!-- <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();

            (function() {
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/585bce83ddb8373fd2b1f55c/default';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>-->
        <!--End of Tawk.to Script-->
</html>