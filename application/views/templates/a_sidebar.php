<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:18 PM
 */

$dashboard = $content = $user = $ats = $system = '';

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
    case 'system':
        $system = 'selected';
        break;
    default:
        $dashboard = 'selected';
        break;
}

?>

<div class="container admin-page">
    <div class="row">
        <div style="height: 150px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="a-sidebar col-xs-3 col-sm-1">
            <span class="<?= $dashboard ?> glyphicon glyphicon-dashboard" data-toggle="tooltip" data-placement="right"
                  title="Dashboard"></span>
            <a href="<?= base_url() ?>user_authentication/acourse">
            <span class="<?= $content ?> glyphicon  glyphicon-list-alt" data-toggle="tooltip" data-placement="right"
                  title="Content Manager"></span>
            </a>

            <span class="<?= $user ?> glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right"
                  title="User Manager"></span>

            <a href="<?= base_url() ?>admin/ats">
            <span class="<?= $ats ?> selected glyphicon fa fa-sitemap seperate" data-toggle="tooltip"
                  data-placement="right"
                  title="ATS Manager"></span>
            </a>

            <span class="<?= $system ?> glyphicon seperate glyphicon-cog" data-toggle="tooltip" data-placement="right"
                  title="System Config"></span>

            <span class="glyphicon glyphicon-off logout" data-toggle="tooltip" data-placement="right"
                  title="Logout"></span>
        </div>
