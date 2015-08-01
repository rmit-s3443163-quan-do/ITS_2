<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */

$count = 0;

?>


<div class="admin-main">
    <div class="row">
        <?php
        foreach ($courses_view as $cv) {
            echo $cv;
            $count++;
            if ($count%3==0)
                echo '<div class="clearfix"></div>';
        }
        ?>
        <div class="col-xs-4" id="add-form">
            <div class="panel-form panel panel-info hidden">
                <div class="panel-heading">
                    <input id="course-title" class="title-input form-control" placeholder="course title"/>
                </div>
                <div class="panel-body">
                    <input id="course-desc" class="form-control"
                           placeholder="course description"/>
                    <hr>
                    <button class="btn btn-default btn-small add-done" type="button">Cancel</button>
                    <button type="button" class="btn btn-primary add-done">
                        <span id="" class="glyphicon glyphicon-ok"></span> &nbsp;Save
                    </button>
                </div>
            </div>
            <div class="panel-refresh panel hidden">
                <div class="panel-body text-center">
                    <h1><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span></h1>
                </div>
            </div>
            <div class="panel panel-add">
                <div class="panel-body text-center">
                    <h1><span class="glyphicon glyphicon-plus"></span></h1>
                    <h5>New Course</h5>
                </div>
            </div>
        </div>
        <div class="col-xs-4" id="add-button">
        </div>

    </div>
</div>
</div>
</div>

<div class="modal fade offering-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">New Offering</div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="modal-text">Text</label>
                            <input name="offer-text" type="text" class="form-control" id="offer-text" placeholder="Sem 2, 2015; etc..">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="modal-start">Start Date</label>
                            <input name="offer-start" type="text" class="form-control" id="offer-start" placeholder="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="modal-end">End Date</label>
                            <input name="offer-end" type="text" class="form-control" id="offer-end" placeholder="dd-mm-yyyy">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="offering-save" type="button" class="btn btn-primary"  data-dismiss="modal">
                    <span id="<?= base_url('admin/offering/add') ?>/" class="glyphicon glyphicon-ok"></span> Save
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade topic-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">Add Topic</div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="modal2-text">Text</label>
                    <input name="topic-text" type="text" class="form-control" id="topic-text" placeholder="Week 1, practice, etc..">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="topic-save" type="button" class="btn btn-primary" data-dismiss="modal">
                    <span id="<?= base_url('admin/topic/add') ?>/" class="glyphicon glyphicon-ok"></span> Save
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade mass-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Mass Enrol</div>
            <div class="modal-body">
                <textarea rows="5" class="form-control" name="users" placeholder="input students email list here"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Save
                </button>
            </div>
        </div>
    </div>
</div>
<script>

    $('.panel-add').click(function () {
        var af = $('#add-form');
        af.find('.panel-form').removeClass('hidden');
        af.find('.panel-add').addClass('hidden');
        af.find('.panel-refresh').addClass('hidden');
        $('#course-title').focus();
    });

    $('.add-done').click(function () {

        var text = $('#course-title').val();
        var desc = $('#course-desc').val();
        var af = $('#add-form');
        $.ajax({
            type: "POST",
            url: '<?= base_url('admin/course/add') ?>',
            dataType: 'json',
            data: {text: text, description: desc},
            beforeSend: function () {
                af.find('.panel-form').addClass('hidden');
                af.find('.panel-refresh').removeClass('hidden');
            },
            complete: function (data) {
                af.before(data.responseText);
                click2();
                $('#course-title').val('');
                $('#course-desc').val('')
                af.find('.panel-form').addClass('hidden');
                af.find('.panel-add').removeClass('hidden');
                af.find('.panel-refresh').addClass('hidden');

            }
        });
    });

</script>