<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class offering_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('offering');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($id) {

        $this->db->select('*');
        $this->db->from('offering');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result() : false;
        
    }

    public function add($data) {

        $data = array(
            'course_id' => $data['course_id'],
            'text' => $data['text'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date']
        );

        $this->db->set($data);
        $this->db->insert('offering');
        return ($this->db->affected_rows() > 0)?$this->db->insert_id():false;
        
    }

    public function update($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('offering', $data);
        return ($this->db->affected_rows() > 0)?true:false;

    }

    public function delete($id) {

        $this->db->where('id', $id);
        $this->db->delete('offering');

        return ($this->db->affected_rows() > 0)?true:false;

    }
}