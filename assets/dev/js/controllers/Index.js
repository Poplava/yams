'use strict';

app.controller('IndexCtrl', ['$scope', '$location', 'Auth', function($scope, $location, Auth) {

    $scope.submitForm = function() {
        if($scope.loginUserForm) {
            Auth.login($scope.loginForm, function(res) {

                alert('after login');
                console.log(res);

            }, function(res) {
                $scope.formError(res);
            });
        }
    }

}]);