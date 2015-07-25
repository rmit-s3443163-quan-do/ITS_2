<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 10:44 AM
 */

class Db_Login extends CI_Model {

    public function login($data) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('uid', $data['uid']);
        $this->db->where('pwd', $data['pwd']);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1)
            return true;
        else
            return false;
    }

    public function read_user($uid) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('uid', $uid);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1)
            return $query->result();
        else
            return false;
    }

}