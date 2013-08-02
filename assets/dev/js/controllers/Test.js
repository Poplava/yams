'use strict';

app.controller('TestCtrl', ['$scope', '$location', 'Users', function($scope, $location, Users) {
    $scope.getUser = function(userId) {
        $scope.loader = true;
        $scope.resData = "";
        Users.getUser(userId, function(res) {
            $scope.resData = res;
        });
    };
    $scope.updateUser = function() {
        Users.updateUser($scope.userId, $scope.resData, function(res) {
            $scope.resData = $scope.userId = "";
            $scope.loader = false;
        });
    };
}]);