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
        $this->load->model('quecou_m');
        $this->load->model('quetag_m');
        $this->load->model('option_m');
        $this->load->model('tag_m');
        $this->load->model('log_m');

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
            case 'view':
                if ($question = $this->question_m->get(array('id' => $id))) {

                    $options = $this->option_m->get(array('question_id' => $question->id));
                    $ts = $this->quetag_m->get(array('question_id' => $question->id));
                    $cs = $this->quecou_m->get(array('question_id' => $question->id));

                    $tags = $courses = [];

                    if ($ts)
                        foreach ($ts as $tag)
                            $tags[] = $this->tag_m->get(['id' => $tag->tag_id]);
                    if ($cs)
                        foreach ($cs as $ques)
                            $courses[] = $this->course_m->get(['id' => $ques->course_id]);

                    $data = array(
                        'question' => $question,
                        'options' => $options,
                        'tags' => $tags,
                        'courses' => $courses
                    );
                    $this->load->view('a_ats_question_view', $data);

//                    echo 'id: ' . $question->id . ' - Text: ' . htmlspecialchars_decode($question->text) . '- type: ' . $question->type . '<br/>';
//
//                    if ($options = $this->option_m->get(array('question_id' => $question->id))) {
//
//                        foreach ($options as $option) {
//                            echo 'id: ' . $option->id . ' - text: ' . htmlspecialchars_decode($option->text) .
//                                ' - explain: ' . htmlspecialchars_decode($option->explain) . ' - correct: ' . $option->correct . '<br/>';
//                        }
//
//                    }
//
//                    if ($tags = $this->quetag_m->get(array('question_id' => $question->id))) {
//
//                        foreach ($tags as $tag) {
//                            echo 'tag: ' . $tag->tag_id . '<br/>';
//
//                        }
//
//                    }
//
//                    if ($courses = $this->quecou_m->get(array('question_id' => $question->id))) {
//
//                        foreach ($courses as $course) {
//                            echo 'course: ' . $course->course_id . '<br/>';
//                        }
//
//                    }
//
//
//                    echo '<a href="' . base_url('admin/ats/question/add/13') . '">Add another question</a>';
                } else
                    echo 'notok::404 Question not found!';

                break;

            case 'delete':

                if ($n = $this->option_m->delete(['question_id' => $id])) ;
//                    $this->log($n . ' Option/s have been deleted. Question ID: ' . $id);

                if ($n = $this->quecou_m->delete(['question_id' => $id])) ;
//                    $this->log($n . ' QueCou/s have been deleted. Question ID: ' . $id);

                if ($n = $this->quetag_m->delete(['question_id' => $id])) ;
//                    $this->log($n . ' QueTag/s have been deleted. Question ID: ' . $id);

                if ($this->question_m->delete($id)) {
                    $str = 'Question ID [' . $id . '] has been deleted';
                    $this->log($str);
                    echo 'okkkk::[' . date('G:i d/m/y') . '] Question ID [' . $id . '] has been deleted';
                } else
                    echo 'notok::404 Question not found!';
                break;

            case 'add':
                $msg = '';

                foreach ($this->input->post(NULL, false) as $index => $post) {
                    $required = '|required|min_length[1]';
                    foreach (['explain', 'tag'] as $tmp) {
                        if (strstr($index, $tmp))
                            $required = '';
                    }
                    echo $index . '-' . $post . '-' . $required . '<br/>';
                    $this->form_validation->set_rules($index, '"' . $index . '"', 'trim' . $required);
                }

                if ($this->form_validation->run()) {
//                    echo 'validated';

                    // add question
                    $data = array(
                        'text' => htmlspecialchars($this->input->post('text')),
                        'type' => $this->input->post('question_type'),
                        'time' => time()
                    );
                    if ($question_id = $this->question_m->add($data)) {
                        $str = 'Question added. ID: ' . $question_id;
                        $this->log($str);
                        $msg .= $str . '<br/>';
                    }

                    for ($i = 0; $i < $this->input->post('answer_number'); $i++) {
                        // add option
                        $explain = '';

                        if ($this->input->post('explain_general'))
                            $explain = htmlspecialchars($this->input->post('explain_general'));
                        else if ($this->input->post('explain_' . $i))
                            $explain = htmlspecialchars($this->input->post('explain_' . $i));

                        $data = array(
                            'question_id' => $question_id,
                            'text' => htmlspecialchars($this->input->post('option_' . $i)),
                            'explain' => $explain,
                            'correct' => $this->input->post('correct') == $i ? 1 : 0
                        );

                        if ($option_id = $this->option_m->add($data)) {
                            $str = 'Option Added. ID: ' . $option_id;
//                            $this->log($str);
                            $msg .= $str . '<br/>';
                        }

                    }

                    // add tag
                    if ($this->input->post('tag')) {
                        $arr = explode(';', $this->input->post('tag'));

                        foreach ($arr as $tag) {
                            if ($tag != '') {

                                // if tag not exist then add
                                if (!$tag_id = $this->tag_m->has(array('text' => $tag))) {
                                    $data = array(
                                        'text' => htmlspecialchars($tag)
                                    );
                                    if ($tag_id = $this->tag_m->add($data)) {
                                        $str = 'Tag Added. ID ' . $tag_id;
//                                        $this->log($str);
                                        $msg .= $str . '<br/>';
                                    }
                                }
                                $data = array(
                                    'question_id' => $question_id,
                                    'tag_id' => $tag_id
                                );
                                if ($quetag_id = $this->quetag_m->add($data)) {
                                    $str = 'QueTag added. ID: ' . $quetag_id;
//                                    $this->log($str);
                                    $msg .= $str . '<br/>';
                                }
                            }
                        }

                    }

                    if ($course_id = $this->input->post('course')) {
                        $data = array(
                            'question_id' => $question_id,
                            'course_id' => $course_id
                        );

                        if ($quecou_id = $this->quecou_m->add($data)) {
                            $str = 'QueCou added. ID: ' . $quecou_id;
//                            $this->log($str);
                            $msg .= $str . '<br/>';
                        }
                    }

                    $msg .= '<a href="' . base_url('admin/question/view/' . $question_id) . '">View question</a><br/>';
                    $msg .= '<a href="' . base_url('admin/ats/question/add/13') . '">Add another question</a>';

                    echo 'okkkk::' . $msg;

                } else
                    echo 'notok::' . $this->form_validation->error_string();


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
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Question';

        // 13 and 14 is course id of pre and post test
        foreach ([13, 14] as $index => $c_id) {
            $array = [];
            if ($pre = $this->quecou_m->get(['course_id' => $c_id])) {
                foreach ($pre as $q_id) {
                    if ($q_id->question_id != '')
                        $array[] = $this->question_m->get(['id' => $q_id->question_id]);
                }
            }

            $data_c = array(
                'course_id' => $c_id,
                'title' => $c_id == 13 ? 'Pre Test' : 'Post Test',
                'list' => $array
            );

            $questions[$index] = $data_c;
        }

        $data['questions'] = $questions;


        if ($action == 'add') {
            $data['view'] .= '_' . $action;
            $data['course'] = $id;

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

    private function log($text) {
        date_default_timezone_set('australia/melbourne');

        $string = '[' . date('G:i d/m/y') . '] ' . $text . ' by ' . $this->user_m->getName($this->auth->userid());

        $data = array(
            'text' => $string,
            'time' => time()
        );

        $this->log_m->add($data);

        return $string;
    }

}