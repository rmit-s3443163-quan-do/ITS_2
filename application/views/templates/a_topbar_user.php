<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 25/07/15
 * Time: 7:26 PM
 */

$queries = $mass_enrol = $contribute = $list = '';

switch ($topbar_selected) {
    case 'queries':
        $queries = 'selected';
        break;
    case 'mass_enrol':
        $mass_enrol = 'selected';
        break;
    case 'contribute':
        $contribute = 'selected';
        break;
    default:
        $list = 'selected';
        break;
}

?>

<div class="col-xs-9 col-sm-11 a-content">
    <div class="a-sub-sidebar">
        <div class="admin-title">
            User Manager
            <div class="sub-inline">
                <div class="<?= $list ?> sub-menu seperate">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <a href="<?= base_url('admin/user/list') ?>">List</a>
                </div>
                <div class="<?= $mass_enrol ?> sub-menu seperate">
                    <span class="glyphicon glyphicon-duplicate"></span>
                    <a href="<?= base_url('admin/user/mass_enrol') ?>">Mass Enrol</a>
                </div>
                <div class="<?= $contribute ?> sub-menu seperate">
                    <span class="glyphicon glyphicon-gift"></span>
                    <a href="<?= base_url('admin/user/contribute') ?>">Contribute</a>
                </div>
                <div class="<?= $queries ?> sub-menu seperate">
                    <span class="glyphicon glyphicon-comment"></span>
                    <a href="<?= base_url('admin/user/queries') ?>">Queries</a>
                </div>

                <div class="sub-panel pull-right">
                    <span class="glyphicon glyphicon-home"></span>
                    <a style="color: white" href="<?= base_url('home/') ?>">Homepage</a>
                </div>
            </div>

        </div>
    </div>
