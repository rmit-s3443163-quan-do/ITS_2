<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:26 PM
 */

$question = $hierarchy = '';

switch ($topbar_selected) {
    case 'question':
        $question = 'selected';
        break;
    default:
        $hierarchy = 'selected';
        break;
}

?>

<div class="col-xs-9 col-sm-11 a-content">
    <div class="a-sub-sidebar">
        <div class="admin-title">
            Content Manager
            <div class="sub-inline">
                <div class="<?= $hierarchy ?> sub-menu">
                    <span class="glyphicon glyphicon-king"></span>
                    <a href="<?= base_url('admin/content/hierarchy') ?>">Hierarchy</a>
                </div>
                <div class="<?= $question ?> sub-menu seperate">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <a href="<?= base_url('admin/content/question') ?>">Questions</a>
                </div>

                <div class="sub-panel pull-right">
                    <span class="glyphicon glyphicon-home"></span>
                    <a style="color: white" href="<?= base_url('home/') ?>">Homepage</a>
                </div>
            </div>

        </div>
    </div>
