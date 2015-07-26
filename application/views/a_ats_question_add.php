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
        <div class="col-xs-10">
            <div class="form-group">
                <label for="text">QUESTION TEXT</label>
                <input type="text" class="sm form-control" id="text" placeholder="text">
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group">
                <label for="text">MARK</label>
                <input type="number" class="form-control" value="1" placeholder="mark"/>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="text">CATEGORY</label>
                <select class="form-control" id="cate-select">
                    <option value="1">PreTest</option>
                    <option value="2">PostTest</option>
                    <option value="3">Software Engineer</option>
                    <option value="4">Web Programming</option>
                </select>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="text">QUESTION TYPE</label>
                <select class="form-control" id="type-select">
                    <option value="1">Only one correct</option>
                    <option value="2">Multi correct</option>
                    <option value="3">Find correct order</option>
                    <option value="4">Input correct answer</option>
                </select>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="text">NO OF OPTIONS</label>
                <input type="number" class="form-control" value="4" placeholder="1" min="1"/>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                <label for="text">DIFFICULTY</label>
                <input type="number" class="form-control" value="1" placeholder="1" min="1" max="5"/>
            </div>
        </div>
        <div class="type12">
            <div class="col-xs-12">
                <div class="answer">
                    <div class="q-type radio">
                        <label>
                            <input type="radio" name="correct" value="1">
                            OPTION A
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="text">
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="explain">
            </div>
            <div class="col-xs-12">
                <div class="answer">
                    <div class="q-type radio">
                        <label>
                            <input type="radio" name="correct" value="1">
                            OPTION B
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="text">
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="explain">
            </div>
            <div class="col-xs-12">
                <div class="answer">
                    <div class="q-type radio">
                        <label>
                            <input type="radio" name="correct" value="1">
                            OPTION C
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="text">
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="explain">
            </div>
            <div class="col-xs-12">
                <div class="answer">
                    <div class="q-type radio">
                        <label>
                            <input type="radio" name="correct" value="1">
                            OPTION D
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="text">
            </div>
            <div class="col-xs-6">
                <input type="text" class="sm form-control" placeholder="explain">
            </div>
        </div>
        <div class="type3 hidden">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="text">CORRECT ANSWER(S)</label>
                    <input type="TEXT" class="form-control"
                           PLACEHOLDER="if more than one correct answer, separate by ';'"/>
                </div>
            </div>
        </div>

        <div class="col-xs-12 last">
            <div class="text-center">
                <button class="btn btn-default">Cancel</button>
                <button class="btn btn-primary">Add Question</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>

<script>

    $('#cate-select').val(<?= $cate ?>);

    $('#type-select').change(function () {
        var val = $(this).val();

        if (val == 1) {
            $('.type12').removeClass('hidden');
            $('.type3').addClass('hidden');

            var q = $('.q-type');
            q.removeClass('checkbox').addClass('radio');
            var qc = q.find('input');
            qc.prop('type', 'radio');
            qc.prop('checked', false);

        } else if (val == 2) {
            $('.type12').removeClass('hidden');
            $('.type3').addClass('hidden');

            var q = $('.q-type');
            q.removeClass('radio').addClass('checkbox');
            var qc = q.find('input');
            qc.prop('type', 'checkbox');
            qc.prop('checked',false);

        } else if (val == 3) {
            $('.type3').removeClass('hidden');
            $('.type12').addClass('hidden');
        }

    });

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
</script>
