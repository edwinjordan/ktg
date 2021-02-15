<?php

class M_garansi extends CI_Model {

    public function get_barang_bergaransi_by_id_customer($id_customer) {
        $this->db->select('*');
        $this->db->from('td_po a');
        $this->db->join('tm_barang b', 'a.fn_id_barang=b.fn_id_barang');
        $this->db->join('tm_po c', 'a.fn_idpo=c.fn_idpo');
        $this->db->where('b.fn_garansi=1');
        $this->db->where('c.fn_id_customer', $id_customer);
        return $this->db->get();
    }

    public function get_barang_by_id($id_barang) {
        $this->db->where('fn_id_barang', $id_barang);
        return $this->db->get('tm_barang');
    }

    public function get_barang_garansi_by_kdpo($kdpo) {
        $this->db->where('fc_kdpo', $kdpo);
        return $this->db->get('tm_garansi');
    }

    public function input_submit_garansi($data) {
        return $this->db->insert('tm_garansi', $data);
    }

    public function insert_klaim_garansi($data) {
        return $this->db->insert('td_klaim_garansi', $data);
    }

    public function get_klaim_garansi() {
        $this->db->select('*');
        $this->db->from('tm_garansi a');
        $this->db->join('td_klaim_garansi b', 'a.fc_kdgaransi=b.fc_kdgaransi');
        return $this->db->get();
    }

    public function insert_investigasi_garansi($kdgaransi, $data1, $data2) {
        $this->db->insert('td_investigasi_garansi', $data1);

        $this->db->where('fc_kdgaransi', $kdgaransi);
        $this->db->update('tm_garansi', $data2);

        return true;
    }

    public function get_investigasi_garansi($kdgaransi) {

        $this->db->select('*');
        $this->db->from('td_investigasi_garansi a');
        $this->db->join('tm_departement b', 'a.fn_iddepartment=b.fn_iddepartment');
        $this->db->where('a.fc_kdgaransi', $kdgaransi);
        return $this->db->get();
    }

    public function update_status_garansi($kdgaransi, $data) {
        $this->db->where('fc_kdgaransi', $kdgaransi);
        return $this->db->update('tm_garansi', $data);
    }
}