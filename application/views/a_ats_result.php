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
            Result
            <div class="col-xs-3" id="add-button">
                <div class="panel panel-add">
                    <div class="panel-body text-center">
                        <h1><span class="glyphicon glyphicon-plus"></span></h1>
                        <h5>New Result</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $('#offer-input button').click(function () {
        $('#offer-input').addClass('hidden');
        $('#offer').removeClass('hidden');
    });

    $('#offer').click(function () {
        $(this).addClass('hidden');
        $('#offer-input').removeClass('hidden');
    });

    $('#add-button').click(function () {
        $(this).addClass('hidden');
        $('#add-form').removeClass('hidden');
        $('#course-title').focus();
    });

    $('.add-done').click(function () {
        $('#add-form').addClass('hidden');
        $('#add-button').removeClass('hidden');
    });
</script>
