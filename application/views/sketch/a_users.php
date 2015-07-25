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
                    Mass users adding
                </div>
                <div class="panel-body">
                    <form action="<?=base_url();?>admin/c_users/add" method="post">
                        <input type="text" name="users" />
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                    <?php if (!$loggedin): ?>
                    <form action="<?=base_url();?>admin/c_users/login" method="post">
                        <input type="text" name="uid" /><input type="password" name="pwd" />
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <?php else: ?>
                        Hello, <?=$uid?><br/>
                        <a href="<?=base_url();?>admin/c_users/logout">Logout</a>
                    <?php endif; ?>
                </div>
                <div class="panel-footer question-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>
