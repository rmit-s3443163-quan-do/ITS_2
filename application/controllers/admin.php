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
            redirect(base_url('home/'));
        }

        $this->load->model('user_m');
        $this->load->model('course_m');
        $this->load->model('question_m');

    }

    public function dashboard($top = 'main') {
        if (isAdmin()) {
            $data = $this->getDefaultData('dashboard', $top);

            $data['page_title'] = 'ITS Admin CP - Dashboard';

            $this->loadView($data);
        } else
            $this->index();
    }

    public function config($top = 'main') {
        if (isAdmin()) {
            $data = $this->getDefaultData('config', $top);

            $data['page_title'] = 'ITS Admin CP - Config';

            $this->loadView($data);
        } else
            $this->index();
    }

    public function user($top = 'list') {
        if (isAdmin()) {
            $data = $this->getDefaultData('user', $top);

            if ($top == 'mass_enrol')
                $data = $this->view_user_mass_enrol($data);
            else if ($top == 'contribute')
                $data = $this->view_user_contribute($data);
            else if ($top == 'queries')
                $data = $this->view_user_queries($data);
            else
                $data = $this->view_user_list($data);

            $this->loadView($data);
        } else
            $this->index();
    }

    private function view_user_list($data) {
        $data['page_title'] = 'ITS Admin CP - Users - Lists';
        return $data;
    }

    private function view_user_mass_enrol($data) {
        $data['page_title'] = 'ITS Admin CP - Users - Mass Enrol';
        return $data;
    }

    private function view_user_contribute($data) {
        $data['page_title'] = 'ITS Admin CP - Users - Contribute';
        return $data;
    }

    private function view_user_queries($data) {
        $data['page_title'] = 'ITS Admin CP - Users - Queries';
        return $data;
    }


    public function ats($top = 'question', $cate = 1, $action = '', $id = 1) {
        if (isAdmin()) {

            $data = $this->getDefaultData('ats', $top);

            if ($top == 'survey')
                $data = $this->view_ats_survey($data, $cate, $action, $id);
            else if ($top == 'result')
                $data = $this->view_ats_result($data, $cate, $action, $id);
            else if ($top == 'question')
                $data = $this->view_ats_question($data, $cate, $action, $id);
            else
                $data['view'] = 'a_ats_not_found';

            $this->loadView($data);

        } else
            $this->index();

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

    public function content($top = 'hierarchy') {
        if (isAdmin()) {
            $data = $this->getDefaultData('content', $top);

            $data['view'] = 'a_content_' . $top;
            $data['topbar_selected'] = $top;
            $data['topbar'] = 'a_topbar_content';
            $data['sidebar_selected'] = 'content';

            if ($top == 'question')
                $data = $this->view_content_question($data);
            else
                $data = $this->view_content_hierarchy($data);

            $this->loadView($data);
        } else
            $this->index();
    }

    private function view_content_hierarchy($data) {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Hierarchy';
        return $data;
    }

    private function view_content_question($data) {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Question';
        return $data;
    }

    private function view_ats_survey($data, $cate, $action, $id) {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Survey';
        return $data;
    }

    private function view_ats_result($data, $cate = '', $action = '', $id = '') {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Result';
        return $data;
    }

    private function view_ats_question($data, $action = '', $id = '') {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Survey';

        if ($action == 'add') {
            $data['view'] .= '_' . $action;
            $data['category'] = $id;

        }

        if ($action == 'edit') {
            $data['view'] .= '_' . $action;

            if ($question = $this->question_m->get($id))
                $data['question'] = $question;
        }

        return $data;


    }

    private function view_login($data) {

        $data['view'] = 'a_login';
        $data['topbar'] = 'a_topbar_login';
        $data['sidebar'] = 'a_sidebar_login';
        $data['page_title'] = 'ITS - Admin Login';

        return $data;
    }

    public function index() {

        $data = $this->getDefaultData('ats', 'question');

        if (!isAdmin())
            $data = $this->view_login($data);

        $this->loadView($data);

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
                    }

                }
            }

            if (!$b) {
                $this->session->unset_userdata('isAdmin');
            }
        }

        $this->index();

    }

    public function doLogout() {
        $this->session->unset_userdata('isAdmin');
        $this->index();
    }

    private function getDefaultData($side, $top) {

        return array(
            'uid' => $this->auth->userid(),
            'uname' => $this->user_m->getName($this->auth->userid()),
            'sidebar' => 'a_sidebar',
            'view' => 'a_' . $side . '_' . $top,
            'topbar' => 'a_topbar_' . $side,
            'sidebar_selected' => $side,
            'topbar_selected' => $top,
            'page_title' => 'ITS - Admin Login'
        );
    }

    private function loadView($data) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/' . $data['sidebar'], $data);
        $this->load->view('templates/' . $data['topbar'], $data);
        $this->load->view($data['view'], $data);
        $this->load->view('templates/footer');
    }


}