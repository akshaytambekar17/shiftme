<style>
    @import url(http://weloveiconfonts.com/api/?family=entypo);

/* entypo */
[class*="entypo-"]:before {
   font-family: "entypo", sans-serif;
}

#sticky-social a { 
   text-decoration: none;
}

#sticky-social ul {
   list-style: none;
   margin: 0;
   padding: 0;
}



#sticky-social {
   left: 0;
   position: fixed;
   top: 150px;
}

#sticky-social a {
   background: #333;
   color: #fff;
   display: block;
   height: 35px;
   font: 16px "Open Sans", sans-serif;
   line-height: 35px;
   position: relative;
   text-align: center;
   width: 35px;
}

#sticky-social a:hover span {
   left: 100%;
}

#sticky-social a span {
   line-height: 35px;
   left: -150px;
   position: absolute;
   text-align:center;
   width:150px;
   z-index: 999999;
   
}
.widget address{margin-bottom: 4px;}
#sticky-social a[class*="whatsapp"],
#sticky-social a[class*="whatsapp"]:hover,
#sticky-social a[class*="whatsapp"] span { background: #10ca5c; }


</style>

<aside id="sticky-social">
    <ul>
        <li><a tel:9689622000 class="entypo-whatsapp" ><i class="fa-2x fa fa-whatsapp"></i><span>+91-96896 22000</span></a></li>
    </ul>
</aside>




<footer class="footer">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Contact US</h2>
                        <address>
                            <?php echo $footer->contact_us; ?>
                        </address>
                        <!--<ul class="mg-footer-social">
                            <li><a href="<?php echo $footer->fb_link; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $footer->twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $footer->pinterest_link; ?>"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="<?php echo $footer->google_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $footer->rss_link; ?>"><i class="fa fa-rss"></i></a></li>
                        </ul>-->
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Quick links</h2>
                        <p style="margin-bottom: 5px !important;"><a href="<?php site_url() ?>faq">FAQ</a></p>
                        <p style="margin-bottom: 5px !important;"><a href="<?php site_url() ?>policy">Privacy Policy</a></p>
                        <p style="margin-bottom: 5px !important;"><a href="<?php site_url() ?>terms">Term and Conditions</a></p>
                        <p style="margin-bottom: 5px !important;"> <a href="https://msg91.com/startups/?utm_source=startup-banner"><img src="https://msg91.com/images/startups/msg91Badge.png" width="120" height="90" title="MSG91 - SMS for Startups" alt="Bulk SMS - MSG91"></a></a></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h2 class="mg-widget-title">Site</h2>
                        <p><?php echo $footer->site; ?></p>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                                    <div class="widget">
                                        <h2 class="mg-widget-title">Social Media</h2>
                                        <p><?php //echo $footer->social_media;     ?></p>
                                        <ul class="mg-footer-social">
                
                                            <li><a href="<?php echo $footer->fb_link; ?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php echo $footer->twitter_link; ?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo $footer->pinterest_link; ?>"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="<?php echo $footer->google_link; ?>"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="<?php echo $footer->rss_link; ?>"><i class="fa fa-linkedin"></i></a></li>
                
                                        </ul>
                                    </div>
                                </div>
                                
            </div>
        </div>
    </div>
</footer>

<!--style="padding: 0;background: #3886c0;padding-bottom: 185px"-->
<!--login  Modal -->       
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="panel panel-primary" style="margin-bottom: 0">
                <div class="panel-body" style="padding: 0 15px 0 15px">
                    <div class="row">
                    
                        <div class="col-xs-12 col-sm-6 col-md-5 loginpop" > <br />
                            <img src="<?= USERASSETS ?>images/truck-2-64.png" class="img-responsive col-md-offset-5 col-xs-offset-5 col-sm-offset-5">
                            <ul class="left">
                                <h5>Stay with Transport Member</h5>
                                <li>Easy to Book</li>
                                <li>Easy to Shift</li>
                                
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-7 login-box">
                            <button type="button" class="close" style="margin-top: 5px" data-dismiss="modal" aria-label="Close">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>
                            <div class="login">
                                <div class="mt-tab-top-nav" >
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home12" aria-controls="home12" role="tab" data-toggle="tab" aria-expanded="true">Log in</a></li>
                                        <li role="presentation" class=""><a href="#profile12" aria-controls="profile12" role="tab" data-toggle="tab" aria-expanded="false">Sign Up</a></li>
                                    </ul>

                                    <div class="tab-content" style="padding-bottom: 0" >
                                        <div role="tabpanel" class="tab-pane fade active in" id="home12" data-ng-controller="userlogin">
                                            <form id="login-form" ng-submit="login()" >
                                                <!--<span class="desc" style="display: none">You have successfully Changed password.</span>-->
                                                <span id="user_log_errors"></span>
                                                <span id="user_log_sucess" class=""></span>
                                                <div class="form-group">
                                                    <input type="text" name="log_username" id="log_username" tabindex="1" class="form-control" placeholder="Enter your Mobile or Email" value="" ng-model="log.log_username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="log_password" id="log_password" tabindex="2"  class="form-control" placeholder="Transport Password" ng-model="log.log_password">
                                                </div>
                                                <div class="form-group" style="margin-bottom: 5px">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a id="fgpsw" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-bottom: 0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile12" data-ng-controller="register">


                                            <form id="register-form" ng-submit="signup()"  method="post" role="form" >
                                                <span id="sucess" class=""></span>
                                                <span id="errors" class=""></span>
                                                <div class="form-group">
                                                    <input type="text" name="mobile" maxlength="10" id="mobile"  tabindex="1" class="form-control" placeholder="Mobile Number" value="" ng-model="reg.mobile">
                                                    <span id="mobileError" class=""></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email"  tabindex="1" class="form-control" placeholder="Email Address" value="" ng-model="reg.email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="user_password" tabindex="2" oninput="validatePassword(this);" maxlength="6"  class="form-control" placeholder="Password" ng-model="reg.password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="con_password"  id="con_password" tabindex="2" oninput="validatePassword(this);" maxlength="6" class="form-control" placeholder="confirm password" ng-model="reg.con_password">
                                                </div>

                                                <div class="form-group text-left" id="rememb">
                                                    <input type="checkbox" tabindex="3" class=""  name="remember" id="remember" value="1" ng-nodel="reg.rember">
                                                    <label for="rememb" >I agree with your terms and conditions.</label>
                                                    <p><span id="passerror" class=""></span></p>
                                                </div>

                                                <div class="form-group" style="margin-bottom: 0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Submit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-ng-controller="forgetpass">
                                <div class="forgot-form" style="display: none;" >
                                    <form method="POST" ng-submit="validotp()" id="forget_password">

                                        <div class="forgot_text">
                                            <h3>Forgot Password?</h3>
                                            <span class="desc f13">We will send a link on your registered email or One Time Password (OTP) on your mobile to reset your password.</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="f_username" id="f_username" tabindex="1" class="form-control" placeholder="Enter your Mobile or Email" ng-model="log.username">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-4 col-xs-5 text-right">
                                                    <input type="submit" class="cancel_btn" id="cancel-forget" value="Cancel">
                                                </div>
                                                <div class="col-md-6 col-xs-7">
                                                    <input type="button" id="resetpsws" ng-click="forgetpass()" class="form-control btn btn-login" value="RESET PASSWORD">
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10 col-xs-10">
                                                    <p><span class="text-success" id="messagemail"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="otp-forms" style="display: none;">
                                    <div class="forgot_text">
                                        <h3>Enter One Time Password</h3>

                                        <span id="user_log_sucess" class="text-success text-center" ng-if="message.s == '1'"> Mail Send Successfully.</span>
                                        <span id="user_log_sucess" class="text-danger text-center" ng-if="message.s == '2'"> Mail Send Failed.</span>

<!--                                            <span class="desc f13">One Time Password(OTP) has been sent to your mobile **********, please enter it here to verify your mobile.Or you can click on the link sent on your email *****@gmail.com</span>-->
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="forget_opt" id="forget_opt" tabindex="1" class="form-control" placeholder="OTP" value="" ng-model="log.otp">
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4 col-xs-5 text-right">
                                                <a type="submit" class="btn cancel_btn" ng-click="forgetpass()" value="Resend OTP">Resend OTP</a>
                                            </div>
                                            <div class="col-md-6 col-xs-7">
                                                <input type="submit" id="verifid" class="form-control btn btn-login" value="VERIFY">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-10 col-xs-10">
                                                <p><span class="text-success" id="message"></span></p>
                                            </div>
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


<script>
    function validatePassword(e) {
        //updated by neeta
        var textInput = e.value;
        textInput = textInput.replace(/[^A-Za-z/0-9\-@_#.!$%^&*()=+|\ ]/g, "");
        e.value = textInput;

        //end
    }
    $(document).ready(function() {
        $('.form-control').focus(function() {
//        $("textarea").css();
            var $parent = $(this).parent();
            $parent.removeClass('text-danger');
            $('span.text-danger', $parent).fadeOut();
            $('#mobile').css('border-color', 'rgb(206,212,215)');
        });
    });
    $(document).ready(function() {
        $('#remember').focus(function() {
//        $("textarea").css();
            var $parent = $(this).parent();
            $parent.removeClass('text-danger');
            $('span.text-danger', $parent).fadeOut();
            $('#passerror').text('');
            $('#remember').css('border-color', 'rgb(206,212,215)');
        });
    });
</script>

