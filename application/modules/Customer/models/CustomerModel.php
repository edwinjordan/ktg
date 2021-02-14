<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tm_customer')->result_array();
    }
    public function inputData($data)
    {
        return $this->db->insert('tm_customer', $data);
    }
    public function getWhere($id)
    {
        return $this->db->get_where('tm_customer', $id);
    }
    public function updateData($data, $where)
    {
        $this->db->where('fn_id_customer', $where);
        $this->db->update('tm_customer', $data);
    }
    public function deleteData($where)
    {
        $this->db->where($where);
        $this->db->delete('tm_customer');
    }
    public function getDataBy($id)
    {
        $this->db->where('fn_id_customer', $id);
        return $this->db->get('tm_customer');
    }
}
