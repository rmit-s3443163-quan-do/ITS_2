/**
 * Created by JayDz on 1/08/15.
 */

app.controller('AdminController', function ($scope, courseFactory) {
    //$scope.filter_text = "P";
    $scope.courses = [];
    view();

    function view() {
        $scope.courses = courseFactory.get();
    }
});