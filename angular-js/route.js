/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


app.config(function ($routeProvider) {
    $routeProvider
            .when("/", {
                templateUrl: "ang-app/index.html"
            })
            
            .when("/tutorial", {
                templateUrl: "ang-app/tutorial.html"
            })
            
}); 