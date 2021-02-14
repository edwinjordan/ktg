<?php 
class EkspedisiModel extends CI_Model{
    public function get_data()
    {
        return $this->db->get('tm_ekspedisi')->result_array();
    }
    public function inputData($data)
    {
        return $this->db->insert('tm_ekspedisi',$data);
    }

    public function hapusData($fn_idekspedisi){
        $this->db->where($fn_idekspedisi);
        $this->db->delete('tm_ekspedisi');
    }
    public function ubahData($where, $table){
        return $this->db->get_where($table,$where);
    }
    public function updateData($where,$data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}