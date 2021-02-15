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

    public function insert_penilaian_pengiriman($data1, $data2, $data3, $data4, $data5) {

        $this->db->insert('tm_penilaian_pengiriman', $data1);

        $this->db->insert('tm_penilaian_pengiriman', $data2);

        $this->db->insert('tm_penilaian_pengiriman', $data3);

        $this->db->insert('tm_penilaian_pengiriman', $data4);

        $this->db->insert('tm_penilaian_pengiriman', $data5);

        return true;
    }

    public function insert_penilaian_keluhan($data1, $data2) {

        $this->db->insert('tm_penilaian_keluhan', $data1);

        $this->db->insert('tm_penilaian_keluhan', $data2);

        return true;
    }
}