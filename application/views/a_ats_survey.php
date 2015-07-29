<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<div class="admin-main">
    <div class="row" style="margin: 10px">
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Text</th>
                <th>Action</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>No</th>
                <th>Text</th>
                <th>Action</th>
            </tr>
            </tfoot>

            <tbody>
            <? foreach ($surveys as $index => $survey): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td>
                        <a id="<?= $survey->id ?>" class="survey_edit"><?= html_entity_decode($survey->text); ?></a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/survey/delete/' . $survey->id) ?>">
                            <span style="color: darkred" class="glyphicon glyphicon-remove" data-toggle="tooltip"
                                  data-placement="top" title="Delete"></span>
                        </a>
                    </td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>

    </div>
</div>


</div>
</div>
</div>


<script>
    $('#example').dataTable();

    var cur_edit = '';

    var qe = $('.survey_edit');

    qe.tooltip({
        'title': 'click to edit',
        'placement': 'right'
    });

    qe.click(function () {
        if (cur_edit != '')
            cancel();

        cur_edit = $(this);
        $(this).after('<div id="temp"><input type="text" class="form-control" value="' + $(this).html()
            + '"/><button class="btn btn-default" onclick="cancel()" type="button">Cancel</button>' +
            '<button class="btn btn-primary" onclick="save(' + $(this).attr('id') +
            ')" type="button">Save</button></div>');
        $(this).hide();

    });
    var save = function (id) {
        var temp = $('#temp');
        var text = $('#temp input').val();

        $.ajax({
            type: "POST",
            url: '<?= base_url('admin/survey/update') ?>',
            dataType: 'json',
            data: {id: id, text: text},
            beforeSend : function () {
                cur_edit.after(' <span id="updating" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>');
            },
            complete: function () {
                $('#updating').remove();

            }
        });
        temp.remove();
        cur_edit.html(text);
        cur_edit.show();
        cur_edit = '';

    };
    var cancel = function () {

        $('#temp').remove();
        cur_edit.show();
        cur_edit = '';
    };

</script>
