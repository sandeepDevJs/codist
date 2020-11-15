<?php

class Crud extends CI_model
{

    private $table;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($table, $where = array())
    {
        $table = $this->db->escape_str($table);
        $this->db->select('*');
        $this->db->from($table);
        if (!empty($where)) {
            $where = $this->db->escape_str($where);
            $this->db->where($where);
        }
        return $this->db->get()->result_array();
    }

    public function get_join($table1, $table2, $id, $where = array())
    {
        $this->db->select("*");
        $this->db->from($table1);
        $this->db->join($table2, $table1 . "." . $id . ' = ' . $table2 . "." . $id);
        if (!empty($where)) {
            $this->db->where($where);
        }

        $result = $this->db->get()->result_array();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function update_data($table = "", $where = array(), $values = array())
    {
        if (!empty($table)) {
            $this->db->where($where);
            if ($this->db->update($table, $values)) {
                return ($this->db->affected_rows() > 0) ? true : false;
            }
        } else {
            return false;
        }
    }

    public function delete_data($table = "post", $unique_id = "post_id", $id = 0)
    {
        $this->db->where($unique_id, $id);
        if ($this->db->delete($table)) {
            return ($this->db->affected_rows() > 0) ? true : false;
        } else {
            return false;
        }
    }

    public function insert_data($table = "", $values = array())
    {
        if (!empty($table) && !empty($values)) {
            $values = $this->db->escape_str($values);
            if ($this->db->insert($table, $values)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
