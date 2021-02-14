<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tm_barang')->result_array();
    }
    public function inputData($data)
    {
        return $this->db->insert('tm_barang', $data);
    }
    public function getWhere($id)
    {
        return $this->db->get_where('tm_barang', $id);
    }
    public function updateData($data, $where)
    {
        $this->db->where('fn_id_barang', $where);
        $this->db->update('tm_barang', $data);
    }
    public function deleteData($where)
    {
        $this->db->where($where);
        $this->db->delete('tm_barang');
    }
}
