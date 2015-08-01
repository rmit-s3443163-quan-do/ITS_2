/**
 * Created by JayDz on 31/07/15.
 */

//var its = angular.module('ITS', []);

its.controller('OfferingCtrl', function ($scope, $http) {

    var course_id = $scope.$parent.ea.id;
    // tao lam nhu nay dc ko
     console.log(course_id); // oktao can lay dc cai ea.id o day
    //return;

    $http.get('../api/offering/'+course_id).success(function(data){
        $scope.data = data;
        console.log('loaded');
    }).error(function(data){
        $scope.data = data;
    });

    $scope.refresh = function(){
        $http.get('../api/offering').success(function(data){
            $scope.data = data;
            console.log('refreshed');

        }).error(function(data){
            $scope.data = data;
        });
    };

    $scope.add = function(){
        var newItem = {
            text: $scope.text,
            start_date: $scope.start_date,
            end_date: $scope.end_date
        };
        $http.post('../api/offering', newItem).success(function(data){
            $scope.refresh();
            $scope.text = '';
            $scope.start_date = '';
            $scope.end_date = '';
            console.log('added');

        }).error(function(data){
            alert(data.error);
        });
    };

    $scope.delete = function(item){
        $http.delete('../api/offering/' + item.id);
        $scope.data.splice($scope.data.indexOf(item),1);
    };

    $scope.update = function(item){
        $http.put('../api/offering', item).success(function(data){
            console.log('updated');
            $scope.refresh();
        }).error(function(data){
            alert(data.error);
            $scope.refresh();

        });
    }

});