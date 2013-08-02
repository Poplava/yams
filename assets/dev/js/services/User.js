app.factory('User', ['$http', function($http) {
    return {
        register: function(data, success, error) {
            $http.post('/user', data).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        },
        getUser: function(userId, success, error) {
            $http.get('/user?userId='+userId).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        }
    };

}]);