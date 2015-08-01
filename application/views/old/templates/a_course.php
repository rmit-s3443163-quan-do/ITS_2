<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 30/07/15
 * Time: 11:24 AM
 */
?>

<div class="col-xs-4">
    <div class="panel panel-info course-panel">
        <div class="panel-heading">
            <span class="click2">
                <?= $course->text ?>
            </span>
            <input type="hidden" name="text" value="<?= base_url('admin/course/update/' . $course->id) ?>"/>

        </div>
        <div class="panel-body">
            <span class="click2">
                <?= $course->description ?>
            </span>
            <input type="hidden" name="description" value="<?= base_url('admin/course/update/' . $course->id) ?>"/>
            <hr>
            <h4>Offerings
                <div class="pull-right">
                    <span id="add2::<?= $course->id ?>" class="btn-add-offering glyphicon glyphicon-plus"
                          data-toggle="tooltip" data-placement="right"
                          title="New Offering"></span>
                </div>
            </h4>
            <div class="offer-add-here">
                <?= $offerings ?>

                <?php if (count($offerings) == 0): ?>
                    no offering for this course yet
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>