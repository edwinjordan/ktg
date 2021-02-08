<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth extends MY_Admin {

	public function __construct(){
        parent::__construct();
       // $this->load->model('M_user');
        $this->load->library('session');
    }

    public function index(){
        $this->template->set_layout('Template/view_login');
        $this->template->set_content('Auth/vw_login');
        $this->template->render();
    }

    //  public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('Auth','refresh');
    // }

}	