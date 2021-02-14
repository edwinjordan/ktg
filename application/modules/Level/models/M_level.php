<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_level extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tm_level')->result_array();
    }
    public function inputData($data)
    {
        return $this->db->insert('tm_level', $data);
    }
    public function getWhere($id)
    {
        return $this->db->get_where('tm_level', $id);
    }
    public function updateData($data, $where)
    {
        $this->db->where('fn_idlevel', $where);
        $this->db->update('tm_level', $data);
    }
    public function deleteData($where)
    {
        $this->db->where($where);
        $this->db->delete('tm_level');
    }
    public function getDataBy($id)
    {
        $this->db->where('fn_idlevel', $id);
        return $this->db->get('tm_level');
    }
}
