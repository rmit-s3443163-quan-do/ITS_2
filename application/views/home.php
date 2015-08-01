<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 1/08/15
 * Time: 5:14 AM
 */
?>

<html data-ng-app="ITSApp">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
    <title>ITS</title>
    <link href="<?= asset_url() ?>tools/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?= asset_url() ?>tools/css/toaster.min.css" rel="stylesheet"/>
    <link href="<?= asset_url() ?>tools/css/loading-bar.css" rel="stylesheet"/>
    <link href="<?= asset_url() ?>css/site.css" rel="stylesheet"/>
    <link href="<?= asset_url() ?>css/style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!--    <link href="favicon.ico" rel="shortcut icon" />-->
</head>
<body>
<div class="container">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="a-sidebar col-xs-3 col-sm-1">
            <a href="#admin">
            <span class="grow glyphicon glyphicon-dashboard" data-toggle="tooltip" data-placement="right"
                  title="Dashboard"></span>
            </a>
            <a href="#content">
            <span class="grow glyphicon  glyphicon-list-alt" data-toggle="tooltip" data-placement="right"
                  title="Content Manager"></span>
            </a>
        </div>
        <div class="col-xs-9 col-sm-11 a-content">
            <div class="a-sub-sidebar">
                <div class="admin-title">
                    Content Manager
                </div>
            </div>
            <div class="admin-main" data-ng-view="">
                hey
            </div>
        </div>
    </div>
</div>
</body>
</html>
<!-- 3rd party libraries -->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>tools/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular-route.min.js"></script>
<script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular-resource.min.js"></script>
<script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.6/angular-animate.min.js"></script>
<script type="text/javascript"
        src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.9.0/ui-bootstrap.min.js"></script>
<script type="text/javascript"
        src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.9.0/ui-bootstrap-tpls.min.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>tools/js/toaster.min.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>tools/js/loading-bar.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>app/app.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>app/services/AdminServices.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>app/controllers/AdminController.js"></script>
<script type="text/javascript" src="<?= asset_url() ?>app/controllers/ContentController.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
