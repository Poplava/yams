'use strict';

var app = angular.module('yams', [])
    .config(['$routeProvider', '$locationProvider', '$httpProvider', function ($routeProvider, $locationProvider, $httpProvider) {

        $routeProvider.when('/', {
            templateUrl:    '/assets/dev/templates/index.html',
            controller:     'IndexCtrl'
        });

        $routeProvider.when('/register', {
            templateUrl:    '/assets/dev/templates/register.html',
            controller:     'RegisterCtrl'
        });

        $routeProvider.otherwise({redirectTo:'/'});

        $locationProvider.html5Mode(true);
}]);