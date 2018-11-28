<style>
 .navbar-inverse .navbar-nav > li > a { color:#fff;}
 </style>
<!--<div class="mg-page-title parallax" style=" background-image: url(<?=USERASSETS?>images/banner.png);">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h2>Contact Us</h2>
                <p>Cogitavisse erant puerilis utrum efficiantur adhuc expeteretur.</p>
            </div>
        </div>
    </div>
</div>-->

<!--Testimonials-->
<div class="mg-page section-md-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="area-title wow fadeIn">
                            <h2>Send an E-mail</h2>
                        </div>
                    </div>
                </div>
<!--                <h2 class="mg-sec-left-title" style="font-weight: 600;color: #71747b;">Send an E-mail</h2>-->
                <form action="<?= site_url()?>User_controller/save_userEmail" method="POST" class="clearfix col-md-10 contactform">
                    <div class="mg-contact-form-input requared">
                        <label for="full-name">Full Name</label>
                        <input type="text" class="form-control" name="full_name" oninput="validateAlpha(this);" id="full_name" required>
                    </div>
                    <div class="mg-contact-form-input requared">
                        <label for="contact">Contact No.</label>
                        <input type="text" class="form-control" name="contact" oninput="validateNumber(this);" id="contact" minlength="10" maxlength="10" required>
                        <span id="contactError" class=""></span>
                    </div>
                    <div class="mg-contact-form-input requared">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email"  id="email" required>
                    </div>

                    <div class="mg-contact-form-input requared">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" name="subject"  id="subject" required>
                    </div>
                    <div class="mg-contact-form-input requared">
                        <label for="subject">Message</label>
                        <textarea class="form-control" name="message"  id="message" rows="5" required></textarea>
                    </div>
                    <br>
                    <div class="col-md-12" style="text-align: center">
                        <input type="submit" class="btn btn-danger center" value="Send" onclick="return valid()">
                    </div>
                    
                </form>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="area-title wow fadeIn">
                            <h2>Office Address</h2>
                        </div>
                    </div>
                </div>
                
                <p class="contact-us-p"><strong>ShiftMe </strong> is very much responsible towards their work and we understand the value of our business and our work so you can easily hire us for your relocation so that we can easily start your Shifting process and then complete it on the time..</p>
                <ul class="mg-contact-info">
                    <li class="row"><i class="fa fa-map-marker col-xs-1"></i><p class="col-xs-9"> ShiftMe , Bavdhan, Pune - 411021.</p></li>
                    <li class="row"><i class="fa fa-phone col-xs-1"></i><p class="col-xs-9">(+91) 9689 622 000</p></li>
                    <li class="row"><i class="fa fa-envelope col-xs-1"></i><a href="mailto:shiftme.in@gmail.com" class="col-xs-9"> shiftme.in@gmail.com</a></li>
                </ul>

<!--                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA56QdMIsOpQsTvWgjrfwJ4E11oyweCZbs'></script>-->
                <div style='overflow:hidden;height:290px;width:auto;'>
                    <div id='gmap_canvas' style='height:290px;width:auto;'></div>
                    <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                </div> 
                <a href='https://embed-map.org/'>.</a> 
<!--                        <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=33f1cb918f616234a85ed47bf50a3617fd847579'></script>-->
                <script type='text/javascript'>
                        function init_map() {

                            var myOptions = {zoom: 13, center: new google.maps.LatLng(18.5091384, 73.77821289999997), mapTypeId: google.maps.MapTypeId.ROADMAP};
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(18.5091384, 73.77821289999997)});
                            infowindow = new google.maps.InfoWindow({content: '<strong>ShiftMe </strong><br> Pune.<br>'});

                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
        </div>
    </div>
</div>


<!--end Testimonials-->
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
        textInput = textInput.replace(/[^0-9]/g, "");
        e.value = textInput;

        //end
    }
    function valid() {
        var flag = true;
        
        if ($('#full_name').val() == "") {
            $('#full_name').css('border-color', '#ef4040');
            flag = false;
        }
        if ($('#email').val()== "") {
            $('#email').css('border-color', '#ef4040');
            
            flag = false;
        }
        if ($('#subject').val()== "") {
            $('#subject').css('border-color', '#ef4040');
            
            flag = false;
        }
        if ($('#message').val()== "") {
            $('#message').css('border-color', '#ef4040');
            
            flag = false;
        }
        if ($('#contact').val()== "") {
            $('#contact').css('border-color', '#ef4040');
            
            flag = false;
        }
        if ($('#contact').val().length != 10 && $('#contact').val()!= "") {
            $('#contact').css('border-color', '#ef4040');
            $('#contactError').addClass('text-danger');
            $('#contactError').text('Contact No. Must Be 10 Digits');
            flag = false;
        }
        return flag;
    }
    $(document).ready(function() {
        $('.form-control').focus(function() {
//        $("textarea").css();
            var $parent = $(this).parent();
            $parent.removeClass('text-danger');
            $('span.text-danger', $parent).fadeOut();
            $('#contact').css('border-color', 'rgb(206,212,215)');
        });
    });
</script>
<?php include_once("analyticstracking.php") ?>