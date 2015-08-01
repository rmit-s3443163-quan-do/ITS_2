<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 31/07/15
 * Time: 11:15 PM
 */
class testnew extends CI_Controller {

    public function index() {
        $this->load->view('test/course');
    }

    public function offering() {
        $this->load->view('test/offering');

    }

    public function topic() {
        $this->load->view('test/topic');

    }

    public function question() {
        $this->load->view('test/question');

    }

    public function option() {
        $this->load->view('test/option');

    }

}