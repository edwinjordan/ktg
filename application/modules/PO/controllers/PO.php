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
        // $this->load->library('PHPExcel');
        // $this->load->library('PHPExcel/IOFactory');
        // $this->load->library('excel');

        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url("Auth"));
        // }
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

    function search_customer_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->po->search_customer_autocomplete($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'     => $row->fv_nmcustomer,
                        'description'   => $row->fn_id_customer,
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
        $nmCustomer = $this->input->post('nama_customer');
        $idCustomer = $this->input->post('id_customer');

        $this->session->set_userdata('nopo', $NoPO);
        $this->session->set_userdata('nosj', $NoSJ);
        $this->session->set_userdata('tgl_kirim', $tglKirim);
        $this->session->set_userdata('tgl_po', $tglPO);
        $this->session->set_userdata('alamat_kirim', $alamatKirim);
        $this->session->set_userdata('nama_customer', $nmCustomer);
        $this->session->set_userdata('id_customer', $idCustomer);

        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');

        $qty = $this->input->post('qty');
        $satuan = $this->input->post('satuan');
        $qty_kg = $this->input->post('qty_kg');

        $data = array(
            'id'        => $id_barang,
            'name'      => $nama_barang,
            'price'     => '0',
            'qty'       => $qty_kg,
            'qty_etc'   => $qty,
            'satuan'   => $satuan
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
        $nmCustomer = $this->session->userdata('nama_customer');
        $idCustomer = $this->session->userdata('id_customer');

        // print_r($NoPO, $NoSJ);

        if (!empty($tglKirim) && !empty($NoPO) && !empty($tglPO) && !empty($alamatKirim)) {
            $simpan = $this->po->simpan_po($NoPO, $NoSJ, $tglPO, $tglKirim, $alamatKirim, $idCustomer);
            if ($simpan) {
                $this->cart->destroy();
                $this->session->unset_userdata('tgl_kirim');
                $this->session->unset_userdata('nopo');
                $this->session->unset_userdata('tgl_po');
                $this->session->unset_userdata('nosj');
                $this->session->unset_userdata('alamat_kirim');
                $this->session->unset_userdata('nama_customer');
                $this->session->unset_userdata('id_customer');
                echo $this->session->set_flashdata('msg', '<label class="label label-success">PO Berhasil di Tambahkan</label>');
                redirect('PO/list_po');
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

        $data = array(
            'fn_status_po' => '1'
        );

        $this->po->update_status_po($idpo, $data);
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
    public function list_offer_po () {
        $status = '2';
        
        $data['list_offer_po'] = $this->po->get_offer_po_data($status)->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_list_offer_po', $data);
        $this->template->render();
    }

    public function penawaran_harga($id_po) {
        $data['po_data'] = $this->po->get_po_data_by_id($id_po);
        $data['barang_po'] = $this->po->get_barang_po_by_id($id_po);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_penawaran_harga', $data);
        $this->template->render();
    }

    public function add_penawaran_harga($idpo) {
        $hargaPenawaran = $this->input->post('harga_penawaran');

        $data = array(
            'fn_idpo'		=>	$idpo,
            'fn_idekspedisi'   => $this->session->userdata('id_ekspedisi'),
            'fm_harga_ekspedisi'        => $hargaPenawaran,
            'fd_tgl_penawaran'      => date('y-m-d H:i:s'),
            'fn_status_penawaran'     => '0'
        );

        $this->po->insert_penawaran_harga($data);
        redirect('PO/list_offer_po');
    }

    //PILIH EKSPEDISI
    public function pilih_ekspedisi ($idpo) {
        
        $data['pilih_ekspedisi'] = $this->po->get_penawaran_ekspedisi($idpo)->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_pilih_ekspedisi', $data);
        $this->template->render();
    }

    public function approve_penawaran($idpo, $id_penawaran) {

        $harga = $this->po->get_harga_penawaran($id_penawaran)->row();

        $data1 = array(
            'fd_tglsj'              => date('Y-m-d'),
            'fm_harga_ekspedisi'    => $harga->fm_harga_ekspedisi,
            'fn_status_po'          => '3'
        );

        $data2 = array(
            'fn_status_penawaran'   => '1'
        );

        $this->po->update_approve_penawaran($idpo, $id_penawaran, $data1, $data2);
        redirect('PO/list_po');
    }

    // Konfirmasi Order PO
    public function list_confirmation_po () {
        $status1 = '3';
        $status2 = '1';
        $id_ekspedisi = $this->session->userdata('id_ekspedisi');
        
        $data['list_confirmation_po'] = $this->po->get_confirmation_po_data($status1, $status2, $id_ekspedisi)->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_list_confirmation_po', $data);
        $this->template->render();
    }

    public function konfirmasi_po($id_po) {
        $data['po_data'] = $this->po->get_po_data_by_id($id_po);
        $data['barang_po'] = $this->po->get_barang_po_by_id($id_po);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_konfirmasi_po', $data);
        $this->template->render();
    }

    public function deal_konfirmasi_po($idpo) {

        $data = array(
            'fn_status_po'     => '4'
        );

        $this->po->update_status_po($idpo, $data);
        redirect('PO/list_offer_po');
    }

    public function gagal_konfirmasi_po($idpo) {

        $data1 = array(
            'fn_status_po'     => '2'
        );

        $data2 = array(
            'fn_status_penawaran'     => '0'
        );

        $this->po->update_status_po_penawaran_gagal($idpo, $data1, $data2);
        redirect('PO/list_offer_po');
    }

    //PROSES LOADING
    public function proses_loading($idpo) {
        $data['po_data'] = $this->po->get_po_data_by_id($idpo);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('PO/vw_proses_loading', $data);
        $this->template->render();
    }

    public function import_po()
  {
        $config['upload_path']   = './assets/export/';
		$config['allowed_types'] = 'xls|xlsx|csv';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);

		}
		else
		{
            $file = $this->upload->data();
            $name = $file["file_name"];
        }
    
        $inputFileName = './assets/export/'.$name;

		$inputFileType = IOFactory::identify($inputFileName);
		$objReader = IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);

		$sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
   
        for ($row=2; $row <= $highestRow ; $row++) {
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        // if($rowData[0][3]!=""){

            // $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
            $no_po = $rowData[0][0];
            $tgl_po = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP(str_replace("/","-",$rowData[0][2])));
            $tgl_kirim = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP(str_replace("/","-",$rowData[0][3])));
            $alamat_lokasi_kirim = $rowData[0][4];
            $barang = $rowData[0][5];
            $customer = $rowData[0][6];
          //  $databarang = array();

            //$check = $this->M_barang->checkBarang(@$kode_barang)->num_rows();
            // print_r($this->db->last_query());
            //if($check > 0){

                $databarang = array(
                //'id_barang'     => $this->input->post('id_barang'),
                    'fc_kdpo'     =>  @$no_po,
                    'fd_tglpo'     =>  $tgl_po,
                    'fd_target_tglkirim'     =>  $tgl_kirim,
                    'fv_alamat_kirim'     =>  @$alamat_lokasi_kirim,
                    'fn_id_customer' => $customer
                );
                // //$where = ['kode_barcode_varian' => $barcode]; 

                $this->db->insert('tm_po', $databarang);

               $master_po = $this->po->checkMasterPO($no_po)->result_array();
            //    print_r($this->db->last_query());
                //for ($i=0; $i < sizeof($master_po); $i++) { 

                    $data = explode('|', $barang);   
                    foreach ($data as $key => $value) {
                    $data2[$key] = explode(',', $value);
        
                    }
                
                
                    $detail_po = array();
                    for ($i=0; $i < count($data2); $i++) { 
                    
                        $detail_po[] = array(
                            'fn_idpo'              => $master_po[0]['fn_idpo'],
                            'fc_kdpo' => $no_po,
                            'fn_id_barang'    => @$data2[$i][0],
                            'fv_nmbarang'     => @$data2[$i][1],
                            'fn_qty'     => @$data2[$i][2],
                            'fv_satuan'     => @$data2[$i][3],
                            'fn_qty_kg'     => @$data2[$i][4],
                        );
                    } 
             //   }  

                    $this->db->insert_batch('td_po', $detail_po); 
          

        
        }  
        redirect('PO/list_po','refresh');
        // echo "<script>
        // window.history.back();
        // </script>"; 
    }

    public function download_format()
    {
        force_download('./assets/download/BookFormat.xlsx', NULL);
        echo "<script>
        window.history.back();
        </script>"; 
    }
      
}	