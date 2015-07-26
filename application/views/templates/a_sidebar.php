<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:18 PM
 */

$dashboard = $content = $user = $ats = $config = '';

$sidebar_selected = isset($sidebar_selected) ? $sidebar_selected : 'ats';

switch ($sidebar_selected) {
    case 'dashboard':
        $dashboard = 'selected';
        break;
    case 'content':
        $content = 'selected';
        break;
    case 'user':
        $user = 'selected';
        break;
    case 'ats':
        $ats = 'selected';
        break;
    case 'config':
        $config = 'selected';
        break;
}

?>

<div class="container admin-page">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="a-sidebar col-xs-3 col-sm-1">


            <a href="<?= base_url('admin/dashboard') ?>">
            <span class="<?= $dashboard ?> glyphicon glyphicon-dashboard" data-toggle="tooltip" data-placement="right"
                  title="Dashboard"></span>
            </a>

            <a href="<?= base_url('admin/content') ?>">
            <span class="<?= $content ?> glyphicon  glyphicon-list-alt" data-toggle="tooltip" data-placement="right"
                  title="Content Manager"></span>
            </a>

            <a href="<?= base_url('admin/user') ?>">
            <span class="<?= $user ?> glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right"
                  title="User Manager"></span>
            </a>

            <a href="<?= base_url('admin/ats') ?>">
            <span class="<?= $ats ?> glyphicon fa fa-sitemap seperate" data-toggle="tooltip"
                  data-placement="right"
                  title="ATS Manager"></span>
            </a>

            <a href="<?= base_url('admin/config') ?>">
            <span class="<?= $config ?> glyphicon seperate glyphicon-cog" data-toggle="tooltip" data-placement="right"
                  title="System Config"></span>
            </a>

            <a href="<?= base_url(); ?>admin/doLogout">
                <span class="glyphicon glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                      title="Logout AdminCP"></span>
            </a>
        </div>
