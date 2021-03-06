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
        $this->load->model('offering_m');
        $this->load->model('topic_m');
        $this->load->model('question_m');
        $this->load->model('quecou_m');
        $this->load->model('quetag_m');
        $this->load->model('option_m');
        $this->load->model('tag_m');
        $this->load->model('log_m');
        $this->load->model('survey_m');

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


    public function ats($top = 'result', $action = '', $id = 1) {
        if (isAdmin()) {

            $data = $this->getDefaultData('ats', $top);
            $data['breadcrumb'][] = array(
                'text' => 'ATS Manager',
                'link' => base_url('admin/ats')
            );

            if ($top == 'survey')
                $data = $this->view_ats_survey($data, $action, $id);
            else if ($top == 'result')
                $data = $this->view_ats_result($data, $action, $id);
            else if ($top == 'question')
                $data = $this->view_ats_question($data, $action, $id);
            else
                $data['view'] = 'a_ats_not_found';

            $this->loadView($data);

        } else
            $this->index();

    }

    public function question($action = '', $id = 1) {
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
                        'courses' => $courses,
                        'url' => base_url('admin/question/update')
                    );
                    $this->load->view('a_ats_question_view', $data);

                } else
                    echo 'notok::404 Question not found!';

                break;

            case 'delete':

                if ($n = $this->option_m->delete(['question_id' => $id])) ;

                if ($n = $this->quecou_m->delete(['question_id' => $id])) ;

                if ($n = $this->quetag_m->delete(['question_id' => $id])) ;

                if ($this->question_m->delete($id)) {
                    $str = 'Question ID [' . $id . '] has been deleted';
                    $this->log($str);
                    echo 'okkkk::[' . date('G:i d/m/y') . '] Question ID [' . $id . '] has been deleted';
                } else
                    echo 'notok::404 Question not found!';
                break;
            case 'update':
                if ($this->input->post(NULL, true)) {
                    $question_id = $this->input->post('id');
                    $data = [
                        'id' => $this->input->post('id'),
                        'text' => htmlspecialchars($this->input->post('text'))
                    ];

                    $this->question_m->update($data);

                    // delete all the old tags of this question
                    $data = array(
                        'question_id' => $question_id,
                    );
                    $this->quetag_m->delete($data);

                    if ($this->input->post('tags')) {

                        $arr = explode(';', $this->input->post('tags'));

                        foreach ($arr as $tag) {
                            if ($tag != '') {

                                // if tag not exist then add
                                if (!$tag_id = $this->tag_m->has(array('text' => $tag))) {
                                    $data = array(
                                        'text' => htmlspecialchars($tag)
                                    );
                                    if ($tag_id = $this->tag_m->add($data)) {
                                    }
                                }

                                // add quetag
                                $data = array(
                                    'question_id' => $question_id,
                                    'tag_id' => $tag_id
                                );
                                if ($quetag_id = $this->quetag_m->add($data)) {
                                }
                            }
                        }
                    }

                    // delete all the old courses of this question
                    $data = array(
                        'question_id' => $this->input->post('id'),
                    );
                    $this->quecou_m->delete($data);

                    if ($this->input->post('courses')) {

                        $arr = explode(';', $this->input->post('courses'));

                        foreach ($arr as $course) {
                            $course_id = $this->course_m->has($course);
                            $data = array(
                                'question_id' => $question_id,
                                'course_id' => $course_id
                            );

                            if ($quecou_id = $this->quecou_m->add($data)) {
                            }
                        }

                    }


                }
                $this->index();
                break;

            case 'add':
                $msg = '';

                foreach ($this->input->post(NULL, false) as $index => $post) {
                    $required = '|required|min_length[1]';
                    foreach (['explain', 'tag'] as $tmp) {
                        if (strstr($index, $tmp))
                            $required = '';
                    }
//                    echo $index . '-' . $post . '-' . $required . '<br/>';
                    $this->form_validation->set_rules($index, '"' . $index . '"', 'trim|xss_clean' . $required);
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

                        if ($this->input->post('question_type') == 1)
                            $correct = $this->input->post('correct_' . $i) ? 1 : 0;
                        else
                            $correct = $this->input->post('correct') == $i ? 1 : 0;

//                        echo 'correct: ' . $correct . '<br/>';
                        $data = array(
                            'question_id' => $question_id,
                            'text' => htmlspecialchars($this->input->post('option_' . $i)),
                            'explain' => $explain,
                            'correct' => $correct
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

                    // add course
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

//                    echo 'okkkk::' . $msg;
                    $this->ats('question');

                } else
                    echo 'notok::' . $this->form_validation->error_string();


                break;
        }
    }

    public function survey($action, $id = 0) {
        if ($action == 'update') {
            if ($this->input->post('text')) {
                $data = [
                    'id' => $this->input->post('id'),
                    'text' => htmlspecialchars($this->input->post('text'))
                ];

                $this->survey_m->update($data);
            }
        } else if ($action == 'add') {
            if ($this->input->post('text')) {
                $data = [
                    'text' => htmlspecialchars($this->input->post('text'))
                ];

                if ($survey_id = $this->survey_m->add($data))
                    echo $survey_id;
            }
        } else if ($action == 'delete' || $action == 'del') {
            if ($id) {
                $data = [
                    'id' => $id
                ];

                if ($this->survey_m->delete($data)) {
                    if ($action == 'delete')
                        echo 'okkkk::Delete success!';
                    else
                        $this->ats('survey');
                }
            }
        }
    }

    public function course($action = 'view', $id = 0) {
        if (isAdmin()) {
            if ($action == 'add') {

                if ($this->input->post('text')) {
                    $data = [
                        'text' => $this->input->post('text'),
                        'description' => $this->input->post('description'),
                        'show' => 1
                    ];
                    if ($course_id = $this->course_m->add($data))
                        echo $this->view_course($course_id);
                }

            } else if ($action == 'update') {

                $data = ['id' => $id];
                if ($this->input->post('data')) {
                    $index = explode('::', $this->input->post('data'))[0];
                    $value = explode('::', $this->input->post('data'))[1];

                    $data[$index] = $value;

                    echo $index . '-' . $value;

                    $this->course_m->update($data);
                }

            }
        } else
            $this->index();

    }

    public function offering($action = 'view', $id = 0) {
        if (isAdmin()) {
            if ($action == 'add') {

                if ($text = $this->input->post('text')) {
                    $start = strtotime(str_replace('/', '-', $this->input->post('start')));
                    $end = strtotime(str_replace('/', '-', $this->input->post('end')));

                    $data = [
                        'course_id' => $id,
                        'text' => $text,
                        'start_date' => $start,
                        'end_date' => $end
                    ];

                    if ($this->offering_m->add($data))
                        echo $this->view_offering($id);
                }

            } else if ($action == 'update') {
                $data = ['id' => $id];

                if ($this->input->post('data')) {
                    $index = explode('::', $this->input->post('data'))[0];
                    $value = explode('::', $this->input->post('data'))[1];

                    if ($index == 'start_date' || $index == 'end_date') {
                        $value = strtotime(str_replace('/', '-', $value));
                    }

                    $data[$index] = $value;

                    $this->offering_m->update($data);
                }

            }
        } else
            $this->index();

    }

    public function topic($action = 'view', $id = 0) {
        if (isAdmin()) {

            if ($action == 'add') {

                if ($text = $this->input->post('text')) {
                    $data = [
                        'offering_id' => $id,
                        'text' => $text
                    ];

                    if ($this->topic_m->add($data))
                        echo $this->view_topic($id);
                }

            } else if ($action == 'update') {

                $data = ['id' => $id];

                if ($this->input->post('data')) {
                    $index = explode('::', $this->input->post('data'))[0];
                    $value = explode('::', $this->input->post('data'))[1];

                    $data[$index] = $value;

                    $this->topic_m->update($data);
                }
            }
        } else
            $this->index();

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

        $cs = $this->course_m->get(array('show' => 1));

        $courses = [];
        foreach ($cs as $course) {
            $courses[] = $this->view_course($course->id);
        }

        $data['courses_view'] = $courses;

        return $data;
    }

    public function view_course($id = 15) {
        if (isAdmin()) {

            $course = $this->course_m->get(['id' => $id]);

            if ($course) {
                $course = $course[0];
                $data = array(
                    'course' => $course,
                    'offerings' => $this->view_offering($course->id)
                );
                return $this->load->view('templates/a_course', $data, true);
            }

        } else
            $this->index();
    }

    public function view_offering($id = 15) {

        if (isAdmin()) {
            $off = $this->offering_m->get(['course_id' => $id]);
            if ($off) {

                $data = [
                    'offerings' => $off,
                    'topics' => $this->view_topic($off[0]->id)
                ];

                return $this->load->view('templates/a_offering', $data, true);
            }
        } else
            $this->index();

    }

    public function view_topic($id) {

        if (isAdmin()) {
            $top = $this->topic_m->get(['offering_id' => $id]);
            if ($top) {
                $data = [
                    'offering_id' => $id,
                    'topics' => $top
                ];
                return $this->load->view('templates/a_topic', $data, true);
            }
        } else
            $this->index();

    }

    private function view_content_question($data) {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Question';
        return $data;
    }

    private function view_ats_survey($data, $action = 'index', $id = 0) {
        $data['breadcrumb'][] = array(
            'text' => 'Survey',
            'link' => base_url('admin/ats/survey')
        );

        $data['page_title'] = 'ITS Admin CP - ATS Manager - Survey';
        $data['surveys'] = array();
        $data['surveys'] = $this->survey_m->getAll();
        $data['custom'] = array(
            'text' => 'Add Survey',
            'link' => base_url('admin/ats/survey/add'),
            'glyph' => 'glyphicon glyphicon-plus',
            'function' => 'return addSurvey()'
        );

        return $data;
    }

    private function view_ats_result($data, $action = '', $id = '') {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Result';
        $data['breadcrumb'][] = array(
            'text' => 'Result',
            'link' => base_url('admin/ats/result')
        );
        return $data;
    }

    private function view_ats_question($data, $action = '', $id = 13) {
        $data['page_title'] = 'ITS Admin CP - ATS Manager - Question';
        $data['breadcrumb'][] = array(
            'text' => $id == 13 ? 'Pre Question' : $id == 14 ? 'Post Question' : 'Question',
            'link' => base_url('admin/ats/question')
        );

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
            $data['breadcrumb'][] = array(
                'text' => 'Add',
                'link' => base_url('admin/ats/question/add')
            );
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

        $data = $this->view_ats_question($this->getDefaultData('ats', 'question'));

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
            'page_title' => 'ITS - Admin Login',
            'custom' => array(
                'text' => 'Homepage',
                'link' => base_url('home'),
                'glyph' => 'glyphicon glyphicon-home',
                'function' => ''
            ),
            'breadcrumb' => array(
                array(
                    'text' => 'Admin CP',
                    'link' => base_url('admin')
                )
            )
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

        $string = '[' . date('G:i d/m/y') . '] ' . $text . ' by ' . $this->user_m->getName($this->auth->userid());

        $data = array(
            'text' => $string,
            'time' => time()
        );

        $this->log_m->add($data);

        return $string;
    }

    public function images($action) {

        if (isAdmin()) {

            if ($_FILES['file']['name']) {

                if (!$_FILES['file']['error']) {
                    $name = uniqid(rand());
                    $ext = explode('.', $_FILES['file']['name']);
                    $type = $ext[count($ext) - 1];

                    if ($type == 'png' || $type == 'jpg' || $type == 'jpeg') {

                        $filename = $name . '.' . $type;
                        $destination = $_SERVER['DOCUMENT_ROOT'] . '/ITSv2/assets/uploads/' . $filename;
                        $location = $_FILES["file"]["tmp_name"];
                        move_uploaded_file($location, $destination);
                        echo base_url('/assets/uploads/' . $filename);
                    } else
                        echo 'File type not allowed!';
                } else {
                    echo $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['file']['error'];
                }

            }

        } else
            $this->index();
    }

}