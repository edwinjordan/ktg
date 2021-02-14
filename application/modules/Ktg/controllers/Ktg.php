<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Ktg extends MY_Admin
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KtgModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('KtgModel');
        $data['ktg'] = $this->KtgModel->get_data();
        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Ktg/view_ktg', $data);
        $this->template->render();
    }

    public function create()
    {
        $this->template->set_layout('template/view_admin');
        $this->template->set_content('Ktg/view_tambah_ktg');
        $this->template->render();
    }

    public function save()
    {
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fv_email', 'fv_email', 'trim|required');
        $this->form_validation->set_rules('fv_nmktg', 'fv_nmktg', 'trim|required');
        $this->form_validation->set_rules('fv_alamat_ktg', 'fv_alamat_ktg', 'trim|required');
        $this->form_validation->set_rules('fv_no_hp', 'fv_no_hp', 'trim|required');
        $this->form_validation->set_rules('fv_username', 'fv_username', 'trim|required');
        $this->form_validation->set_rules('fv_password', 'fv_password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Ekspedisi/create'); 
        }else{ 

            $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-ktg/');
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000000';
            $config['max_width'] = '2024';
            $config['max_height']= '1468';
            // $config['file_name'] = $nama_file;	
            
            $new_name = 'fotoktg_'.time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('foto-ktg')){
                $data = array(
                'fv_email' => $this->input->post('fv_email'),
                'fv_nmktg' => $this->input->post('fv_nmktg'),
                'fv_alamat_ktg' => $this->input->post('fv_alamat_ktg'),
                'fv_username' => $this->input->post('fv_username'),
                'fv_password' => md5($this->input->post('password')),
                'fv_view_password' => $this->input->post('password'),
                'fn_idlevel' => 1
            );
            }else{
                //unlink('../assets/galeri/'.$this->input->post('terserah'));
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar1 = $nama_foto;
                $data = array(
                    'fv_email' => $this->input->post('fv_email'),
                    'fv_nmktg' => $this->input->post('fv_nmktg'),
                    'fv_alamat_ktg' => $this->input->post('fv_alamat_ktg'),
                    'fv_username' => $this->input->post('fv_username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 1,
                    'fv_pic_ktg' => $gambar1
                );	
            }
            $this->KtgModel->inputData($data);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Tambah Data</div>');
            redirect('Ktg/index');
        }
    }
    public function delete($fn_id_ktg)
    {
        $where = array('fn_id_ktg' => $fn_id_ktg);
        $this->KtgModel->hapusData($where);
        redirect('Ktg/index');
    }
    public function ubah($id)
    {
        $where = array('fn_id_ktg' => $id);
        $data['ktg'] = $this->KtgModel->ubahData($where, 'tm_ktg')->result_array();
        $this->template->set_layout('template/view_admin');
        $this->template->set_content('Ktg/view_ubah_ktg', $data);
        $this->template->render();
    }



    public function update($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fv_email', 'fv_email', 'trim|required');
        $this->form_validation->set_rules('fv_nmktg', 'fv_nmktg', 'trim|required');
        $this->form_validation->set_rules('fv_alamat_ktg', 'fv_alamat_ktg', 'trim|required');
        $this->form_validation->set_rules('fv_no_hp', 'fv_no_hp', 'trim|required');
        $this->form_validation->set_rules('fv_username', 'fv_username', 'trim|required');
        $this->form_validation->set_rules('fv_password', 'fv_password', 'trim|required');

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
                    'fv_email' => $this->input->post('fv_email'),
                    'fv_nmktg' => $this->input->post('fv_nmktg'),
                    'fv_alamat_ktg' => $this->input->post('fv_alamat_ktg'),
                    'fv_username' => $this->input->post('fv_username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 1
            );
            }else{
                //unlink('../assets/galeri/'.$this->input->post('terserah'));
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar1 = $nama_foto;
                $data = array(
                    'fv_email' => $this->input->post('fv_email'),
                    'fv_nmktg' => $this->input->post('fv_nmktg'),
                    'fv_alamat_ktg' => $this->input->post('fv_alamat_ktg'),
                    'fv_username' => $this->input->post('fv_username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 1,
                    'fv_pic_ktg' => $gambar1
                );	
            }
            $this->KtgModel->updateData($where,$data,'tm_ktg');
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Edit Data</div>');
            redirect('Ktg/index');
        }
    }

    //  public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('Auth','refresh');
    // }

}
