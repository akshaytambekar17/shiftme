
app = angular.module('transport', ['ngRoute', 'ngSanitize']);

app.controller('register', ['$scope', '$http', function ($scope, $http) {

        $scope.reg = {};
//        $scope.message={};
        $scope.signup = function () {
            $scope.flag = true;
            $('#mobile').css('border-color', '#ced4d7');
            $('#email').css('border-color', '#ced4d7');
            $("#user_password").css('border-color', '#ced4d7');
            $('#con_password').css('border-color', '#ced4d7');
            $('#passerror').text('');
            if ($("#fullname").val() === "") {
                $scope.flag = false;
                $('#fullname').css('border-color', '#ef4040');
            }
            if ($("#mobile").val() === "") {
                $scope.flag = false;
                $('#mobile').css('border-color', '#ef4040');
            }
            
            if ($("#email").val() === "") {
                $scope.flag = false;
                $('#email').css('border-color', '#ef4040');
            }
            if ($("#user_password").val() === "") {
                $scope.flag = false;
                $("#user_password").css('border-color', '#ef4040');
            }
            if ($("#con_password").val() === "") {
                $scope.flag = false;
                $('#con_password').css('border-color', '#ef4040');
            }

//            $("input[name='remember']:checked").each(function()
            if ($('#remember').is(":checked") != true) {
                $scope.flag = false;
//                document.getElementById("rememb").style.border = "1px solid red";
                $('#passerror').text('Please Select Terms And Conditions.');
                $('#passerror').addClass('text-danger');
//                $('#rememb').css('border-color', '#ef4040');
            }
            if ($("#con_password").val() != $("#user_password").val()) {
                $scope.flag = false;
                $('#user_password').css('border-color', '#ef4040');
                $('#con_password').css('border-color', '#ef4040');
            }

            var input = $("#user_password").val();
//            alert(input.length);
//            var passw = /^.{6,8}$/;
            if (input.length < 6 || input.length > 8)
            {
//                alert(6);
                $('#user_password').css('border-color', '#ef4040');
                $('#con_password').css('border-color', '#ef4040');
                $('#passerror').text('Password Must be 6 to 8 characters ');
                $('#passerror').addClass('text-danger');
                $scope.flag = false;
            }
//            if (input.length > 8)
//            {
//                 alert(8);
//                $('#user_password').css('border-color', '#ef4040');
//                $('#con_password').css('border-color', '#ef4040');
//                $('#passerror').text('Password Must be 6 to 8 characters ');
//                $('#passerror').addClass('text-danger');
//                $scope.flag = false;
//            }
            
            if ($('#mobile').val().length != 10 && $('#mobile').val() != "") {
                $('#mobile').css('border-color', '#ef4040');
                $('#mobileError').addClass('text-danger');
                $('#mobileError').text('Contact No. Must Be 10 Digits');
                $scope.flag = false;
            }

            var data = new FormData($('#register-form')[0]);
//            alert($scope.flag);
            if ($scope.flag) {
                $.ajax({
                    url: site_url + "User_controller/signup",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {

                        if (data == 1) {
                            $('#sucess').text("");
                            $('#errors').text("");
                            $('#sucess').text("User Registration Successful");
                            $('#sucess').addClass('text-success text-center');
                            window.location.reload();
                        } else if (data == -1) {
                            $('#sucess').text("");
                            $('#errors').text("");
                            $('#errors').text("Mobile number Already Exist");
                            $('#errors').addClass('text-danger text-center');
                        }else if (data == -2) {
                            $('#sucess').text("");
                            $('#errors').text("");
                            $('#errors').text("Email Id Already Exist");
                            $('#errors').addClass('text-danger text-center');
                        } else {
                            $('#sucess').text("");
                            $('#errors').text("");
                            $('#errors').text("User Registration Failed. Try again");
                            $('#errors').addClass('text-danger text-center');
                        }
                    }
                });
            }

//            $http.post(site_url + "/User_controller/signup", $scope.reg).success(function(data) {
////                window.location.href = (site_url + "/Appliances/manage_appliance");
////                $scope.eappl = [];
//            });
        }

    }]);

app.controller('userlogin', ['$scope', '$http', function ($scope, $http) {
        $scope.flag = true;
        $scope.log = {};
        $scope.message = {};
        $scope.login = function () {

            if ($("#log_username").val() === "") {
                $scope.flag = false;
                $('#log_username').css('border-color', '#ef4040');
            }
            if ($("#log_password").val() === "") {
                $scope.flag = false;
                $('#log_password').css('border-color', '#ef4040');
            }

            var data = new FormData($('#login-form')[0]);

            if ($scope.flag) {
                $.ajax({
                    url: site_url + "User_controller/signin",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        if (data == 1) {
                            $('#user_log_sucess').text("");
                            $('#errors').css('display', 'none');
                            $('#user_log_sucess').text("User Login Successful");
                            $('#user_log_sucess').addClass('text-success text-center');
                            window.location.reload();
                        } else {
                            
                            $('#sucess').css('display', 'none');
                            $('#user_log_errors').text("");
                            $('#user_log_errors').text("Enter Valid User Name or Password");
                            $('#user_log_errors').addClass('text-danger text-center');
                        }
                    }
                });
            }

//            $http.post(site_url + "/User_controller/signup", $scope.reg).success(function(data) {
////                window.location.href = (site_url + "/Appliances/manage_appliance");
////                $scope.eappl = [];
//            });
        }
       

    }]);

app.controller('forgetpass', ['$scope', '$http', function ($scope, $http) {
       
        $scope.log = {};
        $scope.message = {};
        $scope.forgetpass = function () {

 	$scope.flag = true;
            if ($("#f_username").val() === "") {
                $scope.flag = false;
                $('#f_username').css('border-color', '#ef4040');
            }
            
            var data = new FormData($('#forget_password')[0]);

            if ($scope.flag) {
                $.ajax({
                    url: site_url + "User_controller/get_forget_otp",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                    
                        if (data == "1") {
                            $('#message').text('OTP is Send Sucessfully');
                            $('.forgot-form').css('display', 'none');
                            $('.otp-forms').css('display', 'block');
                        } else if (data == "2") {
                            $('#messagemail').text('Email Send Sucessfully');
                        } else {
                            $('#f_username').css('border-color', '#ef4040');
                            
                        }
                    }
                });
            }
        }

        $scope.validotp = function () {

//        alert('hii');
            $scope.flag = true;
            if ($("#forget_opt").val() === "") {
                $scope.flag = false;
                $('#forget_opt').css('border-color', '#ef4040');
            }
//            alert($scope.flag);
            var data = new FormData($('#forget_password')[0]);
            if ($scope.flag) {
                $.ajax({
                    url: site_url + "User_controller/validotp",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        if (data != "") {
                            window.location.href = data;
                        } else if (data == "") {
                            $('#message').text('Enter Valid OTP');
                        } else {
                            $('#message').text('Enter Valid OTP');
                        }
                    }
                });
            }
        }
    }]);

app.controller('inquery', ['$scope', '$http', function ($scope, $http) {

        $scope.inq = {};
        $scope.inqmsg1 = {};
        $scope.save = function () {
            $scope.flag = true;
            var data = new FormData($('#form-horizontal')[0]);
            if ($scope.flag) {
                $.ajax({
                    url: site_url + "User_controller/vehicle_inquery",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {

                        obj = jQuery.parseJSON(data);

                        if (obj.s == 1) {
                            $.notify(obj.message, "success");
//                            $('#inqsucess').text();
                        } else {
                            $.notify(obj.message, "error");
//                            $('#inqerror').text(obj.message);
                        }

                    }
                });
            }

        }

        $scope.save1 = function () {
            $scope.flag = true;
            var data = new FormData($('#form-inq1')[0]);
            if ($scope.flag) {
                $.ajax({
                    url: site_url + "User_controller/vehicle_inquery",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
//                        alert(jQuery.parseJSON(data));
                        obj = jQuery.parseJSON(data);
//                        alert(obj.message);
//                        $scope.inqmsg1 = obj.s;
//                        alert($scope.inqmsg1);

                        if (obj.s == 1) {
                            $.notify(obj.message, "success");
//                            $('#inqsucess1').text(obj.message);
                        } else {
                            $.notify(obj.message, "error");
//                            $('#inqerror1').text(obj.message);

                        }

                    }
                });
            }

        }

    }]);