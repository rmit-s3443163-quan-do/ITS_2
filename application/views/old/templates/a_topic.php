<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 30/07/15
 * Time: 9:52 PM
 */

?>
<ul>

    <?php foreach ($topics as $top): ?>
        <li><a href="<?= base_url('admin/content/topic/' . $top->id) ?>"><?= $top->text ?><span
                    class="badge pull-right">10</span></a></li>
    <?php endforeach; ?>
</ul>
