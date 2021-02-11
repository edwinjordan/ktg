<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PO extends MY_Admin {

	function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('M_PO', 'po');

        if($this->session->userdata('status') != "login"){
            redirect(base_url("Auth"));
        }
    }

	public function index()
	{
        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_po');
        $this->template->render();
    }

    function search_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->po->search_autocomplete($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'     => $row->fv_nmbarang,
                        'description'   => $row->fn_id_barang,
                 );
                    echo json_encode($arr_result);
            }
        }
    }

    public function barang_cart()
    {
        $NoPO = $this->input->post('nopo');
        $NoSJ = $this->input->post('nosj');
        $tglKirim = $this->input->post('tgl_kirim');
        $tglPO = $this->input->post('tgl_po');
        $alamatKirim = $this->input->post('alamat_kirim');

        $this->session->set_userdata('nopo', $NoPO);
        $this->session->set_userdata('nosj', $NoSJ);
        $this->session->set_userdata('tgl_kirim', $tglKirim);
        $this->session->set_userdata('tgl_po', $tglPO);
        $this->session->set_userdata('alamat_kirim', $alamatKirim);

        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');

        $qty = $this->input->post('qty');
        $qty_kg = $this->input->post('qty_kg');

        $data = array(
            'id'        => $id_barang,
            'name'      => $nama_barang,
            'price'     => '0',
            'qty'       => $qty_kg,
            'qty_etc'   => $qty
        );

        $this->cart->insert($data);
        redirect('PO');
        
    }

    public function barang_cart_delete($id)
    {
        $this->cart->update(array(
            'rowid'     => $id,
            'qty'       => 0
        ));
        redirect('PO');
    }

    public function simpan_po()
    {
        $NoPO = $this->session->userdata('nopo');
        $NoSJ = $this->session->userdata('nosj');
        $tglKirim = $this->session->userdata('tgl_kirim');
        $tglPO = $this->session->userdata('tgl_po');
        $alamatKirim = $this->session->userdata('alamat_kirim');

        // print_r($NoPO, $NoSJ);

        if (!empty($tglKirim) && !empty($NoPO) && !empty($tglPO) && !empty($NoSJ) && !empty($alamatKirim)) {
            $simpan = $this->po->simpan_po($NoPO, $NoSJ, $tglPO, $tglKirim, $alamatKirim);
            if ($simpan) {
                $this->cart->destroy();
                $this->session->unset_userdata('tgl_kirim');
                $this->session->unset_userdata('nopo');
                $this->session->unset_userdata('tgl_po');
                $this->session->unset_userdata('nosj');
                $this->session->unset_userdata('alamat_kirim');
                echo $this->session->set_flashdata('msg', '<label class="label label-success">PO Berhasil di Tambahkan</label>');
                redirect('PO');
            } else {
                redirect('PO');
            }
        } else {
            echo $this->session->set_flashdata('msg', '<label class="label label-danger">PO Gagal, Periksa Lagi</label>');
            redirect('PO');
        }
    }

    // Proses Produksi
    public function list_po() {

        $data['list_po'] = $this->po->get_all_po_data();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_list_po', $data);
        $this->template->render();
    }
    public function proses_produksi($id_po)
	{
        $data['po_data'] = $this->po->get_po_data_by_id($id_po);
        $data['barang_po'] = $this->po->get_barang_po_by_id($id_po);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_proses_produksi', $data);
        $this->template->render();
    }

    public function update_status_po($idpo) {

        $this->po->update_status_po($idpo);
        redirect('PO/list_po');
    }

    // Offer Ekspedisi
    public function offer($id_po) {
        $data['po_data'] = $this->po->get_po_data_by_id($id_po);
        $data['barang_po'] = $this->po->get_barang_po_by_id($id_po);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_offer_ekspedisi', $data);
        $this->template->render();
    }

    public function add_offer_ekspedisi($idpo) {
    
        $jenisAngkutan = $this->input->post('jenis_angkutan');
        $jaminanEkspedisi = $this->input->post('jaminan_ekspedisi');
        $persyaratan = $this->input->post('persyaratan_ekspedisi');

        $data = array(
            'fv_jns_angkutan'		=>	$jenisAngkutan,
            'fv_jmn_ekspedisi'   => $jaminanEkspedisi,
            'fv_syarat_ekspedisi'        => $persyaratan,
            'fn_status_po'     => '2'
        );

        $this->po->insert_offer_ekspedisi($idpo, $data);
        redirect('PO/list_po');
    }

    // Penawaran Harga oleh Ekspedisi

    public function penawaran_harga($id_po) {
        $data['po_data'] = $this->po->get_po_data_by_id($id_po);
        $data['barang_po'] = $this->po->get_barang_po_by_id($id_po);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_penawaran_harga', $data);
        $this->template->render();
    }
      
}	