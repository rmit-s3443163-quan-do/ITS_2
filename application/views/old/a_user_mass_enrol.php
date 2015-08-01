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
        <div class="col-xs-12">
            under construction - user mass enrol
        </div>

    </div>
</div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('#example').dataTable();
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
</body>
</html>
