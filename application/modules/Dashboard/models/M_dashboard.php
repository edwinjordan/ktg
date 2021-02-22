<?php

class M_dashboard extends CI_Model {

    public function total_outstanding_po() {
        $this->db->select('SUM(b.fn_qty_kg) AS TotalOutstandingPO');
        $this->db->from('tm_po a');
        $this->db->join('td_po b', 'a.fn_idpo=b.fn_idpo');
        $this->db->where('a.fn_status_po=0');
        return $this->db->get();
    }

    public function total_po_progress() {
        $this->db->select('SUM(b.fn_qty_kg) AS TotalPOProgress');
        $this->db->from('tm_po a');
        $this->db->join('td_po b', 'a.fn_idpo=b.fn_idpo');
        $this->db->where('a.fn_status_po=1');
        return $this->db->get();
    }

    public function total_po_delivery() {
        $this->db->select('COUNT(fn_idpo) AS TotalPODelivery');
        $this->db->from('tm_po');
        $this->db->where('fn_status_po > 4');
        $this->db->where('fn_status_po < 8');
        return $this->db->get();
    }

    public function total_keluhan() {
        $this->db->select('COUNT(fn_idpo) AS TotalKeluhan');
        $this->db->from('tm_keluhan');
        $this->db->where('fc_approval >= 0');
        $this->db->where('fc_approval < 3');
        return $this->db->get();
    }

    public function data_po_dashboard() {
        $this->db->select('*');
        $this->db->from('tm_po a');
        $this->db->join('td_po b', 'a.fn_idpo=b.fn_idpo');
        $this->db->join('tm_customer c', 'a.fn_id_customer=c.fn_id_customer');
        $this->db->where('fn_status_po = 0');
        $this->db->or_where('fn_status_po = 1');
        $this->db->or_where('fn_status_po = 5');
        $this->db->or_where('fn_status_po = 6');
        $this->db->or_where('fn_status_po = 7');
        return $this->db->get();
    }
}