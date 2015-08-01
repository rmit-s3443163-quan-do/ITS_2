/**
 * Created by JayDz on 31/07/15.
 */

//var its = angular.module('ITS', []);

its.controller('OptionCtrl', function ($scope, $http) {

    console.log('id ' + question_id);
    $scope.refresh();

    $scope.refresh = function () {
        $http.get('../api/option/' + question_id).success(function (data) {
            $scope.options = data;
        }).error(function (data) {
            $scope.data = data;
        });
    };

    $scope.add = function () {
        var newItem = {
            question_id: $scope.question_id,
            text: $scope.text,
            explain: $scope.explain,
            correct: $scope.correct
        };
        $http.post('../api/option', newItem).success(function (data) {
            $scope.refresh();
            $scope.question_id = '';
            $scope.text = '';
            $scope.explain = '';
            $scope.correct = 0;
            console.log('added');

        }).error(function (data) {
            alert(data.error);
        });
    };

    $scope.delete = function (item) {
        $http.delete('../api/option/' + item.id);
        $scope.data.splice($scope.data.indexOf(item), 1);
    };

    $scope.update = function (item) {
        $http.put('../api/option', item).success(function (data) {
            console.log('updated');
            $scope.refresh();
        }).error(function (data) {
            alert(data.error);
            $scope.refresh();

        });
    }

});