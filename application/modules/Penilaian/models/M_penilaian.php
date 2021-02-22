<?php

class M_penilaian extends CI_Model {

    public function get_barang_terima($id_customer) {
        $this->db->select('*');
        $this->db->from('tm_po');
        $this->db->where('fn_status_po = 8');
        $this->db->or_where('fn_status_po = 9');
        $this->db->where('fn_id_customer', $id_customer);
        return $this->db->get();
    }

    public function konfirmasi_terima_barang($idpo, $data) {

        $this->db->where('fn_idpo', $idpo);
        return $this->db->update('tm_po', $data);
    }

    public function get_list_kriteria_pengiriman() {
        return $this->db->get_where('tm_kriteria', 'fn_idkriteria < 6');
    }

    public function get_list_kriteria_keluhan() {
        return $this->db->get_where('tm_kriteria', 'fn_idkriteria > 4');
    }

    public function insert_penilaian_pengiriman($idpo, $data1, $data2, $data3, $data4, $data5, $data6) {

        $this->db->insert('tm_penilaian_pengiriman', $data1);

        $this->db->insert('tm_penilaian_pengiriman', $data2);

        $this->db->insert('tm_penilaian_pengiriman', $data3);

        $this->db->insert('tm_penilaian_pengiriman', $data4);

        $this->db->insert('tm_penilaian_pengiriman', $data5);

        $this->db->where('fn_idpo', $idpo);
        $this->db->update('tm_po', $data6);

        return true;
    }

    public function insert_penilaian_keluhan($data1, $data2) {

        $this->db->insert('tm_penilaian_keluhan', $data1);

        $this->db->insert('tm_penilaian_keluhan', $data2);

        return true;
    }

    public function get_nilai_pengiriman($idpo, $kdpo, $kdsj = '') {
        
        $this->db->where('fn_idpo', $idpo);
        $this->db->where('fc_kdpo', $kdpo);
        
        if($kdsj) {
            $this->db->where('fc_kdsj', $kdsj);
        }
        
        return $this->db->get('tm_penilaian_pengiriman');
    }

    public function get_nilai_keluhan($kdkeluhan, $idpo, $kdpo, $kdsj = '') {
        
        $this->db->where('fc_kdkeluhan', $kdkeluhan);
        $this->db->where('fn_idpo', $idpo);
        $this->db->where('fc_kdpo', $kdpo);
        
        if($kdsj) {
            $this->db->where('fc_kdsj', $kdsj);
        }
        
        return $this->db->get('tm_penilaian_keluhan');
    }

    //PENILAIAN GARANSI
    public function insert_penilaian_garansi($data1, $data2) {

        $this->db->insert('tm_penilaian_garansi', $data1);

        $this->db->insert('tm_penilaian_garansi', $data2);

        return true;
    }    
}