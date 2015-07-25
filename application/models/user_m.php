<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 9:43 AM
 */
class user_m extends CI_Model {

    public function isAdmin($id) {

        $this->db->select('type');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result()[0]->type==1903?true:false : false;

    }

    public function getName($id) {

        $this->db->select('uname');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result()[0]->uname : false;

    }

    public function getAll() {

        $this->db->select('*');
        $this->db->from('users');

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;

    }

    public function get($id) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result() : false;
        
    }

    private function getSeed($uname) {
        $this->db->select('seed');
        $this->db->from('users');
        $this->db->where('uname', $uname);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result()[0]->seed : false;
    }

    private function encrypt($pass, $seed) {

        $tmp = sha1($pass . $this->config->item('encryption_key'));
        $tmp = sha1($tmp . $seed);

        return $tmp;
    }

    public function login($data) {
        $seed = $this->getSeed($data['uname']);

        $pwd = $this->encrypt($data['upass'], $seed);

        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('uname', $data['uname']);
        $this->db->where('upass', $pwd);
        $this->db->limit(1);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? $query->result()[0]->id : false;
    }

    public function add($data) {

        if ($this->getSeed($data['uname']))
            return false;

        $pwd = isset($data['upass']) && $data['upass']!=''?$data['upass']:'qwerty';

        $seed = uniqid(rand());
        $pwd = $this->encrypt($pwd, $seed);

        $data = array(
            'uname' => $data['uname'],
            'upass' => $pwd,
            'seed' => $seed
        );

        $this->db->set($data);
        $this->db->insert('users');
        return ($this->db->affected_rows() > 0)?$this->db->insert_id():false;
        
    }

    public function update($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('users', $data);
        return ($this->db->affected_rows() > 0)?true:false;

    }

    public function delete($id) {

        $this->db->where('id', $id);
        $this->db->delete('users');

        return ($this->db->affected_rows() > 0)?true:false;

    }
}