<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 10:01 AM
 */
//session_start();

class User_Authentication extends CI_Controller {

    /**
     * User_Authentication constructor.
     */
    public function __construct() {

        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('db_login');

    }

    public function aquestion() {
        $this->load->view('sketch/a_question');
    }

    public function atopic() {
        $this->load->view('sketch/a_topic');
    }

    public function aoffering() {
        $this->load->view('sketch/a_offering');
    }

    public function acourse() {
        $this->load->view('sketch/a_course');
    }

    public function index() {
        $this->load->view('sketch/a_course');
    }

    public function login_page() {
        $this->load->view('sketch/s_login');
    }

    public function question($n, $b) {
        if (!isset($b))
            $b = 0;
        switch ($n) {
            case 1:
                if ($b == 1)
                    $this->load->view('sketch/s_question_correct');
                else if ($b == 2)
                    $this->load->view('sketch/s_question_wrong');
                else
                    $this->load->view('sketch/s_question');
                break;
            case 2:
                $this->load->view('sketch/s_question_type2');
                break;
            case 3:
                $this->load->view('sketch/s_question_type3');
                break;
            case 4:
                $this->load->view('sketch/s_question_type4');
                break;
            case 5:
                $this->load->view('sketch/a_question_add');
                break;
        }
    }

    public function login() {

        $this->form_validation->set_rules('uid', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean');

        if (!$this->form_validation->run()) {
            if (isset($this->session->userdata['logged_in']))
                $this->load->view('index');
            else
                $this->load->view('login');
        } else {
            $data = array(
                'uid' => $this->input->post('uid'),
                'pwd' => $this->input->post('pwd')
            );

            $result = $this->db_login->login($data);
            if ($result) {
                $uid = $this->input->post('uid');
                $result = $this->db_login->read_user($uid);
                if ($result) {
                    $session_data = array(
                        'uid' => $result[0]->uid,
                        'utype' => $result[0]->type
                    );
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('index');
                }
            } else {
                $data = array(
                    'err_msg' => 'Invalid username/password'
                );
                $this->load->view('login', $data);
            }
        }
    }

    public function logout() {

        $session_data = array(
            'uid' => '',
            'utype' => -1
        );

        $this->session->unset_userdata('logged_in', $session_data);
        $data['logout_msg'] = 'Successfully Logout';
        $this->load->view('login', $data);
    }
}