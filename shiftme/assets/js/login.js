$(document).ready(function() {
    $("#fgpsw").click(function() {
        $(".forgot-form").show();
        $(".login").hide();
    });
});

$(document).ready(function() {
    $("#cancel-forget").click(function() {
        $(".login").show();
        $(".forgot-form").hide();
    });
});
$(document).ready(function() {
    $("#resetpsw").click(function() {
        $(".otp-form").show();
        $(".forgot-form").hide();
    });
});
$(document).ready(function() {
    $("#verify").click(function() {
        $(".login").show();
        $(".desc").show();
        $(".otp-form").hide();
    });
});

$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
});

wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
);
wow.init();
//document.getElementById('moar').onclick = function() {
//    var section = document.createElement('section');
//    section.className = 'section--purple wow fadeInDown';
//    this.parentNode.insertBefore(section, this);
//};