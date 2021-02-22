<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Rekapitulasi extends MY_Admin {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_rekapitulasi', 'Rekap');
    }

    public function index() {

        $level_user = $this->session->userdata('level_user');
        $id_ekspedisi = $this->session->userdata('id_ekspedisi');

        $data['rekap_pengiriman'] = $this->Rekap->rekap_bobot_pengiriman_ktg_perbulan()->result();
        $data['rekap_keluhan'] = $this->Rekap->rekap_bobot_keluhan_ktg_perbulan()->result();
        $data['rekap_garansi'] = $this->Rekap->rekap_bobot_garansi_ktg_perbulan()->result();

        if($id_ekspedisi) {
            $data['rekap_pengiriman_ekspedisi'] = $this->Rekap->rekap_bobot_pengiriman_ekspedisi_perbulan($id_ekspedisi)->result();
        }
                
        $this->template->set_layout('Template/view_admin');

        if($level_user == '1') {
            $this->template->set_content('Rekapitulasi/vw_rekap_bobot_ktg', $data);
        } else {
            $this->template->set_content('Rekapitulasi/vw_rekap_bobot_ekspedisi', $data);
        }
        
        $this->template->render();
    }
}