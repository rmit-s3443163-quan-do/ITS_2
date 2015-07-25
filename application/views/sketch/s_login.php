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
    <link href="<?=asset_url()?>css/login_style.css" media="screen" rel="stylesheet" />
</head>
<body>


<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">
                <div class="container">
                <div class="row">
                    <div class="col-xs-offset-0 col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
                        <div class="row">
                            <div class="col-xs-offset-0 col-xs-12 col-sm-offset-1 col-sm-10">
                                <div id="logo"></div>
                                <form action="question_page">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" placeholder="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </span>
                                            <input type="password" class="form-control" placeholder="password">
                                        </div>
                                    </div>
                                    <div>
                                    <button style="width: 100%;" type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-chevron-right"></span> let me in
                                    </button>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <a href="#"><em><input name="rmb" type="checkbox"> remember me</em></a>
                                        </label>
                                        <div class="pull-right">
                                            <a href="#"><em>forget password</em></a>
                                        </div>
                                    </div>
                                    <div class="hidden-space">
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Warning!</strong>
                                            <ul>
                                                <li>Username is required.</li>
<!--                                                <li>Password is required.</li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
