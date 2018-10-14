app = angular.module('adminTransport', ['ngSanitize']);
app.config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    }]);
app.run(['$rootScope', 'Data', function ($rootScope, Data) {
    $rootScope.services = {
      "objective": [{obj: "" ,icon:""}] 
    };
       
    
}]);
app.controller('shifting', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {
       
        $scope.userdata = {};
        $scope.edit = true;
       
}]);
app.controller('editshifting', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {

        $scope.edit = true;
       
        $rootScope.shiftingdetail =[];
        $scope.userdata = {};
        
        $scope.GetShiftingDetail = function (id) {
            Data.GetShiftingDetail($.param({id: id})).success(function (data) {
                //alert(data);
                $rootScope.shiftingdetail = data;
            });
        };
       
        

}]);
app.controller('viewshifting', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {

        $scope.edit = true;
       
        $rootScope.shiftingdetail =[];
        $scope.userdata = {};
        
        $scope.GetShiftingDetail = function (id) {
            Data.GetShiftingDetail($.param({id: id})).success(function (data) {
                $rootScope.shiftingdetail = data;
            });
        };
       
        

}]);

app.controller('enquiry', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {
        $scope.edit = true;
        }]);
app.controller('aboutus', ['$scope', '$rootScope', '$http', 'Data', function ($scope, $rootScope, $http, Data) {

        

        $scope.edit = true;
       
        $rootScope.aboutusdetail =[];
        $scope.userdata = {};
        
        $scope.aboutusDetail = function (id) {
            Data.aboutusDetail($.param({id: id})).success(function (data) {
                $rootScope.aboutusdetail = data;
            });
        };
       


}]);


