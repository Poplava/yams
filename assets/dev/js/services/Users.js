app.factory('Users', ['$http', function($http) {
    return {
        register: function(data, success, error) {
            $http.post('/users', data).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        },
        getUser: function(userId, success, error) {
            $http.get('/users?userId='+userId).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        },
        updateUser: function(userId, data, success, error) {
            data.userId = userId;
            $http.put('/users', data).success(function(res) {
                if(typeof success === 'function') success(res);
            }).error(function() {
                if(typeof error === 'function') error(res);
            });
        }
    };

}]);