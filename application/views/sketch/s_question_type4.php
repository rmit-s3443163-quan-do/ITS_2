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
    <script src="<?=asset_url()?>tools/js/jquery.min.js"></script>
    <script src="<?=asset_url()?>tools/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=asset_url()?>tools/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=asset_url()?>tools/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_url()?>tools/css/MyFontsWebfontsKit.css">
    <link href="<?=asset_url()?>css/style.css" media="screen" rel="stylesheet" />
</head>
<body>

<div class="container">
    <div class="row">
        <div style="height: 200px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="question-heading panel-heading">
                    Question 4 of 4: Input correct answer.
                </div>
                <div class="panel-body">
                    <div class="question-title">
                        5 + 6 =
                    </div>
                    <div class="question-option">
                        <input type="text" placeholder="your answer here" style="border: none; width: 100%; outline: none;">
                    </div>

                </div>
                <div class="panel-footer question-footer">
                    <a href="3">Back</a>
                    <a href="1">Next</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>
