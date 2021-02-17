<?php

class M_keluhan extends CI_Model {

    public function insert_keluhan($data) {
        return $this->db->insert('tm_keluhan', $data);
    }

    public function get_laporan_keluhan_ktg() {
        return $this->db->get('tm_keluhan')->result();
    }

    public function get_laporan_keluhan_customer($id_customer) {
        $this->db->where('fn_id_customer', $id_customer);
        return $this->db->get('tm_keluhan')->result();
    }

    public function get_department() {
        return $this->db->get('tm_departement');
    }

    public function insert_investigasi_keluhan($kdkeluhan, $data1, $data2) {
        $this->db->insert('td_keluhan_investigasi', $data1);

        $this->db->where('fc_kdkeluhan', $kdkeluhan);
        $this->db->update('tm_keluhan', $data2);

        return true;
    }

    public function get_investigasi_keluhan($kdkeluhan) {
        
        $this->db->select('*');
        $this->db->from('td_keluhan_investigasi a');
        $this->db->join('tm_departement b', 'a.fn_iddepartment=b.fn_iddepartment');
        $this->db->where('a.fc_kdkeluhan', $kdkeluhan);
        return $this->db->get();
    }

    public function update_status_keluhan($kdkeluhan, $data) {

        $this->db->where('fc_kdkeluhan', $kdkeluhan);
        return $this->db->update('tm_keluhan', $data);
    }

    public function update_respon_pelanggan($kdkeluhan, $data1, $data2) {

        $this->db->where('fc_kdkeluhan', $kdkeluhan);
        $this->db->update('td_keluhan_investigasi', $data2);

        $this->update_status_keluhan($kdkeluhan, $data1);
    }

    public function get_keluhan_data_by_id($kdkeluhan, $idpo) {
        $this->db->select('*');
        $this->db->from('tm_keluhan a');
        $this->db->join('tm_po b', 'a.fn_idpo=b.fn_idpo');
        $this->db->join('tm_barang c', 'a.fc_kdbarang=c.fn_id_barang');
        $this->db->where('a.fc_kdkeluhan', $kdkeluhan);
        $this->db->where('a.fn_idpo', $idpo);
        return $this->db->get();
    }
}