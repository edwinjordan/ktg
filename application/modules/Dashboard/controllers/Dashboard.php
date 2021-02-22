<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Dashboard extends MY_Admin {

	function __construct() {
                parent::__construct();
                $this->load->model('M_dashboard', 'dashboard');

                if($this->session->userdata('status') != "login"){
		        redirect(base_url("Auth"));
		}
        }

	public function index()
	{
                //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
                $level_user = $this->session->userdata('level_user');

                if($level_user == '1') {
                        $data['total_outstanding_po'] = $this->dashboard->total_outstanding_po()->row();
                        $data['total_outstanding_po_cek'] = $this->dashboard->total_outstanding_po()->num_rows();
                        $data['total_po_progress'] = $this->dashboard->total_po_progress()->row();
                        $data['total_po_progress_cek'] = $this->dashboard->total_po_progress()->num_rows();
                        $data['total_po_delivery'] = $this->dashboard->total_po_delivery()->row();
                        $data['total_keluhan'] = $this->dashboard->total_keluhan()->row();
                        $data['data_po_dashboard'] = $this->dashboard->data_po_dashboard()->result();
                } elseif($level_user == '2') {

                } else {

                }

                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Dashboard/vw_dashboard', $data);
                $this->template->render();
        }
        
      
}	