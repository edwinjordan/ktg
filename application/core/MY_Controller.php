<?php
	class MY_Controller extends CI_Controller{
		
	}
	class MY_Admin extends MY_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->load->library('template');
            $this->load->library('cart');
        	$this->template->set_platform('public');
        	$this->template->set_theme('admin-lte');  
			// if($this->session->userdata("admin_username") == FALSE){
			// 	redirect("Login/");
			// }
			$this->_loadcss();
        	$this->_loadjs();
        	$this->_loadpart();
			
		}

	protected function _loadpart() {
       // $data_header['active'] = 'beranda';
      //  $this->template->set_part('navbar', 'Template/view_menu');
       // $data_footer['footer'] = $this->M_home->view('setting_ukuran');        
        $this->template->set_part('footer', 'Template/footer');
    }


    protected function _loadcss() {  
        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/fontawesome-free/css/all.min.css', 'remote');        
        $this->template->set_css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', 'remote');
        $this->template->set_css(base_url().'assets/public/themes/admin-lte/dist/css/adminlte.min.css', 'remote');   

        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css','remote'); 

        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css','remote');  
        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/jqvmap/jqvmap.min.css','remote'); 
        $this->template->set_css(base_url().'assets/public/themes/admin-lte/dist/css/adminlte.min.css','remote');  

        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css','remote'); 

        // $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugin/fullcalendar/fullcalendar.min.css','remote'); 
        // $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugin/fullcalendar/fullcalendar.print.css','remote');
        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/daterangepicker/daterangepicker.css','remote');
        $this->template->set_css(base_url().'assets/public/themes/admin-lte/plugins/summernote/summernote-bs4.css','remote');    

        $this->template->set_css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700','remote');
        
        //$this->template->set_css('skin-blue.min.css');    
    }

    protected function _loadjs() {    
       
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/jquery/jquery.min.js','header', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/jquery-ui/jquery-ui.min.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/chart.js/Chart.min.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/sparklines/sparkline.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/jqvmap/jquery.vmap.min.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/jquery-knob/jquery.knob.min.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/moment/moment.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/daterangepicker/daterangepicker.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/summernote/summernote-bs4.min.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js','footer', 'remote');

        // $this->template->set_js(base_url().'assets/public/themes/admin-lte/plugin/fullcalendar/fullcalendar.min.js','footer', 'remote');
        // $this->template->set_js(base_url().'assets/public/themes/admin-lte/scripts/fullcalendar.init.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/dist/js/adminlte.js','footer', 'remote');
        $this->template->set_js(base_url().'assets/public/themes/admin-lte/dist/js/pages/dashboard.js','footer', 'remote');

        $this->template->set_js(base_url().'assets/public/themes/admin-lte/dist/js/demo.js','footer', 'remote');
        
       
    }


	}


    

	// class MY_Pegawai extends MY_Controller{
		
	// 	public function __construct(){
	// 		parent:: __construct();
	// 		if($this->session->userdata("username_pegawai") == FALSE){
	// 			redirect("Supir/");
	// 		}
			
	// 	}
	// }
	// class MY_Ukm extends MY_Controller{
		
	// 	public function __construct(){
	// 		parent:: __construct();
	// 		if($this->session->userdata("ukm") == FALSE ){
	// 			redirect("login/");
	// 		}
			
	// 	}
	// }
	// class MY_User extends MY_Controller{
		
	// 	public function __construct(){
	// 		parent:: __construct();
	// 		if($this->session->userdata("user") == FALSE ){
	// 			redirect("login/");
	// 		}
			
	// 	}
	// }
	
?>