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

                if($this->session->userdata('status') != "login"){
		        redirect(base_url("Auth"));
		}
        }

	public function index()
	{
                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Pengiriman/vw_list_pengiriman');
                $this->template->render();
        }

        public function loading_po($idpo) {

                $data = array (
                        'fv_img_load'   => $this->input->post('img_loading'),
                        'fn_status_po'  => '5'
                );

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
}	