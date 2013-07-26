'use strict';

app.controller('RegisterCtrl', ['$scope', function($scope) {
    $scope.errors = {
        form: !1,
        email: !1,
        login: !1,
        firstName: !1,
        lastName: !1,
        password: !1,
        passwordConfirm: !1
    };

    $scope.submitForm = function() {
        $scope.errors.form = !0;
        console.log(JSON.stringify($scope.regData));
    };

    $scope.validate = function() {

    };
}]);