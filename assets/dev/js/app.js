var App = angular.module("app", []);

App.config(function($routeProvider, $locationProvider) {
    $locationProvider.html5Mode(true);
    $routeProvider
        .when('/', {
            controller: 'IndexController',
            templateUrl: '/assets/dev/templates/SignIn.html'
        })
        .when('/signup', {
            controller: 'SignUpController',
            templateUrl: '/assets/dev/templates/SignUp.html'
        })
        .otherwise({
            redirectTo: '/'
        });
});

var Controllers = {};

Controllers.IndexController = function($scope, $http) {

};

Controllers.SignUpController = function($scope, $http) {

};

App.controller(Controllers);