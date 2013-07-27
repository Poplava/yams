app.factory('Auth', ['$http', function($http) {
    return {
        register: function(data, success, error) {
            $http.post('/register', data).success(function(res) {
                console.log(res);
                if(typeof success === 'object') success(res);
            }).error(function() {
                console.log(res);
                if(typeof error === 'object') error(res);
            });
        }
    };
}]);