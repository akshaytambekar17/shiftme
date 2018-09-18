<div class="mg-page-title parallax" style=" background-image: url(<?= USERASSETS ?>images/office-relocation-compressed-1500x630.jpg);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Change Password</h2>
                <!--                        <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>-->
            </div>
        </div>
    </div>
</div>

<section class="section-70 section-md-50 section-bottom-110">
    <div class="container text-left">
        <h2 class="mg-sec-left-title div-bottom-5" style="font-weight: 600;color: #71747b;">Change Password</h2>

        <div class="range range-xs-center offset-top-50">

        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <form class="clearfix col-md-10 contactform" action="<?= site_url()?>User_controller/updatepass/<?= $_GET['Token']?>" method="POST">
                    <div class='row'>
                        <div class=" requared col-md-4">
                            <label for="full-name">New Password</label>
                        </div>
                        <div class=" col-md-6">
                            <input type="password" class="form-control" oninput="validatePassword(this);" name="password" id="password">
                        </div>
                    </div>
                    <div class='row'>
                        <div class=" requared col-md-4">
                            <label for="full-name">Conform Password</label>
                        </div>
                        <div class=" col-md-6">
                            <input type="password" class="form-control" oninput="validatePassword(this);" name='c_passwprd' id="con_password">
                        </div>
                    </div>
                    <div class='row'>
                        <div class=" requared col-md-4">
                           
                        </div>
                        <div class=" col-md-6">
                            <div class="" id="passerror">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-dark-main" onclick="return valid()" value="UPDATE">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
                            function valid() {
                                var flag = true;
                                if ($('#password').val() == "") {
                                    $('#password').css('border-color', '#ef4040');
                                    flag = false;
                                }
                                if ($('#con_password').val() == "") {
                                    $('#con_password').css('border-color', '#ef4040');
                                    flag = false;
                                }
                                if ($('#password').val() != $('#con_password').val()) {
                                    $('#password').css('border-color', '#ef4040');
                                    $('#con_password').css('border-color', '#ef4040');
                                    flag = false;
                                }
                                var input = $("#password").val();
                                var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}$/;
                                if (!input.match(passw))
                                {
                                    $('#password').css('border-color', '#ef4040');
                                    $('#password').css('border-color', '#ef4040');
                                    $('#passerror').text('Password Must be 6 to 8 characters which contain at least one numeric digit, one uppercase and one lowercase letter!');
                                    $('#passerror').addClass('text-danger');
                                    flag = false;
                                }
                                return flag;
                            }
                            function validatePassword(e) {
                                //updated by neeta
                                var textInput = e.value;
                                textInput = textInput.replace(/[^A-Za-z/0-9\-@_.!$%^&*()=+|\ ]/g, "");
                                e.value = textInput;

                                //end
                            }
</script>
<?php include_once("analyticstracking.php") ?>