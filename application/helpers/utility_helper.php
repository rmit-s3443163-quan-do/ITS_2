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

function getKText($i) {
    $tmp = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    return $tmp[$i];
}