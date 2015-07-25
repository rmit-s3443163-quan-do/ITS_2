<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:50 AM
 */
class test extends CI_Controller {


    /**
     * test constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->load->model('tag_m');
        $this->load->model('course_m');
        $this->load->model('offering_m');
        $this->load->model('topic_m');
        $this->load->model('user_m');
        $this->load->model('enrol_m');
        $this->load->model('question_m');
        $this->load->model('option_m');
    }

    public function option() {
        $this->show_options();
        $data = array(
            'question_id' => 1,
            'text' => '1st Option',
            'explain' => 'Sai roi'
        );
        $id = $this->option_m->add($data);
        $this->show_options();
        $data = array(
            'text' => 'First Question',
            'explain' => 'Correct',
            'isCorrect' => 1
        );
        $this->option_m->update($id, $data);
        $this->show_options();
    }


    private function show_options() {
        echo 'option Lists: <br/>';
        $arr = $this->option_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Index ' . $index . ': ' . $tag->id . '-' . $tag->question_id . '-' . $tag->text . '-'
                    . $tag->explain . '-' . $tag->isCorrect
                    . '<br/>';
            }
        } else {
            echo 'List Empty<br/>';
        }
        echo '<br>';
    }

    public function question() {
//        $data = array(
//            'course_id' => 2,
//            'text' => 'Week One'
//        );
//        $topic_id = $this->topic_m->add($data);

        $this->show_questions();
        $data = array(
            'text' => '2nd Question',
            'explain' => 'Cha biet noi gi',
            'time' => time()
        );
        $id = $this->question_m->add($data);
        $this->show_questions();
        $data = array(
            'text' => 'Second Question'
        );
        $this->question_m->update($id, $data);
        $this->show_questions();

//        $this->topic_m->delete($id);
//        $this->show_topics();
    }

    private function show_questions() {
        echo 'question Lists: <br/>';
        $arr = $this->question_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Index ' . $index . ': ' . $tag->id . '-' . $tag->topic_id . '-' . $tag->course_id . '-' . $tag->text . '-'
                    . $tag->difficulty . '-' . $tag->explain . '-' . $tag->inUse . '-' . $tag->type
                    . '<br/>';
            }
        } else {
            echo 'List Empty<br/>';
        }
        echo '<br>';
    }


    public function enrol() {
        $this->show_enrols();
        $data = array(
            'offer_id' => 8,
            'user_id' => 5
        );
        $this->enrol_m->delete($data);
        $this->show_enrols();
    }

    public function user() {

        $data = array(
            'uname' => 'q',
            'upass' => 'qq',
        );
        $id = $this->user_m->add($data);

        echo '<br>Add user success: ' . $id;
    }

    private function show_enrols() {
        echo 'enrol Lists: <br/>';
        $arr = $this->enrol_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag)
                echo 'Tag ' . $index . ': ' . $tag->offer_id . '-' . $tag->user_id . '<br/>';
        } else {
            echo 'List Empty<br/>';
        }
        echo '<br>';
    }

    private function show_users() {
        echo 'users Lists: <br/>';
        $arr = $this->user_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Tag ' . $index . ': ' . $tag->id . '-' . $tag->uname . '-' . $tag->upass . '-' . $tag->seed . '<br/>';
            }
        } else {
            echo 'List Empty<br/>';
        }
        echo '<br>';
    }

    public function topic() {
        $this->show_topics();
        $data = array(
            'course_id' => 2,
            'text' => 'Week One'
        );
        $id = $this->topic_m->add($data);
        $this->show_topics();
        $data['text'] = 'Week 1';
        $this->topic_m->update($id, $data);
        $this->show_topics();
        $this->topic_m->delete($id);
        $this->show_topics();
    }

    public function offering() {

        $this->show_offerings();
        $data = array(
            'course_id' => 2,
            'text' => '2015 Semester 2',
            'start_date' => time(),
            'end_date' => time() + 123123123
        );
        $id = $this->offering_m->add($data);
        $this->show_offerings();
        $data['text'] = '2015 Sem 2';
        $this->offering_m->update($id, $data);
        $this->show_offerings();
        $this->offering_m->delete($id);
        $this->show_offerings();
    }

    public function course() {
        $this->show_courses();
        $id = $this->course_m->add('Software Engineering');
        $this->show_courses();
        $this->course_m->update($id, 'SEF');
        $this->show_courses();
        $this->course_m->delete($id);
        $this->show_courses();
    }

    public function add_tag() {

        $this->tag_m->add('Process');
        $this->tag_m->add('Knowledge');
        $this->tag_m->add('Requirements');
        $this->tag_m->add('Analysis');
//        echo
    }

    private function show_tags() {
        $arr = $this->tag_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Tag ' . $index . ': ' . $tag->text . '<br/>';
            }

        }
    }

    private function show_courses() {
        echo 'Course Lists: <br/>';
        $arr = $this->course_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Tag ' . $index . ': ' . $tag->text . '<br/>';
            }

        } else {
            echo 'List Empty<br/>';
        }
    }

    private function show_offerings() {
        echo 'offerings Lists: <br/>';
        $arr = $this->offering_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Tag ' . $index . ': ' . $tag->id . '-' . $tag->text . '-' . $tag->course_id . '-' . $tag->start_date . '-' . $tag->end_date . '<br/>';
            }
        } else {
            echo 'List Empty<br/>';
        }
        echo '<br>';
    }

    private function show_topics() {
        echo 'topic Lists: <br/>';
        $arr = $this->topic_m->getAll();

        if ($arr) {
            foreach ($arr as $index => $tag) {
                echo 'Index ' . $index . ': ' . $tag->id . '-' . $tag->text . '-' . $tag->course_id . '<br/>';
            }
        } else {
            echo 'List Empty<br/>';
        }
        echo '<br>';
    }

    public function tag() {
        echo 'hello<br/>Tag List<br/>';

        $this->show_tags();

        echo 'updating tag<br/>';

        $this->tag_m->update(1, 'Processes');

        echo 'updated list<br/>';

        $this->show_tags();
        echo 'delete tag<br/>';
        $this->tag_m->delete('3');
        echo 'updated list<br/>';
        $this->show_tags();

    }
}