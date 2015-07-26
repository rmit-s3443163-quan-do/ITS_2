<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 11:58 AM
 */
class home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->session->unset_userdata('isAdmin');
        $this->load->model('user_m');

    }

    public function survey($top='main') {
        $data = $this->getDefaultData('survey', $top);

        $this->loadView($data);
    }

    public function result($top='main') {
        $data = $this->getDefaultData('result', $top);

        $this->loadView($data);
    }

    public function post_test($top='main') {
        $data = $this->getDefaultData('post_test', $top);

        $this->loadView($data);
    }

    public function practice($top='main') {
        $data = $this->getDefaultData('practice', $top);

        $this->loadView($data);
    }

    public function pre_test($top='main') {
        $data = $this->getDefaultData('pre_test', $top);

        $this->loadView($data);
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
                    $this->auth->login($uid);

            }
        }

        $this->index();

    }

    public function index() {

        $data = $this->getDefaultData('home', 'main');

        if (!$this->auth->loggedin()) {
            $data['view'] = 'login';
            $data['errors'] = '';
        }

        $this->loadView($data);

    }

    private function getDefaultData($side, $top) {

        return array(
            'uid' => $this->auth->userid(),
            'uname' => $this->user_m->getName($this->auth->userid()),
            'sidebar' => 'sidebar',
            'view' => $side . '_' . $top,
            'topbar' => 'topbar_home',
            'sidebar_selected' => $side,
            'topbar_selected' => $side,
            'page_title' => 'ITS - Homepage'
        );
    }

    private function loadView($data) {

        $this->load->view('templates/header', $data);

        if ($data['view'] != 'login') {

            $this->load->view('templates/' . $data['sidebar'], $data);
            $this->load->view('templates/' . $data['topbar'], $data);

        }

        $this->load->view($data['view'], $data);
        $this->load->view('templates/footer');


    }

}