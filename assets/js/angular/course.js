/**
 * Created by JayDz on 31/07/15.
 */

var its = angular.module('ITS', []);

its.controller('CourseCtrl', function ($scope, $http) {

    $http.get('../api/course').success(function(data){
        $scope.courses = data;
    }).error(function(data){
        $scope.courses = data;
    });

    $scope.refresh = function(){
        $http.get('../api/course').success(function(data){
            $scope.courses = data;
        }).error(function(data){
            $scope.courses = data;
        });
    };

    $scope.add = function(){
        var newItem = {
            text: $scope.text,
            description: $scope.description
        };
        $http.post('../api/course', newItem).success(function(data){
            $scope.refresh();
            $scope.text = '';
            $scope.description = '';

        }).error(function(data){
            alert(data.error);
        });
    };

    $scope.delete = function(item){
        $http.delete('../api/course/' + item.id);
        $scope.courses.splice($scope.courses.indexOf(item),1);
    };

    $scope.update = function(item){
        $http.put('../api/course', item).success(function(data){
            $scope.refresh();
        }).error(function(data){
            alert(data.error);
            $scope.refresh();

        });
    }

});