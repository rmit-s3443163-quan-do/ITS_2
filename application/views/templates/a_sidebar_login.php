<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:18 PM
 */

?>

<div class="container admin-page">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="a-sidebar col-xs-3 col-sm-1">


            <a href="<?= base_url('home'); ?>">
                <span class="glyphicon glyphicon-home" data-toggle="tooltip" data-placement="right"
                      title="Homepage"></span>
            </a>

            <a href="<?= base_url(); ?>home/logout">
                <span class="glyphicon glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                      title="Logout"></span>
            </a>
        </div>
