<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<!DOCTYPE html>
<html lang="en" data-ng-app="ITS">
<head>
    <title>AngularJS</title>

    <script src="<?= asset_url() ?>tools/js/angular.min.js"></script>
    <script src="<?= asset_url() ?>js/angular/course.js"></script>
    <script src="<?= asset_url() ?>js/angular/offering.js"></script>
</head>

<body data-ng-controller="CourseCtrl">
<h1>show</h1>
<table>
    <tr data-ng-repeat="ea in courses track by $index">
        <td>{{ $index + 1 }}</td>
        <td>
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.id" disabled>
        </td>
        <td>
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.text">
        </td>
        <td style="text-align:center">
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.description">
        </td>
        <td>
            <h1>Offering</h1>

            <div data-ng-controller="OfferingCtrl">

                <div data-ng-repeat="offer in data track by $index">
                    <div>{{offer.text}}</div>
                </div>
            </div>
        </td>
        <td style="text-align:center">
            <a class="btn btn-xs btn-default" ng-click="delete(ea)">
                Remove</a>
        </td>
    </tr>
</table>
</body>
</html>