<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Dashboard extends MY_Admin {

	function __construct() {
                parent::__construct();
                //$this->load->model('M_dashboard');
        }

	public function index()
	{
                //$this->template->set_js(base_url().'build/home.js','footer', 'remote'); 
                
                $this->template->set_layout('Template/view_admin');
                $this->template->set_content('Dashboard/vw_dashboard');
                $this->template->render();
        }
        
      
}	