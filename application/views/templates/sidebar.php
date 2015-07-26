<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:18 PM
 */

?>

<div class="container">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="a-sidebar hidden-xs col-sm-1 h-sidebar">
            <div class="wrap-title">
                <div class="site-title" data-toggle="tooltip" data-placement="right"
                     title="welcome to Intelligent Tutoring System">ITS
                </div>
            </div>
            <a href="<?= base_url('admin'); ?>">
                <span class="glyphicon glyphicon-flash" data-toggle="tooltip" data-placement="right"
                      title="AdminCP"></span>
            </a>

            <a href="<?= base_url('home/logout'); ?>">
                <span class="glyphicon glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                      title="Logout"></span>
            </a>
        </div>