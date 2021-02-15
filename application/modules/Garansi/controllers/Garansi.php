<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Garansi extends MY_Admin {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_garansi', 'garansi');
        $this->load->model('Keluhan/M_keluhan', 'keluhan');
    }

    public function index() {

        $id_customer = $this->session->userdata('id_customer');
        $data['barang_garansi'] = $this->garansi->get_barang_bergaransi_by_id_customer($id_customer)->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Garansi/vw_list_garansi', $data);
        $this->template->render();
    }

    //Submit Garansi
    public function submit_garansi($id_barang, $kdpo) {

        $data['barang'] = $this->garansi->get_barang_by_id($id_barang)->row();
        $data['kdpo'] = $kdpo;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Garansi/vw_submit_garansi', $data);
        $this->template->render();
    }

    public function input_submit_garansi() {

        $NoPO = $this->input->post('nopo');
        $NoSJ = $this->input->post('nosj');
        $ContactOwner = $this->input->post('contact_owner');
        $TglKirimKTG = $this->input->post('tgl_kirim');
        $LokasiProject = $this->input->post('lokasi_project');
        $Customer = $this->input->post('customer');
        $JnsProject = $this->input->post('jns_project');
        $KodeBarang = $this->input->post('kode_barang');
        $LuasanProject = $this->input->post('luasan_project');
        $NoSJDistributor = $this->input->post('sj_distributor');
        $FotoSJ = $this->input->post('foto_sj');
        $GambarPanel = $this->input->post('gmbr_panel');
        $NamaOwner = $this->input->post('nama_owner');

        $data = array(
            'fc_kdgaransi'          => uniqid(),
            'fc_kdpo'               => $NoPO,
            'fc_kdsj'               => $NoSJ,
            'fd_tglkirim_ktg'       => $TglKirimKTG,
            'fn_id_customer'        => $this->session->userdata('id_customer'),
            'fc_kdbarang'           => $KodeBarang,
            'fn_jml_barang'         => '0',
            'fc_sjno_distributor'   => $NoSJDistributor,
            'f_foto_distributor'    => $FotoSJ,
            'fv_nmowner_project'    => $NamaOwner,
            'fc_contact_owner'      => $ContactOwner,
            'fv_lokasi_project'     => $LokasiProject,
            'fv_jenis_project'      => $JnsProject,
            'fv_luasan_project'     => $LuasanProject,
            'f_gambar'              => $GambarPanel,
            'fc_sts'                => '0'
        );

        $this->garansi->input_submit_garansi($data);
        redirect('Garansi');
    }

    //Klaim Garansi
    public function klaim_garansi($kdpo) {

        $data['barang_garansi'] = $this->garansi->get_barang_garansi_by_kdpo($kdpo)->row();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Garansi/vw_klaim_garansi', $data);
        $this->template->render();
    }

    public function input_klaim_garansi() {

        $KodeGaransi = $this->input->post('kdgaransi');
        $IndikasiKerusakan = $this->input->post('indikasi_kerusakan');
        $FotoRusak = $this->input->post('foto_rusak');
        $NamaPelapor = $this->input->post('nama_pelapor');
        $TglRusak = $this->input->post('tgl_rusak');
        $JabatanPelapor = $this->input->post('jabatan_pelapor');
        $LuasanRusak = $this->input->post('luasan_rusak');
        $TglLapor = $this->input->post('tgl_lapor');

        $data = array(
            'fc_kdgaransi'          => $KodeGaransi,
            'f_foto_kerusakan'      => $FotoRusak,
            'fd_tgl_kerusakan'      => $TglRusak,
            'fv_luasan_kerusakan'   => $LuasanRusak,
            'fv_indikasi_kerusakan' => $IndikasiKerusakan,
            'fv_nmpelapor'          => $NamaPelapor,
            'fv_jabatan_pelapor'    => $JabatanPelapor,
            'fd_tgl_lapor'          => $TglLapor
        );

        $this->garansi->insert_klaim_garansi($data);
        redirect('Garansi');
    }

    //Pengajuan Garansi
    public function list_pengajuan_garansi() {

        $data['pengajuan_garansi'] = $this->garansi->get_klaim_garansi()->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Garansi/vw_list_pengajuan_garansi', $data);
        $this->template->render();
    }

    public function investigasi_garansi($kdgaransi) {

        $data['department'] = $this->keluhan->get_department()->result();
        $data['kdgaransi'] = $kdgaransi;

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Garansi/vw_investigasi_garansi', $data);
        $this->template->render();
    }

    public function insert_investigasi_garansi($kdgaransi) {

        $department = $this->input->post('pic_ktg');
        $analisaMasalah = $this->input->post('analisa_masalah');
        $rencanaPenggantian = $this->input->post('rencana_penggantian');
        $dueDate = $this->input->post('due_date');
        $qty = $this->input->post('qty');
        $catatan = $this->input->post('catatan');

        $data1 = array(
            'fc_kdgaransi'  => $kdgaransi,
            'fn_iddepartment'   => $department,
            'f_analisa_masalah'   => $analisaMasalah,
            'fn_qty'   => $qty,
            'fd_due_date'   => $dueDate,
            'fv_rencana_penggantian'  => $rencanaPenggantian,
            'fv_catatan'   => $catatan
        );

        $data2 = array(
            'fc_sts'    => '1'
        );

        $this->garansi->insert_investigasi_garansi($kdgaransi, $data1, $data2);
        redirect('Garansi/list_pengajuan_garansi');
    }

    public function approval_garansi($kdgaransi) {

        $data['kdgaransi'] = $kdgaransi;
        $data['investigasi_garansi'] = $this->garansi->get_investigasi_garansi($kdgaransi)->row();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Garansi/vw_approval_garansi', $data);
        $this->template->render();
    }

    public function update_approval_garansi($kdgaransi) {
        $data = array(
            'fc_sts'    => '2'
        );

        $this->garansi->update_status_garansi($kdgaransi, $data);
        redirect('Garansi/list_pengajuan_garansi');
    }
}