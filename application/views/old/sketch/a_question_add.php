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
                    Add new question
                </div>
                <div class="panel-body">
                    <div class="question-title">
                        <input type="text" placeholder="question title">
                    </div>
                    Question type:
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default">Choose one</button>
                        <button type="button" class="btn btn-default">Choose many</button>
                        <button type="button" class="btn btn-default">Find order</button>
                        <button type="button" class="btn btn-default">Input result</button>
                    </div>

                </div>
                <div class="panel-footer question-footer">
                    <div class="row">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-chevron-right"></span> add question
                        </button>
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
