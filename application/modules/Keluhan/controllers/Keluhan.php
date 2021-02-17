<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Keluhan extends MY_Admin {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_keluhan', 'keluhan');
        $this->load->model('PO/M_PO', 'po');
    }

    public function index() {

        $level_user = $this->session->userdata('level_user');
        $id_customer = $this->session->userdata('id_customer');
        if($level_user == '1') {
            $data['keluhan_data'] = $this->keluhan->get_laporan_keluhan_ktg();
        } elseif($level_user == '2') {
            $data['keluhan_data'] = $this->keluhan->get_laporan_keluhan_customer($id_customer);
        }

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_list_keluhan', $data);
        $this->template->render();
    }

    public function pelaporan_keluhan($idpo) {

        $data['po_data'] = $this->po->get_po_data_by_id($idpo);
        $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_submit_keluhan', $data);
        $this->template->render();
    }

    public function submit_keluhan($idpo, $kdpo, $kdsj = '') {

        $kodePO = $this->input->post('nopo');
        $tglKeluhan = $this->input->post('tgl_keluhan');
        $kodeBarang = $this->input->post('kode_barang');
        $jumlahRusak = $this->input->post('jml_rusak');
        $indikasiPenyebab = $this->input->post('indikasi_penyebab');
        $namaPelapor = $this->input->post('nama_pelapor');
        $jenisKeluhan = $this->input->post('jns_keluhan');
        $jabatanPelapor = $this->input->post('jabatan_pelapor');

        $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-barang-cacat/');
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2000000';
        $config['max_width'] = '2024';
        $config['max_height']= '1468';
                
        $new_name = 'fotoLoading_'.time();
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('foto_barang')){
            $data = array(
                'fn_idpo'   => $idpo,
                'fc_kdpo'   => $kodePO,
                'fc_kdsj'   => $kdsj,
                'fc_kdkeluhan'  => uniqid(),
                'fc_kdbarang'   => $kodeBarang,
                'fn_jml_rusak'  => $jumlahRusak,
                'fv_jenis_keluhan'  => $jenisKeluhan,
                'fd_tgl_keluhan'    => $tglKeluhan,
                'fv_foto_rusak'     => '0',
                'fv_foto_spk'   => '0',
                'fv_indikasi_penyebab'  => $indikasiPenyebab,
                'fn_id_customer'    => $this->session->userdata('id_customer'),
                'fv_nmpelapor'  => $namaPelapor,
                'fv_jabatan_pelapor'    => $jabatanPelapor,
                'fc_approval'   => '0'
            );
        } else{
            $get_name = $this->upload->data();
            $nama_foto = $get_name['file_name'];
            $gambar1 = $nama_foto;

            if(!$this->upload->do_upload('foto_spk')){
                $data = array(
                    'fn_idpo'   => $idpo,
                    'fc_kdpo'   => $kodePO,
                    'fc_kdsj'   => $kdsj,
                    'fc_kdkeluhan'  => uniqid(),
                    'fc_kdbarang'   => $kodeBarang,
                    'fn_jml_rusak'  => $jumlahRusak,
                    'fv_jenis_keluhan'  => $jenisKeluhan,
                    'fd_tgl_keluhan'    => $tglKeluhan,
                    'fv_foto_rusak'     => $gambar1,
                    'fv_foto_spk'   => '0',
                    'fv_indikasi_penyebab'  => $indikasiPenyebab,
                    'fn_id_customer'    => $this->session->userdata('id_customer'),
                    'fv_nmpelapor'  => $namaPelapor,
                    'fv_jabatan_pelapor'    => $jabatanPelapor,
                    'fc_approval'   => '0'
                );
            } else {
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar2 = $nama_foto;
                $data = array(
                    'fn_idpo'   => $idpo,
                    'fc_kdpo'   => $kodePO,
                    'fc_kdsj'   => $kdsj,
                    'fc_kdkeluhan'  => uniqid(),
                    'fc_kdbarang'   => $kodeBarang,
                    'fn_jml_rusak'  => $jumlahRusak,
                    'fv_jenis_keluhan'  => $jenisKeluhan,
                    'fd_tgl_keluhan'    => $tglKeluhan,
                    'fv_foto_rusak'     => $gambar1,
                    'fv_foto_spk'   => $gambar2,
                    'fv_indikasi_penyebab'  => $indikasiPenyebab,
                    'fn_id_customer'    => $this->session->userdata('id_customer'),
                    'fv_nmpelapor'  => $namaPelapor,
                    'fv_jabatan_pelapor'    => $jabatanPelapor,
                    'fc_approval'   => '0'
                );
            }
        }

        $this->keluhan->insert_keluhan($data);
        redirect('Penilaian');
    }

    public function investigasi_keluhan($kdkeluhan) {

        $data['kdkeluhan'] = $kdkeluhan;
        $data['department'] = $this->keluhan->get_department()->result();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_investigasi_keluhan', $data);
        $this->template->render();
    }

    public function insert_investigasi_keluhan($kdkeluhan) {

        $department = $this->input->post('pic_ktg');
        $analisaMasalah = $this->input->post('analisa_masalah');
        $rencanaPerbaikan = $this->input->post('rencana_perbaikan');
        $dueDate = $this->input->post('due_date');
        $feedback = $this->input->post('feedback');

        $data1 = array(
            'fc_kdkeluhan'  => $kdkeluhan,
            'fn_iddepartment'   => $department,
            'fv_analisa_akar_masalah'   => $analisaMasalah,
            'fv_rencana_perbaikan'  => $rencanaPerbaikan,
            'fd_due_date'   => $dueDate,
            'fv_feedback'   => $feedback
        );

        $data2 = array(
            'fc_approval'   => '1'
        );

        $this->keluhan->insert_investigasi_keluhan($kdkeluhan, $data1, $data2);
        redirect('Keluhan');
    }

    public function approval_keluhan($kdkeluhan) {

        $data['kdkeluhan'] = $kdkeluhan;
        $data['investigasi_keluhan'] = $this->keluhan->get_investigasi_keluhan($kdkeluhan)->row();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_approve_keluhan', $data);
        $this->template->render();
    }

    public function approve_investigasi_keluhan($kdkeluhan) {

        $data = array(
            'fc_approval'   => '2'
        );

        $this->keluhan->update_status_keluhan($kdkeluhan, $data);
        redirect('Keluhan');
    }

    public function proses_perbaikan($kdkeluhan) {
        $data['kdkeluhan'] = $kdkeluhan;
        $data['investigasi_keluhan'] = $this->keluhan->get_investigasi_keluhan($kdkeluhan)->row();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_proses_perbaikan', $data);
        $this->template->render();
    }

    public function update_proses_perbaikan_keluhan($kdkeluhan) {
        $data = array(
            'fc_approval'   => '3'
        );

        $this->keluhan->update_status_keluhan($kdkeluhan, $data);
        redirect('Keluhan');
    }

    public function respon_pelanggan($kdkeluhan) {
        $data['kdkeluhan'] = $kdkeluhan;
        $data['investigasi_keluhan'] = $this->keluhan->get_investigasi_keluhan($kdkeluhan)->row();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_respon_pelanggan', $data);
        $this->template->render();
    }

    public function update_respon_kembali_pelanggan($kdkeluhan) {
        
        $keterangan = $this->input->post('keterangan');

        $data1 = array(
            'fc_approval'   => '4'
        );

        $data2 = array(
            'fv_keterangan' => $keterangan
        );

        $this->keluhan->update_respon_pelanggan($kdkeluhan, $data1, $data2);
        redirect('Keluhan');
    }

    //Detail Keluhan
    public function detail_keluhan($kdkeluhan, $idpo) {
        $data['keluhan_data'] = $this->keluhan->get_keluhan_data_by_id($kdkeluhan, $idpo)->row();
        $data['investigasi_keluhan'] = $this->keluhan->get_investigasi_keluhan($kdkeluhan)->row();
        $data['barang_po'] = $this->po->get_barang_po_by_id($idpo);

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Keluhan/vw_detail_keluhan', $data);
        $this->template->render();
    }

    function download_img_rusak($kdkeluhan)
    {
        $data = $this->db->get_where('tm_keluhan',['fc_kdkeluhan'=>$kdkeluhan])->row();
        force_download('assets/public/themes/admin-lte/img-barang-cacat/'.$data->fv_foto_rusak, NULL);
    }

    function download_img_spk($kdkeluhan)
    {
        $data = $this->db->get_where('tm_keluhan',['fc_kdkeluhan'=>$kdkeluhan])->row();
        force_download('assets/public/themes/admin-lte/img-barang-cacat/'.$data->fv_foto_spk, NULL);
    }
}