<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<div class="admin-main">
    <div class="row">
        <?php foreach ($questions as $index => $question): ?>

            <div class="question col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        [<a href="<?= base_url() ?>admin/ats/question/add/<?= $question['course_id'] ?>">
                        <span class="glyphicon glyphicon-plus"
                              data-toggle="tooltip" data-placement="top"
                              title="Add Question"></span></a>] &nbsp;

                        <?= $question['title'] ?>

                    </div>
                    <div class="panel-body">
                        <table class="dtable display" cellspacing="0" width="100%">
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

                            <?php foreach ($question['list'] as $i => $q): ?>
                                <tr id="tr_<?= $q->id ?>">
                                    <td><?= $i + 1 ?></td>
                                    <td>
                                        <?= (strlen($q->text) < 40 ? $q->text : substr($q->text, 0, 100) . '..') ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url() ?>admin/question/view/<?= $q->id ?>"
                                           id="modal_activate_<?= $q->id ?>">
                                    <span class="glyphicon glyphicon-eye-open"
                                          data-toggle="tooltip" data-placement="top"
                                          title="Detail"></span>
                                        </a>
                                        &nbsp; &nbsp;
                                        <a href="<?= base_url() ?>admin/question/delete/<?= $q->id ?>"
                                           id="question-delete-<?= $q->id ?>">
                                <span style="color: darkred" class="glyphicon glyphicon-remove"
                                      data-toggle="tooltip" data-placement="top"
                                      title="Delete"></span>
                                        </a>


                                    </td>
                                </tr>
                                <script>
                                    $('#modal_activate_<?= $q->id ?>').loadingbar({
                                        async: true,
                                        cache: true,
                                        global: true,
                                        dataType: "html",
                                        done: function (data) {
                                            var modal = $('#myModal');
                                            modal.html(data);
                                            modal.modal('show');
                                        }
                                    });
                                    $('#question-delete-<?= $q->id ?>').loadingbar({
                                        async: true,
                                        cache: true,
                                        global: true,
                                        dataType: "html",
                                        done: function (data) {
                                            console.log('done');
                                            if (/okkkk/.test(data)) {
                                                $.notify(data.split('::')[1], 'success');
                                                $('.dtable').DataTable().row('#tr_' +<?= $q->id ?>).remove().draw(false);
//                                                $('#tr_' +<?//= $q->id ?>//).remove();
                                            } else
                                                $.notify(data.split('::')[1], 'warn');
                                        }
                                    });
                                </script>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>


    </div>
</div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
</div>


</div>
</div>
</div>


<script>

    var entityMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': '&quot;',
        "'": '&#39;',
        "/": '&#x2F;'
    };

    function escapeHtml(string) {
        return String(string).replace(/[&<>"'\/]/g, function (s) {
            return entityMap[s];
        });
    }
    $(document).ready(function () {
        $('.dtable').dataTable({
            "pageLength": 5,
            "bLengthChange": false,
            language: {
                searchPlaceholder: "search records"
            }
        });
    });

</script>
