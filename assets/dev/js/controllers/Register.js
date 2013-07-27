'use strict';

app.controller('RegisterCtrl', ['$scope', '$http', 'Auth', function($scope, $http, Auth) {

    $scope.submitForm = function() {
        if($scope.regUserForm && $scope.regUser.password === $scope.passwordConfirm) {
            Auth.register($scope.regUser, function(res) {
                console.log(res);
            });
        }
    };

}]);