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
    <script src="<?= asset_url() ?>tools/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?= asset_url() ?>tools/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>tools/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset_url() ?>tools/css/MyFontsWebfontsKit.css">
    <link href="<?= asset_url() ?>css/style.css" media="screen" rel="stylesheet"/>
    <link href="<?= asset_url() ?>tools/css/star-rating.min.css" media="screen" rel="stylesheet"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


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
            <span class="glyphicon seperate glyphicon-cog" data-toggle="tooltip" data-placement="right"
                  title="System Config"></span>
            <span class="glyphicon glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                  title="Logout"></span>
        </div>
        <div class="col-xs-9 col-sm-11 a-content">
            <div class="a-sub-sidebar">
                <div class="admin-title">
                    Content Manager
                    <div class="sub-inline">
                        <div class=" sub-menu">
                            <span class="glyphicon glyphicon-king"></span>
                            <a href="<?= base_url() . 'user_authentication/acourse' ?>">Hierarchy</a>
                        </div>
                        <div class="selected sub-menu">
                            <span class="glyphicon glyphicon-list-alt"></span> Questions
                        </div>
                        <div class="sub-panel pull-right">
                            <span class="glyphicon glyphicon-home"></span> Homepage
                        </div>
                    </div>

                </div>
            </div>
            <div class="admin-main">
                <div class="row" style="margin: 10px">
                    <div class="panel filter">
                        Course &nbsp;
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Software Engineering
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Software Engineering</a></li>
                                <li><a href="#">Web Programming</a></li>
                                <li><a href="#">Database Concepts</a></li>
                            </ul>
                        </div>

                        &nbsp; &nbsp; Offering &nbsp;
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Sem 2, 2015
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a href="#">Sem 1, 2015</a></li>
                                <li><a href="#">Sem 2, 2015<div class="pull-right badge">cur</div></a></li>
                            </ul>
                        </div>

                        &nbsp; &nbsp; Topic &nbsp;
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Week 1
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                <li><a href="#">Week 1
                                        <div class="pull-right badge">8</div>
                                    </a></li>
                                <li><a href="#">Week 2
                                        <div class="pull-right badge">10</div>
                                    </a></li>
                                <li><a href="#">Week 3
                                        <div class="pull-right badge">13</div>
                                    </a></li>
                                <li><a href="#">Week 4
                                        <div class="pull-right badge">12</div>
                                    </a></li>
                                <li><a href="#">Week 5
                                        <div class="pull-right badge">10</div>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-success">
                            <span class="glyphicon glyphicon-refresh"></span> &nbsp; Load content
                            </button>
                        </div>
                    </div>

                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Text</th>
                            <th>Correct</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Text</th>
                            <th>Correct</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">I ..... tennis every Sunday morning.
                                </a>
                            </td>
                            <td>88%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Don't make so much noise. Noriko ..... to study for her ESL
                                    test!
                                </a>
                            </td>
                            <td>58%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Jun-Sik ..... his teeth before breakfast every morning.
                                </a>
                            </td>
                            <td>93%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Sorry, she can't come to the phone. She ..... a bath!
                                </a>
                            </td>
                            <td>64%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">I ..... tennis every Sunday morning.
                                </a>
                            </td>
                            <td>88%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Don't make so much noise. Noriko ..... to study for her ESL
                                    test!
                                </a>
                            </td>
                            <td>58%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Jun-Sik ..... his teeth before breakfast every morning.
                                </a>
                            </td>
                            <td>93%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Sorry, she can't come to the phone. She ..... a bath!
                                </a>
                            </td>
                            <td>64%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">I ..... tennis every Sunday morning.
                                </a>
                            </td>
                            <td>88%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>
                                <a href="#"
                                   data-toggle="tooltip" data-placement="top"
                                   title="Click to edit">Don't make so much noise. Noriko ..... to study for her ESL
                                    test!
                                </a>
                            </td>
                            <td>58%</td>
                            <td>
                                <span class="glyphicon glyphicon-eye-open"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Detail"></span>&nbsp; &nbsp;
                                <span class="glyphicon glyphicon-edit"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Edit"></span>&nbsp; &nbsp;
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#example').dataTable();
        });

        $('#add-button').click(function () {
            $(this).addClass('hidden');
            $('#add-form').removeClass('hidden');
            $('#course-title').focus();
        });

        $('.add-done').click(function () {
            $('#add-form').addClass('hidden');
            $('#add-button').removeClass('hidden');
        });

//
//        $('.sub-menu').hover(function () {
//            snabbt($(this).find('*'), {
//                fromPosition: [0, 0, 0],
//                position: [0, -3, 0],
//                easing: 'ease',
//                duration: 100
//            });
//        }, function () {
//            snabbt($(this).find('*'), {
//                fromPosition: [0, -3, 0],
//                position: [0, 0, 0],
//                easing: 'ease',
//                duration: 100
//            });
//        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
</body>
</html>
