<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 5:43 PM
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->auth->loggedin()) {
            redirect(base_url() . 'home/');
        }

        $this->load->model('user_m');
        $this->load->model('course_m');
        $this->load->model('question_m');

    }

    public function ats($top = 'question', $cate = 1, $action = '', $id = 1) {
        if (isAdmin()) {

            if ($top == 'survey')
                $data = $this->view_ats_survey($top, $cate, $action, $id);
            else if ($top == 'result')
                $data = $this->view_ats_result($top, $cate, $action, $id);
            else {
                $top = 'question';
                $data = $this->view_ats_question($top, $cate, $action, $id);
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/a_sidebar', $data);
            $this->load->view('templates/a_topbar_ats', $data);
            $this->load->view($data['view'], $data);
            $this->load->view('templates/footer');

        } else {
            $this->login();
        }
    }

    private function view_ats_survey($top, $cate, $action, $id) {
        $data = array(
            'uid' => $this->auth->userid(),
            'uname' => $this->user_m->getName($this->auth->userid()),
            'sidebar_selected' => 'ats',
            'topbar_selected' => $top,
            'page_title' => 'ITS Admin CP - ATS Manager - Survey',
            'view' => 'a_ats_' . $top . '_v'
        );

        return $data;
    }

    private function view_ats_result($top = '', $cate = '', $action = '', $id = '') {
        $data = array(
            'uid' => $this->auth->userid(),
            'uname' => $this->user_m->getName($this->auth->userid()),
            'sidebar_selected' => 'ats',
            'topbar_selected' => $top,
            'page_title' => 'ITS Admin CP - ATS Manager - Result',
            'view' => 'a_ats_' . $top . '_v'
        );

        return $data;
    }

    private function view_ats_question($top = '', $cate = '', $action = '', $id = '') {

        $data = array(
            'uid' => $this->auth->userid(),
            'uname' => $this->user_m->getName($this->auth->userid()),
            'cate' => $cate,
            'sidebar_selected' => 'ats',
            'topbar_selected' => $top,
            'page_title' => 'ITS Admin CP - ATS Manager - Question',
            'view' => 'a_ats_' . $top . '_v'
        );

        if ($action == 'add')
            $data['view'] = 'a_ats_' . $top . '_' . $action . '_v';

        if ($action == 'edit') {
            $data['view'] = 'a_ats_' . $top . '_' . $action . '_v';
            if ($question = $this->question_m->get($id))
                $data['question'] = $question;
            else {
                $data['view'] = 'a_ats_not_found_v';
            }
        }

        return $data;


    }

    public function question($action = '', $id = '') {
        switch ($action) {
            case 'delete':
                $data = array(
                    'text' => 'Week One',
                    'explain' => 'Cha biet noi gi',
                    'time' => time()
                );
                $q_id = $this->question_m->add($data);
                date_default_timezone_set("Australia/Melbourne");
                if ($this->question_m->delete($q_id) == 'okkkk')
                    echo 'okkkk::[' . date('G:i d/m/y') . '] Question ID [' . $q_id . '] has been deleted by '
                        . $this->user_m->getName($this->auth->userid());
                else
                    echo 'notok::Errors occured!';
                break;
        }
    }

    public function index() {
        if (isAdmin()) {

            $data = array(
                'uid' => $this->auth->userid(),
                'uname' => $this->user_m->getName($this->auth->userid()),
                'view' => 'admin_v',
                'course_arr' => $this->course_m->getAll()
            );
            $this->load->view($data['view'], $data);

        } else {
            $this->login();
        }

    }

    public function doLogin() {

        $b = false;

        if (!isAdmin()) {
//          min_length[6]
            $this->form_validation->set_rules('uname', 'User ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('upass', 'Password', 'trim|required|xss_clean');

            if ($this->form_validation->run()) {
                $data = array(
                    'uname' => $this->input->post('uname'),
                    'upass' => $this->input->post('upass')
                );

                if ($uid = $this->user_m->login($data)) {

                    $this->auth->login($uid, true);

                    if ($this->user_m->isAdmin($uid)) {
                        $this->session->set_userdata(array('isAdmin' => $this->config->item('admin_code')));
                        $b = true;
                        $this->index();
                    }

                }
            }

            if (!$b) {
                $this->session->unset_userdata('isAdmin');
                $this->login();
            }
        } else
            $this->index();

    }

    public function login() {
        if (!isAdmin()) {
            $data = array(
                'view' => 'a_login_v'
            );
            $this->load->view($data['view'], $data);
        } else
            $this->index();

    }

    public function doLogout() {
        $this->session->unset_userdata('isAdmin');
        $this->index();
    }


}