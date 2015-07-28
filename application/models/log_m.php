<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class log_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('log');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($id) {

        $this->db->select('*');
        $this->db->from('log');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result() : false;
        
    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('log');
        return ($this->db->affected_rows() > 0)?$this->db->insert_id():false;
        
    }

    public function update($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('log', $data);
        return ($this->db->affected_rows() > 0)?true:false;

    }

    public function delete($id) {

        $this->db->where('id', $id);
        $this->db->delete('log');

        return ($this->db->affected_rows() > 0)?true:false;

    }
}