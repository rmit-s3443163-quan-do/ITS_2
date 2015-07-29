<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */

$answer_number = 4;

?>


<div class="admin-main">
    <form action="<?= base_url('admin/question/add/') ?>" method="post">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="text">QUESTION TYPE <progress value="0"></progress></label>
                    <select name="question_type" class="form-control" id="type-select">
                        <option value="0">Only one correct answer</option>
                        <option value="1">None, One or Many correct answer/s</option>
                        <option value="2">Input correct answer</option>
                        <option value="3">Which of the following is/are true?</option>
                        <option value="4">Find the correct order</option>
                        <!--                    <option value="4">Find correct order</option>-->
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <label for="text">QUESTION TEXT</label>
                <input type="text" class="sm form-control" name="text" placeholder="text">
                <a class="add_response">Add general response</a>

                <div class="hidden">
                    <input type="text" name="explain_general" class="sm form-control" placeholder="response">
                    <a class="cancel_response">Cancel</a>
                </div>
            </div>
            <div class="type12">
                <?php for ($i = 0; $i < $answer_number; $i++): ?>
                    <div id="answer-group-<?= $i ?>" class="ag">
                        <div class="col-xs-12">
                            <div class="answer">
                                <div class="q-type radio">
                                    <label>
                                        <input type="radio" name="correct" value="<?= $i ?>">
                                        OPTION <?= $i + 1 ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <input type="text" name="option_<?= $i ?>" class="sm form-control" placeholder="text">

                        </div>
                        <div class="col-xs-12">
                            <a class="add_response">Add specific response</a>

                            <div class="hidden">
                                <input type="text" name="explain_<?= $i ?>" class="sm form-control"
                                       placeholder="response">
                                <a class="cancel_response">Cancel</a>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>

                <div id="option_end" class="col-xs-12 last">
                    <button type="button" class="btn btn-default" id="add_one">
                        Add one option
                    </button>
                    <button type="button" class="btn btn-default" id="remove_last">
                        Remove last option
                    </button>
                </div>
            </div>
            <div class="type3 hidden">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="text">CORRECT ANSWER(S)</label>
                        <input type="TEXT" class="form-control"
                               PLACEHOLDER="if more than one correct answer, separate by a semi-colon (;)"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <label for="text">TAG/S</label>
                <input type="text" class="form-control" name="tag"
                       placeholder="if there are many tags, separate by a semi-colon (;)">
            </div>
            <div class="col-xs-12 last">
                <button class="btn btn-default">Cancel</button>
                <!--            <button class="btn btn-default">Preview</button>-->
                <button type="submit" class="btn btn-primary">Add Question</button>
            </div>
        </div>
        <input type="hidden" name="answer_number" id="answer_number" value="<?= $answer_number ?>"/>
        <input type="hidden" name="course" value="<?= $course ?>"/>
    </form>
</div>

</div>
</div>
</div>

<script>

    $(document).ready(function () {

        var answer_number = <?= $answer_number ?>;

        $('#remove_last').click(function () {

            $('#answer-group-' + (answer_number - 1)).remove();
            answer_number--;
            $('#answer_number').val(answer_number);

        });

        $('#add_one').click(function () {

            var ts = $("#type-select").val() == 0 ? 'radio' : 'checkbox';

            var html = '<div class="ag" id="answer-group-' + answer_number + '">' +
                '<div class="col-xs-12"> <div class="answer"> <div class="q-type ' + ts + '"> <label>' +
                '<input type="' + ts + '" name="correct" value="' + answer_number + '">' +
                'OPTION ' + (answer_number + 1) +
                '</label> </div> </div> </div> <div class="col-xs-12"> <input name="option_' + answer_number +
                '" type="text" class="sm form-control" placeholder="text">' +
                '</div><div class="col-xs-12"> <a class="add_response">Add specific response</a>' +
                '<div class="hidden">' +
                '<input type="text" name="explain_<?= $i ?>" class="sm form-control" placeholder="response">' +
                '<a class="cancel_response">Cancel</a> </div> </div> </div>';

            $('#answer-group-' + (answer_number - 1)).after(html);

            sm();
            updateJS();

            answer_number++;
            $('#answer_number').val(answer_number);
        });

        var ts = $("#type-select");

        ts.change(function () {
            var val = $(this).val();

            if (val == 0) {

                $('.type12').removeClass('hidden');
                $('.type3').addClass('hidden');

                switch12(val);

            } else if (val == 1) {
                $('.type12').removeClass('hidden');
                $('.type3').addClass('hidden');

                switch12(val);

            } else if (val == 2) {
                $('.type3').removeClass('hidden');
                $('.type12').addClass('hidden');
            }

        });

        sm();
        updateJS();

        function updateJS() {

            $('.add_response').click(function () {
                $(this).siblings('div').removeClass('hidden');
                $(this).addClass('hidden');
            });

            $('.cancel_response').click(function () {
                var tmp = $(this).parent();

                tmp.siblings('.add_response').removeClass('hidden');
                tmp.addClass('hidden');
            });

        }

        function switch12(type) {
            console.log(type);

            var tmp1 = 'checkbox';
            var tmp2 = 'radio';

            if (type == 1) {
                tmp1 = 'radio';
                tmp2 = 'checkbox';
            }

            var q = $('.q-type');
            q.removeClass(tmp1).addClass(tmp2);
            var qc = q.find('input');
            qc.prop('type', tmp2);
            qc.prop('checked', false);

        }
        function sm() {
            $('input.sm').each(function () {

                var tmp = $(this);

                tmp.summernote({
                    focus: true,
                    toolbar: [
                        ['insert', ['picture']]
                    ],
                    onChange: function (e) {
                        tmp.val($(this).code());
                        tmp.change();

                    },
                    onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        document.execCommand('insertText', false, bufferText);
                    },
                    onImageUpload: function (files) {
                        sendFile(files[0], tmp);
                    }
                });


            });
        }

        function sendFile(file, tmp) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload)
                        myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                    return myXhr;
                },
                url: '<?= base_url('admin/images/upload') ?>',
                cache: false,
                contentType: false,
                processData: false,
                success: function (url) {
                    tmp.summernote("insertImage", url, 'wtv');
                }
            });
        }

        function progressHandlingFunction(e){
            console.log('loading..');
            if(e.lengthComputable){
                $('progress').attr({'value':e.loaded, 'max':e.total});
                console.log(e.loaded);
                // reset progress on complete
                if (e.loaded == e.total) {
                    $('progress').attr('value','0.0');
                }
            }
        }

    });
</script>
