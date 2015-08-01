<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 31/07/15
 * Time: 8:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Course extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('course_m');

    }

    // select
    public function index_get() {
        if (($id = $this->get('id')) === NULL) {
            if ($data = $this->course_m->get())
                $this->response($data, REST_Controller::HTTP_OK);
            else
                $this->response([
                    'status' => FALSE,
                    'message' => 'No data were found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }

        $id = (int)$id;

        // Validate the id.
        if ($id < 0)
            $this->response([
                'status' => FALSE,
                'message' => 'Validate Failed. ID: [' . $id . '].'
            ], REST_Controller::HTTP_BAD_REQUEST);

        if ($data = $this->course_m->get(['id' => $id])) {
            $this->set_response($data, REST_Controller::HTTP_OK);
        } else {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Data could not be found. ID: [' . $id . ']'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    // add
    public function index_post() {
        if (!$this->post('text')) {
            $this->response(['error' => 'Missing data: text'], 400);
        } else {
            $data['text'] = $this->post('text');
            if ($this->post('description'))
                $data['description'] = $this->post('description');

        }

        if ($id = $this->course_m->add($data))
            $this->response([
                    'id' => $id,
                    'text' => $this->post('text')]
                , 200);

    }

    // update
    public function index_put() {
        if (!$this->put('id'))
            $this->response(['error' => 'Require data: id'], 400);
        if (!$this->put('text'))
            $this->response(['error' => 'Require data: text'], 400);

        $id = (int)$this->put('id');

        // Validate the id.
        if ($id < 0)
            $this->response([
                'status' => FALSE,
                'message' => 'Validate Failed. ID: [' . $id . '].'
            ], REST_Controller::HTTP_BAD_REQUEST);


        $data['id'] = $id;

        if ($this->put('text'))
            $data['text'] = $this->put('text');

        $data['description'] = $this->put('description');

        if ($id = $this->course_m->update($data)) {
            $message = array('success' => $this->put('text') . ' Updated!');
            $this->response($message, 200);
        } else
            $this->response(['error' => 'DB error when update!' . $data['description']], 400);
    }

    // delete
    public function index_delete() {
        if (!$this->get('id'))
            $this->response(array('error' => 'Missing data: id' . $this->put('id')), 400);

        $id = (int)$this->get('id');

        if ($id < 0) {
            $this->response([
                'status' => FALSE,
                'message' => 'Validate Failed. ID: [' . $id . '].'
            ], 400);
        } else {
            if ($this->course_m->delete($id))
                $this->response([
                    'id' => $id,
                    'message' => 'DELETED!'
                ], 200);
            else
                $this->response([
                    'status' => FALSE,
                    'message' => 'DB Error. ID not found: [' . $id . '].'
                ], 400);
        }
    }

}