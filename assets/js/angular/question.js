/**
 * Created by JayDz on 31/07/15.
 */

var its = angular.module('ITS', []);

its.service('nested', function(){
    var question_id;

    this.setID = function(id) {
        question_id = id;
    }

    this.getID = function () {
        return question_id;
    }
});

its.controller('QuestionCtrl', function ($scope, $http) {

    $http.get('../api/question').success(function(data){
        $scope.data = data;
        console.log('loaded');
    }).error(function(data){
        $scope.data = data;
    });

    $scope.refresh = function(){
        $http.get('../api/question').success(function(data){
            $scope.data = data;

        }).error(function(data){
            $scope.data = data;
        });
    };

    $scope.add = function(){
        var newItem = {
            text: $scope.text,
        };
        $http.post('../api/question', newItem).success(function(data){
            $scope.refresh();
            $scope.text = '';

        }).error(function(data){
            alert(data.error);
        });
    };

    $scope.delete = function(item){
        $http.delete('../api/question/' + item.id);
        $scope.data.splice($scope.data.indexOf(item),1);
    };

    $scope.update = function(item){
        $http.put('../api/question', item).success(function(data){
            $scope.refresh();
        }).error(function(data){
            alert(data.error);
            $scope.refresh();

        });
    }

});