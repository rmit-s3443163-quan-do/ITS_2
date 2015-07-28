<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">View Question: <?= $question->id ?></h4>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Question:</label><br/>
                    <?= htmlspecialchars_decode($question->text) ?>
                </div>
                <? foreach ($options as $index => $opt) : ?>

                    <div class="form-group">
                        <label class="control-label">Option <?= $index + 1 ?>:</label><br/>
                        <?= htmlspecialchars_decode($opt->text) ?>
                    </div>
                <? endforeach; ?>
                <div class="form-group">
                    <label class="control-label">Tag/s:</label><br/>
                    <? foreach ($tags as $index => $tag) : ?>
                        <?= $tag->text ?>;
                    <? endforeach; ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Course/s:</label><br/>
                    <? foreach ($courses as $index => $course) : ?>
                        <?= $course->text ?>;
                    <? endforeach; ?>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
    </div>
</div>