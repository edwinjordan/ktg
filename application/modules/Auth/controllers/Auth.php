<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Auth extends MY_Admin {

	public function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('session');
    }

    //LOGIN KTG
    public function index(){
        $this->template->set_layout('Template/view_login');
        $this->template->set_content('Auth/vw_login');
        $this->template->render();
    }

	function login_ktg(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'fv_username' => $username,
			'fv_password' => $password
        );
            
		$cek = $this->M_login->login_checking("tm_ktg", $where)->num_rows();
        $get_data_ktg = $this->M_login->login_checking("tm_ktg", $where)->row();

        if($cek > 0){
 
			$data_session = array(
				'id_ktg' => $get_data_ktg->fn_id_ktg,
                'email_ktg' => $get_data_ktg->fv_email,
                'nama_ktg' => $get_data_ktg->fv_nmktg,
                'alamat_ktg' => $get_data_ktg->fv_alamat_ktg,
                'nohp_ktg' => $get_data_ktg->fv_no_hp,
                'username_ktg' => $get_data_ktg->fv_username,
                'password_ktg' => $get_data_ktg->fv_password,
                'level_user' => $get_data_ktg->fn_idlevel,
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("Dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout_ktg(){
		$this->session->sess_destroy();
		redirect(base_url('Auth'));
	}

    // LOGIN EKSPEDISI
    public function ekspedisi_sign_in(){
        $this->template->set_layout('Template/view_login');
        $this->template->set_content('Auth/vw_login_ekspedisi');
        $this->template->render();
    }

	function login_ekspedisi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'fv_username' => $username,
			'fv_password' => $password
        );
            
		$cek = $this->M_login->login_checking("tm_ekspedisi", $where)->num_rows();
        $get_data_ekspedisi = $this->M_login->login_checking("tm_ekspedisi", $where)->row();

        if($cek > 0){
 
			$data_session = array(
				'id_ekspedisi' => $get_data_ekspedisi->fn_idekspedisi,
                'email_ekspedisi' => $get_data_ekspedisi->fv_email,
                'nama_ekspedisi' => $get_data_ekspedisi->fv_nama_ekspedisi,
                'alamat_ekspedisi' => $get_data_ekspedisi->fv_alamat_ekspedisi,
                'nohp_ekspedisi' => $get_data_ekspedisi->fv_no_hp,
                'username_ekspedisi' => $get_data_ekspedisi->fv_username,
                'password_ekspedisi' => $get_data_ekspedisi->fv_password,
                'level_user' => $get_data_ekspedisi->fn_idlevel,
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("Dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout_ekspedisi(){
		$this->session->sess_destroy();
		redirect(base_url('Auth/ekspedisi_sign_in'));
	}

    // LOGIN Customer
    public function customer_sign_in(){
        $this->template->set_layout('Template/view_login');
        $this->template->set_content('Auth/vw_login_customer');
        $this->template->render();
    }

	function login_customer(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'fv_username' => $username,
			'fv_password' => $password
        );
            
		$cek = $this->M_login->login_checking("tm_customer", $where)->num_rows();
        $get_data_customer = $this->M_login->login_checking("tm_customer", $where)->row();

        if($cek > 0){
 
			$data_session = array(
				'id_customer' => $get_data_customer->fn_id_customer,
                'email_customer' => $get_data_customer->fv_email,
                'nama_customer' => $get_data_customer->fv_nmcustomer,
                'alamat_customer' => $get_data_customer->fv_alamat_customer,
                'nohp_customer' => $get_data_customer->fv_no_hp,
                'username_customer' => $get_data_customer->fv_username,
                'password_customer' => $get_data_customer->fv_password,
                'level_user' => $get_data_customer->fn_idlevel,
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("Dashboard"));
 
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout_customer(){
		$this->session->sess_destroy();
		redirect(base_url('Auth/customer_sign_in'));
	}
}	