<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pengiriman extends MY_Admin {

	function __construct() {
                parent::__construct();
                $this->load->model('M_pengiriman', 'Pengiriman');
                $this->load->model('PO/M_PO', 'po');

                // if($this->session->userdata('status') != "login"){
		//         redirect(base_url("Auth"));
		// }
        }

	public function index()
	{
                $id_ekspedisi = $this->session->userdata('id_ekspedisi');
                $id_customer = $this->session->userdata('id_customer');

                if($id_ekspedisi) {
                        $data['list_pengiriman_po'] = $this->Pengiriman->get_ekspedisi_pengiriman_data($id_ekspedisi);
                } elseif($id_customer) {
                        $data['list_pengiriman_po'] = $this->Pengiriman->get_ekspedisi_pengiriman_data('', $id_customer);
                } else {
                        $data['list_pengiriman_po'] = $this->Pengiriman->get_ekspedisi_pengiriman_data();
                }
                
                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_list_pengiriman', $data);
                $this->template->render();
        }

        public function tracking_pengiriman($idpo) {

                $data['tracking'] = $this->Pengiriman->get_tracking_data($idpo)->result();

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_tracking', $data);
                $this->template->render();
        }

        public function loading_po($idpo) {

                $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-proses-loading/');
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['max_width'] = '2024';
                $config['max_height']= '1468';
                // $config['file_name'] = $nama_file;	
                
                $new_name = 'fotoLoading_'.time();
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if(!$this->upload->do_upload('img-loading')){
                        $data1 = array (
                                'fd_tglmuat'    => date('Y-m-d'),
                                'fv_img_load'   => $this->input->post('img_loading'),
                                'fn_status_po'  => '5'
                        );
                } else{
                        $get_name = $this->upload->data();
                        $nama_foto = $get_name['file_name'];
                        $gambar1 = $nama_foto;
                        $data1 = array (
                                'fd_tglmuat'    => date('Y-m-d'),
                                'fv_img_load'   => $gambar1,
                                'fn_status_po'  => '5'
                        );
                }

                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Loading (Muat)',
                        'fv_keterangan'         => ''
                );

                $this->Pengiriman->update_load_po($idpo, $data1, $data2);
                redirect(base_url('PO/list_po'));
        }
        
        public function do_upload()
        {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 2048;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload('img_loading')) {
    
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', '<label class="label label-danger">' . $error['error'] . '</label>');
                print_r ($error);
                // redirect('PO/list_po');
                die();
            } else {
    
                $data = $this->upload->data('file_name');
    
                return $data;
            }
        }

        //Proses Pengiriman
        public function proses_pengiriman($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_pengiriman', $data);
                $this->template->render();
        }

        public function update_proses_pengiriman($idpo) {

                $data1 = array(
                        'fn_status_po'  => '6'
                );

                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Kirim',
                        'fv_keterangan'         => ''
                );

                $this->Pengiriman->update_status_pengiriman($idpo, $data1, $data2);
                redirect('Pengiriman');
        }

        //Proses Hold
        public function proses_hold($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_hold', $data);
                $this->template->render();
        }

        public function update_proses_hold($idpo) {

                $alasanHold = $this->input->post('alasan_hold');

                $data1 = array(
                        'fv_alasan_hold'        => $alasanHold,
                        'fn_status_po'          => '10'
                );

                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Hold',
                        'fv_keterangan'         => $alasanHold
                );

                $this->Pengiriman->update_status_pengiriman($idpo, $data1, $data2);
                redirect('Pengiriman');
        }

        //Proses Unhold
        public function proses_unhold($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_unhold', $data);
                $this->template->render();
        }

        public function update_proses_unhold($idpo) {

                $data1 = array(
                        'fn_status_po'          => '6'
                );

                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Unhold',
                );

                $this->Pengiriman->update_status_pengiriman($idpo, $data1, $data2);
                redirect('Pengiriman');
        }

        //Proses Transit
        public function proses_transit($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_transit', $data);
                $this->template->render();
        }

        public function update_proses_transit($idpo) {

                $transit = $this->input->post('transit');

                $data1 = array(
                        'fv_transit'  => $transit 
                );

                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Transit',
                        'fv_keterangan'         => $transit
                );

                $this->Pengiriman->update_status_pengiriman($idpo, $data1, $data2);
                redirect('Pengiriman');
        }

        //Proses Unloading
        public function proses_unloading($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_unloading', $data);
                $this->template->render();
        }

        public function update_proses_unloading($idpo) {

                $data1 = array(
                        'fd_target_tglsampai'   => date('Y-m-d'),
                        'fn_status_po'  => '7'
                );

                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Unloading',
                        'fv_keterangan'         => ''
                );

                $this->Pengiriman->update_status_pengiriman($idpo, $data1, $data2);
                redirect('Pengiriman');
        }

        //Proses Barang Diterima
        public function proses_barang_diterima($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_barang_diterima', $data);
                $this->template->render();
        }

        public function update_proses_barang_diterima($idpo) {

                $data1 = array(
                        'fn_status_po'  => '8'
                );
                
                $data2 = array (
                        'fn_idpo'               => $idpo,
                        'fd_tgl_tracking'       => date('Y-m-d'),
                        'fv_status'             => 'Barang Sudah Diterima',
                        'fv_keterangan'         => ''
                );

                $this->Pengiriman->update_status_pengiriman($idpo, $data1, $data2);
                redirect('Pengiriman');
        }

        //Detail Pengiriman

        public function Detail_pengiriman($idpo) {
                $data['po_data'] = $this->Pengiriman->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_detail_pengiriman', $data);
                $this->template->render();
        }

        function download_img_load($idpo)
	{
		$data = $this->db->get_where('tm_po',['fn_idpo'=>$idpo])->row();
		force_download('assets/public/themes/admin-lte/img-proses-loading/'.$data->fv_img_load, NULL);
	}

}	