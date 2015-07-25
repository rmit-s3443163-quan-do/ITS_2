<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 10:44 AM
 */
class m_users extends CI_Model {

    public function add($data) {
        $arr = explode(',', $data['users']);
        $count = 0;
        foreach ($arr as $user) {
            if ($user != '') {
                $data = array(
                    'uname' => $user,
                    'upass' => md5('qwerty'),
                    'type' => 1
                );

                $this->db->insert('users', $data);
                if ($this->db->affected_rows() > 0) $count++;
            }
        }
        return $count;
    }

    public function login($data) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('uname', $data['uid']);
        $this->db->where('upass', md5($data['pwd']));
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;
    }
//
//    public function read_user($uid) {
//        $this->db->select('*');
//        $this->db->from('users');
//        $this->db->where('uid', $uid);
//        $this->db->limit(1);
//
//        $query = $this->db->get();
//        if ($query->num_rows() == 1)
//            return $query->result();
//        else
//            return false;
//    }

}