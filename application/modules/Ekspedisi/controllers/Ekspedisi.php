<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Ekspedisi extends MY_Admin
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EkspedisiModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('EkspedisiModel');
        $data['ekspedisi'] = $this->EkspedisiModel->get_data();
        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Ekspedisi/index_ekspedisi', $data);
        $this->template->render();
    }

    public function create()
    {
        $this->template->set_layout('template/view_admin');
        $this->template->set_content('Ekspedisi/aksi/tambah');
        $this->template->render();
    }
    public function save()
    {
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('namaEks', 'namaEks', 'trim|required');
        $this->form_validation->set_rules('alamatEks', 'alamatEks', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('kodePos', 'kodePos', 'trim|required');
        $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
        $this->form_validation->set_rules('telpKantor', 'telpKantor', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Ekspedisi/create'); 
        }else{ 

            $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-ekspedisi/');
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000000';
            $config['max_width'] = '2024';
            $config['max_height']= '1468';
            // $config['file_name'] = $nama_file;	
            
            $new_name = 'fotoekspedisi_'.time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('foto-ekspedisi')){
                $data = array(
                'fv_email' => $this->input->post('email'),
                'fv_nama_ekspedisi' => $this->input->post('namaEks'),
                'fv_alamat_ekspedisi' => $this->input->post('alamatEks'),
                'fv_kecamatan' => $this->input->post('kecamatan'),
                'fv_kota' => $this->input->post('kota'),
                'fv_provinsi' => $this->input->post('provinsi'),
                'fn_kode_pos' => $this->input->post('kodePos'),
                'fv_npwp' => $this->input->post('npwp'),
                'fv_telp_kantor' => $this->input->post('telpKantor'),
                'fv_no_hp' => $this->input->post('noHp'),
                'fv_username' => $this->input->post('username'),
                'fv_password' => md5($this->input->post('password')),
                'fv_view_password' => $this->input->post('password'),
                'fn_idlevel' => 3,
                'fv_pic_ekspedisi' => $this->input->post('foto-ekspedisi')
            );
            }else{
                //unlink('../assets/galeri/'.$this->input->post('terserah'));
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar1 = $nama_foto;
                $data = array(
                    'fv_email' => $this->input->post('email'),
                    'fv_nama_ekspedisi' => $this->input->post('namaEks'),
                    'fv_alamat_ekspedisi' => $this->input->post('alamatEks'),
                    'fv_kecamatan' => $this->input->post('kecamatan'),
                    'fv_kota' => $this->input->post('kota'),
                    'fv_provinsi' => $this->input->post('provinsi'),
                    'fn_kode_pos' => $this->input->post('kodePos'),
                    'fv_npwp' => $this->input->post('npwp'),
                    'fv_telp_kantor' => $this->input->post('telpKantor'),
                    'fv_no_hp' => $this->input->post('noHp'),
                    'fv_username' => $this->input->post('username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 3,
                    'fv_pic_ekspedisi' => $gambar1
                );	
            }
            $this->EkspedisiModel->inputData($data);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Tambah Data</div>');
            redirect('Ekspedisi/index');
        }
    }
    public function delete($fn_idekspedisi)
    {
        $where = array('fn_idekspedisi' => $fn_idekspedisi);
        $this->EkspedisiModel->hapusData($where);
        redirect('Ekspedisi/index');
    }
    public function ubah($id)
    {
        $where = array('fn_idekspedisi' => $id);
        $data['ekspedisi'] = $this->EkspedisiModel->ubahData($where, 'tm_ekspedisi')->result_array();
        $this->template->set_layout('template/view_admin');
        $this->template->set_content('Ekspedisi/aksi/ubah', $data);
        $this->template->render();
    }



    public function update($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('namaEks', 'namaEks', 'trim|required');
        $this->form_validation->set_rules('alamatEks', 'alamatEks', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('kodePos', 'kodePos', 'trim|required');
        $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
        $this->form_validation->set_rules('telpKantor', 'telpKantor', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Update Data Salah</div>');
            redirect('Ekspedisi/ubah/'.$id); 
        }else{
            $where['fn_idekspedisi'] = $id;
            
            $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-ekspedisi/');
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000000';
            $config['max_width'] = '2024';
            $config['max_height']= '1468';
            // $config['file_name'] = $nama_file;	
            
            $new_name = 'fotoekspedisi_'.time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('foto-ekspedisi')){
                $data = array(
                'fv_email' => $this->input->post('email'),
                'fv_nama_ekspedisi' => $this->input->post('namaEks'),
                'fv_alamat_ekspedisi' => $this->input->post('alamatEks'),
                'fv_kecamatan' => $this->input->post('kecamatan'),
                'fv_kota' => $this->input->post('kota'),
                'fv_provinsi' => $this->input->post('provinsi'),
                'fn_kode_pos' => $this->input->post('kodePos'),
                'fv_npwp' => $this->input->post('npwp'),
                'fc_telp_kantor' => $this->input->post('telpKantor'),
                'fv_no_hp' => $this->input->post('noHp'),
                'fv_username' => $this->input->post('username'),
                'fv_password' => md5($this->input->post('password')),
                'fv_view_password' => $this->input->post('password'),
                'fn_idlevel' => 3,
                'fv_pic_ekspedisi' => $this->input->post('foto-ekspedisi')
            );
            }else{
                //unlink('../assets/galeri/'.$this->input->post('terserah'));
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar1 = $nama_foto;
                $data = array(
                    'fv_email' => $this->input->post('email'),
                    'fv_nama_ekspedisi' => $this->input->post('namaEks'),
                    'fv_alamat_ekspedisi' => $this->input->post('alamatEks'),
                    'fv_kecamatan' => $this->input->post('kecamatan'),
                    'fv_kota' => $this->input->post('kota'),
                    'fv_provinsi' => $this->input->post('provinsi'),
                    'fn_kode_pos' => $this->input->post('kodePos'),
                    'fv_npwp' => $this->input->post('npwp'),
                    'fc_telp_kantor' => $this->input->post('telpKantor'),
                    'fv_no_hp' => $this->input->post('noHp'),
                    'fv_username' => $this->input->post('username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 3,
                    'fv_pic_ekspedisi' => $gambar1
                );	
            }
            $this->EkspedisiModel->updateData($where,$data,'tm_ekspedisi');
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Edit Data</div>');
            redirect('Ekspedisi/index');
        }
    }

    //  public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('Auth','refresh');
    // }

}
