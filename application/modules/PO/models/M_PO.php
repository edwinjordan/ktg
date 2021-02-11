<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class M_PO extends CI_Model {
        
    function search_autocomplete($search){
        $this->db->like('fv_nmbarang', $search , 'both');
        $this->db->order_by('fv_nmbarang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tm_barang')->result();
    }

    public function simpan_po($NoPO, $NoSJ, $tglPO, $tglKirim, $alamatKirim) {

        $this->db->query("INSERT INTO tm_po (fn_idpo, fc_kdpo, fd_tglpo, fc_kdsj, fd_target_tglkirim, fv_alamat_kirim, 'fn_status_po') VALUES ('', '$NoPO', '$tglPO', '$NoSJ', '$tglKirim', '$alamatKirim', '0')");

        $latest_id = $this->db->insert_id();

		foreach ($this->cart->contents() as $items) {
			$data = array(
				'fn_idpo' 		=>	$latest_id,
				'fc_kdpo'	=>	$NoPO,
				'fc_kdsj'		=>	$NoSJ,
                'fv_nmbarang'   => $items['name'],
                'fn_qty'        => $items['qty_etc'],
                'fn_qty_kg'     => $items['qty']
			);
            $this->db->insert('td_po', $data);
            // $this->db->query("UPDATE bahan SET stok = stok+'$items[qty]' WHERE id = '$items[id]'");
		}
		return true;
    }

    public function get_all_po_data() {
        return $this->db->get('tm_po')->result();
    }

    public function get_po_data_by_id($id_po) {
        $this->db->select('*');
        $this->db->from('tm_po');
        $this->db->where('fn_idpo', $id_po);
        return $this->db->get()->row();
    }

    public function get_barang_po_by_id($id_po) {
        $this->db->select('*');
        $this->db->from('td_po');
        $this->db->where('fn_idpo', $id_po);
        return $this->db->get()->result();
    }

    public function update_status_po($idpo) {

        $data = array(
            'fn_status_po' => '1'
        );

        $this->db->where('fn_idpo', $idpo);
        return $this->db->update('tm_po', $data);
    }

    // Offer Ekspedisi
    public function insert_offer_ekspedisi($idpo, $data) {

        $this->db->where('fn_idpo', $idpo);
        return $this->db->update('tm_po', $data);
    }
      
}	