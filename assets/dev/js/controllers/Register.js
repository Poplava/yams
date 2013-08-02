'use strict';

app.controller('RegisterCtrl', ['$scope', '$http', 'Users', function($scope, $http, Users) {
    $scope.regComplete =
        $scope.regError = false;

    $scope.submitForm = function() {
        if($scope.regUserForm) {
            Users.register($scope.regUser, function(res) {
                if(res.userId > 0) {
                    console.log(res);
                    $scope.regComplete = true;
                } else {
                    $scope.formError(res);
                }
            }, function(res) {
                $scope.formError(res);
            });
        }
    };

    $scope.formError = function(res) {
        console.log(res);
        $scope.regError = true;
    };

}]);