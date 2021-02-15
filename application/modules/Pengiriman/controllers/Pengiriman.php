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
                $data['list_pengiriman_po'] = $this->Pengiriman->get_ekspedisi_pengiriman_data($id_ekspedisi);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_list_pengiriman', $data);
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
                        $data = array (
                                'fd_tglmuat'    => date('Y-m-d'),
                                'fv_img_load'   => $this->input->post('img_loading'),
                                'fn_status_po'  => '5'
                        );
                } else{
                        $get_name = $this->upload->data();
                        $nama_foto = $get_name['file_name'];
                        $gambar1 = $nama_foto;
                        $data = array (
                                'fd_tglmuat'    => date('Y-m-d'),
                                'fv_img_load'   => $gambar1,
                                'fn_status_po'  => '5'
                        );
                }

                $this->Pengiriman->update_load_po($idpo, $data);
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

                $data = array(
                        'fn_status_po'  => '6'
                );

                $this->po->update_status_po($idpo, $data);
                redirect('PO/list_po');
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

                $data = array(
                        'fn_status_po'  => '10'
                );

                $this->po->update_status_po($idpo, $data);
                redirect('PO/list_po');
        }

        //Proses Unhold
        public function proses_unhold($idpo) {
                $data['po_data'] = $this->po->get_po_data_by_id($idpo);
                $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_proses_unhold', $data);
                $this->template->render();
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

                $data = array(
                        'fv_transit'  => $transit 
                );

                $this->po->update_status_po($idpo, $data);
                redirect('PO/list_po');
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

                $data = array(
                        'fd_target_tglsampai'   => date('Y-m-d'),
                        'fn_status_po'  => '7'
                );

                $this->po->update_status_po($idpo, $data);
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

                $data = array(
                        'fn_status_po'  => '8'
                );

                $this->po->update_status_po($idpo, $data);
                redirect('Pengiriman');
        }

}	