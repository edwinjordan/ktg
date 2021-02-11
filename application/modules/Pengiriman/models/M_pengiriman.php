<?php

class M_pengiriman extends CI_Model {

    public function update_load_po($idpo, $dataInsert) {

        $this->db->where('fn_idpo', $idpo);
        return $this->db->update('tm_po', $dataInsert);
    }
}