<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Penilaian extends MY_Admin {

	function __construct() {
        parent::__construct();
        $this->load->model('M_penilaian', 'penilaian');
    }

	public function index()
	{
        $id_customer = $this->session->userdata('id_customer');
        $data['list_barang_terima'] = $this->penilaian->get_barang_terima($id_customer)->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Penilaian/vw_list_barang_terima', $data);
        $this->template->render();
    }

    public function konfirmasi_terima_barang($idpo) {

        $data = array(
            'fd_tgl_konfirmasi_terima_barang'   => date('Y-m-d'),
            'fn_status_po' => '9'
        );

        $this->penilaian->konfirmasi_terima_barang($idpo, $data);
        redirect('Penilaian');
    }

    public function penilaian_pengiriman($idpo, $kdpo, $kdsj = '')
	{
        $data['kriteria'] = $this->penilaian->get_list_kriteria_pengiriman()->result();
        $data['idpo'] = $idpo;
        $data['kdpo'] = $kdpo;
        $data['kdsj'] = $kdsj;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Penilaian/vw_penilaian_pengiriman', $data);
        $this->template->render();
    }

    public function lihat_penilaian_pengiriman($idpo, $kdpo, $kdsj = '')
	{
        $data['kriteria'] = $this->penilaian->get_list_kriteria_pengiriman()->result();
        $data['nilai_pengiriman'] = $this->penilaian->get_nilai_pengiriman($idpo, $kdpo, $kdsj)->result();
        $data['saran_pengiriman'] = $this->penilaian->get_nilai_pengiriman($idpo, $kdpo, $kdsj)->row();
        $data['idpo'] = $idpo;
        $data['kdpo'] = $kdpo;
        $data['kdsj'] = $kdsj;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Penilaian/vw_lihat_penilaian_pengiriman', $data);
        $this->template->render();
    }

    public function insert_penilaian_pengiriman($idpo, $kdpo, $kdsj = '') {

        $rating1 = $this->input->post('rating1');
        $rating2 = $this->input->post('rating2');
        $rating3 = $this->input->post('rating3');
        $rating4 = $this->input->post('rating4');
        $rating5 = $this->input->post('rating5');
        $kritik_saran = $this->input->post('kritik_saran');

        $bobotEkspedisi1 = $rating1*8;
        $bobotEkspedisi2 = $rating2*4;
        $bobotKTG3 = $rating3*6;
        $bobotKTG4 = $rating4*4;
        $bobotKTG5 = $rating5*10;
        $bobotEkspedisi5 = $rating5*8;

        // print_r($bobot1);

        $data1 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '1',
            'fn_poin'     => $rating1,
            'fn_bobot_ekspedisi'   => $bobotEkspedisi1,
            'fn_bobot_ktg'   => '0',
            'fv_saran'   => $kritik_saran
        );

        $data2 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '2',
            'fn_poin'     => $rating2,
            'fn_bobot_ekspedisi'   => $bobotEkspedisi2,
            'fn_bobot_ktg'   => '0',
            'fv_saran'   => $kritik_saran
        );

        $data3 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '3',
            'fn_poin'     => $rating3,
            'fn_bobot_ekspedisi'   => '0',
            'fn_bobot_ktg'   => $bobotKTG3,
            'fv_saran'   => $kritik_saran
        );

        $data4 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '4',
            'fn_poin'     => $rating4,
            'fn_bobot_ekspedisi'   => '0',
            'fn_bobot_ktg'   => $bobotKTG4,
            'fv_saran'   => $kritik_saran
        );

        $data5 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '5',
            'fn_poin'     => $rating5,
            'fn_bobot_ekspedisi'   => $bobotEkspedisi5,
            'fn_bobot_ktg'   => $bobotKTG5,
            'fv_saran'   => $kritik_saran
        );

        $data6 = array(
            'fd_tgl_penilaian'      => date('Y-m-d'),
            'fv_nm_penilai'         => $this->session->userdata('nama_customer'),
        );

        $this->penilaian->insert_penilaian_pengiriman($idpo, $data1, $data2, $data3, $data4, $data5, $data6);
        redirect('Penilaian');
    }

    //PENILAIAN KELUHAN

    public function penilaian_keluhan($kdkeluhan, $idpo, $kdpo, $kdsj = '')
	{
        $data['kriteria'] = $this->penilaian->get_list_kriteria_keluhan()->result();
        $data['kdkeluhan'] = $kdkeluhan;
        $data['idpo'] = $idpo;
        $data['kdpo'] = $kdpo;
        $data['kdsj'] = $kdsj;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Penilaian/vw_penilaian_keluhan', $data);
        $this->template->render();
    }

    public function lihat_penilaian_keluhan($kdkeluhan, $idpo, $kdpo, $kdsj = '')
	{
        $data['kriteria'] = $this->penilaian->get_list_kriteria_keluhan()->result();
        $data['nilai_keluhan'] = $this->penilaian->get_nilai_keluhan($kdkeluhan, $idpo, $kdpo, $kdsj)->result();
        $data['saran_keluhan'] = $this->penilaian->get_nilai_keluhan($kdkeluhan, $idpo, $kdpo, $kdsj)->row();
        $data['idpo'] = $idpo;
        $data['kdpo'] = $kdpo;
        $data['kdsj'] = $kdsj;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Penilaian/vw_lihat_penilaian_keluhan', $data);
        $this->template->render();
    }

    public function insert_penilaian_keluhan($kdkeluhan, $idpo, $kdpo, $kdsj = '') {

        $rating1 = $this->input->post('rating1');
        $rating2 = $this->input->post('rating2');
        $kritik_saran = $this->input->post('kritik_saran');

        $bobotKTG1 = $rating1*10;
        $bobotKTG2 = $rating2*10;

        $data1 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fc_kdkeluhan'		=>	$kdkeluhan,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '1',
            'fn_point'     => $rating1,
            'fn_bobot'   => $bobotKTG1,
            'fn_iddepartment' => '',
            'fv_kritik_saran'   => $kritik_saran
        );

        $data2 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	$kdsj,
            'fc_kdkeluhan'		=>	$kdkeluhan,
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '2',
            'fn_point'     => $rating2,
            'fn_bobot'   => $bobotKTG2,
            'fn_iddepartment' => '',
            'fv_kritik_saran'   => $kritik_saran
        );

        $this->penilaian->insert_penilaian_keluhan($data1, $data2);
        redirect('Keluhan');
    }

    //PENILAIAN RESPON GARANSI
    public function penilaian_garansi($idpo, $kdpo)
	{
        $data['kriteria'] = $this->penilaian->get_list_kriteria_keluhan()->result();
        $data['idpo'] = $idpo;
        $data['kdpo'] = $kdpo;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Penilaian/vw_penilaian_garansi', $data);
        $this->template->render();
    }

    public function insert_penilaian_garansi($idpo, $kdpo) {

        $rating1 = $this->input->post('rating1');
        $rating2 = $this->input->post('rating2');
        $kritik_saran = $this->input->post('kritik_saran');

        $bobotKTG1 = $rating1*10;
        $bobotKTG2 = $rating2*10;

        $data1 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	'',
            'fc_kdgaransi'		=>	'',
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '1',
            'fn_point'     => $rating1,
            'fn_bobot'   => $bobotKTG1,
            'fn_iddepartment' => '',
            'fv_kritik_saran'   => $kritik_saran
        );

        $data2 = array(
            'fn_idpo'		=>	$idpo,
            'fc_kdpo'		=>	$kdpo,
            'fc_kdsj'		=>	'',
            'fc_kdgaransi'		=>	'',
            'fn_id_customer'   => $this->session->userdata('id_customer'),
            'fn_idkriteria'        => '2',
            'fn_point'     => $rating2,
            'fn_bobot'   => $bobotKTG2,
            'fn_iddepartment' => '',
            'fv_kritik_saran'   => $kritik_saran
        );

        $this->penilaian->insert_penilaian_garansi($data1, $data2);
        redirect('Garansi');
    }
      
}	