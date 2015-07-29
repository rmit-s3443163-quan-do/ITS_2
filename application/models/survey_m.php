<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class survey_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('survey');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($data) {

        $this->db->select('*');
        $this->db->from('survey');
        $this->db->where($data);

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('survey');
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;

    }

    public function update($data) {

        $this->db->where('id', $data['id']);
        $this->db->update('survey', $data);
        return ($this->db->affected_rows() > 0) ? true : false;

    }

    public function delete($id) {

        $this->db->where('id', $id);
        $this->db->delete('survey');

        return ($this->db->affected_rows() > 0) ? true : false;

    }
}