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
    <script src="<?= asset_url() ?>js/angular/question.js"></script>
    <script src="<?= asset_url() ?>js/angular/option.js"></script>
</head>

<body data-ng-controller="QuestionCtrl">
<h1>Add</h1>

<form role="form" ng-submit="add()">
    <div class="form-group col-md-10">
        <input type="text" class="form-control" name="text" ng-model="text" placeholder="Enter text" required>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
</form>
<h1>show</h1>
<table>
    <div data-ng-repeat="ea in data track by $index">
        <h1>{{ $index + 1 }} <input type="text" ng-model-options="{ updateOn: 'blur' }"
                                    ng-change="update(ea)" ng-model="ea.id" disabled>
        </h1>

        <div> Text:
            <input type="text" ng-model-options="{ updateOn: 'blur' }"
                   ng-change="update(ea)" ng-model="ea.text">
        </div>
        <div> Action:
            <a class="btn btn-xs btn-default" ng-click="delete(ea)">
                Remove</a>
        </div>
        <h2>Topic: </h2>
        <div data-ng-controller="OptionCtrl">
            <div data-ng-repeat="item in options track by $in">
                <div>{{ $in + 1 }}</div>
                <div>{{ item.question_id }}</div>
                <div>{{ item.text }}</div>
                <div>{{ item.explain }}</div>
                <div>{{ item.correct }}</div>
            </div>
        </div>
        <hr>
    </div>
</table>
</body>
</html>