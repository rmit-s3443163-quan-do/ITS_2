/**
 * Created by JayDz on 1/08/15.
 */

var app = angular.module('ITSApp', ['ngRoute', 'ngResource', 'ui.bootstrap']);
var base_url = 'http://localhost/its/';
var asset_url = base_url+'assets/';

app.config(function ($routeProvider) {

    $routeProvider.when("/dashboard", {
        controller: "AdminController",
        templateUrl: asset_url+"app/views/a.dashboard.html"
    });
    $routeProvider.when("/content", {
        controller: "ContentController",
        templateUrl: asset_url+"app/views/a.content.html"
    });
    $routeProvider.otherwise({ redirectTo: "/dashboard" });

});