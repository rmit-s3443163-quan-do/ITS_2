<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class option_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('option');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($data=[]) {

        $this->db->select('*');
        $this->db->from('option');
        $this->db->where($data);
//        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;
        
    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('option');
        return ($this->db->affected_rows() > 0)?$this->db->insert_id():false;
        
    }

    public function update($data) {

        $this->db->where('id', $data['id']);
        $this->db->update('option', $data);
        return ($this->db->affected_rows() > 0)?true:false;

    }

    public function delete($data) {

        $this->db->where($data);
        $this->db->delete('option');

        return ($this->db->affected_rows() > 0)?$this->db->affected_rows():false;

    }
}