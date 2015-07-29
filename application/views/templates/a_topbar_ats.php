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
                    <a href="<?= base_url('admin/ats/result') ?>">Results</a>
                </div>
                <div class="<?= $question ?> sub-menu">
                    <span class="fa fa-list-alt"></span>
                    <a href="<?= base_url('admin/ats/question') ?>">Questions</a>
                </div>
                <div class="<?= $survey ?> sub-menu">
                    <span class="fa fa-pie-chart"></span>
                    <a href="<?= base_url('admin/ats/survey') ?>">Survey</a>
                </div>
                <div class="sub-panel pull-right">
                    <span class="<?= $custom['glyph'] ?>"></span>
                    <a onclick="<?= $custom['function'] ?>" style="color: white" href="<?= $custom['link'] ?>"><?= $custom['text'] ?></a>
                </div>
            </div>

        </div>
    </div>
    <div class="bc">
        <ol class="breadcrumb">
            <? foreach ($breadcrumb as $index => $bc): ?>
                <? if ($index < count($breadcrumb)-1): ?>
                    <li><a href="<?= $bc['link'] ?>">
                            <?= $bc['text'] ?>
                        </a>
                    </li>
                <? else: ?>
                    <li class="active"><?= $bc['text'] ?></li>
                <? endif ?>
            <? endforeach; ?>
        </ol>
    </div>