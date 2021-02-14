<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Customer extends MY_Admin
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('CustomerModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['customer'] = $this->CustomerModel->getData();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('customer/vw_customer', $data);
        $this->template->render();
    }
    public function tambah()
    {
        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Customer/vw_tambah');
        $this->template->render();
    }
    public function save()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('nama-customer', 'nama-customer', 'trim|required');
        $this->form_validation->set_rules('alamat-customer', 'alamat-customer', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('kode-pos', 'kode-pos', 'trim|required');
        $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
        $this->form_validation->set_rules('telp-kantor', 'telp-kantor', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Customer/tambah'); 
        }else{ 



            $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-customer/');
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000000';
            $config['max_width'] = '2024';
            $config['max_height']= '1468';
            // $config['file_name'] = $nama_file;	
            
            $new_name = 'fotocustomer_'.time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('foto-customer')){
                $data = array(
                'fv_email' => $this->input->post('email'),
                'fv_nmcustomer' => $this->input->post('nama-customer'),
                'fv_alamat_customer' => $this->input->post('alamat-customer'),
                'fv_kecamatan' => $this->input->post('kecamatan'),
                'fv_kota' => $this->input->post('kota'),
                'fv_provinsi' => $this->input->post('provinsi'),
                'fn_kode_pos' => $this->input->post('kode-pos'),
                'fv_npwp' => $this->input->post('npwp'),
                'fc_telp_kantor' => $this->input->post('telp-kantor'),
                'fv_no_hp' => $this->input->post('no-hp'),
                'fv_username' => $this->input->post('username'),
                'fv_password' => md5($this->input->post('password')),
                'fv_view_password' => $this->input->post('password'),
                'fn_idlevel' => 2
            );
            }else{
                //unlink('../assets/galeri/'.$this->input->post('terserah'));
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar1 = $nama_foto;
                $data = array(
                    'fv_email' => $this->input->post('email'),
                    'fv_nmcustomer' => $this->input->post('nama-customer'),
                    'fv_alamat_customer' => $this->input->post('alamat-customer'),
                    'fv_kecamatan' => $this->input->post('kecamatan'),
                    'fv_kota' => $this->input->post('kota'),
                    'fv_provinsi' => $this->input->post('provinsi'),
                    'fn_kode_pos' => $this->input->post('kode-pos'),
                    'fv_npwp' => $this->input->post('npwp'),
                    'fc_telp_kantor' => $this->input->post('telp-kantor'),
                    'fv_no_hp' => $this->input->post('no-hp'),
                    'fv_username' => $this->input->post('username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 2,
                    'fv_pic_customer' => $gambar1
                );	
            }	

            $this->CustomerModel->inputData($data);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Tambah Data</div>');
            redirect('Customer/index');
        }
    }
    public function edit($id)
    {
        $where['fn_id_customer'] = $id;
        $data['customer'] = $this->CustomerModel->getWhere($where)->result_array();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Customer/vw_edit', $data);
        $this->template->render();
    }
    public function update($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('nama-customer', 'nama-customer', 'trim|required');
        $this->form_validation->set_rules('alamat-customer', 'alamat-customer', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('kode-pos', 'kode-pos', 'trim|required');
        $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
        $this->form_validation->set_rules('telp-kantor', 'telp-kantor', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
       // $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Update Data Salah</div>');
            redirect('Customer/edit/'.$id); 
        }else{ 
            $config['upload_path'] = realpath('assets/public/themes/admin-lte/img-customer/');
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2000000';
            $config['max_width'] = '2024';
            $config['max_height']= '1468';
            // $config['file_name'] = $nama_file;	
            
            $new_name = 'fotocustomer_'.time();
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('foto-customer')){
                $data = array(
                'fv_email' => $this->input->post('email'),
                'fv_nmcustomer' => $this->input->post('nama-customer'),
                'fv_alamat_customer' => $this->input->post('alamat-customer'),
                'fv_kecamatan' => $this->input->post('kecamatan'),
                'fv_kota' => $this->input->post('kota'),
                'fv_provinsi' => $this->input->post('provinsi'),
                'fn_kode_pos' => $this->input->post('kode-pos'),
                'fv_npwp' => $this->input->post('npwp'),
                'fc_telp_kantor' => $this->input->post('telp-kantor'),
                'fv_no_hp' => $this->input->post('no-hp'),
                'fv_username' => $this->input->post('username'),
                'fv_password' => md5($this->input->post('password')),
                'fv_view_password' => $this->input->post('password'),
                'fn_idlevel' => 2
            );
            }else{
                //unlink('../assets/galeri/'.$this->input->post('terserah'));
                $get_name = $this->upload->data();
                $nama_foto = $get_name['file_name'];
                $gambar1 = $nama_foto;
                $data = array(
                    'fv_email' => $this->input->post('email'),
                    'fv_nmcustomer' => $this->input->post('nama-customer'),
                    'fv_alamat_customer' => $this->input->post('alamat-customer'),
                    'fv_kecamatan' => $this->input->post('kecamatan'),
                    'fv_kota' => $this->input->post('kota'),
                    'fv_provinsi' => $this->input->post('provinsi'),
                    'fn_kode_pos' => $this->input->post('kode-pos'),
                    'fv_npwp' => $this->input->post('npwp'),
                    'fc_telp_kantor' => $this->input->post('telp-kantor'),
                    'fv_no_hp' => $this->input->post('no-hp'),
                    'fv_username' => $this->input->post('username'),
                    'fv_password' => md5($this->input->post('password')),
                    'fv_view_password' => $this->input->post('password'),
                    'fn_idlevel' => 2,
                    'fv_pic_customer' => $gambar1
                );	
            }
            $where = $id;
            $this->CustomerModel->updateData($data, $where);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Edit Data</div>');
            redirect('Customer/index');
        }
    }
    public function delete($id)
    {
        //Hapus data img
        $data = $this->CustomerModel->getDataBy($id)->result_array();
        foreach ($data as $d) {
            $pic = './assets/public/themes/admin-lte/img-customer/' . $d['fv_pic_customer'];
        }
        //jika berhasil dihapus
        if (is_readable($pic) && unlink($pic)) {
            //hapus data di db
            $where['fn_id_customer'] = $id;
            $this->CustomerModel->deleteData($where);

            redirect('Customer/index');
        } else {
            echo 'gagal';
        }
    }
}
