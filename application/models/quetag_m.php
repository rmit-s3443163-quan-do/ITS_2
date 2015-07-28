<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class quetag_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('quetag');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($data) {

        $this->db->select('*');
        $this->db->from('quetag');
        $this->db->where($data);

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('quetag');
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;

    }

    public function update($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('quetag', $data);
        return ($this->db->affected_rows() > 0) ? true : false;

    }

    public function delete($data) {

        $this->db->where($data);
        $this->db->delete('quetag');

        return ($this->db->affected_rows() > 0) ? $this->db->affected_rows() : false;

    }
}