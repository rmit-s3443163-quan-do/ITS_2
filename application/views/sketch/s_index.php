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
                        Hello, <?= $uid ?><br/><a href="<?=base_url();?>admin/c_users/logout">Logout</a>
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
