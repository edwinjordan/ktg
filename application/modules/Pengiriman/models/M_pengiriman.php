<?php

class M_pengiriman extends CI_Model {

    public function update_load_po($idpo, $data1, $data2) {

        $this->db->where('fn_idpo', $idpo);
        $this->db->update('tm_po', $data1);

        $this->update_tracking_po($data2);

        return true;
    }

    public function update_tracking_po($data2) {
        $this->db->insert('td_po_tracking', $data2);
    }

    public function get_tracking_data($idpo) {
        $this->db->where('fn_idpo', $idpo);
        return $this->db->get('td_po_tracking');
    }

    public function update_status_pengiriman($idpo, $data1, $data2) {
        
        $this->db->where('fn_idpo', $idpo);
        $this->db->update('tm_po', $data1);

        $this->update_tracking_po($data2);

        return true;
    }

    public function get_ekspedisi_pengiriman_data($id_ekspedisi = '', $id_customer = '') {
        $this->db->select('*');
        $this->db->from('tm_po a');
        $this->db->join('td_po_ekspedisi b', 'a.fn_idpo=b.fn_idpo');

        if($id_ekspedisi) {
            $this->db->where('b.fn_idekspedisi', $id_ekspedisi);
        }
        if($id_customer) {
            $this->db->where('a.fn_id_customer', $id_customer);
        }
        
        $this->db->where('a.fn_status_po > 4');
        $this->db->where('b.fn_status_penawaran=1');
        return $this->db->get()->result();
    }

    public function get_po_data_by_id($idpo) {
        $this->db->select('*');
        $this->db->from('tm_po a');
        $this->db->join('td_po_ekspedisi b', 'a.fn_idpo=b.fn_idpo');
        $this->db->join('tm_ekspedisi c', 'b.fn_idekspedisi=c.fn_idekspedisi');
        $this->db->where('a.fn_idpo', $idpo);
        return $this->db->get()->row();
    }
}