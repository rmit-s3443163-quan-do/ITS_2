<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class quecou_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('quecou');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($data) {

        $this->db->select('*');
        $this->db->from('quecou');
        $this->db->where($data);

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('quecou');
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;

    }

    public function delete($data) {

        $this->db->where($data);
        $this->db->delete('quecou');

        return ($this->db->affected_rows() > 0) ? $this->db->affected_rows() : false;

    }
}