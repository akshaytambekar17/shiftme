/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//window.fbAsyncInit = function () {
fbinit = function () {
    FB.init({
        appId: "782677491873655",
        status: true,
        cookie: true,
        xfbml: true,
        version: 'v2.8'
    });
}
getDaysInMonth = function (month, year) {
    dt = new Date(year, month, 0).getDate();
    tot1 = parseInt(0);
    tot2 = parseInt(dt);
    for (var i = tot1; i > tot2; i--) {
        input.push(i);
    }
    return input;
}
//};
app.filter('shortdesc', function ($sce) {
    return function (input, size) {
        $v = input;
        if ($v.length > size) {
            $v = $v.substr(0, size) + "...";
        }
        return $sce.trustAsHtml($v);
    }
});
app.filter('reverse', function () {
    return function (items) {
        return items.slice().reverse();
    };
});
app.filter('range', function () {
    return function (input, total) {
        total = total.split("-");
        tot1 = parseInt(total[0]);
        tot2 = parseInt(total[1]);
        for (var i = tot1; i > tot2; i--) {
            input.push(i);
        }
        return input;
    };
});
app.filter('in_array', function () {
    return function (input, total) {
        if ($.inArray(input, total) == -1) {
            return false
        } else {
            return input;
        }
    };
});
app.filter('daterange', function () {
    return function (input, total) {
        tot1 = parseInt(new Date().getFullYear());
        tot2 = tot1 - parseInt(total);
        for (var i = tot1; i > tot2; i--) {
            input.push(i);
        }
        return input;
    };
});
app.factory('myInterceptor',
        function ($q, $rootScope) {
            var interceptor = {
                'request': function (config) {
                    $rootScope.loading = 1;
                    // Successful request method
                    return config; // or $q.when(config);
                },
                'response': function (response) {
                    $rootScope.loading = 0;
                    // successful response
                    return response; // or $q.when(config);
                },
                'requestError': function (rejection) {
                    return response;
                },
                'responseError': function (rejection) {
                    return rejection;
                }
            };
            return interceptor;
        });

app.service('Data', function ($http) {
    this.GetTopic = function ($id) {
        
        return $http.post(site_url + "admin/Admin_controller/getTopic", $id);
    };
    this.GetShiftingDetail = function ($data) {
        return $http.post(site_url + "admin/Setting_controller/getShiftingDetail", $data);
    };
    this.aboutusDetail = function ($data) {
        return $http.post(site_url + "admin/Admin_controller/getaboutDetail", $data);
    };
    
});