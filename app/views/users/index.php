<!doctype html>
<html lang="en" ng-app="app">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="container" ng-controller="UsersController">
    <h1>
        Users
        <input type="text" ng-model="userFilter" placeholder="Filter">
    </h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th ng-click="filterUsers('name')">Name</th>
                <th ng-click="filterUsers('age')">Age</th>
                <th>Delete?</th>
            </tr>
        </thead>

        <tbody>
            <tr ng-repeat="user in users | orderBy:filterType:reverse | filter : userFilter | limitTo: take">
                <td>{{ user.name }}</td>
                <td>{{ user.age }}</td>
                <td><button ng-click="deleteUser(user)">X</button></td>
            </tr>
        </tbody>
    </table>

    <button ng-hide="currentPage == 0">Previous</button>
    <button ng-hide="currentPage >= users.length / take">Next</button>
</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.10.0.js"></script>


<script>
    var app = angular.module('app', ['ui-bootstrap']);

    function UsersController($scope, $http) {
        $scope.users = <?= $users ?>;
        $scope.filterType = 'name';

        $scope.take = 3;
        $scope.currentPage = 0;

        $scope.deleteUser = function(user) {
            $scope.users.splice($scope.users.indexOf(user), 1);

            $http.delete('users/' + user.id);
        };

        $scope.filterUsers = function(filterType) {
            $scope.orderBy = filterType;
            $scope.reverse = ! $scope.reverse;
        };
    }

    app.filter('beginWith', function() {
        return function(users, start) {
            return users.splice(start);
        };
    });
</script>

</body>
</html>