<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 11:58 AM
 */
class home extends CI_Controller  {

    public function __construct() {
        parent::__construct();

        $this->session->unset_userdata('isAdmin');
        $this->load->model('user_m');

    }

    public function logout() {
        $this->auth->logout();
        $this->index();
    }

    public function login() {

        if (!$this->auth->loggedin()) {

            $this->form_validation->set_rules('uname', 'User ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('upass', 'Password', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                $data = array(
                    'uname' => $this->input->post('uname'),
                    'upass' => $this->input->post('upass')
                );

                if ($uid = $this->user_m->login($data))
                    $this->auth->login($uid, $remember = $this->input->post('rmb'));

            }
        }
        $this->index();

    }

    public function index() {

        if ($this->auth->loggedin()) {

            $data = array(
                'uid' => $this->auth->userid(),
                'uname' => $this->user_m->getName($this->auth->userid()),
                'page_title' => 'ITS Homepage',
                'view' => 'index_v'
            );

        } else {

            $data = array(
                'page_title' => 'ITS Login',
                'errors' => '',
                'view' => 'login_v',

            );

        }

        $this->load->view('templates/header', $data);
        $this->load->view($data['view'], $data);
        $this->load->view('templates/footer');

//        url_title($this->input->post('title'), 'dash', TRUE);


    }

}