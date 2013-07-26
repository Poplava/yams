'use strict';

app.controller('RegisterCtrl', ['$scope', '$http', function($scope, $http) {
    $scope.regData = {
        email: "",
        login: "",
        firstName: "",
        lastName: "",
        password: "",
        passwordConfirm: ""
    };
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
        if($scope.validate()) {
            $http.post('/register', $scope.regData).success(function() {

            });
        }
    };

    $scope.validate = function() {
        $scope.errors.form = !1;
        for(var key in $scope.regData) {
            if($scope.regData[key]) {
                $scope.errors[key] = !1;
            } else {
                $scope.errors.form = $scope.errors[key] = !0;
            }
        }
        if(!$scope.errors.form && ($scope.regData.password !== $scope.regData.passwordConfirm)) {
            $scope.errors.form =
                $scope.errors.password =
                $scope.errors.passwordConfirm = !0;
        }
        return !$scope.errors.form;
    };
}]);