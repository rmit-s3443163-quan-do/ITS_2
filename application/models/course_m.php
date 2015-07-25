<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class course_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('course');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($id) {

        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result() : false;

    }

    public function has($text) {

        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('text', $text);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1);

    }

    public function add($data) {
        if (!$this->has($data['text'])) {
            $this->db->insert('course', $data);
            return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;
        }
        return false;
    }

    public function update($id, $text) {

        $data = array(
            'text' => $text
        );

        $this->db->where('id', $id);
        $this->db->update('course', $data);
        return ($this->db->affected_rows() > 0)?true:false;

    }

    public function delete($id) {

        $this->db->where('id', $id);
        $this->db->delete('course');

        return ($this->db->affected_rows() > 0)?true:false;

    }
}