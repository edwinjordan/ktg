<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_departemen extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tm_departement')->result_array();
    }
    public function inputData($data)
    {
        return $this->db->insert('tm_departement', $data);
    }
    public function getWhere($id)
    {
        return $this->db->get_where('tm_departement', $id);
    }
    public function updateData($data, $where)
    {
        $this->db->where('fn_iddepartment', $where);
        $this->db->update('tm_departement', $data);
    }
    public function deleteData($where)
    {
        $this->db->where($where);
        $this->db->delete('tm_departement');
    }
    public function getDataBy($id)
    {
        $this->db->where('fn_iddepartment', $id);
        return $this->db->get('tm_departement');
    }
}
