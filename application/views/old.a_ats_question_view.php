<form id="form-modal" action="<?= base_url('admin/question/update') ?>" method="post">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">View Question: <?= $question->id ?></h4> (click text to edit)<? $url; ?>

                <input type="hidden" name="id" value="<?= $question->id ?>"/>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Question:</label><br/>

                    <span class="question_edit"><?= htmlspecialchars_decode($question->text) ?>
                    </span>
                        <input type="hidden" name="text"/>
                    </div>
                    <hr/>
                    <? foreach ($options as $index => $opt) : ?>

                        <div class="form-group">

                            <label class="control-label">Option <?= $index + 1 ?>:</label>
                            <? if ($opt->correct == 1): ?><span class="correct">is correct answer. <span
                                    class="glyphicon glyphicon-ok"></span></span>
                            <? else: ?><span class="incorrect">is incorrect answer. <span
                                    class="glyphicon glyphicon-remove"></span></span>
                            <? endif; ?>

                            <div>
                                <span class="question_edit"><?= htmlspecialchars_decode($opt->text) ?></span>
                                <input type="hidden" name="option_<?= $opt->id ?>"/>
                            </div>
                            <i>Explanation:</i>

                            <div>
                                <span
                                    class="question_edit"><?= $opt->explain != '' ? htmlspecialchars_decode($opt->explain) : 'not set yet' ?></span>
                                <input type="hidden" name="explain_<?= $opt->id ?>"/>
                            </div>
                        </div>
                    <? endforeach; ?>
                    <hr/>
                    <div class="form-group">
                        <label class="control-label">Tag/s:</label>

                        <div class="question_edit">
                            <? if (count($tags) == 0): ?>
                                not set yet
                            <? else: ?>
                                <? foreach ($tags as $index => $tag) : ?>
                                    <?= $tag->text ?>;
                                <? endforeach; ?>
                            <? endif; ?>
                        </div>
                        <input type="hidden" name="tags"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Course/s:</label>

                        <div class="question_edit">
                            <? if (count($courses) == 0): ?>
                                not set yet
                            <? else: ?>
                                <? foreach ($courses as $index => $course) : ?>
                                    <?= $course->text ?>;
                                <? endforeach; ?>
                            <? endif; ?>
                        </div>
                        <input type="hidden" name="courses"/>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btn-save" type="submit" class="btn btn-primary">Save question</button>
            </div>
        </div>
    </div>

</form>

<script>
    var cur_edit = '';

    var qe = $('.question_edit');

    qe.tooltip({
        'title': 'click to edit',
        'placement': 'right'
    });

    qe.click(function () {
        if (cur_edit != '')
            save();

        cur_edit = $(this);
        var html = $(this).html() != 'not set yet' ? $(this).html() : '';
        $(this).after('<div id="temp"><div class="click2edit">' + html
            + '</div><button class="btn btn-primary" onclick="save()" type="button">Save</button></div>');
        $(this).hide();
        $('.click2edit').summernote({
            focus: true,
            toolbar: [
                ['insert', ['picture']]
            ],
            onPaste: function (e) {
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                e.preventDefault();
                document.execCommand('insertText', false, bufferText);
            }
        });

    });
    var save = function () {
        var aHTML = replace($('.click2edit').code());
        $('#temp').remove();
        cur_edit.html(aHTML);
        cur_edit.siblings('input').val(aHTML);
        cur_edit.show();
        cur_edit = '';

    };
    function replace(string) {
        return string.replace(/\"/g, '\'');
    }
</script>
