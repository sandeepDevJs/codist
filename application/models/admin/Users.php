<?php

class Users extends CI_model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($table, $where = array())
    {
        $this->db->select('*');
        $this->db->from($table);
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->get()->result_array();
    }

    public function login($email, $password)
    {
        $email    = $this->db->escape_str($email);
        $password = $this->db->escape_str($password);

        $result = $this->db->get_where('admin', array('email' => $email, 'password' => $password))->result_array();
        return count($result) > 0 ? true : false;
    }

}
