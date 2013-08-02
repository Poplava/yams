'use strict';

app.controller('IssuesCtrl', ['$scope', '$http', 'Users', function($scope, $http, Users) {

    $scope.issuesCollection = [
        {
            issueId: 1,
            parentId: 0,
            issueTypeId: 0,
            issueStatusId: 0,
            assigneeUserId: 1,
            authorUserId: 1,
            title: "Issue 1",
            description: 'Issue 1 description',
            createdOn: '2013-07-30 19:36:20',
            updatedOn: '2013-08-01 19:36:20',
            percentDone: 10
        },
        {
            issueId: 2,
            parentId: 0,
            issueTypeId: 0,
            issueStatusId: 0,
            assigneeUserId: 1,
            authorUserId: 1,
            title: "Issue 2",
            description: 'Issue 2 description',
            createdOn: '2013-05-30 19:36:20',
            updatedOn: '2013-07-01 19:36:20',
            percentDone: 10
        },
        {
            issueId: 3,
            parentId: 0,
            issueTypeId: 0,
            issueStatusId: 0,
            assigneeUserId: 1,
            authorUserId: 1,
            title: "Super Issue 3",
            description: 'Issue 3 description',
            createdOn: '2013-04-30 19:36:20',
            updatedOn: '2013-05-01 19:36:20',
            percentDone: 30
        }
    ];

    $scope.issuesTypes = [
        {
            title: "My issues"
        },
        {
            title: "Pull"
        }
    ];

    $scope.issuesTypeActive = $scope.issuesTypes[0];

    $scope.setIssuesType = function(a) {
        $scope.issuesTypeActive = a;
    };
}]);