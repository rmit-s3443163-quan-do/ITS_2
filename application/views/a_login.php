<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<div class="admin-main">
    <div class="row space">
    </div>
    <div class="row">
        <div class="col-xs-offset-3 col-xs-6">
            <form action="<?= base_url() ?>admin/doLogin" method="post">
                <div class="form-group">
                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                        <input type="text" name="uname" class="form-control" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                        <input type="password" name="upass" class="form-control" placeholder="password">
                    </div>
                </div>
                <div>
                    <button style="width: 100%;" type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-chevron-right"></span> let me in
                    </button>
                </div>
            </form>

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

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
