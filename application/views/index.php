<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

<div class="container">
    <div class="row">
        <div style="height: 200px">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-xs-offset-0 col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="question-heading panel-heading">
                    Intelligent Tutoring System
                </div>
                <div class="panel-body">
                    <div class="question-title">
                        Welcome home, <?= $uname ?><br/>
                        <a href="<?= base_url(); ?>admin">ACP</a><br/>
                        <a href="<?= base_url(); ?>home/logout">Logout</a><br/>
                    </div>

                </div>
                <div class="panel-footer question-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>
