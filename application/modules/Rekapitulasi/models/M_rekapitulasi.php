<?php

class M_rekapitulasi extends CI_Model {

    public function rekap_bobot_pengiriman_ktg_perbulan() {
        $this->db->select('*, SUM(b.fn_bobot_ktg) AS totalBobotPengiriman');
        $this->db->from('tm_po a');
        $this->db->join('tm_penilaian_pengiriman b', 'a.fn_idpo=b.fn_idpo');
        $this->db->order_by('a.fn_idpo');
        return $this->db->get();
    }

    public function rekap_bobot_keluhan_ktg_perbulan() {
        $this->db->select('*, SUM(b.fn_bobot) AS totalBobotKeluhan');
        $this->db->from('tm_po a');
        $this->db->join('tm_penilaian_keluhan b', 'a.fn_idpo=b.fn_idpo');
        $this->db->order_by('a.fn_idpo');
        return $this->db->get();
    }

    public function rekap_bobot_garansi_ktg_perbulan() {
        $this->db->select('*, SUM(b.fn_bobot) AS totalBobotGaransi');
        $this->db->from('tm_po a');
        $this->db->join('tm_penilaian_garansi b', 'a.fn_idpo=b.fn_idpo');
        $this->db->order_by('a.fn_idpo');
        return $this->db->get();
    }

    public function rekap_bobot_pengiriman_ekspedisi_perbulan($id_ekspedisi) {
        $this->db->select('*, SUM(b.fn_bobot_ekspedisi) AS totalBobotPengiriman');
        $this->db->from('tm_po a');
        $this->db->join('tm_penilaian_pengiriman b', 'a.fn_idpo=b.fn_idpo');
        $this->db->join('td_po_ekspedisi c', 'a.fn_idpo=c.fn_idpo');
        $this->db->where('c.fn_idekspedisi', $id_ekspedisi);
        $this->db->where('c.fn_status_penawaran=1');
        $this->db->order_by('a.fn_idpo');
        return $this->db->get();
    }
}