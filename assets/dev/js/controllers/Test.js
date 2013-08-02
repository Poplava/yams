'use strict';

app.controller('TestCtrl', ['$scope', '$location', 'User', function($scope, $location, User) {
    $scope.getUser = function(userId) {
        User.getUser(userId, function(res) {
            $scope.resData = JSON.stringify(res, null, 2);
        }, function(res) {
            $scope.resData = "request error";
        });
    };
}]);