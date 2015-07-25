<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:50 PM
 */

function asset_url(){
    return base_url().'assets/';
}

function isAdmin() {
    $CI = & get_instance();
    return ($CI->session->userdata('isAdmin') == $CI->config->item('admin_code'));
}