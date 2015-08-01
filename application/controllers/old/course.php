<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 7:37 PM
 */
class course extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!isAdmin())
            redirect(base_url() . 'admin/login');

        $this->load->model('course_m');

    }

    public function index() {
        $this->back();
    }

    public function update() {

    }

    public function doUpdate($id) {

        $this->form_validation->set_rules('text', 'Course Name', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
            $data = array(
                'id' => $id,
                'text' => $this->input->post('text')
            );
            $this->course_m->update($data);

            $this->back();
        }

    }

    public function del($id) {

        $this->course_m->delete($id);

        $this->back();
    }

    public function add() {

        $this->form_validation->set_rules('text', 'Course Naw', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
            $data = array(
                'text' => $this->input->post('text')
            );
            $this->course_m->add($data);

            $this->back();
        }

    }

    private function back() {
        redirect(base_url() . 'admin/');
    }

}