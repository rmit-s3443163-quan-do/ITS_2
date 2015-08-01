/**
 * Created by JayDz on 31/07/15.
 */

var its = angular.module('ITS', []);

its.controller('TopicCtrl', function ($scope, $http) {

    $http.get('../api/topic').success(function(data){
        $scope.data = data;
        console.log('loaded');
    }).error(function(data){
        $scope.data = data;
    });

    $scope.refresh = function(){
        $http.get('../api/topic').success(function(data){
            $scope.data = data;
            console.log('refreshed');

        }).error(function(data){
            $scope.data = data;
        });
    };

    $scope.add = function(){
        var newItem = {
            text: $scope.text,
            offering_id: $scope.offering_id
        };
        $http.post('../api/topic', newItem).success(function(data){
            $scope.refresh();
            $scope.text = '';
            $scope.offering_id = '';
            console.log('added');

        }).error(function(data){
            alert(data.error);
        });
    };

    $scope.delete = function(item){
        $http.delete('../api/topic/' + item.id);
        $scope.data.splice($scope.data.indexOf(item),1);
    };

    $scope.update = function(item){
        $http.put('../api/topic', item).success(function(data){
            console.log('updated');
            $scope.refresh();
        }).error(function(data){
            alert(data.error);
            $scope.refresh();

        });
    }

});