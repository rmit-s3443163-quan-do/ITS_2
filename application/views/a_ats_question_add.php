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
        <div class="col-xs-12">
            <div class="form-group">
                <label for="text">QUESTION TYPE</label>
                <select name="question_type" class="form-control" id="type-select">
                    <option value="1">Only one correct answer</option>
                    <option value="2">None, One or Many correct answer/s</option>
                    <option value="3">Input correct answer</option>
                    <option value="4">Which of the following is/are true?</option>
                    <option value="5">Find the correct order</option>
                    <!--                    <option value="4">Find correct order</option>-->
                </select>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="text">QUESTION TEXT</label>
                <input class="hidden-sm" type="hidden" value="text"/>
                <input type="text" class="sm form-control" id="text" placeholder="text">
            </div>
        </div>
        <div class="type12">

            <?php for ($i = 0; $i < 4; $i++): ?>
                <div id="answer-group-<?= $i ?>" class="ag">
                    <div class="col-xs-12">
                        <div class="answer">
                            <div class="q-type radio">
                                <label>
                                    <input type="radio" name="correct" value="<?= $i ?>">
                                    OPTION <?= getKText($i) ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <input type="text" name="option_<?= $i ?>" class="sm form-control" placeholder="text">
                    </div>
                    <div class="col-xs-12">
                        <a class="add_response">Add response for this option</a>

                        <div class="hidden">
                            <input type="text" name="explain_<?= $i ?>" class="sm form-control" placeholder="response">
                            <a class="cancel_response">Cancel</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>

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

        <div id="option_end" class="col-xs-12 last">
            <button type="button" class="btn btn-default" id="remove_last">
                Remove last option
            </button>
            <button type="button" class="btn btn-default" id="add_one">
                Add one option
            </button>
        </div>

        <div class="col-xs-12 last">
            <div class="text-center">
                <button class="btn btn-default">Cancel</button>
                <button class="btn btn-primary">Next</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>

<script>

    var answer_number = <?= 4 ?>;
    var tmp = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    $('#remove_last').click(function () {

        $('#answer-group-' + (answer_number - 1)).remove();
        answer_number--;

    });

    $('#add_one').click(function () {

        var ts = $("#type-select").val() == 1 ? 'radio' : 'checkbox';

        var html = '<div class="ag" id="answer-group-' + answer_number + '">' +
            '<div class="col-xs-12"> <div class="answer"> <div class="q-type ' + ts + '"> <label>' +
            '<input type="' + ts + '" name="correct" value="' + answer_number + '">' +
            'OPTION ' + tmp[answer_number] +
            '</label> </div> </div> </div> <div class="col-xs-12"> <input name="option_' + answer_number +
            '" type="text" class="sm form-control" placeholder="text">' +
            '</div><div class="col-xs-12"> <a class="add_response">Add response for this option</a>'+
            '<div class="hidden">'+
            '<input type="text" name="explain_<?= $i ?>" class="sm form-control" placeholder="response">'+
            '<a class="cancel_response">Cancel</a> </div> </div> </div>';

        $('#answer-group-' + (answer_number - 1)).after(html);
        sm();
        updateJS();

        answer_number++;
    });

    var ts = $("#type-select");

    ts.change(function () {
        var val = $(this).val();

        if (val == 1) {

            $('.type12').removeClass('hidden');
            $('.type3').addClass('hidden');

            switch12(val);

        } else if (val == 2) {
            $('.type12').removeClass('hidden');
            $('.type3').addClass('hidden');

            switch12(val);

        } else if (val == 3) {
            $('.type3').removeClass('hidden');
            $('.type12').addClass('hidden');
        }

    });

    sm();
    updateJS();

    function updateJS() {

        $('a.add_response').click(function () {
            $(this).siblings('div').removeClass('hidden');
            $(this).addClass('hidden');
        });

        $('.cancel_response').click(function () {
            var tmp = $(this).parent();

            tmp.siblings('a.add_response').removeClass('hidden');
            tmp.addClass('hidden');
        });

    }

    function switch12(type) {
        console.log(type);

        var tmp1 = 'checkbox';
        var tmp2 = 'radio';

        if (type == 2) {
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
        $('input.sm').summernote({
            minHeight: 300,
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
    }

</script>
