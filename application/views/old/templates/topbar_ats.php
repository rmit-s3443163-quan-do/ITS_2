<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:26 PM
 */

$pre_test = $practice = $post_test = $survey = $result = '';

switch ($topbar_selected) {
    case 'practice':
        $practice = 'selected';
        break;
    case 'post_test':
        $post_test = 'selected';
        break;
    case 'survey':
        $survey = 'selected';
        break;
    case 'result':
        $result = 'selected';
        break;
    default:
        $pre_test = 'selected';
        break;
}

?>

<div class="home-nav text-center">

    <ul class="nav nav-justified">

        <li class="<?= $pre_test ?> available-step">
            <a href="<?= base_url('home/pre_test'); ?>">
                <span class="fa fa-flag-o"></span>
                <span class="p">Pre-Test</span>
            </a>
        </li>

        <li class="<?= $practice ?> available-step">
            <a href="<?= base_url('home/practice'); ?>">
                <span class="fa fa-sitemap"></span>
                <span class="p">Practice</span>
            </a></li>

        <li class="<?= $post_test ?> available-step">
            <a href="<?= base_url('home/post_test'); ?>">
                <span class="fa fa-flag-checkered"></span>
                <span class="p">Post</span>
            </a></li>

        <li class="<?= $result ?> available-step">
            <a href="<?= base_url('home/result'); ?>">
                <span class="fa fa-pie-chart"></span>
                <span class="p">Result</span>
            </a></li>

        <li class="<?= $survey ?> available-step">
            <a href="<?= base_url('home/survey'); ?>">
                <span class="fa fa-tasks"></span>
                <span class="p">Survey</span>
            </a></li>
    </ul>

</div>

<script>
    $('.available-step').hover(function () {

        snabbt($(this).find('.fa'), {
            fromPosition: [0, -50, 0],
            position: [0, 0, 0],
            easing: 'ease',
            duration: 300
        });
        snabbt($(this).find('.p'), {
            fromPosition: [0, 50, 0],
            position: [0, 0, 0],
            easing: 'ease',
            duration: 300
        });
    }, function () {

    });

</script>