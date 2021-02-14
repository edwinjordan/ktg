<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class Barang extends MY_Admin
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
    }

    public function index()
    {
        $data['barang'] = $this->BarangModel->getData();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Barang/vw_barang', $data);
        $this->template->render();
    }
    public function tambah()
    {
      
        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Barang/vw_tambah');
        $this->template->render();
    }
    public function save()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode-barang', 'kode-barang', 'trim|required');
        $this->form_validation->set_rules('nama-barang', 'nama-barang', 'trim|required');
        $this->form_validation->set_rules('garansi', 'garansi', 'trim|required');
        $this->form_validation->set_rules('detail-garansi', 'detail-garansi', 'trim|required');
        $this->form_validation->set_rules('masa-garansi', 'masa-garansi', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Barang/tambah'); 
        }else
        {    
            $data = [
                'fc_kdbarang' => $this->input->post('kode-barang'),
                'fv_nmbarang' => $this->input->post('nama-barang'),
                'fn_garansi' => $this->input->post('garansi'),
                'fv_garansi_detail' => $this->input->post('detail-garansi'),
                'fn_garansi_masa' => $this->input->post('masa-garansi'),
            ];

            $this->BarangModel->inputData($data);
            $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Tambah Data</div>');
            redirect('Barang/index');
        }
    }
    public function edit($id)
    {
        $where = ['fn_id_barang' => $id];
        $data['barang'] = $this->BarangModel->getWhere($where)->result_array();

        $this->template->set_layout('Template/view_admin');
        $this->template->set_content('Barang/vw_edit', $data);
        $this->template->render();
    }
    public function update($id)
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('kode-barang', 'kode-barang', 'trim|required');
        $this->form_validation->set_rules('nama-barang', 'nama-barang', 'trim|required');
        $this->form_validation->set_rules('garansi', 'garansi', 'trim|required');
        $this->form_validation->set_rules('detail-garansi', 'detail-garansi', 'trim|required');
        $this->form_validation->set_rules('masa-garansi', 'masa-garansi', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('data','<div class="alert alert-danger"><i class="fa fa-fw fa-check"></i>Pengisian Data Salah</div>');
            redirect('Barang/edit/'.$id); 
        }else
        {    
            $data = [
                'fc_kdbarang' => $this->input->post('kode-barang'),
                'fv_nmbarang' => $this->input->post('nama-barang'),
                'fn_garansi' => $this->input->post('garansi'),
                'fv_garansi_detail' => $this->input->post('detail-garansi'),
                'fn_garansi_masa' => $this->input->post('masa-garansi'),
            ];
        }
        $where = $id;
        $this->BarangModel->updateData($data, $where);
        $this->session->set_flashdata('data','<div class="alert alert-success"><i class="fa fa-fw fa-check"></i> Berhasil Edit Data</div>');
        redirect('Barang/index');
    }
    public function delete($id)
    {
        $where['fn_id_barang'] = $id;
        $this->BarangModel->deleteData($where);
        redirect('Barang/index');
    }
}
