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
            <?php foreach ($surveys as $index=>$survey): ?>
                <tr id="tr_<?= $survey->id ?>">
                    <td><?= $index + 1 ?></td>
                    <td>
                        <a id="<?= $survey->id ?>" class="survey_edit"><?= html_entity_decode($survey->text); ?></a>
                    </td>
                    <td>
                        <a id="survey-delete-<?= $survey->id ?>" href="<?= base_url('admin/survey/delete/' . $survey->id) ?>">
                            <span style="color: darkred" class="glyphicon glyphicon-remove" data-toggle="tooltip"
                                  data-placement="top" title="Delete"></span>
                        </a>

                        <script>
                            $('#survey-delete-<?= $survey->id ?>').loadingbar({
                                error: function (xhr, text, e) {
                                    $.notify('Errors occurred!!!!', 'error');
                                },
                                success: function (data, text, xhr) {
                                },
                                async: true,
                                cache: true,
                                global: true,
                                dataType: "html",
                                done: function (data) {
                                    console.log(data);
                                    if (/okkkk/.test(data)) {
                                        $.notify(data.split('::')[1], 'success');
                                        $('#example').DataTable().row('#tr_<?= $survey->id ?>').remove().draw(true);

                                        var index = $('#end-flag').val();
                                        $('#end-flag').val(parseInt(index) - 1);
                                    } else
                                        $.notify(data.split('::')[1], 'warn');
                                }
                            });
                        </script>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <input type="hidden" id="end-flag" value="<?= count($surveys) ?>"/>

    </div>
</div>


</div>
</div>
</div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Add Survey</div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="new-text">Text</label>
                    <input type="text" class="form-control" id="new-text" placeholder="survey text">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="bt-add">
                    <span class="glyphicon glyphicon-plus"></span> Add
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#bt-add').click(function () {
        var text = $('#new-text');
        var val = text.val();

        $.ajax({
            type: "POST",
            url: '<?= base_url('admin/survey/add') ?>',
            dataType: 'json',
            data: {text: val},
            beforeSend: function () {
            },
            complete: function (data) {
                if (!isNaN(data.responseText)) {
                    var table = $('#example').DataTable();

                    var index = $('#end-flag').val();
                    table.row.add([parseInt(index) + 1,
                            '<a id="' + data.responseText + '" class="survey_edit">' + val + '</a>',
                            '<a href="<?= base_url('admin/survey/del') ?>/' + data.responseText + '">' +
                            '<span style="color: darkred" class="glyphicon glyphicon-remove" data-toggle="tooltip"' +
                            'data-placement="top" title="Delete"></span></a>'
                        ]
                    ).draw();
                    $('#end-flag').val(parseInt(index) + 1);
                    qe();
                    text.val('');
                    $('#myModal').modal('hide');

                }

            }
        })
        ;

        text.val('');
        $('#myModal').modal('hide');

    })
    ;

    function addSurvey(e) {
        var modal = $('#myModal');
        modal.modal('show');
        modal.find('#new-text').focus();
        return false;
    }

    $('#example').dataTable();

    var cur_edit = '';

    qe();

    function qe() {
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
    }


    var save = function (id) {
        var temp = $('#temp');
        var text = $('#temp input').val();

        $.ajax({
            type: "POST",
            url: '<?= base_url('admin/survey/update') ?>',
            dataType: 'json',
            data: {id: id, text: text},
            beforeSend: function () {
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
