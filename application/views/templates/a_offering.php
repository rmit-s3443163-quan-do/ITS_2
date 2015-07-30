<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 30/07/15
 * Time: 11:24 AM
 */
?>
<dl>
    <? foreach ($offerings as $off): ?>
        <dt>
        <span class="click2">
            <?= $off->text ?>
        </span>

            <input type="hidden" name="text" value="<?= base_url('admin/offering/update/' . $off->id) ?>"/>
            <span class="badge pull-right">20</span>
        </dt>
        <dd>
        <span>
            <span class="click2">
                <?= date('d/m/Y', $off->start_date) ?>
            </span>
            <input type="hidden" name="start_date" value="<?= base_url('admin/offering/update/' . $off->id) ?>"/>
        </span>
            &nbsp;-&nbsp;
        <span>
            <span class="click2">
                <?= date('d/m/Y', $off->end_date) ?>
            </span>
            <input type="hidden" name="end_date" value="<?= base_url('admin/offering/update/' . $off->id) ?>"/>
        </span>
        </dd>
    <? endforeach; ?>
</dl>
<button id="mass2::<?= $offerings[0]->id ?>" type="button" class="btn btn-default btn-sm btn-mass-enrol">
    <span class="glyphicon glyphicon-plus"></span> &nbsp;Mass Enrol
</button>
<hr>
<h4>Topic List
    <div class="pull-right">
        <span id="addtopic2::<?= $offerings[0]->id ?>" class="btn-add-topic glyphicon glyphicon-plus"
              data-toggle="tooltip" data-placement="right"
              title="Add Topic"></span>
    </div>
</h4>
<div class="topic-add-here">
    <?= $topics ?>
    <? if (count($topics) == 0): ?>
        no topic for this offering yet
    <? endif; ?>
</div>