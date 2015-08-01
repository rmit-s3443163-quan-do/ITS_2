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
    <script src="<?= asset_url() ?>js/angular/topic.js"></script>
</head>

<body data-ng-controller="TopicCtrl">
<h1>Add</h1>

<form role="form" ng-submit="add()">
    <div class="form-group col-md-10">
        <input type="text" class="form-control" name="offering_id" ng-model="offering_id" placeholder="Enter offering_id" required>
        <input type="text" class="form-control" name="text" ng-model="text" placeholder="Enter text" required>
    </div>
    <button type="submit" class="btn btn-default">Add </button>
</form>
<h1>show</h1>
<table>
    <tr data-ng-repeat="ea in data track by $index">
        <td>{{ $index + 1 }}</td>
        <td>
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.id" disabled>
        </td>
        <td>
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.offering_id">
        </td>
        <td>
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.text">
        </td>
        </td>
        <td style="text-align:center">
            <a class="btn btn-xs btn-default" ng-click="delete(ea)">
                Remove</a>
        </td>
    </tr>
</table>
</body>
</html>