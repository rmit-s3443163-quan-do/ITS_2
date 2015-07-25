<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:26 PM
 */

$result = $question = $survey = '';

switch ($topbar_selected) {
    case 'result':
        $result = 'selected';
        break;
    case 'question':
        $question = 'selected';
        break;
    case 'survey':
        $survey = 'selected';
        break;
    default:
        $result = 'selected';
        break;
}

?>

<div class="col-xs-9 col-sm-11 a-content">
    <div class="a-sub-sidebar">
        <div class="admin-title">
            ATS Manager
            <div class="sub-inline">
                <div class="<?= $result ?> sub-menu">
                    <span class="fa fa-tasks"></span>
                    <a href="<?= base_url() ?>admin/ats/result">Results</a>
                </div>
                <div class="<?= $question ?> sub-menu">
                    <span class="fa fa-list-alt"></span>
                    <a href="<?= base_url() ?>admin/ats/question">Questions</a>
                </div>
                <div class="<?= $survey ?> sub-menu">
                    <span class="fa fa-pie-chart"></span>
                    <a href="<?= base_url() ?>admin/ats/survey">Survey</a>
                </div>
                <div class="sub-panel pull-right">
                    <span class="glyphicon glyphicon-home"></span>
                    <a style="color: white" href="<?= base_url() . 'home/' ?>">Homepage</a>
                </div>
            </div>

        </div>
    </div>
