'use strict';

app.controller('RegisterCtrl', ['$scope', '$http', 'Auth', function($scope, $http, Auth) {
    $scope.regComplete =
        $scope.regError = !1;

    $scope.submitForm = function() {
        if($scope.regUserForm && $scope.regUser.password === $scope.passwordConfirm) {
            Auth.register($scope.regUser, function(res) {
                if(res.userId > 0) {
                    console.log(res);
                    $scope.regComplete = !0;
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
        $scope.regError = !0;
        $scope.regUser.password = $scope.passwordConfirm = '';
    };

}]);