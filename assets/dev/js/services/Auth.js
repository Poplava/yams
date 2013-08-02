app.factory('Auth', ['$http', function($http) {
    return {
        register: function(data, success, error) {
            $http.post('/users', data).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        },
        login: function(data, success, error) {
            $http.put('/login', data).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        }
    };
}]);