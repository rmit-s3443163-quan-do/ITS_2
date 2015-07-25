<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?= asset_url() ?>tools/js/jquery.min.js"></script>
    <script src="<?= asset_url() ?>tools/js/bootstrap.min.js"></script>
    <script src="<?= asset_url() ?>tools/js/star-rating.min.js"></script>
    <link rel="stylesheet" href="<?= asset_url() ?>tools/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>tools/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url() ?>tools/css/MyFontsWebfontsKit.css">
    <link href="<?= asset_url() ?>css/style.css" media="screen" rel="stylesheet"/>
    <link href="<?= asset_url() ?>tools/css/star-rating.min.css" media="screen" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <div class="row hidden-sm hidden-xs">
        <div class=" hidden-sm hidden-xs" style="height: 200px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="question-heading panel-heading">
                    Question 1 of 4: Only one correct answer.
                </div>
                <div class="panel-body">
                    <div class="question-title">
                        Sequence diagrams are best suited for:
                    </div>
                    <div class="question-option">
                        <div class="question-element left"><input type="radio" name="question"></div>
                        <div class="question-element">Low coupling and Low Cohesion</div>
                    </div>
                    <div class="question-option correct">
                        <div class="question-element left">
                            <span class="glyphicon glyphicon-ok"></span></div>
                        <div class="question-element">High coupling and High Cohesion</div>

                    </div>
                    <div class="question-option">
                        <div class="question-element left"><input type="radio" name="question"></div>
                        <div class="question-element">High Coupling and Low Cohesion</div>

                    </div>
                    <div class="question-option">
                        <div class="question-element left"><input type="radio" name="question"></div>
                        <div class="question-element">Low Coupling and High Cohesion</div>

                    </div>
                </div>
                <div class="panel-footer question-footer">
                    <div class="row">
                        <input class="rating" data-size="xs">

                        <div class="pull-right">
                            <form action="<?= base_url() ?>user_authentication/question/1/2">
                            <button style="margin-top: 5px; margin-right: 10px" type="submit" class="btn btn-primary">
                                <span class="glyphicon glyphicon-chevron-right"></span> next question
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>
