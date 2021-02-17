<?php 
class KriteriaModel extends CI_Model{
    public function get_data()
    {
        return $this->db->get('tm_kriteria')->result_array();
    }

    public function inputData($data)
    {
        return $this->db->insert('tm_kriteria',$data);
    }

    public function hapusData($fn_idkriteria ){
        $this->db->where($fn_idkriteria );
        $this->db->delete('tm_kriteria');
    }
    public function ubahData($where, $table){
        return $this->db->get_where($table,$where);
    }
    public function updateData($where,$data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}