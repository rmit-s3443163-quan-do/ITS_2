<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 8:21 PM
 */
class C_Users extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('m_users');

    }

    public function login() {
//        $seed = random_string();
//        $pwd = sha1($pwd . $this->config->item('encryption_key'));
//        $pwd = sha1($pwd . $seed);

        if (!$this->auth->loggedin()) {
            $this->form_validation->set_rules('uid', 'UserID', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                $data = array(
                    'uid' => $this->input->post('uid'),
                    'pwd' => $this->input->post('pwd')
                );

                if ($this->m_users->login($data))
                    $this->auth->login($this->input->post('uid'), $remember = TRUE);

            }
        }
        $this->index();

    }

    public function logout() {
        $this->auth->logout();
        $this->index();
    }

    public function index() {

        if ($this->auth->loggedin()) {
            $data = array(
                'loggedin' => true,
                'uid' => $this->auth->userid()
            );

            $this->load->view('sketch/s_index', $data);
        } else {
            $data = array(
                'loggedin' => false
            );
            $this->load->view('sketch/a_users', $data);
        }

    }

    public function add() {

        $this->form_validation->set_rules('users', 'User List', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
            $data = array(
                'users' => $this->input->post('users')
            );

            $result = $this->m_users->add($data);
            echo $result . ' users have been added';
        }
    }

}
