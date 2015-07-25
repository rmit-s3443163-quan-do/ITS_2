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
    <title>Sketch</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?= asset_url() ?>tools/js/jquery.min.js"></script>
    <script src="<?= asset_url() ?>tools/js/bootstrap.min.js"></script>
    <script src="<?= asset_url() ?>tools/js/star-rating.min.js"></script>
    <script src="<?= asset_url() ?>tools/js/snabbt.min.js"></script>
    <link rel="stylesheet" href="<?= asset_url() ?>tools/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>tools/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url() ?>tools/css/MyFontsWebfontsKit.css">
    <link href="<?= asset_url() ?>css/style.css" media="screen" rel="stylesheet"/>
    <link href="<?= asset_url() ?>tools/css/star-rating.min.css" media="screen" rel="stylesheet"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body>

<div class="container admin-page">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="a-sidebar col-xs-3 col-sm-1">
            <span class="glyphicon glyphicon-dashboard" data-toggle="tooltip" data-placement="right"
                  title="Dashboard"></span>
            <span class="glyphicon selected glyphicon-list-alt" data-toggle="tooltip" data-placement="right"
                  title="Content Manager"></span>
            <span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right"
                  title="User Manager"></span>
            <span class="glyphicon fa fa-sitemap seperate" data-toggle="tooltip" data-placement="right"
                  title="ATS Manager"></span>
            <span class="glyphicon seperate glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                  title="Logout"></span>
        </div>
        <div class="col-xs-9 col-sm-11 a-content">
            <div class="a-sub-sidebar">
                <div class="admin-title">
                    Offering Manager
                    <div class="sub-inline">
                        <div class=" sub-menu">
                            <span class="glyphicon glyphicon-king"></span>
                            <a href="<?= base_url() . 'user_authentication/acourse' ?>">Course</a>
                        </div>
                        <span class="glyphicon seperate glyphicon-chevron-right"></span>

                        <div class="selected sub-menu">
                            <span class="glyphicon glyphicon-queen"></span> Offering
                        </div>
                        <span class="glyphicon seperate glyphicon-chevron-right"></span>

                        <div class="sub-menu">
                            <span class="glyphicon glyphicon-bishop"></span>
                            <a href="<?= base_url() . 'user_authentication/atopic' ?>">Topic</a>
                        </div>
                        <span class="glyphicon seperate glyphicon-chevron-right"></span>

                        <div class="sub-menu">
                            <span class="glyphicon glyphicon-pawn"></span> Question
                        </div>
                        <div class="sub-menu">
                        </div>
                        <div class="sub-panel pull-right">
                            <span class="glyphicon glyphicon-home"></span> Homepage
                        </div>
                    </div>

                </div>
            </div>
            <div class="admin-main">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">Software Engineering
                                <div class="pull-right small-sub">
                                    <span class="glyphicon glyphicon-edit"
                                          data-toggle="tooltip" data-placement="right"
                                          title="Edit"></span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p><strong>Current:</strong> Sem 2, 2015<br/>
                                    <strong>Start date:</strong> 21 Jul 15<br/>
                                    <strong>End date:</strong> 31 Nov 15<br/>
                                    <strong>Enrolled Students:</strong> 127<br/>
                                </p>
                                <hr>
                                <h4>Topic List</h4>
                                <ul>
                                    <li>Week 1</li>
                                    <li>Week 2</li>
                                    <li>Week 3</li>
                                    <li>Week 4</li>
                                    <li>Week 5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">Database Concepts
                                <div class="pull-right small-sub">
                                    <span class="glyphicon glyphicon-edit"
                                          data-toggle="tooltip" data-placement="right"
                                          title="Edit"></span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p><strong>Current:</strong> Sem 2, 2015<br/>
                                    <strong>Start date:</strong> 21 Jul 15<br/>
                                    <strong>End date:</strong> 31 Nov 15<br/>
                                    <strong>Enrolled Students:</strong> 178<br/>
                                </p>
                                <hr>
                                <h4>Topic List</h4>
                                <ul>
                                    <li>Week 1</li>
                                    <li>Week 2</li>
                                    <li>Week 3</li>
                                    <li>Week 4</li>
                                    <li>Week 5</li>
                                    <li>Week 6</li>
                                    <li>Week 7</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">Web Programming
                                <div class="pull-right small-sub">
                                    <span class="glyphicon glyphicon-edit"
                                          data-toggle="tooltip" data-placement="right"
                                          title="Edit"></span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <p>No Offering for this course
                                </p>

                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> &nbsp;Add Offering</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>

        $('.sub-menu').hover(function () {
            snabbt($(this).find('*'), {
                fromPosition: [0, 0, 0],
                position: [0, -3, 0],
                easing: 'ease',
                duration: 100
            });
        }, function () {
            snabbt($(this).find('*'), {
                fromPosition: [0, -3, 0],
                position: [0, 0, 0],
                easing: 'ease',
                duration: 100
            });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</body>
</html>
