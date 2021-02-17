<?php

class M_pengiriman extends CI_Model {

    public function update_load_po($idpo, $dataInsert) {

        $this->db->where('fn_idpo', $idpo);
        return $this->db->update('tm_po', $dataInsert);
    }

    public function get_ekspedisi_pengiriman_data($id_ekspedisi = '') {
        $this->db->select('*');
        $this->db->from('tm_po a');
        $this->db->join('td_po_ekspedisi b', 'a.fn_idpo=b.fn_idpo');

        if($id_ekspedisi) {
            $this->db->where('b.fn_idekspedisi', $id_ekspedisi);
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