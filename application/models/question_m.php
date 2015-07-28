<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class question_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('question');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($data) {

        $this->db->select('*');
        $this->db->from('question');
        $this->db->where($data);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result()[0] : false;
        
    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('question');
        return ($this->db->affected_rows() > 0)?$this->db->insert_id():false;
        
    }

    public function update($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('question', $data);
        return ($this->db->affected_rows() > 0)?true:false;

    }

    public function delete($id) {

        $this->db->where('id', $id);
        $this->db->delete('question');

        return ($this->db->affected_rows() > 0)?$this->db->affected_rows():false;

    }
}