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
    <script src="<?= asset_url() ?>js/angular/option.js"></script>
</head>

<body data-ng-controller="OptionCtrl">
<h1>Add</h1>

<form role="form" ng-submit="add()">
    <div class="form-group col-md-10">
        <input type="text" class="form-control" name="question_id" ng-model="question_id" placeholder="Enter question_id"
               required>
        <input type="text" class="form-control" name="text" ng-model="text" placeholder="Enter text" required>
        <input type="text" class="form-control" name="explain" ng-model="explain" placeholder="Enter explain" required>
        <input type="checkbox" name="correct" ng-model="status"> is correct?
    </div>
    <button type="submit" class="btn btn-default">Add</button>
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
                   ng-change="update(ea)" ng-model="ea.question_id">
        </td>
        <td style="text-align:center">
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.text">
        </td>
        <td style="text-align:center">
            <input class="todo" type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.explain">
        </td>
        <td style="text-align:center">
            <input class="todo" type="checkbox" ng-change="update(ea)"
                   ng-model="ea.correct" ng-true-value="'1'" ng-false-value="'0'"> is correct?
        </td>
        <td style="text-align:center">
            <a class="btn btn-xs btn-default" ng-click="delete(ea)">
                Remove</a>
        </td>
    </tr>
</table>
</body>
</html>