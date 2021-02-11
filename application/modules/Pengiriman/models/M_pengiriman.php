<?php

class M_pengiriman extends CI_Model {

    public function update_load_po($idpo, $dataInsert) {

        $this->db->where('fn_idpo', $idpo);
        return $this->db->update('tm_po', $dataInsert);
    }

    public function get_ekspedisi_pengiriman_data($id_ekspedisi) {
        $this->db->select('*');
        $this->db->from('tm_po a');
        $this->db->join('td_po_ekspedisi b', 'a.fn_idpo=b.fn_idpo');
        $this->db->where('b.fn_idekspedisi', $id_ekspedisi);
        $this->db->where('a.fn_status_po > 5');
        $this->db->where('b.fn_status_penawaran=1');
        return $this->db->get()->result();
    }
}