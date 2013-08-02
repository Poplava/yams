app.factory('Auth', ['$http', function($http) {
    return {
        login: function(data, success, error) {
            $http.put('/auth', data).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        }
    };

}]);