<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class enrol_m extends CI_Model {

    public function getAll() {

        $this->db->select('*');
        $this->db->from('enrol');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function getByUser($user_id) {

        $this->db->select('*');
        $this->db->from('enrol');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result() : false;

    }

    public function getByOffer($offer_id) {

        $this->db->select('*');
        $this->db->from('enrol');
        $this->db->where('offer_id', $offer_id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result() : false;
        
    }

    public function add($data) {

        $this->db->set($data);
        $this->db->insert('enrol');
        return ($this->db->affected_rows() > 0)?$this->db->insert_id():false;
        
    }

    public function delete($data) {

        $this->db->where($data);
        $this->db->delete('enrol');

        return ($this->db->affected_rows() > 0)?true:false;

    }
}