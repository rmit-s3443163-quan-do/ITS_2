<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:18 PM
 */

$home = $ats = '';

if ($side == 'ats')
    $ats = 'selected';
else
    $home = 'selected';

?>

<div class="container">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-xs-1 a-sidebar h-sidebar">
            <a href="<?= base_url('home'); ?>">
                <span class="<?= $home ?> grow glyphicon glyphicon-home" data-toggle="tooltip" data-placement="right"
                      title="ITS Homepage"></span>
            </a>
            <a href="<?= base_url('home/ats') ?>">
            <span class="<?= $ats ?> grow glyphicon fa fa-sitemap " data-toggle="tooltip"
                  data-placement="right"
                  title="ATS"></span>
            </a>
            <a href="<?= base_url('admin'); ?>">
                <span class="grow glyphicon glyphicon-flash seperate" data-toggle="tooltip" data-placement="right"
                      title="AdminCP"></span>
            </a>

            <a href="<?= base_url('home/logout'); ?>">
                <span class="grow glyphicon glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                      title="Logout"></span>
            </a>
        </div>
        <div class="col-xs-11">